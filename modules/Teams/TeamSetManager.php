<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/master-subscription-agreement
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2012 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

require_once('modules/Trackers/monitor/Monitor.php');

define('TEAM_SET_CACHE_KEY', 'TeamSetsCache');
define('TEAM_SET_MD5_CACHE_KEY', 'TeamSetsMD5Cache');

class TeamSetManager {

	private static $instance;
	private static $_setHash = array();

	/**
	 * Constructor for TrackerManager.  Declared private for singleton pattern.
	 *
	 */
	private function __construct() {}

	/**
	 * getInstance
	 * Singleton method to return static instance of TrackerManager
	 * @returns static TrackerManager instance
	 */
	static function getInstance(){
	    if (!isset(self::$instance)) {
	        self::$instance = new TeamSetManager();
			//Set global variable for tracker monitor instances that are disabled
	        self::$instance->setup();
	    } // if
	    return self::$instance;
	}

	/**
	 * Add a team_set_id and module combination to the hash for later flushing to the db.
	 *
	 * @param $team_set_id - GUID of the team_set_id
	 * @param $module      - string
	 */
	public static function add($team_set_id, $table_name){
		if(empty(self::$_setHash[$team_set_id]) || empty(self::$_setHash[$team_set_id][$table_name])){
			self::$_setHash[$team_set_id][] = $table_name;
		}
	}

	/**
	 * Go through each of the team_sets_modules and find sets that are no longer in use
	 *
	 */
	public static function cleanUp(){
		$teamSetModule = new TeamSetModule();
		//maintain a list of the team set ids we would like to remove
		$setsToRemove = array();
		$setsToRemain = array();

		$tsmResult = $teamSetModule->db->query('SELECT team_sets_modules.*  FROM team_sets_modules  where team_sets_modules.deleted=0',true,"Error retrieving TeamSetModule list: ");
		while($tsmRow = $teamSetModule->db->fetchByAssoc($tsmResult)){
			//pull off the team_set_id and module and run a query to see if we find if the module is still using this team_set
			//of course we have to be careful not to remove a set before we have gone through all of the modules containing that
			//set otherwise.
			$module_table_name = $tsmRow['module_table_name'];
			$team_set_id = $tsmRow['team_set_id'];
			//if we have a user_preferences table then we do not need to check the db.
			$pos = strpos($module_table_name, 'user_preferences');
			if ($pos !== false) {
				$tokens = explode('-', $module_table_name);
				if(count($tokens) >= 3){
					//we did find that this team_set was going to be removed from user_preferences
					$userPrefResult = $GLOBALS['db']->query("SELECT contents FROM user_preferences WHERE category = '" . $tokens[1] . "' AND deleted = 0", false, 'Failed to load user preferences');
					while ($userPrefRow = $teamSetModule->db->fetchByAssoc($userPrefResult)) {
						$prefs = unserialize(base64_decode($userPrefRow['contents']));
						$team_set_id = SugarArray::staticGet($prefs, implode('.', array_slice($tokens, 2)));
						if(!empty($team_set_id)){
							//this is the team set id that is being used in user preferences we have to be sure to not remove it.
							$setsToRemain[$team_set_id] = true;
						}
					}//end while
				}//fi
			}else{
				$query = "SELECT count(*) count FROM $module_table_name WHERE team_set_id = '$team_set_id'";
				$result = $teamSetModule->db->query($query);

	    		if($row = $teamSetModule->db->fetchByAssoc($result))
	    		{
	    			if(empty($row['count'])){
	    				$setsToRemove[$team_set_id] = true;
	    			}else{
	    				$setsToRemain[$team_set_id] = true;
	    			}
	    		}
			}
		}

		//compute the difference between the sets that have been designated to remain and those set to remove
		$arrayDiff = array_diff_key($setsToRemove, $setsToRemain);

		//now we have our list of team_set_ids we would like to remove, let's go ahead and do it and remember
		//to update the TeamSetModule table.
		foreach($arrayDiff as $team_set_id => $key){
			//1) remove from team_sets_teams
			$query1 = "DELETE FROM team_sets_teams WHERE team_set_id = '$team_set_id'";
			$teamSetModule->db->query($query1);

			//2) remove from team_sets
			$query2 = "DELETE FROM team_sets WHERE id = '$team_set_id'";
			$teamSetModule->db->query($query2);

			//3) remove from team_sets_modules
			$query3 = "DELETE FROM $teamSetModule->table_name WHERE team_set_id = '$team_set_id'";
			$teamSetModule->db->query($query3);
		}
		//clear out the cache
		self::flushBackendCache();
	}

	/**
	 * Save the data in the hash to the database using TeamSetModule object
	 *
	 */
	public static function save(){
		//if this entry is set in the config file, then store the set
		//and modules in the team_set_modules table
		if(!empty($GLOBALS['sugar_config']['enable_team_module_save'])){
			foreach(self::$_setHash as $team_set_id => $table_names){
				$teamSetModule = new TeamSetModule();
				$teamSetModule->team_set_id = $team_set_id;

				foreach($table_names as $table_name){
					$teamSetModule->module_table_name = $table_name;
					//remove the id so we do not think this is an update
					$teamSetModule->id = '';
					$teamSetModule->save();
				}
			}
		}
	}

	/**
	 * The above method "save" will flush the entire cache, saveTeamSetModule will just save one entry.
	 *
	 * @param guid $teamSetId	the GUID of the team set id we wish to save
	 * @param string $tableName	the corresponding table name
	 */
	public static function saveTeamSetModule($teamSetId, $tableName){
		//if this entry is set in the config file, then store the set
		//and modules in the team_set_modules table
		if(!empty($GLOBALS['sugar_config']['enable_team_module_save'])){
			$teamSetModule = new TeamSetModule();
			$teamSetModule->team_set_id = $teamSetId;
			$teamSetModule->module_table_name = $tableName;
			$teamSetModule->save();
		}
	}

	public static function getFormattedTeamNames($teams_arr=array()) {
		//Add a safety check (in the event that team_set_id is not set (maybe perhaps from manual SQL or failed unit tests)
		if(!is_array($teams_arr)) {
		   return array();
		}

		//now format the returned values relative to how the user has their locale
    	$teams = array();
	    foreach($teams_arr as $team){
	    	$display_name = Team::getDisplayName($team['name'], $team['name_2']);
			$teams[] =  array('id' => $team['id'], 'display_name' => $display_name, 'name' => $team['name'], 'name_2' => $team['name_2']);
		}
		return $teams;
	}

	/**
	 * Check if we have an md5 relationship to a team set id
	 *
	 * @param unknown_type $md5
	 * @return unknown
	 */
	public static function getTeamSetIdFromMD5($md5){
		$teamSetsMD5 = sugar_cache_retrieve(TEAM_SET_MD5_CACHE_KEY);
        if ( $teamSetsMD5 != null && !empty($teamSetsMD5[$md5])) {
            return $teamSetsMD5[$md5];
        }

	 	if ( file_exists($cachefile = sugar_cached('modules/Teams/TeamSetMD5Cache.php') )) {
            require_once($cachefile);
            sugar_cache_put(TEAM_SET_MD5_CACHE_KEY,$teamSetsMD5);
            if(!empty($teamSetsMD5[$md5])){
            	return $teamSetsMD5[$md5];
            }
        }
        return null;
	}

	public static function addTeamSetMD5($team_set_id, $md5){
		$teamSetsMD5 = sugar_cache_retrieve(TEAM_SET_MD5_CACHE_KEY);
		if(empty($teamSetsMD5) || !is_array($teamSetsMD5)){
			$teamSetsMD5 = array();
		}
        if ( $teamSetsMD5 != null && !empty($teamSetsMD5[$md5])) {
            return;
        }

	 	if ( file_exists($cachefile = sugar_cached('modules/Teams/TeamSetMD5Cache.php')) ) {
            require_once($cachefile);
            sugar_cache_put(TEAM_SET_MD5_CACHE_KEY,$teamSetsMD5);
            if(!empty($teamSetsMD5[$md5])){
            	return;
            }
        }

        $teamSetsMD5[$md5] = $team_set_id;
        sugar_cache_put(TEAM_SET_MD5_CACHE_KEY,$teamSetsMD5);

        if ( ! file_exists($cachefile) ) {
            mkdir_recursive(dirname($cachefile));
        }

        if(sugar_file_put_contents_atomic($cachefile, "<?php\n\n".'$teamSetsMD5 = '.var_export($teamSetsMD5,true).";\n ?>") === false)
        {
            $GLOBALS['log']->error("File $cachefile could not be written");
        }
	}

	/**
	 * Retrieve a list of team associated with a set
	 *
	 * @param $team_set_id string
	 * @return array of teams array('id', 'name');
	 */
	public static function getUnformattedTeamsFromSet($team_set_id){
		if(empty($team_set_id)) return array();
		// Stored in a cache somewhere
        $teamSets = sugar_cache_retrieve(TEAM_SET_CACHE_KEY);
        if ( $teamSets != null && !empty($teamSets[$team_set_id])) {
            return $teamSets[$team_set_id];
        }

        // Already stored in a file
        if ( file_exists($cachefile = sugar_cached('modules/Teams/TeamSetCache.php')) ) {
            require_once($cachefile);

            if(!empty($teamSets[$team_set_id])){
            	sugar_cache_put(TEAM_SET_CACHE_KEY,$teamSets);
            	return $teamSets[$team_set_id];
            }
        }


		$teamSet = new TeamSet();
		$teams = $teamSet->getTeams($team_set_id);
		$team_names = array();
		foreach($teams as $id => $team){
			$team_names[$id] = $team->name;
		}
		asort($team_names);
		if(!is_array($teamSets)){
			$teamSets = array();
		}
		foreach($team_names as $team_id => $team_name){
			$tm = $teams[$team_id];
			$teamSets[$team_set_id][] = array('id' => $team_id, 'name' => $team_name, 'name_2' => $tm->name_2);
		}

	 	sugar_cache_put(TEAM_SET_CACHE_KEY,$teamSets);

        if ( ! file_exists($cachefile) ) {
            mkdir_recursive(dirname($cachefile));
        }

        if(sugar_file_put_contents_atomic($cachefile, "<?php\n\n".'$teamSets = '.var_export($teamSets,true).";\n ?>") === false)
        {
            $GLOBALS['log']->error("File $cachefile could not be written");
        }

        return isset($teamSets[$team_set_id])?$teamSets[$team_set_id]:'';
	}

	/**
	 * Retrieve a list of team associated with a set for display purposes
	 *
	 * @param $team_set_id string
	 * @return array of teams array('id', 'name');
	 */
	public static function getTeamsFromSet($team_set_id){
		if(empty($team_set_id)) return array();
		return self::getFormattedTeamNames(self::getUnformattedTeamsFromSet($team_set_id));
	}

	/**
	 * Return a comma delimited list of teams for display purposes
	 *
	 * @param id $team_set_id
	 * @param id $primary_team_id
	 * @param boolean $for_display
	 * @return string
	 */
	public static function getCommaDelimitedTeams($team_set_id, $primary_team_id = '', $for_display = false){
		$teams = self::getTeamsFromSet($team_set_id);
		$value = '';
	    $primary = '';
	   	foreach($teams as $row){
	        if(!empty($primary_team_id) && $row['id'] == $primary_team_id){
	        	  if($for_display){
	        	  	 $primary = ", {$row['display_name']}";
	        	  }else{
	        	  	$primary = ", ".(!empty($row['name']) ? $row['name'] : $row['name_2']);
	        	  }
	        }else{
	        	if($for_display){
	        		$value .= ", {$row['display_name']}";
	        	}else{
	   				$value .= ", ".(!empty($row['name']) ? $row['name'] : $row['name_2']);
	        	}
	        }
	   	}
	   	$value = $primary.$value;
	   	return substr($value, 2);
	}

	/**
	 * clear out the cache
	 *
	 */
	public static function flushBackendCache( ) {
        // This function will flush the cache files used for the module list and the link type lists
        sugar_cache_clear(TEAM_SET_CACHE_KEY);

        if ( file_exists($cachefile = sugar_cached('modules/Teams/TeamSetCache.php')) ) {
            unlink($cachefile);
        }

        sugar_cache_clear(TEAM_SET_MD5_CACHE_KEY);
        if ( file_exists($cachefile = sugar_cached('modules/Teams/TeamSetMD5Cache.php')) ) {
            unlink($cachefile);
        }
    }

    /**
     * Rebuild the team_sets_teams relationship and remove any teams that have been deleted from the system from the team set
     * Go through each team set and check if each team on the set is still in the teams table.
     *
     * @return the team sets that have been affected as well as the team ids within those team sets
     */
    public static function rebuildTeamSets(){

		$teamSet = new TeamSet();
		$sql = "SELECT id FROM $teamSet->table_name WHERE deleted = 0";

		$result = $teamSet->db->query($sql);
		$affectedTeamSets = array();
		while($row = $teamSet->db->fetchByAssoc($result)){
			$team_set_id = $row['id'];
			$teamSetTeamIds = $teamSet->getTeams($team_set_id);

			$teamSqlNoDelete = "SELECT team_id FROM team_sets_teams team_set_id = '$team_set_id'";
			$resultNoDelete = $teamSet->db->query($teamSqlNoDelete);
			$teamIdsNoDelete = array();
			while($rowNoDelete = $teamSet->db->fetchByAssoc($resultNoDelete)){
	    		$teamIdsNoDelete[] = $rowNoDelete['id'];
	    	}

	    	//no we have a set of teams actually in the table: $teamIdsNoDelete
	    	//and a list of teams joined against the teams table: $teamSetTeamIds
	    	//let's compare them and see if there are any differences.
	    	$diff = array_diff($teamIdsNoDelete, $teamSetTeamIds);
	    	if(!empty($diff)){
	    		$affectedTeamSets[$team_set_id] = array();
	    		//remove any of these teams from the set.
	    		foreach($diff as $team_id){
	    			$teamSet->id = $team_set_id;
	    			$teamSet->removeTeamFromSet($team_id);
	    			//TODO we can remove the team_set_id from the WHERE if we don't care about reassignment
	    			$affectedTeamSets[$team_set_id][] = $team_id;
	    		}
	    	}
		}
		return $affectedTeamSets;
    }

    /**
     * Given a particular team id, remove the team from all team sets that it belongs to
     *
     * @param string $team_id The team's id to remove from the team sets
     * @return Array of team_set ids that were affected
     */
    public static function removeTeamFromSets($team_id){

		$teamSet = new TeamSet();
		$sql = "SELECT tsm.team_set_id, tsm.module_table_name FROM team_sets_modules tsm inner join team_sets_teams tst on tsm.team_set_id = tst.team_set_id where tst.team_id = '$team_id'";
    	$result = $teamSet->db->query($sql);
    	$affectedTeamSets = array();

    	$team_set_id_modules = array();
    	while($row = $teamSet->db->fetchByAssoc($result)) {
    		  $team_set_id_modules[$row['team_set_id']][] = $row['module_table_name'];
    	}

    	foreach($team_set_id_modules as $team_set_id=>$modules) {
    	      $teamSet->id = $team_set_id;
    	      $teamSet->removeTeamFromSet($team_id);

    	      //Now check if the new team_md5 value already exists.  If it does, we have to go and
    	      //update all the records that to use an existing team_set_id and get rid of this team set since
    	      //it is essentially a duplicate
    	      $sql = "SELECT id FROM team_sets WHERE team_md5 = '{$teamSet->team_md5}' AND id != '{$teamSet->id}'";
    	      $result = $teamSet->db->query($sql);
    	      while($row = $teamSet->db->fetchByAssoc($result)) {
    	      	    $existing_team_set_id = $row['id'];
                    //Update the records
    	      	    foreach($modules as $module) {
    	      	    	$sql = "UPDATE {$module} SET team_set_id = '{$existing_team_set_id}' WHERE team_set_id = '{$teamSet->id}'";
                        $GLOBALS['log']->info($sql);
    	      	    	$teamSet->db->query($sql);
    	      	    }

    	      	    //Remove the team set entry
                    $sql = "DELETE FROM team_sets WHERE id = '{$teamSet->id}'";
                    $GLOBALS['log']->info($sql);
                    $teamSet->db->query($sql);

                    //Remove the team_sets_teams entries
                    $sql = "DELETE FROM team_sets_teams WHERE team_set_id = '{$teamSet->id}'";
                    $GLOBALS['log']->info($sql);
                    $teamSet->db->query($sql);

                    //Remove the team_sets_modules entries
                    $sql = "DELETE FROM team_sets_modules WHERE team_set_id = '{$teamSet->id}'";
                    $GLOBALS['log']->info($sql);
                    $teamSet->db->query($sql);
    	      }

    	      $affectedTeamSets[$team_set_id] = $row[$team_set_id];
    	}

	    return $affectedTeamSets;
    }
}
?>

<?php
//
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







class ScanTeams{
	/**
	 * Checks that every user has explicit memberships to the global team
	 *
	 * true implies there is a user missing Globlal membership
	 * 
	 * @param ID $global_id
	 * @return boolean
	 */
	function scanForMissingGlobal($global_id = '1'){
		$query = "SELECT count(*) missing_count FROM users 
					WHERE deleted = 0 AND status='Active' AND is_group = 0 AND  id NOT IN 
					(SELECT user_id FROM team_memberships WHERE team_id = '$global_id' AND deleted = 0 AND explicit_assign=1)";
		$result = $GLOBALS['db']->query($query);
		$row = $GLOBALS['db']->fetchByAssoc($result);
		if(empty($row['missing_count'])){
			return false;
		}
		return true;
	}
	/**
	 * Scans to ensure that team membership mimicks the reports to structure
	 * 
	 * true implies there is a user missing a team
	 * 
	 * @return boolean
	 */
	function scanForMissingReportsToTeams(){
		$reportStruct = array();
		$teamStruct = array();
		$query ="SELECT users.id uid1, users.reports_to_id rid1, teams.id tid1, tm.explicit_assign explicit1, tm.implicit_assign implicit1 
	FROM team_memberships tm 
	INNER JOIN users ON users.id=tm.user_id AND users.deleted = 0
	INNER JOIN teams ON teams.id=tm.team_id AND teams.deleted = 0
	WHERE tm.deleted = 0";
		$result = $GLOBALS['db']->query($query);
		while($row = $GLOBALS['db']->fetchByAssoc($result)){
			//build the reports structure
			$reportStruct[$row['uid1']] = $row['rid1'];
			//build the team strucutrs
			$teamStruct[$row['uid1']][$row['tid1']] = array('implicit'=>$row['implicit1'], 'explicit'=>$row['explicit1']); 
		}
		
		//now walk the report structure
		foreach($reportStruct as $uid=>$rid){
			//if no reports to just move along
			if(empty($rid))continue;
			foreach($teamStruct[$uid] as $tid=>$assigns){
				if(empty($teamStruct[$rid][$tid])){
					//missing team membership entirely 
                    return true;
				}
				if(empty($teamStruct[$rid][$tid]['implicit'])){
					//missing implicit membership
					return true;	
				}
			}
		}
		return false;
	}
	
	/**
	 * 
	 * Scans to ensure that every user has a private team
	 * 
	 * true implies there is a user missing a private team
	 * 
	 * @return boolean
	 */
	function scanForMissingPrivateTeams(){
		$query ="SELECT count(*) missing_count 
				FROM users WHERE id NOT IN 
					(SELECT tm.user_id FROM team_memberships tm 
						INNER JOIN teams ON teams.id = tm.team_id AND teams.deleted = 0 AND teams.private=1 
					WHERE tm.deleted = 0 AND tm.explicit_assign=1) and ( default_team = '' OR default_team IS NULL ) "; 
		$result = $GLOBALS['db']->query($query);
		$row = $GLOBALS['db']->fetchByAssoc($result);
		if(empty($row['missing_count'])){
			return false;
		}
		return true;
		
		
	}
	
	
	
}




$user= new User();
$pgt=false;
$ppt=false;
$pit=false;
$processCleanupTeamSets = false;
if (isset($_REQUEST['silent']) and $_REQUEST['silent']==0) {
    if (isset($_POST['process_global_team']) and $_POST['process_global_team'] == 'on') {
        $pgt=true;
    }
    if (isset($_POST['process_private_team']) and $_POST['process_private_team'] == 'on') {
        $ppt=true;
    }
    if (isset($_POST['process_implict_teams']) and $_POST['process_implict_teams'] == 'on') {
        $pit=true;
    }
 	if (isset($_POST['process_clean_up_team_sets']) and $_POST['process_clean_up_team_sets'] == 'on') {
        $processCleanupTeamSets=true;
    }
    $global_team_id='1';
    if (!empty($_POST['global_team_id'])) {
        $global_team_id=$_POST['global_team_id'];
    }
    
    if (!empty( $_POST['process'])){
        process_team_access($pgt,$ppt,$pit,$global_team_id, $processCleanupTeamSets);
    } else {
        render_rebuild_options($global_team_id);
    }
}
function render_rebuild_options($global_team_id=1) {

    global $current_language;  
    $user=new User();
    static $mod_strings = null;
    if(empty($mod_strings))$mod_strings = return_module_language($current_language, 'Administration');
    
    $global_team_sel="";
    if (no_global_team()) {
        //a list of not-private teams. 
        $query="select id, name from teams where deleted=0 and private!=1 and id!='1'";
        $result=$user->db->query($query);
        $options=array();
        while (($row=$user->db->fetchByAssoc($result)) != null) {
            $options[$row['id']]=$row['name'];
        }
        $options_html=get_select_options_with_id($options,"");
        
        $global_team_sel=<<<ABC
        <tr>
        <td width="10%" NOWRAP  valign="top" >
            <select  name="global_team_id" id="global_team_id">$options_html</select>
        </td>
        <td valign="middle" valign="top"  colspan="3">
            {$mod_strings['LBL_GLOBAL_TEAM']}
        </td>
        </tr>
        <tr><td colspan=4>&nbsp;</td></tr>
ABC;
    }
    $process_global_team_checked="";
    $process_implict_teams_checked="";
    $process_private_team_checked="";
    
    $missing_global = '';
    if(ScanTeams::scanForMissingGlobal($global_team_id)){
    	$missing_global =  "(".$mod_strings['LBL_MISSING_GLOBAL'].")"; 
        $process_global_team_checked="checked";
    }
    $missing_teams = '';
    if(ScanTeams::scanForMissingReportsToTeams()){
    	$missing_teams =  "(".$mod_strings['LBL_MISSING_TEAMS'].")"; 
        $process_implict_teams_checked="checked";
    }
	$missing_private = '';
    if(ScanTeams::scanForMissingPrivateTeams()){
    	$missing_private =  "(".$mod_strings['LBL_MISSING_PRIVATE'].")"; 
        $process_private_team_checked="checked";
    }

    $xyz=<<<EOF
        <form name="RepairTeams" method="POST" >
            <input type="hidden" name="module" value="Administration">
            <input type="hidden" name="action"  value="RepairTeams">
            <input type="hidden" name="process"  value="1">
            <input type="hidden" name="silent"  value="0">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
            <tr><td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td width="10%" NOWRAP  valign="top" >
                            <input type="checkbox"  name="process_global_team" id="process_global_team" {$process_global_team_checked}>&nbsp;
                        </td>
                        <td valign="middle" valign="top"  colspan="3">
                            {$mod_strings['LBL_GLOBAL_TEAM']}<br/>$missing_global
                        </td>
                    </tr>
                    <tr><td colspan=4>&nbsp;</td></tr>
                    $global_team_sel
                    <tr>
                        <td width="10%" NOWRAP  valign="top" >
                            <input type="checkbox"  name="process_private_team" id="process_private_team" {$process_private_team_checked}>&nbsp;
                        </td>
                        <td valign="middle" valign="top"  colspan="3">
                            {$mod_strings['LBL_PRIVATE_TEAM']}<br/>$missing_private
                        </td>
                    </tr>
                    <tr><td colspan=4>&nbsp;</td></tr>
                    <tr>
                        <td width="10%" NOWRAP  valign="top" >
                            <input type="checkbox"  name="process_implict_teams" id="process_implict_teams" {$process_implict_teams_checked}>&nbsp;
                        </td>
                        <td valign="middle" valign="top"  colspan="3">
                            {$mod_strings['LBL_TEAM_HIERARCHY']}<br/>$missing_teams
                        </td>
                    </tr>
                    <tr><td colspan=4>&nbsp;</td></tr>
                    <tr>
                        <td width="10%" NOWRAP  valign="top" >
                            <input type="checkbox"  name="process_clean_up_team_sets" id="process_clean_up_team_sets" "checked">&nbsp;
                        </td>
                        <td valign="middle" valign="top"  colspan="3">
                            {$mod_strings['LBL_TEAM_SETS']}
                        </td>
                    </tr>
                    <tr>
                        <td colspan=4 >
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan=4  align="left">
                            <input title="{$mod_strings['LBL_REBUILD']}" class="button"  type="submit" name="button" value="  {$mod_strings['LBL_REBUILD']}  " >
                        </td>
                    </tr>
                </table>
            </td></tr>
        </table>       
        </form>
EOF;
    
    print $xyz;
}

function no_global_team() {
    $user=new User();
    //log for default global team id
    $query="select id from teams where deleted=0 and id='1'";
    $result=$user->db->query($query);
    $row=$user->db->fetchByAssoc($result);
    if (!empty($row['id'])) {
        return false;
    } 
    return true;
}

function process_team_access($process_global_teams=false, $process_private_teams=false,$process_implict_teams=false, $global_team_id='1', $process_team_access=false) {
    set_time_limit(3600);
    global $mod_strings;
    $GLOBALS['log'] = LoggerManager :: getLogger('SugarCRM');
    $user = new User();

    $do_nothing=true;
        
    //process global team access if requested.
    if ($process_global_teams) {
        clear_global_team_access($global_team_id);
        if (no_global_team()) {//we should create a Global team
            Team::create_team("Global", $mod_strings['LBL_GLOBAL_TEAM_DESC'], $global_team_id);
        }
        $do_nothing=false;    
    }
    //process private teams.
    if ($process_private_teams ) {
        clear_implicit_access(true,$global_team_id);
        $do_nothing=false;
    }
    //process implicit teams.
    if ($process_implict_teams ) {
        clear_implicit_access(false,$global_team_id);
        $do_nothing=false;
    }
    //cleanup unused team sets
    if($process_team_access){
    	clean_up_team_sets();
        $do_nothing=false;
    }
    //run thru all the users.
    if (!$do_nothing) {
        $team = new Team();
        $query="select id, reports_to_id from users where deleted=0";
        $result=$user->db->query($query);
        $reporting=array();
        while (($row=$user->db->fetchByAssoc($result)) != null) 
        {
            $reporting[$row['id']]=$row['reports_to_id'];   
        }   
        
        foreach ($reporting as $user_id=>$reports_to_id) {
            if (isset($_REQUEST['silent']) and $_REQUEST['silent']==0) {
                echo $mod_strings['LBL_REPAIR_TEAMS_PROCESS_USER'] . $user_id . $mod_strings['LBL_REPAIR_TEAMS_REPORT'] . $reports_to_id;
            }
            $user = new User();
            $user->retrieve($user_id);
            
            $user->global_team=$global_team_id;  //set global team id
            if (empty($user->id)) {
                if (isset($_REQUEST['silent']) and $_REQUEST['silent']==0) {
                    echo $mod_strings['LBL_REPAIR_TEAMS_SKIP_USER'] . $user_id . $mod_strings['LBL_REPAIR_TEAMS_REPORT'] . $reports_to_id;
                }
            } else {    
                process_all_team_access($user,$process_global_teams,$process_private_teams,$process_implict_teams);
            }
        }
        if (isset($_REQUEST['silent']) and $_REQUEST['silent']==0) {        
            echo "<BR><BR>" . $mod_strings['LBL_DONE'] . "...";
        }
    } else {
        if (isset($_REQUEST['silent']) and $_REQUEST['silent']==0) {
            echo $mod_strings['LBL_REPAIR_TEAMS_NO_PROC'];
        }
    }
    
}   

//delete memebership in global team
function clean_up_team_sets() {
   require_once('modules/Teams/TeamSetManager.php');
   TeamSetManager::cleanUp();
}

//delete memebership in global team
function clear_global_team_access($global_team_id=1) {
    $user=new User();
    
    //delete all records for membership into global team.
    $query="delete from team_memberships where team_id='{$global_team_id}'" ;
    $user->db->query($query);    
}

function clear_implicit_access($private_teams_only, $global_team_id=1) {
    global $current_user;
    $user=new User();

    if ($private_teams_only) {
        $tf = "  team_id in (select id from teams where private=1)";
    } else {
        $tf = " team_id not in (select id from teams where private=1) and team_id != '$global_team_id'";
    }

    $query="delete from team_memberships where explicit_assign=0" . ' and ' . $tf;
    $user->db->query($query); 

    $query="update team_memberships set implicit_assign=0" . ' where '. $tf;
    $user->db->query($query); 
    
    $query="delete from team_memberships where implicit_assign=0 and explicit_assign=0". ' and ' .$tf;
    $user->db->query($query); 
    
    //if private delete explicit access to my team.
     if ($private_teams_only) {
        $query= "select a.id from team_memberships a " .
                "        inner join users c on c.id = a.user_id " .
                "        inner join teams b on  a.team_id=  b.id  " .
                "        where " . $user->db->convert("'('" , "CONCAT", array('c.user_name' , "')'")) ." = b.name and b.private=1 and c.deleted=0 and b.deleted=0 and a.deleted=0";
        

        $result=$user->db->query($query);
        while (($row=$user->db->fetchByAssoc($result))!= null) {
            $d_query="update team_memberships set deleted=1 where id='{$row['id']}'";
            $user->db->query($d_query);
        } 
     }
    
}

function process_all_team_access($user,$add_to_global_team=false,$private_team=false, $process_implict_teams=false) {
    global $current_language;
    
    $mod_strings = return_module_language($current_language, 'Users');
    $team = new Team();

    // add the user to the global team.
    if ($add_to_global_team) {
        $GLOBALS['log']->debug("RepairTeams:Processing Global($user->global_team) team membership for $user->user_name");
        $team->retrieve($user->global_team);
        $team->add_user_to_team($user->id);
    }

    // If private teams are enabled, then manage private team member,
    //create private teams for the user if one does not exist.
    if($private_team) {
        $GLOBALS['log']->debug("RepairTeams:Processing Private team membership for $user->user_name");
        $team_id = $user->getPrivateTeamID();
        //create a private team
        if(empty($team_id) && !empty($user->user_name) ) {
            $GLOBALS['log']->debug("RepairTeams:No private team found creating new for $user->user_name");
            $name = '';
            $name2 = '';
            if ( !empty($user->first_name) ) {
                $name = $user->first_name;
                $name2 = $user->last_name;
            }
            if ( empty($user->first_name) && !empty($user->last_name) ) {
                $name = $user->last_name;
                $name2 = '';
            }
            $description = "{$mod_strings['LBL_PRIVATE_TEAM_FOR']} {$user->user_name}";
            $team_id = Team::create_team($name, $description, create_guid(), 1, $name2, $user->id);
        }
        $GLOBALS['log']->debug("RepairTeams:User $user->user_name private team id is $team_id");        
        
        
        $team->retrieve($team_id);
        $team->add_user_to_team($user->id);
    }
    
    //process team hierarchy for all teams except private team and global team. Separate repair options exists 
    if ($process_implict_teams) {
        $GLOBALS['log']->debug("RepairTeams:Processing Implicit team access for $user->user_name");

        $team = new Team();
        $query = "select distinct team_id from team_memberships where deleted=0 and user_id='{$user->id}' and explicit_assign=1 and team_id not in (select id from teams where private=1 and deleted=0) and team_id != '{$user->global_team}'";
        $result = $user->db->query($query,true,"Error finding the full membership list for a user: ");        
        while (($row=$user->db->fetchByAssoc($result))!=null)
        {
            $GLOBALS['log']->debug("RepairTeams:Processing Implicit team. User:{$user->user_name} Team:{$row['team_id']}");

            //delete current users memebership record for the selected team.
            $d_query="update team_memberships set deleted=1 where user_id='{$user->id}' and team_id='{$row['team_id']}' ";
            $user->db->query($d_query);
            
            //re-add the membership so it cascades.
            $team = new Team();
            $team->retrieve($row['team_id']);
         	// Make sure the team is valid
            if(!empty($team->id))
            {
                $team->add_user_to_team($user->id, $user);
            }
        }        
    }
}

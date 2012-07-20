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

class TrackerReporter{

	private $default_queries = array(
	                    'all' => array(
							"ShowLastModifiedRecords" => "", //See function below
                       		"ShowActiveUsers" => "SELECT distinct u.user_name as user_name, u.first_name, u.last_name, ts.date_end as last_action from users u, tracker_sessions ts where u.id = ts.user_id and ts.active = 1 and ts.date_end > {0} order by ts.date_end desc",
                    	    "ShowLoggedInUserCount" => "select count(distinct user_id) as active_users from tracker_sessions where active = 1 and date_end > {0}",
							"ShowTopUser" => "", //See function below
							"ShowMyWeeklyActivities" => "", //See function below
							"ShowMyModuleUsage" => "select module_name, count(module_name) as total_count from tracker where user_id = '{0}' and module_name != 'UserPreferences' group by module_name order by total_count desc",
							"ShowTop3ModulesUsed" => "", //See function below
                            "ShowMyCumulativeLoggedInTime" => "select sum(seconds) as total_login_time from tracker_sessions where user_id = '{0}' and date_start > {1}",
							"ShowUsersCumulativeLoggedInTime" => "select u.user_name as user_name, sum(t.seconds) as total_login_time from tracker_sessions t, users u where t.user_id = u.id and t.date_start > {0} group by u.user_name"
	                    ),
    );
	private $queries;

    //Customize sort types for non-string values.  Strings are used by default
    public $sort_types = array(
                            "ShowMyModuleUsage"=>array("total_count"=>"asInt"),
                            "ShowTop3ModulesUsed"=>array("total_count"=>"asInt")
                        );
	private $included_methods = array();

	/*
	 * Default Constructor
	 * Also load up custom file here. To define the custom file would be as follows:
	 *
	 * $queries['ShowMeStuff'] = 'SELECT * FROM tracker';
	 * $queries['ShowMeStuff2'] = 'SELECT * FROM tracker_perf';
	 *
	 * function ShowMyLatest(){
	 * 	return '<SOME_QUERY_TO_RUN>';
	 * }
	 */
	public function __construct(){
		//here we should check if anything exists in custom/Tracker dir.
		if(file_exists('custom/modules/Trackers/tracker_reporter.php')){
			require_once('custom/modules/Trackers/tracker_reporter.php');
			//merge queries from custom file
			$all_queries = array_merge_recursive($this->default_queries, $queries);
			//merge functions from custom file as well.
			$this->included_methods = $this->getFileMethods('custom/modules/Trackers/tracker_reporter.php');
		} else {
		    $all_queries = $this->default_queries;
		}
		if(!empty($all_queries[$GLOBALS['db']->dbType])) {
		    $this->queries = array_merge($all_queries['all'], $all_queries[$GLOBALS['db']->dbType]);
		} else {
		    $this->queries = $all_queries['all'];
		}
	}

	/*
	 * Default method is the override is not defined.  Check the $queries variable
	 * to see if the method is defined in there if so then run the query and return the result set.
	 */
	public function __call($method, $args){
		//first check if the function is defined in the custom file;
		if(file_exists('custom/modules/Trackers/tracker_reporter.php')){
			$functions = $this->getFileMethods('custom/modules/Trackers/tracker_reporter.php');
			if(in_array($method, $functions)){
				$query = call_user_func($method);
				return $this->execute($query);
			}
		}
		return $this->execute($this->setup($method, $args));
	}


	/**
	 * Show last 10 modified records in the system
	 *
	 * @return array - dataset
	 */
	public function ShowLastModifiedRecords() {
	    $query = "SELECT module_name, item_summary, item_id, date_modified from tracker where action = 'save' and module_name != 'UserPreferences' order by date_modified desc";
		$result = $GLOBALS['db']->limitQuery($query, 0, 10);
	    $data = array();
		if($result) {
		  while($row = $GLOBALS['db']->fetchByAssoc($result)){
				// Bug 25524 - Translate the module name
				$row['module_name'] = $this->_getTranslatedModuleName($row['module_name']);
				$row['date_modified'] = $GLOBALS['timedate']->to_display_date_time($row['date_modified']);
				$data[] = $row;
		  }
		  return $data;
	    } else {
	      return null;
	    }
	}


	/**
	 * Show currently active users.
	 *
	 * @return array - dataset
	 */
	public function ShowActiveUsers($date_selected = null)
	{
		if(empty($date_selected))
			$date_selected = $GLOBALS['timedate']->getNow()->get("-20 minutes")->asDb();

        $sessionTimeout = $GLOBALS['db']->convert($GLOBALS['db']->quoted($date_selected), "datetime");

		$result = $this->execute($this->setup('ShowActiveUsers', array($sessionTimeout)));
	    $data = array();
	    foreach($result as $row) {
	    	$row['last_action'] = $GLOBALS['timedate']->to_display_date_time($row['last_action']);
	    	$data[$row['user_name']] = $row;
	    }
	    return array_values($data);
	}

	/**
	 * Show number of logged in users.
	 *
	 * @return array - dataset
	 */
	public function ShowLoggedInUserCount($date_selected = null)
	{
		if(empty($date_selected))
			$date_selected = $GLOBALS['timedate']->getNow()->get("-20 minutes")->asDb();
        $sessionTimeout = $GLOBALS['db']->convert($GLOBALS['db']->quoted($date_selected), "datetime");
		return $this->execute($this->setup('ShowLoggedInUserCount', array($sessionTimeout)));
	}

	/**
	 * Show module usage for currently logged in user.
	 *
	 * @return array - dataset
	 */
	public function ShowMyModuleUsage(){
		$result = $this->execute($this->setup('ShowMyModuleUsage', array($GLOBALS['current_user']->id)));
        $data = array();
	    foreach($result as $row) {
            // Bug 25524 - Translate the module name
            $row['module_name'] = $this->_getTranslatedModuleName($row['module_name']);
            $data[] = $row;
        }
        return $data;
    }


	/**
     * Show top user as determined by total tracker entry count
     *
     * @return array - dataset
     */
	public function ShowTopUser() {
	    $query = "select u.user_name as user_name, count(t.id) as total_count from tracker t, users u where t.user_id = u.id group by u.user_name order by total_count desc";
		$query = string_format($query, array($GLOBALS['current_user']->id));
		$result = $GLOBALS['db']->limitQuery($query, 0, 1);
	    $data = array();
		if($result) {
		  while($row = $GLOBALS['db']->fetchByAssoc($result)){
				$data[] = $row;
		  }
		  return $data;
	    } else {
	      return null;
	    }
	}

	/**
	 * Show the top 3 modules used for current user
	 *
	 * @return array - dataset
	 */
	public function ShowTop3ModulesUsed(){
		$query = "select module_name, count(module_name) as total_count from tracker where user_id = '{0}' and module_name != 'UserPreferences' group by module_name order by total_count desc";
		$query = string_format($query, array($GLOBALS['current_user']->id));
		$result = $GLOBALS['db']->limitQuery($query, 0, 3);
	    $data = array();
		if($result) {
		  while($row = $GLOBALS['db']->fetchByAssoc($result)){
				// Bug 25524 - Translate the module name
				$row['module_name'] = $this->_getTranslatedModuleName($row['module_name']);
				$data[] = $row;
		  }
		  return $data;
	    } else {
	      return null;
	    }
	}

	/**
	 * Show what the current user has done this week.
	 *
	 * @return array - dataset
	 */
	public function ShowMyWeeklyActivities($date_selected = null){
		$user = $GLOBALS['current_user']->id;
        if(!empty($date_selected)) {
            $timeSpan = db_convert("'".$date_selected."'" ,"datetime");
        } else {
            // Need to figure out the start of the week, and go from there.
            $firstDay = $GLOBALS['timedate']->get_first_day_of_week($GLOBALS['current_user']);
            $timeSpan = db_convert("'".$GLOBALS['timedate']->getNow()->get_day_by_index_this_week($firstDay)->asDb()."'" ,"datetime");
        }

		$args = array($user, $timeSpan);

		//First query
		$query = string_format("select count(id) as total_count from tracker where user_id = '{0}' and module_name != 'UserPreferences' and date_modified > {1}", $args);
	    $data = array();
	    $queryData = array();

	    $result = $this->execute($query);
		foreach($result as $row) {
	    	$queryData['total_count'] = $row['total_count'];
	    }

	    //Second query
	    $query = string_format("select count(id) as total_count from tracker where user_id = '{0}' and action = 'save' and module_name != 'UserPreferences' and date_modified > {1}", $args);
		$result = $this->execute($query);
	    foreach($result as $row) {
	    	$queryData['records_modified'] = $row['total_count'];
	    }

	    //Third query
	    $query = string_format("select count(distinct module_name) as total_count from tracker where user_id = '{0}' and module_name != 'UserPreferences' and date_modified > {1}", $args);
	    $result = $this->execute($query);
	    foreach($result as $row) {
	    	$queryData['different_modules_accessed'] = $row['total_count'];
	    }

	    //Fourth query
	    $query = "select module_name, count(module_name) as total_count from tracker where user_id = '{0}' and module_name != 'UserPreferences' and date_modified > {1} group by module_name order by total_count desc";
	    $query = string_format($query, $args);
		$result = $GLOBALS['db']->limitQuery($query, 0, 1);
	    if($result) {
		  $row = $GLOBALS['db']->fetchByAssoc($result);
		  $queryData['top_module'] = $this->_getTranslatedModuleName($row['module_name']);
	    } else {
	      $queryData['top_module'] = '';
	    }
	    $data[] = $queryData;

	    return array_values($data);
	}

	/**
	 * ShowMyCumulativeLoggedInTime
	 *
	 * Returns a time formmated display of total time logged in for current user from
	 * the given date interval
	 *
	 * @param $data_selected - Optional date filter value (default is one week from today)
	 * @return Array - dataset
	 */
	public function ShowMyCumulativeLoggedInTime($date_selected = null){
		$user = $GLOBALS['current_user']->id;
        if(!empty($date_selected)) {
            $timeSpan = db_convert("'".$date_selected."'" ,"datetime");
        } else {
            $firstDay = $GLOBALS['timedate']->get_first_day_of_week($GLOBALS['current_user']);
            $timeSpan = db_convert("'".$GLOBALS['timedate']->getNow()->get_day_by_index_this_week($firstDay)->asDb()."'" ,"datetime");
        }
		$args = array($user, $timeSpan);
		$result = $this->execute($this->setup('ShowMyCumulativeLoggedInTime', $args));
	    $data = array();
	    foreach($result as $row) {
	    	$data[] = array('total_login_time'=>$this->convertSecondsToTime($row['total_login_time'], true));
	    }
	    return array_values($data);
	}


	/**
	 * ShowUsersCumulativeLoggedInTime
	 *
	 * Returns a time formmated display of total time logged in for all users from
	 * the given date interval
	 *
	 * @param $data_selected - Optional date filter value (default is one week from today)
	 * @return Array - dataset
	 */
	public function ShowUsersCumulativeLoggedInTime($date_selected = null) {
        if(!empty($date_selected)) {
            $timeSpan = db_convert("'".$date_selected."'" ,"datetime");
        } else {
            $firstDay = $GLOBALS['timedate']->get_first_day_of_week($GLOBALS['current_user']);
            $timeSpan = db_convert("'".$GLOBALS['timedate']->getNow()->get_day_by_index_this_week($firstDay)->asDb()."'" ,"datetime");
        }
		$args = array($timeSpan);
		$result = $this->execute($this->setup('ShowUsersCumulativeLoggedInTime', $args));
		$data = array();
	    foreach($result as $row) {
	    	$data[] = array('username'=>$row['user_name'],
                            'total_login_time'=>$this->convertSecondsToTime($row['total_login_time'], true)
                            );
	    }
	    return array_values($data);
	}


	private function convertSecondsToTime($seconds=0, $padHours=false) {
	    $val = "";
	    $hours = intval(intval($seconds) / 3600);

	    $val .= ($padHours) ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':' : $hours. ':';
	    $minutes = intval(($seconds / 60) % 60);

	    $val .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ':';
	    $seconds = intval($seconds % 60);

	    $val .= str_pad($seconds, 2, "0", STR_PAD_LEFT);
	    return $val;
	}


	/**
	 * Returns array of name/value pairs for the query methods where name is the localzied
	 * String label to display and value is the method to call
	 *
	 * @return array - array of name/value pairs for the query methods where name is the
	 * localzied String label to display and value is the method to call
	 */
	public function getComboData() {

		$tQueries = $this->getQueries();
        $module_strings = return_module_language($GLOBALS['current_language'], 'Trackers');
        $comboData = array();
        foreach($tQueries as $value){
        	$name = isset($module_strings[$value]) ? $module_strings[$value] : $value;
        	$comboData[] = array($name, $value);
        }
        return $comboData;
	}

	/**
	 * getDateSelectionQueries
	 *
	 * Returns an array of functions which support the date picker on th the dashlet. This is important
	 * because we do not want to show the Date Picker when it is not necessary, although even if it is shown
	 * it will not affect functionality. It may only lead to user confustion.
	 *
	 * @return array - array of query/function names which require the date picker to be active.
	 */
	public function getDateDependentQueries(){
		return array('ShowMyWeeklyActivities', 'ShowMyCumulativeLoggedInTime', 'ShowUsersCumulativeLoggedInTime');
	}

	/**
	 * Return a list of queries for the dashlet
	 *
	 * @return array - array of queries that can be run.
	 */
	private function getQueries(){
		$keys = array_keys($this->queries);
		//get methods
		$methods = get_class_methods($this);
		$methods = array_merge($methods, $this->included_methods);
		$blackList = array('__construct', '__call', 'getQueries', 'getComboData', 'execute', 'setup', 'getFileMethods', 'getDateDependentQueries', 'convertSecondsToTime', '_getTranslatedModuleName');
		$queryMethods = array();
		for($i = 0; $i < count($methods); $i++){
			if(!in_array($methods[$i], $blackList))
				$queryMethods[] = $methods[$i];
		}

		$queries = array_merge($keys, $queryMethods);
		$foundQueries = array();
		foreach($queries as $query){
			if(!in_array($query, $foundQueries))
				$foundQueries[] = $query;
		}
		return $foundQueries;
	}

	/**
	 * Execute a given query and return the data set.
	 *
	 * @param string $query - the query to execute
	 * @return array - rows of data.
	 */
	private function execute($query){
		if(!empty($query)){
			$db = &DBManagerFactory::getInstance('reports');
			$result = $db->query($query);
			$data = array();
			while($row = $db->fetchByAssoc($result)){
				$data[] = $row;
			}
			return $data;
		}else{
			return null;
		}
	}

	/**
	 * Given a query(method_name) and some arguments attempt to build the query
	 *
	 * @param string $query - the query to index
	 * @param array $args
	 * @return string - the query to execute
	 */
	private function setup($query, $args){
		if(!empty($this->queries[$query])){
			if(empty($args[0]))
				$args = array();
			return string_format($this->queries[$query], $args);
		}else{
			return null;
		}
	}

	/**
	 * Return list of functions defined in file.
	 *
	 * @param string $file
	 * @return array - an array of functions defined in the file.
	 */
	private function getFileMethods($file){
	    $arr = file($file);
	    foreach ($arr as $line)
	    {
	        if (preg_match ('/function ([_A-Za-z0-9]+)/', $line, $regs))
	            $arr_methods[] = $regs[1];
	    }
    	return $arr_methods;
	}

    /**
     * Translate the given module name into the current language
     *
     * @param  string $moduleName
     * @return string translated module name
     */
    protected function _getTranslatedModuleName(
        $moduleName
        )
    {
        $module_strings = return_module_language($GLOBALS['current_language'], $moduleName);

        // Bug 25524 - Translate the module name
        if (!empty($GLOBALS['app_list_strings']['moduleList'][$moduleName]))
            $moduleName = $GLOBALS['app_list_strings']['moduleList'][$moduleName];
        elseif ( $moduleName == 'ModuleBuilder' )
            $moduleName = $module_strings['LBL_MODULEBUILDER'];
        elseif ( isset($module_strings['LBL_MODULE_NAME']) )
            $moduleName = $module_strings['LBL_MODULE_NAME'];
        return $moduleName;
    }

}
?>

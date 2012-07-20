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

/*********************************************************************************

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/




class Common {

	var $db;
	var $all_users=array();  //array of userid's and reports_to_id
	var $my_managers=array();  //array of users current user reports to. direct and indirect
	var $my_downline=array();  //array of users reporting to current user. direct and indirect.
	var $current_user;  //logged in user's id
	var $my_direct_reports=array();
	var $my_timeperiods=array();
	var $my_name;

	var $start_date;
	var $end_date;
	var $timeperiod_name;
	var $timedate;

	//class constructor.
	function Common() {
	  global $db;
	  $this->db = $db;
	  if (empty($this->db)) {
	  	$this->db = DBManagerFactory::getInstance();
	  }

	  $this->timedate = TimeDate::getInstance();
	}

	function get_timeperiod_start_end_date($timeperiod_id) {

		$query = "SELECT id, start_date, end_date, name from timeperiods where id = '$timeperiod_id'";
		$result = $this->db->query($query,true,"Error fetching timeperiod:");
		$row = $this->db->fetchByAssoc($result);
		if ($row != null) {
			$this->start_date = $this->timedate->to_display_date($row['start_date'],false,false);
			$this->end_date = $this->timedate->to_display_date($row['end_date'], false, false);
			$this->timeperiod_name= $row['name'];
		}
	}

	//set the current user.
	function set_current_user($theUser) {
		//when the user id associated with the instance is changed
		//re-initialize the variable.
		$this->all_users = array();
		$this->my_direct_reports= array();

		$this->current_user = $theUser;
	}


	//flatten the reporting structure.
	function setup() {
		$this->get_all_users();
		$this->get_my_managers();
	}

	//flatten reporting hierarchy, load all  users and their manager's ID.
	function get_all_users() {
		global $locale;
		$query = "SELECT id, first_name, last_name, reports_to_id FROM users WHERE deleted=0 and status = 'Active'";
		$result = $this->db->query($query,true," Error filling in users list: ");

		while (($row  =  $this->db->fetchByAssoc($result)) != null) {
			//Add to all users array
			if ($row['id'] == $row['reports_to_id']) {
				$this->all_users[$row['id']]=null;
			} else  {

				$this->all_users[$row['id']]=$row['reports_to_id'];

				//Add to my direct reports array.
				if (isset($row['reports_to_id']) && $this->current_user == $row['reports_to_id'] ) {
					$this->my_direct_reports[$row['id']] = $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
				}

				//set name..
                //jclark - Bug 51212 - Forecasting user rollup shows incorrect user name
				if ("{$this->current_user}" == "{$row['id']}") {
					$this->my_name = $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
				}
			}
		}

		//print_r("<BR>all users <BR>");
		//_pp($this->all_users);
		//print_r("<BR>my_direct_reports <BR>");
		//_pp($this->my_direct_reports);
	}

	//get logged in user's managers.
	function get_my_managers() {
		$seen_user_before = array();
		$theuser= $this->current_user;

		while (!empty($theuser) && array_key_exists($theuser,$this->all_users)) {
			if (isset($seen_user_before[$theuser]) ) {
				// We have seen this user before, ignore them
				$theuser='';
				continue;
			}
			$seen_user_before[$theuser] = 1;
			if (!empty($this->all_users[$theuser])){
				$theuser=$this->all_users[$theuser];  //get manager's id
				$this->my_managers[]= $theuser;
			} else {
				$theuser='';
			}
		}

		//print_r("<BR>my managers <BR>");
		//_ppd($this->my_managers);
	}

	//return true if the logged in user is a manager.
	//a user is considered a manager if anybody report's to him/her
	function is_user_manager() {
	  if (count($this->my_direct_reports)> 0) {
	  		return true;}
	  else {
	  		return false;
	}}

	//using the forecast_schedule table find all the timeperiods the
	//logged in user needs to forecast for.
    //todo add date format for sqlserver.
	function get_my_timeperiods() {

        $nowdate = $this->db->now();
        //current system date must fall between forecast start date (forecast schedule) and end date (time period)
        //not checking systemdate against the time period start date because users may  want to start forecasting before the actual
        //time period begins.
        $query = "SELECT a.timeperiod_id, b.name, b.start_date, b.end_date, a.user_id, a.cascade_hierarchy"
            . " FROM forecast_schedule a, timeperiods b"
            . " WHERE a.timeperiod_id = b.id"
            . " AND a.forecast_start_date <= $nowdate "
            . " AND b.end_date >= $nowdate "
            . " AND a.deleted = 0"
            . " AND b.deleted = 0"
            . " AND a.status = 'Active'"
            . " ORDER BY b.start_date, b.end_date";
        //check whether the logged in user needs to forecast for this period or not.
        //for all the rows returned make sure that user_id is the logged in user
        //or someone this user report's to.
        $result = $this->db->query($query,false," Error filling in list of timeperiods to be forecasted: ");

        while (($row = $this->db->fetchByAssoc($result)) != null) {

            if ($row['user_id'] == $this->current_user || ( $row['cascade_hierarchy'] == '1' && in_array($row['user_id'],$this->my_managers)))  {

                if (!(array_key_exists($row['timeperiod_id'],$this->my_timeperiods))) {

                    $this->my_timeperiods[$row['timeperiod_id']]=$row['name'];
                }
            }
        }
    }

	//returns a list of timeperiods that users has commited forecats for.
	//sorted by timeperiod start date descending.
	function get_my_forecasted_timeperiods($the_user_id) {
		$my_forecasted_timeperiods = array();

		$query  = "SELECT distinct timeperiods.id, timeperiods.name, timeperiods.start_date";
		$query .= " FROM timeperiods, forecasts";
		$query .= " WHERE timeperiods.id = forecasts.timeperiod_id";
		$query .= " AND forecasts.user_id = '$the_user_id'";
		$query .= " ORDER BY start_date desc" ;

		$result = $this->db->query($query,false," Error filling in list of timeperiods to be forecasted: ");

		while (($row = $this->db->fetchByAssoc($result)) != null) {
 			$my_forecasted_timeperiods[$row['id']]=$row['name'];
		}

		return $my_forecasted_timeperiods;
	}

	function get_user_name($user_id) {
		global $locale;
		$query = "SELECT  first_name, last_name FROM users WHERE deleted=0 and id = '$user_id'";
		$result = $this->db->query($query,true," Error fetching user name: ");

		if (($row  =  $this->db->fetchByAssoc($result)) != null) {
			return $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
		}
	}

	function get_reports_to_id($user_id) {
		$query = "SELECT reports_to_id FROM users WHERE id = '$user_id'";
		$result = $this->db->query($query,true," Error fetching user's report's to Id : ");

		if (($row  =  $this->db->fetchByAssoc($result)) != null) {
			return $row['reports_to_id'];
		}
	}

	/* this method navigates the reporting hierarchy and produces a ordered list
	 * of users,and types of forecast they need to commit to.
	 * This function assumes that there is atleast one user in the system who does not reports to
	 * anybody.
	 */
	function get_forecast_commit_order() {
		$commit_order = array();

		$query = "select id from users where reports_to_id is null or reports_to_id = ''";
		$result = $this->db->query($query,true," Error fetching users who do not report to anybody: ");

		while (($row  =  $this->db->fetchByAssoc($result)) != null) {

			$this->process_users_downline($row['id'],$commit_order);
		}
		return $commit_order;
	}

	/*recursive function, adds a direct foreacast entry for the user, if the user has a downline,
	 * calls itself for each entry in the downline and then adds a rollup entry for the user. */
	function process_users_downline($user_id, &$commit_order) {
		//this user needs to commit a direct forecast.
		$commit_order[] = array("0"=>$user_id, "1"=>"Direct");

		//find the logged in user's downline
		$query = "SELECT id FROM users WHERE reports_to_id = '$user_id'";
		$result = $this->db->query($query,true," Error fetching user's reporting hierarchy: ");
		$found=0;
		while (($row  =  $this->db->fetchByAssoc($result)) != null) {
			$found++;
			$this->process_users_downline($row['id'],$commit_order);
		}
		if ($found > 0) {
			$commit_order[] = array("0"=>$user_id, "1"=>"Rollup");
		}
	}

	function retrieve_downline($user_id) {

		//find the logged in user's downline
		$query = "SELECT id FROM users WHERE reports_to_id = '$user_id'";
		$result = $this->db->query($query,true," Error fetching user's reporting hierarchy: ");
		while (($row  =  $this->db->fetchByAssoc($result)) != null) {
			$this->my_downline[]= $row['id'];
			$this->retrieve_downline($row['id']);
		}
	}
}


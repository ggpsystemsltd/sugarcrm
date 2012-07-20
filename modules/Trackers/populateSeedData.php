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


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



require_once('modules/Trackers/TrackerUtility.php');

require_once('install/UserDemoData.php');

class populateSeedData {

var $monitorIds = 500;
var $user = 1;
var $userDemoData;
var $modules = array('Accounts', 'Calls', 'Contacts', 'Leads', 'Meetings', 'Notes', 'Opportunities', 'Users');
var $actions = array('authenticate', 'detailview', 'editview', 'index', 'save', 'settimezone');
var $db;
var $beanIdMap = array();
var $userSessions = array();
var $trackerManager;

function start() {
    $this->db = DBManagerFactory::getInstance();
    $this->userDemoData = new UserDemoData($this->user, false);
    $this->trackerManager = TrackerManager::getInstance();

	foreach($this->modules as $mod) {
		$query = "select id from $mod";
		$result = $this->db->limitQuery($query, 0, 50);
		$ids = array();
		while(($row = $this->db->fetchByAssoc($result))) {
			   $ids[] = $row['id'];
		} //while
		$this->beanIdMap[$mod] = $ids;
	}

	while($this->monitorIds-- > 0) {
		$this->monitorId = create_guid();
		$this->trackerManager->setMonitorId($this->monitorId);
		$this->user = $this->userDemoData->guids[array_rand($this->userDemoData->guids)];
		$this->module = $this->modules[array_rand($this->modules)];
	    $this->action = $this->actions[array_rand($this->actions)];
	    $this->date = $this->randomTimestamp();
		$this->populate_tracker();
		$this->populate_tracker_perf();
		$this->populate_tracker_sessions();
		$this->populate_tracker_queries();
		$this->trackerManager->save();
	}
}

function populate_tracker() {
    if($monitor = $this->trackerManager->getMonitor('tracker')){
	    $monitor->setValue('user_id', $this->user);
	    $monitor->setValue('module_name', $this->module);
	    $monitor->setValue('action', $this->action);
	    $monitor->setValue('visible', (($monitor->action == 'detailview') || ($monitor->action == 'editview')) ? 1 : 0);
	    $monitor->setValue('date_modified', $this->randomTimestamp());
	    $monitor->setValue('session_id', $this->getSessionId());
	    $monitor->setValue('team_id', 1);
	    if($this->action != 'settimezone' && isset($this->beanIdMap[$this->module][array_rand($this->beanIdMap[$this->module])])) {
	       $monitor->setValue('item_id', $this->beanIdMap[$this->module][array_rand($this->beanIdMap[$this->module])]);
	       $monitor->setValue('item_summary', 'random stuff'); //don't really need this
	    }
	}
}

function populate_tracker_perf() {
    if($monitor2 = $this->trackerManager->getMonitor('tracker_perf')){
	    $responseTime = rand(10, 20);
	    $responseTime = $responseTime / rand(3,5);
	    $monitor2->setValue('server_response_time', number_format(round($responseTime,2),2));
	    $monitor2->setValue('db_round_trips', rand(10, 250));
	    $monitor2->setValue('files_opened', rand(10, 150));
	    $monitor2->setValue('memory_usage', rand(900000, 64000000));
	    $monitor2->setValue('date_modified', $this->randomTimestamp());
	}
}

function populate_tracker_sessions() {
    if($monitor3 = $this->trackerManager->getMonitor('tracker_sessions')){

	    $query = "UPDATE $monitor3->name SET active = 0 WHERE user_id = '$this->user'";
	    $result = $this->db->query($query);

	    $query = "SELECT * FROM $monitor3->name WHERE session_id = '".$this->getSessionId()."'";
	    $result = $this->db->query($query);
		$monitor3->setValue('session_id', $this->getSessionId($this->user));
	    $monitor3->setValue('client_ip', $_SERVER['REMOTE_ADDR']);
	    $monitor3->setValue('user_id', $this->user);

	    if(($row = $this->db->fetchByAssoc($result))) {
		    $monitor3->setValue('date_start', $this->db->fromConvert($row['date_start'], 'datetime'));
	    	$monitor3->setValue('round_trips', $row['round_trips'] + 1);
	    } else {
			$monitor3->setValue('date_start', TimeDate::getInstance()->nowDb());
	        $monitor3->setValue('round_trips', 1);
	    }
	    //$monitor3->setValue('date_end', $monitor3->date_start);

	    $monitor3->setValue('seconds', rand(2, 25000));
	    $date_end = TimeDate::getInstance()->fromDb($monitor3->date_start)->get("+{$monitor3->seconds} seconds")->asDb();
		$monitor3->setValue('date_end', $date_end);
	    $monitor3->setValue('active', 0);
	}
}

function populate_tracker_queries() {
   if($monitor4 = $this->trackerManager->getMonitor('tracker_queries')){
	    $sql = "INSERT INTO FOO VALUES ('Test', '{$monitor4->monitor_id}', 101, 'News Time', 'Our Latest Headlines', 4)";
	    $sql = $query = TrackerUtility::getGenericSQL($sql);
		$monitor4->setValue('text', $sql);
		$monitor4->setValue('query_id', $monitor4->monitor_id);
		$monitor4->setValue('query_hash', md5($monitor4->text));
		$monitor4->setValue('run_count', rand(1,25));
		$monitor4->setValue('sec_total', rand(200, 500));
		$monitor4->setValue('sec_avg', rand(200, 500));
	    $monitor4->setValue('date_modified', $this->randomTimestamp());
	}
	//Insert into tracker_tracker_queries here
	if($monitor5 = $this->trackerManager->getMonitor('tracker_tracker_queries')){
    	$monitor5->setValue('monitor_id', $monitor5->monitor_id);
    	$monitor5->setValue('date_modified', $monitor4->date_modified);
    	$monitor5->setValue('query_id', $monitor4->query_id);
	}
}

function randomTimestamp() {
   global $timedate;
   // 1201852800 is 1 Feb 2008
   return $timedate->fromTimestamp(rand(1201852800, $timedate->getNow()->ts))->asDb();
}

function getSessionId() {
   if(isset($this->userSessions[$this->user])) {
   	  return $this->userSessions[$this->user];
   }
   $this->userSessions[$this->user] = $this->monitorId;
   return $this->monitorId;
}

}

$test = new populateSeedData();
$test->start();

?>

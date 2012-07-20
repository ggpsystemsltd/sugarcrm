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


if(!empty($_REQUEST['save_schedule_msi'])){
	global $current_user, $timedate, $app_strings;
require_once('modules/Reports/schedule/ReportSchedule.php');
$rs = new ReportSchedule();
global $timedate;
if(!empty($_REQUEST['schedule_id'])){
	$id = $_REQUEST['schedule_id'];
}else{
	$id = '';	
}


if(!empty($_REQUEST['date_start'])){
	$date_start = $timedate->to_db($_REQUEST['date_start'], true);
}else{
	$date_start = '';	
}


if(!empty($_REQUEST['schedule_active']) ){
	$active = 1;
}else{
	$active = 0;	
}

if(!empty($_REQUEST['schedule_type']) ){
	$schedule_type = $_REQUEST['schedule_type'];
}else{
	$schedule_type = "pro";	
}

$rs->save_schedule($id,$current_user->id, $_REQUEST['id'],$date_start,$_REQUEST['schedule_time_interval'], $active, $schedule_type);
$refreshPage = (isset($_REQUEST['refreshPage']) ? $_REQUEST['refreshPage'] : "true");
if (!$active) {
	$date_start = $app_strings['LBL_LINK_NONE'];
} else {	
	if(empty($date_start)){
  		$date_start = gmdate($GLOBALS['timedate']->get_db_date_time_format(), time());
	} else {
  		$date_start = $timedate->handle_offset($date_start, $timedate->get_db_date_time_format(), false);
	}	
	$date_start = $timedate->to_display_date_time($date_start);
} // else

if ($refreshPage == "false") {
	echo "<script>opener.window.setSchuleTime('$date_start');window.close();</script>";	
} else {
	echo '<script>opener.window.location.reload();window.close();</script>';
}
}
?>
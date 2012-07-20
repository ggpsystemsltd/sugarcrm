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


require_once('include/DetailView/DetailView.php');

global $mod_strings;
global $app_strings;
global $timedate;

/* start standard DetailView layout process */
$GLOBALS['log']->info("Schedulers DetailView");
$focus = new Scheduler();
$focus->checkCurl();
$detailView = new DetailView();
$offset=0;
if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
	$result = $detailView->processSugarBean("SCHEDULER", $focus, $offset);
	if($result == null) {
	    sugar_die($app_strings['ERROR_NO_RECORD']);
	}
	$focus=$result;
} else {
	header("Location: index.php?module=Schedulers&action=index");
}
if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$focus->id = "";
}

$params = array();
$params[] = "<a href='index.php?module=Schedulers&action=index'>{$mod_strings['LBL_MODULE_TITLE']}</a>";
$params[] = $focus->name;

echo getClassicModuleTitle("Schedulers", $params, true);

/* end standard DetailView layout process */

$focus->parseInterval();
$focus->setIntervalHumanReadable();


$xtpl = new XTemplate('modules/Schedulers/DetailView.html');
// custom assigns
$focus->date_time_end = empty($focus->date_time_end) ? 0 : $focus->date_time_end; // this value is often emtpy/null
if(strtotime($focus->date_time_end) < strtotime('2016-01-01 00:00:00')) {
	$xtpl->assign('DATE_TIME_END', $mod_strings['LBL_PERENNIAL']);
} elseif($focus->date_time_end != '') {
	$xtpl->assign('DATE_TIME_END', $mod_strings['LBL_PERENNIAL']);
} else {
	$xtpl->assign('DATE_TIME_END', $focus->date_time_end);
}
if($focus->last_run != '') {
	$xtpl->assign('LAST_RUN', $focus->last_run);
} else {
	$xtpl->assign('LAST_RUN', $mod_strings['LBL_NEVER']);
}
if($focus->time_from != '') {
	$xtpl->assign('TIME_FROM', $focus->time_from);
} else {
	$xtpl->assign('TIME_FROM', $mod_strings['LBL_ALWAYS']);
}
if($focus->time_to != '') {
	$xtpl->assign('TIME_TO', $focus->time_to);
} else {
	$xtpl->assign('TIME_TO', $mod_strings['LBL_ALWAYS']);
}
if($focus->catch_up == 1) {
	$xtpl->assign('CATCH_UP', $mod_strings['LBL_ALWAYS']);
} else {
	$xtpl->assign('CATCH_UP', $mod_strings['LBL_NEVER']);
}

$focus->created_by_name = get_assigned_user_name($focus->created_by);
$focus->modified_by_name = get_assigned_user_name($focus->modified_user_id);

$xtpl->assign('MOD', $mod_strings);
$xtpl->assign('APP', $app_strings);
$xtpl->assign('CREATED_BY', $focus->created_by_name);
$xtpl->assign('MODIFIED_BY', $focus->modified_by_name);
$xtpl->assign('GRIDLINE', $gridline);
$xtpl->assign('PRINT_URL', 'index.php?'.$GLOBALS['request_string']);
$xtpl->assign('ID', $focus->id);
$xtpl->assign('NAME', $focus->name);
$xtpl->assign('JOB', $focus->job);
$xtpl->assign('STATUS',  isset($app_list_strings['scheduler_status_dom'][$focus->status]) ? $app_list_strings['scheduler_status_dom'][$focus->status] : $focus->status);
$xtpl->assign('DATE_TIME_START', $focus->date_time_start);
$xtpl->assign('DATE_ENTERED', $focus->date_entered);
$xtpl->assign('DATE_MODIFIED', $focus->date_modified);
$xtpl->assign('MODIFIED_USER_ID', $focus->modified_by_name);
$xtpl->assign('CREATED_BY', $focus->created_by_name);
$xtpl->assign('JOB_INTERVAL', $focus->intervalHumanReadable);

$xtpl->parse('main');
$xtpl->out('main');

require_once('include/SubPanel/SubPanelTiles.php');
$subpanel = new SubPanelTiles($focus, 'Schedulers');
echo $subpanel->display();

//$focus->displayCronInstructions();
?>

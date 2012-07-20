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

 * Description:
 ********************************************************************************/




require_once('include/DetailView/DetailView.php');


global $mod_strings;
global $app_strings;
global $app_list_strings;
global $focus, $support_coming_due, $support_expired;
$focus = new WorkFlow();
$detailView = new DetailView();
$offset=0;
if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
	$result = $detailView->processSugarBean("WORKFLOW", $focus, $offset);
	if($result == null) {
	    sugar_die($app_strings['ERROR_NO_RECORD']);
	}
	$focus=$result;
} else {
	header("Location: index.php?module=WorkFlow&action=index");
}
/*if(!empty($_REQUEST['record'])) {
    $result = $focus->retrieve($_REQUEST['record']);
    if($result == null)
    {
    sugar_die($app_strings['LBL_UNAUTH_ADMIN']);
        }
}
else {
	header("Location: index.php?module=WorkFlow&action=index");
}*/
$access = get_workflow_admin_modules_for_user($current_user);
if ((!is_admin($current_user) && !is_admin_for_any_module($current_user)) || (!empty($focus->base_module) && empty($access[$focus->base_module])))
{
   sugar_die("Unauthorized access to WorkFlow.");
}
if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$focus->id = "";
}

$params = array();
$params[] = "<a href='index.php?module=WorkFlow&action=index'>{$mod_strings['LBL_MODULE_NAME']}</a>";
$params[] = $focus->get_summary_text();

echo getClassicModuleTitle("WorkFlow", $params, true);

$GLOBALS['log']->info("WorkFlow detail view");

$xtpl=new XTemplate ('modules/WorkFlow/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("GRIDLINE", $gridline);
$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign('NAME', $focus->name);
$xtpl->assign('ID', $focus->id);
$xtpl->assign("DESCRIPTION", nl2br($focus->description));

if ($focus->status==1){
	$status = "Active";	
} else {
	$status = "Inactive";
}	
//UI Parameters
$xtpl->assign('FIRE_ORDER', $app_list_strings['wflow_fire_order_dom'][$focus->fire_order]);
$xtpl->assign('STATUS', $app_list_strings['user_status_dom'][$status]);
$xtpl->assign('TYPE', $app_list_strings['wflow_type_dom'][$focus->type]);
$xtpl->assign('RECORD_TYPE', $app_list_strings['wflow_record_type_dom'][$focus->record_type]);
$xtpl->assign('BASE_MODULE', $app_list_strings['moduleList'][$focus->base_module]);

$detailView->processListNavigation($xtpl, "WORKFLOW", $offset, $focus->is_AuditEnabled());
global $current_user;


// adding custom fields:
require_once('modules/DynamicFields/templates/Files/DetailView.php');


$xtpl->parse("main");
$xtpl->out("main");


//Sub Panels

$sub_xtpl = $xtpl;
$old_contents = ob_get_contents();
ob_end_clean();

if($sub_xtpl->var_exists('subpanel', 'SUBTRIGGERS')){
	ob_start();
echo "<p>\n";
global $focus_triggers_list, $focus_alerts_list, $focus_trigger_filters_list, $focus_actions_list;
// Now get the list of cases that match this one.
$focus_triggers_list = $focus->get_linked_beans('triggers','WorkFlowTriggerShell');
$focus_trigger_filters_list = $focus->get_linked_beans('trigger_filters','WorkFlowTriggerShell');

include('modules/WorkFlowTriggerShells/SubPanelView.php');

echo "</p>\n";


$subtriggers =  ob_get_contents();
ob_end_clean();
}



if($sub_xtpl->var_exists('subpanel', 'SUBALERTS')){
	ob_start();
echo "<p>\n";

// Now get the list of cases that match this one.
$focus_alerts_list = $focus->get_linked_beans('alerts','WorkFlowAlertShell');
include('modules/WorkFlowAlertShells/SubPanelView.php');

echo "</p>\n";
$subalerts =  ob_get_contents();
ob_end_clean();
}
if($sub_xtpl->var_exists('subpanel', 'SUBACTIONS')){
	ob_start();
echo "<p>\n";

// Now get the list of cases that match this one.
$focus_actions_list = $focus->get_linked_beans('actions','WorkFlowActionShell');
include('modules/WorkFlowActionShells/SubPanelView.php');

echo "</p>\n";
$subactions =  ob_get_contents();

ob_end_clean();
}



ob_start();
echo $old_contents;


if(!empty($subtriggers))$sub_xtpl->assign('SUBTRIGGERS', $subtriggers);

if(!empty($subalerts))$sub_xtpl->assign('SUBALERTS', $subalerts);
if(!empty($subactions))$sub_xtpl->assign('SUBACTIONS', $subactions);

$sub_xtpl->parse("subpanel");
$sub_xtpl->out("subpanel");

?>

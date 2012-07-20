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






global $mod_strings;
global $app_strings;
global $app_list_strings;
global $focus;
global $workflow_object;
global $focus_alertcomp_list;
$workflow_object = new WorkFlow();

$focus = new WorkFlowAlertShell();
if(!empty($_REQUEST['record'])) {
    $result = $focus->retrieve($_REQUEST['record']);
    if($result == null){
    	sugar_die($app_strings['LBL_UNAUTH_ADMIN']);
    } else {
    	$workflow_object->retrieve($focus->parent_id);
    }	
}
else {
	header("Location: index.php?module=WorkFlowAlertShells&module_tab=WorkFlow&action=index");
}

//Get the meta information
$focus->retrieve_meta_information();


if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$focus->id = "";
}
echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings[$focus->target_meta_array['module_title']],$focus->name), true);
$GLOBALS['log']->info("WorkFlow detail view");

$xtpl=new XTemplate ('modules/WorkFlowAlertShells/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("GRIDLINE", $gridline);
$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign('ID', $focus->id);
$xtpl->assign('NAME', $focus->name);

	if($focus->source_type != "Custom Template"){
		$xtpl->assign("MOD_ALERT_TEXT", $mod_strings['LBL_ALERT_TEXT']);
		$xtpl->assign("ALERT_TEXT", nl2br($focus->alert_text));
	}
	
	
$xtpl->assign('ALERT_TYPE', $app_list_strings['wflow_alert_type_dom'][$focus->alert_type]);
$xtpl->assign('SOURCE_TYPE', $app_list_strings['wflow_source_type_dom'][$focus->source_type]);

$xtpl->assign('PARENT_ID', $focus->parent_id);
$xtpl->assign('WORKFLOW_TYPE', $workflow_object->type);

//$xtpl->assign('WORKFLOW_NAME', $workflow_object->name);


	$target_workflow_object = $workflow_object->get_parent_object();
	$xtpl->assign('FINAL_PARENT_ID', $target_workflow_object->id);
	$xtpl->assign('FINAL_WORKFLOW_NAME', $target_workflow_object->name);

global $current_user;


// adding custom fields:
require_once('modules/DynamicFields/templates/Files/DetailView.php');


if($workflow_object->parent_id!=""){
	
	//don't show delete button.  Only allow deletion through the parent object
	
} else {

	//Show delete button.
	$xtpl->parse("main.delete_button");	
	
	
}	



$xtpl->parse("main");
$xtpl->out("main");

//Sub Panels

$sub_xtpl = $xtpl;
$old_contents = ob_get_contents();
ob_end_clean();





if($sub_xtpl->var_exists('subpanel', 'SUBALERTCOMPS')){
	ob_start();
echo "<p>\n";


$focus_alertcomp_list = $focus->get_linked_beans('alert_components','WorkFlowAlert', array(), 0, -1, 0);
include('modules/WorkFlowAlerts/SubPanelView.php');

echo "</p>\n";
$subalertcomp =  ob_get_contents();
ob_end_clean();
}




ob_start();
echo $old_contents;

if(!empty($subalertcomp))$sub_xtpl->assign('SUBALERTCOMPS', $subalertcomp);

$sub_xtpl->parse("subpanel");
$sub_xtpl->out("subpanel");
?>

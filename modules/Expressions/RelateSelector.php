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

global $theme;







global $app_strings;
global $app_list_strings;
global $mod_strings;
global $sugar_version, $sugar_config;

global $urlPrefix;
global $currentModule;

$log = LoggerManager::getLogger('workflow_alerts');

$workflow_object = new WorkFlow();

if(!empty($_REQUEST['workflow_id']) && $_REQUEST['workflow_id']!="") {
    $workflow_object->retrieve($_REQUEST['workflow_id']);
} else {
	sugar_die("You shouldn't be here");	
}	



////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
	$form =new XTemplate ('modules/Expressions/RelateSelector.html');
	$log->debug("using file modules/Expressions/RelateSelector.html");

$form->assign("MOD", $mod_strings);
$form->assign("APP", $app_strings);
$form->assign("BASE_MODULE", $workflow_object->base_module);
$form->assign("TYPE", $_REQUEST['type']);
$form->assign("WORKFLOW_ID", $workflow_object->id);
$form->assign("PLEASE_SEL", $mod_strings['LBL_PLEASE_SEL_TARGET']);
$form->assign("ASSOCIATED_WITH", $mod_strings['LBL_ASSOCIATED_WITH']);

if($_REQUEST['type']=='new_rel') {

	$temp_module = get_module_info($workflow_object->base_module);
	$temp_module->call_vardef_handler("rel_filter");
	$temp_module->vardef_handler->start_none=true;
	$temp_module->vardef_handler->start_none_lbl = $mod_strings['LBL_PLEASE_SELECT'];

	
	$form->assign("SELECTOR_JSCRIPT_RETURN", "'href_".$_REQUEST['type']."','rel_module','action_module'");
	$form->assign("SELECTOR_TAG", $mod_strings['LBL_REL1']);
	$var_def_array2 = $temp_module->vardef_handler->get_vardef_array(true, true, true, true);
	$form->assign("SELECTOR_DROPDOWN", get_select_options_with_id($var_def_array2,$_REQUEST['rel_module1']));
	
	if(!empty($_REQUEST['rel_module1']) && $_REQUEST['rel_module1']!=''){
		$rel_module_name = $_REQUEST['rel_module1'];
		
		$rel_module = $workflow_object->get_rel_module($rel_module_name);
        


		//ensures that rel2 is selected
		$form->assign("SELECT_REL2", "Yes");
	
	
	if(!empty($_REQUEST['rel_module2']) && $_REQUEST['rel_module2']!=""){
			$rel_module2 = $_REQUEST['rel_module2'];
		} else {
			$rel_module2 = "";	
		}	
		
		$temp_module2 = get_module_info($rel_module);
		$temp_module2->call_vardef_handler("rel_filter");
		$temp_module2->vardef_handler->start_none=true;
		$temp_module2->vardef_handler->start_none_lbl = $mod_strings['LBL_PLEASE_SELECT'];
		
		$var_def_array2 = $temp_module2->vardef_handler->get_vardef_array(true, '', true, true);
		$rel_select2 = get_select_options_with_id($var_def_array2,$rel_module2);	
	
		$form->assign("SELECTOR_TAG2", $mod_strings['LBL_REL2']);
		$form->assign("SELECTOR_DROPDOWN2", $rel_select2);
	
	//end if we should show second related
	}
	
	
//end if action type is set  
}


$form->assign("MODULE_NAME", $currentModule);
//$form->assign("FORM", $_REQUEST['form']);
$form->assign("GRIDLINE", $gridline);

insert_popup_header($theme);
$form->parse("embeded");
$form->out("embeded");


$form->parse("main");
$form->out("main");

?>

<?php insert_popup_footer(); ?>

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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

global $current_user;
$workflow_modules = get_workflow_admin_modules_for_user($current_user);
if (!is_admin($current_user) && empty($workflow_modules))
{
   sugar_die("Unauthorized access to WorkFlow.");
}











$seedEmailTemplate = new EmailTemplate();
$workflow_object = new WorkFlow();
global $app_strings;
global $app_list_strings;
global $mod_strings;
$current_module_strings = return_module_language($current_language, 'EmailTemplates');
$header_text = '';
global $list_max_entries_per_page;
global $urlPrefix;
if(empty($_POST['mass']) && empty($where) && empty($_REQUEST['query'])){$_REQUEST['query']='true'; $_REQUEST['current_user_only']='checked'; };

global $currentModule;

// focus_list is the means of passing data to a ListView.
global $focus_list;

echo getClassicModuleTitle($mod_strings['LBL_MODULE_ID'], array($mod_strings['LBL_ALERT_TEMPLATES']), true); 

require_once('modules/MySettings/StoreQuery.php');
$storeQuery = new StoreQuery();
if(!isset($_REQUEST['query'])){
	$storeQuery->loadQuery($currentModule);
	$storeQuery->populateRequest();
}else{
	$storeQuery->saveFromGet($currentModule);	
}

$where = " base_module IS NOT NULL";


echo "<p><p>";

//echo get_form_header($mod_strings['LBL_ALERT_TEMPLATES']. $header_text, "", false);



/////////////Display Alert Template Stuff//

	$template_form=new XTemplate ('modules/WorkFlow/TemplateForm.html');
	$template_form->assign("MOD", $current_module_strings);
	$template_form->assign("APP", $app_strings);
	$template_form->assign("BASE_MODULE", get_select_options_with_id($workflow_object->get_module_array(),""));
	$template_form->parse("main");
	$template_form->out("main");


global $title;
$display_title = $mod_strings['LBL_ALERT_TEMPLATES'];
if ($title) $display_title = $title;

$ListView = new ListView();

$ListView->initNewXTemplate( 'modules/WorkFlow/WorkFlowListView.html',$current_module_strings);
$ListView->setHeaderTitle($display_title . $header_text);
$ListView->show_export_button = false;
$ListView->show_delete_button = false;
$ListView->show_select_menu = false;
global $image_path;
$ListView->xTemplateAssign("RETURN_URL", "&return_module=".$currentModule."&return_action=WorkFlowListView");
$ListView->xTemplateAssign("DELETE_INLINE_PNG", SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']));
$workflow_strings = return_module_language($current_language, 'WorkFlow');
$ListView->xTemplateAssign("NTC_REMOVE_ALERT", $workflow_strings['NTC_REMOVE_ALERT']);
$ListView->setQuery($where, "", "email_templates.date_entered DESC", "EMAIL_TEMPLATE", false);
$ListView->processListView($seedEmailTemplate, "main", "EMAIL_TEMPLATE");
?>

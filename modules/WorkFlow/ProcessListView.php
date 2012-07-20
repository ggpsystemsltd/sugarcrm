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









$workflow_object = new WorkFlow();
global $app_strings;
global $app_list_strings;
global $mod_strings;
$header_text = '';
global $list_max_entries_per_page;
global $urlPrefix;
if(empty($_POST['mass']) && empty($where) && empty($_REQUEST['query'])){$_REQUEST['query']='true'; $_REQUEST['current_user_only']='checked'; };
$log = LoggerManager::getLogger('process_list');

global $currentModule;

// focus_list is the means of passing data to a ListView.
global $focus_list;

echo getClassicModuleTitle($mod_strings['LBL_MODULE_ID'], array($mod_strings['LBL_PROCESS_LIST'])	, true); 

if(!empty($_REQUEST['base_module']) && $_REQUEST['base_module']){
	
	$target_base_module = $_REQUEST['base_module'];
	
} else {

	$target_base_module = "";
	
}	



require_once('modules/MySettings/StoreQuery.php');
$storeQuery = new StoreQuery();
if(!isset($_REQUEST['query'])){
	$storeQuery->loadQuery($currentModule);
	$storeQuery->populateRequest();
}else{
	$storeQuery->saveFromGet($currentModule);	
}

$where = "base_module!=''";


echo "<p><p>";

//echo get_form_header($mod_strings['LBL_PROCESS_LIST']. $header_text, "", false);

$base_module = $workflow_object->get_limited_module_array();
$access = get_workflow_admin_modules_for_user($current_user);
foreach($base_module as $key=>$values){
   if(empty($access[$key])){
       unset($base_module[$key]);
   }   
}

/////////////Display Alert Template Stuff//

	$template_form=new XTemplate ('modules/WorkFlow/ProcessTemplateForm.html');
	$template_form->assign("MOD", $mod_strings);
	$template_form->assign("APP", $app_strings);
	$template_form->assign("BASE_MODULE", get_select_options_with_id($base_module,$target_base_module));
	$template_form->assign("TARGET_BASE_MODULE", $target_base_module);
	$template_form->parse("main");
	$template_form->out("main");

if($target_base_module!=""){
global $title;
$display_title = $mod_strings['LNK_PROCESS_VIEW'].": ".$app_list_strings['moduleList'][$target_base_module];
if ($title) $display_title = $title;




	$where = "workflow.base_module='".$target_base_module."'";
	
	$ListView = new ListView();

    $ListView->show_export_button = false;
    $ListView->show_delete_button = false;
    $ListView->show_select_menu = false;
	$ListView->initNewXTemplate( 'modules/WorkFlow/ProcessListView.html',$mod_strings);
	$ListView->setHeaderTitle($display_title . $header_text);
	$ListView->xTemplateAssign("TARGET_BASE_MODULE", $target_base_module);
	$ListView->xTemplateAssign('UPARROW_INLINE', SugarThemeRegistry::current()->getImage('uparrow_inline','align="absmiddle" border="0"',null,null,'.gif',$mod_strings['LBL_UP']));
	$ListView->xTemplateAssign('DOWNARROW_INLINE', SugarThemeRegistry::current()->getImage('downarrow_inline','align="absmiddle"  border="0"',null,null,'.gif',$mod_strings['LBL_DOWN']));
	$ListView->setQuery($where, "", "", "WORKFLOW");
	$ListView->query_orderby = "workflow.list_order_y ASC";
	$ListView->processListView($workflow_object, "main", "WORKFLOW");

}	
	
	?>

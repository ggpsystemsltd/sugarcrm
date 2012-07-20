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





require_once('modules/Roles/Forms.php');
require_once('include/DetailView/DetailView.php');

global $mod_strings;
global $app_strings;
global $app_list_strings;
global $current_user;

if (!is_admin($current_user)) sugar_die("Unauthorized access to administration.");

$focus = new Role();

$detailView = new DetailView();
$offset=0;
if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
	$result = $detailView->processSugarBean("ROLE", $focus, $offset);
	if($result == null) {
	    sugar_die($app_strings['ERROR_NO_RECORD']);
	}
	$focus=$result;
} else {
	header("Location: index.php?module=Accounts&action=index");
}
echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings['LBL_MODULE_NAME'],$focus->get_summary_text()), true);


$GLOBALS['log']->info("Role detail view");

$xtpl=new XTemplate ('modules/Roles/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("GRIDLINE", $gridline);
$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("RETURN_MODULE", "Roles");
$xtpl->assign("RETURN_ACTION", "DetailView");
$xtpl->assign("ACTION", "EditView");

$xtpl->assign("NAME", $focus->name);
$xtpl->assign("DESCRIPTION", nl2br(url2html($focus->description)));

$detailView->processListNavigation($xtpl, "ROLE", $offset);

require_once("include/templates/TemplateGroupChooser.php");
require_once("modules/MySettings/TabController.php");

$chooser = new TemplateGroupChooser();
$controller = new TabController();
$chooser->args['id'] = 'edit_tabs';

if(isset($_REQUEST['record']))
{
	$chooser->args['values_array'][0] = $focus->query_modules(1);
	$chooser->args['values_array'][1] = $focus->query_modules(0);

	foreach ($chooser->args['values_array'][0] as $key=>$value)
	{
		$chooser->args['values_array'][0][$value] = $app_list_strings['moduleList'][$value];
		unset($chooser->args['values_array'][0][$key]);
	}

	foreach ($chooser->args['values_array'][1] as $key=>$value)
	{
		$chooser->args['values_array'][1][$value] = $app_list_strings['moduleList'][$value];
		unset($chooser->args['values_array'][1][$key]);

	}
}
else
{
	$chooser->args['values_array'] = $controller->get_tabs_system();
	foreach ($chooser->args['values_array'][0] as $key=>$value)
	{
		$chooser->args['values_array'][0][$key] = $app_list_strings['moduleList'][$key];
	}
	foreach ($chooser->args['values_array'][1] as $key=>$value)
	{
	$chooser->args['values_array'][1][$key] = $app_list_strings['moduleList'][$key];
	}

}
	
$chooser->args['left_name'] = 'display_tabs';
$chooser->args['right_name'] = 'hide_tabs';
$chooser->args['left_label'] =  $mod_strings['LBL_ALLOWED_MODULES'];
$chooser->args['right_label'] =  $mod_strings['LBL_DISALLOWED_MODULES'];
$chooser->args['title'] =  $mod_strings['LBL_ASSIGN_MODULES'];

$chooser->args['disable'] = true;
$xtpl->assign("TAB_CHOOSER", $chooser->display());

$xtpl->parse("main");
$xtpl->out("main");

$sub_xtpl = $xtpl;
$old_contents = ob_get_contents();
ob_end_clean();
ob_start();
echo $old_contents;

require_once('include/SubPanel/SubPanelTiles.php');
$subpanel = new SubPanelTiles($focus, 'Roles');
echo $subpanel->display();
?>
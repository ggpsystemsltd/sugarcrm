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




global $timedate;
global $app_strings;
global $app_list_strings;
global $current_language;
global $current_user;
global $sugar_version, $sugar_config;
$focus = new Project();



if(!empty($_REQUEST['record']))
{
    $focus->retrieve($_REQUEST['record']);
}

if ($focus->is_template){
	echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'],
						 array($mod_strings['LBL_PROJECT_TEMPLATE'] . ': ' . $focus->name), true);
}
else{
	echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings['LBL_MODULE_NAME'],$focus->name), true);

}



$GLOBALS['log']->info("Project detail view");

$sugar_smarty = new Sugar_Smarty();
///
/// Assign the template variables
///
$sugar_smarty->assign('MOD', $mod_strings);
$sugar_smarty->assign('APP', $app_strings);
$sugar_smarty->assign('name', $focus->name);

$sugar_smarty->assign('PRINT_URL', "index.php?".$GLOBALS['request_string']);
$sugar_smarty->assign('ID', $focus->id);
$sugar_smarty->assign('NAME', $focus->name);

// awu: Bug 11820 - date entered was not conforming to correct date in Oracle
$focus->fetched_row['estimated_start_date'] = $focus->estimated_start_date;
$focus->fetched_row['estimated_end_date'] = $focus->estimated_end_date;
$focus->fetched_row['date_entered'] = $timedate->nowDbDate();
$focus->fetched_row['date_modified'] = $timedate->nowDbDate();

// populate form with project's data
$sugar_smarty->assign('PROJECT_FORM', $focus->fetched_row);

if ($focus->is_template){
	$sugar_smarty->assign('SAVE_TYPE', "TemplateToProject");
	$sugar_smarty->assign('SAVE_TO', "project");
	$sugar_smarty->assign('SAVE_TO_LBL', $mod_strings['LBL_PROJECT_NAME']);
	$sugar_smarty->assign('SAVE_BUTTON', $mod_strings['LBL_SAVE_AS_NEW_PROJECT_BUTTON']);
}
else{
	$sugar_smarty->assign('SAVE_TYPE', "ProjectToTemplate");
	$sugar_smarty->assign('SAVE_TO', "template");
	$sugar_smarty->assign('SAVE_TO_LBL', $mod_strings['LBL_TEMPLATE_NAME']);
	$sugar_smarty->assign('SAVE_BUTTON', $mod_strings['LBL_SAVE_AS_NEW_TEMPLATE_BUTTON']);
}

echo $sugar_smarty->fetch('modules/Project/Convert.tpl');


$javascript = new javascript();
$javascript->setFormName('EditView');
$javascript->setSugarBean($focus);
$javascript->addAllFields('');
if ($focus->is_template){
	$javascript->addFieldGeneric('project_name', 'varchar', $mod_strings['LBL_PROJECT_NAME'] ,'true');
}
else{
	$javascript->addFieldGeneric('template_name', 'varchar', $mod_strings['LBL_TEMPLATE_NAME'] ,'true');
}

echo $javascript->getScript();

?>

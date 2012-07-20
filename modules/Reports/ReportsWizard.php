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


require_once('modules/Reports/config.php');


require_once('modules/Reports/Report.php');
require_once('modules/Reports/templates/templates_reports.php');

$is_owner =  true;
global $current_user;
if (isset($args['reporter']->saved_report) && $args['reporter']->saved_report->assigned_user_id != $current_user->id) {
	$is_owner = false;
}

if(!(ACLController::checkAccess('Reports', 'edit', $is_owner)))
{
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}
global $mod_strings, $ACLAllowedModules, $current_language, $app_list_strings, $app_strings, $sugar_config, $sugar_version;

$params = array();
$params[] = $mod_strings['LBL_CREATE_CUSTOM_REPORT'];
echo getClassicModuleTitle("Reports", $params, false);

$ACLAllowedModules = getACLAllowedModules();
uksort($ACLAllowedModules,"juliansort");

$buttons = array();

require_once("modules/MySettings/TabController.php");
$controller = new TabController();
$tabs = $controller->get_user_tabs($current_user, $type='display');
//$ACLAllowedModulesAdded = array();
$help_img = SugarThemeRegistry::current()->getImage('helpInline','border="0" onmouseout="return nd();" onmouseover="return overlib(\''.$mod_strings['LBL_OPTIONAL_HELP'].'\', FGCLASS, \'olFgClass\', CGCLASS, \'olCgClass\', BGCLASS, \'olBgClass\', TEXTFONTCLASS, \'olFontClass\', CAPTIONFONTCLASS, \'olCapFontClass\', CLOSEFONTCLASS, \'olCloseFontClass\');"',null,null,'.gif',$mod_strings['LBL_HELP']);
$chart_data_help = SugarThemeRegistry::current()->getImage('helpInline','border="0" onmouseout="return nd();" onmouseover="return overlib(\''.$mod_strings['LBL_CHART_DATA_HELP'].'\', FGCLASS, \'olFgClass\', CGCLASS, \'olCgClass\', BGCLASS, \'olBgClass\', TEXTFONTCLASS, \'olFontClass\', CAPTIONFONTCLASS, \'olCapFontClass\', CLOSEFONTCLASS, \'olCloseFontClass\');"',null,null,'.gif',$mod_strings['LBL_HELP']);
$do_round_help = SugarThemeRegistry::current()->getImage('helpInline','border="0" onmouseout="return nd();" onmouseover="return overlib(\''.$mod_strings['LBL_DO_ROUND_HELP'].'\', FGCLASS, \'olFgClass\', CGCLASS, \'olCgClass\', BGCLASS, \'olBgClass\', TEXTFONTCLASS, \'olFontClass\', CAPTIONFONTCLASS, \'olCapFontClass\', CLOSEFONTCLASS, \'olCloseFontClass\');"'
,null,null,'.gif',$mod_strings['LBL_HELP']);

// Add the modules in the order of the user-defined tabs.
/*
foreach ($tabs as $tabModuleKey=>$tabModuleKeyValue)
{
	if (isset($ACLAllowedModules[$tabModuleKey])) {
		if (file_exists($image_path1."icon_".$tabModuleKey."_32.gif"))
			array_push($buttons, array('name'=>$app_list_strings['moduleList'][$tabModuleKey], 'img'=> SugarThemeRegistry::current()->getImageURL("icon_".$tabModuleKey."_32.gif"), 'key'=>$tabModuleKey));
		else
			array_push($buttons, array('name'=>$app_list_strings['moduleList'][$tabModuleKey], 'img'=> SugarThemeRegistry::current()->getImageURL("icon_A1_newmod.gif"),'alt'=> $mod_strings['LBL_NO_IMAGE'], 'key'=>$tabModuleKey));
		$ACLAllowedModulesAdded[$tabModuleKey] = 1;
	}
}
*/
// Add the remaining modules.
foreach ($ACLAllowedModules as $module=>$singular) {
	//if (!isset($ACLAllowedModulesAdded[$module])) {
	    if($module == 'Currencies') continue;
        $icon_name = _getIcon($module."_32");
        if (empty($icon_name)){
            $icon_name = _getIcon($module);
        }
        if (empty($icon_name)){
            $icon_name = "icon_A1_newmod.gif";
        }
        $buttons[] = array('name'=>$app_list_strings['moduleList'][$module], 'img'=> $icon_name, 'key'=>$module);
	//}
}

$user_array = get_user_array(FALSE);

$sugar_smarty = new Sugar_Smarty();
$sugar_smarty->assign("MOD", $mod_strings);
$sugar_smarty->assign("APP", $app_strings);
$sugar_smarty->assign("LANG", $current_language);
$sugar_smarty->assign("ACLAllowedModules", $ACLAllowedModules);
$sugar_smarty->assign("USER_ID_MD5", md5($current_user->id));
$sugar_smarty->assign("BUTTONS", $buttons);
$sugar_smarty->assign("IS_ADMIN", $current_user->is_admin);
$sugar_smarty->assign("users_array", $user_array);
$sugar_smarty->assign("help_image", $help_img);
$sugar_smarty->assign("chart_data_help", $chart_data_help);
$sugar_smarty->assign("do_round_help", $do_round_help);
$sugar_smarty->assign("js_custom_version", $sugar_config['js_custom_version']);
$sugar_smarty->assign("sugar_version", $sugar_version);


$chart_types = array(
	'none'=>$mod_strings['LBL_NO_CHART'],
	'hBarF'=>$mod_strings['LBL_HORIZ_BAR'],
	'vBarF'=>$mod_strings['LBL_VERT_BAR'],
	'pieF'=>$mod_strings['LBL_PIE'],
	'funnelF'=>$mod_strings['LBL_FUNNEL'],
	'lineF'=>$mod_strings['LBL_LINE'],
);

//$chart_description = htmlentities($reporter->chart_description, ENT_QUOTES, 'UTF-8');
$sugar_smarty->assign('chart_types', $chart_types);
//$sugar_smarty->assign('chart_description', $chart_description);

require_once('include/SugarCharts/SugarChartFactory.php');
$sugarChart = SugarChartFactory::getInstance();
$resources = $sugarChart->getChartResources();
$sugar_smarty->assign('chartResources', $resources);
	
if (isset($_REQUEST['run_query']) && ($_REQUEST['run_query'] == 1))
	$sugar_smarty->assign("RUN_QUERY", '1');
else
	$sugar_smarty->assign("RUN_QUERY", '0');

if (isset($_REQUEST['save_report_as']))
	$sugar_smarty->assign("save_report_as", $_REQUEST['save_report_as']);
else
	$sugar_smarty->assign("save_report_as", "");

if (isset($_REQUEST['id']))
	$sugar_smarty->assign("id", $_REQUEST['id']);

if (isset($_REQUEST['show_query']))
	$sugar_smarty->assign("show_query", $_REQUEST['show_query']);

if (isset($_REQUEST['do_round']))
	$sugar_smarty->assign("do_round", $_REQUEST['do_round']);


js_setup($sugar_smarty);

if (isset($_REQUEST['run_query']) && ($_REQUEST['run_query'] == 1)) {
	$args = array();
	$report_def = array();
	if ( ! empty($_REQUEST['report_def'])) {
		$report_def = html_entity_decode($_REQUEST['report_def']);
		$panels_def = html_entity_decode($_REQUEST['panels_def']);
		$filters_def = html_entity_decode($_REQUEST['filters_defs']);
	   	$args['reporter'] =  new Report($report_def, $filters_def, $panels_def);
		$sugar_smarty->assign('report_def_str', $args['reporter']->report_def_str);
	}
	if (isset($_REQUEST['id']))
		$sugar_smarty->assign('record', $_REQUEST['id']);

	$assigned_user_html_def = array(
		'parent_id'=>'assigned_user_id',
		'parent_id_value'=>$_REQUEST['assigned_user_id'],
		'parent_name'=>'assigned_user_name',
		'parent_name_value'=>$_REQUEST['assigned_user_name'],
		'real_parent_name'=>'user_name',
		'module'=>'Users',
	  );
	$assigned_user_html = get_select_related_html($assigned_user_html_def);
	$isOwner = 0;
	if ($_REQUEST['assigned_user_id'] == $current_user->id)
		$isOwner = 1;
	$sugar_smarty->assign("IS_OWNER", $isOwner);
	require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
	$teamSetField = new SugarFieldTeamset('Teamset');
	$field_defs = VardefManager::loadVardef('Reports', 'SavedReport');
	$teamSetField->initClassicView($GLOBALS['dictionary']['SavedReport']['fields'], 'ReportsWizardForm');
	$team_html = $teamSetField->getClassicView();
	$sugar_smarty->assign("TEAM_HTML", $team_html);
	$sugar_smarty->assign("USER_HTML", $assigned_user_html);
	$sugar_smarty->assign("report_offset", $args['reporter']->report_offset);
	$sugar_smarty->assign("chart_description", htmlentities( $args['reporter']->chart_description, ENT_QUOTES, 'UTF-8'));

	setSortByInfo($args['reporter'], $sugar_smarty);

	echo $sugar_smarty->fetch('modules/Reports/ReportsWizard.tpl');
	echo "<br/><br/>";
	echo "<div id='resultsDiv' name='resultsDiv'>";
	//$image_path = $orig_image_path;
	reportResults($args['reporter'],$args);
	echo "</div>";

}
else if (isset($_REQUEST['save_report']) && ($_REQUEST['save_report'] == 'on')) {
	$args = array();
	$report_def = array();
	if ( ! empty($_REQUEST['report_def'])) {
		$report_def = html_entity_decode($_REQUEST['report_def']);
		$panels_def = html_entity_decode($_REQUEST['panels_def']);
		$filters_def = html_entity_decode($_REQUEST['filters_defs']);
	}

	if (!empty($_REQUEST['id'])) {
		$saved_report_seed = new SavedReport();
		$saved_report_seed->disable_row_level_security = true;
		$saved_report_seed->retrieve($_REQUEST['id'], false);
//		$args['reporter'] = new Report($saved_report_seed->content);
	   	$args['reporter'] =  new Report($report_def, $filters_def, $panels_def);
		$args['reporter']->saved_report = &$saved_report_seed;
		$args['reporter']->is_saved_report = true;
		$args['reporter']->saved_report_id = $saved_report_seed->id;
	} else {
	   	$args['reporter'] =  new Report($report_def, $filters_def, $panels_def);
	}
	$sugar_smarty->assign('report_def_str', $args['reporter']->report_def_str);
	$sugar_smarty->assign('current_step', $_REQUEST['current_step']);

	$newReport = false;
	if (empty($args['reporter']->saved_report_id)) {
		$newReport = true;
	} // if
   	$args['reporter']->save($_REQUEST['save_report_as']);
	$sugar_smarty->assign("record", $args['reporter']->saved_report->id);
	// Put this newly created report in the report_cache table so that in the list view of reports it will be shown first
	$newArray = array();
	$newArray['filters_def'] = $args['reporter']->report_def['filters_def'];
	$encodedFilterData = $global_json->encode($newArray);
	if ($newReport) {
		saveReportFilters($args['reporter']->saved_report->id, $encodedFilterData);
	} else {
		updateReportAccessDate($args['reporter']->saved_report_id, $encodedFilterData);
	} // else

	if (isset($_REQUEST['save_and_run_query']) && ($_REQUEST['save_and_run_query'] == 'on')) {
		header('location:index.php?action=ReportCriteriaResults&module=Reports&page=report&id='.$args['reporter']->saved_report->id);
	}
	else {
		$assigned_user_html_def = array(
			'parent_id'=>'assigned_user_id',
			'parent_id_value'=>$_REQUEST['assigned_user_id'],
			'parent_name'=>'assigned_user_name',
			'parent_name_value'=>$_REQUEST['assigned_user_name'],
			'real_parent_name'=>'user_name',
			'module'=>'Users',
		  );
		$assigned_user_html = get_select_related_html($assigned_user_html_def);

		$isOwner = 0;
		if ($_REQUEST['assigned_user_id'] == $current_user->id)
			$isOwner = 1;
		$sugar_smarty->assign("IS_OWNER", $isOwner);
		require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
		$teamSetField = new SugarFieldTeamset('Teamset');
		$field_defs = VardefManager::loadVardef('Reports', 'SavedReport');
		$teamSetField->initClassicView($GLOBALS['dictionary']['SavedReport']['fields'], 'ReportsWizardForm');
		$team_html = $teamSetField->getClassicView();

		$sugar_smarty->assign("TEAM_HTML", $team_html);
		$sugar_smarty->assign("USER_HTML", $assigned_user_html);
		$sugar_smarty->assign("report_offset", $args['reporter']->report_offset);
		$sugar_smarty->assign("chart_description", htmlentities( $args['reporter']->chart_description, ENT_QUOTES, 'UTF-8'));
		setSortByInfo($args['reporter'], $sugar_smarty);
		echo $sugar_smarty->fetch('modules/Reports/ReportsWizard.tpl');

		if (!empty($_REQUEST['current_step']) && $_REQUEST['current_step']=='report_details'){
			echo "<br/><br/>";
			echo "<div id='resultsDiv' name='resultsDiv'>";
			//$image_path = $orig_image_path;
			reportResults($args['reporter'],$args);
			echo "</div>";
		}
	}
}
else if (isset($_REQUEST['is_delete']) && ($_REQUEST['is_delete'] == '1')) {
    $report = new SavedReport();
    $report->retrieve($_REQUEST['id']);
    if($report->ACLAccess('Delete')){
        $report->mark_deleted($_REQUEST['id']);
		header('location:index.php?action=index&module=Reports');
    }

}
else if (!empty($_REQUEST['id'])) {
	$saved_report_seed = new SavedReport();
	$saved_report_seed->disable_row_level_security = true;
	$saved_report_seed->retrieve($_REQUEST['id'], false);
	$args['reporter'] = new Report($saved_report_seed->content);
	$args['reporter']->saved_report = &$saved_report_seed;
	$args['reporter']->is_saved_report = true;
	$args['reporter']->saved_report_id = $saved_report_seed->id;
	$sugar_smarty->assign('report_def_str', $args['reporter']->report_def_str);
	if (!isset($args['reporter']->report_def['do_round']) || $args['reporter']->report_def['do_round'] == 1)
			$sugar_smarty->assign("do_round", 1);

	// Duplicate Functionality
	if (!empty($_REQUEST['save_as'])) {
		$assigned_user_html_def = array(
			'parent_id'=>'assigned_user_id',
			'parent_id_value'=>$current_user->id,
			'parent_name'=>'assigned_user_name',
			'parent_name_value'=>$current_user->user_name,
			'real_parent_name'=>'user_name',
			'module'=>'Users',
		  );
		$assigned_user_html = get_select_related_html($assigned_user_html_def);

		if (!empty($_REQUEST['save_as_report_type'])) {
			$new_report_type = $_REQUEST['save_as_report_type'];
			$prev_report_type = $args['reporter']->report_def['report_type'];
			$report_def = $args['reporter']->report_def;
			if ($new_report_type == 'summation') {
				$report_def['report_type'] = 'summary';
				if(isset($report_def['layout_options']))
					unset($report_def['layout_options']);
				$report_def['display_columns'] = array();
			}
			else if ($new_report_type == 'tabular') {
				$report_def['report_type'] = $new_report_type;
				$report_def['group_defs'] = array();
				if(isset($report_def['layout_options']))
					unset($report_def['layout_options']);
				$report_def['summary_columns'] = array();
			}
			else if ($new_report_type == 'summation_with_details') {
				if(isset($report_def['layout_options']))
					unset($report_def['layout_options']);
				$report_def['report_type'] = $new_report_type;
			}
			else if ($new_report_type == 'matrix') {
				$report_def['report_type'] = 'summary';
				$report_def['layout_options'] = '1';
				$report_def['display_columns'] = array();
			}


			$args['reporter'] = new Report($global_json->encode($report_def));
			$sugar_smarty->assign('report_def_str', $args['reporter']->report_def_str);
		}
	}
	else {
		$sugar_smarty->assign('record', $_REQUEST['id']);

		$sugar_smarty->assign('save_report_as', html_entity_decode($saved_report_seed->name, ENT_QUOTES));
		$assigned_user_html_def = array(
			'parent_id'=>'assigned_user_id',
			'parent_id_value'=>$saved_report_seed->assigned_user_id,
			'parent_name'=>'assigned_user_name',
			'parent_name_value'=>$saved_report_seed->assigned_user_name,
			'real_parent_name'=>'user_name',
			'module'=>'Users',
		  );
		$assigned_user_html = get_select_related_html($assigned_user_html_def);

	}
	$isOwner = 0;
	if ($saved_report_seed->assigned_user_id == $current_user->id)
		$isOwner = 1;
	$sugar_smarty->assign("IS_OWNER", $isOwner);
	require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
	$teamSetField = new SugarFieldTeamset('Teamset');
	$field_defs = VardefManager::loadVardef('Reports', 'SavedReport');
	$teamSetField->initClassicView($GLOBALS['dictionary']['SavedReport']['fields'], 'ReportsWizardForm');
	$team_html = $teamSetField->getClassicView();

	$sugar_smarty->assign("TEAM_HTML", $team_html);
	$sugar_smarty->assign("USER_HTML", $assigned_user_html);
	$sugar_smarty->assign("report_offset", $args['reporter']->report_offset);
	$sugar_smarty->assign("chart_description", htmlentities( $args['reporter']->chart_description, ENT_QUOTES, 'UTF-8'));

	setSortByInfo($args['reporter'], $sugar_smarty);

	echo $sugar_smarty->fetch('modules/Reports/ReportsWizard.tpl');
}
else {
	$assigned_user_html_def = array(
		'parent_id'=>'assigned_user_id',
		'parent_id_value'=>$current_user->id,
		'parent_name'=>'assigned_user_name',
		'parent_name_value'=>$current_user->user_name,
		'real_parent_name'=>'user_name',
		'module'=>'Users',
	  );
	$assigned_user_html = get_select_related_html($assigned_user_html_def);

	$sugar_smarty->assign("do_round", 1);
	require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
	$teamSetField = new SugarFieldTeamset('Teamset');
	$field_defs = VardefManager::loadVardef('Reports', 'SavedReport');
	$teamSetField->initClassicView($GLOBALS['dictionary']['SavedReport']['fields'], 'ReportsWizardForm');
	$team_html = $teamSetField->getClassicView();
	$sugar_smarty->assign("TEAM_HTML", $team_html);
	$sugar_smarty->assign("USER_HTML", $assigned_user_html);
	$sugar_smarty->assign("report_offset", $args['reporter']->report_offset);
	$sugar_smarty->assign("chart_description", htmlentities( $args['reporter']->chart_description, ENT_QUOTES, 'UTF-8'));
	setSortByInfo($args['reporter'], $sugar_smarty);

	echo $sugar_smarty->fetch('modules/Reports/ReportsWizard.tpl');
}

function setSortByInfo(&$reporter, &$smarty) {
	$sort_by = '';
	$sort_dir = '';
	$summary_sort_by = '';
	$summary_sort_dir = '';

	if (isset($reporter->report_def['order_by'][0]['name']) && isset($reporter->report_def['order_by'][0]['table_key'])) {
		$sort_by = $reporter->report_def['order_by'][0]['table_key'].":".$reporter->report_def['order_by'][0]['name'];
	} // if
	if (isset($reporter->report_def['order_by'][0]['sort_dir'])) {
		$sort_dir = $reporter->report_def['order_by'][0]['sort_dir'];
	} // if

	if ( ! empty($reporter->report_def['summary_order_by'][0]['group_function']) && $reporter->report_def['summary_order_by'][0]['group_function'] == 'count') {

	  $summary_sort_by = 'count';
	} else if ( isset($reporter->report_def['summary_order_by'][0]['name'])) {
		$summary_sort_by = $reporter->report_def['summary_order_by'][0]['table_key'].":".$reporter->report_def['summary_order_by'][0]['name'];

		if ( ! empty($reporter->report_def['summary_order_by'][0]['group_function'])) {
			$summary_sort_by .=":". $reporter->report_def['summary_order_by'][0]['group_function'];
		} else if ( ! empty($reporter->report_def['summary_order_by'][0]['column__function'])) {
	    	$summary_sort_by .=":". $reporter->report_def['summary_order_by'][0]['column_function'];
	    } // else if
	} // else if

	if ( isset($reporter->report_def['summary_order_by'][0]['sort_dir'])) {
		$summary_sort_dir = $reporter->report_def['summary_order_by'][0]['sort_dir'];
	} // if

	$smarty->assign('sort_by', $sort_by);
	$smarty->assign('sort_dir', $sort_dir);
	$smarty->assign('summary_sort_by', $summary_sort_by);
	$smarty->assign('summary_sort_dir', $summary_sort_dir);

} // fn

/*
function juliansort($a,$b)
{
	global $app_list_strings;
 	if ($app_list_strings['moduleList'][$a] > $app_list_strings['moduleList'][$b])
 	{
  		return 1;
 	}
 	return -1;
}
*/
?>

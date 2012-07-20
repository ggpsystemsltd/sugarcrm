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

require_once('modules/Reports/templates/templates_group_chooser.php');
require_once('modules/Reports/ReportCache.php');
require_once('modules/Reports/templates/templates_reports_functions_js.php');
require_once('modules/Reports/templates/templates_list_view.php');
//require_once('modules/Reports/templates/templates_modules_def_js.php');
require_once('modules/Reports/templates/templates_reports_request_js.php');

require_once('modules/Reports/config.php');

require_once('modules/Reports/templates/templates_chart.php');
require_once('modules/Reports/schedule/ReportSchedule.php');
global $global_json;
$global_json = getJSONobj();



//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function reportCriteriaWithResult(&$reporter,&$args) {
	global $current_user,$theme;
	global $current_language;
	global $mod_strings, $app_strings, $timedate;
	global $sugar_config, $sugar_version;

	$sort_by = '';
	$sort_dir = '';
	$summary_sort_by = '';
	$summary_sort_dir = '';
	$report_type = '';


	$smarty = new Sugar_Smarty();

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
	if ( isset($reporter->report_def['report_type'])) {
		$report_type = $reporter->report_def['report_type'];
	} // if

	$issetSaveResults = false;
	$isSaveResults = false;
	if (isset($args['save_result'])) {
		$issetSaveResults = true;
		$smarty->assign('save_report_as_str', $_REQUEST['save_report_as']);
		if($args['save_result']) {
			$isSaveResults = true;
		} // if
	} // if
	if ($report_type == 'tabular') {
		$duplicateButtons = '<button class="button" onclick="showDuplicateOverlib(\'tabular\');" type="button">' .
				$app_strings['LBL_DUPLICATE_BUTTON_LABEL'].SugarThemeRegistry::current()->getImage("more", 'border="0" align="absmiddle"', null, null, ".gif", $mod_strings['LBL_MORE']).'</button>';
	}
	// Summation with Details
	else if ($report_type == 'summary' && (!empty($reporter->report_def['display_columns']) && count($reporter->report_def['display_columns']) > 0 )) {
		$canCovertToMatrix = 0;
		if ((!empty($reporter->report_def['group_defs']) && count($reporter->report_def['group_defs']) <= 3  ))
			$canCovertToMatrix = 1;
		$duplicateButtons = '<button class="button" onclick="showDuplicateOverlib(\'summation_with_details\','.$canCovertToMatrix.');" type="button">' .
				$app_strings['LBL_DUPLICATE_BUTTON_LABEL'].SugarThemeRegistry::current()->getImage("more", 'border="0" align="absmiddle"', null, null, ".gif", $mod_strings['LBL_MORE']).'</button>';
	} 
	// Matrix
	else if ($report_type == 'summary' && (!empty($reporter->report_def['layout_options']))) {
		$duplicateButtons = '<button class="button" onclick="showDuplicateOverlib(\'matrix\');" type="button">' .
				$app_strings['LBL_DUPLICATE_BUTTON_LABEL'].SugarThemeRegistry::current()->getImage("more", 'border="0" align="absmiddle"', null, null, ".gif", $mod_strings['LBL_MORE']).'</button>';
	} 

	// Summation
	else if ($report_type == 'summary') {
		$canCovertToMatrix = 0;
		if ((!empty($reporter->report_def['group_defs']) && count($reporter->report_def['group_defs']) <= 3  ))
			$canCovertToMatrix = 1;
		$duplicateButtons = '<button class="button" onclick="showDuplicateOverlib(\'summation\','.$canCovertToMatrix.');" type="button">' .
				$app_strings['LBL_DUPLICATE_BUTTON_LABEL'].SugarThemeRegistry::current()->getImage("more", 'border="0" align="absmiddle"', null, null, ".gif", $mod_strings['LBL_MORE']).'</button>';
	} 	

    $smarty->assign('duplicateButtons', $duplicateButtons);
	$smarty->assign('mod_strings', $mod_strings);
	$smarty->assign('app_strings', $app_strings);
	$smarty->assign('current_language', $current_language);
	$smarty->assign('sugar_config', $sugar_config);
	$smarty->assign('sugar_version', $sugar_version);
	$smarty->assign('issetSaveResults', $issetSaveResults);
	$smarty->assign('isSaveResults', $isSaveResults);
	$smarty->assign('report_type', $report_type);
	$smarty->assign('reportDetailView', getReportDetailViewString($reporter,$args));
	$smarty->assign('reporter', $reporter);
	$smarty->assign('reporterArgs', $args);
	$form_header = get_form_header( $mod_strings['LBL_TITLE'].": ".$args['reporter']->saved_report->name, "", false);
	$smarty->assign('form_header', $form_header);
	$smarty->assign('report_offset', $reporter->report_offset);
	$smarty->assign('sort_by', $sort_by);
	$smarty->assign('sort_dir', $sort_dir);
	$smarty->assign('summary_sort_by', $summary_sort_by);
	$smarty->assign('summary_sort_dir', $summary_sort_dir);

	if (isset($_REQUEST['save_as']) &&  $_REQUEST['save_as'] == 'true') {
	    $report_id = '';
	} else if (isset($reporter->saved_report->id) ) {
	    $report_id = $reporter->saved_report->id;
	} elseif(!empty($_REQUEST['record'])) {
	    $report_id = $_REQUEST['record'];
	} else {
	    $report_id = '';
	} // else

	$smarty->assign('report_id', $report_id);
	$smarty->assign('to_pdf', isset($_REQUEST['to_pdf']) ? $_REQUEST['to_pdf'] : "");
	$smarty->assign('to_csv', isset($_REQUEST['to_csv']) ? $_REQUEST['to_csv'] : "");

	$isAdmin = false;
	if ($current_user->is_admin) {
		$isAdmin = true;
	} // if
	$smarty->assign('isAdmin', $isAdmin);
	if ($isAdmin) {
		$smarty->assign('show_query', true);
		if (!empty($_REQUEST['show_query'])) {
			$smarty->assign('show_query_checked', true);
		} // if
	} // if

	$schedule_value = $app_strings['LBL_LINK_NONE'];
	if(isset($args['reporter']->saved_report->schedule_id) && $args['reporter']->saved_report->active == 1) {
		$schedule_value = $timedate->to_display_date_time($args['reporter']->saved_report->next_run);
	} // if
	$smarty->assign('schedule_value', $schedule_value);

	$current_favorites = $current_user->getPreference('favorites', 'Reports');
	if (!is_array($current_favorites)){
		$current_favorites = array();
	}
	$report_ids_array = array_keys($current_favorites, $current_user->id);
	if (!is_array($report_ids_array)) {
		$report_ids_array = array();
	} // if

	if (isset($args['warnningMessage'])) {
		$smarty->assign('warnningMessage', $args['warnningMessage']);
	} // if
	$is_owner =  true;
	if (isset($args['reporter']->saved_report) && $args['reporter']->saved_report->assigned_user_id != $current_user->id) {
		$is_owner = false;
	} // if
	$report_edit_access = false;
	if(ACLController::checkAccess('Reports', 'edit', $is_owner)) {
		$report_edit_access = true;
	} // if
	$smarty->assign('report_edit_access', $report_edit_access);
	$report_export_access = false;
	if(ACLController::checkAccess('Reports', 'export', $is_owner)) {
		$report_export_access = true;
	} // if

	$isExportAccess = false;
	if(!ACLController::checkAccess('Reports', 'export', $is_owner) || $sugar_config['disable_export'] || (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($reporter->module) && ACLAction::getUserAccessLevel($current_user->id,$reporter->module, 'access') == ACL_ALLOW_ENABLED && ACLAction::getUserAccessLevel($current_user->id, $reporter->module, 'admin') == ACL_ALLOW_ADMIN)))){
		// no op
	} else {
		if ($reporter->report_def['report_type'] == 'tabular') {
			$isExportAccess = true;
		}
	} // else

	$smarty->assign('report_export_access', $report_export_access);
	$smarty->assign('report_export_as_csv_access', $isExportAccess);
	$smarty->assign('form_submit', empty($_REQUEST['form_submit']) ? false : $_REQUEST['form_submit']);

	$global_json = getJSONobj();
	global $ACLAllowedModules;
	$ACLAllowedModules = getACLAllowedModules();
	$smarty->assign('ACLAllowedModules', $global_json->encode(array_keys($ACLAllowedModules)));

	template_reports_filters($smarty, $args);
	$smarty->assign('reporter_report_type', $args['reporter']->report_type);
	$smarty->assign('current_user_id', $current_user->id);
	$smarty->assign('md5_current_user_id', md5($current_user->id));
	if (!hasRuntimeFilter($reporter)) {
		//$showRunReportButton = false;
		$smarty->assign('filterTabStyle', "display:none");
	} else {
		$smarty->assign('filterTabStyle', "display:''");
	}
	$smarty->assign('reportResultHeader', $mod_strings['LBL_REPORT_RESULTS']);
	$reportDetailsButtonTitle = $mod_strings['LBL_REPORT_HIDE_DETAILS'];
	$reportDetailsTableStyle = '';
	if (isset($args['reportCache'])) {
		$reportCache = $args['reportCache'];
		if (!empty($reportCache->report_options_array)) {
			if (array_key_exists("showDetails", $reportCache->report_options_array) && !$reportCache->report_options_array['showDetails']) {
				$reportDetailsButtonTitle = $mod_strings['LBL_REPORT_SHOW_DETAILS'];
				$reportDetailsTableStyle = 'display:none';
			}
		} // if
	} // if



	$smarty->assign('reportDetailsButtonTitle', $reportDetailsButtonTitle);
	$smarty->assign('reportDetailsTableStyle', $reportDetailsTableStyle);
    $smarty->assign('cache_path', sugar_cached(''));
	template_reports_request_vars_js($smarty, $reporter,$args);
	//custom chart code
    require_once('include/SugarCharts/SugarChartFactory.php');
    $sugarChart = SugarChartFactory::getInstance();
	$resources = $sugarChart->getChartResources();
	$smarty->assign('chartResources', $resources);
	$smarty->assign('id', empty($_REQUEST['id']) ? false : $_REQUEST['id']);

	echo $smarty->fetch("modules/Reports/templates/_reportCriteriaWithResult.tpl");

	reportResults($reporter, $args);
} // fn

function hasRuntimeFilter(&$reporter) {
	$hasRuntimeFilter = false;
	if (count($reporter->report_def['filters_def']) <= 0) {
		return false;
	}
	$filterDefs = $reporter->report_def['filters_def']['Filter_1'];
	$hasRuntimeFilter = checkRunTimeFilter($filterDefs, $hasRuntimeFilter);
	return $hasRuntimeFilter;
} // fn

function checkRunTimeFilter($filters, $isRunTimeFilter) {
	if ($isRunTimeFilter) {
		return $isRunTimeFilter;
	} // if
	$i = 0;
	while (isset($filters[$i])) {
		$current_filter = $filters[$i];
		if (isset($current_filter['operator'])) {
			$isRunTimeFilter = checkRunTimeFilter($current_filter, $isRunTimeFilter);
			if ($isRunTimeFilter) {
				return $isRunTimeFilter;
			} // if
		}
		else {
			if(isset($current_filter['runtime']) && $current_filter['runtime'] == 1) {
				$isRunTimeFilter = true;
				return $isRunTimeFilter;
			} // if
		}
		$i++;
	} // while
} // fn

function checkFilterModified($filters, $filterModified, &$newFilters) {
	if ($filterModified) {
		return $filterModified;
	} // if
	if (isset($filters['operator']) || isset($newFilters['operator'])) {
		if ((isset($filters['operator']) && !isset($newFilters['operator'])) ||
			(!isset($filters['operator']) && isset($newFilters['operator'])) ||
			($filters['operator'] != $newFilters['operator'])) {

			$filterModified = true;
			return $filterModified;
		} // if
	}
	$i = 0;
	while (isset($filters[$i])) {
		$current_filter = $filters[$i];
		if (!isset($newFilters[$i])) {
			$filterModified = true;
			return true;
		} // if
		$new_filter = $newFilters[$i];
		if (isset($current_filter['operator'])) {
			if (!isset($new_filter['operator'])) {
				$filterModified = true;
				return true;
			}
			$filterModified = checkFilterModified($current_filter, $filterModified, $new_filter);
			if ($filterModified) {
				return true;
			} // if
		} else {
			if(($current_filter['name'] != $new_filter['name'])
				|| ($current_filter['table_key'] != $new_filter['table_key'])) {
				$filterModified = true;
				return true;
			} // if
			if((isset($current_filter['runtime']) && !isset($new_filter['runtime']))
				|| (!isset($current_filter['runtime']) && isset($new_filter['runtime']))) {
				$filterModified = true;
				return true;
			} // if

			//do not perform this check if runtime filter
			if(!isset($current_filter['runtime']) && !isset($new_filter['runtime'])) {
				$item = 0;
				$stop = false;
				while(!$stop){
					if ( !isset($current_filter['input_name'.$item]) && !isset($new_filter['input_name'.$item])){
						$stop = true;
					}else if( (isset($current_filter['input_name'.$item]) && !isset($new_filter['input_name'.$item])) || ( !isset($current_filter['input_name'.$item]) && isset($new_filter['input_name'.$item]))){
						$stop = true;
						$filterModified = true;
						return $filterModified;
					}else if($current_filter['input_name'.$item] != $new_filter['input_name'.$item]){
						$stop = true;
						$filterModified = true;
						return $filterModified;
					}else{
						$item++;
					}
				}
			}//fi
		} // else
		if(!isset($current_filter['runtime']) && !isset($new_filter['runtime'])) {
			$newFilters[$i] = $filters[$i];
		} // if
		$i++;
	} // while
	return $filterModified;
} // fn

function getFlatListFilterContents($filters, &$filterContentsArray) {
	$i = 0;
	if (isset($filters['operator'])) {
		$filterContentsArray[] = $filters['operator'];
	}
	while (isset($filters[$i])) {
		$current_filter = $filters[$i];
		if (isset($current_filter['operator'])) {
			$filterContentsArray[] = $current_filter['operator'];
			getFlatListFilterContents($current_filter, $filterContentsArray);
		}
		else {
			$filterContentsArray[] = $current_filter;
		} // else
		$i++;
	} // while
} // fn

function hasReportFilterModified($reportId, $filtersContent) {
	$returnArray = array();
	$reportCache = new ReportCache();
	$isModified = false;
	if ($reportCache->retrieve($reportId)) {
		if ((is_array($filtersContent) && !is_array($reportCache->contents_array)) ||
			(!is_array($filtersContent) && is_array($reportCache->contents_array)) ||
			(!empty($filtersContent) && empty($reportCache->contents_array)) ||
			(empty($filtersContent) && !empty($reportCache->contents_array))) {

				$isModified = true;
		} else {
				$filterContentsArray = array();
				getFlatListFilterContents($filtersContent['Filter_1'], $filterContentsArray);
				$reportCacheFilterContentsArray = array();
				getFlatListFilterContents($reportCache->contents_array['filters_def']['Filter_1'], $reportCacheFilterContentsArray);
				if (count($filterContentsArray) != count($reportCacheFilterContentsArray)) {
					$isModified = true;
				} else {
					$isModified = checkFilterModified($filtersContent['Filter_1'], $isModified, $reportCache->contents_array['filters_def']['Filter_1']);
				}
		} // else
	} // if
	$returnArray['reportCache'] = $reportCache;
	$returnArray['isModified'] = $isModified;
	return $returnArray;

} // fn

function saveReportFilters($reportId, $filtersContent) {
	$reportCache = new ReportCache();
	$reportCache->retrieve($reportId);
	if (empty($reportCache->id)) {
		$reportCache->id = $reportId;
		$reportCache->new_with_id = true;
	}
	$reportCache->contents = $filtersContent;
	$reportCache->save();
	return $reportCache;
} // fn

function updateReportAccessDate($reportId, $filtersContent) {
	$reportCache = new ReportCache();
	$reportCache->retrieve($reportId);
	if (empty($reportCache->id)) {
		$reportCache->id = $reportId;
		$reportCache->new_with_id = true;
		$reportCache->contents = $filtersContent;
		$reportCache->save();
	} else {
		$reportCache->update();
	}
} // fn

function getReportCacheObject($reportId) {
	$reportCache = new ReportCache();
	$reportCache->retrieve($reportId);
	return $reportCache;
} // fn

function updateReportOptions($reportId, $reportOptionsArray) {
	$reportCache = new ReportCache();
	$reportCache->retrieve($reportId);
	if (empty($reportCache->id)) {
		$reportCache->new_with_id = true;
	} // if
	$reportCache->updateReportOptions($reportOptionsArray);
} // fn

function getReportDetailViewString(&$reporter,&$args) {
	global $mod_strings, $app_strings;
	$order   = array("\r\n", "\n", "\r");
	$classname = "dataLabel";
	$reportName = $reporter->name;
	$focus = $reporter->saved_report;
	$assignedUserName = '';
	$assignedTeamName = '';
	$reportType = ($reporter->report_def['report_type'] == 'tabular' ? $mod_strings['LBL_ROWS_AND_COLUMNS_REPORT'] : $mod_strings['LBL_SUMMATION_REPORT']);

	$detailViewString = "<table border=0 width=\'50%\' cellspacing=\'0\' cellpadding=\'0\'><tr class={$classname}><td class={$classname}>{$mod_strings['LBL_REPORT_NAME']}:";
	$detailViewString = $detailViewString . str_replace($order, "", $reportName);
	$detailViewString = $detailViewString . "</td>";
	$detailViewString = $detailViewString . "<td class={$classname}>{$mod_strings['LBL_REPORT_TYPE']}:";
	$detailViewString = $detailViewString . $reportType . "</td>";
	$detailViewString = $detailViewString . "</tr></table>";
	return $detailViewString;
}

function template_reports_report(&$reporter,&$args) {

	global $current_user;
	global $current_language;
	global $mod_strings, $app_strings;
	global $sugar_config, $sugar_version;

	$sort_by = '';
	$sort_dir = '';
	$summary_sort_by = '';
	$summary_sort_dir = '';
	$report_type = '';


	$smarty = new Sugar_Smarty();

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
	if ( isset($reporter->report_def['report_type'])) {
		$report_type = $reporter->report_def['report_type'];
	} // if

	$issetSaveResults = false;
	$isSaveResults = false;
	if (isset($args['save_result'])) {
		$issetSaveResults = true;
		$smarty->assign('save_report_as_str', $_REQUEST['save_report_as']);
		if($args['save_result']) {
			$isSaveResults = true;
		} // if
	} // if

	$smarty->assign('mod_strings', $mod_strings);
	$smarty->assign('app_strings', $app_strings);
	$smarty->assign('current_language', $current_language);
	$smarty->assign('sugar_config', $sugar_config);
	$smarty->assign('sugar_version', $sugar_version);
	$smarty->assign('issetSaveResults', $issetSaveResults);
	$smarty->assign('isSaveResults', $isSaveResults);
	$smarty->assign('report_type', $report_type);

	$form_header = get_form_header($mod_strings['LBL_TITLE'].": ".$args['reporter']->saved_report->name, "", false);
	$smarty->assign('form_header', $form_header);
	$smarty->assign('report_offset', $reporter->report_offset);
	$smarty->assign('sort_by', $sort_by);
	$smarty->assign('sort_dir', $sort_dir);
	$smarty->assign('summary_sort_by', $summary_sort_by);
	$smarty->assign('summary_sort_dir', $summary_sort_dir);

	if (isset($_REQUEST['save_as']) &&  $_REQUEST['save_as'] == 'true') {
	    $report_id = '';
	} else if (isset($reporter->saved_report->id) ) {
	    $report_id = $reporter->saved_report->id;
	} elseif(!empty($_REQUEST['record'])) {
	    $report_id = $_REQUEST['record'];
	} else {
	    $report_id = '';
	} // else

	$smarty->assign('report_id', $report_id);
	$smarty->assign('to_pdf', isset($_REQUEST['to_pdf']) ? $_REQUEST['to_pdf'] : "");
	$smarty->assign('to_csv', isset($_REQUEST['to_csv']) ? $_REQUEST['to_csv'] : "");

	$is_owner =  true;
	if (isset($args['reporter']->saved_report) && $args['reporter']->saved_report->assigned_user_id != $current_user->id) {
		$is_owner = false;
	} // if
	$report_edit_access = false;
	if(ACLController::checkAccess('Reports', 'edit', $is_owner)) {
		$report_edit_access = true;
	} // if
	$smarty->assign('report_edit_access', $report_edit_access);
	$report_export_access = false;
	if(ACLController::checkAccess('Reports', 'export', $is_owner)) {
		$report_export_access = true;
	} // if
	$smarty->assign('report_export_access', $report_export_access);
	$smarty->assign('form_submit', empty($_REQUEST['form_submit']) ? false : $_REQUEST['form_submit']);

	$global_json = getJSONobj();
	global $ACLAllowedModules;
	$ACLAllowedModules = getACLAllowedModules();
	$smarty->assign('ACLAllowedModules', $global_json->encode(array_keys($ACLAllowedModules)));

	require_once('include/tabs.php');

	$tabs = array();

	array_push($tabs,array('title'=>$mod_strings['LBL_1_REPORT_ON'],'link'=>'module_join_tab','key'=>'module_join_tab'));
	array_push($tabs,array('title'=>$mod_strings['LBL_2_FILTER'],'link'=>'filters_tab','key'=>'filters_tab'));
	//array_push($tabs,array('title'=>$mod_strings['LBL_3_GROUP'],'link'=>'group_by_tab','key'=>'group_by_tab'));
	//array_push($tabs,array('title'=>$mod_strings['LBL_3_CHOOSE'],'link'=>'columns_tab','key'=>'columns_tab'));
	if ( $args['reporter']->report_type == 'tabular') {
	  array_push($tabs,array('title'=>$mod_strings['LBL_3_GROUP'],'hidden'=>true,'link'=>'group_by_tab','key'=>'group_by_tab'));
	  array_push($tabs,array('title'=>$mod_strings['LBL_3_CHOOSE'],'link'=>'columns_tab','key'=>'columns_tab'));
	  array_push($tabs,array('title'=>$mod_strings['LBL_5_CHART_OPTIONS'],'hidden'=>true,'link'=>'chart_options_tab','key'=>'chart_options_tab'));
	} else {
	  array_push($tabs,array('title'=>$mod_strings['LBL_3_GROUP'],'link'=>'group_by_tab','key'=>'group_by_tab'));
	  array_push($tabs,array('title'=>$mod_strings['LBL_4_CHOOSE'],'link'=>'columns_tab','key'=>'columns_tab'));
	  array_push($tabs,array('title'=>$mod_strings['LBL_5_CHART_OPTIONS'],'link'=>'chart_options_tab','key'=>'chart_options_tab'));
	}

	$current_key = 'module_join_tab';
	$tab_panel= new SugarWidgetTabs($tabs,$current_key,'showReportTab');
	$smarty->assign('tab_panel_display', $tab_panel->display());

	template_reports_tables($smarty, $args);

	if( $reporter->report_type=='summary') {
		$summary_display = '';
	 	if ( $reporter->show_columns) {
	 		$column_display = '';
	 	} else {
	  		$column_display = 'none';
	 	} // else
	} else {
		 $summary_display = 'none';
		 $column_display = '';
	} // else

	$summary_join_selector = '&nbsp;<div style="padding-bottom:2px">'.$mod_strings['LBL_MODULE'].': <select onChange="viewJoinChanged(this);" id="view_join_summary" name="view_join_summary"></select></div>';

	$chooser_args_summary = array('id'=>'summary_table','title'=>$mod_strings['LBL_CHOOSE_SUMMARIES'].':','left_name'=>'display_summary','right_name'=>'hidden_summary','left_label'=>$mod_strings['LBL_DISPLAY_SUMMARIES'],'right_label'=>$summary_join_selector,'display'=>$summary_display,'onmoveleft'=>'reload_columns(\'join\')','onmoveright'=>'reload_columns(\'join\')');

	$join_selector = '&nbsp;<div style="padding-bottom:2px">'.$mod_strings['LBL_MODULE'].': <select onChange="viewJoinChanged(this);" id="view_join" name="view_join"></select></div>';

	$chooser_args = array('id'=>'columns_table','title'=>$mod_strings['LBL_CHOOSE_COLUMNS'].':','left_name'=>'display_columns','right_name'=>'hidden_columns','left_label'=>$mod_strings['LBL_DISPLAY_COLUMNS'],'right_label'=>$join_selector,'display'=>$column_display,'topleftcontent'=>$join_selector,'onmoveleft'=>'reload_columns(\'join\')','onmoveright'=>'reload_columns(\'join\')');

	$smarty->assign('template_grups_choosers1', template_groups_chooser($chooser_args_summary));

	if ($summary_display == 'none') {
		$smarty->assign('summary_display_style', "display:none");
	} // if
	if ($reporter->show_columns) {
		$smarty->assign('show_columns_reports', true);
	} // if
	$smarty->assign('column_display', $column_display);

	$smarty->assign('template_grups_choosers2', template_groups_chooser($chooser_args));
	template_reports_filters($smarty, $args);
	$smarty->assign('reporter_report_type', $args['reporter']->report_type);
	template_reports_group_by($smarty, $args);
	template_reports_chart_options($smarty, $args);
	$smarty->assign('md5_current_user_id', md5($current_user->id));
	$smarty->assign('args_image_path', $args['IMAGE_PATH']);
	template_reports_request_vars_js($smarty, $reporter,$args);
	$smarty->assign('cache_path', sugar_cached(''));
	echo $smarty->fetch("modules/Reports/templates/_template_reports_report.tpl");

ob_start();
?>
<script language="javascript">
if(typeof YAHOO != 'undefined') YAHOO.util.Event.addListener(window, 'load', load_page);
</script>
<?php
reportResults($reporter, $args);
/*
$do_chart = false;

$dbStart = microtime();

if ($reporter->report_type == 'summary' && ! empty($reporter->report_def['summary_columns'])) {
	if ($reporter->show_columns &&
		!empty($reporter->report_def['display_columns']) &&
        !empty($reporter->report_def['group_defs'])) {

		template_summary_combo_view($reporter,$args);
		$do_chart = true;

    } else if($reporter->show_columns &&
	          !empty($reporter->report_def['display_columns']) &&
          	   empty($reporter->report_def['group_defs'])) {
		template_detail_and_total_list_view($reporter,$args);
	} else if (!empty($reporter->report_def['group_defs'])) {
		template_summary_list_view($reporter,$args);
		$do_chart = true;
	} else {
		template_total_view($reporter,$args);
	} // else
} else if (!empty($reporter->report_def['display_columns'])) {
	template_list_view($reporter,$args);
} // else if

if ($reporter->report_def['chart_type']== 'none') {
	$do_chart = false;
}
echo "time = " . microtime_diff($dbStart, microtime())."s ";
?>
</div>
<?php
	$contents = ob_get_contents();
	ob_end_clean();

	if ($do_chart) {
   		template_chart($reporter);
	} // if

	print $contents;
	*/
} // fn

function reportResults(&$reporter, &$args) {
	ob_start();
	echo '<div id="report_results">';

	$do_chart = false;

	if ($reporter->report_type == 'summary' && ! empty($reporter->report_def['summary_columns'])) {
		if ($reporter->show_columns &&
			!empty($reporter->report_def['display_columns']) &&
	        !empty($reporter->report_def['group_defs'])) {

			template_summary_combo_view($reporter,$args);
			$do_chart = true;

	    } else if($reporter->show_columns &&
		          !empty($reporter->report_def['display_columns']) &&
	          	   empty($reporter->report_def['group_defs'])) {
			template_detail_and_total_list_view($reporter,$args);
		} else if (!empty($reporter->report_def['group_defs'])) {
			template_summary_list_view($reporter,$args);
			$do_chart = true;
		} else {
			template_total_view($reporter,$args);
		} // else
	} else if (!empty($reporter->report_def['display_columns'])) {
		template_list_view($reporter,$args);
	} // else if

	$searchArray = array("'", "\r\n", "\n");
	$replaceArray = array("\\'", "", "");
	$filterStringForUI = str_replace($searchArray, $replaceArray, $reporter->createFilterStringForUI());
	echo "<script>var filterString='" . htmlspecialchars($filterStringForUI) . "';</script>";
	if ($reporter->report_def['chart_type']== 'none') {
		$do_chart = false;
	}
	echo '</div>';
	$contents = ob_get_contents();
	ob_end_clean();

	if ($do_chart) {
	global $mod_strings;

	$reportChartButtonTitle = $mod_strings['LBL_REPORT_HIDE_CHART'];
	$reportChartDivStyle = "";
	if (isset($args['reportCache'])) {
		$reportCache = $args['reportCache'];
		if (!empty($reportCache->report_options_array)) {
			if (array_key_exists("showChart", $reportCache->report_options_array) && !$reportCache->report_options_array['showChart']) {
				$reportChartButtonTitle = $mod_strings['LBL_REPORT_SHOW_CHART'];
				$reportChartDivStyle = "display:none";
			}
		} // if
	} // if

	echo "<input class=\"button\" name=\"showHideChartButton\" id=\"showHideChartButton\" title=\"{$reportChartButtonTitle}\"
	type=\"button\" value=\"{$reportChartButtonTitle}\" onclick=\"showHideChart();\"><br/><br/>";

	echo "<script>function showHideChart() {
	var idObject = document.getElementById('record');
	var id = '';
	if (idObject != null) {
		id = idObject.value;
	} // if
	var chartId = document.getElementById(id + '_div');
	var showHideChartButton = document.getElementById('showHideChartButton');
	if (chartId.style.display == \"none\") {
		saveReportOptionsState('showChart', '1');
		chartId.style.display = \"\";
		showHideChartButton.title = \"{$mod_strings['LBL_REPORT_HIDE_CHART']}\";
		showHideChartButton.value = \"{$mod_strings['LBL_REPORT_HIDE_CHART']}\";
		loadCustomChartForReports();
	} else {
		chartId.style.display = 'none';
		saveReportOptionsState('showChart', '0');
		showHideChartButton.title = \"{$mod_strings['LBL_REPORT_SHOW_CHART']}\";
		showHideChartButton.value = \"{$mod_strings['LBL_REPORT_SHOW_CHART']}\";
	} // else
} </script>";

if (isset($reporter->saved_report->id) )
    $report_id = $reporter->saved_report->id;
elseif(!empty($_REQUEST['record'])) 
    $report_id = $_REQUEST['record'];
else  
    $report_id = 'unsavedReport'; 
    
	echo "<div class='reportChartContainer' id='{$report_id}_div' style='{$reportChartDivStyle}'>";
	 template_chart($reporter, $reportChartDivStyle);
	 echo "</div>";
	} // if

	print $contents;
} // fn

/*
function template_reports_report1(&$reporter,&$args)
{
global $current_user;
global $current_language;
global $mod_strings, $app_strings;

$sort_by = '';
$sort_dir = '';
$summary_sort_by = '';
$summary_sort_dir = '';
$report_type = '';

if (isset($reporter->report_def['order_by'][0]['name']) && isset($reporter->report_def['order_by'][0]['table_key']))
{
	$sort_by = $reporter->report_def['order_by'][0]['table_key'].":".$reporter->report_def['order_by'][0]['name'];
}
if ( isset($reporter->report_def['order_by'][0]['sort_dir']))
{
	$sort_dir = $reporter->report_def['order_by'][0]['sort_dir'];
}

if ( ! empty($reporter->report_def['summary_order_by'][0]['group_function']) && $reporter->report_def['summary_order_by'][0]['group_function'] == 'count')
{
  $summary_sort_by = 'count';
} else if ( isset($reporter->report_def['summary_order_by'][0]['name']))
{
	$summary_sort_by = $reporter->report_def['summary_order_by'][0]['table_key'].":".$reporter->report_def['summary_order_by'][0]['name'];

	if ( ! empty($reporter->report_def['summary_order_by'][0]['group_function'])) {
		$summary_sort_by .=":". $reporter->report_def['summary_order_by'][0]['group_function'];
	} else if ( ! empty($reporter->report_def['summary_order_by'][0]['column__function'])) {

                $summary_sort_by .=":". $reporter->report_def['summary_order_by'][0]['column_function'];
        }
}

if ( isset($reporter->report_def['summary_order_by'][0]['sort_dir']))
{
	$summary_sort_dir = $reporter->report_def['summary_order_by'][0]['sort_dir'];
}
if ( isset($reporter->report_def['report_type']))
{
	$report_type = $reporter->report_def['report_type'];
}


?>

<?php

if (isset($args['save_result']))
{
	if ($args['save_result'])
	{
?>
<p>	<span><b><?php echo $mod_strings['LBL_SUCCESS_REPORT']; ?> "<?php echo $_REQUEST['save_report_as']; ?>" <?php echo $mod_strings['LBL_WAS_SAVED']; ?></b></span></p>
<?php
	}
	else
	{
?>
	<span><b><?php echo $mod_strings['LBL_FAILURE_REPORT']; ?> "<?php echo $_REQUEST['save_report_as']; ?>" <?php echo $mod_strings['LBL_WAS_NOT_SAVED']; ?></b></span></p>
<?php
	}

}

?><p>
<?php echo get_form_header( $mod_strings['LBL_TITLE'].": ".$reporter->name, "", false); ?>
<form action="index.php#main" method="post" name="EditView" onSubmit="return fill_form();">
<input type="hidden" name='report_offset' value ="<?php echo $reporter->report_offset; ?>">
<input type="hidden" name='sort_by' value ="<?php echo $sort_by; ?>">
<input type="hidden" name='sort_dir' value ="<?php echo $sort_dir; ?>">
<input type="hidden" name='summary_sort_by' value ="<?php echo $summary_sort_by; ?>">
<input type="hidden" name='summary_sort_dir' value ="<?php echo $summary_sort_dir; ?>">
<input type="hidden" name='expanded_combo_summary_divs' id='expanded_combo_summary_divs' value=''>
<input type="hidden" name="action" value="index">
<input type="hidden" name="module" value="Reports">
<?php


if (isset($_REQUEST['save_as']) &&  $_REQUEST['save_as'] == 'true')
    $report_id = '';
else if (isset($reporter->saved_report->id) )
    $report_id = $reporter->saved_report->id;
elseif(!empty($_REQUEST['record']))
    $report_id = $_REQUEST['record'];
else
    $report_id = '';
?>
<input type="hidden" name="record" value="<?php echo $report_id;?>">
<input type="hidden" name='report_def' value ="">
<input type="hidden" name='save_as' value ="">
<input type="hidden" name="page" value="report">
<input type="hidden" name="to_pdf" value="<?php if ( isset($_REQUEST['to_pdf'])) { echo $_REQUEST['to_pdf']; } ?>"/>
<input type="hidden" name="to_csv" value="<?php if ( isset($_REQUEST['to_csv'])) { echo $_REQUEST['to_csv']; } ?>"/>
<input type="hidden" name="save_report" value=""/>
<!--
<input type="hidden" name="report_module" value="<?php echo $reporter->module; ?>">
-->
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="padding-bottom: 2px;"">
<?php
$is_owner =  true;
if (isset($args['reporter']->saved_report) && $args['reporter']->saved_report->assigned_user_id != $current_user->id)
	$is_owner = false;

if(ACLController::checkAccess('Reports', 'edit', $is_owner))
{?>
<input type=submit class="button" title="<?php echo $mod_strings['LBL_RUN_BUTTON_TITLE']; ?>"
    value="<?php echo $mod_strings['LBL_RUN_REPORT_BUTTON_LABEL']; ?>"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value=''">
<input type=submit class="button" title="<?php echo $app_strings['LBL_SAVE_BUTTON_TITLE']; ?>"
    value="<?php echo $app_strings['LBL_SAVE_BUTTON_LABEL']; ?>"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';">
<input type=submit class="button" title="<?php echo $app_strings['LBL_SAVE_AS_BUTTON_TITLE']; ?>"
    value="<?php echo $app_strings['LBL_SAVE_AS_BUTTON_LABEL']; ?>"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';this.form.record.value='';this.form.save_as.value='true'">
<?php }?>
<?php
if(ACLController::checkAccess('Reports', 'export', $is_owner))
{
?>
<input type=submit class="button" title="<?php echo $app_strings['LBL_VIEW_PDF_BUTTON_TITLE']; ?>"
    value="<?php echo $app_strings['LBL_VIEW_PDF_BUTTON_LABEL']; ?>"
    onclick="this.form.save_report.value='';this.form.to_csv.value='';this.form.to_pdf.value='on'">
<?php }?>
</td>
</tr>
</table>
<script>
var form_submit = "<?php echo (empty($_REQUEST['form_submit']) ? false : $_REQUEST['form_submit']);?>";
var tab_keys = new Array('module_join_tab','filters_tab','columns_tab','group_by_tab','chart_options_tab');
LBL_RELATED = '<?php echo $mod_strings['LBL_RELATED'] ?>';
function showReportTab(show_key)
{
 for(var i in tab_keys)
 {
	document.getElementById(tab_keys[i]).style.display='none';
 }
 document.getElementById(show_key).style.display='block';
}
<?php
$global_json = getJSONobj();
global $ACLAllowedModules;
$ACLAllowedModules = getACLAllowedModules();
echo 'ACLAllowedModules = ' . $global_json->encode(array_keys($ACLAllowedModules));
?>

</script>
<?php


require_once('include/tabs.php');

$tabs = array();

array_push($tabs,array('title'=>$mod_strings['LBL_1_REPORT_ON'],'link'=>'module_join_tab','key'=>'module_join_tab'));
array_push($tabs,array('title'=>$mod_strings['LBL_2_FILTER'],'link'=>'filters_tab','key'=>'filters_tab'));
//array_push($tabs,array('title'=>$mod_strings['LBL_3_GROUP'],'link'=>'group_by_tab','key'=>'group_by_tab'));
//array_push($tabs,array('title'=>$mod_strings['LBL_3_CHOOSE'],'link'=>'columns_tab','key'=>'columns_tab'));
if ( $args['reporter']->report_type == 'tabular')
{
  array_push($tabs,array('title'=>$mod_strings['LBL_3_GROUP'],'hidden'=>true,'link'=>'group_by_tab','key'=>'group_by_tab'));
  array_push($tabs,array('title'=>$mod_strings['LBL_3_CHOOSE'],'link'=>'columns_tab','key'=>'columns_tab'));
  array_push($tabs,array('title'=>$mod_strings['LBL_5_CHART_OPTIONS'],'hidden'=>true,'link'=>'chart_options_tab','key'=>'chart_options_tab'));
} else {
  array_push($tabs,array('title'=>$mod_strings['LBL_3_GROUP'],'link'=>'group_by_tab','key'=>'group_by_tab'));
  array_push($tabs,array('title'=>$mod_strings['LBL_4_CHOOSE'],'link'=>'columns_tab','key'=>'columns_tab'));
  array_push($tabs,array('title'=>$mod_strings['LBL_5_CHART_OPTIONS'],'link'=>'chart_options_tab','key'=>'chart_options_tab'));
}

$current_key = 'module_join_tab';
$tab_panel= new SugarWidgetTabs($tabs,$current_key,'showReportTab');
echo "<BR>".$tab_panel->display();
?>

<table width="100%" border="0" cellspacing=0 cellpadding=0 class="edit view" style="border-top: 0px;">
<tr>
<td valign="top" width="100%">
<?php template_reports_tables1($smarty, $args); ?>


<?php
if( $reporter->report_type=='summary')
{
 $summary_display = '';

 if ( $reporter->show_columns)
 {
 $column_display = '';
 }
 else
 {
  $column_display = 'none';
 }
}
else
{
 $summary_display = 'none';
 $column_display = '';
}

$summary_join_selector = '&nbsp;<div style="padding-bottom:2px">'.$mod_strings['LBL_MODULE'].': <select onChange="viewJoinChanged(this);" id="view_join_summary" name="view_join_summary"></select></div>';

$chooser_args_summary = array('id'=>'summary_table','title'=>$mod_strings['LBL_CHOOSE_SUMMARIES'].':','left_name'=>'display_summary','right_name'=>'hidden_summary','left_label'=>$mod_strings['LBL_DISPLAY_SUMMARIES'],'right_label'=>$summary_join_selector,'display'=>$summary_display,'onmoveleft'=>'reload_columns(\'join\')','onmoveright'=>'reload_columns(\'join\')');


$join_selector = '&nbsp;<div style="padding-bottom:2px">'.$mod_strings['LBL_MODULE'].': <select onChange="viewJoinChanged(this);" id="view_join" name="view_join"></select></div>';

$chooser_args = array('id'=>'columns_table','title'=>$mod_strings['LBL_CHOOSE_COLUMNS'].':','left_name'=>'display_columns','right_name'=>'hidden_columns','left_label'=>$mod_strings['LBL_DISPLAY_COLUMNS'],'right_label'=>$join_selector,'display'=>$column_display,'topleftcontent'=>$join_selector,'onmoveleft'=>'reload_columns(\'join\')','onmoveright'=>'reload_columns(\'join\')');


?>
<div id="columns_tab" style="display: none">
<?php template_groups_chooser1($chooser_args_summary); ?>
<div id="summary_more_div" <?php if ( $summary_display == 'none') { echo "style=\"display: none\"";};?>>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mod_strings['LBL_LABEL'];?>:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='detailsummary_label_editor' id='detailsummary_label_editor' value='' onchange='saveLabel("detailsummary",this )'>
<div scope="row">

<input type="checkbox" class="checkbox" name="show_details" id="show_details" onclick="showDetailsClicked(this);" <?php if ( $reporter->show_columns) { echo "CHECKED"; } ?>>&nbsp;
<?php echo $mod_strings['LBL_SHOW_DETAILS']; ?></div>
<br>
</div>

<?php template_groups_chooser1($chooser_args);  ?>
<div id="columns_more_div"  <?php if ( $column_display == 'none') { echo "style=\"display: none\"";};?>>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mod_strings['LBL_LABEL'];?>:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='column_label_editor' id='column_label_editor' value='' size=25 onchange='saveLabel("column", this)'>
</div>

</div>

<?php template_reports_filters1($smarty, $args); ?>
<div id='group_by_tab' style="display: none"
<?php if ( $args['reporter']->report_type == 'tabular') { ?>
style="display: none"
<?php } ?>>
<?php  template_reports_group_by1($smarty, $args); ?>
</div>
<div id='chart_options_tab' style="display: none">
<?php  template_reports_chart_options1($smarty, $args); ?>
</div>

</td>
</tr>
</table></p>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="padding-bottom: 2px;"">
<?if(ACLController::checkAccess('Reports', 'edit', $is_owner))
{?>
<input type=submit class="button" title="<?php echo $mod_strings['LBL_RUN_BUTTON_TITLE']; ?>"
    value="<?php echo $mod_strings['LBL_RUN_REPORT_BUTTON_LABEL']; ?>"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value=''">
<input type=submit class="button" title="<?php echo $app_strings['LBL_SAVE_BUTTON_TITLE']; ?>"
    value="<?php echo $app_strings['LBL_SAVE_BUTTON_LABEL']; ?>"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';">
<input type=submit class="button" title="<?php echo $app_strings['LBL_SAVE_AS_BUTTON_TITLE']; ?>"
    value="<?php echo $app_strings['LBL_SAVE_AS_BUTTON_LABEL']; ?>"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';this.form.record.value='';this.form.save_as.value='true'">
<?}?>
<?if(ACLController::checkAccess('Reports', 'export', $is_owner))
{?>
<input type=submit class="button" title="<?php echo $app_strings['LBL_VIEW_PDF_BUTTON_TITLE']; ?>"
    value="<?php echo $app_strings['LBL_VIEW_PDF_BUTTON_LABEL']; ?>"
    onclick="this.form.save_report.value='';this.form.to_csv.value='';this.form.to_pdf.value='on'">
<?}?>

</td>
</tr>
</table>
</form>
</p>
<?php
// template_module_defs_js($args);
?>
<script type="text/javascript" src="cache/modules/modules_def_<?php echo $current_language; ?>_<?php echo md5($current_user->id) ?>.js"></script>
<script type="text/javascript" src="cache/include/javascript/sugar_grp_overlib.js"></script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script>

var visible_modules;
var report_def;
var current_module;
var visible_fields = new Array();
var visible_fields_map =  new Object();
var visible_summary_fields = new Array();
var visible_summary_field_map =  new Object();
var current_report_type;
var display_columns_ref = 'display';
var hidden_columns_ref = 'hidden';
var field_defs;
var previous_links_map = new Object();
var previous_links =  new Array();
var display_summary_ref = 'display';
var hidden_summary_ref = 'hidden';
var users_array = new Array();

</script>
<?php template_reports_functions_js($args); ?>
<?php template_reports_request_vars_js($reporter,$args); ?>
<?php
ob_start();
?>
<script language="javascript">
if(typeof YAHOO != 'undefined') YAHOO.util.Event.addListener(window, 'load', load_page);
</script>
<div id="report_results">
<?php
$do_chart = false;

if ($reporter->report_type == 'summary' &&
     ! empty($reporter->report_def['summary_columns']))
{

		if ( $reporter->show_columns &&
			!empty($reporter->report_def['display_columns']) &&
          ! empty($reporter->report_def['group_defs']))
	{

		template_summary_combo_view($reporter,$args);
			$do_chart = true;
	} else if ($reporter->show_columns &&
	             	!empty($reporter->report_def['display_columns']) &&
          empty($reporter->report_def['group_defs']))
	{

		template_detail_and_total_list_view($reporter,$args);
	} else if (! empty($reporter->report_def['group_defs']))
	{
		template_summary_list_view($reporter,$args);
			$do_chart = true;
	} else
	{
		template_total_view($reporter,$args);
		}
} else if (! empty($reporter->report_def['display_columns']) )
{
	template_list_view($reporter,$args);
		}

if ($reporter->report_def['chart_type']== 'none')
{
		$do_chart = false;
	}
?>
</div>
<?php
	$contents = ob_get_contents();
	ob_end_clean();

	if ($do_chart)
	{
   template_chart($reporter);
	}

	print $contents;
}

*/

//////////////////////////////////////////////
// TEMPLATE:
// filters_top: string is filled up with the filter query string
// filters_top: table that holds the filter rows
//////////////////////////////////////////////
function template_reports_filters(&$smarty, &$args) {
	$reporter = $args['reporter'];
	global $mod_strings;
	$selectedAnd = "";
	$selectedOR = "";
	if(!empty($reporter->report_def['filters_combiner']) && $reporter->report_def['filters_combiner'] == 'AND') {
		$selectedAnd = 'selected';
	}
	if(!empty($reporter->report_def['filters_combiner']) && $reporter->report_def['filters_combiner'] == 'OR') {
		$selectedOR = 'selected';
	}
	$sort_by ="";
	$sort_dir ="";
	if (isset($reporter->report_def['sort_by'])) {
		$sort_dir = $reporter->report_def['sort_by'];
	} // if

	if (isset($reporter->report_def['sort_dir'])) {
		$sort_dir = $reporter->report_def['sort_dir'];
	} // if
	//require_once("include/Sugar_Smarty.php");
	//$smarty = new Sugar_Smarty();
	$smarty->assign('mod_strings', $mod_strings);
	$smarty->assign('selectedAnd', $selectedAnd);
	$smarty->assign('selectedOR', $selectedOR);
	//echo $smarty->fetch("modules/Reports/templates/_template_reports_filters.tpl");

} // fn

/*
function template_reports_filters(&$args)
{
$reporter =$args['reporter'];
global $mod_strings;
?>
<div id="filters_tab" style="display: none">
<span scope="row"><h5><?php echo $mod_strings['LBL_FILTERS']; ?>:</h5></span>
<?php echo $mod_strings['LBL_FILTER_CONDITIONS']; ?>
 <select name='filters_combiner' id='filters_combiner'>
   <option value='AND' <?php if(!empty($reporter->report_def['filters_combiner']) && $reporter->report_def['filters_combiner'] == 'AND') echo ' selected '; ?>><?php echo $mod_strings['LBL_FILTER_AND']; ?></option>
   <option value='OR' <?php if(!empty($reporter->report_def['filters_combiner']) && $reporter->report_def['filters_combiner'] == 'OR') echo ' selected '; ?>><?php echo $mod_strings['LBL_FILTER_OR']; ?></option>
</select>
<?php echo $mod_strings['LBL_FILTERS_END']; ?>
<br><br>
<input class=button type=button onClick='window.addFilter()' name='<?php echo $mod_strings['LBL_ADD_NEW_FILTER']; ?>' value='<?php echo $mod_strings['LBL_ADD_NEW_FILTER']; ?>'>
&nbsp;&nbsp;<?php echo $mod_strings['LBL_DATE_BASED_FILTERS']; ?>
<input type=hidden name='filters_def' value ="">
<?php
$sort_by ="";
$sort_dir ="";
if ( isset($reporter->report_def['sort_by']))
{
	$sort_dir = $reporter->report_def['sort_by'];
}

if ( isset($reporter->report_def['sort_dir']))
{
	$sort_dir = $reporter->report_def['sort_dir'];
}
?>
<table id='filters_top' border=0 cellpadding="0" cellspacing="0">
<tbody id='filters'></tbody>
</table>
</div>

<?php
}
*/

//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function template_reports_group_by(&$smarty, &$args) {
	global $mod_strings;
	//require_once("include/Sugar_Smarty.php");
	//$smarty = new Sugar_Smarty();
	$smarty->assign('mod_strings', $mod_strings);
	//echo $smarty->fetch("modules/Reports/templates/_template_reports_group_by.tpl");

} // fn

/*
function template_reports_group_by(&$args)
{
global $mod_strings;
?>
<span scope="row"><h5><?php echo $mod_strings['LBL_GROUP_BY'];?>:</h5></span>
<table width="100%" cellpadding=0 cellspacing=0>
<tr id="group_by_button">
<td align=left>
<input class=button type=button onClick='addGroupByFromButton()' name='Add Column' value='<?php echo $mod_strings['LBL_ADD_COLUMN'];?>'>
</td>
</tr>
</table>
<input type=hidden name='group_by_def' value =""/>
<div id='group_by_div'>
<table id='group_by_table' border="0" cellpadding="0" cellspacing="0">
<tbody id='group_by_tbody'></tbody>
</table>
</div>

<?php
}
*/

//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function template_reports_chart_options(&$smarty, &$args) {
	$reporter = $args['reporter'];
	global $mod_strings;
	$chart_types = array(
		'none'=>$mod_strings['LBL_NO_CHART'],
		'hBarF'=>$mod_strings['LBL_HORIZ_BAR'],
		'vBarF'=>$mod_strings['LBL_VERT_BAR'],
		'pieF'=>$mod_strings['LBL_PIE'],
		'funnelF'=>$mod_strings['LBL_FUNNEL'],
		'lineF'=>$mod_strings['LBL_LINE'],
	);
	$chart_description = htmlentities($reporter->chart_description, ENT_QUOTES, 'UTF-8');
	//require_once("include/Sugar_Smarty.php");
	//$smarty = new Sugar_Smarty();
	$smarty->assign('mod_strings', $mod_strings);
	$smarty->assign('chart_description', $chart_description);
	$smarty->assign('chart_types', $chart_types);
	$smarty->assign('$report_def', $reporter->report_def);
	$smarty->assign('chart_description', $chart_description);
	//echo $smarty->fetch("modules/Reports/templates/_template_reports_chart_options.tpl");

} // fn

/*
function template_reports_chart_options(&$args)
{
$reporter = $args['reporter'];
global $mod_strings;
$chart_types = array(
'none'=>$mod_strings['LBL_NO_CHART'],
'hBarF'=>$mod_strings['LBL_HORIZ_BAR'],
'vBarF'=>$mod_strings['LBL_VERT_BAR'],
'pieF'=>$mod_strings['LBL_PIE'],
'funnelF'=>$mod_strings['LBL_FUNNEL'],
'lineF'=>$mod_strings['LBL_LINE'],
);

$is_chart_dashlet = false;
if (isset($reporter->saved_report->is_chart_dashlet) && $reporter->saved_report->is_chart_dashlet == 1){
	$is_chart_dashlet = true;
}
?>
<span id="no_chart_text"><?php echo $mod_strings['LBL_GROUP_BY_REQUIRED']; ?></span>
<span scope="row"><h5><?php echo $mod_strings['LBL_CHART_TYPE'];?>:</h5></span>
<table width="100%" cellpadding=0 cellspacing=0>
<tr>
<td align=left>
<select name='chart_type'>
<?php foreach ($chart_types as $thekey=>$theval) { ?>
<option value="<?php echo $thekey; ?>" <?php if ($reporter->report_def['chart_type'] == $thekey) { echo "SELECTED"; } ?>><?php echo $theval;?></option>
<?php } ?>
</select>
</td>
</tr>
</table>
<P/>
<span scope="row"><h5><?php echo $mod_strings['LBL_USE_COLUMN_FOR'];?>:</h5></span>
<table width="100%" cellpadding=0 cellspacing=0>
<tr>
<td align=left>
<select name='numerical_chart_column'>
</select>
</td>
</tr>
</table>
<P/>
<span scope="row"><h5><?php echo $mod_strings['LBL_CHART_DESCRIPTION'];?>:</h5></span>
<table width="100%" cellpadding=0 cellspacing=0>
<tr>
<td align=left>
<input name='chart_description' size='50' value="<?php echo htmlentities($reporter->chart_description, ENT_QUOTES, 'UTF-8');?>" maxsize="255"/>
</td>
</tr>
</table>
<?php
}
*/

//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////

function juliansort($a,$b)
{
 global $app_list_strings;
    $a = isset($app_list_strings['moduleList'][$a]) ? $app_list_strings['moduleList'][$a] : $a;
    $b = isset($app_list_strings['moduleList'][$b]) ? $app_list_strings['moduleList'][$b] : $b;
 if ($a > $b)
 {
  return 1;
 }
 return -1;
}

/*
  $assigned_user_html_def = array(
    'parent_id'=>'assigned_user_id',
    'parent_id_value'=>$focus->assigned_user_id,
    'parent_name'=>'assigned_user_name',
    'parent_name_value'=>$focus->assigned_user_name,
    'real_parent_name'=>'user_name',
    'module'=>'Users',
  );
*/
function get_select_related_html(&$args)
{
  global $global_json,$app_strings;

  if ( ! isset($args['form_name']))
  {
    $args['form_name'] = 'ReportsWizardForm';
  }

  $popup_request_data = array(
    'call_back_function' => 'set_return',
    'form_name' => $args['form_name'],
    'field_to_name_array' => array(
      'id' => $args['parent_id'],
      $args['real_parent_name'] => $args['parent_name'],
    ),
  );

  $request_data = $global_json->encode($popup_request_data);


  $content = "<input class='sqsEnabled' autocomplete='off' id='{$args['parent_name']}' name='{$args['parent_name']}' type='text' value='{$args['parent_name_value']}'>&nbsp;<input id='{$args['parent_id']}' name='{$args['parent_id']}' type='hidden' value='{$args['parent_id_value']}'/></slot>";
  $content .= "<input title='{$app_strings['LBL_SELECT_BUTTON_TITLE']}' type='button' class='button' value='{$app_strings['LBL_SELECT_BUTTON_LABEL']}' name=btn1 ";

  if ( isset($args['tabindex']))
  {
    $content .= "tabindex='{$args['tabindex']}' ";
  }

  $content .= " onclick='open_popup(\"{$args['module']}\", 600, 400, \"\", true, false, $request_data);' />";

  return $content;

}


function js_setup(&$smarty) {
	global $global_json;
	require_once('include/QuickSearchDefaults.php');
	$qsd = QuickSearchDefaults::getQuickSearchDefaults();
	$qsd->form_name = "ReportsWizardForm";
	$sqs_objects = array('ReportsWizardForm_assigned_user_name' => $qsd->getQSUser()); //, 'ReportsWizardForm_team_name_collection_0' => $qsd->getQSTeam());

    $quicksearch_js = '<script language="javascript">';
    $quicksearch_js.= "if(typeof sqs_objects == 'undefined'){ var sqs_objects = new Array; }";

    foreach($sqs_objects as $sqsfield=>$sqsfieldArray){
            $quicksearch_js .= "sqs_objects['$sqsfield']={$global_json->encode($sqsfieldArray)};";
    }

    $quicksearch_js .= '</script>';
	$smarty->assign('quicksearch_js', $quicksearch_js);
}


function template_reports_tables(&$smarty, &$args) {
	global $report_modules;
	global $mod_strings;
	global $app_list_strings;
	global $current_user;
	$reporter = $args['reporter'];

	$classname = "dataLabel";
	$smarty->assign('classname', $classname);
	global $ACLAllowedModules;
	uksort($ACLAllowedModules,"juliansort");
	$smarty->assign('ACLAllowedModulesjuliansort', $ACLAllowedModules);
	$smarty->assign('app_list_strings', $app_list_strings);
	$save_report_as = $mod_strings['LBL_UNTITLED'];
	if (! empty($reporter->name)) {
		$save_report_as = $reporter->name;
		$smarty->assign('save_report_as_template_reports_tables', $save_report_as);
	} // fn
	$isAdmin = false;
	if ($current_user->is_admin) {
		$isAdmin = true;
	} // if
	$smarty->assign('isAdmin', $isAdmin);
	if (!empty($_REQUEST['show_query']) && $isAdmin) {
		$smarty->assign('show_query', true);
	} // if
	if (! empty($reporter->saved_report)) {
		$focus = & $reporter->saved_report;
	} else {
		$focus = new SavedReport();
		$focus->assigned_user_name = (empty($_REQUEST['assigned_user_name']) ? '' : $_REQUEST['assigned_user_name']);
		$focus->assigned_user_id = (empty($_REQUEST['assigned_user_id']) ? '' : $_REQUEST['assigned_user_id']);
		$focus->team_name = (empty($_REQUEST['team_name']) ? '' : $_REQUEST['team_name']);
		$focus->team_id = (empty($_REQUEST['team_id']) ? '' : $_REQUEST['team_id']);
	}
	if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id = $current_user->id;
	if (empty($focus->assigned_user_name) && empty($focus->id))  $focus->assigned_user_name = $current_user->user_name;

	$assigned_user_html_def = array(
	    'parent_id'=>'assigned_user_id',
	    'parent_id_value'=>$focus->assigned_user_id,
	    'parent_name'=>'assigned_user_name',
	    'parent_name_value'=>$focus->assigned_user_name,
	    'real_parent_name'=>'user_name',
	    'module'=>'Users',
	);
	$assigned_user_html = get_select_related_html($assigned_user_html_def);
	$smarty->assign('assigned_user_html', $assigned_user_html);
	if (empty($focus->id) && empty($_REQUEST['team_name'])) {
	  $focus->team_name = $current_user->default_team_name;
	  $focus->team_id =  $current_user->default_team;
	} // if

	$team_html_def = array(
	    'parent_id'=>'team_id',
	    'parent_id_value'=>$focus->team_id,
	    'parent_name'=>'team_name',
	    'parent_name_value'=>$focus->team_name,
	    'real_parent_name'=>'name',
	    'module'=>'Teams',
	);
	$team_html = get_select_related_html($team_html_def);
	$smarty->assign('team_html', $team_html);
	if (empty( $reporter->report_def['report_type'] )) {
		$reporter->report_def['report_type']='tabular';
	}
	$smarty->assign('reporter_report_def_report_type', $reporter->report_def['report_type']);
	js_setup($smarty);
} // fn

/*
function template_reports_tables(&$args)
{
global $report_modules;
global $mod_strings;
global $app_list_strings;
$reporter =$args['reporter'];

$classname = "dataLabel";


?>
<div id="module_join_tab">
<div>
&nbsp;<span id='checkGroups' style='display: none; color: red'><i><?php echo $mod_strings['LBL_TABLE_CHANGED']; ?></i></span>
</div>
<table border=0 width="100%" cellspacing="0" cellpadding="0">
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>" width="50%">
<table border=0 width="100%" cellspacing="0" cellpadding="3">
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>">
<h5><?php echo $mod_strings['LBL_MODULE']; ?>:</h5><!--<span ><em>Select the root module to report on</em></span><br>-->
<select id='self' name="self" onChange="table_changed(this);">
<?php
// initial hardcoded SELECTED setting from php
// loop thru supported module tables


global $ACLAllowedModules;
uksort($ACLAllowedModules,"juliansort");


foreach ($ACLAllowedModules as $module=>$bean_name)
{

		if ($module == 'Reports') continue;
        // if module has been requested
        if ($module == $reporter->module)
        {
                $module_selected = ' SELECTED';
        }
        else
        {
                $module_selected = '';
        }
?>
<option value="<?php echo $module; ?>" <?php echo $module_selected; ?>><?php echo $app_list_strings['moduleList'][$module]; ?></option>
<?php } ?>
</select>
<a href="" class="button" style="padding: 2px; text-decoration: none;" onClick="add_related('self'); return(false);"><?php echo $mod_strings['LBL_ADD_RELATE']; ?></a>

</td>
</tr>
</table>
<input type=hidden name='links_def' value ="">
<div style="border-left: 2px dotted #000000; padding-left: 5px;" id="self_children"></div>
<table id='joins_table' cellpadding=0 cellspacing=0 border=0>
</table>
</td>
<td align="left" width="50%">
<br>
<table border=0 width="100%" cellspacing="0" cellpadding="0">
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>"><?php echo $mod_strings['LBL_REPORT_NAME'];?>:</td>
<?php
 $save_report_as = $mod_strings['LBL_UNTITLED'];
if (! empty($reporter->name))
{
 $save_report_as = $reporter->name;
}
?>
<td class="<?php echo $classname; ?>"><input type="text" size="30" value="<?php echo $save_report_as; ?>" name="save_report_as"/></td>
</tr>
<?php
global $current_user;
if ($current_user->is_admin) { ?>
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>"><?php echo $mod_strings['LBL_SHOW_QUERY']; ?>:</td>
<td class="<?php echo $classname; ?>" style="vertical-align : middle;"><input type="checkbox" class="checkbox" name="show_query" <?php if ( ! empty($_REQUEST['show_query'])) { echo "CHECKED"; } ?>/></td>
</tr>
<?php } ?>
<?php
$focus = null;
if (! empty($reporter->saved_report))
{
	$focus = & $reporter->saved_report;
} else {
	$focus = new SavedReport();
	$focus->assigned_user_name = (empty($_REQUEST['assigned_user_name']) ? '' : $_REQUEST['assigned_user_name']);
	$focus->assigned_user_id = (empty($_REQUEST['assigned_user_id']) ? '' : $_REQUEST['assigned_user_id']);
	$focus->team_name = (empty($_REQUEST['team_name']) ? '' : $_REQUEST['team_name']);
	$focus->team_id = (empty($_REQUEST['team_id']) ? '' : $_REQUEST['team_id']);
}
global $current_user;

if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id = $current_user->id;
if (empty($focus->assigned_user_name) && empty($focus->id))  $focus->assigned_user_name = $current_user->user_name;

  $assigned_user_html_def = array(
    'parent_id'=>'assigned_user_id',
    'parent_id_value'=>$focus->assigned_user_id,
    'parent_name'=>'assigned_user_name',
    'parent_name_value'=>$focus->assigned_user_name,
    'real_parent_name'=>'user_name',
    'module'=>'Users',
  );

  $assigned_user_html = get_select_related_html($assigned_user_html_def);

?>
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>"><?php echo $mod_strings['LBL_OWNER']; ?>:</td>
<td class="<?php echo $classname; ?>" style="vertical-align : middle;"><?php echo $assigned_user_html; ?></td>
</tr>
<?php

if (empty($focus->id) && empty($_REQUEST['team_name'])) {
  $focus->team_name = $current_user->default_team_name;
  $focus->team_id =  $current_user->default_team;
}

  $team_html_def = array(
    'parent_id'=>'team_id',
    'parent_id_value'=>$focus->team_id,
    'parent_name'=>'team_name',
    'parent_name_value'=>$focus->team_name,
    'real_parent_name'=>'name',
    'module'=>'Teams',
  );

  $team_html = get_select_related_html($team_html_def);

?>
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>"><?php echo $mod_strings['LBL_TEAM']; ?>:</td>
<td class="<?php echo $classname; ?>" style="vertical-align : middle;"><?php echo $team_html; ?></td>
</table>

</td>
</tr>
<tr><td colspan="2">
<p/>
<p/>
<table>
<tr>
<?php

if ( empty( $reporter->report_def['report_type'] ))
{
        $reporter->report_def['report_type']='tabular';
}
?>
<td  width="1%" align=center valign=middle><input type="radio" class="radio" onClick="reportTypeChanged();" id="report_type" name="report_type" value="tabular" <?php if (  $reporter->report_def['report_type'] == 'tabular') { ?> CHECKED<?php } ?>></td>
<td align="left" scope="row" style="vertical-align : middle;"><?php echo $mod_strings['LBL_ROWS_AND_COLUMNS_REPORT']; ?></td>
</tr>
<tr>
<td width="1%" align=center valign=middle><input type="radio" class="radio" name="report_type" id="report_type" onclick="reportTypeChanged();" value="summary" <?php if ( $reporter->report_def['report_type'] == 'summary') { ?> CHECKED<?php } ?>></td>
<td align="left" scope="row" style="vertical-align : middle;"><?php echo $mod_strings['LBL_SUMMATION_REPORT']; ?></td>
</tr>
<!--
<tr>
<td width="1%" align=center valign=middle>&nbsp;</td>
<td align="left" scope="row" style="vertical-align : middle;"><input
                onclick="reportTypeChanged();"
                type="checkbox"
                name="show_columns"
                class="checkbox"
                style="vertical-align: middle;"
                <?php if ( $reporter->show_columns) { echo "CHECKED"; } ?>
                <?php if ( $reporter->report_def['report_type'] != 'summary') { echo "DISABLED"; } ?>
                >&nbsp;<?php echo $mod_strings['LBL_WITH_DETAILS'];?></td>
</tr>
-->

</table>

</td>
</tr>
</table>
</div>
<P/>
<?php
print js_setup($smarty);
}
*/

?>

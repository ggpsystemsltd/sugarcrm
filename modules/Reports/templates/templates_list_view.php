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

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
global $start_link_wrapper,$end_link_wrapper;
global $report_smarty;
$start_link_wrapper = "javascript:set_sort('";
$end_link_wrapper =  "');";

$report_smarty = new Sugar_Smarty();

function template_list_view(&$reporter,&$args) {	
	global $start_link_wrapper,$end_link_wrapper;	
	//echo "template_list_view";
	global $mod_strings, $report_smarty;
	$reporter->run_query();	
	$reporter->_load_currency();
	$start_link_wrapper= "javascript:set_sort('";
	$end_link_wrapper =  "');";
	$header_row = $reporter->get_header_row(); 	
	$got_row = 0;	
	$args['show_pagination'] = true;
	template_header_row($header_row,$args);
	$display_columns = $reporter->report_def['display_columns'];
	$field_types = array();
	foreach($display_columns as $display_column) {
		$field_def = $reporter->getFieldDefFromLayoutDef($display_column);
		array_push($field_types, $field_def['type']);
	}
	$report_smarty->assign('field_types', $field_types);
	$report_smarty->assign('reporter', $reporter);
	$report_smarty->assign('args', $args);
	$report_smarty->assign('list_type','list');
	echo $report_smarty->fetch("modules/Reports/templates/_template_list_view.tpl");
	/*
	while (( $row = $reporter->get_next_row() ) != 0 ) {
		$got_row = 1;
		template_list_row($row,true);
	} // while
	if (!$got_row) {
		echo template_no_results();
	} // if
	echo template_pagination_row($args);
	echo template_end_table($args);
	template_query_table($reporter); 
	*/
} // fn

function template_pagination(&$args) {
	
	$smarty = new Sugar_Smarty();
	$reporter = $args['reporter'];
	global $mod_strings;
	// disable export if configured to
	global $current_user, $sugar_config, $app_strings;
	$smarty->assign('mod_strings', $mod_strings);
	$smarty->assign('app_strings', $app_strings);
	$is_owner =  true;
	if (isset($args['reporter']->saved_report) && $args['reporter']->saved_report->assigned_user_id != $current_user->id) {
		$is_owner = false;
	} // if
	
	$isExportAccess = false;
	if(!ACLController::checkAccess('Reports', 'export', $is_owner) || $sugar_config['disable_export'] || (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($reporter->module) && ACLAction::getUserAccessLevel($current_user->id,$reporter->module, 'access') == ACL_ALLOW_ENABLED && ACLAction::getUserAccessLevel($current_user->id, $reporter->module, 'admin') == ACL_ALLOW_ADMIN)))){
		// no op
	} else {
		$smarty->assign('exportImagePath', SugarThemeRegistry::current()->getImage('export',"  border='0' align='absmiddle'",null,null,'.gif',translate('LBL_EXPORT')));
		$isExportAccess = true;
	} // else
	$smarty->assign('isExportAccess', $isExportAccess);
	$smarty->assign('start_link_ImagePath', SugarThemeRegistry::current()->getImage("start_off","  border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_START']));
	$smarty->assign('prev_link_ImagePath', SugarThemeRegistry::current()->getImage("previous_off","border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_PREVIOUS']));
	$smarty->assign('end_link_ImagePath', SugarThemeRegistry::current()->getImage("end_off","border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_END']));
	$smarty->assign('next_link_ImagePath', SugarThemeRegistry::current()->getImage("next_off","border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_NEXT']));
 	$smarty->assign('start_link_disabled', true);
 	$smarty->assign('prev_link_disabled', true);
 	$smarty->assign('end_link_disabled', true);
 	$smarty->assign('next_link_disabled', true);
			
	$next = $reporter->row_end + $reporter->report_offset;
 	if($reporter->report_offset > 0){
 		$prev = $reporter->report_offset - $reporter->report_max;
	 	$smarty->assign('start_link_ImagePath', SugarThemeRegistry::current()->getImage("start","  border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_START']));
	 	$smarty->assign('start_link_onclick' , "onClick=javascript:set_offset(0);");
	 	$smarty->assign('start_link_disabled', false);
		$smarty->assign('prev_link_ImagePath', SugarThemeRegistry::current()->getImage("previous","border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_PREVIOUS']));
	 	$smarty->assign('prev_link_onclick' , "onClick=javascript:set_offset($prev);");
	 	$smarty->assign('prev_link_disabled', false);
 	} // if
	if($next < $reporter->total_count){
 		$end = ceil(($reporter->total_count/ $reporter->report_max) -1) * $reporter->report_max;
		$smarty->assign('end_link_ImagePath', SugarThemeRegistry::current()->getImage("end","  border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_END']));
 		$smarty->assign('end_link_disabled', false);
	 	$smarty->assign('end_link_onclick' , "onClick=javascript:set_offset($end);");
		
		$smarty->assign('next_link_ImagePath', SugarThemeRegistry::current()->getImage("next"," border='0' align='absmiddle'",null,null,'.gif',$app_strings['LNK_LIST_NEXT']));
 		$smarty->assign('next_link_disabled', false);
	 	$smarty->assign('next_link_onclick' , "onClick=javascript:set_offset($next);");
		
 	} // if
	
 	$start_range = ($reporter->report_offset > 0)?$reporter->row_start + $reporter->report_offset: ($reporter->total_count==0?0:1);
 	$end_range = $reporter->row_end + $reporter->report_offset;
 	$smarty->assign('start_range', $start_range);
 	$smarty->assign('end_range', $end_range);
	$smarty->assign('total_count', $reporter->total_count);
 		
	return $smarty->fetch("modules/Reports/templates/_template_pagination.tpl");
} // fn

//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function template_detail_and_total_list_view(&$reporter,&$args) {
	global $mod_strings, $report_smarty;
	$reporter->run_query();	
	$reporter->_load_currency();                                                                                   
	$header_row = $reporter->get_header_row();

	$report_smarty->assign('reporter', $reporter);
	$report_smarty->assign('args', $args);
	template_header_row($header_row,$args);
	
	echo $report_smarty->fetch("modules/Reports/templates/_template_detail_and_total_list_view.tpl");	                               
	/*                                                    
	$got_row = 0;                                                                                   
	while (( $row = $reporter->get_next_row() ) != 0 ) {
		$got_row = 1;
		template_list_row($row,true);
	} // while
    if (!$got_row) {
   		echo template_no_results();
    } // if	                                                                                   
	echo template_end_table($args);
	if ($reporter->has_summary_columns()) {
		$reporter->run_total_query();
		template_total_table($reporter);
	} // if
	template_query_table($reporter);
	*/
}



////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 

function isReportMatrix(&$reporter) {
	return isset($reporter->report_def['layout_options']);
} // fn

function getGroupByInfo($groupByArray, $summary_columns_array) {
	$gpByInfoArray = array();
	for ($i = 0 ; $i < count($summary_columns_array) ; $i++) {
		if (($summary_columns_array[$i]['name'] == $groupByArray['name']) && 
			($summary_columns_array[$i]['table_key'] == $groupByArray['table_key'])) {
				
			$gpByInfoArray = $groupByArray;
			$gpByInfoArray['index'] = $i;
			
			break;
		} // if
	} // for
	return $gpByInfoArray;
} // fn

function replaceHeaderRowdataWithSummaryColumns(&$header_row, $summary_columns_array, &$reporter) {
	$count = 0;
	$removeHeaderRowLink = false;
	if (empty($reporter->report_def['display_columns']) && !isReportMatrix($reporter)) {
		$removeHeaderRowLink = true;
	} // if
	for ($i = 0 ; $i < count($summary_columns_array) ; $i++) {
		if (!isset($summary_columns_array[$i]['is_group_by']) || ($summary_columns_array[$i]['is_group_by']) != 'hidden') {
			if (!$removeHeaderRowLink) {
				$header_row[$count] = $summary_columns_array[$i]['label'];
			}
			$count++;
		}
	} // for
	
} // fn

function template_summary_list_view(&$reporter,&$args) {
	global $mod_strings,$start_link_wrapper,$end_link_wrapper,$report_smarty;
	$summary_columns_array = $reporter->report_def['summary_columns'];	
	$addedColumns = 0;
	if (isReportMatrix($reporter)) {
		$isAvgExists = false;
		$indexOfAvg = 0;
		$isSumExists = false;
		$isCountExists = false;
		$missingColumnForAvg = array();
		foreach ($summary_columns_array as $key => $valueArray) {
			if (isset($valueArray['group_function'])) {
				if ($valueArray['group_function'] == 'avg') {
					$isAvgExists = true;
					$indexOfAvg = $key;
				}
				if ($valueArray['group_function'] == 'sum') {
					$isSumExists = true;			
				}
				if ($valueArray['group_function'] == 'count') {
					$isCountExists = true;			
				}
			} // if
		} // foreach
		
		if ($isAvgExists) {
			$avgValueArray = $summary_columns_array[$indexOfAvg];
			if (!$isSumExists) {
				$sumArray = $avgValueArray;
				//$sumArray['name'] = 'sum';
				$sumArray['label'] = 'sum';
				$sumArray['group_function'] = 'sum';
				$reporter->report_def['summary_columns'][] = $sumArray;
				$addedColumns = $addedColumns + 1;
			} // if
			if (!$isCountExists) {
				$countArray = $avgValueArray;
				$countArray['name'] = 'count';
				$countArray['label'] = 'count';
				$countArray['group_function'] = 'count';
				$reporter->report_def['summary_columns'][] = $countArray;
				$addedColumns = $addedColumns + 1;
			} // if
		} // if		
	} // if	
	
	$reporter->run_summary_query();
	$start_link_wrapper= "javascript:set_sort('";
	$end_link_wrapper =  "','summary');";
	$report_smarty->assign('reporter', $reporter);
	$report_smarty->assign('args', $args);

	$header_row = $reporter->get_summary_header_row();
	$group_def_array = $reporter->report_def['group_defs'];
	replaceHeaderRowdataWithSummaryColumns($header_row, $summary_columns_array, $reporter);
	$groupByIndexInHeaderRow = array();
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		$groupByColumnInfo = getGroupByInfo($group_def_array[$i], $summary_columns_array);
		$groupByIndexInHeaderRow[$group_def_array[$i]['name'] . "#" . $group_def_array[$i]['table_key']] = $groupByColumnInfo;
	} // for
	$reporter->group_defs_Info = $groupByIndexInHeaderRow;
	$reporter->addedColumns = $addedColumns;
	$report_smarty->assign('header_row', $header_row);
	$report_smarty->assign('list_type','summary');
	// $reporter->layout_manager->setAttribute('no_sort',1);
	template_header_row($header_row,$args);
	$group_def_array = $reporter->report_def['group_defs'];
	if (!isset($reporter->report_def['layout_options'])) {
		echo $report_smarty->fetch("modules/Reports/templates/_template_summary_list_view.tpl");
	} else {
		if ((count($group_def_array) == 1) || (count($group_def_array) > 3)) {
			echo $report_smarty->fetch("modules/Reports/templates/_template_summary_list_view.tpl");
		} else if (count($group_def_array) == 2) {
			echo $report_smarty->fetch("modules/Reports/templates/_template_summary_list_view_2gpby.tpl");		
		} else {
			if ($reporter->report_def['layout_options'] == "1x2") {
				echo $report_smarty->fetch("modules/Reports/templates/_template_summary_list_view_3gpbyL2.tpl");				
			} else {
				echo $report_smarty->fetch("modules/Reports/templates/_template_summary_list_view_3gpbyL1.tpl");				
			} // else
		} // else
	} // else

	/*    	
	$got_row = 0;
	while (( $row = $reporter->get_summary_next_row() ) != 0 ) {	
		$got_row = 1;
		template_list_row($row,true);
	} // while
	if (! $got_row) {
		echo template_no_results();
	} // if	
	echo template_end_table($args);	
	if ($reporter->has_summary_columns()) {
		$reporter->run_total_query();
		template_total_table($reporter);
	} // if	
	template_query_table($reporter);
	*/
} 

function getColumnDataAndFillRowsFor3By3GPBY($reporter, $header_row, &$rowsAndColumnsData, &$columnData2, &$columnData3, &$maximumCellSize, &$legend, &$grandTotal) {
	$rowArray = array();
	global $current_user;
	$decimalSep = $current_user->getPreference('dec_sep');
	$labelToDataTypeArray = $reporter->getDataTypeForColumnsForMatrix();
	$group_def_array = $reporter->report_def['group_defs'];
	$summary_columns_array = $reporter->report_def['summary_columns'];
	$attributeInfo = $group_def_array[1];
	$key2 = $reporter->group_defs_Info[$attributeInfo['name']. "#" .$attributeInfo['table_key']]['index'];

	$attributeInfo = $group_def_array[2];
	$key3 = $reporter->group_defs_Info[$attributeInfo['name']. "#" .$attributeInfo['table_key']]['index'];
	
	$count = 0;
	while (( $row = $reporter->get_summary_next_row()) != 0 ) {
		$rowArray[] = $row;
		$rowData2 = $row['cells'][$key2];
		$rowData3 = $row['cells'][$key3];
		if (!in_array($rowData2, $columnData2)) {
			$columnData2[] = $rowData2;
		}
		if (!in_array($rowData3, $columnData3)) {
			$columnData3[] = $rowData3;
		}
	} // while
	$previousRow = array();
	$count = 0;
	$countIndex = 0;
	// to find header row index except group by
	$groupByIndexInHeaderRow = array();
	$headerRowIndexExceptGpBy = array();
	
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		$key = $reporter->group_defs_Info[$group_def_array[$i]['name']. "#" .$group_def_array[$i]['table_key']]['index'];
		$groupByIndexInHeaderRow[] = $key;
	} // for
	
	for ($i = 0 ; $i < count($header_row) ; $i++) {
		if (!in_array($i, $groupByIndexInHeaderRow)) {
			$headerRowIndexExceptGpBy[] = $i;
		} // if
	} // for
	
	$maximumCellSize = count($headerRowIndexExceptGpBy);
	if (count($rowArray) <= 0) {
		return array();
	} // if
		
	// generate rows and columns data in tree structure
	for ($i = 0 ; $i < count($rowArray) ; $i++) {
		$row = $rowArray[$i];
		$changeGroupHappend = false;
		if (whereToStartGroupByRow($reporter, $i, $header_row, $previousRow, $row) === 0) {
			$rowsAndColumnsData[$count] = array();
			$changeGroupHappend = true;
			$countIndex = $count;
		} // if
		
		$groupBy2ndColumnValue = "";
		for ($j = 0 ; $j < count($group_def_array) ; $j++) {
			$groupByColumnLabel = $reporter->group_defs_Info[$group_def_array[$j]['name']. "#" .$group_def_array[$j]['table_key']]['label'];
			$key = $reporter->group_defs_Info[$group_def_array[$j]['name']. "#" .$group_def_array[$j]['table_key']]['index'];
			if ($j == 0) {
				$rowsAndColumnsData[$countIndex][$groupByColumnLabel] = $row['cells'][$key];
			} else if ($j == 1) {
				$groupBy2ndColumnValue = $row['cells'][$key];
				if (!array_key_exists($row['cells'][$key], $rowsAndColumnsData[$countIndex])) {
					$rowsAndColumnsData[$countIndex][$groupBy2ndColumnValue] = array();
				} // if
			} else {
				if (!array_key_exists($row['cells'][$key], $rowsAndColumnsData[$countIndex][$groupBy2ndColumnValue])) {
					$rowsAndColumnsData[$countIndex][$groupBy2ndColumnValue][$row['cells'][$key]] = array();
					for ($k = 0 ; $k < count($headerRowIndexExceptGpBy) ; $k++) {
						$indexOfHeaderRow = $headerRowIndexExceptGpBy[$k];
						$rowsAndColumnsData[$countIndex][$groupBy2ndColumnValue][$row['cells'][$key]][$header_row[$indexOfHeaderRow]] = $row['cells'][$indexOfHeaderRow];
					} // for
				}
			} // else
		} // for
		
		
		if ($changeGroupHappend) {
			$count++;
		} // if
		$previousRow = $row;
	} // for
	// generates row level summation and grand total
	$grandTotal['Total'] = array();
	$summary_column_label_to_name = getSummaryColumnLableToNameArray($summary_columns_array);
	//_pp($summary_columns_array);
	$isAverageExists = false;
	$averageKey = "";
	$sumKey = "";
	$countKey = "";
	$rowsAndColumnsCount = count($rowsAndColumnsData);
	for ($i = 0 ; $i < $rowsAndColumnsCount ; $i++) {
		$rowData = $rowsAndColumnsData[$i];
		$rowsAndColumnsData[$i]['Total'] = array();
		for ($m = 0 ; $m < count($columnData2) ; $m++) {
			if (!isset($grandTotal[$columnData2[$m]])) {
				$grandTotal[$columnData2[$m]] = array();
			}
			if (!isset($grandTotal[$columnData2[$m]]['Total'])) {
				$grandTotal[$columnData2[$m]]['Total'] = array();
			} // if
			for ($j = 0 ; $j < count($columnData3) ; $j++) {
				$rowsAndColumnsTotalSet = false;
				$grandTotalColumnSet = false;
				$grandTotalTeamWiseSet = false;
				$rowsAndColumnsGroupByTotalSet = false;
				$rowsAndColumns1stGpByTotal = false;
				$cellValueArray = $rowsAndColumnsData[$i][$columnData2[$m]][$columnData3[$j]];
				if (!is_array($cellValueArray)) {
					continue;
				} // if
				if (!isset($grandTotal[$columnData3[$j]])) {
					$grandTotal[$columnData3[$j]] = $cellValueArray;
					$grandTotalColumnSet = true;
				} // if
				if (!isset($grandTotal[$columnData2[$m]][$columnData3[$j]])) {
					$grandTotal[$columnData2[$m]][$columnData3[$j]] = $cellValueArray;
					$grandTotalTeamWiseSet = true;
				} // if
				if (empty($rowsAndColumnsData[$i]['Total'][$columnData3[$j]])) {
					$rowsAndColumnsData[$i]['Total'][$columnData3[$j]] = $cellValueArray;
					$rowsAndColumnsTotalSet = true;
				} // if
				if (!isset($rowsAndColumnsData[$i][$columnData2[$m]]['Total'])) {
					$rowsAndColumnsData[$i][$columnData2[$m]]['Total'] = $cellValueArray;
					$rowsAndColumnsGroupByTotalSet = true;
				} // if
				if (!isset($rowsAndColumnsData[$i]['Total']['Total'])) {
					$rowsAndColumnsData[$i]['Total']['Total'] = $cellValueArray;
					$rowsAndColumns1stGpByTotal = true;
				} // if
				$arrayKeys = array_keys($cellValueArray);
				$legend = $arrayKeys;
				for ($k = 0 ; $k < count($arrayKeys) ; $k++) {
					$value = $cellValueArray[$arrayKeys[$k]];
					$key = $arrayKeys[$k];
					if (isset($rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key])) {
						if(stristr($summary_column_label_to_name[$key], 'SUM')) {
							$sumKey = $key;
					    	$displayColumn = $labelToDataTypeArray[$key];
						
							if (!$rowsAndColumnsTotalSet) {
						    	$rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] = unformat_number($rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key]) + unformat_number($value);
					    		$displayColumn['fields'] = array(strtoupper($key) => $rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key]);
					    		$rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
							} // if
							if (!$rowsAndColumnsGroupByTotalSet) {
						    	$rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] = unformat_number($rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key]) + unformat_number($value);
					    		$displayColumn['fields'] = array(strtoupper($key) => $rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key]);
					    		$rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
							} // if
							if (!$rowsAndColumns1stGpByTotal) {
						    	$rowsAndColumnsData[$i]['Total']['Total'][$key] = unformat_number($rowsAndColumnsData[$i]['Total']['Total'][$key]) + unformat_number($value);
					    		$displayColumn['fields'] = array(strtoupper($key) => $rowsAndColumnsData[$i]['Total']['Total'][$key]);
					    		$rowsAndColumnsData[$i]['Total']['Total'][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
							} // if
						    if (!$grandTotalColumnSet) {
						    	$grandTotal[$columnData3[$j]][$key] = unformat_number($grandTotal[$columnData3[$j]][$key]) + unformat_number($value);
					    		$displayColumn['fields'] = array(strtoupper($key) => $grandTotal[$columnData3[$j]][$key]);
					    		$grandTotal[$columnData3[$j]][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
						    }
						    if (!isset($grandTotal['Total'][$key])) {
						    	$grandTotal['Total'][$key] = $grandTotal[$columnData3[$j]][$key];
						    } else {
						    	$grandTotal['Total'][$key] = unformat_number($grandTotal['Total'][$key]) + unformat_number($value);
					    		$displayColumn['fields'] = array(strtoupper($key) => $grandTotal['Total'][$key]);
					    		$grandTotal['Total'][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
						    }
						    if (!$grandTotalTeamWiseSet) {
						    	$grandTotal[$columnData2[$m]][$columnData3[$j]][$key] = unformat_number($grandTotal[$columnData2[$m]][$columnData3[$j]][$key]) + unformat_number($value);
					    		$displayColumn['fields'] = array(strtoupper($key) => $grandTotal[$columnData2[$m]][$columnData3[$j]][$key]);
					    		$grandTotal[$columnData2[$m]][$columnData3[$j]][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
						    }
						    
						    if (!isset($grandTotal[$columnData2[$m]]['Total'][$key])) {
						    	$grandTotal[$columnData2[$m]]['Total'][$key] = $grandTotal[$columnData2[$m]][$columnData3[$j]][$key];
						    } else {
						    	$grandTotal[$columnData2[$m]]['Total'][$key] = unformat_number($grandTotal[$columnData2[$m]]['Total'][$key]) + unformat_number($value);
						    	
					    		$displayColumn['fields'] = array(strtoupper($key) => $grandTotal[$columnData2[$m]]['Total'][$key]);
					    		$grandTotal[$columnData2[$m]]['Total'][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
						    } // else
						    
						} // if
						if(stristr($summary_column_label_to_name[$key], 'MIN')) {
						    if (!isset($grandTotal['Total'][$key])) {
						    	$grandTotal['Total'][$key] = $grandTotal[$columnData3[$j]][$key];
						    } // if
						    if (!isset($grandTotal[$columnData2[$m]]['Total'][$key])) {
						    	$grandTotal[$columnData2[$m]]['Total'][$key] = $grandTotal[$columnData2[$m]][$columnData3[$j]][$key];
						    } // if
						    
							if (unformat_number($value) < 
								unformat_number($rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key])) {

								if (!$rowsAndColumnsGroupByTotalSet) {
									$rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] = $value;
								} // if
							} // if

							if (unformat_number($rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key]) < 
								unformat_number($grandTotal[$columnData2[$m]]['Total'][$key])) {

									$grandTotal[$columnData2[$m]]['Total'][$key] = $value;
							} // if
							
							if (unformat_number($value) <
								unformat_number($grandTotal[$columnData2[$m]][$columnData3[$j]][$key])) {

								if (!$grandTotalTeamWiseSet) {
									$grandTotal[$columnData2[$m]][$columnData3[$j]][$key] = $value;														} // if
							} // if

							if (unformat_number($value) <
								unformat_number($rowsAndColumnsData[$i]['Total']['Total'][$key])) {

								if (!$rowsAndColumns1stGpByTotal) {
									$rowsAndColumnsData[$i]['Total']['Total'][$key] = $value;															} // if
							} // if

							if (unformat_number($value) < 
								unformat_number($grandTotal['Total'][$key])) {

									$grandTotal['Total'][$key] = $value;																		} // if

							if (unformat_number($value) < 
								unformat_number($rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key])) {
								
								if (!$rowsAndColumnsTotalSet) {
									$rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] = $value;
								} // if
							} // if
														
							if (unformat_number($rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key]) < 
								unformat_number($grandTotal[$columnData3[$j]][$key])) {

							    if (!$grandTotalColumnSet) {
							    	$grandTotal[$columnData3[$j]][$key] = $value;
							    }
							} // if
						} // if
						if(stristr($summary_column_label_to_name[$key], 'MAX')) {
						    if (!isset($grandTotal['Total'][$key])) {
						    	$grandTotal['Total'][$key] = $grandTotal[$columnData3[$j]][$key];
						    } // if
						    if (!isset($grandTotal[$columnData2[$m]]['Total'][$key])) {
						    	$grandTotal[$columnData2[$m]]['Total'][$key] = $grandTotal[$columnData2[$m]][$columnData3[$j]][$key];
						    } // if
						    
							if (unformat_number($value) > 
								unformat_number($rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key])) {

								if (!$rowsAndColumnsGroupByTotalSet) {
									$rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] = $value;
								} // if
							} // if

							if (unformat_number($rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key]) > 
								unformat_number($grandTotal[$columnData2[$m]]['Total'][$key])) {

									$grandTotal[$columnData2[$m]]['Total'][$key] = $value;
							} // if
							
							if (unformat_number($value) > 
								unformat_number($grandTotal[$columnData2[$m]][$columnData3[$j]][$key])) {

								if (!$grandTotalTeamWiseSet) {
									$grandTotal[$columnData2[$m]][$columnData3[$j]][$key] = $value;														
								} // if
							} // if

							if (unformat_number($value) > 
								unformat_number($rowsAndColumnsData[$i]['Total']['Total'][$key])) {

								if (!$rowsAndColumns1stGpByTotal) {
									$rowsAndColumnsData[$i]['Total']['Total'][$key] = $value;															
								} // if
							} // if

							if (unformat_number($value) > 
								unformat_number($grandTotal['Total'][$key])) {

									$grandTotal['Total'][$key] = $value;																			
							} // if

							if (unformat_number($value) > 
								unformat_number($rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key])) {
								
								if (!$rowsAndColumnsTotalSet) {
									$rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] = $value;
								} // if
							} // if
														
							if (unformat_number($rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key]) > 
								unformat_number($grandTotal[$columnData3[$j]][$key])) {

							    if (!$grandTotalColumnSet) {
							    	$grandTotal[$columnData3[$j]][$key] = $value;
							    }
							} // if
							
						} // if				}
						if(stristr($summary_column_label_to_name[$key], 'AVG')) {
							if (!$isAverageExists) {
								$averageKey = $key;
								$isAverageExists = true;
							} // if
						    $rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] = "";
						    $rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] = "";
						    $grandTotal[$columnData3[$j]][$key] = "";
						    $grandTotal['Total'][$key] = $value;
						    $grandTotal[$columnData2[$m]][$columnData3[$j]][$key] = "";
							$grandTotal[$columnData2[$m]]['Total'][$key] = "";
						}
						if(stristr($summary_column_label_to_name[$key], 'Count')) {
							$countKey = $key;
							if (!$rowsAndColumnsTotalSet) {
						    	$rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] = $rowsAndColumnsData[$i]['Total'][$columnData3[$j]][$key] + $value;
							} // if
							if (!$rowsAndColumnsGroupByTotalSet) {
						    	$rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] = $rowsAndColumnsData[$i][$columnData2[$m]]['Total'][$key] + $value;
							} // if
							if (!$rowsAndColumns1stGpByTotal) {
						    	$rowsAndColumnsData[$i]['Total']['Total'][$key] = $rowsAndColumnsData[$i]['Total']['Total'][$key] + $value;
							} // if
							
						    if (!$grandTotalColumnSet) {
						    	$grandTotal[$columnData3[$j]][$key] = unformat_number($grandTotal[$columnData3[$j]][$key]) + unformat_number($value);
						    }
						    
						    if (!isset($grandTotal['Total'][$key])) {
						    	$grandTotal['Total'][$key] = $grandTotal[$columnData3[$j]][$key];
						    } else {
						    	$grandTotal['Total'][$key] = unformat_number($grandTotal['Total'][$key]) + unformat_number($value);
						    }
						    if (!$grandTotalTeamWiseSet) {
						    	$grandTotal[$columnData2[$m]][$columnData3[$j]][$key] = unformat_number($grandTotal[$columnData2[$m]][$columnData3[$j]][$key]) + unformat_number($value);
						    }						    
						    if (!isset($grandTotal[$columnData2[$m]]['Total'][$key])) {
						    	$grandTotal[$columnData2[$m]]['Total'][$key] = $grandTotal[$columnData2[$m]][$columnData3[$j]][$key];
						    } else {
						    	$grandTotal[$columnData2[$m]]['Total'][$key] = unformat_number($grandTotal[$columnData2[$m]]['Total'][$key]) + unformat_number($value);
						    	
						    } // else
						    
						    
						} // if
						
					} else {
						//_ppd("This should not happen");
						//$rowsAndColumnsData[$i]['Total'][$key] = $value;
					} // else
				} // for
				
			} // for
		} // for
			// calculate average for the group wise data. Assume that Sum and Count exists.
		if ($isAverageExists) {
			$columnData2Array = $columnData2;
			$columnData2Array[] = 'Total';
			$columnData3Array = $columnData3;
			$columnData3Array[] = 'Total';
			for ($n = 0 ; $n < count($columnData2Array) ; $n++) {
				for ($p = 0 ; $p < count($columnData3Array) ; $p++) {
					if (isset($rowsAndColumnsData[$i][$columnData2Array[$n]])) {
						if (isset($rowsAndColumnsData[$i][$columnData2Array[$n]][$columnData3Array[$p]])) {
							$rowsAndColumnsData[$i][$columnData2Array[$n]][$columnData3Array[$p]][$averageKey] = number_format(unformat_number($rowsAndColumnsData[$i][$columnData2Array[$n]][$columnData3Array[$p]][$sumKey]) /  $rowsAndColumnsData[$i][$columnData2Array[$n]][$columnData3Array[$p]][$countKey], 4, $decimalSep, '');
					    	$displayColumn = $labelToDataTypeArray[$averageKey];
				    		$displayColumn['fields'] = array(strtoupper($averageKey) => $rowsAndColumnsData[$i][$columnData2Array[$n]][$columnData3Array[$p]][$averageKey]);
				    		$rowsAndColumnsData[$i][$columnData2Array[$n]][$columnData3Array[$p]][$averageKey] = $reporter->layout_manager->widgetDisplay($displayColumn);
						} // if
					} // if
				} // for
				for ($j = 0 ; $j < count($columnData3Array) ; $j++) {
					if (isset($grandTotal[$columnData3Array[$j]])) {
						$grandTotal[$columnData3Array[$j]][$averageKey] = number_format(unformat_number($grandTotal[$columnData3Array[$j]][$sumKey]) /  $grandTotal[$columnData3Array[$j]][$countKey], 4, $decimalSep, '');
					    $displayColumn = $labelToDataTypeArray[$averageKey];
				    	$displayColumn['fields'] = array(strtoupper($averageKey) => $grandTotal[$columnData3Array[$j]][$averageKey]);
				    	$grandTotal[$columnData3Array[$j]][$averageKey] = $reporter->layout_manager->widgetDisplay($displayColumn);
					} // if
					if (!empty($grandTotal[$columnData2[$n]][$columnData3Array[$j]])) {
						$grandTotal[$columnData2[$n]][$columnData3Array[$j]][$averageKey] = number_format(unformat_number($grandTotal[$columnData2[$n]][$columnData3Array[$j]][$sumKey]) /  $grandTotal[$columnData2[$n]][$columnData3Array[$j]][$countKey], 4, $decimalSep, '');
					    $displayColumn = $labelToDataTypeArray[$averageKey];
				    	$displayColumn['fields'] = array(strtoupper($averageKey) => $grandTotal[$columnData2[$n]][$columnData3Array[$j]][$averageKey]);
				    	$grandTotal[$columnData2[$n]][$columnData3Array[$j]][$averageKey] = $reporter->layout_manager->widgetDisplay($displayColumn);
					} // if
				} // for
				
			} // for
			//$rowsAndColumnsData[$i]['Total']['Total'][$averageKey] = format_number(unformat_number($rowsAndColumnsData[$i]['Total']['Total'][$sumKey]) /  $rowsAndColumnsData[$i]['Total']['Total']['Count']);
		}
	} // for
	$attributeInfo = $group_def_array[0];
	$groupByColumnLabel = $reporter->group_defs_Info[$attributeInfo['name']."#".$attributeInfo['table_key']]['label'];
	$grandTotal[$groupByColumnLabel] = "Grand Total";
	if (($reporter->addedColumns > 0) && !empty($legend)) {
		$newLegend = array();
		for ($i = 0 ; $i < (count($legend) - $reporter->addedColumns) ; $i++) {
			$newLegend[] = $legend[$i];
		} // for
		$legend = $newLegend;
	}	
	//_pp($grandTotal);
	//$rowsAndColumnsData[] = $grandTotal;
	//_pp($headerColumnNameArray[0]);
	//_ppd($rowsAndColumnsData);
	//_ppd($columnData);
	//return $columnData;
} // fn

function getSummaryColumnLableToNameArray($summary_columns_array) {

	$labelToName = array();
	for ($i = 0 ; $i < count($summary_columns_array) ; $i++) {
		$labelToName[$summary_columns_array[$i]['label']] = (isset($summary_columns_array[$i]['group_function']) ? $summary_columns_array[$i]['group_function'] : $summary_columns_array[$i]['name']);
	} // for
	return $labelToName;
}

function getColumnDataAndFillRowsFor2By2GPBY($reporter, $header_row, &$rowsAndColumnsData, &$columnData, $groupByIndex, &$maximumCellSize, &$legend) {
	$rowArray = array();
	global $current_user;
	$decimalSep = $current_user->getPreference('dec_sep');
	$labelToDataTypeArray = $reporter->getDataTypeForColumnsForMatrix();
	$summary_columns_array = $reporter->report_def['summary_columns'];
	$group_def_array = $reporter->report_def['group_defs'];
	$attributeInfo = $group_def_array[$groupByIndex];
	$key = $reporter->group_defs_Info[$attributeInfo['name']."#".$attributeInfo['table_key']]['index'];
	$count = 0;
	while (( $row = $reporter->get_summary_next_row()) != 0 ) {
		$rowArray[] = $row;
		$rowData = $row['cells'][$key];
		if (!in_array($rowData, $columnData)) {
			$columnData[$count++] = $rowData;
		}
	} // while
	$previousRow = array();
	$count = 0;
	$countIndex = 0;
	
	// to find header row index except group by
	$groupByIndexInHeaderRow = array();
	$headerRowIndexExceptGpBy = array();
	
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		$key = $reporter->group_defs_Info[$group_def_array[$i]['name']."#".$group_def_array[$i]['table_key']]['index'];
		$groupByIndexInHeaderRow[] = $key;
	} // for
	
	for ($i = 0 ; $i < count($header_row) ; $i++) {
		if (!in_array($i, $groupByIndexInHeaderRow)) {
			$headerRowIndexExceptGpBy[] = $i;
		} // if
	} // for
	
	
	$maximumCellSize = count($headerRowIndexExceptGpBy);
	if (count($rowArray) <= 0) {
		return array();
	} // if
	// generate rows and columns data in tree structure
	for ($i = 0 ; $i < count($rowArray) ; $i++) {
		$row = $rowArray[$i];
		$changeGroupHappend = false;
		//_pp(whereToStartGroupByRow($reporter, $i, $header_row, $previousRow, $row));
		if (whereToStartGroupByRow($reporter, $i, $header_row, $previousRow, $row) === 0) {
			$rowsAndColumnsData[$count] = array();
			$changeGroupHappend = true;
			$countIndex = $count;
		} // if		
		
		for ($j = 0 ; $j < count($group_def_array) ; $j++) {
			$groupByColumnLabel = $reporter->group_defs_Info[$group_def_array[$j]['name']."#".$group_def_array[$j]['table_key']]['label'];
			$key = $reporter->group_defs_Info[$group_def_array[$j]['name']."#".$group_def_array[$j]['table_key']]['index'];
			if ($j == 0) {
				$rowsAndColumnsData[$countIndex][$groupByColumnLabel] = $row['cells'][$key];
			} else {
				if (!array_key_exists($row['cells'][$key], $rowsAndColumnsData[$countIndex])) {
					$rowsAndColumnsData[$countIndex][$row['cells'][$key]] = array();
					for ($k = 0 ; $k < count($headerRowIndexExceptGpBy) ; $k++) {
						$indexOfHeaderRow = $headerRowIndexExceptGpBy[$k];
						$rowsAndColumnsData[$countIndex][$row['cells'][$key]][$header_row[$indexOfHeaderRow]] = $row['cells'][$indexOfHeaderRow];
					} // for
				}
			} // else
		} // for
		
		
		if ($changeGroupHappend) {
			$count++;
		} // if
		$previousRow = $row;
	} // for
	// generates row level summation and grand total
	$grandTotal = array();
	$grandTotal['Total'] = array();
	$isAverageExists = false;
	$averageKey = "";
	$sumKey = "";
	$countKey = "";
	$summary_column_label_to_name = getSummaryColumnLableToNameArray($summary_columns_array);
	$rowsAndColumnsCount = count($rowsAndColumnsData);
	for ($i = 0 ; $i < $rowsAndColumnsCount ; $i++) {
		$rowData = $rowsAndColumnsData[$i];
		$rowsAndColumnsData[$i]['Total'] = array();
		for ($j = 0 ; $j < count($columnData) ; $j++) {
			$rowsAndColumnsTotalSet = false;
			$grandTotalColumnSet = false;
			$cellValueArray = $rowsAndColumnsData[$i][$columnData[$j]];
			if (!is_array($cellValueArray)) {
				continue;
			} // if
			if (!isset($grandTotal[$columnData[$j]])) {
				$grandTotal[$columnData[$j]] = $cellValueArray;
				$grandTotalColumnSet = true;
			} // if
			if (empty($rowsAndColumnsData[$i]['Total'])) {
				$rowsAndColumnsData[$i]['Total'] = $cellValueArray;
				$rowsAndColumnsTotalSet = true;
			} // if
			$arrayKeys = array_keys($cellValueArray);
			$legend = $arrayKeys;
			for ($k = 0 ; $k < count($arrayKeys) ; $k++) {
				$value = $cellValueArray[$arrayKeys[$k]];
				$key = $arrayKeys[$k];
				if (isset($rowsAndColumnsData[$i]['Total'][$key])) {
					if(stristr($summary_column_label_to_name[$key], 'SUM')) {
						$sumKey = $key;
					    $displayColumn = $labelToDataTypeArray[$key];
						if (!$rowsAndColumnsTotalSet) {
					    	$rowsAndColumnsData[$i]['Total'][$key] = unformat_number($rowsAndColumnsData[$i]['Total'][$key]) + unformat_number($value);
					    	$displayColumn['fields'] = array(strtoupper($key) => $rowsAndColumnsData[$i]['Total'][$key]);
					    	$rowsAndColumnsData[$i]['Total'][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);
						} // if
					    if (!$grandTotalColumnSet) {
					    	$grandTotal[$columnData[$j]][$key] = unformat_number($grandTotal[$columnData[$j]][$key]) + unformat_number($value);
					    	$displayColumn['fields'] = array(strtoupper($key) => $grandTotal[$columnData[$j]][$key]);
					    	$grandTotal[$columnData[$j]][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);					    	
					    }
					    if (!isset($grandTotal['Total'][$key])) {
					    	$grandTotal['Total'][$key] = $grandTotal[$columnData[$j]][$key];
					    } else {
					    	$grandTotal['Total'][$key] = unformat_number($grandTotal['Total'][$key]) + unformat_number($value);
					    	$displayColumn['fields'] = array(strtoupper($key) => $grandTotal['Total'][$key]);
					    	$grandTotal['Total'][$key] = $reporter->layout_manager->widgetDisplay($displayColumn);	
					    }
					} // if
					if(stristr($summary_column_label_to_name[$key], 'MIN')) {
					    if (!isset($grandTotal['Total'][$key])) {
					    	$grandTotal['Total'][$key] = $grandTotal[$columnData[$j]][$key];
					    } // if
						if (unformat_number($value) < 
							unformat_number($rowsAndColumnsData[$i]['Total'][$key])) {
							
							if (!$rowsAndColumnsTotalSet) {
								$rowsAndColumnsData[$i]['Total'][$key] = $value;
							} // if
						    //$grandTotal['Total'][$key] = $value;
						} // if
						
						if (unformat_number($value) < 
							unformat_number($grandTotal['Total'][$key])) {

							$grandTotal['Total'][$key] = $value;																				
						} // if
						
						if (unformat_number($value) < 
							unformat_number($grandTotal[$columnData[$j]][$key])) {

						    if (!$grandTotalColumnSet) {
						    	$grandTotal[$columnData[$j]][$key] = $value;
						    }
						} // if
						
					} // if
					if(stristr($summary_column_label_to_name[$key], 'MAX')) {
					    if (!isset($grandTotal['Total'][$key])) {
					    	$grandTotal['Total'][$key] = $grandTotal[$columnData[$j]][$key];
					    } // if
						if (unformat_number($value) >
							unformat_number($rowsAndColumnsData[$i]['Total'][$key])) {
							if (!$rowsAndColumnsTotalSet) {
								$rowsAndColumnsData[$i]['Total'][$key] = $value;
							} // if
						    //$grandTotal['Total'][$key] = $value;
						} // if
						
						if (unformat_number($value) > 
							unformat_number($grandTotal['Total'][$key])) {

							$grandTotal['Total'][$key] = $value;																				
						} // if
						
						if (unformat_number($value) > 
							unformat_number($grandTotal[$columnData[$j]][$key])) {

						    if (!$grandTotalColumnSet) {
						    	$grandTotal[$columnData[$j]][$key] = $value;
						    }
						} // if
						
						
					} // if				}
					if(stristr($summary_column_label_to_name[$key], 'AVG')) {
						if (!$isAverageExists) {
							$averageKey = $key;
							$isAverageExists = true;
						} // if
					    $rowsAndColumnsData[$i]['Total'][$key] = "";
					    $grandTotal[$columnData[$j]][$key] = "";
					    $grandTotal['Total'][$key] = $value;
					}
					if(stristr($summary_column_label_to_name[$key], 'Count')) {
						$countKey = $key;
						if (!$rowsAndColumnsTotalSet) {
					    	$rowsAndColumnsData[$i]['Total'][$key] = $rowsAndColumnsData[$i]['Total'][$key] + $value;
						} // if
					    if (!$grandTotalColumnSet) {
					    	$grandTotal[$columnData[$j]][$key] = unformat_number($grandTotal[$columnData[$j]][$key]) + unformat_number($value);
					    }
					    
					    if (!isset($grandTotal['Total'][$key])) {
					    	$grandTotal['Total'][$key] = $grandTotal[$columnData[$j]][$key];
					    } else {
					    	$grandTotal['Total'][$key] = unformat_number($grandTotal['Total'][$key]) + unformat_number($value);
					    }
					} // if
					
				} else {
					//_ppd("This should not happen");
					//$rowsAndColumnsData[$i]['Total'][$key] = $value;
				} // else
			} // for
			
		} // for
			// calculate average. Assume that Sum and Count exists.
			if ($isAverageExists) {
				$rowsAndColumnsData[$i]['Total'][$averageKey] = number_format(unformat_number($rowsAndColumnsData[$i]['Total'][$sumKey]) /  $rowsAndColumnsData[$i]['Total'][$countKey], 4, $decimalSep, '');
				$displayColumn = $labelToDataTypeArray[$averageKey];
		    	$displayColumn['fields'] = array(strtoupper($averageKey) => $rowsAndColumnsData[$i]['Total'][$averageKey]);
		    	$rowsAndColumnsData[$i]['Total'][$averageKey] = $reporter->layout_manager->widgetDisplay($displayColumn);
			}
	} // for
	
	if ($isAverageExists) {
				$grandTotal['Total'][$averageKey] = number_format(unformat_number($grandTotal['Total'][$sumKey]) /  $grandTotal['Total'][$countKey], 4, $decimalSep, '');
				$displayColumn = $labelToDataTypeArray[$averageKey];
		    	$displayColumn['fields'] = array(strtoupper($averageKey) => $grandTotal['Total'][$averageKey]);
		    	$grandTotal['Total'][$averageKey] = $reporter->layout_manager->widgetDisplay($displayColumn);
		    	
		for ($j = 0 ; $j < count($columnData) ; $j++) {
				$grandTotal[$columnData[$j]][$averageKey] = number_format(unformat_number($grandTotal[$columnData[$j]][$sumKey]) /  $grandTotal[$columnData[$j]][$countKey], 4, $decimalSep, '');
				$displayColumn = $labelToDataTypeArray[$averageKey];
		    	$displayColumn['fields'] = array(strtoupper($averageKey) => $grandTotal[$columnData[$j]][$averageKey]);
		    	$grandTotal[$columnData[$j]][$averageKey] = $reporter->layout_manager->widgetDisplay($displayColumn);
		} // for
	} // if
	
	$groupByColumnLabel = $reporter->group_defs_Info[$group_def_array[0]['name']."#".$group_def_array[0]['table_key']]['label'];

	$grandTotal[$groupByColumnLabel] = "Grand Total";
	$rowsAndColumnsData[] = $grandTotal;
	if (($reporter->addedColumns > 0) && !empty($legend)) {
		$newLegend = array();
		for ($i = 0 ; $i < (count($legend) - $reporter->addedColumns) ; $i++) {
			$newLegend[] = $legend[$i];
		} // for
		$legend = $newLegend;
	}
	//_pp($grandTotal);	
	//_pp($headerColumnNameArray[0]);
	//_ppd($rowsAndColumnsData);
	//_ppd($columnData);
	//return $columnData;
} // fn

function getHeaderColumnNamesForMatrix($reporter, $header_row, $columnDataFor2ndGroup) {
    global $mod_strings;

    $headerColumnNameArray = array();

    for ($i = 0; $i < count($reporter->report_def['group_defs']); $i++) {
		$headerColumnNameArray[] = $header_row[$i];
	} // for
	
	$headerColumnNameArray[] = $mod_strings['LBL_REPORT_GRAND_TOTAL'];
	return $headerColumnNameArray;
} // fn

function getColumnNamesForMatrix($reporter, $header_row, $columnDataFor2ndGroup) {
	$columnNameArray = array();
	$group_def_array = $reporter->report_def['group_defs'];
	$summary_columns_array = $reporter->report_def['summary_columns'];

	$groupByColumnLabel = $reporter->group_defs_Info[$group_def_array[0]['name']."#".$group_def_array[0]['table_key']]['label'];
	$columnNameArray[] = $groupByColumnLabel;
	
	for ($i = 0 ; $i < count($columnDataFor2ndGroup) ; $i++) {
		$columnNameArray[] = $columnDataFor2ndGroup[$i];
	}
	$columnNameArray[] = "Total";
	return $columnNameArray;
} // fn


function whereToStartGroupByRow(&$reporter, $count, $header_row, $previous_row, $row) {
	$toStart = 0;
	if ($count == 0 || empty($previous_row)){
		return $toStart;
	} // if
	$group_def_array = $reporter->report_def['group_defs'];
	
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		$key = $reporter->group_defs_Info[$group_def_array[$i]['name']."#".$group_def_array[$i]['table_key']]['index'];
		if ($previous_row['cells'][$key] != $row['cells'][$key]) {
			$toStart = $i;
			break;
		} // if
	} // for
	return $toStart;
} // fn

function setGroupCount($header_row, $row, &$groupCountArray, $groupString, $countKeyIndex) {
	if ($countKeyIndex != -1) {
		$countForGroup = $row['cells'][$countKeyIndex];
		$groupCountArray[$groupString] = $groupCountArray[$groupString] + $countForGroup;	
	} // if
} // fn

function getCounterArrayForGroupBy($reporter, $counterForIndex0) {
	$counterArray = array();
	$group_def_array = $reporter->report_def['group_defs'];
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		if ($i == 0) {
			$counterArray[$i] = $counterForIndex0;		
		} else {
			$counterArray[$i] = 0;		
		} // else
	} // for
	return $counterArray;
}

function generateIdForGroupByIndex(&$counterArray, $groupByIndex) {
	$returnId = "Id";
	for ($i = 0 ; $i <= $groupByIndex ; $i++) {
		$returnId = $returnId . "_" . $counterArray[$i];
	} // for
	return $returnId;
} // fn

function incrementCountForRowId(&$rowIdToCountArray, $rowId) {
	$rowIdSplitArray = explode("_", $rowId);
	$newRowId = $rowIdSplitArray[0];
	for ($i = 1 ; $i < count($rowIdSplitArray) ; $i++) {
		$newRowId = $newRowId . "_" . $rowIdSplitArray[$i];
		$rowIdToCountArray[$newRowId] = $rowIdToCountArray[$newRowId] + 1;
	} // for
} // fn

function getGroupByColumnName(&$reporter, $index, $header_row, $row) {
	$group_def_array = $reporter->report_def['group_defs'];
	$attributeInfo = $group_def_array[$index];
	$key = $reporter->group_defs_Info[$attributeInfo['name']."#".$attributeInfo['table_key']]['index'];
	$groupByColumnLabel = $reporter->group_defs_Info[$attributeInfo['name']."#".$attributeInfo['table_key']]['label'];
	$columnValues = "";
	if ($index == (count($group_def_array) - 1)) {
		$columnValues = getColumnsInfoFromHeaderExceptGroupBy($reporter, $header_row, $row);
	} // else
	$headerValue = $row['cells'][$key];
	if (empty($headerValue)) {
		$headerValue = "None";
	}
    // Bug #39763 Summary label should be displayed instead of group label.
    if (isset($reporter->report_def['summary_columns']))
    {
        foreach ($reporter->report_def['summary_columns'] as $summaryField)
        {
            $isValid = true;
            if (isSet($attributeInfo['qualifier']))
            {
                if (!isSet($summaryField['qualifier']))
                {
                    $isValid = false;
                }
                elseif ($attributeInfo['qualifier'] != $summaryField['qualifier'])
                {
                    $isValid = false;
                }
            }
            if ($summaryField['table_key'] == $attributeInfo['table_key'] && $summaryField['name'] == $attributeInfo['name'] && $isValid == true)
            {
                $groupByColumnLabel = $summaryField['label'];
            }
        }
    }
	$returnData = $groupByColumnLabel . " = " . $headerValue;
	return (empty($columnValues) ? $returnData : $returnData . ", " . $columnValues);
} // fn

function getColumnsInfoFromHeaderExceptGroupBy(&$reporter, $header_row, $row) {
	$groupByIndexInHeaderRow = array();
	$group_def_array = $reporter->report_def['group_defs'];
	$columnValues = "";
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		$key = $reporter->group_defs_Info[$group_def_array[$i]['name']."#".$group_def_array[$i]['table_key']]['index'];
		$groupByIndexInHeaderRow[] = $key;
	} // for
	$count = 0;
	for ($i = 0 ; $i < count($header_row) ; $i++) {
		if (!in_array($i, $groupByIndexInHeaderRow)) {
			if ($count != 0) {
				$columnValues = $columnValues . ", ";
			}
			$columnValues = $columnValues . $header_row[$i] . " = " . $row['cells'][$i];
			$count++;
		} // if
	} // for
	return $columnValues;
} // fn

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_summary_combo_view(&$reporter,&$args) {

	global $mod_strings,$start_link_wrapper,$end_link_wrapper,$report_smarty;
	$reporter->run_summary_combo_query();
	$reporter->_load_currency();
	// $reporter->layout_manager->setAttribute('no_sort',1);
	$columns_row = $reporter->get_header_row(); 
	$start_link_wrapper= "javascript:set_sort('";
	$end_link_wrapper =  "','summary');";
	$reporter->layout_manager->setAttribute('no_sort',1);
	$header_row = $reporter->get_summary_header_row();
	$count = 0;
	
	$group_def_array = $reporter->report_def['group_defs'];
	$summary_columns_array = $reporter->report_def['summary_columns'];
	$groupByIndexInHeaderRow = array();
	for ($i = 0 ; $i < count($group_def_array) ; $i++) {
		$groupByColumnLabel = getGroupByInfo($group_def_array[$i], $summary_columns_array);
		$groupByIndexInHeaderRow[$group_def_array[$i]['name']. "#" . $group_def_array[$i]['table_key']] = $groupByColumnLabel;
	} // for
	$reporter->group_defs_Info = $groupByIndexInHeaderRow;
	//_ppd($reporter->report_def);
	$summary_column_label_to_name = getSummaryColumnLableToNameArray($summary_columns_array);
	$countKeyIndex = -1;
	if (($countKeyIndex = array_search("count", array_values($summary_column_label_to_name))) === false) {
		$countKeyIndex = -1;	
	}
	$report_smarty->assign('countKeyIndex', $countKeyIndex);
	$report_smarty->assign('reporter', $reporter);
	$report_smarty->assign('args', $args);
	$report_smarty->assign('header_row', $header_row);
	$report_smarty->assign('columns_row', $columns_row);
	$report_smarty->assign('mod_strings', $mod_strings);
	$report_smarty->assign('list_type','summary_combo');
	
	$reportExpandAll = "1";
	if (isset($args['reportCache'])) {
		$reportCache = $args['reportCache'];
		if (!empty($reportCache->report_options_array)) {
			if (array_key_exists("expandAll", $reportCache->report_options_array) && !$reportCache->report_options_array['expandAll']) {
				$reportExpandAll = "0";
			}
		} // if
	} // if
	
	$report_smarty->assign('expandAll', $reportExpandAll);
	echo $report_smarty->fetch("modules/Reports/templates/_template_summary_combo_view.tpl");
	/*
 	while (( $row = $reporter->get_summary_next_row() ) != 0 ) {
		template_header_row($header_row, $args, true);
		$divId = "combo_summary_div_". $count;
		template_list_row($row, false, true, $divId);
		echo template_end_table($args);
		
		echo "<div id='". $divId ."' style='padding-left: 30px;display:none'>";
		template_header_row($columns_row, $args);
  		if ($reporter->current_summary_row_count > 0) {
  			for($i=0; $i < $reporter->current_summary_row_count; $i++ ) {
				if (($column_row = $reporter->get_next_row() ) != 0 ) {
					template_list_row($column_row);
			   } else {
			     break;
			   } // else
  			} // for

  		} else {
			echo template_no_results();
  		}
		echo template_end_table($args);
		echo "</div>";
		$count++;

	} // while
	
  if ( ! isset($header_row[0]['norows']))
  {
    echo get_form_header( $mod_strings['LBL_GRAND_TOTAL'],"", false); 
  }
  if ( $reporter->has_summary_columns()) {
	  template_total_table($reporter);
  } // if

  template_query_table($reporter); 
  */
} 



function template_total_view(&$reporter) {
	$reporter->run_total_query();
	global $report_smarty;	
	$report_smarty->assign('reporter', $reporter);
	/*template_total_table($reporter);
	template_query_table($reporter); */
	echo $report_smarty->fetch("modules/Reports/templates/_template_total_view.tpl");
}

// Moved the code in corresponding template file
/*
function template_total_table(&$reporter) {
	global $mod_strings;
	$total_header_row = $reporter->get_total_header_row(); 
	$total_row = $reporter->get_summary_total_row();
	if ( isset($total_row['group_pos'])) {
		$args['group_pos'] = $total_row['group_pos'];
	} // if
	if ( isset($total_row['group_column_is_invisible'])) {
		$args['group_column_is_invisible'] = $total_row['group_column_is_invisible'];
	} // if
 	$reporter->layout_manager->setAttribute('no_sort',1);
  	echo get_form_header( $mod_strings['LBL_GRAND_TOTAL'],"", false); 
  	template_header_row1($total_header_row,$args);
  	if (! empty($total_row)) {
    	template_list_row1($total_row);
  	} else {
		echo template_no_results();
  	}
	echo template_end_table($args);
} // fn
*/

function template_no_results() {
    global $mod_strings;
	return "<tr class=\"evenListRowS1\"><td>&nbsp;&nbsp;&nbsp;{$mod_strings['LBL_NO_REPORTS']}</td></tr>";
} // fn

function template_list_view_no_results($args) {
    global $mod_strings;
	$returnString = "<tr class=\"evenListRowS1\">";
	for($i = 0 ; $i < count($args['reporter']->report_def['display_columns']) ; $i++) {
		$returnString = $returnString . "<td>&nbsp;&nbsp;&nbsp;{$mod_strings['LBL_NO_REPORTS']}</td>";
	}
	$returnString = $returnString."</tr>";
	return $returnString;
	//return "<tr class=\"evenListRowS1\"><td>&nbsp;&nbsp;&nbsp;No results</td></tr>";
} // fn

function template_summary_view_no_results($args) {
    global $mod_strings;
	$returnString = "<tr class=\"evenListRowS1\">";
	for($i = 0 ; $i < count($args['reporter']->report_def['summary_columns']) ; $i++) {
		$returnString = $returnString . "<td>&nbsp;&nbsp;&nbsp;{$mod_strings['LBL_NO_REPORTS']}</td>";
	}
	$returnString = $returnString."</tr>";
	return $returnString;
	//return "<tr class=\"evenListRowS1\"><td>&nbsp;&nbsp;&nbsp;No results</td></tr>";
} // fn

function template_summary_combo_view_no_results($args) {
    global $mod_strings;
	$returnString = "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" class=\"reportlistView\"><tr class=\"evenListRowS1\">";
	for($i = 0 ; $i < count($args['reporter']->report_def['display_columns']) ; $i++) {
		$returnString = $returnString . "<td>&nbsp;&nbsp;&nbsp;{$mod_strings['LBL_NO_REPORTS']}</td>";
	}
	$returnString = $returnString."</tr>";
	return $returnString;
	//return "<tr class=\"evenListRowS1\"><td>&nbsp;&nbsp;&nbsp;No results</td></tr>";
} // fn


function template_pagination_row(&$args) {
	return "<tr class=\"pagination\"><td colspan='".count($args['reporter']->report_def['display_columns'])."'align=\"right\">".template_pagination($args)."</td></tr>";
	/*
?>
<tr class="pagination">
<td colspan="<?php echo count($args['reporter']->report_def['display_columns']); ?>" align="right"><?php echo template_pagination($args);?></td></tr>
<?php
*/
}

function template_end_table(&$args) {
	return "</table></p>";
} // fn

function template_header_row(&$header_row, &$args, $isSummaryCombo=false) {
	global $oddRow, $report_smarty;
	$count = 0;
	if (!empty($args['show_pagination'])) { 
		$report_smarty->assign('pagination_data', template_pagination_row($args));
		$report_smarty->assign('show_pagination', $args['show_pagination']);
	} // if
	$report_smarty->assign('isSummaryCombo', $isSummaryCombo);
	$report_smarty->assign('header_row', $header_row);
	$report_smarty->assign('args', $args);
	//echo $report_smarty->fetch("modules/Reports/templates/_template_header_row.tpl");
	$oddRow = true;
} // fn


function template_header_row1(&$header_row, &$args, $isSummaryCombo=false)
{
global $oddRow;
$count = 0;
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="list view">
<?php if ( !empty($args['show_pagination'])) { echo template_pagination_row($args);} ?>
<tr height="20">
<?php

if ($isSummaryCombo) {
	
?>
	<td scope="col" align='center'  valign=middle nowrap>&nbsp;</td>	
<?php }

foreach ($header_row as $header_cell) 
{ 
 if ( ! empty($args['group_column_is_invisible']) &&
            $args['group_pos'] == $count)
      {
        $count++;
        continue;
      }

?>
  <td scope="col" align='center'  valign=middle nowrap><?php echo $header_cell ?></td>
<?php
} 
?>
</tr>

<?php
$oddRow = true;

}



$oddRow = true;
$rownum = 0;


function template_list_row(&$column_row,$equal_width=false, $isSummaryComboHeader=false, $divId="") {
	global $mod_strings, $report_smarty;
	// disable export if configured to
	global $current_user, $sugar_config, $app_strings;
	$report_smarty->assign('mod_strings', $mod_strings);
	$report_smarty->assign('app_strings', $app_strings);
	global $oddRow,$rownum;	
	

	$reporter = $report_smarty->get_template_vars('reporter');
	$list_type = $report_smarty->get_template_vars('list_type');
	$display_columns = array();
	if($list_type == 'summary') {
		$display_columns = $reporter->report_def['summary_columns'];
	} else if($list_type == 'list' ||$list_type == 'summary_combo') {
		$display_columns = $reporter->report_def['display_columns'];
	}
	$field_types = array();
	foreach($display_columns as $display_column) {
		$field_def = $reporter->getFieldDefFromLayoutDef($display_column);
		array_push($field_types, $field_def['type']);
	}

	foreach($field_types as $key=>$field_type) {
	if($oddRow) {
			$row_class[$key] = 'oddListRowS1';
			if(strtolower($field_type) == 'currency' ||
			   strtolower($field_type) == 'double' ||
			   strtolower($field_type) == 'decimal' ||
			   strtolower($field_type) == 'float' ||
			   strtolower($field_type) == 'int')
			   $row_class[$key] = 'oddListRowS1 number_align';
	} else {
			$row_class[$key] = 'evenListRowS1';
			if(strtolower($field_type) == 'currency' ||
			   strtolower($field_type) == 'double' ||
			   strtolower($field_type) == 'decimal' ||
			   strtolower($field_type) == 'float' ||
			   strtolower($field_type) == 'int')
			   $row_class[$key] = 'evenListRowS1 number_align';
	} // else
	}
	
	$oddRow = !$oddRow;
	if ( $equal_width) {
		$width = round(100/count($column_row['cells'])); 
	} else {
		$width = '';
	} // else
 	$report_smarty->assign('row_class', $row_class);
 	$report_smarty->assign('rownum', $rownum);
 	$report_smarty->assign('width', $width);
 	$report_smarty->assign('divId', $divId);
    $count = 0;
 	$report_smarty->assign('isSummaryComboHeader', $isSummaryComboHeader);
 	$report_smarty->assign('column_row', $column_row);
     		
	//echo $report_smarty->fetch("modules/Reports/templates/_template_list_row.tpl");
	$rownum++;
} // fn


function template_list_row1(&$column_row,$equal_width=false, $isSummaryComboHeader=false, $divId="")
{
	global $oddRow,$rownum;
	
	if($oddRow)
	{
		$row_class = 'oddListRowS1';
	} else
	{
		$row_class = 'evenListRowS1';
	}

	$oddRow = !$oddRow;

	if ( $equal_width)
	{
		$width = round(100/count($column_row['cells'])); 
	}
	else
	{
		$width = '';
	}

   ?>

<tr height="20" class="<?php echo $row_class; ?>">
	<?php 
    $count = 0;
		if ($isSummaryComboHeader) {
			echo '<td><span id="img_'.$divId.'"><a href="javascript:expandCollapseComboSummaryDiv(\''.$divId.'\')">'.SugarThemeRegistry::current()->getImage("advanced_search", 'border="0" absmiddle=""', 8, 8, ".gif", $mod_strings['LBL_SHOW']).'"</a></span></td>';
		}      
    
    foreach ($column_row['cells'] as $cell) { 
      if ( ! empty($column_row['group_column_is_invisible']) && in_array($count, $column_row['group_pos']))
      { 
        $count++;
        continue; 
      }
      ?>
		<td width="<?php echo $width; ?>%" valign="top" scope="row">
		<?php 

		echo $cell; ?></td>
	<?php
	$count++;
    } ?>
</tr>

<?php
$rownum++;
}

function template_query_table(&$reporter)
{
	global $mod_strings;
	?>
	</p>
	<table width="100%" id="query_table" class="contentBox">
<?php
	if (isset($_REQUEST['show_query']))
	{
		$count = 1;
		foreach ($reporter->query_list as $query) 
		{ 
?>
			<tr>
			<td align=left><b><?php echo $mod_strings['LBL_QUERY'] . " " .$count++; ?>:</b></td>
			</tr>
			<tr>
			<td align=left><pre><?php echo $query; ?></pre></td>
			</tr>
<?php
		} 
?>
<?php 
	} 
?>
	</table>
<?php
}
?>

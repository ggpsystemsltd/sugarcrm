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

global $theme;


$GLOBALS['displayListView'] = true; 

require_once('modules/Reports/templates/templates_reports.php');
require_once('modules/Reports/templates/templates_reports_index.php');
require_once('modules/Reports/templates/templates_pdf.php');
require_once('modules/Reports/templates/templates_export.php');
require_once('modules/Reports/templates/templates_chart.php');

require_once('modules/Reports/config.php');
global $current_language, $report_modules, $modules_report;



//$mod_strings = return_module_language($current_language,"Reports");


require_once('modules/Reports/Report.php');

$args = array();

// set default
//if ( empty($_REQUEST['report_module'])) {
//	$_REQUEST['report_module'] = $default_report_type;
//}
if ($_REQUEST['action'] == 'index') {
if ( isset($_REQUEST['id'])) {
	$saved_report_seed = new SavedReport();
	$saved_report_seed->disable_row_level_security = true;
	
	$saved_report_seed->retrieve($_REQUEST['id'], false);

	$args['reporter'] = new Report($saved_report_seed->content);
	$args['reporter']->saved_report = &$saved_report_seed;

	if ( isset($_REQUEST['filter_key']) && isset($_REQUEST['filter_value'])) {
		$new_filter = array();
		list($new_filter['table_name'],$new_filter['name']) = explode(':',$_REQUEST['filter_key']);
		$new_filter['qualifier_name'] = 'is';
		$new_filter['input_name0'] = array($_REQUEST['filter_value']);
		
		if ( ! is_array($args['reporter']->report_def['filters_def'])) {
			$args['reporter']->report_def['filters_def'] = array();
		}
		array_push($args['reporter']->report_def['filters_def'],$new_filter);
		$args['reporter']->report_def['chart_type'] = 'none';
		$args['reporter']->chart_type = 'none';
	}
	
	$args['reporter']->is_saved_report = true;
	$args['reporter']->saved_report_id = $saved_report_seed->id;

} else {
	$report_def = array();
	if ( ! empty($_REQUEST['report_def'])) {
		$report_def = html_entity_decode($_REQUEST['report_def']);
		$panels_def = html_entity_decode($_REQUEST['panels_def']);
		$filters_def = html_entity_decode($_REQUEST['filters_defs']);
       	$args['reporter'] =  new Report($report_def, $filters_def, $panels_def);

    	if (! empty($_REQUEST['save_report_as'])) {
         	$args['reporter']->name = $_REQUEST['save_report_as'];
    	}
	} else {
		$reporter = new Report();
        $args['reporter'] = $reporter;
	}
}

if(! empty($_REQUEST['to_pdf']) && empty($_REQUEST['search_form_only'])){
	template_handle_pdf($args['reporter']);
	return;
}
if(! empty($_REQUEST['to_csv'])){
	if($sugar_config['disable_export'] || (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($args['reporter']->module) && ACLAction::getUserAccessLevel($current_user->id,$args['reporter']->module, 'access') == ACL_ALLOW_ENABLED && ACLAction::getUserAccessLevel($current_user->id, $args['reporter']->module, 'admin') == ACL_ALLOW_ADMIN)))){
		die("Exports Disabled");
	}
	template_handle_export($args['reporter']);
	return;
}


// create report obj with the seed
$args['list_nav'] = '';
$args['upper_left'] = '';


// do saves, deletes, and publish
control($args);


// show report interface
if (isset($_REQUEST['page'] ) && $_REQUEST['page'] == 'report')
{
	checkSavedReportACL($args['reporter'],$args);
	if (isset($_REQUEST['run_query']) && ($_REQUEST['run_query'] == 1)) {
		template_reports_report($args['reporter'],$args);
		if (!empty($_REQUEST['expanded_combo_summary_divs'])) {
			$expandDivs = explode(" ",$_REQUEST['expanded_combo_summary_divs']);
			foreach($expandDivs as $divId) {
				str_replace(" ", "",$divId);
				if ($divId != "")
					echo "<script>expandCollapseComboSummaryDiv('".$divId."')</script>";
			}
		}
	}
	else
		include("modules/Reports/ReportsWizard.php");

}
// show report lists
else
{
if ( empty($_REQUEST['search_form_only']) ) {
    $params = array();
    if(!empty($_REQUEST['favorite'])) {
        $params[] = $mod_strings['LBL_FAVORITES_TITLE'];
    } else {
        $params[] = $app_strings['LBL_SEARCH'];
    }

    //Override the create url
    $createURL = 'index.php?module=Reports&report_module=&action=index&page=report&Create+Custom+Report=Create+Custom+Report';
    echo getClassicModuleTitle("Reports", $params, true, '', $createURL);
}

include("modules/Reports/ListView.php");
}

}
function checkACLForEachColInArr ($arr, $full_table_list, $is_owner = 1){
	foreach ($arr as $column) {
		$col_module = $full_table_list[$column['table_key']]['module'];
		//todo: check the last param of this call (is_owner)
		if (ACLField::hasAccess($column['name'], $col_module, $GLOBALS['current_user']->id, $is_owner) == 0) {
			return false;
		}
	}
	return true;	
}

function checkACLForEachColInArrForFilterDef($arr, $full_table_list, $is_owner = 1){
	$hasAccess = checkACLForEachColForFilter($arr, $full_table_list, $is_owner, true);
	return $hasAccess;
	/*
	foreach ($arr as $column) {
		$col_module = $full_table_list[$column['table_key']]['module'];
		//todo: check the last param of this call (is_owner)
		if (ACLField::hasAccess($column['name'], $col_module, $GLOBALS['current_user']->id, $is_owner) == 0) {
			return false;
		}
	}
	return true;	
	*/
}

function checkACLForEachColForFilter($filters, $full_table_list, $is_owner, $hasAccess) {
	if (!$hasAccess) {
		return $hasAccess;
	} // if
	$i = 0;
	while (isset($filters[$i])) {
		$current_filter = $filters[$i];
		if (isset($current_filter['operator'])) {
			$hasAccess = checkACLForEachColForFilter($current_filter, $full_table_list, $is_owner, $hasAccess);
			if ($hasAccess) {
				return $hasAccess;
			} // if
		}
		else {
			$col_module = $full_table_list[$current_filter['table_key']]['module'];
			if (ACLField::hasAccess($current_filter['name'], $col_module, $GLOBALS['current_user']->id, $is_owner) == 0) {
			//if(isset($current_filter['runtime']) && $current_filter['runtime'] == 1) {
				$hasAccess = false;
				return $hasAccess;
			} // if
		}
		$i++;
	} // while
	return $hasAccess;
} // fn

function checkSavedReportACL(&$reporter,&$args) {
	global $mod_strings;

	// Only run these checks for saved reports.
	if (!empty($_REQUEST['id'])) {
		$display_columns =  $reporter->report_def['display_columns'];
		$filters_def = $reporter->report_def['filters_def']['Filter_1'];
		$group_defs = $reporter->report_def['group_defs'];
		if (!empty($reporter->report_def['order_by']))
			$order_by = $reporter->report_def['order_by'];
		else 
			$order_by = array();

		$summary_columns = $reporter->report_def['summary_columns'];
		$full_table_list = $reporter->report_def['full_table_list'];

		if (!checkACLForEachColInArr($display_columns, $full_table_list) || 
			!checkACLForEachColInArrForFilterDef($filters_def, $full_table_list) || 
			!checkACLForEachColInArr($group_defs, $full_table_list) || 
			!checkACLForEachColInArr($order_by, $full_table_list) || 
			!checkACLForEachColInArr($summary_columns, $full_table_list)) {
			sugar_die($mod_strings['LBL_NO_ACCESS']);
		}
		
		//Check for List view permissions
		$hashModules = array();
		foreach ($display_columns as $column) {
			$col_module = $full_table_list[$column['table_key']]['module'];
			if(!isset($hashModules[$col_module])) {
               $b = loadBean($col_module);
               $hashModules[$col_module] = !empty($b) ? $b->acltype : 'module';
			}
			$type = $hashModules[$col_module];
			//todo: check the last param of this call (is_owner)
			if((!ACLController::checkAccess($col_module, 'list', true, $type) || !ACLController::checkAccess($col_module, 'view', true, $type)) && $col_module != 'Currencies' && $col_module != 'EmailAddresses' && $col_module != 'Users' && $col_module != 'Releases' && $col_module != 'Teams' && $col_module != 'CampaignLog'){
				sugar_die($mod_strings['LBL_NO_ACCESS']);
			}			
		}

		// Check Report module Permissions
		$is_owner =  true;
		global $current_user;
		if (isset($args['reporter']->saved_report) && $args['reporter']->saved_report->assigned_user_id != $current_user->id) 
			$is_owner = false;
		if(!ACLController::checkAccess('Reports', 'list', $is_owner) || !ACLController::checkAccess('Reports', 'view', $is_owner))  {
			sugar_die($mod_strings['LBL_NO_ACCESS']);
		}
	}
	return true;
}

function check_report_perms($report_id)
{
	global $current_user;
	$saved = new SavedReport();
	$saved->retrieve($report_id);
	if (! is_admin($current_user) && $saved->assigned_user_id != $current_user->id)
	{
		return false;
	}
	return true;

}

/////////////////////
/////////////////////
function control(&$args)
{
 global $current_user;
 global $mod_strings;
  $error_msg = '';

// SAVE MAPPING IF REQUESTED
  if ( isset($_REQUEST['save_report'])
	&& $_REQUEST['save_report'] == 'on')
  {
			if ( ! empty($_REQUEST['record']))
			{
				if ( ! check_report_perms($_REQUEST['record']))
				{
					print $mod_strings['MSG_NO_PERMISSIONS'];
					return;
				}
			}

        $args['save_result'] = $args['reporter']->save($_REQUEST['save_report_as']);
      header("location: index.php?module=Reports&action=index&page=report&id=".$args['reporter']->saved_report->id);
      exit;

  }


  if (isset($_REQUEST['delete_report_id']))
  {
				if ( ! check_report_perms($_REQUEST['delete_report_id']))
				{
					print $mod_strings['MSG_NO_PERMISSIONS'];
					return;
				}

        $saved_report = new SavedReport();
        $saved_report->mark_deleted($_REQUEST['delete_report_id']);
  }

  if (isset($_REQUEST['publish']) )
  {
				if ( ! check_report_perms($_REQUEST['publish_report_id']))
				{
					print $mod_strings['MSG_NO_PERMISSIONS'];
					return;
				}

        $saved_report = new SavedReport();
        $result = 0;

        $saved_report = $saved_report->retrieve($_REQUEST['publish_report_id'], false);

        if ($_REQUEST['publish'] == 'yes')
        {
                $result = $saved_report->mark_published("yes");
                if ($result == -1)
                {
                        $error_msg = $mod_strings['MSG_UNABLE_PUBLISH_ANOTHER'];
                }
        }
        else if ( $_REQUEST['publish'] == 'no')
        {
                // if you don't own this importmap, you do now!
                // unless you have a map by the same name
                $result = $saved_report->mark_published("no");
                if ($result == -1)
                {
                        $error_msg = $mod_strings['MSG_UNABLE_PUBLISH_YOU_OWN'];

                }
        }
        if(isset($error_msg)) echo $error_msg;
   }
}

?>

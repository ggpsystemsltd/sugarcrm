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

$moduleFilters = array(
	'Accounts' => array(
		'display_default' => false,
		'fields' => array(
			'account_type' => array(
				'display_name' => 'Account Type',
				'name' => 'account_type',
				'vname' => 'LBL_TYPE',
				'dbname' => 'account_type',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '4',
				'dropdown' => $app_list_strings['account_type_dom'],
			),
		),
	),
	'Bugs' => array(
		'display_default' => false,
		'fields' => array(
			'status' => array(
				'display_name' => 'Status',
				'name' => 'status',
				'vname' => 'LBL_STATUS',
				'dbname' => 'status',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '5',
				'dropdown' => $app_list_strings['bug_status_dom'],
			),
		),
	),
	'Calls' => array(
		'display_default' => false,
		'fields' => array(
			'status' => array(
				'display_name' => 'Status',
				'name' => 'status',
				'vname' => 'LBL_STATUS',
				'dbname' => 'status',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '3',
				'dropdown' => $app_list_strings['call_status_dom'],
			),
		),
	),
	
	'Cases' => array(
		'display_default' => false,
		'fields' => array(
			'priority' => array(
				'display_name' => 'Priority',
				'name' => 'priority',
				'vname' => 'LBL_PRIORITY',
				'dbname' => 'priority',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '3',
				'dropdown' => $app_list_strings['case_priority_dom'],
			),
			'status' => array(
				'display_name' => 'Status',
				'name' => 'status',
				'vname' => 'LBL_STATUS',
				'dbname' => 'status',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '3',
				'dropdown' => $app_list_strings['case_status_dom'],
			),
		),
	),
	
	'Opportunities' => array(
		'display_default' => false,
		'fields' => array(
			'sales_stage' => array(
				'display_name' => 'Sales Stage',
				'name' => 'sales_stage',
				'vname' => 'LBL_SALES_STAGE',
				'dbname' => 'sales_stage',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '4',
				'dropdown' => $app_list_strings['sales_stage_dom'],
			),
			'opportunity_type' => array(
				'display_name' => 'Opportunity Type',
				'name' => 'opportunity_type',
				'vname' => 'LBL_TYPE',
				'dbname' => 'opportunity_type',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '4',
				'dropdown' => $app_list_strings['opportunity_type_dom'],
			),
		),
	),
	'Tasks' => array(
		'display_default' => false,
		'fields' => array(
			'status' => array(
				'display_name' => 'Status',
				'name' => 'status',
				'vname' => 'LBL_STATUS',
				'dbname' => 'status',
				'custom_table' => false,
				'type' => 'multiselect',
				'size' => '5',
				'dropdown' => $app_list_strings['task_status_dom'],
			),
		),
	),
);

?>

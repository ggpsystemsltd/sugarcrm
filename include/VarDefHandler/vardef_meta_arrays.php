<?php
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



if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

//holds various filter arrays for displaying vardef dropdowns
//You can add your own if you would like

$vardef_meta_array = array (

	'standard_display' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id'),
			'name' => array('parent_type', 'deleted'),
			'reportable' => array('false'),
		//end exclusion
		),
		'inc_override' => array(
			'type' => array('team_list'),
		//end inc_override
		),
		'ex_override' => array(
		//end ex_override
		)
	//end standard_display
	),
//////////////////////////////////////////////////////////////////
	'normal_trigger' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id', 'link', 'datetime', 'date','datetimecombo'),
			'custom_type' => array('id', 'link', 'datetime', 'date','datetimecombo'),
			'name' => array('assigned_user_name', 'parent_type', 'deleted','filename', 'file_mime_type', 'file_url'),
			'reportable' => array('false'),
			'source' => array('non-db'),
		//end exclusion
		),

		'inc_override' => array(
			'type' => array('team_list', 'assigned_user_name'),
			'name' => array('email1', 'email2', 'assigned_user_id'),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('team_name'),
		//end ex_override
		)

	//end normal_trigger
	),
	//////////////////////////////////////////////////////////////////
	'normal_date_trigger' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id', 'link'),
			'custom_type' => array('id', 'link'),
			'name' => array('assigned_user_name', 'parent_type', 'deleted','filename', 'file_mime_type', 'file_url'),
			'reportable' => array('false'),
			'source' => array('non-db'),
		//end exclusion
		),

		'inc_override' => array(
			'type' => array('team_list', 'assigned_user_name'),
			'name' => array('email1', 'email2', 'assigned_user_id'),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('team_name', 'account_name'),
		//end ex_override
		)

	//end normal_trigger
	),
//////////////////////////////////////////////////////////////////
	'time_trigger' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id', 'link', 'team_list', 'time'),
			'custom_type' => array('id', 'link', 'team_list', 'time'),
			'name' => array('parent_type', 'team_name', 'assigned_user_name', 'parent_type', 'deleted' ,'filename', 'file_mime_type', 'file_url'),
			'source' => array('non-db'),
		//end exclusion
		),

		'inc_override' => array(
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('date_entered'),
		//end ex_override
		)

	//end time_trigger
	),
//////////////////////////////////////////////////////////////////
	'action_filter' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id', 'link', 'datetime', 'time'),
			'custom_type' => array('id', 'link', 'datetime', 'time'),
			'reportable' => array('false'),
			'source' => array('non-db'),
			'name' => array('created_by', 'parent_type', 'deleted', 'assigned_user_name', 'deleted' ,'filename', 'file_mime_type', 'file_url', 'resource_id'),
            'calculated' => array(true),
		//end exclusion
		),

		'inc_override' => array(
			'type' => array('team_list'),
			'name' => array('assigned_user_id', 'time_start', 'date_start', 'email1', 'email2', 'date_due', 'is_optout'),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('team_name', 'account_name'),
		//end ex_override
		)

	//end action_filter
	),
//////////////////////////////////////////////////////////////////
	'rel_filter' => array(
		'inclusion' =>	array(
			'type' => array('link'),
		//end inclusion
		),
		'exclusion' =>	array(
		'name' => array('direct_reports', 'accept_status'),
		//end exclusion
		),

		'inc_override' => array(
			'name' => array('accounts', 'account', 'member_of'),
		//end inc_override
		),
		'ex_override' => array(
			//'link_type' => array('one'),
			'name' => array('users'),
		    'module' => array('Users'),
		//end ex_override
		)

	//end rel_filter
	),
///////////////////////////////////////////////////////////
	'trigger_rel_filter' => array(
		'inclusion' =>	array(
			'type' => array('link'),
		//end inclusion
		),
		'exclusion' =>	array(
		'name' => array('direct_reports', 'accept_status'),
		//end exclusion
		),

		'inc_override' => array(
			'name' => array(),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('users', 'emails', 'product_bundles', 'email_addresses', 'email_addresses_primary', 'emailmarketing', 'tracked_urls', 'queueitems', 'log_entries', 'contract_types'),
			'module' => array('Users', 'Teams',
			    'CampaignLog'
			    ),
		//end ex_override
		)

	//end trigger_rel_filter
	),
///////////////////////////////////////////////////////////
	'alert_rel_filter' => array(
		'inclusion' =>	array(
			'type' => array('link'),
		//end inclusion
		),
		'exclusion' =>	array(
		'name' => array('direct_reports', 'accept_status'),
		//end exclusion
		),

		'inc_override' => array(
			'name' => array(),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('users', 'emails', 'product_bundles', 'email_addresses', 'email_addresses_primary', 'emailmarketing', 'tracked_urls', 'queueitems', 'log_entries', 'contract_types', 'reports_to_link'),
			'module' => array('Users', 'Teams',
			    'CampaignLog',
			    'Releases'),
		//end ex_override
		)

	//end alert_rel_filter
	),
///////////////////////////////////////////////////////////
	'template_filter' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id', 'link'),
			'custom_type' => array('id', 'link'),
			'reportable' => array('false'),
			'source' => array('non-db'),
			'name' => array('created_by', 'parent_type', 'deleted', 'assigned_user_name', 'filename', 'file_mime_type', 'file_url'),
		//end exclusion
		),

		'inc_override' => array(
			'name' => array('assigned_user_id', 'assigned_user_name', 'modified_user_id', 'modified_by_name', 'created_by', 'created_by_name', 'full_name', 'email1', 'email2', 'team_name', 'shipper_name'),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('team_id'),
		//end ex_override
		)

	//end template_filter
	),
//////////////////////////////////////////////////////////////
	'alert_trigger' => array(
		'inclusion' =>	array(
		//end inclusion
		),
		'exclusion' =>	array(
			'type' => array('id', 'link', 'datetime', 'date'),
			'custom_type' => array('id', 'link', 'datetime', 'date'),
			'name' => array('assigned_user_name', 'parent_type', 'deleted', 'filename', 'file_mime_type', 'file_url'),
			'reportable' => array('false'),
			'source' => array('non-db'),
		//end exclusion
		),

		'inc_override' => array(
			'type' => array('team_list', 'assigned_user_name'),
			'name' => array('full_name'),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('team_name', 'account_name'),
		//end ex_override
		)

	//end alert_trigger
	),
//////////////////////////////////////////////////////////////////
	'template_rel_filter' => array(
		'inclusion' =>	array(
			'type' => array('link'),
		//end inclusion
		),
		'exclusion' =>	array(
		'name' => array('direct_reports', 'accept_status'),
		//end exclusion
		),

		'inc_override' => array(
			'name' => array(),
		//end inc_override
		),
		'ex_override' => array(
			'name' => array('users', 'email_addresses', 'email_addresses_primary', 'emailmarketing', 'tracked_urls', 'queueitems', 'log_entries', 'reports_to_link'),
			'module' => array('Users', 'Teams',
			    'CampaignLog'
			    ),
		//end ex_override
		)

	//end template_rel_filter
	),
);

?>

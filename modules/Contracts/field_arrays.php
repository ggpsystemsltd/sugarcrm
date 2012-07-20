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


$fields_array['Contract'] = array (
	'column_fields' => array(
		'id',
		'name',
		'status',
		'reference_code',
		'start_date',
		'account_id',
		'end_date',
		'opportunity_id',
		'quote_id',
		'currency_id',
		'total_contract_value',
		'total_contract_value_usdollar',
		'team_id',
		'customer_signed_date',
		'assigned_user_id',
		'company_signed_date',
		'expiration_notice_date',
		'expiration_notice_time',
		'description',
		'date_entered',
		'date_modified',
		'deleted',
		'modified_user_id',
		'created_by',
		'type',
	),
	'list_fields' => array(
		'id',
		'name',
		'account_id',
		'account_name',
		'status',
		'start_date',
		'end_date',
		'team_id',
		'team_name',
		'assigned_user_id',
		'assigned_user_name',
		'description',
	),
	'required_fields' => array(
		'name' => 1,
		'account_name' => 2,
		'status' => 3,
	),
);
?>

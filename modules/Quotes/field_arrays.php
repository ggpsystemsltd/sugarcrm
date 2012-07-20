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

 * Description:  Contains field arrays that are used for caching
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
$fields_array['Quote'] = array ('column_fields' => Array("id"
		, "name"
		, "quote_type"
		, "subtotal"
		, "deal_tot"
		, "deal_tot_usdollar"
		, "new_sub"
		, "new_sub_usdollar"
		, "subtotal_usdollar"
		, "shipping"
		, "shipping_usdollar"
		, "tax"
		, "tax_usdollar"
		, "total"
		, "total_usdollar"
		,'show_line_nums'
		, 'calc_grand_total'
		, "date_entered"
		, "date_modified"
		, "modified_user_id"
		, "assigned_user_id"
		, "created_by"
		, "team_id"
		, "shipper_id"
		, "currency_id"
		, "taxrate_id"
		, "date_quote_expected_closed"
		, "date_quote_closed"
		, "quote_stage"
		, "description"
		, "purchase_order_num"
		, "quote_num"
		, "billing_address_street"
		, "billing_address_city"
		, "billing_address_state"
		, "billing_address_postalcode"
		, "billing_address_country"
		, "shipping_address_street"
		, "shipping_address_city"
		, "shipping_address_state"
		, "shipping_address_postalcode"
		, "shipping_address_country"
		, "payment_terms"
		, "original_po_date"
		),
        'list_fields' =>  Array('id', 'quote_type', 'name', 'billing_account_name', 'billing_account_id'
	,'date_quote_expected_closed', 'total', 'assigned_user_name', 'assigned_user_id'
	,'quote_stage', 'shipping_account_name', 'shipping_account_id'
	, "team_id", "team_name", 'total_usdollar','new_sub'
	, "quote_num"
	),
    'required_fields' =>   Array('name'=>1, 'date_quote_expected_closed'=>1,  'quote_stage'=>1, 'billing_account_name'=>1),
);
?>
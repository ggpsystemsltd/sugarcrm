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
$fields_array['Product'] = array ('column_fields' => Array("id"
		,"product_template_id"
		,"name"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		, "created_by"
		,"date_purchased"
		,"manufacturer_id"
		,"type_id"
		,"quote_id"
		,"tax_class"
		,"vendor_part_num"
		,"category_id"
		,'cost_usdollar'
		,'list_usdollar'
		,'discount_usdollar'
		,'deal_calc_usdollar'
		,'currency_id'
		,"status"
		,"cost_price"
		,"discount_price"
		,"discount_amount"
		,"deal_calc"
		,"discount_select"
		,"list_price"
		,"mft_part_num"
		,"weight"
		,"quantity"
		,"website"
		,"support_name"
		,"support_description"
		,"support_contact"
		,"support_term"
		,"date_support_expires"
		,"date_support_starts"
		,"pricing_formula"
		,"pricing_factor"
		,"description"
		,"account_id"
		,"contact_id"
		,"team_id"
		,"serial_number"
		,"asset_number"
		,"book_value"
		,"book_value_date"
		),
        'list_fields' =>  array('id', 'name', 'status', 'quantity', 'date_purchased', 'cost_price',
			'cost_usdollar', 'discount_amount', 'discount_select', 'discount_price','discount_usdollar', 'list_price','list_usdollar','deal_calc','deal_calc_usdollar',
			'mft_part_num', 'manufacturer_name', 'account_name', 'account_id', 'contact_id',
			'contact_name', 'date_support_expires'),
    'required_fields' =>  array("name"=>1,  ),
);
?>
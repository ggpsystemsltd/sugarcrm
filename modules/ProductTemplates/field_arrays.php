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
$fields_array['ProductTemplate'] = array ('column_fields' => Array("id"
		,"name"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		, "created_by"
		,"date_available"
		,"manufacturer_id"
		,"type_id"
		,"tax_class"
		,"vendor_part_num"
		,"category_id"
		,'cost_usdollar'
		,'list_usdollar'
		,'discount_usdollar'
		,'currency_id'
		,"status"
		,"cost_price"
		,"discount_price"
		,"list_price"
		,"mft_part_num"
		,"weight"
		,"qty_in_stock"
		,"website"
		,"support_name"
		,"support_description"
		,"support_contact"
		,"support_term"
		,"pricing_formula"
		,"pricing_factor"
		,"description"
		),
        'list_fields' =>  array('id', 'name', 'status', 'qty_in_stock', 'cost_price','cost_usdollar', 'discount_price','discount_usdollar', 'list_price','list_usdollar', 'mft_part_num', 'pricing_factor', 'pricing_formula', 'type_id', 'tax_class', 'manufacturer_id', 'currency_id', 'website', 'vendor_part_num', 'description', 'support_contact', 'support_term', 'support_name', 'support_description', 'weight', 'category_id'),
        'required_fields' => array("name"=>1,"cost_price"=>1,"discount_price"=>1,"list_price"=>1),
);
?>
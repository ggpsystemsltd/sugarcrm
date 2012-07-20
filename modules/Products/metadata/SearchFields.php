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

$searchFields['Products'] = 
	array (
		'name' => array( 'query_type'=>'default'),
		'contact_name' => array( 'query_type'=>'default','db_field'=>array('contacts.first_name','contacts.last_name'),'force_unifiedsearch'=>true),
        'status'=> array('query_type'=>'default', 'options' => 'product_status_dom', 'template_var' => 'STATUS_OPTIONS', 'options_add_blank' => true),
        'type_id'=> array('query_type'=>'default', 'options' => 'product_type_dom', 'template_var' => 'TYPE_OPTIONS'),
        'category_id'=> array('query_type'=>'default', 'options' => 'products_cat_dom', 'template_var' => 'CATEGORY_OPTIONS'),
        'manufacturer_id'=> array('query_type'=>'default', 'options' => 'manufacturer_dom', 'template_var' => 'MANUFACTURER_OPTIONS'),
        'mft_part_num' => array( 'query_type'=>'default'),
        'vendor_part_num' => array( 'query_type'=>'default'),
        'tax_class'=> array('query_type'=>'default', 'options' => 'tax_class_dom', 'template_var' => 'TAX_CLASS_OPTIONS', 'options_add_blank' => true),
        'date_available' => array( 'query_type'=>'default'),
        'support_term' => array('query_type'=>'default'),
		'favorites_only' => array(
            'query_type'=>'format',
			'operator' => 'subquery',
			'subquery' => 'SELECT sugarfavorites.record_id FROM sugarfavorites 
			                    WHERE sugarfavorites.deleted=0 
			                        and sugarfavorites.module = \'Products\'
			                        and sugarfavorites.assigned_user_id = \'{0}\'',
			'db_field'=>array('id')),
	   //Range Search Support 
	   'range_date_entered' => array ('query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true),
	   'start_range_date_entered' => array ('query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true),
	   'end_range_date_entered' => array ('query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true),
	   'range_date_modified' => array ('query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true),
	   'start_range_date_modified' => array ('query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true),
       'end_range_date_modified' => array ('query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true),	
	   //Range Search Support		
	);
?>

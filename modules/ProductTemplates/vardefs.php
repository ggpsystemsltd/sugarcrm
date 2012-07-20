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

$dictionary['ProductTemplate'] = array('table' => 'product_templates',
		'comment' => 'The Admin view of a Product in Product Catalog; used as template for a product instance'
								,'fields' => array (
	'id' =>
	array (
		'name' => 'id',
		'vname' => 'LBL_PRODUCT_ID',
		'type' => 'id',
		'required' => true,
		'reportable'=>false,
		'importable' => 'true',
		'comment' => 'Unique identifier'
	),
	'deleted' =>
	array (
		'name' => 'deleted',
		'vname' => 'LBL_DELETED',
		'type' => 'bool',
		'required' => false,
		'default' => '0',
		'reportable'=>false,
		'importable' => 'false',
		'comment' => 'Record deletion indicator'
	),
	'date_entered' =>
	array (
		'name' => 'date_entered',
		'vname' => 'LBL_DATE_ENTERED',
		'type' => 'datetime',
		'comment' => 'Date record created'
	),
	'date_modified' =>
	array (
		'name' => 'date_modified',
		'vname' => 'LBL_DATE_MODIFIED',
		'type' => 'datetime',
		'comment' => 'Date record last modified'
	),
	'modified_user_id' =>
	array (
		'name' => 'modified_user_id',
		'rname' => 'user_name',
		'id_name' => 'modified_user_id',
		'vname' => 'LBL_MODIFIED_ID',
		'type' => 'assigned_user_name',
		'table' => 'users',
		'isnull' => 'false',
		'dbType' => 'id',
		'reportable'=>true,
		'importable' => 'true',
		'comment' => 'User who last modified record'
	),
	'created_by' =>
	array (
		'name' => 'created_by',
		'rname' => 'user_name',
		'id_name' => 'modified_user_id',
		'vname' => 'LBL_CREATED_ID',
		'type' => 'assigned_user_name',
		'table' => 'users',
		'isnull' => 'false',
		'dbType' => 'id',
		'comment' => 'User who created record'
	),
	'type_id' =>
	array (
		'name' => 'type_id',
		'type' => 'id',
		'required'=>false,
		'function' => array('name'=>'getProductTypes', 'returns'=>'html'),
		'reportable'=>false,
		'vname' => 'LBL_TYPE_ID',
		'importable' => 'true',
		'comment' => 'Product type (ex: hardware, software)'
	),

	'manufacturer_id' =>
	array (
		'name' => 'manufacturer_id',
		'type' => 'id',
		'function' => array('name'=>'getManufacturers', 'returns'=>'html'),
		'required'=>false,
		'reportable'=>false,
		'vname' =>'LBL_LIST_MANUFACTURER_ID',
		'importable' => 'true',
		'comment' => 'Manufacturer of the product'
	),
	'manufacturer_name' =>
	array (
		'name' => 'manufacturer_name',
	    'rname'=> 'name',
	    'id_name'=> 'manufacturer_id',
		'type' => 'relate',
		'vname' =>'LBL_MANUFACTURER_NAME',
	    'join_name' => 'manufacturers',
	    'link' => 'manufacturer_link',
	    'table' => 'manufacturers',
	    'isnull' => 'true',
		'source'=>'non-db',
		'module' => 'Manufacturers',
	    'dbType' => 'varchar',
	    'len' => '255',
		'studio' => 'false'
	    
	),
	'category_id' =>
	array (
		'name' => 'category_id',
		'type' => 'id',
		'required' => false,
		'reportable' => false,
		'vname' => 'LBL_LIST_CATEGORY_ID',
		'importable' => 'true',
		'comment' => 'Category of the product'
	),
  'category_name' =>
  array (
	'name' => 'category_name',
	'rname' => 'name',
	'id_name' => 'category_id',
	'vname' => 'LBL_CATEGORY_NAME',
	'join_name'=>'product_categories',
	'type' => 'relate',
	'link' => 'category_link',
	'table' => 'product_categories',
	'isnull' => 'true',
	'module' => 'ProductCategories',
	'dbType' => 'varchar',
	'len' => '255',
	'source' => 'non-db',
  ),
  'type_name' =>
  array (
	'name' => 'type_name',
	'rname' => 'name',
	'id_name' => 'type_id',
	'vname' => 'LBL_TYPE',
	'join_name'=>'product_types',
	'type' => 'relate',
	'link' => 'type_link',
	'table' => 'product_types',
	'isnull' => 'true',
	'module' => 'ProductTypes',
	'dbType' => 'varchar',
	'len' => '255',
	'source' => 'non-db',
	'importable' => 'true',
    'studio' => false,
  ),
	'name' =>
	array (
		'name' => 'name',
		'vname' => 'LBL_NAME',
		'dbType' => 'varchar',
		'type' => 'varchar',
		'len' => '50',
		'comment' => 'Name of the product',
		'importable' => 'required',
        'required' => true,
	),
	'mft_part_num' =>
	array (
		'name' => 'mft_part_num',
		'vname' => 'LBL_MFT_PART_NUM',
		'type' => 'varchar',
		'len' => '50',
		'comment' => 'Manufacturer part number'
	),
	'vendor_part_num' =>
	array (
		'name' => 'vendor_part_num',
		'vname' => 'LBL_VENDOR_PART_NUM',
		'type' => 'varchar',
		'len' => '50',
		'comment' => 'Vendor part number'
	),
	'date_cost_price' =>
	array (
		'name' => 'date_cost_price',
		'vname' => 'LBL_DATE_COST_PRICE',
		'type' => 'date',
	    'massupdate' => false,
		'comment' => 'Starting date cost price is valid'
	),
	'cost_price' =>
	array (
		'name' => 'cost_price',
		'vname' => 'LBL_COST_PRICE',
		'type' => 'currency',
		'required' => true,
		'len' => '26,6',
		'comment' => 'Product cost ("Cost" in Quote)',
		'importable' => 'required',
        'required' => true,
	),
	'discount_price' =>
	array (
		'name' => 'discount_price',
		'vname' => 'LBL_DISCOUNT_PRICE',
		'required' => true,
		'type' => 'currency',
		'len' => '26,6',
		'comment' => 'Discounted price ("Unit Price" in Quote)',
		'importable' => 'required',
        'required' => true,
	),
	'list_price' =>
	array (
		'name' => 'list_price',
		'vname' => 'LBL_LIST_PRICE',
		'required' => true,
		'type' => 'currency',
		'len' => '26,6',
	    'importable' => 'required',
        'required' => true,
		'comment' => 'List price of product ("List" in Quote)'
	),
	'cost_usdollar' =>
	array (
		'name' => 'cost_usdollar',
		'vname' => 'LBL_COST_USDOLLAR',
		'type' => 'currency',
		'len' => '26,6',
		'comment' => 'Cost expressed in USD'
	),
	'discount_usdollar' =>
	array (
		'name' => 'discount_usdollar',
		'vname' => 'LBL_DISCOUNT_USDOLLAR',
		'type' => 'currency',
		'len' => '26,6',
		'comment' => 'Discount price expressed in USD'
	),
	'list_usdollar' =>
	array (
		'name' => 'list_usdollar',
		'vname' => 'LBL_LIST_USDOLLAR',
		'type' => 'currency',
		'len' => '26,6',
		'comment' => 'List price expressed in USD'
	),
	'currency_id' =>
	array (
		'name' => 'currency_id',
		'vname' => 'LBL_CURRENCY',
		'type' => 'id',
		'function'=>array('name'=>'getCurrencyDropDown', 'returns'=>'html'),
        'javascript'=>'onchange="ConvertItems(this.options[selectedIndex].value);"',
        'required'=>false,
		'reportable'=>false,
		'importable' => 'true',
		'comment' => 'Currency of the product'
	),
  'currency_symbol' =>
	array (
		'name' => 'currency_symbol',
		'type' => 'varchar',
		'vname' =>'LBL_CURRENCY_SYMBOL_NAME',
		'source'=>'non-db'
  ),
	'currency' =>
	array (
		'name' => 'currency',
		'vname' => 'LBL_CURRENCY',
		'type' => 'varchar',
		'required'=>false,
		'reportable'=>false,
		'importable' => 'false',
		'comment' => 'Currency of the product'
	),
	'status' =>
	array (
		'name' => 'status',
		'vname' => 'LBL_STATUS',
		'type' => 'enum',
		'options' => 'product_template_status_dom',
		'len' => 100,
		'comment' => 'Product status (not used in product Catalog)'
	),
	'tax_class' =>
	array (
		'name' => 'tax_class',
		'vname' => 'LBL_TAX_CLASS',
		'type' => 'enum',
		'options' => 'tax_class_dom',
		'len' => 100,
		'comment' => 'Tax classification (ex: Taxable, Non-taxable)'
	),
	'date_available' =>
	array (
		'name' => 'date_available',
		'vname' => 'LBL_DATE_AVAILABLE',
		'type' => 'date',
		'comment' => 'Availability date'
	),
	'website' =>
	array (
		'name' => 'website',
		'vname' => 'LBL_URL',
		'type' => 'varchar',
		'len' => '255',
		'comment' => 'Product URL'
	),
	'weight' =>
	array (
		'name' => 'weight',
		'vname' => 'LBL_WEIGHT',
		'type' => 'decimal',
		'len' => '12',
        'precision' => '2',
		'comment' => 'Weight of the product'
	),
	'qty_in_stock' =>
	array (
		'name' => 'qty_in_stock',
		'vname' => 'LBL_QUANTITY',
		'type' => 'int',
		'len' => '5',
		'comment' => 'Quantity on hand'
	),
	'description' =>
	array (
		'name' => 'description',
		'vname' => 'LBL_DESCRIPTION',
		'type' => 'text',
		'comment' => 'Description of the product'
	),
	'support_name' =>
	array (
		'name' => 'support_name',
		'vname' => 'LBL_SUPPORT_NAME',
		'type' => 'varchar',
		'len' => '50',
		'comment' => 'Name of product for support purposes'
	),
	'support_description' =>
	array (
		'name' => 'support_description',
		'vname' => 'LBL_SUPPORT_DESCRIPTION',
		'type' => 'varchar',
		'len' => '255',
		'comment' => 'Description of product for support purposes'
	),
	'support_contact' =>
	array (
		'name' => 'support_contact',
		'vname' => 'LBL_SUPPORT_CONTACT',
		'type' => 'varchar',
		'len' => '50',
		'comment' => 'Contact for support purposes'
	),
	'support_term' =>
	array (
		'name' => 'support_term',
		'vname' => 'LBL_SUPPORT_TERM',
		'type' => 'enum',
		'options' => 'support_term_dom',
		'len' => 100,
		'comment' => 'Term (length) of support contract'
	),
	'pricing_formula' =>
	array (
		'name' => 'pricing_formula',
		'vname' => 'LBL_PRICING_FORMULA',
		'function' => array('name'=>'getPricingFormula', 'returns'=>'html'),
		'type' => 'varchar',
		'len' => 100,
		'comment' => 'Pricing formula (ex: Fixed, Markup over Cost)'
	),
	'pricing_factor' =>
	array (
		'name' => 'pricing_factor',
		'vname' => 'LBL_PRICING_FACTOR',
		'type' => 'decimal',
		'len' => '8',
        'precision' => '2',
		'comment' => 'Variable pricing factor depending on pricing_formula'
	),
	'account_name'=>array(
		'name'=>'account_name',
		'rname'=>'name',
		'id_name'=>'account_id',
		'vname'=>'LBL_ACCOUNT_NAME',
		'type'=>'relate',
		'table'=>'accounts',
		'isnull'=>'true',
		'module'=>'Accounts',
		'source'=>'non-db',
	    'massupdate' => false,
	),
		'created_by_link' =>
	array (
		'name' => 'created_by_link',
		'type' => 'link',
		'relationship' => 'product_templates_created_by',
		'vname' => 'LBL_CREATED_BY_USER',
		'link_type' => 'one',
		'module'=>'Users',
		'bean_name'=>'User',
		'source'=>'non-db',
	),
	'modified_user_link' =>
	array (
		'name' => 'modified_user_link',
		'type' => 'link',
		'relationship' => 'product_templates_modified_user',
		'vname' => 'LBL_MODIFIED_BY_USER',
		'link_type' => 'one',
		'module'=>'Users',
		'bean_name'=>'User',
		'source'=>'non-db',
	),
	'assigned_user_link' =>
	array (
		'name' => 'assigned_user_link',
		'type' => 'link',
		'relationship' => 'product_templates_assigned_user',
		'vname' => 'LBL_ASSIGNED_TO_USER',
		'link_type' => 'one',
		'module'=>'Users',
		'bean_name'=>'User',
		'source'=>'non-db',
	),
    'category_link' =>
    array (
	    'name' => 'category_link',
	    'type' => 'link',
	    'relationship' => 'product_templates_product_categories',
	    'vname' => 'LBL_PRODUCT_CATEGORIES',
	    'link_type' => 'one',
	    'module'=>'ProductCategories',
	    'bean_name'=>'ProductCategory',
	    'source'=>'non-db',
	),
    'type_link' =>
    array (
	    'name' => 'type_link',
	    'type' => 'link',
	    'relationship' => 'product_templates_product_types',
	    'vname' => 'LBL_PRODUCT_TYPES',
	    'link_type' => 'one',
	    'module'=>'ProductTypes',
	    'bean_name'=>'ProductType',
	    'source'=>'non-db',
    ),
    'manufacturer_link' =>
    array (
        'name' => 'manufacturer_link',
        'type' => 'link',
        'relationship' => 'product_templates_manufacturers',
        'vname' => 'LBL_MANUFACTURERS',
        'link_type' => 'one',
        'module' => 'Manufacturers',
        'bean_name' => 'Manufacturer',
        'source' => 'non-db',
    ),

)
,
 'relationships' => array (

    'product_templates_product_categories' =>
    array('lhs_module'=> 'ProductCategories', 'lhs_table'=> 'product_categories', 'lhs_key' => 'id',
    'rhs_module'=> 'ProductTemplates', 'rhs_table'=> 'product_templates', 'rhs_key' => 'category_id',
    'relationship_type'=>'one-to-many')

    ,'product_templates_product_types' =>
    array('lhs_module'=> 'ProductTypes', 'lhs_table'=> 'product_types', 'lhs_key' => 'id',
    'rhs_module'=> 'ProductTemplates', 'rhs_table'=> 'product_templates', 'rhs_key' => 'type_id',
    'relationship_type'=>'one-to-many'),
    
    'product_templates_manufacturers' =>
    array('lhs_module' => 'Manufacturers', 'lhs_table'=> 'manufacturers', 'lhs_key' => 'id', 
    'rhs_module' => 'ProductTemplates', 'rhs_table' => 'product_templates', 'rhs_key' => 'manufacturer_id',
    'relationship_type' => 'one-to-many'),

	'product_templates_modified_user' =>
	array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
	'rhs_module'=> 'ProductTemplates', 'rhs_table'=> 'product_templates', 'rhs_key' => 'modified_user_id',
	'relationship_type'=>'one-to-many')

	,'product_templates_created_by' =>
	array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
	'rhs_module'=> 'ProductTemplates', 'rhs_table'=> 'product_templates', 'rhs_key' => 'created_by',
	'relationship_type'=>'one-to-many')

/* No column assigned_user_id and team_id so commenting out the relationship
 	'product_templates_assigned_user' =>
	array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
	'rhs_module'=> 'ProductTemplates', 'rhs_table'=> 'product_templates', 'rhs_key' => 'assigned_user_id',
	'relationship_type'=>'one-to-many')

	,

	,'product_templates_team' =>
	array('lhs_module'=> 'Teams', 'lhs_table'=> 'teams', 'lhs_key' => 'id',
	'rhs_module'=> 'ProductTemplates', 'rhs_table'=> 'product_templates', 'rhs_key' => 'team_id',
	'relationship_type'=>'one-to-many')
*/

)

    ,'indices' => array (
	array('name' =>'procuct_templatespk', 'type' =>'primary', 'fields'=>array('id')),
	array('name' =>'idx_product_template', 'type'=>'index', 'fields'=>array('name','deleted')),
    )
);
?>

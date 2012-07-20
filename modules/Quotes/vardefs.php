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

$dictionary['Quote'] = array('table' => 'quotes','audited'=>true, 'unified_search' => true
                               ,'fields' => array (
  'shipper_id' =>
  array (
    'name' => 'shipper_id',
    'vname' => 'LBL_SHIPPER_ID',
    'type' => 'id',
    'required'=>false,
    'do_report'=>false,
    'reportable'=>false,
  ),
  'shipper_name' =>
  array (
    'name' => 'shipper_name',
    'rname' => 'name',
    'id_name' => 'shipper_id',
    'join_name' => 'shippers',
    'type' => 'relate',
    'link' => 'shippers',
    'table' => 'shippers',
    'isnull' => 'true',
    'module' => 'Shippers',
    'dbType' => 'varchar',
    'len' => '255',
    'vname' => 'LBL_SHIPPING_PROVIDER',
    'source'=>'non-db',
    'comment' => 'Shipper Name'
  ),
  'shippers' => 
  array (
      'name' => 'shippers',
      'type' => 'link',
      'relationship' => 'shipper_quotes',
      'vname' => 'LBL_SHIPPING_PROVIDER',
      'source'=>'non-db',
  ),
  'currency_id' =>
  array (
    'name' => 'currency_id',
    'vname' => 'LBL_CURRENCY_ID',
    'type' => 'id',
    'required'=>false,
    'do_report'=>false,
    'reportable'=>false,
  ),
  'taxrate_id' =>
  array (
    'name' => 'taxrate_id',
    'vname' => 'LBL_TAXRATE_ID',
    'type' => 'id',
    'required'=>false,
    'do_report'=>false,
    'reportable'=>false,
  ),
  'show_line_nums' =>
  array (
    'name' => 'show_line_nums',
    'vname' => 'LBL_SHOW_LINE_NUMS',
    'type' => 'bool',
    'default'=>1,
    'hideacl'=>true,
    'reportable'=>false,
    'massupdate'=>false,
  ),
  'calc_grand_total' =>
  array (
    'name' => 'calc_grand_total',
    'vname' => 'LBL_CALC_GRAND',
    'type' => 'bool',
    'reportable'=>false,
    'default'=>1,
    'hideacl'=>true,
    'massupdate' => false,
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_QUOTE_NAME',
    'dbType' => 'varchar',
    'type' => 'name',
    'len' => '50',
    'unified_search' => true,
    'importable' => 'required',
    'required'=>true,
  ),
  'quote_type' =>
  array (
    'name' => 'quote_type',
    'vname' => 'LBL_QUOTE_TYPE',
    'type' => 'varchar',
    'len' => 100,
  ),
  'date_quote_expected_closed' =>
  array (
    'name' => 'date_quote_expected_closed',
    'vname' => 'LBL_DATE_QUOTE_EXPECTED_CLOSED',
    'type' => 'date',
    'audited'=>true,
    'reportable'=>true,
    'importable' => 'required',
    'required'=>true,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),
  'original_po_date' =>
  array (
    'name' => 'original_po_date',
    'vname' => 'LBL_ORIGINAL_PO_DATE',
    'type' => 'date',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),
  'payment_terms' =>
  array (
    'name' => 'payment_terms',
    'vname' => 'LBL_PAYMENT_TERMS',
    'type' => 'enum',
    'options' => 'payment_terms',
    'len' => '128',
  ),
  'date_quote_closed' =>
  array (
    'name' => 'date_quote_closed',
    'massupdate' => false,
    'vname' => 'LBL_DATE_QUOTE_CLOSED',
    'type' => 'date',
    'reportable'=>false,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),
  'date_order_shipped' =>
  array (
    'name' => 'date_order_shipped',
    'massupdate' => false,
    'vname' => 'LBL_LIST_DATE_QUOTE_CLOSED',
    'type' => 'date',
    'reportable' => false,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),
  'order_stage' =>
  array (
    'name' => 'order_stage',
    'vname' => 'LBL_ORDER_STAGE',
    'type' => 'enum',
    'options' => 'order_stage_dom',
    'massupdate'=>false,
    'len' => 100,
  ),
  'quote_stage' =>
  array (
    'name' => 'quote_stage',
    'vname' => 'LBL_QUOTE_STAGE',
    'type' => 'enum',
    'options' => 'quote_stage_dom',
    'len' => 100,
    'audited'=>true,
    'importable' => 'required',
    'required'=>true,
  ),
  'purchase_order_num' =>
  array (
    'name' => 'purchase_order_num',
    'vname' => 'LBL_PURCHASE_ORDER_NUM',
    'type' => 'varchar',
    'len' => '50',
  ),
  'quote_num' =>
  array (
    'name' => 'quote_num',
    'vname' => 'LBL_QUOTE_NUM',
    'type' => 'int',
    'auto_increment'=>true,
    'required'=>true,
    'unified_search' => true,
    'disable_num_format' => true,
  	'enable_range_search' => true,
  	'options' => 'numeric_range_search_dom',
  ),
  'subtotal' =>
  array (
    'name' => 'subtotal',
    'vname' => 'LBL_SUBTOTAL',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'subtotal_usdollar' =>
  array (
    'name' => 'subtotal_usdollar',
    'group'=>'subtotal',
    'vname' => 'LBL_SUBTOTAL_USDOLLAR',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
    'audited'=>true,
  ),
  'shipping' =>
  array (
    'name' => 'shipping',
    'vname' => 'LBL_SHIPPING',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'shipping_usdollar' =>
  array (
    'name' => 'shipping_usdollar',
    'vname' => 'LBL_SHIPPING_USDOLLAR',
    'group'=>'shipping',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
    'discount' =>
  array (
    'name' => 'discount',
    'vname' => 'LBL_DISCOUNT_TOTAL',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'deal_tot' =>
  array (
    'name' => 'deal_tot',
    'vname' => 'LBL_DEAL_TOT',
    'dbType' => 'decimal',
    'type' => 'decimal',
    'len' => '26,2',
  ),
  'deal_tot_usdollar' =>
  array (
    'name' => 'deal_tot_usdollar',
    'vname' => 'LBL_DEAL_TOT_USDOLLAR',
    'dbType' => 'decimal',
    'type' => 'decimal',
    'len' => '26,2',
  ),
  'new_sub' =>
  array (
    'name' => 'new_sub',
    'vname' => 'LBL_NEW_SUB',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'new_sub_usdollar' =>
  array (
    'name' => 'new_sub_usdollar',
    'vname' => 'LBL_NEW_SUB',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'tax' =>
  array (
    'name' => 'tax',
    'vname' => 'LBL_TAX',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'tax_usdollar' =>
  array (
    'name' => 'tax_usdollar',
    'vname' => 'LBL_TAX_USDOLLAR',
    'dbType' => 'decimal',
    'group'=>'tax',
    'type' => 'currency',
    'len' => '26,6',
    'audited'=>true,
  ),
  'total' =>
  array (
    'name' => 'total',
    'vname' => 'LBL_TOTAL',
    'dbType' => 'decimal',
    'type' => 'currency',
    'len' => '26,6',
  ),
  'total_usdollar' =>
  array (
    'name' => 'total_usdollar',
    'vname' => 'LBL_TOTAL_USDOLLAR',
    'dbType' => 'decimal',
    'group'=>'total',
    'type' => 'currency',
    'len' => '26,6',
    'audited'=>true,
  	'enable_range_search' => true,
  	'options' => 'numeric_range_search_dom',
  ),
  'billing_address_street' =>
  array (
    'name' => 'billing_address_street',
    'vname' => 'LBL_BILLING_ADDRESS_STREET',
    'type' => 'varchar',
    'group'=>'billing_address',
    'len' => '150',
  ),
  'billing_address_city' =>
  array (
    'name' => 'billing_address_city',
    'vname' => 'LBL_BILLING_ADDRESS_CITY',
    'type' => 'varchar',
    'group'=>'billing_address',
    'len' => '100',
  ),
  'billing_address_state' =>
  array (
    'name' => 'billing_address_state',
    'vname' => 'LBL_BILLING_ADDRESS_STATE',
    'type' => 'varchar',
    'group'=>'billing_address',
    'len' => '100',
  ),
  'billing_address_postalcode' =>
  array (
    'name' => 'billing_address_postalcode',
    'vname' => 'LBL_BILLING_ADDRESS_POSTAL_CODE',
    'type' => 'varchar',
    'group'=>'billing_address',
    'len' => '20',
  ),
  'billing_address_country' =>
  array (
    'name' => 'billing_address_country',
    'vname' => 'LBL_BILLING_ADDRESS_COUNTRY',
    'type' => 'varchar',
    'group'=>'billing_address',
    'len' => '100',
  ),
  'shipping_address_street' =>
  array (
    'name' => 'shipping_address_street',
    'vname' => 'LBL_SHIPPING_ADDRESS_STREET',
    'type' => 'varchar',
    'group'=>'shipping_address',
    'len' => '150',
  ),
  'shipping_address_city' =>
  array (
    'name' => 'shipping_address_city',
    'vname' => 'LBL_SHIPPING_ADDRESS_CITY',
    'type' => 'varchar',
    'group'=>'shipping_address',
    'len' => '100',
  ),
  'shipping_address_state' =>
  array (
    'name' => 'shipping_address_state',
    'vname' => 'LBL_SHIPPING_ADDRESS_STATE',
    'type' => 'varchar',
    'group'=>'shipping_address',
    'len' => '100',
  ),
  'shipping_address_postalcode' =>
  array (
    'name' => 'shipping_address_postalcode',
    'vname' => 'LBL_SHIPPING_ADDRESS_POSTAL_CODE',
    'type' => 'varchar',
    'group'=>'shipping_address',
    'len' => '20',
  ),
  'shipping_address_country' =>
  array (
    'name' => 'shipping_address_country',
    'vname' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
    'type' => 'varchar',
    'group'=>'shipping_address',
    'len' => '100',
  ),
  'system_id' =>
  array (
    'name' => 'system_id',
    'vname' => 'LBL_SYSTEM_ID',
    'type' => 'int',
  ),
 'shipping_account_name' =>
 	array(
		'name'=>'shipping_account_name',
		'rname'=>'name',
		'id_name'=>'shipping_account_id',
		'vname'=>'LBL_SHIPPING_ACCOUNT_NAME',
		'type'=>'relate',
        'table'=>'shipping_accounts',
		'isnull'=>'true',
		'group'=>'shipping_address',
		'link'=>'shipping_accounts',
		'module'=>'Accounts',
		'source'=>'non-db',
		),
 'shipping_account_id' =>
 	array(
		'name'=>'shipping_account_id',
		'type'=>'id',
		'group'=>'shipping_address',
		'vname'=>'LBL_SHIPPING_ACCOUNT_ID',
		'source'=>'non-db',
		),
  'shipping_contact_name' =>
  	array(
		'name'=>'shipping_contact_name',
		'rname'=>'last_name',
		'id_name'=>'shipping_contact_id',
		'vname'=>'LBL_SHIPPING_CONTACT_NAME',
		'type'=>'relate',
		'group'=>'shipping_address',
		'link'=>'shipping_contacts',
		'table'=>'shipping_contacts',
		'isnull'=>'true',
		'module'=>'Contacts',
		'source'=>'non-db',
		),
  'shipping_contact_id'=>
	array(
		'name'=>'shipping_contact_id',
		'rname'=>'last_name',
		'group'=>'shipping_address',
		'id_name'=>'shipping_contact_id',
		'vname'=>'LBL_SHIPPING_CONTACT_ID',
		'type'=>'relate',
		'link'=>'shipping_contacts',
		'table'=>'shipping_contacts',
		'isnull'=>'true',
		'module'=>'Contacts',
		'source'=>'non-db',
    	'massupdate' => false,	//CL: set to false, shown via shipping_contact_name
	),
  'account_name'=>
	array(
		'name'=>'account_name',
		'rname'=>'name',
		'id_name'=>'account_id',
		'vname'=>'LBL_ACCOUNT_NAME',
		'type'=>'relate',
		'group'=>'billing_address',
		'link'=>'billing_accounts',
		'table'=>'billing_accounts',
		'isnull'=>'true',
		'module'=>'Accounts',
		'source'=>'non-db',
		'massupdate' => false,
		'studio' => 'false',
	),
 'account_id' =>
 	array(
		'name'=>'account_id',
		'type'=>'id',
		'group'=>'billing_address',
		'vname'=>'LBL_ACCOUNT_ID',
		'source'=>'non-db',
		'massupdate' => false,
		'studio' => 'false',
		),
  'billing_account_name'=>
	array(
		'name'=>'billing_account_name',
		'rname'=>'name',
		'group'=>'billing_address',
		'id_name'=>'billing_account_id',
		'vname'=>'LBL_BILLING_ACCOUNT_NAME',
		'type'=>'relate',
		'link'=>'billing_accounts',
		'table'=>'billing_accounts',
		'isnull'=>'true',
		'module'=>'Accounts',
		'source'=>'non-db',
		'importable' => 'required',
	    'required'=>true,
	),
  'billing_account_id' =>
 	array(
		'name'=>'billing_account_id',
		'type'=>'id',
		'group'=>'billing_address',
		'vname'=>'LBL_BILLING_ACCOUNT_ID',
		'source'=>'non-db',
		),
  'billing_contact_name'=>
	array(
		'name'=>'billing_contact_name',
		'rname'=>'last_name',
		'group'=>'billing_address',
		'id_name'=>'billing_contact_id',
		'vname'=>'LBL_BILLING_CONTACT_NAME',
		'type'=>'relate',
		'link'=>'billing_contacts',
		'table'=>'billing_contacts',
		'isnull'=>'true',
		'module'=>'Contacts',
		'source'=>'non-db',
	),
  'billing_contact_id'=>
	array(
		'name'=>'billing_contact_id',
		'rname'=>'last_name',
		'id_name'=>'billing_contact_id',
		'vname'=>'LBL_BILLING_CONTACT_ID',
		'type'=>'relate',
		'group'=>'billing_address',
		'link'=>'billing_contacts',
		'table'=>'billing_contacts',
		'isnull'=>'true',
		'module'=>'Contacts',
		'source'=>'non-db',
		'massupdate' => false, //CL: set to false, shown via billing_contact_name
	),
  'tasks' =>
  	array (
  		'name' => 'tasks',
    	'type' => 'link',
    	'relationship' => 'quote_tasks',
    	'vname' => 'LBL_TASKS',
    	'source'=>'non-db',
  	),
  'notes' =>
  	array (
  		'name' => 'notes',
    	'type' => 'link',
    	'relationship' => 'quote_notes',
    	'vname' => 'LBL_NOTES',
    	'source'=>'non-db',
  	),
  'meetings' =>
  	array (
  		'name' => 'meetings',
    	'type' => 'link',
    	'relationship' => 'quote_meetings',
    	'vname' => 'LBL_MEETINGS',
    	'source'=>'non-db',
  	),
  'calls' =>
  	array (
	  	'name' => 'calls',
    	'type' => 'link',
    	'relationship' => 'quote_calls',
    	'vname' => 'LBL_CALLS',
    	'source'=>'non-db',
  	),
  'emails' =>
	array (
  		'name' => 'emails',
    	'type' => 'link',
    	'relationship' => 'emails_quotes',
    	'vname' => 'LBL_EMAILS',
    	'source'=>'non-db',
  	),
  'project' =>
	array (
  		'name' => 'project',
    	'type' => 'link',
    	'relationship' => 'projects_quotes',
    	'vname' => 'LBL_PROJECTS',
    	'source'=>'non-db',
  	),
  'products' =>
	array (
  		'name' => 'products',
    	'type' => 'link',
    	'relationship' => 'quote_products',
    	'vname' => 'LBL_PRODUCTS',
    	'source'=>'non-db',
  	),
  'shipping_accounts' =>
	array (
  		'name' => 'shipping_accounts',
    	'type' => 'link',
    	'relationship' => 'quotes_shipto_accounts',
    	'vname' => 'LBL_SHIP_TO_ACCOUNT',
    	'source'=>'non-db',
    	'link_type' => 'one',
  	),
  'billing_accounts' =>
	array (
  		'name' => 'billing_accounts',
    	'type' => 'link',
    	'relationship' => 'quotes_billto_accounts',
    	'vname' => 'LBL_BILL_TO_ACCOUNT',
    	'source'=>'non-db',
    	'link_type' => 'one',
  	),
  'shipping_contacts' =>
	array (
  		'name' => 'shipping_contacts',
    	'type' => 'link',
    	'relationship' => 'quotes_contacts_shipto',
    	'vname' => 'LBL_SHIP_TO_CONTACT',
    	'source'=>'non-db',
    	'link_type' => 'one',
  	),
  'billing_contacts' =>
	array (
  		'name' => 'billing_contacts',
    	'type' => 'link',
    	'link_type' => 'one',
    	'vname' => 'LBL_BILL_TO_CONTACT',
    	'relationship' => 'quotes_contacts_billto',
    	'source'=>'non-db',
  	),
  'product_bundles' =>
	array (
  		'name' => 'product_bundles',
    	'type' => 'link',
	'vname'=>'LBL_PRODUCT_BUNDLES',

    	'relationship' => 'product_bundle_quote',
    	'source'=>'non-db',
  	),
  'opportunities' =>
	array (
  		'name' => 'opportunities',
    	'type' => 'link',
    	'vname' => 'LBL_OPPORTUNITY',
    	'relationship' => 'quotes_opportunities',
    	'link_type' => 'one',
    	'source'=>'non-db',
  	),
  'created_by_link' =>
  array (
        'name' => 'created_by_link',
    'type' => 'link',
    'relationship' => 'quotes_created_by',
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
    'relationship' => 'quotes_modified_user',
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
    'relationship' => 'quotes_assigned_user',
    'vname' => 'LBL_ASSIGNED_TO_USER',
    'link_type' => 'one',
    'module'=>'Users',
    'bean_name'=>'User',
    'source'=>'non-db',
  ),

  'opportunity_name' =>
  array (
    'name' => 'opportunity_name',
    'rname' => 'name',
    'id_name' => 'opportunity_id',
    'vname' => 'LBL_OPPORTUNITY_NAME',
    'type' => 'relate',
    'table' => 'Opportunities',
    'isnull' => 'true',
    'module' => 'Opportunities',
    'link' => 'opportunities',
    'massupdate' => false,
    //'dbType' => 'varchar',
    'source' => 'non-db',
    'len' => 50,
  ),
  'opportunity_id' =>
  array(
	'name'=>'opportunity_id',
	'type'=>'id',
	'vname'=>'LBL_BILLING_ACCOUNT_NAME',
	'source'=>'non-db',
  ),
  'documents'=>
  array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_quotes',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
  ),

  'contracts' => array (
	'name' => 'contracts',
	'type' => 'link',
	'vname' => 'LBL_CONTRACTS',
	'relationship' => 'contracts_quotes',
	'link_type' => 'one',
	'source' => 'non-db',
  ),
)
, 'indices' => array (
       /*
       array('name' =>'quote_num', 'type'=>'index', 'fields'=>array('quote_num')),
        */
         array('name' =>'quote_num', 'type'=>'unique', 'fields'=>array('quote_num', 'system_id')),
       array('name' =>'idx_qte_name', 'type'=>'index', 'fields'=>array('name')),
                                                      )
, 'relationships' => array (
	'quote_tasks' => array('lhs_module'=> 'Quotes', 'lhs_table'=> 'quotes', 'lhs_key' => 'id',
	  'rhs_module'=> 'Tasks', 'rhs_table'=> 'tasks', 'rhs_key' => 'parent_id',
	  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
	  'relationship_role_column_value'=>'Quotes')

	,'quote_notes' => array('lhs_module'=> 'Quotes', 'lhs_table'=> 'quotes', 'lhs_key' => 'id',
	  'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Quotes')

	,'quote_meetings' => array('lhs_module'=> 'Quotes', 'lhs_table'=> 'quotes', 'lhs_key' => 'id',
							  'rhs_module'=> 'Meetings', 'rhs_table'=> 'meetings', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Quotes')

	,'quote_calls' => array('lhs_module'=> 'Quotes', 'lhs_table'=> 'quotes', 'lhs_key' => 'id',
							  'rhs_module'=> 'Calls', 'rhs_table'=> 'calls', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Quotes')

	,'quote_emails' => array('lhs_module'=> 'Quotes', 'lhs_table'=> 'quotes', 'lhs_key' => 'id',
							  'rhs_module'=> 'Emails', 'rhs_table'=> 'emails', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Quotes')

	,'quote_products' => array('lhs_module'=> 'Quotes', 'lhs_table'=> 'quotes', 'lhs_key' => 'id',
							  'rhs_module'=> 'Products', 'rhs_table'=> 'products', 'rhs_key' => 'quote_id',
							  'relationship_type'=>'one-to-many'),
        'quotes_assigned_user' =>
        array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
        'rhs_module'=> 'Quotes', 'rhs_table'=> 'quotes', 'rhs_key' => 'assigned_user_id',
        'relationship_type'=>'one-to-many'),

        'quotes_modified_user' =>
        array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
        'rhs_module'=> 'Quotes', 'rhs_table'=> 'quotes', 'rhs_key' => 'modified_user_id',
        'relationship_type'=>'one-to-many'),

        'quotes_created_by' =>
        array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
        'rhs_module'=> 'Quotes', 'rhs_table'=> 'quotes', 'rhs_key' => 'created_by',
        'relationship_type'=>'one-to-many'),
	),
);
VardefManager::createVardef('Quotes','Quote', array('default', 'assignable',
'team_security',
));
?>

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

$dictionary['ProductBundle'] = array('table' => 'product_bundles', 'comment' => 'Quote groups'
                               ,'fields' => array (
 'id' =>
  array (
    'name' => 'id',
    'vname' => 'LBL_NAME',
    'type' => 'id',
    'required' => true,
    'reportable'=>false,
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
    'comment' => 'Record deletion indicator'
  ),
   'date_entered' =>
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_DATE_ENTERED',
    'type' => 'datetime',
    'required' => true,
    'comment' => 'Date record created'
  ),
  'date_modified' =>
  array (
    'name' => 'date_modified',
    'vname' => 'LBL_DATE_MODIFIED',
    'type' => 'datetime',
    'required' => true,
    'comment' => 'Date record last modified'
  ),
    'modified_user_id' =>
  array (
    'name' => 'modified_user_id',
    'rname' => 'user_name',
    'id_name' => 'modified_user_id',
    'vname' => 'LBL_ASSIGNED_TO',
    'type' => 'assigned_user_name',
    'table' => 'users',
    'isnull' => 'false',
    'dbType' => 'id',
    'reportable'=>true,
    'comment' => 'User who last modified record'
  ),
  'created_by' =>
  array (
    'name' => 'created_by',
    'rname' => 'user_name',
    'id_name' => 'modified_user_id',
    'vname' => 'LBL_ASSIGNED_TO',
    'type' => 'assigned_user_name',
    'table' => 'users',
    'isnull' => 'false',
    'dbType' => 'id',
    'comment' => 'User who created record'
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_NAME',
    'dbType' => 'varchar',
    'type' => 'name',
    'len' => '255',
    'comment' => 'Name of the group'
  ),
  'bundle_stage' =>
  array (
    'name' => 'bundle_stage',
    'vname' => 'LBL_BUNDLE_STAGE',
    'type' => 'varchar',
    'len' => '255',
    'comment' => 'Processing stage of the group (ex: Draft)'
  ),
  'description' =>
  array (
    'name' => 'description',
    'vname' => 'LBL_DESCRIPTION',
    'type' => 'text',
    'comment' => 'Group description'
  ),
  'tax' =>
  array (
    'name' => 'tax',
    'vname' => 'LBL_TAX',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Tax rate applied to items in the group'
  ),
  'tax_usdollar' =>
  array (
    'name' => 'tax_usdollar',
    'vname' => 'LBL_TAX_USDOLLAR',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Total tax for all items in group in USD'
  ),
  'total' =>
  array (
    'name' => 'total',
    'vname' => 'LBL_TOTAL',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Total amount for all items in the group'
  ),
   'total_usdollar' =>
  array (
    'name' => 'total_usdollar',
    'vname' => 'LBL_TOTAL_USDOLLAR',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Total amount for all items in the group in USD'
  ),

  'subtotal_usdollar' =>
  array (
    'name' => 'subtotal_usdollar',
    'vname' => 'LBL_SUBTOTAL_USDOLLAR',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Group total minus tax and shipping in USD'
  ),
  'shipping_usdollar' =>
  array (
    'name' => 'shipping_usdollar',
    'vname' => 'LBL_SHIPPING',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Shipping charge for group in USD'
  ),
  'deal_tot' =>
  array (
    'name' => 'deal_tot',
    'vname' => 'LBL_DEAL_TOT',
    'type' => 'decimal',
    'len' => '26,2',
    'disable_num_format' => true,
    'comment' => 'discount amount'
  ),
  'deal_tot_usdollar' =>
  array (
    'name' => 'deal_tot_usdollar',
    'vname' => 'LBL_DEAL_TOT',
    'type' => 'decimal',
    'len' => '26,2',
    'disable_num_format' => true,
    'comment' => 'discount amount'
  ),
  'new_sub' =>
  array (
    'name' => 'new_sub',
    'vname' => 'LBL_NEW_SUB',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Group total minus discount and tax and shipping'
  ),
  'new_sub_usdollar' =>
  array (
    'name' => 'new_sub_usdollar',
    'vname' => 'LBL_NEW_SUB',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Group total minus discount and tax and shipping'
  ),
  'subtotal' =>
  array (
    'name' => 'subtotal',
    'vname' => 'LBL_SUBTOTAL',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Group total minus tax and shipping'
  ),
  'shipping' =>
  array (
    'name' => 'shipping',
    'vname' => 'LBL_SHIPPING',
    'type' => 'decimal',
    'len' => '26,6',
    'disable_num_format' => true,
    'comment' => 'Shipping charge for group'
  ),
  'currency_id' =>
  array (
    'name' => 'currency_id',
    'type' => 'id',
    'required'=>false,
    'reportable'=>false,
    'comment' => 'Currency used'
  ),

    'products' =>
      array (
        'name' => 'products',
        'type' => 'link',
        'relationship' => 'product_bundle_product',
        'module'=>'Products',
        'bean_name'=>'Product',
        'source'=>'non-db',
        'rel_fields'=>array('product_index'=>array('type'=>'integer')),
        'vname'=>'LBL_PRODUCTS',
      ),

)
                                                      , 'indices' => array (
       array('name' =>'procuct_bundlespk', 'type' =>'primary', 'fields'=>array('id')),
       array('name' =>'idx_products_bundles', 'type'=>'index', 'fields'=>array('name','deleted')),
                                                      )
                            );

VardefManager::createVardef('ProductBundles','ProductBundle', array(
'team_security',
));
?>

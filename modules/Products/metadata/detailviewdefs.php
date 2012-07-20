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

$viewdefs['Products']['DetailView'] = array(
'templateMeta' => array('maxColumns' => '2', 
                        'widths' => array(
                                        array('label' => '10', 'field' => '30'), 
                                        array('label' => '10', 'field' => '30')
                                        ),
                        ),
'panels' =>array (
  'default' =>array(
  array (
    'name',
    'status',
  ),
  
  array (
    'quote_name',
    'contact_name',
  ),
  
  array (
    'account_name',
  ),
  
  array (
    'quantity',
    'date_purchased',
  ),
  
  array (
    'serial_number',
    'date_support_starts',
  ),
  
  array (
    'asset_number',
    'date_support_expires',
  ),

  ),
array(
    
  array (
    'currency_id',
  ),
  
  array (    
    array (
      'name' => 'cost_price',
      'label' => '{$MOD.LBL_COST_PRICE|strip_semicolon} ({$CURRENCY})',
    ),
    ''
  ),
  
  array (
    
    array (
      'name' => 'list_price',
      'label' => '{$MOD.LBL_LIST_PRICE|strip_semicolon} ({$CURRENCY})',
    ),
    
    array (
      'name' => 'book_value',
      'label' => '{$MOD.LBL_BOOK_VALUE|strip_semicolon} ({$CURRENCY})',
    ),
  ),
  
  array (
    
    array (
      'name' => 'discount_price',
      'label' => '{$MOD.LBL_DISCOUNT_PRICE|strip_semicolon} ({$CURRENCY})',
    ),
    'book_value_date',
  ),
  
  array (    
    array (
      'name' => 'discount_amount',
      'customCode' => '{if $fields.discount_select.value}{sugar_number_format var=$fields.discount_amount.value}%{else}{$fields.currency_symbol.value}{sugar_number_format var=$fields.discount_amount.value}{/if}',
    ),
    ''
  ),
),
array(
  array (
    array('name'=>'website', 'type'=>'link'),
    'tax_class',
  ),
  
  array (
    'manufacturer_name',
    'weight',
  ),
  
  array (
    'mft_part_num',
     array('name'=>'category_name', 'type'=>'text'),
  ),
  
  array (
    'vendor_part_num',
  	'type_name',
  ),
  
  array (
    'description',
  ),
      
  array (
    'support_name',
    'support_contact',
  ),
  
  array (
    'support_description',
    'support_term',
  ),
),
),


   
);
?>
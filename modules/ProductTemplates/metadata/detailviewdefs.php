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

$viewdefs['ProductTemplates']['DetailView'] = array(
'templateMeta' => array('maxColumns' => '2', 
                        'widths' => array(
                                        array('label' => '10', 'field' => '30'), 
                                        array('label' => '10', 'field' => '30')
                                        ),
                        ),
'panels' =>array (
  
  array (
    'name',
    'status',
  ),
  
  array (
    
    array (
      'name' => 'website',
      'label' => 'LBL_URL',
      'type' => 'link',
    ),
    'date_available',
  ),
  
  array (
    'tax_class',
    
    array (
      'name' => 'qty_in_stock',
      'label' => 'LBL_QUANTITY',
    ),
  ),
  
  array (
    'manufacturer_id',
    'weight',
  ),
  
  array (
    'mft_part_num',
    
    array (
      'name' => 'category_name',
      'type' => 'varchar',
      'label' => 'LBL_CATEGORY',
    ),
  ),
  
  array (
    'vendor_part_num',
    
    array (
      'name' => 'type_id',
      'type' => 'varchar',
      'label' => 'LBL_TYPE',
    ),
  ),
  
  array (
    'currency_id',
    'support_name',
  ),
  
  array (
    
    array (
      'name' => 'cost_price',
      'label' => '{$MOD.LBL_COST_PRICE|strip_semicolon} ({$CURRENCY})',
    ),
    'support_contact',
  ),
  
  array (
    
    array (
      'name' => 'list_price',
      'label' => '{$MOD.LBL_LIST_PRICE|strip_semicolon} ({$CURRENCY})',
    ),
    'support_description',
  ),
  
  array (
    
    array (
      'name' => 'discount_price',
      'label' => '{$MOD.LBL_DISCOUNT_PRICE|strip_semicolon} ({$CURRENCY})',
    ),
    'support_term',
  ),
  
  array (
    'pricing_formula',
  ),
  
  array (
    array('name'=>'description', 'displayParams'=>array('nl2br'=>true)),
  ),
)


   
);
?>
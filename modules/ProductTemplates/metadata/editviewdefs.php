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

$viewdefs['ProductTemplates']['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30')
                                            ),
),
 'panels' =>array (
  
 'default' => 
  array (    
    array (
      array('name'=>'name', 'label' => 'LBL_NAME','displayParams'=>array('required'=>true)),
      array (
	      'name' =>'status',
	      'label' =>'LBL_STATUS',
	    ),	    
    ),
    
    array (
	    	array (
	      'name' =>  'category_name',
	      'label' => 'LBL_CATEGORY_NAME',
	    ),
     
    ),
    
    array (
    	array (
	      'name' =>  'website',
	      'label' => 'LBL_URL',
	    ),
     array (
	      'name' =>  'date_available',
	      'label' =>'LBL_DATE_AVAILABLE',
	    ),
     
    ),
    
    array (
    	array (
	      'name' =>   'tax_class',
	      'label' => 'LBL_TAX_CLASS',
	    ),
     array (
	      'name' =>  'qty_in_stock',
	      'label' => 'LBL_QUANTITY',
	    ),
    ),
    
    array (
    	array (
	      'name' =>   'manufacturer_id',
	      'label' => 'LBL_LIST_MANUFACTURER_ID',
	    ),
     array (
	      'name' =>'weight',
	      'label' =>'LBL_WEIGHT',
	    ),
    ),
    
    array (
    	 array (
	      'name' =>'mft_part_num',
	      'label' =>'LBL_MFT_PART_NUM',
	    ),
    ),
    
    array (
    	array (
	      'name' =>'vendor_part_num',
	      'label' =>'LBL_VENDOR_PART_NUM',
	    ),
     array (
	      'name' =>'type_id',
	      'label' =>'LBL_TYPE',
	    ),
    ),
    
    array (
    	array (
	      'name' => 'currency_id',
	      'label' => 'LBL_CURRENCY',
	    ),
     array (
	      'name' => 'support_name',
	      'label' => 'LBL_SUPPORT_NAME',
	    ),
    ),
    
    array (
    	array (
	      'name' => 'cost_price',
	      'label' => 'LBL_COST_PRICE',
	    ),
     array (
	      'name' =>  'support_contact',
	      'label' => 'LBL_SUPPORT_CONTACT',
	    ),
    ),
    
    array (
    	array (
	      'name' => 'list_price',
	      'label' => 'LBL_LIST_PRICE',
	    ),
     array (
	      'name' => 'support_description',
	      'label' => 'LBL_SUPPORT_DESCRIPTION',
	    ),
    ),
    
    array (
    	array (
	      'name' =>  'discount_price',
	      'label' => 'LBL_DISCOUNT_PRICE',
	    ),
     array (
	      'name' =>  'support_term',
	      'label' => 'LBL_SUPPORT_TERM',
	    ),
    ),
    
    array (
    	  array (
	      'name' => 'pricing_formula',
	      'label' => 'LBL_PRICING_FORMULA',
	    ),
    ),
    
    array (
      array('name'=>'description','label'=> 'LBL_DESCRIPTION'),
    ),
  ),
)


);
?>
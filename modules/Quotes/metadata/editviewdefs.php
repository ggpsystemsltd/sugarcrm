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

$viewdefs['Quotes']['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30')
                                            ),
                            'form' => array('footerTpl'=>'modules/Quotes/tpls/EditViewFooter.tpl'),
                           ),
    'panels' => array (
	  'lbl_quote_information' => array (
	    array (
	      'name',
	      'opportunity_name',
	    ),
	    
	    array (
	      array('name' => 'quote_num', 'type' => 'readonly', 'displayParams'=>array('required'=>false)),
	      'quote_stage',
	    ),
	    
	    array (
	      'purchase_order_num',
	      'date_quote_expected_closed',
	    ),
	    
	    array (
	      'payment_terms',
	      'original_po_date',
	    ),
	   
	  ),
	
	'lbl_bill_to' => array (
	    array (
	      array('name'=>'billing_account_name', 'displayParams'=>array('key'=>array('billing', 'shipping'), 'copy'=>array('billing', 'shipping'), 'billingKey'=>'billing', 'shippingKey'=>'shipping', 'copyPhone'=>false, 'call_back_function' => 'set_billing_return')),	
	      array('name'=>'shipping_account_name','displayParams'=>array('key'=>array('shipping'), 'copy'=>array('shipping'), 'shippingKey'=>'shipping', 'copyPhone'=>false, 'call_back_function' => 'set_shipping_return')),
	    ),
	    
	    array (
	      array('name'=>'billing_contact_name','displayParams' => array('initial_filter' => '&account_id_advanced="+this.form.{$fields.billing_account_name.id_name}.value+"&account_name_advanced="+this.form.{$fields.billing_account_name.name}.value+"'),),
	       array('name'=>'shipping_contact_name','displayParams' => array('initial_filter' => '&account_id_advanced="+this.form.{$fields.shipping_account_name.id_name}.value+"&account_name_advanced="+this.form.{$fields.shipping_account_name.name}.value+"'),),
	    ),
    ),
    'lbl_address_information' => array (
	    array (
	      array (
		      'name' => 'billing_address_street',
	          'hideLabel' => true,      
		      'type' => 'address',
		      'displayParams'=>array('key'=>'billing', 'rows'=>2, 'cols'=>30, 'maxlength'=>150),
	      ),
	      
	      array (
		      'name' => 'shipping_address_street',
		      'hideLabel'=>true,
		      'type' => 'address',
		      'displayParams'=>array('key'=>'shipping', 'copy'=>'billing', 'rows'=>2, 'cols'=>30, 'maxlength'=>150),      
	      ),
	    ),
    ),
    
    'LBL_PANEL_ASSIGNMENT' => array ( 
	    array (
	      'assigned_user_name',
	      array('name'=>'team_name','displayParams'=>array('required'=>true)),
	    ),    
    ),
)

);
?>
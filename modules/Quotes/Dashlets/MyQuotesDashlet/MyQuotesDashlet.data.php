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




global $current_user;

$dashletData['MyQuotesDashlet']['searchFields'] = array('quote_stage'             => array('default' => ''),
                                                       'name'             => array('default' => ''),
												       'date_quote_expected_closed'             => array('default' => ''),
                                                       //'date_modified'    => array('default' => ''),
                                                       'team_id'          => array('default' => '', 'label' => 'LBL_TEAMS'),
                                                       'assigned_user_id' => array('type'    => 'assigned_user_name',
																				   'label'   => 'LBL_ASSIGNED_TO',
                                                                                   'default' => $current_user->name));
$dashletData['MyQuotesDashlet']['columns'] = array('quote_num' => array(
		'width' => '10',  
		'label' => 'LBL_LIST_QUOTE_NUM', 
		'link' => false,
        'default' => true),
	'name' => array(
		'width' => '25', 
		'label' => 'LBL_LIST_QUOTE_NAME', 
		'link' => true,
        'default' => true),
	'billing_account_name' => array(
		'width' => '20',  
		'label' => 'LBL_LIST_ACCOUNT_NAME',
        'id' => 'ACCOUNT_ID',
        'module'  => 'Accounts',        
        'link' => true,
        'default' => true), 
	'quote_stage' => array(
		'width' => '10', 
		'label' => 'LBL_LIST_QUOTE_STAGE', 
        'link' => false,
        'default' => true        
	),
	'total_usdollar' => array(
		'width' => '10', 
		'label' => 'LBL_LIST_AMOUNT_USDOLLAR',
        'link' => false,
        'default' => true,
        'currency_format' => true,
        'align' => 'right'
    ),
	'date_quote_expected_closed' => array(
		'width' => '15', 
		'label' => 'LBL_LIST_DATE_QUOTE_EXPECTED_CLOSED',
        'link' => false,
        'default' => true        
        ),
    'quote_type' => array(
		'width' => '15', 
		'label' => 'LBL_QUOTE_TYPE',
        'link' => false,      
        ),
     'order_stage' => array(
		'width' => '15', 
		'label' => 'LBL_ORDER_STAGE',
        'link' => false,       
        ),
  'billing_address_street' =>
  array (
    'width' => '20', 
    'label' => 'LBL_BILLING_ADDRESS_STREET',
    'link' => false, 
  ),
  'billing_address_city' =>
  array (
     'width' => '20',
    'label' => 'LBL_BILLING_ADDRESS_CITY',
   'link' => false, 
  ),
  'billing_address_state' =>
  array (
     'width' => '20',
    'label' => 'LBL_BILLING_ADDRESS_STATE',
    'link' => false, 
  ),
  'billing_address_postalcode' =>
  array (
     'width' => '20',
    'label' => 'LBL_BILLING_ADDRESS_POSTAL_CODE',
    'link' => false, 
  ),
  'billing_address_country' =>
  array (
     'width' => '20',
    'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
    'link' => false, 
  ),
  'shipping_address_street' =>
  array (
    'width' => '20',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'link' => false, 
  ),
  'shipping_address_city' =>
  array (
     'width' => '20',
    'label' => 'LBL_SHIPPING_ADDRESS_CITY',
    'link' => false, 
  ),
  'shipping_address_state' =>
  array (
    'width' => '20',
    'label' => 'LBL_SHIPPING_ADDRESS_STATE',
    'link' => false, 
  ),
  'shipping_address_postalcode' =>
  array (
    'width' => '20',
    'label' => 'LBL_SHIPPING_ADDRESS_POSTAL_CODE',
   'link' => false, 
  ),
  'shipping_address_country' =>
  array (
     'width' => '20',
    'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
   'link' => false, 
  ),
);
?>

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

$module_name = '<module_name>';
$OBJECT_NAME = '<OBJECT_NAME>';
$listViewDefs[$module_name] = array(
	'NAME' => array(
		'width' => '40', 
		'label' => 'LBL_ACCOUNT_NAME', 
		'link' => true,
        'default' => true), 
	'BILLING_ADDRESS_CITY' => array(
		'width' => '10', 
		'label' => 'LBL_CITY',
        'default' => true 
		),
	'PHONE_OFFICE' => array(
		'width' => '10', 
		'label' => 'LBL_PHONE',
        'default' => true),
    $OBJECT_NAME . '_TYPE' => array(
        'width' => '10', 
        'label' => 'LBL_TYPE'),
    'INDUSTRY' => array(
        'width' => '10', 
        'label' => 'LBL_INDUSTRY'),
    'ANNUAL_REVENUE' => array(
        'width' => '10', 
        'label' => 'LBL_ANNUAL_REVENUE'),
    'PHONE_FAX' => array(
        'width' => '10', 
        'label' => 'LBL_PHONE_FAX'),
    'BILLING_ADDRESS_STREET' => array(
        'width' => '15', 
        'label' => 'LBL_BILLING_ADDRESS_STREET'),
    'BILLING_ADDRESS_STATE' => array(
        'width' => '7', 
        'label' => 'LBL_BILLING_ADDRESS_STATE'),
    'BILLING_ADDRESS_POSTALCODE' => array(
        'width' => '10', 
        'label' => 'LBL_BILLING_ADDRESS_POSTALCODE'),
    'BILLING_ADDRESS_COUNTRY' => array(
        'width' => '10', 
        'label' => 'LBL_BILLING_ADDRESS_COUNTRY'),
    'SHIPPING_ADDRESS_STREET' => array(
        'width' => '15', 
        'label' => 'LBL_SHIPPING_ADDRESS_STREET'),
    'SHIPPING_ADDRESS_CITY' => array(
        'width' => '10', 
        'label' => 'LBL_SHIPPING_ADDRESS_CITY'),
    'SHIPPING_ADDRESS_STATE' => array(
        'width' => '7', 
        'label' => 'LBL_SHIPPING_ADDRESS_STATE'),
    'SHIPPING_ADDRESS_POSTALCODE' => array(
        'width' => '10', 
        'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE'),
    'SHIPPING_ADDRESS_COUNTRY' => array(
        'width' => '10', 
        'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY'),
    'PHONE_ALTERNATE' => array(
        'width' => '10', 
        'label' => 'LBL_PHONE_ALT'),
    'WEBSITE' => array(
        'width' => '10', 
        'label' => 'LBL_WEBSITE'),
    'OWNERSHIP' => array(
        'width' => '10', 
        'label' => 'LBL_OWNERSHIP'),
    'EMPLOYEES' => array(
        'width' => '10', 
        'label' => 'LBL_EMPLOYEES'),
    'TICKER_SYMBOL' => array(
        'width' => '10', 
        'label' => 'LBL_TICKER_SYMBOL'),
   
    'TEAM_NAME' => array(
        'width' => '2', 
        'label' => 'LBL_TEAM',
        'default' => true),
    'ASSIGNED_USER_NAME' => array(
        'width' => '2', 
        'label' => 'LBL_ASSIGNED_USER',
        'default' => true),
   
);
?>

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




$listViewDefs['Products'] = array(
	'NAME' => array(
		'width' => '40', 
		'label' => 'LBL_LIST_NAME', 
		'link' => true,
        'default' => true),
    'ACCOUNT_NAME' => array(
        'width' => '20', 
        'label' => 'LBL_LIST_ACCOUNT_NAME',
        'id' => 'ACCOUNT_ID',
        'module'  => 'Accounts',        
        'link' => true,
        'default' => true,
        'ACLTag' => 'ACCOUNT',
        'related_fields' => array('account_id'),        
        'sortable' => true), 
    'STATUS' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_STATUS', 
        'link' => false,
        'default' => true),       
    'QUANTITY' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_QUANTITY', 
        'link' => false,
        'default' => true),          
    'DISCOUNT_USDOLLAR' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_DISCOUNT_PRICE', 
        'link' => false,
        'default' => true,
        'currency_format' => true,
        'align' => 'right'),  
	'LIST_USDOLLAR' =>
	  array (
	    'width' => '10', 
	    'label' => 'LBL_LIST_LIST_PRICE',
	    'link' => false,
        'default' => true,
        'currency_format' => true,
        'align' => 'right',
	  ),    
    'DATE_PURCHASED' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_DATE_PURCHASED', 
        'link' => false,
        'default' => true),   
    'DATE_SUPPORT_EXPIRES' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_SUPPORT_EXPIRES', 
        'link' => false,
        'default' => true),   
    'CATEGORY_NAME' => array (
        'type' => 'relate',
        'link' => 'product_categories_link',
        'label' => 'LBL_CATEGORY_NAME',
        'width' => '10%',
        'default' => false),
    'CONTACT_NAME' => array (
        'type' => 'relate',
        'link' => 'contact_link',
        'label' => 'LBL_CONTACT_NAME',
        'width' => '10%',
        'default' => false),
    'QUOTE_NAME' => array (
        'type' => 'relate',
        'link' => 'quotes',
        'label' => 'LBL_QUOTE_NAME',
        'width' => '10%',
        'default' => false),
    'TYPE_NAME' => array (
        'type' => 'varchar',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'default' => false),
    'SERIAL_NUMBER' => array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NUMBER',
        'width' => '10%',
        'default' => false),
    'TEAM_NAME' => array(
        'width' => '2', 
        'label' => 'LBL_LIST_TEAM',
        'default' => false),
	'DATE_ENTERED' =>  array (
	    'type' => 'datetime',
	    'label' => 'LBL_DATE_ENTERED',
	    'width' => '10',
	    'default' => true),
);
?>

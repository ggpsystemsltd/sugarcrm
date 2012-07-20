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


$popupMeta = array(
	'moduleMain' => 'Bug',
	'varName' => 'BUG',
	'orderBy' => 'bugs.name',
	'whereClauses' => array(
		'name' => 'bugs.name', 
		'bug_number' => 'bugs.bug_number'
	),
	'listviewdefs' => array(
		'BUG_NUMBER' => array(
			'width' => '5', 
			'label' => 'LBL_LIST_NUMBER', 
			'link' => true,
	        'default' => true), 
		'NAME' => array(
			'width' => '32', 
			'label' => 'LBL_LIST_SUBJECT', 
			'default' => true,
	        'link' => true),
	    'PRIORITY' => array(
	        'width' => '10', 
	        'label' => 'LBL_LIST_PRIORITY',
	        'default' => true),
		'STATUS' => array(
			'width' => '10', 
			'label' => 'LBL_LIST_STATUS',
	        'default' => true),
	    'TYPE' => array(
	        'width' => '10', 
	        'label' => 'LBL_LIST_TYPE',
	        'default' => true), 
	    'PRODUCT_CATEGORY' => array(
	        'width' => '10', 
	        'label' => 'LBL_PRODUCT_CATEGORY',
	        'default' => true), 
	    'ASSIGNED_USER_NAME' => array(
			'width' => '9', 
			'label' => 'LBL_LIST_ASSIGNED_USER',
	        'default' => true)
	      
	),
	'searchdefs'   => array(
	 	'bug_number', 
		'name', 
		'priority',
		'status',
		'type',
		'product_category',
		array('name' => 'assigned_user_id', 'type' => 'enum', 'label' => 'LBL_ASSIGNED_TO', 'function' => array('name' => 'get_user_array', 'params' => array(false))),
	)
);
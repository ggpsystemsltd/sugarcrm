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


global $mod_strings;

$popupMeta = array(
	'moduleMain' => 'Contact',
	'varName' => 'CONTACT',
	'orderBy' => 'contacts.first_name, contacts.last_name',
	'whereClauses' => 
		array('first_name' => 'contacts.first_name', 
				'last_name' => 'contacts.last_name',
				'account_name' => 'accounts.name',
				'account_id' => 'accounts.id'),
	'searchInputs' =>
		array('first_name', 'last_name', 'account_name', 'email'),
	'create' =>
		array('formBase' => 'ContactFormBase.php',
				'formBaseClass' => 'ContactFormBase',
				'getFormBodyParams' => array('','','ContactSave'),
				'createButton' => 'LNK_NEW_CONTACT'
			  ),
	'listviewdefs' => array(
		'NAME' => array(
			'width' => '20%', 
			'label' => 'LBL_LIST_NAME',
  			'link' => true,
	        'default' => true,
  			'related_fields' => array('first_name', 'last_name', 'salutation', 'account_name', 'account_id')), 
		'ACCOUNT_NAME' => array(
			'width' => '25', 
			'label' => 'LBL_LIST_ACCOUNT_NAME', 
			'module' => 'Accounts',
			'id' => 'ACCOUNT_ID',
  			'default' => true,
	        'sortable'=> true,
	        'ACLTag' => 'ACCOUNT',
	        'related_fields' => array('account_id')),
  		'TITLE' => array(
			'width' => '15%', 
			'label' => 'LBL_LIST_TITLE',
	        'default' => true), 
  		'LEAD_SOURCE' => array(
			'width' => '15%', 
			'label' => 'LBL_LEAD_SOURCE',
	        'default' => true), 
		),
	'searchdefs'   => array(
	 	'first_name', 
		'last_name', 
		array('name' => 'account_name', 'type' => 'varchar',),
		'title',
		'lead_source',
		'email',
		array('name' => 'campaign_name', 'displayParams' => array('hideButtons'=>'true', 'size'=>30, 'class'=>'sqsEnabled sqsNoAutofill')),
		array('name' => 'assigned_user_id', 'type' => 'enum', 'label' => 'LBL_ASSIGNED_TO', 'function' => array('name' => 'get_user_array', 'params' => array(false))),
	  )
	);
?>

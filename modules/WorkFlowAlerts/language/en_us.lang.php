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

/*********************************************************************************

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array (
  'LBL_MODULE_NAME' => 'Alert Recipient List',
  'LBL_MODULE_TITLE' => 'Recipients: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Workflow Recipient Search',
  'LBL_LIST_FORM_TITLE' => 'Recipient List',
  'LBL_NEW_FORM_TITLE' => 'Create Workflow Recipient',

  'LBL_LIST_USER_TYPE' => 'User Type',
  'LBL_LIST_ARRAY_TYPE' => 'Action Type',
  'LBL_LIST_RELATE_TYPE' => 'Relate Type',
  'LBL_LIST_ADDRESS_TYPE' => 'Address Type',
  'LBL_LIST_FIELD_VALUE' => 'User',
  'LBL_LIST_REL_MODULE1' => 'Related Module',
  'LBL_LIST_REL_MODULE2' => 'Related Related Module',
  'LBL_LIST_WHERE_FILTER' => 'Status',

  'LBL_USER_TYPE' => 'User Type:',
  'LBL_ARRAY_TYPE' => 'Action Type:',
  'LBL_RELATE_TYPE' => 'Relationship Type:',
  'LBL_WHERE_FILTER' => 'Status:',
  'LBL_FIELD_VALUE' => 'Selected User:',
  'LBL_REL_MODULE1' => 'Related Module:',
  'LBL_REL_MODULE2' => 'Related Related Module:',
  'LBL_CUSTOM_USER' => 'Custom User:',

  'LNK_NEW_WORKFLOW' => 'Create Workflow',
  'LNK_WORKFLOW' => 'Workflow Objects',
  'LBL_LIST_STATEMENT' => 'Alert Recipients:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Send alert to the following recipient: ',

  /////////New UI Labels

  'LBL_ALERT_CURRENT_USER' => 			'A user associated with the target ',
  'LBL_ALERT_CURRENT_USER_TITLE' =>		'A user associated with the target module',
  'LBL_ALERT_REL_USER' => 				'A user associated with a related ',
  'LBL_ALERT_REL_USER_TITLE' => 		'A user associated with a related module',
  'LBL_ALERT_REL_USER_CUSTOM' => 		'Recipient associated with a related ',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 	'Recipient associated with a related module',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 		'Recipient associated with the target module ',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 	'Recipient associated with the target module',
  'LBL_ALERT_SPECIFIC_USER' => 			'A specified ',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 	'A specified user',
  'LBL_ALERT_SPECIFIC_TEAM' => 			'All users in a specified ',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 	'All users in a specified team',
  'LBL_ALERT_SPECIFIC_ROLE' => 			'All users in a specified ',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 	'All users in a specified role',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 	'Members of the team associated with target module',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 	'All users that belong to the team(s) associated with the target module',
  'LBL_ALERT_LOGIN_USER_TITLE' => 		'Logged in user at time of execution',
  'LBL_RECORD' => 'Module',
  'LBL_TEAM' => 'Team',
  'LBL_USER' => 'User',
  'LBL_USER_MANAGER' => 'user\'s manager',
  'LBL_ROLE' => 'role',


  'LBL_SEND_EMAIL' => 'Send an email to: ',
  'LBL_USER1' => ' who created the record',
  'LBL_USER2' => ' who last modified the record',
  'LBL_USER3' => 'Current ',
  'LBL_USER3b' => ' of system.',
  'LBL_USER4' => ' who is assigned the record',
  'LBL_USER5' => ' who was assigned the record',

  'LBL_ADDRESS_TO' => 'to:',
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_ADDRESS_BCC' => 'bcc:',
  'LBL_ADDRESS_TYPE' => 'using address ',
  'LBL_ADDRESS_TYPE_TARGET' => 'type',


  'LBL_ALERT_REL1' => 'Related Module: ',
  'LBL_ALERT_REL2' => 'Related Related Module: ',

  'LBL_NEXT_BUTTON' => 'Next',
  'LBL_PREVIOUS_BUTTON' => 'Previous',

	'LBL_BLANK' => '',

	'NTC_REMOVE_ALERT_USER' => 'Are you sure you want to remove this alert recipient?',



	//rel_user_custom

	'LBL_REL_CUSTOM_STRING' => 'Select custom email and name fields',
	'LBL_REL_CUSTOM' => 'Select Custom Email Field: ',
	'LBL_REL_CUSTOM2' => 'Field ',
	'LBL_AND' => 'and Name Field:',
	'LBL_REL_CUSTOM3' => 'Field',
	'LBL_FILTER_CUSTOM' => '(Additional Filter) Filter related module by specific ',
	'LBL_FIELD' => 'Field',
	'LBL_SPECIFIC_FIELD' => 'field',
	'LBL_FILTER_BY' => '(Additional Filter) Filter related module by ',


	//Invite Labels
	  'LBL_MODULE_NAME_INVITE' => 'Invitee List',
	  'LBL_LIST_STATEMENT_INVITE' => 'Meeting/Call Invitees:',

	'LBL_SELECT_VALUE' => 'You must select a valid value.',
	'LBL_SELECT_NAME' => 'You must select a custom name field',
	'LBL_SELECT_EMAIL' => 'You must select a custom e-mail field',
	'LBL_SELECT_FILTER' => 'You must select a field to filter by',
	'LBL_SELECT_NAME_EMAIL' => 'You must select the name and e-mail fields',
	'LBL_PLEASE_SELECT' => 'Please Select',
	'LBL_EDITLAYOUT' => 'Edit Layout' /*for 508 compliance fix*/,
);


?>

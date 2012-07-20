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
	'LBL_BLANK'	=> ' ',

  'LBL_MODULE_NAME' => 'Calls',
  'LBL_MODULE_TITLE' => 'Calls: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Call Search',
  'LBL_LIST_FORM_TITLE' => 'Call List',
  'LBL_NEW_FORM_TITLE' => 'Create Appointment',
  'LBL_LIST_CLOSE' => 'Close',
  'LBL_LIST_SUBJECT' => 'Subject',
  'LBL_LIST_CONTACT' => 'Contact',
  'LBL_LIST_RELATED_TO' => 'Related to',
  'LBL_LIST_RELATED_TO_ID' => 'Related to ID',
  'LBL_LIST_DATE' => 'Start Date',
  'LBL_LIST_TIME' => 'Start Time',
  'LBL_LIST_DURATION' => 'Duration',
  'LBL_LIST_DIRECTION' => 'Direction',
  'LBL_SUBJECT' => 'Subject:',
  'LBL_REMINDER' => 'Reminder:',
  'LBL_CONTACT_NAME' => 'Contact:',
  'LBL_DESCRIPTION_INFORMATION' => 'Description Information',
  'LBL_DESCRIPTION' => 'Description:',
  'LBL_STATUS' => 'Status:',
  'LBL_DIRECTION' => 'Direction:',
  'LBL_DATE' => 'Start Date:',
  'LBL_DURATION' => 'Duration:',
  'LBL_DURATION_HOURS' => 'Duration Hours:',
  'LBL_DURATION_MINUTES' => 'Duration Minutes:',
  'LBL_HOURS_MINUTES' => '(hours/minutes)',
  'LBL_CALL' => 'Call:',
  'LBL_DATE_TIME' => 'Start Date & Time:',
  'LBL_TIME' => 'Start Time:',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_DEFAULT_STATUS' => 'Planned',
  'LNK_NEW_CALL' => 'Log Call',
  'LNK_NEW_MEETING' => 'Schedule Meeting',
  'LNK_CALL_LIST' => 'View Calls',
  'LNK_IMPORT_CALLS' => 'Import Calls',
  'ERR_DELETE_RECORD' => 'A record number must be specified to delete the account.',
  'NTC_REMOVE_INVITEE' => 'Are you sure you want to remove this invitee from the call?',
  'LBL_INVITEE' => 'Invitees',
  'LBL_RELATED_TO' => 'Related To:',
  'LNK_NEW_APPOINTMENT' => 'Create Appointment',
	'LBL_SCHEDULING_FORM_TITLE' => 'Scheduling',
  'LBL_ADD_INVITEE' => 'Add Invitees',
  'LBL_NAME' => 'Name',
  'LBL_FIRST_NAME' => 'First Name',
  'LBL_LAST_NAME' => 'Last Name',
  'LBL_EMAIL' => 'Email',
  'LBL_PHONE' => 'Phone',
  'LBL_REMINDER' => 'Reminder:',
  'LBL_SEND_BUTTON_TITLE'=>'Send Invites [Alt+I]',
  'LBL_SEND_BUTTON_KEY'=>'I',
  'LBL_SEND_BUTTON_LABEL'=>'Send Invites',
	'LBL_DATE_END'=>'Date End',
	'LBL_TIME_END'=>'Time End',
	'LBL_REMINDER_TIME'=>'Reminder Time',
   'LBL_SEARCH_BUTTON'=> 'Search',
  'LBL_ACTIVITIES_REPORTS' => 'Activities Report',    
   'LBL_ADD_BUTTON'=> 'Add',
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'Calls',
   'LBL_LOG_CALL'=> 'Log Call',
   'LNK_SELECT_ACCOUNT'=> 'Select Account',
   'LNK_NEW_ACCOUNT'=> 'New Account',
   'LNK_NEW_OPPORTUNITY'=> 'New Opportunity',
    'LBL_DEL' => 'Del',
    'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
    'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacts',
    'LBL_USERS_SUBPANEL_TITLE' => 'Users',
    'LBL_OUTLOOK_ID' => 'Outlook ID',
    'LBL_MEMBER_OF' => 'Member Of',
    'LBL_HISTORY_SUBPANEL_TITLE' => 'Notes',
   'LBL_LIST_ASSIGNED_TO_NAME' => 'Assigned to',
   'LBL_LIST_MY_CALLS' => 'My Calls',
   'LBL_SELECT_FROM_DROPDOWN' => 'Please make a selection from the Related To dropdown list first.',
	'LBL_ASSIGNED_TO_NAME' => 'Assigned to',
	'LBL_ASSIGNED_TO_ID' => 'Assigned User',
    'NOTICE_DURATION_TIME' => 'Duration time must be greater than 0',
    'LBL_CALL_INFORMATION' => 'Call Overview',
    'LBL_REMOVE' => 'rem',
   );


?>
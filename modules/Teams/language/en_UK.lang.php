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
	'ERR_ADD_RECORD' => 'You must specify a record number to add a user to this team.',
    'ERR_DUP_NAME' => 'Team Name already existed, please choose another one.',
	'ERR_DELETE_RECORD' => 'You must specify a record number to delete this team.',
    'ERR_INVALID_TEAM_REASSIGNMENT' => 'Error.  The selected team <b>({0})</b> is a team you have chosen to delete.  Please select another team.',

	'LBL_DESCRIPTION' => 'Description:',
	'LBL_GLOBAL_TEAM_DESC' => 'Globally Visible',
	'LBL_INVITEE' => 'Team Members',
	'LBL_LIST_DEPARTMENT' => 'Department',
	'LBL_LIST_DESCRIPTION' => 'Description',
	'LBL_LIST_FORM_TITLE' => 'Team List',
	'LBL_LIST_NAME' => 'Name',
    'LBL_FIRST_NAME' => 'First Name:',
    'LBL_LAST_NAME' => 'Last Name:',
	'LBL_LIST_REPORTS_TO' => 'Reports To',
	'LBL_LIST_TITLE' => 'Title',
	'LBL_MODULE_NAME' => 'Teams',
	'LBL_MODULE_TITLE' => 'Teams: Home',
	'LBL_NAME' => 'Team Name:',
    'LBL_NAME_2' => 'Team Name(2):',
    'LBL_PRIMARY_TEAM_NAME' => 'Primary Team Name',
	'LBL_NEW_FORM_TITLE' => 'New Team',
	'LBL_PRIVATE' => 'Private',
	'LBL_PRIVATE_TEAM_FOR' => 'Private team for: ',
	'LBL_SEARCH_FORM_TITLE' => 'Team Search',
	'LBL_TEAM_MEMBERS' => 'Team Members',
	'LBL_TEAM' => 'Teams:',
	'LBL_USERS_SUBPANEL_TITLE' => 'Users',
	'LBL_USERS'=>'Users',

    'LBL_REASSIGN_TEAM_TITLE' => 'There are records assigned to the following team(s): <b>{0}</b><br>Before deleting the team(s), you must first reassign these records to a new team.  Select a team to be used as the replacement.',   
    'LBL_REASSIGN_TEAM_BUTTON_KEY' => 'R',
    'LBL_REASSIGN_TEAM_BUTTON_LABEL' => 'Reassign',
    'LBL_REASSIGN_TEAM_BUTTON_TITLE' => 'Reassign [Alt+R]',	
    'LBL_CONFIRM_REASSIGN_TEAM_LABEL' => 'Proceed to update the affected records to use the new team?',
    'LBL_REASSIGN_TABLE_INFO' => 'Updating table {0}',
    'LBL_REASSIGN_TEAM_COMPLETED' => 'Operation has completed successfully.',    

    'LNK_LIST_TEAM' => 'Teams',
	'LNK_LIST_TEAMNOTICE' => 'Team Notices',
	'LNK_NEW_TEAM' => 'Create Team',

	'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Are you sure you want to remove this user\\\'s membership?',
);


?>
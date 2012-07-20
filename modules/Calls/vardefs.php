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

$dictionary['Call'] = array('table' => 'calls', 'comment' => 'A Call is an activity representing a phone call',
                               'unified_search' => true, 'unified_search_default_enabled' => true, 'fields' => array (

  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_SUBJECT',
    'dbType' => 'varchar',
    'type' => 'name',
    'len' => '50',
    'comment' => 'Brief description of the call',
    'unified_search' => true,
	'required'=>true,
    'importable' => 'required',
  ),

  'duration_hours' =>
  array (
    'name' => 'duration_hours',
    'vname' => 'LBL_DURATION_HOURS',
    'type' => 'int',
    'len' => '2',
    'comment' => 'Call duration, hours portion',
	'required' => true,
  ),
  'duration_minutes' =>
  array (
    'name' => 'duration_minutes',
    'vname' => 'LBL_DURATION_MINUTES',
    'type' => 'int',
    'function' => array('name'=>'getDurationMinutesOptions', 'returns'=>'html', 'include'=>'modules/Calls/CallHelper.php'),
    'len' => '2',
    'group'=>'duration_hours',
    'importable' => 'required',
    'comment' => 'Call duration, minutes portion'
  ),

   'date_start' =>
  array (
    'name' => 'date_start',
    'vname' => 'LBL_DATE',
    'type' => 'datetimecombo',
    'dbType' => 'datetime',
    'comment' => 'Date in which call is schedule to (or did) start',
    'importable' => 'required',
	'required' => true,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),

  'date_end' =>
  array (
    'name' => 'date_end',
    'vname' => 'LBL_DATE_END',
    'type' => 'datetimecombo',
	'dbType' => 'datetime',
    'massupdate'=>false,
    'comment' => 'Date is which call is scheduled to (or did) end',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),

 'parent_type'=>
  array(
  	'name'=>'parent_type',
  	'vname'=>'LBL_PARENT_TYPE',
    'type' => 'parent_type',
    'dbType'=>'varchar',
  	'required'=>false,
  	'group'=>'parent_name',
    'options'=> 'parent_type_display',
  	'len'=>255,
      'comment' => 'The Sugar object to which the call is related'
  	),

  'parent_name'=>
  array(
		'name'=> 'parent_name',
		'parent_type'=>'record_type_display' ,
		'type_name'=>'parent_type',
		'id_name'=>'parent_id',
        'vname'=>'LBL_LIST_RELATED_TO',
		'type'=>'parent',
		'group'=>'parent_name',
		'source'=>'non-db',
		'options'=> 'parent_type_display',
  ),
  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'len' => 100,
    'options' => 'call_status_dom',
    'comment' => 'The status of the call (Held, Not Held, etc.)',
	'required' => true,
	'importable' => 'required',
    'default' => 'Planned',
	'studio' => array('detailview'=>false)
  ),
  'direction' =>
  array (
    'name' => 'direction',
    'vname' => 'LBL_DIRECTION',
    'type' => 'enum',
    'len' => 100,
    'options' => 'call_direction_dom',
    'comment' => 'Indicates whether call is inbound or outbound'
  ),
  'parent_id'=>
  array(
  	'name'=>'parent_id',
  	'vname'=>'LBL_LIST_RELATED_TO_ID',
  	'type'=>'id',
  	'group'=>'parent_name',
		'reportable'=>false,
      'comment' => 'The ID of the parent Sugar object identified by parent_type'
  	),
   'reminder_checked'=>array(
    'name' => 'reminder_checked',
    'vname' => 'LBL_REMINDER',
    'type' => 'bool',
    'source' => 'non-db',
    'comment' => 'checkbox indicating whether or not the reminder value is set (Meta-data only)',
    'massupdate'=>false,
   ),

   'reminder_time'=>array (
    'name' => 'reminder_time',
    'vname' => 'LBL_REMINDER_TIME',
    'type' => 'int',
    'function' => array('name'=>'getReminderTime', 'returns'=>'html', 'include'=>'modules/Calls/CallHelper.php', 'onListView'=>true),
    'required' => false,
    'reportable' => false,
    'default' => -1,
    'len' => '4',
    'comment' => 'Specifies when a reminder alert should be issued; -1 means no alert; otherwise the number of seconds prior to the start'
  ),

  'outlook_id' =>
  array (
    'name' => 'outlook_id',
    'vname' => 'LBL_OUTLOOK_ID',
    'type' => 'varchar',
    'len' => '255',
    'reportable' => false,
    'comment' => 'When the Sugar Plug-in for Microsoft Outlook syncs an Outlook appointment, this is the Outlook appointment item ID'
  ),
  'accept_status' => array (
    'name' => 'accept_status',
    'vname' => 'LBL_ACCEPT_STATUS',
    'dbType' => 'varchar',
    'type' => 'varchar',
    'len' => '20',
    'source'=>'non-db',
  ),
  //bug 39559 
  'set_accept_links' => array (
    'name' => 'accept_status',
    'vname' => 'LBL_ACCEPT_LINK',
    'dbType' => 'varchar',
    'type' => 'varchar',
    'len' => '20',
    'source'=>'non-db',
  ),
  'contact_name' =>
  array (
    'name' => 'contact_name',
    'rname' => 'last_name',
    'db_concat_fields'=> array(0=>'first_name', 1=>'last_name'),
    'id_name' => 'contact_id',
    'massupdate' => false,
    'vname' => 'LBL_CONTACT_NAME',
    'type' => 'relate',
    'link'=>'contacts',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'join_name' => 'contacts',
    'dbType' => 'varchar',
    'source'=>'non-db',
    'len' => 36,
    'importable' => 'false',
    'studio' => array('required' => false, 'listview'=>true, 'visible' => false),
  ),
  'opportunities' =>
  array (
  	'name' => 'opportunities',
    'type' => 'link',
    'relationship' => 'opportunity_calls',
    'source'=>'non-db',
		'link_type'=>'one',
		'vname'=>'LBL_OPPORTUNITY',
  ),
  'leads' =>
  array (
    'name' => 'leads',
    'type' => 'link',
    'relationship' => 'calls_leads',
    'source'=>'non-db',
        'vname'=>'LBL_LEADS',
  ),
    // Bug #42619 Missed back-relation from Project module
    'project'=> array (
        'name' => 'project',
        'type' => 'link',
        'relationship' => 'projects_calls',
        'source' => 'non-db',
        'vname' => 'LBL_PROJECTS'
    ),
  'case' =>
  array (
  	'name' => 'case',
    'type' => 'link',
    'relationship' => 'case_calls',
    'source'=>'non-db',
		'link_type'=>'one',
		'vname'=>'LBL_CASE',
  ),
  'accounts' =>
  array (
    'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'account_calls',
    'module'=>'Accounts',
    'bean_name'=>'Account',
    'source'=>'non-db',
    'vname'=>'LBL_ACCOUNT',
  ),
  'contacts' =>
  array (
  	'name' => 'contacts',
    'type' => 'link',
    'relationship' => 'calls_contacts',
    'source'=>'non-db',
		'vname'=>'LBL_CONTACTS',
  ),
  'users' =>
  array (
  	'name' => 'users',
    'type' => 'link',
    'relationship' => 'calls_users',
    'source'=>'non-db',
		'vname'=>'LBL_USERS',
  ),
 'notes' =>
  array (
  	'name' => 'notes',
    'type' => 'link',
    'relationship' => 'calls_notes',
    'module'=>'Notes',
    'bean_name'=>'Note',
    'source'=>'non-db',
		'vname'=>'LBL_NOTES',
  ),
  'created_by_link' =>
  array (
        'name' => 'created_by_link',
    'type' => 'link',
    'relationship' => 'calls_created_by',
    'vname' => 'LBL_CREATED_BY_USER',
    'link_type' => 'one',
    'module'=>'Users',
    'bean_name'=>'User',
    'source'=>'non-db',
  ),
  'modified_user_link' =>
  array (
        'name' => 'modified_user_link',
    'type' => 'link',
    'relationship' => 'calls_modified_user',
    'vname' => 'LBL_MODIFIED_BY_USER',
    'link_type' => 'one',
    'module'=>'Users',
    'bean_name'=>'User',
    'source'=>'non-db',
  ),
  'assigned_user_link' =>
  array (
        'name' => 'assigned_user_link',
    'type' => 'link',
    'relationship' => 'calls_assigned_user',
    'vname' => 'LBL_ASSIGNED_TO_USER',
    'link_type' => 'one',
    'module'=>'Users',
    'bean_name'=>'User',
    'source'=>'non-db',
  ),
	'contact_id' => array(
		'name' => 'contact_id',
		'type' => 'id',
		'source' => 'non-db',
	),
),
'indices' => array (
	array(
		'name' => 'idx_call_name',
		'type' => 'index',
		'fields'=> array('name'),
	),
	array(
		'name' => 'idx_status',
		'type' => 'index',
		'fields'=> array('status'),
	),
    array(
        'name' => 'idx_calls_date_start',
        'type' => 'index',
        'fields' => array('date_start'),
    ),
    array (
    	'name' => 'idx_calls_par_del',
    	'type' => 'index',
    	'fields' => array('parent_id','parent_type','deleted')
    ),
    array(
        'name' =>'idx_calls_assigned_del',
        'type' =>'index',
        'fields'=>array( 'deleted', 'assigned_user_id')),
),
'relationships' => array (
		'calls_assigned_user' => array(
			'lhs_module'		=> 'Users',
			'lhs_table'			=> 'users',
			'lhs_key'			=> 'id',
			'rhs_module'		=> 'Calls',
			'rhs_table'			=> 'calls',
			'rhs_key'			=> 'assigned_user_id',
			'relationship_type'	=> 'one-to-many'
		),
		'calls_modified_user' => array(
			'lhs_module'		=> 'Users',
			'lhs_table'			=> 'users',
			'lhs_key'			=> 'id',
			'rhs_module'		=> 'Calls',
			'rhs_table'			=> 'calls',
			'rhs_key'			=> 'modified_user_id',
			'relationship_type'	=> 'one-to-many'
		),
		'calls_created_by' => array(
			'lhs_module'		=> 'Users',
			'lhs_table'			=> 'users',
			'lhs_key'			=> 'id',
			'rhs_module'		=> 'Calls',
			'rhs_table'			=> 'calls',
			'rhs_key'			=> 'created_by',
			'relationship_type'	=> 'one-to-many'
		),
		'calls_notes' => array(
			'lhs_module'		=> 'Calls',
			'lhs_table'			=> 'calls',
			'lhs_key'			=> 'id',
			'rhs_module'		=> 'Notes',
			'rhs_table'			=> 'notes',
			'rhs_key'			=> 'parent_id',
			'relationship_type'	=> 'one-to-many',
      'relationship_role_column'=>'parent_type',
      'relationship_role_column_value'=>'Calls',
		),
	),
//This enables optimistic locking for Saves From EditView
	'optimistic_locking'	=> true,
);

VardefManager::createVardef('Calls','Call', array('default', 'assignable',
'team_security',
));
?>

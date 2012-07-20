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


$dictionary['Case'] = array('table' => 'cases','audited'=>true, 'unified_search' => true, 'unified_search_default_enabled' => true, 'duplicate_merge'=>true,
		'comment' => 'Cases are issues or problems that a customer asks a support representative to resolve'
                               ,'fields' => array (


   'account_name' =>
  array (
    'name' => 'account_name',
    'rname' => 'name',
    'id_name' => 'account_id',
    'vname' => 'LBL_ACCOUNT_NAME',
    'type' => 'relate',
    'link'=>'accounts',
    'table' => 'accounts',
    'join_name'=>'accounts',
    'isnull' => 'true',
    'module' => 'Accounts',
    'dbType' => 'varchar',
    'len' => 100,
    'source'=>'non-db',
    'unified_search' => true,
    'comment' => 'The name of the account represented by the account_id field',
    'required' => true,
    'importable' => 'required',
  ),
   'account_name1' =>
  array (
    'name' => 'account_name1',
    'source'=>'non-db',
    'type'=>'text',
    'len' => 100,
    'importable' => 'false',
  ),

    'account_id'=>
  	array(
  	'name'=>'account_id',
  	'type' => 'relate',
  	'dbType' => 'id',
  	'rname' => 'id',
    'module' => 'Accounts',
    'id_name' => 'account_id',
    'reportable'=>false,
  	'vname'=>'LBL_ACCOUNT_ID',
  	'audited'=>true,
  	'massupdate' => false,
  	'comment' => 'The account to which the case is associated'
  	),

  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'options' => 'case_status_dom',
    'len' => 100,
    'audited'=>true,
    'comment' => 'The status of the case',
    'merge_filter' => 'enabled',

  ),
   'priority' =>
  array (
    'name' => 'priority',
    'vname' => 'LBL_PRIORITY',
    'type' => 'enum',
    'options' => 'case_priority_dom',
    'len' => 100,
    'audited'=>true,
    'comment' => 'The priority of the case',
    'merge_filter' => 'enabled',

  ),
  'resolution' =>
  array (
    'name' => 'resolution',
    'vname' => 'LBL_RESOLUTION',
    'type' => 'text',
    'comment' => 'The resolution of the case'
  ),


  'tasks' =>
  array (
  	'name' => 'tasks',
    'type' => 'link',
    'relationship' => 'case_tasks',
    'source'=>'non-db',
		'vname'=>'LBL_TASKS',
  ),
  'notes' =>
  array (
  	'name' => 'notes',
    'type' => 'link',
    'relationship' => 'case_notes',
    'source'=>'non-db',
		'vname'=>'LBL_NOTES',
  ),
  'meetings' =>
  array (
  	'name' => 'meetings',
    'type' => 'link',
    'relationship' => 'case_meetings',
    'bean_name'=>'Meeting',
    'source'=>'non-db',
		'vname'=>'LBL_MEETINGS',
  ),
  'emails' =>
  array (
  	'name' => 'emails',
    'type' => 'link',
    'relationship' => 'emails_cases_rel',/* reldef in emails */
    'source'=>'non-db',
		'vname'=>'LBL_EMAILS',
  ),
  'documents'=>
  array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_cases',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
  ),
  'calls' =>
  array (
  	'name' => 'calls',
    'type' => 'link',
    'relationship' => 'case_calls',
    'source'=>'non-db',
		'vname'=>'LBL_CALLS',
  ),
  'bugs' =>
  array (
  	'name' => 'bugs',
    'type' => 'link',
    'relationship' => 'cases_bugs',
    'source'=>'non-db',
		'vname'=>'LBL_BUGS',
  ),
  'contacts' =>
  array (
  	'name' => 'contacts',
    'type' => 'link',
    'relationship' => 'contacts_cases',
    'source'=>'non-db',
		'vname'=>'LBL_CONTACTS',
  ),
  'accounts' =>
  array (
  	'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'account_cases',
		'link_type'=>'one',
		'side'=>'right',
    'source'=>'non-db',
		'vname'=>'LBL_ACCOUNT',
  ),
	'project' =>
	array (
	    'name' => 'project',
	    'type' => 'link',
	    'relationship' => 'projects_cases',
	    'source'=>'non-db',
	    'vname'=>'LBL_PROJECTS',
	),

  ), 'indices' => array (
       /*
       array('name' =>'case_number' , 'type'=>'index' , 'fields'=>array('case_number')),
        */
       array('name' =>'case_number' , 'type'=>'unique' , 'fields'=>array('case_number', 'system_id')),

       array('name' =>'idx_case_name', 'type' =>'index', 'fields'=>array('name')),
       array( 'name' => 'idx_account_id', 'type' => 'index', 'fields'=> array('account_id')),
       array('name' => 'idx_cases_stat_del', 'type' => 'index', 'fields'=> array('assigned_user_id', 'status', 'deleted')),
                                                      )

, 'relationships' => array (
	'case_calls' => array('lhs_module'=> 'Cases', 'lhs_table'=> 'cases', 'lhs_key' => 'id',
							  'rhs_module'=> 'Calls', 'rhs_table'=> 'calls', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Cases')

	,'case_tasks' => array('lhs_module'=> 'Cases', 'lhs_table'=> 'cases', 'lhs_key' => 'id',
							  'rhs_module'=> 'Tasks', 'rhs_table'=> 'tasks', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Cases')

	,'case_notes' => array('lhs_module'=> 'Cases', 'lhs_table'=> 'cases', 'lhs_key' => 'id',
							  'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Cases')

	,'case_meetings' => array('lhs_module'=> 'Cases', 'lhs_table'=> 'cases', 'lhs_key' => 'id',
							  'rhs_module'=> 'Meetings', 'rhs_table'=> 'meetings', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Cases')

	,'case_emails' => array('lhs_module'=> 'Cases', 'lhs_table'=> 'cases', 'lhs_key' => 'id',
							  'rhs_module'=> 'Emails', 'rhs_table'=> 'emails', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Cases')
    ,
   'cases_assigned_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Cases', 'rhs_table'=> 'cases', 'rhs_key' => 'assigned_user_id',
   'relationship_type'=>'one-to-many')

   ,'cases_modified_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Cases', 'rhs_table'=> 'cases', 'rhs_key' => 'modified_user_id',
   'relationship_type'=>'one-to-many')

   ,'cases_created_by' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Cases', 'rhs_table'=> 'cases', 'rhs_key' => 'created_by',
   'relationship_type'=>'one-to-many')
)
//This enables optimistic locking for Saves From EditView
	,'optimistic_locking'=>true,
);
VardefManager::createVardef('Cases','Case', array('default', 'assignable',
'team_security',
'issue',
),
'case'
);

//jc - adding for refactor for import to not use the required_fields array
//defined in the field_arrays.php file
$dictionary['Case']['fields']['name']['importable'] = 'required';
?>
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

$dictionary['Bug'] = array('table' => 'bugs',    'audited'=>true, 'comment' => 'Bugs are defects in products and services','duplicate_merge'=>true
                               ,'unified_search' => true,'fields' => array (
  'found_in_release'=>
  	array(
  	'name'=>'found_in_release',
  	'type' => 'enum',
  	'function'=>'getReleaseDropDown',
  	'vname' => 'LBL_FOUND_IN_RELEASE',
  	'reportable'=>false,
  	//'merge_filter' => 'enabled', //bug 22994, I think the former fixing is just avoiding the cross table query, it is not a good method.
    'comment' => 'The software or service release that manifested the bug',
    'duplicate_merge' => 'disabled',
    'audited' =>true,
  	'studio' => array('fields' => 'false', 'listview' => false, 'wirelesslistview' => false ), // tyoung bug 16442 - don't show in studio fields list
    'massupdate' => true,
  	),
'release_name'=>
  array (
    'name' => 'release_name',
    'rname' => 'name',
    'vname'=>'LBL_FOUND_IN_RELEASE',
    'type' => 'relate',
    'dbType'=>'varchar',
	'group'=>'found_in_release',
    'reportable'=>false,
    'source'=>'non-db',
    'table'=>'releases',
    'merge_filter' => 'enabled', //bug 22994, we should use the release name to search, I have write codes to operate the cross table query. 
    'id_name'=>'found_in_release',
    'module'=>'Releases',
    'link' => 'release_link',
    'massupdate' => false,
	'studio' => array(
       'editview' => false, 
       'detailview' => false,
       'quickcreate' => false, 
       'basic_search' => false, 
       'advanced_search' => false,
	   //BEGIN SUGARCRM flav=pro
	   'wirelesseditview' => false,
	   'wirelessdetailview' => false,
	   'wirelesslistview' => 'visible',
	   'wireless_basic_search' => false,
	   'wireless_advanced_search' => false,
	   //END SUGARCRM flav=pro
	   ),
  ),

    'fixed_in_release'=>
  	array(
  	'name'=>'fixed_in_release',
  	'type' => 'enum',
  	'function'=>'getReleaseDropDown',
  	'vname' => 'LBL_FIXED_IN_RELEASE',
  	'reportable'=>false,
    'comment' => 'The software or service release that corrected the bug',
    'duplicate_merge' => 'disabled',
    'audited' =>true,
  	'studio' => array('fields' => 'false', 'listview' => false, 'wirelesslistview' => false), // tyoung bug 16442 - don't show in studio fields list
  	'massupdate' => true,
  	),
   'fixed_in_release_name'=>
  array (
    'name' => 'fixed_in_release_name',
    'rname' => 'name',
    'group'=>'fixed_in_release',
    'id_name' => 'fixed_in_release',
    'vname' => 'LBL_FIXED_IN_RELEASE',
    'type' => 'relate',
    'table' => 'releases',
    'isnull' => 'false',
    'massupdate' => false,
    'module' => 'Releases',
    'dbType' => 'varchar',
    'len' => 36,
    'source'=>'non-db',
    'link' => 'fixed_in_release_link',
	'studio' => array(
       'editview' => false, 
       'detailview' => false,
       'quickcreate' => false, 
       'basic_search' => false, 
       'advanced_search' => false,
       //BEGIN SUGARCRM flav=pro
       'wirelesseditview' => false,
       'wirelessdetailview' => false,
       'wirelesslistview' => 'visible',
       'wireless_basic_search' => false,
       'wireless_advanced_search' => false,
       //END SUGARCRM flav=pro
       ),
  ),
    'source' =>
  array (
    'name' => 'source',
    'vname' => 'LBL_SOURCE',
    'type' => 'enum',
    'options'=>'source_dom',
    'len' => 255,
    'comment' => 'An indicator of how the bug was entered (ex: via web, email, etc.)'
  ),
    'product_category' =>
  array (
    'name' => 'product_category',
    'vname' => 'LBL_PRODUCT_CATEGORY',
    'type' => 'enum',
    'options'=>'product_category_dom',
    'len' => 255,
    'comment' => 'Where the bug was discovered (ex: Accounts, Contacts, Leads)'
  ),


  'tasks' =>
  array (
  	'name' => 'tasks',
    'type' => 'link',
    'relationship' => 'bug_tasks',
    'source'=>'non-db',
		'vname'=>'LBL_TASKS'
  ),
  'notes' =>
  array (
  	'name' => 'notes',
    'type' => 'link',
    'relationship' => 'bug_notes',
    'source'=>'non-db',
		'vname'=>'LBL_NOTES'
  ),
  'meetings' =>
  array (
  	'name' => 'meetings',
    'type' => 'link',
    'relationship' => 'bug_meetings',
    'source'=>'non-db',
		'vname'=>'LBL_MEETINGS'
  ),
  'calls' =>
  array (
  	'name' => 'calls',
    'type' => 'link',
    'relationship' => 'bug_calls',
    'source'=>'non-db',
		'vname'=>'LBL_CALLS'
  ),
  'emails' =>
  array (
  	'name' => 'emails',
    'type' => 'link',
    'relationship' => 'emails_bugs_rel',/* reldef in emails */
    'source'=>'non-db',
		'vname'=>'LBL_EMAILS'
  ),
  'documents'=>
  array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
  ),
  'contacts' =>
  array (
  	'name' => 'contacts',
    'type' => 'link',
    'relationship' => 'contacts_bugs',
    'source'=>'non-db',
		'vname'=>'LBL_CONTACTS'
  ),
  'accounts' =>
  array (
  	'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'accounts_bugs',
    'source'=>'non-db',
		'vname'=>'LBL_ACCOUNTS'
  ),
  'cases' =>
  array (
  	'name' => 'cases',
    'type' => 'link',
    'relationship' => 'cases_bugs',
    'source'=>'non-db',
		'vname'=>'LBL_CASES'
  ),
  'project' =>
  array (
  	'name' => 'project',
        'type' => 'link',
        'relationship' => 'projects_bugs',
        'source'=>'non-db',
        'vname'=>'LBL_PROJECTS',
  ),
  'release_link' =>
  array (
        'name' => 'release_link',
    'type' => 'link',
    'relationship' => 'bugs_release',
    'vname' => 'LBL_FOUND_IN_RELEASE',
    'link_type' => 'one',
    'module'=>'Releases',
    'bean_name'=>'Release',
    'source'=>'non-db',
  ),
  'fixed_in_release_link' =>
  array (
        'name' => 'fixed_in_release_link',
    'type' => 'link',
    'relationship' => 'bugs_fixed_in_release',
    'vname' => 'LBL_FIXED_IN_RELEASE',
    'link_type' => 'one',
    'module'=>'Releases',
    'bean_name'=>'Release',
    'source'=>'non-db',
  ),

)
                                                      , 'indices' => array (
       /*
      array('name' =>'bug_number', 'type' =>'index', 'fields'=>array('bug_number')),
        */
       array('name' =>'bug_number', 'type' =>'unique', 'fields'=>array('bug_number', 'system_id')),

       array('name' =>'idx_bug_name', 'type' =>'index', 'fields'=>array('name')),

       array('name' => 'idx_bugs_assigned_user', 'type' => 'index', 'fields'=> array('assigned_user_id')),

                                                      )

, 'relationships' => array (
	'bug_tasks' => array('lhs_module'=> 'Bugs', 'lhs_table'=> 'bugs', 'lhs_key' => 'id',
							  'rhs_module'=> 'Tasks', 'rhs_table'=> 'tasks', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Bugs')
	,'bug_meetings' => array('lhs_module'=> 'Bugs', 'lhs_table'=> 'bugs', 'lhs_key' => 'id',
							  'rhs_module'=> 'Meetings', 'rhs_table'=> 'meetings', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Bugs')
	,'bug_calls' => array('lhs_module'=> 'Bugs', 'lhs_table'=> 'bugs', 'lhs_key' => 'id',
							  'rhs_module'=> 'Calls', 'rhs_table'=> 'calls', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Bugs')
	,'bug_emails' => array('lhs_module'=> 'Bugs', 'lhs_table'=> 'bugs', 'lhs_key' => 'id',
							  'rhs_module'=> 'Emails', 'rhs_table'=> 'emails', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Bugs')
	,'bug_notes' => array('lhs_module'=> 'Bugs', 'lhs_table'=> 'bugs', 'lhs_key' => 'id',
							  'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Bugs')

  ,'bugs_assigned_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Bugs', 'rhs_table'=> 'bugs', 'rhs_key' => 'assigned_user_id',
   'relationship_type'=>'one-to-many')

   ,'bugs_modified_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Bugs', 'rhs_table'=> 'bugs', 'rhs_key' => 'modified_user_id',
   'relationship_type'=>'one-to-many')

   ,'bugs_created_by' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Bugs', 'rhs_table'=> 'bugs', 'rhs_key' => 'created_by',
   'relationship_type'=>'one-to-many')
   ,'bugs_release' =>
   array('lhs_module'=> 'Releases', 'lhs_table'=> 'releases', 'lhs_key' => 'id',
   'rhs_module'=> 'Bugs', 'rhs_table'=> 'bugs', 'rhs_key' => 'found_in_release',
   'relationship_type'=>'one-to-many')
   ,'bugs_fixed_in_release' =>
   array('lhs_module'=> 'Releases', 'lhs_table'=> 'releases', 'lhs_key' => 'id',
   'rhs_module'=> 'Bugs', 'rhs_table'=> 'bugs', 'rhs_key' => 'fixed_in_release',
   'relationship_type'=>'one-to-many')

),         //This enables optimistic locking for Saves From EditView
	'optimistic_locking'=>true,
                            );

VardefManager::createVardef('Bugs','Bug', array('default', 'assignable',
'team_security',
'issue',
));

//jc - adding for refactor for import to not use the required_fields array
//defined in the field_arrays.php file
$dictionary['Bug']['fields']['name']['importable'] = 'required';

?>

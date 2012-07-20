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

$dictionary['Team'] = array ( 'table' => 'teams'
                                  , 'fields' => array (
  'id' => 
  array (
    'name' => 'id',
    'vname' => 'LBL_ID',
    'type' => 'id',
    'required'=>true,
    'reportable'=>true,
  ),
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_PRIMARY_TEAM_NAME',
    'type' => 'name',
    'dbType' => 'varchar',
    'len' => '128',
  ),
  'name_2' => 
  array (
    'name' => 'name_2',
    'vname' => 'LBL_NAME_2',
    'type' => 'name',
    'dbType' => 'varchar',
    'len' => '128',
    'reportable' => false,
  ),
  'associated_user_id' =>
   array (
	'name' => 'associated_user_id',
	'type' => 'id',
	'reportable'=>false,           
  ),
  'date_entered' => 
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_DATE_ENTERED',
    'type' => 'datetime',
    'required'=>true,
  ),
  'date_modified' => 
  array (
    'name' => 'date_modified',
    'vname' => 'LBL_DATE_MODIFIED',
    'type' => 'datetime',
    'required'=>true,
  ),
    'modified_user_id' => 
  array (
    'name' => 'modified_user_id',
    'rname' => 'user_name',
    'id_name' => 'modified_user_id',
    'vname' => 'LBL_ASSIGNED_TO',
    'type' => 'assigned_user_name',
    'table' => 'users',
    'isnull' => 'false',
    'dbType' => 'id',
    'reportable'=>true,
  ),
  'created_by' => 
  array (
    'name' => 'created_by',
    'rname' => 'user_name',
    'id_name' => 'modified_user_id',
    'vname' => 'LBL_ASSIGNED_TO',
    'type' => 'assigned_user_name',
    'table' => 'users',
    'isnull' => 'false',
    'dbType' => 'id',
    'reportable'=>true,
  ), 
  'private' => 
  array (
    'name' => 'private',
    'vname' => 'LBL_PRIVATE',
    'type' => 'bool',
    'default' => '0',
  ),
  'description' => 
  array (
    'name' => 'description',
    'vname' => 'LBL_DESCRIPTION',
    'type' => 'text',
  ),  
  'deleted' => 
  array (
    'name' => 'deleted',
    'vname' => 'LBL_DELETED',
    'type' => 'bool',
    'reportable'=>false,
    'required'=>false,
  ), 	   
  'users' => 
  array (
  	'name' => 'users',
    'type' => 'link',
    'relationship' => 'team_memberships',
    'source'=>'non-db',
	'vname'=>'LBL_USERS',
  ),
    'teams_sets' =>
    array (
        'name' => 'teams_sets',
        'type' => 'link',
        'relationship' => 'team_sets_teams',
        'link_type' => 'many',
        'side' => 'right',
        'source' => 'non-db',
        'vname' => 'LBL_TEAMS',
        'studio' => false,
        'duplicate_merge'=> 'disabled',
    ),
  
)   , 'indices' => array (
      array('name' =>'teamspk', 'type' =>'primary', 'fields'=>array('id')),
      array('name' =>'idx_team_del', 'type' =>'index', 'fields'=>array('name')),
      array('name' =>'idx_team_del_name', 'type' =>'index', 'fields'=>array('deleted','name'))
       )
);

$dictionary['TeamMembership'] = array(
	'table' => 'team_memberships',
	'fields' => array(
	 'id'=>
		array(
			'name' => 'id',
			'type' => 'id',
			'required' => true
		),
	'team_id'=>
		array(
			'name' => 'team_id', 
			'type' => 'id', 
		),
    'user_id'=>		
		array(
			'name' => 'user_id',
			'type' => 'id',
		),
	'explicit_assign'=>
		array(
			'name' => 'explicit_assign',
			'type' => 'bool',
			'len' => '1',
			'default' => 0,
			'required' => true
		),
'implicit_assign'=>		
		array(
			'name' => 'implicit_assign',
			'type' => 'bool', 
			'len' => '1', 
			'default' => '0',
			'required' => true
		),
'date_modified'=>		
		array(
			'name' => 'date_modified',
			'type' => 'datetime'
		),
'deleted'=>		
		array(
			'name' => 'deleted', 
			'type' => 'bool', 
			'len'=> '1', 
			'default'=> 0, 
		),
	),
	'indices' => array(
		array(
			'name' => 'team_membershipspk', 
			'type' => 'primary', 
			'fields' => array('id')
		),
		array(
			'name' => 'idx_team_membership', 
			'type' => 'index', 
			'fields' => array('user_id','team_id')
		),
		array(
			'name' => 'idx_teammemb_team_user', 
			'type' => 'alternate_key', 
			'fields' => array('team_id','user_id')
		)
	)
 	 , 'relationships' => array ('team_memberships' => array('lhs_module'=> 'Teams', 'lhs_table'=> 'teams', 'lhs_key' => 'id',
							  'rhs_module'=> 'Users', 'rhs_table'=> 'users', 'rhs_key' => 'id',
							  'relationship_type'=>'many-to-many',
							  'join_table'=> 'team_memberships', 'join_key_lhs'=>'team_id', 'join_key_rhs'=>'user_id'))
	
);
$dictionary['TeamSet'] = array(
	'table' => 'team_sets',
	'fields' => array(
	 'id'=>
		array(
			'name' => 'id',
			'type' => 'id',
			'required' => true
		),
	'name' => 
	  array (
	    'name' => 'name',
	    'vname' => 'LBL_NAME',
	    'type' => 'name',
	    'dbType' => 'varchar',
	    'len' => '128',
	  ),
	'team_md5' => 
	  array (
	    'name' => 'team_md5',
	    'vname' => 'LBL_NAME',
	    'type' => 'name',
	    'dbType' => 'varchar',
	    'len' => '32',
	  ),
	  'team_count' => 
	  array (
	    'name' => 'team_count',
	    'type' => 'int',
		'default' => 0,
	  ),
	 'primary_team_id'=>
		array(
			'name' => 'primary_team_id',
			'type' => 'id',
			'required' => true,
			'source' => 'non-db',
		),
	'date_modified'=>		
			array(
				'name' => 'date_modified',
				'type' => 'datetime'
			),
	'deleted'=>		
			array(
				'name' => 'deleted', 
				'type' => 'bool', 
				'len'=> '1', 
				'default'=> 0, 
			),
	'created_by' => 
	  array (
	    'name' => 'created_by',
	    'rname' => 'user_name',
	    'id_name' => 'modified_user_id',
	    'vname' => 'LBL_ASSIGNED_TO',
	    'type' => 'assigned_user_name',
	    'table' => 'users',
	    'isnull' => 'false',
	    'dbType' => 'id',
	    'reportable'=>true,
	  ), 
	'teams' =>
		array (
			'name' => 'teams',
			'type' => 'link',
			'relationship' => 'team_sets_teams',
			'link_type' => 'one',
			'source' => 'non-db',
			'vname' => 'LBL_ACCOUNT',
            'duplicate_merge'=> 'disabled',
		),
	),
	'indices' => array (
       array(
       		'name' =>'team_setspk', 
       		'type' =>'primary', 
       		'fields'=>array('id')
       ),
		array(
			'name' => 'idx_team_sets_md5', 
			'type' => 'index', 
			'fields' => array('team_md5')
		)
    ),
);

$dictionary['TeamSetModule'] = array(
	'table' => 'team_sets_modules',
	'fields' => array(
	 'id'=>
		array(
			'name' => 'id',
			'type' => 'id',
			'required' => true
		),
	'team_set_id' => 
	  array (
	    'name' => 'team_set_id',
	    'type' => 'id',
	  ),
	 'module_table_name' => 
	  array (
	    'name' => 'module_table_name',
	    'vname' => 'LBL_NAME',
	    'type' => 'name',
	    'dbType' => 'varchar',
	    'len' => '128',
	  ),
	  'deleted'=>		
			array(
				'name' => 'deleted', 
				'type' => 'bool', 
				'len'=> '1', 
				'default'=> 0, 
			),
	),	
	'indices' => array(
		array(
			'name' => 'team_sets_modulespk', 
			'type' => 'primary', 
			'fields' => array('id')
		),
		array(
			'name' => 'idx_team_sets_modules', 
			'type' => 'index', 
			'fields' => array('team_set_id')
		)
	)
);
?>

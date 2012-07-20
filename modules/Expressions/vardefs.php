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


$dictionary['Expression'] = array('table' => 'expressions', 'comment' => 'Used by Workflow for expression evaluations'
                               ,'fields' => array (
  'id' => 
  array (
    'name' => 'id',
    'vname' => 'LBL_NAME',
    'type' => 'id',
    'required' => true,
    'reportable'=>false,
    'comment' => 'Unique identifier'
  ),
   'deleted' => 
  array (
    'name' => 'deleted',
    'vname' => 'LBL_DELETED',
    'type' => 'bool',
    'required' => false,
    'default' => '0',
    'reportable'=>false,
    'comment' => 'Record deletion indicator'
  ),
   'date_entered' => 
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_DATE_ENTERED',
    'type' => 'datetime',
    'required' => true,
    'comment' => 'Date record created'
  ),
  'date_modified' => 
  array (
    'name' => 'date_modified',
    'vname' => 'LBL_DATE_MODIFIED',
    'type' => 'datetime',
    'required' => true,
    'comment' => 'Date record last modified'
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
    'comment' => 'User who last modified record'
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
    'comment' => 'User who created record'
  ),
  
  
    'lhs_type' => 
  array (
    'name' => 'lhs_type',
    'vname' => 'LBL_SIDE_TYPE',
    'type' => 'enum',
    'options' => 'exp_side_type_dom',
    'len'=>15,
    'comment' => 'Left-hand-side expression type'
  ),  
  'lhs_field' => 
  array (
    'name' => 'lhs_field',
    'vname' => 'LBL_LHS_FIELD',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'Field used in left-hand-side of expression'
  ),
    'lhs_module' => 
  array (
    'name' => 'lhs_module',
    'vname' => 'LBL_LHS_MODULE',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'Module used in left-hand-side of expression'
  ),
    'lhs_value' => 
  array (
    'name' => 'lhs_value',
    'vname' => 'LBL_LHS_VALUE',
    'type' => 'varchar',
    'len' => '100',
    'comment' => 'Value used in left-hand-side of expression'
  ),
      
  
   'lhs_group_type' => 
  array (
    'name' => 'lhs_group_type',
    'vname' => 'LBL_GROUP_TYPE',
    'type' => 'enum',
    'options' => 'exp_group_type_dom',
    'len'=>10,
    'comment' => ''
  ),  
  'operator' => 
  array (
    'name' => 'operator',
    'vname' => 'LBL_OPERATOR',
    'type' => 'varchar',
    'len' => '15',
    'comment' => 'The expression operator (ex:  =, >, < )'
     ),  
   'rhs_group_type' => 
  array (
    'name' => 'rhs_group_type',
    'vname' => 'LBL_GROUP_TYPE',
    'type' => 'enum',
    'options' => 'exp_group_type_dom',
    'len'=>10,
    'comment' => ''
  ),  
  
 
  
    'rhs_type' => 
  array (
    'name' => 'rhs_type',
    'vname' => 'LBL_SIDE_TYPE',
    'type' => 'enum',
    'options' => 'exp_side_type_dom',
    'len'=>15,
    'comment' => 'Right-hand-side expression type'
  ),  
  'rhs_field' => 
  array (
    'name' => 'rhs_field',
    'vname' => 'LBL_RHS_FIELD',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'Field used in right-hand-side of expression'
  ),
    'rhs_module' => 
  array (
    'name' => 'rhs_module',
    'vname' => 'LBL_RHS_MODULE',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'Module used in right-hand-side of expression'
  ),
    'rhs_value' => 
  array (
    'name' => 'rhs_value',
    'vname' => 'LBL_RHS_VALUE',
    'type' => 'varchar',
    'len' => '255',
    'comment' => 'Value used in right-hand-side of expression'
  ),  
  

    'parent_id' => 
  array (
    'name' => 'parent_id',
    'type' => 'id',
    'required' => true,
    'reportable'=>false,
    'comment' => 'The parent record ID identified by parent_type'
  ),   
  'exp_type' => 
  array (
    'name' => 'exp_type',
    'vname' => 'LBL_FILTER_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'query_filter_type_dom',
    'len' => 100,
    'comment' => 'Expression type'
  ),
    'exp_order' => 
  array (
    'name' => 'exp_order',
    'vname' => 'LBL_EXP_ORDER',
    'type' => 'int',
    'len' => '4',
    'comment' => 'The expression evaluation order'
  ),
  
  'parent_type' => 
  array (
    'name' => 'parent_type',
    'type' => 'varchar',
    'len' => '255',
    'reportable'=>false,
    'comment' => 'The parent type which determines module containing parent_id'
  ),

  
  'parent_exp_id' => 
  array (
    'name' => 'parent_exp_id',
    'type' => 'id',
    'required' => false,
    'reportable'=>false,
    'comment' => 'The parent expression of this expression'
  ),
  'parent_exp_side' => 
  array (
    'name' => 'parent_exp_side',
    'vname' => 'LBL_PARENT_EXP_SIDE',
    'type' => 'int',
    'len' => '8',
    'comment' => ''
      ),

      
    'ext1' => 
  array (
    'name' => 'ext1',
    'vname' => 'LBL_OPTION',
    'type' => 'varchar',
    'len' => '50',
    'comment' => ''
  ),
    'ext2' => 
  array (
    'name' => 'ext2',
    'vname' => 'LBL_OPTION',
    'type' => 'varchar',
    'len' => '50',
    'comment' => ''
  ),
    'ext3' => 
  array (
    'name' => 'ext3',
    'vname' => 'LBL_OPTION',
    'type' => 'varchar',
    'len' => '50',
    'comment' => ''
  ),  
  
  
  'members' => 
  array (
  	'name' => 'members',
    'type' => 'link',
    'relationship' => 'member_expressions',
    'module'=>'Expressions',
    'bean_name'=>'Expression',
    'source'=>'non-db',
		'vname'=>'LBL_MEMBERS',
  ),

  
)
                                                      , 'indices' => array (
       array('name' =>'exp_k', 'type' =>'primary', 'fields'=>array('id')),
       array('name' =>'idx_exp', 'type'=>'index', 'fields'=>array('parent_id','deleted')),
                                                      )
                                                      
, 'relationships' => array (
	'member_expressions' => array('lhs_module'=> 'Expressions', 'lhs_table'=> 'expressions', 'lhs_key' => 'id',
							  'rhs_module'=> 'Expressions', 'rhs_table'=> 'expressions', 'rhs_key' => 'parent_exp_id',	
							  'relationship_type'=>'one-to-many')
                                                      
    )                                                  
 );
?>

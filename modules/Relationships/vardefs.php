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

$dictionary['Relationship'] =

	array('table' => 'relationships'
         ,'fields' => array (
  			'id' =>
  			array (
    			'name' => 'id',
    			'vname' => 'LBL_ID',
    			'type' => 'id',
    			'required'=>true,
  			),

  			'relationship_name' =>
  			array (
    			'name' => 'relationship_name',
    			'vname' => 'LBL_RELATIONSHIP_NAME',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 150,
    			'importable' => 'required',
  			),
  			'lhs_module' =>
  			array (
    			'name' => 'lhs_module',
    			'vname' => 'LBL_LHS_MODULE',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 100
  			),
  			'lhs_table' =>
  			array (
    			'name' => 'lhs_table',
    			'vname' => 'LBL_LHS_TABLE',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 64
  			),
  			'lhs_key' =>
  			array (
    			'name' => 'lhs_key',
    			'vname' => 'LBL_LHS_KEY',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 64
  			),
  			'rhs_module' =>
  			array (
    			'name' => 'rhs_module',
    			'vname' => 'LBL_RHS_MODULE',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 100
  			),
  			'rhs_table' =>
  			array (
    			'name' => 'rhs_table',
    			'vname' => 'LBL_RHS_TABLE',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 64
  			),
  			'rhs_key' =>
  			array (
    			'name' => 'rhs_key',
    			'vname' => 'LBL_RHS_KEY',
    			'type' => 'varchar',
    			'required'=>true,
    			'len' => 64
  			),
  			'join_table' =>
  			array (
    			'name' => 'join_table',
    			'vname' => 'LBL_JOIN_TABLE',
    			'type' => 'varchar',
    			'len' => 64
  			),
  			'join_key_lhs' =>
  			array (
    			'name' => 'join_key_lhs',
    			'vname' => 'LBL_JOIN_KEY_LHS',
    			'type' => 'varchar',
    			'len' => 64
  			),
  			'join_key_rhs' =>
  			array (
    			'name' => 'join_key_rhs',
    			'vname' => 'LBL_JOIN_KEY_RHS',
    			'type' => 'varchar',
    			'len' => 64
  			),
  			'relationship_type' =>
  			array (
    			'name' => 'relationship_type',
    			'vname' => 'LBL_RELATIONSHIP_TYPE',
    			'type' => 'varchar',
    			'len' => 64
  			),
  			'relationship_role_column' =>
  			array (
    			'name' => 'relationship_role_column',
    			'vname' => 'LBL_RELATIONSHIP_ROLE_COLUMN',
    			'type' => 'varchar',
    			'len' => 64
  			),
  			'relationship_role_column_value' =>
  			array (
    			'name' => 'relationship_role_column_value',
    			'vname' => 'LBL_RELATIONSHIP_ROLE_COLUMN_VALUE',
    			'type' => 'varchar',
    			'len' => 50
  			),
  			'reverse' =>
  			array (
    			'name' => 'reverse',
    			'vname' => 'LBL_REVERSE',
    			'type' => 'bool',
    			'default' => '0'
  			),
  		 	'deleted' =>
  			array (
    			'name' => 'deleted',
    			'vname' => 'LBL_DELETED',
    			'type' => 'bool',
    			'reportable'=>false,
    			'default' => '0'
  			),

	)
	, 'indices' => array (
       array('name' =>'relationshippk', 'type' =>'primary', 'fields'=>array('id')),
       array('name' =>'idx_rel_name', 'type' =>'index', 'fields'=>array('relationship_name')),
    )
);


?>

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


$dictionary['WorkFlowTriggerShell'] = array('table' => 'workflow_triggershells'
                               ,'fields' => array (
  'id' => 
  array (
    'name' => 'id',
    'vname' => 'LBL_NAME',
    'type' => 'id',
    'required' => true,
    'reportable'=>false,
  ),
   'deleted' => 
  array (
    'name' => 'deleted',
    'vname' => 'LBL_DELETED',
    'type' => 'bool',
    'required' => false,
    'default' => '0',
    'reportable'=>false,
  ),
   'date_entered' => 
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_DATE_ENTERED',
    'type' => 'datetime',
    'required' => true,
  ),
  'date_modified' => 
  array (
    'name' => 'date_modified',
    'vname' => 'LBL_DATE_MODIFIED',
    'type' => 'datetime',
    'required' => true,
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
    'dbType' => 'id'
  ),
    'field' => 
  array (
    'name' => 'field',
    'vname' => 'LBL_FIELD',
    'type' => 'varchar',
    'len' => '50',
  ),
  'type' => 
  array (
    'name' => 'type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'wflow_type_dom',
    'len' => 100,
  ),
    'frame_type' => 
  array (
    'name' => 'frame_type',
    'vname' => 'LBL_FRAME_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'wflow_frame_type_dom',
    'len'=>15,
  ),
    'eval' => 
  array (
    'name' => 'eval',
    'vname' => 'LBL_EVAL',
    'type' => 'text',
  ),
   'parent_id' => 
  array (
    'name' => 'parent_id',
    'type' => 'id',
    'required' => true,
    'reportable'=>false,
  ),
     'show_past' => 
  array (
    'name' => 'show_past',
    'vname' => 'LBL_SHOW_PAST',
    'type' => 'bool',
    'default' => '0',
  ),
    'rel_module' => 
  array (
    'name' => 'rel_module',
    'vname' => 'LBL_REL_MODULE',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
  ),  
    'rel_module_type' => 
  array (
    'name' => 'rel_module_type',
    'vname' => 'LBL_RELATED_TYPE',
    'type' => 'enum',
    'options' => 'wflow_relfilter_type_dom',
    'len'=>10,
  ),  
      'parameters' => 
  array (
    'name' => 'parameters',
    'vname' => 'LBL_EXT1',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
  ),
    'past_triggers' => 
  array (
  	'name' => 'past_triggers',
    'type' => 'link',
    'relationship' => 'past_triggers',
    'module'=>'Expressions',
    'bean_name'=>'Expression',
    'source'=>'non-db',
  ),
      'future_triggers' => 
  array (
  	'name' => 'future_triggers',
    'type' => 'link',
    'relationship' => 'future_triggers',
    'module'=>'Expressions',
    'bean_name'=>'Expression',
    'source'=>'non-db',
  ),
      'expressions' => 
  array (
  	'name' => 'expressions',
    'type' => 'link',
    'relationship' => 'trigger_expressions',
    'module'=>'Expressions',
    'bean_name'=>'Expression',
    'source'=>'non-db',
  ), 
)
                                                      , 'indices' => array (
       array('name' =>'triggershell_k', 'type' =>'primary', 'fields'=>array('id')),

                                                      )
, 'relationships' => array (
		'past_triggers' => array('lhs_module'=> 'WorkFlowTriggerShells', 'lhs_table'=> 'workflow_triggershells', 'lhs_key' => 'id',
							  'rhs_module'=> 'Expressions', 'rhs_table'=> 'expressions', 'rhs_key' => 'parent_id',	
							  'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'past_trigger', 'relationship_type'=>'one-to-many'),
							  
		'future_triggers' => array('lhs_module'=> 'WorkFlowTriggerShells', 'lhs_table'=> 'workflow_triggershells', 'lhs_key' => 'id',
							  'rhs_module'=> 'Expressions', 'rhs_table'=> 'expressions', 'rhs_key' => 'parent_id',	
							  'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'future_trigger', 'relationship_type'=>'one-to-many'),								  	
 
		'trigger_expressions' => array('lhs_module'=> 'WorkFlowTriggerShells', 'lhs_table'=> 'workflow_triggershells', 'lhs_key' => 'id',
							  'rhs_module'=> 'Expressions', 'rhs_table'=> 'expressions', 'rhs_key' => 'parent_id',	
							  'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'expression', 'relationship_type'=>'one-to-many')								  	
  )                                                      
                                                     
 );
?>

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

$dictionary['WorkFlow'] = array('table' => 'workflow'
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
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_NAME',
    'type' => 'varchar',
    'len' => '50',
  ),
    'base_module' => 
  array (
    'name' => 'base_module',
    'vname' => 'LBL_BASE_MODULE',
    'type' => 'varchar',
    'len' => '50',
  ),
   'status' => 
  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'bool',
    'default' => '0',
  ),
  'description' => 
  array (
    'name' => 'description',
    'vname' => 'LBL_DESCRIPTION',
    'type' => 'text',
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
  'fire_order' => 
  array (
    'name' => 'fire_order',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'wflow_fire_order_dom',
    'len' => 100,
  ),  
  'parent_id' => 
  array (
    'name' => 'parent_id',
    'vname' => 'LBL_PARENT_ID',
    'type' => 'id',
    'required' => false,
    'reportable'=>false,
  ),  
  'record_type' => 
  array (
    'name' => 'record_type',
    'vname' => 'LBL_RECORD_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'wflow_record_type_dom',
    'len' => 100,
  ),  
  'list_order_y' => 
  array (
    'name' => 'list_order_y',
    'vname' => 'LBL_LISTORDER_Y',
    'type' => 'int',
    'len' => '3',
    'default' => '0',
  ),
  	'triggers' => 
  array (
  	'name' => 'triggers',
    'type' => 'link',
    'relationship' => 'workflow_triggers',
    'module'=>'WorkFlowTriggerShells',
    'bean_name'=>'WorkFlowTriggerShell',
    'source'=>'non-db',
  ),
  	'trigger_filters' => 
  array (
  	'name' => 'trigger_filters',
    'type' => 'link',
    'relationship' => 'workflow_trigger_filters',
    'module'=>'WorkFlowTriggerShells',
    'bean_name'=>'WorkFlowTriggerShell',
    'source'=>'non-db',
  ),  
   	'alerts' => 
  array (
  	'name' => 'alerts',
    'type' => 'link',
    'relationship' => 'workflow_alerts',
    'module'=>'WorkFlowAlertShells',
    'bean_name'=>'WorkFlowAlertShell',
    'source'=>'non-db',
  ),
    'actions' => 
  array (
  	'name' => 'actions',
    'type' => 'link',
    'relationship' => 'workflow_actions',
    'module'=>'WorkFlowActionShells',
    'bean_name'=>'WorkFlowActionShell',
    'source'=>'non-db',
  ),
  
)
  , 'indices' => array (
       array('name' =>'workflow_k', 'type' =>'primary', 'fields'=>array('id')),
       array('name' =>'idx_workflow', 'type'=>'index', 'fields'=>array('name','deleted')),
                                                      )

, 'relationships' => array (
		'workflow_triggers' => array('lhs_module'=> 'WorkFlow', 'lhs_table'=> 'workflow', 'lhs_key' => 'id',
							  'rhs_module'=> 'WorkFlowTriggerShells', 'rhs_table'=> 'workflow_triggershells', 'rhs_key' => 'parent_id',	
							  'relationship_role_column'=>'frame_type',
							  'relationship_role_column_value'=>'Primary', 'relationship_type'=>'one-to-many'),
	'workflow_trigger_filters' => array('lhs_module'=> 'WorkFlow', 'lhs_table'=> 'workflow', 'lhs_key' => 'id',
							  'rhs_module'=> 'WorkFlowTriggerShells', 'rhs_table'=> 'workflow_triggershells', 'rhs_key' => 'parent_id',	
							  'relationship_role_column'=>'frame_type',
							  'relationship_role_column_value'=>'Secondary', 'relationship_type'=>'one-to-many'),
		'workflow_alerts' => array('lhs_module'=> 'WorkFlow', 'lhs_table'=> 'workflow', 'lhs_key' => 'id',
							  'rhs_module'=> 'WorkFlowAlertShells', 'rhs_table'=> 'workflow_alertshells', 'rhs_key' => 'parent_id',	
							  'relationship_type'=>'one-to-many'),
		'workflow_actions' => array('lhs_module'=> 'WorkFlow', 'lhs_table'=> 'workflow', 'lhs_key' => 'id',
							  'rhs_module'=> 'WorkFlowActionShells', 'rhs_table'=> 'workflow_actionshells', 'rhs_key' => 'parent_id',	
							  'relationship_type'=>'one-to-many')							  	
  )
  
                                                      
                            );
?>

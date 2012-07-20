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

$dictionary['WorkFlowAlertShell'] = array('table' => 'workflow_alertshells'
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
  'alert_text' => 
  array (
    'name' => 'alert_text',
    'vname' => 'LBL_DESCRIPTION',
    'type' => 'text',
  ),
  'alert_type' => 
  array (
    'name' => 'alert_type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'wflow_alert_type_dom',
    'len' => 100,
  ),
   'source_type' => 
  array (
    'name' => 'source_type',
    'vname' => 'LBL_SOURCE_TYPE',
    'type' => 'enum',
    'required' => true,
    'options' => 'wflow_source_type_dom',
    'len' => 100,
  ),
   'parent_id' => 
  array (
    'name' => 'parent_id',
    'type' => 'id',
    'required' => true,
    'reportable'=>false,
  ),
   'custom_template_id' => 
  array (
    'name' => 'custom_template_id',
    'type' => 'id',
    'required' => false,
    'reportable'=>false,
  ),
    'alert_components' => 
  array (
  	'name' => 'alert_components',
    'type' => 'link',
    'relationship' => 'alert_components',
    'module'=>'WorkFlowAlerts',
    'bean_name'=>'WorkFlowAlert',
    'source'=>'non-db',
  ),
'parent_base_module' => 
  array (
  	'name' => 'base_module',
    'vname' => 'LBL_BASE_MODULE',
    'type' => 'varchar',
    'source'=>'non-db',
  ),
  'parent_type' => 
  array (
    'name' => 'parent_type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'options' => 'wflow_type_dom',
    'source'=>'non-db',
  ),
  
)
  , 'indices' => array (
       array('name' =>'workflowalertshell_k', 'type' =>'primary', 'fields'=>array('id')),
       array('name' =>'idx_workflowalertshell', 'type'=>'index', 'fields'=>array('name','deleted')),
                                                      )

, 'relationships' => array (
		'alert_components' => array('lhs_module'=> 'WorkFlowAlertShells', 'lhs_table'=> 'workflow_alertshells', 'lhs_key' => 'id',
							  'rhs_module'=> 'WorkFlowAlerts', 'rhs_table'=> 'workflow_alerts', 'rhs_key' => 'parent_id',	
							  'relationship_type'=>'one-to-many')	
  )
  
                                                      
                            );
?>

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

$dictionary['Holiday'] = array('table' => 'holidays'
                               ,'fields' => array (
  'id' =>
  array (
    'name' => 'id',
    'vname' => 'LBL_ID',
    'required'=>true,
    'type' => 'id',
    'reportable'=>false,
  ),
   'date_entered' =>
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_DATE_ENTERED',
    'type' => 'datetime',
    'required'=>true
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
    'vname' => 'LBL_MODIFIED',
    'type' => 'assigned_user_name',
    'table' => 'modified_user_id_users',
    'isnull' => 'false',
    'dbType' => 'id',
    'required'=> false,
    'len' => 36,
    'reportable'=>true,
  ),
    'created_by' =>
  array (
    'name' => 'created_by',
    'rname' => 'user_name',
    'id_name' => 'created_by',
    'vname' => 'LBL_CREATED',
    'type' => 'assigned_user_name',
    'table' => 'created_by_users',
    'isnull' => 'false',
    'dbType' => 'id',
    'len' => 36,
  ),
   'holiday_date' =>
  array (
    'name' => 'holiday_date',
    'type' => 'date',
    'vname' => 'LBL_HOLIDAY_DATE',
    'required' => true,
    'importable' => 'required',
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
  ),
  'person_id' =>
  array (
  	'name' => 'person_id',
    'type' => 'id',
    'vname' => 'LBL_PERSON_ID',
  ),
  'person_type' =>
  array (
  	'name' => 'person_type',
    'type' => 'varchar',
    'vname' => 'LBL_PERSON_TYPE',
  ),
  'related_module' =>
  array (
    'name' => 'related_module',
    'type' => 'varchar',
    'vname' => 'LBL_RELATED_MODULE',
  ),
  'related_module_id' =>
  array (
    'name' => 'related_module_id',
    'type' => 'id',
    'vname' => 'LBL_RELATED_MODULE_ID',
  ),
  'resource_name' =>
  array (
    'name' => 'resource_name',
    'type' => 'varchar',
    'vname' => 'LBL_RESOURCE_NAME',
  ),
),
  'indices' =>
  array (
    array('name' =>'holidayspk', 'type' =>'primary', 'fields'=>array('id')),
    array('name' =>'idx_holiday_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
    array('name' =>'idx_holiday_id_rel', 'type' =>'index', 'fields'=>array('related_module_id', 'related_module')),
  )
);

?>

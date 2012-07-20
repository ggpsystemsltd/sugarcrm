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

$dictionary['ForecastSchedule'] = array('table' => 'forecast_schedule',
'acl_fields'=>false
                               ,'fields' => array (
  'id' => 
  array (
    'name' => 'id',
    'vname' => 'LB_FS_KEY',
    'type' => 'id',
    'required'=>true,
    'reportable'=>false,
    'comment' => 'Unique identifier',
  ),
  
  'timeperiod_id' => 
  array (
    'name' => 'timeperiod_id',
    'vname' => 'LBL_FS_TIMEPERIOD_ID',
    'type' => 'id',
    'reportable'=>false,
    'comment' => 'ID of the associated time period for this forecast schedule',
  ),
 
  'user_id' => 
  array (
    'name' => 'user_id',
    'vname' => 'LBL_FS_USER_ID',
    'type' => 'id',
    'reportable'=>false,
    'comment' => 'User to which this forecast schedule pertains',
  ),

  'cascade_hierarchy' => 
  array (
    'name' => 'cascade_hierarchy',
    'vname' => 'LBL_FS_CASCADE',
    'type' => 'bool',
    'comment' => 'Flag indicating if a forecast for a manager is propagated to his reports',
  ),

  'forecast_start_date' => 
  array (
    'name' => 'forecast_start_date',
    'vname' => 'LBL_FS_FORECAST_START_DATE',
    'type' => 'date',
    'comment' => 'Starting date for this forecast',
  ),
  
 'status' => 
  array (
    'name' => 'status',
    'vname' => 'LBL_FS_STATUS',
    'type' => 'enum',
    'len' => 100,
    'options' => 'forecast_schedule_status_dom',
	'comment' => 'Status of this forecast',        
  ),

 'created_by' => 
  array (
    'name' => 'created_by',
    'vname' => 'LBL_FS_CREATED_BY',
    'type' => 'varchar',
    'len' => '36',
    'comment' => 'User name who created record',
  ),
  
  'date_entered' => 
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_FS_DATE_ENTERED',
    'type' => 'datetime',
    'comment' => 'Date record created',
  ),
  
  'date_modified' => 
  array (
    'name' => 'date_modified',
    'vname' => 'LBL_FS_DATE_MODIFIED',
    'type' => 'datetime',
    'comment' => 'Date record modified',
  ),
  
  'deleted' => 
  array (
    'name' => 'deleted',
    'vname' => 'LBL_FS_DELETED',
    'type' => 'bool',
    'reportable'=>false,
    'comment' => 'Record deletion indicator',
  ),  
 )
, 'indices' => array (
       array('name' =>'forecastschedulepk', 'type' =>'primary', 'fields'=>array('id'))
       )
);
?>

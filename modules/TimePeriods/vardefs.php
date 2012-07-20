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

$dictionary['TimePeriod'] = array('table' => 'timeperiods'
                               ,'fields' => array (
  'id' =>
  array (
    'name' => 'id',
    'vname' => 'LBL_NAME',
    'type' => 'varchar',
    'len' => '36',
    'required'=>true,
    'reportable'=>false,
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_TP_NAME',
    'type' => 'varchar',
    'len' => '36',
    'isnull' => 'false',
    'importable' => 'required',
  ),
  'parent_id' =>
  array (
    'name' => 'parent_id',
    'vname' => 'LBL_PARENT_ID',
    'type' => 'id',
    'id_name' => 'id',
    'table' => 'timeperiods',
    'reportable'=>false,
  ),
  'start_date' =>
  array (
    'name' => 'start_date',
    'vname' => 'LBL_TP_START_DATE',
    'type' => 'date',
    'isnull' => 'false',
    'importable' => 'required',
  ),
  'end_date' =>
  array (
    'name' => 'end_date',
    'vname' => 'LBL_TP_END_DATE',
    'type' => 'date',
    'isnull' => 'false',
    'importable' => 'required',
  ),
  'created_by' =>
  array (
    'name' => 'created_by',
    'vname' => 'LBL_CREATED_BY',
    'type' => 'varchar',
    'len' => '36',
  ),
  'date_entered' =>
  array (
    'name' => 'date_entered',
    'vname' => 'LBL_DATE_ENTERED',
    'type' => 'datetime',
  ),
'date_modified' =>
  array (
    'name' => 'date_modified',
    'vname' => 'LBL_DATE_MODIFIED',
    'type' => 'datetime',
  ),
'deleted' =>
  array (
    'name' => 'deleted',
    'vname' => 'LBL_DELETED',
    'type' => 'bool',
    'reportable'=>false,
  ),
 'is_fiscal_year' =>
  array (
    'name' => 'is_fiscal_year',
    'vname' => 'LBL_TP_IS_FISCAL_YEAR',
    'type' => 'bool',
  ),
  'forecast_schedules' =>
  array (
  	'name' => 'forecast_schedules',
    'type' => 'link',
    'relationship' => 'timeperiod_forecast_schedules',
    'source'=>'non-db',
  ),
  'related_timeperiods' =>
  array (
  	'name' => 'related_timeperiods',
    'type' => 'link',
    'relationship' => 'related_timeperiods',
    'source'=>'non-db',
  ),

 )
, 'indices' => array (
       array('name' =>'timeperiodspk', 'type' =>'primary', 'fields'=>array('id'))
  )
, 'relationships' => array (
	'timeperiod_forecast_schedules' => array('lhs_module'=> 'TimePeriods', 'lhs_table'=> 'timeperiods', 'lhs_key' => 'id',
							  'rhs_module'=> 'Forecasts', 'rhs_table'=> 'forecast_schedule', 'rhs_key' => 'timeperiod_id',
							  'relationship_type'=>'one-to-many'),
	'related_timeperiods' => array('lhs_module'=> 'TimePeriods', 'lhs_table'=> 'timeperiods', 'lhs_key' => 'id',
							  'rhs_module'=> 'TimePeriods', 'rhs_table'=> 'timeperiods', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many')


  )
);
?>

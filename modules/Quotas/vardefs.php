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

 $dictionary['Quota'] =
 	array(
		'table' => 'quotas',
 		'fields' => array(

	'id' =>
	array (
	  'name' => 'id',
	  'vname' => 'LBL_NAME',
	  'type' => 'id',
	  'required' => true,
	  'reportable' => false,
	),

	'user_id' =>
	array (
	  'name' => 'user_id',
	  'rname' => 'user_name',
	  'vname' => 'LBL_USER_ID',
	  'type' => 'assigned_user_name',
	  'table' => 'users',
	  'required' => false,
	  'isnull' => false,
	  'reportable' => false,
	  'dbType' => 'id',
	  'importable' => 'required',
	),

	'assigned_user_id' =>
	array (
	  'name' => 'user_id',
	  'rname' => 'user_name',
	  'vname' => 'LBL_ASSIGNED_USER_ID',
	  'type' => 'assigned_user_name',
	  'table' => 'users',
	  'required' => true,
	  'reportable' => false,
	  'source' => 'non-db',
	),

	'user_name' =>
	array (
		'name' => 'user_name',
		'vname' => 'LBL_USER_NAME',
		'type' => 'varchar',
		'reportable' => false,
		'source' => 'non-db',
		'table' => 'users',
	),

	'user_full_name' =>
	array (
		'name' => 'user_full_name',
		'vname' => 'LBL_USER_FULL_NAME',
		'type' => 'varchar',
		'reportable' => false,
		'source' => 'non-db',
		'table' => 'users',
	),

	'timeperiod_id' =>
	array (
	  'name' => 'timeperiod_id',
	  'vname' => 'LBL_TIMEPERIOD_ID',
	  'type' => 'id',
	  'required' => true,
	  'reportable' => false,
	),

  	'quota_type' =>
 	 array (
    	'name' => 'quota_type',
    	'vname' => 'LBL_QUOTA_TYPE',
    	'type' => 'enum',
    	'len' => 100,
    	'massupdate' => false,
    	'options' => 'forecast_type_dom',
  ),

	'amount' =>
	array (
	  'name' => 'amount',
	  'vname' => 'LBL_AMOUNT',
	  'type' => 'int',
	  'required' => true,
	  'reportable' => false,
	  'importable' => 'required',
	),

	'amount_base_currency' =>
	array (
	  'name' => 'amount_base_currency',
	  'vname' => 'LBL_AMOUNT_BASE_CURRENCY',
	  'type' => 'int',
	  'required' => true,
	  'reportable' => false,
	),

	'currency_id' =>
	array (
	  'name' => 'currency_id',
	  'vname' => 'LBL_CURRENCY',
	  'type' => 'id',
	  'required' => true,
	  'reportable' => false,
	  'importable' => 'required',
	),
  	'currency_symbol' =>
  	array (
    	'name' => 'currency_symbol',
    	'vname' => 'LBL_LIST_SYMBOL',
    	'type' => 'varchar',
    	'len' => '36',
    	'source' => 'non-db',
		'table' => 'currency',
     	'required' => true,
  ),

	'committed' =>
	array (
	  'name' => 'committed',
	  'vname' => 'LBL_COMMITTED',
	  'type' => 'bool',
	  'default' => '0',
	  'required' => false,
	  'reportable' => false,
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



    		),	//ends "fields" array

	'indices' => array(
       	  array('name' =>'quotaspk', 'type' =>'primary', 'fields'=>array('id'))
	)


);

?>

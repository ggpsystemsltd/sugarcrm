<?php
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

$dictionary['SugarFavorites'] = array(
	'table'=>'sugarfavorites',
	'audited'=>false,
	'fields'=>array (
  'module' => 
  array (
    'required' => false,
    'name' => 'module',
    'vname' => 'LBL_MODULE',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '50',
  ),
  'record_id' => 
  array (
    'required' => false,
    'name' => 'record_id',
    'vname' => 'LBL_RECORD_ID',
    'type' => 'parent_type',
    'dbType'=>'varchar',
  	'required'=>false,
  	'group'=>'record_name',
    'options'=> 'parent_type_display',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '36',
  ),
  'record_name'=>
  array(
		'name'=> 'record_name',
		'parent_type'=>'record_type_display' ,
		'type_name'=>'module',
		'id_name'=>'record_id',
        'vname'=>'LBL_LIST_RELATED_TO',
		'type'=>'parent',
		'group'=>'record_name',
		'source'=>'non-db',
		'options'=> 'parent_type_display',
  ),
    'description' => 
  array (
    'name' => 'description',
    'type' => 'name',
    'dbType' => 'varchar',
    'vname' => 'LBL_NAME',
    'len' => 50,
    'comment' => 'Name of the feed',
    'unified_search' => false,
    'audited' => false,
   
  ),
),
	'relationships'=>array (
),
    'indices' => array(
        array(
            'name' => 'idx_favs_date_entered', 
            'type'=>'index',
            'fields'=>array('date_entered','deleted'),
          ),
        array(
            'name' => 'idx_favs_user_module', 
            'type'=>'index',
            'fields'=>array('modified_user_id','module','deleted'),
          ),
        array(
            'name' => 'idx_favs_module_record_deleted', 
            'type'=>'index',
            'fields'=>array('module','record_id','deleted'),
          ),
        array(
        	'name' => 'idx_favs_id_record_id',
        	'type' => 'index',
        	'fields' => array('record_id', 'id')
          ),
        ),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('SugarFavorites','SugarFavorites', array('basic','assignable'));
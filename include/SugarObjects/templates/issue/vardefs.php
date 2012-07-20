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

$vardefs = array (
	'fields' => array (
		$_object_name . '_number' => array (
			'name' => $_object_name . '_number',
			'vname' => 'LBL_NUMBER',
			'type' => 'int',
            'readonly' => true,
			'len' => 11,
			'required' => true,
			'auto_increment' => true,
			'unified_search' => true,
			'comment' => 'Visual unique identifier',
			'duplicate_merge' => 'disabled',
			'disable_num_format' => true,
		),

		'name' => array (
			'name' => 'name',
			'vname' => 'LBL_SUBJECT',
			'type' => 'name',
			'link' => true, // bug 39288 
			'dbType' => 'varchar',
			'len' => 255,
			'audited' => true,
			'unified_search' => true,
			'comment' => 'The short description of the bug',
			'merge_filter' => 'selected',
			'required'=>true,
            'importable' => 'required',
			
		),
		  'type' => 
  array (
    'name' => 'type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'options' => strtolower($object_name) . '_type_dom',
    'len'=>255,
    'comment' => 'The type of issue (ex: issue, feature)',
    'merge_filter' => 'enabled',
  ),

		'status' => array (
			'name' => 'status',
			'vname' => 'LBL_STATUS',
			'type' => 'enum',
			'options' => strtolower($object_name) . '_status_dom',
			'len' => 100,
			'audited' => true,
			'comment' => 'The status of the issue',
			'merge_filter' => 'enabled',
			
		),

		'priority' => array (
			'name' => 'priority',
			'vname' => 'LBL_PRIORITY',
			'type' => 'enum',
			'options' => strtolower($object_name) . '_priority_dom',
			'len' => 100,
			'audited' => true,
			'comment' => 'An indication of the priorty of the issue',
			'merge_filter' => 'enabled',
			
		),

		'resolution' => array (
			'name' => 'resolution',
			'vname' => 'LBL_RESOLUTION',
			'type' => 'enum',
			'options' => strtolower($object_name) . '_resolution_dom',
			'len' => 255,
			'audited' => true,
			'comment' => 'An indication of how the issue was resolved',
			'merge_filter' => 'enabled',
			
		),

	'system_id' => array (
			'name' => 'system_id',
			'vname' => 'LBL_SYSTEM_ID',
			'type' => 'int',
			'comment' => 'The offline client device that created the bug'
		),


			//not in cases.
	'work_log' => array (
			'name' => 'work_log',
			'vname' => 'LBL_WORK_LOG',
			'type' => 'text',
			'comment' => 'Free-form text used to denote activities of interest'
		),

		
	),
	'indices'=>array(
		 'number'=>array('name' =>strtolower($module).'numk', 'type' =>'unique', 'fields'=>array($_object_name . '_number'))
	),
	
);
?>
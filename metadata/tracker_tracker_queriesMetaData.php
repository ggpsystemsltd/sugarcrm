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

$dictionary['tracker_tracker_queries'] = array ( 
'table' => 'tracker_tracker_queries', 
'fields' => array (
      'id'=>array('name' => 'id', 'vname' => 'LBL_ID', 'type' => 'int', 'len' => '11', 'isnull' => 'false', 'auto_increment' => true, 'reportable'=>false),      
      'monitor_id'=>array('name' =>'monitor_id', 'type' =>'varchar', 'len'=>'36'),
      'query_id'=>array('name' =>'query_id', 'type' =>'varchar', 'len'=>'36'),
      'date_modified'=>array ('name' => 'date_modified','type' => 'datetime')
),
'indices' => array (
      array('name' =>'tracker_tracker_queriespk', 'type' =>'primary', 'fields'=>array('id')),
      array('name' =>'idx_tracker_tq_monitor', 'type' =>'index', 'fields'=>array('monitor_id')),
      array('name' =>'idx_tracker_tq_query', 'type' =>'index', 'fields'=>array('query_id')),
), 
'relationships' => array (
	'tracker_tracker_queries' => array(
	    'lhs_module'=> 'Trackers', 'lhs_table'=> 'tracker', 'lhs_key' => 'monitor_id',
		'rhs_module'=> 'TrackerQueries', 'rhs_table'=> 'tracker_queries', 'rhs_key' => 'query_id',
		'relationship_type'=>'many-to-many',
		'join_table'=> 'tracker_tracker_queries', 'join_key_lhs'=>'monitor_id', 'join_key_rhs'=>'query_id'
	 )
)
);                              

?>
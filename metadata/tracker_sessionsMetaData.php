<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

$dictionary['tracker_sessions'] = array(
    'table' => 'tracker_sessions',
    'fields' => array(
        'id'=>array(
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'int',
            'len' => '11',
            'reportable' => true,            
            'isnull' => 'false',
            'auto_increment' => true,
        ),       
        'session_id'=>array(
            'name' => 'session_id',
            'vname' => 'LBL_SESSION_ID',
            'type' => 'varchar',
            'len' => '36',
            'isnull' => 'false',
        ),   
        'date_start'=>array(
            'name' => 'date_start',
            'vname' => 'LBL_DATE_START',
            'type' => 'datetime',
            'isnull' => 'false',
        ),
        'date_end'=>array(
            'name' => 'date_end',
            'vname' => 'LBL_DATE_LAST_ACTION',
            'type' => 'datetime',
            'isnull' => 'false',
        ),
        'seconds'=>array (
            'name' => 'seconds',
            'vname' => 'LBL_SECONDS',
            'type' => 'int',
            'len' => '9',
            'isnull' => 'false',
            'default' => '0',
        ) ,        
        'client_ip'=>array(
            'name' => 'client_ip',
            'vname' => 'LBL_CLIENT_IP',
            'type' => 'varchar',
            'len' => '20',
            'isnull' => 'false',
        ),
        'user_id'=>array(
            'name' => 'user_id',
            'vname' => 'LBL_USER_ID',
            'type' => 'varchar',
            'len' => '36',
            'isnull' => 'false',
        ),             
        'active'=>array (
            'name' => 'active',
            'vname' => 'LBL_ACTIVE',
            'type' => 'bool',
            'default' => '1',
        ),
        'round_trips'=>array(
            'name' => 'round_trips',
            'vname' => 'LBL_ROUNDTRIPS',
            'type' => 'int',
            'len' => '5',
            'isnull' => 'false',
        ),
	    'deleted' =>array (
		    'name' => 'deleted',
		    'vname' => 'LBL_DELETED',
		    'type' => 'bool',
		    'default' => '0',
		    'reportable'=>false,
		    'comment' => 'Record deletion indicator'
		),
		'assigned_user_link'=>array (
		    'name' => 'assigned_user_link',
		    'type' => 'link',
		    'relationship' => 'tracker_user_id',
		    'vname' => 'LBL_ASSIGNED_TO_USER',
		    'link_type' => 'one',
		    'module'=>'Users',
		    'bean_name'=>'User',
		    'source'=>'non-db',
		),		        
    ),
    //indices
    'indices' => array(
        array(
            'name' => 'tracker_sessions_pk',
            'type' => 'primary',
            'fields' => array(
                'id'
            )
        ),
        array(
            'name' => 'idx_tracker_sessions_s_id',
            'type' => 'index',
            'fields' => array(
                'session_id',
            ),
        ),
        array(
            'name' => 'idx_tracker_sessions_uas_id',
            'type' => 'index',
            'fields' => array(
                'user_id', 'active', 'session_id'
            ), 
        )    
    ),    
    //relationships
 	'relationships' => array (
	  'tracker_user_id' =>
		   array(
				'lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
		   		'rhs_module'=> 'TrackerSessions', 'rhs_table'=> 'tracker', 'rhs_key' => 'user_id',
		   		'relationship_type'=>'one-to-many'
		   )
   	),          
);
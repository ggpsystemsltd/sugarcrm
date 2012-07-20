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

$dictionary['tracker_queries'] = array(
    'table' => 'tracker_queries',
    'fields' => array(
        'id'=>array(
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'int',
            'len' => '11',
            'reportable' => true,
            'isnull' => 'false',
            'auto_increment' => true
        ),
	    'query_id'=>array (
		    'name' => 'query_id',
		    'vname' => 'LBL_QUERY_ID',
		    'type' => 'id',
		    'required'=>true,
		    'reportable'=>false,
	    ),
        'text'=>array(
            'name' => 'text',
            'vname' => 'LBL_SQL_TEXT',
            'type' => 'text',
            'isnull' => 'false',
        ),
        'query_hash'=>array(
            'name' => 'query_hash',
            'vname' => 'LBL_QUERY_HASH',
            'type' => 'varchar',
            'len' => '36',
            'reportable' => false,
            'isnull' => 'false',
        ),
        'sec_total'=>array(
            'name' => 'sec_total',
            'vname' => 'LBL_SEC_TOTAL',
            'type' => 'float',
            'dbType' => 'double',
            'isnull' => 'false',
        ),
        'sec_avg'=>array(
            'name' => 'sec_avg',
            'vname' => 'LBL_SEC_AVG',
            'type' => 'float',
            'dbType' => 'double',
            'isnull' => 'false',
        ),
        'run_count'=>array(
            'name' => 'run_count',
            'vname' => 'LBL_RUN_COUNT',
            'type' => 'int',
            'len' => '6',
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
        'date_modified'=>array(
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'isnull' => 'false',
        ),
    ) ,
    'indices' => array(
        array(
            'name' => 'tracker_queries_pk',
            'type' => 'primary',
            'fields' => array(
                'id'
            )
        ),

        array(
            'name' =>'idx_tracker_queries_query_hash',
            'type' =>'index',
            'fields'=>array(
                'query_hash'
       	    )
        ),
          array(
            'name' =>'idx_tracker_queries_query_id',
            'type' =>'index',
            'fields'=>array(
                'query_id'
       	    )
        )

    )
);
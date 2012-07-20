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

$dictionary['EmailMan'] = 
array( 'table' => 'emailman', 'comment' => 'Email campaign queue', 'fields' => array(
	'date_entered' => array(
		'name' => 'date_entered',
		'vname' => 'LBL_DATE_ENTERED',
		'type' => 'datetime',
		'comment' => 'Date record created',
	),
	'date_modified' => array(
		'name' => 'date_modified',
		'vname' => 'LBL_DATE_MODIFIED',
		'type' => 'datetime',
		'comment' => 'Date record last modified',
	),
	'user_id' => array(
		'name' => 'user_id',
		'vname' => 'LBL_USER_ID',
		'type' => 'id','len' => '36',
		'reportable' =>false,
		'comment' => 'User ID representing assigned-to user',
	),
  	'id' => 
  	array (
    	'name' => 'id',
    	'vname' => 'LBL_ID',
    	'type' => 'int',
    	'len' => '11',
    	'auto_increment'=>true,
    	'comment' => 'Unique identifier',
  	),	
	'campaign_id' => array(
		'name' => 'campaign_id',
		'vname' => 'LBL_CAMPAIGN_ID',
		'type' => 'id',
		'reportable' =>false,
		'comment' => 'ID of related campaign',
	),
	'marketing_id' => array(
		'name' => 'marketing_id',
		'vname' => 'LBL_MARKETING_ID',
		'type' => 'id',
		'reportable' =>false,
		'comment' => '',
	),
	'list_id' => array(
		'name' => 'list_id',
		'vname' => 'LBL_LIST_ID',
		'type' => 'id',
		'reportable' =>false,
		'len' => '36',
		'comment' => 'Associated list',
	),
	'send_date_time' => array(
		'name' => 'send_date_time' ,
		'vname' => 'LBL_SEND_DATE_TIME',
		'type' => 'datetime',
	),
	'modified_user_id' => array(
		'name' => 'modified_user_id',
		'vname' => 'LBL_MODIFIED_USER_ID',
		'type' => 'id',
		'reportable' =>false,
		'len' => '36',
		'comment' => 'User ID who last modified record',
	),
	'in_queue' => array(
		'name' => 'in_queue',
		'vname' => 'LBL_IN_QUEUE',
		'type' => 'bool',
        'default' => '0',
		'comment' => 'Flag indicating if item still in queue',
	),
	'in_queue_date' => array(
		'name' => 'in_queue_date',
		'vname' => 'LBL_IN_QUEUE_DATE',
		'type' => 'datetime',
		'comment' => 'Datetime in which item entered queue',
	),
	'send_attempts' => array(
		'name' => 'send_attempts',
		'vname' => 'LBL_SEND_ATTEMPTS',
		'type' => 'int',
		'default' => '0',
		'comment' => 'Number of attempts made to send this item',
	),
	'deleted' => array(
		'name' => 'deleted',
		'vname' => 'LBL_DELETED',
		'type' => 'bool',
		'reportable' =>false,
		'comment' => 'Record deletion indicator',
                'default' => '0',
	),
	'related_id' => array(
		'name' => 'related_id',
		'vname' => 'LBL_RELATED_ID',
		'type' => 'id',
		'reportable' =>false,
		'comment' => 'ID of Sugar object to which this item is related',
	),
	'related_type' => array(
		'name' => 'related_type' ,
		'vname' => 'LBL_RELATED_TYPE',
		'type' => 'varchar',
		'len' => '100',
		'comment' => 'Descriptor of the Sugar object indicated by related_id',
	),
	'recipient_name' => array(
		'name' => 'recipient_name',
		'type' => 'varchar',
		'len' => '255',
		'source'=>'non-db',
	),
	'recipient_email' => array(
		'name' => 'recipient_email',
		'type' => 'varchar',
		'len' => '255',
		'source'=>'non-db',
	),
	'message_name' => array(
		'name' => 'message_name',
		'type' => 'varchar',
		'len' => '255',
		'source'=>'non-db',
	),
	'campaign_name' => array(
		'name' => 'campaign_name',
		'vname' => 'LBL_LIST_CAMPAIGN',
		'type' => 'varchar',
		'len' => '50',
		'source'=>'non-db',
	),

), 'indices' => array (
					array('name' => 'emailmanpk', 'type' => 'primary', 'fields' => array('id')),
					array('name' => 'idx_eman_list', 'type' => 'index', 'fields' => array('list_id','user_id','deleted')),
					array('name' => 'idx_eman_campaign_id', 'type' => 'index', 'fields' => array('campaign_id')),
					array('name' => 'idx_eman_relid_reltype_id', 'type' => 'index', 'fields'=> array('related_id', 'related_type', 'campaign_id')),
					)
);
?>

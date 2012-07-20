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

$dictionary['CampaignTracker'] = array('table' => 'campaign_trkrs',
	'comment' => 'Maintains the Tracker URLs used in campaign emails',
          
'fields' => array (
    'id' => array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required'=>true,
        'reportable'=>false,
        'comment' => 'Unique identifier'
    ),
   'tracker_name' => array (
        'name' => 'tracker_name',
        'vname' => 'LBL_TRACKER_NAME',
        'type' => 'varchar',
        'len' => '30',
        'comment' => 'The name of the campaign tracker'
   ),
  	'tracker_url' => array (
        'name' => 'tracker_url',
        'vname' => 'LBL_TRACKER_URL',
        'type' => 'varchar',
        'len' => '255',
        'default' => 'http://',
        'comment' => 'The URL that represents the landing page when the tracker URL in the campaign email is clicked'
   	),
    'tracker_key' => array (
        'name' => 'tracker_key',
        'vname' => 'LBL_TRACKER_KEY',
        'type' => 'int',
        'len' => '11',
        'auto_increment' => true,
        'required'=>true,
        'studio' => array('editview' => false),
        'comment' => 'Internal key to uniquely identifier the tracker URL'
  	),  
  'campaign_id'=> array(
    	'name'=>'campaign_id',
    	'vname'=>'LBL_CAMPAIGN_ID',
    	'type'=>'id',
    	'required'=>false,
    	'reportable'=>false,
    	'comment' => 'The ID of the campaign'
  	),
    'date_entered' => array (
    	'name' => 'date_entered',
        'vname' => 'LBL_DATE_ENTERED',
        'type' => 'datetime',
		'required' => true,
		'comment' => 'Date record created'
  	),
  	'date_modified' => array (
    	'name' => 'date_modified',
    	'vname' => 'LBL_DATE_MODIFIED',
    	'type' => 'datetime',
    	'required' => true,
		'comment' => 'Date record last modified'
  	),
    'modified_user_id' => array (
    	'name' => 'modified_user_id',
    	'vname' => 'LBL_MODIFIED_USER_ID',
    	'dbType' => 'id',
    	'type'=>'id',
		'comment' => 'User who last modified record'
  	),
  	'created_by' => array (
    	'name' => 'created_by',
    	'vname' => 'LBL_CREATED_BY',
    	'type' => 'assigned_user_name',
    	'table' => 'users',
    	'isnull' => 'false',
    	'dbType' => 'id',
		'comment' => 'User ID who created record'
  	),
  	'is_optout' => array (
    	'name' => 'is_optout',
    	'vname' => 'LBL_OPTOUT',
    	'type' => 'bool',
    	'required' => true,
    	'default' => '0',
    	'reportable'=>false,
    	'comment' => 'Indicator whether tracker URL represents an opt-out link'
  	),
  	'deleted' => array (
    	'name' => 'deleted',
    	'vname' => 'LBL_DELETED',
    	'type' => 'bool',
    	'required' => false,
    	'default' => '0',
    	'reportable'=>false,
    	'comment' => 'Record deletion indicator'
  	),
  	'campaign' => array (
  		'name' => 'campaign',
    	'type' => 'link',
    	'relationship' => 'campaign_campaigntrakers',
    	'source'=>'non-db',
		'vname'=>'LBL_CAMPAIGN',
  ),
),

'relationships'=>array(

  'campaign_campaigntrakers' => array(
		'lhs_module'=> 'Campaigns', 
		'lhs_table'=> 'campaigns', 
		'lhs_key' => 'id',
   		'rhs_module'=> 'CampaignTrackers', 
		'rhs_table'=> 'campaign_trkrs', 
		'rhs_key' => 'campaign_id',
   		'relationship_type'=>'one-to-many'
  )
)
,'indices' => array (
      array('name' =>'campaign_trackepk', 'type' =>'primary', 'fields'=>array('id')),
      array('name' => 'campaign_tracker_key_idx', 'type'=>'index', 'fields'=>array('tracker_key')),
 )
);
?>
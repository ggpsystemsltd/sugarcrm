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

$dictionary['Campaign'] = array ('audited'=>true,
	'comment' => 'Campaigns are a series of operations undertaken to accomplish a purpose, usually acquiring leads',
	'table' => 'campaigns',
	'unified_search' => true,
	'fields' => array (
		'tracker_key' => array (
			'name' => 'tracker_key',
			'vname' => 'LBL_TRACKER_KEY',
			'type' => 'int',
			'required' => true,
			'studio' => array('editview' => false),
			'len' => '11',
			'auto_increment' => true,
			'comment' => 'The internal ID of the tracker used in a campaign; no longer used as of 4.2 (see campaign_trkrs)'
			),
		'tracker_count' => array (
			'name' => 'tracker_count',
			'vname' => 'LBL_TRACKER_COUNT',
			'type' => 'int',
			'len' => '11',
			'default' => '0',
			'comment' => 'The number of accesses made to the tracker URL; no longer used as of 4.2 (see campaign_trkrs)'
		),
		'name' => array (
			'name' => 'name',
			'vname' => 'LBL_CAMPAIGN_NAME',
			'dbType' => 'varchar',
			'type' => 'name',
			'len' => '50',
			'comment' => 'The name of the campaign',
			'importable' => 'required',
            'required' => true,
			'unified_search' => true,
			),
		'refer_url' => array (
			'name' => 'refer_url',
			'vname' => 'LBL_REFER_URL',
			'type' => 'varchar',
			'len' => '255',
			'default' => 'http://',
			'comment' => 'The URL referenced in the tracker URL; no longer used as of 4.2 (see campaign_trkrs)'
		),
		'description'=>array('name'=>'description','type'=>'none', 'comment'=>'inhertied but not used', 'source'=>'non-db'),
		'tracker_text' => array (
			'name' => 'tracker_text',
			'vname' => 'LBL_TRACKER_TEXT',
			'type' => 'varchar',
			'len' => '255',
			'comment' => 'The text that appears in the tracker URL; no longer used as of 4.2 (see campaign_trkrs)'
		),

		'start_date' => array (
			'name' => 'start_date',
			'vname' => 'LBL_CAMPAIGN_START_DATE',
			'type' => 'date',
			'audited'=>true,
			'comment' => 'Starting date of the campaign',
		    'validation' => array ('type' => 'isbefore', 'compareto' => 'end_date'),
		    'enable_range_search' => true,
		    'options' => 'date_range_search_dom',
		),
		'end_date' => array (
			'name' => 'end_date',
			'vname' => 'LBL_CAMPAIGN_END_DATE',
			'type' => 'date',
			'audited'=>true,
			'comment' => 'Ending date of the campaign',
			'importable' => 'required',
            'required' => true,
		    'enable_range_search' => true,
		    'options' => 'date_range_search_dom',
		),
		'status' => array (
			'name' => 'status',
			'vname' => 'LBL_CAMPAIGN_STATUS',
			'type' => 'enum',
			'options' => 'campaign_status_dom',
			'len' => 100,
			'audited'=>true,
			'comment' => 'Status of the campaign',
			'importable' => 'required',
            'required' => true,
		),
		  'impressions' => array (
			'name' => 'impressions',
			'vname' => 'LBL_CAMPAIGN_IMPRESSIONS',
			'type' => 'int',
			'default'=>0,
            'reportable'=>true,
			'comment' => 'Expected Click throughs manually entered by Campaign Manager'
		),
  		'currency_id' =>
  		array (
    		'name' => 'currency_id',
    		'vname' => 'LBL_CURRENCY',
    		'type' => 'id',
    		'group'=>'currency_id',
    		'function'=>array('name'=>'getCurrencyDropDown', 'returns'=>'html'),
    		'required'=>false,
    		'do_report'=>false,
    		'reportable'=>false,
    		'comment' => 'Currency in use for the campaign'
  		),
		'budget' => array (
			'name' => 'budget',
			'vname' => 'LBL_CAMPAIGN_BUDGET',
			'type' => 'currency',
			'dbType' => 'double',
			'comment' => 'Budgeted amount for the campaign'
		),
		'expected_cost' => array (
			'name' => 'expected_cost',
			'vname' => 'LBL_CAMPAIGN_EXPECTED_COST',
			'type' => 'currency',
			'dbType' => 'double',
			'comment' => 'Expected cost of the campaign'
		),
		'actual_cost' => array (
			'name' => 'actual_cost',
			'vname' => 'LBL_CAMPAIGN_ACTUAL_COST',
			'type' => 'currency',
			'dbType' => 'double',
			'comment' => 'Actual cost of the campaign'
		),
		'expected_revenue' => array (
			'name' => 'expected_revenue',
			'vname' => 'LBL_CAMPAIGN_EXPECTED_REVENUE',
			'type' => 'currency',
			'dbType' => 'double',
			'comment' => 'Expected revenue stemming from the campaign'
		),
		'campaign_type' => array (
			'name' => 'campaign_type',
			'vname' => 'LBL_CAMPAIGN_TYPE',
			'type' => 'enum',
			'options' => 'campaign_type_dom',
			'len' => 100,
			'audited'=>true,
			'comment' => 'The type of campaign',
			'importable' => 'required',
            'required' => true,
		),
		'objective' => array (
			'name' => 'objective',
			'vname' => 'LBL_CAMPAIGN_OBJECTIVE',
			'type' => 'text',
			'comment' => 'The objective of the campaign'
		),
		'content' => array (
			'name' => 'content',
			'vname' => 'LBL_CAMPAIGN_CONTENT',
			'type' => 'text',
			'comment' => 'The campaign description'
		),
		'prospectlists'=> array (
  			'name' => 'prospectlists',
    		'type' => 'link',
    		'relationship' => 'prospect_list_campaigns',
    		'source'=>'non-db',
  		),
		'emailmarketing'=> array (
  			'name' => 'emailmarketing',
    		'type' => 'link',
    		'relationship' => 'campaign_email_marketing',
    		'source'=>'non-db',
  		),
		'queueitems'=> array (
  			'name' => 'queueitems',
    		'type' => 'link',
    		'relationship' => 'campaign_emailman',
    		'source'=>'non-db',
  		),
		'log_entries'=> array (
  			'name' => 'log_entries',
    		'type' => 'link',
    		'relationship' => 'campaign_campaignlog',
    		'source'=>'non-db',
            'vname' => 'LBL_LOG_ENTRIES',
  		),
  		'tracked_urls' => array (
  			'name' => 'tracked_urls',
    		'type' => 'link',
    		'relationship' => 'campaign_campaigntrakers',
    		'source'=>'non-db',
			'vname'=>'LBL_TRACKED_URLS',
  		),
        'frequency' => array (
            'name' => 'frequency',
            'vname' => 'LBL_CAMPAIGN_FREQUENCY',
            'type' => 'enum',
            //'options' => 'campaign_status_dom',
            'len' => 100,
            'comment' => 'Frequency of the campaign',
            'options' => 'newsletter_frequency_dom',
            'len' => 100,
        ),
        'leads'=> array (
            'name' => 'leads',
            'type' => 'link',
            'relationship' => 'campaign_leads',
            'source'=>'non-db',
		    'vname' => 'LBL_LEADS',
            'link_class' => 'ProspectLink',
            'link_file' => 'modules/Campaigns/ProspectLink.php'
        ),

        'opportunities'=> array (
            'name' => 'opportunities',
            'type' => 'link',
            'relationship' => 'campaign_opportunities',
            'source'=>'non-db',
		    'vname' => 'LBL_OPPORTUNITIES',
        ),
        'contacts'=> array (
            'name' => 'contacts',
            'type' => 'link',
            'relationship' => 'campaign_contacts',
            'source'=>'non-db',
		    'vname' => 'LBL_CONTACTS',
            'link_class' => 'ProspectLink',
            'link_file' => 'modules/Campaigns/ProspectLink.php'
        ),
        'accounts'=> array (
            'name' => 'accounts',
            'type' => 'link',
            'relationship' => 'campaign_accounts',
            'source'=>'non-db',
		    'vname' => 'LBL_ACCOUNTS',
            'link_class' => 'ProspectLink',
            'link_file' => 'modules/Campaigns/ProspectLink.php'
        ),


	),
	'indices' => array (
		array (
			'name' => 'camp_auto_tracker_key' ,
			'type'=>'index' ,
			'fields'=>array('tracker_key')
		),
		array (
			'name' =>'idx_campaign_name',
			'type' =>'index',
			'fields'=>array('name')
		),
	),

	'relationships' => array (
        'campaign_accounts' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
                 'rhs_module'=> 'Accounts', 'rhs_table'=> 'accounts', 'rhs_key' => 'campaign_id',
                 'relationship_type'=>'one-to-many'),

        'campaign_contacts' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
                 'rhs_module'=> 'Contacts', 'rhs_table'=> 'contacts', 'rhs_key' => 'campaign_id',
                 'relationship_type'=>'one-to-many'),

        'campaign_leads' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
                 'rhs_module'=> 'Leads', 'rhs_table'=> 'leads', 'rhs_key' => 'campaign_id',
                 'relationship_type'=>'one-to-many'),

        'campaign_prospects' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
                 'rhs_module'=> 'Prospects', 'rhs_table'=> 'prospects', 'rhs_key' => 'campaign_id',
                 'relationship_type'=>'one-to-many'),

        'campaign_opportunities' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
                 'rhs_module'=> 'Opportunities', 'rhs_table'=> 'opportunities', 'rhs_key' => 'campaign_id',
                 'relationship_type'=>'one-to-many'),

		'campaign_email_marketing' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
				 'rhs_module'=> 'EmailMarketing', 'rhs_table'=> 'email_marketing', 'rhs_key' => 'campaign_id',
				 'relationship_type'=>'one-to-many'),

		'campaign_emailman' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
				 'rhs_module'=> 'EmailMan', 'rhs_table'=> 'emailman', 'rhs_key' => 'campaign_id',
				 'relationship_type'=>'one-to-many'),

		'campaign_campaignlog' => array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
				 'rhs_module'=> 'CampaignLog', 'rhs_table'=> 'campaign_log', 'rhs_key' => 'campaign_id',
				 'relationship_type'=>'one-to-many'),

        'campaign_assigned_user' => array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
                'rhs_module'=> 'Campaigns', 'rhs_table'=> 'campaigns', 'rhs_key' => 'assigned_user_id',
                'relationship_type'=>'one-to-many'),

        'campaign_modified_user' => array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
                'rhs_module'=> 'Campaigns', 'rhs_table'=> 'campaigns', 'rhs_key' => 'modified_user_id',
                'relationship_type'=>'one-to-many'),
		)
);
VardefManager::createVardef('Campaigns','Campaign', array('default', 'assignable',
'team_security',
));
?>
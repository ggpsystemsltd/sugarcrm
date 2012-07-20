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


$dictionary['Opportunity'] = array('table' => 'opportunities','audited'=>true, 'unified_search' => true, 'unified_search_default_enabled' => true, 'duplicate_merge'=>true,
		'comment' => 'An opportunity is the target of selling activities',
		'fields' => array (
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_OPPORTUNITY_NAME',
    'type' => 'name',
    'dbType' => 'varchar',
    'len' => '50',
    'unified_search' => true,
    'comment' => 'Name of the opportunity',
    'merge_filter' => 'selected',
    'importable' => 'required',
    'required' => true,
  ),
  'opportunity_type' =>
  array (
    'name' => 'opportunity_type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'options'=> 'opportunity_type_dom',
    'len' => '255',
    'audited'=>true,
    'comment' => 'Type of opportunity (ex: Existing, New)',
    'merge_filter' => 'enabled',
  ),
  'account_name' =>
  array (
    'name' => 'account_name',
    'rname' => 'name',
    'id_name' => 'account_id',
    'vname' => 'LBL_ACCOUNT_NAME',
    'type' => 'relate',
    'table' => 'accounts',
    'join_name'=>'accounts',
    'isnull' => 'true',
    'module' => 'Accounts',
    'dbType' => 'varchar',
    'link'=>'accounts',
    'len' => '255',
   	 'source'=>'non-db',
   	 'unified_search' => true,
   	 'required' => true,
   	 'importable' => 'required',
     'required' => true,
  ),
  'account_id' =>
   array (
    'name' => 'account_id',
    'vname' => 'LBL_ACCOUNT_ID',
    'type' => 'id',
    'source'=>'non-db',
    'audited'=>true,
  ),
  'campaign_id' =>
      array (
        'name' => 'campaign_id',
        'comment' => 'Campaign that generated lead',
        'vname'=>'LBL_CAMPAIGN_ID',
        'rname' => 'id',
        'type' => 'id',
        'dbType'=>'id',
        'table' => 'campaigns',
        'isnull' => 'true',
        'module' => 'Campaigns',
        //'dbType' => 'char',
        'reportable'=>false,
        'massupdate' => false,
        'duplicate_merge'=> 'disabled',
      ),
  'campaign_name'=>
   	   array(
		'name'=>'campaign_name',
		'rname'=>'name',
		'id_name'=>'campaign_id',
		'vname'=>'LBL_CAMPAIGN',
		'type'=>'relate',
		'link' => 'campaign_opportunities',
		'isnull'=>'true',
		'table' => 'campaigns',
		'module'=>'Campaigns',
		'source' => 'non-db',
	),
  'campaign_opportunities' =>
		array (
		'name' => 'campaign_opportunities',
		'type' => 'link',
		'vname' => 'LBL_CAMPAIGN_OPPORTUNITY',
		'relationship' => 'campaign_opportunities',
		'source' => 'non-db',
    ),
  'lead_source' =>
  array (
    'name' => 'lead_source',
    'vname' => 'LBL_LEAD_SOURCE',
    'type' => 'enum',
    'options' => 'lead_source_dom',
    'len' => '50',
    'comment' => 'Source of the opportunity',
    'merge_filter' => 'enabled',
  ),
  'amount' =>
  array (
    'name' => 'amount',
    'vname' => 'LBL_AMOUNT',
    //'function'=>array('vname'=>'getCurrencyType'),
    'type' => 'currency',
//    'disable_num_format' => true,
    'dbType' => 'double',
    'comment' => 'Unconverted amount of the opportunity',
    'importable' => 'required',
    'duplicate_merge'=>'1',
    'required' => true,
  	'options' => 'numeric_range_search_dom',
    'enable_range_search' => true,
  ),
  'amount_usdollar' =>
  array (
    'name' => 'amount_usdollar',
    'vname' => 'LBL_AMOUNT_USDOLLAR',
    'type' => 'currency',
    'group'=>'amount',
    'dbType' => 'double',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>true,
    'comment' => 'Formatted amount of the opportunity',
    'studio' => array('wirelesseditview'=>false, 'wirelessdetailview'=>false, 'editview'=>false, 'detailview'=>false, 'quickcreate'=>false,),
  ),
  'currency_id' =>
  array (
    'name' => 'currency_id',
    'type' => 'id',
    'group'=>'currency_id',
    'vname' => 'LBL_CURRENCY',
	'function'=>array('name'=>'getCurrencyDropDown', 'returns'=>'html'),
    'reportable'=>false,
    'comment' => 'Currency used for display purposes'
  ),
  'currency_name'=>
   	   array(
		'name'=>'currency_name',
		'rname'=>'name',
		'id_name'=>'currency_id',
		'vname'=>'LBL_CURRENCY_NAME',
		'type'=>'relate',
		'isnull'=>'true',
		'table' => 'currencies',
		'module'=>'Currencies',
		'source' => 'non-db',
        'function'=>array('name'=>'getCurrencyNameDropDown', 'returns'=>'html'),
        'studio' => 'false',
   	    'duplicate_merge' => 'disabled',
	),
   'currency_symbol'=>
   	   array(
		'name'=>'currency_symbol',
		'rname'=>'symbol',
		'id_name'=>'currency_id',
		'vname'=>'LBL_CURRENCY_SYMBOL',
		'type'=>'relate',
		'isnull'=>'true',
		'table' => 'currencies',
		'module'=>'Currencies',
		'source' => 'non-db',
        'function'=>array('name'=>'getCurrencySymbolDropDown', 'returns'=>'html'),
        'studio' => 'false',
   	    'duplicate_merge' => 'disabled',
	),
  'date_closed' =>
  array (
    'name' => 'date_closed',
    'vname' => 'LBL_DATE_CLOSED',
    'type' => 'date',
    'audited'=>true,
    'comment' => 'Expected or actual date the oppportunity will close',
	'importable' => 'required',
    'required' => true,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),
  'next_step' =>
  array (
    'name' => 'next_step',
    'vname' => 'LBL_NEXT_STEP',
    'type' => 'varchar',
    'len' => '100',
    'comment' => 'The next step in the sales process',
    'merge_filter' => 'enabled',
  ),
  'sales_stage' =>
  array (
    'name' => 'sales_stage',
    'vname' => 'LBL_SALES_STAGE',
    'type' => 'enum',
    'options' => 'sales_stage_dom',
    'len' => '255',
    'audited'=>true,
    'comment' => 'Indication of progression towards closure',
    'merge_filter' => 'enabled',
    'importable' => 'required',
    'required' => true,
  ),
  'probability' =>
  array (
    'name' => 'probability',
    'vname' => 'LBL_PROBABILITY',
    'type' => 'int',
    'dbType' => 'double',
    'audited'=>true,
    'comment' => 'The probability of closure',
    'validation' => array('type' => 'range', 'min' => 0, 'max' => 100),
    'merge_filter' => 'enabled',
  ),
  'accounts' =>
  array (
  	'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'accounts_opportunities',
    'source'=>'non-db',
    'link_type'=>'one',
    'module'=>'Accounts',
    'bean_name'=>'Account',
		'vname'=>'LBL_ACCOUNTS',
  ),
  'contacts' =>
  array (
  	'name' => 'contacts',
    'type' => 'link',
    'relationship' => 'opportunities_contacts',
    'source'=>'non-db',
    'module'=>'Contacts',
    'bean_name'=>'Contact',
    'rel_fields'=>array('contact_role'=>array('type'=>'enum', 'options'=>'opportunity_relationship_type_dom')),
	'vname'=>'LBL_CONTACTS',
  ),
  'tasks' =>
  array (
  	'name' => 'tasks',
    'type' => 'link',
    'relationship' => 'opportunity_tasks',
    'source'=>'non-db',
		'vname'=>'LBL_TASKS',
  ),
  'notes' =>
  array (
  	'name' => 'notes',
    'type' => 'link',
    'relationship' => 'opportunity_notes',
    'source'=>'non-db',
		'vname'=>'LBL_NOTES',
  ),
  'meetings' =>
  array (
  	'name' => 'meetings',
    'type' => 'link',
    'relationship' => 'opportunity_meetings',
    'source'=>'non-db',
		'vname'=>'LBL_MEETINGS',
  ),
  'calls' =>
  array (
  	'name' => 'calls',
    'type' => 'link',
    'relationship' => 'opportunity_calls',
    'source'=>'non-db',
		'vname'=>'LBL_CALLS',
  ),
  'emails' =>
  array (
  	'name' => 'emails',
    'type' => 'link',
    'relationship' => 'emails_opportunities_rel',/* reldef in emails */
    'source'=>'non-db',
		'vname'=>'LBL_EMAILS',
  ),
  'documents'=>
  array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_opportunities',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
  ),
  'quotes' =>
  array (
  	'name' => 'quotes',
    'type' => 'link',
    'relationship' => 'quotes_opportunities',
    'source'=>'non-db',
		'vname'=>'LBL_QUOTES',
  ),


  'project' =>
  array (
  	'name' => 'project',
    'type' => 'link',
    'relationship' => 'projects_opportunities',
    'source'=>'non-db',
		'vname'=>'LBL_PROJECTS',
  ),
  'leads' =>
  array (
  	'name' => 'leads',
    'type' => 'link',
    'relationship' => 'opportunity_leads',
    'source'=>'non-db',
		'vname'=>'LBL_LEADS',
  ),

    'campaigns' => array(
        'name' => 'campaigns',
        'type' => 'link',
        'relationship' => 'opportunities_campaign',
        'module' => 'CampaignLog',
        'bean_name' => 'CampaignLog',
        'source' => 'non-db',
        'vname' => 'LBL_CAMPAIGNS',
        'reportable' => false
    ),

    'campaign_link' => array(
        'name' => 'campaign_link',
        'type' => 'link',
        'relationship' => 'opportunities_campaign',
        'vname' => 'LBL_CAMPAIGNS',
        'link_type' => 'one',
        'module' => 'Campaigns',
        'bean_name' => 'Campaign',
        'source' => 'non-db',
        'reportable' => false
    ),
  'currencies' =>
  array (
    'name' => 'currencies',
    'type' => 'link',
    'relationship' => 'opportunity_currencies',
    'source'=>'non-db',
    'vname'=>'LBL_CURRENCIES',
  ),
  'contracts' => array (
	'name' => 'contracts',
	'type' => 'link',
	'vname' => 'LBL_CONTRACTS',
	'relationship' => 'contracts_opportunities',
	//'link_type' => 'one', bug# 31652 relationship is one to many from opportunities to contracts
	'source' => 'non-db',

  ),
),
		'indices' => array (
			array(
				'name' => 'idx_opp_name',
				'type' => 'index',
				'fields' => array('name'),
			),
			array(
				'name' => 'idx_opp_assigned',
				'type' => 'index',
				'fields' => array('assigned_user_id'),
			),
			array(
				'name' => 'idx_opp_id_deleted',
				'type' => 'index',
				'fields' => array('id','deleted'),
			),
		),

 'relationships' => array (
	'opportunity_calls' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'id',
							  'rhs_module'=> 'Calls', 'rhs_table'=> 'calls', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Opportunities')
	,'opportunity_meetings' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'id',
							  'rhs_module'=> 'Meetings', 'rhs_table'=> 'meetings', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Opportunities')
	,'opportunity_tasks' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'id',
							  'rhs_module'=> 'Tasks', 'rhs_table'=> 'tasks', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Opportunities')
	,'opportunity_notes' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'id',
							  'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Opportunities')
	,'opportunity_emails' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'id',
							  'rhs_module'=> 'Emails', 'rhs_table'=> 'emails', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Opportunities')
	,'opportunity_leads' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'id',
							  'rhs_module'=> 'Leads', 'rhs_table'=> 'leads', 'rhs_key' => 'opportunity_id',
							  'relationship_type'=>'one-to-many')
    ,'opportunity_currencies' => array('lhs_module'=> 'Opportunities', 'lhs_table'=> 'opportunities', 'lhs_key' => 'currency_id',
                              'rhs_module'=> 'Currencies', 'rhs_table'=> 'currencies', 'rhs_key' => 'id',
                              'relationship_type'=>'one-to-many')
  ,'opportunities_assigned_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Opportunities', 'rhs_table'=> 'opportunities', 'rhs_key' => 'assigned_user_id',
   'relationship_type'=>'one-to-many')

   ,'opportunities_modified_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Opportunities', 'rhs_table'=> 'opportunities', 'rhs_key' => 'modified_user_id',
   'relationship_type'=>'one-to-many')

   ,'opportunities_created_by' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Opportunities', 'rhs_table'=> 'opportunities', 'rhs_key' => 'created_by',
   'relationship_type'=>'one-to-many'),
'opportunities_campaign' =>
   array('lhs_module'=> 'Campaigns', 'lhs_table'=> 'campaigns', 'lhs_key' => 'id',
   'rhs_module'=> 'Opportunities', 'rhs_table'=> 'opportunities', 'rhs_key' => 'campaign_id',
   'relationship_type'=>'one-to-many'),
)
//This enables optimistic locking for Saves From EditView
	,'optimistic_locking'=>true,
);
VardefManager::createVardef('Opportunities','Opportunity', array('default', 'assignable',
'team_security',
));
?>

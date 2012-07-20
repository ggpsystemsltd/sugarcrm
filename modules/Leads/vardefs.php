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

$dictionary['Lead'] = array('table' => 'leads','audited'=>true, 'unified_search' => true, 'unified_search_default_enabled' => true, 'duplicate_merge'=>true,
		'comment' => 'Leads are persons of interest early in a sales cycle', 'fields' => array (


  'converted' =>
  array (
    'name' => 'converted',
    'vname' => 'LBL_CONVERTED',
    'type' => 'bool',
    'default' => '0',
    'comment' => 'Has Lead been converted to a Contact (and other Sugar objects)'
  ),
  'refered_by' =>
  array (
    'name' => 'refered_by',
    'vname' => 'LBL_REFERED_BY',
    'type' => 'varchar',
    'len' => '100',
    'comment' => 'Identifies who refered the lead',
    'merge_filter' => 'enabled',
  ),
  'lead_source' =>
  array (
    'name' => 'lead_source',
    'vname' => 'LBL_LEAD_SOURCE',
    'type' => 'enum',
    'options'=> 'lead_source_dom',
    'len' => '100',
	'audited'=>true,
	'comment' => 'Lead source (ex: Web, print)',
    'merge_filter' => 'enabled',
  ),
  'lead_source_description' =>
  array (
    'name' => 'lead_source_description',
    'vname' => 'LBL_LEAD_SOURCE_DESCRIPTION',
    'type' => 'text',
    'group'=>'lead_source',
    'comment' => 'Description of the lead source'
  ),
  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'len' => '100',
    'options' => 'lead_status_dom',
	'audited'=>true,
	'comment' => 'Status of the lead',
    'merge_filter' => 'enabled',
  ),
  'status_description' =>
  array (
    'name' => 'status_description',
    'vname' => 'LBL_STATUS_DESCRIPTION',
    'type' => 'text',
    'group'=>'status',
    'comment' => 'Description of the status of the lead'
  ),
  'department' =>
  array (
    'name' => 'department',
    'vname' => 'LBL_DEPARTMENT',
    'type' => 'varchar',
    'len' => '100',
    'comment' => 'Department the lead belongs to',
    'merge_filter' => 'enabled',
  ),
  'reports_to_id' =>
  array (
    'name' => 'reports_to_id',
    'vname' => 'LBL_REPORTS_TO_ID',
    'type' => 'id',
    'reportable'=>false,
    'comment' => 'ID of Contact the Lead reports to'
  ),
    'report_to_name' =>
  array (
    'name' => 'report_to_name',
    'rname' => 'name',
    'id_name' => 'reports_to_id',
    'vname' => 'LBL_REPORTS_TO',
    'type' => 'relate',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'dbType' => 'varchar',
    'len' => 'id',
   	'source'=>'non-db',
    'reportable'=>false,
    'massupdate' => false,
  ),
    'reports_to_link' => array (
  	    'name' => 'reports_to_link',
        'type' => 'link',
        'relationship' => 'lead_direct_reports',
		'link_type'=>'one',
		'side'=>'right',
        'source'=>'non-db',
		'vname'=>'LBL_REPORTS_TO',
        'reportable'=>false
  ),
    'reportees' => array (
  	    'name' => 'reportees',
        'type' => 'link',
        'relationship' => 'lead_direct_reports',
		'link_type'=>'many',
		'side'=>'left',
        'source'=>'non-db',
		'vname'=>'LBL_REPORTS_TO',
        'reportable'=>false
  ),
    'contacts'=> array(
        'name' => 'contacts',
        'type' => 'link',
        'relationship' => 'contact_leads',
        'module' => "Contacts",
        'source' => 'non-db',
        'vname' => 'LBL_CONTACTS',
        'reportable'=>false
    ),
  /*'acc_name_from_accounts' =>
  array (
	'name' => 'acc_name_from_accounts',
	'rname' => 'name',
	'id_name' => 'account_id',
	'vname' => 'LBL_ACCOUNT_NAME_1',
	'type' => 'relate',
	'link' => 'accounts',
	'table' => 'accounts',
	'join_name'=>'accounts',
	'isnull' => 'true',
	'module' => 'Accounts',
	'dbType' => 'varchar',
	'len' => '255',
	'source' => 'non-db',
	'unified_search' => false,
	'massupdate' => false,
	'studio' => 'false',
  ),
  */
  'account_name' =>
  array (
	'name' => 'account_name',
	'vname' => 'LBL_ACCOUNT_NAME',
	'type' => 'varchar',
	'len' => '255',
	'unified_search' => true,
	'comment' => 'Account name for lead',
  ),


  'accounts' =>
  array (
	'name' => 'accounts',
	'type' => 'link',
	'relationship' => 'account_leads',
	'link_type' => 'one',
	'source' => 'non-db',
	'vname' => 'LBL_ACCOUNT',
    'duplicate_merge'=> 'disabled',
  ),
  
  'account_description' =>
  array (
    'name' => 'account_description',
    'vname' => 'LBL_ACCOUNT_DESCRIPTION',
    'type' => 'text',
    'group'=>'account_name',
    'unified_search' => true,
    'comment' => 'Description of lead account'
  ),
  'contact_id' =>
  array (
    'name' => 'contact_id',
    'type' => 'id',
    'reportable'=>false,
    'vname'=>'LBL_CONTACT_ID',
	'comment' => 'If converted, Contact ID resulting from the conversion'
  ),
    'contact' => array(
        'name' => 'contact',
        'type' => 'link',
        'link_type' => 'one',
        'relationship' => 'contact_leads',
        'source' => 'non-db',
        'vname' => 'LBL_LEADS',
        'reportable' => false,
    ),
  'account_id' =>
  array (
    'name' => 'account_id',
    'type' => 'id',
    'reportable'=>false,
    'vname'=>'LBL_ACCOUNT_ID',
	'comment' => 'If converted, Account ID resulting from the conversion'
  ),
  'opportunity_id' =>
  array (
    'name' => 'opportunity_id',
    'type' => 'id',
    'reportable'=>false,
    'vname'=>'LBL_OPPORTUNITY_ID',
	'comment' => 'If converted, Opportunity ID resulting from the conversion'
  ),
  'opportunity' => array (
    'name' => 'opportunity',
    'type' => 'link',
    'link_type' => 'one',
    'relationship' => 'opportunity_leads',
    'source'=>'non-db',
    'vname'=>'LBL_OPPORTUNITIES',
  ),
  'opportunity_name' =>
  array (
    'name' => 'opportunity_name',
    'vname' => 'LBL_OPPORTUNITY_NAME',
    'type' => 'varchar',
    'len' => '255',
    'comment' => 'Opportunity name associated with lead'
  ),
  'opportunity_amount' =>
  array (
    'name' => 'opportunity_amount',
    'vname' => 'LBL_OPPORTUNITY_AMOUNT',
    'type' => 'varchar',
    'group'=>'opportunity_name',
    'len' => '50',
    'comment' => 'Amount of the opportunity'
  ),
  'campaign_id' =>
  array (
    'name' => 'campaign_id',
    'type' => 'id',
    'reportable'=>false,
    'vname'=>'LBL_CAMPAIGN_ID',
	'comment' => 'Campaign that generated lead'
  ),

   'campaign_name' =>
    array (
      'name' => 'campaign_name',
      'rname' => 'name',
      'id_name' => 'campaign_id',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
      'link' => 'campaign_leads',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'source' => 'non-db',
    ),
    'campaign_leads' =>
    array (
      'name' => 'campaign_leads',
      'type' => 'link',
      'vname' => 'LBL_CAMPAIGN_LEAD',
      'relationship' => 'campaign_leads',
      'source' => 'non-db',
    ),
    'c_accept_status_fields' =>
		array (
			'name' => 'c_accept_status_fields',
			'rname' => 'id',
			'relationship_fields'=>array('id' => 'accept_status_id', 'accept_status' => 'accept_status_name'),
			'vname' => 'LBL_LIST_ACCEPT_STATUS',
			'type' => 'relate',
			'link' => 'calls',
			'link_type' => 'relationship_info',
			'source' => 'non-db',
			'importable' => 'false',
            'duplicate_merge'=> 'disabled',
			'studio' => false,
		),
	'm_accept_status_fields' =>
		array (
			'name' => 'm_accept_status_fields',
			'rname' => 'id',
			'relationship_fields'=>array('id' => 'accept_status_id', 'accept_status' => 'accept_status_name'),
			'vname' => 'LBL_LIST_ACCEPT_STATUS',
			'type' => 'relate',
			'link' => 'meetings',
			'link_type' => 'relationship_info',
			'source' => 'non-db',
			'importable' => 'false',
			'hideacl'=>true,
            'duplicate_merge'=> 'disabled',
			'studio' => false,
		),
	'accept_status_id' =>
		array(
			'name' => 'accept_status_id',
			'type' => 'varchar',
			'source' => 'non-db',
			'vname' => 'LBL_LIST_ACCEPT_STATUS',
			'studio' => array('listview' => false),
		),
	'accept_status_name' =>
		array(
			'massupdate' => false,
			'name' => 'accept_status_name',
			'type' => 'enum',
			'source' => 'non-db',
			'vname' => 'LBL_LIST_ACCEPT_STATUS',
			'options' => 'dom_meeting_accept_status',
			'importable' => 'false',
		),
		//bug 42902
		'email'=> array(
			'name' => 'email',
			'type' => 'email',
			'query_type' => 'default',
			'source' => 'non-db',
			'operator' => 'subquery',
			'subquery' => 'SELECT eabr.bean_id FROM email_addr_bean_rel eabr JOIN email_addresses ea ON (ea.id = eabr.email_address_id) WHERE eabr.deleted=0 AND ea.email_address LIKE',
			'db_field' => array(
				'id',
			),
			'vname' =>'LBL_ANY_EMAIL',
			'studio' => array('visible'=>false, 'searchview'=>true),
		),
  'webtolead_email1' =>
  array (
    'name' => 'webtolead_email1',
    'vname' => 'LBL_EMAIL_ADDRESS',
    'type' => 'email',
    'len' => '100',
    'source' => 'non-db',
	'comment' => 'Main email address of lead',
    'importable' => 'false',
    'studio' => 'false',
  ),
  'webtolead_email2' =>
  array (
    'name' => 'webtolead_email2',
    'vname' => 'LBL_OTHER_EMAIL_ADDRESS',
    'type' => 'email',
    'len' => '100',
    'source' => 'non-db',
    'comment' => 'Secondary email address of lead',
    'importable' => 'false',
    'studio' => 'false',
  ),
  'webtolead_email_opt_out' =>
  array (
    'name' => 'webtolead_email_opt_out',
    'vname' => 'LBL_EMAIL_OPT_OUT',
    'type' => 'bool',
    'source' => 'non-db',
	'comment' => 'Indicator signaling if lead elects to opt out of email campaigns',
    'importable' => 'false',
    'massupdate' => false,
	'studio'=>'false',
  ),
'webtolead_invalid_email' =>
  array (
    'name' => 'webtolead_invalid_email',
    'vname' => 'LBL_INVALID_EMAIL',
    'type' => 'bool',
    'source' => 'non-db',
    'comment' => 'Indicator that email address for lead is invalid',
    'importable' => 'false',
    'massupdate' => false,
	'studio'=>'false',
  ),
'birthdate' =>
	array (
		'name' => 'birthdate',
		'vname' => 'LBL_BIRTHDATE',
		'massupdate' => false,
		'type' => 'date',
		'comment' => 'The birthdate of the contact'
	),
  
  'portal_name' =>
  array (
    'name' => 'portal_name',
    'vname' => 'LBL_PORTAL_NAME',
    'type' => 'varchar',
    'len' => '255',
    'group'=>'portal',
    'comment' => 'Portal user name when lead created via lead portal',
	//BEGIN SUGARCRM flav!=ent
	'studio' => 'false',
	//END SUGARCRM
  ),
  'portal_app' =>
  array (
    'name' => 'portal_app',
    'vname' => 'LBL_PORTAL_APP',
    'type' => 'varchar',
    'group'=>'portal',
    'len' => '255',
    'comment' => 'Portal application that resulted in created of lead',
	//BEGIN SUGARCRM flav!=ent
    'studio' => 'false',
  ),
   'website' => 
  array (
    'name' => 'website',
    'vname' => 'LBL_WEBSITE',
    'type' => 'url',
    'dbType' => 'varchar',
    'len' => 255,
    'comment' => 'URL of website for the company',
  ),

  'tasks' =>
  array (
  	'name' => 'tasks',
    'type' => 'link',
    'relationship' => 'lead_tasks',
    'source'=>'non-db',
		'vname'=>'LBL_TASKS',
  ),
  'notes' =>
  array (
  	'name' => 'notes',
    'type' => 'link',
    'relationship' => 'lead_notes',
    'source'=>'non-db',
		'vname'=>'LBL_NOTES',
  ),
  'meetings' =>
  array (
  	'name' => 'meetings',
    'type' => 'link',
    'relationship' => 'meetings_leads',
    'source'=>'non-db',
		'vname'=>'LBL_MEETINGS',
  ),
  'calls' =>
  array (
  	'name' => 'calls',
    'type' => 'link',
   'relationship' => 'calls_leads',
    'source'=>'non-db',
		'vname'=>'LBL_CALLS',
  ),
  'oldmeetings' =>
  array (
  	'name' => 'oldmeetings',
    'type' => 'link',
    'relationship' => 'lead_meetings',
    'source'=>'non-db',
		'vname'=>'LBL_MEETINGS',
  ),
  'oldcalls' =>
  array (
  	'name' => 'oldcalls',
    'type' => 'link',
    'relationship' => 'lead_calls',
    'source'=>'non-db',
		'vname'=>'LBL_CALLS',
  ),
  'emails' =>
  array (
  	'name' => 'emails',
    'type' => 'link',
    'relationship' => 'emails_leads_rel',
    'source'=>'non-db',
    'unified_search'=>true,
	'vname'=>'LBL_EMAILS',
  ),
	'email_addresses' =>
	array (
		'name' => 'email_addresses',
        'type' => 'link',
		'relationship' => 'leads_email_addresses',
        'source' => 'non-db',
		'vname' => 'LBL_EMAIL_ADDRESSES',
		'reportable'=>false,
	    'rel_fields' => array('primary_address' => array('type'=>'bool')),
	),
	'email_addresses_primary' =>
	array (
		'name' => 'email_addresses_primary',
        'type' => 'link',
		'relationship' => 'leads_email_addresses_primary',
        'source' => 'non-db',
		'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
		'duplicate_merge'=> 'disabled',
	),
	'campaigns' =>
		array (
  			'name' => 'campaigns',
    		'type' => 'link',
    		'relationship' => 'lead_campaign_log',
    		'module'=>'CampaignLog',
    		'bean_name'=>'CampaignLog',
    		'source'=>'non-db',
			'vname'=>'LBL_CAMPAIGNLOG',
	  	),
      'prospect_lists' =>
      array (
        'name' => 'prospect_lists',
        'type' => 'link',
        'relationship' => 'prospect_list_leads',
        'module'=>'ProspectLists',
        'source'=>'non-db',
        'vname'=>'LBL_PROSPECT_LIST',
      ),

)
                                                      , 'indices' => array (
       array('name' =>'idx_lead_acct_name_first', 'type'=>'index', 'fields'=>array('account_name','deleted')),
       array('name' =>'idx_lead_last_first', 'type'=>'index', 'fields'=>array('last_name','first_name','deleted')),
       array('name' =>'idx_lead_del_stat', 'type'=>'index', 'fields'=>array('last_name','status','deleted','first_name')),
       array('name' =>'idx_lead_opp_del', 'type'=>'index', 'fields'=>array('opportunity_id','deleted',)),
       array('name' =>'idx_leads_acct_del', 'type'=>'index', 'fields'=>array('account_id','deleted',)),
       array('name' => 'idx_del_user', 'type' => 'index', 'fields'=> array('deleted', 'assigned_user_id')),
        array('name' =>'idx_lead_assigned', 'type'=>'index', 'fields'=>array('assigned_user_id')),
        array('name' =>'idx_lead_contact', 'type'=>'index', 'fields'=>array('contact_id')),
        array('name' =>'idx_reports_to', 'type'=>'index', 'fields'=>array('reports_to_id')),
        array('name' =>'idx_lead_phone_work', 'type'=>'index', 'fields'=>array('phone_work')),
       array('name' =>'idx_leads_id_del', 'type'=>'index', 'fields'=>array('id','deleted',)),

                                             )
, 'relationships' => array (
	'lead_direct_reports' => array('lhs_module'=> 'Leads', 'lhs_table'=> 'leads', 'lhs_key' => 'id',
							  'rhs_module'=> 'Leads', 'rhs_table'=> 'leads', 'rhs_key' => 'reports_to_id',
							  'relationship_type'=>'one-to-many'),
	'lead_tasks' => array('lhs_module'=> 'Leads', 'lhs_table'=> 'leads', 'lhs_key' => 'id',
							  'rhs_module'=> 'Tasks', 'rhs_table'=> 'tasks', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Leads')
	,'lead_notes' => array('lhs_module'=> 'Leads', 'lhs_table'=> 'leads', 'lhs_key' => 'id',
							  'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Leads')

	,'lead_meetings' => array('lhs_module'=> 'Leads', 'lhs_table'=> 'leads', 'lhs_key' => 'id',
							  'rhs_module'=> 'Meetings', 'rhs_table'=> 'meetings', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Leads')

	,'lead_calls' => array('lhs_module'=> 'Leads', 'lhs_table'=> 'leads', 'lhs_key' => 'id',
							  'rhs_module'=> 'Calls', 'rhs_table'=> 'calls', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Leads')

	,'lead_emails' => array('lhs_module'=> 'Leads', 'lhs_table'=> 'leads', 'lhs_key' => 'id',
							  'rhs_module'=> 'Emails', 'rhs_table'=> 'emails', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'Leads'),
	'lead_campaign_log' => array(
									'lhs_module'		=>	'Leads',
									'lhs_table'			=>	'leads',
									'lhs_key' 			=> 	'id',
						  			'rhs_module'		=>	'CampaignLog',
									'rhs_table'			=>	'campaign_log',
									'rhs_key' 			=> 	'target_id',
						  			'relationship_type'	=>'one-to-many'
						  		)

	)
	//This enables optimistic locking for Saves From EditView
	,'optimistic_locking'=>true,
);

VardefManager::createVardef('Leads','Lead', array('default', 'assignable',
'team_security',
'person'));

if(isset($dictionary['Lead']['fields']['picture'])) {
   unset($dictionary['Lead']['fields']['picture']);
}

?>

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

$dictionary['ProspectList'] = array (
    'favorites'=>true, 
	'table' => 'prospect_lists',
	'unified_search' => true,
	'fields' => array (
		'id' => array (
			'name' => 'id',
			'vname' => 'LBL_ID',
			'type' => 'id',
			'required' => true,
			'reportable'=>false,
		),
		'name' => array (
			'name' => 'name',
			'vname' => 'LBL_NAME',
			'type' => 'varchar',
			'len' => '50',
			'importable' => 'required',
			'unified_search' => true,
		),
		'list_type' => array (
		    'name' => 'list_type',
		  	'vname' => 'LBL_TYPE',
			'type' => 'enum',
			'options' => 'prospect_list_type_dom',
			'len' => 100,
			'importable' => 'required',
		),
		'date_entered' => array (
			'name' => 'date_entered',
			'vname' => 'LBL_DATE_ENTERED',
			'type' => 'datetime',
			),
		'date_modified' => array (
			'name' => 'date_modified',
			'vname' => 'LBL_DATE_MODIFIED',
			'type' => 'datetime',
			),
		'modified_user_id' => array (
			'name' => 'modified_user_id',
			'rname' => 'user_name',
			'id_name' => 'modified_user_id',
			'vname' => 'LBL_MODIFIED',
			'type' => 'assigned_user_name',
			'table' => 'modified_user_id_users',
			'isnull' => 'false',
			'dbType' => 'id',
			'reportable'=>true,
			),
	    'modified_by_name' => array (
		      'name' => 'modified_by_name',
		      'vname' => 'LBL_MODIFIED',
		      'type' => 'relate',
		      'reportable' => false,
		      'source' => 'non-db',
		      'table' => 'users',
		      'id_name' => 'modified_user_id',
		      'module' => 'Users',
		      'duplicate_merge' => 'disabled',
	    ),
		'created_by' => array (
			'name' => 'created_by',
			'rname' => 'user_name',
			'id_name' => 'created_by',
			'vname' => 'LBL_CREATED',
			'type' => 'assigned_user_name',
			'table' => 'created_by_users',
    		'isnull' => 'false',
    		'dbType' => 'id'
  		),
	    'created_by_name' => array (
		      'name' => 'created_by_name',
		      'vname' => 'LBL_CREATED',
		      'type' => 'relate',
		      'reportable' => false,
		      'source' => 'non-db',
		      'table' => 'users',
		      'id_name' => 'created_by',
		      'module' => 'Users',
		      'duplicate_merge' => 'disabled',
	    ),
		'deleted' => array (
			'name' => 'deleted',
			'vname' => 'LBL_CREATED_BY',
			'type' => 'bool',
			'required' => false,
			'reportable'=>false,
		),
		'description' => array (
			'name' => 'description',
			'vname' => 'LBL_DESCRIPTION',
			'type' => 'text',
		),
		'domain_name' => array (
			'name' => 'domain_name',
			'vname' => 'LBL_DOMAIN_NAME',
			'type' => 'varchar',
			'len' => '255',
		),
		'entry_count' =>
  		array (
  			'name' => 'entry_count',
			'type' => 'int',
    		'source'=>'non-db',
			'vname'=>'LBL_LIST_ENTRIES',
  		),
  		'prospects' =>
  			array (
  			'name' => 'prospects',
    		'type' => 'link',
    		'relationship' => 'prospect_list_prospects',
    		'source'=>'non-db',
  		),
  		'contacts' =>
  			array (
  			'name' => 'contacts',
    		'type' => 'link',
    		'relationship' => 'prospect_list_contacts',
    		'source'=>'non-db',
  		),
  		'leads' =>
  			array (
  			'name' => 'leads',
    		'type' => 'link',
    		'relationship' => 'prospect_list_leads',
    		'source'=>'non-db',
  		),
  		'accounts' =>
  			array (
  			'name' => 'accounts',
    		'type' => 'link',
    		'relationship' => 'prospect_list_accounts',
    		'source'=>'non-db',
  		),  		
  		'campaigns'=> array (
  			'name' => 'campaigns',
    		'type' => 'link',
    		'relationship' => 'prospect_list_campaigns',
    		'source'=>'non-db',
  		),
  		'users' =>
  			array (
  			'name' => 'users',
    		'type' => 'link',
    		'relationship' => 'prospect_list_users',
    		'source'=>'non-db',
  		),
        'email_marketing'=> array (
            'name' => 'email_marketing',
            'type' => 'link',
            'relationship' => 'email_marketing_prospect_lists',
            'source'=>'non-db',
        ),
		'marketing_id' => array (
			'name' => 'marketing_id',
			'vname' => 'LBL_MARKETING_ID',
			'type' => 'varchar',
			'len'=>'36',
			'source'=>'non-db',
		),
		'marketing_name' => array (
			'name' => 'marketing_name',
			'vname' => 'LBL_MARKETING_NAME',
			'type' => 'varchar',
			'len'=>'255',
			'source'=>'non-db',
		),
	),

	'indices' => array (
		array (
			'name' =>'prospectlistsspk',
			'type' =>'primary',
			'fields'=>array('id')
		),
		array (
			'name' =>'idx_prospect_list_name',
			'type' =>'index',
			'fields'=>array('name')
		),
	),
	'relationships'=>array(
	  'prospectlists_assigned_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'prospectlists' , 'rhs_table'=> 'prospect_lists', 'rhs_key' => 'assigned_user_id',
   'relationship_type'=>'one-to-many')
)
);

VardefManager::createVardef('ProspectLists','ProspectList', array(
'assignable',
'team_security',
));
?>

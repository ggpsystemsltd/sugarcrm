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

$dictionary['Document'] = array('table' => 'documents',
								'unified_search' => true, 
								'unified_search_default_enabled' => true,
                                'fields' => array (

  'document_name' =>
  array (
    'name' => 'document_name',
    'vname' => 'LBL_NAME',
    'type' => 'varchar',
    'len' => '255',
    'required'=>true,
    'importable' => 'required',
  	'unified_search' => true,
  ),
  'name'=>
  array('name'=>'name', 'vname' => 'LBL_NAME', 'source'=>'non-db', 'type'=>'varchar'),
'doc_id' =>
  array (
  	'name' => 'doc_id',
  	'vname' => 'LBL_DOC_ID',
  	'type' => 'varchar',
  	'len' => '100',
  	'comment' => 'Document ID from documents web server provider',
  	'importable' => false,
  	'studio' => 'false',
  ),
  'doc_type' =>
  array (
  	'name' => 'doc_type',
  	'vname' => 'LBL_DOC_TYPE',
  	'type' => 'enum',
    'function' => 'getDocumentsExternalApiDropDown',
  	'len' => '100',
  	'comment' => 'Document type (ex: Google, box.net, LotusLive)',
    'popupHelp' => 'LBL_DOC_TYPE_POPUP',
    'massupdate' => false,
    'options' => 'eapm_list',
    'default'	=> 'Sugar',
  	'studio' => array('wirelesseditview'=>false, 'wirelessdetailview'=>false, 'wirelesslistview'=>false, 'wireless_basic_search'=>false),
  ),
'doc_url' =>
  array (
  	'name' => 'doc_url',
  	'vname' => 'LBL_DOC_URL',
  	'type' => 'varchar',
  	'len' => '255',
  	'comment' => 'Document URL from documents web server provider',
  	'importable' => false,
    'massupdate' => false,
  	'studio' => 'false',
  ),
  'filename' =>
  array (
     'name' => 'filename',
     'vname' => 'LBL_FILENAME',
     'type' => 'file',
     'source' => 'non-db',
     'comment' => 'The filename of the document attachment',
	 'required' => true,
     'noChange' => true,
     'allowEapm' => true,
     'fileId' => 'document_revision_id',
     'docType' => 'doc_type',
  ),

'active_date' =>
  array (
    'name' => 'active_date',
    'vname' => 'LBL_DOC_ACTIVE_DATE',
    'type' => 'date',
    'importable' => 'required',
	'required' => true,
    'display_default' => 'now',
  ),

'exp_date' =>
  array (
    'name' => 'exp_date',
    'vname' => 'LBL_DOC_EXP_DATE',
    'type' => 'date',
  ),

  'category_id' =>
  array (
    'name' => 'category_id',
    'vname' => 'LBL_SF_CATEGORY',
    'type' => 'enum',
    'len' => 100,
    'options' => 'document_category_dom',
    'reportable'=>true,
  ),

  'subcategory_id' =>
  array (
    'name' => 'subcategory_id',
    'vname' => 'LBL_SF_SUBCATEGORY',
    'type' => 'enum',
    'len' => 100,
    'options' => 'document_subcategory_dom',
    'reportable'=>true,
  ),

  'status_id' =>
  array (
    'name' => 'status_id',
    'vname' => 'LBL_DOC_STATUS',
    'type' => 'enum',
    'len' => 100,
    'options' => 'document_status_dom',
    'reportable'=>false,
  ),

  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_DOC_STATUS',
    'type' => 'varchar',
    'source' => 'non-db',
    'comment' => 'Document status for Meta-Data framework',
  ),

  'document_revision_id'=>
  array (
    'name' => 'document_revision_id',
    'vname' => 'LBL_LATEST_REVISION',
    'type' => 'varchar',
    'len' => '36',
    'reportable'=>false,
  ),

  'revisions' =>
  array (
    'name' => 'revisions',
    'type' => 'link',
    'relationship' => 'document_revisions',
    'source'=>'non-db',
    'vname'=>'LBL_REVISIONS',
  ),

  'revision' =>
  array (
    'name' => 'revision',
    'vname' => 'LBL_DOC_VERSION',
    'type' => 'varchar',
    'reportable'=>false,
    'required' => true,
    'source'=>'non-db',
    'importable' => 'required',
	'required' => true,
    'default' => '1',
  ),

  'last_rev_created_name' =>
  array (
    'name' => 'last_rev_created_name',
    'vname' => 'LBL_LAST_REV_CREATOR',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
    'last_rev_mime_type' =>
  array (
    'name' => 'last_rev_mime_type',
    'vname' => 'LBL_LAST_REV_MIME_TYPE',
    'type' => 'varchar',
    'reportable'=>false,
	'studio' => 'false',
    'source'=>'non-db'
  ),
   'latest_revision' =>
  array (
    'name' => 'latest_revision',
    'vname' => 'LBL_LATEST_REVISION',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'last_rev_create_date' =>
  array (
    'name' => 'last_rev_create_date',
    'type' => 'date',
    'table' => 'document_revisions',
    'link'  => 'revisions',
    'join_name'  => 'document_revisions',
    'vname'=>'LBL_LAST_REV_CREATE_DATE',
    'rname'=> 'date_entered',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'contracts' => array (
    'name' => 'contracts',
    'type' => 'link',
    'relationship' => 'contracts_documents',
    'source' => 'non-db',
    'vname' => 'LBL_CONTRACTS',
  ),
  //todo remove
  'leads' => array (
    'name' => 'leads',
    'type' => 'link',
    'relationship' => 'leads_documents',
    'source' => 'non-db',
    'vname' => 'LBL_LEADS',
  ),
  // Links around the world
  'accounts'=>
   array (
       'name' => 'accounts',
       'type' => 'link',
       'relationship' => 'documents_accounts',
       'source' => 'non-db',
       'vname' => 'LBL_ACCOUNTS_SUBPANEL_TITLE',
   ),
  'contacts'=>
   array (
       'name' => 'contacts',
       'type' => 'link',
       'relationship' => 'documents_contacts',
       'source' => 'non-db',
       'vname' => 'LBL_CONTACTS_SUBPANEL_TITLE',
   ),
  'opportunities'=>
   array (
       'name' => 'opportunities',
       'type' => 'link',
       'relationship' => 'documents_opportunities',
       'source' => 'non-db',
       'vname' => 'LBL_OPPORTUNITIES_SUBPANEL_TITLE',
   ),
  'cases'=>
   array (
       'name' => 'cases',
       'type' => 'link',
       'relationship' => 'documents_cases',
       'source' => 'non-db',
       'vname' => 'LBL_CASES_SUBPANEL_TITLE',
   ),
  'bugs'=>
   array (
       'name' => 'bugs',
       'type' => 'link',
       'relationship' => 'documents_bugs',
       'source' => 'non-db',
       'vname' => 'LBL_BUGS_SUBPANEL_TITLE',
   ),
  'quotes'=>
   array (
       'name' => 'quotes',
       'type' => 'link',
       'relationship' => 'documents_quotes',
       'source' => 'non-db',
       'vname' => 'LBL_QUOTES_SUBPANEL_TITLE',
   ),
  'products'=>
   array (
       'name' => 'products',
       'type' => 'link',
       'relationship' => 'documents_products',
       'source' => 'non-db',
       'vname' => 'LBL_PRODUCTS_SUBPANEL_TITLE',
   ),
  'related_doc_id' =>
  array (
    'name' => 'related_doc_id',
    'vname' => 'LBL_RELATED_DOCUMENT_ID',
    'reportable'=>false,
    'dbType' => 'id',
    'type' => 'varchar',
    'len' => '36',
  ),

  'related_doc_name' =>
  array (
    'name' => 'related_doc_name',
    'vname' => 'LBL_DET_RELATED_DOCUMENT',
    'type' => 'relate',
    'table' => 'documents',
    'id_name' => 'related_doc_id',
    'module' => 'Documents',
    'source' => 'non-db',
    'comment' => 'The related document name for Meta-Data framework',
  ),

  'related_doc_rev_id' =>
  array (
    'name' => 'related_doc_rev_id',
    'vname' => 'LBL_RELATED_DOCUMENT_REVISION_ID',
    'reportable'=>false,
    'dbType' => 'id',
    'type' => 'varchar',
    'len' => '36',
  ),

  'related_doc_rev_number' =>
  array (
    'name' => 'related_doc_rev_number',
    'vname' => 'LBL_DET_RELATED_DOCUMENT_VERSION',
    'type' => 'varchar',
    'source' => 'non-db',
    'comment' => 'The related document version number for Meta-Data framework',
  ),

  'is_template' =>
  array (
    'name' => 'is_template',
    'vname' => 'LBL_IS_TEMPLATE',
    'type' => 'bool',
    'default'=> 0,
    'reportable'=>false,
  ),
  'template_type' =>
  array (
    'name' => 'template_type',
    'vname' => 'LBL_TEMPLATE_TYPE',
    'type' => 'enum',
    'len' => 100,
    'options' => 'document_template_type_dom',
    'reportable'=>false,
  ),
//BEGIN field used for contract document subpanel.
  'latest_revision_name' =>
  array (
    'name' => 'latest_revision_name',
 	'vname' => 'LBL_LASTEST_REVISION_NAME', 	
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),

  'selected_revision_name' =>
  array (
    'name' => 'selected_revision_name',
  	'vname' => 'LBL_SELECTED_REVISION_NAME',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'contract_status' =>
  array (
    'name' => 'contract_status',
  	'vname' => 'LBL_CONTRACT_STATUS',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'contract_name'=>
  array (
    'name' => 'contract_name',
  	'vname' => 'LBL_CONTRACT_NAME',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'linked_id'=>
  array (
    'name' => 'linked_id',
  	'vname' => 'LBL_LINKED_ID',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'selected_revision_id'=>
  array (
    'name' => 'selected_revision_id',
  	'vname' => 'LBL_SELECTED_REVISION_ID',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'latest_revision_id'=>
  array (
    'name' => 'latest_revision_id',
  	'vname' => 'LBL_LATEST_REVISION_ID',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
  'selected_revision_filename'=>
  array (
    'name' => 'selected_revision_filename',
  	'vname' => 'LBL_SELECTED_REVISION_FILENAME',
    'type' => 'varchar',
    'reportable'=>false,
    'source'=>'non-db'
  ),
//END fields used for contract documents subpanel.

),
 'indices' => array (
       array('name' =>'idx_doc_cat', 'type' =>'index', 'fields'=>array('category_id', 'subcategory_id')),
       ),
 'relationships' => array (
    'document_revisions' => array('lhs_module'=> 'Documents', 'lhs_table'=> 'documents', 'lhs_key' => 'id',
                              'rhs_module'=> 'DocumentRevisions', 'rhs_table'=> 'document_revisions', 'rhs_key' => 'document_id',
                              'relationship_type'=>'one-to-many')

   ,'documents_modified_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Documents', 'rhs_table'=> 'documents', 'rhs_key' => 'modified_user_id',
   'relationship_type'=>'one-to-many')

   ,'documents_created_by' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'Documents', 'rhs_table'=> 'documents', 'rhs_key' => 'created_by',
   'relationship_type'=>'one-to-many')
    ),

);
VardefManager::createVardef('Documents','Document', array('default','assignable',
'team_security',
));
?>

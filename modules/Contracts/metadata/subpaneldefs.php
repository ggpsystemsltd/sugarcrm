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

 


$layout_defs['Contracts'] = array( 
	// sets up which panels to show, in which order, and with what linked_fields 
	'subpanel_setup' => array(
		'contract_documents' => array(
			'order' => 10,
			'module' => 'Documents',
			'sort_order' => 'asc',
			'sort_by' => 'document_name',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'function:get_contract_documents',
			'set_subpanel_data' => 'contracts_documents',
			'title_key' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
			'fill_in_additional_fields' => true,
			'refresh_page' => 1,			
		),
		'history' => array(
			'order' => 20,
			'sort_order' => 'desc',
			'sort_by' => 'notes.date_entered',
			'title_key' => 'LBL_NOTES_SUBPANEL_TITLE',
			'type' => 'collection',
			'subpanel_name' => 'history',   //this values is not associated with a physical file.
			'header_definition_from_subpanel'=> 'meetings',
			'module'=>'History',
			
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopCreateNoteButton'),
			),	
					
			'collection_list' => array(	
				'notes' => array(
					'module' => 'Notes',
					'subpanel_name' => 'default',
					'get_subpanel_data' => 'notes',
				),
			),
		),
		'contacts' => array(
			'order' => 30,
			'module' => 'Contacts',
			'sort_order' => 'asc',
			'sort_by' => 'last_name, first_name',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'contacts',
			'add_subpanel_data' => 'contact_id',
			'title_key' => 'LBL_CONTACTS_SUBPANEL_TITLE',
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopSelectButton', 'mode'=>'MultiSelect'),
			),
		),
		'products' => array(
			'order' => 40,
			'module' => 'Products',
			'sort_order' => 'desc',
			'sort_by' => 'date_purchased',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'products',
			'add_subpanel_data' => 'product_id',
			'title_key' => 'LBL_PRODUCTS_SUBPANEL_TITLE',
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopSelectButton'),
			),
		),
		'quotes' => array(
			'order' => 50,
			'module' => 'Quotes',
			'sort_order' => 'desc',
			'sort_by' => 'date_quote_expected_closed',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'quotes',
			'get_distinct_data'=> true,
			'add_subpanel_data' => 'quote_id',
			'title_key' => 'LBL_QUOTES_SUBPANEL_TITLE',
			'top_buttons' => array(
				array(
					'widget_class' => 'SubPanelTopSelectButton',
					'popup_module' => 'Quotes',
					'mode' => 'MultiSelect', 
					'initial_filter_fields' => array('account_id' => 'account_id'), //'account_name' => 'account_name'),   
				),
			),
		),
	),
);
?>

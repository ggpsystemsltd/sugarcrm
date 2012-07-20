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

 


$layout_defs['Products'] = array(
	// list of what Subpanels to show in the DetailView 
	'subpanel_setup' => array(
		'products' => array(
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Products'),
			),
			'order' => 10,
			'module' => 'Products',
			'sort_order' => 'desc',
			'sort_by' => 'date_purchased',
			'subpanel_name' => 'ForProducts',
			'get_subpanel_data' => 'related_products',
			'add_subpanel_data' => 'product_id',
			'title_key' => 'LBL_RELATED_PRODUCTS_TITLE',
			'get_distinct_data'=> true,
		),
		
		'notes' => array(
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopCreateButton'),
			),
			'order' => 20,
			'sort_order' => 'desc',
			'sort_by' => 'date_modified',
			'module' => 'Notes',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'notes',
			'add_subpanel_data' => 'note_id',
			'title_key' => 'LBL_NOTES_SUBPANEL_TITLE',
		),
		
        'documents' => array(
            'order' => 25,
            'module' => 'Documents',
            'subpanel_name' => 'default',
            'sort_order' => 'asc',
            'sort_by' => 'id',
            'title_key' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
            'get_subpanel_data' => 'documents',
            'top_buttons' => 
            array (
                0 => 
                array (
                    'widget_class' => 'SubPanelTopButtonQuickCreate',
                    ),
                1 => 
                array (
                    'widget_class' => 'SubPanelTopSelectButton',
                    'mode' => 'MultiSelect',
                    ),
                ),
        ),

		'contracts' => array(
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Contracts'),
			),
			'order' => 30,
			'sort_order' => 'desc',
			'sort_by' => 'date_modified',
			'module' => 'Contracts',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'contracts',
			'add_subpanel_data' => 'contract_id',
			'title_key' => 'LBL_CONTRACTS_SUBPANEL_TITLE',
		),		
	),
);
?>
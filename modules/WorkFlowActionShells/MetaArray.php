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



$process_dictionary['ActionsCreateStep1'] = Array('action' => 'CreateStep1',
'elements' => array(

'update' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'action_type',
			'value' => 'update',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_UPDATE_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'update',
			'related' => '0',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_UPDATE_TITLE', 'text_type' => 'static'),
			//end bottom options
			),
		//end bottom
		),
//end update array
),	
'update_rel' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'action_type',
			'value' => 'update_rel',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_UPDATE_REL_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'update_rel',
			'related' => Array('count' => '1', 'rel1_field' => 'rel_module'),
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_UPDATE_REL', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_RECORD', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'rel_module',
						'value_type' => 'relrel_module',
						'jscript_function' => 'get_single_selector',
						'jscript_content' => array('self', 'rel_module', 'field' ,'rel_filter')
						),	
			//end bottom options
			),
		//end bottom
		),
//end update_rel array	
),
'new' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'action_type',
			'value' => 'new',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_NEW_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'new',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_NEW', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_RECORD', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'action_module',
						'value_type' => 'module',
						'jscript_function' => 'get_single_selector',
						'jscript_content' => array('self', 'action_module', 'module_list' ,'singular')
						),	
			//end bottom options
			),
		//end bottom
		),
//end new array	
),
'new_rel' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'action_type',
			'value' => 'new_rel',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_NEW_REL_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'new_rel',
			'related' => Array('count' => '1', 'rel1_field' => 'rel_module'),
			'options' => Array(
				'1' => Array('vname' => 'LBL_ACTION_NEW_REL', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_RELATED_RECORD', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'rel_module',
						'value2' => 'action_module',
						'value_type' => 'relrel_module',
						'jscript_function' => 'get_rel_selector',
						'jscript_content' => array('self')
						),							
			//end bottom options
			),
		//end bottom
		),
//end new_rel array	
),
),

'hide_others' => array(
					'target_field' => 'action_type',
					'target_element' => array(''),	
					
				),
//End process dictionary ActionsCreateStep1
);

?>
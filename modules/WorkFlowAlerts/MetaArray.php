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

	
global $alert_meta_user_array;
$alert_meta_user_array = Array(
'user1' => Array(
				'user_display_type' => 'user1'
				,'array_type' => 'future'
				,'field_value' => 'created_by'
				,'href_text' => 'LBL_BLANK'
				,'href_text2' => 'LBL_USER'		//href
				,'href_text3' => 'LBL_USER1'
				,'base_type' => 'all'
			)
,'user2' => Array(
				'user_display_type' => 'user2'
				,'array_type' => 'past'
				,'field_value' => 'modified_user_id'
				,'href_text' => 'LBL_BLANK'
				,'href_text2' => 'LBL_USER'			//href
				,'href_text3' => 'LBL_USER2'
				,'base_type' => 'all'
			)
			/*
,'user3' => Array(
				'user_display_type' => 'user3'
				,'array_type' => 'future'
				,'field_value' => 'modified_user_id'
				,'href_text' => 'LBL_USER3'			
				,'href_text2' => 'LBL_USER'				//href
				,'href_text3' => 'LBL_USER3b'
				,'base_type' => 'normal'
			)
*/			
,'user4' => Array(
				'user_display_type' => 'user4'
				,'array_type' => 'future'
				,'field_value' => 'assigned_user_id'
				,'href_text' => 'LBL_BLANK'			
				,'href_text2' => 'LBL_USER'				//href
				,'href_text3' => 'LBL_USER4'
				,'base_type' => 'all'
			)
,'user5' => Array(
				'user_display_type' => 'user5'
				,'array_type' => 'past'
				,'field_value' => 'assigned_user_id'
				,'href_text' => 'LBL_BLANK'			
				,'href_text2' => 'LBL_USER'				//href
				,'href_text3' => 'LBL_USER5'
				,'base_type' => 'all'
			)
);

$process_dictionary['AlertsCreateStep1'] = Array('action' => 'CreateStep1',
'elements' => array(

'current_user' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'current_user',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_CURRENT_USER_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'current_user',
			'show_address_type' => false,
			'related' => '0',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_CURRENT_USER_TITLE', 'text_type' => 'static'),
			//end bottom options
			),
		//end bottom
		),
//end current user array
),	
'rel_user' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'rel_user',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_REL_USER_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'rel_user',
			'show_address_type' => false,
			'related' => Array('count' => '2', 'rel1_field' => 'rel_module1', 'rel2_field'=> 'rel_module2'),
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_REL_USER', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_RECORD', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'rel_module1',
						'value2' => 'rel_module2',
						'value_type' => 'relrel_module',
						'jscript_function' => 'get_selector',
						'jscript_content' => array('self')
						),	
			//end bottom options
			),
		//end bottom
		),
//end rel_user array	
),
'rel_user_custom' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'rel_user_custom',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_REL_USER_CUSTOM_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'rel_user_custom',
			'show_address_type' => false,
			'related' => Array('count' => '2', 'rel1_field' => 'rel_module1', 'rel2_field'=> 'rel_module2'),
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_REL_USER_CUSTOM', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_RECORD', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'rel_module1',
						'value2' => 'rel_module2',
						'value_type' => 'relrel_module',
						'jscript_function' => 'get_selector',
						'jscript_content' => array('self')
						),	
			//end bottom options
			),
		//end bottom
		),
//end rel_user_custom array	
),
'trig_user_custom' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'trig_user_custom',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_TRIG_USER_CUSTOM_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'trig_user_custom',
			'show_address_type' => false,
			'related' => '0',
				'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_TRIG_USER_CUSTOM', 'text_type' => 'static'),
			//end bottom options
			),
		//end bottom
		),
//end trig_user_custom array	
),
'specific_user' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'specific_user',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_USER_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'specific_user',
			'show_address_type' => true,
			'related' => '0',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_USER_TITLE', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_USER', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'field_value',
						'value_type' => 'special_exp',
						'value_exp_type' => 'assigned_user_id',
						'jscript_function' => 'get_single_selector',
						'jscript_content' => array('self', 'assigned_user_id')
						),	
			//end bottom options
			),
		//end bottom
		),
//end specific_user array	
),

'specific_team' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'specific_team',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_TEAM_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'specific_team',
			'show_address_type' => true,
			'related' => '0',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_TEAM_TITLE', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_TEAM', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'field_value',
						'value_type' => 'special_exp',
						'value_exp_type' => 'team_list',
						'jscript_function' => 'get_single_selector',
						'jscript_content' => array('self', 'team_list')
						),	
			//end bottom options
			),
		//end bottom
		),
//end specific_team array	
),
'specific_role' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'specific_role',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_ROLE_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'specific_role',
			'show_address_type' => true,
			'related' => '0',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_ROLE_TITLE', 'text_type' => 'static'),
				'2' => Array(
						'vname' => 'LBL_ROLE', 
						'default' => 'on',
						'text_type' => 'dynamic',
						'type'=> 'href',
						'value' => 'field_value',
						'value_type' => 'special_exp',
						'value_exp_type' => 'role',
						'jscript_function' => 'get_single_selector',
						'jscript_content' => array('self', 'role')
						),	
			//end bottom options
			),
		//end bottom
		),
//end specific_role array	
),
'login_user' => 
	Array(
		'trigger_type' => 'non_time',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'login_user',
			'related' => '0',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_LOGIN_USER_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'login_user',
			'show_address_type' => true,
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_LOGIN_USER_TITLE', 'text_type' => 'static'),
			//end bottom options
			),
		//end bottom
		),
//end login_user array	
),


//Begin Assigned Team Target
'assigned_team_target' => 
	Array(
		'trigger_type' => 'all',
		'top' => Array(
			'type' => 'radio',
			'name' => 'user_type',
			'value' => 'assigned_team_target',	
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE'),
			//end top options
			),
		//end top
		),
		'bottom' => Array(
			'type' => 'text',
			'value' => 'assigned_team_target',
			'show_address_type' => true,
			'related' => '0',
			'options' => Array(
				'1' => Array('vname' => 'LBL_ALERT_SPECIFIC_TEAM_TARGET', 'text_type' => 'static'),
			//end bottom options
			),
		//end bottom
		),
),
//End Specific Team Target

), //End All Elements

'hide_others' => array(
					'target_field' => 'user_type',
					'target_element' => array(
						'specific_user' => array('specific_user', 'specific_team', 'specific_role', 'login_user'),
						'specific_team' => array('specific_user', 'specific_team', 'specific_role', 'login_user'),
						'specific_role' => array('specific_user', 'specific_team', 'specific_role', 'login_user'),
						'login_user' => array('specific_user', 'specific_team', 'specific_role', 'login_user'),
					),	
					
				),
//End process dictionary AlertsCreateStep1
);

?>
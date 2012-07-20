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

/*********************************************************************************

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/
global $app_strings; // coming from an include in a method call
global $current_user;


require_once("include/SugarRouting/SugarRouting.php");

$ie = new InboundEmail();
$rules = new SugarRouting($ie, $current_user);
$actions = $rules->getActionsDOM();

$strings = array();
foreach($app_strings as $k => $v) {
	if(strpos($k, "LBL_ROUTING_") !== false) {
		$strings[$k] = $v;
	}
}


$sugarDependentDropdown = array(
	/*
	 * Turn on heavy logging and report errors
	 */
	'debugMode' => false,

	/**
	 * This is the actions' dependent dropdown metadata for Email 2.0's Rules
	 * Wizard
	 */
	'actions' => array(
		/*
		 * The array values below will be merged into all elements and handlers.
		 * This is a good way to set a global that is overridable at the
		 * individual element level.
		 */
		'always_merge' => array(
			/*
			 * This flag tells the render engine to display all elements when
			 * called.  If set to 'false', the engine will allow 'onchange' calls to
			 * render subsequent elements.
			 */
			'force_render' => false,
			/*
			 * Used by Email 2.0 - this helps zero in on the DD-type when we
			 * merge it with a saved Rule.
			 */
			'actionType'	=> 'actions',
			/*
			 * User defined function to call when an element's value is changed
			 * (select type only)
			 */
			'onchange'	=> '',
		),
		/*
		 * This array will contain as many elements as there are dependencies.  It
		 * will be iterated through.  The key is used for ordering; the SDD class
		 * will ksort() this array
		 */
		'elements' => array(
			/*
			 * Initial dropdown. Define the necessaries.
			 */
			'element0'	=> array(
				/*
				 * 'name' will be prepended by the 'grouping' value and a delimiter "::".  It then will be prepended by
				 * a numeric index in increments of 100. If the user inserts actions inbetween retrieved action rows,
				 * the index will be 1/2 of the delta (i. e., "50" if inserted between index 0 and index 100).
				 * 
				 * This element will have the following as it's name in the form:
				 * 		"actionGroup::0::action0"
				 * Subsequent elements will have the following: 
				 * 		"actionGroup::100::action0"
				 */
				'name'		=> 'action0',	// name of form element
				/*
				 * The above applies to "id" in addition to:
				 * "id" will further be appended by ":::" and a numeric index in increments of 1 (0, 1, 2, 3, etc).  This is
				 * to allow us to identify which element is currently being acted upon.
				 * 
				 * The example below will ultimately have the id "actionGroup::0::action0" in the DOM.
				 */
				'id'		=> 'action0',	// id of form element - an internal index will be appended to this value 0, 100, 200, etc.
				/*
				 * 'type' denotes what kind of form element you wish to display.  Of course "select" (drop-down) is the
				 * default.
				 * Valid values are "select" | "input" (text) | "checkbox" | "none".
				 */
				'type'		=> 'select',
				/*
				 * If using multiple dependent-dropdowns on a single page, you
				 * must differentiate them via this flag.  This value is
				 * arbitrary, but must be different from other sets of DDs.
				 */
				'grouping'	=> 'actionGroup',
				/*
				 * In the interests of keeping this simple, you can pass an associative array as the argument for values.
				 * However, you may also pass a string which will be eval()'d in JS.  You can write a custom function to
				 * return a Javascript object as an associative array which will be iterated over and rendered as options
				 * for a dropdown.  The return must be a JS object.
				 */
				'values'	=> $actions,	// assoc array of dropdown values, if a STRING, it will be eval'd to lazy load the values
				/*
				 * The 'selected' value must match one of the keys in the above array.  If lazy-loading through a JS
				 * call, there is a chance race-condition that may result in the selected value not being defaulted.  In
				 * this case, preload the values into local memory and retrieve via a non-async JS call.
				 */
				'selected'	=> '',			// initially selected value (key value)
				/*
				 * This attribute should map to a JS method/function that is loaded and available.  It will be called on
				 * initialization and can cascade the results to this element's children (this is how Email 2.0 Rules
				 * Wizard works).  If force_render is set to true, this call will still be made.
				 */
				'onchange'	=> 'SUGAR.routing.handleDependentDropdown(this, \'actions\');',	// javascript onchange() call
				/*
				 * The text that can accompany this element.  Any string value is valid.  Simple HTML formatting will be
				 * honored (<B>, <I>, <EM>, etc.).
				 */
				'label'		=> '&nbsp;',
				/*
				 * This attribute dictates where the above text will display relative to this element.  Valid values are
				 * "top" | "bottom" | "left" | "right"
				 */
				'label_pos'	=> 'left',
			),
	
			/*
			 * Subsequent dropdown/form elements must contain an array keyed to dropdown1's selected value.
			 * I.e.:
			 * if 'values' is
			 *		array(
			 *			'option1' => 'This is option one',
			 *			'option2' => 'This is option two',
			 *		);
			 * dropdown2 must contain an array 'handlers' keyed by "option1" and "option2"
			 */
			'element1'	=> array(
				'name'		=> 'action1',	// name of form element
				'id'		=> 'action1',	// id of form element - an internal index will be appended to this value 0, 100, 200, etc.
				'label'		=> '',			// label to be displayed next/above dropdown
				'label_pos'	=> 'none',		// default 'left'
				'grouping'	=> 'actionGroup',
				/*
				 * Correspond to the values in the preceding element for dependencies
				 * - will be merged with parent's values (minus 'handlers' values)
				 * - keys will override parent values
				 */
				'handlers'	=> array(
					/*
					 * If the selected value is all that you are interested in,
					 * create blank arrays like below. In this particular case
					 * the form element "action1" will hold the value
					 * "mark_read" which will be passed when the form is
					 * submitted.
					 */
					'mark_read'		=> array(),
					'mark_unread'	=> array(),
					'mark_flagged'	=> array(),
					/*
					 * If further processing is required (like more dropdowns
					 * or input fields), create handlers that have "onchange"
					 * handlers to further process subsequent elements.
					 * 
					 * See SUGAR.routing.handleDependentDropdown() found in
					 * "include/SugarDependentDropdown/javascript/SugarDependentDropdown.
					 * js" for an example of how to continue cascading the
					 * dropdowns.
					 */
					'move_mail'		=> array(
						//'name'		=> 'move_email_select',
						'type'		=> 'select', // create a 2nd order dropdown
						'values'	=> 'SUGAR.routing.ui.getElementValues("move_mail");',
						'label'		=> $strings['LBL_ROUTING_TO'],	// label to be displayed next/above dropdown
						'label_pos'	=> 'left',	// show "to" before this dropdown the dropdown
						//'onchange'	=> '', // override to prevent double-triggering of setup cascade calls
					),
					'copy_mail'		=> array(
						'type'		=> 'select', // create a 2nd order dropdown
						'values'	=> 'SUGAR.routing.ui.getElementValues("move_mail");',
						'label'		=> $strings['LBL_ROUTING_TO'],	// label to be displayed next/above dropdown
						'label_pos'	=> 'left',	// show "to" before this dropdown the dropdown
					),
					
					'forward' =>	array(
						'type'		=> 'input',
						'label'		=> $strings['LBL_ROUTING_TO_ADDRESS'],
						'label_pos'	=> 'left',
					),
					'reply' =>		array(
						'type'		=> 'select',
						'label'		=> $strings['LBL_ROUTING_WITH_TEMPLATE'],
						'label_pos'	=> 'left',
						'values'	=> 'SUGAR.routing.ui.getElementValues("email_templates");',
					),
					
					'delete_mail'	=> array(
						'onchange'	=> 'SUGAR.routing.handleDependentDropdown(this, \'actions\');',	// javascript onchange() call
						'type'		=> 'none',
					),
					
					
					/* not implemented yet
					'delete_bean'	=> array(
						'onchange'	=> 'SUGAR.routing.handleDependentDropdown(this, \'actions\');',	// javascript onchange() call
					),
					'delete_file'	=> array(
						'onchange'	=> 'SUGAR.routing.handleDependentDropdown(this, \'actions\');',	// javascript onchange() call
					),*/
				),
			),
		),	
	),
	/**
	 * This is the criteria dependent dropdown metadata for Email 2.0's Rules
	 * Wizard
	 */
	'criteria' => array(
		'always_merge' => array(
			'force_render' => false,
			'grouping'	=> 'criteriaGroup',
			'onchange'	=> 'SUGAR.routing.handleDependentDropdown(this, \'criteria\');',	// javascript onchange() call
			'label'		=> '&nbsp;',
			'label_pos'	=> 'left',
			'actionType'	=> 'criteria',
		),
		'elements' => array(
			'element0'	=> array(
				'name'		=> 'crit0',	// name of form element
				'id'		=> 'crit0id',	// id of form element - an internal index will be appended to this value 0, 100, 200, etc.
				'type'		=> 'select',
				'values'	=> 'SUGAR.routing.matchDom;',	// assoc array of dropdown values, if a STRING, it will be eval'd to lazy load the values
				'selected'	=> '',			// initially selected value (key value)
			),
			'element1' => array(
				'name'		=> 'crit1',
				'id'		=> 'crit1id',
				'type'		=> 'select',
				'values'	=> 'SUGAR.routing.matchTypeDom;',
				'handlers' 	=> array(
					'from_addr' => array(),
					'to_addr' => array(),
					'cc_addr' => array(),
					'name' => array(),
					'description' => array(),
					'priority_high' => array(
						'type' => 'none',
						'label'	=> $app_strings['LBL_ROUTING_FLAGGED'],
					),
					'priority_normal' => array(
						'type' => 'none',
						'label'	=> $app_strings['LBL_ROUTING_FLAGGED'],
					),
					'priority_low' => array(
						'type' => 'none',
						'label'	=> $app_strings['LBL_ROUTING_FLAGGED'],
					),
				),
			),
			'element2' => array(
				'name'		=> 'crit2',
				'id'		=> 'crit2id',
				'type'		=> 'input',
				'values'	=> '',
			),
		),
	),
	/**
	 * This is the "simple" (non-cascasding, force-rendered) version of the
	 * above.  It has since been deprecated, but is useful to demonstrate
	 * how to make relatively static dependent dropdown.
	 */
	'criteriaSimple' => array(
		'always_merge' => array(
			'force_render' => true,
			'grouping'	=> 'criteriaGroup',
			'onchange'	=> '',	// javascript onchange() call
			'label'		=> '&nbsp;',
			'label_pos'	=> 'left',
		),
		'elements' => array(
			'element0'	=> array(
				'name'		=> 'crit0',	// name of form element
				'id'		=> 'crit0id',	// id of form element - an internal index will be appended to this value 0, 100, 200, etc.
				'type'		=> 'select',
				'values'	=> 'SUGAR.routing.matchDom;',	// assoc array of dropdown values, if a STRING, it will be eval'd to lazy load the values
				'selected'	=> '',			// initially selected value (key value)
			),
			'element1' => array(
				'name'		=> 'crit1',
				'id'		=> 'crit1id',
				'type'		=> 'select',
				'values'	=> 'SUGAR.routing.matchTypeDom;',
			),
			'element2' => array(
				'name'		=> 'crit2',
				'id'		=> 'crit2id',
				'type'		=> 'input',
				'values'	=> '',
			),
		),
	),
);
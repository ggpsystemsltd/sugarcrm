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


// this is a list of what values are expected for a given custom field type
// will eventually be moved to the SugarFields classes
$custom_field_meta = array(
	'address' => array(
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'len',
		'name',
		'reportable'
	),
	'bool' => array(
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'name',
		'reportable'
	),
	'currency' => array(
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'name',
		'reportable'
	),
	'date' => array(
		'audited',
		'default_value',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'massupdate',
		'name',
		'reportable',
		'required'
	),
	'enum' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'massupdate',
		'name',
		'options',
		'reportable',
		'required'
	),
	'float' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'len',
		'name',
		'precision',
		'reportable',
		'required'
	),
	'html' => array(
		'audited',
		'duplicate_merge',
		'ext4',
		'help',
		'label',
		'label_value',
		'name',
		'reportable',
		'required'
	),
	'int' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'len',
		'max',
		'min',
		'name',
		'reportable',
		'required'
	),
	'multienum' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'massupdate',
		'name',
		'options',
		'reportable',
		'required'
	),
	'phone' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'len',
		'name',
		'reportable',
		'required'
	),
	'radioenum' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'massupdate',
		'name',
		'options',
		'reportable',
		'required'
	),
	'relate' => array(
		'audited',
		'duplicate_merge',
		'ext2',
		'help',
		'label',
		'label_value',
		'name',
		'reportable',
		'required'
	),
	'text' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'name',
		'reportable',
		'required'
	),
	'varchar' => array(
		'audited',
		'default',
		'duplicate_merge',
		'help',
		'label',
		'label_value',
		'len',
		'name',
		'reportable',
		'required'
	)
);

// create or update an existing custom field
$server->register(
	'set_custom_field',
	array(
		'session' => 'xsd:string',
		'module_name' => 'xsd:string',
		'type' => 'xsd:string',
		'properties' => 'tns:name_value_list',
		'add_to_layout' => 'xsd:int',
	),
	array(
		'return' => 'tns:error_value'
	),
	$NAMESPACE
);

function set_custom_field($session, $module_name, $type, $properties, $add_to_layout) {
	global $current_user;
	global $beanList, $beanFiles;
	global $custom_field_meta;

	$error = new SoapError();

	$request_arr = array(
		'action' => 'SaveField',
		'is_update' => 'true',
		'module' => 'ModuleBuilder',
		'view_module' => $module_name,
		'view_package' => 'studio'
	);

	// ERROR CHECKING
	if(!validate_authenticated($session)) {
		$error->set_error('invalid_login');
		return $error->get_soap_array();
	}

	if (!is_admin($current_user)) {
		$error->set_error('no_admin');
		return $error->get_soap_array();
	}

	if(empty($beanList[$module_name])){
		$error->set_error('no_module');
		return $error->get_soap_array();
	}

	if (empty($custom_field_meta[$type])) {
		$error->set_error('custom_field_type_not_supported');
		return $error->get_soap_array();
	}

	$new_properties = array();
	foreach($properties as $value) {
		$new_properties[$value['name']] = $value['value'];
	}

	foreach ($custom_field_meta[$type] as $property) {
		if (!isset($new_properties[$property])) {
			$error->set_error('custom_field_property_not_supplied');
			return $error->get_soap_array();
		}

		$request_arr[$property] = $new_properties[$property];
	}

	// $request_arr should now contain all the necessary information to create a custom field
	// merge $request_arr with $_POST/$_REQUEST, where the action_saveField() method expects them
	$_REQUEST = array_merge($_REQUEST, $request_arr);
	$_POST = array_merge($_POST, $request_arr);

	require_once('include/MVC/Controller/SugarController.php');
	require_once('modules/ModuleBuilder/controller.php');
	require_once('modules/ModuleBuilder/parsers/ParserFactory.php');

	$mbc = new ModuleBuilderController();
	$mbc->setup();
	$mbc->action_SaveField();

	// add the field to the given module's EditView and DetailView layouts
	if ($add_to_layout == 1) {
		$layout_properties = array(
			'name' => $new_properties['name'],
			'label' => $new_properties['label']
		);

		if (isset($new_properties['customCode'])) {
			$layout_properties['customCode'] = $new_properties['customCode'];
		}
		if (isset($new_properties['customLabel'])) {
			$layout_properties['customLabel'] = $new_properties['customLabel'];
		}

		// add the field to the DetailView
		$parser = ParserFactory::getParser('layoutview', FALSE);
		$parser->init($module_name, 'DetailView', FALSE);

		$parser->_addField($layout_properties);
		$parser->writeWorkingFile();
		$parser->handleSave();

		unset($parser);

		// add the field to the EditView
		$parser = ParserFactory::getParser('layoutview', FALSE);
		$parser->init($module_name, 'EditView', FALSE);

		$parser->_addField($layout_properties);
		$parser->writeWorkingFile();
		$parser->handleSave();
	}

	return $error->get_soap_array();
}
?>
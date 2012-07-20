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

 * Description:  This class is used to include the json server config inline. Previous method
 * of using <script src=json_server.php></script> causes multiple server hits per page load
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

global $app_strings, $json;
$json = getJSONobj();

class json_config {
	var $global_registry_var_name = 'GLOBAL_REGISTRY';

	function get_static_json_server($configOnly = true, $getStrings = false, $module = null, $record = null, $scheduler = false) {
		global $current_user;
		$str = '';
		$str .= $this->getAppMetaJSON($scheduler);
		if(!$configOnly) {
			$str .= $this->getFocusData($module, $record);
			if($getStrings)	$str .= $this->getStringsJSON($module);
		}
		$str .= $this->getUserConfigJSON();

		return $str;
	}

	function getAppMetaJSON($scheduler = false) {

		global $json, $sugar_config;

		$str = "\nvar ". $this->global_registry_var_name." = new Object();\n";
		$str .= "\n".$this->global_registry_var_name.".config = {\"site_url\":\"".getJavascriptSiteURL()."\"};\n";

		$str .= $this->global_registry_var_name.".meta = new Object();\n";
		$str .= $this->global_registry_var_name.".meta.modules = new Object();\n";

		/*
		$modules_arr = array('Meetings','Calls');
		$meta_modules = array();

		global $beanFiles,$beanList;
		//header('Content-type: text/xml');
		foreach($modules_arr as $module) {
			require_once($beanFiles[$beanList[$module]]);
			$focus = new $beanList[$module];
			$meta_modules[$module] = array();
			$meta_modules[$module]['field_defs'] = $focus->field_defs;
		}

		$str .= $this->global_registry_var_name.".meta.modules.Meetings = ". $json->encode($meta_modules['Meetings'])."\n";
		$str .= $this->global_registry_var_name.".meta.modules.Calls = ". $json->encode($meta_modules['Calls'])."\n";
		*/
		return $str;
	}

	function getUserConfigJSON() {
		global $timedate;
		global $current_user, $sugar_config;
		$json = getJSONobj();
		if(isset($_SESSION['authenticated_user_theme']) && $_SESSION['authenticated_user_theme'] != '')	{
			$theme = $_SESSION['authenticated_user_theme'];
		}
		else {
			$theme = $sugar_config['default_theme'];
		}
		$user_arr = array();
		$user_arr['theme'] = $theme;
		$user_arr['fields'] = array();
		$user_arr['module'] = 'User';
		$user_arr['fields']['id'] = $current_user->id;
		$user_arr['fields']['user_name'] = $current_user->user_name;
		$user_arr['fields']['first_name'] = $current_user->first_name;
		$user_arr['fields']['last_name'] = $current_user->last_name;
		$user_arr['fields']['full_name'] = $current_user->full_name;
		$user_arr['fields']['email'] = $current_user->email1;
		$user_arr['fields']['gmt_offset'] = $timedate->getUserUTCOffset();
		$user_arr['fields']['date_time_format'] = $current_user->getUserDateTimePreferences();
		$str = "\n".$this->global_registry_var_name.".current_user = ".$json->encode($user_arr).";\n";
		return $str;
	}

	function getFocusData($module, $record) {
		global $json;
		if (empty($module)) {
			return '';
		}
		else if(empty($record)) {
			return "\n".$this->global_registry_var_name.'["focus"] = {"module":"'.$module.'",users_arr:[],fields:{"id":"-1"}}'."\n";
		}

		$module_arr = $this->meeting_retrieve($module, $record);
		return "\n".$this->global_registry_var_name."['focus'] = ". $json->encode($module_arr).";\n";
	}

	function meeting_retrieve($module, $record) {
		global $json, $response;
		global $beanFiles, $beanList;
		require_once($beanFiles[$beanList[$module]]);
		$focus = new $beanList[$module];

		if(empty($module) || empty($record)) {
			return '';
		}

		$focus->retrieve($record);
		$module_arr = $this->populateBean($focus);

		if($module == 'Meetings') {
			$users = $focus->get_meeting_users();
		}
		else if ( $module == 'Calls') {
			$users = $focus->get_call_users();
		}

		$module_arr['users_arr'] = array();

		foreach($users as $user) {
			array_push($module_arr['users_arr'],  $this->populateBean($user));
		}

		$module_arr['orig_users_arr_hash'] = array();

		foreach($users as $user) {
			$module_arr['orig_users_arr_hash'][$user->id] = '1';
		}

		$module_arr['contacts_arr'] = array();

		$focus->load_relationships('contacts');
		$contacts=$focus->get_linked_beans('contacts','Contact');
		foreach($contacts as $contact) {
			array_push($module_arr['users_arr'], $this->populateBean($contact));
	  	}
		$module_arr['leads_arr'] = array();
        $focus->load_relationships('leads');
		$leads=$focus->get_linked_beans('leads','Lead');
		foreach($leads as $lead) {
			array_push($module_arr['users_arr'], $this->populateBean($lead));
	  	}

		return $module_arr;
	}

	function getStringsJSON($module) {
	  global $current_language;
	  $currentModule = 'Calendar';
	  $mod_list_strings = return_mod_list_strings_language($current_language,$currentModule);

	  global $json;
	  $str = "\n".$this->global_registry_var_name."['calendar_strings'] =  {\"dom_cal_month_long\":". $json->encode($mod_list_strings['dom_cal_month_long']).",\"dom_cal_weekdays_long\":". $json->encode($mod_list_strings['dom_cal_weekdays_long'])."}\n";
	  if(empty($module)) {
		$module = 'Home';
	  }
	  $currentModule = $module;
	  $mod_strings = return_module_language($current_language,$currentModule);
	  return  $str . "\n".$this->global_registry_var_name."['meeting_strings'] =  ". $json->encode($mod_strings)."\n";
	}

	// HAS MEETING SPECIFIC CODE:
	function populateBean(&$focus) {
		require_once('include/utils/db_utils.php');
		$all_fields = $focus->column_fields;
		// MEETING SPECIFIC
		$all_fields = array_merge($all_fields,array('required','accept_status','name')); // need name field for contacts and users
		//$all_fields = array_merge($focus->column_fields,$focus->additional_column_fields);

		$module_arr = array();

		$module_arr['module'] = $focus->object_name;

		$module_arr['fields'] = array();

		foreach($all_fields as $field) {
			if(isset($focus->$field) && !is_object($focus->$field)) {
				$focus->$field =  from_html($focus->$field);
				$focus->$field =  preg_replace("/\r\n/","<BR>",$focus->$field);
				$focus->$field =  preg_replace("/\n/","<BR>",$focus->$field);
				$module_arr['fields'][$field] = $focus->$field;
			}
		}
			$GLOBALS['log']->debug("JSON_SERVER:populate bean:");
			return $module_arr;
		}
	}
?>

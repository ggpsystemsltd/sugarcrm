<?php
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

 * Description:  Includes generic helper functions used throughout the application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


include('include/utils/security_utils.php');

function make_sugar_config(&$sugar_config)
{
    /* used to convert non-array config.php file to array format */
	global $admin_export_only;
	global $cache_dir;
	global $calculate_response_time;
	global $create_default_user;
	global $dateFormats;
	global $dbconfig;
	global $dbconfigoption;
	global $default_action;
	global $default_charset;
	global $default_currency_name;
	global $default_currency_symbol;
	global $default_currency_iso4217;
	global $defaultDateFormat;
	global $default_language;
	global $default_module;
	global $default_password;
	global $default_theme;
	global $defaultTimeFormat;
	global $default_user_is_admin;
	global $default_user_name;
	global $disable_export;
	global $disable_persistent_connections;
	global $display_email_template_variable_chooser;
	global $display_inbound_email_buttons;
	global $history_max_viewed;
	global $host_name;
	global $import_dir;
	global $languages;
	global $list_max_entries_per_page;
	global $lock_default_user_name;
	global $log_memory_usage;
	global $requireAccounts;
	global $RSS_CACHE_TIME;
	global $FAQ_CACHE_TIME;
	global $session_dir;
	global $site_URL;
	global $site_url;
	global $sugar_version;
	global $timeFormats;
	global $tmp_dir;
	global $translation_string_prefix;
	global $unique_key;
	global $upload_badext;
	global $upload_dir;
	global $upload_maxsize;
	global $list_max_entries_per_subpanel;

	// assumes the following variables must be set:
   // $dbconfig, $dbconfigoption, $cache_dir, $import_dir, $session_dir, $site_URL, $tmp_dir, $upload_dir

   $sugar_config = array (
   'admin_export_only' => empty($admin_export_only) ? false : $admin_export_only,
	'export_delimiter' => empty($export_delimiter) ? ',' : $export_delimiter,
   'cache_dir' => empty($cache_dir) ? 'cache/' : $cache_dir,
   'calculate_response_time' => empty($calculate_response_time) ? true : $calculate_response_time,
   'create_default_user' => empty($create_default_user) ? false : $create_default_user,
   'date_formats' => empty($dateFormats) ? array(
		'Y-m-d'=>'2006-12-23',
		'd-m-Y' => '23-12-2006',
      	'm-d-Y'=>'12-23-2006',
		'Y/m/d'=>'2006/12/23',
		'd/m/Y' => '23/12/2006',
		'm/d/Y'=>'12/23/2006',
		'Y.m.d' => '2006.12.23',
		'd.m.Y' => '23.12.2006',
		'm.d.Y' => '12.23.2006'
		) : $dateFormats,
   'dbconfig' => $dbconfig,  // this must be set!!
   'dbconfigoption' => $dbconfigoption,  // this must be set!!
   'default_action' => empty($default_action) ? 'index' : $default_action,
   'default_charset' => empty($default_charset) ? 'UTF-8' : $default_charset,
   'default_currency_name' => empty($default_currency_name) ? 'US Dollar' : $default_currency_name,
   'default_currency_symbol' => empty($default_currency_symbol) ? '$' : $default_currency_symbol,
   'default_currency_iso4217' => empty($default_currency_iso4217) ? '$' : $default_currency_iso4217,
   'default_date_format' => empty($defaultDateFormat) ? 'Y-m-d' : $defaultDateFormat,
   'default_language' => empty($default_language) ? 'en_us' : $default_language,
   'default_module' => empty($default_module) ? 'Cases' : $default_module,
   'default_password' => empty($default_password) ? '' : $default_password,
   'default_theme' => empty($default_theme) ? 'Sugar' : $default_theme,
   'default_time_format' => empty($defaultTimeFormat) ? 'H:i' : $defaultTimeFormat,
   'default_user_is_admin' => empty($default_user_is_admin) ? false : $default_user_is_admin,
   'default_user_name' => empty($default_user_name) ? '' : $default_user_name,
   'disable_export' => empty($disable_export) ? false : $disable_export,
   'disable_persistent_connections' => empty($disable_persistent_connections) ? false : $disable_persistent_connections,
   'display_email_template_variable_chooser' => empty($display_email_template_variable_chooser) ? false : $display_email_template_variable_chooser,
   'display_inbound_email_buttons' => empty($display_inbound_email_buttons) ? false : $display_inbound_email_buttons,
   'history_max_viewed' => empty($history_max_viewed) ? 10 : $history_max_viewed,
   'host_name' => empty($host_name) ? 'localhost' : $host_name,
   'import_dir' => $import_dir,  // this must be set!!
   'languages' => empty($languages) ? array('en_us' => 'US English') : $languages,
   'list_max_entries_per_page' => empty($list_max_entries_per_page) ? 20 : $list_max_entries_per_page,
   'list_max_entries_per_subpanel' => empty($list_max_entries_per_subpanel) ? 10 : $list_max_entries_per_subpanel,
   'lock_default_user_name' => empty($lock_default_user_name) ? false : $lock_default_user_name,
   'log_memory_usage' => empty($log_memory_usage) ? false : $log_memory_usage,
   'require_accounts' => empty($requireAccounts) ? true : $requireAccounts,
   'rss_cache_time' => empty($RSS_CACHE_TIME) ? '10800' : $RSS_CACHE_TIME,
   'faq_cache_time' =>empty($FAQ_CACHE_TIME) ? '86400' : $FAQ_CACHE_TIME,
   'session_dir' => $session_dir,  // this must be set!!
   'site_url' => empty($site_URL) ? $site_url : $site_URL,  // this must be set!!
   'sugar_version' => empty($sugar_version) ? 'unknown' : $sugar_version,
   'time_formats' => empty($timeFormats) ? array (
      'H:i'=>'23:00', 'h:ia'=>'11:00pm', 'h:iA'=>'11:00PM',
      'H.i'=>'23.00', 'h.ia'=>'11.00pm', 'h.iA'=>'11.00PM' ) : $timeFormats,
   'tmp_dir' => $tmp_dir,  // this must be set!!
   'translation_string_prefix' => empty($translation_string_prefix) ? false : $translation_string_prefix,
   'unique_key' => empty($unique_key) ? md5(create_guid()) : $unique_key,
   'upload_badext' => empty($upload_badext) ? array (
      'php', 'php3', 'php4', 'php5', 'pl', 'cgi', 'py',
      'asp', 'cfm', 'js', 'vbs', 'html', 'htm' ) : $upload_badext,
   'upload_dir' => $upload_dir,  // this must be set!!
   'upload_maxsize' => empty($upload_maxsize) ? 3000000 : $upload_maxsize,
	);
}

function get_sugar_config_defaults(){
    /*  used for getting base values for array style config.php.  used by the
        installer and to fill in new entries on upgrades.  see also: sugar_config_union
    */

    $sugar_config_defaults = array (
        'admin_export_only' => false,
        'export_delimiter' => ',',
        'calculate_response_time' => true,
        'create_default_user' => false,
        'date_formats' => array (
			'Y-m-d' => '2006-12-23', 'm-d-Y' => '12-23-2006', 'd-m-Y' => '23-12-2006',
			'Y/m/d' => '2006/12/23', 'm/d/Y' => '12/23/2006', 'd/m/Y' => '23/12/2006',
			'Y.m.d' => '2006.12.23', 'd.m.Y' => '23.12.2006', 'm.d.Y' => '12.23.2006',),
        'dbconfigoption' => array (
            'persistent' => true,
            'autofree' => false,
            'debug' => 0,
            'seqname_format' => '%s_seq',
            'portability' => 0,
            'ssl' => false ),
        'default_action' => 'index',
        'default_charset' => return_session_value_or_default('default_charset',
            'UTF-8'),
        'default_currency_name' => return_session_value_or_default('default_currency_name', 'US Dollar'),
        'default_currency_symbol' => return_session_value_or_default('default_currency_symbol', '$'),
        'default_currency_iso4217' => return_session_value_or_default('default_currency_iso4217', 'USD'),
        'default_date_format' => 'Y-m-d',
        'default_language' => return_session_value_or_default('default_language',
            'en_us'),
        'default_module' => 'Home',
        'default_password' => '',
        'default_theme' => return_session_value_or_default('site_default_theme', 'Sugar'),
        'default_time_format' => 'H:i',
        'default_user_is_admin' => false,
        'default_user_name' => '',
        'disable_export' => false,
        'disable_persistent_connections' =>
            return_session_value_or_default('disable_persistent_connections',
            'false'),
        'display_email_template_variable_chooser' => false,
        'display_inbound_email_buttons' => false,
        'dump_slow_queries' => false,
        'history_max_viewed' => 10,
        'installer_locked' => true,
        'languages' => array('en_us' => 'US English'),
        'large_scale_test' => false,
        'list_max_entries_per_page' => 20,
        'list_max_entries_per_subpanel' => 10,
        'lock_default_user_name' => false,
        'log_memory_usage' => false,
        'require_accounts' => true,
        'rss_cache_time' => return_session_value_or_default('rss_cache_time',
            '10800'),
        'faq_cache_time' => return_session_value_or_default('faq_cache_time',
            '86400000'),
        'save_query' => 'all',
        'slow_query_time_msec' => '100',
        'sugarbeet' => true,
        'time_formats' => array (
            'H:i'=>'23:00', 'h:ia'=>'11:00pm', 'h:iA'=>'11:00PM',
            'H.i'=>'23.00', 'h.ia'=>'11.00pm', 'h.iA'=>'11.00PM' ),
        'translation_string_prefix' =>
            return_session_value_or_default('translation_string_prefix', false),
        'upload_badext' => array (
            'php', 'php3', 'php4', 'php5', 'pl', 'cgi', 'py',
            'asp', 'cfm', 'js', 'vbs', 'html', 'htm' ),
        'upload_maxsize' => 3000000,
        'use_php_code_json' => returnPhpJsonStatus(),
        'verify_client_ip' => true,
        'js_custom_version' => '',
        'default_number_grouping_seperator' => ',',
  		'default_decimal_seperator' => '.',
        'lock_homepage' => false,
        'lock_subpanels' => false,
        'max_dashlets_homepage' => '10',
// REMOVE BEFORE SHIPPING
        'new_subpanels' => true,
    );
    return( $sugar_config_defaults );
}


function load_menu($path){
	global $module_menu;
	require_once($path . 'Menu.php');
	if(file_exists('custom/' . $path . 'Ext/Menus/menu.ext.php')){
		require_once('custom/' . $path . 'Ext/Menus/menu.ext.php');
	}
	if(file_exists('custom/application/Ext/Menus/menu.ext.php')){
		require_once('custom/application/Ext/Menus/menu.ext.php');
	}
	return $module_menu;
}

function sugar_config_union( $default, $override ){
    // a little different then array_merge and array_merge_recursive.  we want
    // the second array to override the first array if the same value exists,
    // otherwise merge the unique keys.  it handles arrays of arrays recursively
    // might be suitable for a generic array_union
    if( !is_array( $override ) ){
        $override = array();
    }
    foreach( $default as $key => $value ){
        if( !array_key_exists($key, $override) ){
            $override[$key] = $value;
        }
        else if( is_array( $key ) ){
            $override[$key] = sugar_config_union( $value, $override[$key] );
        }
    }
    return( $override );
}

function make_not_writable( $file ){
    // Returns true if the given file/dir has been made not writable
    $ret_val = false;
    if( is_file($file) || is_dir($file) ){
        if( !is_writable($file) ){
            $ret_val = true;
        }
        else {
            $original_fileperms = fileperms($file);

            // take away writable permissions
            $new_fileperms = $original_fileperms & ~0x0092;
            @chmod($file, $new_fileperms);

            if( !is_writable($file) ){
                $ret_val = true;
            }
        }
    }
    return $ret_val;
}


/** This function returns the name of the person.
  * It currently returns "first last".  It should not put the space if either name is not available.
  * It should not return errors if either name is not available.
  * If no names are present, it will return ""
  * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
  * All Rights Reserved.
  * Contributor(s): ______________________________________..
  */
function return_name($row, $first_column, $last_column)
{
	$first_name = "";
	$last_name = "";
	$full_name = "";

	if(isset($row[$first_column]))
	{
		$first_name = stripslashes($row[$first_column]);
	}

	if(isset($row[$last_column]))
	{
		$last_name = stripslashes($row[$last_column]);
	}

	$full_name = $first_name;

	// If we have a first name and we have a last name
	if($full_name != "" && $last_name != "")
	{
		// append a space, then the last name
		$full_name .= " ".$last_name;
	}
	// If we have no first name, but we have a last name
	else if($last_name != "")
	{
		// append the last name without the space.
		$full_name .= $last_name;
	}

	return $full_name;
}


function get_languages()
{
	global $sugar_config;
	return $sugar_config['languages'];
}

function get_language_display($key)
{
	global $sugar_config;
	return $sugar_config['languages'][$key];
}

function get_assigned_user_name($assigned_user_id, $is_group = ' AND is_group=0 ') {
	static $saved_user_list = null;
	$blankvalue = '';

	if(empty($saved_user_list)) {
		$saved_user_list = get_user_array(false, '', '', false, null, $is_group);
	}

	if(isset($saved_user_list[$assigned_user_id])) {
		return $saved_user_list[$assigned_user_id];
	}

	return $blankvalue;
}
function get_assigned_team_name($assigned_team_id) {
	static $team_list = null;

	if(empty($team_list))
		$team_list =get_team_array(false,"");

	if (isset($team_list[$assigned_team_id])) {
		return $team_list[$assigned_team_id];
	}
	return "";
}

/**
 * retrieve the list of teams that this user has access to.
 * add_blank -- If you would like to have a blank entry in the list (to allow no selection) pass true.
 */
function get_team_array($add_blank = FALSE) {
    global  $current_user;
    $team_array = get_register_value('team_array', $add_blank.'ADDBLANK');

    if(!empty($team_array))
    {
    	return $team_array;
    }


    $db = & PearDatabase::getInstance();

    if(is_admin($current_user))
    {
		$query = 'SELECT t1.id, t1.name FROM teams t1 where t1.deleted = 0 ORDER BY t1.private,t1.name ASC';
    }
    else
    {
		$query = 'SELECT t1.id, t1.name FROM teams t1, team_memberships t2 where t1.deleted = 0 and t2.deleted = 0 and t1.id=t2.team_id and t2.user_id = '."'".$current_user->id."'".' ORDER BY t1.private,t1.name ASC';
    }

    $GLOBALS['log']->debug("get_team_array query: $query");
    $result = $db->query($query, true, "Error filling in team array: ");

    if ($add_blank) {
        $team_array[""] = "";
    }

    while ($row = $db->fetchByAssoc($result)) {
        $team_array[$row['id']] = $row['name'];
    }

    set_register_value('team_array', $add_blank.'ADDBLANK', $team_array);
    return $team_array;
}



//TODO Update to use global cache
function get_user_array($add_blank=true, $status="Active", $assigned_user="", $use_real_name=false, $user_name_begins = null, $is_group=' AND is_group=0 ') {
    return array();
	$user_array = get_register_value('user_array', $add_blank. $status . $assigned_user);

	if(!$user_array) {
		$temp_result = Array();
		// Including deleted users for now.
		if (empty($status)) {
			$query = "SELECT id, first_name, last_name, user_name from users WHERE 1=1".$is_group;
		}
		else {
			$query = "SELECT id, first_name, last_name, user_name from users WHERE status='$status'".$is_group;
		}

		if (!empty($user_name_begins)) {
			$query .= " AND user_name LIKE '$user_name_begins%' ";
		}
		if (!empty($assigned_user)) {
			$query .= " OR id='$assigned_user'";
		}
		$query = $query.' order by user_name asc';

		$GLOBALS['log']->debug("get_user_array query: $query");
//		$result = $db->query($query, true, "Error filling in user array: ");

		if ($add_blank==true) {
			// Add in a blank row
			$temp_result[''] = '';
		}

		// Get the id and the name.
		while($row = $db->fetchByAssoc($result)) {
			if($use_real_name == true) {
				if(!empty($row['first_name']) && !empty($row['last_name'])){
					$temp_result[$row['id']] = $row['first_name']." ".$row['last_name'];
				} else {
					$temp_result[$row['id']] = $row['user_name'];
				}
			} else {
				$temp_result[$row['id']] = $row['user_name'];
			}
		}

		$user_array = $temp_result;
		set_register_value('user_array', $add_blank. $status . $assigned_user, $temp_result);
	}

	return $user_array;
}


function clean($string, $maxLength)
{
	$string = substr($string, 0, $maxLength);
	return escapeshellcmd($string);
}

/**
 * Copy the specified request variable to the member variable of the specified object.
 * Do no copy if the member variable is already set.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function safe_map($request_var, & $focus, $always_copy = false)
{
	safe_map_named($request_var, $focus, $request_var, $always_copy);
}

/**
 * Copy the specified request variable to the member variable of the specified object.
 * Do no copy if the member variable is already set.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function safe_map_named($request_var, & $focus, $member_var, $always_copy)
{
	if (isset($_REQUEST[$request_var]) && ($always_copy || is_null($focus->$member_var))) {
		$GLOBALS['log']->debug("safe map named called assigning '{$_REQUEST[$request_var]}' to $member_var");
		$focus->$member_var = $_REQUEST[$request_var];
	}
}

/** This function retrieves an application language file and returns the array of strings included in the $app_list_strings var.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 * If you are using the current language, do not call this function unless you are loading it for the first time */
function return_app_list_strings_language($language) {
	global $app_list_strings;
	global $sugar_config;
	$default_language = $sugar_config['default_language'];
	$temp_app_list_strings = $app_list_strings;
	$language_used = $language;

	include("include/language/en_us.lang.php");
	$en_app_list_strings = array();
	if($language_used != $default_language)
		$en_app_list_strings = $app_list_strings;

	include("include/language/$language.lang.php");

	if(file_exists("include/language/$language.lang.override.php")) {
		include("include/language/$language.lang.override.php");
	}

	if(file_exists("include/language/$language.lang.php.override")) {
		include("include/language/$language.lang.php.override");
	}

	if(file_exists("custom/application/Ext/Language/$language.lang.ext.php")) {
		include("custom/application/Ext/Language/$language.lang.ext.php");
		$GLOBALS['log']->info("Found extended language file: $language.lang.ext.php");
	}

	if(file_exists("custom/include/language/$language.lang.php")) {
		include("custom/include/language/$language.lang.php");
		$GLOBALS['log']->info("Found custom language file: $language.lang.php");
	}

	if(!isset($app_list_strings)) {
		$GLOBALS['log']->warn("Unable to find the application language file for language: ".$language);

		require("include/language/$default_language.lang.php");

		if(file_exists("include/language/$default_language.lang.override.php")) {
			include("include/language/$default_language.lang.override.php");
		}

		if(file_exists("include/language/$default_language.lang.php.override")) {
			include("include/language/$default_language.lang.php.override");
		}
		if(file_exists("custom/application/Ext/Language/$default_language.lang.ext.php")) {
			include("custom/application/Ext/Language/$default_language.lang.ext.php");
			$GLOBALS['log']->info("Found extended language file: $default_language.lang.ext.php");
		}
		$language_used = $default_language;
	}

	if(!isset($app_list_strings)) {
		$GLOBALS['log']->fatal("Unable to load the application language file for the selected language($language) or the default language($default_language)");
		return null;
	}

	// cn: bug 6048 - merge en_us with requested language
	$app_list_strings = sugarArrayMerge($en_app_list_strings, $app_list_strings);

	$return_value = $app_list_strings;
	$app_list_strings = $temp_app_list_strings;

	return $return_value;
}


/** This function retrieves an application language file and returns the array of strings included.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 * If you are using the current language, do not call this function unless you are loading it for the first time */
function return_application_language($language) {
	global $app_strings, $sugar_config;
	$temp_app_strings = $app_strings;
	$language_used = $language;
	$default_language = $sugar_config['default_language'];

	// cn: bug 6048 - merge en_us with requested language
	include("include/language/en_us.lang.php");
	$en_app_strings = array();
	if($language_used != $default_language)
		$en_app_strings = $app_strings;

	if(!empty($language)) {
		include("include/language/$language.lang.php");
	}

	if(file_exists("include/language/$language.lang.override.php")) {
		include("include/language/$language.lang.override.php");
	}
	if(file_exists("include/language/$language.lang.php.override")) {
		include("include/language/$language.lang.php.override");
	}
	if(file_exists("custom/application/Ext/Language/$language.lang.ext.php")) {
		include("custom/application/Ext/Language/$language.lang.ext.php");
		$GLOBALS['log']->info("Found extended language file: $language.lang.ext.php");
	}


	if(!isset($app_strings)) {
		$GLOBALS['log']->warn("Unable to find the application language file for language: ".$language);
		require("include/language/$default_language.lang.php");
		if(file_exists("include/language/$default_language.lang.override.php")) {
			include("include/language/$default_language.lang.override.php");
		}
		if(file_exists("include/language/$default_language.lang.php.override")) {
			include("include/language/$default_language.lang.php.override");
		}

		if(file_exists("custom/application/Ext/Language/$default_language.lang.ext.php")) {
			include("custom/application/Ext/Language/$default_language.lang.ext.php");
			$GLOBALS['log']->info("Found extended language file: $default_language.lang.ext.php");
		}
		$language_used = $default_language;
	}

	if(!isset($app_strings)) {
		$GLOBALS['log']->fatal("Unable to load the application language file for the selected language($language) or the default language($default_language)");
		return null;
	}

	// cn: bug 6048 - merge en_us with requested language
	$app_strings = sugarArrayMerge($en_app_strings, $app_strings);

	// If we are in debug mode for translating, turn on the prefix now!
	if($sugar_config['translation_string_prefix']) {
		foreach($app_strings as $entry_key=>$entry_value) {
			$app_strings[$entry_key] = $language_used.' '.$entry_value;
		}
	}
	if(isset($_SESSION['show_deleted'])) {
		$app_strings['LBL_DELETE_BUTTON'] = $app_strings['LBL_UNDELETE_BUTTON'];
		$app_strings['LBL_DELETE_BUTTON_LABEL'] = $app_strings['LBL_UNDELETE_BUTTON_LABEL'];
		$app_strings['LBL_DELETE_BUTTON_TITLE'] = $app_strings['LBL_UNDELETE_BUTTON_TITLE'];
		$app_strings['LBL_DELETE'] = $app_strings['LBL_UNDELETE'];
	}

	$return_value = $app_strings;
	$app_strings = $temp_app_strings;

	return $return_value;
}

/** This function retrieves a module's language file and returns the array of strings included.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 * If you are in the current module, do not call this function unless you are loading it for the first time */
function &return_module_language($language, $module) {
	static $mod_strings_array = array();
	global $mod_strings;
	global $sugar_config;
	global $currentModule;
	$returnnull = null;

	if(isset($mod_strings_array[$module])) {
		return $mod_strings_array[$module];
	}

	// Store the current mod strings for later
	$temp_mod_strings = $mod_strings;
	$language_used = $language;
	$default_language = $sugar_config['default_language'];

	if(empty($language)) {
		$language = $default_language;
	}
   if(file_exists("modules/$module/language/$language.lang.php"))
   {
	   include("modules/$module/language/$language.lang.php");
   }

	// cn: bug 6351 - include en_us if file langpack not available
	include("modules/$module/language/en_us.lang.php");
	$en_mod_strings = array();
	if($language_used != $default_language)
		$en_mod_strings = $mod_strings;

	if(file_exists("modules/$module/language/$language.lang.php")) {
		 include("modules/$module/language/$language.lang.php");
	}

	if(file_exists("modules/$module/language/$language.lang.override.php")) {
		include("modules/$module/language/$language.lang.override.php");
	}

	if(file_exists("modules/$module/language/$language.lang.php.override")) {
		echo 'Please Change:<br>' .
			 "modules/$module/language/$language.lang.php.override" .
			 '<br>to<br>' . 'Please Change:<br>' .
			 "modules/$module/language/$language.lang.override.php";

		include("modules/$module/language/$language.lang.php.override");
	}

	if(file_exists("custom/modules/$module/Ext/Language/$language.lang.ext.php")) {
		include("custom/modules/$module/Ext/Language/$language.lang.ext.php");
		$GLOBALS['log']->info("Found extended language file: $language.lang.ext.php");
	}

	// include the customized field information
	if(file_exists("custom/modules/$module/language/$language.lang.php")) {
		include("custom/modules/$module/language/$language.lang.php");
	}

	if(!isset($mod_strings)) {
		$GLOBALS['log']->warn("Unable to find the module language file for language: ".$language." and module: ".$module);
		if (file_exists("modules/$module/language/$default_language.lang.php")) {
			require("modules/$module/language/$default_language.lang.php");
		}
		if(file_exists("modules/$module/language/$default_language.lang.php.override")){
			include("modules/$module/language/$default_language.lang.php.override");
		}
		if(file_exists("custom/modules/$module/Ext/Language/$default_language.lang.ext.php")) {
	 		include("custom/modules/$module/Ext/Language/$default_language.lang.ext.php");
				$GLOBALS['log']->info("Found extended language file: $default_language.lang.ext.php");
  		}
		$language_used = $default_language;
	}

	if(!isset($mod_strings)) {
		$GLOBALS['log']->fatal("Unable to load the module($module) language file for the selected language($language) or the default language($default_language)");
		return $returnnull;
	}

	// cn: bug 6048 - merge en_us with requested language
	$mod_strings = sugarArrayMerge($en_mod_strings,$mod_strings);

	// If we are in debug mode for translating, turn on the prefix now!
	if($sugar_config['translation_string_prefix']) {
		foreach($mod_strings as $entry_key=>$entry_value) {
			$mod_strings[$entry_key] = $language_used.' '.$entry_value;
		}
	}

	$mod_strings_array[$module] = $mod_strings;
	$mod_strings = $temp_mod_strings;
	return $mod_strings_array[$module];
}


/** This function retrieves an application language file and returns the array of strings included in the $mod_list_strings var.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 * If you are using the current language, do not call this function unless you are loading it for the first time */
function return_mod_list_strings_language($language,$module) {
	global $mod_list_strings;
	global $sugar_config;
	global $currentModule;

	$language_used = $language;
	$temp_mod_list_strings = $mod_list_strings;
	$default_language = $sugar_config['default_language'];

	if($currentModule == $module && isset($mod_list_strings) && $mod_list_strings != null) {
		return $mod_list_strings;
	}

    // cn: bug 6351 - include en_us if file langpack not available
	// cn: bug 6048 - merge en_us with requested language
	include("modules/$module/language/en_us.lang.php");
	$en_mod_list_strings = array();
	if($language_used != $default_language)
		$en_mod_list_strings = $mod_list_strings;

    if(file_exists("modules/$module/language/$language.lang.php")) {
        include("modules/$module/language/$language.lang.php");
    }

	if(file_exists("modules/$module/language/$language.lang.override.php")){
		include("modules/$module/language/$language.lang.override.php");
	}

	if(file_exists("modules/$module/language/$language.lang.php.override")){
		echo 'Please Change:<br>' . "modules/$module/language/$language.lang.php.override" . '<br>to<br>' . 'Please Change:<br>' . "modules/$module/language/$language.lang.override.php";
		include("modules/$module/language/$language.lang.php.override");
	}

	if(!isset($mod_list_strings)) {
		$GLOBALS['log']->fatal("Unable to load the application list language file for the selected language($language) or the default language($default_language) for module({$module})");
		return null;
	}

	// cn: bug 6048 - merge en_us with requested language
	$mod_list_strings = sugarArrayMerge($en_mod_list_strings, $mod_list_strings);

	$return_value = $mod_list_strings;
	$mod_list_strings = $temp_mod_list_strings;

	return $return_value;
}


/** This function retrieves a theme's language file and returns the array of strings included.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function return_theme_language($language, $theme)
{
	global $mod_strings, $sugar_config, $currentModule;

	$language_used = $language;
	$default_language = $sugar_config['default_language'];

	include("themes/$theme/language/$current_language.lang.php");
	if(file_exists("themes/$theme/language/$current_language.lang.override.php")){
			include("themes/$theme/language/$current_language.lang.override.php");
	}
	if(file_exists("themes/$theme/language/$current_language.lang.php.override")){
			echo 'Please Change:<br>' . "themes/$theme/language/$current_language.lang.php.override" . '<br>to<br>' . 'Please Change:<br>' . "themes/$theme/language/$current_language.lang.override.php";
			include("themes/$theme/language/$current_language.lang.php.override");
	}
	if(!isset($theme_strings))
	{
		$GLOBALS['log']->warn("Unable to find the theme file for language: ".$language." and theme: ".$theme);
		require("themes/$theme/language/$default_language.lang.php");
		$language_used = $default_language;
	}

	if(!isset($theme_strings))
	{
		$GLOBALS['log']->fatal("Unable to load the theme($theme) language file for the selected language($language) or the default language($default_language)");
		return null;
	}

	// If we are in debug mode for translating, turn on the prefix now!
	if($sugar_config['translation_string_prefix'])
	{
		foreach($theme_strings as $entry_key=>$entry_value)
		{
			$theme_strings[$entry_key] = $language_used.' '.$entry_value;
		}
	}

	return $theme_strings;
}



/** If the session variable is defined and is not equal to "" then return it.  Otherwise, return the default value.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
*/
function return_session_value_or_default($varname, $default)
{
	if(isset($_SESSION[$varname]) && $_SESSION[$varname] != "")
	{
		return $_SESSION[$varname];
	}

	return $default;
}

/**
  * Creates an array of where restrictions.  These are used to construct a where SQL statement on the query
  * It looks for the variable in the $_REQUEST array.  If it is set and is not "" it will create a where clause out of it.
  * @param &$where_clauses - The array to append the clause to
  * @param $variable_name - The name of the variable to look for an add to the where clause if found
  * @param $SQL_name - [Optional] If specified, this is the SQL column name that is used.  If not specified, the $variable_name is used as the SQL_name.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
  */
function append_where_clause(&$where_clauses, $variable_name, $SQL_name = null)
{


	if($SQL_name == null)
	{
		$SQL_name = $variable_name;
	}

	if(isset($_REQUEST[$variable_name]) && $_REQUEST[$variable_name] != "")
	{
		array_push($where_clauses, "$SQL_name like '".PearDatabase::quote($_REQUEST[$variable_name])."%'");
	}
}

/**
  * Generate the appropriate SQL based on the where clauses.
  * @param $where_clauses - An Array of individual where clauses stored as strings
  * @returns string where_clause - The final SQL where clause to be executed.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
  */
function generate_where_statement($where_clauses)
{
	$where = "";
	foreach($where_clauses as $clause)
	{
		if($where != "")
		$where .= " and ";
		$where .= $clause;
	}

	$GLOBALS['log']->info("Here is the where clause for the list view: $where");
	return $where;
}

/**
 * A temporary method of generating GUIDs of the correct format for our DB.
 * @return String contianing a GUID in the format: aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee
 *
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
*/
function create_guid()
{
    $microTime = microtime();
	list($a_dec, $a_sec) = explode(" ", $microTime);

	$dec_hex = sprintf("%x", $a_dec* 1000000);
	$sec_hex = sprintf("%x", $a_sec);

	ensure_length($dec_hex, 5);
	ensure_length($sec_hex, 6);

	$guid = "";
	$guid .= $dec_hex;
	$guid .= create_guid_section(3);
	$guid .= '-';
	$guid .= create_guid_section(4);
	$guid .= '-';
	$guid .= create_guid_section(4);
	$guid .= '-';
	$guid .= create_guid_section(4);
	$guid .= '-';
	$guid .= $sec_hex;
	$guid .= create_guid_section(6);

	return $guid;

}

function create_guid_section($characters)
{
	$return = "";
	for($i=0; $i<$characters; $i++)
	{
		$return .= sprintf("%x", mt_rand(0,15));
	}
	return $return;
}

function ensure_length(&$string, $length)
{
	$strlen = strlen($string);
	if($strlen < $length)
	{
		$string = str_pad($string,$length,"0");
	}
	else if($strlen > $length)
	{
		$string = substr($string, 0, $length);
	}
}

function microtime_diff($a, $b) {
   list($a_dec, $a_sec) = explode(" ", $a);
   list($b_dec, $b_sec) = explode(" ", $b);
   return $b_sec - $a_sec + $b_dec - $a_dec;
}

/**
 * Check if user id belongs to a system admin.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function is_admin($user) {
	if(!empty($user) && $user->is_admin == '1')
		return true;

	return false;
}

/**
 * Return the display name for a theme if it exists.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_theme_display($theme) {
	global $theme_name, $theme_description;
	$temp_theme_name = $theme_name;
	$temp_theme_description = $theme_description;

	if (is_file("./themes/$theme/config.php")) {
		include("./themes/$theme/config.php");
		$return_theme_value = $theme_name;
	}
	else {
		$return_theme_value = $theme;
	}
	$theme_name = $temp_theme_name;
	$theme_description = $temp_theme_description;

	return $return_theme_value;
}

/**
 * Return an array of directory names.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_themes() {
   if ($dir = opendir("./themes")) {
		while (($file = readdir($dir)) !== false) {
           if ($file != ".." && $file != "." && $file != "CVS" && $file != "Attic") {
			   if(is_dir("./themes/".$file)) {
				   if(!($file[0] == '.')) {
				   	// set the initial theme name to the filename
				   	$name = $file;

				   	// if there is a configuration class, load that.
				   	if(is_file("./themes/$file/config.php"))
				   	{
				   		unset($theme_name);
				   		unset($version_compatibility);
				   		require("./themes/$file/config.php");
				   		$name = $theme_name;
				   		if(is_file("./themes/$file/header.php") && $version_compatibility >= 2.0)
				   		{
				   			$filelist[$file] = $name;
				   		}

				   	}

				   }
			   }
		   }
	   }
	   closedir($dir);
   }

   ksort($filelist);
   return $filelist;
}

/**
 * THIS FUNCTION IS DEPRECATED AND SHOULD NOT BE USED; USE get_select_options_with_id()
 * Create HTML to display select options in a dropdown list.  To be used inside
 * of a select statement in a form.
 * param $option_list - the array of strings to that contains the option list
 * param $selected - the string which contains the default value
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_select_options ($option_list, $selected) {
	return get_select_options_with_id($option_list, $selected);
}

/**
 * Create HTML to display select options in a dropdown list.  To be used inside
 * of a select statement in a form.   This method expects the option list to have keys and values.  The keys are the ids.  The values are the display strings.
 * param $option_list - the array of strings to that contains the option list
 * param $selected - the string which contains the default value
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_select_options_with_id ($option_list, $selected_key) {
	return get_select_options_with_id_separate_key($option_list, $option_list, $selected_key);
}


/**
 * Create HTML to display select options in a dropdown list.  To be used inside
 * of a select statement in a form.   This method expects the option list to have keys and values.  The keys are the ids.  The values are the display strings.
 * param $label_list - the array of strings to that contains the option list
 * param $key_list - the array of strings to that contains the values list
 * param $selected - the string which contains the default value
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_select_options_with_id_separate_key ($label_list, $key_list, $selected_key) {
	global $app_strings;
	$select_options = "";

	//for setting null selection values to human readable --None--
	$pattern = "/'0?'></";
	$replacement = "''>".$app_strings['LBL_NONE']."<";

	if (empty($key_list)) $key_list = array();
	//create the type dropdown domain and set the selected value if $opp value already exists
	foreach ($key_list as $option_key=>$option_value) {

		$selected_string = '';
		// the system is evaluating $selected_key == 0 || '' to true.  Be very careful when changing this.  Test all cases.
		// The bug was only happening with one of the users in the drop down.  It was being replaced by none.
		if (($option_key != '' && $selected_key == $option_key) || ($selected_key == '' && $option_key == '') || (is_array($selected_key) &&  in_array($option_key, $selected_key)))
		{
			$selected_string = 'selected ';
		}

		$html_value = $option_key;

		$select_options .= "\n<OPTION ".$selected_string."value='$html_value'>$label_list[$option_key]</OPTION>";
	}
	$select_options = preg_replace($pattern, $replacement, $select_options);

	return $select_options;
}

/**
 * Create HTML to display select options in a dropdown list.  To be used inside
 * of a select statement in a form.   This method expects the option list to
 * have keys and values.  The keys are the ids.  The values are the display
 * strings.
 * @param $label_list - the array of strings to that contains the option list
 * @param $key_list - the array of strings to that contains the values list
 * @param $selected - the string which contains the default value
 * @param $useQueues - flag to use queues as part of Assign To dropdowns
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor (s): ______________________________________..
function getSelectOptionsWithIdUseQueues($label_list, $key_list, $selected_key, $useQueues) {
	global $app_strings;
	if(file_exists('cache/modules/Queues/Queue.cache.php') && $useQueues) {
		require_once('cache/modules/Queues/Queue.cache.php');
	}
	$select_options = "";

	//for setting null selection values to human readable --None--
	$pattern = "/'0?'></";
	$replacement = "''>".$app_strings['LBL_NONE']."<";

	//create the type dropdown domain and set the selected value if $opp value already exists
	foreach ($key_list as $option_key=>$option_value) {

		$selected_string = '';
		// the system is evaluating $selected_key == 0 || '' to true.  Be very careful when changing this.  Test all cases.
		// The bug was only happening with one of the users in the drop down.  It was being replaced by none.
		if (($option_key != '' && $selected_key == $option_key) || ($selected_key == '' && $option_key == '') || (is_array($selected_key) &&  in_array($option_key, $selected_key)))
		{
			$selected_string = 'selected ';
		}

		$html_value = $option_key;

		$select_options .= "\n<OPTION ".$selected_string."value='$html_value'>$label_list[$option_key]</OPTION>";
	}
	// add queues to the dropdown
	if($useQueues) {
		$select_options .= "\n<OPTION value=''>--- Queues ---</OPTION>";
		foreach($queuesCached as $queueId => $queueName) {
			$selected_string = '';
			if($queueId == $selected_key) {
				$selected_string = 'SELECTED';
			}
			$select_options .= "\n<OPTION ".$selected_string."value='$queueId'>[q]$queueName</OPTION>";
		}
	}

	$select_options = preg_replace($pattern, $replacement, $select_options);

	return $select_options;
}
*/

/**
 * Call this method instead of die().
 * Then we call the die method with the error message that is passed in.
 */
function sugar_die($error_message)
{
	global $focus;
	sugar_cleanup();
	die($error_message);
}

/**
 * Create javascript to clear values of all elements in a form.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_clear_form_js () {
$the_script = <<<EOQ
<script type="text/javascript" language="JavaScript">
<!-- Begin
function clear_form(form) {
	var newLoc = 'index.php?action=' + form.action.value + '&module=' + form.module.value + '&query=true&clear=true';
	if(typeof(form.advanced) != 'undefined'){
		newLoc += '&advanced=' + form.advanced.value;
	}
	document.location.href= newLoc;
}
//  End -->
</script>
EOQ;

return $the_script;
}

/**
 * Create javascript to set the cursor focus to specific field in a form
 * when the screen is rendered.  The field name is currently hardcoded into the
 * the function.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_set_focus_js () {
//TODO Clint 5/20 - Make this function more generic so that it can take in the target form and field names as variables
$the_script = <<<EOQ
<script type="text/javascript" language="JavaScript">
<!-- Begin
function set_focus() {
	if (document.forms.length > 0) {
		for (i = 0; i < document.forms.length; i++) {
			for (j = 0; j < document.forms[i].elements.length; j++) {
				var field = document.forms[i].elements[j];
				if ((field.type == "text" || field.type == "textarea" || field.type == "password") &&
						!field.disabled && (field.name == "first_name" || field.name == "name" || field.name == "user_name" || field.name=="document_name")) {
					field.focus();
                    if (field.type == "text") {
                        field.select();
                    }
					break;
	    		}
			}
      	}
   	}
}
//  End -->
</script>
EOQ;

return $the_script;
}

/**
 * Very cool algorithm for sorting multi-dimensional arrays.  Found at http://us2.php.net/manual/en/function.array-multisort.php
 * Syntax: $new_array = array_csort($array [, 'col1' [, SORT_FLAG [, SORT_FLAG]]]...);
 * Explanation: $array is the array you want to sort, 'col1' is the name of the column
 * you want to sort, SORT_FLAGS are : SORT_ASC, SORT_DESC, SORT_REGULAR, SORT_NUMERIC, SORT_STRING
 * you can repeat the 'col',FLAG,FLAG, as often you want, the highest prioritiy is given to
 * the first - so the array is sorted by the last given column first, then the one before ...
 * Example: $array = array_csort($array,'town','age',SORT_DESC,'name');
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function array_csort() {
   $args = func_get_args();
   $marray = array_shift($args);
   $i = 0;

   $msortline = "return(array_multisort(";
   foreach ($args as $arg) {
	   $i++;
	   if (is_string($arg)) {
		   foreach ($marray as $row) {
			   $sortarr[$i][] = $row[$arg];
		   }
	   } else {
		   $sortarr[$i] = $arg;
	   }
	   $msortline .= "\$sortarr[".$i."],";
   }
   $msortline .= "\$marray));";

   eval($msortline);
   return $marray;
}

/**
 * Converts localized date format string to jscalendar format
 * Example: $array = array_csort($array,'town','age',SORT_DESC,'name');
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function parse_calendardate($local_format) {
	preg_match("/\(?([^-]{1})[^-]*-([^-]{1})[^-]*-([^-]{1})[^-]*\)/", $local_format, $matches);
	$calendar_format = "%" . $matches[1] . "-%" . $matches[2] . "-%" . $matches[3];
	return str_replace(array("y", "�", "a", "j"), array("Y", "Y", "Y", "d"), $calendar_format);
}





function translate($string, $mod='', $selectedValue=''){
	if(!empty($mod)){
		global $current_language;
		$mod_strings = return_module_language($current_language, $mod);
	}else{
		global $mod_strings;
	}

	$returnValue = '';
	global $app_strings, $app_list_strings;

	if(isset($mod_strings[$string]))
		$returnValue = $mod_strings[$string];
	else if(isset($app_strings[$string]))
		$returnValue = $app_strings[$string];
	else if(isset($app_list_strings[$string]))
		$returnValue = $app_list_strings[$string];

	if(empty($returnValue)){
		return $string;
	}

	if(is_array($returnValue) && ! empty($selectedValue) && isset($returnValue[$selectedValue]) ){
		return $returnValue[$selectedValue];
	}

	return $returnValue;
}

function add_http($url)
	{
		if(!eregi("://", $url))
		{
			return 'http://'.$url;
		}
		return $url;
	}

// Designed to take a string passed in the URL as a parameter and clean all "bad" data from it
// The second argument is a string, "filter," which corresponds to a regular expression
function clean_string($str, $filter = "STANDARD") {
	global  $sugar_config;

	$filters = Array(
		"STANDARD"        => "#[^A-Z0-9\-_\.\@]#i",
		"STANDARDSPACE"   => "#[^A-Z0-9\-_\.\@\ ]#i",
		"FILE"            => "#[^A-Z0-9\-_\.]#i",
		"NUMBER"          => "#[^0-9\-]#i",
		"SQL_COLUMN_LIST" => "#[^A-Z0-9,_\.]#i",
		"PATH_NO_URL"     => "#://#i",
		"SAFED_GET"		  => "#[^A-Z0-9\@\=\&\?\.\/\-_~]#i", /* range of allowed characters in a GET string */
		"UNIFIED_SEARCH"	=> "/[\x80-\xFF]/", /* cn: bug 3356 - MBCS search strings */
        "ALPHANUM"        => "#[^A-Z0-9]#i",
	);

	if (preg_match($filters[$filter], $str)) {
		if (isset($GLOBALS['log']) && is_object($GLOBALS['log'])) {
			$GLOBALS['log']->fatal("SECURITY: bad data passed in; string: {$str}");
		}
		die("Bad data passed in; <a href=\"{$sugar_config['site_url']}\">Return to Home</a>");
	}
	else {
		return $str;
	}
}

function clean_special_arguments() {
	if(isset($_SERVER['PHP_SELF'])) {
		if (!empty($_SERVER['PHP_SELF'])) clean_string($_SERVER['PHP_SELF'], 'SAFED_GET');
	}
	if (!empty($_REQUEST) && !empty($_REQUEST['login_theme'])) clean_string($_REQUEST['login_theme'], "STANDARD");
	if (!empty($_REQUEST) && !empty($_REQUEST['ck_login_theme_20'])) clean_string($_REQUEST['ck_login_theme_20'], "STANDARD");
	if (!empty($_SESSION) && !empty($_SESSION['authenticated_user_theme'])) clean_string($_SESSION['authenticated_user_theme'], "STANDARD");
	if (!empty($_REQUEST) && !empty($_REQUEST['language'])) clean_string($_REQUEST['language'], "STANDARD");
	if (!empty($_REQUEST) && !empty($_REQUEST['module_name'])) clean_string($_REQUEST['module_name'], "STANDARD");
	if (!empty($_REQUEST) && !empty($_REQUEST['module'])) clean_string($_REQUEST['module'], "STANDARD");
	if (!empty($_POST) && !empty($_POST['parent_type'])) clean_string($_POST['parent_type'], "STANDARD");
	if (!empty($_REQUEST) && !empty($_REQUEST['mod_lang'])) clean_string($_REQUEST['mod_lang'], "STANDARD");
	if (!empty($_SESSION) && !empty($_SESSION['authenticated_user_language'])) clean_string($_SESSION['authenticated_user_language'], "STANDARD");
	if (!empty($_SESSION) && !empty($_SESSION['dyn_layout_file'])) clean_string($_SESSION['dyn_layout_file'], "PATH_NO_URL");
	if (!empty($_GET) && !empty($_GET['from'])) clean_string($_GET['from']);
	if (!empty($_GET) && !empty($_GET['gmto'])) clean_string($_GET['gmto'], "NUMBER");
    clean_superglobals('stamp', 'ALPHANUM'); // for vcr controls
    clean_superglobals('offset', 'ALPHANUM');
    clean_superglobals('return_action');
    clean_superglobals('return_module');
	return TRUE;
}

/**
 * cleans the given key in superglobals $_GET, $_POST, $_REQUEST
 */
function clean_superglobals($key, $filter = 'STANDARD') {
    if(isset($_GET[$key])) clean_string($_GET[$key], $filter);
    if(isset($_POST[$key])) clean_string($_POST[$key], $filter);
    if(isset($_REQUEST[$key])) clean_string($_REQUEST[$key], $filter);
}

// Works in conjunction with clean_string() to defeat SQL injection, file inclusion attacks, and XSS
function clean_incoming_data() {
	global $sugar_config;

	if (get_magic_quotes_gpc() == 1) {
 		$req  = array_map("preprocess_param", $_REQUEST);
		$post = array_map("preprocess_param", $_POST);
		$get  = array_map("preprocess_param", $_GET);
	} else {
		$req  = array_map("securexss", $_REQUEST);
		$post = array_map("securexss", $_POST);
		$get  = array_map("securexss", $_GET);
	}

	// PHP cannot stomp out superglobals reliably
	foreach($req  as $k => $v) { $_REQUEST[$k] = $v; }
	foreach($post as $k => $v) { $_POST[$k] = $v; }
	foreach($get  as $k => $v) { $_GET[$k] = $v; }

	// Any additional variables that need to be cleaned should be added here
	if (isset($_REQUEST['action'])) clean_string($_REQUEST['action']);
	if (isset($_REQUEST['module'])) clean_string($_REQUEST['module']);
	if (isset($_REQUEST['record'])) clean_string($_REQUEST['record'], 'STANDARDSPACE');
	if (isset($_SESSION['authenticated_user_theme'])) clean_string($_SESSION['authenticated_user_theme']);
	if (isset($_SESSION['authenticated_user_language'])) clean_string($_SESSION['authenticated_user_language']);
	if (isset($sugar_config['default_theme'])) clean_string($sugar_config['default_theme']);

	// Clean "offset" and "order_by" parameters in URL
	foreach ($_GET as $key => $val) {
		if (str_end($key, "_offset")) {
			clean_string($_GET[$key], "NUMBER");
		}
		elseif (str_end($key, "_ORDER_BY")) {
			clean_string($_GET[$key], "SQL_COLUMN_LIST");
		}
	}

	return 0;
}

// Returns TRUE if $str begins with $begin
function str_begin($str, $begin) {
	return (substr($str, 0, strlen($begin)) == $begin);
}

// Returns TRUE if $str ends with $end
function str_end($str, $end) {
	return (substr($str, strlen($str) - strlen($end)) == $end);
}

function securexss($value) {
	$xss_cleanup=  array('"' =>'&quot;', "'" =>  '&#039;' , '<' =>'&lt;' , '>'=>'&gt;');
	$value = preg_replace('/javascript:/i', 'java script:', $value);
	return str_replace(array_keys($xss_cleanup), array_values($xss_cleanup), $value);
}

function preprocess_param($value){
 	if(is_string($value)){
	 	if(get_magic_quotes_gpc() == 1){
	 		$value = stripslashes($value);
	 	}
	 	$value = securexss($value);
 	}
 	return $value;


}

if(empty($register))$register = array();

function set_register_value($category, $name, $value){
	global $register;
	if(empty($register[$category]))
		$register[$category] = array();
	$register[$category][$name] = $value;
}

function get_register_value($category,$name){
	global $register;
	if(empty($register[$category]) || empty($register[$category][$name])){
		return false;
	}
	return $register[$category][$name];
}

function get_register_values($category){
	global $register;
	if(empty($register[$category])){
		return false;
	}
	return $register[$category];
}

function clear_register($category, $name){
	global $register;
	if(empty($name)){
		unset($register[$category]);
	}else{
		if(!empty($register[$category]))
			unset($register[$category][$name]);
	}
}

// this function cleans id's when being imported
function convert_id($string)
{
 return preg_replace_callback( '|[^A-Za-z0-9\-]|',
        create_function(
             // single quotes are essential here,
             // or alternative escape all $ as \$
             '$matches',
             'return ord($matches[0]);'
         ) ,$string);
}

function get_image($image,$other_attributes,$width="",$height="",$alt){
	global $png_support;

	if ($png_support == false)
	$ext = "gif";
	else
	$ext = "png";
	$out = '';

	if (file_exists($image.'.'.$ext)){
		$size=getimagesize($image.'.'.$ext);
		if ($width == "") { $width = $size[0];}
		if ($height == "") { $height = $size[1];}
		$out= "<img src='$image.$ext' width='".$width."' alt='".$alt."' height='".$height."' $other_attributes>";
	}else if(substr_count($image,'themes') > 0){
		$path = explode('/',$image);
		$path[1] = 'Default';
		$image = implode('/',$path);

		if (file_exists($image.'.'.$ext)){
			$size=getimagesize($image.'.'.$ext);
			if ($width == "") { $width = $size[0];}
			if ($height == "") { $height = $size[1];}
			$out= "<img src='$image.$ext' width='".$width."' alt='".$alt."' height='".$height."' $other_attributes>";
		}

	}
	return $out;
}

function getSQLDate($date_str)
{
                if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/',$date_str,$match))
                {
                        if ( strlen($match[2]) == 1)
                        {
                                $match[2] = "0".$match[2];
                        }
                        if ( strlen($match[1]) == 1)
                        {
                                $match[1] = "0".$match[1];
                        }
                        return "{$match[3]}-{$match[1]}-{$match[2]}";
                }
                else if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/',$date_str,$match))
                {
                        if ( strlen($match[2]) == 1)
                        {
                                $match[2] = "0".$match[2];
                        }
                        if ( strlen($match[1]) == 1)
                        {
                                $match[1] = "0".$match[1];
                        }
                        return "{$match[3]}-{$match[1]}-{$match[2]}";
                }
                else
                {
                        return "";
                }
}

function clone_history(&$db, $from_id,$to_id, $to_type) {

	$old_note_id=null;
	$old_filename=null;
	require_once('include/upload_file.php');
	$tables = array('emails'=>'Email', 'calls'=>'Call', 'meetings'=>'Meeting', 'notes'=>'Note', 'tasks'=>'Task');

	$location=array('Email'=>"modules/Emails/Email.php",
					'Call'=>"modules/Calls/Call.php",
					'Meeting'=>"modules/Meetings/Meeting.php",
					'Note'=>"modules/Notes/Note.php",
					'Tasks'=>"modules/Tasks/Task.php",
					);


	foreach($tables as $table=>$bean_class){

		if (!class_exists($bean_class)) {
			require_once($location[$bean_class]);
		}

		$bProcessingNotes=false;
		if ($table=='notes'){
			 $bProcessingNotes=true;
		}

		$query = "SELECT id FROM $table WHERE parent_id='$from_id'";
		$results = $db->query($query);

		while($row = $db->fetchByAssoc($results)){

			//retrieve existing record.
			$bean= new $bean_class();
			$bean->retrieve($row['id']);

			//process for new instance.
			if ($bProcessingNotes) {
			 	$old_note_id=$row['id'];
			 	$old_filename=$bean->filename;
			}

			$bean->id=null;
			$bean->parent_id=$to_id;
			$bean->parent_type=$to_type;
			if ($to_type=='Contacts' and in_array('contact_id',$bean->column_fields))  {
				$bean->contact_id=$to_id;
			}

			//save
			$new_id=$bean->save();

			//duplicate the file now. for notes.
			if ($bProcessingNotes && !empty($old_filename)) {
				UploadFile::duplicate_file($old_note_id,$new_id,$old_filename);
			}

			//reset the values needed for attachment duplication.
			$old_note_id=null;
			$old_filename=null;
		 }
	}
}

function values_to_keys($array){
	$new_array = array();
	if(!is_array($array)){
		return $new_array;
	}
	foreach($array as $arr){
		$new_array[$arr] = $arr;
	}
	return $new_array;
}

function clone_relationship(&$db, $tables = array(), $from_column, $from_id, $to_id){
foreach($tables as $table){
$query = "SELECT * FROM $table WHERE $from_column='$from_id'";
$results = $db->query($query);
while($row = $db->fetchByAssoc($results)){
	$query = "INSERT INTO $table ";
	$names = '';
	$values = '';
	$row[$from_column] = $to_id;
	$row['id'] = create_guid();
	foreach($row as $name=>$value){

			if(empty($names)){
				$names .= $name;
				$values .= "'$value'";
			}else {
				$names .= ', '. $name;
				$values .= ", '$value'";
			}
	}

	$query .= "($names)	VALUES ($values);";
	$db->query($query);
}
}

}

function number_empty($value){
	return empty($value) && $value != '0';
}

function get_bean_select_array($add_blank=true, $bean_name, $display_columns, $where='', $order_by='', $blank_is_none=false)
{
        global $beanFiles;
        require_once($beanFiles[$bean_name]);
        $focus = new $bean_name();
        $user_array = array();
        $user_array = get_register_value('select_array',$bean_name. $display_columns. $where . $order_by);
        if(!$user_array)
        {

                $db = & PearDatabase::getInstance();
                $temp_result = Array();
                $query = "SELECT id, {$display_columns} as display from {$focus->table_name} where ";
                if ( $where != '')
                {
                        $query .= $where." AND ";
                }

                $query .=  " deleted=0";

                if ( $order_by != '')
                {
                        $query .= ' order by '.$order_by;
                }

                $GLOBALS['log']->debug("get_user_array query: $query");
                $result = $db->query($query, true, "Error filling in user array: ");

                if ($add_blank==true){
                        // Add in a blank row
                        if($blank_is_none == true) { // set 'blank row' to "--None--"
                        	global $app_strings;
                        	$temp_result[''] = $app_strings['LBL_NONE'];
                        } else {
                        	$temp_result[''] = '';
                        }
                }

                // Get the id and the name.
                while($row = $db->fetchByAssoc($result))
                {
                        $temp_result[$row['id']] = $row['display'];
                }

                $user_array = $temp_result;
        	set_register_value('select_array',$bean_name. $display_columns. $where . $order_by,$temp_result);
        }

        return $user_array;

}
/**
 *
 *
 * @param unknown_type $listArray
 */
// function parse_list_modules
// searches a list for items in a user's allowed tabs and returns an array that removes unallowed tabs from list
function parse_list_modules(&$listArray)
{
	global $modListHeader;
	$returnArray = array();

	foreach($listArray as $optionName => $optionVal)
	{
		if(array_key_exists($optionName, $modListHeader))
		{
			$returnArray[$optionName] = $optionVal;
		}
		// special case for products
		if(array_key_exists('Products', $modListHeader))
		{
			$returnArray['ProductTemplates'] = $listArray['ProductTemplates'];
		}

		// special case for projects
		if(array_key_exists('Project', $modListHeader))
		{
			$returnArray['ProjectTask'] = $listArray['ProjectTask'];
		}
	}
	$acldenied = ACLController::disabledModuleList($listArray,false);
	foreach($acldenied as $denied){
		unset($returnArray[$denied]);
	}
	asort($returnArray);

	return $returnArray;
}

function display_notice($msg = false){
	global $error_notice;
	//no error notice - lets just display the error to the user
	if(!isset($error_notice)){
		echo '<br>'.$msg . '<br>';
	}else{
		$error_notice .= $msg . '<br>';
	}
}

/* checks if it is a number that atleast has the plus at the beggining
 */
function skype_formatted($number){
	return substr($number, 0, 1) == '+' || substr($number, 0, 2) == '00' || substr($number, 0, 2) == '011';
}

function insert_charset_header()
{
	global $app_strings;
	global $sugar_config;
	$charset = $sugar_config['default_charset'];

	if(isset($app_strings['LBL_CHARSET']))
	{
		$charset = $app_strings['LBL_CHARSET'];
	}

	header('Content-Type: text/html; charset='.$charset);
}

function getCurrentURL()
{
	$href = "http:";
	if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	{
		$href = 'https:';
	}

	$href.= "//".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?'.$_SERVER['QUERY_STRING'];
	return $href;
}

function javascript_escape($str) {
	$new_str = '';

	for($i = 0; $i < strlen($str); $i++) {

		if(ord(substr($str, $i, 1))==10){
			$new_str .= '\n';
		}elseif(ord(substr($str, $i, 1))==13){
			$new_str .= '\r';
		}
		else {
			$new_str .= $str{$i};
		}
	}

	$new_str = str_replace("'", "\\'", $new_str);

	return $new_str;
}

function js_escape($str, $keep=true){
	$str = html_entity_decode(str_replace("\\", "", $str), ENT_QUOTES);

	if($keep){
		$str = javascript_escape($str);
	}
	else {
		$str = str_replace("'", " ", $str);
		$str = str_replace('"', " ", $str);
	}

	return $str;

//end function js_escape
}

function br2nl($str) {
	$brs = array('<br>','<br/>', '<br />');
	$str = str_replace("\r\n", "\n", $str); // make from windows-returns, *nix-returns
	$str = str_replace($brs, "\n", $str); // to retrieve it
	return $str;
}

/**
 * Private helper function for displaying the contents of a given variable.
 * This function is only intended to be used for SugarCRM internal development.
 * The ppd stands for Pre Print Die.
 */
function _ppd($mixed)
{
	echo "\n<pre>\n";
	print_r($mixed);

	echo "";
	$stack  = debug_backtrace();
	if (!empty($stack) && isset($stack[0]['file']) && $stack[0]['line']) {
		echo "\n\n _ppd caller, file: " . $stack[0]['file']. ' line#: ' .$stack[0]['line'];
	}
	die();
	echo "\n</pre>\n";

}


/**
 * Private helper function for displaying the contents of a given variable in
 * the Logger. This function is only intended to be used for SugarCRM internal
 * development. The pp stands for Pre Print.
 * @param $mixed var to print_r()
 * @param $die boolean end script flow
 * @param $displayStackTrace also show stack trace
 */
function _ppl($mixed, $die=false, $displayStackTrace=false, $loglevel="debug") {
	if(!isset($GLOBALS['log']) || empty($GLOBALS['log'])) {
		require_once ('log4php/LoggerManager.php');
		$GLOBALS['log'] = LoggerManager :: getLogger('SugarCRM');
	}


	$mix	= print_r($mixed, true); // send print_r() output to $mix
	$stack	= debug_backtrace();

	$GLOBALS['log']->$loglevel('------------------------------ _ppLogger() output start -----------------------------');
	$GLOBALS['log']->$loglevel($mix);
	if($displayStackTrace) {
		$GLOBALS['log']->$loglevel($stack);
	}

	$GLOBALS['log']->$loglevel('------------------------------ _ppLogger() output end -----------------------------');
	$GLOBALS['log']->$loglevel('------------------------------ _ppLogger() file: '.$stack[0]['file'].' line#: '.$stack[0]['line'].'-----------------------------');

	if($die) {
		die();
	}
}



/**
 * Private helper function for displaying the contents of a given variable.
 * This function is only intended to be used for SugarCRM internal development.
 * The pp stands for Pre Print.
 */
function _pp($mixed)
{
	echo "\n<pre>\n";
	print_r($mixed);

	echo "";
	$stack  = debug_backtrace();
	if (!empty($stack) && isset($stack[0]['file']) && $stack[0]['line']) {
		echo "\n\n _pp caller, file: " . $stack[0]['file']. ' line#: ' .$stack[0]['line'];
	}
	echo "\n</pre>\n";
}

/**
 * Private helper function for displaying the contents of a given variable.
 * This function is only intended to be used for SugarCRM internal development.
 * The pp stands for Pre Print Trace.
 */
function _ppt($mixed)
{
	echo "\n<pre>\n";
	print_r($mixed);
	echo "\n</pre>\n";
}

/**
 * Private helper function for displaying the contents of a given variable.
 * This function is only intended to be used for SugarCRM internal development.
 * The pp stands for Pre Print Trace Die.
 */
function _pptd($mixed)
{
	echo "\n<pre>\n";
	print_r($mixed);
	echo "\n</pre>\n";
	display_stack_trace();
	die();
}

/**
 * Will check if a given PHP version string is supported (tested on this ver),
 * unsupported (results unknown), or invalid (something will break on this
 * ver).  Do not pass in any pararameter to default to a check against the
 * current environment's PHP version.
 *
 * @return 1 implies supported, 0 implies unsupported, -1 implies invalid
 */
function check_php_version($sys_php_version = '') {
	$sys_php_version = empty($sys_php_version) ? constant('PHP_VERSION') : $sys_php_version;
	// versions below $min_considered_php_version considered invalid by default,
	// versions equal to or above this ver will be considered depending
	// on the rules that follow
	$min_considered_php_version = '5.2.1';

	// only the supported versions,
	// should be mutually exclusive with $invalid_php_versions
	$supported_php_versions = array (
	'5.2.1', '5.2.2', '5.2.3', '5.2.4', '5.2.5', '5.2.6', '5.2.8', '5.2.9', '5.2.9-2'
	);

	// invalid versions above the $min_considered_php_version,
	// should be mutually exclusive with $supported_php_versions

	$invalid_php_versions = array('5.2.7');

	// default supported
	$retval = 1;

	// versions below $min_considered_php_version are invalid
	if(1 == version_compare($sys_php_version, $min_considered_php_version, '<')) {
		$retval = -1;
	}

	// supported version check overrides default unsupported
	foreach($supported_php_versions as $ver) {
		if(1 == version_compare($sys_php_version, $ver, 'eq')) {
			$retval = 1;
			break;
		}
	}

	// invalid version check overrides default unsupported
	foreach($invalid_php_versions as $ver) {
		if(1 == version_compare($sys_php_version, $ver, 'eq')) {
			$retval = -1;
			break;
		}
	}

	return $retval;
}
function pre_login_check(){
	global $action, $login_error;
	if(!empty($action)&& $action == 'Login'){
		checkLoginUserStatus();

		if(!empty($login_error)){
			$login_error = htmlentities($login_error);
			$login_error = str_replace(array("&lt;pre&gt;","&lt;/pre&gt;","\r\n", "\n"), "<br>", $login_error);
			$_SESSION['login_error'] = $login_error;
			echo '<script>
						if(document.getElementById("post_error")) {
							document.getElementById("post_error").innerHTML="'. $login_error. '";
						}
						</script>';
		}
	}
}

function sugar_cleanup($exit = false) {
	if(!empty($GLOBALS['savePreferencesToDB']) && $GLOBALS['savePreferencesToDB']) {
		require_once('modules/UserPreferences/UserPreference.php');
		UserPreference::savePreferencesToDB();
	}
	pre_login_check();
	if(class_exists('PearDatabase')) {
		$db = & PearDatabase::getInstance();
		$db->disconnect();
		if($exit) {
			exit;
		}
	}
}


/*
check_logic_hook - checks to see if your custom logic is in the logic file
if not, it will add it. If the file isn't built yet, it will create the file

TODO: remove_logic_hook

*/
function check_logic_hook_file($module_name, $event, $action_array){
	require_once('include/utils/logic_utils.php');
	$add_logic = false;

	if(file_exists("custom/modules/$module_name/logic_hooks.php")){

		$hook_array = get_hook_array($module_name);

		if(check_existing_element($hook_array, $event, $action_array)==true){
			//the hook at hand is present, so do nothing
		} else {
			$add_logic = true;

			$logic_count = count($hook_array[$event]);
			if($action_array[0]==""){
				$action_array[0] = $logic_count  + 1;
			}
			$hook_array[$event][] = $action_array;

		}
	//end if the file exists already
	} else {
		$add_logic = true;
		if($action_array[0]==""){
			$action_array[0] = 1;
		}
		$hook_array = array();
		$hook_array[$event][] = $action_array;
	//end if else file exists already
	}
	if($add_logic == true){

		//reorder array by element[0]
		//$hook_array = reorder_array($hook_array, $event);
		//!!!Finish this above TODO

		$new_contents = replace_or_add_logic_type($hook_array);
		write_logic_file($module_name, $new_contents);

	//end if add_element is true
	}

//end function check_logic_hook_file
}

function display_stack_trace(){
	$stack  = debug_backtrace();
	echo '<br>';
	$first = true;



	foreach($stack as $item){
			$file  = '';if(isset($item['file']))$file = $item['file'];
			$class  = '';if(isset($item['class']))$class = $item['class'];
			$line  = '';if(isset($item['line']))$line = $item['line'];
			$function  = '';if(isset($item['function']))$function = $item['function'];
			if(!$first){
				echo '<font color="black"><b>' . $file . '</b></font>' . '<font color="blue">[L:' . $line . ']</font>'.'<font color="red">(' . $class .':'. $function .  ')</font><br>';
			}else{
				$first = false;
			}
	}
}

function StackTraceErrorHandler($errno, $errstr, $errfile,$errline, $errcontext) {
	$error_msg = " $errstr occured in <b>$errfile</b> on line $errline [" . TimeDate::getInstance()->nowDb() . ']';
	$halt_script = true;
	switch($errno){
			case 2048: return; //depricated we have lots of these ignore them
			case E_USER_NOTICE:
			case E_NOTICE:
				$halt_script = false;
				$type = 'Notice';
				break;
			case E_USER_WARNING:
   			case E_COMPILE_WARNING:
   			case E_CORE_WARNING:
  		 	case E_WARNING:

		      $halt_script = false;
		       $type = "Warning";
		       break;

		   	case E_USER_ERROR:
		   	case E_COMPILE_ERROR:
		   	case E_CORE_ERROR:
		  	case E_ERROR:

		       $type = "Fatal Error";
		       break;

		   	case E_PARSE:

		       $type = "Parse Error";
		       break;

		   default:
		   //don't know what it is might not be so bad
		      	$halt_script = false;
		        $type = "Unknown Error ($errno)";
		       break;
		  }
		  $error_msg = '<b>'.$type.'</b>:' . $error_msg;
		 echo $error_msg;
		  display_stack_trace();
		  if($halt_script){
		  	exit -1;
		  }



	}


if(isset($sugar_config['stack_trace_errors']) && $sugar_config['stack_trace_errors']){

	set_error_handler('StackTraceErrorHandler');
}
function get_sub_cookies($name){
	$cookies = array();
	if(isset($_COOKIE[$name])){
		$subs = explode('#', $_COOKIE[$name]);
		foreach($subs as $cookie){
			if(!empty($cookie)){
				$cookie = explode('=', $cookie);

				$cookies[$cookie[0]] = $cookie[1];
			}
		}
	}
	return $cookies;

}


function mark_delete_components($sub_object_array, $run_second_level=false, $sub_sub_array=""){

	if(!empty($sub_object_array)){

		foreach($sub_object_array as $sub_object){

			//run_second level is set to true if you need to remove sub-sub components
			if($run_second_level==true){

				mark_delete_components($sub_object->get_linked_beans($sub_sub_array['rel_field'],$sub_sub_array['rel_module']));

			//end if run_second_level is true
			}
			$sub_object->mark_deleted($sub_object->id);
		//end foreach sub component
		}
	//end if this is not empty
	}

//end function mark_delete_components
}

/**
 * For translating the php.ini memory values into bytes.  e.g. input value of '8M' will return 8388608.
 */
function return_bytes($val)
{
	$val = trim($val);
	$last = strtolower($val{strlen($val)-1});

	switch($last)
	{
		// The 'G' modifier is available since PHP 5.1.0
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}

	return $val;
}

/**
 * Adds the href HTML tags around any URL in the $string
 */
function url2html($string) {
	//
	$return_string = preg_replace('/(\w+:\/\/)(\S+)/', ' <a href="\\1\\2" target="_new" class="tabDetailViewDFLink"  style="font-weight: normal;">\\1\\2</a>', $string);
	return $return_string;
}
// End customization by Julian

/**
 * tries to determine whether the Host machine is a Windows machine
 */
function is_windows() {
	if(preg_match('#WIN#', PHP_OS)) {
		return true;
	}
	return false;
}



/**
 * best guesses Timezone based on webserver's TZ settings
 */
function lookupTimezone($userOffset = 0){
	require_once('include/timezone/timezones.php');

	$defaultZones= array('America/New_York'=>1, 'America/Los_Angeles'=>1,'America/Chicago'=>1, 'America/Denver'=>1,'America/Anchorage'=>1, 'America/Phoenix'=>1, 'Europe/Amsterdam'=>1,'Europe/Athens'=>1,'Europe/London'=>1, 'Australia/Sydney'=>1, 'Australia/Perth'=>1);
	global $timezones;
	$serverOffset = date('Z');
	if(date('I')) {
		$serverOffset -= 3600;
	}
	if(!is_int($userOffset)) {
		return '';
	}
	$gmtOffset = $serverOffset/60 + $userOffset * 60;
	$selectedZone = ' ';
	foreach($timezones as $zoneName=>$zone) {

		if($zone['gmtOffset'] == $gmtOffset) {
			$selectedZone = $zoneName;
		}
		if(!empty($defaultZones[$selectedZone]) ) {
			return $selectedZone;
		}
	}
	return $selectedZone;
}

function convert_module_to_singular($module_array){
	global $beanList;

	foreach($module_array as $key => $value){
		if(!empty($beanList[$value])) $module_array[$key] = $beanList[$value];


		if($value=="Cases") $module_array[$key] = "Case";
		if($key=="projecttask"){
				$module_array['ProjectTask'] = "Project Task";
				unset($module_array[$key]);
		}
	}

	return $module_array;

//end function convert_module_to_singular
}

/*
 * Given the bean_name which may be plural or singular return the singular
 * bean_name. This is important when you need to include files.
 */
function get_singular_bean_name($bean_name){
	global $beanFiles, $beanList;
	if(array_key_exists($bean_name, $beanList)){
		return $beanList[$bean_name];
	}
	else{
		return $bean_name;
	}
}

function get_label($label_tag, $temp_module_strings){
	global $app_strings;
	if(!empty($temp_module_strings[$label_tag])){

		$label_name = $temp_module_strings[$label_tag];
	} else {
		if(!empty($app_strings[$label_tag])){
			$label_name = $app_strings[$label_tag];
		} else {
			$label_name = $label_tag;
		}
	}
	return $label_name;

//end function get_label
}


function search_filter_rel_info(& $focus, $tar_rel_module, $relationship_name){

	$rel_list = array();

	foreach($focus->relationship_fields as $rel_key => $rel_value){
		if($rel_value == $relationship_name){
			$temp_bean = get_module_info($tar_rel_module);
			echo $focus->$rel_key;
			$temp_bean->retrieve($focus->$rel_key);
			if($temp_bean->id!=""){

				$rel_list[] = $temp_bean;
				return $rel_list;
			}
		}
	}

	return $rel_list;

//end function search_filter_rel_info
}

function get_module_info($module_name){
		global $beanList;
		global $dictionary;

		//Get dictionary and focus data for module
		$vardef_name = $beanList[$module_name];

		if($vardef_name=="aCase"){
			$class_name = "Case";
		} else {
			$class_name = $vardef_name;
		}
		if(!file_exists('modules/'. $module_name . '/'.$class_name.'.php')){
			return;
		}

		include_once('modules/'. $module_name . '/'.$class_name.'.php');

		$module_bean = new $vardef_name();
		return $module_bean;
	//end function get_module_table
}





function  checkAuthUserStatus(){

	//authUserStatus();
}


/**
 * This function returns an array of phpinfo() results that can be parsed and
 * used to figure out what version we run, what modules are compiled in, etc.
 * @param	$level			int		info level constant (1,2,4,8...64);
 * @return	$returnInfo		array	array of info about the PHP environment
 * @author	original by "code at adspeed dot com" Fron php.net
 * @author	customized for Sugar by Chris N.
 */
function getPhpInfo($level=-1) {
	/**	Name (constant)		Value	Description
		INFO_GENERAL		1		The configuration line, php.ini location, build date, Web Server, System and more.
		INFO_CREDITS		2		PHP Credits. See also phpcredits().
		INFO_CONFIGURATION	4		Current Local and Master values for PHP directives. See also ini_get().
		INFO_MODULES		8		Loaded modules and their respective settings. See also get_loaded_extensions().
		INFO_ENVIRONMENT	16		Environment Variable information that's also available in $_ENV.
		INFO_VARIABLES		32		Shows all predefined variables from EGPCS (Environment, GET, POST, Cookie, Server).
		INFO_LICENSE		64		PHP License information. See also the license FAQ.
		INFO_ALL			-1		Shows all of the above. This is the default value.
	 */
	ob_start();
	phpinfo($level);
	$phpinfo = ob_get_contents();
	ob_end_clean();

	$phpinfo	= strip_tags($phpinfo,'<h1><h2><th><td>');
	$phpinfo	= preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$phpinfo);
	$phpinfo	= preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$phpinfo);
	$parsedInfo	= preg_split('/(<h.?>[^<]+<\/h.>)/', $phpinfo, -1, PREG_SPLIT_DELIM_CAPTURE);
	$match		= '';
	$version	= '';
	$returnInfo	= array();

	if(preg_match('/<h1 class\=\"p\">PHP Version ([^<]+)<\/h1>/', $phpinfo, $version)) {
		$returnInfo['PHP Version'] = $version[1];
	}


	for ($i=1; $i<count($parsedInfo); $i++) {
		if (preg_match('/<h.>([^<]+)<\/h.>/', $parsedInfo[$i], $match)) {
			$vName = trim($match[1]);
			$parsedInfo2 = explode("\n",$parsedInfo[$i+1]);

			foreach ($parsedInfo2 AS $vOne) {
				$vPat	= '<info>([^<]+)<\/info>';
				$vPat3	= "/$vPat\s*$vPat\s*$vPat/";
				$vPat2	= "/$vPat\s*$vPat/";

				if (preg_match($vPat3,$vOne,$match)) { // 3cols
					$returnInfo[$vName][trim($match[1])] = array(trim($match[2]),trim($match[3]));
				} elseif (preg_match($vPat2,$vOne,$match)) { // 2cols
					$returnInfo[$vName][trim($match[1])] = trim($match[2]);
				}
			}
		} elseif(true) {

		}
	}

	return $returnInfo;
}

/**
 * This function will take a string that has tokens like {0}, {1} and will replace
 * those tokens with the args provided
 * @param	$format string to format
 * @param	$args args to replace
 * @return	$result a formatted string
 */
function string_format($format, $args){
	$result = $format;
	for($i = 0; $i < count($args); $i++){
		$result = str_replace('{'.$i.'}', $args[$i], $result);
	}
	return $result;
}

/**
 * This function will take a number and system_id and format
 * @param	$num of bean
 * @param	$system_id from system
 * @return	$result a formatted string
 */
function format_number_display($num, $system_id){
	global $sugar_config;
	if(isset($num) && !empty($num)){
		if(isset($system_id) && $system_id == 1){
			return $num;
		}
		else{
			return sprintf("%d-%d", $num, $system_id);
		}
	}
}
function checkLoginUserStatus(){
	getLoginUserStatus();
}

/**
 * This function will take a number and system_id and format
 * @param	$url URL containing host to append port
 * @param	$port the port number - if '' is passed, no change to url
 * @return	$resulturl the new URL with the port appended to the host
 */
function appendPortToHost($url, $port)
{
	$resulturl = $url;

	// if no port, don't change the url
	if($port != '')
	{
		$split = explode("/", $url);
		//check if it starts with http, in case they didn't include that in url
		if(str_begin($url, 'http'))
		{
			//third index ($split[2]) will be the host
			$split[2] .= ":".$port;
		}
		else // otherwise assumed to start with host name
		{
			//first index ($split[0]) will be the host
			$split[0] .= ":".$port;
		}

		$resulturl = implode("/", $split);
	}

	return $resulturl;
}

/**
 * Singleton to return JSON object
 * @return	JSON object
 */
function getJSONobj() {
	static $json = null;
	if(!isset($json)) {
			require_once('include/JSON.php');
			$json = new JSON(JSON_LOOSE_TYPE);
	}
	return $json;
}

require_once('include/utils/db_utils.php');
require_once('include/utils/user_utils.php');
//check to see if custom utils exists
if(file_exists('custom/include/custom_utils.php')){
	include_once('custom/include/custom_utils.php');
}

//check to see if custom utils exists in Extension framework
if(file_exists('custom/application/Ext/Utils/custom_utils.ext.php')) {
    include_once('custom/application/Ext/Utils/custom_utils.ext.php');
}

/**
 * Set default php.ini settings for entry points
 */
function setPhpIniSettings() {
	// zlib module
	if(function_exists('gzclose') && headers_sent() == false) {
		ini_set('zlib.output_compression', 1);
	}
	// mbstring module
	if(function_exists('mb_strlen')) {
		ini_set('mbstring.func_overload', 7);
		ini_set('mbstring.internal_encoding', 'UTF-8');
	}

	// mssql only
	if(ini_get("mssql.charset")) {
		ini_set('mssql.charset', "UTF-8");
	}
}

/**
 * like array_merge() but will handle array elements that are themselves arrays;
 * PHP's version just overwrites the element with the new one.
 * @param array gimp the array whose values will be overloaded
 * @param array dom the array whose values will pwn the gimp's
 * @return array beaten gimp
 */
function sugarArrayMerge($gimp, $dom) {
	if(is_array($gimp) && is_array($dom)) {
		foreach($dom as $domKey => $domVal) {
			if(array_key_exists($domKey, $gimp)) {
				if(is_array($domVal)) {
					$gimp[$domKey] = sugarArrayMerge($gimp[$domKey], $dom[$domKey]);
				} else {
					$gimp[$domKey] = $domVal;
				}
			} else {
				$gimp[$domKey] = $domVal;
			}
		}
	}
	return $gimp;
}

/**
 * finds the correctly working versions of PHP-JSON
 * @return bool True if NOT found or WRONG version
 */
function returnPhpJsonStatus() {
	$goodVersions = array('1.1.1',);

	if(function_exists('json_encode')) {
		$phpInfo = getPhpInfo(8);

		if(!in_array($phpInfo['json']['json version'], $goodVersions)) {
			return true; // bad version found
		} else {
			return false; // all requirements met
		}
	}
	return true; // not found
}


/**
 * returns a 20-char or less string for the Tracker to display in the header
 * @param string name field for a given Object
 * @return string 20-char or less name
 */
function getTrackerSubstring($name) {
	$strlen = function_exists('mb_strlen') ? mb_strlen($name) : strlen($name);

	if($strlen > 20) {
		$chopped = function_exists('mb_substr') ? mb_substr($name, 0, 15) : substr($name, 0, 15);
	} else {
		$chopped = $name;
	}

	return $chopped;
}
?>

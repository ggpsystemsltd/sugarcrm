<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
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


///////////////////////////////////////////////////////////////////////////////
////	REDIRECT CONDITIONS TO INSTALL.PHP
if(!is_file('config.php')) {
	header('Location: maintenance.html');
	exit ();
}// DO NOT REDIRECT TO INSTALL.PHP, this is a external facing site, dangerous.
require_once ('config.php'); // provides $sugar_config
// load up the config_override.php file.  This is used to provide default user settings
if(is_file('config_override.php')) {
	require_once ('config_override.php');
}
////	end REDIRECT CONDITIONS TO INSTALL.PHP
///////////////////////////////////////////////////////////////////////////////
$startTime = microtime();
///////////////////////////////////////////////////////////////////////////////
////	DATA SECURITY MEASURES
require_once ('include/utils.php');
clean_special_arguments();
clean_incoming_data();
////	END DATA SECURITY MEASURES
///////////////////////////////////////////////////////////////////////////////

// cn: set php.ini settings at entry points
setPhpIniSettings();

// create the global Portal object
require_once('include/Portal/Portal.php');
$portal = new Portal();
$portal->loadSoapClient();

require_once ('sugar_version.php'); // provides $sugar_version, $sugar_db_version, $sugar_flavor
require_once ('include/TimeDate.php');
require_once ('include/modules.php'); // provides $moduleList, $beanList, $beanFiles, $modInvisList, $adminOnlyList
require_once ('log4php/LoggerManager.php');
require_once ('modules/Users/authentication/AuthenticationController.php');

global $currentModule;
global $moduleList;

///////////////////////////////////////////////////////////////////////////////
////	SETTING DEFAULT VAR VALUES
// Track the number of SQL queiries
$GLOBALS['log'] = LoggerManager :: getLogger('SugarCRM');
$error_notice = '';
$use_current_user_login = false;

// Allow for the session information to be passed via the URL for printing.
if(isset($_GET['PHPSESSID'])){
    if(!empty($_COOKIE['PHPSESSID']) && strcmp($_GET['PHPSESSID'],$_COOKIE['PHPSESSID']) == 0) {
        session_id($_REQUEST['PHPSESSID']);
    }else{
        unset($_GET['PHPSESSID']);
    }
}
if(!empty($sugar_config['session_dir'])) {
	session_save_path($sugar_config['session_dir']);
}

$timedate = TimeDate::getInstance();

// Emails uses the REQUEST_URI later to construct dynamic URLs.
// IIS does not pass this field to prevent an error, if it is not set, we will assign it to ''.
if (!isset ($_SERVER['REQUEST_URI'])) {
	$_SERVER['REQUEST_URI'] = '';
}
////	END SETTING DEFAULT VAR VALUES
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	REDIRECTION VARS
if(!empty($_REQUEST['cancel_redirect'])) {
	if(!empty($_REQUEST['return_action'])) {
		$_REQUEST['action'] = $_REQUEST['return_action'];
		$_POST['action'] = $_REQUEST['return_action'];
		$_GET['action'] = $_REQUEST['return_action'];
	}
	if(!empty($_REQUEST['return_module'])) {
		$_REQUEST['module'] = $_REQUEST['return_module'];
		$_POST['module'] = $_REQUEST['return_module'];
		$_GET['module'] = $_REQUEST['return_module'];
	}
	if(!empty($_REQUEST['return_id'])) {
		$_REQUEST['id'] = $_REQUEST['return_id'];
		$_POST['id'] = $_REQUEST['return_id'];
		$_GET['id'] = $_REQUEST['return_id'];
	}
}

if(isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	$action = "";
}
if(isset($_REQUEST['module'])) {
	$module = $_REQUEST['module'];
} else {
	$module = "";
}
if(isset($_REQUEST['record'])) {
	$record = $_REQUEST['record'];
} else {
	$record = "";
}


////	REDIRECTION VARS
///////////////////////////////////////////////////////////////////////////////


$authController = new AuthenticationController((!empty($sugar_config['authenticationClass'])? $sugar_config['authenticationClass'] : 'SugarAuthenticate'));

///////////////////////////////////////////////////////////////////////////////
////	USER LOGIN AUTHENTICATION
//FIRST PLACE YOU CAN INSTANTIATE A SUGARBEAN;

session_start();


// Double check the server's unique key is in the session.  Make sure this is not an attempt to hijack a session
$user_unique_key = (isset($_SESSION['unique_key'])) ? $_SESSION['unique_key'] : '';
$server_unique_key = (isset($sugar_config['unique_key'])) ? $sugar_config['unique_key'] : '';
$allowed_actions = array('Authenticate', 'Login'); // these are actions where the user/server keys aren't compared

// to preserve a timed-out user's click choice
if(($user_unique_key != $server_unique_key) && (!in_array($action, $allowed_actions)) && (!isset($_SESSION['login_error']))) {
	session_destroy();
	$post_login_nav = '';

	if(!empty($record) && !empty($action) && !empty($module)) {
		if(in_array(strtolower($action), array('save', 'delete')) || isset($_REQUEST['massupdate'])
			|| isset($_GET['massupdate']) || isset($_POST['massupdate']))
			$post_login_nav = '';
		else
			$post_login_nav = '&login_module='.$module.'&login_action='.$action.'&login_record='.$record;
	}

	header('Location: index.php?action=Login&module=Users'.$post_login_nav);
	exit ();
}


if(isset($_REQUEST['PHPSESSID']))
	$GLOBALS['log']->debug("****Starting Application for  session ".$_REQUEST['PHPSESSID']);
else
	$GLOBALS['log']->debug("****Starting Application for new session");


// We use the REQUEST_URI later to construct dynamic URLs.  IIS does not pass this field
// to prevent an error, if it is not set, we will assign it to ''
if(!isset($_SERVER['REQUEST_URI'])) {
	$_SERVER['REQUEST_URI'] = '';
}

///////////////////////////////////////////////////////////////////////////////
////    LANGUAGE PACK STRING EXTRACTION
// ifthe language is not set yet, then set it to the default language.
if(isset($_SESSION['authenticated_user_language']) && $_SESSION['authenticated_user_language'] != '') {
    $current_language = $_SESSION['authenticated_user_language'];
} else {
    $current_language = $sugar_config['default_language'];
}

// Check to see ifthere is an authenticated user in the session.
if(isset($_SESSION['authenticated_user_id'])) {

	$GLOBALS['log']->debug('We have an authenticated user id: '.$_SESSION['authenticated_user_id']);
	/**
	 * CN: Bug 4128: some users are getting redirected to
	 * action=Login&module=Users, even after they have been auth'd
	 * Setting it manually here
	 */
	if(isset($_REQUEST['action']) && isset($_REQUEST['module'])) {
		if($_REQUEST['action'] == 'Login' && $_REQUEST['module'] == 'Users') {
			$_REQUEST['action'] = 'index';
			$_REQUEST['module'] = 'Home';
			$action = 'index';
			$module = 'Home';
		}
	}
} elseif(isset($action) && isset($module) && ($action == 'Authenticate') && $module == 'Users') {
	$GLOBALS['log']->debug('We are authenticating user now');
} else {
	$GLOBALS['log']->debug('The current user does not have a session.  Going to the login page');
	$action = 'Login';
	$module = 'Users';
	if(isset($_REQUEST['module']) && ($_REQUEST['module'] != 'Home') && $_REQUEST['module'] != 'Users') {
        global $current_language;
        session_destroy();
        $app_strings = return_application_language($current_language);
        $_SESSION['login_error'] = $app_strings['LBL_LOGIN_TO_ACCESS'];
    }
    else {
//        $_SESSION['login_error'] = null;
    }

    $_REQUEST['action'] = $action;
	$_REQUEST['module'] = $module;
}

if(isset($_SESSION['authenticated_user_id'])) { // set in modules/Users/Authenticate.php
    if(!$authController->sessionAuthenticate()) { // if the object we get back is null for some reason, this will break - like user prefs are corrupted
        $GLOBALS['log']->fatal('User retrieval for ID: ('.$_SESSION['authenticated_user_id'].') does not exist in database or retrieval failed catastrophically.  Calling session_destroy() and sending user to Login page.');
        session_destroy();
        header('Location: index.php?action=Login&module=Users');
    }
}
////	END USER LOGIN AUTHENTICATION
///////////////////////////////////////////////////////////////////////////////

Portal::addModulesIfFunctionExists(false, false, true);
$GLOBALS['log']->debug($_REQUEST);

$skipHeaders = false;
$skipFooters = false;

// Set the current module to be the module that was passed in
if(!empty($module)) {
	$currentModule = $module;
}


///////////////////////////////////////////////////////////////////////////////
////	RENDER PAGE REQUEST BASED ON $module - $action - (and/or) $record

// if we have an action and a module, set that action as the current.
if(!empty($action) && !empty($module)) {
	$GLOBALS['log']->info('In module: '.$module.' -- About to take action '.$action);
	$GLOBALS['log']->debug('in module '.$module.' -- in '.$action);
	$GLOBALS['log']->debug('----------------------------------------------------------------------------------------------------------------------------------------------');
	if(preg_match('/^Save/', $action) || preg_match('/^Delete/', $action) || preg_match('/^Popup/', $action) || preg_match('/^Authenticate/', $action) || preg_match('/^Logout/', $action) || preg_match('/^Export/', $action) || preg_match('/^SupportPortal/', $action)) {
		$skipHeaders = true;
		if(preg_match('/^Popup/', $action) || preg_match('/^ChangePassword/', $action) || preg_match('/^Export/', $action) || preg_match('/^SupportPortal/', $action))
			$skipFooters = true;
	}
	if((isset($_REQUEST['sugar_body_only']) && $_REQUEST['sugar_body_only'])) {
		$skipHeaders = true;
		$skipFooters = true;
	}
	if((isset($_REQUEST['from']) && $_REQUEST['from'] == 'ImportVCard') || !empty($_REQUEST['to_pdf']) || !empty($_REQUEST['to_csv'])) {
		$skipHeaders = true;
		$skipFooters = true;
	}

    if($action == 'Login' && isset($_SESSION['authenticated_user_id'])) {
		header('Location: index.php?action=Logout&module=Users');
        die();
	} else {
		$currentModuleFile = 'modules/'.$module.'/'.$action.'.php';
	}
} elseif(!empty($module)) { // ifwe do not have an action, but we have a module, make the index.php file the action
	$currentModuleFile = 'modules/'.$currentModule.'/index.php';
} else { // Use the system default action and module
	// use $sugar_config['default_module'] and $sugar_config['default_action'] as set in config.php
	// Redirect to the correct module with the correct action.  We need the URI to include these fields.
	header('Location: index.php?action='.$sugar_config['default_action'].'&module='.$sugar_config['default_module']);
    die();
}
////	END RENDER PAGE REQUEST BASED ON $module - $action - (and/or) $record
///////////////////////////////////////////////////////////////////////////////




$export_module = $currentModule;

$GLOBALS['log']->info('current page is '.$currentModuleFile);
$GLOBALS['log']->info('current module is '.$currentModule);


//Used for current record focus
$focus = null;



$GLOBALS['log']->debug('current_language is: '.$current_language);

//set module and application string arrays based upon selected language
$app_strings = return_application_language($current_language);
//if(empty($current_user->id)){
//    $app_strings['NTC_WELCOME'] = '';
//}
$app_list_strings = return_app_list_strings_language($current_language);
$mod_strings = return_module_language($current_language, $currentModule);
insert_charset_header();

// set user, theme and language cookies so that login screen defaults to last values
if(isset($_SESSION['authenticated_user_id'])) {
	$GLOBALS['log']->debug("setting cookie ck_login_id_20 to ".$_SESSION['authenticated_user_id']);
	setcookie('ck_login_id_20', $_SESSION['authenticated_user_id'], time() + 86400 * 90);
}
if(isset($_SESSION['authenticated_user_theme'])) {
	$GLOBALS['log']->debug("setting cookie ck_login_theme_20 to ".$_SESSION['authenticated_user_theme']);
	setcookie('ck_login_theme_20', $_SESSION['authenticated_user_theme'], time() + 86400 * 90);
}
if(isset($_SESSION['authenticated_user_language'])) {
	$GLOBALS['log']->debug("setting cookie ck_login_language_20 to ".$_SESSION['authenticated_user_language']);
	setcookie('ck_login_language_20', $_SESSION['authenticated_user_language'], time() + 86400 * 90);
}



///////////////////////////////////////////////////////////////////////////////
////	START OUTPUT BUFFERING STUFF
ob_start();
////	END DETAIL-VIEW SPECIFIC RENDER CODE
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
////	THEME PATH SETUP AND THEME CHANGES
if(isset($_SESSION['authenticated_user_theme']) && $_SESSION['authenticated_user_theme'] != '') {
	$theme = $_SESSION['authenticated_user_theme'];
} else {
	$theme = $sugar_config['default_theme'];
}
$theme = 'Sugar';
$image_path = 'themes/'.$theme.'/images/';

//if the theme is changed
$_SESSION['theme_changed'] = false;
if(isset($_REQUEST['usertheme'])) {
	$_SESSION['theme_changed'] = true;
	$_SESSION['authenticated_user_theme'] = clean_string($_REQUEST['usertheme']);
	$theme = clean_string($_REQUEST['usertheme']);
}

//if the language is changed
if(isset($_REQUEST['userlanguage'])) {
	$_SESSION['theme_changed'] = true;
	$_SESSION['authenticated_user_language'] = clean_string($_REQUEST['userlanguage']);
	$current_language = clean_string($_REQUEST['userlanguage']);
}

$GLOBALS['log']->debug('Current theme is: '.$theme);
require_once('themes/' . $theme . '/layout_utils.php');
//ACLController :: filterModuleList($moduleList);



//TODO move this code into $theme/header.php so that we can be within the <DOCTYPE xxx> and <HTML> tags.
if(empty($_REQUEST['to_pdf']) && empty($_REQUEST['to_csv'])) {
	echo '<script type="text/javascript" src="include/javascript/cookie.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo '<link rel="stylesheet" type="text/css" media="all" href="themes/'.$theme.'/calendar-win2k-cold-1.css?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '">';
	echo '<script>jscal_today = ' . (1000 * strtotime($timedate->handle_offset(gmdate('Y-m-d H:i:s', gmmktime()), 'Y-m-d H:i:s'))) . '; if(typeof app_strings == "undefined") app_strings = new Array();</script>';
	echo '<script type="text/javascript" src="jscalendar/calendar.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo '<script type="text/javascript" src="jscalendar/calendar-setup_3.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
    echo '<script type="text/javascript" src="jscalendar/lang/calendar-en.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo '<script src="include/javascript/yui/YAHOO.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
//  echo '<script src="include/javascript/yui/log.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo '<script src="include/javascript/yui/dom.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
  echo '<script src="include/javascript/yui/event.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
//	echo '<script src="include/javascript/yui/animation.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
//	echo '<script src="include/javascript/yui/connection.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo '<script src="include/javascript/yui/dragdrop.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
//	echo '<script src="include/javascript/yui/ygDDList.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo '<script type="text/javascript" src="include/javascript/sugar_3.js?s=' . $sugar_version . '&c=' . $sugar_config['js_custom_version'] . '"></script>';
	echo $timedate->get_javascript_validation();
}


//skip headers for popups, deleting, saving, importing and other actions
if(!$skipHeaders) {
	$GLOBALS['log']->debug("including headers");
	if(!is_file('themes/'.$theme.'/header.php')) {
		sugar_die("Invalid theme specified");
	}
	// Only print the errors for admin users.
	if(!empty($_SESSION['HomeOnly'])) {
		$moduleList = array ('Home');
	}

	include ('themes/'.$theme.'/header.php');

	echo "<!-- crmprint -->";
} else {
	$GLOBALS['log']->debug("skipping headers");
}
////	END THEME PATH SETUP AND THEME CHANGES
///////////////////////////////////////////////////////////////////////////////


// added a check for security of tabs to see if an user has access to them
// this prevents passing an "unseen" tab to the query string and pulling up its contents
if(!isset($modListHeader)) $modListHeader = array('Cases' => 'Cases', 'Bugs' => 'Bugs');

	// Only include the file if there is a file.  User login does not have a filename but does have a module.
	if(!empty($currentModuleFile)) {
		///////////////////////////////////////////////////////////////////////
		////	DISPLAY REQUESTED PAGE
		$GLOBALS['log']->debug('--------->  BEGING INCLUDING REQUESTED PAGE: ['.$currentModuleFile.']  <------------');
		include($currentModuleFile);
		$GLOBALS['log']->debug('--------->  END INCLUDING REQUESTED PAGE: ['.$currentModuleFile.']  <------------');
		////	END DISPLAY REQUESTED PAGE
		///////////////////////////////////////////////////////////////////////
	}

if(!$skipFooters) {
	echo "<!-- crmprint --><div id='footer'>";
	include ('themes/'.$theme.'/footer.php');

	if(!isset($_SESSION['avail_themes']))
		$_SESSION['avail_themes'] = serialize(get_themes());
	if(!isset($_SESSION['avail_languages']))
		$_SESSION['avail_languages'] = serialize(get_languages());
	$user_mod_strings = return_module_language($current_language, 'Users');
	echo "<table cellpadding='0' cellspacing='0' width='100%' border='0' class='underFooter'>";

	// Under the Sugar Public License referenced above, you are required to leave in all copyright statements in both
	// the code and end-user application.
	echo "<tr><td align='center' class='copyRight'>";

	
	echo ('&copy; 2004-2011 <a href="http://www.sugarcrm.com" target="_blank" class="copyRightLink">SugarCRM Inc.</a> All Rights Reserved.<br />');

	// Under the Sugar Public License referenced above, you are required to leave in all copyright statements in both
	// the code and end-user application as well as the the powered by image. You can not change the url or the image below  .




	echo "<A href='http://www.sugarforge.org' target='_blank'><img style='margin-top: 2px' border='0' width='106' height='23' src='include/images/poweredby_sugarcrm.png' alt='Powered By SugarCRM'></a>\n";









	// End Required Image
	echo "</td></tr></table></div>\n";

	echo "</body></html>";
}

if(!function_exists("ob_get_clean")) {
	function ob_get_clean() {
		$ob_contents = ob_get_contents();
		ob_end_clean();
		return $ob_contents;
	}
}

if(isset($_GET['print'])) {
	$page_str = ob_get_clean();
	$page_arr = explode("<!-- crmprint -->", $page_str);
	include ("phprint.php");
}

if(isset($sugar_config['log_memory_usage']) && $sugar_config['log_memory_usage'] && function_exists('memory_get_usage')) {
	$fp = @ fopen("memory_usage.log", "ab");
	@ fwrite($fp, "Usage: ".memory_get_usage()." - module: ". (isset($module) ? $module : "<none>")." - action: ". (isset($action) ? $action : "<none>")."\n");
	@ fclose($fp);
}

session_write_close(); // submitted by Tim Scott in SugarCRM forums
sugar_cleanup();
?>

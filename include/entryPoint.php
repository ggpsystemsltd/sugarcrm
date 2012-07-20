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
 * *******************************************************************************/

/**
 * Known Entry Points as of 4.5
 * acceptDecline.php
 * campaign_tracker.php
 * campaign_trackerv2.php
 * cron.php
 * dictionary.php
 * download.php
 * emailmandelivery.php
 * export_dataset.php
 * export.php
 * image.php
 * index.php
 * install.php
 * json.php
 * json_server.php
 * leadCapture.php
 * maintenance.php
 * metagen.php
 * pdf.php
 * phprint.php
 * process_queue.php
 * process_workflow.php
 * removeme.php
 * schedulers.php
 * soap.php
 * su.php
 * sugar_version.php
 * TreeData.php
 * tree_level.php
 * tree.php
 * vcal_server.php
 * vCard.php
 * zipatcher.php
 * WebToLeadCapture.php
 * HandleAjaxCall.php */
 /*
  * for 50, added:
  * minify.php
  */
  /*
  * for 510, added:
  * dceActionCleanup.php
  */
$GLOBALS['starttTime'] = microtime(true);

set_include_path(
    dirname(__FILE__) . '/..' . PATH_SEPARATOR .
    get_include_path()
);

if (!defined('PHP_VERSION_ID')) {
    $version_array = explode('.', phpversion());
    define('PHP_VERSION_ID', ($version_array[0]*10000 + $version_array[1]*100 + $version_array[2]));
}

if(empty($GLOBALS['installing']) && !file_exists('config.php'))
{
	header('Location: install.php');
	exit ();
}


// config|_override.php
if(is_file('config.php')) {
    require_once('config.php'); // provides $sugar_config
}
// load up the config_override.php file.  This is used to provide default user settings
if(is_file('config_override.php')) {
	require_once('config_override.php');
}
if(empty($GLOBALS['installing']) &&empty($sugar_config['dbconfig']['db_name']))
{
	    header('Location: install.php');
	    exit ();
}

// make sure SugarConfig object is available
require_once 'include/SugarObjects/SugarConfig.php';

///////////////////////////////////////////////////////////////////////////////
////	DATA SECURITY MEASURES
require_once('include/utils.php');
clean_special_arguments();
clean_incoming_data();
////	END DATA SECURITY MEASURES
///////////////////////////////////////////////////////////////////////////////

// cn: set php.ini settings at entry points
setPhpIniSettings();

require_once('sugar_version.php'); // provides $sugar_version, $sugar_db_version, $sugar_flavor
require_once('include/database/DBManagerFactory.php');
require_once('include/dir_inc.php');

require_once('include/Localization/Localization.php');
require_once('include/javascript/jsAlerts.php');
require_once('include/TimeDate.php');
require_once('include/modules.php'); // provides $moduleList, $beanList, $beanFiles, $modInvisList, $adminOnlyList, $modInvisListActivities

require('include/utils/autoloader.php');
spl_autoload_register(array('SugarAutoLoader', 'autoload'));
require_once('data/SugarBean.php');
require_once('include/utils/mvc_utils.php');
require('include/SugarObjects/LanguageManager.php');
require('include/SugarObjects/VardefManager.php');

require('modules/DynamicFields/templates/Fields/TemplateText.php');

require_once('include/utils/file_utils.php');
require_once('include/SugarEmailAddress/SugarEmailAddress.php');
require_once('include/SugarLogger/LoggerManager.php');
require_once('modules/Trackers/BreadCrumbStack.php');
require_once('modules/Trackers/Tracker.php');
require_once('modules/Trackers/TrackerManager.php');
require_once('modules/ACL/ACLController.php');
require_once('modules/Administration/Administration.php');
require_once('modules/Administration/updater_utils.php');
require_once('modules/Users/User.php');
require_once('modules/Users/authentication/AuthenticationController.php');
require_once('include/utils/LogicHook.php');
require_once('include/SugarTheme/SugarTheme.php');
require_once('include/MVC/SugarModule.php');
require_once('include/SugarCache/SugarCache.php');
require('modules/Currencies/Currency.php');
require_once('include/MVC/SugarApplication.php');

require_once('include/upload_file.php');
UploadStream::register();
//
//SugarApplication::startSession();

///////////////////////////////////////////////////////////////////////////////
////    Handle loading and instantiation of various Sugar* class
if (!defined('SUGAR_PATH')) {
    define('SUGAR_PATH', realpath(dirname(__FILE__) . '/..'));
}
require_once SUGAR_PATH . '/include/SugarObjects/SugarRegistry.php';
if(empty($GLOBALS['installing'])){
///////////////////////////////////////////////////////////////////////////////
////	SETTING DEFAULT VAR VALUES
$GLOBALS['log'] = LoggerManager::getLogger('SugarCRM');
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

SugarApplication::preLoadLanguages();

$timedate = TimeDate::getInstance();

$GLOBALS['sugar_version'] = $sugar_version;
$GLOBALS['sugar_flavor'] = $sugar_flavor;
$GLOBALS['timedate'] = $timedate;
$GLOBALS['js_version_key'] = md5($GLOBALS['sugar_config']['unique_key'].$GLOBALS['sugar_version'].$GLOBALS['sugar_flavor']);

$db = DBManagerFactory::getInstance();
$db->resetQueryCount();
$locale = new Localization();

// Emails uses the REQUEST_URI later to construct dynamic URLs.
// IIS does not pass this field to prevent an error, if it is not set, we will assign it to ''.
if (!isset ($_SERVER['REQUEST_URI'])) {
	$_SERVER['REQUEST_URI'] = '';
}

$current_user = new User();
$current_entity = null;
$system_config = new Administration();
$system_config->retrieveSettings();

LogicHook::initialize()->call_custom_logic('', 'after_entry_point');
}
////	END SETTING DEFAULT VAR VALUES
///////////////////////////////////////////////////////////////////////////////

?>

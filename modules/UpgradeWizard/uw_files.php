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




global $sugar_version;
if(!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

///////////////////////////////////////////////////////////////////////////////
////	DYNAMICALLY GENERATE UPGRADEWIZARD MODULE FILE LIST
$uwFilesCurrent = findAllFiles('modules/UpgradeWizard/', array());

// handle 4.x to 4.5.x+ (no UpgradeWizard module)
if(count($uwFilesCurrent) < 5) {
	$uwFiles = array(
		'modules/UpgradeWizard/language/en_us.lang.php',
		'modules/UpgradeWizard/cancel.php',
		'modules/UpgradeWizard/commit.php',
		'modules/UpgradeWizard/commitJson.php',
		'modules/UpgradeWizard/end.php',
		'modules/UpgradeWizard/Forms.php',
		'modules/UpgradeWizard/index.php',
		'modules/UpgradeWizard/Menu.php',
		'modules/UpgradeWizard/preflight.php',
		'modules/UpgradeWizard/preflightJson.php',
		'modules/UpgradeWizard/start.php',
		'modules/UpgradeWizard/su_utils.php',
		'modules/UpgradeWizard/su.php',
		'modules/UpgradeWizard/systemCheck.php',
		'modules/UpgradeWizard/systemCheckJson.php',
		'modules/UpgradeWizard/upgradeWizard.js',
		'modules/UpgradeWizard/upload.php',
		'modules/UpgradeWizard/uw_ajax.php',
		'modules/UpgradeWizard/uw_files.php',
		'modules/UpgradeWizard/uw_main.tpl',
		'modules/UpgradeWizard/uw_utils.php',
	);
} else {
	$uwFilesCurrent = findAllFiles('ModuleInstall', $uwFilesCurrent);
	$uwFilesCurrent = findAllFiles('include/javascript/yui', $uwFilesCurrent);
	$uwFilesCurrent[] = 'HandleAjaxCall.php';

	$uwFiles = array();
	foreach($uwFilesCurrent as $file) {
		$uwFiles[] = str_replace("./", "", clean_path($file));
	}
}
////	END DYNAMICALLY GENERATE UPGRADEWIZARD MODULE FILE LIST
///////////////////////////////////////////////////////////////////////////////

$uw_files = array(
    // standard files we steamroll with no warning
    'log4php.properties',
    'include/utils/encryption_utils.php',
    'include/Pear/Crypt_Blowfish/Blowfish.php',
    'include/Pear/Crypt_Blowfish/Blowfish/DefaultKey.php',
    'include/utils.php',
    'include/language/en_us.lang.php',
    'include/modules.php',
    'include/Localization/Localization.php',
    'install/language/en_us.lang.php',
    'XTemplate/xtpl.php',
    'include/database/DBHelper.php',
    'include/database/DBManager.php',
    'include/database/DBManagerFactory.php',
    'include/database/MssqlHelper.php',
    'include/database/MssqlManager.php',
    'include/database/MysqlHelper.php',
    'include/database/MysqlManager.php',
    'include/database/DBManagerFactory.php',
);

$uw_files = array_merge($uw_files, $uwFiles);


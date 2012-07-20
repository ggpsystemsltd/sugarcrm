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














if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');




$mod_strings = array(
	'DESC_MODULES_INSTALLED'					=> 'The following modules have been installed:',
	'DESC_MODULES_QUEUED'						=> 'The following modules are ready to be installed:',

	'ERR_UW_CANNOT_DETERMINE_GROUP'				=> 'Cannot determine Group',
	'ERR_UW_CANNOT_DETERMINE_USER'				=> 'Cannot determine Owner',
	'ERR_UW_CONFIG_WRITE'						=> 'Error updating config.php with new version information.',
	'ERR_UW_CONFIG'								=> 'Please make your config.php file writable and reload this page.',
	'ERR_UW_DIR_NOT_WRITABLE'					=> 'Directory not writable',
	'ERR_UW_FILE_NOT_COPIED'					=> 'File not copied',
	'ERR_UW_FILE_NOT_DELETED'					=> 'Problem removing package ',
	'ERR_UW_FILE_NOT_READABLE'					=> 'File could not be read.',
	'ERR_UW_FILE_NOT_WRITABLE'					=> 'File cannot be moved or written to',
	'ERR_UW_FLAVOR_2'							=> 'Upgrade Flavor: ',
	'ERR_UW_FLAVOR'								=> 'SugarCRM System Flavor: ',
	'ERR_UW_LOG_FILE_UNWRITABLE'				=> './upgradeWizard.log could not be created/written to.  Please fix permissions on your SugarCRM directory.',
	'ERR_UW_MBSTRING_FUNC_OVERLOAD'				=> 'mbstring.func_overload set to a value higher than 1.  Please change this in your php.ini and restart the web server.',
	'ERR_UW_MYSQL_VERSION'						=> 'SugarCRM requires MySQL version 4.1.2 or newer.  Found: ',
	'ERR_UW_NO_FILE_UPLOADED'					=> 'Please specify a file and try again!',
	'ERR_UW_NO_FILES'							=> 'An error occurred, no files were found to check.',
	'ERR_UW_NO_MANIFEST'						=> 'The zip file is missing a manifest.php file.  Cannot proceed.',
	'ERR_UW_NO_VIEW'							=> 'Invalid view specified.',
	'ERR_UW_NO_VIEW2'							=> 'View not defined.  Please go to the Administration home to navigate to this page.',
	'ERR_UW_NOT_VALID_UPLOAD'					=> 'Not valid upload.',
	'ERR_UW_NO_CREATE_TMP_DIR'					=> 'Could not create the temp directory. Check file permissions.',
	'ERR_UW_ONLY_PATCHES'						=> 'You can only upload patches on this page.',
	'ERR_UW_PREFLIGHT_ERRORS'					=> 'Errors Found During Preflight Check',
	'ERR_UW_UPLOAD_ERR'							=> 'There was an error uploading the file, please try again!<br>\n',
	'ERR_UW_VERSION'							=> 'SugarCRM System Version: ',
	'ERR_UW_WRONG_TYPE'							=> 'This page is not for running ',
	'ERR_UW_PHP_FILE_ERRORS'					=> array(
													1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
													2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
													3 => 'The uploaded file was only partially uploaded.',
													4 => 'No file was uploaded.',
													5 => 'Unknown error.',
													6 => 'Missing a temporary folder.',
													7 => 'Failed to write file to disk.',
													8 => 'File upload stopped by extension.',
												),
	'LBL_BUTTON_BACK'							=> 'Back',
	'LBL_BUTTON_CANCEL'							=> 'Cancel',
	'LBL_BUTTON_DELETE'							=> 'Delete Package',
	'LBL_BUTTON_DONE'							=> 'Done',
	'LBL_BUTTON_INSTALL'						=> 'Preflight Upgrade',
	'LBL_BUTTON_NEXT'							=> 'Next',
	'LBL_BUTTON_RECHECK'						=> 'Recheck',

	'LBL_UPLOAD_UPGRADE'						=> 'Upload an upgrade ',
	'LBL_UPLOAD_FILE_NOT_FOUND'					=> 'Upload file not found',
	'LBL_UW_BACKUP_FILES_EXIST_TITLE'			=> 'File Backup',
	'LBL_UW_BACKUP_FILES_EXIST'					=> 'Backed-up files from this upgrade can be found in',
	'LBL_UW_BACKUP'								=> 'File BACKUP',
	'LBL_UW_CANCEL_DESC'						=> 'Upgrade Wizard has been cancelled.  All temporary files and the uploaded zip file have been deleted.<br><br>Press "Done" to restart the Upgrade Wizard.',
	'LBL_UW_CHARSET_SCHEMA_CHANGE'				=> 'Character Set Schema Changes',
	'LBL_UW_CHECK_ALL'							=> 'Check All',
	'LBL_UW_CHECKLIST'							=> 'Upgrade Steps',
	'LBL_UW_COMMIT_ADD_TASK_DESC_1'				=> "Backups of Overwritten Files are in the following directory: \n",
	'LBL_UW_COMMIT_ADD_TASK_DESC_2'				=> "Manually merge the following files:\n",
	'LBL_UW_COMMIT_ADD_TASK_NAME'				=> 'Upgrade Process: Manually Merge Files',
	'LBL_UW_COMMIT_ADD_TASK_OVERVIEW'			=> 'Please use whichever diff method is most familiar to you to merge these files.  Until this is complete, your SugarCRM installation will be in an uncertain state, and the upgrade incomplete.',
	'LBL_UW_COMPLETE'							=> 'Complete',
	'LBL_UW_CONTINUE_CONFIRMATION'              => 'This new version of Sugar contains new license agreement.  Would you like to continue?',
	'LBL_UW_COMPLIANCE_ALL_OK'					=> 'All system settings requirements satisfied',
	'LBL_UW_COMPLIANCE_CALLTIME'				=> 'PHP Setting: Call Time Pass By Reference',
	'LBL_UW_COMPLIANCE_CURL'					=> 'cURL Module',
	'LBL_UW_COMPLIANCE_IMAP'					=> 'IMAP Module',
	'LBL_UW_COMPLIANCE_MBSTRING'				=> 'MBStrings Module',
	'LBL_UW_COMPLIANCE_MBSTRING_FUNC_OVERLOAD'	=> 'MBStrings mbstring.func_overload Parameter',
	'LBL_UW_COMPLIANCE_MEMORY'					=> 'PHP Setting: Memory Limit',
	'LBL_UW_COMPLIANCE_MSSQL_MAGIC_QUOTES'		=> 'MS SQL Server & PHP Magic Quotes GPC',
	'LBL_UW_COMPLIANCE_MYSQL'					=> 'Minimum MySQL Version',
	'LBL_UW_COMPLIANCE_PHP_INI'					=> 'Location of php.ini',
	'LBL_UW_COMPLIANCE_PHP_VERSION'				=> 'Minimum PHP Version',
	'LBL_UW_COMPLIANCE_SAFEMODE'				=> 'PHP Setting: Safe Mode',
	'LBL_UW_COMPLIANCE_TITLE'					=> 'Server Settings Check',
	'LBL_UW_COMPLIANCE_TITLE2'					=> 'Detected Settings',
	'LBL_UW_COMPLIANCE_XML'						=> 'XML Parsing',

	'LBL_UW_COPIED_FILES_TITLE'					=> 'Files Copied Successfully',
	'LBL_UW_CUSTOM_TABLE_SCHEMA_CHANGE'			=> 'Custom Table Schema Changes',

	'LBL_UW_DB_CHOICE1'							=> 'Upgrade Wizard Runs SQL',
	'LBL_UW_DB_CHOICE2'							=> 'Manual SQL Queries',
	'LBL_UW_DB_INSERT_FAILED'					=> 'INSERT failed - compared results differ',
	'LBL_UW_DB_ISSUES_PERMS'					=> 'Database Privileges',
	'LBL_UW_DB_ISSUES'							=> 'Database Issues',
	'LBL_UW_DB_METHOD'							=> 'Database Update Method',
	'LBL_UW_DB_NO_ADD_COLUMN'					=> 'ALTER TABLE [table] ADD COLUMN [column]',
	'LBL_UW_DB_NO_CHANGE_COLUMN'				=> 'ALTER TABLE [table] CHANGE COLUMN [column]',
	'LBL_UW_DB_NO_CREATE'						=> 'CREATE TABLE [table]',
	'LBL_UW_DB_NO_DELETE'						=> 'DELETE FROM [table]',
	'LBL_UW_DB_NO_DROP_COLUMN'					=> 'ALTER TABLE [table] DROP COLUMN [column]',
	'LBL_UW_DB_NO_DROP_TABLE'					=> 'DROP TABLE [table]',
	'LBL_UW_DB_NO_ERRORS'						=> 'All Privileges Available',
	'LBL_UW_DB_NO_INSERT'						=> 'INSERT INTO [table]',
	'LBL_UW_DB_NO_SELECT'						=> 'SELECT [x] FROM [table]',
	'LBL_UW_DB_NO_UPDATE'						=> 'UPDATE [table]',
	'LBL_UW_DB_PERMS'							=> 'Necessary Privilege',

	'LBL_UW_DESC_MODULES_INSTALLED'				=> 'The following upgrades have been installed:',
	'LBL_UW_END_DESC'							=> 'Congratulations, your system is now upgraded.',
	'LBL_UW_END_DESC2'							=> 'If you have chosen to manually run any steps such as file merges or SQL queries, please do this now.  Your system will be in an unstable state until those steps are completed.',
	'LBL_UW_END_LOGOUT'							=> 'Please log out of your account if you plan on upgrading further than this patch/upgrade level.',
	'LBL_UW_END_LOGOUT2'						=> 'Logout',
	'LBL_UW_REPAIR_INDEX'						=> 'For database performance improvements, please run the <a href="index.php?module=Administration&action=RepairIndex" target="_blank">Repair Index</a> script.',

	'LBL_UW_FILE_DELETED'						=> " has been removed.<br>",
	'LBL_UW_FILE_GROUP'							=> 'Group',
	'LBL_UW_FILE_ISSUES_PERMS'					=> 'File Permissions',
	'LBL_UW_FILE_ISSUES'						=> 'File Issues',
	'LBL_UW_FILE_NEEDS_DIFF'					=> 'File Requires Manual Diff',
	'LBL_UW_FILE_NO_ERRORS'						=> '<b>All Files Writable</b>',
	'LBL_UW_FILE_OWNER'							=> 'Owner',
	'LBL_UW_FILE_PERMS'							=> 'Permissions',
	'LBL_UW_FILE_UPLOADED'						=> ' has been uploaded',
	'LBL_UW_FILE'								=> 'File Name',
	'LBL_UW_FILES_QUEUED'						=> 'The following upgrades are ready to be installed:',
	'LBL_UW_FILES_REMOVED'						=> "The following files will be removed from the system:<br>\n",

	'LBL_UW_FROZEN'								=> 'Required steps must be completed before continuing.',
	'LBL_UW_HIDE_DETAILS'						=> 'Hide Details',
	'LBL_UW_IN_PROGRESS'						=> 'In Progress',
	'LBL_UW_INCLUDING'							=> 'Including',
	'LBL_UW_INCOMPLETE'							=> 'Incomplete',
	'LBL_UW_INSTALL'							=> 'File INSTALL',
	'LBL_UW_MANUAL_MERGE'						=> 'File Merge',
	'LBL_UW_MODULE_READY_UNINSTALL'				=> "Module is ready to be uninstalled.  Click \"Commit\" to proceed with installation.<br>\n",
	'LBL_UW_MODULE_READY'						=> "Module is ready to be installed.  Click \"Commit\" to proceed with installation.",
	'LBL_UW_NO_INSTALLED_UPGRADES'				=> 'No recorded Upgrades detected.',
	'LBL_UW_NONE'								=> 'None',
	'LBL_UW_NOT_AVAILABLE'						=> 'Not available',
	'LBL_UW_OVERWRITE_DESC'						=> "All changed files will be overwritten, including any code customizations and template changes you have made. Are you sure you want to proceed?",
	'LBL_UW_OVERWRITE_FILES_CHOICE1'			=> 'Overwrite All Files',
	'LBL_UW_OVERWRITE_FILES_CHOICE2'			=> 'Manual Merge - Preserve All',
	'LBL_UW_OVERWRITE_FILES'					=> 'Merge Method',
	'LBL_UW_PATCH_READY'						=> 'The patch is ready to proceed. Click the "Commit" button below to complete the upgrade process.',
	'LBL_UW_PATCH_READY2'						=> '<h2>Notice: Customized Layouts Found</h2><br />The following file(s) have new fields or modified screen layouts applied via the Studio. The patch you are about to install also contains changes to the file(s). For <u>each file</u> you may:<br><ul><li>[<b>Default</b>] Retain your version by leaving the checkbox blank. The patch modifications will be ignored.</li>or<li>Accept the updated files by selecting the checkbox. Your layouts will need to be re-applied via Studio.</li></ul>',

	'LBL_UW_PREFLIGHT_ADD_TASK'					=> 'Create Task Item for Manual Merge?',
	'LBL_UW_PREFLIGHT_COMPLETE'					=> 'Preflight Check',
	'LBL_UW_PREFLIGHT_DIFF'						=> 'Differentiated ',
	'LBL_UW_PREFLIGHT_EMAIL_REMINDER'			=> 'Email Yourself a Reminder for Manual Merge?',
	'LBL_UW_PREFLIGHT_FILES_DESC'				=> 'The files listed below have been modified.  Uncheck items that require a manual merge. <i>Any detected layout changes are automatically unchecked; checkmark any that should be overwritten.',
	'LBL_UW_PREFLIGHT_NO_DIFFS'					=> 'No Manual File Merge Required.',
	'LBL_UW_PREFLIGHT_NOT_NEEDED'				=> 'Not needed.',
	'LBL_UW_PREFLIGHT_PRESERVE_FILES'			=> 'Auto-preserved Files:',
	'LBL_UW_PREFLIGHT_TESTS_PASSED'				=> 'All Preflight tests passed. Press "Next" to commit these changes.',
	'LBL_UW_PREFLIGHT_TOGGLE_ALL'				=> 'Toggle All Files',

	'LBL_UW_REBUILD_TITLE'						=> 'Rebuild Result',
	'LBL_UW_SCHEMA_CHANGE'						=> 'Schema Changes',

	'LBL_UW_SHOW_COMPLIANCE'					=> 'Show Detected Settings',
	'LBL_UW_SHOW_DB_PERMS'						=> 'Show Missing Database Permissions',
	'LBL_UW_SHOW_DETAILS'						=> 'Show Details',
	'LBL_UW_SHOW_DIFFS'							=> 'Show Files Requiring Manual Merge',
	'LBL_UW_SHOW_NW_FILES'						=> 'Show Files with Bad Permissions',
	'LBL_UW_SHOW_SCHEMA'						=> 'Show Schema Change Script',
	'LBL_UW_SHOW_SQL_ERRORS'					=> 'Show Bad Queries',
	'LBL_UW_SHOW'								=> 'Show',

	'LBL_UW_SKIPPED_FILES_TITLE'				=> 'Skipped Files',
	'LBL_UW_SKIPPING_FILE_OVERWRITE'			=> 'Skipping File Overwrites - Manual Merge Selected.',
	'LBL_UW_SQL_RUN'							=> 'Check when SQL has been manually run',
	'LBL_UW_START_DESC'							=> 'Welcome to the SugarCRM Upgrade Wizard. This wizard is designed to assist administrators when upgrading their SugarCRM instances.  Please follow the instructions carefully.',
	'LBL_UW_START_DESC2'						=> 'We highly recommend that you perform the upgrade on a cloned instance of your production server first.  Please backup the database and the system files (all of the files in the SugarCRM folder) before performing this operation.',
	'LBL_UW_START_UPGRADED_UW_DESC'				=> 'The new Upgrade Wizard will now resume the upgrade process. Please continue your upgrade.',
	'LBL_UW_START_UPGRADED_UW_TITLE'			=> 'Welcome to the new Upgrade Wizard',

	'LBL_UW_SYSTEM_CHECK_CHECKING'				=> 'Now checking, please wait.  This could take up to 30 seconds.',
	'LBL_UW_SYSTEM_CHECK_FILE_CHECK_START'		=> 'Finding all pertinent files to check.',
	'LBL_UW_SYSTEM_CHECK_FILES'					=> 'Files',
	'LBL_UW_SYSTEM_CHECK_FOUND'					=> 'Found',

	'LBL_UW_TITLE_CANCEL'						=> 'Cancel',
	'LBL_UW_TITLE_COMMIT'						=> 'Commit Upgrade',
	'LBL_UW_TITLE_END'							=> 'Debrief',
	'LBL_UW_TITLE_PREFLIGHT'					=> 'Preflight Check',
	'LBL_UW_TITLE_START'						=> 'Start',
	'LBL_UW_TITLE_SYSTEM_CHECK'					=> 'System Checks',
	'LBL_UW_TITLE_UPLOAD'						=> 'Upload Upgrade',
	'LBL_UW_TITLE'								=> 'Upgrade Wizard',
	'LBL_UW_UNINSTALL'							=> 'Uninstall',
		'LBL_UW_ACCEPT_THE_LICENSE' 				=> 'Accept License',
	'LBL_UW_CONVERT_THE_LICENSE' 				=> 'Convert License',
	'LBL_UW_CUSTOMIZED_OR_UPGRADED_MODULES'     => 'Upgraded/Customized Modules',
	'LBL_UW_FOLLOWING_MODULES_CUSTOMIZED'       => 'The following modules are detected as customized and preserved',
	'LBL_UW_FOLLOWING_MODULES_UPGRADED'         => 'The following modules are detected as Studio-customized and have been upgraded',

	'LBL_START_UPGRADE_IN_PROGRESS'             => 'Start in progress',
	'LBL_SYSTEM_CHECKS_IN_PROGRESS'             => 'System Checks in progress',
	'LBL_LICENSE_CHECK_IN_PROGRESS'             => 'License Check in progress',
	'LBL_PREFLIGHT_CHECK_IN_PROGRESS'           => 'Preflight Check in progress',
	'LBL_COMMIT_UPGRADE_IN_PROGRESS'            => 'Commit Upgrade in progress',
	'LBL_UPGRADE_SUMMARY_IN_PROGRESS'			=> 'Upgrade Summary in progress',
	'LBL_UPGRADE_IN_PROGRESS'                   => 'in progress     ',
	'LBL_UPGRADE_TIME_ELAPSED'                  => 'Time elapsed',
	'LBL_UPGRADE_CANCEL_IN_PROGRESS'			=> 'Upgrade Cancel and Cleanup in progress',
    'LBL_UPGRADE_TAKES_TIME_HAVE_PATIENCE'      => 'Upgrade may take some time',
    'LBL_UPLOADE_UPGRADE_IN_PROGRESS'           => 'Upload checks in progress',
    'LBL_UPLOADING_UPGRADE_PACKAGE'      		=> 'Uploading upgrade package... ',
    'LBL_UW_DORP_THE_OLD_SCHMEA' 				=> 'Would you like Sugar to drop the depricated 451 Schema ?',
	'LBL_UW_DROP_SCHEMA_UPGRADE_WIZARD'			=> 'Upgrade Wizard Drops old 451 schema',
	'LBL_UW_DROP_SCHEMA_MANUAL'					=> 'Manual Drop Schema Post Upgrade',
	'LBL_UW_DROP_SCHEMA_METHOD'					=> 'Old Schema Drop Method',
	'LBL_UW_SHOW_OLD_SCHEMA_TO_DROP'			=> 'Show Old Schema that could be dropped',
	'LBL_UW_SKIPPED_QUERIES_ALREADY_EXIST'      => 'Skipped Queries',
	'LBL_INCOMPATIBLE_PHP_VERSION'              => 'Php version 5 or above is required.',
	'ERR_CHECKSYS_PHP_INVALID_VER'      => 'Your version of PHP is not supported by Sugar.  You will need to install a version that is compatible with the Sugar application.  Please consult the Compatibility Matrix in the Release Notes for supported PHP Versions. Your version is ',
	'LBL_BACKWARD_COMPATIBILITY_ON' 			=> 'Php Backward Compatibility mode is turned on. Set zend.ze1_compatibility_mode to Off for proceeding further',
		'LBL_ML_ACTION' => 'Action',
    'LBL_ML_CANCEL'             => 'Cancel',
    'LBL_ML_COMMIT'=>'Commit',
    'LBL_ML_DESCRIPTION' => 'Description',
    'LBL_ML_INSTALLED' => 'Date Installed',
    'LBL_ML_NAME' => 'Name',
    'LBL_ML_PUBLISHED' => 'Date Published',
    'LBL_ML_TYPE' => 'Type',
    'LBL_ML_UNINSTALLABLE' => 'Uninstallable',
    'LBL_ML_VERSION' => 'Version',
	'LBL_ML_INSTALL'=>'Install',
		'LBL_HOME_PAGE_4_NAME' => 'Tracker',
	'LBL_CURRENT_PHP_VERSION' => '(Your current php version is ',
	'LBL_RECOMMENDED_PHP_VERSION' => '. Recommended php version is 5.2.1 or above)',
	'LBL_MODULE_NAME' => 'UpgradeWizard',
 );
?>

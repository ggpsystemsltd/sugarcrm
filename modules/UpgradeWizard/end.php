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
logThis('[At end.php]');
global $unzip_dir;
global $path;
global $sugar_config;

if($unzip_dir == null ) {
	$unzip_dir = $_SESSION['unzip_dir'];
}

//First repair the databse to ensure it is up to date with the new vardefs/tabledefs
logThis('About to repair the database.', $path);
//Use Repair and rebuild to update the database.
global $dictionary, $beanFiles;

require_once('modules/Trackers/TrackerManager.php');
$trackerManager = TrackerManager::getInstance();
$trackerManager->pause();
$trackerManager->unsetMonitors();

require_once("modules/Administration/QuickRepairAndRebuild.php");
$rac = new RepairAndClear();
$rac->clearVardefs();
$rac->rebuildExtensions();
//bug: 44431 - defensive check to ensure the method exists since upgrades to 6.2.0 may not have this method define yet.
if(method_exists($rac, 'clearExternalAPICache'))
{
    $rac->clearExternalAPICache();
}

$repairedTables = array();

foreach ($beanFiles as $bean => $file) {
	if(file_exists($file)){
		require_once ($file);
		unset($GLOBALS['dictionary'][$bean]);
		$focus = new $bean ();
		if (($focus instanceOf SugarBean))
		{
			if(!isset($repairedTables[$focus->table_name]))
			{
				$sql = $GLOBALS['db']->repairTable($focus, true);
                if(trim($sql) != '')
                {
				    logThis('Running sql:' . $sql, $path);
                }
				$repairedTables[$focus->table_name] = true;
			}

			//Check to see if we need to create the audit table
		    if($focus->is_AuditEnabled() && !$focus->db->tableExists($focus->get_audit_table_name())){
		       logThis('Creating audit table:' . $focus->get_audit_table_name(), $path);
               $focus->create_audit_table();
            }
		}
	}
}

$olddictionary = $dictionary;

unset ($dictionary);
include ('modules/TableDictionary.php');
foreach ($dictionary as $meta) {
	$tablename = $meta['table'];
	if (isset($repairedTables[$tablename])) continue;
	$fielddefs = $meta['fields'];
	$indices = $meta['indices'];
	$sql = $GLOBALS['db']->repairTableParams($tablename, $fielddefs, $indices, true);
    if(trim($sql) != '')
    {
	    logThis('Running sql:' . $sql, $path);
    }
	$repairedTables[$tablename] = true;
}

		$dictionary = $olddictionary;

logThis('database repaired', $path);

$ce_to_pro_ent = isset($_SESSION['upgrade_from_flavor']) && ($_SESSION['upgrade_from_flavor'] == 'SugarCE to SugarPro' || $_SESSION['upgrade_from_flavor'] == 'SugarCE to SugarEnt' || $_SESSION['upgrade_from_flavor'] == 'SugarCE to SugarCorp' || $_SESSION['upgrade_from_flavor'] == 'SugarCE to SugarUlt');

// Run this code if we are upgrading from pre-550 version or if we are doing a CE to PRO/ENT conversion
if($ce_to_pro_ent)
{
    logThis(" Start Building private teams", $path);
	upgradeModulesForTeam();
	logThis(" Finish Building private teams", $path);

	logThis(" Start modules/Administration/upgradeTeams.php", $path);
	ob_start();
	include('modules/Administration/upgradeTeams.php');
	ob_end_clean();
	logThis(" Finish modules/Administration/upgradeTeams.php", $path);

	logThis(" Start Building the team_set and team_sets_teams", $path);
	upgradeModulesForTeamsets();
    logThis(" Finish Building the team_set and team_sets_teams", $path);

    logThis("Starting to rebuild team_set_id for folders table", $path);
	upgradeFolderSubscriptionsTeamSetId();
    logThis("Finished rebuilding team_set_id for folders table", $path);

    if(check_FTS()) {
    	$GLOBALS['db']->full_text_indexing_setup();
    }
}

logThis(" Start Rebuilding the config file again", $path);

//check and set the logger before rebuilding config
if(!isset($sugar_config['logger'])){
	$sugar_config['logger'] =array (
		'level'=>'fatal',
	    'file' =>
	      array (
		      'ext' => '.log',
		      'name' => 'sugarcrm',
		      'dateFormat' => '%c',
		      'maxSize' => '10MB',
		      'maxLogs' => 10,
		      'suffix' => '', // bug51583, change default suffix to blank for backwards comptability
	  	  ),
	);
}
//for upgraded version, set default lead conversion activity option to 'copy'
if(!isset($sugar_config['lead_conv_activity_opt'])) {
    $sugar_config['lead_conv_activity_opt'] = 'copy';
}

if(!rebuildConfigFile($sugar_config, $sugar_version)) {
	logThis('*** WARNING: could not write config.php!', $path);
}
logThis(" Finish Rebuilding the config file again", $path);

set_upgrade_progress('end','in_progress');

// If going from pre 610 to 610+, migrate the report favorites
logThis("Begin: Migrating Sugar Reports Favorites to new SugarFavorites", $path);
migrate_sugar_favorite_reports();
logThis("Complete: Migrating Sugar Reports Favorites to new SugarFavorites", $path);

logThis("Begin: Update custom module built using module builder to add favorites", $path);
add_custom_modules_favorites_search();
logThis("Complete: Update custom module built using module builder to add favorites", $path);

if(isset($_SESSION['current_db_version']) && isset($_SESSION['target_db_version'])){
	if($_SESSION['current_db_version'] != $_SESSION['target_db_version']){
		logThis("Adding Saved Report Chart Types", $path);
		if(file_exists("$unzip_dir/scripts/upgrade_homepage.php")) {
            require_once("$unzip_dir/scripts/upgrade_homepage.php");
		    add_report_chart_types();
		}
		logThis("Upgrading multienum data", $path);
        if(file_exists("$unzip_dir/scripts/upgrade_multienum_data.php")) {
            require_once("$unzip_dir/scripts/upgrade_multienum_data.php");
            upgrade_multienum_data();
        }
	 }


	 //keeping separate. making easily visible and readable
	 if($_SESSION['current_db_version'] == $_SESSION['target_db_version']){
	    $_REQUEST['upgradeWizard'] = true;
	    ob_start();
			include('modules/ACL/install_actions.php');
			include_once('include/Smarty/internals/core.write_file.php');
		ob_end_clean();
	 	$db =& DBManagerFactory::getInstance();
		if($ce_to_pro_ent){
	        //Also set license information
			$admin = new Administration();
			$category = 'license';
			$value = '0';
			$admin->saveSetting($category, 'users', $value);
			$key = array('num_lic_oc','key','expire_date');
			$value = '';
			foreach($key as $k){
				$admin->saveSetting($category, $k, $value);
			}
		}
	}
}

// Mark the instance as having gone thru the admin wizard
$admin = new Administration();
$admin->saveSetting('system','adminwizard',1);

 /////////////////////////Old Logger settings///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
if(file_exists('modules/Configurator/Configurator.php')){
	require_once('include/utils/array_utils.php');
	require_once('modules/Configurator/Configurator.php');
	$Configurator = new Configurator();
	$Configurator->parseLoggerSettings();
}
//unset the logger previously instantiated
if(file_exists('include/SugarLogger/LoggerManager.php')){

	unset($GLOBALS['log']);
	$GLOBALS['log'] = LoggerManager::getLogger('SugarCRM');
}

if(function_exists('upgradeUserPreferences')){
	logThis('Upgrading user preferences start .', $path);
	upgradeUserPreferences();
	logThis('Upgrading user preferences end .', $path);
}

if($ce_to_pro_ent){
	if(function_exists('upgradeDashletsForSalesAndMarketing')){
		upgradeDashletsForSalesAndMarketing();
	}
}

if(!$ce_to_pro_ent) {
   fix_report_relationships($path);
}

//Upgrade connectors
logThis('Begin upgrade_connectors', $path);
upgrade_connectors();
logThis('End upgrade_connectors', $path);


// Enable the InsideView connector by default
if($_SESSION['current_db_version'] < '621' && function_exists('upgradeEnableInsideViewConnector')) {
    upgradeEnableInsideViewConnector();
}

/*
if ($_SESSION['current_db_version'] < '620' && ($sugar_config['dbconfig']['db_type'] == 'mssql' || $sugar_config['dbconfig']['db_type'] == 'oci8'))
{
    repair_long_relationship_names($path);
}
*/

//Global search support
/*
if($_SESSION['current_db_version'] < '620' && function_exists('add_unified_search_to_custom_modules_vardefs'))
{
   logThis('Add global search for custom modules start .', $path);
   add_unified_search_to_custom_modules_vardefs();
   logThis('Add global search for custom modules finished .', $path);
}
*/

//Upgrade system displayed tabs and subpanels
if(function_exists('upgradeDisplayedTabsAndSubpanels'))
{
	upgradeDisplayedTabsAndSubpanels($_SESSION['current_db_version']);
}


//Unlink files that have been removed
if(function_exists('unlinkUpgradeFiles'))
{
	unlinkUpgradeFiles($_SESSION['current_db_version']);
}

if(function_exists('rebuildSprites') && function_exists('imagecreatetruecolor'))
{
    rebuildSprites(true);
}

//Run repairUpgradeHistoryTable
if($_SESSION['current_db_version'] < '650' && function_exists('repairUpgradeHistoryTable'))
{
    repairUpgradeHistoryTable();
}

require_once('modules/Administration/upgrade_custom_relationships.php');
upgrade_custom_relationships();

require_once('modules/UpgradeWizard/uw_utils.php');

/*
if($_SESSION['current_db_version'] < '620')
{
	upgradeDateTimeFields($path);
	upgradeDocumentTypeFields($path);
}
*/

//Update the license
logThis('Start Updating the license ', $path);
ob_start();

   check_now(get_sugarbeat());
ob_end_clean();
logThis('End Updating the license ', $path);

set_upgrade_progress('end','done');

logThis('Cleaning up the session.  Goodbye.');
unlinkUWTempFiles();
logThis('Cleaning up the session.  Goodbye.');
resetUwSession();
// flag to say upgrade has completed
$_SESSION['upgrade_complete'] = true;

//Clear any third party caches
sugar_cache_reset_full();

//add the clean vardefs here
if(!class_exists('VardefManager')){

}
VardefManager::clearVardef();

require_once('include/TemplateHandler/TemplateHandler.php');
TemplateHandler::clearAll();

//also add the cache cleaning here.
if(function_exists('deleteCache')){
	deleteCache();
}

global $mod_strings;
global $current_language;

if(!isset($current_language) || ($current_language == null)){
	$current_language = 'en_us';
}
if(isset($GLOBALS['current_language']) && ($GLOBALS['current_language'] != null)){
	$current_language = $GLOBALS['current_language'];
}
$mod_strings = return_module_language($current_language, 'UpgradeWizard');
$stop = false;


$httpHost		= $_SERVER['HTTP_HOST'];  // cn: 8472 - HTTP_HOST includes port in some cases
if($colon = strpos($httpHost, ':')) {
	$httpHost	= substr($httpHost, 0, $colon);
}
$parsedSiteUrl	= parse_url($sugar_config['site_url']);
$host			= ($parsedSiteUrl['host'] != $httpHost) ? $httpHost : $parsedSiteUrl['host'];

// aw: 9747 - use SERVER_PORT for users who don't plug in the site_url at install correctly
if ($_SERVER['SERVER_PORT'] != 80){
	$port = ":".$_SERVER['SERVER_PORT'];
}
else if (isset($parsedSiteUrl['port']) && $parsedSiteUrl['port'] != 80){
	$port = ":".$parsedSiteUrl['port'];
}
else{
	$port = '';
}
$path			= $parsedSiteUrl['path'];
$cleanUrl		= "{$parsedSiteUrl['scheme']}://{$host}{$port}{$path}/index.php";

$uwMain =<<<eoq
<table cellpadding="3" cellspacing="0" border="0">

	<tr>
		<td align="left">
			<p>
			<br>
			{$mod_strings['LBL_UW_END_LOGOUT_PRE2']}
			<br>
			<br>
            <b>{$mod_strings['LBL_UW_END_LOGOUT_PRE']}</b> {$mod_strings['LBL_UW_END_LOGOUT']}
			</p>
		</td>
	</tr>
</table>

<script>
 function deleteCacheAjax(){
	//AJAX call for checking the file size and comparing with php.ini settings.
	var callback = {
		 success:function(r) {
		     //alert(r.responseText);
		 }
	}
	postData = '&module=UpgradeWizard&action=deleteCache&to_pdf=1';
	YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
}
</script>
eoq;

$showBack		= false;
$showCancel		= false;
$showRecheck	= false;
$showNext		= false;
$showDone       = true;

$stepBack		= 0;
$stepNext		= 0;
$stepCancel	= 0;
$stepRecheck	= 0;

$_SESSION['step'][$steps['files'][$_REQUEST['step']]] = ($stop) ? 'failed' : 'success';
unset($_SESSION['current_db_version']);
unset($_SESSION['target_db_version']);
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

********************************************************************************/




global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $sugar_config;

$xtpl=new XTemplate ('modules/Administration/Updater.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['useraction']) && ($_REQUEST['useraction']=='Save' || $_REQUEST['useraction']=='CheckNow')) {
	if(!empty($_REQUEST['type']) && $_REQUEST['type'] == 'automatic') {
		set_CheckUpdates_config_setting('automatic');
	}else{
		set_CheckUpdates_config_setting('manual');
	}

	$beat=false;
	if(!empty($_REQUEST['beat'])) {
		$beat=true;
	}
	if ($beat != get_sugarbeat()) {
		set_sugarbeat($beat);
	}
}

echo getClassicModuleTitle(
        "Administration", 
        array(
            "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
           $mod_strings['LBL_SUGAR_UPDATE_TITLE'],
           ), 
        false
        );

if (get_sugarbeat()) $xtpl->assign("SEND_STAT_CHECKED", "checked");

if (get_CheckUpdates_config_setting()=='automatic') {
	$xtpl->assign("AUTOMATIC_CHECKED", "checked");
}


if (isset($_REQUEST['useraction']) && $_REQUEST['useraction']=='CheckNow') {
	check_now(get_sugarbeat());
	loadLicense();

}

	/*

$xtpl->parse('main.stats');
	*/


$has_updates= false;
if(!empty($license->settings['license_latest_versions'])){

	$encodedVersions = $license->settings['license_latest_versions'];

	$versions = unserialize(base64_decode( $encodedVersions));
	include('sugar_version.php');
	if(!empty($versions)){
		foreach($versions as $version){
			if(compareVersions($version['version'], $sugar_version))
			{
				$has_updates = true;
				$xtpl->assign("VERSION", $version);
				$xtpl->parse('main.updates.version');
			}
		}
	}
	if(!$has_updates){
		$xtpl->parse('main.noupdates');
	}else{
		$xtpl->parse('main.updates');
	}
}

//return module and index.
$xtpl->assign("RETURN_MODULE", "Administration");
$xtpl->assign("RETURN_ACTION", "index");

$xtpl->parse("main");
$xtpl->out("main");
?>

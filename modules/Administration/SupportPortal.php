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







global $mod_strings;
global $app_list_strings;
global $app_strings;
global $theme;
global $current_user;
global $currentModule;

switch ($_REQUEST['view']) {
	case "support_portal":
		if (!is_admin($current_user)) sugar_die("Unauthorized access to administration.");
		$GLOBALS['log']->info("Administration SupportPortal");

		$iframe_url = add_http("www.sugarcrm.com/network/redirect.php?tmpl=network");
        
        echo getClassicModuleTitle(
            "Administration", 
            array(
                "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
               $mod_strings['LBL_SUPPORT_TITLE'],
               ), 
            false
            );
        
        $sugar_smarty = new Sugar_Smarty();
        $sugar_smarty->assign('iframeURL', $iframe_url);
        $sugar_smarty->assign('langHeader', get_language_header());
        echo $sugar_smarty->fetch('modules/Administration/SupportPortal.tpl');

		break;
	default:

		$send_version = isset($_REQUEST['version']) ? $_REQUEST['version'] : "";
		$send_edition = isset($_REQUEST['edition']) ? $_REQUEST['edition'] : "";
		$send_lang = isset($_REQUEST['lang']) ? $_REQUEST['lang'] : "";
		$send_module = isset($_REQUEST['help_module']) ? $_REQUEST['help_module'] : "";
		$send_action = isset($_REQUEST['help_action']) ? $_REQUEST['help_action'] : "";
		$send_key = isset($_REQUEST['key']) ? $_REQUEST['key'] : "";
		$send_anchor = '';
		// awu: Fixes the ProjectTasks pluralization issue -- must fix in later versions.
		if ($send_module == 'ProjectTasks')
			$send_module = 'ProjectTask';
        if ($send_module == 'ProductCatalog')
                $send_module = 'ProductTemplates';
        if ($send_module == 'TargetLists')
                $send_module = 'ProspectLists';
        if ($send_module == 'Targets')
                $send_module = 'Prospects';                            
		// FG - Bug 39819 - Check for custom help files
		$helpPath = 'modules/'.$send_module.'/language/'.$send_lang.'.help.'.$send_action.'.html';
		if (sugar_is_file("custom/" . $helpPath)) {
		    $helpPath = 'custom/' . $helpPath;
		}
		$sugar_smarty = new Sugar_Smarty();

		//go to the support portal if the file is not found.
		// FG - Bug 39820 - Devs can write help files also in english, so skip check for language not equals "en_us" !
		if (file_exists($helpPath))
		{
			$sugar_smarty->assign('helpFileExists', TRUE);
			$sugar_smarty->assign('MOD', $mod_strings);
			$sugar_smarty->assign('modulename', $send_module);
			$sugar_smarty->assign('helpPath', $helpPath);
			$sugar_smarty->assign('currentURL', getCurrentURL());
			$sugar_smarty->assign('title', $mod_strings['LBL_SUGARCRM_HELP'] . " - " . $send_module);
			$sugar_smarty->assign('styleSheet', SugarThemeRegistry::current()->getCSS());
			$sugar_smarty->assign('table', "<table class='tabForm'><tr><td>");
			$sugar_smarty->assign('endtable', "</td></tr></table>");
			$sugar_smarty->assign('charset', $app_strings['LBL_CHARSET']);
            $sugar_smarty->assign('langHeader', get_language_header());
			echo $sugar_smarty->fetch('modules/Administration/SupportPortal.tpl');			
			
		} else {
			if(empty($send_module)){
				$send_module = 'toc';
			}
			
			$dev_status = 'GA';
			//If there is an alphabetic portion between the decimal prefix and integer suffix, then use the
			//value there as the dev_status value
			$dev_status = getVersionStatus($GLOBALS['sugar_version']);
			$send_version = getMajorMinorVersion($GLOBALS['sugar_version']);
			$editionMap = array('ENT' => 'Enterprise', 'PRO' => 'Professional', 'CE' => 'Community_Edition');
			if(!empty($editionMap[$send_edition])){
				$send_edition = $editionMap[$send_edition];
			}
			
			//map certain modules
			$sendModuleMap = array(
								'administration' => array(
													array('name' => 'Administration', 'action' => 'supportportal', 'anchor' => '1910574'),
													array('name' => 'Administration', 'action' => 'updater', 'anchor' => '1910574'),
													array('name' => 'Administration', 'action' => 'licensesettings', 'anchor' => '1910574'),
													array('name' => 'Administration', 'action' => 'diagnostic', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'listviewofflineclient', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'enablewirelessmodules', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'backups', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'upgrade', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'locale', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'themesettings', 'anchor' => '1111949'),
													array('name' => 'Administration', 'action' => 'passwordmanager', 'anchor' => '1446494'),
													array('name' => 'Administration', 'action' => 'upgradewizard', 'anchor' => '1168410'),
													array('name' => 'Administration', 'action' => 'configuretabs', 'anchor' => '1168410'),
													array('name' => 'Administration', 'action' => 'configuresubpanels', 'anchor' => '1168410'),
													array('name' => 'Administration', 'action' => 'wizard', 'anchor' => '1168410'),
												),
								'calls' => array(array('name' => 'Activities')), 
								'tasks' => array(array('name' => 'Activities')), 
								'meetings' => array(array('name' => 'Activities')), 
								'notes' => array(array('name' => 'Activities')),
								'calendar' => array(array('name' => 'Activities')),
								'configurator' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'upgradewizard' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'schedulers' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'sugarfeed' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'connectors' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'trackers' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'currencies' => array(array('name' => 'Administration', 'anchor' => '1878359')),
								'aclroles' => array(array('name' => 'Administration', 'anchor' => '1916499')),
								'roles' => array(array('name' => 'Administration', 'anchor' => '1916499')),
								'teams' => array(array('name' => 'Administration', 'anchor' => '1916499')),
								'users' => array(array('name' => 'Administration', 'anchor' => '1916499'), array('name' => 'Administration', 'action' => 'detailview', 'anchor' => '1916518')),
								'modulebuilder' => array(array('name' => 'Administration', 'anchor' => '1168410')),
								'studio' => array(array('name' => 'Administration', 'anchor' => '1168410')),
								'workflow' => array(array('name' => 'Administration', 'anchor' => '1168410')),
								'producttemplates' => array(array('name' => 'Administration', 'anchor' => '1957376')),
								'productcategories' => array(array('name' => 'Administration', 'anchor' => '1957376')),
								'producttypes' => array(array('name' => 'Administration', 'anchor' => '1957376')),
								'manufacturers' => array(array('name' => 'Administration', 'anchor' => '1957376')),
								'shippers' => array(array('name' => 'Administration', 'anchor' => '1957376')),
								'taxrates' => array(array('name' => 'Administration', 'anchor' => '1957376')),
								'releases' => array(array('name' => 'Administration', 'anchor' => '1868932')),
								'timeperiods' => array(array('name' => 'Administration', 'anchor' => '1957639')),
								'contracttypes' => array(array('name' => 'Administration', 'anchor' => '1957677')),
								'contracttype' => array(array('name' => 'Administration', 'anchor' => '1957677')),
								'emailman' => array(array('name' => 'Administration', 'anchor' => '1445484')),
								'inboundemail' => array(array('name' => 'Administration', 'anchor' => '1445484')),
								'emailtemplates' => array(array('name' => 'Emails')),
								'prospects' => array(array('name' => 'Campaigns')),
								'prospectlists' => array(array('name' => 'Campaigns')),
								'reportmaker' => array(array('name' => 'Reports')),
								'customqueries' => array(array('name' => 'Reports')),
								'quotas' => array(array('name' => 'Forecasts')),
								'projecttask' => array(array('name' => 'Projects')),
								'project' => array(array('name' => 'Projects'), array('name' => 'Dashboard', 'action' => 'dashboard'), ),
								'projecttemplate' => array(array('name' => 'Projects')),
								'datasets' => array(array('name' => 'Reports')),
								'dataformat' => array(array('name' => 'Reports')),
								'employees' => array(array('name' => 'Administration', 'anchor' => '1957677')),
								'kbdocuments' => array(array('name' => 'Administration', 'action' => 'kbadminview', 'anchor' => '1957677')),
							 );
							 
			if(!empty($sendModuleMap[strtolower($send_module)])){
				$mappings = $sendModuleMap[strtolower($send_module)];
				
				foreach($mappings as $map){
					if(!empty($map['action'])){
						if($map['action'] == strtolower($send_action)){
							$send_module = $map['name'];
							if(!empty($map['anchor'])){
								$send_anchor = $map['anchor'];
							}
						}
					}else{
						$send_module = $map['name'];
						if(!empty($map['anchor'])){
								$send_anchor = $map['anchor'];
						}
					}
				}
				//$send_module = $sendModuleMap[strtolower($send_module)];
			}


            $iframe_url = get_help_url($send_edition, $send_version, $send_lang, $send_module, $send_action, $dev_status, $send_key, $send_anchor);
			
			header("Location: {$iframe_url}");
			
			//$sugar_smarty->assign('helpFileExists', FALSE);
			//$sugar_smarty->assign('iframeURL', $iframe_url);
		}
		break;

}

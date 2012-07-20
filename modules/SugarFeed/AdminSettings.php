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



require_once('modules/Configurator/Configurator.php');


$admin = new Administration();
$admin->retrieveSettings();

// Handle posts
if ( !empty($_REQUEST['process']) ) {
    // Check the cleanup logic hook, make sure it is still there
    check_logic_hook_file('Users','after_login', array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php', 'SugarFeedFlush', 'flushStaleEntries'));

    // We have data posted
    if ( $_REQUEST['process'] == 'true' ) {
        // They want us to process it, the false will just fall outside of this statement
        if ( $_REQUEST['feed_enable'] == '1' ) {
            // The feed is enabled, pay attention to what categories should be enabled or disabled

            if ( ! isset($db) ) {
                $db = DBManagerFactory::getInstance();
            }
            $ret = $db->query("SELECT * FROM config WHERE category = 'sugarfeed' AND name LIKE 'module_%'");
            $current_modules = array();
            while ( $row = $db->fetchByAssoc($ret) ) {
                $current_modules[$row['name']] = $row['value'];
            }
            
            $active_modules = $_REQUEST['modules'];
            if ( ! is_array($active_modules) ) { $active_modules = array(); }
            
            foreach ( $active_modules as $name => $is_active ) {
                $module = substr($name,7);
                
                if ( $is_active == '1' ) {
                    // They are activating something that was disabled before
                    SugarFeed::activateModuleFeed($module);
                } else {
                    // They are disabling something that was active before
                    SugarFeed::disableModuleFeed($module);
                }
            }
            
            $admin->saveSetting('sugarfeed','enabled','1');
        } else {
            $admin->saveSetting('sugarfeed','enabled','0');
            // Now we need to remove all of the logic hooks, so they don't continue to run
            // We also need to leave the database alone, so they can enable/disable modules with the system disabled
            $modulesWithFeeds = SugarFeed::getAllFeedModules();
            
            foreach ( $modulesWithFeeds as $currFeedModule ) {
                SugarFeed::disableModuleFeed($currFeedModule,FALSE);
            }
        }

        $admin->retrieveSettings(FALSE,TRUE);
        SugarFeed::flushBackendCache();
    } else if ( $_REQUEST['process'] == 'deleteRecords' ) {
        if ( ! isset($db) ) {
            $db = DBManagerFactory::getInstance();
        }
        $db->query("UPDATE sugarfeed SET deleted = '1'");        
        echo(translate('LBL_RECORDS_DELETED','SugarFeed'));
    }



    if ( $_REQUEST['process'] == 'true' || $_REQUEST['process'] == 'false' ) {
        header('Location: index.php?module=Administration&action=index');
        return;
    }
}

$sugar_smarty	= new Sugar_Smarty();
$sugar_smarty->assign('mod', $mod_strings);
$sugar_smarty->assign('app', $app_strings);

if ( isset($admin->settings['sugarfeed_enabled']) && $admin->settings['sugarfeed_enabled'] == '1' ) {
    $sugar_smarty->assign('enabled_checkbox','checked');
}

$possible_feeds = SugarFeed::getAllFeedModules();
$module_list = array();
$userFeedEnabled = 0;
foreach ( $possible_feeds as $module ) {
    $currModule = array();
    if ( isset($admin->settings['sugarfeed_module_'.$module]) && $admin->settings['sugarfeed_module_'.$module] == '1' ) {
        $currModule['enabled'] = 1;
    } else {
        $currModule['enabled'] = 0;
    }

    $currModule['module'] = $module;
    if ( $module == 'UserFeed' ) {
        // Fake module, need to handle specially
        $userFeedEnabled = $currModule['enabled'];
        continue;
    } else {
        $currModule['label'] = $GLOBALS['app_list_strings']['moduleList'][$module];
    }

    $module_list[] = $currModule;
}
$sugar_smarty->assign('module_list',$module_list);
$sugar_smarty->assign('user_feed_enabled',$userFeedEnabled);

echo getClassicModuleTitle(
        "Administration", 
        array(
            "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
           $mod_strings['LBL_MODULE_NAME'],
           ), 
        false
        );
$sugar_smarty->display('modules/SugarFeed/AdminSettings.tpl');


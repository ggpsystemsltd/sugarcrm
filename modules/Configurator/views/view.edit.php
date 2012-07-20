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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('modules/Configurator/Forms.php');
require_once('modules/Administration/Forms.php');
require_once('modules/Configurator/Configurator.php');
require_once('include/SugarLogger/SugarLogger.php');
require_once('modules/Leads/Lead.php');

class ConfiguratorViewEdit extends ViewEdit
{
    /**
	 * @see SugarView::preDisplay()
	 */
	public function preDisplay()
    {
        if(!is_admin($GLOBALS['current_user']))
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
    }
    
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
    	   $mod_strings['LBL_SYSTEM_SETTINGS']
    	   );
    }
    
	/**
	 * @see SugarView::display()
	 */
	public function display()
	{
	    global $current_user, $mod_strings, $app_strings, $app_list_strings, $sugar_config, $locale;
	    
	    $configurator = new Configurator();
        $sugarConfig = SugarConfig::getInstance();
        $focus = new Administration();
        $configurator->parseLoggerSettings();
        
        $focus->retrieveSettings();
        if(!empty($_POST['restore'])){
            $configurator->restoreConfig();
        }
        
        $this->ss->assign('MOD', $mod_strings);
        $this->ss->assign('APP', $app_strings);
        $this->ss->assign('APP_LIST', $app_list_strings);
        $this->ss->assign('config', $configurator->config);
        $this->ss->assign('error', $configurator->errors);
        $this->ss->assign("AUTO_REFRESH_INTERVAL_OPTIONS", get_select_options_with_id($app_list_strings['dashlet_auto_refresh_options_admin'], isset($configurator->config['dashlet_auto_refresh_min']) ? $configurator->config['dashlet_auto_refresh_min'] : 30));
        $this->ss->assign('LANGUAGES', get_languages());
        $this->ss->assign("JAVASCRIPT",get_set_focus_js(). get_configsettings_js());
        $this->ss->assign('company_logo', SugarThemeRegistry::current()->getImageURL('company_logo.png'));
        $this->ss->assign("settings", $focus->settings);
        $this->ss->assign("mail_sendtype_options", get_select_options_with_id($app_list_strings['notifymail_sendtype'], $focus->settings['mail_sendtype']));
        if(!empty($focus->settings['proxy_on'])){
            $this->ss->assign("PROXY_CONFIG_DISPLAY", 'inline');
        }else{
            $this->ss->assign("PROXY_CONFIG_DISPLAY", 'none');
        }
        if(!empty($focus->settings['proxy_auth'])){
            $this->ss->assign("PROXY_AUTH_DISPLAY", 'inline');
        }else{
            $this->ss->assign("PROXY_AUTH_DISPLAY", 'none');
        }
        $ini_session_val = ini_get('session.gc_maxlifetime');
        if(!empty($focus->settings['system_session_timeout'])){
            $this->ss->assign("SESSION_TIMEOUT", $focus->settings['system_session_timeout']);
        }else{
            $this->ss->assign("SESSION_TIMEOUT", $ini_session_val);
        }
        if (!empty($configurator->config['logger']['level'])) {
            $this->ss->assign('log_levels', get_select_options_with_id(  LoggerManager::getLoggerLevels(), $configurator->config['logger']['level']));
        } else {
            $this->ss->assign('log_levels', get_select_options_with_id(  LoggerManager::getLoggerLevels(), ''));
        }
        if (!empty($configurator->config['lead_conv_activity_opt'])) {
            $this->ss->assign('lead_conv_activities', get_select_options_with_id(  Lead::getActivitiesOptions(), $configurator->config['lead_conv_activity_opt']));
        } else {
            $this->ss->assign('lead_conv_activities', get_select_options_with_id(  Lead::getActivitiesOptions(), ''));
        }
        if (!empty($configurator->config['logger']['file']['suffix'])) {
            $this->ss->assign('filename_suffix', get_select_options_with_id(  SugarLogger::$filename_suffix,$configurator->config['logger']['file']['suffix']));
        } else {
            $this->ss->assign('filename_suffix', get_select_options_with_id(  SugarLogger::$filename_suffix,''));
        }
        
        echo $this->getModuleTitle(false);
        
        $this->ss->display('modules/Configurator/tpls/EditView.tpl');
        
        $javascript = new javascript();
        $javascript->setFormName("ConfigureSettings");
        $javascript->addFieldGeneric("notify_fromaddress", "email", $mod_strings['LBL_NOTIFY_FROMADDRESS'], TRUE, "");
        $javascript->addFieldGeneric("notify_subject", "varchar", $mod_strings['LBL_NOTIFY_SUBJECT'], TRUE, "");
        $javascript->addFieldGeneric("proxy_host", "varchar", $mod_strings['LBL_PROXY_HOST'], TRUE, "");
        $javascript->addFieldGeneric("proxy_port", "int", $mod_strings['LBL_PROXY_PORT'], TRUE, "");
        $javascript->addFieldGeneric("proxy_password", "varchar", $mod_strings['LBL_PROXY_PASSWORD'], TRUE, "");
        $javascript->addFieldGeneric("proxy_username", "varchar", $mod_strings['LBL_PROXY_USERNAME'], TRUE, "");
        $javascript->addFieldRange("system_session_timeout", "int", $mod_strings['SESSION_TIMEOUT'], TRUE, "", 0, $ini_session_val);
        echo $javascript->getScript();
	}
}

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

require_once('include/MVC/View/SugarView.php');
require_once('modules/Configurator/Forms.php');
require_once('modules/Administration/Forms.php');
require_once('modules/Configurator/Configurator.php');

class ViewAdminwizard extends SugarView
{
    public function __construct()
    {
        parent::SugarView();
        
        $this->options['show_header'] = false;
        $this->options['show_footer'] = false;
        $this->options['show_javascript'] = false;
    }
    
        /**
         * @see SugarView::display()
         */
        public function display()
        {
            global $current_user, $mod_strings, $app_list_strings, $sugar_config, $locale, $sugar_version;
            
            if(!is_admin($current_user)){
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
        }
                
                $themeObject = SugarThemeRegistry::current();
        
        $configurator = new Configurator();
        $sugarConfig = SugarConfig::getInstance();
        $focus = new Administration();
        $focus->retrieveSettings();
        
        $ut = $GLOBALS['current_user']->getPreference('ut');
        if(empty($ut))
            $this->ss->assign('SKIP_URL','index.php?module=Users&action=Wizard&skipwelcome=1');
        else
            $this->ss->assign('SKIP_URL','index.php?module=Home&action=index');
        
        // Always mark that we have got past this point
        $focus->saveSetting('system','adminwizard',1);
        $css = $themeObject->getCSS();
        $favicon = $themeObject->getImageURL('sugar_icon.ico',false);
        $this->ss->assign('FAVICON_URL',getJSPath($favicon));
        $this->ss->assign('SUGAR_CSS', $css);
        $this->ss->assign('MOD_USERS',return_module_language($GLOBALS['current_language'], 'Users'));
        $this->ss->assign('CSS', '<link rel="stylesheet" type="text/css" href="'.SugarThemeRegistry::current()->getCSSURL('wizard.css').'" />');
        $this->ss->assign('LANGUAGES', get_languages());
        $this->ss->assign('config', $sugar_config);
        $this->ss->assign('SUGAR_VERSION', $sugar_version);
        $this->ss->assign('settings', $focus->settings);
        $this->ss->assign('exportCharsets', get_select_options_with_id($locale->getCharsetSelect(), $sugar_config['default_export_charset']));
        $this->ss->assign('getNameJs', $locale->getNameJs());
        $this->ss->assign('NAMEFORMATS', $locale->getUsableLocaleNameOptions($sugar_config['name_formats']));
        $this->ss->assign('JAVASCRIPT',get_set_focus_js(). get_configsettings_js());
        $this->ss->assign('company_logo', SugarThemeRegistry::current()->getImageURL('company_logo.png'));
        $this->ss->assign('mail_smtptype', $focus->settings['mail_smtptype']);
        $this->ss->assign('mail_smtpserver', $focus->settings['mail_smtpserver']);
        $this->ss->assign('mail_smtpport', $focus->settings['mail_smtpport']);
        $this->ss->assign('mail_smtpuser', $focus->settings['mail_smtpuser']);
        $this->ss->assign('mail_smtppass', $focus->settings['mail_smtppass']);
        $this->ss->assign('mail_smtpauth_req', ($focus->settings['mail_smtpauth_req']) ? "checked='checked'" : '');
        $this->ss->assign('MAIL_SSL_OPTIONS', get_select_options_with_id($app_list_strings['email_settings_for_ssl'], $focus->settings['mail_smtpssl']));
        $this->ss->assign('notify_allow_default_outbound_on', (!empty($focus->settings['notify_allow_default_outbound']) && $focus->settings['notify_allow_default_outbound'] == 2) ? 'CHECKED' : '');
        $this->ss->assign('THEME', SugarThemeRegistry::current()->__toString());            

        // get javascript
        ob_start();
        $this->options['show_javascript'] = true;
        $this->renderJavascript();
        $this->options['show_javascript'] = false;
        $this->ss->assign("SUGAR_JS",ob_get_contents().$themeObject->getJS());
        ob_end_clean();

        $this->ss->assign('langHeader', get_language_header());
        $this->ss->assign('START_PAGE', !empty($_REQUEST['page']) ? $_REQUEST['page'] : 'welcome');
                
            $this->ss->display('modules/Configurator/tpls/adminwizard.tpl');
        }
}
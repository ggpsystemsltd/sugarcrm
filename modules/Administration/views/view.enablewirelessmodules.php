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


require_once('include/SugarLicensing/SugarLicensing.php');

class AdministrationViewEnablewirelessmodules extends SugarView 
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
    	   "<a href='index.php?module=Administration&action=index'>".$mod_strings['LBL_MODULE_NAME']."</a>",
    	   translate('LBL_WIRELESS_MODULES_ENABLE')
    	   );
    }
    
    /**
	 * @see SugarView::display()
	 */
	public function display()
	{
        require_once('modules/Administration/Forms.php');
        
        global $mod_strings;
        global $app_list_strings;
        global $app_strings;
        global $license;
        global $current_user;
        global $theme;
        global $currentModule;
        
        $configurator = new Configurator();
        $this->ss->assign('config', $configurator->config);
        
        $enabled_modules = array();
        $disabled_modules = array();
        
        // replicate the essential part of the behavior of the private loadMapping() method in SugarController
        foreach ( array ( '','custom/') as $prefix)
        {
            if(file_exists($prefix.'include/MVC/Controller/wireless_module_registry.php')){
                require $prefix.'include/MVC/Controller/wireless_module_registry.php' ;
            }
        }
        
        foreach ( $wireless_module_registry as $e => $def )
        {
            $enabled_modules [ $e ] = empty($app_list_strings['moduleList'][$e]) ? (($e == "Employees") ? $app_strings['LBL_EMPLOYEES'] : $e) : ($app_list_strings['moduleList'][$e]);
        }
        require_once('modules/ModuleBuilder/Module/StudioBrowser.php');
        $browser = new StudioBrowser();
        $browser->loadModules();
        
        foreach ( $browser->modules as $e => $def)
        {
            if ( empty ( $enabled_modules [ $e ]))
                $disabled_modules [ $e ] = empty($app_list_strings['moduleList'][$e]) ? (($e == "Employees") ? $app_strings['LBL_EMPLOYEES'] : $e) : ($app_list_strings['moduleList'][$e]);
        }
        
        natcasesort($enabled_modules);
        natcasesort($disabled_modules);
        
        $json_enabled = array();
        foreach($enabled_modules as $mod => $label)
        {
            $json_enabled[] = array("module" => $mod, 'label' => $label);
        }
        
        $json_disabled = array();
        foreach($disabled_modules as $mod => $label)
        {
            $json_disabled[] = array("module" => $mod, 'label' => $label);
        }

        // We need to grab the license key
        $key = $license->settings["license_key"];
        $this->ss->assign('url', $this->getMobileEdgeUrl($key));
        
        $this->ss->assign('enabled_modules', json_encode($json_enabled));
        $this->ss->assign('disabled_modules', json_encode($json_disabled));
        $this->ss->assign('mod', $GLOBALS['mod_strings']);
        $this->ss->assign('APP', $GLOBALS['app_strings']);
        $this->ss->assign('theme', $GLOBALS['theme']);
        
        echo getClassicModuleTitle(
                "Administration", 
                array(
                    "<a href='index.php?module=Administration&action=index'>{$mod_strings['LBL_MODULE_NAME']}</a>",
                   translate('LBL_WIRELESS_MODULES_ENABLE')
                   ), 
                false
                );
        echo $this->ss->fetch('modules/Administration/templates/enableWirelessModules.tpl');
    }

    /**
     * Grab the mobile edge server link by polling the licensing server.
     * @returns string url
     */
    protected function getMobileEdgeUrl($license) {
        $licensing = new SugarLicensing();
        $result = $licensing->request("/rest/fetch/mobileserver", array('key' => $license));
        
        // Check if url exists for the provided key.
        if (isset($result["mobileserver"]["server"]["url"])) {
            return $result["mobileserver"]["server"]["url"];
        } else {
            return '';
        }
    }
}
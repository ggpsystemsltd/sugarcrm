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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
require_once('modules/Administration/Forms.php');
require_once('modules/Configurator/Configurator.php');
require_once('include/MVC/View/SugarView.php');
        
class AdministrationViewThemesettings extends SugarView 
{	
 	/**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".$mod_strings['LBL_MODULE_NAME']."</a>",
    	   $mod_strings['LBL_THEME_SETTINGS']
    	   );
    }
    
	/**
     * @see SugarView::process()
     */
    public function process()
    {
        global $current_user;
        if (!is_admin($current_user)) sugar_die("Unauthorized access to administration.");

        // Check if default_theme is valid
        if (isset($_REQUEST['default_theme']) && !in_array($_REQUEST['default_theme'], array_keys(SugarThemeRegistry::allThemes()))) {
            sugar_die("Default theme is invalid.");          
        }
        
        if (isset($_REQUEST['disabled_themes']) ) {
            $toDecode = html_entity_decode  ($_REQUEST['disabled_themes'], ENT_QUOTES);
			$disabledThemes = json_decode($toDecode, true);
			if ( ($key = array_search(SugarThemeRegistry::current()->__toString(),$disabledThemes)) !== FALSE ) {
                unset($disabledThemes[$key]);
            }
            $_REQUEST['disabled_themes'] = implode(',',$disabledThemes);
            $configurator = new Configurator();
            $configurator->config['disabled_themes'] = $_REQUEST['disabled_themes'];
            $configurator->config['default_theme'] = $_REQUEST['default_theme'];
            $configurator->handleOverride();
            echo "true";
        } else {
        	parent::process();
        }
    }
    
 	/** 
     * display the form
     */
 	public function display()
    {
        global $mod_strings, $app_strings, $current_user;
        
        if ( !is_admin($current_user) )
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
            
        $enabled = array();
        foreach(SugarThemeRegistry::availableThemes() as $dir => $theme)
        {
        	$enabled[] = array("theme" => $theme, "dir" => $dir);
        }
    	$disabled = array();
        foreach(SugarThemeRegistry::unAvailableThemes() as $dir => $theme)
        {
        	$disabled[] = array("theme" => $theme, "dir" => $dir);
        }
        $this->ss->assign("THEMES", get_select_options_with_id(SugarThemeRegistry::allThemes(), $GLOBALS['sugar_config']['default_theme']));
        $this->ss->assign('enabled_modules', json_encode($enabled));
        $this->ss->assign('disabled_modules', json_encode($disabled));
        $this->ss->assign('mod', $mod_strings);
        $this->ss->assign('APP', $app_strings);
        $this->ss->assign('currentTheme', SugarThemeRegistry::current());
        
        echo $this->getModuleTitle(false);
        echo $this->ss->fetch('modules/Administration/templates/themeSettings.tpl');
    }
}

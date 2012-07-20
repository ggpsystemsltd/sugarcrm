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

class ViewConfigureshortcutbar extends SugarView
{
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".$mod_strings['LBL_MODULE_NAME']."</a>",
    	   $mod_strings['LBL_CONFIGURE_SHORTCUT_BAR']
    	   );
    }
    
    /**
	 * @see SugarView::preDisplay()
	 */
	public function preDisplay()
	{
	    global $current_user;
        
	    if (!is_admin($current_user)) {
	        sugar_die("Unauthorized access to administration.");
        }
	}
    
    /**
	 * @see SugarView::display()
	 */
	public function display()
	{
        require_once("include/JSON.php");
        $json = new JSON();
        
        global $mod_strings;
        global $app_list_strings;
        global $app_strings;
        global $current_user;
        
        $title = getClassicModuleTitle(
                    "Administration", 
                    array(
                        "<a href='index.php?module=Administration&action=index'>{$mod_strings['LBL_MODULE_NAME']}</a>",
                       translate('LBL_CONFIGURE_SHORTCUT_BAR')
                       ), 
                    false
                    );
        $msg = "";
        
        global $theme, $currentModule, $app_list_strings, $app_strings;
        $GLOBALS['log']->info("Administration ConfigureShortcutBar view");
        $actions_path = "include/DashletContainer/Containers/DCActions.php";
        
        //If save is set, save then let the user know if the save worked.
        if (!empty($_REQUEST['enabled_modules']))
        {
            $toDecode = html_entity_decode  ($_REQUEST['enabled_modules'], ENT_QUOTES);
            $modules = json_decode($toDecode);
            
            //fixing bug #49878: XSS - Administration, Configure Shortcut Bar, enabled_modules
            //prevent attempt of html-injection
            global $moduleList;
            foreach($modules as $key => $value)
            {
                if (!in_array($value, $moduleList))
                {
                    unset($modules[$key]);
                }
            }
            
            $out = "<?php\n \$DCActions = \n" . var_export_helper ( $modules ) . ";";
            if (!is_file("custom/" . $actions_path))
               create_custom_directory("include/DashletContainer/Containers/");
            if ( file_put_contents ( "custom/" . $actions_path, $out ) === false)
               echo translate("LBL_SAVE_FAILED");
            else  {
               echo "true";
            }
            
        } else {
            include($actions_path);
            //Start with the default module
            $availibleModules = $DCActions;
            //Add the ones currently on the layout
            if (is_file('custom/' . $actions_path))
            {
                include('custom/' . $actions_path);
                $availibleModules = array_merge($availibleModules, $DCActions);
            }
            //Next add the ones we detect as having quick create defs.
            $modules = $app_list_strings['moduleList'];
            foreach ($modules as $module => $modLabel)
            {
                if (is_file("modules/$module/metadata/quickcreatedefs.php") || is_file("custom/modules/$module/metadata/quickcreatedefs.php"))
                   $availibleModules[$module] = $module;
            }
            
            $availibleModules = array_diff($availibleModules, $DCActions);
            
            $enabled = array();
            foreach($DCActions as $mod)
            {
                $enabled[] = array("module" => $mod, 'label' => translate($mod));
            }
            
            $disabled = array();
            foreach($availibleModules as $mod)
            {
                $disabled[] = array("module" => $mod, 'label' => translate($mod));
            }
            
            $this->ss->assign('APP', $GLOBALS['app_strings']);
            $this->ss->assign('MOD', $GLOBALS['mod_strings']);
            $this->ss->assign('title',  $title);
            
            $this->ss->assign('enabled_modules', $json->encode ( $enabled ));
            $this->ss->assign('disabled_modules',$json->encode ( $disabled));
            $this->ss->assign('description',  translate("LBL_CONFIGURE_SHORTCUT_BAR"));
            $this->ss->assign('msg',  $msg);
            
            echo $this->ss->fetch('modules/Administration/templates/ShortcutBar.tpl');	
        }
    }
}

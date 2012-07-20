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
require_once('include/SubPanel/SubPanelDefinitions.php');
require_once('modules/MySettings/TabController.php');

class ViewConfiguretabs extends SugarView
{
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".$mod_strings['LBL_MODULE_NAME']."</a>",
    	   $mod_strings['LBL_CONFIG_TABS']
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
        global $mod_strings;
        global $app_list_strings;
        global $app_strings;
        
        require_once("modules/MySettings/TabController.php");
        $controller = new TabController();
        $tabs = $controller->get_tabs_system();
        
        $enabled= array();
        foreach ($tabs[0] as $key=>$value)
        {
            $enabled[] = array("module" => $key, 'label' => translate($key));
        }
        $disabled = array();
        foreach ($tabs[1] as $key=>$value)
        {
            $disabled[] = array("module" => $key, 'label' => translate($key));
        }
        
        $user_can_edit = $controller->get_users_can_edit();
        $this->ss->assign('APP', $GLOBALS['app_strings']);
        $this->ss->assign('MOD', $GLOBALS['mod_strings']);
        $this->ss->assign('user_can_edit',  $user_can_edit);
        $this->ss->assign('enabled_tabs', json_encode($enabled));
        $this->ss->assign('disabled_tabs', json_encode($disabled));
        $this->ss->assign('title',$this->getModuleTitle(false));
        
        //get list of all subpanels and panels to hide 
        $mod_list_strings_key_to_lower = array_change_key_case($app_list_strings['moduleList']);
        $panels_arr = SubPanelDefinitions::get_all_subpanels();
        $hidpanels_arr = SubPanelDefinitions::get_hidden_subpanels();
        
        if(!$hidpanels_arr || !is_array($hidpanels_arr)) $hidpanels_arr = array();
        
        //create array of subpanels to show, used to create Drag and Drop widget
        $enabled = array();
        foreach ($panels_arr as $key) {
            if(empty($key)) continue;
            $key = strtolower($key);
            $enabled[] =  array("module" => $key, "label" => $mod_list_strings_key_to_lower[$key]);
        }
        
        //now create array of subpanels to hide for use in Drag and Drop widget
        $disabled = array();
        foreach ($hidpanels_arr as $key) {
            if(empty($key)) continue;
            $key = strtolower($key);
            $disabled[] =  array("module" => $key, "label" => $mod_list_strings_key_to_lower[$key]);
        }
        
        $this->ss->assign('enabled_panels', json_encode($enabled));
        $this->ss->assign('disabled_panels', json_encode($disabled));
        
        echo $this->ss->fetch('modules/Administration/templates/ConfigureTabs.tpl');	
    }
}

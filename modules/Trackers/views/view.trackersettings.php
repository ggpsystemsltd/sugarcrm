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

class TrackersViewTrackersettings extends SugarView 
{	
    /**
	 * @see SugarView::_getModuleTab()
	 */
	protected function _getModuleTab()
    {
        return 'Administration';
    }
 	
 	/**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
    	   translate('LBL_TRACKER_SETTINGS','Administration'),
    	   );
    }
    
 	/** 
     * @see SugarView::display()
     */
 	public function display()
    {
        global $mod_strings, $app_strings;
        
        $admin = new Administration();
        $admin->retrieveSettings();
        
        require('modules/Trackers/config.php');
        
        ///////////////////////////////////////////////////////////////////////////////
        ////	HANDLE CHANGES
        if(isset($_POST['process'])) {
           if($_POST['process'] == 'true') {
               foreach($tracker_config as $entry) {
                  if(isset($entry['bean'])) {
                      //If checkbox is unchecked, we add the entry into the config table; otherwise delete it
                      if(empty($_POST[$entry['name']])) {
                        $admin->saveSetting('tracker', $entry['name'], 1);
                      }	else {
                        $db = DBManagerFactory::getInstance();
                        $db->query("DELETE FROM config WHERE category = 'tracker' and name = '" . $entry['name'] . "'");
                      }
                  }
               } //foreach
               
               //save the tracker prune interval
               if(!empty($_POST['tracker_prune_interval'])) {
                  $admin->saveSetting('tracker', 'prune_interval', $_POST['tracker_prune_interval']);
               }
               
               //save log slow queries and slow query interval
               $configurator = new Configurator();
               $configurator->saveConfig();
           } //if
           header('Location: index.php?module=Administration&action=index');
        }
        
        echo getClassicModuleTitle(
                "Administration", 
                array(
                    "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
                    translate('LBL_TRACKER_SETTINGS','Administration'),
                    ), 
                false
                );
        
        $trackerManager = TrackerManager::getInstance();
        $disabledMonitors = $trackerManager->getDisabledMonitors();
        $trackerEntries = array();
        foreach($tracker_config as $entry) {
           if(isset($entry['bean'])) {
              $disabled = !empty($disabledMonitors[$entry['name']]);
              $trackerEntries[$entry['name']] = array('label'=> $mod_strings['LBL_' . strtoupper($entry['name']) . '_DESC'], 'helpLabel'=> $mod_strings['LBL_' . strtoupper($entry['name']) . '_HELP'], 'disabled'=>$disabled);
           }
        }
        
        $configurator = new Configurator();
        $this->ss->assign('config', $configurator->config);
        
        $config_strings = return_module_language($GLOBALS['current_language'], 'Configurator');
        $mod_strings['LOG_SLOW_QUERIES'] = $config_strings['LOG_SLOW_QUERIES'];
        $mod_strings['SLOW_QUERY_TIME_MSEC'] = $config_strings['SLOW_QUERY_TIME_MSEC'];
        
        $this->ss->assign('mod', $mod_strings);
        $this->ss->assign('app', $app_strings);
        $this->ss->assign('trackerEntries', $trackerEntries);
        $this->ss->assign('tracker_prune_interval', !empty($admin->settings['tracker_prune_interval']) ? $admin->settings['tracker_prune_interval'] : 30);
        $this->ss->display('modules/Trackers/tpls/TrackerSettings.tpl');
    }
}
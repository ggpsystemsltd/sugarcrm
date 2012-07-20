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




require_once('include/tabConfig.php');

class GroupedTabStructure
{
	/** 
     * Prepare the tabs structure.
     * Uses 'Other' tab functionality.
     * If $modList is not specified, $modListHeader is used as default.
     * 
     * @param   array   optional list of modules considered valid
     * @param   array   optional array to temporarily union into the root of the tab structure 
    * @param bool  if  we set this param true, the other group tab will be returned no matter  $sugar_config['other_group_tab_displayed'] is true or false
     * @param bool  We use label value as return array key by default. But we can set this param true, that we can use the label name as return array key.
     * 
     * @return  array   the complete tab-group structure
	 */
    function get_tab_structure($modList = '', $patch = '', $ignoreSugarConfig=false, $labelAsKey=false)
    {
    	global $modListHeader, $app_strings, $app_list_strings, $modInvisListActivities;
        
        /* Use default if not provided */
        if(!$modList)
        {
        	$modList =& $modListHeader;
        }
        
        /* Apply patch, use a reference if we can */
        if($patch)
        {
        	$tabStructure = $GLOBALS['tabStructure'];
        	
            foreach($patch as $mainTab => $subModules)
            {
                $tabStructure[$mainTab]['modules'] = array_merge($tabStructure[$mainTab]['modules'], $subModules);
            }
        }
        else
        {
        	$tabStructure =& $GLOBALS['tabStructure'];
        }
        
        $retStruct = array();
        $mlhUsed = array();
		//the invisible list should be merged if activities is set to be hidden
        if(in_array('Activities', $modList)){
        	$modList = array_merge($modList,$modInvisListActivities);
		}
		
		//Add any iFrame tabs to the 'other' group.
		$moduleExtraMenu = array();
		if(!should_hide_iframes()) {
			$iFrame = new iFrame();
			$frames = $iFrame->lookup_frames('tab');	
	        foreach($frames as $key => $values){
	        	$moduleExtraMenu[$key] = $values;
	        }
		} else if(isset($modList['iFrames'])) {
		    unset($modList['iFrames']);
		}
				
        $modList = array_merge($modList,$moduleExtraMenu);
                
        /* Only return modules which exists in the modList */
        foreach($tabStructure as $mainTab => $subModules)
        {
            //Ensure even empty groups are returned
        	if($labelAsKey){
                $retStruct[$subModules['label']]['modules'] = array();
            }else{
                $retStruct[$app_strings[$subModules['label']]]['modules']= array();
            }

            foreach($subModules['modules'] as $key => $subModule)
            {
               /* Perform a case-insensitive in_array check
                * and mark whichever module matched as used.
                */ 
                foreach($modList as $module)
                {
                    if(is_string($module) && strcasecmp($subModule, $module) === 0)
                    {
                    	if($labelAsKey){
                    		$retStruct[$subModules['label']]['modules'][$module] = $app_list_strings['moduleList'][$module];
                    	}else{
                    		$retStruct[$app_strings[$subModules['label']]]['modules'][$module] = $app_list_strings['moduleList'][$module];
                    	}                        
                        $mlhUsed[$module] = true;
                        break;
                    }
                }
            }
			//remove the group tabs if it has no sub modules under it	        
            if($labelAsKey){
                    if (empty($retStruct[$subModules['label']]['modules'])){
                    unset($retStruct[$subModules['label']]);
                    }
                    }else{
                    if (empty($retStruct[$app_strings[$subModules['label']]]['modules'])){
                    unset($retStruct[$app_strings[$subModules['label']]]);
                    }
			}
        }
        
//        _pp($retStruct);
        return $retStruct;
    }
}

?>

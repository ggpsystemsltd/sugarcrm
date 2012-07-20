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



require_once('modules/Administration/Common.php');
require_once('modules/Administration/QuickRepairAndRebuild.php');
class DropDownHelper{
    var $modules = array();
    function getDropDownModules(){
        $dir = dir('modules');
        while($entry = $dir->read()){
            if(file_exists('modules/'. $entry . '/EditView.php')){
                $this->scanForDropDowns('modules/'. $entry . '/EditView.php', $entry);
            }
        }
        
    }
    
    function scanForDropDowns($filepath, $module){
        $contents = file_get_contents($filepath);
        $matches = array();
        preg_match_all('/app_list_strings\s*\[\s*[\'\"]([^\]]*)[\'\"]\s*]/', $contents, $matches);
        if(!empty($matches[1])){

            foreach($matches[1] as $match){
                $this->modules[$module][$match] = $match;
            }
   
        }       
        
    }
    
    /**
     * Allow for certain dropdowns to be filtered when edited by pre 5.0 studio (eg. Rename Tabs)
     * 
     * @param string name 
     * @param array dropdown
     * @return array Filtered dropdown list
     */
    function filterDropDown($name,$dropdown)
    {
        $results = array();
        switch ($name)
        {
            //When renaming tabs ensure that the modList dropdown is filtered properly.
            case 'moduleList':
                $hiddenModList = array_flip($GLOBALS['modInvisList']);
                $moduleList = array_flip($GLOBALS['moduleList']);

                foreach ($dropdown as $k => $v)
                {
                    if( isset($moduleList[$k]) ) // && !$hiddenModList[$k])
                        $results[$k] = $v;
                }
                break;
            default: //By default perform no filtering
                $results = $dropdown;
                
        }
    
        return $results;
    }
    
    
    /**
     * Takes in the request params from a save request and processes 
     * them for the save.
     *
     * @param REQUEST params  $params
     */
    function saveDropDown($params){
       $count = 0; 
       $dropdown = array();
       $dropdown_name = $params['dropdown_name'];
       $selected_lang = (!empty($params['dropdown_lang'])?$params['dropdown_lang']:$_SESSION['authenticated_user_language']);
       $my_list_strings = return_app_list_strings_language($selected_lang);
       while(isset($params['slot_' . $count])){
           
           $index = $params['slot_' . $count];
           $key = (isset($params['key_' . $index]))?to_html(remove_xss(from_html($params['key_' . $index]))): 'BLANK';
           $value = (isset($params['value_' . $index]))?to_html(remove_xss(from_html($params['value_' . $index]))): '';
           if($key == 'BLANK'){
               $key = '';
               
           }
         	$key = trim($key);
         	$value = trim($value);
           if(empty($params['delete_' . $index])){
            $dropdown[$key] = $value;
           }
           $count++;
       }
      
       if($selected_lang == $GLOBALS['current_language']){
       
           $GLOBALS['app_list_strings'][$dropdown_name] = $dropdown;
       }
        $contents = return_custom_app_list_strings_file_contents($selected_lang);
        
        
 
       //get rid of closing tags they are not needed and are just trouble
        $contents = str_replace("?>", '', $contents);
		if(empty($contents))$contents = "<?php";
        //add new drop down to the bottom
        if(!empty($params['use_push'])){
        	//this is for handling moduleList and such where nothing should be deleted or anything but they can be renamed
        	foreach($dropdown as $key=>$value){
        		//only if the value has changed or does not exist do we want to add it this way
        		if(!isset($my_list_strings[$dropdown_name][$key]) || strcmp($my_list_strings[$dropdown_name][$key], $value) != 0 ){
	        		//clear out the old value
	        		$pattern_match = '/\s*\$app_list_strings\s*\[\s*\''.$dropdown_name.'\'\s*\]\[\s*\''.$key.'\'\s*\]\s*=\s*[\'\"]{1}.*?[\'\"]{1};\s*/ism';
	        		$contents = preg_replace($pattern_match, "\n", $contents);
	        		//add the new ones
	        		$contents .= "\n\$app_list_strings['$dropdown_name']['$key']=" . var_export_helper($value) . ";";
        		}
        	}
        }else{
        	//clear out the old value
        	$pattern_match = '/\s*\$app_list_strings\s*\[\s*\''.$dropdown_name.'\'\s*\]\s*=\s*array\s*\([^\)]*\)\s*;\s*/ism';
        	$contents = preg_replace($pattern_match, "\n", $contents);
        	//add the new ones
        	$contents .= "\n\$app_list_strings['$dropdown_name']=" . var_export_helper($dropdown) . ";";
        }
       
        // Bug 40234 - If we have no contents, we don't write the file. Checking for "<?php" because above it's set to that if empty
        if($contents != "<?php"){
            save_custom_app_list_strings_contents($contents, $selected_lang);
            sugar_cache_reset();
        }
	// Bug38011
        $repairAndClear = new RepairAndClear();
        $repairAndClear->module_list = array(translate('LBL_ALL_MODULES'));
        $repairAndClear->show_output = false;
        $repairAndClear->clearJsLangFiles();
        // ~~~~~~~~
    }
    

    
}


?>

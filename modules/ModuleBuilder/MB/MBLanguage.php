<?php	
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

class MBLanguage{
		var $iTemplates = array();
		var $templates = array();
		function MBLanguage( $name, $path, $label, $key_name){
			$this->path = $path;
			$this->name = $name;
			$this->key_name = $key_name;
			$this->label = $label;
		}
		
		function load(){
			$this->generateModStrings();
			$this->generateAppStrings();
		}
		
		function loadStrings($file)
        {
            $module = strtoupper($this->name);
            $object_name = strtoupper($this->key_name);
            $_object_name = strtolower($this->name);		
			if(!file_exists($file))return;
			
			$d = dir($file);
			while($e = $d->read()){
				if(substr($e, 0, 1) != '.' && is_file($file . '/' . $e)){
					include($file.'/'. $e);
					if(empty($this->strings[$e])){
						
						$this->strings[$e] = $mod_strings;
					}else{
						$this->strings[$e] = array_merge($this->strings[$e], $mod_strings);
					}
					
					
				}
			}
		}
		
	    function loadAppListStrings($file){
            if(!file_exists($file))return;
			//we may not need this when loading in the app strings, but there is no harm
			//in setting it.
			$object_name = strtolower($this->key_name);

			$d = dir($file);
			while($e = $d->read()){
				if(substr($e, 0, 1) != '.' && is_file($file . '/' . $e)){
					include($file.'/'. $e);
					if(empty($this->appListStrings[$e])){
						
						$this->appListStrings[$e] = $app_list_strings;
					}else{
						$this->appListStrings[$e] = array_merge($this->appListStrings[$e], $app_list_strings);
					}
					
					
				}
			}
		}
		
		function generateModStrings(){
			$this->strings = array();
			$this->loadTemplates();
			
			foreach($this->iTemplates as $template=>$val){
				$file = MB_IMPLEMENTS . '/' . $template . '/language';
				$this->loadStrings($file);
			}
			foreach($this->templates as $template=>$val){
				$file = MB_TEMPLATES . '/' . $template . '/language';
				$this->loadStrings($file);
			}
			$this->loadStrings($this->path . '/language');
		}
		
		function getModStrings($language='en_us'){
			$language .= '.lang.php';
			if(!empty($this->strings[$language]) && $language != 'en_us.lang.php'){
			    return sugarArrayMerge($this->strings['en_us.lang.php'], $this->strings[$language]);
			}
			if(!empty($this->strings['en_us.lang.php']))return $this->strings['en_us.lang.php'];
			$empty = array();
			return $empty;
		}
		function getAppListStrings($language='en_us'){
			$language .= '.lang.php';
			if(!empty($this->appListStrings[$language]) && $language != 'en_us.lang.php'){
			    return sugarArrayMerge($this->appListStrings['en_us.lang.php'], $this->appListStrings[$language]);
			}
			if(!empty($this->appListStrings['en_us.lang.php']))return $this->appListStrings['en_us.lang.php'];
			$empty = array();
			return $empty;
		}
		
		function generateAppStrings($buildFromTemplate = true){
			$this->appListStrings = array('en_us.lang.php'=>array());
			//By default, generate app strings for the current language as well.
			$this->appListStrings[$GLOBALS [ 'current_language' ] . ".lang.php"] = array();
			$this->loadAppListStrings($this->path . '/../../language/application');
			
			if($buildFromTemplate){
				//go through the templates application strings and load anything that is needed
				foreach($this->iTemplates as $template=>$val){
					$file = MB_IMPLEMENTS . '/' . $template . '/language/application';
					$this->loadAppListStrings($file);
				}
				foreach($this->templates as $template=>$val){
					$file = MB_TEMPLATES . '/' . $template . '/language/application';
					$this->loadAppListStrings($file);
				}
			}
		}
		function save($key_name, $duplicate=false, $rename=false){
			$header = file_get_contents('modules/ModuleBuilder/MB/header.php');
			$save_path = $this->path . '/language';
			mkdir_recursive($save_path);
			foreach($this->strings as $lang=>$values){
				//Check if the module Label has changed.
				$renameLang = $rename || empty($values) || (isset($values['LBL_MODULE_NAME']) && $this->label != $values['LBL_MODULE_NAME']);
				$mod_strings = return_module_language(str_replace('.lang.php','',$lang), 'ModuleBuilder');
                $required = array(
                'LBL_LIST_FORM_TITLE'=>$this->label . " " . $mod_strings['LBL_LIST'],
                'LBL_MODULE_NAME'=>$this->label,
                'LBL_MODULE_TITLE'=>$this->label,
                'LBL_HOMEPAGE_TITLE'=>$mod_strings['LBL_HOMEPAGE_PREFIX'] . " " . $this->label,
                //FOR GENERIC MENU
                'LNK_NEW_RECORD'=>$mod_strings['LBL_CREATE'] ." ". $this->label,
                'LNK_LIST'=>$mod_strings['LBL_VIEW'] ." ". $this->label,
                'LNK_IMPORT_'.strtoupper($this->key_name)=>translate('LBL_IMPORT') ." ". $this->label,
                'LBL_SEARCH_FORM_TITLE'=>$mod_strings['LBL_SEARCH'] ." ". $this->label, 
                'LBL_HISTORY_SUBPANEL_TITLE'=>$mod_strings['LBL_HISTORY'],
                'LBL_ACTIVITIES_SUBPANEL_TITLE'=>$mod_strings['LBL_ACTIVITIES'],
                'LBL_'.strtoupper($this->key_name).'_SUBPANEL_TITLE'=>$this->label, 
                'LBL_NEW_FORM_TITLE' => $mod_strings['LBL_NEW'] ." ". $this->label,
                );
				foreach($required as $k=>$v){
					if(empty($values[$k]) || $renameLang){
						$values[$k] = $v;			
					}
				}
				write_array_to_file('mod_strings', $values, $save_path .'/'.$lang,'w', $header);
			}
			$app_save_path = $this->path . '/../../language/application';
			mkdir_recursive($app_save_path);
			$key_changed = ($this->key_name != $key_name);
			
			foreach($this->appListStrings as $lang=>$values){
				// Load previously created modules data
				$app_list_strings = array ();
				$neededFile = $app_save_path . '/'. $lang;
				if (file_exists($neededFile)) {
					include $neededFile;
				}

				
				if(!$duplicate){
					unset($values['moduleList'][$this->key_name]);
				}
				

				$values = sugarArrayMerge($values, $app_list_strings);
				$values['moduleList'][$key_name]= $this->label;
				
				
				$appFile = $header. "\n";
				require_once('include/utils/array_utils.php');
				$this->getGlobalAppListStringsForMB($values);
				foreach($values as $key=>$array){
					if($duplicate){
						//keep the original when duplicating
						$appFile .= override_value_to_string_recursive2 ('app_list_strings', $key, $array);
					}
					$okey = $key;
					if($key_changed)$key = str_replace($this->key_name, $key_name, $key);
					if($key_changed)$key = str_replace(strtolower($this->key_name), strtolower($key_name), $key);
					// if we aren't duplicating or the key has changed let's add it
					if(!$duplicate || $okey != $key){
						$appFile .= override_value_to_string_recursive2 ('app_list_strings', $key, $array);
					}
				}
			
				$fp = sugar_fopen($app_save_path . '/'. $lang, 'w');
				fwrite($fp, $appFile);
				fclose($fp);
			}
		}
		
		/**
		*  If there is no this dropdown list  in  custom\modulebuilder\packages\$package\language\application\$lang.lang.php , 
		*  we will include it from global app_list_string array into custom\modulebuilder\packages\$package\language\application\$lang.lang.php 
		*  when we create a dropdown filed  and the value is created in MB.(#20728 )
		**/
		function getGlobalAppListStringsForMB(&$values){
			//Ensure it comes from MB
			if(!empty($_REQUEST['view_package']) && !empty($_REQUEST['type']) && $_REQUEST['type'] == 'enum'  && !empty($_REQUEST['options'])){
				if(!isset($values[$_REQUEST['options']])){
					global $app_list_strings;
					if(!empty($app_list_strings[$_REQUEST['options']])){
						$values[$_REQUEST['options']]  = $app_list_strings[$_REQUEST['options']];						
					}
				}
			}
		}
		
		function build($path){
			if(file_exists($this->path.'/language/'))
			copy_recursive($this->path.'/language/', $path . '/language/');
		}
		
		function loadTemplates() {
			if(empty($this->templates)){
				if (file_exists("$this->path/config.php")) {
					include "$this->path/config.php";
					$this->templates = $config['templates'];
					$this->iTemplates = array();
				}
			}
		}
		
		/**
		 * Reset the templates and load the language files again.  This is called from 
		 * MBModule->save() once the config file has been written.
		 */
		function reload(){
			$this->templates = null;
			$this->load();
		}
		
	
}

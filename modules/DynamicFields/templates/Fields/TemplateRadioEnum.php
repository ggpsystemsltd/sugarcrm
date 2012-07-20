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

require_once('modules/DynamicFields/templates/Fields/TemplateEnum.php');
require_once('include/utils/array_utils.php');
class TemplateRadioEnum extends TemplateEnum{
	var $type = 'radioenum';
	
	function get_html_edit(){
		$this->prepare();
		$xtpl_var = strtoupper( $this->name);
		return "{RADIOOPTIONS_".$xtpl_var. "}";
	}
	
	function get_field_def(){
		$def = parent::get_field_def();
		$def['dbType'] = 'enum';
		$def['separator'] = '<br>';
		return $def;	
	}
	
	
	function get_xtpl_edit($add_blank = false){
		$name = $this->name;
		$value = '';
		if(isset($this->bean->$name)){
			$value = $this->bean->$name;
		}else{
			if(empty($this->bean->id)){
				$value= $this->default_value;	
			}	
		}
		if(!empty($this->help)){
		    $returnXTPL[$this->name . '_help'] = translate($this->help, $this->bean->module_dir);
		}
		
		global $app_list_strings;
		$returnXTPL = array();
		$returnXTPL[strtoupper($this->name)] = $value;

		
		$returnXTPL[strtoupper('RADIOOPTIONS_'.$this->name)] = $this->generateRadioButtons($value, false);
		return $returnXTPL;	
		
		
	}
	

	function generateRadioButtons($value = '', $add_blank =false){
		global $app_list_strings;
		$radiooptions = '';
		$keyvalues = $app_list_strings[$this->ext1];
		if($add_blank){
			$keyvalues = add_blank_option($keyvalues);
		}
		$help = (!empty($this->help))?"title='". translate($this->help, $this->bean->module_dir) . "'": '';
		foreach($keyvalues as $key=>$displayText){
			$selected = ($value == $key)?'checked': '';
			$radiooptions .= "<input type='radio' id='{$this->name}{$key}' name='$this->name'  $help value='$key' $selected><span onclick='document.getElementById(\"{$this->name}{$key}\").checked = true' style='cursor:default' onmousedown='return false;'>$displayText</span><br>\n";
		}
		return $radiooptions;
		
	}
	
	function get_xtpl_search(){
		$searchFor = '';
		if(!empty($_REQUEST[$this->name])){
			$searchFor = $_REQUEST[$this->name];
		}
		global $app_list_strings;
		$returnXTPL = array();
		$returnXTPL[strtoupper($this->name)] = $searchFor;
		$returnXTPL[strtoupper('RADIOOPTIONS_'.$this->name)] = $this->generateRadioButtons($searchFor, true);
		return $returnXTPL;	

	}
	
	function get_xtpl_detail(){
		$name = $this->name;
		if(isset($this->bean->$name)){
			global $app_list_strings;
			if(isset($app_list_strings[$this->ext1])){
				if(isset($app_list_strings[$this->ext1][$this->bean->$name])){
					return $app_list_strings[$this->ext1][$this->bean->$name];
				}
			}
		}else{
		    if(empty($this->bean->id)){
		        return $this->default_value;
		    }
		}
		return '';
	}
	
	function get_db_default(){
    return '';
}
	
}


?>

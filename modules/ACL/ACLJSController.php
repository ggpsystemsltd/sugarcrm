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



class ACLJSController{
	
	function ACLJSController($module,$form='', $is_owner=false){
		
		$this->module = $module;
		$this->is_owner = $is_owner;
		$this->form = $form;
	}
	
	function getJavascript(){
		global $action;
		if(!ACLController::moduleSupportsACL($this->module)){
			return '';
		}
		$script = "<SCRIPT>\n//BEGIN ACL JAVASCRIPT\n";

		if($action == 'DetailView'){
			if(!ACLController::checkAccess($this->module,'edit', $this->is_owner)){
			$script .= <<<EOQ
						if(typeof(document.DetailView) != 'undefined'){
							if(typeof(document.DetailView.elements['Edit']) != 'undefined'){
								document.DetailView.elements['Edit'].disabled = 'disabled';
							}
							if(typeof(document.DetailView.elements['Duplicate']) != 'undefined'){
								document.DetailView.elements['Duplicate'].disabled = 'disabled';
							}
						} 		
EOQ;
}
			if(!ACLController::checkAccess($this->module,'delete', $this->is_owner)){
			$script .= <<<EOQ
						if(typeof(document.DetailView) != 'undefined'){
							if(typeof(document.DetailView.elements['Delete']) != 'undefined'){
								document.DetailView.elements['Delete'].disabled = 'disabled';
							}
						} 		
EOQ;
}
		}
		if(file_exists('modules/'. $this->module . '/metadata/acldefs.php')){
			include('modules/'. $this->module . '/metadata/acldefs.php');
			
			foreach($acldefs[$this->module]['forms'] as $form_name=>$form){
			
				foreach($form as $field_name=>$field){
					
					if($field['app_action'] == $action){
						switch($form_name){
							case 'by_id':
								$script .= $this->getFieldByIdScript($field_name, $field);
								break;
							case 'by_name':
								$script .= $this->getFieldByNameScript($field_name, $field);
								break;
							default:
								$script .= $this->getFieldByFormScript($form_name, $field_name, $field);
								break;
						}
					}
					
				}
			}
		}
		$script .=  '</SCRIPT>';
		
		return $script;
		
		
	}
	
	function getHTMLValues($def){
		$return_array = array();
		switch($def['display_option']){
			case 'clear_link':
				$return_array['href']= "#";
				$return_array['className']= "nolink";
				break;
			default;
				$return_array[$def['display_option']] = $def['display_option'];
				break;
			
		}
		return $return_array;
		
	}
	
	function getFieldByIdScript($name, $def){
		$script = '';
		if(!ACLController::checkAccess($def['module'], $def['action_option'], true)){
		foreach($this->getHTMLValues($def) as $key=>$value){
			$script .=  "\nif(document.getElementById('$name'))document.getElementById('$name')." . $key . '="' .$value. '";'. "\n";
		}
		}
		return $script;
	
	}
	
	function getFieldByNameScript($name, $def){
		$script = '';
		if(!ACLController::checkAccess($def['module'], $def['action_option'], true)){
			
		foreach($this->getHTMLValues($def) as $key=>$value){
			$script .=  <<<EOQ
			var aclfields = document.getElementsByName('$name');
			for(var i in aclfields){
				aclfields[i].$key = '$value';
			}
EOQ;
		}
		}
		return $script;
	
	}
	
	function getFieldByFormScript($form, $name, $def){
		$script = '';


		if(!ACLController::checkAccess($def['module'], $def['action_option'], true)){
			foreach($this->getHTMLValues($def) as $key=>$value){
				$script .= "\nif(typeof(document.$form.$name.$key) != 'undefined')\n document.$form.$name.".$key . '="' .$value. '";';
			}
		}
		return $script;
	
	}
	
	
	
	
	
	
	
	
}



?>
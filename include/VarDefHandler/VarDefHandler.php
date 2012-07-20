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


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/workflow/workflow_utils.php');
/**
 * Vardef Handler Object
 * @api
 */
class VarDefHandler {

	var $meta_array_name;
	var $target_meta_array = false;
	var $start_none = false;
	var $extra_array = array();					//used to add custom items
	var $options_array = array();
	var $module_object;
	var $start_none_lbl = null;


    function VarDefHandler($module, $meta_array_name=null)
    {
        $this->meta_array_name = $meta_array_name;
		$this->module_object = $module;
		if($meta_array_name!=null){
			global $vardef_meta_array;
			include("include/VarDefHandler/vardef_meta_arrays.php");
			//BEGIN WFLOW PLUGINS
			get_plugin("workflow", "vardef_handler_hook", $this);
			//END WFLOW PLUGINS
			$this->target_meta_array = $vardef_meta_array[$meta_array_name];
		}

	//end function setup
	}

	function get_vardef_array($use_singular=false, $remove_dups = false, $use_field_name = false, $use_field_label = false){
		global $dictionary;
		global $current_language;
		global $app_strings;
		global $app_list_strings;

		$temp_module_strings = return_module_language($current_language, $this->module_object->module_dir);

		$base_array = $this->module_object->field_defs;
		//$base_array = $dictionary[$this->module_object->object_name]['fields'];

		///Inclue empty none set or not
		if($this->start_none==true){
			if(!empty($this->start_none_lbl)){
				$this->options_array[''] = $this->start_none_lbl;
			} else {
				$this->options_array[''] = $app_strings['LBL_NONE'];
			}
		}

	///used for special one off items added to filter array	 ex. would be href link for alert templates
		if(!empty($this->extra_array)){

			foreach($this->extra_array as $key => $value){
				$this->options_array[$key] = $value;
			}
		}
	/////////end special one off//////////////////////////////////


		foreach($base_array as $key => $value_array){
			$compare_results = $this->compare_type($value_array);

			if($compare_results == true){
				 $label_name = '';
                 if($value_array['type'] == 'link' && !$use_field_label){
                 	$this->module_object->load_relationship($value_array['name']);
                    if(!empty($app_list_strings['moduleList'][$this->module_object->$value_array['name']->getRelatedModuleName()])){
                    	$label_name = $app_list_strings['moduleList'][$this->module_object->$value_array['name']->getRelatedModuleName()];
                    }else{
                    	$label_name = $this->module_object->$value_array['name']->getRelatedModuleName();
                    }
                }
				else if(!empty($value_array['vname'])){
					$label_name = $value_array['vname'];
				} else {
					$label_name = $value_array['name'];
				}


				$label_name = get_label($label_name, $temp_module_strings);

				if(!empty($value_array['table'])){
					//Custom Field
					$column_table = $value_array['table'];
				} else {
					//Non-Custom Field
					$column_table = $this->module_object->table_name;
				}

                if($value_array['type'] == 'link'){
                	if($use_field_name){
                		$index = $value_array['name'];

                	}else{
                		$index = $this->module_object->$key->getRelatedModuleName();
                	}
                }else{
					$index = $key;
                }

				$value = trim($label_name, ':');
				if($remove_dups){
					if(!in_array($value, $this->options_array))
						$this->options_array[$index] = $value;
				}
				else
					$this->options_array[$index] = $value;

			//end if field is included
			}

		//end foreach
		}
		if($use_singular == true){
			return convert_module_to_singular($this->options_array);
		} else {
			return $this->options_array;
		}

	//end get_vardef_array
	}


	function compare_type($value_array){

		//Filter nothing?
		if(!is_array($this->target_meta_array)){
			return true;
		}

		////////Use the $target_meta_array;
		if(isset($this->target_meta_array['inc_override'])){
			foreach($this->target_meta_array['inc_override'] as $attribute => $value){

					foreach($value as $actual_value){
						if(isset($value_array[$attribute]) && $value_array[$attribute] == $actual_value) return true;
					}
					if(isset($value_array[$attribute]) && $value_array[$attribute] == $value) return true;

			}
		}
		if(isset($this->target_meta_array['ex_override'])){
			foreach($this->target_meta_array['ex_override'] as $attribute => $value){


					foreach($value as $actual_value){
					if(isset($value_array[$attribute]) && $value_array[$attribute] == $actual_value) return false;

						if(isset($value_array[$attribute]) && $value_array[$attribute] == $value) return false;
					}

			//end foreach inclusion array
			}
		}

		if(isset($this->target_meta_array['inclusion'])){
			foreach($this->target_meta_array['inclusion'] as $attribute => $value){

				if($attribute=="type"){
					foreach($value as $actual_value){
					if(isset($value_array[$attribute]) && $value_array[$attribute] != $actual_value) return false;
					}
				} else {
					if(isset($value_array[$attribute]) && $value_array[$attribute] != $value) return false;
				}
			//end foreach inclusion array
			}
		}

		if(isset($this->target_meta_array['exclusion'])){
			foreach($this->target_meta_array['exclusion'] as $attribute => $value){

				foreach($value as $actual_value){
				    if ( $attribute == 'reportable' ) {
				        if ( $actual_value == 'true' ) $actual_value = 1;
				        if ( $actual_value == 'false' ) $actual_value = 0;
				    }
					if(isset($value_array[$attribute]) && $value_array[$attribute] == $actual_value) return false;
				}

			//end foreach inclusion array
			}
		}


		return true;

	//end function compare_type
	}

//end class VarDefHandler
}


?>

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


include_once('include/workflow/workflow_utils.php');
include_once('include/workflow/expression_utils.php');

	function get_field_output(& $temp_module, $selector_array, $meta_array, $actions=false){

		global $current_language;
		global $app_list_strings;
		global $app_strings;
		global $mod_strings;
		$enum_multi= $meta_array['enum_multi'];

		$temp_module_strings = return_module_language($current_language, $temp_module->module_dir);
		$all_fields_array = $temp_module->getFieldDefinitions();

			$target_field_array = $all_fields_array[$selector_array['field']];
			if(!empty($target_field_array['vname'])){
				$target_vname = $target_field_array['vname'];
			} else {
				$target_vname ="";
			}
			$label_name = get_label($target_vname, $temp_module_strings);
			$field_type = get_field_type($target_field_array);
			$field_name = $target_field_array['name'];
//////Determine if this is called from an existing record or new and if it is enum multi
			if($selector_array['target_field'] == $field_name){
				if((($selector_array['operator']=="in" || $selector_array['operator']=="not_in") && $selector_array['target_field'] == $field_name)
				   ||(isset($target_field_array['isMultiSelect']) && $target_field_array['isMultiSelect'] == true)){
				   	$selected_value = unencodeMultienum( $selector_array['value']);
					$selected_operator = $selector_array['operator'];
					$selected_time = $selector_array['time'];
				}else {
					$selected_value = $selector_array['value'];
					$selected_operator = $selector_array['operator'];
					$selected_time = $selector_array['time'];
				}
					//Handle Advanced Actions Type
				if($actions==true){
					$selected_ext1 = $selector_array['ext1'];
					$selected_ext2 = $selector_array['ext2'];
					$selected_ext3 = $selector_array['ext3'];
				}
			} else {
				$selected_value = "";
				$selected_operator = "";
				$selected_time = "";

				//Handle Advanced Actions Type
				if($actions==true){
					$selected_ext1 = "";
					$selected_ext2 = "";
					$selected_ext3 = "";
				}

			}

///////////////////////////////////////////////////////////

//Get output array and return it
//////////////////////////////////////////////////////////

		$output_array = array();

		if($actions==true){
			$output_array['ext1']['display'] = "";
			$output_array['ext2']['display'] = "";
			$output_array['ext3']['display'] = "";
		}

		if(!empty($field_type)){

			/*
			One off check to see if this is duration_hours or duration_minutes
			These two fields really should be enum, but they are chars.  This is a problem,
			since the UI for calls is really enum in 15 minute increments
			*/
			if($selector_array['target_field']=="duration_minutes"){

				$target_field_array['options'] = "duration_intervals";
				$field_type = "enum";
			//end if target_field is duration_minutes or duration_hours
			}


			//Checking reminder time in meetings and calls
			if($selector_array['target_field']=="reminder_time"){

				$target_field_array['options'] = "reminder_time_options";
				$field_type = "enum";
			//end if target_field is reminder_time
			}



			if($field_type=="enum" || $field_type=="multienum" || $field_type=="radioenum"){
				$output_array['real_type'] = $field_type;
				//check for multi_select and that this is the same dropdown as previous;

				//Set the value select
				$sorted_fields = array();
				if(!empty($target_field_array['function'])){ 
					$function = $target_field_array['function'];
					if(is_array($function) && isset($function['name'])){
	       				$function = $target_field_array['function']['name'];
	       			}else{
	       				$function = $target_field_array['function'];
	       			}
	       	 		if(!empty($target_field_array['function']['returns']) && $target_field_array['function']['returns'] == 'html'){
						if(!empty($target_field_array['function']['include'])){
								require_once($target_field_array['function']['include']);
						}
					}	
					$sorted_fields = $function();					
				}else{	
					$sorted_fields = $app_list_strings[$target_field_array['options']];
				}
				if (isset($sorted_fields)) {
					asort($sorted_fields);
				}
				$column_select = get_select_options_with_id($sorted_fields, $selected_value);
				//if(!empty($target_field_array['isMultiSelect']) && $target_field_array['isMultiSelect'] == true){
				//	$selected_operator = "in";
				//	$enum_multi = true;
				//}
				$isMultiSelect = false;
				$value_select = "<select id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."_field_value' tabindex='2'>".$column_select."</select>";
				if($enum_multi===true){
					$value_select .= "&nbsp;<select id='".$meta_array['parent_type']."__field_value_multi' tabindex='1' name='".$meta_array['parent_type']."__field_value_multi[]' multiple size='5'>".$column_select."</select>";
				}else if(!empty($target_field_array['isMultiSelect']) && $target_field_array['isMultiSelect'] == true){
					//$value_select = "<select id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."_field_value[]' tabindex='2' multiple size='5'>".$column_select."</select>";
					$value_select = "&nbsp;<select id='".$meta_array['parent_type']."__field_value_multi' tabindex='1' name='".$meta_array['parent_type']."__field_value_multi[]' multiple size='5'>".$column_select."</select>";
					$isMultiSelect = true;
				}
				$output_array['value_select']['display'] = $value_select;

				//Set the Operator variables
				if($enum_multi===true){
					$operator_select_javascript = "onchange=\"toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__field_value', '".$meta_array['parent_type']."__field_value_multi', 'Equals');\"";
					$javascript_start = "toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__field_value', '".$meta_array['parent_type']."__field_value_multi', 'Equals'); \n";
				} else {
					$operator_select_javascript = "";
					$javascript_start ="";
				}
				if($enum_multi===true){
					$operator = get_select_options_with_id($app_list_strings['mselect_type_dom'],$selected_operator);
				}else if($isMultiSelect){
					$operator = get_select_options_with_id($app_list_strings['mselect_multi_type_dom'],$selected_operator);
				}
				else {
					$operator = get_select_options_with_id($app_list_strings['cselect_type_dom'],$selected_operator);
				}

					$output_array['operator']['display'] = $operator;
					$output_array['operator']['jscript'] = $operator_select_javascript;
					$output_array['operator']['jscriptstart'] = $javascript_start;
				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";

				if($actions == true){

					$ext1_select = get_select_options_with_id($app_list_strings['wflow_adv_enum_type_dom'], $selected_ext1);
					$ext1_select =  "<select id='".$meta_array['parent_type']."__ext1' id='".$meta_array['parent_type']."__ext1' tabindex='2'>".$ext1_select."</select>";
					$output_array['adv_value']['display'] = $ext1_select;

					$value_select = "&nbsp;<input id='".$meta_array['parent_type']."__adv_value' name='".$meta_array['parent_type']."__adv_value' tabindex='1' size='2' maxlength='2' type='text' value='".$selected_value."'>&nbsp;step(s)";
					$adv_select =  $value_select;
					$output_array['adv_value']['display'] .= $adv_select;

					$output_array['adv_type']['display'] = "enum_step";


					//exception handler for some advanced options not valid if this is a new record
					if(!empty($meta_array['action_type'])){
						if($meta_array['action_type']=="new" || $meta_array['action_type']=="new_rel"){
							$output_array['set_type']['disabled'] = "Disabled";
						}
					}





				}

			//end type enum
			}
			if(
			$field_type =="char" ||
			$field_type =="varchar" ||
            $field_type =="encrypt" ||
			$field_type =="name" ||
			$field_type =="phone" ||
			$field_type =="email" || 
			$field_type =="url"
			){
				$output_array['real_type'] = $field_type;

				if(!empty($target_field_array['len'])){
					$max_length = $target_field_array['len'];
				} else {
					$max_length = "50";
				}




				$value_select = "<input id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."__field_value' tabindex='1' size='25' maxlength='".$max_length."' type='text' value='".$selected_value."'>";
				$output_array['value_select']['display'] = $value_select;
				$operator = get_select_options_with_id($app_list_strings['cselect_type_dom'],$selected_operator);
				$output_array['operator']['display'] = $operator;


				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";
				$output_array['operator']['jscript'] = "";
				$output_array['operator']['jscriptstart'] = "";
				$output_array['set_type']['disabled'] = "Disabled";


				if($actions == true){
					$output_array['adv_type']['display'] = "";
					$output_array['adv_value']['display'] = "";
				}
			//end if type char, varchar, or float
			}

			if($field_type=="text"){

				$output_array['real_type'] = $field_type;

				$value_select = "<textarea id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."__field_value' tabindex='1' cols=\"40\" rows=\"3\">".$selected_value."</textarea>";

				//$value_select = "<input id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."__field_value' tabindex='1' size='25' maxlength='".$max_length."' type='text' value='".$selected_value."'>";
				$output_array['value_select']['display'] = $value_select;
				$operator = get_select_options_with_id($app_list_strings['cselect_type_dom'],$selected_operator);
				$output_array['operator']['display'] = $operator;

				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";
				$output_array['operator']['jscript'] = "";
				$output_array['operator']['jscriptstart'] = "";
				$output_array['set_type']['disabled'] = "Disabled";

				if($actions == true){
					$output_array['adv_type']['display'] = "";
					$output_array['adv_value']['display'] = "";
				}

			//end field_type == text
			}


			if($field_type=="datetimecombo" ||
			$field_type=="datetime" ||
			$field_type=="date" ||
			$field_type=="time"
			){
				//coming here via actions or triggers?
				if($actions == true){

					$column_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_value);
					$value_select =  "<select id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."_field_value' tabindex='2'>".$column_select."</select>";

					//current date or existing

					//check if this is action new or new_rel and if so, remove the Existing Value optino
					//since it is not applicable
						$temp_dom = $app_list_strings['wflow_action_datetime_type_dom'];

					if(	$meta_array['action_type']=="new" ||
						$meta_array['action_type']=="new_rel"
					){
						unset($temp_dom['Existing Value']);
					}


					$ext1_select = get_select_options_with_id($temp_dom, $selected_ext1);
					$ext1_select =  " from <select id='".$meta_array['parent_type']."__ext1' id='".$meta_array['parent_type']."__ext1' tabindex='2'>".$ext1_select."</select>";
					$value_select .= $ext1_select;
					$output_array['value_select']['display'] = $value_select;
					$output_array['set_type']['disabled'] = "Disabled";
					$output_array['adv_type']['display'] = "datetime";
					$output_array['adv_value']['display'] = "";
					$output_array['real_type'] = $field_type;
				} else {
					$operator = get_select_options_with_id($app_list_strings['dtselect_type_dom'],$selected_operator);
					$output_array['operator']['display'] = $operator;

					$operator_select_javascript = "onchange=\"toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__time_past', '".$meta_array['parent_type']."__time_future', 'More Than');\"";
					$javascript_start = "toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__time_past', '".$meta_array['parent_type']."__time_future', 'More Than'); \n";


					$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
					$output_array['time_select']['display'] =  "<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>&nbsp;";
					$output_array['time_select']['display'] .= "<span id='".$meta_array['parent_type']."__time_past'>".$mod_strings['LBL_TIME_PAST']."</span>";
					$output_array['time_select']['display'] .= "<span id='".$meta_array['parent_type']."__time_future'>".$mod_strings['LBL_TIME_FUTURE']."</span>";
					$output_array['operator']['jscript'] = $operator_select_javascript;
					$output_array['operator']['jscriptstart'] = $javascript_start;
					$output_array['set_type']['disabled'] = "Disabled";
					$output_array['value_select']['display'] = "";
					$output_array['real_type'] = $field_type;
				}

			//end if type datetime
			}

			if($field_type=="assigned_user_name" || $field_name == 'assigned_user_id'
			){
				//Real type is just a surface variable used by javascript to determine dual type actions
				//in the javascript
				$output_array['real_type'] = "enum";



				//check for multi_select and that this is the same dropdown as previous;

				//Set the value select
				$user_array = get_user_array(TRUE, "Active", "", true, null, ' AND is_group=0 ');
				
				//$column_select = get_select_options_with_id($app_list_strings[$target_field_array['options']], $selected_value);
				$column_select = get_select_options_with_id($user_array, $selected_value);
				$value_select =  "<select id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."_field_value' tabindex='2'>".$column_select."</select>";
				if($enum_multi===true){
					$value_select .= "&nbsp;<select id='".$meta_array['parent_type']."__field_value_multi' tabindex='1' name='".$meta_array['parent_type']."__field_value_multi[]' multiple size='5'>".$column_select."</select>";
				}
					$output_array['value_select']['display'] = $value_select;

				//Set the Operator variables
				if($enum_multi===true){
					$operator_select_javascript = "onchange=\"toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__field_value', '".$meta_array['parent_type']."__field_value_multi', 'Equals');\"";
					$javascript_start = "toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__field_value', '".$meta_array['parent_type']."__field_value_multi', 'Equals'); \n";
				} else {
					$operator_select_javascript = "";
					$javascript_start ="";
				}


				if($enum_multi===true){
					$operator = get_select_options_with_id($app_list_strings['mselect_type_dom'],$selected_operator);
				} else {
					$operator = get_select_options_with_id($app_list_strings['cselect_type_dom'],$selected_operator);
				}
					$output_array['operator']['display'] = $operator;
					$output_array['operator']['jscript'] = $operator_select_javascript;
					$output_array['operator']['jscriptstart'] = $javascript_start;

				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";


			///If we are coming here for actions

				if($actions == true){

					////This below is an exception handler flow statement
					//if this is time based, then don't include the logged in user, since it doesn't really apply
					if(!empty($meta_array['workflow_type']) && $meta_array['workflow_type']=="Time"){

						$adv_user_array = $app_list_strings['wflow_adv_user_type_dom'];
						unset($adv_user_array['current_user']);
					//end if this is a time based object
					} else {
						$adv_user_array = $app_list_strings['wflow_adv_user_type_dom'];
					}



					$adv_select = get_select_options_with_id($adv_user_array, $selected_value);

					$adv_select =  "<select id='".$meta_array['parent_type']."__adv_value' id='".$meta_array['parent_type']."__adv_value' tabindex='2'>".$adv_select."</select>";
					$output_array['adv_value']['display'] = $adv_select;

					$ext1_select = get_select_options_with_id($app_list_strings['wflow_relate_type_dom'], $selected_ext1);
					$ext1_select =  "&nbsp;<select id='".$meta_array['parent_type']."__ext1' id='".$meta_array['parent_type']."__ext1' tabindex='2'>".$ext1_select."</select>";
					$output_array['adv_value']['display'] .= $ext1_select;
					$output_array['adv_type']['display'] = "exist_user";
				}

			//end if type assigned_user_id
			}

			if($field_type=="team_list"
			){
				//Real type is just a surface variable used by javascript to determine dual type actions
				//in the javascript
				$output_array['real_type'] = "enum";

				//check for multi_select and that this is the same dropdown as previous;

				//Set the value select
				$column_select = get_select_options_with_id(get_team_array(), $selected_value);

				$value_select =  "<select id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."_field_value' tabindex='2'>".$column_select."</select>";
				if($enum_multi===true){
					$value_select .= "&nbsp;<select id='".$meta_array['parent_type']."__field_value_multi' tabindex='1' name='".$meta_array['parent_type']."__field_value_multi[]' multiple size='5'>".$column_select."</select>";
				}
					$output_array['value_select']['display'] = $value_select;

				//Set the Operator variables
				if($enum_multi===true){
					$operator_select_javascript = "onchange=\"toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__field_value', '".$meta_array['parent_type']."__field_value_multi', 'Equals');\"";
					$javascript_start = "toggleFieldDisplay('".$meta_array['parent_type']."__operator', '".$meta_array['parent_type']."__field_value', '".$meta_array['parent_type']."__field_value_multi', 'Equals'); \n";
				} else {
					$operator_select_javascript = "";
					$javascript_start ="";
				}


				if($enum_multi===true){
					$operator = get_select_options_with_id($app_list_strings['mselect_type_dom'],$selected_operator);
				} else {
					$operator = get_select_options_with_id($app_list_strings['cselect_type_dom'],$selected_operator);
				}
					$output_array['operator']['display'] = $operator;
					$output_array['operator']['jscript'] = $operator_select_javascript;
					$output_array['operator']['jscriptstart'] = $javascript_start;

				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";

				//if we are coming here to get actions

				if($actions == true){


					//exception handler.  if the workflow type is time, then don't allow logged in user's team to be picked
					if(!empty($meta_array['workflow_type']) && $meta_array['workflow_type']=="Time"){

						$adv_team_array = $app_list_strings['wflow_adv_team_type_dom'];
						unset($adv_team_array['current_team']);
					//end if this is a time based object
					} else {
						$adv_team_array = $app_list_strings['wflow_adv_team_type_dom'];
					}

					$adv_select = get_select_options_with_id($adv_team_array, $selected_value);
					$adv_select =  "<select id='".$meta_array['parent_type']."__adv_value' id='".$meta_array['parent_type']."__adv_value' tabindex='2'>".$adv_select."</select>";
					$output_array['adv_value']['display'] = $adv_select;

					$output_array['adv_type']['display'] = "exist_team";
				}


			//end if type team_list
			}


			if($field_type=="bool"
			){
				//Real type is just a surface variable used by javascript to determine dual type actions
				//in the javascript
				$output_array['real_type'] = $field_type;

				$column_select = get_select_options_with_id($app_list_strings['bselect_type_dom'], $selected_value);
				$value_select =  "<select id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."__field_value' tabindex='2'>".$column_select."</select>";

				$output_array['value_select']['display'] = $value_select;

				$operator = get_select_options_with_id($app_list_strings['bopselect_type_dom'],$selected_operator);

				$output_array['operator']['display'] = $operator;

				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";
				$output_array['operator']['jscript'] = "";
				$output_array['operator']['jscriptstart'] = "";
				$output_array['set_type']['disabled'] = "Disabled";

				if($actions == true){
					$output_array['adv_type']['display'] = "";
					$output_array['adv_value']['display'] = "";
				}
			//end if type datetime
			}

			if(
			$field_type=="float" ||
			$field_type=="int" ||
			$field_type=="num" ||
			$field_type=="decimal" ||
			$field_type=="currency"
			){
				//Real type is just a surface variable used by javascript to determine dual type actions
				//in the javascript
				$output_array['real_type'] = $field_type;

				if($field_type == "int"){
					$length = 11;
				} else {
					$length = 25;
				}

				$value_select = "<input id='".$meta_array['parent_type']."__field_value' name='".$meta_array['parent_type']."__field_value' tabindex='1' size='".$length."' maxlength='".$length."' type='text' value='".$selected_value."'>";

					$output_array['value_select']['display'] = $value_select;

				$operator = get_select_options_with_id($app_list_strings['dselect_type_dom'],$selected_operator);

					$output_array['operator']['display'] = $operator;


				$time_select = get_select_options_with_id($app_list_strings['tselect_type_dom'], $selected_time);
				$output_array['time_select']['display'] =  $mod_strings['LBL_TIME_INT']."&nbsp;<select id='time_int' name='time_int' tabindex='2'>".$time_select."</select>";
				$output_array['operator']['jscript'] = "";
				$output_array['operator']['jscriptstart'] = "";

			///If we are coming here for actions

				if($actions == true){

					$ext1_select = get_select_options_with_id($app_list_strings['query_calc_oper_dom'], $selected_ext1);
					$ext1_select =  "existing value <select id='".$meta_array['parent_type']."__ext1' id='".$meta_array['parent_type']."__ext1' tabindex='2'>".$ext1_select."</select>";
					$output_array['adv_value']['display'] = $ext1_select;

					$value_select = "&nbsp;&nbsp;<input id='".$meta_array['parent_type']."__adv_value' name='".$meta_array['parent_type']."__adv_value' tabindex='1' size='5' maxlength='5' type='text' value='".$selected_value."'>";
					$adv_select =  $value_select;
					$output_array['adv_value']['display'] .= $adv_select;

					$output_array['adv_type']['display'] = "value_calc";


					//exception handler for some advanced options not valid if this is a new record
					if(!empty($meta_array['action_type'])){
						if($meta_array['action_type']=="new" || $meta_array['action_type']=="new_rel"){
							$output_array['set_type']['disabled'] = "Disabled";
						}
					}





				//end if actions is true
				}



			//end if type float
			}

		//end if type is set
		}

		$output_array['type'] = $field_type;
		$output_array['name'] = $label_name;

		return $output_array;

	//end function get_output_array
	}


function get_username_by_id($userid)
{
    if(empty($userid)) return false;
    $user = SugarModule::get('Users')->loadBean();
    $user->retrieve($userid);
    if($userid != $user->id) {
        return false;
    }
	if(showFullName()){
        return $user->full_name;
	} else {
        return $user->user_name;
    }
}

function get_display_text($temp_module, $field, $field_value, $adv_type=null, $ext1=null, $context=null){
	global $app_list_strings, $current_user;

    if($temp_module->field_defs[$field]['type']=="relate"){
		//echo $field;
        //bug 23502, assigned user should be displayed as username here. But I don't know if created user, modified user or even other module should display names instead of ids.
        if($temp_module->field_defs[$field]['name'] == 'assigned_user_id' && !empty($field_value) && !empty($context['for_action_display'])) {
            if($adv_type != 'exist_user') {
                return get_username_by_id($field_value);
	        } else {
                $target_type = "assigned_user_name";
            }
        } else {
    		if(!empty($temp_module->field_defs[$field]['dbType']))
    			$target_type = $temp_module->field_defs[$field]['dbType'];
    		else
    			return $field_value;
        }
	}
    else if (!empty($temp_module->field_defs[$field]['calculated']) && !empty($context['for_action_display']))
    {
        //Cannot set the value of calculated fields.
        return false;
    }
    else {
		$target_type = $temp_module->field_defs[$field]['type'];
	}


	//Land of the "one offs"
	//This is for meetings and calls, the reminder time
	if($temp_module->field_defs[$field]['name']=="reminder_time"){
		$target_type = "enum";
		$temp_module->field_defs[$field]['options'] = "reminder_time_options";
	}

	if($target_type == "assigned_user_name"){

		if($adv_type==null){
			$user_array = get_user_array(TRUE, "Active", $field_value, true);
			if (!isset($user_array[$field_value])) {
				return false;
			}


			return $user_array[$field_value];
		}
		if($adv_type=="exist_user"){

			if($ext1=="Manager"){
				return "Manager of the ".$app_list_strings['wflow_adv_user_type_dom'][$field_value];
			} else {
				return $app_list_strings['wflow_adv_user_type_dom'][$field_value];
			}
		}
	}


	if($adv_type == "datetime"){
		if(empty($field_value)){
			$field_value = 0;
		}
		return $app_list_strings['tselect_type_dom'][$field_value]." from ".$app_list_strings['wflow_action_datetime_type_dom'][$ext1];

	}

	if($adv_type == "exist_team"){

		return $app_list_strings['wflow_adv_team_type_dom'][$field_value];

	}

	if($adv_type == "value_calc"){

		return "existing value".$app_list_strings['query_calc_oper_dom'][$ext1]." by ".$field_value;

	}

	if($adv_type == "enum_step"){

		return $app_list_strings['wflow_adv_enum_type_dom'][$ext1]." ".$field_value." step(s)";

	}

//Used primarily for alert templates

    require_once('include/SugarFields/SugarFieldHandler.php');
    $sugarField = SugarFieldHandler::getSugarField($target_type);
    $GLOBALS['log']->debug("Field: $field is of type $target_type, before: $field_value");
    $field_value = $sugarField->getEmailTemplateValue($field_value,$temp_module->field_defs[$field], $context);
    $GLOBALS['log']->debug("after: $field_value");

	return $field_value;

//end get_display_text
}




//////////////////////Processing actions

function process_advanced_actions(& $focus, $field, $meta_array, & $rel_this){


	////////////Later expand to be able to also extract from the rel_this as the choice of returning dynamic values

	global $current_user;
	if($meta_array['adv_type']=='exist_user'){

		if($meta_array['value'] == 'current_user'){

			if(!empty($current_user)){
				if($meta_array['ext1']=="Self"){
					//kbrill bug #14923
					return $current_user->id;
				}
				if($meta_array['ext1']=="Manager"){
					//kbrill bug #14923
					return get_manager_info($current_user->id);
				}
			} else {
				return 1;
			}
		//if value is current_user
		}

		if($meta_array['ext1']=="Self"){
			return $focus->$meta_array['value'];
		}
		if($meta_array['ext1']=="Manager"){
			return get_manager_info($focus->$meta_array['value']);
		}

	}

	if($meta_array['adv_type']=='exist_team'){
		if($meta_array['value'] == 'current_team'){

			if(!empty($current_user)){
				return $current_user->default_team;
			} else {
				return 1;
			}
		//if value is current_team
		}
		return $focus->$meta_array['value'];
	}

	if($meta_array['adv_type']=='value_calc'){

		$jang = get_expression($meta_array['ext1'], $rel_this->$field, $meta_array['value']);
		echo $jang;
		return $jang;
	}

	if($meta_array['adv_type']=='enum_step'){
		global $app_list_strings;
		$options_name = $rel_this->field_defs[$field]['options'];

		$target_array = $app_list_strings[$options_name];

		find_start_position($target_array, $rel_this->$field);
		if($meta_array['ext1']=='retreat'){
			for($i = 0; $i < $meta_array['value']; $i++){
				prev($target_array);
			}
		}
		if($meta_array['ext1']=='advance'){
			for($i = 0; $i < $meta_array['value']; $i++){
				next($target_array);
			}
		}
			$new_option = key($target_array);

			if(!empty($new_option) && $new_option !=""){
				return $new_option;
			} else {
				return $rel_this->$field;
			}

	}

//end function process_advanced_actions
}

function find_start_position(& $target_array, $target_key){
	$cycle_array = $target_array;
	foreach($cycle_array as $key => $value){
		if(key($target_array) == $target_key){
			return;
		} else {
			next($target_array);
		}
	}
}


function check_special_fields($field_name, $source_object, $use_past_array=false, $context = null){
	global $locale;

	// FIXME: Special cases for known non-db but allowed fields
	if($field_name == 'full_name'){
		if($use_past_array==false){
			//use the future value
			return $locale->getLocaleFormattedName($source_object->first_name, $source_object->last_name);
		} else {
			//use the past value
			return $locale->getLocaleFormattedName($source_object->fetched_row['first_name'], $source_object->fetched_row['last_name']);
		}
	} elseif($field_name == 'modified_by_name' && $use_past_array) {
        return $source_object->old_modified_by_name;
    } elseif($field_name == 'assigned_user_name' && $use_past_array) {
	    // We have to load the user here since fetched_row only has the ID, not the name
        return get_username_by_id($source_object->fetched_row['assigned_user_id']);
    }
    elseif ($field_name == 'team_name')
    {
        require_once('modules/Teams/TeamSetManager.php');
        if($use_past_array==false)
        {
        	if(empty($source_object->team_set_id)){
        		if(!empty($source_object->teams)){
        			$source_object->teams->save();
        		}
        	}
            $team_set_id = $source_object->team_set_id;
            $team_id = $source_object->team_id;
        }
        else
        {
            $team_set_id = $source_object->fetched_row['team_set_id'];
            $team_id = $source_object->fetched_row['team_id'];
        }
        return TeamSetManager::getCommaDelimitedTeams($team_set_id, $team_id, true);
    }
    else {
		/*One off exception for if we are getting future date_created value.
		Use the fetched row for it. - jgreen
		*/
		if($use_past_array==false && $field_name!="date_entered"){
			//use the future value

				 return get_display_text($source_object, $field_name, $source_object->$field_name, null, null, $context);
		} else {
			//use the past value
				return get_display_text($source_object, $field_name, $source_object->fetched_row[$field_name], null, null, $context);
		}
	}

	//In future, check for maybe currency type


//end function check_special_fields
}

function execute_special_logic($field_name, &$source_object){
	if(file_exists('modules/'.$source_object->module_dir.'/SaveOverload.php'))
	{
		require_once('modules/'.$source_object->module_dir.'/SaveOverload.php');
		perform_save($source_object);
	}
}

?>

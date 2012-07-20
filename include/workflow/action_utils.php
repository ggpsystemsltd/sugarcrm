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
include_once('include/workflow/field_utils.php');
include_once('include/utils/expression_utils.php');

function process_workflow_actions($focus, $action_array){


	if($action_array['action_type']=="update"){
		process_action_update($focus, $action_array);
	}
	if($action_array['action_type']=="update_rel"){
		process_action_update_rel($focus, $action_array);
	}
	if($action_array['action_type']=="new"){
		process_action_new($focus, $action_array);
	}
	if($action_array['action_type']=="new_rel"){
		process_action_new_rel($focus, $action_array);
	}


//end function process_workflow_actions
}

function process_action_update($focus, $action_array){

	foreach($action_array['basic'] as $field => $new_value){
		if(empty($action_array['basic_ext'][$field])){
			//if we have a relate field, make sure the related record still exists.
			if ($focus->field_defs[$field]['type'] == "relate")
			{
				$relBean = get_module_info($focus->field_defs[$field]['module']);
				$relBean->retrieve($new_value);
                if (empty($relBean->id) && (!empty($focus->required_fields[$field]) && $focus->required_fields[$field] == true))
                {
					$GLOBALS['log']->info("workflow attempting to set relate field $field to invalid id: $new_value");
					continue;
				}
			}
            if (!empty($focus->field_defs[$field]['calculated']))
            {
                $GLOBALS['log']->info("workflow attempting to update calculated field $field.");
                continue;
            }
            if (in_array($focus->field_defs[$field]['type'], array('double', 'decimal','currency', 'float')))
            {
                $new_value = (float)unformat_number($new_value);
            }
			$focus->$field = convert_bool($new_value, $focus->field_defs[$field]['type']);
			execute_special_logic($field, $focus);
		}
		//otherwise rely on the basic_ext to handle the action for this field
        if($field == "assigned_user_id" && (empty($_REQUEST['massupdate']) || $_REQUEST['massupdate']==='false')) {
            $focus->notify_inworkflow = true;
        }

        if($field == "email1") $focus->email1_set_in_workflow = $focus->email1;
        if($field == "email2") $focus->email2_set_in_workflow = $focus->email2;
	}

	foreach($action_array['basic_ext'] as $field => $new_value){
        if (!empty($focus->field_defs[$field]['calculated']))
        {
            $GLOBALS['log']->info("workflow attempting to update calculated field $field.");
            continue;
        }
		//Only here if there is a datetime.
		if($new_value=='Triggered Date'){
			$focus->$field = get_expiry_date(get_field_type($focus->field_defs[$field]), $action_array['basic'][$field]);
			if($focus->field_defs[$field]['type']=='date' && !empty($focus->field_defs[$field]['rel_field']) ){
				$rel_field = $focus->field_defs[$field]['rel_field'];
				$focus->$rel_field = get_expiry_date('time', $action_array['basic'][$field]);
			}
			execute_special_logic($field, $focus);
		}
		if($new_value=='Existing Value'){
			$focus->$field = get_expiry_date(get_field_type($focus->field_defs[$field]), $action_array['basic'][$field], false, true, $focus->$field);
			execute_special_logic($field, $focus);
		}
	}

	foreach($action_array['advanced'] as $field => $meta_array){
        if (!empty($focus->field_defs[$field]['calculated']))
            {
                $GLOBALS['log']->info("workflow attempting to update calculated field $field.");
                continue;
            }
		$new_value = process_advanced_actions($focus, $field, $meta_array, $focus);
		$focus->$field = $new_value;
		execute_special_logic($field, $focus);
	}
    $focus->in_workflow = true;
//end function process_action_update
}

function process_action_update_rel($focus, $action_array){

		$rel_handler = $focus->call_relationship_handler("module_dir", true);
		$rel_handler->set_rel_vardef_fields($action_array['rel_module']);
		$rel_handler->build_info(false);

		$rel_list = $rel_handler->build_related_list();

	//All, First, Filter (default ALL)

	if(!empty($rel_list[0])){

		$rel_list = process_rel_type("rel_module_type", "rel_filter", $rel_list, $action_array);

		foreach($rel_list as $rel_object){
            $check_notify = false;
            $old_owner = $rel_object->assigned_user_id;
			foreach($action_array['basic'] as $field => $new_value){

				if(empty($action_array['basic_ext'][$field])){
					$rel_object->$field = convert_bool($new_value, $rel_object->field_defs[$field]['type']);
				}
				//otherwise rely on the basic_ext to handle the action for this field
				if($field == "email1") $rel_object->email1_set_in_workflow = $rel_object->email1;
                if($field == "email2") $rel_object->email2_set_in_workflow = $rel_object->email2;
			//loop through fields to change
			}
			foreach($action_array['basic_ext'] as $field => $new_value){
				//Only here if there is a datetime.
				if($new_value=='Triggered Date'){
					$rel_object->$field = get_expiry_date(get_field_type($rel_object->field_defs[$field]), $action_array['basic'][$field], true);
				}
				if($new_value=='Existing Value'){
					$rel_object->$field = get_expiry_date(get_field_type($rel_object->field_defs[$field]), $action_array['basic'][$field], true, true, $rel_object->$field);
				}
			}

			foreach($action_array['advanced'] as $field => $meta_array){
				$new_value = process_advanced_actions($focus, $field, $meta_array, $rel_object);
				$rel_object->$field = $new_value;
			}
            $rel_object->in_workflow = true;
            if($old_owner != $rel_object->assigned_user_id) $check_notify = true;
            if(!empty($_REQUEST['massupdate']) && $_REQUEST['massupdate']=='true') $check_notify = false;//if in a massupdate, the notification will not be sent, because it will take a long time.
			$rel_object->save($check_notify);

		//end foreach rel_object
		}

	//end if there are any relationship records
	}

//end function process_action_update_rel
}

function process_action_new($focus, $action_array){

	//find out if the action_module is related to this module or not.  If so make sure to connect
	$seed_object = new WorkFlow();
    $seed_object->base_module = $focus->module_dir;
    $rel_module = $seed_object->get_rel_module($action_array['action_module'], true);
	$target_module = get_module_info($rel_module);
	$rel_handler = $focus->call_relationship_handler("module_dir", true);
	//$rel_handler->base_bean = & $focus;
	$rel_handler->get_relationship_information($target_module);

	//get_relationship_information($target_module, $focus);

    if(!empty($_REQUEST['massupdate']) && $_REQUEST['massupdate']=='true') {
        $check_notify = false;
    }
    else {
        $check_notify = true;
    }

	foreach($action_array['basic'] as $field => $new_value){
			//rrs - bug 10466
			$target_module->$field = convert_bool($new_value, $target_module->field_defs[$field]['type'], (empty($target_module->field_defs[$field]['dbType']) ? '' : $target_module->field_defs[$field]['dbType']));
            if($field == "email1") $target_module->email1_set_in_workflow = $target_module->email1;
            if($field == "email2") $target_module->email2_set_in_workflow = $target_module->email2;
	//end foreach value
	}
	foreach($action_array['basic_ext'] as $field => $new_value){
		//Only here if there is a datetime.
		if($new_value=='Triggered Date'){

			$target_module->$field = get_expiry_date(get_field_type($target_module->field_defs[$field]), $action_array['basic'][$field], true);

			if($target_module->field_defs[$field]['type']=='date' && !empty($target_module->field_defs[$field]['rel_field']) ){
				$rel_field = $target_module->field_defs[$field]['rel_field'];
				$target_module->$rel_field = get_expiry_date('time', $action_array['basic'][$field], true);
			}
		}
	}

	foreach($action_array['advanced'] as $field => $meta_array){


		$new_value = process_advanced_actions($focus, $field, $meta_array, $target_module);

		$target_module->$field = $new_value;
	}
	clean_save_data($target_module, $action_array);


	//BEGIN BRIDGING FOR MEETINGS/CALLS
	if(!empty($action_array['bridge_id']) && $action_array['bridge_id']!=""){
		$target_module->bridge_id = $action_array['bridge_id'];
		$target_module->bridge_object = & $focus;

	}
	//END BRIDGING FOR MEETINGS/CALLS

    $target_module->in_workflow = true;
    $target_module->not_use_rel_in_req = true;
    $target_module->new_rel_relname = $seed_object->rel_name;
    $target_module->new_rel_id = $focus->id;
	$target_module->save($check_notify);

//end function_action_new
}



function process_action_new_rel($focus, $action_array){

	///Build the relationship information using the Relationship handler
	$rel_handler = $focus->call_relationship_handler("module_dir", true);
	$rel_handler->set_rel_vardef_fields($action_array['rel_module'], $action_array['action_module']);
	//$rel_handler->base_bean = & $focus;
	$rel_handler->build_info(true);
	//get related bean
	$rel_list = $rel_handler->build_related_list("base");

    if(!empty($_REQUEST['massupdate']) && $_REQUEST['massupdate']=='true') {
        $check_notify = false;
    }
    else {
        $check_notify = true;
    }


	//All, first, filter (FIRST)

	if(!empty($rel_list[0])){

		$rel_list = process_rel_type("rel_module_type", "rel_filter", $rel_list, $action_array);

		foreach($rel_list as $rel_object){
			//Connect new module to the first related bean.
			$rel_handler2 = $rel_object->call_relationship_handler("module_dir", true);
			//$rel_handler->base_bean = & $rel_object;
			$rel_handler2->get_relationship_information($rel_handler->rel2_bean, true);

			//get_relationship_information($rel_handler->rel2_bean, $rel_object);

			$target_module = & $rel_handler->rel2_bean;

			foreach($action_array['basic'] as $field => $new_value){
				$target_module->$field = convert_bool($new_value, $target_module->field_defs[$field]['type']);
                if($field == "email1") $target_module->email1_set_in_workflow = $target_module->email1;
                if($field == "email2") $target_module->email2_set_in_workflow = $target_module->email2;
			//end foreach value
			}
			foreach($action_array['basic_ext'] as $field => $new_value){
				//Only here if there is a datetime.
				if($new_value=='Triggered Date'){

					$target_module->$field = get_expiry_date(get_field_type($target_module->field_defs[$field]), $action_array['basic'][$field], true);
					if($target_module->field_defs[$field]['type']=='date' && !empty($target_module->field_defs[$field]['rel_field']) ){
						$rel_field = $target_module->field_defs[$field]['rel_field'];
						$target_module->$rel_field = get_expiry_date('time', $action_array['basic'][$field], true);
					}
				}
			}

			foreach($action_array['advanced'] as $field => $meta_array){
				$new_value = process_advanced_actions($focus, $field, $meta_array, $target_module);
				$target_module->$field = $new_value;
			}
			clean_save_data($target_module, $action_array);


			//BEGIN BRIDGING FOR MEETINGS/CALLS
				if(!empty($action_array['bridge_id']) && $action_array['bridge_id']!=""){
					$target_module->bridge_id = $action_array['bridge_id'];
					$target_module->bridge_object = & $focus;
				}
			//END BRIDGING FOR MEETINGS/CALLS
            if($focus->object_name == $target_module->object_name){
			     $target_module->processed = true;
            }

			$target_module->in_workflow = true;
			$target_module->not_use_rel_in_req = true;

			$target_module->save($check_notify);

		//end for loop of all,first, filter
		}
	//end if a related record exists to connect this item too.
	}
//end function_action_new_rel
}


function clean_save_data($target_module, $action_array){
	global $app_list_strings;
		if (empty($app_list_strings)) {
			global $sugar_config;
			$app_list_strings = return_app_list_strings_language($sugar_config['default_language']);
		}
		foreach($target_module->column_fields as $field){
			if(empty($target_module->$field)){

				$data_cleaned = false;

				if($target_module->field_defs[$field]['type']=='bool'){
					$target_module->$field = 0;
					$data_cleaned = true;
				}

				if( isset($target_module->field_defs[$field]['auto_increment'] )
				    && $target_module->field_defs[$field]['auto_increment']  ){
					$target_module->$field = null;
					$data_cleaned = true;
				}

				if($target_module->field_defs[$field]['type']=='enum'){

					$options_array_name = $target_module->field_defs[$field]['options'];
					$target_module->$field = key($app_list_strings[$options_array_name]);
					$data_cleaned = true;
				//end if type is enum
				}

				if($target_module->field_defs[$field]['name']=='duration_hours' ||
					$target_module->field_defs[$field]['name']=='duration_minutes'
				){
					$target_module->$field = '0';
					$data_cleaned = true;
				//end if duration hours or minutes from calls module
				}

				if(  ( $target_module->field_defs[$field]['name']=='date_start' ||
					$target_module->field_defs[$field]['name']=='time_start' )
					&&
					 (  $target_module->object_name == "Call" ||
						$target_module->object_name == "Meeting"  )

				){
					$target_module->$field = get_expiry_date(get_field_type($target_module->field_defs[$field]), 0);
					if($target_module->field_defs[$field]['type']=='date' && !empty($target_module->field_defs[$field]['rel_field']) ){
						$rel_field = $target_module->field_defs[$field]['rel_field'];
						$target_module->$rel_field = get_expiry_date('time', $action_array['basic'][$field]);
					}
					$data_cleaned=true;
				}

				if($target_module->field_defs[$field]['name']=='date_entered'){

					$data_cleaned=true;
				}

				if($target_module->field_defs[$field]['name'] == "name"){
				//make sure you set the 'name' to blank, otherwise you won't be able
				//to go into the record

					$target_module->$field = " - blank - ";
					$data_cleaned=true;
				}

				if($data_cleaned==false){

						//try to fill with default if available
						if(!empty($target_module->field_defs[$field]['default'])){
							$target_module->$field = $target_module->field_defs[$field]['default'];
						} else {

							//fill in with blank value
							$target_module->$field = "";


						}
				}

			//end if not empty
			}

		//end foreach
		}

//end function clean_save_data
}

/**
 * Parse date from certain type and add interval to it
 *
 * @param string $stamp_type  Type (date, time, datetime)
 * @param int $time_interval Interval, seconds
 * @param bool $user_format Date is in user format?
 * @param bool $is_update Is it update for existing field?
 * @param string $value Date value (if update)
 */
function get_expiry_date($stamp_type, $time_interval, $user_format = false, $is_update = false, $value=null)
{
	/* This function needs to be combined with the one in WorkFlowSchedule.php
	*/
	global $timedate;

	if($is_update){
	    if(!empty($value)) {
    	    if($user_format) {
    	        $date = $timedate->fromUserType($value, $stamp_type);
    	    } else {
    		    $date = $timedate->fromDbType($value, $stamp_type);
    	    }
	    }
	} else {
	    $date = $timedate->getNow();

	}
	if(empty($date)) {
	    $GLOBALS['log']->fatal("Invalid date [$value] for type $stamp_type");
	    return '';
	}
	$date->modify("+$time_interval seconds");
    return $timedate->asDbType($date, $stamp_type);
	//end function get_expiry_date
}

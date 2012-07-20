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
 ********************************************************************************/







$focus = new WorkFlowAlert();

$save_expression_object = false;


	$focus->retrieve($_POST['record']);

foreach($focus->column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$focus->$field = $_POST[$field];
		
	}
}

foreach($focus->additional_column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$value = $_POST[$field];
		$focus->$field = $value;
	
	}
}

if(!empty($_POST['rel1_type']) && $_POST['rel1_type']!=""){
	$focus->rel_module1_type = $_POST['rel1_type'];	
}
	
if(!empty($_POST['rel2_type']) && $_POST['rel2_type']!=""){
	$focus->rel_module2_type = $_POST['rel2_type'];	
}	


	//Step 2, alert_user_meta_array
	if(		$_POST['user_type']=="current_user" ||
			$_POST['user_type']=="rel_user"
	){
		
		$focus->user_type = $_POST['user_type'];
		$focus->relate_type = $_POST['relate_type_'.$focus->user_display_type];
		$focus->address_type = $_POST['address_type_'.$focus->user_display_type];
		$focus->field_value = $_POST['field_value_'.$focus->user_display_type];
		$focus->array_type = $_POST['array_type_'.$focus->user_display_type];
		
		//clear out rel modules if this is from the triggered record
		if($_POST['user_type']=="current_user"){
			$focus->rel_module1 = "";
			$focus->rel_module2 = "";
			$focus->rel_email_value = "";
		}
	//end if alert_user_meta_array related_user or current_user
	}	

	if($_POST['user_type']=="rel_user_custom" ||
	
	$_POST['user_type']=="trig_user_custom"
	
		){	
		if (isset($_POST['mod_rel_custom2']) && $_POST['mod_rel_custom2']=="on"){
		//filter, so an expression object is needed or present	
			
			$exp_object = new Expression();
			if(isset($_POST['rel_custom2_exp_id']) && $_POST['rel_custom2_exp_id']!=""){
				
				$exp_object->retrieve($_POST['rel_custom2_exp_id']);
			}
			
			foreach($exp_object->column_fields as $field){
				if(isset($_POST["rel_custom2_".$field])){
					$exp_object->$field = $_POST["rel_custom2_".$field];

				}
			}
				
			$save_expression_object = true;

		//end if expression object is needed	
		} else {
			if(isset($_POST['rel_custom2_exp_id']) && $_POST['rel_custom2_exp_id']!=""){
			//expression object existing prior, so remove it.
				$exp_object = new Expression();
				$exp_object->mark_deleted($_POST['rel_custom2_exp_id']);	
			}	
			
		//else if expression object is not needed, but could be present so needs to be removed	
		}	

		$focus->array_type = "future";
		$focus->user_type = $_POST['user_type'];
		$focus->relate_type = "Self";
		$focus->address_type = $_REQUEST['address_type'];
		
	//end if user_type related_user_custom
	}	
		
	//Choosing a specific User, Team, or Role
	if(		$_POST['user_type']=="specific_user" ||
			$_POST['user_type']=="specific_team" ||
			$_POST['user_type']=="specific_role"
	){
		$focus->array_type = "future";
		$focus->user_type = $_POST['user_type'];
		$focus->relate_type = "Self";
		$focus->rel_module1 = "";
		$focus->rel_module2 = "";
		$focus->rel_email_value = "";
		$focus->address_type = $_REQUEST['address_type_lang_'.$focus->user_type];	
		//echo $focus->address_type."TEST";
	//end if user_type = specific_user, team, role	
	}
	
	if(		$_POST['user_type']=="login_user" ){
			$focus->array_type = "future";
			$focus->user_type = $_POST['user_type'];
			$focus->relate_type = "Self";
			$focus->rel_module1 = "";
			$focus->rel_module2 = "";
			$focus->rel_email_value = "";
			$focus->field_value = "modified_user_id";			
			$focus->address_type = $_POST['address_type_lang_'.$focus->user_type];
	//end if user_type is logged in user
	}	
    if( $_POST['user_type']=="assigned_team_target" ){
			$focus->array_type = "future";
			$focus->user_type = $_POST['user_type'];
			$focus->relate_type = "Self";
			$focus->rel_module1 = "";
			$focus->rel_module2 = "";
			$focus->rel_email_value = "";
			$focus->field_value = "team_set_id";			
			$focus->address_type = $_POST['address_type_lang_'.$focus->user_type];
	}
$focus->save();

if($save_expression_object == true){
	
	$exp_object->parent_id = $focus->id;
	$exp_object->save();
}

if($focus->user_type == "rel_user" || $focus->user_type == "rel_user_custom"){
	//Handle the rel1 and rel2 filtering
	$focus->handleFilterSave("rel1_", "rel1_alert_fil", "rel_module1_type");
	$focus->handleFilterSave("rel2_", "rel2_alert_fil", "rel_module2_type");
}


//Rewrite the workflow files
$workflow_object = $focus->get_workflow_object();
$workflow_object->write_workflow();

$return_id = $focus->id;
$parent_id = $focus->parent_id;

if(isset($_POST['return_module']) && $_POST['return_module'] != "") $return_module = $_POST['return_module'];
else $return_module = "WorkFlowAlerts";
if(isset($_POST['return_action']) && $_POST['return_action'] != "") $return_action = $_POST['return_action'];
else $return_action = "CreateStep1";
if(isset($_POST['return_id']) && $_POST['return_id'] != "") $return_id = $_POST['return_id'];
//exit;
$GLOBALS['log']->debug("Saved record with id of ".$return_id);
header("Location: index.php?action=$return_action&module=$return_module&record=$return_id&parent_id=$parent_id&special_action=refresh");
?>

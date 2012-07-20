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







$past_remove = false;


$focus = new WorkFlowActionShell();


if(!empty($_POST['record']) && $_POST['record']!=""){
	$focus->retrieve($_POST['record']);
	$is_new = false;
} else {
	
	$is_new = true;	
}

foreach($focus->column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$focus->$field = $_POST[$field];
		
	}
}
if(isset($_POST['rel1_type'])){
	$focus->rel_module_type = $_POST['rel1_type'];
}

$focus->save();
$parent_id = $focus->id;




	////////////////REL1 TYPE FILTER
	$rel1_list = & $focus->get_linked_beans('rel1_action_fil','Expression');

	if(!empty($rel1_list[0])){
		$rel1_filter_id = $rel1_list[0]->id;
	} else {
		$rel1_filter_id = "";
	}
	$rel1_object = new Expression();

	//Checked if there is an advanced filter
	if($focus->rel_module_type!="filter"){
		//no advanced filter
		if($rel1_filter_id!=""){
			//remove existing filter;
			$rel1_object->mark_deleted($rel1_filter_id);
		}

	//end if no adv filter	
	} else {
	//Rel1 Filter exists	 
		
		$rel1_object->parent_id = $parent_id;
		$rel1_object->handleSave("rel1_", "rel1_action_fil", $rel1_filter_id);
	
	//end if rel1 filter exists	
	}	
	/////////////////END REL1 TYPE FILTER


////////////////Handle the WorkFlowAction records

	$total_field_count = $_REQUEST['total_field_count'];

for ($i = 0; $i <= $total_field_count; $i++) {
   
	$temp_set_type = 'set_type_'.$i;
	
	if(!empty($_REQUEST[$temp_set_type]) && $_REQUEST[$temp_set_type]!=""){
	//this attribute is set, so lets store or update	
		
		$action_object = new WorkFlowAction();
		if(!empty($_REQUEST['action_id_'.$i]) && $_REQUEST['action_id_'.$i]!=''){
			$action_object->retrieve($_REQUEST['action_id_'.$i]);
			
		//end if action id is already present
		}
		
		foreach($action_object->column_fields as $field){
			$action_object->populate_from_save($field, $i, $temp_set_type);
		}	
					
		$action_object->parent_id = $focus->id;
		$action_object->save();
		
	} else {
	//possibility exists that this attribute is being removed	
		if(!empty($_REQUEST['action_id_'.$i]) && $_REQUEST['action_id_'.$i]!=''){
			
			
			//delete attribute
			$action_object = new WorkFlowAction();
			$action_object->mark_deleted($_REQUEST['action_id_'.$i]);
			
		//end if to remove attribute	
		}	
		
	}		
	
	
}


//Rewrite the workflow files
$workflow_object = $focus->get_workflow_object();

//  If this action_module is Meeting or Call then create a bridging object
if($is_new==true){
	$focus->check_for_invitee_bridge($workflow_object);
}

$workflow_object->write_workflow();

$workflow_id = $focus->parent_id;






$return_id = $focus->id;

if(isset($_POST['return_module']) && $_POST['return_module'] != "") $return_module = $_POST['return_module'];
else $return_module = "WorkFlowActionShells";
if(isset($_POST['return_action']) && $_POST['return_action'] != "") $return_action = $_POST['return_action'];
else $return_action = "CreateStep1";
if(isset($_POST['return_id']) && $_POST['return_id'] != "") $return_id = $_POST['return_id'];

$GLOBALS['log']->debug("Saved record with id of ".$return_id);
//exit;
header("Location: index.php?action=$return_action&module=$return_module&record=$return_id&workflow_id=$workflow_id&special_action=refresh");
?>

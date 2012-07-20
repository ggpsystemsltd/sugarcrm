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


$focus = new WorkFlowTriggerShell();


if(!empty($_POST['record']) && $_POST['record']!=""){
	$focus->retrieve($_POST['record']);
}

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


	$focus->show_past = 0;


	$focus->save();
	$parent_id = $focus->id;

	
///////////////////////////////////HANDLE THE COUNT COMPONENTS (BASE) & (RELATED)	
	

	
		$base_list = $focus->get_linked_beans('expressions','Expression');
		if(isset($base_list[0]) && $base_list[0]!='') {
			$base_id = $base_list[0]->id;
		} else {
			$base_id = "";	
		}

		$base_object = new Expression();
				
		if(!empty($base_id) && $base_id!=""){
			$base_object->retrieve($base_id);
			$base_is_update = true;
		}	

		$base_object->operator = $_POST['trigger1_operator'];
		$base_object->rhs_value = $_POST['trigger1_rhs_value'];
		
		
		
		if(!empty($_POST['mod_trigger2']) && $_POST['mod_trigger2']=="on"){
		
			$base_object->lhs_module = $_POST['trigger2_lhs_module'];
			$base_object->lhs_type = "rel_module";
		} else {
			$base_object->lhs_module = "";
			$base_object->lhs_type = "base_module";			
		}		
		
		$base_object->parent_id = $parent_id;
		$base_object->parent_type = "expression";
		$base_object->save();
		
		$base_parent_id = $base_object->id;


///////////////////////////////////HANDLE THE COUNT COMPONENTS (FILTER1) & (FILTER2)

	$filter1_object = new Expression();
	if(!empty($_POST['trigger3_exp_id']) && $_POST['trigger3_exp_id']!=""){
		$filter1_id = $_POST['trigger3_exp_id'];
		$filter1_object->retrieve($filter1_id);
		$filter1_is_update = true;
	} else {
		$filter1_id = "";	
	}		
	//Is there past to capture

	if(!empty($_POST['mod_trigger3']) && $_POST['mod_trigger3']=='on'){
		//(PAST)

		$filter1_object->lhs_module = $_POST['trigger3_lhs_module'];
		$filter1_object->lhs_field = $_POST['trigger3_lhs_field'];
		$filter1_object->operator = $_POST['trigger3_operator'];
		$filter1_object->exp_type = $_POST['trigger3_exp_type'];
		$filter1_object->rhs_value = $_POST['trigger3_rhs_value'];
		

		$filter1_object->parent_exp_id = $base_parent_id;
		$filter1_object->save();
		
	} else {
		//Show filter1

		//Do we need to remove the filter1, if we don't need it anymore
		if(!empty($filter1_id) && $filter1_id!=""){
			$filter1_object->mark_deleted($filter1_id);
			$filter1_object = new Expression();
		}

		//end if else past is on or off
	}

	
////////////////////////////////////////////////////////////////////////////	

	$filter2_object = new Expression();
	if(!empty($_POST['trigger4_exp_id']) && $_POST['trigger4_exp_id']!=""){
		$filter2_id = $_POST['trigger4_exp_id'];
		$filter2_object->retrieve($filter2_id);
		$filter2_is_update = true;
	} else {
		$filter2_id = "";	
	}		
	//Is there past to capture
	if(!empty($_POST['mod_trigger4']) && $_POST['mod_trigger4']=='on'){
		//(PAST)

		$filter2_object->lhs_module = $_POST['trigger4_lhs_module'];
		$filter2_object->lhs_field = $_POST['trigger4_lhs_field'];
		$filter2_object->operator = $_POST['trigger4_operator'];
		$filter2_object->exp_type = $_POST['trigger4_exp_type'];
		$filter2_object->rhs_value = $_POST['trigger4_rhs_value'];
		

		$filter2_object->parent_exp_id = $base_parent_id;
		$filter2_object->save();
		
	} else {
		//Show filter2

		//Do we need to remove the filter2, if we don't need it anymore
		if(!empty($filter2_id) && $filter2_id!=""){
			$filter2_object->mark_deleted($filter2_id);
			$filter2_object = new Expression();
		}

		//end if else past is on or off
	}
	
	
	


//END HANDLE TRIGGER COMPONENTS (PAST) & (FUTURE)
//////////////////////////////////////////////////////////////////////////////////

$workflow_object = $focus->get_workflow_type();
$workflow_object->write_workflow();

$return_id = $focus->parent_id;

if(isset($_POST['return_module']) && $_POST['return_module'] != "") $return_module = $_POST['return_module'];
else $return_module = "WorkFlowTriggerShells";
if(isset($_POST['return_action']) && $_POST['return_action'] != "") $return_action = $_POST['return_action'];
else $return_action = "CreateStep1";
if(isset($_POST['return_id']) && $_POST['return_id'] != "") $return_id = $_POST['return_id'];

$GLOBALS['log']->debug("Saved record with id of ".$return_id);
//exit;
header("Location: index.php?action=$return_action&module=$return_module&record=$return_id&workflow_id=$parent_id&parent_id=$parent_id&special_action=refresh");
?>

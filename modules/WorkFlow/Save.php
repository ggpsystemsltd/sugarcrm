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


require_once('include/controller/Controller.php');




$focus = new WorkFlow();

if(isset($_POST['record']) && $_POST['record']!=""){
	$focus->retrieve($_POST['record']);
	$is_new = false;
} else {
	$is_new = true;
}

//check if we need to remove the old stuff
if(!$is_new && ((!empty($_POST['base_module']) && ($_POST['base_module'] != $focus->base_module)) || (!empty($_POST['type']) && ($_POST['type'] != $focus->type)))){
	$focus->delete_workflow_on_cascade = false;
    $focus->cascade_delete($focus, true);
    $focus->deleted = 0;
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


if ($focus->status=="Active"){
	$focus->status = 1;	
} else {
	$focus->status = 0;
}	

//If this is new, set the initial process order
if($is_new==true){
		$controller = new Controller();
		$controller->init($focus, "New");
		$controller->change_component_order("", "", $_REQUEST['base_module']);
}

$focus->save();


if(!empty($_POST['is_duplicate']) && $_POST['is_duplicate'] == "true"){
	$old_workflow = new WorkFlow();
	$old_workflow->retrieve($_POST['old_record_id']);
	$alerts_list =& $old_workflow->get_linked_beans('alerts','WorkFlowAlertShell');
	$actions_list =& $old_workflow->get_linked_beans('actions','WorkFlowActionShell');
	$triggers_list = & $old_workflow->get_linked_beans('triggers','WorkFlowTriggerShell');
	$filters_list = & $old_workflow->get_linked_beans('trigger_filters','WorkFlowTriggerShell');
	
	foreach($alerts_list as $alert)
	{
		$alert->copy($focus->id);
	}
	
	foreach($actions_list as $action)
	{
		$newActionId = $action->copy($focus->id);
	
		// BUG 44500 Duplicating workflow does not duplicate invitees for created activites
		$query = "SELECT id FROM workflow WHERE parent_id = '{$action->id}' ";
		$result1 = $focus->db->query($query);
		while (($row=$focus->db->fetchByAssoc($result1)) != null) {
			$copyWorkflow = new WorkFlow();
			$copyWorkflow->retrieve($row['id']);
			$copyWorkflow->id = '';
			$copyWorkflow->parent_id = $newActionId;
			$copyWorkflowId = $copyWorkflow->save();

			$query = "SELECT id FROM workflow_alertshells WHERE parent_id = '{$row[id]}' ";
			$result2 = $focus->db->query($query);
			while (($alertshell=$focus->db->fetchByAssoc($result2)) != null) {
				$copyAlertshell = new WorkFlowAlertShell();
				$copyAlertshell->retrieve($alertshell['id']);
				$copyAlertshell->id = '';
				$copyAlertshell->parent_id = $copyWorkflowId;
				$copyAlertshellId = $copyAlertshell->save();
				
				$query = "SELECT id FROM workflow_alerts WHERE parent_id = '{$alertshell[id]}' ";
				$result3 = $focus->db->query($query);
				while (($alert=$focus->db->fetchByAssoc($result3)) != null) {
					$copyAlert = new WorkFlowAlert();
					$copyAlert->retrieve($alert['id']);
					$copyAlert->id = '';
					$copyAlert->parent_id = $copyAlertshellId;
					$copyAlertId = $copyAlert->save();
				}
			}
		}
	}
	
	foreach($triggers_list as $trigger)
	{
		$trigger->copy($focus->id);
	}
	
	foreach($filters_list as $filter)
	{
		$filter->copy($focus->id);
	}
}

	//Add or Build Logic File if necessary
	$focus->check_logic_hook_file();

//write the workflow into the workflow files
$focus->write_workflow();

$return_id = $focus->id;

if(isset($_POST['return_module']) && $_POST['return_module'] != "") $return_module = $_POST['return_module'];
else $return_module = "WorkFlow";
if(isset($_POST['return_action']) && $_POST['return_action'] != "") $return_action = $_POST['return_action'];
else $return_action = "DetailView";
if(isset($_POST['return_id']) && $_POST['return_id'] != "") $return_id = $_POST['return_id'];

$GLOBALS['log']->debug("Saved record with id of ".$return_id);
//exit;

//Redirect to DetailView, not listview for the workflow object.

header("Location: index.php?action=DetailView&module=$return_module&record=$return_id");
?>

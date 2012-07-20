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
global $mod_strings;



$focus = new WorkFlow();

if(!isset($_REQUEST['record']))
	sugar_die($mod_strings['ERR_DELETE_RECORD']);

	
	$focus->retrieve($_REQUEST['record']);
	
	$focus->cascade_delete( $focus, true);
	/*
	//Completely remove the trigger components////////////////////////
		$trigger_object_list = $focus->get_linked_beans('triggers','WorkFlowTriggerShell');
		if(!empty($trigger_object_list)){
		
			foreach($trigger_object_list as $trigger_object){
		
				//mark delete trigger components and sub expression components
				mark_delete_components($trigger_object->get_linked_beans('future_triggers','Expression'));
				mark_delete_components($trigger_object->get_linked_beans('past_triggers','Expression'));
				$trigger_object->mark_deleted($trigger_object->id);
			//end the foreach loop on trigger objects
			}
	
		//end if any alert objects exist
		}
		
	//Completely remove the trigger filter components////////////////////////
		$trigger_object_list = $focus->get_linked_beans('trigger_filters','WorkFlowTriggerShell');
		if(!empty($trigger_object_list)){
		
			foreach($trigger_object_list as $trigger_object){
		
				//mark delete trigger filter components and sub expression components
				mark_delete_components($trigger_object->get_linked_beans('expressions','Expression'));
				$trigger_object->mark_deleted($trigger_object->id);
			//end the foreach loop on trigger filter objects
			}
	
		//end if any alert objects exist
		}		
		
		
		
	//Completely remove the alert components/////////////////////////
		$alert_object_list = $focus->get_linked_beans('alerts','WorkFlowAlertShell');
		if(!empty($alert_object_list)){
		
			foreach($alert_object_list as $alert_object){
		
				//mark delete alert components and sub expression components

				//Alert recipient Object///////				
					$alert_object_list2 = $alert_object->get_linked_beans('alert_components','WorkFlowAlert');
	
					foreach($alert_object_list2 as $alert_object2){
						mark_delete_components($alert_object2->get_linked_beans('expressions','Expression'));
						mark_delete_components($alert_object2->get_linked_beans('rel1_alert_fil','Expression'));
						mark_delete_components($alert_object2->get_linked_beans('rel2_alert_fil','Expression'));
						$alert_object2->mark_deleted($alert_object2->id);	
		
					//end foreach alert_object2
					}	
	
				//End Alert recipient Object/////			
				
				$alert_object->mark_deleted($alert_object->id);
			//end the forloop on the alert objects
			}
	
		//end if any alert objects exist
		}
	
	
	//Completely remove the action components////////////////////////
		//mark delete actionshell components, action components and sub expression components
		$action_shell_list = $focus->get_linked_beans('actions','WorkFlowActionShell');
	
		foreach($action_shell_list as $action_shell_object){
		//mark delete actionshell sub components and actionshell
			mark_delete_components($action_shell_object->get_linked_beans('actions','WorkFlowAction'));
			mark_delete_components($action_shell_object->get_linked_beans('rel1_action_fil','Expression'));
			$action_shell_object->mark_deleted($action_shell_object->id);
		}

		
	//Handle re-processing orders
		$controller = new Controller();
		$controller->init($focus, "Delete");
		$controller->delete_adjust_order($focus->base_module);	
		
	//mark deleted the workflow object
	$focus->mark_deleted($_REQUEST['record']);
	*/
	//Re-write workflow
	$focus->write_workflow();

header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);
?>

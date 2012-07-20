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


require_once('include/ListView/ProcessView.php');
global $mod_strings;



$focus = new WorkFlowTriggerShell();

if(!isset($_REQUEST['record']))
	sugar_die($mod_strings['ERR_DELETE_RECORD']);

	$focus->retrieve($_REQUEST['record']);
	//mark delete trigger components
	mark_delete_components($focus->get_linked_beans('future_triggers','Expression'));
	mark_delete_components($focus->get_linked_beans('past_triggers','Expression'));
	mark_delete_components($focus->get_linked_beans('expressions','Expression'));
	$focus->mark_deleted($_REQUEST['record']);

	$workflow_object = $focus->get_workflow_type();
		//rsmith
	if($focus->frame_type == "Primary")
	{
		$target_meta_array = $process_dictionary["TriggersCreateStep1"]['elements'];
		$ProcessView = new ProcessView($workflow_object, $focus);
		$found = false;
		foreach($target_meta_array as $element => $specific_array){
				if($ProcessView->build_this_type($specific_array)){
						//we have found a trigger that is compatible with the workflow
						$trigger_type = $specific_array['trigger_type'];
						//now we must find a trigger on the workflow that is of this type
						//if we find it then set this as the primary
						//else continue
						$trigger_list = $workflow_object->get_linked_beans('trigger_filters','WorkFlowTriggerShell');
						foreach($trigger_list as $trigger){

								if($trigger->type == $element){
										$trigger->frame_type = "Primary";
										$trigger->save();
										$found = true;
										break;
								}
						}
						if($found){
							break;
						}
				}
		}
		//bug 25791, In the for-loop above $target_meta_array can be empty and the $trigger->frame_type is not changed.
		//In that case, just use the first trigger as the primary.
        if(!$found) {
            $trigger_list = $workflow_object->get_linked_beans('trigger_filters','WorkFlowTriggerShell');
            if (isset($trigger_list[0])) {
            	$trigger_list[0]->frame_type = "Primary";
                $trigger_list[0]->save();
            }
        }
	}
	//rsmith
    //reload $workflow_object to make the trigger changes take effect.
	$workflow_object = $focus->get_workflow_type();
	$workflow_object->write_workflow();

header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);
?>

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
 * Workflow manager class
 * @api
 */
class WorkFlowHandler {

function WorkFlowHandler(&$focus, $event){

	//Confirm we are not running populating seed data
	if(!isset($_SESSION['disable_workflow'])){

	//Now just include the modules workflow from this bean
		global $triggeredWorkflows;
		//Ensure that the array is set, but don't reset it if it is not empty.
		if (empty($triggeredWorkflows))
		{
			$triggeredWorkflows = array();
		}

		if($event=="before_save"){

			$workflow_path = "custom/modules/".$focus->module_dir."/workflow/workflow.php";

			if(file_exists($workflow_path)){
				include_once($workflow_path);

				$target_class = $focus->module_dir."_workflow";
				$workflow_class = new $target_class();
                $workflow_class->process_wflow_triggers($focus);

			//if file exists
			}
		//end if logic hook is beforesave
		}
		//Reset the infinit loop check for workflows
		$triggeredWorkflows = array();

	//End confirmation that we are not running installation
	}


//end function process_workflow
}

/**
 * Process all of the workflow alerts in the session for this bean
 * @param focus - the bean to use in the alert
 * @param alerts - the alerts that were saved in the session
 *
 */
function process_alerts(&$focus, $alerts){

    //Confirm we are not running populating seed data
    if(!isset($_SESSION['disable_workflow'])){

    //Now just include the modules workflow from this bean
            $workflow_path = "custom/modules/".$focus->module_dir."/workflow/workflow.php";

            if(file_exists($workflow_path)){
                include_once($workflow_path);

                $target_class = $focus->module_dir."_workflow";
                $workflow_class = new $target_class();
                    if(!empty($focus->emailAddress) && isset($focus->emailAddress->addresses)) {//addresses maybe cleared
                        $old_addresses = $focus->emailAddress->addresses;
                    }
                    $focus->retrieve($focus->id);//This will lose all changes to emailaddress
                    if(!empty($focus->emailAddress) && isset($old_addresses)) {
                        $focus->emailAddress->addresses = $old_addresses;
                    }
                    $file = "custom/modules/".$focus->module_dir."/workflow/workflow_alerts.php";
                    if(file_exists($file)){
                        include_once($file);
                        foreach($alerts as $alert){
                            $alert_target_class = $focus->module_dir."_alerts";
                            if(class_exists($alert_target_class)){
                                $alert_class = new $alert_target_class();
                                $function_name = "process_wflow_".$alert;
                                $alert_class->$function_name($focus);
                            }
                        }
                    }
                }
    //End confirmation that we are not running installation
    }
//end function process_workflow
}

//end class WorkFlowHandler
}
?>

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
include_once('modules/WorkFlow/WorkFlowSchedule.php');

function get_time_contents($workflow_id){
	
	$contents = "";
	
	//check to see if this item already is in the schedule table
	$contents .= "\t\t check_for_schedule(\$focus, \$workflow_id, \$time_array); \n\n ";

	
	return $contents;
	
//end function get_time_contents	
}	


function check_for_schedule(& $focus, $workflow_id, $time_array){
	
	$is_update = false;
	
	//check to see if it exists;
	$wflow_schedule = new WorkFlowSchedule();
	$is_update = $wflow_schedule->check_existing_trigger($focus->id, $workflow_id);

	if(isset($time_array['parameters'])){
		$wflow_schedule->parameters = $time_array['parameters'];
	}
		
	//if this exists, then update
	if($is_update == true ){
		
		$wflow_schedule->set_time_interval($focus, $time_array, true);
		$wflow_schedule->save();
	} else {	
	//if this does not exist then create new

		$wflow_schedule->bean_id = $focus->id;
		$wflow_schedule->workflow_id = $workflow_id;
		$wflow_schedule->target_module = $focus->module_dir;
		$wflow_schedule->set_time_interval($focus, $time_array);
		$wflow_schedule->save();
	
	//end if else is update or not
	}

//end function check_for_schedule
}	

?>

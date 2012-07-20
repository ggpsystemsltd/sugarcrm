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




global $timedate;

$newIds = array();

for ($i = 1; $i <= $_REQUEST['numRowsToSave']; $i++) {
    // don't save any blank rows 
    if (isset($_REQUEST["duration_" . $i]) && ($_REQUEST["duration_" . $i] != "")) {    
        $projectTask = new ProjectTask();
        if (isset($_REQUEST["obj_id_" . $i])) {
            //$projectTask->id = $_REQUEST["obj_id_" . $i];
            $projectTask->retrieve($_REQUEST["obj_id_" . $i]);
        }
        $projectTask->project_task_id = $_REQUEST["mapped_row_" . $i];
        $projectTask->percent_complete = $_REQUEST["percent_complete_" . $i];
        $projectTask->name = $_REQUEST["description_" . $i];
        $projectTask->duration = $_REQUEST["duration_" . $i];
        
        if (isset($_REQUEST["duration_unit_" . $i]))
            $projectTask->duration_unit = $_REQUEST["duration_unit_" . $i];
        
        $projectTask->date_start = $_REQUEST["date_start_" . $i];
        $projectTask->date_finish = $_REQUEST["date_finish_" . $i];
        $projectTask->milestone_flag = $_REQUEST["is_milestone_" . $i];
        $projectTask->time_start = $_REQUEST["time_start_" . $i];
        $projectTask->time_finish = $_REQUEST["time_finish_" . $i];
    
        //$projectTask->parent_task_id = $_REQUEST["parent_" . $i];
        $parentId = $_REQUEST["parent_" . $i];
        if ($parentId != "")
            $projectTask->parent_task_id = $_REQUEST["mapped_row_".$parentId];
        else             
            $projectTask->parent_task_id = "";
        $projectTask->project_id = $_REQUEST["project_id"];
        $projectTask->predecessors = $_REQUEST["predecessors_" . $i];
        
        if ($_REQUEST["is_template"]){
        	$projectTask->assigned_user_id = NULL;
        }
        else if (isset($_REQUEST["resource_" . $i])) {
            $projectTask->resource_id = $_REQUEST["resource_" . $i]; 
            if ($_REQUEST["resource_type_" . $i] == "User")
                $projectTask->assigned_user_id = $_REQUEST["resource_" . $i];
        }
    
        $projectTask->team_id = $_REQUEST["team_id"];        
        $projectTask->actual_duration = $_REQUEST["actual_duration_" . $i];
    
        //todo check_notify
        $id = $projectTask->save(false);
        //$projectTask->save($GLOBALS['check_notify']);
        
        // Keep track of the newly generated Id to pass back to the grid so that we avoid
        // saving the row multiple times.
        if (empty($_REQUEST["obj_id_" . $i])) {
           $newIds[$i] = $id;
        }
    }
}
// Handle deleted rows.
$deletedRows = $_REQUEST['deletedRows'];
if ($deletedRows != "") {
    $deletedRowsArray = explode(",", $deletedRows);
    for ($i = 0; $i < sizeof($deletedRowsArray); $i++) {
        $projectTask = new ProjectTask();
        $projectTask->mark_deleted($deletedRowsArray[$i]);
    }
}

$json = getJSONobj();
echo 'result = '. $json->encode($newIds);

?>

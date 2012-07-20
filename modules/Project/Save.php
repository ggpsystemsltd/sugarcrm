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






require_once('include/formbase.php');

global $current_user;

$sugarbean = new Project();
$sugarbean = populateFromPost('', $sugarbean);

$projectTasks = array();
if (isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true"){
    $base_project_id = $_REQUEST['relate_id'];
}
else{
    $base_project_id = $sugarbean->id;
}
if(isset($_REQUEST['save_type']) || isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true") {
    $query = "SELECT id FROM project_task WHERE project_id = '" . $base_project_id . "' AND deleted = 0";
    $result = $sugarbean->db->query($query,true,"Error retrieving project tasks");
    $row = $sugarbean->db->fetchByAssoc($result);

    while ($row != null){
        $projectTaskBean = new ProjectTask();
        $projectTaskBean->id = $row['id'];
        $projectTaskBean->retrieve();
        $projectTaskBean->date_entered = '';
        $projectTaskBean->date_modified = '';
        array_push($projectTasks, $projectTaskBean);
        $row = $sugarbean->db->fetchByAssoc($result);
    }
}
if (isset($_REQUEST['save_type'])){
    $sugarbean->id = '';
    $sugarbean->assigned_user_id = $current_user->id;

    if ($_REQUEST['save_type'] == 'TemplateToProject'){
        $sugarbean->name = $_REQUEST['project_name'];
        $sugarbean->is_template = 0;
    }
    else if ($_REQUEST['save_type'] == 'ProjectToTemplate'){
        $sugarbean->name = $_REQUEST['template_name'];
        $sugarbean->is_template = true;
    }
}
else{
    if (isset($_REQUEST['is_template']) && $_REQUEST['is_template'] == '1'){
        $sugarbean->is_template = true;
    }
    else{
        $sugarbean->is_template = 0;
    }
}

if(isset($_REQUEST['email_id'])) $sugarbean->email_id = $_REQUEST['email_id'];

if(!$sugarbean->ACLAccess('Save')){
        ACLController::displayNoAccess(true);
        sugar_cleanup(true);
}

if (isset($GLOBALS['check_notify'])) {
    $check_notify = $GLOBALS['check_notify'];
}
else {
    $check_notify = FALSE;
}
$sugarbean->save($check_notify);
$return_id = $sugarbean->id;

if(isset($_REQUEST['save_type']) || isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true") {
    for ($i = 0; $i < count($projectTasks); $i++){
        if (isset($_REQUEST['save_type']) || (isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true")){
            $projectTasks[$i]->id = '';
            $projectTasks[$i]->project_id = $sugarbean->id;
        }
        if ($sugarbean->is_template){
            $projectTasks[$i]->assigned_user_id = '';
        }
        $projectTasks[$i]->team_id = $sugarbean->team_id;
        if(empty( $projectTasks[$i]->duration_unit)) $projectTasks[$i]->duration_unit = " "; //Since duration_unit cannot be null.
        $projectTasks[$i]->save(false);
    }
}

if ($sugarbean->is_template){
    header("Location: index.php?action=ProjectTemplatesDetailView&module=Project&record=$return_id&return_module=Project&return_action=ProjectTemplatesEditView");
}
else{
    handleRedirect($return_id,'Project');
}
?>
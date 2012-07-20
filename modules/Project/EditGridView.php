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
global $app_strings;
global $app_list_strings;
global $current_language;
global $current_user;
global $hilite_bg;
global $sugar_version, $sugar_config;
$focus = new Project();

if(!empty($_REQUEST['record']))
{
    $focus->retrieve($_REQUEST['record']);
}

$params = array();
$params[] = "<a href='index.php?module=Project&action=index'>{$mod_strings['LBL_MODULE_NAME']}</a>";
if ($focus->is_template)
	$params[] = "<a href='index.php?module=Project&action=ProjectTemplatesDetailView&record={$focus->id}'>{$focus->name}</a>";
else
    $params[] = "<a href='index.php?module=Project&action=DetailView&record={$focus->id}'>{$focus->name}</a>";
$params[] = $mod_strings['LBL_VIEW_GANTT_TITLE'];
echo getClassicModuleTitle("Project", $params, true);

$GLOBALS['log']->info("Project detail view");

$sugar_smarty = new Sugar_Smarty();
///
/// Assign the template variables
///
$sugar_smarty->assign('MOD', $mod_strings);
$sugar_smarty->assign('APP', $app_strings);
$sugar_smarty->assign('name', $focus->name);
$sugar_smarty->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$sugar_smarty->assign("ID", $focus->id);
$sugar_smarty->assign("NAME", $focus->name);
$sugar_smarty->assign("IS_TEMPLATE", $focus->is_template);

$userBean = new User();
$focus->load_relationship("user_resources");
$users = $focus->user_resources->getBeans($userBean);
$contactBean = new Contact();
$focus->load_relationship("contact_resources");
$contacts = $focus->contact_resources->getBeans($contactBean);

$resources = array();
foreach ($users as $key => $user) {
    $resources[$user->full_name] = $user;
}
foreach ($contacts as $key => $contact) {
    $resources[$contact->full_name] = $contact;
}
ksort($resources);
$sugar_smarty->assign("RESOURCES", $resources);

// Get resource holidays ////////////////////////////////////////////////

$holidayBean = new Holiday();
$holidays = array();

if (count($resources) > 0){
	$query = "select * from holidays where (";
        $i = 0;
        $count = count($users);
        foreach ($users as $key => $user) {
            $query .= "person_id like '". $user->id . "'";
            if ($i < ($count - 1)) {
                $query .= " or ";
            }
            $i++;
        }

	if (count($users) > 0 && count($contacts) > 0)
	    $query .= " or ";

        $i = 0;
        $count = count($contacts);
        foreach ($contacts as $key => $contact) {
            $query .= "person_id like '". $contact->id . "'";
            if ($i < ($count - 1)) {
                $query .= " or ";
            }
            $i++;
        }
	$query .= " ) and deleted=0 and holiday_date between '". $timedate->to_db_date($focus->estimated_start_date, false) ."' and '". $timedate->to_db_date($focus->estimated_end_date, false) ."'";
	$result = $holidayBean->db->query($query, true, "");   
	$row = $holidayBean->db->fetchByAssoc($result);
	
	while ($row != null) {
	    $holiday = new Holiday();
	    $holiday->id = $row['id'];
	    $holiday->retrieve();
	    array_push($holidays, $holiday);
	    $row = $holidayBean->db->fetchByAssoc($result);    
	}
	$sugar_smarty->assign("HOLIDAYS", $holidays);
}
/////////////////////////////////////////////////////////////////////////

$sugar_smarty->assign("DURATION_UNITS", $app_list_strings['project_duration_units_dom']);
$sugar_smarty->assign("PROJECT", $focus);

$today = $timedate->nowDbDate();
$nextWeek = $timedate->asDbDate( $timedate->getNow()->get('+1 week'));



if (isset($_REQUEST["selected_view"]))
    $sugar_smarty->assign("SELECTED_VIEW", $_REQUEST["selected_view"]);
else
    $sugar_smarty->assign("SELECTED_VIEW", 0);

if (isset($_REQUEST["view_filter_resource"]))
    $sugar_smarty->assign("VIEW_FILTER_RESOURCE", $_REQUEST["view_filter_resource"]);



$projectTaskBean = new ProjectTask();
$projectTasks = array();

//todo: Ajay to make sure that the getBeans() call takes a sortArray and actually uses it.
//$focus->load_relationship("projecttask");
//$projectTasks = $focus->projecttask->getBeans($projectTaskBean);

// Completed Tasks
if (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 2) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.percent_complete='100' AND project_task.deleted=0 order by project_task.project_task_id";
    $result = $projectTaskBean->db->query($query, true, "");
}
//Incomplete Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 3) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.percent_complete < 100 AND project_task.deleted=0 order by project_task.project_task_id";
}
//Milestone Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 4) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.milestone_flag='1' AND project_task.deleted=0 order by project_task.project_task_id";
    $result = $projectTaskBean->db->query($query, true, "");
}
//Tasks for Resource
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 5) {
	$resource_name = explode(' ', $_REQUEST['view_filter_resource']);
	
	// check to see if a last name query is required
	if (!empty($resource_name[1])){
		$userLastNameQry = "AND users.last_name like '" . $resource_name[1] . "%' ";
		$contactLastNameQry = "AND contacts.last_name like '" . $resource_name[1] . "%' ";
	}
	else{
		$userLastNameQry = '';
		$contactLastNameQry = '';
	}
	
	// UNION to get the resource names from contacts and users table	
    $query = "SELECT project_task.*, users.first_name, users.last_name FROM project_task, users WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.resource_id like users.id AND (users.last_name like '". $resource_name[0] ."%' OR users.first_name like '". $resource_name[0] ."%') " . $userLastNameQry . "AND project_task.deleted=0 ";
    $query .= "UNION ALL ";
    $query .= "SELECT project_task.*, contacts.first_name, contacts.last_name FROM project_task, contacts WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.resource_id like contacts.id AND (contacts.last_name like '". $resource_name[0] ."%' OR contacts.first_name like '". $resource_name[0] ."%') " . $contactLastNameQry . "AND project_task.deleted=0 ";
    
    $result = $projectTaskBean->db->query($query, true, "");
}

// Tasks for date range
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 6) {
    //$query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.date_start >= '". $_REQUEST['view_filter_date_start'] ."' AND project_task.date_finish <= '".$_REQUEST['view_filter_date_finish']."' AND project_task.deleted=0 order by project_task.project_task_id";
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record'].
        "' AND (project_task.date_start BETWEEN '". $timedate->to_db_date($_REQUEST['view_filter_date_start'], false) .
        "' AND '". $timedate->to_db_date($_REQUEST['view_filter_date_finish'], false)."' OR project_task.date_finish BETWEEN '".
        $timedate->to_db_date($_REQUEST['view_filter_date_start'], false) ."' AND '" . $timedate->to_db_date($_REQUEST['view_filter_date_finish'], false).
        "') AND project_task.deleted=0 order by project_task.project_task_id";
    $result = $projectTaskBean->db->query($query, true, "");
    $sugar_smarty->assign("VIEW_FILTER_DATE_START", $_REQUEST["view_filter_date_start"]);
    $sugar_smarty->assign("VIEW_FILTER_DATE_FINISH", $_REQUEST["view_filter_date_finish"]);
}

// Overdue Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 7) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.date_finish < '". $today . "' AND project_task.percent_complete < 100 AND project_task.deleted=0 order by project_task.project_task_id";
    $result = $projectTaskBean->db->query($query, true, "");
}
// Upcoming Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 8) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND " .
            "(project_task.date_start BETWEEN '" . $today . "' AND '". $nextWeek . "' OR ".
            "project_task.date_finish BETWEEN '". $today . "' AND '". $nextWeek . "') AND project_task.deleted=0 order by project_task.project_task_id";
    
    $result = $projectTaskBean->db->query($query, true, "");
}
// My Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 9) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.resource_id like '". $current_user->id . "' AND project_task.deleted=0 order by project_task.project_task_id";
    $result = $projectTaskBean->db->query($query, true, "");
}
// My Overdue Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 10) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']. "' AND project_task.resource_id like '".$current_user->id ."' AND " .
             "project_task.date_finish < '". $today . "' AND project_task.percent_complete < 100 AND project_task.deleted=0 order by project_task.project_task_id";
    $result = $projectTaskBean->db->query($query, true, "");
}
// My Upcoming Tasks
elseif (isset($_REQUEST["selected_view"]) && $_REQUEST["selected_view"] == 11) {
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']. "' AND project_task.resource_id like '" .$current_user->id ."' AND " .
        "(project_task.date_start BETWEEN '" . $today . "' AND '". $nextWeek . "' OR ".
        "project_task.date_finish BETWEEN '". $today . "' AND '". $nextWeek . "') AND project_task.deleted=0 order by project_task.project_task_id";
    
    $result = $projectTaskBean->db->query($query, true, "");
}
else
    $query = "SELECT * FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.deleted=0 order by project_task.project_task_id";

if (!isset($_REQUEST["selected_view"]) || ($_REQUEST["selected_view"] == 0 || $_REQUEST["selected_view"] == 1 || $_REQUEST["selected_view"] == 3)) {
    $result = $projectTaskBean->db->query($query, true, "");
    $row = $projectTaskBean->db->fetchByAssoc($result);
    $count = 0;
    while ($row != null) {
        $projectTask = new ProjectTask();
        $projectTask->id = $row['id'];
        $projectTask->retrieve();
        if (empty($projectTask->percent_complete))
            $projectTask->percent_complete = 0;
        if (empty($projectTask->duration))
            $projectTask->duration = 0;
        array_push($projectTasks, $projectTask);
        $row = $projectTaskBean->db->fetchByAssoc($result);
        $count++;
    }
}
else {
    // Get all the tasks that participate in a parent relationship with any task.
    $query = "SELECT * from project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.project_task_id in (SELECT parent_task_id FROM project_task WHERE project_task.project_id='" .$_REQUEST['record']."' AND project_task.deleted=0)";
    $parentResult = $projectTaskBean->db->query($query, true, "");
    $row = $projectTaskBean->db->fetchByAssoc($result);
    $parentRow = $projectTaskBean->db->fetchByAssoc($parentResult);
    $parentRows = array();
    
    while ($parentRow != null) {
        $parentProjectTask = new ProjectTask();
        $parentProjectTask->id = $parentRow['id'];
        $parentProjectTask->retrieve();
        $parentRows[$parentProjectTask->project_task_id] = $parentProjectTask;
        $parentRow = $projectTaskBean->db->fetchByAssoc($parentResult);
    }

    while ($row != null) {
        $projectTask = new ProjectTask();
        $projectTask->id = $row['id'];
        $projectTask->retrieve();
        $projectTasks[$projectTask->project_task_id] = $projectTask;
        $parent = $projectTask->parent_task_id;
        while ($parent != null) {
            $parentProjectTask = $parentRows[$parent];
            $projectTasks[$parentProjectTask->project_task_id] = $parentProjectTask;
            $parent = $parentProjectTask->parent_task_id;            
        }
        $row = $projectTaskBean->db->fetchByAssoc($result); 
    }
    ksort($projectTasks);
}


// Bug 47490 ensure the project task ids are continuous and begin with 1
// also make sure parent_task_id is correctly changed accordingly
$count = count($projectTasks);
$id_map = array(); // $id_map[<old_task_id>] = <new_task_id>

// first loop, construct the id_map and assign new project_task_id
for ($i = 0; $i < $count; $i++) {
    $id_map[$projectTasks[$i]->project_task_id] = $i + 1;
    $projectTasks[$i]->project_task_id = $i + 1;
}

// second loop, modify parent_project_id based on id_map
for ($i = 0; $i < $count; $i++) {
    if (!empty($projectTasks[$i]->parent_task_id) && isset($id_map[$projectTasks[$i]->parent_task_id])) {
        $projectTasks[$i]->parent_task_id = $id_map[$projectTasks[$i]->parent_task_id];
    } else {
        $projectTasks[$i]->parent_task_id = '';
    }
}
// end Bug 47490

$sugar_smarty->assign("TASKS", $projectTasks);
$sugar_smarty->assign("TASKCOUNT", $count);
$sugar_smarty->assign("BG_COLOR", $hilite_bg);
$sugar_smarty->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());
$sugar_smarty->assign("TEAM", $focus->team_id);
$sugar_smarty->assign("OWNER", $focus->assigned_user_id);
$sugar_smarty->assign('NAME_LENGTH', $projectTaskBean->field_defs['name']['len']);

//todo: also add the owner's managers 

global $current_user;
if(is_admin($current_user)
	&& $_REQUEST['module'] != 'DynamicLayout'
	&& !empty($_SESSION['editinplace']))
{
	$record = '';
	if(!empty($_REQUEST['record']))
	{
		$record = 	$_REQUEST['record'];
	}

	$sugar_smarty->assign("ADMIN_EDIT","<a href='index.php?action=index&module=DynamicLayout&from_action="
		.$_REQUEST['action'] ."&from_module=".$_REQUEST['module']
		."&record=".$record. "'>"
		.SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'",null,null,'.gif',$mod_strings['LBL_EDITLAYOUT'])."</a>");		
}
$sugar_smarty->assign("DATE_FORMAT", $current_user->getPreference('datef'));
$sugar_smarty->assign("CURRENT_USER", $current_user->id);
$sugar_smarty->assign("CANEDIT",$current_user->id == $focus->assigned_user_id || $current_user->is_admin);

// Bug #43092
// Based on teamset ID, get a list of teams, and use that to check if this user
// can edit the gantt chart
$GLOBALS['log']->debug('EditGridView.php: Getting list of teams to determine access for editing gantt chart');
require_once("modules/Teams/TeamSet.php");

$list_of_teams = array();

if (isset($focus->team_set_id)) {
    $teamSet        = new TeamSet();
    $list_of_teams  = $teamSet->getTeamIds($focus->team_set_id);
} else { // since no team_set_id exists, we can just use the current team id
    $list_of_teams[] = $focus->team_id;
}

// this checks to see if any teams in the project's teamset matches any teams
// in the project's list of teams.
$sugar_smarty->assign("CANEDIT",(bool)array_intersect(array_values($list_of_teams),array_keys($current_user->get_my_teams()))  || $current_user->id == $focus->assigned_user_id || $current_user->is_admin);


require_once('include/Sugarpdf/sugarpdf_config.php');
$sugar_smarty->assign("PDF_CLASS", PDF_CLASS);

echo $sugar_smarty->fetch('modules/Project/EditGridView.tpl');

$javascript = new javascript();
$javascript->setFormName('EditView');
$javascript->setSugarBean($focus);
$javascript->addAllFields('');
$javascript->addFieldGeneric('team_name', 'varchar', $app_strings['LBL_TEAM'] ,'true');
$javascript->addToValidateBinaryDependency('team_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_TEAM'], 'false', '', 'team_id');
$javascript->addToValidateBinaryDependency('assigned_user_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_ASSIGNED_TO'], 'false', '', 'assigned_user_id');

echo $javascript->getScript();

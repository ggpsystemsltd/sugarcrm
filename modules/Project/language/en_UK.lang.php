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




$mod_strings = array (
	'LBL_MODULE_NAME' => 'Project',
	'LBL_MODULE_TITLE' => 'Projects: Home',
	'LBL_SEARCH_FORM_TITLE' => 'Project Search',
    'LBL_LIST_FORM_TITLE' => 'Project List',
    'LBL_HISTORY_TITLE' => 'History',

	'LBL_ID' => 'Id:',
	'LBL_DATE_ENTERED' => 'Date Created:',
	'LBL_DATE_MODIFIED' => 'Date Modified:',
	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
    'LBL_ASSIGNED_USER_NAME' => 'Assigned to:',
	'LBL_MODIFIED_USER_ID' => 'Modified User Id:',
	'LBL_CREATED_BY' => 'Created By:',
	'LBL_TEAM_ID' => 'Team:',
	'LBL_NAME' => 'Name:',
    'LBL_PDF_PROJECT_NAME' => 'Project Name:',
	'LBL_DESCRIPTION' => 'Description:',
	'LBL_DELETED' => 'Deleted:',
    'LBL_DATE' => 'Date:',
	'LBL_DATE_START' => 'Start Date:',
	'LBL_DATE_END' => 'End Date:',
	'LBL_PRIORITY' => 'Priority:',
    'LBL_STATUS' => 'Status:',
    'LBL_MY_PROJECTS' => 'My Projects',
    'LBL_MY_PROJECT_TASKS' => 'My Project Tasks',
    
	'LBL_TOTAL_ESTIMATED_EFFORT' => 'Total Estimated Effort (hrs):',
	'LBL_TOTAL_ACTUAL_EFFORT' => 'Total Actual Effort (hrs):',

	'LBL_LIST_NAME' => 'Name',
    'LBL_LIST_DAYS' => 'days',
	'LBL_LIST_ASSIGNED_USER_ID' => 'Assigned To',
	'LBL_LIST_TOTAL_ESTIMATED_EFFORT' => 'Total Estimated Effort (hrs)',
	'LBL_LIST_TOTAL_ACTUAL_EFFORT' => 'Total Actual Effort (hrs)',
    'LBL_LIST_UPCOMING_TASKS' => 'Upcoming Tasks (1 Week)',
    'LBL_LIST_OVERDUE_TASKS' => 'Overdue Tasks',
    'LBL_LIST_OPEN_CASES' => 'Open Cases',
    'LBL_LIST_END_DATE' => 'End Date',
    'LBL_LIST_TEAM_ID' => 'Team',
    

	'LBL_PROJECT_SUBPANEL_TITLE' => 'Projects',
	'LBL_PROJECT_TASK_SUBPANEL_TITLE' => 'Project Tasks',
	'LBL_CONTACT_SUBPANEL_TITLE' => 'Contacts',
	'LBL_ACCOUNT_SUBPANEL_TITLE' => 'Accounts',
	'LBL_OPPORTUNITY_SUBPANEL_TITLE' => 'Opportunities',
	'LBL_QUOTE_SUBPANEL_TITLE' => 'Quotes',

    // quick create label
    'LBL_NEW_FORM_TITLE' => 'New Project',

	'CONTACT_REMOVE_PROJECT_CONFIRM' => 'Are you sure you want to remove this contact from this project?',

	'LNK_NEW_PROJECT'	=> 'Create Project',
	'LNK_PROJECT_LIST'	=> 'View Project List',
	'LNK_NEW_PROJECT_TASK'	=> 'Create Project Task',
	'LNK_PROJECT_TASK_LIST'	=> 'View Project Tasks',
    'LNK_PROJECT_DASHBOARD' => 'View My Projects Dashboard',
    'LNK_PROJECT_TASKS_DASHBOARD'   => 'My Project Tasks Dashboard',   
	'LNK_NEW_PROJECT_TEMPLATES' => 'Create Project Template',
	'LNK_PROJECT_TEMPLATES_LIST' => 'View Project Templates',
    'LNK_PROJECT_RESOURCE_REPORT' => 'Resource Report',
	
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'Projects',
	'LBL_ACTIVITIES_TITLE'=>'Activities',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'Activities',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'History',
	'LBL_QUICK_NEW_PROJECT'	=> 'New Project',
	
	'LBL_PROJECT_TASKS_SUBPANEL_TITLE' => 'Project Tasks',
	'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacts',
	'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Accounts',
	'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Opportunities',
    'LBL_CASES_SUBPANEL_TITLE' => 'Cases',
    'LBL_BUGS_SUBPANEL_TITLE' => 'Bugs',
    'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Products',
    
	'LBL_QUOTES_SUBPANEL_TITLE' => 'Quotes',
	
	'LBL_RESOURCES_SUBPANEL_TITLE' => 'Resources',
	'LBL_RESOURCE_NAME' => 'Resource Name',
	'LBL_RESOURCE_TYPE' => 'Resource Type',

    'LBL_TASK_ID' => 'ID',
    'LBL_TASK_NAME' => 'Task Name',
    'LBL_DURATION' => 'Duration',
    'LBL_ACTUAL_DURATION' => 'Actual Duration',
    'LBL_START' => 'Start',
    'LBL_FINISH' => 'Finish',
    'LBL_PREDECESSORS' => 'Predecessors',
    'LBL_PERCENT_COMPLETE' => '% Complete',
    'LBL_RESOURCE_NAMES' => 'Resource',
    'LBL_MORE'  => 'More...',

    'LBL_PERCENT_BUSY' => '% Busy',
    'LBL_USER_RESOURCE' => 'User Resource',
    'LBL_CONTACTS_RESOURCE' => 'Contact Resource',
    'LBL_PROJECT_HOLIDAYS' => 'Holiday',
    'LBL_LIST_RESOURCE' => 'Resource:',
    'LBL_TASK_ID_WIDGET' => 'id',
    'LBL_TASK_NAME_WIDGET' => 'description',
    'LBL_DURATION_WIDGET' => 'duration',
    'LBL_START_WIDGET' => 'date_start',
    'LBL_FINISH_WIDGET' => 'date_finish',
    'LBL_PREDECESSORS_WIDGET' => 'predecessors_',
    'LBL_PERCENT_COMPLETE_WIDGET' => 'percent_complete',
    'LBL_RESOURCE_NAMES_WIDGET' => 'resource',
    'LBL_EDIT_PROJECT_TASKS_TITLE'=> 'Edit Project Tasks',
    'LBL_VIEW_GANTT_TITLE' => 'View Gantt',
    
    'LBL_INSERT_BUTTON' => 'Insert Rows',
    'LBL_INDENT_BUTTON' => 'Indent',
    'LBL_OUTDENT_BUTTON' => 'Outdent',
    'LBL_SAVE_BUTTON' => 'Save',
    'LBL_COPY_BUTTON' => 'Copy',
    'LBL_PASTE_BUTTON' => 'Paste',   
    'LBL_DELETE_BUTTON' => 'Delete',  
    'LBL_EXPAND_ALL_BUTTON' => 'Expand All',  
    'LBL_COLLAPSE_ALL_BUTTON' => 'Collapse All',  
    'LBL_MARK_AS_MILESTONE_BUTTON' => 'Mark as Milestone',
    'LBL_UNMARK_AS_MILESTONE_BUTTON' => 'Un-mark as Milestone',
    'LBL_HIDE_OPTIONAL_COLUMNS_BUTTON' => 'Hide Optional Columns',
    'LBL_SHOW_OPTIONAL_COLUMNS_BUTTON' => 'Show Optional Columns',
    'LBL_VIEW_TASK_DETAILS_BUTTON' => 'View Task Details',
    'LBL_RECALCULATE_DATES_BUTTON' => 'Re-Calculate Dates',    
    'LBL_EXPORT_TO_PDF' => 'Export to PDF',
    
    'LBL_FILTER_ALL_TASKS' => 'All Tasks',  
    'LBL_FILTER_COMPLETED_TASKS' => 'Completed Tasks',  
    'LBL_FILTER_INCOMPLETE_TASKS' => 'Incomplete Tasks',  
    'LBL_FILTER_MILESTONES' => 'Milestones',  
    'LBL_FILTER_RESOURCE' => 'Tasks Using Resource',    
    'LBL_FILTER_DATE_RANGE' => 'Tasks in Date Range', 
    'LBL_FILTER_VIEW' => 'View',
    'LBL_LIST_FILTER_VIEW' => 'View:',
    'LBL_FILTER_DATE_RANGE_START' => 'Tasks that Start or Finish After', 
    'LBL_FILTER_DATE_RANGE_FINISH' => 'And Before', 
    'LBL_FILTER_MY_TASKS' => 'My Tasks',    
    'LBL_FILTER_MY_OVERDUE_TASKS' => 'My Overdue Tasks',    
    'LBL_FILTER_MY_UPCOMING_TASKS' => 'My Upcoming Tasks (1 Week)',    

/*
    * Tasks that fall within a date range
    * Tasks using a specified resource     
  */   
    'LBL_CUT_BUTTON' => 'Cut', 
    'LBL_WEEK_BUTTON' => 'Week',
    'LBL_BIWEEK_BUTTON' => '2 Weeks',
    'LBL_MONTH_BUTTON' => 'Month',
    
    'ERR_TASK_NAME_FOR_ROW' => 'Task Name for Row ',
    'ERR_IS_EMPTY' => ' cannot be empty.',   
    'ERR_PERCENT_COMPLETE' => '% Complete must be a value between 0 and 100.',   
    'ERR_DURATION' => 'Duration must be a whole number.',
    'ERR_DATE' => 'Specified date falls on a non-working day.',
    'ERR_FINISH_DATE' => 'Finish date cannot occur before the start date.',
    'ERR_PREDECESSORS_INPUT' => 'Values entered in the Predecessors field must be of the form "1" or "1,2"',
    'ERR_PREDECESSORS_OUT_OF_RANGE' => 'The value specified for the Predecessor field is larger than the number of rows.',   
    'ERR_PREDECESSOR_CYCLE_FAIL' => 'The specified predecessor causes a dependency cycle.',
    'ERR_PREDECESSOR_IS_PARENT_OR_CHILD_FAIL' => 'The specified predecessor is either a parent task or a subtask.', 
    'NTC_DELETE_TASK_AND_SUBTASKS' => 'Are you sure you want to delete this task and all its subtasks?',
    'NTC_NO_ACTIVE_PROJECTS' => 'You do not have any active projects or project tasks.',
    'NTC_ASSIGN_RIGHT_TEAM' => 'Make sure that all project resources are members of this team.',
       
    'LBL_RESOURCE_NAME' => 'Name',
    'LBL_RESOURCE_TYPE' => 'Type',
    
    'LBL_GRID_ONLY' => 'Grid',
    'LBL_GANTT_ONLY' => 'Gantt',
    'LBL_GRID_GANTT' => 'Grid/Gantt',
    
    'LBL_REPORT' => 'Report',
    'LBL_DAILY_REPORT' => 'Daily Report',
    'LBL_DATE' => 'Date',
    'LBL_PROJECT_HOLIDAYS_TITLE' => 'Project Holidays',   
    'LBL_HOLIDAYS_TITLE' => 'Holidays',   
    'LBL_HOLIDAY' => 'Holiday',   
    
    'LBL_PROJECT_TEMPLATE' => 'Project Template',
    'LBL_PROJECT_TEMPLATES_LIST' => 'Project Templates List',
    'LBL_PROJECT_TEMPLATES_TITLE' => 'Project Templates: Home',
    'LBL_IS_TEMPLATE' => 'Is Template',
	'LBL_SAVE_TEMPLATE_BUTTON_TITLE' => 'Save as Template',
    'LBL_SAVE_TEMPLATE_BUTTON_LABEL' => 'Save as Template',
    'LBL_SAVE_AS_PROJECT' => 'Save as Project',
    'LBL_SAVE_AS_TEMPLATE' => 'Save as Template',
    'LBL_SAVE_AS_NEW_PROJECT_BUTTON' => 'Save as New Project',
    'LBL_SAVE_AS_NEW_TEMPLATE_BUTTON' => 'Save as New Template',    
    
    'LBL_TEMPLATE_NAME' => 'Template Name: ',
    'LBL_PROJECT_NAME' => 'Project Name: ',    
    
	'LBL_PROJECT_TEMPLATE_NAME' => 'Template Name: ',    
    
    'LBL_EXPORT_TO_MS_PROJECT' => 'Export to MS Project',
    
    'LBL_POPUP_DATE_START' => 'Start Date: ',
    'LBL_POPUP_DATE_FINISH' => 'Finish Date: ',
    'LBL_POPUP_PERCENT_COMPLETE' => '% Complete: ',
    'LBL_POPUP_RESOURCE_NAME' => 'Resource Name: ',    
    
    'LBL_MY_PROJECTS_DASHBOARD' => 'My Projects Dashboard',
    'LBL_RESOURCE_REPORT' => 'Resource Report',
    
    'LBL_PERSONAL_HOLIDAY' => '-- Personal Holiday --',
    'LBL_OPPORTUNITIES' => 'Opportunities',
	'LBL_LAST_WEEK' => 'Previous',
	'LBL_NEXT_WEEK' => 'Next',
	'LBL_PROJECTRESOURCES_SUBPANEL_TITLE' => 'Project Resources',
	'LBL_PROJECTTASK_SUBPANEL_TITLE' => 'Project Task',
	'LBL_HOLIDAYS_SUBPANEL_TITLE' => 'Holidays',
	'LBL_PROJECT_INFORMATION' => 'Project Overview',
);
?>
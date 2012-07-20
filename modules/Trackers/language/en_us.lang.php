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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array (
		  //Labels for methods in the TrackerReporter.php file that are shown in TrackerDashlet
		  'ShowActiveUsers'      => 'Show Active Users',
		  'ShowLastModifiedRecords' => 'Last 10 Modified Records',
		  'ShowTopUser' => 'Top User',
		  'ShowMyModuleUsage' => 'My Module Usage',
		  'ShowMyWeeklyActivities' => 'My Weekly Activity',
		  'ShowTop3ModulesUsed' => 'My Top 3 Modules Used',
		  'ShowLoggedInUserCount' => 'Active User Count',
		  'ShowMyCumulativeLoggedInTime' => 'My Cumulative Login Time (This Week)',
		  'ShowUsersCumulativeLoggedInTime' => 'Users Cumulative Login Time (This Week)',
		  
		  //Column header mapping
		  'action' => 'Action',
		  'active_users' => 'Active User Count',
		  'date_modified' => 'Date of Last Action',
		  'different_modules_accessed' => 'Number Of Modules Accessed',
		  'first_name' => 'First Name',
		  'item_id' => 'ID',
		  'item_summary' => 'Name',
		  'last_action' => 'Last Action Date/Time',
		  'last_name' => 'Last Name',
		  'module_name' => 'Module Name',
		  'records_modified' => 'Total Records Modified',
		  'top_module' => 'Top Module Accessed',
		  'total_count' => 'Total Page Views',
		  'total_login_time' => 'Time (hh:mm:ss)',
		  'user_name' => 'Username',
		  'users' => 'Users',
		  
		  //Administration related labels
		  'LBL_ENABLE' => 'Enabled',
		  'LBL_MODULE_NAME_TITLE' => 'Trackers',
		  'LBL_MODULE_NAME' => 'Trackers',
		  'LBL_TRACKER_SETTINGS' => 'Tracker Settings',
		  'LBL_TRACKER_QUERIES_DESC' => 'Tracker Queries',
		  'LBL_TRACKER_QUERIES_HELP' => 'Track SQL statements when "Log slow queries" is enabled and the query execution time exceeds the "Slow query time threshold" value',
		  'LBL_TRACKER_PERF_DESC' => 'Tracker Performance',
		  'LBL_TRACKER_PERF_HELP' => 'Track database roundtrips, files accessed and memory usage',
		  'LBL_TRACKER_SESSIONS_DESC' => 'Tracker Sessions',
		  'LBL_TRACKER_SESSIONS_HELP' => 'Track active users and users&rsquo; session information',
		  'LBL_TRACKER_DESC' => 'Tracker Actions',
		  'LBL_TRACKER_HELP' => 'Track user&rsquo;s page views (modules and records accessed) and record saves',
		  'LBL_TRACKER_PRUNE_INTERVAL' => 'Number of days of Tracker data to store when Scheduler prunes the tables',
		  'LBL_TRACKER_PRUNE_RANGE' => 'Number of days',
);
?>
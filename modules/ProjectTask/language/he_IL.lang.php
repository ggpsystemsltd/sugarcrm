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

 



$mod_strings = array (
	'LBL_MODULE_NAME' => 'משימות בפרויקט',
	'LBL_MODULE_TITLE' => 'משימות בפרויקט: דף ראשי',
	'LBL_SEARCH_FORM_TITLE' => 'חיפוש משימות בפרויקט',
	'LBL_LIST_FORM_TITLE'=> 'רשימת משימות בפרויקט',
    'LBL_EDIT_TASK_IN_GRID_TITLE'=> 'ערוך משימשה שברשת',    
	
	'LBL_ID' => 'Id:',
    'LBL_PROJECT_TASK_ID' => 'משימה בפרויקט זהות:',
    'LBL_PROJECT_ID' => 'זהות פרויקט:',
	'LBL_DATE_ENTERED' => 'נוצר בתאריך:',
	'LBL_DATE_MODIFIED' => 'שונה בתאריך:',
	'LBL_ASSIGNED_USER_ID' => 'הוקצה עבור:',
	'LBL_MODIFIED_USER_ID' => 'שונה על ידי משתמש זהות:',
	'LBL_CREATED_BY' => 'נוצר על ידי:',
	'LBL_TEAM_ID' => 'צוות:',
	'LBL_NAME' => 'שם:',
	'LBL_STATUS' => 'סטאטוס:',
	'LBL_DATE_DUE' => 'תאריך תפוגה:',
	'LBL_TIME_DUE' => 'שעת תפוגה:',
    'LBL_RESOURCE' => 'משאב:',
    'LBL_PREDECESSORS' => 'קודמים:',
	'LBL_DATE_START' => 'תאריך התחלה:',
    'LBL_DATE_FINISH' => 'תאריך סיום:',    
	'LBL_TIME_START' => 'שעת התחלה:',
    'LBL_TIME_FINISH' => 'שעת סיום:',
    'LBL_DURATION' => 'משך:',
    'LBL_DURATION_UNIT' => 'יחידות מניה למשך:',
    'LBL_ACTUAL_DURATION' => 'נמשך בפועל:',
	'LBL_PARENT_ID' => 'פרויקט:',
    'LBL_PARENT_TASK_ID' => 'משיצת אב זהות:',    
    'LBL_PERCENT_COMPLETE' => '% שהושלמו:',
	'LBL_PRIORITY' => 'עדיפות:',
	'LBL_DESCRIPTION' => 'תיאור:',
	'LBL_ORDER_NUMBER' => 'הזמנה:',
	'LBL_TASK_NUMBER' => 'משימה מספר:',
    'LBL_TASK_ID' => 'משימה זהות:',
	'LBL_DEPENDS_ON_ID' => 'תלויה ב:',
	'LBL_MILESTONE_FLAG' => 'אבן דרך:',
	'LBL_ESTIMATED_EFFORT' => 'מאמץ נדרש הערכה (בשעות):',
	'LBL_ACTUAL_EFFORT' => 'מאמץ בפועל (בשעות):',
	'LBL_UTILIZATION' => 'ניצול (%):',
	'LBL_DELETED' => 'נמחק:',

	'LBL_LIST_ORDER_NUMBER' => 'הזמנה',
	'LBL_LIST_NAME' => 'שם',
    'LBL_LIST_DAYS' => 'ימים',
	'LBL_LIST_PARENT_NAME' => 'פרויקט',
	'LBL_LIST_PERCENT_COMPLETE' => '% הושלמו',
	'LBL_LIST_STATUS' => 'סטאטוס',
    'LBL_LIST_DURATION' => 'משך',
    'LBL_LIST_ACTUAL_DURATION' => 'נמשך בפועל',
	'LBL_LIST_ASSIGNED_USER_ID' => 'הוקצה עבור',
	'LBL_LIST_DATE_DUE' => 'תאריך תפוגה',
	'LBL_LIST_DATE_START' => 'תאריך התחלה',
    'LBL_LIST_DATE_FINISH' => 'תאריך סיום',    
	'LBL_LIST_PRIORITY' => 'עדיפות',
	'LBL_LIST_CLOSE' => 'סגור',
	'LBL_PROJECT_NAME' => 'שם פרויקט',

	'LNK_NEW_PROJECT'	=> 'צור פרויקט',
	'LNK_PROJECT_LIST'	=> 'רשימת פרויקטים',
	'LNK_NEW_PROJECT_TASK'	=> 'צור משימה בפרויקט',
	'LNK_PROJECT_TASK_LIST'	=> 'משימות בפרויקט',
	
	'LBL_LIST_MY_PROJECT_TASKS' => 'המשימות שלי בפרויקט',
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'משימות בפרויקט',
	'LBL_NEW_FORM_TITLE' => 'משימה חדשה בפרויקט',

	'LBL_ACTIVITIES_TITLE'=>'פעילויות',
	'LBL_HISTORY_TITLE'=>'הסטוריה',
	'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעילויות',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה', 
	'DATE_JS_ERROR' => 'Please enter a date corresponding to the time entered',

    'LBL_ASSIGNED_USER_NAME' => 'הוקצה עבור',
    'LBL_PARENT_NAME' => 'שם פרויקט',
    'LBL_LIST_PROJECT_NAME' => 'פרויקטים',
);
?>


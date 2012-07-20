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
	'LBL_MODULE_NAME' => 'פרויקט',
	'LBL_MODULE_TITLE' => 'פרויקטים: דף ראשי',
	'LBL_SEARCH_FORM_TITLE' => 'חפש פרויקט',
    'LBL_LIST_FORM_TITLE' => 'רשימת פרויקטים',
    'LBL_HISTORY_TITLE' => 'הסטוריה',

	'LBL_ID' => 'Id:',
	'LBL_DATE_ENTERED' => 'נוצר בתאריך:',
	'LBL_DATE_MODIFIED' => 'שונה בתאריך:',
	'LBL_ASSIGNED_USER_ID' => 'הוקצה עבור:',
    'LBL_ASSIGNED_USER_NAME' => 'הוקצה עבור:',
	'LBL_MODIFIED_USER_ID' => 'שונה על ידי משתמש שזהותו:',
	'LBL_CREATED_BY' => 'נוצר על ידי:',
	'LBL_TEAM_ID' => 'צוות:',
	'LBL_NAME' => 'שם:',
    'LBL_PDF_PROJECT_NAME' => 'שם פרויקט:',
	'LBL_DESCRIPTION' => 'תיאור:',
	'LBL_DELETED' => 'נמחק:',
    'LBL_DATE' => 'תאריך:',
	'LBL_DATE_START' => 'תאריך התחלה:',
	'LBL_DATE_END' => 'תאריך סיום:',
	'LBL_PRIORITY' => 'עדיפות:',
    'LBL_STATUS' => 'סטאטוס:',
    'LBL_MY_PROJECTS' => 'הפרויקטים שלי',
    'LBL_MY_PROJECT_TASKS' => 'משימות בפרויקטים שלי',
    
	'LBL_TOTAL_ESTIMATED_EFFORT' => 'סך-בכל מאמץ נדרש (בשעות):',
	'LBL_TOTAL_ACTUAL_EFFORT' => 'סך-הכל מאמץ שהושקע בפועל (בשעות):',

	'LBL_LIST_NAME' => 'שם',
    'LBL_LIST_DAYS' => 'ימים',
	'LBL_LIST_ASSIGNED_USER_ID' => 'הוקצה עבור',
	'LBL_LIST_TOTAL_ESTIMATED_EFFORT' => 'סך-בכל מאמץ נדרש  (בשעות)',
	'LBL_LIST_TOTAL_ACTUAL_EFFORT' => 'סך-בכל מאמץ שהושקע בפועל (בשעות)',
    'LBL_LIST_UPCOMING_TASKS' => 'משימות בקנה (1 שבוע)',
    'LBL_LIST_OVERDUE_TASKS' => 'משימות שהסתיימו',
    'LBL_LIST_OPEN_CASES' => 'אירועים פתוחים',
    'LBL_LIST_END_DATE' => 'תאריך סיום',
    'LBL_LIST_TEAM_ID' => 'צוות',
    

	'LBL_PROJECT_SUBPANEL_TITLE' => 'פרויקטים',
	'LBL_PROJECT_TASK_SUBPANEL_TITLE' => 'משימות בפרויקט',
	'LBL_CONTACT_SUBPANEL_TITLE' => 'אנשי קשר',
	'LBL_ACCOUNT_SUBPANEL_TITLE' => 'חשבונות',
	'LBL_OPPORTUNITY_SUBPANEL_TITLE' => 'הזדמנויות',
	'LBL_QUOTE_SUBPANEL_TITLE' => 'הצעות מחיר',

        'LBL_NEW_FORM_TITLE' => 'הפרויקטים שלי',

	'CONTACT_REMOVE_PROJECT_CONFIRM' => 'אתה בטוח שברצונך להסיר איש קשר זה מהפרויקט?',

	'LNK_NEW_PROJECT'	=> 'צור פרויקט',
	'LNK_PROJECT_LIST'	=> 'צפה ברשימת פרויקטים',
	'LNK_NEW_PROJECT_TASK'	=> 'צור משימה בפרויקט',
	'LNK_PROJECT_TASK_LIST'	=> 'צפה במשימות לפרויקט',
    'LNK_PROJECT_DASHBOARD' => 'צפה בלוח המחונים לפרויקטים שלי',
    'LNK_PROJECT_TASKS_DASHBOARD'   => 'לוח מונים לפרויקט',   
	'LNK_NEW_PROJECT_TEMPLATES' => 'צור תבנית לפרויקט',
	'LNK_PROJECT_TEMPLATES_LIST' => 'צפה בתבניות לפרויקט',
    'LNK_PROJECT_RESOURCE_REPORT' => 'דוח משאבים',
	
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'פרויקטים',
	'LBL_ACTIVITIES_TITLE'=>'פעילויות',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעיליות',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה',
	'LBL_QUICK_NEW_PROJECT'	=> 'פרויקט חדש',
	
	'LBL_PROJECT_TASKS_SUBPANEL_TITLE' => 'משימות בפרויקט',
	'LBL_CONTACTS_SUBPANEL_TITLE' => 'אנשי קשר',
	'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'חשבונות',
	'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'הזדמנויות',
    'LBL_CASES_SUBPANEL_TITLE' => 'אירועים',
    'LBL_BUGS_SUBPANEL_TITLE' => 'באגים',
    'LBL_PRODUCTS_SUBPANEL_TITLE' => 'מוצרים',
    
	'LBL_QUOTES_SUBPANEL_TITLE' => 'הצעות מחיר',
	
	'LBL_RESOURCES_SUBPANEL_TITLE' => 'משאבים',
	'LBL_RESOURCE_NAME' => 'שם משאב',
	'LBL_RESOURCE_TYPE' => 'סוג משאב',

    'LBL_TASK_ID' => 'ID',
    'LBL_TASK_NAME' => 'שם משימה',
    'LBL_DURATION' => 'משך',
    'LBL_ACTUAL_DURATION' => 'משך בפועל',
    'LBL_START' => 'התחלה',
    'LBL_FINISH' => 'סיום',
    'LBL_PREDECESSORS' => 'קודמים',
    'LBL_PERCENT_COMPLETE' => '% שהושלמו',
    'LBL_RESOURCE_NAMES' => 'משאבים',
    'LBL_MORE'  => 'More...',

    'LBL_PERCENT_BUSY' => '% עסוק',
    'LBL_USER_RESOURCE' => 'משאבים למשתמש',
    'LBL_CONTACTS_RESOURCE' => 'משאבים לאיש קשר',
    'LBL_PROJECT_HOLIDAYS' => 'חג',
    'LBL_LIST_RESOURCE' => 'משאב:',
    'LBL_TASK_ID_WIDGET' => 'id',
    'LBL_TASK_NAME_WIDGET' => 'תיאור',
    'LBL_DURATION_WIDGET' => 'משך',
    'LBL_START_WIDGET' => 'תאריך התחלה',
    'LBL_FINISH_WIDGET' => 'תאריך סיום',
    'LBL_PREDECESSORS_WIDGET' => 'קודמים_',
    'LBL_PERCENT_COMPLETE_WIDGET' => 'אחוזים שהושלמו',
    'LBL_RESOURCE_NAMES_WIDGET' => 'משאב',
    'LBL_EDIT_PROJECT_TASKS_TITLE'=> 'ערוך משימות לפרויקט',
    'LBL_VIEW_GANTT_TITLE' => 'צפה בגנט',
    
    'LBL_INSERT_BUTTON' => 'הכנס שורות',
    'LBL_INDENT_BUTTON' => 'הזח פנימה',
    'LBL_OUTDENT_BUTTON' => 'הזח אחוצה',
    'LBL_SAVE_BUTTON' => 'שמור',
    'LBL_COPY_BUTTON' => 'העתק',
    'LBL_PASTE_BUTTON' => 'הדבק',   
    'LBL_DELETE_BUTTON' => 'מחק',  
    'LBL_EXPAND_ALL_BUTTON' => 'הרחב הכל',  
    'LBL_COLLAPSE_ALL_BUTTON' => 'מוטט הכל',  
    'LBL_MARK_AS_MILESTONE_BUTTON' => 'סמן כאבן דרך',
    'LBL_UNMARK_AS_MILESTONE_BUTTON' => 'בטל סימון כאבן דרך',
    'LBL_HIDE_OPTIONAL_COLUMNS_BUTTON' => 'הסתר עמודות אופציונאליות',
    'LBL_SHOW_OPTIONAL_COLUMNS_BUTTON' => 'הצג עמודות אופציונאליות',
    'LBL_VIEW_TASK_DETAILS_BUTTON' => 'הצג פרטי המשימה',
    'LBL_RECALCULATE_DATES_BUTTON' => 'חשב מחדש תאריכים',    
    'LBL_EXPORT_TO_PDF' => 'יצא כ- PDF',
    
    'LBL_FILTER_ALL_TASKS' => 'כל המשימות',  
    'LBL_FILTER_COMPLETED_TASKS' => 'משימות שהושלמו',  
    'LBL_FILTER_INCOMPLETE_TASKS' => 'משימות שטרם הושלמו',  
    'LBL_FILTER_MILESTONES' => 'אבני דרך',  
    'LBL_FILTER_RESOURCE' => 'משימות שמשתמשות במשאבים',    
    'LBL_FILTER_DATE_RANGE' => 'משימות בטווח התאריכים', 
    'LBL_FILTER_VIEW' => 'צפה',
    'LBL_LIST_FILTER_VIEW' => 'צפה:',
    'LBL_FILTER_DATE_RANGE_START' => 'משימות שמתחילות או מסתיימות אחרי', 
    'LBL_FILTER_DATE_RANGE_FINISH' => 'ולפני', 
    'LBL_FILTER_MY_TASKS' => 'המשימות שלי',    
    'LBL_FILTER_MY_OVERDUE_TASKS' => 'משימות שלי שזמנן עבר',    
    'LBL_FILTER_MY_UPCOMING_TASKS' => 'השמישות הבאות שלי (1 שבוע)',    

   
    'LBL_CUT_BUTTON' => 'חתוך', 
    'LBL_WEEK_BUTTON' => 'שבוע',
    'LBL_BIWEEK_BUTTON' => 'שבועיים',
    'LBL_MONTH_BUTTON' => 'חודש',
    
    'ERR_TASK_NAME_FOR_ROW' => 'שם משימה לשורה ',
    'ERR_IS_EMPTY' => ' לא יכול להיות ריק.',   
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
       
    'LBL_RESOURCE_NAME' => 'שם',
    'LBL_RESOURCE_TYPE' => 'סוג',
    
    'LBL_GRID_ONLY' => 'גריד',
    'LBL_GANTT_ONLY' => 'גאנט',
    'LBL_GRID_GANTT' => 'גאנט/גריד',
    
    'LBL_REPORT' => 'דוח',
    'LBL_DAILY_REPORT' => 'דוח יומי',
    'LBL_DATE' => 'תאריך',
    'LBL_PROJECT_HOLIDAYS_TITLE' => 'חופשות במהלך הפרויקט',   
    'LBL_HOLIDAYS_TITLE' => 'חגים',   
    'LBL_HOLIDAY' => 'חופשות',   
    
    'LBL_PROJECT_TEMPLATE' => 'תבנית לפרויקט',
    'LBL_PROJECT_TEMPLATES_LIST' => 'רשימת תבניות לפרויקט',
    'LBL_PROJECT_TEMPLATES_TITLE' => 'תבניות לפרויקט: דף ראשי',
    'LBL_IS_TEMPLATE' => 'זוהי תבנית',
	'LBL_SAVE_TEMPLATE_BUTTON_TITLE' => 'שמור כתבנית',
    'LBL_SAVE_TEMPLATE_BUTTON_LABEL' => 'שמור כתבנית',
    'LBL_SAVE_AS_PROJECT' => 'שמור כפרויקט',
    'LBL_SAVE_AS_TEMPLATE' => 'שמור כתבנית',
    'LBL_SAVE_AS_NEW_PROJECT_BUTTON' => 'שמור כפרויקט חדש',
    'LBL_SAVE_AS_NEW_TEMPLATE_BUTTON' => 'שמור כתבנית חדשה',    
    
    'LBL_TEMPLATE_NAME' => 'שם התבנית: ',
    'LBL_PROJECT_NAME' => 'שם הפרויקט: ',    
    
	'LBL_PROJECT_TEMPLATE_NAME' => 'שם התבנית: ',    
    
    'LBL_EXPORT_TO_MS_PROJECT' => 'ייצא אל MS Project',
    
    'LBL_POPUP_DATE_START' => 'תאריך התחלה: ',
    'LBL_POPUP_DATE_FINISH' => 'תאריך סיום: ',
    'LBL_POPUP_PERCENT_COMPLETE' => '% הושלמו: ',
    'LBL_POPUP_RESOURCE_NAME' => 'שם משאב: ',    
    
    'LBL_MY_PROJECTS_DASHBOARD' => 'לוח מחונים לפרויקטים שלי',
    'LBL_RESOURCE_REPORT' => 'דוח משאבים',
    
    'LBL_PERSONAL_HOLIDAY' => '-- חופשות פרטיות --',
    'LBL_OPPORTUNITIES' => 'הזדמנויות',
	'LBL_LAST_WEEK' => 'הקודם',
	'LBL_NEXT_WEEK' => 'הבא',
	'LBL_PROJECTRESOURCES_SUBPANEL_TITLE' => 'משאבים לפרויקט',
	'LBL_PROJECTTASK_SUBPANEL_TITLE' => 'משימה לפרויקט',
	'LBL_HOLIDAYS_SUBPANEL_TITLE' => 'חגים',
	'LBL_PROJECT_INFORMATION' => 'סקירת פרויקט',
);
?>


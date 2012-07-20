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
  'LBL_MODULE_NAME' => 'פעיליות',
  'LBL_MODULE_TITLE' => 'פעילויות: דף ראשי',
  'LBL_SEARCH_FORM_TITLE' => 'חיפוש פעילויות',
  'LBL_LIST_FORM_TITLE' => 'רשימת פעילויות',
  'LBL_LIST_SUBJECT' => 'נושא',
  'LBL_LIST_CONTACT' => 'איש קשר',
  'LBL_LIST_RELATED_TO' => 'קשור ב',
  'LBL_LIST_DATE' => 'תאריך',
  'LBL_LIST_TIME' => 'זמן התחלה',
  'LBL_LIST_CLOSE' => 'סגור',
  'LBL_SUBJECT' => 'נושא:',
  'LBL_STATUS' => 'סטאטוס:',
  'LBL_LOCATION' => 'מיקום:',
  'LBL_DATE_TIME' => 'תאריך התחלה ושעה:',
  'LBL_DATE' => 'תאריך התחלה:',
  'LBL_TIME' => 'זמן התחלה:',
  'LBL_DURATION' => 'משך:',
  'LBL_DURATION_MINUTES' => 'משך בדקות:',
  'LBL_HOURS_MINS' => '(שעות/דקות)',
  'LBL_CONTACT_NAME' => 'שם איש קשר: ',
  'LBL_MEETING' => 'פגישה:',
  'LBL_DESCRIPTION_INFORMATION' => 'תיאור המידע',
  'LBL_DESCRIPTION' => 'תיאור:',
  'LBL_COLON' => ':',
  'LBL_DEFAULT_STATUS' => 'מתוכנן',
  'LNK_NEW_CALL' => 'יומן שיחה',
  'LNK_NEW_MEETING' => 'תזמן שיחה',
  'LNK_NEW_TASK' => 'צור משימה',
  'LNK_NEW_NOTE' => 'צור פתק או צרופה',
  'LNK_NEW_EMAIL' => 'צור דואר אלקטרוני מאורכב',
  'LNK_CALL_LIST' => 'צפה בתאים',
  'LNK_MEETING_LIST' => 'צפה בפגישות',
  'LNK_TASK_LIST' => 'צפה במשימות',
  'LNK_NOTE_LIST' => 'צפה בפתקים',
  'LNK_EMAIL_LIST' => 'צפייה בדואר אלקטרוני',
  'ERR_DELETE_RECORD' => 'You must specify a record number to delete the account.',
  'NTC_REMOVE_INVITEE' => 'Are you sure you want to remove this invitee from the meeting?',
  'LBL_INVITEE' => 'מוזמנים',
  'LBL_LIST_DIRECTION' => 'כיוון',
  'LBL_DIRECTION' => 'כיוון',
  'LNK_NEW_APPOINTMENT' => 'פגישה חדשה',
  'LNK_VIEW_CALENDAR' => 'צפיה ביומן',
  'LBL_OPEN_ACTIVITIES' => 'פעילויות פתוחות',
  'LBL_HISTORY' => 'הסטוריה',
  'LBL_UPCOMING' => 'הפגישות הקרובות שלי',
  'LBL_TODAY' => 'הושלם ',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'צור משימה [Alt+N]',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'צור משימה',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'תזמן משימה [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'תזמן משימה',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'יומן שיחה [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'יומן שיחה',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'צור פתק או צרופה [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'צור פתק או צרופה',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'ארכב דואר אלקטרוני [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'ארכב דואר אלקטרוני',
  'LBL_LIST_STATUS' => 'סטאטוס',
  'LBL_LIST_DUE_DATE' => 'תאריך סיום',
  'LBL_LIST_LAST_MODIFIED' => 'שונה לאחרונה',
  'NTC_NONE_SCHEDULED' => 'לא מתוזמן.',
  'appointment_filter_dom' => array(
       'today' => 'היום'
      ,'tomorrow' => 'מחר'
      ,'this Saturday' => 'השבוע'
      ,'next Saturday' => 'בשבוע הבא'
      ,'last this_month' => 'החודש'
      ,'last next_month' => 'בחודש הבא'
  ),
  'LNK_IMPORT_CALLS'=>'ייבא שיחות',
  'LNK_IMPORT_MEETINGS'=>'ייבא פגישות',
  'LNK_IMPORT_TASKS'=>'ייבא משימות',
  'LNK_IMPORT_NOTES'=>'ייבא פתקים',
  'NTC_NONE'=>'כלום',
  'LBL_ACCEPT_THIS'=>'לקבל?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'פתח פעילויות',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'משתמש שהוקצה',
);


?>

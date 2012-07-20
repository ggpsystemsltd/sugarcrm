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
 /*********************************************************************************
 * Hebrew vertion by:
 * Menahem Lurie Consultancy and IT Management,SugarCRM partner - Israel
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * *******************************************************************************/
 
 $mod_strings = array (
  'LBL_MODULE_NAME' => 'מכירה',
  'LBL_MODULE_TITLE' => 'מכירה: דף הבית',
  'LBL_SEARCH_FORM_TITLE' => 'חפש מכירה',
  'LBL_VIEW_FORM_TITLE' => 'צפה המכירה',
  'LBL_LIST_FORM_TITLE' => 'רשימת מכירות',
  'LBL_SALE_NAME' => 'שם מכירה:',
  'LBL_SALE' => 'מכירה:',
  'LBL_NAME' => 'שם מכירה',
  'LBL_LIST_SALE_NAME' => 'שם',
  'LBL_LIST_ACCOUNT_NAME' => 'שם חשבון',
  'LBL_LIST_AMOUNT' => 'סכום',
  'LBL_LIST_DATE_CLOSED' => 'סגור',
  'LBL_LIST_SALE_STAGE' => 'שלב במכירות',
  'LBL_ACCOUNT_ID'=>'חשבון ID',
   'LBL_CURRENCY_ID'=>'מטבע ID',
  'LBL_TEAM_ID' =>'צוות ID',
//DON'T CONVERT THESE THEY ARE MAPPINGS
  'db_sales_stage' => 'LBL_LIST_SALES_STAGE',
  'db_name' => 'LBL_NAME',
  'db_amount' => 'LBL_LIST_AMOUNT',
  'db_date_closed' => 'LBL_LIST_DATE_CLOSED',
//END DON'T CONVERT
  'UPDATE' => 'מכירה - עדכון מטבע',
  'UPDATE_DOLLARAMOUNTS' => 'עדכן סכומים בשקלים חדשים',
  'UPDATE_VERIFY' => 'וודא סכומים',
  'UPDATE_VERIFY_TXT' => 'וודא שהסכומים במכירה מכילים ספרות בלבד(0-9) וחלקי שקל מופרשים ב(.)',
  'UPDATE_FIX' => 'סכומים קבועים',
  'UPDATE_FIX_TXT' => 'נסיון לתקן סכום שאיננו חוקי על ידי הכנסת מספרים חוקיים לסכום הכספי. כל סכון שישונה יגובה סמסד הנתונים של המערכת. אם הרצת את התיקון ונתקלת בבאג אל תתעקש להמשיך כי המידע השגוי יאוחסן במנגנון הגבוי של מסד הנתונים ויפריע בהמשך - פנה למנהל המערכת.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'עדכן את סכון המכירה בדולרים בהתבסס על שער החליפין שהוזן למערכת. ערך זה בשימושם של גרפים שמציגים שער שקל ושער דולר על בסיס שער החליפין שהוזן למערכת.',
  'UPDATE_CREATE_CURRENCY' => 'צור מטבע חדש:',
  'UPDATE_VERIFY_FAIL' => 'אימות הרשומה נכשל:',
  'UPDATE_VERIFY_CURAMOUNT' => 'הסכום הנוכחי:',
  'UPDATE_VERIFY_FIX' => 'הרצת תיקון תסתיים ב',
  'UPDATE_INCLUDE_CLOSE' => 'כלול רשומות סגורות',
  'UPDATE_VERIFY_NEWAMOUNT' => 'סכום חדש:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'מטבע חדש:',
  'UPDATE_DONE' => 'בוצע',
  'UPDATE_BUG_COUNT' => 'נמצא באג מנסה להתגבר עליו:',
  'UPDATE_BUGFOUND_COUNT' => 'באגים נמצאו:',
  'UPDATE_COUNT' => 'רשומות שעודכנו:',
  'UPDATE_RESTORE_COUNT' => 'סכומים ברשומה שאוחזרו:',
  'UPDATE_RESTORE' => 'אחזר סכומים',
  'UPDATE_RESTORE_TXT' => 'אחזר ערכים לסכומים מגבוי שבוצע תוך כדי תיקון.',
  'UPDATE_FAIL' => 'לא מצליח לעדכן - ',
  'UPDATE_NULL_VALUE' => 'הסכון איננו תקף מחזיר אותו ל 0 -',
  'UPDATE_MERGE' => 'אחד מטבעות',
  'UPDATE_MERGE_TXT' => 'אחד מטבעות כפולות למטבע אחד. אם ישנן רשומות כפולות לאותו מטבע, תאחד אותם לאחד. האיחוד ישפיע על מטבעות במודולים אחרים.',
  'LBL_ACCOUNT_NAME' => 'שם חשבון:',
  'LBL_AMOUNT' => 'סכום:',
  'LBL_AMOUNT_USDOLLAR' => 'סכום ב USD:',
  'LBL_CURRENCY' => 'מטבע:',
  'LBL_DATE_CLOSED' => 'תאריך סגירה צפוי:',
  'LBL_TYPE' => 'סוג:',
  'LBL_CAMPAIGN' => 'קמפיין:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'לידים',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'פרויקטים',  
  'LBL_NEXT_STEP' => 'השלב הבא:',
  'LBL_LEAD_SOURCE' => 'מקור הליד:',
  'LBL_SALES_STAGE' => 'שלב במכירות:',
  'LBL_PROBABILITY' => 'הסתברות (%):',
  'LBL_DESCRIPTION' => 'תיאור:',
  'LBL_DUPLICATE' => 'ככל הנראה מכירה כפולה',
  'MSG_DUPLICATE' => 'המכירה שאתה עומד לעשות היא מכירה כפולה של מכירה שכבר קיימת. ישנה מכירה בשם זהה והיא רשומה מטה.<br>הקש על שמירה כדי לשמור המכירה או ביטול וחזרה למודול ללא שינויים.',
  'LBL_NEW_FORM_TITLE' => 'צור מכירה',
  'LNK_NEW_SALE' => 'צור מכירה',
  'LNK_SALE_LIST' => 'מכירה',
  'ERR_DELETE_RECORD' => 'למחיקת המכירה הזו עליך לציין מספר רשומה.',
  'LBL_TOP_SALES' => 'המכיאות העליונות שלי',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'אתה בטוח שברצונך למחוק איש קשר זה ממכירה זו?',
	'SALE_REMOVE_PROJECT_CONFIRM' => 'אתה טוח שברצונך למחוק מכירה זו מהפרוייקט?',
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'מכירה',
	'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעילויות',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה',
    'LBL_RAW_AMOUNT'=>'סכום גלמי',


    'LBL_CONTACTS_SUBPANEL_TITLE' => 'אנשי קשר',
	'LBL_ASSIGNED_TO_NAME' => 'משתמש:',
	'LBL_LIST_ASSIGNED_TO_NAME' => 'משתמש שהוקצה',
  'LBL_MY_CLOSED_SALES' => 'המכירות הסגורות שלי',
  'LBL_TOTAL_SALES' => 'סך-בכל מכירות',
  'LBL_CLOSED_WON_SALES' => 'מכירות שנסגרו בהצלחה',
  'LBL_ASSIGNED_TO_ID' =>'הוקצה עבור ID',
  'LBL_CREATED_ID'=>'נוצר על ידי ID',
  'LBL_MODIFIED_ID'=>'שונה על ידי ID',
  'LBL_MODIFIED_NAME'=>'שונה על ידי משתמש ששמו',
  'LBL_SALE_INFORMATION'=>'מידע כל המכירה',
  'LBL_CURRENCY_ID'=>'מטבע ID',
  'LBL_CURRENCY_NAME'=>'שם מטבע',
  'LBL_CURRENCY_SYMBOL'=>'סימול מטבע',

);

?>



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
  'LBL_MODULE_NAME' => 'עובדים',
  'LBL_MODULE_TITLE' => 'עובדים: דף ראשי',
  'LBL_SEARCH_FORM_TITLE' => 'חפש עובד',
  'LBL_LIST_FORM_TITLE' => 'עובדים',
  'LBL_NEW_FORM_TITLE' => 'עובד חדש',
  'LBL_EMPLOYEE' => 'עובדים:',
  'LBL_LOGIN' => 'לוגאין',
  'LBL_RESET_PREFERENCES' => 'אתחל להעדפות שבברירת המחדל',
  'LBL_TIME_FORMAT' => 'פורמט זמן:',
  'LBL_DATE_FORMAT' => 'פורמט תאריך:',
  'LBL_TIMEZONE' => 'השעה כרגע:',
  'LBL_CURRENCY' => 'מטבע:',
  'LBL_LIST_NAME' => 'שם',
  'LBL_LIST_LAST_NAME' => 'שם משפחה',
  'LBL_LIST_EMPLOYEE_NAME' => 'שם עובד',
  'LBL_LIST_DEPARTMENT' => 'מחלקה',
  'LBL_LIST_REPORTS_TO_NAME' => 'מדווח של',
  'LBL_LIST_EMAIL' => 'דואר אלקטרוני',
  'LBL_LIST_PRIMARY_PHONE' => 'טלפון ראשי',
  'LBL_LIST_USER_NAME' => 'שם משתמש',
  'LBL_LIST_ADMIN' => 'Admin',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'עובד חדש [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'עובד חדש',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_ERROR' => 'שגיאה:',
  'LBL_PASSWORD' => 'סיסמא:',
  'LBL_EMPLOYEE_NAME' => 'שם עובד:',
  'LBL_USER_NAME' => 'שם משתמש:',
  'LBL_FIRST_NAME' => 'שם פרטי:',
  'LBL_LAST_NAME' => 'שם משפחה:',
  'LBL_EMPLOYEE_SETTINGS' => 'הגדרות עובד',
  'LBL_THEME' => 'ערכת נושא:',
  'LBL_LANGUAGE' => 'שפה:',
  'LBL_ADMIN' => 'Administrator:',
  'LBL_EMPLOYEE_INFORMATION' => 'מידע על עובד',
  'LBL_OFFICE_PHONE' => 'טלפון במשרד:',
  'LBL_REPORTS_TO' => 'זהות מדווח אל:',
  'LBL_REPORTS_TO_NAME' => 'מדווח אל',
  'LBL_OTHER_PHONE' => 'אחר:',
  'LBL_OTHER_EMAIL' => 'דואר אלקטרוני אחר:',
  'LBL_NOTES' => 'פתקים:',
  'LBL_DEPARTMENT' => 'מחלקה:',
  'LBL_TITLE' => 'תואר:',
  'LBL_ANY_ADDRESS' => 'כתובת כלשהי:',
  'LBL_ANY_PHONE' => 'טלפון כלשהו:',
  'LBL_ANY_EMAIL' => 'הדור האלקטרוני שלי:',
  'LBL_ADDRESS' => 'כתובת:',
  'LBL_CITY' => 'עיר:',
  'LBL_STATE' => 'מדינה:',
  'LBL_POSTAL_CODE' => 'מיקוד:',
  'LBL_COUNTRY' => 'מחוז:',
  'LBL_NAME' => 'שם:',
  'LBL_MOBILE_PHONE' => 'טלפון נייד:',
  'LBL_OTHER' => 'אחר:',
  'LBL_FAX' => 'פקס:',
  'LBL_EMAIL' => 'תובת דואר אלקטרוני:',
  'LBL_HOME_PHONE' => 'טלפון בבית:',
  'LBL_WORK_PHONE' => 'טלפון בעבודה:',
  'LBL_ADDRESS_INFORMATION' => 'מידע על הכתובת',
  'LBL_EMPLOYEE_STATUS' => 'סטאטוס עובד:',
  'LBL_PRIMARY_ADDRESS' => 'כתובת ראשית:',
  'LBL_SAVED_SEARCH' => 'אפשרויות סידור',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'צור משתמש [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'צור משתמש',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_FAVORITE_COLOR' => 'צבע אהוב:',
  'LBL_MESSENGER_ID' => 'IM שם:',
  'LBL_MESSENGER_TYPE' => 'IM סוג:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'שם העובד ',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => ' כבר קיים.  אין אפשרות לשם עובד כפןל.  שנה שם העובד לערך ייחודי.',
  'ERR_LAST_ADMIN_1' => 'The employee name "',
  'ERR_LAST_ADMIN_2' => '" הוא העובד האחרון שלו הרשאות אדמיניסטרציה.  At least one employee must be an administrator.',
  'LNK_NEW_EMPLOYEE' => 'צור עובד',
  'LNK_EMPLOYEE_LIST' => 'צפייה ',
  'ERR_DELETE_RECORD' => 'למחיקת הרשומה עליך לציין שם.',
  'LBL_DEFAULT_TEAM' => 'צוות ברירת מחדל:',
  'LBL_DEFAULT_TEAM_TEXT' => 'בחר צוות אחר עבור התרומות שלך',
  'LBL_MY_TEAMS' => 'הצוותים שלי',
  'LBL_LIST_DESCRIPTION' => 'תיאור',
  'LNK_EDIT_TABS'=>'ערוך טאב',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Are you sure you want to remove this employee\\\'s membership?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'מצב עובד',

  'LBL_SUGAR_LOGIN' => 'הוא משתמש רשום במערכת',  
  'LBL_RECEIVE_NOTIFICATIONS' => 'הודעה יחד עם ההקצעה',  
  'LBL_IS_ADMIN' => 'מדובר במנהל המערכת',  
  'LBL_GROUP' => 'קבוצת משתמשים',
  'LBL_PORTAL_ONLY'	=> 'Portal Only User',
  'LBL_PHOTO'	=> 'תמונות',
);


?>

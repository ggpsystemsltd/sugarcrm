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
global $sugar_config;
 
$mod_strings = array (
// OOTB Scheduler Job Names:
'LBL_OOTB_WORKFLOW'		=> 'עבד משימות וורקפלו',
'LBL_OOTB_REPORTS'		=> 'הרץ יצור דוחות מתוזמן',
'LBL_OOTB_IE'			=> 'בוק תיבות דואר נכנס',
'LBL_OOTB_BOUNCE'		=> 'אבד משימות ריצת דואר יוצא ליליות',
'LBL_OOTB_CAMPAIGN'		=> 'הרץ קמפיין מייל לילי',
'LBL_OOTB_PRUNE'		=> 'קצץ מסד נתונים בראשון לכל חודש',
'LBL_OOTB_TRACKER'		=> 'קצץ טבלאות גששים',
'LBL_UPDATE_TRACKER_SESSIONS' => 'עדכן טבלת משימות לגששים',

// List Labels
'LBL_LIST_JOB_INTERVAL' => 'מרווחים:',
'LBL_LIST_LIST_ORDER' => 'תיזמונים:',
'LBL_LIST_NAME' => 'תזמן:',
'LBL_LIST_RANGE' => 'טווח:',
'LBL_LIST_REMOVE' => 'הסר:',
'LBL_LIST_STATUS' => 'סטאטוס:',
'LBL_LIST_TITLE' => 'רשימת תיזמונים:',
'LBL_LIST_EXECUTE_TIME' => 'ירוץ ב:',
// human readable:
'LBL_SUN'		=> 'ראשון',
'LBL_MON'		=> 'שני',
'LBL_TUE'		=> 'שלישי',
'LBL_WED'		=> 'רביעי',
'LBL_THU'		=> 'חמישי',
'LBL_FRI'		=> 'שישי',
'LBL_SAT'		=> 'שבת',
'LBL_ALL'		=> 'כל יום',
'LBL_EVERY_DAY'	=> 'כל יום ',
'LBL_AT_THE'	=> 'ב ',
'LBL_EVERY'		=> 'כל ',
'LBL_FROM'		=> 'מ ',
'LBL_ON_THE'	=> 'על ',
'LBL_RANGE'		=> ' אל ',
'LBL_AT' 		=> ' ב ',
'LBL_IN'		=> ' בתוך ',
'LBL_AND'		=> ' וגם ',
'LBL_MINUTES'	=> ' דקות ',
'LBL_HOUR'		=> ' שעות',
'LBL_HOUR_SING'	=> ' שעה',
'LBL_MONTH'		=> ' חודש',
'LBL_OFTEN'		=> ' ברגע שיתאפשר.',
'LBL_MIN_MARK'	=> ' יפעל במשך דקות',


// crontabs
'LBL_MINS' => 'דקות',
'LBL_HOURS' => 'שעות',
'LBL_DAY_OF_MONTH' => 'תאריך',
'LBL_MONTHS' => 'חודש',
'LBL_DAY_OF_WEEK' => 'יום',
'LBL_CRONTAB_EXAMPLES' => 'The above uses standard crontab notation.',
// Labels
'LBL_ALWAYS' => 'תמיד',
'LBL_CATCH_UP' => 'יבוצע עם פיספס',
'LBL_CATCH_UP_WARNING' => 'בטל סימון אם גוב זה יארך יותר מרגע אחד.',
'LBL_DATE_TIME_END' => 'מסתיים בתאריך ובשעה',
'LBL_DATE_TIME_START' => 'מתחיל בתאריך ובשעה',
'LBL_INTERVAL' => 'מרווח',
'LBL_JOB' => 'גוב',
'LBL_LAST_RUN' => 'ריצה מוצלחת אחרונה',
'LBL_MODULE_NAME' => 'שוגר בתמשן של',
'LBL_MODULE_TITLE' => 'מתזמנים',
'LBL_NAME' => 'שם הגוב',
'LBL_NEVER' => 'מעולם',
'LBL_NEW_FORM_TITLE' => 'תיזמון חדש',
'LBL_PERENNIAL' => 'תמידי',
'LBL_SEARCH_FORM_TITLE' => 'חפש תיזמון',
'LBL_SCHEDULER' => 'תזמן:',
'LBL_STATUS' => 'סטאטוס',
'LBL_TIME_FROM' => 'פעיל מאז',
'LBL_TIME_TO' => 'פעיל אל',
'LBL_WARN_CURL_TITLE' => 'cURL הזהרת:',
'LBL_WARN_CURL' => 'אזהרה:',
'LBL_WARN_NO_CURL' => 'This system does not have the cURL libraries enabled/compiled into the PHP module (--with-curl=/path/to/curl_library).  Please contact your administrator to resolve this issue.  Without the cURL functionality, the Scheduler cannot thread its jobs.',
'LBL_BASIC_OPTIONS' => 'מבנה בסיסי',
'LBL_ADV_OPTIONS'		=> 'אפשרויות מתקדמות',
'LBL_TOGGLE_ADV' => 'הצג אפשרויות מתקדמות',
'LBL_TOGGLE_BASIC' => 'הצג אפשרויות בסיסיות',
// Links
'LNK_LIST_SCHEDULER' => 'מתזמנים',
'LNK_NEW_SCHEDULER' => 'צור תיזמון',
'LNK_LIST_SCHEDULED' => 'עבודות מתוזמנות',
// Messages
'SOCK_GREETING' => "\nThis is the interface for SugarCRM Schedulers Service. \n[ Available daemon commands: start|restart|shutdown|status ]\nTo quit, type 'quit'.  To shutdown the service 'shutdown'.\n",
'ERR_DELETE_RECORD' => 'למחיקת תיזמון עליך לספק מספר רשומה.',
'ERR_CRON_SYNTAX' => 'לא תקין Cron סינטקסט',
'NTC_DELETE_CONFIRMATION' => 'אתה בטוח שברצונך למחוק רשומה זו?',
'NTC_STATUS' => 'הפוך סטאטוס של המשימה לביצוע ללא זמין על מנת למחוק את המשימה מהתפריט הנגלל',
'NTC_LIST_ORDER' => 'קבע את הסדר שבו תופיע משימה זו בתפריט הנגלל',
'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'לכוון את המתשמן של חלונות',
'LBL_CRON_INSTRUCTIONS_LINUX' => 'לכוון תיזמון Crontab',
'LBL_CRON_LINUX_DESC' => 'Note: In order to run Sugar Schedulers, add the following line to the crontab file: ',
'LBL_CRON_WINDOWS_DESC' => 'Note: In order to run the Sugar schedulers, create a batch file to run using Windows Scheduled Tasks. The batch file should include the following commands: ',
'LBL_NO_PHP_CLI' => 'If your host does not have the PHP binary available, you can use wget or curl to launch your Jobs.<br>for wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose '.$sugar_config['site_url'].'/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent '.$sugar_config['site_url'].'/cron.php > /dev/null 2>&1', 
// Subpanels
'LBL_JOBS_SUBPANEL_TITLE'	=> 'יומן גובים',
'LBL_EXECUTE_TIME'			=> 'זמן ביצוע',

//jobstrings
'LBL_REFRESHJOBS' => 'רענן גובים',
'LBL_POLLMONITOREDINBOXES' => 'בדוק חשבונות דואר נכנס',
'LBL_RUNMASSEMAILCAMPAIGN' => 'הרץ קמפיין דואר אלקטרוני לילי',
'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'הרץ תהליך שידור דואר להודעות שחזרו כל לילה',
'LBL_PRUNEDATABASE' => 'קצץ מסד נתונים בראשון לכל חודש',
'LBL_TRIMTRACKER' => 'קצץ טבלאות גששים',
'LBL_PROCESSWORKFLOW' => 'עבד משימות ליליות לוורפלו',
'LBL_PROCESSQUEUE' => 'הרץ מחולל דוחות למשימות מתוזמנות',
'LBL_UPDATETRACKERSESSIONS' => 'עדכן טבלאות גששים',

);
?>



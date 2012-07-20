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
  'LBL_MODULE_NAME' => 'דף הבית',
  'LBL_MODULES_TO_SEARCH' => 'מודולים לחיפוש',
  'LBL_NEW_FORM_TITLE' => 'איש קשר חדש',
  'LBL_FIRST_NAME' => 'שם פרטי:',
  'LBL_LAST_NAME' => 'שם משפחה:',
  'LBL_LIST_LAST_NAME' => 'שם משפחה',
  'LBL_PHONE' => 'טלפון:',
  'LBL_EMAIL_ADDRESS' => 'כתובת דואר אלקטרוני:',
  'LBL_MY_PIPELINE_FORM_TITLE' => 'הדוחות שלי',
  'LBL_PIPELINE_FORM_TITLE' => 'הדוחות שלי לפי שלב במכירות',
  'LBL_CAMPAIGN_ROI_FORM_TITLE' => 'החזר השקעה בקמפיין',
  'LBL_MY_CLOSED_OPPORTUNITIES_GAUGE' => 'מונה הזדמנויות שלי שנסגרו בהצלחה',
  'LNK_NEW_CONTACT' => 'צור איש קשר',
  'LNK_NEW_ACCOUNT' => 'צור חשבון',
  'LNK_NEW_OPPORTUNITY' => 'צור הזדמנות',
  'LNK_NEW_QUOTE' => 'צור הצעת מחיר',
  'LNK_NEW_LEAD' => 'צור ליד',
  'LNK_NEW_CASE' => 'צור אירוע',
  'LNK_NEW_NOTE' => 'צור פתק או צרופה',
  'LNK_NEW_CALL' => 'שיחת טלפון חדשה',
  'LNK_NEW_EMAIL' => 'ארכב דואר אלקטרוני',
  'LNK_COMPOSE_EMAIL' => 'חבר הודעת דואר אלקטרוהי',
  'LNK_NEW_MEETING' => 'תזמן שיחה',
  'LNK_NEW_TASK' => 'צור משימה',
  'LNK_NEW_BUG' => 'דווח על באג',
  'LBL_ADD_BUSINESSCARD' => 'הזן כרטיס ביקור',
  'ERR_ONE_CHAR' => 'אנא הזן אות או מספר כדי לבצע חיפוש ...',
  'LBL_OPEN_TASKS' => 'המשימות הפתוחות שלי',
  'LBL_SEARCH_RESULTS' => 'תוצאות חיפוש',
  'LBL_SEARCH_RESULTS_IN' => 'בתוך',
  'LNK_NEW_SEND_EMAIL' => 'חבר הודעת דואר אלקטרוני',
  'LBL_NO_ACCESS' => 'איך לך הרשאה לגשת לאזור זה.  צור קשר עם מנהל האתר על מנת לקבל גישה לאזור זה',
  'LBL_NO_RESULTS_IN_MODULE' => '-- אין תוצאות --',
  'LBL_NO_RESULTS' => '<h2>לא נמצאו תוצאות.בצע י חיפוש מחדש.</h2><br>',
  'LBL_NO_RESULTS_TIPS' => '<h3>Search Tips:</h3><ul><li>Make sure you have the proper categories selected above.</li><li>Broaden your search criteria.</li><li>If you still cannot find any results try the advanced search option.</li></ul>',

  'LBL_RELOAD_PAGE' => 'Please <a href="javascript: window.location.reload()">reload the window</a> to use this Sugar Dashlet.',
  'LBL_ADD_DASHLETS' => 'הוסף תאסופיות',
  'LBL_ADD_PAGE' => 'הוסף עמוד',
  'LBL_DEL_PAGE' => 'מחק עמוד',
  'LBL_WEBSITE_TITLE' => 'אתר אינטרנט',
  'LBL_RSS_TITLE' => 'News Feed',
  'LBL_DELETE_PAGE' => 'מחק עמוד',
  'LBL_CHANGE_LAYOUT' => 'שנה תצורה',
  'LBL_RENAME_PAGE' => 'שנה שם עמוד',
  'LBL_CLOSE_DASHLETS' => 'סגור',
  'LBL_CLOSE_SITEMAP' => 'סגור',
  'LBL_OPTIONS' => 'אפשרויות',
    'LBL_TODAY'=>'היום',
  'LBL_YESTERDAY' => 'אתמול',
  'LBL_TOMORROW'=>'מחר',
  'LBL_LAST_WEEK'=>'בשבוע שעבר',
  'LBL_NEXT_WEEK'=>'בשבוע הבא',
  'LBL_LAST_7_DAYS'=>'בשבעת הימים האחרונים',
  'LBL_NEXT_7_DAYS'=>'בשבעת הימים הבאים',
  'LBL_LAST_MONTH'=>'בחודש שעבר',
  'LBL_NEXT_MONTH'=>'בחודש הבא',
  'LBL_LAST_QUARTER'=>'ברבעון האחרון',
  'LBL_THIS_QUARTER'=>'ברבעון הנכחי',
  'LBL_LAST_YEAR'=>'בשנה האחרונה',
  'LBL_NEXT_YEAR'=>'בשנה הבאה',
  'LBL_LAST_30_DAYS' => 'בשלושים הימים האחרונים',
  'LBL_NEXT_30_DAYS' => 'בשלושים הימים הבאים',
  'LBL_THIS_MONTH' => 'החודש',
  'LBL_THIS_YEAR' => 'השנה',

  'LBL_MODULES' => 'מודולים',
  'LBL_CHARTS' => 'טבלאות',
  'LBL_TOOLS' => 'כלים',
  'LBL_WEB' => 'ווב',
  'LBL_SEARCH_RESULTS' => 'תוצאות החיפוש',

    'dashlet_categories_dom' => array(
      'Module Views' => 'צפייה במודולים',
      'Portal' => 'פורטל',
      'Charts' => 'טבלאות',
      'Tools' => 'כלים',
      'Miscellaneous' => 'שונות'),
  'LBL_MAX_DASHLETS_REACHED' => 'You have reached the maximum number of Sugar Dashlets your administrator has set. Please remove a Sugar Dashlet to add a new one.',
  'LBL_ADDING_DASHLET' => 'מוסיף תאסופית ...',
  'LBL_ADDED_DASHLET' => 'נוספה תאסופית בהצלחה',
  'LBL_REMOVE_DASHLET_CONFIRM' => 'אתה בטוח שברצונך להסיר תאסופית זו?',
  'LBL_REMOVING_DASHLET' => 'מסיר תאסופית ...',
  'LBL_REMOVED_DASHLET' => 'התאסופית הוסרה',
  'LBL_DASHLET_CONFIGURE_GENERAL' => 'כללי',
  'LBL_DASHLET_CONFIGURE_FILTERS' => 'פילטרים',
  'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY' => 'רק הפריטים שלי',
  'LBL_DASHLET_CONFIGURE_TITLE' => 'כותרת',
  'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS' => 'הצג שורות',

  'LBL_DASHLET_DELETE' => 'מוחק תאסופית',
  'LBL_DASHLET_REFRESH' => 'מרענן תאסופית',
  'LBL_DASHLET_EDIT' => 'ערוך תאסופית',

  'LBL_TRAINING_TITLE' => 'הדרכה',

  'LBL_CREATING_NEW_PAGE' => 'יוצר עמוד חדש...',
  'LBL_NEW_PAGE_FEEDBACK' => 'יצרת עמוד חדש. עכשיו אתה ייכול להוסיף תוכן חדש באמצעות הוספת תאסופיות.',
  'LBL_DELETE_PAGE_CONFIRM' => 'אתה בטוח שברצונך למחוק עמוד זה?',
  'LBL_SAVING_PAGE_TITLE' => 'שומר כותרת העמוד...',
  'LBL_RETRIEVING_PAGE' => 'מאחזר עמוד...',

    'LBL_HOME_PAGE_1_NAME' => 'My Sugar',
  'LBL_HOME_PAGE_2_NAME' => 'מכירות',
  'LBL_HOME_PAGE_3_NAME' => 'תמיכה',
  'LBL_HOME_PAGE_6_NAME' => 'שיווק',  'LBL_HOME_PAGE_4_NAME' => 'גשש',
  'LBL_CLOSE_SITEMAP' =>'סגור',

  'LBL_SEARCH' => 'חפש',
  'LBL_CLEAR' => 'נקה',

  'LBL_BASIC_CHARTS' => 'טבלה בסיסית',
  'LBL_REPORT_CHARTS' => 'טבלאות דיווח',

  'LBL_MY_FAVORITE_REPORT_CHARTS' => 'הדוחות המועדפים שלי',
  'LBL_GLOBAL_REPORT_CHARTS' => 'דוחות כללים על צוותים',
  'LBL_MY_TEAM_REPORT_CHARTS' => 'דוחות של הצוות שלי',
  'LBL_MY_SAVED_REPORT_CHARTS' => 'הדוחות השמורים שלי',

  'LBL_DASHLET_SEARCH' => 'מצא תאסופית',

  'LBL_VERSION' => 'Version',
  'LBL_BUILD' => 'Build',

 
  'LBL_SUGAR_COMMUNITY_EDITION' => 'Sugar Community Edition',
  'LBL_SUGAR_PROFESSIONAL' => "Sugar Professional",
  'LBL_SUGAR_ENTERPRISE' => "Sugar Enterprise",
  'LBL_AND' => "and",
  'LBL_ARE' => "are",
  'LBL_TRADEMARKS' => 'trademarks',
  'LBL_OF' => 'of',
  'LBL_FOUNDERS' => 'Founders',
  'LBL_JOIN_SUGAR_COMMUNITY' => 'Join the Sugar Community',
  'LBL_DETAILS_SUGARFORGE' => 'Collaborate and develop Sugar extensions',
  'LBL_DETAILS_SUGAREXCHANGE' => 'Buy and sell certified Sugar extensions',
  'LBL_TRAINING' => 'הדרכה',
  'LBL_DETAILS_TRAINING' => 'Learn about Sugar using online and interactive learning content',
  'LBL_FORUMS' => 'פורומים',
  'LBL_DETAILS_FORUMS' => 'Discuss Sugar with expert community users and developers',
  'LBL_WIKI' => 'ויקי',
  'LBL_DETAILS_WIKI' => 'Search the knowledge base of user and developer topics',
  'LBL_DEVSITE' => 'Developer Site',
  'LBL_DETAILS_DEVSITE' => 'Discover resources, tutorials, and helpful links to get you up to speed on Sugar development',
  'LBL_GET_SUGARCRM_RSS' => 'Get SugarCRM RSS',
  'LBL_SUGARCRM_NEWS' => 'SugarCRM News',
  'LBL_SUGARCRM_TRAINING_NEWS' => 'SugarCRM Training News',
  'LBL_SUGARCRM_FORUMS' => 'SugarCRM Forums',
  'LBL_SUGARFORGE_NEWS' => 'SugarForge News',
  'LBL_ALL_NEWS' => 'All News',
  'LBL_LINK_CURRENT_CONTRIBUTORS' => 'Click this link for a current list of Sugar contributors!',
  'LBL_SOURCE_CODE' => 'Source Code',
  'LBL_SOURCE_SUGAR' => 'Sugar - The world\'s most popular sales force automation application created by SugarCRM Inc.',
  'LBL_SOURCE_XTEMPLATE' => 'XTemplate - A template engine for PHP created by Barnabás Debreceni',
  'LBL_SOURCE_NUSOAP' => 'NuSOAP - A set of PHP classes that allow developers to create and consume web services created by NuSphere Corporation and Dietrich Ayala',
  'LBL_SOURCE_JSCALENDAR' => 'JS Calendar - A calendar for entering dates created by Mihai Bazon',
  'LBL_SOURCE_PHPPDF' => 'PHP PDF - A library for creating PDF documents created by Wayne Munro',
  'LBL_SOURCE_PNGBEHAVIOR' => 'PNG Behavior - Adds support for PNG graphic format to Internet Explorer.',
  'LBL_SOURCE_JSONPHP' => 'JSON.php - A PHP script to convert to and from JSON data format by Michal Migurski.',
  'LBL_SOURCE_JSON' => 'JSON.js - A JSON parser and JSON stringifier in JavaScript.',
  'LBL_SOURCE_HTTP_WEBDAV_SERVER' => 'HTTP_WebDAV_Server - A WebDAV Server Implementation in PHP.',
  'LBL_SOURCE_JS_O_LAIT' => 'JavaScript O Lait - A library of reusable modules and components to enhance JavaScript by Jan-Klaas Kollhof.',
  'LBL_SOURCE_PCLZIP' => 'PclZip - library offers compression and extraction functions for Zip formatted archives by Vincent Blavet',
  'LBL_SOURCE_SMARTY' => 'Smarty - A template engine for PHP.',
  'LBL_SOURCE_OVERLIBMWS' => 'Overlibmws - JavaScript library for client-side windowing.',
  'LBL_SOURCE_YAHOO_UI_LIB' => 'Yahoo! User Interface Library - The UI Library Utilities facilitate the implementation of rich client-side features.',
  'LBL_SOURCE_PHPMAILER' => 'PHPMailer - A full featured email transfer class for PHP',
  'LBL_SOURCE_CRYPT_BLOWFISH' => 'Crypt_Blowfish - Allows for quick two-way blowfish encryption without requiring the MCrypt PHP extension.',
  'LBL_SOURCE_HTML_SAFE' => 'HTML_Safe - A parser that strips down all potentially dangerous content within HTML',
  'LBL_SOURCE_XML_HTMLSAX3' => 'XML_HTMLSax3 - A SAX parser for HTML and other badly formed XML documents',
  'LBL_SOURCE_YAHOO_UI_LIB_EXT' => 'Yahoo! UI Extensions Library - Extensions to the Yahoo! User Interface Library by Jack Slocum',
  'LBL_SOURCE_JSMIN' => 'JSMin - filter which removes comments and unnecessary whitespace from JavaScript files.',
  'LBL_SOURCE_SWFOBJECT' => 'SWFObject - Javascript Flash Player detection and embed script.',
  'LBL_SOURCE_TINYMCE' => 'TinyMCE - A WYSIWYG editor control for web browsers that enables the user to edit HTML contents',
  'LBL_SOURCE_EXT' => 'Ext - A client-side JavaScript framework for building web applications.',
  'LBL_SOURCE_RECAPTCHA' => 'reCAPTCHA - A free CAPTCHA service that helps to digitize books, newspapers and old time radio shows.', 
  'LBL_SOURCE_TCPDF' => 'TCPDF - A PHP class for generating PDF documents.',


  'LBL_DASHLET_TITLE' => 'האתרים שלי',
  'LBL_DASHLET_OPT_TITLE' => 'כותרת',
  'LBL_DASHLET_OPT_URL' => 'מיקום אתר אינטרנט',
  'LBL_DASHLET_OPT_HEIGHT' => 'גובה תאסופית (in pixels)',
  'LBL_DASHLET_SUGAR_NEWS' => 'Sugar News',
  'LBL_DASHLET_DISCOVER_SUGAR_PRO' => 'Discover Sugar',

);


?>


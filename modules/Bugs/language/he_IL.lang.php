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
  'LBL_MODULE_NAME' => 'באגים',
  'LBL_MODULE_TITLE' => 'מעקב אחר באגים: דף ראשי',
  'LBL_MODULE_ID' => 'באגים',
  'LBL_SEARCH_FORM_TITLE' => 'חיפוש באג',
  'LBL_LIST_FORM_TITLE' => 'רשימת באגים',
  'LBL_NEW_FORM_TITLE' => 'באג חדש',
  'LBL_CONTACT_BUG_TITLE' => 'איש קשר-באג:',
  'LBL_SUBJECT' => 'נושא:',
  'LBL_BUG' => 'באג:',
  'LBL_BUG_NUMBER' => 'באג מספר:',
  'LBL_NUMBER' => 'מספר:',
  'LBL_STATUS' => 'סטאטוס:',
  'LBL_PRIORITY' => 'עדיפות:',
  'LBL_DESCRIPTION' => 'תיאור:',
  'LBL_CONTACT_NAME' => 'שם איש קשר:',
  'LBL_BUG_SUBJECT' => 'באג בנושא:',
  'LBL_CONTACT_ROLE' => 'תפקיד:',
  'LBL_LIST_NUMBER' => 'מס.',
  'LBL_LIST_SUBJECT' => 'נושא',
  'LBL_LIST_STATUS' => 'סטאטוס',
  'LBL_LIST_PRIORITY' => 'עדיפות',
  'LBL_LIST_RELEASE' => 'גרסה',
  'LBL_LIST_RESOLUTION' => 'החלטה',
  'LBL_LIST_LAST_MODIFIED' => 'שונה לאחרונה',
  'LBL_INVITEE' => 'אנשי קשר',
  'LBL_TYPE' => 'סוג:',
  'LBL_LIST_TYPE' => 'סוג',
  'LBL_RESOLUTION' => 'החלטה:',
  'LBL_RELEASE' => 'גרסה:',
  'LNK_NEW_BUG' => 'דוח על באג',
  'LNK_BUG_LIST' => 'צפייה בבאגים',
  'NTC_REMOVE_INVITEE' => 'האם אתה בטוח שברצונך להסיר איש הקשר מבאג זה?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'האם אתה בטוח שברצונך להסיר באג זה מהחשבון?',
  'ERR_DELETE_RECORD' => 'You must specify a record number in order to delete the bug.',
  'LBL_LIST_MY_BUGS' => 'הבאגים שמוקצים אלי',
  'LNK_IMPORT_BUGS' => 'ייבוא באגים',
  'LBL_FOUND_IN_RELEASE' => 'נמצא בגרסה:',
  'LBL_FIXED_IN_RELEASE' => 'תוקן בגרסה:',
  'LBL_LIST_FIXED_IN_RELEASE' => 'תוקן בגרסה',
  'LBL_WORK_LOG' => 'יומן עבודה:',
  'LBL_SOURCE' => 'מקור:',
  'LBL_PRODUCT_CATEGORY' => 'קטגוריה:',

  'LBL_CREATED_BY' => 'נוצר על ידי:',
  'LBL_DATE_CREATED' => 'נוצר בתאריך:',
  'LBL_MODIFIED_BY' => 'שונה לאחרונה על ידי:',
  'LBL_DATE_LAST_MODIFIED' => 'שונה בתאריך:',

  'LBL_LIST_EMAIL_ADDRESS' => 'כתובת דואר אלקטרוני',
  'LBL_LIST_CONTACT_NAME' => 'שם איש קשר',
  'LBL_LIST_ACCOUNT_NAME' => 'שם חשבון',
  'LBL_LIST_PHONE' => 'טלפון',
  'NTC_DELETE_CONFIRMATION' => 'האם אתה בטוח שברצונך להסיר איש הקשר מבאג זה?',

  'LBL_DEFAULT_SUBPANEL_TITLE' => 'מעקב אחר באגים',
  'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעילויות',
  'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'אנשי קשר',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'חשבונות',
  'LBL_CASES_SUBPANEL_TITLE' => 'אירועים',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'פרויקטים',
  'LBL_SYSTEM_ID' => 'זהוי מערכת',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'משתמשים שהוקצו',
    'LBL_ASSIGNED_TO_NAME' => 'הוקצה עבור',

    'LNK_BUG_REPORTS' => 'צפה בדוח על באגים',
    'LBL_SHOW_IN_PORTAL' => 'הצג בפורטל',
    'LBL_BUG_INFORMATION' => 'סקירת באגים',
  );
?>

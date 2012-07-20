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
  'LBL_MODULE_NAME' => 'הזדמנויות',
  'LBL_MODULE_TITLE' => 'הזדמנויות: דף הבית',
  'LBL_SEARCH_FORM_TITLE' => 'חיפוש הזדמנויות',
  'LBL_VIEW_FORM_TITLE' => 'צפייה בהזדמנות',
  'LBL_LIST_FORM_TITLE' => 'רשימת הזדמנויות',
  'LBL_OPPORTUNITY_NAME' => 'שם ההזדמנות:',
  'LBL_OPPORTUNITY' => 'הזדמנות:',
  'LBL_NAME' => 'שם ההזדמנות',
  'LBL_INVITEE' => 'אנשי קשר',
  'LBL_CURRENCIES' => 'מטבעות',
  'LBL_LIST_OPPORTUNITY_NAME' => 'שם',
  'LBL_LIST_ACCOUNT_NAME' => 'שם חשבון',
  'LBL_LIST_AMOUNT' => 'סכום ההזדמנות',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'סכום',
  'LBL_LIST_DATE_CLOSED' => 'נסגר',
  'LBL_LIST_SALES_STAGE' => 'שלב במכירות',
  'LBL_ACCOUNT_ID'=>'חשבון זהות',
  'LBL_CURRENCY_ID'=>'מטבע זהות',
  'LBL_CURRENCY_NAME'=>'שם מטבע',
  'LBL_CURRENCY_SYMBOL'=>'סימול מטבע',
  'LBL_TEAM_ID' =>'צוות זהות',
  
  
  
  
  'UPDATE' => 'Opportunity - עדכון מטבע',
  'UPDATE_DOLLARAMOUNTS' => 'עדכן שער חליפין לדולר',
  'UPDATE_VERIFY' => 'וודא שער חליפין',
  'UPDATE_VERIFY_TXT' => 'Verifies that the amount values in opportunities are valid decimal numbers with only numeric characters(0-9) and decimals(.)',
  'UPDATE_FIX' => 'שער חליפין קבוע',
  'UPDATE_FIX_TXT' => 'Attempts to fix any invalid amounts by creating a valid decimal from the current amount. Any modified amount is backed up in the amount_backup database field. If you run this and notice bugs, do not rerun it without restoring from the backup as it may overwrite the backup with new invalid data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Update the U.S. Dollar amounts for opportunities based on the current set currency rates. This value is used to calculate Graphs and List View Currency Amounts.',
  'UPDATE_CREATE_CURRENCY' => 'יוצר מטבע חדש:',
  'UPDATE_VERIFY_FAIL' => 'רשומה נכלשה בעדכון:',
  'UPDATE_VERIFY_CURAMOUNT' => 'שער חליפין:',
  'UPDATE_VERIFY_FIX' => 'הרצת תיקון תאפשר',
  'UPDATE_INCLUDE_CLOSE' => 'לכלול רשומות שנסגרו',
  'UPDATE_VERIFY_NEWAMOUNT' => 'שער חליפין חדש:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'מטבע חדש:',
  'UPDATE_DONE' => 'בוצע',
  'UPDATE_BUG_COUNT' => 'נמצא באג ונסיתי לפתור אותו:',
  'UPDATE_BUGFOUND_COUNT' => 'באגים נמצאו:',
  'UPDATE_COUNT' => 'רשומות שעודכנו:',
  'UPDATE_RESTORE_COUNT' => 'רשומות שערי חליפין ששוחזרו:',
  'UPDATE_RESTORE' => 'שחזר שער חליפין',
  'UPDATE_RESTORE_TXT' => 'שחזר שערי חליפין מגבוי שבוצע תוך כדי תיקון.',
  'UPDATE_FAIL' => 'לא הצלחתי לעדכן - ',
  'UPDATE_NULL_VALUE' => 'Amount is NULL setting it to 0 -',
  'UPDATE_MERGE' => 'מזג מטבעות',
  'UPDATE_MERGE_TXT' => 'Merge multiple currencies into a single currency. If there are multiple currency records for the same currency, you merge them together. This will also merge the currencies for all other modules.',
  'LBL_ACCOUNT_NAME' => 'שם חשבון:',
  'LBL_AMOUNT' => 'שער חליפין להזדמנות:',
  'LBL_AMOUNT_USDOLLAR' => 'שער חליפין:',
  'LBL_CURRENCY' => 'מטבע:',
  'LBL_DATE_CLOSED' => 'תאריך סגירה צפוי:',
  'LBL_TYPE' => 'סוג:',
  'LBL_CAMPAIGN' => 'קמפיין:',
  'LBL_NEXT_STEP' => 'השלב הבא:',
  'LBL_LEAD_SOURCE' => 'מקור הליד:',
  'LBL_SALES_STAGE' => 'שלב במכירות:',
  'LBL_PROBABILITY' => 'הסתברות (%):',
  'LBL_DESCRIPTION' => 'תיאור:',
  'LBL_DUPLICATE' => 'ככל הנראה הזדמנות כפולה',
  'MSG_DUPLICATE' => 'The opportunity record you are about to create might be a duplicate of a opportunity record that already exists. Opportunity records containing similar names are listed below.<br>Click Save to continue creating this new opportunity, or click Cancel to return to the module without creating the opportunity.',
  'LBL_NEW_FORM_TITLE' => 'צור הזדמנות',
  'LNK_NEW_OPPORTUNITY' => 'צור הזדמנות',
  'LNK_OPPORTUNITY_REPORTS' => 'צפייה בדוחות על הזדמנויות',
  'LNK_OPPORTUNITY_LIST' => 'צפה בהזדמנויות',
  'ERR_DELETE_RECORD' => 'יש לציין מספר רשומה על מנת למחוק את ההזדמנות.',
  'LBL_TOP_OPPORTUNITIES' => 'ההזדמנויות הבשלות שלי',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'האם אתה בטוח שברצונך להסיר איש קשר זה מההזדמנות?',
	'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'האם אתה בטוח שברצונך להסיר הזדמנות זו מהפרוייקט?',
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'הזדמנויות',
	'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעיליות',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה',
    'LBL_RAW_AMOUNT'=>'סכום גלמי',
	
    'LBL_LEADS_SUBPANEL_TITLE' => 'לידים',
    'LBL_CONTACTS_SUBPANEL_TITLE' => 'אנשי קשר',
    'LBL_QUOTES_SUBPANEL_TITLE' => 'הצעות מחיר',
    'LBL_PROJECTS_SUBPANEL_TITLE' => 'פרויקטים',
	'LBL_ASSIGNED_TO_NAME' => 'הוקצה עבור:',
	'LBL_LIST_ASSIGNED_TO_NAME' => 'משתמש שהוקצה',
	'LBL_CONTRACTS'=>'אנשי קשר',
	'LBL_CONTRACTS_SUBPANEL_TITLE'=>'חוזים',	
  'LBL_LIST_SALES_STAGE' => 'שלב במכירות',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'ההזדמנויות הסגורות שלי',
  'LBL_TOTAL_OPPORTUNITIES' => 'סך-בכל הזדמנויות',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'הזדמנויות שנסגרו בהרכשה',
  'LBL_ASSIGNED_TO_ID' =>'משתמש שהוקצה:',
  'LBL_CREATED_ID'=>'נוצר על ידי זהות',
  'LBL_MODIFIED_ID'=>'שונה על ידי זהות',
  'LBL_MODIFIED_NAME'=>'שונה על ידי שם משתמש',
    'LBL_CREATED_USER' => 'משתמש שנוצר',
    'LBL_MODIFIED_USER' => 'משתמש ששונה',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'קמפיינים',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'פרוייקטים',
  'LABEL_PANEL_ASSIGNMENT' => 'מטלה',
	'LNK_IMPORT_OPPORTUNITIES' => 'ייבוא הזדמנויות',
);

?>


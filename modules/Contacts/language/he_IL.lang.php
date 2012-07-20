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
        'db_last_name' => 'LBL_LIST_LAST_NAME',
    'db_first_name' => 'LBL_LIST_FIRST_NAME',
    'db_title' => 'LBL_LIST_TITLE',
    'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
    'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
        'LNK_CONTACT_REPORTS' => 'צפה בדוחות על אנשי קשר',
    'ERR_DELETE_RECORD' => 'Specify the record number to delete the contact.',
    'LBL_ACCOUNT_ID' => 'זהות חשבון:',
    'LBL_ACCOUNT_NAME' => 'שם חשבון:',
    'LBL_CAMPAIGN'     => 'קמפיין:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעילויות',
    'LBL_ADD_BUSINESSCARD' => 'הכנס כרטיס ביקור',
    'LBL_ADDMORE_BUSINESSCARD' => 'הוסף כרטיס ביקור אחק',
    'LBL_ADDRESS_INFORMATION' => 'פרטי הכתובת',
    'LBL_ALT_ADDRESS_CITY' => 'Aעיר חלופית:',
    'LBL_ALT_ADDRESS_COUNTRY' => 'מחוז חלופי:',
    'LBL_ALT_ADDRESS_POSTALCODE' => 'מיקוד משני:',
    'LBL_ALT_ADDRESS_STATE' => 'משינה משני:',
    'LBL_ALT_ADDRESS_STREET_2' => 'רחוב משני 2:',
    'LBL_ALT_ADDRESS_STREET_3' => 'רחוב משני 3:',
    'LBL_ALT_ADDRESS_STREET' => 'רחוב משני:',
    'LBL_ALTERNATE_ADDRESS' => 'כתובת אחרת:',
    'LBL_ALT_ADDRESS' => 'כתובת אחרת:',
    'LBL_ANY_ADDRESS' => 'כתובת כלשהי:',
    'LBL_ANY_EMAIL' => 'דואר אלקטרוני כלשהו:',
    'LBL_ANY_PHONE' => 'טלפון כלשהו:',
    'LBL_ASSIGNED_TO_NAME' => 'הוקצה עבורAssigned to:',
    'LBL_ASSIGNED_TO_ID' => 'משתמש שהוקצה',
    'LBL_ASSISTANT_PHONE' => 'טלפון של העוזר:',
    'LBL_ASSISTANT' => 'עוזר:',
    'LBL_BIRTHDATE' => 'יום הולדת:',
    'LBL_BUSINESSCARD' => 'כרטיס ביקור',
    'LBL_CITY' => 'עיר:',
    'LBL_CAMPAIGN_ID' => 'זהות קמפיין',
    'LBL_CONTACT_INFORMATION' => 'סקירת איש קשר',
    'LBL_CONTACT_NAME' => 'שם איש קשר:',
    'LBL_CONTACT_OPP_FORM_TITLE' => 'איש קשר-הזדמנות:',
    'LBL_CONTACT_ROLE' => 'תפקיד:',
    'LBL_CONTACT' => 'קשר:',
    'LBL_COUNTRY' => 'מחוז:',
    'LBL_CREATED_ACCOUNT' => 'צור חשבון חדש',
    'LBL_CREATED_CALL' => 'צור שיחת טלפוןחדשה',
    'LBL_CREATED_CONTACT' => 'צור איש קשר חדש',
    'LBL_CREATED_MEETING' => 'צור פגישה חדשה',
    'LBL_CREATED_OPPORTUNITY' =>'צור הזדמנות חדשה',
    'LBL_DATE_MODIFIED' => 'שונהבתאריך:',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'אנשי קשר',
    'LBL_DEPARTMENT' => 'מחלקה:',
    'LBL_DESCRIPTION_INFORMATION' => 'תיאור המידע',
    'LBL_DESCRIPTION' => 'תיאור:',
    'LBL_DIRECT_REPORTS_SUBPANEL_TITLE'=>'דוחות ישירים',
    'LBL_DO_NOT_CALL' => 'לא לצלצל:',
    'LBL_DUPLICATE' => 'אנשי קשר כפולים',
    'LBL_EMAIL_ADDRESS' => 'כתובת דואר אלקטרוני:',
    'LBL_EMAIL_OPT_OUT' => 'דואר אלקטרוני לרשימות תפוצה:',
    'LBL_EMPTY_VCARD' => 'אנא בחר קובץ vCard ',
    'LBL_EXISTING_ACCOUNT' => 'להשתמש בחשבון קיים',
    'LBL_EXISTING_CONTACT' => 'להשתמש באיש קשר קיים',
    'LBL_EXISTING_OPPORTUNITY'=> 'להשתשמ בהזדמנות קיימת',
    'LBL_FAX_PHONE' => 'פקס:',
    'LBL_FIRST_NAME' => 'שם פרטי:',
    'LBL_FULL_NAME' => 'שם מלא:',
    'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה',
    'LBL_HOME_PHONE' => 'בית:',
    'LBL_ID' => 'זהות:',
    'LBL_IMPORT_VCARD' => 'ייבוא vCard',
    'LBL_VCARD' => 'vCard',
    'LBL_IMPORT_VCARDTEXT' => 'Automatically create a new contact by importing a vCard from your file system.',
    'LBL_INVALID_EMAIL'=>'דואר אלקטרוני לא חוקי:',
    'LBL_INVITEE' => 'דוחות ישירים',
    'LBL_LAST_NAME' => 'שם משפחה:',
    'LBL_LEAD_SOURCE' => 'מקור הליד:',
    'LBL_LIST_ACCEPT_STATUS' => 'סטאטוס קבלה',
    'LBL_LIST_ACCOUNT_NAME' => 'שם חשבון',
    'LBL_LIST_CONTACT_NAME' => 'שם איש קשר',
    'LBL_LIST_CONTACT_ROLE' => 'תפקיד',
    'LBL_LIST_EMAIL_ADDRESS' => 'דואר אלקטרוני',
    'LBL_LIST_FIRST_NAME' => 'שם פרטי',
    'LBL_LIST_FORM_TITLE' => 'רשימת אנשי קשר',
    'LBL_VIEW_FORM_TITLE' => 'צפייה באיש קשר',
    'LBL_LIST_LAST_NAME' => 'שם משפחה',
    'LBL_LIST_NAME' => 'שם',
    'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'דואר אלקטרוני אחר',
    'LBL_LIST_PHONE' => 'טלפון במשרד',
    'LBL_LIST_TITLE' => 'תואר',
    'LBL_MOBILE_PHONE' => 'נייד:',
    'LBL_MODIFIED' => 'שונה על ידי:',
    'LBL_MODULE_NAME' => 'אנשי קשר',
    'LBL_MODULE_TITLE' => 'אנשי קשר: דף ראשי',
    'LBL_NAME' => 'שם:',
    'LBL_NEW_FORM_TITLE' => 'איש קשר חדש',
    'LBL_NEW_PORTAL_PASSWORD' => 'סיסמא חדשה לפורטל:',
    'LBL_NOTE_SUBJECT' =>'פתק בנושא',
    'LBL_OFFICE_PHONE' => 'טלפון במשרד:',
    'LBL_OPP_NAME' => 'שם ההזדמנות:',
    'LBL_OPPORTUNITY_ROLE_ID'=>'זהות תפקיד ההזדמנות:',
    'LBL_OPPORTUNITY_ROLE'=>'תפקיד זהות ההזדמנות',
    'LBL_OTHER_EMAIL_ADDRESS' => 'דואר אלקטרוני אחר:',
    'LBL_OTHER_PHONE' => 'טלפון אחר:',
    'LBL_PHONE' => 'טלפון:',
    'LBL_PORTAL_ACTIVE' => 'פורטל פעיל:',
    'LBL_PORTAL_APP'=>'פורטל יישומים:',
    'LBL_PORTAL_INFORMATION' => 'מידע על הפורטל',
    'LBL_PORTAL_NAME' => 'שם פורטל:',
    'LBL_PORTAL_PASSWORD_ISSET' => 'הסיסמא לפורטל היא:',
    'LBL_STREET' => 'רחוב',
    'LBL_POSTAL_CODE' => 'מיקוד:',
    'LBL_PRIMARY_ADDRESS_CITY' => 'עיר:',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => 'מחוז:',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'מיקוד:',
    'LBL_PRIMARY_ADDRESS_STATE' => 'מדינה:',
    'LBL_PRIMARY_ADDRESS_STREET_2' => 'רחוב 2:',
    'LBL_PRIMARY_ADDRESS_STREET_3' => 'רחוב 3:',
    'LBL_PRIMARY_ADDRESS_STREET' => 'רחוב:',
    'LBL_PRIMARY_ADDRESS' => 'כתובת ראשית:',
    'LBL_PRODUCTS_TITLE'=>'מוצרים',
    'LBL_RELATED_CONTACTS_TITLE'=>'אנשי קשר קשורים',
    'LBL_REPORTS_TO_ID'=>'מדווח אל שזהותו:',
    'LBL_REPORTS_TO' => 'מדווח אל:',
    'LBL_RESOURCE_NAME' => 'שם המשאב',
    'LBL_SALUTATION' => 'ברכה:',
    'LBL_SAVE_CONTACT' => 'שמור איש קשר',
    'LBL_SEARCH_FORM_TITLE' => 'חפש איש קשר',
    'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'בחר אנשי קשר שסומנו',
    'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'בחר אנשי קשר שסומנו',
    'LBL_STATE' => 'מדינה:',
    'LBL_SYNC_CONTACT' => 'סנכרן עם אאוטלוק&reg;:',
    'LBL_PROSPECT_LIST' => 'רשימת תחזיות',
    'LBL_TEAM_ID' => 'צוות שזהותו:',
    'LBL_TITLE' => 'תואר:',
    'LNK_CONTACT_LIST' => 'צפייה באנשי קשר',
    'LNK_IMPORT_VCARD' => 'צור איש קשר מ - vCard',
    'LNK_NEW_ACCOUNT' => 'צור חשבון',
    'LNK_NEW_APPOINTMENT' => 'צור פגישה',
    'LNK_NEW_CALL' => 'יומן שיחה',
    'LNK_NEW_CASE' => 'צור אירוע',
    'LNK_NEW_CONTACT' => 'צור איש קשר',
    'LNK_NEW_EMAIL' => 'ארכב דואר אלקטרוני',
    'LNK_NEW_MEETING' => 'תזמן פגישה',
    'LNK_NEW_NOTE' => 'צור פתק',
    'LNK_NEW_OPPORTUNITY' => 'צור הזדמנות',
    'LNK_NEW_TASK' => 'צור משימה',
    'LNK_SELECT_ACCOUNT' => "צור חשבון",
    'MSG_DUPLICATE' => 'The contact record you are about to create might be a duplicate of a contact record that already exists. Contact records containing similar names and/or email addresses are listed below.<br>Click Save to continue creating this new contact, or click Cancel to return to the module without creating the contact.',
    'MSG_SHOW_DUPLICATES' => 'The contact record you are about to create might be a duplicate of a contact record that already exists. Contact records containing similar names and/or email addresses are listed below.<br>Click Save to continue creating this new contact, or click Cancel to return to the module without creating the contact.',
    'NTC_COPY_ALTERNATE_ADDRESS' => 'העתק כתובת משית לראשית',
    'NTC_COPY_PRIMARY_ADDRESS' => 'העתק כתובת משנית לראשית',
    'NTC_DELETE_CONFIRMATION' => 'האם אתה בטוח שברצונך למחוק רשומה זו?',
    'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Creating an opportunity requires an account.\n Please either create a new account or select an existing one.',
    'NTC_REMOVE_CONFIRMATION' => 'Are you sure you want to remove this contact from the case?',
    'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Are you sure you want to remove this record as a direct report?',

	'LBL_USER_PASSWORD' => 'סיסמא:',

	'LBL_LEADS_SUBPANEL_TITLE' => 'לידים',
	'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'הזדמנויות',
	'LBL_QUOTES_SUBPANEL_TITLE' => 'הצעות מחיר',
	'LBL_PRODUCTS_SUBPANEL_TITLE' => 'מוצרים',
	'LBL_COPY_ADDRESS_CHECKED' => 'העתק כתובת לאנשי שקר שנבחרו',

	'LBL_CASES_SUBPANEL_TITLE' => 'אירועים',
	'LBL_BUGS_SUBPANEL_TITLE' => 'באגים',
	'LBL_PROJECTS_SUBPANEL_TITLE' => 'פרויקטים',	
	'LBL_TARGET_OF_CAMPAIGNS' => 'קמפיינים (מטרה של) :',
	'LBL_CAMPAIGNS'	=>	'קמפיינים',
	'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE'=>'קמפיינים',
	'LBL_LIST_CITY' => 'עיר',
	'LBL_LIST_STATE' => 'מדינה',
	'LBL_HOMEPAGE_TITLE' => 'אנשי הקשר שלי',
    'LBL_OPPORTUNITIES' => 'הזדמנויות',

	'LBL_PORTAL_PASSWORD' => 'סיסמא לפורטל',
	'LBL_CONFIRM_PORTAL_PASSWORD' => 'אשר סיסמא לפורטל',
	'LBL_CHECKOUT_DATE'=>'תאריך יציאה',
    'LBL_CONTACTS_SUBPANEL_TITLE' => 'אנשי קשר',
    'LBL_PROJECT_SUBPANEL_TITLE' => 'פרויקטים',
    'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'קמפיינים',
    'LNK_IMPORT_CONTACTS' => 'ייבוא אנשי קשר',
)
?>

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
    'db_account_name' => 'LBL_LIST_ACCOUNT_NAME',
    'db_email2' => 'LBL_LIST_EMAIL_ADDRESS',

        'ERR_DELETE_RECORD' => 'יש לספק מספר רשומה על מנת למחוק את הליד.',
    'LBL_ACCOUNT_DESCRIPTION'=> 'תיאור החשבון',
    'LBL_ACCOUNT_ID'=>'חשבון זהות',
    'LBL_ACCOUNT_NAME' => 'שם חשבון:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעילויות',
    'LBL_ADD_BUSINESSCARD' => 'הוסף כרטיס ביקור',
    'LBL_ADDRESS_INFORMATION' => 'מידע על הכתובת',
    'LBL_ALT_ADDRESS_CITY' => 'עיר אלטרנטיבית',
    'LBL_ALT_ADDRESS_COUNTRY' => 'מחוז אלטרנטיבי',
    'LBL_ALT_ADDRESS_POSTALCODE' => 'מיקוד אלטרנטיבי',
    'LBL_ALT_ADDRESS_STATE' => 'מדינה אלטרנטיבית',
    'LBL_ALT_ADDRESS_STREET_2' => 'רחוב אלטרנטיבי 2',
    'LBL_ALT_ADDRESS_STREET_3' => 'רחוב אלטרנטיבי 3',
    'LBL_ALT_ADDRESS_STREET' => 'רחוב אלטרנטיבי',
    'LBL_ALTERNATE_ADDRESS' => 'כתובת אחרת:',
    'LBL_ALT_ADDRESS' => 'כתובת אחרת:',
    'LBL_ANY_ADDRESS' => 'כתובת כלשהי:',
    'LBL_ANY_EMAIL' => 'דואר אלקטרוני כלשהו:',
    'LBL_ANY_PHONE' => 'טלפון כלשהו:',
    'LBL_ASSIGNED_TO_NAME' => 'הוקצה עבור',
    'LBL_ASSIGNED_TO_ID' => 'הוקצה למשתמש:',
    'LBL_BACKTOLEADS' => 'חזרה ללידים',
    'LBL_BUSINESSCARD' => 'המר ליד',
    'LBL_CITY' => 'עיר:',
    'LBL_CONTACT_ID' => 'איש קשר זהות',
    'LBL_CONTACT_INFORMATION' => 'סקירת ליד',
    'LBL_CONTACT_NAME' => 'שם הליד:',
    'LBL_CONTACT_OPP_FORM_TITLE' => 'ליד-בזדמנות:',
    'LBL_CONTACT_ROLE' => 'תפקיד:',
    'LBL_CONTACT' => 'ליד:',
    'LBL_CONVERTED_ACCOUNT'=>'המר חשבון:',
    'LBL_CONVERTED_CONTACT' => 'אנשי קשר שהומרו:',
    'LBL_CONVERTED_OPP'=>'הזדמנויות שהומרו:',
    'LBL_CONVERTED'=> 'הומר',
    'LBL_CONVERTLEAD_BUTTON_KEY' => 'V',
    'LBL_CONVERTLEAD_TITLE' => 'המר ליד [Alt+V]',
    'LBL_CONVERTLEAD' => 'המר ליד',
    'LBL_CONVERTLEAD_WARNING' => 'Warning: This status of the Lead you are about to convert is "Converted". Contact and/or Account records may already have been created from the Lead. If you wish to continue with converting the Lead, click Save. To go back to the Lead without converting it, click Cancel.',
    'LBL_CONVERTLEAD_WARNING_INTO_RECORD' => ' איש קשר אפשרי: ',
    'LBL_COUNTRY' => 'מחוז:',
    'LBL_CREATED_NEW' => 'נוצר חדש ',
	'LBL_CREATED_ACCOUNT' => 'נוצר חשבון חדש',
    'LBL_CREATED_CALL' => 'נוצרה שיחת טלפון חדשה',
    'LBL_CREATED_CONTACT' => 'נוצר איש קשר חדש',
    'LBL_CREATED_MEETING' => 'נוצרה פגישה חדשה',
    'LBL_CREATED_OPPORTUNITY' => 'נוצרה הזדמנות חדשה',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'לידים',
    'LBL_DEPARTMENT' => 'מחלקה:',
    'LBL_DESCRIPTION_INFORMATION' => 'תיאור המידע',
    'LBL_DESCRIPTION' => 'תיאור:',
    'LBL_DO_NOT_CALL' => 'לא להתקשר:',
    'LBL_DUPLICATE' => 'לידים דומים',
    'LBL_EMAIL_ADDRESS' => 'כתובת דואר אלקטרוני:',
    'LBL_EMAIL_OPT_OUT' => 'דואר אלקטרוני למשלוח עלון חדשות:',
    'LBL_EXISTING_ACCOUNT' => 'השתמש בחשבון קיים',
    'LBL_EXISTING_CONTACT' => 'השתמש באיש קשר קיים',
    'LBL_EXISTING_OPPORTUNITY' => 'השתמש בהזדמנות קיימת',
    'LBL_FAX_PHONE' => 'פקס:',
    'LBL_FIRST_NAME' => 'שם פרטי:',
    'LBL_FULL_NAME' => 'שם מלא:',
    'LBL_HISTORY_SUBPANEL_TITLE'=>'הסטוריה',
    'LBL_HOME_PHONE' => 'טלפון בבית:',
    'LBL_IMPORT_VCARD' => 'ייבוא vCard',
    'LBL_VCARD' => 'vCard',
    'LBL_IMPORT_VCARDTEXT' => 'תיצר אוטומטית ליד חדש על ידי ייבוא vCard ממערכת הקבצים.',
    'LBL_INVALID_EMAIL'=>'דואר אלקטרוני לא חוקי:',
    'LBL_INVITEE' => 'דוחות ישירים',
    'LBL_LAST_NAME' => 'שם משפחה:',
    'LBL_LEAD_SOURCE_DESCRIPTION' => 'תיאור מקור הליד:',
    'LBL_LEAD_SOURCE' => 'מקור הליד:',
    'LBL_LIST_ACCEPT_STATUS' => 'קבל סטאטוס',
    'LBL_LIST_ACCOUNT_NAME' => 'שם חשבון',
    'LBL_LIST_CONTACT_NAME' => 'שם הליד',
    'LBL_LIST_CONTACT_ROLE' => 'תפקיד',
    'LBL_LIST_DATE_ENTERED' => 'נוצר בתאריך',
    'LBL_LIST_EMAIL_ADDRESS' => 'דואר אלקטרוני',
    'LBL_LIST_FIRST_NAME' => 'שם פרטי',
    'LBL_VIEW_FORM_TITLE' => 'צפייה בליד',    
    'LBL_LIST_FORM_TITLE' => 'רשימת לידים',
    'LBL_LIST_LAST_NAME' => 'שם משפחה',
    'LBL_LIST_LEAD_SOURCE_DESCRIPTION' => 'תיאור מקור הליד',
    'LBL_LIST_LEAD_SOURCE' => 'מקור הליד',
    'LBL_LIST_MY_LEADS' => 'הלידים שלי',
    'LBL_LIST_NAME' => 'שם',
    'LBL_LIST_PHONE' => 'טלפון במשרד',
    'LBL_LIST_REFERED_BY' => 'הופנה על ידי',
    'LBL_LIST_STATUS' => 'סטאטוס',
    'LBL_LIST_TITLE' => 'תואר',
    'LBL_MOBILE_PHONE' => 'טלפון נייד:',
    'LBL_MODULE_NAME' => 'לידים',
    'LBL_MODULE_TITLE' => 'לידים: דף ראשי',
    'LBL_NAME' => 'שם:',
    'LBL_NEW_FORM_TITLE' => 'ליד חדש',
    'LBL_NEW_PORTAL_PASSWORD' => 'סיסמא חדשה לפורטל:',
    'LBL_OFFICE_PHONE' => 'טלפון במשרד:',
    'LBL_OPP_NAME' => 'שם הזדמנות:',
    'LBL_OPPORTUNITY_AMOUNT' => 'ערך ההזדמנות:',
    'LBL_OPPORTUNITY_ID'=>'הזדמנות זהות',
    'LBL_OPPORTUNITY_NAME' => 'שם ההזדמנות:',
    'LBL_OTHER_EMAIL_ADDRESS' => 'דואר אלקטרוני אחר:',
    'LBL_OTHER_PHONE' => 'טלפון אחר:',
    'LBL_PHONE' => 'טלפון:',
    'LBL_PORTAL_ACTIVE' => 'פעיל בפןרטל:',
    'LBL_PORTAL_APP'=> 'פורטל אפליקציות',
    'LBL_PORTAL_INFORMATION' => 'פורטל מידע',
    'LBL_PORTAL_NAME' => 'שם פורטל:',
    'LBL_PORTAL_PASSWORD_ISSET' => 'סיסמא הפורטל שנקבעה:',
    'LBL_POSTAL_CODE' => 'קוד פורטל:',
    'LBL_STREET' => 'רחוב',
    'LBL_PRIMARY_ADDRESS_CITY' => 'עיר',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => 'מחוז',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'מיקוד',
    'LBL_PRIMARY_ADDRESS_STATE' => 'מדינה',
    'LBL_PRIMARY_ADDRESS_STREET_2'=>'רחוב 2',
    'LBL_PRIMARY_ADDRESS_STREET_3'=>'רחוב 3',   
    'LBL_PRIMARY_ADDRESS_STREET' => 'רחוב',
    'LBL_PRIMARY_ADDRESS' => 'כתובת:',
    'LBL_REFERED_BY' => 'הופנה על ידי:',
    'LBL_REPORTS_TO_ID'=>'מדווח אל זהות',
    'LBL_REPORTS_TO' => 'מדווח אל:',
    'LBL_SALUTATION' => 'ברכה',
    'LBL_MODIFIED'=>'שונה על ידי',
	'LBL_MODIFIED_ID'=>'שונה על ידי זהות',
	'LBL_CREATED'=>'נוצר על ידי',
	'LBL_CREATED_ID'=>'נוצר על ידי זהות',    
    'LBL_SEARCH_FORM_TITLE' => 'חיפוש ליד',
    'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'בחר בלידים שסומנו',
    'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'בחר בלידים שסומנו',
    'LBL_STATE' => 'מדינה:',
    'LBL_STATUS_DESCRIPTION' => 'תיאור הסטאטוס:',
    'LBL_STATUS' => 'סטאטוס:',
    'LBL_TITLE' => 'תואר:',
    'LNK_IMPORT_VCARD' => 'צור ליד מ - vCard',
    'LNK_LEAD_LIST' => 'צפייה בלידים',
    'LNK_NEW_ACCOUNT' => 'צור חשבון',
    'LNK_NEW_APPOINTMENT' => 'צור פגישה',
    'LNK_NEW_CONTACT' => 'צור איש קשר',
    'LNK_NEW_LEAD' => 'צור ליד',
    'LNK_NEW_NOTE' => 'צור פתק',
    'LNK_NEW_TASK' => 'צור משימה',
    'LNK_NEW_CASE' => 'צור אירוע',
    'LNK_NEW_CALL' => 'יומן שיחת טלפון',
    'LNK_NEW_MEETING' => 'תזמן פגישה',
    'LNK_NEW_OPPORTUNITY' => 'צור הזדמנות',
    'LNK_SELECT_ACCOUNT' => ' <b>או</b> בחר חשבון',
	'LNK_SELECT_ACCOUNTS' => ' <b>או</b> בחר חשבון',
    'MSG_DUPLICATE' => 'Similar leads have been found. Please check the box of any leads you would like to associate with the Records that will be created from this conversion. Once you are done, please press next.',
    'NTC_COPY_ALTERNATE_ADDRESS' => 'העתק כתובת משנית לכתובת ראשית',
    'NTC_COPY_PRIMARY_ADDRESS' => 'העתק כתובת ראשית לכתובת משנית',
    'NTC_DELETE_CONFIRMATION' => 'אתה בטוח שברצונך למחוק רשומה זו?',
    'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Creating an opportunity requires an account.\n Please either create a new one or select an existing one.',
    'NTC_REMOVE_CONFIRMATION' => 'אתה בטוח שברצונך להסיר ליד זה מאירוע זה?',
    'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'האם אתה בטוח שברצונך להסיר רשומה זו מדוח ישיר?',
    'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE'=>'קמפיינים',
    'LBL_TARGET_OF_CAMPAIGNS'=>'קמפיין מוצלח:',
    'LBL_TARGET_BUTTON_LABEL'=>'נקבעה מטרה',
    'LBL_TARGET_BUTTON_TITLE'=>'נקבעה מטרה',
    'LBL_TARGET_BUTTON_KEY'=>'T',
    'LBL_CAMPAIGN_ID'=>'קמפיין זהות',
    'LBL_CAMPAIGN' => 'קמפיין:',
  	'LBL_LIST_ASSIGNED_TO_NAME' => 'משתמש שהוקצה',
    'LBL_PROSPECT_LIST' => 'רשימת תחזיות',
    'LBL_CAMPAIGN_LEAD' => 'קמפיינים',
	'LNK_LEAD_REPORTS' => 'צפה בדוחות על לידים',
    'LBL_BIRTHDATE' => 'תאריך לידה:',
    'LBL_THANKS_FOR_SUBMITTING_LEAD' =>'תודה לך על ההגשה.',
    'LBL_SERVER_IS_CURRENTLY_UNAVAILABLE' =>'צר לי, השרת איננו זמין כרגע אנא נסה במועד מאוחר יותר.',
    'LBL_ASSISTANT_PHONE' => 'טלפון של העוזר',
    'LBL_ASSISTANT' => 'עוזר',
    'LBL_REGISTRATION' => 'רישום',
    'LBL_MESSAGE' => 'אנא הזן למטה את המידע. מידע או חשבון יווצרו לאחר אישור תלוי ועומד עבורך.',
    'LBL_SAVED' => 'תודה על ההרשמה. החשבון שלך יווצר ומשהו מטעמנו יור איתך קשר בהקדם האפשרי.', 
    'LBL_CLICK_TO_RETURN' => 'חזור לפורטל',
    'LBL_CREATED_USER' => 'משתמש שנוצר',
    'LBL_MODIFIED_USER' => 'משתמש ששונה',
    'LBL_CAMPAIGNS' => 'קמפיינים',
    'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'קמפיינים',
    'LBL_CONVERT_MODULE_NAME' => 'מודול',
    'LBL_CONVERT_REQUIRED' => 'נדרש',
    'LBL_CONVERT_SELECT' => 'אפשר בחירה',
    'LBL_CONVERT_COPY' => 'העתק נתונים',
    'LBL_CONVERT_EDIT' => 'ערוך',
    'LBL_CONVERT_DELETE' => 'מחק',
    'LBL_CONVERT_ADD_MODULE' => 'הוסף מודול',
    'LBL_CONVERT_EDIT_LAYOUT' => 'ערוך תוכנית המרה',
    'LBL_CREATE' => 'צור',
    'LBL_SELECT' => ' <b>או</b> בחר',
	'LBL_WEBSITE' => 'אתר אינטרנט',
	'LNK_IMPORT_LEADS' => 'ייבא לידים',
	'LBL_NOTICE_OLD_LEAD_CONVERT_OVERRIDE' => 'Notice: The current Convert Lead screen contains custom fields. When you customize the Convert Lead screen in Studio for the first time, you will need to add custom fields to the layout, as necessary. The custom fields will not automatically appear in the layout, as they did previously.',
	'LBL_MODULE_TIP' 	=> 'The module to create a new record in.',
	'LBL_REQUIRED_TIP' 	=> 'Required modules must be created or selected before the lead can be converted.',
	'LBL_COPY_TIP'		=> 'If checked, fields from the lead will be copied to fields with the same name in the newly created records.',
	'LBL_SELECTION_TIP' => 'Modules with a relate field in Contacts can be selected rather than created during the convert lead process.',
	'LBL_EDIT_TIP'		=> 'Modify the convert layout for this module.',
	'LBL_DELETE_TIP'	=> 'Remove this module from the convert layout.',
);


?>

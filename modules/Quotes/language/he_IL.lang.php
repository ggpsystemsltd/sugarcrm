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
        
    
    
    
        'LBL_CONTRACTS'=>'חוזים',
    'LBL_CONTRACTS_SUBPANEL_TITLE'=>'חוזים',
    'ERR_DELETE_RECORD' => 'יש לציין מספר רשומה על מנת למחוק הצעת מחיר זו.',
    'LBL_ACCOUNT_ID'=>'זהות חשבון',
    'LBL_ACCOUNT_NAME' => 'שם חשבון:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'פעילויות',
    'LBL_ADD_COMMENT' => 'הוסף הערה',
    'LBL_ADD_GROUP' => 'הוסף קבוצה',
    'LBL_ADD_ROW' => 'הוסף שורה',
    'LBL_ADDRESS_INFORMATION' => 'מידע על הכתובות',
    'LBL_AMOUNT'=>'סכום הצעת המחיר:',
    'LBL_AMOUNT_USDOLLAR'=>'סכום:',
    'LBL_ANY_ADDRESS' => 'כתובת כלשהי:',
    'LBL_BILL_TO' => 'לחייב את',
    'LBL_BILLING_ACCOUNT_NAME' => 'שם חשבון לחיוב:',
    'LBL_BILLING_ACCOUNT' => 'חשבון:',
    'LBL_BILLING_ADDRESS_CITY' => 'עיר לחיוב',
    'LBL_BILLING_ADDRESS_COUNTRY' => 'מדינה לחיוב',
    'LBL_BILLING_ADDRESS_POSTAL_CODE' => 'מיקוד לחיוב',
    'LBL_BILLING_ADDRESS_STATE' => 'ארץ לחיוב',
    'LBL_BILLING_ADDRESS_STREET' => 'כתובת לחיוב',
    'LBL_BILLING_ADDRESS' => 'כתובות לחיוב:',
    'LBL_BILLING_CONTACT_ID' => 'זהות איש קשר לחיוב:',
    'LBL_BILLING_CONTACT_NAME' => 'שם איש קשר לחיוב:',
    'LBL_BILLING_CONTACT' => 'איש קשר:',
    'LBL_BUNDLE_NAME' => 'שם קבוצה:',
    'LBL_BUNDLE_STAGE' => 'שלב בקבוצה:',
    'LBL_BUNDLE_DISCOUNT'=> 'הנחה:',
    'LBL_CALC_GRAND' => 'הצג סך-הכל&nbsp;כללי:',
    'LBL_CHECK_DATA'=>"Invalid Data Input: please check your data and make sure you have valid numbers (0-9 or '.')",
    'LBL_CITY' => 'עיר:',
    'LBL_CONTACT_NAME' => 'שם איש קשר:',
    'LBL_CONTACT_QUOTE_FORM_TITLE' => 'איש קשר-הצעת המחיר:',
    'LBL_CONTACT_ROLE' => 'תפקידו של איש הקשר:',
    'LBL_COUNTRY' => 'מדינה:',
    'LBL_CREATED_BY'=>'נוצר על ידי',
    'LBL_CURRENCY' => 'מטבע:',
    'LBL_DATE_QUOTE_CLOSED' => 'תאריך סגירה בפועל:',
    'LBL_DATE_QUOTE_EXPECTED_CLOSED' => 'בתוקף עד:',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'הצעות מחיר',
    'LBL_DELETE_GROUP' => 'מחק קבוצה',
    'LBL_DESCRIPTION_INFORMATION' => 'תיאור המידע',
    'LBL_DESCRIPTION' => 'תיאור:',
    'LBL_DUPLICATE' => 'ככל הנראה הצעת מחיר זהה כבר קיימת במערכת',
    'LBL_EMAIL_QUOTE_FOR' => 'העת מחיר עבור: ',
    'LBL_EMAIL_DEFAULT_DESCRIPTION' => 'מצורפת בזאת הצעת המחיר לבקשתכם (ניתן לשנות מלל זה)',
    'LBL_EMAIL_ATTACHMENT' => 'צרופה להודעת דואר אלקטרוני : ',
    'LBL_HISOTRY_SUBPANEL_TITLE'=>'הסטוריה',
    'LBL_INVITEE' => 'אנשי קשר',
    'LBL_INVOICE'=>'חשבונית',
    'LBL_LEAD_SOURCE'=>'מקור הליד:',
    'LBL_LINE_ITEM_INFORMATION' => 'סדר פריטים',
    'LBL_LIST_ACCOUNT_NAME' => 'שם חשבון',
    'LBL_LIST_AMOUNT' => 'סכום הצעת המחיר',
    'LBL_LIST_AMOUNT_USDOLLAR' => 'סך-הכל הצעת המחיר',
    'LBL_LIST_ASSIGNED_TO_NAME' => 'הוקצה למשתמש',
    'LBL_LIST_COST_PRICE' => 'עלות',
    'LBL_LIST_DATE_QUOTE_CLOSED' => 'סגירה בפועל',
    'LBL_LIST_DATE_QUOTE_EXPECTED_CLOSED' => 'בתוקף עד',
    'LBL_LIST_DISCOUNT_PRICE' => 'מחיר יחידה',
    'LBL_LIST_DEAL_TOT'=> 'הנחה',
    'LBL_LIST_FORM_TITLE' => 'רשימת הצעות מחיר',
    'LBL_LIST_GRAND_TOTAL' => 'סכום כולל',
    'LBL_LIST_LIST_PRICE' => 'רשימה',
    'LBL_LIST_MANUFACTURER_PART_NUM' => 'יצרן מספר',
    'LBL_LIST_PRICING_FACTOR' => 'פקטור',
    'LBL_LIST_PRICING_FORMULA' => 'נוסחת תימחור',
    'LBL_LIST_PRODUCT_NAME' => 'מוצר',
    'LBL_LIST_QUANTITY' => 'כמות',
    'LBL_LIST_QUOTE_NAME' => 'נושא',
    'LBL_LIST_QUOTE_NUM' => 'מספר',
    'LBL_LIST_QUOTE_STAGE' => 'שלב',
    'LBL_LIST_TAXCLASS' => 'סוג מס',
    'LBL_MODIFIED_BY'=>'שונה על ידי',
    'LBL_MODULE_NAME' => 'הצעות מחיר',
    'LBL_MODULE_TITLE' => 'הצעות מחיר: דף הבית',
    'LBL_NAME' => 'שם הצעת המחיר',
    'LBL_NEW_FORM_TITLE' => 'צור הצעת מחיר',
    'LBL_NEXT_STEP'=>'השלב הבא:',
    'LBL_OPPORTUNITY_NAME' => 'שם ההזדמנות:',
    'LBL_ORDER_STAGE'=>'שלב בהזמנות',
    'LBL_ORIGINAL_PO_DATE' =>  'תאריך הזמנת רכש מקורית:',
    'LBL_PAYMENT_TERMS' =>  'תנאי תשלום:',
    'LBL_PDF_BILLING_ADDRESS' => 'לחייב את',
    'LBL_PDF_CURRENCY' => 'מטבע:',
    'LBL_PDF_GRAND_TOTAL' => 'סך-בכל',
    'LBL_PDF_INVOICE_NUMBER' => 'חשבונית מספר',
    'LBL_PDF_INVOICE_TITLE' => 'חשבונית',
    'LBL_PDF_ITEM_EXT_PRICE' => 'סך-בכל מחיר',
    'LBL_PDF_ITEM_DISCOUNT' => 'הנחה',
    'LBL_PDF_ITEM_SELECT_DISCOUNT' => ' ',
    'LBL_PDF_ITEM_LIST_PRICE' => 'מחיר מחירון',
    'LBL_PDF_ITEM_PRODUCT' => 'מוצר',
    'LBL_PDF_ITEM_QUANTITY' => 'כמות',
    'LBL_PDF_ITEM_UNIT_PRICE' => 'מחיר יחידה',
    'LBL_PDF_PART_NUMBER' => 'מספר החלק:',
    'LBL_PDF_QUOTE_CLOSE' => 'בתוקף עד:',
    'LBL_PDF_QUOTE_DATE' => 'תאריך:',
    'LBL_PDF_QUOTE_NUMBER' => 'הצעת מחיר מספר:',
    'LBL_PDF_QUOTE_TITLE' => 'הצעת מחיר',
    'LBL_PDF_SALES_PERSON' => 'איש מכירות:',
    'LBL_PDF_SHIPPING_ADDRESS' => 'שלשלוח אל',
    'LBL_PDF_SHIPPING_COMPANY' => 'חברת שילוח:',
    'LBL_PDF_SHIPPING' => 'משלוח:',
    'LBL_PDF_SUBTOTAL' => 'סיכום ביניים:',
    'LBL_PDF_DISCOUNT' => 'הנחה:',
    'LBL_PDF_NEW_SUB' => 'סיכום ביניים להנחה:',
    'LBL_PDF_TAX_RATE' => 'שיעור המס:',
    'LBL_PDF_TAX' => 'מס:',
    'LBL_PDF_TOTAL' => 'סך-בכל:',
    'LBL_POSTAL_CODE' => 'מיקוד:',
    'LBL_PROJECTS_SUBPANEL_TITLE' => 'פרויקטים',
    'LBL_PROPOSAL'=>'הצעת מחיר',
    'LBL_PURCHASE_ORDER_NUM' => 'מספר הזמנת רכש:',
    'LBL_QUOTE_NAME' => 'נושא הצעת המחיר:',
    'LBL_QUOTE_NUM' => 'הצעת מחיר מספר:',
    'LBL_QUOTE_STAGE' => 'שלב בהצעת המחיר:',
    'LBL_QUOTE_TYPE'=>'סוג הצעת המחיר',
    'LBL_TAXABLE' => 'חייב במס',
    'LBL_NON_TAXABLE' => 'לא חייב במס',
    'LBL_QUOTE' => 'הצעת מחיר:',
    'LBL_QUOTE_LAYOUT_DOES_NOT_EXIST_ERROR' => 'quote layout file does not exist: $layout',
    'LBL_QUOTE_LAYOUT_REGISTERED_ERROR' => 'quote layout is not registered in modules/Quotes/Layouts.php',
    'LBL_REMOVE_COMMENT' => 'הסר הערות',
    'LBL_REMOVE_ROW' => 'הסר שורה',
    'LBL_RENAME_ERROR' => 'ERROR: can\'t move_pdf to $destination. You should try making the directory writable by the webserver',
    'LBL_SALES_STAGE'=>'שלב בהצעת המחיר:',
    'LBL_SEARCH_FORM_TITLE' => 'חיפוש הצעת מחיר',
    'LBL_SHIP_TO' => 'שלשוח אל',
    'LBL_SHIPPING_ACCOUNT_NAME' => 'שם חשבון למשלוח:',
    'LBL_SHIPPING_ACCOUNT' => 'חשבון:',
    'LBL_SHIPPING_ADDRESS_CITY' => 'עיר למשלוח',
    'LBL_SHIPPING_ADDRESS_COUNTRY' => 'מדינה למשלוח',
    'LBL_SHIPPING_ADDRESS_POSTAL_CODE' => 'מיקוד למשלוח',
    'LBL_SHIPPING_ADDRESS_STATE' => 'מצב המשלוח',
    'LBL_SHIPPING_ADDRESS_STREET' => 'כתובת למשלוח',
    'LBL_SHIPPING_ADDRESS' => 'כתובת למשלוח:',
    'LBL_SHIPPING_CONTACT_ID' => 'זהות איש קשר למשלוח:',
    'LBL_SHIPPING_CONTACT_NAME' => 'שם איש קשר למשלוח:',
    'LBL_SHIPPING_CONTACT' => 'איש קשר:',
    'LBL_SHIPPING_PROVIDER' => 'חברת שילוח:',
    'LBL_SHIPPING_USDOLLAR'=>'משלוח (בשקלים)',
    'LBL_DEAL_TOT'=>'סך-הכל הנחה',
    'LBL_DEAL_TOT_USDOLLAR'=>'סך-בכל הנחה (בשקלים)',
    'LBL_SHIPPING' => 'משלוח:',
    'LBL_DISCOUNT_TOTAL' => 'הנחה:',
    'LBL_NEW_SUB' => 'סיכום ביניים להנחה:',
    'LBL_SHOW_LINE_NUMS' => 'הצג שורות&nbsp;ומספרים:',
    'LBL_STATE' => 'ארץ:',
    'LBL_SUBTOTAL_USDOLLAR'=>'סיכום ביניים (בשקלים)',
    'LBL_SUBTOTAL' => 'סיכום ביניים:',
    'LBL_SYSTEM_ID' => 'זהות מערכתי',
    'LBL_TAX_USDOLLAR'=>'מס (בשקלים)',
    'LBL_TAX' => 'מס:',
    'LBL_TAXRATE' => 'שיעור המס:',
    'LBL_TOTAL_USDOLLAR'=>'סך-בכל (בשקלים)',
    'LBL_TOTAL' => 'סך-בכל:',
    'LBL_TYPE'=>'סוג:',
    'LNK_NEW_QUOTE' => 'צור הצעת מחיר',
    'LNK_QUOTE_LIST' => 'צפה בהצעת המחיר',
    'MSG_DUPLICATE' => 'You are creating a duplicate quote. You can either select an quote from the list below or you can click on Save to duplicate the quote.',
    'NTC_COPY_BILLING_ADDRESS' => 'העתק כתובת להתחשבנות אל כתובת למשלוח',
    'NTC_COPY_SHIPPING_ADDRESS' => 'העתק כתובת למשלוח אל כתובת להתחשבנות',
    'NTC_COPY_BILLING_ADDRESS2' => 'העתק אל משלוח',
    'NTC_COPY_SHIPPING_ADDRESS2' => 'העתק אל התחשבנות',  
    'NTC_REMOVE_COMMENT_CONFIRMATION' => 'אתה בטוח שברצונך להסיר הערה זו מהצעת המחיר?',  
    'NTC_REMOVE_PRODUCT_CONFIRMATION' => 'אתה בטוח שברצונך להסיר שורת הפריט הזה מהצעת המחיר?',
    'NTC_REMOVE_GROUP_CONFIRMATION' => 'אתה בטוח שברצונך להסיר קבוצה זו מהצעת המחיר?',
    'NTC_REMOVE_QUOTE_CONFIRMATION' => 'אתה בטוב שברצונך להסיר איש קשר זה מהצעת המחיר?',
    'QUOTE_REMOVE_PROJECT_CONFIRM' => 'אתה בטוח שברצונך להסיר הצעת מחיר זו מהפרוייקט?',
	'LNK_QUOTE_REPORTS' => 'צפייה בדוחות על הצעות מחיר',
	'LBL_ASSIGNED_TO_NAME'=>'הוקצה עבור:',
	'PDF_FORMAT'=>'PDF Format:',
	'LBL_ASSIGNED_TO_ID'=>'הוקצה למשתמש:',
	'LBL_PROJECT_SUBPANEL_TITLE' => 'פרויקטים',
	'LBL_QUOTE_INFORMATION' => 'סקירת הצעת המחיר',
);
?>


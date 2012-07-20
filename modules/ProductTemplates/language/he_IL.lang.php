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
  'ERR_DELETE_RECORD' => 'A record number must be specified to delete the product.',
  'LBL_ACCOUNT_NAME' => 'שם חשבון:',
  'LBL_ASSIGNED_TO' => 'הוקצה עבור:',
  'LBL_ASSIGNED_TO_ID' => 'הוקצה עבור זהות:',
  'LBL_CATEGORY_NAME'=>'שם קטגוריה:',
  'LBL_CATEGORY' => 'קטגוריה:',
  'LBL_CONTACT_NAME' => 'שם איש קשר:',
  'LBL_COST_PRICE' => 'עלות:',
  'LBL_COST_USDOLLAR' => 'עלות בשקלים:',
  'LBL_CURRENCY' => 'מטבע:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'סימול מטבע:',
  'LBL_DATE_AVAILABLE' => 'זמין מתאריך:',
  'LBL_DATE_COST_PRICE' => 'תאריך-עלות-מחיר:',
  'LBL_DESCRIPTION' => 'תיאור:',
  'LBL_DISCOUNT_PRICE_DATE' => 'תאריך מחיר בהנחה:',
  'LBL_DISCOUNT_PRICE' => 'מחיר ליחידה:',
  'LBL_DISCOUNT_USDOLLAR' => 'מחיר בהנחה בשקלים:',
  'LBL_LIST_CATEGORY' => 'קטגוריה:',
  'LBL_LIST_CATEGORY_ID' => 'קטגוריה זהות:',
  'LBL_LIST_COST_PRICE' => 'עלות:',
  'LBL_LIST_DISCOUNT_PRICE' => 'מחיר:',
  'LBL_LIST_FORM_TITLE' => 'רשימת קטלוג מוצרים',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'יצרן מספר',
  'LBL_LIST_LIST_PRICE' => 'רשימה',
  'LBL_LIST_MANUFACTURER' => 'יצרן',
  'LBL_LIST_MANUFACTURER_ID' => 'יצרן זהות:',
  'LBL_LIST_NAME' => 'שם',
  'LBL_LIST_PRICE' => 'מחיר מחירון:',
  'LBL_LIST_QTY_IN_STOCK' => 'יחידות',
  'LBL_LIST_STATUS' => 'זמינות',
  'LBL_LIST_TYPE' => 'סוג:',
  'LBL_LIST_TYPE_ID' => 'סוג זהות:',
  'LBL_LIST_USDOLLAR' => 'מחירון בשקלים:',
  'LBL_MANUFACTURER_NAME'=>'שם יצרן:',
  'LBL_MANUFACTURER' => 'יצרן:',
  'LBL_MFT_PART_NUM' => 'מספר חלק אצל היצרן:',
  'LBL_MODULE_NAME' => 'קטלוג מוצרים',
  'LBL_MODULE_ID' => 'תבנית מוצרים',  
  'LBL_MODULE_TITLE' => 'קטלוג מוצרים: דף בית',
  'LBL_NAME' => 'שם מוצר:',
  'LBL_NEW_FORM_TITLE' => 'צור צוות',
  'LBL_PERCENTAGE' => 'אחוזים(%)',
  'LBL_POINTS' => 'נקודות',
  'LBL_PRICING_FORMULA' => 'נוסחת תמחור בררת מחדל :',
  'LBL_PRICING_FACTOR' => 'פקטור תימחור:',
  'LBL_PRODUCT' => 'מוצר:',
  'LBL_PRODUCT_ID' => 'מוצר זהות:',
  'LBL_QUANTITY' => 'כמות במלאי:',
  'LBL_RELATED_PRODUCTS' => 'מוצרים קשורים',
  'LBL_SEARCH_FORM_TITLE' => 'חיפוש קטלוג מוצר',
  'LBL_STATUS' => 'זמינות:',
  'LBL_SUPPORT_CONTACT' => 'איש תמיכה:',
  'LBL_SUPPORT_DESCRIPTION' => 'תיאור התמיכה:',
  'LBL_SUPPORT_NAME' => 'שם איש התמיכה:',
  'LBL_SUPPORT_TERM' => 'תנאי התמיכה:',
  'LBL_TAX_CLASS' => 'סוגי מיסים:',
  'LBL_TYPE_NAME'=>'שם סוג',
  'LBL_TYPE' => 'סוג:',
  'LBL_URL' => 'לינק למוצר:',
  'LBL_VENDOR_PART_NUM' => 'מספר חלק אצל ספק:',
  'LBL_WEIGHT' => 'משקל:',
  'LNK_IMPORT_PRODUCTS'=>'ייבוא מוצרים',
  'LNK_NEW_MANUFACTURER' => 'יצרנים',
  'LNK_NEW_PRODUCT_CATEGORY' => 'קטגוריות מוצרים',
  'LNK_NEW_PRODUCT_TYPE' => 'סוגי מוצרים',
  'LNK_NEW_PRODUCT' => 'צור מוצר עבור קטלוג',
  'LNK_NEW_SHIPPER' => 'ספקי שילוח',
  'LNK_PRODUCT_LIST' => 'צפייה בקטלוג מוצרים',
  'NTC_DELETE_CONFIRMATION' => 'Are you sure you want to delete this record?',
);


?>

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
        'LBL_MODULE_NAME' => 'מסמכים',
    'LBL_MODULE_TITLE' => 'מסמכים: דף ראשי',
    'LNK_NEW_DOCUMENT' => 'צור מסמך',
    'LNK_DOCUMENT_LIST'=> 'צפייה במסמכים',
    'LBL_DOC_REV_HEADER' => 'מסמכים בבדיקה מחדש',
    'LBL_SEARCH_FORM_TITLE'=> 'חיפוש מסמך',
        'LBL_DOCUMENT_ID' => 'זהות מסמך',
    'LBL_NAME' => 'שם מסמך',
    'LBL_DESCRIPTION' => 'תיאור',
    'LBL_CATEGORY' => 'קטגוריה',
    'LBL_SUBCATEGORY' => 'קטרורית משנה',
    'LBL_STATUS' => 'סטאטוס',
    'LBL_CREATED_BY'=> 'נוצר על ידי',
    'LBL_DATE_ENTERED'=> 'נוצר בתאריך',
    'LBL_DATE_MODIFIED'=> 'שונה בתאריך',
    'LBL_DELETED' => 'נמחק',
    'LBL_MODIFIED'=> 'שונה על ידי שזהותו',
    'LBL_MODIFIED_USER' => 'שונה על ידי',
    'LBL_CREATED'=> 'נוצר על ידי',
    'LBL_REVISIONS'=>'בדיקות מחדש',
    'LBL_RELATED_DOCUMENT_ID'=>'קשור למסמך שזהותו',
    'LBL_RELATED_DOCUMENT_REVISION_ID'=>'קשור למסמך בבדיקה מחדש שזהותה',
    'LBL_IS_TEMPLATE'=>'מדובר בתבנית',
    'LBL_TEMPLATE_TYPE'=>'סוג מסמך',
    'LBL_ASSIGNED_TO_NAME'=>'הוקצה עבור:',
    'LBL_REVISION_NAME' => 'בדיקה מחדש מספר',
    'LBL_MIME' => 'Mime סוג',
    'LBL_REVISION' => 'בדיקה מחדש',
    'LBL_DOCUMENT' => 'מסמכים קשורים',
    'LBL_LATEST_REVISION' => 'בדיקה מחדש האחרונה',
    'LBL_CHANGE_LOG'=> 'יומן שינויים',
    'LBL_ACTIVE_DATE'=> 'פורסם בתאריך',
    'LBL_EXPIRATION_DATE' => 'תאריך תפוגה',
    'LBL_FILE_EXTENSION'  => 'סיומת קובץ',
    'LBL_LAST_REV_MIME_TYPE' => 'בדיקה מחדש האחרונה MIME type',
    'LBL_CAT_OR_SUBCAT_UNSPEC'=>'לא מוגדר',
        'LBL_NEW_FORM_TITLE' => 'המסמך שלי',
        'LBL_DOC_NAME' => 'שם מסמך:',
    'LBL_FILENAME' => 'שם קובץ:',
    'LBL_DOC_VERSION' => 'בדיקה מחדש:',
    'LBL_CATEGORY_VALUE' => 'קטגוריה:',
    'LBL_SUBCATEGORY_VALUE'=> 'קטגורית משנה:',
    'LBL_DOC_STATUS'=> 'סטאטוס:',
    'LBL_LAST_REV_CREATOR' => 'בדיקה מחדש נוצרה על ידי:',
    'LBL_LASTEST_REVISION_NAME' => 'שם הבדיקה מחדש האחרונה:',
    'LBL_SELECTED_REVISION_NAME' => 'שמות שנבחרו לבדיקה מחדש:',
    'LBL_CONTRACT_STATUS' => 'סטאטוס איש קשר:',
    'LBL_CONTRACT_NAME' => 'שם איש קשר:',
    'LBL_LAST_REV_DATE' => 'תאריך בדיקה מחדש:',
    'LBL_DOWNNLOAD_FILE'=> 'הורד קובץ:',
    'LBL_DET_RELATED_DOCUMENT'=>'קובץ שקשור:',
    'LBL_DET_RELATED_DOCUMENT_VERSION'=>"בדיקה מחדש של מסמך שקשור:",
    'LBL_DET_IS_TEMPLATE'=>'תבנית? :',
    'LBL_DET_TEMPLATE_TYPE'=>'סוג מסמך:',
    'LBL_TEAM'=> 'צוות:',
    'LBL_DOC_DESCRIPTION'=>'תיאור:',
    'LBL_DOC_ACTIVE_DATE'=> 'פורסם בתאריך:',
    'LBL_DOC_EXP_DATE'=> 'תאריך תפוגה:',

        'LBL_LIST_FORM_TITLE' => 'רשימת מסמכים',
    'LBL_LIST_DOCUMENT' => 'מסמך',
    'LBL_LIST_CATEGORY' => 'קטגוריה',
    'LBL_LIST_SUBCATEGORY' => 'קטגורית משנה',
    'LBL_LIST_REVISION' => 'בדיקה מחדש',
    'LBL_LIST_LAST_REV_CREATOR' => 'פורסם על ידי',
    'LBL_LIST_LAST_REV_DATE' => 'תאריך בדיקה מחדש',
    'LBL_LIST_VIEW_DOCUMENT'=>'צפייה',
    'LBL_LIST_DOWNLOAD'=> 'הורדה',
    'LBL_LIST_ACTIVE_DATE' => 'תאריך פרסום',
    'LBL_LIST_EXP_DATE' => 'תאריך תפוגה',
    'LBL_LIST_STATUS'=>'סטאטוס',
    'LBL_LINKED_ID' => 'זהות הקישור',
    'LBL_SELECTED_REVISION_ID' => 'זהות בדיקה מחדש שנבחרה',
    'LBL_LATEST_REVISION_ID' => 'זהות בדיקה מחדש האחרונה',
    'LBL_SELECTED_REVISION_FILENAME' => 'שם קובץ של הבדיקה המחדש',
    'LBL_FILE_URL' => 'כתובת של הקובץ',
    'LBL_REVISIONS_PANEL' => 'פרטי הבדיקה מחדש',
    'LBL_REVISIONS_SUBPANEL' => 'בדיקות מחדש',

        'LBL_SF_DOCUMENT' => 'שם המסמך:',
    'LBL_SF_CATEGORY' => 'קטגוריה:',
    'LBL_SF_SUBCATEGORY'=> 'קטגרית משנה:',
    'LBL_SF_ACTIVE_DATE' => 'תאריך פרסום:',
    'LBL_SF_EXP_DATE'=> 'תאריך תפוגה:',

    'DEF_CREATE_LOG' => 'מסמך נוצר',

        'ERR_DOC_NAME'=>'שם מסמך',
    'ERR_DOC_ACTIVE_DATE'=>'תאריך פרסום',
    'ERR_DOC_EXP_DATE'=> 'תאריך תפוגה',
    'ERR_FILENAME'=> 'שם קובץ',
    'ERR_DOC_VERSION'=> 'גרסת המסמך',
    'ERR_DELETE_CONFIRM'=> 'Do you want to delete this document revision?',
    'ERR_DELETE_LATEST_VERSION'=> 'You are not allowed to delete the latest revision of a document.',
    'LNK_NEW_MAIL_MERGE' => 'מיזוג דואר',
    'LBL_MAIL_MERGE_DOCUMENT' => 'תבנית מיזוג דואר:',

    'LBL_TREE_TITLE' => 'מסמכים',
        'LBL_LIST_DOCUMENT_NAME'=>'שם מסמך',
    'LBL_CONTRACT_NAME'=>'שם מסמך:',
    'LBL_LIST_IS_TEMPLATE'=>'תבנית?',
    'LBL_LIST_TEMPLATE_TYPE'=>'סוג מסמך',
    'LBL_LIST_SELECTED_REVISION'=>'בדיקה מחדש שנבחרה',
    'LBL_LIST_LATEST_REVISION'=>'בדיקה מחדש האחרונה',
    'LBL_CONTRACTS_SUBPANEL_TITLE'=>'אנשי קשר קשורים',
    'LBL_LAST_REV_CREATE_DATE'=>'תאריך יצירה של הבדיקה מחדש האחרונה',
        'LBL_CONTRACTS' => 'חוזים',
    'LBL_CREATED_USER' => 'תמש שנוצר',
    'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'בדיקות מחדש',
    'LBL_DOCUMENT_INFORMATION' => 'סקירת מסמכים',
);


?>

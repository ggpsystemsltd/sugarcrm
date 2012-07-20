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

$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'מסמכים',
	'LBL_MODULE_TITLE' => 'מסמכים: דף בית',
	'LNK_NEW_DOCUMENT' => 'צור מסמך',
	'LNK_DOCUMENT_LIST'=> 'רשימת מסמכים',
	'LBL_SEARCH_FORM_TITLE'=> 'חפש מסמך',
	//vardef labels
	'LBL_DOCUMENT_ID' => 'מסמך ID',
	'LBL_NAME' => 'שם משסמך',
	'LBL_DESCRIPTION' => 'תיאור',
	'LBL_ASSIGNED_TO' => 'הוקצה עבור:',
	'LBL_CATEGORY' => 'קטגוריה',
	'LBL_SUBCATEGORY' => 'קטגורית משנה',
	'LBL_STATUS' => 'סטאטוס',
	'LBL_IS_TEMPLATE'=>'מדובר בתבנית',
	'LBL_TEMPLATE_TYPE'=>'סוג מסמך',
	'LBL_REVISION_NAME' => 'רויזיה מספר',
	'LBL_MIME' => 'Mime סוג',
	'LBL_REVISION' => 'רויזיה',
	'LBL_DOCUMENT' => 'מסמכים שקשורים',
	'LBL_LATEST_REVISION' => 'רויזיה אחרונה',
	'LBL_CHANGE_LOG'=> 'יומן שינויים',
	'LBL_ACTIVE_DATE'=> 'תאריך פרסום',
	'LBL_EXPIRATION_DATE' => 'תאריך תפוגה',
	'LBL_FILE_EXTENSION'  => 'סיומת קובץ',

	'LBL_CAT_OR_SUBCAT_UNSPEC'=>'לא מוגדר',
	//quick search
	'LBL_NEW_FORM_TITLE' => 'מסמך חדש',
	//document edit and detail view
	'LBL_DOC_NAME' => 'שם מסמך:',
	'LBL_FILENAME' => 'שם קובץ:',
	'LBL_DOC_VERSION' => 'רויזיה:',
	'LBL_CATEGORY_VALUE' => 'קטגוריה:',
	'LBL_SUBCATEGORY_VALUE'=> 'קטגורית משנה:',
	'LBL_DOC_STATUS'=> 'סטאטוס:',
	'LBL_DET_TEMPLATE_TYPE'=>'סוג מסמך:',
	'LBL_TEAM'=> 'צוות:',
	'LBL_DOC_DESCRIPTION'=>'תיאור:',
	'LBL_DOC_ACTIVE_DATE'=> 'תאריך פרסום:',
	'LBL_DOC_EXP_DATE'=> 'תאריך תפוגה:',

	//document list view.
	'LBL_LIST_FORM_TITLE' => 'רשימת מסמכים',
	'LBL_LIST_DOCUMENT' => 'מסמך',
	'LBL_LIST_CATEGORY' => 'קטגוריה',
	'LBL_LIST_SUBCATEGORY' => 'תת קטגוריה',
	'LBL_LIST_REVISION' => 'רויזיה',
	'LBL_LIST_LAST_REV_CREATOR' => 'פורסם על ידי',
	'LBL_LIST_LAST_REV_DATE' => 'רויזיה בתאריך',
	'LBL_LIST_VIEW_DOCUMENT'=>'צפה',
    'LBL_LIST_DOWNLOAD'=> 'הורד',
	'LBL_LIST_ACTIVE_DATE' => 'תאריך פרסום',
	'LBL_LIST_EXP_DATE' => 'תאריך תפוגה',
	'LBL_LIST_STATUS'=>'סטאטוס',

	//document search form.
	'LBL_SF_DOCUMENT' => 'שם מסמך:',
	'LBL_SF_CATEGORY' => 'קטגוריה:',
	'LBL_SF_SUBCATEGORY'=> 'תת קטגוריה:',
	'LBL_SF_ACTIVE_DATE' => 'תאריך פרסום:',
	'LBL_SF_EXP_DATE'=> 'תאריך תפוגה:',

	'DEF_CREATE_LOG' => 'מסמך נוצר',

	//error messages
	'ERR_DOC_NAME'=>'שם מסמך',
	'ERR_DOC_ACTIVE_DATE'=>'פורסם בתאריך',
	'ERR_DOC_EXP_DATE'=> 'תאריך תפוגה',
	'ERR_FILENAME'=> 'שם קובץ',

	'LBL_TREE_TITLE' => 'מסמכים',
	//sub-panel vardefs.
	'LBL_LIST_DOCUMENT_NAME'=>'שם המסמך',
);


?>


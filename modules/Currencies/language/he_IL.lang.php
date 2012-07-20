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
  'LBL_MODULE_NAME' => 'מטבעות',
  'LBL_LIST_FORM_TITLE' => 'מטבעות',
  'LBL_CURRENCY' => 'מטבע',
  'LBL_ADD' => 'הוסף',
  'LBL_MERGE' => 'מזג',
  'LBL_MERGE_TXT' => 'Please select the currencies you would like to map to the selected currency. This will delete all the currencies with a checkmark and reassign any value associated with them to the selected currency.',
  'LBL_US_DOLLAR' => 'דולר ארצות-הברית',
  'LBL_DELETE' => 'מחק',
  'LBL_LIST_SYMBOL' => 'סימול מטבע',
  'LBL_LIST_NAME' => 'שם מטבע',
  'LBL_LIST_ISO4217' => 'ISO 4217 קוד',
  'LBL_LIST_ISO4217_HELP' => 'Enter a three-letter ISO 4217 code that defines the currency name and currency symbol.',
  'LBL_UPDATE' => 'עדכן',
  'LBL_LIST_RATE' => 'שער חליפין',
  'LBL_LIST_RATE_HELP' => 'A Conversion Rate of 0.5 for Euro means that 10 USD = 5 Euro.',
  'LBL_LIST_STATUS' => 'סטאטוס',
  'LNK_NEW_CONTACT' => 'איש קשר חדש',
  'LNK_NEW_ACCOUNT' => 'חשבון חדש',
  'LNK_NEW_OPPORTUNITY' => 'הזדמנות חדשה',
  'LNK_NEW_CASE' => 'אירוע חדש',
  'LNK_NEW_NOTE' => 'צור פתק או צרופה',
  'LNK_NEW_CALL' => 'שיחת טלפון חדשה',
  'LNK_NEW_EMAIL' => 'דואר אלקטרוני חדש',
  'LNK_NEW_MEETING' => 'פגישה חדשה',
  'LNK_NEW_TASK' => 'צור משימה',
  'NTC_DELETE_CONFIRMATION' => 'Are you sure you want to delete this record? Any record using this currency will be converted to the system default currency when they are accessed. It may be better to set the status to inactive.',
  'LBL_BELOW_MIN' => 'Conversion rate has to be above 0',
  'currency_status_dom' => 
  array (
    'Active' => 'פעיל',
    'Inactive' => 'לא פעיל',
  ),
);


?>

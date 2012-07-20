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

    'LBL_MODULE_NAME' => 'תחזיות',
  'LNK_NEW_OPPORTUNITY' => 'צור הזדמנות',
  'LBL_MODULE_TITLE' => 'הזדמנויות',
  'LBL_LIST_FORM_TITLE' => 'תחזיות שנמסרו',
  'LNK_UPD_FORECAST' => 'גיליון עבודה לתחזיות',
  'LNK_QUOTA' => 'מיכסות',
  'LNK_FORECAST_LIST' => 'צפייה בהסטוריה של תחזיות',
  'LBL_FORECAST_HISTORY' => 'תחזיות: הסטוריה',
  'LBL_FORECAST_HISTORY_TITLE' => 'תחזיות: הסטוריה',
  
    'LBL_TIMEPERIOD_NAME' => 'משך זמן',
  'LBL_USER_NAME' => 'שם משתמש',
  'LBL_REPORTS_TO_USER_NAME' => 'מצווח אל',
  
    'LBL_FORECAST_ID' => 'ID',
  'LBL_FORECAST_TIME_ID' => 'משך זמן זהות',
  'LBL_FORECAST_TYPE' => 'סוג תחזית',
  'LBL_FORECAST_OPP_COUNT' => 'הזדמנויות',
  'LBL_FORECAST_OPP_WEIGH'=> 'סכומים משוכללים',
  'LBL_FORECAST_OPP_COMMIT' => 'המקרה הסביר',
  'LBL_FORECAST_OPP_BEST_CASE'=>'במקרה הטוב ביותר',
  'LBL_FORECAST_OPP_WORST'=>'במקרה הגרוע ביותר',
  'LBL_FORECAST_USER' => 'משתמש',
  'LBL_DATE_COMMITTED'=> 'נמסר בתחזית',
  'LBL_DATE_ENTERED' => 'הוזן בתאריך',
  'LBL_DATE_MODIFIED' => 'שונה בתאריך',
  'LBL_CREATED_BY' => 'נוצר על ידי',
  'LBL_DELETED' => 'נמחק',
  
     'LBL_QC_TIME_PERIOD' => 'משך זמן:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'הזדמנות שבאה בחשבון:',
  'LBL_QC_WEIGHT_VALUE' => 'סכום משוקלל:',
  'LBL_QC_COMMIT_VALUE' => 'סכום שהוקצה:',
  'LBL_QC_COMMIT_BUTTON' => 'בצע',
  'LBL_QC_WORKSHEET_BUTTON' => 'גיליון עבודה',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'סכום שהוקצה כלפי מעלה:',
  'LBL_QC_DIRECT_FORECAST' => 'התחזיות הישירות שלי:',
  'LBL_QC_ROLLUP_FORECAST' => 'תחזיות של הקבוצה שלי:',
  'LBL_QC_UPCOMING_FORECASTS' => 'התחזיות שלי',
  'LBL_QC_LAST_DATE_COMMITTED' => 'תאריך אחרון לביצוע:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'סכום אחרון שהוקצה:',
  'LBL_QC_HEADER_DELIM'=> 'אל',
  
    'LBL_OW_OPPORTUNITIES' => "הזדמנות",
  'LBL_OW_ACCOUNTNAME' => "חשבון",
  'LBL_OW_REVENUE' => "סכום",
  'LBL_OW_WEIGHTED' => "סכום משוקלל",
  'LBL_OW_MODULE_TITLE'=> 'גליון עבודה להזדמנות',
  'LBL_OW_PROBABILITY'=>'הסתברות',
  'LBL_OW_NEXT_STEP'=>'השלב הבא',
  'LBL_OW_DESCRIPTION'=>'תיאור',
  'LBL_OW_TYPE'=>'סוג',

    'LNK_NEW_TIMEPERIOD' => 'צור משך זמן',
  'LNK_TIMEPERIOD_LIST' => 'צפייה במשכי הזמן',
  
    'LBL_SVFS_FORECASTDATE' => 'תאריך התחלה מתוזמן',
  'LBL_SVFS_STATUS' => 'סטאטוס',
  'LBL_SVFS_USER' => 'עבור',
  'LBL_SVFS_CASCADE' => 'לדרג עבור דוחות?',
  'LBL_SVFS_HEADER' => 'תיזמון תחזית:',
  
     'LB_FS_KEY' => 'ID',
   'LBL_FS_TIMEPERIOD_ID' => 'משך זמן זהות',
   'LBL_FS_USER_ID' => 'משתמש זהות',
   'LBL_FS_TIMEPERIOD' => 'משך זמן',   
   'LBL_FS_START_DATE' => 'תאריך התחלה',
   'LBL_FS_END_DATE' => 'תאריך סיום',
   'LBL_FS_FORECAST_START_DATE' => "תאריך התחלה לתחזית",
   'LBL_FS_STATUS' => 'סטאטוס',
   'LBL_FS_FORECAST_FOR' => 'מתוזמן עבור:',
   'LBL_FS_CASCADE' =>'לדרג?',  
   'LBL_FS_MODULE_NAME' => 'תחזית מתוזמנת',
   'LBL_FS_CREATED_BY' =>'נותר על ידי',
   'LBL_FS_DATE_ENTERED' => 'הוזן בתאריך',
   'LBL_FS_DATE_MODIFIED' => 'שונה בתאריך',
   'LBL_FS_DELETED' => 'נמחק',
    
    'LBL_FDR_USER_NAME'=>'דוחות ישירים',
  'LBL_FDR_OPPORTUNITIES'=>'הזדמנויות בתחזית:',
  'LBL_FDR_WEIGH'=>'סכום משוכלל עבור הזדמנות:',
  'LBL_FDR_COMMIT'=>'סכום שהתחייבו עבורו',
  'LBL_FDR_DATE_COMMIT'=>'תאריך ההתחיבות',
  
    'LBL_DV_HEADER' => 'תחזיות:גיליון עבודה',
  'LBL_DV_MY_FORECASTS' => 'התחזיות שלי',
  'LBL_DV_MY_TEAM' => "התחזיות של הצוות שלי" ,
  'LBL_DV_TIMEPERIODS' => 'משכי זמן:',
  'LBL_DV_FORECAST_PERIOD' => 'משכי זמן לתחזית',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'תחזית להזדמנויות',
  'LBL_SEARCH' => 'בחר',
  'LBL_SEARCH_LABEL' => 'בחר',
  'LBL_COMMIT_HEADER' => 'בצע תחזית',
  'LBL_DV_LAST_COMMIT_DATE' =>'תאריך ביצוע אחרון:',
  'LBL_DV_LAST_COMMIT_AMOUNT' =>'סכום אחרון לביצוע:',
  'LBL_DV_FORECAST_ROLLUP' => 'גלגול תחזית',
  'LBL_DV_TIMEPERIOD' => 'משך זמן:',
  'LBL_DV_TIMPERIOD_DATES' => 'טווח תאריכים:',
  
    'LBL_LV_TIMPERIOD'=> 'משך זמן',
  'LBL_LV_TIMPERIOD_START_DATE'=> 'תאריך התחלה',
  'LBL_LV_TIMPERIOD_END_DATE'=> 'תאריך סיום',
  'LBL_LV_TYPE'=> 'סוג תחזית',
  'LBL_LV_COMMIT_DATE'=> 'תאריך לביצוע',  
  'LBL_LV_OPPORTUNITIES'=> 'הזדחנויות',
  'LBL_LV_WEIGH'=> 'סכום משוכלל',
  'LBL_LV_COMMIT'=> 'סכום לביצוע',
  
  'LBL_COMMIT_NOTE'=> 'הכנס סכום שתרצה להקצות לתקופת הזמן הנבחרת:',
  
  'LBL_COMMIT_MESSAGE'=> 'האם ברצונך להקצות סכום זה?',
  'ERR_FORECAST_AMOUNT' => 'חוסה לציין סכום להתחייבות והסכום חייב להיות בספרות.',

    'LBL_FC_START_DATE' => 'תאריך התחלה',
  'LBL_FC_USER' => 'מתוזמן עבור',
  
  'LBL_NO_ACTIVE_TIMEPERIOD'=>'אין משכי זמן פעילים לביצוע תחזיות.',
  'LBL_FDR_ADJ_AMOUNT'=>'סבום מתואם',
  'LBL_SAVE_WOKSHEET'=>'שמור גליון עבודה',
  'LBL_RESET_WOKSHEET'=>'אתחל גליון עבודה',
  'LBL_RESET_CHECK'=>'All worksheet data for the selected time period and logged in user will be removed. Continue?',
  
  'LB_FS_LIKELY_CASE'=>'המקרה הסביר',
  'LB_FS_WORST_CASE'=>'המקרה הגרוע',
  'LB_FS_BEST_CASE'=>'המקרה הטוב',
  'LBL_FDR_WK_LIKELY_CASE'=>'הערכה, המקרה הסביר',
  'LBL_FDR_WK_BEST_CASE'=> 'הערכה, המקרה הטוב',
  'LBL_FDR_WK_WORST_CASE'=>'הערכה, המקרה הגרוע',
  'LBL_BEST_CASE'=>'המקרה הטוב:',
  'LBL_LIKELY_CASE'=>'המקרה הסביר:',
  'LBL_WORST_CASE'=>'המקרה הגרוע:',
  'LBL_FDR_C_BEST_CASE'=>'המקרה הטוב',
  'LBL_FDR_C_WORST_CASE'=>'המקרה הגרוע',
  'LBL_FDR_C_LIKELY_CASE'=>'המקרה הסביר',
  'LBL_QC_LAST_BEST_CASE'=>'סכום התחייבות אחרון (המקרה הטוב):',
  'LBL_QC_LAST_LIKELY_CASE'=>'סכום התחייבות אחרון (המקרה הסביר):',
  'LBL_QC_LAST_WORST_CASE'=>'סכום התחייבות אחרון (המקרה הגרוע):',
  'LBL_QC_ROLL_BEST_VALUE'=>'סכום התחייבות כלפי מעלה (המקרה הטוב):',
  'LBL_QC_ROLL_LIKELY_VALUE'=>'סכום התחייבות כלפי מעלה (המקרה הסבירר):',
  'LBL_QC_ROLL_WORST_VALUE'=>'סכום התחייבות כלפי מעלה (המקרה הגרועע):',  
  'LBL_QC_COMMIT_BEST_CASE'=>'סכום ההתחיבות (המקרה הטובב):',
  'LBL_QC_COMMIT_LIKELY_CASE'=>'סכום ההתחיבות (המקרה הסביר):',
  'LBL_QC_COMMIT_WORST_CASE'=>'סכום ההתחיבות (המקרה הגרוע):',

);


?>



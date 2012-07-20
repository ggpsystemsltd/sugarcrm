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
  'LBL_MODULE_TITLE' => 'תחזיות',
  'LBL_LIST_FORM_TITLE' => 'תחזיות שבוצעו',
  'LNK_UPD_FORECAST' => 'גיליון עבודה לתחזית',
  'LNK_QUOTA' => 'הצג מכסה',
  'LNK_FORECAST_LIST' => 'צפה בהסטוריה של התחזית',
  'LBL_FORECAST_HISTORY' => 'תחזיות: הסטוריה',
  'LBL_FORECAST_HISTORY_TITLE' => 'הסטוריה',
  
    'LBL_TIMEPERIOD_NAME' => 'שמכי זמן',
  'LBL_USER_NAME' => 'שם משתמש',
  'LBL_REPORTS_TO_USER_NAME' => 'מדווח אל',
  
    'LBL_FORECAST_ID' => 'ID',
  'LBL_FORECAST_TIME_ID' => 'משך זמן זהות',
  'LBL_FORECAST_TYPE' => 'סוג תחזית',
  'LBL_FORECAST_OPP_COUNT' => 'הזדמנויות',
  'LBL_FORECAST_OPP_WEIGH'=> 'סכום משוקלל',
  'LBL_FORECAST_OPP_COMMIT' => 'המקרה הסביר',
  'LBL_FORECAST_OPP_BEST_CASE'=>'במקרה הטוב',
  'LBL_FORECAST_OPP_WORST'=>'במקרה הגרוע',
  'LBL_FORECAST_USER' => 'משתמש',
  'LBL_DATE_COMMITTED'=> 'בוצע בתאריך',
  'LBL_DATE_ENTERED' => 'הוזן בתאריך',
  'LBL_DATE_MODIFIED' => 'שונה בתאריך',
  'LBL_CREATED_BY' => 'נוצר על ידי',
  'LBL_DELETED' => 'נמחק',
  'LBL_MODIFIED_USER_ID'=>'שונה על ידי',

     'LBL_QC_TIME_PERIOD' => 'משך זמן:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'הזדמנות שנלקחת בחשבון:',
  'LBL_QC_WEIGHT_VALUE' => 'סכום משוקלל:',
  'LBL_QC_COMMIT_VALUE' => 'סכום שהוקצה:',
  'LBL_QC_COMMIT_BUTTON' => 'בוצע',
  'LBL_QC_WORKSHEET_BUTTON' => 'גיליון עבודה',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'סכום שהוקצה מוערך כלפי מעלה:',
  'LBL_QC_DIRECT_FORECAST' => 'תחזיות ישירות שלי:',
  'LBL_QC_ROLLUP_FORECAST' => 'תחזיות של הקבוצה שלי:',
  'LBL_QC_UPCOMING_FORECASTS' => 'התחזיות שלי',
  'LBL_QC_LAST_DATE_COMMITTED' => 'תאריך אחרון לביצוע:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'סכום אחרון לביצוע:',
  'LBL_QC_HEADER_DELIM'=> 'אל',
  
    'LBL_OW_OPPORTUNITIES' => "הזדמנות",
  'LBL_OW_ACCOUNTNAME' => "חשבון",
  'LBL_OW_REVENUE' => "סכום",
  'LBL_OW_WEIGHTED' => "סכום משוקלל",
  'LBL_OW_MODULE_TITLE'=> 'גיליון עבודה להזדמנות',
  'LBL_OW_PROBABILITY'=>'הסתברות',
  'LBL_OW_NEXT_STEP'=>'השלב הבא',
  'LBL_OW_DESCRIPTION'=>'תיאור',
  'LBL_OW_TYPE'=>'סוג',

    'LNK_NEW_TIMEPERIOD' => 'צור משך זמן',
  'LNK_TIMEPERIOD_LIST' => 'צפייה במשכי זמן',
  
    'LBL_SVFS_FORECASTDATE' => 'תזמן תאריך התחלה',
  'LBL_SVFS_STATUS' => 'סטאטוס',
  'LBL_SVFS_USER' => 'עבור',
  'LBL_SVFS_CASCADE' => 'Cascade to Reports?',
  'LBL_SVFS_HEADER' => 'תזמן תחזית:',
  
     'LB_FS_KEY' => 'ID',
   'LBL_FS_TIMEPERIOD_ID' => 'Time Period ID',
   'LBL_FS_USER_ID' => 'User ID',
   'LBL_FS_TIMEPERIOD' => 'משך זמן',   
   'LBL_FS_START_DATE' => 'תאריך התחלה',
   'LBL_FS_END_DATE' => 'תאריך סיום',
   'LBL_FS_FORECAST_START_DATE' => "תאריך התחלה של התחזית",
   'LBL_FS_STATUS' => 'סטאטוס',
   'LBL_FS_FORECAST_FOR' => 'מתוזמן עבור:',
   'LBL_FS_CASCADE' =>'Cascade?',  
   'LBL_FS_MODULE_NAME' => 'תיזמון לתחזית',
   'LBL_FS_CREATED_BY' =>'נותר על ידי',
   'LBL_FS_DATE_ENTERED' => 'הוזן בתאריך',
   'LBL_FS_DATE_MODIFIED' => 'שונה בתאריך',
   'LBL_FS_DELETED' => 'נמחק',
    
    'LBL_FDR_USER_NAME'=>'דוח ישיר',
  'LBL_FDR_OPPORTUNITIES'=>'בזדמנויות בתחזית:',
  'LBL_FDR_WEIGH'=>'סכום משוקלל של התחזיות:',
  'LBL_FDR_COMMIT'=>'סכום לביצוע',
  'LBL_FDR_DATE_COMMIT'=>'תאריך לביצוע',
  
    'LBL_DV_HEADER' => 'תחזיות:גיליון עבודה',
  'LBL_DV_MY_FORECASTS' => 'התחזיות שלי',
  'LBL_DV_MY_TEAM' => "התחזיות של הצוות שלי" ,
  'LBL_DV_TIMEPERIODS' => 'משכי זמן:',
  'LBL_DV_FORECAST_PERIOD' => 'משך זמן לתחזית',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'הזדמנויות לתחזית',
  'LBL_SEARCH' => 'בחר',
  'LBL_SEARCH_LABEL' => 'בחר',
  'LBL_COMMIT_HEADER' => 'תחזית לביצוע',
  'LBL_DV_LAST_COMMIT_DATE' =>'תאריך ביצוע אחרון:',
  'LBL_DV_LAST_COMMIT_AMOUNT' =>'סכום אחרון לביצוע:',
  'LBL_DV_FORECAST_ROLLUP' => 'Forecast Rollup',
  'LBL_DV_TIMEPERIOD' => 'משך זמן:',
  'LBL_DV_TIMPERIOD_DATES' => 'טווח תאריכים:',
  
    'LBL_LV_TIMPERIOD'=> 'Time periodמשך זמן',
  'LBL_LV_TIMPERIOD_START_DATE'=> 'תאריך התחלה',
  'LBL_LV_TIMPERIOD_END_DATE'=> 'תאריך סיום',
  'LBL_LV_TYPE'=> 'סוג תחזית',
  'LBL_LV_COMMIT_DATE'=> 'בוצעה בתאריך',  
  'LBL_LV_OPPORTUNITIES'=> 'הזדמנויות',
  'LBL_LV_WEIGH'=> 'סכום משוקלל',
  'LBL_LV_COMMIT'=> 'סכום שהוקצהCommitted Amount',
  
  'LBL_COMMIT_NOTE'=> 'Enter amounts that you would like to commit for the selected Time Period:',
  
  'LBL_COMMIT_MESSAGE'=> 'Do you want to commit these amounts?',
  'ERR_FORECAST_AMOUNT' => 'Commit Amount is required and must be a number.',

    'LBL_FC_START_DATE' => 'תאריך התחלה',
  'LBL_FC_USER' => 'מתוזמן עבור',
  
  'LBL_NO_ACTIVE_TIMEPERIOD'=>'No Active time periods for Forecasting.',
  'LBL_FDR_ADJ_AMOUNT'=>'סכום מתואם',
  'LBL_SAVE_WOKSHEET'=>'שמור גיליון עבודה',
  'LBL_RESET_WOKSHEET'=>'אתחל גיליון עבודה',
  'LBL_SHOW_CHART'=>'צפה בטבלה',
  'LBL_RESET_CHECK'=>'All worksheet data for the selected time period and logged in user will be removed. Continue?',
  
  'LB_FS_LIKELY_CASE'=>'במקרה הסביר',
  'LB_FS_WORST_CASE'=>'במקרה הגרוע',
  'LB_FS_BEST_CASE'=>'במקרה הטוב',
  'LBL_FDR_WK_LIKELY_CASE'=>'המקרה הסביר הערכה',
  'LBL_FDR_WK_BEST_CASE'=> 'במקרה הטוב הערכה',
  'LBL_FDR_WK_WORST_CASE'=>'במקרה הגרוע הערכה',
  'LBL_BEST_CASE'=>'במקרה הטוב:',
  'LBL_LIKELY_CASE'=>'במקרה הסביר:',
  'LBL_WORST_CASE'=>'במקרה הגורע:',
  'LBL_FDR_C_BEST_CASE'=>'במקרה הטוב',
  'LBL_FDR_C_WORST_CASE'=>'במקרה הגרוע',
  'LBL_FDR_C_LIKELY_CASE'=>'במקרה הסביר',
  'LBL_QC_LAST_BEST_CASE'=>'סכום סופי שהוקצה (במקרה הטוב):',
  'LBL_QC_LAST_LIKELY_CASE'=>'סכום סופי שהוקצה (במקרה הסביר):',
  'LBL_QC_LAST_WORST_CASE'=>'סכום סופי שהוקצה (במקרה הגרוע):',
  'LBL_QC_ROLL_BEST_VALUE'=>'סכום שהוקצה כלפי מעלה (במקרה הטוב):',
  'LBL_QC_ROLL_LIKELY_VALUE'=>'סכום שהוקצה כלפי מעלה (במקרה הסבירר):',
  'LBL_QC_ROLL_WORST_VALUE'=>'סכום שהוקצה כלפי מעלה (במקרה הגרוע):',  
  'LBL_QC_COMMIT_BEST_CASE'=>'סכום שהוקצה (במקרה הטוב):',
  'LBL_QC_COMMIT_LIKELY_CASE'=>'סכום שהוקצה (במקרה הסביר):',
  'LBL_QC_COMMIT_WORST_CASE'=>'סכום שהוקצה (במקרה הגרוע):',
  
  'LBL_FORECAST_FOR'=>'גיליון עבודה תחזית עבור: ',
  'LBL_FMT_ROLLUP_FORECAST'=>'(כלפי מעלה)',
  'LBL_FMT_DIRECT_FORECAST'=>'(ישיר)',

    'LBL_GRAPH_TITLE'=>'הסטוריה לתחזית',
  'LBL_GRAPH_QUOTA_ALTTEXT'=>'מכזה עבור %s',
  'LBL_GRAPH_COMMIT_ALTTEXT'=>'סכום שהוקצה עבור %s',
  'LBL_GRAPH_OPPS_ALTTEXT'=>'ערך ההזדמנויות שנסגרו ב %s',

  'LBL_GRAPH_QUOTA_LEGEND'=>'מכסה',
  'LBL_GRAPH_COMMIT_LEGEND'=>'תחזיות שהוקצו',
  'LBL_GRAPH_OPPS_LEGEND'=>'הזדמנויות שנסגרו',
  'LBL_TP_QUOTA'=>'מכסה:',
  'LBL_CHART_FOOTER'=>'Forecast History<br/>Quota vs Forecasted Amount vs Closed Opportunity Value',
  'LBL_TOTAL_VALUE'=>'סיכומים:',
  'LBL_COPY_AMOUNT'=>'סך-הכל סכום',
  'LBL_COPY_WEIGH_AMOUNT'=>'סך הכל סכום משוקלל',
  'LBL_WORKSHEET_AMOUNT'=>'סך הכל סכום מוערך',
  'LBL_COPY'=>'העתק ערכים',  
  'LBL_COMMIT_AMOUNT'=>'סיכום של ערכים שהוקצו.',
  'LBL_COPY_FROM'=>'העתק ערך מתוך:',
    
  'LBL_CHART_TITLE'=>'Quota vs. Committed vs. Actual',
);


?>



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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array (

  //module strings.
  'LBL_MODULE_NAME' => 'Forecasts',
  'LNK_NEW_OPPORTUNITY' => 'Create Opportunity',
  'LBL_MODULE_TITLE' => 'Forecasts',
  'LBL_LIST_FORM_TITLE' => 'Committed Forecasts',
  'LNK_UPD_FORECAST' => 'Forecast Worksheet',
  'LNK_QUOTA' => 'Quotas',
  'LNK_FORECAST_LIST' => 'View Forecast History',
  'LBL_FORECAST_HISTORY' => 'Forecasts: History',
  'LBL_FORECAST_HISTORY_TITLE' => 'Forecasts: History',
  
  //var defs
  'LBL_TIMEPERIOD_NAME' => 'Time Period',
  'LBL_USER_NAME' => 'User Name',
  'LBL_REPORTS_TO_USER_NAME' => 'Reports To',
  
  //forecast table
  'LBL_FORECAST_ID' => 'ID',
  'LBL_FORECAST_TIME_ID' => 'Time Period ID',
  'LBL_FORECAST_TYPE' => 'Forecast Type',
  'LBL_FORECAST_OPP_COUNT' => 'Opportunities',
  'LBL_FORECAST_OPP_WEIGH'=> 'Weighted Amount',
  'LBL_FORECAST_OPP_COMMIT' => 'Likely Case',
  'LBL_FORECAST_OPP_BEST_CASE'=>'Best Case',
  'LBL_FORECAST_OPP_WORST'=>'Worst Case',
  'LBL_FORECAST_USER' => 'User',
  'LBL_DATE_COMMITTED'=> 'Date Committed',
  'LBL_DATE_ENTERED' => 'Date Entered',
  'LBL_DATE_MODIFIED' => 'Date Modified',
  'LBL_CREATED_BY' => 'Created by',
  'LBL_DELETED' => 'Deleted',
  
   //Quick Commit labels.
  'LBL_QC_TIME_PERIOD' => 'Time Period:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Opportunity Count:',
  'LBL_QC_WEIGHT_VALUE' => 'Weighted Amount:',
  'LBL_QC_COMMIT_VALUE' => 'Commit Amount:',
  'LBL_QC_COMMIT_BUTTON' => 'Commit',
  'LBL_QC_WORKSHEET_BUTTON' => 'Worksheet',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Rollup Commit Amount:',
  'LBL_QC_DIRECT_FORECAST' => 'My Direct Forecast:',
  'LBL_QC_ROLLUP_FORECAST' => 'My Group Forecast:',
  'LBL_QC_UPCOMING_FORECASTS' => 'My Forecasts',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Last Commit Date:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Last Commit Amount:',
  'LBL_QC_HEADER_DELIM'=> 'To',
  
  //opportunity worksheet list view labels
  'LBL_OW_OPPORTUNITIES' => "Opportunity",
  'LBL_OW_ACCOUNTNAME' => "Account",
  'LBL_OW_REVENUE' => "Amount",
  'LBL_OW_WEIGHTED' => "Weighted Amount",
  'LBL_OW_MODULE_TITLE'=> 'Opportunity Worksheet',
  'LBL_OW_PROBABILITY'=>'Probability',
  'LBL_OW_NEXT_STEP'=>'Next Step',
  'LBL_OW_DESCRIPTION'=>'Description',
  'LBL_OW_TYPE'=>'Type',

  //forecast schedule shortcuts
  'LNK_NEW_TIMEPERIOD' => 'Create Time Period',
  'LNK_TIMEPERIOD_LIST' => 'View Time Periods',
  
  //Forecast schedule sub panel list view.
  'LBL_SVFS_FORECASTDATE' => 'Schedule Start Date',
  'LBL_SVFS_STATUS' => 'Status',
  'LBL_SVFS_USER' => 'For',
  'LBL_SVFS_CASCADE' => 'Cascade to Reports?',
  'LBL_SVFS_HEADER' => 'Forecast Schedule:',
  
  //Forecast Schedule detail; view.....
   'LB_FS_KEY' => 'ID',
   'LBL_FS_TIMEPERIOD_ID' => 'Time Period ID',
   'LBL_FS_USER_ID' => 'User ID',
   'LBL_FS_TIMEPERIOD' => 'Time Period',   
   'LBL_FS_START_DATE' => 'Start Date',
   'LBL_FS_END_DATE' => 'End Date',
   'LBL_FS_FORECAST_START_DATE' => "Forecast Start Date",
   'LBL_FS_STATUS' => 'Status',
   'LBL_FS_FORECAST_FOR' => 'Schedule For:',
   'LBL_FS_CASCADE' =>'Cascade?',  
   'LBL_FS_MODULE_NAME' => 'Forecast Schedule',
   'LBL_FS_CREATED_BY' =>'Created by',
   'LBL_FS_DATE_ENTERED' => 'Date Entered',
   'LBL_FS_DATE_MODIFIED' => 'Date Modified',
   'LBL_FS_DELETED' => 'Deleted',
    
  //forecast worksheet direct reports forecast
  'LBL_FDR_USER_NAME'=>'Direct Report',
  'LBL_FDR_OPPORTUNITIES'=>'Opportunities in forecast:',
  'LBL_FDR_WEIGH'=>'Weighted Amount of opportunities:',
  'LBL_FDR_COMMIT'=>'Committed Amount',
  'LBL_FDR_DATE_COMMIT'=>'Commit Date',
  
  //detail view.
  'LBL_DV_HEADER' => 'Forecasts:Worksheet',
  'LBL_DV_MY_FORECASTS' => 'My Forecasts',
  'LBL_DV_MY_TEAM' => "My Team's Forecasts" ,
  'LBL_DV_TIMEPERIODS' => 'Time Periods:',
  'LBL_DV_FORECAST_PERIOD' => 'Forecast Time Period',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Forecast Opportunities',
  'LBL_SEARCH' => 'Select',
  'LBL_SEARCH_LABEL' => 'Select',
  'LBL_COMMIT_HEADER' => 'Forecast Commit',
  'LBL_DV_LAST_COMMIT_DATE' =>'Last Commit Date:',
  'LBL_DV_LAST_COMMIT_AMOUNT' =>'Last Commit Amounts:',
  'LBL_DV_FORECAST_ROLLUP' => 'Forecast Rollup',
  'LBL_DV_TIMEPERIOD' => 'Time Period:',
  'LBL_DV_TIMPERIOD_DATES' => 'Date Range:',
  
  //list view
  'LBL_LV_TIMPERIOD'=> 'Time period',
  'LBL_LV_TIMPERIOD_START_DATE'=> 'Start Date',
  'LBL_LV_TIMPERIOD_END_DATE'=> 'End Date',
  'LBL_LV_TYPE'=> 'Forecast Type',
  'LBL_LV_COMMIT_DATE'=> 'Date Committed',  
  'LBL_LV_OPPORTUNITIES'=> 'Opportunities',
  'LBL_LV_WEIGH'=> 'Weighted Amount',
  'LBL_LV_COMMIT'=> 'Committed Amount',
  
  'LBL_COMMIT_NOTE'=> 'Enter amounts that you would like to commit for the selected Time Period:',
  
  'LBL_COMMIT_MESSAGE'=> 'Do you want to commit these amounts?',
  'ERR_FORECAST_AMOUNT' => 'Commit Amount is required and must be a number.',

  // js error strings
  'LBL_FC_START_DATE' => 'Start Date',
  'LBL_FC_USER' => 'Schedule For',
  
  'LBL_NO_ACTIVE_TIMEPERIOD'=>'No Active time periods for Forecasting.',
  'LBL_FDR_ADJ_AMOUNT'=>'Adjusted Amount',
  'LBL_SAVE_WOKSHEET'=>'Save Worksheet',
  'LBL_RESET_WOKSHEET'=>'Reset Worksheet',
  'LBL_RESET_CHECK'=>'All worksheet data for the selected time period and logged in user will be removed. Continue?',
  
  'LB_FS_LIKELY_CASE'=>'Likely Case',
  'LB_FS_WORST_CASE'=>'Worst Case',
  'LB_FS_BEST_CASE'=>'Best Case',
  'LBL_FDR_WK_LIKELY_CASE'=>'Est. Likely Case',
  'LBL_FDR_WK_BEST_CASE'=> 'Est. Best Case',
  'LBL_FDR_WK_WORST_CASE'=>'Est. Worst Case',
  'LBL_BEST_CASE'=>'Best Case:',
  'LBL_LIKELY_CASE'=>'Likely Case:',
  'LBL_WORST_CASE'=>'Worst Case:',
  'LBL_FDR_C_BEST_CASE'=>'Best Case',
  'LBL_FDR_C_WORST_CASE'=>'Worst Case',
  'LBL_FDR_C_LIKELY_CASE'=>'Likely Case',
  'LBL_QC_LAST_BEST_CASE'=>'Last Commit Amount (Best Case):',
  'LBL_QC_LAST_LIKELY_CASE'=>'Last Commit Amount (Likely Case):',
  'LBL_QC_LAST_WORST_CASE'=>'Last Commit Amount (Worst Case):',
  'LBL_QC_ROLL_BEST_VALUE'=>'Rollup Commit Amount (Best Case):',
  'LBL_QC_ROLL_LIKELY_VALUE'=>'Rollup Commit Amount (Likely Case):',
  'LBL_QC_ROLL_WORST_VALUE'=>'Rollup Commit Amount (Worst Case):',  
  'LBL_QC_COMMIT_BEST_CASE'=>'Commit Amount (Best Case):',
  'LBL_QC_COMMIT_LIKELY_CASE'=>'Commit Amount (Likely Case):',
  'LBL_QC_COMMIT_WORST_CASE'=>'Commit Amount (Worst Case):',

);


?>

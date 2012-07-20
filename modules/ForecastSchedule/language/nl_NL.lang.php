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

	

$mod_strings = array (
  'LBL_MODULE_NAME' => 'Forecasts',
  'LBL_MODULE_TITLE' => 'Forecasts',
  'LBL_FORECAST_ID' => 'ID',
  'LBL_FORECAST_OPP_COUNT' => 'Opportunities',
  'LBL_OW_TYPE' => 'Type',
  'LBL_SVFS_STATUS' => 'Status',
  'LB_FS_KEY' => 'ID',
  'LBL_FS_STATUS' => 'Status',
  'LBL_FS_CASCADE' => 'Cascade?',
  'LBL_FDR_OPPORTUNITIES' => 'Opportunities in forecast:',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Forecast Opportunities',
  'LBL_SEARCH' => 'Select',
  'LBL_SEARCH_LABEL' => 'Select',
  'LBL_DV_FORECAST_ROLLUP' => 'Forecast Rollup',
  'LBL_LV_OPPORTUNITIES' => 'Opportunities',
  'LNK_NEW_OPPORTUNITY' => 'Nieuwe Opportunity',
  'LBL_LIST_FORM_TITLE' => 'Vastgelegde Forecasts',
  'LNK_UPD_FORECAST' => 'Forecast Werkblad',
  'LNK_QUOTA' => 'Quota',
  'LNK_FORECAST_LIST' => 'Bekijk Forecast Historie',
  'LBL_FORECAST_HISTORY' => 'Forecasts: Historie',
  'LBL_FORECAST_HISTORY_TITLE' => 'Forecasts: Historie',
  'LBL_TIMEPERIOD_NAME' => 'Periode',
  'LBL_USER_NAME' => 'Gebruikersnaam',
  'LBL_REPORTS_TO_USER_NAME' => 'Rapporteert aan',
  'LBL_FORECAST_TIME_ID' => 'Periode ID',
  'LBL_FORECAST_TYPE' => 'Type Forecast',
  'LBL_FORECAST_OPP_WEIGH' => 'Gewogen Bedrag',
  'LBL_FORECAST_OPP_COMMIT' => 'Waarschijnlijke Geval',
  'LBL_FORECAST_OPP_BEST_CASE' => 'Beste Geval',
  'LBL_FORECAST_OPP_WORST' => 'Slechtste Geval',
  'LBL_FORECAST_USER' => 'Gebruiker',
  'LBL_DATE_COMMITTED' => 'Datum Vastgelegd',
  'LBL_DATE_ENTERED' => 'Datum ingevoerd',
  'LBL_DATE_MODIFIED' => 'Laatst gewijzigd',
  'LBL_CREATED_BY' => 'Aangemaakt door',
  'LBL_DELETED' => 'Verwijderd',
  'LBL_QC_TIME_PERIOD' => 'Periode:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Opportunity Aantal:',
  'LBL_QC_WEIGHT_VALUE' => 'Gewogen Bedrag:',
  'LBL_QC_COMMIT_VALUE' => 'Vastgelegd Bedrag:',
  'LBL_QC_COMMIT_BUTTON' => 'Vastleggen',
  'LBL_QC_WORKSHEET_BUTTON' => 'Werkblad',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Rollup Vastgelegde Bedragen:',
  'LBL_QC_DIRECT_FORECAST' => 'Mijn directe Forecast:',
  'LBL_QC_ROLLUP_FORECAST' => 'Mijn Groeps Forecast:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Mijn Forecasts',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Datum Laatst Vastgelegd:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Bedrag Laatst Vastgelegd:',
  'LBL_QC_HEADER_DELIM' => 'Naar',
  'LBL_OW_OPPORTUNITIES' => 'Opportunitiy',
  'LBL_OW_ACCOUNTNAME' => 'Organisatie',
  'LBL_OW_REVENUE' => 'Bedrag',
  'LBL_OW_WEIGHTED' => 'Gewogen Bedrag',
  'LBL_OW_MODULE_TITLE' => 'Opportunity Werkblad',
  'LBL_OW_PROBABILITY' => 'Waarschijnlijkheid',
  'LBL_OW_NEXT_STEP' => 'Volgende stap',
  'LBL_OW_DESCRIPTION' => 'Beschrijving',
  'LNK_NEW_TIMEPERIOD' => 'Nieuwe Periode',
  'LNK_TIMEPERIOD_LIST' => 'Bekijk Periodes',
  'LBL_SVFS_FORECASTDATE' => 'Plan een startdatum',
  'LBL_SVFS_USER' => 'Voor',
  'LBL_SVFS_CASCADE' => 'Cascade naar rapporten?',
  'LBL_SVFS_HEADER' => 'Forecast Planner:',
  'LBL_FS_TIMEPERIOD_ID' => 'Periode ID',
  'LBL_FS_USER_ID' => 'Gebruiker ID',
  'LBL_FS_TIMEPERIOD' => 'Periode',
  'LBL_FS_START_DATE' => 'Startdatum',
  'LBL_FS_END_DATE' => 'Einddatum',
  'LBL_FS_FORECAST_START_DATE' => 'Forecast Startdatum',
  'LBL_FS_FORECAST_FOR' => 'Plannen voor:',
  'LBL_FS_MODULE_NAME' => 'Forecast Planner',
  'LBL_FS_CREATED_BY' => 'Aangemaakt door',
  'LBL_FS_DATE_ENTERED' => 'Datum ingevoerd',
  'LBL_FS_DATE_MODIFIED' => 'Laatst gewijzigd',
  'LBL_FS_DELETED' => 'Verwijderd',
  'LBL_FDR_USER_NAME' => 'Direct Rapporteren',
  'LBL_FDR_WEIGH' => 'Gewogen bedrag van opportunities:',
  'LBL_FDR_COMMIT' => 'Vastgelegd Bedrag',
  'LBL_FDR_DATE_COMMIT' => 'Vastgelegde Datum',
  'LBL_DV_HEADER' => 'Forecasts:Werkbladen',
  'LBL_DV_MY_FORECASTS' => 'Mijn Forecasts',
  'LBL_DV_MY_TEAM' => 'Mijn Team&#39;s Forecasts',
  'LBL_DV_TIMEPERIODS' => 'Periode:',
  'LBL_DV_FORECAST_PERIOD' => 'Forecast Periode',
  'LBL_COMMIT_HEADER' => 'Forecast Vastleggen',
  'LBL_DV_LAST_COMMIT_DATE' => 'Laatste vastgelegde Datum',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Laatst vastgelegd Bedrag',
  'LBL_DV_TIMEPERIOD' => 'Periode:',
  'LBL_DV_TIMPERIOD_DATES' => 'Datumbereik:',
  'LBL_LV_TIMPERIOD' => 'Tijdspanne',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Startdatum',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Einddatum',
  'LBL_LV_TYPE' => 'Type Forecast',
  'LBL_LV_COMMIT_DATE' => 'Datum Vastgelegd',
  'LBL_LV_WEIGH' => 'Gewogen Bedrag',
  'LBL_LV_COMMIT' => 'Vastgelegde Bedrag',
  'LBL_COMMIT_NOTE' => 'Voer de bedragen in die u wil vastleggen voor de geselecteerde periode:',
  'LBL_COMMIT_MESSAGE' => 'Wilt u deze bedragen vastleggen?',
  'ERR_FORECAST_AMOUNT' => 'Het vast te leggen bedrag is verplicht en dient een getal te zijn',
  'LBL_FC_START_DATE' => 'Startdatum',
  'LBL_FC_USER' => 'Plannen voor',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Geen Actieve tijdspannes voor de Forecasting.',
  'LBL_FDR_ADJ_AMOUNT' => 'Aangepast Bedrag',
  'LBL_SAVE_WOKSHEET' => 'Werkblad opslaan',
  'LBL_RESET_WOKSHEET' => 'Werkblad opnieuw instellen',
  'LBL_RESET_CHECK' => 'Alle werkbladgegevens voor de geselecteerde periode en de ingelogde gebruiker zullen worden verwijderd. Doorgaan?',
  'LB_FS_LIKELY_CASE' => 'Waarschijnlijk Geval',
  'LB_FS_WORST_CASE' => 'Slechtste Geval',
  'LB_FS_BEST_CASE' => 'Beste Geval',
  'LBL_FDR_WK_LIKELY_CASE' => 'Schatting Waarschijnlijkste Geval',
  'LBL_FDR_WK_BEST_CASE' => 'Schatting Beste Geval',
  'LBL_FDR_WK_WORST_CASE' => 'Schatting Slechtste Geval:',
  'LBL_BEST_CASE' => 'Beste Geval:',
  'LBL_LIKELY_CASE' => 'Waarschijnlijkste Geval:',
  'LBL_WORST_CASE' => 'Slechtste Geval:',
  'LBL_FDR_C_BEST_CASE' => 'Beste Geval:',
  'LBL_FDR_C_WORST_CASE' => 'Slechtste Geval:',
  'LBL_FDR_C_LIKELY_CASE' => 'Waarschijnlijkste Geval:',
  'LBL_QC_LAST_BEST_CASE' => 'Laatst Vastgelegde Bedrag (Beste Geval):',
  'LBL_QC_LAST_LIKELY_CASE' => 'Laatst Vastgelegde Bedrag (Waarschijnlijkste Geval):',
  'LBL_QC_LAST_WORST_CASE' => 'Laatst Vastgelegde Bedrag (Beste Geval):',
  'LBL_QC_ROLL_BEST_VALUE' => 'Rollup Vastgelegd Bedrag (Beste Geval):',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Rollup Vastgelegd Bedrag (Waarschijnlijkste Geval):',
  'LBL_QC_ROLL_WORST_VALUE' => 'Rollup Vastgelegd Bedrag (Slechtste Geval):',
  'LBL_QC_COMMIT_BEST_CASE' => 'Vastgelegd Bedrag (Beste Geval):',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Vastgelegd Bedrag  (Waarschijnlijkste Geval):',
  'LBL_QC_COMMIT_WORST_CASE' => 'Vastgelegd Bedrag (Slechtste Geval):',
);


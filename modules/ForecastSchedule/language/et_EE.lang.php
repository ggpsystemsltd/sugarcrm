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
  'LBL_FORECAST_ID' => 'ID',
  'LBL_SVFS_USER' => 'For',
  'LB_FS_KEY' => 'ID',
  'LBL_QC_ROLL_BEST_VALUE' => 'Rollup Commit Amount (Best Case):',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Rollup Commit Amount (Likely Case):',
  'LBL_QC_ROLL_WORST_VALUE' => 'Rollup Commit Amount (Worst Case):',
  'LBL_QC_COMMIT_BEST_CASE' => 'Commit Amount (Best Case):',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Commit Amount (Likely Case):',
  'LBL_QC_COMMIT_WORST_CASE' => 'Commit Amount (Worst Case):',
  'LBL_MODULE_NAME' => 'Prognoosid',
  'LNK_NEW_OPPORTUNITY' => 'Loo müügivõimalus',
  'LBL_MODULE_TITLE' => 'Prognoosid',
  'LBL_LIST_FORM_TITLE' => 'Täidetud prognoosid',
  'LNK_UPD_FORECAST' => 'Prognoosi tööleht',
  'LNK_QUOTA' => 'Kvoodid',
  'LNK_FORECAST_LIST' => 'Vaata prognoosi ajalugu',
  'LBL_FORECAST_HISTORY' => 'Prognoosid: Ajalugu',
  'LBL_FORECAST_HISTORY_TITLE' => 'Prognoosid: Ajalugu',
  'LBL_TIMEPERIOD_NAME' => 'Ajaperiood:',
  'LBL_USER_NAME' => 'Kasutajanimi',
  'LBL_REPORTS_TO_USER_NAME' => 'Juhataja',
  'LBL_FORECAST_TIME_ID' => 'Ajaperioodi ID',
  'LBL_FORECAST_TYPE' => 'Prognoosi tüüp',
  'LBL_FORECAST_OPP_COUNT' => 'Müügivõimalused',
  'LBL_FORECAST_OPP_WEIGH' => 'Kaalutud suma',
  'LBL_FORECAST_OPP_COMMIT' => 'Tõenäoline juhtum',
  'LBL_FORECAST_OPP_BEST_CASE' => 'Parim juhtum',
  'LBL_FORECAST_OPP_WORST' => 'Halvim juhtum',
  'LBL_FORECAST_USER' => 'Kasutaja',
  'LBL_DATE_COMMITTED' => 'Soorituskuupäev:',
  'LBL_DATE_ENTERED' => 'Sisestatud kuupäev',
  'LBL_DATE_MODIFIED' => 'Muudetud',
  'LBL_CREATED_BY' => 'Looja:',
  'LBL_DELETED' => 'Kustutatud',
  'LBL_QC_TIME_PERIOD' => 'Ajaperiood:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Müügivõimalusi kokku:',
  'LBL_QC_WEIGHT_VALUE' => 'Kaalutud summa:',
  'LBL_QC_COMMIT_VALUE' => 'Teostatud kokku:',
  'LBL_QC_COMMIT_BUTTON' => 'Teosta:',
  'LBL_QC_WORKSHEET_BUTTON' => 'Tööleht',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Rollup Commit Amount:',
  'LBL_QC_DIRECT_FORECAST' => 'Minu otsene prognoos:',
  'LBL_QC_ROLLUP_FORECAST' => 'Minu grupi prognoos:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Minu prognoosid',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Viimane soorituskuupäev:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Viimane sooritussumma_',
  'LBL_QC_HEADER_DELIM' => 'Kellele',
  'LBL_OW_OPPORTUNITIES' => 'Müügivõimalus',
  'LBL_OW_ACCOUNTNAME' => 'Ettevõte:',
  'LBL_OW_REVENUE' => 'Summa:',
  'LBL_OW_WEIGHTED' => 'Kaalutud summa',
  'LBL_OW_MODULE_TITLE' => 'Müügivõimaluse tööleht',
  'LBL_OW_PROBABILITY' => 'Tõenäosus',
  'LBL_OW_NEXT_STEP' => 'Järgmine samm:',
  'LBL_OW_DESCRIPTION' => 'Kirjeldus',
  'LBL_OW_TYPE' => 'Tüüp',
  'LNK_NEW_TIMEPERIOD' => 'Loo ajaperiood',
  'LNK_TIMEPERIOD_LIST' => 'Vaata ajaperioode',
  'LBL_SVFS_FORECASTDATE' => 'Planeeri alguskuupäev',
  'LBL_SVFS_STATUS' => 'Olek',
  'LBL_SVFS_CASCADE' => 'Virnasta aruannetele?',
  'LBL_SVFS_HEADER' => 'Prognoosi plaa:',
  'LBL_FS_TIMEPERIOD_ID' => 'Ajaperioodi ID',
  'LBL_FS_USER_ID' => 'Kasutaja ID',
  'LBL_FS_TIMEPERIOD' => 'Ajaperiood:',
  'LBL_FS_START_DATE' => 'Alguskuupäev',
  'LBL_FS_END_DATE' => 'Lõppkuupäev',
  'LBL_FS_FORECAST_START_DATE' => 'Prognoosi alguskuupäev',
  'LBL_FS_STATUS' => 'Olek',
  'LBL_FS_FORECAST_FOR' => 'Planeeri:',
  'LBL_FS_CASCADE' => 'virnasta?',
  'LBL_FS_MODULE_NAME' => 'Prognoosi planeerimine',
  'LBL_FS_CREATED_BY' => 'Looja:',
  'LBL_FS_DATE_ENTERED' => 'Sisestamiskuupäev',
  'LBL_FS_DATE_MODIFIED' => 'Muutmiskuupäev',
  'LBL_FS_DELETED' => 'Kustutatud',
  'LBL_FDR_USER_NAME' => 'Otsene aruanne',
  'LBL_FDR_OPPORTUNITIES' => 'Müügivõimalused prognoosis',
  'LBL_FDR_WEIGH' => 'Müügivõimaluste kaalutud summa:',
  'LBL_FDR_COMMIT' => 'Sooritatud kogus',
  'LBL_FDR_DATE_COMMIT' => 'Soorituskuupäev',
  'LBL_DV_HEADER' => 'Prognoosid: tööleht',
  'LBL_DV_MY_FORECASTS' => 'Minu prognoosid',
  'LBL_DV_MY_TEAM' => 'Minu  meeskonna prognoosid',
  'LBL_DV_TIMEPERIODS' => 'Ajaperioodid:',
  'LBL_DV_FORECAST_PERIOD' => 'Prognoosi ajaperiood',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Prognoosi müügivõimalused',
  'LBL_SEARCH' => 'Vali',
  'LBL_SEARCH_LABEL' => 'Vali',
  'LBL_COMMIT_HEADER' => 'Prognoosi sooritus',
  'LBL_DV_LAST_COMMIT_DATE' => 'Viimane soorituskuupäev:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Liimane sooritussumma:',
  'LBL_DV_FORECAST_ROLLUP' => 'Prognoosi rollup',
  'LBL_DV_TIMEPERIOD' => 'Ajaperiood:',
  'LBL_DV_TIMPERIOD_DATES' => 'Periood:',
  'LBL_LV_TIMPERIOD' => 'Ajaperiood',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Alguskuupäev',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Lõppkuupäev',
  'LBL_LV_TYPE' => 'Prognoosi tüüp',
  'LBL_LV_COMMIT_DATE' => 'Soorituskuupäev',
  'LBL_LV_OPPORTUNITIES' => 'Müügivõimalused',
  'LBL_LV_WEIGH' => 'Kaalutud kogus',
  'LBL_LV_COMMIT' => 'Sooritatud kogus',
  'LBL_COMMIT_NOTE' => 'Vali kogused, mida soovid valitud ajaperioodil sooritada:',
  'LBL_COMMIT_MESSAGE' => 'kas soovid sooritada need kogused?',
  'ERR_FORECAST_AMOUNT' => 'Sooritatud kogus on kohustuslik ja see peab olema number.',
  'LBL_FC_START_DATE' => 'Alguskuupäev',
  'LBL_FC_USER' => 'Planeeri',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Prognoosi ajoks pole aktiivseid ajaperioode.',
  'LBL_FDR_ADJ_AMOUNT' => 'Korrigeeritud kogus',
  'LBL_SAVE_WOKSHEET' => 'Salvesta tööleht',
  'LBL_RESET_WOKSHEET' => 'Lähtesta tööleht',
  'LBL_RESET_CHECK' => 'Kõik valitus ajaperioodi töölehe andmed ja sisselogitud kasutaja eemaldatakse. Jätkata?',
  'LB_FS_LIKELY_CASE' => 'Tõenäoline juhtum',
  'LB_FS_WORST_CASE' => 'Halvim juhtum',
  'LB_FS_BEST_CASE' => 'Parim juhtum',
  'LBL_FDR_WK_LIKELY_CASE' => 'Hinnanguliselt tõenäoline juhtum',
  'LBL_FDR_WK_BEST_CASE' => 'Hinnanguliselt parim juhtum',
  'LBL_FDR_WK_WORST_CASE' => 'Hinnanguliselt halvim juhtum',
  'LBL_BEST_CASE' => 'Parim juhtum:',
  'LBL_LIKELY_CASE' => 'Tõenäoline juhtum:',
  'LBL_WORST_CASE' => 'Halvim juhtum:',
  'LBL_FDR_C_BEST_CASE' => 'Parim juhtum',
  'LBL_FDR_C_WORST_CASE' => 'Halvim juhtum',
  'LBL_FDR_C_LIKELY_CASE' => 'Tõenäoline juhtum',
  'LBL_QC_LAST_BEST_CASE' => 'Viimane sooritatud kogus (parim juhtum):',
  'LBL_QC_LAST_LIKELY_CASE' => 'Viimane sooritatud kogus (tõenäoline juhtum):',
  'LBL_QC_LAST_WORST_CASE' => 'Viimane sooritatud kogus (halvim juhtum):',
);


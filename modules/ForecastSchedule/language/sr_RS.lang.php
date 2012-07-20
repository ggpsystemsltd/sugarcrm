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
  'LBL_SVFS_STATUS' => 'Status',
  'LBL_FS_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Prognoze',
  'LNK_NEW_OPPORTUNITY' => 'Kreiraj prodajnu priliku',
  'LBL_MODULE_TITLE' => 'Prognoze',
  'LBL_LIST_FORM_TITLE' => 'Prihvaćene prognoze',
  'LNK_UPD_FORECAST' => 'Tabela prognoza',
  'LNK_QUOTA' => 'Ponude',
  'LNK_FORECAST_LIST' => 'Pregledaj istoriju prognoza',
  'LBL_FORECAST_HISTORY' => 'Prognoze: Istorija',
  'LBL_FORECAST_HISTORY_TITLE' => 'Prognoze: Istorija',
  'LBL_TIMEPERIOD_NAME' => 'Vremenski period',
  'LBL_USER_NAME' => 'Korisničko ime',
  'LBL_REPORTS_TO_USER_NAME' => 'Nadređeni',
  'LBL_FORECAST_ID' => 'ID broj',
  'LBL_FORECAST_TIME_ID' => 'ID broj vremenskog perioda',
  'LBL_FORECAST_TYPE' => 'Tip prognoze',
  'LBL_FORECAST_OPP_COUNT' => 'Prodajne prilike',
  'LBL_FORECAST_OPP_WEIGH' => 'Ponderisan iznos',
  'LBL_FORECAST_OPP_COMMIT' => 'Verovatan slučaj',
  'LBL_FORECAST_OPP_BEST_CASE' => 'Najbolji slučaj',
  'LBL_FORECAST_OPP_WORST' => 'Najgori slučaj',
  'LBL_FORECAST_USER' => 'Korisnik',
  'LBL_DATE_COMMITTED' => 'Datum prihvatanja',
  'LBL_DATE_ENTERED' => 'Datum unosa',
  'LBL_DATE_MODIFIED' => 'Datum izmene',
  'LBL_CREATED_BY' => 'Autor',
  'LBL_DELETED' => 'Obrisan',
  'LBL_QC_TIME_PERIOD' => 'Vremenski period:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Broj prodajnih prilika',
  'LBL_QC_WEIGHT_VALUE' => 'Ponderisan iznos:',
  'LBL_QC_COMMIT_VALUE' => 'Prihvati iznos:',
  'LBL_QC_COMMIT_BUTTON' => 'Prihvati',
  'LBL_QC_WORKSHEET_BUTTON' => 'Tabela',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Proširi prihvaćen iznos:',
  'LBL_QC_DIRECT_FORECAST' => 'Moja direktna prognoza:',
  'LBL_QC_ROLLUP_FORECAST' => 'Moja grupna prognoza:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Moje Prognoze',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Datum poslednjeg prihvatanja:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Poslednji prihvaćen iznos:',
  'LBL_QC_HEADER_DELIM' => 'Do',
  'LBL_OW_OPPORTUNITIES' => 'Prodajna prilika',
  'LBL_OW_ACCOUNTNAME' => 'Kompanija',
  'LBL_OW_REVENUE' => 'Iznos',
  'LBL_OW_WEIGHTED' => 'Ponderisan iznos',
  'LBL_OW_MODULE_TITLE' => 'Tabela prodajnih prilika',
  'LBL_OW_PROBABILITY' => 'Verovatnoća',
  'LBL_OW_NEXT_STEP' => 'Sledeći korak',
  'LBL_OW_DESCRIPTION' => 'Opis',
  'LBL_OW_TYPE' => 'Tip',
  'LNK_NEW_TIMEPERIOD' => 'Kreiraj vremenski period',
  'LNK_TIMEPERIOD_LIST' => 'Pregledaj vremenske periode',
  'LBL_SVFS_FORECASTDATE' => 'Zakaži vreme početka',
  'LBL_SVFS_USER' => 'Za',
  'LBL_SVFS_CASCADE' => 'Prenesi na izveštaje?',
  'LBL_SVFS_HEADER' => 'Plan prognoza:',
  'LB_FS_KEY' => 'ID broj',
  'LBL_FS_TIMEPERIOD_ID' => 'ID broj vremenskog perioda',
  'LBL_FS_USER_ID' => 'ID broj korisnika',
  'LBL_FS_TIMEPERIOD' => 'Vremenski period',
  'LBL_FS_START_DATE' => 'Datum početka',
  'LBL_FS_END_DATE' => 'Datum završetka',
  'LBL_FS_FORECAST_START_DATE' => 'Datum početka prognoze',
  'LBL_FS_FORECAST_FOR' => 'Zakaži za:',
  'LBL_FS_CASCADE' => 'Prenesi na?',
  'LBL_FS_MODULE_NAME' => 'Plan prognoze',
  'LBL_FS_CREATED_BY' => 'Autor',
  'LBL_FS_DATE_ENTERED' => 'Datum unosa',
  'LBL_FS_DATE_MODIFIED' => 'Datum izmene',
  'LBL_FS_DELETED' => 'Obrisan',
  'LBL_FDR_USER_NAME' => 'Direktni izveštaj',
  'LBL_FDR_OPPORTUNITIES' => 'Prodajne prilike u prognozi:',
  'LBL_FDR_WEIGH' => 'Ponderisan iznos prodajnih prilika:',
  'LBL_FDR_COMMIT' => 'Prihvaćen iznos',
  'LBL_FDR_DATE_COMMIT' => 'Datum prihvatanja',
  'LBL_DV_HEADER' => 'Prognoze: Tabela',
  'LBL_DV_MY_FORECASTS' => 'Moje Prognoze',
  'LBL_DV_MY_TEAM' => 'Prognoze mog tima',
  'LBL_DV_TIMEPERIODS' => 'Vremenski periodi:',
  'LBL_DV_FORECAST_PERIOD' => 'Vremenski period prognoze',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Prognoza prodajnih prilika',
  'LBL_SEARCH' => 'Izaberi',
  'LBL_SEARCH_LABEL' => 'Izaberi',
  'LBL_COMMIT_HEADER' => 'Prihvati prognoza',
  'LBL_DV_LAST_COMMIT_DATE' => 'Datum poslednjeg prihvatanja:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Iznosi poslednjeg prihvatanja:',
  'LBL_DV_FORECAST_ROLLUP' => 'Proširi prognozu',
  'LBL_DV_TIMEPERIOD' => 'Vremenski period:',
  'LBL_DV_TIMPERIOD_DATES' => 'Period:',
  'LBL_LV_TIMPERIOD' => 'Vremenski period',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Datum početka',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Datum završetka',
  'LBL_LV_TYPE' => 'Tip prognoze',
  'LBL_LV_COMMIT_DATE' => 'Datum prihvatanja',
  'LBL_LV_OPPORTUNITIES' => 'Prodajne prilike',
  'LBL_LV_WEIGH' => 'Ponderisan iznos',
  'LBL_LV_COMMIT' => 'Prihvaćen iznos',
  'LBL_COMMIT_NOTE' => 'Unesite iznos koji želite da prihvatite za odabrani period vremena:',
  'LBL_COMMIT_MESSAGE' => 'Da li želite da prihvatite ove iznose?',
  'ERR_FORECAST_AMOUNT' => 'Iznos koji prihvatate je obavezan i mora biti broj.',
  'LBL_FC_START_DATE' => 'Datum početka',
  'LBL_FC_USER' => 'Zakazano za',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Nema aktivnih vremenskih perioda za Prognoziranje.',
  'LBL_FDR_ADJ_AMOUNT' => 'Prilagođeni iznos',
  'LBL_SAVE_WOKSHEET' => 'Sačuvaj tabelu',
  'LBL_RESET_WOKSHEET' => 'Obriši tabelu',
  'LBL_RESET_CHECK' => 'Svi podaci tabele za odabrani vremenski period i prijavljenog korisnika će biti uklonjeni. Nastaviti?',
  'LB_FS_LIKELY_CASE' => 'Verovatan slučaj',
  'LB_FS_WORST_CASE' => 'Najgori slučaj',
  'LB_FS_BEST_CASE' => 'Najbolji slučaj',
  'LBL_FDR_WK_LIKELY_CASE' => 'Procenjen najverovatniji slučaj',
  'LBL_FDR_WK_BEST_CASE' => 'Procenjen najbolji slučaj',
  'LBL_FDR_WK_WORST_CASE' => 'Procenjen najgori slučaj',
  'LBL_BEST_CASE' => 'Najbolji slučaj:',
  'LBL_LIKELY_CASE' => 'Najverovatniji slučaj:',
  'LBL_WORST_CASE' => 'Najgori slučaj:',
  'LBL_FDR_C_BEST_CASE' => 'Najbolji slučaj',
  'LBL_FDR_C_WORST_CASE' => 'Najgori slučaj',
  'LBL_FDR_C_LIKELY_CASE' => 'Verovatan slučaj',
  'LBL_QC_LAST_BEST_CASE' => 'Iznos poslednjeg prihvatanja (Najbolji slučaj):',
  'LBL_QC_LAST_LIKELY_CASE' => 'Iznos poslednjeg prihvatanja (Verovatan slučaj):',
  'LBL_QC_LAST_WORST_CASE' => 'Iznos poslednjeg prihvatanja (Nagori slučaj):',
  'LBL_QC_ROLL_BEST_VALUE' => 'Proširi prihvaćen iznos (Najbolji slučaj):',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Proširi prihvaćen iznos (Verovatan slučaj):',
  'LBL_QC_ROLL_WORST_VALUE' => 'Proširi prihvaćen iznos (Najgori slučaj):',
  'LBL_QC_COMMIT_BEST_CASE' => 'Prihvati iznos (Najbolji slučaj):',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Prihvati iznos (Verovatan slučaj):',
  'LBL_QC_COMMIT_WORST_CASE' => 'Prihvati iznos (Najgori slučaj):',
);


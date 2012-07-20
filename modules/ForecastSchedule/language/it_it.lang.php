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
  'LBL_EDIT_LAYOUT' => 'Modifica Layout',
  'LBL_FORECAST_ID' => 'ID',
  'LB_FS_KEY' => 'ID',
  'LBL_MODULE_NAME' => 'Previsioni',
  'LNK_NEW_OPPORTUNITY' => 'Nuova Opportunità',
  'LBL_MODULE_TITLE' => 'Previsioni',
  'LBL_LIST_FORM_TITLE' => 'Previsioni Confermate',
  'LNK_UPD_FORECAST' => 'Matrice delle Previsioni',
  'LNK_QUOTA' => 'Budget',
  'LNK_FORECAST_LIST' => 'Visualizza Cronologia Previsioni',
  'LBL_FORECAST_HISTORY' => 'Previsioni: Cronologia',
  'LBL_FORECAST_HISTORY_TITLE' => 'Previsioni: Cronologia',
  'LBL_TIMEPERIOD_NAME' => 'Periodo',
  'LBL_USER_NAME' => 'Nome Utente',
  'LBL_REPORTS_TO_USER_NAME' => 'Riporta A',
  'LBL_FORECAST_TIME_ID' => 'ID Periodo',
  'LBL_FORECAST_TYPE' => 'Tipo Previsione',
  'LBL_FORECAST_OPP_COUNT' => 'Opportunità',
  'LBL_FORECAST_OPP_WEIGH' => 'Importo Pesato',
  'LBL_FORECAST_OPP_COMMIT' => 'Caso Probabile',
  'LBL_FORECAST_OPP_BEST_CASE' => 'Caso Migliore',
  'LBL_FORECAST_OPP_WORST' => 'Caso Peggiore',
  'LBL_FORECAST_USER' => 'Utente',
  'LBL_DATE_COMMITTED' => 'Data Conferma',
  'LBL_DATE_ENTERED' => 'Data Ingresso',
  'LBL_DATE_MODIFIED' => 'Data Modifica',
  'LBL_CREATED_BY' => 'Creato da',
  'LBL_DELETED' => 'Eliminato',
  'LBL_QC_TIME_PERIOD' => 'Periodo:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Conteggio Opportunità:',
  'LBL_QC_WEIGHT_VALUE' => 'Importo Pesato:',
  'LBL_QC_COMMIT_VALUE' => 'Importo Confermato:',
  'LBL_QC_COMMIT_BUTTON' => 'Conferma',
  'LBL_QC_WORKSHEET_BUTTON' => 'Matrice',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Rollup Importo Confermato:',
  'LBL_QC_DIRECT_FORECAST' => 'La mia Previsione Diretta:',
  'LBL_QC_ROLLUP_FORECAST' => 'Previsione del mio Gruppo:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Le mie Previsioni',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Ultima data di conferma:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Ultimo Importo Confermato:',
  'LBL_QC_HEADER_DELIM' => 'A',
  'LBL_OW_OPPORTUNITIES' => 'Opportunità',
  'LBL_OW_ACCOUNTNAME' => 'Aziende',
  'LBL_OW_REVENUE' => 'Importo',
  'LBL_OW_WEIGHTED' => 'Importo Pesato',
  'LBL_OW_MODULE_TITLE' => 'Matrice delle Previsioni',
  'LBL_OW_PROBABILITY' => 'Probabilità',
  'LBL_OW_NEXT_STEP' => 'Passo Successivo',
  'LBL_OW_DESCRIPTION' => 'Descrizione',
  'LBL_OW_TYPE' => 'Tipo',
  'LNK_NEW_TIMEPERIOD' => 'Crea Periodo',
  'LNK_TIMEPERIOD_LIST' => 'Visualizza Periodi',
  'LBL_SVFS_FORECASTDATE' => 'Schedula Data Inizio',
  'LBL_SVFS_STATUS' => 'Stato',
  'LBL_SVFS_USER' => 'Per',
  'LBL_SVFS_CASCADE' => 'Ribalta sui dipendenti diretti?',
  'LBL_SVFS_HEADER' => 'Schedulazione Previsione:',
  'LBL_FS_TIMEPERIOD_ID' => 'ID Periodo',
  'LBL_FS_USER_ID' => 'ID Utente',
  'LBL_FS_TIMEPERIOD' => 'Periodo',
  'LBL_FS_START_DATE' => 'Data Inizio',
  'LBL_FS_END_DATE' => 'Data Fine',
  'LBL_FS_FORECAST_START_DATE' => 'Data Inizio Previsione',
  'LBL_FS_STATUS' => 'Stato',
  'LBL_FS_FORECAST_FOR' => 'Schedulato per:',
  'LBL_FS_CASCADE' => 'Ribaltamento a cascata?',
  'LBL_FS_MODULE_NAME' => 'Schedulazione Previsione',
  'LBL_FS_CREATED_BY' => 'Creato da',
  'LBL_FS_DATE_ENTERED' => 'Data Inserimento',
  'LBL_FS_DATE_MODIFIED' => 'Data Modifica',
  'LBL_FS_DELETED' => 'Eliminato',
  'LBL_FDR_USER_NAME' => 'Dipendenti Diretti',
  'LBL_FDR_OPPORTUNITIES' => 'Opportunità nelle previsioni:',
  'LBL_FDR_WEIGH' => 'Importo pesato delle opportunità:',
  'LBL_FDR_COMMIT' => 'Importo Confermato',
  'LBL_FDR_DATE_COMMIT' => 'Data Conferma',
  'LBL_DV_HEADER' => 'Previsioni: Matrici',
  'LBL_DV_MY_FORECASTS' => 'Le mie Previsioni',
  'LBL_DV_MY_TEAM' => 'Previsioni del mio Team',
  'LBL_DV_TIMEPERIODS' => 'Periodi:',
  'LBL_DV_FORECAST_PERIOD' => 'Periodo della Previsione',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Opportunità della Previsione',
  'LBL_SEARCH' => 'Seleziona',
  'LBL_SEARCH_LABEL' => 'Seleziona',
  'LBL_COMMIT_HEADER' => 'Conferma Previsione',
  'LBL_DV_LAST_COMMIT_DATE' => 'Ultima data di conferma:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Ultimo importo confermato:',
  'LBL_DV_FORECAST_ROLLUP' => 'Rollup Previsione',
  'LBL_DV_TIMEPERIOD' => 'Periodo:',
  'LBL_DV_TIMPERIOD_DATES' => 'Intervallo Date:',
  'LBL_LV_TIMPERIOD' => 'Periodo',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Data Inizio',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Data Fine',
  'LBL_LV_TYPE' => 'Tipo previsione',
  'LBL_LV_COMMIT_DATE' => 'Data Conferma',
  'LBL_LV_OPPORTUNITIES' => 'Opportunità',
  'LBL_LV_WEIGH' => 'Importo Pesato',
  'LBL_LV_COMMIT' => 'Importo Confermato',
  'LBL_COMMIT_NOTE' => 'Inserisci gli importi che vuoi confermare per il periodo selezionato:',
  'LBL_COMMIT_MESSAGE' => 'Vuoi confermare questi importi?',
  'ERR_FORECAST_AMOUNT' => 'Bisogna confermare gli importi e questi devono essere un numero.',
  'LBL_FC_START_DATE' => 'Data Inizio',
  'LBL_FC_USER' => 'Schedulato Per',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Nessun Arco Temporale attivo per le Previsioni.',
  'LBL_FDR_ADJ_AMOUNT' => 'Importo Corretto',
  'LBL_SAVE_WOKSHEET' => 'Salva Matrice',
  'LBL_RESET_WOKSHEET' => 'Azzera Matrice',
  'LBL_RESET_CHECK' => 'Tutti i dati della matrice per il periodo selezionato e per l utente corrente saranno eliminati. Continuare?',
  'LB_FS_LIKELY_CASE' => 'Caso Probabile',
  'LB_FS_WORST_CASE' => 'Caso Peggiore',
  'LB_FS_BEST_CASE' => 'Caso Migliore',
  'LBL_FDR_WK_LIKELY_CASE' => 'Stima Caso Probabile',
  'LBL_FDR_WK_BEST_CASE' => 'Stima Caso Migliore',
  'LBL_FDR_WK_WORST_CASE' => 'Stima Caso Peggiore',
  'LBL_BEST_CASE' => 'Caso Migliore:',
  'LBL_LIKELY_CASE' => 'Caso Probabile:',
  'LBL_WORST_CASE' => 'Caso Peggiore:',
  'LBL_FDR_C_BEST_CASE' => 'Caso Migliore',
  'LBL_FDR_C_WORST_CASE' => 'Caso Peggiore',
  'LBL_FDR_C_LIKELY_CASE' => 'Caso Probabile',
  'LBL_QC_LAST_BEST_CASE' => 'Ultimo Importo Confermato (Caso Migliore):',
  'LBL_QC_LAST_LIKELY_CASE' => 'Ultimo Importo Confermato (Caso Probabile):',
  'LBL_QC_LAST_WORST_CASE' => 'Ultimo Importo Confermato (Caso Peggiore):',
  'LBL_QC_ROLL_BEST_VALUE' => 'Rollup Importo Confermato (Caso Migliore):',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Rollup Importo Confermato (Caso Probabile):',
  'LBL_QC_ROLL_WORST_VALUE' => 'Rollup Importo Confermato (Caso Peggiore):',
  'LBL_QC_COMMIT_BEST_CASE' => 'Importo Confermato (Caso Migliore):',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Importo Confermato (Caso Probabile):',
  'LBL_QC_COMMIT_WORST_CASE' => 'Importo Confermato (Caso Peggiore):',
);


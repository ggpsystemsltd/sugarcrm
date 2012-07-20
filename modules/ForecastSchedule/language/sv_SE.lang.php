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


																					
$mod_strings= array (
'LBL_MODULE_NAME'                                  => 'Prognoser',
'LNK_NEW_OPPORTUNITY'                              => 'Skapa affärsmöjlighet',
'LBL_MODULE_TITLE'                                 => 'Prognoser',
'LBL_LIST_FORM_TITLE'                              => 'Tillagda prognoser',
'LNK_UPD_FORECAST'                                 => 'Prognosark',
'LNK_QUOTA'                                        => 'Offerter',
'LNK_FORECAST_LIST'                                => 'Prognoshistorik',
'LBL_FORECAST_HISTORY'                             => 'Prognos: Historik',
'LBL_FORECAST_HISTORY_TITLE'                       => 'Prognos: Historik',
'LBL_TIMEPERIOD_NAME'                              => 'Tidsperiod',
'LBL_USER_NAME'                                    => 'Användarnamn',
'LBL_REPORTS_TO_USER_NAME'                         => 'Rapporterar till',
'LBL_FORECAST_ID'                                  => 'ID',
'LBL_FORECAST_TIME_ID'                             => 'Tid period ID',
'LBL_FORECAST_TYPE'                                => 'Prognostyp',
'LBL_FORECAST_OPP_COUNT'                           => 'Affärsmöjligheter',
'LBL_FORECAST_OPP_WEIGH'                           => 'Viktad summa',
'LBL_FORECAST_OPP_COMMIT'                          => 'Troligt fall',
'LBL_FORECAST_OPP_BEST_CASE'                       => 'Bästa fall',
'LBL_FORECAST_OPP_WORST'                           => 'Värsta fall',
'LBL_FORECAST_USER'                                => 'Användare',
'LBL_DATE_COMMITTED'                               => 'Angivet datum',
'LBL_DATE_ENTERED'                                 => 'Skapatdatum',
'LBL_DATE_MODIFIED'                                => 'Redigeringsdatum',
'LBL_CREATED_BY'                                   => 'Skapad av',
'LBL_DELETED'                                      => 'Raderad',
'LBL_QC_TIME_PERIOD'                               => 'Tidperiod:',
'LBL_QC_OPPORTUNITY_COUNT'                         => 'Antal affärsmöjligheter',
'LBL_QC_WEIGHT_VALUE'                              => 'Viktad summa:',
'LBL_QC_COMMIT_VALUE'                              => 'Ange summa:',
'LBL_QC_COMMIT_BUTTON'                             => 'Ange',
'LBL_QC_WORKSHEET_BUTTON'                          => 'Arbetsark',
'LBL_QC_ROLL_COMMIT_VALUE'                         => 'Sammanfatta angivna belopp:',
'LBL_QC_DIRECT_FORECAST'                           => 'Mina direkta prognoser:',
'LBL_QC_ROLLUP_FORECAST'                           => 'Min grupps prognoser:',
'LBL_QC_UPCOMING_FORECASTS'                        => 'Mina prognoser',
'LBL_QC_LAST_DATE_COMMITTED'                       => 'Senaste uppdateringsdatumet',
'LBL_QC_LAST_COMMIT_VALUE'                         => 'Senaste angivna belopp:',
'LBL_QC_HEADER_DELIM'                              => 'Till',
'LBL_OW_OPPORTUNITIES'                             => 'Affärsmöjlighet',
'LBL_OW_ACCOUNTNAME'                               => 'Organisation',
'LBL_OW_REVENUE'                                   => 'Summa',
'LBL_OW_WEIGHTED'                                  => 'Viktad summa',
'LBL_OW_MODULE_TITLE'                              => 'Affärsmöjlighetsark',
'LBL_OW_PROBABILITY'                               => 'Sannolikhet',
'LBL_OW_NEXT_STEP'                                 => 'Nästa steg',
'LBL_OW_DESCRIPTION'                               => 'Beskrivning',
'LBL_OW_TYPE'                                      => 'Typ',
'LNK_NEW_TIMEPERIOD'                               => 'Skapa tidsperiod',
'LNK_TIMEPERIOD_LIST'                              => 'Tidsperioder',
'LBL_SVFS_FORECASTDATE'                            => 'Schemalägg startdatum',
'LBL_SVFS_STATUS'                                  => 'Status',
'LBL_SVFS_USER'                                    => 'För',
'LBL_SVFS_CASCADE'                                 => 'Sprid till rapporter?',
'LBL_SVFS_HEADER'                                  => 'Schemalägg prognos:',
'LB_FS_KEY'                                        => 'ID',
'LBL_FS_TIMEPERIOD_ID'                             => 'Tidsperiod ID',
'LBL_FS_USER_ID'                                   => 'Användar ID',
'LBL_FS_TIMEPERIOD'                                => 'Tidsperiod',
'LBL_FS_START_DATE'                                => 'Startdatum',
'LBL_FS_END_DATE'                                  => 'Slutdatum',
'LBL_FS_FORECAST_START_DATE'                       => 'Prognos startdatum',
'LBL_FS_STATUS'                                    => 'Status',
'LBL_FS_FORECAST_FOR'                              => 'Schemalägg för:',
'LBL_FS_CASCADE'                                   => 'Sprid?',
'LBL_FS_MODULE_NAME'                               => 'Schemalägg prognos',
'LBL_FS_CREATED_BY'                                => 'Skapad av',
'LBL_FS_DATE_ENTERED'                              => 'Skapatdatum',
'LBL_FS_DATE_MODIFIED'                             => 'Redigeringsdatum',
'LBL_FS_DELETED'                                   => 'Raderad',
'LBL_FDR_USER_NAME'                                => 'Direktrapport',
'LBL_FDR_OPPORTUNITIES'                            => 'Affärsmöjligheter i prognos:',
'LBL_FDR_WEIGH'                                    => 'Viktad summa av affärsmöjligheterna:',
'LBL_FDR_COMMIT'                                   => 'Angivet belopp',
'LBL_FDR_DATE_COMMIT'                              => 'Angivet datum',
'LBL_DV_HEADER'                                    => 'Prognoser: Arbetsark',
'LBL_DV_MY_FORECASTS'                              => 'Mina prognoser',
'LBL_DV_MY_TEAM'                                   => 'Mitt teams prognoser',
'LBL_DV_TIMEPERIODS'                               => 'Tidsperioder:',
'LBL_DV_FORECAST_PERIOD'                           => 'Prognos tidperiod',
'LBL_DV_FORECAST_OPPORTUNITY'                      => 'Prognos affärsmöjligheter',
'LBL_SEARCH'                                       => 'Välj',
'LBL_SEARCH_LABEL'                                 => 'Välj',
'LBL_COMMIT_HEADER'                                => 'Ange prognos',
'LBL_DV_LAST_COMMIT_DATE'                          => 'Senaste angivet datum:',
'LBL_DV_LAST_COMMIT_AMOUNT'                        => 'Senast angivna belopp:',
'LBL_DV_FORECAST_ROLLUP'                           => 'Sammanställ prognos',
'LBL_DV_TIMEPERIOD'                                => 'Tidperiod:',
'LBL_DV_TIMPERIOD_DATES'                           => 'Datumintervall:',
'LBL_LV_TIMPERIOD'                                 => 'Tidperiod',
'LBL_LV_TIMPERIOD_START_DATE'                      => 'Startdatum',
'LBL_LV_TIMPERIOD_END_DATE'                        => 'Slutdatum',
'LBL_LV_TYPE'                                      => 'Prognostyp',
'LBL_LV_COMMIT_DATE'                               => 'Angivet datum',
'LBL_LV_OPPORTUNITIES'                             => 'Affärsmöjligheter',
'LBL_LV_WEIGH'                                     => 'Viktad summa',
'LBL_LV_COMMIT'                                    => 'Angivet belopp',
'LBL_COMMIT_NOTE'                                  => 'Ange de belopp du vill ange för den valda tidsperioden:',
'LBL_COMMIT_MESSAGE'                               => 'Vill du ange dessa belopp?',
'ERR_FORECAST_AMOUNT'                              => 'Angivet belopp är ett obligatoriskt fält och måste vara ett nummer.',
'LBL_FC_START_DATE'                                => 'Startdatum',
'LBL_FC_USER'                                      => 'Schemalägg för',
'LBL_NO_ACTIVE_TIMEPERIOD'                         => 'Inga aktiva tidsperioder för prognoser.',
'LBL_FDR_ADJ_AMOUNT'                               => 'Justera summa',
'LBL_SAVE_WOKSHEET'                                => 'Spara arbetsark',
'LBL_RESET_WOKSHEET'                               => 'Återställ arbetsarket',
'LBL_RESET_CHECK'                                  => 'All data i arbetsarket för den valda tidsperioden och inloggade användare kommer att raderas. Fortsätta?',
'LB_FS_LIKELY_CASE'                                => 'Troligt fall',
'LB_FS_WORST_CASE'                                 => 'Värsta fall',
'LB_FS_BEST_CASE'                                  => 'Bästa fall',
'LBL_FDR_WK_LIKELY_CASE'                           => 'Estimerat troligt fall',
'LBL_FDR_WK_BEST_CASE'                             => 'Estimerat bästa fall',
'LBL_FDR_WK_WORST_CASE'                            => 'Estimerat värsta fall',
'LBL_BEST_CASE'                                    => 'Bästa fall:',
'LBL_LIKELY_CASE'                                  => 'Troligt fall:',
'LBL_WORST_CASE'                                   => 'Värsta fall:',
'LBL_FDR_C_BEST_CASE'                              => 'Bästa fall',
'LBL_FDR_C_WORST_CASE'                             => 'Värsta fall',
'LBL_FDR_C_LIKELY_CASE'                            => 'Troligt fall',
'LBL_QC_LAST_BEST_CASE'                            => 'Senaste angivna belopp (bästa fall):',
'LBL_QC_LAST_LIKELY_CASE'                          => 'Senaste angivna belopp (troligt fall):',
'LBL_QC_LAST_WORST_CASE'                           => 'Senaste angivna belopp (värsta fall):',
'LBL_QC_ROLL_BEST_VALUE'                           => 'Senaste angivna summa (bästa fall):',
'LBL_QC_ROLL_LIKELY_VALUE'                         => 'Senaste angivna summa (troligt fall):',
'LBL_QC_ROLL_WORST_VALUE'                          => 'Senaste angivna summa (värsta fall)',
'LBL_QC_COMMIT_BEST_CASE'                          => 'Angivet belopp (bästa fall):',
'LBL_QC_COMMIT_LIKELY_CASE'                        => 'Angivet belopp (troligt fall):',
'LBL_QC_COMMIT_WORST_CASE'                         => 'Angivet belopp (värsta fall):',
);?>

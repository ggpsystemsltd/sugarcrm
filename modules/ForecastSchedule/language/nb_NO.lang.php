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
'LNK_NEW_OPPORTUNITY'                              => 'Opprett mulighet',
'LBL_MODULE_TITLE'                                 => 'Prognoser',
'LBL_LIST_FORM_TITLE'                              => 'Forpliktede Prognoser',
'LNK_UPD_FORECAST'                                 => 'Arbeidsplan for Prognoser',
'LNK_QUOTA'                                        => 'Andeler',
'LNK_FORECAST_LIST'                                => 'Prognoserhistorikk',
'LBL_FORECAST_HISTORY'                             => 'Prognoser: Historikk',
'LBL_FORECAST_HISTORY_TITLE'                       => 'Prognoser: Historikk',
'LBL_TIMEPERIOD_NAME'                              => 'Tidsperiode',
'LBL_USER_NAME'                                    => 'Brukernavn',
'LBL_REPORTS_TO_USER_NAME'                         => 'Rapporterer til',
'LBL_FORECAST_ID'                                  => 'ID',
'LBL_FORECAST_TIME_ID'                             => 'Tidsperiode-ID',
'LBL_FORECAST_TYPE'                                => 'Prognosetype',
'LBL_FORECAST_OPP_COUNT'                           => 'Muligheter',
'LBL_FORECAST_OPP_WEIGH'                           => 'Påvirkbar mengde',
'LBL_FORECAST_OPP_COMMIT'                          => 'Trolig utfall',
'LBL_FORECAST_OPP_BEST_CASE'                       => 'Beste utfall',
'LBL_FORECAST_OPP_WORST'                           => 'Verste utfall',
'LBL_FORECAST_USER'                                => 'Bruker',
'LBL_DATE_COMMITTED'                               => 'Engasjeringsdato',
'LBL_DATE_ENTERED'                                 => 'Ingangsdato',
'LBL_DATE_MODIFIED'                                => 'Endringsdato',
'LBL_CREATED_BY'                                   => 'Opprettet av',
'LBL_DELETED'                                      => 'Slettet',
'LBL_QC_TIME_PERIOD'                               => 'Tidsperiode:',
'LBL_QC_OPPORTUNITY_COUNT'                         => 'Mulighetsteller:',
'LBL_QC_WEIGHT_VALUE'                              => 'Påvirkbar mengde:',
'LBL_QC_COMMIT_VALUE'                              => 'Engasjert mengde:',
'LBL_QC_COMMIT_BUTTON'                             => 'Engasjér',
'LBL_QC_WORKSHEET_BUTTON'                          => 'Arbeidsplan',
'LBL_QC_ROLL_COMMIT_VALUE'                         => 'Engasjementsmengde for rollup:',
'LBL_QC_DIRECT_FORECAST'                           => 'Mine direkte Prognoser:',
'LBL_QC_ROLLUP_FORECAST'                           => 'Min gruppes Prognoser:',
'LBL_QC_UPCOMING_FORECASTS'                        => 'Mine Prognoser',
'LBL_QC_LAST_DATE_COMMITTED'                       => 'Siste engasjeringsdato:',
'LBL_QC_LAST_COMMIT_VALUE'                         => 'Siste engasjementsmengde:',
'LBL_QC_HEADER_DELIM'                              => 'Til:',
'LBL_OW_OPPORTUNITIES'                             => 'Mulighet',
'LBL_OW_ACCOUNTNAME'                               => 'Bedrift',
'LBL_OW_REVENUE'                                   => 'Mengde',
'LBL_OW_WEIGHTED'                                  => 'Vektet mengde',
'LBL_OW_MODULE_TITLE'                              => 'Arbeidsflate for muligheter',
'LBL_OW_PROBABILITY'                               => 'Trolighet',
'LBL_OW_NEXT_STEP'                                 => 'Neste skritt',
'LBL_OW_DESCRIPTION'                               => 'Beskrivelse',
'LBL_OW_TYPE'                                      => 'Type',
'LNK_NEW_TIMEPERIOD'                               => 'Opprett tidsperiode',
'LNK_TIMEPERIOD_LIST'                              => 'Tidsperioder',
'LBL_SVFS_FORECASTDATE'                            => 'Planlegg startdato',
'LBL_SVFS_STATUS'                                  => 'Status',
'LBL_SVFS_USER'                                    => 'For',
'LBL_SVFS_CASCADE'                                 => 'Flomme til rapporter?',
'LBL_SVFS_HEADER'                                  => 'Plan for Prognoser:',
'LB_FS_KEY'                                        => 'ID',
'LBL_FS_TIMEPERIOD_ID'                             => 'Tidsperiode-ID:',
'LBL_FS_USER_ID'                                   => 'Bruker-ID:',
'LBL_FS_TIMEPERIOD'                                => 'Tidsperiode',
'LBL_FS_START_DATE'                                => 'Startdato',
'LBL_FS_END_DATE'                                  => 'Sluttdato',
'LBL_FS_FORECAST_START_DATE'                       => 'Startdato for Prognoser',
'LBL_FS_STATUS'                                    => 'Status',
'LBL_FS_FORECAST_FOR'                              => 'Skjema for:',
'LBL_FS_CASCADE'                                   => 'Flomme?',
'LBL_FS_MODULE_NAME'                               => 'Plan for Prognoser',
'LBL_FS_CREATED_BY'                                => 'Opprettet av',
'LBL_FS_DATE_ENTERED'                              => 'Inngangsdato',
'LBL_FS_DATE_MODIFIED'                             => 'Endringsdato',
'LBL_FS_DELETED'                                   => 'Slettet',
'LBL_FDR_USER_NAME'                                => 'Direkterapport',
'LBL_FDR_OPPORTUNITIES'                            => 'Muligheter i Prognoser:',
'LBL_FDR_WEIGH'                                    => 'Vektet mengde av muligheter:',
'LBL_FDR_COMMIT'                                   => 'Engasjert mengde',
'LBL_FDR_DATE_COMMIT'                              => 'Dato for engasjering',
'LBL_DV_HEADER'                                    => 'Prognoser: Arbeidsflate',
'LBL_DV_MY_FORECASTS'                              => 'Mine Prognoser',
'LBL_DV_MY_TEAM'                                   => 'Min gruppes Prognoser',
'LBL_DV_TIMEPERIODS'                               => 'Tidsperioder:',
'LBL_DV_FORECAST_PERIOD'                           => 'Tidsperiode for Prognoser',
'LBL_DV_FORECAST_OPPORTUNITY'                      => 'Muligheter for Prognoser',
'LBL_SEARCH'                                       => 'Velg',
'LBL_SEARCH_LABEL'                                 => 'Velg',
'LBL_COMMIT_HEADER'                                => 'Engasjement i Prognoser',
'LBL_DV_LAST_COMMIT_DATE'                          => 'Siste engasjeringsdato:',
'LBL_DV_LAST_COMMIT_AMOUNT'                        => 'Siste engasjeringsmengde:',
'LBL_DV_FORECAST_ROLLUP'                           => 'Rollup for Prognoser',
'LBL_DV_TIMEPERIOD'                                => 'Tidsperioder:',
'LBL_DV_TIMPERIOD_DATES'                           => 'Datoomfang:',
'LBL_LV_TIMPERIOD'                                 => 'Tidsperiode',
'LBL_LV_TIMPERIOD_START_DATE'                      => 'Startdato',
'LBL_LV_TIMPERIOD_END_DATE'                        => 'Sluttdato',
'LBL_LV_TYPE'                                      => 'Prognosetype',
'LBL_LV_COMMIT_DATE'                               => 'Dato for engasjering',
'LBL_LV_OPPORTUNITIES'                             => 'Muligheter',
'LBL_LV_WEIGH'                                     => 'Vektet mengde',
'LBL_LV_COMMIT'                                    => 'Engasjert mengde',
'LBL_COMMIT_NOTE'                                  => 'Tast inn den mengden du ønsker å engasjere for den valgte tidsperioden:',
'LBL_COMMIT_MESSAGE'                               => 'Vil du engasjere denne mengden?',
'ERR_FORECAST_AMOUNT'                              => 'Engasjeringsmengden er påkrevd og må være et tall.',
'LBL_FC_START_DATE'                                => 'Startdato',
'LBL_FC_USER'                                      => 'Skjema for',
'LBL_NO_ACTIVE_TIMEPERIOD'                         => 'Ingen aktive tidsperioder for Prognoser',
'LBL_FDR_ADJ_AMOUNT'                               => 'Justerte mengder',
'LBL_SAVE_WOKSHEET'                                => 'Lagre arbeidsflate',
'LBL_RESET_WOKSHEET'                               => 'Nullstill arbeidsflate',
'LBL_RESET_CHECK'                                  => 'Alle arbeidsflate-data for den valgte tidsperioden og brukeren vil bli fjernet. Fortsett?',
'LB_FS_LIKELY_CASE'                                => 'Trolig utfall',
'LB_FS_WORST_CASE'                                 => 'Verste utfall',
'LB_FS_BEST_CASE'                                  => 'Beste utfall',
'LBL_FDR_WK_LIKELY_CASE'                           => 'Stipulert trolig utfall',
'LBL_FDR_WK_BEST_CASE'                             => 'Stipulert beste utfall',
'LBL_FDR_WK_WORST_CASE'                            => 'Stipulert verste utfall',
'LBL_BEST_CASE'                                    => 'Beste utfall:',
'LBL_LIKELY_CASE'                                  => 'Trolig utfall:',
'LBL_WORST_CASE'                                   => 'Verste utfall:',
'LBL_FDR_C_BEST_CASE'                              => 'Beste utfall',
'LBL_FDR_C_WORST_CASE'                             => 'Verste utfall',
'LBL_FDR_C_LIKELY_CASE'                            => 'Trolig utfall',
'LBL_QC_LAST_BEST_CASE'                            => 'Siste engasjeringsmengde (Beste utfall):',
'LBL_QC_LAST_LIKELY_CASE'                          => 'Siste engasjeringsmengde (Trolig utfall):',
'LBL_QC_LAST_WORST_CASE'                           => 'Siste engasjeringsmengde (Verste utfall):',
'LBL_QC_ROLL_BEST_VALUE'                           => 'Rollup-engasjeringsmengde (Beste utfall):',
'LBL_QC_ROLL_LIKELY_VALUE'                         => 'Rollup-engasjeringsmengde (Trolig utfall):',
'LBL_QC_ROLL_WORST_VALUE'                          => 'Rollup-engasjeringsmengde (Verste utfall):',
'LBL_QC_COMMIT_BEST_CASE'                          => 'Engasjeringsmengde (Beste utfall):',
'LBL_QC_COMMIT_LIKELY_CASE'                        => 'Engasjeringsmengde (Trolig utfall):',
'LBL_QC_COMMIT_WORST_CASE'                         => 'Engasjeringsmengde (Verste utfall):',
);?>

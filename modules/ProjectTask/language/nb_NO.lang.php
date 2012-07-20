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
'LBL_MODULE_NAME'                                  => 'Prosjektoppgaver',
'LBL_MODULE_TITLE'                                 => 'Prosjektoppgave: Hjem',
'LBL_SEARCH_FORM_TITLE'                            => 'Søk prosjektoppgave',
'LBL_LIST_FORM_TITLE'                              => 'Liste over prosjektoppgaver',
'LBL_EDIT_TASK_IN_GRID_TITLE'                      => 'Endre oppgave i Grid',
'LBL_ID'                                           => 'ID:',
'LBL_PROJECT_TASK_ID'                              => 'Prosjektoppgave-ID:',
'LBL_PROJECT_ID'                                   => 'Prosjekt-ID:',
'LBL_DATE_ENTERED'                                 => 'Inngangsdato:',
'LBL_DATE_MODIFIED'                                => 'Endringsdato:',
'LBL_ASSIGNED_USER_ID'                             => 'Tildelt:',
'LBL_MODIFIED_USER_ID'                             => 'Endret av bruker-ID:',
'LBL_CREATED_BY'                                   => 'Opprettet av:',
'LBL_TEAM_ID'                                      => 'Gruppe:',
'LBL_NAME'                                         => 'Navn:',
'LBL_STATUS'                                       => 'Status:',
'LBL_DATE_DUE'                                     => 'Passende dato:',
'LBL_TIME_DUE'                                     => 'Passende tid:',
'LBL_RESOURCE'                                     => 'Ressurs:',
'LBL_PREDECESSORS'                                 => 'Forgjengere:',
'LBL_DATE_START'                                   => 'Startdato:',
'LBL_DATE_FINISH'                                  => 'Sluttdato:',
'LBL_TIME_START'                                   => 'Starttid:',
'LBL_TIME_FINISH'                                  => 'Sluttid:',
'LBL_DURATION'                                     => 'Varighet:',
'LBL_DURATION_UNIT'                                => 'Varighetsenhet:',
'LBL_ACTUAL_DURATION'                              => 'Faktisk varighet:',
'LBL_PARENT_ID'                                    => 'Prosjekt:',
'LBL_PARENT_TASK_ID'                               => 'Opphavsoppgave-ID:',
'LBL_PERCENT_COMPLETE'                             => 'Prosent fullført (%):',
'LBL_PRIORITY'                                     => 'Prioritet:',
'LBL_DESCRIPTION'                                  => 'Beskrivelse:',
'LBL_ORDER_NUMBER'                                 => 'Ordre:',
'LBL_TASK_NUMBER'                                  => 'Oppgavenummer:',
'LBL_TASK_ID'                                      => 'Oppgave-ID:',
'LBL_DEPENDS_ON_ID'                                => 'Avhenger av:',
'LBL_MILESTONE_FLAG'                               => 'Milepæl:',
'LBL_ESTIMATED_EFFORT'                             => 'Forventet innsats i timer:',
'LBL_ACTUAL_EFFORT'                                => 'Faktisk innsats i timer:',
'LBL_UTILIZATION'                                  => 'Bruk (%):',
'LBL_DELETED'                                      => 'Slettet:',
'LBL_LIST_ORDER_NUMBER'                            => 'Ordre',
'LBL_LIST_NAME'                                    => 'Navn',
'LBL_LIST_DAYS'                                    => 'dager',
'LBL_LIST_PARENT_NAME'                             => 'Prosjekt',
'LBL_LIST_PERCENT_COMPLETE'                        => 'Prosent fullført (%)',
'LBL_LIST_STATUS'                                  => 'Status',
'LBL_LIST_DURATION'                                => 'Varighet',
'LBL_LIST_ACTUAL_DURATION'                         => 'Faktisk varighet',
'LBL_LIST_ASSIGNED_USER_ID'                        => 'Tildelt',
'LBL_LIST_DATE_DUE'                                => 'Passende dato',
'LBL_LIST_DATE_START'                              => 'Startdato',
'LBL_LIST_DATE_FINISH'                             => 'Sluttdato',
'LBL_LIST_PRIORITY'                                => 'Prioritet',
'LBL_LIST_CLOSE'                                   => 'Lukk',
'LBL_PROJECT_NAME'                                 => 'Prosjektnavn',
'LNK_NEW_PROJECT'                                  => 'Opprett prosjekt',
'LNK_PROJECT_LIST'                                 => 'Prosjektliste',
'LNK_NEW_PROJECT_TASK'                             => 'Opprett ny prosjektoppgave',
'LNK_PROJECT_TASK_LIST'                            => 'Prosjektoppgaver',
'LBL_LIST_MY_PROJECT_TASKS'                        => 'Mine Prosjektoppgaver',
'LBL_DEFAULT_SUBPANEL_TITLE'                       => 'Prosjektoppgaver',
'LBL_NEW_FORM_TITLE'                               => 'Ny prosjektoppgave',
'LBL_ACTIVITIES_TITLE'                             => 'Aktiviteter',
'LBL_HISTORY_TITLE'                                => 'Historie',
'LBL_ACTIVITIES_SUBPANEL_TITLE'                    => 'Aktiviteter',
'LBL_HISTORY_SUBPANEL_TITLE'                       => 'Historie',
'DATE_JS_ERROR'                                    => 'Vennligst velg en dato som passer til den valgte tiden',
'LBL_ASSIGNED_USER_NAME'                           => 'Tildelt',
'LBL_PARENT_NAME'                                  => 'Prosjektnavn',
'LBL_LIST_PROJECT_NAME'                            => 'Prosjekter',
);?>

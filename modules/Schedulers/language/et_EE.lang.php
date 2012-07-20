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
  'LBL_OOTB_BOUNCE' => 'Run Nightly Process Bounced Campaign Emails',
  'LBL_OOTB_CAMPAIGN' => 'Run Nightly Mass Email Campaigns',
  'LBL_OOTB_PRUNE' => 'Prune Database on 1st of Month',
  'LBL_OOTB_TRACKER' => 'Prune tracker tables',
  'LBL_CRONTAB_EXAMPLES' => 'The above uses standard crontab notation.',
  'LBL_CATCH_UP' => 'Execute If Missed',
  'LBL_DATE_TIME_END' => 'Date & Time End',
  'LBL_DATE_TIME_START' => 'Date & Time Start',
  'ERR_CRON_SYNTAX' => 'Invalid Cron syntax',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'To Setup Windows Scheduler',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'To Setup Crontab',
  'LBL_CRON_LINUX_DESC' => 'Note: In order to run Sugar Schedulers, add the following line to the crontab file:',
  'LBL_CRON_WINDOWS_DESC' => 'Note: In order to run the Sugar schedulers, create a batch file to run using Windows Scheduled Tasks. The batch file should include the following commands:',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Run Nightly Mass Email Campaigns',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Run Nightly Process Bounced Campaign Emails',
  'LBL_PRUNEDATABASE' => 'Prune Database on 1st of Month',
  'LBL_TRIMTRACKER' => 'Prune Tracker Tables',
  'LBL_OOTB_REPORTS' => 'Run Report Generation Scheduled Tasks',
  'LBL_MINS' => 'min',
  'LBL_HOURS' => 'hrs',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Job Log',
  'LBL_OOTB_WORKFLOW' => 'Töötle töövoo ülesandeid',
  'LBL_OOTB_IE' => 'Vaata sissetulevaid postkaste',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Uuenda tracker_sessions tabelit',
  'LBL_LIST_JOB_INTERVAL' => 'Intervall:',
  'LBL_LIST_LIST_ORDER' => 'Planeerijad:',
  'LBL_LIST_NAME' => 'Planeerija:',
  'LBL_LIST_RANGE' => 'Vahemik:',
  'LBL_LIST_REMOVE' => 'Eemalda:',
  'LBL_LIST_STATUS' => 'Olek:',
  'LBL_LIST_TITLE' => 'Planeerimise loend',
  'LBL_LIST_EXECUTE_TIME' => 'Käivitab:',
  'LBL_SUN' => 'Pühapäev',
  'LBL_MON' => 'Esmaspäev',
  'LBL_TUE' => 'Teisipäev',
  'LBL_WED' => 'Kolmapäev',
  'LBL_THU' => 'Neljapäev',
  'LBL_FRI' => 'Reede',
  'LBL_SAT' => 'Laupäev',
  'LBL_ALL' => 'Iga päev',
  'LBL_EVERY_DAY' => 'Iga päev',
  'LBL_AT_THE' => 'At the',
  'LBL_EVERY' => 'Iga',
  'LBL_FROM' => 'Kellelt:',
  'LBL_ON_THE' => 'On the',
  'LBL_RANGE' => 'to',
  'LBL_AT' => 'at',
  'LBL_IN' => 'in',
  'LBL_AND' => 'and',
  'LBL_MINUTES' => 'minutit',
  'LBL_HOUR' => 'tundi',
  'LBL_HOUR_SING' => 'tund',
  'LBL_MONTH' => 'kuu',
  'LBL_OFTEN' => 'Nii tihti kui võimalik.',
  'LBL_MIN_MARK' => 'minute mark',
  'LBL_DAY_OF_MONTH' => 'kuupäev',
  'LBL_MONTHS' => 'kuu',
  'LBL_DAY_OF_WEEK' => 'päev',
  'LBL_ALWAYS' => 'Alati',
  'LBL_CATCH_UP_WARNING' => 'Kontrolli, kas see töö võib võtta käivituseks aega enam kui hetke.',
  'LBL_INTERVAL' => 'Intervall',
  'LBL_JOB' => 'Töö',
  'LBL_LAST_RUN' => 'Viimane edukas käivitus',
  'LBL_MODULE_NAME' => 'Sugari Planeerija',
  'LBL_MODULE_TITLE' => 'Planeerijad',
  'LBL_NAME' => 'Töö nimi',
  'LBL_NEVER' => 'Mitte kunagi',
  'LBL_NEW_FORM_TITLE' => 'Uus ajakava',
  'LBL_PERENNIAL' => 'pidev',
  'LBL_SEARCH_FORM_TITLE' => 'Planeerija otsing',
  'LBL_SCHEDULER' => 'Planeerija:',
  'LBL_STATUS' => 'Olek',
  'LBL_TIME_FROM' => 'Aktiivne',
  'LBL_TIME_TO' => 'Aktiivne',
  'LBL_WARN_CURL_TITLE' => 'cURL hoiatus:',
  'LBL_WARN_CURL' => 'Hoiatus:',
  'LBL_WARN_NO_CURL' => 'Süsteemil pol ecURL andmekogusid lubatud/koostatud PHP moodulis (--with-curl=/path/to/curl_library). Palun kontakteeru oma administraatoriga selle probleemi lahendamiseks. Ilma cURL funktsioonita ei saa Planeerija oma töid läbi viia.',
  'LBL_BASIC_OPTIONS' => 'Põhiseadistus',
  'LBL_ADV_OPTIONS' => 'Laiendatud suvandid',
  'LBL_TOGGLE_ADV' => 'Näita laiendatud suvandeid',
  'LBL_TOGGLE_BASIC' => 'Näita põhisuvandeid',
  'LNK_LIST_SCHEDULER' => 'Planeerijad',
  'LNK_NEW_SCHEDULER' => 'Loo Planeerija',
  'LNK_LIST_SCHEDULED' => 'Plaanitud tööd',
  'SOCK_GREETING' => 'See on SugarCRM Planeerijate Teenuse liides. [ saadaolevad käsud: start|restart|shutdown|status ] Lõpetamiseks kirjuta \'quit\'. Teenuse sulgemiseks kirjuta \'shutdown\'.',
  'ERR_DELETE_RECORD' => 'Ajakava kustutamiseks täpsusta kirje numbrit.',
  'NTC_DELETE_CONFIRMATION' => 'Oled kindel, et soovid seda kirjet kustutada?',
  'NTC_STATUS' => 'Selle ajakava eemaldamiseks Planeerija rippmenüü loenditest määra staatus mitteaktiivseks.',
  'NTC_LIST_ORDER' => 'Määra järjekord, mitmendana see ajakava kuvatakse Planeerija rippmenüü nimekirjades',
  'LBL_NO_PHP_CLI' => 'If your host does not have the PHP binary available, you can use wget or curl to launch your Jobs.<br />for wget: *    *    *    *    *    wget --quiet --non-verbose http://translate.sugarcrm.com/latest/cron.php > /dev/null 2>&1<br />for curl: *    *    *    *    *    curl --silent http://translate.sugarcrm.com/latest/cron.php > /dev/null 2>&1',
  'LBL_EXECUTE_TIME' => 'Täitmisaeg',
  'LBL_REFRESHJOBS' => 'Värskenda tööd',
  'LBL_POLLMONITOREDINBOXES' => 'Kontrolli Sissetulevate e-kirjade kontosid',
  'LBL_PROCESSWORKFLOW' => 'Töötle töövoo ülesandeid',
  'LBL_PROCESSQUEUE' => 'Käivita Report Generation Scheduled ülesanded',
  'LBL_UPDATETRACKERSESSIONS' => 'Uuenda trackeri sessiooni tabeleid',
);


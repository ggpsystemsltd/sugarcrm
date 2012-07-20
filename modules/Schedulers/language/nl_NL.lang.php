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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'De cron specificaties worden uitgevoerd op basis van server tijdzone (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Specificeer de taakplanner uitvoertijd ook op basis van deze tijdzone',
  'LBL_OOTB_WORKFLOW' => 'Process Workflow Tasks',
  'LBL_OOTB_REPORTS' => 'Run Report Generation Scheduled Tasks',
  'LBL_OOTB_IE' => 'Check Inbound Mailboxes',
  'LBL_OOTB_BOUNCE' => 'Run Nightly Process Bounced Campaign Emails',
  'LBL_OOTB_CAMPAIGN' => 'Run Nightly Mass Email Campaigns',
  'LBL_OOTB_PRUNE' => 'Prune Database on 1st of Month',
  'LBL_OOTB_TRACKER' => 'Prune Tracker Tables',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Update tracker_sessions Table',
  'LBL_LIST_JOB_INTERVAL' => 'Interval:',
  'LBL_LIST_STATUS' => 'Status:',
  'LBL_MINS' => 'min',
  'LBL_INTERVAL' => 'Interval',
  'LBL_STATUS' => 'Status',
  'LBL_REFRESHJOBS' => 'Refresh Jobs',
  'LBL_POLLMONITOREDINBOXES' => 'Check Inbound Mail Accounts',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Run Nightly Mass Email Campaigns',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Run Nightly Process Bounced Campaign Emails',
  'LBL_PRUNEDATABASE' => 'Prune Database on 1st of Month',
  'LBL_TRIMTRACKER' => 'Prune Tracker Tables',
  'LBL_PROCESSWORKFLOW' => 'Process Workflow Tasks',
  'LBL_PROCESSQUEUE' => 'Run Report Generation Scheduled Tasks',
  'LBL_UPDATETRACKERSESSIONS' => 'Update Tracker Session Tables',
  'LBL_LIST_LIST_ORDER' => 'Taakplanners:',
  'LBL_LIST_NAME' => 'Taakplanner:',
  'LBL_LIST_RANGE' => 'Bereik:',
  'LBL_LIST_REMOVE' => 'Verwijderen:',
  'LBL_LIST_TITLE' => 'Taaklijst:',
  'LBL_LIST_EXECUTE_TIME' => 'Wordt uitgevoerd om:',
  'LBL_SUN' => 'Zondag',
  'LBL_MON' => 'Maandag',
  'LBL_TUE' => 'Dinsdag',
  'LBL_WED' => 'Woensdag',
  'LBL_THU' => 'Donderdag',
  'LBL_FRI' => 'Vrijdag',
  'LBL_SAT' => 'Zaterdag',
  'LBL_ALL' => 'Elke dag',
  'LBL_EVERY_DAY' => 'Elke dag',
  'LBL_AT_THE' => 'op',
  'LBL_EVERY' => 'elke',
  'LBL_FROM' => 'Van',
  'LBL_ON_THE' => 'op',
  'LBL_RANGE' => 'tot',
  'LBL_AT' => 'op',
  'LBL_IN' => 'in',
  'LBL_AND' => 'en',
  'LBL_MINUTES' => 'minuten',
  'LBL_HOUR' => 'uren',
  'LBL_HOUR_SING' => 'uur',
  'LBL_MONTH' => 'maand',
  'LBL_OFTEN' => 'Zo vaak mogelijk',
  'LBL_MIN_MARK' => 'minuutaanwijzing',
  'LBL_HOURS' => 'uur',
  'LBL_DAY_OF_MONTH' => 'datum',
  'LBL_MONTHS' => 'ma',
  'LBL_DAY_OF_WEEK' => 'dag',
  'LBL_CRONTAB_EXAMPLES' => 'Bovenstaand kan de standaard CRONTAB notatie gebruikt worden.',
  'LBL_ALWAYS' => 'Altijd',
  'LBL_CATCH_UP' => 'Uitvoeren wanneer gemist',
  'LBL_CATCH_UP_WARNING' => 'Uitvinken als deze taak vrij lang gaat duren',
  'LBL_DATE_TIME_END' => 'Einddatum en tijd',
  'LBL_DATE_TIME_START' => 'Startdatum en tijd',
  'LBL_JOB' => 'Taak',
  'LBL_LAST_RUN' => 'Laatste Succesvolle Run',
  'LBL_MODULE_NAME' => 'Sugar Taakplanner',
  'LBL_MODULE_TITLE' => 'Taakplanner',
  'LBL_NAME' => 'Taaknaam',
  'LBL_NEVER' => 'Nooit',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Taak',
  'LBL_PERENNIAL' => 'oneindig',
  'LBL_SEARCH_FORM_TITLE' => 'Taak Zoeken',
  'LBL_SCHEDULER' => 'Taakplanner:',
  'LBL_TIME_FROM' => 'Actief van',
  'LBL_TIME_TO' => 'Actief tot',
  'LBL_WARN_CURL_TITLE' => 'CURL Waarschuwing:',
  'LBL_WARN_CURL' => 'Waarschuwing:',
  'LBL_WARN_NO_CURL' => 'Dit systeem heeft geen cURL libraries geactiveerd/gecompileerd in de PHP module (--with-curl=/path/to/curl_library). Neem contact op met je systeembeheerder om dit probleem op te lossen. Zonder cURL functionaliteit werkt de Taakplanner in Sugar niet.',
  'LBL_BASIC_OPTIONS' => 'Standaard Setup',
  'LBL_ADV_OPTIONS' => 'Geavanceeerde Opties',
  'LBL_TOGGLE_ADV' => 'Geavanceeerde Opties',
  'LBL_TOGGLE_BASIC' => 'Standaard Opties',
  'LNK_LIST_SCHEDULER' => 'Taakplanners',
  'LNK_NEW_SCHEDULER' => 'Nieuwe Taak',
  'LNK_LIST_SCHEDULED' => 'Geplande Taken',
  'SOCK_GREETING' => 'Dit is de interface voor de SugarCRM Taakplanner Service. De beschikbare deamon commandos zijn: [start|restart|shutdown|status] Om te stoppen, type &#39;quit&#39;. Om de Service te stoppen type &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Een recordnummer moet worden opgegeven om de Taak te verwijderen.',
  'ERR_CRON_SYNTAX' => 'Ongeldige Cron syntax',
  'NTC_DELETE_CONFIRMATION' => 'Weet u zeker dat u dit record wilt verwijderen?',
  'NTC_STATUS' => 'Zet de status op Inactief om deze Taak uit de Takenlijst te verwijderen.',
  'NTC_LIST_ORDER' => 'Zet de volgorde van de Taken in de Takenlijst',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Configureer Windows Taakplanner',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Configureer Crontab',
  'LBL_CRON_LINUX_DESC' => 'Voeg deze regel toe aan je CRONTAB (crontab -e):',
  'LBL_CRON_WINDOWS_DESC' => 'Maar een batch-file aan met de volgende commando&#39;s:',
  'LBL_NO_PHP_CLI' => 'Als je host geen PHP binary heeft, dan kun je wget of curl gebruiken om je taakplanner aan te sturen.<br>wget: * * * * *    wget --quiet --non-verbose /cron.php > /dev/null 2>&1<br>curl: * * * * *    curl --silent /cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Taaklog',
  'LBL_EXECUTE_TIME' => 'Uitvoertijd',
);


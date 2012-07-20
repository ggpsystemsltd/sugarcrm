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
  'LBL_LIST_JOB_INTERVAL' => 'Interval:',
  'LBL_LIST_STATUS' => 'Status:',
  'LBL_INTERVAL' => 'Interval',
  'LBL_JOB' => 'Job',
  'LBL_STATUS' => 'Status',
  'LBL_OOTB_WORKFLOW' => 'Behandling af arbejdsgangopgaver',
  'LBL_OOTB_REPORTS' => 'Kør planlagte opgaver til rapportgenerering',
  'LBL_OOTB_IE' => 'Tjek indgående postkasser',
  'LBL_OOTB_BOUNCE' => 'Kør hver nat proces med afviste kampagne-e-mails',
  'LBL_OOTB_CAMPAIGN' => 'Kør hver nat kampagner med masse-e-mails',
  'LBL_OOTB_PRUNE' => 'Beskær databasen den 1. i måneden',
  'LBL_OOTB_TRACKER' => 'Beskær sporingstabeller',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Opdater sporingssessionstabel',
  'LBL_LIST_LIST_ORDER' => 'Planlæggere:',
  'LBL_LIST_NAME' => 'Planlægger:',
  'LBL_LIST_RANGE' => 'Interval:',
  'LBL_LIST_REMOVE' => 'Fjern:',
  'LBL_LIST_TITLE' => 'Liste over tidsplaner:',
  'LBL_LIST_EXECUTE_TIME' => 'Vil køre på:',
  'LBL_SUN' => 'Søndag',
  'LBL_MON' => 'Mandag',
  'LBL_TUE' => 'Tirsdag',
  'LBL_WED' => 'Onsdag',
  'LBL_THU' => 'Torsdag',
  'LBL_FRI' => 'Fredag',
  'LBL_SAT' => 'Lørdag',
  'LBL_ALL' => 'Hver dag',
  'LBL_EVERY_DAY' => 'Hver dag',
  'LBL_AT_THE' => 'På',
  'LBL_EVERY' => 'Hver',
  'LBL_FROM' => 'Fra',
  'LBL_ON_THE' => 'På den',
  'LBL_RANGE' => 'til',
  'LBL_AT' => 'på',
  'LBL_IN' => 'i',
  'LBL_AND' => 'og',
  'LBL_MINUTES' => 'minutter',
  'LBL_HOUR' => 'timer',
  'LBL_HOUR_SING' => 'time',
  'LBL_MONTH' => 'måned',
  'LBL_OFTEN' => 'Så tit som muligt.',
  'LBL_MIN_MARK' => 'minutmærke',
  'LBL_MINS' => 'min.',
  'LBL_HOURS' => 't.',
  'LBL_DAY_OF_MONTH' => 'dato',
  'LBL_MONTHS' => 'ma',
  'LBL_DAY_OF_WEEK' => 'dag',
  'LBL_CRONTAB_EXAMPLES' => 'Ovennævnte bruger standard crontab-notation.',
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Cron specifikationer køre ud på serveren tidszone (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Specificer venligst Planlægger eksekverings tid tilsvarende.',
  'LBL_ALWAYS' => 'Altid',
  'LBL_CATCH_UP' => 'Udfør hvis ubesvaret',
  'LBL_CATCH_UP_WARNING' => 'Fjern markeringen, hvis dette job må tage mere end et øjeblik at køre.',
  'LBL_DATE_TIME_END' => 'Dato & tid slut',
  'LBL_DATE_TIME_START' => 'Dato & tid start',
  'LBL_LAST_RUN' => 'Seneste succesfulde kørsel',
  'LBL_MODULE_NAME' => 'Sugar-planlægger',
  'LBL_MODULE_TITLE' => 'Planlæggere',
  'LBL_NAME' => 'Jobnavn',
  'LBL_NEVER' => 'Aldrig',
  'LBL_NEW_FORM_TITLE' => 'Ny tidsplan',
  'LBL_PERENNIAL' => 'tidsubegrænset',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter planlægger',
  'LBL_SCHEDULER' => 'Planlægger:',
  'LBL_TIME_FROM' => 'Aktiv fra',
  'LBL_TIME_TO' => 'Aktiv til',
  'LBL_WARN_CURL_TITLE' => 'cURL-advarsel:',
  'LBL_WARN_CURL' => 'Advarsel:',
  'LBL_WARN_NO_CURL' => 'Dette system har ikke cURL-biblioteker aktiveret/kompileret i PHP-modulet "- with-curl=/sti/til/curl_library". Kontakt administratoren for at løse dette problem. Uden cURL-funktionaliteten, kan planlæggeren ikke tråde sine job.',
  'LBL_BASIC_OPTIONS' => 'Basiskonfiguration',
  'LBL_ADV_OPTIONS' => 'Avancerede indstillinger',
  'LBL_TOGGLE_ADV' => 'Avancerede indstillinger',
  'LBL_TOGGLE_BASIC' => 'Grundlæggende indstillinger',
  'LNK_LIST_SCHEDULER' => 'Planlæggere',
  'LNK_NEW_SCHEDULER' => 'Opret planlægger',
  'LNK_LIST_SCHEDULED' => 'Planlagte job',
  'SOCK_GREETING' => 'Dette er grænsefladen til SugarCRM Schedulers-tjenesten. [Tilgængelige daemon-kommandoer: Start|genstart|luk|status] Skriv &#39;afslut&#39; for at afslutte. Skriv &#39;luk&#39; for at lukke tjenesten.',
  'ERR_DELETE_RECORD' => 'Du skal angive et postnummer for at slette tidsplanen.',
  'ERR_CRON_SYNTAX' => 'Ugyldig Cron-syntaks',
  'NTC_DELETE_CONFIRMATION' => 'Er du sikker på, at du vil slette denne post?',
  'NTC_STATUS' => 'Angiv status til Inaktiv for at fjerne denne tidsplan fra Planlægger-rullelisterne',
  'NTC_LIST_ORDER' => 'Angiv den rækkefølge, hvori denne tidsplan vil blive vist i Planlægger-rullelisterne',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Til Setup Windows Scheduler',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Til Setup crontab',
  'LBL_CRON_LINUX_DESC' => 'Føj denne linje til crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Opret en batchfil med følgende kommandoer:',
  'LBL_NO_PHP_CLI' => 'Hvis din vært har ikke PHP-binære til rådighed, kan du bruge wget eller curl til at lancere dine job.<br>for wget: <b>*    *    *    *    *    wget - quiet - ikke-verbose http://projects/danska/sugar_crm_site/cron.php > /dev/null 2>&1</b><br>for curl: <b>*    *    *    *    *    curl -silent http://projects/danska/sugar_crm_site/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Joblog',
  'LBL_EXECUTE_TIME' => 'Udfør tid',
  'LBL_REFRESHJOBS' => 'Opdater job',
  'LBL_POLLMONITOREDINBOXES' => 'Tjek indgående e-mail-konti',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Kør hver nat kampagner med masse-e-mails',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Kør hver nat proces med afviste kampagne-e-mails',
  'LBL_PRUNEDATABASE' => 'Beskær databasen den 1. i måneden',
  'LBL_TRIMTRACKER' => 'Beskær sporingstabeller',
  'LBL_PROCESSWORKFLOW' => 'Behandling af arbejdsgangopgaver',
  'LBL_PROCESSQUEUE' => 'Kør planlagte opgaver til rapportgenerering',
  'LBL_UPDATETRACKERSESSIONS' => 'Opdater sporingssessionstabeller',
);


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
  'LBL_MINS' => 'min',
  'LBL_INTERVAL' => 'Interval',
  'LBL_STATUS' => 'Status',
  'LBL_OOTB_WORKFLOW' => 'Pokreni zadatke radnog toka',
  'LBL_OOTB_REPORTS' => 'Pokreni generisanje izveštaja o planiranim zadacima',
  'LBL_OOTB_IE' => 'Proveri dolazno poštansko sanduče',
  'LBL_OOTB_BOUNCE' => 'Pokreni noćno procesiranje vraćenih email poruka iz kampanja',
  'LBL_OOTB_CAMPAIGN' => 'Pokreni noćne masovne Email kampanje',
  'LBL_OOTB_PRUNE' => 'Smanji bazu prvog dana u mesecu',
  'LBL_OOTB_TRACKER' => 'Smanji tabele sistema za praćenje',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Ažuriraj tabelu tracker_sessions',
  'LBL_LIST_LIST_ORDER' => 'Planeri:',
  'LBL_LIST_NAME' => 'Planer:',
  'LBL_LIST_RANGE' => 'Opseg:',
  'LBL_LIST_REMOVE' => 'Ukloni:',
  'LBL_LIST_TITLE' => 'Lista planova:',
  'LBL_LIST_EXECUTE_TIME' => 'Počeće u:',
  'LBL_SUN' => 'Nedelja',
  'LBL_MON' => 'Ponedeljak',
  'LBL_TUE' => 'Utorak',
  'LBL_WED' => 'Sreda',
  'LBL_THU' => 'Četvrtak',
  'LBL_FRI' => 'Petak',
  'LBL_SAT' => 'Subota',
  'LBL_ALL' => 'Svaki dan',
  'LBL_EVERY_DAY' => 'Svaki dan',
  'LBL_AT_THE' => 'U',
  'LBL_EVERY' => 'Svaki',
  'LBL_FROM' => 'Od',
  'LBL_ON_THE' => 'Na',
  'LBL_RANGE' => 'do',
  'LBL_AT' => 'na',
  'LBL_IN' => 'u',
  'LBL_AND' => 'i',
  'LBL_MINUTES' => 'minuta',
  'LBL_HOUR' => 'sati',
  'LBL_HOUR_SING' => 'sat',
  'LBL_MONTH' => 'mesec',
  'LBL_OFTEN' => 'Koliko god je moguće često.',
  'LBL_MIN_MARK' => 'oznaka minute',
  'LBL_HOURS' => 'sati',
  'LBL_DAY_OF_MONTH' => 'datum',
  'LBL_MONTHS' => 'mesec',
  'LBL_DAY_OF_WEEK' => 'dan',
  'LBL_CRONTAB_EXAMPLES' => 'Iznad koristi standardnu crontab notaciju.',
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Specifikacije cron-a rade u zavisnosti od vremenske zone servera (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Molim navedite vreme izvršenja shodno tome.',
  'LBL_ALWAYS' => 'Uvek',
  'LBL_CATCH_UP' => 'Izvrši ako je propušteno',
  'LBL_CATCH_UP_WARNING' => 'Isključite ako je za izvršavanje ovoga potrebno više od nekoliko trenutaka.',
  'LBL_DATE_TIME_END' => 'Datum i vreme završetka',
  'LBL_DATE_TIME_START' => 'Datum i vreme početka',
  'LBL_JOB' => 'Zadatak',
  'LBL_LAST_RUN' => 'Poslednje uspešno izvršavanje',
  'LBL_MODULE_NAME' => 'Suger planer',
  'LBL_MODULE_TITLE' => 'Planeri',
  'LBL_NAME' => 'Naziv zadatka',
  'LBL_NEVER' => 'Nikada',
  'LBL_NEW_FORM_TITLE' => 'Novo planiranje',
  'LBL_PERENNIAL' => 'neprekidan',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga planera',
  'LBL_SCHEDULER' => 'Planer:',
  'LBL_TIME_FROM' => 'Aktivan od',
  'LBL_TIME_TO' => 'Aktivan do',
  'LBL_WARN_CURL_TITLE' => 'cURL upozorenje:',
  'LBL_WARN_CURL' => 'Upozorenje:',
  'LBL_WARN_NO_CURL' => 'Ovaj sistem nema cURL biblioteke omogućene/kompajlirane u PHP modulu  (--with-curl=/path/to/curl_library). Molim, obratite se vašem administratoru za rešenje ovog problema. Bez cURL funkcionalnosti, Planer ne može nizati svoje poslove.',
  'LBL_BASIC_OPTIONS' => 'Osnovna podešavanja',
  'LBL_ADV_OPTIONS' => 'Napredne opcije',
  'LBL_TOGGLE_ADV' => 'Prikaži Napredne Opcije',
  'LBL_TOGGLE_BASIC' => 'Prikaži osnovne opcije',
  'LNK_LIST_SCHEDULER' => 'Planeri',
  'LNK_NEW_SCHEDULER' => 'Kreiraj Planera',
  'LNK_LIST_SCHEDULED' => 'Planirani zadaci',
  'SOCK_GREETING' => 'Ovo je interfejs za SugarCRM Servis Planera. [ Dostupne daemon komande: start|restart|shutdown|status ] Da odustanete, unesite &#39;quit&#39;. Da ugasite servis &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Morate navesti broj zapisa da bi obrisali zadatak.',
  'ERR_CRON_SYNTAX' => 'Neispravna Cron sintaksa',
  'NTC_DELETE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovaj zapis?',
  'NTC_STATUS' => 'Podesi status na Neaktivno da bi se ovaj zadatak uklonio iz padajuće liste Planera',
  'NTC_LIST_ORDER' => 'Postavi redosled po kome će se ovaj zadatak prikazati u padajućoj listi Planera',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Da bi podesli Windows Planer',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Da bi podesili Crontab',
  'LBL_CRON_LINUX_DESC' => 'Napomena: Za aktiviranje Sugar Planera, dodajte sledeću liniju u vaš crontab fajl:',
  'LBL_CRON_WINDOWS_DESC' => 'Napomena: Za aktiviranje Sugar planera, kreirajte komandni fajl koji se aktivira koristeći Windows Scheduled Tasks. Komandni fajl bi trebao da uključi sledeće komande:',
  'LBL_NO_PHP_CLI' => 'Ako Vaš host nema na raspolaganju PHP, za pokretanje zadataka možete da koristite programe wget i curl.<br>za wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1</b><br>za curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1 </b>',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Log zadatka',
  'LBL_EXECUTE_TIME' => 'Vreme izvršavanja',
  'LBL_REFRESHJOBS' => 'Osveži zadatke',
  'LBL_POLLMONITOREDINBOXES' => 'Proveri dolazne Email naloge',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Pokreni noćne masovne Email kampanje',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Pokreni noćno procesiranje odbijenih email-ova kampanje',
  'LBL_PRUNEDATABASE' => 'Smanji bazu prvog dana u mesecu',
  'LBL_TRIMTRACKER' => 'Smanji tabele sistema za praćenje',
  'LBL_PROCESSWORKFLOW' => 'Pokreni zadatke radnog toka',
  'LBL_PROCESSQUEUE' => 'Pokreni generisanje izveštaja o planiranim zadacima',
  'LBL_UPDATETRACKERSESSIONS' => 'Ažuriraj tabele sesija sistema za praćenje',
);


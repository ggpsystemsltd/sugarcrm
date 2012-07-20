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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Cron nustatymai yra pagal serverio laiko zoną (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Prašome nustatyti planuotoją atsižvelgiant į tai.',
  'LBL_MINS' => 'min',
  'LBL_OOTB_WORKFLOW' => 'Vykdyti darbo sekų užduotis',
  'LBL_OOTB_REPORTS' => 'Vykdyti suplanuotas ataskaitų užduotis',
  'LBL_OOTB_IE' => 'Tikrinti įeinančias pašto dėžutes',
  'LBL_OOTB_BOUNCE' => 'Vykdyti naktines nepasiekusių adresatų el. pašto kampanijas',
  'LBL_OOTB_CAMPAIGN' => 'Vykdyti naktinius kampanijų laiškų siuntimus',
  'LBL_OOTB_PRUNE' => 'Sumažinti duomenų bazę kiekvieno mėnesio 1 dieną',
  'LBL_OOTB_TRACKER' => 'Sumažinti audito lenteles',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Atnaujinti tracker_sessions lentelę',
  'LBL_LIST_JOB_INTERVAL' => 'Intervalas:',
  'LBL_LIST_LIST_ORDER' => 'Planuotojai:',
  'LBL_LIST_NAME' => 'Planuotojas:',
  'LBL_LIST_RANGE' => 'Periodas:',
  'LBL_LIST_REMOVE' => 'Išimti:',
  'LBL_LIST_STATUS' => 'Statusas:',
  'LBL_LIST_TITLE' => 'Planuotojų sąrašas:',
  'LBL_LIST_EXECUTE_TIME' => 'Bus vykdomas:',
  'LBL_SUN' => 'Sekmadienis',
  'LBL_MON' => 'Pirmadienis',
  'LBL_TUE' => 'Antradienis',
  'LBL_WED' => 'Trečiadienis',
  'LBL_THU' => 'Ketvirtadienis',
  'LBL_FRI' => 'Penktadienis',
  'LBL_SAT' => 'Šeštadienis',
  'LBL_ALL' => 'Kiekvieną dieną',
  'LBL_EVERY_DAY' => 'Kiekvieną dieną',
  'LBL_AT_THE' => 'Laiku',
  'LBL_EVERY' => 'Kiekvieną',
  'LBL_FROM' => 'Nuo',
  'LBL_ON_THE' => 'Kas',
  'LBL_RANGE' => 'iki',
  'LBL_AT' => 'prie',
  'LBL_IN' => 'į',
  'LBL_AND' => 'ir',
  'LBL_MINUTES' => 'minutės',
  'LBL_HOUR' => 'valandos',
  'LBL_HOUR_SING' => 'valanda',
  'LBL_MONTH' => 'mėnuo',
  'LBL_OFTEN' => 'Kaip įmanoma dažnai.',
  'LBL_MIN_MARK' => 'minutės žymuo',
  'LBL_HOURS' => 'val',
  'LBL_DAY_OF_MONTH' => 'm.diena',
  'LBL_MONTHS' => 'mėnuo',
  'LBL_DAY_OF_WEEK' => 's.diena',
  'LBL_CRONTAB_EXAMPLES' => 'Viršuje naudojama standartinė crontab žymėjimo sistema.',
  'LBL_ALWAYS' => 'Visada',
  'LBL_CATCH_UP' => 'Vykdyti jei praleistas',
  'LBL_CATCH_UP_WARNING' => 'Nuimti pažymėjimą, jeigu darbas gali užtrukti ilgiau.',
  'LBL_DATE_TIME_END' => 'Užbaigimo data ir laikas',
  'LBL_DATE_TIME_START' => 'Pradžios data ir laikas',
  'LBL_INTERVAL' => 'Intervalas',
  'LBL_JOB' => 'Darbas',
  'LBL_LAST_RUN' => 'Paskutinis sėkmingas įvykdymas',
  'LBL_MODULE_NAME' => 'Sugar planuotojas',
  'LBL_MODULE_TITLE' => 'Planuotojai',
  'LBL_NAME' => 'Darbo pavadinimas',
  'LBL_NEVER' => 'Niekada',
  'LBL_NEW_FORM_TITLE' => 'Naujas planuotojas',
  'LBL_PERENNIAL' => 'Amžinas',
  'LBL_SEARCH_FORM_TITLE' => 'Planuotojo paieška',
  'LBL_SCHEDULER' => 'Planuotojas:',
  'LBL_STATUS' => 'Statusas',
  'LBL_TIME_FROM' => 'Aktyvus nuo',
  'LBL_TIME_TO' => 'Aktyvus iki',
  'LBL_WARN_CURL_TITLE' => 'cURL perspėjimas:',
  'LBL_WARN_CURL' => 'Perspėjimas:',
  'LBL_WARN_NO_CURL' => 'Ši sistema netri cURL bibliotekų įjungtų/sukompiliuotų PHP modulyje(--su-curl=/kelias/į/curl_biblioteką).  Prašome susisiekti su administratoriumi ir išspręsti šią problemą.  Be cURL funkcionalumo, planuotojas negali daryti savo darbų.',
  'LBL_BASIC_OPTIONS' => 'Baziniai nustatymai',
  'LBL_ADV_OPTIONS' => 'Sudėtingesni nustatymai',
  'LBL_TOGGLE_ADV' => 'Sudėtingesni nustatymai',
  'LBL_TOGGLE_BASIC' => 'Baziniai nustatymai',
  'LNK_LIST_SCHEDULER' => 'Planuotojai',
  'LNK_NEW_SCHEDULER' => 'Sukurti planuotoją',
  'LNK_LIST_SCHEDULED' => 'Suplanuoti darbai',
  'SOCK_GREETING' => 'Tai yra interfeisas skirtas SugarCRM suplanavimo servisams. <br />[ Galimas daemon komandos: start|restart|shutdown|status ]<br /> Baigti, rašykite &#39;quit&#39;. Išjungti servisą rašykite &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Jūs turite nurodyti įrašo numerį, kad galėtumėme ištrinti suplanavimą.',
  'ERR_CRON_SYNTAX' => 'Neteisinga Cron sintaksė',
  'NTC_DELETE_CONFIRMATION' => 'Ar tikrai norite ištrinti šį įrašą ?',
  'NTC_STATUS' => 'Nustatykite statusą į neaktyvų, kad ištrintumėte šį darbą iš iššokančio sąrašo',
  'NTC_LIST_ORDER' => 'Nustatykite tvarką, kuria norite matyti iššokančiame sąraše',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Nustatyti Windows planuotoją',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Nustatyti crontab',
  'LBL_CRON_LINUX_DESC' => 'Pridėti šią eilutę prie crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Sukurti batch failą su šiomis komandomis:',
  'LBL_NO_PHP_CLI' => 'Jeigu aptarnaujantis servisas (host) neturi PHP bibliotekos, galite naudotis wget arba curl, kad paleistumėte savo darbus.<br>Dėl wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose http://translate.sugarcrm.com/latest/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent http://translate.sugarcrm.com/latest/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Darbų registratorius',
  'LBL_EXECUTE_TIME' => 'Vykdymo laikas',
  'LBL_REFRESHJOBS' => 'Atnaujinti darbus',
  'LBL_POLLMONITOREDINBOXES' => 'Patikrinti įeinančias pašto dėžutes',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Vykdyti masinių laiškų siuntimą',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Vykdyti grįžtančių laiškų apdorojimą',
  'LBL_PRUNEDATABASE' => 'Išvalyti duomenų bazę pirmą mėnesio dieną',
  'LBL_TRIMTRACKER' => 'Išvalyti audito lenteles',
  'LBL_PROCESSWORKFLOW' => 'Vykdyti darbo sekos užduotis',
  'LBL_PROCESSQUEUE' => 'Paleisti ataskaitų generavimą nustatytoms užduotims',
  'LBL_UPDATETRACKERSESSIONS' => 'Atnaujinti audito lentelės',
);


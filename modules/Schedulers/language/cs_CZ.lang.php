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
  'LBL_OOTB_TRACKER' => 'Omezit trekovací tabulky',
  'LBL_PROCESSQUEUE' => 'Spustit Report Generation Scheduled Tasks --generování reportů dle naplánovancýh úkolů--',
  'LBL_UPDATETRACKERSESSIONS' => 'Aktualizovat trekovací tabulky',
  'LBL_LIST_JOB_INTERVAL' => 'Interval:',
  'LBL_MINS' => 'min',
  'LBL_INTERVAL' => 'Interval',
  'LBL_OOTB_WORKFLOW' => 'Zpracování úkolů workflow',
  'LBL_OOTB_REPORTS' => 'Spustit Report Generation Scheduled Tasks --geneorvání reportů dle naplánovancýh úkolů--',
  'LBL_OOTB_IE' => 'Kontrola poštovních schránek pro příchozí poštu',
  'LBL_OOTB_BOUNCE' => 'Spouštět noční zpracování vrácených e-mailů z kampaní',
  'LBL_OOTB_CAMPAIGN' => 'Spouštět noční hromadné rozesílání e-mailových kampaní',
  'LBL_OOTB_PRUNE' => 'Provést údržbu databáze každého prvního v měsíci',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Aktualizovat tracker_sessions tabulku',
  'LBL_LIST_LIST_ORDER' => 'Naplánované úlohy:',
  'LBL_LIST_NAME' => 'Naplánovaná úloha:',
  'LBL_LIST_RANGE' => 'Rozpětí:',
  'LBL_LIST_REMOVE' => 'Odstranit:',
  'LBL_LIST_STATUS' => 'Stav:',
  'LBL_LIST_TITLE' => 'Seznam naplánovaných úloh:',
  'LBL_LIST_EXECUTE_TIME' => 'Spustí se:',
  'LBL_SUN' => 'Neděle',
  'LBL_MON' => 'Pondělí',
  'LBL_TUE' => 'Úterý',
  'LBL_WED' => 'Středa',
  'LBL_THU' => 'Čtvrtek',
  'LBL_FRI' => 'Pátek',
  'LBL_SAT' => 'Sobota',
  'LBL_ALL' => 'Každý den',
  'LBL_EVERY_DAY' => 'Každý den',
  'LBL_AT_THE' => 'V',
  'LBL_EVERY' => 'Každý',
  'LBL_FROM' => 'Odesílatel',
  'LBL_ON_THE' => 'V',
  'LBL_RANGE' => 'do',
  'LBL_AT' => 'v',
  'LBL_IN' => 'v',
  'LBL_AND' => 'a',
  'LBL_MINUTES' => 'minuty',
  'LBL_HOUR' => 'hodin',
  'LBL_HOUR_SING' => 'hodina',
  'LBL_MONTH' => 'měsíc',
  'LBL_OFTEN' => 'Tak často jak jen možné.',
  'LBL_MIN_MARK' => 'označení minuty',
  'LBL_HOURS' => 'hod',
  'LBL_DAY_OF_MONTH' => 'datum',
  'LBL_MONTHS' => 'měs',
  'LBL_DAY_OF_WEEK' => 'den',
  'LBL_CRONTAB_EXAMPLES' => 'To co je nahoře používá standartní crontab zápis',
  'LBL_ALWAYS' => 'Vždy',
  'LBL_CATCH_UP' => 'Spustit, pokud mine',
  'LBL_CATCH_UP_WARNING' => 'Odškrtněte toto, pokud tento program poběží déle než chvilku.',
  'LBL_DATE_TIME_END' => 'Datum a čas konce',
  'LBL_DATE_TIME_START' => 'Datum a čas začátku',
  'LBL_JOB' => 'Práce',
  'LBL_LAST_RUN' => 'Poslední úspěšný běh',
  'LBL_MODULE_NAME' => 'Sugar plány',
  'LBL_MODULE_TITLE' => 'Plánovač',
  'LBL_NAME' => 'Jméno úkolu',
  'LBL_NEVER' => 'Nikdy',
  'LBL_NEW_FORM_TITLE' => 'Nový plán',
  'LBL_PERENNIAL' => 'trvalý',
  'LBL_SEARCH_FORM_TITLE' => 'Hledání v plánu',
  'LBL_SCHEDULER' => 'Naplánovaná úloha:',
  'LBL_STATUS' => 'Stav',
  'LBL_TIME_FROM' => 'Aktivní od',
  'LBL_TIME_TO' => 'Aktivní do',
  'LBL_WARN_CURL_TITLE' => 'cURL varování:',
  'LBL_WARN_CURL' => 'Varování:',
  'LBL_WARN_NO_CURL' => 'Tento systém nemá cURL knihovny aktnivní/zkompilované v PHP. Prosím kontaktujte svého administrátora, aby tento problém vyřešil. Bey cURL knihovny plánovače nebudou fungovat.',
  'LBL_BASIC_OPTIONS' => 'Základní nastavení',
  'LBL_ADV_OPTIONS' => 'Rozšířené volby',
  'LBL_TOGGLE_ADV' => 'Rozšířené volby',
  'LBL_TOGGLE_BASIC' => 'Základní volby',
  'LNK_LIST_SCHEDULER' => 'Plánovač',
  'LNK_NEW_SCHEDULER' => 'Vytvořit plán',
  'LNK_LIST_SCHEDULED' => 'Naplánované úkoly',
  'SOCK_GREETING' => 'Toto je rozhraní pro SugarCRM plánovací službu. Příkazy daemona jsou: start|restart|shutdown|status Pro odchod napište [quit]. Pro vypnutí služby [shutdown]',
  'ERR_DELETE_RECORD' => 'Pro vymazání plánovače musí být specifikováno číslo záznamu.',
  'ERR_CRON_SYNTAX' => 'Špatná Cron syntax',
  'NTC_DELETE_CONFIRMATION' => 'Opravdu chcete smazat tento záznam?',
  'NTC_STATUS' => 'Pro vymazání musíte nastavit Neaktivní z výběrového listu.',
  'NTC_LIST_ORDER' => 'Set the order this Schedule will appear in the Scheduler dropdown lists',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Nastavení Windows scheduleru',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Nastavení Crontabu',
  'LBL_CRON_LINUX_DESC' => 'Přidejte tuto řádku do Vašeho crontabu:',
  'LBL_CRON_WINDOWS_DESC' => 'Vytvořte dávkový soubor s následujícími příkazy:',
  'LBL_NO_PHP_CLI' => 'Pokud váš počítač nemá PHP binárku, můžete použít wget nebo curl ke spuštění vašich akcí.<br />for wget:<b> *    *    *    *    *    wget --quiet --non-verbose /cron.php > /dev/null 2>&1</b><br />for curl:<b> *    *    *    *    *    curl --silent /cron.php > /dev/null 2>&1</b>',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Log akcí',
  'LBL_EXECUTE_TIME' => 'Čas spuštění',
  'LBL_REFRESHJOBS' => 'Obnovit práce',
  'LBL_POLLMONITOREDINBOXES' => 'Zkontrolovat Inbound Mail Accounts',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Spustit noční Mass Email Campaigns',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Spustit noční zpracování Vrácených Kampaňových Emailů',
  'LBL_PRUNEDATABASE' => 'Omezit databáze od prvního v měsíce',
  'LBL_TRIMTRACKER' => 'Omezit trekovací tabulky',
  'LBL_PROCESSWORKFLOW' => 'Procesni úkoly ve Workflow',
);


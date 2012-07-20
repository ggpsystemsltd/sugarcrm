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
  'LBL_OOTB_TRACKER' => 'Oczyść tabele tropiciela',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Proszę określić odpowiednio czas realizacji.',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Wykonaj nocną wysyłkę odbitej poczty kampanii',
  'LBL_PRUNEDATABASE' => 'Oczyść bazę danych 1-go dnia miesiąca',
  'LBL_TRIMTRACKER' => 'Oczyść tabele tropiciela',
  'LBL_LIST_STATUS' => 'Status:',
  'LBL_STATUS' => 'Status',
  'LBL_OOTB_WORKFLOW' => 'Przeprowadź prace do wykonania',
  'LBL_OOTB_REPORTS' => 'wykonaj raport z wykonania zaplanowanych zadań',
  'LBL_OOTB_IE' => 'Sprawdź skrzynki poczty przychodzącej',
  'LBL_OOTB_BOUNCE' => 'Wykonaj nocną wysyłkę odbitej poczty kampanii',
  'LBL_OOTB_CAMPAIGN' => 'Wykonaj nocną masową wysyłkę poczty kampanii',
  'LBL_OOTB_PRUNE' => 'Oczyść bazę danych 1-go dnia miesiąca',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Uaktualnij tabele sesji śledzenia',
  'LBL_LIST_JOB_INTERVAL' => 'Interwał:',
  'LBL_LIST_LIST_ORDER' => 'Harmonogramy:',
  'LBL_LIST_NAME' => 'Harmonogram:',
  'LBL_LIST_RANGE' => 'Zakres:',
  'LBL_LIST_REMOVE' => 'Usuń:',
  'LBL_LIST_TITLE' => 'Lista harmonogramów:',
  'LBL_LIST_EXECUTE_TIME' => 'Rozpocznie się o:',
  'LBL_SUN' => 'Niedziela',
  'LBL_MON' => 'Poniedziałek',
  'LBL_TUE' => 'Wtorek',
  'LBL_WED' => 'Środa',
  'LBL_THU' => 'Czwartek',
  'LBL_FRI' => 'Piątek',
  'LBL_SAT' => 'Sobota',
  'LBL_ALL' => 'Każdego dnia',
  'LBL_EVERY_DAY' => 'Każdego dnia',
  'LBL_AT_THE' => 'O',
  'LBL_EVERY' => 'Każdego',
  'LBL_FROM' => 'Od',
  'LBL_ON_THE' => 'Co',
  'LBL_RANGE' => 'do',
  'LBL_AT' => 'o',
  'LBL_IN' => 'w',
  'LBL_AND' => 'i',
  'LBL_MINUTES' => 'minut',
  'LBL_HOUR' => 'godzin',
  'LBL_HOUR_SING' => 'godzina',
  'LBL_MONTH' => 'miesiąc',
  'LBL_OFTEN' => 'Tak często, jak tylko możliwe.',
  'LBL_MIN_MARK' => 'minut',
  'LBL_MINS' => 'minuty',
  'LBL_HOURS' => 'godziny',
  'LBL_DAY_OF_MONTH' => 'dzień miesiąca',
  'LBL_MONTHS' => 'miesiąc',
  'LBL_DAY_OF_WEEK' => 'dzień tygodnia',
  'LBL_CRONTAB_EXAMPLES' => 'Powyżej użyto notacji crontaba.',
  'LBL_ALWAYS' => 'Zawsze',
  'LBL_CATCH_UP' => 'Przeprowadź, jeżeli przegapiono',
  'LBL_CATCH_UP_WARNING' => 'Odznacz, jeżeli to działanie ma potrwać dłuzej.',
  'LBL_DATE_TIME_END' => 'Data i czas zakończenia',
  'LBL_DATE_TIME_START' => 'Data i czas rozpoczęcia',
  'LBL_INTERVAL' => 'Interwał',
  'LBL_JOB' => 'Praca',
  'LBL_LAST_RUN' => 'Ostanie wykonanie',
  'LBL_MODULE_NAME' => 'Harmonogram aplikacji',
  'LBL_MODULE_TITLE' => 'Harmonogram',
  'LBL_NAME' => 'Nazwa pracy',
  'LBL_NEVER' => 'Nigdy',
  'LBL_NEW_FORM_TITLE' => 'Nowy harmonogram',
  'LBL_PERENNIAL' => 'bez przerwy',
  'LBL_SEARCH_FORM_TITLE' => 'Szukanie harmonogramu',
  'LBL_SCHEDULER' => 'Harmonogram:',
  'LBL_TIME_FROM' => 'Aktywny od',
  'LBL_TIME_TO' => 'Aktywny do',
  'LBL_WARN_CURL_TITLE' => 'Ostrzeżenie cURL:',
  'LBL_WARN_CURL' => 'Ostrzeżenie:',
  'LBL_WARN_NO_CURL' => 'Ten system nie posiada bibliotek cURL włączonych lub wkompilowanych w moduł PHP (--with-curl=/path/to/curl_library).  Skontaktuj się z Administratorem, aby rozwiązać ten problem.  Bez cURL nie można przeprowadzić harmonogramu.',
  'LBL_BASIC_OPTIONS' => 'Podstawowe ustawienia',
  'LBL_ADV_OPTIONS' => 'Opcje zaawansowane',
  'LBL_TOGGLE_ADV' => 'Opcje zaawansowane',
  'LBL_TOGGLE_BASIC' => 'Podstawowe ustawienia',
  'LNK_LIST_SCHEDULER' => 'Harmonogramy',
  'LNK_NEW_SCHEDULER' => 'Utwórz harmonogram',
  'LNK_LIST_SCHEDULED' => 'Zaplanowane prace',
  'SOCK_GREETING' => 'To jest interfejs dla serwisu harmonogramów SugarCRM. <br />[ Dostępne komendy demona: start|restart|shutdown|status ]<br />Aby wyjść, wpisz &#39;quit&#39;.  Aby wyłączyc serwis, wpisz &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Musi być podany numer rekordu, aby usunąć ten harmonogram.',
  'ERR_CRON_SYNTAX' => 'Niewłaściwa składnia Crona',
  'NTC_DELETE_CONFIRMATION' => 'Czy na pewno chcesz usunąć ten rekord?',
  'NTC_STATUS' => 'Ustaw status na Nieaktywny, aby usunąć ten harmonogram z listy rozwijalnej harmonogramów',
  'NTC_LIST_ORDER' => 'Kolejność wykonywania tego Harmonogramu pojawi się na liście rozwijalnej',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Aby ustawić Harmonogram Windows',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Aby ustawić Crontab',
  'LBL_CRON_LINUX_DESC' => 'Dodaj tę listę do crontaba:',
  'LBL_CRON_WINDOWS_DESC' => 'Utwórz plik wsadowy zawierający te linię:',
  'LBL_NO_PHP_CLI' => 'Jeżeli twój komputer nie ma dostępu do binariów PHP, możesz użyć wget albo curl aby załadować twoje Prace.<br>Dla wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Aktwyne prace',
  'LBL_EXECUTE_TIME' => 'Czas wykonania',
  'LBL_REFRESHJOBS' => 'Odśwież prace',
  'LBL_POLLMONITOREDINBOXES' => 'Sprawdź konta poczty przychodzącej',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Wykonaj nocną masową kampanię e-mail',
  'LBL_PROCESSWORKFLOW' => 'Przeprowadź zadania Workflow',
  'LBL_PROCESSQUEUE' => 'Wykonaj raport z wykonania zaplanowanych zadań',
  'LBL_UPDATETRACKERSESSIONS' => 'Aktualizuj tabele sesji tropiciela',
);


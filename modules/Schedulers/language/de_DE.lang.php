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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Die cron Spezifikationen laufen über die Server Zeitzone (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Bitte die Zeitplaner Ausführungszeit definieren.',
  'LBL_LIST_STATUS' => 'Status:',
  'LBL_IN' => 'in',
  'LBL_MINS' => 'min',
  'LBL_JOB' => 'Job',
  'LBL_NAME' => 'Job Name',
  'LBL_STATUS' => 'Status',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Run Nightly Mass Email Campaigns',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Run Nightly Process Bounced Campaign Emails',
  'LBL_PRUNEDATABASE' => 'Prune Database on 1st of Month',
  'LBL_TRIMTRACKER' => 'Prune Tracker Tables',
  'LBL_PROCESSWORKFLOW' => 'Process Workflow Tasks',
  'LBL_PROCESSQUEUE' => 'Run Report Generation Scheduled Tasks',
  'LBL_UPDATETRACKERSESSIONS' => 'Update Tracker Session Tables',
  'LBL_OOTB_WORKFLOW' => 'Workflow Aufgaben verarbeiten',
  'LBL_OOTB_REPORTS' => 'Berichte Aufgaben verarbeiten',
  'LBL_OOTB_IE' => 'Eingehende Mailkonten überprüfen',
  'LBL_OOTB_BOUNCE' => 'Unzustellbare Kampagnen E-Mails verarbeiten (Nacht)',
  'LBL_OOTB_CAMPAIGN' => 'Kampagnen-Massenmails versenden (Nacht)',
  'LBL_OOTB_PRUNE' => 'Datenbank am 1. des Monats säubern',
  'LBL_OOTB_TRACKER' => 'Userhistorie am 1. des Monats säubern',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Update tracker_sessions Tabelle',
  'LBL_LIST_JOB_INTERVAL' => 'Intervall:',
  'LBL_LIST_LIST_ORDER' => 'Geplante Aufgaben:',
  'LBL_LIST_NAME' => 'Geplante Aufgabe:',
  'LBL_LIST_RANGE' => 'Bereich:',
  'LBL_LIST_REMOVE' => 'Entfernen:',
  'LBL_LIST_TITLE' => 'Aufgaben Liste:',
  'LBL_LIST_EXECUTE_TIME' => 'Wird gestartet am:',
  'LBL_SUN' => 'Sonntag',
  'LBL_MON' => 'Montag',
  'LBL_TUE' => 'Dienstag',
  'LBL_WED' => 'Mittwoch',
  'LBL_THU' => 'Donnerstag',
  'LBL_FRI' => 'Freitag',
  'LBL_SAT' => 'Samstag',
  'LBL_ALL' => 'Jeden Tag',
  'LBL_EVERY_DAY' => 'Jeden Tag',
  'LBL_AT_THE' => 'Am',
  'LBL_EVERY' => 'alle',
  'LBL_FROM' => 'Von',
  'LBL_ON_THE' => 'Um',
  'LBL_RANGE' => 'an',
  'LBL_AT' => 'um',
  'LBL_AND' => 'und',
  'LBL_MINUTES' => 'Minuten',
  'LBL_HOUR' => 'Stunden',
  'LBL_HOUR_SING' => 'Stunde',
  'LBL_MONTH' => 'Monat',
  'LBL_OFTEN' => 'So oft wie möglich.',
  'LBL_MIN_MARK' => 'Minuten nach',
  'LBL_HOURS' => 'h',
  'LBL_DAY_OF_MONTH' => 'Datum',
  'LBL_MONTHS' => 'Monat',
  'LBL_DAY_OF_WEEK' => 'Tag',
  'LBL_CRONTAB_EXAMPLES' => 'Das oben stehende verwendet standard Crontab Notation.',
  'LBL_ALWAYS' => 'Immer',
  'LBL_CATCH_UP' => 'Ausführen wenn versäumt',
  'LBL_CATCH_UP_WARNING' => 'Deaktivieren, wenn der Lauf dieses Jobs mehr als einen Moment dauert.',
  'LBL_DATE_TIME_END' => 'Enddatum &  Zeit',
  'LBL_DATE_TIME_START' => 'Startdatum & Zeit',
  'LBL_INTERVAL' => 'Intervall',
  'LBL_LAST_RUN' => 'Letzte erfolgreiche Durchführung',
  'LBL_MODULE_NAME' => 'Schedulers',
  'LBL_MODULE_TITLE' => 'Geplante Aufgaben',
  'LBL_NEVER' => 'Nie',
  'LBL_NEW_FORM_TITLE' => 'Neuer Termin',
  'LBL_PERENNIAL' => 'andauernd',
  'LBL_SEARCH_FORM_TITLE' => 'Geplante Aufgabe Suche',
  'LBL_SCHEDULER' => 'Geplante Aufgabe:',
  'LBL_TIME_FROM' => 'Aktiv von',
  'LBL_TIME_TO' => 'Aktiv bis',
  'LBL_WARN_CURL_TITLE' => 'cURL Warnung:',
  'LBL_WARN_CURL' => 'Warnung:',
  'LBL_WARN_NO_CURL' => 'In diesem System sind die cURL Bibliotheken im PHP Modul nicht aktiviert (--with-curl=/pfad/zu/curl_library). Bitte kontaktieren Sie den Administrator zur Lösung dieses Problems. Ohne diese Funktionalität kann der Zeitplaner die Jobs nicht einreihen.',
  'LBL_BASIC_OPTIONS' => 'Basis Setup',
  'LBL_ADV_OPTIONS' => 'Erw. Optionen',
  'LBL_TOGGLE_ADV' => 'Erw. Optionen',
  'LBL_TOGGLE_BASIC' => 'Basisoptionen',
  'LNK_LIST_SCHEDULER' => 'Geplante Aufgaben',
  'LNK_NEW_SCHEDULER' => 'Neue Aufgabe',
  'LNK_LIST_SCHEDULED' => 'Geplante Jobs',
  'SOCK_GREETING' => 'Dies ist die Oberfläche für die Services des Sugar Zeitplaners. <br />[ Verfügbare daemon Kommandos: start|restart|shutdown|status ]<br />Um zu verlassen, tippen Sie  &#39;quit&#39;. Um das Service herunterzufahren &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Zum Löschen des Plans muss eine Datensatznummer angegeben werden.',
  'ERR_CRON_SYNTAX' => 'Ungültige Cron Syntax',
  'NTC_DELETE_CONFIRMATION' => 'Sind Sie sicher, dass Sie diesen Eintrag löschen wollen?',
  'NTC_STATUS' => 'Zum Entfernen dieses Plans von der Terminplaner Auswahlliste setzen Sie den Status auf inaktiv',
  'NTC_LIST_ORDER' => 'Setzen Sie die Reihenfolge, in der dieser Plan in der Terminplaner Auswahlliste erscheinen soll.',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Konfiguration des Windows Terminplaners',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Konfiguration eines crontab Eintrages',
  'LBL_CRON_LINUX_DESC' => 'Fügen Sie diese Zeile Ihrem Crontab hinzu:',
  'LBL_CRON_WINDOWS_DESC' => 'Erstellen Sie eine Batch-Datei mt den folgenden Befehlen:',
  'LBL_NO_PHP_CLI' => 'Wenn Ihr Host keine PHP-Binary zur Verfügung stellt, können Sie Ihre Jobs mittels wget oder curl starten:<br>for wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Aktive Jobs',
  'LBL_EXECUTE_TIME' => 'Ausführungszeit',
  'LBL_REFRESHJOBS' => 'Aktualisiere Jobs',
  'LBL_POLLMONITOREDINBOXES' => 'Checke einlaufende Mail Accounts',
);


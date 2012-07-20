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
  'LBL_EDITLAYOUT' => 'Layout bearbeiten',
  'LBL_NEW_TIME_FORMAT' => '(24:00)',
  'LBL_STATUS' => 'Status:',
  'LBL_COLON' => ':',
  'LBL_NAME' => 'Name:',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Aufgaben',
  'LBL_TASK' => 'Aufgaben:',
  'LBL_MODULE_TITLE' => 'Aufgaben: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Aufgaben Suche',
  'LBL_LIST_FORM_TITLE' => 'Aufgaben Liste',
  'LBL_NEW_FORM_TITLE' => 'Neue Aufgabe',
  'LBL_NEW_FORM_SUBJECT' => 'Betreff:',
  'LBL_NEW_FORM_DUE_DATE' => 'Fällig am:',
  'LBL_NEW_FORM_DUE_TIME' => 'Fällig um:',
  'LBL_LIST_CLOSE' => 'Schließen',
  'LBL_LIST_SUBJECT' => 'Betreff',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_PRIORITY' => 'Priorität',
  'LBL_LIST_RELATED_TO' => 'Gehört zu',
  'LBL_LIST_DUE_DATE' => 'Fällig am',
  'LBL_LIST_DUE_TIME' => 'Fällig um:',
  'LBL_SUBJECT' => 'Betreff:',
  'LBL_DUE_DATE' => 'Fällig am:',
  'LBL_DUE_TIME' => 'Fällig um:',
  'LBL_PRIORITY' => 'Priorität:',
  'LBL_DUE_DATE_AND_TIME' => 'Erledigen bis:',
  'LBL_START_DATE_AND_TIME' => 'Startdatum und -zeit:',
  'LBL_START_DATE' => 'Startdatum:',
  'LBL_LIST_START_DATE' => 'Startdatum',
  'LBL_START_TIME' => 'Beginn:',
  'LBL_LIST_START_TIME' => 'Startzeit',
  'DATE_FORMAT' => '(jjjj-mm-tt)',
  'LBL_NONE' => 'Kein(e)',
  'LBL_CONTACT' => 'Kontakt:',
  'LBL_EMAIL_ADDRESS' => 'E-Mail Adresse:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_EMAIL' => 'E-Mail:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschreibungsinformation',
  'LBL_DESCRIPTION' => 'Beschreibung:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_LIST_COMPLETE' => 'Abgeschlossen:',
  'LBL_DATE_DUE_FLAG' => 'Kein Fälligkeitsdatum',
  'LBL_DATE_START_FLAG' => 'Kein Startdatum',
  'ERR_DELETE_RECORD' => 'Die Nummer eines Eintrages muss angegeben werden um einen Kontakt zu löschen!',
  'ERR_INVALID_HOUR' => 'Bitte geben Sie eine Stunde zwischen 0 Uhr und 24 Uhr ein',
  'LBL_DEFAULT_PRIORITY' => 'Mittel',
  'LBL_LIST_MY_TASKS' => 'Meine offenen Aufgaben',
  'LNK_NEW_TASK' => 'Neue Aufgabe',
  'LNK_TASK_LIST' => 'Aufgaben',
  'LNK_IMPORT_TASKS' => 'Aufgaben importieren',
  'LBL_CONTACT_FIRST_NAME' => 'Kontakt Vorname',
  'LBL_CONTACT_LAST_NAME' => 'Kontakt Nachname',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zugew. Benutzer',
  'LBL_ASSIGNED_TO_NAME' => 'Zugewiesen an:',
  'LBL_LIST_DATE_MODIFIED' => 'Geändert am',
  'LBL_CONTACT_ID' => 'Kontakt ID:',
  'LBL_PARENT_ID' => 'Eltern ID:',
  'LBL_CONTACT_PHONE' => 'Telefon Kontaktperson:',
  'LBL_PARENT_NAME' => 'Eltern-Typ:',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivitäten Reports',
  'LBL_TASK_INFORMATION' => 'Überblick Aufgaben',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notizen',
  'LBL_DATE_DUE' => 'Fällig am:',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Zugewiesen Benutzer',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Zugewiesen an',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Bearbeiter:',
  'LBL_EXPORT_CREATED_BY' => 'Ersteller',
  'LBL_EXPORT_PARENT_TYPE' => 'Verknüpft mit Modul',
  'LBL_EXPORT_PARENT_ID' => 'Eltern ID:',
);


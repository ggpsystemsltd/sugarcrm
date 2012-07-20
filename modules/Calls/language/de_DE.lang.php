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
  'LBL_ACCEPT_STATUS' => 'Status annehmen',
  'LBL_ACCEPT_LINK' => 'Link annehmen',
  'LBL_STATUS' => 'Status:',
  'LBL_COLON' => ':',
  'LBL_NAME' => 'Name',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_BLANK' => '-leer-',
  'LBL_MODULE_NAME' => 'Anrufe',
  'LBL_MODULE_TITLE' => 'Anrufe: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Anrufe Suche',
  'LBL_LIST_FORM_TITLE' => 'Anrufliste',
  'LBL_NEW_FORM_TITLE' => 'Neuer Termin',
  'LBL_LIST_CLOSE' => 'Schließen',
  'LBL_LIST_SUBJECT' => 'Betreff',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Gehört zu',
  'LBL_LIST_RELATED_TO_ID' => 'Verknüpft mit ID',
  'LBL_LIST_DATE' => 'Startdatum',
  'LBL_LIST_TIME' => 'Startzeit',
  'LBL_LIST_DURATION' => 'Dauer',
  'LBL_LIST_DIRECTION' => 'Richtung',
  'LBL_SUBJECT' => 'Betreff:',
  'LBL_REMINDER' => 'Erinnerung:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschreibungsinformation',
  'LBL_DESCRIPTION' => 'Beschreibung:',
  'LBL_DIRECTION' => 'Richtung:',
  'LBL_DATE' => 'Startdatum:',
  'LBL_DURATION' => 'Dauer:',
  'LBL_DURATION_HOURS' => 'Stunden:',
  'LBL_DURATION_MINUTES' => 'Minuten:',
  'LBL_HOURS_MINUTES' => '(Stunden/Minuten)',
  'LBL_CALL' => 'Anruf:',
  'LBL_DATE_TIME' => 'Startdatum und -zeit:',
  'LBL_TIME' => 'Beginn:',
  'LBL_HOURS_ABBREV' => 'St.',
  'LBL_MINSS_ABBREV' => 'min',
  'LNK_NEW_CALL' => 'Neuer Anruf',
  'LNK_NEW_MEETING' => 'Neues Meeting',
  'LNK_CALL_LIST' => 'Anrufe',
  'LNK_IMPORT_CALLS' => 'Anrufe importieren',
  'ERR_DELETE_RECORD' => 'Um diese Firma zu löschen, muss eine Datensatznummer angegeben werden.',
  'NTC_REMOVE_INVITEE' => 'Möchten Sie diesen Teilnehmer wirklich aus diesem Anruf löschen?',
  'LBL_INVITEE' => 'Teilnehmer',
  'LBL_RELATED_TO' => 'Bezieht sich auf:',
  'LNK_NEW_APPOINTMENT' => 'Neuer Termin',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planung',
  'LBL_ADD_INVITEE' => 'Teilnehmer hinzufügen',
  'LBL_FIRST_NAME' => 'Vorname',
  'LBL_LAST_NAME' => 'Nachname',
  'LBL_EMAIL' => 'E-Mail',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Einladungen senden [Alt-I]',
  'LBL_SEND_BUTTON_LABEL' => 'Einladungen senden',
  'LBL_DATE_END' => 'Enddatum',
  'LBL_TIME_END' => 'Endezeit',
  'LBL_REMINDER_TIME' => 'Erinnerungs Zeitpunkt',
  'LBL_SEARCH_BUTTON' => 'Suchen',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivitäten Reports',
  'LBL_ADD_BUTTON' => 'Hinzufügen',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Anrufe',
  'LBL_LOG_CALL' => 'Anruf aufzeichnen',
  'LNK_SELECT_ACCOUNT' => 'Firma auswählen',
  'LNK_NEW_ACCOUNT' => 'Neue Firma',
  'LNK_NEW_OPPORTUNITY' => 'Neue Verkaufschance',
  'LBL_DEL' => 'Löschen',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Interessenten',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakte',
  'LBL_USERS_SUBPANEL_TITLE' => 'Benutzer',
  'LBL_MEMBER_OF' => 'Mitglied von',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notizen',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zugewiesen an',
  'LBL_LIST_MY_CALLS' => 'Meine Anrufe',
  'LBL_SELECT_FROM_DROPDOWN' => 'Bitte wählen Sie zuerst einen Eintrag aus der &#39;Zugewiesen an&#39; Auswahlliste.',
  'LBL_ASSIGNED_TO_NAME' => 'Zugewiesen an',
  'LBL_ASSIGNED_TO_ID' => 'Zugew. Benutzer',
  'NOTICE_DURATION_TIME' => 'Zeitdauer muss größer als 0 sein',
  'LBL_CALL_INFORMATION' => 'Übersicht Anrufe',
  'LBL_REMOVE' => 'Entfernen',
  'LBL_PARENT_ID' => 'Eltern ID:',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Bearbeiter:',
  'LBL_EXPORT_CREATED_BY' => 'Ersteller',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Zugewiesen an',
  'LBL_EXPORT_DATE_START' => 'Startdatum und -zeit',
  'LBL_EXPORT_PARENT_TYPE' => 'Verknüpft mit Modul',
  'LBL_EXPORT_REMINDER_TIME' => 'Erinnerungszeit (in Minuten)',
);


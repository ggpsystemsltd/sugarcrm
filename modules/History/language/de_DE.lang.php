<?php

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

















if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

 


$mod_strings = array (
  'LBL_MODULE_NAME' => 'Verlauf',
  'LBL_MODULE_TITLE' => 'Verlauf: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Verlauf Suche',
  'LBL_LIST_FORM_TITLE' => 'Verlauf',
  'LBL_LIST_SUBJECT' => 'Betreff',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Gehört zu',
  'LBL_LIST_DATE' => 'Datum',
  'LBL_LIST_TIME' => 'Startzeit',
  'LBL_LIST_CLOSE' => 'Schließen',
  'LBL_SUBJECT' => 'Betreff:',
  'LBL_STATUS' => 'Status:',
  'LBL_LOCATION' => 'Ort:',
  'LBL_DATE_TIME' => 'Startdatum und -zeit:',
  'LBL_DATE' => 'Startdatum:',
  'LBL_TIME' => 'Beginn:',
  'LBL_DURATION' => 'Dauer:',
  'LBL_HOURS_MINS' => '(Stunden/Minuten)',
  'LBL_CONTACT_NAME' => 'Name:',
  'LBL_MEETING' => 'Meeting:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschreibungsinformation',
  'LBL_DESCRIPTION' => 'Beschreibung:',
  'LBL_COLON' => ':',
  'LBL_DEFAULT_STATUS' => 'Geplant',
  'LNK_NEW_CALL' => 'Neuer Anruf',
  'LNK_NEW_MEETING' => 'Neues Meeting',
  'LNK_NEW_TASK' => 'Neue Aufgabe',
  'LNK_NEW_NOTE' => 'Neue Notiz oder Anlage',
  'LNK_NEW_EMAIL' => 'E-Mail archivieren',
  'LNK_CALL_LIST' => 'Anrufe',
  'LNK_MEETING_LIST' => 'Meetings',
  'LNK_TASK_LIST' => 'Aufgaben',
  'LNK_NOTE_LIST' => 'Notizen',
  'LNK_EMAIL_LIST' => 'E-Mails',
  'ERR_DELETE_RECORD' => 'Um diese Firma zu löschen, muss eine Datensatznummer angegeben werden.',
  'NTC_REMOVE_INVITEE' => 'Möchten Sie diesen Teilnehmer wirklich aus diesem Meeting entfernen?',
  'LBL_INVITEE' => 'Teilnehmer',
  'LBL_LIST_DIRECTION' => 'Richtung',
  'LBL_DIRECTION' => 'Richtung',
  'LNK_NEW_APPOINTMENT' => 'Neues Meeting',
  'LNK_VIEW_CALENDAR' => 'Heute',
  'LBL_OPEN_ACTIVITIES' => 'Offene Aktivitäten',
  'LBL_HISTORY' => 'Verlauf',
  'LBL_UPCOMING' => 'Meine nächsten Termine',
  'LBL_TODAY' => 'bis',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Neue Aufgabe [Alt+N]',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Neue Aufgabe',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Neues Meeting [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Neues Meeting',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Neuer Anruf [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Neuer Anruf',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Neue Notiz oder Anlage [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Neue Notiz oder Anlage',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'E-Mail archivieren [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'E-Mail archivieren',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LIST_DUE_DATE' => 'Fällig am',
  'LBL_LIST_LAST_MODIFIED' => 'Geändert am:',
  'NTC_NONE_SCHEDULED' => 'Keine Termine.',
  'appointment_filter_dom' => array(
  	 'today' => 'Heute'
  	,'tomorrow' => 'Morgen'
  	,'this Saturday' => 'Diese Woche'
  	,'next Saturday' => 'Nächste Woche'
  	,'last this_month' => 'Dieser Monat'
  	,'last next_month' => 'Nächster Monat'
  ),
  'LNK_IMPORT_NOTES'=>'Notizen importieren',
  'NTC_NONE'=>'Kein(e)',
	'LBL_ACCEPT_THIS'=>'Bestätigen?',
	'LBL_DEFAULT_SUBPANEL_TITLE' => 'Verlauf',
);

?>

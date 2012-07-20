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
  'LBL_UP' => 'nach oben',
  'LBL_DOWN' => 'nach unten',
  'LBL_EDITLAYOUT' => 'Layout bearbeiten',
  'LBL_MODULE_ID' => 'WorkFlow',
  'LBL_MODULE_TITLE' => 'Workflow: Home',
  'LBL_LIST_NAME' => 'Name',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_NAME' => 'Name:',
  'LBL_STATUS' => 'Status:',
  'LBL_EDIT_ALT_TEXT' => 'Alt Text',
  'LBL_LIST_UP' => 'up',
  'LBL_LIST_DN' => 'dn',
  'LBL_ALERT_SUBJECT' => 'WORKFLOW ALERT',
  'LBL_MODULE_NAME' => 'Workflow Definitionen:',
  'LBL_SEARCH_FORM_TITLE' => 'Workflow Suche',
  'LBL_LIST_FORM_TITLE' => 'Workflow Liste',
  'LBL_NEW_FORM_TITLE' => 'Workflow Definition erstellen',
  'LBL_LIST_TYPE' => 'Durchführung findet statt:',
  'LBL_LIST_BASE_MODULE' => 'Ziel Modul:',
  'LBL_DESCRIPTION' => 'Beschreibung:',
  'LBL_TYPE' => 'Durchführung findet statt:',
  'LBL_BASE_MODULE' => 'Ziel Modul:',
  'LBL_LIST_ORDER' => 'Auftrag verarbeiten:',
  'LBL_FROM_NAME' => 'Von Name:',
  'LBL_FROM_ADDRESS' => 'Von Adresse:',
  'LNK_NEW_WORKFLOW' => 'Workflow Definition erstellen',
  'LNK_WORKFLOW' => 'Liste Workflow Definitionen',
  'LBL_ALERT_TEMPLATES' => 'Warnungsvorlagen',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Neue Warnungsvorlage',
  'LBL_SUBJECT' => 'Betreff:',
  'LBL_RECORD_TYPE' => 'Anwenden auf:',
  'LBL_RELATED_MODULE' => 'Verknüpftes Modul:',
  'LBL_PROCESS_LIST' => 'Workflow Reihenfolge',
  'LNK_ALERT_TEMPLATES' => 'Warnung E-Mail Vorlagen',
  'LNK_PROCESS_VIEW' => 'Workflow Reihenfolge',
  'LBL_PROCESS_SELECT' => 'Wählen Sie ein Modul aus:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Bemerkung: Sie müssen einen Trigger erstellen damit dieses Workflow Objekt funktioniert',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Bemerkung: Um Warnungen zu senden müssen Benachrichtigungen in Admin &gt; Email Einstellungen auf ja gesetzt sein.',
  'LBL_FIRE_ORDER' => 'Auftrag verarbeiten:',
  'LBL_RECIPIENTS' => 'Empfänger',
  'LBL_INVITEES' => 'Teilnehmer',
  'LBL_INVITEE_NOTICE' => 'Achtung, Sie müssen zumindest einen Teilnehmer auswählen um das zu erstellen.',
  'NTC_REMOVE_ALERT' => 'Sind Sie sicher, dass Sie diesen Trigger entfernen wollen?',
  'LBL_INSERT' => 'Einfügen',
  'LBL_SELECT_OPTION' => 'Bitte wählen Sie eine Option.',
  'LBL_SELECT_VALUE' => 'Sie müssen einen Wert auswählen.',
  'LBL_SELECT_MODULE' => 'Wählen Sie ein verknüpftes Modul aus.',
  'LBL_SELECT_FILTER' => 'Sie müssen ein Feld auswählen, mit dem Sie das verknüpfte Modul filtern.',
  'LBL_SET' => 'Setze',
  'LBL_AS' => 'als',
  'LBL_SHOW' => 'Zeigen',
  'LBL_HIDE' => 'Ausblenden',
  'LBL_SPECIFIC_FIELD' => 'spezielles Feld',
  'LBL_ANY_FIELD' => 'irgendein Feld',
  'LBL_LINK_RECORD' => 'Verknüpfung zu Eintrag',
  'LBL_INVITE_LINK' => 'Meeting/Anruf Einladungslink',
  'LBL_PLEASE_SELECT' => 'Bitte auswählen',
  'LBL_BODY' => 'Text:',
  'LBL__S' => '&#039;s',
  'LBL_ACTION_ERROR' => 'Die Aktion kann nicht durchgeführt werden. Editieren Sie die Aktion und überprüfen Sie alle Felder und Feldwerte.',
  'LBL_ACTION_ERRORS' => 'Notiz: Ein oder mehrere Aktionen sind fehlerhaft',
  'LBL_ALERT_ERROR' => 'Diese Meldung kann nicht durchgeführt werden. Editieren Sie die Meldung und überprüfen Sie die Einstellungen.',
  'LBL_ALERT_ERRORS' => 'Notiz: Ein oder mehrere Meldungen enthalten Fehler.',
  'LBL_TRIGGER_ERROR' => 'Notiz: Dieser Auslöser beinhaltet ungültige Werte und wird nicht ausgelöst',
  'LBL_TRIGGER_ERRORS' => 'Notiz: Ein oder mehrere Auslöser enthalten Fehler.',
);


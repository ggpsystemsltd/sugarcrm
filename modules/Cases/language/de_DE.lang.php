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
  'LBL_TEAM_NAME_MOD' => 'Team Name Mod',
  'LBL_ACCOUNT_NAME_OWNER' => 'Firmenname Zugewiesener',
  'LBL_STATUS' => 'Status:',
  'LBL_SYSTEM_ID' => 'System ID',
  'LBL_LIST_NUMBER' => 'Num.',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_TEAM_COUNT_OWNER' => 'Team Count Owner',
  'LBL_TEAM_COUNT_MOD' => 'Team Count Mod',
  'LBL_TEAM_NAME_OWNER' => 'Team Name Owner',
  'ERR_DELETE_RECORD' => 'Zum Löschen der Firma muss eine Datensatznummer angegeben werden.',
  'LBL_ACCOUNT_ID' => 'Firma ID',
  'LBL_ACCOUNT_NAME' => 'Firmenname:',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Firmen',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivitäten',
  'LBL_ATTACH_NOTE' => 'Notiz anhängen',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Fehler',
  'LBL_CASE_NUMBER' => 'Ticketnummer:',
  'LBL_CASE_SUBJECT' => 'Betreff:',
  'LBL_CASE' => 'Ticket:',
  'LBL_CONTACT_CASE_TITLE' => 'Kontakt:',
  'LBL_CONTACT_NAME' => 'Name:',
  'LBL_CONTACT_ROLE' => 'Beruf:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakte',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Tickets',
  'LBL_DESCRIPTION' => 'Beschreibung:',
  'LBL_FILENANE_ATTACHMENT' => 'Dateianhang',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Verlauf',
  'LBL_INVITEE' => 'Kontakte',
  'LBL_MEMBER_OF' => 'Firma',
  'LBL_MODULE_NAME' => 'Tickets',
  'LBL_MODULE_TITLE' => 'Tickets: Home',
  'LBL_NEW_FORM_TITLE' => 'Neues Ticket',
  'LBL_NUMBER' => 'Nummer:',
  'LBL_PRIORITY' => 'Priorität:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekte',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumente',
  'LBL_RESOLUTION' => 'Lösung:',
  'LBL_SEARCH_FORM_TITLE' => 'Tickets Suche',
  'LBL_SUBJECT' => 'Betreff:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zugew. Benutzer',
  'LBL_LIST_ACCOUNT_NAME' => 'Firmenname',
  'LBL_LIST_ASSIGNED' => 'Zugewiesen an',
  'LBL_LIST_CLOSE' => 'Schließen',
  'LBL_LIST_FORM_TITLE' => 'Tickets Liste',
  'LBL_LIST_LAST_MODIFIED' => 'Geändert am:',
  'LBL_LIST_MY_CASES' => 'Meine offenen Tickets',
  'LBL_LIST_PRIORITY' => 'Priorität',
  'LBL_LIST_SUBJECT' => 'Betreff',
  'LNK_CASE_LIST' => 'Tickets',
  'LNK_NEW_CASE' => 'Neues Ticket',
  'NTC_REMOVE_FROM_BUG_CONFIRMATION' => 'Möchten Sie dieses Ticket wirklich entfernen?',
  'NTC_REMOVE_INVITEE' => 'Möchten Sie diesen Kontakt wirklich von diesem Ticket entfernen?',
  'LBL_LIST_DATE_CREATED' => 'Erstellt am:',
  'LBL_ASSIGNED_TO_NAME' => 'Zugewiesen an',
  'LBL_TYPE' => 'Typ:',
  'LBL_WORK_LOG' => 'Arbeits Log',
  'LNK_IMPORT_CASES' => 'Tickets importieren',
  'LNK_CASE_REPORTS' => 'Case Reports',
  'LBL_SHOW_IN_PORTAL' => 'Im Portal anzeigen',
  'LBL_CREATE_KB_DOCUMENT' => 'Artikel erstellen',
  'LBL_CREATED_USER' => 'Erstellter Benutzer',
  'LBL_MODIFIED_USER' => 'Veränderter Benutzer',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projekte',
  'LBL_CASE_INFORMATION' => 'Überblick Tickets',
  'LBL_MODIFIED_BY_NAME_OWNER' => 'Geändert von',
  'LBL_MODIFIED_BY_NAME_MOD' => 'Geändert von',
  'LBL_CREATED_BY_NAME_OWNER' => 'Ersteller',
  'LBL_CREATED_BY_NAME_MOD' => 'Ersteller',
  'LBL_ASSIGNED_USER_NAME_OWNER' => 'Zugewiesen an',
  'LBL_ASSIGNED_USER_NAME_MOD' => 'Zugewiesen an',
  'LBL_ACCOUNT_NAME_MOD' => 'Firmenname Mod',
  'LBL_MODIFIED_USER_NAME' => 'Geändert von',
  'LBL_MODIFIED_USER_NAME_OWNER' => 'Geändert von',
  'LBL_MODIFIED_USER_NAME_MOD' => 'Geändert von',
  'LBL_PORTAL_VIEWABLE' => 'Im Portal sichtbar',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Zugewiesen an',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Bearbeiter:',
  'LBL_EXPORT_CREATED_BY' => 'Ersteller',
  'LBL_EXPORT_CREATED_BY_NAME' => 'Ersteller',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Zugewiesen an',
  'LBL_EXPORT_TEAM_COUNT' => 'Team Anzahl',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Verknüpfte Kontakt E-Mails',
);


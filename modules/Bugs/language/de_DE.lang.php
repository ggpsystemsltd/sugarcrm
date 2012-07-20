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
  'LBL_FOUND_IN_RELEASE_NAME' => 'in der folgende Release gefunden',
  'LBL_PORTAL_VIEWABLE' => 'Im Portal sichtbar',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Zugewiesen Benutzer',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Zugewiesen an',
  'LBL_EXPORT_FIXED_IN_RELEASE_NAMR' => 'In der folgender Release gefixt',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Bearbeiter',
  'LBL_EXPORT_CREATED_BY' => 'Ersteller',
  'LBL_STATUS' => 'Status:',
  'LBL_LIST_NUMBER' => 'Num.',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LIST_RELEASE' => 'Release',
  'LBL_RELEASE' => 'Release:',
  'LBL_SYSTEM_ID' => 'System ID',
  'LBL_MODULE_NAME' => 'Fehler',
  'LBL_MODULE_TITLE' => 'Fehlerverfolgung: Home',
  'LBL_MODULE_ID' => 'Fehler',
  'LBL_SEARCH_FORM_TITLE' => 'Fehler Suche',
  'LBL_LIST_FORM_TITLE' => 'Fehler Liste',
  'LBL_NEW_FORM_TITLE' => 'Neuer Fehler',
  'LBL_CONTACT_BUG_TITLE' => 'Kontakt-Fehler:',
  'LBL_SUBJECT' => 'Betreff:',
  'LBL_BUG' => 'Fehler:',
  'LBL_BUG_NUMBER' => 'Fehlernummer:',
  'LBL_NUMBER' => 'Nummer:',
  'LBL_PRIORITY' => 'Priorität:',
  'LBL_DESCRIPTION' => 'Beschreibung:',
  'LBL_CONTACT_NAME' => 'Name:',
  'LBL_BUG_SUBJECT' => 'Betreff:',
  'LBL_CONTACT_ROLE' => 'Beruf:',
  'LBL_LIST_SUBJECT' => 'Betreff',
  'LBL_LIST_PRIORITY' => 'Priorität',
  'LBL_LIST_RESOLUTION' => 'Lösung:',
  'LBL_LIST_LAST_MODIFIED' => 'Geändert am:',
  'LBL_INVITEE' => 'Kontakte',
  'LBL_TYPE' => 'Typ:',
  'LBL_LIST_TYPE' => 'Typ:',
  'LBL_RESOLUTION' => 'Lösung:',
  'LNK_NEW_BUG' => 'Neuer Fehler',
  'LNK_BUG_LIST' => 'Fehler',
  'NTC_REMOVE_INVITEE' => 'Möchten Sie diesen Kontakt wirklich aus dem Fehler entfernen?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Möchten Sie diesen Fehler wirklich aus dieser Firma entfernen?',
  'ERR_DELETE_RECORD' => 'Die Datensatznummer muss angegeben werden um diesen Datensatz löschen zu können.',
  'LBL_LIST_MY_BUGS' => 'Meine offenen Fehler',
  'LNK_IMPORT_BUGS' => 'Fehlermeldungen importieren',
  'LBL_FOUND_IN_RELEASE' => 'Gefunden in Release',
  'LBL_FIXED_IN_RELEASE' => 'Behoben in Release',
  'LBL_LIST_FIXED_IN_RELEASE' => 'Behoben in Release',
  'LBL_WORK_LOG' => 'Arbeitslog:',
  'LBL_SOURCE' => 'Quelle',
  'LBL_PRODUCT_CATEGORY' => 'Kategorie',
  'LBL_CREATED_BY' => 'Erstellt von:',
  'LBL_DATE_CREATED' => 'Erstelldatum:',
  'LBL_MODIFIED_BY' => 'Geändert von:',
  'LBL_DATE_LAST_MODIFIED' => 'Geändert am:',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-Mail Adresse',
  'LBL_LIST_CONTACT_NAME' => 'Kontakt:',
  'LBL_LIST_ACCOUNT_NAME' => 'Firmenname',
  'LBL_LIST_PHONE' => 'Telefon',
  'NTC_DELETE_CONFIRMATION' => 'Möchten Sie diesen Kontakt wirklich von diesem Fehler entfernen?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Fehlerverfolgung',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivitäten',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Verlauf',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakte',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Firmen',
  'LBL_CASES_SUBPANEL_TITLE' => 'Tickets',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekte',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumente',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zugew. Benutzer',
  'LBL_ASSIGNED_TO_NAME' => 'Zugewiesen an',
  'LNK_BUG_REPORTS' => 'Bug Reports',
  'LBL_SHOW_IN_PORTAL' => 'Im Portal anzeigen',
  'LBL_BUG_INFORMATION' => 'Übersicht Fehler',
);


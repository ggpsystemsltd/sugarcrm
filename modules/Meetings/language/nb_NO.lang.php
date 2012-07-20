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
  'LBL_TYPE' => 'Møtetype',
  'LBL_PASSWORD' => 'Møtepassord',
  'LBL_URL' => 'Start / bli med på Møte',
  'LBL_CREATOR' => 'Møte oppretter',
  'LBL_EXTERNALID' => 'Ekstern App ID',
  'LBL_LIST_JOIN_MEETING' => 'Bli med på Møte',
  'LBL_JOIN_EXT_MEETING' => 'Bli med på Møte',
  'LBL_HOST_EXT_MEETING' => 'Start Møte',
  'LBL_EXTNOT_HEADER' => 'Feil: ikke invitert',
  'LBL_EXTNOT_MAIN' => 'Du kan ikke delta på dette møtet fordi du ikke er invitert.',
  'LBL_EXTNOT_RECORD_LINK' => 'Se Møte',
  'LBL_EXTNOT_GO_BACK' => 'Gå tilbake til forrige post',
  'LBL_EXTNOSTART_HEADER' => 'Feil: Kan ikke starte Møte',
  'LBL_EXTNOSTART_MAIN' => 'Du kan ikke starte dette møtet fordi du ikke er administrator eller eier av møtet.',
  'LBL_COLON' => ':',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_STATUS' => 'Status:',
  'ERR_DELETE_RECORD' => 'Et registreringsnummer må oppgis for å kunne slette møtet.',
  'LBL_ACCEPT_THIS' => 'Godta?',
  'LBL_ADD_BUTTON' => 'Tilføy',
  'LBL_ADD_INVITEE' => 'Legg til deltagere',
  'LBL_CONTACT_NAME' => 'Kontakt',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_CREATED_BY' => 'Opprettet av:',
  'LBL_DATE_END' => 'Sluttdato',
  'LBL_DATE_TIME' => 'Startdato & klokkeslett:',
  'LBL_DATE' => 'Startdato:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Møter',
  'LBL_DEL' => 'Slett',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivelsesinformasjon',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DURATION_HOURS' => 'Varighet i timer:',
  'LBL_DURATION_MINUTES' => 'Varighet i minutter:',
  'LBL_DURATION' => 'Varighet:',
  'LBL_EMAIL' => 'E-post:',
  'LBL_FIRST_NAME' => 'Fornavn',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notater',
  'LBL_HOURS_ABBREV' => 't',
  'LBL_HOURS_MINS' => '(timer/minutter)',
  'LBL_INVITEE' => 'Deltagere',
  'LBL_LAST_NAME' => 'Etternavn',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tildelt bruker',
  'LBL_LIST_CLOSE' => 'Lukk',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_DATE_MODIFIED' => 'Endret',
  'LBL_LIST_DATE' => 'Startdato',
  'LBL_LIST_DIRECTION' => 'Retning',
  'LBL_LIST_DUE_DATE' => 'Tidsfrist',
  'LBL_LIST_FORM_TITLE' => 'Møteliste',
  'LBL_LIST_MY_MEETINGS' => 'Mine møter',
  'LBL_LIST_RELATED_TO' => 'Tilknyttet',
  'LBL_LIST_SUBJECT' => 'Emne',
  'LBL_LIST_TIME' => 'Starttid',
  'LBL_LOCATION' => 'Sted:',
  'LBL_MEETING' => 'Møte:',
  'LBL_MODIFIED_BY' => 'Endret av',
  'LBL_MODULE_NAME' => 'Møter',
  'LBL_MODULE_TITLE' => 'Møter: Hovedside',
  'LBL_NAME' => 'Navn',
  'LBL_NEW_FORM_TITLE' => 'Opprett avtale',
  'LBL_OUTLOOK_ID' => 'Outlook-ID',
  'LBL_PHONE' => 'Kontortelefon:',
  'LBL_REMINDER_TIME' => 'Påminnelsestid',
  'LBL_REMINDER' => 'Påminnelse:',
  'LBL_REMOVE' => 'fjern',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planlegging',
  'LBL_SEARCH_BUTTON' => 'Søk',
  'LBL_SEARCH_FORM_TITLE' => 'Søk møte',
  'LBL_SEND_BUTTON_LABEL' => 'Send invitasjoner',
  'LBL_SEND_BUTTON_TITLE' => 'Send invitasjoner [Alt+I]',
  'LBL_SUBJECT' => 'Emne:',
  'LBL_TIME' => 'Starttid:',
  'LBL_USERS_SUBPANEL_TITLE' => 'Brukere',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivitets Rapport',
  'LNK_MEETING_LIST' => 'Møter',
  'LNK_NEW_APPOINTMENT' => 'Opprett avtale',
  'LNK_NEW_MEETING' => 'Planlegg møte',
  'LNK_IMPORT_MEETINGS' => 'Importer møter',
  'NTC_REMOVE_INVITEE' => 'Er du sikker på at du vil fjerne den inviterte fra møtet?',
  'LBL_CREATED_USER' => 'Opprettet bruker',
  'LBL_MODIFIED_USER' => 'Endret bruker',
  'NOTICE_DURATION_TIME' => 'Varigheten må väre større enn 0',
  'LBL_MEETING_INFORMATION' => 'Møteoversikt',
);


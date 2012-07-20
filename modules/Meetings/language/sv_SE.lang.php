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
  'LBL_LIST_DIRECTION' => 'Riktning',
  'LBL_REMOVE' => 'ta bort',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivitetsrapport',
  'LNK_IMPORT_MEETINGS' => 'Importera möten',
  'LBL_CREATED_USER' => 'Skapad användare',
  'LBL_MODIFIED_USER' => 'Ändrad användare',
  'NOTICE_DURATION_TIME' => 'Varaktighetstiden måste vara större än 0',
  'LBL_MEETING_INFORMATION' => 'Mötes översikt',
  'LBL_COLON' => ':',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_STATUS' => 'Status:',
  'ERR_DELETE_RECORD' => 'Ett postnummer måste specificeras för att kunna radera mötet.',
  'LBL_ACCEPT_THIS' => 'Acceptera?',
  'LBL_ADD_BUTTON' => 'Lägg till',
  'LBL_ADD_INVITEE' => 'Lägg till inbjudna',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_CREATED_BY' => 'Skapad av',
  'LBL_DATE_END' => 'Slutdatum',
  'LBL_DATE_TIME' => 'Startdatum & tid',
  'LBL_DATE' => 'Startdatum:',
  'LBL_DEFAULT_STATUS' => 'Planerat',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Möten',
  'LBL_DEL' => 'Radera',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivande information',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_DURATION_HOURS' => 'Varaktighet timmar:',
  'LBL_DURATION_MINUTES' => 'Varaktighet minuter:',
  'LBL_DURATION' => 'Varaktighet:',
  'LBL_EMAIL' => 'Epost',
  'LBL_FIRST_NAME' => 'Förnamn',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Anteckningar',
  'LBL_HOURS_MINS' => '(timmar/minuter)',
  'LBL_INVITEE' => 'Inbjudna',
  'LBL_LAST_NAME' => 'Efternamn',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tilldelad användare',
  'LBL_LIST_CLOSE' => 'Stäng',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_DATE_MODIFIED' => 'Redigeringsdatum',
  'LBL_LIST_DATE' => 'Startdatum',
  'LBL_LIST_DUE_DATE' => 'Genomförandedatum',
  'LBL_LIST_FORM_TITLE' => 'Lista möten',
  'LBL_LIST_MY_MEETINGS' => 'Mina möten',
  'LBL_LIST_RELATED_TO' => 'Relaterad till',
  'LBL_LIST_SUBJECT' => 'Ämne',
  'LBL_LIST_TIME' => 'Start tid',
  'LBL_LOCATION' => 'Plats:',
  'LBL_MEETING' => 'Möte:',
  'LBL_MODIFIED_BY' => 'Redigerad av',
  'LBL_MODULE_NAME' => 'Möten',
  'LBL_MODULE_TITLE' => 'Möten:Hem',
  'LBL_NAME' => 'Namn',
  'LBL_NEW_FORM_TITLE' => 'Skapa aktivitet',
  'LBL_PHONE' => 'Kontorstelefon:',
  'LBL_REMINDER_TIME' => 'Tid för påminnelse',
  'LBL_REMINDER' => 'Påminnelse:',
  'LBL_SCHEDULING_FORM_TITLE' => 'Schemaläggning',
  'LBL_SEARCH_BUTTON' => 'Sök',
  'LBL_SEARCH_FORM_TITLE' => 'Sök möte',
  'LBL_SEND_BUTTON_LABEL' => 'Skicka inbjudan',
  'LBL_SEND_BUTTON_TITLE' => 'Skicka inbjudan [Alt+I]',
  'LBL_SUBJECT' => 'Ämne:',
  'LBL_TIME' => 'Start tid:',
  'LBL_USERS_SUBPANEL_TITLE' => 'Användare',
  'LNK_MEETING_LIST' => 'Möten',
  'LNK_NEW_APPOINTMENT' => 'Skapa aktivitet',
  'LNK_NEW_MEETING' => 'Schemalägg möte',
  'NTC_REMOVE_INVITEE' => 'Är du säker på att du vill ta bort den inbjudna från mötet?',
);


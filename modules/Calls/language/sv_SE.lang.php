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
  'LBL_BLANK' => '-blank-',
  'LBL_STATUS' => 'Status:',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_MODULE_NAME' => 'Telefonsamtal',
  'LBL_MODULE_TITLE' => 'Telefonsamtal: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök telefonsamtal',
  'LBL_LIST_FORM_TITLE' => 'Lista telefonsamtal',
  'LBL_NEW_FORM_TITLE' => 'Skapa aktivitet',
  'LBL_LIST_CLOSE' => 'Stäng',
  'LBL_LIST_SUBJECT' => 'Ämne',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Relaterad till',
  'LBL_LIST_RELATED_TO_ID' => 'Relaterad till ID',
  'LBL_LIST_DATE' => 'Startdatum',
  'LBL_LIST_TIME' => 'Start tid',
  'LBL_LIST_DURATION' => 'Varaktighet',
  'LBL_LIST_DIRECTION' => 'Riktning',
  'LBL_SUBJECT' => 'Ämne:',
  'LBL_REMINDER' => 'Påminnelse:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivande information',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_DIRECTION' => 'Riktning:',
  'LBL_DATE' => 'Startdatum',
  'LBL_DURATION' => 'Varaktighet:',
  'LBL_DURATION_HOURS' => 'Varaktighet timmar:',
  'LBL_DURATION_MINUTES' => 'Varaktighet minuter:',
  'LBL_HOURS_MINUTES' => '(timmar/minuter)',
  'LBL_CALL' => 'Telefonsamtal:',
  'LBL_DATE_TIME' => 'Startdatum & tid',
  'LBL_TIME' => 'Start tid:',
  'LBL_DEFAULT_STATUS' => 'Planerat',
  'LNK_NEW_CALL' => 'Schemalägg telefonsamtal',
  'LNK_NEW_MEETING' => 'Schemalägg möte',
  'LNK_CALL_LIST' => 'Telefonsamtal',
  'LNK_IMPORT_CALLS' => 'Importera telefonsamtal',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att kunna radera organisationen.',
  'NTC_REMOVE_INVITEE' => 'Är du säker på att du vill ta bort den inbjudna från detta telefonsamtal?',
  'LBL_INVITEE' => 'Inbjudna',
  'LBL_RELATED_TO' => 'Relaterad till:',
  'LNK_NEW_APPOINTMENT' => 'Skapa aktivitet',
  'LBL_SCHEDULING_FORM_TITLE' => 'Schemaläggning',
  'LBL_ADD_INVITEE' => 'Lägg till inbjudna',
  'LBL_NAME' => 'Namn',
  'LBL_FIRST_NAME' => 'Förnamn',
  'LBL_LAST_NAME' => 'Efternamn',
  'LBL_EMAIL' => 'Epost',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Skicka inbjudan [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Skicka inbjudan',
  'LBL_DATE_END' => 'Slutdatum',
  'LBL_TIME_END' => 'Slut tid',
  'LBL_REMINDER_TIME' => 'Påminnelse tid',
  'LBL_SEARCH_BUTTON' => 'Sök',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivitetsrapport',
  'LBL_ADD_BUTTON' => 'Lägg till',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Telefonsamtal',
  'LBL_LOG_CALL' => 'Telefonsamtals logg',
  'LNK_SELECT_ACCOUNT' => 'Välj organisation',
  'LNK_NEW_ACCOUNT' => 'Ny organisation',
  'LNK_NEW_OPPORTUNITY' => 'Ny affärsmöjlighet',
  'LBL_DEL' => 'Radera',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_USERS_SUBPANEL_TITLE' => 'Användare',
  'LBL_MEMBER_OF' => 'Medlem av',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Anteckningar',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tilldelad användare',
  'LBL_LIST_MY_CALLS' => 'Mina telefonsamtal',
  'LBL_SELECT_FROM_DROPDOWN' => 'Var god välj först från dropdownmenyn Relaterad till.',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till',
  'LBL_ASSIGNED_TO_ID' => 'Tilldelad användare',
  'NOTICE_DURATION_TIME' => 'Varaktighetstiden måste vara större än 0',
  'LBL_CALL_INFORMATION' => 'Samtalsöversikt',
  'LBL_REMOVE' => 'radera',
);


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
  'LBL_STATUS' => 'Status:',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_DEL' => 'Del',
  'LBL_MODULE_NAME' => 'Opkald',
  'LBL_MODULE_TITLE' => 'Opkald: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter opkald',
  'LBL_LIST_FORM_TITLE' => 'Opkaldsliste',
  'LBL_NEW_FORM_TITLE' => 'Opret aftale',
  'LBL_LIST_CLOSE' => 'Luk',
  'LBL_LIST_SUBJECT' => 'Emne',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Relateret til',
  'LBL_LIST_RELATED_TO_ID' => 'Relateret til id',
  'LBL_LIST_DATE' => 'Startdato',
  'LBL_LIST_TIME' => 'Starttidspunkt',
  'LBL_LIST_DURATION' => 'Varighed',
  'LBL_LIST_DIRECTION' => 'Retning',
  'LBL_SUBJECT' => 'Emne:',
  'LBL_REMINDER' => 'Påmindelse:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivelsesoplysninger',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DIRECTION' => 'Retning:',
  'LBL_DATE' => 'Startdato:',
  'LBL_DURATION' => 'Varighed:',
  'LBL_DURATION_HOURS' => 'Varighed i timer:',
  'LBL_DURATION_MINUTES' => 'Varighed i minutter:',
  'LBL_HOURS_MINUTES' => '"timer/minutter"',
  'LBL_CALL' => 'Opkald:',
  'LBL_DATE_TIME' => 'Startdato og -klokkeslæt:',
  'LBL_TIME' => 'Starttidspunkt:',
  'LBL_HOURS_ABBREV' => 't',
  'LNK_NEW_CALL' => 'Planlæg opkald',
  'LNK_NEW_MEETING' => 'Planlæg møde',
  'LNK_CALL_LIST' => 'Opkald',
  'LNK_IMPORT_CALLS' => 'Importér opkald',
  'ERR_DELETE_RECORD' => 'Der skal angives et postnummer for at slette virksomheden.',
  'NTC_REMOVE_INVITEE' => 'Er du sikker på, at du vil fjerne denne inviterede fra opkaldet?',
  'LBL_INVITEE' => 'Inviterede',
  'LBL_RELATED_TO' => 'Relateret til:',
  'LNK_NEW_APPOINTMENT' => 'Opret aftale',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planlægning',
  'LBL_ADD_INVITEE' => 'Tilføj inviterede',
  'LBL_NAME' => 'Navn',
  'LBL_FIRST_NAME' => 'Fornavn',
  'LBL_LAST_NAME' => 'Efternavn',
  'LBL_EMAIL' => 'E-mail',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Send invitationer [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Send invitationer',
  'LBL_DATE_END' => 'Slutdato',
  'LBL_TIME_END' => 'Sluttidspunkt',
  'LBL_REMINDER_TIME' => 'Påmindelsestidspunkt',
  'LBL_SEARCH_BUTTON' => 'Søg',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivitetsrapport',
  'LBL_ADD_BUTTON' => 'Tilføj',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Opkald',
  'LBL_LOG_CALL' => 'Log opkald',
  'LNK_SELECT_ACCOUNT' => 'Vælg virksomhed',
  'LNK_NEW_ACCOUNT' => 'Ny virksomhed',
  'LNK_NEW_OPPORTUNITY' => 'Ny salgsmulighed',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Kundeemner',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_USERS_SUBPANEL_TITLE' => 'Brugere',
  'LBL_OUTLOOK_ID' => 'Outlook-id',
  'LBL_MEMBER_OF' => 'Medlem af',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Noter',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tildelt til',
  'LBL_LIST_MY_CALLS' => 'Mine opkald',
  'LBL_SELECT_FROM_DROPDOWN' => 'Vælg først fra rullelisten Relateret til.',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt til',
  'LBL_ASSIGNED_TO_ID' => 'Tildelt bruger',
  'NOTICE_DURATION_TIME' => 'Varigheden skal være større end 0',
  'LBL_CALL_INFORMATION' => 'Opkaldsoversigt',
  'LBL_REMOVE' => 'fjern',
);


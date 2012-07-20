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
  'LBL_BLANK' => '-leeg-',
  'LBL_STATUS' => 'Status:',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_MODULE_NAME' => 'Telefoongesprek',
  'LBL_MODULE_TITLE' => 'Telefoongesprekken: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Telefoongesprek zoeken',
  'LBL_LIST_FORM_TITLE' => 'Telefoongesprekken',
  'LBL_NEW_FORM_TITLE' => 'Nieuw Telefoongesprek',
  'LBL_LIST_CLOSE' => 'Sluiten',
  'LBL_LIST_SUBJECT' => 'Onderwerp',
  'LBL_LIST_CONTACT' => 'Persoon',
  'LBL_LIST_RELATED_TO' => 'Gerelateerd aan',
  'LBL_LIST_RELATED_TO_ID' => 'Gerelateerd aan ID',
  'LBL_LIST_DATE' => 'Begindatum',
  'LBL_LIST_TIME' => 'Aanvangstijd',
  'LBL_LIST_DURATION' => 'Gespreksduur',
  'LBL_LIST_DIRECTION' => 'Richting',
  'LBL_SUBJECT' => 'Onderwerp:',
  'LBL_REMINDER' => 'Herinnering:',
  'LBL_CONTACT_NAME' => 'Naam Persoon:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschrijving',
  'LBL_DESCRIPTION' => 'Beschrijving:',
  'LBL_DIRECTION' => 'Richting:',
  'LBL_DATE' => 'Begindatum:',
  'LBL_DURATION' => 'Gespreksduur:',
  'LBL_DURATION_HOURS' => 'Duur (uren):',
  'LBL_DURATION_MINUTES' => 'Duur (minuten):',
  'LBL_HOURS_MINUTES' => '(uren/minuten)',
  'LBL_CALL' => 'Telefoongesprek:',
  'LBL_DATE_TIME' => 'Begindatum & tijd:',
  'LBL_TIME' => 'Aanvangstijd:',
  'LBL_HOURS_ABBREV' => 'uur',
  'LBL_MINSS_ABBREV' => 'min',
  'LNK_NEW_CALL' => 'Nieuw Telefoongesprek',
  'LNK_NEW_MEETING' => 'Nieuwe Afspraak',
  'LNK_CALL_LIST' => 'Telefoongesprekken',
  'LNK_IMPORT_CALLS' => 'Importeer Gesprekken',
  'ERR_DELETE_RECORD' => 'Er moet een recordnummer zijn gespecificeerd om deze organisatie te verwijderen.',
  'NTC_REMOVE_INVITEE' => 'Weet u zeker dat u deze uitgenodigde persoon wilt verwijderen bij dit telefoongesprek?',
  'LBL_INVITEE' => 'Genodigden',
  'LBL_RELATED_TO' => 'Gerelateerd aan:',
  'LNK_NEW_APPOINTMENT' => 'Nieuwe Afspraak',
  'LBL_SCHEDULING_FORM_TITLE' => 'Inplannen',
  'LBL_ADD_INVITEE' => 'Uitnodigen',
  'LBL_NAME' => 'Naam',
  'LBL_FIRST_NAME' => 'Voornaam',
  'LBL_LAST_NAME' => 'Achternaam',
  'LBL_EMAIL' => 'E-mail',
  'LBL_PHONE' => 'Telefoon',
  'LBL_SEND_BUTTON_TITLE' => 'Verstuur Uitnodiging [ALT+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Verstuur Uitnodiging',
  'LBL_DATE_END' => 'Einddatum',
  'LBL_TIME_END' => 'Eindtijd',
  'LBL_REMINDER_TIME' => 'Herinneringstijd',
  'LBL_SEARCH_BUTTON' => 'Zoeken',
  'LBL_ACTIVITIES_REPORTS' => 'Activiteitenrapport',
  'LBL_ADD_BUTTON' => 'Toevoegen',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Telefoongesprekken',
  'LBL_LOG_CALL' => 'Log Oproep',
  'LNK_SELECT_ACCOUNT' => 'Kies een organisatie',
  'LNK_NEW_ACCOUNT' => 'Nieuwe Organisatie',
  'LNK_NEW_OPPORTUNITY' => 'Nieuwe Opportunity',
  'LBL_DEL' => 'Verwijder',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Personen',
  'LBL_USERS_SUBPANEL_TITLE' => 'Gebruikers',
  'LBL_MEMBER_OF' => 'Lid van',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notities',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Gebruiker',
  'LBL_LIST_MY_CALLS' => 'Mijn Telefoongesprekken',
  'LBL_SELECT_FROM_DROPDOWN' => 'Maak a.u.b. eerst een keuze uit de keuzelijst.',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen aan',
  'LBL_ASSIGNED_TO_ID' => 'Toegewezen aan ID',
  'NOTICE_DURATION_TIME' => 'Tijdsduur moet groter zijn dan 0',
  'LBL_CALL_INFORMATION' => 'Gespreksoverzicht',
  'LBL_REMOVE' => 'verwijderen',
);


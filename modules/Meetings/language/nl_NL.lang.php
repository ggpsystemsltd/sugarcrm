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
  'LBL_COLON' => ':',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_STATUS' => 'Status:',
  'LBL_MEETING_INFORMATION' => 'Meeting Overview',
  'ERR_DELETE_RECORD' => 'Er moet een record nummer zijn gespecificeerd om deze afspraak te verwijderen.',
  'LBL_ACCEPT_THIS' => 'Accepteren?',
  'LBL_ADD_BUTTON' => 'Toevoegen',
  'LBL_ADD_INVITEE' => 'Uitnodigen',
  'LBL_CONTACT_NAME' => 'Naam persoon:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Personen',
  'LBL_CREATED_BY' => 'Gemaakt door',
  'LBL_DATE_END' => 'Einddatum',
  'LBL_DATE_TIME' => 'Begindatum & tijd:',
  'LBL_DATE' => 'Begindatum:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Afspraken',
  'LBL_DEL' => 'Verwijder',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschrijving',
  'LBL_DESCRIPTION' => 'Beschrijving:',
  'LBL_DURATION_HOURS' => 'Duur (uren):',
  'LBL_DURATION_MINUTES' => 'Duur (minuten):',
  'LBL_DURATION' => 'Gespreksduur:',
  'LBL_EMAIL' => 'E-mail',
  'LBL_FIRST_NAME' => 'Voornaam',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notities',
  'LBL_HOURS_ABBREV' => 'uur',
  'LBL_HOURS_MINS' => '(uren/minuten)',
  'LBL_INVITEE' => 'Genodigden',
  'LBL_LAST_NAME' => 'Achternaam',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen aan:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Toegewezen aan',
  'LBL_LIST_CLOSE' => 'Sluiten',
  'LBL_LIST_CONTACT' => 'Persoon',
  'LBL_LIST_DATE_MODIFIED' => 'Laatste wijziging',
  'LBL_LIST_DATE' => 'Begindatum',
  'LBL_LIST_DIRECTION' => 'Richting',
  'LBL_LIST_DUE_DATE' => 'Vervaldatum',
  'LBL_LIST_FORM_TITLE' => 'Afspraken',
  'LBL_LIST_MY_MEETINGS' => 'Mijn Afspraken',
  'LBL_LIST_RELATED_TO' => 'Gerelateerd aan',
  'LBL_LIST_SUBJECT' => 'Onderwerp',
  'LBL_LIST_TIME' => 'Aanvangstijd',
  'LBL_LOCATION' => 'Locatie:',
  'LBL_MEETING' => 'Afspraak:',
  'LBL_MINSS_ABBREV' => 'min',
  'LBL_MODIFIED_BY' => 'Gewijzigd door',
  'LBL_MODULE_NAME' => 'Afspraak',
  'LBL_MODULE_TITLE' => 'Afspraken: Start',
  'LBL_NAME' => 'Naam',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Afspraak',
  'LBL_PHONE' => 'Telefoon (Werk):',
  'LBL_REMINDER_TIME' => 'Herinneringstijd',
  'LBL_REMINDER' => 'Herinnering:',
  'LBL_REMOVE' => 'verwijderen',
  'LBL_SCHEDULING_FORM_TITLE' => 'Inplannen',
  'LBL_SEARCH_BUTTON' => 'Zoeken',
  'LBL_SEARCH_FORM_TITLE' => 'Afspraak zoeken',
  'LBL_SEND_BUTTON_LABEL' => 'Verstuur Uitnodiging',
  'LBL_SEND_BUTTON_TITLE' => 'Verstuur Uitnodiging [ALT+I]',
  'LBL_TYPE' => 'Type Afspraak',
  'LBL_PASSWORD' => 'Wachtwoord:',
  'LBL_URL' => 'Start/Deelnemen',
  'LBL_CREATOR' => 'Bijeenkomst geïnitieerd door:',
  'LBL_EXTERNALID' => 'Externe App ID',
  'LBL_SUBJECT' => 'Onderwerp:',
  'LBL_TIME' => 'Aanvangstijd:',
  'LBL_USERS_SUBPANEL_TITLE' => 'Gebruikers',
  'LBL_ACTIVITIES_REPORTS' => 'Activiteitenrapport',
  'LNK_MEETING_LIST' => 'Afspraken',
  'LNK_NEW_APPOINTMENT' => 'Nieuwe Afspraak',
  'LNK_NEW_MEETING' => 'Nieuwe Afspraak',
  'LNK_IMPORT_MEETINGS' => 'Importeer Afspraken',
  'NTC_REMOVE_INVITEE' => 'Wilt u zeker dat u deze genodigde voor deze afspraak wilt verwijderen?',
  'LBL_CREATED_USER' => 'Gebruiker aangemaakt',
  'LBL_MODIFIED_USER' => '??Gebruiker aangepast',
  'NOTICE_DURATION_TIME' => 'De tijdsduur moet groter zijn dan 0',
  'LBL_LIST_JOIN_MEETING' => 'Deelnemen',
  'LBL_JOIN_EXT_MEETING' => 'Deelnemen',
  'LBL_HOST_EXT_MEETING' => 'Begin bijeenkomst',
  'LBL_EXTNOT_HEADER' => 'Fout: Niet uitgenodigd',
  'LBL_EXTNOT_MAIN' => 'U kunt niet deelnemen aan deze bijeenkomst aangezien u niet bent uitgenodigd.',
  'LBL_EXTNOT_RECORD_LINK' => 'Toon Bijeenkomst',
  'LBL_EXTNOT_GO_BACK' => 'Ga terug naar het vorige record',
  'LBL_EXTNOSTART_HEADER' => 'Fout: Kan de Bijeenkomst niet beginnen',
  'LBL_EXTNOSTART_MAIN' => 'U kunt deze bijeenkomst niet starten omdat u geen Administrator bent en ook niet de eigenaar van de bijeenkomst.',
);


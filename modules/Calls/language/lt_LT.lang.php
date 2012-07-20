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
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_BLANK' => '-Tuščia-',
  'LBL_MODULE_NAME' => 'Skambučiai',
  'LBL_MODULE_TITLE' => 'Skambučiai: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Skambučių paieška',
  'LBL_LIST_FORM_TITLE' => 'Skambučių sąrašas',
  'LBL_NEW_FORM_TITLE' => 'Sukurti paskyrimą',
  'LBL_LIST_CLOSE' => 'Uždaryti',
  'LBL_LIST_SUBJECT' => 'Tema',
  'LBL_LIST_CONTACT' => 'Kontaktai',
  'LBL_LIST_RELATED_TO' => 'Susijęs su',
  'LBL_LIST_RELATED_TO_ID' => 'Susiję su ID',
  'LBL_LIST_DATE' => 'Pradžios data',
  'LBL_LIST_TIME' => 'Pradžios laikas',
  'LBL_LIST_DURATION' => 'Trukmė',
  'LBL_LIST_DIRECTION' => 'Kryptis',
  'LBL_SUBJECT' => 'Tema:',
  'LBL_REMINDER' => 'Priminimas:',
  'LBL_CONTACT_NAME' => 'Kontaktai:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informacijos aprašymas',
  'LBL_DESCRIPTION' => 'Aprašymas:',
  'LBL_STATUS' => 'Statusas:',
  'LBL_DIRECTION' => 'Kryptis:',
  'LBL_DATE' => 'Pradžios laikas:',
  'LBL_DURATION' => 'Trukmė',
  'LBL_DURATION_HOURS' => 'Trukmė valandomis:',
  'LBL_DURATION_MINUTES' => 'Trukmė minutėmis:',
  'LBL_HOURS_MINUTES' => '(valandos/minutės)',
  'LBL_CALL' => 'Skambutis:',
  'LBL_DATE_TIME' => 'Pradžios data ir laikas:',
  'LBL_TIME' => 'Pradžios laikas:',
  'LBL_HOURS_ABBREV' => 'v',
  'LNK_NEW_CALL' => 'Suplanuoti skambutį',
  'LNK_NEW_MEETING' => 'Suplanuoti susitikimą',
  'LNK_CALL_LIST' => 'Skambučiai',
  'LNK_IMPORT_CALLS' => 'Importuoti skambučius',
  'ERR_DELETE_RECORD' => 'Nurodykite įrašą, jei norite ištrinti klientą.',
  'NTC_REMOVE_INVITEE' => 'Ar tikrai norite išimti dalyvį iš pokalbio?',
  'LBL_INVITEE' => 'Dalyviai',
  'LBL_RELATED_TO' => 'Susiję su:',
  'LNK_NEW_APPOINTMENT' => 'Sukurti paskyrimą',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planuojama',
  'LBL_ADD_INVITEE' => 'Įdėti dalyvius',
  'LBL_NAME' => 'Vardas',
  'LBL_FIRST_NAME' => 'Vardas',
  'LBL_LAST_NAME' => 'Pavardė',
  'LBL_EMAIL' => 'El. paštas',
  'LBL_PHONE' => 'Telefonas',
  'LBL_SEND_BUTTON_TITLE' => 'Siųsti pakvietimus [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Siųsti pakvietimus',
  'LBL_DATE_END' => 'Pabaigos data',
  'LBL_TIME_END' => 'Pabaigos laikas',
  'LBL_REMINDER_TIME' => 'Priminimo laikas',
  'LBL_SEARCH_BUTTON' => 'Ieškoti',
  'LBL_ACTIVITIES_REPORTS' => 'Priminimų ataskaita',
  'LBL_ADD_BUTTON' => 'Pridėti',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Skambučiai',
  'LBL_LOG_CALL' => 'Skambučių istorija',
  'LNK_SELECT_ACCOUNT' => 'Pasirinkti klientą',
  'LNK_NEW_ACCOUNT' => 'Naujas klientas',
  'LNK_NEW_OPPORTUNITY' => 'Naujas pardavimas',
  'LBL_DEL' => 'Trinti',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Potencialūs klientai',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaktai',
  'LBL_USERS_SUBPANEL_TITLE' => 'Vartotojai',
  'LBL_MEMBER_OF' => 'Narys',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Užrašai',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atsakingas',
  'LBL_LIST_MY_CALLS' => 'Mano skambučiai',
  'LBL_SELECT_FROM_DROPDOWN' => 'Prašome pirmiausia pasirinkti reikšmę iš Susiję su iššokančio sąrašo.',
  'LBL_ASSIGNED_TO_NAME' => 'Atsakingas',
  'LBL_ASSIGNED_TO_ID' => 'Atsakingas',
  'NOTICE_DURATION_TIME' => 'Trukmės periodas turi būti daugiau už 0',
  'LBL_CALL_INFORMATION' => 'Skambučio informacija',
  'LBL_REMOVE' => 'trinti',
);


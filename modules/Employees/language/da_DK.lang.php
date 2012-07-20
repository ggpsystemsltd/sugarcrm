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
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_ADMIN' => 'Administrator:',
  'LBL_FAX' => 'Fax:',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Medarbejdere',
  'LBL_MODULE_TITLE' => 'Medarbejdere: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter medarbejdere',
  'LBL_LIST_FORM_TITLE' => 'Medarbejdere',
  'LBL_NEW_FORM_TITLE' => 'Ny medarbejder',
  'LBL_EMPLOYEE' => 'Medarbejdere:',
  'LBL_LOGIN' => 'Log på',
  'LBL_RESET_PREFERENCES' => 'Nulstil til standardindstillinger',
  'LBL_TIME_FORMAT' => 'Klokkeslætsformat:',
  'LBL_DATE_FORMAT' => 'Datoformat:',
  'LBL_TIMEZONE' => 'Aktuelt klokkeslæt:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_LIST_NAME' => 'Navn',
  'LBL_LIST_LAST_NAME' => 'Efternavn',
  'LBL_LIST_EMPLOYEE_NAME' => 'Medarbejdernavn',
  'LBL_LIST_DEPARTMENT' => 'Afdeling',
  'LBL_LIST_REPORTS_TO_NAME' => 'Rapporterer til',
  'LBL_LIST_EMAIL' => 'E-mail',
  'LBL_LIST_PRIMARY_PHONE' => 'Primær telefon',
  'LBL_LIST_USER_NAME' => 'Brugernavn',
  'LBL_LIST_ADMIN' => 'Administration',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Ny medarbejder [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Ny medarbejder',
  'LBL_ERROR' => 'Fejl:',
  'LBL_PASSWORD' => 'Adgangskode:',
  'LBL_EMPLOYEE_NAME' => 'Medarbejdernavn:',
  'LBL_USER_NAME' => 'Brugernavn:',
  'LBL_FIRST_NAME' => 'Fornavn:',
  'LBL_LAST_NAME' => 'Efternavn:',
  'LBL_EMPLOYEE_SETTINGS' => 'Medarbejderindstillinger',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Sprog:',
  'LBL_EMPLOYEE_INFORMATION' => 'Medarbejderoplysninger',
  'LBL_OFFICE_PHONE' => 'Telefon "arbejde":',
  'LBL_REPORTS_TO' => 'Rapporterer til id:',
  'LBL_REPORTS_TO_NAME' => 'Rapporterer til',
  'LBL_OTHER_PHONE' => 'Andet:',
  'LBL_OTHER_EMAIL' => 'Anden e-mail:',
  'LBL_NOTES' => 'Noter:',
  'LBL_DEPARTMENT' => 'Afdeling:',
  'LBL_TITLE' => 'Titel:',
  'LBL_ANY_ADDRESS' => 'Adresse:',
  'LBL_ANY_PHONE' => 'Telefon:',
  'LBL_ANY_EMAIL' => 'E-mail:',
  'LBL_ADDRESS' => 'Adresse:',
  'LBL_CITY' => 'By:',
  'LBL_STATE' => 'Stat:',
  'LBL_POSTAL_CODE' => 'Postnummer:',
  'LBL_COUNTRY' => 'Land:',
  'LBL_NAME' => 'Navn:',
  'LBL_MOBILE_PHONE' => 'Mobiltelefon:',
  'LBL_OTHER' => 'Andet:',
  'LBL_EMAIL' => 'E-mail-adresse:',
  'LBL_HOME_PHONE' => 'Telefon "privat":',
  'LBL_WORK_PHONE' => 'Telefon "arbejde":',
  'LBL_ADDRESS_INFORMATION' => 'Adresseoplysninger',
  'LBL_EMPLOYEE_STATUS' => 'Medarbejderstatus:',
  'LBL_PRIMARY_ADDRESS' => 'Primær adresse:',
  'LBL_SAVED_SEARCH' => 'Layoutindstillinger',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Opret bruger [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Opret bruger',
  'LBL_FAVORITE_COLOR' => 'Favoritfarve:',
  'LBL_MESSENGER_ID' => 'Chatnavn:',
  'LBL_MESSENGER_TYPE' => 'Chattype:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Medarbejdernavnet',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'findes allerede. Identiske medarbejdernavne er ikke tilladt. Rediger medarbejdernavnet, så det bliver entydigt.',
  'ERR_LAST_ADMIN_1' => '"Medarbejdernavnet """',
  'ERR_LAST_ADMIN_2' => 'Er den sidste medarbejder med administrator-adgang. Mindst en medarbejder skal være en administrator."',
  'LNK_NEW_EMPLOYEE' => 'Opret medarbejder',
  'LNK_EMPLOYEE_LIST' => 'Medarbejdere',
  'ERR_DELETE_RECORD' => 'Du skal angive et postnummer for at slette virksomheden.',
  'LBL_DEFAULT_TEAM' => 'Standardteam:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Vælger standardteam for nye poster',
  'LBL_MY_TEAMS' => 'Mine team',
  'LBL_LIST_DESCRIPTION' => 'Beskrivelse',
  'LNK_EDIT_TABS' => 'Rediger faner',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Er du sikker på, at du vil fjerne denne medarbejder\\s medlemskab?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Medarbejderstatus',
  'LBL_SUGAR_LOGIN' => 'Er Sugar-bruger',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Giv besked om tildeling',
  'LBL_IS_ADMIN' => 'Er administrator',
  'LBL_GROUP' => 'Gruppebruger',
  'LBL_PORTAL_ONLY' => 'Portal kun bruger',
  'LBL_PHOTO' => 'Billede',
  'LBL_DELETE_USER_CONFIRM' => 'Denne medarbejder er også en bruger. Sletning af medarbejderposten vil også slette brugerposten, og brugeren vil ikke længere kunne tilgå applikationen. Ønsker du at forsætte med at slette denne post?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Er du sikker på at du vil slette denne medarbejder?',
);


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
  'LBL_USER_TYPE' => 'Type Gebruiker',
  'LBL_EMAIL_LINK_TYPE' => 'E-mail Client',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Sugar E-mail Client:</b> Verstuur e-mails vanuit de ingebouwde e-mail client in Sugar.<br><b>Externe E-mail Client:</b> Verstuur e-mails met een e-mail client buiten Sugar, bijvoorbeeld Microsoft Outlook.',
  'LBL_ONLY_ACTIVE' => 'Actief personeel',
  'LBL_SELECT' => 'Selecteer',
  'LBL_FF_CLEAR' => 'Wissen',
  'LBL_AUTHENTICATE_ID' => 'Authenticatie ID',
  'LBL_EXT_AUTHENTICATE' => 'Externe authenticatie',
  'LBL_GROUP_USER' => 'Groepsgebruiker',
  'LBL_LIST_ACCEPT_STATUS' => 'Acceptiestatus',
  'LBL_MODIFIED_BY' => 'Gewijzigd door:',
  'LBL_MODIFIED_BY_ID' => 'Gewijzigd door ID',
  'LBL_CREATED_BY_NAME' => 'Aangemaakt door',
  'LBL_PORTAL_ONLY_USER' => 'Portal API Gebruiker',
  'LBL_PSW_MODIFIED' => 'Laatste wijziging wachtwoord',
  'LBL_SHOW_ON_EMPLOYEES' => 'Toon record medewerker',
  'LBL_USER_HASH' => 'Wachtwoord',
  'LBL_SYSTEM_GENERATED_PASSWORD' => 'Systeem gegenereerd wachtwoord',
  'LBL_PICTURE_FILE' => 'Afbeelding',
  'LBL_DESCRIPTION' => 'Beschrijving',
  'LBL_FAX_PHONE' => 'Fax',
  'LBL_STATUS' => 'Status',
  'LBL_ADDRESS_CITY' => 'Woonplaats',
  'LBL_ADDRESS_COUNTRY' => 'Land',
  'LBL_ADDRESS_POSTALCODE' => 'Postcode',
  'LBL_ADDRESS_STATE' => 'Provincie',
  'LBL_ADDRESS_STREET' => 'Straat',
  'LBL_DATE_MODIFIED' => 'Datum laatste wijziging',
  'LBL_DATE_ENTERED' => 'Datum aangemaakt',
  'LBL_DELETED' => 'Verwijderd',
  'LBL_LOGIN' => 'Login',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MESSENGER_TYPE' => 'IM Type:',
  'LBL_MODULE_NAME' => 'Medewerker',
  'LBL_MODULE_TITLE' => 'Medewerkers: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Medewerkers zoeken',
  'LBL_LIST_FORM_TITLE' => 'Medewerkers',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe medewerker',
  'LBL_EMPLOYEE' => 'Aantal medewerkers:',
  'LBL_RESET_PREFERENCES' => 'Terug naar de standaard instellingen',
  'LBL_TIME_FORMAT' => 'Tijdweergave:',
  'LBL_DATE_FORMAT' => 'Datumweergave:',
  'LBL_TIMEZONE' => 'Huidige tijd:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_LIST_NAME' => 'Naam',
  'LBL_LIST_LAST_NAME' => 'Achternaam',
  'LBL_LIST_EMPLOYEE_NAME' => 'Naam medewerker',
  'LBL_LIST_DEPARTMENT' => 'Afdeling',
  'LBL_LIST_REPORTS_TO_NAME' => 'Rapporteert aan',
  'LBL_LIST_EMAIL' => 'E-mail',
  'LBL_LIST_PRIMARY_PHONE' => 'Telefoon',
  'LBL_LIST_USER_NAME' => 'Gebruikersnaam',
  'LBL_LIST_ADMIN' => 'Configuratie',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Nieuwe medewerker [ALT+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Nieuwe medewerker',
  'LBL_ERROR' => 'Error:',
  'LBL_PASSWORD' => 'Wachtwoord:',
  'LBL_EMPLOYEE_NAME' => 'Medewerkersnaam:',
  'LBL_USER_NAME' => 'Gebruikersnaam:',
  'LBL_FIRST_NAME' => 'Voornaam:',
  'LBL_LAST_NAME' => 'Achternaam:',
  'LBL_EMPLOYEE_SETTINGS' => 'Medewerkerinstellingen',
  'LBL_THEME' => 'Thema:',
  'LBL_LANGUAGE' => 'Taal:',
  'LBL_ADMIN' => 'Admininstrator:',
  'LBL_EMPLOYEE_INFORMATION' => 'Medewerkersinformatie',
  'LBL_OFFICE_PHONE' => 'Telefoon (werk):',
  'LBL_REPORTS_TO' => 'Rapporteert aan ID:',
  'LBL_REPORTS_TO_NAME' => 'Rapporteert aan',
  'LBL_OTHER_PHONE' => 'Anders:',
  'LBL_OTHER_EMAIL' => 'Alternatief e-mailadres:',
  'LBL_NOTES' => 'Notities:',
  'LBL_DEPARTMENT' => 'Afdeling:',
  'LBL_TITLE' => 'Titel:',
  'LBL_ANY_ADDRESS' => 'Elk adres:',
  'LBL_ANY_PHONE' => '(Deel van) telefoonnummer',
  'LBL_ANY_EMAIL' => 'Willekeurige e-mail:',
  'LBL_ADDRESS' => 'Adres',
  'LBL_CITY' => 'Plaats:',
  'LBL_STATE' => 'Provincie:',
  'LBL_POSTAL_CODE' => 'Postcode:',
  'LBL_COUNTRY' => 'Land:',
  'LBL_NAME' => 'Naam:',
  'LBL_MOBILE_PHONE' => 'Mobiel:',
  'LBL_OTHER' => 'Anders:',
  'LBL_FAX' => 'Fax:',
  'LBL_EMAIL' => 'E-mail:',
  'LBL_HOME_PHONE' => 'Privé:',
  'LBL_WORK_PHONE' => 'Werk:',
  'LBL_ADDRESS_INFORMATION' => 'Adresgegevens',
  'LBL_EMPLOYEE_STATUS' => 'Medewerkerstatus:',
  'LBL_PRIMARY_ADDRESS' => 'Hoofdadres:',
  'LBL_SAVED_SEARCH' => 'Lay-out instellingen',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Creëer gebruiker [ALT+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Nieuwe gebruiker',
  'LBL_FAVORITE_COLOR' => 'Favoriete kleur:',
  'LBL_MESSENGER_ID' => 'IM Naam:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Naam medewerker',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'bestaat al. Dubbele gebruikersnamen zijn niet toegestaan. Wijzig de gebruikersnaam zodat deze uniek is.',
  'ERR_LAST_ADMIN_1' => 'De medewerker naam "',
  'ERR_LAST_ADMIN_2' => 'is de laatste gebruiker die Admin rechten heeft. Minstens een gebruiker moet Administrator zijn.',
  'LNK_NEW_EMPLOYEE' => 'Nieuwe medewerker',
  'LNK_EMPLOYEE_LIST' => 'Medewerkers',
  'ERR_DELETE_RECORD' => 'Specificeer een recordnummer om dit bedrijf te verwijderen.',
  'LBL_DEFAULT_TEAM' => 'Standaard team:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Selecteer standaard team voor nieuwe records',
  'LBL_MY_TEAMS' => 'Mijn teams',
  'LBL_LIST_DESCRIPTION' => 'Beschrijving',
  'LNK_EDIT_TABS' => 'Wijzig tabs',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Weet u zeker dat u het lidmaatschap van deze medewerker wilt verwijderen?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Status',
  'LBL_SUGAR_LOGIN' => 'Is Sugar gebruiker',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Notificatie bij toewijzen',
  'LBL_IS_ADMIN' => 'Is beheerder',
  'LBL_GROUP' => 'Groepsgebruiker',
  'LBL_PORTAL_ONLY' => 'Alleen portal gebruiker',
  'LBL_PHOTO' => 'Foto',
  'LBL_DELETE_USER_CONFIRM' => 'Deze medewerker is ook een gebruiker. Het verwijderen van deze medewerker zal ook de gebruiker verwijderen. De gebruiker kan dan geen gebruik meer maken van de applicatie. Weet u zeker dat u dit record wilt verwijderen?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Weet u zeker dat u deze medewerker wilt verwijderen?',
);


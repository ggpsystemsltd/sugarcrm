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
  'LBL_USER_TYPE' => 'Vartotojo tipas',
  'LBL_EMAIL_LINK_TYPE' => 'Pašto klientas',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Sugar pašto klientas:</b> Siųsti laiškus per SugarCRM sistemą.<br><b>Išorinis pašto klientas:</b> Siųsti laiškus su išorine pašto programa, kaip Outlook ar Thunderbird.',
  'LBL_ONLY_ACTIVE' => 'Aktyvūs darbuotojai',
  'LBL_SELECT' => 'Pasirinkti',
  'LBL_FF_CLEAR' => 'Išvalyti',
  'LBL_AUTHENTICATE_ID' => 'Identifikacijos Id',
  'LBL_EXT_AUTHENTICATE' => 'Išorinė identifikacija',
  'LBL_GROUP_USER' => 'Grupės vartotojas',
  'LBL_LIST_ACCEPT_STATUS' => 'Patvirtinti statusą',
  'LBL_MODIFIED_BY' => 'Redagavo',
  'LBL_MODIFIED_BY_ID' => 'Redaguotojo Id',
  'LBL_CREATED_BY_NAME' => 'Sukūrė',
  'LBL_PORTAL_ONLY_USER' => 'Portalo API vartotojas',
  'LBL_PSW_MODIFIED' => 'Slaptažodis paskutinį kartą keistas',
  'LBL_USER_HASH' => 'Slaptažodis',
  'LBL_SYSTEM_GENERATED_PASSWORD' => 'Sistemos sugeneruotas slaptažodis',
  'LBL_PICTURE_FILE' => 'Nuotrauka',
  'LBL_DESCRIPTION' => 'Aprašymas',
  'LBL_FAX_PHONE' => 'Faksas',
  'LBL_STATUS' => 'Statusas',
  'LBL_ADDRESS_CITY' => 'Miestas',
  'LBL_ADDRESS_COUNTRY' => 'Šalis',
  'LBL_ADDRESS_POSTALCODE' => 'Pašto kodas',
  'LBL_ADDRESS_STATE' => 'Rajonas',
  'LBL_ADDRESS_STREET' => 'Gatvė',
  'LBL_DATE_MODIFIED' => 'Redagavimo data',
  'LBL_DATE_ENTERED' => 'Sukūrimo data:',
  'LBL_DELETED' => 'Ištrintas',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Darbuotojai',
  'LBL_MODULE_TITLE' => 'Darbuotojai: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Darbuotojo paieška',
  'LBL_LIST_FORM_TITLE' => 'Darbuotojai',
  'LBL_NEW_FORM_TITLE' => 'Naujas darbuotojas',
  'LBL_EMPLOYEE' => 'Darbuotojai:',
  'LBL_LOGIN' => 'Prisijungimas',
  'LBL_RESET_PREFERENCES' => 'Atstatyti į pradinę padėtį',
  'LBL_TIME_FORMAT' => 'Laiko formatas:',
  'LBL_DATE_FORMAT' => 'Datos formatas:',
  'LBL_TIMEZONE' => 'Dabartinis laikas:',
  'LBL_CURRENCY' => 'Valiuta:',
  'LBL_LIST_NAME' => 'Vardas',
  'LBL_LIST_LAST_NAME' => 'Pavardė',
  'LBL_LIST_EMPLOYEE_NAME' => 'Darbuotojo vardas',
  'LBL_LIST_DEPARTMENT' => 'Skyrius',
  'LBL_LIST_REPORTS_TO_NAME' => 'Pavaldus kam',
  'LBL_LIST_EMAIL' => 'El. paštas',
  'LBL_LIST_PRIMARY_PHONE' => 'Telefonas',
  'LBL_LIST_USER_NAME' => 'Vartotojo vardas',
  'LBL_LIST_ADMIN' => 'Administratorius',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Naujas darbuotojas [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Naujas darbuotojas',
  'LBL_ERROR' => 'Klaida:',
  'LBL_PASSWORD' => 'Slaptažodis:',
  'LBL_EMPLOYEE_NAME' => 'Darbuotojo vardas:',
  'LBL_USER_NAME' => 'Vartotojo vardas:',
  'LBL_FIRST_NAME' => 'Vardas:',
  'LBL_LAST_NAME' => 'Pavardė:',
  'LBL_EMPLOYEE_SETTINGS' => 'Darbuotojo nustatymai',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Kalba:',
  'LBL_ADMIN' => 'Administratorius:',
  'LBL_EMPLOYEE_INFORMATION' => 'Darbuotojo informacija',
  'LBL_OFFICE_PHONE' => 'Telefonas:',
  'LBL_REPORTS_TO' => 'Pavaldus kam:',
  'LBL_REPORTS_TO_NAME' => 'Pavaldus kam',
  'LBL_OTHER_PHONE' => 'Kiti:',
  'LBL_OTHER_EMAIL' => 'Kitas laiškas:',
  'LBL_NOTES' => 'Užrašai:',
  'LBL_DEPARTMENT' => 'Skyrius:',
  'LBL_TITLE' => 'Pareigos:',
  'LBL_ANY_ADDRESS' => 'Adresas:',
  'LBL_ANY_PHONE' => 'Telefonas:',
  'LBL_ANY_EMAIL' => 'El. paštas:',
  'LBL_ADDRESS' => 'Adresas:',
  'LBL_CITY' => 'Miestas:',
  'LBL_STATE' => 'Rajonas:',
  'LBL_POSTAL_CODE' => 'Pašto kodas:',
  'LBL_COUNTRY' => 'Šalis:',
  'LBL_NAME' => 'Vardas:',
  'LBL_MOBILE_PHONE' => 'Mobilus telefonas:',
  'LBL_OTHER' => 'Kita:',
  'LBL_FAX' => 'Faksas:',
  'LBL_EMAIL' => 'El. paštas:',
  'LBL_HOME_PHONE' => 'Namų telefonas:',
  'LBL_WORK_PHONE' => 'Darbo telefonas:',
  'LBL_ADDRESS_INFORMATION' => 'Adreso informacija',
  'LBL_EMPLOYEE_STATUS' => 'Darbuotojo statusas:',
  'LBL_PRIMARY_ADDRESS' => 'Pirminis Adresas:',
  'LBL_SAVED_SEARCH' => 'Išdėstymas nustatymai',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Sukurti vartotoją [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Sukurti vartotoją',
  'LBL_FAVORITE_COLOR' => 'Mėgstamiausia spalva:',
  'LBL_MESSENGER_ID' => 'IM vardas:',
  'LBL_MESSENGER_TYPE' => 'IM tipas:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Darbuotojo vardas',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'jau egzistuoja. Darbuotojų vardų dublikatai nėra leidžiami.  Prašome pakeisti į naują unikalų darbuotojo vardą.',
  'ERR_LAST_ADMIN_1' => 'Darbuotojo vardas "',
  'ERR_LAST_ADMIN_2' => '" yra paskutinis darbuotojas su administratoriaus teisėmis. Mažiausia vienas darbuotojas turi būti administratorius.',
  'LNK_NEW_EMPLOYEE' => 'Sukurti darbuotoją',
  'LNK_EMPLOYEE_LIST' => 'Darbuotojai',
  'ERR_DELETE_RECORD' => 'Įrašas turi būti nurodytas norint ištrinti klientą.',
  'LBL_DEFAULT_TEAM' => 'Numatyta komanda',
  'LBL_DEFAULT_TEAM_TEXT' => 'Pasirinkite numatytą komandą naujiems įrašams',
  'LBL_MY_TEAMS' => 'Mano komandos',
  'LBL_LIST_DESCRIPTION' => 'Aprašymas',
  'LNK_EDIT_TABS' => 'Redaguoti korteles',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Ar Jūs tikrai norite pašalinti šį narį iš komandos?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Statusas',
  'LBL_SUGAR_LOGIN' => 'Yra Sugar vartotojas',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Darbuotojas yra perspėjamas apie naują užduočių jam priskyrimą',
  'LBL_IS_ADMIN' => 'Yra administratorius',
  'LBL_GROUP' => 'Grupės vartotojas',
  'LBL_PORTAL_ONLY' => 'Tik portalo vartotojas',
  'LBL_PHOTO' => 'Nuotrauka',
  'LBL_DELETE_USER_CONFIRM' => 'Šis darbuotojas yra ir vartotojas. Ištrinant darbuotoją bus ištrinta ir vartotojo informacija. Ar norite tęsti?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Ar tikrai norite ištrinti darbuotoją?',
);


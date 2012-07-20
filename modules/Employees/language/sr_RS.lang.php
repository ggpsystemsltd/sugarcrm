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
  'LBL_OTHER_PHONE' => 'Drugi:',
  'LBL_OTHER_EMAIL' => 'Druga Email adresa:',
  'LBL_LIST_EMAIL' => 'Email',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_ADMIN' => 'Administrator:',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Zaposleni',
  'LBL_MODULE_TITLE' => 'Zaposleni: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga zaposlenih',
  'LBL_LIST_FORM_TITLE' => 'Zaposleni',
  'LBL_NEW_FORM_TITLE' => 'Novi zaposleni',
  'LBL_EMPLOYEE' => 'Zaposleni:',
  'LBL_LOGIN' => 'Prijava',
  'LBL_RESET_PREFERENCES' => 'Resetuj na podrazumevana podešavanja',
  'LBL_TIME_FORMAT' => 'Format vremena:',
  'LBL_DATE_FORMAT' => 'Format datuma:',
  'LBL_TIMEZONE' => 'Trenutno vreme:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_LIST_NAME' => 'Ime',
  'LBL_LIST_LAST_NAME' => 'Prezime',
  'LBL_LIST_EMPLOYEE_NAME' => 'Ime zaposlenog',
  'LBL_LIST_DEPARTMENT' => 'Odeljenje',
  'LBL_LIST_REPORTS_TO_NAME' => 'Nadređeni',
  'LBL_LIST_PRIMARY_PHONE' => 'Primarni telefon',
  'LBL_LIST_USER_NAME' => 'Korisničko ime',
  'LBL_LIST_ADMIN' => 'Administracija',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Novi zaposleni [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Novi zaposleni',
  'LBL_ERROR' => 'Greška:',
  'LBL_PASSWORD' => 'Lozinka:',
  'LBL_EMPLOYEE_NAME' => 'Ime zaposlenog:',
  'LBL_USER_NAME' => 'Korisničko ime',
  'LBL_FIRST_NAME' => 'Ime:',
  'LBL_LAST_NAME' => 'Prezime:',
  'LBL_EMPLOYEE_SETTINGS' => 'Podešavanja zaposlenog',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Jezik:',
  'LBL_EMPLOYEE_INFORMATION' => 'Informacije o zaposlenom',
  'LBL_OFFICE_PHONE' => 'Poslovni telefon:',
  'LBL_REPORTS_TO' => 'Id broj nadređenog:',
  'LBL_REPORTS_TO_NAME' => 'Nadređeni',
  'LBL_NOTES' => 'Napomene:',
  'LBL_DEPARTMENT' => 'Odeljenje:',
  'LBL_TITLE' => 'Titula:',
  'LBL_ANY_ADDRESS' => 'Bilo koja adresa:',
  'LBL_ANY_PHONE' => 'Bilo koji telefon:',
  'LBL_ANY_EMAIL' => 'Bilo koji Email:',
  'LBL_ADDRESS' => 'Adresa:',
  'LBL_CITY' => 'Grad:',
  'LBL_STATE' => 'Opština:',
  'LBL_POSTAL_CODE' => 'Poštanski broj:',
  'LBL_COUNTRY' => 'Država:',
  'LBL_NAME' => 'Ime:',
  'LBL_MOBILE_PHONE' => 'Mob. telefon:',
  'LBL_OTHER' => 'Ostalo:',
  'LBL_FAX' => 'Faks:',
  'LBL_EMAIL' => 'Email adresa:',
  'LBL_HOME_PHONE' => 'Kućni telefon:',
  'LBL_WORK_PHONE' => 'Poslovni telefon:',
  'LBL_ADDRESS_INFORMATION' => 'Informacije o adresi',
  'LBL_EMPLOYEE_STATUS' => 'Status zaposlenog:',
  'LBL_PRIMARY_ADDRESS' => 'Primarna adresa:',
  'LBL_SAVED_SEARCH' => 'Opcije za Izgled',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Kreiraj korisnika [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Kreiraj korisnika',
  'LBL_FAVORITE_COLOR' => 'Omiljena boja:',
  'LBL_MESSENGER_ID' => 'IM ime:',
  'LBL_MESSENGER_TYPE' => 'IM tip:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Ime zaposlenog',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'već postoji. Nije dozvoljeno duplicirati imena zaposlenih. Promenite ime zaposlenog kako bi bilo jedinstveno.',
  'ERR_LAST_ADMIN_1' => 'Ime zaposlenog "',
  'ERR_LAST_ADMIN_2' => '" je poslednji zaposleni sa administratorskim pristupom. Bar jedan zaposleni mora biti administrator.',
  'LNK_NEW_EMPLOYEE' => 'Kreiraj zaposlenog',
  'LNK_EMPLOYEE_LIST' => 'Prikaži zaposlene',
  'ERR_DELETE_RECORD' => 'Morate navesti broj zapisa da bi obrisali kompaniju.',
  'LBL_DEFAULT_TEAM' => 'Podrazumevani tim:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Odaberi podrazumevani tim za nove zapise',
  'LBL_MY_TEAMS' => 'Moji timovi',
  'LBL_LIST_DESCRIPTION' => 'Opis',
  'LNK_EDIT_TABS' => 'Izmeni kartice',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Da li ste sigurni da želite da uklonite članstvo ovog zaposlenog?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Status zaposlenog',
  'LBL_SUGAR_LOGIN' => 'je Sugar korisnik',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Obaveštavanje pri dodeli',
  'LBL_IS_ADMIN' => 'Je administrator',
  'LBL_GROUP' => 'Grupni korisnik',
  'LBL_PORTAL_ONLY' => 'Samo za korisnike portala',
  'LBL_PHOTO' => 'Fotografija',
  'LBL_DELETE_USER_CONFIRM' => 'Ovaj zaposleni je takođe u Korisnik. Brisanjem zapisa zaposlenog ćete takođe obrisati i zapis korisnika i korisnik više neće biti u mogućnosti da pristupi aplikaciji. Da li želite da nastavite sa brisanjem ovog zapisa?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Da li ste sigurni da želite da obrišete ovog zaposlenog?',
);


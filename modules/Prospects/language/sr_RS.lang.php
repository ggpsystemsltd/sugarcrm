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
  'LBL_LIST_EMAIL_ADDRESS' => 'Email',
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_MODULE_NAME' => 'Ciljevi',
  'LBL_MODULE_ID' => 'Ciljevi',
  'LBL_INVITEE' => 'Direktni izveštaj',
  'LBL_MODULE_TITLE' => 'Ciljevi: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga ciljeva',
  'LBL_LIST_FORM_TITLE' => 'Lista ciljeva',
  'LBL_NEW_FORM_TITLE' => 'Novi cilj',
  'LBL_PROSPECT' => 'Cilj:',
  'LBL_BUSINESSCARD' => 'Vizit karta',
  'LBL_LIST_NAME' => 'Ime',
  'LBL_LIST_LAST_NAME' => 'Prezime',
  'LBL_LIST_PROSPECT_NAME' => 'Ime cilja',
  'LBL_LIST_TITLE' => 'Naslov',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Drugi Email',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_PROSPECT_ROLE' => 'Uloga',
  'LBL_LIST_FIRST_NAME' => 'Ime',
  'LBL_ASSIGNED_TO_NAME' => 'Dodeljeno',
  'LBL_ASSIGNED_TO_ID' => 'Dodeljeno',
  'LBL_CAMPAIGN_ID' => 'ID kampanje',
  'LBL_EXISTING_PROSPECT' => 'Korišćen je postojeći kontakt',
  'LBL_CREATED_PROSPECT' => 'Kreiran je novi kontakt',
  'LBL_EXISTING_ACCOUNT' => 'Korišćena je postojeća kompanija',
  'LBL_CREATED_ACCOUNT' => 'Kreirana je nova kompanija',
  'LBL_CREATED_CALL' => 'Evidentiran je novi poziv',
  'LBL_CREATED_MEETING' => 'Kreiran je novi sastanak',
  'LBL_ADDMORE_BUSINESSCARD' => 'Dodaj još jednu vizit kartu',
  'LBL_ADD_BUSINESSCARD' => 'Dodaj Vizit kartu',
  'LBL_NAME' => 'Ime:',
  'LBL_FULL_NAME' => 'Ime',
  'LBL_PROSPECT_NAME' => 'Ime cilja:',
  'LBL_PROSPECT_INFORMATION' => 'Pregled cilja',
  'LBL_MORE_INFORMATION' => 'Više informacija',
  'LBL_FIRST_NAME' => 'Ime:',
  'LBL_OFFICE_PHONE' => 'Poslovni telefon:',
  'LBL_ANY_PHONE' => 'Bilo koji telefon:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_LAST_NAME' => 'Prezime:',
  'LBL_MOBILE_PHONE' => 'Mob. telefon:',
  'LBL_HOME_PHONE' => 'Kućni telefon:',
  'LBL_OTHER_PHONE' => 'Drugi telefon:',
  'LBL_FAX_PHONE' => 'Faks:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Ulica primarne adrese:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Grad primarne adrese:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Država primarne adrese:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Pokrajina primarne adrese:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Poštanski broj primarne adrese:',
  'LBL_ALT_ADDRESS_STREET' => 'Ulica alternativne adrese:',
  'LBL_ALT_ADDRESS_CITY' => 'Grad alternativne adrese:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Država alternativne adrese:',
  'LBL_ALT_ADDRESS_STATE' => 'Pokrajina alternativne adrese:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'Poštanski broj alternativne adrese:',
  'LBL_TITLE' => 'Naslov:',
  'LBL_DEPARTMENT' => 'Odeljenje:',
  'LBL_BIRTHDATE' => 'Datum rođenja:',
  'LBL_EMAIL_ADDRESS' => 'Email adresa:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Drugi Email:',
  'LBL_ANY_EMAIL' => 'Bilo koji Email:',
  'LBL_ASSISTANT' => 'Asistent:',
  'LBL_ASSISTANT_PHONE' => 'Telefon asistenta:',
  'LBL_DO_NOT_CALL' => 'Ne zovi:',
  'LBL_EMAIL_OPT_OUT' => 'Email odjava:',
  'LBL_PRIMARY_ADDRESS' => 'Primarna adresa:',
  'LBL_ALTERNATE_ADDRESS' => 'Druga adresa:',
  'LBL_ANY_ADDRESS' => 'Bilo koja adresa:',
  'LBL_CITY' => 'Grad:',
  'LBL_STATE' => 'Opština:',
  'LBL_POSTAL_CODE' => 'Poštanski broj:',
  'LBL_COUNTRY' => 'Država:',
  'LBL_DESCRIPTION_INFORMATION' => 'Opisne informacije',
  'LBL_ADDRESS_INFORMATION' => 'Informacija o adresi',
  'LBL_DESCRIPTION' => 'Opis:',
  'LBL_PROSPECT_ROLE' => 'Uloga:',
  'LBL_OPP_NAME' => 'Ime prodajne prilike:',
  'LBL_IMPORT_VCARD' => 'Uvezi digitalnu vizitkartu',
  'LBL_IMPORT_VCARDTEXT' => 'Automatski kreiraj novi kontakt uvoženjem digitalne vizit karte sa vašeg sistema.',
  'LBL_DUPLICATE' => 'Mogući dupli ciljevi',
  'MSG_SHOW_DUPLICATES' => 'Cilj koji želite da kreirate možda je duplikat cilja koji već postoji. Ciljevi koji sadrže slična imena i/ili email adrese izlistani su ispod.<br>Kliknite Kreiraj cilj da bi ste kreirali ovaj novi cilj, ili odaberite postojeći lilj sa liste ispod.',
  'MSG_DUPLICATE' => 'Cilj koji želite da kreirate možda je duplikat cilja koji već postoji. Ciljevi koji sadrže slična imena i/ili email adrese izlistani su ispod.<br>Kliknite Sačuvaj da bi nastavili sa kreiranjem ovog novog cilja, ili kliknite Otkaži da bi se vratili u modul bez kreiranja cilja.',
  'LNK_IMPORT_VCARD' => 'Kreiraj iz digitalne vizit karte',
  'LNK_NEW_ACCOUNT' => 'Kreiraj kompaniju',
  'LNK_NEW_OPPORTUNITY' => 'Kreiraj prodajnu priliku',
  'LNK_NEW_CASE' => 'Kreiraj slučaj',
  'LNK_NEW_NOTE' => 'Kreiraj belešku ili prilog',
  'LNK_NEW_CALL' => 'Evidentiraj poziv',
  'LNK_NEW_EMAIL' => 'Arhiviraj Email',
  'LNK_NEW_MEETING' => 'Zakaži sastanak',
  'LNK_NEW_TASK' => 'Kreiraj zadatak',
  'LNK_NEW_APPOINTMENT' => 'Zakaži sastanak',
  'LNK_IMPORT_PROSPECTS' => 'Uvezi ciljeve',
  'NTC_DELETE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovaj zapis?',
  'NTC_REMOVE_CONFIRMATION' => 'Da li ste sigurni da želite da uklonite ovog kontakta iz slučaja?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Da li ste sigurni da želite da uklonite ovaj zapis kao direktni izveštaj?',
  'ERR_DELETE_RECORD' => 'Morate navesti odgovarajući broj zapisa da bi obrisali kontakt.',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Kopiraj primarnu u alternativnu adresu',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Kopiraj alternativnu adresu u primarnu adresu',
  'LBL_SALUTATION' => 'Pozdrav',
  'LBL_SAVE_PROSPECT' => 'Sačuvaj cilj',
  'LBL_CREATED_OPPORTUNITY' => 'Kreirana nova prodajna prilika',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Za kreiranje prodajne prilike neophodna je kompanija.\\n Molim, kreirajte novu kompaniju ili odaberite neku postojeću.',
  'LNK_SELECT_ACCOUNT' => 'Izaberi Kompaniju',
  'LNK_NEW_PROSPECT' => 'Kreiranje cilja',
  'LNK_PROSPECT_LIST' => 'Pregled ciljeva',
  'LNK_NEW_CAMPAIGN' => 'Kreiraj kampanju',
  'LNK_CAMPAIGN_LIST' => 'Kampanje',
  'LNK_NEW_PROSPECT_LIST' => 'Kreiranje liste ciljeva',
  'LNK_PROSPECT_LIST_LIST' => 'Liste ciljeva',
  'LNK_IMPORT_PROSPECT' => 'Uvezi ciljeve',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Izaberi označene ciljeve',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Izaberi označene ciljeve',
  'LBL_INVALID_EMAIL' => 'Nevažeći Email',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Ciljevi',
  'LBL_PROSPECT_LIST' => 'Lista ciljeva',
  'LBL_CONVERT_BUTTON_TITLE' => 'Konvertuj cilj',
  'LBL_CONVERT_BUTTON_LABEL' => 'Konvertuj cilj',
  'LBL_CONVERTPROSPECT' => 'Konvertuj cilj',
  'LNK_NEW_CONTACT' => 'Novi kontakt',
  'LBL_CREATED_CONTACT' => 'Kreiran novi kontakt',
  'LBL_BACKTO_PROSPECTS' => 'Nazad na ciljeve',
  'LBL_CAMPAIGNS' => 'Kampanje',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Log kampanje',
  'LBL_TRACKER_KEY' => 'Ključ sistema za praćenje',
  'LBL_LEAD_ID' => 'ID broj potencijalnog klijenta:',
  'LBL_CONVERTED_LEAD' => 'Konvertovan potencijalni klijent',
  'LBL_ACCOUNT_NAME' => 'Naziv kompanije',
  'LBL_EDIT_ACCOUNT_NAME' => 'Naziv kompanije:',
  'LBL_CREATED_USER' => 'Kreirao',
  'LBL_MODIFIED_USER' => 'Promenio',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampanje',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istorija',
);


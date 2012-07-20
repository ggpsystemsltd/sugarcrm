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
  'LBL_SW_EDIT_WORKFLOW' => 'Izmeni radni tok',
  'LBL_MODULE_TITLE' => 'Studio',
  'LBL_SW_SUGARPORTAL' => 'Sugar Portal',
  'LBL_EDIT_LAYOUT' => 'Izmeni raspored',
  'LBL_EDIT_ROWS' => 'Izmeni redove',
  'LBL_EDIT_COLUMNS' => 'Izmeni kolone',
  'LBL_EDIT_LABELS' => 'Izmeni labele',
  'LBL_EDIT_FIELDS' => 'Izmeni prilagođena polja',
  'LBL_ADD_FIELDS' => 'Dodaj prilagođena polja',
  'LBL_DISPLAY_HTML' => 'Prikaži HTML kod',
  'LBL_SELECT_FILE' => 'Izaberi fajl',
  'LBL_SAVE_LAYOUT' => 'Sačuvaj raspored',
  'LBL_SELECT_A_SUBPANEL' => 'Izaberi podpanel',
  'LBL_SELECT_SUBPANEL' => 'Izaberi podpanel',
  'LBL_TOOLBOX' => 'Set alata',
  'LBL_STAGING_AREA' => 'Oblast za postavljanje (prevucite i spustite elemente ovde)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Sugar polja (kliknite na elemente da bi ih dodali u oblast za postavljanje)',
  'LBL_SUGAR_BIN_STAGE' => 'Sugar bin (kliknite na elemente koje želite da dodate u oblast za postavljanje)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Pregled Sugar polja',
  'LBL_VIEW_SUGAR_BIN' => 'Pregled Sugar bin-a',
  'LBL_FAILED_TO_SAVE' => 'Greška pri snimanju',
  'LBL_CONFIRM_UNSAVE' => 'Promene neće biti sačuvane. Da li želite da nastavite?',
  'LBL_PUBLISHING' => 'Objavljivanje...',
  'LBL_PUBLISHED' => 'Objavljen',
  'LBL_FAILED_PUBLISHED' => 'Objavljivanje nije uspelo',
  'LBL_DROP_HERE' => '[Spusti ovde]',
  'LBL_NAME' => 'Naziv',
  'LBL_LABEL' => 'Labela',
  'LBL_MASS_UPDATE' => 'Masovno ažuriranje',
  'LBL_AUDITED' => 'Praćenje promena',
  'LBL_CUSTOM_MODULE' => 'Modul',
  'LBL_DEFAULT_VALUE' => 'Podrazumevana vrednost',
  'LBL_REQUIRED' => 'Obavezno',
  'LBL_DATA_TYPE' => 'Tip',
  'LBL_HISTORY' => 'Istorija',
  'LBL_SW_WELCOME' => '<h2>Dobrodošli u Studio!</h2><br> Šta želite danas da radite?<br><b> Molim, izaberite iz opcija ispod.</b>',
  'LBL_SW_EDIT_MODULE' => 'Izmeni modul',
  'LBL_SW_EDIT_DROPDOWNS' => 'Izmeni padajuće liste',
  'LBL_SW_EDIT_TABS' => 'Konfiguriši kartice',
  'LBL_SW_RENAME_TABS' => 'Konfiguriši kartice',
  'LBL_SW_EDIT_GROUPTABS' => 'Konfiguriši grupne kartice',
  'LBL_SW_EDIT_PORTAL' => 'Izmeni portal',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Popravi prilagođena polja',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Premesti prilagođena polja',
  'LBL_SMW_WELCOME' => '<h2>Dobrodošli u Studio!</h2><br><b>Molimo, izaberite neki modul od ponuđenih.</b>',
  'LBL_SMA_WELCOME' => '<h2>Izmeni modul</h2><b>Šta želite da radite sa modulom?<br>Molim, izaberite koje akcije želite da preduzmete.</b>',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Izmeni prolagođena polja',
  'LBL_SMA_EDIT_LAYOUT' => 'Izmeni izgled',
  'LBL_SMA_EDIT_LABELS' => 'Izmeni labele',
  'LBL_MB_PREVIEW' => 'Pregled',
  'LBL_MB_RESTORE' => 'Obnovi',
  'LBL_MB_DELETE' => 'Obriši',
  'LBL_MB_COMPARE' => 'Uporedi',
  'LBL_MB_WELCOME' => '<h2>Istorija</h2><br>Istorija Vam omogućava da pregledate prethodno raspoređenja izdanja fajla na kome trenutno radite. Možete da uporedite i obnovite prethodne verzije. Ako obnovite fajl on će postati fajl na kome radite. Morate ga rasporediti ga pre nego što postane vidljiv za ostale. <br> Šta želite danas da radite?<br><b> Molim da izaberete jednu od ponuđenih opcija.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Kreiraj padajuću listu',
  'LBL_ED_WELCOME' => '<h2>Editor padajućih listi</h2><br><b>Možete ili da izmenite postojeću padajuću listu ili da kreirate novu.',
  'LBL_DROPDOWN_NAME' => 'Naziv padajuće liste:',
  'LBL_DROPDOWN_LANGUAGE' => 'Jezik padajuće liste:',
  'LBL_TABGROUP_LANGUAGE' => 'Jezik:',
  'LBL_EC_WELCOME' => '<h2>Editor prilagođenog polja</h2><br><b>Možete ili da pregledate i izmenite postojeće prilagođeno polje, kreirate novo prilagođeno polje ili obrišete keš prilagođenog polja.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Pregled prilagođenih polja',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Kreiraj prilagođeno polje',
  'LBL_EC_CLEAR_CACHE' => 'Obriši keš',
  'LBL_SM_WELCOME' => '<h2>Istorija</h2><br><b>Molim, odaberite fajl koji želite da pregledate.</b>',
  'LBL_DD_DISPALYVALUE' => 'Vredost prikaza',
  'LBL_DD_DATABASEVALUE' => 'Vrenost baze',
  'LBL_DD_ALL' => 'Svi',
  'LBL_BTN_SAVE' => 'Sačuvaj',
  'LBL_BTN_SAVEPUBLISH' => 'Sačuvaj i rasporedi',
  'LBL_BTN_HISTORY' => 'Istorija',
  'LBL_BTN_NEXT' => 'Sledeći',
  'LBL_BTN_BACK' => 'Nazad',
  'LBL_BTN_ADDCOLS' => 'Dodaj kolone',
  'LBL_BTN_ADDROWS' => 'Dodaj redove',
  'LBL_BTN_UNDO' => 'Poništi',
  'LBL_BTN_REDO' => 'Vrati poništeno',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Dodaj prilagođeno polje',
  'LBL_BTN_TABINDEX' => 'Izmeni redosled kartica',
  'LBL_TAB_SUBTABS' => 'Podkartice',
  'LBL_MODULES' => 'Moduli',
  'LBL_MODULE_NAME' => 'Administracija',
  'LBL_CONFIGURE_GROUP_TABS' => 'Konfiguriši grupne module',
  'LBL_GROUP_TAB_WELCOME' => 'Grupe ispod će biti prikazane u delu za navigaciju za korisnike koji su odabrali da vide grupne module. Prevuci i spusti module u i iz grupa da bi ste konfigurisali koji moduli će da se pojavljuju pod grupama. Napomena: Prazne grupe se neće prikazivati u delu za navigaciju.',
  'LBL_RENAME_TAB_WELCOME' => 'U tabeli ispod kliknite na bilo koju prikazanu vrednost kartice da bi promenili naziv kartice.',
  'LBL_DELETE_MODULE' => 'Ukloni modul <br />iz grupe',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Izaberite da prikažete "Drugu" karticu u navigacionom delu. Po podrazumevanom, "Druga" kartica prikazuje one module koji nisu uključeni u druge grupe.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Odaberite dostupni jezik, izmenite labele grupe i kliknite na Sačuvaj i rasporedi da bi ste primenili na labele u odabranom jeziku.',
  'LBL_ADD_GROUP' => 'Dodaj grupu',
  'LBL_NEW_GROUP' => 'Nova grupa',
  'LBL_RENAME_TABS' => 'Promeni ime kartice',
  'LBL_DISPLAY_OTHER_TAB' => 'Prikaži &#39;Drugu&#39; karticu',
  'LBL_DEFAULT' => 'Podrazumevano',
  'LBL_ADDITIONAL' => 'Dodatno',
  'LBL_AVAILABLE' => 'Dostupno',
  'LBL_LISTVIEW_DESCRIPTION' => 'Ispod su prikazane tri kolone. Podrazumevana kolona sadrži polja koja su prikazana u listi pregleda kao podrazumevana, dodatna kolona sadrži polja koja korisnik može da izabere da koristi za kreiranje prilagođenog izgleda i dostupne kolone sadrže kolone koje su na raspolaganju da ih koristi administrator da ih doda u podrazumevanu ili dodatnu kolonu za korišćenje korisnicima ali se te kolone trenutno ne koriste.',
  'LBL_LISTVIEW_EDIT' => 'Editor pregleda u vidu liste',
  'ERROR_ALREADY_EXISTS' => 'Greška: Polje već postoji',
  'ERROR_INVALID_KEY_VALUE' => 'Greška: Neispravna vrednost ključa: [&#39;]',
  'LBL_SMP_WELCOME' => 'Molim izaberite modul koji želite da izmenite iz liste ispod',
  'LBL_SP_WELCOME' => 'Dobrodošli u Studio za Sugar portal. Možete ili da izaberete da ovde izmenite module ili sinhronizujete sa instancom portala. Molim izaberite iz liste ispod.',
  'LBL_SP_SYNC' => 'Sinhronizacija portala',
  'LBL_SYNCP_WELCOME' => 'Molim, unesite URL portala koji želite da ažurirate a onda pritisnite dugme Idi.<br> Tako će Vam se pojaviti prompt da unesete Vaše korisničko ime i lozinku.<br>Molimo, unesite Vaše korisničko ime i lozinku za Sugar a onda pritisnite dugme Počni sinhronizaciju.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Ispod postoje dve kolone: Podrazumevana sa poljima koji će biti prikazani i Dostupna sa poljima koji nisu prikazani, ali su dostupni da mogu da se prikažu. Samo prevucite polja između kolona. Možete da menjate raspored elemenata u koloni prevlačenjem i spuštanjem.',
  'LBL_SP_STYLESHEET' => 'Uvezi Opis stila',
  'LBL_SP_UPLOADSTYLE' => 'Kliknite na dugme pretraži i izaberite opis stila koji želite da uvezete na Vaš računar.<br> Sledeći put kada se sinhronizujete sa portalom pojaviće se i novi stil.',
  'LBL_SP_UPLOADED' => 'Uveženo',
  'ERROR_SP_UPLOADED' => 'Molim proverite da uvozite css opis stila.',
  'LBL_SP_PREVIEW' => 'Ovo je prikaz kako će  izgledati Vaš stil',
);


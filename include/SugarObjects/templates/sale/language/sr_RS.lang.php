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
  'LBL_MODULE_NAME' => 'Prodaja',
  'LBL_MODULE_TITLE' => 'Prodaja: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga prodaje',
  'LBL_VIEW_FORM_TITLE' => 'Pregled prodaje',
  'LBL_LIST_FORM_TITLE' => 'Lista prodaje',
  'LBL_SALE_NAME' => 'Naziv prodaje:',
  'LBL_SALE' => 'Prodaja:',
  'LBL_NAME' => 'Naziv prodaje:',
  'LBL_LIST_SALE_NAME' => 'Naziv',
  'LBL_LIST_ACCOUNT_NAME' => 'Naziv kompanije',
  'LBL_LIST_AMOUNT' => 'Iznos',
  'LBL_LIST_DATE_CLOSED' => 'Zatvori',
  'LBL_LIST_SALE_STAGE' => 'Faza prodaje',
  'LBL_ACCOUNT_ID' => 'ID broj kompanije',
  'LBL_CURRENCY_ID' => 'ID broj valute',
  'LBL_TEAM_ID' => 'ID broj tima',
  'UPDATE' => 'Prodaja - Ažuriranje valute',
  'UPDATE_DOLLARAMOUNTS' => 'Ažuriraj iznose Američkih dolara',
  'UPDATE_VERIFY' => 'Proveri iznose',
  'UPDATE_VERIFY_TXT' => 'Proverava da li je vrednost prodajne prilike ispravan decimalni broj koji sadrži samo numeričke karaktere (0-9) i decimale (.)',
  'UPDATE_FIX' => 'Ispravi iznose',
  'UPDATE_FIX_TXT' => 'Pokušava da ispravi pogrešne iznose, kreirajući ispravan decimalni broj od unesene količine. Svaki izmenjeni broj je sačuvan u bazi amount_backup. Ako se prilikom ove funkcije dogodi greška, ne pokušavajte ponovo da pokrenete bez povraćaja podataka iz rezervne pošto bi mogli da napravite novu rezervnu kopiju u koju bi se upisali novi nevažeći podaci.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Ažuriraj iznos Američkih dolara za prodajne prilike koje su zasnovane na tekućem kursu valute. Ova vrednost se koristi za proračunavanje grafika i pregleda kursne liste.',
  'UPDATE_CREATE_CURRENCY' => 'Kreiranje nove valute:',
  'UPDATE_VERIFY_FAIL' => 'Neuspela verifikacija zapisa:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Trenutni iznos:',
  'UPDATE_VERIFY_FIX' => 'Pokretanje popravke daće',
  'UPDATE_INCLUDE_CLOSE' => 'Uključujući zatvorene zapise',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Novi iznos:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nova valuta:',
  'UPDATE_DONE' => 'Završeno',
  'UPDATE_BUG_COUNT' => 'Defekti koji su pronađeni i za koje će se tražiti rešenje:',
  'UPDATE_BUGFOUND_COUNT' => 'Nađeni defekti:',
  'UPDATE_COUNT' => 'Ažurirani zapisi:',
  'UPDATE_RESTORE_COUNT' => 'Obnovljeni iznosi zapisa:',
  'UPDATE_RESTORE' => 'Obnovi iznose',
  'UPDATE_RESTORE_TXT' => 'Rekonstruše vrednost iz rezervne kopije koja je kreirana tokom popravke.',
  'UPDATE_FAIL' => 'Ne mogu da ažuriram -',
  'UPDATE_NULL_VALUE' => 'Vrednost je NULL i biće postavljena na 0 -',
  'UPDATE_MERGE' => 'Spajanje valuta',
  'UPDATE_MERGE_TXT' => 'Svedi više valuta na jednu valutu. Ako postoji više zapisa valute za istu valutu, spoji zapise u jedan. Ovo će takođe svesti valute za sve ostale module.',
  'LBL_ACCOUNT_NAME' => 'Naziv kompanije:',
  'LBL_AMOUNT' => 'Iznos:',
  'LBL_AMOUNT_USDOLLAR' => 'Iznos Američki dolar:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Očekivani datum zatvaranja:',
  'LBL_TYPE' => 'Tip:',
  'LBL_CAMPAIGN' => 'Kampanja:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Potencijalni klijenti',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekti',
  'LBL_NEXT_STEP' => 'Sledeći korak:',
  'LBL_LEAD_SOURCE' => 'Izvor potencijalnog klijenta:',
  'LBL_SALES_STAGE' => 'Faza prodaje:',
  'LBL_PROBABILITY' => 'Verovatnoća (%):',
  'LBL_DESCRIPTION' => 'Opis:',
  'LBL_DUPLICATE' => 'Mogući dupla prodaja',
  'MSG_DUPLICATE' => 'Prodaja koju želite da kreirate možda je duplikat prodaje koja već postoji. Prodaje koje sadrže slična imena izlistane su ispod.<br>Kliknite Sačuvaj da bi nastavili sa kreiranjem ove nove prodaje, ili kliknite Otkaži da bi se vratili u modul bez kreiranje prodaje.',
  'LBL_NEW_FORM_TITLE' => 'Kreiraj prodaju',
  'LNK_NEW_SALE' => 'Kreiraj prodaju',
  'LNK_SALE_LIST' => 'Prodaja',
  'ERR_DELETE_RECORD' => 'Morate navesti odgovarajući broj zapisa da bi obrisali prodaju.',
  'LBL_TOP_SALES' => 'Moje najbolje započete prodaje',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'a li ste sigurni da želite da uklonite ovaj kontakt iz prodaje?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Da li ste sigurni da želite da uklonite ovu prodaju iz projekta?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Prodaja',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivnosti',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istorija',
  'LBL_RAW_AMOUNT' => 'Neobrađen iznos',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakti',
  'LBL_ASSIGNED_TO_NAME' => 'Korisnik:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Dodeljeni korisnik:',
  'LBL_MY_CLOSED_SALES' => 'Moje završene prodaje',
  'LBL_TOTAL_SALES' => 'Ukupna prodaja',
  'LBL_CLOSED_WON_SALES' => 'Prodaje završene dobitkom',
  'LBL_ASSIGNED_TO_ID' => 'ID dodeljenog korisnika',
  'LBL_CREATED_ID' => 'ID broj autora',
  'LBL_MODIFIED_ID' => 'ID broj korisnika koji je promenio',
  'LBL_MODIFIED_NAME' => 'Ime korisnika koji je promenio',
  'LBL_SALE_INFORMATION' => 'Informacije o prodaji',
  'LBL_CURRENCY_NAME' => 'Ime valute',
  'LBL_CURRENCY_SYMBOL' => 'Simbol valute',
);


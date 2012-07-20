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
  'LBL_LIST_STATUS' => 'Status',
  'LBL_STATUS' => 'Status:',
  'LBL_MODULE_NAME' => 'Proizvodi',
  'LBL_MODULE_TITLE' => 'Proizvodi: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga proizvoda',
  'LBL_LIST_FORM_TITLE' => 'Lista proizvoda',
  'LBL_NEW_FORM_TITLE' => 'Kreiraj proizvod',
  'LBL_PRODUCT' => 'Proizvod:',
  'LBL_RELATED_PRODUCTS' => 'Povezani proizvodi',
  'LBL_LIST_NAME' => 'Proizvod',
  'LBL_LIST_MANUFACTURER' => 'Proizvođač',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Broj dela proizvođača',
  'LBL_LIST_QUANTITY' => 'Količina',
  'LBL_LIST_COST_PRICE' => 'Trošak',
  'LBL_LIST_DISCOUNT_PRICE' => 'Cena',
  'LBL_LIST_LIST_PRICE' => 'Cena',
  'LBL_LIST_ACCOUNT_NAME' => 'Naziv kompanije:',
  'LBL_LIST_CONTACT_NAME' => 'Ime kontakta:',
  'LBL_LIST_QUOTE_NAME' => 'Naziv ponude',
  'LBL_LIST_DATE_PURCHASED' => 'Kupljeno',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Ističe',
  'LBL_NAME' => 'Proizvod:',
  'LBL_URL' => 'URL proizvoda:',
  'LBL_QUOTE_NAME' => 'Naziv ponude:',
  'LBL_CONTACT_NAME' => 'Ime kontakta:',
  'LBL_DATE_PURCHASED' => 'Kupljeno:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Podrška ističe:',
  'LBL_DATE_SUPPORT_STARTS' => 'Podrška počinje:',
  'LBL_COST_PRICE' => 'Trošak:',
  'LBL_DISCOUNT_PRICE' => 'Jedinična cena:',
  'LBL_DEAL_TOT' => 'Popust:',
  'LBL_DISCOUNT_RATE' => 'Stopa popusta',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Stopa popusta (Američki dolar)',
  'LBL_DISCOUNT_TOTAL' => 'Ukupan popust',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Popust (Američki dolar)',
  'LBL_SELECT_DISCOUNT' => 'Popust u %',
  'LBL_LIST_PRICE' => 'Cena:',
  'LBL_VENDOR_PART_NUM' => 'Broj dela prodavca:',
  'LBL_MFT_PART_NUM' => 'Broj dela proizvođača:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Datum cene sa popustom:',
  'LBL_WEIGHT' => 'Težina:',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_TYPE' => 'Tip:',
  'LBL_CATEGORY' => 'Kategorija:',
  'LBL_QUANTITY' => 'Količina:',
  'LBL_TAX_CLASS' => 'Poreska stopa:',
  'LBL_MANUFACTURER' => 'Proizvođač:',
  'LBL_SUPPORT_DESCRIPTION' => 'Opis podrške:',
  'LBL_SUPPORT_TERM' => 'Uslovi podrške:',
  'LBL_SUPPORT_NAME' => 'Naziv podrške:',
  'LBL_SUPPORT_CONTACT' => 'Kontakt za podršku:',
  'LBL_PRICING_FORMULA' => 'Cenovna formula:',
  'LBL_ACCOUNT_NAME' => 'Naziv kompanije:',
  'LNK_PRODUCT_LIST' => 'Pregledaj proizvode',
  'LNK_NEW_PRODUCT' => 'Kreiraj proizvod',
  'NTC_DELETE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovaj zapis?',
  'NTC_REMOVE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovu vezu proizvoda?',
  'ERR_DELETE_RECORD' => 'Morate navesti broj zapisa da bi obrisali proizvod.',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_ASSET_NUMBER' => 'Broj sredstva:',
  'LBL_SERIAL_NUMBER' => 'Serijski broj:',
  'LBL_BOOK_VALUE' => 'Knjigovodstvena vrednost',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Knjigovodstvena vrednost (Američki dolar)',
  'LBL_BOOK_VALUE_DATE' => 'Datum knjigovodstvene vrednosti',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Proizvodi',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Povezani proizvodi',
  'LBL_WEBSITE' => 'Web stranica',
  'LBL_COST_USDOLLAR' => 'Cena (Američki dolar)',
  'LBL_DISCOUNT_USDOLLAR' => 'Jedinična cena (Američki dolar)',
  'LBL_LIST_USDOLLAR' => 'Cena (Američki dolar)',
  'LBL_PRICING_FACTOR' => 'Cenovni faktor',
  'LBL_ACCOUNT_ID' => 'ID broj kompanije:',
  'LBL_CONTACT_ID' => 'ID broj kontakta:',
  'LBL_CATEGORY_NAME' => 'Naziv kategorije:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Beleške',
  'LBL_MEMBER_OF' => 'Član:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekti',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumenta',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Ugovori',
  'LBL_CONTRACTS' => 'Ugovori',
  'LBL_PRODUCT_CATEGORIES' => 'Kategorije proizvoda',
  'LBL_PRODUCT_TYPES' => 'Tipovi proizvoda',
  'LBL_ASSIGNED_TO_NAME' => 'Dodeljeno',
  'LBL_PRODUCT_TEMPLATE_ID' => 'ID broj šablona proizvoda:',
  'LBL_QUOTE_ID' => 'ID broj ponude:',
  'LBL_CREATED_USER' => 'Kreirao',
  'LBL_MODIFIED_USER' => 'Promenio',
  'LBL_QUOTE' => 'Ponuda',
  'LBL_CONTACT' => 'Kontakt',
  'LBL_DISCOUNT_AMOUNT' => 'Iznos popusta:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Simbol valute',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Proizvodi',
  'LNK_IMPORT_PRODUCTS' => 'Uvezi proizvode',
);


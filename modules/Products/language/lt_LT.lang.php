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
  'LBL_MODULE_NAME' => 'Prekės',
  'LBL_MODULE_TITLE' => 'Prekės: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Prekės paieška',
  'LBL_LIST_FORM_TITLE' => 'Prekių sąrašas',
  'LBL_NEW_FORM_TITLE' => 'Sukurti prekę',
  'LBL_PRODUCT' => 'Prekė:',
  'LBL_RELATED_PRODUCTS' => 'Susijusios prekės',
  'LBL_LIST_NAME' => 'Prekė',
  'LBL_LIST_MANUFACTURER' => 'Gamintojas',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Gamintojo Nr',
  'LBL_LIST_QUANTITY' => 'Kiekis',
  'LBL_LIST_COST_PRICE' => 'Savikaina',
  'LBL_LIST_DISCOUNT_PRICE' => 'Kaina',
  'LBL_LIST_LIST_PRICE' => 'Rekomenduojama',
  'LBL_LIST_STATUS' => 'Statusas',
  'LBL_LIST_ACCOUNT_NAME' => 'Klientas',
  'LBL_LIST_CONTACT_NAME' => 'Kontaktas',
  'LBL_LIST_QUOTE_NAME' => 'Pasiūlymas',
  'LBL_LIST_DATE_PURCHASED' => 'Nupirktas',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Pasibaigia',
  'LBL_NAME' => 'Prekė:',
  'LBL_URL' => 'Prekės nuoroda:',
  'LBL_QUOTE_NAME' => 'Pasiūlymas:',
  'LBL_CONTACT_NAME' => 'Kontaktas:',
  'LBL_DATE_PURCHASED' => 'Nupirktas:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Garantinis baigiasi:',
  'LBL_DATE_SUPPORT_STARTS' => 'Garantinis prasideda:',
  'LBL_COST_PRICE' => 'Savikaina:',
  'LBL_DISCOUNT_PRICE' => 'Vieneto kaina:',
  'LBL_DEAL_TOT' => 'Nuolaida:',
  'LBL_DISCOUNT_RATE' => 'Nuolaida',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Nuolaida (Lt)',
  'LBL_DISCOUNT_TOTAL' => 'Viso nuolaida',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Nuolaida (Lt)',
  'LBL_SELECT_DISCOUNT' => 'Nuolaida procentais',
  'LBL_LIST_PRICE' => 'Rekomenduojama kaina:',
  'LBL_VENDOR_PART_NUM' => 'Tiekėjo prekės Nr:',
  'LBL_MFT_PART_NUM' => 'Gamintojo prekės Nr:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Nuolaidos data:',
  'LBL_WEIGHT' => 'Svoris:',
  'LBL_DESCRIPTION' => 'Aprašymas:',
  'LBL_TYPE' => 'Tipas:',
  'LBL_CATEGORY' => 'Kategorija:',
  'LBL_QUANTITY' => 'Kiekis:',
  'LBL_STATUS' => 'Statusas:',
  'LBL_TAX_CLASS' => 'Apmokestinimas:',
  'LBL_MANUFACTURER' => 'Gamintojas:',
  'LBL_SUPPORT_DESCRIPTION' => 'Garantinio aptarnavimo aprašymas:',
  'LBL_SUPPORT_TERM' => 'Garantinis laikotarpis:',
  'LBL_SUPPORT_NAME' => 'Garantinio pavadinimas:',
  'LBL_SUPPORT_CONTACT' => 'Garantinio kontaktas:',
  'LBL_PRICING_FORMULA' => 'Įkainavimo formulė:',
  'LBL_ACCOUNT_NAME' => 'Klientas:',
  'LNK_PRODUCT_LIST' => 'Prekės',
  'LNK_NEW_PRODUCT' => 'Sukurti prekę',
  'NTC_DELETE_CONFIRMATION' => 'Ar Jūs tikrai norite šį įrašą?',
  'NTC_REMOVE_CONFIRMATION' => 'Ar Jūs tikrai norite panaikinti šios prekės ryšį?',
  'ERR_DELETE_RECORD' => 'Norint ištrinti prekę, turi būti pasirinktas įrašas.',
  'LBL_CURRENCY' => 'Valiuta:',
  'LBL_ASSET_NUMBER' => 'Sandėlio prekės Nr:',
  'LBL_SERIAL_NUMBER' => 'Prekės Nr:',
  'LBL_BOOK_VALUE' => 'Užsakymo suma:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Užsakymo suma (Lt):',
  'LBL_BOOK_VALUE_DATE' => 'Užsakymo data:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Prekės',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Susijusios prekės',
  'LBL_WEBSITE' => 'Tinklapis',
  'LBL_COST_USDOLLAR' => 'Savikaina (Lt)',
  'LBL_DISCOUNT_USDOLLAR' => 'Vieneto kaina (Lt)',
  'LBL_LIST_USDOLLAR' => 'Rekomenduojama kaina (Lt)',
  'LBL_PRICING_FACTOR' => 'Kainos faktorius',
  'LBL_ACCOUNT_ID' => 'Kliento ID',
  'LBL_CONTACT_ID' => 'Kontakto ID',
  'LBL_CATEGORY_NAME' => 'Kategorijos pavadinimas:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Užrašai',
  'LBL_MEMBER_OF' => 'Narys:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projektai',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumentai',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Sutartys',
  'LBL_CONTRACTS' => 'Sutartys',
  'LBL_PRODUCT_CATEGORIES' => 'Prekės kategorijos',
  'LBL_PRODUCT_TYPES' => 'Prekės tipai',
  'LBL_ASSIGNED_TO_NAME' => 'Atsakingas:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'Prekės šablono ID:',
  'LBL_QUOTE_ID' => 'Pasiūlymo ID',
  'LBL_CREATED_USER' => 'Sukūrė',
  'LBL_MODIFIED_USER' => 'Redagavo',
  'LBL_QUOTE' => 'Pasiūlymas',
  'LBL_CONTACT' => 'Kontaktas',
  'LBL_DISCOUNT_AMOUNT' => 'Nuolaidos suma',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Valiutos pavadinimas',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Prekės',
  'LNK_IMPORT_PRODUCTS' => 'Importuoti prekes',
);


<?php

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





if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


	
$mod_strings = array (
  'LBL_DEAL_TOT' => 'Rabatt:',
  'LBL_DISCOUNT_RATE' => 'Rabatt kurs',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Rabatt kurs (US dollar)',
  'LBL_DISCOUNT_TOTAL' => 'Rabatt totalt:',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Rabatt (US Dollar)',
  'LBL_SELECT_DISCOUNT' => 'Rabatt i %',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Bokat värde (US Dollar',
  'LBL_PRODUCT_TEMPLATE_ID' => 'Produkt mall ID:',
  'LBL_QUOTE_ID' => 'Offert ID:',
  'LBL_CREATED_USER' => 'Skapad användare',
  'LBL_MODIFIED_USER' => 'Ändrad användare',
  'LBL_QUOTE' => 'Offert',
  'LBL_CONTACT' => 'Kontakt',
  'LBL_DISCOUNT_AMOUNT' => 'Rabatt belopp',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Valutasymbol:',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produkter',
  'LNK_IMPORT_PRODUCTS' => 'Importera produkter',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_STATUS' => 'Status:',
  'LBL_MODULE_NAME' => 'Produkter',
  'LBL_MODULE_TITLE' => 'Produkter: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök produkt',
  'LBL_LIST_FORM_TITLE' => 'Lista produkt',
  'LBL_NEW_FORM_TITLE' => 'Skapa produkt',
  'LBL_PRODUCT' => 'Produkt:',
  'LBL_RELATED_PRODUCTS' => 'Relaterade produkter',
  'LBL_LIST_NAME' => 'Produkt',
  'LBL_LIST_MANUFACTURER' => 'Tillverkare',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Tillverkningsnummer',
  'LBL_LIST_QUANTITY' => 'Kvantitet',
  'LBL_LIST_COST_PRICE' => 'Kostnad',
  'LBL_LIST_DISCOUNT_PRICE' => 'Pris',
  'LBL_LIST_LIST_PRICE' => 'Lista',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisationsnamn',
  'LBL_LIST_CONTACT_NAME' => 'Kontaktnamn',
  'LBL_LIST_QUOTE_NAME' => 'Offertnamn',
  'LBL_LIST_DATE_PURCHASED' => 'Köpt',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Utgår',
  'LBL_NAME' => 'Produkt:',
  'LBL_URL' => 'Produkt URL:',
  'LBL_QUOTE_NAME' => 'Offertnamn:',
  'LBL_CONTACT_NAME' => 'Kontaktnamn:',
  'LBL_DATE_PURCHASED' => 'Köpt:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Support upphör:',
  'LBL_DATE_SUPPORT_STARTS' => 'Supporten startar:',
  'LBL_COST_PRICE' => 'Kostnad',
  'LBL_DISCOUNT_PRICE' => 'Enhetspris:',
  'LBL_LIST_PRICE' => 'Listpris:',
  'LBL_VENDOR_PART_NUM' => 'Leverantörens artikelnummer:',
  'LBL_MFT_PART_NUM' => 'Tillverkarens artikelnummer:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Datum för rabatterat pris:',
  'LBL_WEIGHT' => 'Vikt:',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_TYPE' => 'Typ:',
  'LBL_CATEGORY' => 'Kategori:',
  'LBL_QUANTITY' => 'Kvantitet:',
  'LBL_TAX_CLASS' => 'Momsklass:',
  'LBL_MANUFACTURER' => 'Tillverkare:',
  'LBL_SUPPORT_DESCRIPTION' => 'Support beskrivning:',
  'LBL_SUPPORT_TERM' => 'Supportteam:',
  'LBL_SUPPORT_NAME' => 'Supporttitel:',
  'LBL_SUPPORT_CONTACT' => 'Support kontakt:',
  'LBL_PRICING_FORMULA' => 'Prisberäkningsformel:',
  'LBL_ACCOUNT_NAME' => 'Organisationsnamn:',
  'LNK_PRODUCT_LIST' => 'Produkter',
  'LNK_NEW_PRODUCT' => 'Skapa produkt',
  'NTC_DELETE_CONFIRMATION' => 'Är du säker på att du vill radera posten?',
  'NTC_REMOVE_CONFIRMATION' => 'Är du säker på att du vill ta bort produktens relationer?',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att radera produkten.',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_ASSET_NUMBER' => 'Inventarienummer:',
  'LBL_SERIAL_NUMBER' => 'Serienummer:',
  'LBL_BOOK_VALUE' => 'Bokfört värde:',
  'LBL_BOOK_VALUE_DATE' => 'Datum för bokfört värde:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Produkter',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Relaterade produkter',
  'LBL_WEBSITE' => 'Webbsida',
  'LBL_COST_USDOLLAR' => 'Kostnad',
  'LBL_DISCOUNT_USDOLLAR' => 'Rabatt',
  'LBL_LIST_USDOLLAR' => 'Listpris',
  'LBL_PRICING_FACTOR' => 'Prisfaktor',
  'LBL_ACCOUNT_ID' => 'Organisations ID',
  'LBL_CONTACT_ID' => 'Kontakt ID',
  'LBL_CATEGORY_NAME' => 'Kategorinamn:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Anteckningar',
  'LBL_MEMBER_OF' => 'Medlem av:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekt',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakt',
  'LBL_CONTRACTS' => 'Kontrakt',
  'LBL_PRODUCT_CATEGORIES' => 'Produktkategorier',
  'LBL_PRODUCT_TYPES' => 'Produkttyper',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till:',
);


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
  'LBL_TYPE' => 'Type:',
  'LBL_STATUS' => 'Status:',
  'LBL_MODULE_NAME' => 'Produkter',
  'LBL_MODULE_TITLE' => 'Produkter: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter produkt',
  'LBL_LIST_FORM_TITLE' => 'Produktliste',
  'LBL_NEW_FORM_TITLE' => 'Opret produkt',
  'LBL_PRODUCT' => 'Produkt:',
  'LBL_RELATED_PRODUCTS' => 'Relaterede produkter',
  'LBL_LIST_NAME' => 'Produkt',
  'LBL_LIST_MANUFACTURER' => 'Producent',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Prod.nr.',
  'LBL_LIST_QUANTITY' => 'Mængde',
  'LBL_LIST_COST_PRICE' => 'Omkostninger',
  'LBL_LIST_DISCOUNT_PRICE' => 'Pris',
  'LBL_LIST_LIST_PRICE' => 'Liste',
  'LBL_LIST_ACCOUNT_NAME' => 'Virksomhedsnavn',
  'LBL_LIST_CONTACT_NAME' => 'Kontaktnavn',
  'LBL_LIST_QUOTE_NAME' => 'Tilbudsnavn',
  'LBL_LIST_DATE_PURCHASED' => 'Købt',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Udløber',
  'LBL_NAME' => 'Produkt:',
  'LBL_URL' => 'Produkt-URL:',
  'LBL_QUOTE_NAME' => 'Tilbudsnavn:',
  'LBL_CONTACT_NAME' => 'Kontaktnavn:',
  'LBL_DATE_PURCHASED' => 'Købt:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Support udløber:',
  'LBL_DATE_SUPPORT_STARTS' => 'Support starter:',
  'LBL_COST_PRICE' => 'Omkostninger:',
  'LBL_DISCOUNT_PRICE' => 'Enhedspris:',
  'LBL_DEAL_TOT' => 'Rabat:',
  'LBL_DISCOUNT_RATE' => 'Rabatsats',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Rabatsats i USD',
  'LBL_DISCOUNT_TOTAL' => 'Rabat i alt',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Rabat i USD',
  'LBL_SELECT_DISCOUNT' => 'Rabat i %',
  'LBL_LIST_PRICE' => 'Listepris:',
  'LBL_VENDOR_PART_NUM' => 'Leverandørs artikelnummer:',
  'LBL_MFT_PART_NUM' => 'Prod. artikelnummer:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Rabatpris, dato:',
  'LBL_WEIGHT' => 'Vægt:',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_CATEGORY' => 'Kategori:',
  'LBL_QUANTITY' => 'Mængde:',
  'LBL_TAX_CLASS' => 'Momsklasse:',
  'LBL_MANUFACTURER' => 'Producent:',
  'LBL_SUPPORT_DESCRIPTION' => 'Supportbeskr.:',
  'LBL_SUPPORT_TERM' => 'Supportvarighed:',
  'LBL_SUPPORT_NAME' => 'Supportnavn:',
  'LBL_SUPPORT_CONTACT' => 'Supportkontakt:',
  'LBL_PRICING_FORMULA' => 'Prisformel:',
  'LBL_ACCOUNT_NAME' => 'Virksomhedsnavn:',
  'LNK_PRODUCT_LIST' => 'Produkter',
  'LNK_NEW_PRODUCT' => 'Opret produkt',
  'NTC_DELETE_CONFIRMATION' => 'Er du sikker på, at du vil slette denne post?',
  'NTC_REMOVE_CONFIRMATION' => 'Er du sikker på, at du vil fjerne denne produktrelation?',
  'ERR_DELETE_RECORD' => 'Der skal angives et postnummer for at slette produktet.',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_ASSET_NUMBER' => 'Aktivnummer:',
  'LBL_SERIAL_NUMBER' => 'Serienummer:',
  'LBL_BOOK_VALUE' => 'Bogført værdi:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Bogført værdi (US Dollar):',
  'LBL_BOOK_VALUE_DATE' => 'Bogført værdi, dato:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Produkter',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Relaterede produkter',
  'LBL_WEBSITE' => 'Websted',
  'LBL_COST_USDOLLAR' => 'Omkostninger i USD:',
  'LBL_DISCOUNT_USDOLLAR' => 'Enhedspris i USD:',
  'LBL_LIST_USDOLLAR' => 'Listepris i USD:',
  'LBL_PRICING_FACTOR' => 'Prisfaktor:',
  'LBL_ACCOUNT_ID' => 'Virksomheds-id',
  'LBL_CONTACT_ID' => 'Kontakt-id:',
  'LBL_CATEGORY_NAME' => 'Kategorinavn:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Noter',
  'LBL_MEMBER_OF' => 'Medlem af:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekter',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumenter',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakter',
  'LBL_CONTRACTS' => 'Kontrakter',
  'LBL_PRODUCT_CATEGORIES' => 'Produktkategorier',
  'LBL_PRODUCT_TYPES' => 'Produkttyper',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt til:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'Produktskabelon-id:',
  'LBL_QUOTE_ID' => 'Tilbuds-id',
  'LBL_CREATED_USER' => 'Oprettet bruger',
  'LBL_MODIFIED_USER' => 'Ændret bruger',
  'LBL_QUOTE' => 'Tilbud',
  'LBL_CONTACT' => 'Kontakt',
  'LBL_DISCOUNT_AMOUNT' => 'Rabatbeløb',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Navn på valutasymbol',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produkter',
  'LNK_IMPORT_PRODUCTS' => 'Importér produkter',
);


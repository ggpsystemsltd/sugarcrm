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
  'LBL_MODULE_NAME' => 'Termékek',
  'LBL_MODULE_TITLE' => 'Termékek: Főoldal',
  'LBL_SEARCH_FORM_TITLE' => 'Termékek keresése',
  'LBL_LIST_FORM_TITLE' => 'Termék lista',
  'LBL_NEW_FORM_TITLE' => 'Új termék',
  'LBL_PRODUCT' => 'Termék:',
  'LBL_RELATED_PRODUCTS' => 'Kapcsolódó termékek',
  'LBL_LIST_NAME' => 'Termék',
  'LBL_LIST_MANUFACTURER' => 'Gyártó',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Gyártó cikksz.',
  'LBL_LIST_QUANTITY' => 'Mennyiség',
  'LBL_LIST_COST_PRICE' => 'Költség',
  'LBL_LIST_DISCOUNT_PRICE' => 'Ár',
  'LBL_LIST_LIST_PRICE' => 'Lista',
  'LBL_LIST_STATUS' => 'Állapot',
  'LBL_LIST_ACCOUNT_NAME' => 'Kliensnév',
  'LBL_LIST_CONTACT_NAME' => 'Kapcsolat neve',
  'LBL_LIST_QUOTE_NAME' => 'Árajánlat neve',
  'LBL_LIST_DATE_PURCHASED' => 'Vásárolva',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Lejár',
  'LBL_NAME' => 'Termék:',
  'LBL_URL' => 'Termék URL:',
  'LBL_QUOTE_NAME' => 'Árajánlat név:',
  'LBL_CONTACT_NAME' => 'Kapcsolat neve:',
  'LBL_DATE_PURCHASED' => 'Vásárolva:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Támogatás lejár:',
  'LBL_DATE_SUPPORT_STARTS' => 'Támogatás indul:',
  'LBL_COST_PRICE' => 'Költség:',
  'LBL_DISCOUNT_PRICE' => 'Egységár:',
  'LBL_DEAL_TOT' => 'Kedvezmény:',
  'LBL_DISCOUNT_RATE' => 'Kedvezmény mértéke',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Kedvezmény % (USD)',
  'LBL_DISCOUNT_TOTAL' => 'Kedvezmény összesen',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Kedvezmény (USD)',
  'LBL_SELECT_DISCOUNT' => 'Kedvezmény  %-ban',
  'LBL_LIST_PRICE' => 'Listaár:',
  'LBL_VENDOR_PART_NUM' => 'Gyártó cikkszáma:',
  'LBL_MFT_PART_NUM' => 'Gyártó cikkszáma:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Kedvezményes ár dátuma:',
  'LBL_WEIGHT' => 'Súly:',
  'LBL_DESCRIPTION' => 'Leírás:',
  'LBL_TYPE' => 'Típus:',
  'LBL_CATEGORY' => 'Kategória:',
  'LBL_QUANTITY' => 'Mennyiség:',
  'LBL_STATUS' => 'Állapot:',
  'LBL_TAX_CLASS' => 'Áfa kulcs:',
  'LBL_MANUFACTURER' => 'Gyártó:',
  'LBL_SUPPORT_DESCRIPTION' => 'Támogatás leírása:',
  'LBL_SUPPORT_TERM' => 'Támogatás időtartama:',
  'LBL_SUPPORT_NAME' => 'Támogatás megnevezése:',
  'LBL_SUPPORT_CONTACT' => 'Támogatás kapcsolata:',
  'LBL_PRICING_FORMULA' => 'Árképzési forma:',
  'LBL_ACCOUNT_NAME' => 'Kliensnév:',
  'LNK_PRODUCT_LIST' => 'Termékek megtekintése',
  'LNK_NEW_PRODUCT' => 'Termék hozzáadása',
  'NTC_DELETE_CONFIRMATION' => 'Biztos benne, hogy törölni kívánja ezt a rekordot?',
  'NTC_REMOVE_CONFIRMATION' => 'Biztosan el akarja távolítani ezt a terméket a kapcsolatból?',
  'ERR_DELETE_RECORD' => 'Adjon meg egy azonosítót a termék törléséhez!',
  'LBL_CURRENCY' => 'Pénznem:',
  'LBL_ASSET_NUMBER' => 'Nyereség mértéke:',
  'LBL_SERIAL_NUMBER' => 'Sorozatszám:',
  'LBL_BOOK_VALUE' => 'Könyv szerinti érték:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Könyv szerinti érték (USD):',
  'LBL_BOOK_VALUE_DATE' => 'Könyv szerinti érték dátuma:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Termékek',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Kapcsolódó termékek',
  'LBL_WEBSITE' => 'Honlap',
  'LBL_COST_USDOLLAR' => 'Költség (USD)',
  'LBL_DISCOUNT_USDOLLAR' => 'Egységár (USD)',
  'LBL_LIST_USDOLLAR' => 'Listaár (USD)',
  'LBL_PRICING_FACTOR' => 'Árképzési tényező',
  'LBL_ACCOUNT_ID' => 'Kliensazonosító:',
  'LBL_CONTACT_ID' => 'Kapcsolat azonosító:',
  'LBL_CATEGORY_NAME' => 'Kategória neve:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Feljegyzés:',
  'LBL_MEMBER_OF' => 'Tagja:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projektek',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumentumok',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Szerződések',
  'LBL_CONTRACTS' => 'Szerződések',
  'LBL_PRODUCT_CATEGORIES' => 'Termékkategória',
  'LBL_PRODUCT_TYPES' => 'Terméktípus',
  'LBL_ASSIGNED_TO_NAME' => 'Felelős:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'Terméksablon azonosító:',
  'LBL_QUOTE_ID' => 'Árajánlat azonosító:',
  'LBL_CREATED_USER' => 'Létrehozott felhasználó',
  'LBL_MODIFIED_USER' => 'Módosított felhasználó',
  'LBL_QUOTE' => 'Árajánlat',
  'LBL_CONTACT' => 'Kapcsolat',
  'LBL_DISCOUNT_AMOUNT' => 'Kedvezmény összege',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Pénznem szimbólum neve',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Termékek',
  'LNK_IMPORT_PRODUCTS' => 'Import termékek',
);


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
  'ERR_DELETE_RECORD' => 'Adjon meg egy azonosítót a termék törléséhez!',
  'LBL_ACCOUNT_NAME' => 'Cégnév:',
  'LBL_ASSIGNED_TO' => 'Felelős:',
  'LBL_ASSIGNED_TO_ID' => 'Felelős azonosító:',
  'LBL_CATEGORY_NAME' => 'Kategória neve:',
  'LBL_CATEGORY' => 'Kategória:',
  'LBL_CONTACT_NAME' => 'Kapcsolat neve:',
  'LBL_COST_PRICE' => 'Költség:',
  'LBL_COST_USDOLLAR' => 'Költség (USD):',
  'LBL_CURRENCY' => 'Pénznem:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Pénznem szimbóluma:',
  'LBL_DATE_AVAILABLE' => 'Kapható (dátum):',
  'LBL_DATE_COST_PRICE' => 'Dátum-költség-ár:',
  'LBL_DESCRIPTION' => 'Leírás:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Kedvezményes ár dátuma:',
  'LBL_DISCOUNT_PRICE' => 'Egységár:',
  'LBL_DISCOUNT_USDOLLAR' => 'Kedvezményes (USD):',
  'LBL_LIST_CATEGORY' => 'Kategória:',
  'LBL_LIST_CATEGORY_ID' => 'Kategória azonosító:',
  'LBL_LIST_COST_PRICE' => 'Költség:',
  'LBL_LIST_DISCOUNT_PRICE' => 'Egységár:',
  'LBL_LIST_FORM_TITLE' => 'Termékkatalógus lista',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Gyárt.szám',
  'LBL_LIST_LIST_PRICE' => 'Lista',
  'LBL_LIST_MANUFACTURER' => 'Gyártó',
  'LBL_LIST_MANUFACTURER_ID' => 'Gyártó azonosító:',
  'LBL_LIST_NAME' => 'Név',
  'LBL_LIST_PRICE' => 'Listaár:',
  'LBL_LIST_QTY_IN_STOCK' => 'Mennyiség',
  'LBL_LIST_STATUS' => 'Elérhetőség',
  'LBL_LIST_TYPE' => 'Típus:',
  'LBL_LIST_TYPE_ID' => 'Típus:',
  'LBL_LIST_USDOLLAR' => 'Listaár (USD):',
  'LBL_MANUFACTURER_NAME' => 'Gyártó neve:',
  'LBL_MANUFACTURER' => 'Gyártó:',
  'LBL_MFT_PART_NUM' => 'Gyártó cikkszáma:',
  'LBL_MODULE_NAME' => 'Termékkatalógus',
  'LBL_MODULE_ID' => 'Terméksablon',
  'LBL_MODULE_TITLE' => 'Termékkatalógus: Főoldal',
  'LBL_NAME' => 'Termék neve:',
  'LBL_NEW_FORM_TITLE' => 'Termék létrehozása',
  'LBL_PERCENTAGE' => 'Százalék (%):',
  'LBL_POINTS' => 'Pontok',
  'LBL_PRICING_FORMULA' => 'Alapértelmezett árképzési forma:',
  'LBL_PRICING_FACTOR' => 'Árképzési tényező:',
  'LBL_PRODUCT' => 'Termék:',
  'LBL_PRODUCT_ID' => 'Termék azonosító:',
  'LBL_QUANTITY' => 'Raktármennyiség:',
  'LBL_RELATED_PRODUCTS' => 'Kapcsolódó termék',
  'LBL_SEARCH_FORM_TITLE' => 'Termékkatalógus keresés',
  'LBL_STATUS' => 'Elérhetőség:',
  'LBL_SUPPORT_CONTACT' => 'Támogatás kapcsolat:',
  'LBL_SUPPORT_DESCRIPTION' => 'Támogatás leírása:',
  'LBL_SUPPORT_NAME' => 'Támogatás neve:',
  'LBL_SUPPORT_TERM' => 'Támogatás időtartama:',
  'LBL_TAX_CLASS' => 'Áfa kulcs:',
  'LBL_TYPE_NAME' => 'Típus név',
  'LBL_TYPE' => 'Típus',
  'LBL_URL' => 'Termék URL:',
  'LBL_VENDOR_PART_NUM' => 'Forgalmazó cikkszáma:',
  'LBL_WEIGHT' => 'Súly:',
  'LNK_IMPORT_PRODUCTS' => 'Termékek importálása',
  'LNK_NEW_MANUFACTURER' => 'Gyártók',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Termékkategóriák',
  'LNK_NEW_PRODUCT_TYPE' => 'Terméktípus',
  'LNK_NEW_PRODUCT' => 'Termék létrehozása a katalógusban',
  'LNK_NEW_SHIPPER' => 'Szállítók',
  'LNK_PRODUCT_LIST' => 'Termékkatalógus megtekintése',
  'NTC_DELETE_CONFIRMATION' => 'Biztos benne, hogy törölni kívánja ezt rekordot?',
);


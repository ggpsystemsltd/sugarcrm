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
  'LBL_LIST_COST_PRICE' => 'Cost',
  'LBL_COST_PRICE' => 'Cost:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Notes',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documents',
  'LBL_MODULE_NAME' => 'Productes',
  'LBL_MODULE_TITLE' => 'Productes: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Productes',
  'LBL_LIST_FORM_TITLE' => 'Llista de Productes',
  'LBL_NEW_FORM_TITLE' => 'Crear Producte',
  'LBL_PRODUCT' => 'Producte:',
  'LBL_RELATED_PRODUCTS' => 'Productes Relacionats',
  'LBL_LIST_NAME' => 'Producte',
  'LBL_LIST_MANUFACTURER' => 'Proveïdor',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Nº Peça',
  'LBL_LIST_QUANTITY' => 'Quantitat',
  'LBL_LIST_DISCOUNT_PRICE' => 'Preu',
  'LBL_LIST_LIST_PRICE' => 'Preu Llista',
  'LBL_LIST_STATUS' => 'Estat',
  'LBL_LIST_ACCOUNT_NAME' => 'Nom del Compte',
  'LBL_LIST_CONTACT_NAME' => 'Nom del Contacte',
  'LBL_LIST_QUOTE_NAME' => 'Nom del Pressupost',
  'LBL_LIST_DATE_PURCHASED' => 'Comprat',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Caduca',
  'LBL_NAME' => 'Producte:',
  'LBL_URL' => 'URL Producte:',
  'LBL_QUOTE_NAME' => 'Nom del Pressupost:',
  'LBL_CONTACT_NAME' => 'Nom del Contacte:',
  'LBL_DATE_PURCHASED' => 'Comprat:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Caducitat del Suport:',
  'LBL_DATE_SUPPORT_STARTS' => 'Inici del Suport:',
  'LBL_DISCOUNT_PRICE' => 'Preu Unitari:',
  'LBL_DEAL_TOT' => 'Descompte:',
  'LBL_DISCOUNT_RATE' => 'Tarifa de Descompte',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Tarifa de Descompte (Dòlars EUA)',
  'LBL_DISCOUNT_TOTAL' => 'Descompte Total',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Descompte (Dòlars EUA)',
  'LBL_SELECT_DISCOUNT' => '% de Descompte',
  'LBL_LIST_PRICE' => 'Preu de Llista:',
  'LBL_VENDOR_PART_NUM' => 'Número de Parte del Vendedor:',
  'LBL_MFT_PART_NUM' => 'Número de Parte del Fabricant:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Data de Preu amb Descompte:',
  'LBL_WEIGHT' => 'Pes:',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_TYPE' => 'Tipus:',
  'LBL_CATEGORY' => 'Categoria:',
  'LBL_QUANTITY' => 'Quantitat:',
  'LBL_STATUS' => 'Estat:',
  'LBL_TAX_CLASS' => 'Tipus d´Impost:',
  'LBL_MANUFACTURER' => 'Fabricant:',
  'LBL_SUPPORT_DESCRIPTION' => 'Desc. del Suport:',
  'LBL_SUPPORT_TERM' => 'Términi del Suport:',
  'LBL_SUPPORT_NAME' => 'Títol del Suport:',
  'LBL_SUPPORT_CONTACT' => 'Contacte del Suport:',
  'LBL_PRICING_FORMULA' => 'Fórmula de Valoració:',
  'LBL_ACCOUNT_NAME' => 'Nom del Compte:',
  'LNK_PRODUCT_LIST' => 'Productes',
  'LNK_NEW_PRODUCT' => 'Crear Producte',
  'NTC_DELETE_CONFIRMATION' => 'Està segur que desitja eliminar aquest registre?',
  'NTC_REMOVE_CONFIRMATION' => 'Està segur que desitja treure aquesta relació entre productes?',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre per eliminar el producte.',
  'LBL_CURRENCY' => 'Moneda:',
  'LBL_ASSET_NUMBER' => 'Múmero de Actiu:',
  'LBL_SERIAL_NUMBER' => 'Número de Serie:',
  'LBL_BOOK_VALUE' => 'Valor Comptable:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Valor Comptable (Dòlars EUA)',
  'LBL_BOOK_VALUE_DATE' => 'Data del Valor Comptable:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Productes',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Productes Relacionats',
  'LBL_WEBSITE' => 'Lloc web',
  'LBL_COST_USDOLLAR' => 'Cost (Dòlars EUA)',
  'LBL_DISCOUNT_USDOLLAR' => 'Preu Unitari (Dòlars EUA)',
  'LBL_LIST_USDOLLAR' => 'Preu De Llista (Dòlars EUA)',
  'LBL_PRICING_FACTOR' => 'Factor de Valoració',
  'LBL_ACCOUNT_ID' => 'ID Compte',
  'LBL_CONTACT_ID' => 'ID Contacte',
  'LBL_CATEGORY_NAME' => 'Nom de Categoria:',
  'LBL_MEMBER_OF' => 'Membre de:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projectes',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contractes',
  'LBL_CONTRACTS' => 'Contractes',
  'LBL_PRODUCT_CATEGORIES' => 'Categories de Productes',
  'LBL_PRODUCT_TYPES' => 'Tipus de Productes',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'ID de Plantilla de Producte:',
  'LBL_QUOTE_ID' => 'ID de Pressupost',
  'LBL_CREATED_USER' => 'Usuari Creat',
  'LBL_MODIFIED_USER' => 'Usuari Modificat',
  'LBL_QUOTE' => 'Pressupost',
  'LBL_CONTACT' => 'Contacte',
  'LBL_DISCOUNT_AMOUNT' => 'Quantitat Descomptada',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Nom del Símbol de Moneda',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Productes',
  'LNK_IMPORT_PRODUCTS' => 'Importar Productes',
  'LBL_EDITLAYOUT' => 'Editar disseny',
  'LBL_EXPORT_CURRENCY_ID' => 'ID Moneda:',
);


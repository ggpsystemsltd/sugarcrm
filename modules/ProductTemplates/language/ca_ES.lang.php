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
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nom d&#39;usuari assignat',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID d&#39;usuari assignat',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificat per ID',
  'LBL_EXPORT_CREATED_BY' => 'Creat per ID',
  'LBL_TYPE_ID' => 'Tipus d&#39;ID',
  'LBL_MANUFACTURER_ID' => 'ID fabricant',
  'LBL_CATEGORY_ID' => 'ID Categoria:',
  'LBL_WEBSITE' => 'Website',
  'LBL_QTY_IN_STOCK' => 'Quantitat de stock',
  'LBL_EXPORT_CURRENCY' => 'Moneda',
  'LBL_EXPORT_CURRENCY_ID' => 'ID Moneda',
  'LBL_EXPORT_COST_PRICE' => 'Preu de cost',
  'LBL_COST_PRICE' => 'Cost:',
  'LBL_LIST_COST_PRICE' => 'Cost:',
  'LBL_MODULE_ID' => 'ProductTemplates',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre per eliminar el producte.',
  'LBL_ACCOUNT_NAME' => 'Nom del Compte:',
  'LBL_ASSIGNED_TO' => 'Assignat A:',
  'LBL_ASSIGNED_TO_ID' => 'Assignat a ID:',
  'LBL_CATEGORY_NAME' => 'Nom de Categoria:',
  'LBL_CATEGORY' => 'Categoria:',
  'LBL_CONTACT_NAME' => 'Nom del Contacte:',
  'LBL_COST_USDOLLAR' => 'Cost (Dòlars EEUU):',
  'LBL_CURRENCY' => 'Moneda:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Símbol de Moneda:',
  'LBL_DATE_AVAILABLE' => 'Data Disponibilitat:',
  'LBL_DATE_COST_PRICE' => 'Data-Cost-Preu:',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Data Descompte de Preu:',
  'LBL_DISCOUNT_PRICE' => 'Preu de Descompte:',
  'LBL_DISCOUNT_USDOLLAR' => 'Preu de Descompte (Euros):',
  'LBL_LIST_CATEGORY' => 'Categoria:',
  'LBL_LIST_CATEGORY_ID' => 'ID Categoria:',
  'LBL_LIST_DISCOUNT_PRICE' => 'Preu:',
  'LBL_LIST_FORM_TITLE' => 'Llista de Catàleg de Productes',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Núm. Fab.',
  'LBL_LIST_LIST_PRICE' => 'Llista',
  'LBL_LIST_MANUFACTURER' => 'Proveïdor',
  'LBL_LIST_MANUFACTURER_ID' => 'ID Proveïdor:',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_PRICE' => 'Preu de Llista:',
  'LBL_LIST_QTY_IN_STOCK' => 'Quant.',
  'LBL_LIST_STATUS' => 'Disponibilitat',
  'LBL_LIST_TYPE' => 'Tipus:',
  'LBL_LIST_TYPE_ID' => 'ID Tipus:',
  'LBL_LIST_USDOLLAR' => 'Llista (Euros):',
  'LBL_MANUFACTURER_NAME' => 'Nom Proveïdor:',
  'LBL_MANUFACTURER' => 'Proveïdor:',
  'LBL_MFT_PART_NUM' => 'Número Parte Fav.:',
  'LBL_MODULE_NAME' => 'Catàleg de Productes',
  'LBL_MODULE_TITLE' => 'Catàleg de Productes: Inici',
  'LBL_NAME' => 'Nom de Producte:',
  'LBL_NEW_FORM_TITLE' => 'Crear Element',
  'LBL_PERCENTAGE' => 'Porcentatge(%)',
  'LBL_POINTS' => 'Punts',
  'LBL_PRICING_FORMULA' => 'Fórmula de Valoració per Defecte:',
  'LBL_PRICING_FACTOR' => 'Factor de Valoració:',
  'LBL_PRODUCT' => 'Producte:',
  'LBL_PRODUCT_ID' => 'ID Producte:',
  'LBL_QUANTITY' => 'Quantitat en Stock:',
  'LBL_RELATED_PRODUCTS' => 'Producte Relacionat',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Catàleg de Producte',
  'LBL_STATUS' => 'Disponibilitat:',
  'LBL_SUPPORT_CONTACT' => 'Contacte del Suport:',
  'LBL_SUPPORT_DESCRIPTION' => 'Desc. del Suport:',
  'LBL_SUPPORT_NAME' => 'Nom del Suport:',
  'LBL_SUPPORT_TERM' => 'Plaç del Suport:',
  'LBL_TAX_CLASS' => 'Tipus d´Impost:',
  'LBL_TYPE_NAME' => 'Nom de Tipus',
  'LBL_TYPE' => 'Tipus:',
  'LBL_URL' => 'URL de Producte:',
  'LBL_VENDOR_PART_NUM' => 'Número de Parte del Comercial:',
  'LBL_WEIGHT' => 'Pes:',
  'LNK_IMPORT_PRODUCTS' => 'Importar Productes',
  'LNK_NEW_MANUFACTURER' => 'Proveïdors',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Categories de Producte',
  'LNK_NEW_PRODUCT_TYPE' => 'Tipus de Producte',
  'LNK_NEW_PRODUCT' => 'Crear Producte per el Catàleg',
  'LNK_NEW_SHIPPER' => 'Proveïdors de Transport',
  'LNK_PRODUCT_LIST' => 'Catàleg de Productes',
  'NTC_DELETE_CONFIRMATION' => 'Està segur que desitja eliminar aquest registre?',
);


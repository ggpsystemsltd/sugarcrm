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
  'LBL_TYPE_ID' => 'Tipo ID',
  'LBL_QTY_IN_STOCK' => 'Cantidad de productos',
  'LBL_MODULE_ID' => 'ProductTemplates',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro para eliminar el producto.',
  'LBL_ACCOUNT_NAME' => 'Nombre de Cuenta:',
  'LBL_ASSIGNED_TO' => 'Asignado A:',
  'LBL_ASSIGNED_TO_ID' => 'Asignado a ID:',
  'LBL_CATEGORY_NAME' => 'Nombre de Categoría:',
  'LBL_CATEGORY' => 'Categoría:',
  'LBL_CONTACT_NAME' => 'Nombre del Contacto:',
  'LBL_COST_PRICE' => 'Coste:',
  'LBL_COST_USDOLLAR' => 'Coste (Dólares EEUU):',
  'LBL_CURRENCY' => 'Moneda:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Símbolo de Moneda:',
  'LBL_DATE_AVAILABLE' => 'Fecha Disponibilidad:',
  'LBL_DATE_COST_PRICE' => 'Fecha-Coste-Precio:',
  'LBL_DESCRIPTION' => 'Descripción:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Fecha Descuento de Precio:',
  'LBL_DISCOUNT_PRICE' => 'Precio Unitario:',
  'LBL_DISCOUNT_USDOLLAR' => 'Precio de Descuento (Dólares EEUU):',
  'LBL_LIST_CATEGORY' => 'Categoría:',
  'LBL_LIST_CATEGORY_ID' => 'ID Categoría:',
  'LBL_LIST_COST_PRICE' => 'Coste:',
  'LBL_LIST_DISCOUNT_PRICE' => 'Precio:',
  'LBL_LIST_FORM_TITLE' => 'Lista de Catálogo de Productos',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Núm. Fab.',
  'LBL_LIST_LIST_PRICE' => 'Lista',
  'LBL_LIST_MANUFACTURER' => 'Proveedor',
  'LBL_LIST_MANUFACTURER_ID' => 'ID Proveedor:',
  'LBL_LIST_NAME' => 'Nombre',
  'LBL_LIST_PRICE' => 'Precio de Lista:',
  'LBL_LIST_QTY_IN_STOCK' => 'Cant.',
  'LBL_LIST_STATUS' => 'Disponibilidad',
  'LBL_LIST_TYPE' => 'Tipo:',
  'LBL_LIST_TYPE_ID' => 'Tipo:',
  'LBL_LIST_USDOLLAR' => 'Lista (Dólares EEUU):',
  'LBL_MANUFACTURER_NAME' => 'Nombre Proveedor:',
  'LBL_MANUFACTURER' => 'Proveedor:',
  'LBL_MFT_PART_NUM' => 'Número Parte Fav.:',
  'LBL_MODULE_NAME' => 'Catálogo de Productos',
  'LBL_MODULE_TITLE' => 'Catálogo de Productos: Inicio',
  'LBL_NAME' => 'Nombre de Producto:',
  'LBL_NEW_FORM_TITLE' => 'Crear Elemento',
  'LBL_PERCENTAGE' => 'Porcentaje(%)',
  'LBL_POINTS' => 'Puntos',
  'LBL_PRICING_FORMULA' => 'Fórmula de Valoración por Defecto:',
  'LBL_PRICING_FACTOR' => 'Factor de Valoración:',
  'LBL_PRODUCT' => 'Producto:',
  'LBL_PRODUCT_ID' => 'ID Producto:',
  'LBL_QUANTITY' => 'Cantidad en Stock:',
  'LBL_RELATED_PRODUCTS' => 'Producto Relacionado',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda de Catálogo de Producto',
  'LBL_STATUS' => 'Disponibilidad:',
  'LBL_SUPPORT_CONTACT' => 'Contacto del Soporte:',
  'LBL_SUPPORT_DESCRIPTION' => 'Desc. del Soporte:',
  'LBL_SUPPORT_NAME' => 'Nombre del Soporte:',
  'LBL_SUPPORT_TERM' => 'Plazo del Soporte:',
  'LBL_TAX_CLASS' => 'Tipo de Impuesto:',
  'LBL_TYPE_NAME' => 'Nombre de Tipo',
  'LBL_TYPE' => 'Tipo',
  'LBL_URL' => 'URL de Producto:',
  'LBL_VENDOR_PART_NUM' => 'Número de Parte del Vendedor:',
  'LBL_WEIGHT' => 'Peso:',
  'LNK_IMPORT_PRODUCTS' => 'Importar Productos',
  'LNK_NEW_MANUFACTURER' => 'Proveedores',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Categorías de Producto',
  'LNK_NEW_PRODUCT_TYPE' => 'Tipos de Producto',
  'LNK_NEW_PRODUCT' => 'Crear Producto para el Catálogo',
  'LNK_NEW_SHIPPER' => 'Proveedores de Transporte',
  'LNK_PRODUCT_LIST' => 'Ver Catálogo de Productos',
  'NTC_DELETE_CONFIRMATION' => '¿Está seguro de que desea eliminar este registro?',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Usuario asignado',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID Usuario asignado',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificado por ID',
  'LBL_EXPORT_CREATED_BY' => 'Creado por ID',
  'LBL_MANUFACTURER_ID' => 'ID Proveedor',
  'LBL_CATEGORY_ID' => 'ID Categoría',
  'LBL_WEBSITE' => 'Sitio Web',
  'LBL_EXPORT_CURRENCY' => 'Moneda',
  'LBL_EXPORT_CURRENCY_ID' => 'ID Moneda',
  'LBL_EXPORT_COST_PRICE' => 'Precio de coste',
);


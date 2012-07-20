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
  'LBL_EDITLAYOUT' => 'Editar Diseño',
  'LBL_MODULE_NAME' => 'Productos',
  'LBL_MODULE_TITLE' => 'Productos: Inicio',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda de Productos',
  'LBL_LIST_FORM_TITLE' => 'Lista de Productos',
  'LBL_NEW_FORM_TITLE' => 'Crear Producto',
  'LBL_PRODUCT' => 'Producto:',
  'LBL_RELATED_PRODUCTS' => 'Productos Relacionados',
  'LBL_LIST_NAME' => 'Producto',
  'LBL_LIST_MANUFACTURER' => 'Proveedor',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Nº Pieza',
  'LBL_LIST_QUANTITY' => 'Cantidad',
  'LBL_LIST_COST_PRICE' => 'Coste',
  'LBL_LIST_DISCOUNT_PRICE' => 'Precio',
  'LBL_LIST_LIST_PRICE' => 'Precio de Lista',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_ACCOUNT_NAME' => 'Nombre de Cuenta',
  'LBL_LIST_CONTACT_NAME' => 'Nombre de Contacto',
  'LBL_LIST_QUOTE_NAME' => 'Nombre de Presupuesto',
  'LBL_LIST_DATE_PURCHASED' => 'Comprado',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Caduca',
  'LBL_NAME' => 'Producto:',
  'LBL_URL' => 'URL Producto:',
  'LBL_QUOTE_NAME' => 'Nombre de Presupuesto:',
  'LBL_CONTACT_NAME' => 'Nombre de Contacto:',
  'LBL_DATE_PURCHASED' => 'Comprado:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Caducidad del Soporte:',
  'LBL_DATE_SUPPORT_STARTS' => 'Inicio del Soporte:',
  'LBL_COST_PRICE' => 'Coste:',
  'LBL_DISCOUNT_PRICE' => 'Precio Unitario:',
  'LBL_DEAL_TOT' => 'Descuento:',
  'LBL_DISCOUNT_RATE' => 'Tarifa de Descuento',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Tarifa de Descuento (Dólares EEUU)',
  'LBL_DISCOUNT_TOTAL' => 'Descuento Total',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Descuento (Dólares EEUU)',
  'LBL_SELECT_DISCOUNT' => '% de Descuento',
  'LBL_LIST_PRICE' => 'Precio de Lista:',
  'LBL_VENDOR_PART_NUM' => 'Número de Parte del Vendedor:',
  'LBL_MFT_PART_NUM' => 'Número de Parte del Fabricante:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Fecha de Precio con Descuento:',
  'LBL_WEIGHT' => 'Peso:',
  'LBL_DESCRIPTION' => 'Descripción:',
  'LBL_TYPE' => 'Tipo:',
  'LBL_CATEGORY' => 'Categoría:',
  'LBL_QUANTITY' => 'Cantidad:',
  'LBL_STATUS' => 'Estado:',
  'LBL_TAX_CLASS' => 'Tipo de Impuesto:',
  'LBL_MANUFACTURER' => 'Fabricante:',
  'LBL_SUPPORT_DESCRIPTION' => 'Desc. del Soporte:',
  'LBL_SUPPORT_TERM' => 'Término del Soporte:',
  'LBL_SUPPORT_NAME' => 'Título del Soporte:',
  'LBL_SUPPORT_CONTACT' => 'Contacto del Soporte:',
  'LBL_PRICING_FORMULA' => 'Fórmula de Valoración:',
  'LBL_ACCOUNT_NAME' => 'Nombre de Cuenta:',
  'LNK_PRODUCT_LIST' => 'Ver Productos',
  'LNK_NEW_PRODUCT' => 'Crear Producto',
  'NTC_DELETE_CONFIRMATION' => '¿Está seguro de que desea eliminar este registro?',
  'NTC_REMOVE_CONFIRMATION' => '¿Está seguro de que desea quitar la relación del producto?',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro para eliminar el producto.',
  'LBL_CURRENCY' => 'Moneda:',
  'LBL_ASSET_NUMBER' => 'Número de Activo:',
  'LBL_SERIAL_NUMBER' => 'Número de Serie:',
  'LBL_BOOK_VALUE' => 'Valor Contable:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Valor Contable (Dólares EEUU):',
  'LBL_BOOK_VALUE_DATE' => 'Fecha del Valor Contable:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Productos',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Productos Relacionados',
  'LBL_WEBSITE' => 'Sitio Web',
  'LBL_COST_USDOLLAR' => 'Coste (Dólares EEUU)',
  'LBL_DISCOUNT_USDOLLAR' => 'Precio Unitario (Dólares EEUU)',
  'LBL_LIST_USDOLLAR' => 'Precio de Lista (Dólares EEUU)',
  'LBL_PRICING_FACTOR' => 'Factor de Valoración',
  'LBL_ACCOUNT_ID' => 'ID Cuenta',
  'LBL_CONTACT_ID' => 'ID Contacto',
  'LBL_CATEGORY_NAME' => 'Nombre de Categoría:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Notas',
  'LBL_MEMBER_OF' => 'Miembro de:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Proyectos',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documentos',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contratos',
  'LBL_CONTRACTS' => 'Contratos',
  'LBL_PRODUCT_CATEGORIES' => 'Categorías de Productos',
  'LBL_PRODUCT_TYPES' => 'Tipos de Productos',
  'LBL_ASSIGNED_TO_NAME' => 'Asignado a:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'ID Plantilla de Producto:',
  'LBL_QUOTE_ID' => 'ID Presupuesto',
  'LBL_CREATED_USER' => 'Usuario Creado',
  'LBL_MODIFIED_USER' => 'Usuario Modificado',
  'LBL_QUOTE' => 'Presupuesto',
  'LBL_CONTACT' => 'Contacto',
  'LBL_DISCOUNT_AMOUNT' => 'Cantidad Descontada',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Nombre del Símbolo de Moneda',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Productos',
  'LNK_IMPORT_PRODUCTS' => 'Importar Productos',
  'LBL_EXPORT_CURRENCY_ID' => 'ID Moneda',
);


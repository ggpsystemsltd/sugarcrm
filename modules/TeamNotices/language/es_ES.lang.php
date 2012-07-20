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
  'LBL_MORE_DETAIL' => 'Más Detalles',
  'LBL_URL' => 'URL',
  'dom_status' => 
  array (
    'Visible' => 'Visible',
    'Hidden' => 'Oculto',
  ),
  'LBL_MODULE_NAME' => 'Noticias de Equipo',
  'LBL_MODULE_TITLE' => 'Noticias de Equipo: Inicio',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda de Noticias de Equipo',
  'LBL_LIST_FORM_TITLE' => 'Lista de Noticias de Equipo',
  'LBL_PRODUCTTYPE' => 'Noticia de Equipo',
  'LBL_NOTICES' => 'Noticias de Equipo',
  'LBL_LIST_NAME' => 'Título',
  'LBL_URL_TITLE' => 'Título de URL',
  'LBL_LIST_DESCRIPTION' => 'Descripción',
  'LBL_NAME' => 'Título',
  'LBL_DESCRIPTION' => 'Descripción',
  'LBL_LIST_LIST_ORDER' => 'Orden',
  'LBL_LIST_ORDER' => 'Orden',
  'LBL_DATE_START' => 'Fecha de Inicio',
  'LBL_DATE_END' => 'Fecha de Fin',
  'LBL_STATUS' => 'Estado',
  'LNK_NEW_TEAM' => 'Nuevo Equipo',
  'LNK_NEW_TEAM_NOTICE' => 'Nueva Noticia de Equipo',
  'LNK_LIST_TEAM' => 'Equipos',
  'LNK_LIST_TEAMNOTICE' => 'Noticias de Equipo',
  'LNK_PRODUCT_LIST' => 'Productos con Precio de Lista',
  'LNK_NEW_PRODUCT' => 'Nuevo Producto',
  'LNK_NEW_MANUFACTURER' => 'Proveedores',
  'LNK_NEW_SHIPPER' => 'Proveedores de Transporte',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Categorías de Producto',
  'LNK_NEW_PRODUCT_TYPE' => 'Lista de Tipos de Producto',
  'NTC_DELETE_CONFIRMATION' => '¿Está seguro de que desea eliminar este registro?',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro para eliminar el tipo de producto.',
  'NTC_LIST_ORDER' => 'Establece el orden en que este tipo aparecerá en las listas desplegables de Tipo de Producto',
  'LBL_TEAM_NOTICE_FEATURES' => 'Características:<br />* Interfaz de Usuario Mejorado y un nuevo Asistente que combinan un diseño simple e intuitivo con un proceso paso a paso para guiar al usuario a través de la creación de informes.<br />* Los Conjuntos de Informes Complejos permiten a los usuarios crear informes a través de múltiples módulos utilizando lógica compleja.<br />* Los Informes Matriciales le ofrecen la habilidad de realizar agrupaciones por múltiples atributos en un diseño flexible de cuadrícula. Los usuarios pueden crear complejas tablas dinámicas con la capacidad de mostrar operaciones como la Suma, Media, Cuenta y Porcentaje.<br />* Los Filtros en Tiempo de Ejecución permiten que un usuario cambie los atributos de un informe en tiempo real.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'La nueva vista móvil de la aplicación SugarCRM rompe con la noción clásica del sacrificio de la usabilidad en favor de la movilidad.<br />Características:<br />* El Interfaz de Usuario Mejorado proporciona al usuario las vistas de edición, detalle, lista y registros relacionados,así como la habilidad de acceder al directorio de empleados, guardar preferencias, y ver los elementos recientes.<br />* La Independencia de Dispositivo permite que los usuarios vean los datos de SugarCRM desde cualquier PDA o smartphone, incluyendo Blackberry e iPhone.<br />* El Cliente de HTML Enriquecido aporta una presentación clara de los datos de SugarCRM a través de un navegador web estándar.<br />* Las Nuevas Capacidades de Búsqueda permiten a los usuarios encontrar la información rápidamente.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Las Mejoras a la Importación de Datos hacen aún más fácil la migración de datos a SugarCRM desde aplicaciones como Excel, Act!, Microsoft Outlook, y Salesforce.com.<br />Mejoras:<br />* El Interfaz de Usuario Mejorado del mapeo proporciona más opciones para garantizar que las transferencias de datos a SugarCRM se ejecutan con precisión y sin problemas.<br />* Los Controles de Calidad de Datos permiten que los administradores especifiquen si las importaciones de datos deberían crear nuevos registros o actualizar los existentes, reduciendo así la información duplicada.<br />* La Importación en Todos los Módulos proporciona la habilidad de llevar la información de otras aplicaciones CRM a cualquier módulo, reduciendo la repetición de la introducción de datos.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'El Constructor de Módulos le permite extender SugarCRM de formas nuevas e innovadoras.<br />Mejoras:<br />* Las Nuevas Relaciones permiten que tanto los módulos nuevos como los existentes sean relacionados de nuevas maneras.<br />* La Auditoría proporciona un historial completo de la creación y modificación de módulos para poder hacer un seguimiento de las personalizaciones.<br />* El Soporte de Dashlets permite que la funcionalidad de módulos y objetos personalizados sea mostrada en contenedores AJAX ubicados en la página de inicio.<br />* Las Nuevas Plantillas proporcionan un modo de monitorizar fácilmente la información de archivos y oportunidades.',
  'LBL_TEAM_NOTICE_TRACKER' => 'La Monitorización proporcionan una vista detallada del uso y rendimiento de SugarCRM.<br />Características:<br />* Los Informes de Monitorización proporcionan una instantánea de la utilización del sistema para mejorar la adopción por parte de los usuarios y la visibilidad sobre la utilización del CRM. Los Usuarios pueden ver informes sobre actividades semanales en el CRM, registros y módulos vistos, tiempo de sesión acumulado y estado en línea de otros miembros de equipo.<br />* La Monitorización del Sistema proporciona a los administradores información sobre cómo el sistema está siendo utilizado y sobre potenciales puntos de sobrecarga en la aplicación.',
);


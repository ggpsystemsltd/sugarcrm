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
  'LBL_AUTH_UNSUPPORTED' => 'Este método de registro no es compatible con la aplicación',
  'LBL_AUTH_ERROR' => 'El intento de conectarse con la cuenta fallo.',
  'LBL_VALIDATED' => 'Conectado',
  'LBL_DISPLAY_PROPERTIES' => 'Ver propiedades',
  'LBL_ERR_NO_AUTHINFO' => 'No hay información de autenticación para esta cuenta.',
  'LBL_ERR_NO_TOKEN' => 'No hay token válido para registrar esta cuenta.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Usted no está conectado a su cuenta {0}. Haga clic en Aceptar para acceder a su cuenta y volver a activar la conexión.',
  'LBL_MEET_NOW_BUTTON' => 'Reunirse ahora',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Ver próximas reuniones de LotusLive&trade;',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Próximas reuniones LotusLive&trade;',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Ver archivos de LotusLive&trade;',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'Archivos de LotusLive&trade;',
  'LBL_REAUTHENTICATE_LABEL' => 'Volver a registrarse',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Una cuenta para esta aplicación ya existe. Se ha restituido la cuenta existente.',
  'LBL_OAUTH_SAVE_NOTICE' => 'Haga clic en <b> conectar </ b> para dirigirse a una página para proporcionar información de su cuenta y para autorizar el acceso a la cuenta por Sugar. Después de conectar, se le redirige de vuelta Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Haga clic en <b> conectar </b> para conectar la cuenta en Sugar.',
  'LBL_ERR_FACEBOOK' => 'Facebook ha devuelto un error, y la información no se puede mostrar.',
  'LBL_ERR_NO_RESPONSE' => 'Se produjo un error al intentar conectarse a esta cuenta.',
  'LBL_ERR_TWITTER' => 'Twitter ha devuelto un error, y la información no se puede mostrar.',
  'LBL_ERR_POPUPS_DISABLED' => 'Por favor, activa las ventanas emergente del navegador o agregar una excepción para el sitio web "{0}" a la lista de excepciones con el fin de conectar.',
  'LBL_ID' => 'ID',
  'LBL_URL' => 'URL',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'ID usuario asignado',
  'LBL_ASSIGNED_TO_NAME' => 'Usuario de Sugar',
  'LBL_DATE_ENTERED' => 'Fecha de creación',
  'LBL_DATE_MODIFIED' => 'Fecha de modificación',
  'LBL_MODIFIED' => 'Modificado por',
  'LBL_MODIFIED_ID' => 'Modificado por Id',
  'LBL_MODIFIED_NAME' => 'Modificada por usuario',
  'LBL_CREATED' => 'Creado por',
  'LBL_CREATED_ID' => 'Creado por Id',
  'LBL_DESCRIPTION' => 'Descripción',
  'LBL_DELETED' => 'Eliminado',
  'LBL_NAME' => 'Nombre del usuario de la App',
  'LBL_CREATED_USER' => 'Creada por usuario',
  'LBL_MODIFIED_USER' => 'Modificado por usuario',
  'LBL_LIST_NAME' => 'Nombre',
  'LBL_TEAM' => 'Equipo',
  'LBL_TEAMS' => 'Equipos',
  'LBL_TEAM_ID' => 'ID Equipo',
  'LBL_LIST_FORM_TITLE' => 'Lista de cuentas externas',
  'LBL_MODULE_NAME' => 'Cuenta externa',
  'LBL_MODULE_TITLE' => 'Cuentas externas',
  'LBL_HOMEPAGE_TITLE' => 'Mis cuentas externas',
  'LNK_NEW_RECORD' => 'Crear cuenta externa',
  'LNK_LIST' => 'Ver cuentas externas',
  'LNK_IMPORT_SUGAR_EAPM' => 'Importar cuentas externas',
  'LBL_SEARCH_FORM_TITLE' => 'Buscar fuentes externas',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Ver historial',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Actividades',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Cuentas externas',
  'LBL_NEW_FORM_TITLE' => 'Nueva cuenta externa',
  'LBL_PASSWORD' => 'Contraseña App',
  'LBL_USER_NAME' => 'Usuario App',
  'LBL_APPLICATION' => 'Aplicación',
  'LBL_API_DATA' => 'Datos API',
  'LBL_API_TYPE' => 'Tipo de registro',
  'LBL_API_CONSKEY' => 'Clave del Consumidor',
  'LBL_API_CONSSECRET' => 'Secreto del Consumidor',
  'LBL_ACTIVE' => 'Activa',
  'LBL_SUGAR_USER_NAME' => 'Usuario Sugar',
  'LBL_CONNECT_BUTTON_TITLE' => 'Conecta',
  'LBL_NOTE' => 'Tenga en cuenta',
  'LBL_CONNECTED' => 'Conectado',
  'LBL_DISCONNECTED' => 'No conectado',
  'LBL_OMIT_URL' => '(Omitir http:// o https://)',
);


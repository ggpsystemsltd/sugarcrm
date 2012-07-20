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
  'LBL_DELETE_USER_CONFIRM' => 'Aquest empleat és també un usuari. Eliminar el registre d&#39;empleats també s&#39;eliminarà el registre d&#39;Usuari, i l&#39;usuari ja no serà capaç d&#39;accedir a l&#39;aplicació. Voleu continuar amb la supressió d&#39;aquest registre?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Esteu segur que voleu eliminar aquest empleat?',
  'LBL_ONLY_ACTIVE' => 'Activar empleat',
  'LBL_SHOW_ON_EMPLOYEES' => 'Visualització del registre d&#39;empleat',
  'LBL_LOGIN' => 'Login',
  'LBL_LIST_ADMIN' => 'Admin',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_ERROR' => 'Error:',
  'LBL_NOTES' => 'Notes:',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_FAX_PHONE' => 'Fax',
  'LBL_MODULE_NAME' => 'Empleats',
  'LBL_MODULE_TITLE' => 'Empleats: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Empleats',
  'LBL_LIST_FORM_TITLE' => 'Empleats',
  'LBL_NEW_FORM_TITLE' => 'Nou Empleat',
  'LBL_EMPLOYEE' => 'Empleat:',
  'LBL_RESET_PREFERENCES' => 'Restablir Preferències per Defecte',
  'LBL_TIME_FORMAT' => 'Format Hora:',
  'LBL_DATE_FORMAT' => 'Format Data:',
  'LBL_TIMEZONE' => 'Zona Horaria:',
  'LBL_CURRENCY' => 'Moneda:',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_LAST_NAME' => 'Cognom',
  'LBL_LIST_EMPLOYEE_NAME' => 'Nom del Empleat',
  'LBL_LIST_DEPARTMENT' => 'Departament',
  'LBL_LIST_REPORTS_TO_NAME' => 'Informa a',
  'LBL_LIST_EMAIL' => 'Correu',
  'LBL_LIST_PRIMARY_PHONE' => 'Telèfon Principal',
  'LBL_LIST_USER_NAME' => 'Nom d´Usuari',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Nou Empleat [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Nou Empleat',
  'LBL_PASSWORD' => 'Contransenya:',
  'LBL_EMPLOYEE_NAME' => 'Nom del Empleat:',
  'LBL_USER_NAME' => 'Nom d´Usuari:',
  'LBL_USER_TYPE' => 'Tipus d&#39;usuari',
  'LBL_FIRST_NAME' => 'Nom:',
  'LBL_LAST_NAME' => 'Cognom:',
  'LBL_EMPLOYEE_SETTINGS' => 'Preferències del Empleat',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Llenguatge:',
  'LBL_ADMIN' => 'Administrador:',
  'LBL_EMPLOYEE_INFORMATION' => 'Informació del Empleat',
  'LBL_OFFICE_PHONE' => 'Tel. Oficina:',
  'LBL_REPORTS_TO' => 'Informa a Id:',
  'LBL_REPORTS_TO_NAME' => 'Informa a:',
  'LBL_OTHER_PHONE' => 'Un altre:',
  'LBL_OTHER_EMAIL' => 'Correu Alternatiu:',
  'LBL_DEPARTMENT' => 'Departament:',
  'LBL_TITLE' => 'Títol:',
  'LBL_ANY_ADDRESS' => 'Adreça Alternativa',
  'LBL_ANY_PHONE' => 'Tel. Alternatiu:',
  'LBL_ANY_EMAIL' => 'Correu Alternatiu:',
  'LBL_ADDRESS' => 'Direcció:',
  'LBL_CITY' => 'Ciutat:',
  'LBL_STATE' => 'Estat/Província:',
  'LBL_POSTAL_CODE' => 'Còdig Postal:',
  'LBL_COUNTRY' => 'País:',
  'LBL_NAME' => 'Nom:',
  'LBL_MOBILE_PHONE' => 'Mòbil:',
  'LBL_OTHER' => 'Un altre:',
  'LBL_FAX' => 'Fax:',
  'LBL_EMAIL' => 'Correu:',
  'LBL_EMAIL_LINK_TYPE' => 'Client de correu',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Client de Correu Sugar:</b> Enviar correus utilitzant el client de correu de l&#39;aplicació Sugar. <br><b>Client de Correu Extern: </b> Enviar correu utilitzant un client extern a l&#39;aplicació Sugar, com Microsoft Outlook.',
  'LBL_HOME_PHONE' => 'Tel. Casa:',
  'LBL_WORK_PHONE' => 'Tel. Treball:',
  'LBL_ADDRESS_INFORMATION' => 'Informació de Direcció',
  'LBL_EMPLOYEE_STATUS' => 'Estat del Empleat:',
  'LBL_PRIMARY_ADDRESS' => 'Direcció Principal:',
  'LBL_SAVED_SEARCH' => 'Opcions de Disseny',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Crear Usuari [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Crear Usuari',
  'LBL_FAVORITE_COLOR' => 'Color Favorit:',
  'LBL_MESSENGER_ID' => 'Nom MI:',
  'LBL_MESSENGER_TYPE' => 'Tipus MI:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'El nom del empleat',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'ja existeix. No es permeten empleats duplicats. Canviï el nom de l´empleat perquè sigui únic.',
  'ERR_LAST_ADMIN_1' => 'El nom del empleat "',
  'ERR_LAST_ADMIN_2' => '" és l´últim empleat amb permisos d´administrador. Almenys un empleat ha de ser un administrador.',
  'LNK_NEW_EMPLOYEE' => 'Crear Empleat',
  'LNK_EMPLOYEE_LIST' => 'Empleats',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre per eliminar l´empleat.',
  'LBL_DEFAULT_TEAM' => 'Equip per Defecte:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Selecciona l´equip per defecte per nous registres',
  'LBL_MY_TEAMS' => 'Els Meus Equips',
  'LBL_LIST_DESCRIPTION' => 'Descripció',
  'LNK_EDIT_TABS' => 'Editar Pestanyes',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Està segur de que vol esborrar aquest empleat del equipo?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Estat',
  'LBL_SUGAR_LOGIN' => 'Es Usuari de Sugar',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Notificar al seu Assignat',
  'LBL_IS_ADMIN' => 'Es Administrador',
  'LBL_GROUP' => 'Usuari de Grup',
  'LBL_PORTAL_ONLY' => 'Usuari Només de Portal',
  'LBL_PHOTO' => 'Foto',
  'LBL_SELECT' => 'Seleccionar',
  'LBL_FF_CLEAR' => 'Netejar',
  'LBL_AUTHENTICATE_ID' => 'Id Autentificació',
  'LBL_EXT_AUTHENTICATE' => 'Autentificació externa',
  'LBL_GROUP_USER' => 'Usuari de Grup',
  'LBL_LIST_ACCEPT_STATUS' => 'Acceptar estat',
  'LBL_MODIFIED_BY' => 'Modificat per',
  'LBL_MODIFIED_BY_ID' => 'Modificat per Id',
  'LBL_CREATED_BY_NAME' => 'Creat per',
  'LBL_PORTAL_ONLY_USER' => 'Usuari de l&#39;API de portal',
  'LBL_PSW_MODIFIED' => 'Contrasenya canviada per última vegada',
  'LBL_USER_HASH' => 'Contrasenya',
  'LBL_SYSTEM_GENERATED_PASSWORD' => 'Contrasenya generada per el sistema',
  'LBL_PICTURE_FILE' => 'Imatge',
  'LBL_DESCRIPTION' => 'Descripció',
  'LBL_STATUS' => 'Estat',
  'LBL_ADDRESS_CITY' => 'Ciutat de direcció',
  'LBL_ADDRESS_COUNTRY' => 'País de direcció',
  'LBL_ADDRESS_POSTALCODE' => 'CP de direcció',
  'LBL_ADDRESS_STATE' => 'Estat/Província de direcció',
  'LBL_ADDRESS_STREET' => 'Carrer de direcció',
  'LBL_DATE_MODIFIED' => 'Data de modificació',
  'LBL_DATE_ENTERED' => 'Data de creació',
  'LBL_DELETED' => 'Eliminat',
);


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
  'LBL_ACCEPT_STATUS' => 'Aceptar estato',
  'LBL_ACCEPT_LINK' => 'Aceptar Link',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_EMAIL' => 'Email',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_BLANK' => '-vacío-',
  'LBL_MODULE_NAME' => 'Llamadas',
  'LBL_MODULE_TITLE' => 'Llamadas: Inicio',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda de Llamadas',
  'LBL_LIST_FORM_TITLE' => 'Lista de Llamadas',
  'LBL_NEW_FORM_TITLE' => 'Crear Cita',
  'LBL_LIST_CLOSE' => 'Cerrar',
  'LBL_LIST_SUBJECT' => 'Asunto',
  'LBL_LIST_CONTACT' => 'Contacto',
  'LBL_LIST_RELATED_TO' => 'Relacionado con',
  'LBL_LIST_RELATED_TO_ID' => 'Relacionado con ID',
  'LBL_LIST_DATE' => 'Fecha Inicio',
  'LBL_LIST_TIME' => 'Hora Inicio',
  'LBL_LIST_DURATION' => 'Duración',
  'LBL_LIST_DIRECTION' => 'Dirección',
  'LBL_SUBJECT' => 'Asunto:',
  'LBL_REMINDER' => 'Aviso',
  'LBL_CONTACT_NAME' => 'Contacto:',
  'LBL_DESCRIPTION_INFORMATION' => 'Información adicional',
  'LBL_DESCRIPTION' => 'Descripción:',
  'LBL_STATUS' => 'Estado:',
  'LBL_DIRECTION' => 'Dirección:',
  'LBL_DATE' => 'Fecha Inicio:',
  'LBL_DURATION' => 'Duración:',
  'LBL_DURATION_HOURS' => 'Horas Duración:',
  'LBL_DURATION_MINUTES' => 'Minutos Duración:',
  'LBL_HOURS_MINUTES' => '(horas/minutos)',
  'LBL_CALL' => 'Llamada:',
  'LBL_DATE_TIME' => 'Inicio:',
  'LBL_TIME' => 'Hora inicio:',
  'LNK_NEW_CALL' => 'Registrar Llamada',
  'LNK_NEW_MEETING' => 'Programar Reunión',
  'LNK_CALL_LIST' => 'Ver Llamadas',
  'LNK_IMPORT_CALLS' => 'Importar Llamadas',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro a eliminar.',
  'NTC_REMOVE_INVITEE' => '¿Está seguro de que desea quitar a este participante de la llamada?',
  'LBL_INVITEE' => 'Participantes',
  'LBL_RELATED_TO' => 'Relacionado con',
  'LNK_NEW_APPOINTMENT' => 'Crear Cita',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planificación',
  'LBL_ADD_INVITEE' => 'Añadir Invitados',
  'LBL_NAME' => 'Nombre',
  'LBL_FIRST_NAME' => 'Nombre',
  'LBL_LAST_NAME' => 'Apellido',
  'LBL_PHONE' => 'Teléfono',
  'LBL_SEND_BUTTON_TITLE' => 'Enviar Invitaciones [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Enviar Invitaciones',
  'LBL_DATE_END' => 'Fecha de Fin',
  'LBL_TIME_END' => 'Hora de Fin',
  'LBL_REMINDER_TIME' => 'Hora Aviso',
  'LBL_SEARCH_BUTTON' => 'Buscar',
  'LBL_ACTIVITIES_REPORTS' => 'Informe de Actividad',
  'LBL_ADD_BUTTON' => 'Añadir',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Llamadas',
  'LBL_LOG_CALL' => 'Registrar Llamada',
  'LNK_SELECT_ACCOUNT' => 'Seleccionar Cuenta',
  'LNK_NEW_ACCOUNT' => 'Nueva Cuenta',
  'LNK_NEW_OPPORTUNITY' => 'Nueva Oportunidad',
  'LBL_DEL' => 'Eliminar',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Clientes Potenciales',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactos',
  'LBL_USERS_SUBPANEL_TITLE' => 'Usuarios',
  'LBL_OUTLOOK_ID' => 'ID Outlook',
  'LBL_MEMBER_OF' => 'Miembro De',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notas',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Usuario Asignado',
  'LBL_LIST_MY_CALLS' => 'Mis Llamadas',
  'LBL_SELECT_FROM_DROPDOWN' => 'Por favor, seleccione antes un elemento de la lista desplegable Relacionado Con.',
  'LBL_ASSIGNED_TO_NAME' => 'Asignado a',
  'LBL_ASSIGNED_TO_ID' => 'Usuario Asignado',
  'NOTICE_DURATION_TIME' => 'El tiempo de duración debe ser mayor que 0',
  'LBL_CALL_INFORMATION' => 'Visión General',
  'LBL_REMOVE' => 'quit',
  'LBL_PARENT_ID' => 'ID Padre',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificado por ID',
  'LBL_EXPORT_CREATED_BY' => 'Creado por ID',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID Usuario Asignado',
  'LBL_EXPORT_DATE_START' => 'Fecha y Hora de Inicio',
  'LBL_EXPORT_PARENT_TYPE' => 'Relacionado con el módulo',
  'LBL_EXPORT_REMINDER_TIME' => 'Tiempo de Recordatorio (en minutos)',
);


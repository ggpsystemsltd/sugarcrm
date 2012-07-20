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
  'LBL_INFO_START_DT' => 'Fecha de inicio',
  'LBL_INFO_DUE_DT' => 'Fecha de fin',
  'LBL_NO_USER' => 'Ningún resultado para el campo: Asignado a',
  'LBL_DATE_TIME' => 'Fecha y hora',
  'LBL_SETTINGS_TIME_STARTS' => 'Hora inicio:',
  'LBL_SETTINGS_TIME_ENDS' => 'Hora fin:',
  'LBL_SETTINGS_CALENDAR_STYLE' => 'Estilo de calendario:',
  'LBL_SETTINGS_CALLS_SHOW' => 'Ver llamadas:',
  'LBL_SETTINGS_TASKS_SHOW' => 'Ver tareas:',
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINS_ABBREV' => 'm',
  'LBL_NO' => 'No',
  'LBL_MODULE_NAME' => 'Calendario',
  'LBL_MODULE_TITLE' => 'Calendario',
  'LNK_NEW_CALL' => 'Registrar Llamada',
  'LNK_NEW_MEETING' => 'Programar Reunión',
  'LNK_NEW_APPOINTMENT' => 'Crear Cita',
  'LNK_NEW_TASK' => 'Crear Tarea',
  'LNK_CALL_LIST' => 'Ver Llamadas',
  'LNK_MEETING_LIST' => 'Ver Reuniones',
  'LNK_TASK_LIST' => 'Ver Tareas',
  'LNK_VIEW_CALENDAR' => 'Hoy',
  'LNK_IMPORT_CALLS' => 'Importar Llamadas',
  'LNK_IMPORT_MEETINGS' => 'Importar Reuniones',
  'LNK_IMPORT_TASKS' => 'Importar Tareas',
  'LBL_MONTH' => 'Mes',
  'LBL_DAY' => 'Día',
  'LBL_YEAR' => 'Año',
  'LBL_WEEK' => 'Semana',
  'LBL_PREVIOUS_MONTH' => 'Mes Anterior',
  'LBL_PREVIOUS_DAY' => 'Día Anterior',
  'LBL_PREVIOUS_YEAR' => 'Año Anterior',
  'LBL_PREVIOUS_WEEK' => 'Semana Anterior',
  'LBL_NEXT_MONTH' => 'Mes Siguiente',
  'LBL_NEXT_DAY' => 'Día Siguiente',
  'LBL_NEXT_YEAR' => 'Año Siguiente',
  'LBL_NEXT_WEEK' => 'Semana Siguiente',
  'LBL_SCHEDULED' => 'Planificado',
  'LBL_BUSY' => 'Ocupado',
  'LBL_CONFLICT' => 'Conflicto',
  'LBL_USER_CALENDARS' => 'Calendarios de Usuario',
  'LBL_SHARED' => 'Compartido',
  'LBL_PREVIOUS_SHARED' => 'Anterior',
  'LBL_NEXT_SHARED' => 'Siguiente',
  'LBL_SHARED_CAL_TITLE' => 'Calendario Compartido',
  'LBL_USERS' => 'Usuario',
  'LBL_REFRESH' => 'Actualizar',
  'LBL_EDIT_USERLIST' => 'Lista de Usuarios',
  'LBL_SELECT_USERS' => 'Seleccione usuarios para la visualización de calendario',
  'LBL_FILTER_BY_TEAM' => 'Filtrado de usuarios por equipo:',
  'LBL_ASSIGNED_TO_NAME' => 'Asignado a',
  'LBL_DATE' => 'Fecha y Hora de Inicio',
  'LBL_CREATE_MEETING' => 'Programar Reunión',
  'LBL_CREATE_CALL' => 'Registrar Llamada',
  'LBL_YES' => 'Sí',
  'LBL_SETTINGS' => 'Configuración',
  'LBL_CREATE_NEW_RECORD' => 'Crear Actividad',
  'LBL_LOADING' => 'Cargando ...',
  'LBL_SAVING' => 'Guardando...',
  'LBL_CONFIRM_REMOVE' => 'Esta seguro que desea eliminar el registro?',
  'LBL_EDIT_RECORD' => 'Editar Actividad',
  'LBL_ERROR_SAVING' => 'Error al guardar',
  'LBL_ERROR_LOADING' => 'Error al cargar',
  'LBL_GOTO_DATE' => 'Ir a Fecha',
  'NOTICE_DURATION_TIME' => 'El tiempo de duración debe ser mayor que 0',
  'LBL_STYLE_BASIC' => 'Básico',
  'LBL_STYLE_ADVANCED' => 'Advanzado',
  'LBL_INFO_TITLE' => 'Detalles Adicionales',
  'LBL_INFO_DESC' => 'Descripción',
  'LBL_INFO_DURATION' => 'Duración:',
  'LBL_INFO_NAME' => 'Asunto',
  'LBL_INFO_RELATED_TO' => 'Relacionado con',
  'LBL_SUBJECT' => 'Asunto',
  'LBL_DURATION' => 'Duración:',
  'LBL_STATUS' => 'Estado',
  'LBL_SETTINGS_TITLE' => 'Configuración',
  'LBL_SAVE_BUTTON' => 'Guardar',
  'LBL_DELETE_BUTTON' => 'Eliminar',
  'LBL_APPLY_BUTTON' => 'Aplicar',
  'LBL_SEND_INVITES' => 'Enviar Invitaciones',
  'LBL_CANCEL_BUTTON' => 'Cancelar',
  'LBL_CLOSE_BUTTON' => 'Cerrar:',
  'LBL_GENERAL_TAB' => 'Detalles',
  'LBL_PARTICIPANTS_TAB' => 'Invitados',
);


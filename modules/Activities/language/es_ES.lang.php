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
  'LBL_ACCEPT' => 'Aceptar',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Actividades',
  'LBL_MODULE_TITLE' => 'Actividades: Inicio',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda de Actividades',
  'LBL_LIST_FORM_TITLE' => 'Lista de Actividades',
  'LBL_LIST_SUBJECT' => 'Asunto',
  'LBL_LIST_CONTACT' => 'Contacto',
  'LBL_LIST_RELATED_TO' => 'Relacionado con',
  'LBL_LIST_DATE' => 'Fecha',
  'LBL_LIST_TIME' => 'Hora inicio',
  'LBL_LIST_CLOSE' => 'Cerrar',
  'LBL_SUBJECT' => 'Asunto:',
  'LBL_STATUS' => 'Estado:',
  'LBL_LOCATION' => 'Lugar:',
  'LBL_DATE_TIME' => 'Inicio:',
  'LBL_DATE' => 'Fecha inicio:',
  'LBL_TIME' => 'Hora inicio:',
  'LBL_DURATION' => 'Duración:',
  'LBL_DURATION_MINUTES' => 'Minutos de Duración:',
  'LBL_HOURS_MINS' => '(horas/minuntos)',
  'LBL_CONTACT_NAME' => 'Contacto:',
  'LBL_MEETING' => 'Reunión:',
  'LBL_DESCRIPTION_INFORMATION' => 'Información adicional',
  'LBL_DESCRIPTION' => 'Descripción:',
  'LNK_NEW_CALL' => 'Registrar Llamada',
  'LNK_NEW_MEETING' => 'Programar Reunión',
  'LNK_NEW_TASK' => 'Nueva Tarea',
  'LNK_NEW_NOTE' => 'Nueva Nota o Agregar Archivo Adjunto',
  'LNK_NEW_EMAIL' => 'Nuevo Email Archivado',
  'LNK_CALL_LIST' => 'Ver Llamadas',
  'LNK_MEETING_LIST' => 'Ver Reuniones',
  'LNK_TASK_LIST' => 'Ver Tareas',
  'LNK_NOTE_LIST' => 'Ver Notas',
  'LNK_EMAIL_LIST' => 'Ver Emails',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro para eliminar la cuenta.',
  'NTC_REMOVE_INVITEE' => '¿Está seguro de que desea eliminar a este asistente a la reunión?',
  'LBL_INVITEE' => 'Asistentes',
  'LBL_LIST_DIRECTION' => 'Dirección',
  'LBL_DIRECTION' => 'Dirección',
  'LNK_NEW_APPOINTMENT' => 'Nueva Cita',
  'LNK_VIEW_CALENDAR' => 'Ver Calendario',
  'LBL_OPEN_ACTIVITIES' => 'Actividades Abiertas',
  'LBL_HISTORY' => 'Historial',
  'LBL_UPCOMING' => 'Mis Próximas Citas',
  'LBL_TODAY' => 'hasta',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Nueva Tarea [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Nueva Tarea',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Programar Reunión [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Programar Reunión',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Registrar Llamada [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Registrar Llamada',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Nueva Nota o Archivo Adjunto [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Nueva Nota o Archivo Adjunto',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Email Seguimiento [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Email Seguimiento',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_DUE_DATE' => 'Fecha Vencimiento',
  'LBL_LIST_LAST_MODIFIED' => 'Modificado',
  'NTC_NONE_SCHEDULED' => 'Sin programación.',
  'LNK_IMPORT_CALLS' => 'Importar Llamadas',
  'LNK_IMPORT_MEETINGS' => 'Importar Reuniones',
  'LNK_IMPORT_TASKS' => 'Importar Tareas',
  'LNK_IMPORT_NOTES' => 'Importar Notas',
  'NTC_NONE' => 'Ninguna',
  'LBL_ACCEPT_THIS' => '¿Aceptar?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Actividades Abiertas',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Usuario Asignado',
  'appointment_filter_dom' => 
  array (
    'today' => 'hoy',
    'tomorrow' => 'mañana',
    'this Saturday' => 'esta semana',
    'next Saturday' => 'la semana que viene',
    'last this_month' => 'este mes',
    'last next_month' => 'el mes que viene',
  ),
);


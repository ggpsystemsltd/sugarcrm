<?php

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

















if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



$mod_strings = array (
  'LBL_MODULE_NAME' => 'Historial',
  'LBL_MODULE_TITLE' => 'Historial: Inicio',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda en Historial',
  'LBL_LIST_FORM_TITLE' => 'Historial',
  'LBL_LIST_SUBJECT' => 'Asunto',
  'LBL_LIST_CONTACT' => 'Contacto',
  'LBL_LIST_RELATED_TO' => 'Relacionado con',
  'LBL_LIST_DATE' => 'Fecha',
  'LBL_LIST_TIME' => 'Hora de Inicio',
  'LBL_LIST_CLOSE' => 'Cierre',
  'LBL_SUBJECT' => 'Asunto:',
  'LBL_STATUS' => 'Estado:',
  'LBL_LOCATION' => 'Lugar:',
  'LBL_DATE_TIME' => 'Fecha y Hora de Inicio:',
  'LBL_DATE' => 'Fecha de Inicio:',
  'LBL_TIME' => 'Hora de Inicio:',
  'LBL_DURATION' => 'Duración:',
  'LBL_HOURS_MINS' => '(horas/minutos)',
  'LBL_CONTACT_NAME' => 'Nombre del Contacto: ',
  'LBL_MEETING' => 'Reunión:',
  'LBL_DESCRIPTION_INFORMATION' => 'Información de Descripción',
  'LBL_DESCRIPTION' => 'Descripción:',
  'LBL_COLON' => ':',
  'LBL_DEFAULT_STATUS' => 'Planificado',
  'LNK_NEW_CALL' => 'Registrar Llamada',
  'LNK_NEW_MEETING' => 'Programar Reunión',
  'LNK_NEW_TASK' => 'Crear Tarea',
  'LNK_NEW_NOTE' => 'Crear Nota o Adjunto',
  'LNK_NEW_EMAIL' => 'Archivar Email',
  'LNK_CALL_LIST' => 'Llamadas',
  'LNK_MEETING_LIST' => 'Reuniones',
  'LNK_TASK_LIST' => 'Tareas',
  'LNK_NOTE_LIST' => 'Notas',
  'LNK_EMAIL_LIST' => 'Emails',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro para eliminar la cuenta.',
  'NTC_REMOVE_INVITEE' => '¿Está seguro de que desea quitar a este invitado de la reunión?',
  'LBL_INVITEE' => 'Invitados',
  'LBL_LIST_DIRECTION' => 'Dirección',
  'LBL_DIRECTION' => 'Dirección',
  'LNK_NEW_APPOINTMENT' => 'Nueva Cita',
  'LNK_VIEW_CALENDAR' => 'Hoy',
  'LBL_OPEN_ACTIVITIES' => 'Actividades Abiertas',
  'LBL_HISTORY' => 'Historial',
  'LBL_UPCOMING' => 'Mis Próximas Citas',
  'LBL_TODAY' => 'hasta ',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Crear Tarea [Alt+N]',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Crear Tarea',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Programar Reunión [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Programar Reunión',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Registrar Llamada [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Registrar LLamada',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Crear Nota o Archivo Adjunto [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Crear Nota o Archivo Adjunto',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archivar Email [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archivar Email',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_DUE_DATE' => 'Fecha de Vencimiento',
  'LBL_LIST_LAST_MODIFIED' => 'Modificado',
  'NTC_NONE_SCHEDULED' => 'Nada programado.',
  'appointment_filter_dom' => array(
  	 'today' => 'hoy'
  	,'tomorrow' => 'mañana'
  	,'this Saturday' => 'esta semana'
  	,'next Saturday' => 'la semana que viene'
  	,'last this_month' => 'este mes'
  	,'last next_month' => 'el mes que viene'
  ),
  'LNK_IMPORT_NOTES'=>'Importar Notas',
  'NTC_NONE'=>'Ninguno',
  'LBL_ACCEPT_THIS'=>'¿Aceptar?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Historial',
);

?>

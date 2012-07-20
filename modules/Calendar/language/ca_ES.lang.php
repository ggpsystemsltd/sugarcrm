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
  'LBL_CREATE_NEW_RECORD' => 'Crear activitat',
  'LBL_CONFIRM_REMOVE' => 'Està segur de voler eliminar el registre?',
  'LBL_EDIT_RECORD' => 'Edita activitat',
  'LBL_ERROR_SAVING' => 'Error en desar',
  'LBL_ERROR_LOADING' => 'Error en carregar',
  'LBL_GOTO_DATE' => 'Anar a data',
  'NOTICE_DURATION_TIME' => 'El temps de durada te que ser major que 0',
  'LBL_INFO_START_DT' => 'Data i hora d&#39;inici',
  'LBL_INFO_DUE_DT' => 'Data i hora de venciment',
  'LBL_NO_USER' => 'Cap resultat per al camp: Assignat a',
  'LBL_SETTINGS_TIME_STARTS' => 'Hora d&#39;inici:',
  'LBL_SETTINGS_TIME_ENDS' => 'Hora de finalització:',
  'LBL_SETTINGS_CALENDAR_STYLE' => 'Estil del calendari:',
  'LBL_SETTINGS_CALLS_SHOW' => 'Mostra les trucades:',
  'LBL_SETTINGS_TASKS_SHOW' => 'Mostra tasques:',
  'LBL_SAVE_BUTTON' => 'Guardar',
  'LBL_DELETE_BUTTON' => 'Eliminar',
  'LBL_APPLY_BUTTON' => 'Aplicar',
  'LBL_SEND_INVITES' => 'Enviar Invitacions',
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINS_ABBREV' => 'm',
  'LBL_NO' => 'No',
  'LBL_STYLE_BASIC' => 'Basic',
  'LBL_MODULE_NAME' => 'Calendari',
  'LBL_MODULE_TITLE' => 'Calendari',
  'LNK_NEW_CALL' => 'Programar Trucada',
  'LNK_NEW_MEETING' => 'Programar Reunió',
  'LNK_NEW_APPOINTMENT' => 'Crear Cita',
  'LNK_NEW_TASK' => 'Crear Tasca',
  'LNK_CALL_LIST' => 'Trucades',
  'LNK_MEETING_LIST' => 'Reunions',
  'LNK_TASK_LIST' => 'Tasques',
  'LNK_VIEW_CALENDAR' => 'Avui',
  'LNK_IMPORT_CALLS' => 'Importar Trucades',
  'LNK_IMPORT_MEETINGS' => 'Importar Reunions',
  'LNK_IMPORT_TASKS' => 'Importar Tasques',
  'LBL_MONTH' => 'Mes',
  'LBL_DAY' => 'Dia',
  'LBL_YEAR' => 'Any',
  'LBL_WEEK' => 'Setmana',
  'LBL_PREVIOUS_MONTH' => 'Mes Anterior',
  'LBL_PREVIOUS_DAY' => 'Dia Anterior',
  'LBL_PREVIOUS_YEAR' => 'Any Anterior',
  'LBL_PREVIOUS_WEEK' => 'Setmana Anterior',
  'LBL_NEXT_MONTH' => 'Mes Següent',
  'LBL_NEXT_DAY' => 'Dia Següent',
  'LBL_NEXT_YEAR' => 'Any Següent',
  'LBL_NEXT_WEEK' => 'Setmana Següent',
  'LBL_SCHEDULED' => 'Planificat',
  'LBL_BUSY' => 'Ocupat',
  'LBL_CONFLICT' => 'Conflicte',
  'LBL_USER_CALENDARS' => 'Calendaris d´Usuari',
  'LBL_SHARED' => 'Compartit',
  'LBL_PREVIOUS_SHARED' => 'Anterior',
  'LBL_NEXT_SHARED' => 'Següent',
  'LBL_SHARED_CAL_TITLE' => 'Calendari Compartit',
  'LBL_USERS' => 'Usuari',
  'LBL_REFRESH' => 'Actualitzar',
  'LBL_EDIT_USERLIST' => 'Llista d&#39;Usuaris',
  'LBL_SELECT_USERS' => 'Seleccioni usuaris per a la visualització de calendari',
  'LBL_FILTER_BY_TEAM' => 'Filtrat d´usuaris per equip:',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a',
  'LBL_DATE' => 'Data i Hora d´Inici',
  'LBL_CREATE_MEETING' => 'Planificar reunió',
  'LBL_CREATE_CALL' => 'Registrar trucada',
  'LBL_YES' => 'Sí',
  'LBL_SETTINGS' => 'Configuració',
  'LBL_LOADING' => 'Carregant ...',
  'LBL_SAVING' => 'Guardant...',
  'LBL_STYLE_ADVANCED' => 'Avançat',
  'LBL_INFO_TITLE' => 'Detalls addicionals',
  'LBL_INFO_DESC' => 'Descripció',
  'LBL_INFO_DURATION' => 'Duració',
  'LBL_INFO_NAME' => 'Assumpte',
  'LBL_INFO_RELATED_TO' => 'Relatiu a',
  'LBL_SUBJECT' => 'Assumpte',
  'LBL_DURATION' => 'Duració',
  'LBL_STATUS' => 'Estat',
  'LBL_DATE_TIME' => 'Data i hora',
  'LBL_SETTINGS_TITLE' => 'Configuració',
  'LBL_CANCEL_BUTTON' => 'Cancel·lar',
  'LBL_CLOSE_BUTTON' => 'Tancar',
  'LBL_GENERAL_TAB' => 'Detalls',
  'LBL_PARTICIPANTS_TAB' => 'Convidats',
);


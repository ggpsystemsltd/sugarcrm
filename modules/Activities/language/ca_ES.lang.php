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
  'LBL_ACCEPT' => 'Acceptar',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Activitats',
  'LBL_MODULE_TITLE' => 'Activitats: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca d´Activitats',
  'LBL_LIST_FORM_TITLE' => 'Lista d´Activitats',
  'LBL_LIST_SUBJECT' => 'Assumpte',
  'LBL_LIST_CONTACT' => 'Contacte',
  'LBL_LIST_RELATED_TO' => 'Relatiu a',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Hora d´inici',
  'LBL_LIST_CLOSE' => 'Tancar',
  'LBL_SUBJECT' => 'Assumpte:',
  'LBL_STATUS' => 'Estat:',
  'LBL_LOCATION' => 'Lloc:',
  'LBL_DATE_TIME' => 'Inici:',
  'LBL_DATE' => 'Data d´inici:',
  'LBL_TIME' => 'Hora d´inici:',
  'LBL_DURATION' => 'Durada:',
  'LBL_DURATION_MINUTES' => 'Minuts de Durada:',
  'LBL_HOURS_MINS' => '(hores/minuts)',
  'LBL_CONTACT_NAME' => 'Contacte:',
  'LBL_MEETING' => 'Reunió:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informació addicional',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LNK_NEW_CALL' => 'Programar Trucada',
  'LNK_NEW_MEETING' => 'Programar Reunió',
  'LNK_NEW_TASK' => 'Nova Tasca',
  'LNK_NEW_NOTE' => 'Nova Nota o Arxiu Adjunt',
  'LNK_NEW_EMAIL' => 'Nou Correu Arxivat',
  'LNK_CALL_LIST' => 'Trucades',
  'LNK_MEETING_LIST' => 'Reunions',
  'LNK_TASK_LIST' => 'Tasques',
  'LNK_NOTE_LIST' => 'Notes',
  'LNK_EMAIL_LIST' => 'Correus',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre per eliminar el compte.',
  'NTC_REMOVE_INVITEE' => 'Està segur que desitja eliminar aquest assistent a la reunió?',
  'LBL_INVITEE' => 'Assistents',
  'LBL_LIST_DIRECTION' => 'Direcció',
  'LBL_DIRECTION' => 'Direcció',
  'LNK_NEW_APPOINTMENT' => 'Nova Cita',
  'LNK_VIEW_CALENDAR' => 'Avui',
  'LBL_OPEN_ACTIVITIES' => 'Activitats Obertes',
  'LBL_HISTORY' => 'Històrial',
  'LBL_UPCOMING' => 'Les Meves Pròximes Cites',
  'LBL_TODAY' => 'fins a',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Nova Tasca [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Nova Tasca',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Programar Reunió [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Programar Reunió',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Programar Trucada [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Programar Trucada',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Nova Nota o Arxiu Adjunt [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Nova Nota o Arxiu Adjunt',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Correu Seguiment [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Correu Seguiment',
  'LBL_LIST_STATUS' => 'Estat',
  'LBL_LIST_DUE_DATE' => 'Data Venciment',
  'LBL_LIST_LAST_MODIFIED' => 'Modificat',
  'NTC_NONE_SCHEDULED' => 'Sense programació.',
  'LNK_IMPORT_CALLS' => 'Importar Trucades',
  'LNK_IMPORT_MEETINGS' => 'Importar Reunions',
  'LNK_IMPORT_TASKS' => 'Importar Tasques',
  'LNK_IMPORT_NOTES' => 'Importar Notes',
  'NTC_NONE' => 'Cap',
  'LBL_ACCEPT_THIS' => 'Acceptar?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Activitats Obertes',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Usuari Assignat',
  'appointment_filter_dom' => 
  array (
    'today' => 'avui',
    'tomorrow' => 'demà',
    'this Saturday' => 'aquesta setmana',
    'next Saturday' => 'la setmana vinent',
    'last this_month' => 'aquest mes',
    'last next_month' => 'proper mes',
  ),
);


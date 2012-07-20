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
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notes',
  'LBL_MODULE_NAME' => 'Trucades',
  'LBL_MODULE_TITLE' => 'Trucades: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Trucades',
  'LBL_LIST_FORM_TITLE' => 'Llista de Trucades',
  'LBL_NEW_FORM_TITLE' => 'Crear Cita',
  'LBL_LIST_CLOSE' => 'Tancar',
  'LBL_LIST_SUBJECT' => 'Assumpte',
  'LBL_LIST_CONTACT' => 'Contacte',
  'LBL_LIST_RELATED_TO' => 'Relatiu a',
  'LBL_LIST_RELATED_TO_ID' => 'Relatiu a ID',
  'LBL_LIST_DATE' => 'Data Inici',
  'LBL_LIST_TIME' => 'Hora Inici',
  'LBL_LIST_DURATION' => 'Durada',
  'LBL_LIST_DIRECTION' => 'Direcció',
  'LBL_SUBJECT' => 'Assumpte:',
  'LBL_REMINDER' => 'Avís',
  'LBL_CONTACT_NAME' => 'Contacte:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informació addicional',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_STATUS' => 'Estat:',
  'LBL_DIRECTION' => 'Direcció:',
  'LBL_DATE' => 'Data Inici:',
  'LBL_DURATION' => 'Durada:',
  'LBL_DURATION_HOURS' => 'Hores Durada:',
  'LBL_DURATION_MINUTES' => 'Minuts Durada:',
  'LBL_HOURS_MINUTES' => '(hores/minuts)',
  'LBL_CALL' => 'Trucada:',
  'LBL_DATE_TIME' => 'Inici:',
  'LBL_TIME' => 'Hora inici:',
  'LNK_NEW_CALL' => 'Programar Trucada',
  'LNK_NEW_MEETING' => 'Programar Reunió',
  'LNK_CALL_LIST' => 'Trucades',
  'LNK_IMPORT_CALLS' => 'Importar Trucades',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre a eliminar.',
  'NTC_REMOVE_INVITEE' => 'Està segur que desitja treure aquest participant de la trucada?',
  'LBL_INVITEE' => 'Participants',
  'LBL_RELATED_TO' => 'Relatiu a',
  'LNK_NEW_APPOINTMENT' => 'Crear Cita',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planificació',
  'LBL_ADD_INVITEE' => 'Afegir Convidats',
  'LBL_NAME' => 'Nom',
  'LBL_FIRST_NAME' => 'Nom',
  'LBL_LAST_NAME' => 'Cognom',
  'LBL_EMAIL' => 'Correu',
  'LBL_PHONE' => 'Telèfon',
  'LBL_SEND_BUTTON_TITLE' => 'Enviar Invitacions [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Enviar Invitacions',
  'LBL_DATE_END' => 'Data de Fi',
  'LBL_TIME_END' => 'Hora de Fi',
  'LBL_REMINDER_TIME' => 'Hora Avís',
  'LBL_SEARCH_BUTTON' => 'Buscar',
  'LBL_ACTIVITIES_REPORTS' => 'Informe d&#39;activitat',
  'LBL_ADD_BUTTON' => 'Afegir',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Trucades',
  'LBL_LOG_CALL' => 'Registrar Trucada',
  'LNK_SELECT_ACCOUNT' => 'Seleccionar Compte',
  'LNK_NEW_ACCOUNT' => 'Nou Compte',
  'LNK_NEW_OPPORTUNITY' => 'Nova Oportunitat',
  'LBL_DEL' => 'Esborrar',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Clients Potencials',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactes',
  'LBL_USERS_SUBPANEL_TITLE' => 'Usuaris',
  'LBL_OUTLOOK_ID' => 'ID Outlook',
  'LBL_MEMBER_OF' => 'Membre De',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Usuari Assignat',
  'LBL_LIST_MY_CALLS' => 'Les Meves Trucades',
  'LBL_SELECT_FROM_DROPDOWN' => 'Si us plau, seleccioni abans un element de la llista desplegable Relatiu A.',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a',
  'LBL_ASSIGNED_TO_ID' => 'Usuari Assignat',
  'NOTICE_DURATION_TIME' => 'El temps de durada te que ser major que 0',
  'LBL_CALL_INFORMATION' => 'Visió General',
  'LBL_REMOVE' => 'treure',
  'LBL_ACCEPT_STATUS' => 'Acceptar estat',
  'LBL_ACCEPT_LINK' => 'Acceptar enllaç',
  'LBL_PARENT_ID' => 'ID Pare',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificat per ID',
  'LBL_EXPORT_CREATED_BY' => 'Creat per ID',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID d&#39;usuari assignat',
  'LBL_EXPORT_DATE_START' => 'Data i hora de inici',
  'LBL_EXPORT_PARENT_TYPE' => 'Relacionat al mòdul',
  'LBL_EXPORT_REMINDER_TIME' => 'Temps de recordatori (en minuts)',
);


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
  'LBL_SEQUENCE' => 'Reunió de seqüència d&#39;actualització',
  'LBL_REMOVE' => 'treure',
  'LBL_TYPE' => 'Tipus de reunió',
  'LBL_PASSWORD' => 'Clau de pas de la reunió',
  'LBL_URL' => 'Inici/Unir-se a la reunió',
  'LBL_HOST_URL' => 'Host URL',
  'LBL_DISPLAYED_URL' => 'Veure URL',
  'LBL_CREATOR' => 'Creador de la reunió',
  'LBL_EXTERNALID' => 'External App ID',
  'LBL_PARENT_TYPE' => 'Tipus de pare',
  'LBL_PARENT_ID' => 'ID Pare',
  'LBL_LIST_JOIN_MEETING' => 'Unir-se a la reunió',
  'LBL_JOIN_EXT_MEETING' => 'Unir-se a la reunió',
  'LBL_HOST_EXT_MEETING' => 'Iniciar reunió',
  'LBL_ACCEPT_STATUS' => 'Acceptar estat',
  'LBL_ACCEPT_LINK' => 'Acceptar enllaç',
  'LBL_EXTNOT_HEADER' => 'Error: No convidat',
  'LBL_EXTNOT_MAIN' => 'No són capaços d&#39;unir-se a aquesta reunió, ja que no són un convidat.',
  'LBL_EXTNOT_RECORD_LINK' => 'Veure reunió',
  'LBL_EXTNOT_GO_BACK' => 'Tornar al registre anterior',
  'LBL_EXTNOSTART_HEADER' => 'Error: No es pot iniciar la reunió',
  'LBL_EXTNOSTART_MAIN' => 'No es pot iniciar aquesta reunió, ja que no és un administrador o el propietari de la reunió.',
  'LBL_EXPORT_JOIN_URL' => 'Ingrés Url',
  'LBL_EXPORT_HOST_URL' => 'Host Url',
  'LBL_EXPORT_DISPLAYED_URL' => 'URL que es mostra',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID d&#39;usuari assignat',
  'LBL_EXPORT_EXTERNAL_ID' => 'External ID',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nom d&#39;usuari assignat',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificat per ID',
  'LBL_EXPORT_CREATED_BY' => 'Creat per ID',
  'LBL_EXPORT_DATE_START' => 'Data i hora de inici',
  'LBL_EXPORT_DATE_END' => 'Data i hora de fi',
  'LBL_EXPORT_PARENT_TYPE' => 'Tipus relacionat',
  'LBL_EXPORT_PARENT_ID' => 'ID Pare',
  'LBL_EXPORT_REMINDER_TIME' => 'Temps de recordatori (en minuts)',
  'LBL_COLON' => ':',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notes',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre a eliminar.',
  'LBL_ACCEPT_THIS' => 'Acceptar?',
  'LBL_ADD_BUTTON' => 'Afegir',
  'LBL_ADD_INVITEE' => 'Afegir Assistents',
  'LBL_CONTACT_NAME' => 'Nom Contacte:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactes',
  'LBL_CREATED_BY' => 'Creat per',
  'LBL_DATE_END' => 'Data Fi',
  'LBL_DATE_TIME' => 'Data i hora d´inici:',
  'LBL_DATE' => 'Data Inici:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Reunions',
  'LBL_DEL' => 'Esborrar',
  'LBL_DESCRIPTION_INFORMATION' => 'Informació addicional',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_DURATION_HOURS' => 'Hores Durada:',
  'LBL_DURATION_MINUTES' => 'Minuts Durada:',
  'LBL_DURATION' => 'Durada:',
  'LBL_EMAIL' => 'Correu',
  'LBL_FIRST_NAME' => 'Nom',
  'LBL_HOURS_MINS' => '(hores/minuts)',
  'LBL_INVITEE' => 'Assistents',
  'LBL_LAST_NAME' => 'Cognoms',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Usuari Assignat',
  'LBL_LIST_CLOSE' => 'Tancat',
  'LBL_LIST_CONTACT' => 'Contacte',
  'LBL_LIST_DATE_MODIFIED' => 'Data de Modificació',
  'LBL_LIST_DATE' => 'Data Inici',
  'LBL_LIST_DIRECTION' => 'Direcció',
  'LBL_LIST_DUE_DATE' => 'Data de Venciment',
  'LBL_LIST_FORM_TITLE' => 'Llista de Reunions',
  'LBL_LIST_MY_MEETINGS' => 'Les Meves Reunions',
  'LBL_LIST_RELATED_TO' => 'Relatiu a',
  'LBL_LIST_STATUS' => 'Estat',
  'LBL_LIST_SUBJECT' => 'Assumpte',
  'LBL_LIST_TIME' => 'Hora Inici',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Clients Potencials',
  'LBL_LOCATION' => 'Lloc:',
  'LBL_MEETING' => 'Reunió:',
  'LBL_MODIFIED_BY' => 'Modificat per',
  'LBL_MODULE_NAME' => 'Reunions',
  'LBL_MODULE_TITLE' => 'Reunions: Inici',
  'LBL_NAME' => 'Nom',
  'LBL_NEW_FORM_TITLE' => 'Crear Cita',
  'LBL_OUTLOOK_ID' => 'ID Outlook',
  'LBL_PHONE' => 'Telèfon',
  'LBL_REMINDER_TIME' => 'Hora Avís',
  'LBL_REMINDER' => 'Avís:',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planificació',
  'LBL_SEARCH_BUTTON' => 'Recerca',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Reunions',
  'LBL_SEND_BUTTON_LABEL' => 'Enviar Invitacions',
  'LBL_SEND_BUTTON_TITLE' => 'Enviar Invitacions [Alt+I]',
  'LBL_STATUS' => 'Estat:',
  'LBL_SUBJECT' => 'Assumpte:',
  'LBL_TIME' => 'Hora Inici:',
  'LBL_USERS_SUBPANEL_TITLE' => 'Usuaris',
  'LBL_ACTIVITIES_REPORTS' => 'Infrome d&#39;activitats',
  'LNK_MEETING_LIST' => 'Reunions',
  'LNK_NEW_APPOINTMENT' => 'Crear Cita',
  'LNK_NEW_MEETING' => 'Programar Reunió',
  'LNK_IMPORT_MEETINGS' => 'Importar Reunions',
  'NTC_REMOVE_INVITEE' => 'Està segur de que vol esborrar a aquest assistent de la reunió?',
  'LBL_CREATED_USER' => 'Usuari Creat',
  'LBL_MODIFIED_USER' => 'Usuari Modificat',
  'NOTICE_DURATION_TIME' => 'El temps de durada te que ser major que 0',
  'LBL_MEETING_INFORMATION' => 'Visió General',
);


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
  'LBL_LIST_CONTACT' => 'Contact',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Activitati',
  'LBL_MODULE_TITLE' => 'Activitati: Acasa',
  'LBL_SEARCH_FORM_TITLE' => 'Cautare activitati',
  'LBL_LIST_FORM_TITLE' => 'Lista activitati',
  'LBL_LIST_SUBJECT' => 'Subiect',
  'LBL_LIST_RELATED_TO' => 'Asociat cu',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Timp Inceput',
  'LBL_LIST_CLOSE' => 'Inchide',
  'LBL_SUBJECT' => 'Subiect',
  'LBL_STATUS' => 'Statut',
  'LBL_LOCATION' => 'Locatia:',
  'LBL_DATE_TIME' => 'Data si timpul de start',
  'LBL_DATE' => 'Data de start',
  'LBL_TIME' => 'Timpul de start',
  'LBL_DURATION' => 'Durata',
  'LBL_DURATION_MINUTES' => 'Minute Durata',
  'LBL_HOURS_MINS' => 'ore/minute',
  'LBL_CONTACT_NAME' => 'Nume Contact:',
  'LBL_MEETING' => 'Intalnire:',
  'LBL_DESCRIPTION_INFORMATION' => 'Descriere Informatie',
  'LBL_DESCRIPTION' => 'Descriere',
  'LNK_NEW_CALL' => 'Jurnal Apeluri',
  'LNK_NEW_MEETING' => 'Programeaza Intalnire',
  'LNK_NEW_TASK' => 'Creaza sarcina',
  'LNK_NEW_NOTE' => 'Creaza Nota sau Atasament',
  'LNK_NEW_EMAIL' => 'Creeaza arhive email',
  'LNK_CALL_LIST' => 'Vezi apeluri',
  'LNK_MEETING_LIST' => 'Vezi intalniri',
  'LNK_TASK_LIST' => 'vezi lista sarcini',
  'LNK_NOTE_LIST' => 'Note',
  'LNK_EMAIL_LIST' => 'Vezi Email-uri',
  'ERR_DELETE_RECORD' => 'Trebuie sa specifici un numar de inregistrare pentru a sterge contul',
  'NTC_REMOVE_INVITEE' => 'Sunteţi sigur că doriţi să eliminaţi acest invitat din intalniri?',
  'LBL_INVITEE' => 'Invitat',
  'LBL_LIST_DIRECTION' => 'Directia',
  'LBL_DIRECTION' => 'Directia',
  'LNK_NEW_APPOINTMENT' => 'Programare Noua',
  'LNK_VIEW_CALENDAR' => 'Vezi calendat',
  'LBL_OPEN_ACTIVITIES' => 'Activitati deschise',
  'LBL_HISTORY' => 'Istoric',
  'LBL_UPCOMING' => 'Intalnirile mele ce urmeaza',
  'LBL_TODAY' => 'prin',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Creeaza sarcina[Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Creaza sarcina',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Programeaza o intalnire[Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Programeaza intalnire',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Apel Log[Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Jurnal Apeluri',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Creeaza Nota sau Atasament [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Creaza Nota sau Atasament',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arhiva Email [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'arhiva email',
  'LBL_LIST_STATUS' => 'Statut',
  'LBL_LIST_DUE_DATE' => 'Pana la data:',
  'LBL_LIST_LAST_MODIFIED' => 'Ultima modificare',
  'NTC_NONE_SCHEDULED' => 'Nu este programat.',
  'LNK_IMPORT_CALLS' => 'Importa Apeluri',
  'LNK_IMPORT_MEETINGS' => 'Importa Sedinte',
  'LNK_IMPORT_TASKS' => 'Importa artibutii',
  'LNK_IMPORT_NOTES' => 'Importa Notite',
  'NTC_NONE' => 'Niciunul',
  'LBL_ACCEPT_THIS' => 'Acceptati?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Activitati deschise',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utilizator Atribuit',
  'appointment_filter_dom' => 
  array (
    'today' => 'Astazi',
    'tomorrow' => 'Maine',
    'this Saturday' => 'Saptamana asta',
    'next Saturday' => 'Saptamana viitoare',
    'last this_month' => 'Luna acesta',
    'last next_month' => 'Urmatoarea luna',
  ),
);


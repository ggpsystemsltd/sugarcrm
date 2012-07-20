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
  'LBL_INFO_START_DT' => 'Data Ora Inizio',
  'LBL_INFO_DUE_DT' => 'Data Ora Scadenza',
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINS_ABBREV' => 'm',
  'LBL_NO' => 'No',
  'LBL_STYLE_BASIC' => 'Basic',
  'LBL_MODULE_NAME' => 'Calendario',
  'LBL_MODULE_TITLE' => 'Calendario',
  'LNK_NEW_CALL' => 'Nuova Chiamata',
  'LNK_NEW_MEETING' => 'Schedula Riunione',
  'LNK_NEW_APPOINTMENT' => 'Nuovo Appuntamento',
  'LNK_NEW_TASK' => 'Nuovo Compito',
  'LNK_CALL_LIST' => 'Visualizza Chiamate',
  'LNK_MEETING_LIST' => 'Visualizza Riunioni',
  'LNK_TASK_LIST' => 'Visualizza Compiti',
  'LNK_VIEW_CALENDAR' => 'Oggi',
  'LNK_IMPORT_CALLS' => 'Importa Chiamate',
  'LNK_IMPORT_MEETINGS' => 'Importa Riunioni',
  'LNK_IMPORT_TASKS' => 'Importa Compiti',
  'LBL_MONTH' => 'Mese',
  'LBL_DAY' => 'Giorno',
  'LBL_YEAR' => 'Anno',
  'LBL_WEEK' => 'Settimana',
  'LBL_PREVIOUS_MONTH' => 'Mese Precedente',
  'LBL_PREVIOUS_DAY' => 'Giorno Precedente',
  'LBL_PREVIOUS_YEAR' => 'Anno Precedente',
  'LBL_PREVIOUS_WEEK' => 'Settimana Precedente',
  'LBL_NEXT_MONTH' => 'Mese Successivo',
  'LBL_NEXT_DAY' => 'Giorno Successivo',
  'LBL_NEXT_YEAR' => 'Anno Successivo',
  'LBL_NEXT_WEEK' => 'Settimana Successiva',
  'LBL_SCHEDULED' => 'Schedulato',
  'LBL_BUSY' => 'Occupato',
  'LBL_CONFLICT' => 'Conflitto',
  'LBL_USER_CALENDARS' => 'Calendari Utente',
  'LBL_SHARED' => 'Condiviso',
  'LBL_PREVIOUS_SHARED' => 'Precedente',
  'LBL_NEXT_SHARED' => 'Successiva',
  'LBL_SHARED_CAL_TITLE' => 'Calendario Condiviso',
  'LBL_USERS' => 'Utente',
  'LBL_REFRESH' => 'Aggiorna',
  'LBL_EDIT_USERLIST' => 'Elenco Utenti',
  'LBL_SELECT_USERS' => 'Selezionare gli utenti per la visualizzazione del calendario',
  'LBL_FILTER_BY_TEAM' => 'Filtra l´elenco degli utenti per team:',
  'LBL_ASSIGNED_TO_NAME' => 'Assegnato a:',
  'LBL_DATE' => 'Data e Ora di inizio',
  'LBL_CREATE_MEETING' => 'Pianifica Riunione',
  'LBL_CREATE_CALL' => 'Nuova Chiamata',
  'LBL_YES' => 'Sì',
  'LBL_SETTINGS' => 'Impostazioni',
  'LBL_CREATE_NEW_RECORD' => 'Nuova Attività',
  'LBL_LOADING' => 'Caricamento...',
  'LBL_SAVING' => 'Salvataggio in corso...',
  'LBL_CONFIRM_REMOVE' => 'Sei sicuro di voler eliminare il record?',
  'LBL_EDIT_RECORD' => 'Modifica Attività',
  'LBL_ERROR_SAVING' => 'Errore durante il salvataggio',
  'LBL_ERROR_LOADING' => 'Errore durante il caricamento',
  'LBL_GOTO_DATE' => 'Vai a data',
  'NOTICE_DURATION_TIME' => 'La durata deve essere superiore a 0',
  'LBL_STYLE_ADVANCED' => 'Avanzata',
  'LBL_INFO_TITLE' => 'Ulteriori Dettagli',
  'LBL_INFO_DESC' => 'Descrizione',
  'LBL_INFO_DURATION' => 'Durata',
  'LBL_INFO_NAME' => 'Oggetto',
  'LBL_INFO_RELATED_TO' => 'Relativo a',
  'LBL_NO_USER' => 'Nessuna corrispondenza per il campo: Assegnato a',
  'LBL_SUBJECT' => 'Oggetto',
  'LBL_DURATION' => 'Durata',
  'LBL_STATUS' => 'Stato',
  'LBL_DATE_TIME' => 'Data e Ora',
  'LBL_SETTINGS_TITLE' => 'Impostazioni',
  'LBL_SETTINGS_TIME_STARTS' => 'Ora inizio:',
  'LBL_SETTINGS_TIME_ENDS' => 'Ora fine:',
  'LBL_SETTINGS_CALENDAR_STYLE' => 'Stile Calendario:',
  'LBL_SETTINGS_CALLS_SHOW' => 'Mostra Chiamate:',
  'LBL_SETTINGS_TASKS_SHOW' => 'Mostra Compiti:',
  'LBL_SAVE_BUTTON' => 'Salva',
  'LBL_DELETE_BUTTON' => 'Elimina',
  'LBL_APPLY_BUTTON' => 'Applica',
  'LBL_SEND_INVITES' => 'Invia Inviti',
  'LBL_CANCEL_BUTTON' => 'Annulla',
  'LBL_CLOSE_BUTTON' => 'Chiudi',
  'LBL_GENERAL_TAB' => 'Dettagli',
  'LBL_PARTICIPANTS_TAB' => 'Invitati',
);


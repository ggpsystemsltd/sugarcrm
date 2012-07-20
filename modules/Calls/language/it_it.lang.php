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
  'LBL_ACCEPT_STATUS' => 'Accetta Stato',
  'LBL_ACCEPT_LINK' => 'Accetta Link',
  'LBL_PARENT_ID' => 'ID Padre:',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificato da ID',
  'LBL_EXPORT_CREATED_BY' => 'Creato da ID',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID Utente Assegnato',
  'LBL_EXPORT_DATE_START' => 'Data e Ora inizio',
  'LBL_EXPORT_PARENT_TYPE' => 'Collegato al Modulo',
  'LBL_EXPORT_REMINDER_TIME' => 'Promemoria (in minuti)',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_EMAIL' => 'Email',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_BLANK' => '-vuoto-',
  'LBL_MODULE_NAME' => 'Chiamate',
  'LBL_MODULE_TITLE' => 'Chiamate: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Chiamata',
  'LBL_LIST_FORM_TITLE' => 'Elenco Chiamate',
  'LBL_NEW_FORM_TITLE' => 'Nuovo Appuntamento',
  'LBL_LIST_CLOSE' => 'Chiudi',
  'LBL_LIST_SUBJECT' => 'Oggetto',
  'LBL_LIST_CONTACT' => 'Contatto',
  'LBL_LIST_RELATED_TO' => 'Relativo a',
  'LBL_LIST_RELATED_TO_ID' => 'Relativo a ID',
  'LBL_LIST_DATE' => 'Data Inizio',
  'LBL_LIST_TIME' => 'Ora Inizio',
  'LBL_LIST_DURATION' => 'Durata',
  'LBL_LIST_DIRECTION' => 'Direzione',
  'LBL_SUBJECT' => 'Oggetto:',
  'LBL_REMINDER' => 'Promemoria:',
  'LBL_CONTACT_NAME' => 'Contatto:',
  'LBL_DESCRIPTION_INFORMATION' => 'Descrizione',
  'LBL_DESCRIPTION' => 'Descrizione:',
  'LBL_STATUS' => 'Stato:',
  'LBL_DIRECTION' => 'Direzione',
  'LBL_DATE' => 'Data Inizio:',
  'LBL_DURATION' => 'Durata:',
  'LBL_DURATION_HOURS' => 'Durata Ore:',
  'LBL_DURATION_MINUTES' => 'Durata Minuti:',
  'LBL_HOURS_MINUTES' => '(ore/minuti)',
  'LBL_CALL' => 'Chiamata:',
  'LBL_DATE_TIME' => 'Data e Ora Inizio:',
  'LBL_TIME' => 'Ora Inizio:',
  'LNK_NEW_CALL' => 'Nuova Chiamata',
  'LNK_NEW_MEETING' => 'Pianifica Riunione',
  'LNK_CALL_LIST' => 'Visualizza Chiamate',
  'LNK_IMPORT_CALLS' => 'Importa Chiamate',
  'ERR_DELETE_RECORD' => 'Per eliminare l´azienda è necessario fornire il numero del record.',
  'NTC_REMOVE_INVITEE' => 'Sei sicuro di voler togliere questo invitato dalla chiamata?',
  'LBL_INVITEE' => 'Invitati',
  'LBL_RELATED_TO' => 'Relativo a:',
  'LNK_NEW_APPOINTMENT' => 'Nuovo Appuntamento',
  'LBL_SCHEDULING_FORM_TITLE' => 'In schedulazione',
  'LBL_ADD_INVITEE' => 'Aggiungi Invitati',
  'LBL_NAME' => 'Nome',
  'LBL_FIRST_NAME' => 'Nome',
  'LBL_LAST_NAME' => 'Cognome',
  'LBL_PHONE' => 'Telefono',
  'LBL_SEND_BUTTON_TITLE' => 'Invia Inviti [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Invia Inviti',
  'LBL_DATE_END' => 'Data Fine',
  'LBL_TIME_END' => 'Ora Fine',
  'LBL_REMINDER_TIME' => 'Tempo di Avviso',
  'LBL_SEARCH_BUTTON' => 'Cerca',
  'LBL_ACTIVITIES_REPORTS' => 'Report Attività',
  'LBL_ADD_BUTTON' => 'Aggiungi',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Chiamate',
  'LBL_LOG_CALL' => 'Nuova Chiamata',
  'LNK_SELECT_ACCOUNT' => 'Seleziona Azienda',
  'LNK_NEW_ACCOUNT' => 'Nuova Azienda',
  'LNK_NEW_OPPORTUNITY' => 'Nuova Opportunità',
  'LBL_DEL' => 'Cancella',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Lead',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contatti',
  'LBL_USERS_SUBPANEL_TITLE' => 'Utenti',
  'LBL_OUTLOOK_ID' => 'ID Outlook',
  'LBL_MEMBER_OF' => 'Membro di',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Note',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Assegnato a:',
  'LBL_LIST_MY_CALLS' => 'Le mie Chiamate',
  'LBL_SELECT_FROM_DROPDOWN' => 'Si prega prima di selezionare una voce dalla lista dropdown di Collegato a',
  'LBL_ASSIGNED_TO_NAME' => 'Assegnato a:',
  'LBL_ASSIGNED_TO_ID' => 'Utente Assegnato:',
  'NOTICE_DURATION_TIME' => 'La durata deve essere superiore a 0',
  'LBL_CALL_INFORMATION' => 'Informazioni Chiamata',
  'LBL_REMOVE' => 'Canc',
);


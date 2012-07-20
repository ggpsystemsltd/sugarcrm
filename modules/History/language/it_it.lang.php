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
  'LBL_COLON' => ':',
  'LNK_EMAIL_LIST' => 'Email',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Cronologia',
  'LBL_MODULE_TITLE' => 'Cronologia: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Cronologia',
  'LBL_LIST_FORM_TITLE' => 'Cronologia',
  'LBL_LIST_SUBJECT' => 'Oggetto',
  'LBL_LIST_CONTACT' => 'Contatto',
  'LBL_LIST_RELATED_TO' => 'Relativo a',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Ora Inizio',
  'LBL_LIST_CLOSE' => 'Chiudi',
  'LBL_SUBJECT' => 'Oggetto:',
  'LBL_STATUS' => 'Status:',
  'LBL_LOCATION' => 'Luogo:',
  'LBL_DATE_TIME' => 'Data e Ora Inizio:',
  'LBL_DATE' => 'Data Inizio:',
  'LBL_TIME' => 'Ora Inizio:',
  'LBL_DURATION' => 'Durata:',
  'LBL_HOURS_MINS' => '(ore/minuti)',
  'LBL_CONTACT_NAME' => 'Nome Contatto:',
  'LBL_MEETING' => 'Riunione:',
  'LBL_DESCRIPTION_INFORMATION' => 'Descrizione',
  'LBL_DESCRIPTION' => 'Descrizione:',
  'LBL_DEFAULT_STATUS' => 'Pianificato',
  'LNK_NEW_CALL' => 'Nuova Chiamata',
  'LNK_NEW_MEETING' => 'Nuova Riunione',
  'LNK_NEW_TASK' => 'Nuovo Compito',
  'LNK_NEW_NOTE' => 'Nuova Nota o Allegato',
  'LNK_NEW_EMAIL' => 'Archivia Email',
  'LNK_CALL_LIST' => 'Chiamate',
  'LNK_MEETING_LIST' => 'Riunioni',
  'LNK_TASK_LIST' => 'Compiti',
  'LNK_NOTE_LIST' => 'Note',
  'ERR_DELETE_RECORD' => 'Per eliminare l´azienda deve essere specificato il numero del record.',
  'NTC_REMOVE_INVITEE' => 'Sei sicuro di voler eliminare questo invitato dalla riunione?',
  'LBL_INVITEE' => 'Invitati',
  'LBL_LIST_DIRECTION' => 'Ordine',
  'LBL_DIRECTION' => 'Ordine',
  'LNK_NEW_APPOINTMENT' => 'Nuovo Appuntamento',
  'LNK_VIEW_CALENDAR' => 'Oggi',
  'LBL_OPEN_ACTIVITIES' => 'Attività Aperte',
  'LBL_HISTORY' => 'Cronologia',
  'LBL_UPCOMING' => 'I miei Prossimi Appuntamenti',
  'LBL_TODAY' => 'per',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Nuovo Compito [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Nuovo Compito',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Nuova Riunione[Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Nuova Riunione',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Nuova Chiamata[Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Nuova Chiamata',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Nuova Nota o Allegato [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Nuova Nota o Allegato',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archivia Email [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archivia Email',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LIST_DUE_DATE' => 'Data Scadenza',
  'LBL_LIST_LAST_MODIFIED' => 'Ultima Modifica',
  'NTC_NONE_SCHEDULED' => 'Niente di pianificato.',
  'LNK_IMPORT_NOTES' => 'Importa Note',
  'NTC_NONE' => 'Nessuno',
  'LBL_ACCEPT_THIS' => 'Accetti?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Cronologia',
  'appointment_filter_dom' => 
  array (
    'today' => 'oggi',
    'tomorrow' => 'domani',
    'this Saturday' => 'questa settimana',
    'next Saturday' => 'la prossima settimana',
    'last this_month' => 'questo mese',
    'last next_month' => 'il prossimo mese',
  ),
);


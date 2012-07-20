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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Le specifiche cron girano in base al fuso orario del server (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Si prega di specificare il tempo di esecuzione della schedulazione di conseguenza.',
  'LBL_LIST_STATUS' => 'Status:',
  'LBL_MINS' => 'min',
  'LBL_STATUS' => 'Status',
  'LBL_OOTB_WORKFLOW' => 'Esegui le operazioni del workflow',
  'LBL_OOTB_REPORTS' => 'Esegui i report dei compiti schedulati',
  'LBL_OOTB_IE' => 'Controlla la posta in arrivo',
  'LBL_OOTB_BOUNCE' => 'Invia di notte le email rimbalzate delle campagne',
  'LBL_OOTB_CAMPAIGN' => 'Invia di notte le campagne email',
  'LBL_OOTB_PRUNE' => 'Riduci le dimensioni del database il primo giorno del mese',
  'LBL_OOTB_TRACKER' => 'Riduci le tabelle del tracker',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Aggiorna tabella tracker_sessions',
  'LBL_LIST_JOB_INTERVAL' => 'Intervallo:',
  'LBL_LIST_LIST_ORDER' => 'Schedulatori:',
  'LBL_LIST_NAME' => 'Schedulatore:',
  'LBL_LIST_RANGE' => 'Intervallo:',
  'LBL_LIST_REMOVE' => 'Rimuovi:',
  'LBL_LIST_TITLE' => 'Elenco Schedulazioni:',
  'LBL_LIST_EXECUTE_TIME' => 'Sarà eseguito di:',
  'LBL_SUN' => 'Domenica',
  'LBL_MON' => 'Lunedì',
  'LBL_TUE' => 'Martedì',
  'LBL_WED' => 'Mercoledì',
  'LBL_THU' => 'Giovedì',
  'LBL_FRI' => 'Venerdì',
  'LBL_SAT' => 'Sabato',
  'LBL_ALL' => 'Ogni Giorno',
  'LBL_EVERY_DAY' => 'Ogni giorno',
  'LBL_AT_THE' => 'Al',
  'LBL_EVERY' => 'Ogni',
  'LBL_FROM' => 'Da',
  'LBL_ON_THE' => 'Al',
  'LBL_RANGE' => 'a',
  'LBL_AT' => 'di',
  'LBL_IN' => 'in',
  'LBL_AND' => 'e',
  'LBL_MINUTES' => 'minuti',
  'LBL_HOUR' => 'ore',
  'LBL_HOUR_SING' => 'ora',
  'LBL_MONTH' => 'mese',
  'LBL_OFTEN' => 'Il più spesso possibile.',
  'LBL_MIN_MARK' => 'minuto scelto',
  'LBL_HOURS' => 'ore',
  'LBL_DAY_OF_MONTH' => 'data',
  'LBL_MONTHS' => 'mese',
  'LBL_DAY_OF_WEEK' => 'giorno',
  'LBL_CRONTAB_EXAMPLES' => 'Questo utilizza soprattutto la notazione standard crontab.',
  'LBL_ALWAYS' => 'Sempre',
  'LBL_CATCH_UP' => 'Esegui Se Mancato',
  'LBL_CATCH_UP_WARNING' => 'Togli la selezione se questa operazione può richiedere molto tempo per l´esecuzione.',
  'LBL_DATE_TIME_END' => 'Data e Ora Fine',
  'LBL_DATE_TIME_START' => 'Data e Ora Inizio',
  'LBL_INTERVAL' => 'Intervallo',
  'LBL_JOB' => 'Operazione',
  'LBL_LAST_RUN' => 'Ultima Esecuzione senza errori',
  'LBL_MODULE_NAME' => 'Schedulatore Sugar',
  'LBL_MODULE_TITLE' => 'Schedulatori',
  'LBL_NAME' => 'Nome Operazione',
  'LBL_NEVER' => 'Mai',
  'LBL_NEW_FORM_TITLE' => 'Nuova Schedulazione',
  'LBL_PERENNIAL' => 'perpetua',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Schedulazione',
  'LBL_SCHEDULER' => 'Schedulatore:',
  'LBL_TIME_FROM' => 'Attivo Da',
  'LBL_TIME_TO' => 'Attivo A',
  'LBL_WARN_CURL_TITLE' => 'Avviso cURL:',
  'LBL_WARN_CURL' => 'Avviso:',
  'LBL_WARN_NO_CURL' => 'Il PHP di questo sistema non ha le librerie cURL (--with-curl=/path/to/curl_library). Contatta l´amministratore del server per risolvere questo problema. Senza queste librerie non è possibile eseguire le operazioni schedulate.',
  'LBL_BASIC_OPTIONS' => 'Configurazione Base',
  'LBL_ADV_OPTIONS' => 'Opzioni Avanzate',
  'LBL_TOGGLE_ADV' => 'Mostra Opzioni Avanzate',
  'LBL_TOGGLE_BASIC' => 'Mostra Opzioni Base',
  'LNK_LIST_SCHEDULER' => 'Schedulatori',
  'LNK_NEW_SCHEDULER' => 'Nuova Schedulazione',
  'LNK_LIST_SCHEDULED' => 'Operazioni Schedulate',
  'SOCK_GREETING' => "\nQuesta è l´interfaccia per il Servizio di Schedulazione di SugarCRM. \n[ Comandi del servizio disponibili: start|restart|shutdown|status ]\n Per uscire scrivi 'Esci'. Per arrestare il servizio scrivi 'Chiudi'.\n'",
  'ERR_DELETE_RECORD' => 'Per eliminare la schedulazione deve essere specificato il numero del record.',
  'ERR_CRON_SYNTAX' => 'Syntax Cron non valida',
  'NTC_DELETE_CONFIRMATION' => 'Sei sicuro di voler eliminare questo record?',
  'NTC_STATUS' => 'Configura lo stato in Inattivo per rimuovere questa schedulazione dalla lista dei schedulatori.',
  'NTC_LIST_ORDER' => 'Imposta l´ordine con cui appariranno queste schedulazioni nell´elenco dei schedulatori.',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Per impostare il schedulatore di Windows',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Per impostare il Crontab',
  'LBL_CRON_LINUX_DESC' => 'Nota: Per eseguire gli schedulatori di Sugar, aggiungere la seguente riga al file crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Nota: Per eseguire gli schedulatori di Sugar, creare un file batch usando le operazioni schedulate di Windows. Il file batch dovrebbe includere i seguenti comandi:',
  'LBL_NO_PHP_CLI' => 'Se il tuo server non ha disponibile il PHP, puoi usare wget o curl per lanciare le operazioni.<br>for wget: <b>*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;wget --quiet --non-verbose '.$sugar_config['site_url'].'/cron.php > /dev/null 2>&amp;1</b><br>for curl: <b>*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;*&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;curl --silent '.$sugar_config['site_url'].'/cron.php > /dev/null 2>&amp;1',
  // Subpanels
 'LBL_JOBS_SUBPANEL_TITLE'	=> 'Operazioni Attive',
  'LBL_EXECUTE_TIME' => 'Tempo di Esecuzione',
  
  //jobstrings
  'LBL_REFRESHJOBS' => 'Aggiorna Jobs',
  'LBL_POLLMONITOREDINBOXES' => 'Controlla gli indirizzi email della posta in arrivo',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Invia di notte le campagne email massive',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Invia durante la notte le email rimbalzate della campagna',
  'LBL_PRUNEDATABASE' => 'Riduci il Database il primo giorno del mese',
  'LBL_TRIMTRACKER' => 'Riduci le tabelle del tracker',
  'LBL_PROCESSWORKFLOW' => 'Esegui le operazioni del workflow',
  'LBL_PROCESSQUEUE' => 'Esegui i report dei compiti schedulati',
  'LBL_UPDATETRACKERSESSIONS' => 'Aggiorna le tabelle di sessione del Tracker',
);





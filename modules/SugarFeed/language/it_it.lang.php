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
  'LBL_POST_TITLE' => 'Pubblica l&#39;aggiornamento di stato per',
  'LBL_URL_LINK_TITLE' => 'Link URL da usare',
  'LBL_TEAM' => 'Team',
  'LBL_ID' => 'ID',
  'LBL_TEAM_ID' => 'Id Team',
  'LBL_ASSIGNED_TO_ID' => 'Id Utente Assegnato',
  'LBL_ASSIGNED_TO_NAME' => 'Assegnato a',
  'LBL_DATE_ENTERED' => 'Data Creazione',
  'LBL_DATE_MODIFIED' => 'Data Modifica',
  'LBL_MODIFIED' => 'Modificato da',
  'LBL_MODIFIED_ID' => 'Modificato da Id',
  'LBL_MODIFIED_NAME' => 'Modificato da Nome',
  'LBL_CREATED' => 'Creato da',
  'LBL_CREATED_ID' => 'Creato da Id',
  'LBL_DESCRIPTION' => 'Descrizione',
  'LBL_DELETED' => 'Cancellato',
  'LBL_NAME' => 'Nome',
  'LBL_SAVING' => 'Salvataggio in corso...',
  'LBL_SAVED' => 'Salvato',
  'LBL_CREATED_USER' => 'Creato da Utente',
  'LBL_MODIFIED_USER' => 'Modificato da Utente',
  'LBL_LIST_FORM_TITLE' => 'Elenco Sugar Feed',
  'LBL_MODULE_NAME' => 'Sugar Feed',
  'LBL_MODULE_TITLE' => 'Sugar Feed',
  'LBL_DASHLET_DISABLED' => 'Attenzione: Il sistema Sugar Feed è disabilitato, nessuna nuova voce verrà inserita finchè non verrà riattivato',
  'LBL_ADMIN_SETTINGS' => 'Impostazioni Sugar Feed',
  'LBL_RECORDS_DELETED' => 'Tutte le precedenti voci di Sugar Feed sono state cancellate, se il sistema di Sugar Feed è abilitato, le nuove voci verranno generate automaticamente.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Sei sicuro di voler cancellare tutte le voci di Sugar Feed?',
  'LBL_FLUSH_RECORDS' => 'Cancella Voci Feed',
  'LBL_ENABLE_FEED' => 'Abilita Sugar Feed',
  'LBL_ENABLE_MODULE_LIST' => 'Attiva Feeds per',
  'LBL_HOMEPAGE_TITLE' => 'I miei Sugar Feed',
  'LNK_NEW_RECORD' => 'Crea Sugar Feed',
  'LNK_LIST' => 'Sugar Feed',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Sugar Feed',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Visualizza Cronologia',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Attività',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugar Feed',
  'LBL_NEW_FORM_TITLE' => 'Nuovo Sugar Feed',
  'LBL_ALL' => 'Tutti',
  'LBL_USER_FEED' => 'Utente Feed',
  'LBL_ENABLE_USER_FEED' => 'Attiva Utente Feed',
  'LBL_TO' => 'Invia al Team',
  'LBL_IS' => 'è',
  'LBL_DONE' => 'Fatto',
  'LBL_TITLE' => 'Titolo',
  'LBL_ROWS' => 'Righe',
  'LBL_MY_FAVORITES_ONLY' => 'Solo i Preferiti',
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => 'Nota: per permettere agli utenti di visualizzare i feeds di Facebook e Twitter, vai nelle Impostazioni Connettori e configura i connettori di Facebook e Twitter.',
  'LBL_CATEGORIES' => 'Moduli',
  'LBL_TIME_LAST_WEEK' => 'Settimana Scorsa',
  'LBL_TIME_WEEKS' => 'Settimane',
  'LBL_TIME_DAYS' => 'Giorni',
  'LBL_TIME_YESTERDAY' => 'Ieri',
  'LBL_TIME_HOURS' => 'Ore',
  'LBL_TIME_HOUR' => 'Ore',
  'LBL_TIME_MINUTES' => 'Minuti',
  'LBL_TIME_MINUTE' => 'Minuto',
  'LBL_TIME_SECONDS' => 'Secondi',
  'LBL_TIME_SECOND' => 'Secondo',
  'LBL_TIME_AGO' => 'fa',
  'CREATED_CONTACT' => 'ha creato un <b>NUOVO</b> contatto',
  'CREATED_OPPORTUNITY' => 'ha creato una <b>NUOVA</b> opportunità',
  'CREATED_CASE' => 'ha creato un <b>NUOVO</b> reclamo',
  'CREATED_LEAD' => 'ha creato un <b>NUOVO</b> lead',
  'FOR' => 'per',
  'CLOSED_CASE' => 'ha <b>CHIUSO</b> un reclamo',
  'CONVERTED_LEAD' => 'ha <b>CONVERTITO</b> un lead',
  'WON_OPPORTUNITY' => 'ha <b>VINTO</b> un´opportunità',
  'WITH' => 'con',
  'LBL_LINK_TYPE_Link' => 'Collegamento',
  'LBL_LINK_TYPE_Image' => 'Immagine',
  'LBL_LINK_TYPE_YouTube' => 'YouTube™',
  'LBL_SELECT' => 'Seleziona',
  'LBL_POST' => 'Pubblica',
  'LBL_EXTERNAL_PREFIX' => 'Esterno:',
  'LBL_EXTERNAL_WARNING' => 'Gli elementi marcati "esterno" richiedono un <a href="?module=EAPM">account esterno</a>.',
  'LBL_AUTHENTICATE' => 'Autentica',
  'LBL_AUTHENTICATION_PENDING' => 'Non tutti gli account esterni che hai selezionato sono stati autenticati. Clicca "Annulla" per tornare alle Opzioni e autenticare gli account esterni, oppure clicca "Ok" per procedere senza autenticazione.',
  'LBL_ADVANCED_SEARCH' => 'Ricerca Avanzata',
  'LBL_BASICSEARCH' => 'Ricerca di Base',
  'LBL_SHOW_MORE_OPTIONS' => 'Mostra più opzioni',
  'LBL_HIDE_OPTIONS' => 'Nascondi Opzioni',
  'LBL_VIEW' => 'Visualizza',
  'LBL_TEAM_VISIBILITY_TITLE' => 'team che possono vedere questo post',
);


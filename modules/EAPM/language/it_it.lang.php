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
  'LBL_CONNECT_BUTTON_TITLE' => 'Connetti',
  'LBL_NOTE' => 'Nota',
  'LBL_CONNECTED' => 'Connesso',
  'LBL_DISCONNECTED' => 'Non connesso',
  'LBL_ERR_POPUPS_DISABLED' => 'Si prega di abilitare le finestre popup del browser o di aggiungere un´eccezione per il sito "{0}" alla lista delle eccezioni al fine di connettersi.',
  'LBL_ID' => 'ID',
  'LBL_TEAM' => 'Teams',
  'LBL_TEAMS' => 'Teams',
  'LBL_URL' => 'URL',
  'LBL_API_CONSKEY' => 'Consumer Key',
  'LBL_API_CONSSECRET' => 'Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_MEET_NOW_BUTTON' => 'Meet Now',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'Id Utente assegnato',
  'LBL_ASSIGNED_TO_NAME' => 'Utente Sugar',
  'LBL_DATE_ENTERED' => 'Data Creazione',
  'LBL_DATE_MODIFIED' => 'Data Modifica',
  'LBL_MODIFIED' => 'Modificato Da',
  'LBL_MODIFIED_ID' => 'Modificato Da Id',
  'LBL_MODIFIED_NAME' => 'Modificato dal Nome',
  'LBL_CREATED' => 'Creato Da',
  'LBL_CREATED_ID' => 'Creato Da Id',
  'LBL_DESCRIPTION' => 'Descrizione',
  'LBL_DELETED' => 'Eliminato',
  'LBL_NAME' => 'Nome Utente App',
  'LBL_CREATED_USER' => 'Creato dall´Utente',
  'LBL_MODIFIED_USER' => 'Modificato dall´Utente',
  'LBL_LIST_NAME' => 'Nome',
  'LBL_TEAM_ID' => 'Id Team',
  'LBL_LIST_FORM_TITLE' => 'Elenco Account Esterni',
  'LBL_MODULE_NAME' => 'Account Esterno',
  'LBL_MODULE_TITLE' => 'Accounts Esterni',
  'LBL_HOMEPAGE_TITLE' => 'I miei Accounts Esterni',
  'LNK_NEW_RECORD' => 'Crea un Account Esterno',
  'LNK_LIST' => 'Visualizza Accounts Esterni',
  'LNK_IMPORT_SUGAR_EAPM' => 'Importa Accounts Esterni',
  'LBL_SEARCH_FORM_TITLE' => 'Ricerca sorgente esterna',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Visualizza Cronologia',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Attività',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Accounts Esterni',
  'LBL_NEW_FORM_TITLE' => 'Nuovo Account Esterno',
  'LBL_PASSWORD' => 'Password App',
  'LBL_USER_NAME' => 'Nome Utente App',
  'LBL_APPLICATION' => 'Applicazione',
  'LBL_API_DATA' => 'Dati API',
  'LBL_API_TYPE' => 'Tipo Login',
  'LBL_AUTH_UNSUPPORTED' => 'Questa modalità di autorizzazione non è supportata dall´pplicazione.',
  'LBL_AUTH_ERROR' => 'Tentativo di autenticazione dell´account esterno fallito.',
  'LBL_VALIDATED' => 'Accesso convalidato',
  'LBL_ACTIVE' => 'Attivo',
  'LBL_SUGAR_USER_NAME' => 'Utente Sugar',
  'LBL_DISPLAY_PROPERTIES' => 'Visualizza Proprietà',
  'LBL_ERR_NO_AUTHINFO' => 'Non ci sono informazioni relative all´autenticazione per questo account.',
  'LBL_ERR_NO_TOKEN' => 'Non ci sono tokens di login validi per questo account.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Al momento non sei connesso al tuo {0} account. Clicca OK per rieffettuare il login al tuo account e attivare il record dell´account esterno.',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Visualizza le Riunioni di LotusLive™ pianificate',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Riunioni di LotusLive™ pianificate',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Visualizza i Documenti di LotusLive™',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'Documenti di LotusLive™',
  'LBL_REAUTHENTICATE_LABEL' => 'Riautenticazione',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Per questa applicazione esiste già un account. Abbiamo ripristinato l´account esistente.',
  'LBL_OMIT_URL' => '(Ometti http:// o https://)',
  'LBL_OAUTH_SAVE_NOTICE' => 'Clicca Salva per creare il record dell´account esterno. Sarai indirizzato in una pagina in cui dovrai inserire le informazioni del tuo account per autorizzare l´accesso da Sugar. Dopo aver inserito le informazioni sul tuo account, sarai rindirizzato in Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Clicca Salva per creare il record dell´account esterno. In seguito Sugar convaliderà le tue credenziali.',
  'LBL_ERR_FACEBOOK' => 'Facebook ha riscontrato un errore, e i feed non possono essere visualizzati.',
  'LBL_ERR_NO_RESPONSE' => 'Si è verificato un errore nel salvataggio dell´account esterno.',
  'LBL_ERR_TWITTER' => 'Twitter ha riscontrato un errore, e i feed non possono essere visualizzati',
);



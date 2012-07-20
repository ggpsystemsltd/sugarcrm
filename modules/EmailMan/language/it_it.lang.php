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
  'LBL_GMAIL_LOGO' => 'Gmail',
  'LBL_YAHOO_MAIL_LOGO' => 'Yahoo Mail',
  'LBL_EXCHANGE_LOGO' => 'Exchange',
  'LBL_HELP' => 'Help',
  'LBL_ID' => 'Id',
  'LBL_MAIL_SMTPPASS' => 'Password:',
  'LBL_MODULE_ID' => 'EmailMan',
  'LBL_SECURITY_APPLET' => 'Applet tag',
  'LBL_SECURITY_BASE' => 'Base tag',
  'LBL_SECURITY_EMBED' => 'Embed tag',
  'LBL_SECURITY_FORM' => 'Form tag',
  'LBL_SECURITY_FRAME' => 'Frame tag',
  'LBL_SECURITY_FRAMESET' => 'Frameset tag',
  'LBL_SECURITY_IFRAME' => 'iFrame tag',
  'LBL_SECURITY_LAYER' => 'Layer tag',
  'LBL_SECURITY_LINK' => 'Link tag',
  'LBL_SECURITY_OBJECT' => 'Object tag',
  'LBL_SECURITY_SCRIPT' => 'Script tag',
  'LBL_SECURITY_STYLE' => 'Style tag',
  'LBL_SECURITY_XMP' => 'Xmp tag',
  'LBL_NO' => 'No',
  'LBL_SEND_DATE_TIME' => 'Data Invio',
  'LBL_IN_QUEUE' => 'In Corso',
  'LBL_IN_QUEUE_DATE' => 'Data in Coda',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Per specificare il numero di email inviate per batch usare solamente valori interi',
  'LBL_ATTACHMENT_AUDIT' => 'è stato inviato. Non è stato duplicato localmente per risparmiare spazio su disco.',
  'LBL_CONFIGURE_SETTINGS' => 'Configura Impostazioni Email',
  'LBL_CUSTOM_LOCATION' => 'Utente Definito',
  'LBL_DEFAULT_LOCATION' => 'Predefinito',
  'LBL_DISCLOSURE_TITLE' => 'Inserisci Messaggio Integrativo in ogni Email',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Contenuto del Messaggio Integrativo',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'ATTENZIONE: Questa email è per il solo uso del destinatario (i) e può contenere informazioni riservate e privilegiate. Ogni utilizzo, comunicazione, distribuzione, revisione non autorizzata è vietata. Se non siete il destinatario, vi prego di distruggere tutte le copie del messaggio originale e comunicarlo al mittente in modo che indirizzo di registrazione possa essere corretto. Grazie.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Componi messaggi email usando questo set di caratteri',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Componi email usando questo client',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Elimina note correlate & files allegati con le email eliminate',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Imposta Gmail™ di default',
  'LBL_EMAIL_PER_RUN_REQ' => 'Numero di email per batch:',
  'LBL_EMAIL_SMTP_SSL' => 'Abilita SMTP su SSL?',
  'LBL_EMAIL_USER_TITLE' => 'Email Utente Predefinite',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Configurazione Email in uscita',
  'LBL_EMAILS_PER_RUN' => 'Numero di email inviate per batch:',
  'LBL_LIST_CAMPAIGN' => 'Campagna',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Processati',
  'LBL_LIST_FORM_TITLE' => 'Coda',
  'LBL_LIST_FROM_EMAIL' => 'Da Email',
  'LBL_LIST_FROM_NAME' => 'Da Nome',
  'LBL_LIST_IN_QUEUE' => 'In Corso',
  'LBL_LIST_MESSAGE_NAME' => 'Messaggio Marketing',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Email Destinatario',
  'LBL_LIST_RECIPIENT_NAME' => 'Nome Destinatario',
  'LBL_LIST_SEND_ATTEMPTS' => 'Tentativi di Invio',
  'LBL_LIST_SEND_DATE_TIME' => 'Spedire',
  'LBL_LIST_USER_NAME' => 'Nome Utente',
  'LBL_LOCATION_ONLY' => 'Posizione',
  'LBL_LOCATION_TRACK' => 'Posizione dei file di monitoraggio della campagna (ad es. campaing_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Mantieni una copia dei messaggi delle campagne:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Vuole conservare una copia di <bold>OGNI</bold> messaggio email inviato durante tutte le campagne?  <bold>Noi consigliamo e impostiamo no.</bold>. Scegliendo no sarà conservato solamente il template che è stato usato e che necessita di eventuali variabili per essere riutilizzato come messaggio individuale.',
  'LBL_MAIL_SENDTYPE' => 'Mail Transfer Agent (MTA):',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Utilizzare Autenticazione SMTP ?',
  'LBL_MAIL_SMTPPORT' => 'Porta SMTP:',
  'LBL_MAIL_SMTPSERVER' => 'Server Mail SMTP:',
  'LBL_MAIL_SMTPUSER' => 'Nome Utente:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Scegli il tuo provider Email',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Password Mail Yahoo!',
  'LBL_YAHOOMAIL_SMTPUSER' => 'ID Mail Yahoo!',
  'LBL_GMAIL_SMTPPASS' => 'Password Gmail',
  'LBL_GMAIL_SMTPUSER' => 'Indirizzo Email di Gmail',
  'LBL_EXCHANGE_SMTPPASS' => 'Cambia Password',
  'LBL_EXCHANGE_SMTPUSER' => 'Cambia Nome Utente',
  'LBL_EXCHANGE_SMTPPORT' => 'Cambia Porta Server',
  'LBL_EXCHANGE_SMTPSERVER' => 'Cambia Server',
  'LBL_EMAIL_LINK_TYPE' => 'Client Email',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Client di posta di Sugar:</b> Invia email utilizzando il client di posta dell´applicazione Sugar.<br><b>Client di posta esterno:</b> Invia email utilizzando un client di posta esterno all´applicazione Sugar, come Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'ID Marketing',
  'LBL_MODULE_NAME' => 'Impostazioni Email',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Configura le impostazioni delle Campagne Email',
  'LBL_MODULE_TITLE' => 'Gestione Coda Email in uscita',
  'LBL_NOTIFICATION_ON_DESC' => 'Se abilitato, le email vengono inviate agli utenti quando i record vengono assegnati a loro.',
  'LBL_NOTIFY_FROMADDRESS' => '"Da" Indirizzo:',
  'LBL_NOTIFY_FROMNAME' => '"Da" Nome:',
  'LBL_NOTIFY_ON' => 'Assegnazione Notifiche',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Inviare notifiche ai nuovi utenti',
  'LBL_NOTIFY_TITLE' => 'Opzioni Email',
  'LBL_OLD_ID' => 'Vecchio ID',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Opzioni Posta in Uscita',
  'LBL_RELATED_ID' => 'ID Correlato',
  'LBL_RELATED_TYPE' => 'Tipo Relazione',
  'LBL_SAVE_OUTBOUND_RAW' => 'Salva Sorgente delle Email in Uscita',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Cerca Processati',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Coda',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Mostra Email Processate',
  'LBL_VIEW_QUEUED_EMAILS' => 'Mostra Email in Coda',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Valore delle impostazioni site_url di config.php',
  'TXT_REMOVE_ME_ALT' => 'Per rimuoverti da questa lista vai in',
  'TXT_REMOVE_ME_CLICK' => 'clicca qui',
  'TXT_REMOVE_ME' => 'Per rimuoverti da questa lista',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Invia notifica dall´indirizzo email degli utenti assegnati?',
  'LBL_SECURITY_TITLE' => 'Impostazioni Sicurezza Email',
  'LBL_SECURITY_DESC' => 'Seleziona i tag che non devono essere permessi nelle mail in entrata o mostrati nel modulo Email.',
  'LBL_SECURITY_IMPORT' => 'Importa tag',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Selezione il livello minimo di sicurezza per Outlook (errori nella visualizzazione).',
  'LBL_SECURITY_TOGGLE_ALL' => 'Attiva tutte le opzioni',
  'LBL_YES' => 'Sì',
  'LBL_PREPEND_TEST' => '[Test]:',
  'LBL_SEND_ATTEMPTS' => 'Invia Tentativi',
  'LBL_OUTGOING_SECTION_HELP' => 'Configura il server di posta in uscita predefinito per inviare notifiche via email, inclusi avvisi del workflow.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Permetti agli utenti di utilizzare questo account per le email in uscita:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Scegliendo questa opzione, tutti gli utenti saranno in grado di inviare emails utilizzando lo stesso <br> mail account utilizzato per inviare notifiche e segnalazioni del sistema.  Se non si sceglie questa opzione,<br> gli utenti possono ancora utilizzare il server di posta in uscita dopo aver fornito i dati del loro account personale.',
  'LBL_FROM_ADDRESS_HELP' => 'Se attivato, il nome e l´indirizzo email dell´utente che assegna saranno inclusi nel campo Da dell´email. Questa funzione potrebbe non funzionare con servers SMTP che non permettono l´invio da un account di email diverso dal server accunt.',
);


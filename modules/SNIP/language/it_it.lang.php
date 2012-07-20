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
  'LBL_SNIP_MOUSEOVER_STATUS' => 'Questo è lo stato del servizio per l´archiviazione email nella tua istanza. Lo stato mostra se la connessione tra il server per l´archiviazione email e la tua istanza Sugar è corretta.',
  'LBL_SNIP_MOUSEOVER_EMAIL' => 'Questo è l´indirizzo a cui inviare per l´archiviazione email in Sugar.',
  'LBL_SNIP_MOUSEOVER_SERVICE_URL' => 'Questo è l´URL del server per l´archiviazione email. Tutte le richieste, come l´attivazione o la disattivazione del servizio, saranno inoltrate tramite questo URL.',
  'LBL_SNIP_MOUSEOVER_INSTANCE_URL' => 'Questo l´URL webservices della tua istanza Sugar. Il server per l´archiviazione email si connette al tuo server mediante questo URL.',
  'LBL_SNIP_SUMMARY' => 'L´archiviazione email è un servizio di importazione automatica che consente agli utenti di archiviare emails da un qualsiasi client o servizio di posta ad un indirizzo Sugar fornito. Ogni istanza Sugar ha il proprio indirizzo email. Per importare le email, l´utente invia all´inidirizzo email fornito utilizzando i campi A, CC, BCC. Il servizio di archiviazione email importerà l´email nell´instanza Sugar.  Esso importa email, ed eventuali allegati, immagini e attività del Calendario, e crea records nell´applicazione che sono associati a quelli già esistenti sulla base di indirizzi email corrispondenti.<br /><br />Esempio: un utente, quando visualizza un´azienda, potrà vedere tutte le email associate all´azienda sulla base dell´indirizzo email dell´azienda. Potrà vedere anche le email associate ai contatti relazionati all´azienda. <br /><br />Accetta i termini indicati di seguito e clicca Attiva per iniziare ad utilizzare il servizio. Sarà possibile disattivarlo in qualsiasi momento. Una volta attivato, verrò visualizzato l´indirizzo email utilizzato per l´importazione.',
  'LBL_REGISTER_SNIP_FAIL' => 'Impossibile contattare il servizio di archiviazione email: %s!',
  'LBL_CONFIGURE_SNIP' => 'Archiviazione Email',
  'LBL_DISABLE_SNIP' => 'Disabilitare',
  'LBL_SNIP_APPLICATION_UNIQUE_KEY' => 'Chiave univoca di applicazione',
  'LBL_SNIP_USER' => 'Utente per l´archiviazione email',
  'LBL_SNIP_PWD' => 'Password per l´archiviazione email',
  'LBL_SNIP_SUGAR_URL' => 'URL istanza Sugar',
  'LBL_SNIP_CALLBACK_URL' => 'URL del servizio archiviazione email',
  'LBL_SNIP_USER_DESC' => 'Utente per l´archiviazione email',
  'LBL_SNIP_STATUS_OK' => 'Attivato',
  'LBL_SNIP_STATUS_OK_SUMMARY' => 'Questa istanza di Sugar è stata collegata con successo al server per l´archiviazione delle email.',
  'LBL_SNIP_STATUS_ERROR' => 'Errore',
  'LBL_SNIP_STATUS_ERROR_SUMMARY' => 'Questa istanza ha una licenza server per l´archiviazione delle email valida, ma il server restituisce il seguente messaggio di errore:',
  'LBL_SNIP_STATUS_FAIL' => 'Non è possibile registrarsi con il server per l´archiviazione email',
  'LBL_SNIP_STATUS_FAIL_SUMMARY' => 'Il servizio per l´archiviazione delle email non è attualmente disponibile. O il servizio è giù o la connessione a questa istanza di Sugar è fallita.',
  'LBL_SNIP_GENERIC_ERROR' => 'Il servizio per l´archiviazione delle email non è attualmente disponibile. O il servizio è giù o la connessione a questa istanza di Sugar è fallita.',
  'LBL_SNIP_STATUS_RESET' => 'Non ancora eseguito',
  'LBL_SNIP_STATUS_PROBLEM' => 'Problema: %s',
  'LBL_SNIP_NEVER' => 'Mai',
  'LBL_SNIP_STATUS_SUMMARY' => 'Stato del servizio per l´archiviazione delle email:',
  'LBL_SNIP_ACCOUNT' => 'Azienda',
  'LBL_SNIP_STATUS' => 'Stato',
  'LBL_SNIP_LAST_SUCCESS' => 'Ultima esecuzione corretta',
  'LBL_SNIP_DESCRIPTION' => 'Il servizio per l´archiviazione delle email è un sistema di archiviazione email automatico',
  'LBL_SNIP_DESCRIPTION_SUMMARY' => 'Esso ti permette di vedere le email che sono state inviate a o da i contatti dentro SugarCRM, senza che tu debba manualmente importare e collegare le email',
  'LBL_SNIP_PURCHASE_SUMMARY' => 'Per poter usare il servizio di Archiviazione Email, devi acquistare una licenza per la tua istanza di SugarCRM',
  'LBL_SNIP_PURCHASE' => 'Clicca qui per acquistare',
  'LBL_SNIP_EMAIL' => 'Indirizzo per l´archiviazione email',
  'LBL_SNIP_AGREE' => "Accetto i termini sopra indicati e <a href='http://www.sugarcrm.com/crm/TRUSTe/privacy.html' target='_blank'>l´accordo di riservatezza</a>.",
  'LBL_SNIP_PRIVACY' => 'Contratto di riservatezza',
  'LBL_SNIP_STATUS_PINGBACK_FAIL' => 'Pingback fallito',
  'LBL_SNIP_STATUS_PINGBACK_FAIL_SUMMARY' => 'Il server per l´archiviazione email non è in grado di stabilire una connessione con la tua istanza Sugar. Si prega di riprovare o <a href="http://www.sugarcrm.com/crm/case-tracker/submit.html?lsd=supportportal&amp;amp;tmpl=" target="_blank">contatta l´assistenza clienti </a>.',
  'LBL_SNIP_BUTTON_ENABLE' => 'Attiva Archiviazione email',
  'LBL_SNIP_BUTTON_DISABLE' => 'Disattiva Archiviazione email',
  'LBL_SNIP_BUTTON_RETRY' => 'Riprova connessione',
  'LBL_SNIP_ERROR_DISABLING' => 'Si è verificato un errore nel tentativo di comunicare con il server per l´archiviazione email, e il servizio non può disabilitato',
  'LBL_SNIP_ERROR_ENABLING' => 'Si è verificato un errore nel tentativo di comunicare con il server per l´archiviazione email, e il servizio non può disabilitato',
  'LBL_CONTACT_SUPPORT' => 'Si prega di riprovare o contattare il supporto della SugarCRM.',
  'LBL_SNIP_SUPPORT' => 'Si prega di contattare il supporto SugarCRM per assistenza',
  'ERROR_BAD_RESULT' => 'Restituiti dal servizio risultati negativi',
  'ERROR_NO_CURL' => 'Estensione cURL necessaria, ma non abilitata',
  'ERROR_REQUEST_FAILED' => 'Impossibile contattare il server',
  'LBL_CANCEL_BUTTON_TITLE' => 'Annulla',
);



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
  'LBL_USER_TYPE' => 'Tipo Utente',
  'LBL_EMAIL_LINK_TYPE' => 'Client Email',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Client di posta di Sugar:</b> Invia email utilizzando il client di posta dell´applicazione Sugar.<br><b>Client di posta esterno:</b> Invia email utilizzando un client di posta esterno all´applicazione Sugar, come ad esempio Microsoft Outlook.',
  'LBL_ONLY_ACTIVE' => 'Dipendenti attivi',
  'LBL_SELECT' => 'Seleziona',
  'LBL_FF_CLEAR' => 'Azzera',
  'LBL_AUTHENTICATE_ID' => 'ID Autenticazione',
  'LBL_EXT_AUTHENTICATE' => 'Autenticazione Esterna',
  'LBL_GROUP_USER' => 'Gruppo Utenti',
  'LBL_LIST_ACCEPT_STATUS' => 'Accetta Stato',
  'LBL_MODIFIED_BY' => 'Modificato Da',
  'LBL_MODIFIED_BY_ID' => 'Modificato Da Id',
  'LBL_CREATED_BY_NAME' => 'Creato Da',
  'LBL_PORTAL_ONLY_USER' => 'Portal API User',
  'LBL_PSW_MODIFIED' => 'Ultima Password Cambiata',
  'LBL_SHOW_ON_EMPLOYEES' => 'Mostra Record Dipendenti',
  'LBL_USER_HASH' => 'Password',
  'LBL_SYSTEM_GENERATED_PASSWORD' => 'Password Generate dal Sistema',
  'LBL_PICTURE_FILE' => 'Immagine',
  'LBL_DESCRIPTION' => 'Descrizione',
  'LBL_FAX_PHONE' => 'Fax',
  'LBL_STATUS' => 'Stato',
  'LBL_ADDRESS_CITY' => 'Indirizzo Comune',
  'LBL_ADDRESS_COUNTRY' => 'Indirizzo Nazione',
  'LBL_ADDRESS_POSTALCODE' => 'Indirizzo CAP',
  'LBL_ADDRESS_STATE' => 'Indirizzo Provincia',
  'LBL_ADDRESS_STREET' => 'Indirizzo Via',
  'LBL_DATE_MODIFIED' => 'Data Modifica',
  'LBL_DATE_ENTERED' => 'Data inserimento',
  'LBL_DELETED' => 'Cancellato',
  'LBL_LOGIN' => 'Login',
  'LBL_LIST_EMAIL' => 'Email',
  'LBL_LIST_ADMIN' => 'Admin',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_PASSWORD' => 'Password:',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Dipendenti',
  'LBL_MODULE_TITLE' => 'Dipendenti: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Dipendente',
  'LBL_LIST_FORM_TITLE' => 'Dipendenti',
  'LBL_NEW_FORM_TITLE' => 'Nuovo Dipendente',
  'LBL_EMPLOYEE' => 'Dipendenti:',
  'LBL_RESET_PREFERENCES' => 'Ripristina Preferenze Predefinite',
  'LBL_TIME_FORMAT' => 'Formato Ora:',
  'LBL_DATE_FORMAT' => 'Formato Data:',
  'LBL_TIMEZONE' => 'Fuso Orario:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_LIST_NAME' => 'Nome',
  'LBL_LIST_LAST_NAME' => 'Cognome',
  'LBL_LIST_EMPLOYEE_NAME' => 'Nome Dipendente',
  'LBL_LIST_DEPARTMENT' => 'Dipartimento',
  'LBL_LIST_REPORTS_TO_NAME' => 'Dipende Da',
  'LBL_LIST_PRIMARY_PHONE' => 'Telefono',
  'LBL_LIST_USER_NAME' => 'Nome Utente',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Nuovo Dipendente [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Nuovo Dipendente',
  'LBL_ERROR' => 'Errore:',
  'LBL_EMPLOYEE_NAME' => 'Nome Dipendente:',
  'LBL_USER_NAME' => 'Nome Utente:',
  'LBL_FIRST_NAME' => 'Nome:',
  'LBL_LAST_NAME' => 'Cognome:',
  'LBL_EMPLOYEE_SETTINGS' => 'Impostazioni Dipendente',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Lingua:',
  'LBL_ADMIN' => 'Amministratore:',
  'LBL_EMPLOYEE_INFORMATION' => 'Informazioni Dipendente',
  'LBL_OFFICE_PHONE' => 'Telefono Ufficio:',
  'LBL_REPORTS_TO' => 'Dipende da Id:',
  'LBL_REPORTS_TO_NAME' => 'Dipende da',
  'LBL_OTHER_PHONE' => 'Altro:',
  'LBL_OTHER_EMAIL' => 'Altra Email:',
  'LBL_NOTES' => 'Note:',
  'LBL_DEPARTMENT' => 'Divisione:',
  'LBL_TITLE' => 'Funzione:',
  'LBL_ANY_ADDRESS' => 'Altro indirizzo:',
  'LBL_ANY_PHONE' => 'Altro Telefono:',
  'LBL_ANY_EMAIL' => 'Altra Email:',
  'LBL_ADDRESS' => 'Indirizzo:',
  'LBL_CITY' => 'Comune:',
  'LBL_STATE' => 'Provincia:',
  'LBL_POSTAL_CODE' => 'CAP:',
  'LBL_COUNTRY' => 'Nazione:',
  'LBL_NAME' => 'Nome:',
  'LBL_MOBILE_PHONE' => 'Telefono Cellulare:',
  'LBL_OTHER' => 'Altro:',
  'LBL_FAX' => 'Fax:',
  'LBL_EMAIL' => 'Email:',
  'LBL_HOME_PHONE' => 'Telefono Casa:',
  'LBL_WORK_PHONE' => 'Telefono Lavoro:',
  'LBL_ADDRESS_INFORMATION' => 'Indirizzo',
  'LBL_EMPLOYEE_STATUS' => 'Stato Dipendente:',
  'LBL_PRIMARY_ADDRESS' => 'Indirizzo principale:',
  'LBL_SAVED_SEARCH' => 'Opzioni Layout',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Nuovo Utente [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Nuovo Utente',
  'LBL_FAVORITE_COLOR' => 'Colore Preferito:',
  'LBL_MESSENGER_ID' => 'Nome IM:',
  'LBL_MESSENGER_TYPE' => 'Tipo IM:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Nome Dipendente',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'esiste già. Non sono ammessi dipendenti con lo stesso nome. Modifica il nome afffinchè sia unico.',
  'ERR_LAST_ADMIN_1' => 'Il dipendente "',
  'ERR_LAST_ADMIN_2' => 'è l´ultimo dipendente con accesso amministrativo. Deve esserci almeno un dipendente amministratore.',
  'LNK_NEW_EMPLOYEE' => 'Nuovo Dipendente',
  'LNK_EMPLOYEE_LIST' => 'Vista Dipendenti',
  'ERR_DELETE_RECORD' => 'Per eliminare l´azienda deve essere specificato il numero del record.',
  'LBL_DEFAULT_TEAM' => 'Team Predefinito:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Seleziona il team predefinito per i nuovi record',
  'LBL_MY_TEAMS' => 'I miei Team',
  'LBL_LIST_DESCRIPTION' => 'Descrizione',
  'LNK_EDIT_TABS' => 'Modifica Schede',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Sei sicuro di voler rimuovere questo membro?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Stato Dipendente',
  'LBL_SUGAR_LOGIN' => 'è utente sugar',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Notifica di Assegnazione',
  'LBL_IS_ADMIN' => 'è Amministratore',
  'LBL_GROUP' => 'Gruppo Utenti',
  'LBL_PORTAL_ONLY' => 'Portale Solo Utenti',
  'LBL_PHOTO' => 'Foto',
  'LBL_DELETE_USER_CONFIRM' => 'Questo dipendente è anche un utente. Eliminando il record del dipendente verrà eliminato anche il record dell´utente, e l´utente non sarà più in grado di accedere all´applicativo. Vuoi procedere ugualmente con l´eliminazione di questo record?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Sei sicuro di voler eliminare questo dipendente?',
);


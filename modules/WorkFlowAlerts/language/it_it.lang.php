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
  'LBL_EDITLAYOUT' => 'Modifica Layout',
  'LBL_TEAM' => 'Team',
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Elenco Destinatari Avvisi',
  'LBL_MODULE_TITLE' => 'Destinatari: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Destinatario Workflow',
  'LBL_LIST_FORM_TITLE' => 'Elenco Destinatari',
  'LBL_NEW_FORM_TITLE' => 'Crea Destinatario Workflow',
  'LBL_LIST_USER_TYPE' => 'Tipo Utente',
  'LBL_LIST_ARRAY_TYPE' => 'Tipo Azione',
  'LBL_LIST_RELATE_TYPE' => 'Tipo Relazione',
  'LBL_LIST_ADDRESS_TYPE' => 'Tipo Indirizzo',
  'LBL_LIST_FIELD_VALUE' => 'Utente',
  'LBL_LIST_REL_MODULE1' => 'Modulo Collegato',
  'LBL_LIST_REL_MODULE2' => 'Modulo Collegato',
  'LBL_LIST_WHERE_FILTER' => 'Stato',
  'LBL_USER_TYPE' => 'Tipo Utente:',
  'LBL_ARRAY_TYPE' => 'Tipo Azione:',
  'LBL_RELATE_TYPE' => 'Tipo Relazione:',
  'LBL_WHERE_FILTER' => 'Stato:',
  'LBL_FIELD_VALUE' => 'Utente Selezionato:',
  'LBL_REL_MODULE1' => 'Modulo Collegato:',
  'LBL_REL_MODULE2' => 'Modulo Collegato:',
  'LBL_CUSTOM_USER' => 'Utente Personalizzato:',
  'LNK_NEW_WORKFLOW' => 'Crea Workflow',
  'LNK_WORKFLOW' => 'Oggetto Workflow',
  'LBL_LIST_STATEMENT' => 'Avviso Destinatari:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Manda avviso al seguente destinatario:',
  'LBL_ALERT_CURRENT_USER' => 'Un utente associato all´obiettivo',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Un utente associato al modulo obiettivo',
  'LBL_ALERT_REL_USER' => 'Un utente associato ad una relazione',
  'LBL_ALERT_REL_USER_TITLE' => 'Un utente associato ad un modulo collegato',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Destinatario associato ad una relazione',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Destinatario associato ad un modulo collegato',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Destinatario associato al modulo obiettivo',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Destinatario associato al modulo obiettivo',
  'LBL_ALERT_SPECIFIC_USER' => 'Uno specifico',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Un utente specifico',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Tutti gli utenti in uno specifico',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Tutti gli utenti in uno specifico team',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Tutti gli utenti in uno specifico',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Tutti gli utenti in un ruolo specifico',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Membri del team associati al modulo obiettivi',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Tutti gli utenti che appartengono al team associato al modulo obiettivi',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Utente connesso al momento dell´esecuzione',
  'LBL_RECORD' => 'Modulo',
  'LBL_USER' => 'Utente',
  'LBL_USER_MANAGER' => 'Responsabile dell´utente',
  'LBL_ROLE' => 'ruolo',
  'LBL_SEND_EMAIL' => 'Manda una email a:',
  'LBL_USER1' => 'chi ha creato il record',
  'LBL_USER2' => 'chi ha modificato per ultimo il record',
  'LBL_USER3' => 'Attuale',
  'LBL_USER3b' => 'di sistema.',
  'LBL_USER4' => 'chi è assegnato il record',
  'LBL_USER5' => 'chi era assegnato il record',
  'LBL_ADDRESS_TO' => 'a:',
  'LBL_ADDRESS_BCC' => 'ccn:',
  'LBL_ADDRESS_TYPE' => 'utilizzando l´indirizzo',
  'LBL_ADDRESS_TYPE_TARGET' => 'tipo',
  'LBL_ALERT_REL1' => 'Modulo Collegato:',
  'LBL_ALERT_REL2' => 'Modulo Collegato:',
  'LBL_NEXT_BUTTON' => 'Avanti',
  'LBL_PREVIOUS_BUTTON' => 'Indietro',
  'NTC_REMOVE_ALERT_USER' => 'Sicuro di voler rimuovere questo destinatario dell´avviso?',
  'LBL_REL_CUSTOM_STRING' => 'Seleziona email personalizzata e nome dei campi',
  'LBL_REL_CUSTOM' => 'Seleziona Campi Email Personalizzata:',
  'LBL_REL_CUSTOM2' => 'Campo',
  'LBL_AND' => 'e Nome Campo:',
  'LBL_REL_CUSTOM3' => 'Campo',
  'LBL_FILTER_CUSTOM' => '(Filtro Aggiuntivo) Filtra modulo collegato per specifica',
  'LBL_FIELD' => 'Campo',
  'LBL_SPECIFIC_FIELD' => 'campo',
  'LBL_FILTER_BY' => '(Filtro Aggiuntivo) Filtra modulo collegato per',
  'LBL_MODULE_NAME_INVITE' => 'Elenco Invitati',
  'LBL_LIST_STATEMENT_INVITE' => 'Invitati Riunione/Chiamata:',
  'LBL_SELECT_VALUE' => 'Devi selezionare un valore valido.',
  'LBL_SELECT_NAME' => 'Devi selezionare un nome personalizzato del campo',
  'LBL_SELECT_EMAIL' => 'Devi selezionare un campo email personalizzato',
  'LBL_SELECT_FILTER' => 'Devi selezionare un campo da filtrare per',
  'LBL_SELECT_NAME_EMAIL' => 'Devi selezionare i campi nome ed email',
  'LBL_PLEASE_SELECT' => 'Si prega di Selezionare',
);


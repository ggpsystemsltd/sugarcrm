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
  'LBL_EXPORT_CAMPAIGN_ID' => 'ID Campagna',
  'LBL_OPPORTUNITY_TYPE' => 'Tipo Opportunità',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nome Utente Assegnato',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID Utente Assegnato',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificato da ID',
  'LBL_EXPORT_CREATED_BY' => 'Creato da ID',
  'LBL_EXPORT_NAME' => 'Nome',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Email Contatti Relazionati',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_NAME' => 'Opportunità',
  'LBL_MODULE_TITLE' => 'Opportunità: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca Opportunità',
  'LBL_VIEW_FORM_TITLE' => 'Vista Opportunità',
  'LBL_LIST_FORM_TITLE' => 'Elenco Opportunità',
  'LBL_OPPORTUNITY_NAME' => 'Nome Opportunità:',
  'LBL_OPPORTUNITY' => 'Opportunità:',
  'LBL_NAME' => 'Nome Opportunità',
  'LBL_INVITEE' => 'Contatti',
  'LBL_CURRENCIES' => 'Valute',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Nome',
  'LBL_LIST_ACCOUNT_NAME' => 'Nome Azienda',
  'LBL_LIST_AMOUNT' => 'Importo Opportunità',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Importo',
  'LBL_LIST_DATE_CLOSED' => 'Chiusa',
  'LBL_LIST_SALES_STAGE' => 'Fase di Vendita',
  'LBL_ACCOUNT_ID' => 'ID Azienda',
  'LBL_CURRENCY_ID' => 'ID Valuta',
  'LBL_CURRENCY_NAME' => 'Nome Valuta',
  'LBL_CURRENCY_SYMBOL' => 'Simbolo Valuta',
  'LBL_TEAM_ID' => 'ID Team',
  'UPDATE' => 'Aggiornamento Opportunità - Valuta',
  'UPDATE_DOLLARAMOUNTS' => 'Aggiorna Importi Dollari U.S.',
  'UPDATE_VERIFY' => 'Controlla Importi',
  'UPDATE_VERIFY_TXT' => 'Verifica che gli importi nelle opportunità siano numeri decimali validi composti soltanto da caratteri numerici (0-9) e da decimali (.)',
  'UPDATE_FIX' => 'Importo Fisso',
  'UPDATE_FIX_TXT' => 'Prova a correggere gli importi non validi a partire dagli importi correnti. Verrà creata una copia di backup in un campo amount_backup. Se esegui la correzione e noti degli errori ripristina i valori precedenti prima di effettuare altre correzioni, altrimenti perderai  i valori memorizzati nella copia di backup.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Aggiorna gli importi in Dollari USA per le opportunità basandosi sul cambio corrente. Questo valore viene utilizzato per costruire i Grafici e l´elenco delle viste degli importi in valuta.',
  'UPDATE_CREATE_CURRENCY' => 'Creazione Nuova Valuta:',
  'UPDATE_VERIFY_FAIL' => 'Verifica Fallita del Record:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Importo Attuale:',
  'UPDATE_VERIFY_FIX' => 'L´avvio della correzione comporterebbe',
  'UPDATE_INCLUDE_CLOSE' => 'Includi Record Chiusi',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nuovo Importo:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nuova Valuta:',
  'UPDATE_DONE' => 'Fatto',
  'UPDATE_BUG_COUNT' => 'Bugs trovati e in attesa di essere risolti:',
  'UPDATE_BUGFOUND_COUNT' => 'Bugs Trovati:',
  'UPDATE_COUNT' => 'Record Aggiornati:',
  'UPDATE_RESTORE_COUNT' => 'Importi del record ripristinati:',
  'UPDATE_RESTORE' => 'Ripristina Importi',
  'UPDATE_RESTORE_TXT' => 'Ripristina gli importi dalle copie di backup create durante la correzione.',
  'UPDATE_FAIL' => 'Impossibile aggiornare -',
  'UPDATE_NULL_VALUE' => 'L´importo è NULLO impostandolo a 0 -',
  'UPDATE_MERGE' => 'Unisci Valute',
  'UPDATE_MERGE_TXT' => 'Unisci più valute in un´unica valuta. Se noti che la stessa valuta si ripete più volte puoi scegliere di unirle. Quest´operazione unirà le valute anche per tutti gli altri moduli.',
  'LBL_ACCOUNT_NAME' => 'Nome Azienda:',
  'LBL_AMOUNT' => 'Importo Opportunità:',
  'LBL_AMOUNT_USDOLLAR' => 'Importo:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Data Chiusura Prevista:',
  'LBL_TYPE' => 'Tipo:',
  'LBL_CAMPAIGN' => 'Campagna:',
  'LBL_NEXT_STEP' => 'Prossimo Passo:',
  'LBL_LEAD_SOURCE' => 'Fonte del Lead:',
  'LBL_SALES_STAGE' => 'Fase di Vendita:',
  'LBL_PROBABILITY' => 'Probabilità (%):',
  'LBL_DESCRIPTION' => 'Descrizione:',
  'LBL_DUPLICATE' => 'Possibile Duplicato dell´Opportunità',
  'MSG_DUPLICATE' => 'L´opportunità che stai creando potrebbe generare un duplicato. L´opportunità ha un nome simile rispetto a quelle elencate qui sotto. Clicca Salva per continuare con la creazione di questa nuova opportunità, o clicca Annulla per ritornare al modulo senza creare l´opportunità.',
  'LBL_NEW_FORM_TITLE' => 'Crea Opportunità',
  'LNK_NEW_OPPORTUNITY' => 'Crea Opportunità',
  'LNK_OPPORTUNITY_REPORTS' => 'Visualizza Report Opportunità',
  'LNK_OPPORTUNITY_LIST' => 'Visualizza Opportunità',
  'ERR_DELETE_RECORD' => 'Per eliminare questa opportunità deve essere specificato un numero del record.',
  'LBL_TOP_OPPORTUNITIES' => 'Le mie 10 migliori Opportunità',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Sei sicuro di voler eliminare il contatto da questa opportunità?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Sei sicuro di rimuovere questa opportunità dal progetto?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Opportunità',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Attività',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Cronologia',
  'LBL_RAW_AMOUNT' => 'Importo Riga',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contatti',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Offerte',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documenti',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Progetti',
  'LBL_ASSIGNED_TO_NAME' => 'Assegnato a:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utente Assegnato',
  'LBL_CONTRACTS' => 'Contratti',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contratti',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Le mie Oppurtunità Chiuse',
  'LBL_TOTAL_OPPORTUNITIES' => 'Totale Oppurtunità',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Oppurtunità Chiuse Vinte',
  'LBL_ASSIGNED_TO_ID' => 'Utente Assegnato:',
  'LBL_CREATED_ID' => 'Creato da ID',
  'LBL_MODIFIED_ID' => 'Modificato da ID',
  'LBL_MODIFIED_NAME' => 'Modificato da Nome Utente',
  'LBL_CREATED_USER' => 'Utente Creato',
  'LBL_MODIFIED_USER' => 'Utente Modificato',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Campagne',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Progetti',
  'LABEL_PANEL_ASSIGNMENT' => 'Assegnazione',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importa Oppurtunità',
);


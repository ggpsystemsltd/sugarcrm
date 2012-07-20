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
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documente',
  'LBL_MODULE_NAME' => 'Oportunitati',
  'LBL_MODULE_TITLE' => 'Oportunitati :Acasa',
  'LBL_SEARCH_FORM_TITLE' => 'Cautare oportunitate',
  'LBL_VIEW_FORM_TITLE' => 'Vizualizare Oportunitati',
  'LBL_LIST_FORM_TITLE' => 'Lista oportunitati',
  'LBL_OPPORTUNITY_NAME' => 'Nume Oportunitate:',
  'LBL_OPPORTUNITY' => 'Oportunitati',
  'LBL_NAME' => 'Nume Oportunitate:',
  'LBL_INVITEE' => 'Contacte',
  'LBL_CURRENCIES' => 'Valute',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Nume',
  'LBL_LIST_ACCOUNT_NAME' => 'Numele Contului',
  'LBL_LIST_AMOUNT' => 'Cantitate Oportunitate:',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Cantitatea:',
  'LBL_LIST_DATE_CLOSED' => 'Inchide',
  'LBL_LIST_SALES_STAGE' => 'Sadiul Vanzarilor',
  'LBL_ACCOUNT_ID' => 'Identitate Cont',
  'LBL_CURRENCY_ID' => 'Moneda Id',
  'LBL_CURRENCY_NAME' => 'Nume Moneda',
  'LBL_CURRENCY_SYMBOL' => 'Simbol Moneda',
  'LBL_TEAM_ID' => 'ID Echipa:',
  'UPDATE' => 'Vanzari - Actualizare Moneda',
  'UPDATE_DOLLARAMOUNTS' => 'Update Sume Dolari U. S.',
  'UPDATE_VERIFY' => 'Verifica sumele',
  'UPDATE_VERIFY_TXT' => 'Verifică dacă valorile in suma de vânzări sunt valabile numerele zecimale  numai cu caractere numerice (0-9) şi numărul de zecimale (.)',
  'UPDATE_FIX' => 'Sume fixe',
  'UPDATE_FIX_TXT' => 'Încercările de a rezolva orice sume incorecte, prin crearea unui zecimal valid din valoarea actuală. Orice sumă modificata este susţinuta în domeniul baza de date amount_backup . Dacă rulaţi acest anunţ şi observati probleme, nu-l rulaţi din nou fără restaurarea din backup, deoarece se poate suprascrie  cu noile date incorecte.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Actualizaţi sumele pentru dolarul american pentru vânzări pe baza ratelor actuale valutar stabilite. Această valoare este folosită pentru a calcula grafice şi Lista Vizualizare Sume valutare.',
  'UPDATE_CREATE_CURRENCY' => 'Creaza moneda noua',
  'UPDATE_VERIFY_FAIL' => 'Verificare a inregistrarii esuata',
  'UPDATE_VERIFY_CURAMOUNT' => 'Cantitate suma:',
  'UPDATE_VERIFY_FIX' => 'Efectuand Depanare ne va da',
  'UPDATE_INCLUDE_CLOSE' => 'Include si Inregistrarile Inchise',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Suma Noua:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Moneda noua:',
  'UPDATE_DONE' => 'Terminat',
  'UPDATE_BUG_COUNT' => 'Probleme gasite si incercate sa fie rezolvate',
  'UPDATE_BUGFOUND_COUNT' => 'Probleme gasite:',
  'UPDATE_COUNT' => 'Inregistrari actualizate',
  'UPDATE_RESTORE_COUNT' => 'Inregistrari sume restaurate',
  'UPDATE_RESTORE' => 'Restabileste sume',
  'UPDATE_RESTORE_TXT' => 'Restabileste valoarea sumelor din valorile de rezerva create in timpul depanarii',
  'UPDATE_FAIL' => 'Nu au fost putut fi actualizate -',
  'UPDATE_NULL_VALUE' => 'Suma este NULA sabilind-o 0 -',
  'UPDATE_MERGE' => 'Imbina monede',
  'UPDATE_MERGE_TXT' => 'Îmbina mai multe monede într-o monedă unică. Dacă există mai multe înregistrări monedă pentru aceeaşi monedă, imbina împreună. Acest lucru va imbina, de asemenea, monedele din toate celelalte module.',
  'LBL_ACCOUNT_NAME' => 'Numele Contului',
  'LBL_AMOUNT' => 'Cantitatea oportunitatii:',
  'LBL_AMOUNT_USDOLLAR' => 'Cantitatea:',
  'LBL_CURRENCY' => 'Moneda',
  'LBL_DATE_CLOSED' => 'Data la care se asteapta sa se inchida',
  'LBL_TYPE' => 'Tip',
  'LBL_CAMPAIGN' => 'Campanie',
  'LBL_NEXT_STEP' => 'Urmatorul Pas:',
  'LBL_LEAD_SOURCE' => 'Sursa principala',
  'LBL_SALES_STAGE' => 'Sadiul Vanzarilor',
  'LBL_PROBABILITY' => 'Probabilitate (%):',
  'LBL_DESCRIPTION' => 'Descriere',
  'LBL_DUPLICATE' => 'Posibila Oportunitate Duplicata',
  'MSG_DUPLICATE' => 'Inregistrarea oportunitatii ce sunteti pe cale sa o creati poate fi un duplicat al unei inregistrari de oportunitate care exista deja. Inregistrarile de oportunitate care contin nume si/sau adrese de email similare sunt listate mai jos. Dati click pe Salvare pentru a continua sa creati aceasta noua oportunitate, sau dati click pe Revocare pentru a reveni la modul fara ca oportunitatea sa fie creata.',
  'LBL_NEW_FORM_TITLE' => 'Creeaza Oportunitate',
  'LNK_NEW_OPPORTUNITY' => 'Creeaza Oportunitate',
  'LNK_OPPORTUNITY_REPORTS' => 'Vezi rapoarte oportunitati',
  'LNK_OPPORTUNITY_LIST' => 'Vezi oportunitati',
  'ERR_DELETE_RECORD' => 'Trebuie sa specifici un numar de inregistrare pentru a sterge oportunitatea',
  'LBL_TOP_OPPORTUNITIES' => 'Topul celor mai deschise oportunitati',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Sunteti sigur ca vreti sa stergeti acest contact din oportunitate?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Sunteti sigur ca vreti sa stergeti aceasta oportunitate din proiect?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Oportunitati',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activitati',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istoric',
  'LBL_RAW_AMOUNT' => 'Suma Bruta',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Antete',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacte',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Cotatii',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Proiecte',
  'LBL_ASSIGNED_TO_NAME' => 'Atrbuit lui',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utilizator Atribuit',
  'LBL_CONTRACTS' => 'Contracte',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contracte',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Oportunitatile mele inchise',
  'LBL_TOTAL_OPPORTUNITIES' => 'Oportunitatile totale',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Oportunitatile castigate inchise',
  'LBL_ASSIGNED_TO_ID' => 'Atribuit ID Utilizator',
  'LBL_CREATED_ID' => 'Creata de ID',
  'LBL_MODIFIED_ID' => 'Modificata de ID',
  'LBL_MODIFIED_NAME' => 'Modificata de Nume',
  'LBL_CREATED_USER' => 'Utilizator creat',
  'LBL_MODIFIED_USER' => 'Utilizator Modificat',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Campanii',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Proiecte',
  'LABEL_PANEL_ASSIGNMENT' => 'Sarcina',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importa oportunitati',
);


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


















$mod_strings = array (
  'UPDATE' => 'Vanzari - Actualizare Moneda',
  'LBL_MODULE_NAME' => 'Vanzari',
  'LBL_MODULE_TITLE' => 'Vanzari:Acasa',
  'LBL_SEARCH_FORM_TITLE' => 'Cautare Vanzari',
  'LBL_VIEW_FORM_TITLE' => 'Vedere vanzari',
  'LBL_LIST_FORM_TITLE' => 'Lista Vanzari',
  'LBL_SALE_NAME' => 'Nume vanzari',
  'LBL_SALE' => 'Vanzari',
  'LBL_NAME' => 'Nume vanzari',
  'LBL_LIST_SALE_NAME' => 'Nume',
  'LBL_LIST_ACCOUNT_NAME' => 'Nume Cont',
  'LBL_LIST_AMOUNT' => 'Suma, valoare',
  'LBL_LIST_DATE_CLOSED' => 'inchis',
  'LBL_LIST_SALE_STAGE' => 'Etapa vanzare',
  'LBL_ACCOUNT_ID' => 'Cont id',
  'LBL_CURRENCY_ID' => 'Valabilitate Id ',
  'LBL_TEAM_ID' => 'Echipa ID',
  
  
  
  
  'UPDATE_DOLLARAMOUNTS' => 'Update Sume Dolari U. S. ',
  'UPDATE_VERIFY' => 'Verifica sumele',
  'UPDATE_VERIFY_TXT' => 'Verifică dacă valorile in suma de vânzări sunt valabile numerele zecimale  numai cu caractere numerice (0-9) şi numărul de zecimale (.)',
  'UPDATE_FIX' => 'Sume fixe',
  'UPDATE_FIX_TXT' => 'Încercările de a rezolva orice sume incorecte, prin crearea unui zecimal valid din valoarea actuală. Orice sumă modificata este susţinuta în domeniul baza de date amount_backup . Dacă rulaţi acest anunţ şi observati probleme, nu-l rulaţi din nou fără restaurarea din backup, deoarece se poate suprascrie  cu noile date incorecte.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Actualizaţi sumele pentru dolarul american pentru vânzări pe baza ratelor actuale valutar stabilite. Această valoare este folosită pentru a calcula grafice şi Lista Vizualizare Sume valutare.
',
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
  'LBL_AMOUNT' => 'Suma:',
  'LBL_AMOUNT_USDOLLAR' => 'Suma USD:',
  'LBL_CURRENCY' => 'Moneda',
  'LBL_DATE_CLOSED' => 'Data la care se asteapta sa se inchida',
  'LBL_TYPE' => 'Tip',
  'LBL_CAMPAIGN' => 'Campanie',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Antete',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Proiecte',
  'LBL_NEXT_STEP' => 'Urmatorul Pas',
  'LBL_LEAD_SOURCE' => 'Sursa principala',
  'LBL_SALES_STAGE' => 'Sadiul Vanzarilor',
  'LBL_PROBABILITY' => 'Probabilitate (%):',
  'LBL_DESCRIPTION' => 'Descriere',
  'LBL_DUPLICATE' => 'Posibil Vanzari Duplicate',
  'MSG_DUPLICATE' => 'Inregistrarea vanzarilor pe care sunteţi pe cale de a o crea ar putea fi un duplicat al unei înregistrări de vanzari care există deja. Inregistrarile contului care conţin nume similare sunt enumerate mai jos.
Faceţi clic pe Salvare pentru a continua crearea ascestei Vanzari noi, sau faceţi clic pe Revocare pentru a reveni la modul fără a crea Vanzarea.',
  'LBL_NEW_FORM_TITLE' => 'Creeaza vanzare',
  'LNK_NEW_SALE' => 'Creeaza Vanzare',
  'LNK_SALE_LIST' => 'Vanzari',
  'ERR_DELETE_RECORD' => 'Trebuie sa specifici un numar de inregistrare pentru a sterge aceasta vanzare',
  'LBL_TOP_SALES' => 'Cea mai deschisa vanzare',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Sunteti sigur ca vreti sa stergeti acest contact din vanzare?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Sunteti sigur ca vreti sa stergeti aceasta vazanare din proiect?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Conturi',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activitati',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istoric',
  'LBL_RAW_AMOUNT' => 'Suma Bruta',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacte',
  'LBL_ASSIGNED_TO_NAME' => 'Atrbuit lui',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atribuit utilizatorului',
  'LBL_MY_CLOSED_SALES' => 'Vanzarile mele inchise',
  'LBL_TOTAL_SALES' => 'Total Vanzari',
  'LBL_CLOSED_WON_SALES' => 'Vanzari castigate inchise',
  'LBL_ASSIGNED_TO_ID' => 'Atribuit catre ID ',
  'LBL_CREATED_ID' => 'Creata de ID',
  'LBL_MODIFIED_ID' => 'Modificata de ID',
  'LBL_MODIFIED_NAME' => 'Modificata de Nume',
  'LBL_SALE_INFORMATION' => 'Informatii Vanzare',
  'LBL_CURRENCY_NAME' => 'Nume Moneda',
  'LBL_CURRENCY_SYMBOL' => 'Simbol Moneda',
);


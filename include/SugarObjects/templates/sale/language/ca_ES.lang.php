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

/*********************************************************************************

 * Source: SugarCRM 5.2.0
 * Contributor(s): Ramón Feliu (ramon@slay.es).
 ********************************************************************************/
 
 $mod_strings = array (
  'LBL_MODULE_NAME' => 'Vendes',
  'LBL_MODULE_TITLE' => 'Vendes: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Cerca de Vendes',
  'LBL_VIEW_FORM_TITLE' => 'Vista de Vendes',
  'LBL_LIST_FORM_TITLE' => 'Llista de Vendes',
  'LBL_SALE_NAME' => 'Nom de Venta:',
  'LBL_SALE' => 'Venta:',
  'LBL_NAME' => 'Nom de Venta',
  'LBL_LIST_SALE_NAME' => 'Nom',
  'LBL_LIST_ACCOUNT_NAME' => 'Nom de Compte',
  'LBL_LIST_AMOUNT' => 'Quantitat',
  'LBL_LIST_DATE_CLOSED' => 'Tancament',
  'LBL_LIST_SALE_STAGE' => 'Etapa de Vendes',
  'LBL_ACCOUNT_ID'=>'ID de Compte',
   'LBL_CURRENCY_ID'=>'ID de Moneda',
  'LBL_TEAM_ID' =>'ID de Equip',
//DON'T CONVERT THESE THEY ARE MAPPINGS
  'db_sales_stage' => 'LBL_LIST_SALES_STAGE',
  'db_name' => 'LBL_NAME',
  'db_amount' => 'LBL_LIST_AMOUNT',
  'db_date_closed' => 'LBL_LIST_DATE_CLOSED',
//END DON'T CONVERT
  'UPDATE' => 'Venta - Actualització de Moneda',
  'UPDATE_DOLLARAMOUNTS' => 'Actualitzar Quantitats en Dólars EEUU',
  'UPDATE_VERIFY' => 'Verificar Quantitats',
  'UPDATE_VERIFY_TXT' => 'Verifica que els valors de les quantitats en les ventdes son números decimals vàlids amb només caràcters numérics (0-9) i decimals(.)',
  'UPDATE_FIX' => 'Corregir Quantitats',
  'UPDATE_FIX_TXT' => 'Intenta corregir qualsevol quantitat no vàlida creant un número decimal vàlid apartir de la quantitat acutal. Abans fa una copia de seguretat de totes les quantitats modificades en el camp de base de dades amount_backup. Si desprès de la correcció detecta problemes, no torni a fer aquesta operació sense restaurar els valors prèvis desde la copia de seguretat ja que si no sobreescriurà la copia de seguretat amb noves dades no vàlides.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Actualitza les quantitats en Dólars EEUU per les vendes basades en el conjunt actual de canvis de moneda. Aquest valor s´usa per calcular gràfiques i vistes de llistes de quantitats monetàries.',
  'UPDATE_CREATE_CURRENCY' => 'Creant Nova Moneda:',
  'UPDATE_VERIFY_FAIL' => 'Fallo de Verificació de Registre:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Moneda Actual:',
  'UPDATE_VERIFY_FIX' => 'La Correcció donaría',
  'UPDATE_INCLUDE_CLOSE' => 'Registres Tancats Inclosos',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nova Quantitat:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nova Moneda:',
  'UPDATE_DONE' => 'Fet',
  'UPDATE_BUG_COUNT' => 'Problemes Detectats en la Resolució:',
  'UPDATE_BUGFOUND_COUNT' => 'Problemes Detectats:',
  'UPDATE_COUNT' => 'Registres Actualitzats:',
  'UPDATE_RESTORE_COUNT' => 'Registres amb Quantitats Restaurades:',
  'UPDATE_RESTORE' => 'Restaurar Quantitats',
  'UPDATE_RESTORE_TXT' => 'Restaura els valors de les quantitats desde la copia de seguretat creada durant la correcció.',
  'UPDATE_FAIL' => 'No ha pogut actualitzar-se - ',
  'UPDATE_NULL_VALUE' => 'La quantitat es NULL, s´estableix a 0 -',
  'UPDATE_MERGE' => 'Unificar Monedes',
  'UPDATE_MERGE_TXT' => 'Unifica múltiples monedes en una única moneda. Si detecta que hi ha múltiples registres de tipus de moneda per la mateixa moneda, pot unificarles. Això també unificarà les monedes per el reste de mòduls.',
  'LBL_ACCOUNT_NAME' => 'Nom de Compte:',
  'LBL_AMOUNT' => 'Quantitat:',
  'LBL_AMOUNT_USDOLLAR' => 'Quantitat en Dólars EEUU:',
  'LBL_CURRENCY' => 'Moneda:',
  'LBL_DATE_CLOSED' => 'Data de Tancament Prevista:',
  'LBL_TYPE' => 'Tipus:',
  'LBL_CAMPAIGN' => 'Campanya:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projects',  
  'LBL_NEXT_STEP' => 'Proper Pas:',
  'LBL_LEAD_SOURCE' => 'Pressa de Contacte:',
  'LBL_SALES_STAGE' => 'Etapa de Vendes:',
  'LBL_PROBABILITY' => 'Probabilitat (%):',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_DUPLICATE' => 'Possible Venta Duplicada',
  'MSG_DUPLICATE' => 'El registre per a la venta que va a crear podría ser un duplicat en un altre registe de venta existent. Els registres de venta amb noms similares es llisten a continuació.<br>Faci clic en Guardar per continuar amb la creació dáquesta venta, o en Cancelar per tornar al mòdul sense crear la venta.',
  'LBL_NEW_FORM_TITLE' => 'Nova Venta',
  'LNK_NEW_SALE' => 'Nova Venta',
  'LNK_SALE_LIST' => 'Venta',
  'ERR_DELETE_RECORD' => 'Té que especifícar un número de registre per eliminar la venta.',
  'LBL_TOP_SALES' => 'Les Meves Principals Vendes Obertes',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Està segur de que vol eliminar aquest contacte de la venta?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Està segur de que vol eliminar aquesta venda del projecte?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Venta',
  'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'Activitats',
  'LBL_HISTORY_SUBPANEL_TITLE'=>'Històrial',
  'LBL_RAW_AMOUNT'=>'Import Brut',

  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactes',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Usuari Assignat',
  'LBL_MY_CLOSED_SALES' => 'Les Meves Vendes Tancades',
  'LBL_TOTAL_SALES' => 'Vendes Totals',
  'LBL_CLOSED_WON_SALES' => 'Vendes Guanyades',
  'LBL_ASSIGNED_TO_ID' =>'Assignada a ID',
  'LBL_CREATED_ID'=>'Creada per ID',
  'LBL_MODIFIED_ID'=>'Modificada por ID',
  'LBL_MODIFIED_NAME'=>'Modificada per Usuari',
  'LBL_SALE_INFORMATION'=>'Informació sobre la Venta',
  'LBL_CURRENCY_ID'=>'ID Moneda',
  'LBL_CURRENCY_NAME'=>'Nom de la Moneda',
  'LBL_CURRENCY_SYMBOL'=>'Simbol de la Moneda',

);

?>

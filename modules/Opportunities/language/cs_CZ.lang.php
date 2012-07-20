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
  'LBL_CREATED_ID' => 'Created by ID',
  'LBL_MODULE_NAME' => 'Obchody',
  'LBL_MODULE_TITLE' => 'Obchody: Hlavní stránka',
  'LBL_SEARCH_FORM_TITLE' => 'Vyhledat obchody',
  'LBL_VIEW_FORM_TITLE' => 'Přehled obchodů',
  'LBL_LIST_FORM_TITLE' => 'Seznam obchodů',
  'LBL_OPPORTUNITY_NAME' => 'Název obchodu:',
  'LBL_OPPORTUNITY' => 'Obchody:',
  'LBL_NAME' => 'Název obchodu',
  'LBL_INVITEE' => 'Kontakty',
  'LBL_CURRENCIES' => 'Měny',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Název',
  'LBL_LIST_ACCOUNT_NAME' => 'Název Společnosti',
  'LBL_LIST_AMOUNT' => 'Částka',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Částka',
  'LBL_LIST_DATE_CLOSED' => 'Uzavřít:',
  'LBL_LIST_SALES_STAGE' => 'Stádium prodeje',
  'LBL_ACCOUNT_ID' => 'ID účtu',
  'LBL_CURRENCY_ID' => 'ID měny',
  'LBL_CURRENCY_NAME' => 'Jméno měny',
  'LBL_CURRENCY_SYMBOL' => 'Symbol měny',
  'LBL_TEAM_ID' => 'ID týmu',
  'UPDATE' => 'Obchod- Aktualizace měny',
  'UPDATE_DOLLARAMOUNTS' => 'Aktualizace CZK částek',
  'UPDATE_VERIFY' => 'Ověření částek',
  'UPDATE_VERIFY_TXT' => 'Ověří, že číselná pole zadané v obchodem jsou platná desetinná čísla - obsahují pouze číslice (0-9) and desetinou tečku(.)',
  'UPDATE_FIX' => 'Opravit částky',
  'UPDATE_FIX_TXT' => 'Pokus o opravu neplatné částky vytvořením platného čísla ze zadaných částek. Pro modifikované částky bude vytvořena záloha v databázovém poli amount_backup. Pokud zjistíte, že je tato procedura chybná, nespouštějte ji znovu bez předchozího obnovení částek ze zálohy, jinak byste mohli přepsat zazálohované částky neplatnými údaji.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Aktualizovat částky CZK na základě současných kurzů měn. Tato částka je použitá pro výpočet grafů a v seznamu Zobrazit částky v cizí měně.',
  'UPDATE_CREATE_CURRENCY' => 'Vytvoření nové měny:',
  'UPDATE_VERIFY_FAIL' => 'Ověření záznamu selhalo:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Aktuální částka:',
  'UPDATE_VERIFY_FIX' => 'Spuštění opravy znamená',
  'UPDATE_INCLUDE_CLOSE' => 'Včetně uzavřených záznamů',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nová částka:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nová měna:',
  'UPDATE_DONE' => 'Hotovo',
  'UPDATE_BUG_COUNT' => 'Byly nalezeny chyby a proběhla snaha je opravit:',
  'UPDATE_BUGFOUND_COUNT' => 'Počet nalezených chyb:',
  'UPDATE_COUNT' => 'Aktualizováno záznamů:',
  'UPDATE_RESTORE_COUNT' => 'Obnoveno záznamů:',
  'UPDATE_RESTORE' => 'Obnovit částky',
  'UPDATE_RESTORE_TXT' => 'Obnovit hodnoty částek ze zálohy vytvořené během opravy.',
  'UPDATE_FAIL' => 'Není možno aktualizovat -',
  'UPDATE_NULL_VALUE' => 'Částka je NULL - nastavena na 0 -',
  'UPDATE_MERGE' => 'Sloučit měny',
  'UPDATE_MERGE_TXT' => 'Sloučit různé měny do jedné. Pokud zjistíte, že existují pro stejnou měnu různé záznamy, můžete je sloučit dohromady. Měny budou sloučeny také ve všech ostatních modulech.',
  'LBL_ACCOUNT_NAME' => 'Název společnosti:',
  'LBL_AMOUNT' => 'Částka:',
  'LBL_AMOUNT_USDOLLAR' => 'Částka:',
  'LBL_CURRENCY' => 'Měna',
  'LBL_DATE_CLOSED' => 'Předpokládané datum uzavření:',
  'LBL_TYPE' => 'Typ:',
  'LBL_CAMPAIGN' => 'Kampaň:',
  'LBL_NEXT_STEP' => 'Další krok:',
  'LBL_LEAD_SOURCE' => 'Zdroj zájemců:',
  'LBL_SALES_STAGE' => 'Fáze obchodu:',
  'LBL_PROBABILITY' => 'Pravděpodobnost (%):',
  'LBL_DESCRIPTION' => 'Popis:',
  'LBL_DUPLICATE' => 'Možnost kopírovat obchody',
  'MSG_DUPLICATE' => 'Vytvořením tohoto obchodu můžete potencionálně vytvořit duplicitní obchod. Můžete buď vybrat obchod ze seznamu nebo můžete kliknout na Přidat nový obchod pro vytvoření nového obchodu s předchozími údaji.',
  'LBL_NEW_FORM_TITLE' => 'Vytvořit obchod',
  'LNK_NEW_OPPORTUNITY' => 'Vytvořit obchod',
  'LNK_OPPORTUNITY_REPORTS' => 'Zobrazit reporty obchodů',
  'LNK_OPPORTUNITY_LIST' => 'Obchody',
  'ERR_DELETE_RECORD' => 'Pro smazání obchodu musí být zadáno číslo záznamu.',
  'LBL_TOP_OPPORTUNITIES' => 'Rozpracované obchody',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Opravdu chcete smazat tento kontakt z tohoto obchodu?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Opravdu chcete smazat tento obchod z projektu?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Obchody',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivity',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
  'LBL_RAW_AMOUNT' => 'hrubá částka',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Zájemci',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Nabídky',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumenty',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekty',
  'LBL_ASSIGNED_TO_NAME' => 'Přiřazen(komu):',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zodpovědný uživatel',
  'LBL_CONTRACTS' => 'Kontrakty',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakty',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Uzavřené obchody',
  'LBL_TOTAL_OPPORTUNITIES' => 'Celkem obchodů',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Uzavřené vyhrané obchody',
  'LBL_ASSIGNED_TO_ID' => 'Přiřazen(komu):',
  'LBL_MODIFIED_ID' => 'Změněno podle ID',
  'LBL_MODIFIED_NAME' => 'Změněno podle už. jména',
  'LBL_CREATED_USER' => 'Vytvořený uživatel',
  'LBL_MODIFIED_USER' => 'Změněný uživatel',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Kampaně',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projekty',
  'LABEL_PANEL_ASSIGNMENT' => 'Přidělování',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importovat obchody',
);


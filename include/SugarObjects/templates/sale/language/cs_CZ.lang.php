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
  'UPDATE_FIX_TXT' => 'Pokus o opravu neplatné částky vytvořením platného čísla ze zadaných částek. Pro modifikované částky bude vytvořena záloha v databázovém poli amount_backup. Pokud zjistíte, že je tato procedura chybná, nespouštějte ji znovu bez předchozího obnovení částek ze zálohy, jinak byste mohli přepsat zazálohované částky neplatnými údaji.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Aktualizovat částky CZK na základě současných kurzů měn. Tato částka je použitá pro výpočet grafů a v seznamu Zobrazit částky v cizí měně.',
  'UPDATE_RESTORE_COUNT' => 'Obnoveno záznamů:',
  'UPDATE_MERGE_TXT' => 'Sloučit různé měny do jedné. Pokud zjistíte, že existují pro stejnou měnu různé záznamy, můžete je sloučit dohromady. Měny budou sloučeny také ve všech ostatních modulech.',
  'MSG_DUPLICATE' => 'Vytvořením tohoto Prodeje můžete potencionálně vytvořit duplicitní položku Prodeje. Můžete buď vybrat Prodej ze seznamu nebo můžete kliknout na Přidat nový Prodej pro vytvoření nového obchodu s předchozími údaji.',
  'LBL_TOP_SALES' => 'Mé otevřené prodeje',
  'LBL_MODULE_NAME' => 'Prodej',
  'LBL_MODULE_TITLE' => 'Prodej: Hlavní stránka',
  'LBL_SEARCH_FORM_TITLE' => 'Vyhledat prodej',
  'LBL_VIEW_FORM_TITLE' => 'Zobrazit prodej',
  'LBL_LIST_FORM_TITLE' => 'Seznam prodeje',
  'LBL_SALE_NAME' => 'Jméno prodeje:',
  'LBL_SALE' => 'Prodej:',
  'LBL_NAME' => 'Jméno prodeje',
  'LBL_LIST_SALE_NAME' => 'Jméno',
  'LBL_LIST_ACCOUNT_NAME' => 'Jméno společnosti',
  'LBL_LIST_AMOUNT' => 'Částka',
  'LBL_LIST_DATE_CLOSED' => 'Zavřít',
  'LBL_LIST_SALE_STAGE' => 'Prodejní fáze',
  'LBL_ACCOUNT_ID' => 'ID společnosti',
  'LBL_CURRENCY_ID' => 'ID měny',
  'LBL_TEAM_ID' => 'ID týmu',
  'UPDATE' => 'Prodej - aktualizace měny',
  'UPDATE_DOLLARAMOUNTS' => 'Aktualizace US Dollar částek',
  'UPDATE_VERIFY' => 'Ověření částek',
  'UPDATE_VERIFY_TXT' => 'Ověřuje, že částka hodnoty v prodeji jsou platná desetinná čísla s pouze číselnými znaky (0-9) a desetinnými místy (.)',
  'UPDATE_FIX' => 'Opravit částky',
  'UPDATE_CREATE_CURRENCY' => 'Vytvářím novou měnu:',
  'UPDATE_VERIFY_FAIL' => 'Ověření záznamu selhalo:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Aktuální částka',
  'UPDATE_VERIFY_FIX' => 'Běžící oprava by',
  'UPDATE_INCLUDE_CLOSE' => 'Včetně uzavřených záznamů',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nová společnost:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nová měna:',
  'UPDATE_DONE' => 'Hotovo',
  'UPDATE_BUG_COUNT' => 'Byly nalezeny chyby a proběhla snaha je opravit:',
  'UPDATE_BUGFOUND_COUNT' => 'Nalezené chyby:',
  'UPDATE_COUNT' => 'Aktualizované záznamy:',
  'UPDATE_RESTORE' => 'Obnovit částky',
  'UPDATE_RESTORE_TXT' => 'Obnovit hodnoty částek ze zálohy vytvořené během opravy.',
  'UPDATE_FAIL' => 'Nelze aktualizovat -',
  'UPDATE_NULL_VALUE' => 'Částka je NULL nastavuji na 0 -',
  'UPDATE_MERGE' => 'Sloučit měny',
  'LBL_ACCOUNT_NAME' => 'Jméno společnosti:',
  'LBL_AMOUNT' => 'Částka:',
  'LBL_AMOUNT_USDOLLAR' => 'Částka USD:',
  'LBL_CURRENCY' => 'Měna:',
  'LBL_DATE_CLOSED' => 'Očekávané datum uzavření:',
  'LBL_TYPE' => 'Typ:',
  'LBL_CAMPAIGN' => 'Kampaň:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Příležiosti',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projeky',
  'LBL_NEXT_STEP' => 'Další krok:',
  'LBL_LEAD_SOURCE' => 'Zdroj:',
  'LBL_SALES_STAGE' => 'Fáze prodeje:',
  'LBL_PROBABILITY' => 'Pravděpodobnost (%):',
  'LBL_DESCRIPTION' => 'Popis:',
  'LBL_DUPLICATE' => 'Možné duplicitní prodeje',
  'LBL_NEW_FORM_TITLE' => 'Vytvořit prodej',
  'LNK_NEW_SALE' => 'Vytvořit prodej',
  'LNK_SALE_LIST' => 'Prodej',
  'ERR_DELETE_RECORD' => 'Číslo záznamu musí být uvedeno pro odstranění prodeje.',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Jste si jisti, že chcete odstranit tento kontakt z prodeje?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Jste si jisti, že chcete odstranit tuto prodeji od projektu?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Prodej',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivity',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
  'LBL_RAW_AMOUNT' => 'Hrubá částka',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_ASSIGNED_TO_NAME' => 'Uživatel:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Přidělený uživatel',
  'LBL_MY_CLOSED_SALES' => 'Moje uzavřené prodeje',
  'LBL_TOTAL_SALES' => 'Celkové prodeje',
  'LBL_CLOSED_WON_SALES' => 'Úspěšný prodej uzavřený',
  'LBL_ASSIGNED_TO_ID' => 'Přiděleno ID',
  'LBL_CREATED_ID' => 'Vytvořeno podle ID',
  'LBL_MODIFIED_ID' => 'Změněno podle ID',
  'LBL_MODIFIED_NAME' => 'Změněno podle už. jména',
  'LBL_SALE_INFORMATION' => 'Obchodní informace',
  'LBL_CURRENCY_NAME' => 'Jméno měny',
  'LBL_CURRENCY_SYMBOL' => 'Symbol měny',
);


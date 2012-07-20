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
  'LBL_EXTERNAL' => 'Umožněte uživatelům vytvářet externí účty pro tento konektor.Vlastnosti musí být také nastaveny.',
  'LBL_FINSALES' => 'Roční obrat (Finsales)',
  'LBL_DATA' => 'Data',
  'LBL_DUNS' => 'DUNS',
  'LBL_ADD_MODULE' => 'Přidat',
  'LBL_ADDRCITY' => 'Město',
  'LBL_ADDRCOUNTRY' => 'Stát',
  'LBL_ADDRCOUNTRY_ID' => 'ID země',
  'LBL_ADDRSTATEPROV' => 'Stát',
  'LBL_ADMINISTRATION' => 'Administrace konnektoru',
  'LBL_ADMINISTRATION_MAIN' => 'Nastavení konnektoru',
  'LBL_AVAILABLE' => 'Dostupnt',
  'LBL_BACK' => '< Zpět',
  'LBL_COMPANY_ID' => 'ID společnosti',
  'LBL_CONFIRM_CONTINUE_SAVE' => 'Některé požadované údaje byly ponechány prázdné. Přistoupit k uložení změn?',
  'LBL_CONNECTOR' => 'Konnektor',
  'LBL_CONNECTOR_FIELDS' => 'Pole Konnektoru',
  'LBL_DEFAULT' => 'Vychodí',
  'LBL_DELETE_MAPPING_ENTRY' => 'Jste si jisti, že chcete smazat tento záznam?',
  'LBL_DISABLED' => 'Zakázán',
  'LBL_EMPTY_BEANS' => 'Žádné shody nebyly nalezeny pro vaše kritéria vyhledávání.',
  'LBL_ENABLED' => 'Povolen',
  'LBL_MARKET_CAP' => 'Tržní kapitalizace',
  'LBL_MERGE' => 'Spojit',
  'LBL_MODIFY_DISPLAY_TITLE' => 'Povolit konnektory',
  'LBL_MODIFY_DISPLAY_DESC' => 'Zvolit, které moduly jsou povoleny pro každý konektor.',
  'LBL_MODIFY_DISPLAY_PAGE_TITLE' => 'Nastavení konnektoru: Povolit konnektory',
  'LBL_MODULE_FIELDS' => 'Pole mudulu',
  'LBL_MODIFY_MAPPING_TITLE' => 'Zmapovat pole konnektoru',
  'LBL_MODIFY_MAPPING_DESC' => 'Zmapovat pole konnektoru na pole mudulu pro zobrazení a spojení dat konnektoru do záznamů modulu.',
  'LBL_MODIFY_MAPPING_PAGE_TITLE' => 'Nastavení konnektoru: Zmapovat pole konnektoru',
  'LBL_MODIFY_PROPERTIES_TITLE' => 'Zvolit nastavení konnektoru',
  'LBL_MODIFY_PROPERTIES_DESC' => 'Nastavit vlastnosti pro každý konektor, včetně adres URL a API klíče.',
  'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => 'Nastavení konnektoru: Nastavit vlastnosti konnektoru',
  'LBL_MODIFY_SEARCH_TITLE' => 'Spravovat vyhledávání konnektoru',
  'LBL_MODIFY_SEARCH' => 'Vyhledávání',
  'LBL_MODIFY_SEARCH_DESC' => 'Vyberte pole konnektoru pro vyhledávání dát pro každý modul.',
  'LBL_MODIFY_SEARCH_PAGE_TITLE' => 'Nastavení konnektoru: Spravovat vyhledžvžní konnektoru',
  'LBL_MODULE_NAME' => 'Konektory',
  'LBL_NO_PROPERTIES' => 'Nejsou žádné konfigurovatelné vlastnosti tohoto konektoru.',
  'LBL_PARENT_DUNS' => 'Rodičovské DUNS',
  'LBL_PREVIOUS' => '< Zpět',
  'LBL_QUOTE' => 'Nabídka',
  'LBL_RECNAME' => 'Název společnosti',
  'LBL_RESET_TO_DEFAULT' => 'Nastavit východzí',
  'LBL_RESET_TO_DEFAULT_CONFIRM' => 'Jste si jisti, že chcete obnovit výchozí nastavení?',
  'LBL_RESET_BUTTON_TITLE' => 'Obnovit [Alt+R]',
  'LBL_RESULT_LIST' => 'Seznam dat',
  'LBL_RUN_WIZARD' => 'Spustit průvodce',
  'LBL_SAVE' => 'Uložit',
  'LBL_SEARCHING_BUTTON_LABEL' => 'Vyhledžvžní...',
  'LBL_SHOW_IN_LISTVIEW' => 'Zobrazit v spojenom zobrazení seznamu',
  'LBL_SMART_COPY' => 'Chytré kopírování',
  'LBL_SUMMARY' => 'Souhrn',
  'LBL_STEP1' => 'Vyhledat a prohlédnout data',
  'LBL_STEP2' => 'Spojit záznamy s',
  'LBL_TEST_SOURCE' => 'Otestovat konnektor',
  'LBL_TEST_SOURCE_FAILED' => 'Test selhal',
  'LBL_TEST_SOURCE_RUNNING' => 'Probíha test...',
  'LBL_TEST_SOURCE_SUCCESS' => 'Test úspěšný',
  'LBL_TITLE' => 'Spojit data',
  'LBL_ULTIMATE_PARENT_DUNS' => 'Konečné mateřské DUNS',
  'ERROR_RECORD_NOT_SELECTED' => 'Chyba: Prosím, vyberte záznam ze seznamu před pokračováním.',
  'ERROR_EMPTY_WRAPPER' => 'Chyba: Nepodařilo se získat obal(wrapper) pro zdroj [{$source_id}]',
  'ERROR_EMPTY_SOURCE_ID' => 'Chyba: ID zdroje nebylo zadáno nebo je prázdné.',
  'ERROR_EMPTY_RECORD_ID' => 'Chyba: ID záznamu nebylo zadáno nebo je prázdné.',
  'ERROR_NO_ADDITIONAL_DETAIL' => 'Chyba: Žádné další podrobnosti nebyly nalezeny pro záznam.',
  'ERROR_NO_SEARCHDEFS_DEFINED' => 'Žádné moduly nebyly povoleny pro tento konektor. Vyberte modul pro tento konektor na stránce Povolit konektory.',
  'ERROR_NO_SEARCHDEFS_MAPPED' => 'Chyba: Nejsou povoleny žádné konnektory ktere mají definovaná vyhledávací pole.',
  'ERROR_NO_SOURCEDEFS_FILE' => 'Chyba: Nebzl nalezen soubor sourcedefs.php .',
  'ERROR_NO_SOURCEDEFS_SPECIFIED' => 'Chyba: Nebyly specifikovány žádný zdroje k načtení dat.',
  'ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE' => 'Chyba: Nejsou žádné konektory mapovány na tento modul.',
  'ERROR_NO_SEARCHDEFS_MAPPING' => 'Chyba: Nejsou žádné vyhledávací pole definovany pro tento modul a konektor. Prosím, kontaktujte správce systému.',
  'ERROR_NO_FIELDS_MAPPED' => 'Chyba: Musíte namapovat alespoň jedno pole konektororu na pole modulu pro každý záznam modulu',
  'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => 'Chyba: Neexistují žádné pole modulu, které by byly mapovány pro zobrazení ve výsledcích. Prosím, kontaktujte správce systému.',
);


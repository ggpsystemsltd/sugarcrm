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
  'LBL_MODIFIED_BY_NAME_OWNER' => 'Změněno jménem vlastníka',
  'LBL_MODIFIED_BY_NAME_MOD' => 'Změněno jménem',
  'LBL_CREATED_BY_NAME_OWNER' => 'Vytvořeno jménem vlastníka',
  'LBL_CREATED_BY_NAME_MOD' => 'Vytvořeno jménem',
  'LBL_ASSIGNED_USER_NAME_OWNER' => 'Přiřazený uživatel - Vlastník',
  'LBL_ASSIGNED_USER_NAME_MOD' => 'Přiřazený uživatel',
  'LBL_TEAM_COUNT_OWNER' => 'Počet týmů - Vlastník',
  'LBL_TEAM_COUNT_MOD' => 'Počet týmů',
  'LBL_TEAM_NAME_OWNER' => 'Jméno týmu - Vlastník',
  'LBL_TEAM_NAME_MOD' => 'Jméno týmu',
  'LBL_ACCOUNT_NAME_OWNER' => 'Jméno účtu vlastníka',
  'LBL_ACCOUNT_NAME_MOD' => 'Jméno účtu',
  'LBL_MODIFIED_USER_NAME' => 'Změněné přihlašovací jméno',
  'LBL_MODIFIED_USER_NAME_OWNER' => 'Změněné přihlašovací jméno - Vlastník',
  'LBL_MODIFIED_USER_NAME_MOD' => 'Změněné přihlašovací jméno',
  'LBL_PORTAL_VIEWABLE' => 'Portal aktivní',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Přiřazený uživatel ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'ID modifikátora',
  'LBL_EXPORT_CREATED_BY' => 'Vytvořeno od ID:',
  'LBL_EXPORT_CREATED_BY_NAME' => 'Vytvořeno uživatelem',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Přiřazený uživatel',
  'LBL_EXPORT_TEAM_COUNT' => 'Počet týmů',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Přiřazené kontaktní maily',
  'LBL_CONTACT_ROLE' => 'Role:',
  'ERR_DELETE_RECORD' => 'Pro vymazání zaměstnance musíte specifikovat číslo záznamu.',
  'LBL_ACCOUNT_ID' => 'ID společnosti',
  'LBL_ACCOUNT_NAME' => 'Název společnosti:',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Společnosti',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivity',
  'LBL_ATTACH_NOTE' => 'Připojit poznámku',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Chyby',
  'LBL_CASE_NUMBER' => 'Případ číslo:',
  'LBL_CASE_SUBJECT' => 'Předmět případu:',
  'LBL_CASE' => 'Případ:',
  'LBL_CONTACT_CASE_TITLE' => 'Kontakt případu:',
  'LBL_CONTACT_NAME' => 'Jméno kontaktu:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Případy',
  'LBL_DESCRIPTION' => 'Popis:',
  'LBL_FILENANE_ATTACHMENT' => 'Přiložit soubor',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
  'LBL_INVITEE' => 'Kontakty',
  'LBL_MEMBER_OF' => 'Klient',
  'LBL_MODULE_NAME' => 'Případy',
  'LBL_MODULE_TITLE' => 'Případy',
  'LBL_NEW_FORM_TITLE' => 'Nový případ',
  'LBL_NUMBER' => 'Číslo:',
  'LBL_PRIORITY' => 'Priorita:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekty',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumenty',
  'LBL_RESOLUTION' => 'Výsledek:',
  'LBL_SEARCH_FORM_TITLE' => 'Hledat případ',
  'LBL_STATUS' => 'Stav:',
  'LBL_SUBJECT' => 'Předmět:',
  'LBL_SYSTEM_ID' => 'Systém ID',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zodpovědný uživatel',
  'LBL_LIST_ACCOUNT_NAME' => 'Název společnosti',
  'LBL_LIST_ASSIGNED' => 'Přidělen',
  'LBL_LIST_CLOSE' => 'Zavřít',
  'LBL_LIST_FORM_TITLE' => 'Seznam případů',
  'LBL_LIST_LAST_MODIFIED' => 'Poslední úprava',
  'LBL_LIST_MY_CASES' => 'Otevřené případy',
  'LBL_LIST_NUMBER' => 'Číslo',
  'LBL_LIST_PRIORITY' => 'Priorita',
  'LBL_LIST_STATUS' => 'Stav',
  'LBL_LIST_SUBJECT' => 'Předmět',
  'LNK_CASE_LIST' => 'Případy',
  'LNK_NEW_CASE' => 'Vytvořit případ',
  'NTC_REMOVE_FROM_BUG_CONFIRMATION' => 'Opravdu chcete odstranit případ z chyb?',
  'NTC_REMOVE_INVITEE' => 'Opravdu chcete kontakt vyjmout z případu?',
  'LBL_LIST_DATE_CREATED' => 'Vytvořil dne',
  'LBL_ASSIGNED_TO_NAME' => 'Přiřazeno (komu)',
  'LBL_TYPE' => 'Typ',
  'LBL_WORK_LOG' => 'Log práce',
  'LNK_IMPORT_CASES' => 'Import případů',
  'LNK_CASE_REPORTS' => 'Přehled reportů případu',
  'LBL_SHOW_IN_PORTAL' => 'Zobrazit na portálu',
  'LBL_CREATE_KB_DOCUMENT' => 'Vytvořit dokument',
  'LBL_CREATED_USER' => 'Vytvořit uživatele',
  'LBL_MODIFIED_USER' => 'Upraveno uživatelem',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projekty',
  'LBL_CASE_INFORMATION' => 'Přehled případů',
);


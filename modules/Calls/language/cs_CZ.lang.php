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
  'LBL_BLANK' => '',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_MODULE_NAME' => 'Hovory',
  'LBL_MODULE_TITLE' => 'Hovory',
  'LBL_SEARCH_FORM_TITLE' => 'Hledat hovor',
  'LBL_LIST_FORM_TITLE' => 'Seznam hovorů',
  'LBL_NEW_FORM_TITLE' => 'Naplánovat událost',
  'LBL_LIST_CLOSE' => 'Zavřít',
  'LBL_LIST_SUBJECT' => 'Předmět',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Týka se',
  'LBL_LIST_RELATED_TO_ID' => 'Přiřazeno k ID',
  'LBL_LIST_DATE' => 'Počáteční datum',
  'LBL_LIST_TIME' => 'Počáteční čas',
  'LBL_LIST_DURATION' => 'Doba trvání',
  'LBL_LIST_DIRECTION' => 'Adresa',
  'LBL_SUBJECT' => 'Předmět:',
  'LBL_REMINDER' => 'Upomínka:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Popis',
  'LBL_DESCRIPTION' => 'Popis:',
  'LBL_STATUS' => 'Stav:',
  'LBL_DIRECTION' => 'Seřadit:',
  'LBL_DATE' => 'Počáteční datum:',
  'LBL_DURATION' => 'Doba trvání:',
  'LBL_DURATION_HOURS' => 'Doba trvání',
  'LBL_DURATION_MINUTES' => 'Doba trvání',
  'LBL_HOURS_MINUTES' => '(hodiny/minuty)',
  'LBL_CALL' => 'Volání:',
  'LBL_DATE_TIME' => 'Počáteční datum & čas:',
  'LBL_TIME' => 'Počátenčí čas:',
  'LNK_NEW_CALL' => 'Naplánovat hovor',
  'LNK_NEW_MEETING' => 'Naplánovat schůzku',
  'LNK_CALL_LIST' => 'Hovory',
  'LNK_IMPORT_CALLS' => 'Import hovorů',
  'ERR_DELETE_RECORD' => 'Pro vymazání zaměstnance musíte specifikovat číslo záznamu.',
  'NTC_REMOVE_INVITEE' => 'Opravdu chcete odstranit tuto pozvánku z hovoru?',
  'LBL_INVITEE' => 'Pozvánka',
  'LBL_RELATED_TO' => 'Vztahuje se k:',
  'LNK_NEW_APPOINTMENT' => 'Naplánovat událost',
  'LBL_SCHEDULING_FORM_TITLE' => 'Plánování',
  'LBL_ADD_INVITEE' => 'Přidat Invites',
  'LBL_NAME' => 'Název',
  'LBL_FIRST_NAME' => 'Jméno',
  'LBL_LAST_NAME' => 'Příjmení',
  'LBL_EMAIL' => 'E-mail',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Odeslat pozvání [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Odeslat pozvání',
  'LBL_DATE_END' => 'Konec',
  'LBL_TIME_END' => 'Čas ukončení',
  'LBL_REMINDER_TIME' => 'Čas připomínky',
  'LBL_SEARCH_BUTTON' => 'Hledat',
  'LBL_ACTIVITIES_REPORTS' => 'Report aktivit',
  'LBL_ADD_BUTTON' => 'Přidat',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Hovory',
  'LBL_LOG_CALL' => 'Zápis hovoru',
  'LNK_SELECT_ACCOUNT' => 'Zvolit účet',
  'LNK_NEW_ACCOUNT' => 'Přidat účet',
  'LNK_NEW_OPPORTUNITY' => 'Nový obchod',
  'LBL_DEL' => 'Smazat',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Zájemci',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_USERS_SUBPANEL_TITLE' => 'Uživatelé',
  'LBL_OUTLOOK_ID' => 'ID Outlooku',
  'LBL_MEMBER_OF' => 'Člen',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Poznámky',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Zodpovědný uživatel',
  'LBL_LIST_MY_CALLS' => 'Tel. hovory',
  'LBL_SELECT_FROM_DROPDOWN' => 'Prosím vyberte nejdřív z rozbalovací nabídky /\\"Souvisejíci/\\"',
  'LBL_ASSIGNED_TO_NAME' => 'Přiřazeno jménu',
  'LBL_ASSIGNED_TO_ID' => 'Zodpovědný uživatel',
  'NOTICE_DURATION_TIME' => 'Doba trvání musí  být větší než 0',
  'LBL_CALL_INFORMATION' => 'Informace o hovoru',
  'LBL_REMOVE' => 'odstranit',
);


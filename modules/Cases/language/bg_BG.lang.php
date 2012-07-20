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
  'LBL_MODIFIED_BY_NAME_OWNER' => 'Modified By Name Owner',
  'LBL_MODIFIED_BY_NAME_MOD' => 'Modified By Name Mod',
  'LBL_CREATED_BY_NAME_OWNER' => 'Created By Name Owner',
  'LBL_CREATED_BY_NAME_MOD' => 'Created By Name Mod',
  'LBL_ASSIGNED_USER_NAME_OWNER' => 'Assigned User Name Owner',
  'LBL_ASSIGNED_USER_NAME_MOD' => 'Assigned User Name Mod',
  'LBL_TEAM_COUNT_OWNER' => 'Team Count Owner',
  'LBL_TEAM_COUNT_MOD' => 'Team Count Mod',
  'LBL_TEAM_NAME_OWNER' => 'Team Name Owner',
  'LBL_TEAM_NAME_MOD' => 'Team Name Mod',
  'LBL_ACCOUNT_NAME_OWNER' => 'Account Name Owner',
  'LBL_ACCOUNT_NAME_MOD' => 'Account Name Mod',
  'LBL_MODIFIED_USER_NAME' => 'Modified User Name',
  'LBL_MODIFIED_USER_NAME_OWNER' => 'Modified User Name Owner',
  'LBL_MODIFIED_USER_NAME_MOD' => 'Modified User Name Mod',
  'LBL_PORTAL_VIEWABLE' => 'Portal Viewable',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigned User ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modified By ID',
  'LBL_EXPORT_CREATED_BY' => 'Created By ID',
  'LBL_EXPORT_CREATED_BY_NAME' => 'Created By User Name',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Отговорник',
  'LBL_EXPORT_TEAM_COUNT' => 'Team Count',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Related Contacts&#39; Emails',
  'ERR_DELETE_RECORD' => 'Трябва да определите номер, за да изтриете този запис.',
  'LBL_ACCOUNT_ID' => 'Организация',
  'LBL_ACCOUNT_NAME' => 'Организация:',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Организации',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Дейности',
  'LBL_ATTACH_NOTE' => 'Прикачване на бележка',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Проблеми',
  'LBL_CASE_NUMBER' => 'Номер на казуса:',
  'LBL_CASE_SUBJECT' => 'Относно:',
  'LBL_CASE' => 'Казус:',
  'LBL_CONTACT_CASE_TITLE' => 'Контакт-Казус:',
  'LBL_CONTACT_NAME' => 'Контакт:',
  'LBL_CONTACT_ROLE' => 'Роля:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакти',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Казуси',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_FILENANE_ATTACHMENT' => 'Приложение',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'LBL_INVITEE' => 'Контакти',
  'LBL_MEMBER_OF' => 'Организация',
  'LBL_MODULE_NAME' => 'Казуси',
  'LBL_MODULE_TITLE' => 'Казуси',
  'LBL_NEW_FORM_TITLE' => 'Нов казус',
  'LBL_NUMBER' => 'Номер:',
  'LBL_PRIORITY' => 'Степен на важност:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Проекти',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Документи',
  'LBL_RESOLUTION' => 'Решение:',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Казуси"',
  'LBL_STATUS' => 'Статус:',
  'LBL_SUBJECT' => 'Относно:',
  'LBL_SYSTEM_ID' => 'ID на системата',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_LIST_ACCOUNT_NAME' => 'Oрганизация',
  'LBL_LIST_ASSIGNED' => 'Отговорник:',
  'LBL_LIST_CLOSE' => 'Затвори',
  'LBL_LIST_FORM_TITLE' => 'Списък с казуси',
  'LBL_LIST_LAST_MODIFIED' => 'Последно модифициран',
  'LBL_LIST_MY_CASES' => 'Моите текущи казуси',
  'LBL_LIST_NUMBER' => 'Ном.',
  'LBL_LIST_PRIORITY' => 'Степен на важност',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_SUBJECT' => 'Относно',
  'LNK_CASE_LIST' => 'Списък с казуси',
  'LNK_NEW_CASE' => 'Въвеждане на казус',
  'NTC_REMOVE_FROM_BUG_CONFIRMATION' => 'Сигурни ли сте, че желаете да изтриете казусa от този проблем?',
  'NTC_REMOVE_INVITEE' => 'Сигурни ли сте, че желаете да изтриете този контакт от казусa?',
  'LBL_LIST_DATE_CREATED' => 'Създадено на',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_TYPE' => 'Тип',
  'LBL_WORK_LOG' => 'Работен дневник на събития',
  'LNK_IMPORT_CASES' => 'Импортиране на казуси',
  'LNK_CASE_REPORTS' => 'Справки за казуси',
  'LBL_SHOW_IN_PORTAL' => 'Видим за портала',
  'LBL_CREATE_KB_DOCUMENT' => 'Добавяне на материал',
  'LBL_CREATED_USER' => 'Създаден потребител',
  'LBL_MODIFIED_USER' => 'Модифициран потребител',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Проекти',
  'LBL_CASE_INFORMATION' => 'Казус',
);


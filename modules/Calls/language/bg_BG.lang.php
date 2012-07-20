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
  'LBL_ACCEPT_STATUS' => 'Accept Status',
  'LBL_ACCEPT_LINK' => 'Accept Link',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_PARENT_ID' => 'Parent ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modified By ID',
  'LBL_EXPORT_CREATED_BY' => 'Created By ID',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigned User ID',
  'LBL_EXPORT_DATE_START' => 'Start Date and Time',
  'LBL_EXPORT_REMINDER_TIME' => 'Reminder Time (in minutes)',
  'LBL_BLANK' => '-празен-',
  'LBL_MODULE_NAME' => 'Обаждания',
  'LBL_MODULE_TITLE' => 'Обаждания',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Обаждания"',
  'LBL_LIST_FORM_TITLE' => 'Списък с обаждания',
  'LBL_NEW_FORM_TITLE' => 'Създаване на ангажимент',
  'LBL_LIST_CLOSE' => 'Затвори',
  'LBL_LIST_SUBJECT' => 'Относно',
  'LBL_LIST_CONTACT' => 'Контакт',
  'LBL_LIST_RELATED_TO' => 'Свързано със:',
  'LBL_LIST_RELATED_TO_ID' => 'Свързано със',
  'LBL_LIST_DATE' => 'Начална дата',
  'LBL_LIST_TIME' => 'Начален час',
  'LBL_LIST_DURATION' => 'Продължителност',
  'LBL_LIST_DIRECTION' => 'Направление',
  'LBL_SUBJECT' => 'Относно:',
  'LBL_REMINDER' => 'Напомняне:',
  'LBL_CONTACT_NAME' => 'Контакт:',
  'LBL_DESCRIPTION_INFORMATION' => 'Допълнителна информация',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_STATUS' => 'Статус:',
  'LBL_DIRECTION' => 'Направление:',
  'LBL_DATE' => 'Начална дата:',
  'LBL_DURATION' => 'Продължителност:',
  'LBL_DURATION_HOURS' => 'Продължителност (час.):',
  'LBL_DURATION_MINUTES' => 'Продължителност (мин.):',
  'LBL_HOURS_MINUTES' => '(час./мин.)',
  'LBL_CALL' => 'Обаждане:',
  'LBL_DATE_TIME' => 'Начална дата и час:',
  'LBL_TIME' => 'Начален час:',
  'LBL_HOURS_ABBREV' => 'час.',
  'LBL_MINSS_ABBREV' => 'мин.',
  'LNK_NEW_CALL' => 'Планиране на обаждане',
  'LNK_NEW_MEETING' => 'Насрочване на среща',
  'LNK_CALL_LIST' => 'Списък с обаждания',
  'LNK_IMPORT_CALLS' => 'Импортиране на обаждания',
  'ERR_DELETE_RECORD' => 'Трябва да определите номер, за да изтриете този запис.',
  'NTC_REMOVE_INVITEE' => 'Сигурни ли сте, че искате да премахнете поканения потребител от обаждането?',
  'LBL_INVITEE' => 'Поканени потребители',
  'LBL_RELATED_TO' => 'Свързано с:',
  'LNK_NEW_APPOINTMENT' => 'Създаване на ангажимент',
  'LBL_SCHEDULING_FORM_TITLE' => 'График на дейностите',
  'LBL_ADD_INVITEE' => 'Добавяне на покана',
  'LBL_NAME' => 'Име',
  'LBL_FIRST_NAME' => 'Име',
  'LBL_LAST_NAME' => 'Фамилия',
  'LBL_EMAIL' => 'Електронна поща',
  'LBL_PHONE' => 'Телефон',
  'LBL_SEND_BUTTON_TITLE' => 'Изпращане на покани [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Изпращане на покани',
  'LBL_DATE_END' => 'Крайна дата',
  'LBL_TIME_END' => 'Краен час',
  'LBL_REMINDER_TIME' => 'Напомняне през',
  'LBL_SEARCH_BUTTON' => 'Търси',
  'LBL_ACTIVITIES_REPORTS' => 'Отчет за справката',
  'LBL_ADD_BUTTON' => 'Добави',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Обаждания',
  'LBL_LOG_CALL' => 'Планиране на обаждане',
  'LNK_SELECT_ACCOUNT' => 'Избери организация',
  'LNK_NEW_ACCOUNT' => 'Нова организация',
  'LNK_NEW_OPPORTUNITY' => 'Нова възможност',
  'LBL_DEL' => 'Изтрий',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Потенциални клиенти',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакти',
  'LBL_USERS_SUBPANEL_TITLE' => 'Потребители',
  'LBL_MEMBER_OF' => 'Член на',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Бележки',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_LIST_MY_CALLS' => 'Моите обаждания',
  'LBL_SELECT_FROM_DROPDOWN' => 'Трябва да изберете стойност от падащото меню "Свързано със", преди да продължите.',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_ASSIGNED_TO_ID' => 'Отговорник',
  'NOTICE_DURATION_TIME' => 'Продължителността на разговора трябва да надхвърля 0',
  'LBL_CALL_INFORMATION' => 'Обаждане',
  'LBL_REMOVE' => 'изтрий',
  'LBL_EXPORT_PARENT_TYPE' => 'Свързан с модул',
);


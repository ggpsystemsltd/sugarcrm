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
  'LBL_PARENT_ID' => 'ID изначальной записи',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Изменено (ID)',
  'LBL_EXPORT_CREATED_BY' => 'Создано (ID)',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Ответственный (ID)',
  'LBL_EXPORT_DATE_START' => 'Дата и время начала',
  'LBL_EXPORT_PARENT_TYPE' => 'Относится к модулю',
  'LBL_EXPORT_REMINDER_TIME' => 'Время напоминания (минут)',
  'LBL_BLANK' => '',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_MODULE_NAME' => 'Звонки',
  'LBL_MODULE_TITLE' => 'Звонки - Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск звонка',
  'LBL_LIST_FORM_TITLE' => 'Список звонков',
  'LBL_NEW_FORM_TITLE' => 'Новое мероприятие',
  'LBL_LIST_CLOSE' => 'Закрыть',
  'LBL_LIST_SUBJECT' => 'Тема',
  'LBL_LIST_CONTACT' => 'Контакт',
  'LBL_LIST_RELATED_TO' => 'Относится к',
  'LBL_LIST_RELATED_TO_ID' => 'Относится к ID',
  'LBL_LIST_DATE' => 'Дата начала',
  'LBL_LIST_TIME' => 'Время начала',
  'LBL_LIST_DURATION' => 'Продолжительность',
  'LBL_LIST_DIRECTION' => 'Сортировка',
  'LBL_SUBJECT' => 'Тема:',
  'LBL_REMINDER' => 'Напомнить:',
  'LBL_CONTACT_NAME' => 'Контакт:',
  'LBL_DESCRIPTION_INFORMATION' => 'Описание',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_STATUS' => 'Статус:',
  'LBL_DIRECTION' => 'Сортировка:',
  'LBL_DATE' => 'Дата:',
  'LBL_DURATION' => 'Продолжительность:',
  'LBL_DURATION_HOURS' => 'Продолжительность (час.):',
  'LBL_DURATION_MINUTES' => 'Продолжительность (мин.):',
  'LBL_HOURS_MINUTES' => '(часов:минут)',
  'LBL_CALL' => 'Звонок:',
  'LBL_DATE_TIME' => 'Дата и время:',
  'LBL_TIME' => 'Время:',
  'LBL_HOURS_ABBREV' => 'час.',
  'LBL_MINSS_ABBREV' => 'мин.',
  'LNK_NEW_CALL' => 'Новый звонок',
  'LNK_NEW_MEETING' => 'Новая встреча',
  'LNK_CALL_LIST' => 'Звонки',
  'LNK_IMPORT_CALLS' => 'Импорт звонков',
  'ERR_DELETE_RECORD' => 'Перед удалением должен быть указан номер записи.',
  'NTC_REMOVE_INVITEE' => 'Вы действительно хотите удалить это приглашенное лицо из данного звонка?',
  'LBL_INVITEE' => 'Приглашенные',
  'LBL_RELATED_TO' => 'Относится к:',
  'LNK_NEW_APPOINTMENT' => 'Новое мероприятие',
  'LBL_SCHEDULING_FORM_TITLE' => 'Планирование',
  'LBL_ADD_INVITEE' => 'Добавить приглашенных',
  'LBL_NAME' => 'Имя',
  'LBL_FIRST_NAME' => 'Имя',
  'LBL_LAST_NAME' => 'Фамилия',
  'LBL_EMAIL' => 'E-mail-адрес',
  'LBL_PHONE' => 'Тел.',
  'LBL_SEND_BUTTON_TITLE' => 'Отправить приглашение [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Отправка приглашений',
  'LBL_DATE_END' => 'Дата окончания',
  'LBL_TIME_END' => 'Время окончания',
  'LBL_REMINDER_TIME' => 'Время напоминания',
  'LBL_SEARCH_BUTTON' => 'Поиск',
  'LBL_ACTIVITIES_REPORTS' => 'Отчеты по мероприятиям',
  'LBL_ADD_BUTTON' => 'Добавить',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Звонки',
  'LBL_LOG_CALL' => 'Журнал звонков',
  'LNK_SELECT_ACCOUNT' => 'Выбор клиента',
  'LNK_NEW_ACCOUNT' => 'Новый клиент',
  'LNK_NEW_OPPORTUNITY' => 'Новая сделка',
  'LBL_DEL' => 'Удалить',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Предварительные контакты',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакты',
  'LBL_USERS_SUBPANEL_TITLE' => 'Пользователи',
  'LBL_OUTLOOK_ID' => 'ID в Outlook',
  'LBL_MEMBER_OF' => 'Состоит в',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Заметки',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Ответственный (-ая)',
  'LBL_LIST_MY_CALLS' => 'Мои звонки',
  'LBL_SELECT_FROM_DROPDOWN' => 'Прежде всего выберите значение из списка "Относится к".',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая)',
  'LBL_ASSIGNED_TO_ID' => 'Ответственный (-ая)',
  'NOTICE_DURATION_TIME' => 'Продолжительность разговора должна быть больше 0 минут',
  'LBL_CALL_INFORMATION' => 'Описание звонка',
  'LBL_REMOVE' => 'удал.',
);


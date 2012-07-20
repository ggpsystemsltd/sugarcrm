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
  'LBL_EDITLAYOUT' => 'Правка расположения',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Ответственный пользователь',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Ответственный (ID)',
  'LBL_NEW_TIME_FORMAT' => '(24:00)',
  'LBL_COLON' => ':',
  'LBL_MODULE_NAME' => 'Задачи',
  'LBL_TASK' => 'Задачи:',
  'LBL_MODULE_TITLE' => 'Задачи: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Найти задачу',
  'LBL_LIST_FORM_TITLE' => 'Список задач',
  'LBL_NEW_FORM_TITLE' => 'Новая задача',
  'LBL_NEW_FORM_SUBJECT' => 'Тема:',
  'LBL_NEW_FORM_DUE_DATE' => 'Дата выполнения:',
  'LBL_NEW_FORM_DUE_TIME' => 'Время выполнения:',
  'LBL_LIST_CLOSE' => 'Закрыть',
  'LBL_LIST_SUBJECT' => 'Тема',
  'LBL_LIST_CONTACT' => 'Контакт',
  'LBL_LIST_PRIORITY' => 'Приоритет',
  'LBL_LIST_RELATED_TO' => 'Относится к',
  'LBL_LIST_DUE_DATE' => 'Дата выполнения',
  'LBL_LIST_DUE_TIME' => 'Время выполнения:',
  'LBL_SUBJECT' => 'Тема:',
  'LBL_STATUS' => 'Статус:',
  'LBL_DUE_DATE' => 'Дата выполнения',
  'LBL_DUE_TIME' => 'Время выполнения:',
  'LBL_PRIORITY' => 'Приоритет:',
  'LBL_DUE_DATE_AND_TIME' => 'Дата и время выполнения:',
  'LBL_START_DATE_AND_TIME' => 'Дата и время начала:',
  'LBL_START_DATE' => 'Дата начала:',
  'LBL_LIST_START_DATE' => 'Дата начала',
  'LBL_START_TIME' => 'Время начала:',
  'LBL_LIST_START_TIME' => 'Время начала',
  'DATE_FORMAT' => '(гггг-мм-дд)',
  'LBL_NONE' => 'Нет',
  'LBL_CONTACT' => 'Контакт:',
  'LBL_EMAIL_ADDRESS' => 'Адрес электронной почты:',
  'LBL_PHONE' => 'Телефон:',
  'LBL_EMAIL' => 'Адрес электронной почты:',
  'LBL_DESCRIPTION_INFORMATION' => 'Описание',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_NAME' => 'Название:',
  'LBL_CONTACT_NAME' => 'Контактное лицо:',
  'LBL_LIST_COMPLETE' => 'Завершено:',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_DATE_DUE_FLAG' => 'Нет даты выполнения',
  'LBL_DATE_START_FLAG' => 'Нет даты начала',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением контакта.',
  'ERR_INVALID_HOUR' => 'Пожалуйста, введите значение часа между 0 и 24',
  'LBL_DEFAULT_PRIORITY' => 'Средний',
  'LBL_LIST_MY_TASKS' => 'Мои открытые задачи',
  'LNK_NEW_TASK' => 'Новая задача',
  'LNK_TASK_LIST' => 'Задачи',
  'LNK_IMPORT_TASKS' => 'Импорт задач',
  'LBL_CONTACT_FIRST_NAME' => 'Имя контакта',
  'LBL_CONTACT_LAST_NAME' => 'Фамилия контакта',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Ответственный (-ая)',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая):',
  'LBL_LIST_DATE_MODIFIED' => 'Дата изменения',
  'LBL_CONTACT_ID' => 'Контакт',
  'LBL_PARENT_ID' => 'Код изначальной записи:',
  'LBL_CONTACT_PHONE' => 'Телефон контакта:',
  'LBL_PARENT_NAME' => 'Тип изначальной записи:',
  'LBL_ACTIVITIES_REPORTS' => 'Отчеты по мероприятиям',
  'LBL_TASK_INFORMATION' => 'Описание задачи',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Заметки',
  'LBL_DATE_DUE' => 'Дата окончания',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Изменено (ID)',
  'LBL_EXPORT_CREATED_BY' => 'Создано (ID)',
  'LBL_EXPORT_PARENT_TYPE' => 'Относится к модулю',
  'LBL_EXPORT_PARENT_ID' => 'Относится к ID',
);


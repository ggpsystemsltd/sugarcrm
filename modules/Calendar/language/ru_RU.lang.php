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
  'LBL_EDIT_USERLIST' => 'Список пользователей',
  'LBL_CREATE_MEETING' => 'Назначить встречу',
  'LBL_CREATE_CALL' => 'Назначить звонок',
  'LBL_HOURS_ABBREV' => 'час.',
  'LBL_MINS_ABBREV' => 'мин.',
  'LBL_YES' => 'Да',
  'LBL_NO' => 'Нет',
  'LBL_SETTINGS' => 'Настройки',
  'LBL_LOADING' => 'Идет загрузка...',
  'LBL_SAVING' => 'Сохранение...',
  'LBL_CONFIRM_REMOVE' => 'Вы действительно хотите удалить эту запись?',
  'NOTICE_DURATION_TIME' => 'Продолжительность должна быть больше 0 минут',
  'LBL_STYLE_BASIC' => 'Базовые',
  'LBL_STYLE_ADVANCED' => 'Расширенные',
  'LBL_INFO_TITLE' => 'Дополнительная информация',
  'LBL_INFO_DESC' => 'Описание',
  'LBL_INFO_START_DT' => 'Дата и время начала',
  'LBL_INFO_DURATION' => 'Продолжительность:',
  'LBL_INFO_NAME' => 'Тема',
  'LBL_INFO_RELATED_TO' => 'Относится к',
  'LBL_SUBJECT' => 'Тема',
  'LBL_DURATION' => 'Продолжительность:',
  'LBL_STATUS' => 'Статус',
  'LBL_DATE_TIME' => 'Дата и время',
  'LBL_SETTINGS_TITLE' => 'Настройки',
  'LBL_SAVE_BUTTON' => 'Сохранить',
  'LBL_DELETE_BUTTON' => 'Удалить',
  'LBL_APPLY_BUTTON' => 'Применить',
  'LBL_SEND_INVITES' => 'Отправка приглашений',
  'LBL_CANCEL_BUTTON' => 'Отмена',
  'LBL_CLOSE_BUTTON' => 'Закрыть',
  'LBL_GENERAL_TAB' => 'Подробности',
  'LBL_PARTICIPANTS_TAB' => 'Приглашенные',
  'LBL_PM' => 'PM',
  'LBL_MODULE_NAME' => 'Календарь',
  'LBL_MODULE_TITLE' => 'Календарь',
  'LNK_NEW_CALL' => 'Назначить звонок',
  'LNK_NEW_MEETING' => 'Назначить встречу',
  'LNK_NEW_APPOINTMENT' => 'Назначить встречу',
  'LNK_NEW_TASK' => 'Новая задача',
  'LNK_CALL_LIST' => 'Звонки',
  'LNK_MEETING_LIST' => 'Встречи',
  'LNK_TASK_LIST' => 'Задачи',
  'LNK_VIEW_CALENDAR' => 'Сегодня',
  'LNK_IMPORT_CALLS' => 'Импорт звонков',
  'LNK_IMPORT_MEETINGS' => 'Импорт встреч',
  'LNK_IMPORT_TASKS' => 'Импорт задач',
  'LBL_MONTH' => 'Месяц',
  'LBL_DAY' => 'День',
  'LBL_YEAR' => 'Год',
  'LBL_WEEK' => 'Неделя',
  'LBL_PREVIOUS_MONTH' => 'Предыдущий месяц',
  'LBL_PREVIOUS_DAY' => 'Предыдущий день',
  'LBL_PREVIOUS_YEAR' => 'Предыдущий год',
  'LBL_PREVIOUS_WEEK' => 'Предыдущая неделя',
  'LBL_NEXT_MONTH' => 'Следующий месяц',
  'LBL_NEXT_DAY' => 'Следующий день',
  'LBL_NEXT_YEAR' => 'Следующий год',
  'LBL_NEXT_WEEK' => 'Следующая неделя',
  'LBL_AM' => 'AM',
  'LBL_SCHEDULED' => 'Запланировано',
  'LBL_BUSY' => 'Занят',
  'LBL_CONFLICT' => 'Конфликт',
  'LBL_USER_CALENDARS' => 'Пользовательские календари',
  'LBL_SHARED' => 'Сводный',
  'LBL_PREVIOUS_SHARED' => 'Предыдущее',
  'LBL_NEXT_SHARED' => 'Следующее',
  'LBL_SHARED_CAL_TITLE' => 'Сводный календарь',
  'LBL_USERS' => 'Пользователь',
  'LBL_REFRESH' => 'Обновить',
  'LBL_SELECT_USERS' => 'Выбор пользователей для просмотра календаря',
  'LBL_FILTER_BY_TEAM' => 'Фильтрация списка пользователей по группам:',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая)',
  'LBL_DATE' => 'Дата и время начала:',
);


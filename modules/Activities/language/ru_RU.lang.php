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
  'LBL_ACCEPT' => 'Принять',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Мероприятия',
  'LBL_MODULE_TITLE' => 'Мероприятия - ГЛАВНАЯ',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск мероприятий',
  'LBL_LIST_FORM_TITLE' => 'Список мероприятий',
  'LBL_LIST_SUBJECT' => 'Тема',
  'LBL_LIST_CONTACT' => 'Контакт',
  'LBL_LIST_RELATED_TO' => 'Относится к',
  'LBL_LIST_DATE' => 'Дата',
  'LBL_LIST_TIME' => 'Время начала',
  'LBL_LIST_CLOSE' => 'Закрыть',
  'LBL_SUBJECT' => 'Тема:',
  'LBL_STATUS' => 'Статус:',
  'LBL_LOCATION' => 'Место:',
  'LBL_DATE_TIME' => 'Дата и время начала:',
  'LBL_DATE' => 'Дата начала:',
  'LBL_TIME' => 'Время начала:',
  'LBL_DURATION' => 'Продолжительность:',
  'LBL_DURATION_MINUTES' => 'Продолжительность минуты:',
  'LBL_HOURS_MINS' => '(часов:минут)',
  'LBL_CONTACT_NAME' => 'Контактное лицо:',
  'LBL_MEETING' => 'Встреча:',
  'LBL_DESCRIPTION_INFORMATION' => 'Описание',
  'LBL_DESCRIPTION' => 'Описание:',
  'LNK_NEW_CALL' => 'Назначить звонок',
  'LNK_NEW_MEETING' => 'Назначить встречу',
  'LNK_NEW_TASK' => 'Создать задачу',
  'LNK_NEW_NOTE' => 'Создать заметку или вложение',
  'LNK_NEW_EMAIL' => 'Создать архивный E-mail',
  'LNK_CALL_LIST' => 'Звонки',
  'LNK_MEETING_LIST' => 'Встречи',
  'LNK_TASK_LIST' => 'Задачи',
  'LNK_NOTE_LIST' => 'Заметки',
  'LNK_EMAIL_LIST' => 'E-mail',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением.',
  'NTC_REMOVE_INVITEE' => 'Вы уверены, что хотите удалить это приглашение из данной встречи?',
  'LBL_INVITEE' => 'Приглашенные',
  'LBL_LIST_DIRECTION' => 'Сортировка',
  'LBL_DIRECTION' => 'Сортировка',
  'LNK_NEW_APPOINTMENT' => 'Новая встреча/звонок',
  'LNK_VIEW_CALENDAR' => 'Просмотр календаря',
  'LBL_OPEN_ACTIVITIES' => 'Открытые мероприятия',
  'LBL_HISTORY' => 'История',
  'LBL_UPCOMING' => 'Предстоящие встречи/звонки',
  'LBL_TODAY' => 'в течение',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Создать задачу [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Создать задачу',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Назначить встречу [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Назначить встречу',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Назначить звонок [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Назначить звонок',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Создать заметку или вложение [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Создать заметку или вложение',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Отправить E-mail в архив [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Отправить E-mail в архив',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_DUE_DATE' => 'Дата завершения',
  'LBL_LIST_LAST_MODIFIED' => 'Последнее изменение',
  'NTC_NONE_SCHEDULED' => 'Не запланировано',
  'LNK_IMPORT_CALLS' => 'Импорт звонков',
  'LNK_IMPORT_MEETINGS' => 'Импорт встреч',
  'LNK_IMPORT_TASKS' => 'Импорт задач',
  'LNK_IMPORT_NOTES' => 'Импорт заметок',
  'NTC_NONE' => 'Нет',
  'LBL_ACCEPT_THIS' => 'Принять?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Открытые мероприятия',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Ответственный(ая)',
  'appointment_filter_dom' => 
  array (
    'today' => 'сегодня',
    'tomorrow' => 'завтра',
    'this Saturday' => 'на этой неделе',
    'next Saturday' => 'следующая неделя',
    'last this_month' => 'этот месяц',
    'last next_month' => 'следующий месяц',
  ),
);


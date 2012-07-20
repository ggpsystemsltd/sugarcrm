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
  'LBL_EDIT_USERLIST' => 'Списък с потребители',
  'LBL_CREATE_MEETING' => 'Насрочване на среща',
  'LBL_CREATE_CALL' => 'Планиране на обаждане',
  'LBL_HOURS_ABBREV' => 'час.',
  'LBL_MINS_ABBREV' => 'мин.',
  'LBL_YES' => 'Да',
  'LBL_NO' => 'Не',
  'LBL_SETTINGS' => 'Настройки',
  'LBL_CREATE_NEW_RECORD' => 'Въвеждане на дейност',
  'LBL_LOADING' => 'Зарежда се ...',
  'LBL_SAVING' => 'Запазва се ...',
  'LBL_CONFIRM_REMOVE' => 'Сигурни ли сте, че искате да изтриете този запис?',
  'LBL_EDIT_RECORD' => 'Edit Activity',
  'LBL_ERROR_SAVING' => 'Грешка при запис',
  'LBL_ERROR_LOADING' => 'Грешка при зареждане',
  'LBL_GOTO_DATE' => 'Goto Date',
  'NOTICE_DURATION_TIME' => 'Duration time must be greater than 0',
  'LBL_STYLE_BASIC' => 'Основно',
  'LBL_STYLE_ADVANCED' => 'Advanced',
  'LBL_INFO_TITLE' => 'Допълнителни детайли',
  'LBL_INFO_DESC' => 'Описание',
  'LBL_INFO_START_DT' => 'Start Date Time',
  'LBL_INFO_DUE_DT' => 'Due Date Time',
  'LBL_INFO_DURATION' => 'Продължителност',
  'LBL_INFO_NAME' => 'Относно',
  'LBL_INFO_RELATED_TO' => 'Свързано с',
  'LBL_NO_USER' => 'No match for field: Assigned to',
  'LBL_SUBJECT' => 'Относно',
  'LBL_DURATION' => 'Продължителност:',
  'LBL_STATUS' => 'Статус',
  'LBL_DATE_TIME' => 'Date and Time',
  'LBL_SETTINGS_TITLE' => 'Настройки',
  'LBL_SETTINGS_TIME_STARTS' => 'Start time:',
  'LBL_SETTINGS_TIME_ENDS' => 'End time:',
  'LBL_SETTINGS_CALENDAR_STYLE' => 'Calendar Style:',
  'LBL_SETTINGS_CALLS_SHOW' => 'Show Calls:',
  'LBL_SETTINGS_TASKS_SHOW' => 'Show Tasks:',
  'LBL_SAVE_BUTTON' => 'Съхрани',
  'LBL_DELETE_BUTTON' => 'Изтрий',
  'LBL_APPLY_BUTTON' => 'Потвърди',
  'LBL_SEND_INVITES' => 'Изпращане на покани',
  'LBL_CANCEL_BUTTON' => 'Отмени',
  'LBL_CLOSE_BUTTON' => 'Затвори',
  'LBL_GENERAL_TAB' => 'Допълнителна информация',
  'LBL_PARTICIPANTS_TAB' => 'Поканени потребители',
  'LBL_MODULE_NAME' => 'Календар',
  'LBL_MODULE_TITLE' => 'Календар',
  'LNK_NEW_CALL' => 'Планиране на обаждане',
  'LNK_NEW_MEETING' => 'Насрочване на среща',
  'LNK_NEW_APPOINTMENT' => 'Създаване на ангажимент',
  'LNK_NEW_TASK' => 'Добавяне на задача',
  'LNK_CALL_LIST' => 'Обаждания',
  'LNK_MEETING_LIST' => 'Срещи',
  'LNK_TASK_LIST' => 'Задачи',
  'LNK_VIEW_CALENDAR' => 'Календар',
  'LNK_IMPORT_CALLS' => 'Импортиране на обаждания',
  'LNK_IMPORT_MEETINGS' => 'Импортиране на срещи',
  'LNK_IMPORT_TASKS' => 'Импортиране на задачи',
  'LBL_MONTH' => 'Месец',
  'LBL_DAY' => 'Ден',
  'LBL_YEAR' => 'Година',
  'LBL_WEEK' => 'Седмица',
  'LBL_PREVIOUS_MONTH' => 'Миналия месец',
  'LBL_PREVIOUS_DAY' => 'Вчера',
  'LBL_PREVIOUS_YEAR' => 'Миналата година',
  'LBL_PREVIOUS_WEEK' => 'Миналата седмица',
  'LBL_NEXT_MONTH' => 'Следващия месец',
  'LBL_NEXT_DAY' => 'Утре',
  'LBL_NEXT_YEAR' => 'Следващата година',
  'LBL_NEXT_WEEK' => 'Следващата седмица',
  'LBL_AM' => 'Сутрин',
  'LBL_PM' => 'Следобед',
  'LBL_SCHEDULED' => 'Насрочен',
  'LBL_BUSY' => 'Изпълняван',
  'LBL_CONFLICT' => 'Конфликт',
  'LBL_USER_CALENDARS' => 'Потребителски календар',
  'LBL_SHARED' => 'Групов',
  'LBL_PREVIOUS_SHARED' => 'Предишна',
  'LBL_NEXT_SHARED' => 'Следваща',
  'LBL_SHARED_CAL_TITLE' => 'Групов календар',
  'LBL_USERS' => 'Потребител',
  'LBL_REFRESH' => 'Обнови',
  'LBL_SELECT_USERS' => 'Избор на потребители за показване в календара',
  'LBL_FILTER_BY_TEAM' => 'Филтриране на списък с потребители по екип:',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_DATE' => 'Начален час и дата',
);


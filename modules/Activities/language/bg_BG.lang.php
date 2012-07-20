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
  'LBL_ACCEPT' => 'Приеми',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_MODULE_NAME' => 'Дейности',
  'LBL_MODULE_TITLE' => 'Дейности',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Дейности"',
  'LBL_LIST_FORM_TITLE' => 'Списък с дейности',
  'LBL_LIST_SUBJECT' => 'Относно',
  'LBL_LIST_CONTACT' => 'Контакт',
  'LBL_LIST_RELATED_TO' => 'Свързано със:',
  'LBL_LIST_DATE' => 'Дата',
  'LBL_LIST_TIME' => 'Начален час',
  'LBL_LIST_CLOSE' => 'Затвори',
  'LBL_SUBJECT' => 'Относно:',
  'LBL_STATUS' => 'Статус:',
  'LBL_LOCATION' => 'Място:',
  'LBL_DATE_TIME' => 'Начална дата и час:',
  'LBL_DATE' => 'Начална дата:',
  'LBL_TIME' => 'Начален час:',
  'LBL_DURATION' => 'Продължителност:',
  'LBL_DURATION_MINUTES' => 'Продължителност (мин.):',
  'LBL_HOURS_MINS' => '(час./мин.)',
  'LBL_CONTACT_NAME' => 'Контакт:',
  'LBL_MEETING' => 'Среща:',
  'LBL_DESCRIPTION_INFORMATION' => 'Допълнителна информация',
  'LBL_DESCRIPTION' => 'Описание:',
  'LNK_NEW_CALL' => 'Планиране на обаждане',
  'LNK_NEW_MEETING' => 'Насрочване на среща',
  'LNK_NEW_TASK' => 'Добавяне на задача',
  'LNK_NEW_NOTE' => 'Добавяне на бележка или приложение',
  'LNK_NEW_EMAIL' => 'Създаване на запис за изпратена електронна поща',
  'LNK_CALL_LIST' => 'Обаждания',
  'LNK_MEETING_LIST' => 'Срещи',
  'LNK_TASK_LIST' => 'Задачи',
  'LNK_NOTE_LIST' => 'Бележки',
  'LNK_EMAIL_LIST' => 'Електронна поща',
  'ERR_DELETE_RECORD' => 'Трябва да определите номер, за да изтриете този запис.',
  'NTC_REMOVE_INVITEE' => 'Сигурни ли сте, че желаете да премахнете поканения потребител от срещата?',
  'LBL_INVITEE' => 'Поканени потребители',
  'LBL_LIST_DIRECTION' => 'Направление',
  'LBL_DIRECTION' => 'Направление',
  'LNK_NEW_APPOINTMENT' => 'Създаване на ангажимент',
  'LNK_VIEW_CALENDAR' => 'Календар',
  'LBL_OPEN_ACTIVITIES' => 'Текущи дейности',
  'LBL_HISTORY' => 'История',
  'LBL_UPCOMING' => 'Моите предстоящи ангажименти',
  'LBL_TODAY' => 'през',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Добавяне на задача [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Добавяне на задача',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Насрочване на среща [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Насрочване на среща',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Планиране на обаждане [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Планиране на обаждане',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Добавяне на бележка или приложение [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Добавяне на бележка или приложение',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Създаване на запис за изпратена електронна поща [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'хил.',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Създаване на запис за изпратена поща',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_DUE_DATE' => 'Падежна дата',
  'LBL_LIST_LAST_MODIFIED' => 'Последно модифициран',
  'NTC_NONE_SCHEDULED' => 'Непланиран.',
  'LNK_IMPORT_CALLS' => 'Импортиране на обаждания',
  'LNK_IMPORT_MEETINGS' => 'Импортиране на срещи',
  'LNK_IMPORT_TASKS' => 'Импортиране на задачи',
  'LNK_IMPORT_NOTES' => 'Импортиране на бележки',
  'NTC_NONE' => 'Няма',
  'LBL_ACCEPT_THIS' => 'Приемате ли?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Текущи дейности',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Отговорник',
  'appointment_filter_dom' => 
  array (
    'today' => 'днес',
    'tomorrow' => 'утре',
    'this Saturday' => 'текущата седмица',
    'next Saturday' => 'следващата седмица',
    'last this_month' => 'текущия месец',
    'last next_month' => 'следващия месец',
  ),
);


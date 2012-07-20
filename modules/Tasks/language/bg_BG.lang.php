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
  'LBL_EDITLAYOUT' => 'Редактиране на подредби',
  'LBL_NEW_TIME_FORMAT' => '(24:00)',
  'LBL_COLON' => ':',
  'LBL_NONE' => 'None',
  'LBL_ACTIVITIES_REPORTS' => 'Activities Report',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigned User ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modified By ID',
  'LBL_EXPORT_CREATED_BY' => 'Created By ID',
  'LBL_MODULE_NAME' => 'Задачи',
  'LBL_TASK' => 'Задачи',
  'LBL_MODULE_TITLE' => 'Задачи',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Задачи"',
  'LBL_LIST_FORM_TITLE' => 'Списък със задачи',
  'LBL_NEW_FORM_TITLE' => 'Създаване на задача',
  'LBL_NEW_FORM_SUBJECT' => 'Относно:',
  'LBL_NEW_FORM_DUE_DATE' => 'Крайна дата:',
  'LBL_NEW_FORM_DUE_TIME' => 'Краен час:',
  'LBL_LIST_CLOSE' => 'Затвори',
  'LBL_LIST_SUBJECT' => 'Относно',
  'LBL_LIST_CONTACT' => 'Контакт',
  'LBL_LIST_PRIORITY' => 'Степен на важност',
  'LBL_LIST_RELATED_TO' => 'Свързана с:',
  'LBL_LIST_DUE_DATE' => 'Падежна дата',
  'LBL_LIST_DUE_TIME' => 'Краен час',
  'LBL_SUBJECT' => 'Относно:',
  'LBL_STATUS' => 'Статус:',
  'LBL_DUE_DATE' => 'Крайна дата:',
  'LBL_DUE_TIME' => 'Краен час:',
  'LBL_PRIORITY' => 'Степен на важност:',
  'LBL_DUE_DATE_AND_TIME' => 'Крайна дата и час:',
  'LBL_START_DATE_AND_TIME' => 'Начална дата и час:',
  'LBL_START_DATE' => 'Начална дата:',
  'LBL_LIST_START_DATE' => 'Начална дата',
  'LBL_START_TIME' => 'Начален час:',
  'LBL_LIST_START_TIME' => 'Начален час',
  'DATE_FORMAT' => '(гггг-мм-дд)',
  'LBL_CONTACT' => 'Контакт:',
  'LBL_EMAIL_ADDRESS' => 'Електронна поща:',
  'LBL_PHONE' => 'Телефон:',
  'LBL_EMAIL' => 'Електронна поща:',
  'LBL_DESCRIPTION_INFORMATION' => 'Допълнителна информация',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_NAME' => 'Име:',
  'LBL_CONTACT_NAME' => 'Контакт:',
  'LBL_LIST_COMPLETE' => 'Приключена:',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_DATE_DUE_FLAG' => 'Без крайна дата',
  'LBL_DATE_START_FLAG' => 'Без начална дата',
  'ERR_DELETE_RECORD' => 'Трябва да въведете номер на записа, за да изтриете този контакт.',
  'ERR_INVALID_HOUR' => 'Моля, въведете час между 0 и 24',
  'LBL_DEFAULT_PRIORITY' => 'Средна',
  'LBL_LIST_MY_TASKS' => 'Моите текущи задачи',
  'LNK_NEW_TASK' => 'Създаване на задача',
  'LNK_TASK_LIST' => 'Списък със задачи',
  'LNK_IMPORT_TASKS' => 'Импортиране на задачи',
  'LBL_CONTACT_FIRST_NAME' => 'Име на контакта',
  'LBL_CONTACT_LAST_NAME' => 'Фамилия на контакта',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник:',
  'LBL_LIST_DATE_MODIFIED' => 'Модифицирано на',
  'LBL_CONTACT_ID' => 'Контакт:',
  'LBL_PARENT_ID' => 'Родителско ID:',
  'LBL_CONTACT_PHONE' => 'Телефон за контакт:',
  'LBL_PARENT_NAME' => 'Родителски тип:',
  'LBL_TASK_INFORMATION' => 'Задача',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Бележки',
  'LBL_DATE_DUE' => 'Крайна дата',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Отговорник',
  'LBL_EXPORT_PARENT_TYPE' => 'Свързан с модул',
  'LBL_EXPORT_PARENT_ID' => 'Свързан с ID',
);


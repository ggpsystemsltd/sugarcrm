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
  'LBL_ID' => 'Id:',
  'LBL_DURATION_UNIT' => 'Duration Unit:',
  'LBL_MODULE_NAME' => 'Задачи по проекта',
  'LBL_MODULE_TITLE' => 'Задачи по проекти',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Задачи по проекти"',
  'LBL_LIST_FORM_TITLE' => 'Списък със задачи:',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Редактирай от списъка със задачи',
  'LBL_PROJECT_TASK_ID' => 'Задача по проекта:',
  'LBL_PROJECT_ID' => 'Проект:',
  'LBL_DATE_ENTERED' => 'Създадено на:',
  'LBL_DATE_MODIFIED' => 'Последно модифицирано:',
  'LBL_ASSIGNED_USER_ID' => 'Отговорник:',
  'LBL_MODIFIED_USER_ID' => 'Модифицирано от:',
  'LBL_CREATED_BY' => 'Създадено от:',
  'LBL_TEAM_ID' => 'Екип:',
  'LBL_NAME' => 'Име:',
  'LBL_STATUS' => 'Статус:',
  'LBL_DATE_DUE' => 'Крайна дата:',
  'LBL_TIME_DUE' => 'Краен час:',
  'LBL_RESOURCE' => 'Изпълнител:',
  'LBL_PREDECESSORS' => 'Свързани задачи:',
  'LBL_DATE_START' => 'Начална дата:',
  'LBL_DATE_FINISH' => 'Крайна дата:',
  'LBL_TIME_START' => 'Начален час:',
  'LBL_TIME_FINISH' => 'Краен час:',
  'LBL_DURATION' => 'Продължителност:',
  'LBL_ACTUAL_DURATION' => 'Отчетено време за изпълнение:',
  'LBL_PARENT_ID' => 'Проект:',
  'LBL_PARENT_TASK_ID' => 'Свързана задача:',
  'LBL_PERCENT_COMPLETE' => 'Прогрес (%):',
  'LBL_PRIORITY' => 'Степен на важност:',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_ORDER_NUMBER' => 'Поредност:',
  'LBL_TASK_NUMBER' => 'Номер на задачата:',
  'LBL_TASK_ID' => 'ID на задачата:',
  'LBL_DEPENDS_ON_ID' => 'Подзадача на:',
  'LBL_MILESTONE_FLAG' => 'Критична точка:',
  'LBL_ESTIMATED_EFFORT' => 'Планирани часове (час.):',
  'LBL_ACTUAL_EFFORT' => 'Действителни часове (час.):',
  'LBL_UTILIZATION' => 'Натоварване (%):',
  'LBL_DELETED' => 'Изтрити:',
  'LBL_LIST_ORDER_NUMBER' => 'Поръчка',
  'LBL_LIST_NAME' => 'Име',
  'LBL_LIST_DAYS' => 'дни',
  'LBL_LIST_PARENT_NAME' => 'Проекти',
  'LBL_LIST_PERCENT_COMPLETE' => '% завършеност',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_DURATION' => 'Продължителност',
  'LBL_LIST_ACTUAL_DURATION' => 'Отчетено време за изпълнение',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Отговорник:',
  'LBL_LIST_DATE_DUE' => 'Крайна дата',
  'LBL_LIST_DATE_START' => 'Начална дата',
  'LBL_LIST_DATE_FINISH' => 'Крайна дата',
  'LBL_LIST_PRIORITY' => 'Степен на важност',
  'LBL_LIST_CLOSE' => 'Затвори',
  'LBL_PROJECT_NAME' => 'Проект',
  'LNK_NEW_PROJECT' => 'Въвеждане на проект',
  'LNK_PROJECT_LIST' => 'Списък с проекти:',
  'LNK_NEW_PROJECT_TASK' => 'Въвеждане на задача по проекта',
  'LNK_PROJECT_TASK_LIST' => 'Задачи по проекта',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Моите текущи задачи по проекти',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Задачи по проекта',
  'LBL_NEW_FORM_TITLE' => 'Нова задача по проекта',
  'LBL_ACTIVITIES_TITLE' => 'Дейности',
  'LBL_HISTORY_TITLE' => 'История',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Дейности',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'DATE_JS_ERROR' => 'Моля, въведете дата съответстваща на посочения час',
  'LBL_ASSIGNED_USER_NAME' => 'Отговорник:',
  'LBL_PARENT_NAME' => 'Проект',
  'LBL_LIST_PROJECT_NAME' => 'Проекти',
);


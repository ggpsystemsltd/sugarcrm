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
  'LBL_MODULE_NAME' => 'Проектные задачи',
  'LBL_MODULE_TITLE' => 'Проектные задачи: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Найти проектную задачу',
  'LBL_LIST_FORM_TITLE' => 'Список проектных задач',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Править задачу в строках и столбцах',
  'LBL_ID' => 'ID:',
  'LBL_PROJECT_TASK_ID' => 'ID проектной задачи:',
  'LBL_PROJECT_ID' => 'ID проекта:',
  'LBL_DATE_ENTERED' => 'Дата создания:',
  'LBL_DATE_MODIFIED' => 'Дата изменения:',
  'LBL_ASSIGNED_USER_ID' => 'Ответственный (ая):',
  'LBL_MODIFIED_USER_ID' => 'Изменено пользователем (ID):',
  'LBL_CREATED_BY' => 'Создано:',
  'LBL_TEAM_ID' => 'Команда',
  'LBL_NAME' => 'Название',
  'LBL_STATUS' => 'Статус:',
  'LBL_DATE_DUE' => 'Дата окончания:',
  'LBL_TIME_DUE' => 'Время окончания:',
  'LBL_RESOURCE' => 'Запас:',
  'LBL_PREDECESSORS' => 'Предшественники:',
  'LBL_DATE_START' => 'Дата начала:',
  'LBL_DATE_FINISH' => 'Дата окончания:',
  'LBL_TIME_START' => 'Время начала:',
  'LBL_TIME_FINISH' => 'Время окончания:',
  'LBL_DURATION' => 'Продолжительность:',
  'LBL_DURATION_UNIT' => 'Единица продолжительности:',
  'LBL_ACTUAL_DURATION' => 'Фактическая продолжительность',
  'LBL_PARENT_ID' => 'Проект:',
  'LBL_PARENT_TASK_ID' => 'Id родительской задачи:',
  'LBL_PERCENT_COMPLETE' => '% выполнения:',
  'LBL_PRIORITY' => 'Приоритет:',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_ORDER_NUMBER' => 'Заказ:',
  'LBL_TASK_NUMBER' => 'Номер задачи:',
  'LBL_TASK_ID' => 'ID задачи',
  'LBL_DEPENDS_ON_ID' => 'Зависит от:',
  'LBL_MILESTONE_FLAG' => 'Промежуточный этап разработки:',
  'LBL_ESTIMATED_EFFORT' => 'Оценка усилий (час.):',
  'LBL_ACTUAL_EFFORT' => 'Реальные усилия (час.):',
  'LBL_UTILIZATION' => 'Использование (%):',
  'LBL_DELETED' => 'Удалено:',
  'LBL_LIST_ORDER_NUMBER' => 'Заказ',
  'LBL_LIST_NAME' => 'Название',
  'LBL_LIST_DAYS' => 'дней',
  'LBL_LIST_PARENT_NAME' => 'Проект',
  'LBL_LIST_PERCENT_COMPLETE' => '% выполнения',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_DURATION' => 'Продолжительность',
  'LBL_LIST_ACTUAL_DURATION' => 'Фактическая продолжительность',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Ответственный (-ая)',
  'LBL_LIST_DATE_DUE' => 'Дата окончания',
  'LBL_LIST_DATE_START' => 'Дата начала',
  'LBL_LIST_DATE_FINISH' => 'Дата окончания',
  'LBL_LIST_PRIORITY' => 'Приоритет',
  'LBL_LIST_CLOSE' => 'Закрыть',
  'LBL_PROJECT_NAME' => 'Название проекта',
  'LNK_NEW_PROJECT' => 'Новый проект',
  'LNK_PROJECT_LIST' => 'Список проектов',
  'LNK_NEW_PROJECT_TASK' => 'Создать задачу по проекту',
  'LNK_PROJECT_TASK_LIST' => 'Проектные задачи',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Мои проектные задачи',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Проектные задачи',
  'LBL_NEW_FORM_TITLE' => 'Создать проектную задачу',
  'LBL_ACTIVITIES_TITLE' => 'Мероприятия',
  'LBL_HISTORY_TITLE' => 'История',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Мероприятия',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'DATE_JS_ERROR' => 'Пожалуйста, введите дату, соответствующую введенному времени',
  'LBL_ASSIGNED_USER_NAME' => 'Ответственный (-ая)',
  'LBL_PARENT_NAME' => 'Название проекта',
  'LBL_LIST_PROJECT_NAME' => 'Проекты',
);


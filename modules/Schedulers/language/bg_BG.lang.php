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
  'LBL_OOTB_WORKFLOW' => 'Process Workflow Tasks',
  'LBL_OOTB_REPORTS' => 'Run Report Generation Scheduled Tasks',
  'LBL_OOTB_IE' => 'Check Inbound Mailboxes',
  'LBL_CRONTAB_EXAMPLES' => 'The above uses standard crontab notation.',
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'The cron specifications run based on the server timezone (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Please specify the scheduler execution time accordingly.',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'To Setup Windows Scheduler',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'To Setup Crontab',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Job Log',
  'LBL_POLLMONITOREDINBOXES' => 'Check Inbound Mail Accounts',
  'LBL_PROCESSWORKFLOW' => 'Process Workflow Tasks',
  'LBL_PROCESSQUEUE' => 'Run Report Generation Scheduled Tasks',
  'LBL_UPDATETRACKERSESSIONS' => 'Update Tracker Session Tables',
  'LBL_OOTB_BOUNCE' => 'Обработка на върнати електронни писма от кампании',
  'LBL_OOTB_CAMPAIGN' => 'Изпращане на електронни писма от кампании',
  'LBL_OOTB_PRUNE' => 'Prune на базата на 1-о число всеки месец',
  'LBL_OOTB_TRACKER' => 'Prune User History Table on 1st of Month',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Update tracker_sessions table',
  'LBL_LIST_JOB_INTERVAL' => 'Интервал:',
  'LBL_LIST_LIST_ORDER' => 'Запланирани дейности:',
  'LBL_LIST_NAME' => 'График на дейностите:',
  'LBL_LIST_RANGE' => 'Времеви диапазон:',
  'LBL_LIST_REMOVE' => 'Премахни:',
  'LBL_LIST_STATUS' => 'Статус:',
  'LBL_LIST_TITLE' => 'Списък с автоматизирани задачи:',
  'LBL_LIST_EXECUTE_TIME' => 'Ще бъде изпълнена в:',
  'LBL_SUN' => 'Неделя',
  'LBL_MON' => 'Понеделник',
  'LBL_TUE' => 'Вторник',
  'LBL_WED' => 'Сряда',
  'LBL_THU' => 'Четвъртък',
  'LBL_FRI' => 'Петък',
  'LBL_SAT' => 'Събота',
  'LBL_ALL' => 'Ежедневно',
  'LBL_EVERY_DAY' => 'Ежедневно',
  'LBL_AT_THE' => 'At the',
  'LBL_EVERY' => 'На всеки',
  'LBL_FROM' => 'от',
  'LBL_ON_THE' => 'На всеки',
  'LBL_RANGE' => 'to',
  'LBL_AT' => 'at',
  'LBL_IN' => 'в',
  'LBL_AND' => 'и',
  'LBL_MINUTES' => 'мин.',
  'LBL_HOUR' => 'час.',
  'LBL_HOUR_SING' => 'час.',
  'LBL_MONTH' => 'месец',
  'LBL_OFTEN' => 'Възможной най-често.',
  'LBL_MIN_MARK' => 'minute mark',
  'LBL_MINS' => 'мин.',
  'LBL_HOURS' => 'час.',
  'LBL_DAY_OF_MONTH' => 'число от месеца',
  'LBL_MONTHS' => 'месец',
  'LBL_DAY_OF_WEEK' => 'ден от седмицата',
  'LBL_ALWAYS' => 'Винаги',
  'LBL_CATCH_UP' => 'Изпълни, ако е пропуснато',
  'LBL_CATCH_UP_WARNING' => 'Uncheck if this Job may take more than a moment to run.',
  'LBL_DATE_TIME_END' => 'Крайна дата и час',
  'LBL_DATE_TIME_START' => 'Начална дата и час',
  'LBL_INTERVAL' => 'Интервал',
  'LBL_JOB' => 'Задача',
  'LBL_LAST_RUN' => 'Последно успешно изпълнение',
  'LBL_MODULE_NAME' => 'Автоматизирани задачи',
  'LBL_MODULE_TITLE' => 'Автоматизирани задачи',
  'LBL_NAME' => 'Име на задачата',
  'LBL_NEVER' => 'Никога',
  'LBL_NEW_FORM_TITLE' => 'Нова дейност',
  'LBL_PERENNIAL' => 'непрекъснато',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене на автоматизирани задачи',
  'LBL_SCHEDULER' => 'График на дейностите:',
  'LBL_STATUS' => 'Статус',
  'LBL_TIME_FROM' => 'Активна от',
  'LBL_TIME_TO' => 'Активна до',
  'LBL_WARN_CURL_TITLE' => 'cURL предупреждение:',
  'LBL_WARN_CURL' => 'Внимание:',
  'LBL_WARN_NO_CURL' => 'IMAP бибилиотеките не са компилирaни и разрешени в PHP дистрибуцията (--with-curl=/path/to/curl_library).  Моля, свържете се със системния администратор за разрешаване на проблема.  Without the cURL functionality, the Scheduler cannot thread its jobs.',
  'LBL_BASIC_OPTIONS' => 'Базови настройки',
  'LBL_ADV_OPTIONS' => 'Допълнителни настройки',
  'LBL_TOGGLE_ADV' => 'Показване на допълнителни настройки',
  'LBL_TOGGLE_BASIC' => 'Базови настройки',
  'LNK_LIST_SCHEDULER' => 'Автоматизирани задачи',
  'LNK_NEW_SCHEDULER' => 'Създаване на автоматизирана задача',
  'LNK_LIST_SCHEDULED' => 'Запланирани дейности',
  'SOCK_GREETING' => 'This is the interface for SugarCRM Schedulers Service. <br />[ Available daemon commands: start|restart|shutdown|status ]<br />To quit, type &#39;quit&#39;.  To shutdown the service &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Трябва да определите номер на записа, за да изтриете тази запланирана дейност.',
  'ERR_CRON_SYNTAX' => 'Невалиден Cron синтаксис',
  'NTC_DELETE_CONFIRMATION' => 'Сигурни ли сте, че желаете да изтриете този запис?',
  'NTC_STATUS' => 'Установете статус НЕАКТИВЕН, за да премахнете тази задача от списъка с автоматизиранните задачи',
  'NTC_LIST_ORDER' => 'Установете реда, в който да се подреждат автоматизираните задачи в списъка',
  'LBL_CRON_LINUX_DESC' => 'Добавете следния ред към настройките за автоматично изпълнение на задачи:',
  'LBL_CRON_WINDOWS_DESC' => 'Създаване на batch файл със следните команди:',
  'LBL_NO_PHP_CLI' => 'If your host does not have the PHP binary available, you can use wget or curl to launch your Jobs.<br>for wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose /cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent /cron.php > /dev/null 2>&1',
  'LBL_EXECUTE_TIME' => 'Изпълнена на',
  'LBL_REFRESHJOBS' => 'Опресни задачите',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Изпращане на електронни писма от кампании',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Обработка на върнати електронни писма от кампании',
  'LBL_PRUNEDATABASE' => 'Prune на базата на 1-о число всеки месец',
  'LBL_TRIMTRACKER' => 'Prune User History Table on 1st of Month',
);


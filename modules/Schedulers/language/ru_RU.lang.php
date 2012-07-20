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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Команды планировщика cron запускаются в соответствии с настройками часового пояса сервера (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Учитывайте это при использовании планировщика.',
  'LBL_OOTB_WORKFLOW' => 'Обработать задачи Рабочего процесса',
  'LBL_OOTB_REPORTS' => 'Выполнять запланированные задачи создания отчетов',
  'LBL_OOTB_IE' => 'Проверять входящие письма',
  'LBL_OOTB_BOUNCE' => 'Запускать ночью проверку почтовых ящиков для возвращаемых писем',
  'LBL_OOTB_CAMPAIGN' => 'Запускать ночью массовую рассылку писем',
  'LBL_OOTB_PRUNE' => 'Сжимать базу данных первого числа каждого месяца',
  'LBL_OOTB_TRACKER' => 'Очищать историю последних просмотров первого числа каждого месяца',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Обновить таблицу tracker_sessions',
  'LBL_LIST_JOB_INTERVAL' => 'Интервал:',
  'LBL_LIST_LIST_ORDER' => 'Планировщик заданий:',
  'LBL_LIST_NAME' => 'Планировщик заданий:',
  'LBL_LIST_RANGE' => 'Порядок:',
  'LBL_LIST_REMOVE' => 'Удалить:',
  'LBL_LIST_STATUS' => 'Статус:',
  'LBL_LIST_TITLE' => 'Список заданий',
  'LBL_LIST_EXECUTE_TIME' => 'Будет запущено в:',
  'LBL_SUN' => 'Воскресенье',
  'LBL_MON' => 'Понедельник',
  'LBL_TUE' => 'Вторник',
  'LBL_WED' => 'Среда',
  'LBL_THU' => 'Четверг',
  'LBL_FRI' => 'Пятница',
  'LBL_SAT' => 'Суббота',
  'LBL_ALL' => 'Каждый день',
  'LBL_EVERY_DAY' => 'Каждый день',
  'LBL_AT_THE' => 'В',
  'LBL_EVERY' => '&#39;Каждые',
  'LBL_FROM' => 'с',
  'LBL_ON_THE' => 'Раз в',
  'LBL_RANGE' => 'до',
  'LBL_AT' => 'в',
  'LBL_IN' => 'в',
  'LBL_AND' => 'и',
  'LBL_MINUTES' => 'минут',
  'LBL_HOUR' => 'часов',
  'LBL_HOUR_SING' => 'час',
  'LBL_MONTH' => 'месяц',
  'LBL_OFTEN' => 'Постоянно',
  'LBL_MIN_MARK' => 'минуту',
  'LBL_MINS' => 'мин',
  'LBL_HOURS' => 'час',
  'LBL_DAY_OF_MONTH' => 'дата',
  'LBL_MONTHS' => 'мес',
  'LBL_DAY_OF_WEEK' => 'день',
  'LBL_CRONTAB_EXAMPLES' => 'Значения представлены в стандартной crontab-нотации',
  'LBL_ALWAYS' => 'Всегда',
  'LBL_CATCH_UP' => 'Выполнить, если пропущена',
  'LBL_CATCH_UP_WARNING' => 'Снять метку, если работу можно выполнить не только единожды.',
  'LBL_DATE_TIME_END' => 'Дата и время окончания',
  'LBL_DATE_TIME_START' => 'Дата и время начала',
  'LBL_INTERVAL' => 'Интервал',
  'LBL_JOB' => 'Действие:',
  'LBL_LAST_RUN' => 'Последняя удачно запущенная',
  'LBL_MODULE_NAME' => 'Задания Sugar',
  'LBL_MODULE_TITLE' => 'Планировщик заданий',
  'LBL_NAME' => 'Задание',
  'LBL_NEVER' => 'Никогда',
  'LBL_NEW_FORM_TITLE' => 'Новое задание',
  'LBL_PERENNIAL' => 'Бессрочно',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск задания',
  'LBL_SCHEDULER' => 'задание:',
  'LBL_STATUS' => 'Статус',
  'LBL_TIME_FROM' => 'Выполнять действие с',
  'LBL_TIME_TO' => 'Выполнять действие до',
  'LBL_WARN_CURL_TITLE' => 'cURL предупреждение:',
  'LBL_WARN_CURL' => 'Предупреждение:',
  'LBL_WARN_NO_CURL' => 'Эта система не имеет cURL-библиотеку, доступную/откомпилированную в PHP-модуле (--with-curl=/path/to/curl_library).  Пожалуйста, свяжитесь с Вашим администратором, чтобы решить этот вопрос. Без cURL-функциональности планировщик заданий не может выполнить необходимые действия.',
  'LBL_BASIC_OPTIONS' => 'Основные параметры',
  'LBL_ADV_OPTIONS' => 'Расширенные опции',
  'LBL_TOGGLE_ADV' => 'Показать дополнительные настройки',
  'LBL_TOGGLE_BASIC' => 'Показать основные параметры',
  'LNK_LIST_SCHEDULER' => 'Список заданий',
  'LNK_NEW_SCHEDULER' => 'Новое задание',
  'LNK_LIST_SCHEDULED' => 'Запланированные задания',
  'SOCK_GREETING' => 'Это интерфейс сервиса планировщика заданий. [ Доступные команды: start|restart|shutdown|status ] Для выхода наберите &#39;quit&#39;. Для выкючения сервиса: &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением расписания.',
  'ERR_CRON_SYNTAX' => 'Неверный Cron-синтаксис',
  'NTC_DELETE_CONFIRMATION' => 'Вы действительно хотите удалить эту запись?',
  'NTC_STATUS' => 'Установите статус "Не активна" для удаления этой задачи из списка заданий',
  'NTC_LIST_ORDER' => 'Установка последовательности, в которой задания появятся в списке',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Настройка планировщика заданий Windows',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Настройка сrontab',
  'LBL_CRON_LINUX_DESC' => 'Примечание: Для запуска планировщика заданий Sugar добавьте эту строку в файл crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Примечание: Для запуска планировщика заданий Sugar создайте пакетный файл и выполняйте его при помощи планировщика заданий Windows. Пакетный файл должен содержать следующие команды:',
  'LBL_NO_PHP_CLI' => 'Если на вашем хосте не установлен PHP, Вы можете использовать wget или curl для выполнения запланированных задач.<br /><br />для wget: *    *    *    *    *    wget --quiet --non-verbose http://translate.sugarcrm.com/latest/cron.php > /dev/null 2>&1<br />для curl:  *    *    *    *    *    curl --silent http://translate.sugarcrm.com/latest/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Журнал заданий',
  'LBL_EXECUTE_TIME' => 'Время выполнения',
  'LBL_REFRESHJOBS' => 'Обновить задания',
  'LBL_POLLMONITOREDINBOXES' => 'Проверять почтовые ящики для входящей почты',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Запускать ночью массовую рассылку писем',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Запускать ночью проверку почтовых ящиков для возвращаемых писем',
  'LBL_PRUNEDATABASE' => 'Сжимать базу данных первого числа каждого месяца',
  'LBL_TRIMTRACKER' => 'Очищать таблицы трекера',
  'LBL_PROCESSWORKFLOW' => 'Обработать задачи Рабочего процесса',
  'LBL_PROCESSQUEUE' => 'Выполнять запланированные задачи создания отчетов',
  'LBL_UPDATETRACKERSESSIONS' => 'Обновлять таблицы сессий трекера',
);


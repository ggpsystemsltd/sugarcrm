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
  'LBL_MORE_DETAIL' => 'Детальнее',
  'LBL_URL' => 'URL',
  'LBL_MODULE_NAME' => 'Уведомления для команд',
  'LBL_MODULE_TITLE' => 'Уведомления для команд: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск уведомлений для команд',
  'LBL_LIST_FORM_TITLE' => 'Список уведомлений для команд',
  'LBL_PRODUCTTYPE' => 'Уведомление для команды',
  'LBL_NOTICES' => 'Уведомления для команд',
  'LBL_LIST_NAME' => 'Название',
  'LBL_URL_TITLE' => 'Название URL',
  'LBL_LIST_DESCRIPTION' => 'Описание',
  'LBL_NAME' => 'Название',
  'LBL_DESCRIPTION' => 'Описание',
  'LBL_LIST_LIST_ORDER' => 'Заказ',
  'LBL_LIST_ORDER' => 'Заказ',
  'LBL_DATE_START' => 'Дата начала',
  'LBL_DATE_END' => 'Дата окончания',
  'LBL_STATUS' => 'Статус',
  'LNK_NEW_TEAM' => 'Новая Команда',
  'LNK_NEW_TEAM_NOTICE' => 'Новое уведомление для команды',
  'LNK_LIST_TEAM' => 'Команды',
  'LNK_LIST_TEAMNOTICE' => 'Уведомления для команд',
  'LNK_PRODUCT_LIST' => 'Прайс-лист продуктов',
  'LNK_NEW_PRODUCT' => 'Новый продукт',
  'LNK_NEW_MANUFACTURER' => 'Производители',
  'LNK_NEW_SHIPPER' => 'Поставщики перевозок',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Категории продуктов',
  'LNK_NEW_PRODUCT_TYPE' => 'Список видов продуктов',
  'NTC_DELETE_CONFIRMATION' => 'Вы действительно хотите удалить эту запись?',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением.',
  'NTC_LIST_ORDER' => 'Укажите порядок, в котором этот вид будет выведен в выпадающем списке видов продуктов.',
  'LBL_TEAM_NOTICE_FEATURES' => 'Особенности: * Улучшенный пользовательский интерфейс и новый Мастер объединяют простой, интуитивный дизайн и пошаговый процесс создания отчета с инструкцией для пользователя. * Сложные по структуре отчеты позволяют пользователям создавать отчеты используя большое количество модулей и сложную логику. * Сводные отчеты дают возможность группировать данные по множеству атрибутов в виде гибкой сетки. Пользователи могут создавать сложные экспериментальные таблицы с возможностью отображать такие операции как Сумма, Средняя величина, Вычисление, Процентное отношение. * Run-Time фильтры позволяют пользователям изменять атрибуты отчета в в реальном времени.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Новый мобильный интерфейс приложения SugarCRM ломает компромисс между удобством использования и мобильностью.<br /><br />Особенности:<br />- Улучшенный пользовательский интерфейс даёт пользователям доступ к редактированию, подробностям, просмотру списков и связанных записей, а так же возможность доступа к директории сотрудников, свойствам хранилища и недавно просмотренным объектам. <br /><br />- Независимость от устройства даёт пользователям возможность просматривать данные SugarCRM с любого PDA или смартфона, включая Blackberry и iPhone.<br /><br />- Клиент с поддержкой Rich HTML позволяет прекрасно отображать данные SugarCRM через стандартный веб-браузер.<br /><br />- Новые возможности поиска позволяют пользователям быстрее находить информацию.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Улучшения импорта данных позволяет гораздо проще импортировать данные из таких приложений как Excel, Act!, Microsoft Outlook и Salesforce.com в SugarCRM. <br /><br />Улучшения:<br /><br />- Улучшенный пользовательский интерфейс для отображения предоставляет больше возможностей, чтобы удостовериться в гладкости и аккуратности процесса переноса данных в  SugarCRM<br /><br />- Контроль качества данных позволяет администраторам выбирать, будут ли создаваться новые записи для импорте данных или данные будут импортироваться в уже существующие записи, и таким образом уменьшить дублирование информации.<br /><br />- Импорт во Все модули позволяет перенести информацию из другого CRM-приложения в любой модуль, сокращая повторный ввод данных.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Конструктор модулей позволяет вам расширить функционал SugarCRM в новых направлениях. <br /><br />Улучшения:<br /><br />- Новые отношения позволяют новым и существующим модулям состоять в новых типах отношений.<br /><br />- Функция ревизии предоставляет полную историю создания и последующей модификации модуля для отслеживания изменений.<br /><br />- Поддержка Разделов позволяет отображать индивидуальные объекты и функционал модулей в AJAX-контейнерах Главной страницы.<br /><br />- Новые Шаблоны предоставляют возможность легко отслеживать файлы и информацию по сделкам.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Трекер теперь предоставляет расширенный взгляд на использование и производительность SugarCRM. <br /><br />Особенности:<br /><br />- Отчёты трекера предоставляют мгновенный картинку использования системы для увеличения привлекательности в глазах пользователей и более чёткого понимания ими применения CRM.<br /><br />- Пользователи могут просматривать отчёты о еженедельной деятельности в CRM, просмотренные записи и модули, совокупное время нахождения в системе и онлайн-статус остальных участников команды.<br /><br />- Мониторинг системы предоставляет администраторам информацию об использовании системы и потенциальные места в системе, на которые следует обратить особое внимание.',
  'dom_status' => 
  array (
    'Visible' => 'Видимый',
    'Hidden' => 'Скрытый',
  ),
);


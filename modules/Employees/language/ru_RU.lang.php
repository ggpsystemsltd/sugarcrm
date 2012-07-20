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
  'LBL_USER_TYPE' => 'Тип пользователя',
  'LBL_EMAIL_LINK_TYPE' => 'E-mail-клиент',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Почтовый клиент Sugar</b> - отправка электронных писем при помощи встроенного в Sugar почтового клиента.<br><br /><b>Внешний почтовый клиент</b> - любой другой почтовый клиент, например Microsoft Outlook.',
  'LBL_ONLY_ACTIVE' => 'Активные сотрудники',
  'LBL_SELECT' => 'Выбрать',
  'LBL_FF_CLEAR' => 'Очистить',
  'LBL_AUTHENTICATE_ID' => 'Id авторизации',
  'LBL_EXT_AUTHENTICATE' => 'Внешняя авторизация',
  'LBL_GROUP_USER' => 'Групповой пользователь',
  'LBL_LIST_ACCEPT_STATUS' => 'Подтверждение',
  'LBL_MODIFIED_BY' => 'Изменено',
  'LBL_MODIFIED_BY_ID' => 'Изменено пользователем',
  'LBL_CREATED_BY_NAME' => 'Создано',
  'LBL_PORTAL_ONLY_USER' => 'Пользователь API портала',
  'LBL_PSW_MODIFIED' => 'Последнее изменение пароля',
  'LBL_USER_HASH' => 'Пароль',
  'LBL_SYSTEM_GENERATED_PASSWORD' => 'Пароль, сгенерированный системой',
  'LBL_PICTURE_FILE' => 'Фото',
  'LBL_DESCRIPTION' => 'Описание',
  'LBL_FAX_PHONE' => 'Факс',
  'LBL_STATUS' => 'Статус',
  'LBL_ADDRESS_CITY' => 'Адрес - город',
  'LBL_ADDRESS_COUNTRY' => 'Адрес - страна',
  'LBL_ADDRESS_POSTALCODE' => 'Адрес - индекс',
  'LBL_ADDRESS_STATE' => 'Адрес - область',
  'LBL_ADDRESS_STREET' => 'Адрес - улица',
  'LBL_DATE_MODIFIED' => 'Дата изменения',
  'LBL_DATE_ENTERED' => 'Дата создания',
  'LBL_DELETED' => 'Удалено',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Сотрудники',
  'LBL_MODULE_TITLE' => 'Сотрудники: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск сотрудника',
  'LBL_LIST_FORM_TITLE' => 'Сотрудники',
  'LBL_NEW_FORM_TITLE' => 'Создать сотрудника',
  'LBL_EMPLOYEE' => 'Сотрудники',
  'LBL_LOGIN' => 'Логин',
  'LBL_RESET_PREFERENCES' => 'Сбросить до стандартных настроек',
  'LBL_TIME_FORMAT' => 'Формат времени',
  'LBL_DATE_FORMAT' => 'Формат даты',
  'LBL_TIMEZONE' => 'Часовой пояс',
  'LBL_CURRENCY' => 'Валюта',
  'LBL_LIST_NAME' => 'Имя',
  'LBL_LIST_LAST_NAME' => 'Фамилия',
  'LBL_LIST_EMPLOYEE_NAME' => 'Имя сотрудника',
  'LBL_LIST_DEPARTMENT' => 'Отдел',
  'LBL_LIST_REPORTS_TO_NAME' => 'Руководитель',
  'LBL_LIST_EMAIL' => 'E-mail',
  'LBL_LIST_PRIMARY_PHONE' => 'Основной тел.:',
  'LBL_LIST_USER_NAME' => 'Имя пользователя:',
  'LBL_LIST_ADMIN' => 'Администрирование',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Создать сотрудника [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Добавить сотрудника',
  'LBL_ERROR' => 'Ошибка:',
  'LBL_PASSWORD' => 'Пароль',
  'LBL_EMPLOYEE_NAME' => 'Имя сотрудника',
  'LBL_USER_NAME' => 'Имя пользователя:',
  'LBL_FIRST_NAME' => 'Имя',
  'LBL_LAST_NAME' => 'Фамилия',
  'LBL_EMPLOYEE_SETTINGS' => 'Настройки сотрудника',
  'LBL_THEME' => 'Тема',
  'LBL_LANGUAGE' => 'Язык',
  'LBL_ADMIN' => 'Администратор',
  'LBL_EMPLOYEE_INFORMATION' => 'Информация о сотруднике',
  'LBL_OFFICE_PHONE' => 'Рабочий тел.:',
  'LBL_REPORTS_TO' => 'Руководитель',
  'LBL_REPORTS_TO_NAME' => 'Руководитель',
  'LBL_OTHER_PHONE' => 'Другой тел.:',
  'LBL_OTHER_EMAIL' => 'Другой e-mail-адрес',
  'LBL_NOTES' => 'Заметки',
  'LBL_DEPARTMENT' => 'Отдел',
  'LBL_TITLE' => 'Должность:',
  'LBL_ANY_ADDRESS' => 'Адрес:',
  'LBL_ANY_PHONE' => 'Тел.:',
  'LBL_ANY_EMAIL' => 'E-mail:',
  'LBL_ADDRESS' => 'Адрес:',
  'LBL_CITY' => 'Город:',
  'LBL_STATE' => 'Область:',
  'LBL_POSTAL_CODE' => 'Индекс:',
  'LBL_COUNTRY' => 'Страна:',
  'LBL_NAME' => 'Имя:',
  'LBL_MOBILE_PHONE' => 'Моб. тел.:',
  'LBL_OTHER' => 'Другой:',
  'LBL_FAX' => 'Факс:',
  'LBL_EMAIL' => 'E-mail-адрес:',
  'LBL_HOME_PHONE' => 'Домашний тел.:',
  'LBL_WORK_PHONE' => 'Рабочий тел.:',
  'LBL_ADDRESS_INFORMATION' => 'Адресная информация',
  'LBL_EMPLOYEE_STATUS' => 'Статус сотрудника:',
  'LBL_PRIMARY_ADDRESS' => 'Основной адрес:',
  'LBL_SAVED_SEARCH' => 'Настройки внешнего вида',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Создать пользователя [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Создать пользователя',
  'LBL_FAVORITE_COLOR' => 'Любимый цвет',
  'LBL_MESSENGER_ID' => 'Имя в IM:',
  'LBL_MESSENGER_TYPE' => 'IM-служба:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Имя сотрудника',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'уже существует. Дублирование имен сотрудников не допускается.  Измените имя сотрудника, чтобы оно стало уникальным.',
  'ERR_LAST_ADMIN_1' => 'Имя сотрудника "',
  'ERR_LAST_ADMIN_2' => '" - последний сотрудник с доступом администратора. Хотя бы один пользователь должен быть администратором.',
  'LNK_NEW_EMPLOYEE' => 'Новый сотрудник',
  'LNK_EMPLOYEE_LIST' => 'Просмотр Сотрудников',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением.',
  'LBL_DEFAULT_TEAM' => 'Группа по умолчанию:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Выбрать группу по умолчанию для новых записей',
  'LBL_MY_TEAMS' => 'Мои группы',
  'LBL_LIST_DESCRIPTION' => 'Описание',
  'LNK_EDIT_TABS' => 'Править закладки',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Вы уверены, что хотите удалить этого сотрудника из группы?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Статус сотрудника',
  'LBL_SUGAR_LOGIN' => 'Является пользователем Sugar',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Уведомлять при назначении',
  'LBL_IS_ADMIN' => 'Является администратором',
  'LBL_GROUP' => 'Групповой пользователь',
  'LBL_PORTAL_ONLY' => 'Пользователь только Портала',
  'LBL_PHOTO' => 'Фотография',
  'LBL_DELETE_USER_CONFIRM' => 'Этот Сотрудник также является пользователем. При удалении записи Сотрудника будет также удалена запись Пользователя, и Пользователь больше не будет иметь доступ к приложению. Вы хотите продолжить и удалить эту запись?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Вы уверены, что хотите удалить этого сотрудника?',
);


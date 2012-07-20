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
  'LBL_ASSIGNED_TO' => 'Ответственный (-ая)',
  'LBL_EMAIL_ADDRESSES' => 'E-mail-адрес (-а)',
  'ACCOUNT_REMOVE_PROJECT_CONFIRM' => 'Вы действительно хотите удалить этого контрагента из проекта?',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением контрагента.',
  'LBL_ACCOUNT_NAME' => 'Название компании:',
  'LBL_ACCOUNT' => 'Компания:',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Мероприятия',
  'LBL_ADDRESS_INFORMATION' => 'Адресная информация',
  'LBL_ANNUAL_REVENUE' => 'Годовой доход:',
  'LBL_ANY_ADDRESS' => 'Адрес:',
  'LBL_ANY_EMAIL' => 'E-mail:',
  'LBL_ANY_PHONE' => 'Тел.:',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая):',
  'LBL_RATING' => 'Рейтинг',
  'LBL_ASSIGNED_USER' => 'Ответственный (-ая):',
  'LBL_ASSIGNED_TO_ID' => 'Ответственный (-ая):',
  'LBL_BILLING_ADDRESS_CITY' => 'Юридический адрес - город:',
  'LBL_BILLING_ADDRESS_COUNTRY' => 'Юридический адрес - страна:',
  'LBL_BILLING_ADDRESS_POSTALCODE' => 'Юридический адрес - индекс:',
  'LBL_BILLING_ADDRESS_STATE' => 'Юридический адрес - область:',
  'LBL_BILLING_ADDRESS_STREET_2' => 'Юридический адрес - улица 2',
  'LBL_BILLING_ADDRESS_STREET_3' => 'Юридический адрес - улица 3',
  'LBL_BILLING_ADDRESS_STREET_4' => 'Юридический адрес - улица 4',
  'LBL_BILLING_ADDRESS_STREET' => 'Юридический адрес - улица:',
  'LBL_BILLING_ADDRESS' => 'Юридический адрес:',
  'LBL_ACCOUNT_INFORMATION' => 'Информация о компании',
  'LBL_CITY' => 'Город',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакты',
  'LBL_COUNTRY' => 'Страна:',
  'LBL_DATE_ENTERED' => 'Дата создания:',
  'LBL_DATE_MODIFIED' => 'Дата изменения:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Контрагенты',
  'LBL_DESCRIPTION_INFORMATION' => 'Описание',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_DUPLICATE' => 'Возможно этот контрагент является дублирующим',
  'LBL_EMAIL' => 'E-mail-адрес:',
  'LBL_EMPLOYEES' => 'Число сотрудников:',
  'LBL_FAX' => 'Факс:',
  'LBL_INDUSTRY' => 'Отрасль:',
  'LBL_LIST_ACCOUNT_NAME' => 'Контрагент:',
  'LBL_LIST_CITY' => 'Город',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-mail-адрес',
  'LBL_LIST_PHONE' => 'Телефон',
  'LBL_LIST_STATE' => 'Область',
  'LBL_LIST_WEBSITE' => 'Сайт',
  'LBL_MEMBER_OF' => 'Состоит в:',
  'LBL_MEMBER_ORG_FORM_TITLE' => 'Членские организации',
  'LBL_MEMBER_ORG_SUBPANEL_TITLE' => 'Членские организации',
  'LBL_NAME' => 'Название:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Другой E-mail:',
  'LBL_OTHER_PHONE' => 'Другой тел.:',
  'LBL_OWNERSHIP' => 'Собственность:',
  'LBL_PARENT_ACCOUNT_ID' => 'Родительский контрагент',
  'LBL_PHONE_ALT' => 'Доп. телефон:',
  'LBL_PHONE_FAX' => 'Тел. (факс):',
  'LBL_PHONE_OFFICE' => 'Тел. (раб.):',
  'LBL_PHONE' => 'Телефон:',
  'LBL_EMAIL_ADDRESS' => 'E-mail-адрес (-а)',
  'LBL_POSTAL_CODE' => 'Индекс:',
  'LBL_PUSH_BILLING' => 'Инициировать процесс оплаты',
  'LBL_PUSH_SHIPPING' => 'Инициировать процесс доставки',
  'LBL_SAVE_ACCOUNT' => 'Сохранение контрагента',
  'LBL_SHIPPING_ADDRESS_CITY' => 'Фактический адрес - город:',
  'LBL_SHIPPING_ADDRESS_COUNTRY' => 'Фактический адрес - страна:',
  'LBL_SHIPPING_ADDRESS_POSTALCODE' => 'Фактический адрес - индекс:',
  'LBL_SHIPPING_ADDRESS_STATE' => 'Фактический адрес - область:',
  'LBL_SHIPPING_ADDRESS_STREET_2' => 'Фактический адрес - улица 2',
  'LBL_SHIPPING_ADDRESS_STREET_3' => 'Фактический адрес - улица 3',
  'LBL_SHIPPING_ADDRESS_STREET_4' => 'Фактический адрес - улица 4',
  'LBL_SHIPPING_ADDRESS_STREET' => 'Фактический адрес - улица:',
  'LBL_SHIPPING_ADDRESS' => 'Фактический адрес:',
  'LBL_STATE' => 'Область:',
  'LBL_TEAMS_LINK' => 'Команды',
  'LBL_TICKER_SYMBOL' => 'Биржевой код:',
  'LBL_TYPE' => 'Тип:',
  'LBL_USERS_ASSIGNED_LINK' => 'Ответственные',
  'LBL_USERS_CREATED_LINK' => 'Создано пользователями',
  'LBL_USERS_MODIFIED_LINK' => 'Изменено пользователями',
  'LBL_VIEW_FORM_TITLE' => 'Обзор контрагента',
  'LBL_WEBSITE' => 'Сайт:',
  'LNK_ACCOUNT_LIST' => 'Контрагенты',
  'LNK_NEW_ACCOUNT' => 'Новый контрагент',
  'MSG_DUPLICATE' => 'Создаваемый вами контрагент возможно дублирует уже имеющуюся запись. Похожие контрагенты показаны ниже. Выберите контрагента из списка или нажмите кнопку "Сохранить"  для продолжения создания нового контрагента.',
  'MSG_SHOW_DUPLICATES' => 'Создаваемый вами контрагент возможно дублирует уже имеющуюся запись. Похожие контрагенты показаны ниже. Нажмите кнопку "Сохранить"  для продолжения создания нового контрагента или кнопку "Отказаться" для возврата в модуль.',
  'NTC_COPY_BILLING_ADDRESS' => 'Копировать юридический адрес в фактический',
  'NTC_COPY_BILLING_ADDRESS2' => 'Копировать в фактический адрес',
  'NTC_COPY_SHIPPING_ADDRESS' => 'Копировать фактический адрес в юридический',
  'NTC_COPY_SHIPPING_ADDRESS2' => 'Копировать в юридический адрес',
  'NTC_DELETE_CONFIRMATION' => 'Вы действительно хотите удалить эту запись?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Вы действительно хотите удалить эту запись?',
  'NTC_REMOVE_MEMBER_ORG_CONFIRMATION' => 'Вы действительно хотите удалить эту запись из членских организаций?',
);


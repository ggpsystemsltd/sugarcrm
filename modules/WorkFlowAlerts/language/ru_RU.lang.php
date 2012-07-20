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
  'LBL_EDITLAYOUT' => 'Правка расположения',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Список получателей уведомлений',
  'LBL_MODULE_TITLE' => 'Получатели: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Найти получателя бизнес-процесса',
  'LBL_LIST_FORM_TITLE' => 'Список получателей бизнес-процесса',
  'LBL_NEW_FORM_TITLE' => 'Создать получателя бизнес-процесса',
  'LBL_LIST_USER_TYPE' => 'Тип пользователя',
  'LBL_LIST_ARRAY_TYPE' => 'Тип действия',
  'LBL_LIST_RELATE_TYPE' => 'Тип связи',
  'LBL_LIST_ADDRESS_TYPE' => 'Тип адреса',
  'LBL_LIST_FIELD_VALUE' => 'Пользователь',
  'LBL_LIST_REL_MODULE1' => 'Связанный модуль',
  'LBL_LIST_REL_MODULE2' => 'Связанный связанный модуль',
  'LBL_LIST_WHERE_FILTER' => 'Статус',
  'LBL_USER_TYPE' => 'Тип пользователя:',
  'LBL_ARRAY_TYPE' => 'Тип действия',
  'LBL_RELATE_TYPE' => 'Тип отношений:',
  'LBL_WHERE_FILTER' => 'Статус:',
  'LBL_FIELD_VALUE' => 'Выбранный пользователь:',
  'LBL_REL_MODULE1' => 'Связанный модуль:',
  'LBL_REL_MODULE2' => 'Связанный связанный модуль:',
  'LBL_CUSTOM_USER' => 'Индивидуальный пользователь:',
  'LNK_NEW_WORKFLOW' => 'Создать бизнес-процесс',
  'LNK_WORKFLOW' => 'Объекты бизнес-процесса',
  'LBL_LIST_STATEMENT' => 'Получатели извещения:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Отправить извещение следующему получателю:',
  'LBL_ALERT_CURRENT_USER' => 'Пользователь, соотнесенный с целевым',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Пользователь, соотнесенный с целевым модулем',
  'LBL_ALERT_REL_USER' => 'Пользователь, соотнесенный со связанным',
  'LBL_ALERT_REL_USER_TITLE' => 'Пользователь, соотнесенный со связанным модулем',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Получатель, соотнесенный со связанным',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Получатель, соотнесенный со связанным модулем',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Получатель, соотнесенный с целевым модулем',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Получатель, соотнесенный с целевым модулем',
  'LBL_ALERT_SPECIFIC_USER' => 'Указанный',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Указанный пользователь',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Все пользователи в указанной',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Все пользователи в указанной команде',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Все пользователи в указанной',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Все пользователи в указанной роли',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Участники команды, соотнесенные с целевым модулем',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Все пользователи, принадлежащие к команды (-ам), соотнесенные с целевым модулем',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Пользователь в системе во время выполнения',
  'LBL_RECORD' => 'Модуль',
  'LBL_TEAM' => 'Команда',
  'LBL_USER' => 'Пользователь',
  'LBL_USER_MANAGER' => 'руководитель пользователя',
  'LBL_ROLE' => 'роль',
  'LBL_SEND_EMAIL' => 'Отправить E-mail',
  'LBL_USER1' => 'кто создал запись',
  'LBL_USER2' => 'кто внес последние изменения',
  'LBL_USER3' => 'Текущий',
  'LBL_USER3b' => 'системы.',
  'LBL_USER4' => 'кто ответственный за запись',
  'LBL_USER5' => 'кто бы ответственным за запись',
  'LBL_ADDRESS_TO' => 'кому:',
  'LBL_ADDRESS_CC' => 'копия:',
  'LBL_ADDRESS_BCC' => 'скрытая копия:',
  'LBL_ADDRESS_TYPE' => 'используя адрес',
  'LBL_ADDRESS_TYPE_TARGET' => 'тип',
  'LBL_ALERT_REL1' => 'Связанный модуль:',
  'LBL_ALERT_REL2' => 'Связанный связанный модуль:',
  'LBL_NEXT_BUTTON' => 'Дальше',
  'LBL_PREVIOUS_BUTTON' => 'Назад',
  'NTC_REMOVE_ALERT_USER' => 'Вы действительно хотите удалить этого получателя уведомления?',
  'LBL_REL_CUSTOM_STRING' => 'Выбрать поля пользовательского e-mail-адреса и имени',
  'LBL_REL_CUSTOM' => 'Выбрать поле пользовательского e-mail-адреса:',
  'LBL_REL_CUSTOM2' => 'Поле',
  'LBL_AND' => 'и поле имени:',
  'LBL_REL_CUSTOM3' => 'Поле',
  'LBL_FILTER_CUSTOM' => '(Дополнительный фильтр) Фильтровать связанный модуль по определенным',
  'LBL_FIELD' => 'Поле',
  'LBL_SPECIFIC_FIELD' => 'поле',
  'LBL_FILTER_BY' => '(Дополнительный фильтр) Фильтровать связанный модуль по',
  'LBL_MODULE_NAME_INVITE' => 'Список приглашенных',
  'LBL_LIST_STATEMENT_INVITE' => 'Приглашенные на встречу/для звонка:',
  'LBL_SELECT_VALUE' => 'Необходимо выбрать верное значение.',
  'LBL_SELECT_NAME' => 'Необходимо выбрать пользовательское поле имени',
  'LBL_SELECT_EMAIL' => 'Необходимо выбрать пользовательское поле e-mail-адреса',
  'LBL_SELECT_FILTER' => 'Необходимо выбрать поле, для фильтрации по нему',
  'LBL_SELECT_NAME_EMAIL' => 'Необходимо выбрать поля имени и e-mail-адреса',
  'LBL_PLEASE_SELECT' => 'Пожалуйста, выберите',
);


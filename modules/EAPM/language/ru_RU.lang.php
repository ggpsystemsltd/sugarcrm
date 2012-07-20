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
  'LBL_CONNECT_BUTTON_TITLE' => 'Подключить',
  'LBL_NOTE' => 'Обратите внимание',
  'LBL_CONNECTED' => 'Подключение завершено',
  'LBL_DISCONNECTED' => 'Подключение отсутствует',
  'LBL_ERR_POPUPS_DISABLED' => 'Чтобы произвести подключение, разреите всплывающие окна в браузере или добавьте сайт "{0}" в исключения.',
  'LBL_ID' => 'ID',
  'LBL_URL' => 'URL',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'Ответственный (-ая)',
  'LBL_ASSIGNED_TO_NAME' => 'Пользователь Sugar',
  'LBL_DATE_ENTERED' => 'Дата создания',
  'LBL_DATE_MODIFIED' => 'Дата изменения',
  'LBL_MODIFIED' => 'Изменено',
  'LBL_MODIFIED_ID' => 'Изменено (Id)',
  'LBL_MODIFIED_NAME' => 'Изменено пользователем',
  'LBL_CREATED' => 'Создано',
  'LBL_CREATED_ID' => 'Создано (Id)',
  'LBL_DESCRIPTION' => 'Описание',
  'LBL_DELETED' => 'Удалено',
  'LBL_NAME' => 'Имя пользователя приложения',
  'LBL_CREATED_USER' => 'Создано пользователем',
  'LBL_MODIFIED_USER' => 'Изменено пользователем',
  'LBL_LIST_NAME' => 'Название',
  'LBL_TEAM' => 'Команды',
  'LBL_TEAMS' => 'Команды',
  'LBL_TEAM_ID' => 'ID команды',
  'LBL_LIST_FORM_TITLE' => 'Список внешних учетных записей',
  'LBL_MODULE_NAME' => 'Внешняя учетная запись',
  'LBL_MODULE_TITLE' => 'Внешние учетные записи',
  'LBL_HOMEPAGE_TITLE' => 'Мои внешние учетные записи',
  'LNK_NEW_RECORD' => 'Создать внешнюю учетную запись',
  'LNK_LIST' => 'Обзор внешних учетных записей',
  'LNK_IMPORT_SUGAR_EAPM' => 'Импортировать внешние учетные записи',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск внешнего источника',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Мероприятия',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Внешние учетные записи',
  'LBL_NEW_FORM_TITLE' => 'Создать внешнюю учетную запись',
  'LBL_PASSWORD' => 'Пароль',
  'LBL_USER_NAME' => 'Имя пользователя',
  'LBL_APPLICATION' => 'Приложение',
  'LBL_API_DATA' => 'Данные API',
  'LBL_API_TYPE' => 'Тип авторизации',
  'LBL_API_CONSKEY' => 'Ключ пользователя',
  'LBL_API_CONSSECRET' => 'Секретный ключ',
  'LBL_API_OAUTHTOKEN' => 'Токен аутентификации',
  'LBL_AUTH_UNSUPPORTED' => 'Этот метод авторизации не поддерживается приложением',
  'LBL_AUTH_ERROR' => 'Попытка авторизации внешней учетной записи не удалась.',
  'LBL_VALIDATED' => 'Доступ подтверждён',
  'LBL_ACTIVE' => 'Активно',
  'LBL_OAUTH_NAME' => '%',
  'LBL_SUGAR_USER_NAME' => 'Пользователь Sugar',
  'LBL_DISPLAY_PROPERTIES' => 'Обзор свойств',
  'LBL_ERR_NO_AUTHINFO' => 'Для этой учетной записи нет информации для авторизации.',
  'LBL_ERR_NO_TOKEN' => 'Нет действительный токенов для этой учётной записи',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Вы сейчас не находитесь в системе под Вашей учётной записью {0}. Нажмите ОК чтобы войти в систему ещё раз и активировать внешнюю учётную запись.',
  'LBL_MEET_NOW_BUTTON' => 'Встретить сейчас',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Ваши предстоящие встречи LotusLive™',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Предстоящие встречи LotusLive™',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Обзор документов LotusLive™',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'Документы LotusLive™',
  'LBL_REAUTHENTICATE_LABEL' => 'Повторная авторизация',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Учётная запись для этого приложения уже существует. Мы восстановили существующую учётную запись.',
  'LBL_OMIT_URL' => '(Без http:// или https://)',
  'LBL_OAUTH_SAVE_NOTICE' => 'Нажмите "Сохранить" чтобы создать внешнюю учётную запись. Вы будете перенаправлены на страницу для ввода информации о Вашей учётной записи и предоставления доступа к ней из Sugar. После предоставления этой информации Вы будете перенаправлены обратно в Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Нажмите Сохранить для создания внешней учетной записи. SugarCRM проверит правильность данных учетной записи.',
  'LBL_ERR_FACEBOOK' => 'Ошибка от Facebook, лента событий не может быть отображена.',
  'LBL_ERR_NO_RESPONSE' => 'Произошла ошибка при попытке сохранения во внешнюю учетную запись.',
  'LBL_ERR_TWITTER' => 'Ошибка от Twitter, лента событий не может быть отображена.',
);


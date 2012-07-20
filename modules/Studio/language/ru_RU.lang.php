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
  'LBL_BTN_CANCEL' => 'Отмена',
  'LBL_EDIT_LAYOUT' => 'Правка расположения',
  'LBL_EDIT_ROWS' => 'Правка строк',
  'LBL_EDIT_COLUMNS' => 'Правка столбцов',
  'LBL_EDIT_LABELS' => 'Правка меток',
  'LBL_EDIT_FIELDS' => 'Правка индивидуальных полей',
  'LBL_ADD_FIELDS' => 'Добавить индивидуальные поля',
  'LBL_DISPLAY_HTML' => 'Показать HTML-код',
  'LBL_SELECT_FILE' => 'Выбор файла',
  'LBL_SAVE_LAYOUT' => 'Сохранить макет',
  'LBL_SELECT_A_SUBPANEL' => 'Выбор субпанели',
  'LBL_SELECT_SUBPANEL' => 'Выбор субпанели',
  'LBL_MODULE_TITLE' => 'Студия',
  'LBL_TOOLBOX' => 'Студия',
  'LBL_STAGING_AREA' => 'Стартовая область (переместите элементы сюда)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Элементы <br> (выберите категорию из списка для отображения соответствующих элементов)',
  'LBL_SUGAR_BIN_STAGE' => 'Бинарные файлы Sugar (выберите категорию из списка для отображения соответствующих элементов)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Просмотр полей Sugar',
  'LBL_VIEW_SUGAR_BIN' => 'Просмотр бинарных файлов Sugar',
  'LBL_FAILED_TO_SAVE' => 'Сохранение невозможно',
  'LBL_CONFIRM_UNSAVE' => 'Изменения не будут сохранены. Вы действительно хотите продолжить?',
  'LBL_PUBLISHING' => 'Публикация...',
  'LBL_PUBLISHED' => 'Опубликовано',
  'LBL_FAILED_PUBLISHED' => 'Публикация невозможна',
  'LBL_DROP_HERE' => '[Переместить сюда]',
  'LBL_NAME' => 'Название',
  'LBL_LABEL' => 'Надпись',
  'LBL_MASS_UPDATE' => 'Групповое обновление',
  'LBL_AUDITED' => 'Аудит',
  'LBL_CUSTOM_MODULE' => 'Модуль',
  'LBL_DEFAULT_VALUE' => 'Значение по умолчанию',
  'LBL_REQUIRED' => 'Необходимо',
  'LBL_DATA_TYPE' => 'Тип',
  'LBL_HISTORY' => 'История',
  'LBL_SW_WELCOME' => '<h2>Добро пожаловать в студию!</h2><br> Что бы вы хотели сделать сегодня?<br><b> Пожалуйста, выберите необходимую опцию.</b>',
  'LBL_SW_EDIT_MODULE' => 'Редактирование модуля',
  'LBL_SW_EDIT_DROPDOWNS' => 'Редактирование выпадающих списков',
  'LBL_SW_EDIT_TABS' => 'Настройка закладок модулей',
  'LBL_SW_RENAME_TABS' => 'Переименование закладок',
  'LBL_SW_EDIT_GROUPTABS' => 'Настройка групповых закладок',
  'LBL_SW_EDIT_PORTAL' => 'Редактирование портала',
  'LBL_SW_EDIT_WORKFLOW' => 'Редактирование рабочего процесса',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Восстановление индивидуальных полей',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Перемещение индивидуальных полей',
  'LBL_SMW_WELCOME' => 'Добро пожаловать в студию!</h2><br><b><br />Пожалуйста, выберите модуль.',
  'LBL_SMA_WELCOME' => '<h2>Редактирование модуля</h2><br />Что именно вы хотите сделать с модулем?<br><b><br />Пожалуйста, выберите необходимое действие.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Изменение индивидуальных полей',
  'LBL_SMA_EDIT_LAYOUT' => 'Правка расположения',
  'LBL_SMA_EDIT_LABELS' => 'Правка меток',
  'LBL_MB_PREVIEW' => 'Предварительный просмотр',
  'LBL_MB_RESTORE' => 'Восстановить',
  'LBL_MB_DELETE' => 'Удалить',
  'LBL_MB_COMPARE' => 'Сравнить',
  'LBL_MB_WELCOME' => '<h2>История</h2><br /><br> История позволяет вам просмотреть предыдущие сохраненные версии редактируемого в данный момент файла. Вы можете сравнить текущую версию с предыдущей, а также восстановить предыдущую версию. Восстановленный файл станет вашим рабочим файлом. Вы должны опубликовать его для того, чтобы он стал доступен всем пользователям.<br> Что бы вы хотели сделать?<br><br /><b> Пожалуйста, выберите необходимую опцию.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Создать выпадающий список',
  'LBL_ED_WELCOME' => '<h2>Редактор выпадающих списков</h2><br><b>Вы можете отредактировать существующий список или создать новый.',
  'LBL_DROPDOWN_NAME' => 'Название выпадающего списка:',
  'LBL_DROPDOWN_LANGUAGE' => 'Язык содержимого выпадающего списка:',
  'LBL_TABGROUP_LANGUAGE' => 'Язык:',
  'LBL_EC_WELCOME' => '<h2>Редактор индивидуальных полей</h2><br><b>Вы можете просмотреть или отредактировать существующее индивидуальное поле, создать новое индивидуальное поле или очистить кэш индивидуального поля.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Обзор индивидуальных полей',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Создать индивидуальное поле',
  'LBL_EC_CLEAR_CACHE' => 'Очистить кэш',
  'LBL_SM_WELCOME' => '<h2>История</h2><br><b>Пожалуйста, выберите файл, который вы хотите просмотреть.</b>',
  'LBL_DD_DISPALYVALUE' => 'Отображаемое значение',
  'LBL_DD_DATABASEVALUE' => 'Значение в базе',
  'LBL_DD_ALL' => 'Все',
  'LBL_BTN_SAVE' => 'Сохранить',
  'LBL_BTN_SAVEPUBLISH' => 'Сохранить и развернуть',
  'LBL_BTN_HISTORY' => 'История',
  'LBL_BTN_NEXT' => 'Далее',
  'LBL_BTN_BACK' => 'Назад',
  'LBL_BTN_ADDCOLS' => 'Добавить столбцы',
  'LBL_BTN_ADDROWS' => 'Добавить строки',
  'LBL_BTN_UNDO' => 'Отмена',
  'LBL_BTN_REDO' => 'Повторное выполнение',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Добавить индивидуальное поле',
  'LBL_BTN_TABINDEX' => 'Редактировать порядок перемещения по элементам макета',
  'LBL_TAB_SUBTABS' => 'Подчиненные закладки',
  'LBL_MODULES' => 'Модули',
  'LBL_MODULE_NAME' => 'Администрирование',
  'LBL_CONFIGURE_GROUP_TABS' => 'Настройка групповых модулей',
  'LBL_GROUP_TAB_WELCOME' => 'Группы будут отображаться в панели закладок, если пользователь выберет просмотр  Сгруппированных модулей вместо обычных в качестве принципа навигации. Вы можете перемещать закладки модулей между группами для настройки их расположения. Пустые группы не будут отображаться в панели закладок.',
  'LBL_RENAME_TAB_WELCOME' => 'Нажмите на Отображаемом значении любой закладки в таблице для ее переименования.',
  'LBL_DELETE_MODULE' => 'Удалить модуль из группы',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Установите эту опцию для отображения закладки "Разное" в панели закладок. По умолчанию данная закладка содержит все модули, еще не вошедшие в другие группы.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Для отображения групповых закладок на одном из доступных языков, выберите необходимый язык, отредактируйте групповые метки и нажмите на кнопку <b>Сохранить и установить</b>.',
  'LBL_ADD_GROUP' => 'Добавить группу',
  'LBL_NEW_GROUP' => 'Новая группа',
  'LBL_RENAME_TABS' => 'Переименование закладок',
  'LBL_DISPLAY_OTHER_TAB' => 'Отобразить закладку "Разное" в панели закладок',
  'LBL_DEFAULT' => 'По умолчанию',
  'LBL_ADDITIONAL' => 'Дополнительно',
  'LBL_AVAILABLE' => 'Доступно',
  'LBL_LISTVIEW_DESCRIPTION' => 'Перед Вами три колонки. Первая колонка содержит поля, отображаемые в списке по умолчанию, вторая колонка содержит дополнительные поля, которые пользователь может выбрать для создания собственного макета формы, третья колонка содержит поля, которые пока не используются, они доступны только администратору, их он может добавлять в первую и вторую колонки по своему усмотрению.',
  'LBL_LISTVIEW_EDIT' => 'Редактор Формы списка',
  'ERROR_ALREADY_EXISTS' => 'Ошибка: Поле уже существует',
  'ERROR_INVALID_KEY_VALUE' => 'Ошибка: Неверное значение ключа: [&#39;]',
  'LBL_SW_SUGARPORTAL' => 'Портал SugarCRM',
  'LBL_SMP_WELCOME' => 'Пожалуйста, выберите из списка модуль, который вы хотите отредактировать',
  'LBL_SP_WELCOME' => 'Добро пожаловать в студию портала SugarCRM. Здесь вы можете как отредактировать модули , так и синхронизировать соответствующий портал. Пожалуйста, выберите необходимый пункт из списка.',
  'LBL_SP_SYNC' => 'Синхронизация портала',
  'LBL_SYNCP_WELCOME' => 'Пожалуйста, укажите адрес портала, который вы хотите обновить и нажмите кнопку "Далее".<br />Вам будет предложено ввести имя пользователя и пароль. <br />Пожалуйста, введите необходимые данные и нажмите кнопку "Начать синхронизацию".',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Перед вами две колонки: в первой расположены поля, отображаемые по умолчанию, во второй - поля, доступные для отображения. Вы можете перемещать поля между колонками. Вы также можете изменять порядок расположения полей внутри каждой колонки путем их перемещения.',
  'LBL_SP_STYLESHEET' => 'Загрузить таблицу стилей',
  'LBL_SP_UPLOADSTYLE' => 'Нажмите на кнопку "Обзор" и выберите необходимый файл таблицы стилей для загрузки.<br />В следующий раз при синхронизации портала будет использована указанная таблица стилей.',
  'LBL_SP_UPLOADED' => 'Загружено',
  'ERROR_SP_UPLOADED' => 'Пожалуйста, убедитесь, что вы загружаете css-файл.',
  'LBL_SP_PREVIEW' => 'Предварительный просмотр результата  форматирования с применением указанной таблицы стилей.',
);


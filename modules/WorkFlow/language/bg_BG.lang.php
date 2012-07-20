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
  'LBL_UP' => 'Горе',
  'LBL_DOWN' => 'Долу',
  'LBL_EDITLAYOUT' => 'Редактиране на подредби',
  'LBL__S' => '&#39;s',
  'LBL_MODULE_NAME' => 'Автоматизирани процеси',
  'LBL_MODULE_ID' => 'Дефинирани процеси',
  'LBL_MODULE_TITLE' => 'Дефинирани процеси:',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене',
  'LBL_LIST_FORM_TITLE' => 'Списък с процеси:',
  'LBL_NEW_FORM_TITLE' => 'Дефиниране на процес',
  'LBL_LIST_NAME' => 'Име',
  'LBL_LIST_TYPE' => 'Стартиране на процеса:',
  'LBL_LIST_BASE_MODULE' => 'Основен модул:',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_NAME' => 'Име:',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_TYPE' => 'Стартиране на процеса:',
  'LBL_STATUS' => 'Статус:',
  'LBL_BASE_MODULE' => 'Основен модул:',
  'LBL_LIST_ORDER' => 'Поредност:',
  'LBL_FROM_NAME' => 'Подател:',
  'LBL_FROM_ADDRESS' => 'Адрес на подателя:',
  'LNK_NEW_WORKFLOW' => 'Дефиниране на процес',
  'LNK_WORKFLOW' => 'Списък с процеси',
  'LBL_ALERT_TEMPLATES' => 'Шаблони на известявания',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Създаване на шаблон на известявания:',
  'LBL_SUBJECT' => 'Относно:',
  'LBL_RECORD_TYPE' => 'Валиден за:',
  'LBL_RELATED_MODULE' => 'Свързан модул:',
  'LBL_PROCESS_LIST' => 'Управление на дефинирани процеси',
  'LNK_ALERT_TEMPLATES' => 'Шаблони на известявания',
  'LNK_PROCESS_VIEW' => 'Управление на дефинирани процеси',
  'LBL_PROCESS_SELECT' => 'Моля, изберете модул:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Бележка: Необходимо е да създадете тригер за финкционирането на този обект',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Бележка: За изпращане на уведомления е необходимо да активирате "Изпращане на уведомления" в раздел Настройки на електронна поща от панел Администриране.',
  'LBL_FIRE_ORDER' => 'Последователност на изпълнението:',
  'LBL_RECIPIENTS' => 'Получатели',
  'LBL_INVITEES' => 'Поканени потребители',
  'LBL_INVITEE_NOTICE' => 'Внимание, необходимо е да изберете най-малко един поканен потребител за да създадете този запис.',
  'NTC_REMOVE_ALERT' => 'Сигурни ли сте, че искате да изтриете този процес?',
  'LBL_EDIT_ALT_TEXT' => 'Допълнителен текст',
  'LBL_INSERT' => 'Вмъкни',
  'LBL_SELECT_OPTION' => 'Моля, изберете опция.',
  'LBL_SELECT_VALUE' => 'Необходимо е да изберете стойност.',
  'LBL_SELECT_MODULE' => 'Моля, изберете свързан модул.',
  'LBL_SELECT_FILTER' => 'Трябва да изберете поле, с което да филтрирате свързания модул.',
  'LBL_LIST_UP' => 'нагоре',
  'LBL_LIST_DN' => 'надолу',
  'LBL_SET' => 'Записване на',
  'LBL_AS' => 'като',
  'LBL_SHOW' => 'Покажи',
  'LBL_HIDE' => 'Скрий',
  'LBL_SPECIFIC_FIELD' => 'определено поле',
  'LBL_ANY_FIELD' => 'всяко поле',
  'LBL_LINK_RECORD' => 'Препратка към записа',
  'LBL_INVITE_LINK' => 'Препратка към покана за среща/обаждане',
  'LBL_PLEASE_SELECT' => 'Моля, изберете',
  'LBL_BODY' => 'Съдържание:',
  'LBL_ALERT_SUBJECT' => 'Известяване',
  'LBL_ACTION_ERROR' => 'Това действие не може да бъде изпълнено. Редактирайте действието, така че всички полета и стойности на полетата да са валидни.',
  'LBL_ACTION_ERRORS' => 'Забележка: Едно или повече от действията, по-долу съдържат грешки.',
  'LBL_ALERT_ERROR' => 'Това предупреждение не може да бъде изпълнена. Редактирайте грешката, така че всички настройки да са валидни.',
  'LBL_ALERT_ERRORS' => 'Забележка: Един или повече сигнала по-долу съдържат грешки.',
  'LBL_TRIGGER_ERROR' => 'Забележка: Този тригер съдържа невалидни стойности.',
  'LBL_TRIGGER_ERRORS' => 'Забележка: Един или повече от тригерите по-долу съдържа грешки.',
);


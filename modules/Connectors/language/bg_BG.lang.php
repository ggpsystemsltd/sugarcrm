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
  'LBL_INFO_INLINE' => 'Информация',
  'LBL_CLOSE' => 'Затвори',
  'LBL_COMPANY_ID' => 'Company Id',
  'LBL_DUNS' => 'DUNS',
  'LBL_FINSALES' => 'Finsales',
  'LBL_MARKET_CAP' => 'Market Cap',
  'LBL_PARENT_DUNS' => 'Parent DUNS',
  'LBL_RESULT_LIST' => 'Data List',
  'LBL_SHOW_IN_LISTVIEW' => 'Show In Merge Listview',
  'LBL_SMART_COPY' => 'Smart Copy',
  'LBL_STEP1' => 'Search and View Data',
  'LBL_TITLE' => 'Data Merge',
  'LBL_ULTIMATE_PARENT_DUNS' => 'Ultimate Parent DUNS',
  'LBL_ADD_MODULE' => 'Добави',
  'LBL_ADDRCITY' => 'Град',
  'LBL_ADDRCOUNTRY' => 'Държава',
  'LBL_ADDRCOUNTRY_ID' => 'Държава',
  'LBL_ADDRSTATEPROV' => 'Област',
  'LBL_ADMINISTRATION' => 'Администриране',
  'LBL_ADMINISTRATION_MAIN' => 'Социални мрежи',
  'LBL_AVAILABLE' => 'Забранени полета',
  'LBL_BACK' => '< Върни',
  'LBL_CONFIRM_CONTINUE_SAVE' => 'Някои от задължителните полета останаха непопълнени. Продължи?',
  'LBL_CONNECTOR' => 'Връзка',
  'LBL_CONNECTOR_FIELDS' => 'Полета на връзката',
  'LBL_DATA' => 'Дата',
  'LBL_DEFAULT' => 'Разрешени полета',
  'LBL_DELETE_MAPPING_ENTRY' => 'Сигурни ли сте, че искате да изтриете този запис?',
  'LBL_DISABLED' => 'Забранени модули',
  'LBL_EMPTY_BEANS' => 'Не са намерени резултати отговарящи на зададените критерии.',
  'LBL_ENABLED' => 'Разрешени модули',
  'LBL_EXTERNAL' => 'Потребители могат да създават външни организации през тази връзка. За да може връзката да бъде използвана е необходимо тя да бъде конфигурирана през секция Параметри на връзките.',
  'LBL_EXTERNAL_SET_PROPERTIES' => 'За да използвате тази връзка e необходимо тя да бъде конфигурирана през съответната страница в секция Параметри на връзките',
  'LBL_MERGE' => 'Сливане',
  'LBL_MODIFY_DISPLAY_TITLE' => 'Разрешваване на връзки',
  'LBL_MODIFY_DISPLAY_DESC' => 'Дефиниране на SugarCRM модулите, които могат да използват различните връзки със социални мрежи.',
  'LBL_MODIFY_DISPLAY_PAGE_TITLE' => 'Настройка на връзки: Разрешаване на връзки',
  'LBL_MODULE_FIELDS' => 'Полета на модула',
  'LBL_MODIFY_MAPPING_TITLE' => 'Синхронизация на данни през връзките',
  'LBL_MODIFY_MAPPING_DESC' => 'Създаване на релации между полетата на връзките и полетата в SugarCRM модулите, по които се извършва прехвърлянето на информация.',
  'LBL_MODIFY_MAPPING_PAGE_TITLE' => 'Настройка на връзки: Синхронизация на данни през връзките',
  'LBL_MODIFY_PROPERTIES_TITLE' => 'Параметри на връзките',
  'LBL_MODIFY_PROPERTIES_DESC' => 'Настройка на връзките със социални мрежи, включително линкове и ключове за достъп.',
  'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => 'Настройка на връзки: Параметри на връзките',
  'LBL_MODIFY_SEARCH_TITLE' => 'Търсене през връзки',
  'LBL_MODIFY_SEARCH' => 'Търси',
  'LBL_MODIFY_SEARCH_DESC' => 'Определяне на полетата в SugarCRM модулите, по които се извършва търсене в социалните мрежи.',
  'LBL_MODIFY_SEARCH_PAGE_TITLE' => 'Настройка на връзки: Търсене през връзки',
  'LBL_MODULE_NAME' => 'Социални мрежи',
  'LBL_NO_PROPERTIES' => 'Няма параметри, които да бъдат конфигурирани за тази връзка.',
  'LBL_PREVIOUS' => '< Върни',
  'LBL_QUOTE' => 'Оферта',
  'LBL_RECNAME' => 'Организация',
  'LBL_RESET_TO_DEFAULT' => 'Връщане към стандартни настройки',
  'LBL_RESET_TO_DEFAULT_CONFIRM' => 'Сигурни ли сте, че искате да се върнете към стандартни настройки?',
  'LBL_RESET_BUTTON_TITLE' => 'Редактиране [Alt+R]',
  'LBL_RUN_WIZARD' => 'С електронен помощник',
  'LBL_SAVE' => 'Съхрани',
  'LBL_SEARCHING_BUTTON_LABEL' => 'Търсене...',
  'LBL_SUMMARY' => 'Резюме',
  'LBL_STEP2' => 'Слей записите с',
  'LBL_TEST_SOURCE' => 'Тествай връзката',
  'LBL_TEST_SOURCE_FAILED' => 'Тестът е неуспешен',
  'LBL_TEST_SOURCE_RUNNING' => 'Тестване...',
  'LBL_TEST_SOURCE_SUCCESS' => 'Тестът е успешен',
  'ERROR_RECORD_NOT_SELECTED' => 'Грешка: Моля, изберете запис от списъка, преди да продължите.',
  'ERROR_EMPTY_WRAPPER' => 'Грешка: Unable to retrieve wrapper instance for the source [{$source_id}]',
  'ERROR_EMPTY_SOURCE_ID' => 'Грешка: Недефиниран или празен Id на източника.',
  'ERROR_EMPTY_RECORD_ID' => 'Грешка: Недефиниран или празен Id на записа.',
  'ERROR_NO_ADDITIONAL_DETAIL' => 'Грешка: Не беше намерена допълнителна информация за записа.',
  'ERROR_NO_SEARCHDEFS_DEFINED' => 'Няма разрешени модули за тази връзка. Кои модули използват дадена връзка се дефинира в секция Разрешаване на връзки.',
  'ERROR_NO_SEARCHDEFS_MAPPED' => 'Грешка: Няма разрешени връзки с дефинирани полета за търсене.',
  'ERROR_NO_SOURCEDEFS_FILE' => 'Грешка: Файлът sourcedefs.php не бе намерен.',
  'ERROR_NO_SOURCEDEFS_SPECIFIED' => 'Грешка: Не е посочен източник, от който да бъдат извличани данни.',
  'ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE' => 'Грешка: Няма връзки, които да синхронизират данни с този модул.',
  'ERROR_NO_SEARCHDEFS_MAPPING' => 'Грешка: Няма зададени полета за търсене за този модул и connector.  Моля, свържете се със системния администратор.',
  'ERROR_NO_FIELDS_MAPPED' => 'Грешка: За всеки избран модул трябва да се извършва синхронизация между поне едно поле на връзката и поле на съответния модул.',
  'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => 'Грешка: Няма зададени полета за визуализиране в резултатите.  Моля, свържете се със системния администратор.',
);


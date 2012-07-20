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
  'LBL_OPPORTUNITY_TYPE' => 'Тип сделки',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Ответственный пользователь',
  'LBL_MODULE_NAME' => 'Сделки',
  'LBL_MODULE_TITLE' => 'Сделки: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Поиск сделки',
  'LBL_VIEW_FORM_TITLE' => 'Обзор сделки',
  'LBL_LIST_FORM_TITLE' => 'Список сделок',
  'LBL_OPPORTUNITY_NAME' => 'Сделка:',
  'LBL_OPPORTUNITY' => 'Сделка:',
  'LBL_NAME' => 'Сделка:',
  'LBL_INVITEE' => 'Контакты',
  'LBL_CURRENCIES' => 'Валюта',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Название',
  'LBL_LIST_ACCOUNT_NAME' => 'Контрагент',
  'LBL_LIST_AMOUNT' => 'Сумма по сделке:',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Сумма',
  'LBL_LIST_DATE_CLOSED' => 'Дата закрытия',
  'LBL_LIST_SALES_STAGE' => 'Стадия продажи',
  'LBL_ACCOUNT_ID' => 'Контрагент',
  'LBL_CURRENCY_ID' => 'Валюта',
  'LBL_CURRENCY_NAME' => 'Валюта',
  'LBL_CURRENCY_SYMBOL' => 'Символ валюты',
  'LBL_TEAM_ID' => 'Команда',
  'UPDATE' => 'Сделка - обновление валюты',
  'UPDATE_DOLLARAMOUNTS' => 'Обновить суммы в долларах США',
  'UPDATE_VERIFY' => 'Проверить суммы',
  'UPDATE_VERIFY_TXT' => 'Проверьте, что суммы в сделках имеют правильные значения, используются только цифры (0-9) и знак разряда (.)',
  'UPDATE_FIX' => 'Исправление сумм',
  'UPDATE_FIX_TXT' => 'Попытки исправить неверные суммы, посредством создания правильного разделителя из текущей суммы. Любое изменение суммы будет сохранено в виде резервной копии в поле БД amount_backup. Если Вы получили уведомление об ошибке, не повторяйте этот шаг без восстановления данных из резервной копии, в противном случае в архив будут перезаписаны новые неверные данные.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Обновление сумм в долларах США для сделок, основанное на текущих установках курса обмена валют. Эта величина используется для расчета графиков и списков просмотра валютных сумм.',
  'UPDATE_CREATE_CURRENCY' => 'Создание новой валюты:',
  'UPDATE_VERIFY_FAIL' => 'Неудачная проверка записи:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Текущая сумма:',
  'UPDATE_VERIFY_FIX' => 'Запуск проверки данных',
  'UPDATE_INCLUDE_CLOSE' => 'Включить закрытые записи',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Новая сумма:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Новая валюта:',
  'UPDATE_DONE' => 'Готово',
  'UPDATE_BUG_COUNT' => 'Количество найденных ошибок и попыток их решения:',
  'UPDATE_BUGFOUND_COUNT' => 'Найдены ошибки:',
  'UPDATE_COUNT' => 'Обновлённые записи:',
  'UPDATE_RESTORE_COUNT' => 'Суммы в записях восстановлены:',
  'UPDATE_RESTORE' => 'Восстановление сумм',
  'UPDATE_RESTORE_TXT' => 'Восстановление сумм из резервной копии, созданной во время исправления ошибок.',
  'UPDATE_FAIL' => 'Не обновлено -',
  'UPDATE_NULL_VALUE' => 'Сумма NULL установлена на 0 -',
  'UPDATE_MERGE' => 'Объединить валюты',
  'UPDATE_MERGE_TXT' => 'Объединение многих валют в одну. Если имеется много записей валют для одной и той же валюты, то объедините их вместе. Это также объединит данные валюты  для всех остальных модулей.',
  'LBL_ACCOUNT_NAME' => 'Контрагент:',
  'LBL_AMOUNT' => 'Сумма сделки:',
  'LBL_AMOUNT_USDOLLAR' => 'Сумма:',
  'LBL_CURRENCY' => 'Валюта:',
  'LBL_DATE_CLOSED' => 'Предполагаемая дата закрытия:',
  'LBL_TYPE' => 'Тип:',
  'LBL_CAMPAIGN' => 'Маркетинговая кампания:',
  'LBL_NEXT_STEP' => 'Следующий шаг:',
  'LBL_LEAD_SOURCE' => 'Источник предварительного контакта:',
  'LBL_SALES_STAGE' => 'Стадия продажи:',
  'LBL_PROBABILITY' => 'Вероятность (%):',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_DUPLICATE' => 'Возможно дублирующая сделка',
  'MSG_DUPLICATE' => 'Запись, которую Вы создаете, возможно, дублирует уже имеющуюся запись. Похожие сделки показаны ниже. Нажмите кнопку "Сохранить"  для продолжения создания новой сделки или кнопку "Отмена" для возврата в модуль без создания сделки.',
  'LBL_NEW_FORM_TITLE' => 'Новая сделка',
  'LNK_NEW_OPPORTUNITY' => 'Новая сделка',
  'LNK_OPPORTUNITY_REPORTS' => 'Просмотр отчета по сделкам',
  'LNK_OPPORTUNITY_LIST' => 'Просмотр сделок',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением сделки.',
  'LBL_TOP_OPPORTUNITIES' => 'Мои основные открытые сделки',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Вы действительно хотите удалить этот контакт из сделки?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Вы действительно хотите удалить данную сделку из проекта',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Сделки',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Мероприятия',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'LBL_RAW_AMOUNT' => 'Сырой объем',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Предварительные контакты',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакты',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Коммерческие предложения',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Документы',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Проекты',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая):',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Ответственный (-ая)',
  'LBL_CONTRACTS' => 'Контракты',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Контракты',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Мои закрытые сделки',
  'LBL_TOTAL_OPPORTUNITIES' => 'Все сделки',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Успешно закрытые сделки',
  'LBL_ASSIGNED_TO_ID' => 'Ответственный (-ая):',
  'LBL_CREATED_ID' => 'Создано пользователем',
  'LBL_MODIFIED_ID' => 'Изменено пользователем',
  'LBL_MODIFIED_NAME' => 'Изменено',
  'LBL_CREATED_USER' => 'Создано пользователем',
  'LBL_MODIFIED_USER' => 'Изменено пользователем',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Маркетинговые кампании',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Проекты',
  'LABEL_PANEL_ASSIGNMENT' => 'Назначение ответственного',
  'LNK_IMPORT_OPPORTUNITIES' => 'Импорт сделок',
  'LBL_EXPORT_CAMPAIGN_ID' => 'Маркетинговая кампания (ID)',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Ответственный (ID)',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Изменено (ID)',
  'LBL_EXPORT_CREATED_BY' => 'Создано (ID)',
  'LBL_EXPORT_NAME' => 'Имя',
);


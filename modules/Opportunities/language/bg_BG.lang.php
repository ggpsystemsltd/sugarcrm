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
  'LBL_EDITLAYOUT' => 'Редактиране на подредби',
  'LBL_VIEW_FORM_TITLE' => 'Opportunity View',
  'LBL_OPPORTUNITY_TYPE' => 'Opportunity Type',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Модифицирано от',
  'LBL_EXPORT_CREATED_BY' => 'Създадено от',
  'LBL_MODULE_NAME' => 'Възможности',
  'LBL_MODULE_TITLE' => 'Възможности',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене на възможности',
  'LBL_LIST_FORM_TITLE' => 'Списък с възможности:',
  'LBL_OPPORTUNITY_NAME' => 'Възможност:',
  'LBL_OPPORTUNITY' => 'Свързан с възможност:',
  'LBL_NAME' => 'Сделка',
  'LBL_INVITEE' => 'Контакти',
  'LBL_CURRENCIES' => 'Валути',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Име',
  'LBL_LIST_ACCOUNT_NAME' => 'Oрганизация',
  'LBL_LIST_AMOUNT' => 'Сума',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Сума',
  'LBL_LIST_DATE_CLOSED' => 'Затвори',
  'LBL_LIST_SALES_STAGE' => 'Етап на преговори',
  'LBL_ACCOUNT_ID' => 'Организация',
  'LBL_CURRENCY_ID' => 'Валута',
  'LBL_CURRENCY_NAME' => 'Име на валутата',
  'LBL_CURRENCY_SYMBOL' => 'Валутен символ',
  'LBL_TEAM_ID' => 'Екип',
  'UPDATE' => 'Възможности - Актуализация на валути',
  'UPDATE_DOLLARAMOUNTS' => 'Обновяване на сумата в щатски долари',
  'UPDATE_VERIFY' => 'Проверка на сумата',
  'UPDATE_VERIFY_TXT' => 'Проверка, че сумите в отделните възможности са валидни десетични числа, които съдържат само цифри (0-9) и разделители (.)',
  'UPDATE_FIX' => 'Фиксиране на суми',
  'UPDATE_FIX_TXT' => 'Извършване фиксиране на грешни суми, посредством създаване на правилни знакови разделения от текущата сума. Променената сума се съхранява в поле amount_backup на базата данни. Ако по време на изпълнението получите съобщение за грешка, не се връщайте без да сте възстановили от архива; в противен случай архивът може да бъде презаписан с неверни данни.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Актуализира сумите в полето U.S. Dollar на база на текущите разменни курсове на валутите. Стойността на това поле се използва при калкулации в графиката List View Currency Amounts.',
  'UPDATE_CREATE_CURRENCY' => 'Въвеждане на нова валута:',
  'UPDATE_VERIFY_FAIL' => 'Неуспешна проверка на запис:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Текуща сума:',
  'UPDATE_VERIFY_FIX' => 'Фиксиране на данни',
  'UPDATE_INCLUDE_CLOSE' => 'Включване на записите със статус "Приключени"',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Нова сума:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Нова валута:',
  'UPDATE_DONE' => 'Добави',
  'UPDATE_BUG_COUNT' => 'Намерени проблеми и опити за разрешаването им:',
  'UPDATE_BUGFOUND_COUNT' => 'Намерени проблеми:',
  'UPDATE_COUNT' => 'Актуализирани записи:',
  'UPDATE_RESTORE_COUNT' => 'Сумата в записите е възстановена:',
  'UPDATE_RESTORE' => 'Възстановяване на суми',
  'UPDATE_RESTORE_TXT' => 'Възстановяване на сумите от архива, създаден по време на фиксирането.',
  'UPDATE_FAIL' => 'Не може да се актуализира -',
  'UPDATE_NULL_VALUE' => 'Сумата NULL установена на 0 -',
  'UPDATE_MERGE' => 'Сливане на валути',
  'UPDATE_MERGE_TXT' => 'Сливане на няколко валути в една. Ако сте открили, че има много записи за една и съща валута, можете да ги слеете. Така се сливат и данните за валути от другите модули.',
  'LBL_ACCOUNT_NAME' => 'Организация:',
  'LBL_AMOUNT' => 'Сума:',
  'LBL_AMOUNT_USDOLLAR' => 'Сума:',
  'LBL_CURRENCY' => 'Валута:',
  'LBL_DATE_CLOSED' => 'Дата на финализиране:',
  'LBL_TYPE' => 'Категория:',
  'LBL_CAMPAIGN' => 'Кампания:',
  'LBL_NEXT_STEP' => 'Следваща стъпка:',
  'LBL_LEAD_SOURCE' => 'Източник:',
  'LBL_SALES_STAGE' => 'Етап на преговори:',
  'LBL_PROBABILITY' => 'Вероятност (%):',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_DUPLICATE' => 'Възможно е дублиране',
  'MSG_DUPLICATE' => 'Създаденият запис има вероятност да дублира вече съществуваща възможност. Възможностите с близки имена са изброени отдолу.<br>Натиснете бутоина Съхрани ако желаете да създадете новия запис или бутона Отмени, за да се върнете в модула без да създавате нова възможност.',
  'LBL_NEW_FORM_TITLE' => 'Създаване на възможност',
  'LNK_NEW_OPPORTUNITY' => 'Създаване на възможност',
  'LNK_OPPORTUNITY_REPORTS' => 'Справки за възможности',
  'LNK_OPPORTUNITY_LIST' => 'Списък с възможности',
  'ERR_DELETE_RECORD' => 'Необходимо е да маркирате поне 1 запис, за да продължите.',
  'LBL_TOP_OPPORTUNITIES' => 'Моите възможности',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Сигурни ли сте, че искате да изтриете тази връзка?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Сигурни ли сте, че искате да изтриете тази връзка?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Възможности',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Дейности',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'LBL_RAW_AMOUNT' => 'Приблизителна сума',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Потенциални клиенти',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакти',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Оферти',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Документи',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Проекти',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Отговорник',
  'LBL_CONTRACTS' => 'Договори',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Договори',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Моите реализирани възможности',
  'LBL_TOTAL_OPPORTUNITIES' => 'Възможности',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Моите реализирани възможности',
  'LBL_ASSIGNED_TO_ID' => 'Отговорник:',
  'LBL_CREATED_ID' => 'Създадена от',
  'LBL_MODIFIED_ID' => 'Модифициран от',
  'LBL_MODIFIED_NAME' => 'Модифицирана от',
  'LBL_CREATED_USER' => 'Създаден потребител',
  'LBL_MODIFIED_USER' => 'Модифициран потребител',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Кампании',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Проекти',
  'LABEL_PANEL_ASSIGNMENT' => 'Отговорник',
  'LNK_IMPORT_OPPORTUNITIES' => 'Импортиране на възможности',
  'LBL_EXPORT_CAMPAIGN_ID' => 'Кампания',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Отговорник',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Отговорник',
  'LBL_EXPORT_NAME' => 'Име',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Related Contacts&#39; Emails',
);


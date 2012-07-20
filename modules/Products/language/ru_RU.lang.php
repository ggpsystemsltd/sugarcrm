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
  'LBL_EXPORT_CURRENCY_ID' => 'ID валюты',
  'LBL_MODULE_NAME' => 'Продукты',
  'LBL_MODULE_TITLE' => 'Продукты: Главная',
  'LBL_SEARCH_FORM_TITLE' => 'Найти продукт',
  'LBL_LIST_FORM_TITLE' => 'Список продуктов',
  'LBL_NEW_FORM_TITLE' => 'Новый продукт',
  'LBL_PRODUCT' => 'Продукт:',
  'LBL_RELATED_PRODUCTS' => 'Связанные продукты',
  'LBL_LIST_NAME' => 'Продукт',
  'LBL_LIST_MANUFACTURER' => 'Производитель',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Код производителя',
  'LBL_LIST_QUANTITY' => 'Количество',
  'LBL_LIST_COST_PRICE' => 'Стоимость',
  'LBL_LIST_DISCOUNT_PRICE' => 'Цена за единицу',
  'LBL_LIST_LIST_PRICE' => 'Список',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_ACCOUNT_NAME' => 'Контрагент',
  'LBL_LIST_CONTACT_NAME' => 'Контактное лицо',
  'LBL_LIST_QUOTE_NAME' => 'Коммерческое предложение',
  'LBL_LIST_DATE_PURCHASED' => 'Приобретено',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Срок предоставления поддержки',
  'LBL_NAME' => 'Продукт:',
  'LBL_URL' => 'URL продукта:',
  'LBL_QUOTE_NAME' => 'Коммерческое предложение:',
  'LBL_CONTACT_NAME' => 'Контактное лицо:',
  'LBL_DATE_PURCHASED' => 'Приобретено:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Срок предоставления поддержки:',
  'LBL_DATE_SUPPORT_STARTS' => 'Начало предоставления поддержки:',
  'LBL_COST_PRICE' => 'Стоимость:',
  'LBL_DISCOUNT_PRICE' => 'Цена за единицу:',
  'LBL_DEAL_TOT' => 'Скидка:',
  'LBL_DISCOUNT_RATE' => 'Коэффициент скидки',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Коэффициент скидки (в долларах США)',
  'LBL_DISCOUNT_TOTAL' => 'Скидка итого',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Скидка (в долларах США)',
  'LBL_SELECT_DISCOUNT' => '% скидки',
  'LBL_LIST_PRICE' => 'Цена по прайсу:',
  'LBL_VENDOR_PART_NUM' => 'Код поставщика:',
  'LBL_MFT_PART_NUM' => 'Код производителя:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Дата цены со скидкой:',
  'LBL_WEIGHT' => 'Вес:',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_TYPE' => 'Тип:',
  'LBL_CATEGORY' => 'Категория',
  'LBL_QUANTITY' => 'Количество:',
  'LBL_STATUS' => 'Статус:',
  'LBL_TAX_CLASS' => 'Облагается налогом:',
  'LBL_MANUFACTURER' => 'Производитель:',
  'LBL_SUPPORT_DESCRIPTION' => 'Описание предоставляемой поддержки:',
  'LBL_SUPPORT_TERM' => 'Срок предоставления поддержки:',
  'LBL_SUPPORT_NAME' => 'Компания, оказывающая поддержку:',
  'LBL_SUPPORT_CONTACT' => 'Сотрудник поддержки:',
  'LBL_PRICING_FORMULA' => 'Ценовая формула:',
  'LBL_ACCOUNT_NAME' => 'Контрагент:',
  'LNK_PRODUCT_LIST' => 'Каталог продуктов',
  'LNK_NEW_PRODUCT' => 'Новый продукт',
  'NTC_DELETE_CONFIRMATION' => 'Вы действительно хотите удалить эту запись?',
  'NTC_REMOVE_CONFIRMATION' => 'Вы действительно хотите удалить эту связь продукта?',
  'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением продукта.',
  'LBL_CURRENCY' => 'Валюта:',
  'LBL_ASSET_NUMBER' => 'Номер актива:',
  'LBL_SERIAL_NUMBER' => 'Серийный номер:',
  'LBL_BOOK_VALUE' => 'Балансовая стоимость:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Балансовая стоимость (доллары США):',
  'LBL_BOOK_VALUE_DATE' => 'Дата оценки балансовой стоимости:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Продукты',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Связанные продукты',
  'LBL_WEBSITE' => 'Сайт',
  'LBL_COST_USDOLLAR' => 'Стоимость (в долларах США)',
  'LBL_DISCOUNT_USDOLLAR' => 'Цена за единицу (в долларах США)',
  'LBL_LIST_USDOLLAR' => 'Цена по прайсу (доллары США)',
  'LBL_PRICING_FACTOR' => 'Ценообразующий фактор',
  'LBL_ACCOUNT_ID' => 'Контрагент',
  'LBL_CONTACT_ID' => 'Контакт',
  'LBL_CATEGORY_NAME' => 'Категория:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Заметки',
  'LBL_MEMBER_OF' => 'Состоит в:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Проекты',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Документы',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Контракты',
  'LBL_CONTRACTS' => 'Контракты',
  'LBL_PRODUCT_CATEGORIES' => 'Категории продуктов',
  'LBL_PRODUCT_TYPES' => 'Виды продуктов',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая):',
  'LBL_PRODUCT_TEMPLATE_ID' => 'Шаблон продукта:',
  'LBL_QUOTE_ID' => 'Коммерческое предложение:',
  'LBL_CREATED_USER' => 'Создано пользователем',
  'LBL_MODIFIED_USER' => 'Изменено пользователем',
  'LBL_QUOTE' => 'Коммерческое предложение',
  'LBL_CONTACT' => 'Контакт',
  'LBL_DISCOUNT_AMOUNT' => 'Объем скидки',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Символ валюты:',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Продукты',
  'LNK_IMPORT_PRODUCTS' => 'Импорт продуктов',
);


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
  'LBL_DISCOUNT_RATE' => 'Discount Rate',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Discount Rate (US Dollar)',
  'LBL_DISCOUNT_TOTAL' => 'Discount Total',
  'LBL_DISCOUNT_PRICE_DATE' => 'Discount Price Date:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Book Value (US Dollar):',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Currency Symbol Name',
  'LBL_MODULE_NAME' => 'Продукти',
  'LBL_MODULE_TITLE' => 'Продукти',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Продукти"',
  'LBL_LIST_FORM_TITLE' => 'Списък с продукти:',
  'LBL_NEW_FORM_TITLE' => 'Въвеждане на продукт',
  'LBL_PRODUCT' => 'Продукт:',
  'LBL_RELATED_PRODUCTS' => 'Свързани продукти',
  'LBL_LIST_NAME' => 'Продукт',
  'LBL_LIST_MANUFACTURER' => 'Производител',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Партиден No.',
  'LBL_LIST_QUANTITY' => 'Количество',
  'LBL_LIST_COST_PRICE' => 'Себестойност',
  'LBL_LIST_DISCOUNT_PRICE' => 'Цена',
  'LBL_LIST_LIST_PRICE' => 'Списък',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LIST_ACCOUNT_NAME' => 'Oрганизация',
  'LBL_LIST_CONTACT_NAME' => 'Контакт',
  'LBL_LIST_QUOTE_NAME' => 'Заглавие на офертата',
  'LBL_LIST_DATE_PURCHASED' => 'Закупен на',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Поддръжка до',
  'LBL_NAME' => 'Продукт:',
  'LBL_URL' => 'URL на продукта:',
  'LBL_QUOTE_NAME' => 'Заглавие на офертата:',
  'LBL_CONTACT_NAME' => 'Контакт:',
  'LBL_DATE_PURCHASED' => 'Закупен на:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Край на поддръжка:',
  'LBL_DATE_SUPPORT_STARTS' => 'Начало на поддръжка:',
  'LBL_COST_PRICE' => 'Себестойност:',
  'LBL_DISCOUNT_PRICE' => 'Единична цена:',
  'LBL_DEAL_TOT' => 'Отстъпка:',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Отстъпка (US долари)',
  'LBL_SELECT_DISCOUNT' => 'Отстъпка в %',
  'LBL_LIST_PRICE' => 'Каталожна цена:',
  'LBL_VENDOR_PART_NUM' => 'Партиден номер(доставчик):',
  'LBL_MFT_PART_NUM' => 'Партиден номер:(производител)',
  'LBL_WEIGHT' => 'Тегло:',
  'LBL_DESCRIPTION' => 'Описание:',
  'LBL_TYPE' => 'Категория:',
  'LBL_CATEGORY' => 'Категория:',
  'LBL_QUANTITY' => 'Количество:',
  'LBL_STATUS' => 'Статус:',
  'LBL_TAX_CLASS' => 'Форма на данъчно облагане:',
  'LBL_MANUFACTURER' => 'Производител:',
  'LBL_SUPPORT_DESCRIPTION' => 'Информация за поддръжката:',
  'LBL_SUPPORT_TERM' => 'Период на поддръжка:',
  'LBL_SUPPORT_NAME' => 'Екип по поддръжка:',
  'LBL_SUPPORT_CONTACT' => 'Отговорник по поддръжка:',
  'LBL_PRICING_FORMULA' => 'Формула за ценообразуване:',
  'LBL_ACCOUNT_NAME' => 'Организация:',
  'LNK_PRODUCT_LIST' => 'Списък с продукти',
  'LNK_NEW_PRODUCT' => 'Въвеждане на продукт',
  'NTC_DELETE_CONFIRMATION' => 'Сигурни ли сте, че желаете да изтриете този запис?',
  'NTC_REMOVE_CONFIRMATION' => 'Сигурни ли сте, че искате да изтриете тази връзка?',
  'ERR_DELETE_RECORD' => 'Трябва да определите номер на записа, за да изтриете този продукт.',
  'LBL_CURRENCY' => 'Валута:',
  'LBL_ASSET_NUMBER' => 'Инвентарен номер:',
  'LBL_SERIAL_NUMBER' => 'Сериен номер:',
  'LBL_BOOK_VALUE' => 'Продажна цена:',
  'LBL_BOOK_VALUE_DATE' => 'Дата на продажба:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Продукти',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Свързани продукти',
  'LBL_WEBSITE' => 'Сайт',
  'LBL_COST_USDOLLAR' => 'Себестойност (US Dollar)',
  'LBL_DISCOUNT_USDOLLAR' => 'Отстъпка (US Dollar)',
  'LBL_LIST_USDOLLAR' => 'Каталожна цена (US Dollar)',
  'LBL_PRICING_FACTOR' => 'Ценообразуващ фактор',
  'LBL_ACCOUNT_ID' => 'Организация',
  'LBL_CONTACT_ID' => 'Контакт',
  'LBL_CATEGORY_NAME' => 'Име на категорията:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Бележки',
  'LBL_MEMBER_OF' => 'Член на:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Проекти',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Документи',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Договори',
  'LBL_CONTRACTS' => 'Договори',
  'LBL_PRODUCT_CATEGORIES' => 'Продуктови категории',
  'LBL_PRODUCT_TYPES' => 'Типове продукти',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'Шаблон на продукт:',
  'LBL_QUOTE_ID' => 'Оферта',
  'LBL_CREATED_USER' => 'Създаден потребител',
  'LBL_MODIFIED_USER' => 'Модифициран потребител',
  'LBL_QUOTE' => 'Оферта',
  'LBL_CONTACT' => 'Контакт',
  'LBL_DISCOUNT_AMOUNT' => 'Сума отстъпка',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Продукти',
  'LNK_IMPORT_PRODUCTS' => 'Импортиране на продукти',
  'LBL_EXPORT_CURRENCY_ID' => 'Валута',
);


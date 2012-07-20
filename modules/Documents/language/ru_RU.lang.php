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
  'LBL_FILE_UPLOAD' => 'Файл:',
  'LBL_MODULE_NAME' => 'Документы',
  'LBL_MODULE_TITLE' => 'Документы: Главная',
  'LNK_NEW_DOCUMENT' => 'Новый документ',
  'LNK_DOCUMENT_LIST' => 'Обзор документов',
  'LBL_DOC_REV_HEADER' => 'Версии документов',
  'LBL_SEARCH_FORM_TITLE' => 'Найти документ',
  'LBL_DOCUMENT_ID' => 'ID документа',
  'LBL_NAME' => 'Название документа',
  'LBL_DESCRIPTION' => 'Описание',
  'LBL_CATEGORY' => 'Категория',
  'LBL_SUBCATEGORY' => 'Подкатегория',
  'LBL_STATUS' => 'Статус',
  'LBL_CREATED_BY' => 'Создано',
  'LBL_DATE_ENTERED' => 'Дата создания',
  'LBL_DATE_MODIFIED' => 'Дата изменения',
  'LBL_DELETED' => 'Удалено',
  'LBL_MODIFIED' => 'Изменено (ID)',
  'LBL_MODIFIED_USER' => 'Автор изменений',
  'LBL_CREATED' => 'Кем создано',
  'LBL_REVISIONS' => 'Версии документов',
  'LBL_RELATED_DOCUMENT_ID' => 'ID связанного документа',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'ID версии связанного документа',
  'LBL_IS_TEMPLATE' => 'Является шаблоном',
  'LBL_TEMPLATE_TYPE' => 'Тип документа',
  'LBL_ASSIGNED_TO_NAME' => 'Ответственный (-ая):',
  'LBL_REVISION_NAME' => 'Номер версии',
  'LBL_MIME' => 'Тип MIME',
  'LBL_REVISION' => 'Версия',
  'LBL_DOCUMENT' => 'Связанные документы',
  'LBL_LATEST_REVISION' => 'Последняя версия',
  'LBL_CHANGE_LOG' => 'История изменений',
  'LBL_ACTIVE_DATE' => 'Дата публикации',
  'LBL_EXPIRATION_DATE' => 'Срок действия',
  'LBL_FILE_EXTENSION' => 'Расширение файла',
  'LBL_LAST_REV_MIME_TYPE' => 'Последняя версия типа MIME',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Неопределенный',
  'LBL_HOMEPAGE_TITLE' => 'Мои документы',
  'LBL_NEW_FORM_TITLE' => 'Новый документ',
  'LBL_DOC_NAME' => 'Название документа:',
  'LBL_FILENAME' => 'Имя файла',
  'LBL_LIST_FILENAME' => 'Файл',
  'LBL_DOC_VERSION' => 'Версия:',
  'LBL_CATEGORY_VALUE' => 'Категория:',
  'LBL_LIST_CATEGORY' => 'Категория',
  'LBL_SUBCATEGORY_VALUE' => 'Подкатегория:',
  'LBL_DOC_STATUS' => 'Статус:',
  'LBL_LAST_REV_CREATOR' => 'Версия создана:',
  'LBL_LASTEST_REVISION_NAME' => 'Номер последней версии:',
  'LBL_SELECTED_REVISION_NAME' => 'Название выбранной версии:',
  'LBL_CONTRACT_STATUS' => 'Статус контракта:',
  'LBL_CONTRACT_NAME' => 'Название контракта:',
  'LBL_LAST_REV_DATE' => 'Ревизия от:',
  'LBL_DOWNNLOAD_FILE' => 'Загрузить файл:',
  'LBL_DET_RELATED_DOCUMENT' => 'Связанный документ:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Версия связанного документа:',
  'LBL_DET_IS_TEMPLATE' => 'Шаблон? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Тип документа:',
  'LBL_TEAM' => 'Команда:',
  'LBL_DOC_DESCRIPTION' => 'Описание:',
  'LBL_DOC_ACTIVE_DATE' => 'Дата публикации:',
  'LBL_DOC_EXP_DATE' => 'Срок действия:',
  'LBL_LIST_FORM_TITLE' => 'Список документов',
  'LBL_LIST_DOCUMENT' => 'Документ',
  'LBL_LIST_SUBCATEGORY' => 'Подкатегория',
  'LBL_LIST_REVISION' => 'Версия',
  'LBL_LIST_LAST_REV_CREATOR' => 'Опубликовано',
  'LBL_LIST_LAST_REV_DATE' => 'Ревизия от',
  'LBL_LIST_VIEW_DOCUMENT' => 'Просмотр',
  'LBL_LIST_DOWNLOAD' => 'Загрузить',
  'LBL_LIST_ACTIVE_DATE' => 'Дата публикации',
  'LBL_LIST_EXP_DATE' => 'Срок действия',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_LINKED_ID' => 'Id связанного документа',
  'LBL_SELECTED_REVISION_ID' => 'ID выбранной версии',
  'LBL_LATEST_REVISION_ID' => 'ID последней версии',
  'LBL_SELECTED_REVISION_FILENAME' => 'Имя файла последней версии',
  'LBL_FILE_URL' => 'Адрес файла',
  'LBL_REVISIONS_PANEL' => 'Детали версии',
  'LBL_REVISIONS_SUBPANEL' => 'Версии',
  'LBL_SF_DOCUMENT' => 'Название документа:',
  'LBL_SF_CATEGORY' => 'Категория:',
  'LBL_SF_SUBCATEGORY' => 'Подкатегория:',
  'LBL_SF_ACTIVE_DATE' => 'Дата публикации:',
  'LBL_SF_EXP_DATE' => 'Срок действия:',
  'DEF_CREATE_LOG' => 'Документ создан',
  'ERR_DOC_NAME' => 'Название документа',
  'ERR_DOC_ACTIVE_DATE' => 'Дата публикации',
  'ERR_DOC_EXP_DATE' => 'Срок действия',
  'ERR_FILENAME' => 'Имя файла',
  'ERR_DOC_VERSION' => 'Версия документа',
  'ERR_DELETE_CONFIRM' => 'Вы хотите удалить эту версию документа?',
  'ERR_DELETE_LATEST_VERSION' => 'Вы не имеете права удалять последнюю версию документа.',
  'LNK_NEW_MAIL_MERGE' => 'Объединение почты',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Шаблон объединения почты:',
  'LBL_TREE_TITLE' => 'Документы',
  'LBL_LIST_DOCUMENT_NAME' => 'Название документа',
  'LBL_LIST_IS_TEMPLATE' => 'Шаблон?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Тип документа',
  'LBL_LIST_SELECTED_REVISION' => 'Действующая ревизия',
  'LBL_LIST_LATEST_REVISION' => 'Последняя ревизия',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Связанные контракты',
  'LBL_LAST_REV_CREATE_DATE' => 'Дата создания последней версии',
  'LBL_CONTRACTS' => 'Контракты',
  'LBL_CREATED_USER' => 'Создано Пользователем',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Возвраты',
  'LBL_DOCUMENT_INFORMATION' => 'Просмотр документа',
  'LBL_DOC_ID' => 'ID источника документа',
  'LBL_DOC_TYPE' => 'Источник',
  'LBL_LIST_DOC_TYPE' => 'Источник',
  'LBL_DOC_TYPE_POPUP' => 'Выберите источник, для загрузки документа, откуда он потом будет доступен.',
  'LBL_DOC_URL' => 'URL источника документа',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Название документа',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Ниже в убывающем порядке показаны 20 файлов, которые изменялись наиболее часто. Чтобы найти другие файлы, используйте поиск.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Имя файла',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Контрагенты',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакты',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Сделки',
  'LBL_CASES_SUBPANEL_TITLE' => 'Обращения',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Ошибки',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Коммерческие предложения',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Продукты',
);


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
  'LBL_LAST_REV_MIME_TYPE' => 'Last revision MIME type',
  'LBL_LASTEST_REVISION_NAME' => 'Lastest revision name:',
  'LBL_SELECTED_REVISION_NAME' => 'Selected revision name:',
  'LBL_CONTRACT_STATUS' => 'Contract status:',
  'LBL_LINKED_ID' => 'Linked id',
  'LBL_SELECTED_REVISION_ID' => 'Selected revision id',
  'LBL_LATEST_REVISION_ID' => 'Latest revision id',
  'LBL_SELECTED_REVISION_FILENAME' => 'Selected revision filename',
  'LBL_FILE_URL' => 'File url',
  'LBL_REVISIONS_PANEL' => 'Revision Details',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Reversions',
  'LBL_DOC_ID' => 'Document Source ID',
  'LBL_DOC_URL' => 'Document Source URL',
  'LBL_MODULE_NAME' => 'Документи',
  'LBL_MODULE_TITLE' => 'Документи',
  'LNK_NEW_DOCUMENT' => 'Създаване на документ',
  'LNK_DOCUMENT_LIST' => 'Списък с документи',
  'LBL_DOC_REV_HEADER' => 'Ревизии на документа',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Документи"',
  'LBL_DOCUMENT_ID' => 'Документ',
  'LBL_NAME' => 'Име на документа',
  'LBL_DESCRIPTION' => 'Описание',
  'LBL_CATEGORY' => 'Категория',
  'LBL_SUBCATEGORY' => 'Подкатегория',
  'LBL_STATUS' => 'Статус',
  'LBL_CREATED_BY' => 'Създадено от',
  'LBL_DATE_ENTERED' => 'Въведено на',
  'LBL_DATE_MODIFIED' => 'Модифицирано на',
  'LBL_DELETED' => 'Изтрити',
  'LBL_MODIFIED' => 'Модифициран от',
  'LBL_MODIFIED_USER' => 'Модифицирано от',
  'LBL_CREATED' => 'Създадено от',
  'LBL_REVISIONS' => 'Ревизии',
  'LBL_RELATED_DOCUMENT_ID' => 'Още документи по темата',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Ревизии на документа по темата',
  'LBL_IS_TEMPLATE' => 'е шаблон',
  'LBL_TEMPLATE_TYPE' => 'Тип на документа',
  'LBL_ASSIGNED_TO_NAME' => 'Отговорник:',
  'LBL_REVISION_NAME' => 'Номер на ревизията',
  'LBL_MIME' => 'Mime тип',
  'LBL_REVISION' => 'Ревизия',
  'LBL_DOCUMENT' => 'Още документи по темата',
  'LBL_LATEST_REVISION' => 'Последна ревизия',
  'LBL_CHANGE_LOG' => 'Дневник на промените за записа',
  'LBL_ACTIVE_DATE' => 'Публикувано на',
  'LBL_EXPIRATION_DATE' => 'Валидно до',
  'LBL_FILE_EXTENSION' => 'Разширение на файла',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Некласифициран',
  'LBL_HOMEPAGE_TITLE' => 'Моите документи',
  'LBL_NEW_FORM_TITLE' => 'Нов документ',
  'LBL_DOC_NAME' => 'Име на документа:',
  'LBL_FILENAME' => 'Име на файла:',
  'LBL_LIST_FILENAME' => 'Име на файла',
  'LBL_DOC_VERSION' => 'Версия:',
  'LBL_CATEGORY_VALUE' => 'Категория:',
  'LBL_LIST_CATEGORY' => 'Категория',
  'LBL_SUBCATEGORY_VALUE' => 'Подкатегория:',
  'LBL_DOC_STATUS' => 'Статус:',
  'LBL_LAST_REV_CREATOR' => 'Създадена от:',
  'LBL_CONTRACT_NAME' => 'Име на договора:',
  'LBL_LAST_REV_DATE' => 'Дата на ревизията:',
  'LBL_DOWNNLOAD_FILE' => 'Изтегли файла:',
  'LBL_DET_RELATED_DOCUMENT' => 'Свързан документ:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Версия на свързания документ:',
  'LBL_DET_IS_TEMPLATE' => 'Шаблон? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Тип на документа:',
  'LBL_TEAM' => 'Екип:',
  'LBL_DOC_DESCRIPTION' => 'Описание:',
  'LBL_DOC_ACTIVE_DATE' => 'Публикуван на:',
  'LBL_DOC_EXP_DATE' => 'Валиден до:',
  'LBL_LIST_FORM_TITLE' => 'Списък с документи',
  'LBL_LIST_DOCUMENT' => 'Документ',
  'LBL_LIST_SUBCATEGORY' => 'Подкатегория',
  'LBL_LIST_REVISION' => 'Ревизия',
  'LBL_LIST_LAST_REV_CREATOR' => 'Публикувана от',
  'LBL_LIST_LAST_REV_DATE' => 'Дата на ревизията',
  'LBL_LIST_VIEW_DOCUMENT' => 'Разгледай',
  'LBL_LIST_DOWNLOAD' => 'Изтегли',
  'LBL_LIST_ACTIVE_DATE' => 'Публикувано на',
  'LBL_LIST_EXP_DATE' => 'Валидно до',
  'LBL_LIST_STATUS' => 'Статус',
  'LBL_REVISIONS_SUBPANEL' => 'Ревизии',
  'LBL_SF_DOCUMENT' => 'Име на документа:',
  'LBL_SF_CATEGORY' => 'Категория:',
  'LBL_SF_SUBCATEGORY' => 'Подкатегория:',
  'LBL_SF_ACTIVE_DATE' => 'Публикуван на:',
  'LBL_SF_EXP_DATE' => 'Валиден до:',
  'DEF_CREATE_LOG' => 'Създаден документ',
  'ERR_DOC_NAME' => 'Име на документа',
  'ERR_DOC_ACTIVE_DATE' => 'Публикувано на',
  'ERR_DOC_EXP_DATE' => 'Валидно до',
  'ERR_FILENAME' => 'Име на файла',
  'ERR_DOC_VERSION' => 'Версия на документа',
  'ERR_DELETE_CONFIRM' => 'Искате ли да изтриете тази ревизия на документа?',
  'ERR_DELETE_LATEST_VERSION' => 'Нямате съответните права за изтриване на последната ревизия на документа.',
  'LNK_NEW_MAIL_MERGE' => 'Сливане на писма',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Шаблон за сливане на писма:',
  'LBL_TREE_TITLE' => 'Документи',
  'LBL_LIST_DOCUMENT_NAME' => 'Име на документа',
  'LBL_LIST_IS_TEMPLATE' => 'Шаблон?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Тип на документа',
  'LBL_LIST_SELECTED_REVISION' => 'Маркирани ревизии',
  'LBL_LIST_LATEST_REVISION' => 'Последна ревизия',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Договори по темата',
  'LBL_LAST_REV_CREATE_DATE' => 'Дата на последната ревизия',
  'LBL_CONTRACTS' => 'Договори',
  'LBL_CREATED_USER' => 'Създаден потребител',
  'LBL_DOCUMENT_INFORMATION' => 'Документ',
  'LBL_DOC_TYPE' => 'Източник',
  'LBL_LIST_DOC_TYPE' => 'Източник',
  'LBL_DOC_TYPE_POPUP' => 'Select a source to which this document will be uploaded and from which it will be available.',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Име на документа',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Списъкът съдържа последните 20 модифицирани файла. Използвайте Търсене за да намерите други файлове.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Име на файла',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Организации',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакти',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Възможности',
  'LBL_CASES_SUBPANEL_TITLE' => 'Казуси',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Проблеми',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Оферти',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Продукти',
);


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
  'LBL_ADDROWS' => 'Add Rows',
  'LBL_SUGAR_BIN_STAGE' => 'Sugar Bin (click items to add to staging area)',
  'LBL_VIEW_SUGAR_FIELDS' => 'View Sugar Fields',
  'LBL_VIEW_SUGAR_BIN' => 'View Sugar Bin',
  'LBL_SW_EDIT_PORTAL' => 'Edit Portal',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Repair Custom Fields',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Migrate Custom Fields',
  'LBL_EC_CLEAR_CACHE' => 'Clear Cache',
  'LBL_BTN_UNDO' => 'Undo',
  'LBL_BTN_REDO' => 'Redo',
  'LBL_SW_SUGARPORTAL' => 'Sugar Portal',
  'LBL_SP_SYNC' => 'Portal Sync',
  'LBL_SYNCP_WELCOME' => 'Please enter the url to the portal instance you wish to update then press the Go button.<br> This will bring up a prompt for your user name and password.<br> Please enter your Sugar user name and password and press the Begin Sync button.',
  'LBL_SP_STYLESHEET' => 'Upload a Style Sheet',
  'LBL_SP_UPLOADSTYLE' => 'Click on the browse button and select a style sheet from your computer to upload.<br> The next time you sync down to portal it will bring down the style sheet along with it.',
  'LBL_SP_PREVIEW' => 'Here is a preview of what your style sheet will look like',
  'LBL_REDO' => 'Redo',
  'LBL_INLINE' => 'Inline',
  'LBL_SINGULAR' => 'Singular Label',
  'LBL_PLURAL' => 'Plural Label',
  'LBL_EDIT_LAYOUT' => 'Редактиране на подредби',
  'LBL_EDIT_ROWS' => 'Редактиране на редове',
  'LBL_EDIT_COLUMNS' => 'Редактиране на колони',
  'LBL_EDIT_LABELS' => 'Редактиране на етикети',
  'LBL_EDIT_FIELDS' => 'Редактиране на потребителски полета',
  'LBL_ADD_FIELDS' => 'Добавяне на потребителски полета',
  'LBL_DISPLAY_HTML' => 'Показване на HTML',
  'LBL_SELECT_FILE' => 'Избиране на файл',
  'LBL_SAVE_LAYOUT' => 'Запазване на подредба',
  'LBL_SELECT_A_SUBPANEL' => 'Избиране на панел със свързани записи',
  'LBL_SELECT_SUBPANEL' => 'Избери панел със свързани записи',
  'LBL_MODULE_TITLE' => 'Студио',
  'LBL_TOOLBOX' => 'Инструменти',
  'LBL_STAGING_AREA' => 'Staging Area (преместете чрез влачене елементите тук)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Полета на Sugar (click items to add to staging area)',
  'LBL_FAILED_TO_SAVE' => 'Запазването е неуспешно',
  'LBL_CONFIRM_UNSAVE' => 'Промените няма да бъдат съхранени. Сигурни ли сте, че искате да продължите?',
  'LBL_PUBLISHING' => 'В процес на публикуване ...',
  'LBL_PUBLISHED' => 'Стартирал',
  'LBL_FAILED_PUBLISHED' => 'Публикуването е неуспешно',
  'LBL_DROP_HERE' => '[Поставете тук]',
  'LBL_NAME' => 'Име',
  'LBL_LABEL' => 'Етикет',
  'LBL_MASS_UPDATE' => 'Масова актуализация',
  'LBL_AUDITED' => 'Запис в базата при промяна на стойностите?',
  'LBL_CUSTOM_MODULE' => 'Модул',
  'LBL_DEFAULT_VALUE' => 'Стойност по подразбиране',
  'LBL_REQUIRED' => 'Задължително',
  'LBL_DATA_TYPE' => 'Тип',
  'LBL_HISTORY' => 'История',
  'LBL_SW_WELCOME' => '<h2>Добре дошли в Студио!</h2><br> Какви ще бъдат действията Ви?<br><b> Моля, изберете от опциите долу.</b>',
  'LBL_SW_EDIT_MODULE' => 'Редактиране на модул',
  'LBL_SW_EDIT_DROPDOWNS' => 'Редактиране на падащи менюта',
  'LBL_SW_EDIT_TABS' => 'Конфигурация на табулатори',
  'LBL_SW_RENAME_TABS' => 'Преименуване на табулатори',
  'LBL_SW_EDIT_GROUPTABS' => 'Подредба на групови табулатори',
  'LBL_SW_EDIT_WORKFLOW' => 'Редактиране на Workflow',
  'LBL_SMW_WELCOME' => '<h2>Добре дошли в Студио!</h2><br><b>Моля, изберете модул от списъка долу.',
  'LBL_SMA_WELCOME' => '<h2>Редактиране на модул</h2>Какви ще бъдат действията Ви?<br><b>Моля, изберете действие за извършване.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Редактиране на потребителски полета',
  'LBL_SMA_EDIT_LAYOUT' => 'Редактиране на подредби',
  'LBL_SMA_EDIT_LABELS' => 'Редактиране на етикети',
  'LBL_MB_PREVIEW' => 'Преглед',
  'LBL_MB_RESTORE' => 'Възстанови',
  'LBL_MB_DELETE' => 'Изтриване',
  'LBL_MB_COMPARE' => 'Сравни',
  'LBL_MB_WELCOME' => '<h2>История</h2><br> С опция "История" имате възможност да разглеждате всички публикувани издания на файла, с който работите. Имате възможност за сравнение и възстановяване на предишни версии. След избирането на втората възможност се работи с възстановения файл. Всички изменения следва да се публикуват, за да се виждат от останалите потребители.<br> What would you like to do today?<br><b> Моля, изберете от опциите долу.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Създаване на падащо меню',
  'LBL_ED_WELCOME' => '<h2>Редактор на падащи менюта</h2><br><b>Можете да създадете ново или да редактирате вече съществуващо падащо меню.',
  'LBL_DROPDOWN_NAME' => 'Име:',
  'LBL_DROPDOWN_LANGUAGE' => 'Език:',
  'LBL_TABGROUP_LANGUAGE' => 'Език на груповите табулатори:',
  'LBL_EC_WELCOME' => '<h2>Редактор на потребителски полета</h2><br><b>Можете да разглеждате и редактирате вече съществуващо потребителско поле, да създадете ново или clean the custom field cache.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Преглед на потребителски полета',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Създаване на потребителско поле',
  'LBL_SM_WELCOME' => '<h2>История</h2><br><b>Моля, изберете файл за разглеждане.</b>',
  'LBL_DD_DISPALYVALUE' => 'Етикет',
  'LBL_DD_DATABASEVALUE' => 'Име на полето',
  'LBL_DD_ALL' => 'Всички записи',
  'LBL_BTN_SAVE' => 'Съхрани',
  'LBL_BTN_CANCEL' => 'Отмени',
  'LBL_BTN_SAVEPUBLISH' => 'Съхрани и публикувай',
  'LBL_BTN_HISTORY' => 'История',
  'LBL_BTN_NEXT' => 'Следваща',
  'LBL_BTN_BACK' => 'Върни',
  'LBL_BTN_ADDCOLS' => 'Добавяне на колони',
  'LBL_BTN_ADDROWS' => 'Добавяне на редове',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Добавяне на потребителско поле',
  'LBL_BTN_TABINDEX' => 'Редактиране на подредба на табулатори',
  'LBL_TAB_SUBTABS' => 'Свързани табулатори',
  'LBL_MODULES' => 'Модули',
  'LBL_MODULE_NAME' => 'Административен',
  'LBL_CONFIGURE_GROUP_TABS' => 'Подредба на групови табулатори',
  'LBL_GROUP_TAB_WELCOME' => 'Подредбата на груповите табулатори от тази страница ще бъде приложена в случай, че потребител избере да ползва "Групирани модули" вместо опцията по подразбиране "Модули" за параметъра "Навигация" в Персонални настройки>Подредба на екрана.',
  'LBL_RENAME_TAB_WELCOME' => 'За преименуване, натиснете върху заглавието на табулатора от списъка долу.',
  'LBL_DELETE_MODULE' => '&nbsp;Премахни&nbsp;модул',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Изберете за да се показва табулатора "Други" в лентата за навигация.  По подразбиране, в раздела "Други" се включват всички модули, които не са включени в други групи.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'За да настройте етикетите на табулаторите за други налични езици, изберете език, редактирйте етикетите и кликнете върху Съхрани и публикувай да направи промени за този език.',
  'LBL_ADD_GROUP' => 'Добавяне на група',
  'LBL_NEW_GROUP' => 'Нов групов табулатор',
  'LBL_RENAME_TABS' => 'Преименуване на табулатори',
  'LBL_DISPLAY_OTHER_TAB' => 'Покажи табулатора &#39;Други&#39;',
  'LBL_DEFAULT' => 'По подразбиране',
  'LBL_ADDITIONAL' => 'Допълнителна',
  'LBL_AVAILABLE' => 'Наличен',
  'LBL_LISTVIEW_DESCRIPTION' => 'Долу са представени три колони. Стандартната колоната съдържа полета, показвани в списъка със записите по подразбиране. Допълнителната колона съдържа полета, с възможност за вмъкване чрез промяна на подредба. Скритите колони съдържат информация, достъпна за администратора, с възможност за включване към стандартна или допълнителни колони за използване от потребителите.',
  'LBL_LISTVIEW_EDIT' => 'Редактор на списъци',
  'ERROR_ALREADY_EXISTS' => 'Грешка: полетата вече съществуват',
  'ERROR_INVALID_KEY_VALUE' => 'Грешка: Невалидна стойност на key: [&#39;]',
  'LBL_SMP_WELCOME' => 'Моля, изберете модул за редактиране от списъка долу',
  'LBL_SP_WELCOME' => 'Welcome to Studio for Sugar Portal. You can either choose to edit modules here or sync to a portal instance.<br> Моля, изберете от списъка долу.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Долу са представени две колони: Стандартната колоната съдържа полета, показвани в списъка със записите по подразбиране. Допълнителната колона съдържа полета, с възможност за вмъкване чрез редактиране на подредба. Поставете и подредете полетата в съответната колона, в зависимост от това дали те да бъдат видими или скрити за цялата система.',
  'LBL_SP_UPLOADED' => 'Заредени',
  'ERROR_SP_UPLOADED' => 'Моля, убедете се, че зарежданият файл е css.',
  'LBL_SAVE' => 'Съхрани',
  'LBL_UNDO' => 'Върни',
  'LBL_DELETE' => 'Изтрий',
  'LBL_ADD_FIELD' => 'Добави поле',
  'LBL_MAXIMIZE' => 'Максимизирай',
  'LBL_MINIMIZE' => 'Минимизирай',
  'LBL_PUBLISH' => 'Публикувай',
  'LBL_ADDFIELD' => 'Добави поле',
  'LBL_EDIT' => 'Редактирай',
  'LBL_LANGUAGE_TOOLTIP' => 'Изберете език, който да бъде редактиран.',
  'LBL_RENAME_MOD_SAVE_HELP' => 'Натиснете Запази, за да приложите промените.',
);


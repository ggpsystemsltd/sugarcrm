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
  'LBL_GMAIL_LOGO' => 'Gmail',
  'LBL_YAHOO_MAIL_LOGO' => 'Yahoo Mail',
  'LBL_EXCHANGE_LOGO' => 'Exchange',
  'LBL_HELP' => 'Помощ',
  'LBL_ID' => 'Id',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Processed',
  'LBL_MODULE_ID' => 'EmailMan',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Configure Campaign Email Settings',
  'LBL_RELATED_ID' => 'Related Id',
  'LBL_RELATED_TYPE' => 'Related Type',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Processed Search',
  'LBL_VIEW_PROCESSED_EMAILS' => 'View Processed Emails',
  'LBL_SECURITY_APPLET' => 'Applet tag',
  'LBL_SECURITY_BASE' => 'Base tag',
  'LBL_SECURITY_EMBED' => 'Embed tag',
  'LBL_SECURITY_FORM' => 'Form tag',
  'LBL_SECURITY_FRAME' => 'Frame tag',
  'LBL_SECURITY_FRAMESET' => 'Frameset tag',
  'LBL_SECURITY_IFRAME' => 'iFrame tag',
  'LBL_SECURITY_IMPORT' => 'Import tag',
  'LBL_SECURITY_LAYER' => 'Layer tag',
  'LBL_SECURITY_LINK' => 'Link tag',
  'LBL_SECURITY_OBJECT' => 'Object tag',
  'LBL_SECURITY_SCRIPT' => 'Script tag',
  'LBL_SECURITY_STYLE' => 'Style tag',
  'LBL_SECURITY_XMP' => 'Xmp tag',
  'LBL_SEND_DATE_TIME' => 'Дата на изпращане',
  'LBL_IN_QUEUE' => 'В опашката?',
  'LBL_IN_QUEUE_DATE' => 'Дата на прехвърляне към опашката',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Възможно е въвеждане само на цели числа в "Брой на писма в пакет"',
  'LBL_ATTACHMENT_AUDIT' => 'бяха изпратени.  It was not duplicated locally to conserve disk usage.',
  'LBL_CONFIGURE_SETTINGS' => 'Конфигуриране',
  'LBL_CUSTOM_LOCATION' => 'Ръчна настройка',
  'LBL_DEFAULT_LOCATION' => 'По подразбиране',
  'LBL_DISCLOSURE_TITLE' => 'Добавяне на уведомление за конфиденциалност към всяко писмо',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Съдържание на уведомлението',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'Внимание: Писмото се изпраща до строго определен кръг от получатели и може да съдържа конфиденциална информация. Всеки неправомерен прочит, употреба или разпространение са забранени. В случай че не сте посочен като получател за това писмо, моля, унищожете всички копия на оригиналното съобщение и уведомете подателя. Благодарим Ви.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Използване на този знаков набор при писане на съобщение',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Използване на този клиент при писане на писмо',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Изтриване на прикачените файлове и бележки заедно с писмата',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Настройки по подразбиране от Gmail',
  'LBL_EMAIL_PER_RUN_REQ' => 'Брой писма в пакет:',
  'LBL_EMAIL_SMTP_SSL' => 'Криптиране чрез SSL',
  'LBL_EMAIL_USER_TITLE' => 'Настройка на пощенска кутия по подразбиране',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Конфигурация на изходяща поща',
  'LBL_EMAILS_PER_RUN' => 'Брой писма в пакет:',
  'LBL_LIST_CAMPAIGN' => 'Кампании',
  'LBL_LIST_FORM_TITLE' => 'Опашка',
  'LBL_LIST_FROM_EMAIL' => 'Адрес на подателя',
  'LBL_LIST_FROM_NAME' => 'Подател',
  'LBL_LIST_IN_QUEUE' => 'В опашката?',
  'LBL_LIST_MESSAGE_NAME' => 'Маркетингово съобщение',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Електронен адрес',
  'LBL_LIST_RECIPIENT_NAME' => 'Получател',
  'LBL_LIST_SEND_ATTEMPTS' => 'Опити за изпращане',
  'LBL_LIST_SEND_DATE_TIME' => 'Изпратено на',
  'LBL_LIST_USER_NAME' => 'Потребител',
  'LBL_LOCATION_ONLY' => 'Местоположение',
  'LBL_LOCATION_TRACK' => 'Местоположение на файловете за проследяване на потребителската активност (campaign_tracker.php, ...)',
  'LBL_CAMP_MESSAGE_COPY' => 'Съхраняване на копия от изпратените съобщения:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Искате ли да се съхраняват копия от <bold>всички</bold> съобщения изпратени през кампании?  <bold>Нашата препоръка е това да не се прави и стойността по подразбиране е не</bold>.  Така ще се съхраняват единствено шаблоните на маркетинговите послания и необходимите променливи, които позволяват да се възстанови конкретно съобщение.',
  'LBL_MAIL_SENDTYPE' => 'Начин на предаване:',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Изисква идентификация',
  'LBL_MAIL_SMTPPASS' => 'Парола:',
  'LBL_MAIL_SMTPPORT' => 'Порт:',
  'LBL_MAIL_SMTPSERVER' => 'Сървър за електронна поща:',
  'LBL_MAIL_SMTPUSER' => 'Потребител:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Доставчик на електронна поща:',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Парола',
  'LBL_YAHOOMAIL_SMTPUSER' => 'Идентификатор',
  'LBL_GMAIL_SMTPPASS' => 'Парола',
  'LBL_GMAIL_SMTPUSER' => 'Адрес',
  'LBL_EXCHANGE_SMTPPASS' => 'Парола',
  'LBL_EXCHANGE_SMTPUSER' => 'потребител',
  'LBL_EXCHANGE_SMTPPORT' => 'Порт',
  'LBL_EXCHANGE_SMTPSERVER' => 'Сървър',
  'LBL_EMAIL_LINK_TYPE' => 'Пощенски клиент',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>System Default Mail Client</b> : default email client set by the system adminstrator.<br><b>SugarCRM Mail Client</b> : email client in the Sugar Emails module.<br><b>External Mail Client</b> : other email client, such as Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'Послание',
  'LBL_MODULE_NAME' => 'Настройки на електронна поща',
  'LBL_MODULE_TITLE' => 'Изходящи електронни съобщения от опашката',
  'LBL_NOTIFICATION_ON_DESC' => 'Изпращане на писмо с уведомление при присвояване на запис.',
  'LBL_NOTIFY_FROMADDRESS' => 'Адрес на подателя:',
  'LBL_NOTIFY_FROMNAME' => 'Подател:',
  'LBL_NOTIFY_ON' => 'Включени уведомления?',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Изпращане на уведомления по подразбиране за нови потребители?',
  'LBL_NOTIFY_TITLE' => 'Опции при изпращане',
  'LBL_OLD_ID' => 'Предишно Id',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Опции при изпращане на електронна поща',
  'LBL_SAVE_OUTBOUND_RAW' => 'Запиши електронната поща.',
  'LBL_SEARCH_FORM_TITLE' => 'Търсене в опашка',
  'LBL_VIEW_QUEUED_EMAILS' => 'Преглед на опашките',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'config.php->site_url',
  'TXT_REMOVE_ME_ALT' => 'За да се отпишете от тази целева група',
  'TXT_REMOVE_ME_CLICK' => 'натиснете тук',
  'TXT_REMOVE_ME' => 'За да се отпишете от тази целева група',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Изпращане на уведомления от пощенския адрес на потребителя?',
  'LBL_SECURITY_TITLE' => 'Настройка на сигурността',
  'LBL_SECURITY_DESC' => 'Изберете следните тагове, които да не се показват във Входящата поща и в модул "Електонна поща".',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Изберете по подразбиране на системата,  минималните подразбрани  настройки за Outlook (грешките се изписват на обособения за това екран/панел/площ)',
  'LBL_SECURITY_TOGGLE_ALL' => 'Маркиране на всички тагове',
  'LBL_YES' => 'Да',
  'LBL_NO' => 'Не',
  'LBL_PREPEND_TEST' => '[Тествай]:',
  'LBL_SEND_ATTEMPTS' => 'Опити за изпращане',
  'LBL_OUTGOING_SECTION_HELP' => 'Конфигуриране на системен SMTP сървър за изходяща поща.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Потребителите могат да използват кутията за изходяща поща:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Когато тази опция е избрана, всички потребители на системата, ще могат да изпращат електронни писма през тази пощенска кутия.  Ако опцията не е избрана, потребителите ще могат да използват сървъра за изходяща поща, като си въведат собствена пощенска кутия.',
  'LBL_FROM_ADDRESS_HELP' => 'Когато е включено, името на потребителя \\ "и електроненния адрес, ще бъдат включени в полетата на електронната поща. Тази функция може да не работи със сървър SMTP, който не позволява изпращането от друг имейл акаунт от сървъра.',
);


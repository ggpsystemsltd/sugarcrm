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

	

$app_list_strings = array (
  'account_type_dom' => 
  array (
    '' => '',
    'Analyst' => 'Анализатор',
    'Competitor' => 'Конкурент',
    'Customer' => 'Клиент',
    'Integrator' => 'Интегратор',
    'Investor' => 'Инвеститор',
    'Partner' => 'Партньор',
    'Press' => 'Медиа',
    'Prospect' => 'В процес на преговори',
    'Reseller' => 'Дистрибутор',
    'Other' => 'Други',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Apparel' => 'Текстилна промишленост',
    'Banking' => 'Банково дело',
    'Biotechnology' => 'Биотехнологии',
    'Chemicals' => 'Химическа промишленост',
    'Communications' => 'Комуникации',
    'Construction' => 'Строителство',
    'Consulting' => 'Консултантски услуги',
    'Education' => 'Образование',
    'Electronics' => 'Електроника',
    'Energy' => 'Природни ресурси и енергия',
    'Engineering' => 'Инженерна дейност',
    'Entertainment' => 'Забавление',
    'Environmental' => 'Екология',
    'Finance' => 'Финанси',
    'Government' => 'Правителствено и политика',
    'Healthcare' => 'Здравеопазване',
    'Hospitality' => 'Хотелиерство',
    'Insurance' => 'Застрахователна дейност',
    'Machinery' => 'Оборудване',
    'Manufacturing' => 'Производство',
    'Media' => 'Медии',
    'Not For Profit' => 'С нестопанска цел',
    'Recreation' => 'Ваканционни услуги',
    'Retail' => 'Търговия на дребно',
    'Shipping' => 'Превоз',
    'Technology' => 'Технологии',
    'Telecommunications' => 'Телекомуникации',
    'Transportation' => 'Транспортна дейност',
    'Utilities' => 'Комунални услуги',
    'Other' => 'Други',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Cold Call' => 'Телефонен разговор',
    'Existing Customer' => 'Съществуващ клиент',
    'Self Generated' => 'Самостоятелно генерирани',
    'Employee' => 'Служител',
    'Partner' => 'Партньор',
    'Public Relations' => 'Връзки с обществеността',
    'Direct Mail' => 'Стационарна поща',
    'Conference' => 'Конференция',
    'Trade Show' => 'Търговско изложение',
    'Web Site' => 'Сайт на компанията',
    'Word of mouth' => 'Препоръка',
    'Email' => 'Електронна поща',
    'Other' => 'Други',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Съществуващ бизнес',
    'New Business' => 'Нов бизнес',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Първоначално решение',
    'Business Decision Maker' => 'Вземащ бизнес решения',
    'Business Evaluator' => 'Бизнес оценител',
    'Technical Decision Maker' => 'Вземащ технически решения',
    'Technical Evaluator' => 'Технически оценител',
    'Executive Sponsor' => 'Спонсор',
    'Influencer' => 'Лобист',
    'Other' => 'Други',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Основен Контакт',
    'Alternate Contact' => 'Алтернативни контакти',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => 'Отложено плащане - 15 дни',
    'Net 30' => 'Отложено плащане - 30 дни',
  ),
  'sales_probability_dom' => 
  array (
    'Prospecting' => '10',
    'Qualification' => '20',
    'Needs Analysis' => '25',
    'Value Proposition' => '30',
    'Id. Decision Makers' => '40',
    'Perception Analysis' => '50',
    'Proposal/Price Quote' => '65',
    'Negotiation/Review' => '80',
    'Closed Won' => '100',
    'Closed Lost' => '',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Mr.' => 'Г-н',
    'Ms.' => 'Г-жа',
    'Mrs.' => 'Г-жа',
    'Dr.' => 'Доктор',
    'Prof.' => 'Професор',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Нов',
    'Assigned' => 'Разпределен',
    'In Process' => 'В опашката?',
    'Converted' => 'Преобразуван:',
    'Recycled' => 'Възобновен',
    'Dead' => 'Загубен',
  ),
  'messenger_type_dom' => 
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
  ),
  'project_task_utilization_options' => 
  array (
    25 => '25',
    50 => '50',
    75 => '75',
    100 => '100',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Първоначално решение',
    'Business Decision Maker' => 'Вземащ бизнес решения',
    'Business Evaluator' => 'Бизнес оценител',
    'Technical Decision Maker' => 'Вземащ технически решения',
    'Technical Evaluator' => 'Технически оценител',
    'Executive Sponsor' => 'Спонсор',
    'Influencer' => 'Лобист',
    'Other' => 'Други',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Приет',
    'Duplicate' => 'Дублирай',
    'Fixed' => 'Определен',
    'Out of Date' => 'С изтекъл срок',
    'Invalid' => 'Невалиден',
    'Later' => 'Отложен',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Internal' => 'Вътрешен',
    'Forum' => 'Форум',
    'Web' => 'Уеб',
    'InboundEmail' => 'Електронна поща',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Feeds' => 'Новини',
    'Outlook Plugin' => 'Outlook Plugin',
    'Accounts' => 'Организации',
    'Activities' => 'Дейности',
    'Bug Tracker' => 'Проблеми',
    'Calendar' => 'Календар',
    'Calls' => 'Обаждания',
    'Campaigns' => 'Кампании',
    'Cases' => 'Казуси',
    'Contacts' => 'Контакти',
    'Currencies' => 'Валути',
    'Dashboard' => 'Електронно табло',
    'Documents' => 'Документи',
    'Emails' => 'Електронна поща',
    'Forecasts' => 'Планиране',
    'Help' => 'Помощ',
    'Home' => 'Начало',
    'Leads' => 'Потенциални клиенти',
    'Meetings' => 'Срещи',
    'Notes' => 'Бележки',
    'Opportunities' => 'Възможности',
    'Product Catalog' => 'Продуктов каталог',
    'Products' => 'Продукти',
    'Projects' => 'Проекти',
    'Quotes' => 'Оферти',
    'Releases' => 'Версии',
    'RSS' => 'RSS новини',
    'Studio' => 'Студио',
    'Upgrade' => 'Актуализация',
    'Users' => 'Потребители',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Планирана',
    'Active' => 'Активен',
    'Inactive' => 'Неактивен',
    'Complete' => 'Завършена',
    'In Queue' => 'Чакаща за изпращане',
    'Sending' => 'Изпратена',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Telesales' => 'Телемаркетинг',
    'Mail' => 'Поща',
    'Email' => 'Електронна поща',
    'Print' => 'Печат',
    'Web' => 'Уеб',
    'Radio' => 'Radio бутон',
    'Television' => 'Телевизия',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
    -12 => '(GMT - 12) International Date Line West',
    -11 => '(GMT - 11) Остров Мидуей, Самоа',
    -10 => '(GMT - 10) Хаваи',
    -9 => '(GMT - 9) Аляска',
    -8 => '(GMT - 8) Сан Франциско',
    -7 => '(GMT - 7) Феникс',
    -6 => '(GMT - 6) Саскачеван',
    -5 => '(GMT - 5) Ню Йорк',
    -4 => '(GMT - 4) Сантяго',
    -3 => '(GMT - 3) Буенос Айрес',
    -2 => '(GMT - 2) Среден Атлантик',
    -1 => '(GMT - 1) Азорски острови',
    1 => '(GMT + 1) Мадрид',
    2 => '(GMT + 2) Атина',
    3 => '(GMT + 3) Москва',
    4 => '(GMT + 4) Кабул',
    5 => '(GMT + 5) Екатеринбург',
    6 => '(GMT + 6) Астана',
    7 => '(GMT + 7) Банкок',
    8 => '(GMT + 8) Пърт',
    9 => '(GMT + 9) Сеул',
    10 => '(GMT + 10) Бризбейн',
    11 => '(GMT + 11) Соломон. острови',
    12 => '(GMT + 12) Оукланд',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '-Няма данни--',
  ),
  'dom_mailbox_type' => 
  array (
    'bounce' => 'Bounce Handling',
    'pick' => 'Създай [Всички]',
    'bug' => 'Добавяне на проблем',
    'support' => 'Въвеждане на казус',
    'contact' => 'Създаване на контакт',
    'sales' => 'Създаване на потенциален клиент',
    'task' => 'Добавяне на задача',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    '' => '--Няма данни--',
    'direct' => 'Отговорник',
    'leastBusy' => 'зает',
  ),
  'forecast_type_dom' => 
  array (
    'Rollup' => 'Rollup',
    'Direct' => 'Директен',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Маркетинг',
    'Knowledege Base' => 'База от знания',
    'Sales' => 'Продажби',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'Marketing Collateral' => 'Маркетингови материали',
    'Product Brochures' => 'Брошури',
    'FAQ' => 'Често задавани въпроси',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Сливане на писма',
    'license' => 'Лицензионно споразумение',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'invite_only' => '(Invite Only)',
    'to' => 'До:',
    'cc' => 'Копие до:',
    'bcc' => 'Скрито копие до:',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'User assigned to triggered record',
    'created_by' => 'User who created triggered record',
    'modified_user_id' => 'Модифицирано от',
    'current_user' => 'Логване',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'current_team' => 'Team of Logged-in User',
    'team_id' => 'Настоящият екип създаде запис',
  ),
  'dom_timezones_extra' => 
  array (
    -12 => '(GMT-12) International Date Line West',
    -8 => '(GMT-8) (PST)',
    -7 => '(GMT-7) (MST)',
    -6 => '(GMT-6) (CST)',
    -5 => '(GMT-5) (EST)',
    -11 => '(GMT-11) Остров Мидуей, Самоа',
    -10 => '(GMT-10) Хаваи',
    -9 => '(GMT-9) Аляска',
    -4 => '(GMT-4) Сантяго',
    -3 => '(GMT-3) Буенос Айрес',
    -2 => '(GMT-2) Среден Атлантик',
    -1 => '(GMT-1) Азорски острови',
    1 => '(GMT+1) Мадрид',
    2 => '(GMT+2) Атина',
    3 => '(GMT+3) Москва',
    4 => '(GMT+4) Кабул',
    5 => '(GMT+5) Екатеринбург',
    6 => '(GMT+6) Астана',
    7 => '(GMT+7) Банкок',
    8 => '(GMT+8) Пърт',
    9 => '(GMT+9) Сеул',
    10 => '(GMT+10) Бризбейн',
    11 => '(GMT+11) Соломон. острови',
    12 => '(GMT+12) Оукланд',
  ),
  'duration_intervals' => 
  array (
    15 => '15',
    30 => '30',
    45 => '45',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '',
    'active' => 'Активен',
    'inactive' => 'Неактивен',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Изпратени / направен опит за изпращане',
    'send error' => 'Върнати, други грешки',
    'invalid email' => 'Върнати, невалиден адрес',
    'link' => 'Посетили адреса',
    'viewed' => 'Прочели съобщението',
    'removed' => 'Да не се изпраща електронна поща',
    'lead' => 'Създадени потенциални клиенти',
    'contact' => 'Създадени контакти',
  ),
  'language_pack_name' => 'Български',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Оферти',
  'moduleList' => 
  array (
    'Home' => 'Начало',
    'Bugs' => 'Проблеми',
    'Cases' => 'Казуси',
    'Notes' => 'Бележки',
    'Newsletters' => 'Бюлетини',
    'Teams' => 'Екип',
    'Users' => 'Потребители',
    'KBDocuments' => 'База от знания',
    'FAQ' => 'Често задавани въпроси',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Начало',
    'Bugs' => 'Проблем',
    'Cases' => 'Казус',
    'Notes' => 'Описание',
    'Teams' => 'Екип',
    'Users' => 'Потребител',
  ),
  'checkbox_dom' => 
  array (
    '' => '[-blank-]',
    1 => 'Да',
    2 => 'Не',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'Потенциален',
    'Qualification' => 'Класификация на сделката',
    'Needs Analysis' => 'Анализ на нуждите на клиента',
    'Value Proposition' => 'Разработване на решение',
    'Id. Decision Makers' => 'Определяне на ключовите фигури',
    'Perception Analysis' => 'Определяне на стратегия за преговорите',
    'Proposal/Price Quote' => 'Предложение/Ценова оферта',
    'Negotiation/Review' => 'Преговори/Преглед на офертата',
    'Closed Won' => 'Спечелена',
    'Closed Lost' => 'Загубена',
  ),
  'activity_dom' => 
  array (
    'Call' => 'Обаждане',
    'Meeting' => 'Среща',
    'Task' => 'Задача',
    'Email' => 'Електронна поща',
    'Note' => 'Описание',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 минута по-рано',
    300 => '5 минути по-рано',
    600 => '10 минути по-рано',
    900 => '15 минути по-рано',
    1800 => '30 минути по-рано',
    3600 => '1 час по-рано',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Висока',
    'Medium' => 'Средна',
    'Low' => 'Ниска',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Планирана',
    'In Progress' => 'В процес на изпълнение',
    'Completed' => 'Приключена',
    'Pending Input' => 'Висяща',
    'Deferred' => 'Отложена',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Планирана',
    'Held' => 'Проведена',
    'Not Held' => 'Несъстояла се',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Планирана',
    'Held' => 'Проведена',
    'Not Held' => 'Несъстояла се',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Входящо',
    'Outbound' => 'Изходящо',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Нов',
    'Assigned' => 'Разпределен',
    'In Process' => 'В опашката?',
    'Converted' => 'Преобразуван:',
    'Recycled' => 'Възобновен',
    'Dead' => 'Загубен',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Нов',
    'Assigned' => 'Разпределен',
    'Closed' => 'Затворен',
    'Pending Input' => 'Висяща',
    'Rejected' => 'Отхвърлен',
    'Duplicate' => 'Дублирай',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Висока',
    'P2' => 'Средна',
    'P3' => 'Ниска',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Активен',
    'Inactive' => 'Неактивен',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Активен',
    'Terminated' => 'Напуснал',
    'Leave of Absence' => 'В отпуска',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Висока',
    'Medium' => 'Средна',
    'Low' => 'Ниска',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Планирана',
    'In Progress' => 'В процес на изпълнение',
    'Completed' => 'Приключена',
    'Pending Input' => 'Висяща',
    'Deferred' => 'Отложена',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Организация',
    'Opportunities' => 'Свързан с възможност:',
    'Cases' => 'Казус',
    'Leads' => 'Потенциален клиент',
    'Contacts' => 'Контакти',
    'ProductTemplates' => 'Продукт',
    'Quotes' => 'Оферта',
    'Bugs' => 'Проблем',
    'Project' => 'Проекти',
    'ProjectTask' => 'Задача по проект',
    'Tasks' => 'Задача',
  ),
  'record_type_display_notes' => 
  array (
    'Accounts' => 'Организация',
    'Contacts' => 'Контакт',
    'Opportunities' => 'Свързан с възможност:',
    'Cases' => 'Казус',
    'Leads' => 'Потенциален клиент',
    'ProductTemplates' => 'Продукт',
    'Quotes' => 'Оферта',
    'Products' => 'Продукт',
    'Contracts' => 'Договор',
    'Bugs' => 'Проблем',
    'Emails' => 'Електронна поща',
    'Project' => 'Проекти',
    'ProjectTask' => 'Задача по проект',
    'Meetings' => 'Среща',
    'Calls' => 'Обаждане',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Офериран',
    'Orders' => 'Поръчан',
    'Ship' => 'Изпратен',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Фиксирана цена',
    'ProfitMargin' => 'Норма на печалба',
    'PercentageMarkup' => 'Надбавка върху цената',
    'PercentageDiscount' => 'Отстъпка от каталожна цена',
    'IsList' => 'По каталожна цена',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'Наличен на склад',
    'Unavailable' => 'Изчерпан',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Облагаем',
    'Non-Taxable' => 'Необлагаем',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'На шест месеца',
    '+1 year' => 'На една година',
    '+2 years' => 'На две години',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Оферта',
    'Orders' => 'Поръчка',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Работен вариант',
    'Negotiation' => 'Преговори по офертата',
    'Delivered' => 'Изпратена',
    'On Hold' => 'Висяща',
    'Confirmed' => 'Потвърдена',
    'Closed Accepted' => 'Приета',
    'Closed Lost' => 'Загубена',
    'Closed Dead' => 'Замразена',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Висяща',
    'Confirmed' => 'Потвърдена',
    'On Hold' => 'Висяща',
    'Shipped' => 'Изпратен',
    'Cancelled' => 'Отменена',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Предложение',
    'Invoice' => 'Фактура',
    'Terms' => 'Условия на плащане',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Належаща',
    'High' => 'Висока',
    'Medium' => 'Средна',
    'Low' => 'Ниска',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Нов',
    'Assigned' => 'Разпределен',
    'Closed' => 'Затворен',
    'Pending' => 'Висяща',
    'Rejected' => 'Отхвърлен',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Недостатък (Дефект)',
    'Feature' => 'Свойство (Черта)',
  ),
  'dom_cal_month_long' => 
  array (
    1 => 'Януари',
    2 => 'Февруари',
    3 => 'Март',
    4 => 'Април',
    5 => 'Май',
    6 => 'Юни',
    7 => 'Юли',
    8 => 'Август',
    9 => 'Септември',
    10 => 'Октомври',
    11 => 'Ноември',
    12 => 'Декември',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Списъчна',
    'summary' => 'Обобаваща',
    'detailed_summary' => 'Обобщаваща с детайли',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Изпратено',
    'archived' => 'Архивни',
    'draft' => 'Работен вариант',
    'inbound' => 'Входящо',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Архивни',
    'closed' => 'Затворен',
    'draft' => 'Черново',
    'read' => 'Прочетено',
    'replied' => 'Отговорено',
    'sent' => 'Изпратено',
    'send_error' => 'С грешка при изпращане',
    'unread' => 'Нечетени',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Моля, изберете само един потребител при директно присвояване на запис.',
    2 => 'Необходимо е да присвоявате само маркираните записи при директно присвояване на запис.',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Да',
    'bool_false' => 'Не',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Да',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Да',
    'off' => 'Не',
    '' => 'Не',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Пощенски клиент по подразбиране',
    'sugar' => 'SugarCRM Пощенски клиент',
    'mailto' => 'Външен пощенски клиент',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Email формат по подразбиране',
    'html' => 'HTML формат',
    'plain' => 'Текст формат',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Не е извършен, с пропуснато време за стартиране',
    'ready' => 'Готов за изпълнение',
    'in progress' => 'В процес на изпълнение',
    'failed' => 'Завършил неуспешно',
    'completed' => 'Приключена',
    'no curl' => 'Не е извършен: Няма cURL',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Активен',
    'Inactive' => 'Неактивен',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Активен',
    'Draft' => 'Работен вариант',
    'FAQ' => 'Често задавани въпроси',
    'Expired' => 'С изтекъл срок на валидност',
    'Under Review' => 'В процес на обработка',
    'Pending' => 'Висяща',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Приеми',
    'decline' => 'Отклони',
    'tentative' => 'Пробен',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Приет',
    'decline' => 'Отклонена',
    'tentative' => 'Пробен',
    'none' => 'няма',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Плюс',
    '-' => '(-) Минус',
    '*' => '(X) Умножено по',
    '/' => '(/) Разделено по',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'При запазване на записи',
    'Time' => 'След изтичане на срока',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Е',
    'in' => 'Спада към',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Е равно на',
    'Does not Equal' => 'Е различно от',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Е равно на',
    'Less Than' => 'Е с по-малки стойности от',
    'More Than' => 'Е с по-големи стойности от',
    'Does not Equal' => 'Е различно от',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Да',
    'bool_false' => 'Не',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Е равно на',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 часа',
    28800 => '8 часа',
    43200 => '12 часа',
    86400 => '1 ден',
    172800 => '2 дни',
    259200 => '3 дни',
    345600 => '4 дни',
    432000 => '5 дни',
    604800 => '1 седмица',
    1209600 => '2 седмици',
    1814400 => '3 седмици',
    2592000 => '30 дни',
    5184000 => '60 дни',
    7776000 => '90 дни',
    10368000 => '120 дни',
    12960000 => '150 дни',
    15552000 => '180 дни',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'повече от',
    'Less Than' => 'помалко от',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'Електронна поща',
    'Invite' => 'Покана',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Стандартно съобщение',
    'Custom Template' => 'Потребителски шаблон',
    'System Default' => 'По подразбиране',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Текущи потребители',
    'rel_user' => 'Свързани потребители',
    'rel_user_custom' => 'Свързани потребители',
    'specific_team' => 'Определен екип',
    'specific_role' => 'Определена роля',
    'specific_user' => 'Определен потребител',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Нова стойност',
    'past' => 'Предишна стойност',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Потребител',
    'Manager' => 'Потребители',
  ),
  'wflow_address_type_dom' => 
  array (
    'to' => 'До:',
    'cc' => 'Копие до:',
    'bcc' => 'Скрито копие до:',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'До:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Актуализиране на запис',
    'update_rel' => 'Актуализиране на свързани записи',
    'new' => 'Нов запис',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Стартова дата',
    'Existing Value' => 'Текуща стойност',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Базови настройки',
    'Advanced' => 'Допълнителни настройки',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Преместване в падащото меню напред',
    'advance' => 'Преместване в падащото меню назад',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Нови и съществуващи записи',
    'New' => 'Само нови записи',
    'Update' => 'Само съществуващи записи',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Всички са свързани',
    'filter' => 'Филтър на свързване',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'всички свързани с',
    'any' => 'всички свързани с',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Известявание с последващи действия',
    'actions_alerts' => 'Действия с последващи известявания',
  ),
  'prospect_list_type_dom' => 
  array (
    'default' => 'По подразбиране',
    'seed' => 'За сведение',
    'exempt_domain' => 'Блокиращ - по домейн',
    'exempt_address' => 'Блокиращ - по адрес',
    'exempt' => 'Блокиращ - по идентификатор',
    'test' => 'Тестов',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Контакти',
    'Users' => 'Потребители',
    'Prospects' => 'Целеви клиенти',
    'Leads' => 'Потенциални клиенти',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Планирана',
    'inprogress' => 'В процес на изпълнение',
    'signed' => 'Подписан',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Месечно',
    'quarterly' => 'На тримесечие',
    'halfyearly' => 'На полугодие',
    'yearly' => 'Годишно',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 ден',
    3 => '3 дни',
    5 => '5 дни',
    7 => '1 седмица',
    14 => '2 седмици',
    21 => '3 седмици',
    31 => '1 месец',
  ),
);

$app_strings = array (
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ALT_HOT_KEY' => 'Alt+',
  'LBL_BILL_TO_ACCOUNT' => 'Сметка на Организацията',
  'LBL_BILL_TO_CONTACT' => 'Сметка на Контакта',
  'LBL_BROWSER_TITLE' => 'SugarCRM - Commercial Open Source CRM',
  'LBL_BY' => 'by',
  'LBL_CANCEL_BUTTON_KEY' => 'X',
  'LBL_CHANGE_BUTTON_KEY' => 'G',
  'LBL_CHARSET' => 'UTF-8',
  'LBL_CLEAR_BUTTON_KEY' => 'C',
  'LBL_CLOSEALL_BUTTON_KEY' => 'Q',
  'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
  'LBL_DELETE_BUTTON_KEY' => 'D',
  'LBL_DONE_BUTTON_KEY' => 'X',
  'LBL_DUPLICATE_BUTTON_KEY' => 'U',
  'LBL_EDIT_BUTTON_KEY' => 'E',
  'LBL_VIEW_BUTTON_KEY' => 'V',
  'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
  'LBL_LIST_OF' => 'of',
  'LBL_MAILMERGE_KEY' => 'M',
  'LBL_NEW_BUTTON_KEY' => 'N',
  'LBL_OPENALL_BUTTON_KEY' => 'O',
  'LBL_OPENTO_BUTTON_KEY' => 'T',
  'LBL_PERCENTAGE_SYMBOL' => '%',
  'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
  'LBL_QUOTES_SHIP_TO' => 'Quotes Ship to',
  'LBL_REQUIRED_SYMBOL' => '*',
  'LBL_SAVE_BUTTON_KEY' => 'S',
  'LBL_FULL_FORM_BUTTON_KEY' => 'F',
  'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
  'LBL_SEARCH_BUTTON_KEY' => 'Q',
  'LBL_SELECT_BUTTON_KEY' => 'T',
  'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
  'LBL_SELECT_USER_BUTTON_KEY' => 'U',
  'LBL_SQS_INDICATOR' => '',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'NTC_SUPPORT_SUGARCRM' => 'Support the SugarCRM open source project with a donation through PayPal - it\'s fast, free and secure!',
  'NTC_TIME_FORMAT' => '(24:00)',
  'LBL_SAVED_VIEWS' => 'Saved Views',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Сървърът е зает. Моля опитайте по-късно.',
  'LBL_LIST_TEAM' => 'Екип',
  'LBL_TEAM' => 'Екип:',
  'LBL_TEAM_ID' => 'Екип:',
  'ERR_CREATING_FIELDS' => 'Грешка при попълване на допълнителна информация в полетата: ',
  'ERR_CREATING_TABLE' => 'Грешка при създаване на таблица: ',
  'ERR_DELETE_RECORD' => 'Трябва да въведете номер на записа, за да изтриете този контакт.',
  'ERR_EXPORT_DISABLED' => 'Експортирането на данни е забранено.',
  'ERR_EXPORT_TYPE' => 'Грешка при експортиране ',
  'ERR_INVALID_AMOUNT' => 'Моля, въведете валидна сума.',
  'ERR_INVALID_DATE_FORMAT' => 'Форматът на датата трябва да е: ',
  'ERR_INVALID_DATE' => 'Моля, въведете валидна дата.',
  'ERR_INVALID_DAY' => 'Моля, въведете валиден ден.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'невалиден адрес за електронна поща.',
  'ERR_INVALID_HOUR' => 'Моля, въведете валиден час.',
  'ERR_INVALID_MONTH' => 'Моля, въведете валиден месец.',
  'ERR_INVALID_TIME' => 'Моля, въведете валиден час.',
  'ERR_INVALID_YEAR' => 'Моля, въведете валидна година във формат ГГГГ.',
  'ERR_NEED_ACTIVE_SESSION' => 'Необходимо е активна сесия, за да бъде експортирано съдържанието.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Липсва задължително поле:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Липсва задължително поле:',
  'ERR_INVALID_VALUE' => 'Невалидна стойност:',
  'ERR_NOTHING_SELECTED' => 'Моля, маркирайте преди да продължите.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'Сделка с име %s вече съществува.  Моля, въведете име различно от вече съществуващото.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Не е въведено име на сделката.',
  'ERR_SELF_REPORTING' => 'Потребителят не може да докладва сам на себе си.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Няма съвпадения за полето: ',
  'ERR_SQS_NO_MATCH' => 'Няма съвпадения',
  'ERR_PORTAL_LOGIN_FAILED' => 'Не може да се създаде портал потребителска сесия. Моля свържете се с администратора.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Върнете се към <a href="index.php">Началната страница</a>',
  'LBL_ACCOUNT' => 'Организация',
  'LBL_ACCOUNTS' => 'Организации',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Резюме',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Резюме [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Добави [Alt+A]',
  'LBL_ADD_BUTTON' => 'Добави',
  'LBL_ADD_DOCUMENT' => 'Добавяне на документ',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Добави към целева група',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Добави към целева група',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Натиснете за затваряне',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Затвори',
  'LBL_ADDITIONAL_DETAILS' => 'Допълнителни детайли',
  'LBL_ADMIN' => 'Администриране',
  'LBL_ARCHIVE' => 'Архив',
  'LBL_ASSIGNED_TO_USER' => 'Отговорник',
  'LBL_ASSIGNED_TO' => 'Отговорник:',
  'LBL_BACK' => 'Върни',
  'LBL_BUGS' => 'Проблеми',
  'LBL_CALLS' => 'Обаждания',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Изпрати електронните съобщения от опашката',
  'LBL_CANCEL_BUTTON_LABEL' => 'Отмени',
  'LBL_CANCEL_BUTTON_TITLE' => 'Отмени [Alt+X]',
  'LBL_CASE' => 'Казус',
  'LBL_CASES' => 'Казуси',
  'LBL_CHANGE_BUTTON_LABEL' => 'Промени',
  'LBL_CHANGE_BUTTON_TITLE' => 'Промени [Alt+G]',
  'LBL_CHECKALL' => 'Чекирайте всички
',
  'LBL_CLEAR_BUTTON_LABEL' => 'Изчисти',
  'LBL_CLEAR_BUTTON_TITLE' => 'Изчисти [Alt+C]',
  'LBL_CLEARALL' => 'Изчисти всички полета',
  'LBL_CLOSE_WINDOW' => 'Затвори прозореца',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Затвори всичко',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Затвори всичко [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Ново писмо',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Напиши писмо [Alt+L]',
  'LBL_CONTACT_LIST' => 'Списък с контакти:',
  'LBL_CONTACT' => 'Контакт',
  'LBL_CONTACTS' => 'Контакти',
  'LBL_CREATE_BUTTON_LABEL' => 'Създай',
  'LBL_CREATED_BY_USER' => 'Създадено от потребител',
  'LBL_CREATED' => 'Създадено от',
  'LBL_CURRENT_USER_FILTER' => 'Моите записи:',
  'LBL_DATE_ENTERED' => 'Създадено на:',
  'LBL_DATE_MODIFIED' => 'Последно модифицирано:',
  'LBL_DELETE_BUTTON_LABEL' => 'Изтриване',
  'LBL_DELETE_BUTTON_TITLE' => 'Изтрий [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Изтриване',
  'LBL_DELETE' => 'Изтриване',
  'LBL_DELETED' => 'Изтрити',
  'LBL_DIRECT_REPORTS' => 'Докладва на',
  'LBL_DONE_BUTTON_LABEL' => 'Добави',
  'LBL_DONE_BUTTON_TITLE' => 'Съставете [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'Приложението изисква лятното часово време да се приложи. Моля, посетете раздел <a href="index.php?module=Administration&action=DstFix">Системна поддръжка</a> от секция Администриране и изберете Daylight Saving Time fix.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Дублирай',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Дублирай [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Дублирай',
  'LBL_EDIT_BUTTON_LABEL' => 'Редактиране',
  'LBL_EDIT_BUTTON_TITLE' => 'Редактирай [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Редактиране',
  'LBL_VIEW_BUTTON_LABEL' => 'Разгледай',
  'LBL_VIEW_BUTTON_TITLE' => 'Разгледай [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Разгледай',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Изпрати в PDF формат',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Изпрати в PDF формат [Alt+M]',
  'LBL_EMAILS' => 'Електронна поща',
  'LBL_EMPLOYEES' => 'Служители',
  'LBL_ENTER_DATE' => 'Въведи дата',
  'LBL_EXPORT_ALL' => 'Експортирай всичко',
  'LBL_EXPORT' => 'Експортиране',
  'LBL_HIDE' => 'Скрий',
  'LBL_ID' => 'ИД',
  'LBL_IMPORT_PROSPECTS' => 'Импортиране на записи с целеви клиенти',
  'LBL_IMPORT' => 'Импортиране',
  'LBL_LAST_VIEWED' => 'Разгледани записи',
  'LBL_LEADS' => 'Потенциални клиенти',
  'LBL_LIST_ACCOUNT_NAME' => 'Oрганизация',
  'LBL_LIST_ASSIGNED_USER' => 'Потребител',
  'LBL_LIST_CONTACT_NAME' => 'Контакт',
  'LBL_LIST_CONTACT_ROLE' => 'Роля',
  'LBL_LIST_EMAIL' => 'Електронна поща',
  'LBL_LIST_NAME' => 'Име',
  'LBL_LIST_PHONE' => 'Телефон',
  'LBL_LIST_USER_NAME' => 'Потребител',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Сигурни ли сте, че искате да актуализирате целия списък?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Необходимо е да маркирате поне 1 запис, за да продължите.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Текуща страница',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Цял списък',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Маркираните записи',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Маркирани: ',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'Георги',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Иванов',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Г-н',
  'LBL_LOGOUT' => 'Изход',
  'LBL_MAILMERGE' => 'Сливане на писма',
  'LBL_MASS_UPDATE' => 'Масова актуализация',
  'LBL_MEETINGS' => 'Срещи',
  'LBL_MEMBERS' => 'Членове',
  'LBL_MODIFIED_BY_USER' => 'Модифицирано от потребител',
  'LBL_MODIFIED' => 'Модифицирано от',
  'LBL_MY_ACCOUNT' => 'Персонални настройки',
  'LBL_NAME' => 'Име',
  'LBL_NEW_BUTTON_LABEL' => 'Създай',
  'LBL_NEW_BUTTON_TITLE' => 'Създай [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Следваща',
  'LBL_NONE' => '--Няма данни--',
  'LBL_NOTES' => 'Бележки',
  'LBL_OPENALL_BUTTON_LABEL' => 'Отворете всички',
  'LBL_OPENALL_BUTTON_TITLE' => 'Отворете всички [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Отворено за: ',
  'LBL_OPENTO_BUTTON_TITLE' => 'Отворено за: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Възможности',
  'LBL_OPPORTUNITY_NAME' => 'Сделка',
  'LBL_OPPORTUNITY' => 'Свързан с възможност:',
  'LBL_OR' => 'ИЛИ',
  'LBL_PRODUCT_BUNDLES' => 'Продуктов асортимент',
  'LBL_PRODUCTS' => 'Продукти',
  'LBL_PROJECT_TASKS' => 'Задачи по проекта',
  'LBL_PROJECTS' => 'Проекти',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Създай сделка',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Създай сделка [Alt+O]',
  'LBL_QUOTES' => 'Оферти',
  'LBL_RELATED_RECORDS' => 'Свързани записи',
  'LBL_REMOVE' => 'Изтрий',
  'LBL_SAVE_BUTTON_LABEL' => 'Съхрани',
  'LBL_SAVE_BUTTON_TITLE' => 'Съхрани [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Разширен шаблон',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Разширен шаблон [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Съхрани и създай нов запис',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Съхрани и създай нов запис [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Търси',
  'LBL_SEARCH_BUTTON_TITLE' => 'Търси [Alt+Q]',
  'LBL_SEARCH' => 'Търси',
  'LBL_SELECT_BUTTON_LABEL' => 'Избери',
  'LBL_SELECT_BUTTON_TITLE' => 'Избери [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Избери контакт',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Избери контакт [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Избери със справка',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Избери със справка',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Избери потребител',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Избери потребител [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Ресурси, използвани за създаването на текущата страница (заявки, файлове)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'секунди.',
  'LBL_SERVER_RESPONSE_TIME' => 'Време за изпълнение на заявката:',
  'LBL_SHIP_TO_ACCOUNT' => 'Ship to Account
',
  'LBL_SHIP_TO_CONTACT' => 'Ship to Contact
',
  'LBL_SHORTCUTS' => 'Меню',
  'LBL_SHOW' => 'Покажи',
  'LBL_STATUS_UPDATED' => 'Статусът Ви за това събитие бе актуализиран!',
  'LBL_STATUS' => 'Статус:',
  'LBL_SUBJECT' => 'Относно',
  'LBL_SYNC' => 'Синхронизация',
  'LBL_TASKS' => 'Задачи',
  'LBL_TEAMS_LINK' => 'Екип',
  'LBL_THOUSANDS_SYMBOL' => 'хил.',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'хил.',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Създаване на запис за изпратена поща',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Създаване на запис за изпратена електронна поща [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Неправомерен достъп до административен раздел',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Възстанови',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Възстанови [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Възстанови',
  'LBL_UNDELETE' => 'Възстанови',
  'LBL_UNSYNC' => 'Синхронизирай',
  'LBL_UPDATE' => 'Актуализирай',
  'LBL_USER_LIST' => 'Списък с потребители',
  'LBL_USERS_SYNC' => 'Синхронизация на профилите',
  'LBL_USERS' => 'Потребители',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Принтирай в PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Принтирай в PDF [Alt+P]',
  'LNK_ABOUT' => 'За програмата',
  'LNK_ADVANCED_SEARCH' => 'Разширено търсене',
  'LNK_BASIC_SEARCH' => 'Основно',
  'LNK_DELETE_ALL' => 'Изтрий всички',
  'LNK_DELETE' => 'Изтрий',
  'LNK_EDIT' => 'редактирай',
  'LNK_GET_LATEST' => 'Добави на-новите',
  'LNK_GET_LATEST_TOOLTIP' => 'Обнови с последна версия',
  'LNK_HELP' => 'Помощ',
  'LNK_LIST_END' => 'Край',
  'LNK_LIST_NEXT' => 'Следваща',
  'LNK_LIST_PREVIOUS' => 'Предишна',
  'LNK_LIST_RETURN' => 'Връщане към списъка',
  'LNK_LIST_START' => 'Начало',
  'LNK_LOAD_SIGNED' => 'Подпис',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Замени с подписан документ',
  'LNK_PRINT' => 'Печат',
  'LNK_REMOVE' => 'изтрий',
  'LNK_RESUME' => 'Резюме',
  'LNK_VIEW_CHANGE_LOG' => 'Разгледай направените промени',
  'NTC_CLICK_BACK' => 'Натиснете бутонът за предишен екран в браузъра и отстранете проблема.',
  'NTC_DATE_FORMAT' => '(гггг-мм-дд)',
  'NTC_DATE_TIME_FORMAT' => '(гггг-мм-дд 24:00)',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Сигурни ли сте, че искате да изтриете избраните записи?',
  'NTC_DELETE_CONFIRMATION' => 'Сигурни ли сте, че желаете да изтриете този запис?',
  'NTC_LOGIN_MESSAGE' => 'Моля, въведете потребителско име и парола.',
  'NTC_NO_ITEMS_DISPLAY' => 'няма',
  'NTC_REMOVE_CONFIRMATION' => 'Сигурни ли сте, че искате да изтриете тази връзка?',
  'NTC_REQUIRED' => 'Задължителни полета ',
  'NTC_WELCOME' => 'Потребител:',
  'NTC_YEAR_FORMAT' => '(гггг)',
  'LOGIN_LOGO_ERROR' => 'Моля, изтрийте логото на SugarCRM.',
  'ERROR_FULLY_EXPIRED' => 'Лицензът Ви изтича в рамките на 30 дни и следва да се поднови . Достъпът е разрешен единствено за администратора.',
  'ERROR_LICENSE_EXPIRED' => 'Лицензът Ви следва да се актуализира. Достъпът е разрешен единствено за администратора',
  'ERROR_NO_RECORD' => 'Грешка при опит за достъп до записа.  Може да е изтрит или не разполагате с необходимите права за достъп до записа.',
  'LBL_DUP_MERGE' => 'Търсене на дублирани записи',
  'LBL_LOADING' => 'Зарежда се ...',
  'LBL_SAVING_LAYOUT' => 'Запазване на подредбата ...',
  'LBL_SAVED_LAYOUT' => 'Подредбата е запазена.',
  'LBL_SAVED' => 'Запазено',
  'LBL_SAVING' => 'Запазване',
  'LBL_DISPLAY_COLUMNS' => 'Показвани колони',
  'LBL_HIDE_COLUMNS' => 'Скрити колони',
  'LBL_SEARCH_CRITERIA' => 'Съхранени критерии',
  'LBL_NO_RECORDS_FOUND' => '0 намерени записа',
  'LBL_CHANGE_PASSWORD' => 'Смяна на парола',
  'LBL_LOGIN_TO_ACCESS' => 'Моля, авторизирайте се, за достъп до тези записи.',
);


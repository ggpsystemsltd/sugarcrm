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
  'sales_stage_dom' => 
  array (
    'Value Proposition' => 'Value Proposition',
    'Perception Analysis' => 'Perception Analysis',
    'Prospecting' => 'Potentsiaalne klient',
    'Qualification' => 'Kvalifikatsioon',
    'Needs Analysis' => 'Vajab analüüsi',
    'Id. Decision Makers' => 'Otsusetegijate Id',
    'Proposal/Price Quote' => 'Pakkumine/hinnapakkumine',
    'Negotiation/Review' => 'Läbirääkimised/Ülevaade',
    'Closed Won' => 'Suletud võit',
    'Closed Lost' => 'Suletud kaotus',
  ),
  'pricing_formula_dom' => 
  array (
    'PercentageMarkup' => 'Markup over Cost',
    'Fixed' => 'Fikseeritud hind',
    'ProfitMargin' => 'Kasumimarginaal',
    'PercentageDiscount' => 'Allahindlus loendist',
    'IsList' => 'Sama nagu loendis',
  ),
  'quote_stage_dom' => 
  array (
    'Closed Dead' => 'Closed Dead',
    'Draft' => 'Mustand',
    'Negotiation' => 'Läbirääkimine',
    'Delivered' => 'Kohaletoimetatud',
    'On Hold' => 'Ootel',
    'Confirmed' => 'Kinnitatud',
    'Closed Accepted' => 'Sulgemine kinnitatud',
    'Closed Lost' => 'Suletud kaotus',
  ),
  'dom_mailbox_type' => 
  array (
    'bounce' => 'Bounce Handling',
    'pick' => 'Loo [Any]',
    'bug' => 'Loo bugi',
    'support' => 'Loo juhtum',
    'contact' => 'Loo kontakt',
    'sales' => 'Loo müügivihje',
    'task' => 'Loo ülesanne',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    'leastBusy' => 'Least-Busy',
    '' => '--None--',
    'direct' => 'Otsene määramne',
  ),
  'dom_email_errors' => 
  array (
    1 => '1<br />Only select one user when Direct Assigning items.',
    2 => '2<br />You must assign Only Checked Items when Direct Assigning items.',
  ),
  'forecast_type_dom' => 
  array (
    'Rollup' => 'Rollup',
    'Direct' => 'Otsene',
  ),
  'document_subcategory_dom' => 
  array (
    'Marketing Collateral' => 'Marketing Collateral',
    '' => '',
    'Product Brochures' => 'Tootebrožüürid',
    'FAQ' => 'KKK',
  ),
  'dom_meeting_accept_options' => 
  array (
    'tentative' => 'Esialgne',
    'accept' => 'Aktsepteeri',
    'decline' => 'Keeldu',
  ),
  'dom_meeting_accept_status' => 
  array (
    'tentative' => 'Esialgne',
    'none' => 'None',
    'accept' => 'Aktsepteeritud',
    'decline' => 'Tagasilükatud',
  ),
  'prospect_list_type_dom' => 
  array (
    'seed' => 'Seed',
    'exempt_domain' => 'Suppression List - By Domain',
    'exempt_address' => 'Suppression List - By Email Address',
    'exempt' => 'Suppression List - By Id',
    'test' => 'Test',
    'default' => 'Vaikimisi',
  ),
  'checkbox_dom' => 
  array (
    '' => '',
    1 => 'Jah',
    2 => 'Ei',
  ),
  'account_type_dom' => 
  array (
    '' => '',
    'Investor' => 'Investor',
    'Partner' => 'Partner',
    'Analyst' => 'Analüütik',
    'Competitor' => 'Konkurent',
    'Customer' => 'Klient',
    'Integrator' => 'Integraator',
    'Press' => 'Ajakirjandus',
    'Prospect' => 'Potentsiaane klient',
    'Reseller' => 'Edasimüüja',
    'Other' => 'Muu',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Apparel' => 'Rõivatööstus',
    'Banking' => 'Pangandus',
    'Biotechnology' => 'Biotehnoloogia',
    'Chemicals' => 'Kemikaalid',
    'Communications' => 'Kommunikatsioonid',
    'Construction' => 'Ehitus',
    'Consulting' => 'Konsulteerimine',
    'Education' => 'Haridus',
    'Electronics' => 'Elektroonika',
    'Energy' => 'Energia',
    'Engineering' => 'Inseneeria',
    'Entertainment' => 'Meelelahutus',
    'Environmental' => 'Keskkond',
    'Finance' => 'Finants',
    'Government' => 'Valitsus',
    'Healthcare' => 'Tervishoid',
    'Hospitality' => 'Majutus',
    'Insurance' => 'Kindlustus',
    'Machinery' => 'Masinatööstus',
    'Manufacturing' => 'Tootmine',
    'Media' => 'Meedia',
    'Not For Profit' => 'MTÜ',
    'Recreation' => 'Taasloomine',
    'Retail' => 'Jaemüük',
    'Shipping' => 'Tarnimine',
    'Technology' => 'Tehnoloogia',
    'Telecommunications' => 'Telekommunikatsioonid',
    'Transportation' => 'Tratsport',
    'Utilities' => 'Taaskasutus',
    'Other' => 'Teine',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Partner' => 'Partner',
    'Cold Call' => 'Külm kõne',
    'Existing Customer' => 'Olemasolev klient',
    'Self Generated' => 'Iseloodud',
    'Employee' => 'Töötaja',
    'Public Relations' => 'PR',
    'Direct Mail' => 'Otsekiri',
    'Conference' => 'Konverents',
    'Trade Show' => 'Trade show',
    'Web Site' => 'Veebisait',
    'Word of mouth' => 'Suusõnaline teade',
    'Email' => 'E-post',
    'Other' => 'Teine',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Olemasolev äri',
    'New Business' => 'Uus äri',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Esmaotsuse tegija',
    'Business Decision Maker' => 'Äriotsuse tegija',
    'Business Evaluator' => 'Ärihindaja',
    'Technical Decision Maker' => 'Tehnilise otsuse tegija',
    'Technical Evaluator' => 'Tehniline hindaja',
    'Executive Sponsor' => 'Täideviiv sponsor',
    'Influencer' => 'Mõjutaja',
    'Other' => 'Muu',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Esmane kontakt',
    'Alternate Contact' => 'Alternatiivne kontakt',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => 'Net 15',
    'Net 30' => 'Net 30',
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
    'Mr.' => 'Härra',
    'Ms.' => 'Preili',
    'Mrs.' => 'Proua',
    'Dr.' => 'Doktor',
    'Prof.' => 'Professor',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Uus',
    'Assigned' => 'Määratud',
    'In Process' => 'Töös',
    'Converted' => 'Konverteeritud',
    'Recycled' => 'Ümbertöödeldud',
    'Dead' => 'Lõppenud',
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
    'Primary Decision Maker' => 'Esmaotsuse tegija',
    'Business Decision Maker' => 'Äriotsuse tegija',
    'Business Evaluator' => 'Ärihindaja',
    'Technical Decision Maker' => 'Tehnilise otsuse tegija',
    'Technical Evaluator' => 'Tehniline hindaja',
    'Executive Sponsor' => 'Täideviiv sponsor',
    'Influencer' => 'Mõjutaja',
    'Other' => 'Muu',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Aktsepteeritud',
    'Duplicate' => 'Tee koopia',
    'Fixed' => 'Fikseeritud',
    'Out of Date' => 'Aegunud',
    'Invalid' => 'Kehtetu',
    'Later' => 'Hiljem',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Internal' => 'Sisemine',
    'Forum' => 'Foorum',
    'Web' => 'Veeb',
    'InboundEmail' => 'E-post',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'RSS' => 'RSS',
    'Studio' => 'Studio',
    'Accounts' => 'Ettevõtted',
    'Activities' => 'Tegevused',
    'Bug Tracker' => 'Bugi tracker',
    'Calendar' => 'Kalender',
    'Calls' => 'Telefonikõned',
    'Campaigns' => 'Kampaaniad',
    'Cases' => 'Juhtumid',
    'Contacts' => 'Kontaktid',
    'Currencies' => 'Valuutad',
    'Dashboard' => 'Töölaud',
    'Documents' => 'Dokumendid',
    'Emails' => 'E-kirjad',
    'Feeds' => 'Vood',
    'Forecasts' => 'Prognoosid',
    'Help' => 'Abi',
    'Home' => 'Avaleht',
    'Leads' => 'Müügivihjed',
    'Meetings' => 'Kohtumised',
    'Notes' => 'Märkused',
    'Opportunities' => 'Müügivõimalused',
    'Outlook Plugin' => 'Outlook plugin',
    'Product Catalog' => 'Artikli kataloog',
    'Products' => 'Artiklid',
    'Projects' => 'Projektid',
    'Quotes' => 'Pakkumised',
    'Releases' => 'Tooteuuendused',
    'Upgrade' => 'Täienda',
    'Users' => 'Kasutajad',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Planeerimine',
    'Active' => 'Aktiivne',
    'Inactive' => 'Mitteaktiivne',
    'Complete' => 'Lõpetatud',
    'In Queue' => 'Järjekorras',
    'Sending' => 'Saatmine',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Radio' => 'Radio',
    'Telesales' => 'Telemarketing',
    'Mail' => 'Kiri',
    'Email' => 'E-post',
    'Print' => 'Prindi',
    'Web' => 'Veeb',
    'Television' => 'Televisioon',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
    -12 => '(GMT - 12) International Date Line West',
    -11 => '(GMT - 11) Midway Island, Samoa',
    -10 => '(GMT - 10) Hawaii',
    -9 => '(GMT - 9) Alaska',
    -8 => '(GMT - 8) San Francisco',
    -7 => '(GMT - 7) Phoenix',
    -6 => '(GMT - 6) Saskatchewan',
    -5 => '(GMT - 5) New York',
    -4 => '(GMT - 4) Santiago',
    -3 => '(GMT - 3) Buenos Aires',
    -2 => '(GMT - 2) Mid-Atlantic',
    -1 => '(GMT - 1) Azores',
    1 => '(GMT + 1) Madrid',
    2 => '(GMT + 2) Athens',
    3 => '(GMT + 3) Moscow',
    4 => '(GMT + 4) Kabul',
    5 => '(GMT + 5) Ekaterinburg',
    6 => '(GMT + 6) Astana',
    7 => '(GMT + 7) Bangkok',
    8 => '(GMT + 8) Perth',
    9 => '(GMT + 9) Seol',
    10 => '(GMT + 10) Brisbane',
    11 => '(GMT + 11) Solomone Is.',
    12 => '(GMT + 12) Auckland',
  ),
  'dom_cal_month_long' => 
  array (
    8 => 'August',
    9 => 'September',
    11 => 'November',
    1 => 'Jaanuar',
    2 => 'Veebruar',
    3 => 'Märts',
    4 => 'Aprill',
    5 => 'Mai',
    6 => 'Juuni',
    7 => 'Juuli',
    10 => 'Oktoober',
    12 => 'Detsember',
  ),
  'dom_email_server_type' => 
  array (
    '' => '--None--',
    'imap' => 'IMAP',
    'pop3' => 'POP3',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'System Default Mail Client',
    'sugar' => 'SugarCRM Mail Client',
    'mailto' => 'External Mail Client',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Default Email Format',
    'plain' => 'Plain Text Email',
    'html' => 'HTML e-kiri',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Turundus',
    'Knowledege Base' => 'Teadmusbaas',
    'Sales' => 'Müük',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Kirja mestimine',
    'license' => 'Litsentsilepng',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Is',
    'in' => 'is One of',
  ),
  'wflow_source_type_dom' => 
  array (
    'System Default' => 'System Default',
    'Normal Message' => 'Tavaline sõnum',
    'Custom Template' => 'Kohandatud mall',
  ),
  'dom_timezones_extra' => 
  array (
    -12 => '(GMT-12) International Date Line West',
    -11 => '(GMT-11) Midway Island, Samoa',
    -10 => '(GMT-10) Hawaii',
    -9 => '(GMT-9) Alaska',
    -8 => '(GMT-8) (PST)',
    -7 => '(GMT-7) (MST)',
    -6 => '(GMT-6) (CST)',
    -5 => '(GMT-5) (EST)',
    -4 => '(GMT-4) Santiago',
    -3 => '(GMT-3) Buenos Aires',
    -2 => '(GMT-2) Mid-Atlantic',
    -1 => '(GMT-1) Azores',
    1 => '(GMT+1) Madrid',
    2 => '(GMT+2) Athens',
    3 => '(GMT+3) Moscow',
    4 => '(GMT+4) Kabul',
    5 => '(GMT+5) Ekaterinburg',
    6 => '(GMT+6) Astana',
    7 => '(GMT+7) Bangkok',
    8 => '(GMT+8) Perth',
    9 => '(GMT+9) Seol',
    10 => '(GMT+10) Brisbane',
    11 => '(GMT+11) Solomone Is.',
    12 => '(GMT+12) Auckland',
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
    'active' => 'Aktiivne',
    'inactive' => 'Mitteaktiivne',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Sõnum saadetud/üritatud',
    'send error' => 'Tõrjutud sõnumid, teine',
    'invalid email' => 'Tõrjutud sõnumid, kehtetu e-post',
    'link' => 'Klikipõhine link',
    'viewed' => 'Vaadatud sõnum',
    'removed' => 'Väljavalitud',
    'lead' => 'Müügivihjeid loodud',
    'contact' => 'Kontakte loodud',
  ),
  'language_pack_name' => 'US Inglise keel',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Pakkumised',
  'moduleList' => 
  array (
    'Home' => 'Avaleht',
    'Bugs' => 'Bugi tracker',
    'Cases' => 'Juhtumid',
    'Notes' => 'Märkused',
    'Newsletters' => 'Uudiskirjad',
    'Teams' => 'Meeskonnad',
    'Users' => 'Kasutajad',
    'KBDocuments' => 'Teadmusbaas',
    'FAQ' => 'KKK',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Avaleht',
    'Bugs' => 'Bugi',
    'Cases' => 'Juhtum',
    'Notes' => 'Märkus',
    'Teams' => 'Meeskond',
    'Users' => 'Kasutaja',
  ),
  'activity_dom' => 
  array (
    'Call' => 'Telefonikõne',
    'Meeting' => 'Kohtumine',
    'Task' => 'Ülesanne',
    'Email' => 'E-post',
    'Note' => 'Märkus',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minut varem',
    300 => '5 minutit varem',
    600 => '10 minutit varem',
    900 => '15 minutit varem',
    1800 => '30 minutit varem',
    3600 => '1 tund varem',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Kõrge',
    'Medium' => 'Keskmine',
    'Low' => 'Madal',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Pole alustatud',
    'In Progress' => 'Töös',
    'Completed' => 'Lõpetatud',
    'Pending Input' => 'Ootel sisend',
    'Deferred' => 'Edasilükatud',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Kavandatud',
    'Held' => 'Toimunud',
    'Not Held' => 'Mittetoimunud',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Kavandatud',
    'Held' => 'Toimunud',
    'Not Held' => 'Mittetoimunud',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Sissetulev',
    'Outbound' => 'Väljaminev',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Uus',
    'Assigned' => 'Määratud',
    'In Process' => 'Töös',
    'Converted' => 'Konverteeritud',
    'Recycled' => 'Ümbertöödeldud',
    'Dead' => 'Lõppenud',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Uus',
    'Assigned' => 'Määratud',
    'Closed' => 'Suletud',
    'Pending Input' => 'Ootel sisend',
    'Rejected' => 'Tagasilükatud',
    'Duplicate' => 'Tee koopia',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Kõrge',
    'P2' => 'Keskmine',
    'P3' => 'Madal',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Aktiivne',
    'Inactive' => 'Mitteaktiivne',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Aktiivne',
    'Terminated' => 'Lõpetatud',
    'Leave of Absence' => 'Puhkusel',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Kõrge',
    'Medium' => 'Keskmine',
    'Low' => 'Madal',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Pole alustatud',
    'In Progress' => 'Töös',
    'Completed' => 'Lõpetatud',
    'Pending Input' => 'Ootel sisend',
    'Deferred' => 'Edasilükatud',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Ettevõte',
    'Opportunities' => 'Müügivõimalus',
    'Cases' => 'Juhtum',
    'Leads' => 'Müügivihje',
    'Contacts' => 'Kontaktid',
    'ProductTemplates' => 'Artikkel',
    'Quotes' => 'Pakkumine',
    'Bugs' => 'Bugi',
    'Project' => 'Projekt:',
    'ProjectTask' => 'Projekti ülesanne',
    'Tasks' => 'Ülesanne',
  ),
  'record_type_display_notes' => 
  array (
    'Accounts' => 'Ettevõte',
    'Contacts' => 'Kontakt',
    'Opportunities' => 'Müügivõimalus',
    'Cases' => 'Juhtum',
    'Leads' => 'Müügivihje',
    'ProductTemplates' => 'Artikkel',
    'Quotes' => 'Pakkumine',
    'Products' => 'Artikkel',
    'Contracts' => 'Leping',
    'Bugs' => 'Bugi',
    'Emails' => 'E-kiri',
    'Project' => 'Projekt',
    'ProjectTask' => 'Projekti ülesanne',
    'Meetings' => 'Kohtumine',
    'Calls' => 'Telefonikõne',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Pakkumine',
    'Orders' => 'Tellitud',
    'Ship' => 'Tarnitud',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'Laos',
    'Unavailable' => 'Laost otsas',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Maksustatav',
    'Non-Taxable' => 'Mittemaksustatav',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Kuus kuud',
    '+1 year' => 'Üks aasta',
    '+2 years' => 'Kaks aastat',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Pakkumine',
    'Orders' => 'Tellimus',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Ootel',
    'Confirmed' => 'Kinnitatud',
    'On Hold' => 'Ootel',
    'Shipped' => 'Tarnitud',
    'Cancelled' => 'Tühistatud',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Pakkumine',
    'Invoice' => 'Arve',
    'Terms' => 'Maksetingimused',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Kiire',
    'High' => 'Kõrge',
    'Medium' => 'Keskmine',
    'Low' => 'Madal',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Uus',
    'Assigned' => 'Määratud',
    'Closed' => 'Suletud',
    'Pending' => 'Ootel',
    'Rejected' => 'Tagasilükatud',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Viga',
    'Feature' => 'Funktsioon',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Read ja veerud',
    'summary' => 'Summeerimine',
    'detailed_summary' => 'Summeerimine üksikasjadega',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Saadetud',
    'archived' => 'Arhiveeritud',
    'draft' => 'Mustand',
    'inbound' => 'Sissetulev',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Arhiveeritud',
    'closed' => 'Suletud',
    'draft' => 'Mustandis',
    'read' => 'Loe',
    'replied' => 'Vastatud',
    'sent' => 'Saadetud',
    'send_error' => 'Saada veateade',
    'unread' => 'Lugemata',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Jah',
    'bool_false' => 'Ei',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Jah',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Jah',
    'off' => 'Ei',
    '' => 'Ei',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Viimne käivitusaeg. Pole läbiviidud.',
    'ready' => 'Valmis',
    'in progress' => 'Töös',
    'failed' => 'Ebaõnnestunud',
    'completed' => 'Lõpetatud',
    'no curl' => 'Ei käivitu: URL-i pole saadaval',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Aktiivne',
    'Inactive' => 'Mitteaktiivne',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Aktiivne',
    'Draft' => 'Mustand',
    'FAQ' => 'KKK',
    'Expired' => 'Aegunud',
    'Under Review' => 'Ülevaatamisel',
    'Pending' => 'Ootel',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Pluss',
    '-' => '(-) Miinus',
    '*' => '(X) Korrutatud',
    '/' => '(/) Jagatud',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'Kui kirje on salvestatud',
    'Time' => 'Kui aeg möödub',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Võrdsed',
    'Does not Equal' => 'Ei ole võrdne',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Võrdsed',
    'Less Than' => 'Vähem kui',
    'More Than' => 'Rohkem kui',
    'Does not Equal' => 'Ei ole võrdne',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Jah',
    'bool_false' => 'Ei',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Võrdsed',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 tundi',
    28800 => '8 tundi',
    43200 => '12 tundi',
    86400 => '1 päev',
    172800 => '2 päeva',
    259200 => '3 päeva',
    345600 => '4 päeva',
    432000 => '5 päeva',
    604800 => '1 nädal',
    1209600 => '2 nädalat',
    1814400 => '3 nädalat',
    2592000 => '30 päeva',
    5184000 => '60 päeva',
    7776000 => '90 päeva',
    10368000 => '120 päeva',
    12960000 => '150 päeva',
    15552000 => '180 päeva',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'oli rohkem kui',
    'Less Than' => 'on vähem kui',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'E-post',
    'Invite' => 'Kutsu',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Sisselogitud kasutajad',
    'rel_user' => 'Seotud kasutajad',
    'rel_user_custom' => 'Seotud kohandatud kasutaja',
    'specific_team' => 'Teatud meeskond',
    'specific_role' => 'Teatud roll',
    'specific_user' => 'Teatud kasutaja',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Uus väärtus',
    'past' => 'Eelmine väärtus',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Kasutaja',
    'Manager' => 'Kasutajate haldus',
  ),
  'wflow_address_type_dom' => 
  array (
    'to' => 'Kellele:',
    'cc' => 'Koopia:',
    'bcc' => 'Pimekoopia:',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'to' => 'Kellele:',
    'cc' => 'Koopia:',
    'bcc' => 'Pimekoopia:',
    'invite_only' => '(ainult kutsu)',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Kellele:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Uuenda kirje',
    'update_rel' => 'Uuenda seotud kirje',
    'new' => 'Uus kirje',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Käivitus kuupäev',
    'Existing Value' => 'Olemasolev väärtus',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Põhisuvandid',
    'Advanced' => 'Laiendatud suvandid',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Käivitatud kirje määratud kasutaja',
    'modified_user_id' => 'Kasutaja, kes muutis viimati käivitatud kirjet',
    'created_by' => 'Kasutaja, kes lõi käivitatud kirje',
    'current_user' => 'Sisselogitud kasutaja',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Käivitatud kirje praegune meeskond',
    'current_team' => 'Sisselogitud kasutaja meeskond',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Nihuta rippmenüü tagasi',
    'advance' => 'Nihuta rippmenüü edasi',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Uued ja olemasolevad kirjed',
    'New' => 'Ainult uued kirjed',
    'Update' => 'Olemasolevad kirjed ainult',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Kõik seotud',
    'filter' => 'Seotud filter',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'Kõik seotud',
    'any' => 'iga seotud',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Teavitused siis Tegevused',
    'actions_alerts' => 'Tegevused siis Teavitused',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Kontaktid',
    'Users' => 'Kasutajad',
    'Prospects' => 'Eesmärgid',
    'Leads' => 'Müügivihjed',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Pole alustatud',
    'inprogress' => 'Töös',
    'signed' => 'Allakirjastatud',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Igakuiselt',
    'quarterly' => 'Kvartaalselt',
    'halfyearly' => 'Kord poolaastas',
    'yearly' => 'Kord aastas',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 päev',
    3 => '3 päeva',
    5 => '5 päeva',
    7 => '1 nädal',
    14 => '2 päeva',
    21 => '3 päeva',
    31 => '1 kuu',
  ),
);

$app_strings = array (
  'LBL_SHIP_TO_ACCOUNT' => 'Ship to Account',
  'LBL_SHIP_TO_CONTACT' => 'Ship to Contact',
  'LBL_UNSYNC' => 'Desüngi',
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ADMIN' => 'Admin',
  'LBL_ALT_HOT_KEY' => 'Alt+',
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
  'LBL_ID' => 'ID',
  'LBL_LIST_OF' => 'of',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'John',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Doe',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Mr.',
  'LBL_MAILMERGE_KEY' => 'M',
  'LBL_NEW_BUTTON_KEY' => 'N',
  'LBL_NONE' => '--None--',
  'LBL_OPENALL_BUTTON_KEY' => 'O',
  'LBL_OPENTO_BUTTON_KEY' => 'T',
  'LBL_OR' => 'OR',
  'LBL_PERCENTAGE_SYMBOL' => '%',
  'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
  'LBL_REQUIRED_SYMBOL' => '*',
  'LBL_SAVE_BUTTON_KEY' => 'S',
  'LBL_FULL_FORM_BUTTON_KEY' => 'F',
  'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
  'LBL_SEARCH_BUTTON_KEY' => 'Q',
  'LBL_SELECT_BUTTON_KEY' => 'T',
  'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
  'LBL_SELECT_USER_BUTTON_KEY' => 'U',
  'LBL_SQS_INDICATOR' => '',
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
  'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_YEAR_FORMAT' => '(yyyy)',
  'LBL_LIST_TEAM' => 'Meeskond',
  'LBL_TEAM' => 'Meeskond:',
  'LBL_TEAM_ID' => 'Meeskonna ID:',
  'ERR_CREATING_FIELDS' => 'Viga lisainfo väljade täitmisel:',
  'ERR_CREATING_TABLE' => 'Viga tabeli loomisel.',
  'ERR_DELETE_RECORD' => 'Kontakti kustutamiseks täpsusta kirje numbrit.',
  'ERR_EXPORT_DISABLED' => 'Eksport mittelubatud.',
  'ERR_EXPORT_TYPE' => 'Viga eksportimisel',
  'ERR_INVALID_AMOUNT' => 'Palun sisesta kehtiv kogus',
  'ERR_INVALID_DATE_FORMAT' => 'Kuupäeva formaat peab olema:',
  'ERR_INVALID_DATE' => 'Palun sisesta kehtiv kuupäev.',
  'ERR_INVALID_DAY' => 'Palun sisesta kehtiv päev.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'mittekehtiv e-posti aadress.',
  'ERR_INVALID_HOUR' => 'Palun sisesta kehtiv tund.',
  'ERR_INVALID_MONTH' => 'Palun sisesta kehtiv kuu.',
  'ERR_INVALID_TIME' => 'Palun sisesta kehtiv aeg.',
  'ERR_INVALID_YEAR' => 'Palun sisesta kehtiv 4 digit aasta.',
  'ERR_NEED_ACTIVE_SESSION' => 'Nõutav on aktiivne sessioon sisu eksportimiseks.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Puuduv nõutud väli:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Kehtetu nõutud väli:',
  'ERR_INVALID_VALUE' => 'Kehtetu väärtus:',
  'ERR_NOTHING_SELECTED' => 'Enne jätkamist tee palun valik.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'Müügivõimalus nimega %s juba eksisteerib. Palun sisesta teine nimi allpool.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Müügivõimaluse nime ei sisestatud. Palun sisesta müügivõimaluse nimi allpool.',
  'ERR_SELF_REPORTING' => 'Kasutaja ei saa olla aruandev iseendale.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Välja jaoks pole vastet:',
  'ERR_SQS_NO_MATCH' => 'Vastet pole',
  'ERR_PORTAL_LOGIN_FAILED' => 'Ei saa luua portaali sisselogimissessiooni. Palun kontakteeru administraatoriga.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Tagasi Avalehele',
  'LBL_ACCOUNT' => 'Ettevõte',
  'LBL_ACCOUNTS' => 'Ettevõtted',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Vaata kokkuvõtet',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Vaata kokkuvõtet [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Lisa [Alt+A]',
  'LBL_ADD_BUTTON' => 'Lisa',
  'LBL_ADD_DOCUMENT' => 'Lisa dokument',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Lisa Eesmärgiloendisse',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Lisa Eesmärgiloendisse',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Kliki sulgemiseks',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Sulge',
  'LBL_ADDITIONAL_DETAILS' => 'Lisainfo',
  'LBL_ARCHIVE' => 'Arhiiv',
  'LBL_ASSIGNED_TO_USER' => 'Määratud kasutaja',
  'LBL_ASSIGNED_TO' => 'Vastutaja:',
  'LBL_BACK' => 'Tagasi',
  'LBL_BILL_TO_ACCOUNT' => 'Arve ettevõte',
  'LBL_BILL_TO_CONTACT' => 'Arve saaja kontakt',
  'LBL_BUGS' => 'Bugid',
  'LBL_CALLS' => 'Telefonikõned',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Saada ootel kampaania e-kirjad',
  'LBL_CANCEL_BUTTON_LABEL' => 'Tühista',
  'LBL_CANCEL_BUTTON_TITLE' => 'Tühista [Alt+X]',
  'LBL_CASE' => 'Juhtum',
  'LBL_CASES' => 'Juhtumid',
  'LBL_CHANGE_BUTTON_LABEL' => 'Muuda',
  'LBL_CHANGE_BUTTON_TITLE' => 'Muuda [Alt+G]',
  'LBL_CHECKALL' => 'Kontrolli kõik',
  'LBL_CLEAR_BUTTON_LABEL' => 'Tühjenda',
  'LBL_CLEAR_BUTTON_TITLE' => 'Tühjenda [Alt+C]',
  'LBL_CLEARALL' => 'Tühjenda kõik',
  'LBL_CLOSE_WINDOW' => 'Sulge aken',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Sulge kõik',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Sulge kõik [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Koosta e-kiri',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Koosta e-kiri [Alt+L]',
  'LBL_CONTACT_LIST' => 'Kontaktiloend',
  'LBL_CONTACT' => 'Kontakt',
  'LBL_CONTACTS' => 'Kontaktid',
  'LBL_CREATE_BUTTON_LABEL' => 'Loo',
  'LBL_CREATED_BY_USER' => 'Looja',
  'LBL_CREATED' => 'Loodud',
  'LBL_CURRENT_USER_FILTER' => 'Ainult minu ühikud:',
  'LBL_DATE_ENTERED' => 'Loomiskuupäev:',
  'LBL_DATE_MODIFIED' => 'Viimati muudetud:',
  'LBL_DELETE_BUTTON_LABEL' => 'Kustuta',
  'LBL_DELETE_BUTTON_TITLE' => 'Kustuta [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Kustuta',
  'LBL_DELETE' => 'Kustuta',
  'LBL_DELETED' => 'Kustutatud',
  'LBL_DIRECT_REPORTS' => 'Otsesed aruanded',
  'LBL_DONE_BUTTON_LABEL' => 'Tehtud',
  'LBL_DONE_BUTTON_TITLE' => 'Tehtud [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'The application requires a Daylight Saving Time fix to be applied. Please go to the Repair link in the Admin console and apply the Daylight Saving Time fix.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Tee koopia',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Tee koopia [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Tee koopia',
  'LBL_EDIT_BUTTON_LABEL' => 'Muuda',
  'LBL_EDIT_BUTTON_TITLE' => 'Muuda[Alt+E]',
  'LBL_EDIT_BUTTON' => 'Muuda',
  'LBL_VIEW_BUTTON_LABEL' => 'Vaata',
  'LBL_VIEW_BUTTON_TITLE' => 'Vaata [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Vaata',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Saada PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Saada PDF [Alt+M]',
  'LBL_EMAILS' => 'E-kirjad',
  'LBL_EMPLOYEES' => 'Töötajad',
  'LBL_ENTER_DATE' => 'Sisesta kuupäev',
  'LBL_EXPORT_ALL' => 'Ekspordi kõik',
  'LBL_EXPORT' => 'Ekspordi',
  'LBL_HIDE' => 'Peida',
  'LBL_IMPORT_PROSPECTS' => 'Impordi eesmärgid',
  'LBL_IMPORT' => 'Impordi',
  'LBL_LAST_VIEWED' => 'Viimati vaadatud',
  'LBL_LEADS' => 'Müügivihjed',
  'LBL_LIST_ACCOUNT_NAME' => 'Ettevõtte nimi',
  'LBL_LIST_ASSIGNED_USER' => 'Kasutaja',
  'LBL_LIST_CONTACT_NAME' => 'Kontaktisiku nimi',
  'LBL_LIST_CONTACT_ROLE' => 'Kontakti roll',
  'LBL_LIST_EMAIL' => 'E-post',
  'LBL_LIST_NAME' => 'Nimi',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_USER_NAME' => 'Kasutajanimi',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Kas oled kindel, et soovid kogu loendi värskendamist?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Palun vali jätkamiseks vähemalt 1 kirje.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Käesolev leht',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Kogu loend',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Vali kirjed',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Valitud:',
  'LBL_LOGOUT' => 'Logi välja',
  'LBL_MAILMERGE' => 'Kirja mestimine',
  'LBL_MASS_UPDATE' => 'Mass uuendamine',
  'LBL_MEETINGS' => 'Kohtumised',
  'LBL_MEMBERS' => 'Liikmed',
  'LBL_MODIFIED_BY_USER' => 'Muudetud kasutaja poolt',
  'LBL_MODIFIED' => 'Muutja',
  'LBL_MY_ACCOUNT' => 'Minu konto',
  'LBL_NAME' => 'Nimi',
  'LBL_NEW_BUTTON_LABEL' => 'Loo',
  'LBL_NEW_BUTTON_TITLE' => 'Loo [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Edasi',
  'LBL_NOTES' => 'Märkused',
  'LBL_OPENALL_BUTTON_LABEL' => 'Ava kõik',
  'LBL_OPENALL_BUTTON_TITLE' => 'Ava kõik [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Ava:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Ava: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Müügivõimalused',
  'LBL_OPPORTUNITY_NAME' => 'Müügivõimaluse nimi',
  'LBL_OPPORTUNITY' => 'Müügivõimalus',
  'LBL_PRODUCT_BUNDLES' => 'Toodete komplekt',
  'LBL_PRODUCTS' => 'Artiklid',
  'LBL_PROJECT_TASKS' => 'Projekti ülesanded',
  'LBL_PROJECTS' => 'Projektid',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Loo pakkumisest müügivõimalus',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Loo pakkumisest müügivõimalus [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Pakkumise saaja',
  'LBL_QUOTES' => 'Pakkumised',
  'LBL_RELATED_RECORDS' => 'Seotud kirjed',
  'LBL_REMOVE' => 'Eemalda',
  'LBL_SAVE_BUTTON_LABEL' => 'Salvesta',
  'LBL_SAVE_BUTTON_TITLE' => 'Salvesta [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Täisvorm',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Täisvorm [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Salvesta ja loo uus',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Salvesta ja loo uus [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Otsi',
  'LBL_SEARCH_BUTTON_TITLE' => 'Otsi [Alt+Q]',
  'LBL_SEARCH' => 'Otsi',
  'LBL_SELECT_BUTTON_LABEL' => 'Valitud',
  'LBL_SELECT_BUTTON_TITLE' => 'Vali [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Vali kontakt',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Vali kontakt [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Vali aruannetest',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Vali aruanded',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Vali kasutaja',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Vali kasutaja [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Ressurssid on kasutatud selle lehe ülesehitamiseks (päringud, falid)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'sekundit.',
  'LBL_SERVER_RESPONSE_TIME' => 'Serveri reaktsiooniaeg:',
  'LBL_SHORTCUTS' => 'Otseteed',
  'LBL_SHOW' => 'Näita',
  'LBL_STATUS_UPDATED' => 'Sinu olek selle sündmuse jaoks on uuendatud!',
  'LBL_STATUS' => 'Olek:',
  'LBL_SUBJECT' => 'Teema',
  'LBL_SYNC' => 'Sünkimine',
  'LBL_TASKS' => 'Ülesanded',
  'LBL_TEAMS_LINK' => 'Meeskond',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arhiveeri e-kiri',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arhiveeri e-kiri [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Autoriseerimata sissepääs administratsiooni',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Taasta',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Taasta [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Taasta',
  'LBL_UNDELETE' => 'Taasta',
  'LBL_UPDATE' => 'Uuenda',
  'LBL_USER_LIST' => 'Kasutajaloend',
  'LBL_USERS_SYNC' => 'Kasutajate sünkimine',
  'LBL_USERS' => 'Kasutajad',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Prindi PDF failina',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Prindi PDF [Alt+P]',
  'LNK_ABOUT' => 'Meist',
  'LNK_ADVANCED_SEARCH' => 'Laiendatud',
  'LNK_BASIC_SEARCH' => 'Algne',
  'LNK_DELETE_ALL' => 'kustuta kõik',
  'LNK_DELETE' => 'kustuta',
  'LNK_EDIT' => 'muuda',
  'LNK_GET_LATEST' => 'Hangi viimased',
  'LNK_GET_LATEST_TOOLTIP' => 'Asenda viimase versiooniga',
  'LNK_HELP' => 'Abi',
  'LNK_LIST_END' => 'Lõpp',
  'LNK_LIST_NEXT' => 'Järgmine',
  'LNK_LIST_PREVIOUS' => 'Eelmine',
  'LNK_LIST_RETURN' => 'Tagasi loendisse',
  'LNK_LIST_START' => 'Alusta',
  'LNK_LOAD_SIGNED' => 'Allkirjasta',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Asenda allakirjutatud dokumendiga',
  'LNK_PRINT' => 'Prindi',
  'LNK_REMOVE' => 'eemalda',
  'LNK_RESUME' => 'Resümee',
  'LNK_VIEW_CHANGE_LOG' => 'Vaata muudatuste logi',
  'NTC_CLICK_BACK' => 'Palun kliki lehitseja Tagasi klahvi ja paarnda viga.',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Kas oled kindel, et soovid kustutada valitud kirje(d)?',
  'NTC_DELETE_CONFIRMATION' => 'Kas oled kindel, et soovid seda kirjet kustutada?',
  'NTC_LOGIN_MESSAGE' => 'Palun sisesta oma kasutajanimi ja parool:',
  'NTC_NO_ITEMS_DISPLAY' => 'ühtegi',
  'NTC_REMOVE_CONFIRMATION' => 'Kas oled kindel, et soovid selle seose eemaldada?',
  'NTC_REQUIRED' => 'Tähistab nõutud välja',
  'NTC_SUPPORT_SUGARCRM' => 'Toeta the SugarCRM avatud platvormi annetusega läbi PayPal-i - see on kiire, tasuta ja kindel!',
  'NTC_WELCOME' => 'Teretulemast',
  'LOGIN_LOGO_ERROR' => 'Palun asenda SugarCRM logod.',
  'ERROR_FULLY_EXPIRED' => 'Sinu ettevõtte SugarCRM litsents on enam kui 30 päeva aegunud ja vajab uuendamist. Ainult adminid saavad sisselogida.',
  'ERROR_LICENSE_EXPIRED' => 'Sinu ettevõtte SugarCRM litsents vajab uuendamist. Ainult adminid saavad sisselogida.',
  'ERROR_NO_RECORD' => 'Viga kirje leidmisel. See kirje võib olla kustutatud või sul pole selle vaatamiseks ligipääsu.',
  'LBL_DUP_MERGE' => 'Leia koopiad',
  'LBL_LOADING' => 'Laadimine...',
  'LBL_SAVING_LAYOUT' => 'Paigutuse salvestamine...',
  'LBL_SAVED_LAYOUT' => 'Paigutus on salvestatud.',
  'LBL_SAVED' => 'Salvestatud',
  'LBL_SAVING' => 'Salvestamine',
  'LBL_DISPLAY_COLUMNS' => 'Kuva veerud',
  'LBL_HIDE_COLUMNS' => 'Peida veerud',
  'LBL_SEARCH_CRITERIA' => 'Otsingu kriteeriumid',
  'LBL_SAVED_VIEWS' => 'Salvestatud vaatamised',
  'LBL_NO_RECORDS_FOUND' => '- 0 Kirjet leitud -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Server on liiga hõivatud. Palun proovi hiljem uuesti.',
  'LBL_CHANGE_PASSWORD' => 'Muuda parooli.',
  'LBL_LOGIN_TO_ACCESS' => 'Palun logi sisse siia alasse sisenemiseks.',
);


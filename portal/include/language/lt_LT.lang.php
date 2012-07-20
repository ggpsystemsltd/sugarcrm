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
  'industry_dom' => 
  array (
    '' => '',
    'Apparel' => 'Drabužiai',
    'Banking' => 'Bankai',
    'Biotechnology' => 'Biotechnologijos',
    'Chemicals' => 'Chemija',
    'Communications' => 'Ryšiai',
    'Construction' => 'Statybos',
    'Consulting' => 'Konsultavimas',
    'Education' => 'Švietimas',
    'Electronics' => 'Elektronika',
    'Energy' => 'Energetika',
    'Engineering' => 'Inžinerija',
    'Entertainment' => 'Pramogos',
    'Environmental' => 'Aplinkosauga',
    'Finance' => 'Finansai',
    'Government' => 'Vyriausybė',
    'Healthcare' => 'Gydymas',
    'Hospitality' => 'Apgyvendinimas',
    'Insurance' => 'Draudimas',
    'Machinery' => 'Technika',
    'Manufacturing' => 'Gamyba',
    'Media' => 'Žiniasklaida',
    'Not For Profit' => 'Ne pelno',
    'Recreation' => 'Poilsis',
    'Retail' => 'Mažmeninė prekyba',
    'Shipping' => 'Laivyba',
    'Technology' => 'Technologijos',
    'Telecommunications' => 'Telekomunikacijos',
    'Transportation' => 'Transportavimas',
    'Utilities' => 'Komunalinės paslaugos',
    'Other' => 'Kita',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Cold Call' => 'Aktyvūs pardavimai',
    'Existing Customer' => 'Esamas klientas',
    'Self Generated' => 'Pats kreipėsi',
    'Employee' => 'Darbuotojai',
    'Partner' => 'Partneris',
    'Public Relations' => 'Viešieji ryšiai',
    'Direct Mail' => 'Tiesioginis paštas',
    'Conference' => 'Konferencija',
    'Trade Show' => 'Paroda',
    'Web Site' => 'Tinklapis',
    'Word of mouth' => 'Rekomendacija',
    'Email' => 'El. laiškas',
    'Other' => 'Kita',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Esamas verslas',
    'New Business' => 'Naujas verslas',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Pagrindinis sprendimo priėmėjas',
    'Business Decision Maker' => 'Verslo sprendimo priėmėjas',
    'Business Evaluator' => 'Verslo įvertintojas',
    'Technical Decision Maker' => 'Techninio sprendimo priėmėjas',
    'Technical Evaluator' => 'Techninis įvertintojas',
    'Executive Sponsor' => 'Vadovaujantis rėmėjas',
    'Influencer' => 'Įtakotojas',
    'Other' => 'Kita',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Pirminis kontaktas',
    'Alternate Contact' => 'Alternatyvus kontaktas',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => '15 d.',
    'Net 30' => '30 d.',
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
    'Mr.' => 'Gerbiamas',
    'Ms.' => 'Gerbiama',
    'Dr.' => 'Dr.',
    'Prof.' => 'Prof.',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Naujas',
    'Assigned' => 'Priskirtas',
    'In Process' => 'Progrese',
    'Converted' => 'Konvertuotas',
    'Recycled' => 'Atnaujintas',
    'Dead' => 'Netinkamas',
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
  'pricing_formula_dom' => 
  array (
    'PercentageMarkup' => 'Markup over Cost',
    'Fixed' => 'Nustatytas',
    'ProfitMargin' => 'Pelno marža',
    'PercentageDiscount' => 'Nuolaida nuo kainos',
    'IsList' => 'Ta pati kaip kainos',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Pagrindinis sprendimo priėmėjas',
    'Business Decision Maker' => 'Verslo sprendimo priėmėjas',
    'Business Evaluator' => 'Verslo įvertintojas',
    'Technical Decision Maker' => 'Techninis sprendimo priėmėjas',
    'Technical Evaluator' => 'Techninis įvertintojas',
    'Executive Sponsor' => 'Vadovaujantis rėmėjas',
    'Influencer' => 'Įtakotojas',
    'Other' => 'Kita',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Priimtas',
    'Duplicate' => 'Dublikatas',
    'Fixed' => 'Pataisytas',
    'Out of Date' => 'Pasenęs',
    'Invalid' => 'Neteisingas',
    'Later' => 'Vėliau',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Internal' => 'Vidinis',
    'Forum' => 'Forumas',
    'Web' => 'Tinklalapis',
    'InboundEmail' => 'Paštas',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'RSS' => 'RSS',
    'Accounts' => 'Klientai',
    'Activities' => 'Priminimai',
    'Bug Tracker' => 'Klaidos',
    'Calendar' => 'Kalendorius',
    'Calls' => 'Skambučiai',
    'Campaigns' => 'Kampanijos',
    'Cases' => 'Aptarnavimai',
    'Contacts' => 'Kontaktai',
    'Currencies' => 'Valiutos',
    'Dashboard' => 'Prietaisų skydas',
    'Documents' => 'Dokumentai',
    'Emails' => 'Laiškai',
    'Feeds' => 'Naujienos',
    'Forecasts' => 'Prognozės',
    'Help' => 'Pagalba',
    'Home' => 'Pradžia',
    'Leads' => 'Potencialus kontaktas',
    'Meetings' => 'Susitikimas',
    'Notes' => 'Užrašai',
    'Opportunities' => 'Pardavimai',
    'Outlook Plugin' => 'Outlook įskiepis',
    'Product Catalog' => 'Prekių katalogas',
    'Products' => 'Prekės',
    'Projects' => 'Projektai',
    'Quotes' => 'Pasiūlymai',
    'Releases' => 'Išleidimai',
    'Studio' => 'Studija',
    'Upgrade' => 'Atnaujinimai',
    'Users' => 'Vartotojai',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Planuojamas',
    'Active' => 'Aktyvus',
    'Inactive' => 'Neaktyvus',
    'Complete' => 'Užbaigtas',
    'In Queue' => 'Laukia eilėje',
    'Sending' => 'Siunčiamas',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Telesales' => 'Telepardavimai',
    'Mail' => 'Laiškas',
    'Email' => 'El. laiškas',
    'Print' => 'Spauda',
    'Web' => 'Tinklalapis',
    'Radio' => 'Radijas',
    'Television' => 'Televizija',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
    -12 => '(GMT - 12) International Date Line West',
    -9 => '(GMT - 9) Alaska',
    -7 => '(GMT - 7) Phoenix',
    -6 => '(GMT - 6) Saskatchewan',
    -2 => '(GMT - 2) Mid-Atlantic',
    6 => '(GMT + 6) Astana',
    12 => '(GMT + 12) Auckland',
    -11 => '(GMT - 11) Midvėjaus salos,  Samoa',
    -10 => '(GMT - 10) Havajai',
    -8 => '(GMT - 8) San Franciskas',
    -5 => '(GMT - 5) Niujorkas',
    -4 => '(GMT - 4) Santjagas',
    -3 => '(GMT - 3) Buenos Airės',
    -1 => '(GMT - 1) Azorų',
    1 => '(GMT + 1) Madridas',
    2 => '(GMT + 2) Atėnai',
    3 => '(GMT + 3) Maskva',
    4 => '(GMT + 4) Kabulas',
    5 => 'GMT + 5) Jekaterinburgas',
    7 => '(GMT + 7) Bankokas',
    8 => '(GMT + 8) Pertas',
    9 => '(GMT + 9) Seulas',
    10 => '(GMT + 10) Brisbenas',
    11 => '(GMT + 11) Saliamono salos',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Joks--',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    '' => '--Joks--',
    'direct' => 'Tiesioginis priskyrimas',
    'leastBusy' => 'Mažiausiai užsiėmęs',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Marketingas',
    'Knowledege Base' => 'Žinių bazė',
    'Sales' => 'Pardavimai',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'Marketing Collateral' => 'Rinkodaros dokumentai',
    'Product Brochures' => 'Prekių bukletai',
    'FAQ' => 'DUK',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Laiškų apjungimas',
    'license' => 'Licencijos sutartis',
  ),
  'wflow_address_type_dom' => 
  array (
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'to' => 'Kam:',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'to' => 'Kam:',
    'invite_only' => '(Tik pakviesti)',
  ),
  'dom_timezones_extra' => 
  array (
    -12 => '(GMT-12) International Date Line West',
    -9 => '(GMT-9) Alaska',
    -8 => '(GMT-8) (PST)',
    -7 => '(GMT-7) (MST)',
    -6 => '(GMT-6) (CST)',
    -5 => '(GMT-5) (EST)',
    -2 => '(GMT-2) Mid-Atlantic',
    6 => '(GMT+6) Astana',
    12 => '(GMT+12) Auckland',
    -11 => '(GMT-11) Midvėjau salos, Samoa',
    -10 => '(GMT-10) Havajai',
    -4 => '(GMT-4) Santjagas',
    -3 => '(GMT-3) Buenos Airės',
    -1 => '(GMT-1) Azorų',
    1 => '(GMT+1) Madridas',
    2 => '(GMT+2) Atėnai',
    3 => '(GMT+3) Maskva',
    4 => '(GMT+4) Kabulas',
    5 => '(GMT+5) Jekaterinburgas',
    7 => '(GMT+7) Bankokas',
    8 => '(GMT+8) Pertas',
    9 => '(GMT+9) Seulas',
    10 => '(GMT+10) Brisbanas',
    11 => '(GMT+11) Saliamono salos',
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
    'active' => 'Aktyvus',
    'inactive' => 'Neaktyvus',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Laiškas išsiųstas',
    'send error' => 'Nepasiekė adresato',
    'invalid email' => 'Neteisingas pašto adresas',
    'link' => 'Paspaudė nuorodą',
    'viewed' => 'Pažiūrėjo laišką',
    'removed' => 'Atsisakė naujienų',
    'lead' => 'Potencialūs kontaktai sukurti',
    'contact' => 'Kontaktai sukurti',
  ),
  'language_pack_name' => 'Lietuvių',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Pasiūlymai',
  'moduleList' => 
  array (
    'Home' => 'Pradžia',
    'Bugs' => 'Klaidos',
    'Cases' => 'Aptarnavimai',
    'Notes' => 'Užrašai',
    'Newsletters' => 'Naujienlaiškis',
    'Teams' => 'Komandos',
    'Users' => 'Vartotojai',
    'KBDocuments' => 'Žinių bazė',
    'FAQ' => 'DUK',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Pradžia',
    'Bugs' => 'Klaida',
    'Cases' => 'Aptarnavimas',
    'Notes' => 'Užrašas',
    'Teams' => 'Komanda',
    'Users' => 'Vartotojas',
  ),
  'checkbox_dom' => 
  array (
    '' => '[-tuščias-]',
    1 => 'Taip',
    2 => 'Ne',
  ),
  'account_type_dom' => 
  array (
    '' => '[-tuščias-]',
    'Analyst' => 'Analitikas',
    'Competitor' => 'Konkurentas',
    'Customer' => 'Pirkėjas',
    'Integrator' => 'Integruotojas',
    'Investor' => 'Investuotojas',
    'Partner' => 'Partneris',
    'Press' => 'Spauda',
    'Prospect' => 'Kandidatas',
    'Reseller' => 'Perpardavėjas',
    'Other' => 'Kita',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'Žvalgyba',
    'Qualification' => 'Identifikavimas',
    'Needs Analysis' => 'Poreikių analizė',
    'Value Proposition' => 'Pridėtinės vertės suformavimas',
    'Id. Decision Makers' => 'Pagrindinių sprendėjų nustatymas',
    'Perception Analysis' => 'Išsamesnė analizė',
    'Proposal/Price Quote' => 'Pasiūlymas',
    'Negotiation/Review' => 'Derybos',
    'Closed Won' => 'Sėkmingas sandoris',
    'Closed Lost' => 'Nesėkmingas sandoris',
  ),
  'activity_dom' => 
  array (
    'Call' => 'Skambutis',
    'Meeting' => 'Susitikimas',
    'Task' => 'Užduotis',
    'Email' => 'El. laiškas',
    'Note' => 'Užrašai',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minutę prieš',
    300 => '5 minutės prieš',
    600 => '10 minučių prieš',
    900 => '15 minučių prieš',
    1800 => '30 minučių prieš',
    3600 => '1 valandą prieš',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Didelė',
    'Medium' => 'Vidutinė',
    'Low' => 'Maža',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Nepradėta',
    'In Progress' => 'Progrese',
    'Completed' => 'Užbaigta',
    'Pending Input' => 'Laukia',
    'Deferred' => 'Atidėta',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Suplanuotas',
    'Held' => 'Įvykęs',
    'Not Held' => 'Neįvykęs',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Suplanuotas',
    'Held' => 'Įvykęs',
    'Not Held' => 'Neįvykęs',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Įeinantis',
    'Outbound' => 'Išeinantis',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Naujas',
    'Assigned' => 'Priskirtas',
    'In Process' => 'Progrese',
    'Converted' => 'Konvertuotas',
    'Recycled' => 'Atnaujintas',
    'Dead' => 'Netinkamas',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Naujas',
    'Assigned' => 'Priskirtas',
    'Closed' => 'Užbaigtas',
    'Pending Input' => 'Laukia',
    'Rejected' => 'Atmestas',
    'Duplicate' => 'Dublikatas',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Didelė',
    'P2' => 'Vidutinė',
    'P3' => 'Maža',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Aktyvus',
    'Inactive' => 'Neaktyvus',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Aktyvus',
    'Terminated' => 'Nutrauktas',
    'Leave of Absence' => 'Ne darbe',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Didelė',
    'Medium' => 'Vidutinė',
    'Low' => 'Maža',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Nepradėta',
    'In Progress' => 'Progrese',
    'Completed' => 'Užbaigta',
    'Pending Input' => 'Laukia',
    'Deferred' => 'Atidėta',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Klientas',
    'Opportunities' => 'Pardavimas',
    'Cases' => 'Aptarnavimas',
    'Leads' => 'Potencialus kontaktas',
    'Contacts' => 'Kontaktas',
    'ProductTemplates' => 'Prekė',
    'Quotes' => 'Pasiūlymas',
    'Bugs' => 'Klaida',
    'Project' => 'Projektas',
    'ProjectTask' => 'Projekto užduotis',
    'Tasks' => 'Užduotis',
  ),
  'record_type_display_notes' => 
  array (
    'Accounts' => 'Klientas',
    'Contacts' => 'Kontaktas',
    'Opportunities' => 'Pardavimas',
    'Cases' => 'Aptarnavimas',
    'Leads' => 'Potencialūs kontaktas',
    'ProductTemplates' => 'Prekė',
    'Quotes' => 'Pasiūlymas',
    'Products' => 'Prekės',
    'Contracts' => 'Sutartys',
    'Bugs' => 'Klaidos',
    'Emails' => 'Laiškai',
    'Project' => 'Projektas',
    'ProjectTask' => 'Projekto užduotis',
    'Meetings' => 'Susitikimas',
    'Calls' => 'Skambučiai',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Pasiūlyta',
    'Orders' => 'Užsakyta',
    'Ship' => 'Išsiųsta',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'Sandėlyje',
    'Unavailable' => 'Nėra sandėlyje',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Apmokestinama',
    'Non-Taxable' => 'Neapmokestinama',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Šeši mėnesiai',
    '+1 year' => 'Vieni metai',
    '+2 years' => 'Du metai',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Pasiūlymai',
    'Orders' => 'Užsakymas',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Juodraštis',
    'Negotiation' => 'Derybos',
    'Delivered' => 'Pristatyta',
    'On Hold' => 'Sulaikyta',
    'Confirmed' => 'Patvirtinta',
    'Closed Accepted' => 'Sėkmingas',
    'Closed Lost' => 'Nesėkmingas',
    'Closed Dead' => 'Netinkamas',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Laukiantis',
    'Confirmed' => 'Patvirtintas',
    'On Hold' => 'Sulaikytas',
    'Shipped' => 'Išsiųstas',
    'Cancelled' => 'Atšaukta',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Pasiūlymas',
    'Invoice' => 'Sąskaita',
    'Terms' => 'Mokėjimo sąlygos',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Skubus',
    'High' => 'Didelė',
    'Medium' => 'Vidutinė',
    'Low' => 'Maža',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Naujas',
    'Assigned' => 'Priskirtas',
    'Closed' => 'Užbaigtas',
    'Pending' => 'Laukiantis',
    'Rejected' => 'Atmestas',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Defektas',
    'Feature' => 'Savybė',
  ),
  'dom_cal_month_long' => 
  array (
    1 => 'Sausis',
    2 => 'Vasaris',
    3 => 'Kovas',
    4 => 'Balandis',
    5 => 'Gegužė',
    6 => 'Birželis',
    7 => 'Liepa',
    8 => 'Rugpjūtis',
    9 => 'Rugsėjis',
    10 => 'Spalis',
    11 => 'Lapkritis',
    12 => 'Gruodis',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Eilutės ir stulpeliai',
    'summary' => 'Sumavimas',
    'detailed_summary' => 'Sumavimas su detalėmis',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Išsiųstas',
    'archived' => 'Suarchyvuotas',
    'draft' => 'Juodraštinis',
    'inbound' => 'Įeinantis',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Suarchyvuotas',
    'closed' => 'Užbaigtas',
    'draft' => 'Juodraštis',
    'read' => 'Perskaitytas',
    'replied' => 'Atsakytas',
    'sent' => 'Išsiųstas',
    'send_error' => 'Siuntimo klaida',
    'unread' => 'Neperskaitytas',
  ),
  'dom_mailbox_type' => 
  array (
    'pick' => 'Sukurti [Bet kokį]',
    'bug' => 'Sukurti klaidą',
    'support' => 'Sukurti aptarnavimą',
    'contact' => 'Sukurti kontaktą',
    'sales' => 'Sukurti potencialų kontaktą',
    'task' => 'Sukurti užduotį',
    'bounce' => 'Nenuėjusių tvarkymas',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Pasirinkite tik vieną vartotoją',
    2 => 'Turite priskirti tik pažymėtus elementus',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Taip',
    'bool_false' => 'Ne',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Taip',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Taip',
    'off' => 'Ne',
    '' => 'Ne',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Numatytas pašto klientas',
    'sugar' => 'SugarCRM pašto klientas',
    'mailto' => 'Išorinis pašto klientas',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Numatytas pašto formatas',
    'html' => 'HTML laiškas',
    'plain' => 'Paprastas tekstinis laiškas',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Paskutinis neįvykdytas',
    'ready' => 'Pasiruošęs',
    'in progress' => 'Progrese',
    'failed' => 'Nepavykęs',
    'completed' => 'Užbaigtas',
    'no curl' => 'Nepaleistas: Nėra cURL',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Aktyvus',
    'Inactive' => 'Neaktyvus',
  ),
  'forecast_type_dom' => 
  array (
    'Direct' => 'Tiesioginis',
    'Rollup' => 'Kaupiamasis',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Aktyvus',
    'Draft' => 'Juodraštis',
    'FAQ' => 'DUK',
    'Expired' => 'Pasibaigęs',
    'Under Review' => 'Peržiūrimas',
    'Pending' => 'Laukiantis',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Patvirtinti',
    'decline' => 'Atsisakyti',
    'tentative' => 'Nežinoti',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Patvirtinti',
    'decline' => 'Atsisakyti',
    'tentative' => 'Nežinoti',
    'none' => 'Joks',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Pliusas',
    '-' => '(-) Minusas',
    '*' => '(X) Daugyba iš',
    '/' => '(/) Dalyba iš',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'kai įrašas išsaugojamas',
    'Time' => 'Kai laikas baigiasi',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Lygus',
    'in' => 'Yra viena iš',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Lygus',
    'Does not Equal' => 'Nelygus',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Lygus',
    'Less Than' => 'yra mažiau nei',
    'More Than' => 'Daugiau nei',
    'Does not Equal' => 'Nelygus',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Taip',
    'bool_false' => 'Ne',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Lygus',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 valandos',
    28800 => '8 valandos',
    43200 => '12 valandų',
    86400 => '1 diena',
    172800 => '2 dienos',
    259200 => '3 dienos',
    345600 => '4 dienos',
    432000 => '5 dienos',
    604800 => '1 savaitė',
    1209600 => '2 savaitės',
    1814400 => '3 savaitės',
    2592000 => '30 dienų',
    5184000 => '60 dienų',
    7776000 => '90 dienų',
    10368000 => '120 dienų',
    12960000 => '150 dienų',
    15552000 => '180 dienų',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'buvo daugiau nei',
    'Less Than' => 'yra mažiau nei',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'Laiškas',
    'Invite' => 'Pakvietimas',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Standartinė žinutė',
    'Custom Template' => 'Nestandartinis šablonas',
    'System Default' => 'Sistemos numatytas',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Esami vartotojai',
    'rel_user' => 'Susiję vartotojai',
    'rel_user_custom' => 'Susiję nestandartiniai vartotojai',
    'specific_team' => 'Specifinė komanda',
    'specific_role' => 'Specifinė rolė',
    'specific_user' => 'Specifinis vartotojas',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Nauja reikšmė',
    'past' => 'Sena reikšmė',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Vartotojas',
    'Manager' => 'Vartotojo vadovas',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Kam:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Atnaujinti įrašą',
    'update_rel' => 'Atnaujinti susijusį įrašą',
    'new' => 'Naujas įrašas',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Aktyvuota data',
    'Existing Value' => 'Esama reikšmė',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Baziniai nustatymai',
    'Advanced' => 'Sudėtingesni nustatymai',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Vartotojas atsakingas už aktyvuotą įrašą',
    'modified_user_id' => 'Vartotojas kuris paskutinis redagavo aktyvuotą įrašą',
    'created_by' => 'Vartotojas kuris sukūrė aktyvuotą įrašą',
    'current_user' => 'Prisijungęs vartotojas',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Aktyvuoto įrašo komanda',
    'current_team' => 'Prisijungusio vartotojo komanda',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Move dropdown backwards by',
    'advance' => 'Move dropdown forwards by',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Naujus ir esamus įrašus',
    'New' => 'Tik naujus įrašus',
    'Update' => 'Tik esamus įrašus',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Visi susiję',
    'filter' => 'Filtruoti susiję',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'visi susiję',
    'any' => 'Bet kokie',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Įspėjimai tada veiksmai',
    'actions_alerts' => 'Veiksmai tada įspėjimai',
  ),
  'prospect_list_type_dom' => 
  array (
    'default' => 'Numatytas',
    'seed' => 'Ne potencialūs klientai',
    'exempt_domain' => 'Atsisakiusių sąrašas - pagal domeną',
    'exempt_address' => 'Atsisakiusių sąrašas - pagal pašto adresą',
    'exempt' => 'Atsisakiusių sąrašas - pagal Id',
    'test' => 'Testas',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Kontaktai',
    'Users' => 'Vartotojai',
    'Prospects' => 'Adresatai',
    'Leads' => 'Potencialūs kontaktai',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Nepradėta',
    'inprogress' => 'Progrese',
    'signed' => 'Pasirašyta',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Mėnesinis',
    'quarterly' => 'Ketvirtinis',
    'halfyearly' => 'Kas pusę metų',
    'yearly' => 'Metinis',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 diena',
    3 => '3 dienos',
    5 => '5 dienos',
    7 => '1 savaitė',
    14 => '2 savaitės',
    21 => '3 savaitės',
    31 => '1 mėnesis',
  ),
);

$app_strings = array (
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ALT_HOT_KEY' => 'Alt+',
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
  'LBL_MAILMERGE_KEY' => 'M',
  'LBL_NEW_BUTTON_KEY' => 'N',
  'LBL_OPENALL_BUTTON_KEY' => 'O',
  'LBL_OPENTO_BUTTON_KEY' => 'T',
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
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
  'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_YEAR_FORMAT' => '(yyyy)',
  'LBL_LIST_TEAM' => 'Komanda',
  'LBL_TEAM' => 'Komanda:',
  'LBL_TEAM_ID' => 'Komandos Id:',
  'ERR_CREATING_FIELDS' => 'Klaida pildant papildomus laukus:',
  'ERR_CREATING_TABLE' => 'Klaida kuriant lentelę:',
  'ERR_DELETE_RECORD' => 'Įrašo numeris turi būti nurodytas norint ištrinti kontaktą.',
  'ERR_EXPORT_DISABLED' => 'Eksportavimas išjungtas.',
  'ERR_EXPORT_TYPE' => 'Klaida eksportuojant',
  'ERR_INVALID_AMOUNT' => 'Prašome įvesti leidžiamą reikšmę.',
  'ERR_INVALID_DATE_FORMAT' => 'Datos formatas turi būti:',
  'ERR_INVALID_DATE' => 'Prašome įvesti teisingą datą.',
  'ERR_INVALID_DAY' => 'Prašome įvesti teisingą dieną.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'neteisingas el. pašto adresas.',
  'ERR_INVALID_HOUR' => 'Prašome įvesti teisingą valandą.',
  'ERR_INVALID_MONTH' => 'Prašome įvesti teisingą mėnesį.',
  'ERR_INVALID_TIME' => 'Prašome įvesti teisingą laiką.',
  'ERR_INVALID_YEAR' => 'Prašome įvesti teisingus 4 skaitmenų metus.',
  'ERR_NEED_ACTIVE_SESSION' => 'Reikalingas aktyvi sesija, kad būtų galima eksportuoti turinį.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Privalomas laukas:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Neteisingas privalomas laukas:',
  'ERR_INVALID_VALUE' => 'Neteisinga reikšmė:',
  'ERR_NOTHING_SELECTED' => 'Prašome pasirinkti prieš tęsiant toliau.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'Pardavimas tuo pačiu vardu jau egzistuoja. Prašome įvesti kitą pavadinimą.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Pardavimo pavadinimas neįvestas. Prašome įvesti pardavimo pavadinimą.',
  'ERR_SELF_REPORTING' => 'Vartotojas negali būti pavaldus sau pačiam.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Nėra atitikmens laukui:',
  'ERR_SQS_NO_MATCH' => 'Nėra atitikmens',
  'ERR_PORTAL_LOGIN_FAILED' => 'Nepavyko sukurti portalo prisijungimo sesijos. Prašome susisiekti su administratoriumi.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Grįžti į Pradžią',
  'LBL_ACCOUNT' => 'Klientas',
  'LBL_ACCOUNTS' => 'Klientai',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Rodyti santrauką',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Rodyti santrauką [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Pridėti [Alt+A]',
  'LBL_ADD_BUTTON' => 'Pridėti',
  'LBL_ADD_DOCUMENT' => 'Pridėti dokumentą',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Įtraukti į adresatų sąrašą',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Įtraukti į adresatų sąrašą',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Paspauskite, kad uždaryti',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Uždaryti',
  'LBL_ADDITIONAL_DETAILS' => 'Papildoma informacija',
  'LBL_ADMIN' => 'Administratorius',
  'LBL_ARCHIVE' => 'Archyvuoti',
  'LBL_ASSIGNED_TO_USER' => 'Priskirtas vartotojui',
  'LBL_ASSIGNED_TO' => 'Atsakingas:',
  'LBL_BACK' => 'Atgal',
  'LBL_BILL_TO_ACCOUNT' => 'Sąskaita klientui',
  'LBL_BILL_TO_CONTACT' => 'Sąskaita kontaktui',
  'LBL_BROWSER_TITLE' => 'SugarCRM - komercinė atviro kodo CRM',
  'LBL_BUGS' => 'Klaidos',
  'LBL_BY' => '-',
  'LBL_CALLS' => 'Skambučiai',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Siųsti eilėje esančius kampanijos laiškus',
  'LBL_CANCEL_BUTTON_LABEL' => 'Atšaukti',
  'LBL_CANCEL_BUTTON_TITLE' => 'Atšaukti [Alt+X]',
  'LBL_CASE' => 'Techninis aptarnavimas',
  'LBL_CASES' => 'Techniniai aptarnavimai',
  'LBL_CHANGE_BUTTON_LABEL' => 'Pakeisti',
  'LBL_CHANGE_BUTTON_TITLE' => 'Pakeisti [Alt+G]',
  'LBL_CHECKALL' => 'Pažymėti visus',
  'LBL_CLEAR_BUTTON_LABEL' => 'Išvalyti',
  'LBL_CLEAR_BUTTON_TITLE' => 'Išvalyti [Alt+C]',
  'LBL_CLEARALL' => 'Išvalyti visus',
  'LBL_CLOSE_WINDOW' => 'Uždaryti langą',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Uždaryti visus',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Uždaryti visus [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Sukurti laišką',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Sukurti laišką [Alt+L]',
  'LBL_CONTACT_LIST' => 'Kontaktų sąrašas',
  'LBL_CONTACT' => 'Kontaktas',
  'LBL_CONTACTS' => 'Kontaktai',
  'LBL_CREATE_BUTTON_LABEL' => 'Sukurti',
  'LBL_CREATED_BY_USER' => 'Sukūrė',
  'LBL_CREATED' => 'Sukūrė',
  'LBL_CURRENT_USER_FILTER' => 'Mano duomenys:',
  'LBL_DATE_ENTERED' => 'Įvedimo data:',
  'LBL_DATE_MODIFIED' => 'Redagavimo data:',
  'LBL_DELETE_BUTTON_LABEL' => 'Ištrinti',
  'LBL_DELETE_BUTTON_TITLE' => 'Ištrinti [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Ištrinti',
  'LBL_DELETE' => 'Ištrinti',
  'LBL_DELETED' => 'Ištrintas',
  'LBL_DIRECT_REPORTS' => 'Tiesioginiai pavaldiniai',
  'LBL_DONE_BUTTON_LABEL' => 'Užbaigti',
  'LBL_DONE_BUTTON_TITLE' => 'Užbaigti [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'Programai reikia atlikti vasaros laiko pritaikymą. Prašome nueiti į <a href="index.php?module=Administration&action=DstFix">Taisyti</a> nuorodą Administracinėje zonoje ir atlikti šį pataisymą.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Kopijuoti',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Kopijuoti [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Kopijuoti',
  'LBL_EDIT_BUTTON_LABEL' => 'Redaguoti',
  'LBL_EDIT_BUTTON_TITLE' => 'Redaguoti [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Redaguoti',
  'LBL_VIEW_BUTTON_LABEL' => 'Rodyti',
  'LBL_VIEW_BUTTON_TITLE' => 'Rodyti [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Rodyti',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Siųsti kaip PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Siųsti kaip PDF [Alt+M]',
  'LBL_EMAILS' => 'Laiškai',
  'LBL_EMPLOYEES' => 'Darbuotojai',
  'LBL_ENTER_DATE' => 'Sukurta',
  'LBL_EXPORT_ALL' => 'Eksportuoti visus',
  'LBL_EXPORT' => 'Eksportuoti',
  'LBL_HIDE' => 'Paslėpti',
  'LBL_IMPORT_PROSPECTS' => 'Importuoti adresatus',
  'LBL_IMPORT' => 'Importuoti',
  'LBL_LAST_VIEWED' => 'Paskutinį kartą žiūrėti',
  'LBL_LEADS' => 'Potencialūs kontaktai',
  'LBL_LIST_ACCOUNT_NAME' => 'Kliento vardas',
  'LBL_LIST_ASSIGNED_USER' => 'Atsakingas',
  'LBL_LIST_CONTACT_NAME' => 'Kontakto vardas',
  'LBL_LIST_CONTACT_ROLE' => 'Kontakto rolė',
  'LBL_LIST_EMAIL' => 'El. paštas',
  'LBL_LIST_NAME' => 'Pavadinimas',
  'LBL_LIST_OF' => 'iš',
  'LBL_LIST_PHONE' => 'Telefonas',
  'LBL_LIST_USER_NAME' => 'Vartotojo vardas',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Ar tikrai norite atnaujinti visą sąrašą?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Prašome pasirinkti bent vieną 1 įrašą, kad galėtumėte tęsti.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Šis puslapis',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Visą sąrašas',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Pažymėti įrašai',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Pasirinkta:',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'Jonas',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Jonaitis',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Gerbiamas',
  'LBL_LOGOUT' => 'Atsijungti',
  'LBL_MAILMERGE' => 'Laiškų apjungimas',
  'LBL_MASS_UPDATE' => 'Masinis atnaujinimas',
  'LBL_MEETINGS' => 'Susitikimai',
  'LBL_MEMBERS' => 'Nariai',
  'LBL_MODIFIED_BY_USER' => 'Redagavo',
  'LBL_MODIFIED' => 'Redagavo',
  'LBL_MY_ACCOUNT' => 'Mano nustatymai',
  'LBL_NAME' => 'Vardas',
  'LBL_NEW_BUTTON_LABEL' => 'Sukurti',
  'LBL_NEW_BUTTON_TITLE' => 'Sukurti [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Toliau',
  'LBL_NONE' => '--Joks--',
  'LBL_NOTES' => 'Užrašai',
  'LBL_OPENALL_BUTTON_LABEL' => 'Atidaryti visus',
  'LBL_OPENALL_BUTTON_TITLE' => 'Atidaryti visus [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Atidaryti į:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Atidaryti į: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Pardavimai',
  'LBL_OPPORTUNITY_NAME' => 'Pardavimo pavadinimas',
  'LBL_OPPORTUNITY' => 'Pardavimas',
  'LBL_OR' => 'ARBA',
  'LBL_PRODUCT_BUNDLES' => 'Prekės paketas',
  'LBL_PRODUCTS' => 'Prekės',
  'LBL_PROJECT_TASKS' => 'Projekto užduotys',
  'LBL_PROJECTS' => 'Projektai',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Sukurti pardavimą iš pasiūlymo',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Sukurti pardavimą  iš pasiūlymo [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Siųsti pasiūlymą',
  'LBL_QUOTES' => 'Pasiūlymai',
  'LBL_RELATED_RECORDS' => 'Susiję įrašai',
  'LBL_REMOVE' => 'Išimti',
  'LBL_SAVE_BUTTON_LABEL' => 'Išsaugoti',
  'LBL_SAVE_BUTTON_TITLE' => 'Išsaugoti [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Pilna forma',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Pilna forma [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Saugoti ir sukurti naują',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Saugoti ir sukurti naują [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Ieškoti',
  'LBL_SEARCH_BUTTON_TITLE' => 'Ieškoti [Alt+Q]',
  'LBL_SEARCH' => 'Ieškoti',
  'LBL_SELECT_BUTTON_LABEL' => 'Pasirinkti',
  'LBL_SELECT_BUTTON_TITLE' => 'Pasirinkti [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Pasirinkti kontaktą',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Pasirinkti kontaktą [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Pasirinkti iš ataskaitų',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Pasirinkti ataskaitas',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Pasirinkti vartotoją',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Pasirinkti vartotoją [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Resursai panaudoti sukuriant šį puslapį (užklausos, failai)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'sekundės.',
  'LBL_SERVER_RESPONSE_TIME' => 'Serverio atsako laikas:',
  'LBL_SHIP_TO_ACCOUNT' => 'Siųsti klientui',
  'LBL_SHIP_TO_CONTACT' => 'Siųsti kontaktui',
  'LBL_SHORTCUTS' => 'Nuorodos',
  'LBL_SHOW' => 'Rodyti',
  'LBL_STATUS_UPDATED' => 'Jūsų statusas šiam įvykiui buvo atnaujintas!',
  'LBL_STATUS' => 'Statusas:',
  'LBL_SUBJECT' => 'Tema',
  'LBL_SYNC' => 'Sinchronizuoti',
  'LBL_TASKS' => 'Užduotys',
  'LBL_TEAMS_LINK' => 'Komanda',
  'LBL_THOUSANDS_SYMBOL' => 'tūkst.',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archyvuoti laišką',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archyvuoti laišką [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Neautorizuotas priėjimas prie administracinės zonos',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Atstatyti',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Atstatyti [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Atstatyti',
  'LBL_UNDELETE' => 'Atstatyti',
  'LBL_UNSYNC' => 'Atstatyti sinchronizaciją',
  'LBL_UPDATE' => 'Atnaujinti',
  'LBL_USER_LIST' => 'Vartotojų sąrašas',
  'LBL_USERS_SYNC' => 'Vartotojų sinchronizacija',
  'LBL_USERS' => 'Vartotojai',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Spausdinti kaip PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Spausdinti kaip PDF [Alt+P]',
  'LNK_ABOUT' => 'Apie',
  'LNK_ADVANCED_SEARCH' => 'Detali paieška',
  'LNK_BASIC_SEARCH' => 'Bazinė paieška',
  'LNK_DELETE_ALL' => 'trinti visus',
  'LNK_DELETE' => 'Trinti',
  'LNK_EDIT' => 'Redaguoti',
  'LNK_GET_LATEST' => 'Gauti naujausią',
  'LNK_GET_LATEST_TOOLTIP' => 'Pakeisti naujausia versija',
  'LNK_HELP' => 'Pagalba',
  'LNK_LIST_END' => 'Pabaiga',
  'LNK_LIST_NEXT' => 'Toliau',
  'LNK_LIST_PREVIOUS' => 'Atgal',
  'LNK_LIST_RETURN' => 'Sugrįžti į sąrašą',
  'LNK_LIST_START' => 'Pradžia',
  'LNK_LOAD_SIGNED' => 'Pasirašytas',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Pakeisti pasirašytu dokumentu',
  'LNK_PRINT' => 'Spausdinti',
  'LNK_REMOVE' => 'trinti',
  'LNK_RESUME' => 'Tęsti',
  'LNK_VIEW_CHANGE_LOG' => 'Žiūrėti pakeitimų istoriją',
  'NTC_CLICK_BACK' => 'Prašome paspausti naršyklės mygtuką Atgal ir ištaisyti klaidą.',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Ar tikrai norite ištrinti pasirinktu įrašus?',
  'NTC_DELETE_CONFIRMATION' => 'Ar tikrai norite ištrinti šį įrašą?',
  'NTC_LOGIN_MESSAGE' => 'Prašome įvesti vartotojo vardą ir slaptažodį.',
  'NTC_NO_ITEMS_DISPLAY' => 'joks',
  'NTC_REMOVE_CONFIRMATION' => 'Ar tikrai norite panaikinti šį ryšį?',
  'NTC_REQUIRED' => 'Privalomas laukas',
  'NTC_SUPPORT_SUGARCRM' => 'Palaikykite SugarCRM atviro kodo projektą paaukodami per PayPal - tai yra greita, nemoka, ir saugu!',
  'NTC_WELCOME' => 'Sveiki',
  'LOGIN_LOGO_ERROR' => 'Prašome pakeisti SugarCRM logotipą.',
  'ERROR_FULLY_EXPIRED' => 'Jūsų įmonės SugarCRM licencija pasibaigė daugiau kaip prieš 30 dienų ir ją reikia atnaujinti. Tik administratorius dabar gali prisijungti.',
  'ERROR_LICENSE_EXPIRED' => 'Jūsų įmonės SugarCRM licenciją reikia atnaujinti. Tik administratorius dabar gali prisijungti',
  'ERROR_NO_RECORD' => 'Klaida gaunant įrašą. Šis įrašas gali būti ištrintas arba neturite teisių jį matyti.',
  'LBL_DUP_MERGE' => 'Ieškoti dublikatų',
  'LBL_LOADING' => 'Kraunama ...',
  'LBL_SAVING_LAYOUT' => 'Išsaugomas išdėstymas...',
  'LBL_SAVED_LAYOUT' => 'Išdėstymas išsaugotas.',
  'LBL_SAVED' => 'Išsaugota',
  'LBL_SAVING' => 'Saugoma',
  'LBL_DISPLAY_COLUMNS' => 'Rodyti stulpelius',
  'LBL_HIDE_COLUMNS' => 'Paslėpti stulpelius',
  'LBL_SEARCH_CRITERIA' => 'Paieškos kriterijus',
  'LBL_SAVED_VIEWS' => 'Išsaugoti peržiūros',
  'LBL_NO_RECORDS_FOUND' => '- 0 įrašų rasta -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Serveris per daug apkrautas. Prašome dar kartą bandyti.',
  'LBL_CHANGE_PASSWORD' => 'Slaptažodžio keitimas',
  'LBL_LOGIN_TO_ACCESS' => 'Prašome prisijungti, jei norite prieiti prie šios vietos.',
);


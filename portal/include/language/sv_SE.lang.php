<?php

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





if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


	
$app_list_strings = array (
  'dom_timezones' => 
  array (
    5 => '(GMT + 5) Ekaterinburg',
    -11 => '(GMT - 11) Midway Island, Samoa',
    -10 => '(GMT - 10) Hawaii',
    -9 => '(GMT - 9) Alaska',
    -8 => '(GMT - 8) San Francisco',
    -7 => '(GMT - 7) Phoenix',
    -6 => '(GMT - 6) Saskatchewan',
    -5 => '(GMT - 5) New York',
    -4 => '(GMT - 4) Santiago',
    -3 => '(GMT - 3) Buenos Aires',
    1 => '(GMT + 1) Madrid',
    4 => '(GMT + 4) Kabul',
    6 => '(GMT + 6) Astana',
    7 => '(GMT + 7) Bangkok',
    8 => '(GMT + 8) Perth',
    9 => '(GMT + 9) Seol',
    10 => '(GMT + 10) Brisbane',
    11 => '(GMT + 11) Solomone Is.',
    12 => '(GMT + 12) Auckland',
    -12 => '(GMT - 12) Internationalla datumlinjen väst',
    -2 => '(GMT - 2) Central atlantisk',
    -1 => '(GMT - 1) Azorerna',
    2 => '(GMT + 2) Aten',
    3 => '(GMT + 3) Moskva',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Välj bara en användare vid direkt tilldelning.',
    2 => 'Anvisa endast valda poster vid direkt tilldelning.',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Default system epost klient',
    'sugar' => 'SugarCRM epostklient',
    'mailto' => 'Extern epostklient',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Default epost format',
    'html' => 'HTML epost',
    'plain' => 'Endast text',
  ),
  'cselect_type_dom' => 
  array (
    'Does not Equal' => 'Är inte lika med',
    'Equals' => 'Lika med',
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
  'prospect_list_type_dom' => 
  array (
    'exempt_domain' => 'Undertryckande lista - per domän',
    'exempt_address' => 'Undertryckande lista - per epostadress',
    'exempt' => 'Undertryckande lista - per id',
    'test' => 'Test',
    'default' => 'Default',
    'seed' => 'Seed',
  ),
  'moduleListSingular' => 
  array (
    'Teams' => 'Team',
    'Home' => 'Hem',
    'Bugs' => 'Bugg',
    'Cases' => 'Ärende',
    'Notes' => 'Anteckning',
    'Users' => 'Användare',
  ),
  'checkbox_dom' => 
  array (
    '' => '',
    1 => 'Ja',
    2 => 'Nej',
  ),
  'account_type_dom' => 
  array (
    '' => '',
    'Partner' => 'Partner',
    'Press' => 'Press',
    'Analyst' => 'Analytiker',
    'Competitor' => 'Konkurrent',
    'Customer' => 'Kund',
    'Integrator' => 'Integrerare',
    'Investor' => 'Investerare',
    'Prospect' => 'Prospekt',
    'Reseller' => 'Återförsäljare',
    'Other' => 'Annat',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Media' => 'Media',
    'Utilities' => 'Utilities',
    'Apparel' => 'Kläder',
    'Banking' => 'Bank',
    'Biotechnology' => 'Bioteknik',
    'Chemicals' => 'Kemikalier',
    'Communications' => 'Kommunikationer',
    'Construction' => 'Bygg',
    'Consulting' => 'Konsulting',
    'Education' => 'Utbildning',
    'Electronics' => 'Elektronik',
    'Energy' => 'Energi',
    'Engineering' => 'Ingenjör',
    'Entertainment' => 'Underhållning',
    'Environmental' => 'Miljö',
    'Finance' => 'Finans',
    'Government' => 'Statligt',
    'Healthcare' => 'Sjukvård',
    'Hospitality' => 'Sjukvård',
    'Insurance' => 'Försäkring',
    'Machinery' => 'Maskin',
    'Manufacturing' => 'Tillverkning',
    'Not For Profit' => 'Välgörenhet',
    'Recreation' => 'Rekreation',
    'Retail' => 'Detaljhandel',
    'Shipping' => 'Leverans',
    'Technology' => 'Teknik',
    'Telecommunications' => 'Telekommunikation',
    'Transportation' => 'Transport',
    'Other' => 'Annat',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Partner' => 'Partner',
    'Cold Call' => 'Cold call',
    'Existing Customer' => 'Existerande kund',
    'Self Generated' => 'Självgenererad',
    'Employee' => 'Anställd',
    'Public Relations' => 'PR',
    'Direct Mail' => 'Postutskick',
    'Conference' => 'Konferans',
    'Trade Show' => 'Mässa',
    'Web Site' => 'Webbsida',
    'Word of mouth' => 'Mun till mun',
    'Email' => 'Epost',
    'Other' => 'Annat:',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Existerande kund',
    'New Business' => 'Ny kund',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Primär beslutsfattare',
    'Business Decision Maker' => 'Beslutsfattare för affär',
    'Business Evaluator' => 'Utvärderare',
    'Technical Decision Maker' => 'Teknisk beslutsfattare',
    'Technical Evaluator' => 'Teknisk utredare',
    'Executive Sponsor' => 'Exekutiv sponsor',
    'Influencer' => 'Påverkare',
    'Other' => 'Annat',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Primär kontakt',
    'Alternate Contact' => 'Alternativ kontakt',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => 'Netto 15',
    'Net 30' => 'Netto 30',
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
    'Closed Lost' => 'Stängd förlorad',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Mr.' => 'Herr',
    'Ms.' => 'Fröken',
    'Mrs.' => 'Fru',
    'Dr.' => 'Dr.',
    'Prof.' => 'Prof.',
  ),
  'task_priority_dom' => 
  array (
    'Medium' => 'Medium',
    'High' => 'Hög',
    'Low' => 'Låg',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Ny',
    'Assigned' => 'Tilldelad',
    'In Process' => 'Bearbetar',
    'Converted' => 'Konverterad',
    'Recycled' => 'Återanvänd',
    'Dead' => 'Död',
  ),
  'case_priority_dom' => 
  array (
    'P2' => 'Medium',
    'P1' => 'Hög',
    'P3' => 'Låg',
  ),
  'messenger_type_dom' => 
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
  ),
  'project_task_priority_options' => 
  array (
    'Medium' => 'Medium',
    'High' => 'Hög',
    'Low' => 'Låg',
  ),
  'project_task_utilization_options' => 
  array (
    25 => '25',
    50 => '50',
    75 => '75',
    100 => '100',
  ),
  'record_type_display' => 
  array (
    'Leads' => 'Lead',
    'Accounts' => 'Konto',
    'Opportunities' => 'Affärsmöjlighet',
    'Cases' => 'Ärende',
    'Contacts' => 'Kontakt',
    'ProductTemplates' => 'Produkt',
    'Quotes' => 'Offert',
    'Bugs' => 'Bugg',
    'Project' => 'Projekt',
    'ProjectTask' => 'Projektuppgift',
    'Tasks' => 'Uppgift',
  ),
  'record_type_display_notes' => 
  array (
    'Leads' => 'Lead',
    'Accounts' => 'Konto',
    'Contacts' => 'Kontakt',
    'Opportunities' => 'Affärsmöjlighet',
    'Cases' => 'Ärende',
    'ProductTemplates' => 'Produkt',
    'Quotes' => 'Offert',
    'Products' => 'Produkt',
    'Contracts' => 'Kontrakt',
    'Bugs' => 'Bugg',
    'Emails' => 'Epost',
    'Project' => 'Projekt',
    'ProjectTask' => 'Projektuppgift',
    'Meetings' => 'Möte',
    'Calls' => 'Telefonsamtal',
  ),
  'quote_type_dom' => 
  array (
    'Orders' => 'Order',
    'Quotes' => 'Offert',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Primär beslutsfattare',
    'Business Decision Maker' => 'Beslutsfattare för affär',
    'Business Evaluator' => 'Utvärderare',
    'Technical Decision Maker' => 'Teknisk beslutsfattare',
    'Technical Evaluator' => 'Teknisk utredare',
    'Executive Sponsor' => 'Exekutiv sponsor',
    'Influencer' => 'Påverkar',
    'Other' => 'Annat:',
  ),
  'bug_priority_dom' => 
  array (
    'Medium' => 'Medium',
    'Urgent' => 'Brådskande',
    'High' => 'Hög',
    'Low' => 'Låg',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Accepterat',
    'Duplicate' => 'Duplicera',
    'Fixed' => 'Fixad',
    'Out of Date' => 'Utgånget datum',
    'Invalid' => 'Ogiltig',
    'Later' => 'Senare',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Forum' => 'Forum',
    'Internal' => 'Intern',
    'Web' => 'Webb',
    'InboundEmail' => 'Epost',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Feeds' => 'Feeds',
    'Leads' => 'Leads',
    'RSS' => 'RSS',
    'Studio' => 'Studio',
    'Accounts' => 'Konton',
    'Activities' => 'Aktiviteter',
    'Bug Tracker' => 'Bugg Tracker',
    'Calendar' => 'Kalender',
    'Calls' => 'Telefonsamtal',
    'Campaigns' => 'Kampanjer',
    'Cases' => 'Ärenden',
    'Contacts' => 'Kontakter',
    'Currencies' => 'Valutor',
    'Dashboard' => 'Skrivbord',
    'Documents' => 'Dokument',
    'Emails' => 'Epost',
    'Forecasts' => 'Prognoser',
    'Help' => 'Hjälp',
    'Home' => 'Hem',
    'Meetings' => 'Möten',
    'Notes' => 'Anteckningar',
    'Opportunities' => 'Affärsmöjligheter',
    'Outlook Plugin' => 'Outlook plugin',
    'Product Catalog' => 'Produktkatalog',
    'Products' => 'Produkter',
    'Projects' => 'Projekt',
    'Quotes' => 'Offerter',
    'Releases' => 'Releaser',
    'Upgrade' => 'Uppgradera',
    'Users' => 'Användare',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Planering',
    'Active' => 'Aktiv',
    'Inactive' => 'Inaktiv',
    'Complete' => 'Färdig',
    'In Queue' => 'I kö',
    'Sending' => 'Skickar',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Radio' => 'Radio',
    'Telesales' => 'Telefonförsäljning',
    'Mail' => 'Epostmeddelande',
    'Email' => 'Epost',
    'Print' => 'Skriv ut',
    'Web' => 'Webb',
    'Television' => 'TV',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_cal_month_long' => 
  array (
    4 => 'April',
    9 => 'September',
    11 => 'November',
    12 => 'December',
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Mars',
    5 => 'Maj',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Augusti',
    10 => 'Oktober',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Ingen--',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    '' => '--Ingen--',
    'direct' => 'Direkt tilldelning',
    'leastBusy' => 'Minst upptagna',
  ),
  'forecast_type_dom' => 
  array (
    'Rollup' => 'Rollup',
    'Direct' => 'Direkt',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Marknad',
    'Knowledege Base' => 'Kunskapsbas',
    'Sales' => 'Sälj',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'Marketing Collateral' => 'Marknadsmaterial',
    'Product Brochures' => 'Produkt broschyrer',
    'FAQ' => 'Frågor och svar',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Sammanfoga Epost',
    'license' => 'Licensavtal',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Plus',
    '-' => '(-) Minus',
    '*' => '(X) Multiplicerat med',
    '/' => '(/) Dividerat med',
  ),
  'wflow_address_type_dom' => 
  array (
    'cc' => 'CC:',
    'to' => 'Till:',
    'bcc' => 'BCC;',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'cc' => 'CC:',
    'to' => 'Till:',
    'bcc' => 'BCC;',
    'invite_only' => '(Bjud endast in)',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '',
    'active' => 'Aktiv',
    'inactive' => 'Inaktiv',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Meddelande skickade/försökt skicka',
    'send error' => 'Studsade meddelanden, andra',
    'invalid email' => 'Skickade meddelanden, ogiltig epost',
    'link' => 'Klickat via länk',
    'viewed' => 'Läst  meddelande',
    'removed' => 'Önskar ej utskick',
    'lead' => 'Skapade leads',
    'contact' => 'Skapade kontakter',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Prospects' => 'Targets',
    'Leads' => 'Leads',
    'Contacts' => 'Kontakter',
    'Users' => 'Användare',
  ),
  'language_pack_name' => 'US engelska',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Offerter',
  'moduleList' => 
  array (
    'Home' => 'Hem',
    'Bugs' => 'Bugg tracker',
    'Cases' => 'Ärenden',
    'Notes' => 'Anteckningar',
    'Newsletters' => 'Nyhetsbrev',
    'Teams' => 'Team',
    'Users' => 'Användare',
    'KBDocuments' => 'Kunskapsbas',
    'FAQ' => 'Frågor och svar',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'Prospekting',
    'Qualification' => '20',
    'Needs Analysis' => '25',
    'Value Proposition' => '30',
    'Id. Decision Makers' => '40',
    'Perception Analysis' => 'Sannolikhet',
    'Proposal/Price Quote' => '65',
    'Negotiation/Review' => '80',
    'Closed Won' => '100',
    'Closed Lost' => 'Stängd förlorad',
  ),
  'activity_dom' => 
  array (
    'Call' => 'Telefonsamtal:',
    'Meeting' => 'Möte:',
    'Task' => 'Uppgift',
    'Email' => 'Epost',
    'Note' => 'Anteckning',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minut före',
    300 => '5 minuter före',
    600 => '10 minuter före',
    900 => '15 minuter före',
    1800 => '30 minuter före',
    3600 => '1 timme före',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Ej startat',
    'In Progress' => 'Pågår',
    'Completed' => 'Färdig',
    'Pending Input' => 'Väntar på svar',
    'Deferred' => 'Uppskjutet',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Planerad',
    'Held' => 'Stoppad',
    'Not Held' => 'Ej stoppad',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Planerad',
    'Held' => 'Stoppad',
    'Not Held' => 'Ej stoppad',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Inkommande',
    'Outbound' => 'Utgående',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Ny',
    'Assigned' => 'Tilldelad',
    'In Process' => 'Bearbetar',
    'Converted' => 'Konverterad',
    'Recycled' => 'Återanvänd',
    'Dead' => 'Död',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Ny',
    'Assigned' => 'Tilldelad',
    'Closed' => 'Stängd',
    'Pending Input' => 'Väntar på svar',
    'Rejected' => 'Avslag',
    'Duplicate' => 'Duplicera',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Aktiv',
    'Inactive' => 'Inaktiv',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Aktiv',
    'Terminated' => 'Slutat',
    'Leave of Absence' => 'Tjänstledig',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Inte startad',
    'In Progress' => 'Pågår',
    'Completed' => 'Färdig',
    'Pending Input' => 'Väntar på svar',
    'Deferred' => 'Uppskjutet',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Offererad',
    'Orders' => 'Beställd',
    'Ship' => 'Levererad',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Fast pris',
    'ProfitMargin' => 'Vinstmarginal',
    'PercentageMarkup' => 'Påslag på kostnad',
    'PercentageDiscount' => 'Rabatt på listpris',
    'IsList' => 'Samma som listpris',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'I lager',
    'Unavailable' => 'Ej i lager',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Moms',
    'Non-Taxable' => 'Ej moms',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Sex månader',
    '+1 year' => 'Ett år',
    '+2 years' => 'Två år',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Utkast',
    'Negotiation' => 'Förhandling',
    'Delivered' => 'Levererad',
    'On Hold' => 'Avvaktas',
    'Confirmed' => 'Konfirmerad',
    'Closed Accepted' => 'Stängd accepterad',
    'Closed Lost' => 'Stängd förlorad',
    'Closed Dead' => 'Stängd död',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Avvaktar',
    'Confirmed' => 'Konfirmerad',
    'On Hold' => 'Avvaktas',
    'Shipped' => 'Levererad',
    'Cancelled' => 'Avbruten',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Förslag',
    'Invoice' => 'Faktura',
    'Terms' => 'Betalningsvillkor',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Ny',
    'Assigned' => 'Tilldelad',
    'Closed' => 'Stängd',
    'Pending' => 'Avvaktar',
    'Rejected' => 'Avslagen',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Defekt',
    'Feature' => 'Önskemål',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Rader och kolumner',
    'summary' => 'Summering',
    'detailed_summary' => 'Summering med detaljer',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Skickat',
    'archived' => 'Arkiverad',
    'draft' => 'I utkast',
    'inbound' => 'Inkommande',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Arkiverad',
    'closed' => 'Stängd',
    'draft' => 'I utkast',
    'read' => 'Läst',
    'replied' => 'Svarat',
    'sent' => 'Skickat',
    'send_error' => 'Fel vid skicka',
    'unread' => 'Oläst',
  ),
  'dom_mailbox_type' => 
  array (
    'pick' => 'välj',
    'bug' => 'Skapa bugg',
    'support' => 'Skapa ärende',
    'contact' => 'Skapa kontakter',
    'sales' => 'Skapa lead',
    'task' => 'Skapa uppgift',
    'bounce' => 'Studshantering',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Ja',
    'bool_false' => 'Nej',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Ja',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Ja',
    'off' => 'Nej',
    '' => 'Nej',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Exekveringstid passerad, Ej Exekverad',
    'ready' => 'Klar',
    'in progress' => 'Pågår',
    'failed' => 'Misslyckades',
    'completed' => 'Färdig',
    'no curl' => 'Ej körd: Ingen cURL finns',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Aktiv',
    'Inactive' => 'Inaktiv',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Aktiv',
    'Draft' => 'Utkast',
    'FAQ' => 'Frågor och svar',
    'Expired' => 'Utgången',
    'Under Review' => 'Under granskning',
    'Pending' => 'Avvaktar',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Accepterat',
    'decline' => 'Avböj',
    'tentative' => 'Preliminärt',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Accepterat',
    'decline' => 'Avböjt',
    'tentative' => 'Preliminärt',
    'none' => 'ingen',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'När posten sparas',
    'Time' => 'Efter en bestämd tid',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Är',
    'in' => 'Är en av',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Lika med',
    'Less Than' => 'är mindre än',
    'More Than' => 'är mer än',
    'Does not Equal' => 'Är inte lika',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Ja',
    'bool_false' => 'Nej',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Lika med',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 timmar',
    28800 => '8 timmar',
    43200 => '12 timmar',
    86400 => '1 dag',
    172800 => '2 dagar',
    259200 => '3 dagar',
    345600 => '4 dagar',
    432000 => '5 dagar',
    604800 => '1 vecka',
    1209600 => '2 veckor',
    1814400 => '3 veckor',
    2592000 => '30 dagar',
    5184000 => '60 dagar',
    7776000 => '90 dagar',
    10368000 => '120 dagar',
    12960000 => '150 dagar',
    15552000 => '180 dagar',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'var mer än',
    'Less Than' => 'är mindre än',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'Epost',
    'Invite' => 'Bjud in',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Normalt meddelande',
    'Custom Template' => 'Anpassad Mall',
    'System Default' => 'Systemstandard',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Nuvarande användare',
    'rel_user' => 'Relaterad användare',
    'rel_user_custom' => 'Relaterad anpassad användare',
    'specific_team' => 'Specifikt team',
    'specific_role' => 'Specifik roll',
    'specific_user' => 'Specifik användare',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Nytt värde',
    'past' => 'Gammalt värde',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Användare',
    'Manager' => 'Användarens chef',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Till:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Uppdatera post',
    'update_rel' => 'Uppdatera relaterad post',
    'new' => 'Ny post',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Triggat datum',
    'Existing Value' => 'Existerande värde',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Standard alternativ',
    'Advanced' => 'Avancerade alternativ',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Tilldelad användare för utlösta objekt',
    'modified_user_id' => 'Användare som senast modifierade det utlösta objektet',
    'created_by' => 'Användare som skapade det utlösta objektet',
    'current_user' => 'Inloggad användare',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Nuvarande Team för utlöst objekt',
    'current_team' => 'Inloggade användarens team',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Flytta dropdown tillbaka till',
    'advance' => 'Flytta dropdown fram till',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Nya och existerande poster',
    'New' => 'Endast nya poster',
    'Update' => 'Endast existerande poster',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Alla relaterade',
    'filter' => 'Filtrera relaterade',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'alla relaterade',
    'any' => 'någon relaterad',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Meddelande sedan Åtgärd',
    'actions_alerts' => 'Åtgärd sedan Meddelande',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Inte startad',
    'inprogress' => 'Pågår',
    'signed' => 'Signerat',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Månadsvis',
    'quarterly' => 'Kvartalsvis',
    'halfyearly' => 'Halvårsvis',
    'yearly' => 'Årsvis',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 dag',
    3 => '3 dagar',
    5 => '5 dagar',
    7 => '1 vecka',
    14 => '2 veckor',
    21 => '3 veckor',
    31 => '1 månad',
  ),
);

$app_strings = array (
  'LBL_LIST_TEAM' => 'Team',
  'LBL_TEAM' => 'Team:',
  'LBL_TEAM_ID' => 'Team ID:',
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
  'LBL_LEADS' => 'Leads',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'John',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Doe',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Mr.',
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
  'LBL_STATUS' => 'Status:',
  'LBL_TEAMS_LINK' => 'Team',
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'NTC_TIME_FORMAT' => '(24:00)',
  'ERR_CREATING_FIELDS' => 'Fel vid ifyllande av fält för ytterligare detaljer:',
  'ERR_CREATING_TABLE' => 'Fel vid skapande av tabell:',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att kunna radera kontakten.',
  'ERR_EXPORT_DISABLED' => 'Exporter avaktiverade',
  'ERR_EXPORT_TYPE' => 'Fel vid export',
  'ERR_INVALID_AMOUNT' => 'Var god fyll i en giltig summa.',
  'ERR_INVALID_DATE_FORMAT' => 'Datumformatet måste vara:',
  'ERR_INVALID_DATE' => 'Vad god fyll i ett giltigt datum.',
  'ERR_INVALID_DAY' => 'Var god fyll i en giltig dag',
  'ERR_INVALID_EMAIL_ADDRESS' => 'inte en giltig epostadress',
  'ERR_INVALID_HOUR' => 'Var god fyll i en timme mellan 0 och 24.',
  'ERR_INVALID_MONTH' => 'Var god fyll i en giltig månad.',
  'ERR_INVALID_TIME' => 'Var god fyll i en giltig tid.',
  'ERR_INVALID_YEAR' => 'Skriv in ett giltigt fyrsiffrigt år.',
  'ERR_NEED_ACTIVE_SESSION' => 'Det krävs en aktiv session för att exportera innehållet.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Saknar obligatoriskt fält:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Felaktigt obligatoriskt fält:',
  'ERR_INVALID_VALUE' => 'Ogiltigt värde:',
  'ERR_NOTHING_SELECTED' => 'Vänligen gör ett urval innan du fortsätter.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'En affärsmöjlighet med namnet %s finns redan. Var god välj ett annat namn nedan.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Inget namn för affärsmöjligheten fylldes i. Var god fyll i ett namn på affärsmöjligheten nedan.',
  'ERR_SELF_REPORTING' => 'En användare kan inte rapportera till sig själv.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Ingen matchning för fältet:',
  'ERR_SQS_NO_MATCH' => 'Ingen matchning',
  'ERR_PORTAL_LOGIN_FAILED' => 'Kunde ej skapa en portal inloggnings session. Var snäll och kontakta en administratör.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Till hem',
  'LBL_ACCOUNT' => 'Konto',
  'LBL_ACCOUNTS' => 'Konton',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Se sammanställning',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Se sammanställning [ALT+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Lägg till [Alt+A]',
  'LBL_ADD_BUTTON' => 'Lägg till',
  'LBL_ADD_DOCUMENT' => 'Lägg till dokument',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Lägg till i mållista',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Lägg till i mållista',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Klicka för stäng',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Stäng:',
  'LBL_ADDITIONAL_DETAILS' => 'Ytterligare detaljer',
  'LBL_ADMIN' => 'Administratör',
  'LBL_ARCHIVE' => 'Arkiv',
  'LBL_ASSIGNED_TO_USER' => 'Tilldelad till användare',
  'LBL_ASSIGNED_TO' => 'Tilldelad till:',
  'LBL_BACK' => 'Tillbaka',
  'LBL_BILL_TO_ACCOUNT' => 'Fakturera organisation',
  'LBL_BILL_TO_CONTACT' => 'Fakturera kontakt',
  'LBL_BROWSER_TITLE' => 'SugarCRM - Kommersiell öppen källkod CRM',
  'LBL_BUGS' => 'Buggar',
  'LBL_BY' => 'av',
  'LBL_CALLS' => 'Telefonsamtal',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Skicka köade kampanjmail',
  'LBL_CANCEL_BUTTON_LABEL' => 'Avbryt',
  'LBL_CANCEL_BUTTON_TITLE' => 'Avbryt [Alt+X]',
  'LBL_CASE' => 'Ärende',
  'LBL_CASES' => 'Ärenden',
  'LBL_CHANGE_BUTTON_LABEL' => 'Ändra',
  'LBL_CHANGE_BUTTON_TITLE' => 'Ändra [Alt+G]',
  'LBL_CHECKALL' => 'Kryssa alla',
  'LBL_CLEAR_BUTTON_LABEL' => 'Rensa',
  'LBL_CLEAR_BUTTON_TITLE' => 'Rensa [Alt+C]',
  'LBL_CLEARALL' => 'Rensa alla',
  'LBL_CLOSE_WINDOW' => 'Stäng fönster',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Stäng alla',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Stäng alla [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Skapa epost',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Skapa epost [Alt+L]',
  'LBL_CONTACT_LIST' => 'Kontaktlista',
  'LBL_CONTACT' => 'Kontakt',
  'LBL_CONTACTS' => 'Kontakter',
  'LBL_CREATE_BUTTON_LABEL' => 'Skapa',
  'LBL_CREATED_BY_USER' => 'Skapad av användare',
  'LBL_CREATED' => 'Skapad av',
  'LBL_CURRENT_USER_FILTER' => 'Endast mina poster:',
  'LBL_DATE_ENTERED' => 'Skapat datum:',
  'LBL_DATE_MODIFIED' => 'Senast ändrad',
  'LBL_DELETE_BUTTON_LABEL' => 'Radera',
  'LBL_DELETE_BUTTON_TITLE' => 'Radera [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Radera',
  'LBL_DELETE' => 'Radera',
  'LBL_DELETED' => 'Raderad',
  'LBL_DIRECT_REPORTS' => 'Direktrapporter',
  'LBL_DONE_BUTTON_LABEL' => 'Klar',
  'LBL_DONE_BUTTON_TITLE' => 'Klar [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'Den här applikationen behöver en sommartidsfix för att användas.  Vänligen gå till<a href="index.php?module=Administration&action=DstFix">Repair</a> länken i adminkonsollen och lägg till sommartidsinställningsfixen.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Duplicera',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Duplicera [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Duplicera',
  'LBL_EDIT_BUTTON_LABEL' => 'Redigera',
  'LBL_EDIT_BUTTON_TITLE' => 'Redigera [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Redigera',
  'LBL_VIEW_BUTTON_LABEL' => 'Visa',
  'LBL_VIEW_BUTTON_TITLE' => 'Visa [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Visa',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Epost som PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Epost som PDF [Alt+M]',
  'LBL_EMAILS' => 'Epostmeddelanden',
  'LBL_EMPLOYEES' => 'Anställda',
  'LBL_ENTER_DATE' => 'Fyll i datum',
  'LBL_EXPORT_ALL' => 'Exportera alla',
  'LBL_EXPORT' => 'Exportera',
  'LBL_HIDE' => 'Dölj',
  'LBL_IMPORT_PROSPECTS' => 'importera mål',
  'LBL_IMPORT' => 'Importera',
  'LBL_LAST_VIEWED' => 'Senast visade',
  'LBL_LIST_ACCOUNT_NAME' => 'Företagsnamn',
  'LBL_LIST_ASSIGNED_USER' => 'Användare',
  'LBL_LIST_CONTACT_NAME' => 'Kontaktnamn',
  'LBL_LIST_CONTACT_ROLE' => 'Kontakt roll',
  'LBL_LIST_EMAIL' => 'Epost',
  'LBL_LIST_NAME' => 'Namn',
  'LBL_LIST_OF' => 'av',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_USER_NAME' => 'Användarnamn',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Är du säker på att du vill uppdatera hela listan?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Vänligen välj minst en post för att fortsätta.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Den här sidan',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Alla poster',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Valda poster',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Valda:',
  'LBL_LOGOUT' => 'Logga ut',
  'LBL_MAILMERGE' => 'Sammanfoga Epost',
  'LBL_MASS_UPDATE' => 'Massuppdatera',
  'LBL_MEETINGS' => 'Möten',
  'LBL_MEMBERS' => 'Medlemmar',
  'LBL_MODIFIED_BY_USER' => 'Ändrad av användare',
  'LBL_MODIFIED' => 'Redigerad av',
  'LBL_MY_ACCOUNT' => 'Mitt konto',
  'LBL_NAME' => 'Namn',
  'LBL_NEW_BUTTON_LABEL' => 'Skapa',
  'LBL_NEW_BUTTON_TITLE' => 'Skapa [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Nästa',
  'LBL_NONE' => '-Ingen-',
  'LBL_NOTES' => 'Anteckningar',
  'LBL_OPENALL_BUTTON_LABEL' => 'Öppna alla',
  'LBL_OPENALL_BUTTON_TITLE' => 'Öppna alla [Alt+O}',
  'LBL_OPENTO_BUTTON_LABEL' => 'Öppna till:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Öppna till: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Affärsmöjligheter',
  'LBL_OPPORTUNITY_NAME' => 'Namn på affärsmöjlighet:',
  'LBL_OPPORTUNITY' => 'Affärsmöjlighet',
  'LBL_OR' => 'Eller',
  'LBL_PRODUCT_BUNDLES' => 'Bundlade produkter',
  'LBL_PRODUCTS' => 'Produkter',
  'LBL_PROJECT_TASKS' => 'Projektuppgifter',
  'LBL_PROJECTS' => 'Projekt',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Skapa affärsmöjlighet från offert',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Skapa affärsmöjlighet från offert [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Offerter skickas till',
  'LBL_QUOTES' => 'Offerter',
  'LBL_RELATED_RECORDS' => 'Relaterade poster',
  'LBL_REMOVE' => 'Ta bort',
  'LBL_SAVE_BUTTON_LABEL' => 'Spara',
  'LBL_SAVE_BUTTON_TITLE' => 'Spara [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Fullt formulär',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Fullt formulär [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Spara & skapa ny',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Spara & skapa ny [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Sök',
  'LBL_SEARCH_BUTTON_TITLE' => 'Sök [Alt+Q]',
  'LBL_SEARCH' => 'Sök',
  'LBL_SELECT_BUTTON_LABEL' => 'Välj',
  'LBL_SELECT_BUTTON_TITLE' => 'Välj [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Välj kontakt',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Välj kontakt [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Välj från rapporter',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Välj rapporter',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Välj användare',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Välj användare [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Resurser som använts för att skapa den här sidan (frågor, filer)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'sekunder.',
  'LBL_SERVER_RESPONSE_TIME' => 'Server svarstid:',
  'LBL_SHIP_TO_ACCOUNT' => 'Leverera till konto',
  'LBL_SHIP_TO_CONTACT' => 'Leverera till kontakt',
  'LBL_SHORTCUTS' => 'Genvägar',
  'LBL_SHOW' => 'Visa',
  'LBL_STATUS_UPDATED' => 'Din status för detta event har blivit uppdaterad!',
  'LBL_SUBJECT' => 'Ämne',
  'LBL_SYNC' => 'Synk',
  'LBL_TASKS' => 'Uppgifter',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arkivera epost',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arkivera e-post [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Obehörig åtkomst till administrationen',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Ångra radera',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Ångra radera [Alt + D]',
  'LBL_UNDELETE_BUTTON' => 'Ångra radera',
  'LBL_UNDELETE' => 'Ångra radera',
  'LBL_UNSYNC' => 'Ångra synkronisering',
  'LBL_UPDATE' => 'Uppdatera',
  'LBL_USER_LIST' => 'Användarlista',
  'LBL_USERS_SYNC' => 'Synkronisering av användare',
  'LBL_USERS' => 'Användare',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Skriv ut som PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Skriv ut som PDF [Alt+P]',
  'LNK_ABOUT' => 'Om',
  'LNK_ADVANCED_SEARCH' => 'Avancerat',
  'LNK_BASIC_SEARCH' => 'Enkel sök',
  'LNK_DELETE_ALL' => 'radera alla',
  'LNK_DELETE' => 'radera',
  'LNK_EDIT' => 'redigera',
  'LNK_GET_LATEST' => 'Hämta senaste',
  'LNK_GET_LATEST_TOOLTIP' => 'Ersätt med nyaste versionen',
  'LNK_HELP' => 'Hjälp',
  'LNK_LIST_END' => 'Slut',
  'LNK_LIST_NEXT' => 'Nästa',
  'LNK_LIST_PREVIOUS' => 'Föregående',
  'LNK_LIST_RETURN' => 'Återgå till Lista',
  'LNK_LIST_START' => 'Starta',
  'LNK_LOAD_SIGNED' => 'Signera',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Ersätt med signerat dokument',
  'LNK_PRINT' => 'Skriv ut',
  'LNK_REMOVE' => 'ta bort',
  'LNK_RESUME' => 'Återuppta',
  'LNK_VIEW_CHANGE_LOG' => 'Se ändringslogg',
  'NTC_CLICK_BACK' => 'Var god klicka på tillbakaknappen i webbläsaren för att åtgärda problemet.',
  'NTC_DATE_FORMAT' => '(åååå-mm-dd)',
  'NTC_DATE_TIME_FORMAT' => '[åååå-mm-dd 24:00]',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Är du säker på att du vill radera de valda posterna?',
  'NTC_DELETE_CONFIRMATION' => 'Är du säker på att du vill radera posten?',
  'NTC_LOGIN_MESSAGE' => 'Var god fyll i ditt användarnamn och lösenord:',
  'NTC_NO_ITEMS_DISPLAY' => 'ingen',
  'NTC_REMOVE_CONFIRMATION' => 'Är du säker på att du vill ta bort relationen?',
  'NTC_REQUIRED' => 'Indikerar obligatoriskt fält',
  'NTC_SUPPORT_SUGARCRM' => 'Stöd SugarCRM:s open source projekt med en donation genom PayPal - det är snabbt, gratis och säkert!',
  'NTC_WELCOME' => 'Välkommen',
  'NTC_YEAR_FORMAT' => '(åååå)',
  'LOGIN_LOGO_ERROR' => 'Var god ersätt SugarCRM:s logotyper.',
  'ERROR_FULLY_EXPIRED' => 'Ditt företags licens för SugarCRM gick ut för mer än 30 dagar sedan och måste uppdateras. Endast administratörer kan logga in.',
  'ERROR_LICENSE_EXPIRED' => 'Ditt företags licenser för SugarCRM måste uppdateras. Endast administratörer kan logga in.',
  'ERROR_NO_RECORD' => 'Fel vid hämtande av post. Posten är raderad eller så har du inte behörighet att visa den.',
  'LBL_DUP_MERGE' => 'Hitta kopior',
  'LBL_LOADING' => 'Laddar...',
  'LBL_SAVING_LAYOUT' => 'Sparar layout...',
  'LBL_SAVED_LAYOUT' => 'Layouten har sparats.',
  'LBL_SAVED' => 'Sparat',
  'LBL_SAVING' => 'Sparar',
  'LBL_DISPLAY_COLUMNS' => 'Visa kolumner',
  'LBL_HIDE_COLUMNS' => 'Dölj kolumner',
  'LBL_SEARCH_CRITERIA' => 'Sökkriterier',
  'LBL_SAVED_VIEWS' => 'Sparade vyer',
  'LBL_NO_RECORDS_FOUND' => '- 0 Poster hittade -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Servern är upptagen. Försök igen senare.',
  'LBL_CHANGE_PASSWORD' => 'Ändra lösenord',
  'LBL_LOGIN_TO_ACCESS' => 'Vänligen logga in för att få tillträde till detta område.',
);


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
  'checkbox_dom' => 
  array (
    '' => '',
    1 => 'Da',
    2 => 'Nu',
  ),
  'account_type_dom' => 
  array (
    '' => '',
    'Competitor' => 'Competitor',
    'Integrator' => 'Integrator',
    'Prospect' => 'Prospect',
    'Analyst' => 'Analist',
    'Customer' => 'Client',
    'Investor' => 'Investitor',
    'Partner' => 'Partener',
    'Press' => 'Apasa',
    'Reseller' => 'Revanzator',
    'Other' => 'Altul',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Media' => 'Media',
    'Apparel' => 'Haine',
    'Banking' => 'Bancar',
    'Biotechnology' => 'Biotehnologie',
    'Chemicals' => 'Chimice',
    'Communications' => 'Comunicatii',
    'Construction' => 'Constructie',
    'Consulting' => 'Consultare',
    'Education' => 'Educatie',
    'Electronics' => 'Electronice',
    'Energy' => 'Energie',
    'Engineering' => 'Inginerie',
    'Entertainment' => 'Divertisment',
    'Environmental' => 'Divertisment',
    'Finance' => 'Financiar',
    'Government' => 'Guvern',
    'Healthcare' => 'Sanatate',
    'Hospitality' => 'Spital',
    'Insurance' => 'Asigurare',
    'Machinery' => 'Masini',
    'Manufacturing' => 'Productie',
    'Not For Profit' => 'Fara Profit',
    'Recreation' => 'Agrement',
    'Retail' => 'Cu amanuntul',
    'Shipping' => 'Expediere',
    'Technology' => 'Tehnologie',
    'Telecommunications' => 'Telecomunicatii',
    'Transportation' => 'Transport',
    'Utilities' => 'Utilitati',
    'Other' => 'Altul',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Direct Mail' => 'Direct Mail',
    'Email' => 'Email',
    'Cold Call' => 'Apel rece',
    'Existing Customer' => 'Client existent',
    'Self Generated' => 'Autogenerat',
    'Employee' => 'Angajat',
    'Partner' => 'Partener',
    'Public Relations' => 'Relatii Publice',
    'Conference' => 'Conferinta',
    'Trade Show' => 'Expozitie',
    'Web Site' => 'Site Web',
    'Word of mouth' => 'Recomandari',
    'Other' => 'Altul',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Afacere existenta',
    'New Business' => 'Afacere noua',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Influencer' => 'Influencer',
    'Primary Decision Maker' => 'Factor de decizie primar',
    'Business Decision Maker' => 'Factor de decizie pentru afacere',
    'Business Evaluator' => 'Evaluator afacere',
    'Technical Decision Maker' => 'Factor de decizie tehnic',
    'Technical Evaluator' => 'Evaluator tehnic',
    'Executive Sponsor' => 'Sponsor executiv',
    'Other' => 'Altul',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Contact Primar',
    'Alternate Contact' => 'Contact aditional',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => 'Net 15',
    'Net 30' => 'Net 30',
  ),
  'sales_probability_dom' => 
  array (
    'Id. Decision Makers' => '40',
    'Prospecting' => 'Prospectare',
    'Qualification' => 'Calificare',
    'Needs Analysis' => 'Are nevoie de analiza',
    'Value Proposition' => 'Propunere valoare',
    'Perception Analysis' => 'Analiza de perceptie',
    'Proposal/Price Quote' => 'Propunere/ Cota de pret',
    'Negotiation/Review' => 'Negociere / Revizuire',
    'Closed Won' => 'Inchis Castigat',
    'Closed Lost' => '',
  ),
  'activity_dom' => 
  array (
    'Email' => 'Email',
    'Call' => 'Apel',
    'Meeting' => 'Intalnire',
    'Task' => 'Sarcină',
    'Note' => 'Nota',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Mr.' => 'Domnule',
    'Ms.' => 'Doamna',
    'Mrs.' => 'Doamna',
    'Dr.' => 'Doctor',
    'Prof.' => 'Profesor',
  ),
  'task_status_dom' => 
  array (
    'In Progress' => 'In Progress',
    'Not Started' => 'Nepornit',
    'Completed' => 'Completat',
    'Pending Input' => 'Asteapta intrari',
    'Deferred' => 'Amânat',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Nou',
    'Assigned' => 'Alocat',
    'In Process' => 'In progres',
    'Converted' => 'Convertit',
    'Recycled' => 'Reciclat',
    'Dead' => 'Mort',
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
  'record_type_display_notes' => 
  array (
    'Contacts' => 'Contact',
    'Emails' => 'Email',
    'Accounts' => 'Conturi',
    'Opportunities' => 'Oportunitati',
    'Cases' => 'Caz',
    'Leads' => 'Antet',
    'ProductTemplates' => 'Produs',
    'Quotes' => 'Cotatie',
    'Products' => 'Produs',
    'Contracts' => 'Conract',
    'Bugs' => 'Defect',
    'Project' => 'Proiect',
    'ProjectTask' => 'Sarcina de proiect',
    'Meetings' => 'Intalnire',
    'Calls' => 'Apel',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Influencer' => 'Influencer',
    'Primary Decision Maker' => 'Factor de decizie principal',
    'Business Decision Maker' => 'Factor de decizie afacerist',
    'Business Evaluator' => 'Evaluator afacere',
    'Technical Decision Maker' => 'Factor de decizie tehnic',
    'Technical Evaluator' => 'Evaluator tehnic',
    'Executive Sponsor' => 'Sponsor executiv',
    'Other' => 'Altul',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Urgent',
    'High' => 'Ridicat',
    'Medium' => 'Mediu',
    'Low' => 'Scazut',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Invalid' => 'Invalid',
    'Accepted' => 'Acceptat',
    'Duplicate' => 'Duplicat',
    'Fixed' => 'Rezolvat',
    'Out of Date' => 'Expirat',
    'Later' => 'Mai târziu',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Defect',
    'Feature' => 'Trăsături',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Forum' => 'Forum',
    'Web' => 'Web',
    'InboundEmail' => 'Email',
    'Internal' => 'Intern',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Calendar' => 'Calendar',
    'RSS' => 'RSS',
    'Studio' => 'Studio',
    'Upgrade' => 'Upgrade',
    'Accounts' => 'Conturi',
    'Activities' => 'Activitati',
    'Bug Tracker' => 'Agent Urmarire Probleme',
    'Calls' => 'Apeluri',
    'Campaigns' => 'Campanii',
    'Cases' => 'Cazuri',
    'Contacts' => 'Contact',
    'Currencies' => 'Valute',
    'Dashboard' => 'Tablou de bord',
    'Documents' => 'Documente',
    'Emails' => 'Email-uri',
    'Feeds' => 'Feed-uri',
    'Forecasts' => 'Previziuni',
    'Help' => 'Ajutor',
    'Home' => 'Acasa',
    'Leads' => 'Antete',
    'Meetings' => 'Intalniri',
    'Notes' => 'Note',
    'Opportunities' => 'Oportunitati',
    'Outlook Plugin' => 'Outlook Plug-in',
    'Product Catalog' => 'Catalog de produse',
    'Products' => 'Produse',
    'Projects' => 'Proiecte',
    'Quotes' => 'Cotatie',
    'Releases' => 'Lansări',
    'Users' => 'Utilizatori',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Planificat',
    'Active' => 'Activ',
    'Inactive' => 'Inactiv',
    'Complete' => 'Completat',
    'In Queue' => 'In coada',
    'Sending' => 'Se trimite',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Telesales' => 'Telesales',
    'Mail' => 'Mail',
    'Email' => 'Email',
    'Web' => 'Web',
    'Radio' => 'Radio',
    'Print' => 'Imprimare',
    'Television' => 'Televiziune',
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
    1 => 'Ianuarie',
    2 => 'Februarie',
    3 => 'Martie',
    4 => 'Aprilie',
    5 => 'Mai',
    6 => 'Iunie',
    7 => 'Iulie',
    9 => 'Septembrie',
    10 => 'Octombrie',
    11 => 'Noiembrie',
    12 => 'Decembrie',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Nimic--',
  ),
  'dom_mailbox_type' => 
  array (
    'bounce' => 'Bounce Handling',
    'pick' => 'Creaza[Orice]',
    'bug' => 'Creaza greseala',
    'support' => 'Creaza caz',
    'contact' => 'Creaza Contact',
    'sales' => 'Creaza Lead',
    'task' => 'Creaza sarcina',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    '' => '--Nimic--',
    'direct' => 'Atribuire directă',
    'leastBusy' => 'Cel mai putin ocupat',
  ),
  'forecast_type_dom' => 
  array (
    'Direct' => 'Direct',
    'Rollup' => 'Ruleaza in sus',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Marketing',
    'Knowledege Base' => 'Baza de cunostinte',
    'Sales' => 'Vanzari',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'Marketing Collateral' => 'Colaterala de Marketing',
    'Product Brochures' => 'Brosuri ale produsului',
    'FAQ' => 'Intrebari puse cel mai des',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Îmbinare corespondenţă',
    'license' => 'Acord de licenţă',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Plus',
    '-' => '(-) Minus',
    '*' => '(X) Multiplicat Cu',
    '/' => '(/) Impartit la',
  ),
  'wflow_address_type_dom' => 
  array (
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'to' => 'spre',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'to' => 'spre',
    'invite_only' => '(Invita numai)',
  ),
  'dom_timezones_extra' => 
  array (
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
    4 => '(GMT+4) Kabul',
    5 => '(GMT+5) Ekaterinburg',
    6 => '(GMT+6) Astana',
    7 => '(GMT+7) Bangkok',
    8 => '(GMT+8) Perth',
    9 => '(GMT+9) Seol',
    10 => '(GMT+10) Brisbane',
    11 => '(GMT+11) Solomone Is.',
    12 => '(GMT+12) Auckland',
    -12 => '(GMT-12) Data internaţionala pentru linia de Vest',
    2 => '(GMT+2) Atena',
    3 => '(GMT+3) Moscova',
  ),
  'duration_intervals' => 
  array (
    15 => '15',
    45 => '45',
    30 => '30',
  ),
  'prospect_list_type_dom' => 
  array (
    'test' => 'Test',
    'default' => 'Initial',
    'seed' => 'Samanta',
    'exempt_domain' => 'Lista cu suprimari - de Domeniu',
    'exempt_address' => 'Lista cu suprimari - de Adresa de Email',
    'exempt' => 'Lista de suprimari - de ID',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '',
    'active' => 'Activ',
    'inactive' => 'Inactiv',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Mesaj trimis/Incercat',
    'send error' => 'Mesaje returnate, Altele',
    'invalid email' => 'Mesaje returnate, Email invalid',
    'link' => 'Faceţi clic pe link',
    'viewed' => 'Mesaj Vazut',
    'removed' => 'Optat Afara',
    'lead' => 'Initiativa Creata',
    'contact' => 'Contacte create',
  ),
  'language_pack_name' => 'RO Romana',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Cotatie',
  'moduleList' => 
  array (
    'Home' => 'Acasa',
    'Bugs' => 'Defect',
    'Cases' => 'Cazuri',
    'Notes' => 'Note',
    'Newsletters' => 'Noutati',
    'Teams' => 'Echipe',
    'Users' => 'Utilizatori',
    'KBDocuments' => 'Cunostinte de baza',
    'FAQ' => 'IRF',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Acasa',
    'Bugs' => 'Defect',
    'Cases' => 'Caz',
    'Notes' => 'Nota',
    'Teams' => 'Echipa',
    'Users' => 'Utilizator',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'Prospectare',
    'Qualification' => 'Calificare',
    'Needs Analysis' => 'Are nevoie de analiza',
    'Value Proposition' => 'Valoarea propunerii',
    'Id. Decision Makers' => 'Factorii de decizie Id.',
    'Perception Analysis' => 'Analiza perceptiei',
    'Proposal/Price Quote' => 'Propunere / Cota de pret',
    'Negotiation/Review' => 'Negociere/ Revizuire',
    'Closed Won' => 'Inchis Castigat',
    'Closed Lost' => 'Inchis Pierdut',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minut înainte de',
    300 => '5 minute înainte de',
    600 => '10 minute înainte de',
    900 => '15 minute înainte de',
    1800 => '30 minute înainte de',
    3600 => '1 ora înainte de',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Ridicat',
    'Medium' => 'Mediu',
    'Low' => 'Scazut',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Planuit',
    'Held' => 'Tinut',
    'Not Held' => 'Nu s-a tinut',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Planuit',
    'Held' => 'Tinut',
    'Not Held' => 'Nu s-a tinut',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Intare',
    'Outbound' => 'Iesire',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Nou',
    'Assigned' => 'Alocat',
    'In Process' => 'In proces',
    'Converted' => 'Convertit',
    'Recycled' => 'Reciclat',
    'Dead' => 'Mort',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Nou',
    'Assigned' => 'Alocat',
    'Closed' => 'Inchis',
    'Pending Input' => 'Asteapta intrari',
    'Rejected' => 'Respins',
    'Duplicate' => 'Duplicat',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Ridicat',
    'P2' => 'Mediu',
    'P3' => 'Scazut',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Activ',
    'Inactive' => 'Inactiv',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Activ',
    'Terminated' => 'Terminat',
    'Leave of Absence' => 'Invoit',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Ridicat',
    'Medium' => 'Mediu',
    'Low' => 'Scazut',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Nepornit',
    'In Progress' => 'In Progres',
    'Completed' => 'Completat',
    'Pending Input' => 'Asteapta intrari',
    'Deferred' => 'Amânat',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Conturi',
    'Opportunities' => 'Oportunitati',
    'Cases' => 'Caz',
    'Leads' => 'Antet',
    'Contacts' => 'Contact',
    'ProductTemplates' => 'Produs',
    'Quotes' => 'Cotatie',
    'Bugs' => 'Defect',
    'Project' => 'Proiect',
    'ProjectTask' => 'Sarcina de proiect',
    'Tasks' => 'Sarcina',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Cotatie',
    'Orders' => 'Comanda',
    'Ship' => 'Transportat',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Fix',
    'ProfitMargin' => 'Marja de profit',
    'PercentageMarkup' => 'Marcare peste cost',
    'PercentageDiscount' => 'Discount din lista',
    'IsList' => 'La fel ca lista',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'In stoc',
    'Unavailable' => 'Iesit din stoc',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Taxabil',
    'Non-Taxable' => 'Netaxabil',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Sase luni',
    '+1 year' => 'Un an',
    '+2 years' => 'Doi ani',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Cotatie',
    'Orders' => 'Comanda',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Schita',
    'Negotiation' => 'Negociere',
    'Delivered' => 'Livrat',
    'On Hold' => 'Pauza',
    'Confirmed' => 'Confirmat',
    'Closed Accepted' => 'Inchis acceptat',
    'Closed Lost' => 'Inchis pierdut',
    'Closed Dead' => 'Inchis mort',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'In asteptare',
    'Confirmed' => 'Confirmat',
    'On Hold' => 'Pauza',
    'Shipped' => 'Transportat',
    'Cancelled' => 'Anulat',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Propunere',
    'Invoice' => 'Factura',
    'Terms' => 'Termeni de plata',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Nou',
    'Assigned' => 'Alocat',
    'Closed' => 'Inchis',
    'Pending' => 'In asteptare',
    'Rejected' => 'Respins',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Randuri si coloane',
    'summary' => 'Sumar',
    'detailed_summary' => 'Sumar cu detalii',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Trimis',
    'archived' => 'Arhivat',
    'draft' => 'Schita',
    'inbound' => 'Intrari',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Arhivat',
    'closed' => 'Inchis',
    'draft' => 'Schita',
    'read' => 'Citit',
    'replied' => 'Raspuns',
    'sent' => 'Trimis',
    'send_error' => 'Eroare de trimitere',
    'unread' => 'Necitit',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Selectaţi doar un singur utilizator atunci când atribuiti direct elementele.',
    2 => 'Trebuie să alocaţi numai elemente verificate atunci când elementele atribuirea directă.',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Da',
    'bool_false' => 'Nu',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Da',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Da',
    'off' => 'Nu',
    '' => 'Nu',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Sistemul implicit mail client',
    'sugar' => 'SugarCRM mail client',
    'mailto' => 'Client mail extern',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Format Implicit e-mail',
    'html' => 'Email HTML',
    'plain' => 'Email text',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Past Run Time, nu a fost executat',
    'ready' => 'Gata',
    'in progress' => 'In progres',
    'failed' => 'Esuat',
    'completed' => 'Completat',
    'no curl' => 'Nu s-a rulat: Nu exista cURL',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Activ',
    'Inactive' => 'Inactiv',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Activ',
    'Draft' => 'Schita',
    'FAQ' => 'Intrebari puse cel mai frecvent',
    'Expired' => 'Expirat',
    'Under Review' => 'În curs de revizuire',
    'Pending' => 'In asteptare',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Acceptat',
    'decline' => 'Refuz',
    'tentative' => 'Tentativa',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Acceptat',
    'decline' => 'Refuzat',
    'tentative' => 'Tentativa',
    'none' => 'Niciunul',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'Atunci când inregistrarea a fost salvata',
    'Time' => 'Dupa ce timpul expira',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Este',
    'in' => 'este Una din',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Rezulta',
    'Does not Equal' => 'Nu rezulta',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Rezulta',
    'Less Than' => 'Mai Putin Decat',
    'More Than' => 'Mai Mult Decat',
    'Does not Equal' => 'Nu este egal',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Da',
    'bool_false' => 'Nu',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Rezulta',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 ore',
    28800 => '8 ore',
    43200 => '12 ore',
    86400 => '1 zi',
    172800 => '2 zile',
    259200 => '3 zile',
    345600 => '4 zile',
    432000 => '5 zile',
    604800 => '1 saptamana',
    1209600 => '2 saptamani',
    1814400 => '3 saptamani',
    2592000 => '30 de zile',
    5184000 => '60 de zile',
    7776000 => '90 zile',
    10368000 => '120 zile',
    12960000 => '150 de zile',
    15552000 => '180 de zile',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'A fost mai mult decat',
    'Less Than' => 'este mai putin decat',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'E-mail',
    'Invite' => 'Invita',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Mesaj Normal',
    'Custom Template' => 'Sablon la comanda',
    'System Default' => 'Sistem implicit',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Utilizatori actuali',
    'rel_user' => 'Utilizatori Asociati',
    'rel_user_custom' => 'Utilizator Asociat La Comanda',
    'specific_team' => 'Echipa Specifica',
    'specific_role' => 'Rol Specific',
    'specific_user' => 'Utilizator Specific',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Valoare Noua',
    'past' => 'Valoare Veche',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Utilizator',
    'Manager' => 'Utilizatorului conducator',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Spre:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Update Inregistrare',
    'update_rel' => 'Update inregistrare inrudita',
    'new' => 'Noua Inregistrare',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Data declansarii',
    'Existing Value' => 'Valoare esistenta',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Optiuni de baza',
    'Advanced' => 'Optiune avansate',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Utilizator desemnat cu inregistrarea declansarii',
    'modified_user_id' => 'Utilizator care a modificat ultima inregistrare a declansarii',
    'created_by' => 'Utilizator care a creat inregistrarea declansarii',
    'current_user' => 'Utilizatori Logati',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Echipa actuala a inregistrarii declansarii',
    'current_team' => 'Echipa Logata a utilizatorului',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Muta innapoi esecul cu',
    'advance' => 'Muta esecul innainte cu',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Un nou si inregistrari exostente',
    'New' => 'Numai Inregistrari Noi',
    'Update' => 'Numai inregistrari existente',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Toate care au legatura',
    'filter' => 'Toate care au legatura cu filtru',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'Toate care au legatura',
    'any' => 'oricare care au legatura',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Alerte dupa Actiuni',
    'actions_alerts' => 'Alerte dupa Actiuni',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Contacte',
    'Users' => 'Utilizatori',
    'Prospects' => 'Tinte',
    'Leads' => 'Antete',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Nepornit',
    'inprogress' => 'In progres',
    'signed' => 'Semnat',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Lunar',
    'quarterly' => 'La fiecare 4 luni',
    'halfyearly' => 'La fiecare jumatate de an',
    'yearly' => 'In fiecare an',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => 'O zi',
    3 => '3 zile',
    5 => '5 zile',
    7 => 'O saptamana',
    14 => '2 saptamani',
    21 => '3 saptamani',
    31 => '1 luna',
  ),
);

$app_strings = array (
  'LNK_LIST_NEXT' => 'Urmator',
  'LNK_LIST_PREVIOUS' => 'Anterior',
  'LNK_LIST_RETURN' => 'Revenire la Lista',
  'LNK_LIST_START' => 'Start',
  'LNK_LOAD_SIGNED' => 'Semneaza',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Inlocuieste cu document semnat',
  'LNK_PRINT' => 'Imprimare',
  'LNK_REMOVE' => 'inlatura',
  'LNK_RESUME' => 'Continua',
  'LNK_VIEW_CHANGE_LOG' => 'Vizualizeaza Jurnal Schimbari',
  'NTC_CLICK_BACK' => 'Va rugam dati clik pe butonul Inapoi al browser-ului si remediati eroarea.',
  'NTC_DATE_FORMAT' => '(aaaa-ll-zz)',
  'NTC_DATE_TIME_FORMAT' => '(aaaa-ll-zz 24:00)',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Sunteti sigur ca doriti sa stergeti inregistrarile selectate?',
  'NTC_DELETE_CONFIRMATION' => 'Sunteti sigur ca doriti sa stergeti aceasta inregistrare?',
  'NTC_LOGIN_MESSAGE' => 'Va rugam sa va introduceti numele de utilizator si parola:',
  'NTC_NO_ITEMS_DISPLAY' => 'niciunul',
  'NTC_REMOVE_CONFIRMATION' => 'Sunteţi sigur că doriţi să inlaturati aceasta relatie?',
  'NTC_REQUIRED' => 'Indica campurile necesare',
  'NTC_SUPPORT_SUGARCRM' => 'Sprijina proiectul sursa deschisa SugarCRM cu o donatie prin PayPal - este rapid, gratuit si sigur!',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_WELCOME' => 'Bun venit',
  'NTC_YEAR_FORMAT' => '(aaaa)',
  'LOGIN_LOGO_ERROR' => 'Va rugam inlocuiti logo-urile SugarCRM.',
  'ERROR_FULLY_EXPIRED' => 'Licenta SugarCRM a companiei dumneavoastra a expirat de mai mult de 30 de zile si necesita a fi actualizata. Numai administratorii se pot conecta.',
  'ERROR_LICENSE_EXPIRED' => 'Licenta SugarCRM a companiei dumneavoastra necesita a fi actualizata. Numai administratorii se pot conecta.',
  'ERROR_NO_RECORD' => 'Eroare la refacerea inregistrarii. Aceasta inregistrare poate a fost stearsa sau poate nu sunteti autorizat sa o vizualizati.',
  'LBL_DUP_MERGE' => 'Gaseste Duplicate',
  'LBL_LOADING' => 'Incarcare...',
  'LBL_SAVING_LAYOUT' => 'Salvare Schema...',
  'LBL_SAVED_LAYOUT' => 'Schema a fost salvata.',
  'LBL_SAVED' => 'Salvat',
  'LBL_SAVING' => 'Salvare',
  'LBL_DISPLAY_COLUMNS' => 'Afiseaza Coloane',
  'LBL_HIDE_COLUMNS' => 'Ascunde Coloane',
  'LBL_SEARCH_CRITERIA' => 'Criterii de Cautare',
  'LBL_SAVED_VIEWS' => 'Salveaza Vizualizari',
  'LBL_NO_RECORDS_FOUND' => '- 0 Inregistrari Gasite -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Serverul este prea ocupat. Va rugam sa incercati mai tarziu.',
  'LBL_CHANGE_PASSWORD' => 'Schimba Parola',
  'LBL_LOGIN_TO_ACCESS' => 'Va rugam sa va autentificati pentru a accesa aceasta zona.',
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
  'LBL_CONTACT' => 'Contact',
  'LBL_DELETE_BUTTON_KEY' => 'D',
  'LBL_DONE_BUTTON_KEY' => 'X',
  'LBL_DUPLICATE_BUTTON_KEY' => 'U',
  'LBL_EDIT_BUTTON_KEY' => 'E',
  'LBL_VIEW_BUTTON_KEY' => 'V',
  'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
  'LBL_ID' => 'ID',
  'LBL_LIST_EMAIL' => 'Email',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'John',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Doe',
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
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'LNK_ABOUT' => 'About',
  'LBL_LIST_TEAM' => 'Echipa',
  'LBL_TEAM' => 'Echipa:',
  'LBL_TEAM_ID' => 'ID Echipa:',
  'ERR_CREATING_FIELDS' => 'Eroare la completarea campurilor de detalii aditionale',
  'ERR_CREATING_TABLE' => 'Eroare la crearea tabelului:',
  'ERR_DELETE_RECORD' => 'Un numar de inregistrare trebuie sa fie specificat pentru a sterge contactul.',
  'ERR_EXPORT_DISABLED' => 'Exporta Dezactivate.',
  'ERR_EXPORT_TYPE' => 'Eroare la exportare',
  'ERR_INVALID_AMOUNT' => 'Va rugam sa introduceti o cantitate valida.',
  'ERR_INVALID_DATE_FORMAT' => 'Formatul datelor trebuie sa fie:',
  'ERR_INVALID_DATE' => 'Va rugam sa introduceti o data valida.',
  'ERR_INVALID_DAY' => 'Va rugam sa introduceti o zi valida.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'nu este o adresa de email valida.',
  'ERR_INVALID_HOUR' => 'Va rugam introduceti o ora valida.',
  'ERR_INVALID_MONTH' => 'Va rugam sa introduceti o luna valida.',
  'ERR_INVALID_TIME' => 'Va rugam sa introduceti un timp valid.',
  'ERR_INVALID_YEAR' => 'Va rugam sa introduceti un an, in format de 4 digiti, valid.',
  'ERR_NEED_ACTIVE_SESSION' => 'Este necesara o sesiune activa pentru a exporta continutul.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Lipsesc campurile necesare:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Campuri necesare invalide:',
  'ERR_INVALID_VALUE' => 'Valoare invalida:',
  'ERR_NOTHING_SELECTED' => 'Va rugam sa faceti o selectie inainte de a continua.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'O oportunitate cu numele %s exista deja. Va rugam sa introduceti mai jos un alt nume.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Nu a fost introdus un nume de oportunitate. Va rugam sa introduceti mai jos un nume de oportunitate.',
  'ERR_SELF_REPORTING' => 'Utilizatorul nu-si poate raporta sie insusi.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Nu exista potrivire pentru campul:',
  'ERR_SQS_NO_MATCH' => 'Nu exista Potrivire',
  'ERR_PORTAL_LOGIN_FAILED' => 'Nu este posibila crearea sesiunii de conectare portal. Va rugam sa contactati administratorul.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Reintoarcere la Acasa',
  'LBL_ACCOUNT' => 'Cont',
  'LBL_ACCOUNTS' => 'Conturi',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Vizualizeaza Sumar',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Vizualizeaza Sumar [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Adauga [Alt+A]',
  'LBL_ADD_BUTTON' => 'Adauga',
  'LBL_ADD_DOCUMENT' => 'Adauga Document ',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Adauga la Lista Tinte',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Adauga la Lista Tinte',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Click pentru Inchidere',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Inchide',
  'LBL_ADDITIONAL_DETAILS' => 'Detalii Aditionale',
  'LBL_ADMIN' => 'Administrator',
  'LBL_ARCHIVE' => 'Arhiva',
  'LBL_ASSIGNED_TO_USER' => 'Atribuit Utilizatorului',
  'LBL_ASSIGNED_TO' => 'Atribuit Lui:',
  'LBL_BACK' => 'Inapoi',
  'LBL_BILL_TO_ACCOUNT' => 'Factureaza in Contul',
  'LBL_BILL_TO_CONTACT' => 'Factureaza la Contact',
  'LBL_BROWSER_TITLE' => 'SugarCRM - Sursa Deschisa Comerciala CRM',
  'LBL_BUGS' => 'Deficiente',
  'LBL_BY' => 'de',
  'LBL_CALLS' => 'Apeluri',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Transmite Emailurile Campaniilor dispuse in Coada',
  'LBL_CANCEL_BUTTON_LABEL' => 'Anulare',
  'LBL_CANCEL_BUTTON_TITLE' => 'Anulare [Alt+X]',
  'LBL_CASE' => 'Caz',
  'LBL_CASES' => 'Cazuri',
  'LBL_CHANGE_BUTTON_LABEL' => 'Schimba',
  'LBL_CHANGE_BUTTON_TITLE' => 'Schimba [Alt+G]',
  'LBL_CHECKALL' => 'Verifica Totul',
  'LBL_CLEAR_BUTTON_LABEL' => 'Sterge',
  'LBL_CLEAR_BUTTON_TITLE' => 'Sterge [Alt+C]',
  'LBL_CLEARALL' => 'Sterge Totul',
  'LBL_CLOSE_WINDOW' => 'Inchide Fereastra',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Inchide Totul',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Inchide Totul [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Compune Email',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Compune Email [Alt+L]',
  'LBL_CONTACT_LIST' => 'Lista Contacte',
  'LBL_CONTACTS' => 'Contacte',
  'LBL_CREATE_BUTTON_LABEL' => 'Creaza',
  'LBL_CREATED_BY_USER' => 'Creata de Utilizator',
  'LBL_CREATED' => 'Creat de',
  'LBL_CURRENT_USER_FILTER' => 'Numai itemii mei:',
  'LBL_DATE_ENTERED' => 'Data Crearii:',
  'LBL_DATE_MODIFIED' => 'Ultima Modificare:',
  'LBL_DELETE_BUTTON_LABEL' => 'Sterge',
  'LBL_DELETE_BUTTON_TITLE' => 'Stege [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Sterge',
  'LBL_DELETE' => 'Sterge',
  'LBL_DELETED' => 'Stears',
  'LBL_DIRECT_REPORTS' => 'Rapoarte Directe',
  'LBL_DONE_BUTTON_LABEL' => 'Indeplinit',
  'LBL_DONE_BUTTON_TITLE' => 'Indeplinit [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'Aplicati necesita aplicarea unei setari Daylight Saving Time. Va rugam accesati link-ul Reparare din cadrul consolei Administator si aplicati setarea Daylight Saving Time.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Duplicat',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Duplicat [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Duplicat',
  'LBL_EDIT_BUTTON_LABEL' => 'Editeaza',
  'LBL_EDIT_BUTTON_TITLE' => 'Editare [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Editeaza',
  'LBL_VIEW_BUTTON_LABEL' => 'Vizualizare',
  'LBL_VIEW_BUTTON_TITLE' => 'Vizualizare [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Vizualizare',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Email ca PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Email ca PDF [Alt+M]',
  'LBL_EMAILS' => 'Email-uri',
  'LBL_EMPLOYEES' => 'Angajati',
  'LBL_ENTER_DATE' => 'Introduceti Date',
  'LBL_EXPORT_ALL' => 'Exporta Totul',
  'LBL_EXPORT' => 'Exporta',
  'LBL_HIDE' => 'Ascunde',
  'LBL_IMPORT_PROSPECTS' => 'Importa Tinte',
  'LBL_IMPORT' => 'Importa',
  'LBL_LAST_VIEWED' => 'Vizualizat Ultima Data',
  'LBL_LEADS' => 'Calauze',
  'LBL_LIST_ACCOUNT_NAME' => 'Nume Cont',
  'LBL_LIST_ASSIGNED_USER' => 'Utilizator',
  'LBL_LIST_CONTACT_NAME' => 'Nume Contact',
  'LBL_LIST_CONTACT_ROLE' => 'Rol Contact',
  'LBL_LIST_NAME' => 'Nume',
  'LBL_LIST_OF' => 'din',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_USER_NAME' => 'Nume Utilizator',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Sunteti sigur ca doriti sa actualizati intreaga lista?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Va rugam selectati cel putin 1 inregistrare pentru a continua.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Pagina Curenta',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Lista Intreaga',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Inregistrari Selectate',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Selectat:',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Dl.',
  'LBL_LOGOUT' => 'Delogare',
  'LBL_MAILMERGE' => 'Îmbinare Corespondenţă',
  'LBL_MASS_UPDATE' => 'Actualizare In Masa',
  'LBL_MEETINGS' => 'Intalniri',
  'LBL_MEMBERS' => 'Membri',
  'LBL_MODIFIED_BY_USER' => 'Modificata de Utilizator',
  'LBL_MODIFIED' => 'Modificat de',
  'LBL_MY_ACCOUNT' => 'Contul Meu',
  'LBL_NAME' => 'Nume',
  'LBL_NEW_BUTTON_LABEL' => 'Creaza',
  'LBL_NEW_BUTTON_TITLE' => 'Creaza [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Urmatorul',
  'LBL_NONE' => '--Niciunul--',
  'LBL_NOTES' => 'Note',
  'LBL_OPENALL_BUTTON_LABEL' => 'Deschide Totul',
  'LBL_OPENALL_BUTTON_TITLE' => 'Deschide Totul [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Deschide La:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Deschide La: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Oportunitati',
  'LBL_OPPORTUNITY_NAME' => 'Nume Oportunitate',
  'LBL_OPPORTUNITY' => 'Oportunitate',
  'LBL_OR' => 'SAU',
  'LBL_PRODUCT_BUNDLES' => 'Colectii de Produse',
  'LBL_PRODUCTS' => 'Produse',
  'LBL_PROJECT_TASKS' => 'Sarcini de Proiect',
  'LBL_PROJECTS' => 'Proiecte',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Creaza Oportunitate din Cota',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Creaza Oportunitate din Cota [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Cote Transportate la',
  'LBL_QUOTES' => 'Cote',
  'LBL_RELATED_RECORDS' => 'Inregistrari Relationate',
  'LBL_REMOVE' => 'Inlatura',
  'LBL_SAVE_BUTTON_LABEL' => 'Salveaza',
  'LBL_SAVE_BUTTON_TITLE' => 'Salveaza [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Formular Complet',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Formular Complet [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Salveaza & Creaza Nou',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Salveaza & Creaza Nou [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Cauta',
  'LBL_SEARCH_BUTTON_TITLE' => 'Cauta [Alt+Q]',
  'LBL_SEARCH' => 'Cauta',
  'LBL_SELECT_BUTTON_LABEL' => 'Selecteaza',
  'LBL_SELECT_BUTTON_TITLE' => 'Selecteaza [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Selecteaza Contact',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Selecteaza Contact [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Selecteaza din Rapoarte',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Selecteaza Rapoarte',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Selecteaza Utilizator',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Selecteaza Utilizator [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Resurse utilizate pentru construirea acestei pagini (interogari, fisiere)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'secunde.',
  'LBL_SERVER_RESPONSE_TIME' => 'Timp de raspuns server:',
  'LBL_SHIP_TO_ACCOUNT' => 'Transporta la Cont',
  'LBL_SHIP_TO_CONTACT' => 'Transporta la Contact',
  'LBL_SHORTCUTS' => 'Scurtaturi',
  'LBL_SHOW' => 'Arata',
  'LBL_STATUS_UPDATED' => 'Statutul tau pentru acest eveniment a fost actualizat!',
  'LBL_STATUS' => 'Statut:',
  'LBL_SUBJECT' => 'Subiect',
  'LBL_SYNC' => 'Sincronizare',
  'LBL_TASKS' => 'Sarcini',
  'LBL_TEAMS_LINK' => 'Echipa',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arhiveaza Email',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arhiveaza Email [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Acces neautorizat la administrare',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Anuleaza stergerea',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Anuleaza stergerea [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Anuleaza stergerea',
  'LBL_UNDELETE' => 'Anuleaza stergerea',
  'LBL_UNSYNC' => 'Anuleaza sincronizarea',
  'LBL_UPDATE' => 'Actualizeaza',
  'LBL_USER_LIST' => 'Lista Utilizatori',
  'LBL_USERS_SYNC' => 'Sincronizare Utilizatori ',
  'LBL_USERS' => 'Utilizatori',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Imprima ca PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Imprima ca PDF [Alt+P]',
  'LNK_ADVANCED_SEARCH' => 'Avansat',
  'LNK_BASIC_SEARCH' => 'Elementar',
  'LNK_DELETE_ALL' => 'sterge totul',
  'LNK_DELETE' => 'sterge',
  'LNK_EDIT' => 'editare',
  'LNK_GET_LATEST' => 'Obtine ultimele',
  'LNK_GET_LATEST_TOOLTIP' => 'Inlocuieste cu ultima versiune',
  'LNK_HELP' => 'Ajutor',
  'LNK_LIST_END' => 'Sfarsit',
);


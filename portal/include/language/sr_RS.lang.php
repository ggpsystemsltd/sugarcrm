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
  'prospect_list_type_dom' => 
  array (
    'seed' => 'Seed',
    'exempt_domain' => 'Suppression List - By Domain',
    'exempt_address' => 'Suppression List - By Email Address',
    'exempt' => 'Suppression List - By Id',
    'test' => 'Test',
    'default' => 'Podrazumevano',
  ),
  'account_type_dom' => 
  array (
    'Integrator' => 'Integrator',
    'Partner' => 'Partner',
    '' => '-nema-',
    'Analyst' => 'Analitičar',
    'Competitor' => 'Konkurent',
    'Customer' => 'Korisnik',
    'Investor' => 'Investitor',
    'Press' => 'Novinar',
    'Prospect' => 'Verovatni Kupac',
    'Reseller' => 'Preprodavac',
    'Other' => 'Ostalo',
  ),
  'lead_source_dom' => 
  array (
    'Partner' => 'Partner',
    'Email' => 'Email',
    '' => '-nema-',
    'Cold Call' => 'Prvi poziv',
    'Existing Customer' => 'Postojeći klijent',
    'Self Generated' => 'Automatski generisan',
    'Employee' => 'Zaposleni',
    'Public Relations' => 'Odnosi sa javnošću',
    'Direct Mail' => 'Direktna pošta',
    'Conference' => 'Konferencija',
    'Trade Show' => 'Sajam',
    'Web Site' => 'Web Sajt',
    'Word of mouth' => 'Usmena preporuka',
    'Other' => 'Ostalo',
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
  'activity_dom' => 
  array (
    'Email' => 'Email',
    'Call' => 'Poziv',
    'Meeting' => 'Sastanak',
    'Task' => 'Zadatak',
    'Note' => 'Beleška',
  ),
  'messenger_type_dom' => 
  array (
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
    '' => '-nema-',
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
    'Emails' => 'Email',
    'Accounts' => 'Kompanija',
    'Contacts' => 'Kontakt',
    'Opportunities' => 'Prodajna prilika',
    'Cases' => 'Slučaj',
    'Leads' => 'Potencijalni klijent',
    'ProductTemplates' => 'Proizvod',
    'Quotes' => 'Ponuda',
    'Products' => 'Proizvod',
    'Contracts' => 'Ugovor',
    'Bugs' => 'Defekt',
    'Project' => 'Projekat',
    'ProjectTask' => 'Projektni Zadatak',
    'Meetings' => 'Sastanak',
    'Calls' => 'Pozi',
  ),
  'source_dom' => 
  array (
    'Forum' => 'Forum',
    'Web' => 'Web',
    'InboundEmail' => 'Email',
    '' => '-nema-',
    'Internal' => 'Interni',
  ),
  'product_category_dom' => 
  array (
    'RSS' => 'RSS',
    'Studio' => 'Studio',
    '' => '-nema-',
    'Accounts' => 'Kompanije',
    'Activities' => 'Aktivnosti',
    'Bug Tracker' => 'Praćenje defekata',
    'Calendar' => 'Kalendar',
    'Calls' => 'Pozivi',
    'Campaigns' => 'Kampanje',
    'Cases' => 'Slučajevi',
    'Contacts' => 'Kontakti',
    'Currencies' => 'Valute',
    'Dashboard' => 'Kontrolna tabla',
    'Documents' => 'Dokumenta',
    'Emails' => 'Email-ovi',
    'Feeds' => 'Feed-ovi',
    'Forecasts' => 'Prognoze',
    'Help' => 'Pomoć',
    'Home' => 'Početna strana',
    'Leads' => 'Potencijalni klijenti',
    'Meetings' => 'Sastanci',
    'Notes' => 'Beleške',
    'Opportunities' => 'Prodajne prilike',
    'Outlook Plugin' => 'Dodatak za Outlook',
    'Product Catalog' => 'Katalog proizvoda',
    'Products' => 'Proizvodi',
    'Projects' => 'Projekti',
    'Quotes' => 'Ponude',
    'Releases' => 'Izdanja',
    'Upgrade' => 'Ažuriraj',
    'Users' => 'Korisnici',
  ),
  'campaign_type_dom' => 
  array (
    'Mail' => 'Mail',
    'Email' => 'Email',
    'Web' => 'Web',
    'Radio' => 'Radio',
    '' => '-nema-',
    'Telesales' => 'Teleprodaja',
    'Print' => 'Štampa',
    'Television' => 'Televizija',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
    1 => '(GMT + 1) Madrid',
    4 => '(GMT + 4) Kabul',
    5 => '(GMT + 5) Ekaterinburg',
    6 => '(GMT + 6) Astana',
    7 => '(GMT + 7) Bangkok',
    -12 => '(GMT - 12) Međunarodna datumska granica - zapad',
    -11 => '(GMT - 11) Ostrvo Midvej, Samoa',
    -10 => '(GMT - 10) SAD: Havaji',
    -9 => '(GMT - 9) SAD: Aljaska',
    -8 => '(GMT - 8) SAD: San Francisko',
    -7 => '(GMT - 7) Feniks',
    -6 => '(GMT - 6) Kanada: Saskačuan',
    -5 => '(GMT - 5) SAD: Njujork',
    -4 => '(GMT - 4) Santijago',
    -3 => '(GMT - 3) Buenos Ajres',
    -2 => '(GMT - 2) Srednji Atlantik',
    -1 => '(GMT - 1) Azorska ostrva',
    2 => '(GMT + 2) Atina',
    3 => '(GMT + 3) Moskva',
    8 => '(GMT + 8) Pert',
    9 => '(GMT + 9) Seul',
    10 => '(GMT + 10) Brisbejn',
    11 => '(GMT + 11) Solomonska ostrva',
    12 => '(GMT + 12) Okland',
  ),
  'dom_cal_month_long' => 
  array (
    4 => 'April',
    1 => 'Januar',
    2 => 'Februar',
    3 => 'Mart',
    5 => 'Maj',
    6 => 'Jun',
    7 => 'Jul',
    8 => 'Avgust',
    9 => 'Septembar',
    10 => 'Oktobar',
    11 => 'Novembar',
    12 => 'Decembar',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Nema--',
  ),
  'dom_email_editor_option' => 
  array (
    'html' => 'HTML Email',
    '' => 'Podrazumevani Email Format',
    'plain' => 'Tekstualni Email',
  ),
  'document_category_dom' => 
  array (
    'Marketing' => 'Marketing',
    '' => '-nema-',
    'Knowledege Base' => 'Baza Znanja',
    'Sales' => 'Prodaja',
  ),
  'document_template_type_dom' => 
  array (
    'eula' => 'EULA',
    'nda' => 'NDA',
    '' => '-nema-',
    'mailmerge' => 'Spajanje Email-ova',
    'license' => 'Sporazum o licenci',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Plus',
    '-' => '(-) Minus',
    '*' => '(X) Množenje sa',
    '/' => '(/) Deljenje sa',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'Email',
    'Invite' => 'Pozovi',
  ),
  'dom_timezones_extra' => 
  array (
    -8 => '(GMT-8) (PST)',
    -7 => '(GMT-7) (MST)',
    -6 => '(GMT-6) (CST)',
    -5 => '(GMT-5) (EST)',
    -4 => '(GMT-4) Santiago',
    1 => '(GMT+1) Madrid',
    4 => '(GMT+4) Kabul',
    5 => '(GMT+5) Ekaterinburg',
    6 => '(GMT+6) Astana',
    7 => '(GMT+7) Bangkok',
    -12 => '(GMT-12) Međunarodna datumska granica - zapad',
    -11 => '(GMT-11) Ostrvo Midvej, Samoa',
    -10 => '(GMT-10) SAD: Havaji',
    -9 => '(GMT-9) Aljaska',
    -3 => '(GMT-3) Buenos Ajres',
    -2 => '(GMT-2) Srednji Atlatnik',
    -1 => '(GMT-1) Azorska ostrva',
    2 => '(GMT+2) Atina',
    3 => '(GMT+3) Moskva',
    8 => '(GMT+8) Pert',
    9 => '(GMT+9) Seul',
    10 => '(GMT+10) Brisbejn',
    11 => '(GMT+11) Solomska ostrva',
    12 => '(GMT+12) Okland',
  ),
  'duration_intervals' => 
  array (
    15 => '15',
    30 => '30',
    45 => '45',
  ),
  'language_pack_name' => 'US Engleski',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Ponude',
  'moduleList' => 
  array (
    'Home' => 'Početna strana',
    'Bugs' => 'Praćenje defekata',
    'Cases' => 'Slučajevi',
    'Notes' => 'Beleške',
    'Newsletters' => 'Bilteni',
    'Teams' => 'Timovi',
    'Users' => 'Korisnici',
    'KBDocuments' => 'Baza Znanja',
    'FAQ' => 'Česta pitanja',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Početna strana',
    'Bugs' => 'Defekt',
    'Cases' => 'Slučaj',
    'Notes' => 'Beleška',
    'Teams' => 'Tim',
    'Users' => 'Korisnik',
  ),
  'checkbox_dom' => 
  array (
    '' => '-nema-',
    1 => 'Da',
    2 => 'Ne',
  ),
  'industry_dom' => 
  array (
    '' => '-nema-',
    'Apparel' => 'Oprema',
    'Banking' => 'Bankarstvo',
    'Biotechnology' => 'Biotehnologija',
    'Chemicals' => 'Hemijska industrija',
    'Communications' => 'Komunikacije',
    'Construction' => 'Građevinarstvo',
    'Consulting' => 'Konsalting',
    'Education' => 'Obrazovanje',
    'Electronics' => 'Elektronika',
    'Energy' => 'Energetika',
    'Engineering' => 'Inženjering',
    'Entertainment' => 'Zabava',
    'Environmental' => 'Ekologija',
    'Finance' => 'Finansije',
    'Government' => 'Državna uprava',
    'Healthcare' => 'Zdravstvo',
    'Hospitality' => 'Ugostiteljstvo',
    'Insurance' => 'Osiguranje',
    'Machinery' => 'Mašinstvo',
    'Manufacturing' => 'Proizvodnja',
    'Media' => 'Mediji',
    'Not For Profit' => 'Neprofitna delatnost',
    'Recreation' => 'Rekreacija',
    'Retail' => 'Maloprodaja',
    'Shipping' => 'Dostava',
    'Technology' => 'Tehnologija',
    'Telecommunications' => 'Telekomunikacije',
    'Transportation' => 'Transport',
    'Utilities' => 'Komunalne usluge',
    'Other' => 'Ostalo',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '-nema-',
    'Existing Business' => 'Postojeći biznis',
    'New Business' => 'Novi biznis',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '-nema-',
    'Primary Decision Maker' => 'Donosilac osnovnih odluka',
    'Business Decision Maker' => 'Donosilac poslovnih odluka',
    'Business Evaluator' => 'Poslovni procenitelj',
    'Technical Decision Maker' => 'Donosilac tehničkih odluka',
    'Technical Evaluator' => 'Tehnički procenitelj',
    'Executive Sponsor' => 'Rukovodilac sponzorstva',
    'Influencer' => 'Od uticaja',
    'Other' => 'Ostalo',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '-nema-',
    'Primary Contact' => 'Primarni kontakt',
    'Alternate Contact' => 'Alternativni kontakt',
  ),
  'payment_terms' => 
  array (
    '' => '-nema-',
    'Net 15' => '15 dana',
    'Net 30' => '30 dana',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'Istraživanje',
    'Qualification' => 'Kvalifikacije',
    'Needs Analysis' => 'Analize potreba',
    'Value Proposition' => 'Preporučena cena',
    'Id. Decision Makers' => 'ID broj donosilaca odluka',
    'Perception Analysis' => 'Analiza sagledavanja',
    'Proposal/Price Quote' => 'Predlog/Cene ponuda',
    'Negotiation/Review' => 'Pregovori/Pregledi',
    'Closed Won' => 'Završeni osvojeni',
    'Closed Lost' => 'Zatvoreno izgubljeno',
  ),
  'salutation_dom' => 
  array (
    '' => '-nema-',
    'Mr.' => 'Gosp.',
    'Ms.' => 'Gđa.',
    'Mrs.' => 'Gđica.',
    'Dr.' => 'Dr.',
    'Prof.' => 'Prof.',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minut pre',
    300 => '5 minuta pre',
    600 => '10 minuta pre',
    900 => '15 minuta pre',
    1800 => '30 minuta pre',
    3600 => '1 sat pre',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Visok',
    'Medium' => 'Srednje',
    'Low' => 'Nizak',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Nije započet',
    'In Progress' => 'U toku',
    'Completed' => 'Završen',
    'Pending Input' => 'Unos na čekanju',
    'Deferred' => 'Odložen',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Planiran',
    'Held' => 'Održan',
    'Not Held' => 'Nije održan',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Planiran',
    'Held' => 'Održan',
    'Not Held' => 'Nije održan',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Dolazni',
    'Outbound' => 'Odlazni',
  ),
  'lead_status_dom' => 
  array (
    '' => '-nema-',
    'New' => 'Novo',
    'Assigned' => 'Dodeljeno',
    'In Process' => 'U procesu',
    'Converted' => 'Konvertovan',
    'Recycled' => 'Obnovljen',
    'Dead' => 'Zastareo',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Novo',
    'Assigned' => 'Dodeljeno',
    'In Process' => 'U procesu',
    'Converted' => 'Konvertovan',
    'Recycled' => 'Obnovljen',
    'Dead' => 'Zastareo',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Novo',
    'Assigned' => 'Dodeljeno',
    'Closed' => 'Zatvoreno',
    'Pending Input' => 'Unos na čekanju',
    'Rejected' => 'Odbijen',
    'Duplicate' => 'Duplikat',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Visok',
    'P2' => 'Srednje',
    'P3' => 'Nizak',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Aktivan',
    'Inactive' => 'Neaktivan',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Aktivan',
    'Terminated' => 'Prekinut',
    'Leave of Absence' => 'Odsustvo',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Visok',
    'Medium' => 'Srednje',
    'Low' => 'Nizak',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Nije započet',
    'In Progress' => 'U toku',
    'Completed' => 'Završen',
    'Pending Input' => 'Unos na čekanju',
    'Deferred' => 'Odložen',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Kompanija',
    'Opportunities' => 'Prodajna prilika',
    'Cases' => 'Slučaj',
    'Leads' => 'Potencijalni klijent',
    'Contacts' => 'Kontakt',
    'ProductTemplates' => 'Proizvod',
    'Quotes' => 'Ponuda',
    'Bugs' => 'Defekt',
    'Project' => 'Projekat',
    'ProjectTask' => 'Projektni Zadatak',
    'Tasks' => 'Zadatak',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Ponuđen',
    'Orders' => 'Poručen',
    'Ship' => 'Dostavljen',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Fiksna cena',
    'ProfitMargin' => 'Margina profita',
    'PercentageMarkup' => 'Marža iznad troškova',
    'PercentageDiscount' => 'Popust sa liste',
    'IsList' => 'Isto kao na listi',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'Na zalihama',
    'Unavailable' => 'Nema na zalihama',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Oporezivo',
    'Non-Taxable' => 'Neoporezivo',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Šest meseci',
    '+1 year' => 'Godinu dana',
    '+2 years' => 'Dve godine',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Ponuda',
    'Orders' => 'Porudžbina',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Nacrt',
    'Negotiation' => 'U pregovoru',
    'Delivered' => 'Isporučeno',
    'On Hold' => 'Na čekanju',
    'Confirmed' => 'Potvrđeno',
    'Closed Accepted' => 'Zatvoreno prihvaćeno',
    'Closed Lost' => 'Zatvoreno izgubljeno',
    'Closed Dead' => 'Zatvoreno napušteno',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Očekuje se',
    'Confirmed' => 'Potvrđeno',
    'On Hold' => 'Na čekanju',
    'Shipped' => 'Dostavljeno',
    'Cancelled' => 'Otkazano',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '-nema-',
    'Primary Decision Maker' => 'Donosilac osnovnih odluka',
    'Business Decision Maker' => 'Donosilac poslovnih odluka',
    'Business Evaluator' => 'Poslovni procenitelj',
    'Technical Decision Maker' => 'Donosilac tehničkih odluka',
    'Technical Evaluator' => 'Tehnički procenitelj',
    'Executive Sponsor' => 'Rukovodilac sponzorstva',
    'Influencer' => 'Od uticaja',
    'Other' => 'Ostalo',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Predlog',
    'Invoice' => 'Faktura',
    'Terms' => 'Uslovi plaćanja',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Hitno',
    'High' => 'Visok',
    'Medium' => 'Srednje',
    'Low' => 'Nizak',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '-nema-',
    'Accepted' => 'Prihvaćen',
    'Duplicate' => 'Duplikat',
    'Fixed' => 'Popravljen',
    'Out of Date' => 'Van roka važnosti',
    'Invalid' => 'Nevažeći',
    'Later' => 'Kasnije',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Novo',
    'Assigned' => 'Dodeljeno',
    'Closed' => 'Zatvoreno',
    'Pending' => 'Očekuje se',
    'Rejected' => 'Odbijen',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Defekt',
    'Feature' => 'Funkcija',
  ),
  'campaign_status_dom' => 
  array (
    '' => '-nema-',
    'Planning' => 'U planu',
    'Active' => 'Aktivan',
    'Inactive' => 'Neaktivan',
    'Complete' => 'Završeno',
    'In Queue' => 'Na čekanju',
    'Sending' => 'Na slanju',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Redovi i kolone',
    'summary' => 'Sumiranje',
    'detailed_summary' => 'Sumiranje sa detaljima',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Poslato',
    'archived' => 'Arhivirano',
    'draft' => 'U nacrtu',
    'inbound' => 'Dolazni',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Arhivirano',
    'closed' => 'Zatvoreno',
    'draft' => 'U nacrtu',
    'read' => 'Pročitano',
    'replied' => 'Odgovoreno',
    'sent' => 'Poslato',
    'send_error' => 'Greška pri slanju',
    'unread' => 'Nepročitano',
  ),
  'dom_mailbox_type' => 
  array (
    'pick' => '--Prazno--',
    'bug' => 'Kreiraj defekt',
    'support' => 'Kreiraj slučaj',
    'contact' => 'Kreiraj kontakt',
    'sales' => 'Kreiraj potencijalnog klijenta',
    'task' => 'Kreiraj zadatak',
    'bounce' => 'Obrada vraćenih',
  ),
  'dom_email_distribution' => 
  array (
    '' => '--Prazno--',
    'direct' => 'Direktno dodeljeno',
    'roundRobin' => 'U krug',
    'leastBusy' => 'Najmanje zauzet',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Izaberite samo jednog korisnika kada direktno dodeljujete artikle.',
    2 => 'Možete da dodelite samo označene artikle kako direktno dodeljujete artikle.',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Da',
    'bool_false' => 'Ne',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Da',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Da',
    'off' => 'Ne',
    '' => 'Ne',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Sistemski podrazumevan Mail Klijent',
    'sugar' => 'Sugar Email Klijent',
    'mailto' => 'External Email Klijent',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Odrađeno u prošlosti, neizvršeno',
    'ready' => 'Spremno',
    'in progress' => 'U toku',
    'failed' => 'Neuspešno',
    'completed' => 'Završen',
    'no curl' => 'Ne radi: cURL nije dostupan',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Aktivan',
    'Inactive' => 'Neaktivan',
  ),
  'forecast_type_dom' => 
  array (
    'Direct' => 'Direktan',
    'Rollup' => 'Udružen',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '-nema-',
    'Marketing Collateral' => 'Indirektni marketing',
    'Product Brochures' => 'Brošure proizvoda',
    'FAQ' => 'Česta pitanja',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Aktivan',
    'Draft' => 'Nacrt',
    'FAQ' => 'Česta pitanja',
    'Expired' => 'Istekao',
    'Under Review' => 'U pregledu',
    'Pending' => 'Očekuje se',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Prihvaćen',
    'decline' => 'Odbijen',
    'tentative' => 'Neodlučen',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Prihvaćen',
    'decline' => 'Odbijen',
    'tentative' => 'Neodlučen',
    'none' => 'Nijedan',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'Kada je zapis sačuvan',
    'Time' => 'Nakon isteka vremena',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Jednako',
    'in' => 'Je jedan od',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Jednako',
    'Does not Equal' => 'Nije jednak',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Jednako',
    'Less Than' => 'manje od',
    'More Than' => 'više od',
    'Does not Equal' => 'Nije jednak',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Da',
    'bool_false' => 'Ne',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Jednako',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 sata',
    28800 => '4 sati',
    43200 => '12 sati',
    86400 => '1 dan',
    172800 => '2 dana',
    259200 => '3 dana',
    345600 => '4 dana',
    432000 => '5 dana',
    604800 => '1 nedelja',
    1209600 => '2 nedelje',
    1814400 => '3 nedelje',
    2592000 => '30 dana',
    5184000 => '60 dana',
    7776000 => '90 dana',
    10368000 => '120 dana',
    12960000 => '150 dana',
    15552000 => '180 dana',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'je više od',
    'Less Than' => 'je manje od',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Obična poruka',
    'Custom Template' => 'Prilagođeni šablon',
    'System Default' => 'Sistemski Podrazumevano',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Prijavljeni korisnici',
    'rel_user' => 'Povezani korisnici',
    'rel_user_custom' => 'Povezani prilagođeni korisnici',
    'specific_team' => 'Određeni tim',
    'specific_role' => 'Određena uloga',
    'specific_user' => 'Određeni korisnik',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Nova vrednost',
    'past' => 'Stara vrednost',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Korisnik',
    'Manager' => 'Menadžer korisnika',
  ),
  'wflow_address_type_dom' => 
  array (
    'to' => 'Za:',
    'cc' => 'Kopija za:',
    'bcc' => 'Tajna kopija:',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'to' => 'Za:',
    'cc' => 'Kopija za:',
    'bcc' => 'Tajna kopija:',
    'invite_only' => '(Samo pozvani)',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Za:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Ažuriraj zapis',
    'update_rel' => 'Ažuriraj povezani zapis',
    'new' => 'Novi zapis',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Datum pokretanja',
    'Existing Value' => 'Postojeća vrednost',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Osnovne opcije',
    'Advanced' => 'Napredne opcije',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Korisnik dodeljen okinutom zapisu',
    'modified_user_id' => 'Korisnik koji je poslednji izmenio okinut zapis',
    'created_by' => 'Korisnik koji je kreirao okinut zapis',
    'current_user' => 'Prijavljeni korisnik',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Trenutni tim okinutog zapisa',
    'current_team' => 'Tim prijavljnenog korisnika',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Pomeri unazad padajući meni po',
    'advance' => 'Pomeri napred padajući meni po',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Novi i ažurirani zapisi',
    'New' => 'Samo novi zapisi',
    'Update' => 'Samo ažurirani zapisi',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Sve povezano',
    'filter' => 'Filtriraj povezane',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'sve povezano',
    'any' => 'bilo koji povezani',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Alarmi pa akcije',
    'actions_alerts' => 'Akcije pa alarmi',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '-nema-',
    'active' => 'Aktivan',
    'inactive' => 'Neaktivan',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '-nema-',
    'targeted' => 'Poruka poslata/Pokušano',
    'send error' => 'Vraćene poruke, ostalo',
    'invalid email' => 'Vraćene poruke, nevažeći Email',
    'link' => 'Klik kroz link',
    'viewed' => 'Pregledana poruka',
    'removed' => 'Odjavite',
    'lead' => 'Kreirani potencijalni klijenti',
    'contact' => 'Kreirni kontakti',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Kontakti',
    'Users' => 'Korisnici',
    'Prospects' => 'Ciljevi',
    'Leads' => 'Potencijalni klijenti',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Nije započet',
    'inprogress' => 'U toku',
    'signed' => 'Potpisan',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Mesečno',
    'quarterly' => 'Kvartalno',
    'halfyearly' => 'Polugodišnje',
    'yearly' => 'Godišnje',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 dan',
    3 => '3 dana',
    5 => '5 dana',
    7 => '1 nedelja',
    14 => '2 nedelje',
    21 => '3 nedelje',
    31 => '1 mesec',
  ),
);

$app_strings = array (
  'LBL_BROWSER_TITLE' => 'SugarCRM - Komercijalni CRM Otvorenog Koda',
  'LNK_ABOUT' => 'O nama',
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
  'LBL_LIST_EMAIL' => 'Email',
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
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
  'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_YEAR_FORMAT' => '(yyyy)',
  'LBL_LIST_TEAM' => 'Tim',
  'LBL_TEAM' => 'Tim:',
  'LBL_TEAM_ID' => 'ID broj tima',
  'ERR_CREATING_FIELDS' => 'Greška pri popunjavanju polja dodatnih podataka:',
  'ERR_CREATING_TABLE' => 'Greška pri kreiranju tabele:',
  'ERR_DELETE_RECORD' => 'Morate navesti odgovarajući broj zapisa da bi obrisali kontakt.',
  'ERR_EXPORT_DISABLED' => 'Izvoz je onemogućen.',
  'ERR_EXPORT_TYPE' => 'Greška pri izvozu',
  'ERR_INVALID_AMOUNT' => 'Molim,  unesite važeći iznos.',
  'ERR_INVALID_DATE_FORMAT' => 'Format datuma mora biti:',
  'ERR_INVALID_DATE' => 'Molim,  unesite važeći datum.',
  'ERR_INVALID_DAY' => 'Molim,  unesite važeći dan.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'nije važeća email adresa.',
  'ERR_INVALID_HOUR' => 'Molim unesite validan sat.',
  'ERR_INVALID_MONTH' => 'Molim unesite validan mesec.',
  'ERR_INVALID_TIME' => 'Molim unesite validno vreme.',
  'ERR_INVALID_YEAR' => 'Molim unesite validnu godinu (4 cifre).',
  'ERR_NEED_ACTIVE_SESSION' => 'Od aktivne sesije se zahteva da izveze sadržaj.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Nedostaje obavezno polje',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Obavezno polje nije validno',
  'ERR_INVALID_VALUE' => 'Nevažeća vrednost:',
  'ERR_NOTHING_SELECTED' => 'Molim, izaberite pre nego što nastavite dalje.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'Prodajna prilika sa imenom %s već postoji.  Molim, unesite drugo ime ispod.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Ime za prodajnu priliku nije uneseno. Molim, unesite ime prodajne prilike ispod.',
  'ERR_SELF_REPORTING' => 'Korisnik ne može da podnese izveštaj sam sebi.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Nema podudaranja za polje:',
  'ERR_SQS_NO_MATCH' => 'Nema podudaranja',
  'ERR_PORTAL_LOGIN_FAILED' => 'Kreiranj sesije za prijavljivanje na portal nije moguće. Molimo kontaktirajte administratora.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Povratak na <a href="index.php">Početna stranica</a>',
  'LBL_ACCOUNT' => 'Kompanija',
  'LBL_ACCOUNTS' => 'Kompanije',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Pogledaj sadržaj',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Pogledaj sadržaj [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Dodaj [Alt+A]',
  'LBL_ADD_BUTTON' => 'Dodaj',
  'LBL_ADD_DOCUMENT' => 'Dodaj dokument',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Dodaj u listu ciljeva',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Dodaj u listu ciljeva',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Klikni da zatvoriš',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Zatvori',
  'LBL_ADDITIONAL_DETAILS' => 'Dodatni detalji',
  'LBL_ADMIN' => 'Administracija',
  'LBL_ARCHIVE' => 'Arhiva',
  'LBL_ASSIGNED_TO_USER' => 'Dodeljeno korisniku',
  'LBL_ASSIGNED_TO' => 'Dodeljeno:',
  'LBL_BACK' => 'Nazad',
  'LBL_BILL_TO_ACCOUNT' => 'Naplatiti kompaniji',
  'LBL_BILL_TO_CONTACT' => 'Naplatiti kontaktu',
  'LBL_BUGS' => 'Defekti',
  'LBL_BY' => 'od',
  'LBL_CALLS' => 'Pozivi',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Pošalji Email poruke Kapmanje za slanje',
  'LBL_CANCEL_BUTTON_LABEL' => 'Otkaži',
  'LBL_CANCEL_BUTTON_TITLE' => 'Otkaži [Alt+X]',
  'LBL_CASE' => 'Slučaj',
  'LBL_CASES' => 'Slučajevi',
  'LBL_CHANGE_BUTTON_LABEL' => 'Promeni',
  'LBL_CHANGE_BUTTON_TITLE' => 'Promeni [Alt+G]',
  'LBL_CHECKALL' => 'Proveri sve',
  'LBL_CLEAR_BUTTON_LABEL' => 'Obriši',
  'LBL_CLEAR_BUTTON_TITLE' => 'Obriši [Alt+C]',
  'LBL_CLEARALL' => 'Obriši sve',
  'LBL_CLOSE_WINDOW' => 'Zatvori prozor',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Zatvori sve',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Zatvori sve [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Sastavi Email',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Sastavi Email [Alt+L]',
  'LBL_CONTACT_LIST' => 'Lista kontakata',
  'LBL_CONTACT' => 'Kontakt:',
  'LBL_CONTACTS' => 'Kontakti',
  'LBL_CREATE_BUTTON_LABEL' => 'Kreiraj',
  'LBL_CREATED_BY_USER' => 'Kreirao korisnik',
  'LBL_CREATED' => 'Autor',
  'LBL_CURRENT_USER_FILTER' => 'Samo moje stavke:',
  'LBL_DATE_ENTERED' => 'Datum kreiranja:',
  'LBL_DATE_MODIFIED' => 'Datum izmene:',
  'LBL_DELETE_BUTTON_LABEL' => 'Obriši',
  'LBL_DELETE_BUTTON_TITLE' => 'Obriši [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Obriši',
  'LBL_DELETE' => 'Obriši',
  'LBL_DELETED' => 'Obrisan',
  'LBL_DIRECT_REPORTS' => 'Direktni izveštaj',
  'LBL_DONE_BUTTON_LABEL' => 'Završeno',
  'LBL_DONE_BUTTON_TITLE' => 'Završeno [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'Aplikacija zahteva da se popravi Letnje računanje vremena. Molim idite na <a href="index.php?module=Administration&action=DstFix">Popravka</a> u Admin delu i izvršite popravku Letnjeg računanja vremena.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Napravi duplikat',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Napravi duplikat [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Napravi duplikat',
  'LBL_EDIT_BUTTON_LABEL' => 'Izmeni',
  'LBL_EDIT_BUTTON_TITLE' => 'Izmeni [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Izmeni',
  'LBL_VIEW_BUTTON_LABEL' => 'Pregled',
  'LBL_VIEW_BUTTON_TITLE' => 'Pregled [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Pregled',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Email kao PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Email kao PDF [Alt+M]',
  'LBL_EMAILS' => 'Email-ovi',
  'LBL_EMPLOYEES' => 'Zaposleni',
  'LBL_ENTER_DATE' => 'Unesi datum',
  'LBL_EXPORT_ALL' => 'Izvezi sve',
  'LBL_EXPORT' => 'Izvoz',
  'LBL_HIDE' => 'Sakrij',
  'LBL_IMPORT_PROSPECTS' => 'Uvezi ciljeve',
  'LBL_IMPORT' => 'Uvoz',
  'LBL_LAST_VIEWED' => 'Poslednje pregledano',
  'LBL_LEADS' => 'Potencijalni klijenti',
  'LBL_LIST_ACCOUNT_NAME' => 'Naziv kompanije',
  'LBL_LIST_ASSIGNED_USER' => 'Korisnik',
  'LBL_LIST_CONTACT_NAME' => 'Ime kontakta',
  'LBL_LIST_CONTACT_ROLE' => 'Uloga kontakta',
  'LBL_LIST_NAME' => 'Naziv',
  'LBL_LIST_OF' => 'od',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_USER_NAME' => 'Korisničko ime',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Da li ste sigurni da želite da ažurirate celu listu?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Molim, izaberite bar jedan zapis da bi nastavili.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Ova strana',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Svi zapisi',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Izabrani zapisi',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Izabrani:',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'Petar',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Petrović',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Gosp.',
  'LBL_LOGOUT' => 'Odjavi se',
  'LBL_MAILMERGE' => 'Spajanje Email-ova',
  'LBL_MASS_UPDATE' => 'Masovno ažuriranje',
  'LBL_MEETINGS' => 'Sastanci',
  'LBL_MEMBERS' => 'Članovi',
  'LBL_MODIFIED_BY_USER' => 'Promenio korisnik',
  'LBL_MODIFIED' => 'Promenio',
  'LBL_MY_ACCOUNT' => 'Moj nalog',
  'LBL_NAME' => 'Naziv',
  'LBL_NEW_BUTTON_LABEL' => 'Kreiraj',
  'LBL_NEW_BUTTON_TITLE' => 'Kreiraj [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Sledeći',
  'LBL_NONE' => '-- nema --',
  'LBL_NOTES' => 'Beleške',
  'LBL_OPENALL_BUTTON_LABEL' => 'Otvori sve',
  'LBL_OPENALL_BUTTON_TITLE' => 'Otvori sve [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Otvori za:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Otvori za: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Prodajne prilike',
  'LBL_OPPORTUNITY_NAME' => 'Ime prodajne prilike:',
  'LBL_OPPORTUNITY' => 'Prodajna prilika',
  'LBL_OR' => 'ILI',
  'LBL_PRODUCT_BUNDLES' => 'Kompleti proizvoda',
  'LBL_PRODUCTS' => 'Proizvodi',
  'LBL_PROJECT_TASKS' => 'Projektni zadaci',
  'LBL_PROJECTS' => 'Projekti',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Kreiraj prodajnu priliku iz ponude',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Kreiraj prodajnu priliku iz ponude [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Ponude dostaviti',
  'LBL_QUOTES' => 'Ponude',
  'LBL_RELATED_RECORDS' => 'Povezani zapisi',
  'LBL_REMOVE' => 'Ukloni',
  'LBL_SAVE_BUTTON_LABEL' => 'Sačuvaj',
  'LBL_SAVE_BUTTON_TITLE' => 'Sačuvaj [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Pun formular',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Pun formular [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Sačuvaj i kreiraj novi',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Sačuvaj i kreiraj novi [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Pretraga',
  'LBL_SEARCH_BUTTON_TITLE' => 'Pretraga [Alt+Q]',
  'LBL_SEARCH' => 'Pretraga',
  'LBL_SELECT_BUTTON_LABEL' => 'Izaberi',
  'LBL_SELECT_BUTTON_TITLE' => 'Izaberi [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Izaberi kontakt',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Izaberi kontakt [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Izaberi iz izveštaja',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Izaberi izveštaje',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Odaberi korisnika',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Izaberi korisnika [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Resursi korišćeni za izradu ove strane (upiti, fajlovi)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'sekundi.',
  'LBL_SERVER_RESPONSE_TIME' => 'Odziv servera:',
  'LBL_SHIP_TO_ACCOUNT' => 'Dostaviti kompaniji',
  'LBL_SHIP_TO_CONTACT' => 'Dostaviti kontaktu',
  'LBL_SHORTCUTS' => 'Prečice',
  'LBL_SHOW' => 'Prikaži',
  'LBL_STATUS_UPDATED' => 'Vaš status za ovaj događaj je ažuriran!',
  'LBL_SUBJECT' => 'Naslov',
  'LBL_SYNC' => 'Sinhronizacija',
  'LBL_TASKS' => 'Zadaci',
  'LBL_TEAMS_LINK' => 'Tim',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arhiviraj Email',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arhiviraj Email [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Neautorizovan pristup administraciji',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Poništi brisanje',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Poništi brisanje [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Poništi brisanje',
  'LBL_UNDELETE' => 'Poništi brisanje',
  'LBL_UNSYNC' => 'Poništi sinhronizovanje',
  'LBL_UPDATE' => 'Ažuriraj',
  'LBL_USER_LIST' => 'Lista korisnika',
  'LBL_USERS_SYNC' => 'Sinh. korisnika',
  'LBL_USERS' => 'Korisnici',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Štampaj kao PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Štampaj kao PDF [Alt+P]',
  'LNK_ADVANCED_SEARCH' => 'Napredno',
  'LNK_BASIC_SEARCH' => 'Osnovno',
  'LNK_DELETE_ALL' => 'obriši sve',
  'LNK_DELETE' => 'obriši',
  'LNK_EDIT' => 'izmeni',
  'LNK_GET_LATEST' => 'Nabavi najnoviji',
  'LNK_GET_LATEST_TOOLTIP' => 'Zameni sa najnovijom verzijom',
  'LNK_HELP' => 'Pomoć',
  'LNK_LIST_END' => 'Kraj',
  'LNK_LIST_NEXT' => 'Sledeći',
  'LNK_LIST_PREVIOUS' => 'Prethodni',
  'LNK_LIST_RETURN' => 'Povratak na listu',
  'LNK_LIST_START' => 'Početak',
  'LNK_LOAD_SIGNED' => 'Potpis',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Zameni potpisanim dokumentom',
  'LNK_PRINT' => 'Štampanje',
  'LNK_REMOVE' => 'Ukloni',
  'LNK_RESUME' => 'Nastavi',
  'LNK_VIEW_CHANGE_LOG' => 'Pogledaj dnevnik promena',
  'NTC_CLICK_BACK' => 'Molim, kliknite na svom internet pretraživaču dugme za nazad da bi ispravili grešku.',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Da li ste sigurni da želite da obrišete izabrane zapise?',
  'NTC_DELETE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovaj zapis?',
  'NTC_LOGIN_MESSAGE' => 'Molim, unesite svoje korisničko ime i lozinku.',
  'NTC_NO_ITEMS_DISPLAY' => 'nijedan',
  'NTC_REMOVE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovu vezu?',
  'NTC_REQUIRED' => 'Označava obavezno polje',
  'NTC_SUPPORT_SUGARCRM' => 'Podržite SugarCRM projekat otvorenog koda donacijom preko PayPal-a - brzo je, besplatno i sigurno!',
  'NTC_WELCOME' => 'Dobrodošli',
  'LOGIN_LOGO_ERROR' => 'Molim, promenite SugarCRM logoe.',
  'ERROR_FULLY_EXPIRED' => 'Licenca vaše kompanije za SugarCRM je istekla pre više od 30 dana i potrebno je da se ažurira. Samo administratori mogu da se prijave',
  'ERROR_LICENSE_EXPIRED' => 'Licenca vaše kompanije za SugarCRM mora da se obnovi. Samo administratori mogu da se prijave',
  'ERROR_NO_RECORD' => 'Greška pri preuzimanju zapisa. Ovaj zapis je obrisan ili Vi nemate dozvolu da ga pogledate.',
  'LBL_DUP_MERGE' => 'Nađi duplikate',
  'LBL_LOADING' => 'Učitavanje ...',
  'LBL_SAVING_LAYOUT' => 'Čuvanje izgleda ...',
  'LBL_SAVED_LAYOUT' => 'Izgled je sačuvan.',
  'LBL_SAVED' => 'Sačuvano',
  'LBL_SAVING' => 'Čuvanje',
  'LBL_DISPLAY_COLUMNS' => 'Prikaži kolone',
  'LBL_HIDE_COLUMNS' => 'Sakrij kolone',
  'LBL_SEARCH_CRITERIA' => 'Kriterijum pretraživanja',
  'LBL_SAVED_VIEWS' => 'Sačuvani Pregledi',
  'LBL_NO_RECORDS_FOUND' => '- 0 zapisa nađeno -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Server je prezauzet. Molim pokušajte kasnije.',
  'LBL_CHANGE_PASSWORD' => 'Promena lozinke',
  'LBL_LOGIN_TO_ACCESS' => 'Da bi pristupili ovoj oblasti molimo Vas da se prijavite.',
);


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
  'moduleList' => 
  array (
    'Home' => 'Home',
    'Bugs' => 'Bug Tracker',
    'Newsletters' => 'Newsletters',
    'KBDocuments' => 'Knowledge Base',
    'FAQ' => 'FAQ',
    'Cases' => 'Reclami',
    'Notes' => 'Note',
    'Teams' => 'Gruppi',
    'Users' => 'Utenti',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Home',
    'Bugs' => 'Bug',
    'Notes' => 'Note',
    'Cases' => 'Reclami',
    'Teams' => 'Team',
    'Users' => 'Utente',
  ),
  'checkbox_dom' => 
  array (
    2 => 'No',
    '' => '',
    1 => 'Si',
  ),
  'account_type_dom' => 
  array (
    'Competitor' => 'Competitor',
    'Integrator' => 'Integrator',
    'Partner' => 'Partner',
    'Prospect' => 'Prospect',
    '' => '',
    'Analyst' => 'Analista',
    'Customer' => 'Cliente',
    'Investor' => 'Investitore',
    'Press' => 'Stampa',
    'Reseller' => 'Rivenditore',
    'Other' => 'Altro',
  ),
  'industry_dom' => 
  array (
    'Media' => 'Media',
    '' => '',
    'Apparel' => 'Tessile',
    'Banking' => 'Banca',
    'Biotechnology' => 'Biotecnologie',
    'Chemicals' => 'Industria Chimica',
    'Communications' => 'Comunicazioni',
    'Construction' => 'Costruzioni',
    'Consulting' => 'Consulenza',
    'Education' => 'Istruzione',
    'Electronics' => 'Informatica - Elettronica',
    'Energy' => 'Energia',
    'Engineering' => 'Ingegneria',
    'Entertainment' => 'Cultura-Stampa',
    'Environmental' => 'Ambiente',
    'Finance' => 'Finanza',
    'Government' => 'Pubblica Amministratione',
    'Healthcare' => 'Sanità',
    'Hospitality' => 'Alberghiero',
    'Insurance' => 'Assicurazione',
    'Machinery' => 'Industria Meccanica',
    'Manufacturing' => 'Industria Manifatturiera',
    'Not For Profit' => 'No Profit',
    'Recreation' => 'Ricreazione',
    'Retail' => 'Commercio Retail',
    'Shipping' => 'Trasporti e Logistica:',
    'Technology' => 'Tecnologico',
    'Telecommunications' => 'Telecomunicazioni',
    'Transportation' => 'Viaggi e turismo',
    'Utilities' => 'Servizi e utility',
    'Other' => 'Altro',
  ),
  'lead_source_dom' => 
  array (
    'Partner' => 'Partner',
    'Direct Mail' => 'Direct Mail',
    'Email' => 'Email',
    '' => '',
    'Cold Call' => 'Chiamata a Freddo',
    'Existing Customer' => 'Cliente Esistente',
    'Self Generated' => 'Autogenerato',
    'Employee' => 'Dipendente',
    'Public Relations' => 'Pubbliche Relazioni',
    'Conference' => 'Conferenza',
    'Trade Show' => 'Fiera',
    'Web Site' => 'Sito web',
    'Word of mouth' => 'Passaparola',
    'Other' => 'Altro',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    'Influencer' => 'Influencer',
    '' => '',
    'Primary Decision Maker' => 'Decision maker principale',
    'Business Decision Maker' => 'Business Decision Maker',
    'Business Evaluator' => 'Valutatore Business',
    'Technical Decision Maker' => 'Decision Maker Tecnico',
    'Technical Evaluator' => 'Valutatore Tecnico',
    'Executive Sponsor' => 'Sponsor Esecutivo',
    'Other' => 'Altro',
  ),
  'sales_stage_dom' => 
  array (
    'Id. Decision Makers' => 'Id. Decision Makers',
    'Prospecting' => 'Prospettiva',
    'Qualification' => 'Qualificazione',
    'Needs Analysis' => 'Analisi dei bisogni',
    'Value Proposition' => 'Proposta di valore',
    'Perception Analysis' => 'Percezione Analisi',
    'Proposal/Price Quote' => 'Proposta economica',
    'Negotiation/Review' => 'Negoazione/Review',
    'Closed Won' => 'Chiuso vinto',
    'Closed Lost' => 'Chiuso Perso',
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
    'Call' => 'Chiamata:',
    'Meeting' => 'Riunione:',
    'Task' => 'Compito',
    'Note' => 'Nota',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Mr.' => 'Sig.',
    'Ms.' => 'Sig.ra',
    'Mrs.' => 'Sig.na',
    'Dr.' => 'Dr.',
    'Prof.' => 'Prof.',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Nuovo',
    'Assigned' => 'Assegnato',
    'In Process' => 'In Esecuzione',
    'Converted' => 'Convertito',
    'Recycled' => 'Recuperato',
    'Dead' => 'Perso',
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
  'record_type_display' => 
  array (
    'Leads' => 'Lead',
    'Bugs' => 'Bug',
    'Accounts' => 'Azienda',
    'Opportunities' => 'Opportunità',
    'Cases' => 'Reclamo',
    'Contacts' => 'Contatti',
    'ProductTemplates' => 'Prodotto',
    'Quotes' => 'Offerta',
    'Project' => 'Progetto',
    'ProjectTask' => 'Compito di Progetto',
    'Tasks' => 'Compito',
  ),
  'record_type_display_notes' => 
  array (
    'Leads' => 'Lead',
    'Bugs' => 'Bug',
    'Emails' => 'Email',
    'Accounts' => 'Azienda',
    'Contacts' => 'Contatto',
    'Opportunities' => 'Opportunità',
    'Cases' => 'Reclamo',
    'ProductTemplates' => 'Prodotto',
    'Quotes' => 'Offerta',
    'Products' => 'Prodotto',
    'Contracts' => 'Contratto',
    'Project' => 'Progetto',
    'ProjectTask' => 'Compito di Progetto',
    'Meetings' => 'Riunione',
    'Calls' => 'Chiamata',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Influencer' => 'Influencer',
    'Primary Decision Maker' => 'Decision maker principale',
    'Business Decision Maker' => 'Business Decision Maker',
    'Business Evaluator' => 'Valutatore Business',
    'Technical Decision Maker' => 'Decision Maker Tecnico',
    'Technical Evaluator' => 'Valutatore Tecnico',
    'Executive Sponsor' => 'Sponsor Esecutivo',
    'Other' => 'Altro',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Accettata',
    'Duplicate' => 'Duplicato',
    'Fixed' => 'Corretta',
    'Out of Date' => 'Scaduta',
    'Invalid' => 'Non valida',
    'Later' => 'Posticipata',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Forum' => 'Forum',
    'Web' => 'Web',
    'InboundEmail' => 'Email',
    'Internal' => 'Interno',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Bug Tracker' => 'Bug Tracker',
    'Feeds' => 'Feeds',
    'Help' => 'Help',
    'Home' => 'Home',
    'Leads' => 'Leads',
    'Releases' => 'Releases',
    'RSS' => 'RSS',
    'Studio' => 'Studio',
    'Accounts' => 'Aziende',
    'Activities' => 'Attività',
    'Calendar' => 'Calendario',
    'Calls' => 'Chiamate',
    'Campaigns' => 'Campagne',
    'Cases' => 'Reclami',
    'Contacts' => 'Contatti',
    'Currencies' => 'Valute',
    'Dashboard' => 'Grafici',
    'Documents' => 'Documenti',
    'Emails' => 'Email',
    'Forecasts' => 'Previsioni',
    'Meetings' => 'Riunioni',
    'Notes' => 'Note',
    'Opportunities' => 'Opportunità',
    'Outlook Plugin' => 'Plugin Outlook',
    'Product Catalog' => 'Catalogo Prodotti',
    'Products' => 'Prodotti',
    'Projects' => 'Progetti',
    'Quotes' => 'Offerte',
    'Upgrade' => 'Aggiornamento',
    'Users' => 'Utenti',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Pianificazione',
    'Active' => 'Attivo',
    'Inactive' => 'Non attivo',
    'Complete' => 'Completato',
    'In Queue' => 'In Coda',
    'Sending' => 'In Uscita',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Email' => 'Email',
    'Web' => 'Web',
    'Radio' => 'Radio',
    'Telesales' => 'Televendite',
    'Mail' => 'Posta',
    'Print' => 'Stampa',
    'Television' => 'Televisione',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
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
    -12 => '-12',
    -11 => '-11',
    -10 => '-10',
    -9 => '-9',
    -8 => '-8',
    -7 => '-7',
    -6 => '-6',
    -5 => '-5',
    -4 => '-4',
    -3 => '-3',
    -2 => '-2',
    -1 => '-1',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Nessuno--',
  ),
  'dom_mailbox_type' => 
  array (
    'bounce' => 'Bounce Handling',
    'pick' => 'Crea [Qualsiasi]',
    'bug' => 'Segnala bug',
    'support' => 'Nuovo Reclamo',
    'contact' => 'Nuovo contatto',
    'sales' => 'Nuovo Lead',
    'task' => 'Nuovo Compito',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    'leastBusy' => 'Least-Busy',
    '' => '--Nessuno--',
    'direct' => 'Assegnazione Diretta',
  ),
  'dom_email_bool' => 
  array (
    'bool_false' => 'No',
    'bool_true' => 'Si',
  ),
  'dom_switch_bool' => 
  array (
    'off' => 'No',
    '' => 'No',
    'on' => 'Si',
  ),
  'dom_email_editor_option' => 
  array (
    'html' => 'HTML Email',
    'plain' => 'Plain Text Email',
    '' => 'Formato Email predefinito',
  ),
  'forecast_type_dom' => 
  array (
    'Rollup' => 'Rollup',
    'Direct' => 'Diretta',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Marketing',
    'Knowledege Base' => 'Knowledge Base',
    'Sales' => 'Vendite',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'FAQ' => 'FAQ',
    'Marketing Collateral' => 'Collegato al Marketing',
    'Product Brochures' => 'Brochure Prodotto',
  ),
  'document_status_dom' => 
  array (
    'FAQ' => 'FAQ',
    'Active' => 'Attivo',
    'Draft' => 'Bozza',
    'Expired' => 'Scaduto',
    'Under Review' => 'In Revisione',
    'Pending' => 'In attesa',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Stampa Unione',
    'license' => 'Licenza',
  ),
  'bselect_type_dom' => 
  array (
    'bool_false' => 'No',
    'bool_true' => 'Si',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'Email',
    'Invite' => 'Invito',
  ),
  'wflow_address_type_dom' => 
  array (
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'to' => 'A:',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'to' => 'A:',
    'invite_only' => '(Solo invito)',
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
    'seed' => 'Seed',
    'test' => 'Test',
    'default' => 'Predefinito',
    'exempt_domain' => 'Suppression List - Per Dominio',
    'exempt_address' => 'Suppression List - Per Indirizzo Email',
    'exempt' => 'Suppression List - Per Id',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '',
    'active' => 'Attivo',
    'inactive' => 'Non attivo',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'link' => 'Click-thru Link',
    'targeted' => 'Messaggio Inviato/Tentato',
    'send error' => 'Messaggi non consegnati, Altro',
    'invalid email' => 'Messaggi non consegnati, Indirizzo non valido',
    'viewed' => 'Messaggio Letto',
    'removed' => 'Disiscritto',
    'lead' => 'Leads Creati',
    'contact' => 'Contatti Creati',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Leads' => 'Leads',
    'Contacts' => 'Contatti',
    'Users' => 'Utenti',
    'Prospects' => 'Obiettivi',
  ),
  'language_pack_name' => 'IT Italiano',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Offerte',
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Business esistente',
    'New Business' => 'Nuovo affare',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Contatto Primario',
    'Alternate Contact' => 'Contato Alternativo',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => '15 gg',
    'Net 30' => '30 gg',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minuto prima',
    300 => '5 minuti prima',
    600 => '10 minuti prima',
    900 => '15 minuti prima',
    1800 => '30 minuti prima',
    3600 => '1 ora prima',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Alta',
    'Medium' => 'Media',
    'Low' => 'Bassa',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Non iniziato',
    'In Progress' => 'In Corso',
    'Completed' => 'Completato',
    'Pending Input' => 'In attesa di azione',
    'Deferred' => 'Rimandato',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Pianificata',
    'Held' => 'Effettuata',
    'Not Held' => 'Non Effettuata',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Pianificata',
    'Held' => 'Effettuata',
    'Not Held' => 'Non Effettuata',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'In entrata',
    'Outbound' => 'In uscita',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Nuovo',
    'Assigned' => 'Assegnato',
    'In Process' => 'In Esecuzione',
    'Converted' => 'Convertito',
    'Recycled' => 'Recuperato',
    'Dead' => 'Perso',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Nuovo',
    'Assigned' => 'Assegnato',
    'Closed' => 'Chiuso',
    'Pending Input' => 'In attesa di azione',
    'Rejected' => 'Respinto',
    'Duplicate' => 'Duplicato',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Alta',
    'P2' => 'Media',
    'P3' => 'Bassa',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Attivo',
    'Inactive' => 'Inattivo',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Attivo',
    'Terminated' => 'Licenziato',
    'Leave of Absence' => 'In aspettativa',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Alta',
    'Medium' => 'Media',
    'Low' => 'Bassa',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Non iniziato',
    'In Progress' => 'In Corso',
    'Completed' => 'Completato',
    'Pending Input' => 'In attesa di azione',
    'Deferred' => 'Rimandato',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Quotato',
    'Orders' => 'Ordinato',
    'Ship' => 'Inviato',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Prezzo fisso',
    'ProfitMargin' => 'Margine di profitto',
    'PercentageMarkup' => 'Margine di profitto sul costo',
    'PercentageDiscount' => 'Sconto da listino',
    'IsList' => 'Come listino',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'Disponibile',
    'Unavailable' => 'Non disponibile',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Imponibile',
    'Non-Taxable' => 'Non Imponibile',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Sei mesi',
    '+1 year' => 'Un anno',
    '+2 years' => 'Due anni',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Offerta',
    'Orders' => 'Ordine',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Bozza',
    'Negotiation' => 'Negoziazione',
    'Delivered' => 'Consegnato',
    'On Hold' => 'In Attesa',
    'Confirmed' => 'Confermato',
    'Closed Accepted' => 'Chiuso Accettato',
    'Closed Lost' => 'Chiuso Perso',
    'Closed Dead' => 'Chiuso Morto',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'In sospeso',
    'Confirmed' => 'Confermato',
    'On Hold' => 'In Attesa',
    'Shipped' => 'Inviato',
    'Cancelled' => 'Annullato',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Proposta',
    'Invoice' => 'Fattura',
    'Terms' => 'Termini di Pagamento',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Urgente',
    'High' => 'Alta',
    'Medium' => 'Media',
    'Low' => 'Bassa',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Nuovo',
    'Assigned' => 'Assegnato',
    'Closed' => 'Chiuso',
    'Pending' => 'In sospeso',
    'Rejected' => 'Respinto',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Difetto',
    'Feature' => 'Funzionalità',
  ),
  'dom_cal_month_long' => 
  array (
    1 => 'Gennaio',
    2 => 'Febbraio',
    3 => 'Marzo',
    4 => 'Aprile',
    5 => 'Maggio',
    6 => 'Giugno',
    7 => 'Luglio',
    8 => 'Agosto',
    9 => 'Settembre',
    10 => 'Ottobre',
    11 => 'Novembre',
    12 => 'Dicembre',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Righe e Colonne',
    'summary' => 'Raggruppamento',
    'detailed_summary' => 'Raggruppamento con dettagli',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Inviato',
    'archived' => 'Archiviato',
    'draft' => 'Bozza',
    'inbound' => 'In entrata',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Archiviato',
    'closed' => 'Chiuso',
    'draft' => 'Bozza',
    'read' => 'Letto',
    'replied' => 'Risposto',
    'sent' => 'Inviato',
    'send_error' => 'Errore di Invio',
    'unread' => 'Non letto',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Selezionare solo un utente per le voci di Assegnazione diretta.',
    2 => 'Devi assegnare solamente gli Elementi Selezionati  per i record di Assegnazione Diretta',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Si',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Client di posta predefinito per il sistema',
    'sugar' => 'Client di posta di SugarCRM',
    'mailto' => 'Client di posta esterno',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Tempo di esecuzione passato, Non Eseguito',
    'ready' => 'Pronto',
    'in progress' => 'In Corso',
    'failed' => 'Fallito',
    'completed' => 'Completato',
    'no curl' => 'Non eseguito: nessun cURL disponibile',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Attivo',
    'Inactive' => 'Non attivo',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Accetta',
    'decline' => 'Rifiuta',
    'tentative' => 'Accetta provvisoriamente',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Accettato',
    'decline' => 'Rifiutato',
    'tentative' => 'Accettato provvisoriamente',
    'none' => 'Nessuno',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Più',
    '-' => '(-) Meno',
    '*' => '(X) Moltiplicato per',
    '/' => '(/) Diviso per',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'Quando il record viene salvato',
    'Time' => 'Quando il tempo è scaduto',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'é',
    'in' => 'è uno dei',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Uguali',
    'Does not Equal' => 'Non è uguale a',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Uguali',
    'Less Than' => 'è meno di',
    'More Than' => 'è più di',
    'Does not Equal' => 'Non è uguale a',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Uguali',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 ore',
    28800 => '8 ore',
    43200 => '12 ore',
    86400 => '1 giorno',
    172800 => '2 giorni',
    259200 => '3 giorni',
    345600 => '4 giorni',
    432000 => '5 giorni',
    604800 => '1 settimana',
    1209600 => '2 settimane',
    1814400 => '3 settimane',
    2592000 => '30 giorni',
    5184000 => '60 giorni',
    7776000 => '90 giorni',
    10368000 => '120 giorni',
    12960000 => '150 giorni',
    15552000 => '180 giorni',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'era più di',
    'Less Than' => 'è meno di',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Messaggio normale',
    'Custom Template' => 'Modello personalizzato',
    'System Default' => 'Predefinito da sistema',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Utenti Attuali',
    'rel_user' => 'Utenti Collegati',
    'rel_user_custom' => 'Utente Personalizzato Collegato',
    'specific_team' => 'Team Specifico',
    'specific_role' => 'Ruolo Specifico',
    'specific_user' => 'Utente Specifico',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Nuovo Valore',
    'past' => 'Vecchio Valore',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Utente',
    'Manager' => 'Manager dell´Utente',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'A:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Aggiorna record',
    'update_rel' => 'Aggiorna record collegato',
    'new' => 'Nuovo record',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Data calcolata',
    'Existing Value' => 'Valore attuale',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Opzioni Base',
    'Advanced' => 'Opzioni Avanzate',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Utente assegnato al record calcolato',
    'modified_user_id' => 'Ultimo utente che ha modificato il record calcolato',
    'created_by' => 'Utente che ha creato il record calcolato',
    'current_user' => 'Utente connesso',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Team attuale di Record calcolati',
    'current_team' => 'Team di utenti connessi',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Sposta il dropdown indietro di',
    'advance' => 'Sposta il dropdown avanti di',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Record nuovi ed esistenti',
    'New' => 'Solo nuovi records',
    'Update' => 'Solo records esistenti',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Tutti quelli collegati',
    'filter' => 'Filtro collegato',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'Tutti quelli collegati',
    'any' => 'Qualsiasi collegato',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Avvisi poi Azioni',
    'actions_alerts' => 'Azioni poi Avvisi',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Non iniziato',
    'inprogress' => 'In Corso',
    'signed' => 'Firmato',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Mensile',
    'quarterly' => 'Trimestrale',
    'halfyearly' => 'Metà Anno',
    'yearly' => 'Annuale',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 Giorno',
    3 => '3 Giorni',
    5 => '5 Giorni',
    7 => '1 Settimana',
    14 => '2 Settimane',
    21 => '3 Settimane',
    31 => '1 Mese',
  ),
);

$app_strings = array (
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ADMIN' => 'Admin',
  'LBL_ALT_HOT_KEY' => 'Alt+',
  'LBL_BROWSER_TITLE' => 'SugarCRM - Commercial Open Source CRM',
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
  'LBL_LIST_EMAIL' => 'Email',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'John',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Doe',
  'LBL_LOGOUT' => 'Logout',
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
  'LBL_SYNC' => 'Sync',
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'LNK_ABOUT' => 'About',
  'LNK_BASIC_SEARCH' => 'Basic',
  'NTC_TIME_FORMAT' => '(24:00)',
  'LBL_LIST_TEAM' => 'Team',
  'LBL_TEAM' => 'Team:',
  'LBL_TEAM_ID' => 'Id Team',
  'ERR_CREATING_FIELDS' => 'Errore di compilazione dei campi di dettaglio aggiuntivo:',
  'ERR_CREATING_TABLE' => 'Errore nella creazione della tabella:',
  'ERR_DELETE_RECORD' => 'Per eliminare il contatto deve essere specificato il numero del record.',
  'ERR_EXPORT_DISABLED' => 'Esportazione non abilitata.',
  'ERR_EXPORT_TYPE' => 'Errore nell´esportazione',
  'ERR_INVALID_AMOUNT' => 'Si prega di inserire un valore valido.',
  'ERR_INVALID_DATE_FORMAT' => 'Il formato dei dati deve essere:',
  'ERR_INVALID_DATE' => 'Si prega di inserire una data valida.',
  'ERR_INVALID_DAY' => 'Si prega di inserire un giorno valido.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'indirizzo email non valido.',
  'ERR_INVALID_HOUR' => 'Si prega di inserire un´ora valida.',
  'ERR_INVALID_MONTH' => 'Si prega di inserire un mese valido.',
  'ERR_INVALID_TIME' => 'Si prega di inserire un orario valido.',
  'ERR_INVALID_YEAR' => 'Si prega di inserire un anno a 4 cifre valido.',
  'ERR_NEED_ACTIVE_SESSION' => 'Per esportare contenuti è richiesta una sessione attiva.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Campo obbligatorio mancante:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Campo obbligatorio non valido:',
  'ERR_INVALID_VALUE' => 'Valore non valido:',
  'ERR_NOTHING_SELECTED' => 'Prima di procedere si prega di selezionare.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'Un opportunità con il nome %s esiste già. Si prega di inserire qui sotto un altro nome.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Il nome dell´opportunità non è stato inserito. Si prega di inserirlo qui sotto.',
  'ERR_SELF_REPORTING' => 'L´utente non può dipendere da lui o da sè stesso.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Nessuna corrispondenza per il campo:',
  'ERR_SQS_NO_MATCH' => 'Nessuna corrispondenza',
  'ERR_PORTAL_LOGIN_FAILED' => 'Impossibile creare la sessione di login del portale. Si prega di contattare l´amministratore del sistema.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Ritorna in Home',
  'LBL_ACCOUNT' => 'Azienda',
  'LBL_ACCOUNTS' => 'Aziende',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Vedi sommario',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Vedi sommario [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Aggiungi [Alt+A]',
  'LBL_ADD_BUTTON' => 'Aggiungi',
  'LBL_ADD_DOCUMENT' => 'Aggiungi Documento',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Aggiungi alla lista obiettivi',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Aggiungi alla lista obiettivi',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Clicca per Chiudere',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Chiudi',
  'LBL_ADDITIONAL_DETAILS' => 'Ulteriori Dettagli',
  'LBL_ARCHIVE' => 'Archivia',
  'LBL_ASSIGNED_TO_USER' => 'Assegnato all´utente',
  'LBL_ASSIGNED_TO' => 'Assegnato a:',
  'LBL_BACK' => 'Indietro',
  'LBL_BILL_TO_ACCOUNT' => 'Fattura all´Azienda',
  'LBL_BILL_TO_CONTACT' => 'Fattura al Contatto',
  'LBL_BUGS' => 'Bug',
  'LBL_BY' => 'da',
  'LBL_CALLS' => 'Chiamate',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Invia le email della campagna in coda',
  'LBL_CANCEL_BUTTON_LABEL' => 'Annulla',
  'LBL_CANCEL_BUTTON_TITLE' => 'Annulla [Alt+X]',
  'LBL_CASE' => 'Reclamo',
  'LBL_CASES' => 'Reclami',
  'LBL_CHANGE_BUTTON_LABEL' => 'Cambia',
  'LBL_CHANGE_BUTTON_TITLE' => 'Cambia [Alt+G]',
  'LBL_CHECKALL' => 'Seleziona tutti',
  'LBL_CLEAR_BUTTON_LABEL' => 'Azzera',
  'LBL_CLEAR_BUTTON_TITLE' => 'Azzera [Alt+C]',
  'LBL_CLEARALL' => 'Azzera Tutto',
  'LBL_CLOSE_WINDOW' => 'Chiudi Finestra',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Chiudi tutto',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Chiudi tutto [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Componi Email',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Componi Email [Alt+L]',
  'LBL_CONTACT_LIST' => 'Elenco Contatti',
  'LBL_CONTACT' => 'Contatto',
  'LBL_CONTACTS' => 'Contatti',
  'LBL_CREATE_BUTTON_LABEL' => 'Nuovo',
  'LBL_CREATED_BY_USER' => 'Creato da Utente',
  'LBL_CREATED' => 'Creato da:',
  'LBL_CURRENT_USER_FILTER' => 'Solo i miei elementi:',
  'LBL_DATE_ENTERED' => 'Data Creazione:',
  'LBL_DATE_MODIFIED' => 'Ultima Modifica:',
  'LBL_DELETE_BUTTON_LABEL' => 'Elimina',
  'LBL_DELETE_BUTTON_TITLE' => 'Elimina [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Elimina',
  'LBL_DELETE' => 'Elimina',
  'LBL_DELETED' => 'Eliminato',
  'LBL_DIRECT_REPORTS' => 'Reports diretti',
  'LBL_DONE_BUTTON_LABEL' => 'Fatto',
  'LBL_DONE_BUTTON_TITLE' => 'Fatto [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'L´applicazione necessita di una correzzione dell´ora legale. Vai in <a href=index.php?module=Administration&action=DstFix>Ripara</a> nel pannello amministrativo e correggi l´ora legale.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Duplica',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Duplica [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Duplica',
  'LBL_EDIT_BUTTON_LABEL' => 'Modifica',
  'LBL_EDIT_BUTTON_TITLE' => 'Modifica [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Modifica',
  'LBL_VIEW_BUTTON_LABEL' => 'Visualizza',
  'LBL_VIEW_BUTTON_TITLE' => 'Visualizza [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Visualizza',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Invia Email come PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Invia Email come PDF [Alt+M]',
  'LBL_EMAILS' => 'Email',
  'LBL_EMPLOYEES' => 'Dipendenti',
  'LBL_ENTER_DATE' => 'Inserisci Data',
  'LBL_EXPORT_ALL' => 'Esporta Tutto',
  'LBL_EXPORT' => 'Esporta',
  'LBL_HIDE' => 'Nascondi',
  'LBL_IMPORT_PROSPECTS' => 'Importa Obiettivi',
  'LBL_IMPORT' => 'Importa',
  'LBL_LAST_VIEWED' => 'Ultima Vista',
  'LBL_LIST_ACCOUNT_NAME' => 'Nome azienda',
  'LBL_LIST_ASSIGNED_USER' => 'Utente',
  'LBL_LIST_CONTACT_NAME' => 'Nome Contatto',
  'LBL_LIST_CONTACT_ROLE' => 'Ruolo del Contatto',
  'LBL_LIST_NAME' => 'Nome',
  'LBL_LIST_OF' => 'di',
  'LBL_LIST_PHONE' => 'Telefono',
  'LBL_LIST_USER_NAME' => 'Nome Utente',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Sei sicuro di voler aggiornare l´intero elenco?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Per procedere si prega di selezionare almeno 1 record.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Pagina Corrente',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Elenco Intero',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Record Selezionati',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Selezionato:',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Sig.',
  'LBL_MAILMERGE' => 'Stampa Unione',
  'LBL_MASS_UPDATE' => 'Aggiornamento Globale',
  'LBL_MEETINGS' => 'Riunioni',
  'LBL_MEMBERS' => 'Membri',
  'LBL_MODIFIED_BY_USER' => 'Modificato da Utente',
  'LBL_MODIFIED' => 'Modificato da',
  'LBL_MY_ACCOUNT' => 'La mia Azienda',
  'LBL_NAME' => 'Nome',
  'LBL_NEW_BUTTON_LABEL' => 'Nuovo',
  'LBL_NEW_BUTTON_TITLE' => 'Nuovo [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Avanti',
  'LBL_NONE' => '--Nessuno--',
  'LBL_NOTES' => 'Note',
  'LBL_OPENALL_BUTTON_LABEL' => 'Apri Tutto',
  'LBL_OPENALL_BUTTON_TITLE' => 'Apri Tutto [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Apri a:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Apri a: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Opportunità',
  'LBL_OPPORTUNITY_NAME' => 'Nome Opportunità',
  'LBL_OPPORTUNITY' => 'Opportunità',
  'LBL_OR' => 'o',
  'LBL_PRODUCT_BUNDLES' => 'Famiglie di prodotto',
  'LBL_PRODUCTS' => 'Prodotti',
  'LBL_PROJECT_TASKS' => 'Compiti di Progetto',
  'LBL_PROJECTS' => 'Progetti',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Crea Opportunità dall´Offerta',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Crea Opportunità dall´Offerta[Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Invia Offerte a',
  'LBL_QUOTES' => 'Offerte',
  'LBL_RELATED_RECORDS' => 'Record Relativi',
  'LBL_REMOVE' => 'Rimuovi',
  'LBL_SAVE_BUTTON_LABEL' => 'Salva',
  'LBL_SAVE_BUTTON_TITLE' => 'Salva [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Modulo Completo',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Modulo Completo [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Salva e Crea Nuovo',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Salva e Crea Nuovo [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Cerca',
  'LBL_SEARCH_BUTTON_TITLE' => 'Cerca [Alt+Q]',
  'LBL_SEARCH' => 'Cerca',
  'LBL_SELECT_BUTTON_LABEL' => 'Seleziona',
  'LBL_SELECT_BUTTON_TITLE' => 'Seleziona [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Seleziona Contatto',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Seleziona Contatto [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Seleziona da Report',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Seleziona Report',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Seleziona Utente',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Seleziona utente [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Risorse utilizzate per costruire questa pagina (query, files)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'secondi.',
  'LBL_SERVER_RESPONSE_TIME' => 'Tempo di risposta del server:',
  'LBL_SHIP_TO_ACCOUNT' => 'Spedisci all´Azienda',
  'LBL_SHIP_TO_CONTACT' => 'Spedisci al Contatto',
  'LBL_SHORTCUTS' => 'Scorciatoie',
  'LBL_SHOW' => 'Mostra',
  'LBL_STATUS_UPDATED' => 'Il tuo stato per questo evento è stato aggiornato!',
  'LBL_STATUS' => 'Stato:',
  'LBL_SUBJECT' => 'Oggetto',
  'LBL_TASKS' => 'Compiti',
  'LBL_TEAMS_LINK' => 'Team',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archivia Email',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archivia Email [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Accesso non autorizzato all´amministrazione',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Ripristina',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Ripristina [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Ripristina',
  'LBL_UNDELETE' => 'Ripristina',
  'LBL_UNSYNC' => 'Non sincronizzare',
  'LBL_UPDATE' => 'Aggiorna',
  'LBL_USER_LIST' => 'Elenco Utenti',
  'LBL_USERS_SYNC' => 'Sincronizza Utenti',
  'LBL_USERS' => 'Utenti',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Stampa come PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Stampa come PDF [Alt+P]',
  'LNK_ADVANCED_SEARCH' => 'Avanzata',
  'LNK_DELETE_ALL' => 'cancella tutto',
  'LNK_DELETE' => 'canc',
  'LNK_EDIT' => 'modifica',
  'LNK_GET_LATEST' => 'Ottieni ultimo',
  'LNK_GET_LATEST_TOOLTIP' => 'Sostituisci con ultima versione',
  'LNK_HELP' => 'Aiuto',
  'LNK_LIST_END' => 'Fine',
  'LNK_LIST_NEXT' => 'Avanti',
  'LNK_LIST_PREVIOUS' => 'Indietro',
  'LNK_LIST_RETURN' => 'Ritorna all´elenco',
  'LNK_LIST_START' => 'Inizio',
  'LNK_LOAD_SIGNED' => 'Firma',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Sostituisci con documento firmato',
  'LNK_PRINT' => 'Stampa',
  'LNK_REMOVE' => 'canc',
  'LNK_RESUME' => 'Riprendi',
  'LNK_VIEW_CHANGE_LOG' => 'Vedi Log Cambiamenti',
  'NTC_CLICK_BACK' => 'Si prega di selezionare il pulsante indietro del browser e correggere l´errore.',
  'NTC_DATE_FORMAT' => '(aaaa-mm-gg)',
  'NTC_DATE_TIME_FORMAT' => '(aaaa-mm-gg 24:00)',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Sei sicuro di voler eliminare i record selezionati?',
  'NTC_DELETE_CONFIRMATION' => 'Sei sicuro di voler eliminare questo record?',
  'NTC_LOGIN_MESSAGE' => 'Si prega di inserire il nome utente e la password:',
  'NTC_NO_ITEMS_DISPLAY' => 'nessuno',
  'NTC_REMOVE_CONFIRMATION' => 'Sei sicuro di voler rimuovere questa relazione?',
  'NTC_REQUIRED' => 'Indica un campo obbligatorio',
  'NTC_SUPPORT_SUGARCRM' => 'Supporta il progetto open source SugarCRM con una donazione tramite PayPal - è veloce, gratuito e sicuro!',
  'NTC_WELCOME' => 'Benvenuto',
  'NTC_YEAR_FORMAT' => '(aaaa)',
  'LOGIN_LOGO_ERROR' => 'Si prega di sostituire i loghi della SugarCRM.',
  'ERROR_FULLY_EXPIRED' => 'La licenza di SugarCRM è scaduta da più di 30 giorni e deve essere rinnovata. Solo l´amministratore del sistema può accedere.',
  'ERROR_LICENSE_EXPIRED' => 'La licenza di SugarCRM deve essere aggiornata. Solo l´amministratore del sistema può accedere.',
  'ERROR_NO_RECORD' => 'Errore nel recupero del record. Questo record può essere stato cancellato o non hai i permessi per vederlo.',
  'LBL_DUP_MERGE' => 'Trova Duplicati',
  'LBL_LOADING' => 'Caricamento ...',
  'LBL_SAVING_LAYOUT' => 'Salvataggio Layout ...',
  'LBL_SAVED_LAYOUT' => 'Il layout è stato salvato.',
  'LBL_SAVED' => 'Salvato',
  'LBL_SAVING' => 'Salvataggio',
  'LBL_DISPLAY_COLUMNS' => 'Mostra Colonne',
  'LBL_HIDE_COLUMNS' => 'Nascondi Colonne',
  'LBL_SEARCH_CRITERIA' => 'Criteri di Ricerca',
  'LBL_SAVED_VIEWS' => 'Viste salvate',
  'LBL_NO_RECORDS_FOUND' => '- 0 Record Trovati -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Il server è troppo occupato. Si prega di riprovare più tardi.',
  'LBL_CHANGE_PASSWORD' => 'Cambia Password',
  'LBL_LOGIN_TO_ACCESS' => 'Si prega di registrarsi per accedere a quest´area.',
);




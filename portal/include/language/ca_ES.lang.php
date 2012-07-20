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
  'dom_email_status' => 
  array (
    'archived' => 'Arxivat',
    'closed' => 'Tancat',
    'draft' => 'Borrador',
    'read' => 'Llegit',
    'replied' => 'Respost',
    'sent' => 'Enviat',
    'send_error' => 'Error d&#39;Enviament',
    'unread' => 'No llegit',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Més',
    '-' => '(-) Menys',
    '*' => '(X) Multiplicat Per',
    '/' => '(/) Dividit Per',
  ),
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Quotes',
  'moduleList' => 
  array (
    'FAQ' => 'FAQ',
    'Home' => 'Inici',
    'Bugs' => 'Gestor d&#39;Incidències',
    'Cases' => 'Casos',
    'Notes' => 'Note',
    'Newsletters' => 'Bolletins de Notícies',
    'Teams' => 'Equips',
    'Users' => 'Usuars',
    'KBDocuments' => 'Base de Coneixement',
  ),
  'checkbox_dom' => 
  array (
    '' => '',
    2 => 'No',
    1 => 'Si',
  ),
  'account_type_dom' => 
  array (
    '' => '',
    'Partner' => 'Partner',
    'Analyst' => 'Analista',
    'Competitor' => 'Competidor',
    'Customer' => 'Clien',
    'Integrator' => 'Integrador',
    'Investor' => 'Inversor',
    'Press' => 'Prensa',
    'Prospect' => 'Prospecte',
    'Reseller' => 'Revenedor',
    'Other' => 'Altre',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Apparel' => 'Tèxtil',
    'Banking' => 'Banca',
    'Biotechnology' => 'Biotecnologia',
    'Chemicals' => 'Química',
    'Communications' => 'Comunicacions',
    'Construction' => 'Construcció',
    'Consulting' => 'Consultoria',
    'Education' => 'Educació',
    'Electronics' => 'Electrònica',
    'Energy' => 'Energia',
    'Engineering' => 'Enginyeria',
    'Entertainment' => 'Entreteniment',
    'Environmental' => 'Medi ambient',
    'Finance' => 'Finances',
    'Government' => 'Govern',
    'Healthcare' => 'Sanitat',
    'Hospitality' => 'Caritat',
    'Insurance' => 'Seguros',
    'Machinery' => 'Maquinaria',
    'Manufacturing' => 'Fabricació',
    'Media' => 'Mitjans de comunicació',
    'Not For Profit' => 'Sense ànim de lucre',
    'Recreation' => 'Oci',
    'Retail' => 'Minoristes',
    'Shipping' => 'Enviaments',
    'Technology' => 'Tecnologia',
    'Telecommunications' => 'Telecomunicacions',
    'Transportation' => 'Transport',
    'Utilities' => 'Serveis públics',
    'Other' => 'Altre',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Partner' => 'Partner',
    'Email' => 'Email',
    'Cold Call' => 'Trucada en Fred',
    'Existing Customer' => 'Client Existent',
    'Self Generated' => 'Auto Generat',
    'Employee' => 'Empleat',
    'Public Relations' => 'Relacions Públiques',
    'Direct Mail' => 'Correu Directe',
    'Conference' => 'Conferència',
    'Trade Show' => 'Exposició',
    'Web Site' => 'Lloc Web',
    'Word of mouth' => 'Recomanació',
    'Other' => 'Altre',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Negocis Existents',
    'New Business' => 'Nous Negocis',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Prenedor de Decisió Principal',
    'Business Decision Maker' => 'Prenedor de Decisió de Negoci',
    'Business Evaluator' => 'Avaluador de Negoci',
    'Technical Decision Maker' => 'Prenedor de Decisió Tècnica',
    'Technical Evaluator' => 'Avaluador Tècnic',
    'Executive Sponsor' => 'Patrocinador Executiu',
    'Influencer' => 'Influenciador',
    'Other' => 'Altre',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Contacte Principal',
    'Alternate Contact' => 'Contacte Alternatiu',
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
  'activity_dom' => 
  array (
    'Email' => 'Email',
    'Call' => 'Trucada',
    'Meeting' => 'Reunió',
    'Task' => 'Tasca',
    'Note' => 'Nota',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Mr.' => 'Senyor',
    'Ms.' => 'Senyora',
    'Mrs.' => 'Senyora',
    'Dr.' => 'Doctor',
    'Prof.' => 'Professor',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Nou',
    'Assigned' => 'Assignat',
    'In Process' => 'En Procés',
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
    'Emails' => 'Email',
    'Accounts' => 'Compte',
    'Contacts' => 'Contacte',
    'Opportunities' => 'Oportunitat',
    'Cases' => 'Cas',
    'Leads' => 'Client Potencial',
    'ProductTemplates' => 'Producte',
    'Quotes' => 'Pressupost',
    'Products' => 'Producte',
    'Contracts' => 'Contracte',
    'Bugs' => 'Incidència',
    'Project' => 'Projecte',
    'ProjectTask' => 'Tasca de Projecte',
    'Meetings' => 'Reunió',
    'Calls' => 'Trucada',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Prenedor de Decisions Principal',
    'Business Decision Maker' => 'Prenedor de Decisions de Negoci',
    'Business Evaluator' => 'Avaluador de Negoci',
    'Technical Decision Maker' => 'Prenedor de Decisions Tècniques',
    'Technical Evaluator' => 'Avaluador Tècnic',
    'Executive Sponsor' => 'Patrocinador Executiu',
    'Influencer' => 'Influent',
    'Other' => 'Altre',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Urgent',
    'High' => 'Alta',
    'Medium' => 'Mitjana',
    'Low' => 'Baixa',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Acceptat',
    'Duplicate' => 'Duplicat',
    'Fixed' => 'Corretgit',
    'Out of Date' => 'Caducat',
    'Invalid' => 'No Vàlid',
    'Later' => 'Posposat',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Web' => 'Web',
    'InboundEmail' => 'Email',
    'Internal' => 'Intern',
    'Forum' => 'Fòrum',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Documents' => 'Documents',
    'Emails' => 'Emails',
    'Notes' => 'Notes',
    'Accounts' => 'Comptes',
    'Activities' => 'Activitats',
    'Bug Tracker' => 'Seguiment d&#39;Incidències',
    'Calendar' => 'Calendari',
    'Calls' => 'Trucadess',
    'Campaigns' => 'Campanyes',
    'Cases' => 'Casos',
    'Contacts' => 'Contactes',
    'Currencies' => 'Monedes',
    'Dashboard' => 'Quadre de Comandament',
    'Feeds' => 'Fonts RSS',
    'Forecasts' => 'Previsions',
    'Help' => 'Ajuda',
    'Home' => 'Inici',
    'Leads' => 'Clients Potencials',
    'Meetings' => 'Reunions',
    'Opportunities' => 'Oportunitats',
    'Outlook Plugin' => 'Plugin de Outlook',
    'Product Catalog' => 'Catàleg de Productes',
    'Products' => 'Productes',
    'Projects' => 'Projectes',
    'Quotes' => 'Pressupostos',
    'Releases' => 'Llançaments',
    'RSS' => 'Fonts RSS',
    'Studio' => 'Estudi',
    'Upgrade' => 'Actualització',
    'Users' => 'Usuaris',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Planificació',
    'Active' => 'Activa',
    'Inactive' => 'Inactiva',
    'Complete' => 'Completa',
    'In Queue' => 'En cua',
    'Sending' => 'En enviament',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Email' => 'Email',
    'Web' => 'Web',
    'Telesales' => 'Televenda',
    'Mail' => 'Correu',
    'Print' => 'Imprempta',
    'Radio' => 'Ràdio',
    'Television' => 'Televisió',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
    -9 => '(GMT - 9) Alaska',
    -8 => '(GMT - 8) San Francisco',
    -7 => '(GMT - 7) Phoenix',
    -6 => '(GMT - 6) Saskatchewan',
    -4 => '(GMT - 4) Santiago',
    -3 => '(GMT - 3) Buenos Aires',
    -1 => '(GMT - 1) Azores',
    1 => '(GMT + 1) Madrid',
    4 => '(GMT + 4) Kabul',
    6 => '(GMT + 6) Astana',
    7 => '(GMT + 7) Bangkok',
    8 => '(GMT + 8) Perth',
    10 => '(GMT + 10) Brisbane',
    12 => '(GMT + 12) Auckland',
    -12 => '(GMT - 12) Línea Internacional de Fecha del Oeste',
    -11 => '(GMT - 11) Isla Midway, Samoa',
    -10 => '(GMT - 10) Hawai',
    -5 => '(GMT - 5) Nueva York',
    -2 => '(GMT - 2) Atlántico Central',
    2 => '(GMT + 2) Atenas',
    3 => '(GMT + 3) Moscú',
    5 => '(GMT + 5) Ekaterinburgo',
    9 => '(GMT + 9) Seúl',
    11 => '(GMT + 11) Islas Salomón',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Cap--',
  ),
  'dom_email_distribution' => 
  array (
    'roundRobin' => 'Round-Robin',
    '' => '--Cap--',
    'direct' => 'Assignació Directa',
    'leastBusy' => 'Menys-Ocupat',
  ),
  'dom_email_bool' => 
  array (
    'bool_false' => 'No',
    'bool_true' => 'Sí',
  ),
  'dom_switch_bool' => 
  array (
    'off' => 'No',
    '' => 'No',
    'on' => 'Si',
  ),
  'forecast_type_dom' => 
  array (
    'Rollup' => 'Rollup',
    'Direct' => 'Directe',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Màrketing',
    'Knowledege Base' => 'Base de Coneixement',
    'Sales' => 'Vendes',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'FAQ' => 'FAQ',
    'Marketing Collateral' => 'Impresos de Màrketing',
    'Product Brochures' => 'Fulletons de Producte',
  ),
  'document_status_dom' => 
  array (
    'FAQ' => 'FAQ',
    'Active' => 'Actiu',
    'Draft' => 'Borrador',
    'Expired' => 'Caducat',
    'Under Review' => 'En Revisió',
    'Pending' => 'Pendent',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'mailmerge' => 'Combinar correspondència',
    'eula' => 'CLUF',
    'nda' => 'ANR',
    'license' => 'Contracte de Llicència',
  ),
  'bselect_type_dom' => 
  array (
    'bool_false' => 'No',
    'bool_true' => 'Si',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'Email',
    'Invite' => 'Convocar',
  ),
  'wflow_address_type_dom' => 
  array (
    'cc' => 'CC:',
    'to' => 'Per a:',
    'bcc' => 'CCO:',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'cc' => 'CC:',
    'to' => 'Per a:',
    'bcc' => 'CCO:',
    'invite_only' => '(Només Convocats)',
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
    'active' => 'Actiu',
    'inactive' => 'Inactiu',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Missatge Enviat/Intentat',
    'send error' => 'Missatges Rebotats,Altra causa',
    'invalid email' => 'Missatges Rebotats,Email no vàlid',
    'link' => 'Enllaç',
    'viewed' => 'Missatge Vist',
    'removed' => 'Descartat',
    'lead' => 'Clients Potencials Creats',
    'contact' => 'Contactes Creats',
  ),
  'language_pack_name' => 'Català',
  'moduleListSingular' => 
  array (
    'Home' => 'Inici',
    'Bugs' => 'Inicidència',
    'Cases' => 'Cas',
    'Notes' => 'Nota',
    'Teams' => 'Equip',
    'Users' => 'Usuari',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'Prospecte',
    'Qualification' => 'Calificació',
    'Needs Analysis' => 'Necessita Anàlisi',
    'Value Proposition' => 'Proposta de Valor',
    'Id. Decision Makers' => 'Id. Prenedors de Decisions',
    'Perception Analysis' => 'Anàlisi de Percepció',
    'Proposal/Price Quote' => 'Proposta/Pressupost',
    'Negotiation/Review' => 'Negociació/Revisió',
    'Closed Won' => 'Guanyat',
    'Closed Lost' => 'Perdut',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 minut abans',
    300 => '5 minuts abans',
    600 => '10 minuts abans',
    900 => '15 minuts abans',
    1800 => '30 minuts abans',
    3600 => '1 hora abans',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Alta',
    'Medium' => 'Media',
    'Low' => 'Baja',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'No Iniciada',
    'In Progress' => 'En Progrés',
    'Completed' => 'Completada',
    'Pending Input' => 'Pendent d&#39;Informació',
    'Deferred' => 'Aplaçada',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Planificada',
    'Held' => 'Realitzada',
    'Not Held' => 'No Realitzada',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Planificada',
    'Held' => 'Realitzada',
    'Not Held' => 'No Realtizada',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Entrant',
    'Outbound' => 'Sortint',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Nou',
    'Assigned' => 'Assignat',
    'In Process' => 'En Procés',
    'Converted' => 'Convertit',
    'Recycled' => 'Reciclat',
    'Dead' => 'Mort',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Nou',
    'Assigned' => 'Assignat',
    'Closed' => 'Tancat',
    'Pending Input' => 'Pendent d&#39;Informació',
    'Rejected' => 'Rebutjat',
    'Duplicate' => 'Duplicat',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Alta',
    'P2' => 'Mitjana',
    'P3' => 'Baixa',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Actiu',
    'Inactive' => 'Inactiu',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Actiu',
    'Terminated' => 'Acomiadat',
    'Leave of Absence' => 'Excedència',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Alta',
    'Medium' => 'Mitjana',
    'Low' => 'Baixa',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'No Iniciada',
    'In Progress' => 'En Progrés',
    'Completed' => 'Completeda',
    'Pending Input' => 'Pendent d&#39;Informació',
    'Deferred' => 'Endarrerida',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Compte',
    'Opportunities' => 'Oportunitat',
    'Cases' => 'Cas',
    'Leads' => 'Client Potencial',
    'Contacts' => 'Contacte',
    'ProductTemplates' => 'Producte',
    'Quotes' => 'Pressupost',
    'Bugs' => 'Incidència',
    'Project' => 'Projecte',
    'ProjectTask' => 'Tasca de Projecte',
    'Tasks' => 'Tasca',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Pressupostat',
    'Orders' => 'Comanda',
    'Ship' => 'Enviat',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Preu Fixe',
    'ProfitMargin' => 'Marge Comercial',
    'PercentageMarkup' => 'Increment sobre Cost',
    'PercentageDiscount' => 'Descompte sobre Llista',
    'IsList' => 'Preu de Llista',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'En Stock',
    'Unavailable' => 'Sense Stock',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Subjecte a impostos',
    'Non-Taxable' => 'Lliure d&#39;impostos',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Sis mesos',
    '+1 year' => 'Un any',
    '+2 years' => 'Dos anys',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Pressupost',
    'Orders' => 'Comanda',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Borrador',
    'Negotiation' => 'Negociació',
    'Delivered' => 'Enviat',
    'On Hold' => 'Retingut',
    'Confirmed' => 'Confirmat',
    'Closed Accepted' => 'Tancat i Acceptat',
    'Closed Lost' => 'Tancat i Perdut',
    'Closed Dead' => 'Tancat i Mort',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Pendent',
    'Confirmed' => 'Confirmat',
    'On Hold' => 'Retingut',
    'Shipped' => 'Enviat',
    'Cancelled' => 'Cancelat',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Proposta',
    'Invoice' => 'Factura',
    'Terms' => 'Termes de Pagagament',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Nou',
    'Assigned' => 'Assignat',
    'Closed' => 'Tancat',
    'Pending' => 'Pendent',
    'Rejected' => 'Rebutjat',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Defecte',
    'Feature' => 'Característica',
  ),
  'dom_cal_month_long' => 
  array (
    1 => 'Gener',
    2 => 'Febrer',
    3 => 'Març',
    4 => 'Abril',
    5 => 'Maig',
    6 => 'Juny',
    7 => 'Juliol',
    8 => 'Agost',
    9 => 'Setembre',
    10 => 'Octubre',
    11 => 'Novembre',
    12 => 'Desembre',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Files i Columnes',
    'summary' => 'Resum',
    'detailed_summary' => 'Resum amb detalls',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Enviat',
    'archived' => 'Arxivat',
    'draft' => 'Borrador',
    'inbound' => 'Entrant',
  ),
  'dom_mailbox_type' => 
  array (
    'pick' => 'Crear [Qualsevol]',
    'bug' => 'Informar d&#39;Incidència',
    'support' => 'Nou Cas',
    'contact' => 'Nou Contacte',
    'sales' => 'Nou Client Potencial',
    'task' => 'Nova Tasca',
    'bounce' => 'Gestió de Rebots',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Seleccioni només un usuari quan realitzi una Assignació Directa d&#39;elements.',
    2 => 'Ha a d&#39;assignar Només Elements Marcats quan realitzi una Assignació Directa d&#39;elements.',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Si',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Client de correu per defecte al sistema',
    'sugar' => 'Client de correu de SugarCRM',
    'mailto' => 'Client de correu extern',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Format de correu per defecte',
    'html' => 'Correu HTML',
    'plain' => 'Correu amb text pla',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Hora d&#39;Execució Passada, No Executat',
    'ready' => 'Llest',
    'in progress' => 'En Progrés',
    'failed' => 'Fallat',
    'completed' => 'Completat',
    'no curl' => 'No executant: cURL no estè disponible',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Actiu',
    'Inactive' => 'Inactiu',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Acceptar',
    'decline' => 'Rebutjar',
    'tentative' => 'Tentativa',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Acceptat',
    'decline' => 'Rebutjat',
    'tentative' => 'Tentativa',
    'none' => 'Cap',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'Quan es guardi el registre',
    'Time' => 'Després de transcórrer el temps',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'És',
    'in' => 'És Un de',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Igual A',
    'Does not Equal' => 'Diferent De',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Igual A',
    'Less Than' => 'Menor que',
    'More Than' => 'Major que',
    'Does not Equal' => 'Diferent De',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Igual A',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 hores',
    28800 => '8 hores',
    43200 => '12 hores',
    86400 => '1 dia',
    172800 => '2 dies',
    259200 => '3 dies',
    345600 => '4 dies',
    432000 => '5 dies',
    604800 => '1 setmana',
    1209600 => '2 setmanes',
    1814400 => '3 setmanes',
    2592000 => '30 dies',
    5184000 => '60 dies',
    7776000 => '90 dies',
    10368000 => '120 dies',
    12960000 => '150 dies',
    15552000 => '180 dies',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'era major que',
    'Less Than' => 'és menor que',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Missatge Normal',
    'Custom Template' => 'Plantilla Personalitzada',
    'System Default' => 'Valor per Defecte del Sistema',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Usuaris Actuals',
    'rel_user' => 'Usuaris Relacionats',
    'rel_user_custom' => 'Usuari Personalitzat Relacionat',
    'specific_team' => 'Equip Específic',
    'specific_role' => 'Rol Específic',
    'specific_user' => 'Usuari Específic',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Valor Nou',
    'past' => 'Valor Anterior',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Usari',
    'Manager' => 'Responsable de l&#39;Usuari',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Per a:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Actualitzar Registre',
    'update_rel' => 'Actualitzar Registre Relacionat',
    'new' => 'Nou Registre',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Data de Tret',
    'Existing Value' => 'Valor Existent',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Opcions Bàsiques',
    'Advanced' => 'Opcions Avançades',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Usuari assignat al registre disparado',
    'modified_user_id' => 'Usuari que va modificar per última vegada el registre disparat',
    'created_by' => 'Usuari que va crear el registre disparat',
    'current_user' => 'Usuari amb la sessió iniciada',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Equip actual del Registre disparat',
    'current_team' => 'Equip de l&#39;Usuari amb la sessió iniciada',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Moure desplegable cap enrera per',
    'advance' => 'Moure desplegable cap endavant per',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Registres Existents i Nous',
    'New' => 'Només Registres Nous',
    'Update' => 'Només Registres Existents',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Tots els relacionats',
    'filter' => 'Filtrar relacionats',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'tots els relacionats',
    'any' => 'qualsevol relacionat',
  ),
  'dom_timezones_extra' => 
  array (
    -12 => '(GMT - 12) International Date Line West',
    -11 => '(GMT - 11) Midway Island, Samoa',
    -10 => '(GMT - 10) Hawaii',
    -9 => '(GMT - 9) Alaska',
    -8 => '(GMT - 8) (PST)',
    -7 => '(GMT - 7) (MST)',
    -6 => '(GMT - 6) (CST)',
    -5 => '(GMT - 5) (EST)',
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
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Alertes abans d&#39;Accions',
    'actions_alerts' => 'Accions abans d&#39;Alertes',
  ),
  'prospect_list_type_dom' => 
  array (
    'default' => 'Per Defecte',
    'seed' => 'Cap de Sèrie',
    'exempt_domain' => 'Llista d&#39;Exclusió - Per Domini',
    'exempt_address' => 'Llista d&#39;Exclusió - Per Direcció d&#39;Email',
    'exempt' => 'Llista d&#39;Exclusió - Per Id',
    'test' => 'Prova',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Contactes',
    'Users' => 'Usuaris',
    'Prospects' => 'Públic Objectiu',
    'Leads' => 'Clients Potencials',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'No Iniciat',
    'inprogress' => 'En Progrés',
    'signed' => 'Firmat',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Mensual',
    'quarterly' => 'Trimestral',
    'halfyearly' => 'Semestral',
    'yearly' => 'Anual',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 Dia',
    3 => '3 Dies',
    5 => '5 Dies',
    7 => '1 Setmana',
    14 => '2 Setmanes',
    21 => '3 Setmanes',
    31 => '1 Mes',
  ),
);

$app_strings = array (
  'LBL_LIST_TEAM' => 'Equip',
  'LBL_TEAM' => 'Equip:',
  'LBL_TEAM_ID' => 'ID Equip:',
  'ERR_CREATING_FIELDS' => 'Error a l\'omplir els camps addicionals de detall: ',
  'ERR_CREATING_TABLE' => 'Error al crear la taula: ',
  'ERR_DELETE_RECORD' => 'Ha d\'especificar un número de registre per eliminar el contacte.',
  'ERR_EXPORT_DISABLED' => 'Exportació deshabilitada.',
  'ERR_EXPORT_TYPE' => 'Error exportant ',
  'ERR_INVALID_AMOUNT' => 'Su us plau, introdueixi una quantitat vàlida.',
  'ERR_INVALID_DATE_FORMAT' => 'El format de data ha de ser: ',
  'ERR_INVALID_DATE' => 'Si us plau, introdueixi una data vàlida.',
  'ERR_INVALID_DAY' => 'Si us plau, introdueixi un dia vàlid.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'no és una adreça de correu vàlida.',
  'ERR_INVALID_HOUR' => 'Si us plau, introdueixi una hora vàlida.',
  'ERR_INVALID_MONTH' => 'Si us plau, introdueixi un mes vàlid.',
  'ERR_INVALID_TIME' => 'Si us plau, introdueixi una hora vàlida.',
  'ERR_INVALID_YEAR' => 'Si us plau, introdueixi un any vàlid de 4 dígits.',
  'ERR_NEED_ACTIVE_SESSION' => 'Ha de tenir una sessió activa per exportar el contingut.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Falta camp requerit:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Camp requerit no vàlid:',
  'ERR_INVALID_VALUE' => 'Valor no vàlid:',
  'ERR_NOTHING_SELECTED' => 'Si us plau, realitzi una selecció abans de procedir.',
  'ERR_OPPORTUNITY_NAME_DUPE' => 'Ya existeix una oportunitat amb el nom %s.  Si us plau, introdueixi un altre nom a continuació.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'No ha introduit un nom per l\'oportunitat.  Si us plau, introdueixi un nom per l\'oportunitat a continuació.',
  'ERR_SELF_REPORTING' => 'Un usuari no pot ser informador de si mateix.',
  'ERR_SQS_NO_MATCH_FIELD' => 'No s\'han trobat coincidències per el camp: ',
  'ERR_SQS_NO_MATCH' => 'Sense coincidències',
  'ERR_PORTAL_LOGIN_FAILED' => 'No ha estat possible crear una sessió de portal.  Si us plau, possis en contacte amb l\'administrador.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => 'Tornar a <a href="index.php">Inici</a>',
  'LBL_ACCOUNT' => 'Compte',
  'LBL_ACCOUNTS' => 'Comptes',
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Veure Resum',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Veure Resum [Alt+H]',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_BUTTON_TITLE' => 'Afegir [Alt+A]',
  'LBL_ADD_BUTTON' => 'Afegir',
  'LBL_ADD_DOCUMENT' => 'Afegir Document',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Afegir A Llista de Públic Objectiu',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Afegir A Llista de Públic Objectiu',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Clic per Tancar',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Tancar',
  'LBL_ADDITIONAL_DETAILS' => 'Detalls Addicionals',
  'LBL_ADMIN' => 'Admin',
  'LBL_ALT_HOT_KEY' => 'Alt+',
  'LBL_ARCHIVE' => 'Arxiu',
  'LBL_ASSIGNED_TO_USER' => 'Assignat a Usuari',
  'LBL_ASSIGNED_TO' => 'Assignat a:',
  'LBL_BACK' => 'Enrere',
  'LBL_BILL_TO_ACCOUNT' => 'Carregar en Compte',
  'LBL_BILL_TO_CONTACT' => 'Carregar a Contacte',
  'LBL_BROWSER_TITLE' => 'SugarCRM - CRM Comercial de Fonts Obertes',
  'LBL_BUGS' => 'Incidències',
  'LBL_BY' => 'per',
  'LBL_CALLS' => 'Trucades',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Enviar Emails de Campanya Encolats',
  'LBL_CANCEL_BUTTON_KEY' => 'X',
  'LBL_CANCEL_BUTTON_LABEL' => 'Cancelar',
  'LBL_CANCEL_BUTTON_TITLE' => 'Cancelar [Alt+X]',
  'LBL_SUBMIT_BUTTON_LABEL' => 'Enviar',
  'LBL_CASE' => 'Cas',
  'LBL_CASES' => 'Casos',
  'LBL_CHANGE_BUTTON_KEY' => 'G',
  'LBL_CHANGE_BUTTON_LABEL' => 'Canviar',
  'LBL_CHANGE_BUTTON_TITLE' => 'Canviar [Alt+G]',
  'LBL_CHARSET' => 'UTF-8',
  'LBL_CHECKALL' => 'Marcar Tots',
  'LBL_CLEAR_BUTTON_KEY' => 'C',
  'LBL_CLEAR_BUTTON_LABEL' => 'Netejar',
  'LBL_CLEAR_BUTTON_TITLE' => 'Netejar [Alt+C]',
  'LBL_CLEARALL' => 'Desmarcar Tots',
  'LBL_CLOSE_WINDOW' => 'Tancar Finestra',
  'LBL_CLOSEALL_BUTTON_KEY' => 'Q',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Tancar Tot',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Tancar Tot [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Redactar Correu',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Redactar Correu [Alt+L]',
  'LBL_CONTACT_LIST' => 'Llista de Contactes',
  'LBL_CONTACT' => 'Contacte',
  'LBL_CONTACTS' => 'Contactes',
  'LBL_CREATE_BUTTON_LABEL' => 'Crear',
  'LBL_CREATED_BY_USER' => 'Creat per Usuari',
  'LBL_CREATED' => 'Creat per',
  'LBL_CURRENT_USER_FILTER' => 'Només els meus elements:',
  'LBL_DATE_ENTERED' => 'Data de Creació:',
  'LBL_DATE_MODIFIED' => 'Última Modificació:',
  'LBL_DELETE_BUTTON_KEY' => 'D',
  'LBL_DELETE_BUTTON_LABEL' => 'Eliminar',
  'LBL_DELETE_BUTTON_TITLE' => 'Eliminar [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Eliminar',
  'LBL_DELETE' => 'Eliminar',
  'LBL_DELETED' => 'Eliminat',
  'LBL_DIRECT_REPORTS' => 'Informa a',
  'LBL_DONE_BUTTON_KEY' => 'X',
  'LBL_DONE_BUTTON_LABEL' => 'Fet',
  'LBL_DONE_BUTTON_TITLE' => 'Fet [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'L\'aplicació requereix que s\'apliqui una reparació d\'Horari d\'Estiu.  Si us plau, vagi al vincle <a href="index.php?module=Administration&action=DstFix">Reparar</a> a la consola d\'Administració i apliqui la reparació d\'Horari d\'Estiu.',
  'LBL_DUPLICATE_BUTTON_KEY' => 'U',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Duplicar',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Duplicar [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Duplicar',
  'LBL_EDIT_BUTTON_KEY' => 'E',
  'LBL_EDIT_BUTTON_LABEL' => 'Editar',
  'LBL_EDIT_BUTTON_TITLE' => 'Editar [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Editar',
  'LBL_VIEW_BUTTON_KEY' => 'V',
  'LBL_VIEW_BUTTON_LABEL' => 'Veure',
  'LBL_VIEW_BUTTON_TITLE' => 'Veure [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Veure',
  'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Enviar com PDF',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Enviar com PDF [Alt+M]',
  'LBL_EMAILS' => 'Correus',
  'LBL_EMPLOYEES' => 'Empleats',
  'LBL_ENTER_DATE' => 'Introduir Data',
  'LBL_EXPORT_ALL' => 'Exportar Tot',
  'LBL_EXPORT' => 'Exportar',
  'LBL_HIDE' => 'Ocultar',
  'LBL_ID' => 'ID',
  'LBL_IMPORT_PROSPECTS' => 'Importar Públic Objetiu',
  'LBL_IMPORT' => 'Importar',
  'LBL_LAST_VIEWED' => 'Recents',
  'LBL_LEADS' => 'Clientes Potencials',
  'LBL_LIST_ACCOUNT_NAME' => 'Nom Compte',
  'LBL_LIST_ASSIGNED_USER' => 'Usuari',
  'LBL_LIST_CONTACT_NAME' => 'Nom Contacte',
  'LBL_LIST_CONTACT_ROLE' => 'Rol Contacte',
  'LBL_LIST_EMAIL' => 'Correu',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_OF' => 'de',
  'LBL_LIST_PHONE' => 'Telèfon',
  'LBL_LIST_USER_NAME' => 'Nom d\'Usuari',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Està segur que desitja actualitzar la llista sencera?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Si us plau, seleccioni al menys 1 registre per a procedir.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Pàgina Actual',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Llista Complerta',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Registres Seleccionats',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Seleccionats: ',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'Juan',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Pérez',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Sr.',
  'LBL_LOGOUT' => 'Sortir',
  'LBL_MAILMERGE_KEY' => 'M',
  'LBL_MAILMERGE' => 'Combinar Correspondència',
  'LBL_MASS_UPDATE' => 'Actualització Massiva',
  'LBL_MEETINGS' => 'Reunions',
  'LBL_MEMBERS' => 'Membres',
  'LBL_MODIFIED_BY_USER' => 'Modificat per Usuari',
  'LBL_MODIFIED' => 'Modificat per',
  'LBL_MY_ACCOUNT' => 'El Meu Compte',
  'LBL_NAME' => 'Nom',
  'LBL_NEW_BUTTON_KEY' => 'N',
  'LBL_NEW_BUTTON_LABEL' => 'Nou',
  'LBL_NEW_BUTTON_TITLE' => 'Nou [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'Següent',
  'LBL_NONE' => '--Cap--',
  'LBL_NOTES' => 'Notes',
  'LBL_OPENALL_BUTTON_KEY' => 'O',
  'LBL_OPENALL_BUTTON_LABEL' => 'Obrir Tot',
  'LBL_OPENALL_BUTTON_TITLE' => 'Obrir Tot [Alt+O]',
  'LBL_OPENTO_BUTTON_TITLE' => 'Obrir a: [Alt+T]',
  'LBL_OPENTO_BUTTON_KEY' => 'T',
  'LBL_OPENTO_BUTTON_LABEL' => 'Obrir a: ',
  'LBL_OPPORTUNITIES' => 'Oportunitats',
  'LBL_OPPORTUNITY_NAME' => 'Nom d\'Oportunitat',
  'LBL_OPPORTUNITY' => 'Oportunitat',
  'LBL_OR' => 'O',
  'LBL_PERCENTAGE_SYMBOL' => '%',
  'LBL_PRODUCT_BUNDLES' => 'Jocs de Productes',
  'LBL_PRODUCTS' => 'Productes',
  'LBL_PROJECT_TASKS' => 'Tasques de Projecte',
  'LBL_PROJECTS' => 'Projectes',
  'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Crear Oportunitat a partir de Pressupost',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Crear Oportunitat a partir de Pressupost [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Pressupostos enviats a',
  'LBL_QUOTES' => 'Pressupostos',
  'LBL_RELATED_RECORDS' => 'Registres Relacionats',
  'LBL_REMOVE' => 'treure',
  'LBL_REQUIRED_SYMBOL' => '*',
  'LBL_SAVE_BUTTON_KEY' => 'S',
  'LBL_SAVE_BUTTON_LABEL' => 'Guardar',
  'LBL_SAVE_BUTTON_TITLE' => 'Guardar [Alt+S]',
  'LBL_FULL_FORM_BUTTON_KEY' => 'F',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Formulari Complert',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Formulari Complert [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Guardar i Crear Nou',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Guardar i Crear Nou [Alt+V]',
  'LBL_SEARCH_BUTTON_KEY' => 'Q',
  'LBL_SEARCH_BUTTON_LABEL' => 'Cercar',
  'LBL_SEARCH_BUTTON_TITLE' => 'Cercar [Alt+Q]',
  'LBL_SEARCH' => 'Search',
  'LBL_SELECT_BUTTON_KEY' => 'T',
  'LBL_SELECT_BUTTON_LABEL' => 'Seleccionar',
  'LBL_SELECT_BUTTON_TITLE' => 'Seleccionar [Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Seleccionar Contacte',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Seleccionar Contacte [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Seleccionar des d\'Informes',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Seleccionar Informes',
  'LBL_SELECT_USER_BUTTON_KEY' => 'U',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Seleccionar Usuari',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Seleccionar Usuari [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Recursos utilitzats per a construir aquesta pàgina (consultes, arxius)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'segons.',
  'LBL_SERVER_RESPONSE_TIME' => 'Temps de resposta del servidor:',
  'LBL_SHIP_TO_ACCOUNT' => 'Enviar a Compte',
  'LBL_SHIP_TO_CONTACT' => 'Enviar a Contacte',
  'LBL_SHORTCUTS' => 'Dreceres',
  'LBL_SHOW' => 'Mostrar',
  'LBL_SQS_INDICATOR' => '',
  'LBL_STATUS_UPDATED' => '¡El seu estat pera aquest event ha estat actualitzat!',
  'LBL_STATUS' => 'Estat:',
  'LBL_SUBJECT' => 'Assumpte',
  'LBL_SYNC' => 'Sincronitzar',
  'LBL_TASKS' => 'Tasques',
  'LBL_TEAMS_LINK' => 'Equip',
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arxivar Correu',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arxivar Correu [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Accés no autoritzat a l\'administració',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Restaurar',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Restaurar [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Restaurar',
  'LBL_UNDELETE' => 'Restaurar',
  'LBL_UNSYNC' => 'Desincronitzar',
  'LBL_UPDATE' => 'Actualitzar',
  'LBL_USER_LIST' => 'Llista d\'Usuaris',
  'LBL_USERS_SYNC' => 'Sincronització d\'Usuaris',
  'LBL_USERS' => 'Usuaris',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'Imprimir com PDF',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'Imprimir com PDF [Alt+P]',
  'LNK_ABOUT' => 'Sobre',
  'LNK_ADVANCED_SEARCH' => 'Avançada',
  'LNK_BASIC_SEARCH' => 'Bàsica',
  'LNK_DELETE_ALL' => 'elim tot',
  'LNK_DELETE' => 'elim',
  'LNK_EDIT' => 'edit',
  'LNK_GET_LATEST' => 'Obtenir última',
  'LNK_GET_LATEST_TOOLTIP' => 'Reemplaçar amb última versió',
  'LNK_HELP' => 'Ajuda',
  'LNK_LIST_END' => 'Fi',
  'LNK_LIST_NEXT' => 'Següent',
  'LNK_LIST_PREVIOUS' => 'Anterior',
  'LNK_LIST_RETURN' => 'Tornar a llista',
  'LNK_LIST_START' => 'Inici',
  'LNK_LOAD_SIGNED' => 'Signar',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'Reemplaçar amb document firmat',
  'LNK_PRINT' => 'Imprimir',
  'LNK_REMOVE' => 'quit',
  'LNK_RESUME' => 'Continuar',
  'LNK_VIEW_CHANGE_LOG' => 'Veure Registre de Canvis',
  'NTC_CLICK_BACK' => 'Si us plau, presioni el botó anterior del navegador i corretgeixi l\'error.',
  'NTC_DATE_FORMAT' => '(aaaa-mm-dd)',
  'NTC_DATE_TIME_FORMAT' => '(aaaa-mm-dd 24:00)',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Està segur que desitja eliminar els registres seleccionats?',
  'NTC_DELETE_CONFIRMATION' => 'Està segur que desitja eliminar aquest registre?',
  'NTC_LOGIN_MESSAGE' => 'Si us plau, introdueixi el seu nom d\'usuari i contrasenya:',
  'NTC_NO_ITEMS_DISPLAY' => 'Cap',
  'NTC_REMOVE_CONFIRMATION' => 'Està segur que desitja treure aquesta relació?',
  'NTC_REQUIRED' => 'Indiqui un camp requerit',
  'NTC_SUPPORT_SUGARCRM' => 'Soport al projecte de fonts oberts SugarCRM mitjançant una donació a través de PayPal - és ràpid, gratuit i segur!',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_WELCOME' => 'Benvingut',
  'NTC_YEAR_FORMAT' => '(aaaa)',
  'LOGIN_LOGO_ERROR' => 'Si us plau, reemplaci els logos de SugarCRM.',
  'ERROR_FULLY_EXPIRED' => 'La llicència de la seva companyia per SugarCRM ha caducat fa més de 30 dies i necessita ser actualitzada. Només els administradors podrán iniciar la sessió.',
  'ERROR_LICENSE_EXPIRED' => 'La llicència de la seva companyia per SugarCRM ha de ser actualitzada. Només els administradors podrán iniciar la sessió',
  'ERROR_NO_RECORD' => 'Error al recuperar registre.  Aquest registre ha de ser eliminat o pot ser que no estigui autoritzat per veure-ho.',
  'LBL_DUP_MERGE' => 'Buscar Duplicats',
  'LBL_LOADING' => 'Carregant ...',
  'LBL_SAVING_LAYOUT' => 'Guardant Disseny ...',
  'LBL_SAVED_LAYOUT' => 'El disseny ha estat guardat.',
  'LBL_SAVED' => 'Guardat',
  'LBL_SAVING' => 'Guardat',
  'LBL_DISPLAY_COLUMNS' => 'Mostrar Columnes',
  'LBL_HIDE_COLUMNS' => 'Ocultar Columnes',
  'LBL_SEARCH_CRITERIA' => 'Criteris de Recerca',
  'LBL_SAVED_VIEWS' => 'Vistes Guardades',
  'LBL_NO_RECORDS_FOUND' => '- 0 Registres Trobats -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'El servidor està ocupat. Si us plau, intenti-ho més tard.',
  'LBL_CHANGE_PASSWORD' => 'Canviar Contrasenya',
  'LBL_LOGIN_TO_ACCESS' => 'Si us plau, inicii la sessió per accedir a aquesta àrea.',
);


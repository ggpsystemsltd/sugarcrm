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
  'language_pack_name' => 'FR Français',
  'moduleList' =>
  array (
    'Home' => 'Accueil',
    'Bugs' => 'Bugs',
    'Cases' => 'Tickets',
    'Notes' => 'Notes',
    'Newsletters' => 'Newsletters',
    'Teams' => 'Equipes',
    'Users' => 'Utilisateurs',
    'KBDocuments' => 'Base de connaissance',
    'FAQ' => 'FAQ',
        ),
  'moduleListSingular' =>
  array (
    'Home' => 'Accueil',
    'Bugs' => 'Bug',
    'Cases' => 'Ticket',
    'Notes' => 'Note',
    'Teams' => 'Equipe',
    'Users' => 'Utilisateur'
        ),

  'checkbox_dom'=> array(
    ''=>'',
    '1'=>'Oui',
    '2'=>'Non',
  ),

    'account_type_dom' =>
  array (
    '' => '',
    'Analyst' => 'Analyste',
    'Competitor' => 'Concurrent',
    'Customer' => 'Client',
    'Integrator' => 'Integrateur',
    'Investor' => 'Investisseur',
    'Partner' => 'Partenaire',
    'Press' => 'Presse',
    'Prospect' => 'Prospect',
    'Reseller' => 'Revendeur',
    'Other' => 'Autre',
  ),
    'industry_dom' =>
  array (
    '' => '',
      'Apparel' => 'Textile',
      'Banking' => 'Banque',
      'Biotechnology' => 'Biotechnologie',
      'Chemicals' => 'Industrie Chimique',
      'Communications' => 'Communications',
      'Construction' => 'Construction - BTP',
      'Consulting' => 'Conseil',
      'Education' => 'Education',
      'Electronics' => 'Informatique - Electronique',
      'Energy' => 'Energie',
      'Engineering' => 'Ingénierie',
      'Entertainment' => 'Culture-Presse',
      'Environmental' => 'Environnement',
      'Finance' => 'Finance',
      'Government' => 'Administration',
      'Healthcare' => 'Santé',
      'Hospitality' => 'Hopitaux',
      'Insurance' => 'Assurance',
      'Machinery' => 'Industrie lourde',
      'Manufacturing' => 'Industrie Manufact.',
      'Media' => 'Média',
      'Not For Profit' => 'Sans but lucratif',
      'Recreation' => 'Loisir',
      'Retail' => 'Commerce détail',
      'Shipping' => 'Transports',
      'Technology' => 'Technologie',
      'Telecommunications' => 'Télécommunications',
      'Transportation' => 'Voyage-hotellerie',
      'Utilities' => 'Services',
      'Other' => 'Autre'
  ),
  
  'lead_source_dom' =>
  array (
    '' => '',
    'Cold Call' => 'Appel Entrant',
    'Existing Customer' => 'Client existant',
    'Self Generated' => 'Récurent',
    'Employee' => 'Employé',
    'Partner' => 'Partenaire',
    'Public Relations' => 'Relations publiques',
    'Direct Mail' => 'Mailing',
    'Conference' => 'Conférence',
    'Trade Show' => 'Salon',
    'Web Site' => 'Site Web',
    'Word of mouth' => 'Recommandé',
    'Email' => 'Email',
    'Other' => 'Autre',
  ),
  'opportunity_type_dom' =>
  array (
    '' => '',
    'Existing Business' => 'Récurrent',
    'New Business' => 'Nouvelle affaire',
  ),
    
  'opportunity_relationship_type_dom' =>
  array (
    '' => '',
      'Primary Decision Maker' => 'Décideur Principal',
      'Business Decision Maker' => 'Acheteur',
      'Business Evaluator' => 'Chef de projet',
      'Technical Decision Maker' => 'Responsable technique',
      'Technical Evaluator' => 'Utilisateur',
      'Executive Sponsor' => 'Sponsor',
      'Influencer' => 'Influenceur',
      'Other' => 'Autre'
  ),
    
  'case_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Contact' => 'Contact principal',
    'Alternate Contact' => 'Contact Alternatif',
  ),
  'payment_terms' =>
  array (
    '' => '',
    'Net 15' => 'Net 15',
    'Net 30' => 'Net 30',
  ),
  
  'sales_stage_dom' =>
  array (
      'Prospecting' => 'Prospection',
      'Qualification' => 'Qualification',
      'Needs Analysis' => 'Analyse des besoins',
      'Value Proposition' => 'Chiffrage',
      'Id. Decision Makers' => 'Ident. Décideurs',
      'Perception Analysis' => 'Evaluation',
      'Proposal/Price Quote' => 'Devis/Proposition',
      'Negotiation/Review' => 'Négociation',
      'Closed Won' => 'Gagné',
      'Closed Lost' => 'Perdu'
  ),
  'sales_probability_dom' =>   array (
    'Prospecting' => '10',
    'Qualification' => '20',
    'Needs Analysis' => '25',
    'Value Proposition' => '30',
    'Id. Decision Makers' => '40',
    'Perception Analysis' => '50',
    'Proposal/Price Quote' => '65',
    'Negotiation/Review' => '80',
    'Closed Won' => '100',
    'Closed Lost' => '0',
  ),
   'activity_dom' => array (
      'Call' => 'Call',
      'Meeting' => 'Meeting',
      'Task' => 'Task',
      'Email' => 'Email',
      'Note' => 'Note'
  ),
   'salutation_dom' => array (
      '' => '',
      'Mr.' => 'M.',
      'Ms.' => 'Mlle',
      'Mrs.' => 'Mme',
      'Dr.' => 'Dr.',
      'Prof.' => 'Prof.'
  ),
    'reminder_max_time'=>3600,
  'reminder_time_options' => array (
      '60' => '1 minute avant',
      '300' => '5 minutes avant',
      '600' => '10 minutes avant',
      '900' => '15 minutes avant',
      '1800' => '30 minutes avant',
      '3600' => '1 heure avant'
  ),


  
  'task_priority_dom' =>
  array (
    'High' => 'Haute',
    'Medium' => 'Medium',
    'Low' => 'Basse',
  ),
  
  'task_status_dom' =>
  array (
    'Not Started' => 'Non démarré',
    'In Progress' => 'En cours',
    'Completed' => 'Terminée',
    'Pending Input' => 'En attente',
    'Deferred' => 'Reportée',
  ),
  
  'meeting_status_dom' =>
  array (
    'Planned' => 'Planifiée',
    'Held' => 'Tenue',
    'Not Held' => 'Annulée',
  ),
  
  'call_status_dom' =>
  array (
    'Planned' => 'Planifiée',
    'Held' => 'Tenue',
    'Not Held' => 'Annulée',
  ),
  
  'call_direction_dom' =>
  array (
    'Inbound' => 'Entrant',
    'Outbound' => 'Sortant',
  ),
  'lead_status_dom' =>
  array (
    '' => '',
    'New' => 'Nouveau',
    'Assigned' => 'Assigné',
    'In Process' => 'En cours',
    'Converted' => 'Converti',
    'Recycled' => 'Reactivé',
    'Dead' => 'Mort',
  ),
  'lead_status_noblank_dom' =>
  array (
    'New' => 'Nouveau',
    'Assigned' => 'Assigné',
    'In Process' => 'En cours',
    'Converted' => 'Converti',
    'Recycled' => 'Reactivé',
    'Dead' => 'Mort',
  ),
    
  'case_status_dom' =>
  array (
    'New' => 'Nouveau',
    'Assigned' => 'Assigné',
    'Closed' => 'Clos',
    'Pending Input' => 'En attente',
    'Rejected' => 'Rejeté',
    'Duplicate' => 'Dupliqué',
  ),
  
  'case_priority_dom' =>
  array (
    'P1' => 'Haute',
    'P2' => 'Moyen',
    'P3' => 'Bas',
  ),
  'user_status_dom' =>
  array (
    'Active' => 'Actif',
    'Inactive' => 'Inactif',
  ),
  'employee_status_dom' =>
  array (
    'Active' => 'Actif',
    'Terminated' => 'Terminé',
    'Leave of Absence' => 'Absence temporaire',
  ),
  'messenger_type_dom' =>
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
  ),

    'project_task_priority_options' => array (
        'High' => 'Haut',
        'Medium' => 'Moyen',
        'Low' => 'Bas',
    ),
    'project_task_status_options' => array (
        'Not Started' => 'Non démarré',
        'In Progress' => 'En cours',
        'Completed' => 'Terminée',
        'Pending Input' => 'En attente',
        'Deferred' => 'Reportée',
    ),
    'project_task_utilization_options' => array (
        '0' => 'none',
        '25' => '25',
        '50' => '50',
        '75' => '75',
        '100' => '100',
    ),
    
  'record_type_display' =>
  array (
    'Accounts' => 'Account',
    'Opportunities' => 'Opportunity',
    'Cases' => 'Case',
    'Leads' => 'Lead',
    'Contacts' => 'Contacts', 
    'ProductTemplates' => 'Product',
    'Quotes' => 'Quote',

    'Bugs' => 'Bug',
    'Project' => 'Project',
    'ProjectTask' => 'Project Task',
    'Tasks' => 'Task',
  ),

  'record_type_display_notes' =>
  array (
    'Accounts' => 'Compte',
    'Contacts' => 'Contact',
    'Opportunities' => 'Affaires',
    'Cases' => 'Ticket',
    'Leads' => 'Lead',

    'ProductTemplates' => 'Produit Modèle',
    'Quotes' => 'Devis',
    'Products' => 'Produits',
    'Contracts' => 'Contats',

    'Bugs' => 'Bug',
    'Emails' => 'Email',
    'Project' => 'Projet',
    'ProjectTask' => 'Tâches Projet',
    'Meetings' => 'Réunions',
    'Calls' => 'Appels'
  ),


  
  'product_status_quote_key' => 'Quotes',
  'product_status_dom' =>
  array (
    'Quotes' => 'Devis fait',
    'Orders' => 'Commandé',
    'Ship' => 'Livré',
  ),


  
  'pricing_formula_dom' =>
  array (
    'Fixed' => 'Prix fixe',
    'ProfitMargin' => 'Marge sur Prix final',
    'PercentageMarkup' => 'Marge sur le Prix de Revient',
    'PercentageDiscount' => 'Remise sur Prix Public',
    'IsList' => 'Même que Prix Public',
  ),
  'product_template_status_dom' =>
  array (
    'Available' => 'En Stock',
    'Unavailable' => 'Hors Stock',
  ),
  'tax_class_dom' =>
  array (
    'Taxable' => 'Taxable',
    'Non-Taxable' => 'Non-Taxable',
  ),
  'support_term_dom' =>
  array (
    '+6 months' => 'Six mois',
    '+1 year' => 'Un an',
    '+2 years' => 'Deux ans',
  ),


  'quote_type_dom' =>
  array (
    'Quotes' => 'Devis',
    'Orders' => 'Commandé',
  ),
  
  'quote_stage_dom' =>
  array (
      'Draft' => 'Brouillon',
      'Negotiation' => 'Négociation',
      'Delivered' => 'Délivré',
      'On Hold' => 'Suspendu',
      'Confirmed' => 'Confirmé',
      'Closed Accepted' => 'Clos Accepté',
      'Closed Lost' => 'Perdu',
      'Closed Dead' => 'Clos Abandonné'
  ),
  
  'order_stage_dom' =>
  array (
    'Pending' => 'En attente',
    'Confirmed' => 'Confirmé',
    'On Hold' => 'Suspendu',
    'Shipped' => 'Livré',
    'Cancelled' => 'Annulé',
  ),

  
  'quote_relationship_type_dom' =>
  array (
    '' => '',
      'Primary Decision Maker' => 'Décideur Principal',
      'Business Decision Maker' => 'Acheteur',
      'Business Evaluator' => 'Chef de projet',
      'Technical Decision Maker' => 'Responsable technique',
      'Technical Evaluator' => 'Utilisateur',
      'Executive Sponsor' => 'Sponsor',
      'Influencer' => 'Influenceur',
      'Other' => 'Autre'
  ),
  'layouts_dom' =>
  array (
      'Standard' => 'Standard',
      'Invoice' => 'Facture',
      'Terms' => 'Selon Conditions'
  ),

  
  'bug_priority_dom' =>
  array (
    'Urgent' => 'Urgent',
    'High' => 'Haute',
    'Medium' => 'Moyenne',
    'Low' => 'Basse',
  ),
   
  'bug_resolution_dom' =>
  array (
      '' => '',
      'Accepted' => 'Accepté',
      'Duplicate' => 'Doublon',
      'Fixed' => 'Fixé',
      'Out of Date' => 'Périmé',
      'Invalid' => 'Invalide',
      'Later' => 'Reporté'
  ),
  
  'bug_status_dom' =>
  array (
      'New' => 'Nouveau',
      'Assigned' => 'Assigné',
      'Closed' => 'Fermé',
      'Pending' => 'En attente',
      'Rejected' => 'Rejeté'
  ),
   
  'bug_type_dom' =>
  array (
      'Defect' => 'Défaut',
      'Feature' => 'Fonctionnalité'
  ),

  
  'source_dom' =>
  array (
      '' => '',
      'Internal' => 'Interne',
      'Forum' => 'Forum',
      'Web' => 'Web',
      'InboundEmail' => 'Email Entrant'
  ),

  
  'product_category_dom' =>
  array (
      '' => '',
      'Accounts' => 'Comptes',
      'Activities' => 'Activités',
      'Bug Tracker' => 'Bugs',
      'Calendar' => 'Calendrier',
      'Calls' => 'Appels',
      'Campaigns' => 'Campagnes',
      'Cases' => 'Tickets',
      'Contacts' => 'Contacts',
      'Currencies' => 'Devises',
      'Dashboard' => 'Tableaux de bord',
      'Documents' => 'Documents',
      'Emails' => 'Emails',
      'Feeds' => 'Flux RSS',
      'Forecasts' => 'Prévisions',
      'Help' => 'Aide',
      'Home' => 'Accueil',
      'Leads' => 'Leads',
      'Meetings' => 'Réunions',
      'Notes' => 'Notes',
      'Opportunities' => 'Affaires',
      'Outlook Plugin' => 'Plugin Outlook',
      'Product Catalog' => 'Catalogue Produits',
      'Products' => 'Produits',
      'Projects' => 'Projets',
      'Quotes' => 'Devis',
      'Releases' => 'Releases',
      'RSS' => 'Flux RSS',
      'Studio' => 'Studio',
      'Upgrade' => 'Mise à Jour',
      'Users' => 'Utilisateurs'
  ),

  
  'campaign_status_dom' =>
  array (
      '' => '',
      'Planning' => 'Planifiée',
      'Active' => 'Active',
      'Inactive' => 'Inactive',
      'Complete' => 'Terminée',
      'In Queue' => 'En File d\'Attente',
      'Sending' => 'Envoi en cours'
  ),
  'campaign_type_dom' =>
  array (
        '' => '',
      'Telesales' => 'Téléprospection',
      'Mail' => 'Courrier',
      'Email' => 'Email',
      'Print' => 'Impression',
      'Web' => 'Web',
      'Radio' => 'Radio',
      'Television' => 'Télévision'
        ),



  'notifymail_sendtype' =>
  array (
        'SMTP' => 'SMTP',
  ),
    'dom_timezones' => array('-12' => '(GMT - 12) Ligne de date internationale occidentale',
                             '-11' => '(GMT - 11) Iles Samoa',
                             '-10' => '(GMT - 10) Hawaii',
                             '-9' => '(GMT - 9) Alaska',
                             '-8' => '(GMT - 8) San Francisco',
                             '-7' => '(GMT - 7) Phoenix',
                             '-6' => '(GMT - 6) Saskatchewan',
                             '-5' => '(GMT - 5) New York',
                             '-4' => '(GMT - 4) Santiago',
                             '-3' => '(GMT - 3) Buenos Aires',
                             '-2' => '(GMT - 2) Atlantique',
                             '-1' => '(GMT - 1) Açores',
                             '0' => '(GMT)',
                             '1' => '(GMT + 1) Madrid',
                             '2' => '(GMT + 2) Athènes',
                             '3' => '(GMT + 3) Moscou',
                             '4' => '(GMT + 4) Kaboul',
                             '5' => '(GMT + 5) Ekaterinburg',
                             '6' => '(GMT + 6) Astana',
                             '7' => '(GMT + 7) Bangkok',
                             '8' => '(GMT + 8) Perth',
                             '9' => '(GMT + 9) Séoul',
                             '10' => '(GMT + 10) Brisbane',
                             '11' => '(GMT + 11) Iles Solomon',
                             '12' => '(GMT + 12) Auckland'
                             ),
    'dom_cal_month_long'=>array(
                    '0'=>"",
                    '1' => 'Janvier',
                    '2' => 'Février',
                    '3' => 'Mars',
                    '4' => 'Avril',
                    '5' => 'Mai',
                    '6' => 'Juin',
                    '7' => 'Juillet',
                    '8' => 'Août',
                    '9' => 'Septembre',
                    '10' => 'Octobre',
                    '11' => 'Novembre',
                    '12' => 'Décembre'
                    ),

    'dom_report_types'=>array(
                'tabular'=>'Lignes et Colonnes',
                'summary'=>'Somme',
                'detailed_summary'=>'Somme détaillée',
    ),
    'dom_email_types'=> array(
        'out'       => 'Envoyé',
        'archived'  => 'Archivé',
        'draft'     => 'Brouillon',
        'inbound'   => 'Entrant',
    ),
    'dom_email_status' => array (
      'archived' => 'Archivé',
      'closed' => 'Fermé',
      'draft' => 'Brouillon',
      'read' => 'Lu',
      'replied' => 'Répondu',
      'sent' => 'Envoyé',
      'send_error' => 'Erreur Envoi',
      'unread' => 'Non Lu'
    ),

    'dom_email_server_type' => array('' => '--Aucun(e)--',
                                     'imap' => 'IMAP',
                                     'pop3' => 'POP3',
    ),
    'dom_mailbox_type' => array(
                                  'pick' => 'Créer Ticket/Lead/Contact/Bug',
                                  'bug' => 'Créer Bug',
                                  'support' => 'Créer Ticket',
                                  'contact' => 'Créer Contact',
                                  'sales' => 'Créer Lead',
                                  'task' => 'Créer Tâche',
                                  'bounce' => 'Gestion des Bounces'
    ),
    'dom_email_distribution'=> array(''             => '--Aucun(e)--',
                                  'direct' => 'Assignation directe',
                                  'roundRobin' => 'Round-Robin',
                                  'leastBusy' => 'Moins chargé'
    ),
    'dom_email_errors'      => array(
                                  '1' => 'Sélectionner 1 seul utilisateur quand vous assignez des éléments directement.',
                                  '2' => 'Vous pouvez seulement assigner des éléments cochés lorsque vous souhaité assigner directement des éléments.'

    ),
    'dom_email_bool'        => array('bool_true' => 'Oui',
                                     'bool_false' => 'Non',
    ),
    'dom_int_bool'          => array(1 => 'Oui',
                                     0 => 'Non',
    ),
    'dom_switch_bool'       => array ('on' => 'Oui',
                                        'off' => 'Non',
                                        '' => 'Non', ),
    'dom_email_link_type'   => array(   '' => 'Client Mail par défaut',
                                      'mailto' => 'Client Mail Externe',
                                      'sugar' => 'Client Mail SugarCRM'
    ),

    'dom_email_editor_option'=> array(  '' => 'Format email par défaut',
                                      'html' => 'Email HTML',
                                      'plain' => 'Email Texte Brut'
    ),


    'schedulers_times_dom'  => array(
                                      'not run' => 'Temps d\'execution dépassé, Non Executé',
                                      'ready' => 'Prêt',
                                      'in progress' => 'En cours',
                                      'failed' => 'Echec',
                                      'completed' => 'Réalisée',
                                      'no curl' => 'Non exécuté: cURL non disponible'
    ),

    'forecast_schedule_status_dom' =>
    array (
    'Active' => 'Actif',
    'Inactive' => 'Inactif',
  ),
    'forecast_type_dom' =>
    array (
    'Direct' => 'Direct',
    'Rollup' => 'Remontée info',
  ),

    'document_category_dom' =>
    array (
    '' => '',
    'Marketing' => 'Marketing',
    'Knowledege Base' => 'Base de connaissance',
    'Sales' => 'Ventes',
  ),

    'document_subcategory_dom' =>
    array (
    '' => '',
    'Marketing Collateral' => 'Marketing Secondaire',
    'Product Brochures' => 'Brochures Produits',
    'FAQ' => 'FAQ',
  ),

    'document_status_dom' =>
    array (
      'Active' => 'Actif',
      'Draft' => 'Brouillon',
      'FAQ' => 'FAQ',
      'Expired' => 'Périmé',
      'Under Review' => 'En cours de révision',
      'Pending' => 'En attente'
  ),
  'document_template_type_dom' =>
  array(
    ''=>'',
      'mailmerge' => 'Publipostage',
      'eula' => 'EULA',
      'nda' => 'NDA',
      'license' => 'Termes de Licence'
  ),
    'dom_meeting_accept_options' =>
    array (
    'accept' => 'Accept',
    'decline' => 'Decline',
    'tentative' => 'Tentative',
  ),
    'dom_meeting_accept_status' =>
    array (
      'accept' => 'Accepté',
      'decline' => 'Décliné',
      'tentative' => 'Incertain',
      'none' => 'Indéfini'
  ),

  'query_calc_oper_dom' =>
      array (
      '+' => '(+) Plus',
      '-' => '(-) Moins',
      '*' => '(X) Multiplié par',
      '/' => '(/) Divisé par'
  ),
  'wflow_type_dom' =>
        array (
      'Normal' => 'Quand enregistrement sauvegardé',
      'Time' => 'Aprés un délai dépassé'
  ),
  'mselect_type_dom' =>
        array (
    'Equals' => 'Est',
    'in' => 'Contient',
  ),
   'cselect_type_dom' =>
        array (
    'Equals' => 'Egal',
    'Does not Equal' => 'Différent de',
  ),
   'dselect_type_dom' =>
        array (
    'Equals' => 'Egal',
    'Less Than' => 'Supérieur à',
    'More Than' => 'Inférieur à',
    'Does not Equal' => 'Différent de',
  ),
   'bselect_type_dom' =>
        array (
    'bool_true' => 'Oui',
    'bool_false' => 'Non',
  ),
    'bopselect_type_dom' =>
        array (
    'Equals' => 'Egal',
  ),
    'tselect_type_dom' =>
        array (
      '0' => '0 heures',
      '14440' => '4 heures',
      '28800' => '8 heures',
      '43200' => '12 heures',
      '86400' => '1 jour',
      '172800' => '2 jours',
      '259200' => '3 jours',
      '345600' => '4 jours',
      '432000' => '5 jours',
      '604800' => '1 semaine',
      '1209600' => '2 semaines',
      '1814400' => '3 semaines',
      '2592000' => '30 jours',
      '5184000' => '60 jours',
      '7776000' => '90 jours',
      '10368000' => '120 jours',
      '12960000' => '150 jours',
      '15552000' => '180 jours'
  ),
      'dtselect_type_dom' =>
        array (
      'More Than' => 'est supérieur à',
      'Less Than' => 'est inférieur à'
  ),
        'wflow_alert_type_dom' =>
        array (
    'Email' => 'Email',
    'Invite' => 'Invite'
  ),
        'wflow_source_type_dom' =>
        array (
      'Normal Message' => 'Message Normal',
      'Custom Template' => 'Modèle personnalisé',
      'System Default' => 'Systéme par Default'
  ),
          'wflow_user_type_dom' =>
        array (
      'current_user' => 'Utilisateurs actuels',
      'rel_user' => 'Utilisateurs rattachés',
      'rel_user_custom' => 'Utilisateur personnalisé rattaché',
      'specific_team' => 'Equipe spécifique',
      'specific_role' => 'Rôle spécifique',
      'specific_user' => 'Utilisateur spécifique'
  ),
          'wflow_array_type_dom' =>
        array (
    'future' => 'Nouvelle Valeur',
    'past' => 'Ancienne Valeur',
  ),
          'wflow_relate_type_dom' =>
        array (
    'Self' => 'Assigné à',
    'Manager' => 'Responsable de l&#39;utilisateur',
  ),
    'wflow_address_type_dom' =>
        array (
    'to' => 'A:',
    'cc' => 'CC:',
    'bcc' => 'BCC:',
  ),
     'wflow_address_type_invite_dom' =>
        array (
    'to' => 'A:',
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'invite_only' => '(Invite JavaScript Seulement)',
  ),
     'wflow_address_type_to_only_dom' =>
        array (
    'to' => 'A:',
  ),
    'wflow_action_type_dom' =>
        array (
      'update' => 'Mise à jour de l&#39;enregistrement',
      'update_rel' => 'Mise à jour de l&#39;enregistrement associé',
      'new' => 'Nouvel enregistrement'
  ),
  'wflow_action_datetime_type_dom' =>
        array (
      'Triggered Date' => 'Date déclenchée',
      'Existing Value' => 'Valeur existante'
  ),
  'wflow_set_type_dom' =>
        array (
    'Basic' => 'Basic Options',
    'Advanced' => 'Advanced Options',
  ),
  'wflow_adv_user_type_dom' =>
        array (
      'assigned_user_id' => 'Utilisateur assigné à l\'enregistrement déclenché',
      'modified_user_id' => 'Utilisateur qui a, en dernier, modifié l\'enregistrement déclenché',
      'created_by' => 'Utilisateur qui a créé l\'enregistrement déclenché',
      'current_user' => 'Utilisateur loggué'
  ),
  'wflow_adv_team_type_dom' =>
        array (
      'team_id' => 'Equipe actuelle de l&#39;enregistrement déclenché',
      'current_team' => 'Equipe de l&#39;utilisateur loggué'
  ),
  'wflow_adv_enum_type_dom' =>
        array (
      'retreat' => 'Remonter dans la liste déroulante de ',
      'advance' => 'Descendre dans la liste déroulante de '
  ),
  'wflow_record_type_dom' =>
        array (
      'All' => 'Enregistrements nouveaux et existants',
      'New' => 'Nouveaux enregistrements seulement',
      'Update' => 'Enregistrements existant seulement'
  ),
  'wflow_rel_type_dom' =>
        array (
      'all' => 'Toutes les associations',
      'filter' => 'Filtrage par champ pour: '
        ),
  'wflow_relfilter_type_dom' =>
        array (
      'all' => 'Toute liaison au module',
      'any' => 'n\'importe quelle liaison au module'
        ),
      'dom_timezones_extra' => array(
                          '-12' => '(GMT - 12) International Date Line West',
                          '-11' => '(GMT - 11) Midway Island, Samoa',
                          '-10' => '(GMT - 10) Hawaii',
                          '-9' => '(GMT - 9) Alaska',
                          '-8' => '(GMT - 8) (PST)',
                          '-7' => '(GMT - 7) (MST)',
                          '-6' => '(GMT - 6) (CST)',
                          '-5' => '(GMT - 5) (EST)',
                          '-4' => '(GMT - 4) Santiago',
                          '-3' => '(GMT - 3) Buenos Aires',
                          '-2' => '(GMT - 2) Mid-Atlantic',
                          '-1' => '(GMT - 1) Azores',
                          '0' => '(GMT)',
                          '1' => '(GMT + 1) Paris',
                          '2' => '(GMT + 2) Athens',
                          '3' => '(GMT + 3) Moscow',
                          '4' => '(GMT + 4) Kabul',
                          '5' => '(GMT + 5) Ekaterinburg',
                          '6' => '(GMT + 6) Astana',
                          '7' => '(GMT + 7) Bangkok',
                          '8' => '(GMT + 8) Perth',
                          '9' => '(GMT + 9) Seol',
                          '10' => '(GMT + 10) Brisbane',
                          '11' => '(GMT + 11) Solomone Is.',
                          '12' => '(GMT + 12) Auckland'
                            ),

    'duration_intervals' => array('0'=>'00',
                                    '15'=>'15',
                                    '30'=>'30',
                                    '45'=>'45'),
        'wflow_fire_order_dom' => array(
                                'alerts_actions' => 'Alertes puis Actions',
                                'actions_alerts' => 'Actions puis Alertes'
      ),






  'prospect_list_type_dom' =>
  array (
      'default' => 'Defaut',
      'seed' => 'Seed',
      'exempt_domain' => 'Liste Suppression - Par Domaine',
      'exempt_address' => 'Liste Suppression - Par Email',
      'exempt' => 'Liste Suppression - Par ID',
      'test' => 'Test'
  ),

  'email_marketing_status_dom' =>
  array (
    '' => '',
    'active'=>'Actif',
    'inactive'=>'Inactif'
  ),

  'campainglog_activity_type_dom' =>
  array (
    ''=>'',
      'targeted' => 'Messages Envoyés/Tentés',
      'send error' => 'Bounces, Autre',
      'invalid email' => 'Bounces, Email Invalide',
      'link' => 'Liens Cliqués',
      'viewed' => 'Message Lus',
      'removed' => 'Demande de Opt Out',
      'lead' => 'Leads Créés',
      'contact' => 'Contacts Créés',
      'blocked'=>'Supprimés par adresse ou par domaine',
  ),

  'campainglog_target_type_dom' =>
  array (
      'Contacts' => 'Contacts',
      'Users' => 'Utilisateurs',
      'Prospects' => 'Suspects',
      'Leads' => 'Leads'
  ),



    
    'contract_status_dom' => array (
      'notstarted' => 'Non démarré',
      'inprogress' => 'En cours',
      'signed' => 'Signé'
    ),

    'contract_type_dom' => array (
      'type1' => 'Type de Contrat 1',
      'type2' => 'Type de Contrat 2',
      'type3' => 'Type de Contrat 3'
    ),

    'contract_payment_frequency_dom' => array (
        'monthly' => 'Mensuel',
        'quarterly' => 'Trimestriel',
        'halfyearly' => '6 Mois',
        'yearly' => 'Annuel',
    ),

    'contract_expiration_notice_dom' => array (
      '1' => '1 Jour',
      '14' => '2 Semaines',
      '21' => '3 Semaines',
      '3' => '3 Jours',
      '31' => '1 Mois',
      '5' => '5 Jours',
      '7' => '1 Semaine'
    ),


);

$app_strings = array (
    'LBL_LIST_TEAM' => 'Equipe',
    'LBL_TEAM' => 'Equipe:',
    'LBL_TEAM_ID' => 'Equipe:',
    'LBL_QUERY_VALID' => 'Valide',
    'LBL_QUERY_ERROR' => 'Erreur!',
    'LBL_QUERY_CHILD' => 'Sous requête valide',
    'LBL_CLOSE_BUTTON_TITLE' => 'Fermer',
    'LBL_CLOSE_BUTTON_KEY' => 'C',
    'LBL_CLOSE_BUTTON_LABEL' => 'Fermer',
    'ERROR_EXAMINE_MSG' => '  Veuillez consulter le message d\'erreur suivant:',
    'NO_QUERY_SELECTED' => 'Le format de données que vous avez sélectionné ne contient pas de requête. Veuillez sélectionner une requête personnalisée pour ce format de données.',
    'ERR_CREATING_FIELDS' => 'Erreur de saisie de champs: ',
    'ERR_CREATING_TABLE' => 'Erreur de création de la table: ',
    'ERR_DECIMAL_SEP_EQ_THOUSANDS_SEP'  => "Le séparateur des décimales ne peut pas être le même que celui des milliers.\\n\\n  Merci de modifier ces valeurs.",
    'ERR_DELETE_RECORD' => 'Un numéro d\'enregistrement doit être spécifié pour toute suppression.',
    'ERR_EXPORT_DISABLED' => 'Exports Désactivés.',
    'ERR_EXPORT_TYPE' => 'Erreur d\'exportation ',
    'ERR_INVALID_AMOUNT' => 'Merci de saisir un montant valide.',
    'ERR_INVALID_DATE_FORMAT' => 'Le format de la date doit être: aaaa-mm-jj',
    'ERR_INVALID_DATE' => 'Merci de saisir une date valide.',
    'ERR_INVALID_DAY' => 'Merci de saisir un jour valide.',
    'ERR_INVALID_EMAIL_ADDRESS' => 'Merci de saisir une adresse Email valide.',
    'ERR_INVALID_HOUR' => 'Merci de saisir une heure valide.',
    'ERR_INVALID_MONTH' => 'Merci de saisir un mois valide.',
    'ERR_INVALID_TIME' => 'Merci de saisir un horaire valide.',
    'ERR_INVALID_VALUE' => 'Valeur incorrecte:',
    'ERR_INVALID_YEAR' => 'Merci de saisir une année à  4 chiffres valide.',
    'ERR_NEED_ACTIVE_SESSION' => 'Une session active est nécessaire pour l\'exportation.',
    'ERR_NOT_ADMIN' => "Accès non autorisé à l\'administration.",
    'ERR_MISSING_REQUIRED_FIELDS' => 'Champ(s) obligatoire(s):',
    'ERR_INVALID_REQUIRED_FIELDS' => 'Champ(s) obligatoire(s) incorrect(s) :',
    'ERR_NOTHING_SELECTED' => 'Merci de sélectionner un élément pour continuer.',
    'ERR_NO_SINGLE_QUOTE' => 'Impossible d\'utiliser le simple guillemet pour ',
    'ERR_OPPORTUNITY_NAME_DUPE' => 'Une Affaire nommée %s existe déja. Veuillez entrer un autre nom.',
    'ERR_OPPORTUNITY_NAME_MISSING' => 'Aucune Affaire n\'a été précisée. Veuillez précisez une affaire ci-dessous.',
    'ERR_SELF_REPORTING' => 'Un utilisateur ne peut pas se reporter à lui-même.',
    'ERR_SQS_NO_MATCH_FIELD' => 'Pas de correspondance pour le champ: ',
    'ERR_SQS_NO_MATCH' => 'Pas de correspondance',
    'ERR_POTENTIAL_SEGFAULT' => 'Un problème potentiel de segmentation Apache a été détectée. Merci d\'avertir votre administrateur système de ce problème et de le rapporter auprès de SugarCRM.',
    'LBL_ACCOUNT' => 'Compte',
    'LBL_ACCOUNTS' => 'Comptes',
    'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
    'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Voir résumé',
    'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Voir résumé [Alt+H]',
    'LBL_ADD_BUTTON_KEY' => 'A',
    'LBL_ADD_BUTTON_TITLE' => 'Ajouter [Alt+A]',
    'LBL_ADD_BUTTON' => 'Ajouter',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Ajouter à la liste de Prospects',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Ajouter à la liste de Prospects',
    'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Cliquer pour Fermer',
    'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Fermer',
    'LBL_ADDITIONAL_DETAILS' => 'Details supplémentaires',
    'LBL_ADMIN' => 'Admin',
    'LBL_ALT_HOT_KEY' => 'Alt+',
    'LBL_ARCHIVE' => 'Archiver',
    'LBL_ASSIGNED_TO_USER' => 'Assigné à utilisateur',
    'LBL_ASSIGNED_TO' => 'Assigné à :',
    'LBL_BACK' => 'Retour',
    'LBL_BILL_TO_ACCOUNT' => 'Facturer le Compte',
    'LBL_BILL_TO_CONTACT' => 'Facturer le Contact',
    'LBL_BROWSER_TITLE' => 'SugarCRM',
    'LBL_BUGS' => 'Bugs',
    'LBL_BY' => 'par',
    'LBL_CALLS' => 'Appels',
    'LBL_CAMPAIGNS_SEND_QUEUED' => 'Envoyer les Campagnes Emails en queue',
    'LBL_CANCEL_BUTTON_KEY' => 'X',
    'LBL_CANCEL_BUTTON_LABEL' => 'Annuler',
    'LBL_CANCEL_BUTTON_TITLE' => 'Annuler [Alt+X]',
    'LBL_CASE' => 'Ticket',
    'LBL_CASES' => 'Tickets',
    'LBL_CHANGE_BUTTON_KEY' => 'G',
    'LBL_CHANGE_BUTTON_LABEL' => 'Sélectionner',
    'LBL_CHANGE_BUTTON_TITLE' => 'Modifier [Alt+G]',
    'LBL_CHARSET' => 'UTF-8',
    'LBL_CHECKALL' => 'Cocher tout',
    'LBL_CLEAR_BUTTON_KEY' => 'C',
    'LBL_CLEAR_BUTTON_LABEL' => 'Vider',
    'LBL_CLEAR_BUTTON_TITLE' => 'Vider [Alt+C]',
    'LBL_CLEARALL' => 'Tout décocher',
    'LBL_CLOSE_WINDOW' => 'Fermer la Fenetre',
    'LBL_CLOSEALL_BUTTON_KEY' => 'Q',
    'LBL_CLOSEALL_BUTTON_LABEL' => 'Fermer tous',
    'LBL_CLOSEALL_BUTTON_TITLE' => 'Fermer tous [Alt+I]',
    'LBL_CLOSE_AND_CREATE_BUTTON_LABEL' => 'Fermer et Créer un nouveau',
    'LBL_CLOSE_AND_CREATE_BUTTON_TITLE' => 'Fermer et Créer un nouveau [Alt+C]',
    'LBL_CLOSE_AND_CREATE_BUTTON_KEY' => 'C',
    'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
    'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'Envoyer un Email',
    'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'Envoyer un Email [Alt+E]',
    'LBL_CONTACT_LIST' => 'Liste des Contacts',
    'LBL_CONTACT' => 'Contact',
    'LBL_CONTACTS' => 'Contacts',
    'LBL_CREATE_BUTTON_LABEL' => 'Créer',
    'LBL_CREATED_BY_USER' => 'Créé par',
    'LBL_CREATED' => 'Créé par',
    'LBL_CURRENT_USER_FILTER' => 'Ne montrer que mes éléments:',
    'LBL_DATE_ENTERED' => 'Date de création:',
    'LBL_DATE_MODIFIED' => 'Date de modification:',
    'LBL_DELETE_BUTTON_KEY' => 'D',
    'LBL_DELETE_BUTTON_LABEL' => 'Supprimer',
    'LBL_DELETE_BUTTON_TITLE' => 'Supprimer [Alt+D]',
    'LBL_DELETE_BUTTON' => 'Supprimer',
    'LBL_DELETE' => 'Supprimer',
    'LBL_DELETED' => 'Supprimé',
    'LBL_DIRECT_REPORTS' => 'Rapports directs',
    'LBL_DONE_BUTTON_KEY' => 'X',
    'LBL_DONE_BUTTON_LABEL' => 'Terminé',
    'LBL_DONE_BUTTON_TITLE' => 'Terminé [Alt+X]',
    'LBL_DST_NEEDS_FIXIN' => 'Pour le bon fonctionnement de l\'application il est nécessaire qu\'un patch sur l\'heure d\'été soit intégré. SVP allez dans le module <a href="index.php?module=Administration&action=DstFix">Repair</a> dans la console d\'administration et cliquez sur le fix pour l\'heure d\'été.',
    'LBL_DUPLICATE_BUTTON_KEY' => 'U',
    'LBL_DUPLICATE_BUTTON_LABEL' => 'Dupliquer',
    'LBL_DUPLICATE_BUTTON_TITLE' => 'Dupliquer [Alt+U]',
    'LBL_DUPLICATE_BUTTON' => 'Dupliquer',
    'LBL_EDIT_BUTTON_KEY' => 'E',
    'LBL_EDIT_BUTTON_LABEL' => 'Editer',
    'LBL_EDIT_BUTTON_TITLE' => 'Editer [Alt+E]',
    'LBL_EDIT_BUTTON' => 'Editer',
    'LBL_VIEW_BUTTON_KEY' => 'V',
    'LBL_VIEW_BUTTON_LABEL' => 'Afficher',
    'LBL_VIEW_BUTTON' => 'Afficher',
    'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
    'LBL_EMAIL_PDF_BUTTON_LABEL' => 'Email en PDF',
    'LBL_EMAIL_PDF_BUTTON_TITLE' => 'Email en PDF [Alt+M]',
    'LBL_EMAILS' => 'Emails',
    'LBL_EMPLOYEES' => 'Employés',
    'LBL_ENTER_DATE' => 'Préciser la date',
    'LBL_EXPORT_ALL' => 'Exporter Tout',
    'LBL_EXPORT' => 'Export',
    'LBL_HIDE' => 'Cacher',
    'LBL_ID' => 'ID',
    'LBL_IMPORT_PROSPECTS' => 'Importer Suspects',
    'LBL_IMPORT' => 'Import',
    'LBL_LAST_VIEWED' => 'Dernières consultations',
    'LBL_LEADS' => 'Leads',
    'LBL_CAMPAIGN' => 'Campagne:',
    'LBL_CAMPAIGN_ID'=>'campaign_id',
    'LBL_LIST_ACCOUNT_NAME' => 'Nom Compte',
    'LBL_LIST_ASSIGNED_USER' => 'Assigné à  ',
    'LBL_LIST_CONTACT_NAME' => 'Nom Contact',
    'LBL_LIST_CONTACT_ROLE' => 'Rôle Contact',
    'LBL_LIST_EMAIL' => 'Email',
    'LBL_LIST_NAME' => 'Nom',
    'LBL_LIST_OF' => 'sur',
    'LBL_LIST_PHONE' => 'Téléphone',
    'LBL_LIST_USER_NAME' => 'Nom Utilisateur',
    'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'Alexandre',
    'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Durand',
    'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Mr.',
    'LBL_LOGOUT' => 'Déconnexion',
    'LBL_MAILMERGE_KEY' => 'M',
    'LBL_MAILMERGE' => 'Publipostage',
    'LBL_MASS_UPDATE' => 'Mise à jour globale',
    'LBL_MEETINGS' => 'Réunions',
    'LBL_MEMBERS' => 'Membres',
    'LBL_MODIFIED_BY_USER' => 'Modifié par l\'utilisateur',
    'LBL_MODIFIED' => 'Modifié par',
    'LBL_MY_ACCOUNT' => 'Mon Compte',
    'LBL_NAME' => 'Nom',
    'LBL_NEW_BUTTON_KEY' => 'N',
    'LBL_NEW_BUTTON_LABEL' => 'Créer',
    'LBL_NEW_BUTTON_TITLE' => 'Nouveau [Alt+N]',
    'LBL_NEXT_BUTTON_LABEL' => 'Suivant',
    'LBL_NONE' => '--Aucun(e)--',
    'LBL_NOTES' => 'Notes',

    'LBL_OC_STATUS' => 'Statut du Client Offline',
    'LBL_OC_STATUS_TEXT' => 'Indique si l\'utilisateur courant peut ou pas utiliser un Client Offline.',
    'LBL_OC_DEFAULT_STATUS' => 'Inactif',

    'LBL_OPENALL_BUTTON_KEY' => 'O',
    'LBL_OPENALL_BUTTON_LABEL' => 'Ouvrir tous',
    'LBL_OPENALL_BUTTON_TITLE' => 'Ouvrir tous [Alt+O]',
    'LBL_OPENTO_BUTTON_KEY' => 'T',
    'LBL_OPENTO_BUTTON_LABEL' => 'Ouvrir à: ',
    'LBL_OPENTO_BUTTON_TITLE' => 'Ouvrir à: [Alt+T]',
    'LBL_OPPORTUNITIES' => 'Affaires',
    'LBL_OPPORTUNITY_NAME' => 'Nom Affaire',
    'LBL_OPPORTUNITY' => 'Affaires',
    'LBL_OR' => 'OR',
    'LBL_PERCENTAGE_SYMBOL' => '%',
    'LBL_PRODUCT_BUNDLES' => 'Groupes de produits',
    'LBL_PRODUCTS' => 'Produits',
    'LBL_PROJECT_TASKS' => 'Tâches Projet',
    'LBL_PROJECTS' => 'Projets',
    'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
    'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Créer une Affaire à partir du devis',
    'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Créer une Affaire à partir du devis [Alt+O]',
    'LBL_QUOTES_SHIP_TO' => 'Devis livré à',
    'LBL_QUOTES' => 'Devis',
    'LBL_RELATED_RECORDS' => 'Enregistrements rattachés',
    'LBL_REMOVE' => 'Supprimer',
    'LBL_REQUIRED_SYMBOL' => '*',
    'LBL_SAVE_BUTTON_KEY' => 'S',
    'LBL_SAVE_BUTTON_LABEL' => 'Sauvegarder',
    'LBL_SAVE_BUTTON_TITLE' => 'Sauvegarder [Alt+S]',
    'LBL_SAVE_AS_BUTTON_KEY' => 'A',
    'LBL_SAVE_AS_BUTTON_LABEL' => 'Sauvegarder sous',
    'LBL_SAVE_AS_BUTTON_TITLE' => 'Sauvegarder sous [Alt+A]',
    'LBL_FULL_FORM_BUTTON_KEY' => 'F',
    'LBL_FULL_FORM_BUTTON_LABEL' => 'Vue Complète',
    'LBL_FULL_FORM_BUTTON_TITLE' => 'Vue Complète [Alt+F]',
    'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
    'LBL_SAVE_NEW_BUTTON_LABEL' => 'Enregistrer et créer un nouveau',
    'LBL_SAVE_NEW_BUTTON_TITLE' => 'Enregistrer et créer un nouveau [Alt+V]',
    'LBL_SEARCH_BUTTON_KEY' => 'Q',
    'LBL_SEARCH_BUTTON_LABEL' => 'Rechercher',
    'LBL_SEARCH_BUTTON_TITLE' => 'Rechercher [Alt+Q]',
    'LBL_SEARCH' => 'Rechercher',
    'LBL_SELECT_BUTTON_KEY' => 'T',
    'LBL_SELECT_BUTTON_LABEL' => 'Sélectionner',
    'LBL_SELECT_BUTTON_TITLE' => 'Sélectionner [Alt+T]',
    'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
    'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'Sélectionner Contact',
    'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'Sélectionner Contact [Alt+T]',
    'LBL_GRID_SELECTED_FILE' => 'fichier sélectionné',
    'LBL_GRID_SELECTED_FILES' => 'fichiers sélectionnés',
    'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Sélectionner depuis un Rapport',
    'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Sélectionner Rapports',
    'LBL_SELECT_USER_BUTTON_KEY' => 'U',
    'LBL_SELECT_USER_BUTTON_LABEL' => 'Sélectionner Utilisateur',
    'LBL_SELECT_USER_BUTTON_TITLE' => 'Sélectionner Utilisateur [Alt+U]',
    'LBL_SERVER_RESPONSE_RESOURCES' => 'Ressources utilisées pour construire cette page (requêtes, fichiers)',
    'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'secondes.',
    'LBL_SERVER_RESPONSE_TIME' => 'Temps de réponse du serveur:',
    'LBL_SHIP_TO_ACCOUNT' => 'Livrer le Compte',
    'LBL_SHIP_TO_CONTACT' => 'Livrer le Contact',
    'LBL_SHORTCUTS' => 'Raccourcis',
    'LBL_SHOW' => 'Afficher',
    'LBL_SQS_INDICATOR' => '',
    'LBL_STATUS_UPDATED' => 'Votre statut pour cet evenement a ete mis a jour!',
    'LBL_STATUS' => 'Statut:',
    'LBL_SUBJECT' => 'Sujet',
    'LBL_SYNC' => 'Sync',
    'LBL_TABGROUP_ALL' => 'Tous',
    'LBL_TABGROUP_ACTIVITIES' => 'Activités',
    'LBL_TABGROUP_COLLABORATION' => 'Collaboration',
    'LBL_TABGROUP_HOME' => 'Accueil',
    'LBL_TABGROUP_MARKETING' => 'Marketing',
    'LBL_TABGROUP_MY_PORTALS' => 'Mes Portails',
    'LBL_TABGROUP_OTHER' => 'Autre',
    'LBL_TABGROUP_REPORTS' => 'Rapports',
    'LBL_TABGROUP_SALES' => 'Ventes',
    'LBL_TABGROUP_SUPPORT' => 'Support',
    'LBL_TABGROUP_TOOLS' => 'Outils',
    'LBL_TASKS' => 'Tâches',
    'LBL_TEAMS_LINK' => 'Equipe',
    'LBL_THOUSANDS_SYMBOL' => 'K',
    'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
    'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archiver Email',
    'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archiver Email [Alt+K]',
    'LBL_UNAUTH_ADMIN' => 'Accés non autorisé à l\'administration',
    'LBL_UNDELETE_BUTTON_LABEL' => 'Restaurer',
    'LBL_UNDELETE_BUTTON_TITLE' => 'Restaurer [Alt+D]',
    'LBL_UNDELETE_BUTTON' => 'Restaurer',
    'LBL_UNDELETE' => 'Restaurer',
    'LBL_UNSYNC' => 'Unsync',
    'LBL_UPDATE' => 'Enregistrer',
    'LBL_USER_LIST' => 'Liste des Utilisateurs',
    'LBL_USERS_SYNC' => 'Synchro utilisateur',
    'LBL_USERS' => 'Utilisateurs',
    'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
    'LBL_VIEW_PDF_BUTTON_LABEL' => 'Voir en PDF',
    'LBL_VIEW_PDF_BUTTON_TITLE' => 'Imprimer en PDF [Alt+P]',
    'LNK_ABOUT' => 'A propos',
    'LNK_ADVANCED_SEARCH' => 'Recherche Avancée',
    'LNK_BASIC_SEARCH' => 'Recherche Rapide',
    'LNK_SAVED_VIEWS' => 'Options',
    'LNK_DELETE_ALL' => 'eff tous',
    'LNK_DELETE' => 'eff',
    'LNK_EDIT' => 'editer',
    'LNK_EDIT_ROLE' => 'editer le rôole',
    'LNK_HELP' => 'Aide',
    'LNK_LIST_END' => 'Fin',
    'LNK_LIST_NEXT' => 'Suivant',
    'LNK_LIST_PREVIOUS' => 'Précédent',
    'LNK_LIST_RETURN' => 'Retour à la Liste',
    'LNK_LIST_START' => 'Début',
    'LNK_PRINT' => 'Imprimer',
    'LNK_REMOVE' => 'sup',
    'LNK_RESUME' => 'Reprise',
    'LNK_VIEW_CHANGE_LOG' => 'Historique des modifications',
    'NTC_CLICK_BACK' => 'Merci de cliquer sur le bouton précédent du navigateur et de corriger le problème.',
    'NTC_DATE_FORMAT' => '(aaaa-mm-jj)',
    'NTC_DATE_TIME_FORMAT' => '(aaaa-mm-jj 24:00)',
    'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Etes-vous sûr(e) de vouloir supprimer les enregistrements sélectionnés ?',
    'NTC_DELETE_CONFIRMATION' => 'Etes vous sûr de vouloir supprimer cet enregistrement ?',
    'NTC_LOGIN_MESSAGE' => 'Merci de vous authentifier.',
    'NTC_NO_ITEMS_DISPLAY' => 'Aucun',
    'NTC_REMOVE_CONFIRMATION' => 'Etes vous sûr de vouloir supprimer cette relation?',
    'NTC_REQUIRED' => 'Indique les champs requis',
    'NTC_SUPPORT_SUGARCRM' => 'Supportez le projet open source SugarCRM en faisant un don par PayPal - C\'est rapide, gratuit et sécurisé !',
    'NTC_TIME_FORMAT' => '(24:00)',
    'NTC_WELCOME' => 'Bienvenue',
    'NTC_YEAR_FORMAT' => '(aaaa)',
    'ERROR_FULLY_EXPIRED' => 'Votre licence pour SugarCRM a expiré depuis plus de 30 jours, une mise à jour est nécessaire. Seul les administrateurs peuvent se connecter.',
    'ERROR_LICENSE_EXPIRED' => 'Votre licence SugarCRM a besoin d\'être mise à jour. Seules les administrateurs peuvent se connecter.',
    'LBL_ADD_DOCUMENT' => 'Ajouter un Document',
    'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Etes-vous sûr(e) de vouloir mettre à jour la totalité de la liste ?',
    'LBL_LISTVIEW_NO_SELECTED' => 'Merci de sélectionner au moins 1 enregistrement pour lancer le traitement.',
    'LBL_LISTVIEW_TWO_REQUIRED' => 'Merci de selectionner au moins 2 enregistrement pour lancer le traitement.',
    'LBL_LISTVIEW_OPTION_CURRENT' => 'Page courrante',
    'LBL_LISTVIEW_OPTION_ENTIRE' => 'Liste Complète',
    'LBL_LISTVIEW_OPTION_SELECTED' => 'Enregistrements Sélectionnés',
    'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Sélectionné(s): ',
    'LBL_VIEW_BUTTON_TITLE' => 'Voir [Alt+V]',
    'LNK_GET_LATEST' => 'Obtenir le dernier',
    'LNK_GET_LATEST_TOOLTIP' => 'Remplacer par la dernière version',
    'LNK_LOAD_SIGNED' => 'Signé',
    'LNK_LOAD_SIGNED_TOOLTIP' => 'Remplacer par le document signé',
    'LOGIN_LOGO_ERROR' => 'Merci de remplacer les logos SugarCRM.',
    'LBL_MERGE_DUPLICATES'  => 'Fusionner les enregistrements',

    'ERROR_LICENSE_VALIDATION'=> "Votre licence entreprise pour SugarCRM doit être validée. Seuls les administrateurs peuvent se connecter",
    'ERROR_NO_RECORD' => 'Erreur de récupération de l\'enregistrement.  Cet enregistrement est peut être supprimé ou vous n\'avez pas le droit de le visualiser.',
    'LBL_DUP_MERGE'=>'Recherche de doublons',
    'LBL_MANAGE_SUBSCRIPTIONS'=>'Gérer les Abonnements',
    'LBL_MANAGE_SUBSCRIPTIONS_FOR'=>'Gestion des Abonnements pour ',
    'LBL_SUBSCRIBE'=>'Souscrire',
    'LBL_UNSUBSCRIBE'=>'Désabonner',
        'LBL_LOADING' => 'chargement ...',
    'LBL_SAVING_LAYOUT' => 'Sauvegarde de la Vue ...',
    'LBL_SAVED_LAYOUT' => 'La Vue a été sauvegardée.',
    'LBL_SAVED' => 'Sauvegardé',
    'LBL_SAVING' => 'Sauvegarde',
    'LBL_DISPLAY_COLUMNS' => 'Afficher les Colonnes',
    'LBL_HIDE_COLUMNS' => 'Masquer les Colonnes',
    'LBL_SEARCH_CRITERIA' => 'Critères de Recherche',
    'LBL_SAVED_VIEWS' => 'Vues sauvegardées',

    'ERR_INVALID_FILE_REFERENCE' => 'Référence Fichier Invalide',
    'ERR_NO_SUCH_FILE' =>'Le fichier n\'existe pas sur le système',
    'ERR_NO_SINGLE_QUOTE' => 'Impossible d\'utiliser le simple guillemet pour ',
    'ERR_POTENTIAL_SEGFAULT' => 'Un problème de segmentation sur votre apache a probablement été détecté.  Veuillez contacter votre administrateur SugarCRM pour vérifier ce problème et lui demander si nécessaire de contacter directement votre support.',
    'ERR_SINGLE_QUOTE'  => 'Utiliser la simple quote n\'est pas permis pour ce champ. Merci de changer la valeur.',
    'LBL_CLOSE_AND_CREATE_BUTTON_LABEL' => 'Terminer l\'activité et dupliquer',
    'LBL_CLOSE_AND_CREATE_BUTTON_TITLE' => 'Terminer l\'activité et dupliquer [Alt+C]',
    'LBL_CLOSE_AND_CREATE_BUTTON_KEY' => 'C',
    'LBL_GO_BUTTON_LABEL' => 'Go',
    'LBL_IMPORT_STARTED' => 'Importation démarrée: ',
    'LBL_MISSING_CUSTOM_DELIMITER' => 'Spécifier un délimiteur personnalisé.',
    'LBL_LISTVIEW_TWO_REQUIRED' => 'Merci de selectionner au moins 2 enregistrements pour démarrer.',
    'LBL_FAILED' => 'Echec !',
    'LBL_PROCESSING_REQUEST'=>'Traitement..',
    'LBL_REQUEST_PROCESSED'=>'Effectué',
    'LBL_SAVED_SEARCH_SHORTCUT' => 'Recherches sauvegardées',
    'LBL_SEARCH_POPULATE_ONLY'=> 'Utilisez le formulaire ci-dessus afin d&#39;effectuer une recherche',
    'LBL_DETAILVIEW'=>'Vue Détail',
    'LBL_LISTVIEW'=>'Vue Liste',
    'LBL_EDITVIEW'=>'Vue Edition',
    'LBL_SEARCHFORM'=>'Formulaire de recherche',
    'LBL_SAVED_SEARCH_ERROR' => 'Merci de fournir un nom pour cette vue.',

    'LBL_DISPLAY_LOG' => 'Afficher les Logs',
    'ERROR_JS_ALERT_SYSTEM_CLASS' => 'Système',
    'ERROR_JS_ALERT_TIMEOUT_TITLE' => 'Session Expirée',
    'ERROR_JS_ALERT_TIMEOUT_MSG_1' => 'Votre session va expirer dans 2 minutes. Merci de sauvegarder votre travail.',
    'ERROR_JS_ALERT_TIMEOUT_MSG_2' =>'Votre session a expiré.',
    'MSG_JS_ALERT_MTG_REMINDER_AGENDA' => "\nAgenda: ",
    'MSG_JS_ALERT_MTG_REMINDER_MEETING' => 'Réunion',
    'MSG_JS_ALERT_MTG_REMINDER_CALL' => 'Appel',
    'MSG_JS_ALERT_MTG_REMINDER_TIME' => 'Heure: ',
    'MSG_JS_ALERT_MTG_REMINDER_LOC' => 'Emplacement: ',
    'MSG_JS_ALERT_MTG_REMINDER_DESC' => 'Description: ',
    'MSG_JS_ALERT_MTG_REMINDER_MSG' => "\nCliquez sur OK pour voir cette réunion ou cliquez sur Cancel pour ignorer ce message.",

        'LBL_ADD_TO_FAVORITES' => 'Ajouter à mes Favoris',
    'LBL_CREATE_CONTACT' => 'Créer un Contact',
    'LBL_CREATE_CASE' => 'Créer un Ticket',
    'LBL_CREATE_NOTE' => 'Créer une Note',
    'LBL_CREATE_OPPORTUNITY' => 'Créer une Affaire',
    'LBL_SCHEDULE_CALL' => 'Planifier un Appel',
    'LBL_SCHEDULE_MEETING' => 'Planifier une Réunion',
    'LBL_CREATE_TASK' => 'Créer une Tache',
    'LBL_REMOVE_FROM_FAVORITES' => 'Supprimer de mes Favoris',
        'LBL_GENERATE_WEB_TO_LEAD_FORM' => 'Générer le Formulaire',
    'LBL_SAVE_WEB_TO_LEAD_FORM' =>'Sauvegarder le Formulaire Web de Lead',

    'LBL_PLEASE_SELECT' => 'Sélectionner',
    'LBL_REDIRECT_URL'=>'URL de redirection',
    'LBL_RELATED_CAMPAIGN' =>'Campagne liée',
    'LBL_ADD_ALL_LEAD_FIELDS' => 'Ajouter tous les champs',
    'LBL_REMOVE_ALL_LEAD_FIELDS' => 'Supprimer tous les champs',
    'LBL_ONLY_IMAGE_ATTACHMENT' => 'Seuls les fichiers de type image peuvent être jointes',
    'LBL_TRAINING' => 'Formation',
    'ERR_DATABASE_CONN_DROPPED'=>'Erreur durant l\'execution d\une requête. Il est possible que votre connection à la base de données ait été reinitialisée. Merci de rafraichir cette page, vous devrez peut-être redémarrer le serveur web.',
    'ERR_MSSQL_DB_CONTEXT' =>'modification du contexte de la base de données en',
    'ERR_PORTAL_LOGIN_FAILED' => 'Impossible de se connecter au portail. Veuillez contacter votre administrateur.',
    'ERR_RESOURCE_MANAGEMENT_INFO' => 'Revenir à la <a href="index.php">Page d&#39;accueil</a>',
    'LBL_NO_RECORDS_FOUND' => '- 0 Enregistrement trouvé -',
    'LBL_LOGIN_SESSION_EXCEEDED' => 'Serveur en surcharge. Merci de Ré-essayez ultérieurement.',
    'LBL_CHANGE_PASSWORD' => 'Changer le mot de passe',
    'LBL_LOGIN_TO_ACCESS' => 'Vous devez être authentifié pour acceder à cette page.'
    );

?>
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


	
$mod_strings = array (
  'LBL_UTILS' => 'Utils',
  'LBL_EMAIL_OPT_OUT' => 'Önskar ej utskick:',
  'LBL_INVALID_EMAIL' => 'Ogiltig epostadress:',
  'LNK_IMPORT_ACCOUNTS' => 'Importera konton',
  'LBL_ASSIGNED_USER_NAME' => 'Tilldelad till:',
  'LBL_PROSPECT_LIST' => 'Prospektlista',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Konton',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projekt',
  'LBL_FAX' => 'Fax:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_TICKER_SYMBOL' => 'Ticker Symbol:',
  'LBL_CONTRACTS' => 'Kontrakt',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakt',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produkter',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Offerter',
  'LNK_ACCOUNT_REPORTS' => 'Organisationsrapporter',
  'LBL_CHARTS' => 'Diagram',
  'LBL_DEFAULT' => 'Vyer',
  'LBL_MISC' => 'Div',
  'ACCOUNT_REMOVE_PROJECT_CONFIRM' => 'Är du säker på att du vill ta bort den här organisationen från projektet?',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att kunna radera organisationen.',
  'LBL_ACCOUNT_INFORMATION' => 'information om organisationen',
  'LBL_ACCOUNT_NAME' => 'Organisationsnamn:',
  'LBL_ACCOUNT' => 'Organisation',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteter',
  'LBL_ADDRESS_INFORMATION' => 'Adressinformation',
  'LBL_ANNUAL_REVENUE' => 'Årsredovisning:',
  'LBL_ANY_ADDRESS' => 'Någon adress:',
  'LBL_ANY_EMAIL' => 'Någon e-post:',
  'LBL_ANY_PHONE' => 'Någon telefon:',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till:',
  'LBL_ASSIGNED_TO_ID' => 'Tilldelad användare:',
  'LBL_BILLING_ADDRESS_CITY' => 'Faktureringsadress stad:',
  'LBL_BILLING_ADDRESS_COUNTRY' => 'Faktureringadress land:',
  'LBL_BILLING_ADDRESS_POSTALCODE' => 'Faktureringadress postnummer:',
  'LBL_BILLING_ADDRESS_STATE' => 'Faktureringsadress stat:',
  'LBL_BILLING_ADDRESS_STREET_2' => 'Faktureringsadress gata 2',
  'LBL_BILLING_ADDRESS_STREET_3' => 'Faktureringsadress gata 3',
  'LBL_BILLING_ADDRESS_STREET_4' => 'Faktureringsadress gata 4',
  'LBL_BILLING_ADDRESS_STREET' => 'Faktureringsadress gata:',
  'LBL_BILLING_ADDRESS' => 'Faktureringsadress:',
  'LBL_BUG_FORM_TITLE' => 'Organisationer',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Buggar',
  'LBL_CALLS_SUBPANEL_TITLE' => 'Telefonsamtal',
  'LBL_CAMPAIGN_ID' => 'Kampanj ID',
  'LBL_CASES_SUBPANEL_TITLE' => 'Ärenden',
  'LBL_CITY' => 'Stad:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_COUNTRY' => 'Land:',
  'LBL_DATE_ENTERED' => 'Skapat datum:',
  'LBL_DATE_MODIFIED' => 'Redigerings datum',
  'LBL_MODIFIED_ID' => 'Redigerad av Id',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Organisationer',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivande information',
  'LBL_DESCRIPTION' => 'Beskrivning',
  'LBL_DUPLICATE' => 'Möjlig kopia av organisationen',
  'LBL_EMAIL' => 'Epost:',
  'LBL_EMPLOYEES' => 'Anställda:',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historik',
  'LBL_HOMEPAGE_TITLE' => 'Mina organisationer',
  'LBL_INDUSTRY' => 'Bransch:',
  'LBL_INVITEE' => 'Kontakter',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisationsnamn',
  'LBL_LIST_CITY' => 'Stad',
  'LBL_LIST_CONTACT_NAME' => 'Kontaktnamn',
  'LBL_LIST_EMAIL_ADDRESS' => 'Epostadress',
  'LBL_LIST_FORM_TITLE' => 'Lista organisationer',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_STATE' => 'Stat',
  'LBL_LIST_WEBSITE' => 'Webbsida',
  'LBL_MEETINGS_SUBPANEL_TITLE' => 'Möten',
  'LBL_MEMBER_OF' => 'Medlem av:',
  'LBL_MEMBER_ORG_FORM_TITLE' => 'Medlemsorganisationer',
  'LBL_MEMBER_ORG_SUBPANEL_TITLE' => 'Medlemsorganisationer',
  'LBL_MODULE_NAME' => 'Organisationer',
  'LBL_MODULE_TITLE' => 'Organisationer:Hem',
  'LBL_MODULE_ID' => 'Organisationer',
  'LBL_NAME' => 'Namn:',
  'LBL_NEW_FORM_TITLE' => 'Ny organisation',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Affärsmöjligheter',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Annan epost:',
  'LBL_OTHER_PHONE' => 'Annan telefon:',
  'LBL_OWNERSHIP' => 'Ägandeskap:',
  'LBL_PARENT_ACCOUNT_ID' => 'Förälderorganisations ID',
  'LBL_PHONE_ALT' => 'Alternativ telefon:',
  'LBL_PHONE_FAX' => 'Telefon fax:',
  'LBL_PHONE_OFFICE' => 'Telefon kontor:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_POSTAL_CODE' => 'Postnummer:',
  'LBL_PRODUCTS_TITLE' => 'Produkter',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekt',
  'LBL_PUSH_BILLING' => 'Fakturera',
  'LBL_PUSH_CONTACTS_BUTTON_LABEL' => 'Kopiera till kontakter',
  'LBL_PUSH_CONTACTS_BUTTON_TITLE' => 'Kopiera...',
  'LBL_PUSH_SHIPPING' => 'Leverera',
  'LBL_RATING' => 'Prioritet',
  'LBL_SAVE_ACCOUNT' => 'Spara organisation',
  'LBL_SEARCH_FORM_TITLE' => 'Sök organisation',
  'LBL_SHIPPING_ADDRESS_CITY' => 'Leveransadress stad:',
  'LBL_SHIPPING_ADDRESS_COUNTRY' => 'Leveransadress land:',
  'LBL_SHIPPING_ADDRESS_POSTALCODE' => 'Leveransadress postnummer:',
  'LBL_SHIPPING_ADDRESS_STATE' => 'Leveransadress stat:',
  'LBL_SHIPPING_ADDRESS_STREET_2' => 'Leveransadress gata 2',
  'LBL_SHIPPING_ADDRESS_STREET_3' => 'Leveransadress gata 3',
  'LBL_SHIPPING_ADDRESS_STREET_4' => 'Leveransadress gata 4',
  'LBL_SHIPPING_ADDRESS_STREET' => 'Leveransadress gata:',
  'LBL_SHIPPING_ADDRESS' => 'Leveransadress:',
  'LBL_SIC_CODE' => 'SIC kod',
  'LBL_STATE' => 'Stat:',
  'LBL_TASKS_SUBPANEL_TITLE' => 'Uppgifter',
  'LBL_TEAMS_LINK' => 'Team',
  'LBL_TYPE' => 'Typ:',
  'LBL_USERS_ASSIGNED_LINK' => 'Tilldelade användare',
  'LBL_USERS_CREATED_LINK' => 'Skapad av användare',
  'LBL_USERS_MODIFIED_LINK' => 'Redigerade användare',
  'LBL_VIEW_FORM_TITLE' => 'Organisations vy',
  'LBL_WEBSITE' => 'Webbsida',
  'LBL_CREATED_ID' => 'Skapad av Id',
  'LBL_CAMPAIGNS' => 'Kampanjer',
  'LNK_ACCOUNT_LIST' => 'Organisationer',
  'LNK_NEW_ACCOUNT' => 'Skapa organistaion',
  'MSG_DUPLICATE' => 'Organisationen du är på väg att skapa kan vara en kopia av en befintlig organisation. Organisationer som innehåller liknande namn är listade nedan.<br>Välj Spara för att fortsätta skapa den nya organisationen eller välj Avbryt för att återgå till modulen utan att skapa organisationen.',
  'MSG_SHOW_DUPLICATES' => 'Organisationen du är på väg att skapa kan vara en kopia av en befintlig organisation. Organisationer som innehåller liknande namn är listade nedan.<br>Välj Spara för att fortsätta skapa den nya organisationen eller välj Avbryt för att återgå till modulen utan att skapa organisationen.',
  'NTC_COPY_BILLING_ADDRESS' => 'Kopiera faktureringsadress till leveransadress',
  'NTC_COPY_BILLING_ADDRESS2' => 'Kopiera till leverans',
  'NTC_COPY_SHIPPING_ADDRESS' => 'Kopiera leveransadress till faktureringsadress',
  'NTC_COPY_SHIPPING_ADDRESS2' => 'Kopiera till fakturering',
  'NTC_DELETE_CONFIRMATION' => 'Är du säker på att du vill radera posten?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Är du säker på att du vill ta bort posten?',
  'NTC_REMOVE_MEMBER_ORG_CONFIRMATION' => 'Är du säker på att du vill ta bort posten från medlemsorganisationen?',
);


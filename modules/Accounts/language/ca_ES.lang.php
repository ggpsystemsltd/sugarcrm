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

	

$mod_strings = array (
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documents',
  'LBL_EMAIL_ADDRESSES' => 'Direccions de Correu',
  'LNK_IMPORT_ACCOUNTS' => 'Importar comptes',
  'LBL_COPY' => 'Copiar',
  'LBL_ACCOUNT_TYPE' => 'Tipus de comptes',
  'LBL_PARENT_ID' => 'ID Pare',
  'LBL_PHONE_ALTERNATE' => 'Altre telèfon',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nom d&#39;usuari assignat',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Els correus electrònics de contactes relacionats',
  'LBL_FAX' => 'Fax:',
  'LBL_RATING' => 'Rating:',
  'LBL_CONTRACTS' => 'Contractes',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contractes',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Productes',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Pressuposts',
  'LNK_ACCOUNT_REPORTS' => 'Informes de Comptes',
  'LBL_CHARTS' => 'Gràfics',
  'LBL_DEFAULT' => 'Vistes',
  'LBL_MISC' => 'Altres',
  'LBL_UTILS' => 'Utilitats',
  'ACCOUNT_REMOVE_PROJECT_CONFIRM' => 'Està segur que desitja treure aquest compte del projecte?',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre per eliminar el compte.',
  'LBL_ACCOUNT_INFORMATION' => 'Informació del Compte',
  'LBL_ACCOUNT_NAME' => 'Nom:',
  'LBL_ACCOUNT' => 'Compte:',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activitats',
  'LBL_ADDRESS_INFORMATION' => 'Direccions',
  'LBL_ANNUAL_REVENUE' => 'Compte Bancari:',
  'LBL_ANY_ADDRESS' => 'Qualsevol direcció:',
  'LBL_ANY_EMAIL' => 'Qualsevol correu:',
  'LBL_ANY_PHONE' => 'Qualsevol telèfon:',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a:',
  'LBL_ASSIGNED_TO_ID' => 'Usuari Assignat:',
  'LBL_BILLING_ADDRESS_CITY' => 'Ciutat de cobrament:',
  'LBL_BILLING_ADDRESS_COUNTRY' => 'País de cobrament:',
  'LBL_BILLING_ADDRESS_POSTALCODE' => 'CP de cobrament:',
  'LBL_BILLING_ADDRESS_STATE' => 'Estat/Província de cobrament:',
  'LBL_BILLING_ADDRESS_STREET_2' => 'Carrer de cobrament 2',
  'LBL_BILLING_ADDRESS_STREET_3' => 'Carrer de cobrament 3',
  'LBL_BILLING_ADDRESS_STREET_4' => 'Carrer de cobrament 4',
  'LBL_BILLING_ADDRESS_STREET' => 'Carrer de cobrament:',
  'LBL_BILLING_ADDRESS' => 'Direcció de cobrament:',
  'LBL_BUG_FORM_TITLE' => 'Comptes',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Incidències',
  'LBL_CALLS_SUBPANEL_TITLE' => 'Trucades',
  'LBL_CAMPAIGN_ID' => 'ID Campanya',
  'LBL_CASES_SUBPANEL_TITLE' => 'Casos',
  'LBL_CITY' => 'Ciutat:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactes',
  'LBL_COUNTRY' => 'País:',
  'LBL_DATE_ENTERED' => 'Creat:',
  'LBL_DATE_MODIFIED' => 'Modificat:',
  'LBL_MODIFIED_ID' => 'Modificat Per Id:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Comptes',
  'LBL_DESCRIPTION_INFORMATION' => 'Informació addicional',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_DUPLICATE' => 'Possible compte duplicat',
  'LBL_EMAIL' => 'Correu:',
  'LBL_EMAIL_OPT_OUT' => 'Refusar Correu:',
  'LBL_EMPLOYEES' => 'Empleats:',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Històrial',
  'LBL_HOMEPAGE_TITLE' => 'Els Meus Comptes',
  'LBL_INDUSTRY' => 'Industria:',
  'LBL_INVALID_EMAIL' => 'Correu no vàlid:',
  'LBL_INVITEE' => 'Contactes',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Clients Potencials',
  'LBL_LIST_ACCOUNT_NAME' => 'Nom',
  'LBL_LIST_CITY' => 'Ciutat',
  'LBL_LIST_CONTACT_NAME' => 'Contacte',
  'LBL_LIST_EMAIL_ADDRESS' => 'Correu',
  'LBL_LIST_FORM_TITLE' => 'Llista de Comptes',
  'LBL_LIST_PHONE' => 'Telèfon',
  'LBL_LIST_STATE' => 'Estat/Província',
  'LBL_LIST_WEBSITE' => 'Lloc Web',
  'LBL_MEETINGS_SUBPANEL_TITLE' => 'Reunions',
  'LBL_MEMBER_OF' => 'Membre de:',
  'LBL_MEMBER_ORG_FORM_TITLE' => 'Organitzacions Membre',
  'LBL_MEMBER_ORG_SUBPANEL_TITLE' => 'Organitzacions Membre',
  'LBL_MODULE_NAME' => 'Comptes',
  'LBL_MODULE_TITLE' => 'Comptes: Inici',
  'LBL_MODULE_ID' => 'Comptes',
  'LBL_NAME' => 'Nom:',
  'LBL_NEW_FORM_TITLE' => 'Nou Compte',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Oportunitats',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Correu alternatiu:',
  'LBL_OTHER_PHONE' => 'Tel. alternatiu:',
  'LBL_OWNERSHIP' => 'Propietari:',
  'LBL_PARENT_ACCOUNT_ID' => 'ID Compte Origen',
  'LBL_PHONE_ALT' => 'Telèfon alternatiu:',
  'LBL_PHONE_FAX' => 'Fax oficina:',
  'LBL_PHONE_OFFICE' => 'Telèfon oficina:',
  'LBL_PHONE' => 'Telèfon:',
  'LBL_POSTAL_CODE' => 'Còdig postal:',
  'LBL_PRODUCTS_TITLE' => 'Productes',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projectes',
  'LBL_PUSH_BILLING' => 'Emissió de Factures',
  'LBL_PUSH_CONTACTS_BUTTON_LABEL' => 'Copiar a Contactes',
  'LBL_PUSH_CONTACTS_BUTTON_TITLE' => 'Copiar...',
  'LBL_PUSH_SHIPPING' => 'Emissió d´Enviaments',
  'LBL_SAVE_ACCOUNT' => 'Guardar Compte',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Comptes',
  'LBL_SHIPPING_ADDRESS_CITY' => 'Ciutat d´enviament:',
  'LBL_SHIPPING_ADDRESS_COUNTRY' => 'País d´enviament:',
  'LBL_SHIPPING_ADDRESS_POSTALCODE' => 'CP d´enviament:',
  'LBL_SHIPPING_ADDRESS_STATE' => 'Estat/Província d´enviament:',
  'LBL_SHIPPING_ADDRESS_STREET_2' => 'Carrer d´enviament 2',
  'LBL_SHIPPING_ADDRESS_STREET_3' => 'Carrer d´enviament 3',
  'LBL_SHIPPING_ADDRESS_STREET_4' => 'Carrer d´enviament 4',
  'LBL_SHIPPING_ADDRESS_STREET' => 'Carrer d´enviament:',
  'LBL_SHIPPING_ADDRESS' => 'Direcció d´enviament:',
  'LBL_SIC_CODE' => 'CIF/DNI:',
  'LBL_STATE' => 'Estat/Província:',
  'LBL_TASKS_SUBPANEL_TITLE' => 'Tasques',
  'LBL_TEAMS_LINK' => 'Equips',
  'LBL_TICKER_SYMBOL' => 'Sigla bursátil:',
  'LBL_TYPE' => 'Tipus:',
  'LBL_USERS_ASSIGNED_LINK' => 'Usuaris Assignats',
  'LBL_USERS_CREATED_LINK' => 'Usuaris Creat Per',
  'LBL_USERS_MODIFIED_LINK' => 'Usuaris Modificats',
  'LBL_VIEW_FORM_TITLE' => 'Vista del Compte',
  'LBL_WEBSITE' => 'Web:',
  'LBL_CREATED_ID' => 'Creat Per Id',
  'LBL_CAMPAIGNS' => 'Campanyes',
  'LNK_ACCOUNT_LIST' => 'Comptes',
  'LNK_NEW_ACCOUNT' => 'Nou Compte',
  'MSG_DUPLICATE' => 'El registre per al compte que crearà podria ser un duplicat d´un altre registre de compte existent. Els registres de compte amb noms similars es llisten a continuació.<br>Faci clic en Guardar per continuar amb la creació d´aquest compte, o en Cancel·lar per tornar al mòdul sense crear el compte.',
  'MSG_SHOW_DUPLICATES' => 'El registre per al compte que crearà podria ser un duplicat d´un altre registre de compte existent. Els registres de compte amb noms similars es llisten a continuació.<br>Faci clic en Guardar per continuar amb la creació d´aquest compte, o en Cancel·lar per tornar al mòdul sense crear el compte.',
  'NTC_COPY_BILLING_ADDRESS' => 'Copiar direcció de cobrament a direcció d´enviament',
  'NTC_COPY_BILLING_ADDRESS2' => 'Copiar a direcció d´enviament',
  'NTC_COPY_SHIPPING_ADDRESS' => 'Copiar direcció d´enviament a direcció de cobrament',
  'NTC_COPY_SHIPPING_ADDRESS2' => 'Copiar a direcció de cobrament',
  'NTC_DELETE_CONFIRMATION' => 'Està segur que desitja eliminar aquest registre?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Està segur que desitja treure aquest registre?',
  'NTC_REMOVE_MEMBER_ORG_CONFIRMATION' => 'Està segur que desitja treure aquest registre com a organització membre?',
  'LBL_ASSIGNED_USER_NAME' => 'Assignat a:',
  'LBL_PROSPECT_LIST' => 'Llista de Públic Objectiu',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Comptes',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projectes',
);


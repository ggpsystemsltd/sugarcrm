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
  'LBL_ID' => 'ID',
  'LBL_TEAM' => 'Teams',
  'LBL_TEAMS' => 'Teams',
  'LBL_TEAM_ID' => 'Team Id',
  'LBL_URL' => 'URL',
  'LBL_API_DATA' => 'API Data',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'Toegewezen Gebruiker Id',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen aan',
  'LBL_DATE_ENTERED' => 'Datum ingevoerd',
  'LBL_DATE_MODIFIED' => 'Laatste wijziging',
  'LBL_MODIFIED' => 'Gewijzigd door',
  'LBL_MODIFIED_ID' => 'Gewijzigd door ID',
  'LBL_MODIFIED_NAME' => 'Gewijzigd door Naam',
  'LBL_CREATED' => 'Gemaakt door',
  'LBL_CREATED_ID' => 'Gemaakt door ID',
  'LBL_DESCRIPTION' => 'Beschrijving',
  'LBL_DELETED' => 'Verwijderd',
  'LBL_NAME' => 'App Gebruikersnaam',
  'LBL_CREATED_USER' => 'Aangemaakt door Gebruiker',
  'LBL_MODIFIED_USER' => 'Gewijzigd door Gebruiker',
  'LBL_LIST_NAME' => 'Naam',
  'LBL_LIST_FORM_TITLE' => 'Overzicht Externe Accounts',
  'LBL_MODULE_NAME' => 'Externe Account',
  'LBL_MODULE_TITLE' => 'Externe Accounts',
  'LBL_HOMEPAGE_TITLE' => 'Mijn Externe Accounts',
  'LNK_NEW_RECORD' => 'Nieuwe Externe Account',
  'LNK_LIST' => 'Bekijk Externe Accounts',
  'LNK_IMPORT_SUGAR_EAPM' => 'Importeer Externe Accounts',
  'LBL_SEARCH_FORM_TITLE' => 'Zoek externe bron',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Toon Historie',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activiteiten',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Externe Accounts',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Externe Account',
  'LBL_PASSWORD' => 'App. Wachtwoord:',
  'LBL_USER_NAME' => 'App. Gebruikersnaam',
  'LBL_APPLICATION' => 'Applicatie',
  'LBL_API_TYPE' => 'Type Login',
  'LBL_API_CONSKEY' => 'API Consumer Key',
  'LBL_API_CONSSECRET' => 'API Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'API OAuth Token',
  'LBL_AUTH_UNSUPPORTED' => 'Deze authorisatiemethodiek wordt niet ondersteund door de applicatie',
  'LBL_AUTH_ERROR' => 'Fouten tijdens login: %s',
  'LBL_VALIDATED' => 'Toegang geldig',
  'LBL_ACTIVE' => 'Actief',
  'LBL_SUGAR_USER_NAME' => 'Sugar Gebruiker',
  'LBL_DISPLAY_PROPERTIES' => 'Eigenschappen voor Tonen',
  'LBL_CONNECT_BUTTON_TITLE' => 'Verbinden',
  'LBL_NOTE' => 'Let op',
  'LBL_CONNECTED' => 'Verbonden',
  'LBL_DISCONNECTED' => 'Niet verbonden',
  'LBL_ERR_NO_AUTHINFO' => 'Er is geen authenticatie informatie bij deze account',
  'LBL_ERR_NO_TOKEN' => 'Er zijn geen geldige login tekens voor deze account',
  'LBL_ERR_FAILED_QUICKCHECK' => 'U bent op dit moment niet ingelogd in uw {0} account. Klik op Ok om opnieuw in te loggen en de externe account te activeren.',
  'LBL_MEET_NOW_BUTTON' => 'Nu vergaderen',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Bekijk aankomende LotusLive™ Meetings',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Aankomende LotusLive™ Meetings',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Bekijk LotusLive™ Documenten',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive™ Documenten',
  'LBL_REAUTHENTICATE_LABEL' => 'Opnieuw authenticeren',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Er is reeds een account aanwezig voor deze applicatie. We hebben zojuist uw vorige account opnieuw ingesteld.',
  'LBL_OMIT_URL' => '(weglaten http:// of https: / /)',
  'LBL_OAUTH_SAVE_NOTICE' => 'Klik op Opslaan om de externe account-record maken. U wordt omgeleid naar een pagina om uw account informatie te toegang te verlenen door Sugar in te voeren. Na het ingeven van uw account informatie, wordt u omgeleid naar Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Klik op Opslaan om een externe account regel aan te maken. SugarCRM zal uw referenties controleren.',
  'LBL_ERR_FACEBOOK' => 'Facebook geeft een fout terug en de feed kan niet worden weergegeven.',
  'LBL_ERR_NO_RESPONSE' => 'Er trad een fout op tijdens het opslaan van de externe account.',
  'LBL_ERR_TWITTER' => 'Twitter geeft een error terug en de feed kan niet worden weergegeven.',
  'LBL_ERR_POPUPS_DISABLED' => 'Sta browser pop-up vensters toe of voeg een uitzondering toe voor website "{0}"',
);


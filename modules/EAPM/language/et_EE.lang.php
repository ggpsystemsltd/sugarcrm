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
  'LBL_LIST_FORM_TITLE' => 'External Account List',
  'LBL_MODULE_NAME' => 'External Account',
  'LBL_MODULE_TITLE' => 'External Accounts',
  'LBL_HOMEPAGE_TITLE' => 'My External Accounts',
  'LNK_NEW_RECORD' => 'Create External Account',
  'LNK_LIST' => 'View External Accounts',
  'LNK_IMPORT_SUGAR_EAPM' => 'Import External Accounts',
  'LBL_SEARCH_FORM_TITLE' => 'Search External Source',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'External Accounts',
  'LBL_NEW_FORM_TITLE' => 'New External Account',
  'LBL_AUTH_ERROR' => 'Attempt to authenticate the external account failed.',
  'LBL_OAUTH_SAVE_NOTICE' => 'Click Save to create the external account record. You will be directed to a page to enter your account information to authorize access by Sugar. After entering your account information, you will be directed back to Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Click Save to create the external account record. Sugar will then validate your credentials.',
  'LBL_ERR_NO_RESPONSE' => 'An error occurred when trying to save to the external account.',
  'LBL_ID' => 'ID',
  'LBL_URL' => 'URL',
  'LBL_API_DATA' => 'API Data',
  'LBL_API_CONSKEY' => 'Consumer Key',
  'LBL_API_CONSSECRET' => 'Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_ERR_NO_TOKEN' => 'There are no valid login tokens for this account.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'You are not currently logged in to your {0} account. Click OK to re-login to your account and to activate the external account record.',
  'LBL_MEET_NOW_BUTTON' => 'Meet Now',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_OMIT_URL' => '(Omit http:// or https://)',
  'LBL_ASSIGNED_TO_ID' => 'Vastutaja ID:',
  'LBL_ASSIGNED_TO_NAME' => 'Sugari Kasutaja',
  'LBL_DATE_ENTERED' => 'Loomiskuupäev',
  'LBL_DATE_MODIFIED' => 'Muutmiskuupäev',
  'LBL_MODIFIED' => 'Muutja',
  'LBL_MODIFIED_ID' => 'Muutja Id',
  'LBL_MODIFIED_NAME' => 'Muutja nime järgi',
  'LBL_CREATED' => 'Loodud',
  'LBL_CREATED_ID' => 'Looja Id',
  'LBL_DESCRIPTION' => 'Kirjeldus',
  'LBL_DELETED' => 'Kustutatud',
  'LBL_NAME' => 'App kasutaja nimi',
  'LBL_CREATED_USER' => 'Loodud kasutaja poolt',
  'LBL_MODIFIED_USER' => 'Muudetud kasutaja poolt',
  'LBL_LIST_NAME' => 'Nimi',
  'LBL_TEAM' => 'Meeskonnad',
  'LBL_TEAMS' => 'Meeskonnad',
  'LBL_TEAM_ID' => 'Meeskonna ID',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Vaata ajalugu',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tegevused',
  'LBL_PASSWORD' => 'App Parool',
  'LBL_USER_NAME' => 'App Kasutajanimi',
  'LBL_APPLICATION' => 'Rakendus',
  'LBL_API_TYPE' => 'Login tüüp',
  'LBL_AUTH_UNSUPPORTED' => 'See autoriseerimismeetod ei ole rakenduse poolt toetatud',
  'LBL_VALIDATED' => 'Ligipääs valideeritud',
  'LBL_ACTIVE' => 'Aktiivne',
  'LBL_SUGAR_USER_NAME' => 'Sugar kasutaja',
  'LBL_DISPLAY_PROPERTIES' => 'Kuva omadused',
  'LBL_ERR_NO_AUTHINFO' => 'Autentimisinfot selle konto jaoks ei ole.',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Vaata tulevasi LotusLive™ koosolekuid',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Tulevased LotusLive™ koosolekuid',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Vaata LotusLive™ dokumente',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive™ dokumendid',
  'LBL_REAUTHENTICATE_LABEL' => 'Deautendi',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Selle rakenduse jaoks konto juba kehtib. Oleme taastanud olemasoleva konto.',
  'LBL_ERR_FACEBOOK' => 'Facebook andis veateate ja voogu ei saa kuvada.',
  'LBL_ERR_TWITTER' => 'Twitter andis veateate ja voogu ei saa kuvada.',
);


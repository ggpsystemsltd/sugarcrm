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
  'LBL_ASSIGNED_TO_ID' => 'Отговорник',
  'LBL_ASSIGNED_TO_NAME' => 'Потребител на Sugar',
  'LBL_ID' => 'Идентификатор',
  'LBL_MODIFIED_NAME' => 'Модифицирано от',
  'LBL_MODIFIED_USER' => 'Модифицирано от',
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
  'LBL_URL' => 'URL',
  'LBL_API_DATA' => 'API Data',
  'LBL_API_TYPE' => 'Login Type',
  'LBL_API_CONSKEY' => 'Consumer Key',
  'LBL_API_CONSSECRET' => 'Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_ACTIVE' => 'Active',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_SUGAR_USER_NAME' => 'Sugar User',
  'LBL_DISPLAY_PROPERTIES' => 'Display Properties',
  'LBL_NOTE' => 'Please Note',
  'LBL_CONNECTED' => 'Connected',
  'LBL_DISCONNECTED' => 'Not Connected',
  'LBL_ERR_NO_AUTHINFO' => 'There is no authentication information for this account.',
  'LBL_ERR_NO_TOKEN' => 'There are no valid login tokens for this account.',
  'LBL_MEET_NOW_BUTTON' => 'Meet Now',
  'LBL_REAUTHENTICATE_LABEL' => 'Reauthenticate',
  'LBL_APPLICATION_FOUND_NOTICE' => 'An account for this application already exists. We have reinstated the existing account.',
  'LBL_OAUTH_SAVE_NOTICE' => 'Click <b>Connect</b> to be directed to a page to provide your account information and to authorize access to the account by Sugar. After connecting, you will be directed back to Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Click <b>Connect</b> to connect this account to Sugar.',
  'LBL_ERR_FACEBOOK' => 'Facebook returned an error, and the feed cannot be displayed.',
  'LBL_ERR_TWITTER' => 'Twitter returned an error, and the feed cannot be displayed.',
  'LBL_ERR_POPUPS_DISABLED' => 'Please enable browser popup windows or add an exception for website "{0}" to the exceptions list in order to connect.',
  'LBL_DATE_ENTERED' => 'Създадено на',
  'LBL_DATE_MODIFIED' => 'Модифицирано на',
  'LBL_MODIFIED' => 'Модифицирано от',
  'LBL_MODIFIED_ID' => 'Модифицирано от',
  'LBL_CREATED' => 'Създадено от',
  'LBL_CREATED_ID' => 'Създадено от',
  'LBL_DESCRIPTION' => 'Описание',
  'LBL_DELETED' => 'Изтрити',
  'LBL_NAME' => 'Потребител',
  'LBL_CREATED_USER' => 'App User Name',
  'LBL_LIST_NAME' => 'Име',
  'LBL_TEAM' => 'Екипи',
  'LBL_TEAMS' => 'Екипи',
  'LBL_TEAM_ID' => 'Екип',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'История',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Дейности',
  'LBL_PASSWORD' => 'Парола',
  'LBL_USER_NAME' => 'Потребител',
  'LBL_APPLICATION' => 'Приложение',
  'LBL_AUTH_UNSUPPORTED' => 'Този метод на идентификация не се поддържа от приложението',
  'LBL_AUTH_ERROR' => 'Неуспешна идентификация на външната организация.',
  'LBL_VALIDATED' => 'Access Validated',
  'LBL_CONNECT_BUTTON_TITLE' => 'Свържи се',
  'LBL_ERR_FAILED_QUICKCHECK' => 'You are not currently logged in to your {0} account. Click OK to re-login to your account and to activate the external account record.',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'View Upcoming LotusLive™ Meetings',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Upcoming LotusLive™ Meetings',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'View LotusLive™ Documents',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive™ Documents',
  'LBL_REAUTHENTICATE_KEY' => 'а',
  'LBL_OMIT_URL' => '(Пропусни http:// или https://)',
  'LBL_ERR_NO_RESPONSE' => 'Възникна грешка при опит за връзка спосочения потребител.',
);


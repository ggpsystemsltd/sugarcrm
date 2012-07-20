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

	

$connector_strings = array (
  'LBL_NAME' => 'Потребител в Twitter',
  'company_url' => 'URL',
  'oauth_consumer_key' => 'Ключ',
  'oauth_consumer_secret' => 'Криптиращ стринг',
  'LBL_LICENSING_INFO' => 'Получете ключ и криптиращ стринг от Twitter© като регистрирате Вашата SugarCRM инсталация като ново приложение.<br /><br />Стъпките за регистрация на Вашата инсталация са:<br /><br />   1. Go to the Twitter© Developers site:: http://dev.twitter.com/apps/new.<br />   2. Sign In using the Twitter account under which you would like to register the application.<br />   3. Within the registration form, enter a name for the application. This is the name users will see when they authenticate their Twitter accounts from within Sugar.<br />   4. Enter a Description.<br />   5. Enter an Application Website URL (could be anything).<br />   6. Select "Browser" for Application Type.<br />   7. After selecting "Browser" for Application Type, enter a Callback URL (could be anything since Sugar bypasses this on authentication. Example: Enter your Sugar root URL).<br />   8. Enter the security words.<br />   9. Click "Register application".<br />  10. Accept the Twitter API Terms of Service.<br />  11. Within the application page, find the Consumer Key and Consumer Secret. Enter the Key and Secret below.',
  'LBL_ID' => 'Потребителско име',
);



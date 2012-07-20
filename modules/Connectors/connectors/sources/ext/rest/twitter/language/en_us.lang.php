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


/*********************************************************************************
* Description:
* Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
* Reserved. Contributor(s): contact@synolia.com - www.synolia.com
* *******************************************************************************/


$connector_strings = array (
    'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Obtain a Consumer Key and Secret from Twitter&#169; by registering your Sugar instance as a new application.<br/><br>Steps to register your instance:<br/><br/><ol><li>Go to the Twitter&#169; Developers site: <a href=\'http://dev.twitter.com/apps/new\' target=\'_blank\'>http://dev.twitter.com/apps/new</a>.</li><li>Sign In using the Twitter account under which you would like to register the application.</li><li>Within the registration form, enter a name for the application. This is the name users will see when they authenticate their Twitter accounts from within Sugar.</li><li>Enter a Description.</li><li>Enter an Application Website URL (could be anything).</li><li>Select "Browser" for Application Type.</li><li>After selecting "Browser" for Application Type, enter a Callback URL (could be anything since Sugar bypasses this on authentication. Example: Enter your Sugar root URL).</li><li>Enter the security words.</li><li>Click "Register application".</li><li>Accept the Twitter API Terms of Service.</li><li>Within the application page, find the Consumer Key and Consumer Secret. Enter the Key and Secret below.</li></ol></td></tr></table>',
    'LBL_NAME' => 'Twitter Username',
    'LBL_ID' => 'Twitter Username',
	'company_url' => 'URL',
    'oauth_consumer_key' => 'Consumer Key',
    'oauth_consumer_secret' => 'Consumer Secret',
);

?>

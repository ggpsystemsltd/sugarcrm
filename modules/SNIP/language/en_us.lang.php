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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array(
    'LBL_SNIP_SUMMARY' => "Email Archiving is an automatic importing service that allows users to import emails into Sugar by sending them from any mail client or service to a Sugar-provided email address. Each Sugar instance has its own unique email address. To import emails, a user sends to the provided email address using the TO, CC, BCC fields. The Email Archiving service will import the email into the Sugar instance. The service imports the email, along with any attachments, images and Calendar events, and creates records within the application that are associated with existing records based on matching email addresses.
    <br><br>Example: As a user, when I view an Account, I will be able to see all the emails that are  associated with the Account based on the email address in the Account record.  I will also be able to see emails that are associated with Contacts related to the Account.
    <br><br>Accept the terms below and click Enable to start using the service. You will be able to disable the service at any time. Once the service is enabled, the email address to use for the service will be displayed.
    <br><br>",
	'LBL_REGISTER_SNIP_FAIL' => 'Failed to contact Email Archiving service: %s!<br>',
	'LBL_CONFIGURE_SNIP' => 'Email Archiving',
    'LBL_DISABLE_SNIP' => 'Disable',
    'LBL_SNIP_APPLICATION_UNIQUE_KEY' => 'Application Unique Key',
    'LBL_SNIP_USER' => 'Email Archiving User',
    'LBL_SNIP_PWD' => 'Email Archiving Password',
    'LBL_SNIP_SUGAR_URL' => 'This Sugar instance URL',
	'LBL_SNIP_CALLBACK_URL' => 'Email Archiving service URL',
    'LBL_SNIP_USER_DESC' => 'Email Archiving user',
    'LBL_SNIP_STATUS_OK' => 'Enabled',
    'LBL_SNIP_STATUS_OK_SUMMARY' => 'This Sugar instance is successfully connected to the Email Archiving server.',
    'LBL_SNIP_STATUS_ERROR' => 'Error',
    'LBL_SNIP_STATUS_ERROR_SUMMARY' => 'This instance has a valid Email Archiving server license, but the server returned the following error message:',
    'LBL_SNIP_STATUS_FAIL' => 'Cannot register with Email Archiving server',
    'LBL_SNIP_STATUS_FAIL_SUMMARY' => 'The Email Archiving service is currently unavailable.  Either the service is down or the connection to this Sugar instance failed.',
    'LBL_SNIP_GENERIC_ERROR' => 'The Email Archiving service is currently unavailable.  Either the service is down or the connection to this Sugar instance failed.',

	'LBL_SNIP_STATUS_RESET' => 'Not run yet',
	'LBL_SNIP_STATUS_PROBLEM' => 'Problem: %s',
    'LBL_SNIP_NEVER' => "Never",
    'LBL_SNIP_STATUS_SUMMARY' => "Email Archiving service status:",
    'LBL_SNIP_ACCOUNT' => "Account",
    'LBL_SNIP_STATUS' => "Status",
    'LBL_SNIP_LAST_SUCCESS' => "Last successful run",
    "LBL_SNIP_DESCRIPTION" => "Email Archiving service is an automatic email archiving system",
    "LBL_SNIP_DESCRIPTION_SUMMARY" => "It allows you to see emails that were sent to or from your contacts inside SugarCRM, without you having to manually import and link the emails",
    "LBL_SNIP_PURCHASE_SUMMARY" => "In order to use Email Archiving, you must purchase a license for your SugarCRM instance",
    "LBL_SNIP_PURCHASE" => "Click here to purchase",
    'LBL_SNIP_EMAIL' => 'Email Archiving Adress',
    'LBL_SNIP_AGREE' => "I agree to the above terms and the <a href='http://www.sugarcrm.com/crm/TRUSTe/privacy.html' target='_blank'>privacy agreement</a>.",
    'LBL_SNIP_PRIVACY' => 'privacy agreement',

    'LBL_SNIP_STATUS_PINGBACK_FAIL' => 'Pingback failed',
    'LBL_SNIP_STATUS_PINGBACK_FAIL_SUMMARY' => 'The Email Archiving server is unable to establish a connection with your Sugar instance. Please try again or <a href="http://www.sugarcrm.com/crm/case-tracker/submit.html?lsd=supportportal&tmpl=" target="_blank">contact customer support</a>.',

    'LBL_SNIP_BUTTON_ENABLE' => 'Enable Email Archiving',
    'LBL_SNIP_BUTTON_DISABLE' => 'Disable Email Archiving',
    'LBL_SNIP_BUTTON_RETRY' => 'Try Connecting Again',
    'LBL_SNIP_ERROR_DISABLING' => 'An error occured while attempting to communicate with the Email Archiving server, and the service could not be disabled',
    'LBL_SNIP_ERROR_ENABLING' => 'An error occured while attempting to communicate with the Email Archiving server, and the service could not be enabled',
    'LBL_CONTACT_SUPPORT' => 'Please try again or contact SugarCRM Support.',
    'LBL_SNIP_SUPPORT' => 'Please contact SugarCRM Support for assistance.',
    'ERROR_BAD_RESULT' => 'Bad result returned from the service',
	'ERROR_NO_CURL' => 'cURL extensions is required, but has not been enabled',
	'ERROR_REQUEST_FAILED' => 'Could not contact the server',

    'LBL_CANCEL_BUTTON_TITLE' => 'Cancel',

    'LBL_SNIP_MOUSEOVER_STATUS' => 'This is the status of the Email Archiving service on your instance. The status reflects whether the connection between the Email Archiving server and your Sugar instance is successful.',
    'LBL_SNIP_MOUSEOVER_EMAIL' => 'This is the Email Archiving email address to send to in order to import emails into Sugar.',
    'LBL_SNIP_MOUSEOVER_SERVICE_URL' => 'This is the URL of the Email Archiving server. All requests, such as enabling and disabling the Email Archiving service, will be relayed through this URL.',
    'LBL_SNIP_MOUSEOVER_INSTANCE_URL' => 'This is webservices URL of your Sugar instance. The Email Archiving server will connect to your server through this URL.',
);

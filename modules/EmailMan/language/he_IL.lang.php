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
	'LBL_SEND_DATE_TIME'						=> 'Send Date',
	'LBL_IN_QUEUE'								=> 'In Process',
	'LBL_IN_QUEUE_DATE'							=> 'Queued Date',

	'ERR_INT_ONLY_EMAIL_PER_RUN'				=> 'Use only integer values to specify the number of emails sent per batch',

	'LBL_ATTACHMENT_AUDIT'						=> ' was sent.  It was not duplicated locally to conserve disk usage.',
	'LBL_CONFIGURE_SETTINGS'					=> 'Configure Email Settings',
	'LBL_CUSTOM_LOCATION'						=> 'User Defined',
	'LBL_DEFAULT_LOCATION'						=> 'Default',
	
	'LBL_DISCLOSURE_TITLE'						=> 'Append Disclosure Message to Every Email',
	'LBL_DISCLOSURE_TEXT_TITLE'					=> 'Disclosure Contents',
	'LBL_DISCLOSURE_TEXT_SAMPLE'				=> 'NOTICE: This email message is for the sole use of the intended recipient(s) and may contain confidential and privileged information. Any unauthorized review, use, disclosure, or distribution is prohibited. If you are not the intended recipient, please destroy all copies of the original message and notify the sender so that our address record can be corrected. Thank you.',
	
	'LBL_EMAIL_DEFAULT_CHARSET'					=> 'Compose email messages in this character set',
	'LBL_EMAIL_DEFAULT_EDITOR'					=> 'Compose email using this client',
	'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS'		=> 'Delete related notes & attachments with deleted Emails',
	'LBL_EMAIL_GMAIL_DEFAULTS'					=> 'Prefill Gmail&#153; Defaults',
	'LBL_EMAIL_PER_RUN_REQ'						=> 'Number of emails sent per batch:',
	'LBL_EMAIL_SMTP_SSL'						=> 'Enable SMTP over SSL?',
	'LBL_EMAIL_USER_TITLE'						=> 'User Email Defaults',
	'LBL_EMAIL_OUTBOUND_CONFIGURATION'			=> 'Outgoing Mail Configuration',
	'LBL_EMAILS_PER_RUN'						=> 'Number of emails sent per batch:',
	'LBL_ID'									=> 'Id',
	'LBL_LIST_CAMPAIGN'							=> 'Campaign',
	'LBL_LIST_FORM_PROCESSED_TITLE'				=> 'Processed',
	'LBL_LIST_FORM_TITLE'						=> 'Queue',
	'LBL_LIST_FROM_EMAIL'						=> 'From Email',
	'LBL_LIST_FROM_NAME'						=> 'From Name',
	'LBL_LIST_IN_QUEUE'							=> 'In Process',
	'LBL_LIST_MESSAGE_NAME'						=> 'Marketing Message',
	'LBL_LIST_RECIPIENT_EMAIL'					=> 'Recipient Email',
	'LBL_LIST_RECIPIENT_NAME'					=> 'Recipient Name',
	'LBL_LIST_SEND_ATTEMPTS'					=> 'Send Attempts',
	'LBL_LIST_SEND_DATE_TIME'					=> 'Send On',
	'LBL_LIST_USER_NAME'						=> 'User Name',
	'LBL_LOCATION_ONLY'							=> 'Location',
	'LBL_LOCATION_TRACK'						=> 'Location of campaign tracking files (like campaign_tracker.php)',
    'LBL_CAMP_MESSAGE_COPY'                     => 'Keep copies of campaign messages:',
    'LBL_CAMP_MESSAGE_COPY_DESC'                     => 'Would you like to store complete copies of <bold>EACH</bold> email message sent during all campaigns?  <bold>We recommend and default to no</bold>.  Choosing no will store only the template that is sent and the needed variables to recreate the individual message.',
	'LBL_MAIL_SENDTYPE'							=> 'Mail Transfer Agent:',
	'LBL_MAIL_SMTPAUTH_REQ'						=> 'Use SMTP Authentication:',
	'LBL_MAIL_SMTPPASS'							=> 'Password:',
	'LBL_MAIL_SMTPPORT'							=> 'SMTP Port:',
	'LBL_MAIL_SMTPSERVER'						=> 'SMTP Mail Server:',
	'LBL_MAIL_SMTPUSER'							=> 'Username:',
	'LBL_CHOOSE_EMAIL_PROVIDER'        => 'Choose your Email provider',
	'LBL_YAHOOMAIL_SMTPPASS'					=> 'Yahoo! Mail Password',
	'LBL_YAHOOMAIL_SMTPUSER'					=> 'Yahoo! Mail ID',
	'LBL_GMAIL_SMTPPASS'					=> 'Gmail Password',
	'LBL_GMAIL_SMTPUSER'					=> 'Gmail Email Address',
	'LBL_EXCHANGE_SMTPPASS'					=> 'Exchange Password',
	'LBL_EXCHANGE_SMTPUSER'					=> 'Exchange Username',
	'LBL_EXCHANGE_SMTPPORT'					=> 'Exchange Server Port',
	'LBL_EXCHANGE_SMTPSERVER'				=> 'Exchange Server',
	'LBL_EMAIL_LINK_TYPE'				=> 'Email Client',
    'LBL_EMAIL_LINK_TYPE_HELP'			=> '<b>Sugar Mail Client:</b> Send emails using the email client in the Sugar application.<br><b>External Mail Client:</b> Send email using an email client outside of the Sugar application, such as Microsoft Outlook.',
	'LBL_MARKETING_ID'							=> 'Marketing Id',
    'LBL_MODULE_ID'                             => 'EmailMan',
	'LBL_MODULE_NAME'							=> 'Email Settings',
	'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS'    => 'Configure Campaign Email Settings',
	'LBL_MODULE_TITLE'							=> 'Outbound Email Queue Management',
	'LBL_NOTIFICATION_ON_DESC' 					=> 'When enabled, emails are sent to users when records are assigned to them.',
	'LBL_NOTIFY_FROMADDRESS' 					=> '"From" Address:',
	'LBL_NOTIFY_FROMNAME' 						=> '"From" Name:',
	'LBL_NOTIFY_ON'								=> 'Assignment Notifications',
	'LBL_NOTIFY_SEND_BY_DEFAULT'				=> 'Send notifications to new users',
	'LBL_NOTIFY_TITLE'							=> 'Email Options',
	'LBL_OLD_ID'								=> 'Old Id',
	'LBL_OUTBOUND_EMAIL_TITLE'					=> 'Outbound Email Options',
	'LBL_RELATED_ID'							=> 'Related Id',
	'LBL_RELATED_TYPE'							=> 'Related Type',
	'LBL_SAVE_OUTBOUND_RAW'						=> 'Save Outbound Raw Emails',
	'LBL_SEARCH_FORM_PROCESSED_TITLE'			=> 'Processed Search',
	'LBL_SEARCH_FORM_TITLE'						=> 'Queue Search',
	'LBL_VIEW_PROCESSED_EMAILS'					=> 'View Processed Emails',
	'LBL_VIEW_QUEUED_EMAILS'					=> 'View Queued Emails',
	'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE'	=> 'Value of Config.php setting site_url',
	'TXT_REMOVE_ME_ALT'							=> 'To remove yourself from this email list go to',
	'TXT_REMOVE_ME_CLICK'						=> 'click here',
	'TXT_REMOVE_ME'								=> 'To remove yourself from this email list ',
	'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER'		=> 'Send notification from assigning user\'s e-mail address',

	'LBL_SECURITY_TITLE'						=> 'Email Security Settings',
	'LBL_SECURITY_DESC'							=> 'Check the following that should NOT be allowed in via InboundEmail or displayed in the Emails module.',
	'LBL_SECURITY_APPLET'						=> 'Applet tag',
	'LBL_SECURITY_BASE'							=> 'Base tag',
	'LBL_SECURITY_EMBED'						=> 'Embed tag',
	'LBL_SECURITY_FORM'							=> 'Form tag',
	'LBL_SECURITY_FRAME'						=> 'Frame tag',
	'LBL_SECURITY_FRAMESET'						=> 'Frameset tag',
	'LBL_SECURITY_IFRAME'						=> 'iFrame tag',
	'LBL_SECURITY_IMPORT'						=> 'Import tag',
	'LBL_SECURITY_LAYER'						=> 'Layer tag',
	'LBL_SECURITY_LINK'							=> 'Link tag',
	'LBL_SECURITY_OBJECT'						=> 'Object tag',
	'LBL_SECURITY_OUTLOOK_DEFAULTS'				=> 'Select Outlook default minimum security settings (errs on the side of correct display).',
	'LBL_SECURITY_SCRIPT'						=> 'Script tag',
	'LBL_SECURITY_STYLE'						=> 'Style tag',
	'LBL_SECURITY_TOGGLE_ALL'					=> 'Toggle All Options',
	'LBL_SECURITY_XMP'							=> 'Xmp tag',
    'LBL_YES'                                   => 'Yes',
    'LBL_NO'                                    => 'No',
    'LBL_PREPEND_TEST'                          => '[Test]: ',
	'LBL_SEND_ATTEMPTS'							=> 'Send Attempts',
	'LBL_OUTGOING_SECTION_HELP'                 => 'Configure the default outgoing mail server for sending email notifications, including workflow alerts.',
    'LBL_ALLOW_DEFAULT_SELECTION'               => 'Allow users to use this account for outgoing email:',
    'LBL_ALLOW_DEFAULT_SELECTION_HELP'          => 'When this option selected, all users will be able to send emails using the same outgoing<br> mail account used to send system notifications and alerts.  If the option is not selected,<br> users can still use the outgoing mail server after providing their own account information.',
);

?>

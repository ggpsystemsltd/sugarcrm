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

 * Description:  Contains a variety of utility functions specific to this module.
 ********************************************************************************/

/**
 * Create javascript to validate the data entered into a record.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_validate_record_js () {
global $mod_strings;
global $app_strings;

$lbl_email_per_run = $mod_strings['LBL_EMAILS_PER_RUN'];
$lbl_location = $mod_strings['LBL_LOCATION_ONLY'];
$err_int_only=$mod_strings['ERR_INT_ONLY_EMAIL_PER_RUN'];
$err_missing_required_fields = $app_strings['ERR_MISSING_REQUIRED_FIELDS'];
$err_from_name = $mod_strings['LBL_LIST_FROM_NAME'];
$err_from_addr = $app_strings['LBL_EMAIL_SETTINGS_FROM_ADDR'];
$err_smtpport = $mod_strings['LBL_MAIL_SMTPPORT'];
$err_mailserver = $mod_strings['LBL_MAIL_SMTPSERVER'];
$err_smtpuser = $mod_strings['LBL_MAIL_SMTPUSER'];
$err_smtppass = $mod_strings['LBL_MAIL_SMTPPASS'];

$the_script  = <<<EOQ

<script type="text/javascript" language="Javascript">
<!--  to hide script contents from old browsers

function verify_data(button) {
	var isError = false;
	var errorMessage = "";
	if (typeof button.form['campaign_emails_per_run'] != 'undefined' && trim(button.form['campaign_emails_per_run'].value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_email_per_run";
	} else {
		 //make sure emails per run  is an integer.
		if (typeof button.form['campaign_emails_per_run'] != 'undefined' && isInteger(trim(button.form['campaign_emails_per_run'].value)) == false) {
			isError = true;
			errorMessage += "\\n$err_int_only";
		}
	}
	if (typeof button.form['tracking_entities_location_type'] != 'undefined' && button.form['tracking_entities_location_type'][1].checked == true) {
		if (typeof button.form['tracking_entities_location'] != 'undefined' && trim(button.form['tracking_entities_location'].value) == "") {
			isError = true;
			errorMessage += "\\n$lbl_location";
		}
	}
	if (typeof document.forms['ConfigureSettings'] != 'undefined') {
        var fromname = document.getElementById('notify_fromname').value;
        var fromAddress = document.getElementById('notify_fromaddress').value;
        var sendType = document.getElementById('mail_sendtype').value;
        var smtpPort = document.getElementById('mail_smtpport').value;
        var smtpserver = document.getElementById('mail_smtpserver').value;
        var mailsmtpauthreq = document.getElementById('mail_smtpauth_req');

        if(trim(fromname) == "") {
			isError = true;
			errorMessage += "\\n$err_from_name";
        }
        if(trim(fromAddress) == "") {
			isError = true;
			errorMessage += "\\n$err_from_addr";
        }

        if (sendType == 'SMTP') {
	        if(trim(smtpserver) == "") {
				isError = true;
				errorMessage += "\\n$err_mailserver";
	        }
	        if(trim(smtpPort) == "") {
				isError = true;
				errorMessage += "\\n$err_smtpport";
	        }
	        if (mailsmtpauthreq.checked) {
		        if(trim(document.getElementById('mail_smtpuser').value) == "") {
					isError = true;
					errorMessage += "\\n$err_smtpuser";
		        }
	        }

        } // if
	} // if

	// Here we decide whether to submit the form.
	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function add_checks(f) {
	removeFromValidate('ConfigureSettings', 'mail_smtpserver');
	removeFromValidate('ConfigureSettings', 'mail_smtpport');
	removeFromValidate('ConfigureSettings', 'mail_smtpuser');
	removeFromValidate('ConfigureSettings', 'mail_smtppass');

	if (f.mail_sendtype.value == "SMTP") {
		addToValidate('ConfigureSettings', 'mail_smtpserver', 'varchar', 'true', '{$mod_strings['LBL_MAIL_SMTPSERVER']}');
		addToValidate('ConfigureSettings', 'mail_smtpport', 'int', 'true', '{$mod_strings['LBL_MAIL_SMTPPORT']}');
		if (f.mail_smtpauth_req.checked) {
			addToValidate('ConfigureSettings', 'mail_smtpuser', 'varchar', 'true', '{$mod_strings['LBL_MAIL_SMTPUSER']}');
			addToValidate('ConfigureSettings', 'mail_smtppass', 'varchar', 'true', '{$mod_strings['LBL_MAIL_SMTPPASS']}');
		}
	}

	return true;
}

// end hiding contents from old browsers  -->
</script>
EOQ;
return $the_script;
}
?>
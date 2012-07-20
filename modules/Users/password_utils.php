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

 * Description:  TODO To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


 function canSendPassword() {
 	require_once('include/SugarPHPMailer.php');
    global $mod_strings;
	global $current_user;
	global $app_strings;
	$mail = new SugarPHPMailer();
 	$emailTemp = new EmailTemplate();
 	$mail->setMailerForSystem();
    $emailTemp->disable_row_level_security = true;


    if ($current_user->is_admin){
    	if ($emailTemp->retrieve($GLOBALS['sugar_config']['passwordsetting']['generatepasswordtmpl']) == '')
        	return $mod_strings['LBL_EMAIL_TEMPLATE_MISSING'];
    	if(empty($emailTemp->body) && empty($emailTemp->body_html))
    		return $app_strings['LBL_EMAIL_TEMPLATE_EDIT_PLAIN_TEXT'];
    	if($mail->Mailer == 'smtp' && $mail->Host =='')
    		return $mod_strings['ERR_SERVER_SMTP_EMPTY'];

		$email_errors=$mod_strings['ERR_EMAIL_NOT_SENT_ADMIN'];
		if ($mail->Mailer == 'smtp')
			$email_errors.="<br>-".$mod_strings['ERR_SMTP_URL_SMTP_PORT'];
		if ($mail->SMTPAuth)
		 	$email_errors.="<br>-".$mod_strings['ERR_SMTP_USERNAME_SMTP_PASSWORD'];
		$email_errors.="<br>-".$mod_strings['ERR_RECIPIENT_EMAIL'];
		$email_errors.="<br>-".$mod_strings['ERR_SERVER_STATUS'];
		return $email_errors;
	}
	else
		return $mod_strings['LBL_EMAIL_NOT_SENT'];
}

function  hasPasswordExpired($username){
    $current_user= new user();
    $usr_id=$current_user->retrieve_user_id($username);
	$current_user->retrieve($usr_id);
	$type = '';
	if ($current_user->system_generated_password == '1'){
        $type='syst';
    }
    else{
        $type='user';
    }

    if ($current_user->portal_only=='0'){
	    global $mod_strings, $timedate;
	    $res=$GLOBALS['sugar_config']['passwordsetting'];
	  	if ($type != '') {
		    switch($res[$type.'expiration']){

	        case '1':
		    	global $timedate;
		    	if ($current_user->pwd_last_changed == ''){
		    		$current_user->pwd_last_changed= $timedate->nowDb();
		    		$current_user->save();
		    		}

		        $expireday = $res[$type.'expirationtype']*$res[$type.'expirationtime'];
		        $expiretime = $timedate->fromUser($current_user->pwd_last_changed)->get("+{$expireday} days")->ts;

			    if ($timedate->getNow()->ts < $expiretime)
			    	return false;
			    else{
			    	$_SESSION['expiration_type']= $mod_strings['LBL_PASSWORD_EXPIRATION_TIME'];
			    	return true;
			    	}
				break;


		    case '2':
		    	$login=$current_user->getPreference('loginexpiration');
		    	$current_user->setPreference('loginexpiration',$login+1);
		        $current_user->save();
		        if ($login+1 >= $res[$type.'expirationlogin']){
		        	$_SESSION['expiration_type']= $mod_strings['LBL_PASSWORD_EXPIRATION_LOGIN'];
		        	return true;
		        }
		        else
		            {
			    	return false;
			    	}
		    	break;

		    case '0':
		        return false;
		   	 	break;
		    }
		}
    }
}

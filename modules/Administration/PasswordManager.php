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

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


if(!is_admin($current_user)){
    sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
}
function clearPasswordSettings() {
	    $_POST['passwordsetting_SystemGeneratedPasswordON'] = '';
	    $_POST['passwordsetting_generatepasswordtmpl'] = '';
	    $_POST['passwordsetting_lostpasswordtmpl'] = '';
	    $_POST['passwordsetting_forgotpasswordON'] = '0';
	    $_POST['passwordsetting_linkexpiration'] = '1';
	    $_POST['passwordsetting_linkexpirationtime'] = '30';
	    $_POST['passwordsetting_linkexpirationtype'] = '1';
	    $_POST['passwordsetting_systexpiration'] = '0';
	    $_POST['passwordsetting_systexpirationtime'] = '';
	    $_POST['passwordsetting_systexpirationtype'] = '0';
	    $_POST['passwordsetting_systexpirationlogin'] = '';

	    $_POST['passwordsetting_minpwdlength'] = '';
	    $_POST['passwordsetting_maxpwdlength'] = '';
	    $_POST['passwordsetting_oneupper'] = '';
	    $_POST['passwordsetting_onelower'] = '';
	    $_POST['passwordsetting_onenumber'] = '';
	    $_POST['passwordsetting_onespecial'] = '';
	    $_POST['passwordsetting_customregex'] = '';
	    $_POST['passwordsetting_regexcomment'] = '';
	    $_POST['passwordsetting_userexpiration'] = '0';
	    $_POST['passwordsetting_userexpirationtime'] = '';
	    $_POST['passwordsetting_userexpirationtype'] = '1';
	    $_POST['passwordsetting_userexpirationlogin'] = '';
	    $_POST['passwordsetting_lockoutexpiration'] = '0';
	    $_POST['passwordsetting_lockoutexpirationtime'] = '';
	    $_POST['passwordsetting_lockoutexpirationtype'] = '1';
	    $_POST['passwordsetting_lockoutexpirationlogin'] = '';
}
require_once('modules/Administration/Forms.php');
echo getClassicModuleTitle(
        "Administration", 
        array(
            "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
           $mod_strings['LBL_MANAGE_PASSWORD_TITLE'],
           ), 
        false
        );
require_once('modules/Configurator/Configurator.php');
$configurator = new Configurator();
$sugarConfig = SugarConfig::getInstance();
$focus = new Administration();
$configurator->parseLoggerSettings();
$valid_public_key= true;
if(!empty($_POST['saveConfig'])){
    if ($_POST['captcha_on'] == '1'){
		$handle = @fopen("http://api.recaptcha.net/challenge?k=".$_POST['captcha_public_key']."&cachestop=35235354", "r");
		$buffer ='';
		if ($handle) {
		    while (!feof($handle)) {
		        $buffer .= fgets($handle, 4096);
		    }
		    fclose($handle);
		}
		$valid_public_key= substr($buffer, 1, 4) == 'var '? true : false;
	}
	if ($valid_public_key){
		if (isset($_REQUEST['system_ldap_enabled']) && $_REQUEST['system_ldap_enabled'] == 'on') {
			$_POST['system_ldap_enabled'] = 1;
			clearPasswordSettings();
		} 
		else 
			$_POST['system_ldap_enabled'] = 0;


        if(isset($_REQUEST['authenticationClass']))
        {
	        $configurator->useAuthenticationClass = true;
        } else {
	        $configurator->useAuthenticationClass = false;
            $_POST['authenticationClass'] = '';
        }


		if (isset($_REQUEST['ldap_group_checkbox']) && $_REQUEST['ldap_group_checkbox'] == 'on') 
			$_POST['ldap_group'] = 1;
		else
			$_POST['ldap_group'] = 0;
			
		if (isset($_REQUEST['ldap_authentication_checkbox']) && $_REQUEST['ldap_authentication_checkbox'] == 'on') 
			$_POST['ldap_authentication'] = 1;
		else
		    $_POST['ldap_authentication'] = 0;
		
		if( isset($_REQUEST['passwordsetting_lockoutexpirationtime']) && is_numeric($_REQUEST['passwordsetting_lockoutexpirationtime'])  )
		    $_POST['passwordsetting_lockoutexpiration'] = 2;

		$configurator->saveConfig();
		
		$focus->saveConfig();
		
		header('Location: index.php?module=Administration&action=index');
	}
}

$focus->retrieveSettings();


require_once('include/SugarLogger/SugarLogger.php');
$sugar_smarty = new Sugar_Smarty();

// if no IMAP libraries available, disable Save/Test Settings
if(!function_exists('imap_open')) $sugar_smarty->assign('IE_DISABLED', 'DISABLED');

$config_strings=return_module_language($GLOBALS['current_language'],'Configurator');
$sugar_smarty->assign('CONF', $config_strings);
$sugar_smarty->assign('MOD', $mod_strings);
$sugar_smarty->assign('APP', $app_strings);
$sugar_smarty->assign('APP_LIST', $app_list_strings);
$sugar_smarty->assign('config', $configurator->config);
$sugar_smarty->assign('error', $configurator->errors);
$sugar_smarty->assign('LANGUAGES', get_languages());
$sugar_smarty->assign("settings", $focus->settings);

$sugar_smarty->assign('saml_enabled_checked', false);

//echo "sugar_config[authenticationClass]: " . $sugar_config['authenticationClass'];
//if (array_key_exists('authenticationClass', $sugar_config) && $sugar_config['authenticationClass'] == 'SAMLAuthenticate') {
//   $sugar_smarty->assign('saml_enabled_checked', true);	
//} else {
//	$sugar_smarty->assign('saml_enabled_checked', false);
//}


if(!function_exists('mcrypt_cbc')){
	$sugar_smarty->assign("LDAP_ENC_KEY_READONLY", 'readonly');
	$sugar_smarty->assign("LDAP_ENC_KEY_DESC", $config_strings['LDAP_ENC_KEY_NO_FUNC_DESC']);
}else{
	$sugar_smarty->assign("LDAP_ENC_KEY_DESC", $config_strings['LBL_LDAP_ENC_KEY_DESC']);
}
$sugar_smarty->assign("settings", $focus->settings);

if ($valid_public_key){
	if(!empty($focus->settings['captcha_on'])){
		$sugar_smarty->assign("CAPTCHA_CONFIG_DISPLAY", 'inline');
	}else{
		$sugar_smarty->assign("CAPTCHA_CONFIG_DISPLAY", 'none');
	}
}else{
	$sugar_smarty->assign("CAPTCHA_CONFIG_DISPLAY", 'inline');
}

$sugar_smarty->assign("VALID_PUBLIC_KEY", $valid_public_key);

	

$res=$GLOBALS['sugar_config']['passwordsetting'];


require_once('include/SugarPHPMailer.php');   
$mail = new SugarPHPMailer();
$mail->setMailerForSystem();
if($mail->Mailer == 'smtp' && $mail->Host ==''){
	$sugar_smarty->assign("SMTP_SERVER_NOT_SET", '1');
	}
else
	$sugar_smarty->assign("SMTP_SERVER_NOT_SET", '0');
	
$focus = new InboundEmail();
$focus->checkImap();
$storedOptions = unserialize(base64_decode($focus->stored_options));	
$email_templates_arr = get_bean_select_array(true, 'EmailTemplate','name', '','name',true);
$create_case_email_template = (isset($storedOptions['create_case_email_template'])) ? $storedOptions['create_case_email_template'] : "";
$TMPL_DRPDWN_LOST =get_select_options_with_id($email_templates_arr, $res['lostpasswordtmpl']); 
$TMPL_DRPDWN_GENERATE =get_select_options_with_id($email_templates_arr, $res['generatepasswordtmpl']);

$sugar_smarty->assign("TMPL_DRPDWN_LOST", $TMPL_DRPDWN_LOST);
$sugar_smarty->assign("TMPL_DRPDWN_GENERATE", $TMPL_DRPDWN_GENERATE);
$LOGGED_OUT_DISPLAY= (isset($res['lockoutexpiration']) && $res['lockoutexpiration'] == '0') ? 'none' : ''; 
$sugar_smarty->assign("LOGGED_OUT_DISPLAY_STATUS", $LOGGED_OUT_DISPLAY);

$sugar_smarty->display('modules/Administration/PasswordManager.tpl');
?>
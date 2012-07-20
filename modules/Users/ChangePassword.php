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


if (isset($_POST['saveConfig'])){
    require_once('modules/Users/User.php');
	$focus = new User();
	$focus->retrieve($_POST['record']);	
	if(!$focus->change_password($_POST['old_password'], $_POST['new_password']))
		SugarApplication::redirect("index.php?action=ChangePassword&module=Users&record=".$_POST['record']."&error_password=".urlencode($focus->error_string));
    
	// Send to new user wizard if it hasn't been run
	$ut = $GLOBALS['current_user']->getPreference('ut');
    if(empty($ut))
        SugarApplication::redirect('index.php?module=Users&action=Wizard');
    
    // Otherwise, send to home page
    SugarApplication::redirect('index.php?module=Home&action=index');
}

require_once('modules/Administration/Forms.php');
require_once('modules/Configurator/Configurator.php');
$configurator = new Configurator();
$sugarConfig = SugarConfig::getInstance();


require_once('include/SugarLogger/SugarLogger.php');
$sugar_smarty = new Sugar_Smarty();
$sugar_smarty->assign('MOD', $mod_strings);
$sugar_smarty->assign('APP', $app_strings);
$sugar_smarty->assign('MODULE', 'Users');
$sugar_smarty->assign('ACTION', 'ChangePassword');
$sugar_smarty->assign('return_action', 'index');
$sugar_smarty->assign('APP_LIST', $app_list_strings);
$sugar_smarty->assign('config', $configurator->config);
$sugar_smarty->assign('error', $configurator->errors);
$sugar_smarty->assign('LANGUAGES', get_languages());
$sugar_smarty->assign('PWDSETTINGS', $GLOBALS['sugar_config']['passwordsetting']);
$sugar_smarty->assign('ID', $current_user->id);
$sugar_smarty->assign('IS_ADMIN', $current_user->is_admin);
$sugar_smarty->assign('USER_NAME', $current_user->user_name);
$sugar_smarty->assign("INSTRUCTION", $mod_strings['LBL_CHANGE_SYSTEM_PASSWORD']);
$sugar_smarty->assign('sugar_md',getWebPath('include/images/sugar_md.png'));
if (!$current_user->is_admin) $sugar_smarty->assign('OLD_PASSWORD_FIELD','<td scope="row" width="30%">'.$mod_strings['LBL_OLD_PASSWORD'].':</td><td width="70%"><input type="password" size="26" tabindex="1" id="old_password" name="old_password"  value="" /></td>');
$pwd_settings=$GLOBALS['sugar_config']['passwordsetting'];


$pwd_regex=str_replace( "\\","\\\\",$pwd_settings['customregex']);
$sugar_smarty->assign("REGEX",$pwd_regex);
$rules = "'" . $pwd_settings["minpwdlength"] . "','" . $pwd_settings['maxpwdlength'] . "','" . $pwd_settings['customregex'] . "'";
$sugar_smarty->assign('SUBMIT_BUTTON',
	'<input title="'.$app_strings['LBL_SAVE_BUTTON_TITLE'].'" class="button" ' 
  . 'onclick="if (!set_password(form,newrules(' . $rules . '))) return false; this.form.saveConfig.value=\'1\';" ' 
  . 'type="submit" name="button" value="'.$app_strings['LBL_SAVE_BUTTON_LABEL'].'" />');


if (isset($_SESSION['expiration_type']) && $_SESSION['expiration_type'] != '')
	$sugar_smarty->assign('EXPIRATION_TYPE', $_SESSION['expiration_type']);/*
if ($current_user->system_generated_password == '1')
	$sugar_smarty->assign('EXPIRATION_TYPE', $mod_strings['LBL_PASSWORD_EXPIRATION_GENERATED']);*/
if(isset($_REQUEST['error_password'])) $sugar_smarty->assign('EXPIRATION_TYPE', $_REQUEST['error_password']);
$sugar_smarty->display('modules/Users/Changenewpassword.tpl');

?>
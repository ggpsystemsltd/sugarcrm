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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/SugarWireless/SugarWirelessView.php');

/**
 * ViewWireless_Login extends SugarWirelessView and is the login view.
 */
class ViewWirelesslogin extends SugarWirelessView{

	/**
	 * Constructor for the view, it runs the constructor of SugarWirelessView and
	 * sets the footer option to true (it is off in the SugarWirelessView constructor)
	 */
	public function __construct(){
		parent::__construct();
		$this->options['show_footer'] = true;
	}

	/**
	 * Private function to check if the session variables store the user name.
	 */
	private function check_session(){
		global $sugar_config;

        if(isset($_SESSION['authenticated_user_id'])) {
           header("Location: index.php?module=Users&action=wirelessmain&mobile=1");
        }

		if (isset($_SESSION['login_user_name'])) {
			if (isset($_REQUEST['default_user_name']))
				$login_user_name = $_REQUEST['default_user_name'];
			else
				$login_user_name = $_SESSION['login_user_name'];
		}
		else {
			if (isset($_REQUEST['default_user_name'])) {
				$login_user_name = $_REQUEST['default_user_name'];
			}
			else if (isset($_REQUEST['ck_login_id_20'])) {
				$login_user_name = get_user_name($_REQUEST['ck_login_id_20']);
			}
			else {
				$login_user_name = $sugar_config['default_user_name'];
			}
			$_SESSION['login_user_name'] = $login_user_name;
		}

		// Retrieve username and password from the session if possible.
		if(isset($_SESSION['login_password'])) {
			$login_password = $_SESSION['login_password'];
		}
		else {
			$login_password = $sugar_config['default_password'];
			$_SESSION['login_password'] = $login_password;
		}
	}

	/**
	 * Public function that handles the display of the wireless login page.
	 */
	public function display()
    {
        global $mod_strings;

		$this->check_session();

		// set template variables for login error
		if(isset($_SESSION['login_error'])) {
			$this->ss->assign('login_error', true);
			$this->ss->assign('error_message', $mod_strings['LBL_ERROR'] . ": ". $_SESSION['login_error']);
            unset($_SESSION['login_error']);
        }

		// print the header
		$this->wl_header();

		// set up template strings
		$this->ss->assign('LBL_USER_NAME', translate('LBL_USER_NAME', 'Users'));
		$this->ss->assign('LBL_PASSWORD', translate('LBL_PASSWORD', 'Users'));
		$this->ss->assign('LBL_NORMAL_LOGIN', translate('LBL_NORMAL_LOGIN', 'Users'));
		$this->ss->assign('LBL_LOGIN_BUTTON_LABEL', translate('LBL_LOGIN_BUTTON_LABEL', 'Users'));
        $lvars = $GLOBALS['app']->getLoginVars();
        if(empty($lvars['login_module'])) $lvars['login_module'] = 'Users';
        if(empty($lvars['login_action'])) $lvars['login_action'] = 'wirelessmain';
        $this->ss->assign("LOGIN_VARS", $lvars);

		// print the wireless login page
		$this->ss->display('include/SugarWireless/tpls/wirelesslogin.tpl');
	}
}
?>
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




/**
 * This file is used to control the authentication process.
 * It will call on the user authenticate and controll redirection
 * based on the users validation
 *
 */
class SugarAuthenticate{
	var $userAuthenticateClass = 'SugarAuthenticateUser';
	var $authenticationDir = 'SugarAuthenticate';
	/**
	 * Constructs SugarAuthenticate
	 * This will load the user authentication class
	 *
	 * @return SugarAuthenticate
	 */
	function SugarAuthenticate()
	{
	    // check in custom dir first, in case someone want's to override an auth controller
		if (file_exists('custom/modules/Users/authentication/'.$this->authenticationDir.'/' . $this->userAuthenticateClass . '.php')) {
            require_once('custom/modules/Users/authentication/'.$this->authenticationDir.'/' . $this->userAuthenticateClass . '.php');
        }
        elseif (file_exists('modules/Users/authentication/'.$this->authenticationDir.'/' . $this->userAuthenticateClass . '.php')) {
            require_once('modules/Users/authentication/'.$this->authenticationDir.'/' . $this->userAuthenticateClass . '.php');
        }

        $this->userAuthenticate = new $this->userAuthenticateClass();
	}
	/**
	 * Authenticates a user based on the username and password
	 * returns true if the user was authenticated false otherwise
	 * it also will load the user into current user if he was authenticated
	 *
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	function loginAuthenticate($username, $password, $fallback=false, $PARAMS = array ()){
		global $mod_strings;
		unset($_SESSION['login_error']);
		$res = $GLOBALS['sugar_config']['passwordsetting'];
		$usr= new user();
		$usr_id=$usr->retrieve_user_id($username);
		$usr->retrieve($usr_id);
		$_SESSION['login_error']='';
		$_SESSION['waiting_error']='';
		$_SESSION['hasExpiredPassword']='0';
		$usr->reloadPreferences();
		// if there is too many login attempts
		if (!empty($usr_id) && $res['lockoutexpiration'] > 0 && $usr->getPreference('loginfailed')>=($res['lockoutexpirationlogin']) && !($usr->portal_only)){
		    // if there is a lockout time set
		    if ($res['lockoutexpiration'] == '2'){
		    	// lockout date is now if not set
		    	if (($logout_time=$usr->getPreference('logout_time'))==''){
			        $usr->setPreference('logout_time',TimeDate::getInstance()->nowDb());
			        $logout_time=$usr->getPreference('logout_time');
			        }

                // Bug # 45922 - calculating the expiretime properly
                $stim = strtotime($logout_time);
                $mins = $res['lockoutexpirationtime']*$res['lockoutexpirationtype'];
                $expiretime = TimeDate::getInstance()->fromDb($logout_time)->modify("+$mins minutes")->asDb();

				// Test if the user is still locked out and return a error message
			    if (TimeDate::getInstance()->nowDb() < $expiretime){
			    	$usr->setPreference('lockout','1');
			        $_SESSION['login_error']=$mod_strings['LBL_LOGIN_ATTEMPTS_OVERRUN'];
			        $_SESSION['waiting_error']=$mod_strings['LBL_LOGIN_LOGIN_TIME_ALLOWED'].' ';
			        $lol= strtotime($expiretime)-strtotime(TimeDate::getInstance()->nowDb());
					        switch (true) {
				    case (floor($lol/86400) !=0):
				        $_SESSION['waiting_error'].=floor($lol/86400).$mod_strings['LBL_LOGIN_LOGIN_TIME_DAYS'];
				        break;
				    case (floor($lol/3600)!=0):
				        $_SESSION['waiting_error'].=floor($lol/3600).$mod_strings['LBL_LOGIN_LOGIN_TIME_HOURS'];
				        break;
				    case (floor($lol/60)!=0):
				        $_SESSION['waiting_error'].=floor($lol/60).$mod_strings['LBL_LOGIN_LOGIN_TIME_MINUTES'];
				        break;
			        case (floor($lol)!=0):
				        $_SESSION['waiting_error'].=floor($lol).$mod_strings['LBL_LOGIN_LOGIN_TIME_SECONDS'];
				        break;
					}
					$usr->savePreferencesToDB();
					return false;
			    }
			    else{
			    	$usr->setPreference('lockout','');
			        $usr->setPreference('loginfailed','0');
			        $usr->setPreference('logout_time','');
			        $usr->savePreferencesToDB();
			    }
		    }
		    else{
		    	$usr->setPreference('lockout','1');
			    $_SESSION['login_error']=$mod_strings['LBL_LOGIN_ATTEMPTS_OVERRUN'];
		        $_SESSION['waiting_error']=$mod_strings['LBL_LOGIN_ADMIN_CALL'];
		        $usr->savePreferencesToDB();
		        return false;
			}
		}
		if ($this->userAuthenticate->loadUserOnLogin($username, $password, $fallback, $PARAMS)) {
			require_once('modules/Users/password_utils.php');
			if(hasPasswordExpired($username)) {
				$_SESSION['hasExpiredPassword'] = '1';
			}
			// now that user is authenticated, reset loginfailed
			if ($usr->getPreference('loginfailed') != '' && $usr->getPreference('loginfailed') != 0) {
				$usr->setPreference('loginfailed','0');
				$usr->savePreferencesToDB();
			}
			return $this->postLoginAuthenticate();

		}
		else
		{
			if(!empty($usr_id) && $res['lockoutexpiration'] > 0){
				if (($logout=$usr->getPreference('loginfailed'))=='')
	        		$usr->setPreference('loginfailed','1');
	    		else
	        		$usr->setPreference('loginfailed',$logout+1);
	    		$usr->savePreferencesToDB();
    		}
		}
		if(strtolower(get_class($this)) != 'sugarauthenticate'){
			$sa = new SugarAuthenticate();
			$error = (!empty($_SESSION['login_error']))?$_SESSION['login_error']:'';
			if($sa->loginAuthenticate($username, $password, true, $PARAMS)){
				return true;
			}
			$_SESSION['login_error'] = $error;
		}


		$_SESSION['login_user_name'] = $username;
		$_SESSION['login_password'] = $password;
		if(empty($_SESSION['login_error'])){
			$_SESSION['login_error'] = translate('ERR_INVALID_PASSWORD', 'Users');
		}

		return false;

	}

	/**
	 * Once a user is authenticated on login this function will be called. Populate the session with what is needed and log anything that needs to be logged
	 *
	 */
	function postLoginAuthenticate(){

		global $reset_theme_on_default_user, $reset_language_on_default_user, $sugar_config;
		//THIS SECTION IS TO ENSURE VERSIONS ARE UPTODATE

		require_once ('modules/Versions/CheckVersions.php');
		$invalid_versions = get_invalid_versions();
		if (!empty ($invalid_versions)) {
			if (isset ($invalid_versions['Rebuild Relationships'])) {
				unset ($invalid_versions['Rebuild Relationships']);

				// flag for pickup in DisplayWarnings.php
				$_SESSION['rebuild_relationships'] = true;
			}

			if (isset ($invalid_versions['Rebuild Extensions'])) {
				unset ($invalid_versions['Rebuild Extensions']);

				// flag for pickup in DisplayWarnings.php
				$_SESSION['rebuild_extensions'] = true;
			}

			$_SESSION['invalid_versions'] = $invalid_versions;
		}


		//just do a little house cleaning here
		unset($_SESSION['login_password']);
		unset($_SESSION['login_error']);
		unset($_SESSION['login_user_name']);
		unset($_SESSION['ACL']);

		//set the server unique key
		if (isset ($sugar_config['unique_key']))$_SESSION['unique_key'] = $sugar_config['unique_key'];

		//set user language
		if (isset ($reset_language_on_default_user) && $reset_language_on_default_user && $GLOBALS['current_user']->user_name == $sugar_config['default_user_name']) {
			$authenticated_user_language = $sugar_config['default_language'];
		} else {
			$authenticated_user_language = isset($_REQUEST['login_language']) ? $_REQUEST['login_language'] : (isset ($_REQUEST['ck_login_language_20']) ? $_REQUEST['ck_login_language_20'] : $sugar_config['default_language']);
		}

		$_SESSION['authenticated_user_language'] = $authenticated_user_language;

		$GLOBALS['log']->debug("authenticated_user_language is $authenticated_user_language");

		// Clear all uploaded import files for this user if it exists
        require_once('modules/Import/ImportCacheFiles.php');
        $tmp_file_name = ImportCacheFiles::getImportDir()."/IMPORT_" . $GLOBALS['current_user']->id;

		if (file_exists($tmp_file_name)) {
			unlink($tmp_file_name);
		}

		return true;
	}

	/**
	 * On every page hit this will be called to ensure a user is authenticated
	 * @return boolean
	 */
	function sessionAuthenticate(){

		global $module, $action, $allowed_actions;
		$authenticated = false;
		$allowed_actions = array ("Authenticate", "Login"); // these are actions where the user/server keys aren't compared
		if (isset ($_SESSION['authenticated_user_id'])) {

			$GLOBALS['log']->debug("We have an authenticated user id: ".$_SESSION["authenticated_user_id"]);

			$authenticated = $this->postSessionAuthenticate();

		} else
		if (isset ($action) && isset ($module) && $action == "Authenticate" && $module == "Users") {
			$GLOBALS['log']->debug("We are authenticating user now");
		} else {
			$GLOBALS['log']->debug("The current user does not have a session.  Going to the login page");
			$action = "Login";
			$module = "Users";
			$_REQUEST['action'] = $action;
			$_REQUEST['module'] = $module;
		}
		if (empty ($GLOBALS['current_user']->id) && !in_array($action, $allowed_actions)) {

			$GLOBALS['log']->debug("The current user is not logged in going to login page");
			$action = "Login";
			$module = "Users";
			$_REQUEST['action'] = $action;
			$_REQUEST['module'] = $module;

		}

		if($authenticated && ((empty($_REQUEST['module']) || empty($_REQUEST['action'])) || ($_REQUEST['module'] != 'Users' || $_REQUEST['action'] != 'Logout'))){
			$this->validateIP();
		}
		return $authenticated;
	}




	/**
	 * Called after a session is authenticated - if this returns false the sessionAuthenticate will return false and destroy the session
	 * and it will load the  current user
	 * @return boolean
	 */

	function postSessionAuthenticate(){

		global $action, $allowed_actions, $sugar_config;
		$_SESSION['userTime']['last'] = time();
		$user_unique_key = (isset ($_SESSION['unique_key'])) ? $_SESSION['unique_key'] : '';
		$server_unique_key = (isset ($sugar_config['unique_key'])) ? $sugar_config['unique_key'] : '';

		//CHECK IF USER IS CROSSING SITES
		if (($user_unique_key != $server_unique_key) && (!in_array($action, $allowed_actions)) && (!isset ($_SESSION['login_error']))) {

			$GLOBALS['log']->debug('Destroying Session User has crossed Sites');
		    session_destroy();
			header("Location: index.php?action=Login&module=Users".$GLOBALS['app']->getLoginRedirect());
			sugar_cleanup(true);
		}
		if (!$this->userAuthenticate->loadUserOnSession($_SESSION['authenticated_user_id'])) {
			session_destroy();
			header("Location: index.php?action=Login&module=Users&loginErrorMessage=LBL_SESSION_EXPIRED");
			$GLOBALS['log']->debug('Current user session does not exist redirecting to login');
			sugar_cleanup(true);
		}
		$GLOBALS['log']->debug('Current user is: '.$GLOBALS['current_user']->user_name);
		return true;
	}

	/**
	 * Make sure a user isn't stealing sessions so check the ip to ensure that the ip address hasn't dramatically changed
	 *
	 */
	function validateIP() {
		global $sugar_config;
		// grab client ip address
		$clientIP = query_client_ip();
		$classCheck = 0;
		// check to see if config entry is present, if not, verify client ip
		if (!isset ($sugar_config['verify_client_ip']) || $sugar_config['verify_client_ip'] == true) {
			// check to see if we've got a current ip address in $_SESSION
			// and check to see if the session has been hijacked by a foreign ip
			if (isset ($_SESSION["ipaddress"])) {
				$session_parts = explode(".", $_SESSION["ipaddress"]);
				$client_parts = explode(".", $clientIP);
                if(count($session_parts) < 4) {
                    $classCheck = 0;
                }
                else {
    				// match class C IP addresses
    				for ($i = 0; $i < 3; $i ++) {
    					if ($session_parts[$i] == $client_parts[$i]) {
    						$classCheck = 1;
    						continue;
    					} else {
    						$classCheck = 0;
    						break;
    					}
    				}
                }
				// we have a different IP address
				if ($_SESSION["ipaddress"] != $clientIP && empty ($classCheck)) {
					$GLOBALS['log']->fatal("IP Address mismatch: SESSION IP: {$_SESSION['ipaddress']} CLIENT IP: {$clientIP}");
					session_destroy();
					die("Your session was terminated due to a significant change in your IP address.  <a href=\"{$sugar_config['site_url']}\">Return to Home</a>");
				}
			} else {
				$_SESSION["ipaddress"] = $clientIP;
			}
		}

	}




	/**
	 * Called when a user requests to logout
	 *
	 */
	function logout(){
			session_destroy();
			ob_clean();
			header('Location: index.php?module=Users&action=Login');
			sugar_cleanup(true);
	}


	/**
	 * Encodes a users password. This is a static function and can be called at any time.
	 *
	 * @param STRING $password
	 * @return STRING $encoded_password
	 */
	function encodePassword($password){
		return strtolower(md5($password));
	}

	/**
	 * If a user may change there password through the Sugar UI
	 *
	 */
	function canChangePassword(){
		return true;
	}
	/**
	 * If a user may change there user name through the Sugar UI
	 *
	 */
	function canChangeUserName(){
		return true;
	}


    /**
     * pre_login
     *
     * This function allows the SugarAuthenticate subclasses to perform some pre login initialization as needed
     */
    function pre_login()
    {
    }

}

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

require_once('service/v4/SugarWebServiceUtilv4.php');

class SugarWebServiceUtilv4_1 extends SugarWebServiceUtilv4
{
    /**
   	 * Validate the provided session information is correct and current.  Load the session.
   	 *
   	 * @param String $session_id -- The session ID that was returned by a call to login.
   	 * @return true -- If the session is valid and loaded.
   	 * @return false -- if the session is not valid.
   	 */
   	function validate_authenticated($session_id)
    {
   		$GLOBALS['log']->info('Begin: SoapHelperWebServices->validate_authenticated');
   		if(!empty($session_id)){

   			// only initialize session once in case this method is called multiple times
   			if(!session_id()) {
   			   session_id($session_id);
   			   session_start();
   			}

   			if(!empty($_SESSION['is_valid_session']) && $this->is_valid_ip_address('ip_address') && $_SESSION['type'] == 'user'){

   				global $current_user;
   				require_once('modules/Users/User.php');
   				$current_user = new User();
   				$current_user->retrieve($_SESSION['user_id']);
   				$this->login_success();
   				$GLOBALS['log']->info('Begin: SoapHelperWebServices->validate_authenticated - passed');
   				$GLOBALS['log']->info('End: SoapHelperWebServices->validate_authenticated');
   				return true;
   			}

   			$GLOBALS['log']->debug("calling destroy");
   			session_destroy();
   		}
   		LogicHook::initialize();
   		$GLOBALS['logic_hook']->call_custom_logic('Users', 'login_failed');
   		$GLOBALS['log']->info('End: SoapHelperWebServices->validate_authenticated - validation failed');
   		return false;
   	}


    function check_modules_access($user, $module_name, $action='write'){
        if(!isset($_SESSION['avail_modules'])){
            $_SESSION['avail_modules'] = get_user_module_list($user);
        }
        if(isset($_SESSION['avail_modules'][$module_name])){
            if($action == 'write' && $_SESSION['avail_modules'][$module_name] == 'read_only'){
                if(is_admin($user))return true;
                return false;
            }elseif($action == 'write' && strcmp(strtolower($module_name), 'users') == 0 && !$user->isAdminForModule($module_name)){
                //rrs bug: 46000 - If the client is trying to write to the Users module and is not an admin then we need to stop them
                return false;
            }
            return true;
        }
        return false;

    }


}
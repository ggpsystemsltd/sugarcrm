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
require_once("include/OutboundEmail/OutboundEmail.php");

class UsersController extends SugarController
{
	protected function action_login()
	{
		if (isset($_REQUEST['mobile']) && $_REQUEST['mobile'] == 1) {
			$_SESSION['isMobile'] = true;
			$this->view = 'wirelesslogin';
		} 
		else{
			$this->view = 'login';
		}
	}
	
	protected function action_default() 
	{
		if (isset($_REQUEST['mobile']) && $_REQUEST['mobile'] == 1){
			$_SESSION['isMobile'] = true;
			$this->view = 'wirelesslogin';
		} 
		else{
			$this->view = 'classic';
		}
	}
	/**
	 * bug 48170
	 * Action resetPreferences gets fired when user clicks on  'Reset User Preferences' button
	 * This action is set in UserViewHelper.php
	 */
	protected function action_resetPreferences(){
	    if($_REQUEST['record'] == $GLOBALS['current_user']->id || ($GLOBALS['current_user']->isAdminForModule('Users'))){
	        $u = new User();
	        $u->retrieve($_REQUEST['record']);
	        $u->resetPreferences();
	        if($u->id == $GLOBALS['current_user']->id) {
	            SugarApplication::redirect('index.php');
	        }
	        else{
	            SugarApplication::redirect("index.php?module=Users&record=".$_REQUEST['record']."&action=DetailView"); //bug 48170]
	
	        }
	    }
	}  
	protected function action_delete()
	{
	    if($_REQUEST['record'] != $GLOBALS['current_user']->id && ($GLOBALS['current_user']->isAdminForModule('Users')
            ))
        {
            $u = new User();
            $u->retrieve($_REQUEST['record']);
            $u->status = 'Inactive';
            $u->deleted = 1;
            $u->employee_status = 'Terminated';
            $u->save();
            $GLOBALS['log']->info("User id: {$GLOBALS['current_user']->id} deleted user record: {$_REQUEST['record']}");

            $eapm = loadBean('EAPM');
            $eapm->delete_user_accounts($_REQUEST['record']);
            $GLOBALS['log']->info("Removing user's External Accounts");
            
            if($u->portal_only == '0'){
                SugarApplication::redirect("index.php?module=Users&action=reassignUserRecords&record={$u->id}");
            }
            else{
                SugarApplication::redirect("index.php?module=Users&action=index");
            }
        }
        else 
            sugar_die("Unauthorized access to administration.");
	}
	/**
	 * Clear the reassign user records session variables. 
	 *
	 */
	protected function action_clearreassignrecords()
	{
        if( $GLOBALS['current_user']->isAdminForModule('Users'))
            unset($_SESSION['reassignRecords']);
        else
	       sugar_die("You cannot access this page.");
	}

	protected function action_wirelessmain() 
	{
		$this->view = 'wirelessmain';
	}
	protected function action_wizard() 
	{
		$this->view = 'wizard';
	}

	protected function action_saveuserwizard() 
	{
	    global $current_user, $sugar_config;
	    
	    // set all of these default parameters since the Users save action will undo the defaults otherwise
	    $_POST['record'] = $current_user->id;
	    $_POST['is_admin'] = ( $current_user->is_admin ? 'on' : '' );
	    $_POST['use_real_names'] = true;
	    $_POST['should_remind'] = '1';
	    $_POST['reminder_time'] = 1800;
        $_POST['mailmerge_on'] = 'on';
        $_POST['receive_notifications'] = $current_user->receive_notifications;
        $_POST['user_theme'] = (string) SugarThemeRegistry::getDefault();
	    
	    // save and redirect to new view
	    $_REQUEST['return_module'] = 'Home';
	    $_REQUEST['return_action'] = 'index';
		require('modules/Users/Save.php');
	}
}	
?>

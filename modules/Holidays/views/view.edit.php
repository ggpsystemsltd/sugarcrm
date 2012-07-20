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


class HolidaysViewEdit extends ViewEdit 
{
    /**
	 * @see SugarView::display()
	 */
	public function display() 
	{
		global $beanFiles, $mod_strings;
		
		// the user admin (MLA) cannot edit any administrator holidays
		global $current_user;
		if(isset($_REQUEST['record'])){
	 		$result = $GLOBALS['db']->query("SELECT is_admin FROM users WHERE id=(SELECT person_id FROM holidays WHERE id='$_REQUEST[record]')");
			$row = $GLOBALS['db']->fetchByAssoc($result);
			if(!is_admin($current_user)&& $current_user->isAdminForModule('Users')&& $row['is_admin']==1){
				sugar_die('Unauthorized access');
			}
		}
		
		$this->ev->process();

		if ($_REQUEST['return_module'] == 'Project'){
			
        	$projectBean = new Project();
        	
        	$projectBean->retrieve($_REQUEST['return_id']);
        	
        	$userBean = new User();
        	$contactBean = new Contact();
        	
        	$projectBean->load_relationship("user_resources");
        	$userResources = $projectBean->user_resources->getBeans($userBean);
        	$projectBean->load_relationship("contact_resources");
        	$contactResources = $projectBean->contact_resources->getBeans($contactBean);
        	       	
			ksort($userResources);
			ksort($contactResources);	
						
			$this->ss->assign("PROJECT", true);
			$this->ss->assign("USER_RESOURCES", $userResources);
			$this->ss->assign("CONTACT_RESOURCES", $contactResources);
			
			$this->ss->assign("MOD", $mod_strings);
			
			$holiday_js = "<script type='text/javascript'>\n";
			$holiday_js .= $projectBean->resourceSelectJS();
			$holiday_js .= "\n</script>";

			echo $holiday_js;
        }
		
 		echo $this->ev->display();
 	}
}
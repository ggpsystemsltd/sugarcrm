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

require_once('modules/ACLActions/actiondefs.php');
require_once('modules/ACL/ACLJSController.php');
class ACLController {


	function checkAccess($category, $action, $is_owner=false, $type='module'){

		global $current_user;
		if(is_admin($current_user))return true;
		//calendar is a special case since it has 3 modules in it (calls, meetings, tasks)

		if($category == 'Calendar'){
			return ACLAction::userHasAccess($current_user->id, 'Calls', $action,$type, $is_owner) || ACLAction::userHasAccess($current_user->id, 'Meetings', $action,'module', $is_owner) || ACLAction::userHasAccess($current_user->id, 'Tasks', $action,'module', $is_owner);
		}
		if($category == 'Activities'){
			return ACLAction::userHasAccess($current_user->id, 'Calls', $action,$type, $is_owner) || ACLAction::userHasAccess($current_user->id, 'Meetings', $action,'module', $is_owner) || ACLAction::userHasAccess($current_user->id, 'Tasks', $action,'module', $is_owner)|| ACLAction::userHasAccess($current_user->id, 'Emails', $action,'module', $is_owner)|| ACLAction::userHasAccess($current_user->id, 'Notes', $action,'module', $is_owner);
		}
		return ACLAction::userHasAccess($current_user->id, $category, $action,$type, $is_owner);
	}

	function requireOwner($category, $value, $type='module'){
			global $current_user;
			if(is_admin($current_user))return false;
			return ACLAction::userNeedsOwnership($current_user->id, $category, $value,$type);
	}

	function filterModuleList(&$moduleList, $by_value=true){

		global $aclModuleList, $current_user;
		if(is_admin($current_user)) return;
		$actions = ACLAction::getUserActions($current_user->id, false);

		$compList = array();
		if($by_value){
			foreach($moduleList as $key=>$value){
				$compList[$value]= $key;
			}
		}else{
			$compList =& $moduleList;
		}
		foreach($actions as $action_name=>$action){

			if(!empty($action['module'])){
				$aclModuleList[$action_name] = $action_name;
				if(isset($compList[$action_name])){
					if($action['module']['access']['aclaccess'] < ACL_ALLOW_ENABLED){
						if($by_value){
							unset($moduleList[$compList[$action_name]]);
						}else{
							unset($moduleList[$action_name]);
						}
					}
				}
			}
		}
		if(isset($compList['Calendar']) &&
			!( ACLController::checkModuleAllowed('Calls', $actions) || ACLController::checkModuleAllowed('Meetings', $actions) || ACLController::checkModuleAllowed('Tasks', $actions)))
	    {
			if($by_value){
				unset($moduleList[$compList['Calendar']]);
			}else{
				unset($moduleList['Calendar']);
			}
			if(isset($compList['Activities']) &&
				!( ACLController::checkModuleAllowed('Notes', $actions) || ACLController::checkModuleAllowed('Notes', $actions))){
				if($by_value){
					unset($moduleList[$compList['Activities']]);
				}else{
					unset($moduleList['Activities']);
				}
			}
		}

	}

	/**
	 * Check to see if the module is available for this user.
	 *
	 * @param String $module_name
	 * @return true if they are allowed.  false otherwise.
	 */
	function checkModuleAllowed($module_name, $actions)
	{
	    if(!empty($actions[$module_name]['module']['access']['aclaccess']) &&
			ACL_ALLOW_ENABLED == $actions[$module_name]['module']['access']['aclaccess'])
		{
			return true;
		}

		return false;
	}

	function disabledModuleList($moduleList, $by_value=true,$view='list'){
		global $aclModuleList, $current_user;
		if(is_admin($GLOBALS['current_user'])) return array();
		$actions = ACLAction::getUserActions($current_user->id, false);
		$disabled = array();
		$compList = array();

		if($by_value){
			foreach($moduleList as $key=>$value){
				$compList[$value]= $key;
			}
		}else{
			$compList =& $moduleList;
		}
		if(isset($moduleList['ProductTemplates'])){
			$moduleList['Products'] ='Products';
		}

		foreach($actions as $action_name=>$action){

			if(!empty($action['module'])){
				$aclModuleList[$action_name] = $action_name;
				if(isset($compList[$action_name])){
					if($action['module']['access']['aclaccess'] < ACL_ALLOW_ENABLED || $action['module'][$view]['aclaccess'] < 0){
						if($by_value){
							$disabled[$compList[$action_name]] =$compList[$action_name] ;
						}else{
							$disabled[$action_name] = $action_name;
						}
					}
				}
			}
		}
		if(isset($compList['Calendar'])  && !( ACL_ALLOW_ENABLED == $actions['Calls']['module']['access']['aclaccess'] || ACL_ALLOW_ENABLED == $actions['Meetings']['module']['access']['aclaccess'] || ACL_ALLOW_ENABLED == $actions['Tasks']['module']['access']['aclaccess'])){
			if($by_value){
							$disabled[$compList['Calendar']]  = $compList['Calendar'];
			}else{
							$disabled['Calendar']  = 'Calendar';
			}
			if(isset($compList['Activities'])  &&!( ACL_ALLOW_ENABLED == $actions['Notes']['module']['access']['aclaccess'] || ACL_ALLOW_ENABLED == $actions['Notes']['module']['access']['aclaccess'] )){
				if($by_value){
							$disabled[$compList['Activities']]  = $compList['Activities'];
				}else{
							$disabled['Activities']  = 'Activities';
				}
			}
		}
		if(isset($disabled['Products'])){
			$disabled['ProductTemplates'] = 'ProductTemplates';
		}


		return $disabled;

	}



	function addJavascript($category,$form_name='', $is_owner=false){
		$jscontroller = new ACLJSController($category, $form_name, $is_owner);
		echo $jscontroller->getJavascript();
	}

	function moduleSupportsACL($module){
		static $checkModules = array();
		global $beanFiles, $beanList;
		if(isset($checkModules[$module])){
			return $checkModules[$module];
		}
		if(!isset($beanList[$module])){
			$checkModules[$module] = false;

		}else{
			$class = $beanList[$module];
			require_once($beanFiles[$class]);
			$mod = new $class();
			if(!is_subclass_of($mod, 'SugarBean')){
				$checkModules[$module] = false;
			}else{
				$checkModules[$module] = $mod->bean_implements('ACL');
			}
		}
		return $checkModules[$module] ;

	}

	function displayNoAccess($redirect_home = false){
		echo '<script>function set_focus(){}</script><p class="error">' . translate('LBL_NO_ACCESS', 'ACL') . '</p>';
		if($redirect_home)echo translate('LBL_REDIRECT_TO_HOME', 'ACL') . ' <span id="seconds_left">3</span> ' . translate('LBL_SECONDS', 'ACL') . '<script> function redirect_countdown(left){document.getElementById("seconds_left").innerHTML = left; if(left == 0){document.location.href = "index.php";}else{left--; setTimeout("redirect_countdown("+ left+")", 1000)}};setTimeout("redirect_countdown(3)", 1000)</script>';
	}

}









?>

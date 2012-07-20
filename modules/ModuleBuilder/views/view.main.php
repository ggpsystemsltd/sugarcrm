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


class ViewMain extends SugarView
{ 	
 	function ViewMain(){
		$this->options['show_footer'] = false;
 		parent::SugarView();
 	}
 	
 	/**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   translate('LBL_MODULE_NAME','Administration'),
    	   ModuleBuilderController::getModuleTitle(),
    	   );
    }
    
 	function display()
 	{
		global $app_strings, $current_user, $mod_strings, $theme;

 		$smarty = new Sugar_Smarty();
 		$type = (!empty($_REQUEST['type']))?$_REQUEST['type']:'main';
 		$mbt = false;
 		$admin = false;
 		$mb = strtolower($type);
 		$smarty->assign('TYPE', $type);
 		$smarty->assign('app_strings', $app_strings);
 		$smarty->assign('mod', $mod_strings);
 		//Replaced by javascript function "setMode"
 		switch($type){
 			case 'studio':
 				//$smarty->assign('ONLOAD','ModuleBuilder.getContent("module=ModuleBuilder&action=wizard")');
 				require_once('modules/ModuleBuilder/Module/StudioTree.php');
				$mbt = new StudioTree();
				break;
 			case 'mb':
 				//$smarty->assign('ONLOAD','ModuleBuilder.getContent("module=ModuleBuilder&action=package&package=")');
 				require_once('modules/ModuleBuilder/MB/MBPackageTree.php');
				$mbt = new MBPackageTree();
				break;
 			case 'dropdowns':
 			   // $admin = is_admin($current_user);
 			    require_once('modules/ModuleBuilder/Module/DropDownTree.php');
 			    $mbt = new DropDownTree();
 			    break;
 			default:
 				//$smarty->assign('ONLOAD','ModuleBuilder.getContent("module=ModuleBuilder&action=home")');	
				require_once('modules/ModuleBuilder/Module/MainTree.php');
				$mbt = new MainTree();
 		}
 		$smarty->assign('TEST_STUDIO', displayStudioForCurrentUser());
 		$smarty->assign('ADMIN', is_admin($current_user));
 		$smarty->display('modules/ModuleBuilder/tpls/includes.tpl');
		if($mbt)
		{
			$smarty->assign('TREE',$mbt->fetch());
			$smarty->assign('TREElabel', $mbt->getName());
		}
		$userPref = $current_user->getPreference('mb_assist', 'Assistant');
		if(!$userPref) $userPref="na"; 
		$smarty->assign('userPref',$userPref);
		
		///////////////////////////////////
	    require_once('include/SugarTinyMCE.php');
	    $tiny = new SugarTinyMCE();
	    $tiny->defaultConfig['width']=300;
	    $tiny->defaultConfig['height']=300;
	    $tiny->buttonConfig = "code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,
	                         justifyfull,separator,forecolor,backcolor,
	                         ";
	    $tiny->buttonConfig2 = "pastetext,pasteword,fontselect,fontsizeselect,";
	    $tiny->buttonConfig3 = "";
	    $ed = $tiny->getInstance();
	    $smarty->assign("tiny", $ed);
		
		$smarty->display('modules/ModuleBuilder/tpls/index.tpl');
		
 	}
}
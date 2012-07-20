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

/*
 * Created on Aug 6, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

require_once('modules/ModuleBuilder/MB/AjaxCompose.php');

class ViewModulelabels extends SugarView
{
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
 		global $mod_strings;
        $bak_mod_strings=$mod_strings;
 		$smarty = new Sugar_Smarty();
        $smarty->assign('mod_strings', $mod_strings);
 		$package_name = $_REQUEST['view_package'];
 		$module_name = $_REQUEST['view_module'];

		require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
		$mb = new ModuleBuilder();
		$mb->getPackage($_REQUEST['view_package']);
		$package = $mb->packages[$_REQUEST['view_package']];
		$package->getModule($module_name);
		$mbModule = $package->modules[$module_name];
		$selected_lang = (!empty($_REQUEST['selected_lang'])?$_REQUEST['selected_lang']:$_SESSION['authenticated_user_language']);
		if(empty($selected_lang)){
	    	$selected_lang = $GLOBALS['sugar_config']['default_language'];
		}
	        //need to change the following to interface with MBlanguage.

        $smarty->assign('MOD', $mbModule->getModStrings($selected_lang));
		$smarty->assign('APP', $GLOBALS['app_strings']);
		$smarty->assign('selected_lang', $selected_lang);
		$smarty->assign('view_package', $package_name);
		$smarty->assign('view_module', $module_name);
		$smarty->assign('mb','1');
		$smarty->assign('available_languages', get_languages());
		///////////////////////////////////////////////////////////////////
 		////ASSISTANT
 		$smarty->assign('assistant',array('group'=>'module', 'key'=>'labels'));
		/////////////////////////////////////////////////////////////////
	 	////ASSISTANT

		$ajax = new AjaxCompose();
		$ajax->addCrumb($bak_mod_strings['LBL_MODULEBUILDER'], 'ModuleBuilder.main("mb")');
		$ajax->addCrumb($package_name, 'ModuleBuilder.getContent("module=ModuleBuilder&action=package&package='.$package->name. '")');
        $ajax->addCrumb($module_name, 'ModuleBuilder.getContent("module=ModuleBuilder&action=module&view_package='.$package->name.'&view_module='. $module_name . '")');
        $ajax->addCrumb($bak_mod_strings['LBL_LABELS'], '');
		$ajax->addSection('center', $bak_mod_strings['LBL_LABELS'],$smarty->fetch('modules/ModuleBuilder/tpls/labels.tpl'));
		echo $ajax->getJavascript();
	}
}


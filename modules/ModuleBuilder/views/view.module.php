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

require_once('modules/ModuleBuilder/MB/AjaxCompose.php');

class ViewModule extends SugarView
{
	var $mbModule;
	
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
 		$smarty = new Sugar_Smarty();

		require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
		$mb = new ModuleBuilder();
		$mb->getPackage($_REQUEST['view_package']);
		$package = $mb->packages[$_REQUEST['view_package']];
		$module_name = (!empty($_REQUEST['view_module']))?$_REQUEST['view_module']:'';
		$package->getModule($module_name);
		$this->mbModule = $package->modules[$module_name];
		$this->loadPackageHelp($module_name);
		
		// set up the list of either available types for a new module, or implemented types for an existing one
        $types = (empty($module_name)) ? MBModule::getTypes() : $this->mbModule->mbvardefs->templates ;
        
        foreach( $types as $type=>$definition)
        {
            $translated_type[$type]=translate('LBL_TYPE_'.strtoupper($type),'ModuleBuilder');
        }
        natcasesort($translated_type);
        $smarty->assign('types',$translated_type);
		
		$smarty->assign('package', $package);
		$smarty->assign('module', $this->mbModule);
		$smarty->assign('mod_strings', $mod_strings);

		$ajax = new AjaxCompose();
		$ajax->addCrumb($GLOBALS['mod_strings']['LBL_MODULEBUILDER'], 'ModuleBuilder.main("mb")');
		$ajax->addCrumb(' '. $package->name,'ModuleBuilder.getContent("module=ModuleBuilder&action=package&package='.$package->name.'")');
		if(empty($module_name))$module_name = translate('LBL_NEW_MODULE', 'ModuleBuilder');
		$ajax->addCrumb($module_name, '');
		$html=$smarty->fetch('modules/ModuleBuilder/tpls/MBModule/module.tpl');
		if(!empty($_REQUEST['action']) && $_REQUEST['action']=='SaveModule')
			$html .="<script>ModuleBuilder.treeRefresh('ModuleBuilder')</script>";
		$ajax->addSection('center', translate('LBL_SECTION_MODULE', 'ModuleBuilder'), $html);
		
		echo $ajax->getJavascript();
 	}
 	
 	function loadPackageHelp(
 	    $name
 	    )
 	{
        $this->mbModule->help['default'] = (empty($name))?'create':'modify';
        $this->mbModule->help['group'] = 'module';
 	}
}
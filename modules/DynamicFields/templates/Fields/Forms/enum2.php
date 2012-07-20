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
 * Created on Jul 18, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 function get_body(&$ss, $vardef){
 	$multi = false;
 	if (isset ($vardef['type']) && $vardef['type'] == 'multienum')
 		$multi = true;
 		
 	$selected_options = "";
 	if ($multi && !empty($vardef['default'])) {
 		$selected_options = unencodeMultienum( $vardef['default']);
 	} else if (isset($vardef['default'])){
 		$selected_options = $vardef['default'];
 	}

    $edit_mod_strings = return_module_language($GLOBALS['current_language'], 'EditCustomFields');

	if(!empty($_REQUEST['type']) && $_REQUEST['type'] == 'radioenum'){
		$edit_mod_strings['LBL_DROP_DOWN_LIST'] = $edit_mod_strings['LBL_RADIO_FIELDS'];
	}
	$package_strings = array();
	if(!empty($_REQUEST['view_package'])){
		$view_package = $_REQUEST['view_package'];
		if($view_package != 'studio') {
			require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
			$mb = new ModuleBuilder();
			$module =& $mb->getPackageModule($view_package, $_REQUEST['view_module']);
			$lang = $GLOBALS['current_language'];
			//require_once($package->getPackageDir()."/include/language/$lang.lang.php");
			$module->mblanguage->generateAppStrings(false);
			$package_strings = $module->mblanguage->appListStrings[$lang.'.lang.php'];
		}
	}
	
	global $app_list_strings;
	$my_list_strings = $app_list_strings;
	$my_list_strings = array_merge($my_list_strings, $package_strings);
	foreach($my_list_strings as $key=>$value){
		if(!is_array($value)){
			unset($my_list_strings[$key]);
		}
	}
	$dropdowns = array_keys($my_list_strings);
	sort($dropdowns);
    $default_dropdowns = array();
    if(!empty($vardef['options']) && !empty($my_list_strings[$vardef['options']])){
    		$default_dropdowns = $my_list_strings[$vardef['options']];
    }else{
    	//since we do not have a default value then we should assign the first one.
    	$key = $dropdowns[0];
    	$default_dropdowns = $my_list_strings[$key];
    }
    
    $selected_dropdown = '';
    if(!empty($vardef['options'])){
    	$selected_dropdown = $vardef['options'];

    }
    $show = true;
	if(!empty($_REQUEST['refresh_dropdown']))
		$show = false;

	$ss->assign('dropdowns', $dropdowns);
	$ss->assign('default_dropdowns', $default_dropdowns);
	$ss->assign('selected_dropdown', $selected_dropdown);
	$ss->assign('show', $show);
	$ss->assign('selected_options', $selected_options);
	$ss->assign('multi', isset($multi) ? $multi: false);
	$ss->assign('dropdown_name',(!empty($vardef['options']) ? $vardef['options'] : ''));

	require_once('include/JSON.php');
	$json = new JSON(JSON_LOOSE_TYPE);
	$ss->assign('app_list_strings', "''");
	return $ss->fetch('modules/DynamicFields/templates/Fields/Forms/enum.tpl');
 }
?>

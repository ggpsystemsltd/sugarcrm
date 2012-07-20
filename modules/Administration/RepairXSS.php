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

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/

include("include/modules.php"); // provides $moduleList, $beanList, etc.

///////////////////////////////////////////////////////////////////////////////
////	UTILITIES
/**
 * Cleans all SugarBean tables of XSS - no asynchronous calls.  May take a LONG time to complete.
 * Meant to be called from a Scheduler instance or other timed or other automation.
 */
function cleanAllBeans() {
	
}
////	END UTILITIES
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
////	PAGE OUTPUT
if(isset($runSilent) && $runSilent == true) {
	// if called from Scheduler
	cleanAllBeans();
} else {
	$hide = array('Activities', 'Home', 'iFrames', 'Calendar', 'Dashboard');

	sort($moduleList);
	$options = array();
	$options[] = $app_strings['LBL_NONE'];
	$options['all'] = "--{$app_strings['LBL_TABGROUP_ALL']}--";
	
	foreach($moduleList as $module) {
		if(!in_array($module, $hide)) {
			$options[$module] = $module;
		}
	}
	
	$options = get_select_options_with_id($options, '');
	$beanDropDown = "<select onchange='SUGAR.Administration.RepairXSS.refreshEstimate(this);' id='repairXssDropdown'>{$options}</select>";
	
	echo getClassicModuleTitle('Administration', array($mod_strings['LBL_REPAIRXSS_TITLE']), false);
	echo "<script>var done = '{$mod_strings['LBL_DONE']}';</script>";
	
	$smarty = new Sugar_Smarty(); 
	$smarty->assign("mod", $mod_strings);
	$smarty->assign("beanDropDown", $beanDropDown);
	$smarty->display("modules/Administration/templates/RepairXSS.tpl");
} // end else
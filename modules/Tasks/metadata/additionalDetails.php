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

 
function additionalDetailsTask($fields) {
	static $mod_strings;
	global $app_list_strings;
	if(empty($mod_strings)) {
		global $current_language;
		$mod_strings = return_module_language($current_language, 'Tasks');
	}
		
	$overlib_string = '';
    if(!empty($fields['DATE_START'])) $overlib_string .= '<b>'. $mod_strings['LBL_START_DATE_AND_TIME'] . '</b> ' . $fields['DATE_START'] .  '<br>';
	if(!empty($fields['DATE_DUE'])) $overlib_string .= '<b>'. $mod_strings['LBL_DUE_DATE_AND_TIME'] . '</b> ' . $fields['DATE_DUE'] .  '<br>';
	if(!empty($fields['PRIORITY'])) $overlib_string .= '<b>'. $mod_strings['LBL_PRIORITY'] . '</b> ' . 
$app_list_strings['task_priority_dom'][$fields['PRIORITY']] . '<br>';
	if(!empty($fields['STATUS'])) $overlib_string .= '<b>'. $mod_strings['LBL_STATUS'] . '</b> ' . $app_list_strings['task_status_dom'][$fields['STATUS']] . '<br>';
		
	if(!empty($fields['DESCRIPTION'])) { 
		$overlib_string .= '<b>'. $mod_strings['LBL_DESCRIPTION'] . '</b> ' . substr($fields['DESCRIPTION'], 0, 300);
		if(strlen($fields['DESCRIPTION']) > 300) $overlib_string .= '...';
	}	
	
		$editLink = "index.php?action=EditView&module=Tasks&record={$fields['ID']}"; 
	$viewLink = "index.php?action=DetailView&module=Tasks&record={$fields['ID']}";	

	$return_module = empty($_REQUEST['module']) ? 'Tasks' : $_REQUEST['module'];
	$return_action = empty($_REQUEST['action']) ? 'ListView' : $_REQUEST['action'];
	
	$editLink .= "&return_module=$return_module&return_action=$return_action";
	$viewLink .= "&return_module=$return_module&return_action=$return_action";
	
	return array('fieldToAddTo' => 'NAME', 
				 'string' => $overlib_string, 
				 'editLink' => $editLink, 
				 'viewLink' => $viewLink);

}
 
?>
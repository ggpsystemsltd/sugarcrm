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

 


function additionalDetailsBug($fields) {
	static $mod_strings;
	global $app_strings;
	if(empty($mod_strings)) {
		global $current_language;
		$mod_strings = return_module_language($current_language, 'Bugs');
	}
		
	$overlib_string = '';

	if(!empty($fields['DATE_ENTERED'])) 
		$overlib_string .= '<b>'. $app_strings['LBL_DATE_ENTERED'] . '</b> ' . $fields['DATE_ENTERED'] . '<br>';
	if(!empty($fields['SOURCE'])) 
		$overlib_string .= '<b>'. $mod_strings['LBL_SOURCE'] . '</b> ' . $fields['SOURCE'] . '<br>';
	if(!empty($fields['PRODUCT_CATEGORY'])) 
		$overlib_string .= '<b>'. $mod_strings['LBL_PRODUCT_CATEGORY'] . '</b> ' . $fields['PRODUCT_CATEGORY'] . '<br>';
	if(!empty($fields['RESOLUTION'])) 
		$overlib_string .= '<b>'. $mod_strings['LBL_RESOLUTION'] . '</b> ' . $fields['RESOLUTION'] . '<br>';
				
	if(!empty($fields['DESCRIPTION'])) { 
		$overlib_string .= '<b>'. $mod_strings['LBL_DESCRIPTION'] . '</b> ' . substr($fields['DESCRIPTION'], 0, 300);
		if(strlen($fields['DESCRIPTION']) > 300) $overlib_string .= '...';
		$overlib_string .= '<br>';
	}
		
	if(!empty($fields['WORK_LOG'])) {
		$overlib_string .= '<b>'. $mod_strings['LBL_WORK_LOG'] . '</b> ' . substr($fields['WORK_LOG'], 0, 300);
		if(strlen($fields['WORK_LOG']) > 300) $overlib_string .= '...';
	}	

	return array('fieldToAddTo' => 'NAME', 
				 'string' => $overlib_string, 
				 'editLink' => "index.php?action=EditView&module=Bugs&return_module=Bugs&record={$fields['ID']}", 
				 'viewLink' => "index.php?action=DetailView&module=Bugs&return_module=Bugs&record={$fields['ID']}");

}
 
 ?>
 
 
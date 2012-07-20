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

 

function additionalDetailsEmail($fields) {
	global $current_language;
	$mod_strings = return_module_language($current_language, 'Emails');
	$newLines = array("\r", "\R", "\n", "\N");
		
	$overlib_string = '';
	// From Name
	if(!empty($fields['FROM_NAME'])) {
		$overlib_string .= '<b>' . $mod_strings['LBL_FROM'] . '</b>&nbsp;';
		$overlib_string .= $fields['FROM_NAME'];
	}

	// email text
	if(!empty($fields['DESCRIPTION_HTML'])) {
		if(!empty($overlib_string)) $overlib_string .= '<br>';
		$overlib_string .= '<b>'.$mod_strings['LBL_BODY'].'</b><br>';
		$descH = strip_tags($fields['DESCRIPTION_HTML'], '<a>');
		$desc = str_replace($newLines, ' ', $descH);
		$overlib_string .= substr($desc, 0, 300);
		if(strlen($descH) > 300) $overlib_string .= '...';
	} elseif (!empty($fields['DESCRIPTION'])) {
		if(!empty($overlib_string)) $overlib_string .= '<br>';
		$overlib_string .= '<b>'.$mod_strings['LBL_BODY'].'</b><br>';
		$descH = strip_tags(nl2br($fields['DESCRIPTION']));
		$desc = str_replace($newLines, ' ', $descH);
		$overlib_string .= substr($desc, 0, 300);
		if(strlen($descH) > 300) $overlib_string .= '...';
	}
	
	$editLink = "index.php?action=EditView&module=Emails&record={$fields['ID']}"; 
	$viewLink = "index.php?action=DetailView&module=Emails&record={$fields['ID']}";	

	$return_module = empty($_REQUEST['module']) ? 'Meetings' : $_REQUEST['module'];
	$return_action = empty($_REQUEST['action']) ? 'ListView' : $_REQUEST['action'];
	$type = empty($_REQUEST['type']) ? '' : $_REQUEST['type'];
	$user_id = empty($_REQUEST['assigned_user_id']) ? '' : $_REQUEST['assigned_user_id'];
	
	$additional_params = "&return_module=$return_module&return_action=$return_action&type=$type&assigned_user_id=$user_id"; 
	
	$editLink .= $additional_params;
	$viewLink .= $additional_params;
	
	return array('fieldToAddTo' => 'NAME', 
				 'string' => $overlib_string, 
				 'editLink' => $editLink, 
				 'viewLink' => $viewLink);
}
 
 ?>
 

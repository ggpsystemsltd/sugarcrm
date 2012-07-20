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

//////////////////////////////////////////////
// TEMPLATE:
//
//////////////////////////////////////////////
global $report_modules;
function template_reports_request_vars_js(&$smarty, &$reporter,&$args) {
	$field_defs = $reporter->focus->field_defs;

	$table_columns = array();
	$hidden_columns = array();


	if (!isset($reporter->report_def['report_type'])) {
		$report_type = 'tabular';
	} else {
		$report_type = $reporter->report_def['report_type'];
	} // else
	$allowed_modules_arr = array();
	global $report_modules;
	foreach($report_modules as $module=>$name) {
		array_push($allowed_modules_arr ,"\"$module\":1");
	} // foreach
	$allowed_modules_js = implode(",",$allowed_modules_arr);
	$smarty->assign('allowed_modules_js', "{".$allowed_modules_js."}");
	$smarty->assign('reporter_report_def_str1', $reporter->report_def_str);
	if (isset($reporter->report_def['goto_anchor'])) {
		$goto_anchor = $reporter->report_def['goto_anchor'];
	} else {
		$goto_anchor = "\"\"";
	} // else
	$smarty->assign('goto_anchor', $goto_anchor);
	$user_array = get_user_array(FALSE);
	$smarty->assign('user_array', $user_array);
} // fn

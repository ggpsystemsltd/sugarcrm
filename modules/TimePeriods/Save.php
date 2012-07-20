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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/



global $current_user;

if (!is_admin($current_user)&& !is_admin_for_module($current_user,'Forecasts')&& !is_admin_for_module($current_user,'ForecastSchedule')) {
    sugar_die("Unauthorized access to administration.");
}

$focus = new TimePeriod();

if ($_POST['isDuplicate'] != 1) {
	$focus->retrieve($_POST['record']);
}

//validate, start_date <= end_Date.
global $timedate;

$start_date = $timedate->to_db_date($_POST['start_date'], false);
$end_date=$timedate->to_db_date($_POST['end_date'], false);

if ($end_date >= $start_date) {
	//defult checbox value to 0;
	$focus->is_fiscal_year=0;
	
	foreach ($focus->column_fields as $field) {
		if (isset($_POST[$field])) {
			
			if ($field == "is_fiscal_year" && $_POST[$field] == "on") {
					$value=1;
			} else {
				$value = $_POST[$field];
			}
			$focus->$field = $value;
		}
	}
	$focus->save();
	$return_id = $focus->id;
		
	$return_module = (!empty($_POST['return_module'])) ? $_POST['return_module'] : "TimePeriods";
	$return_action = (!empty($_POST['return_action'])) ? $_POST['return_action'] : "DetailView";
	
	$GLOBALS['log']->debug("Saved record with id of {$return_id}");
	
	header("Location: index.php?action={$return_action}&module={$return_module}&record={$return_id}");	
	}
else {
	header("Location: index.php?action=Error&module=TimePeriods&error_string=ERR_TIME_PERIOD_DATE_RANGE");
}

?>

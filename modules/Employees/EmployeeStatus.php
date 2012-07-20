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

 ********************************************************************************/

/**
 * EmployeeStatus.php
 * This is a helper file used by the meta-data framework
 * @see modules/Users/vardefs.php (employee_status)
 * @author Collin Lee
 */

function getEmployeeStatusOptions($focus, $name = 'employee_status', $value, $view = 'DetailView') {

	
	global $current_user, $app_list_strings;
    if(($view == 'EditView' || $view == 'MassUpdate') && is_admin($current_user)) {
	   
	   	$employee_status  = "<select name='$name'";
		if(!empty($sugar_config['default_user_name']) 
			&& $sugar_config['default_user_name'] == $focus->user_name 
			&& isset($sugar_config['lock_default_user_name']) 
			&& $sugar_config['lock_default_user_name'])
		    {
				$employee_status .= " disabled ";
			}
			$employee_status .= ">";
			$employee_status .= get_select_options_with_id($app_list_strings['employee_status_dom'], $focus->employee_status);
			$employee_status .= "</select>\n";
			return $employee_status;
	 }
	   	
	 if ( isset($app_list_strings['employee_status_dom'][$focus->employee_status]) )
	 {
        return $app_list_strings['employee_status_dom'][$focus->employee_status];
	 }
	  
	 return $focus->employee_status;
		
}

function getMessengerTypeOptions($focus, $name = 'messenger_type', $value, $view = 'DetailView') {
   global $current_user, $app_list_strings;
   if($view == 'EditView' || $view == 'MassUpdate') {
   	  $messenger_type = "<select name=\"$name\">";
      $messenger_type .= get_select_options_with_id($app_list_strings['messenger_type_dom'], $focus->messenger_type);
      $messenger_type .= '</select>';
   	  return $messenger_type;
   } 
   
   return $app_list_strings['messenger_type_dom'][$focus->messenger_type];
}

?>

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






class SugarWidgetSubPanelTopSummaryButton extends SugarWidgetSubPanelTopButton
{
	function display($widget_data)
	{
		
		
		global $app_strings;
		global $currentModule;

		$popup_request_data = array(
			'call_back_function' => 'set_return',
			'form_name' => 'EditView',
			'field_to_name_array' => array(),
		);

		$json_encoded_php_array = $this->_create_json_encoded_popup_request($popup_request_data);
		$title = $app_strings['LBL_ACCUMULATED_HISTORY_BUTTON_TITLE'];
		//$accesskey = $app_strings['LBL_ACCUMULATED_HISTORY_BUTTON_KEY'];
		$value = $app_strings['LBL_ACCUMULATED_HISTORY_BUTTON_LABEL'];
		$module_name = 'Activities';
		$id = $widget_data['focus']->id;
		$initial_filter = "&record=$id&module_name=$currentModule";
		if(ACLController::moduleSupportsACL($widget_data['module']) && !ACLController::checkAccess($widget_data['module'], 'detail', true)){
			$temp =  '<input disabled type="button" name="summary_button" id="summary_button"'
			. ' class="button"'
			. ' title="' . $title . '"'
			. ' value="' . $value . '"';
			return $temp;
		}
		return '<input type="button" name="summary_button" id="summary_button"'
			. ' class="button"'
			. ' title="' . $title . '"'
			. ' value="' . $value . '"'
			. " onclick='open_popup(\"$module_name\",600,400,\"$initial_filter\",false,false,$json_encoded_php_array);' />\n";
	}
}
?>
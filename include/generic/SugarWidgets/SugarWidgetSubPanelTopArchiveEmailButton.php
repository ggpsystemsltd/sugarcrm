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






class SugarWidgetSubPanelTopArchiveEmailButton extends SugarWidgetSubPanelTopButton
{
	function display($defines)
	{
		if(ACLController::moduleSupportsACL($defines['module'])  && !ACLController::checkAccess($defines['module'], 'edit', true)){
			$temp = '';
			return $temp;
		}
		global $app_strings;
		global $mod_strings;
		global $currentModule;

		$title = $app_strings['LBL_TRACK_EMAIL_BUTTON_TITLE'];
		//$accesskey = $app_strings['LBL_TRACK_EMAIL_BUTTON_KEY'];
		$value = $app_strings['LBL_TRACK_EMAIL_BUTTON_LABEL'];
		$this->module = 'Emails';

		$additionalFormFields = array();
		$additionalFormFields['type'] = 'archived';
		// cn: bug 5727 - must override the parents' parent for contacts (which could be an Account)
		$additionalFormFields['parent_type'] = $defines['focus']->module_dir; 
		$additionalFormFields['parent_id'] = $defines['focus']->id;
		$additionalFormFields['parent_name'] = $defines['focus']->name;

		if(isset($defines['focus']->email1))
		{
			$additionalFormFields['to_email_addrs'] = $defines['focus']->email1;
		}
		if(ACLController::moduleSupportsACL($defines['module'])  && !ACLController::checkAccess($defines['module'], 'edit', true)){
			$button = "<input id='".preg_replace('[ ]', '', $value)."_button'  title='$title' class='button' type='button' name='".preg_replace('[ ]', '', strtolower($value))."_button' value='  $value  ' disabled/>\n";
			return $button;
		}
		$button = $this->_get_form($defines, $additionalFormFields);
		$button .= "<input id='".preg_replace('[ ]', '', $value)."_button' title='$title'  class='button' type='submit' name='".preg_replace('[ ]', '', strtolower($value))."_button' value='  $value  '/>\n";
		$button .= "</form>";
		return $button;
	}
}
?>

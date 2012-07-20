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





class SubPanelViewUsers {

	var $teams_list = null;
	var $focus;

	function setFocus(&$value){
		$this->focus = (object) $value;
	}

	function setTeamsList(&$value){
		$this->teams_list = $value;
	}

	function setHideNewButton($value){
		$this->hideNewButton = $value;
	}

	function SubPanelViewUsers() 
    {
	}

	function getHeaderText($action, $currentModule){
		global $app_strings;
		global $current_user;

		$button  = "<form border='0' action='index.php' method='post' name='UsersDetailView' id='UsersDetailView'>\n";
		$button .= "<input type='hidden' name='record' value=''>\n";
		$button .= "<input type='hidden' name='user_id' value='{$_REQUEST['record']}'>\n";
		$button .= "<input type='hidden' name='team_id' value=''>\n";
		$button .= "<input type='hidden' name='module' value='Teams'>\n";
		$button .= "<input type='hidden' name='action' value='AddUserToTeam'>\n";
		$button .= "<input type='hidden' name='return_module' value='Users'>\n";
		$button .= "<input type='hidden' name='return_action' value='".$action."'>\n";
		$button .= "<input type='hidden' name='return_id' value='".$this->focus->id."'>\n";
		if ($current_user->isAdminForModule('Users'))
		{
			///////////////////////////////////////
			///
			/// SETUP PARENT POPUP
			
			$popup_request_data = array(
				'call_back_function' => 'set_return_user_and_save',
				'form_name' => 'UsersDetailView',
				'field_to_name_array' => array(
					'id' => 'record',
//					'id' => 'team_id',
					),
				);
			
			$json = getJSONobj();
			$encoded_popup_request_data = $json->encode($popup_request_data);
			if(isset($widget_data['mode'])){
				$popup_mode=$widget_data['mode'];
			}	else{
				$popup_mode='Single';		
			}
			//
			///////////////////////////////////////
			$button .= "<input title='".$app_strings['LBL_SELECT_BUTTON_TITLE']
				."' type='button' class='button' value='  ".$app_strings['LBL_SELECT_BUTTON_LABEL']
				."  ' name='button' onclick='open_popup(\"Teams\", 600, 400, \"\", true, true, {$encoded_popup_request_data}, \"MultiSelect\");'>\n";
//				."  ' name='button' onclick='window.open(\"index.php?module=Teams&action=Popup&html=Popup_picker&form=UsersDetailView&form_submit=true\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'>\n";
		}
		$button .= "</form>\n";
		return $button;
	}

	function ProcessSubPanelListView($xTemplatePath, &$mod_strings, $action, $curModule = "") {
		global $currentModule,$image_path,$app_strings;
		global $current_user;

		if (empty($curModule)) {
			$curModule = $currentModule;
		}

		$ListView = new ListView();
		$ListView->initNewXTemplate($xTemplatePath, $mod_strings);
		$ListView->xTemplateAssign("RETURN_URL", "&return_module=".$curModule."&return_action=DetailView&return_id=".$this->focus->id);
		$ListView->xTemplateAssign("RECORD_ID",  $this->focus->id);
		$ListView->xTemplateAssign("EDIT_INLINE_PNG",  SugarThemeRegistry::current()->getImage('edit_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_EDIT']));
		$ListView->xTemplateAssign("DELETE_INLINE_PNG",  SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle"  border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']));
		$ListView->setHeaderTitle($mod_strings['LBL_MY_TEAMS']);
		$ListView->setHeaderText($this->getHeaderText($action, $curModule));
		$ListView->processListView($this->teams_list, "teams", "TEAM");
	}
}
?>

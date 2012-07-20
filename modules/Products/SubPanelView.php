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
 ********************************************************************************/





class SubPanelViewProducts {
	
var $products_list = null;
var $hideNewButton = false;
var $hideSelectButton = false;
var $focus;

function setFocus(&$value){
	$this->focus =(object) $value;		
}


function setProductsList(&$value){
	$this->products_list =$value;		
}

function setHideNewButton($value){
	$this->hideNewButton = $value;	
}

function setHideSelectButton($value){
	$this->hideSelectButton = $value;	
}

function SubPanelViewProducts(){
}

function getHeaderText($action, $currentModule){
	global $app_strings;
	global $locale;
	$button  = "<table cellspacing='0' cellpadding='1' border='0'><form border='0' action='index.php' method='post' name='form' id='form'>\n";
	$button .= "<input type='hidden' name='module' value='Products'>\n";
	$button .= "<input type='hidden' name='return_module' value='".$currentModule."'>\n";
	$button .= "<input type='hidden' name='return_action' value='".$action."'>\n";
	$button .= "<input type='hidden' name='return_id' value='".$this->focus->id."'>\n";
	$button .= "<input type='hidden' name='action'>\n";
	$button .= "<tr>";
	if(!$this->hideNewButton){
		if ($currentModule == 'Accounts') {
			$button .= "<input type='hidden' name='account_name' value='".urlencode($this->focus->name)."'>\n";
			$button .= "<input type='hidden' name='account_id' value='".$this->focus->id."'>\n";
		}
		elseif ($currentModule == 'Contacts') {
			$button .= "<input type='hidden' name='account_name' value='".urlencode($this->focus->account_name)."'>\n";
			$button .= "<input type='hidden' name='account_id' value='".$this->focus->account_id."'>\n";
			$button .= "<input type='hidden' name='contact_name' value='".urlencode($locale->getLocaleFormattedName($this->focus->first_name, $this->focus->last_name))."'>\n";
			$button .= "<input type='hidden' name='contact_id' value='".$this->focus->id."'>\n";
		}
		$button .= "<td><input title='".$app_strings['LBL_NEW_BUTTON_TITLE']."' class='button' onclick=\"this.form.action.value='EditView'\" type='submit' name='button' value='  ".$app_strings['LBL_NEW_BUTTON_LABEL']."  '></td>\n";
	}
	if(!$this->hideSelectButton){
		if ($currentModule == 'Accounts')
		{
			// TODO: will this ever get called?  accounts detailview does not have a select button for products subpanel
			$button .= "<td><input title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' accessyKey='".$app_strings['LBL_SELECT_BUTTON_KEY']."' type='button' class='button' value='  ".$app_strings['LBL_SELECT_BUTTON_LABEL']."  ' name='button' LANGUAGE=javascript onclick='window.open(\"index.php?module=Products&action=Popup&html=Popup_picker&form=DetailView&form_submit=true\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'></td>\n";
		}
		else
		{
			///////////////////////////////////////
			///
			/// SETUP PARENT POPUP
			
			$popup_request_data = array(
				'call_back_function' => 'set_return_and_save',
				'form_name' => 'DetailView',
				'field_to_name_array' => array(
					'id' => 'related_product_id',
					),
				);
			
			$json = getJSONobj();
			$encoded_popup_request_data = $json->encode($popup_request_data);
			
			//
			///////////////////////////////////////
			
			$button .= "<td><input title='".$app_strings['LBL_SELECT_BUTTON_TITLE']
				."' accessyKey='".$app_strings['LBL_SELECT_BUTTON_KEY']
				."' type='button' class='button' value='  ".$app_strings['LBL_SELECT_BUTTON_LABEL']
				."  ' name='button' onclick='open_popup(\"Products\", 600, 400, \"&account_id={$this->focus->account_id}&account_name=".urlencode($this->focus->account_name)."\", false, true, {$encoded_popup_request_data});'>\n";
//				."  ' name='button' onclick='window.open(\"index.php?module=Products&action=Popup&html=Popup_picker&form=DetailView&form_submit=true&query=true&account_id=".$this->focus->account_id."&account_name=".urlencode($this->focus->account_name)."\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'></td>\n";
		}
	}

	$button .= "</tr></form></table>\n";
	return $button;
}

function ProcessSubPanelListView($xTemplatePath, &$mod_strings, $action, $curModule='', $title){
	global $currentModule,$app_strings, $current_user;
	if(empty($curModule))
		$curModule = $currentModule;
	$ListView = new ListView();
	$ListView->initNewXTemplate($xTemplatePath,$mod_strings);
	$ListView->xTemplateAssign("RETURN_URL", "&return_module=".$curModule."&return_action=DetailView&return_id=".$this->focus->id);
	$ListView->xTemplateAssign("EDIT_INLINE_PNG",  SugarThemeRegistry::current()->getImage('edit_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_EDIT']));
	$ListView->xTemplateAssign("DELETE_INLINE_PNG",  SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_DELETE']));
	$ListView->xTemplateAssign("REMOVE_INLINE_PNG",  SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle"  border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']));
	$ListView->xTemplateAssign("RECORD_ID",  $this->focus->id);
	$header_text = '';
if((is_admin($current_user)||is_admin_for_module($GLOBALS['current_user'],'Products')) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])){	
		$header_text = "&nbsp;<a href='index.php?action=index&module=DynamicLayout&from_action=SubPanelViewProducts&from_module=Products&record=". $_REQUEST['record']."'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'",null,null,'.gif',$mod_strings['LBL_EDITLAYOUT'])."</a>";
}
	$ListView->setHeaderTitle($title. $header_text);
	$ListView->setHeaderText($this->getHeaderText($action, $curModule));
	$ListView->processListView($this->products_list, "products", "PRODUCT");
}
}

?>
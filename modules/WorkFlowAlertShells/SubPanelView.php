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




require_once('include/JSON.php');

global $app_strings;
//we don't want the parent module's string file, but rather the string file specifc to this subpanel
global $current_language;
global $current_module_strings, $current_module_strings2;
$current_module_strings = return_module_language($current_language, 'WorkFlowAlertShells');
$current_module_strings2 = return_module_language($current_language, 'WorkFlowActionShells');

global $currentModule;
global $focus;
global $action;

// focus_alerts_lists is the means of passing data to a SubPanelView.
global $focus_alerts_list;
global $focus_actions_list;
$the_title = "<table width='100%' cellpadding='0' cellspacing='0' border='0' style='padding-top:3px; margin-bottom: 0px; padding-bottom: 0px; margin-top: 3px;'>\n";
$module = preg_replace("/ /","",$mod_strings['LBL_MODULE_NAME']);
$the_title .= "<tr><td><table width='100%' cellpadding='0' cellspacing='0' border='0' style='padding-top:3px; margin-bottom: 0px; padding-bottom: 0px; margin-top: 3px;'><tr><td valign='top'></td></tr></table></td></tr>";
$the_title .= "<tr><td valign='top'><h3>".$current_module_strings['LBL_MODULE_SECTION_TITLE'].":</h3></td>\n";
$the_title .= "</tr></table>\n";
echo $the_title;

$button  = "<form  action='index.php' method='post' name='form' id='form'>\n";
$button .= "<input type='hidden' name='module' value='WorkFlowAlertShells'>\n";
$button .= "<input type='hidden' name='module_tab' value='WorkFlow'>\n";
$button .= "<input type='hidden' name='workflow_id' value='$focus->id'>\n<input type='hidden' name='alert_name' value='$focus->name'>\n";
$button .= "<input type='hidden' name='return_module' value='".$currentModule."'>\n";
$button .= "<input type='hidden' name='return_action' value='".$action."'>\n";
$button .= "<input type='hidden' name='return_id' value='".$focus->id."'>\n";
$button .= "<input type='hidden' name='action' value='EditView';>\n";
$button .= "<input title='".$app_strings['LBL_NEW_BUTTON_TITLE']."' class='button' type='submit' name='NewWorkFlowAlertShells' id='NewWorkFlowAlertShells' value='  ".$app_strings['LBL_NEW_BUTTON_LABEL']."  '>\n";
$button .= "<input type='button' name='SelectWorkFlowAlertShells' id='SelectWorkFlowAlertShells' class='button' title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' onclick='window.open(\"index.php?module=WorkFlowAlertShells&action=Popup&workflow_id=$focus->id\",\"new\",\"width=400,height=500,resizable=1,scrollbars=1\");'/>";
//$button .= "<input title='".$current_module_strings['LBL_NEW_BUTTON_TITLE_ACTION']."' class='button' type='button' name='New' value='  ".$current_module_strings['LBL_NEW_BUTTON_LABEL_ACTION']."'";
//$button .= "LANGUAGE=javascript onclick='window.open(\"index.php?module=WorkFlowActionShells&action=CreateStep1&html=CreateStep1&form=ComponentView&form_submit=false&query=true&sugar_body_only=true&workflow_id=$focus->id\",\"new\",\"width=400,height=500,resizable=1,scrollbars=1\");'";
//$button .= ">\n";
$button .= "</form>";

	
	$admin = new Administration();
	$admin->retrieveSettings();
	$mail_server = trim($admin->settings['mail_smtpserver']);

	if (empty($mail_server) && !empty($focus_alerts_list)) {
		
		echo "<BR><font color='red'><b>".$mod_strings['LBL_LACK_OF_NOTIFICATIONS_ON']."</b></font><BR>";
	}	


//ALERT SUBPANEL


//$focus_alerts_list2 = array_merge($focus_alerts_list, $focus_actions_list);

$ListView = new ListView();
$header_text = '';

$ListView->initNewXTemplate( 'modules/WorkFlowAlertShells/SubPanelView.html', $current_module_strings);
$ListView->xTemplateAssign("WORKFLOW_ID", $focus->id);
$ListView->xTemplateAssign("RETURN_URL", "&return_module=".$currentModule."&return_action=DetailView&return_id={$_REQUEST['record']}");
$ListView->xTemplateAssign("EDIT_INLINE_PNG",  SugarThemeRegistry::current()->getImage('edit_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_EDIT']));
$ListView->xTemplateAssign("DELETE_INLINE_PNG",  SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']));
$ListView->setHeaderTitle($current_module_strings['LBL_MODULE_NAME_COMBO'] . $header_text);
$ListView->setHeaderText($button);
$ListView->processListView($focus_alerts_list, "main", "ALERT");


?>

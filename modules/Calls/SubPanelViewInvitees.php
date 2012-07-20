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




global $currentModule;
global $theme;
global $focus;
global $action;

global $mod_strings;
global $app_strings;
global $locale;


// focus_list is the means of passing data to a SubPanelView.
global $focus_users_list;
global $focus_contacts_list;

$button  = "<table cellspacing='0' cellpadding='1' border='0'><form border='0' action='index.php' method='post' name='form' id='form'>\n";
$button .= "<input type='hidden' name='module' value='Contacts'>\n";
if ($currentModule == 'Accounts') $button .= "<input type='hidden' name='account_id' value='$focus->id'>\n<input type='hidden' name='account_name' value='$focus->name'>\n";
$button .= "<input type='hidden' name='return_module' value='".$currentModule."'>\n";
$button .= "<input type='hidden' name='return_action' value='".$action."'>\n";
$button .= "<input type='hidden' name='return_id' value='".$focus->id."'>\n";
$button .= "<input type='hidden' name='action'>\n";
$button .= "<tr><td>&nbsp;</td>";
if ($focus->parent_type == "Accounts") $button .= "<td><input title='".$app_strings['LBL_SELECT_CONTACT_BUTTON_TITLE']."' type='button' class='button' value='".$app_strings['LBL_SELECT_CONTACT_BUTTON_LABEL']."' name='button' LANGUAGE=javascript onclick='window.open(\"index.php?module=Contacts&action=Popup&html=Popup_picker&form=DetailView&form_submit=true&query=true&account_id=$focus->parent_id&account_name=".urlencode($focus->parent_name)."\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'></td>\n";
else $button .= "<td><input title='".$app_strings['LBL_SELECT_CONTACT_BUTTON_TITLE']."'  type='button' class='button' value='".$app_strings['LBL_SELECT_CONTACT_BUTTON_LABEL']."' name='button' LANGUAGE=javascript onclick='window.open(\"index.php?module=Contacts&action=Popup&html=Popup_picker&form=DetailView&form_submit=true\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'></td>\n";
$button .= "<td><input title='".$app_strings['LBL_SELECT_USER_BUTTON_TITLE']."'  type='button' class='button' value='".$app_strings['LBL_SELECT_USER_BUTTON_LABEL']."' name='button' LANGUAGE=javascript onclick='window.open(\"index.php?module=Users&action=Popup&html=Popup_picker&form=DetailView&form_submit=true\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'></td>\n";
$button .= "</tr></form></table>\n";

// Stick the form header out there.
echo get_form_header($mod_strings['LBL_INVITEES'], $button, false);
$xtpl=new XTemplate ('modules/Calls/SubPanelViewInvitees.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

$xtpl->assign("RETURN_URL", "&return_module=$currentModule&return_action=DetailView&return_id=$focus->id");
$xtpl->assign("CALL_ID", $focus->id);

$oddRow = true;
foreach($focus_users_list as $user)
{
	$user_fields = array(
		'USER_NAME' => $user->user_name,
		'FULL_NAME' => $locale->getLocaleFormattedName($user->first_name, $user->last_name),
		'ID' => $user->id,
		'EMAIL' => $user->email1,
		'PHONE_WORK' => $user->phone_work
	);

	$xtpl->assign("USER", $user_fields);

	if($oddRow)
    {
        //todo move to themes
		$xtpl->assign("ROW_COLOR", 'oddListRow');
    }
    else
    {
        //todo move to themes
		$xtpl->assign("ROW_COLOR", 'evenListRow');
    }
    $oddRow = !$oddRow;

	$xtpl->parse("users.row");
// Put the rows in.
}

$xtpl->parse("users");
$xtpl->out("users");

$oddRow = true;
foreach($focus_contacts_list as $contact)
{
	$contact_fields = array(
		'FIRST_NAME' => $contact->first_name,
		'LAST_NAME' => $contact->last_name,
		'ACCOUNT_NAME' => $contact->account_name,
		'ID' => $contact->id,
		'EMAIL' => $contact->email1,
		'PHONE_WORK' => $contact->phone_work
	);

	$xtpl->assign("CONTACT", $contact_fields);

	if($oddRow)
    {
        //todo move to themes
		$xtpl->assign("ROW_COLOR", 'oddListRow');
    }
    else
    {
        //todo move to themes
		$xtpl->assign("ROW_COLOR", 'evenListRow');
    }
    $oddRow = !$oddRow;

	$xtpl->parse("contacts.row");
// Put the rows in.
}

$xtpl->parse("contacts");
$xtpl->out("contacts");
?>

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

///////////////////////////////////////////////////////////////////////////////
////	CANCEL HANDLING
if(!isset($_REQUEST['record']) || empty($_REQUEST['record'])) {
	header("Location: index.php?module=Emails&action=index");
}
////	CANCEL HANDLING
///////////////////////////////////////////////////////////////////////////////


require_once('include/DetailView/DetailView.php');
global $gridline;
global $app_strings;
global $focus;

// SETTING DEFAULTS
$focus		= new Email();
$detailView	= new DetailView();
$offset		= 0;
$email_type	= 'archived';

///////////////////////////////////////////////////////////////////////////////
////	TO HANDLE 'NEXT FREE'
if(!empty($_REQUEST['next_free']) && $_REQUEST['next_free'] == true) {
	$_REQUEST['record'] = $focus->getNextFree();
}
////	END 'NEXT FREE'
///////////////////////////////////////////////////////////////////////////////

if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
	$result = $detailView->processSugarBean("EMAIL", $focus, $offset);
	if($result == null) {
	    sugar_die($app_strings['ERROR_NO_RECORD']);
	}
	$focus=$result;
} else {
	header("Location: index.php?module=Emails&action=index");
	die();
}

/* if the Email status is draft, say as a saved draft to a Lead/Case/etc.,
 * don't show detail view. go directly to EditView */
if($focus->status == 'draft') {
	//header('Location: index.php?module=Emails&action=EditView&record='.$_REQUEST['record']);
	//die();
}

// ACL Access Check
if (!$focus->ACLAccess('DetailView')){
	ACLController::displayNoAccess(true);
	sugar_cleanup(true);
}

//needed when creating a new email with default values passed in
if (isset($_REQUEST['contact_name']) && is_null($focus->contact_name)) {
	$focus->contact_name = $_REQUEST['contact_name'];
}
if (isset($_REQUEST['contact_id']) && is_null($focus->contact_id)) {
	$focus->contact_id = $_REQUEST['contact_id'];
}
if (isset($_REQUEST['opportunity_name']) && is_null($focus->parent_name)) {
	$focus->parent_name = $_REQUEST['opportunity_name'];
}
if (isset($_REQUEST['opportunity_id']) && is_null($focus->parent_id)) {
	$focus->parent_id = $_REQUEST['opportunity_id'];
}
if (isset($_REQUEST['account_name']) && is_null($focus->parent_name)) {
	$focus->parent_name = $_REQUEST['account_name'];
}
if (isset($_REQUEST['account_id']) && is_null($focus->parent_id)) {
	$focus->parent_id = $_REQUEST['account_id'];
}

// un/READ flags
if (!empty($focus->status)) {
	// "Read" flag for InboundEmail
	if($focus->status == 'unread') {
		// creating a new instance here to avoid data corruption below
		$e = new Email();
		$e->retrieve($focus->id);
		$e->status = 'read';
		$e->save();
		$email_type = $e->status;
	} else {
		$email_type = $focus->status;
	}

} elseif (!empty($_REQUEST['type'])) {
	$email_type = $_REQUEST['type'];
}


///////////////////////////////////////////////////////////////////////////////
////	OUTPUT
///////////////////////////////////////////////////////////////////////////////
echo "\n<p>\n";
$GLOBALS['log']->info("Email detail view");
if ($email_type == 'archived') {
	echo getClassicModuleTitle('Emails', array($mod_strings['LBL_ARCHIVED_EMAIL'],$focus->name), true);
	$xtpl=new XTemplate ('modules/Emails/DetailView.html');
} else {
	$xtpl=new XTemplate ('modules/Emails/DetailViewSent.html');
	if($focus->type == 'out') {
		echo getClassicModuleTitle('Emails', array($mod_strings['LBL_SENT_MODULE_NAME'],$focus->name), true);
		//$xtpl->assign('DISABLE_REPLY_BUTTON', 'NONE');
	} elseif ($focus->type == 'draft') {
		$xtpl->assign('DISABLE_FORWARD_BUTTON', 'NONE');
		echo getClassicModuleTitle('Emails', array($mod_strings['LBL_LIST_FORM_DRAFTS_TITLE'],$focus->name), true);
	} elseif($focus->type == 'inbound') {
		echo getClassicModuleTitle('Emails', array($mod_strings['LBL_INBOUND_TITLE'],$focus->name), true);
	}
}
echo "\n</p>\n";



///////////////////////////////////////////////////////////////////////////////
////	RETURN NAVIGATION
$uri = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
$start = $focus->getStartPage($uri);
if (isset($_REQUEST['return_id'])) { // coming from a subpanel, return_module|action is not set
	$xtpl->assign('RETURN_ID', $_REQUEST['return_id']);
	if (isset($_REQUEST['return_module']))	$xtpl->assign('RETURN_MODULE', $_REQUEST['return_module']);
	else $xtpl->assign('RETURN_MODULE', 'Emails');
	if (isset($_REQUEST['return_action']))	$xtpl->assign('RETURN_ACTION', $_REQUEST['return_action']);
	else $xtpl->assign('RETURN_ACTION', 'DetailView');
}

if(isset($start['action']) && !empty($start['action'])) {
	$xtpl->assign('DELETE_RETURN_ACTION', $start['action']);
}
if(isset($start['module']) && !empty($start['module'])) {
	$xtpl->assign('DELETE_RETURN_MODULE', $start['module']);
}
if(isset($start['record']) && !empty($start['record'])) {
	$xtpl->assign('DELETE_RETURN_ID', $start['record']);
}
// this is to support returning to My Inbox
if(isset($start['type']) && !empty($start['type'])) {
	$xtpl->assign('DELETE_RETURN_TYPE', $start['type']);
}
if(isset($start['assigned_user_id']) && !empty($start['assigned_user_id'])) {
	$xtpl->assign('DELETE_RETURN_ASSIGNED_USER_ID', $start['assigned_user_id']);
}



////	END RETURN NAVIGATION
///////////////////////////////////////////////////////////////////////////////


// DEFAULT TO TEXT IF NO HTML CONTENT:
$html = trim(from_html($focus->description_html));
if(empty($html)) {
	$xtpl->assign('SHOW_PLAINTEXT', 'true');
} else {
	$xtpl->assign('SHOW_PLAINTEXT', 'false');
}
$show_subpanels=true;
//if the email is of type campaign, process the macros...using the values stored in the relationship table.
//this is is part of the feature that adds support for one email per campaign.
if ($focus->type=='campaign' and !empty($_REQUEST['parent_id']) and !empty($_REQUEST['parent_module'])) {
    $show_subpanels=false;
    $parent_id=$_REQUEST['parent_id'];

	// cn: bug 14300 - emails_beans schema refactor - fixing query
	$query="SELECT * FROM emails_beans WHERE email_id='{$focus->id}' AND bean_id='{$parent_id}' AND bean_module = '{$_REQUEST['parent_module']}' " ;

    $res=$focus->db->query($query);
    $row=$focus->db->fetchByAssoc($res);
    if (!empty($row)) {
        $campaign_data=$row['campaign_data'];
        $macro_values=array();
        if (!empty($campaign_data)) {
            $macro_values=unserialize(from_html($campaign_data));
        }

        if (count($macro_values) > 0) {
            $m_keys=array_keys($macro_values);
            $m_values=array_values($macro_values);

            $focus->name = str_replace($m_keys,$m_values,$focus->name);
            $focus->description = str_replace($m_keys,$m_values,$focus->description);
            $focus->description_html = str_replace($m_keys,$m_values,$focus->description_html);
            if (!empty($macro_values['sugar_to_email_address'])) {
                $focus->to_addrs=$macro_values['sugar_to_email_address'];
            }
        }
    }
}
//if not empty or set to test (from test campaigns)
if (!empty($focus->parent_type) && $focus->parent_type !='test') {
	$xtpl->assign('PARENT_MODULE', $focus->parent_type);
	$xtpl->assign('PARENT_TYPE_UNTRANSLATE', $focus->parent_type);
    $xtpl->assign('PARENT_TYPE', $app_list_strings['record_type_display'][$focus->parent_type] . ':');
}

$to_addr = !empty($focus->to_addrs_names) ? htmlspecialchars($focus->to_addrs_names, ENT_COMPAT, 'UTF-8') : nl2br($focus->to_addrs);
$from_addr = !empty($focus->from_addr_name) ? htmlspecialchars($focus->from_addr_name, ENT_COMPAT, 'UTF-8') : nl2br($focus->from_addr);
$cc_addr = !empty($focus->cc_addrs_names) ? htmlspecialchars($focus->cc_addrs_names, ENT_COMPAT, 'UTF-8') : nl2br($focus->cc_addrs);
$bcc_addr = !empty($focus->bcc_addrs_names) ? htmlspecialchars($focus->bcc_addrs_names, ENT_COMPAT, 'UTF-8') : nl2br($focus->bcc_addrs);

$xtpl->assign('MOD', $mod_strings);
$xtpl->assign('APP', $app_strings);
$xtpl->assign('GRIDLINE', $gridline);
$xtpl->assign('PRINT_URL', 'index.php?'.$GLOBALS['request_string']);
$xtpl->assign('ID', $focus->id);
$xtpl->assign('TYPE', $email_type);
$xtpl->assign('PARENT_NAME', $focus->parent_name);
$xtpl->assign('PARENT_ID', $focus->parent_id);
$xtpl->assign('NAME', $focus->name);
$xtpl->assign('ASSIGNED_TO', $focus->assigned_user_name);
$xtpl->assign('DATE_MODIFIED', $focus->date_modified);
$xtpl->assign('DATE_ENTERED', $focus->date_entered);
$xtpl->assign('DATE_START', $focus->date_start);
$xtpl->assign('TIME_START', $focus->time_start);
$xtpl->assign('FROM', $from_addr);
$xtpl->assign('TO', $to_addr);
$xtpl->assign('CC', $cc_addr);
$xtpl->assign('BCC', $bcc_addr);
$xtpl->assign('CREATED_BY', $focus->created_by_name);
$xtpl->assign('MODIFIED_BY', $focus->modified_by_name);
$xtpl->assign('DATE_SENT', $focus->date_entered);
$xtpl->assign('EMAIL_NAME', 'RE: '.$focus->name);
$xtpl->assign("TAG", $focus->listviewACLHelper());
if(!empty($focus->raw_source)) {
	$xtpl->assign("RAW_METADATA", $focus->id);
} else {
	$xtpl->assign("DISABLE_RAW_BUTTON", 'none');
}

if(!empty($focus->reply_to_email)) {
	$replyTo = "
		<tr>
        <td class=\"tabDetailViewDL\"><slot>".$mod_strings['LBL_REPLY_TO_NAME']."</slot></td>
        <td colspan=3 class=\"tabDetailViewDF\"><slot>".$focus->reply_to_email."</slot></td>
        </tr>";
 	$xtpl->assign("REPLY_TO", $replyTo);
}

///////////////////////////////////////////////////////////////////////////////
////	JAVASCRIPT VARS
$jsVars  = '';
$jsVars .= "var showRaw = '{$mod_strings['LBL_BUTTON_RAW_LABEL']}';";
$jsVars .= "var hideRaw = '{$mod_strings['LBL_BUTTON_RAW_LABEL_HIDE']}';";
$xtpl->assign("JS_VARS", $jsVars);


// ADMIN EDIT
if(is_admin($GLOBALS['current_user']) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])){
	$xtpl->assign("ADMIN_EDIT","<a href='index.php?action=index&module=DynamicLayout&from_action=".$_REQUEST['action'] ."&from_module=".$_REQUEST['module'] ."&record=".$_REQUEST['record']. "'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'",null,null,'.gif',$mod_strings['LBL_EDIT_LAYOUT'])."</a>");
}

if(isset($_REQUEST['offset']) && !empty($_REQUEST['offset'])) { $offset = $_REQUEST['offset']; }
else $offset = 1;
$detailView->processListNavigation($xtpl, "EMAIL", $offset, false);



// adding custom fields:
require_once('modules/DynamicFields/templates/Files/DetailView.php');
$do_open = true;
require_once('modules/Teams/TeamSetManager.php');
$xtpl->assign("TEAM", TeamSetManager::getCommaDelimitedTeams($focus->team_set_id, $focus->team_id, true));
$xtpl->parse("main.pro");
$do_open = false;
if ($do_open) {
	$xtpl->parse("main.open_source");
}

///////////////////////////////////////////////////////////////////////////////
////	NOTES (attachements, etc.)
///////////////////////////////////////////////////////////////////////////////

$note = new Note();
$where = "notes.parent_id='{$focus->id}'";
//take in account if this is from campaign and the template id is stored in the macros.

if(isset($macro_values) && isset($macro_values['email_template_id'])){
    $where = "notes.parent_id='{$macro_values['email_template_id']}'";
}
$notes_list = $note->get_full_list("notes.name", $where, true);

if(! isset($notes_list)) {
	$notes_list = array();
}

$attachments = '';
for($i=0; $i<count($notes_list); $i++) {
	$the_note = $notes_list[$i];
	if(!empty($the_note->filename))
    	$attachments .= "<a href=\"index.php?entryPoint=download&id=".$the_note->id."&type=Notes\">".$the_note->name."</a><br />";
    $focus->cid2Link($the_note->id, $the_note->file_mime_type);
}

$xtpl->assign('DESCRIPTION', nl2br($focus->description));
$xtpl->assign('DESCRIPTION_HTML', from_html($focus->description_html));
$xtpl->assign("ATTACHMENTS", $attachments);
$xtpl->parse("main");
$xtpl->out("main");

$sub_xtpl = $xtpl;
$old_contents = ob_get_contents();
ob_end_clean();
ob_start();
echo $old_contents;

///////////////////////////////////////////////////////////////////////////////
////    SUBPANELS
///////////////////////////////////////////////////////////////////////////////
if ($show_subpanels) {
    require_once('include/SubPanel/SubPanelTiles.php');
    $subpanel = new SubPanelTiles($focus, 'Emails');
    echo $subpanel->display();
}
?>
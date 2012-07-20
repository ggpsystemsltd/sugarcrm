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


$GLOBALS['log']->info("Email edit view");

require_once('include/SugarTinyMCE.php');




global $theme;
global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $sugar_version, $sugar_config;
global $timedate;

///////////////////////////////////////////////////////////////////////////////
////	PREPROCESS BEAN DATA FOR DISPLAY
$focus = new Email();
$email_type = 'archived';

if(isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
}
if(!empty($_REQUEST['type'])) {
	$email_type = $_REQUEST['type'];
} elseif(!empty($focus->id)) {
	$email_type = $focus->type;
}

$focus->type = $email_type;

//needed when creating a new email with default values passed in
if(isset($_REQUEST['contact_name']) && is_null($focus->contact_name)) {
	$focus->contact_name = $_REQUEST['contact_name'];
}

if(!empty($_REQUEST['load_id']) && !empty($beanList[$_REQUEST['load_module']])) {
	$class_name = $beanList[$_REQUEST['load_module']];
	require_once($beanFiles[$class_name]);
	$contact = new $class_name();
	if($contact->retrieve($_REQUEST['load_id'])) {
    	$link_id = $class_name . '_id';
    	$focus->$link_id = $_REQUEST['load_id'];
    	$focus->contact_name = (isset($contact->full_name)) ? $contact->full_name : $contact->name;
    	$focus->to_addrs_names = $focus->contact_name;
    	$focus->to_addrs_ids = $_REQUEST['load_id'];
        //Retrieve the email address.
        //If Opportunity or Case then Oppurtinity/Case->Accounts->(email_addr_bean_rel->email_addresses)
        //If Contacts, Leads etc.. then Contact->(email_addr_bean_rel->email_addresses)
    	$sugarEmailAddress = new SugarEmailAddress();
    	if($class_name == 'Opportunity' || $class_name == 'aCase'){
    		$account = new Account();
    		if($contact->account_id != null && $account->retrieve($contact->account_id)){
    			$sugarEmailAddress->handleLegacyRetrieve($account);
    		    if(isset($account->email1)){
	    			$focus->to_addrs_emails = $account->email1;
	    			$focus->to_addrs = "$focus->contact_name <$account->email1>";
    		    }
    		}
    	}
    	else{
    		$sugarEmailAddress->handleLegacyRetrieve($contact);
    		if(isset($contact->email1)){
	    		$focus->to_addrs_emails = $contact->email1;
	    		$focus->to_addrs = "$focus->contact_name <$contact->email1>";
    		}
	    }
    	if(!empty($_REQUEST['parent_type']) && empty($app_list_strings['record_type_display'][$_REQUEST['parent_type']])){
    		if(!empty($app_list_strings['record_type_display'][$_REQUEST['load_module']])){
    			$_REQUEST['parent_type'] = $_REQUEST['load_module'];
    			$_REQUEST['parent_id'] = $focus->contact_id;
    			$_REQUEST['parent_name'] = $focus->to_addrs_names;
    		} else {
    			unset($_REQUEST['parent_type']);
    			unset($_REQUEST['parent_id']);
    			unset($_REQUEST['parent_name']);
    		}
    	}
	}
}
if(isset($_REQUEST['contact_id']) && is_null($focus->contact_id)) {
	$focus->contact_id = $_REQUEST['contact_id'];
}
if(isset($_REQUEST['parent_name'])) {
  $focus->parent_name = $_REQUEST['parent_name'];
}
if(isset($_REQUEST['parent_id'])) {
	$focus->parent_id = $_REQUEST['parent_id'];
}
if(isset($_REQUEST['parent_type'])) {
	$focus->parent_type = $_REQUEST['parent_type'];
}
elseif(is_null($focus->parent_type)) {
	$focus->parent_type = $app_list_strings['record_type_default_key'];
}
if(isset($_REQUEST['to_email_addrs'])) {
	$focus->to_addrs = $_REQUEST['to_email_addrs'];
}
// needed when clicking through a Contacts detail view:
if(isset($_REQUEST['to_addrs_ids'])) {
	$focus->to_addrs_ids = $_REQUEST['to_addrs_ids'];
}
if(isset($_REQUEST['to_addrs_emails'])) {
	$focus->to_addrs_emails = $_REQUEST['to_addrs_emails'];
}
if(isset($_REQUEST['to_addrs_names'])) {
	$focus->to_addrs_names = $_REQUEST['to_addrs_names'];
}
// user's email, go through 3 levels of precedence:
$from = $current_user->getEmailInfo();
////	END PREPROCESSING
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
////	XTEMPLATE ASSIGNMENT
if($email_type == 'archived') {
	echo getClassicModuleTitle('Emails', array($mod_strings['LBL_ARCHIVED_MODULE_NAME']), true);
	$xtpl=new XTemplate('modules/Emails/EditViewArchive.html');
} else {

	if(empty($_REQUEST['parent_module'])) {
		$parent_module = "Emails";
	} else {
		$parent_module = $_REQUEST['parent_module'];
	}
	if(empty($_REQUEST['parent_id'])) {
		$parent_id = "";
	} else {
		$parent_id = $_REQUEST['parent_id'];
	}
	if(empty($_REQUEST['return_module'])) {
		$return_module = "Emails";
	} else {
		$return_module = $_REQUEST['return_module'];
	}
	if(empty($_REQUEST['return_module'])) {
		$return_id = "";
	} else {
		$return_id = $_REQUEST['return_module'];
	}
	$replyType = "reply";
	if ($_REQUEST['type'] == 'forward') {
		$replyType = 'forward';
	} // if
	header("Location: index.php?module=Emails&action=Compose&record=$focus->id&replyForward=true&reply=$replyType");
	return;
}
echo "\n</p>\n";

// CHECK USER'S EMAIL SETTINGS TO ENABLE/DISABLE 'SEND' BUTTON
if(!$focus->check_email_settings() &&($email_type == 'out' || $email_type == 'draft')) {
	print "<font color='red'>".$mod_strings['WARNING_SETTINGS_NOT_CONF']." <a href='index.php?module=Users&action=EditView&record=".$current_user->id."&return_module=Emails&type=out&return_action=EditView'>".$mod_strings['LBL_EDIT_MY_SETTINGS']."</a></font>";
	$xtpl->assign("DISABLE_SEND", 'DISABLED');
}

// CHECK THAT SERVER HAS A PLACE TO PUT UPLOADED TEMP FILES SO THAT ATTACHMENTS WILL WORK
// cn: Bug 5995
$tmpUploadDir = ini_get('upload_tmp_dir');
if(!empty($tmpUploadDir)) {
	if(!is_writable($tmpUploadDir)) {
		echo "<font color='red'>{$mod_strings['WARNING_UPLOAD_DIR_NOT_WRITABLE']}</font>";
	}
} else {
	//echo "<font color='red'>{$mod_strings['WARNING_NO_UPLOAD_DIR']}</font>";
}


///////////////////////////////////////////////////////////////////////////////
////	INBOUND EMAIL HANDLING
if(isset($_REQUEST['email_name'])) {
	$name = str_replace('_',' ',$_REQUEST['email_name']);
}
if(isset($_REQUEST['inbound_email_id'])) {
	$ieMail = new Email();
	$ieMail->retrieve($_REQUEST['inbound_email_id']);

	$quoted = '';
	// cn: bug 9725: replies/forwards lose real content
	$quotedHtml = $ieMail->quoteHtmlEmail($ieMail->description_html);

	// plain-text
	$desc		= nl2br(trim($ieMail->description));

	$exDesc = explode('<br />', $desc);
	foreach($exDesc as $k => $line) {
		$quoted .= '> '.trim($line)."\r";
	}

	// prefill empties with the other's contents
	if(empty($quotedHtml) && !empty($quoted)) {
		$quotedHtml = nl2br($quoted);
	}
	if(empty($quoted) && !empty($quotedHtml)) {
		$quoted = strip_tags(br2nl($quotedHtml));
	}

	// forwards have special text
	if($_REQUEST['type'] == 'forward') {
		$header	= $ieMail->getForwardHeader();
		// subject is handled in Subject line handling below
	} else {
		// we have a reply in focus
		$header = $ieMail->getReplyHeader();
	}

	$quoted = br2nl($header.$quoted);
	$quotedHtml = $header.$quotedHtml;


	// if not a forward: it's a reply
	if($_REQUEST['type'] != 'forward') {
		$ieMailName = 'RE: '.$ieMail->name;
	} else {
		$ieMailName = $ieMail->name;
	}

	$focus->id					= null; // nulling this to prevent overwriting a replied email(we're basically doing a "Duplicate" function)
	$focus->to_addrs			= $ieMail->from_addr;
	$focus->description 		= $quoted; // don't know what i was thinking: ''; // this will be filled on save/send
	$focus->description_html	= $quotedHtml; // cn: bug 7357 - htmlentities() breaks FCKEditor
	$focus->parent_type			= $ieMail->parent_type;
	$focus->parent_id			= $ieMail->parent_id;
	$focus->parent_name			= $ieMail->parent_name;
	$focus->name				= $ieMailName;
	$xtpl->assign('INBOUND_EMAIL_ID',$_REQUEST['inbound_email_id']);
	// un/READ flags
	if(!empty($ieMail->status)) {
		// "Read" flag for InboundEmail
		if($ieMail->status == 'unread') {
			// creating a new instance here to avoid data corruption below
			$e = new Email();
			$e->retrieve($ieMail->id);
			$e->status = 'read';
			$e->save();
			$email_type = $e->status;
		}
	}

	///////////////////////////////////////////////////////////////////////////
	////	PRIMARY PARENT LINKING
	if(empty($focus->parent_type) && empty($focus->parent_id)) {
		$focus->fillPrimaryParentFields();
	}
	////	END PRIMARY PARENT LINKING
	///////////////////////////////////////////////////////////////////////////

	// setup for my/mailbox email switcher
	$mbox = $ieMail->getMailboxDefaultEmail();
	$user = $current_user->getPreferredEmail();
	$useGroup = '&nbsp;<input id="use_mbox" name="use_mbox" type="checkbox" CHECKED onClick="switchEmail()" >
				<script type="text/javascript">
				function switchEmail() {
					var mboxName = "'.$mbox['name'].'";
					var mboxAddr = "'.$mbox['email'].'";
					var userName = "'.$user['name'].'";
					var userAddr = "'.$user['email'].'";

					if(document.getElementById("use_mbox").checked) {
						document.getElementById("from_addr_field").value = mboxName + " <" + mboxAddr + ">";
						document.getElementById("from_addr_name").value = mboxName;
						document.getElementById("from_addr_email").value = mboxAddr;
					} else {
						document.getElementById("from_addr_field").value = userName + " <" + userAddr + ">";
						document.getElementById("from_addr_name").value = userName;
						document.getElementById("from_addr_email").value = userAddr;
					}

				}

				</script>';
	$useGroup .= $mod_strings['LBL_USE_MAILBOX_INFO'];

	$xtpl->assign('FROM_ADDR_GROUP', $useGroup);
}
////	END INBOUND EMAIL HANDLING
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	SUBJECT FIELD MANIPULATION
$name = '';
if(!empty($_REQUEST['parent_id']) && !empty($_REQUEST['parent_type'])) {
	$focus->parent_id = $_REQUEST['parent_id'];
	$focus->parent_type = $_REQUEST['parent_type'];
}
if(!empty($focus->parent_id) && !empty($focus->parent_type)) {
	if($focus->parent_type == 'Cases') {

		$myCase = new aCase();
		$myCase->retrieve($focus->parent_id);
		$myCaseMacro = $myCase->getEmailSubjectMacro();
		if(isset($ieMail->name) && !empty($ieMail->name)) { // if replying directly to an InboundEmail
			$oldEmailSubj = $ieMail->name;
		} elseif(isset($_REQUEST['parent_name']) && !empty($_REQUEST['parent_name'])) {
			$oldEmailSubj = $_REQUEST['parent_name'];
		} else {
			$oldEmailSubj = $focus->name; // replying to an email using old subject
		}

		if(!preg_match('/^re:/i', $oldEmailSubj)) {
			$oldEmailSubj = 'RE: '.$oldEmailSubj;
		}
		$focus->name = $oldEmailSubj;

		if(strpos($focus->name, str_replace('%1',$myCase->case_number,$myCaseMacro))) {
			$name = $focus->name;
		} else {
			$name = $focus->name.' '.str_replace('%1',$myCase->case_number,$myCaseMacro);
		}
	} else {
		$name = $focus->name;
	}
} else {
	if(empty($focus->name)) {
		$name = '';
	} else {
		$name = $focus->name;
	}
}
if($email_type == 'forward') {
	$name = 'FW: '.$name;
}
////	END SUBJECT FIELD MANIPULATION
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	GENERAL TEMPLATE ASSIGNMENTS
$xtpl->assign('MOD', $mod_strings);
$xtpl->assign('APP', $app_strings);
$xtpl->assign('THEME', SugarThemeRegistry::current()->__toString());
if(!isset($focus->id)) $xtpl->assign('USER_ID', $current_user->id);
if(!isset($focus->id) && isset($_REQUEST['contact_id'])) $xtpl->assign('CONTACT_ID', $_REQUEST['contact_id']);

if(isset($_REQUEST['return_module']) && !empty($_REQUEST['return_module'])) {
	$xtpl->assign('RETURN_MODULE', $_REQUEST['return_module']);
} else {
	$xtpl->assign('RETURN_MODULE', 'Emails');
}
if(isset($_REQUEST['return_action']) && !empty($_REQUEST['return_action']) && ($_REQUEST['return_action'] != 'SubPanelViewer')) {
	$xtpl->assign('RETURN_ACTION', $_REQUEST['return_action']);
} else {
	$xtpl->assign('RETURN_ACTION', 'DetailView');
}
if(isset($_REQUEST['return_id']) && !empty($_REQUEST['return_id'])) {
	$xtpl->assign('RETURN_ID', $_REQUEST['return_id']);
}
// handle Create $module then Cancel
if(empty($_REQUEST['return_id']) && !isset($_REQUEST['type'])) {
	$xtpl->assign('RETURN_ACTION', 'index');
}

$xtpl->assign('PRINT_URL', 'index.php?'.$GLOBALS['request_string']);


	///////////////////////////////////////////////////////////////////////////////
	////	QUICKSEARCH CODE
	require_once('include/QuickSearchDefaults.php');
	$qsd = QuickSearchDefaults::getQuickSearchDefaults();
	$sqs_objects = array('EditView_parent_name' => $qsd->getQSParent(),
						'EditView_assigned_user_name' => $qsd->getQSUser(),
						);

	require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
	$teamSetField = new SugarFieldTeamset('Teamset');
	$teamSetField->initClassicView($focus->field_defs);
	$sqs_objects = array_merge($sqs_objects, $teamSetField->getClassicViewQS());

	$json = getJSONobj();

	$sqs_objects_encoded = $json->encode($sqs_objects);
	$quicksearch_js = <<<EOQ
		<script type="text/javascript" language="javascript">sqs_objects = $sqs_objects_encoded; var dialog_loaded;
			function parent_typechangeQS() {
				var new_module = document.EditView.parent_type.value;
				var sqsId = 'EditView_parent_name';
				if(new_module == 'Contacts' || new_module == 'Leads' || typeof(disabledModules[new_module]) != 'undefined') {
					sqs_objects[sqsId]['disable'] = true;
					document.getElementById('parent_name').readOnly = true;
				}
				else {
					sqs_objects[sqsId]['disable'] = false;
					document.getElementById('parent_name').readOnly = false;
				}

				sqs_objects[sqsId]['modules'] = new Array(new_module);
				if (typeof(QSFieldsArray[sqsId]) != 'undefined')
                {
                    QSFieldsArray[sqsId].sqs.modules = new Array(new_module);
                }
				enableQS(false);
			}
			parent_typechangeQS();
		</script>
EOQ;
	$xtpl->assign('JAVASCRIPT', get_set_focus_js().$quicksearch_js);
	////	END QUICKSEARCH CODE
	///////////////////////////////////////////////////////////////////////////////

// cn: bug 14191 - duping archive emails overwrites the original
if(!isset($_REQUEST['isDuplicate']) || $_REQUEST['isDuplicate'] != 'true') {
	$xtpl->assign('ID', $focus->id);
}

if(isset($_REQUEST['parent_type']) && !empty($_REQUEST['parent_type']) && isset($_REQUEST['parent_id']) && !empty($_REQUEST['parent_id'])) {
	$xtpl->assign('OBJECT_ID', $_REQUEST['parent_id']);
	$xtpl->assign('OBJECT_TYPE', $_REQUEST['parent_type']);
}
$xtpl->assign('FROM_ADDR', $focus->from_addr);
//// prevent TO: prefill when type is 'forward'
if($email_type != 'forward') {
	$xtpl->assign('TO_ADDRS', $focus->to_addrs);
	$xtpl->assign('TO_ADDRS_IDS', $focus->to_addrs_ids);
	$xtpl->assign('TO_ADDRS_NAMES', $focus->to_addrs_names);
	$xtpl->assign('TO_ADDRS_EMAILS', $focus->to_addrs_emails);
	$xtpl->assign('CC_ADDRS', $focus->cc_addrs);
	$xtpl->assign('CC_ADDRS_IDS', $focus->cc_addrs_ids);
	$xtpl->assign('CC_ADDRS_NAMES', $focus->cc_addrs_names);
	$xtpl->assign('CC_ADDRS_EMAILS', $focus->cc_addrs_emails);
	$xtpl->assign('BCC_ADDRS', $focus->bcc_addrs);
	$xtpl->assign('BCC_ADDRS_IDS', $focus->bcc_addrs_ids);
	$xtpl->assign('BCC_ADDRS_NAMES', $focus->bcc_addrs_names);
	$xtpl->assign('BCC_ADDRS_EMAILS', $focus->bcc_addrs_emails);
}

//$xtpl->assign('FROM_ADDR', $from['name'].' <'.$from['email'].'>');
$xtpl->assign('FROM_ADDR_NAME', $from['name']);
$xtpl->assign('FROM_ADDR_EMAIL', $from['email']);

$xtpl->assign('NAME', from_html($name));
//$xtpl->assign('DESCRIPTION_HTML', from_html($focus->description_html));
$xtpl->assign('DESCRIPTION', $focus->description);
$xtpl->assign('TYPE',$email_type);

// Unimplemented until jscalendar language files are fixed
// $xtpl->assign('CALENDAR_LANG',((empty($cal_codes[$current_language])) ? $cal_codes[$default_language] : $cal_codes[$current_language]));
$xtpl->assign('CALENDAR_LANG', 'en');
$xtpl->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
$xtpl->assign('DATE_START', $focus->date_start);
$xtpl->assign('TIME_FORMAT', '('. $timedate->get_user_time_format().')');
$xtpl->assign('TIME_START', substr($focus->time_start,0,5));
$xtpl->assign('TIME_MERIDIEM', $timedate->AMPMMenu('',$focus->time_start));

$parent_types = $app_list_strings['record_type_display'];
$disabled_parent_types = ACLController::disabledModuleList($parent_types,false, 'list');

foreach($disabled_parent_types as $disabled_parent_type){
	if($disabled_parent_type != $focus->parent_type){
		unset($parent_types[$disabled_parent_type]);
	}
}

$xtpl->assign('TYPE_OPTIONS', get_select_options_with_id($parent_types, $focus->parent_type));
$xtpl->assign('USER_DATEFORMAT', '('. $timedate->get_user_date_format().')');
$xtpl->assign('PARENT_NAME', $focus->parent_name);
$xtpl->assign('PARENT_ID', $focus->parent_id);
if(empty($focus->parent_type)) {
	$xtpl->assign('PARENT_RECORD_TYPE', '');
} else {
	$xtpl->assign('PARENT_RECORD_TYPE', $focus->parent_type);
}

if(is_admin($current_user) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])){
	$record = '';
	if(!empty($_REQUEST['record'])){
		$record = 	$_REQUEST['record'];
	}
	$xtpl->assign('ADMIN_EDIT',"<a href='index.php?action=index&module=DynamicLayout&from_action=".$_REQUEST['action'] ."&from_module=".$_REQUEST['module'] ."&record=".$record. "'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'",null,null,'.gif',$mod_strings['LBL_EDIT_LAYOUT'])."</a>");
}

////	END GENERAL TEMPLATE ASSIGNMENTS
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////
///
/// SETUP PARENT POPUP

$popup_request_data = array(
	'call_back_function' => 'set_return',
	'form_name' => 'EditView',
	'field_to_name_array' => array(
		'id' => 'parent_id',
		'name' => 'parent_name',
		),
	);

$encoded_popup_request_data = $json->encode($popup_request_data);

/// Users Popup
$popup_request_data = array(
	'call_back_function' => 'set_return',
	'form_name' => 'EditView',
	'field_to_name_array' => array(
		'id' => 'assigned_user_id',
		'user_name' => 'assigned_user_name',
		),
	);
$xtpl->assign('encoded_users_popup_request_data', $json->encode($popup_request_data));

$popup_request_data = array(
	'call_back_function' => 'set_return',
	'form_name' => 'EditView',
	'field_to_name_array' => array(
		'id' => 'team_id',
		'name' => 'team_name',
		),
	);
$xtpl->assign('encoded_team_popup_request_data', $json->encode($popup_request_data));

//
///////////////////////////////////////

$change_parent_button = '<input type="button" name="button" tabindex="2" class="button" '
	. 'title="' . $app_strings['LBL_SELECT_BUTTON_TITLE'] . '" '
	. 'value="'	. $app_strings['LBL_SELECT_BUTTON_LABEL'] . '" '
	. "onclick='ValidateParentType();' />\n"
	.'<script>function ValidateParentType() {
        	var parentTypeValue = document.getElementById("parent_type").value;
    		if (trim(parentTypeValue) == ""){
    			alert("' . $mod_strings['LBL_ERROR_SELECT_MODULE'] .'");
    			return false;
    		}
    		open_popup(document.EditView.parent_type.value,600,400,"&tree=ProductsProd",true,false,' .$encoded_popup_request_data.');
		}</script>';

$xtpl->assign("CHANGE_PARENT_BUTTON", $change_parent_button);

$button_attr = '';
if(!ACLController::checkAccess('Contacts', 'list', true)){
	$button_attr = 'disabled="disabled"';
}

$change_to_addrs_button = '<input type="button" name="to_button" tabindex="3" class="button" '
	. 'title="' . $app_strings['LBL_SELECT_BUTTON_TITLE'] . '" '
	. 'value="'	. $mod_strings['LBL_EMAIL_SELECTOR'] . '" '
	. "onclick='button_change_onclick(this);' $button_attr />\n";
$xtpl->assign("CHANGE_TO_ADDRS_BUTTON", $change_to_addrs_button);

$change_cc_addrs_button = '<input type="button" name="cc_button" tabindex="3" class="button" '
	. 'title="' . $app_strings['LBL_SELECT_BUTTON_TITLE'] . '" '
	. 'value="'	. $mod_strings['LBL_EMAIL_SELECTOR'] . '" '
	. "onclick='button_change_onclick(this);' $button_attr />\n";
$xtpl->assign("CHANGE_CC_ADDRS_BUTTON", $change_cc_addrs_button);

$change_bcc_addrs_button = '<input type="button" name="bcc_button" tabindex="3" class="button" '
	. 'title="' . $app_strings['LBL_SELECT_BUTTON_TITLE'] . '" '
	. 'value="'	. $mod_strings['LBL_EMAIL_SELECTOR'] . '" '
	. "onclick='button_change_onclick(this);' $button_attr />\n";
$xtpl->assign("CHANGE_BCC_ADDRS_BUTTON", $change_bcc_addrs_button);


///////////////////////////////////////
////	USER ASSIGNMENT
global $current_user;
if(is_admin($current_user) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])) {
	$record = '';
	if(!empty($_REQUEST['record'])) {
		$record = $_REQUEST['record'];
	}
	$xtpl->assign('ADMIN_EDIT',"<a href='index.php?action=index&module=DynamicLayout&from_action=".$_REQUEST['action'] ."&from_module=".$_REQUEST['module'] ."&record=".$record. "'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'",null,null,'.gif',$mod_strings['LBL_EDIT_LAYOUT'])."</a>");
}

if(empty($focus->assigned_user_id) && empty($focus->id))
	$focus->assigned_user_id = $current_user->id;
if(empty($focus->assigned_name) && empty($focus->id))
	$focus->assigned_user_name = $current_user->user_name;
$xtpl->assign('ASSIGNED_USER_OPTIONS', get_select_options_with_id(get_user_array(TRUE, 'Active', $focus->assigned_user_id), $focus->assigned_user_id));
$xtpl->assign('ASSIGNED_USER_NAME', $focus->assigned_user_name);
$xtpl->assign('ASSIGNED_USER_ID', $focus->assigned_user_id);
$xtpl->assign('DURATION_HOURS', $focus->duration_hours);
$xtpl->assign('TYPE_OPTIONS', get_select_options_with_id($parent_types, $focus->parent_type));

if(isset($focus->duration_minutes)) {
	$xtpl->assign('DURATION_MINUTES_OPTIONS', get_select_options_with_id($focus->minutes_values,$focus->duration_minutes));
}
////	END USER ASSIGNMENT
///////////////////////////////////////



//Add Custom Fields
require_once('modules/DynamicFields/templates/Files/EditView.php');


///////////////////////////////////////
////	ATTACHMENTS
$attachments = '';
if(!empty($focus->id) || (!empty($_REQUEST['record']) && $_REQUEST['type'] == 'forward')) {

	$attachments = "<input type='hidden' name='removeAttachment' id='removeAttachment' value=''>\n";
	$ids = '';

	$focusId = empty($focus->id) ? $_REQUEST['record'] : $focus->id;
	$note = new Note();
	$where = "notes.parent_id='{$focusId}' AND notes.filename IS NOT NULL";
	$notes_list = $note->get_full_list("", $where,true);

	if(!isset($notes_list)) {
		$notes_list = array();
	}
	for($i = 0;$i < count($notes_list);$i++) {
		$the_note = $notes_list[$i];
		if(empty($the_note->filename)) {
			continue;
		}

		// cn: bug 8034 - attachments from forwards/replies lost when saving drafts
		if(!empty($ids)) {
			$ids .= ",";
		}
		$ids .= $the_note->id;

		$attachments .= "
			<div id='noteDiv{$the_note->id}'>
				" . SugarThemeRegistry::current()->getImage('delete_inline', "onclick='deletePriorAttachment(\"{$the_note->id}\");' value='{$the_note->id}'", null, null, ".gif", $mod_strings['LBL_DELETE_INLINE']) . "&nbsp;";
		$attachments .= "<a href=\"index.php?entryPoint=download&id=".$the_note->id."&type=Notes\">".$the_note->name."</a><div />";
		//$attachments .= '<a href="'.UploadFile::get_url($the_note->filename,$the_note->id).'&entryPoint=download&type=Notes' . '" target="_blank">'. $the_note->filename .'</a></div>';

	}
	// cn: bug 8034 - attachments from forwards/replies lost when saving drafts
	$attachments .= "<input type='hidden' name='prior_attachments' value='{$ids}'>";

    // workaround $mod_strings being overriden by Note object instantiation above.
	global $current_language, $mod_strings;
    $mod_strings = return_module_language($current_language, 'Emails');
}

$attJs  = '<script type="text/javascript">';
$attJs .= 'var lnk_remove = "'.$app_strings['LNK_REMOVE'].'";';
$attJs .= '</script>';
$xtpl->assign('ATTACHMENTS', $attachments);
$xtpl->assign('ATTACHMENTS_JAVASCRIPT', $attJs);
////	END ATTACHMENTS
///////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	DOCUMENTS
$popup_request_data = array(
	'call_back_function' => 'document_set_return',
	'form_name' => 'EditView',
	'field_to_name_array' => array(
		'id' => 'related_doc_id',
		'document_name' => 'related_document_name',
		),
	);
$json = getJSONobj();
$xtpl->assign('encoded_document_popup_request_data', $json->encode($popup_request_data));
////	END DOCUMENTS
///////////////////////////////////////////////////////////////////////////////

$parse_open = true;

if (empty($focus->id) && !isset($_REQUEST['isDuplicate'])) {
	$xtpl->assign('TEAM_OPTIONS', get_select_options_with_id(get_team_array(), $current_user->default_team));
	$xtpl->assign('TEAM_NAME', $current_user->default_team_name);
	$xtpl->assign('TEAM_ID', $current_user->default_team);
} else {
	$xtpl->assign('TEAM_OPTIONS', get_select_options_with_id(get_team_array(), $focus->team_id));
	$xtpl->assign('TEAM_NAME', $focus->assigned_name);
	$xtpl->assign('TEAM_ID', $focus->team_id);
}

$code = $teamSetField->getClassicView();
$xtpl->assign("TEAM_SET_FIELD", $code);

$xtpl->parse('main.pro_team');
$parse_open = false;
if($parse_open) {
	$xtpl->parse('main.open_source_1');
}
///////////////////////////////////////////////////////////////////////////////
////	EMAIL TEMPLATES
if(ACLController::checkAccess('EmailTemplates', 'list', true) && ACLController::checkAccess('EmailTemplates', 'view', true)) {
	$et = new EmailTemplate();
	$etResult = $focus->db->query($et->create_new_list_query('','',array(),array(),''));
	$email_templates_arr[] = '';
	while($etA = $focus->db->fetchByAssoc($etResult)) {
		$email_templates_arr[$etA['id']] = $etA['name'];
	}
} else {
	$email_templates_arr = array('' => $app_strings['LBL_NONE']);
}

$xtpl->assign('EMAIL_TEMPLATE_OPTIONS', get_select_options_with_id($email_templates_arr, ''));
////	END EMAIL TEMPLATES
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////
////	TEXT EDITOR
// cascade from User to Sys Default
$editor = $focus->getUserEditorPreference();

if($editor != 'plain') {
	// this box is checked by Javascript on-load.
	$xtpl->assign('EMAIL_EDITOR_OPTION', 'CHECKED');
}
$description_html = from_html($focus->description_html);
$description = $focus->description;

/////////////////////////////////////////////////
// signatures
if($sig = $current_user->getDefaultSignature()) {
	if(!$focus->hasSignatureInBody($sig) && $focus->type != 'draft') {
		if($current_user->getPreference('signature_prepend')) {
			$description_html = '<br />'.from_html($sig['signature_html']).'<br /><br />'.$description_html;
			$description = "\n".$sig['signature']."\n\n".$description;
		} else {
			$description_html .= '<br /><br />'.from_html($sig['signature_html']);
			$description = $description."\n\n".$sig['signature'];
		}
	}
}
$xtpl->assign('DESCRIPTION', $description);
// sigs
/////////////////////////////////////////////////
$tiny = new SugarTinyMCE();
$ed = $tiny->getInstance("description_html");
$xtpl->assign("TINY", $ed);
$xtpl->assign("DESCRIPTION_HTML", $description_html);

$xtpl->parse('main.htmlarea');
////	END TEXT EDITOR
///////////////////////////////////////

///////////////////////////////////////
////	SPECIAL INBOUND LANDING SCREEN ASSIGNS
if(!empty($_REQUEST['inbound_email_id'])) {
	if(!empty($_REQUEST['start'])) {
		$parts = $focus->getStartPage(base64_decode($_REQUEST['start']));
		$xtpl->assign('RETURN_ACTION', $parts['action']);
		$xtpl->assign('RETURN_MODULE', $parts['module']);
		$xtpl->assign('GROUP', $parts['group']);
	}
		$xtpl->assign('ASSIGNED_USER_ID', $current_user->id);
		$xtpl->assign('MYINBOX', 'this.form.type.value=\'inbound\';');
}
////	END SPECIAL INBOUND LANDING SCREEN ASSIGNS
///////////////////////////////////////

echo '<script>var disabledModules='. $json->encode($disabled_parent_types) . ';</script>';
$jsVars = 'var lbl_send_anyways = "'.$mod_strings['LBL_SEND_ANYWAYS'].'";';
$xtpl->assign('JS_VARS', $jsVars);
$xtpl->parse("main");
$xtpl->out("main");
echo '<script>checkParentType(document.EditView.parent_type.value, document.EditView.change_parent);</script>';
////	END XTEMPLATE ASSIGNMENT
///////////////////////////////////////////////////////////////////////////////


$javascript = new javascript();
$javascript->setFormName('EditView');
$javascript->setSugarBean($focus);
$skip_fields = array();
if($email_type == 'out') {
	$skip_fields['name'] = 1;
	$skip_fields['date_start'] = 1;
}
$javascript->addAllFields('',$skip_fields);
$javascript->addToValidateBinaryDependency('parent_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $mod_strings['LBL_MEMBER_OF'], 'false', '', 'parent_id');
$javascript->addToValidateBinaryDependency('parent_type', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $mod_strings['LBL_MEMBER_OF'], 'false', '', 'parent_id');
$javascript->addFieldGeneric('team_name', 'varchar', $app_strings['LBL_TEAM'] ,'true');
$javascript->addToValidateBinaryDependency('team_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_TEAM'], 'false', '', 'team_id');
$javascript->addToValidateBinaryDependency('user_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_ASSIGNED_TO'], 'false', '', 'assigned_user_id');
if($email_type == 'archived') {
	$javascript->addFieldIsValidDate('date_start', 'date', $mod_strings['LBL_DATE'], $mod_strings['ERR_DATE_START'], true);
	$javascript->addFieldIsValidTime('time_start', 'time', $mod_strings['LBL_TIME'], $mod_strings['ERR_TIME_SENT'], true);
}
echo $javascript->getScript();

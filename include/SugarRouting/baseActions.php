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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/


/******************************************************************************
 * Extend baseActions.php with custom actions in
 * "cache/routing/customActions.php"
 * The file should look like the following:
	<?php
		$customActions = array(
			'custom1',
			'custom2'
		);

		function custom1() {
			// do something
			return true;
		}
		function custom2() {
			// do something else
			return true;
		}
	?>
 *****************************************************************************/
$file = sugar_cached("routing/customActions.php");
if(file_exists($file)) {
	include($file);
}



///////////////////////////////////////////////////////////////////////////////
////	SUGARBEAN RULES
/**
 * Logically deletes a SugarBean derivative
 * @param array $action Array of options and criteria for the action current being processed
 * @param object $bean SugarBean
 * @return bool
 */
function delete_bean($action, $bean) {
	$bean->mark_deleted();
	return true;
}
////	END SUGARBEAN RULES
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	FILESYSTEM RULES
/**
 * unlinks a file in the cache directory
 * @param array $action Array of options and criteria for the action current being processed
 * @param string file Path to file
 * @return bool
 */
function delete_file($action, $file) {
	global $sugar_config;

	// file must exist
	if(file_exists($file)) {
		// file must be located in the cache dir
		if(strpos($file, $sugar_config['cache_dir']) !== false) {
			if(unlink($file)) {
				return true;
			}
		}
	}

	$GLOBALS['log']->error("*** SugarRouting: Rule delete_file did not complete successfully [ file: {$file} ].");
	return false;
}
////	END FILESYSTEM RULES
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
////	MAIL SERVER RULES
/**
 * Marks an email Unread
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 */
function reply($action, $bean, $ie) {
	global $app_strings;
	global $current_user;

	$etId = $action['action1'];


	$et = new EmailTemplate();
	$et->retrieve($etId);
	$ie->setEmailForDisplay($bean->uid, false);
	$ie->email->name = $app_strings['LBL_ROUTING_FW'].$et->name." - ".$ie->email->name;
	$ie->email->description = trim($ie->email->description);
	$ie->email->description_html = trim($ie->email->description_html);

	if(!empty($ie->email->description)) {
		$ie->email->description = $et->body."\n\n{$app_strings['LBL_ROUTING_ORIGINAL_MESSAGE_FOLLOWS']}\n\n".$ie->email->description;
	}
	if(!empty($ie->email->description_html)) {
		$ie->email->description_html = $et->body_html."<br><br>{$app_strings['LBL_ROUTING_ORIGINAL_MESSAGE_FOLLOWS']}<br><br>".$ie->email->description_html;
	}

	// set to/from
	$toEmail = (isset($ie->email->reply_to_email) && !empty($ie->email->reply_to_email)) ? trim($ie->email->reply_to_email) : trim($ie->email->from_addr);
	$toDisplayName = (isset($ie->email->reply_to_name) && !empty($ie->email->reply_to_name)) ? trim($ie->email->reply_to_name) : trim($ie->email->from_name);

	if($toEmail == $toDisplayName) {
		$toDisplayName = ''; // where email address is used
	}

	$ie->email->to_addrs_arr = array(
		0 => array(
			'email' => $toEmail,
			'display' => $toDisplayName,
		)
	);

	//_ppl("######### Sending Reply message to [ {$toEmail} ]");

	$ea = new SugarEmailAddress();
	$ie->email->from_name = $current_user->full_name;
	//_ppl("from_name:".$ie->email->from_name);
	$ie->email->from_addr = $ea->getReplyToAddress($current_user);
	//_ppl("from_addr:".$ie->email->from_addr);

	return $ie->email->send();
}

/**
 * Marks an email Unread
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 */
function forward($action, $bean, $ie) {
	global $app_strings;

	$to = $action['action1'];

	$ie->setEmailForDisplay($bean->uid, false);

	$ie->email->name = $app_strings['LBL_ROUTING_FW'].$ie->email->name;

	$ie->email->to_addrs_arr = array(
		0 => array(
			'email' => $to,
		)
	);

	return $ie->email->send();
}

/**
 * Marks an email Unread
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 */
function mark_unread($action, $bean, $ie) {
	return imap_clearflag_full($ie->conn, $bean->uid, '\\Seen', ST_UID);
}

/**
 * Marks an email Read
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 */
function mark_read($action, $bean, $ie) {
	return mark_flag($action, $bean, $ie, '\\Seen');
}

/**
 * Marks an email Unread
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 */
function mark_flagged($action, $bean, $ie) {
	return mark_flag($action, $bean, $ie, '\\Flagged');
}

/**
 * Generic flag-setting
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 * @param string $flag Flag to set
 */
function mark_flag($action, $bean, $ie, $flag) {
	$result = imap_setflag_full($ie->conn, $bean->uid, $flag, ST_UID);
	//var_dump($result);_ppl($ie->conn);_ppl($ie->mailbox); _ppl($flag); _ppl($bean->uid);
	return $result;
}

/**
 * Copies an email to a folder
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 * @return bool
 */
function copy_mail($action, $bean, $ie, $copy=true) {
	$args = explode("::", $action['action1']);
//	_pp($bean->uid);
//	_pp($bean->imap_uid);
//	_ppf($bean, true);
//	_ppl($action);_ppl($args);

	if($args[0] == 'sugar') {
		// we're dealing with a target Sugar Folder
		$folder_id = $args[1];

		$GLOBALS['log']->fatal("*** SUGARROUTING: dest folder is Sugar Folder");
		// destination is a Sugar folder
		require_once("include/SugarFolders/SugarFolders.php");
		$sf = new SugarFolder();

		if($sf->retrieve($folder_id)) {
			$result = $ie->setEmailForDisplay($bean->uid, false);

			if($result == 'import') {
				$ie->email->save();
			}

			$sf->addBean($ie->email);

			if(!$copy) {
				// remove message from email server
				/* pending functional abstraction of sugar-side vs imap-side functionality */
				//$ie->deleteMessageOnMailServer($bean->uid);
			}
		} else {
			$GLOBALS['log']->fatal("*** SUGARROUTING: baseActions:copy_mail: could not retrieve SugarFolder with id [ {$folder_id} ]");
		}
	} else {
		$ieId = $args[1];
		$folder = "";
		for($i=2; $i<count($args); $i++) {
			if(!empty($folder))
				$folder .= ".";
			$folder .= $args[$i];
		}

		$GLOBALS['log']->fatal("*** SUGARROUTING: baseActions:copy_email [ {$folder} ] [ {$ieId} ] [ {$bean->uid} ]");
		$ie = new InboundEmail();
		$ie->retrieve($ieId);
		$GLOBALS['log']->fatal("*** SUGARROUTING: dest folder is IMAP Folder");
		// destination is an IMAP folder
		/**
		 * moveEmails($fromIe, $fromFolder, $toIe, $toFolder, $uids) {
		 * $args['toFolder'] - XXXX-XXX-XXXXXXX-XXXX-XXX::INBOX::[folderPath]
		 */
		if($copy)
			$ie->copyEmails($ie->id, "INBOX", $ie->id, $folder, $bean->uid);
		else
			$ie->moveEmails($ie->id, "INBOX", $ie->id, $folder, $bean->uid);
	}
	return true;
}
/**
 * Moves an email to a folder
 * @param array $action Array of options and criteria for the action current being processed
 * @param string $ieId ID of InboundEmail instance fully retrieved
 * @param string $uid UID of email
 * @param object $ie InboundEmail instance
 * @return bool
 */
function move_mail($action, $bean, $ie) {
	// does functionally the same thing as copy, but we will remove the message from the original folder
	if(copy_mail($action, $bean, $ie, false)) {
		return true;
	}
	return false;
}


/**
 * Deletes mail from a mailserver
 * @param array $action Array of options and criteria for the action current being processed
 * @param object ie InboundEmail instance fully retrieved
 * @param string uid UID of email on mail server
 * @return bool
 */
function delete_mail($action, $bean, $ie) {
	return $ie->deleteMessageOnMailServer($bean->uid);
}
////	END MAIL SERVER RULES
///////////////////////////////////////////////////////////////////////////////

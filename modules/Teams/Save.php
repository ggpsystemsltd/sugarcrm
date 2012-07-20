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



global $current_user;
if(isset($_POST['user_id'])){
	include_once('modules/Teams/AddUserToTeam.php');
	
}

if (!$GLOBALS['current_user']->isAdminForModule('Users')) sugar_die("Unauthorized access to administration.");

$focus = new Team();

if ($_POST['isDuplicate'] != 1) {
//	echo "not duplicate, retrieving record {$_POST['record']}";
	$focus->retrieve($_POST['record']);
}// else { echo "duplicate, not retrieving"; }

foreach ($focus->column_fields as $field) {
	if (isset($_POST[$field])) {
		$value = $_POST[$field];
		$focus->$field = $value;
	}
}
//before we save let's do some logic to ensure that we split the name properly
if($focus->private && !empty($focus->associated_user_id)){
	$tokens = explode(' ', $focus->name);
	if(count($tokens) == 2){
		$focus->name = trim($tokens[0]);
		$focus->name_2 = trim($tokens[1]);
	}elseif(count($tokens) > 2){
		//e.g. Jean Paul Jones
		
			//since this is a private team we can try to match what the user's name is
			$user = new User();
			$user->retrieve($focus->associated_user_id);
			$tokenStr = '';
			$index = count($tokens);
			for($i = (count($tokens)-1); $i > 0; $i--){
				$tokenStr .= $tokens[$i];
				if(strcmp($tokenStr,$user->last_name) == 0){
					$focus->name_2 = $tokenStr;
					$index = $i;
					break;
				}
			}
			$newTokens = array_slice($tokens, 0, $index);
			$focus->name = implode($newTokens, ' ');
	}else{
		$focus->name_2 = '';
	}
}

//do a dup check on name before saving 
function checkDupTeamName($focus){
    global $db;
    $contact_result = $db->concat('teams', array ('name','name_2'));
	if(((null != $focus->fetched_row) && ($focus->name == $focus->fetched_row['name']) && (0 == $focus->private))
	 ||((null != $focus->fetched_row) && ($focus->name . ' ' . $focus->name_2 == $focus->fetched_row['name'] . ' ' . $focus->fetched_row['name_2']) && (1 == $focus->private))
	  ){
    	return false;
    }
    if((null == $focus->fetched_row) || (null != $focus->fetched_row && 0 == $focus->private)) {
        $query = "SELECT id from teams WHERE (private = 0 AND name = '" . $db->quote(trim($focus->name)) . "') OR (private = 1 AND " . $contact_result . " = '" . $db->quote(trim($focus->name)) . "')";	
    }
	else {
	    $query = "SELECT id from teams WHERE (private = 0 AND name = '" . $db->quote(trim($focus->name) . ' ' . trim($focus->name_2)) . "') OR (private = 1 AND " . $contact_result . " = '" . $db->quote(trim($focus->name) . ' ' . trim($focus->name_2)) . "')";
	}
    $result = $db->query($query);
    while ($row=$db->fetchByAssoc($result)){
    	if (null != $row){
    		return true;
    	}
    }
    return false;
}
if(checkDupTeamName($focus)){
	$GLOBALS['log']->debug("duplicate team name of {$focus->name}");
    header("Location: index.php?action=Error&module=Teams");
    exit;
}
else {
$focus->save();
$return_id = $focus->id;

//echo "<br>saved record, focus->id = {$focus->id}";

if ($_POST['isDuplicate'] == 1) {
//	echo "<br>duplicating users from old team ({$_REQUEST['record']}) into new team ({$focus->id})";
	$focus->complete_team_duplication($_REQUEST['record']);
}
else {
	//$focus->create_team();
}

//sugar_die();

$return_module = (!empty($_POST['return_module'])) ? $_POST['return_module'] : "Teams";
$return_action = ($_POST['return_action']!='index') ? $_POST['return_action'] : "DetailView";

$GLOBALS['log']->debug("Saved record with id of {$return_id}");

header("Location: index.php?action={$return_action}&module={$return_module}&record={$return_id}");
}
?>
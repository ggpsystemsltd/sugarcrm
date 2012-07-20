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


global $mod_strings;
global $app_strings;
global $current_user;

if (!$GLOBALS['current_user']->isAdminForModule('Users')) sugar_die("Unauthorized access to administration.");

$error_message = '';

if(isset($_REQUEST['team_id']) && isset($_REQUEST['teams'])) {
	$new_team = new Team();
	$new_team->retrieve($_REQUEST['team_id']);
	
	//Grab the list of teams to reassign
	$old_teams = explode(",", $_REQUEST['teams']);
	
	if(!in_array($new_team->id, $old_teams)) {
		unset($_SESSION['REASSIGN_TEAMS']);
		
		//Call method to reassign the teams
		$new_team->reassign_team_records($old_teams);
		
		//Redirect to listview
		header("Location: index.php?module=Teams&action=index");
		sugar_die();	   
	}
	$error_message = string_format($mod_strings['ERR_INVALID_TEAM_REASSIGNMENT'], array(Team::getDisplayName($new_team->name, $new_team->name_2, false)));
}
	
$teams = array();
$focus = new Team();

if(isset($_SESSION['REASSIGN_TEAMS'])) {
  foreach($_SESSION['REASSIGN_TEAMS'] as $team_id) {
  	 $focus->retrieve($team_id);
  	 $teams[$team_id] = $focus->name;
  }
} else if(isset($_REQUEST['record'])) {
  $focus->retrieve($_REQUEST['record']);
  $teams[$focus->id] = $focus->name;	
}

if(empty($teams) && !isset($error_message)) {
  $GLOBALS['log']->fatal("No teams to reassign for operation");
  header("Location: index.php?module=Teams&action=index");
} else {	
  $ss = new Sugar_Smarty();
  $team_list = '('. implode("), (", $teams) . ')';
  $ss->assign("TITLE", string_format($mod_strings['LBL_REASSIGN_TEAM_TITLE'], array($team_list)));
  $ss->assign("ERROR_MESSAGE", $error_message);
  $ss->assign("TEAMS", implode(",", array_keys($teams)));
  $ss->assign("MOD_STRINGS", $mod_strings);
  $ss->assign("APP_STRINGS", $app_strings);
  $ss->display("modules/Teams/tpls/ReassignTeam.tpl");
}

?>
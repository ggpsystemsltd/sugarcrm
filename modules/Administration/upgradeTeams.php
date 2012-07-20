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


//Create User Teams


$globalteam = new Team();
$globalteam->retrieve('1');
if(isset($globalteam->name)){
   echo 'Global '.$mod_strings['LBL_UPGRADE_TEAM_EXISTS'].'<br>';
		
}else{
   $globalteam->create_team("Global", $mod_strings['LBL_GLOBAL_TEAM_DESC'], $globalteam->global_team);
}

//$seed_user = new User();
//$list = $seed_user->get_full_list();
$results = $GLOBALS['db']->query("SELECT id, user_name FROM users WHERE default_team != '' AND default_team IS NOT NULL");

$team = new Team();
$user = new User();
while($row = $GLOBALS['db']->fetchByAssoc($results)) { 
	$results2 = $GLOBALS['db']->query("SELECT id, name FROM teams WHERE associated_user_id = '" . $row['id'] . "'");
	$row2 = $GLOBALS['db']->fetchByAssoc($results2);
	if(empty($row2['id'])) {	
		$user->retrieve($row['id']);
		$team->new_user_created($user);
		// BUG 10339: do not display messages for upgrade wizard		
		if(!isset($_REQUEST['upgradeWizard'])){	
			echo $mod_strings['LBL_UPGRADE_TEAM_CREATE'].' '. $row['user_name']. '<br>';
		}
	}else{
		echo $row2['name'] .' '.$mod_strings['LBL_UPGRADE_TEAM_EXISTS'].'<br>';
	}
	
	$globalteam->add_user_to_team($row['id']);
}

echo '<br>' . $mod_strings['LBL_DONE'];


?>
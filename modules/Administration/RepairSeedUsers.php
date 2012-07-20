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

global $current_user;

if(is_admin($current_user)){
    if(count($_POST)){
    	if(!empty($_POST['activate'])){

    		$status = '';
    		if($_POST['activate'] == 'false'){
    			$status = 'Inactive';
    		}else{
    			$status = 'Active';
    		}
    	}
    	$query = "UPDATE users SET status = '$status' WHERE id LIKE 'seed%'";
   		$GLOBALS['db']->query($query);
    }
    	$query = "SELECT status FROM users WHERE id LIKE 'seed%'";
    	$result = $GLOBALS['db']->query($query);
		$row = $GLOBALS['db']->fetchByAssoc($result);
		if(!empty($row['status'])){
			$activate = 'false';
			if($row['status'] == 'Inactive'){
				$activate = 'true';
			}
			?>
				<p>
				<form name="RepairSeedUsers" method="post" action="index.php">
				<input type="hidden" name="module" value="Administration">
				<input type="hidden" name="action" value="RepairSeedUsers">
				<input type="hidden" name="return_module" value="Administration">
				<input type="hidden" name="return_action" value="Upgrade">
				<input type="hidden" name="activate" value="<?php echo $activate; ?>">
				<table cellspacing="{CELLSPACING}" class="otherview">
					<tr>
					    <td scope="row" width="30%"><?php echo $mod_strings['LBL_REPAIR_SEED_USERS_TITLE']; ?></td>
					    <td><input type="submit" name="button" value="<?php if($row['status'] == 'Inactive'){echo $mod_strings['LBL_REPAIR_SEED_USERS_ACTIVATE'];}else{echo $mod_strings['LBL_REPAIR_SEED_USERS_DECACTIVATE'];} ?>"></td>
					</tr>
				</table>
				</form>
				</p>
			<?php

		}else{
			echo 'No seed Users';
		}
}
else{
	sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
}
?>
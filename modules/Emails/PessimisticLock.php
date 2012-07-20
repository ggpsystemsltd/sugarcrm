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
global $locale;
$userName = $mod_strings['LBL_UNKNOWN'];

if(isset($_REQUEST['user'])) {
	
	$user = new User();
	$user->retrieve($_REQUEST['user']);
	$userName = $locale->getLocaleFormattedName($user->first_name, $user->last_name);
}


// NEXT FREE
if(isset($_REQUEST['next_free']) && $_REQUEST['next_free'] == true) {
	
	$next = new Email();
	$rG = $next->db->query('SELECT count(id) AS c FROM users WHERE deleted = 0 AND users.is_group = 1');
	$aG = $next->db->fetchByAssoc($rG);
	if($rG['c'] > 0) {
		$rG = $next->db->query('SELECT id FROM users WHERE deleted = 0 AND users.is_group = 1');
		$aG = $next->db->fetchByAssoc($rG);
		while($aG = $next->db->fetchByAssoc($rG)) {
			$ids[] = $aG['id'];
		}
		$in = ' IN (';
		foreach($ids as $k => $id) {
			$in .= '"'.$id.'", ';
		}
		$in = substr($in, 0, (strlen($in) - 2));
		$in .= ') ';
		
		$team = '';
		$qT = 'SELECT count(team_id) AS c FROM team_memberships WHERE user_id'.$in;
		$rT = $next->db->query($qT);
		while($aT = $next->db->fetchByAssoc($rT)) {
			$tIds[] = $aT['team_id'];
		}

		if(count($tIds) > 0) {
			$team = ' AND team_id IN (';
			foreach($tIds as $k => $tid) {
				$team .= '"'.$tid.'", ';	
			}
			$team = substr($team, 0, (strlen($team) - 2));
			$team .= ') ';
		}
		
		$qE = 'SELECT count(id) AS c FROM emails WHERE deleted = 0 AND assigned_user_id'.$in.$team.'LIMIT 1';
		$rE = $next->db->query($qE);
		$aE = $next->db->fetchByAssoc($rE);

		if($aE['c'] > 0) {
			$qE = 'SELECT id FROM emails WHERE deleted = 0 AND assigned_user_id'.$in.$team.'LIMIT 1';
			$rE = $next->db->query($qE);
			$aE = $next->db->fetchByAssoc($rE);
			$next->retrieve($aE['id']);
			$next->assigned_user_id = $current_user->id;
			$next->save();
			
			header('Location: index.php?module=Emails&action=DetailView&record='.$next->id);
			
		} else {
			// no free items
			header('Location: index.php?module=Emails&action=ListView&type=inbound&group=true');
		}
	} else {
		// no groups
		header('Location: index.php?module=Emails&action=ListView&type=inbound&group=true');
	}
}
?>
<table width="100%" cellpadding="12" cellspacing="0" border="0">
	<tr>
		<td valign="middle" align="center" colspan="2">
			<?php echo $mod_strings['LBL_LOCK_FAIL_DESC']; ?>
			<br>
			<?php echo $userName.$mod_strings['LBL_LOCK_FAIL_USER']; ?>
		</td>
	</tr>
	<tr>
		<td valign="middle" align="right" width="50%">
			<a href="index.php?module=Emails&action=ListView&type=inbound&group=true"><?php echo $mod_strings['LBL_BACK_TO_GROUP']; ?></a>
		</td>
		<td valign="middle" align="left">
			<a href="index.php?module=Emails&action=PessimisticLock&next_free=true"><?php echo $mod_strings['LBL_NEXT_EMAIL']; ?></a>
		</td>
	</tr>
</table>

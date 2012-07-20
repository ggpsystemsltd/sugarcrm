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


$focus = new Email();
// Get Group User IDs
$groupUserQuery = 'SELECT name, group_id FROM inbound_email ie INNER JOIN users u ON (ie.group_id = u.id AND u.is_group = 1)';
$groupUserQuery = 'SELECT group_id FROM inbound_email ie';
$groupUserQuery .= ' INNER JOIN team_memberships tm ON ie.team_id = tm.team_id';
$groupUserQuery .= ' INNER JOIN teams ON ie.team_id = teams.id AND teams.private = 0';
$groupUserQuery .= ' WHERE tm.user_id = \''.$current_user->id.'\'';
_pp($groupUserQuery);
$r = $focus->db->query($groupUserQuery);
$groupIds = '';
while($a = $focus->db->fetchByAssoc($r)) {
	$groupIds .= "'".$a['group_id']."', ";
}
$groupIds = substr($groupIds, 0, (strlen($groupIds) - 2));

$query = 'SELECT emails.id AS id FROM emails';
$query .= ' LEFT JOIN team_memberships ON emails.team_id = team_memberships.team_id';
$query .= ' LEFT JOIN teams ON emails.team_id = teams.id ';
$query .= " WHERE emails.deleted = 0 AND emails.status = 'unread' AND emails.assigned_user_id IN ({$groupIds})";  
if(!$current_user->is_admin) {
	$query .= "	AND team_memberships.user_id = '{$current_user->id}'";
}
//$query .= ' LIMIT 1';

//_ppd($query);
$r2 = $focus->db->query($query); 
$count = 0;
$a2 = $focus->db->fetchByAssoc($r2);

$focus->retrieve($a2['id']);
$focus->assigned_user_id = $current_user->id;
$focus->save();

if(!empty($a2['id'])) {
	header('Location: index.php?module=Emails&action=ListView&type=inbound&assigned_user_id='.$current_user->id);
} else {
	header('Location: index.php?module=Emails&action=ListView&show_error=true&type=inbound&assigned_user_id='.$current_user->id);
}

?>

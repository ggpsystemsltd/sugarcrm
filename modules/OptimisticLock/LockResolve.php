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

function display_conflict_between_objects($object_1, $object_2, $field_defs,$module_dir, $display_name){
	$mod_strings = return_module_language($GLOBALS['current_language'],'OptimisticLock');
	$title = '<tr><td >&nbsp;</td>';
	$object1_row= '<tr class="oddListRowS1"><td><b>'. $mod_strings['LBL_YOURS'] . '</b></td>';
	$object2_row= '<tr class="evenListRowS1"><td><b>' . $mod_strings['LBL_IN_DATABASE'] . '</b></td>';
	$exists = false;

	foreach( $field_defs as  $name=>$ignore)
	{
        $value = $object_1[$name];
        // FIXME: Replace the comparison here with a function from SugarWidgets
        if ( !is_scalar($value) || $name == 'team_name' ) {
            continue;
        }
		if( $value != $object_2->$name && !($object_2->$name instanceOf Link)){
			$title .= '<td ><b>&nbsp;' . translate($field_defs[$name]['vname'], $module_dir). '</b></td>';
			$object1_row .= '<td>&nbsp;' . $value. '</td>';
			$object2_row .= '<td>&nbsp;' . $object_2->$name . '</td>';
			$exists = true;
		}
	}

	if($exists){
		echo "<b>{$mod_strings['LBL_CONFLICT_EXISTS']}<a href='index.php?action=DetailView&module=$module_dir&record={$object_1['id']}'  target='_blank'>$display_name</a> </b> <br><table  class='list view' border='0' cellspacing='0' cellpadding='2'>$title<td  >&nbsp;</td></tr>$object1_row<td><a href='index.php?&module=OptimisticLock&action=LockResolve&save=true'>{$mod_strings['LBL_ACCEPT_YOURS']}</a></td></tr>$object2_row<td><a href='index.php?&module=$object_2->module_dir&action=DetailView&record=$object_2->id'>{$mod_strings['LBL_ACCEPT_DATABASE']}</a></td></tr></table><br>";
	}else{
		echo "<b>{$mod_strings['LBL_RECORDS_MATCH']}</b><br>";
	}
}

if(isset($_SESSION['o_lock_object'])){
	global $beanFiles, $moduleList;
	$object = 	$_SESSION['o_lock_object'];
	require_once($beanFiles[$beanList[$_SESSION['o_lock_module']]]);
	$current_state = new $_SESSION['o_lock_class']();
	$current_state->retrieve($object['id']);

	if(isset($_REQUEST['save'])){
		$_SESSION['o_lock_fs'] = true;
		echo  $_SESSION['o_lock_save'];
		die();
	}else{
		display_conflict_between_objects($object, $current_state, $current_state->field_defs, $current_state->module_dir, $_SESSION['o_lock_class']);
}}else{
	echo $mod_strings['LBL_NO_LOCKED_OBJECTS'];
}

?>

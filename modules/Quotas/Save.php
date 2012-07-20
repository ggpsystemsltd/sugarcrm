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
 ********************************************************************************/



$focus = new Quota();

require_once('include/formbase.php');
$focus = populateFromPost('', $focus);

if ($_REQUEST['committed'] == 'on')
	$focus->committed = 1;
else
	$focus->committed = 0;
	
$focus->assigned_user_id = $focus->user_id;

/* get the conversion rate and update the correct value for the base currency */
if ($focus->currency_id != -99)
	$convertRate = $focus->getConversionRate($focus->currency_id);
else
	$convertRate = 1;

$focus->amount_base_currency = floor($focus->amount / $convertRate);
	
if ($focus->isManager($focus->user_id) && $current_user->id != $focus->user_id){
	$focus->quota_type = "Rollup";
}
else
{
	$focus->quota_type = "Direct";
}

// Save the edited or newly created quota
if ($focus->committed == 1 && ($_POST['user_id'] != $current_user->id))
	$focus->save(true);
else
	$focus->save();

// Check to see if current user is a top level manager
if ($focus->isTopLevelManager()){
	$topLevelFocus = new Quota();
	
	$topLevelFocus->timeperiod_id = $_REQUEST['timeperiod_id'];
	$topLevelFocus->user_id = $current_user->id;
	$topLevelFocus->quota_type = 'Rollup';
	$topLevelFocus->currency_id = -99;	
	
	$focus->resetGroupQuota($_REQUEST['timeperiod_id']);
	$topLevelFocus->amount = $focus->getGroupQuota($_REQUEST['timeperiod_id'], false);
	$topLevelFocus->amount_base_currency = $focus->getGroupQuota($_REQUEST['timeperiod_id'], false);
	$topLevelFocus->committed = 1;
	
	$quota_id = $focus->getTopLevelRecord($_REQUEST['timeperiod_id']);
	
	if (!empty($quota_id))
		$topLevelFocus->id = $quota_id;
		
	// save the top level manager's quota record		
	$topLevelFocus->save();	
	
	$GLOBALS['log']->debug("Saved top level manager's record with id of ".$topLevelFocus->id);
}


// Here are the return fields for returning to the correct page
$return_id = $focus->id;

$edit='';
if(isset($_REQUEST['return_module']) && $_REQUEST['return_module'] != "") $return_module = $_REQUEST['return_module'];
else $return_module = "Quotas";
if(isset($_REQUEST['return_action']) && $_REQUEST['return_action'] != "") $return_action = $_REQUEST['return_action'];
else $return_action = "DetailView";
if(isset($_REQUEST['return_id']) && $_REQUEST['return_id'] != "") $return_id = $_REQUEST['return_id'];
if(isset($_REQUEST['return_user_id']) && $_REQUEST['return_user_id'] != "") $return_user_id = $_REQUEST['return_user_id'];
if(isset($_REQUEST['return_timeperiod_id']) && $_REQUEST['return_timeperiod_id'] != "") $return_timeperiod_id = $_REQUEST['return_timeperiod_id'];
if(!empty($_REQUEST['edit'])) {
	$return_id='';
	$edit='&edit=true';
}
$GLOBALS['log']->debug("Saved record with id of ".$return_id);

header("Location: index.php?action=$return_action&module=$return_module&record=$return_id&user_id=$return_user_id&timeperiod_id=$return_timeperiod_id$edit");
?>

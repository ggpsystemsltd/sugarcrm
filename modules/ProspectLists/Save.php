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






$focus = new ProspectList();

$focus->retrieve($_POST['record']);

if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
	$check_notify = TRUE;
}
else {
	$check_notify = FALSE;
}

require_once('include/formbase.php');
$focus = populateFromPost('', $focus);

$focus->save($check_notify);
$return_id = $focus->id;


//Bug 33675 Duplicate target list
if( !empty($_REQUEST['duplicateId']) ){
	$copyFromProspectList = new ProspectList();
	$copyFromProspectList->retrieve($_REQUEST['duplicateId']);
	$relations = $copyFromProspectList->retrieve_relationships('prospect_lists_prospects',array('prospect_list_id'=>$_REQUEST['duplicateId']),'related_id, related_type');
	if(count($relations)>0){
		foreach ($relations as $rel){
			$rel['prospect_list_id']=$return_id;
			$focus->set_relationship('prospect_lists_prospects', $rel, true);
		}
	}
	$focus->save();
}



if(isset($_POST['return_module']) && $_POST['return_module'] != "") $return_module = $_POST['return_module'];
else $return_module = "ProspectLists";
if(isset($_POST['return_action']) && $_POST['return_action'] != "") $return_action = $_POST['return_action'];
else $return_action = "DetailView";
if(isset($_POST['return_id']) && $_POST['return_id'] != "") $return_id = $_POST['return_id'];

if($return_action == "SaveCampaignProspectListRelationshipNew")
{
	$prospect_list_id = $focus->id;
    handleRedirect($return_id, $return_module, array("prospect_list_id" => $prospect_list_id));
}
else
{
	//eggsurplus Bug 23816: maintain VCR after an edit/save. If it is a duplicate then don't worry about it. The offset is now worthless.
 	$redirect_url = "Location: index.php?action=$return_action&module=$return_module&record=$return_id";
 	if(isset($_REQUEST['offset']) && empty($_REQUEST['duplicateSave'])) {
 	    $redirect_url .= "&offset=".$_REQUEST['offset'];
 	}
	$GLOBALS['log']->debug("Saved record with id of ".$return_id);
	handleRedirect($return_id, $return_module);

}
?>
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


$focus = new Campaign();

$focus->retrieve($_POST['record']);
if(!$focus->ACLAccess('Save')){
	ACLController::displayNoAccess(true);
	sugar_cleanup(true);
}
if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
	$check_notify = TRUE;
}
else {
	$check_notify = FALSE;
}

require_once('include/formbase.php');
$focus = populateFromPost('', $focus);

//store preformatted dates for 2nd save
$preformat_start_date = $focus->start_date;
$preformat_end_date = $focus->end_date;
//_ppd($preformat_end_date);

$focus->save($check_notify);
$return_id = $focus->id;

$GLOBALS['log']->debug("Saved record with id of ".$return_id);


//copy compaign targets on duplicate
if( !empty($_REQUEST['duplicateSave']) &&  !empty($_REQUEST['duplicateId']) ){
	$copyFromCompaign = new Campaign();
	$copyFromCompaign->retrieve($_REQUEST['duplicateId']);
	$copyFromCompaign->load_relationship('prospectlists');

	$focus->load_relationship('prospectlists');
	$target_lists = $copyFromCompaign->prospectlists->get();
	if(count($target_lists)>0){
		foreach ($target_lists as $prospect_list_id){
			$focus->prospectlists->add($prospect_list_id);
		}
	}

	$focus->save();
}


//if type is set to newsletter then make sure there are propsect lists attached
if($focus->campaign_type =='NewsLetter'){
		//if this is a duplicate, and the "relate_to" and "relate_id" elements are not cleared out, 
		//then prospect lists will get related to the original campaign on save of the prospect list, and then
		//will get related to the new newsletter campaign, meaning the same (un)subscription list will belong to 
		//two campaigns, which is wrong
		if((isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave']) || (isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate']) ){
			$_REQUEST['relate_to'] = '';
			$_REQUEST['relate_id'] = '';
		
		}
	
        //add preformatted dates for 2nd save, to avoid formatting conversion errors
        $focus->start_date = $preformat_start_date ;
        $focus->end_date = $preformat_end_date ;

        $focus->load_relationship('prospectlists');
        $target_lists = $focus->prospectlists->get();
        if(count($target_lists)<1){
            global $current_user;
            global $mod_strings;
            //if no prospect lists are attached, then lets create a subscription and unsubscription
            //default prospect lists as these are required for newsletters.
                    
             //create subscription list     
             $subs = new ProspectList();
             $subs->name = $focus->name.' '.$mod_strings['LBL_SUBSCRIPTION_LIST'];
             $subs->assigned_user_id= $current_user->id;
             $subs->list_type = "default";
             $subs->save();
             $focus->prospectlists->add($subs->id);

             //create unsubscription list
             $unsubs = new ProspectList();
             $unsubs->name = $focus->name.' '.$mod_strings['LBL_UNSUBSCRIPTION_LIST'];
             $unsubs->assigned_user_id= $current_user->id;
             $unsubs->list_type = "exempt";
             $unsubs->save();
             $focus->prospectlists->add($unsubs->id);
             
             //create unsubscription list
             $test_subs = new ProspectList();
             $test_subs->name = $focus->name.' '.$mod_strings['LBL_TEST_LIST'];
             $test_subs->assigned_user_id= $current_user->id;
             $test_subs->list_type = "test";
             $test_subs->save();
             $focus->prospectlists->add($test_subs->id);             
        }
        //save new relationships
        $focus->save();

}//finish newsletter processing

handleRedirect($focus->id, 'Campaigns');


?>
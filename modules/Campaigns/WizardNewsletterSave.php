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
require_once('include/formbase.php');

global $mod_strings;

    //create new campaign bean and populate
    $campaign_focus = new Campaign();
    if(isset($_REQUEST['record'])) {
        $campaign_focus->retrieve($_REQUEST['record']);
    }
    
    $camp_steps[] = 'wiz_step1_';
    $camp_steps[] = 'wiz_step2_';

    $campaign_focus = populateFromPost('', $campaign_focus);
        
    foreach($camp_steps as $step){
       $campaign_focus =  populate_wizard_bean_from_request($campaign_focus,$step);    
    }
    
    //save here so we can link relationships
        $campaign_focus->save();
        $GLOBALS['log']->debug("Saved record with id of ".$campaign_focus->id);
    
    //process prospect lists
        
        //process subscription lists if this is a newsletter
        if($campaign_focus->campaign_type =='NewsLetter'){
            $pl_list = process_subscriptions_from_request($campaign_focus->name);
    
            $campaign_focus->load_relationship('prospectlists');
            $existing_pls = $campaign_focus->prospectlists->get(); 
            $ui_ids = array();
            
            //for each list returned, add the list to the relationship
            foreach($pl_list as $pl){
                $campaign_focus->prospectlists->add($pl->id);
                //populate array with id's from UI'
                $ui_ids[] = $pl->id; 
            }

            //now remove the lists that may have existed before, but were not specified in UI.
            //this will enforce that Newsletters only have 3 available target lists.
            foreach($existing_pls as $pl_del){
                if (!in_array($pl_del, $ui_ids)){
                    $campaign_focus->prospectlists->delete($campaign_focus->id, $pl_del);    
                }
            }
        }else{
            //process target lists if this is not a newsletter
            //remove Target Lists if defined

            if(isset($_REQUEST['wiz_remove_target_list'])){
        
                $remove_target_strings = explode(",", $_REQUEST['wiz_remove_target_list']);
                foreach($remove_target_strings as $remove_trgt_string){
                        if(!empty($remove_trgt_string)){
                        //load relationship and add to the list
                            $campaign_focus->load_relationship('prospectlists');
                            $campaign_focus->prospectlists->delete($campaign_focus->id,$remove_trgt_string);
                        }          
                }
            }
        

    //create new campaign tracker and save if defined
    if(isset($_REQUEST['wiz_list_of_targets'])){
        $target_strings = explode(",", $_REQUEST['wiz_list_of_targets']);
        foreach($target_strings as $trgt_string){
            $target_values = explode("@@", $trgt_string);
            if(count($target_values)==3){
                
                if(!empty($target_values[0])){
                    //this is a selected target, as the id is already populated, retrieve and link
                    $trgt_focus = new ProspectList();
                    $trgt_focus->retrieve($target_values[0]);
            
                    //load relationship and add to the list
                    $campaign_focus->load_relationship('prospectlists');
                    $campaign_focus->prospectlists->add($trgt_focus ->id);
                }else{

                    //this is a new target, as the id is not populated, need to create and link
                    $trgt_focus = new ProspectList();
                    $trgt_focus->name = $target_values[1];
                    $trgt_focus->list_type = $target_values[2];
                    $trgt_focus->save();
            
                    //load relationship and add to the list
                    $campaign_focus->load_relationship('prospectlists');
                    $campaign_focus->prospectlists->add($trgt_focus->id);          
                }

            }


        }
    }

            
        }


    
    //remove campaign trackers if defined
    if(isset($_REQUEST['wiz_remove_tracker_list'])){

        $remove_tracker_strings = explode(",", $_REQUEST['wiz_remove_tracker_list']);
        foreach($remove_tracker_strings as $remove_trkr_string){
                if(!empty($remove_trkr_string)){
                //load relationship and add to the list
                    $campaign_focus->load_relationship('tracked_urls');
                    $campaign_focus->tracked_urls->delete($campaign_focus->id,$remove_trkr_string);
                }          
        }
    }


    //save  campaign trackers and save if defined
    if(isset($_REQUEST['wiz_list_of_existing_trackers'])){
        $tracker_strings = explode(",", $_REQUEST['wiz_list_of_existing_trackers']);
        foreach($tracker_strings as $trkr_string){
            $tracker_values = explode("@@", $trkr_string);
            $ct_focus = new CampaignTracker();
            $ct_focus->retrieve($tracker_values[0]);
            if(!empty($ct_focus->tracker_name)){
                $ct_focus->tracker_name = $tracker_values[1];
                $ct_focus->is_optout = $tracker_values[2];
                $ct_focus->tracker_url = $tracker_values[3];
                $ct_focus->save();
        
                //load relationship and add to the list
                $campaign_focus->load_relationship('tracked_urls');
                $campaign_focus->tracked_urls->add($ct_focus->id);          
            }
        }
    }


    //create new campaign tracker and save if defined
    if(isset($_REQUEST['wiz_list_of_trackers'])){
        $tracker_strings = explode(",", $_REQUEST['wiz_list_of_trackers']);
        foreach($tracker_strings as $trkr_string){
            $tracker_values = explode("@@", $trkr_string);
            if(count($tracker_values)==3){
                $ct_focus = new CampaignTracker();
                $ct_focus->tracker_name = $tracker_values[0];
                $ct_focus->is_optout = $tracker_values[1];
                $ct_focus->tracker_url = $tracker_values[2];
                $ct_focus->save();
        
                //load relationship and add to the list
                $campaign_focus->load_relationship('tracked_urls');
                $campaign_focus->tracked_urls->add($ct_focus->id);          
                // save campaign_trkrs after populating campaign id
                $ct_focus->save();
            }
        }
    }

//set navigation details
$_REQUEST['return_id'] = $campaign_focus->id;
$_REQUEST['return_module'] = $campaign_focus->module_dir;
$_REQUEST['return_action'] = "WizardNewsLetter";
$_REQUEST['action'] = "WizardMarketing";
$_REQUEST['record'] = $campaign_focus->id;;

$action = '';
if(isset($_REQUEST['wiz_direction'])  &&  $_REQUEST['wiz_direction']== 'continue'){
    $action = 'WizardMarketing';    
}else{
    $action = 'WizardHome&record='.$campaign_focus->id;
}
//require_once('modules/Campaigns/WizardMarketing.php');
$header_URL = "Location: index.php?return_module=Campaigns&module=Campaigns&action=".$action."&campaign_id=".$campaign_focus->id."&return_action=WizardNewsLetter&return_id=".$campaign_focus->id;
$GLOBALS['log']->debug("about to post header URL of: $header_URL");
 header($header_URL);



/*
 * This function will populate the passed in bean with the post variables
 * that contain the specified prefix
 */
function populate_wizard_bean_from_request($bean,$prefix){ 
    foreach($_REQUEST as $key=> $val){
     $key = trim($key);
     if((strstr($key, $prefix )) && (strpos($key, $prefix )== 0)){
          $field  =substr($key, strlen($prefix)) ;
          if(isset($_REQUEST[$key]) && !empty($_REQUEST[$key])){
              //echo "prefix is $prefix, field is $field,    key is $key,   and value is $val<br>";
              $value = $_REQUEST[$key];
              $bean->$field = $value;
          }
     }   
    }

    return $bean;
}


/*
 * This function will process any specified prospect lists and attach them to current campaign
 * If no prospect lists have been specified, then it will create one for you.  A total of 3 prospect lists
 * will be created for you (Subscription, Unsubscription, and test)
 */
function process_subscriptions_from_request($campaign_name){
    global $mod_strings;
    $pl_list = array();

    //process default target list
    $create_new = true;     
    $pl_subs = new ProspectList($campaign_name);
    if(!empty($_REQUEST['wiz_step3_subscription_list_id'])){
        //if subscription list is specified then attach
        $pl_subs->retrieve($_REQUEST['wiz_step3_subscription_list_id']);
        //check to see name matches the bean, if not, then the user has chosen to create new bean
        if($pl_subs->name == $_REQUEST['wiz_step3_subscription_name']){
            $pl_list[] = $pl_subs;
            $create_new = false;
       }

    }
    //create new bio if one was not retrieved succesfully    
    if($create_new){
        //use default name if one has not been specified
        $name = $campaign_name . " ".$mod_strings['LBL_SUBSCRIPTION_LIST'];
        if(isset($_REQUEST['wiz_step3_subscription_name']) && !empty($_REQUEST['wiz_step3_subscription_name'])){
            $name = $_REQUEST['wiz_step3_subscription_name'];
        }
        //if subscription list is not specified then create and attach default one
        $pl_subs->name = $name;
        $pl_subs->list_type = 'default';
        $pl_subs->assigned_user_id= $GLOBALS['current_user']->id;
        $pl_subs->save();
        $pl_list[] = $pl_subs; 
    }

    //process exempt target list
    $create_new = true;    
    $pl_un_subs = new ProspectList();
    if(!empty($_REQUEST['wiz_step3_unsubscription_list_id'])){
        //if unsubscription list is specified then attach 
        $pl_un_subs->retrieve($_REQUEST['wiz_step3_unsubscription_list_id']);
        //check to see name matches the bean, if not, then the user has chosen to create new bean
        if($pl_un_subs->name == $_REQUEST['wiz_step3_unsubscription_name']){
            $pl_list[] = $pl_un_subs; 
            $create_new = false;
       }

    }
    //create new bean if one was not retrieved succesfully
    if($create_new){
        //use default name if one has not been specified
        $name = $campaign_name . " ".$mod_strings['LBL_UNSUBSCRIPTION_LIST'];
        if(isset($_REQUEST['wiz_step3_unsubscription_name']) && !empty($_REQUEST['wiz_step3_unsubscription_name'])){
            $name = $_REQUEST['wiz_step3_unsubscription_name'];
        }
        //if unsubscription list is not specified then create and attach default one
        $pl_un_subs->name = $name;
        $pl_un_subs->list_type = 'exempt';
        $pl_un_subs->assigned_user_id= $GLOBALS['current_user']->id;
        $pl_un_subs->save();
        $pl_list[] = $pl_un_subs; 
    }
    
    //process test target list
    $pl_test = new ProspectList();
    $create_new = true;
    if(!empty($_REQUEST['wiz_step3_test_list_id'])){
        //if test list is specified then attach         
        $pl_test->retrieve($_REQUEST['wiz_step3_test_list_id']);
        //check to see name matches the bean, if not, then the user has chosen to create new bean        
        if($pl_test->name == $_REQUEST['wiz_step3_test_name']){
            $pl_list[] = $pl_test;
            $create_new = false;
        }
    }
    //create new bio if one was not retrieved succesfully
    if($create_new){
        //use default name if one has not been specified        
        $name = $campaign_name . " ".$mod_strings['LBL_TEST_LIST'];
        if(isset($_REQUEST['wiz_step3_test_name']) && !empty($_REQUEST['wiz_step3_test_name'])){
            $name = $_REQUEST['wiz_step3_test_name'];
        }
        //if test list is not specified then create and attach default one        
        $pl_test->name = $name; 
        $pl_test->list_type = 'test';
        $pl_test->assigned_user_id= $GLOBALS['current_user']->id;
        $pl_test->save();
        $pl_list[] = $pl_test; 
    }
    
    return $pl_list;
}
?>
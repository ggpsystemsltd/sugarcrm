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

require_once('modules/Campaigns/utils.php');

global $mod_strings, $app_list_strings, $app_strings, $current_user, $import_bean_map;
global $import_file_name, $theme;

$focus = 0;
if(isset($_REQUEST['return_module'])){
    if($_REQUEST['return_module'] == 'Contacts'){
        
        $focus = new Contact();
    }
    if($_REQUEST['return_module'] == 'Leads'){
        
        $focus = new Lead();
    }
    if($_REQUEST['return_module'] == 'Prospects'){
        
        $focus = new Prospect();
    }        
}

if(isset($_REQUEST['record'])) {
    $GLOBALS['log']->debug("In Subscriptions, about to retrieve record: ".$_REQUEST['record']);
    $result = $focus->retrieve($_REQUEST['record']);
    if($result == null)
    {
        sugar_die($app_strings['ERROR_NO_RECORD']);
    }
}


$this->ss->assign("MOD", $mod_strings);
$this->ss->assign("APP", $app_strings);

if(isset($_REQUEST['return_module'])){$this->ss->assign("RETURN_MODULE", $_REQUEST['return_module']);}
if(isset($_REQUEST['return_id'])){$this->ss->assign("RETURN_ID", $_REQUEST['return_id']);}
if(isset($_REQUEST['return_action'])){$this->ss->assign("RETURN_ACTION", $_REQUEST['return_action']);}
if(isset($_REQUEST['record'])){$this->ss->assign("RECORD", $_REQUEST['record']);}

//if subsaction has been set, then process subscriptions
if(isset($_REQUEST['subs_action'])){manageSubscriptions($focus);}

//$title = $GLOBALS['app_strings']['LBL_MANAGE_SUBSCRIPTIONS_FOR'].$focus->name;
$params = array();
$params[]  = "<a href='index.php?module={$focus->module_dir}&action=index'>{$focus->module_dir}</a>";
$params[] = "<a href='index.php?module={$focus->module_dir}&action=DetailView&record={$focus->id}'>{$focus->name}</a>";
$params[] = $mod_strings['LBL_MANAGE_SUBSCRIPTIONS_TITLE'];
$title = getClassicModuleTitle($focus->module_dir, $params, true);
$orig_vals_str = printOriginalValues($focus);    
$orig_vals_array = constructDDSubscriptionList($focus);

$this->ss->assign('APP', $GLOBALS['app_strings']);
$this->ss->assign('MOD', $GLOBALS['mod_strings']);
$this->ss->assign('title',  $title);

$this->ss->assign('enabled_subs', $orig_vals_array[0]);
$this->ss->assign('disabled_subs', $orig_vals_array[1]);
$this->ss->assign('enabled_subs_string', $orig_vals_str[0]);
$this->ss->assign('disabled_subs_string', $orig_vals_str[1]);

echo $this->ss->fetch('modules/Campaigns/Subscriptions.tpl');




/*
 *This function constructs Drag and Drop multiselect box of subscriptions for display in manage subscription form  
*/
function constructDDSubscriptionList($focus,$classname=''){
require_once("include/templates/TemplateDragDropChooser.php");    
global $mod_strings;
$unsubs_arr = ''; 
$subs_arr =  '';

// Lets start by creating the subscription and unsubscription arrays 
    $subscription_arrays = get_subscription_lists($focus);
    $unsubs_arr = $subscription_arrays['unsubscribed']; 
    $subs_arr =  $subscription_arrays['subscribed'];

    $comb_array = array();
	$comb_array [0] = array();
	$comb_array [1] = array();

    foreach ($subs_arr as $key=>$val){
        $comb_array [0][$val] = $key;
    }    

	
	foreach ($unsubs_arr as $key=>$val){
        $comb_array [1][$val] = $key;
    }

    return $comb_array ;  
       
}



/*
 *This function constructs multiselect box of subscriptions for display in manage subscription form  
*/
function printOriginalValues($focus){
    global $app_strings;
    $unsubs_arr = ''; 
    $subs_arr =  '';
    $return_arr =  '';
        
     // Lets start by creating the subscription and unsubscription arrays 
        $subscription_arrays = get_subscription_lists($focus);
        $unsubs_arr = $subscription_arrays['unsubscribed']; 
        $subs_arr =  $subscription_arrays['subscribed'];
    
//    ORIG_UNSUBS_VALUES
        $unsubs_vals = ' ';
        $subs_vals = ' ';
        foreach($subs_arr as $name => $id){
            $subs_vals .= ", $id";
        }
        $return_arr[]=$subs_vals;

        foreach($unsubs_arr as $name => $id){
            $unsubs_vals .= ", $id";
        }

        $return_arr[]=$unsubs_vals;

        return $return_arr;        
    }
    

/*
 * Perform Subscription management work.  This function processes selected subscriptions and calls the
 * right methods to subscribe or unsubscribe the user
 * */

function manageSubscriptions($focus){


    //Process Subscription Lists first
    //compare current list of subscriptions to original list and see if there are any additions
    $orig_subscription_arr = array();
    $curr_subscription_arr = array();
    //build array of original subscriptions
    if(isset($_REQUEST['orig_enabled_values'])  && ! empty($_REQUEST['orig_enabled_values'])){
     $orig_subscription_arr = explode(",", $_REQUEST['orig_enabled_values']);
     $orig_subscription_arr = process_subscriptions($orig_subscription_arr);   
    }        

    //build array of current subscriptions
    if(isset($_REQUEST['enabled_subs'])  && ! empty($_REQUEST['enabled_subs'])){
     $curr_subscription_arr = explode(",", $_REQUEST['enabled_subs']);
     $curr_subscription_arr = process_subscriptions($curr_subscription_arr);   
    }        

    //compare both arrays and find differences
    $i=0;
    while($i<(count($curr_subscription_arr)/2)){    
        //if current subscription existed in original subscription list, do nothing
        if(in_array($curr_subscription_arr['campaign'.$i], $orig_subscription_arr)){
            //nothing to process
        }else{
         //current subscription is new, so subscribe
            subscribe($curr_subscription_arr['campaign'.$i], $curr_subscription_arr['prospect_list'.$i], $focus);
        }
        $i = $i +1;   
    }        

    //Now process UnSubscription Lists first
    //compare current list of subscriptions to original list and see if there are any additions
    $orig_unsubscription_arr = array();
    $curr_unsubscription_arr = array();

    //build array of original subscriptions
    if(isset($_REQUEST['orig_disabled_values'])  && ! empty($_REQUEST['orig_disabled_values'])){
     $orig_unsubscription_arr = explode(",", $_REQUEST['orig_disabled_values']);
     $orig_unsubscription_arr = process_subscriptions($orig_unsubscription_arr);   
    }        

    //build array of current subscriptions
    if(isset($_REQUEST['disabled_subs'])  && ! empty($_REQUEST['disabled_subs'])){
     $curr_unsubscription_arr = explode(",", $_REQUEST['disabled_subs']);
     $curr_unsubscription_arr = process_subscriptions($curr_unsubscription_arr);   
    }        
    //compare both arrays and find differences
    $i=0;
    while($i<(count($curr_unsubscription_arr)/2)){    
        //if current subscription existed in original subscription list, do nothing
        if(in_array($curr_unsubscription_arr['campaign'.$i], $orig_unsubscription_arr)){
            //nothing to process
        }else{
         //current subscription is new, so subscribe
            unsubscribe($curr_unsubscription_arr['campaign'.$i], $focus);
        }
        $i = $i +1;   
    }
    
}

?>
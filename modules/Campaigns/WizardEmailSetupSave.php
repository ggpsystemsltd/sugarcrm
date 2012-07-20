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


//get new administration bean for setup
$focus = new Administration();
$camp_steps[] = 'wiz_step_';
$camp_steps[] = 'wiz_step1_';
$camp_steps[] = 'wiz_step2_';

    //name is used as key in post, it is also used in creation of summary page for wizard,
    //so let's clean up the posting so we can reuse the save functionality for inbound emails and
    //from existing save.php's  
    foreach($camp_steps as $step){
        clean_up_post($step);
    }
/**************************** Save general Email Setup  *****************************/

//we do not need to track location if location type is not set
if(isset($_POST['tracking_entities_location_type'])) {
    if ($_POST['tracking_entities_location_type'] != '2') {
        unset($_POST['tracking_entities_location']);
        unset($_POST['tracking_entities_location_type']);
    }
}
//if the check box is empty, then set it to 0
if(!isset($_POST['mail_smtpauth_req'])) { $_POST['mail_smtpauth_req'] = 0; }
//default ssl use to false
if(!isset($_POST['mail_smtpssl'])) { $_POST['mail_smtpssl'] = 0; }
//reuse existing saveconfig functinality
$focus->saveConfig();



/**************************** Add New Monitored Box  *****************************/
//perform this if the option to create new mail box has been checked
if(isset($_REQUEST['wiz_new_mbox']) && ($_REQUEST['wiz_new_mbox']=='1')){
    
   //Populate the Request variables that inboundemail expects 
    $_REQUEST['mark_read'] = 1;
    $_REQUEST['only_since'] = 1;
    $_REQUEST['mailbox_type'] = 'bounce';
    $_REQUEST['from_name'] = $_REQUEST['name'];
    $_REQUEST['group_id'] = 'new';
//    $_REQUEST['from_addr'] = $_REQUEST['wiz_step1_notify_fromaddress'];
    //reuse save functionality for inbound email
    require_once('modules/InboundEmail/Save.php');    

}
//set navigation details
header("Location: index.php?action=index&module=Campaigns");


/*
 * This function will re-add the post variables that exist with the specified prefix.  
 * It will add them minus the specified prefix.  This is needed in order to reuse the save functionality,
 * which does not expect the prefix, and still use the generic create summary functionality in wizard, which
 * does expect the prefix.  
 */
function clean_up_post($prefix){

    foreach ($_REQUEST as $key => $val) {
              if((strstr($key, $prefix )) && (strpos($key, $prefix )== 0)){
              $newkey  =substr($key, strlen($prefix)) ;
              $_REQUEST[$newkey] = $val;
         }               
    }

    foreach ($_POST as $key => $val) {
              if((strstr($key, $prefix )) && (strpos($key, $prefix )== 0)){
              $newkey  =substr($key, strlen($prefix)) ;
              $_POST[$newkey] = $val;
              
         }               
    }
}

?>
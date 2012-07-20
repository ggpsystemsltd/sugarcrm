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

if(is_admin($current_user)){
    global $mod_strings; 

    
    //echo out warning message and msgDiv
    echo '<br>'.$mod_strings['LBL_REPAIR_JS_FILES_PROCESSING'];
    echo'<div id="msgDiv"></div>';        

    //echo out script that will make an ajax call to process the files via callJSRepair.php
     echo "<script>
        var ajxProgress;
        var showMSG = 'true';
        //when called, this function will make ajax call to rebuild/repair js files
        function callJSRepair() {
        
            //begin main function that will be called
            ajaxCall = function(){
                //create success function for callback
                success = function() {              
                    //turn off loading message
                    ajaxStatus.hideStatus();
                    var targetdiv=document.getElementById('msgDiv');
                    targetdiv.innerHTML=SUGAR.language.get('Administration', 'LBL_REPAIR_JS_FILES_DONE_PROCESSING');
                }//end success
        
                        
                        
                //set loading message and create url
                ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_PROCESSING_REQUEST'));
                postData = \"module=Administration&action=callJSRepair&js_admin_repair=".$_REQUEST['type']."&root_directory=".urlencode(getcwd())."\";
                 
    
                        
                //if this is a call already in progress, then just return               
                    if(typeof ajxProgress != 'undefined'){ 
                        return;                            
                    }
                        
                //make asynchronous call to process js files
                var ajxProgress = YAHOO.util.Connect.asyncRequest('POST','index.php', {success: success, failure: success}, postData);
                        
    
            };//end ajaxCall method
    
                    
            //show loading status and make ajax call
//            ajaxStatus.hideStatus();
//            ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_PROCESSING_REQUEST'));
            window.setTimeout('ajaxCall()', 2000);
            return;
    
        }
        //call function, so it runs automatically    
        callJSRepair();
        </script>";
        
}




?>
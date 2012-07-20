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

    /*
    **this is the ajax call that is called from RebuildJSLang.php.  It processes
    **the Request object in order to call correct methods for repairing/rebuilding JSfiles
    *Note that minify.php has already been included as part of index.php, so no need to include again.
    */ 

 
    //set default root directory
    $from = getcwd();
    if(isset($_REQUEST['root_directory'])  && !empty($_REQUEST['root_directory'])){
        $from = $_REQUEST['root_directory'];
    }
    //this script can take a while, change max execution time to 10 mins
    $tmp_time = ini_get('max_execution_time');
    ini_set('max_execution_time','600');
        
        //figure out which commands to call.  
        if($_REQUEST['js_admin_repair'] == 'concat' ){
            //concatenate mode, call the files that will concatenate javascript group files
            $_REQUEST['js_rebuild_concat'] = 'rebuild';
            require_once('jssource/minify.php');
         
        }else{
            $_REQUEST['root_directory'] = getcwd();
            require_once('jssource/minify.php');
        
            if($_REQUEST['js_admin_repair'] == 'replace'){
                //should replace compressed JS with source js
                reverseScripts("$from/jssource/src_files","$from");    
    
            }elseif($_REQUEST['js_admin_repair'] == 'mini'){
                //should replace compressed JS with minified version of source js
                reverseScripts("$from/jssource/src_files","$from");
                BackUpAndCompressScriptFiles("$from","",false);
                ConcatenateFiles("$from");
    
            }elseif($_REQUEST['js_admin_repair'] == 'repair'){
             //should compress existing javascript (including changes done) without overwriting original source files
                BackUpAndCompressScriptFiles("$from","",false);
                ConcatenateFiles("$from");        
            }
        }
    //set execution time back to what it was   
    ini_set('max_execution_time',$tmp_time);

    
 
?>

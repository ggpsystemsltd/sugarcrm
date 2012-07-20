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






set_time_limit(3600);
ini_set('default_socket_timeout', 360);
function ConvertDiscClient(){

    global $sugar_config;
    global $app_strings;
    global $app_list_strings;
    global $mod_strings;

    $xtpl=new XTemplate ('modules/Administration/ConvertDiscClient.html');
    $xtpl->assign("MOD", $mod_strings);
    $xtpl->assign("APP", $app_strings);

    echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings['LBL_MODULE_NAME'],$mod_strings['LBL_UPGRADE_CONVERT_DISC_CLIENT_TITLE']), false);
    
    require_once('include/nusoap/nusoap.php');

    $errors = array();

    $server_url = "http://";
    $user_name  = "";
    $admin_name  = "";
    $password   = "";

    // run options are: convert, sync
    // default behavior of this page
    $run = "convert";
    if( isset( $_REQUEST['run'] ) ){
        $run = $_REQUEST['run'];
    }

    if( $run == "convert" ){
        if( isset($_REQUEST['server_url']) ){
            $server_url = $_REQUEST['server_url'];
            if( $server_url == "" ){
                $errors[] = "Server URL cannot be empty.";
            }
        }
    }
    else if( $run == "sync" ){
        $server_url = $sugar_config['sync_site_url'];
    }

    if( isset($_REQUEST['user_name']) ){
        $user_name = $_REQUEST['user_name'];
        if( $user_name == "" ){
            $errors[] = "User Name cannot be empty.";
        }
    }
    if( isset($_REQUEST['password']) ){
        if( $_REQUEST['password'] == "" ){
            $errors[] = "Password cannot be empty.";
        }
    }
     if( isset($_REQUEST['admin_name']) ){
     	$admin_name = $_REQUEST['admin_name'];
        if( $_REQUEST['admin_name'] == "" ){
            $errors[] = "Admin Name cannot be empty.";
        }
    }

    if( $run == "convert" ){
        if( !is_writable( "config.php" ) ){
            $errors[] = "Please make your config.php writable in order to continue.";
        }
    }

    if( isset( $_REQUEST['submitted'] ) && sizeof( $errors ) == 0 ){
          if(empty($server_url) || $server_url == 'http://'){
        	 $errors[] = "Server URL is required";
        }else{
        	
        $soapclient = new nusoapclient( "$server_url/soap.php" );
        $soapclient->response_timeout = 360;
		if($soapclient->call('is_loopback', array())){
			$errors[] = "Server and Client must be on seperate machines with unique ip addresses";	
		}
		if(!$soapclient->call('offline_client_available', array())){
			$errors[] = "No licenses available for offline client";	
		}
        $result = $soapclient->call( 'login', array('user_auth'=>array('user_name'=>$admin_name,'password'=>md5($_REQUEST['password']), 'version'=>'.01'), 'application_name'=>'Disconnected Client Setup'));
        if( $soapclient->error_str ){
            $errors[] = "Login failed with error: " . $soapclient->error_str;
        }
        
        if( $result['error']['number'] != 0 ){
        	 $errors[] = "Login failed with error: " . $result['error']['name'] . ' ' . $result['error']['description'];
        	
        }
          
      
        $session = $result['id'];
        if(empty($errors)){
        	$result = $soapclient->call( 'sudo_user', array('session'=>$session, 'user_name'=>$user_name));
         if( $soapclient->error_str ){
            $errors[] = "switch to $user_name failed with error: " . $soapclient->error_str;
        }
        
        if(isset($result['error']) &&  $result['error']['number'] != 0 ){
        	 $errors[] = "switch to $user_namewith error: " . $result['error']['name'] . ' ' . $result['error']['description'];
        	
        }
        }
          }
		 $errorString = "";
		 if(!empty($errors)){
	   		 foreach( $errors as $error ){
	      		 $errorString .= $error . "<br>" ;
	  		  }
		 }
  		  echo '<font color="red"> ' . $errorString . '</font>';
       
        if( $session  && empty($errors)){
            if( $run == "convert" ){
                // register this client/user with server

                // update local config.php file
                $sugar_config['disc_client']    = true;
                $sugar_config['sync_site_url']  = $server_url;

               	//attempt to obtain the system_id from the server
        		$result = $soapclient->call('get_unique_system_id', array('session'=>$session, 'unique_key'=>$sugar_config['unique_key']));
         		if( $soapclient->error_str ){
            		$errors[] = "Unable to obtain unique system id from server: " . $soapclient->error_str;
        		}
        		else{
					
					$admin = new Administration();
					$system_id = $result['id'];
					if(!isset($system_id)){
						$system_id = 1;
					}
					$admin->saveSetting('system', 'system_id', $system_id); 
        		}
            }

            // run the file sync
            require_once( "include/utils/disc_client_utils.php" );
            disc_client_file_sync( $soapclient, $session, true );
			
            // data sync triggers
            
            require_once("modules/Sync/SyncHelper.php");
            sync_users($soapclient, $session, true);
             ksort( $sugar_config );
			echo 'Updating Local Information<br>';
             if( !write_array_to_file( "sugar_config", $sugar_config, "config.php" ) ){
                   $xtpl->assign("COMPLETED_MESSAGE","Failed to write your config.php file, please make it writable and try again (it was writable before the submit)." );
                   $xtpl->parse("main.complete");
                   return;
                }
			 	echo 'Done - will auto logout in <div id="seconds_left">10</div> seconds<script> function logout_countdown(left){document.getElementById("seconds_left").innerHTML = left; if(left == 0){document.location.href = "index.php?module=Users&action=Logout";}else{left--; setTimeout("logout_countdown("+ left+")", 1000)}};setTimeout("logout_countdown(10)", 1000)</script>';
            // done with soap calls
            $result = $soapclient->call( 'logout', array('session'=>$session) );
			
            $xtpl->assign("COMPLETED_MESSAGE","Synchronization complete." );
            $xtpl->parse("main.complete");
          
            return;
        }
    }

    $errorString = "";
    foreach( $errors as $error ){
       $errorString .= $error . "<br>" ;
    }
   
    if(!empty($errorString)){
         $xtpl->assign("COMPLETED_MESSAGE",$errorString);
         $xtpl->parse("main.complete");
    }

    if( ($run == "convert") && isset($sugar_config['disc_client']) && $sugar_config['disc_client'] == true ){
        $xtpl->parse("main.existing");
    }
    else{
        if( $run == "convert" ){

            $xtpl->assign("SERVER_URL",$server_url);
        }
            $xtpl->assign("USER_NAME", $user_name);
             $xtpl->assign("ADMIN_NAME", $admin_name);
            $xtpl->assign("SUBMITTTED", "true");
            $xtpl->assign("RUN", $run);

        if( $run == "convert" ){
            $xtpl->assign("SUBMIT_MESSAGE", "Clicking Submit will convert this installation to a disconnected client.  Any existing data will be lost.");
        }
        else if( $run == "sync" ){
            $xtpl->assign("SUBMIT_MESSAGE","Clicking Submit will sycnhronize you with the master server." );
        }
       $xtpl->parse("main.convert");
    }
     $xtpl->parse("main");
     $xtpl->out("main");
} // end of function ConvertDiscClient

ConvertDiscClient();

?>
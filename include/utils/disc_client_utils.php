<?php
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




if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



require_once ('include/utils/zip_utils.php');

function convert_disc_client(){
	set_time_limit(3600);
	ini_set('default_socket_timeout', 360);
	global $sugar_config;
	require_once('include/nusoap/nusoap.php');

    $errors = array();

    $server_url = "http://";
    $user_name  = "";
    $admin_name  = "";
    $password   = "";

    $oc_install = false;
	if(empty($sugar_config['unique_key'])){
		$sugar_config['unique_key'] = create_guid();
    }
    if(isset($_SESSION['oc_install']) && $_SESSION['oc_install'] == true){
    	$oc_install = true;
    }

    // run options are: convert, sync
    // default behavior of this page
    $run = "convert";
    if(!$oc_install){
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
	        else{
	        	$password = $_REQUEST['password'];
	        }
	    }

    }
    else{
    	//this is an offline client install
    	if( isset( $_SESSION['oc_run'] ) ){
	        $run = $_SESSION['oc_run'];
	    }

	    if( $run == "convert" ){
	        if( isset($_SESSION['oc_server_url']) ){
	            $server_url = $_SESSION['oc_server_url'];
	            if( $server_url == "" ){
	                $errors[] = "Server URL cannot be empty.";
	            }
	        }
	    }
	    else if( $run == "sync" ){
	        $server_url = $sugar_config['sync_site_url'];
	    }

	    if( isset($_SESSION['oc_username']) ){
	        $user_name = $_SESSION['oc_username'];
	        if( $user_name == "" ){
	            $errors[] = "User Name cannot be empty.";
	        }
	    }
	    if( isset($_SESSION['oc_password']) ){
	        if( $_SESSION['oc_password'] == "" ){
	            $errors[] = "Password cannot be empty.";
	        }
	         else{
	        	$password = $_SESSION['oc_password'];
	        }
	    }
    }//end check for offline client install

    if(!isset($_SESSION['is_oc_conversion']) || $_SESSION['is_oc_conversion'] == false){
        $password = md5($password);
    }

    $sugar_config['oc_username'] = $user_name;
    $sugar_config['oc_password'] = $password;
    $sugar_config['oc_converted'] = false;
    $sugar_config['disc_client']    = true;
    if(isset($_SESSION['install_method'])){
        $sugar_config['install_method'] = $_SESSION['install_method'];
    }

    if((isset( $_REQUEST['submitted']) || $oc_install) && sizeof( $errors ) == 0 ){
          if(empty($server_url) || $server_url == 'http://'){
        	 $errors[] = "Server URL is required";
        }else{
        $sugar_config['sync_site_url']  = $server_url;

        $soapclient = new nusoapclient( "$server_url/soap.php" );
        $soapclient->response_timeout = 360;
		if($soapclient->call('is_loopback', array())){
			$errors[] = "Server and Client must be on seperate machines with unique ip addresses";
		}
        $result = $soapclient->call('get_sugar_flavor', array());
        global $sugar_flavor, $sugar_version;


        if($result != $sugar_flavor){
            $errors[] = "Server and Client must both be running the same flavor of Sugar.";
        }
		if(!$soapclient->call('offline_client_available', array())){
			$errors[] = "No licenses available for offline client";
		}
        $result = $soapclient->call( 'login', array('user_auth'=>array('user_name'=>$user_name,'password'=>$password, 'version'=>'.01'), 'application_name'=>'Disconnected Client Setup'));
        if( $soapclient->error_str ){
            $errors[] = "Login failed with error: " . $soapclient->response;
        }

        if( $result['error']['number'] != 0 ){
        	 $errors[] = "Login failed with error: " . $result['error']['name'] . ' ' . $result['error']['description'];

        }


        $session = $result['id'];
          }
		 $errorString = "";
		 if(!empty($errors)){
	   		 foreach( $errors as $error ){
	      		 $errorString .= $error . "<br>" ;
	  		  }
		 }

        if( $session  && empty($errors)){
            if( $run == "convert" ){
                // register this client/user with server

                // update local config.php file

                $install_method = 'web';
                if(isset($sugar_config['install_method'])){
                    $install_method = $sugar_config['install_method'];
                }
               	//attempt to obtain the system_id from the server
                //php_uname('n') will only work on a windows system
                $machine_name = php_uname('n');
                $soapclient->setHeaders('sugar_version='.$sugar_version);
        		$result = $soapclient->call('get_unique_system_id', array('session'=>$session, 'unique_key'=>$sugar_config['unique_key'], 'system_name' => $machine_name, 'install_method' => $install_method));
         		if( $soapclient->error_str ){
            		$errors[] = "Unable to obtain unique system id from server: " . $soapclient->error_str;
        		}
        		else{
                    if( $result['error']['number'] != 0 ){
                       $errors[] =  $result['error']['description'];
                    }else{

					   $admin = new Administration();
					   $system_id = $result['id'];
					   if(!isset($system_id)){
						  $system_id = 1;
					   }
					   $admin->saveSetting('system', 'system_id', $system_id);
                    }
        		}
            }

            // data sync triggers
            if(empty($errors)){
                require_once("modules/Sync/SyncHelper.php");
                sync_users($soapclient, $session, true, true);
                $sugar_config['oc_converted'] = true;

			    echo 'Updating Local Information<br>';
			 	//echo 'Done - will auto logout in <div id="seconds_left">10</div> seconds<script> function logout_countdown(left){document.getElementById("seconds_left").innerHTML = left; if(left == 0){document.location.href = "index.php?module=Users&action=Logout";}else{left--; setTimeout("logout_countdown("+ left+")", 1000)}};setTimeout("logout_countdown(10)", 1000)</script>';
                // done with soap calls
                $result = $soapclient->call( 'logout', array('session'=>$session) );
	            ksort( $sugar_config );
			    if( !write_array_to_file( "sugar_config", $sugar_config, "config.php" ) ){
			        return;
			    }
            }
        }
    }


    $errorString = "";
    foreach( $errors as $error ){
       $errorString .= $error . "<br>" ;
    }

    return $errorString;
}

function disc_client_utils_print( $str, $verbose ){

    if( $verbose ){

        print( $str );

    }

}

/*
 * disc_client_get_zip: This method will be used during an Offline Client sync.  It works by
 * generated an md5 file for the files on the client and then passes this file onto the server.
 * The server then generates its own md5 file and compares the server md5 file to the client md5 file
 * and builds a list of files that need to be passed back to the client.
 * The server then puts these files into a zip and passes this zip back to the client.  The client will
 * then unzip this file into the root directory.
 */
function disc_client_get_zip( $soapclient, $session, $verbose=false , $attempts = 0, $force_md5_sync = false){
	$max_attempts = 3;
    global $sugar_config, $timedate;
     // files might be big
    ini_set( "memory_limit", "-1" );
    set_time_limit(3600);
	ini_set('default_socket_timeout', 3600);
    $return_str  = "";

    //1) rather than using md5, we will use the date_modified
    if (file_exists('modules/Sync/file_config.php') && $force_md5_sync != true) {
		require_once ('modules/Sync/file_config.php');
        global $file_sync_info;
		if(!isset($file_sync_info['last_local_sync']) && !isset($file_sync_info['last_server_sync'])){
			$last_server_sync = $last_local_sync = $timedate->nowDb();
    		$is_first_sync = true;
		}else{
			$last_local_sync = $file_sync_info['last_local_sync'];
			$last_server_sync = $file_sync_info['last_server_sync'];
			$is_first_sync = false;
		}
    }
    else{
    	$last_server_sync = $last_local_sync = $timedate->nowDb();
    	$is_first_sync = true;
    }

    $tempdir = create_cache_directory("disc_client");
    $temp_file  = tempnam($tempdir, "sug" );
    $file_list = array();
    if(!$is_first_sync){
    	$all_src_files  = findAllTouchedFiles( ".", array(), $last_local_sync);

    	foreach( $all_src_files as $src_file ){
        	$file_list[$src_file] = $src_file;
    	}
    }else{
    	$all_src_files  = findAllFiles( ".", array());
    	 require("install/data/disc_client.php");
    	 foreach( $all_src_files as $src_file ){
    		foreach($disc_client_ignore as $ignore_pattern ){
            	if(!preg_match( "#" . $ignore_pattern . "#", $src_file ) ){
                	$md5 = md5_file( $src_file );
        			$file_list[$src_file] = $md5;
            	}
        	}
    	}
    }



    //2) save the list of md5 files to file system
    if( !write_array_to_file( "client_file_list", $file_list, $temp_file ) ){
        echo "Could not save file.";
    }

	// read file
    $contents = sugar_file_get_contents($temp_file);
	$md5 = md5($contents);

    // encode data
    $data = base64_encode($contents);
    $md5file  = array('filename'=>$temp_file, 'md5'=>$md5, 'data'=>$data, 'error' => null);
    $result = $soapclient->call('get_encoded_zip_file', array( 'session'=>$session, 'md5file'=>$md5file, 'last_sync' => $last_server_sync, 'is_md5_sync' => $is_first_sync));

    //3) at this point we could have the zip file
    $zip_file = tempnam($tempdir, "zip" ).'.zip';
    if(isset($result['result']) && !empty($result['result'])){
    	$fh = sugar_fopen($zip_file, 'w');
    	fwrite($fh, base64_decode($result['result']));
		fclose($fh);

		unzip($zip_file, ".", true);
    }

    if(file_exists($zip_file)){
        unlink($zip_file);
    }
	$file_sync_info['last_local_sync'] = $timedate->nowDb();
	$server_time = $soapclient->call('get_gmt_time', array ());
	$file_sync_info['last_server_sync'] = $server_time;
	$file_sync_info['is_first_sync'] = $is_first_sync;
	write_array_to_file('file_sync_info', $file_sync_info, 'modules/Sync/file_config.php');
	echo "File sync complete.";
}

/*
 * Obtain a list of required upgrades from the server
 *
 * @param soapclient           the nusoap client to use for request
 * @param session              the authenticated session to use for request
 *
 * return                  true if at least one upgrade was applied, false otherwise
 */
function get_required_upgrades($soapclient, $session){
	global $sugar_config, $sugar_version;
	require_once('include/nusoap/nusoap.php');

    $errors = array();


    $upgrade_history = new UpgradeHistory();
    $upgrade_history->disable_row_level_security = true;
    $installeds = $upgrade_history->getAllOrderBy('date_entered ASC');
    $history = array();
    require_once('soap/SoapError.php');
	$error = new SoapError();
    foreach($installeds as $installed)
	{
		$history[] = array('id' => $installed->id, 'filename' => $installed->filename, 'md5' => $installed->md5sum, 'type' => $installed->type, 'status' => $installed->status, 'version' => $installed->version, 'date_entered' => $installed->date_entered, 'error' => $error->get_soap_array());
	}

    $result = $soapclient->call('get_required_upgrades', array('session'=>$session, 'client_upgrade_history' => $history, 'client_version' => $sugar_version));

    $tempdir_parent = create_cache_directory("disc_client");
    $temp_dir = tempnam($tempdir_parent, "sug");
    sugar_mkdir($temp_dir, 0775);

    $upgrade_installed = false;

    if(empty($soapclient->error_str) && $result['error']['number'] == 0){
        foreach($result['upgrade_history_list'] as $upgrade){
            $file_result = $soapclient->call('get_encoded_file', array( 'session'=>$session, 'filename'=>$upgrade['filename']));

            if(empty($soapclient->error_str) && $result['error']['number'] == 0){
                if($file_result['md5'] == $upgrade['md5']){
                    $newfile = write_encoded_file($file_result, $temp_dir);
                    unzip($newfile, $temp_dir);
					global $unzip_dir;
					$unzip_dir = $temp_dir;

                    if(file_exists("$temp_dir/manifest.php")){
                        require_once("$temp_dir/manifest.php");
                        global $manifest_arr;
                        $manifest_arr = $manifest;
                        if(!isset($manifest['offline_client_applicable']) || $manifest['offline_client_applicable'] == true || $manifest['offline_client_applicable'] == 'true'){
                            if(file_exists("$temp_dir/scripts/pre_install.php")){
                                require_once("$temp_dir/scripts/pre_install.php");
                                pre_install();
                            }

                            if( isset( $manifest['copy_files']['from_dir'] ) && $manifest['copy_files']['from_dir'] != "" ){
                                $zip_from_dir   = $manifest['copy_files']['from_dir'];
                            }
                            $source = "$temp_dir/$zip_from_dir";
                            $dest = getcwd();
                            copy_recursive($source, $dest);

                            if(file_exists("$temp_dir/scripts/post_install.php")){
                                require_once("$temp_dir/scripts/post_install.php");
                                post_install();
                            }

                            //save newly installed upgrade
                            $new_upgrade = new UpgradeHistory();
                            $new_upgrade->filename      = $upgrade['filename'];
                            $new_upgrade->md5sum        = $upgrade['md5'];
                            $new_upgrade->type          = $upgrade['type'];
                            $new_upgrade->version       = $upgrade['version'];
                            $new_upgrade->status        = "installed";
                            $new_upgrade->save();
                            $upgrade_installed = true;
                        }
                    }
                }
            }
        }
    }
    return $upgrade_installed;
}

function disc_client_file_sync( $soapclient, $session, $verbose=false , $attempts = 0)
{
	$max_attempts = 3;
    global $sugar_config;

    // files might be big
    ini_set( "memory_limit", "-1" );
    $return_str  = "";

    $tempdir_parent = create_cache_directory("disc_client");
    $temp_dir = tempnam($tempdir_parent, "sug");
    sugar_mkdir($temp_dir, 0775);
    if( !is_dir( $temp_dir ) ) {
        die( "Could not create a temp dir." );
    }

    // get pattern file
    $result = $soapclient->call( 'get_encoded_file', array( 'session'=>$session, 'filename'=>"install/data/disc_client.php" ) );

    if( !empty($soapclient->error_str)){
		if($attempts < $max_attempts && substr_count($soapclient->error_str, 'HTTP Error: socket read of headers timed out') > 0){
			echo "Could not retrieve file patterns list.  Error was: " . $soapclient->error_str;

			$attempts++;
			echo "<BR> $attempts of $max_attempts attempts trying again<br>";
			flush();
			ob_flush();
			return disc_client_file_sync($soapclient, $session, $verbose, $attempts);

		}
        die( "Failed: Could not retrieve file patterns list.  Error was: " . $soapclient->error_str);

    }
    if($result['error']['number'] != 0){
    	die( "Failed: Could not retrieve file patterns list.  Error was: " . $result['error']['name'] . ' - ' . $result['description']);
    }



    $newfile = write_encoded_file( $result, $temp_dir );

    if( !copy( $newfile, $result['filename'] ) ){

        die( "Could not copy $newfile to new location." );

    }



    // get array definitions: $disc_client_ignore

    require( "install/data/disc_client.php" );





    // get file list/md5s, write as temp file, then require_once from tmp location

    $result = $soapclient->call( 'get_disc_client_file_list',  array( 'session'=>$session ) );



    if( !empty($soapclient->error_str)){
		if($attempts < $max_attempts && substr_count($soapclient->error_str, 'HTTP Error: socket read of headers timed out') > 0){
			echo "Could not retrieve file patterns list.  Error was: " . $soapclient->error_str;
			$attempts++;
			echo "<BR> $attempts of $max_attempts attempts trying again<br>";
			flush();
			ob_flush();
			return disc_client_file_sync($soapclient, $session, $verbose, $attempts);

		}
        die( "Failed: Could not retrieve file  list.  Error was: " . $soapclient->error_str);

    }
    if($result['error']['number'] != 0){
    	die( "Failed: Could not retrieve file  list.  Error was: " . $result['error']['name'] . ' - ' . $result['description']);
    }



    $temp_file  = tempnam( $temp_dir, "sug" );

    write_encoded_file( $result, $temp_dir, $temp_file );



    require_once( $temp_file );





    // determine which files are needed locally

    $needed_file_list   = array();

    $server_files       = array();  // used later for removing unneeded local files

    foreach( $server_file_list as $result ){

        $server_filename    = $result['filename'];

        $server_md5         = $result['md5'];

        $server_files[]     = $server_filename;



        $ignore = false;

        foreach( $disc_client_ignore as $ignore_pattern ){

            if( preg_match( "#" . $ignore_pattern . "#", $server_filename ) ){

                $ignore = true;

            }

        }


		if(file_exists($server_filename)){
       		if(!$ignore && ( md5_file( $server_filename ) != $server_md5 ) ){

            	// not on the ignore list and the client's md5sum does not match the server's

           		 $needed_file_list[] = $server_filename;

       		 }
		}else{
			if(!$ignore){
				 $return_str .= disc_client_utils_print( "File missing from client : $temp_dir/$server_filename<br>", $verbose );
				 $needed_file_list[] = $server_filename;
			}
		}

    }



    if( sizeof( $server_files ) < 100 ){
		if($attempts < $max_attempts && substr_count($soapclient->error_str, 'HTTP Error: socket read of headers timed out') > 0){
			echo "Could not retrieve file patterns list.  Error was: " . $soapclient->error_str;
			$attempts++;
			echo "<BR> $attempts of $max_attempts attempts trying again<br>";
			flush();
			ob_flush();
			return disc_client_file_sync($soapclient, $session, $verbose, $attempts);

		}
        die( "Failed: Empty file list returned from server.  Please try again." );

    }



    // get needed files

    foreach( $needed_file_list as $needed_file ){

        $result = $soapclient->call( 'get_encoded_file', array( 'session'=>$session, 'filename'=>"$needed_file" ) );

        write_encoded_file( $result, $temp_dir );

    }



    // all files recieved, copy them into place
    foreach( $needed_file_list as $needed_file ){
		if(file_exists("$temp_dir/$needed_file")){
		 mkdir_recursive(dirname($needed_file), true);
       	 copy( "$temp_dir/$needed_file", $needed_file );
       	  $return_str .= disc_client_utils_print( "Updated file: $needed_file <br>", $verbose );
		}else{
			 $return_str .= disc_client_utils_print( "File missing from client : $temp_dir/$needed_file<br>", $verbose );
		}



    }

    if( sizeof( $needed_file_list ) == 0 ){

        $return_str .= disc_client_utils_print( "No files needed to be synchronized.<br>", $verbose );

    }



    // scrub local files that are not part of client application

    $local_file_list = findAllFiles( ".", array() );

    $removed_file_count = 0;

    foreach( $local_file_list as $local_file ){

        $ignore = false;

        foreach( $disc_client_ignore as $ignore_pattern ){

            if( preg_match( "#" . $ignore_pattern . "#", $local_file ) ){

                $ignore = true;

            }

        }



        if( !$ignore && !in_array( $local_file, $server_files ) ){

            // not on the ignore list and the server does not know about it

            unlink( $local_file );

            $return_str .= disc_client_utils_print( "Removed file: $local_file <br>", $verbose );

            $removed_file_count++;

        }

    }

    if( $removed_file_count == 0 ){

        $return_str .= disc_client_utils_print( "No files needed to be removed.<br>", $verbose );

    }




    return( $return_str );

}

?>

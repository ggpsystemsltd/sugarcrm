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

set_time_limit(360);
require_once('include/utils/zip_utils.php');
$server->wsdl->addComplexType(

    'encoded_file',

    'complexType',

    'struct',

    'all',

    '',

    array(

        'filename'  => array( 'name' => 'filename', 'type' => 'xsd:string' ),

        'md5'       => array( 'name' => 'md5',      'type' => 'xsd:string' ),

        'data'      => array( 'name' => 'data',     'type' => 'xsd:string' ),

        'error'     => array( 'name' => 'error',    'type' => 'tns:error_value' ),

    )

);


$server->register(

    'get_encoded_file',

    array(  // input

        'session'   => 'xsd:string',

        'filename'  => 'xsd:string',

    ),

    array(  // output

        'return'    => 'tns:encoded_file'

    ),

    $NAMESPACE

);



function get_encoded_file( $session, $filename ){

    // files might be big

    ini_set( "memory_limit", "-1" );

    $md5        = "";

    $data       = "";

    $error      = new SoapError();

    $the_error  = "";



    if( !validate_authenticated( $session ) ){

        $the_error = "Invalid session";

    }

    else if( !is_file( $filename ) ){

        $the_error = "Could not find file $filename";

    }


	if(canViewPath($filename, getcwd())){
		$error->set_error( "get_encoded_file" );
		$error->description = 'Access Denied';
		return( array( 'filename'=>basename($filename), 'md5'=>$md5, 'data'=>$data, 'error'=>$error->get_soap_array() ) );
	}
	require("install/data/disc_client.php");
	$ignore = false;
    foreach($disc_client_ignore as $ignore_pattern ){
    	$pos = strrpos(basename($filename), ".zip");
    	if ($pos === false) {
	    	if(preg_match( "#" . $ignore_pattern . "#", $filename ) ){
	        	$error->set_error( "get_encoded_file" );
				$error->description = 'Access Denied';
				return( array( 'filename'=>basename($filename), 'md5'=>$md5, 'data'=>$data, 'error'=>$error->get_soap_array() ) );
	        }
    	}
    }
    if( $the_error != "" ){

        $error->set_error( "get_encoded_file" );

        $error->description = $the_error;

        return( array( 'filename'=>basename($filename), 'md5'=>$md5, 'data'=>$data, 'error'=>$error->get_soap_array() ) );

    }

    // read file
    $contents = sugar_file_get_contents($filename);
	$md5 = md5( $contents );

    // encode data

    $data = base64_encode( $contents );



    return( array( 'filename'=>$filename, 'md5'=>$md5, 'data'=>$data, 'error'=>$error->get_soap_array() ) );

}

$server->register(
    'get_encoded_zip_file',
    array(  // input
        'session'   => 'xsd:string',
        'md5file'  => 'tns:encoded_file',
        'last_sync' => 'xsd:string',
        'is_md5_sync' => 'xsd:int'
    ),
  array(  // output
        'return'    => 'tns:get_sync_result_encoded'
    ),
    $NAMESPACE
);

function get_encoded_zip_file( $session, $md5file, $last_sync, $is_md5_sync = 1){
    // files might be big
    global $sugar_config;
    ini_set( "memory_limit", "-1" );
    $md5        = "";
    $data       = "";
    $error      = new SoapError();
    $the_error  = "";

    if( !validate_authenticated( $session ) ){
        $the_error = "Invalid session";
    }

    require("install/data/disc_client.php");
    $tempdir_parent = create_cache_directory("disc_client");
    $temp_dir = tempnam($tempdir_parent, "sug");
    sugar_mkdir($temp_dir, 0775);
    $temp_file  = tempnam( $temp_dir, "sug" );
    write_encoded_file($md5file, $temp_dir, $temp_file );

    $ignore = false;
    //generate md5 files on server
    require_once( $temp_file );
    $server_files       = array();  // used later for removing unneeded local files
    $zip_file = tempnam($tempdir_parent, $session).".zip";
    $archive = new ZipArchive();
    $archive->open($zip_file, ZipArchive::OVERWRITE);
    if(!$is_md5_sync){
    	$all_src_files  = findAllTouchedFiles( ".", array(), $last_sync);
    	foreach( $all_src_files as $src_file ){
            $ignore = false;
    		foreach($disc_client_ignore as $ignore_pattern ){
            	if(preg_match( "#" . $ignore_pattern . "#", $src_file ) ){
        			$ignore = true;
            	}
        	}
            if(!$ignore){
                if($client_file_list != null && isset($client_file_list[$src_file])){
                    //we have found a file out of sync
                    $file_list[] = $src_file;
                    //since we have processed this element of the client
                    //list of files, remove it from the list
                    unset($client_file_list[$src_file]);
               } else{
                //this file does not exist on the client side
                    $file_list[] = $src_file;
               }
            }
   		}
    }else{
   		$all_src_files  = findAllFiles( ".", array() );
    	foreach( $all_src_files as $src_file ){
            $ignore = false;
    		foreach($disc_client_ignore as $ignore_pattern ){
            	if(preg_match( "#" . $ignore_pattern . "#", $src_file ) ){
                	$ignore = true;
            	}
            }
            if(!$ignore){
                $value = md5_file( $src_file );
                if($client_file_list != null && isset($client_file_list[$src_file])){
                  if($value != $client_file_list[$src_file]){
                    //we have found a file out of sync
                    $file_list[] = $src_file;
                    //since we have processed this element of the client
                    //list of files, remove it from the list
                  }
                  unset($client_file_list[$src_file]);
               } else{
                //this file does not exist on the client side
                    $file_list[] = $src_file;
               }
            }
    	}
    }

	//at this point we have a set of files that have been changed both on the client
	//as well as on the server, but there is the possibility that the client copy could have
	//changed and the server copy has not.  Here we will account for this.
	if(isset($client_file_list)){
		foreach($client_file_list as $key=>$value){
			$ignore = false;
			foreach($disc_client_ignore as $ignore_pattern ){
				if(preg_match( "#" . $ignore_pattern . "#", $key ) ){
					$ignore = true;
				}
			}
			if(!$ignore && file_exists($key)){
				$file_list[] = $key;
			}
		}
	}
    zip_files_list($zip_file, $file_list);
	$contents = sugar_file_get_contents( $zip_file);

    // encode data
    $data = base64_encode( $contents );
	unlink($zip_file);

    return(array('result'=>$data, 'error'=>$error->get_soap_array()));
}


$server->wsdl->addComplexType(
    'upgrade_history',
    'complexType',
    'struct',
    'all',
    '',
    array(
    	'id'  		=> array( 'name' => 'id',       'type' => 'xsd:string' ),
        'filename'  => array( 'name' => 'filename', 'type' => 'xsd:string' ),
        'md5'       => array( 'name' => 'md5',      'type' => 'xsd:string' ),
        'type'      => array( 'name' => 'type',     'type' => 'xsd:string' ),
        'status'    => array( 'name' => 'status',   'type' => 'xsd:string' ),
        'version'   => array( 'name' => 'version',  'type' => 'xsd:string' ),
        'date_entered'   => array( 'name' => 'date_entered',  'type' => 'xsd:string' ),
        'error'     => array( 'name' => 'error',    'type' => 'tns:error_value' ),
    )
);
$server->wsdl->addComplexType(
    'upgrade_history_list',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:upgrade_history[]')
    ),
	'tns:upgrade_history'
);
$server->wsdl->addComplexType(
   	 'upgrade_history_result',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'upgrade_history_list'=>array('name'=>'upgrade_history_list', 'type'=>'tns:upgrade_history_list'),
		'error' => array('name' =>'error', 'type'=>'tns:error_value'),
	)
);

$server->register(
    'get_required_upgrades',
    array(  // input
        'session'   => 'xsd:string',
        'client_upgrade_history'  => 'tns:upgrade_history_list',
        'client_version' => 'xsd:string'
    ),
  array(  // output
        'return'    => 'tns:upgrade_history_result'
    ),
    $NAMESPACE
);
/*
 * Obtain an array of upgrades that have been performed on the server but have not yet been
 * been performed on the client
 *
 * @param session			current session for authenticated user
 * @param client_upgrade_history	an array of upgrde history items
 * 									which will be used in deducing which items need
 * 									to be passed down to the server
 * return					an array containing all of the upgrades which are
 * 							required by the offline client
 */
function get_required_upgrades($session, $client_upgrade_history, $client_version){
	// files might be big
    global $sugar_config;
    $error = new SoapError();
		if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array('upgrade_history_list' => array(), 'error' => $error->get_soap_array());
	}

	global $current_user;


    $upgrade_history = new UpgradeHistory();
    $installeds = $upgrade_history->getAllOrderBy('date_entered ASC');
    $history = array();
    $client_ver = explode('.', $client_version);
    foreach($installeds as $installed)
	{
        $installed_ver = explode('.', $installed->version);
        if(count($installed_ver) >= 3){
            if(is_server_version_greater($client_ver, $installed_ver) == true){
    		  $found = false;
    		  foreach($client_upgrade_history as $client_history){
    			if($client_history['md5'] == $installed->md5sum){
    				$found = true;
    				break;
    			}
    		  }
    		  if(!$found){
                  //now check to be sure that this is available as an offline client upgrade
                  $manifest_file = getManifest($installed->filename);
                  if(is_file($manifest_file)){
                      require_once($manifest_file);
                      if(!isset($manifest['offline_client_applicable']) || $manifest['offline_client_applicable'] == true || $manifest['offline_client_applicable'] == 'true'){
    			          $history[] = array('id' => $installed->id, 'filename' => $installed->filename, 'md5' => $installed->md5sum, 'type' => $installed->type, 'status' => $installed->status, 'version' => $installed->version, 'date_entered' => $installed->date_entered, 'error' => $error->get_soap_array());
                      }
                  }
              }
            }
        }
	}
	return array('upgrade_history_list' => $history, 'error' => $error->get_soap_array());
}




$server->register(

    'get_disc_client_file_list',

    array(  // input

        'session'   => 'xsd:string',

    ),

    array(  // output

        'return'    => 'tns:encoded_file'

    ),

    $NAMESPACE

);



function get_disc_client_file_list( $session ){

    global $sugar_config;

    $tempdir = create_cache_directory("disc_client");
    $temp_file  = tempnam( $tempdir, "sug" );

    $file_list  = array();
    $error      = new SoapError();

    // write data to temp file
    $all_src_files  = findAllFiles( ".", array() );
    foreach( $all_src_files as $src_file ){
        $md5 = md5_file( $src_file );
        $file_list[] = array( 'filename'=>"$src_file", 'md5'=>"$md5" );
    }

    if( !write_array_to_file( "server_file_list", $file_list, $temp_file ) ){
        $error->set_error( "get_disc_client_file_list" );
        $error->description = "temp_dir: " . $tempdir . " temp_file: " . $temp_file . "SOAP server: Could not write to file: $temp_file";
        return( array( 'filename'=>$temp_file, 'md5'=>"", 'data'=>"", 'error'=>$error->get_soap_array() ) );
    }

    // return via get_encoded_file
    return( get_encoded_file( $session, $temp_file ) );

}

$server->register(
    'get_encoded_portal_zip_file',
    array(  // input
        'session'   => 'xsd:string',
        'md5file'  => 'tns:encoded_file',
        'last_sync' => 'xsd:string',
        'is_md5_sync' => 'xsd:int'
    ),
  array(  // output
        'return'    => 'tns:get_sync_result_encoded'
    ),
    $NAMESPACE
);

function get_encoded_portal_zip_file($session, $md5file, $last_sync, $is_md5_sync = 1){
    // files might be big
    global $sugar_config;
    ini_set( "memory_limit", "-1" );
    $md5        = "";
    $data       = "";
    $error      = new SoapError();
    $the_error  = "";

    if( !validate_authenticated( $session ) ){
        $the_error = "Invalid session";
    }

    require("install/data/disc_client.php");
    $tempdir_parent = create_cache_directory("disc_client");
    $temp_dir = tempnam($tempdir_parent, "sug");
    sugar_mkdir($temp_dir, 0775);
    $temp_file  = tempnam( $temp_dir, "sug" );
    write_encoded_file($md5file, $temp_dir, $temp_file );
    $ignore = false;
    //generate md5 files on server
    require_once( $temp_file );
    $server_files       = array();  // used later for removing unneeded local files
    $zip_file = tempnam(tempdir_parent, $session);
    $root_files = array();
    $custom_files = array();
    $file_list = array();
    if(!$is_md5_sync){
    	if(is_dir("portal"))
    		$root_files  = findAllTouchedFiles( "portal", array(), $last_sync);
    	if(is_dir("custom/portal"))
    		$custom_files  = findAllTouchedFiles( "custom/portal", array(), $last_sync);
    	$all_src_files = array_merge($root_files, $custom_files);
    	foreach( $all_src_files as $src_file ){
            $ignore = false;
    		foreach($disc_client_ignore as $ignore_pattern ){
            	if(preg_match( "#" . $ignore_pattern . "#", $src_file ) ){
        			$ignore = true;
            	}
        	}
            if(!$ignore){
                //we have to strip off portal or custom/portal before the src file to look it up
                $key = str_replace('custom/portal/', '', $src_file);
                $key = str_replace('portal/', '', $key);
                if($client_file_list != null && isset($client_file_list[$key])){
                    //we have found a file out of sync
                    $file_list[] = $src_file;
                    //since we have processed this element of the client
                    //list of files, remove it from the list
                    unset($client_file_list[$key]);
               } else {
                   //this file does not exist on the client side
                    $file_list[] = $src_file;
               }
            }
   		}
    }else{

   		if(is_dir("portal"))
   			$root_files  = findAllFiles( "portal", array());
    	if(is_dir("custom/portal"))
    		$custom_files  = findAllFiles( "custom/portal", array());
    	$all_src_files = array_merge($root_files, $custom_files);

    	foreach( $all_src_files as $src_file ){
            $ignore = false;
            foreach($disc_client_ignore as $ignore_pattern ){
            	if(preg_match( "#" . $ignore_pattern . "#", $src_file ) ){
                	$ignore = true;
            	}
            }
            if(!$ignore){
                $value = md5_file( $src_file );
                //we have to strip off portal or custom/portal before the src file to look it up
                $key = str_replace('custom/portal/', '', $src_file);
                $key = str_replace('portal/', '', $key);
                if($client_file_list != null && isset($client_file_list[$key])){
                  if($value != $client_file_list[$key]){
                    //we have found a file out of sync
                    $file_list[] = $src_file;
                    //since we have processed this element of the client
                    //list of files, remove it from the list
                  }
                  unset($client_file_list[$key]);
               } else{
                //this file does not exist on the client side
                   $file_list[] = $src_file;
               }
            }
    	}
    }
    zip_files_list($zip_file, $file_list, '|.*portal/|');

    $contents = sugar_file_get_contents( $zip_file );

    // encode data
    $data = base64_encode( $contents );
	unlink($zip_file);

    return(array('result'=>$data, 'error'=>$error->get_soap_array()));
}

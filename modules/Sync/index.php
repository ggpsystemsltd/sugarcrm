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


if(!isset( $sugar_config['disc_client']) || !$sugar_config['disc_client']){
	die('Please convert this instance to a client');
}
global $soapclient, $soap_server;
if(isset($_GET['check_available'])){
		
		$start_time = $soapclient->call('get_gmt_time',array());
		
		if($start_time){
			 header("Location: index.php?action=index&module=Sync&go_online=1");
		}else{
			$_SESSION['soap_server_available'] = false;	
			echo '<b><font color="red">'. translate('LBL_SERVER_UNAVAILABLE','Sync' ) .'</font></b>';
			die();
		}
		
		
}
if(isset($_REQUEST['go_online'])){
	session_start();
	global $current_user;
	
	if(!isset($current_user)){
		
		$current_user = new User();
		if(isset($_SESSION['authenticated_user_id']))
		{
			$result = $current_user->retrieve($_SESSION['authenticated_user_id']);
			if($result == null)
			{
				session_destroy();
			    header("Location: index.php?action=Login&module=Users");
			}
		}
	}
	
	require_once('modules/Sync/SyncHelper.php');
	$soapclient = new nusoapclient($soap_server);  //define the SOAP Client an	
	$result = $soapclient->call('login',array('user_auth'=>array('user_name'=>$current_user->user_name,'password'=>$current_user->user_hash, 'version'=>'1.0'), 'application_name'=>'MobileClient'));
	
	if(!has_error($result)){
		$canlogin = $soapclient->call('seamless_login',array('session'=>$result['id']));
		if($canlogin == 1){
			header('Location:' . $sugar_config['sync_site_url'] . '/index.php?MSID='. $result['id']);
		}else{
			sugar_die('Could not do seamless login');	
		}
	}
}

?>
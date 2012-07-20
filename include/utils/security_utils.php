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
 * func: query_module_access 
 * param: $moduleName
 * 
 * returns 1 if user has access to a module, else returns 0
 * 
 */

$modules_exempt_from_availability_check['Activities']='Activities';
$modules_exempt_from_availability_check['History']='History';
$modules_exempt_from_availability_check['Calls']='Calls';
$modules_exempt_from_availability_check['Meetings']='Meetings';
$modules_exempt_from_availability_check['Tasks']='Tasks';
$modules_exempt_from_availability_check['Notes']='Notes';

$modules_exempt_from_availability_check['CampaignLog']='CampaignLog';
$modules_exempt_from_availability_check['CampaignTrackers']='CampaignTrackers';
$modules_exempt_from_availability_check['Prospects']='Prospects';
$modules_exempt_from_availability_check['ProspectLists']='ProspectLists';
$modules_exempt_from_availability_check['EmailMarketing']='EmailMarketing';
$modules_exempt_from_availability_check['EmailMan']='EmailMan';
$modules_exempt_from_availability_check['ProjectTask']='ProjectTask';
$modules_exempt_from_availability_check['Users']='Users';
$modules_exempt_from_availability_check['Teams']='Teams';
$modules_exempt_from_availability_check['SchedulersJobs']='SchedulersJobs';
$modules_exempt_from_availability_check['DocumentRevisions']='DocumentRevisions';
function query_module_access_list(&$user)
{
	require_once('modules/MySettings/TabController.php');
	$controller = new TabController();
	$tabArray = $controller->get_tabs($user); 

	return $tabArray[0];
		
}

function query_user_has_roles($user_id)
{
	
	
	$role = new Role();
	
	return $role->check_user_role_count($user_id);
}

function get_user_allowed_modules($user_id)
{
	

	$role = new Role();
	
	$allowed = $role->query_user_allowed_modules($user_id);
	return $allowed;
}

function get_user_disallowed_modules($user_id, &$allowed)
{
	

	$role = new Role();
	$disallowed = $role->query_user_disallowed_modules($user_id, $allowed);
	return $disallowed;
}
// grabs client ip address and returns its value
function query_client_ip()
{
	global $_SERVER;
	$clientIP = false;
	if(!empty($GLOBALS['sugar_config']['ip_variable']) && !empty($_SERVER[$GLOBALS['sugar_config']['ip_variable']])){
		$clientIP = $_SERVER[$GLOBALS['sugar_config']['ip_variable']];
	}else if(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$clientIP = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches))
	{
		// check for internal ips by looking at the first octet
		foreach($matches[0] AS $ip)
		{
			if(!preg_match("#^(10|172\.16|192\.168)\.#", $ip))
			{
				$clientIP = $ip;
				break;
			}
		}

	}
	elseif(isset($_SERVER['HTTP_FROM']))
	{
		$clientIP = $_SERVER['HTTP_FROM'];
	}
	else
	{
		$clientIP = $_SERVER['REMOTE_ADDR'];
	}
	return $clientIP;
}

// sets value to key value
function get_val_array($arr){
	$new = array();
	if(!empty($arr)){
	foreach($arr as $key=>$val){
		$new[$key] = $key;
	}
	}
	return $new;
}


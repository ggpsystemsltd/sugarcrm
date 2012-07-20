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

 //Request object must have these property values:
 //		Module: module name, this module should have a file called TreeData.php
 //		Function: name of the function to be called in TreeData.php, the function will be called statically.
 //		PARAM prefixed properties: array of these property/values will be passed to the function as parameter.

require_once('include/JSON.php');
require_once('include/upload_file.php');

//require_once('modules/UpgradeWizard/uw_utils.php');

$json = getJSONobj();
/*
$file_name = $json->decode(html_entity_decode($_REQUEST['file_name']));

 if(isset($file_name['jsonObject']) && $file_name['jsonObject'] != null){
	$file_name = $file_name['jsonObject'];
  }
*/

$file_name = $_REQUEST['file_name'];
$filesize = '';
if(file_exists($file_name)){
    $filesize =filesize($file_name);
}

//$GLOBALS['log']->fatal($file_name);
$response = '';

//$GLOBALS['log']->fatal('file name '.$file_name);
//$GLOBALS['log']->fatal('file size loaded '.filesize($file_name));


//if($filesize > ini_get("upload_max_filesize"))

//$GLOBALS['log']->fatal(substr(ini_get("upload_max_filesize"), 0, strlen( ini_get("upload_max_filesize")) - 1));
//get the file size defined in php.ini
//$uploadSizeIni = substr(ini_get("upload_max_filesize"), 0, strlen( ini_get("upload_max_filesize")) - 1);
//$GLOBALS['log']->fatal('Upload php setting Size '.return_bytes(ini_get("upload_max_filesize")));
if($filesize != null){
	if(($filesize > return_bytes(ini_get("upload_max_filesize"))) || ($filesize > return_bytes(ini_get("post_max_size")))){
		$response=$filesize;
		//$response= "<script>alert('File size is bigger than the max_upload-size setting in php.ini. Upgrade attempt will fail. Increase the upload_max_size in php.ini to greater than ')</script>";
	}
}

if (!empty($response)) {
    echo $response;
}
sugar_cleanup();
exit();

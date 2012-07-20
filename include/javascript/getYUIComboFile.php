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

if (empty($_REQUEST)) die();

$yui_path = array(
    "2.9.0" => "include/javascript/yui",
	"2_9_0" => "include/javascript/yui",
	"3.3.0" => "include/javascript/yui3",
	"3_3_0" => "include/javascript/yui3"
);
$types = array(
    "js" => "application/x-javascript",
	"css" => "text/css",
);
$out = "";

$contentType = "";
$allpath = "";

foreach ($_REQUEST as $param => $val)
{
	//No backtracking in the path
	if (strpos($param, "..") !== false)
        continue;

	$version = explode("/", $param);
	$version = $version[0];
    if (empty($yui_path[$version])) continue;

    $path = $yui_path[$version] . substr($param, strlen($version));

	$extension = substr($path, strrpos($path, "_") + 1);

	//Only allowed file extensions
	if (empty($types[$extension]))
	   continue;

	if (empty($contentType))
    {
        $contentType = $types[$extension];
    }
	//Put together the final filepath
	$path = substr($path, 0, strrpos($path, "_")) . "." . $extension;
	$contents = '';
	if (is_file($path)) {
	   $out .= "/*" . $path . "*/\n";
	   $contents =  file_get_contents($path);
	   $out .= $contents . "\n";
	}
	$path = empty($contents) ? $path : $contents;
	$allpath .= md5($path);
}

$etag = '"'.md5($allpath).'"';

// try to use the content cached locally if it's the same as we have here.
header("Cache-Control: private");
header("Pragma: dummy=bogus");
header("Etag: $etag");
header('Expires: ' . TimeDate::httpTime(time()+86400));
header("Content-Type: $contentType");
echo ($out);
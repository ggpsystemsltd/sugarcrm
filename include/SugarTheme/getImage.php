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

// try to use the user's theme if we can figure it out
if ( isset($_REQUEST['themeName']) )
    SugarThemeRegistry::set($_REQUEST['themeName']);
elseif ( isset($_SESSION['authenticated_user_theme']) )
    SugarThemeRegistry::set($_SESSION['authenticated_user_theme']);

while(substr_count($_REQUEST['imageName'], '..') > 0){
	$_REQUEST['imageName'] = str_replace('..', '.', $_REQUEST['imageName']);
}

if(isset($_REQUEST['spriteNamespace'])) {
	$filename = "cache/sprites/{$_REQUEST['spriteNamespace']}/{$_REQUEST['imageName']}";
	if(! file_exists($filename)) {
		header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');
		die;
	}
} else {
	$filename = SugarThemeRegistry::current()->getImageURL($_REQUEST['imageName']);
	if ( empty($filename) ) {
		header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');
		die;
	}
}

$filename_arr = explode('?', $filename);
$filename = $filename_arr[0];
$file_ext = substr($filename,-3);

$extensions = SugarThemeRegistry::current()->imageExtensions;
if(!in_array($file_ext, $extensions)){
	header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');
    die;
}


// try to use the content cached locally if it's the same as we have here.
if(defined('TEMPLATE_URL'))
	$last_modified_time = time();
else
	$last_modified_time = filemtime($filename);

$etag = '"'.md5_file($filename).'"';

header("Cache-Control: private");
header("Pragma: dummy=bogus");
header("Etag: $etag");
header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));

$ifmod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])
    ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $last_modified_time : null;
$iftag = isset($_SERVER['HTTP_IF_NONE_MATCH'])
    ? $_SERVER['HTTP_IF_NONE_MATCH'] == $etag : null;
if (($ifmod || $iftag) && ($ifmod !== false && $iftag !== false)) {
    header($_SERVER["SERVER_PROTOCOL"].' 304 Not Modified');
    die;
}

header("Last-Modified: ".gmdate('D, d M Y H:i:s \G\M\T', $last_modified_time));

// now send the content
if ( substr($filename,-3) == 'gif' )
    header("Content-Type: image/gif");
elseif ( substr($filename,-3) == 'png' )
    header("Content-Type: image/png");

if(!defined('TEMPLATE_URL')) {
    if(!file_exists($filename)) {
        sugar_touch($filename);
    }
}

readfile($filename);

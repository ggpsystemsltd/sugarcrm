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

/*********************************************************************************

 * Description:
 ********************************************************************************/
$default_versions = array();


$new_db = DBManagerFactory::getInstance();

$db_version = '2.5.1';
$dirName ='custom/include/language';
if(is_dir($dirName))
{
	$d = dir($dirName);
	while($entry = $d->read()) {
			 if ($entry != "." && $entry != "..") {
				// echo $dirName."/".$entry;
					  if (is_file($dirName."/".$entry) && substr($entry, -9)=='.lang.php') {
					$custom_lang_file = $dirName."/".$entry;

	if(is_readable($custom_lang_file))
	{
		$pattern = '/\$app_list_strings[\ ]*=[\ ]*array/';
		$subject = @sugar_file_get_contents($custom_lang_file);
		$matches = preg_match($pattern, $subject);
		if($matches > 0)
		{
			$db_version = '0';
		}
	}
	}}}
}
//$default_versions[] = array('name'=>'Custom Labels', 'db_version' =>'3.0', 'file_version'=>'3.0');
$default_versions[] = array('name'=>'Chart Data Cache', 'db_version' =>'3.5.1', 'file_version'=>'3.5.1');
$default_versions[] = array('name'=>'htaccess', 'db_version' =>'3.5.1', 'file_version'=>'3.5.1');
//$default_versions[] = array('name'=>'DST Fix', 'db_version' =>'3.5.1b', 'file_version'=>'3.5.1b');
$default_versions[] = array('name'=>'Rebuild Relationships', 'db_version' =>'4.0.0', 'file_version'=>'4.0.0');
$default_versions[] = array('name'=>'Rebuild Extensions', 'db_version' =>'4.0.0', 'file_version'=>'4.0.0');
//$default_versions[] = array('name'=>'Studio Files', 'db_version' =>'4.5.0', 'file_version'=>'4.5.0');
?>

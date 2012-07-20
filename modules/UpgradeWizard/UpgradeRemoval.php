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


/**
 * UpgradeRemoval.php
 * 
 * This is the base class to support removing files during an upgrade process.
 * To support custom removal of files during an upgrade process take the following steps:
 * 
 * 1) Extend this class and save the PHP file name to be the same as the class name
 * 2) Override the getFilesToRemove method to return an Array of files/directories to remove
 * 3) Place this PHP file in custom/scripts/files_to_remove directory of your SugarCRM install
 * 
 * The UpgradeRemoval instance will be invoked from the unlinkUpgradeFiles method of uw_utils.php
 */
class UpgradeRemoval
{

/**
 * getFilesToRemove
 * Return array of files/directories to remove.  Default implementation returns empty array.
 * 
 * @param int $version integer value of original version to be upgraded
 * @return mixed $files Array of files/directories to remove
 */
public function getFilesToRemove($version)
{
	return array();
}

/**
 * processFilesToRemove
 * This method handles removing the array of files/directories specified.
 * 
 * @param mixed $files 
 */
public function processFilesToRemove($files=array())
{
	if(empty($files) || !is_array($files))
	{
		return;
	}	
	
	require_once('include/dir_inc.php');
	
	if(!file_exists('custom/backup'))
	{
	   mkdir_recursive('custom/backup');
	}
	
	foreach($files as $file)
	{		
		if(file_exists($file))
		{
			$this->backup($file);   
			if(is_dir($file))
			{
			  rmdir_recursive($file);	
			} else {
			  unlink($file);
			}
	    }
	}
}


/**
 * backup
 * Private method to handle backing up the file to custom/backup directory
 * 
 * @param $file File or directory to backup to custom/backup directory
 */
protected function backup($file)
{
	$basename = basename($file);
	$basepath = str_replace($basename, '', $file);

	if(!empty($basepath) && !file_exists('custom/backup/' . $basepath))
	{
	   mkdir_recursive('custom/backup/' . $basepath);
	}
	
	if(is_dir($file))
	{
    	copy_recursive($file, 'custom/backup/' . $file);	
	} else {
		copy($file, 'custom/backup/' . $file);
	}
}

}
?>
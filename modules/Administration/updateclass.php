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


require("include/modules.php");
require_once("include/utils/sugar_file_utils.php");

foreach ($beanFiles as $classname => $filename){ 
	if (file_exists($filename)){
		// Rename the class and its constructor adding SugarCore at the beginning  (Ex: class SugarCoreCall)
		$handle = file_get_contents($filename);
        $patterns = array ('/class '.$classname.'/','/function '.$classname.'/');
        $replace = array ('class SugarCore'.$classname,'function SugarCore'.$classname);
		$data = preg_replace($patterns,$replace, $handle);
		sugar_file_put_contents($filename,$data);
		
		// Rename the SugarBean file into SugarCore.SugarBean (Ex: SugarCore.Call.php)
		$pos=strrpos($filename,"/");
		$newfilename=substr_replace($filename, 'SugarCore.', $pos+1, 0);
		sugar_rename($filename,$newfilename);
		
		//Create a new SugarBean that extends CoreBean
		$fileHandle = sugar_fopen($filename, 'w') ;
$newclass = <<<FABRICE
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

if(!class_exists('$classname')){  
if (file_exists('custom/$filename')){
	require('custom/$filename');
	}
else{
	require('$newfilename');
	class $classname extends SugarCore$classname{}
	}
}
?>
FABRICE;
		fwrite($fileHandle, $newclass);
		fclose($fileHandle);
	}
}
?>
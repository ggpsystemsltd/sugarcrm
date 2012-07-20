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



require_once('include/workflow/plugin_utils.php');

global $beanFiles;
global $mod_strings;
global $db;

function remove_workflow_dir($dir) {
   if($elements = glob($dir."/*")){
       foreach($elements as $element) {
           is_dir($element)? remove_workflow_dir($element) : unlink($element);
       }
   }
}



$workflow_object = new WorkFlow();


	$module_array = $workflow_object->get_module_array();

	foreach($module_array as $key => $module){

		$dir = "custom/modules/".$module."/workflow";
		if(file_exists($dir)){
			
			remove_workflow_dir($dir);
			
		//end if directory does exist
		}
		
	//end foreach loop	
	}	
	



//clean workflow cache..rebuilt done.
echo $mod_strings['LBL_REBUILD_WORKFLOW_CACHE'];
$workflow_object->repair_workflow(); 

echo $mod_strings['LBL_DONE'] . '<BR>';


build_plugin_list();


echo $mod_strings['LBL_REBUILD_WORKFLOW_COMPILING'] . $mod_strings['LBL_DONE'];

?>

<?php
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



if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

function get_hook_array($module_name){

			$hook_array = null;
			// This will load an array of the hooks to process
			include("custom/modules/$module_name/logic_hooks.php");
			return $hook_array;

//end function return_hook_array
}



function check_existing_element($hook_array, $event, $action_array){

	if(isset($hook_array[$event])){
		foreach($hook_array[$event] as $action){

			if($action[1] == $action_array[1]){
				return true;
			}
		}
	}
		return false;

//end function check_existing_element
}

function replace_or_add_logic_type($hook_array){



	$new_entry = build_logic_file($hook_array);

   	$new_contents = "<?php\n$new_entry\n?>";

	return $new_contents;
}



function write_logic_file($module_name, $contents){

		$file = "modules/".$module_name . '/logic_hooks.php';
		$file = create_custom_directory($file);
		$fp = sugar_fopen($file, 'wb');
		fwrite($fp,$contents);
		fclose($fp);

//end function write_logic_file
}

function build_logic_file($hook_array){

	$hook_contents = "";

	$hook_contents .= "// Do not store anything in this file that is not part of the array or the hook version.  This file will	\n";
	$hook_contents .= "// be automatically rebuilt in the future. \n ";
	$hook_contents .= "\$hook_version = 1; \n";
	$hook_contents .= "\$hook_array = Array(); \n";
	$hook_contents .= "// position, file, function \n";

	foreach($hook_array as $event_array => $event){

	$hook_contents .= "\$hook_array['".$event_array."'] = Array(); \n";

		foreach($event as $second_key => $elements){

			$hook_contents .= "\$hook_array['".$event_array."'][] = ";
			$hook_contents .= "Array(".$elements[0].", '".$elements[1]."', '".$elements[2]."','".$elements[3]."', '".$elements[4]."'); \n";

		}

	//end foreach hook_array as event => action_array
	}

	$hook_contents .= "\n\n";

	return $hook_contents;

//end function build_logic_file
}

?>

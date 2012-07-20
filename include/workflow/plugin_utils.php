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



require_once('include/workflow/workflow_utils.php');
	//workflow plugin utility functions

	function trigger_createstep1(& $opt_array){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

			
		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		//for several javascript items on createstep1.html
		$jscript_array = array();
		$jscript_array['jscript_part1'] = "";
		$jscript_array['jscript_part2'] = "";
		
		//foreach array
		if(!empty($plugin_list['trigger']['createstep1'])){
			foreach($plugin_list['trigger']['createstep1'] as $plugin_array){
				//check to see if plugin list exists
				if(file_exists('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array['meta_file'].'.php')){
					include_once('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array['meta_file'].'.php');			
				}
			
				//get the javascript handling
				if(!empty($plugin_array["directory"])){
			
					$plugin_array['function'] = $plugin_array["jscript_function"];
			
					$return_jscript_array = grab_plugin_function($plugin_array, $opt);
			
					$jscript_array['jscript_part1'] .= $return_jscript_array['jscript_part1'];
					$jscript_array['jscript_part2'] .= $return_jscript_array['jscript_part2'];
					//end if the type of triggershell is present
				}	
			
				/*
				//get the javascript handling
				if(file_exists('custom/workflow/plugins/'.$plugin_array["directory"].'/misc_functions.php')){
					include_once('custom/workflow/plugins/'.$plugin_array["directory"].'/misc_functions.php');	
				
					if(function_exists('get_createstep1_jscript')){
						$plugin_output = get_createstep1_jscript();
					
						$jscript_part1 .= $plugin_output['jscript1'];
						$jscript_part2 .= $plugin_output['jscript2'];
					
					//end if function exists	
					}	
				
						
				}
				*/
			
			//end foreach plugin	
			}		
		}
		
		$final_jscript_array = array();
		$final_jscript_array['jscript_part1'] = $jscript_array['jscript_part1'];
		$final_jscript_array['jscript_part2'] = $jscript_array['jscript_part2'];
		
		return $final_jscript_array;

	//end function trigger_createstep1	
	}	


	
	
	function trigger_listview(& $opt){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

		
		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		//foreach array
		if(!empty($plugin_list['trigger']['listview'][$opt->type])){
			
			$plugin_array = $plugin_list['trigger']['listview'][$opt->type];
			return grab_plugin_function($plugin_array, $opt);

			
		//end if the type of triggershell is present
		}	



	//end function trigger_listview
	}
	
	
	function trigger_glue(& $opt){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		if($opt['trigger_position'] == "Primary"){
			$type = "trigger_type";
		} else {
			$type = "type";
		}		
		
		
		if(!empty($plugin_list['trigger']['glue'][$opt['row'][$type]])){
			$plugin_array = $plugin_list['trigger']['glue'][$opt['row'][$type]];
			return grab_plugin_function($plugin_array, $opt);
		//end if the type of triggershell is present
		}	
		
	//end function trigger_glue
	}	


	
	function trigger_eval_dump(& $opt){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		//foreach array
		if(!empty($plugin_list['trigger']['eval_dump'][$opt['object']->type])){
			$plugin_array = $plugin_list['trigger']['eval_dump'][$opt['object']->type];
			return grab_plugin_function($plugin_array, $opt);
		//end if the type of triggershell is present
		}			
		
	//end function trigger_eval_dump	
	}	



	
	function grab_plugin_function($plugin_array, & $opt){
		
			//get the plugin class and function
			if(file_exists('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array["file"].'.php')){
				include_once('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array["file"].'.php');	
				if(class_exists($plugin_array["class"])){
					
					$plugin_class = new $plugin_array["class"]();
					//if(function_exists($plugin_class->$plugin_array["function"])){
	
						return $plugin_class->$plugin_array["function"]($opt);	
					//}
				//end if function exists	
				}			
			}
	//end function grab_plugin_function
	}	
	
	
function vardef_handler_hook(& $opt_array){
		
		global $plugin_list;
		global $vardef_meta_array;
		global $mod_strings;

		
		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');

		
		//foreach array
		if(!empty($plugin_list['vardef_handler_hook'])){
			foreach($plugin_list['vardef_handler_hook'] as $plugin_array){
				//check to see if plugin list exists
				if(file_exists('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array['meta_file'].'.php')){
					include_once('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array['meta_file'].'.php');			
				}	
			//end foreach plugin	
			}	
		}
		
		


	//end function vardef_handler_hook
	}		
	
//ACTION HOOOKS	
	function action_createstep1(& $opt_array){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

			
		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		//for several javascript items on createstep1.html
		$jscript_array = array();
		$jscript_array['jscript_part1'] = "";
		$jscript_array['jscript_part2'] = "";
		//$opt['jscript_array'] = $jscript_array;
		
		if(!empty($plugin_list['action']['createstep1'])){
		//foreach array
		foreach($plugin_list['action']['createstep1'] as $plugin_array){
			//check to see if plugin list exists
			if(file_exists('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array['meta_file'].'.php')){
				include_once('custom/workflow/plugins/'.$plugin_array["directory"].'/'.$plugin_array['meta_file'].'.php');			
			}
			
			//get the javascript handling
			if(!empty($plugin_array["directory"])){
			
			$plugin_array['function'] = $plugin_array["jscript_function"];
			
			$return_jscript_array = grab_plugin_function($plugin_array, $opt);
			
				$jscript_array['jscript_part1'] .= $return_jscript_array['jscript_part1'];
				$jscript_array['jscript_part2'] .= $return_jscript_array['jscript_part2'];

			
			//end if the type of triggershell is present
			}				
			
		//end foreach plugin	
		}	
		}
		
		$final_jscript_array = array();
		$final_jscript_array['jscript_part1'] = $jscript_array['jscript_part1'];
		$final_jscript_array['jscript_part2'] = $jscript_array['jscript_part2'];
		
		return $final_jscript_array;

	//end function action_createstep1
	}	
	
	
	function action_createstep2(& $opt){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

		
		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');

		//foreach array
		if(!empty($plugin_list['action']['createstep2'][$opt['action_shell']->action_type])){
			
			$plugin_array = $plugin_list['action']['createstep2'][$opt['action_shell']->action_type];
			return grab_plugin_function($plugin_array, $opt);

			
		//end if the type of triggershell is present
		}	



	//end function action_createstep2
	}
	
	function action_listview(& $opt){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

		
		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		//foreach array
		if(!empty($plugin_list['action']['listview'][$opt->action_type])){
			
			$plugin_array = $plugin_list['action']['listview'][$opt->action_type];
			return grab_plugin_function($plugin_array, $opt);

			
		//end if the type of triggershell is present
		}	



	//end function trigger_listview
	}	
	
	function action_glue(& $opt){
		
		global $plugin_list;
		global $process_dictionary;
		global $mod_strings;

		//check to see if plugin list exists
		if(!file_exists('custom/workflow/plugins/plugin_list.php')){
			return;
		}
		//include it
		include_once('custom/workflow/plugins/plugin_list.php');
		
		if(!empty($plugin_list['action']['glue'][$opt['row']['action_type']])){
			$plugin_array = $plugin_list['action']['glue'][$opt['row']['action_type']];
			return grab_plugin_function($plugin_array, $opt);
		//end if the type of triggershell is present
		}	
		
	//end function action_glue
	}		
		
	
	
	function build_plugin_list(){
	
		$plugin_list_dump = extract_plugin_list();
		
		
		
		$file = "workflow/plugins/plugin_list.php";
		$file = create_custom_directory($file);
		$dump = $plugin_list_dump;
		$fp = sugar_fopen($file, 'wb');
		fwrite($fp,"<?php\n");
		fwrite($fp, "//Plugin List showing all installed plugins and their info \n");
		fwrite($fp, $dump);
		fwrite($fp, " \n");
		fwrite($fp, "\n?>");
		fclose($fp);
		
	//end function build_pluing_list
	}	
	
	
	function extract_plugin_list(){
		
		
		$component_arrays = array();
		
		$dir_path = "./custom/workflow/plugins";	

		if(is_dir($dir_path)){
			if ($dir = opendir($dir_path)) {
				while (($file = readdir($dir)) !== false) {

					if($file != "." && $file != ".." ) {
						if(is_dir($dir_path."/".$file) == true) {


							if(file_exists($dir_path."/".$file."/component_list.php")){

								include_once($dir_path."/".$file."/component_list.php");

								//triggers
								if(!empty($component_list['trigger'])){
									foreach($component_list['trigger'] as $hook => $hook_array){
										$component_arrays['trigger'][$hook][$file] = $hook_array;
									}	
								}
								
								//actions
								if(!empty($component_list['action'])){
									foreach($component_list['action'] as $hook => $hook_array){
										$component_arrays['action'][$hook][$file] = $hook_array;
									}				
								}
												
								//vardef_handler hooks
								if(!empty($component_list['vardef_handler_hook'])){
									foreach($component_list['vardef_handler_hook'] as $def_field => $def_value){
										$component_arrays['vardef_handler_hook'][$file][$def_field] = $def_value;
									}	
								}
									
								//$component_arrays['action'][] = "";
								
								
								//end if component list file exists
							}

							//end if is dir
						}
						//confirm not . or ..
					}
					//end while
				}
				//end if can open dir
			}
			//end if is dir
		}
		
		
		
		$plugin_dump = "\t \$plugin_list = \n";
		
		
		$plugin_dump .= var_export($component_arrays, true);


		
		
		

		
		return $plugin_dump;
		
	//end function extract_plugin_list
	}	
	
	
	
	
	
	
?>

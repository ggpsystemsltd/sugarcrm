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

global $theme;


require_once('include/workflow/workflow_utils.php');







global $app_strings;
global $app_list_strings;
global $mod_strings;

global $urlPrefix;
global $currentModule;


$workflow_object = new WorkFlow();
if(isset($_REQUEST['workflow_id']) && isset($_REQUEST['workflow_id'])) {
    $workflow_object->retrieve($_REQUEST['workflow_id']);
} else {
	sugar_die("You shouldn't be here");
}



$focus = new WorkFlowTriggerShell();

if(isset($_REQUEST['record']) && isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);

}


if(!empty($_REQUEST['type']) && $_REQUEST['type']!="") {
   $focus->type = $_REQUEST['type'];
}







////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
	$form =new XTemplate ('modules/WorkFlowTriggerShells/CreateStepCount.html');
	$GLOBALS['log']->debug("using file modules/WorkFlowTriggerShells/CreateStepCount.html");


	//Bug 12335: We need to include the javascript language file first. And also the language file in WorkFlow is needed.
        if(!is_file(sugar_cached('jsLanguage/') . $GLOBALS['current_language'] . '.js')) {
            require_once('include/language/jsLanguage.php');
            jsLanguage::createAppStringsCache($GLOBALS['current_language']);
        }
        $javascript_language_files = getVersionedScript("cache/jsLanguage/{$GLOBALS['current_language']}.js",  $GLOBALS['sugar_config']['js_lang_version']);
        if(!is_file(sugar_cached('jsLanguage/') . $this->module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once('include/language/jsLanguage.php');
                jsLanguage::createModuleStringsCache($this->module, $GLOBALS['current_language']);
        }
        $javascript_language_files .= getVersionedScript("cache/jsLanguage/{$this->module}/{$GLOBALS['current_language']}.js", $GLOBALS['sugar_config']['js_lang_version']);
        if(!is_file(sugar_cached('jsLanguage/WorkFlow/') . $GLOBALS['current_language'] . '.js')) {
            require_once('include/language/jsLanguage.php');
            jsLanguage::createModuleStringsCache('WorkFlow', $GLOBALS['current_language']);
        }
        $javascript_language_files .= getVersionedScript("cache/jsLanguage/WorkFlow/{$GLOBALS['current_language']}.js", $GLOBALS['sugar_config']['js_lang_version']);

        $the_javascript  = "<script type='text/javascript' language='JavaScript'>\n";
        $the_javascript .= "function set_return() {\n";
        $the_javascript .= "    window.opener.document.EditView.submit();";
        $the_javascript .= "}\n";
        $the_javascript .= "</script>\n";

	$form->assign("MOD", $mod_strings);
	$form->assign("APP", $app_strings);
	$form->assign("JAVASCRIPT_LANGUAGE_FILES", $javascript_language_files);
	$form->assign("MODULE_NAME", $currentModule);
	$form->assign("GRIDLINE", $gridline);
	$form->assign("SET_RETURN_JS", $the_javascript);

	$form->assign("BASE_MODULE", $workflow_object->base_module);
	$form->assign("WORKFLOW_ID", $workflow_object->id);
	$form->assign("ID", $focus->id);
	$form->assign("PARENT_ID", $workflow_object->id);
	$form->assign("TRIGGER_TYPE", $workflow_object->type);
	$form->assign("TYPE", $focus->type);

	//Check multi_trigger filter conditions
	if(!empty($_REQUEST['frame_type']) && $_REQUEST['frame_type']=="Secondary"){
		$form->assign("FRAME_TYPE", $_REQUEST['frame_type']);
	} else {
		$form->assign("FRAME_TYPE", "Primary");
	}



insert_popup_header($theme);

$form->parse("embeded");
$form->out("embeded");


////////Middle Items/////////////////////////////

//SET Previous Display Text
	require_once('include/ListView/ProcessView.php');
	$ProcessView = new ProcessView($workflow_object, $focus);
	$prev_display_text = $ProcessView->get_prev_text("TriggersCreateStep1", $focus->type);

	$form->assign("PREV_DISPLAY_TEXT", $prev_display_text);


////////////////////Base expression object///////////////////////////////
//store lhs_type, lhs_module (rel_module), operator, rhs_value (count_quantity)

	$base_object = new Expression();
		$base_list = $focus->get_linked_beans('expressions','Expression');
		if(isset($base_list[0]) && $base_list[0]!='') {
			$base_id = $base_list[0]->id;
		}
		if(isset($base_id) && $base_id!="") {
  		  	$base_object->retrieve($base_id);
			$base_expression_text = $base_object->operator." ".$base_object->rhs_module;
		//end if base is present
		} else {
			$base_expression_text = "is this amount";
		}

		$form->assign("TRIGGER1_EXP_ID", $base_object->id);
		$form->assign("TRIGGER1_RHS_VALUE", $base_object->rhs_value);
		$form->assign("TRIGGER1_TEXT", $base_expression_text);
		$form->assign("TRIGGER1_OPERATOR", $base_object->operator);
		$form->assign("TRIGGER1_LHS_TYPE", $base_object->lhs_type);


/////////////////Second Item, which is related module//////////////////////
		if($base_object->lhs_type=="rel_module") {
			$rel_expression_text = $base_object->lhs_module;
			$form->assign("TRIGGER2_CHECKED", "checked");
		} else {
			$rel_expression_text = "module";
		}

		$form->assign("TRIGGER2_LHS_MODULE", $base_object->lhs_module);
		$form->assign("TRIGGER2_TEXT", $rel_expression_text);




//////////////////BEGIN 1st Filter Object	/////////////////////////////////

		$filter1_object = new Expression();
		//only try to retrieve if there is a base object set
		if(isset($base_id) && $base_id!="") {
			$filter_list = $base_object->get_linked_beans('members','Expression');
			if(isset($filter_list[0]) && $filter_list[0]!='') {
				$filter1_id = $filter_list[0]->id;
			}

			if(isset($filter1_id) && $filter1_id!="") {
  		  		$filter1_object->retrieve($filter1_id);
				$form->assign("TRIGGER3_CHECKED", "checked");
				$display_array = $filter1_object->get_display_array_using_name();
				$filter1_expression_text = $display_array['lhs_field']." ".$display_array['operator']." ".$display_array['rhs_value'];
			} else {
				$filter1_expression_text = "field";
			}
		//end if base_id is there
		} else {
			$filter1_expression_text = "field";
		}

		$form->assign("TRIGGER3_EXP_ID", $filter1_object->id);
		$form->assign("TRIGGER3_RHS_VALUE", $filter1_object->rhs_value);
		$form->assign("TRIGGER3_TEXT", $filter1_expression_text);
		$form->assign("TRIGGER3_OPERATOR", $filter1_object->operator);
		$form->assign("TRIGGER3_EXP_TYPE", $filter1_object->exp_type);
		$form->assign("TRIGGER3_LHS_MODULE", $workflow_object->base_module);
		$form->assign("TRIGGER3_LHS_FIELD", $filter1_object->lhs_field);


/////////////////END Filter1 Object/////////////////////////////////



//////////////////BEGIN 2nd Filter Object	/////////////////////////////////

		$filter2_object = new Expression();
		//only try to retrieve if there is a base object set
		if(isset($base_id) && $base_id!="") {
			if(isset($filter_list[1]) && $filter_list[1]!='') {
				$filter2_id = $filter_list[1]->id;
			}

			if(isset($filter2_id) && $filter2_id!="") {
  		  		$filter2_object->retrieve($filter2_id);
				$form->assign("TRIGGER4_CHECKED", "checked");
				$display_array = $filter2_object->get_display_array_using_name();
				$filter2_expression_text = $display_array['lhs_field']." ".$display_array['operator']." ".$display_array['rhs_value'];
			} else {
				$filter2_expression_text = "field";
			}
		//end if base_id is there
		} else {
			$filter2_expression_text = "field";
		}

		$form->assign("TRIGGER4_EXP_ID", $filter2_object->id);
		$form->assign("TRIGGER4_RHS_VALUE", $filter2_object->rhs_value);
		$form->assign("TRIGGER4_TEXT", $filter2_expression_text);
		$form->assign("TRIGGER4_OPERATOR", $filter2_object->operator);
		$form->assign("TRIGGER4_EXP_TYPE", $filter2_object->exp_type);
		$form->assign("TRIGGER4_LHS_MODULE", $workflow_object->base_module);
		$form->assign("TRIGGER4_LHS_FIELD", $filter2_object->lhs_field);


/////////////////END Filter2 Object/////////////////////////////////


/////////////////End Items 	//////////////////////

//close window and refresh parent if needed

if(!empty($_REQUEST['special_action']) && $_REQUEST['special_action'] == "refresh"){

	$special_javascript = "window.opener.document.DetailView.action.value = 'DetailView'; \n";
	$special_javascript .= "window.opener.document.DetailView.submit(); \n";
	$special_javascript .= "window.close();";
	$form->assign("SPECIAL_JAVASCRIPT", $special_javascript);

}

$form->parse("main");
$form->out("main");

?>

<?php insert_popup_footer(); ?>

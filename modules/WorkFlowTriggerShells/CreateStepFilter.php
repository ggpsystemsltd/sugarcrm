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

$log = LoggerManager::getLogger('workflow_alerts');

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
if(!empty($_REQUEST['rel_module']) && $_REQUEST['rel_module']!="") {
   $focus->rel_module = $_REQUEST['rel_module'];
}
if(!empty($_REQUEST['type']) && $_REQUEST['type']!="") {
   $focus->type = $_REQUEST['type'];
}







////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
	$form =new XTemplate ('modules/WorkFlowTriggerShells/CreateStepFilter.html');
	$log->debug("using file modules/WorkFlowTriggerShells/CreateStepFilter.html");
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
	$form->assign("REL_MODULE", $focus->rel_module);
	$form->assign("PARENT_ID", $workflow_object->id);
	$form->assign("TRIGGER_TYPE", $workflow_object->type);
	$form->assign("TYPE", $focus->type);

	//Check multi_trigger filter conditions
	if(!empty($_REQUEST['frame_type'])){
		$form->assign("FRAME_TYPE", $_REQUEST['frame_type']);
	} else {
		$form->assign("FRAME_TYPE", $focus->frame_type);
	}



insert_popup_header($theme);

$form->parse("embeded");
$form->out("embeded");


////////Middle Items/////////////////////////////
/*
//SET Previous Display Text
	require_once('include/ListView/ProcessView.php');
	$ProcessView = new ProcessView($workflow_object, $focus);
	$prev_display_text = $ProcessView->get_prev_text("TriggersCreateStep1", $focus->type);
	$form->assign("PREV_DISPLAY_TEXT", $prev_display_text);
*/

/////Top secondary items////////////////

	if($focus->type=="filter_rel_field"){

		//process out the actual name of the rel module


		///Build the relationship information using the Relationship handler
		require_once('modules/Relationships/RelationshipHandler.php');
		$rel_handler = $workflow_object->call_relationship_handler("base_module", true);
		$rel_handler->set_rel_vardef_fields(strtolower($focus->rel_module));
		$rel_handler->build_info(false);
		$rel_handler->build_module_labels(false);

		$target_module = $rel_handler->rel1_module;

		$rel_module_type_options =get_select_options_with_id($app_list_strings['wflow_relfilter_type_dom'],$focus->rel_module_type);
		$rel_module_type_select = "<select name='rel_module_type' tabindex='2'>$rel_module_type_options</select>";
		$form->assign("FILTER_TOP_DISPLAY", $mod_strings['LBL_FILTER_FIELD_PART1']." ".$app_list_strings['wflow_relfilter_type_dom'][$focus->rel_module_type]." ".$rel_handler->rel1_array['slabel'].$mod_strings['LBL_SPECIFIC_FIELD']);
		$form->assign("FILTER_BOTTOM_DISPLAY", $mod_strings['LBL_FILTER_FIELD_PART1']." ".$rel_module_type_select." ".$rel_handler->rel1_array['slabel'].$mod_strings['LBL_APOSTROPHE_S']);

	} else {
		$target_module = $workflow_object->base_module;
		$form->assign("FILTER_TOP_DISPLAY", $mod_strings['LBL_WHEN_VALUE1']);
		$form->assign("FILTER_BOTTOM_DISPLAY", $mod_strings['LBL_WHEN_VALUE2']);
		//end if else filter_rel_field or filter_field
	}



//////////////////BEGIN 1st Filter Object	/////////////////////////////////

		$filter1_object = new Expression();
		//only try to retrieve if there is a base object set
		if(isset($focus->id) && $focus->id!="") {
			$filter_list = $focus->get_linked_beans('expressions','Expression');
			if(isset($filter_list[0])) {
				$filter1_id = $filter_list[0]->id;
			}

			if(isset($filter1_id) && $filter1_id!="") {
  		  		$filter1_object->retrieve($filter1_id);
  		  		//$target_module = $focus->target_module;
				$display_array = $filter1_object->get_display_array_using_name();
				$filter1_expression_text = $display_array['lhs_field']." ".$display_array['operator']." ".$display_array['rhs_value'];
			} else {
				$filter1_expression_text = $mod_strings['LBL_SPECIFIC_FIELD_LNK'];
			}
		//end if base_id is there
		} else {
			$filter1_expression_text = $mod_strings['LBL_SPECIFIC_FIELD_LNK'];
		}

		$form->assign("TRIGGER_EXP_ID", $filter1_object->id);
		$form->assign("TRIGGER_RHS_VALUE", $filter1_object->rhs_value);
		$form->assign("TRIGGER_TEXT", $filter1_expression_text);
		$form->assign("TRIGGER_OPERATOR", $filter1_object->operator);
		$form->assign("TRIGGER_EXP_TYPE", $filter1_object->exp_type);
		$form->assign("TRIGGER_LHS_MODULE", $target_module);
		$form->assign("TRIGGER_LHS_FIELD", $filter1_object->lhs_field);


/////////////////END Filter1 Object/////////////////////////////////

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

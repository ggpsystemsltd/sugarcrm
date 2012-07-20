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


$focus = new WorkFlowAlert();

if(!empty($_REQUEST['record']) && $_REQUEST['record']!="") {
	$focus->retrieve($_REQUEST['record']);
}


if(!empty($_REQUEST['parent_id']) && $_REQUEST['parent_id']!="") {
	$focus->parent_id = $_REQUEST['parent_id'];
	$workflow_object = $focus->get_workflow_object();
	$target_workflow_object = $workflow_object->get_parent_object();
} else {
	sugar_die("You shouldn't be here");
}

if(!empty($_REQUEST['base_module']) && $_REQUEST['base_module']!="") {
   $focus->base_module = $_REQUEST['base_module'];
}
if(!empty($_REQUEST['rel_module1']) && $_REQUEST['rel_module1']!="") {
   $focus->rel_module1 = $_REQUEST['rel_module1'];
}
if(!empty($_REQUEST['rel_module2']) && $_REQUEST['rel_module2']!="") {
   $focus->rel_module2 = $_REQUEST['rel_module2'];
}
if(!empty($_REQUEST['user_type']) && $_REQUEST['user_type']!="") {
   $focus->user_type = $_POST['user_type'];
}




///////Get the type of workflow object that this is///////
//Remove below line, this is already determined above
//$workflow_object = $focus->get_workflow_object();
$base_type = $target_workflow_object->type;




////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
	$form =new XTemplate ('modules/WorkFlowAlerts/CreateStep2.html');
	$GLOBALS['log']->debug("using file modules/WorkFlowAlerts/CreateStep2.html");

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

	$form->assign("BASE_MODULE", $focus->base_module);
	$form->assign("REL_MODULE1", $focus->rel_module1);
	$form->assign("REL_MODULE2", $focus->rel_module2);
	$form->assign("ID", $focus->id);
	$form->assign("PARENT_ID", $focus->parent_id);
	$form->assign("USER_TYPE", $focus->user_type);

	$address_type_dom = $focus->get_address_type_dom();
	$form->assign("ADDRESS_TYPE_DOM", $address_type_dom);


insert_popup_header($theme);

$form->parse("embeded");
$form->out("embeded");


////////Middle Items/////////////////////////////


//rel_user_custom or trig_user_custom
if(		$focus->user_type=="rel_user_custom"){

		$rel_handler = $focus->call_relationship_handler("base_module", true);
		$rel_handler->set_rel_vardef_fields($focus->rel_module1, $focus->rel_module2);
		$target_module = $rel_handler->get_farthest_reach();


	//$target_module = get_rel_trace_results($focus->base_module, $focus->rel_module1, $focus->rel_module2);
	$target_module_name = $target_module->module_dir;

	$current_module_strings = return_module_language($current_language, $target_module_name);
	$form->assign("TARGET_MODULE", $target_module_name);

    $form->assign("FIELD_VALUE",$focus->field_value);
    $form->assign("REL_EMAIL_VALUE",$focus->rel_email_value);

	if($focus->id !=""){

    $form->assign("ADDRESS_TYPE",$focus->address_type);
    $form->assign("RELATE_TYPE","Self");		
	$form->assign("ARRAY_TYPE","future");	

		$target_email_field_lbl = $target_module->field_defs[$focus->rel_email_value]['vname'];
		$target_name_field_lbl = $target_module->field_defs[$focus->field_value]['vname'];
		$form->assign("REL_CUSTOM1_TEXT2", get_label($target_email_field_lbl, $current_module_strings));
		$form->assign("REL_CUSTOM1_TEXT3", get_label($target_name_field_lbl, $current_module_strings));
		$form->assign("REL_CUSTOM1_CHECKED", "checked");
		if(!isset($focus->address_type) || empty($focus->address_type)){
			$focus->address_type = "to";
		}
		$form->assign("ADDRESS_TYPE_TARGET",$app_list_strings[$address_type_dom][$focus->address_type]);

	} else {
		$form->assign("REL_CUSTOM1_TEXT2",$mod_strings['LBL_REL_CUSTOM2']);
		$form->assign("REL_CUSTOM1_TEXT3",$mod_strings['LBL_REL_CUSTOM3']);
		$form->assign("ADDRESS_TYPE_TARGET",$mod_strings['LBL_ADDRESS_TYPE_TARGET']);
	}


	$exp_list = $focus->get_linked_beans("expressions", "Expression");
	if(isset($exp_list[0]) && $exp_list[0]!="" && $focus->id!="") {
		$exp_object = $exp_list[0];

		$display_array = $exp_object->get_display_array($target_module);

		$filter_expression_text = $display_array['lhs_field']." ".$display_array['operator']." ".$display_array['rhs_value'];

		$form->assign("REL_CUSTOM2_EXP_ID", $exp_object->id);
		$form->assign("REL_CUSTOM2_LHS_MODULE", $exp_object->lhs_module);
		$form->assign("REL_CUSTOM2_LHS_FIELD", $exp_object->lhs_field);
		$form->assign("REL_CUSTOM2_RHS_VALUE", $exp_object->rhs_value);
		$form->assign("REL_CUSTOM2_EXP_TYPE", $exp_object->exp_type);
		$form->assign("REL_CUSTOM2_TEXT", $filter_expression_text);
		$form->assign("REL_CUSTOM2_OPERATOR", $exp_object->operator);
		$form->assign("REL_CUSTOM2_CHECKED", "checked");

	//if expression object already exists
	} else {
	//expression object does not exist

		$form->assign("REL_CUSTOM2_LHS_MODULE", $target_module_name);
		$form->assign("REL_CUSTOM2_TEXT",$mod_strings['LBL_SPECIFIC_FIELD']);


	//end if the expression object does not exist;
	}




		$form->assign("REL_CUSTOM1_TEXT1",$mod_strings['LBL_REL_CUSTOM']);
		$form->parse("main.rel_custom_frame_top");


		$form->parse("main.rel_custom_frame_bottom");

	$start_jscript = "togglefield_select('rel_custom1'); \n";
	$start_jscript .= "togglefield_select('rel_custom2'); \n";
	$form->assign("REL_USER_CUSTOM_START_JSCRIPT", $start_jscript);

//end if user_type is rel_user_custom
}elseif($focus->user_type=="trig_user_custom"){

		$target_module = get_module_info($focus->base_module);


	//$target_module = get_rel_trace_results($focus->base_module, $focus->rel_module1, $focus->rel_module2);
	$target_module_name = $target_module->module_dir;

	$current_module_strings = return_module_language($current_language, $target_module_name);
	$form->assign("TARGET_MODULE", $target_module_name);

    $form->assign("FIELD_VALUE",$focus->field_value);
    $form->assign("REL_EMAIL_VALUE",$focus->rel_email_value);

	if($focus->id !=""){
        $form->assign("ADDRESS_TYPE",$focus->address_type);
        $form->assign("RELATE_TYPE","Self");
        $form->assign("ARRAY_TYPE","future");
		$target_email_field_lbl = $target_module->field_defs[$focus->rel_email_value]['vname'];
		$target_name_field_lbl = $target_module->field_defs[$focus->field_value]['vname'];
		$form->assign("REL_CUSTOM1_TEXT2", get_label($target_email_field_lbl, $current_module_strings));
		$form->assign("REL_CUSTOM1_TEXT3", get_label($target_name_field_lbl, $current_module_strings));
		$form->assign("REL_CUSTOM1_CHECKED", "checked");
		$form->assign("ADDRESS_TYPE_TARGET",$app_list_strings[$address_type_dom][$focus->address_type]);

	} else {
		$form->assign("REL_CUSTOM1_TEXT2",$mod_strings['LBL_REL_CUSTOM2']);
		$form->assign("REL_CUSTOM1_TEXT3",$mod_strings['LBL_REL_CUSTOM3']);
		$form->assign("ADDRESS_TYPE_TARGET",$mod_strings['LBL_ADDRESS_TYPE_TARGET']);
	}



		$form->assign("REL_CUSTOM1_TEXT1",$mod_strings['LBL_REL_CUSTOM']);

		$form->parse("main.trig_custom_frame_top");


		$form->parse("main.trig_custom_frame_bottom");

	$start_jscript = "togglefield_select('rel_custom1'); \n";
	$form->assign("REL_USER_CUSTOM_START_JSCRIPT", $start_jscript);

//end if user_type is trig_user_custom
} else {


	global $alert_meta_user_array;

	$radio_count = 1;

	foreach($alert_meta_user_array as $type => $type_array){

		if(!($base_type=="Time" && $type_array['base_type']=="normal")){

			if($focus->user_display_type == $type_array['user_display_type']){
    			$form->assign("RADIO_DISABLE","checked");
			} else {
				$form->assign("RADIO_DISABLE","");
			}
				$form->assign("RADIO_ID","user_display_type".$radio_count);
				$form->assign("RADIO_NAME","user_display_type");
				$form->assign("RADIO_VALUE",$type_array['user_display_type']);

				$form->assign("RADIO_DISPLAY",$mod_strings[$type_array['href_text']]);
				$form->assign("RADIO_DISPLAY2",$mod_strings[$type_array['href_text2']]);
				$form->assign("RADIO_DISPLAY3",$mod_strings[$type_array['href_text3']]);

				$form->parse("main.top_frame");

			++ $radio_count;

		//end if this is a normal or time only option
		}

	//end foreach alert_meta_array
	}

	//bottom frame
	foreach($alert_meta_user_array as $type => $type_array){

		if(!($base_type=="Time" && $type_array['base_type']=="normal")){

			if($focus->user_display_type == $type_array['user_display_type']){
    			$form->assign("HREF_TEXT2",$app_list_strings['wflow_relate_type_dom'][$focus->relate_type]);
    			$form->assign("ADDRESS_TYPE_TARGET",$app_list_strings[$address_type_dom][$focus->address_type]);
    			$form->assign("ADDRESS_TYPE",$focus->address_type);
    			$form->assign("RELATE_TYPE",$focus->relate_type);
    			$form->assign("FIELD_VALUE",$focus->field_value);
    			$form->assign("ARRAY_TYPE",$focus->array_type);
			} else {
				$form->assign("HREF_TEXT2",$mod_strings[$type_array['href_text2']]);
				$form->assign("ADDRESS_TYPE_TARGET",$mod_strings['LBL_ADDRESS_TYPE_TARGET']);
				$form->assign("ADDRESS_TYPE","to");
    			$form->assign("RELATE_TYPE","Self");
    			$form->assign("FIELD_VALUE",$type_array['field_value']);
    			$form->assign("ARRAY_TYPE",$type_array['array_type']);
			}

				$single_selector_array = "href_".$type_array['user_display_type']."";
				$form->assign("SINGLE_SELECTOR_ARRAY",$single_selector_array);
				$form->assign("USER_DISPLAY_TYPE",$type_array['user_display_type']);

				$form->assign("HREF_TEXT1",$mod_strings[$type_array['href_text']]);
				$form->assign("HREF_TEXT3",$mod_strings[$type_array['href_text3']]);

				///Address Type
				$single_selector_array = "href_add_".$type_array['user_display_type']."";
				$form->assign("SINGLE_SELECTOR_ARRAY_ADD",$single_selector_array);

				$form->parse("main.bottom_frame");

			++ $radio_count;

		//end if this is a normal or time only option
		}

	//end foreach alert_meta_array
	}


//end if rel_user_custom or not for user_type
}


//SET Previous Display Text
	require_once('include/ListView/ProcessView.php');
	$ProcessView = new ProcessView($target_workflow_object, $focus);
	$prev_display_text = $ProcessView->get_prev_text("AlertsCreateStep1", $focus->user_type);

	$form->assign("PREV_DISPLAY_TEXT", $prev_display_text);

	$adv_related_array = $ProcessView->get_adv_related("AlertsCreateStep1", $focus->user_type, "alert");

		$form->assign("ADVANCED_SEARCH_PNG", SugarThemeRegistry::current()->getImage('advanced_search','  border="0"',null,null,'.gif',$app_strings['LNK_ADVANCED_SEARCH']));
		$form->assign("BASIC_SEARCH_PNG", SugarThemeRegistry::current()->getImage('basic_search','  border="0"',null,null,'.gif',$app_strings['LNK_BASIC_SEARCH']));
		
	if($adv_related_array!=""){
		$form->assign("ADV_RELATED_BLOCK", $adv_related_array['block']);
		if(
		($focus->rel_module1_type=="all" || $focus->rel_module1_type=="")
		&&
		($focus->rel_module2_type=="all" || $focus->rel_module2_type=="")
		){
			$form->assign("REL_SET_TYPE", "Basic");
		} else {
			$form->assign("REL_SET_TYPE", "Advanced");
		}

		$form->assign("SET_DISABLED", "No");
	} else {
		$form->assign("REL_SET_TYPE", "Basic");
		$form->assign("SET_DISABLED", "Yes");
	}



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

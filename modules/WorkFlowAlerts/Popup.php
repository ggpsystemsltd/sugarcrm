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








global $app_strings;
global $app_list_strings;
global $mod_strings;

global $urlPrefix;
global $currentModule;


$seed_object = new WorkFlowAlertShell();

if(!empty($_REQUEST['parent_id']) && $_REQUEST['parent_id']!="") {
    $seed_object->retrieve($_REQUEST['parent_id']);
    $workflow_object = $seed_object->get_workflow_object();

} else {
	sugar_die("You shouldn't be here");
}




////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
if (!isset($_REQUEST['html'])) {
	$form =new XTemplate ('modules/WorkFlowAlerts/Popup_picker.html');
	$GLOBALS['log']->debug("using file modules/WorkFlowAlerts/Popup_picker.html");
}
else {
    $_REQUEST['html'] = preg_replace("/[^a-zA-Z0-9_]/", "", $_REQUEST['html']);
    $GLOBALS['log']->debug("_REQUEST['html'] is ".$_REQUEST['html']);
	$form =new XTemplate ('modules/WorkFlowAlerts/'.$_REQUEST['html'].'.html');
	$GLOBALS['log']->debug("using file modules/WorkFlowAlerts/".$_REQUEST['html'].'.html');
}

$form->assign("MOD", $mod_strings);
$form->assign("APP", $app_strings);

$focus = new WorkFlowAlert();
//Add When Expressions Object is availabe
//$exp_object = new Expressions();

if(isset($_REQUEST['record']) && isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);

}

        $the_javascript  = "<script type='text/javascript' language='JavaScript'>\n";
        $the_javascript .= "function set_return() {\n";
        $the_javascript .= "    window.opener.document.EditView.submit();";
        $the_javascript .= "}\n";
        $the_javascript .= "</script>\n";

	$form->assign("ID", $focus->id);
    $form->assign("PARENT_ID", $_REQUEST['parent_id']);
    $form->assign("ADDRESS_TYPE", get_select_options_with_id($app_list_strings['wflow_address_type_dom'],$focus->address_type));
	$form->assign("USER_TYPE", get_select_options_with_id($app_list_strings['wflow_user_type_dom'],$focus->user_type));

	$form->assign("REL_MODULE1", get_select_options_with_id($focus->get_rel_module_array($workflow_object->base_module),$focus->rel_module1));
	$form->assign("ARRAY_TYPE", get_select_options_with_id($app_list_strings['wflow_array_type_dom'],$focus->array_type));
	$form->assign("RELATE_TYPE", get_select_options_with_id($app_list_strings['wflow_relate_type_dom'],$focus->relate_type));
	$form->assign("FIELD_VALUE", get_select_options_with_id($focus->get_field_value_array($workflow_object->base_module, "User"),$focus->field_value));

if($focus->user_type=="Related"){

	if(!empty($focus->rel_email_value) && $focus->rel_email_value!=""){
		$form->assign("CUSTOM_USER", "checked");
		$form->assign("REL_FIELD_VALUE", $focus->field_value);
		$form->assign("REL_EMAIL_VALUE", $focus->rel_email_value);
	} else {
	}

	$form->assign("REL_MODULE2", $focus->rel_module2);


//end if else Current or Related
}

//close window and refresh parent if needed

if(!empty($_REQUEST['special_action']) && $_REQUEST['special_action'] == "refresh"){

	$special_javascript = "window.opener.document.DetailView.action.value = 'DetailView'; \n";
	$special_javascript .= "window.opener.document.DetailView.submit(); \n";
	$special_javascript .= "window.close();";
	$form->assign("SPECIAL_JAVASCRIPT", $special_javascript);

}

$form->assign("MODULE_NAME", $currentModule);
//$form->assign("FORM", $_REQUEST['form']);
$form->assign("GRIDLINE", $gridline);
$form->assign("SET_RETURN_JS", $the_javascript);

insert_popup_header($theme);


$form->parse("embeded");
$form->out("embeded");


$form->parse("main");
$form->out("main");

?>

<?php insert_popup_footer(); ?>

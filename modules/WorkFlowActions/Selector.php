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

require_once('include/ListView/ProcessView.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;

global $urlPrefix;
global $currentModule;

$seed_object = new WorkFlow();

if(!empty($_REQUEST['workflow_id']) && $_REQUEST['workflow_id']!="") {
    $seed_object->retrieve($_REQUEST['workflow_id']);
} else {
	sugar_die("You shouldn't be here");
}



////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
if (!isset($_REQUEST['html'])) {
	$form =new XTemplate ('modules/WorkFlowActions/Selector.html');
	$GLOBALS['log']->debug("using file modules/WorkFlowActions/Selector.html");
}
else {
    $_REQUEST['html'] = preg_replace("/[^a-zA-Z0-9_]/", "", $_REQUEST['html']);
	$GLOBALS['log']->debug("_REQUEST['html'] is ".$_REQUEST['html']);
	$form =new XTemplate ('modules/WorkFlowActions/'.$_REQUEST['html'].'.html');
	$GLOBALS['log']->debug("using file modules/WorkFlowActions/".$_REQUEST['html'].'.html');
}

$form->assign("MOD", $mod_strings);
$form->assign("APP", $app_strings);

$focus = new WorkFlowActionShell();



///////////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!?////////////////////

//Add When Expressions Object is availabe
//$exp_object = new Expressions();


//////////////////////////////////////////////////////////////////

	$action_object = new WorkFlowAction();

	if(!empty($_REQUEST['action_id']) && $_REQUEST['action_id']!=""){
		$action_object->retrieve($_REQUEST['action_id']);
	}

	if(!empty($_REQUEST['target_field']) && $_REQUEST['target_field']!=""){
		$action_object->field = $_REQUEST['target_field'];
	}

	foreach($action_object->selector_fields as $field){
		if(isset($_REQUEST[$field])){
			//echo "FIELD".$field."REQ:".$_REQUEST[$field]."<BR>";
		$action_object->$field = $_REQUEST[$field];
		}
	}

	if(!empty($_REQUEST['adv_value']) && $_REQUEST['adv_value']!=""){
		$action_object->value = $_REQUEST['adv_value'];
	}


$output_array = $action_object->build_field_selector($_REQUEST['field_num'], $_REQUEST['target_module'], $seed_object->type, $_REQUEST['action_type']);

		$form->assign('PREFIX', "field_".$_REQUEST['field_num']."__");
		$form->assign('VALUE', $output_array['value_select']['display']);
		$form->assign('FIELD_NAME', $output_array['name']);
	    $form->assign('MOD', $GLOBALS['mod_strings']);
		$form->assign('TITLE', $GLOBALS['mod_strings']['LBL_TITLE']);

		$form->assign('FIELD_NUM', "field_".$_REQUEST['field_num']);
		$form->assign('FIELD_NUMBER', $_REQUEST['field_num']);
		$form->assign('ADV_TYPE', $output_array['adv_type']['display']);
		$form->assign('ADV_VALUE', $output_array['adv_value']['display']);
		$form->assign('EXT1', $output_array['ext1']['display']);
		$form->assign('EXT2', $output_array['ext2']['display']);
		$form->assign('EXT3', $output_array['ext3']['display']);

		$form->assign('FIELD_TYPE', $output_array['real_type'] );
		if($action_object->set_type == "") $action_object->set_type =  "Basic";

		$form->assign('SET_TYPE', $action_object->set_type);

		if(!empty($output_array['set_type']['disabled'])){
			$form->assign('SET_DISABLED', "Yes");
		}


	$form->assign("ADVANCED_SEARCH_PNG", SugarThemeRegistry::current()->getImage('advanced_search','  border="0"',null,null,'.gif',$app_strings['LNK_ADVANCED_SEARCH']));
	$form->assign("BASIC_SEARCH_PNG", SugarThemeRegistry::current()->getImage('basic_search','  border="0"',null,null,'.gif',$app_strings['LNK_BASIC_SEARCH']));

$form->assign("MODULE_NAME", $currentModule);

$form->assign("GRIDLINE", $gridline);

insert_popup_header($theme);

$form->parse("embeded");
$form->out("embeded");



$form->parse("main");
$form->out("main");
	//rsmith
	$temp_module = get_module_info($_REQUEST['target_module']);
	global $mod_strings, $current_language;
	$mod_strings = return_module_language($current_language, $temp_module->module_dir);
	$field_num = $_REQUEST['field_num'];
	//now build toggle js
	$type = $output_array['real_type'];
	$js = "<script type=\"text/javascript\">";
	$js .= "function toggle_type(type){";
	$js .= "if(type == 'Advanced'){";
	$javascript = new javascript();
    $js .= processJsForSelectorField($javascript, $action_object->field, $type, $temp_module, $field_num, 'adv') . "}";
    $js .= "else{" . processJsForSelectorField($javascript, $action_object->field, $type, $temp_module, $field_num, 'field') . "}}</script>";
	if(empty($action_object->set_type) || $action_object->set_type == "Basic"){
		$js .= $javascript->getScript(true);
	}
	else{
		$javascript = new javascript();
		$javascript->setFormName('EditView');
		$javascript->setSugarBean($temp_module);
		$javascript->addField($action_object->field, '', '', 'field_'.$_REQUEST['field_num'].'__adv_value');
		$js .= $javascript->getScript(true);
	}
	echo $js;
	//rsmith
	echo $GLOBALS['timedate']->get_javascript_validation();


function processJsForSelectorField(&$javascript, $field, $type, $tempModule, $fieldNumber, $ifAdvanced = 'field')
{
    $jsString = '';
    $javascript = new javascript();
    // Validate everything. 
    $workFlowActionsExceptionFields = array ();
    if (in_array($type, $workFlowActionsExceptionFields) != 1)
    {
        $jsString .= "removeFromValidate('EditView', 'field_{$fieldNumber}__{$ifAdvanced}_value');";
    }

    if (in_array($type, array ('date', 'time', 'datetimecombo')))
    {
        $jsString .=
            "addToValidate('EditView', 'field_{$fieldNumber}__{$ifAdvanced}_value', 'assigned_user_name', 1,'{$javascript->stripEndColon(translate($tempModule->field_name_map[$field]['vname']))}' )";
    } 
    else if (!(in_array($type, $workFlowActionsExceptionFields) == 1))
    {
        $javascript->setFormName('EditView');
        $javascript->setSugarBean($tempModule);
        $javascript->addField($field, '', '', "field_{$_REQUEST['field_num']}__{$ifAdvanced}_value");
        $jsString .= $javascript->getScript(false);
    }
    return $jsString;
}
?>

<?php insert_popup_footer(); ?>

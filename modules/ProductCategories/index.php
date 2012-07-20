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


$header_text = '';
global $mod_strings;
global $app_list_strings;
global $app_strings;
global $current_user;

if (!is_admin($current_user)&&!is_admin_for_module($GLOBALS['current_user'],'Products'))
{
   sugar_die("Unauthorized access to administration.");
}
$GLOBALS['displayListView'] = true; 
$focus = new ProductCategory();
echo getClassicModuleTitle($focus->module_dir, array($mod_strings['LBL_MODULE_NAME']), true);

$is_edit = false;
if(!empty($_REQUEST['record'])) {
    $result = $focus->retrieve($_REQUEST['record']);
	if($result == null)
    {
    	sugar_die($app_strings['ERROR_NO_RECORD']);
    }
		$is_edit=true;
}
if(isset($_REQUEST['edit']) && $_REQUEST['edit']=='true') {
	$is_edit=true;
	//Only allow admins to enter this screen
	if (!is_admin($current_user)&&!is_admin_for_module($GLOBALS['current_user'],'Products')) {
		$GLOBALS['log']->error("Non-admin user ($current_user->user_name) attempted to enter the ProductCategories edit screen");
		session_destroy();
		include('modules/Users/Logout.php');
	}
}

$GLOBALS['log']->info("ProductCategory list view");

$button  = "<form border='0' action='index.php' method='post' name='form'>\n";
$button .= "<input type='hidden' name='module' value='ProductCategories'>\n";
$button .= "<input type='hidden' name='action' value='EditView'>\n";
$button .= "<input type='hidden' name='edit' value='true'>\n";
$button .= "<input type='hidden' name='return_module' value='".$currentModule."'>\n";
$button .= "<input type='hidden' name='return_action' value='".$action."'>\n";
$button .= "<input title='".$app_strings['LBL_NEW_BUTTON_TITLE']."' accessyKey='".$app_strings['LBL_NEW_BUTTON_KEY']."' class='button primary' id='btn_create' type='submit' name='New' value='".$app_strings['LBL_NEW_BUTTON_LABEL']."'>\n";
$button .= "</form>\n";

$ListView = new ListView();
if((is_admin($current_user)||is_admin_for_module($GLOBALS['current_user'],'Products')) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])){	
		$header_text = "&nbsp;<a href='index.php?action=index&module=DynamicLayout&from_action=ListView&from_module=".$_REQUEST['module'] ."'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'"
,null,null,'.gif',$mod_strings['LBL_EDITLAYOUT'])."</a>";
}
$ListView->initNewXTemplate( 'modules/ProductCategories/ListView.html',$mod_strings);
$ListView->xTemplateAssign("DELETE_INLINE_PNG",  SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_DELETE']));
$ListView->setHeaderTitle($header_text.$button);

$ListView->show_export_button = false;
$ListView->show_mass_update = false;
$ListView->show_delete_button = false;
$ListView->show_select_menu = false;
$ListView->setQuery("", "", "list_order", "PRODUCTCATEGORY");
$ListView->processListView($focus, "main", "PRODUCTCATEGORY");

if ($is_edit) {

	$edit_button ="<form name='EditCat' method='POST' action='index.php'>\n";
    /*
    $edit_button ="<form name='EditView' method='POST' action='index.php'>\n";
    */
	$edit_button .="<input type='hidden' name='module' value='ProductCategories'>\n";
	$edit_button .="<input type='hidden' name='record' value='$focus->id'>\n";
	$edit_button .="<input type='hidden' name='action'>\n";
	$edit_button .="<input type='hidden' name='edit'>\n";
	$edit_button .="<input type='hidden' name='isDuplicate'>\n";			
	$edit_button .="<input type='hidden' name='return_module' value='ProductCategories'>\n";
	$edit_button .="<input type='hidden' name='return_action' value='index'>\n";
	$edit_button .="<input type='hidden' name='return_id' value=''>\n";
	$edit_button .='<input title="'.$app_strings['LBL_SAVE_BUTTON_TITLE'].'" accessKey="'.$app_strings['LBL_SAVE_BUTTON_KEY'].'" class="button primary" onclick="this.form.action.value=\'Save\'; return check_form(\'EditCat\');" type="submit" name="button" value="'.$app_strings['LBL_SAVE_BUTTON_LABEL'].'" >';
	$edit_button .=' <input title="'.$app_strings['LBL_SAVE_NEW_BUTTON_TITLE'].'" class="button" onclick="this.form.action.value=\'Save\'; this.form.isDuplicate.value=\'true\'; this.form.edit.value=\'true\'; this.form.return_action.value=\'EditView\'; return check_form(\'EditCat\')" type="submit" name="button" value="'.$app_strings['LBL_SAVE_NEW_BUTTON_LABEL'].'" >';
    /*
    $edit_button .='<input title="'.$app_strings['LBL_SAVE_BUTTON_TITLE'].'" accessKey="'.$app_strings['LBL_SAVE_BUTTON_KEY'].'" class="button" onclick="this.form.action.value=\'Save\'; return check_form(\'EditView\');" type="submit" name="button" value="  '.$app_strings['LBL_SAVE_BUTTON_LABEL'].'  " >';
	$edit_button .=' <input title="'.$app_strings['LBL_SAVE_NEW_BUTTON_TITLE'].'"  class="button" onclick="this.form.action.value=\'Save\'; this.form.isDuplicate.value=\'true\'; this.form.edit.value=\'true\'; this.form.return_action.value=\'EditView\'; return check_form(\'EditView\')" type="submit" name="button" value="  '.$app_strings['LBL_SAVE_NEW_BUTTON_LABEL'].'  " >';
    */
    if((is_admin($current_user)||is_admin_for_module($GLOBALS['current_user'],'Products')) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])){
		$header_text = "&nbsp;<a href='index.php?action=index&module=DynamicLayout&edit=true&from_action=EditView&from_module=".$_REQUEST['module'] ."'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' alt='Edit Layout' align='bottom'"
,null,null,'.gif',$mod_strings['LBL_EDITLAYOUT'])."</a>";
	}
    echo get_form_header($mod_strings['LBL_PRODUCTCATEGORY']." ".$focus->name . '&nbsp;' . $header_text,$edit_button , false);

	$GLOBALS['log']->info("ProductCategory edit view");
	$xtpl=new XTemplate ('modules/ProductCategories/EditView.html');
	//make anchor
	$anchor = "<a name=\"editwindow\"></a>";
	$xtpl->assign("ANCHOR", $anchor);
	$xtpl->assign("MOD", $mod_strings);
	$xtpl->assign("APP", $app_strings);
	
	if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
	if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
	if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
	$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
	$xtpl->assign("JAVASCRIPT", get_set_focus_js());
	$xtpl->assign("ID", $focus->id);
	$xtpl->assign('NAME', $focus->name);
	$xtpl->assign('DESCRIPTION', $focus->description);
    $xtpl->parse("proTree");

	if (empty($focus->list_order)) $xtpl->assign('LIST_ORDER', count($focus->get_product_categories())+1); 
	else $xtpl->assign('LIST_ORDER', $focus->list_order);


	////////for selecting a parent category
	$javascript = "<script type='text/javascript' language='JavaScript'>\n";
	$javascript .= "function get_popup(){\n";
	$javascript .= "	var parent_name = document.EditCat.parent_name.value;\n";
    $javascript .= "    var parent_id = document.EditCat.parent_id.value;\n";
	$javascript .= "	var button_query = 'index.php?module=ProductCategories&action=Popup&html=Popup_picker&tree=CatCat&form=EditCat' +'&parent_name=' + parent_name + '&parent_category_id=' + parent_id ;\n";
	$javascript .= " 	var button_params = 'width=600,height=400,resizable=1,scrollbars=1';\n";
	$javascript .= "	window.open(button_query + '&query=true', 'Test', button_params);\n";
	$javascript .= "	}\n";
	$javascript .= "</script>\n";
	
	$xtpl->assign("JAVA_SCRIPT_POPUP", $javascript);
    $xtpl->parse("main.proPopup");

	$clear_parent_button = "<input title='".$app_strings['LBL_CLEAR_BUTTON_TITLE']."'  class='button' LANGUAGE=javascript onclick=\"this.form.parent_name.value = '';\" type='button' name='button' value='  ".$app_strings['LBL_CLEAR_BUTTON_LABEL']."  '>\n";
	$change_parent_button = "<input tabindex='2'  title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."'  tabindex='2' type='button' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='button' LANGUAGE=javascript onclick='return get_popup();'>";
	$xtpl->assign("CHANGE_PARENT_BUTTON", $change_parent_button);
	
	$xtpl->assign("CLEAR_PARENT_BUTTON", $clear_parent_button);
	$xtpl->assign("PARENT_NAME", $focus->parent_name);
    $xtpl->assign("PARENT_ID",$focus->parent_id);
	$xtpl->assign("TYPE", $focus->type);
    $xtpl->parse("main.proParentName");

	/////////////end tree mod/////////
// adding custom fields:

require_once('modules/DynamicFields/templates/Files/EditView.php');


	$xtpl->parse("main");
	$xtpl->out("main");
	
$javascript = new javascript();
$javascript->setFormName('EditView');
$javascript->setSugarBean($focus);
$javascript->addAllFields('');
echo $javascript->getScript();
}
?>
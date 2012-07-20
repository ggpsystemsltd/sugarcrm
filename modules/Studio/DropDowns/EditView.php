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




global $app_list_strings, $app_strings, $mod_strings;

require_once('modules/Studio/DropDowns/DropDownHelper.php');
require_once('modules/Studio/parsers/StudioParser.php');
$dh = new DropDownHelper();
$dh->getDropDownModules();
$smarty = new Sugar_Smarty();
$smarty->assign('MOD', $GLOBALS['mod_strings']);
$title=getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings['LBL_RENAME_TABS']), false);
$smarty->assign('title', $title);
$selected_lang = (!empty($_REQUEST['dropdown_lang'])?$_REQUEST['dropdown_lang']:$_SESSION['authenticated_user_language']);
if(empty($selected_lang)){

    $selected_lang = $GLOBALS['sugar_config']['default_language'];
}
if($selected_lang == $GLOBALS['current_language']){
	$my_list_strings = $GLOBALS['app_list_strings'];
}else{
	$my_list_strings = return_app_list_strings_language($selected_lang);
}
foreach($my_list_strings as $key=>$value){
	if(!is_array($value)){
		unset($my_list_strings[$key]);
	}
}
$modules = array_keys($dh->modules);
$dropdown_modules = array(''=>$GLOBALS['mod_strings']['LBL_DD_ALL']);
foreach($modules as $module){
    $dropdown_modules[$module] = (!empty($app_list_strings['moduleList'][$module]))?$app_list_strings['moduleList'][$module]: $module;
}
$smarty->assign('dropdown_modules',$dropdown_modules);
if(!empty($_REQUEST['dropdown_module']) &&  !empty($dropdown_modules[$_REQUEST['dropdown_module']]) ){

    $smarty->assign('dropdown_module',$_REQUEST['dropdown_module']);
    $dropdowns = (!empty($dh->modules[$_REQUEST['dropdown_module']]))?$dh->modules[$_REQUEST['dropdown_module']]: array();
    foreach($dropdowns as $ok=>$dk){
        if(!isset($my_list_strings[$dk]) || !is_array($my_list_strings[$dk])){
            unset($dropdowns[$ok]);

        }

    }


}else{
     if(!empty($_REQUEST['dropdown_module'])){
        $smarty->assign('error', 'Module does not have any known dropdowns');
    }
    $dropdowns = array_keys($my_list_strings);
}
asort($dropdowns);
if(!empty($_REQUEST['newDropdown'])){
    $smarty->assign('newDropDown',true);
}else{
$keys = array_keys($dropdowns);
$first_string = $dropdowns[$keys[0]];
$smarty->assign('dropdowns',$dropdowns);
if(empty($_REQUEST['dropdown_name']) || !in_array($_REQUEST['dropdown_name'], $dropdowns)){
    $_REQUEST['dropdown_name'] = $first_string;
}
$selected_dropdown = $my_list_strings[$_REQUEST['dropdown_name']];

foreach($selected_dropdown as $key=>$value){
   if($selected_lang != $_SESSION['authenticated_user_language'] && !empty($app_list_strings[$_REQUEST['dropdown_name']]) && isset($app_list_strings[$_REQUEST['dropdown_name']][$key])){
        $selected_dropdown[$key]=array('lang'=>$value, 'user_lang'=> '['.$app_list_strings[$_REQUEST['dropdown_name']][$key] . ']');
   }else{
       $selected_dropdown[$key]=array('lang'=>$value);
   }
}

$selected_dropdown = $dh->filterDropDown($_REQUEST['dropdown_name'], $selected_dropdown);

$smarty->assign('dropdown', $selected_dropdown);
$smarty->assign('dropdown_name',$_REQUEST['dropdown_name']);

}

$smarty->assign('dropdown_languages', get_languages());
if(strcmp($_REQUEST['dropdown_name'], 'moduleList') == 0){
	$smarty->assign('disable_remove', true);
	$smarty->assign('disable_add', true);
	$smarty->assign('use_push', 1);
}else{
	$smarty->assign('use_push', 0);
}

$imageSave = SugarThemeRegistry::current()->getImage( 'studio_save', '',null,null,'.gif',$mod_strings['LBL_SAVE']);
$imageUndo = SugarThemeRegistry::current()->getImage('studio_undo', '',null,null,'.gif',$mod_strings['LBL_UNDO']);
$imageRedo = SugarThemeRegistry::current()->getImage('studio_redo', '',null,null,'.gif',$mod_strings['LBL_REDO']);
$buttons = array();
$buttons[] = array('text'=>$mod_strings['LBL_BTN_UNDO'],'actionScript'=>"onclick='jstransaction.undo()'" );
$buttons[] = array('text'=>$mod_strings['LBL_BTN_REDO'],'actionScript'=>"onclick='jstransaction.redo()'" );
$buttons[] = array('text'=>$mod_strings['LBL_BTN_SAVE'],'actionScript'=>"onclick='if(check_form(\"editdropdown\")){document.editdropdown.submit();}'");
$buttonTxt = StudioParser::buildImageButtons($buttons);
$smarty->assign('buttons', $buttonTxt);
$smarty->assign('dropdown_lang', $selected_lang);

$editImage = SugarThemeRegistry::current()->getImage( 'edit_inline', '',null,null,'.gif',$mod_strings['LBL_INLINE']);
$smarty->assign('editImage',$editImage);
$deleteImage = SugarThemeRegistry::current()->getImage( 'delete_inline', '',null,null,'.gif',$mod_strings['LBL_DELETE']);
$smarty->assign('deleteImage',$deleteImage);
$smarty->display("modules/Studio/DropDowns/EditView.tpl");
?>

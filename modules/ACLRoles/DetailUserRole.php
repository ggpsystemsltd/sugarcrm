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




global $app_list_strings, $app_strings, $current_user;

$mod_strings = return_module_language($GLOBALS['current_language'], 'Users');

$focus = new User();
$focus->retrieve($_REQUEST['record']);
if ( !is_admin($focus) ) {
    $sugar_smarty = new Sugar_Smarty();
    $sugar_smarty->assign('MOD', $mod_strings);
    $sugar_smarty->assign('APP', $app_strings);
    $sugar_smarty->assign('APP_LIST', $app_list_strings);
    
    $categories = ACLAction::getUserActions($_REQUEST['record'],true);
    
    //clear out any removed tabs from user display
    if(!$GLOBALS['current_user']->isAdminForModule('Users')){
        $tabs = $focus->getPreference('display_tabs');
        global $modInvisList;
        if(!empty($tabs)){
            foreach($categories as $key=>$value){
                if(!in_array($key, $tabs) &&  !in_array($key, $modInvisList) ){
                    unset($categories[$key]);
                    
                }
            }
            
        }
    }
    
    $names = array();
    $names = ACLAction::setupCategoriesMatrix($categories);
    if(!empty($names))$tdwidth = 100 / sizeof($names);
    $sugar_smarty->assign('APP', $app_list_strings);
    $sugar_smarty->assign('CATEGORIES', $categories);
    $sugar_smarty->assign('TDWIDTH', $tdwidth);
    $sugar_smarty->assign('ACTION_NAMES', $names);
    
    $title = getClassicModuleTitle( '',array($mod_strings['LBL_MODULE_NAME'],$mod_strings['LBL_ROLES_SUBPANEL_TITLE']), '');
    
    $sugar_smarty->assign('TITLE', $title);
    $sugar_smarty->assign('USER_ID', $focus->id);
    $sugar_smarty->assign('LAYOUT_DEF_KEY', 'UserRoles');
    echo $sugar_smarty->fetch('modules/ACLRoles/DetailViewUser.tpl');
    
    
    //this gets its layout_defs.php file from the user not from ACLRoles so look in modules/Users for the layout defs
    require_once('include/SubPanel/SubPanelTiles.php');
    $modules_exempt_from_availability_check=array('Users'=>'Users','ACLRoles'=>'ACLRoles',);
    $subpanel = new SubPanelTiles($focus, 'UserRoles');
    
    echo $subpanel->display(true,true);
}
if ( empty($hideTeams) ) {
    $focus_list =$focus->get_my_teams(TRUE);
    
    // My Teams subpanel should not be displayed for group and portal users
    if(!($focus->is_group=='1' || $focus->portal_only=='1')){
        include('modules/Teams/SubPanelViewUsers.php');
        $SubPanel = new SubPanelViewUsers();
        $SubPanel->setFocus($focus);
        $SubPanel->setTeamsList($focus_list);
        $SubPanel->ProcessSubPanelListView("modules/Teams/SubPanelViewUsers.html", $mod_strings, 'DetailView');
    }
}

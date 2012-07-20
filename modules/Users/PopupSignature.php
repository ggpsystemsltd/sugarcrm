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

require_once('include/SugarTinyMCE.php');



require_once('modules/Users/UserSignature.php');
global $app_strings;
global $app_list_strings;
global $curent_language;


$mod_strings= return_module_language($current_language, $currentModule);

$focus = new UserSignature();

if(isset($_REQUEST['record']) && !empty($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
}

if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
	$focus->id = "";
}
$GLOBALS['log']->info('EmailTemplate detail view');

///////////////////////////////////////////////////////////////////////////////
////	OUTPUT 
echo insert_popup_header();
echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings['LBL_SIGNATURE'].' '.$focus->name), true); 


$xtpl = new XTemplate ('modules/Users/UserSignatureEditView.html');
$xtpl->assign('MOD', $mod_strings);
$xtpl->assign('APP', $app_strings);
	
$xtpl->assign('CANCEL_SCRIPT', 'window.close()');

if(isset($_REQUEST['return_module'])) $xtpl->assign('RETURN_MODULE', $_REQUEST['return_module']);
if(isset($_REQUEST['return_action'])) $xtpl->assign('RETURN_ACTION', $_REQUEST['return_action']);
if(isset($_REQUEST['return_id'])) $xtpl->assign('RETURN_ID', $_REQUEST['return_id']);
// handle Create $module then Cancel
if(empty($_REQUEST['return_id'])) {
	$xtpl->assign('RETURN_ACTION', 'index');
}
$xtpl->assign('INPOPUPWINDOW','true');
$xtpl->assign('PRINT_URL', 'index.php?'.$GLOBALS['request_string']);
$xtpl->assign('JAVASCRIPT', get_set_focus_js());
$xtpl->assign('ID', $focus->id);
$xtpl->assign('NAME', $focus->name);
$xtpl->assign('SIGNATURE_TEXT', !empty($focus->signature_html) ? $focus->signature_html : $focus->signature);

if(isset($_REQUEST['the_user_id']))
	$xtpl->assign('THE_USER_ID', $_REQUEST['the_user_id']);

$tiny = new SugarTinyMCE();
$xtpl->assign("tinyjs", $tiny->getInstance('sigText'));

$xtpl->parse('main.textarea');

//Add Custom Fields
$xtpl->parse('main');
$xtpl->out('main');
?>
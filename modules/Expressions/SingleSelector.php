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

require_once('include/utils/expression_utils.php');






global $app_strings;
global $app_list_strings;
global $mod_strings;

global $urlPrefix;
global $currentModule;
global $sugar_version, $sugar_config;


$focus = new Expression();

if(!empty($_REQUEST['type']) && $_REQUEST['type']!="") {
    $type = $_REQUEST['type'];
} else {
	sugar_die("You shouldn't be here");	
}
if(!empty($_REQUEST['value']) && $_REQUEST['value']!="") {
    $value = $_REQUEST['value'];
} else {
	$value ="";	
}	
if(!empty($_REQUEST['dom_name']) && $_REQUEST['dom_name']!="") {
    $dom_name = $_REQUEST['dom_name'];
} else {
	$dom_name ="";
}
if(!empty($_REQUEST['meta_filter_name']) && $_REQUEST['meta_filter_name']!="") {
    $meta_filter_name = $_REQUEST['meta_filter_name'];
} else {
	$meta_filter_name ="";
}	
if(!empty($_REQUEST['trigger_type']) && $_REQUEST['trigger_type'] != "") {
    $trigger_type = $_REQUEST['trigger_type'];
} else {
	$trigger_type = "";
}	



////////////////////////////////////////////////////////
// Start the output
////////////////////////////////////////////////////////
	$form =new XTemplate ('modules/Expressions/SingleSelector.html');
	$GLOBALS['log']->debug("using file modules/Expressions/SingleSelector.html");

$form->assign("MOD", $mod_strings);
$form->assign("APP", $app_strings);
$form->assign("PLEASE_SELECT", $mod_strings['LBL_PLEASE_SELECT']);
$form->assign("OPENER_ID", $_REQUEST['opener_id']);
$form->assign("HREF_OBJECT", $_REQUEST['href_object']);

$select_options = $focus->get_selector_array($type, $value, $dom_name, false, $meta_filter_name, true, $trigger_type, false);

$form->assign("SELECTOR_DROPDOWN", $select_options);

$form->assign("MODULE_NAME", $currentModule);
$form->assign("GRIDLINE", $gridline);

insert_popup_header($theme);

$form->parse("embeded");
$form->out("embeded");


$form->parse("main");
$form->out("main");

?>

<?php insert_popup_footer(); ?>

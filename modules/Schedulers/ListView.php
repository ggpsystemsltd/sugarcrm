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





$header_text = '';
global $mod_strings;
global $app_list_strings;
global $app_strings;
global $current_user;
global $current_language;
$current_module_strings = return_module_language($current_language, 'Schedulers');

$focus = new Scheduler();
$focus->checkCurl();

$where = '';
$limit = '0';
$varName = $focus->object_name; //'Scheduler'
if(!empty($_REQUEST['Schedulers_SCHEDULER_ORDER_BY'])) {
	$orderBy = $_REQUEST['Schedulers_SCHEDULER_ORDER_BY'];
} else {
	$orderBy = $focus->order_by;
}
$allowByOverride = true;

$listView = new ListView();
$listView->show_mass_update = false;  // don't want to mass delete all Schedules
$listView->force_mass_update = true;  // show checkboxes
$listView->show_mass_update_form = false; // don't want the mass update
$listView->initNewXTemplate('modules/Schedulers/ListView.html', $current_module_strings);
$listView->setHeaderTitle($current_module_strings['LBL_LIST_TITLE']);
$listView->setQuery($where, $limit, $orderBy, $varName, $allowByOverride);
$listView->xTemplateAssign("REMOVE_INLINE_PNG", SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']));
$listView->processListView($focus, "main", "SCHEDULER");

$focus->displayCronInstructions(); 
?>

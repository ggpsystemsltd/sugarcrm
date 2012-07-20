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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/





require_once('include/ListView/ListViewSmarty.php');

global $app_strings, $app_list_strings, $current_language, $currentModule, $mod_strings;

echo getClassicModuleTitle('SavedSearch', array($mod_strings['LBL_MODULE_TITLE']), false);
echo get_form_header($mod_strings['LBL_SEARCH_FORM_TITLE'], '', false);

$search_form = new XTemplate ('modules/SavedSearch/SearchForm.html');
$search_form->assign('MOD', $mod_strings);
$search_form->assign('APP', $app_strings);
$search_form->assign('JAVASCRIPT', get_clear_form_js());

if (isset($_REQUEST['name'])) $search_form->assign('name', to_html($_REQUEST['name']));
if (isset($_REQUEST['search_module'])) $search_form->assign('search_module', to_html($_REQUEST['search_module']));
	
$search_form->parse('main');
$search_form->out('main');

if (!isset($where)) $where = "assigned_user_id = {$current_user->id}";


echo '<br />' .get_form_header($mod_strings['LBL_LIST_FORM_TITLE'], '', false);

$savedSearch = new SavedSearch();
$lv = new ListViewSmarty();
if(file_exists('custom/modules/SavedSearch/metadata/listviewdefs.php')){
	require_once('custom/modules/SavedSearch/metadata/listviewdefs.php');	
}else{
	require_once('modules/SavedSearch/metadata/listviewdefs.php');
}

$lv->displayColumns = $listViewDefs['SavedSearch'];
$lv->setup($savedSearch, 'include/ListView/ListViewGeneric.tpl', $where);
$lv->display(true);
?>

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




require_once('include/contextMenus/contextMenu.php');
require_once('modules/Reports/schedule/ReportSchedule.php');
require_once('modules/Reports/ListViewReports.php');
if(file_exists('custom/modules/Reports/metadata/listviewdefs.php')){
    require_once('custom/modules/Reports/metadata/listviewdefs.php');  
}else{
    require_once('modules/Reports/metadata/listviewdefs.php');
}

require_once('modules/Reports/SearchFormReports.php');
require_once('include/ListView/ListViewSmarty.php');


global $published_report_titles;
global $my_report_titles;
global $current_user;
global $modules_report;
global $mod_strings;
global $module_map;
global $report_modules;

$savedReportsSeed = new SavedReport();
$lv = new ListViewReports();


if ( empty($_REQUEST['search_form_only']) )
    echo "<div class='listViewBody'>";

if(isset($_REQUEST['Reports2_SAVEDREPORT_offset'])) {//if you click the pagination button, it will poplate the search criteria here
    if(!empty($_REQUEST['current_query_by_page'])) {//The code support multi browser tabs pagination
    
        $blockVariables = array('mass', 'uid', 'massupdate', 'delete', 'merge', 'selectCount', 'request_data', 'current_query_by_page' , 'Reports2_SAVEDREPORT_ORDER_BY');
         if(isset($_REQUEST['lvso'])){
        	$blockVariables[] = 'lvso';
        }
        
        $current_query_by_page = unserialize(base64_decode($_REQUEST['current_query_by_page']));
        foreach($current_query_by_page as $search_key=>$search_value) {
            if($search_key != 'Reports2_SAVEDREPORT_offset' && !in_array($search_key, $blockVariables)) {
                //bug 48620 
                if (!is_array($search_value)) {
                    $_REQUEST[$search_key] = $GLOBALS['db']->quote($search_value);
                    }
                else {
                    foreach ($search_value as $key=>&$val) {
                        $val = $GLOBALS['db']->quote($val);
                    }
                    $_REQUEST[$search_key] = $search_value;
                }
            }
        }
    }
}

if(!empty($_REQUEST['saved_search_select']) && $_REQUEST['saved_search_select']!='_none') {
    if(empty($_REQUEST['button']) && (empty($_REQUEST['clear_query']) || $_REQUEST['clear_query']!='true')) {
        $saved_search = loadBean('SavedSearch');
        $saved_search->retrieveSavedSearch($_REQUEST['saved_search_select']);
        $saved_search->populateRequest();
    }
    elseif(!empty($_REQUEST['button'])) { // click the search button, after retrieving from saved_search
        $_SESSION['LastSavedView'][$_REQUEST['module']] = '';
        unset($_REQUEST['saved_search_select']);
        unset($_REQUEST['saved_search_select_name']);
    }
}

require_once('modules/MySettings/StoreQuery.php');
$storeQuery = new StoreQuery();

if(!isset($_REQUEST['query']) && empty($_GET['favorite'])){// when we click the 'My Favorate Reports', it should not populate the StoredQuery
    $storeQuery->loadQuery($currentModule);
    $storeQuery->populateRequest();
}else{
    $storeQuery->saveFromRequest($currentModule);   
}

// setup for search form
$thisMod = 'Reports';
$searchForm = new SearchFormReports($thisMod, $savedReportsSeed);


$searchForm->tabs = array(array('title'  => $app_strings['LNK_BASIC_SEARCH'],
                          'link'   => $thisMod . '|basic_search',
                          'key'    => $thisMod . '|basic_search'),
                    array('title'  => $app_strings['LNK_ADVANCED_SEARCH'],
                          'link'   => $thisMod . '|advanced_search',
                          'key'    => $thisMod . '|advanced_search')
                    );

$searchForm->populateFromRequest();
$searchForm->searchFields['module'] = $searchForm->searchFields['report_module'];
unset($searchForm->searchFields['report_module']);
$where_clauses = $searchForm->generateSearchWhere();
include('include/modules.php');
$ACLAllowedModules = getACLAllowedModules();


$ACLUnAllowedModules = getACLDisAllowedModules();
$ACLAllowedModulesKeys = array_keys($ACLAllowedModules);
$listViewDefsNewArray = array();
$listViewDefsNewArray = sugarArrayMerge($listViewDefsNewArray, $listViewDefs);
unset($listViewDefsNewArray['Reports']['IS_EDIT']);
unset($listViewDefsNewArray['Reports']['LAST_RUN_DATE']);

foreach($ACLUnAllowedModules as $module => $class_name) {
	array_push($where_clauses, "saved_reports.module != '$module'");
}

$reportModules = array();

foreach($ACLAllowedModules as $key => $module) {
    $reportModules[$key] = isset($app_list_strings['moduleList'][$key]) ? $app_list_strings['moduleList'][$key] : $key;
} 

asort($reportModules);
if(!empty($_REQUEST['search_form_only']) && $_REQUEST['search_form_only']) { // handle ajax requests for search forms only
    switch($_REQUEST['search_form_view']) {
        case 'basic_search':
            $searchForm->setup();
		    $searchForm->xtpl->assign('MODULES', get_select_options_with_id($reportModules,  (empty($_REQUEST['report_module']) ? '' : $_REQUEST['report_module'])));
			$searchForm->xtpl->assign('USER_FILTER', get_select_options_with_id(get_user_array(FALSE), (empty($_REQUEST['assigned_user_id']) ? '' : $_REQUEST['assigned_user_id'])));
			$searchForm->xtpl->assign('REPORT_TYPES', get_select_options_with_id($app_list_strings['dom_report_types'], (empty($_REQUEST['report_type']) ? '' : $_REQUEST['report_type'])));
		    $searchForm->xtpl->assign('FAVORITE', (isset($_REQUEST['favorite']) ? 'checked' : ''));
            $searchForm->displayBasic(false);
            break;
        case 'advanced_search':
            $searchForm->setup();
		    $searchForm->xtpl->assign('MODULES', get_select_options_with_id($reportModules,  (empty($_REQUEST['report_module']) ? '' : $_REQUEST['report_module'])));
			$searchForm->xtpl->assign('USER_FILTER', get_select_options_with_id(get_user_array(FALSE), (empty($_REQUEST['assigned_user_id']) ? '' : $_REQUEST['assigned_user_id'])));
			$searchForm->xtpl->assign('TEAM_FILTER', get_select_options_with_id(get_team_array(FALSE), (empty($_REQUEST['team_id']) ? '' : $_REQUEST['team_id'])));
			$searchForm->xtpl->assign('REPORT_TYPES', get_select_options_with_id($app_list_strings['dom_report_types'], (empty($_REQUEST['report_type']) ? '' : $_REQUEST['report_type'])));
		    $searchForm->xtpl->assign('FAVORITE', (isset($_REQUEST['favorite']) ? 'checked' : ''));
            $searchForm->displayAdvanced(false, false, $listViewDefsNewArray, $lv);
            echo "<script>if(typeof(loadSSL_Scripts)=='function'){
		loadSSL_Scripts();
	}</script>";
            break;
        case 'saved_views':
            echo $searchForm->displaySavedViews($listViewDefsNewArray, $lv, false);
            break;
    }
    return;
}
if(!empty($_REQUEST['view'])) { // backwards compatibility support for menu links from other modules
    array_push($where_clauses, 'saved_reports.module = \'' . ucwords(clean_string($_REQUEST['view'])) . '\'');
}
if(!empty($_REQUEST['favorite'])) { // handle favorite requests
    foreach($where_clauses as $p_where => $single_where) {
        if(strpos($single_where, "saved_reports.favorite ") !==false) {
            unset($where_clauses[$p_where]);
        }
    }
    array_push($where_clauses, 
        'saved_reports.id IN ( 
            SELECT sugarfavorites.record_id FROM sugarfavorites 
                WHERE sugarfavorites.deleted=0 
                    and sugarfavorites.module = \'Reports\' 
                    and sugarfavorites.assigned_user_id = \''.$GLOBALS['current_user']->id.'\')');
}
$displayColumns = array();
if(!empty($_REQUEST['displayColumns'])) {
    foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
        if(!empty($listViewDefs['Reports'][$col])) 
            $displayColumns[$col] = $listViewDefs['Reports'][$col];
    }    
}
elseif(!empty($savedDisplayColumns)) {
    $displayColumns = $savedDisplayColumns;
}
else {
    foreach($listViewDefs['Reports'] as $col => $p) {
        if(!empty($p['default']) && $p['default'])
            $displayColumns[$col] = $p;
    }
}
if (!isset($displayColumns['LAST_RUN_DATE'])) {
	$displayColumns['LAST_RUN_DATE'] = $listViewDefs['Reports']['LAST_RUN_DATE'];
} // if

$lv->export = false;
$lv->displayColumns = $displayColumns;
//if(empty($_REQUEST['favorite'])) { // display search form for non-favorite views
	if(!isset($_REQUEST['search_form']) || $_REQUEST['search_form'] != 'false') {
	    $searchForm->setup();
	    if(isset($_REQUEST['searchFormTab']) && $_REQUEST['searchFormTab'] == 'advanced_search') {
		    $searchForm->xtpl->assign('MODULES', get_select_options_with_id($reportModules, empty($_REQUEST['report_module']) ? isset($saved_search->contents['report_module']) && $saved_search->contents['report_module']!='_none' ? $saved_search->contents['report_module'] : '' : $_REQUEST['report_module'] ));
			$searchForm->xtpl->assign('TEAM_FILTER', get_select_options_with_id(get_team_array(FALSE), empty($_REQUEST['team_id']) ? isset($saved_search->contents['team_id']) && $saved_search->contents['team_id']!='_none' ? $saved_search->contents['team_id'] : '' : $_REQUEST['team_id'] ));
			$searchForm->xtpl->assign('USER_FILTER', get_select_options_with_id(get_user_array(FALSE), empty($_REQUEST['assigned_user_id']) ? isset($saved_search->contents['assigned_user_id']) && $saved_search->contents['assigned_user_id']!='_none' ? $saved_search->contents['assigned_user_id'] : '' : $_REQUEST['assigned_user_id'] ));
			$searchForm->xtpl->assign('REPORT_TYPES', get_select_options_with_id($app_list_strings['dom_report_types'], empty($_REQUEST['report_type']) ? isset($saved_search->contents['report_type']) && $saved_search->contents['report_type']!='_none' ? $saved_search->contents['report_type'] : '' : $_REQUEST['report_type'] ));
		    $searchForm->xtpl->assign('FAVORITE', (isset($_REQUEST['favorite']) ? 'checked' : ''));
	        $searchForm->displayAdvanced(true, false, $listViewDefsNewArray, $lv);
            echo "<script>if(typeof(loadSSL_Scripts)=='function'){
		loadSSL_Scripts();
	}</script>";
	    }else {
		    $searchForm->xtpl->assign('MODULES', get_select_options_with_id($reportModules, empty($_REQUEST['report_module_basic']) ? isset($saved_search->contents['report_module_basic']) && $saved_search->contents['report_module_basic']!='_none' ? $saved_search->contents['report_module_basic'] : '' : $_REQUEST['report_module_basic'] ));
			$searchForm->xtpl->assign('USER_FILTER', get_select_options_with_id(get_user_array(FALSE), empty($_REQUEST['assigned_user_id_basic']) ? isset($saved_search->contents['assigned_user_id_basic']) && $saved_search->contents['assigned_user_id_basic']!='_none' ? $saved_search->contents['assigned_user_id_basic'] : '' : $_REQUEST['assigned_user_id_basic'] ));
			$searchForm->xtpl->assign('REPORT_TYPES', get_select_options_with_id($app_list_strings['dom_report_types'], empty($_REQUEST['report_type_basic']) ? isset($saved_search->contents['report_type_basic']) && $saved_search->contents['report_type_basic']!='_none' ? $saved_search->contents['report_type_basic'] : '' : $_REQUEST['report_type_basic'] ));
		    $searchForm->xtpl->assign('FAVORITE', (isset($_REQUEST['favorite']) ? 'checked' : ''));
	        $searchForm->displayBasic();
	    }
	}
//}
$params = array('massupdate' => true, 'handleMassupdate' => false);

// handle add to favorites request
$favoritesText = '';
if((!empty($_POST['addtofavorites']) || !empty($_POST['delete'])) && !empty($_POST['mass'])) {
    $report = new SavedReport();
    if(isset($_POST['Delete'])) {
       	$couldNotDelete = 0;
        foreach($_POST['mass'] as $id) {
            $report->retrieve($id);
            if($report->ACLAccess('Delete')){
                $report->mark_deleted($id);
            }
            else {
            	$couldNotDelete++;
            }
        }
    	if ($couldNotDelete > 0)
    		echo '<font color="red">'.$mod_strings['LBL_DELETE_ERROR'].'</font>';

    }
    
}

if(!empty($_REQUEST['orderBy'])) {
    if(trim($_REQUEST['orderBy']) == 'REPORT_TYPE_TRANS'){
        $_REQUEST['orderBy'] = 'REPORT_TYPE'; 
    }elseif(trim($_REQUEST['orderBy']) == 'TEAM_NAME'){
        $_REQUEST['orderBy'] = 'TEAM_ID'; 
    }elseif(trim($_REQUEST['orderBy']) == 'ASSIGNED_USER_NAME'){
        $_REQUEST['orderBy'] = 'ASSIGNED_USER_ID'; 
    }
    $params['orderBy'] = $_REQUEST['orderBy'];
    $params['overrideOrder'] = true;
    if(!empty($_REQUEST['sortOrder'])) $params['sortOrder'] = $_REQUEST['sortOrder'];
}

$userPreferenceOrder = $current_user->getPreference('listviewOrder', 'Reports2_SAVEDREPORT');
$toSetdefaultOrderBy = true;
if (!empty($userPreferenceOrder)) {
	if (isset($userPreferenceOrder['orderBy'])) {
		$toSetdefaultOrderBy = false;
	}
} // if

echo $favoritesText;

$params['custom_select'] = ', report_schedules.id as schedule_id, report_schedules.active as active, report_cache.date_modified as last_run_date';
$params['custom_from'] = " LEFT OUTER JOIN report_cache on saved_reports.id = report_cache.id AND report_cache.assigned_user_id = '{$current_user->id}' LEFT JOIN report_schedules ON saved_reports.id = report_schedules.report_id AND report_schedules.user_id = '{$current_user->id}' AND report_schedules.deleted = 0 ";
$params['custom_order_by_override'] = array();
$params['custom_order_by_override']['ori_code'] = 'saved_reports.date_entered'; // Bug #25476
$params['custom_order_by_override']['custom_code'] = "coalesce(saved_reports.date_entered, report_cache.date_modified, saved_reports.date_modified)"; // Added saved_reports.date_entered for bug #49817

if (!isset($params['orderBy']) && $toSetdefaultOrderBy) {
	$params['orderBy'] = "saved_reports.date_entered";
	$params['sortOrder'] = "desc";
    $params['overrideOrder'] = true;
} // if

$lv->showMassupdateFields = false;
$lv->setup($savedReportsSeed, 'include/ListView/ListViewGeneric.tpl', implode(' AND ', $where_clauses), $params);


// display
if(empty($_REQUEST['favorite'])) { // display search form for non-favorite views
	// start display
	// which tab of search form to display
    //echo get_form_header($mod_strings['LBL_SEARCH_FORM_TITLE'], "", false);
    $lv->displayEndTpl = 'modules/Reports/tpls/MassUpdate.tpl';
}
else { // display different ending (with remove from my favorites button);
    //echo get_form_header($mod_strings['LBL_SEARCH_FORM_TITLE'], "", false);
    $lv->displayEndTpl = 'modules/Reports/tpls/FavoritesEnd.tpl';
}

echo $lv->display();

$savedSearch = new SavedSearch();
$json = getJSONobj();
// fills in saved views select box on shortcut menu
$savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>' . $savedSearch->getSelect('Reports')));
$str = "<script>
YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
</script>";
echo $str;

echo <<<EOQ
<script>
function schedulePOPUP(id){
            window.open("index.php?module=Reports&action=add_schedule&to_pdf=true&id=" + id ,"test","width=400,height=250,resizable=1,scrollbars=1")
}
</script>
EOQ;

if ( empty($_REQUEST['search_form_only']) )
    echo "</div>";
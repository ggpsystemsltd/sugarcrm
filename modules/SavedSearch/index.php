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

	
if(!empty($_REQUEST['saved_search_action'])) {

	$ss = new SavedSearch();
	
	switch($_REQUEST['saved_search_action']) {
        case 'update': // save here
        	$savedSearchBean = loadBean($_REQUEST['search_module']);
            $ss->handleSave('', true, false, $_REQUEST['saved_search_select'], $savedSearchBean);
            break;
		case 'save': // save here
			$savedSearchBean = loadBean($_REQUEST['search_module']);
			$ss->handleSave('', true, false, null, $savedSearchBean);
			break;
		case 'delete': // delete here
			$ss->handleDelete($_REQUEST['saved_search_select']);
			break;			
	}
}
elseif(!empty($_REQUEST['saved_search_select'])) { // requesting a search here.
    if(!empty($_REQUEST['searchFormTab'])) // where is the request from  
        $searchFormTab = $_REQUEST['searchFormTab'];
    else 
        $searchFormTab = 'saved_views';

	if($_REQUEST['saved_search_select'] == '_none') { // none selected
		$_SESSION['LastSavedView'][$_REQUEST['search_module']] = '';
        $current_user->setPreference('ListViewDisplayColumns', array(), 0, $_REQUEST['search_module']);
        $ajaxLoad = empty($_REQUEST['ajax_load']) ? "" : "&ajax_load=" . $_REQUEST['ajax_load'];
        header("Location: index.php?action=index&module={$_REQUEST['search_module']}&searchFormTab={$searchFormTab}&query=true&clear_query=true$ajaxLoad");
		die();
	}
	else {
		
		$ss = new SavedSearch();
        $show='no';
        if(isset($_REQUEST['showSSDIV'])){$show = $_REQUEST['showSSDIV'];}
		$ss->returnSavedSearch($_REQUEST['saved_search_select'], $searchFormTab, $show);
	}
}
else {
	include('modules/SavedSearch/ListView.php');
}

?>
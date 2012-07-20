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


global $current_user, $sugar_version, $sugar_config, $beanFiles;


require_once('include/MySugar/MySugar.php');

// build dashlet cache file if not found
if(!is_file($cachefile = sugar_cached('dashlets/dashlets.php'))) {
    require_once('include/Dashlets/DashletCacheBuilder.php');

    $dc = new DashletCacheBuilder();
    $dc->buildCache();
}
require_once $cachefile;

require('modules/Home/dashlets.php');

$pages = $current_user->getPreference('pages', 'Home');
$dashlets = $current_user->getPreference('dashlets', 'Home');

$defaultHomepage = false;
// BEGIN fill in with default homepage and dashlet selections

$hasUserPreferences = (!isset($pages) || empty($pages) || !isset($dashlets) || empty($dashlets)) ? false : true;

if(!$hasUserPreferences){
	// BEGIN 'My Sugar'
	$defaultHomepage = true;
    $dashlets = array();

    //list of preferences to move over and to where
    $prefstomove = array(
        'mypbss_date_start' => 'MyPipelineBySalesStageDashlet',
        'mypbss_date_end' => 'MyPipelineBySalesStageDashlet',
        'mypbss_sales_stages' => 'MyPipelineBySalesStageDashlet',
        'mypbss_chart_type' => 'MyPipelineBySalesStageDashlet',
        'lsbo_lead_sources' => 'OpportunitiesByLeadSourceByOutcomeDashlet',
        'lsbo_ids' => 'OpportunitiesByLeadSourceByOutcomeDashlet',
        'pbls_lead_sources' => 'OpportunitiesByLeadSourceDashlet',
        'pbls_ids' => 'OpportunitiesByLeadSourceDashlet',
        'pbss_date_start' => 'PipelineBySalesStageDashlet',
        'pbss_date_end' => 'PipelineBySalesStageDashlet',
        'pbss_sales_stages' => 'PipelineBySalesStageDashlet',
        'pbss_chart_type' => 'PipelineBySalesStageDashlet',
        'obm_date_start' => 'OutcomeByMonthDashlet',
        'obm_date_end' => 'OutcomeByMonthDashlet',
        'obm_ids' => 'OutcomeByMonthDashlet');

	//upgrading from pre-5.0 homepage
	$old_columns = $current_user->getPreference('columns', 'home');
	$old_dashlets = $current_user->getPreference('dashlets', 'home');

	if (isset($old_columns) && !empty($old_columns) && isset($old_dashlets) && !empty($old_dashlets)){
		$columns = $old_columns;
		$dashlets = $old_dashlets;

		// resetting old columns and dashlets to have no preference and data
		$old_columns = array();
		$old_dashlets = array();
		$current_user->setPreference('columns', $old_columns, 0, 'home');
		$current_user->setPreference('dashlets', $old_dashlets, 0, 'home');
	}
	else{
        // This is here to get Sugar dashlets added above the rest
        $dashlets[create_guid()] = array ('className' => 'SugarFeedDashlet',
                                          'module' => 'SugarFeed',
                                          'forceColumn' => 1,
                                          'fileLocation' => $dashletsFiles['SugarFeedDashlet']['file'],
                                          );

        $dashlets[create_guid()] = array('className' => 'iFrameDashlet',
                                         'module' => 'Home',
                                         'forceColumn' => 1,
                                         'fileLocation' => $dashletsFiles['iFrameDashlet']['file'],
                                         'options' => array('title' => translate('LBL_DASHLET_SUGAR_NEWS','Home'),
                                                            'url' => 'http://www.sugarcrm.com/crm/product/news',
                                                            'height' => 315,
                                             ));

	    foreach($defaultDashlets as $dashletName=>$module){
			// clint - fixes bug #20398
			// only display dashlets that are from visibile modules and that the user has permission to list
			$myDashlet = new MySugar($module);
			$displayDashlet = $myDashlet->checkDashletDisplay();
	    	if (isset($dashletsFiles[$dashletName]) && $displayDashlet){
	        	$options = array();
               $prefsforthisdashlet = array_keys($prefstomove,$dashletName);
               foreach ( $prefsforthisdashlet as $pref ) {
                   $options[$pref] = $current_user->getPreference($pref);
               }
                $dashlets[create_guid()] = array('className' => $dashletName,
												 'module' => $module,
	            	                             'forceColumn' => 0,
	            	                             'fileLocation' => $dashletsFiles[$dashletName]['file'],
                                                 'options' => $options);
	    	}
	    }

	    $count = 0;
	    $columns = array();
	    $columns[0] = array();
	    $columns[0]['width'] = '60%';
	    $columns[0]['dashlets'] = array();
	    $columns[1] = array();
	    $columns[1]['width'] = '40%';
	    $columns[1]['dashlets'] = array();

	    foreach($dashlets as $guid=>$dashlet) {
	        if( $dashlet['forceColumn'] == 0 ) array_push($columns[0]['dashlets'], $guid);
	        else array_push($columns[1]['dashlets'], $guid);
	        $count++;
	    }
	}

    // END 'My Sugar'



    // BEGIN 'Sales Page'
    $salesDashlets = array();
    foreach($defaultSalesDashlets as $salesDashletName=>$module){
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();
    	if (isset($dashletsFiles[$salesDashletName]) && $displayDashlet){
            $options = array();
            $prefsforthisdashlet = array_keys($prefstomove,$salesDashletName);
            foreach ( $prefsforthisdashlet as $pref ) {
               $options[$pref] = $current_user->getPreference($pref);
            }

            $salesDashlets[create_guid()] = array('className' => $salesDashletName,
										 'module'=>$module,
	                                         'fileLocation' => $dashletsFiles[$salesDashletName]['file'],
                                             'options' => $options);
    	}
    }

    foreach ($defaultSalesChartDashlets as $salesChartDashlet=>$module){
		$savedReport = new SavedReport();
		$reportId = $savedReport->retrieveReportIdByName($salesChartDashlet);
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();

		if(isset($reportId) && $displayDashlet) {
    		$salesDashlets[create_guid()] = array('className' => 'ChartsDashlet',
											 		'module'=>$module,
    												'fileLocation' => $dashletsFiles['ChartsDashlet']['file'],
    												'reportId' => $reportId, );
    	}
    }

    foreach($defaultSalesDashlets2 as $salesDashletName=>$module){
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();
    	if (isset($dashletsFiles[$salesDashletName]) && $displayDashlet){
            $options = array();
            $prefsforthisdashlet = array_keys($prefstomove,$salesDashletName);
            foreach ( $prefsforthisdashlet as $pref ) {
               $options[$pref] = $current_user->getPreference($pref);
            }

            $salesDashlets[create_guid()] = array('className' => $salesDashletName,
										 'module'=>$module,
	                                         'fileLocation' => $dashletsFiles[$salesDashletName]['file'],
                                             'options' => $options);
    	}
    }

    $count = 0;
    $salesColumns = array();
    $salesColumns[0] = array();
    $salesColumns[0]['width'] = '60%';
    $salesColumns[0]['dashlets'] = array();
    $salesColumns[1] = array();
    $salesColumns[1]['width'] = '40%';
    $salesColumns[1]['dashlets'] = array();

    foreach($salesDashlets as $guid=>$dashlet){
        if($count % 2 == 0) array_push($salesColumns[0]['dashlets'], $guid);
        else array_push($salesColumns[1]['dashlets'], $guid);
        $count++;
    }
    // END 'Sales Page'

	// BEGIN 'Marketing Page'
	$marketingDashlets = array();
    foreach ($defaultMarketingChartDashlets as $marketingChartDashlet=>$module){
		$savedReport = new SavedReport();
		$reportId = $savedReport->retrieveReportIdByName($marketingChartDashlet);
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();

		if(isset($reportId) && $displayDashlet) {
    		$marketingDashlets[create_guid()] = array('className' => 'ChartsDashlet',
											 		'module'=>$module,
    												'fileLocation' => $dashletsFiles['ChartsDashlet']['file'],
    												'reportId' => $reportId, );
	    }
    }

    foreach($defaultMarketingDashlets as $marketingDashletName=>$module){
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();

    	if (isset($dashletsFiles[$marketingDashletName]) && $displayDashlet){
	        $options = array();
            $prefsforthisdashlet = array_keys($prefstomove,$marketingDashletName);
            foreach ( $prefsforthisdashlet as $pref ) {
               $options[$pref] = $current_user->getPreference($pref);
            }
            $marketingDashlets[create_guid()] = array('className' => $marketingDashletName,
									 		 'module'=>$module,
	                                         'fileLocation' => $dashletsFiles[$marketingDashletName]['file'],
                                             'options' => $options);
    	}
    }

    $count = 0;
    $marketingColumns = array();
    $marketingColumns[0] = array();
    $marketingColumns[0]['width'] = '60%';
    $marketingColumns[0]['dashlets'] = array();
    $marketingColumns[1] = array();
    $marketingColumns[1]['width'] = '40%';
    $marketingColumns[1]['dashlets'] = array();

    foreach($marketingDashlets as $guid=>$dashlet){
        if($count % 2 == 0) array_push($marketingColumns[0]['dashlets'], $guid);
        else array_push($marketingColumns[1]['dashlets'], $guid);
        $count++;
    }
	// END 'Marketing Page'

	// BEGIN 'Support Page'
	$supportDashlets = array();
    foreach ($defaultSupportChartDashlets as $supportChartDashlet=>$module){
		$savedReport = new SavedReport();
		$reportId = $savedReport->retrieveReportIdByName($supportChartDashlet);
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();

		if(isset($reportId) && $displayDashlet) {
    		$supportDashlets[create_guid()] = array('className' => 'ChartsDashlet',
											 		'module'=>$module,
    												'fileLocation' => $dashletsFiles['ChartsDashlet']['file'],
    												'reportId' => $reportId, );
	    }
    }

    foreach($defaultSupportDashlets as $supportDashletName=>$module){
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();

    	if (isset($dashletsFiles[$supportDashletName]) && $displayDashlet){
	        $options = array();
            $prefsforthisdashlet = array_keys($prefstomove,$supportDashletName);
            foreach ( $prefsforthisdashlet as $pref ) {
               $options[$pref] = $current_user->getPreference($pref);
            }
            $supportDashlets[create_guid()] = array('className' => $supportDashletName,
									 		 'module'=>$module,
	                                         'fileLocation' => $dashletsFiles[$supportDashletName]['file'],
                                             'options' => $options);
    	}
    }

    $count = 0;
    $supportColumns = array();
    $supportColumns[0] = array();
    $supportColumns[0]['width'] = '50%';
    $supportColumns[0]['dashlets'] = array();
    $supportColumns[1] = array();
    $supportColumns[1]['width'] = '50%';
    $supportColumns[1]['dashlets'] = array();

    foreach($supportDashlets as $guid=>$dashlet){
        if($count % 2 == 0) array_push($supportColumns[0]['dashlets'], $guid);
        else array_push($supportColumns[1]['dashlets'], $guid);
        $count++;
    }
	// END 'Support Page'

	// BEGIN 'Tracker Page'

	$trackingDashlets = array();
	foreach($defaultTrackingDashlets as $trackingDashletName=>$module){
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
		$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();
    	if (isset($dashletsFiles[$trackingDashletName]) && $displayDashlet){
	        $options = array();
            $prefsforthisdashlet = array_keys($prefstomove,$trackingDashletName);
            foreach ( $prefsforthisdashlet as $pref ) {
               $options[$pref] = $current_user->getPreference($pref);
            }
            $trackingDashlets[create_guid()] = array('className' => $trackingDashletName,
									 		 'module'=>$module,
	                                         'fileLocation' => $dashletsFiles[$trackingDashletName]['file'],
                                             'options' => $options);
    	}
    }

    foreach($defaultTrackingReportDashlets as $name=>$module) {
    	$savedReport = new SavedReport();
        $reportId = $savedReport->retrieveReportIdByName($name);

    	$myDashlet = new MySugar($module);
		$displayDashlet = $myDashlet->checkDashletDisplay();

        if (isset($reportId) && $displayDashlet){
	        $trackingDashlets[create_guid()] = array('className' => 'ChartsDashlet',
									 		 		'module'=>$module,
                                                    'fileLocation' => $dashletsFiles['ChartsDashlet']['file'],
                                                    'reportId' => $reportId);
		}
    }

    $count = 0;
    $trackingColumns = array();
    $trackingColumns[0] = array();
    $trackingColumns[0]['width'] = '50%';
    $trackingColumns[0]['dashlets'] = array();
    $trackingColumns[1] = array();
    $trackingColumns[1]['width'] = '50%';
    $trackingColumns[1]['dashlets'] = array();

    foreach($trackingDashlets as $guid=>$dashlet){
    	if($count % 2 == 0) {
    		array_push($trackingColumns[0]['dashlets'], $guid);
    	} else {
    		array_push($trackingColumns[1]['dashlets'], $guid);
    	}
    	$count++;
    }



	// END 'Tracker'
    $dashlets = array_merge($dashlets, $salesDashlets, $marketingDashlets, $supportDashlets, $trackingDashlets);


    $current_user->setPreference('dashlets', $dashlets, 0, 'Home');
}

// handles upgrading from versions that had the 'Dashboard' module; move those items over to the Home page
$pagesDashboard = $current_user->getPreference('pages', 'Dashboard');
$dashletsDashboard = $current_user->getPreference('dashlets', 'Dashboard');
if ( !empty($pagesDashboard) ) {
    $pages = array_merge($pages,$pagesDashboard);
    $current_user->setPreference('pages', $pages, 0, 'Home');
}
if ( !empty($dashletsDashboard) ) {
    $dashlets = array_merge($dashlets,$dashletsDashboard);
    $current_user->setPreference('dashlets', $dashlets, 0, 'Home');
}
if ( !empty($pagesDashboard) || !empty($dashletsDashboard) )
    $current_user->resetPreferences('Dashboard');

if (empty($pages)){
	$pages = array();
	$pageIndex = 0;
	$pages[0]['columns'] = $columns;
	$pages[0]['numColumns'] = '2';
	$pages[0]['pageTitle'] = $mod_strings['LBL_HOME_PAGE_1_NAME'];	// "My Sugar"
	$pageIndex++;

	$pages[$pageIndex]['columns'] = $salesColumns;
	$pages[$pageIndex]['numColumns'] = '2';
	$pages[$pageIndex]['pageTitle'] = $mod_strings['LBL_HOME_PAGE_2_NAME'];	// "Sales Page"
	$pageIndex++;

	if(ACLController::checkAccess('Leads', 'view', false)){
		$pages[$pageIndex]['columns'] = $marketingColumns;
		$pages[$pageIndex]['numColumns'] = '2';
		$pages[$pageIndex]['pageTitle'] = $mod_strings['LBL_HOME_PAGE_6_NAME'];	// "Marketing Page"
		$pageIndex++;
	}

	if(ACLController::checkAccess('Cases', 'view', false)){
		$pages[$pageIndex]['columns'] = $supportColumns;
		$pages[$pageIndex]['numColumns'] = '2';
		$pages[$pageIndex]['pageTitle'] = $mod_strings['LBL_HOME_PAGE_3_NAME'];	// "Support Page"
		$pageIndex++;
	}

	if(ACLController::checkAccess('Trackers', 'view', false, 'Tracker')){
		$pages[$pageIndex]['columns'] = $trackingColumns;
		$pages[$pageIndex]['numColumns'] = '2';
		$pages[$pageIndex]['pageTitle'] = $mod_strings['LBL_HOME_PAGE_4_NAME'];	// "Tracker"
		$pageIndex++;
	}


	$current_user->setPreference('pages', $pages, 0, 'Home');
    $_COOKIE[$current_user->id . '_activePage'] = '0';
    setcookie($current_user->id . '_activePage','0',3000);
    $activePage = 0;
}

$sugar_smarty = new Sugar_Smarty();

if(!empty($_REQUEST) && isset($_REQUEST['activeTab']) && strlen($_REQUEST['activeTab']) > 0) {
	if($_REQUEST['activeTab'] == 'AddTab')  {
		$activePage = isset($_COOKIE[$current_user->id . '_activePage']) ? intval($_COOKIE[$current_user->id . '_activePage']) : 0;
		$js = 'YAHOO.util.Event.onAvailable("addPageDialog", function() { SUGAR.mySugar.showAddPageDialog(); })';
        $sugar_smarty->assign('activeTabJavascript', $js);
	} else {
		$activePage = !empty($pages[$_REQUEST['activeTab']]) ? intval($_REQUEST['activeTab']) : 0;
		$js = 'YAHOO.util.Event.onAvailable("' . 'pageNum_' . $activePage . '", function() { SUGAR.mySugar.togglePages("' . $activePage . '") })';
        $sugar_smarty->assign('activeTabJavascript', $js);
	}
} else if(isset($_COOKIE[$current_user->id . '_activePage']) && $_COOKIE[$current_user->id . '_activePage'] != '' && isset($pages[$_COOKIE[$current_user->id . '_activePage']])) {
    $activePage = intval($_COOKIE[$current_user->id . '_activePage']);
} else {
    $_COOKIE[$current_user->id . '_activePage'] = '0';
    setcookie($current_user->id . '_activePage','0',3000);
    $activePage = 0;
}

$divPages[] = $activePage;

$numCols = $pages[$activePage]['numColumns'];

foreach($pages as $pageNum => $page){
    //grab the now viewed pages to render the <div> foreach
    if($pageNum != $activePage)
        $divPages[] = $pageNum;

    $pageData[$pageNum]['pageTitle'] = $page['pageTitle'];

    if($pageNum == $activePage){
        $pageData[$pageNum]['tabClass'] = 'current';
        $pageData[$pageNum]['visibility'] = 'inline';
    }
    else{
        $pageData[$pageNum]['tabClass'] = '';
        $pageData[$pageNum]['visibility'] = 'none';
    }
}

$count = 0;
$dashletIds = array(); // collect ids to pass to javascript
$display = array();

foreach($pages[$activePage]['columns'] as $colNum => $column) {
	if ($colNum == $numCols){
		break;
	}
    $display[$colNum]['width'] = $column['width'];
    $display[$colNum]['dashlets'] = array();
    foreach($column['dashlets'] as $num => $id) {
		// clint - fixes bug #20398
		// only display dashlets that are from visibile modules and that the user has permission to list
        if(!empty($id) && isset($dashlets[$id]) && is_file($dashlets[$id]['fileLocation'])) {
			$module = 'Home';
			if ( !empty($dashletsFiles[$dashlets[$id]['className']]['module']) )
        		$module = $dashletsFiles[$dashlets[$id]['className']]['module'];
        	// Bug 24772 - Look into the user preference for the module the dashlet is a part of in case
        	//             of the Report Chart dashlets.
        	elseif ( !empty($dashlets[$id]['module']) )
        	    $module = $dashlets[$id]['module'];

			$myDashlet = new MySugar($module);

			if($myDashlet->checkDashletDisplay()) {
        		require_once($dashlets[$id]['fileLocation']);
        		if ($dashlets[$id]['className'] == 'ChartsDashlet'){
        			$dashlet = new $dashlets[$id]['className']($id, $dashlets[$id]['reportId'], (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));
        		}
            	else{
	            	$dashlet = new $dashlets[$id]['className']($id, (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));
            	}
                // Need to add support to dynamically display/hide dashlets
                // If it has a method 'shouldDisplay' we will call it to see if we should display it or not
                if (method_exists($dashlet,'shouldDisplay')) {
                    if (!$dashlet->shouldDisplay()) {
                        // This dashlet doesn't want us to show it, skip it.
                        continue;
                    }
                }

            	array_push($dashletIds, $id);

		        $dashlets = $current_user->getPreference('dashlets', 'Home'); // Using hardcoded 'Home' because DynamicAction.php $_REQUEST['module'] value is always Home
		        $lvsParams = array();
		        if(!empty($dashlets[$id]['sort_options'])){
		            $lvsParams = $dashlets[$id]['sort_options'];
    	        }

            	$dashlet->process($lvsParams);
            	try {
	            	$display[$colNum]['dashlets'][$id]['display'] = $dashlet->display();
	            	$display[$colNum]['dashlets'][$id]['displayHeader'] = $dashlet->getHeader();
	            	$display[$colNum]['dashlets'][$id]['displayFooter'] = $dashlet->getFooter();
	            	if($dashlet->hasScript) {
	                	$display[$colNum]['dashlets'][$id]['script'] = $dashlet->displayScript();
	            	}
            	} catch (Exception $ex) {
	            	$display[$colNum]['dashlets'][$id]['display'] = $ex->getMessage();
	            	$display[$colNum]['dashlets'][$id]['displayHeader'] = $dashlet->getHeader();
	            	$display[$colNum]['dashlets'][$id]['displayFooter'] = $dashlet->getFooter();
            	}
        	}
    	}
	}
}


if(!empty($sugar_config['lock_homepage']) && $sugar_config['lock_homepage'] == true) $sugar_smarty->assign('lock_homepage', true);

$sugar_smarty->assign('pages', $pageData);
$sugar_smarty->assign('numPages', sizeof($pages));
$sugar_smarty->assign('loadedPage', 'pageNum_' . $activePage .'_div');

$sugar_smarty->assign('sugarVersion', $sugar_version);
$sugar_smarty->assign('sugarFlavor', $sugar_flavor);
$sugar_smarty->assign('currentLanguage', $GLOBALS['current_language']);
$sugar_smarty->assign('serverUniqueKey', $GLOBALS['server_unique_key']);
$sugar_smarty->assign('imagePath', $GLOBALS['image_path']);

$sugar_smarty->assign('maxCount', empty($sugar_config['max_dashlets_homepage']) ? 15 : $sugar_config['max_dashlets_homepage']);
$sugar_smarty->assign('dashletCount', $count);
$sugar_smarty->assign('dashletIds', '["' . implode('","', $dashletIds) . '"]');
$sugar_smarty->assign('columns', $display);

global $theme;
$sugar_smarty->assign('theme', $theme);

$sugar_smarty->assign('divPages', $divPages);
$sugar_smarty->assign('activePage', $activePage);
$sugar_smarty->assign('numCols', $pages[$activePage]['numColumns']);
$sugar_smarty->assign('default', $defaultHomepage);

$sugar_smarty->assign('current_user', $current_user->id);

$sugar_smarty->assign('lblAdd', $GLOBALS['app_strings']['LBL_ADD_BUTTON']);
$sugar_smarty->assign('lblAddDashlets', $GLOBALS['app_strings']['LBL_ADD_DASHLETS']);
$sugar_smarty->assign('lblLnkHelp', $GLOBALS['app_strings']['LNK_HELP']);
$sugar_smarty->assign('lblAddPage', $GLOBALS['app_strings']['LBL_ADD_PAGE']);
$sugar_smarty->assign('lblPageName', $GLOBALS['app_strings']['LBL_PAGE_NAME']);
$sugar_smarty->assign('lblChangeLayout', $GLOBALS['app_strings']['LBL_CHANGE_LAYOUT']);
$sugar_smarty->assign('lblNumberOfColumns', $GLOBALS['app_strings']['LBL_NUMBER_OF_COLUMNS']);
$sugar_smarty->assign('lbl1Column', $GLOBALS['app_strings']['LBL_1_COLUMN']);
$sugar_smarty->assign('lbl2Column', $GLOBALS['app_strings']['LBL_2_COLUMN']);
$sugar_smarty->assign('lbl3Column', $GLOBALS['app_strings']['LBL_3_COLUMN']);
$sugar_smarty->assign('form_header', getClassicModuleTitle("Home",array(), false));

$sugar_smarty->assign('mod', return_module_language($GLOBALS['current_language'], 'Home'));
$sugar_smarty->assign('app', $GLOBALS['app_strings']);
$sugar_smarty->assign('module', 'Home');
//custom chart code
require_once('include/SugarCharts/SugarChartFactory.php');
$sugarChart = SugarChartFactory::getInstance();
$resources = $sugarChart->getChartResources();
$mySugarResources = $sugarChart->getMySugarChartResources();
$sugar_smarty->assign('chartResources', $resources);
$sugar_smarty->assign('mySugarChartResources', $mySugarResources);
echo $sugar_smarty->fetch('include/MySugar/tpls/MySugar.tpl');
//init the quickEdit listeners after the dashlets have loaded on home page the first time
echo"<script>if(typeof(qe_init) != 'undefined'){qe_init();}</script>";
?>
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


/**
 * Homepage dashlet manager
 * @api
 */
class MySugar{
	var $type;

	function MySugar($type){
		$this->type = $type;
	}

    function checkDashletDisplay () {

		if((!in_array($this->type, $GLOBALS['moduleList'])
				&& !in_array($this->type, $GLOBALS['modInvisList']))
				&& (!in_array('Activities', $GLOBALS['moduleList']))){
			$displayDashlet = false;
		}
		elseif (ACLController::moduleSupportsACL($this->type) ) {
		    $bean = SugarModule::get($this->type)->loadBean();
		    if ( !ACLController::checkAccess($this->type,'list',true,$bean->acltype)) {
		        $displayDashlet = false;
		    }
		    $displayDashlet = true;
		}
		else{
			$displayDashlet = true;
		}

		return $displayDashlet;
    }

	function addDashlet(){
		if(!is_file(sugar_cached('dashlets/dashlets.php'))) {
            require_once('include/Dashlets/DashletCacheBuilder.php');

            $dc = new DashletCacheBuilder();
            $dc->buildCache();
		}
		require_once sugar_cached('dashlets/dashlets.php');

		global $current_user;

		if(isset($_REQUEST['id'])){
			$pages = $current_user->getPreference('pages', $this->type);

		    $dashlets = $current_user->getPreference('dashlets', $this->type);

		    $guid = create_guid();
			$options = array();
		    if (isset($_REQUEST['type']) && $_REQUEST['type'] == 'web') {
				$dashlet_module = 'Home';
				require_once('include/Dashlets/DashletRssFeedTitle.php');
				$options['url'] = $_REQUEST['type_module'];
				$webDashlet = new DashletRssFeedTitle($options['url']);
				$options['title'] = $webDashlet->generateTitle();
				unset($webDashlet);
		    }
			elseif (!empty($_REQUEST['type_module'])) {
				$dashlet_module = $_REQUEST['type_module'];
			}
			elseif (isset($dashletsFiles[$_REQUEST['id']]['module'])) {
				$dashlet_module = $dashletsFiles[$_REQUEST['id']]['module'];
			}
			else {
				$dashlet_module = 'Home';
			}

		    if (isset($_REQUEST['type']) && $_REQUEST['type'] == 'chart'){
		    	$report_id = $_REQUEST['id'];
				//co: fixes bug 20398 to respect ACL in dashlets
		    	$dashlets[$guid] = array('className' => $dashletsFiles['ChartsDashlet']['class'],
										 'module' => $dashlet_module,
		    							 'fileLocation' => $dashletsFiles['ChartsDashlet']['file'],
		    							 'reportId' => $report_id );
		    }
		    else{
			    $dashlets[$guid] = array('className' => $dashletsFiles[$_REQUEST['id']]['class'],
										 'module' => $dashlet_module,
										 'options' => $options,
			                             'fileLocation' => $dashletsFiles[$_REQUEST['id']]['file']);
		    }

		    // add to beginning of the array
		    array_unshift($pages[$_REQUEST['activeTab']]['columns'][0]['dashlets'], $guid);

		    $current_user->setPreference('dashlets', $dashlets, 0, $this->type);

		    echo $guid;
		}
		else {
		    echo 'ofdaops';
		}
	}

	function displayDashlet(){
		global $current_user, $mod_strings;

		if(!empty($_REQUEST['id'])) {
		    $id = $_REQUEST['id'];
		    $dashlets = $current_user->getPreference('dashlets', $this->type);

		    $sortOrder = '';
		    $orderBy = '';
		    foreach($_REQUEST as $k => $v){
		        if($k == 'lvso'){
		            $sortOrder = $v;
		        }
		        else if(preg_match('/Home2_.+_ORDER_BY/', $k)){
		            $orderBy = $v;
		        }
		    }
		    if(!empty($sortOrder) && !empty($orderBy)){
		        $dashlets[$id]['sort_options'] = array('sortOrder' => $sortOrder, 'orderBy' => $orderBy);
		        $current_user->setPreference('dashlets', $dashlets, 0, $this->type);
		    }

		    require_once($dashlets[$id]['fileLocation']);
		    $dashlet = new $dashlets[$id]['className']($id, (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));
		    if(!empty($_REQUEST['configure']) && $_REQUEST['configure']) { // save settings
		        $dashletDefs[$id]['options'] = $dashlet->saveOptions($_REQUEST);
		        $current_user->setPreference('dashlets', $dashletDefs, 0, $this->type);
		    }
		    if(!empty($_REQUEST['dynamic']) && $_REQUEST['dynamic'] == 'true' && $dashlet->hasScript) {
		        $dashlet->isConfigurable = false;
		        echo $dashlet->getTitle('') . $mod_strings['LBL_RELOAD_PAGE'];
		    }
		    else {
		        $lvsParams = array();
		        if(!empty($dashlets[$id]['sort_options'])){
		            $lvsParams = $dashlets[$id]['sort_options'];
                }
		        $dashlet->process($lvsParams);
		        $contents =  $dashlet->display();
                // Many dashlets expect to be able to initialize in the display() function, so we have to create the header second
                echo $dashlet->getHeader();
                echo $contents;
                echo $dashlet->getFooter();
		    }
		}
		else {
		    header("Location: index.php?action=index&module=". $this->type);
		}
	}

	function getPredefinedChartScript(){
		global $current_user, $mod_strings;

		if(!empty($_REQUEST['id'])) {
		    $id = $_REQUEST['id'];
		    $dashlets = $current_user->getPreference('dashlets', $this->type);

		    require_once($dashlets[$id]['fileLocation']);
		    $dashlet = new $dashlets[$id]['className']($id, (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));
	        $dashlet->process();
	        echo $dashlet->displayScript();
		}
		else {
		    header("Location: index.php?action=index&module=". $this->type);
		}
	}

	function displayChartDashlet(){
		global $current_user;

		if(!empty($_REQUEST['id'])) {

		    $id = $_REQUEST['id'];
		    $dashlets = $current_user->getPreference('dashlets', $this->type);

		    require_once($dashlets[$id]['fileLocation']);
		    $dashlet = new $dashlets[$id]['className']($id, $dashlets[$id]['reportId'], (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));
		    $dashlet->process();
		    $contents = $dashlet->display();
		    echo $dashlet->getHeader();
            // Many dashlets expect to be able to initialize in the display() function, so we have to create the header second
            echo $contents;
		    echo $dashlet->getFooter();
		}
		else {
		    header("Location: index.php?action=index&module=". $this->type);
		}
	}

	function getChartScript(){
		global $current_user;

		if(!empty($_REQUEST['id'])) {
		    $id = $_REQUEST['id'];
		    $dashlets = $current_user->getPreference('dashlets', $this->type);

		    require_once($dashlets[$id]['fileLocation']);
		    $dashlet = new $dashlets[$id]['className']($id, $dashlets[$id]['reportId'], (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));
		    $dashlet->process();
		    echo $dashlet->displayScript();
		}
		else {
		    header("Location: index.php?action=index&module=". $this->type);
		}
	}

	function deleteDashlet(){


		global $current_user;

		if(!empty($_REQUEST['id'])) {
		    $pages = $current_user->getPreference('pages', $this->type);
		    $dashlets = $current_user->getPreference('dashlets', $this->type);

			if(!isset($_REQUEST['activePage']) || $_REQUEST['activePage'] == '' || $_REQUEST['activePage'] == 'null')
				$activePage = '0';
			else
				$activePage = $_REQUEST['activePage'];

			foreach($pages[$activePage]['columns'] as $colNum => $column) {
		        foreach($column['dashlets'] as $num => $dashletId) {
		            if($dashletId == $_REQUEST['id']) {
		                unset($pages[$activePage]['columns'][$colNum]['dashlets'][$num]);
		            }
		        }
		    }

		    foreach($dashlets as $dashletId => $data) {
		        if($dashletId == $_REQUEST['id']) {
		            unset($dashlets[$dashletId]);
		        }
		    }

		    $current_user->setPreference('dashlets', $dashlets, 0, $this->type);
		    $current_user->setPreference('pages', $pages, 0, $this->type);

		    echo '1';
		}
		else {
		    echo 'oops';
		}
	}

	function dashletsDialog(){
		require_once('include/MySugar/DashletsDialog/DashletsDialog.php');

		global $current_language, $app_strings;

		$chartsList = array();
		$DashletsDialog = new DashletsDialog();

		$DashletsDialog->getDashlets();
		$allDashlets = $DashletsDialog->dashlets;

		$dashletsList = $allDashlets['Module Views'];
		$chartsList = $allDashlets['Charts'];
		$toolsList = $allDashlets['Tools'];
		$sugar_smarty = new Sugar_Smarty();

		$mod_strings = return_module_language($current_language, 'Home');

		$sugar_smarty->assign('LBL_CLOSE_DASHLETS', $mod_strings['LBL_CLOSE_DASHLETS']);
		$sugar_smarty->assign('LBL_ADD_DASHLETS', $mod_strings['LBL_ADD_DASHLETS']);
		$sugar_smarty->assign('APP', $app_strings);
		$sugar_smarty->assign('moduleName', $this->type);

		if ($this->type == 'Home'){
			$sugar_smarty->assign('modules', $dashletsList);
			$sugar_smarty->assign('tools', $toolsList);
		}

		$sugar_smarty->assign('charts', $chartsList);

		$html = $sugar_smarty->fetch('include/MySugar/tpls/addDashletsDialog.tpl');
		// Bug 34451 - Added hack to make the "Add Dashlet" dialog window not look weird in IE6.
		$script = <<<EOJS
if (YAHOO.env.ua.ie > 5 && YAHOO.env.ua.ie < 7) {
    document.getElementById('dashletsList').style.width = '430px';
    document.getElementById('dashletsList').style.overflow = 'hidden';
}
EOJS;
		if ($this->type != 'Home'){
			$script .= 'SUGAR.mySugar.populateReportCharts();';
		}

		$json = getJSONobj();
		echo 'response = ' . $json->encode(array('html' => $html, 'script' => $script));
	}

	function getReportCharts(){
		$category = $_REQUEST['category'];

		require_once('include/MySugar/DashletsDialog/DashletsDialog.php');

		global $current_language;

		$chartsList = array();
		$DashletsDialog = new DashletsDialog();

		$DashletsDialog->getReportCharts($category);

		$sugar_smarty = new Sugar_Smarty();

		$sugar_smarty->assign('reportCharts', $DashletsDialog->dashlets[$category]);

		$html = $sugar_smarty->fetch('include/MySugar/tpls/retrieveReportCharts.tpl');
		$json = getJSONobj();

		echo 'response = ' . $json->encode(array('html' => $html));
	}

	function searchModuleToolsDashlets($searchStr, $category){
		require_once('include/MySugar/DashletsDialog/DashletsDialog.php');

		global $app_strings;

		$DashletsDialog = new DashletsDialog();

		switch($category){
			case 'module':
				$DashletsDialog->getDashlets('module');
				$dashletIndex = 'Module Views';
				$searchCategoryString = $app_strings['LBL_SEARCH_MODULES'];
				break;
			case 'tools':
				$DashletsDialog->getDashlets('tools');
				$dashletIndex = 'Tools';
				$searchCategoryString = $app_strings['LBL_SEARCH_TOOLS'];
			default:
				break;
		}
		$allDashlets = $DashletsDialog->dashlets;

		$searchResult = array();
		$searchResult[$dashletIndex] = array();

		foreach($allDashlets[$dashletIndex] as $dashlet){
			if (stripos($dashlet['title'], $searchStr) !== false){
				array_push($searchResult[$dashletIndex], $dashlet);
			}
		}

		$sugar_smarty = new Sugar_Smarty();

		$sugar_smarty->assign('lblSearchResults', $app_strings['LBL_SEARCH_RESULTS']);
		$sugar_smarty->assign('lblSearchCategory', $searchCategoryString);

		$sugar_smarty->assign('moduleName', $this->type);
		$sugar_smarty->assign('searchString', $searchStr);

		$sugar_smarty->assign('dashlets', $searchResult[$dashletIndex]);

		return $sugar_smarty->fetch('include/MySugar/tpls/dashletsSearchResults.tpl');
	}

	function searchChartsDashlets($searchStr){
		require_once('include/MySugar/DashletsDialog/DashletsDialog.php');

		global $current_language, $app_strings;

		$chartsList = array();
		$DashletsDialog = new DashletsDialog();

		$DashletsDialog->getDashlets('charts');
		$DashletsDialog->getReportCharts('global');
		$DashletsDialog->getReportCharts('myTeams');
		$DashletsDialog->getReportCharts('mySaved');
		$DashletsDialog->getReportCharts('myFavorites');

		$allDashlets = $DashletsDialog->dashlets;

		foreach($allDashlets as $category=>$dashlets){
			$searchResult[$category] = array();
			foreach($dashlets as $dashlet){
				if (stripos($dashlet['title'], $searchStr) !== false){
					array_push($searchResult[$category],$dashlet);
				}
			}
		}

		$sugar_smarty = new Sugar_Smarty();

		$sugar_smarty->assign('lblSearchResults', $app_strings['LBL_SEARCH_RESULTS']);
		$sugar_smarty->assign('searchString', $searchStr);
		$sugar_smarty->assign('charts', $searchResult['Charts']);
		$sugar_smarty->assign('globalReports', $searchResult['global']);
		$sugar_smarty->assign('myTeamReports', $searchResult['myTeams']);
		$sugar_smarty->assign('mySavedReports', $searchResult['mySaved']);
		$sugar_smarty->assign('myFavoriteReports', $searchResult['myFavorites']);

		return $sugar_smarty->fetch('include/MySugar/tpls/chartDashletsSearchResults.tpl');
	}

	function searchDashlets(){
		$searchStr = $_REQUEST['search'];
		$category = $_REQUEST['category'];

		if ($category == 'module' || $category == 'tools'){
			$html = $this->searchModuleToolsDashlets($searchStr, $category);
		}
		else if ($category == 'chart'){
			$html = $this->searchChartsDashlets($searchStr);
		}

		$json = getJSONobj();
		echo 'response = ' . $json->encode(array('html' => $html, 'script' => ''));
	}

	function configureDashlet(){
		global $current_user, $app_strings, $mod_strings;

		if(!empty($_REQUEST['id'])) {
		    $id = $_REQUEST['id'];
		    $dashletDefs = $current_user->getPreference('dashlets', $this->type); // load user's dashlets config
		    $dashletLocation = $dashletDefs[$id]['fileLocation'];

		    require_once($dashletDefs[$id]['fileLocation']);

		    $dashlet = new $dashletDefs[$id]['className']($id, (isset($dashletDefs[$id]['options']) ? $dashletDefs[$id]['options'] : array()));
		    if(!empty($_REQUEST['configure']) && $_REQUEST['configure']) { // save settings
		        $dashletDefs[$id]['options'] = $dashlet->saveOptions($_REQUEST);
		        $current_user->setPreference('dashlets', $dashletDefs, 0, $this->type);
		    }
		    else { // display options
		        $json = getJSONobj();
		        return 'result = ' . $json->encode((array('header' => $dashlet->title . ' : ' . $app_strings['LBL_OPTIONS'],
		                                                 'body'  => $dashlet->displayOptions())));
		    }
		}
		else {
		    return '0';
		}
	}

	function saveLayout(){
		global $current_user;

		if(!empty($_REQUEST['layout'])) {
		    $newColumns = array();

		    $newLayout = explode('|', $_REQUEST['layout']);

			$pages = $current_user->getPreference('pages', $this->type);

			$newColumns = $pages[$_REQUEST['selectedPage']]['columns'];
		    foreach($newLayout as $col => $ids) {
		        $newColumns[$col]['dashlets'] = explode(',', $ids);
		    }

			$pages[$_REQUEST['selectedPage']]['columns'] = $newColumns;
		    $current_user->setPreference('pages', $pages, 0, $this->type);

		    return '1';
		}
		else {
		    return '0';
		}
	}

	function addTab(){
		if (isset($_REQUEST['numColumns'])){
			$numCols = $_REQUEST['numColumns'];
		}
		else{
			$numCols = '2';
		}

		$pageName = js_escape($_REQUEST['pageName']);

		$json = getJSONobj();
		echo 'result = ' . $json->encode(array('pageName' => $pageName, 'numCols' => $numCols));
	}


	function addPage(){
		global $current_user, $sugar_version, $sugar_config, $sugar_flavor;
		global $app_strings;
		global $current_language;

		$pages = $current_user->getPreference('pages', $this->type);

		$columns = array();

		$numColumns = $_REQUEST['numCols'];

		switch($numColumns){
			case '1':
				$columns[0] = array();
				$columns[0]['dashlets'] = array();
				$columns[0]['width'] = '100%';
				break;
			case '2':
				$columns[0] = array();
				$columns[0]['dashlets'] = array();
				$columns[0]['width'] = '60%';
				$columns[1] = array();
				$columns[1]['dashlets'] = array();
				$columns[1]['width'] = '40%';
				break;
			case '3':
				$columns[0] = array();
				$columns[0]['dashlets'] = array();
				$columns[0]['width'] = '30%';
				$columns[1] = array();
				$columns[1]['dashlets'] = array();
				$columns[1]['width'] = '30%';
				$columns[2] = array();
				$columns[2]['dashlets'] = array();
				$columns[2]['width'] = '40%';
				break;
		}
		$newPage = array();
		$newPage['columns'] = $columns;

		$json = getJSONobj();
		$newPageName = $json->decode(html_entity_decode($_REQUEST['pageName']));


        $newPageName = remove_xss(from_html($newPageName));

		// hack for single quotes -- escape the backspaces
        $newPage['pageTitle'] =  str_replace("\'", "'", $newPageName);

		$newPage['numColumns'] = $_REQUEST['numCols'];

		array_push($pages,$newPage);

		//store preference and echo guid
		$current_user->setPreference('pages', $pages, 0, $this->type);

		$newPagesPref = $current_user->getPreference('pages', $this->type);

		$display = array();

		foreach($newPage['columns'] as $colNum => $column)
		    $display[$colNum]['width'] = $column['width'];

		$home_mod_strings = return_module_language($current_language, 'Home');

		$sugar_smarty = new Sugar_Smarty();
		$sugar_smarty->assign('columns', $display);
		$sugar_smarty->assign('selectedPage', sizeof($pages) - 1);
        $sugar_smarty->assign('mod',$home_mod_strings);
        $sugar_smarty->assign('app',$GLOBALS['app_strings']);
		$sugar_smarty->assign('lblAddDashlets', $home_mod_strings['LBL_ADD_DASHLETS']);
		$sugar_smarty->assign('numCols', $newPage['numColumns']);

		$sugar_smarty->assign('sugarVersion', $sugar_version);
		$sugar_smarty->assign('sugarFlavor', $sugar_flavor);
		$sugar_smarty->assign('currentLanguage', $GLOBALS['current_language']);
		$sugar_smarty->assign('serverUniqueKey', $GLOBALS['server_unique_key']);
		$sugar_smarty->assign('imagePath', $GLOBALS['image_path']);
		$sugar_smarty->assign('lblLnkHelp', $GLOBALS['app_strings']['LNK_HELP']);

		return $sugar_smarty->fetch('include/MySugar/tpls/retrievePage.tpl');
	}

	function deletePage(){
		global $current_user;

		$pages = $current_user->getPreference('pages', $this->type);

		array_splice($pages, $_REQUEST['pageNumToDelete'], 1);

		if ($GLOBALS['module'] == 'Dashboard'){
			$cookiePageIndex = $current_user->id . '_activeDashboardPage';
		}
		else{
			$cookiePageIndex = $current_user->id . '_activePage';
		}

		if(isset($_COOKIE[$cookiePageIndex]) && ($_COOKIE[$cookiePageIndex] == $_REQUEST['pageNumToDelete'])){
		    $_COOKIE[$cookiePageIndex] = '0';
		    setcookie($cookiePageIndex,'0',3000);
		}
		$current_user->setPreference('pages', $pages, 0, $this->type);
		$pages = $current_user->getPreference('pages', $this->type);

		unset($_COOKIE[$cookiePageIndex]);

		header("Location: index.php?module=" . $this->type . "&action=index");
	}

    /**
     * @todo the css is not fully inherited in this file
	 */
	function retrievePage(){
		global $current_user, $sugar_version, $sugar_config, $sugar_flavor, $current_language;
		global $app_strings, $theme;

		// build dashlet cache file if not found
		if(!is_file(sugar_cached('dashlets/dashlets.php'))) {
		    require_once('include/Dashlets/DashletCacheBuilder.php');

		    $dc = new DashletCacheBuilder();
		    $dc->buildCache();
		}
		require_once sugar_cached('dashlets/dashlets.php');

		$pages = $current_user->getPreference('pages', $this->type);
		$dashlets = $current_user->getPreference('dashlets', $this->type);

		$count = 0;
		$dashletIds = array(); // collect ids to pass to javascript
		$display = array();

		$predefinedChartsList = array( 	'MyPipelineBySalesStageDashlet',
										'OpportunitiesByLeadSourceDashlet',
									   	'OpportunitiesByLeadSourceByOutcomeDashlet',
									   	'OutcomeByMonthDashlet',
									   	'PipelineBySalesStageDashlet',
									   	'CampaignROIChartDashlet',
									   	'MyOpportunitiesGaugeDashlet',
									   	'MyForecastingChartDashlet',
									   	'MyModulesUsedChartDashlet',
									   	'MyTeamModulesUsedChartDashlet',
									   	);

		$pageData = array();
		$chartsArray = array();

	    $chartStyleCSS = SugarThemeRegistry::current()->getCSSURL('chart.css');
	    $chartColorsXML = SugarThemeRegistry::current()->getImageURL('sugarColors.xml');

	    $chartStringsXML = $sugar_config['tmp_dir'].'chart_strings.' . $current_language .'.lang.xml';

	    require_once('include/SugarCharts/SugarChartFactory.php');
		$sugarChart = SugarChartFactory::getInstance();


        if (!file_exists($chartStringsXML)) {
            $sugarChart->generateChartStrings($chartStringsXML);
		}

		$selectedPage = $_REQUEST['pageId'];

		$numCols = $pages[$selectedPage]['numColumns'];
		$trackerScript = '';
		$dashletScript = '';
		$trackerScriptArray = "<script>var trackerGridArray = [";
		$toggleHeaderToolsetScript ="";
		foreach($pages[$selectedPage]['columns'] as $colNum => $column){
			if ($colNum == $numCols){
				break;
			}
		    $display[$colNum]['width'] = $column['width'];
		    $display[$colNum]['dashlets'] = array();

		    foreach($column['dashlets'] as $num => $id) {
		        if(!empty($id) && isset($dashlets[$id]) && is_file($dashlets[$id]['fileLocation'])) {
					// clint - fixes bug #20398
					// only display dashlets that are from visibile modules and that the user has permission to list
					$module = 'Home';
					if ( isset($dashletsFiles[$dashlets[$id]['className']]['module']) )
						$module = $dashletsFiles[$dashlets[$id]['className']]['module'];

					$myDashlet = new MySugar($module);

					if($myDashlet->checkDashletDisplay()) {
						require_once($dashlets[$id]['fileLocation']);
						if ($dashlets[$id]['className'] == 'ChartsDashlet'){
							$dashlet = new $dashlets[$id]['className']($id, $dashlets[$id]['reportId'], (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));

							$chartsArray[$id] = array();
							$chartsArray[$id]['id'] = $id;
							$chartsArray[$id]['xmlFile'] = sugar_cached("xml/") . $dashlets[$id]['reportId'] . '_saved_chart.xml';
							$chartsArray[$id]['width'] = '100%';
							$chartsArray[$id]['height'] = '480';
							$chartsArray[$id]['styleSheet'] = $chartStyleCSS;
							$chartsArray[$id]['colorScheme'] = $chartColorsXML;
							$chartsArray[$id]['langFile'] = $chartStringsXML;
						}
						else{
							$dashlet = new $dashlets[$id]['className']($id, (isset($dashlets[$id]['options']) ? $dashlets[$id]['options'] : array()));

							if (in_array($dashlets[$id]['className'], $predefinedChartsList)){
								$chartsArray[$id] = array();
								$chartsArray[$id]['id'] = $id;
								$chartsArray[$id]['xmlFile'] = $sugarChart->getXMLFileName($id);
								$chartsArray[$id]['width'] = '100%';
								$chartsArray[$id]['height'] = '480';
								$chartsArray[$id]['styleSheet'] = $chartStyleCSS;
								$chartsArray[$id]['colorScheme'] = $chartColorsXML;
								$chartsArray[$id]['langFile'] = $chartStringsXML;
							}
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
						try {
							$dashlet->process();
							$display[$colNum]['dashlets'][$id]['display'] = $dashlet->display();
							$display[$colNum]['dashlets'][$id]['displayHeader'] = $dashlet->getHeader();
							$display[$colNum]['dashlets'][$id]['displayFooter'] = $dashlet->getFooter();

							if($dashlet->hasScript) {
								$dashletScript .= $dashlet->displayScript();
							}
							if ($dashlets[$id]['className'] == 'TrackerDashlet'){
								$trackerScriptArray .= "'$id',";
				                $trackerScript = empty($trackerScript) ? $dashlet->displayScript() : $trackerScript;
							}
							$toggleHeaderToolsetScript .= "SUGAR.mySugar.attachToggleToolsetEvent('$id');";

						} catch (Exception $ex) {
                            $display[$colNum]['dashlets'][$id]['display'] = $ex->getMessage();
							$display[$colNum]['dashlets'][$id]['displayHeader'] = $dashlet->getHeader();
							$display[$colNum]['dashlets'][$id]['displayFooter'] = $dashlet->getFooter();
						}

					}
		        }
		    }
		}

		$sugar_smarty = new Sugar_Smarty();
		$sugar_smarty->assign('sugarVersion', $sugar_version);
		$sugar_smarty->assign('sugarFlavor', $sugar_flavor);
		$sugar_smarty->assign('currentLanguage', $GLOBALS['current_language']);
		$sugar_smarty->assign('serverUniqueKey', $GLOBALS['server_unique_key']);
		$sugar_smarty->assign('imagePath', $GLOBALS['image_path']);
		$sugar_smarty->assign('lblLnkHelp', $GLOBALS['app_strings']['LNK_HELP']);
		$sugar_smarty->assign('mod', return_module_language($current_language, 'Home'));
        $sugar_smarty->assign('app', $GLOBALS['app_strings']);

		$sugar_smarty->assign('maxCount', empty($sugar_config['max_dashboards']) ? 15 : $sugar_config['max_dashboards']);
		$sugar_smarty->assign('dashletCount', $count);
		$sugar_smarty->assign('columns', $display);
		$sugar_smarty->assign('selectedPage', $selectedPage);
		$sugar_smarty->assign('numCols', $numCols);
		if(!empty($sugar_config['lock_homepage']) && $sugar_config['lock_homepage'] == true) $sugar_smarty->assign('lock_homepage', true);

		$htmlOutput = $sugar_smarty->fetch('include/MySugar/tpls/retrievePage.tpl');

		$json = getJSONobj();

		$scriptResponse = array();
		$scriptResponse['dashletScript'] = $dashletScript;
		$scriptResponse['newDashletsToReg'] = $dashletIds;
		$scriptResponse['numCols'] = sizeof($pages[$selectedPage]['columns']);
		//custom chart code
		$scriptResponse['chartsArray'] = $sugarChart->chartArray($chartsArray);
		$scriptResponse['trackerScript'] = $trackerScript . (strpos($trackerScriptArray,',') ? (substr($trackerScriptArray, 0, strlen($trackerScriptArray)-1) . ']; </script>') : $trackerScriptArray . ']; </script>');
		$scriptResponse['toggleHeaderToolsetScript'] = "<script>".$toggleHeaderToolsetScript."</script>";

		$scriptOutput = 'var scriptResponse = '.$json->encode($scriptResponse);

		return $json->encode(array('html' => $htmlOutput, 'script' => $scriptOutput));
	}

	function changeLayout(){
		if (isset($_REQUEST['changeLayoutParams']) && $_REQUEST['changeLayoutParams']){
			echo "var numCols = '" .$_REQUEST['numColumns'] . "';";
		}
		else{


			global $current_user;

			if(isset($_REQUEST['selectedPage'])) {
				$newNumColumns = $_REQUEST['numColumns'];
			    $newColumns = array();

				$pages = $current_user->getPreference('pages', $this->type);

				$page = $pages[$_REQUEST['selectedPage']];
				$newColumns = $pages[$_REQUEST['selectedPage']]['columns'];
				$prevNumColumns = $pages[$_REQUEST['selectedPage']]['numColumns'];

				$page['numColumns'] = $newNumColumns;
				switch ($prevNumColumns){
					case '1':
						if ($newNumColumns == '2'){
							$newColumns[0]['width'] = '60%';
							$newColumns[1] = array();
							$newColumns[1]['dashlets'] = array();
							$newColumns[1]['width'] = '40%';

							$reOrgDashlets = array();
							$reOrgDashlets[0] = array();
							$reOrgDashlets[1] = array();

							$i = 0;
							foreach($newColumns[0]['dashlets'] as $dashlet){
								array_push($reOrgDashlets[$i % 2], $dashlet);
								$i++;
							}
							$newColumns[0]['dashlets'] = $reOrgDashlets[0];
							$newColumns[1]['dashlets'] = $reOrgDashlets[1];
						}
						else if ($newNumColumns == '3'){
							$newColumns[0]['width'] = '30%';
							$newColumns[1] = array();
							$newColumns[1]['dashlets'] = array();
							$newColumns[1]['width'] = '30%';
							$newColumns[2] = array();
							$newColumns[2]['dashlets'] = array();
							$newColumns[2]['width'] = '40%';

							$reOrgDashlets = array();
							$reOrgDashlets[0] = array();
							$reOrgDashlets[1] = array();
							$reOrgDashlets[2] = array();

							$i = 0;
							foreach($newColumns[0]['dashlets'] as $dashlet){
								array_push($reOrgDashlets[$i % 3], $dashlet);
								$i++;
							}
							$newColumns[0]['dashlets'] = $reOrgDashlets[0];
							$newColumns[1]['dashlets'] = $reOrgDashlets[1];
							$newColumns[2]['dashlets'] = $reOrgDashlets[2];
						}
						else{
							break;
						}
						break;
					case '2':
						if ($newNumColumns == '1'){
							$newColumns[0]['width'] = '100%';
							$newColumns[0]['dashlets'] = array_merge($newColumns[0]['dashlets'], $newColumns[1]['dashlets']);
							unset($newColumns[1]);
						}
						else if ($newNumColumns == '3'){
							$newColumns[0]['width'] = '30%';
							$newColumns[1]['width'] = '30%';
							$newColumns[2] = array();
							$newColumns[2]['dashlets'] = array();
							$newColumns[2]['width'] = '40%';

							$reOrgDashlets = array();
							$reOrgDashlets[0] = array();
							$reOrgDashlets[1] = array();
							$reOrgDashlets[2] = array();

							$i = 0;
							foreach($newColumns[0]['dashlets'] as $dashlet){
								array_push($reOrgDashlets[$i % 3], $dashlet);
								$i++;
							}
							foreach($newColumns[1]['dashlets'] as $dashlet){
								array_push($reOrgDashlets[$i % 3], $dashlet);
								$i++;
							}
							$newColumns[0]['dashlets'] = $reOrgDashlets[0];
							$newColumns[1]['dashlets'] = $reOrgDashlets[1];
							$newColumns[2]['dashlets'] = $reOrgDashlets[2];
						}
						else{
							break;
						}
						break;
					case '3':
						if ($newNumColumns == '1'){
							$newColumns[0]['width'] = '100%';
							$newColumns[0]['dashlets'] = array_merge($newColumns[0]['dashlets'], $newColumns[1]['dashlets'], $newColumns[2]['dashlets']);
							unset($newColumns[1]);
							unset($newColumns[2]);
						}
						else if ($newNumColumns == '2'){
							$newColumns[0]['width'] = '60%';
							$newColumns[1]['width'] = '40%';
							$newColumns[0]['dashlets'] = array_merge($newColumns[0]['dashlets'], $newColumns[2]['dashlets']);
							unset($newColumns[2]);
						}
						else{
							break;
						}
						break;
					default:
						break;
				}

				$page['columns'] = $newColumns;

				$pages[$_REQUEST['selectedPage']] = $page;
			    $current_user->setPreference('pages', $pages, 0, $this->type);

			    echo $_REQUEST['selectedPage'];
			}
			else {
			    echo '0';
			}
		}
	}

	function savePageTitle(){
		global $current_user;

		$pages = $current_user->getPreference('pages', $this->type);

		$json = getJSONobj();
		$newPageName = $json->decode(html_entity_decode($_REQUEST['newPageTitle']));

		$pages[$_REQUEST['pageId']]['pageTitle'] = $newPageName;
		$current_user->setPreference('pages', $pages, 0, $this->type);

		return $pages[$_REQUEST['pageId']]['pageTitle'];
	}
}

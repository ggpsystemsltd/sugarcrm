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

 * Description: This file is used to override the default Meta-data EditView behavior
 * to provide customization specific to the Calls module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/MVC/View/views/view.list.php');

class ProjectTaskViewList extends ViewList{
 	function ProjectTaskViewList(){
 		parent::ViewList();
 		
 	}

 	function display(){
 		if(!$this->bean->ACLAccess('list')){
 			ACLController::displayNoAccess();
 			return;
 		}
        $module = $GLOBALS['module'];
 	    $metadataFile = null;
        $foundViewDefs = false;
        if(file_exists('custom/modules/' . $module. '/metadata/listviewdefs.php')){
            $metadataFile = 'custom/modules/' . $module . '/metadata/listviewdefs.php';
            $foundViewDefs = true;
        }else{
            if(file_exists('custom/modules/'.$module.'/metadata/metafiles.php')){
                require_once('custom/modules/'.$module.'/metadata/metafiles.php');
                if(!empty($metafiles[$module]['listviewdefs'])){
                    $metadataFile = $metafiles[$module]['listviewdefs'];
                    $foundViewDefs = true;
                }
            }elseif(file_exists('modules/'.$module.'/metadata/metafiles.php')){
                require_once('modules/'.$module.'/metadata/metafiles.php');
                if(!empty($metafiles[$module]['listviewdefs'])){
                    $metadataFile = $metafiles[$module]['listviewdefs'];
                    $foundViewDefs = true;
                }
            }
        }
        if(!$foundViewDefs && file_exists('modules/'.$module.'/metadata/listviewdefs.php')){
                $metadataFile = 'modules/'.$module.'/metadata/listviewdefs.php';
        }
        require_once($metadataFile);

		if($this->bean->bean_implements('ACL'))	
		ACLField::listFilter($listViewDefs[$module],$module, $GLOBALS['current_user']->id ,true);
		$seed = $this->bean;
        if(!empty($this->bean->object_name) && isset($_REQUEST[$module.'2_'.strtoupper($this->bean->object_name).'_offset'])) {//if you click the pagination button, it will poplate the search criteria here
            if(!empty($_REQUEST['current_query_by_page'])) {//The code support multi browser tabs pagination
                $blockVariables = array('mass', 'uid', 'massupdate', 'delete', 'merge', 'selectCount', 'request_data', 'current_query_by_page', $module.'2_'.strtoupper($this->bean->object_name).'_ORDER_BY');
		        if(isset($_REQUEST['lvso'])){
		        	$blockVariables[] = 'lvso';
		        }
		        
                $current_query_by_page = unserialize(base64_decode($_REQUEST['current_query_by_page']));
                foreach($current_query_by_page as $search_key=>$search_value) {
                    if($search_key != $module.'2_'.strtoupper($this->bean->object_name).'_offset' && !in_array($search_key, $blockVariables)) {
						$_REQUEST[$search_key] = $GLOBALS['db']->quote($search_value);
					}
                }
            }
        }
        
        if(!empty($_REQUEST['saved_search_select']) && $_REQUEST['saved_search_select']!='_none') {
            if(empty($_REQUEST['button']) && (empty($_REQUEST['clear_query']) || $_REQUEST['clear_query']!='true')) {
                $this->saved_search = loadBean('SavedSearch');
                $this->saved_search->retrieveSavedSearch($_REQUEST['saved_search_select']);
                $this->saved_search->populateRequest();
            }
            elseif(!empty($_REQUEST['button'])) { // click the search button, after retrieving from saved_search
                $_SESSION['LastSavedView'][$_REQUEST['module']] = '';
                unset($_REQUEST['saved_search_select']);
                unset($_REQUEST['saved_search_select_name']);
            }
        }
        
		$lv = new ListViewSmarty();
		$displayColumns = array();
		if(!empty($_REQUEST['displayColumns'])) {
		    foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
		        if(!empty($listViewDefs[$module][$col])) 
		            $displayColumns[$col] = $listViewDefs[$module][$col];
		    }    
		}
		else {
		    foreach($listViewDefs[$module] as $col => $params) {
		        if(!empty($params['default']) && $params['default'])
		            $displayColumns[$col] = $params;
		    }
		}
		
		global $current_user;
		
		if (!is_admin($current_user)){
			$params = array( 'massupdate' => false );
			$lv->export = false;
            $lv->multiSelect = false;
		}
		else{
			$params = array( 'massupdate' => true, 'export' => true);
		}
		 
		if(!empty($_REQUEST['orderBy'])) {
		    $params['orderBy'] = $_REQUEST['orderBy'];
		    $params['overrideOrder'] = true;
		    if(!empty($_REQUEST['sortOrder'])) $params['sortOrder'] = $_REQUEST['sortOrder'];
		}
		$lv->displayColumns = $displayColumns;

		$this->seed = $seed;
		$this->module = $module;
		
		$searchForm = null;
	 	$storeQuery = new StoreQuery();
		if(!isset($_REQUEST['query'])){
			$storeQuery->loadQuery($this->module);
			$storeQuery->populateRequest();
		}else{
			$storeQuery->saveFromRequest($this->module);	
		}
	
		//search
		$view = 'basic_search';
		if(!empty($_REQUEST['search_form_view']))
			$view = $_REQUEST['search_form_view'];
		$headers = true;
		if(!empty($_REQUEST['search_form_only']) && $_REQUEST['search_form_only'])
			$headers = false;
		elseif(!isset($_REQUEST['search_form']) || $_REQUEST['search_form'] != 'false') {
        	if(isset($_REQUEST['searchFormTab']) && $_REQUEST['searchFormTab'] == 'advanced_search') {
				$view = 'advanced_search';
			}else {
				$view = 'basic_search';
			}
		}
		
		$use_old_search = true;
		if(file_exists('modules/'.$this->module.'/SearchForm.html')){
			require_once('include/SearchForm/SearchForm.php');
			$searchForm = new SearchForm($this->module, $this->seed);
		}else{
			$use_old_search = false;
			require_once('include/SearchForm/SearchForm2.php');
			
					
			if (file_exists('custom/modules/'.$this->module.'/metadata/searchdefs.php'))
			{
			    require_once('custom/modules/'.$this->module.'/metadata/searchdefs.php');
			}
			elseif (!empty($metafiles[$this->module]['searchdefs']))
			{
				require_once($metafiles[$this->module]['searchdefs']);
			}
			elseif (file_exists('modules/'.$this->module.'/metadata/searchdefs.php'))
			{
			    require_once('modules/'.$this->module.'/metadata/searchdefs.php');
			}
				
				
			if(!empty($metafiles[$this->module]['searchfields']))
				require_once($metafiles[$this->module]['searchfields']);
			elseif(file_exists('modules/'.$this->module.'/metadata/SearchFields.php'))
				require_once('modules/'.$this->module.'/metadata/SearchFields.php');
				
		
			$searchForm = new SearchForm($this->seed, $this->module, $this->action);
			$searchForm->setup($searchdefs, $searchFields, 'SearchFormGeneric.tpl', $view, $listViewDefs);
			$searchForm->lv = $lv;
		}
		
		if(isset($this->options['show_title']) && $this->options['show_title']) {
			$moduleName = isset($this->seed->module_dir) ? $this->seed->module_dir : $GLOBALS['mod_strings']['LBL_MODULE_NAME'];
			echo getClassicModuleTitle($moduleName, array($GLOBALS['mod_strings']['LBL_MODULE_TITLE']), FALSE); 
		}

		$where = '';
		if(isset($_REQUEST['query']))
		{
			// we have a query
	    	if(!empty($_SERVER['HTTP_REFERER']) && preg_match('/action=EditView/', $_SERVER['HTTP_REFERER'])) { // from EditView cancel
	       		$searchForm->populateFromArray($storeQuery->query);
	    	}
	    	else {
                $searchForm->populateFromRequest();
	    	}  	
			$where_clauses = $searchForm->generateSearchWhere(true, $this->seed->module_dir);
			if (count($where_clauses) > 0 )$where = '('. implode(' ) AND ( ', $where_clauses) . ')';
			$GLOBALS['log']->info("List View Where Clause: $where");   
		}
		if($use_old_search){
			switch($view) {
				case 'basic_search':
			    	$searchForm->setup();
			        $searchForm->displayBasic($headers);
			        break;
			     case 'advanced_search':
			     	$searchForm->setup();
			        $searchForm->displayAdvanced($headers);
			        break;
			     case 'saved_views':
			     	echo $searchForm->displaySavedViews($listViewDefs, $lv, $headers);
			       break;
			}
		}else{
			echo $searchForm->display($headers);
		}
		if(!$headers)
			return;
	    
		if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
			if (!is_admin($current_user)){
				$lv->setup($seed, 'include/ListView/ListViewNoMassUpdate.tpl', $where, $params);
			}
			else {
				$lv->setup($seed, 'include/ListView/ListViewGeneric.tpl', $where, $params);
			}
			$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
			echo $lv->display();
		}
 	}
}

?>

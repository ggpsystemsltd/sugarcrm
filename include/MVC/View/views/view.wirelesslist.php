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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/SugarWireless/SugarWirelessListView.php');

/**
 * ViewWirelesslist extends SugarWirelessView and is the view for wireless list views.
 *
 */
class ViewWirelesslist extends SugarWirelessListView{

	/**
	 * Constructor for the view, it runs the constructor of SugarWirelessView
	 */
 	public function __construct(){
 		parent::__construct();
 	}


 	/**
 	 * Private function for wireless list view
 	 *
 	 * This function retrieves the parameters from the search form or saved search and builds
 	 * a list view for smarty consumption. It is dependent on a REQUEST variable that provides the
 	 * search parameters.
 	 *
 	 * The function returns smarty assignments with the list data and other parameters.
 	 */
 	protected function wl_list_view_display(){
		// retrieve SavedSearch contents and populate $_REQUEST in preparation for searchForm->populateFromRequest()
		$backed_request = $_REQUEST;
		if (isset($_REQUEST['wl_saved_search_select'])){

			$savedSearch = new SavedSearch();
			$savedSearch->retrieve($_REQUEST['wl_saved_search_select']);
			$_REQUEST = $savedSearch->returnSavedSearchContents($_REQUEST['wl_saved_search_select']);

			$this->ss->assign('SAVED_SEARCH_NAME', $savedSearch->name);
		}
		// set up Search Form to attain where clause
		if (file_exists('modules/'.$GLOBALS['module'].'/metadata/searchdefs.php')){
			require_once('include/SearchForm/SearchForm2.php');
			$searchForm = new SearchForm($this->bean, $GLOBALS['module'], 'wirelesslist');
			require_once('modules/'.$GLOBALS['module'].'/metadata/searchdefs.php');
			require_once('modules/'.$GLOBALS['module'].'/metadata/SearchFields.php');
			$searchForm->setup($searchdefs, $searchFields, 'SearchFormGeneric.tpl');
		}
		else{
			require_once('include/SearchForm/SearchForm.php');
			$searchForm = new SearchForm($GLOBALS['module'], $this->bean);
			$searchForm->setup();
			$searchdefs = array();
		}
		// determine where clause from _REQUEST variable
		$searchForm->populateFromRequest();
		$where_clauses = $searchForm->generateSearchWhere(true, $this->bean->module_dir);
		// if my_items flag is set, also append the assigned_user_id check
        $this->ss->assign('myitems', 'checked');
		if (isset($_REQUEST['my_items']) && $_REQUEST['my_items'] == 'on'){
			$where_clauses[] = $this->bean->table_name . ".assigned_user_id = '" . $GLOBALS['current_user']->id . "'";
        }
        else {
            $this->ss->assign('myitems', '');
		}
		$where = '';
		if (count($where_clauses) > 0 )$where = '('. implode(' ) AND ( ', $where_clauses) . ')';
		// reset $_REQUEST variable
		$_REQUEST = $backed_request;
		// set the limit query number
		if (isset($GLOBALS['sugar_config']['wl_list_max_entries_per_page'])){
			$limit = $GLOBALS['sugar_config']['wl_list_max_entries_per_page'];
		}
		else{
			$limit = 10;
		}

		// retrieve list view data according to where clause
		require_once('include/ListView/ListViewData.php');
		$lvd = new ListViewData();
		// get and set list view data
		$data = $lvd->getListViewData($this->bean, $where,0,$limit,$this->get_filter_fields($GLOBALS['module']),array('orderBy' => 'name'));
		$data['pageData']['offsets']['lastOffsetOnPage'] = $data['pageData']['offsets']['current'] + count($data['data']);

        $navStrings = array('next' => $GLOBALS['app_strings']['LNK_LIST_NEXT'],
                            'previous' => $GLOBALS['app_strings']['LNK_LIST_PREVIOUS'],
                            'end' => $GLOBALS['app_strings']['LNK_LIST_END'],
                            'start' => $GLOBALS['app_strings']['LNK_LIST_START'],
                            'of' => $GLOBALS['app_strings']['LBL_LIST_OF']);
        $this->ss->assign('navStrings', $navStrings);

		// DATA holds the list view records
		$this->ss->assign('DATA', $data['data']);
		// PAGEDATA holds the pagination parameters as well as offset and limit values
		$this->ss->assign('PAGEDATA', $data['pageData']);

		$this->ss->assign('WL_SEARCH_FORM', $this->wl_search_form($searchdefs));
		$this->ss->assign('WL_SAVED_SEARCH_FORM', $this->wl_saved_search_form());
 	}

 	/**
 	 * Private function that retrieves the subpanel records for a given record.
 	 *
 	 * The purpose of this function is to get all of the subpanel records from the
 	 * (See All Records) link on a detail view. It is dependent on the presence of a
 	 * parent_id REQUEST variable, and utilizes the wl_get_subpanel_data method to
 	 * gain the subpanel data.
 	 *
 	 * The function provides smarty variable assignment for the subpanel data for the
 	 * particular record, as well as the record itself.
 	 */
 	protected function wl_subpanel_list_view_display(){
 		// instantiate a child seed object
 	    	
        $layout_defs = $this->getSubpanelDefs();
        $subpanel = isset($_REQUEST['subpanel']) ? $_REQUEST['subpanel'] : "";
        if (!empty($layout_defs['subpanel_setup'][$subpanel]))
        {
            $this->bean->retrieve($_REQUEST['parent_id']);
            $def = $layout_defs['subpanel_setup'][$subpanel];
            $link = !empty($def['get_subpanel_data']) ? $def['get_subpanel_data'] :  $subpanel;
            if ($this->bean->load_relationship($link))
            {
                $beans = $this->bean->$link->getbeans();
                $module = $this->bean->$link->getRelatedModuleName();
                $this->ss->assign('BEAN', $this->bean);
                $this->ss->assign('SUBPANEL_MODULE', $module);
                $this->ss->assign('SUBPANEL_LIST_VIEW', true);
                $this->ss->assign('DATA', $beans);
            }
        }
     }

 	/**
 	 * Public function that handles the display of the wireless list view.
 	 */
 	public function display(){
 		// print the header
		$this->wl_header();
		// print the select list
		$this->wl_select_list();

       	$this->ss->assign('displayColumns',$this->displayColumns);

		// check for presence of parent_id -- this is the subpanel list view
		if (isset($_REQUEST['parent_id'])){
			$this->wl_subpanel_list_view_display();
		}
		// normal list view display
		else{
			$this->wl_list_view_display();
		}

        $this->ss->assign('LITERAL_MODULE',$GLOBALS['app_strings']['LBL_SEARCH_MODULES']);
		// display the list view
		$this->ss->display('include/SugarWireless/tpls/wirelesslist.tpl');

		// print the footer
		$this->wl_footer();
 	}
}
?>

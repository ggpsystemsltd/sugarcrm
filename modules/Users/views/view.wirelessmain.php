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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/SugarWireless/SugarWirelessListView.php');

/**
 * ViewWirelessmain extends SugarWirelessView and is the main homepage for 
 * SugarWireless. 
 */
class ViewWirelessmain extends SugarWirelessListView
{
	/**
	 * Constructor for the view, it runs the constructor of SugarWirelessView.
	 */
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * Private function that grabs the last viewed from Tracker
	 */
	private function wl_last_viewed(){
		// set up last viewed
		$tracker = new Tracker();
		$last_viewed = $tracker->get_recently_viewed($GLOBALS['current_user']->id, '');
	
		if (count($last_viewed) > 0){
			$this->ss->assign('last_viewed', true);
			$this->ss->assign('LBL_LAST_VIEWED', $GLOBALS['app_strings']['LBL_LAST_VIEWED']);
			$last_viewed_list = array();
			// set up array for template
			foreach($last_viewed as $last_viewed_obj){
				// check to make sure the last viewed is in the wireless modules
				if (isset($this->wl_mod_select_list[$last_viewed_obj['module_name']])){
					$last_viewed_list[$last_viewed_obj['item_id']] = 
						array(	'summary' => $last_viewed_obj['item_summary'], 
								'module' => $last_viewed_obj['module_name'] 
							);
				}
			}
			// pass the array to template
			$this->ss->assign('LAST_VIEWED_LIST', $last_viewed_list);
		}
	}
	
	private function wl_activities_today(){
		global $timedate;
		$today = $timedate->nowDbDate();
        
        $where = array();
		$where['Calls'] = "date_start > '" . $today . " 00:00:00' AND date_start < '" . $today . " 23:59:59'";
		$where['Meetings'] = "date_start > '" . $today . " 00:00:00' AND date_start < '" . $today . " 23:59:59'";
		$where['Tasks'] = "date_due > '" . $today . " 00:00:00' AND date_due < '" . $today . " 23:59:59'";
		
		$activities_array = array(	'Call' => 'Calls', 
									'Meeting' => 'Meetings', 
									'Task' => 'Tasks' );
		
		$act_list = array();
		$todays_activities = false;
		require_once('include/ListView/ListViewData.php');
		$lvd = new ListViewData(); 
		
		foreach($activities_array as $bean=>$module){
			require_once('modules/'.$module.'/'.$bean.'.php');
			$$bean = new $bean();			
						
			$data = $lvd->getListViewData($$bean, $where[$module] . " AND " . $$bean->table_name .".assigned_user_id = '{$GLOBALS['current_user']->id}'", 0, -1, $this->get_filter_fields($module));
			
			if (!empty($data['data'])){
				$act_list[$module] = $data['data'];
				$todays_activities = true;
			}
		}

		$this->ss->assign('todays_activities', $todays_activities);
		$this->ss->assign('activities_today', $act_list);
	}
	
	/**
	 * Public function that handles the display of the main page
	 */
	public function display(){
		// print the header, also print welcome message
	    $this->wl_header(true);
	    // print select list
	    $this->wl_select_list();
	 	   
	    $this->wl_activities_today();
	    $this->wl_last_viewed();
	    	
		// display the main page
		$this->ss->display('include/SugarWireless/tpls/wirelessmain.tpl');
		// print the footer
		$this->wl_footer();
	}
}
?>
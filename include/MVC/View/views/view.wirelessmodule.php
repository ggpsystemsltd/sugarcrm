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

require_once('include/SugarWireless/SugarWirelessView.php');

/**
 * ViewWirelessmodule extends SugarWirelessView and is the view for the wireless
 * module page.
 * 
 */
class ViewWirelessmodule extends SugarWirelessView
{
	private function oppPipelineBySalesStage()
    {
		require_once('modules/Charts/Dashlets/MyPipelineBySalesStageDashlet/MyPipelineBySalesStageDashlet.php');
        
        $myplbss = new MyPipelineBySalesStageDashlet('',array());
        $q_array = $myplbss->querySetup();
        $query = $myplbss->constructQuery($q_array['datax'], $q_array['start_date'], $q_array['end_date'], $q_array['ids']);

        $rs = $GLOBALS['db']->query($query);
        
        $max = 0;
        $pipeline_data = array();

        $row = $GLOBALS['db']->fetchByAssoc($rs);
        $total = $row['total'];
        while ($row != null){
            array_push($pipeline_data, $row);
            $row = $GLOBALS['db']->fetchByAssoc($rs);
            if ($row['total'] > $max){
            	$max = $row['total'];
            }
            $total += $row['total'];
        }

        foreach($pipeline_data as $key=>$data){
            $pipeline_data[$key]['width'] = number_format(($data['total']/$max)*85);
        }
        $this->ss->assign('wl_myplbss_dashlet', true);
        $this->ss->assign('pipeline_data', $pipeline_data);
        $this->ss->assign('total', $total);
    }
 	
 	
 	/**
 	 * Public function that handles the display of the module view
 	 */
 	public function display()
    {
        global $current_user;
        
        $current_user->setPreference('wireless_last_module', $this->module);
        
 		// print the header
		$this->wl_header();
		// print the select list
		$this->wl_select_list();
		
		// assign saved search and search form templates for display
		$this->ss->assign('WL_SAVED_SEARCH_FORM', $this->wl_saved_search_form());
 	    $this->ss->assign('WL_SEARCH_FORM', $this->wl_search_form());
 	    
 	    // display the module view
        $this->ss->assign('DISPLAY_CREATE',empty($this->wl_mod_create_list[$this->module]));
        $this->ss->display('include/SugarWireless/tpls/wirelessmodule.tpl');
		
		// print the footer
		$this->wl_footer();
 	}

}
?>

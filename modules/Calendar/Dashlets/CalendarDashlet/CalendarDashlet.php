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


require_once('include/Dashlets/Dashlet.php');


class CalendarDashlet extends Dashlet {
    var $view = 'week';

    function CalendarDashlet($id, $def) {
        $this->loadLanguage('CalendarDashlet','modules/Calendar/Dashlets/');

		parent::Dashlet($id); 
         
		$this->isConfigurable = true; 
		$this->hasScript = true;  
                
		if(empty($def['title'])) 
			$this->title = $this->dashletStrings['LBL_TITLE'];
		else 
			$this->title = $def['title'];  
			
		if(!empty($def['view']))
			$this->view = $def['view'];			
             
    }

    function display(){
		ob_start();
		
		if(isset($GLOBALS['cal_strings']))
			return parent::display() . "Only one Calendar dashlet is allowed.";
			
		require_once('modules/Calendar/Calendar.php');
		require_once('modules/Calendar/CalendarDisplay.php');
		require_once("modules/Calendar/CalendarGrid.php");
		
		global $cal_strings, $current_language;
		$cal_strings = return_module_language($current_language, 'Calendar');
		
		if(!ACLController::checkAccess('Calendar', 'list', true))
			ACLController::displayNoAccess(true);
						
		$cal = new Calendar($this->view);
		$cal->dashlet = true;
		$cal->add_activities($GLOBALS['current_user']);
		$cal->load_activities();
		
		$display = new CalendarDisplay($cal,$this->id);
		$display->display_calendar_header(false);		
		$display->display();
			
		$str = ob_get_contents();	
		ob_end_clean();
		
		return parent::display() . $str;
    }
    

    function displayOptions() {
        global $app_strings,$mod_strings;        
        $ss = new Sugar_Smarty();
        $ss->assign('MOD', $this->dashletStrings);        
        $ss->assign('title', $this->title);
        $ss->assign('view', $this->view);
        $ss->assign('id', $this->id);

        return parent::displayOptions() . $ss->fetch('modules/Calendar/Dashlets/CalendarDashlet/CalendarDashletOptions.tpl');
    }  

    function saveOptions($req) {
        global $sugar_config, $timedate, $current_user, $theme;
        $options = array();
        $options['title'] = $_REQUEST['title']; 
        $options['view'] = $_REQUEST['view'];       
         
        return $options;
    }

    function displayScript(){
	return "";
    }


}

?>

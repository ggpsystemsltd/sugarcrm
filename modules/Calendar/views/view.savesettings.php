<?php
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

require_once('include/MVC/View/SugarView.php');

class CalendarViewSaveSettings extends SugarView {

	function CalendarViewSettings(){
 		parent::SugarView();
	}
	
	function process(){
		$this->display();
	}
	
	function display(){
		global $current_user;		

		$db_start = $this->to_db_time($_REQUEST['day_start_hours'],$_REQUEST['day_start_minutes'],$_REQUEST['day_start_meridiem']);
		$db_end = $this->to_db_time($_REQUEST['day_end_hours'],$_REQUEST['day_end_minutes'],$_REQUEST['day_end_meridiem']);
		
		$current_user->setPreference('day_start_time', $db_start, 0, 'global', $current_user);
		$current_user->setPreference('day_end_time', $db_end, 0, 'global', $current_user);
		
		$current_user->setPreference('show_tasks', $_REQUEST['show_tasks'], 0, 'global', $current_user);
		$current_user->setPreference('show_calls', $_REQUEST['show_calls'], 0, 'global', $current_user);

		if(isset($_REQUEST['day']) && !empty($_REQUEST['day']))
			header("Location: index.php?module=Calendar&action=index&view=".$_REQUEST['view']."&hour=0&day=".$_REQUEST['day']."&month=".$_REQUEST['month']."&year=".$_REQUEST['year']);
		else
			header("Location: index.php?module=Calendar&action=index");
	}
	
	private function to_db_time($hours,$minutes,$mer){
		$hours = intval($hours);
		$minutes = intval($minutes);
		$mer = strtolower($mer);
		if(!empty($mer)){
			if(($mer) == 'am')
				if($hours == 12)
					$hours = $hours - 12;
			if(($mer) == 'pm')
				if($hours != 12)
					$hours = $hours + 12;		
		}
		if($hours < 10)
			$hours = "0".$hours;
		if($minutes < 10)
			$minutes = "0".$minutes;	
		return $hours . ":". $minutes; 
	}	
	

}

?>

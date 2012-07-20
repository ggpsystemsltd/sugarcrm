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


require_once('include/utils/activity_utils.php');
require_once('modules/Calendar/CalendarUtils.php');
require_once('modules/Calendar/CalendarActivity.php');

class Calendar {
	
	public $view = 'week'; // current view
	public $dashlet = false; // if is displayed in dashlet	
	public $date_time; // current date
	
	public $show_tasks = true;
	public $show_calls = true;	

	public $time_step = 60; // time step of each slot in minutes
		
	public $acts_arr = array(); // Array of activities objects	
	public $items = array(); // Array of activities data to be displayed	
	public $shared_ids = array(); // ids of users for shared view
	
	public $shared_team_id = ''; // team id for user list of shared view
	
	public $cells_per_day; // entire 24h day count of slots 	
	public $grid_start_ts; // start timestamp of calendar grid
	
	public $day_start_time; // working day start time in format '11:00'
	public $day_end_time; // working day end time in format '11:00'
	public $scroll_slot; // first slot of working day
	public $celcount; // count of slots in a working day
	
	/**
	 * constructor
	 * @param string $view 
	 * @param array $time_arr 
	 */	
	function __construct($view = "day", $time_arr = array()){
		global $current_user, $timedate;	
		
		$this->view = $view;		

		if(!in_array($this->view,array('day','week','month','year','shared')))
			$this->view = 'week';
		
		$date_arr = array();
		if(!empty($_REQUEST['day']))
			$_REQUEST['day'] = intval($_REQUEST['day']);
		if(!empty($_REQUEST['month']))
			$_REQUEST['month'] = intval($_REQUEST['month']);

		if (!empty($_REQUEST['day']))
			$date_arr['day'] = $_REQUEST['day'];
		if (!empty($_REQUEST['month']))
			$date_arr['month'] = $_REQUEST['month'];
		if (!empty($_REQUEST['week']))
			$date_arr['week'] = $_REQUEST['week'];

		if (!empty($_REQUEST['year'])){
			if ($_REQUEST['year'] > 2037 || $_REQUEST['year'] < 1970){
				print("Sorry, calendar cannot handle the year you requested");
				print("<br>Year must be between 1970 and 2037");
				exit;
			}
			$date_arr['year'] = $_REQUEST['year'];
		}

		if(empty($_REQUEST['day']))
			$_REQUEST['day'] = "";
		if(empty($_REQUEST['week']))
			$_REQUEST['week'] = "";
		if(empty($_REQUEST['month']))
			$_REQUEST['month'] = "";
		if(empty($_REQUEST['year']))
			$_REQUEST['year'] = "";

		// if date is not set in request use current date
		if(empty($date_arr) || !isset($date_arr['year']) || !isset($date_arr['month']) || !isset($date_arr['day']) ){	
			$today = $timedate->getNow(true);
			$date_arr = array(
			      'year' => $today->year,
			      'month' => $today->month,
			      'day' => $today->day,
			);
		}
		
		$current_date_db = $date_arr['year']."-".str_pad($date_arr['month'],2,"0",STR_PAD_LEFT)."-".str_pad($date_arr['day'],2,"0",STR_PAD_LEFT);
		$this->date_time = $GLOBALS['timedate']->fromString($current_date_db);
				
		$this->show_tasks = $current_user->getPreference('show_tasks');
		if(is_null($this->show_tasks))
			$this->show_tasks = SugarConfig::getInstance()->get('calendar.show_tasks_by_default',true);		
		$this->show_calls = $current_user->getPreference('show_calls');
		if(is_null($this->show_calls))
			$this->show_calls = SugarConfig::getInstance()->get('calendar.show_calls_by_default',true);	

		$this->day_start_time = $current_user->getPreference('day_start_time');
		if(is_null($this->day_start_time))
			$this->day_start_time = SugarConfig::getInstance()->get('calendar.default_day_start',"08:00");
		$this->day_end_time = $current_user->getPreference('day_end_time');
		if(is_null($this->day_end_time))
			$this->day_end_time = SugarConfig::getInstance()->get('calendar.default_day_end',"19:00");
			
		if($this->view == "day"){
			$this->time_step = SugarConfig::getInstance()->get('calendar.day_timestep',15);
		}else if($this->view == "week" || $this->view == "shared"){
			$this->time_step = SugarConfig::getInstance()->get('calendar.week_timestep',30);
		}else if($this->view == "month"){
			$this->time_step = SugarConfig::getInstance()->get('calendar.month_timestep',60);
		}else{
			$this->time_step = 60;
		}
		$this->cells_per_day = 24 * (60 / $this->time_step);		
		$this->calculate_grid_start_ts();
		
		$this->calculate_day_range();		
	}
	
	/**
	 * Load activities data to array
	 */		
	public function load_activities(){
		$field_list = CalendarUtils::get_fields();
		
		foreach($this->acts_arr as $user_id => $acts){	
			foreach($acts as $act){										
					$item = array();
					$item['user_id'] = $user_id;
					$item['module_name'] = $act->sugar_bean->module_dir;
					$item['type'] = strtolower($act->sugar_bean->object_name);
					$item['assigned_user_id'] = $act->sugar_bean->assigned_user_id;
					$item['id'] = $act->sugar_bean->id;	
					$item['name'] = $act->sugar_bean->name;
					$item['status'] = $act->sugar_bean->status;
					
					if(isset($act->sugar_bean->duration_hours)){
						$item['duration_hours'] = $act->sugar_bean->duration_hours;
						$item['duration_minutes'] = $act->sugar_bean->duration_minutes;
					}				
					 			
					$item['detail'] = 0;
					$item['edit'] = 0;
					
					if($act->sugar_bean->ACLAccess('DetailView'))
						$item['detail'] = 1;						
					if($act->sugar_bean->ACLAccess('Save'))
						$item['edit'] = 1;					
						
					if(empty($act->sugar_bean->id)){
						$item['detail'] = 0;
						$item['edit'] = 0;
					}					
					
					if($item['detail'] == 1){
						if(isset($field_list[$item['module_name']])){
							foreach($field_list[$item['module_name']] as $field){
								if(!isset($item[$field])){
									$item[$field] = $act->sugar_bean->$field;									
									if($act->sugar_bean->field_defs[$field]['type'] == 'text'){									
										$t = $item[$field];	
										if(strlen($t) > 300){
											$t = substr($t, 0, 300);
											$t .= "...";
										}			
										$t = str_replace("\r\n","<br>",$t);
										$t = str_replace("\r","<br>",$t);
										$t = str_replace("\n","<br>",$t);
										$item[$field] = $t;
									}										
								}
							}					
						}				
					}					

					if(!isset($item['duration_hours']) || empty($item['duration_hours']))
						$item['duration_hours'] = 0;
					if(!isset($item['duration_minutes']) || empty($item['duration_minutes']))
						$item['duration_minutes'] = 0;	
						
					$item = array_merge($item,CalendarUtils::get_time_data($act->sugar_bean));			
			
					$this->items[] = $item;
			}
		}
	}
	
	/**
	 * Get javascript objects of activities to be displayed on calendar
	 * @return string
	 */
	public function get_activities_js(){	
				$field_list = CalendarUtils::get_fields();
				$a_str = "";				
				$ft = true;
				foreach($this->items as $act){
					if(!$ft)
						$a_str .= ",";						
					$a_str .= "{";		
					$a_str .= '
						"type" : "'.$act["type"].'", 
						"module_name" : "'.$act["module_name"].'",  
						"record" : "'.$act["id"].'",
						"user_id" : "'.$act["user_id"].'",
						"timestamp" : "'.$act["timestamp"].'",
						"time_start" : "'.$act["time_start"].'",
						"record_name": "'.$act["name"].'",'.
					'';
					foreach($field_list[$act['module_name']] as $field){
						if(!isset($act[$field]))
							$act[$field] = "";
						$a_str .= '	"'. $field . '" : "'.$act[$field].'",
					'; 
					}
					$a_str .=	'
						"detail" : "'.$act["detail"].'",
						"edit" : "'.$act["edit"].'"
					';
					$a_str .= "}";
					$ft = false;				
				}				
				return $a_str;
	}	
	
	/**
	 * initialize ids of shared users
	 */	
	public function init_shared(){
		global $current_user;
		
		$shared_team_id = $current_user->getPreference('shared_team_id');
		if(!empty($shared_team_id) && !isset($_REQUEST['shared_team_id'])) {
			$this->shared_team_id = $shared_team_id;
		}else if(isset($_REQUEST['shared_team_id'])) {
			$this->shared_team_id = $_REQUEST['shared_team_id'];
			$current_user->setPreference('shared_team_id', $_REQUEST['shared_team_id']);
		}else{
			$this->shared_team_id = '';
		}
		
		$user_ids = $current_user->getPreference('shared_ids');
		if(!empty($user_ids) && count($user_ids) != 0 && !isset($_REQUEST['shared_ids'])) {
			$this->shared_ids = $user_ids;
		}else if(isset($_REQUEST['shared_ids']) && count($_REQUEST['shared_ids']) > 0){
			$this->shared_ids = $_REQUEST['shared_ids'];
			$current_user->setPreference('shared_ids', $_REQUEST['shared_ids']);
		}else{
			$this->shared_ids = array($current_user->id);				
		}
	}
	
	/**
	 * Calculate timestamp the calendar grid should be started from 
	 */
	protected function calculate_grid_start_ts(){
	
		if($this->view == "week" || $this->view == "shared"){
			$week_start = CalendarUtils::get_first_day_of_week($this->date_time);
			$this->grid_start_ts = $week_start->format('U') + $week_start->getOffset();		
		}else if($this->view == "month"){
			$month_start = $this->date_time->get_day_by_index_this_month(0);
			$week_start = CalendarUtils::get_first_day_of_week($month_start);
			$this->grid_start_ts = $week_start->format('U') + $week_start->getOffset(); // convert to timestamp, ignore tz
		}else if($this->view == "day"){
			$this->grid_start_ts = $this->date_time->format('U') + $this->date_time->getOffset();		
		}else
			$this->grid_start_ts = 0;
	}
	
	/**
	 * calculate count of timeslots per visible day, calculates day start and day end in minutes 
	 */	
	function calculate_day_range(){	
		
		list($hour_start,$minute_start) =  explode(":",$this->day_start_time);		
		list($hour_end,$minute_end) =  explode(":",$this->day_end_time);		

		$this->d_start_minutes = $hour_start * 60 + $minute_start;
		$this->d_end_minutes = $hour_end * 60 + $minute_end;	
		
		$this->scroll_slot = intval($hour_start * (60 / $this->time_step) + ($minute_start / $this->time_step));
		$this->celcount = (($hour_end * 60 + $minute_end) - ($hour_start * 60 + $minute_start)) / $this->time_step;
	}	
	
	/**
	 * loads array of objects
	 * @param User $user user object
	 * @param string $type
	 */	
	public function add_activities($user,$type='sugar'){
		global $timedate;
		$start_date_time = $this->date_time;
		if($this->view == 'week' || $this->view == 'shared'){		
			$start_date_time = CalendarUtils::get_first_day_of_week($this->date_time);
			$end_date_time = $start_date_time->get("+7 days");
		}else if($this->view == 'month'){
			$start_date_time = $this->date_time->get_day_by_index_this_month(0);	
			$end_date_time = $start_date_time->get("+".$start_date_time->format('t')." days");
			$start_date_time = CalendarUtils::get_first_day_of_week($start_date_time);
			$end_date_time = CalendarUtils::get_first_day_of_week($end_date_time)->get("+7 days");
		}else{
			$end_date_time = $this->date_time->get("+1 day");
		}		
		
		$acts_arr = array();
	    	if($type == 'vfb'){
				$acts_arr = CalendarActivity::get_freebusy_activities($user, $start_date_time, $end_date_time);
	    	}else{
				$acts_arr = CalendarActivity::get_activities($user->id, $this->show_tasks, $start_date_time, $end_date_time, $this->view,$this->show_calls);
	    	}
	    	
	    	$this->acts_arr[$user->id] = $acts_arr;	 
	}

	/**
	 * Get date string of next or previous calendar grid
	 * @param string $direction next or previous
	 * @return string
	 */
	public function get_neighbor_date_str($direction){
		if($direction == "previous")
			$sign = "-";
		else 
			$sign = "+";
			
		if($this->view == 'month'){
            $day = $this->date_time->get_day_by_index_this_month(0)->get($sign."1 month")->get_day_begin(1);
		}else if($this->view == 'week' || $this->view == 'shared'){
			$day = CalendarUtils::get_first_day_of_week($this->date_time);
			$day = $day->get($sign."7 days");
		}else if($this->view == 'day'){
			$day = $this->date_time->get($sign."1 day")->get_day_begin();
		}else if($this->view == 'year'){
            		$day = $this->date_time->get($sign."1 year")->get_day_begin();
		}else{
			return "get_neighbor_date_str: notdefined for this view";
		}
		return $day->get_date_str();
	}

}

?>

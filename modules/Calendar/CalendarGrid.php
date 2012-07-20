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



global $timedate;

class CalendarGrid {

	protected $cal; // Calendar object
	protected $today_ts; // timestamp of today
	protected $weekday_names; // string array of names of week days
	protected $startday; // first day of week
	protected $scrollable; // srolling in calendar
	protected $time_step = 30; // time step
	protected $time_format; // user time format
	protected $date_time_format; // user date time format
	protected $scroll_height; // height of scrollable div
	
	/**
	 * constructor
	 * @param Calendar $cal
	 */
	function __construct(&$cal){
		global $current_user;
		$this->cal = &$cal;		
		$today = $GLOBALS['timedate']->getNow(true)->get_day_begin();
		$this->today_ts = $today->format('U') + $today->getOffset();		
		$this->startday = $current_user->get_first_day_of_week();
		
		$weekday_names = array();
		for($i = 0; $i < 7; $i++){
			$j = $i + $this->startday;
			if($j >= 7)
				$j = $j - 7;
			$weekday_names[$i] = $GLOBALS['app_list_strings']['dom_cal_day_short'][$j+1];
		}		
			
		$this->weekday_names = $weekday_names;	
		
		$this->scrollable = false;		
		if(in_array($this->cal->view,array('day','week'))){
			$this->scrollable = true;
			if($this->cal->time_step < 30)
				$this->scroll_height = 480;
			else
				$this->scroll_height = $this->cal->celcount * 15 + 1;
		}
		
		$this->time_step = $this->cal->time_step;
		$this->time_format = $GLOBALS['timedate']->get_time_format();
		$this->date_time_format = $GLOBALS['timedate']->get_date_time_format();	
	
	}
	
	
	/** Get html of calendar grid
	 * @return string
	 */
	public function display(){
		$action = "display_".strtolower($this->cal->view);		
		return $this->$action();
	}
	
	/** Get html of time column
	 * @param integer $start timestamp	 
	 * @return string
	 */
	protected function get_time_column($start){			
		$str = "";			
		$head_content = "&nbsp;";	
		if($this->cal->view == 'month'){
			if($this->startday == 0)
				$wf = 1;
			else
				$wf = 0;				
			$head_content = "<a href='".ajaxLink("index.php?module=Calendar&action=index&view=week&hour=0&day=".$GLOBALS['timedate']->fromTimestamp($start)->format('j')."&month=".$GLOBALS['timedate']->fromTimestamp($start)->format('n')."&year=".$GLOBALS['timedate']->fromTimestamp($start)->format('Y'))."'>".$GLOBALS['timedate']->fromTimestamp($start + $wf*3600*24)->format('W')."</a>";
		}			
		$str .= "<div class='left_time_col'>";
			if(!$this->scrollable)			
				$str .= "<div class='day_head'>".$head_content."</div>";
			for($i = 0; $i < 24; $i++){
				for($j = 0; $j < 60; $j += $this->time_step){	
							
					if($j == 0){ 
						$innerText = $GLOBALS['timedate']->fromTimestamp($start + $i * 3600)->format($this->time_format);						
					}else{
						$innerText = "&nbsp;";
					}						
					if($j == 60 - $this->time_step && $this->time_step < 60){
						$class = " odd_border";
					}else{
						$class = "";
					}										
					if($this->scrollable || !$this->check_owt($i,$j,$this->cal->d_start_minutes,$this->cal->d_end_minutes))											
						$str .= "<div class='left_cell".$class."'>".$innerText."</div>";
				}
			}	
		$str .= "</div>";		
		return $str;
	}
	
	/** 
	 * Get html of day slots column
	 * @param integer $start timestamp
	 * @param integer $day number of day in week
	 * @param string $prefix prefix for id of timeslot used in shared view	 
	 * @return string
	 */
	protected function get_day_column($start,$day = 0,$prefix = ""){	
		$curr_time = $start;
		$str = "";
		$str .= "<div class='day_col'>";
		$str .= $this->get_day_head($start,$day);
		for($i = 0; $i < 24; $i++){			
			for($j = 0; $j < 60; $j += $this->time_step){
				$timestr = $GLOBALS['timedate']->fromTimestamp($curr_time)->format($this->time_format);	
				if($j == 60 - $this->time_step && $this->time_step < 60){
					$class = " odd_border";
				}else{
					$class = "";	
				}				
				if($this->scrollable || !$this->check_owt($i,$j,$this->cal->d_start_minutes,$this->cal->d_end_minutes))
					$str .= "<div id='t_".$curr_time.$prefix."' class='slot".$class."' time='".$timestr."' datetime='".$GLOBALS['timedate']->fromTimestamp($curr_time)->format($this->date_time_format)."'></div>";
				$curr_time += $this->time_step*60;
			}
		}
		$str .= "</div>";		
		return $str;	
	}
	
	/** 
	 * Get html of day head
	 * @param integer $start timestamp
	 * @param integer $day number of day in week 
	 * @param bulean $force force display header 
	 * @return string
	 */	
	protected function get_day_head($start,$day = 0,$force = false){
		$str = "";
		if(!$this->scrollable || $force){
			$headstyle = ""; 
			if($this->today_ts == $start)
				$headstyle = " today";
			$str .= "<div class='day_head".$headstyle."'><a href='".ajaxLink("index.php?module=Calendar&action=index&view=day&hour=0&day=".$GLOBALS['timedate']->fromTimestamp($start)->format('j')."&month=".$GLOBALS['timedate']->fromTimestamp($start)->format('n')."&year=".$GLOBALS['timedate']->fromTimestamp($start)->format('Y'))."'>".$this->weekday_names[$day]." ".$GLOBALS['timedate']->fromTimestamp($start)->format('d')."</a></div>";
		}
		return $str;
	}	
	
	/**
	 * Get true if out of working day
	 * @param integer $i hours
	 * @param integer $j minutes
	 * @param integer $r_start start of working day in minutes
	 * @param integer $r_end end of working day in minutes
	 * @return boolean
	 */
	protected function check_owt($i,$j,$r_start,$r_end){
		if($i*60+$j < $r_start || $i*60+$j >= $r_end)
			return true;
	}
	
	/** 
	 * Get html of week calendar grid
	 * @return string	
	 */	
	protected function display_week(){
		
		$current_date = $this->cal->date_time;
		$week_start = CalendarUtils::get_first_day_of_week($current_date);
		$week_start_ts = $week_start->format('U') + $week_start->getOffset(); // convert to timestamp, ignore tz
	
		$str = "";
		$str .= "<div id='cal-grid' style='visibility: hidden;'>";
				
			$str .= "<div style='overflow-y: hidden;'>";						
				$str .= "<div class='left_time_col'>";
					$str .= "<div class='day_head'>&nbsp;</div>";		
				$str .= "</div>";
				$str .= "<div class='week_block'>";
				for($d = 0; $d < 7; $d++){
					$curr_time = $week_start_ts + $d*86400;
					$str .= "<div class='day_col'>";
					$str .= $this->get_day_head($curr_time,$d,true);					
					$str .= "</div>";			
				}
				$str .= "</div>";		
			$str .= "</div>";		
			
			$str .= "<div id='cal-scrollable' style='clear: both; height: ".$this->scroll_height ."px;'>";			
				$str .= $this->get_time_column($week_start_ts);			
				$str .= "<div class='week_block'>";
				for($d = 0; $d < 7; $d++){
					$curr_time = $week_start_ts + $d*86400;				
					$str .= $this->get_day_column($curr_time);
				}	
				$str .= "</div>";		
			$str .= "</div>";
				
		$str .= "</div>";
		
		return $str;
	}		
	
	/** 
	 * Get html of day calendar grid
	 * @return string	
	 */
	protected function display_day(){	

		$current_date = $this->cal->date_time;
		$day_start_ts = $current_date->format('U') + $current_date->getOffset(); // convert to timestamp, ignore tz
		
		
		$str = "";
		$str .= "<div id='cal-grid' style=' min-width: 300px; visibility: hidden;'>";
			$str .= "<div id='cal-scrollable' style='height: ".$this->scroll_height ."px;'>";			
				$str .= $this->get_time_column($day_start_ts);
				$d = 0;
				$curr_time = $day_start_ts + $d*86400;
				$str .= "<div class='week_block'>";				
				$str .= $this->get_day_column($curr_time);
				$str .= "</div>";
			$str .= "</div>";		
		$str .= "</div>";
		
		return $str;	
	}	
	
	/** 
	 * Get html of month calendar grid
	 * @return string	
	 */
	protected function display_month(){
			
		$current_date = $this->cal->date_time;
		$month_start = $current_date->get_day_by_index_this_month(0);	
		$month_end = $month_start->get("+".$month_start->format('t')." days");			
		$week_start = CalendarUtils::get_first_day_of_week($month_start);
		$week_start_ts = $week_start->format('U') + $week_start->getOffset(); // convert to timestamp, ignore tz
		$month_end_ts = $month_end->format('U') + $month_end->getOffset();					

		$str = "";
		$str .= "<div id='cal-grid' style='visibility: hidden;'>";
			$curr_time_global = $week_start_ts;
			$w = 0;
			while($curr_time_global < $month_end_ts){
				$str .= $this->get_time_column($curr_time_global);				
				$str .= "<div class='week_block'>";	
				for($d = 0; $d < 7; $d++){
					$curr_time = $week_start_ts + $d*86400 + $w*60*60*24*7;
					$str .= $this->get_day_column($curr_time,$d);		
				}
				$str .= "</div>";
				$str .= "<div style='clear: left;'></div>";
				$curr_time_global += 60*60*24*7;
				$w++;
			}
		$str .= "</div>";
		
		return $str;
	}
	
	/** 
	 * Get html of week shared grid
	 * @return string	
	 */
	protected function display_shared(){
	
		$current_date = $this->cal->date_time;
		$week_start = CalendarUtils::get_first_day_of_week($current_date);
		$week_start_ts = $week_start->format('U') + $week_start->getOffset(); // convert to timestamp, ignore tz

		$str = "";
		$str .= "<div id='cal-grid' style='visibility: hidden;'>";
		$user_number = 0;
		
		$shared_user = new User();
		foreach($this->cal->shared_ids as $member_id){

			$user_number_str = "_".$user_number;
		
			$shared_user->retrieve($member_id);
			$str .= "<div style='clear: both;'></div>";			
			$str .= "<div class='monthCalBody'><h5 class='calSharedUser'>".$shared_user->full_name."</h5></div>";	
			$str .= "<div user_id='".$member_id."' user_name='".$shared_user->user_name."'>";			
			
			$str .= $this->get_time_column($week_start_ts);
				$str .= "<div class='week_block'>";
				for($d = 0; $d < 7; $d++){
					$curr_time = $week_start_ts + $d*86400;
					$str .= $this->get_day_column($curr_time,$d,$user_number_str);
				}
				$str .= "</div>";		
			$str .= "</div>";
			$user_number++;
		}
		$str .= "</div>";
		
		return $str;
	}	
	
	/** 
	 * Get html of year calendar
	 * @return string	
	 */
	protected function display_year(){	

		$weekEnd1 = 0 - $this->startday; 
		$weekEnd2 = -1 - $this->startday; 
		if($weekEnd1 < 0)
			$weekEnd1 += 7;		
		if($weekEnd2 < 0)
			$weekEnd2 += 7;	

		$year_start = $GLOBALS['timedate']->fromString($this->cal->date_time->year.'-01-01');

		$str = "";
		$str .= '<table id="daily_cal_table" cellspacing="1" cellpadding="0" border="0" width="100%">';

		for($m = 0; $m < 12; $m++){
	
			$month_start = $year_start->get("+".$m." months");			
			$month_start_ts = $month_start->format('U') + $month_start->getOffset();
			$month_end = $month_start->get("+".$month_start->format('t')." days");			
			$week_start = CalendarUtils::get_first_day_of_week($month_start);
			$week_start_ts = $week_start->format('U') + $week_start->getOffset(); // convert to timestamp, ignore tz
			$month_end_ts = $month_end->format('U') + $month_end->getOffset();
			$table_id = "daily_cal_table".$m; //bug 47471	
						
			if($m % 3 == 0)
				$str .= "<tr>";		
					$str .= '<td class="yearCalBodyMonth" align="center" valign="top" scope="row">';
						$str .= '<a class="yearCalBodyMonthLink" href="'.ajaxLink('index.php?module=Calendar&action=index&view=month&&hour=0&day=1&month='.($m+1).'&year='.$GLOBALS['timedate']->fromTimestamp($month_start_ts)->format('Y')).'">'.$GLOBALS['app_list_strings']['dom_cal_month_long'][$m+1].'</a>';
						$str .= '<table id="'. $table_id. '" cellspacing="1" cellpadding="0" border="0" width="100%">';	
							$str .= '<tr class="monthCalBodyTH">';
								for($d = 0; $d < 7; $d++)
									$str .= '<th width="14%">'.$this->weekday_names[$d].'</th>';			
							$str .= '</tr>';				
							$curr_time_global = $week_start_ts;
							$w = 0;
							while($curr_time_global < $month_end_ts){
								$str .= '<tr class="monthViewDayHeight yearViewDayHeight">';
									for($d = 0; $d < 7; $d++){
										$curr_time = $week_start_ts + $d*86400 + $w*60*60*24*7;

										if($curr_time < $month_start_ts || $curr_time >= $month_end_ts)
											$monC = "";
										else
											$monC = '<a href="'.ajaxLink('index.php?module=Calendar&action=index&view=day&hour=0&day='.$GLOBALS['timedate']->fromTimestamp($curr_time)->format('j').'&month='.$GLOBALS['timedate']->fromTimestamp($curr_time)->format('n').'&year='.$GLOBALS['timedate']->fromTimestamp($curr_time)->format('Y')) .'">'.$GLOBALS['timedate']->fromTimestamp($curr_time)->format('j').'</a>';
								
										if($d == $weekEnd1 || $d == $weekEnd2)	
											$str .= "<td class='weekEnd monthCalBodyWeekEnd'>"; 
										else
											$str .= "<td class='monthCalBodyWeekDay'>";
												$str .= $monC;
											$str .= "</td>";
									}
								$str .= "</tr>";
								$curr_time_global += 60*60*24*7;
								$w++;
							}				
						$str .= '</table>';
					$str .= '</td>';
			if(($m - 2) % 3 == 0)
				$str .= "</tr>";	
		}
		$str .= "</table>";
		
		return $str;		
	}
}

?>

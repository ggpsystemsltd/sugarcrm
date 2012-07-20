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


class CalendarDisplay {	

	/** 
	 * colors of items on calendar
	 */
	public $activity_colors = array(
		'Meetings' => array(
			'border' => '#1C5FBD',
			'body' => '#D2E5FC',
		),
		'Calls' => array(
			'border' => '#DE4040',
			'body' => '#FCDCDC',
		),
		'Tasks' => array(
			'border' => '#015900',
			'body' => '#B1F5AE',
		),
	);
	
	/**
	 * constructor
	 * @param Calendar $cal
	 * @param string $dashlet_id for dashlet mode 
	 */
	function __construct(&$cal,$dashlet_id = ""){
		$this->cal = &$cal;
		$this->dashlet_id = $dashlet_id;
	}	
	
	/**
	 * main displaying function of Calendar
	 */
	public function display(){
	
		global $timedate;
	
		$cal = &$this->cal;	
		$ss = new Sugar_Smarty();
	
		$ss->assign('APP',$GLOBALS['app_strings']);
		$ss->assign('APPLIST',$GLOBALS['app_list_strings']);
		$ss->assign('MOD',$GLOBALS['cal_strings']);

		$ss->assign('view',$cal->view);
		$ss->assign('t_step',$cal->time_step);
		$ss->assign('current_user_id',$GLOBALS['current_user']->id);
		$ss->assign('current_user_name',$GLOBALS['current_user']->name);
		$ss->assign('time_format',$GLOBALS['timedate']->get_user_time_format());
		$ss->assign('items_draggable',SugarConfig::getInstance()->get('calendar.items_draggable',true));		
		$ss->assign('mouseover_expand',SugarConfig::getInstance()->get('calendar.mouseover_expand',true));
		$ss->assign('item_text','name');
		$ss->assign('cells_per_day',$cal->cells_per_day);
		$ss->assign('img_edit_inline',SugarThemeRegistry::current()->getImageURL('edit_inline.gif',false));
		$ss->assign('img_view_inline',SugarThemeRegistry::current()->getImageURL('view_inline.gif',false));
		$ss->assign('img_close',SugarThemeRegistry::current()->getImageURL('close.gif',false));		
		$ss->assign('dashlet',$cal->dashlet);
		
		$ss->assign('grid_start_ts',$cal->grid_start_ts);
		$ss->assign('celcount',$cal->celcount);		
		
		if(count($cal->shared_ids)){
			$ss->assign('shared_ids',$cal->shared_ids);
			$ss->assign('shared_users_count',count($cal->shared_ids));
		}				
		$ss->assign('activity_colors',$this->activity_colors);	
		
		$ss->assign('scroll_slot',$this->cal->scroll_slot);	
		
		$ss->assign('editview_width',SugarConfig::getInstance()->get('calendar.editview_width',800));
		$ss->assign('editview_height',SugarConfig::getInstance()->get('calendar.editview_height',600));	
		$ss->assign('a_str',$cal->get_activities_js());

		$ss->assign('sugar_body_only',(isset($_REQUEST['to_pdf']) && $_REQUEST['to_pdf'] || isset($_REQUEST['sugar_body_only']) && $_REQUEST['sugar_body_only']));
		require_once('include/json_config.php');
		global $json;
		$json = getJSONobj();
		$json_config = new json_config();
		$ss->assign('GRjavascript',$json_config->get_static_json_server(false, true, 'Meetings'));
	
		// form
		$user_default_date_start  = $timedate->asUser($timedate->getNow());
		$ss->assign('user_default_date_start',$user_default_date_start);
		// end form	
		
		if($_REQUEST['module'] == "Calendar"){
			$this->load_settings_template($ss);
			$settings = "custom/modules/Calendar/tpls/settings.tpl";
			if(!file_exists($settings))
				$settings = "modules/Calendar/tpls/settings.tpl";
			$ss->assign("settings",$settings);			
		}
	
		$main = "custom/modules/Calendar/tpls/main.tpl";
		if(!file_exists($main))
			$main = "modules/Calendar/tpls/main.tpl";
		$form_tpl = "custom/modules/Calendar/tpls/form.tpl";
		if(!file_exists($form_tpl))
			$form_tpl = "modules/Calendar/tpls/form.tpl";			
	
		$ss->assign("form",$form_tpl);
			
		echo $ss->fetch($main);	
		
		// drid
		$grid = new CalendarGrid($cal);
		echo $grid->display();
		// end grid	
	}
	
	/**
	 * load settings popup template
	 */	
	protected function load_settings_template(&$ss){	
		
		list($d_start_hour,$d_start_min) =  explode(":",$this->cal->day_start_time);		
		list($d_end_hour,$d_end_min) =  explode(":",$this->cal->day_end_time);	

		require_once("include/utils.php");
		global $app_strings,$app_list_strings,$beanList;
		global $timedate;
				
		$user_default_date_start  = $timedate->asUser($timedate->getNow());
		if(!isset($time_separator))
			$time_separator = ":";	
		$date_format = $timedate->get_cal_date_format();
		$time_format = $timedate->get_user_time_format();
		$TIME_FORMAT = $time_format;      
		$t23 = strpos($time_format, '23') !== false ? '%H' : '%I';
		if(!isset($match[2]) || $match[2] == '') {
			$CALENDAR_FORMAT = $date_format . ' ' . $t23 . $time_separator . "%M";
		}else{
			$pm = $match[2] == "pm" ? "%P" : "%p";
			$CALENDAR_FORMAT = $date_format . ' ' . $t23 . $time_separator . "%M" . $pm;
		}
		$hours_arr = array ();
		$num_of_hours = 24;
		$start_at = 0;
		$TIME_MERIDIEM = "";
		$time_pref = $timedate->get_time_format();
		$start_m = "";		
		if(strpos($time_pref, 'a') || strpos($time_pref, 'A')){
			$num_of_hours = 12;
			$start_at = 1;			
			$start_m = 'am';
			if($d_start_hour == 0){
				$d_start_hour = 12;
				$start_m = 'am';
			}else
				if($d_start_hour == 12)
			   		$start_m = 'pm';
			if($d_start_hour > 12){		   		
				$d_start_hour = $d_start_hour - 12;
			   	$start_m = 'pm';
			}			   	
			$end_m = 'am';
			if($d_end_hour == 0){
				$d_end_hour = 12;
				$end_m = 'am';
			}else
				if($d_end_hour == 12)
			   		$end_m = 'pm';		   		
			   		
			if($d_end_hour > 12){		   		
				$d_end_hour = $d_end_hour - 12;
				$end_m = 'pm';
			}			   	
			if(strpos($time_pref, 'A')){
				$start_m = strtoupper($start_m);
				$end_m = strtoupper($end_m);
			}
			$options = strpos($time_pref, 'a') ? $app_list_strings['dom_meridiem_lowercase'] : $app_list_strings['dom_meridiem_uppercase'];
			$TIME_START_MERIDIEM = get_select_options_with_id($options, $start_m);  
			$TIME_END_MERIDIEM = get_select_options_with_id($options, $end_m);  
			$TIME_START_MERIDIEM = "<select id='day_start_meridiem' name='day_start_meridiem' tabindex='2'>".$TIME_START_MERIDIEM."</select>";
			$TIME_END_MERIDIEM = "<select id='day_end_meridiem' name='day_end_meridiem' tabindex='2'>".$TIME_END_MERIDIEM."</select>";			
		}else{
			$TIME_START_MERIDIEM = $TIME_END_MERIDIEM = "";
		}	
		for($i = $start_at; $i <= $num_of_hours; $i ++){
			$i = $i."";
			if (strlen($i) == 1)
				$i = "0".$i;			
			$hours_arr[$i] = $i;
		}
		$TIME_START_HOUR_OPTIONS = get_select_options_with_id($hours_arr, $d_start_hour);
		$TIME_START_MINUTES_OPTIONS = get_select_options_with_id(array('0'=>'00','15'=>'15','30'=>'30','45'=>'45'), $d_start_min);
		$TIME_END_HOUR_OPTIONS = get_select_options_with_id($hours_arr, $d_end_hour);
		$TIME_END_MINUTES_OPTIONS = get_select_options_with_id(array('0'=>'00','15'=>'15','30'=>'30','45'=>'45'), $d_end_min);
		
		$ss->assign('day',$_REQUEST['day']);
		$ss->assign('week',$_REQUEST['week']);
		$ss->assign('month',$_REQUEST['month']);
		$ss->assign('year',$_REQUEST['year']);
		$ss->assign('TIME_START_HOUR_OPTIONS',$TIME_START_HOUR_OPTIONS);		
		$ss->assign('TIME_START_MINUTES_OPTIONS',$TIME_START_MINUTES_OPTIONS);
		$ss->assign('TIME_START_MERIDIEM',$TIME_START_MERIDIEM);
		$ss->assign('TIME_END_HOUR_OPTIONS',$TIME_END_HOUR_OPTIONS);		
		$ss->assign('TIME_END_MINUTES_OPTIONS',$TIME_END_MINUTES_OPTIONS);
		$ss->assign('TIME_END_MERIDIEM',$TIME_END_MERIDIEM);
		$ss->assign('show_calls',$this->cal->show_calls);
		$ss->assign('show_tasks',$this->cal->show_tasks);
	}
	
	/** 
	 * Get date info string (legacy from old calendar)
	 * @return string
	 */
	public function get_date_info($view, $date_time){
		$str = "";

		global $current_user;
		$dateFormat = $current_user->getUserDateTimePreferences();

		if($view == 'month'){
			for($i=0; $i<strlen($dateFormat['date']); $i++){
				switch($dateFormat['date']{$i}){
					case "Y":
						$str .= " ".$date_time->year;
						break;
					case "m":
						$str .= " ".$date_time->get_month_name();
						break;
				}
			}
		}else
			if($view == 'week' || $view == 'shared') {
				$first_day = $date_time;
				
				$first_day = CalendarUtils::get_first_day_of_week($date_time);				
				$last_day = $first_day->get("+6 days");				

				for($i=0; $i<strlen($dateFormat['date']); $i++) {
					switch($dateFormat['date']{$i}){
						case "Y":
							$str .= " ".$first_day->year;
							break;
						case "m":
							$str .= " ".$first_day->get_month_name();
							break;
						case "d":
							$str .= " ".$first_day->get_day();
							break;
					}
				}
				$str .= " - ";
				for($i=0; $i<strlen($dateFormat['date']); $i++) {
					switch($dateFormat['date']{$i}) {
						case "Y":
							$str .= " ".$last_day->year;
							break;
						case "m":
							$str .= " ".$last_day->get_month_name();
							break;
						case "d":
							$str .= " ".$last_day->get_day();
							break;
					}
				}
			}else if($view == 'day'){
					$str .= $date_time->get_day_of_week()." ";

					for($i=0; $i<strlen($dateFormat['date']); $i++){
						switch($dateFormat['date']{$i}){
							case "Y":
								$str .= " ".$date_time->year;
								break;
							case "m":
								$str .= " ".$date_time->get_month_name();
								break;
							case "d":
								$str .= " ".$date_time->get_day();
								break;
						}
					}
			}else if($view == 'year') {
				$str .= $date_time->year;
			}else{
				sugar_die("echo_date_info: date not supported");
			}
		return $str;
	}
	
	/**
	 * Get link to next date range
	 * @return string
	 */
	protected function get_next_calendar(){	
		global $cal_strings,$image_path;
		$str = "";
		if($_REQUEST['module'] == "Calendar"){
			$str .= "<a href='".ajaxLink("index.php?action=index&module=Calendar&view=".$this->cal->view."&".$this->cal->get_neighbor_date_str("next"))."'>";

		}else{
			$str .= "<a href='#' onclick='return SUGAR.mySugar.retrieveDashlet(\"".$this->dashlet_id."\", \"index.php?module=Home&action=DynamicAction&DynamicAction=displayDashlet&sugar_body_only=1&".$this->cal->get_neighbor_date_str("next")."&id=".$this->dashlet_id."\")'>";
		}
			$str .= $cal_strings["LBL_NEXT_".strtoupper($this->cal->view)]; 

		$str .= "&nbsp;&nbsp;".SugarThemeRegistry::current()->getImage("calendar_next", 'align="absmiddle" border="0"' ,null,null,'.gif', '') . "</a>"; //setting alt tag blank on purpose for 508 compliance
		return $str;
	}
	
	/**
	 * Get link to previous date range
	 * @return string
	 */
	protected function get_previous_calendar(){
		global $cal_strings,$image_path;
		$str = "";
		if($_REQUEST['module'] == "Calendar"){
			$str .= "<a href='".ajaxLink("index.php?action=index&module=Calendar&view=".$this->cal->view."&".$this->cal->get_neighbor_date_str("previous")."")."'>";
		}else{
			$str .= "<a href='#' onclick='return SUGAR.mySugar.retrieveDashlet(\"".$this->dashlet_id."\", \"index.php?module=Home&action=DynamicAction&DynamicAction=displayDashlet&sugar_body_only=1&".$this->cal->get_neighbor_date_str("previous")."&id=".$this->dashlet_id."\")'>";
		}
		$str .= SugarThemeRegistry::current()->getImage('calendar_previous','align="absmiddle" border="0"', null, null, '.gif', ''); //setting alt tag blank on purpose for 508 compliance
		$str .= "&nbsp;&nbsp;".$cal_strings["LBL_PREVIOUS_".strtoupper($this->cal->view)] . "</a>";
		return $str;
	}

	/**
	 * display header
	 * @param boolean $controls display ui contol elements 
	 */
	public function display_calendar_header($controls = true){
		global $cal_strings;
		
		$ss = new Sugar_Smarty();
		$ss->assign("MOD",$cal_strings);
		$ss->assign("view",$this->cal->view);
		
		if($controls){
			$current_date = str_pad($this->cal->date_time->month,2,'0',STR_PAD_LEFT)."/".str_pad($this->cal->date_time->day,2,'0',STR_PAD_LEFT)."/".$this->cal->date_time->year;
							
			$tabs = array('day', 'week', 'month', 'year', 'shared');
			$tabs_params = array();		
			foreach($tabs as $tab){ 
				$tabs_params[$tab]['title'] = $cal_strings["LBL_".strtoupper($tab)];
				$tabs_params[$tab]['id'] = $tab . "_tab";
				$tabs_params[$tab]['link'] = "window.location.href='".ajaxLink("index.php?module=Calendar&action=index&view=". $tab . $this->cal->date_time->get_date_str())."'";
			}		
			$ss->assign('controls',$controls);
			$ss->assign('tabs',$tabs);
			$ss->assign('tabs_params',$tabs_params);
			$ss->assign('current_date',$current_date);
			$ss->assign('start_weekday',$GLOBALS['current_user']->get_first_day_of_week());
			$ss->assign('cal_img',SugarThemeRegistry::current()->getImageURL("jscalendar.gif",false));		
		}
	
		$ss->assign('previous',$this->get_previous_calendar());
		$ss->assign('next',$this->get_next_calendar());
		
		$ss->assign('date_info',$this->get_date_info($this->cal->view,$this->cal->date_time));
		
		$header = "custom/modules/Calendar/tpls/header.tpl";
		if(!file_exists($header))
			$header = "modules/Calendar/tpls/header.tpl";	
		echo $ss->fetch($header);
	}

	/**
	 * display footer
	 */
	public function display_calendar_footer(){
		global $cal_strings;
		
		$ss = new Sugar_Smarty();
		$ss->assign("MOD",$cal_strings);
		$ss->assign("view",$this->cal->view);	
		
		$ss->assign('previous',$this->get_previous_calendar());
		$ss->assign('next',$this->get_next_calendar());	
		
		$footer = "custom/modules/Calendar/tpls/footer.tpl";
		if(!file_exists($footer))
			$footer = "modules/Calendar/tpls/footer.tpl";	
		echo $ss->fetch($footer);
	}

	/**
	 * display title
	 */
	public function display_title(){
		global $mod_strings;		
		echo get_module_title("Calendar","<span class='pointer'>&raquo;</span>".$mod_strings['LBL_MODULE_TITLE'], false);
	}
	
	/**
	 * display html used in shared view
	 */
	public function display_shared_html(){
			global $app_strings,$cal_strings,$action;			
							
			$ss = new Sugar_Smarty();
			$ss->assign("APP",$app_strings);
			$ss->assign("MOD",$cal_strings);
			$ss->assign("UP",SugarThemeRegistry::current()->getImage('uparrow_big', 'border="0" style="margin-bottom: 1px;"', null, null, '.gif', $app_strings['LBL_SORT']));
			$ss->assign("DOWN",SugarThemeRegistry::current()->getImage('downarrow_big', 'border="0" style="margin-top: 1px;"', null, null, '.gif', $app_strings['LBL_SORT']));
			
			if(empty($_REQUEST['edit_shared'])){
				$ss->assign("style","display: none");
			}
			
			$teams = get_team_array(false);
			array_unshift($teams, '');
			$ss->assign("teams_options",get_select_options_with_id($teams, $this->cal->shared_team_id));
			
			if(!empty($this->cal->shared_team_id)){
				$team = new Team();
				$team->retrieve($this->cal->shared_team_id);
               			$users = $team->get_team_members(true);
				$user_ids = array();
				
				$use_real_names = $GLOBALS['current_user']->getPreference('use_real_names');
				$showLastNameFirst = $GLOBALS['current_user']->showLastNameFirst();			
				foreach($users as $user){
					if($use_real_names){
						if($showLastNameFirst){
							$user_ids[$user->id] = trim($user->last_name . ' ' . $user->first_name);
						}else{
							$user_ids[$user->id] = trim($user->first_name . ' ' . $user->last_name);
						}
					}else{
 	                     			$user_ids[$user->id] = $user->user_name;
					}
				}
				$ss->assign("users_options",get_select_options_with_id($user_ids, $this->cal->shared_ids));
			}else
			$ss->assign("users_options",get_select_options_with_id(get_user_array(false), $this->cal->shared_ids));
			
			$tpl = "modules/Calendar/tpls/shared_users.tpl";	
			echo $ss->fetch($tpl);
	}	
	
}

?>

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


require_once('include/EditView/QuickCreate.php');



class CallsQuickCreate extends QuickCreate {

    var $javascript;

    function process() {
        global $current_user, $timedate, $app_list_strings, $current_language, $mod_strings;
        $mod_strings = return_module_language($current_language, 'Calls');

        parent::process();

		$this->ss->assign("TIME_FORMAT", '('. $timedate->get_user_time_format().')');
		$this->ss->assign("USER_DATEFORMAT", '('. $timedate->get_user_date_format().')');
		$this->ss->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());


        if($this->viaAJAX) { // override for ajax call
            $this->ss->assign('saveOnclick', "onclick='if(check_form(\"callsQuickCreate\")) return SUGAR.subpanelUtils.inlineSave(this.form.id, \"activities\"); else return false;'");
            $this->ss->assign('cancelOnclick', "onclick='return SUGAR.subpanelUtils.cancelCreate(\"subpanel_activities\")';");
        }

        $this->ss->assign('viaAJAX', $this->viaAJAX);

        $this->javascript = new javascript();
        $this->javascript->setFormName('callsQuickCreate');

        $focus = new Call();
        $this->javascript->setSugarBean($focus);
        $this->javascript->addAllFields('');

		if (is_null($focus->date_start))
			$focus->date_start = $timedate->nowDate();
		if (is_null($focus->time_start))
			$focus->time_start = $timedate->asUserTime($timedate->getNow(), true);
		if (!isset ($focus->duration_hours))
			$focus->duration_hours = "1";

		$this->ss->assign("DATE_START", $focus->date_start);
		$this->ss->assign("TIME_START", substr($focus->time_start,0,5));
		$time_start_hour = intval(substr($focus->time_start, 0, 2));
		$time_start_minutes = substr($focus->time_start, 3, 5);

		if ($time_start_minutes > 0 && $time_start_minutes < 15) {
			$time_start_minutes = "15";
		} else
			if ($time_start_minutes > 15 && $time_start_minutes < 30) {
				$time_start_minutes = "30";
			} else
				if ($time_start_minutes > 30 && $time_start_minutes < 45) {
					$time_start_minutes = "45";
				} else
					if ($time_start_minutes > 45) {
						$time_start_hour += 1;
						$time_start_minutes = "00";
					}


		// We default the to assume that the time preference is set to 11:00 (i.e. without meridiem)
		$hours_arr = array ();
		$num_of_hours = 24;
		$start_at = 0;

		$time_pref = $timedate->get_time_format();
		if(strpos($time_pref, 'a') || strpos($time_pref, 'A')) {
		   $num_of_hours = 13;
		   $start_at = 1;

           // It's important to do this block first before we recalculate $time_start_hour
		   $options = strpos($time_pref, 'a') ? $app_list_strings['dom_meridiem_lowercase'] : $app_list_strings['dom_meridiem_uppercase'];
           if(strpos($time_pref, 'a')) {
              $this->ss->assign("TIME_MERIDIEM", get_select_options_with_id($options, strpos($focus->time_start,'a') ? 'am' : 'pm'));
           } else {
           	  $this->ss->assign("TIME_MERIDIEM", get_select_options_with_id($options, strpos($focus->time_start,'A') ? 'AM' : 'PM'));
           }

		   // the $num_of_hours array is keyed by values 01, 02, ... 12 for meridiem times
		   $time_start_hour = $time_start_hour < 10 ? '0'.$time_start_hour : $time_start_hour;
		}

		for ($i = $start_at; $i < $num_of_hours; $i ++) {
			$i = $i."";
			if (strlen($i) == 1) {
				$i = "0".$i;
			}
			$hours_arr[$i] = $i;
		}

        $this->ss->assign("TIME_START_HOUR_OPTIONS", get_select_options_with_id($hours_arr, $time_start_hour));
		$this->ss->assign("TIME_START_MINUTE_OPTIONS", get_select_options_with_id($focus->minutes_values, $time_start_minutes));

		$this->ss->assign("DURATION_HOURS", $focus->duration_hours);
		$this->ss->assign("DURATION_MINUTES_OPTIONS", get_select_options_with_id($focus->minutes_values, $focus->duration_minutes));

		$focus->direction = (isset ($app_list_strings['call_direction_dom']['Outbound']) ? 'Outbound' : $focus->direction);
		$focus->status = (isset ($app_list_strings['call_status_dom']['Planned']) ? 'Outbound' : $focus->status);

		$this->ss->assign("DIRECTION_OPTIONS", get_select_options_with_id($app_list_strings['call_direction_dom'], $focus->direction));
		$this->ss->assign("STATUS_OPTIONS", get_select_options_with_id($app_list_strings['call_status_dom'], $focus->status));

        $this->ss->assign('additionalScripts', $this->javascript->getScript(false));
    }
}
?>
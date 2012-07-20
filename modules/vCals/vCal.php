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

 * Description:
 ********************************************************************************/






require_once('modules/Calendar/Calendar.php');

class vCal extends SugarBean {
	// Stored fields
	var $id;
	var $date_modified;
	var $user_id;
	var $content;
	var $deleted;
	var $type;
	var $source;
	var $module_dir = "vCals";
	var $table_name = "vcals";

	var $object_name = "vCal";

	var $new_schema = true;

	var $field_defs = array(
	);

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	const UTC_FORMAT = 'Ymd\THi00\Z';

	function vCal()
	{

		parent::SugarBean();
		$this->disable_row_level_security = true;
	}

	function get_summary_text()
	{
		return "";
	}


	function fill_in_additional_list_fields()
	{
	}

	function fill_in_additional_detail_fields()
	{
	}

	function get_list_view_data()
	{
	}

        // combines all freebusy vcals and returns just the FREEBUSY lines as a string
	function get_freebusy_lines_cache(&$user_bean)
	{
		$str = '';
		// First, get the list of IDs.
		$query = "SELECT id from vcals where user_id='{$user_bean->id}' AND type='vfb' AND deleted=0";
		$vcal_arr = $this->build_related_list($query, new vCal());

		foreach ($vcal_arr as $focus)
		{
			if (empty($focus->content))
			{
				return '';
			}

			$lines = explode("\n",$focus->content);

			foreach ($lines as $line)
			{
				if ( preg_match('/^FREEBUSY[;:]/i',$line))
				{
					$str .= "$line\n";
				}
			}
		}

		return $str;
	}

	// query and create the FREEBUSY lines for SugarCRM Meetings and Calls and
        // return the string
	function create_sugar_freebusy($user_bean, $start_date_time, $end_date_time)
	{
		$str = '';
		global $DO_USER_TIME_OFFSET,$timedate;

		$DO_USER_TIME_OFFSET = true;
		// get activities.. queries Meetings and Calls
		$acts_arr =
		CalendarActivity::get_activities($user_bean->id,
			array("show_calls" => true),
			$start_date_time,
			$end_date_time,
			'freebusy');

		// loop thru each activity, get start/end time in UTC, and return FREEBUSY strings
		foreach($acts_arr as $act)
		{
			$startTimeUTC = $act->start_time->format(self::UTC_FORMAT);
			$endTimeUTC = $act->end_time->format(self::UTC_FORMAT);

			$str .= "FREEBUSY:". $startTimeUTC ."/". $endTimeUTC."\n";
		}
		return $str;

	}

        // return a freebusy vcal string
        function get_vcal_freebusy($user_focus,$cached=true)
        {
           global $locale, $timedate;
           $str = "BEGIN:VCALENDAR\n";
           $str .= "VERSION:2.0\n";
           $str .= "PRODID:-//SugarCRM//SugarCRM Calendar//EN\n";
           $str .= "BEGIN:VFREEBUSY\n";

           $name = $locale->getLocaleFormattedName($user_focus->first_name, $user_focus->last_name);
           $email = $user_focus->email1;

           // get current date for the user
           $now_date_time = $timedate->getNow(true);

           // get start date ( 1 day ago )
           $start_date_time = $now_date_time->get("yesterday");

           // get date 2 months from start date
			global $sugar_config;
			$timeOffset = 2;
            if (isset($sugar_config['vcal_time']) && $sugar_config['vcal_time'] != 0 && $sugar_config['vcal_time'] < 13)
			{
				$timeOffset = $sugar_config['vcal_time'];
			}
           $end_date_time = $start_date_time->get("+$timeOffset months");

           // get UTC time format
           $utc_start_time = $start_date_time->asDb();
           $utc_end_time = $end_date_time->asDb();
           $utc_now_time = $now_date_time->asDb();

           $str .= "ORGANIZER;CN=$name:$email\n";
           $str .= "DTSTART:$utc_start_time\n";
           $str .= "DTEND:$utc_end_time\n";

           // now insert the freebusy lines
           // retrieve cached freebusy lines from vcals
		   if ($timeOffset != 0)
		   {
           if ($cached == true)
           {
             $str .= $this->get_freebusy_lines_cache($user_focus);
           }
           // generate freebusy from Meetings and Calls
           else
           {
               $str .= $this->create_sugar_freebusy($user_focus,$start_date_time,$end_date_time);
			}
           }

           // UID:20030724T213406Z-10358-1000-1-12@phoenix
           $str .= "DTSTAMP:$utc_now_time\n";
           $str .= "END:VFREEBUSY\n";
           $str .= "END:VCALENDAR\n";
           return $str;

	}

	// static function:
        // cache vcals
        function cache_sugar_vcal(&$user_focus)
        {
            vCal::cache_sugar_vcal_freebusy($user_focus);
        }

	// static function:
        // caches vcal for Activities in Sugar database
        function cache_sugar_vcal_freebusy(&$user_focus)
        {
            $focus = new vCal();
            // set freebusy members and save
            $arr = array('user_id'=>$user_focus->id,'type'=>'vfb','source'=>'sugar');
            $focus->retrieve_by_string_fields($arr);


            $focus->content = $focus->get_vcal_freebusy($user_focus,false);
            $focus->type = 'vfb';
            $focus->date_modified = null;
            $focus->source = 'sugar';
            $focus->user_id = $user_focus->id;
            $focus->save();
        }


}

?>

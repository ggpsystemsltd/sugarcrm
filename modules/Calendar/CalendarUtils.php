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




/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 9/29/11
 * Time: 11:55 AM
 * To change this template use File | Settings | File Templates.
 */

class CalendarUtils {

	/**
	 * Find first day of week according to user's settings
	 * @param SugarDateTime $date 
	 * @return SugarDateTime $date
	 */
	static function get_first_day_of_week(SugarDateTime $date){
		$fdow = $GLOBALS['current_user']->get_first_day_of_week();
		if($date->day_of_week < $fdow)
				$date = $date->get('-7 days');			
		return $date->get_day_by_index_this_week($fdow);
	}
	
	
	/**
	 * Get list of needed fields for modules
	 * @return array
	 */
	static function get_fields(){
		return array(
			'Meetings' => array(
				'name',
				'date_start',
				'duration_hours',
				'duration_minutes',
				'status',
				'description',
				'parent_type',
				'parent_name',
				'parent_id',
			),
			'Calls' => array(
				'name',
				'date_start',
				'duration_hours',
				'duration_minutes',
				'status',
				'description',
				'parent_type',
				'parent_name',
				'parent_id',
			),
			'Tasks' => array(
				'name',
				'date_start',
				'date_due',
				'status',
				'description',
				'parent_type',
				'parent_name',
				'parent_id',
			),
		);
	}
	
	/**
	 * Get array of needed time data
	 * @param SugarBean $bean 
	 * @return array
	 */
	static function get_time_data($bean){
					$arr = array();
					
					$date_field = "date_start";								
					if($bean->object_name == 'Task')
						$date_field = "date_due";
					
					$timestamp = SugarDateTime::createFromFormat($GLOBALS['timedate']->get_date_time_format(),$bean->$date_field,new DateTimeZone('UTC'))->format('U');				
					$arr['timestamp'] = $timestamp;
					$arr['time_start'] = $GLOBALS['timedate']->fromTimestamp($arr['timestamp'])->format($GLOBALS['timedate']->get_time_format());

					
					return $arr;
	}
}

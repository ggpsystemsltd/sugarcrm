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

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/





class ForecastSchedule extends SugarBean {

	var $id;
	var $timeperiod_id;
	var $user_id;
	var $cascade_hierarchy;
	var $forecast_start_date;
	var $status;
	var $timeperiod_name;
	var $user_name;
	var $cascade_hierarchy_checked;
	var $created_by;
	var $date_entered;
	var $date_modified;

	var $module_dir = 'ForecastSchedule';
	var $object_name = "ForecastSchedule";
	var $current_user;
	var $table_name = "forecast_schedule";

	var $encodeFields = Array();

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	

	var $new_schema = true;

	function ForecastSchedule() {
		parent::SugarBean();
		$this->setupCustomFields('ForecastSchedule');  //parameter is module name
		$this->disable_row_level_security =true;
	}

	function save($check_notify = false){
		parent::save($check_notify);		
	}


	function get_summary_text()
	{
		return "$this->timeperiod_name";
	}

	
	function retrieve($id, $encode=false,$deleted=true){
		$ret = parent::retrieve($id, $encode,$deleted);	
		return $ret;
	}

	function is_authenticated()
	{
		return $this->authenticated;
	}

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields()
	{
		global $locale;
		//get user name;
		$query = "SELECT first_name, last_name from users where id = '$this->user_id'";
		$result = $this->db->query($query,true,"Error fetching user name:");
		
		$row = $this->db->fetchByAssoc($result);
		if ($row != null) {	
			$this->user_name = $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
		}
		
		//get timeperiod name.=
		$query = "SELECT name,start_date,end_date from timeperiods where id = '$this->timeperiod_id'";
		$result = $this->db->query($query,true,"Error fetching timeperiod name:");
		
		$row = $this->db->fetchByAssoc($result);
		if ($row != null) {	
			$this->timeperiod_name = $row['name'];
		}
	}

	function get_list_view_data(){
		$schedule_fields = $this->get_list_view_array();
	
		$schedule_fields['USER_NAME'] = $this->user_name;		
		
		if ($schedule_fields['CASCADE_HIERARCHY']== 1 )
			$schedule_fields['CASCADE_HIERARCHY_CHECKED'] = "checked";
			  
		return $schedule_fields;
	}

	function list_view_parse_additional_sections(&$list_form, $xTemplateSection){
		return $list_form;
	}

	function create_export_query($order_by, $where)
	{
		$query = "SELECT
				forecast_schedule.*";
		$query .= " FROM forecast_schedule ";

		$where_auto = " forecast_schedule.deleted = 0";

		if($where != "")
			$query .= " WHERE $where AND " . $where_auto;
		else
			$query .= " WHERE " . $where_auto;

		if($order_by != "")
			$query .= " ORDER BY $order_by";
		else
			$query .= " ORDER BY forecast_schedule.forecast_start_date";

		return $query;
	}
	
	/**
	* This function returns a full (ie non-paged) list of the current object type.
	* Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	* All Rights Reserved..
	* Contributor(s): ______________________________________..
	*/
	function get_full_list($order_by = "", $where = "", $check_dates=false) {
		$GLOBALS['log']->debug("get_full_list:  order_by = '$order_by' and where = '$where'");
		$query = $this->create_new_list_query($order_by, $where);
		return $this->process_full_list_query($query, $check_dates);
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL':return true;
		}
		return false;
	}
}
?>
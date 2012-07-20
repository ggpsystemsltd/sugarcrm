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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/


/**
 * Polymorphic buckets - place any item in a report_cache
 */
class ReportCache {

	// public attributes
	public $id;
	public $contents;
	public $contents_array;
	public $new_with_id = false;
	public $date_modified;
	public $report_options;
	public $report_options_array;

	private $assigned_user_id;
	private $date_entered;
	private $deleted;
	private $db;

	/**
	 * Sole constructor
	 */
	public function __construct() {
		$this->db = DBManagerFactory::getInstance();
	}

	/**
	 * Flags a report_cache as deleted
	 * @return bool True on success
	 */
	public function delete() {
	    global $timedate;
		if(!empty($this->id)) {
			$q = "UPDATE report_cache SET deleted = '1', date_modified = '{$timedate->nowDb()}' WHERE id = '{$this->id}' AND assigned_user_id = '{$this->assign_user_id}'";
			$r = $this->db->query($q);
			return true;
		} // if
		return false;
	}

	/**
	 * Saves report_cache
	 * @return bool
	 */
	public function save() {

		global $current_user, $timedate;

		if($this->new_with_id == true) {
			$q = "INSERT INTO report_cache(id, assigned_user_id, contents, date_entered, date_modified, deleted)".
				" VALUES('{$this->id}', '{$current_user->id}', '{$this->db->quote($this->contents)}', '{$timedate->nowDb()}', '{$timedate->nowDb()}', '0')";
		} else {
			$q = "UPDATE report_cache SET contents = '{$this->db->quote($this->contents)}', date_modified = '{$timedate->nowDb()}' WHERE id = '{$this->id}' AND assigned_user_id = '{$this->assigned_user_id}'";
		} // if

		$this->db->query($q, true);
		return true;
	}

	/**
	 * This updates the date_modified value only. This is a special update function
	 *
	 * @return bool
	 */

	public function update() {

		global $current_user, $timedate;

		$q = "UPDATE report_cache SET date_modified = '{$timedate->nowDb()}' WHERE id = '{$this->id}' AND assigned_user_id = '{$this->assigned_user_id}'";

		$this->db->query($q, true);
		return true;

	} // fn

	/**
	 * This updates the report_options value only. This is a special update function
	 *
	 * @return bool
	 */

	public function updateReportOptions($reportOptions) {
		global $global_json, $current_user, $timedate;
		if (empty($this->report_options_array)) {
			$this->report_options_array = array();
		}
		foreach($reportOptions as $key => $value) {
			$this->report_options_array[$key] = $value;
		} // foreach

		$reportOptionsEncodedData = $global_json->encode($this->report_options_array);
		if($this->new_with_id == true) {
			$q = "INSERT INTO report_cache(id, assigned_user_id, report_options, date_entered, date_modified, deleted)".
				" VALUES('{$this->id}', '{$current_user->id}', '{$this->db->quote($reportOptionsEncodedData)}', '{$timedate->nowDb()}', '{$timedate->nowDb()}', '0')";
		} else {
		$q = "UPDATE report_cache SET report_options = '{$this->db->quote($reportOptionsEncodedData)}' WHERE id = '{$this->id}' AND assigned_user_id = '{$this->assigned_user_id}'";
		}

		$this->db->query($q, true);
		return true;

	} // fn

	/**
	 * Retrieves and populates object
	 * @param string $reportId ID of report
	 * @param string $assigned_user_id ID of user
	 * @return bool True on success
	 */
	public function retrieve($reportId, $assigned_user_id='') {

		global $timedate, $current_user, $global_json;
		if (empty($assigned_user_id)) {
			$assigned_user_id = $current_user->id;
		} // if
		$q = "SELECT * FROM report_cache WHERE id = '{$reportId}' AND assigned_user_id = '{$assigned_user_id}' AND deleted = '0'";
		$r = $this->db->query($q);
		$a = $this->db->fetchByAssoc($r);

		if(!empty($a)) {
			foreach($a as $k => $v) {
				$this->$k = $v;
			}
			$this->date_entered	= $timedate->to_display_date_time($this->date_entered);
			$this->date_modified = $timedate->to_display_date_time($this->date_modified);
			$this->contents_array = $global_json->decode(from_html($this->contents));
			$this->report_options_array = $global_json->decode(from_html($this->report_options));
			return true;
		}

		return false;
	}
} // end class def
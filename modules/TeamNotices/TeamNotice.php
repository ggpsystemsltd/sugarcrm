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

 * Description:  TODO: To be written.
 ********************************************************************************/







// ProductType is used to store customer information.
class TeamNotice extends SugarBean {
	var $field_name_map = array();
	// Stored fields
	var $id;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $date_start;
	var $date_end;
	var $name;
	var $status;
	var $description;
	var $team_id;
	var $url;
	var $url_title;
	var $team_name;
	var $team_set_name;

	var $table_name = "team_notices";
	var $module_dir = 'TeamNotices';
	var $object_name = "TeamNotices";

	var $new_schema = true;

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	function TeamNotice() {
		parent::SugarBean();
		foreach ($this->field_defs as $field) {
			$this->field_name_map[$field['name']] = $field;
		}		
		
		$this->team_id = 1; // make the item globally accessible
	}

	function save_relationship_changes($is_update)
    {

    }

	function fill_in_additional_list_fields()
	{
		global $mod_strings, $current_language;
		$mod_strings = return_module_language($current_language, 'TeamNotices');
		if(isset($this->description)){
			$this->description = str_replace("\r\n", "<br>", $this->description);
			$this->description = str_replace("\n", "<br>", $this->description);
		}
		if(isset($this->url) && !empty($this->url)){
			$this->url = add_http($this->url);
			if(!isset($this->url_title) || empty($this->url_title)){
				$this->url_title = $this->url;
			}
		}
		$this->assigned_name = get_assigned_team_name($this->team_id);
		$this->status = ( isset($mod_strings['dom_status'][$this->status]) ? $mod_strings['dom_status'][$this->status] : '');
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields()
	{
		$this->assigned_name = get_assigned_team_name($this->team_id);
	}

	function get_list_view_data(){
        global $mod_strings;
	  $temp_array = $this->get_list_view_array();
      $temp_array['ENCODED_NAME']=$this->name;
      $this->load_relationship('teams');
      require_once('modules/Teams/TeamSetManager.php');
      $teams = TeamSetManager::getTeamsFromSet($this->team_set_id);
      
      if(count($teams) > 1) {
      	 $temp_array['TEAM_NAME'] .= "<span id='div_{$this->id}_teams'>
						<a href=\"#\" onMouseOver=\"javascript:toggleMore('div_{$this->id}_teams','img_{$this->id}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$this->team_set_id}&team_id={$this->team_id}');\"  onFocus=\"javascript:toggleMore('div_{$this->id}_teams','img_{$this->id}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$this->team_set_id}');\" id='more_feather' class=\"utilsLink\">
					    ".SugarThemeRegistry::current()->getImage('MoreDetail', "style='padding: 0px 0px 0px 0px' border='0'", 8, 7, ".png", $mod_strings['LBL_MORE_DETAIL'])."
						</a>
						</span>";
      }
      return $temp_array;

	}
	/**
		builds a generic search based on the query string using or
		do not include any $this-> because this is called on without having the class instantiated
	*/
	function build_generic_where_clause ($the_query_string) {
	$where_clauses = Array();
	$the_query_string = $this->db->quote($the_query_string);
	array_push($where_clauses, "name like '$the_query_string%'");

	$the_where = "";
	foreach($where_clauses as $clause)
	{
		if($the_where != "") $the_where .= " or ";
		$the_where .= $clause;
	}


	return $the_where;
}


}

?>
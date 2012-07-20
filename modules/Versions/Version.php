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










class Version extends SugarBean {
	// Stored fields
	var $id;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $field_name_map;
	var $name;
	var $file_version;
	var $db_version;
	var $table_name = 'versions';
	var $module_dir = 'Versions';
	var $object_name = "Version";

	var $new_schema = true;

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	function Version() {
		parent::SugarBean();
		$this->team_id = 1; // make the item globally accessible
		$this->disable_row_level_security = true;
	}

	


	
	/**
		builds a generic search based on the query string using or
		do not include any $this-> because this is called on without having the class instantiated
	*/
	function build_generic_where_clause ($the_query_string) {
	$where_clauses = Array();
	$the_query_string = addslashes($the_query_string);
	array_push($where_clauses, "name like '$the_query_string%'");
	$the_where = "";
	foreach($where_clauses as $clause)
	{
		if($the_where != "") $the_where .= " or ";
		$the_where .= $clause;
	}


	return $the_where;
}


function is_expected_version($expected_version){
	foreach($expected_version as $name=>$val){
		if($this->$name != $val){
			return false;	
		}	
	}
	return true;
		
}
/**
 * Updates the version info based on the information provided
 */
function mark_upgraded($name, $dbVersion, $fileVersion){
	$query = "DELETE FROM versions WHERE name='$name'";
	$GLOBALS['db']->query($query);
	$version = new Version();
	$version->name = $name;
	$version->file_version = $fileVersion;
	$version->db_version = $dbVersion;
	$version->save();
	
	if(isset($_SESSION['invalid_versions'][$name])) {
		unset($_SESSION['invalid_versions'][$name]);
	}
}

function get_profile(){
	return array('name'=> $this->name, 'file_version'=> $this->file_version, 'db_version'=>$this->db_version);	
}






}

?>
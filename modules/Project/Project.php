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


class Project extends SugarBean {
	// database table columns
	var $id;
	var $date_entered;
	var $date_modified;
	var $assigned_user_id;
	var $modified_user_id;
	var $created_by;
	var $team_id;
	var $name;
	var $description;
	var $deleted;

	var $is_template;

	// related information
	var $assigned_user_name;
	var $modified_by_name;
	var $created_by_name;
	var $team_name;

	var $account_id;
	var $contact_id;
	var $opportunity_id;
	var $quote_id;
	var $email_id;
    var $estimated_start_date;

	// calculated information
	var $total_estimated_effort;
	var $total_actual_effort;

	var $object_name = 'Project';
	var $module_dir = 'Project';
	var $new_schema = true;
	var $table_name = 'project';

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = array(
		'account_id',
		'contact_id',
		'quote_id',
		'opportunity_id',
	);

	var $relationship_fields = array(
		'account_id' => 'accounts',
		'contact_id'=>'contacts',
		'quote_id'=>'quotes',
		'opportunity_id'=>'opportunities',
		'email_id' => 'emails',
		'holiday_id' => 'holidays',
	);

	//////////////////////////////////////////////////////////////////
	// METHODS
	//////////////////////////////////////////////////////////////////

	/**
	 *
	 */
	function Project()
	{
		parent::SugarBean();
	}

	/**
	 * overriding the base class function to do a join with users table
	 */

	/**
	 *
	 */
	function fill_in_additional_detail_fields()
	{
	    parent::fill_in_additional_detail_fields();

		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = get_assigned_team_name($this->team_id);
		//$this->total_estimated_effort = $this->_get_total_estimated_effort($this->id);
		//$this->total_actual_effort = $this->_get_total_actual_effort($this->id);
	}

	/**
	 *
	 */
	function fill_in_additional_list_fields()
	{
	    parent::fill_in_additional_list_fields();
		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = get_assigned_team_name($this->team_id);
		//$this->total_estimated_effort = $this->_get_total_estimated_effort($this->id);
		//$this->total_actual_effort = $this->_get_total_actual_effort($this->id);
	}

    /**
    * Save changes that have been made to a relationship.
    *
    * @param $is_update true if this save is an update.
    */
    function save_relationship_changes($is_update, $exclude=array())
    {
        parent::save_relationship_changes($is_update, $exclude);
        $new_rel_id = false;
        $new_rel_link = false;
        //this allows us to dynamically relate modules without adding it to the relationship_fields array
        if(!empty($_REQUEST['relate_id']) && !in_array($_REQUEST['relate_to'], $exclude) && $_REQUEST['relate_id'] != $this->id){
            $new_rel_id = $_REQUEST['relate_id'];
            $new_rel_relname = $_REQUEST['relate_to'];
            if(!empty($this->in_workflow) && !empty($this->not_use_rel_in_req)) {
                $new_rel_id = $this->new_rel_id;
                $new_rel_relname = $this->new_rel_relname;
            }
            $new_rel_link = $new_rel_relname;
            //Try to find the link in this bean based on the relationship
            foreach ( $this->field_defs as $key => $def ) {
                if (isset($def['type']) && $def['type'] == 'link'
                && isset($def['relationship']) && $def['relationship'] == $new_rel_relname) {
                    $new_rel_link = $key;
                }
            }
            if ($new_rel_link == 'contacts') {
                $accountId = $this->db->getOne('SELECT account_id FROM accounts_contacts WHERE contact_id=' . $this->db->quoted($new_rel_id));
                if ($accountId !== false) {
                    if($this->load_relationship('accounts')){
                        $this->accounts->add($accountId);
                    }
                }
            }
        }
    }
	/**
	 *
	 */
	function _get_total_estimated_effort($project_id)
	{
		$return_value = '';

		$query = 'SELECT SUM('.$this->db->convert('estimated_effort', "IFNULL", 0).') total_estimated_effort';
		$query.= ' FROM project_task';
		$query.= " WHERE parent_id='{$project_id}' AND deleted=0";

		$result = $this->db->query($query,true," Error filling in additional detail fields: ");
		$row = $this->db->fetchByAssoc($result);
		if($row != null)
		{
			$return_value = $row['total_estimated_effort'];
		}

		return $return_value;
	}

	/**
	 *
	 */
	function _get_total_actual_effort($project_id)
	{
		$return_value = '';

		$query = 'SELECT SUM('.$this->db->convert('actual_effort', "IFNULL", 0).') total_actual_effort';
		$query.=  ' FROM project_task';
		$query.=  " WHERE parent_id='{$project_id}' AND deleted=0";

		$result = $this->db->query($query,true," Error filling in additional detail fields: ");
		$row = $this->db->fetchByAssoc($result);
		if($row != null)
		{
			$return_value = $row['total_actual_effort'];
		}

		return $return_value;
	}

	/**
	 *
	 */
	function get_summary_text()
	{
		return $this->name;
	}

	/**
	 *
	 */
	function build_generic_where_clause ($the_query_string)
	{
		$where_clauses = array();
		$the_query_string = $GLOBALS['db']->quote($the_query_string);
		array_push($where_clauses, "project.name LIKE '%$the_query_string%'");

		$the_where = '';
		foreach($where_clauses as $clause)
		{
			if($the_where != '') $the_where .= " OR ";
			$the_where .= $clause;
		}

		return $the_where;
	}

	function get_list_view_data()
	{
		$field_list = $this->get_list_view_array();
		$field_list['USER_NAME'] = empty($this->user_name) ? '' : $this->user_name;
		$field_list['ASSIGNED_USER_NAME'] = $this->assigned_user_name;
		return $field_list;
	}
	  function bean_implements($interface){
		switch($interface){
			case 'ACL':return true;
		}
		return false;
	}

    function create_export_query(&$order_by, &$where, $relate_link_join='')
    {
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
		if($custom_join)
				$custom_join['join'] .= $relate_link_join;
		$query = "SELECT
				project.*,
                users.user_name as assigned_user_name ";
        $query .= ", teams.name AS team_name ";
        if($custom_join){
			$query .=  $custom_join['select'];
		}
        $query .= " FROM project ";

		// We need to confirm that the user is a member of the team of the item.
		$this->add_team_security_where_clause($query);
		if($custom_join){
			$query .=  $custom_join['join'];
		}
        $query .= " LEFT JOIN users
                   	ON project.assigned_user_id=users.id ";
        $query .= getTeamSetNameJoin('project');

        $where_auto = " project.deleted=0 ";

        if($where != "")
        	$query .= "where ($where) AND ".$where_auto;
        else
            $query .= "where ".$where_auto;

        if(!empty($order_by)){
           	//check to see if order by variable already has table name by looking for dot "."
           	$table_defined_already = strpos($order_by, ".");

	        if($table_defined_already === false){
	        	//table not defined yet, define accounts to avoid "ambigous column" SQL error
	        	$query .= " ORDER BY $order_by";
	        }else{
	        	//table already defined, just add it to end of query
	            $query .= " ORDER BY $order_by";
	        }
        }
        return $query;
    }
	function getProjectHolidays()
	{
	    $firstName = $this->db->convert($this->db->convert('users.first_name', "IFNULL", array('contacts.first_name')), "IFNULL", array("''"));
	    $lastName = array("' '", $this->db->convert($this->db->convert('users.last_name', "IFNULL", array('contacts.last_name')), "IFNULL", array("''")));
	    $resource_select = "LTRIM(RTRIM(" . $this->db->convert($firstName, "CONCAT", $lastName) . "))";

	    $query = "SELECT holidays.id, holidays.holiday_date, holidays.description as description, "
				. $resource_select . " as resource_name " .
				" FROM holidays LEFT JOIN users on users.id = holidays.person_id" .
				" LEFT JOIN contacts on contacts.id = holidays.person_id" .
				" WHERE related_module_id = '".$this->id."'" .
				" AND holidays.related_module like 'Project'" .
				" AND holidays.deleted = 0";
		return $query;
	}

	function isTemplate(){
		if (!empty( $this->is_template) && $this->is_template=='1')
			return true;
		else
			return false;
	}
	function getAllProjectTasks(){
		$projectTasks = array();

		$query = "SELECT * FROM project_task WHERE project_id = '" . $this->id. "' AND deleted = 0 ORDER BY project_task_id";
		$result = $this->db->query($query,true,"Error retrieving project tasks");
		$row = $this->db->fetchByAssoc($result);

		while ($row != null){
			$projectTaskBean = new ProjectTask();
			$projectTaskBean->id = $row['id'];
			$projectTaskBean->retrieve();
			array_push($projectTasks, $projectTaskBean);

			$row = $this->db->fetchByAssoc($result);
		}

		return $projectTasks;
	}
	/* helper function for UserHoliday subpanel -- display javascript that cannot be achieved through AJAX call */
	function resourceSelectJS(){
       	$userBean = new User();
    	$contactBean = new Contact();

    	$this->load_relationship("user_resources");
    	$userResources = $this->user_resources->getBeans($userBean);
    	$this->load_relationship("contact_resources");
    	$contactResources = $this->contact_resources->getBeans($contactBean);

		ksort($userResources);
		ksort($contactResources);

		$userResourceOptions = "";
		$contactResourceOptions = "";

		$i=0;
		$userResourceArr = "var userResourceArr = document.getElementById('person_id').options;\n";
		foreach($userResources as $userResource){
			$userResourceOptions .= "var userResource$i = new Option('$userResource->full_name', '$userResource->id');\n";
			$userResourceOptions .= "userResourceArr[userResourceArr.length] = userResource$i;\n";
			$i = $i+1;
		}

		$i=0;
		$contactResourceArr = "var contactResourceArr = document.getElementById('person_id').options;\n";
		foreach($contactResources as $contactResource){
			$contactResourceOptions .= "var contactResource$i = new Option('$contactResource->full_name', '$contactResource->id');\n";
			$contactResourceOptions .= "contactResourceArr[contactResourceArr.length] = contactResource$i;\n";
			$i = $i+1;
		}

		return "
function showResourceSelect(){
	if (document.getElementById('person_type').value=='Users') {
		constructUserSelect();
	}
	else if (document.getElementById('person_type').value=='Contacts') {
		constructContactSelect();
	}
	else{
		if (document.getElementById('person_id') != null){
			document.getElementById('resourceSelect').removeChild(document.getElementById('person_id'));
		}
	}
}
function constructSelect(){
	document.getElementById('resourceSelector').innerHTML = '<select id=\"person_id\" name=\"person_id\"></select>'
}

function constructUserSelect(){
	if (document.getElementById('person_id') != null){
		document.getElementById('resourceSelector').removeChild(document.getElementById('person_id'));
	}

	constructSelect();
	$userResourceArr
	$userResourceOptions
}

function constructContactSelect(){
	if (document.getElementById('person_id') != null){
		document.getElementById('resourceSelector').removeChild(document.getElementById('person_id'));
	}

	constructSelect();
	$contactResourceArr
	$contactResourceOptions
}
";
	}
}
?>

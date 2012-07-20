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













class ProjectTask extends SugarBean {
	// database table columns
	var $id;
	var $date_entered;
	var $date_modified;
	//var $assigned_user_id;
	//var $modified_user_id;
	//var $created_by;
	var $team_id;
	var $name;
    var $description;
    var $project_id;
    var $project_task_id;
    var $date_start;
    var $date_finish;
    var $duration;
    var $duration_unit;
    var $percent_complete;
    var $parent_task_id;
    var $predecessors;
    var $resource_id;
    var $resource_name;
    var $priority;

	// related information
	var $assigned_user_name;
	var $parent_name;
	var $depends_on_name;
	var $email_id;
	var $team_name;

	var $table_name = 'project_task';
	var $object_name = 'ProjectTask';
	var $module_dir = 'ProjectTask';

	var $field_name_map;
	var $new_schema = true;

	var $relationship_fields = array(
		'email_id' => 'emails',
	);

	
	//////////////////////////////////////////////////////////////////
	// METHODS
	//////////////////////////////////////////////////////////////////

	/*
	 *
	 */
	function ProjectTask($init=true)
	{
		parent::SugarBean();
		if ($init) {
			// default value for a clean instantiation
			$this->utilization = 100;

			global $current_user;
			if(empty($current_user))
			{
				$this->assigned_user_id = 1;
				$admin_user = new User();
				$admin_user->retrieve($this->assigned_user_id);
				$this->assigned_user_name = $admin_user->user_name;
			}
			else
			{
				$this->assigned_user_id = $current_user->id;
				$this->assigned_user_name = $current_user->user_name;
			}

			global $current_user;
			if(!empty($current_user)) {
				$this->team_id = $current_user->default_team;	//default_team is a team id
			} else {
				$this->team_id = 1; // make the item globally accessible
			}
		}
	}

	function save($check_notify = FALSE)
	{
		//Bug 46012.  When saving new Project Tasks instance in a workflow, make sure we set a project_task_id value
		//associated with the Project if there is no project_task_id specified.
        if ($this->in_workflow && empty($this->id) && empty($this->project_task_id) && !empty($this->project_id))
        {
            $this->project_task_id = $this->getNumberOfTasksInProject($this->project_id) + 1;
        }
        
        $id = parent::save($check_notify);
        $this->updateParentProjectTaskPercentage();
        return $id;
	}

	/**
	 * overriding the base class function to do a join with users table
	 */

	/*
	 *
	 */
   function fill_in_additional_detail_fields()
   {
      $this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = get_assigned_team_name($this->team_id);
        $this->resource_name = $this->getResourceName();
      $this->project_name = $this->_get_project_name($this->project_id);
		/*
        $this->depends_on_name = $this->_get_depends_on_name($this->depends_on_id);
		if(empty($this->depends_on_name))
		{
			$this->depends_on_id = '';
		}
		$this->parent_name = $this->_get_parent_name($this->parent_id);
		if(empty($this->parent_name))
		{
			$this->parent_id = '';
		}
        */
   }

	/*
	 *
	 */
   function fill_in_additional_list_fields()
   {
      $this->resource_name = $this->getResourceName();
      $this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
      //$this->parent_name = $this->_get_parent_name($this->parent_id);
      $this->project_name = $this->_get_project_name($this->project_id);
   }

	/*
	 *
	 */
	function get_summary_text()
	{
		return $this->name;
	}

	/*
	 *
	 */
	function _get_depends_on_name($depends_on_id)
	{
		$return_value = '';

		$query  = "SELECT name, assigned_user_id FROM {$this->table_name} WHERE id='{$depends_on_id}'";
		$result = $this->db->query($query,true," Error filling in additional detail fields: ");
		$row = $this->db->fetchByAssoc($result);
		if($row != null)
		{
			$this->depends_on_name_owner = $row['assigned_user_id'];
			$this->depends_on_name_mod = 'ProjectTask';
			$return_value = $row['name'];
		}

		return $return_value;
	}

    function _get_project_name($project_id)
    {
        $return_value = '';

        $query  = "SELECT name, assigned_user_id FROM project WHERE id='{$project_id}'";
        $result = $this->db->query($query,true," Error filling in additional detail fields: ");
        $row = $this->db->fetchByAssoc($result);
        if($row != null)
        {
            //$this->parent_name_owner = $row['assigned_user_id'];
            //$this->parent_name_mod = 'Project';
            $return_value = $row['name'];
        }

        return $return_value;
    }
	/*
	 *
	 */
	function _get_parent_name($parent_id)
	{
		$return_value = '';

		$query  = "SELECT name, assigned_user_id FROM project WHERE id='{$parent_id}'";
		$result = $this->db->query($query,true," Error filling in additional detail fields: ");
		$row = $this->db->fetchByAssoc($result);
		if($row != null)
		{
			$this->parent_name_owner = $row['assigned_user_id'];
			$this->parent_name_mod = 'Project';
			$return_value = $row['name'];
		}

		return $return_value;
	}

	/*
	 *
	 */
	function build_generic_where_clause ($the_query_string)
	{
		$where_clauses = array();
		$the_query_string = $GLOBALS['db']->quote($the_query_string);
		array_push($where_clauses, "project_task.name like '$the_query_string%'");

		$the_where = "";
		foreach($where_clauses as $clause)
		{
			if($the_where != "") $the_where .= " or ";
			$the_where .= $clause;
		}

		return $the_where;
	}

	function get_list_view_data(){
		global $action, $currentModule, $focus, $current_module_strings, $app_list_strings, $timedate, $locale;
		$today = $timedate->handle_offset(date($GLOBALS['timedate']->get_db_date_time_format(), time()), $timedate->dbDayFormat, true);
		$task_fields =$this->get_list_view_array();
		//$date_due = $timedate->to_db_date($task_fields['DATE_DUE'],false);
        if (isset($this->parent_type))
			$task_fields['PARENT_MODULE'] = $this->parent_type;

		/*
        if ($this->status != "Completed" && $this->status != "Deferred" ) {
			$task_fields['SET_COMPLETE'] = "<a href='index.php?return_module=$currentModule&return_action=$action&return_id=" . ((!empty($focus->id)) ? $focus->id : "") . "&module=ProjectTask&action=EditView&record={$this->id}&status=Completed'>".SugarThemeRegistry::current()->getImage("close_inline","alt='Close' border='0'")."</a>";
		}

		if( $date_due	< $today){
			$task_fields['DATE_DUE']= "<font class='overdueTask'>".$task_fields['DATE_DUE']."</font>";
		}else if( $date_due	== $today ){
			$task_fields['DATE_DUE'] = "<font class='todaysTask'>".$task_fields['DATE_DUE']."</font>";
		}else{
			$task_fields['DATE_DUE'] = "<font class='futureTask'>".$task_fields['DATE_DUE']."</font>";
		}
        */

        if ( !isset($task_fields["FIRST_NAME"]) )
            $task_fields["FIRST_NAME"] = '';
        if ( !isset($task_fields["LAST_NAME"]) )
            $task_fields["LAST_NAME"] = '';
		$task_fields['CONTACT_NAME']= $locale->getLocaleFormattedName($task_fields["FIRST_NAME"],$task_fields["LAST_NAME"]);
		$task_fields['TITLE'] = '';
		if (!empty($task_fields['CONTACT_NAME'])) {
			$task_fields['TITLE'] .= $current_module_strings['LBL_LIST_CONTACT'].": ".$task_fields['CONTACT_NAME'];
		}

		return $task_fields;
	}

	function bean_implements($interface){
		switch($interface){
			case 'ACL':return true;
		}
		return false;
	}
	function listviewACLHelper(){
		$array_assign = parent::listviewACLHelper();
		$is_owner = false;
		if(!empty($this->parent_name)){

			if(!empty($this->parent_name_owner)){
				global $current_user;
				$is_owner = $current_user->id == $this->parent_name_owner;
			}
		}
			if(ACLController::checkAccess('Project', 'view', $is_owner)){
				$array_assign['PARENT'] = 'a';
			}else{
				$array_assign['PARENT'] = 'span';
			}
		$is_owner = false;
		if(!empty($this->depends_on_name)){

			if(!empty($this->depends_on_name_owner)){
				global $current_user;
				$is_owner = $current_user->id == $this->depends_on_name_owner;
			}
		}
			if( ACLController::checkAccess('ProjectTask', 'view', $is_owner)){
				$array_assign['PARENT_TASK'] = 'a';
			}else{
				$array_assign['PARENT_TASK'] = 'span';
			}

		return $array_assign;
	}

    function create_export_query(&$order_by, &$where, $relate_link_join='')
    {
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
		if($custom_join)
				$custom_join['join'] .= $relate_link_join;
		$query = "SELECT
				project_task.*,
                users.user_name as assigned_user_name ";
        $query .= ", teams.name AS team_name ";
        if($custom_join){
			$query .=  $custom_join['select'];
		}

        $query .= " FROM project_task LEFT JOIN project ON project_task.project_id=project.id AND project.deleted=0 ";

		// We need to confirm that the user is a member of the team of the item.
		$this->add_team_security_where_clause($query);
		if($custom_join){
			$query .=  $custom_join['join'];
		}
        $query .= " LEFT JOIN users
                   	ON project_task.assigned_user_id=users.id ";
        $query .= getTeamSetNameJoin('project_task');

        $where_auto = " project_task.deleted=0 ";

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

    function create_new_list_query($order_by, $where, $filter = array(), $params = array(), $show_deleted = 0, $join_type = '', $return_array = false, $parentbean = null, $singleSelect = false)
    {
        if(isset($filter['resource_name']) && $filter['resource_name'] === true) {
            $filter['resource_id'] = true;
        }
        return parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect);
    }

    function getResourceName(){

    	$query = "SELECT DISTINCT resource_type FROM project_resources WHERE resource_id = '" . $this->resource_id . "'";

    	$result = $this->db->query($query, true, "Unable to retrieve project resource type");
		$row = $this->db->fetchByAssoc($result);

		if ($row != null){
	    	$resource_table = strtolower($row['resource_type']);

	    	if (empty($resource_table)){
	    		return '&nbsp;';
	    	}

	    	$resource = $this->db->concat($resource_table, array('first_name', 'last_name'));

	    	$resource_name_qry = "SELECT " . $resource . " as resource_name " .
								 "FROM " . $resource_table . " ".
								 "WHERE id = '" . $this->resource_id ."'";

			$result = $this->db->query($resource_name_qry, true, "Unable to retrieve project resource name");
			$row = $this->db->fetchByAssoc($result);

			return $row['resource_name'];
		}
		else{
			return '';
		}
    }

    /**
    * This method recalculates the percent complete of a parent task
    */
    public function updateParentProjectTaskPercentage()
	{

		if (empty($this->parent_task_id))
		{
			return;
		}

		if (!empty($this->project_id))
		{
            //determine parent task
            $parentProjectTask = $this->getProjectTaskParent();

            //get task children
            if ($parentProjectTask)
            {
                $subProjectTasks = $parentProjectTask->getAllSubProjectTasks();

                $totalHours = 0;
                $cumulativeDone = 0;

                //update cumulative calculation - mimics gantt calculation
                foreach ($subProjectTasks as $key => $value)
                {
                    if ($value->duration == "")
                    {
                        $value->duration = 0;
                    }

                    if ($value->percent_complete == "")
                    {
                        $value->percent_complete = 0;
                    }

                    if ($value->duration_unit == "Hours")
                    {
                        $totalHours += $value->duration;
                        $cumulativeDone += $value->duration * ($value->percent_complete / 100);
                    }
                    else
                    {
                        $totalHours += ($value->duration * 8);
                        $cumulativeDone += ($value->duration * 8) * ($value->percent_complete / 100);
                    }
                }

                $cumulativePercentage = 0;
				if ($totalHours != 0)
                {
					$cumulativePercentage = ($cumulativeDone/$totalHours) * 100;
                }

                $parentProjectTask->percent_complete = round($cumulativePercentage);
                $parentProjectTask->save(isset($GLOBALS['check_notify']) ? $GLOBALS['check_notify'] : '');
            }
		}
	}

    /**
    * Retrieves the parent project task of a project task
    * returns project task bean
    */
    function getProjectTaskParent()
    {

        $projectTaskParent=false;

        if (!empty($this->parent_task_id) && !empty($this->project_id))
        {
            $query = "SELECT id FROM project_task WHERE project_id = '{$this->project_id}' AND project_task_id = '{$this->parent_task_id}' AND deleted = 0 ORDER BY date_modified DESC";
            $project_task_id = $this->db->getOne($query, true, "Error retrieving parent project task");

            if (!empty($project_task_id))
            {
                $projectTaskParent = BeanFactory::getBean('ProjectTask', $project_task_id);
            }
        }

        return $projectTaskParent;
    }

    /**
    * Retrieves all the child project tasks of a project task
    * returns project task bean array
    */
    function getAllSubProjectTasks()
    {
		$projectTasksBeans = array();

        if (!empty($this->project_task_id) && !empty($this->project_id))
		{
            //select all tasks from a project
            $query = "SELECT id, project_task_id, parent_task_id FROM project_task WHERE project_id = '{$this->project_id}' AND deleted = 0 ORDER BY project_task_id";

            $result = $this->db->query($query, true, "Error retrieving child project tasks");

            $projectTasks=array();
            while($row = $this->db->fetchByAssoc($result))
            {
                $projectTasks[$row['id']]['project_task_id'] = $row['project_task_id'];
                $projectTasks[$row['id']]['parent_task_id'] = $row['parent_task_id'];
            }

            $potentialParentTaskIds[$this->project_task_id] = $this->project_task_id;
            $actualParentTaskIds=array();
            $subProjectTasks=array();

            $startProjectTasksCount=0;
            $endProjectTasksCount=0;

            //get all child tasks
            $run = true;
            while ($run)
            {
                $count=0;

                foreach ($projectTasks as $id=>$values)
                {
                    if (in_array($values['parent_task_id'], $potentialParentTaskIds))
                    {
                        $potentialParentTaskIds[$values['project_task_id']] = $values['project_task_id'];
                        $actualParentTaskIds[$values['parent_task_id']] = $values['parent_task_id'];

                        $subProjectTasks[$id]=$values;
                        $count=$count+1;
                    }
                }

                $endProjectTasksCount = count($subProjectTasks);

                if ($startProjectTasksCount == $endProjectTasksCount)
                {
                    $run = false;
                }
                else
                {
                    $startProjectTasksCount = $endProjectTasksCount;
                }
            }

            foreach($subProjectTasks as $id=>$values)
            {
                //ignore tasks that are parents
                if(!in_array($values['project_task_id'], $actualParentTaskIds))
                {
                    $projectTaskBean = BeanFactory::getBean('ProjectTask', $id);
                    array_push($projectTasksBeans, $projectTaskBean);
                }
            }
		}

		return $projectTasksBeans;
	}
	
	
	/**
	 * getNumberOfTasksInProject
	 * 
	 * Returns the count of project_tasks for the given project_id
	 * 
	 * This is a private helper function to get the number of project tasks for a given project_id.
	 * 
	 * @param $project_id integer value of the project_id associated with this ProjectTask instance
	 * @return total integer value of the count of project tasks, 0 if none found
	 */
    private function getNumberOfTasksInProject($project_id='')
    {
    	if(!empty($project_id))
    	{
	        $query = "SELECT count(project_task_id) AS total FROM project_task WHERE project_id = '{$project_id}'";
	        $result = $this->db->query($query, true);
	        if($result)
	        {
		        $row = $this->db->fetchByAssoc($result);
		        if(!empty($row['total']))
		        {
		           return $row['total'];
		        }
	        }
    	}
        return 0;
    }	
}

function getUtilizationDropdown($focus, $field, $value, $view) {
	global $app_list_strings;

	if($view == 'EditView') {
		global $app_list_strings;
        $html = '<select name="'.$field.'">';
        $html .= get_select_options_with_id($app_list_strings['project_task_utilization_options'], $value);
        $html .= '</select>';
        return $html;
    }

    return translate('project_task_utilization_options', '', $focus->$field);
}
?>
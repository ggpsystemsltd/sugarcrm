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




require_once('include/workflow/workflow_utils.php');
//require_once('modules/QueryBuilder/QueryBuilder.php');
require_once('include/workflow/glue.php');




global $process_dictionary;
require_once('modules/WorkFlowTriggerShells/MetaArray.php');

// WorkFlowTriggerShell is used to store the shell trigger information.
class WorkFlowTriggerShell extends SugarBean {
	var $field_name_map;
	// Stored fields
	var $id;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $name;
	

	//construction
	var $eval;
	var $field;
	var $type;
	var $show_past;
	var $parent_id;
	var $parameters;
	
	//Either this is the first trigger or an additional one
	var $frame_type;
	
	//related trigger filters
	var $rel_module;
	var $rel_module_type = "any";
	
	
	//used for gathering the trigger components
	var $trigger_id;
	var $trigger_type;
	
	var $table_name = "workflow_triggershells";
	var $module_dir = "WorkFlowTriggerShells";
	var $object_name = "WorkFlowTriggerShell";
	var $rel_trigger_table = "workflow_triggers";
	
	
	var $new_schema = true;

	var $column_fields = Array("id"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		,"created_by"
		,"eval"
		,"field"
		,"type"
		,"show_past"
		,"parent_id"
		,"parameters"
		,"frame_type"
		,"rel_module"
		,"rel_module_type"
		);


	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	// This is the list of fields that are in the lists.
	var $list_fields = array("name", "eval", "type", "field");
	

	
	// This is the list of fields that are required
	var $required_fields =  array();

	function WorkFlowTriggerShell() {
		parent::SugarBean();

		$this->disable_row_level_security =true;

	}

	

	function get_summary_text()
	{
		return "$this->name";
	}




	/** Returns a list of the associated product_templates
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved.
	 * Contributor(s): ______________________________________..
	*/


    function create_export_query(&$order_by, &$where)
    {

    }



	function save_relationship_changes($is_update)
    {
    }


	function mark_relationships_deleted($id)
	{
	}

	function fill_in_additional_list_fields()
	{

	}

	function fill_in_additional_detail_fields()
	{

	}
	

	function get_list_view_data(){

		global $app_strings, $mod_strings;
		global $app_list_strings;

		global $current_user;
		global $current_module_strings;
		

		$temp_array = Array();
		
		//BEGIN WFLOW PLUGINS
		global $process_dictionary;
		get_plugin("workflow", "trigger_createstep1", $this);
		//END WFLOW PLUGINS
		//Grab event
		include_once('include/ListView/ProcessView.php');
		$ProcessView = new ProcessView($this->get_workflow_type(), $this);
		$ProcessView->local_strings = $current_module_strings;
		$prev_display_text = $ProcessView->get_prev_text("TriggersCreateStep1", $this->type);
		
		if($this->frame_type=="Primary"){
			$pre_statement = '';$current_module_strings['LBL_LIST_FRAME_PRI'];	
			$statement1 = $current_module_strings['LBL_LIST_STATEMEMT'];
		} else {
			$pre_statement = '';$current_module_strings['LBL_LIST_FRAME_SEC'];	
			$statement1 = $current_module_strings['LBL_FILTER_LIST_STATEMEMT'];
		}		
		
		$temp_array['FRAME_TYPE'] = $this->frame_type;
		$temp_array['STATEMENT'] = "<b>".$prev_display_text."</b>";
		$temp_array['STATEMENT1'] = "<i>".$statement1."</i>";
		$trigger_display_text = $ProcessView->get_trigger_display_text("TriggersCreateStep1", $this);
		if (strpos($trigger_display_text,'class="error"') !== false && empty($this->hasError))
		{
		    $this->hasError = true;
            echo '<p class="error"><b>' . translate('LBL_TRIGGER_ERRORS') . '</b></p>';
		}
		$temp_array['STATEMENT2'] = "<b>".$trigger_display_text."</b>";
		unset($ProcessView);
		//preset height and width
		$temp_array['POPUP_HEIGHT'] = "500";
		$temp_array['POPUP_WIDTH'] = "400";
		
		
		$action_processed = false;
		if(	$this->type =="compare_change" || $this->type =="trigger_record_change"){
				$temp_array['ACTION'] = 'CreateStep1';
				$action_processed = true;
			} 
		if(	$this->type =="compare_specific"){
				$temp_array['ACTION'] = 'CreateStepSpecific';
				$action_processed = true;
			}
		if(	$this->type =="compare_count"){
				$temp_array['ACTION'] = 'CreateStepCount';
				$action_processed = true;
			}	
			
		if(	$this->type =="compare_any_time"){
				$temp_array['ACTION'] = 'CreateStep1';
				$action_processed = true;
			} 		
			
		if(	$this->type =="filter_field" || $this->type=="filter_rel_field"){
				$temp_array['ACTION'] = 'CreateStepFilter';
				$action_processed = true;
			}			
		//BEGIN WFLOW PLUGINS	
		if($action_processed==false){
			$list_data_array = get_plugin("workflow", "trigger_listview", $this);
			if(!empty($list_data_array['action_processed']) && $list_data_array['action_processed']==true){

				//a custom plugin was found with data
				foreach($list_data_array['list_data'] as $list_key => $list_value){
					
					$temp_array[$list_key] = $list_value;
					
				//loop through and fill the temp_array	
				}		
				
			}	
		}
		//END WFLOW PLUGINS	

			
		$temp_array['PARENT_ID'] = $this->parent_id;
		$temp_array['ID'] = $this->id;
		return $temp_array;
			
			
	
	}
	
	function clear_deleted($id){

	//end function clear_deleted
	}
	
	
	

	function build_generic_where_clause ($the_query_string) {

	}
	
	
////////////////////Glue the trigger components together
	function glue_triggers($past_object, $future_object){
		
		$glue_object = new WorkFlowGlue();
		
		$workflow_object = $this->get_workflow_type();
		$the_type = $workflow_object->type;

		if($the_type=="Normal"){
			
			
			if($this->type=="compare_specific"){
			
				$this->eval = $glue_object->glue_normal_type($this, $past_object, $future_object);
			//end if compare_specific
			}
			if($this->type=="compare_change"){
				
				$this->eval = $glue_object->glue_normal_compare_change($this);
			//end if compare_change
			}	
		
			if($this->type=="compare_count"){
				$this->eval = "";
				
			//end if compare_count
			}	
		

		
		}
		if($the_type=="Time"){
			
			if($this->type=="compare_any_time"){
				
				$this->eval = $glue_object->glue_normal_compare_any_time($this);
			//end if compare_change
			} else {
				$this->eval = $glue_object->glue_time_type($this, $future_object);
			}
			
		}
		
		return $workflow_object;
				
	//end function glue_triggers
	}
	
	
	function glue_trigger_count($base_object, $filter1_object, $filter2_object){
		
		$glue_object = new WorkFlowGlue();
		$workflow_object = $this->get_workflow_type();	
		
		
		
		
		return $workflow_object;
		
	//end function glue_trigger_count
	}	
	
	
	function glue_trigger_filters(& $filter_object){
		
		if($this->type=="filter_field"){
			$glue_object = new WorkFlowGlue();
			$glue_object->shell_object = & $this;
			$this->eval = $glue_object->glue_normal_expression($filter_object);
		}
		
		
		$workflow_object = $this->get_workflow_type();	
		
		return $workflow_object;
		
		
	//end glue_trigger_filters
	}	
	
	
	
	
	function write_workflow($workflow_object){
		
		write_workflow($workflow_object);
	}	
	
	function get_workflow_type(){
		
		$workflow_object = new WorkFlow();
		$workflow_object->retrieve($this->parent_id);
		return $workflow_object;	
	
	//end function get_workflow_type	
	}	
	
	function copy($parent_id){
		
		$orig_id = $this->id;
		$new_trigger_shell = $this;
		$new_trigger_shell->id = "";
		$new_trigger_shell->parent_id = $parent_id;

        if (isset($new_trigger_shell->date_entered))  $new_trigger_shell->date_entered=null;
        if (isset($new_trigger_shell->created_by))  $new_trigger_shell->created_by=null;
                            
		$new_trigger_shell->save();
		$new_id = $new_trigger_shell->id;
		$this->retrieve($orig_id);
		$expression_list = $this->get_linked_beans('future_triggers','Expression');
		foreach($expression_list as $expression){
			$new_expression =& $expression;
			$new_expression->id = "";
			$new_expression->parent_id = $new_id;
            if (isset($new_expression->date_entered))  $new_expression->date_entered=null;
            if (isset($new_expression->created_by))  $new_expression->created_by=null;            
  			$new_expression->save();
		}
		$expression_list = $this->get_linked_beans('past_triggers','Expression');
		foreach($expression_list as $expression){
			$new_expression =& $expression;
			$new_expression->id = "";
			$new_expression->parent_id = $new_id;
			if (isset($new_expression->date_entered))  $new_expression->date_entered=null;
			if (isset($new_expression->created_by))  $new_expression->created_by=null;
			$new_expression->save();
		}
		$expression_list = $this->get_linked_beans('expressions','Expression');
		foreach($expression_list as $expression){
			$new_expression =& $expression;
			$new_expression->id = "";
			$new_expression->parent_id = $new_id;
            if (isset($new_expression->date_entered))  $new_expression->date_entered=null;
            if (isset($new_expression->created_by))  $new_expression->created_by=null;            
  			$new_expression->save();
		}
	}
	
	
	function get_time_int($triggershell_id){	
		
		$query = "	SELECT ext1, exp_type, operator, lhs_field
					FROM expressions
					WHERE expressions.parent_id = '".$triggershell_id."'
					AND expressions.deleted=0";
		$result = $this->db->query($query,true," Error grabbing time interval from expression object: ");

		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);

		if($row != null)
		{
			
			
			
			//datetime time_int;
			if($row['exp_type']=="datetime" || $row['exp_type']=="date" || $row['exp_type']=="datetimecombo"){
				$time_int_array['time_int_type'] = "datetime";
				$time_int_array['target_field'] = $row['lhs_field'];
				if($row['operator']=="More Than"){
					$time_int_array['time_int'] =$row['ext1'];
				} else {
					$time_int_array['time_int'] =$row['ext1'] * -1;
				}	
				
			} else {
				$time_int_array['time_int_type'] = "normal";
				$time_int_array['time_int'] =$row['ext1'];
				$time_int_array['target_field'] = "none";
				//$time_int_array['target_field'] =$row['lhs_field'];
			}
			
			//normal time_int
			return $time_int_array;
		}
		else
		{

			return null;
		}
	//end function get_time_int
	}		
	
	
	
	
	
	
	
///End Class WorkFlowTrigger
}

?>

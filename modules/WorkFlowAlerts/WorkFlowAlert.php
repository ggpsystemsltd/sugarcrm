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


global $process_dictionary;
require_once('modules/WorkFlowAlerts/MetaArray.php');

// WorkFlowAlert is used to store the workflow alert component information.
class WorkFlowAlert extends SugarBean {
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

	var $user_type;
	var $array_type;
	var $relate_type;
	var $address_type = 'to';
	var $where_filter;
	var $field_value;
	var $rel_module1;
	var $rel_module1_type = "all";
	var $rel_module2;
	var $rel_module2_type = "all";
	var $rel_email_value;
	
	var $parent_id;
	
	var $user_display_type;
	
	//Used for UI
	var $base_module;
	
	var $table_name = "workflow_alerts";
	var $module_dir = "WorkFlowAlerts";
	var $object_name = "WorkFlowAlert";
	
	var $rel_exp_table = 	"expressions";

	var $new_schema = true;

	var $column_fields = Array("id"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		,"created_by"
		,"parent_id"
		,"user_type"
		,"array_type"
		,"relate_type"
		,"address_type"
		,"where_filter"
		,"field_value"
		,"rel_module1"
		,"rel_module1_type"
		,"rel_module2"
		,"rel_module2_type"
		,"rel_email_value"
		,"user_display_type"
		);

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array('rel_field_value', 'custom_user');

	// This is the list of fields that are in the lists.
	var $list_fields = array('id', 'user_type', 'array_type', 'field_value', 'relate_type', 'address_type');

	var $relationship_fields = Array();
	
	
	// This is the list of fields that are required
	var $required_fields =  array('user_type'=>1);

	function WorkFlowAlert() {
		parent::SugarBean();

		$this->disable_row_level_security =true;

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
		global $current_module_strings;

		global $current_user;

		include('modules/WorkFlowAlerts/MetaArray.php');
		
		$temp_array = parent::get_list_view_data();
		
		//Grab event
		include_once('include/ListView/ProcessView.php');
		
		$workflow_object = $this->get_workflow_object();
		$workflow_object = $workflow_object->get_parent_object();
		$ProcessView = new ProcessView($workflow_object, $this);
		$ProcessView->local_strings = $current_module_strings;
		$prev_display_text = $ProcessView->get_prev_text("AlertsCreateStep1", $this->user_type);
	    if ($prev_display_text === false){
            if (empty($this->hasError))
            {
                $this->hasError = true;
                echo '<p class="error"><b>' . translate('LBL_ALERT_ERRORS') . '</b></p>';
            }
            $prev_display_text = '<span class="error">' . translate('LBL_RECIPIENT_ERROR') . '</span>';
        }
		unset($ProcessView);
		$temp_array['STATEMENT'] = "<i>".$current_module_strings['LBL_LIST_STATEMENT_CONTENT']."</i>";
		$temp_array['STATEMENT2'] = "<b>".$prev_display_text."</b>";

			if(	$this->user_type =="specific_user" ||
			$this->user_type=="specific_team" ||
			$this->user_type=="specific_role" ||
			$this->user_type=="login_user"
			){
				$temp_array['ACTION'] = 'CreateStep1';
			} else {
				$temp_array['ACTION'] = 'CreateStep2';
			}	

		$temp_array['FIELD_VALUE'] = $this->field_value;
		return $temp_array;
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

function get_field_value_array($base_module, $inclusion_type=false){
	
	if($inclusion_type!=false){
		
		if($inclusion_type=="User"){
			$inclusion_array = array('assigned_user_name' => 'assigned_user_name');
		}
		if($inclusion_type=="Char"){
			$inclusion_array = array('char' => 'char');
			$inclusion_array = array('varchar' => 'varchar');
		}		
		if($inclusion_type=="Email"){
			$inclusion_array = array('email' => 'email');
		}	
	} else {
		$inclusion_array = null;	
	}	
		
	$field_option_list = get_column_select($base_module, "", "", $inclusion_array);  
	//return the field value array with an inclusion array to only have assigned users

	return $field_option_list;
}

function get_rel_module_array($base_module, $include_none=false){
	
	$inclusion_array = array('link' => 'link');
	
	$field_option_list = get_column_select($base_module, "", "", $inclusion_array, $include_none);  
	//return the field value array with an inclusion array to only have linking vardef elements
	
	return $field_option_list;
}

function get_rel_module($base_module, $var_rel_name){
	
	
	//get the vardef fields relationship name
	//get the base_module bean
	$module_bean = get_module_info($base_module);
	require_once('data/Link.php');
	$rel_name = Relationship::retrieve_by_modules($var_rel_name, $this->base_module, $GLOBALS['db']);
	if(!empty($module_bean->field_defs[$rel_name])){
		$var_rel_name = $rel_name;
	}
	$var_rel_name = strtolower($var_rel_name);
	$rel_attribute_name = $module_bean->field_defs[$var_rel_name]['relationship'];
	//use the vardef to retrive the relationship attribute
	unset($module_bean);

	return get_rel_module_name($base_module, $rel_attribute_name, $this->db);
	
}	

	function get_workflow_object(){

		$workflow_alertshell = new WorkFlowAlertShell();
		$workflow_alertshell->retrieve($this->parent_id);
		$workflow_object = $workflow_alertshell->get_workflow_object();
		return $workflow_object;	
	
	//end function get_workflow_type	
	}	

	
/////Create Steps Functions

//$focus->handleFilterSave("rel1_", "rel1_alert_fil", "rel_module1_type");

function handleFilterSave($prefix, $target_vardef_field, $target_rel_type){

	////////////////REL TYPE FILTER
	$rel_list = & $this->get_linked_beans($target_vardef_field,'Expression');

	if(!empty($rel_list[0])){
		$rel_filter_id = $rel_list[0]->id;
	} else {
		$rel_filter_id = "";
	}
	$rel_object = new Expression();

	//Checked if there is an advanced filter
	if($this->$target_rel_type!="filter"){
		//no advanced filter
		if($rel_filter_id!=""){
			//remove existing filter;
			$rel_object->mark_deleted($rel_filter_id);
		}

	//end if no adv filter	
	} else {
	//Rel1 Filter exists	 
		
		$rel_object->parent_id = $this->id;
		$rel_object->handleSave($prefix, $target_vardef_field, $rel_filter_id);
	
	//end if rel1 filter exists	
	}	
	
//end function handleFilterSave
}	


	function get_address_type_dom(){

		$workflow_alertshell = new WorkFlowAlertShell();
		$workflow_alertshell->retrieve($this->parent_id);

		if($workflow_alertshell->alert_type=="Invite"){
			
			if($workflow_alertshell->source_type == "System Default"){
				return "wflow_address_type_to_only_dom";
			} else {
				return "wflow_address_type_invite_dom";
			}		
			
			return "wflow_address_type_invite_dom";
		} else {
			return "wflow_address_type_dom";
		}						
		
	//end function get_address_type_dom
	}	


//end class	
}

?>

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




// WorkFlowAlertShell is used to store the workflow alert shell information.
class WorkFlowAlertShell extends SugarBean {
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
	var $alert_text;
	var $alert_type = "Email";
	var $source_type;
	var $custom_template_id;
	var $parent_id;
	var $parent_base_module;
	var $parent_type;

	var $table_name = "workflow_alertshells";
	var $module_dir = "WorkFlowAlertShells";
	var $object_name = "WorkFlowAlertShell";
	
	var $rel_workflow_table = 	"workflow";
	var $rel_alerts_table = 		"workflow_alerts";

	var $new_schema = true;

	var $column_fields = Array("id"
		,"name"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		,"created_by"
		,"alert_text"
		,"alert_type"
		,"source_type"
		,"custom_template_id"
		,"parent_id"
		,"parent_base_module"
		,"parent_type"
		);


	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	// This is the list of fields that are in the lists.
	var $list_fields = array('id', 'name', 'alert_type', 'custom_template_id', 'alert_text');

	var $relationship_fields = Array();
	
	
	// This is the list of fields that are required
	var $required_fields =  array("name"=>1, 'alert_type'=>1);

	function WorkFlowAlertShell() {
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
		global $current_module_strings;
		global $current_module_strings2;
		
		
		global $current_user;
		global $current_language;
		
		$temp_array = array();
		$translated_type = $app_list_strings['wflow_source_type_dom'][$this->source_type];
		$prepared_name = (($this->name == "") ? "<i>an alert</i>" : "<b><i>".$this->name."</b></i>");

		//begin - rsmith
		$focus_alertcomp_list = $this->get_linked_beans('alert_components','WorkFlowAlert');
		include_once('include/ListView/ProcessView.php');
		$workflow_alert_module = return_module_language($current_language, 'WorkFlowAlerts');
		$table_html = "<table id='tbl_$this->id' style='display:none'>";
		foreach($focus_alertcomp_list as $comp)
		{
			$ProcessView = new ProcessView($this->get_workflow_object(), $comp);
			$ProcessView->local_strings = $workflow_alert_module;
			$alert_prev_text = $ProcessView->get_prev_text("AlertsCreateStep1", $comp->user_type);
			if ($alert_prev_text === false){
				if (empty($this->hasError))
				{
	                $this->hasError = true;
	                echo '<p class="error"><b>' . translate('LBL_ALERT_ERRORS') . '</b></p>';
	            }
	            $alert_prev_text = '<span class="error">' . translate('LBL_ALERT_ERROR') . '</span>';
			}
			$table_html .= "<tr><td>";
			$table_html .= "<li>$alert_prev_text</li>";
			$table_html .= "</td></tr>";
		    
		}
		$table_html .= "</table>";
		//end - rsmith
		
			//this is an alert item	
		
			if($this->source_type == "Normal Message"){

				$statement = $current_module_strings['STATEMENT_PART1']." ".$prepared_name." ".$current_module_strings['STATEMENT_PART2']." ".$translated_type;

				$temp_array['STATEMENT'] = $statement;

				//end if normal message
			} else {
				//custom template message
				
				$template_object = new EmailTemplate();
				if($this->custom_template_id!=""){
					$template_object->retrieve($this->custom_template_id);
					$custom_template_name = $template_object->name;
				} else {
					$custom_template_name = "";
				}

				$statement = $current_module_strings['STATEMENT_PART1']." ".$prepared_name." ".$current_module_strings['STATEMENT_PART2']." ".$translated_type.": <b><i>".$custom_template_name."</b></i>";
				$temp_array['STATEMENT'] = $statement;

				//end else custom template message
			}
			
		$temp_array['HREF_EDIT'] = 'index.php?action=EditView&module=WorkFlowAlertShells&module_tab=WorkFlow&record='.$this->id.'&workflow_id='.$this->parent_id;
		$temp_array['HREF_DELETE'] = "index.php?action=Delete&module=WorkFlowAlertShells&module_tab=WorkFlow&record=".$this->id."";
		$temp_array['TYPE'] = $current_module_strings['LBL_MODULE_NAME'];
		$temp_array['DETAILS_TABLE'] = $table_html;
		$temp_array['ID'] = $this->id;
		
		//Component information for either recipients or invitees (Meetings & Calls)
		$recipient_icon =  SugarThemeRegistry::current()->getImage('Users','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']);
		$temp_array['COMPONENT_HREF_EDIT'] = 'index.php?action=DetailView&module=WorkFlowAlertShells&module_tab=WorkFlow&record='.$this->id.'&workflow_id='.$this->parent_id;
		$temp_array['COMPONENT_STATEMENT'] = $recipient_icon.$mod_strings['LBL_RECIPIENTS'];
		
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

	function get_workflow_object(){

		$workflow_object = new WorkFlow();
		$workflow_object->retrieve($this->parent_id);
		return $workflow_object;	
	
	//end function get_workflow_type	
	}	
	
	
	
	
	function retrieve_meta_information(){
		
		require_once('modules/WorkFlowAlertShells/MetaArray.php');
		$this->target_meta_array = $process_dictionary['AlertShellDetailView']['elements'][$this->alert_type];
		
	//end function retrieve_meta_information	
	}	
	
	function copy($parent_id){
		$orig_id = $this->id;
		$new_action_shell =& $this;
		$new_action_shell->id = "";
		$new_action_shell->parent_id = $parent_id;
        if (isset($new_action_shell->date_entered))  $new_action_shell->date_entered=null;
        if (isset($new_action_shell->created_by))  $new_action_shell->created_by=null;
		$new_action_shell->save();
		$new_id = $new_action_shell->id;
		$this->retrieve($orig_id);
		$alertcomp_list = $this->get_linked_beans('alert_components','WorkFlowAlert');
	
		foreach($alertcomp_list as $comp){
			$new_comp =& $comp;
			$new_comp->id = "";
			$new_comp->parent_id = $new_id;
            if (isset($new_comp->date_entered))  $new_comp->date_entered=null;
            if (isset($new_comp->created_by))  $new_comp->created_by=null;
            
  		$new_comp->save();
		}
	}


//Add a get_alert_contents function

	
//end class	
}

?>

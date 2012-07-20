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


require_once('include/workflow/glue.php');




global $process_dictionary;
require_once('modules/WorkFlowActionShells/MetaArray.php');

// WorkFlowActionShell is used to store the shell action information.
class WorkFlowActionShell extends SugarBean {
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
	var $action_type;
	var $rel_module;
	var $action_module;
	var $parent_id;
	var $parent_base_module;
	var $parent_type;
	
	var $parameters;
	
	var $rel_module_type = "all";
	
	var $table_name = "workflow_actionshells";
	var $module_dir = "WorkFlowActionShells";
	var $object_name = "WorkFlowActionShell";
	var $rel_action_table = "workflow_actions";
	var $rel_workflow_table = 	"workflow";
	
	
	var $new_schema = true;

	var $column_fields = Array("id"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		,"created_by"
		,"action_type"
		,"rel_module"
		,"action_module"
		,"parent_id"
		,"rel_module_type",
		"parameters"
		,"parent_base_module"
		,"parent_type"
		);

		
	//meta array for loading required info on the fields selection
	var $action_array = Array(
	
		"new" => array("set_required" => true),
		"new_rel" => array("set_required" => true),
		"update" => array("set_required" => false),
		"update_rel" => array("set_required" => false),
	
	);
		

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	// This is the list of fields that are in the lists.
	var $list_fields = array("action_type", "action_module", "rel_module");
	

	
	// This is the list of fields that are required
	var $required_fields =  array();

	function WorkFlowActionShell() {
		parent::SugarBean();

		$this->disable_row_level_security =true;

	}

	

	function get_summary_text()
	{
		return "$this->name";
	}


    function save($check_notify = FALSE)
    {
        parent::save($check_notify);
        //check for an remove invalid actions from this shell
        if (!empty($this->id))
        {
            $actions = $this->get_actions($this->id);
            $workflow_object = $this->get_workflow_object();
            $temp_module = get_module_info($workflow_object->base_module);
            $temp_module->call_vardef_handler("action_filter");
            $field_array = $temp_module->vardef_handler->get_vardef_array();
            foreach($actions as $action)
            {
                if (!empty($action->field))
                {
                    //Check if the actions field is still valid, if not remove the action
                    if (empty($field_array[$action->field]))
                    {
                        $action->mark_deleted($action->id);
                    }
                }
            }
        }
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
		global $mod_strings;
		global $beanList;
		global $current_module_strings2;

		global $current_user;
		
		/*
		///Determine Natural Language to display
		if($this->action_type=='new'){
			$natural_language = $current_module_strings['LBL_ACTION_NEW']." ".$beanList[$this->action_module];
		}	
		if($this->action_type=='update_rel'){
			$workflow_object = $this->get_workflow_object();
			$rel_module = $workflow_object->get_rel_module($this->rel_module);
			$natural_language = $current_module_strings['LBL_ACTION_UPDATE_REL']." ".$rel_module;
			unset($workflow_object);
		}	
		if($this->action_type=='update'){
			$natural_language = $current_module_strings['LBL_ACTION_UPDATE']." ".$current_module_strings['LBL_RECORD'];
		}		
		*/
		//begin - rsmith
    	include_once('include/ListView/ProcessView.php');
        $ProcessView = new ProcessView($this->get_workflow_object(), $this);
		$results = $ProcessView->get_action_shell_display_text($this, false);
        $result = $results["RESULT_ARRAY"];
        $table_html = "<table id='tbl_$this->id' style='display:none'>";
		foreach($result as $key=>$value)
		{
            if (isset($value["ACTION_DISPLAY_TEXT"]))
            {
                if ($value["ACTION_DISPLAY_TEXT"] === false)
                {
                    $table_html .= "<tr><td>";
                    $table_html .= "<span class='error'>" . translate('LBL_ACTION_ERROR') . "</span>";
                    $table_html .= "</td></tr>";
                    if (empty($this->hasError))
                    {
                        $this->hasError = true;
                        echo '<p class="error"><b>' . translate('LBL_ACTION_ERRORS') . '</b></p>';
                    }
                } else
                {
                    $table_html .= "<tr><td>";
                    $table_html .= "<li>" . $mod_strings['LBL_SET'] . " " . $value["FIELD_NAME"] . " " . $mod_strings['LBL_AS'] . " " . $value["ACTION_DISPLAY_TEXT"];
                    $table_html .= "</td></tr>";
                }
            }
        }
		$table_html .= "</table>";
    	//end - rsmith
    	
		$temp_array = Array();
		
	//Grab event
		$ProcessView->local_strings = $current_module_strings2;
		//BEGIN WFLOW PLUGINS
		global $process_dictionary;
		get_plugin("workflow", "action_createstep1", $this);
		//END WFLOW PLUGINS		
		$prev_display_text = $ProcessView->get_prev_text("ActionsCreateStep1", $this->action_type);
		unset($ProcessView);
		//$natural_language = "<i>".$current_module_strings['LBL_LIST_STATEMENT_CONTENT']."</i>";
		$natural_language = "<b>".$prev_display_text."</b>";		
		
		
		$temp_array['HREF_EDIT'] = "'javascript:get_popup(\"".$this->parent_id."\",\"".$this->id."\",\"CreateStep2\",\"\",\"\",\"400\",\"500\")'";
		$temp_array['HREF_DELETE'] = "index.php?action=Delete&module=WorkFlowActionShells&record=".$this->id."";
		$temp_array['TYPE'] = $current_module_strings2['LBL_MODULE_NAME'];
		$temp_array['STATEMENT'] = "<i>".$natural_language."</i>";
		$temp_array['DETAILS_TABLE'] = $table_html;
		//$temp_array['ACTION_DESCRIPTION'] = "<i>".$natural_language."</i>";
		$temp_array['ID'] = $this->id;

		
		//Component information for either invitees (Meetings & Calls ONLY)
		if(	$this->action_module == "Meetings" ||
			$this->action_module == "Calls" ||
            $this->action_module == "meetings" ||
			$this->action_module == "calls"){
			
			$recipient_icon =  SugarThemeRegistry::current()->getImage('Users','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_REMOVE']);
			
			$bridge_list = $this->get_linked_beans("action_bridge","WorkFlow");
			
				if(!empty($bridge_list)){
					
					$alertshell_list = $bridge_list[0]->get_linked_beans("alerts","WorkFlowAlertShell");
					if(!empty($alertshell_list)){
						
						//check for any invitees
						$invitees_list = $alertshell_list[0]->get_linked_beans('alert_components','WorkFlowAlert');
						
						if(empty($invitees_list)){

							$invitee_notice = "<font color='red'><b>".$mod_strings['LBL_INVITEE_NOTICE']." ".$app_list_strings['moduleListSingular'][ucfirst($this->action_module)]." </b></font><BR>";
							$temp_array['STATEMENT_NOTICE'] = $invitee_notice;
						}
						
						$temp_array['COMPONENT_HREF_EDIT'] = 'index.php?action=DetailView&module=WorkFlowAlertShells&module_tab=WorkFlow&record='.$alertshell_list[0]->id.'&workflow_id='.$alertshell_list[0]->parent_id;
						$temp_array['COMPONENT_STATEMENT'] = $recipient_icon.$mod_strings['LBL_INVITEES'];
					}
				}
			
		}
		
		
		//BEGIN WFLOW PLUGINS	
			$list_data_array = get_plugin("workflow", "action_listview", $this);
			if(!empty($list_data_array['action_processed']) && $list_data_array['action_processed']==true){

				//a custom plugin was found with data
				foreach($list_data_array['list_data'] as $list_key => $list_value){
					
					$temp_array[$list_key] = $list_value;
				//loop through and fill the temp_array	
				}		
				
			}	
		//END WFLOW PLUGINS	
		
		
		return $temp_array;
			
			
	
	}
	
	function clear_deleted($id){

	//end function clear_deleted
	}
	
	
	

	function build_generic_where_clause ($the_query_string) {

	}
	
	
////////////////////Action Shell components


	function get_action_id($field_name){
		$query = "	SELECT $this->rel_action_table.id
					FROM $this->rel_action_table 
					WHERE $this->rel_action_table.parent_id = '".$this->id."'
					AND ".$this->rel_action_table.".field = '".$field_name."'
					AND ".$this->rel_action_table.".deleted=0";
        $result = $this->db->query($query,true," Error grabbing action id: ");
		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);

		if($row != null)
		{

			return $row['id'];
		}
		else
		{
			return false;
		}		

	//end function	
	}	
	
	function get_actions($id){

		$query = "	SELECT $this->rel_action_table.id
					FROM $this->rel_action_table 
					WHERE $this->rel_action_table.parent_id = '".$id."'
					AND ".$this->rel_action_table.".deleted=0";
		$result = $this->db->query($query,true," Error grabbing action id: ");
		// Get the id and the name.
		$actions = array();
		while($row = $this->db->fetchByAssoc($result)){
			$action = new WorkFlowAction();
			$action->retrieve($row['id']);
			$actions[] = $action;
		}	
	return $actions;
	//end function	
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
	
	$actions = $this->get_actions($this->id);
	foreach($actions as $an_action){
		$new_action =& $an_action;
		$new_action->id = "";
		$new_action->parent_id = $new_id;
        if (isset($new_action->date_entered))  $new_action->date_entered=null;
        if (isset($new_action->created_by))  $new_action->created_by=null;                    
		$new_action->save();
	}
	return $new_id;
}

	
	
	function get_workflow_object(){
		$workflow_object = new WorkFlow();
		$workflow_object->retrieve($this->parent_id);
		return $workflow_object;	
	
	//end function get_workflow_type	
	}		

	
	//checks to see if the field is required
	function check_required_field($type, $target_module, $target_field, $action=false){
		
		//if override is true or this action_type is ok for checking for set required
		if($action==true || $this->action_array[$this->action_type]['set_required'] == true){
	
			global $app_strings;	
		
			if(isset($target_module->required_fields[$target_field])){
				
				if($type=="start_display"){
				return '';
				}
				if($type=="iframe_display"){
				return 'disabled checked';
				}				
				if($type=="span_req_display"){
				return '&nbsp;<span class="required">'.$app_strings["LBL_REQUIRED_SYMBOL"].'</span>';
				}				
			//required is true so set display to '';	
			}

		//end if the override is true or this is a valid action type to check for the set required output	
		}
			
				if($type=="start_display"){
				return 'none';
				}
				if($type=="iframe_display"){
				return '';
				}
				if($type=="span_req_display"){
				return '';
				}									
	

	//end function check_required_field
	}	
	
	
	
	function check_for_invitee_bridge($workflow_object){

		
		/*Conditions where the below is true
			-new record that is a meeting or call
			-new related record that is a meeting or a call
		*/
		
		if(	$this->action_module=="Meetings" ||
			$this->action_module =="Calls" ||
            $this->action_module=="meetings" ||
			$this->action_module =="calls" ){
				
				
			//Build bridging workflow object
			$bridge_object = new WorkFlow();	
			$bridge_object->parent_id = $this->id;
			$bridge_object->name = 'Meeting/Call Bridging Object';
			$bridge_object->status = 'on';
			$bridge_object->base_module = ucfirst($this->action_module);//base module must be ucfirst
			$bridge_object->type = "Normal";
			$bridge_object->fire_order = "alerts_actions";
			$bridge_object->record_type = "All";
			$bridge_object->save();
			
			//Add or Build Logic File if necessary
			$bridge_object->check_logic_hook_file();
			
			
			//Predefine AlertShell Object
			$alert_shell_object = new WorkFlowAlertShell();
			$alert_shell_object->name = 'Invite People';
			$alert_shell_object->alert_type = 'Invite';
			$alert_shell_object->source_type = 'System Default';
			$alert_shell_object->parent_id = $bridge_object->id;
			$alert_shell_object->save();
			
			$bridge_object->write_workflow();
			
			
		//end if action_module is Meetings Or Calls
		}
		
	//end function check_for_invitee_bridge	
	}	

	
	function check_for_invitee_bridge_meta($action_array){
		
			//This function needs to be re-worked.

			if(	$action_array['action_module']=="Meetings" ||
			$action_array['action_module'] =="Calls" ||
            $action_array['action_module']=="meetings" ||
			$action_array['action_module'] =="calls"){

				$this->retrieve($action_array['id']);
			
				//grab the bridge object
				$bridge_list = $this->get_linked_beans("action_bridge","WorkFlow");
				
				if(!empty($bridge_list[0])){
					
					return "\t\t 'bridge_id' => '".$bridge_list[0]->id."', \n";	
				}
				
			//end check to see if we need the meta data
			}
			
			return "";	
		
	//end function check_for_invitee_bridge_meta	
	}	
	
	

	function check_for_child_bridge($delete=false){
		
		$query = "SELECT id FROM workflow WHERE parent_id='".$this->id."'";
		$result = $this->db->query($query,true," Error getting child bridge: ");

		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);
	
		if($row!=null){
		
			if($delete==true){
				
				$workflow_object = new WorkFlow();
				$workflow_object->retrieve($row['id']);
				$workflow_object->cascade_delete($workflow_object, false);

			// end if delete is true
			} else {
				
				return $row['id'];	
			}		
				
		//end if a child exists
		}	
		
	//end function check_for_child_bridge
	}	
	
	
	
	
	
	function check_for_child_invitee($action_shell_id){
		
		$this->retrieve($action_shell_id);
		$workflow_id = $this->check_for_child_bridge(false);
		
		if($workflow_id!=""){
			
			$child_workflow_object = new WorkFlow();
			$child_workflow_object->retrieve($workflow_id);
			
				$child_alertshell_list = & $child_workflow_object->get_linked_beans('alerts','WorkFlowAlertShell');	
			
				if(!empty($child_alertshell_list[0])){
					//now check for an actual invitee
					$alert_list = $child_alertshell_list[0]->get_linked_beans('alert_components','WorkFlowAlert');
				
					
					if(!empty($alert_list)){
						
						//an invitee must be present!
						return true;
						
					//end if not empty alert list	
					}	
					
				//end if there is a child alertshell
				}
			
		//end if workflow_id is not empty
		}
	
	
		return false;
		
		
	//end function check_for_child_invitees
	}	
	
///End Class WorkFlowActionShells
}

?>

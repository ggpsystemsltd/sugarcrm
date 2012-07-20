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
require_once('include/workflow/time_utils.php');
require_once('include/workflow/alert_utils.php');
require_once('include/workflow/glue.php');


// WorkFlow is used to store the workflow objects.
class WorkFlow extends SugarBean {
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
	var $description;
	var $type;
	var $status;
	var $base_module;
	var $record_type;
	var $fire_order;

	var $parent_id;

	var $list_order_y = 0;

	//used for the writing of triggers
	var $secondary_count = 0;

	var $table_name = "workflow";
	var $module_dir = "WorkFlow";
	var $object_name = "WorkFlow";

	var $rel_triggershells_table = 	"workflow_triggershells";
	var $rel_triggers_table = 		"workflow_triggers";
	var $rel_alertshells_table = 		"workflow_alertshells";
	var $rel_alerts_table = 		"workflow_alerts";
	var $rel_actionshells_table = 		"workflow_actionshells";
	var $rel_actions_table = 		"workflow_actions";


	//Glue variables
	var $glue_object;


	var $new_schema = true;

	var $column_fields = Array("id"
		,"name"
		,"date_entered"
		,"date_modified"
		,"modified_user_id"
		,"created_by"
		,"description"
		,"type"
		,"status"
		,"base_module"
		,"list_order_y"
		,"record_type"
		,"fire_order"
		,"parent_id"
		);

//Controller Array for list_order element
	var $controller_def = Array(
		 "list_x" => "N"
		,"list_y" => "Y"
		,"parent_var" => "base_module"
		,"start_var" => "list_order_y"
		,"start_axis" => "y"
		);



	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	// This is the list of fields that are in the lists.
	var $list_fields = array('id', 'name', 'type', 'status', 'base_module', 'list_order_y');

	var $relationship_fields = Array();


	// This is the list of fields that are required
	var $required_fields =  array("name"=>1, 'base_module'=>1, 'type'=>1);

    // This is a member variable to flag whether or not we really call mark_deleted on the cascade_delete call
    var $delete_workflow_on_cascade = true;

	function WorkFlow() {
		parent::SugarBean();

		$this->disable_row_level_security =false;

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
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
		$query = "SELECT $this->table_name.* ";
		if($custom_join){
   								$query .= $custom_join['select'];
 		}
 		$query .= " FROM $this->table_name ";
 		if($custom_join){
  				$query .= $custom_join['join'];
		}
		$where_auto = "$this->table_name.deleted=0";

                if($where != "")
                        $query .= "where ($where) AND ".$where_auto;
                else
                        $query .= "where ".$where_auto;

                if(!empty($order_by))
                        $query .= " ORDER BY $order_by";

                return $query;
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


	function get_custom_query(){

		$query = "SELECT cq.name from $this->rel_custom_queries cq, $this->table_name p1 where cq.id = p1.query_id and p1.id = '$this->id' and p1.deleted=0 and cq.deleted=0";
		$result = $this->db->query($query,true," Error filling in additional custom query detail fields: ");

		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);

		if($row != null)
		{
			$this->query_name = $row['name'];
		}
		else
		{
			$this->query_name = '';
		}
	}

    /** Returns a list of the associated product_templates
     * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
     * All Rights Reserved.
     * Contributor(s): ______________________________________..
    */

    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false)
    {
    	$ret = array();
    	$custom_join = $this->custom_fields->getJOIN();
        $ret['select'] = "SELECT workflow.id, workflow.name, workflow.base_module, workflow.type, workflow.status, workflow.list_order_y ";
    	if($custom_join){
            $ret['select'] .= $custom_join['select'];
        }

        $ret['from'] = " FROM ".$this->table_name." ";
        if($custom_join){
            $ret['from'] .= $custom_join['join'];
        }

        $where_auto = "deleted=0 AND ( parent_id IS NULL OR parent_id = '' )";

        if($where != "")
            $ret['where'] = "where ($where) AND ".$where_auto;
        else
            $ret['where'] = "where ".$where_auto;

        if(!empty($order_by))
             $ret['order_by'] = " ORDER BY $order_by";
        else
             $ret['order_by'] = "";

       if($return_array)
        {
            return $ret;
        }

        return  $ret['select'] . $ret['from'] . $ret['where']. $ret['order_by'];
    }

	function get_list_view_data(){
		global $app_strings, $mod_strings;
		global $app_list_strings;

		global $current_user;


		$temp_array = parent::get_list_view_data();
		$temp_array['NAME'] = (($this->name == "") ? "<em>blank</em>" : $this->name);
		$temp_array['TYPE'] = $app_list_strings['wflow_type_dom'][$this->type];
		$temp_array['BASE_MODULE'] = $app_list_strings['moduleList'][$this->base_module];
		$temp_array['LIST_ORDER'] = $this->list_order_y;
		$temp_array['HREF_DELETE'] = "index.php?action=Delete&module=WorkFlow&record=".$this->id."";

		if(empty($this->status)) $this->status = "Inactive";
		if($this->status == 1 || $this->status== "checked") $this->status = "Active";

		$temp_array['STATUS'] = $app_list_strings['oc_status_dom'][$this->status];
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





function get_module_array($use_object_name=false, $start_none=false){


	if($use_object_name == true){
		return convert_module_to_singular(get_module_map($start_none));
	} else {
		return get_module_map();
	}



//end function get_module_array
}

function get_limited_module_array(){

	return $this->filter_base_modules();

//end function get_limited_module_array
}

function filter_base_modules(){

	global $app_list_strings;
	$module_array = array();

		$query = "	SELECT DISTINCT base_module
					FROM workflow
					WHERE workflow.deleted = '0'";

		$result = $this->db->query($query,true," Grabbing current list of modules used in workflow: ");

		while($row = $this->db->fetchByAssoc($result)){

			$module_array[$row['base_module']] = $row['base_module'];
			$module_array[$row['base_module']] = $app_list_strings['moduleList'][$row['base_module']];
		//end while
		}

	return $module_array;

//end function filter_base_modules
}


///////////////////////////////////////////////////Aquiring WorkFLow Components Area////////////

	function get_relationship_modules($column_module=""){

		//convert this to something dynamic based on the new relationship structure - jgreen

		$column_select_array = array(

	'Contacts' => 'Contacts',
    'Accounts' => 'Accounts',
    'Opportunities' => 'Opportunities',

    );

		return $column_select_array;

	//end function get_relationship_modules
	}


	function get_column_data($orderBy="")
	{
		// First, get the list of IDs.
		$query = 	"SELECT $this->rel_dataset.id from $this->rel_dataset
					 where $this->rel_dataset.report_id='$this->id'
					 AND $this->rel_dataset.deleted=0 ".$orderBy;

		return $this->build_related_list($query, new DataSet());
	}


	function get_column_select($drop_down_module=""){

	global $beanList;
	$this->column_options = array();
	if(!empty($drop_down_module)){
		$column_module = $drop_down_module;
	} else {
		$column_module = $this->base_module;
	}

	//Get dictionary data for base bean and all connected beans

	//Get dictionary and focus data for base bean
		$vardef_name = $beanList[$column_module];

		if(!file_exists('modules/'. $column_module . '/vardefs.php')){
			return;
		}

		include_once('modules/'. $column_module . '/'.$vardef_name.'.php');
		$temp_focus = new $vardef_name();
		$this->add_to_column_select($temp_focus, $column_module);


	//Loop through existing columns for connecting beans



	//end loop

	return $this->column_options;

	//end function get_column_select
	}


	function add_to_column_select($temp_focus, $module_name){
		global $dictionary;
		global $current_language;
		global $app_strings;

		$temp_module_strings = return_module_language($current_language, $temp_focus->module_dir);

		$base_array = $dictionary[$temp_focus->object_name]['fields'];




	foreach($base_array as $key => $value){

		$label_name = $value['vname'];
		if(!empty($temp_module_strings[$label_name])){
			$label_name = $temp_module_strings[$label_name];
		} else {
			if(!empty($app_strings[$label_name])){
			$label_name = $app_strings[$label_name];
			}
		}
		if(!empty($value['table'])){
			//Custom Field
			$column_table = $value['table'];
		} else {
			//Non-Custom Field
			$column_table = $temp_focus->table_name;
		}

		$index = $key;
		$value = "(".$value['name'].")".$label_name;

		$this->column_options[$index] = $value;

	//end foreach
	}


	//end function add_to_column_select
	}


	function get_module_info($module_name){

		//expand this function to return other types of module information based on the name

		global $beanList;
		global $dictionary;

		//Get dictionary and focus data for module
		$vardef_name = $beanList[$module_name];

		if(!file_exists('modules/'. $module_name . '/'.$vardef_name.'.php')){
			return;
		}

		include_once('modules/'. $module_name . '/'.$vardef_name.'.php');

		$module_bean = new $vardef_name();

		return $module_bean;

	//end function get_module_table
	}

	function get_field_table($module, $field){

		$seed_object = $this->get_module_info($module);
		$field_table = $this->determine_field_type($seed_object, $field);

	return $field_table;

	//end function get_module_table
	}


	function determine_field_type($seed_object, $field){

	global $dictionary;
		if(!empty($dictionary[$seed_object->object_name]['fields'][$field]['custom_type'])){
		//field is present in the module's custom table.  Retrieve this table and use as query
			$custom_join = $this->custom_fields->getJOIN();
			$field_select = $seed_object->table_name."_cstm.".$field;

		} else {
			//field is not custom and present in module table
			$field_select = $seed_object->table_name.".".$field;
		}

			return $field_select;
	//end function determine_field_type
	}


////////LABEL DISPLAY FUNCTION



	//only call this after the bean has been made and the vardef file exists
	function display_label($focus, $field){

		global $dictionary;

		if(!file_exists('modules/'. $focus->module_dir . '/'.$focus->object_name.'.php')){
			return $field;
		}

		$var_name = $dictionary[$focus->object_name]['fields'][$field]['vname'];
		$current_module_strings = return_module_language($current_language, $focus->object_name);

		if(!empty($current_module_strings[$var_name])){

			return $current_module_strings[$var_name];

		} else {
			return $field;
		}


	//end function display_label
	}



	/////////////////RUN QUERY FUNCTIONS//////////



	function run_query(){

		//Create the glue object
		require_once('modules/QueryBuilder/QueryGlue.php');
		$query_glue = new QueryGlue($this);

		$query_glue->build_select();

		return $query_glue->glue_select(true);

	//end function run_query
	}





/////////////////////Build trigger & alerts component pages

function write_workflow(){

	write_workflow($this);

	//re-run the parent object build also
	if($this->parent_id!=""){
		$parent_object = $this->get_parent_object();
		$parent_object->write_workflow();
	}

}



function get_trigger_contents(){

		$this->glue_object = new WorkFlowGlue();
		$this->glue_object->start_trigger_meta_array();
		$this->glue_object->start_alert_meta_array();
		$this->glue_object->start_action_meta_array();

		//BEGIN WFLOW PLUGINS
		$this->glue_object->start_plugin_meta_array();
		//END WFLOW PLUGINS
		$trigger_count = 0;
		$trigger_time_count = 0;

		$eval_dump = "";


		/*Special note about this query.

		This query is designed to only get workflow objects that have at least a primary
		triggershell OR it will get a workflow object that is a bridging object, denoted
		by the fact that their is a parent id.

		TODO - jgreen - Need to re-arrange this function a bit and how this write workflow
		functions.

		*/


		$query = "	SELECT $this->table_name.id id,
					$this->table_name.fire_order fire_order,
					$this->table_name.type type,
					$this->table_name.record_type record_type,
					$this->table_name.parent_id parent_id,
					$this->rel_triggershells_table.eval eval,
					$this->rel_triggershells_table.type trigger_type,
					$this->rel_triggershells_table.id triggershell_id,
					$this->rel_triggershells_table.parameters parameters,
					$this->rel_triggershells_table.field target_field,
					$this->rel_triggershells_table.rel_module rel_module,
					$this->rel_triggershells_table.rel_module_type rel_module_type
					 FROM $this->table_name
					 LEFT JOIN ".$this->rel_triggershells_table."
					 ON ".$this->rel_triggershells_table.".parent_id =
					 ".$this->table_name.".id
					 WHERE ".$this->table_name.".deleted = 0
					 AND ".$this->table_name.".base_module = '".$this->base_module."'
					 AND ".$this->table_name.".status = 1
					 AND (

					 (".$this->rel_triggershells_table.".frame_type='Primary'
					 AND ".$this->rel_triggershells_table.".deleted=0 )

					 OR (
					 	$this->table_name.parent_id IS NOT NULL AND
					 	$this->table_name.parent_id !=''
					 	)
					 )

					 " ;


					 $query .= " ORDER BY ".$this->table_name.".list_order_y asc
					 ";
					// echo $query;
					 //exit;
		$result = $this->db->query($query,true," Error getting trigger contents for trigger write: ");
//RRS
$alert_file_contents = "";
		// Get the id and the name.
		while($row = $this->db->fetchByAssoc($result, false)){

			///BEGIN check to see if this is new, update, or all, then add proper if statement
            $record_type_needed = write_record_type($eval_dump, $row['record_type'], $row);

			$trigger_processed=false;
			if($row['trigger_type']=="compare_count"){

				$eval = "get_trigger_count_bool(\$focus, \$trigger_meta_array['trigger_count_".$trigger_count."'])===true \n";

				//write the meta array
				$this->glue_object->build_trigger_triggers("trigger_count_".$trigger_count, $row['triggershell_id']);
				$trigger_processed=true;
			}
			if($row['trigger_type']=="trigger_record_change"){
				$eval = "true";
				$trigger_processed=true;
			}
			if($row['trigger_type']=="filter_rel_field"){
				$this->glue_object->build_trigger_triggers("trigger_".$trigger_count, $row['triggershell_id']);
				$eval_dump .= "\t \$primary_array = array();\n";
				$eval_dump .= "\t \$primary_array = check_rel_filter(\$focus, \$primary_array, '".$row['rel_module']."', \$trigger_meta_array['trigger_".$trigger_count."'], '".$row['rel_module_type']."'); \n";
				$eval = "(\$primary_array['results']==true)\n";
				$trigger_processed=true;
			}
			//bridging type
			if(!empty($row['parent_id'])){
				//check if this is a bridging object
				$trigger_id = $row['id']; //wdong, bug 25015, the $row['triggershell_id'] maybe empty here. and then $row['id'] is just what we want.
                if(!empty($row['triggershell_id'])){
                    $trigger_id = $row['triggershell_id'];
                }
				$eval = "isset(\$focus->bridge_id) && \$focus->bridge_id == '".$trigger_id."' ";
				$trigger_processed=true;

			}


			if(	$row['trigger_type']=="compare_specific" ||
				$row['trigger_type']=="compare_change" ||
				$row['trigger_type']=="compare_any_time" ||
				$row['trigger_type']=="filter_field"){

				$eval = html_entity_decode($row['eval'], ENT_QUOTES);
				$trigger_processed=true;
			}



			//BEGIN WFLOW PLUGINS

				//prepare the opt array
				$opt['object'] = $this;
				$opt['row'] = $row;
				$opt['trigger_position'] = "Primary";
				$opt['trigger_count'] = $trigger_count;
				$opt['trigger_time_count'] = $trigger_time_count;
				$opt['array_position_name']= "plugin_".$trigger_count;

				if($trigger_processed==false){
					$eval_array = get_plugin("workflow", "trigger_glue", $opt);
					if(!empty($eval_array['trigger_processed']) && $eval_array['trigger_processed']==true){

						$eval = $eval_array['eval'];
						$trigger_processed=true;

					//end if processed is true
					}
				}

			//END WFLOW PLUGINS


			if($trigger_processed==false){
				$eval = html_entity_decode($row['eval'], ENT_QUOTES);
				$trigger_processed=true;
			}




			$eval_dump .= "\n if(";
			$eval_dump .= $eval;
			$eval_dump .= "){ \n";

			$eval_dump .= " \n\n";

			//Frame Secondary items
			$eval_dump .= "\t //Frame Secondary \n\n";
			$eval_dump .= $this->get_front_triggers_secondary($row['id'], $trigger_count);


			if($row['type']=='Time'){



				$trigger_object = new WorkFlowTriggerShell();

				$time_interval_array = $trigger_object->get_time_int($row['triggershell_id']);




				//check the triggershell type
				if($row['trigger_type']=="compare_any_time"){
				$eval_dump .= "\t \$time_array['time_int'] = '".$row['parameters']."'; \n\n";
				$eval_dump .= "\t \$time_array['parameters'] = \$focus->".$row['target_field']."; \n\n";
				$eval_dump .= "\t \$time_array['time_int_type'] = 'normal'; \n\n";
				$eval_dump .= "\t \$time_array['target_field'] = 'none'; \n\n";
				//end if compare_any_time is the trigger type
				} else {
					$eval_dump .= "\t \$trigger_time_count = '".$trigger_time_count."'; \n\n ";
					$eval_dump .= "\t \$time_array['time_int'] = '".$time_interval_array['time_int']."'; \n\n";
					$eval_dump .= "\t \$time_array['time_int_type'] = '".$time_interval_array['time_int_type']."'; \n\n";
					$eval_dump .= "\t \$time_array['target_field'] = '".$time_interval_array['target_field']."'; \n\n";
				}



				$eval_dump .= "\t \$workflow_id = '".$row['id']."'; \n\n";
				$eval_dump .= 'if(!empty($_SESSION["workflow_cron"]) && $_SESSION["workflow_cron"]=="Yes" &&
				!empty($_SESSION["workflow_id_cron"]) && $_SESSION["workflow_id_cron"]==$workflow_id){
				';
			//end if type is time
			}

			//BEGIN WFLOW PLUGINS
					$eval_dump_array = get_plugin("workflow", "trigger_eval_dump", $opt);
					if(!empty($eval_dump_array['eval_dump']) && $eval_dump_array['eval_dump']!=""){

						$eval_dump .= $eval_dump_array['eval_dump'];

					//end if eval dump produces plugin output
					}



			//END WFLOW PLUGINS
			//Begin Infinit loop catch, check to see if this workflow has already been triggered this save.
			//We need a unique ID composed only of \w characters, Unix Time works pretty well.
			$randID = str_replace('-', '_', create_guid());
			$eval_dump.= "\n\tglobal \$triggeredWorkflows;\n"
					   . "\tif (!isset(\$triggeredWorkflows['{$randID}'])){\n\t\t"
					   . "\$triggeredWorkflows['{$randID}'] = true;\n";

			if($row['fire_order']=='alerts_actions'){
				$eval_dump .= "\t" . $this->get_alert_contents($row['id'], $trigger_count, $this->base_module);
				$eval_dump .= "\t" . $this->get_action_contents($row['id'], $trigger_count, $this->base_module);
			}

			if($row['fire_order']=='actions_alerts'){
				$eval_dump .= "\t" . $this->get_action_contents($row['id'], $trigger_count, $this->base_module);
				$out_data = $this->get_alert_contents_for_file($row['id'], $trigger_count, $this->base_module);
                $eval_dump .= "\t" . $out_data[0];
                $alert_file_contents .= $out_data[1];
            }

			//END infinit loop catch
			$eval_dump.= "\t}\n";

			if($row['type']=='Time'){
				$eval_dump .= "}\n\n";
				++ $trigger_time_count;
				$eval_dump .= "else{\n";
				$eval_dump .= get_time_contents($row['id']);
				$eval_dump .= "}\n\n";
			//end if type is time
			}

			$eval_dump .= " \n\n";



			//End Frame Secondary items
			$eval_dump .= "\t //End Frame Secondary \n\n";
			$eval_dump .= $this->get_back_triggers_secondary();

			$eval_dump .= " \n\n";
			$eval_dump .= " //End if trigger is true \n";
			$eval_dump .= " } \n\n";


			///END check to see if this is new, update, or all
			if($record_type_needed===true){
				$eval_dump .= "\t\t //End if new, update, or all record";
				$eval_dump .= "\n \t\t} \n\n";
			}

			++$trigger_count;

		//end while
		}

		$this->glue_object->end_trigger_meta_array();
		$this->glue_object->write_trigger_meta_file($this->base_module);

		$this->glue_object->end_alert_meta_array();
		$this->glue_object->write_alert_meta_file($this->base_module);

		$this->glue_object->end_action_meta_array();
		$this->glue_object->write_action_meta_file($this->base_module);
		//BEGIN WFLOW PLUGINS
		$this->glue_object->end_plugin_meta_array();
		$this->glue_object->write_plugin_meta_file($this->base_module);
		//END WFLOW PLUGINS

        //RRS
        if(!empty($alert_file_contents)){
            $this->glue_object->write_workflow_alerts_file($this->base_module, $alert_file_contents);
        }



	return $eval_dump;

//end function get_trigger_contents
}


function get_front_triggers_secondary($workflow_id, & $trigger_count){

	$eval = "\t \$secondary_array = array(); \n";


	//ORDER BY the related_module and then by the type being all, then any
	//type 'all' must be checked first before the rel_list loses some items, otherwise
	//you can get in-accurate information

	$query = "	SELECT *
				FROM ".$this->rel_triggershells_table."
				WHERE ".$this->rel_triggershells_table.".parent_id='".$workflow_id."'
				AND ".$this->rel_triggershells_table.".deleted=0
				AND ".$this->rel_triggershells_table.".frame_type='Secondary'
				ORDER BY rel_module, rel_module_type ASC";

		$result = $this->db->query($query,true," Error getting trigger contents for trigger write: ");

		$secondary_count = 0;
			$eval .= "\t //Secondary Triggers \n";
		// Get the id and the name.
		while($row = $this->db->fetchByAssoc($result, false)){
			$real_secondary = $secondary_count + 1;




			$eval .= "\t //Secondary Trigger number #".$real_secondary."\n";

				$eval_reached = false;

			if($row['type']=="filter_field"){
				$eval .= "\t if(";
				$eval .= html_entity_decode($row['eval'], ENT_QUOTES);
				$eval .= "\t ){ \n";
				$eval_reached = true;
			}
			if($row['type']=="filter_rel_field"){
				$this->glue_object->build_trigger_triggers("trigger_".$trigger_count."_secondary_".$secondary_count, $row['id']);
				$eval .= "\t \$secondary_array = check_rel_filter(\$focus, \$secondary_array, '".$row['rel_module']."', \$trigger_meta_array['trigger_".$trigger_count."_secondary_".$secondary_count."'], '".$row['rel_module_type']."'); \n";
				$eval .= "\t if(";
				$eval .= "(\$secondary_array['results']==true)";
				$eval .= "\t ){ \n";
				$eval_reached = true;
			}
			if($row['type']=="trigger_record_change"){
				$eval .= "\t if(true){ \n";
				$eval_reached = true;
			}
			//BEGIN WFLOW PLUGINS

				//prepare the opt array
				$opt['object'] = $this;
				$opt['row'] = $row;
				$opt['trigger_position'] = "Secondary";
				$opt['trigger_count'] = $trigger_count;
				$opt['secondary_count'] = $secondary_count;
				$opt['real_secondary'] = $real_secondary;
				$opt['array_position_name']= "plugin_".$trigger_count."_secondary_".$secondary_count;

				if($eval_reached==false){

					$eval_array = get_plugin("workflow", "trigger_glue", $opt);
					if(!empty($eval_array['trigger_processed']) && $eval_array['trigger_processed']==true){

						$eval .= "\t if(";
						$eval .= $eval_array['eval'];
						$eval .= "\t ){ \n";
						$eval_reached=true;

					//end if processed is true
					}
				}

			//END WFLOW PLUGINS



			if($eval_reached == false){
				$eval .= "\t if(";
				$eval .= html_entity_decode($row['eval'], ENT_QUOTES);
				$eval .= "\t ){ \n";
			}

			$eval .= "\t \n\n";


			++$secondary_count;

		//end while
		}

		$this->secondary_count = $secondary_count;
		return $eval;

//end get_front_trigger_flow
}

function get_back_triggers_secondary(){

	$eval= "";


	for ($i = 0; $i < $this->secondary_count; $i++){

			$real_secondary = $i + 1;
			$eval .= "\t // End Secondary Trigger number #".$real_secondary."\n";
			$eval .= " \t } \n\n";

	//end the forloop
	}

	$eval .= "\t unset(\$secondary_array); \n";

	return $eval;

}

function get_alert_contents($workflow_id, $trigger_count, $alert_array_name){

	$alert_count = 0;

	$alert_string = "";

		$query = "	SELECT $this->rel_alertshells_table.parent_id parent_id,
							$this->rel_alertshells_table.id id,
					$this->rel_alertshells_table.alert_text alert_text,
					$this->rel_alertshells_table.source_type source_type,
					$this->rel_alertshells_table.alert_type alert_type,
					$this->rel_alertshells_table.custom_template_id custom_template_id
					FROM $this->rel_alertshells_table
					WHERE $this->rel_alertshells_table.deleted = 0
					AND $this->rel_alertshells_table.parent_id = '".$workflow_id."'
				 ";
		$result = $this->db->query($query,true," Error getting trigger contents for trigger write: ");

		// Get the id and the name.
		while($row = $this->db->fetchByAssoc($result)){


			$alert_string .="\t \$alertshell_array = array(); \n\n";

			if($row['source_type']=="Custom Template"){
				//use custom msg
				$alert_string .="\t \$alertshell_array['alert_msg'] = \"".$row['custom_template_id']."\"; \n\n";

			} else {
				//use regular msg
				$alert_string .="\t \$alertshell_array['alert_msg'] = \"".$row['alert_text']."\"; \n\n";

			}

			$alert_string .="\t \$alertshell_array['source_type'] = \"".$row['source_type']."\"; \n\n";
			$alert_string .="\t \$alertshell_array['alert_type'] = \"".$row['alert_type']."\"; \n\n";


			//Check for bridging object.  This is for meetings/calls
			if($row['alert_type']=="Invite"){
				$check_for_bridge = "true";
			} else {
				$check_for_bridge = "false";
			}


			$array_position_name = $alert_array_name."".$trigger_count."_alert".$alert_count;

			$this->glue_object->build_trigger_alerts($row['id'], $array_position_name);

			$alert_string .= "\t process_workflow_alerts(\$focus, \$alert_meta_array['".$array_position_name."'], \$alertshell_array, ".$check_for_bridge."); \n ";

		++ $alert_count;

		//end while statement
		}

		$alert_string .= "\t unset(\$alertshell_array); \n";
return $alert_string;

//end function get_alert_contents
}

/**
 * Return the contents for the workflow_alerts.php file
 * @param workflow_id - the unique id of this workflow
 * @param trigger_count - the number associated with the trigger for this alert
 * @param alert_array_name - the unique number associated with this alert array
 *
 * @return the contents for the file
 */
function get_alert_contents_for_file($workflow_id, $trigger_count, $alert_array_name){

    $alert_count = 0;

    $alert_string = "";
	$eval_dump = '$_SESSION[\'WORKFLOW_ALERTS\'] = isset($_SESSION[\'WORKFLOW_ALERTS\']) && is_array($_SESSION[\'WORKFLOW_ALERTS\']) ? $_SESSION[\'WORKFLOW_ALERTS\'] : array();'."\n";
	$eval_dump .= "\t\t".'$_SESSION[\'WORKFLOW_ALERTS\'][\''.$alert_array_name.'\'] = isset($_SESSION[\'WORKFLOW_ALERTS\'][\''.$alert_array_name.'\']) '
	            . '&& is_array($_SESSION[\'WORKFLOW_ALERTS\'][\''.$alert_array_name.'\']) ? $_SESSION[\'WORKFLOW_ALERTS\'][\''.$alert_array_name.'\'] : array();'."\n";
	$eval_dump .= "\t\t".'$_SESSION[\'WORKFLOW_ALERTS\'][\''.$alert_array_name.'\'] = array_merge($_SESSION[\'WORKFLOW_ALERTS\'][\''.$alert_array_name.'\'],array (';
        $query = "  SELECT $this->rel_alertshells_table.parent_id parent_id,
                            $this->rel_alertshells_table.id id,
                    $this->rel_alertshells_table.alert_text alert_text,
                    $this->rel_alertshells_table.source_type source_type,
                    $this->rel_alertshells_table.alert_type alert_type,
                    $this->rel_alertshells_table.custom_template_id custom_template_id
                    FROM $this->rel_alertshells_table
                    WHERE $this->rel_alertshells_table.deleted = 0
                    AND $this->rel_alertshells_table.parent_id = '".$workflow_id."'
                 ";
        $result = $this->db->query($query,true," Error getting trigger contents for trigger write: ");

        // Get the id and the name.
        while($row = $this->db->fetchByAssoc($result)){
            $array_position_name = $alert_array_name."".$trigger_count."_alert".$alert_count;
            $eval_dump .= '\''.$array_position_name.'\',';
            $alert_string .= 'function process_wflow_'.$array_position_name.'(&$focus){
            include("custom/modules/'.$alert_array_name. '/workflow/alerts_array.php");';
            $alert_string .="\n\n\t \$alertshell_array = array(); \n\n";

            if($row['source_type']=="Custom Template"){
                //use custom msg
                $alert_string .="\t \$alertshell_array['alert_msg'] = \"".$row['custom_template_id']."\"; \n\n";

            } else {
                //use regular msg
                $alert_string .="\t \$alertshell_array['alert_msg'] = \"".$row['alert_text']."\"; \n\n";

            }

            $alert_string .="\t \$alertshell_array['source_type'] = \"".$row['source_type']."\"; \n\n";
            $alert_string .="\t \$alertshell_array['alert_type'] = \"".$row['alert_type']."\"; \n\n";


            //Check for bridging object.  This is for meetings/calls
            if($row['alert_type']=="Invite"){
                $check_for_bridge = "true";
            } else {
                $check_for_bridge = "false";
            }




            $this->glue_object->build_trigger_alerts($row['id'], $array_position_name);

            $alert_string .= "\t process_workflow_alerts(\$focus, \$alert_meta_array['".$array_position_name."'], \$alertshell_array, ".$check_for_bridge."); \n ";
            $alert_string .= "\t unset(\$alertshell_array); \n";
            $alert_string .= "\t }\n\n";
        ++ $alert_count;

        //end while statement
        }
        $eval_dump .= '));';

return array($eval_dump, $alert_string);

//end function get_alert_contents
}


function get_action_contents($workflow_id, $trigger_count, $action_module_name){

	$action_count = 0;

	$action_string = "";

		$query = "	SELECT *
					FROM $this->rel_actionshells_table
					WHERE deleted = 0
					AND parent_id = '".$workflow_id."'
				 ";
		$result = $this->db->query($query,true," Error getting trigger action shells for shell write: ");

		// Get the id and the name.
		while($row = $this->db->fetchByAssoc($result)){

			$process=true;

			if($row['action_type']=="new" && ($row['action_module']=="Calls" || $row['action_module']=="Meetings" || $row['action_module']=="calls" || $row['action_module']=="meetings")){


				$actionshell_object = new WorkFlowActionShell();
				$process = $actionshell_object->check_for_child_invitee($row['id']);


			//end special child check for meetings/calls
			}




			if($process==true){

				$plugin_process = false;

			//BEGIN WFLOW PLUGINS

				//prepare the opt array
				$opt['object'] = $this;
				$opt['row'] = $row;
				$opt['array_position_name']= "plugin_".$trigger_count."_action".$action_count;



					$action_output_array = get_plugin("workflow", "action_glue", $opt);
					if(!empty($action_output_array['action_processed']) && $action_output_array['action_processed']==true){

						$action_string .= $action_output_array['action_string'];
						$plugin_process=true;

						++ $action_count;

					//end if processed is true
					}


			//END WFLOW PLUGINS







					if($plugin_process==false){

						$array_position_name = $action_module_name."".$trigger_count."_action".$action_count;

						$this->glue_object->build_trigger_actions($row['id'], $array_position_name, $row);

						$action_string .= "\t process_workflow_actions(\$focus, \$action_meta_array['".$array_position_name."']); \n ";

						++ $action_count;




					}
			//end if process is true
			}

		//end while statement
		}


return $action_string;

//end function get_alert_contents
}



////////////////GETTING RELATED MODULE PULLDOWNS

function get_field_value_array($base_module=false, $inclusion_type=false, $exclusion_type=false){




	if($base_module==false){
		$base_module = $this->base_module;
	}

	if($exclusion_type=="Field"){
			$exclusion_array = array('link' => 'link');
		} else {
			$exclusion_array = "";
		}



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

	$field_option_list = get_column_select($base_module, "", $exclusion_array, $inclusion_array);
	//return the field value array with an inclusion array to only have assigned users

	return $field_option_list;
}

/////we should be able to remove the below function!!! replaced by vardefhandler
function get_rel_module_array($include_none=false){

	$inclusion_array = array('link' => 'link');

	$field_option_list = get_column_select($this->base_module, "", "", $inclusion_array, $include_none);
	//return the field value array with an inclusion array to only have linking vardef elements

	return $field_option_list;
}

function get_rel_module($var_rel_name, $get_rel_name = false){


	//get the vardef fields relationship name
	//get the base_module bean
	$module_bean = get_module_info($this->base_module);
	require_once('data/Link.php');
	$rel_name = Relationship::retrieve_by_modules($var_rel_name, $this->base_module, $GLOBALS['db']);
	if(!empty($module_bean->field_defs[$rel_name])){
		$var_rel_name = $rel_name;
	}
	$var_rel_name = strtolower($var_rel_name);
    if($get_rel_name)
    {
        //bug #46246: should set relationship name instead of related field name
        $this->rel_name = isset($rel_name) ? $rel_name : $var_rel_name;
    }
	$rel_attribute_name = $module_bean->field_defs[$var_rel_name]['relationship'];
	//use the vardef to retrive the relationship attribute
	unset($module_bean);

	return get_rel_module_name($this->base_module, $rel_attribute_name, $this->db);

}



function check_logic_hook_file(){

$module_name = $this->base_module;
$event = "before_save";
$action_array = array('1', 'workflow','include/workflow/WorkFlowHandler.php', 'WorkFlowHandler', 'WorkFlowHandler');

check_logic_hook_file($module_name, $event, $action_array);

}


//////////Repair function for repairing or cleaning up cached (Custom Folder) files

function repair_workflow(){

	$query = "SELECT DISTINCT base_module, id FROM $this->table_name WHERE deleted = 0";

	$result = $this->db->query($query,true," Error repairing workflow: ");

		// Get the id and the name.
		while($row = $this->db->fetchByAssoc($result)){

			//Instantiate the workflow object and run the write
			//$temp_workflow = new WorkFlow();
			$this->retrieve($row['id']);
			$this->check_logic_hook_file();
			$this->write_workflow();
		//end while loop of workflow items
		}



//end function repair_workflow
}

	function get_parent_object(){

		//check for parent object, and if it exists, then grab and return.
		//This is used for bridiging workflow objects.  Needed for invite/recipient components

		if($this->parent_id!=""){

			$action_shell_object = new WorkFlowActionShell();
			$action_shell_object->retrieve($this->parent_id);
			$workflow_object = new WorkFlow();
			$workflow_object->retrieve($action_shell_object->parent_id);
			return $workflow_object;
		}
			//parent does not exist so return self
			return $this;


	//end function get_parent_object
	}


    /**
     * cascade_delete
     * This function handles the management of related workflow components when a workflow is deleted.  The
     * cascade_delete call is also run when the target module of an existing workflow is modified so that the
     * workflow may invalidate the related workflow alerts, actions, etc.
     *
     * @param Mixed $focus variable of the Workflow instance to run cascading deletes against
     * @param bool $check_controller boolean flag indicating whether or not to readjust the ordering of workflow;
     * defaults to true
     */
	function cascade_delete(& $focus, $check_controller=true){


		//Completely remove the trigger components////////////////////////
					$trigger_object_list = $focus->get_linked_beans('triggers','WorkFlowTriggerShell');
					if(!empty($trigger_object_list)){

					foreach($trigger_object_list as $trigger_object){

				//mark delete trigger components and sub expression components
				mark_delete_components($trigger_object->get_linked_beans('future_triggers','Expression'));
				mark_delete_components($trigger_object->get_linked_beans('past_triggers','Expression'));
				$trigger_object->mark_deleted($trigger_object->id);
			//end the foreach loop on trigger objects
			}

		//end if any alert objects exist
		}

		//Completely remove the trigger filter components////////////////////////
		$trigger_object_list = $focus->get_linked_beans('trigger_filters','WorkFlowTriggerShell');
		if(!empty($trigger_object_list)){

			foreach($trigger_object_list as $trigger_object){

				//mark delete trigger filter components and sub expression components
				mark_delete_components($trigger_object->get_linked_beans('expressions','Expression'));
				$trigger_object->mark_deleted($trigger_object->id);
			//end the foreach loop on trigger filter objects
			}

		//end if any alert objects exist
		}
		//Completely remove the alert components/////////////////////////
		$alert_object_list = $focus->get_linked_beans('alerts','WorkFlowAlertShell');
		if(!empty($alert_object_list)){

			foreach($alert_object_list as $alert_object){

				//mark delete alert components and sub expression components

				//Alert recipient Object///////
					$alert_object_list2 = $alert_object->get_linked_beans('alert_components','WorkFlowAlert');

					foreach($alert_object_list2 as $alert_object2){
						mark_delete_components($alert_object2->get_linked_beans('expressions','Expression'));
						mark_delete_components($alert_object2->get_linked_beans('rel1_alert_fil','Expression'));
						mark_delete_components($alert_object2->get_linked_beans('rel2_alert_fil','Expression'));
						$alert_object2->mark_deleted($alert_object2->id);

					//end foreach alert_object2
					}

				//End Alert recipient Object/////

				$alert_object->mark_deleted($alert_object->id);
			//end the forloop on the alert objects
			}

		//end if any alert objects exist
		}

		//Completely remove the action components////////////////////////
		//mark delete actionshell components, action components and sub expression components
		$action_shell_list = $focus->get_linked_beans('actions','WorkFlowActionShell');

		foreach($action_shell_list as $action_shell_object){


			//check for bridged child (invites for meetings/calls
			$action_shell_object->check_for_child_bridge(true);

			//mark delete actionshell sub components and actionshell
			mark_delete_components($action_shell_object->get_linked_beans('actions','WorkFlowAction'));
			mark_delete_components($action_shell_object->get_linked_beans('rel1_action_fil','Expression'));
			$action_shell_object->mark_deleted($action_shell_object->id);
		}

		if($check_controller==true){

		//Handle re-processing orders
		$controller = new Controller();
		$controller->init($focus, "Delete");
		$controller->delete_adjust_order($focus->base_module);

		}

		//mark deleted the workflow object if delete_workflow_on_cascade is set to true
        if($focus->delete_workflow_on_cascade)
        {
		    $focus->mark_deleted($focus->id);
        }
		$focus->write_workflow();

	//end function cascade_delete
	}

function getActiveWorkFlowCount() {
    $activeCount = 0;
    $query = "SELECT COUNT( * ) as active_count FROM workflow WHERE deleted=0 and status=1";
    $result = $this->db->query($query);
    $row = $this->db->fetchByAssoc($result);
    $activeCount = $row['active_count'];
    return $activeCount;
}
//end class
}

?>

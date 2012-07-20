<?php
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/



class MergeRecord extends SugarBean {
    var $object_name = 'MergeRecord';
    var $module_dir = 'MergeRecords';
	var $acl_display_only = true;
    var $merge_module;
    var $merge_bean_class;
    var $merge_bean_file_path;

    var $merge_module2;
    var $merge_bean_class2;
    var $merge_bean_file_path2;

    var $master_id;

    //these arrays store the fields and params to search on
    var $field_search_params = Array ();

    //this is a object for the bean you are merging on
    var $merge_bean;
    var $merge_bean2;

    //store a copy of the merge bean related strings
    var $merge_bean_strings = Array ();

    function MergeRecord($merge_module = '', $merge_id = '') {
        global $sugar_config;
       //parent :: SugarBean();

        if ($merge_module != '')
            $this->load_merge_bean($merge_module, $merge_id);
    }

    function retrieve($id) {
        if (isset ($_REQUEST['action']) && $_REQUEST['action'] == 'Step2')
            $this->load_merge_bean($this->merge_bean, false, $id);
        else
            parent :: retrieve($id);
    }

    function load_merge_bean($merge_module, $load_module_strings = false, $merge_id = '') {
        global $moduleList;
        global $beanList;
        global $beanFiles;
        global $current_language;

        $this->merge_module = $merge_module;
        $this->merge_bean_class = $beanList[$this->merge_module];
        $this->merge_bean_file_path = $beanFiles[$this->merge_bean_class];

        require_once ($this->merge_bean_file_path);
        $this->merge_bean = new $this->merge_bean_class();
        if ($merge_id != '')
            $this->merge_bean->retrieve($merge_id);
        
        // Bug 18853 - Disable this view if the user doesn't have edit and delete permissions
        if ( !$this->merge_bean->ACLAccess('edit') || !$this->merge_bean->ACLAccess('delete') ) {
            ACLController::displayNoAccess();
            sugar_die('');
        }
        
        //load master module strings
        if ($load_module_strings)
            $this->merge_bean_strings = return_module_language($current_language, $merge_module);
    }

    // Bug 22994, when the search key words are in other module, there needs to be another merge_bean.
    function load_merge_bean2($merge_module, $load_module_strings = false, $merge_id = '') {
        global $moduleList;
        global $beanList;
        global $beanFiles;
        global $current_language;

        $this->merge_module2 = $merge_module;
        $this->merge_bean_class2 = $beanList[$this->merge_module2];
        $this->merge_bean_file_path2 = $beanFiles[$this->merge_bean_class2];

        require_once ($this->merge_bean_file_path2);
        $this->merge_bean2 = new $this->merge_bean_class2();
        if ($merge_id != '')
            $this->merge_bean2->retrieve($merge_id);
        //load master module strings
        if ($load_module_strings)
            $this->merge_bean_strings2 = return_module_language($current_language, $merge_module);
    }

    var $new_schema = true;

    //-----------------------------------------------------------------------
    //-------------Wrapping Necessary Merge Bean Calls-----------------------
    //-----------------------------------------------------------------------
    
    function fill_in_additional_list_fields() {
        return $this->merge_bean->fill_in_additional_list_fields();
    }

    function fill_in_additional_detail_fields() {
        return $this->merge_bean->fill_in_additional_detail_fields();
    }

    function get_summary_text() {
        return $this->merge_bean->get_summary_text();
    }

    function get_list_view_data() {
        return $this->merge_bean->get_list_view_data();
    }
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------

    /**
    	builds a generic search based on the query string using or
    	do not include any $this-> because this is called on without having the class instantiated
    */
    function build_generic_where_clause($the_query_string) {
        return $this->merge_bean->build_generic_where_clause($the_query_string);
    }

    //adding in 4.0+ acl function for possible acl stuff down the line
    function bean_implements($interface) {
        switch ($interface) {
            case 'ACL' :
                return true;
        }
        return false;
    }
    
    function ACLAccess($view,$is_owner='not_set'){
        global $current_user;

        //if the module doesn't implement ACLS or is empty  
        if(empty($this->merge_bean) || !$this->merge_bean->bean_implements('ACL'))
        {
        	return true;
        }
        
        if($is_owner == 'not_set'){
            $is_owner = $this->merge_bean->isOwner($current_user->id);
        }
        return ACLController::checkAccess($this->merge_bean->module_dir,'edit', true);
    }
    

    //keep save function to handle anything special on merges
    function save($check_notify = FALSE) {
            //something here
    return parent :: save($check_notify);
    }

    function populate_search_params($search_params) {
       foreach ($this->merge_bean->field_defs as $key=>$value) {
            $searchFieldString=$key.'SearchField';
            $searchTypeString=$key.'SearchType';
             
            if (isset($search_params[$searchFieldString]) ) {

                if (isset($search_params[$searchFieldString]) == '') {
                    $this->field_search_params[$key]['value']='NULL';
                } else {
                    $this->field_search_params[$key]['value']=$search_params[$searchFieldString];
                }
                if (isset ($search_params[$searchTypeString])) {
                    $this->field_search_params[$key]['search_type'] = $search_params[$searchTypeString];
                } else {
                    $this->field_search_params[$key]['search_type'] = 'Exact';
                }
                //add field_def to the array.
                $this->field_search_params[$key] = array_merge($value,$this->field_search_params[$key] );
            }
       }
    }
    
    function get_inputs_for_search_params($search_params) 
    {
        $returnString = '';
        foreach ($this->merge_bean->field_defs as $key=>$value) {
            $searchFieldString=$key.'SearchField';
            $searchTypeString=$key.'SearchType';
            
            if (isset($search_params[$searchFieldString]) ) {
                $returnString .= "<input type='hidden' name='$searchFieldString' value='{$search_params[$searchFieldString]}' />\n";
                $returnString .= "<input type='hidden' name='$searchTypeString' value='{$search_params[$searchTypeString]}' />\n";
            }
        }
        
        return $returnString;
    }
    
    function email_addresses_query($table, $module, $bean_id) {
    	$query = $table.".id IN (SELECT ear.bean_id FROM email_addresses ea
									LEFT JOIN email_addr_bean_rel ear ON ea.id = ear.email_address_id 
									WHERE ear.bean_module = '{$module}'
									AND ear.bean_id != '{$bean_id}' 
									AND ear.deleted = 0";
    	return $query;
    }
    
    function release_name_query($search_type, $value) {
    	$this->load_merge_bean2('Releases');
    	if($search_type=='like') {
        	$where = "releases.name LIKE '%".$GLOBALS['db']->quote($value)."%'";
    	}
    	elseif($search_type=='start'){
    	    $where = "releases.name LIKE '".$GLOBALS['db']->quote($value)."%'";
    	}
    	else {
    	    $where = "releases.name = '".$GLOBALS['db']->quote($value)."'";
    	}
    	$list=$this->merge_bean2->get_releases(false,'Active',$where);
        foreach($list as $key => $value){
            $list_to_join[]="'".$GLOBALS['db']->quote($key)."'";
        }
        $in=implode(', ', $list_to_join);
        return $in;
    }

    function create_where_statement() {
        $where_clauses = array ();
        foreach ($this->field_search_params as $merge_field => $vDefArray) {
        	if (isset ($vDefArray['source']) && $vDefArray['source'] == 'custom_fields') {
        		$table_name = $this->merge_bean->table_name."_cstm";
            } else {
                $table_name = $this->merge_bean->table_name;
            }

            //Should move these if's into a central location for extensibility and addition for other search filters
            //Must do the same for pulling values in js dropdown
            if (isset ($vDefArray['search_type']) && $vDefArray['search_type'] == 'like') {
                if ($merge_field != "email1" && $merge_field != "email2" && $merge_field !="release_name") {
                	if ($vDefArray['value'] != '') {
	                	array_push($where_clauses, $table_name.".".$merge_field." LIKE '%".$GLOBALS['db']->quote($vDefArray['value'])."%'");
                	}
                }
                elseif($merge_field =="release_name"){
                    if(isset($vDefArray['value'])){
						$in = $this->release_name_query('like',$vDefArray['value']);
                        array_push($where_clauses, $table_name.".found_in_release IN ($in)");
                    }
                }
                else {
	                $query = $this->email_addresses_query($table_name, $this->merge_module, $this->merge_bean->id);
	                $query .= " AND ea.email_address LIKE '%".$GLOBALS['db']->quote($vDefArray['value'])."%')";
	                $where_clauses[] = $query;
                }
            }
            elseif (isset ($vDefArray['search_type']) && $vDefArray['search_type'] == 'start') {
                if ($merge_field != "email1" && $merge_field != "email2" && $merge_field !="release_name") {
            		array_push($where_clauses, $table_name.".".$merge_field." LIKE '".$GLOBALS['db']->quote($vDefArray['value'])."%'"); 
                }
                elseif($merge_field =="release_name"){
                        if(isset($vDefArray['value'])){
						$in = $this->release_name_query('start',$vDefArray['value']);
                        array_push($where_clauses, $table_name.".found_in_release IN ($in)");
                    }
                }
                else {
	                $query = $this->email_addresses_query($table_name, $this->merge_module, $this->merge_bean->id);
	                $query .= " AND ea.email_address LIKE '".$GLOBALS['db']->quote($vDefArray['value'])."%')";
	                $where_clauses[] = $query;
                }
            }
            else {
                if ($merge_field != "email1" && $merge_field != "email2" && $merge_field !="release_name") {
		            array_push($where_clauses, $table_name.".".$merge_field."='".$GLOBALS['db']->quote($vDefArray['value'])."'");
                }
                elseif($merge_field =="release_name"){
                    if(isset($vDefArray['value'])){
						$in = $this->release_name_query('exact',$vDefArray['value']);
                        array_push($where_clauses, $table_name.".found_in_release IN ($in)");
                    }
                }
                else {
	                $query = $this->email_addresses_query($table_name, $this->merge_module, $this->merge_bean->id);
	                $query .= " AND ea.email_address = '".$GLOBALS['db']->quote($vDefArray['value'])."')";
	                $where_clauses[] = $query;
                }                
            }
        }
        // Add ACL Check
        if($this->merge_bean->bean_implements('ACL') && ACLController::requireOwner($this->merge_bean->module_dir, 'delete') )
        {
            global $current_user;
            $where_clauses[] = $this->merge_bean->getOwnerWhere($current_user->id);
        }
        array_push($where_clauses, $this->merge_bean->table_name.".id !='".$GLOBALS['db']->quote($this->merge_bean->id)."'");
        return $where_clauses;
    }

    //duplicating utils function for now for possiblity of future or/and and
    //other functionality
    function generate_where_statement($where_clauses) {
        $where = '';

        foreach ($where_clauses as $clause) {
            if ($where != "")
                $where .= " AND ";
            $where .= $clause;
        }
        return $where;
    }
}
?>
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

require_once('soap/SoapError.php');

function check_for_relationship($relationships, $module){
	foreach($relationships as $table=>$rel){
		if( $rel['rhs_key'] == $module){
			return $table;

		}
	}
	return false;
}

/*
 * takes in two modules and returns the relationship information about them
 *
 */

function retrieve_relationships_properties($module_1, $module_2, $relationship_name = ""){

	$rs = new Relationship();
	$query =  "SELECT * FROM $rs->table_name WHERE ((lhs_module = '".$rs->db->quote($module_1)."' AND rhs_module='".$rs->db->quote($module_2)."') OR (lhs_module = '".$rs->db->quote($module_2)."' AND rhs_module='".$rs->db->quote($module_1)."'))";
	if(!empty($relationship_name) && isset($relationship_name)){
		$query .= " AND relationship_name = '".$rs->db->quote($relationship_name)."'";
	}
	$result = $rs->db->query($query);

	return $rs->db->fetchByAssoc($result);
}




/*
 * retireves relationships between two modules
 * This will return all viewable relationships between two modules
 * module_query is a filter on the first module
 * related_module_query is a filter on the second module
 * relationship_query is a filter on the relationship between them
 * show_deleted is if deleted items should be shown or not
 *
 */
function retrieve_relationships($module_name,  $related_module, $relationship_query, $show_deleted, $offset, $max_results){
	global  $beanList, $beanFiles, $dictionary, $current_user;

	$error = new SoapError();
	$result_list = array();
	if(empty($beanList[$module_name]) || empty($beanList[$related_module])){

		$error->set_error('no_module');
		return array('result'=>$result_list, 'error'=>$error->get_soap_array());
	}

	$result = retrieve_relationship_query($module_name,  $related_module, $relationship_query, $show_deleted, $offset, $max_results);

	if(empty($result['module_1'])){

		$error->set_error('no_relationship_support');
		return array('result'=>$result_list, 'error'=>$error->get_soap_array());
	}
	$query = $result['query'];
	$module_1 = $result['module_1'];
	$table = $result['join_table'];

	$class_name = $beanList[$module_1];
	require_once($beanFiles[$class_name]);
	$mod = new $class_name();

	$count_query = str_replace('rt.*', 'count(*)', $query);
	$result = $mod->db->query($count_query);
	$row = $mod->db->fetchByAssoc($result);
	$total_count = $row['count(*)'];

	if($max_results != '-99'){
		$result = $mod->db->limitQuery($query, $offset, $max_results);
	}else{
		$result = $mod->db->query($query);
	}
	while($row = $mod->db->fetchByAssoc($result)){

		$result_list[] = $row;
	}

	return array('table_name'=>$table, 'result'=>$result_list, 'total_count'=>$total_count, 'error'=>$error->get_soap_array());
}

/*
 * retrieve_modified_relationships
 *
 * This method retrieves modified relationships between two modules
 * This will return all viewable relationships between two modules
 *
 * @param $module_name String value of the module on the left hand side of relationship
 * @param related_module String value of the module on the right hand side of relationship
 * @param relationship_query SQL String used to query for the relationships
 * @show_deleted boolean value indicating whether or not deleted items should be shown (IGNORED)
 * @offset integer value indicating the starting offset of results to return
 * @max_results integer value indicating the maximum number of results to return
 * @select_fields Mixed Array indicating the select fields used in the query to return in results
 * @relationship_name String value of the relationship name as defined in the relationships table to be used in retrieving the relationship information
 * @return Mixed Array of results with the following delta/value information:
 *         table_name String value of the table name queried for the results
 *         result Mixed Array of the results.  Each entry in the Array contains an Array of key/value pairs from the select_fields parameter
 *         total_count integer value indicating the total count of results from the query
 *         error Mixed Array containing the SOAP errors if found, empty otherwise
 *
 */
function retrieve_modified_relationships($module_name, $related_module, $relationship_query, $show_deleted, $offset, $max_results, $select_fields = array(), $relationship_name = ''){

    global  $beanList, $beanFiles, $dictionary, $current_user;
	$error = new SoapError();
	$result_list = array();
	if(empty($beanList[$module_name]) || empty($beanList[$related_module])){

		$error->set_error('no_module');
		return array('result'=>$result_list, 'error'=>$error->get_soap_array());
	}

	$row = retrieve_relationships_properties($module_name, $related_module, $relationship_name);

	if(empty($row)){

		$error->set_error('no_relationship_support');
		return array('result'=>$result_list, 'error'=>$error->get_soap_array());
	}

	$table = $row['join_table'];
	$has_join = true;
	if(empty($table)){
		//return array('table_name'=>$table, 'result'=>$result_list, 'error'=>$error->get_soap_array());
		$table = $row['rhs_table'];
		$module_1 = $row['lhs_module'];
		$mod_key = $row['lhs_key'];
		$module_2 = $row['rhs_module'];
		$mod2_key = $row['rhs_key'];
		$has_join = false;
	}
	else{
		$module_1 = $row['lhs_module'];
		$mod_key = $row['join_key_lhs'];
		$module_2 = $row['rhs_module'];
		$mod2_key = $row['join_key_rhs'];
	}



	$class_name = $beanList[$module_1];
	require_once($beanFiles[$class_name]);
	$mod = new $class_name();

	$mod2_name = $beanList[$module_2];
	require_once($beanFiles[$mod2_name]);
	$mod2 = new $mod2_name();
	$table_alias = 'rt';
	if($has_join == false){
		$table_alias = 'm1';
	}

	if(isset($select_fields) && !empty($select_fields)){
		$index = 0;
		$field_select ='';

		foreach($select_fields as $field){
			if($field == "id"){
				$field_select .= "DISTINCT m1.id";
			} else {
			    $parts = explode(' ', $field);
			    $alias = '';
			    if(count($parts) > 1) {
			        // have aliases: something like "blah.blah blah"
                    $alias = array_pop($parts);
                    $field = array_pop($parts); // will check for . further down
			    }
			    if($alias == "email1") {
                    // special case for primary emails
                    $field_select .= "(SELECT email_addresses.email_address FROM {$mod->table_name}
                    	LEFT JOIN  email_addr_bean_rel ON {$mod->table_name}.id = email_addr_bean_rel.bean_id
                    		AND email_addr_bean_rel.bean_module='{$mod->module_dir}'
                    		AND email_addr_bean_rel.deleted=0 AND email_addr_bean_rel.primary_address=1
                    	LEFT JOIN email_addresses ON email_addresses.id = email_addr_bean_rel.email_address_id Where {$mod->table_name}.id = m1.ID) email1";
			    } elseif($alias == "email2") {
                    // special case for non-primary emails
                    // FIXME: This is not a DB-safe code. Does not work on SQL Server & Oracle.
                    // Using dirty hack here.
                    $field_select .= "(SELECT email_addresses.email_address FROM {$mod->table_name}
                    	LEFT JOIN  email_addr_bean_rel on {$mod->table_name}.id = email_addr_bean_rel.bean_id
                    		AND email_addr_bean_rel.bean_module='{$mod->module_dir}' AND email_addr_bean_rel.deleted=0
                    		AND email_addr_bean_rel.primary_address!=1
                    	LEFT JOIN email_addresses ON email_addresses.id = email_addr_bean_rel.email_address_id Where {$mod->table_name}.id = m1.ID limit 1) email2";
			    } else {
                    if(strpos($field, ".") == false) {
                        // no dot - field for m1
                        $fieldname = "m1.".$mod->db->getValidDBName($field);
                    } else {
                        // There is a dot in here somewhere.
                        list($table_part,$field_part) = explode('.',$field);
                        $fieldname = $mod->db->getValidDBName($table_part).".".$mod->db->getValidDBName($field_part);
    			    }
    			    $field_select .= $fieldname;
    			    if(!empty($alias)) {
    			        $field_select .= " ".$mod->db->getValidDBName($alias);
    			    }
			    }
			}
			if($index < (count($select_fields) - 1))
			{
				$field_select .= ",";
				$index++;
			}
		}//end foreach
		$query = "SELECT $field_select FROM $table $table_alias ";
	}
	else{
		$query = "SELECT rt.* FROM  $table $table_alias ";
	}

	if($has_join == false){
		$query .= " inner join $mod->table_name m2 on $table_alias.$mod2_key = m2.id AND m2.id = '$current_user->id'";
		if(!$mod2->disable_row_level_security && !is_admin($current_user))
		$query .= "	inner join team_memberships tm2 on tm2.user_id = '$current_user->id' AND tm2.team_id = $table_alias.team_id AND tm2.deleted=0 AND m2.id = '$current_user->id'";
	}
	else{
		$query .= " inner join $mod->table_name m1 on rt.$mod_key = m1.id ";
		$query .= " inner join $mod2->table_name m2 on rt.$mod2_key = m2.id AND m2.id = '$current_user->id'";
		if(!$mod->disable_row_level_security && !is_admin($current_user))
		$query .= "	inner join team_memberships tm1 on tm1.user_id = '$current_user->id' AND tm1.team_id = m1.team_id AND tm1.deleted=0";
		if(!$mod2->disable_row_level_security && !is_admin($current_user))
		$query .= "	inner join team_memberships tm2 on tm2.user_id = '$current_user->id' AND tm2.team_id = m2.team_id AND tm2.deleted=0";
	}

	if(!empty($relationship_query)){
		$query .= ' WHERE ' . string_format($relationship_query, array($table_alias));
	}

	if($max_results != '-99'){
		$result = $mod->db->limitQuery($query, $offset, $max_results);
	}else{
		$result = $mod->db->query($query);
	}
	while($row = $mod->db->fetchByAssoc($result)){
		$result_list[] = $row;
	}

    $total_count = !empty($result_list) ? count($result_list) : 0;
	return array('table_name'=>$table, 'result'=>$result_list, 'total_count'=>$total_count, 'error'=>$error->get_soap_array());
}

function server_save_relationships($list, $from_date, $to_date){
	require_once('include/utils/db_utils.php');
	global  $beanList, $beanFiles;
	$from_date = db_convert("'".$GLOBALS['db']->quote($from_date)."'", 'datetime');
	$to_date = db_convert("'".$GLOBALS['db']->quote($to_date)."'", 'datetime');
	global $sugar_config;
	$db = DBManagerFactory::getInstance();

	$ids = array();
	$add = 0;
	$modify = 0;
	$deleted = 0;

	foreach($list as $record)
	{
		$insert = '';
		$insert_values = '';
		$update = '';
		$select_values	= '';
		$args = array();

		$id = $record['id'];

		$table_name = $record['module_name'];
		$resolve = 1;

		foreach($record['name_value_list'] as $name_value){
			$name = $GLOBALS['db']->quote($name_value['name']);

			if($name == 'date_modified'){
                $value = $to_date;
			}else{
                $value = db_convert("'".$GLOBALS['db']->quote($name_value['value'])."'", 'varchar');
			}
			if($name != 'resolve'){
			if(empty($insert)){
				$insert = '('	.$name;
				$insert_values = '('	.$value;
				if($name != 'date_modified' && $name != 'id' ){
					$select_values = $name ."=$value";
				}
				if($name != 'id'){
					$update = $name ."=$value";
				}
			}else{
				$insert .= ', '	.$name;
				$insert_values .= ', '	.$value;
				if(empty($update)){
					$update .= $name."=$value";
				}else{
					$update .= ','.$name."=$value";
				}

				if($name != 'date_modified' && $name != 'id' ){
					if(empty($select_values)){
						$select_values = $name ."=$value";
					}else{
						$select_values .= ' AND '.$name ."=$value";
					}
				}
			}
			}else{
				$resolve = $value;
			}




		}
		//ignore resolve for now server always wins
		$resolve = 1;
		$insert = "INSERT INTO $table_name $insert) VALUES $insert_values)";
		$update = "UPDATE $table_name SET $update WHERE id=";
		$delete = "DELETE FROM $table_name WHERE id=";
		$select_by_id_date = "SELECT id FROM $table_name WHERE id ='".$GLOBALS['db']->quote($id)."' AND date_modified > $from_date AND date_modified<= $to_date";
		$select_by_id = "SELECT id FROM $table_name WHERE id ='".$GLOBALS['db']->quote($id)."'";
		$select_by_values = "SELECT id FROM $table_name WHERE $select_values";
		$updated = false;


		$result = $db->query($select_by_id_date);
		//see if we have a matching id in the date_range
		if(!($row = $db->fetchByAssoc($result))){
			//if not lets check if we have one that matches the values

			$result = $db->query($select_by_values);
			if(!($row = $db->fetchByAssoc($result))){

				$result = $db->query($select_by_id);
				if($row = $db->fetchByAssoc($result)){

					$db->query($update ."'".$GLOBALS['db']->quote($row['id'])."'" );
					$ids[] = $row['id'];
					$modify++;
				}else{
					$db->query($insert);
					$add++;
					$ids[] = $row['id'];
				}
			}
	}

	}
	return array('add'=>$add, 'modify'=>$modify, 'ids'=>$ids);
}

/*
 *
 * gets the from statement from a query without the order by and without the select
 *
 */
function get_from_statement($query){
	$query = explode('FROM', $query);
	if(sizeof($query) == 1){
		$query = explode('from', $query[0]);
	}
	$query = explode( 'ORDER BY',$query[1]);

	return ' FROM ' . $query[0];

}

function retrieve_relationship_query($module_name,  $related_module, $relationship_query, $show_deleted, $offset, $max_results){
	global  $beanList, $beanFiles, $dictionary, $current_user;
	$error = new SoapError();
	$result_list = array();
	if(empty($beanList[$module_name]) || empty($beanList[$related_module])){

		$error->set_error('no_module');
		return array('query' =>"", 'module_1'=>"", 'join_table' =>"", 'error'=>$error->get_soap_array());
	}

	$row = retrieve_relationships_properties($module_name, $related_module);
	if(empty($row)){

		$error->set_error('no_relationship_support');
		return array('query' =>"", 'module_1'=>"", 'join_table' =>"", 'error'=>$error->get_soap_array());
	}

	$module_1 = $row['lhs_module'];
	$mod_key = $row['join_key_lhs'];
	$module_2 = $row['rhs_module'];
	$mod2_key = $row['join_key_rhs'];

	$table = $row['join_table'];
	if(empty($table)){
		return array('query' =>"", 'module_1'=>"", 'join_table' =>"", 'error'=>$error->get_soap_array());
	}
	$class_name = $beanList[$module_1];
	require_once($beanFiles[$class_name]);
	$mod = new $class_name();

	$mod2_name = $beanList[$module_2];
	require_once($beanFiles[$mod2_name]);
	$mod2 = new $mod2_name();
	$query = "SELECT rt.* FROM  $table rt ";
	$query .= " inner join $mod->table_name m1 on rt.$mod_key = m1.id ";
	$query .= " inner join $mod2->table_name m2 on rt.$mod2_key = m2.id  ";

	//rrs bug: 29890 - if record on Offline Client is assigned to a team the user does not have access to
	//then it will not sync to server, but the relationship will.  We will assume the user would like to ignore team
	//level security; however, I have added it as an variable "DISABLE_ROW_LEVEL_SECURITY" to this file (see above) so that it can be changed
	//by the server and synced down.
	if(defined('DISABLE_ROW_LEVEL_SECURITY')){
		$mod->disable_row_level_security = DISABLE_ROW_LEVEL_SECURITY;
		$mod2->disable_row_level_security = DISABLE_ROW_LEVEL_SECURITY;
	}

	if(!$mod->disable_row_level_security){
		if(!empty($mod->field_defs['team_id'])){
			$query .= " INNER JOIN (select tst.team_set_id from team_sets_teams tst ";
			$query .= " INNER JOIN team_memberships tm1 ON tst.team_id = tm1.team_id
					                       AND tm1.user_id = '$current_user->id'
						                   AND tm1.deleted=0 group by tst.team_set_id) m1_tf on m1_tf.team_set_id  = m1.team_set_id ";
		}
	}
	if(!$mod2->disable_row_level_security){
		if(!empty($mod2->field_defs['team_id'])){
			$query .= " INNER JOIN (select tst.team_set_id from team_sets_teams tst ";
			$query .= " INNER JOIN team_memberships tm2 ON tst.team_id = tm2.team_id
					                       AND tm2.user_id = '$current_user->id'
						                   AND tm2.deleted=0 group by tst.team_set_id) m2_tf on m2_tf.team_set_id  = m2.team_set_id ";
		}
	}

	if(!empty($relationship_query)){
		$query .= ' WHERE ' . $relationship_query;
	}

	return array('query' =>$query, 'module_1'=>$module_1, 'join_table' => $table, 'error'=>$error->get_soap_array());
}

// Returns name of 'link' field between two given modules
function get_module_link_field($module_1, $module_2) {
	global $beanList, $beanFiles;

	// check to make sure both modules exist
	if (empty($beanList[$module_1]) || empty($beanList[$module_2])) {
		return FALSE;
	}

	$class_1 = $beanList[$module_1];
	require_once($beanFiles[$class_1]);

	$obj_1 = new $class_1();

	// loop through link fields of $module_1, checking for a link to $module_2
	foreach ($obj_1->get_linked_fields() as $linked_field) {
		$obj_1->load_relationship($linked_field['name']);
		$field = $linked_field['name'];

		if (empty($obj_1->$field)) {
			continue;
		}

		if ($obj_1->$field->getRelatedModuleName() == $module_2) {
			return $field;
		}
	}

	return FALSE;
}

// Retrieves array of ids for records of $get_module linked to $from_module by $get_id
// Example: to retrieve list of Contacts associated to Account X: $return = get_linked_records("Contacts", "Accounts", "X");
function get_linked_records($get_module, $from_module, $get_id) {
	global $beanList, $beanFiles;

	// instantiate and retrieve $from_module
	$from_class = $beanList[$from_module];
	require_once($beanFiles[$from_class]);
	$from_mod = new $from_class();
	$from_mod->retrieve($get_id);

	$field = get_module_link_field($from_module, $get_module);
	if ($field === FALSE) {
		return FALSE;
	}

	$from_mod->load_relationship($field);
	$id_arr = $from_mod->$field->get();

	//bug: 38065
	if ($get_module == 'EmailAddresses') {
		$emails = $from_mod->emailAddress->addresses;
		$email_arr = array();
		foreach ($emails as $email) {
			$email_arr[] = $email['email_address_id'];
		}
		return $email_arr;
	}

	return $id_arr;
}

?>
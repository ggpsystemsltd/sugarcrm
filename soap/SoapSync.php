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

require_once('soap/SoapRelationshipHelper.php');
set_time_limit(360);

$server->register(
    'sync_get_entries',
    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'from_date'=>'xsd:string', 'to_date'=>'xsd:string','offset'=>'xsd:int', 'max_results'=>'xsd:int', 'select_fields'=>'tns:select_fields','query'=>'xsd:string', 'deleted'=>'xsd:int'),
    array('return'=>'tns:get_entry_list_result_encoded'),
    $NAMESPACE);


function sync_get_entries($session, $module_name,$from_date,$to_date,$offset, $max_results, $select_fields, $query,$deleted){
	$name = strtolower($module_name);
	global  $beanList, $beanFiles, $current_user;
	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	if(empty($beanList[$module_name])){
		$error->set_error('no_module');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	global $current_user;
	if(!check_modules_access($current_user, $module_name, 'read')){
		$error->set_error('no_access');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	if($max_results > 0){
		global $sugar_config;
		$sugar_config['list_max_entries_per_page'] = $max_results;	
	}
	

	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$seed = new $class_name();
	if($offset == '' || $offset == -1){
		$offset = 0;
	}
	$table_name = $seed->table_name;
	
	if(!empty($query)){
	    require_once 'include/SugarSQLValidate.php';
	    $valid = new SugarSQLValidate();
	    if(!$valid->validateQueryClauses($query)) {
            $GLOBALS['log']->error("Bad query: $query");
	        $error->set_error('no_access');
            return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	    }
		$query = "( $query ) AND ";
	}
	
	
	$response = $seed->get_list('',$query. "$table_name.date_modified > ".db_convert("'".$GLOBALS['db']->quote($from_date)."'",'datetime')." AND $table_name.date_modified <= ".db_convert("'".$GLOBALS['db']->quote($to_date)."'",'datetime'), $offset,-1,-1,$deleted);
	$output_list = array();
	$field_list = array();
	//now handle updating info on teams who we no longer have access to 
	$seed->disable_row_level_security = true;
	if( $seed->is_AuditEnabled() && $offset == 0){
		
		//embeded selects would have been better
		$query_team = "SELECT audit_table.parent_id FROM " . $seed->get_audit_table_name() . " audit_table  RIGHT JOIN team_memberships  on team_memberships.deleted = 0 AND team_memberships.team_id = audit_table.before_value_string AND team_memberships.user_id = '$current_user->id'  where audit_table.field_name = 'team_id' AND audit_table.date_created > ".db_convert("'".$GLOBALS['db']->quote($from_date)."'",'datetime')."  AND audit_table.date_created <= ".db_convert("'".$GLOBALS['db']->quote($to_date)."'",'datetime');
		$team_results = $seed->db->query($query_team);
		$team_result_ids = array();
		$team_response = array('list'=>array());
		while($row = $seed->db->fetchByAssoc($team_results)){
			$team_result_ids[] = $row['parent_id'];
		}
		if(!empty($team_result_ids)){
			$query = " $seed->table_name.id IN ('" . implode("', '", $team_result_ids) . "') ";
			$team_response = $seed->get_list('',$query, 0,-99,-1,$deleted);
		}
		
		
		
		foreach($team_response['list'] as $value)
		{
			$output_list[] = get_return_value($value, $module_name, false);
			if(empty($field_list)){
				$field_list = get_field_list($value);	
			}
		}
	}
	
	$list = $response['list'];
	$total_count = $response['row_count'];
	$next_offset = $response['next_offset'];
	
	foreach($list as $value)
	{
		//bug: 31668 - rrs ensure we are sending back the email address along with the bean when performing a sync.
		if(isset($value->emailAddress)){
			$value->emailAddress->handleLegacyRetrieve($value);
		}
		$output_list[] = get_return_value($value, $module_name);
		if(empty($field_list)){
			$field_list = get_field_list($value);	
		}
	}
	/* now get the fields that have had there teams changed*/
	
	
	
	$output_list = filter_return_list($output_list, $select_fields, $module_name);
	$field_list = filter_field_list($field_list,$select_fields, $module_name);
	$myfields = get_encoded($field_list);
	$myoutput = get_encoded($output_list);
	return array('result_count'=>sizeof($output_list), 'next_offset'=>$next_offset, 'total_count'=>$total_count, 'field_list'=>$field_list, 'entry_list'=>$myoutput , 'error'=>$error->get_soap_array());
}


$server->register(
    'sync_set_entries',
    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'from_date'=>'xsd:string', 'to_date'=>'xsd:string', 'sync_entry_list'=>'xsd:string', 'deleted'=>'xsd:int'),
    array('return'=>'tns:sync_set_entries_encoded'),
    $NAMESPACE);

function sync_set_entries($session, $module_name,$from_date, $to_date, $sync_entry_list, $deleted){
	$name = strtolower($module_name);
	
	$entry_list = get_decoded($sync_entry_list);
	
	$status = 0;
	global  $beanList, $beanFiles;
	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	if(empty($beanList[$module_name])){
		$error->set_error('no_module');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	global $current_user;
	require_once('modules/Sync/SyncController.php');
	if(!in_array($module_name, $read_only_override) && !check_modules_access($current_user, $module_name, 'write')){
		$error->set_error('no_access');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	global $sugar_config;
	$sugar_config['list_max_entries_per_page'] = '-99';	
	
	

	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);

	$conflicts = array();
	$in = '';
	$ids = array();
	foreach($entry_list as $value)
	{
		$ids[$value['id']] = $value['id'];
		if($value['resolve'] == 0){
			if(empty($in)){
				$in .= "('" . $GLOBALS['db']->quote($value['id']) . "'";	
			}else{
				$in .= ",'" . $GLOBALS['db']->quote($value['id']) . "'";	
			}
		}
	}
	$list = array();
	$output_list = array();
	$field_list = array();
	if(!empty($in)){
		$in .=')';	
		$seed = new $class_name();
		$table_name = $seed->table_name;
		//query for any of the records that have been modified after the fact
		$response = $seed->get_list('', "$table_name.date_modified > ".db_convert("'".$GLOBALS['db']->quote($from_date)."'",'datetime')." AND $table_name.date_modified <= ".db_convert("'".$GLOBALS['db']->quote($to_date)."'",'datetime')." AND $table_name.id IN $in ",0,-1,-1, (int)$deleted);
		$list = $response['list'];
	
		foreach($list as $value)
		{
		
			//$loga->fatal("Adding another account to the list");
			$cur = new $class_name();

			unset($ids[$value->id]);
			
			$cur->retrieve($value->id);

			$output_list[] = get_return_value($cur, $module_name);
			if(empty($field_list)){
				$field_list = get_field_list($value);	
			}
		}
	
	}
	$myoutput = get_encoded($output_list);

	if(empty($list)){
		foreach($entry_list as $value )
		{
			
				$cur = new $class_name();
				foreach($value['name_value_list'] as $name_value){
					
					$cur->$name_value['name'] = $name_value['value'];
					
				}
				$temp = new $class_name();
				$tmp = $temp->retrieve($cur->id);
				if(empty($tmp)){
					$cur->new_with_id = true;	
				}
				if($value['resolve'] < 1 || $cur->new_with_id){
					$cur->update_date_modified = true;
					$cur->update_modified_by = true;
					$cur->date_modified = $to_date;
					if ($cur->deleted != 0)
						$cur->mark_deleted($cur->id);
					else
						$cur->save();
				}
				
		}
			
			
	
		$status = 'success';
	}else{
		$status = 'conflict';
	}
		
	
	return array('conflicts'=>$myoutput,'status'=> $status, 'ids'=>$ids, 'error'=>$error->get_soap_array());
}


$server->register(
    'sync_get_relationships',
    array('session'=>'xsd:string', 'module_name'=>'xsd:string','related_module'=>'xsd:string', 'from_date'=>'xsd:string', 'to_date'=>'xsd:string','offset'=>'xsd:int', 'max_results'=>'xsd:int','deleted'=>'xsd:int'),
    array('return'=>'tns:get_entry_list_result_encoded'),
    $NAMESPACE);


function sync_get_relationships($session, $module_name,$related_module,$from_date,$to_date,$offset, $max_results, $deleted){
	global  $beanList, $beanFiles;
	$error = new SoapError();
	$output_list = array();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	if(empty($beanList[$module_name]) || empty($beanList[$related_module])){
		$error->set_error('no_module');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	global $current_user;
	if(!check_modules_access($current_user, $module_name, 'read') || !check_modules_access($current_user, $related_module, 'read')){
		$error->set_error('no_access');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	if($max_results > 0 || $max_results == '-99'){
		global $sugar_config;
		$sugar_config['list_max_entries_per_page'] = $max_results;	
	}
	

	$results = retrieve_relationships($module_name,  $related_module, "rt.date_modified > " . db_convert("'".$GLOBALS['db']->quote($from_date)."'", 'datetime'). " AND rt.date_modified <= ". db_convert("'".$GLOBALS['db']->quote($to_date)."'", 'datetime'), $deleted, $offset, $max_results);

	$list = $results['result'];

	foreach($list as $value)
	{
		$output_list[] = array_get_return_value($value, $results['table_name']);
	}
	
	$next_offset = $offset + sizeof($output_list);
	$myoutput = get_encoded($output_list);
	return array('result_count'=>sizeof($output_list),'next_offset'=>$next_offset, 'total_count'=>$results['total_count'], 'field_list'=>array(), 'entry_list'=>$myoutput , 'error'=>$error->get_soap_array());
}
$server->register(
    'sync_set_relationships',
    array('session'=>'xsd:string', 'module_name'=>'xsd:string','related_module'=>'xsd:string', 'from_date'=>'xsd:string', 'to_date'=>'xsd:string','sync_entry_list'=>'xsd:string'),
    array('return'=>'tns:sync_set_entries_encoded'),
    $NAMESPACE);

function sync_set_relationships($session, $module_name, $related_module, $from_date, $to_date, $sync_entry_list, $deleted){
	global  $beanList, $beanFiles;
	global $current_user;
	
	$error = new SoapError();
	$output_list = array();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	if(empty($beanList[$module_name]) || empty($beanList[$related_module])){
		$error->set_error('no_module');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	
	require_once('modules/Sync/SyncController.php');
	if((!check_modules_access($current_user, $module_name, 'write') && !in_array($module_name, $read_only_override)) || 
	   (!check_modules_access($current_user, $related_module, 'write') && !in_array($related_module, $read_only_override))){
		$error->set_error('no_access');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	$entry_list = get_decoded($sync_entry_list);
	$done = server_save_relationships($entry_list, $from_date, $to_date);
	$conflicts = array();
	$con_enc = get_encoded($conflicts);
	return array('conflicts'=>$con_enc,'status'=> 'success', 'ids'=>$done['ids'], 'error'=>$error->get_soap_array());
	
}

/*
 * changes the current user for the session into the user defined by user_name must be an admin to do this
 */
$server->register(
    'sudo_user',
    array('session'=>'xsd:string', 'user_name'=>'xsd:string'),
    array('return'=>'tns:error_value'),
    $NAMESPACE);

function sudo_user($session, $user_name){
	global  $beanList, $beanFiles;
	$error = new SoapError();
	$output_list = array();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');	
		return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
	}
	global $current_user;
	if(is_admin($current_user)){
		$new_user = new User();
		$new_id = $new_user->retrieve_user_id($user_name);
		if($new_id){
			$new_user->retrieve($new_id);
			$current_user = $new_user;	
			$_SESSION['user_id'] = $new_id;
			return $error->get_soap_array();
		}
	}
	$error->set_error('no_access');	
	return $error->get_soap_array();
	
}

$server->register(
    'get_system_status',
    array('session'=>'xsd:string', 'unique_key'=>'xsd:string'),
    array('return'=>'tns:set_entry_result'),
    $NAMESPACE);

function get_system_status($session, $unique_key){
    global  $beanList, $beanFiles, $current_user, $server;
    $error = new SoapError();
    if(!empty($server->requestHeaders)){
		$header = explode('=', $server->requestHeaders);
		
		$uh = new UpgradeHistory();
		if(count($header) == 2 && $uh->is_right_version_greater(explode('.', '5.0.0'), explode('.', $header[1]))){
		    $output_list = array();
		    if(!validate_authenticated($session)){
		        $error->set_error('invalid_login'); 
		        return array('id'=>'', 'error'=>$error->get_soap_array());
		    }
		     
		    $system = new System();
		    $status = $system->getSystemStatus($unique_key, $current_user->id);
		}else{
		 	$system_id = -1;
		    $error->set_error('upgrade_client');
		 }
    }else{
		$system_id = -1;
		$error->set_error('upgrade_client');
	}
    
    return array('id' => $status, 'error' => $error->get_soap_array());
}

$server->register(
    'get_unique_system_id',
    array('session'=>'xsd:string', 'unique_key'=>'xsd:string', 'system_name'=>'xsd:string', 'install_method'=>'xsd:string'),
    array('return'=>'tns:set_entry_result'),
    $NAMESPACE);

function get_unique_system_id($session, $unique_key, $system_name = '', $install_method = 'web'){
	global  $beanList, $beanFiles, $current_user, $server;
	$error = new SoapError();
	if(!empty($server->requestHeaders)){
		$header = explode('=', $server->requestHeaders);
		
		$uh = new UpgradeHistory();
		if(count($header) == 2 && $uh->is_right_version_greater(explode('.', '5.0.0'), explode('.', $header[1]))){
			$output_list = array();
			if(!validate_authenticated($session)){
				$error->set_error('invalid_login');	
				return array('id'=>'', 'error'=>$error->get_soap_array());
			}
		    
		    $system = new System();
		    if($system->canAddNewOfflineClient()){
		        $system->system_key = $unique_key;
		        $system->user_id = $current_user->id;
		        $system->system_name = $system_name;
		        $system->install_method = $install_method;
		        $system->last_connect_date = TimeDate::getInstance()->nowDb();
		        $system_id = $system->retrieveNextKey();
		        if($system_id == -1){
		            $error->set_error('client_deactivated');    
		        }
		    }else{
		        $system_id = -1;
		        $error->set_error('cannot_add_client');
		    }
		}else{
		        $system_id = -1;
		        $error->set_error('upgrade_client');
		    }
	}else{
		$system_id = -1;
	    $error->set_error('upgrade_client');
	}
	return array('id' => $system_id, 'error' => $error->get_soap_array());
	
}

//checks if we can convert to offline client
$server->register(
        'offline_client_available',
        array(),
        array('return'=>'xsd:int'),
        $NAMESPACE); 
        
function offline_client_available(){
	
	$system_config = new Administration();
	$system_config->retrieveSettings('license');
	if(empty($system_config->settings['license_num_lic_oc'])){
		return 0;	
	}
	return 1;
	
}

$server->register(
    'get_quick_sync_data',
    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'related_module_name'=>'xsd:string', 'start'=>'xsd:int', 'count'=>'xsd:int', 'db_type'=>'xsd:string','deleted'=>'xsd:int'),
    array('return'=>'tns:get_quick_sync_result_encoded'),
    $NAMESPACE);
    
function get_quick_sync_data($session, $module_name, $related_module_name, $start, $count, $db_type, $deleted){
	global  $beanList, $beanFiles;
		$error = new SoapError();
	$field_list = array();
	$output_list = array();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');	
		return array('result'=>"",  'result_count'=> 0, 'error'=>$error->get_soap_array());
	}
	if(empty($beanList[$module_name])){
		$error->set_error('no_module');	
		return array('result'=>"",  'result_count'=> 0, 'error'=>$error->get_soap_array());
	}
	global $current_user;
	if(!check_modules_access($current_user, $module_name, 'read')){
		$error->set_error('no_access');	
		return array('result'=>"",  'result_count'=> 0, 'error'=>$error->get_soap_array());
	}
	
	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$seed = new $class_name();
	$table_name = "";
    $is_related_query = false;
	if(empty($related_module_name) || !isset($related_module_name)){
		$params['include_custom_fields'] = true;
		
		$query_list = $seed->create_new_list_query($seed->process_order_by('', null), '1=1', array(), $params, (int)$deleted, '', true, $seed );

	
			
		//	$query = "SELECT " . $seed->table_name . ".*" . $query['from_min'] . ' ' . $query['where'];
		
		$query = "SELECT " . $seed->table_name . ".*";
	        
		$custom_join = false;
		
		if(isset($seed->custom_fields)){
			
			$custom_join = $seed->custom_fields->getJOIN();
			
			if($custom_join)
				
				$query .= ' '.$custom_join['select'];
		
		}
		
		if(empty($query_list['from_min'])){
        	$query .= ' '.$query_list['from'];
        }else{
        	$query .= ' '.$query_list['from_min'];
        }

		if($custom_join)
			
			$query .= ' '.$custom_join['join'];

		
		
		$query .= ' '.$query_list['where'];

	
		
		$table_name = $seed->table_name;
	}
	else{
		$result = retrieve_relationship_query($module_name, $related_module_name, "", $deleted, $start, $count);
		$query = $result['query'];
		$table_name = $result['join_table'];
        $is_related_query = true;
	}
    //set the dbType on the client machine
	$GLOBALS['log']->fatal("Quick Sync Data Query: ".$query);
	$result = $seed->db->generateInsertSQL($seed, $query, $start, $count, $table_name, $db_type, $is_related_query);

	$data['data'] = $result['data'];
	
	$data['cstm'] = $result['cstm_sql'];
	
	$ret_data = base64_encode(serialize($data));
	return array('result'=>$ret_data, 'result_count'=> $result['result_count'], 'next_offset'=> $result['next_offset'], 'total_count'=> $result['total_count'], 'error'=>$error->get_soap_array());
}

	

?>
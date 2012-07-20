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
define('DISABLE_ROW_LEVEL_SECURITY', true);

function start_sync_log(){

}
function end_sync_log(){

}
if(!function_exists("get_encoded")){
	function get_encoded($object){
			return  base64_encode(serialize($object));
	}
	function get_decoded($object){
			return  unserialize(base64_decode($object));

	}
}

function clean_for_sync( $module_name){
	$name = strtolower($module_name);
	global  $beanList, $beanFiles;
	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$seed = new $class_name();
	$table_name = $seed->table_name;
	//$seed->db->query("DELETE FROM $table_name WHERE 1=1");
	$seed->db->query("TRUNCATE TABLE $table_name");
	//clean up custom fields
	if($seed->hasCustomFields()){
		$seed->db->query("TRUNCATE TABLE ".$table_name."_cstm");
	}
}

function clean_relationships_for_sync($module_name,  $related_module){
	if(strtolower($related_module) != 'emailaddresses'){
		global  $beanList, $beanFiles, $dictionary;
		$result_list = array();
		if(empty($beanList[$module_name]) || empty($beanList[$related_module])){
			return false;
		}

		$row = retrieve_relationships_properties($module_name, $related_module);
		if(empty($row)){
			return false;
		}

		if($module_name == $row['lhs_module']){
			$module_1 = $module_name;
			$module_2 = $related_module;
		}else{
			$module_2 = $module_name;
			$module_1 = $related_module;
		}
		$table = $row['join_table'];
		$class_name = $beanList[$module_1];
		require_once($beanFiles[$class_name]);
		$mod = new $class_name();
		$clear_query = "TRUNCATE TABLE $table";
		$result = $mod->db->query($clear_query);
	}
	return true;
}

function get_altered( $module_name,$from_date,$to_date){
	$name = strtolower($module_name);
	global  $beanList, $beanFiles;
	global $disable_date_format;
	$disable_date_format = true;

	global $sugar_config;
	//$sugar_config['list_max_entries_per_page'] = 1000;


	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$seed = new $class_name();
	$table_name = $seed->table_name;

	$removeAutoIncrementFields = false;
	$fieldsToRemove = array();
	if($module_name == 'Quotes'){
		$removeAutoIncrementFields = true;
		$fieldsToRemove = array('quote_num');
	}
	//rrs bug: 29890 - if record on Offline Client is assigned to a team the user does not have access to
	//then it will not sync to server, but the relationship will.  We will assume the user would like to ignore team
	//level security; however, I have added it as an variable "DISABLE_ROW_LEVEL_SECURITY" to this file (see above) so that it can be changed
	//by the server and synced down.
	$seed->disable_row_level_security = DISABLE_ROW_LEVEL_SECURITY;

	$response = $seed->get_list('', "$table_name.date_modified > ".db_convert("'".$GLOBALS['db']->quote($from_date)."'",'datetime')." && $table_name.date_modified <= ".db_convert("'".$GLOBALS['db']->quote($to_date)."'",'datetime'), 0,-1,-1, 2);

	$list = $response['list'];
	$output_list = array();
	$field_list = array();
	foreach($list as $value)
	{
		if($removeAutoIncrementFields){
			foreach($fieldsToRemove as $fieldToRemove){
				unset($value->$fieldToRemove);
			}
		}
		if(isset($value->emailAddress)){
			$value->emailAddress->handleLegacyRetrieve($value);
		}
		$output_list[] = get_return_value($value, $module_name);
		if(isset($_SESSION['force_accept_server'])){
			$output_list[sizeof($output_list) - 1]['resolve'] = $_SESSION['force_accept_server'];
		}else{
			$output_list[sizeof($output_list) - 1]['resolve'] = 0;
		}



	}


	return array('result_count'=>sizeof($output_list),  'entry_list'=>$output_list );
}

function execute_query($module_name, $query){
	global  $beanList, $beanFiles;
	global $sugar_config;
	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$seed = new $class_name();
	$seed->db->query($query);
}

function save_altered($module_name, $list){

	global  $beanList, $beanFiles;

	global $sugar_config;



	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$add = 0;
	$modify = 0;
	if(!empty($list)){
		foreach($list as $record)
		{

			$cur = new $class_name();
			$cur->disable_row_level_security = true;
			$cur->set_created_by = false;
			if(isset($record['name_value_list'])){
				foreach($record['name_value_list'] as $name_value){
					if($name_value['name'] != 'user_preferences'){
						$cur->$name_value['name'] = $name_value['value'];
					}

				}
			}
			$result = $cur->db->query("SELECT * FROM $cur->table_name WHERE id = '".$cur->db->quote($cur->id)."'");

			if(!$result ||  !$cur->db->fetchByAssoc($result) ){
				//teammemberships will be synced
				if($class_name == 'User')$cur->team_exists = true;

				$cur->new_with_id = true;
				$add++;
			}else{
				$modify++;
			}
				$cur->update_date_modified = false;
				$cur->update_modified_by = false;
				$cur->process_save_dates = false;
				$cur->save();
		}
	}
	return array('add'=>$add, 'modify'=>$modify);




}


function get_altered_relationships( $module_name,$related_module,$from_date,$to_date){
	global $disable_date_format;
	$disable_date_format = true;

	$results = retrieve_relationships($module_name,  $related_module, "rt.date_modified > " . db_convert("'".$GLOBALS['db']->quote($from_date)."'", 'datetime'). " AND rt.date_modified <= ". db_convert("'".$GLOBALS['db']->quote($to_date)."'", 'datetime'), 2, 0, -99);
	$list = $results['result'];
	$output_list = array();
	foreach($list as $value)
	{
		$output_list[] = array_get_return_value($value, $results['table_name']);
		//force accept server
		$output_list[sizeof($output_list) - 1]['resolve'] = 1;
	}
	return array('result_count'=>sizeof($output_list), 'entry_list'=>$output_list);

}

function client_save_relationships($list){
	require_once('include/utils/db_utils.php');
	global  $beanList, $beanFiles;

	global $sugar_config;
	$db = DBManagerFactory::getInstance();


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
		foreach($record['name_value_list'] as $name_value){
			$name = $name_value['name'];
			if($name == 'date_modified'){
                $value = db_convert("'".$GLOBALS['db']->quote($name_value['value']). "'", 'datetime');
			}else{
                $value = db_convert("'".$GLOBALS['db']->quote($name_value['value']). "'", 'varchar');
			}

			if(empty($insert)){
				$insert = '('	.$name;
				$insert_values = '('	.$value;
				if($name != 'date_modified' && $name != 'id' ){
					$select_values = $name ."=$value";
				}
				$update = $name ."=$value";
			}else{
				$insert .= ', '	.$name;
				$insert_values .= ', '	.$value;

				$update .= ','.$name."=$value";
				if($name != 'date_modified' && $name != 'id' ){
					if(empty($select_values)){
						$select_values = $name ."=$value";
					}else{
						$select_values .= 'AND '.$name ."=$value";
					}
				}
			}



		}

		$insert = "INSERT INTO $table_name $insert) VALUES $insert_values)";
		$update = "UPDATE $table_name SET $update WHERE id=";
		$delete = "DELETE FROM $table_name WHERE id=";
		$select_by_id = "SELECT id FROM $table_name WHERE id ='$id'";
		$select_by_value = "SELECT id FROM $table_name WHERE $select_values";
		$delete_cleanup = "DELETE FROM $table_name WHERE $select_values AND id !=";
		$updated = false;
		$result = $db->query($select_by_id);
		//see if we have a matching id

		if($row = $db->fetchByAssoc($result)){
			$db->query($update ."'".$db->quote($row['id'])."'" );
			$db->query($delete_cleanup."'".$db->quote($row['id'])."'" );
			$modify++;

		}else{
			//if not lets check if we have one that matches the values
			$result = $db->query($select_by_value);

			if($row = $db->fetchByAssoc($result)){
				$db->query($update ."'".$db->quote($row['id'])."'" );
				$modify++;
			}else{
				$db->query($insert);
				$add++;
			}
	}
	}
	return array('add'=>$add, 'modify'=>$modify);
}


function has_error($result=false){
	global $soapclient;
	if($result){
		if(!isset($result['error'])){
			echo "<br><font color='red'>An error has occured:</font><br>";
			print_r($result);
			echo '<br>';
			echo $soapclient->error_str;
			$GLOBALS['log']->fatal($soapclient->error_str);
			echo '<br>';
			echo $soapclient->response;
			//$GLOBALS['log']->info($soapclient->response);
			return true;
		}
		$error = $result['error'];
	}else{
		$error = array('number'=>0, 'name'=>'', 'description'=>'');
	}

	if($result && empty($soapclient->error_str) && $error['number'] == 0  ){

		return 	false;

	}else{
		if($result || !empty($soapclient->error_str)){
			echo "<br><font color='red'>An error has occured:(".$error['number'] . ") <br>". $error['name'] . "<br>" .$error['description']. '<br></font>';
			$GLOBALS['log']->fatal("SYNC: An error has occured:(".$error['number'] . ") <br>". $error['name'] . "<br>" .$error['description']);
			echo $soapclient->error_str;
			$GLOBALS['log']->fatal($soapclient->error_str);
			echo '<br>';
			echo $soapclient->response;
			//$GLOBALS['log']->info($soapclient->response);
			clear_sync_session();
			die();
			return true;
		}


	return false;

}
}

function display_conflicts($conflicts_encoded){
	$conflicts = get_decoded($conflicts_encoded);
	echo '<div id="conflict_div" style="display:none">';
		echo "<input type='hidden' id='sync_accept' name='sync_accept' value='1'><input type='submit' class='button' value='Accept Server Values'>&nbsp;&nbsp;<input type='submit' onclick='document.sync.sync_accept.value=-1;' class='button' value='Accept Local Values'><br>";
	foreach($conflicts as $conflict){
		display_conflict($conflict);
		flush();
	}
	echo "<input type='submit' class='button' value='Accept Server Values'>&nbsp;&nbsp;<input type='submit' onclick='document.sync.sync_accept.value=-1;' class='button' value='Accept Local Values'>";
	echo '</div>';
	echo "<script>document.getElementById('show_conflict_div').innerHTML = document.getElementById('conflict_div').innerHTML; document.getElementById('conflict_div').innerHTML = ''; </script>";
	flush();
}

function display_conflict($conflict){
	global $beanList, $beanFiles, $disable_date_format, $odd_bg, $even_bg, $locale;
	$module_name = $conflict['module_name'];
	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$cur = new $class_name();
	$disable_date_format = true;
	$cur->retrieve($conflict['id']);

	$title = '<tr><td >&nbsp;</td>';
	$server= '<tr class="oddListRowS1" bgcolor="'.$odd_bg.'"><td><b>Server</b></td>';
	$client= '<tr class="evenListRowS1" bgcolor="'.$even_bg.'"><td><b>Local</b></td>';
	$exists = false;
	foreach($conflict['name_value_list'] as $name_value)
	{
		if(!isset($cur->field_defs[$name_value['name']]['source']) || $cur->field_defs[$name_value['name']]['source'] == 'db'){
		if(isset($cur->$name_value['name'])){
			if( $cur->$name_value['name'] != $name_value['value']){
				$title .= '<th>&nbsp;';
				if(isset($cur->field_defs[$name_value['name']]['vname'])){
					$title .=  translate($cur->field_defs[$name_value['name']]['vname'], $module_name);
				}
				$title .=  '</th>';
				$client .= '<td>&nbsp;' . $cur->$name_value['name']. '</td>';
				$server .= '<td>&nbsp;' . $name_value['value']. '</td>';
				$exists = true;
			}
		} else{
				$title .= '<th>&nbsp;' . $name_value['name']. '</th>';
				$client .= '<td>&nbsp;&nbsp;</td>';
				$server .= '<td>&nbsp;' . $name_value['value']. '</td>';
				$exists = true;

			}
		}

	}
	if($module_name == 'Contacts'){
		$name = $locale->getLocaleFormattedName($cur->first_name, $cur->last_name);
	}else{
		if(isset($cur->name)){
			$name = $cur->name;
		}else{
			$name = $module_name;
		}
	}
	if($exists){
		echo "<b>A Conflict Exists For - <a href='index.php?action=DetailView&module=$module_name&record=$cur->id' target='_blank'>$name</a> </b> <br><table  class='list view' border='0' cellspacing='0' cellpadding='2'>$title</tr>$server</tr>$client</tr></table><br>";
	}else{
		echo "<b>Client and Server Record Match</b><br>";
	}
}





function display_sync_status($status, $id = 'current_status'){
	echo "<script>
			document.getElementById('$id').innerHTML='$status';
		</script>";
}


function retrieve_msg(){
	if(!isset($_SESSION['comp_sync_msg'])){
		return '';
	}
	return $_SESSION['comp_sync_msg'];

}
function store_msg(){
	global $client_sync_msg;
	if(!isset($_SESSION['comp_sync_msg'])){
		$_SESSION['comp_sync_msg']	 ='';
	}

	$_SESSION['comp_sync_msg'] =  $client_sync_msg . $_SESSION['comp_sync_msg'];
}
function add_to_msg($msg, $silent = true, $logonly=false){
	global $client_sync_msg;
	$client_sync_msg .= $msg;
	$GLOBALS['log']->info("SYNC:".strip_tags($msg));

	if(!$logonly){
	display_sync_status($msg, 'current_substatus');
		if(!$silent){
			echo "<script>document.getElementById('current_msg').innerHTML +='$msg'</script>";
			echo str_repeat(' ',256);

			flush();
		}
	}




}

function clear_module_sync_session(){
	unset($_SESSION['sync_entry_list']);
	//unset($_SESSION['sync_start_time']);

}

function clear_sync_session(){
	clear_module_sync_session();
	unset($_SESSION['comp_sync_msg']);
	unset($_SESSION['clean_sync']);
	unset($_SESSION['sync_session']);

}

function sync_users($soapclient, $session, $clean = false, $is_conversion = false){
    $timedate = TimeDate::getInstance();
    global $current_user;
	$last_sync = '1980-07-09 12:00:00';
	$user_id  = $soapclient->call('get_user_id',array('session'=>$session));

	if($user_id == '-1'){
		return false;
	}
	if(!$clean && file_exists('modules/Sync/config.php')){
		require_once('modules/Sync/config.php');
		if(isset($sync_info['last_syncUsers'])){
			$last_sync = $sync_info['last_syncUsers'];
		}
	}else{
		clean_for_sync('Users');
		$clean = true;


	}

	$start_time = $timedate->nowDb();

			$GLOBALS['sugar_config']['disable_team_sanity_check'] = true;
			//rrs: bug 27579. This works fine for most installs, but we had a customer in switzerland and the quotes where being
			//removed from the users.id = '<GUID>' in the where clause causing the query to fail.
			$soapclient->charencoding = false;
			$result = $soapclient->call('sync_get_entries',array('session'=>$session,'module_name'=>'Users','from_date'=>$last_sync,'to_date'=>$start_time,'offset'=>0,'max_results'=>-99, 'select_fields'=>array(),'query'=>"users.id = '$user_id'", 'deleted'=>2 ));

			add_to_msg('Retrieve Current User Record<br>' , true , true);
			if(!has_error($result)){
				//update_progress_bar('records', 55 , 100);
				add_to_msg('Retrieved ' . $result['result_count'] . ' current User Record<br>', true , true);
				$get_entry_list = get_decoded($result['entry_list']);

				//update_progress_bar('records', 65 , 100);
				$done = save_altered('Users', $get_entry_list);
				//update_progress_bar('records', 100 , 100);

			$offset = 0;
			while(true){
				$result = $soapclient->call('sync_get_entries',array('session'=>$session,'module_name'=>'Users','from_date'=>$last_sync,'to_date'=>$start_time,'offset'=>$offset,'max_results'=>50, 'select_fields'=>array('user_name', 'id', 'first_name', 'last_name', 'phone_mobile', 'phone_work', 'employee_status', 'reports_to_id', 'title', 'email1', 'email2', 'deleted', 'status'),'query'=>"users.id != '$user_id'", 'deleted'=>2 ));
				if(!has_error($result)){
					//update_progress_bar('records', 55 , 100);
					add_to_msg('Retrieved ' . $result['result_count'] . ' Records<br>' , true , true);
					$get_entry_list = get_decoded($result['entry_list']);
					//update_progress_bar('records', 65 , 100);
					$done = save_altered('Users', $get_entry_list);
					//update_progress_bar('records', 100 , 100);
					add_to_msg('Added ' . $done['add'] . ' Records <br>' , true , true);
					add_to_msg('Modified ' . $done['modify'] . ' Records <br>' , true , true);
					add_to_msg('Done<br>' , true , true);
					if($result['next_offset'] > $result['total_count'])
				  		break;
					else
						$offset = $result['next_offset'];
				}
			}//end while
					require_once('modules/Sync/config.php');
						$sync_info['last_syncUsers'] = $start_time;

						add_to_msg('Storing Sync Info<BR>', true , true);
						write_array_to_file( 'sync_info', $sync_info, 'modules/Sync/config.php' );
					if($clean){
						//now save the admin account/current user back if it's a clean sync just so we can make sure they still exist

						$temp_user = new User();

						if(!isset($current_user)){
							//retrieve the admin user
							$current_user = new User();
							$current_user->retrieve(1);
						}
						if(!$temp_user->retrieve($current_user->id)){
							$current_user->new_with_id = true;
							$current_user->team_exists = true;
						}
						unset($current_user->user_preferences);
						//rrs: bug - 32739
						$current_user->default_team = null;
						if(!isset($is_conversion) || $is_conversion == false)
							$current_user->save(false);
					}
					$GLOBALS['sugar_config']['disable_team_sanity_check'] = false;
					return true;
				}

			if($clean){
			//now save the admin account/current user back if it's a clean sync just so we can make sure they still exist

			$temp_user = new User();
			if(!$temp_user->retrieve($current_user->id)){
				$current_user->new_with_id = true;
				$current_user->team_exists = true;
			}
			unset($current_user->user_preferences);
			//rrs: bug - 32739
			$current_user->default_team = null;
			if(!isset($is_conversion) || $is_conversion == false)
				$current_user->save(false);

			}
			$GLOBALS['sugar_config']['disable_team_sanity_check'] = false;
			return false;

}
?>
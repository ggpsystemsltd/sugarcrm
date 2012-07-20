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


set_time_limit(3600);
ini_set('default_socket_timeout', 360);
global $theme, $sugar_config;


insert_popup_header($theme);

require_once ('modules/Sync/SyncHelper.php');
require_once ('soap/SoapHelperFunctions.php');
require_once ('include/utils/progress_bar_utils.php');
global $soapclient, $soap_server, $sync_modules;

progress_bar_flush();

if (isset ($_GET['check_available'])) {

	echo get_form_header(translate('LBL_CHECKING_SYNC_AVAILABLE', 'Sync'), '', false);
	display_flow_bar('check_sync_available', .2);
	$start_time = $soapclient->call('get_gmt_time', array ());
	destroy_flow_bar('check_sync_available');
	if ($start_time) {
		$_SESSION['soap_server_available'] = true;
		echo '<b>'.translate('LBL_SERVER_AVAILABLE', 'Sync').'</b>';
		sleep(1);
		if(isset($_REQUEST['clean_sync'])){
			echo '<script>document.location.href="index.php?action=Popup&module=Sync&clean_sync='.$_REQUEST['clean_sync'].'"</script>';
		}
		else{
			echo '<script>document.location.href="index.php?action=Popup&module=Sync";</script>';
		}
		die();
	} else {
		$_SESSION['soap_server_available'] = false;
		echo '<b><font color="red">'.translate('LBL_SERVER_UNAVAILABLE', 'Sync').'</font></b>';
		die();
	}

}

start_sync_log();
$sync_module_index = -1;
$module_steps = 4;
$current_step = 0;
$max = 50;
$rel_max = 100;
$CLEAN_SYNC_MAX = 1000;
$clean_sync = 0;
$display_log = 0;
if (isset ($_REQUEST['display_log']) && $_REQUEST['display_log'] == 1) {
	$display_log = 1;
}

if(isset($_REQUEST['clean_sync']) && $_REQUEST['clean_sync'] == 0){
	$clean_sync = 0;
	$_SESSION['clean_sync'] = 0;

}
if ((isset ($_SESSION['clean_sync']) && $_SESSION['clean_sync'] == 1) || (isset ($_REQUEST['clean_sync']) && $_REQUEST['clean_sync'] == 1)) {
	$clean_sync = 1;
	$_SESSION['clean_sync'] = 1;
}
if($clean_sync == 0){
	 if(!file_exists('modules/Sync/file_config.php')){
	 	$clean_sync = 1;
	 }else{
    		require_once ('modules/Sync/file_config.php');
    		if(isset($file_sync_info['is_first_sync']) && $file_sync_info['is_first_sync']){
    			$clean_sync = 1;
    		}
    	}
}

if(isset($_SESSION['sync_modules'])){
	$sync_modules = $_SESSION['sync_modules'];
}
if (isset ($_REQUEST['sync_module_index'])) {
	$sync_module_index = $_REQUEST['sync_module_index'];
	if ($sync_module_index != -1) {
		$sync_module = $sync_modules[$sync_module_index]['name'];
		$module_steps += sizeof($sync_modules[$sync_module_index]['related']);
	}
} else {
?>
	<?php echo get_form_header(translate('LBL_MODULE_NAME','Sync'),'',false);?>
<table width="100%" class="edit view"><tr><td width="100%" valign="top">

<script>
	function start_sync(accept_server, do_clean_sync){
		var clean_sync = 0;
		if(do_clean_sync){
			clean_sync = 1;
		}
		window.resizeTo(640, 280);
		document.location.href = "index.php?&action=Popup&module=Sync&sync_module_index=-1&new_sync=true&clean_sync=" + clean_sync + "&global_accept_server=" + accept_server;
	}

</script>
<?php 	if($clean_sync == 0){
			$out = "<b>".translate('LBL_CLEAN_SYNC', 'Sync');
		 	$out .= "</b>&nbsp;<input type='checkbox' class='checkbox' id='clean_sync' name='clean_sync' value='1' onclick=\"if(this.checked)alert('".translate('LBL_CLEAN_ALERT', 'Sync')."');\">";
		 	echo $out;
		}
?>
<select id='accept_server' name='accept_server'>
<option value=0><?php echo translate('LBL_PROMPT', 'Sync');?>
<option value=1><?php echo translate('LBL_ACCEPT_SERVER', 'Sync');?>
<option value=-1><?php echo translate('LBL_ACCEPT_CLIENT', 'Sync');?>
</select>
<?php 	if($clean_sync == 0){
			$out = "<input type='button' onclick='start_sync(document.getElementById(\"accept_server\").value, document.getElementById(\"clean_sync\").checked)' value='".translate('LBL_START_SYNC', 'Sync')."' class='button'>&nbsp;&nbsp";
		}else{
			$out = "<input type='button' onclick='start_sync(document.getElementById(\"accept_server\").value, true)' value='".translate('LBL_START_SYNC', 'Sync')."' class='button'>&nbsp;&nbsp";
		}
		echo $out;
?>
</td></tr></table>
	<?php


	die();
}

if (!empty ($_REQUEST['new_sync'])) {
	clear_sync_session();
}
if (isset ($_REQUEST['global_accept_server'])) {
	$_SESSION['force_accept_server'] = $_REQUEST['global_accept_server'];

}

echo '<div id ="sync_table" style="display:inline"><form action="index.php" id="sync" name="sync"><input type="hidden" name="action" value="Popup"><input type="hidden" id="display_log" name="display_log" value="'.$display_log.'"><input type="hidden" name="clean_sync" value="'.$clean_sync.'"><input type="hidden" name="module" value="Sync"><input type="hidden" name="sync_module_index" value="'.$sync_module_index.'">';

if ($sync_module_index > -1) {
	$last_sync = '1980-07-09 12:00:00';
	$local_last_sync = '1980-07-09 12:00:00';
	$sync_info = array ('last_sync' => $last_sync);
	$sync_info = array ('local_last_sync' => $local_last_sync);
	if (file_exists('modules/Sync/config.php')) {
		require_once ('modules/Sync/config.php');

		if (isset ($sync_info['last_sync'.$sync_module]) && $clean_sync == 0) {
			$last_sync = $sync_info['last_sync'.$sync_module];
			$local_last_sync = $sync_info['local_last_sync'.$sync_module];
		}
	}
	if (!empty ($app_list_strings['moduleList'][$sync_module]))
		$title = $app_list_strings['moduleList'][$sync_module];
	else
		$title = $sync_module;

	$title = get_form_header(translate('LBL_MODULE_NAME', 'Sync').' '.$title, '', false);
	$title = str_replace(array ("\r\n", "\n", "'"), array ('', '', '"'), $title);
	global $timedate;

	echo '<table width="100%" class="edit view"><tr><td width="50%" valign="top"><b><div id="current_status">&nbsp;</div></b>';
	display_progress_bar($sync_module, $current_step, $module_steps);
	echo '<br>';

	if (isset ($_REQUEST['offset'])) {
		echo '<div id="records_progress_div" style="display:inline">';
		echo 'Retrieving Records<br>';
		display_progress_bar('records', $_REQUEST['offset'], $_REQUEST['count']);
	} else {
		if (isset ($_REQUEST['sync_accept'])) {
			echo '<div id="records_progress_div" style="display:inline">';
		} else {
			echo '<div id="records_progress_div" style="display:none">';
		}
		echo 'Retrieving Records<br>';
		display_progress_bar('records', 0, 100);
	}
	echo '</div></td><td width=50% valign="top">';
	echo get_form_header('Total', '', false);
	display_progress_bar('Total', $sync_module_index, sizeof($sync_modules));
	echo '<br><div id="current_substatus">'.$title.'</div>';
	echo '<input type="button" name="stop_sync_btn" id="stop_sync_btn" class="button" value="Stop Sync" onclick="window.close();">';
	echo '</td></tr></table>';
	echo '<table width="100%"><tr><td colspan="2" id="current_msg"  valign="top"><div id="show_conflict_div">&nbsp;<div></td></tr>';
	echo '<tr><td colspan="2" id="retrieve_msg"  valign="top">';
	if ($display_log == 0)
		echo '<div id="retrieve_msg_divlink" style="display:inline"><a href="#" onclick="document.getElementById(\'display_log\').value = 1; toggleDisplay(\'retrieve_msg_div\');">display log</a></div><div id="retrieve_msg_div" style="display:none">';
	echo retrieve_msg();
	if ($display_log == 0)
		echo '</div>';
	echo "</td><td align='right'><A href='http://www.sugarcrm.com' target='_blank'><!--not_in_theme!--><img style='margin-top: 2px' border='0' width='106' height='23' src='include/images/poweredby_sugarcrm.png' alt='".$mod_strings['LBL_POWERED_BY_SUGAR']."'></a></td></tr></table></div><script>document.getElementById('sync_table').style.display='inline';</script>";
	echo str_repeat(' ', 256);

	flush();
	require_once ('include/nusoap/nusoap.php'); //must also have the nusoap code on the ClientSide.
	$soapclient = new nusoapclient($soap_server); //define the SOAP Client an
	$soapclient->response_timeout = 360;
	if (empty ($_SESSION['sync_start_time'])) {
		//get the what the server says is gmt time
		$start_time = $soapclient->call('get_gmt_time', array ());
		$local_time = $timedate->nowDb();

		if (has_error()) {
			add_to_msg('Could not connect to server');
			die();
		}

		add_to_msg("Sync started at LOCAL:".$timedate->to_display_date_time($local_time, true)."  SERVER:".$timedate->to_display_date_time($start_time, true)."<br>");
		flush();
		$_SESSION['sync_start_time'] = $start_time;
		$_SESSION['sync_local_time'] = $local_time;

	} else {

		$start_time = $_SESSION['sync_start_time'];
		$local_time = $_SESSION['sync_local_time'];
		add_to_msg("Sync started at LOCAL:".$timedate->to_display_date_time($local_time, true)."  SERVER:".$timedate->to_display_date_time($start_time, true)."<br>");
		flush();

	}

	if (!isset ($_REQUEST['offset']) && !isset ($_REQUEST['rel_offset'])) {
		add_to_msg($title, true, true);
		add_to_msg("<br>Module: ".$sync_module." <br>Last Sync- LOCAL:".$timedate->to_display_date_time($local_last_sync, true)." SERVER:".$timedate->to_display_date_time($last_sync, true)."<br>", false);
	}
	display_sync_status($title);
	//if we have an offset we already cleared the module
	if ($clean_sync == 1 && empty ($_REQUEST['offset']) && empty ($_REQUEST['rel_offset'])) {
		add_to_msg("Clearing Records For ".$sync_module);
		clean_for_sync($sync_module);
		$max = $CLEAN_SYNC_MAX;
		$rel_max = $CLEAN_SYNC_MAX;
	}
	//Step 1 Retrieve Records From Local Machine
	if (empty($_REQUEST['offset']) && empty($_REQUEST['rel_offset'])) {
		add_to_msg("Retrieving Modified Records - Local<br>", false);
		//Current Time In GMT
		if ($sync_modules[$sync_module_index]['direction'] == 'both' || $sync_modules[$sync_module_index] == 'up') {
			if (!isset ($_SESSION['sync_entry_list'])) {
				$altered = get_altered($sync_module, $local_last_sync, $local_time);
			} else {
				$altered = array ('entry_list' => $_SESSION['sync_entry_list']);
			}
		}


	$current_step ++;
	update_progress_bar($sync_module, $current_step, $module_steps);

	if (isset ($_REQUEST['sync_accept'])) {
		if ($_REQUEST['sync_accept'] == 1) {
			add_to_msg('Accepting Server Side On Conflicts<br>');
			for ($i = 0; $i < sizeof($altered['entry_list']); $i ++) {
				$altered['entry_list'][$i]['resolve'] = 1;
			}
		}
		if ($_REQUEST['sync_accept'] == -1) {
			add_to_msg('Accepting Client Side On Conflicts<br>');
			for ($i = 0; $i < sizeof($altered['entry_list']); $i ++) {
				$altered['entry_list'][$i]['resolve'] = -1;
			}
		}

	}
	}else{
		$current_step ++;
		update_progress_bar($sync_module, $current_step, $module_steps);
	}
	$current_step ++;
	update_progress_bar($sync_module, $current_step, $module_steps);

	if (!isset ($_SESSION['sync_session'])) {
		add_to_msg("Logging Into Server...");
		$result = $soapclient->call('login', array ('user_auth' => array ('user_name' => $current_user->user_name, 'password' => $current_user->user_hash, 'version' => '1.5'), 'application_name' => 'MobileClient'));

		if (!has_error($result)) {

			$session = $result['id'];
			$_SESSION['sync_session'] = $session;
			$mods = $soapclient->call('get_available_modules', array('session'=>$session));


foreach($sync_modules as $name=>$val){


				if(in_array($val['name'], $mods['modules'])){
					$new_related = array();
					foreach($val['related'] as $rel_key=>$rel){
						if(in_array($rel, $mods['modules'])){
							$new_related[] = $rel;
						}
					}
					$sync_modules[$name]['related'] = $new_related;
				}else{
					unset($sync_modules[$name]);

				}

			}
			$new_sync_modules = array();
			foreach($sync_modules as $mod){
				$new_sync_modules[] = $mod;
			}
			$sync_modules = $new_sync_modules;
			$_SESSION['sync_modules'] = $sync_modules;

		} else {
			add_to_msg('Fail<br>');
		}

	} else {
		$session = $_SESSION['sync_session'];
		$sync_modules = $_SESSION['sync_modules'];
		$result = array ('error' => array ('number' => 0, 'name' => 'none', 'description' => 'no error'));
	}

	$current_step ++;
	update_progress_bar($sync_module, $current_step, $module_steps);
	//Begin Sync

	if (!empty ($session)) {

		//if we have an offset we have already been down this path so we already uploaded data
		if (empty($_REQUEST['offset']) && empty($_REQUEST['rel_offset'])) {
			echo '<script>document.getElementById("records_progress_div").style.display="inline"</script>';
			update_progress_bar('records', 0, 100);
			if ($sync_modules[$sync_module_index]['direction'] == 'both' || $sync_modules[$sync_module_index]['direction'] == 'up') {
				$_SESSION['sync_entry_list'] = $altered['entry_list'];
				$commit = get_encoded($altered['entry_list']);

				add_to_msg('Sending '.sizeof($altered['entry_list']).' Modified Records<br>', false);
				update_progress_bar('records', 20, 100);
				flush();

				$result = $soapclient->call('sync_set_entries', array ('session' => $session, 'module_name' => $sync_module, 'from_date' => $last_sync, 'to_date' => $start_time, 'sync_entry_list' => $commit, 'deleted' => 2));

				update_progress_bar('records', 50, 100);
			}
		}
		if (isset ($_REQUEST['offset']) || $sync_modules[$sync_module_index]['direction'] == 'both' || $sync_modules[$sync_module_index]['direction'] == 'up' || !has_error($result)) {
			echo '<script>document.getElementById("records_progress_div").style.display="inline"</script>';
			if (isset ($result['status'])) {
				add_to_msg('Returned Status: '.$result['status'].'<br>');
			}
			//No errors on sending up info check if any conflicts exist
			if (isset ($result['status']) && $result['status'] == 'conflict') {
				display_conflicts($result['conflicts']);
			} else {
				if (empty($_REQUEST['rel_offset'])) {
					if (!isset ($_REQUEST['offset'])) {
						$offset = 0;
						update_progress_bar('records', 100, 100);
					} else {
						$offset = $_REQUEST['offset'];
					}
					$next_offset = $offset + $max;
					add_to_msg("Retrieving Modified Records - $offset To $next_offset<br>", false);
					update_progress_bar('records', 0, 100);
					if($clean_sync == 1){
						$result = $soapclient->call('get_quick_sync_data', array ('session' => $session, 'module_name' => $sync_module, 'related_module_name' => '', 'start' => $offset, 'count' => 1000, 'db_type'=>$sugar_config['dbconfig']['db_type'], 'deleted' => 2));
					}
					else{
						$result = $soapclient->call('sync_get_entries', array ('session' => $session, 'module_name' => $sync_module, 'from_date' => $last_sync, 'to_date' => $start_time, 'offset' => $offset, 'max_results' => $max, 'select_fields' => array (), 'query' => '', 'deleted' => 2));
					}
				}
				if (!isset ($_REQUEST['rel_offset']) || !has_error($result)) {
					if (empty ($_REQUEST['rel_offset'])) {
						update_progress_bar('records', 55, 100);
						if($clean_sync == 1){
							$result_arr = unserialize(base64_decode($result['result']));
							execute_query($sync_module, $result_arr['data']);
							execute_query($sync_module, $result_arr['cstm']);
						}
						else
						{
							add_to_msg('Retrieved '.$result['result_count'].' Records<br>', false);
							$get_entry_list = get_decoded($result['entry_list']);
							update_progress_bar('records', 65, 100);
							$done = save_altered($sync_module, $get_entry_list);
							update_progress_bar('records', 100, 100);
							add_to_msg('Added '.$done['add'].' Records <br>', false);
							add_to_msg('Modified '.$done['modify'].' Records <br>', false);
						}
						add_to_msg('Done<br>', false);

						if ($result['next_offset'] < $result['total_count']) {
							store_msg();
							echo '<input type="hidden" name="sync_module_index" value="'.$sync_module_index.'">';
							echo "<input type='hidden' id='offset' name='offset' value='".$result['next_offset']."'>";
							echo "<input type='hidden' id='count' name='count' value='".$result['total_count']."'>";
							echo "<input type='hidden' id='clean_sync' name='clean_sync' value='".$clean_sync."'>";
                            echo '<script>document.getElementById("sync").submit();</script>';
							sugar_cleanup(true);
						}
						update_progress_bar('records', 100, 100);
						$current_step ++;
						update_progress_bar($sync_module, $current_step, $module_steps);
					}
					if (isset ($_REQUEST['rel_index'])) {
						$ri = $_REQUEST['rel_index'];
					} else {
						$ri = 0;
					}
					$current_step += $ri;
					update_progress_bar($sync_module, $current_step, $module_steps);
					for (; $ri < sizeof($sync_modules[$sync_module_index]['related']); $ri ++) {
						$related = $sync_modules[$sync_module_index]['related'][$ri];
						if (!isset ($_REQUEST['rel_offset'])) {
							$rel_offset = 0;
						} else {
							$rel_offset = $_REQUEST['rel_offset'];
						}
						if ($rel_offset == 0) {
							add_to_msg('Retrieving Local Relationships - '.$related.'<br>', false);
							update_progress_bar('records', 0, 100);
							if ($clean_sync == 1) {
								clean_relationships_for_sync($sync_module, $related);
							}
							$altered_relation = get_altered_relationships($sync_module, $related, $local_last_sync, $local_time);

							if(isset($altered_relation['result_count']) && $altered_relation['result_count'] > 0){
								$commit_relation = get_encoded($altered_relation['entry_list']);
								update_progress_bar('records', 50, 100);
								add_to_msg('Sending '.sizeof($altered_relation['entry_list']).' Modified Relationship Records<br>', false);
								$result = $soapclient->call('sync_set_relationships', array ('session' => $session, 'module_name' => $sync_module, 'related_module' => $related, 'from_date' => $last_sync, 'to_date' => $start_time, 'sync_entry_list' => $commit_relation, 'deleted' => -1));
							}

							update_progress_bar('records', 100, 100);
						}

						if ($rel_offset > 0 || !has_error($result)) {

							update_progress_bar('records', 0, 100);
							$next_off = $rel_offset + $rel_max;
							add_to_msg('Retrieving Server Relationships - '.$related."[$rel_offset - $next_off] <br>", false);
							if($clean_sync == 1){
								$result = $soapclient->call('get_quick_sync_data', array ('session' => $session, 'module_name' => $sync_module, 'related_module_name' => $related, 'start' => $rel_offset, 'count' => $rel_max, 'db_type'=>$sugar_config['dbconfig']['db_type'], 'deleted' => 2));
							}
							else{
								$result = $soapclient->call('sync_get_relationships', array ('session' => $session, 'module_name' => $sync_module, 'related_module' => $related, 'from_date' => $last_sync, 'to_date' => $start_time, 'offset' => $rel_offset, 'max_results' => $rel_max, 'deleted' => 2));
							}
							if (!has_error($result)) {
								update_progress_bar('records', 50, 100);
								if($clean_sync == 1){
									$result_arr = unserialize(base64_decode($result['result']));
									execute_query($sync_module, $result_arr['data']);
									execute_query($sync_module, $result_arr['cstm']);
								}
								else
								{
									$list = get_decoded($result['entry_list']);
									$done = client_save_relationships($list);
									add_to_msg('Retrieved '.$result['result_count'].' Records<br>', false);
									add_to_msg('Added '.$done['add'].' Records <br>', false);
									add_to_msg('Modified '.$done['modify'].' Records <br>', false);
								}
								$total_count = $result['total_count'];

								if ($result['next_offset'] < $result['total_count']) {
									store_msg();
									echo '<input type="hidden" name="sync_module_index" value="'.$sync_module_index.'">';
									echo "<input type='hidden' id='rel_offset' name='rel_offset' value='".$result['next_offset']."'>";
									echo "<input type='hidden' id='rel_count' name='rel_count' value='".$result['total_count']."'>";
									echo "<input type='hidden' id='rel_index' name='rel_index' value='".$ri."'>";
									echo '<script>document.getElementById("sync").submit();</script>';
									sugar_cleanup(true);
								}else{
									echo "<input type='hidden' id='rel_offset' name='rel_offset' value='0'>";
									$rel_offset = 0;
									$_REQUEST['rel_offset'] = 0;
								}

							}
							$current_step ++;
							update_progress_bar($sync_module, $current_step, $module_steps);

							update_progress_bar('records', 100, 100);

						}
					}
					if ($sync_module_index < sizeof($sync_modules) - 1) {
						if ($sync_module == 'EditCustomFields') {
							$_REQUEST['run'] = true;
							add_to_msg('Updating custom fields<br>', false);
							require_once ('modules/DynamicFields/UpgradeFields.php');

						}

						require_once ('modules/Sync/config.php');
						$sync_end_time = $soapclient->call('get_gmt_time', array ());
						$sync_info['last_sync'.$sync_module] = $sync_end_time;
						$sync_info['local_last_sync'.$sync_module] = $local_time;
                        if(file_exists('modules/Sync/file_config.php')){
						  require_once ('modules/Sync/file_config.php');
						  global $file_sync_info;
                        }
						$file_sync_info['is_first_sync'] = false;
						write_array_to_file('file_sync_info', $file_sync_info, 'modules/Sync/file_config.php');

						add_to_msg('Storing Sync Info', false);
						write_array_to_file('sync_info', $sync_info, 'modules/Sync/config.php');
						$sync_module_index ++;
						store_msg();
						clear_module_sync_session();
						update_progress_bar('Total', $sync_module_index, sizeof($sync_modules));
						echo '<input type="hidden" name="sync_module_index" value="'.$sync_module_index.'">';
						//echo "<input class='button' type='submit'	value='Next Module (". $sync_modules[$sync_module_index] . ")'>";
						echo '<script>document.getElementById("sync").submit();</script>';
						die();
					} else {
						$result = $soapclient->call('logout', array ('session' => $session));
						update_progress_bar('Total', 100, 100);
						$sync_end_time = $soapclient->call('get_gmt_time', array ());
						foreach($sync_info as $key => $val){
							$sync_info[$key] = $sync_end_time;
						}
						$sync_info['last_sync'.$sync_module] = $sync_end_time;
						$sync_info['local_last_sync'.$sync_module] = $local_time;
						unset($_SESSION['sync_start_time']);
						require_once ('include/utils/file_utils.php');
						add_to_msg('Storing Sync Info', false);
						write_array_to_file('sync_info', $sync_info, 'modules/Sync/config.php');
						add_to_msg('<b>Sync Complete</b>', false);
						   $_REQUEST['do_action']='execute';
	   				        $_REQUEST['repair_silent'] = true;
							 global $current_user;
                              $current_user->is_admin = '1';
							  require_once('ModuleInstall/ModuleInstaller.php');
							  global $mod_strings, $current_language;
							  $mod_strings = return_module_language($current_language, 'Administration');
                              $mi = new ModuleInstaller();
                              $mi->rebuild_all();

                                $current_user->is_admin = '0';
						echo '<script>document.getElementById("stop_sync_btn").value="Done"</script>';
                        echo '<script>opener.location.href = "index.php?module=Home&action=index";</script>';
						update_progress_bar('Total', sizeof($sync_modules), sizeof($sync_modules));
						//$current_user->setPreference('last_sync'.  $sync_module, $start_time);
						clear_sync_session();
						unset($_SESSION['ACL']);
					}

				}
			}

		} else {

		}
	}
} else {
	include_once ('syncconnect.php');
}
echo '</form>';
if ($sync_module_index > -1) {
	echo '<br><br><form action="index.php" name="restart_sync" id="restart_sync"><input type="hidden" name="action" value="Popup"><input type="hidden" name="module" value="Sync"><input type="hidden" name="new_sync" value="new_sync"></form>';
}
end_sync_log();
insert_popup_footer($theme);

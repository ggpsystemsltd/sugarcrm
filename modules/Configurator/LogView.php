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



global $mod_strings;
if(!is_admin($current_user)){
	sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
}
$filter = '';
if(!empty($_REQUEST['filter'])){
	$filter = 	$_REQUEST['filter'];
}
$ignore_self = false;
if(!empty($_REQUEST['ignore_self'])){
	$ignore_self = 'checked';	
}
$reg_ex = false;
if(!empty($_REQUEST['reg_ex'])){
	$reg_ex = 'checked';	
}
set_time_limit(180);
echo <<<EOQ
<form action='index.php' name='logview'>
<input type='hidden' name='action' value='LogView'>
<input type='hidden' name='module' value='Configurator'>
<input type='hidden' name='doaction' value=''>
<input type='button' onclick='document.logview.doaction.value="all";document.logview.submit()' name='all' value='{$mod_strings['LBL_ALL']}'>
<input type='button' onclick='document.logview.doaction.value="mark";document.logview.submit()' name='mark' value='{$mod_strings['LBL_MARK_POINT']}'>
<input type='submit' name='display' value='{$mod_strings['LBL_REFRESH_FROM_MARK']}'>
<input type='button' onclick='document.logview.doaction.value="next";document.logview.submit()' name='next' value='{$mod_strings['LBL_NEXT_']}'>
<br>
{$mod_strings['LBL_SEARCH']} <input type='text' name='filter' value='$filter'>&nbsp;{$mod_strings['LBL_REG_EXP']} <input type='checkbox' name='reg_ex' $reg_ex> 
<br>
{$mod_strings['LBL_IGNORE_SELF']} <input type='checkbox' name='ignore_self' $ignore_self> 
</form>
EOQ;

define('PROCESS_ID', 1);
define('LOG_LEVEL', 2);
define('LOG_NAME', 3);
define('LOG_DATA', 4);
$logFile = $sugar_config['log_dir'].'/'.$sugar_config['log_file'];

if (!file_exists($logFile)) {
	die('No Log File');
}
$lastMatch = false;
$doaction =(!empty($_REQUEST['doaction']))?$_REQUEST['doaction']:'';

switch($doaction){
	case 'mark':
		echo "<h3>{$mod_strings['LBL_MARKING_WHERE_START_LOGGING']}</h3><br>";
		$_SESSION['log_file_size'] = filesize($logFile);
		break;
	case 'next':
		if(!empty($_SESSION['last_log_file_size'])){
			$_SESSION['log_file_size'] = $_SESSION['last_log_file_size'];	
		}else{
			$_SESSION['log_file_size'] = 0;	
		}	
		$_REQUEST['display'] = true;
		break;
	case 'all':
		$_SESSION['log_file_size'] = 0;	
		$_REQUEST['display'] = true;
		break;
}
		

if (!empty ($_REQUEST['display'])) {
	echo "<h3>{$mod_strings['LBL_DISPLAYING_LOG']}</h3>";
	$process_id =  getmypid();
	
	echo $mod_strings['LBL_YOUR_PROCESS_ID'].' [' . $process_id. ']';
	echo '<br>'.$mod_strings['LBL_YOUR_IP_ADDRESS'].' ' . $_SERVER['REMOTE_ADDR'];
	if($ignore_self){
		echo $mod_strings['LBL_IT_WILL_BE_IGNORED'];	
	}
	if (empty ($_SESSION['log_file_size'])) {
		$_SESSION['log_file_size'] = 0;
	}
	$cur_size = filesize($logFile);
	$_SESSION['last_log_file_size'] = $cur_size;
	$pos = 0;
	if ($cur_size >= $_SESSION['log_file_size']) {
		$pos = $_SESSION['log_file_size'] - $cur_size;
	}
	if($_SESSION['log_file_size'] == $cur_size){
		echo $mod_strings['LBL_LOG_NOT_CHANGED'].'<br>';	
	}else{
		$fp = sugar_fopen($logFile, 'r');
		fseek($fp, $pos , SEEK_END);
		echo '<pre>';
		while($line = fgets($fp)){

            $line = remove_xss($line);
			//preg_match('/[^\]]*\[([0-9]*)\] ([a-zA-Z]+) ([a-zA-Z0-9\.]+) - (.*)/', $line, $result);
			preg_match('/[^\]]*\[([0-9]*)\]/', $line, $result);
			ob_flush();
			flush();
			if(empty($result) && $lastMatch){
				echo $line;	
			}else{
				$lastMatch = false;
				if(empty($result) || ($ignore_self &&$result[LOG_NAME] == $_SERVER['REMOTE_ADDR'] )){
					
				}else{
					if(empty($filter) || (!$reg_ex && substr_count($line, $filter) > 0) || ($reg_ex && preg_match($filter, $line))){
						$lastMatch = true;
						echo $line;	
					}	
				}
			}	
		}
		echo '</pre>';
		fclose($fp);
		
	}
}
?>

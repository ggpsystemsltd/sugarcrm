<?php
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

?>
<form action='index.php' method="POST">
<input type='hidden' name='action' value='updateTimezonePrefs'>
<input type='hidden' name='module' value='Administration'>

<table>
<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$prompt_users = 'checked';
if(isset($_POST['preview']) && !isset($_POST['prompt_users'])){
	$prompt_users = '';
}


$result = $db->query("SELECT id, user_preferences, user_name FROM users");
$execute = false;
// loop through user preferences and check for "bad" elements; rebuild preferences array and update database
if(isset($_POST['execute'])){
	$execute = true;
}
$serverTimeZone = lookupTimezone(0);
while ($row = $db->fetchByAssoc($result)) {
	$adjustment = 'none';

	if(isset($_POST[$row['id'].'adjust'])){
		$adjustment = $_POST[$row['id'].'adjust'];
	}
	
		$string = "Preview";
		if($execute)$string = "Updating";
        echo "<tr><td> $string timezone preferences for user <b>{$row['user_name']}</b>...</td><td>";
		
        
        $prefs = array();
        $newprefs = array();
	
        $prefs = unserialize(base64_decode($row['user_preferences']));
        $setTo = '';
        $alreadySet = '';
		if(!empty($prefs)){
			
	        foreach ($prefs as $key => $val) {
	               if ($key == 'timez') {
	                	if(empty($prefs['timezone']) && $val != ''){
		                	$hourAdjust = $adjustment;
		                	if($hourAdjust == 'none'){
								$hourAdjust = 0;
							}
	                		$selectedZone = lookupTimezone($prefs['timez'] + $hourAdjust);
	                	
	                	if(!empty($selectedZone)){
	                   	 	$newprefs['timezone'] = $selectedZone;   
	                   	 	$newprefs['timez']  = $val;
	                   	 	$setTo = $selectedZone;
	                   	 	if(empty($prompt_users)){
	                   			$newprefs['ut']=1;
	                   	 	}else{
	                   	 		$newprefs['ut']=0;
	                   	 	}
	                	}else{
	                		$newprefs['timezone'] = $serverTimeZone;   
	                   	 	$newprefs['timez']  = $val;
	                   	 	$setTo = $serverTimeZone;
	                   	 	if(empty($prompt_users)){
	                   			$newprefs['ut']=1;
	                   	 	}else{
	                   	 		$newprefs['ut']=0;
	                   	 	}
	                	}
	                }else{
	                	$newprefs[$key] = $val;
	                	if(!empty($prefs['timezone'])){
	                		$alreadySet = 'Previously Set - '. $prefs['timezone'];	
	                	}
	                }
	                
	         
	                }else{
	                	$newprefs[$key] = $val;
	                }
	        }
	        	if($execute){
        			$newstr = mysql_real_escape_string(base64_encode(serialize($newprefs)));
       				$db->query("UPDATE users SET user_preferences = '{$newstr}' WHERE id = '{$row['id']}'");
	        	}
	        }
		if(!empty($setTo)){
			echo $setTo;
		}else{
			if(!empty($alreadySet)){
				echo $alreadySet;
			}else{
				echo $serverTimeZone;
				$prefs['timezone'] = $serverTimeZone;
			}
		}
        echo "</td><td>";
        if(!empty($setTo)){
        	echo "Adjust: ";
        if($execute){
			if(isset($_POST[$row['id'].'adjust'])){
				echo  $adjustment;
			}
		}else{
			echo "<select name='{$row['id']}adjust'>";
			
			echo get_select_options_with_id(array('-1'=>'-1', 'none'=>'0', '1'=>'+1'), $adjustment.'');
			echo '</select>';

		}
		echo ' hour';
        }
		echo ' </td><td>';
        echo "</tr>";

		$the_old_prefs[] = $prefs;
		$the_new_prefs[] = $newprefs;

        unset($prefs);
        unset($newprefs);
        unset($newstr);
}

echo "</table>";

if($execute){
	echo "<br>All timezone preferences updated!<br><br>";
	
}else{
	echo "Prompt users on login to confirm:<input type='checkbox' name='prompt_users' value='1' $prompt_users><br>";
	echo "<input class='button' type='submit' name='execute' value='Execute'>&nbsp; <input class='button' type='submit' name='preview' value='Preview'>";
	
}
echo "&nbsp;<input class='button' type='button' name='Done' value='Done' onclick='document.location.href=\"index.php?action=DstFix&module=Administration\"'>";
?>
</form>

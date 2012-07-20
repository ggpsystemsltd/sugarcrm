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



if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

function progress_bar_flush()
{
	if(ob_get_level()) {
	    @ob_flush();
	} else {
        @flush();
	}
}

function display_flow_bar($name,$delay, $size=200)
{
	$chunk = $size/5;
	echo "<div id='{$name}_flow_bar'><table  class='list view' cellpading=0 cellspacing=0><tr><td id='{$name}_flow_bar0' width='{$chunk}px' bgcolor='#cccccc' align='center'>&nbsp;</td><td id='{$name}_flow_bar1' width='{$chunk}px' bgcolor='#ffffff' align='center'>&nbsp;</td><td id='{$name}_flow_bar2' width='{$chunk}px' bgcolor='#ffffff' align='center'>&nbsp;</td><td id='{$name}_flow_bar3' width='{$chunk}px' bgcolor='#ffffff' align='center'>&nbsp;</td><td id='{$name}_flow_bar4' width='{$chunk}px' bgcolor='#ffffff' align='center'>&nbsp;</td></tr></table></div><br>";

	echo str_repeat(' ',256);

	progress_bar_flush();
	start_flow_bar($name, $delay);
}

function start_flow_bar($name, $delay)
{
	$delay *= 1000;
	$timer_id = $name . '_id';
	echo "<script>
		function update_flow_bar(name, count){
			var last = (count - 1) % 5;
			var cur = count % 5;
			var next = cur + 1;
			eval(\"document.getElementById('\" + name+\"_flow_bar\" + last+\"').style.backgroundColor='#ffffff';\");
			eval(\"document.getElementById('\" + name+\"_flow_bar\" + cur+\"').style.backgroundColor='#cccccc';\");
			$timer_id = setTimeout(\"update_flow_bar('$name', \" + next + \")\", $delay);
		}
		 var $timer_id = setTimeout(\"update_flow_bar('$name', 1)\", $delay);

	</script>
";
	echo str_repeat(' ',256);

	progress_bar_flush();
}

function destroy_flow_bar($name)
{
	$timer_id = $name . '_id';
	echo "<script>clearTimeout($timer_id);document.getElementById('{$name}_flow_bar').innerHTML = '';</script>";
	echo str_repeat(' ',256);

	progress_bar_flush();
}

function display_progress_bar($name,$current, $total)
{
	$percent = $current/$total * 100;
	$remain = 100 - $percent;
	$status = floor($percent);
	//scale to a larger size
	$percent *= 2;
	$remain *= 2;
	if($remain == 0){
		$remain = 1;
	}
	if($percent == 0){
		$percent = 1;
	}
	echo "<div id='{$name}_progress_bar' style='width: 50%;'><table class='list view' cellpading=0 cellspacing=0><tr><td id='{$name}_complete_bar' width='{$percent}px' bgcolor='#cccccc' align='center'>$status% </td><td id='{$name}_remain_bar' width={$remain}px' bgcolor='#ffffff'>&nbsp;</td></tr></table></div><br>";
	if($status == 0){
		echo "<script>document.getElementById('{$name}_complete_bar').style.backgroundColor='#ffffff';</script>";
	}
	echo str_repeat(' ',256);

	progress_bar_flush();
}

function update_progress_bar($name,$current, $total)
{
	$percent = $current/$total * 100;
	$remain = 100 - $percent;
	$status = floor($percent);
	//scale to a larger size
	$percent *= 2;
	$remain *= 2;
	if($remain == 0){
		$remain = 1;
	}
	if($status == 100){
		echo "<script>document.getElementById('{$name}_remain_bar').style.backgroundColor='#cccccc';</script>";
	}
	if($status == 0){
		echo "<script>document.getElementById('{$name}_remain_bar').style.backgroundColor='#ffffff';</script>";
		echo "<script>document.getElementById('{$name}_complete_bar').style.backgroundColor='#ffffff';</script>";
	}
	if($status > 0){
		echo "<script>document.getElementById('{$name}_complete_bar').style.backgroundColor='#cccccc';</script>";
	}


	if($percent == 0){
		$percent = 1;
	}

	echo "<script>
		document.getElementById('{$name}_complete_bar').width='{$percent}px';
		document.getElementById('{$name}_complete_bar').innerHTML = '$status%';
		document.getElementById('{$name}_remain_bar').width='{$remain}px';
		</script>";
	progress_bar_flush();
}

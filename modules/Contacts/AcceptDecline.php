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


global $sugar_config, $dbconfig, $beanList, $beanFiles, $app_strings, $app_list_strings,$current_user;


if ( !empty($_REQUEST['user_id'])) {
    $current_user = new User();
    $result = $current_user->retrieve($_REQUEST['user_id']);
    if ($result == null) {
        session_destroy();
        sugar_cleanup();
        die("The user id doesn't exist");
    }
    $current_entity = $current_user;
}
else if ( ! empty($_REQUEST['contact_id'])) {
    $current_entity = new Contact();
    $current_entity->disable_row_level_security = true;
    $result = $current_entity->retrieve($_REQUEST['contact_id']);
    if($result == null) {
        session_destroy();
        sugar_cleanup();
        die("The contact id doesn't exist");
    }
}
else if ( ! empty($_REQUEST['lead_id'])) {
    $current_entity = new Lead();
    $current_entity->disable_row_level_security = true;
    $result = $current_entity->retrieve($_REQUEST['lead_id']);
    if($result == null) {
        session_destroy();
        sugar_cleanup();
        die("The lead id doesn't exist");
    }
}

$bean = $beanList[clean_string($_REQUEST['module'])];
require_once($beanFiles[$bean]);
$focus = new $bean;
$focus->disable_row_level_security = true;
$result = $focus->retrieve($_REQUEST['record']);

if($result == null) {
	session_destroy();
	sugar_cleanup();
	die("The focus id doesn't exist");
}

$focus->set_accept_status($current_entity,$_REQUEST['accept_status']);

print $app_strings['LBL_STATUS_UPDATED']."<BR><BR>";
print $app_strings['LBL_STATUS']. " ". $app_list_strings['dom_meeting_accept_status'][$_REQUEST['accept_status']];
print "<BR><BR>";
$script = <<<EOQ
<SCRIPT language="JavaScript">
<!--
var browserName=navigator.appName;
if (browserName=="Netscape") {
// C.L. fix for Mozilla/Netscape flavors... need a parent window
function closeme()
{
window.open('','_parent','');
window.close();
}
} else {
function closeme()
{
window.close();
}
}
//-->
</SCRIPT>
EOQ;

print $script;
print "<a href='#' onclick='window.closeme(); return false;'>".$app_strings['LBL_CLOSE_WINDOW']."</a><br>";
sugar_cleanup();
exit;
?>

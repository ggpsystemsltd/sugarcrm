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

global $app_list_strings;
global $beanList;





$seed_object = new WorkFlowAlertShell();

if(!empty($_REQUEST['parent_id']) && $_REQUEST['parent_id']!="") {
    $seed_object->retrieve($_REQUEST['parent_id']);
    $workflow_object = $seed_object->get_workflow_object();

} else {
	sugar_die("You shouldn't be here");	
}

$focus = new WorkFlowAlert();
if(!empty($_REQUEST['record']) && $_REQUEST['record']!="") {
	$focus->retrieve($_REQUEST['record']);
}	
	
	if(!empty($_REQUEST['base_module2']) && $_REQUEST['base_module2']!=""){
		$base_module = $_REQUEST['base_module2'];
	} else {
		$base_module = $workflow_object->base_module;
	}		


	$rel_module_name = $_REQUEST['rel_module'];
	$rel_module = $focus->get_rel_module($base_module, $rel_module_name);

	
if($_REQUEST['type']=="rel_module"){
	$rel_select = get_select_options_with_id($focus->get_rel_module_array($rel_module, true),$_REQUEST['rel_module_value']);
	echo "<form name=\"EditView\">";
	echo "<select id='rel_module2' name='rel_module2' tabindex='2' onchange=\"window.parent.togglecustom()\">".$rel_select."</select>";
	echo "<input type='hidden' id='base_module2' name='base_module2' value='".$rel_module."'>";
	echo "</form>";
	?>
	<script>
	window.parent.togglecustom(false);

	</script>
	<?php
}

if($_REQUEST['type']=="rel_fields"){

	$rel_field_select = get_select_options_with_id($focus->get_field_value_array($rel_module, "Char"),$focus->field_value);
	$rel_email_select = get_select_options_with_id($focus->get_field_value_array($rel_module, "Email"),$focus->rel_email_value);
	echo "<form name=\"EditView\">";
	echo "User Name:<BR><select id='rel_field_value' name='rel_field_value' tabindex='2'>".$rel_field_select."</select>";
	echo "<BR>User E-mail:<BR><select id='rel_email_value' name='rel_email_value' tabindex='2'>".$rel_email_select."</select>";
	echo "</form>";

}


?>

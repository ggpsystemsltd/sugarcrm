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

?>
<script>
	function addToDescription(form, name, value){
			form.description.value += '--' + name + "=" + value+ "--"
	}
</script>
<form name='leadcap' action='../index.php?entryPoint=leadCapture' method='post'>
	<input type='hidden' name='lead_source' value='Web Site'>
	<input type='hidden' name='user' value='cheeto'>
	<input type='hidden' name='description' value=''>
	<input type='hidden' name='redirect' value='http://localhost/sugarcrm/examples/FormValidationTest.php'>
	<div align='center'>
	Please fill out this form so we can better server your game playing and food eating needs. It will redirect you to the form validation test.
	<table border=1><tr><td><table>
	<tr><td>First Name:</td><td><input type='text' name='first_name'></td></tr>
	<tr><td>Last Name:</td><td><input type='text' name='last_name'></td></tr>
	<tr><td>Company Name:</td><td><input type='text' name='account_name'></td></tr>
	<tr><td>Title:</td><td><input type='text' name='title'></td></tr>
	<tr><td>Favorite Game:</td><td><select name='game'>
		<option value='monopoly'> Monopoly</option>
		<option value='uno'> UNO</option>
		<option value='sorry'> Sorry</option>
		<option value='Checkers'> Checkers</option>
	</select></td></tr>
	<tr><td>Favorite Food:</td><td><select name='food'>
		<option value='pizza'> Pizza</option>
		<option value='hamburger'> Hamburger</option>
		<option value='candy'> Candy </option>
		<option value='icecream'> Ice Cream</option>
	</select></td></tr>

	<tr><td></td><td><input type='Submit' name='submit' value='Submit' onclick='addToDescription(document.leadcap,"Favorite Food", document.leadcap.food.options[document.leadcap.food.selectedIndex].text);addToDescription(document.leadcap,"Favorite Game", document.leadcap.game.options[document.leadcap.game.selectedIndex].text);' ></td></tr></table></table>
</form>
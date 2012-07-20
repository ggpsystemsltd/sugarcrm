{*
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

*}
<script type="text/javascript" language="JavaScript">
{literal}
<!-- Begin
function set_focus() {
	if (document.DetailView.user_name.value != '') {
		document.DetailView.user_password.focus();
		document.DetailView.user_password.select();
	}
	else document.DetailView.user_name.focus();
}

//  End -->
</script>
<style type="text/css">
	.body, body {
		font-size: 12px;
		}


{/literal}
</style>
<br>
<br>
<div align='center'>
<!-- <img src="include/images/logo_sugarportal.gif" width="300" height="25" alt="Sugar"><br> -->
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td valign="top">
	<form action="index.php" method="post" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
			<table border="0" cellspacing="0" cellpadding="0" class="loginForm">
				<input type="hidden" name="module" value="Users">
				<input type="hidden" name="action" value="Authenticate">
				<input type="hidden" name="return_module" value="Users">
				<input type="hidden" name="return_action" value="Login">
				<input type="hidden" id="cant_login" name="cant_login" value="">
	{if $login_error}
			<tr>
				<td class="dataLabel" id="loginTop">{$current_module_strings.LBL_ERROR}</td>
				<td id="loginTop"><span class="error">{$login_error}</span></td>
			</tr>
	{elseif $sessionTimeout}
			<tr>
				<td colspan='2'><span class="error">{$current_module_strings.LBL_RELOGIN}</span></td>
			</tr>
	{else}
	{/if}
			<tr>
				<td class="dataLabel" nowrap id="loginTop">{$current_module_strings.LBL_USER_NAME}</td>
				<td id="loginTop">
					<input type="text" size='20' id="user_name" name="user_name" value="{$login_user_name}" /></td>
			</tr>
			<tr>
				<td class="dataLabel">{$current_module_strings.LBL_PASSWORD}</td>
				<td>
					<input type="password" size='20' id="user_password" name="user_password" value="{$login_password}" /></td>
			</tr>
			<tr>
				<td id="loginBottom">&nbsp;</td>
				<td id="loginBottom">
					<input title="{$current_module_strings.LBL_LOGIN_BUTTON_TITLE}"  class="button" type="submit" id="login_button" name="Login" value="  {$current_module_strings.LBL_LOGIN_BUTTON_LABEL}  ">
					<p class="loginRegister"><a href="registration.php">{$current_module_strings.LBL_REGISTER}</a></p>
				</td>

			</tr>
			</table>
		</form>
		</td>
</tr>
</table>
</div>

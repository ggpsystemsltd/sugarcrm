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
{literal}
<script type='text/javascript'>
<!--
var ERR_RULES_NOT_MET = '{/literal}{$MOD.ERR_RULES_NOT_MET}{literal}';
var ERR_ENTER_OLD_PASSWORD = '{/literal}{$MOD.ERR_ENTER_OLD_PASSWORD}{literal}';
var ERR_ENTER_NEW_PASSWORD = '{/literal}{$MOD.ERR_ENTER_NEW_PASSWORD}{literal}';
var ERR_ENTER_CONFIRMATION_PASSWORD = '{/literal}{$MOD.ERR_ENTER_CONFIRMATION_PASSWORD}{literal}';
var ERR_REENTER_PASSWORDS = '{/literal}{$MOD.ERR_REENTER_PASSWORDS}{literal}';
-->
</script>
<script type='text/javascript' src='{/literal}{sugar_getjspath file="modules/Users/PasswordRequirementBox.js"}{literal}'></script>
<style type="text/css">
<!--
@import url(modules/Users/PasswordRequirementBox.css);
.body 
{ 
    font-size: 12px;
}
    
.buttonLogin 
{
    border: 1px solid #444444;
    font-size: 11px;
    color: #ffffff;
    background-color: #666666;
    font-weight: bold;
}
    
table.tabForm td 
{
    border: none;
}

p 
{
    MARGIN-TOP: 0px;
    MARGIN-BOTTOM: 10px;
}
    
form 
{
    margin: 0px;
}
    
#recaptcha_image 
{
    height: 47.5px !important;
    width: 250px !important;
}

#recaptcha_image img 
{
    height: 47.5px;
    width: 250px;
} 	
-->
</style>
{/literal}

<form action="index.php" method="post" name="ChangePasswordForm" id="ChangePasswordForm" onsubmit="return document.getElementById('cant_login').value == ''">
<table cellpadding="0" align="center" width="100%" cellspacing="0" border="0">
<tr>
<td>
<table cellpadding="0"  cellspacing="0" border="0" align="center">
<tr>
<td style="padding-bottom: 10px;" ><b>{$MOD.LBL_LOGIN_WELCOME_TO}</b><br />
<img src="{$sugar_md}" alt="Sugar" width="340" height="25" /></td>
</tr>
<tr>
<td align="center">

		<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%" class="edit view">
		<tr>
			<td colspan="2" width="100%" style="font-size: 12px; padding-bottom: 5px; font-weight: normal;">{$INSTRUCTION}</td>
		</tr>
			<input type="hidden" name="entryPoint" value="{$ENTRY_POINT}" />
			<input type='hidden' name='action' value="{$ACTION}" />
			<input type='hidden' name='module' value="{$MODULE}" />
			<input type="hidden" name="guid" value="{$GUID}" />
			<input type="hidden" name="return_module" value="Home" />
			<input type="hidden" name="login" value="1" />
			<input type="hidden" name="is_admin" value="{$IS_ADMIN}" />
			<input type="hidden" name="cant_login" id="cant_login" value="" />
			<input type="hidden" name="old_password" id="old_password" value="" />
			<input type="hidden" name="password_change" id="password_change" value="true" />
			<input type="hidden" value="" name="user_password" id="user_password" />
			<input type="hidden" name="page" value="Change" />
			<input type="hidden" name="return_id" value="{$ID}" />
			<input type="hidden" name="return_action" value="{$return_action}" />
			<input type="hidden" name="record" value="{$ID}" />
			<input type="hidden" name="user_name" value="{$USER_NAME}" />
			<input type='hidden' name='saveConfig' value='0' />
		<tr>
			<td  colspan='2'><span id='post_error' class="error">{$EXPIRATION_TYPE}&nbsp;</span></td>
		</tr>
		
		<tr>
		{if $OLD_PASSWORD_FIELD == '' &&  $USERNAME_FIELD == '' }
		<td  width="30%"></td><td></td>
		{/if}
			{$OLD_PASSWORD_FIELD}
			{$USERNAME_FIELD}
			<th rowspan='3' align='center'>
                {sugar_password_requirements_box width='300px' class='x-sqs-list' style='background-color:white; padding:5px !important;'}
			</th>
		</tr>
		<tr>
			<td scope="row">{$MOD.LBL_NEW_PASSWORD}:</td>
			<td width="30%"><input type="password" size="26" tabindex="2" id="new_password" name="new_password" value="" onkeyup="password_confirmation();newrules('{$PWDSETTINGS.minpwdlength}','{$PWDSETTINGS.maxpwdlength}','{$REGEX}');" /></td>
		</tr>
		<tr>
			<td scope="row">{$MOD.LBL_NEW_PASSWORD2}:</td>
			<td width="30%"><input type="password" size="26" tabindex="2" id="confirm_pwd" name="confirm_pwd" value="" onkeyup="password_confirmation();" /> <div id="comfirm_pwd_match" class="error" style="display: none;">mis-match</div></td>
		</tr>
		<tr>
			<td>{$CAPTCHA}</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			{$SUBMIT_BUTTON}
			</td>		
		</tr>
		</table>
	</td>
</tr>
</table>
</td>
</tr>
</table>
</form>
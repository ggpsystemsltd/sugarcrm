<!--
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

/*********************************************************************************

 ********************************************************************************/
-->
<!-- BEGIN: main -->
{$emailTitle}

<P/>

<script type="text/javascript" src="{sugar_getjspath file="modules/Emails/javascript/Email.js"}"></script>
<script type="text/javascript" language="Javascript">
{$JS_VARS}
</script>
<form action="index.php" method="POST" name="DetailView" id="emailDetailView">
    <input type="hidden" name="inbound_email_id" value="{$ID}">
    <input type="hidden" name="type" value="out">
    <input type="hidden" name="email_name" value="{$EMAIL_NAME}">
    <input type="hidden" name="to_email_addrs" value="{$FROM}">
    <input type="hidden" name="module" value="Emails">
    <input type="hidden" name="record" value="{$ID}">
    <input type="hidden" name="isDuplicate" value=false>
    <input type="hidden" name="action">
    <input type="hidden" name="contact_id" value="{$CONTACT_ID}">
    <input type="hidden" name="user_id" value="{$USER_ID}">
    <input type="hidden" name="return_module">
    <input type="hidden" name="return_action">
    <input type="hidden" name="return_id">
    <input type="hidden" name="assigned_user_id">
    <input type="hidden" name="parent_id" value="{$PARENT_ID}">
    <input type="hidden" name="parent_type" value="{$PARENT_TYPE}">
    <input type="hidden" name="parent_name" value="{$PARENT_NAME}">
</form>

<table width="100%" border="0" cellspacing="{$GRIDLINE}" cellpadding="0" class="detail view">
	<tr>
		<td width="15%" valign="top" scope="row"><slot>{$APP.LBL_ASSIGNED_TO}</slot></td>
		<td width="35%" valign="top"><slot>{$ASSIGNED_TO}</slot></td>
		<td width="15%" scope="row"><slot>{$MOD.LBL_DATE_SENT}</slot></td>
		<td width="35%" colspan="3"><slot>{$DATE_START} {$TIME_START}</slot></td>
	</tr>
	<tr>
		<td scope="row"><slot>{$APP.LBL_TEAMS}:</slot></td>
		<td><slot>{$TEAM}</slot></td>
		<td scope="row"><slot>{$PARENT_TYPE}</slot></td>
		<td><slot>{$PARENT_NAME}</slot></td>
	</tr>
	<tr>
		<td scope="row"><slot>{$MOD.LBL_FROM}</slot></td>
		<td colspan=3><slot>{$FROM}</slot></td>
	</tr>
	<tr>
		<td scope="row"><slot>{$MOD.LBL_TO}</slot></td>
		<td colspan='3'><slot>{$TO}</slot></td>
	</tr>
	<tr>
		<td scope="row"><slot>{$MOD.LBL_CC}</slot></td>
		<td colspan='3'><slot>{$CC}</slot></td>
	</tr>
	<tr>
		<td scope="row"><slot>{$MOD.LBL_BCC}</slot></td>
		<td colspan='3'><slot>{$BCC}</slot></td>
	</tr>
	<tr>
		<td scope="row"><slot>{$MOD.LBL_SUBJECT}</slot></td>
		<td colspan='3'><slot>{$NAME}</slot></td>
	</tr>
	<tr>
		<td valign="top" valign="top" scope="row"><slot>{$MOD.LBL_BODY}</slot></td>
		<td colspan="3"  style="background-color: #ffffff; color: #000000" ><slot>
			<div id="html_div" style="background-color: #ffffff;padding: 5px">{$DESCRIPTION_HTML}</div>
			<input id='toggle_textarea_elem' onclick="toggle_textarea();" type="checkbox" name="toggle_html"/> <label for='toggle_textarea_elem'>{$MOD.LBL_SHOW_ALT_TEXT}</label><br>
			<div id="text_div" style="display: none;background-color: #ffffff;padding: 5px">{$DESCRIPTION}</div>
			<script type="text/javascript" language="Javascript">
				var plainOnly = {$SHOW_PLAINTEXT};
				{literal}
				if(plainOnly == true) {
					document.getElementById("toggle_textarea_elem").checked = true;
					toggle_textarea();
				}
				{/literal}
			</script>
		</td>
	</tr>
	<tr>
		<td valign="top" scope="row"><slot>{$MOD.LBL_ATTACHMENTS}</td>
		<td colspan="3"><slot>{$ATTACHMENTS}</slot></td>
	</tr>
</table>

{$SUBPANEL}
<!-- END: main -->

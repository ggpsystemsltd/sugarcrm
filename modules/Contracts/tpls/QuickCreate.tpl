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


<form name="contractsQuickCreate" id="contractsQuickCreate" method="POST" action="index.php">

<input type="hidden" name="parent_account_id" value="{$REQUEST.account_id}">
<input type="hidden" name="parent_account_name" value="{$REQUEST.account_name}">
<input type="hidden" name="module" value="Contracts">
<input type="hidden" name="contact_id" value="{$REQUEST.contact_id}">
<input type="hidden" name="quote_id" value="{$REQUEST.quote_id}">
<input type="hidden" name="product_id" value="{$REQUEST.product_id}">
<input type="hidden" name="opportunity_id" value="{$REQUEST.opportunity_id}">
<input type="hidden" name="opportunity_name" value="{$REQUEST.opportunity_name}">
<input type="hidden" name="return_action" value="{$REQUEST.return_action}">
<input type="hidden" name="return_module" value="{$REQUEST.return_module}">
<input type="hidden" name="return_id" value="{$REQUEST.return_id}">
<input type="hidden" name="action" value='Save'>
<input type="hidden" name="duplicate_parent_id" value="{$REQUEST.duplicate_parent_id}">
<input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
<input type="hidden" name="to_pdf" value='1'>
<input id='team_id' name='team_id' type="hidden" value="{$TEAM_ID}" />
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td align="left" style="padding-bottom: 2px;">
		<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" type="submit" name="button" {$saveOnclick|default:"onclick=\"return check_form('ContractsQuickCreate');\""} value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " >
		<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" type="submit" name="button" {$cancelOnclick|default:"onclick=\"this.form.action.value='$RETURN_ACTION'; this.form.module.value='$RETURN_MODULE'; this.form.record.value='$RETURN_ID'\""} value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
		<input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" accessKey="{$APP.LBL_FULL_FORM_BUTTON_KEY}" class="button" type="submit" name="button" onclick="this.form.to_pdf.value='0';this.form.action.value='EditView'; this.form.module.value='Contracts';" value="  {$APP.LBL_FULL_FORM_BUTTON_LABEL}  "></td>
	<td align="right" nowrap><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span> {$APP.NTC_REQUIRED}</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr>
<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<th align="left" scope="row" colspan="4"><h4><slot>{$MOD.LBL_CONTRACT_INFORMATION}</slot></h4></th>
	</tr>
	<tr>
	<td  scope="row"><slot>{$MOD.LBL_CONTRACT_NAME}&nbsp;<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td  nowrap><slot><input type="text" name="name" size="40" tabindex="1" value="" /></slot></td>
	<td  scope="row"><slot>{$MOD.LBL_STATUS}&nbsp;<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td ><slot><select tabindex="2" name="status">{$STATUS_OPTIONS}</select></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_START_DATE}</slot></td>
	<td ><slot><input type="text" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name="start_date" id="start_date" tabindex="2" size="11" value="{$START_DATE}" />
			{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="start_date_trigger" '}
			<span class="dateFormat">{$USER_DATE_FORMAT}</span></slot></td>
	<td scope="row"><slot>{$MOD.LBL_ACCOUNT_NAME} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td  valign="top"  ><slot><input class="sqsEnabled" tabindex="1" autocomplete="off" id="account_name" name='account_name' type="text" value="{$ACCOUNT_NAME}">
	<input name='account_id' id="account_id" type="hidden" value='{$ACCOUNT_ID}' />&nbsp;<input tabindex='1' title="{$APP.LBL_SELECT_BUTTON_TITLE}"  type="button" class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="btn1"
			onclick='open_popup("Accounts", 600, 400, "", true, false, {$encoded_popup_request_data}, "", true);' /></slot></td>	
	</tr>
	<tr>
	<td scope="row"><slot>{$MOD.LBL_END_DATE}</slot></td>
	<td ><slot><input type="text" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name="end_date" id="end_date" tabindex="2" size="11" value="{$END_DATE}" />
			{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="end_date_trigger" '}
			<span class="dateFormat">{$USER_DATE_FORMAT}</span></slot></td>
	<td></td><td></td>
	</tr>
	</table>
	</form>
<script>
{literal}
	Calendar.setup ({
		inputField : "start_date",
		ifFormat : "{/literal}{$CALENDAR_DATEFORMAT}{literal}",
		daFormat : "{/literal}{$CALENDAR_DATEFORMAT}{literal}",
		showsTime : false,
		button : "start_date_trigger",
		singleClick : true,
		step : 1, 
		weekNumbers:false
	});
	
	Calendar.setup ({
		inputField : "end_date",
		ifFormat : "{/literal}{$CALENDAR_DATEFORMAT}{literal}",
		showsTime : false,
		button : "end_date_trigger",
		singleClick : true,
		step : 1,
		weekNumbers:false
	});

{/literal}

	{$additionalScripts}
</script>
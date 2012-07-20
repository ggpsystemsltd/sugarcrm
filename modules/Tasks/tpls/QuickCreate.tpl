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


<form name="tasksQuickCreate" id="tasksQuickCreate" method="POST" action="index.php">
<input type="hidden" name="module" value="Tasks">
<input type="hidden" name="record" value="">
<input type="hidden" name="lead_id" value="{$REQUEST.lead_id}">
<input type="hidden" name="contact_id" value="{$REQUEST.contact_id}">
<input type="hidden" name="contact_name" value="{$REQUEST.contact_name}">
<input type="hidden" name="email_id" value="{$REQUEST.email_id}">
<input type="hidden" name="account_id" value="{$REQUEST.account_id}">
<input type="hidden" name="opportunity_id" value="{$REQUEST.opportunity_id}">
<input type="hidden" name="acase_id" value="{$REQUEST.acase_id}">
<input type="hidden" name="return_action" value="{$REQUEST.return_action}">
<input type="hidden" name="return_module" value="{$REQUEST.return_module}">
<input type="hidden" name="return_id" value="{$REQUEST.return_id}">
<input type="hidden" name="action" value='Save'>
<input type="hidden" name="duplicate_parent_id" value="{$REQUEST.duplicate_parent_id}">
<!--
CL: Bug fix for 9291 and 9427 - parent_id should be parent_type, not the module type (if set)
-->
{if $REQUEST.parent_id}
	<input type="hidden" name="parent_id" value="{$REQUEST.parent_id}">
{else}
	<input type="hidden" name="parent_id" value="{$REQUEST.return_id}">
{/if}
{if $REQUEST.parent_type}
	<input type="hidden" name="parent_type" value="{$REQUEST.parent_type}">
{else}
	<input type="hidden" name="parent_type" value="{$REQUEST.return_module}">
{/if}
<input type="hidden" name="parent_name" value="{$REQUEST.parent_name}">
<input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
<input type="hidden" name="to_pdf" value='1'>
<input id='team_id' name='team_id' type="hidden" value="{$TEAM_ID}" />
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td align="left" style="padding-bottom: 2px;">
		<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" type="submit" name="button" {$saveOnclick|default:"onclick=\"return check_form('TasksQuickCreate');\""} value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " >
		<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" type="submit" name="button" {$cancelOnclick|default:"onclick=\"this.form.action.value='$RETURN_ACTION'; this.form.module.value='$RETURN_MODULE'; this.form.record.value='$RETURN_ID'\""} value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
		<input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" accessKey="{$APP.LBL_FULL_FORM_BUTTON_KEY}" class="button" type="submit" name="button" onclick="this.form.to_pdf.value='0';this.form.action.value='EditView'; this.form.module.value='Tasks';" value="  {$APP.LBL_FULL_FORM_BUTTON_LABEL}  "></td>
	<td align="right" nowrap><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span> {$APP.NTC_REQUIRED}</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr>
<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<th align="left" scope="row" colspan="4"><h4><slot>{$MOD.LBL_NEW_FORM_TITLE}</slot></h4></th>
	</tr>
	<tr>
	<td valign="top" scope="row" rowspan="2"><slot>{$MOD.LBL_SUBJECT} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td rowspan="2"><slot><textarea name='name' cols="50" tabindex='1' rows="1">{$NAME}</textarea></slot></td>
	<td scope="row" width="15%"><slot>{$MOD.LBL_PRIORITY} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td  nowrap width="35%"><slot><select  tabindex='2' name='priority'>{$PRIORITY_OPTIONS}</select></slot></td>
	</tr>
	<tr>
	<td scope="row" width="15%"><slot>{$MOD.LBL_STATUS} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td width="35%"><slot><select tabindex='2' name='status'>{$STATUS_OPTIONS}</select></slot></td>
	</tr>
	<tr>
	<td valign="top" scope="row" rowspan="2"><slot>{$MOD.LBL_DESCRIPTION}</slot></td>
	<td rowspan="2"><slot><textarea name='description' tabindex='1' cols="50" rows="4">{$DESCRIPTION}</textarea></slot></td>
	<td scope="row"><slot>{$MOD.LBL_DUE_DATE_AND_TIME}</slot></td>
	<td  nowrap="nowrap"><slot>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td nowrap="nowrap"><input name='date_due' id='jscal_field' onblur="parseDate(this, '{$USER_DATEFORMAT}');" tabindex='2' maxlength='10' size='11' {$READONLY} type="text" value="{$DATE_DUE}">
			{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="jscal_trigger" '}&nbsp;</td>
		<td nowrap="nowrap"><input name='time_due' size='5' maxlength='5' tabindex='2' {$READONLY} type="text" value='{$TIME_DUE}'>{$DUE_TIME_MERIDIEM} </td>
		{if $TIME_MERIDIEM}
        <td><select name='due_meridiem' tabindex="2">{$TIME_MERIDIEM}</select></td>
        {/if}
        <td nowrap="nowrap">&nbsp;<input name='date_due_flag'class="checkbox" type='checkbox' tabindex="1" onClick="set_date_due_values(this.form);">&nbsp;{$MOD.LBL_NONE}</td>
		</tr>
		<tr>
		<td nowrap="nowrap"><span class="dateFormat">{$USER_DATEFORMAT}</span></td>
		<td nowrap="nowrap"><span class="dateFormat">{$TIME_FORMAT}</span></td>
		</tr>
	</table></slot>
	</td>
	</tr>
	<tr>
	<td scope="row"><slot>{$MOD.LBL_START_DATE_AND_TIME}</slot></td>
	<td  nowrap="nowrap"><slot>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td nowrap="nowrap"><input name='date_start' id='date_start' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" tabindex='2' maxlength='10' size='11' {$READONLY} type="text" value="{$DATE_START}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="date_start_trigger" '}&nbsp;</td>
		<td nowrap="nowrap"><input name='time_start' size='5' maxlength='5' tabindex='2' {$READONLY} type="text" value='{$TIME_START}'>{$START_TIME_MERIDIEM} </td>
		{if $TIME_MERIDIEM}
        <td><select name='start_meridiem' tabindex="2">{$TIME_MERIDIEM}</select></td>
        {/if}
        <td nowrap="nowrap">&nbsp;<input name='date_start_flag' class="checkbox" type='checkbox' tabindex="1" onClick="set_date_start_values(this.form);">&nbsp;{$MOD.LBL_NONE}</td>
		</tr>
		<tr>
		<td nowrap="nowrap"><span class="dateFormat">{$USER_DATEFORMAT}</span></td>
		<td nowrap="nowrap"><span class="dateFormat">{$TIME_FORMAT}</span></td>
		</tr>
		</table></slot>
	</td>

	</tr>
	</table>
	</form>
<script type="text/javascript">
{literal}
Calendar.setup ({
	inputField : "jscal_field", daFormat : "{/literal}{$CALENDAR_FORMAT}{literal}", showsTime : false, button : "jscal_trigger", singleClick : true, step : 1, startWeekday: {/literal}{$CALENDAR_FDOW|default:'0'}{literal}, weekNumbers:false
});
Calendar.setup ({
	inputField : "date_start", daFormat : "{/literal}{$CALENDAR_FORMAT}{literal}", showsTime : false, button : "date_start_trigger", singleClick : true, step : 1, startWeekday: {/literal}{$CALENDAR_FDOW|default:'0'}{literal}, weekNumbers:false
});
{/literal}
	{$additionalScripts}
</script>

<script type="text/javascript">
{literal}
function set_date_due_values(form) {
	if (form.date_due_flag.checked) {
		form.date_due_flag.value='on';
		form.date_due.value="";
		form.time_due.value="";
		form.date_due.readOnly=true;
		form.time_due.readOnly=true;
		if(typeof(form.due_meridiem) != 'undefined') form.due_meridiem.disabled=true;
		document.images.jscal_trigger.width = 18;
		document.images.jscal_trigger.height = 18;

	}
	else {
		form.date_due_flag.value='off';
		form.date_due.readOnly=false;
		form.time_due.readOnly=false;

		if(typeof(form.due_meridiem) != 'undefined') form.due_meridiem.disabled=false;
		document.images.jscal_trigger.width = 18;
		document.images.jscal_trigger.height = 18;
	}
}

function set_date_start_values(form) {
	if (form.date_start_flag.checked) {
		form.date_start_flag.value='on';
		form.date_start.value="";
		form.time_start.value="";
		form.date_start.readOnly=true;
		form.time_start.readOnly=true;
		if(typeof(form.start_meridiem) != 'undefined') form.start_meridiem.disabled=true;
		document.images.date_start_trigger.width = 18;
		document.images.date_start_trigger.height = 18;
	}
	else {
		form.date_start_flag.value='off';
		form.date_start.readOnly=false;
		form.time_start.readOnly=false;
		if(typeof(form.start_meridiem) != 'undefined') form.start_meridiem.disabled=false;
		document.images.date_start_trigger.width = 18;
		document.images.date_start_trigger.height = 18;
	}
}
{/literal}
set_date_due_values(document.tasksQuickCreate);
set_date_start_values(document.tasksQuickCreate);
</script>

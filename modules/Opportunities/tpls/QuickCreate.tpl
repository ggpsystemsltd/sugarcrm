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


<form name="opportunitiesQuickCreate" id="opportunitiesQuickCreate" method="POST" action="index.php">
<input type="hidden" name="module" value="Opportunities">
<input type="hidden" name="record" value="">
<input type="hidden" name="contact_id" value="{$REQUEST.contact_id}">
<input type="hidden" name="contact_name" value="{$REQUEST.contact_name}">
<input type="hidden" name="email_id" value="{$REQUEST.email_id}">
<input type="hidden" name="return_action" value="{$REQUEST.return_action}">
<input type="hidden" name="return_module" value="{$REQUEST.return_module}">
<input type="hidden" name="return_id" value="{$REQUEST.return_id}">
<input type="hidden" name="action" value='Save'>
<input type="hidden" name="duplicate_parent_id" value="{$REQUEST.duplicate_parent_id}">
<input name='currency_id' type='hidden' value='{$CURRENCY_ID}'>
<input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
<input type="hidden" name="to_pdf" value='1'>
<input id='team_id' name='team_id' type="hidden" value="{$TEAM_ID}" />
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td align="left" style="padding-bottom: 2px;">
		<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" type="submit" name="button" {$saveOnclick|default:"onclick=\"return check_form('OpportunitiesQuickCreate');\""} value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " >
		<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" type="submit" name="button" {$cancelOnclick|default:"onclick=\"this.form.action.value='$RETURN_ACTION'; this.form.module.value='$RETURN_MODULE'; this.form.record.value='$RETURN_ID'\""} value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
		<input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" accessKey="{$APP.LBL_FULL_FORM_BUTTON_KEY}" class="button" type="submit" name="button" onclick="this.form.to_pdf.value='0';this.form.action.value='EditView'; this.form.module.value='Opportunities';" value="  {$APP.LBL_FULL_FORM_BUTTON_LABEL}  "></td>
	<td align="right" nowrap><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span> {$APP.NTC_REQUIRED}</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr>
<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="15%" scope="row"><slot>{$MOD.LBL_OPPORTUNITY_NAME} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td width="35%" ><slot><input name='name' type="text" tabindex='1' size='35' maxlength='50' value=""></slot></td>
	<td width="20%" scope="row"><slot>{$MOD.LBL_AMOUNT} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td width="30%" ><slot><input name='amount' tabindex='2' size='15' maxlength='25' type="text" value=''></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DATE_CLOSED}&nbsp;<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>	
	<td ><slot><input name='date_closed' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" id='jscal_field' type="text" tabindex='1' size='11' maxlength='10' value=""> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="jscal_trigger" '} <span class="dateFormat">{$USER_DATEFORMAT}</span></slot></td>
	<td scope="row"><slot>{$MOD.LBL_LEAD_SOURCE}</slot></td>
	<td ><slot><select tabindex='2' name='lead_source'>{$LEAD_SOURCE_OPTIONS}</select></slot></td>
	</tr>
	<tr>
	<td scope="row"><slot>{$MOD.LBL_SALES_STAGE} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td ><slot><select tabindex='1' name='sales_stage' id='opportunities_sales_stage'>{$SALES_STAGE_OPTIONS}</select></slot></td>
	<td scope="row"><slot>{$MOD.LBL_PROBABILITY}</slot></td>
	<td ><slot><input name='probability' id='opportunities_probability' tabindex='2' size='4' maxlength='3' type="text" value=''></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_ACCOUNT_NAME} <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></slot></td>
	<td ><slot>{$REQUEST.parent_name}<input id='account_name' name='account_name' type="hidden" value='{$REQUEST.parent_name}'><input id='account_id' name='account_id' type="hidden" value='{$REQUEST.parent_id}'>&nbsp;</slot></td>
	<td></td>
	<td></td>
	</tr>
</table>
</slot></td></tr></table>
	</form>
<script>
{literal}
	Calendar.setup ({
		inputField : "jscal_field", ifFormat : "{/literal}{$CALENDAR_DATEFORMAT}{literal}", showsTime : false, button : "jscal_trigger", singleClick : true, step : 1, weekNumbers:false
	});
	prob_array = {/literal}{$prob_array}{literal}
	document.getElementById('opportunities_sales_stage').onchange = function() {
			if(typeof(document.getElementById('opportunities_sales_stage').value) != "undefined" && prob_array[document.getElementById('opportunities_sales_stage').value]) {
				document.getElementById('opportunities_probability').value = prob_array[document.getElementById('opportunities_sales_stage').value];
			} 
		};
{/literal}

	{$additionalScripts}
</script>
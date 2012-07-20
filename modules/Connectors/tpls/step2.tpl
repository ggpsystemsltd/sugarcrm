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
<form name="EditView" method="POST" action="index.php">
	<input type="hidden" name="module" value="Connectors">
	<input type="hidden" name="record" value="{$record->id}">
	<input type="hidden" name="merge_module" value="{$merge_module}">
	<input type="hidden" name="action" value='Save'>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="left" style="padding-bottom: 2px;">
		<input id="connectors_back_top" title="{$mod.LBL_BACK}"  class="button" onclick="this.form.action.value='Step1';" type="submit" value="{$mod.LBL_BACK}">&nbsp;
		<input id="connectors_save_top" title="{$mod.LBL_SAVE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" type="submit" value="{$mod.LBL_SAVE}">&nbsp;
		<input id="connectors_cancel_top" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="this.form.action.value='DetailView'; this.form.module.value='{$merge_module}'; this.form.record.value='{$record->id}'" type="submit" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">&nbsp;
		<input class="button" onclick="smart_copy();" type="button" name="smartCopy" value="{$MOD.LBL_SMART_COPY}"/>
		</td>
		<td align="right" nowrap></td>
	</tr>
	</table>
	<script language='javascript'>
		var index = 0;
		var sourceIndex = 0;
		var fieldArray = new Array();
		var sourceArray = new Array();
	</script>
	<div class="detail view">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<td width='12.5%' scope="row"></td>
	{foreach from=$source_names item=source_name}
		<td>
		{if $source_name.id}
		<input class="button" onclick="copy_all('{$source_name.id}', '{$source_name.color}');" type="button" name="copyValue" value="&lt;&lt;"/>&nbsp;
		<script language='javascript'>
			sourceArray[sourceIndex] = '{$source_name.id}';
			sourceIndex++;
		</script>
		{/if}
		<b>{$source_name.name}</b></td>

	{/foreach}
	</tr>
	{foreach from=$merge_fields key=field_name item=label}
		<tr>
			<td width='12.5%' scope="row">
			{sugar_translate label="$label" module="$merge_module"}
			</td>

			<td class="tabDetailViewDF">
			   <input name="{$field_name}" id="{$field_name}" size="35" maxlength="150" type="text" value="{$record->$field_name}">
			</td>

			{foreach from=$result_beans key=source item=bean_entry}
			<td nowrap>
				<input class="button" onclick="copy_value('{$field_name}', '{$source}_{$field_name}', '{$source_names.$source.color}');" type="button" name="copyValue" value="<<"/>&nbsp;
				{if isset($bean_entry->$field_name)}
				<input name="{$source}_{$field_name}" id="{$source}_{$field_name}" size="35" maxlength="150" type="text" value="{$bean_entry->$field_name|replace:'"':'\''}" style='background:#{$source_names.$source.color}'>
				{else}
				<input name="{$source}_{$field_name}" id="{$source}_{$field_name}" size="35" maxlength="150" type="text" value="">
				{/if}
				<script language='javascript'>
					fieldArray[index] = '{$field_name}';
					index++;
				</script>
			</td>
			{/foreach}
		</tr>
	{/foreach}
	</table>
	</div>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="left" style="padding-bottom: 2px;">
		<input id="connectors_back_bottom" title="{$mod.LBL_BACK}" class="button" onclick="this.form.action.value='Step1';" type="submit" value="{$mod.LBL_BACK}">&nbsp;
		<input id="connectors_save_bottom" title="{$mod.LBL_SAVE}" class="button" type="submit" value="{$mod.LBL_SAVE}">&nbsp;
		<input id="connectors_cancel_bottom" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" class="button" onclick="this.form.action.value='DetailView'; this.form.module.value='{$merge_module}'; this.form.record.value='{$record->id}'" type="submit" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">&nbsp;
		<input class="button" onclick="smart_copy();" type="button" name="smartCopy" value="{$MOD.LBL_SMART_COPY}"/>
		</td>
		<td align="right" nowrap></td>
	</tr>
	</table>
</form>

{literal}
<script type="text/javascript">
function copy_value(field_name, field_value_id, color)
{
	var target_element = document.getElementById(field_name);
	var source_element = document.getElementById(field_value_id);
	if(source_element.value != ''){
		target_element.value = source_element.value;
		target_element.style.background = '#'+color;
	}
	return true;
}

function copy_all(source_name, color){
	for(i = 0; i < fieldArray.length; i++){
		var source_element = document.getElementById(source_name+'_'+fieldArray[i]);
		if(source_element.value != ''){
			var target_element = document.getElementById(fieldArray[i]);
			target_element.value = source_element.value;
			target_element.style.background = '#'+color;
		}
	}
}

function smart_copy(){
	for(j = 0; j < sourceArray.length; j++){
		var source_name = sourceArray[j];
		for(i = 0; i < fieldArray.length; i++){
			var source_element = document.getElementById(source_name+'_'+fieldArray[i]);
			if(source_element.value != ''){
				var target_element = document.getElementById(fieldArray[i]);
				target_element.value = source_element.value;
				target_element.style.background = source_element.style.background;
			}
		}
	}
}
</script>

{/literal}
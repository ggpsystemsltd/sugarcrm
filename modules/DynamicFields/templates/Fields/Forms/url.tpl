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
{include file="modules/DynamicFields/templates/Fields/Forms/coreTop.tpl"}
<input type=hidden id='ext3' name='ext3' value='{$vardef.gen}'>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="LBL_GENERATE_URL"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='checkbox' id='gencheck' {if $vardef.gen}checked=true{/if} name='genCheck' value="0" onclick="
			if(this.checked) {ldelim}
				 YAHOO.util.Dom.setStyle('fieldListHelper', 'display', '');
                 YAHOO.util.Dom.get('ext3').value = 1;
			{rdelim} else {ldelim}
				YAHOO.util.Dom.setStyle('fieldListHelper', 'display', 'none');
                YAHOO.util.Dom.get('ext3').value = 0;
			{rdelim}">
	{else}
		<input type='checkbox' name='ext3' {if $vardef.gen}checked=true{/if} disabled>
	{/if}
	</td>
</tr>
<tr id='fieldListHelper' {if !$vardef.gen}style="display:none"{/if}>
	<td></td>
	<td>{html_options name="flo" id="fieldListOptions" options=$fieldOpts}
		<input type='button' class='button' value="Insert Field" onclick="
			YAHOO.util.Dom.get('default').value += '{ldelim}' + YAHOO.util.Dom.get('fieldListOptions').value + '{rdelim}'
		"></td> 
</tr>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DEFAULT_VALUE"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='text' name='default' id='default' value='{$vardef.default}' maxlength='{$vardef.len|default:50}'>
	{else}
		<input type='hidden' id='default' name='default' value='{$vardef.default}'>{$vardef.default}
	{/if}
	</td>
</tr>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MAX_SIZE"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='text' name='len' value='{$vardef.len|default:255}' onchange="forceRange(this,1,255);changeMaxLength(document.getElementById('default'),this.value);">
		{literal}
		<script>
		function forceRange(field, min, max){
			field.value = parseInt(field.value);
			if(field.value == 'NaN')field.value = max;
			if(field.value > max) field.value = max;
			if(field.value < min) field.value = min;
		}
		function changeMaxLength(field, length){
			field.maxLength = parseInt(length);
			field.value = field.value.substr(0, field.maxLength);
		}
		</script>
		{/literal}
	{else}
		<input type='hidden' name='len' value='{$vardef.len}'>{$vardef.len}
	{/if}
	</td>
</tr>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="LBL_LINK_TARGET"}:</td>
	<td>
	{if $hideLevel < 5}
		<select name='ext4' id='ext4'>
            {$TARGET_OPTIONS}
        </select>
	{else}
		<select name='extdis' id='extdis' disabled>
            <option value='{$LINK_TARGET}'>{$LINK_TARGET_LABEL}</option>
        </select>
        <input type='hidden' name='ext4' value='{$LINK_TARGET}'>
	{/if}
	</td>
</tr>

{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}
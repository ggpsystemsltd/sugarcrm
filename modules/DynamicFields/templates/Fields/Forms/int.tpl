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
<script>
formsWithFieldLogic=null;
</script>

{include file="modules/DynamicFields/templates/Fields/Forms/coreTop.tpl"}
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DEFAULT_VALUE"}:</td><td>
	{if $hideLevel < 5}
		<input type='text' name='default' id='int_default' value='{$vardef.default}'>
		<script>addToValidate('popup_form', 'default', 'int', false,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DEFAULT_VALUE"}' );</script>
	{else}
		<input type='hidden' name='default' id='int_default' value='{$vardef.default}'>{$vardef.default}
	{/if}
	</td>
</tr>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MIN_VALUE"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='text' name='min' id='int_min' value='{$vardef.validation.min}'>
		<script>addToValidate('popup_form', 'min', 'int', false,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MIN_VALUE"}' );</script>
	{else}
		<input type='hidden' name='min' id='int_min' value='{$vardef.validation.min}'>{$vardef.range.min}
	{/if}
	</td>
</tr>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MAX_VALUE"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='text' name='max' id='int_max' value='{$vardef.validation.max}'>
		<script>addToValidate('popup_form', 'max', 'int', false,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MAX_VALUE"}' );</script>
	{else}
		<input type='hidden' name='max' id='int_max' value='{$vardef.validation.max}'>{$vardef.range.max}
	{/if}
	</td>
</tr>
<tr>
	<td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MAX_SIZE"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='text' name='len' id='int_len' value='{$vardef.len|default:11}'></td>
		<script>addToValidate('popup_form', 'len', 'int', false,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MAX_SIZE"}' );</script>
	{else}
		<input type='hidden' name='len' id='int_len' value='{$vardef.len}'>{$vardef.len}
	{/if}
	</td>
</tr>
{if $range_search_option_enabled}
<tr>	
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_ENABLE_RANGE_SEARCH"}:</td>
    <td>
        <input type='checkbox' name='enable_range_search' value=1 {if !empty($vardef.enable_range_search) }checked{/if} {if $hideLevel > 5}disabled{/if} />
        {if $hideLevel > 5}<input type='hidden' name='enable_range_search' value='{$vardef.enable_range_search}'>{/if}
    </td>	
</tr>
{/if}
{*  
<!-- REMOVING THIS FOR 6.0, but need to allow for people create auto_increment fields and have to add appropriate indexes if in strict mode.
<tr>
    <td class='mbLBL'>Auto Increment:</td>
    <td>
        <input type='checkbox' name='autoinc' id='autoinc' value=1 {if !empty($vardef.auto_increment) }checked{/if} 
        {if $hideLevel > 2 || !$allowAutoInc} disabled{/if} 
        onclick="document.getElementById('auto_increment').value = this.checked;document.getElementById('autoinc_start_wrap').style.display = this.checked ? '' : 'none';">
        <input type='hidden' name='auto_increment' id='auto_increment' value='{if !empty($vardef.auto_increment) }true{else}false{/if}'>
    </td>
</tr>
-->
*}
{if !empty($vardef.auto_increment) }
<tr id="autoinc_start_wrap" {if empty($vardef.auto_increment) }style="display:none" {/if}>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_AUTOINC_NEXT"}:</td>
    <td>
        <input type='hidden' name='auto_increment' id='auto_increment' value='true'>
		<input type='text' name='autoinc_next' id='autoinc_next' value='{$vardef.autoinc_next|default:1}' {if $MB}disabled=1{/if}>
        <script>addToValidateMoreThan('popup_form', 'autoinc_next', 'int', false,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_AUTOINC_NEXT"}', {$vardef.autoinc_next|default:1});</script>
        <input type='hidden' name='autoinc_val_changed' id='autoinc_val_changed' value='false'>
    </td>
</tr>
{/if}
<tr>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_DISABLE_NUMBER_FORMAT"}:</td>
    <td>
        <input type='checkbox' name='ext3' value=1 {if !empty($vardef.disable_num_format) }checked{/if} {if $hideLevel > 5}disabled{/if} />
        {if $hideLevel > 5}<input type='hidden' name='ext3' value='{$vardef.disable_num_format}'>{/if}
    </td>
</tr>
<script>
	formsWithFieldLogic=new addToValidateFieldLogic('popup_form_id', 'int_min', 'int_max', 'int_default', 'int_len', 'int', 'Invalid Logic.');
</script>
{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}
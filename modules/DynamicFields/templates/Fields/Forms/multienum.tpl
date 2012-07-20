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
<tr>
	<td nowrap="nowrap">{sugar_translate module="DynamicFields" label="LBL_DROP_DOWN_LIST"}:</td>
	<td>
	{if $hideLevel < 5}
		{html_options name="ext1" id="ext1" selected=$cf.ext1 values=$dropdowns output=$dropdowns onChange="dropdownChanged(this.value);"}
	{else}
		<input type='hidden' name='ext1' value='$cf.ext1'>{$cf.ext1}
	{/if}
	</td>
</tr>
<tr>
	<td nowrap="nowrap">{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DEFAULT_VALUE"}:</td>
	<td>
	{if $hideLevel < 5}
		{html_options name="default_value" id="default_value" selected=$cf.default_value options=$selected_dropdown }
	{else}
		<input type='hidden' name='default_value' value='$cf.default_value'>{$cf.default_value}
	{/if}
	</td>
</tr>
<tr>
	<td nowrap="nowrap">{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DISPLAYED_ITEM_COUNT"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type='text' name='ext2' id='ext2' value='{$cf.ext2|default:5}'>
		<script>addToValidate('popup_form', 'ext2', 'int', false,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DISPLAYED_ITEM_COUNT"}' );</script>
	{else}
		<input type='hidden' name='ext2' value='{$cf.ext2}'>{$cf.ext2}
	{/if}
	</td>
</tr>
<tr>
	<td nowrap="nowrap">{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MASS_UPDATE"}:</td>
	<td>
	{if $hideLevel < 5}
		<input type="checkbox" name="mass_update" value="1" {if !empty($cf.mass_update)}checked{/if}/>
	{else}
		<input type="checkbox" name="mass_update" value="1" disabled {if !empty($cf.mass_update)}checked{/if}/>
	{/if}
	</td>
</tr>

{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}
<script>dropdownChanged(document.getElementById('ext1').options[document.getElementById('ext1').options.selectedIndex]);</script>


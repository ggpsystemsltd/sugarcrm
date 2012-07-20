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


<table width="100%"><tr><td class='mbLBL' width='30%' >{sugar_translate module="DynamicFields" label="COLUMN_TITLE_NAME"}:</td><td >
{if $hideLevel == 0}
	<input id="field_name_id" type="hidden" name="name" value="parent_name"/>parent_name
{else}
	<input id= "field_name_id" type="hidden" name="name" value="{$vardef.name}"/>{$vardef.name}{/if}
<script>

	addToValidate('popup_form', 'name', 'DBName', true,'{sugar_translate module="DynamicFields" label="COLUMN_TITLE_NAME"} [a-zA-Z_]' );
	addToValidateIsInArray('popup_form', 'name', 'in_array', true,'{sugar_translate module="DynamicFields" label="ERR_RESERVED_FIELD_NAME"}', '{$field_name_exceptions}', '==');

</script>
</td></tr>
<tr>
	<td class='mbLBL' >{sugar_translate module="DynamicFields" label="COLUMN_TITLE_LABEL"}:</td>
	<td>
	{if $hideLevel < 5}
		<input id ="label_key_id" type="text" name="label" value="{$vardef.vname}">
	{else}
		<input id ="label_key_id" type="hidden" name="label" value="{$vardef.vname}">{$vardef.vname}
	{/if}
	</td>
</tr>
<tr>
	<td class='mbLBL' >{sugar_translate module="DynamicFields" label="COLUMN_TITLE_LABEL_VALUE"}:</td>
	<td>
		<input id="label_value_id" type="text" name="labelValue" value="{$lbl_value}">
	</td>
</tr>
<tr>
	<td class='mbLBL' >{sugar_translate module="DynamicFields" label="COLUMN_TITLE_HELP_TEXT"}:</td>
	<td>
	{if $hideLevel < 5 }
		<input type="text" name="help" value="{$vardef.help}">
	{else}
		<input type="hidden" name="help" value="{$vardef.help}">{$vardef.help}
	{/if}
	</td>
</tr>
<script>
	if(document.getElementById('label_key_id').value == '')
		document.getElementById('label_key_id').value = 'LBL_FLEX_RELATE';
	if(document.getElementById('label_value_id').value == '')
		document.getElementById('label_value_id').value = 'Flex Relate';
</script>
{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}

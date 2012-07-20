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
<form name="editProperty" id="editProperty" onsubmit='return false;'>
<input type='hidden' name='module' value='ModuleBuilder'>
<input type='hidden' name='action' value='saveProperty'>
<input type='hidden' name='view_module' value='{$view_module}'>
{if isset($view_package)}<input type='hidden' name='view_package' value='{$view_package}'>{/if}
<input type='hidden' name='subpanel' value='{$subpanel}'>
<input type='hidden' name='to_pdf' value='true'>

{if isset($MB)}
<input type='hidden' name='MB' value='{$MB}'>
<input type='hidden' name='view_package' value='{$view_package}'>
{/if}

{literal}
<script>
	function saveAction() {
		for(var i=0;i<document.editProperty.elements.length;i++)
		{
			var field = document.editProperty.elements[i];
			if (field.className.indexOf('save') != -1 )
			{
				if (field.value != 'no_change')
				{
					var property = field.name.substring('editProperty_'.length);
					var id = field.id.substring('editProperty_'.length);
					document.getElementById(id).innerHTML = escape(field.value);
				}
			}
		}
	}
	

	function switchLanguage( language )
	{
{/literal}
        var request = 'module=ModuleBuilder&action=editProperty&view_module={$editModule}&selected_lang=' + language ;
        {foreach from=$properties key='key' item='property'}
                request += '&id_{$key}={$property.id}&name_{$key}={$property.name}&title_{$key}={$property.title}&label_{$key}={$property.label}' ;
        {/foreach}
{literal}
        ModuleBuilder.getContent( request ) ;
    }

</script>
{/literal}

<table>

	{foreach from=$properties key='key' item='property'}
	<tr>
		<td width = "50%" align='right'>{if isset($property.title)}{$property.title}{else}{$property.name}{/if}:</td>
		<td>
			<input class='save' type='hidden' name='{$property.name}' id='editProperty_{$id}{$property.id}' value='no_change'>
			{if isset($property.hidden)}
				{$property.value}
			{else}
				<input onchange='document.getElementById("editProperty_{$id}{$property.id}").value = this.value' value='{$property.value}'>
			{/if}
		</td>	
	</tr>
	{/foreach}
	<tr>
		<td><input class="button" type="Button" name="save" value="{$APP.LBL_SAVE_BUTTON_LABEL}" onclick="saveAction(); ModuleBuilder.submitForm('editProperty'); ModuleBuilder.closeAllTabs();"></td>
	</tr>
</table>
</form>

<script>
ModuleBuilder.helpSetup('layoutEditor','property', 'east');
</script>



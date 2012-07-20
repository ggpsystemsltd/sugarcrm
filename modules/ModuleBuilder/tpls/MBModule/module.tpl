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
<link rel="stylesheet" type="text/css" href="modules/ModuleBuilder/tpls/MB.css" />
<form name='CreateModule'>
<input type='hidden' name='module' value='ModuleBuilder'>
<input type='hidden' name='action' value='SaveModule'>
<input type='hidden' name='package' value='{$package->name}'>
<input type='hidden' name='original_name' value='{$module->name}'>
<input type='hidden' name='duplicate' value='0'>
<input type='hidden' name='to_pdf' value='1'>
<table class='mbTable'  >
	<tr><td></td><td colspan=4><input type='button' name='savebtn' value='{$mod_strings.LBL_BTN_SAVE}' class='button' onclick="ModuleBuilder.handleSave('CreateModule');">&nbsp;
		{if !empty($module->name)}
			<input type='button' name='duplicatebtn' value='{$mod_strings.LBL_BTN_DUPLICATE}' class='button' onclick="document.CreateModule.duplicate.value=1;ModuleBuilder.handleSave('CreateModule');">
			<input type='button' name='viewfieldsbtn' value='{$mod_strings.LBL_BTN_VIEW_FIELDS}' class='button' onclick="ModuleBuilder.handleSave('CreateModule', ModuleBuilder.moduleViewFields);">
			<input type='button' name='viewrelsbtn' value='{$mod_strings.LBL_BTN_VIEW_RELATIONSHIPS}' class='button' onclick="ModuleBuilder.handleSave('CreateModule', ModuleBuilder.moduleViewRelationships);">
			<input type='button' name='viewlayoutsbtn' value='{$mod_strings.LBL_BTN_VIEW_LAYOUTS}' class='button' onclick="ModuleBuilder.handleSave('CreateModule', ModuleBuilder.moduleViewLayouts);">
			&nbsp;<input type='button' name='deletebtn' value='{$mod_strings.LBL_BTN_DELETE}' class='button' onclick="ModuleBuilder.moduleDelete('{$package->name}', '{$module->name}');">{/if}</td></tr>
	<tr>
		<td height='100%'>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
	<tr><td class='mbLBL'><b>{$mod_strings.LBL_PACKAGE}</b></td><td colspan='5'>{$package->name}</td></tr>
	<tr><td class='mbLBL'><font color="#ff0000"> * </font><b>{$mod_strings.LBL_MODULE_NAME}</b></td><td colspan='5'><input type='text' name='name' value='{$module->name}' size='36' maxlength='36'></td></tr>
	<tr><td class='mbLBL'><font color="#ff0000"> * </font><b>{$mod_strings.LBL_LABEL}</b></td><td colspan='5'><input type='text' name='label' value='{$module->config.label}' size='36' maxlength='36'></td></tr>
	<tr>
	<tr>
	   <td class='mbLBL' width='5%' nowrap>{sugar_translate label='LBL_MB_IMPORTABLE' module='ModuleBuilder'}:</td>
       <td>&nbsp;<input type='checkbox' name='importable' value=1 {if !empty($module->config.importable)}checked{/if}></td>
    </tr>
	{counter name='items' assign='items' start=0}
	{foreach from=$module->implementable key='name' item='label'}
	</tr><tr>
	<td class='mbLBL' width='5%' nowrap>{$label}:</td>
	<td >&nbsp;<input type='checkbox' name='{$name}' value=1 {if !empty($module->config[$name])}checked{/if}></td>
	{counter name='items'}	
	{/foreach}
	</tr>
	<tr>
        <td class='mbLBL'><font color="#ff0000"> * </font><b>{$mod_strings.LBL_TYPE}</b></td>
        {counter name='items' assign='items' start=0}
        <td>
            <table>
                <tr{if empty($module->name)} id="factory_modules"{/if}>
                {if empty($module->name)}<input type='hidden' name='type'>{/if}
                {foreach from=$types key='type' item='name'}
					{assign var='imgurl' value=$type|cat:'_32'}
                    {if empty($module->name) || $type != 'basic' || count($module->mbvardefs->templates) == 1}
                        {if $items % 6 == 0 && $items != 0}
                </tr>
                <tr>
                        {/if}
                    <td>
                        {if empty($module->name)}
                    <td align='center'>
                        <table id='type_{$type}' onclick='ModuleBuilder.buttonDown(this,"{$type}", "type"); ModuleBuilder.buttonToForm("CreateModule", "type", "type");' class='wizardButton' onmousedown='return false;' onmouseout='ModuleBuilder.buttonOut(this,"{$type}", "type");'>
						  <tr>
						      <td  align='center'>{sugar_image name=$imgurl width=32 height=32}</td>
						  </tr>
					   </table>
					   <a class='studiolink' href="javascript:void(0)" onclick='ModuleBuilder.buttonDown(this,"{$type}", "type"); ModuleBuilder.buttonToForm("CreateModule", "type", "type");'>{$name}</a>
                        <script>ModuleBuilder.buttonAdd('type_{$type}', '{$type}', 'type');</script>
                    </td>
                    {else}
                    <td align='center'>{sugar_image name=$imgurl width=32 height=32}<br>
                    {$name}
                    {/if}
                    </td>
                    {/if}
                {counter name='items'}  
                {/foreach}
                </tr>
            </table>
        </td>
	</tr>	
	<tr>
		<td height='100%'>&nbsp;</td><td>&nbsp;</td>
	</tr>
</table>
{literal}
<script>
addForm('CreateModule');
addToValidate('CreateModule', 'name', 'DBName', true, '{/literal}{$mod_strings.LBL_JS_VALIDATE_NAME}{literal}');
addToValidate('CreateModule', 'label', 'varchar', true, '{/literal}{$mod_strings.LBL_JS_VALIDATE_LABEL}{literal}');
addToValidate('CreateModule', 'type', 'varchar', true, '{/literal}{$mod_strings.LBL_JS_VALIDATE_TYPE}{literal}');
ModuleBuilder.helpRegister('CreateModule');
if(document.getElementById('factory_modules'))
	ModuleBuilder.helpRegisterByID('factory_modules', 'table');
ModuleBuilder.helpSetup({/literal}'{$module->help.group}','{$module->help.default}'{literal});
ModuleBuilder.MBpackage = '{/literal}{$module->package}{literal}';
ModuleBuilder.module = '{/literal}{$module->name}{literal}';	
</script>
{/literal}
{include file='modules/ModuleBuilder/tpls/assistantJavascript.tpl'}

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
<form name='edittabs' id='edittabs' method='POST' action='index.php'>
{literal}
<script>
studiotabs.reset();
</script>
{/literal}
<input type='hidden' name='action' value={$action}>
<input type='hidden' name='view' value={$view}>
<input type='hidden' name='module' value='{$module}'>
<input type='hidden' name='subpanel' value='{$subpanel}'>
<input type='hidden' name='subpanelLabel' value='{$subpanelLabel}'>
<input type='hidden' name='local' value='{$local}'>
<input type='hidden' name='view_module' value='{$view_module}'>
{if $fromPortal}
    <input type='hidden' name='PORTAL' value='1'>
{/if}
<input type='hidden' name='view_package' value='{$view_package}'>
<input type='hidden' name='to_pdf' value='1'>
<link rel="stylesheet" type="text/css" href="modules/ModuleBuilder/tpls/ListEditor.css"/>

<table id="editor-content" class="list-editor">
<tr><td colspan=3>{$buttons}</td></tr>
{if isset($subpanel) && isset($subpanel_label)}
<tr>
    <td colspan=3>
    <span class='mbLBL'>{sugar_translate label='LBL_SUBPANEL_TITLE'}</span>
    <input id ="subpanel_title" type="text" name="subpanel_title" value="{$subpanel_title}">
    <input id ="subpanel_title_key" type="hidden" name="subpanel_title_key" value="{$subpanel_label}">
    </td>
</tr>
{/if}
<tr>

{counter start=0 name="groupCounter" print=false assign="groupCounter"}
{foreach from=$groups key='label' item='list'}
    {counter name="groupCounter"}
{/foreach}
{math assign="groupWidth" equation="100/$groupCounter-3"}

{counter start=0 name="slotCounter" print=false assign="slotCounter"}
{counter start=0 name="modCounter" print=false assign="modCounter"}

{foreach from=$groups key='label' item='list'}

<td id={$label}  width="30%" VALIGN="top" style="float: left; border: 1px gray solid; padding:4px; margin-right:4px; margin-top: 8px;  overflow-x: hidden;">
<h3 >{$label}</h3>
<ul id='ul{$slotCounter}' style="overflow-y: auto; overflow-x: hidden;">

{foreach from=$list key='key' item='value'}

<li name="width={$value.width}%" id='subslot{$modCounter}' class='draggable' >
    <table width='100%'>
        <tr>
            <td id='subslot{$modCounter}label' style="font-weight: bold;">
            {if $MB}
            {if !empty($value.label)}{$current_mod_strings[$value.label]}{elseif !empty($value.vname)}{$current_mod_strings[$value.vname]}{else}{$key}{/if}
            {else}
            {if !empty($value.label)}{sugar_translate label=$value.label module=$language}{elseif !empty($value.vname)}{sugar_translate label=$value.vname module=$language}{else}{$key}{/if}
            {/if}
            </td>
            <td></td>
            <td align="right" class="editIcon">
                {* BEGIN SUGARCRM flav=pro ONLY *}
                {if isset($field_defs.$key.calculated) && $field_defs.$key.calculated}
                    {sugar_getimage name="SugarLogic/icon_calculated" alt=$mod_strings.LBL_CALCULATED ext=".png" other_attributes=''}
                {/if}
                {if isset($field_defs.$key.dependency) && $field_defs.$key.dependency}
                    {sugar_getimage name="SugarLogic/icon_dependent" alt=$mod_strings.LBL_DEPENDANT ext=".png" other_attributes=''}
                {/if}
                {* END SUGARCRM flav=pro ONLY *}
                <img src="{sugar_getimagepath file='edit_inline.gif'}" style="cursor: pointer;"
				onclick="var value_label = document.getElementById('subslot{$modCounter}label').innerHTML.replace(/^\s+|\s+$/g,''); 
				    {if !($view|substr:-6 == "search") }
					var value_width = document.getElementById('subslot{$modCounter}width').innerHTML;
					{/if}
					ModuleBuilder.getContent('module=ModuleBuilder&action=editProperty&view_module={$view_module|escape:'url'}'+
							'{if isset($subpanel)}&subpanel={$subpanel|escape:'url'}{/if}'+
							'{if $MB}&MB={$MB|escape:'url'}&view_package={$view_package|escape:'url'}{/if}'+
							'&id_label=subslot{$modCounter}label'+
							'&name_label=label_'+
							  '{if isset($value.label)}{$value.label|escape:'url'}'+
							  '{elseif !empty($value.vname)}{$value.vname|escape:'url'}'+
							  '{else}{$key|escape:'url'}{/if}'+
							'&title_label={$MOD.LBL_LABEL_TITLE}&value_label=' + encodeURIComponent(value_label)
							{if ($view|substr:-6 != "search") }
							+ '&id_width=subslot{$modCounter}width&name_width={$MOD.LBL_WIDTH|escape:'url'}&value_width=' + encodeURIComponent(value_width)
							{/if}
					);"
				>
            </td>
            </tr>
            <tr class='fieldValue'>
                {if empty($hideKeys)}<td>[{$key}]</td>{/if}
                <td align="right" colspan="2" class="percentage">
					{if $view|substr:-6 == "search" }
					<span style="display:none" id='subslot{$modCounter}width'>{$value.width}</span>	<span style="display:none">%</span>
					{else}
					<span id='subslot{$modCounter}width'>{$value.width}</span> <span>%</span>
					{/if}
				</td>
        </tr>
    </table>
</li>

<script>
studiotabs.tabLabelToValue['{$value.label}|{$key}'] = '{$key}';
if(typeof(studiotabs.subtabModules['subslot{$modCounter}']) == 'undefined')studiotabs.subtabModules['subslot{$modCounter}'] = '{$value.label}|{$key}';
</script>

{counter name="modCounter"}
{/foreach}

<li id='topslot{$slotCounter}' class='noBullet'>&nbsp;</li>

</ul>
</td>

{counter name="slotCounter"}
{/foreach}
</td>
</tr></table>

<script>

{literal}
function dragDropInit(){
    studiotabs.fields = {};
    studiotabs.slotCount = {/literal}{$slotCounter};
    studiotabs.modCount = {$modCounter};
    {literal}
    for(msi = 0; msi < studiotabs.slotCount ; msi++){
        studiotabs.fields["topslot"+ msi] = new Studio2.ListDD("topslot" + msi, "subTabs", true);
    }
    for(msi = 0; msi < studiotabs.modCount ; msi++){
            studiotabs.fields["subslot"+ msi] = new Studio2.ListDD("subslot" + msi, "subTabs", false);
    }

    studiotabs.fields["subslot"+ (msi - 1) ].updateTabs();
};

resizeDDLists = function() {
	var Dom = YAHOO.util.Dom;
	if (!Dom.get('ul0'))
            return;
    var body = document.getElementById('mbtabs');
    for(var msi = 0; msi < studiotabs.slotCount ; msi++){
        var targetHeight =  body.offsetHeight - (Dom.getY("ul" + msi) - Dom.getY(body)) - 20;
        if (SUGAR.isIE) {
            targetHeight -= 10;
        }

        if (targetHeight > 0 )
        	Dom.setStyle("ul" + msi, "height", targetHeight + "px");
    }
	Studio2.scrollZones = {}
	for (var i = 0; Dom.get("ul" + i); i++){
		Studio2.scrollZones["ul" + i] = Studio2.getScrollZones("ul" + i);
	}
};

function countListFields() {
	var count = 0;
	var divs = document.getElementById( 'ul0' ).getElementsByTagName( 'li' ) ;		
	for ( var j=0;j<divs.length;j++) {
		if (divs[j].className == 'draggable') count++;
	}
	return count;
};

{/literal}
dragDropInit();
setTimeout(resizeDDLists, 100);
ModuleBuilder.helpRegister('edittabs');
ModuleBuilder.helpRegisterByID('content', 'div');
studiotabs.view = '{$view}';
ModuleBuilder.helpSetup('{$helpName}', '{$helpDefault}');
if('{$from_mb}')
    ModuleBuilder.helpUnregisterByID('savebtn');
ModuleBuilder.MBpackage = '{$view_package}';
</script>



<div id='logDiv' style='display:none'>
</div>

{$additionalFormData}

</form>



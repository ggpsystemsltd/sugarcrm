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

{capture name=alt1 assign=alt_selectButton}{sugar_translate label='LBL_SELECT_TEAMS_LABEL'}{/capture}
{capture name=alt2 assign=alt_removeButton}{sugar_translate label='LBL_ALT_REMOVE_TEAM_ROW'}{/capture}
{capture name=alt3 assign=alt_addButton}{sugar_translate label='LBL_ALT_ADD_TEAM_ROW'}{/capture}
{capture name=idname assign=idname}{$vardef.name}{/capture}
{if !empty($displayParams.idName)}
    {assign var=idname value=$displayParams.idName}
{/if}

<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Collection/SugarFieldCollection.js"}'></script>
<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Teamset/Teamset.js"}'></script>
<script type="text/javascript">
    var collection = (typeof collection == 'undefined') ? new Array() : collection;
    if(typeof collection["{$displayParams.formName}_{$idname}"] == 'undefined') {ldelim}
       collection["{$displayParams.formName}_{$idname}"] = new SUGAR.collection('{$displayParams.formName}', '{$idname}', '{$module}', '{$displayParams.popupData}');
	   {if $hideShowHideButton}
		 collection["{$displayParams.formName}_{$idname}"].show_more_image = false;
	   {/if}
	{rdelim}
</script>
<input type="hidden" id="update_fields_{$idname}_collection" name="update_fields_{$idname}_collection" value="">
<input type="hidden" id="{$idname}_new_on_update" name="{$idname}_new_on_update" value="{$displayParams.new_on_update}">
<input type="hidden" id="{$idname}_allow_update" name="{$idname}_allow_update" value="{$displayParams.allow_update}">
<input type="hidden" id="{$idname}_allow_new" name="{$idname}_allow_new" value="{$displayParams.allow_new}">
<input type="hidden" id="{$idname}" name="{$idname}" value="{$idname}">

{if !empty($vardef.required)}
<input type="hidden" id="{$idname}_field" name="{$idname}_field" value="{$idname}_table">
{/if}
<table name='{$displayParams.formName}_{$idname}_table' id='{$displayParams.formName}_{$idname}_table' style="border-spacing: 0pt;">
    <!-- BEGIN Labels Line -->
    <tr id="lineLabel_{$idname}" name="lineLabel_{$idname}">
        <td nowrap>
			<span class="id-ff multiple ownline">
            <button type="button" class="button firstChild" value="{sugar_translate label='LBL_SELECT_BUTTON_LABEL'}" onclick='javascript:open_popup("Teams", 600, 400, "", true, false, {literal}{"call_back_function":"set_return_teams_for_editview","form_name": {/literal} "{$displayParams.formName}","field_name":"{$idname}",{literal}"field_to_name_array":{"id":"team_id","name":"team_name"}}{/literal}, "MULTISELECT", true); if(collection["{$displayParams.formName}_{$idname}"].more_status)collection["{$displayParams.formName}_{$idname}"].js_more();' name="teamSelect" id="teamSelect" title="{sugar_translate label="LBL_ID_FF_SELECT"}">{sugar_getimage name="id-ff-select.png" alt="$alt_selectButton"}</button><button type="button" class="button lastChild" value="{sugar_translate label='LBL_ADD_BUTTON'}" onclick="javascript:collection['{$displayParams.formName}_{$idname}'].add(); if(collection['{$displayParams.formName}_{$idname}'].more_status)collection['{$displayParams.formName}_{$idname}'].js_more();" name="teamAdd" id="teamAdd" title="{sugar_translate label="LBL_ID_FF_ADD"}">{sugar_getimage name="id-ff-add.png" alt="$alt_addButton"}</button>
			</span>
        </td>
        <td>
        &nbsp;
        </td>
        <th scope='col' align='center' id="lineLabel_{$idname}_primary" rowspan='1' scope='row' style='white-space: nowrap; word-wrap:normal;'>
            {sugar_translate label='LBL_COLLECTION_PRIMARY'}
        </th>
<!-- BEGIN Add and collapse -->
        <td rowspan='1' scope='row' style='white-space:nowrap; word-wrap:normal;' valign='top'>
            &nbsp;
            {if !$hideShowHideButton}
            <span onclick="collection['{$displayParams.formName}_{$idname}'].js_more();" id='more_{$displayParams.formName}_{$idname}' {if empty($values.secondaries)}style="display:none; text-decoration:none;"{else}style="text-decoration:none;"{/if} title="{sugar_translate label="LBL_HIDE_SHOW"}">
            <input id="arrow_{$idname}" name="arrow_{$idname}" type="hidden" value="show">
			{capture assign="attr"}border="0" id="more_img_{$displayParams.formName}_{$idname}"{/capture}
            {sugar_getimage name="advanced_search.gif" width="8" height="8" attr=$attr}
            <span id="more_div_{$displayParams.formName}_{$idname}" {if empty($values.secondaries)}style="display:none"{/if}>{sugar_translate label='LBL_SHOW'}</span>
            </span>
            {/if}
        </td>
<!-- END Add and collapse -->
        <td width='100%'>
        &nbsp;
        </th>
    </tr>
<!-- END Labels Line -->
    <tr id="lineFields_{$displayParams.formName}_{$idname}_0">
        <td scope="row" valign='top'>
            <span id='{$displayParams.formName}_{$idname}_input_div_0' name='teamset_div'>          
            <input type="text" name="{$idname}_collection_0" id="{$displayParams.formName}_{$idname}_collection_0" class="sqsEnabled" tabindex="{$tabindex}" {if !empty($displayParams.accesskey)} accesskey='{$displayParams.accesskey}' {/if} size="{$displayParams.size}" value="" title="{sugar_translate label='LBL_TEAM_SELECTED_TITLE'}" autocomplete="off" {$displayParams.readOnly} {$displayParams.field}>
            <input type="hidden" name="id_{$idname}_collection_0" id="id_{$displayParams.formName}_{$idname}_collection_0" value="">
            </span>
        </td>
<!-- BEGIN Remove and Radio -->
        <td valign='top' align='left' nowrap class="teamset-row">
			{capture assign="attr"}class="id-ff-remove" name="remove_{$idname}_collection_0" id="remove_{$idname}_collection_0" onclick="collection['{$displayParams.formName}_{$idname}'].remove(0); return false;"{/capture}

            <button type="button" class="id-ff-remove" {$attr}>
                {sugar_getimage name="id-ff-remove-nobg" ext=".png" attr="" alt=$alt_removeButton}
                {if !empty($displayParams.allowNewValue) }<input type="hidden" name="allow_new_value_{$idname}_collection_0" id="allow_new_value_{$idname}_collection_0" value="true">{/if}
            </button>

        </td>
        <td valign='top' align='center' class="teamset-row">
            <span id='{$displayParams.formName}_{$idname}_radio_div_0'>
            &nbsp;
            <input id="primary_{$idname}_collection_0" name="primary_{$idname}_collection" type="radio" class="radio" {if $displayParams.primaryChecked}checked="checked" title="{sugar_translate label='LBL_TEAM_PRIM_TITLE'}" {else} title="{sugar_translate label='LBL_TEAM_SELECT_AS_PRIM_TITLE'}" {/if} value="0" onclick="collection['{$displayParams.formName}_{$idname}'].changePrimary(true);"/>
            </span>
        </td>
        <td>
        &nbsp;
        </td>
        <td>
        &nbsp;
        </td>
<!-- END Remove and Radio -->
    </tr>
</table>
<!--
Put this button in here since we have moved the Add and Select buttons above the text fields, the accesskey will skip these. So create this button
and push it outside the screen.
-->
 <input style='position:absolute; left:-9999px; width: 0px; height: 0px;' halign='left' type="button" class="button" value="{sugar_translate label='LBL_SELECT_BUTTON_LABEL'}" onclick='javascript:open_popup("Teams", 600, 400, "", true, false, {literal}{"call_back_function":"set_return_teams_for_editview","form_name": {/literal} "{$displayParams.formName}","field_name":"{$idname}",{literal}"field_to_name_array":{"id":"team_id","name":"team_name"}}{/literal}, "MULTISELECT", true); if(collection["{$displayParams.formName}_{$idname}"].more_status)collection["{$displayParams.formName}_{$idname}"].js_more();'>
<script type="text/javascript">
(function() {ldelim}
    SUGAR_callsInProgress++;
    var field_id = '{$displayParams.formName}_{$vardef.name}';
    YAHOO.util.Event.onContentReady(field_id + "_table", function(){ldelim}

        //reset the secondary fields array for this form before populating
         collection[field_id].secondaries_values = new Array();

        if(collection[field_id] && collection[field_id].secondaries_values.length == 0) {ldelim}
            {if !empty($values.secondaries)}
                {foreach from=$values.secondaries item=secondary_field}
                var temp_array = new Array();
                temp_array['name'] = '{$secondary_field.name}';

   			 	temp_array['name'] = replaceHTMLChars(temp_array['name']);
   			 	
                temp_array['id'] = '{$secondary_field.id}';
                collection[field_id].secondaries_values.push(temp_array);
                {/foreach}
            {/if}
            var collection_field = collection[field_id];
            collection_field.add_secondaries(collection_field.secondaries_values);
        {rdelim}
    {rdelim});
{rdelim})();
 	document.getElementById("id_{$displayParams.formName}_{$idname}_collection_0").value = "{$values.primary.id}";
 	document.getElementById("{$displayParams.formName}_{$idname}_collection_0").value = replaceHTMLChars("{$values.primary.name}");
    {if isset($displayParams.arrow) && $displayParams.arrow == 'show'}
        setTimeout('call_js_more(collection_field)',1000);
    {else}
	   SUGAR_callsInProgress--;
	{/if}
	
    
    {literal}
	function call_js_more(c) {
	    c.js_more();
		SUGAR_callsInProgress--;
	}    
	{/literal}
</script>
{$quickSearchCode}
<script type="text/javascript">
<!--
if(typeof QSProcessedFieldsArray != 'undefined')
	QSProcessedFieldsArray["{$displayParams.formName}_{$idname}_collection_0"] = false;
enableQS(false);
-->
</script>

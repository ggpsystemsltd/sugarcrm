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
{if $property.type == "image"}
{if $count is not odd}</tr>{/if}
<tr>
    <td scope="row" width="20%">{$property.label}:<span class="error" id="resized_{$name}_img" style="display:none"> {$MOD.LBL_IMG_RESIZED}</span>{sugar_help text=$property.info_label} </td>
    <td colspan="3">
        <img src='{$property.path}' id='{$name}_img' style='margin-bottom: 10px;'>
        <input type='hidden' id='{$name}' name='{$name}' value='{$property.value}'>
        <script type='text/javascript'>
            {literal}
            YAHOO.util.Event.onDOMReady(function() {
                if(document.getElementById({/literal}"{$name}_img"{literal}).width>document.width/2){
                    document.getElementById({/literal}"{$name}_img"{literal}).width = document.width/2;
                    document.getElementById({/literal}"resized_{$name}_img"{literal}).style.display="";
                }
            });
            {/literal}
        </script>
    </td>
</tr>
{counter}
{else}
    {if $count is odd}
    <tr>
    {/if}
        <td scope="row" width="20%">{$property.label}:{if isset($property.required) && $property.required == true} <span class="required">*</span>{/if}{sugar_help text=$property.info_label} </td>
        <td  width="30%">
            {if isset($property.custom)}
                {$property.custom}
            {elseif $property.type == "text"}
                <input type='text' size='40' name='{$name}' id='{$name}' value='{$property.value}'>
            {elseif $property.type == "number"}
                <input type='text' size='10' name='{$name}' id='{$name}' value='{$property.value}' onchange="verifyNumber('{$name}')">
                {if isset($property.unit)}
                    {$property.unit}
                {/if}
            {elseif $property.type == "percent"}
                <input type='text' size='20' name='{$name}' id='{$name}' value='{$property.value}' onchange="verifyPercent('{$name}')">
            {elseif $property.type == "select"}
                {html_options name=$name options=$property.selectList selected=$property.value}
            {elseif $property.type == "multiselect"}
                <select name='{$name}[]' multiple size=4>
                {html_options options=$property.selectList selected=$property.value}
                </select>
            {elseif $property.type == "bool"}
                <input type="hidden" name='{$name}' value='false'>
                <input type='checkbox' name='{$name}' value='true' id='{$name}' {if $property.value == "true"}CHECKED{/if}>
            {elseif $property.type == "password"}
                <input type='password' size='20' name='{$name}' id='{$name}' value='{$property.value}'>
            {elseif $property.type == "file"}
                <input type="file" id='{$name}' name='{$name}' size="20" onBlur="checkFileType('{$name}',0);"/>
            {/if}
        </td>
    {if $count is not odd}
    </tr>
    {/if}
{/if}
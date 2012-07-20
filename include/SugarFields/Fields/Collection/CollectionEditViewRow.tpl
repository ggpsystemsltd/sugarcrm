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
<!-- BEGIN Labels Line -->
    <tr id="lineLabel_{$vardef.name}" name="lineLabel_{$vardef.name}">
        <td>
           {if empty($displayParams.hideNameLabel)}
           {ldelim}sugar_translate label='LBL_COLLECTION_NAME'{rdelim}:
           {/if}
        </td>
        {foreach item=extra_field from=$displayParams.collection_field_list key=key_extra}
        <td>
            {$extra_field.label}
            <script type="text/javascript">
                collection['{$vardef.name}'].extra_fields_count++;
            </script>
        </td>
        {/foreach}
        <td>

        </td>
        <td>

        </td>
        <td id="lineLabel_{$vardef.name}_primary" {if empty($values.role_field)}style="display:none"{/if}>
            {ldelim}sugar_translate label='LBL_COLLECTION_PRIMARY'{rdelim}
        </td>
<!-- BEGIN Add and collapse -->
        <td rowspan='1' valign='top'>
            &nbsp;&nbsp;<a class="utilsLink" href="javascript:collection['{$vardef.name}'].js_more();" id='more_{$vardef.name}' {if empty($values.secondaries)}style="display:none"{/if}>{sugar_getimage name="advanced_search" ext=".gif" width="8" height="8" alt=$app_strings.LBL_HIDE_SHOW other_attributes='border="0" id="more_img_{$vardef.name}" '}</a>
        </td>
<!-- END Add and collapse -->
    </tr>
<!-- END Labels Line -->
    <tr id="lineFields_{$vardef.name}_0" name="lineFields_{$vardef.name}_0" class="lineFields_{$vardef.name}">
        <td valign='top'>
            <input type="text" name="{$vardef.name}_collection_0" class="sqsEnabled {$displayParams.class}" tabindex="{$tabindex}" id="{$vardef.name}_collection_0" size="{$displayParams.size}" value="" title='{$vardef.help}' autocomplete="off" {$displayParams.readOnly} {$displayParams.field}>
            <input type="hidden" name="id_{$vardef.name}_collection_0" id="id_{$vardef.name}_collection_0" value="">
            {if $showSelectButton}
           		<input type="button" name="btn_{$vardef.name}_collection_0" tabindex="{$tabindex}" title="{sugar_translate label="{{$displayParams.accessKeySelectTitle}}" class="button" value="{sugar_translate label="{{$displayParams.accessKeySelectLabel}}" onclick='open_popup("{$module}", 600, 400, "", true, false, {$displayParams.popupData}, "single", true);'>
            {/if}
        </td>
        {foreach item=extra_field from=$displayParams.collection_field_list key=key_extra}
        <td class="td_extra_field" valign='top'>
            {$extra_field.field}
        </td>
        {/foreach}
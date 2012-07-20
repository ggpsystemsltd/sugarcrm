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
<style type="text/css">{literal}
.warn { font-style:italic;
        font-weight:bold;
        color:red;
}{/literal}
</style>

<script type='text/javascript' src='{sugar_getjspath file='include/javascript/popup_helper.js'}'></script>

<div id="{$tableID}_content">
    <table cellpadding='0' cellspacing='0' width='50%' border='0' class='list view'>
        {include file='modules/Import/tpls/listviewpaginator.tpl'}
        <tr height='20'>
            {counter start=0 name="colCounter" print=false assign="colCounter"}
            {if $displayColumns eq false}
                <th scope='col'  style="text-align: left;" nowrap="nowrap" colspan="{$maxColumns}">{$MOD.LBL_MISSING_HEADER_ROW}</th>
            {else}
                {foreach from=$displayColumns key=colHeader item=label}
                    <th scope='col' nowrap="nowrap">
                        <div style='white-space: nowrap;'width='100%' align='left' >
                        {$label}
                        </div>
                    </th>
                    {counter name="colCounter"}
                {/foreach}
            {/if}
        </tr>
        {counter start=$pageData.offsets.current print=false assign="offset" name="offset"}
        {foreach name=rowIteration from=$data key=id item=rowData}
            {counter name="offset" print=false}

            {if $smarty.foreach.rowIteration.iteration is odd}
                {assign var='_rowColor' value=$rowColor[0]}
            {else}
                {assign var='_rowColor' value=$rowColor[1]}
            {/if}
            <tr height='20' class='{$_rowColor}S1'>
                {counter start=0 name="colCounter" print=false assign="colCounter"}
                {foreach from=$rowData key=col item=params}
                    {strip}
                    <td align='left' valign="top">
                        {$params}
                    </td>
                    {/strip}
                    {counter name="colCounter"}
                {/foreach}
                </tr>
        {foreachelse}
        <tr height='20' class='{$rowColor[0]}S1'>
            <td colspan="{$colCounter}">
                <em>{$APP.LBL_NO_DATA}</em>
            </td>
        </tr>
        {/foreach}
    {include file='modules/Import/tpls/listviewpaginator.tpl'}
    </table>
</div>
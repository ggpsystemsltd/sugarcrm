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

<tr class='pagination' role='presentation'>
    <td colspan='{$colCount}'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
            <tr>
                <td  nowrap='nowrap' width='1%' align="left" class='paginationChangeButtons'>
                {if $pageData.offsets.current != 0}
                    <button type='button' id='listViewStartButton' name='listViewStartButton' title='{$navStrings.start}' class='button' onClick='SUGAR.IV.getTable("{$tableID}",0);'>
                        <img src='{sugar_getimagepath file='start.png'}' alt='{$navStrings.start}' align='absmiddle' border='0'>
                    </button>
                    {else}
                    <button type='button' id='listViewStartButton' name='listViewStartButton' title='{$navStrings.start}' class='button' disabled='disabled'>
                        <img src='{sugar_getimagepath file='start_off.png'}' alt='{$navStrings.start}' align='absmiddle' border='0'>
                    </button>
                {/if}
                {if $pageData.offsets.current != 0 }
                    <button type='button' id='listViewPrevButton' name='listViewPrevButton' title='{$navStrings.previous}' class='button' onClick='SUGAR.IV.getTable("{$tableID}", {$pageData.offsets.previous});'>
                        <img src='{sugar_getimagepath file='previous.png'}' alt='{$navStrings.previous}' align='absmiddle' border='0'>
                    </button>
                    {else}
                    <button type='button' id='listViewPrevButton' name='listViewPrevButton' class='button' title='{$navStrings.previous}' disabled='disabled'>
                        <img src='{sugar_getimagepath file='previous_off.png'}' alt='{$navStrings.previous}' align='absmiddle' border='0'>
                    </button>
                {/if}
                    <span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {$pageData.offsets.total})</span>
                {if $pageData.offsets.next > 0}
                    <button type='button' id='listViewNextButton' name='listViewNextButton' title='{$navStrings.next}' class='button' onClick='SUGAR.IV.getTable("{$tableID}", {$pageData.offsets.next});'>
                        <img src='{sugar_getimagepath file='next.png'}' alt='{$navStrings.next}' align='absmiddle' border='0'>
                    </button>
                {else}
                    <button type='button' id='listViewNextButton' name='listViewNextButton' class='button' title='{$navStrings.next}' disabled='disabled'>
                        <img src='{sugar_getimagepath file='next_off.png'}' alt='{$navStrings.next}' align='absmiddle' border='0'>
                    </button>
                {/if}
                {if $pageData.offsets.next > 0}
                    <button type='button' id='listViewEndButton' name='listViewEndButton' title='{$navStrings.end}' class='button' onClick='SUGAR.IV.getTable("{$tableID}", {$pageData.offsets.last});' >
                        <img src='{sugar_getimagepath file='end.png'}' alt='{$navStrings.end}' align='absmiddle' border='0'>
                    </button>
                {else}
                    <button type='button' id='listViewEndButton' name='listViewEndButton' title='{$navStrings.end}' disabled='disabled' class='button' onClick='SUGAR.IV.getTable("{$tableID}", {$pageData.offsets.last});' >
                        <img src='{sugar_getimagepath file='end_off.png'}' alt='{$navStrings.end}' align='absmiddle' border='0'>
                    </button>
                {/if}
                </td>
                <td nowrap="nowrap" width='2%' class='paginationActionButtons'></td>
            </tr>
        </table>
    </td>
</tr>
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

{literal}
<style type="text/css">
.QuickView {
height:12px;
cursor:pointer;
}
.SpanQuickView {
visibility:hidden;
padding-right:5px;
}
.gs_link {
border:0;
}
</style>
{/literal}
<div id="SpotResults">
{if !empty($displayResults)}
{foreach from=$displayResults key=module item=data}
<div>
    {if isset($appListStrings.moduleList[$module])}
        {$appListStrings.moduleList[$module]}
    {else}
        {$module}
    {/if}
    {if !empty($displayMoreForModule[$module])}
    {assign var="more" value=$displayMoreForModule[$module]}
    <small class='more' onclick="DCMenu.spotZoom('{$more.query}', '{$module}', '{$more.offset}');">({$more.countRemaining} {$appStrings.LBL_SEARCH_MORE})</small>
    {/if}
</div>
<table class="gs_table">
    {if isset($data.link)}
        <tr>
            <td>{sugar_getimage name='blank.gif' width='16' height='16' border='0'}</td>
            <td>
                <a href="index.php?&module=Home&action=UnifiedSearch&query_string={$data.link.query_encoded}">{$data.link.total} {$appStrings.LBL_SEARCH_RESULTS}</a>
            </td>
        </tr>
        </table>
    {else}
        {foreach from=$data key=id item=name}
        <tr onmouseover="DCMenu.showQuickViewIcon('{$id}')" onmouseout="DCMenu.hideQuickViewIcon('{$id}')">
        <td>
        <span id="gs_div_{$id}" class="SpanQuickView">
        <img id="gs_img_{$id}" class="QuickView" src="themes/default/images/Search.gif" alt="quick_view_{$id}" onclick="DCMenu.showQuickView('{$module}', '{$id}');">
        </span>
        </td>
        <td><a href="index.php?module={$module}&action=DetailView&record={$id}" class="gs_link">{$name}</a></td>
        </tr>
        {/foreach}
        </table>
    {/if}
{/foreach}
{else}
{$appStrings.LBL_EMAIL_SEARCH_NO_RESULTS}
{/if}
<p>
<button onclick="document.location.href='index.php?module=Home&action=UnifiedSearch&search_form=false&advanced=false&query_string={$queryEncoded}'">{$appStrings.LBL_EMAIL_SHOW_READ}</button>
</div>
{if false}
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

{/if}
 
 <br>
 <p>{$CONFIRM_LAYOUT_DESC}</p>
 <br>
 
 <table width="100%" id="layoutSelection">
 <thead>
    <tr>
        {if $showCheckboxes}
        <th width="5%">&nbsp;</th>
        {/if}
        <th width="25%">{$APP.LBL_MODULE}</th>
        <th width="50%">{$MOD.LBL_LAYOUT_MODULE_TITLE}</th>
    </tr>
</thead>
<tbody>
{foreach from=$METADATA_DATA key=moduleKey item=data}
    <tr>
        {if $showCheckboxes}
        <td>
            <input type="checkbox" name="lm_{$moduleKey}" checked>
        </td>
        {/if}
        <td>
        {$data.moduleName}
        </td>
        <td>
            {foreach from=$data.layouts item=layout}
                    {$layout.label}
                 <br> 
            {/foreach}
        </td>
    </tr>
{/foreach}
</tbody>
</table>

<div id="upgradeDiv" style="display:none">
    <table cellspacing="0" cellpadding="0" border="0">
        <tr><td>
           <p><img src='modules/UpgradeWizard/processing.gif' alt='{$mod_strings.LBL_PROCESSING}'></p>
        </td></tr>
     </table>
 </div>
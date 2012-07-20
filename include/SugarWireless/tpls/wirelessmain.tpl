
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
<hr />
<!-- Activities for the day -->
{if $todays_activities}
<div class="sectitle">{sugar_translate label='LBL_TODAYS_ACTIVITIES' module=''}</div>
{foreach from=$activities_today item=data key=module}
	<div class="subpanel_sec">{$module}:</div>
	<ul class="sec">
	{foreach from=$data item=activity name="activitylist"}
	{assign var="activity_image" value=$module}
	{assign var="dotgif" value=".gif"}	
	<li class="{if $smarty.foreach.activitylist.index % 2 == 0}odd{else}even{/if}">
        <a href=index.php?module={$module}&action=wirelessdetail&record={$activity.ID}>{sugar_getimage name=$activity_image$dotgif alt=$activity_image other_attributes='border="0" '}&nbsp;
        {$activity.NAME}</a>
    </li>
	{/foreach}
	</ul>
{/foreach}
{/if}
<!-- Last Viewed -->
{if $last_viewed}
<div class="sectitle">{$LBL_LAST_VIEWED}</div>
<ul class="sec">
	{foreach from=$LAST_VIEWED_LIST item=LAST_VIEWED key=ID name="recordlist"}
	{assign var="module_image" value=$LAST_VIEWED.module}
	{assign var="dotgif" value=".gif"}
	<li class="{if $smarty.foreach.recordlist.index % 2 == 0}odd{else}even{/if}">
        <a href=index.php?module={$LAST_VIEWED.module}&action=wirelessdetail&record={$ID}>{sugar_getimage name=$module_image$dotgif alt=$module_image other_attributes='border="0" '}&nbsp;
        {$LAST_VIEWED.summary}</a>
    </li>
	{/foreach}
</ul>
{/if}
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
{if $USE_GROUP_TABS}
<div id="moduleList">
<ul>
    <li class="noBorder">&nbsp;</li>
    {assign var="groupSelected" value=false}
    {foreach from=$groupTabs item=modules key=group name=groupList}
    {capture name=extraparams assign=extraparams}parentTab={$group}{/capture}
    {if ( ( $smarty.request.parentTab == $group || (!$smarty.request.parentTab && in_array($MODULE_TAB,$modules.modules)) ) && !$groupSelected ) || ($smarty.foreach.groupList.index == 0 && $defaultFirst)}
    <li class="noBorder">
        <span class="currentTabLeft">&nbsp;</span><span class="currentTab">
            <a href="#" id="grouptab_{$smarty.foreach.groupList.index}">{$group}</a>
        </span><span class="currentTabRight">&nbsp;</span>
        {assign var="groupSelected" value=true}
    {else}
    <li>
        <span class="notCurrentTabLeft">&nbsp;</span><span class="notCurrentTab">
        <a href="#" id="grouptab_{$smarty.foreach.groupList.index}">{$group}</a>
        </span><span class="notCurrentTabRight">&nbsp;</span>
    {/if}
    </li>
    {/foreach}
</ul>
</div>
<div class="clear"></div>
<div id="subModuleList">
    {assign var="groupSelected" value=false}
    {foreach from=$groupTabs item=modules key=group name=moduleList}
    {capture name=extraparams assign=extraparams}parentTab={$group}{/capture}
    <span id="moduleLink_{$smarty.foreach.moduleList.index}" {if ( ( $smarty.request.parentTab == $group || (!$smarty.request.parentTab && in_array($MODULE_TAB,$modules.modules)) ) && !$groupSelected ) || ($smarty.foreach.moduleList.index == 0 && $defaultFirst)}class="selected" {assign var="groupSelected" value=true}{/if}>
    	<ul>
	        {foreach from=$modules.modules item=module key=modulekey}
	        <li>
	        	{capture name=moduleTabId assign=moduleTabId}moduleTab_{$smarty.foreach.moduleList.index}_{$module}{/capture}
	        	{sugar_link id=$moduleTabId module=$modulekey data=$module extraparams=$extraparams}
	        </li>
	        {/foreach}
	        {if !empty($modules.extra)}
	        <li class="subTabMore">
	        	<a>>></a>      
		        <ul class="cssmenu">
		        {foreach from=$modules.extra item=submodulename key=submodule}
					<li>
						<a href="{sugar_link module=$submodule link_only=1 extraparams=$extraparams}">{$submodulename}
						</a>
					</li>
		        {/foreach}
		        </ul> 
	        </li>
	        {/if}	        
        </ul>
    </span>
    {/foreach}    
</div>
{else}
<div id="moduleList">
<ul>
    <li class="noBorder">&nbsp;</li>
    {foreach from=$moduleTopMenu item=module key=name name=moduleList}
    {if $name == $MODULE_TAB}
    <li class="noBorder">
        <span class="currentTabLeft">&nbsp;</span><span class="currentTab">{sugar_link id="moduleTab_$name" module=$name}</span><span class="currentTabRight">&nbsp;</span>
    {else}
    <li>
        <span class="notCurrentTabLeft">&nbsp;</span><span class="notCurrentTab">{sugar_link id="moduleTab_$name" module=$name data=$module}</span><span class="notCurrentTabRight">&nbsp;</span>
    {/if}
    </li>
    {/foreach}
    {if count($moduleExtraMenu) > 0}
    <li id="moduleTabExtraMenu">
        <a href="#">&gt;&gt;</a><br />
        <ul class="cssmenu">
            {foreach from=$moduleExtraMenu item=module key=name name=moduleList}
            <li>{sugar_link id="moduleTab_$name" module=$name data=$module}
            {/foreach}
        </ul>        
    </li>
    {/if}
</ul>
</div>
{/if}

    {if $AUTHENTICATED}
    {include file="_headerLastViewed.tpl" theme_template=true}
    {include file="_headerShortcuts.tpl" theme_template=true}
    {/if}

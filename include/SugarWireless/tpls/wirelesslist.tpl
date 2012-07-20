
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
<!-- ListView Data -->
{if $SUBPANEL_LIST_VIEW}
	<div class="sectitle">
	{$BEAN->name} <small>[ <a class="back_link" href="index.php?module={$MODULE}&action=wirelessdetail&record={$BEAN->id}">{sugar_translate label='LBL_BACK' module=''}</a> ]</small>
	</div>
	<div class="subpanel_sec">
	{sugar_translate label='LBL_RELATED' module=''} {$SUBPANEL_MODULE}<br />
	</div>
	<ul class="sec">
	{foreach from=$DATA item="record" name="recordlist"}
	<li class="{if $smarty.foreach.recordlist.index % 2 == 0}odd{else}even{/if}">
        <a href="index.php?module={$record->module_dir}&action=wirelessdetail&record={$record->id}">{$record->name}</a>
    </li>
	{/foreach}
	</ul>
{else}
	<div class="sectitle">{sugar_translate label='LBL_SEARCH_RESULTS' module=''}{if $SAVED_SEARCH_NAME} - {$SAVED_SEARCH_NAME}{/if}</div>
	
	<table class="sec">
	
	<tr>
		{foreach from=$displayColumns key=colHeader item=params}
			<td scope='col' width='{$params.width}%' nowrap="nowrap">
				{sugar_translate label=$params.label module=$pageData.bean.moduleDir}
			</td>
		{/foreach}
	</tr>	
	
	{foreach from=$DATA item="rowData" name="recordlist"}
	<tr>

		{foreach from=$displayColumns key=col item=params}				
		<td class="{if $smarty.foreach.recordlist.index % 2 == 0}odd{else}even{/if}">
				{if $params.link && !$params.customCode}
					<a href="index.php?module={$MODULE}&action=wirelessdetail&record={$rowData.ID}">{$rowData.$col}</a>
                {elseif $params.customCode} 
					{sugar_evalcolumn_old var=$params.customCode rowData=$rowData}
				{elseif $params.currency_format} 
					{sugar_currency_format 
                        var=$rowData.$col 
                        round=$params.currency_format.round 
                        decimals=$params.currency_format.decimals 
                        symbol=$params.currency_format.symbol
                        convert=$params.currency_format.convert
                        currency_symbol=$params.currency_format.currency_symbol
					}
				{elseif $params.type == 'bool'}
						<input type='checkbox' disabled=disabled class='checkbox'
						{if !empty($rowData[$col])}
							checked=checked
						{/if}
						/>
				{elseif $params.type == 'teamset'}
					{$rowData.$col}
				{elseif $params.type == 'multienum'}
					{if !empty($rowData.$col)} 
						{counter name="oCount" assign="oCount" start=0}
						{assign var="vals" value='^,^'|explode:$rowData.$col}
						{foreach from=$vals item=item}
							{counter name="oCount"}
							{sugar_translate label=$params.options select=$item}{if $oCount !=  count($vals)},{/if} 
						{/foreach}	
					{/if}
				{else}	
					{$rowData.$col|default:"&nbsp;"}
				{/if}
		</td>
		{/foreach}
	</tr>
	{/foreach}
    </table>
	
	<div class="nav_sec" align="right">
	{if $PAGEDATA.offsets.prev != -1}<small><a href="{$PAGEDATA.urls.prevPage}" class="nav">{$navStrings.previous}</a>&nbsp;</small>{/if}
	{if $PAGEDATA.offsets.lastOffsetOnPage == 0}0{else}{$PAGEDATA.offsets.current+1}{/if} - {$PAGEDATA.offsets.lastOffsetOnPage} {$navStrings.of} {if $PAGEDATA.offsets.totalCounted}{$PAGEDATA.offsets.total}{else}{$PAGEDATA.offsets.total}{if $PAGEDATA.offsets.lastOffsetOnPage != $PAGEDATA.offsets.total}+{/if}{/if}
	{if $PAGEDATA.offsets.next != -1}<small>&nbsp;<a href="{$PAGEDATA.urls.nextPage}" class="nav">{$navStrings.next}</a></small>{/if}
	</div>
	<div class="sectitle">{sugar_translate label='LBL_SEARCH' module=''} {$MODULE_NAME} {$LITERAL_MODULE}</div>
	{$WL_SAVED_SEARCH_FORM}
	<!--  Search Def Searches -->
	{$WL_SEARCH_FORM}	
{/if}
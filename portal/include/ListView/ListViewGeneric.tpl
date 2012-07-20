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
<table cellpadding='0' cellspacing='0' width='100%' border='0' class='listView'>
	<tr>
		<td colspan='{$colCount}' align='right'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td align='left' class='listViewPaginationTdS1'>&nbsp;</td>
					<td class='listViewPaginationTdS1' align='right' nowrap='nowrap'>
						{if $pageData.urls.startPage}
							<a href='{$pageData.urls.startPage}' {if $prerow}onclick="javascript:return sListView.save_checks(0, '{$moduleString}')"{/if} class='listViewPaginationLinkS1'><img src='{$imagePath}start.gif' alt=$app_strings.LNK_LIST_START align='absmiddle' border='0' height='11' width='13'>&nbsp;Start</a>&nbsp;
						{else}
							<img src='{$imagePath}start_off.gif' alt=$app_strings.LNK_LIST_START align='absmiddle' border='0' height='11' width='13'>&nbsp;Start&nbsp;&nbsp;
						{/if}
						{if $pageData.urls.prevPage}
							<a href='{$pageData.urls.prevPage}' {if $prerow}onclick="javascript:return sListView.save_checks({$pageData.offsets.prev}, '{$moduleString}')"{/if} class='listViewPaginationLinkS1'><img src='{$imagePath}previous.gif' alt=$app_strings.LNK_LIST_PREVIOUS align='absmiddle' border='0' height='11' width='8'>&nbsp;Previous</a>&nbsp;
						{else}
							<img src='{$imagePath}previous_off.gif' alt=$app_strings.LNK_LIST_PREVIOUS align='absmiddle' border='0' height='11' width='8'>&nbsp;Previous&nbsp;
						{/if}
							<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} of {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.total>$pageData.offsets.lastOffsetOnPage}+{/if}{/if})</span>
						{if $pageData.urls.nextPage}
							&nbsp;<a href='{$pageData.urls.nextPage}' {if $prerow}onclick="javascript:return sListView.save_checks({$pageData.offsets.next}, '{$moduleString}')"{/if} class='listViewPaginationLinkS1'>Next&nbsp;<img src='{$imagePath}next.gif' alt=$app_strings.LNK_LIST_NEXT align='absmiddle' border='0' height='11' width='8'></a>&nbsp;
						{else}
							&nbsp;Next&nbsp;<img src='{$imagePath}next_off.gif' alt=$app_strings.LNK_LIST_NEXT align='absmiddle' border='0' height='11' width='8'>
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr height='20'>
		{foreach from=$displayColumns key=colHeader item=params}
			<td scope='col' width='{$params.width}%' class='listViewThS1' nowrap>
				<div style='white-space: nowrap;'width='100%' align='{$params.align|default:'left'}'>
                {if $params.sortable|default:true}
	                <a href='{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}' class='listViewThLinkS1'>{$params.label}&nbsp;&nbsp;
					{if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy}
						{if $pageData.ordering.sortOrder == 'ASC'}
							<img border='0' src='{$imagePath}arrow_down.{$arrowExt}' width='{$arrowWidth}' height='{$arrowHeight}' align='absmiddle' alt='{$arrowAlt}'>
						{else}
							<img border='0' src='{$imagePath}arrow_up.{$arrowExt}' width='{$arrowWidth}' height='{$arrowHeight}' align='absmiddle' alt='{$arrowAlt}'>
						{/if}
					{else}
						<img border='0' src='{$imagePath}arrow.{$arrowExt}' width='{$arrowWidth}' height='{$arrowHeight}' align='absmiddle' alt='{$arrowAlt}'>
					{/if}
					</a>
				{else}
					{$params.label}
				{/if}
				</div>
			</td>
		{/foreach}
	</tr>

	{foreach name=rowIteration from=$data key=id item=rowData}
		{if $smarty.foreach.rowIteration.iteration is odd}
			{assign var='_bgColor' value=$bgColor[0]}
			{assign var='_rowColor' value=$rowColor[0]}
		{else}
			{assign var='_bgColor' value=$bgColor[1]}
			{assign var='_rowColor' value=$rowColor[1]}
		{/if}
		<tr height='20' onmouseover="setPointer(this, '{$id}', 'over', '{$_bgColor}', '{$bgHilite}', '');" onmouseout="setPointer(this, '{$id}', 'out', '{$_bgColor}', '{$bgHilite}', '');" onmousedown="setPointer(this, '{$id}', 'click', '{$_bgColor}', '{$bgHilite}', '');">
			{foreach from=$displayColumns key=col item=params}
				<td scope='row' align='{$params.align|default:'left'}' valign=top class='{$_rowColor}S1' bgcolor='{$_bgColor}'>
					{if $params.link && !$params.customCode}
						<{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href='index.php?action={$params.action|default:'DetailView'}&module={if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.module}{/if}&id={$rowData[$params.id]|default:$id}&offset={$pageData.offsets.current+$smarty.foreach.rowIteration.iteration}&stamp={$pageData.stamp}&returnAction={$returnAction}&returnModule={$returnModule}&returnId={$returnId}' class='listViewTdLinkS1'>{$rowData.$col}</{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>
					{elseif $params.customCode}
						{sugar_evalcolumn var=$params.customCode rowData=$rowData}
					{elseif $pageData.checkboxes.$col}
						{if $rowData.$col == '1'}
							<input type='checkbox' checked disabled='disabled'>
						{else}
							<input type='checkbox' disabled='disabled'>
						{/if}
					{elseif $params.type == 'multienum'}
						{if !empty($rowData.$col)} 
							{counter name="oCount" assign="oCount" start=0}
							{assign var="vals" value='^,^'|explode:$rowData.$col}
							{foreach from=$vals item=item}
								{counter name="oCount"}
								{$item}{if $oCount !=  count($vals)},{/if} 
							{/foreach}	
						{/if}
					{elseif $params.type == 'html'}
					    {$params.default_value|from_html}
					{elseif $params.type == 'url'}
					    {if !preg_match('/^http(s)?:\/\/$/', $rowData.$col)}
					    <a href="{$rowData.$col}">{$rowData.$col}</a>
					    {/if}											
					{else}
						{$rowData.$col|nl2br}
					{/if}
				</td>
			{/foreach}
    	</tr>
	 	<tr><td colspan='20' class='listViewHRS1'></td></tr>
	{/foreach}
	<tr>
		<td colspan='{$colCount}' align='right'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td align='left' class='listViewPaginationTdS1'>&nbsp;</td>
					<td class='listViewPaginationTdS1' align='right' nowrap='nowrap'>
						{if $pageData.urls.startPage}
							<a href='{$pageData.urls.startPage}' {if $prerow}onclick="javascript:return sListView.save_checks(0, '{$moduleString}')"{/if} class='listViewPaginationLinkS1'><img src='{$imagePath}start.gif' alt=$app_strings.LNK_LIST_START align='absmiddle' border='0' height='11' width='13'>&nbsp;Start</a>&nbsp;
						{else}
							<img src='{$imagePath}start_off.gif' alt=$app_strings.LNK_LIST_START align='absmiddle' border='0' height='11' width='13'>&nbsp;Start&nbsp;&nbsp;
						{/if}
						{if $pageData.urls.prevPage}
							<a href='{$pageData.urls.prevPage}' {if $prerow}onclick="javascript:return sListView.save_checks({$pageData.offsets.prev}, '{$moduleString}')"{/if} class='listViewPaginationLinkS1'><img src='{$imagePath}previous.gif' alt=$app_strings.LNK_LIST_PREVIOUS align='absmiddle' border='0' height='11' width='8'>&nbsp;Previous</a>&nbsp;
						{else}
							<img src='{$imagePath}previous_off.gif' alt=$app_strings.LNK_LIST_PREVIOUS align='absmiddle' border='0' height='11' width='8'>&nbsp;Previous&nbsp;
						{/if}
							<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} of {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.total>$pageData.offsets.lastOffsetOnPage}+{/if}{/if})</span>
						{if $pageData.urls.nextPage}
							&nbsp;<a href='{$pageData.urls.nextPage}' {if $prerow}onclick="javascript:return sListView.save_checks({$pageData.offsets.next}, '{$moduleString}')"{/if} class='listViewPaginationLinkS1'>Next&nbsp;<img src='{$imagePath}next.gif' alt=$app_strings.LNK_LIST_NEXT align='absmiddle' border='0' height='11' width='8'></a>&nbsp;
						{else}
							&nbsp;Next&nbsp;<img src='{$imagePath}next_off.gif' alt=$app_strings.LNK_LIST_NEXT align='absmiddle' border='0' height='11' width='8'>
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
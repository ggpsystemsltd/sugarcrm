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
	<tr class='pagination'  role='presentation'>
		<td colspan='{if $prerow}{$colCount+1}{else}{$colCount}{/if}'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
					<td nowrap="nowrap" width='2%' class='paginationActionButtons'>
						{$actionsLink}&nbsp;
						&nbsp;{$selectedObjectsSpan}
					</td>
					<td  nowrap='nowrap' width='1%' align="right" class='paginationChangeButtons'>
						{capture assign="other_attributes"}align="absmiddle" border="0"{/capture}
                        {if $pageData.urls.startPage}
                            {assign var="alt_start" value=$navStrings.start}
							<button type='button' id='listViewStartButton' name='listViewStartButton' title='{$navStrings.start}' class='button' {if $prerow}onClick='save_kb_checks(0); SUGAR.kb.paginateList("{$pageData.urls.startPage}", "browse");'{else} onClick='SUGAR.kb.paginateList("{$pageData.urls.startPage}", document.getElementById("mode_b").value);' {/if}>
                                {sugar_getimage name="start" ext=".png" alt=$navStrings.start other_attributes=$other_attributes alt="$alt_start"}
							</button>
						{else}
							<button type='button' id='listViewStartButton' name='listViewStartButton' title='{$navStrings.start}' class='button' disabled='disabled'>
								{sugar_getimage name="start_off" ext=".png" alt=$navStrings.start other_attributes=$other_attributes}
							</button>
						{/if}
						{if $pageData.urls.prevPage}
                            {assign var="alt_prev" value=$navStrings.previous}
							<button type='button' id='listViewPrevButton' name='listViewPrevButton' title='{$navStrings.previous}' class='button' {if $prerow}onClick='save_kb_checks({$pageData.offsets.prev}); SUGAR.kb.paginateList("{$pageData.urls.prevPage}", "browse");' {else} onClick='SUGAR.kb.paginateList("{$pageData.urls.prevPage}", document.getElementById("mode_b").value);'{/if}>
								{sugar_getimage name="previous" ext=".png" alt=$navStrings.previous other_attributes=$other_attributes alt="$alt_prev"}
							</button>
						{else}
							<button type='button' id='listViewPrevButton' name='listViewPrevButton' class='button' title='{$navStrings.previous}' disabled='disabled'>
								{sugar_getimage name="previous_off" ext=".png" alt=$navStrings.previous other_attributes=$other_attributes}
							</button>
						{/if}
							<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
						{if $pageData.urls.nextPage}
                            {assign var="alt_next" value=$navStrings.next}
							<button type='button' id='listViewNextButton' name='listViewNextButton' title='{$navStrings.next}' class='button' {if $prerow}onClick='save_kb_checks({$pageData.offsets.next}); SUGAR.kb.paginateList("{$pageData.urls.nextPage}", "browse");' {else} onClick='SUGAR.kb.paginateList("{$pageData.urls.nextPage}", document.getElementById("mode_b").value);'{/if}>
								{sugar_getimage name="next" ext=".png" alt=$navStrings.next other_attributes=$other_attributes alt="$alt_next"}
							</button>
						{else}
							<button type='button' id='listViewNextButton' name='listViewNextButton' class='button' title='{$navStrings.next}' disabled='disabled'>
								{sugar_getimage name="next_off" ext=".png" alt=$navStrings.next other_attributes=$other_attribtues}
							</button>
						{/if}
						{if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}
                            {assign var="alt_end" value=$navStrings.end}
							<button type='button' id='listViewEndButton' name='listViewEndButton' title='{$navStrings.end}' class='button' {if $prerow}onClick='save_kb_checks("end"); SUGAR.kb.paginateList("{$pageData.urls.endPage}", "browse");' {else} onClick='SUGAR.kb.paginateList("{$pageData.urls.endPage}", document.getElementById("mode_b").value);'{/if}>
								{sugar_getimage name="end" ext=".png" alt=$navStrings.end other_attributes=$other_attributes alt="$alt_end"}
							</button>
						{elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
							<button type='button' id='listViewEndButton' name='listViewEndButton' title='{$navStrings.end}' class='button' disabled='disabled'>
							 	{sugar_getimage name="end_off" ext=".png" alt=$navStrings.end other_attributes=$other_attributes}
							</button>
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
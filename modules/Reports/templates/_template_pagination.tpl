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

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="paginationTable">
	<tr>
		<td align="right">&nbsp;&nbsp;<span class='pageNumbers'><button type='button' title='{$app_strings.LNK_LIST_START}' {if isset($start_link_onclick)} {$start_link_onclick} {/if} class='button' {if ($start_link_disabled)} disabled {/if}>{$start_link_ImagePath}</button>&nbsp;<button type='button' title='{$app_strings.LNK_LIST_PREVIOUS}' {if isset($prev_link_onclick)} {$prev_link_onclick} {/if} class='button' {if ($prev_link_disabled)} disabled {/if}>{$prev_link_ImagePath}</button>&nbsp;({$start_range} - {$end_range} {$mod_strings.LBL_OF} {$total_count})&nbsp;<button type='button' title='{$app_strings.LNK_LIST_NEXT}' {if isset($next_link_onclick)} {$next_link_onclick} {/if} class='button' {if ($next_link_disabled)} disabled {/if}>{$next_link_ImagePath}</button>&nbsp; <button type='button' title='{$app_strings.LNK_LIST_END}' {if isset($end_link_onclick)} {$end_link_onclick} {/if} class='button' {if ($end_link_disabled)} disabled {/if}>{$end_link_ImagePath}</button></span>&nbsp;&nbsp;&nbsp;
		</td>
	</tr>
</table>		
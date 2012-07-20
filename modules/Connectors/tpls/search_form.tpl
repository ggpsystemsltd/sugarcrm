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
<table class="h3Row" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td nowrap>
<h3>{$mod.LBL_MODIFY_SEARCH}</h3></td><td width='100%'>
<IMG height='1' width='1' src='include/images/blank.gif' alt=''>
</td>
</tr>
</table>
<form name='SearchForm' method='POST' id='SearchForm'>
 	<input type='hidden' name='source_id' id='source_id' value='{$source_id}' />
 	<input type='hidden' name='merge_module' value='{$module}' />
 	<input type='hidden' name='record' value='{$RECORD}' />
 	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tabForm">
{if !empty($search_fields) }
 	<tr>
 	 {counter assign=field_count start=0 print=0} 
	 {foreach from=$search_fields key=field_name item=field_value} 
	 	{counter assign=field_count}
		{if ($field_count % 3 == 1 && $field_count != 1)}
		</tr><tr>
		{/if}
		<td nowrap="nowrap" width='10%' class="dataLabel">
		{$field_value.label}: 
		</td>
		<td nowrap="nowrap" width='30%' class="dataField">
		<input type='text' onkeydown='checkKeyDown(event);' name='{$field_name}' value='{$field_value.value}'/>
		</td>
	 {/foreach}
{else}
     {$mod.ERROR_NO_SEARCHDEFS_MAPPING}
{/if}
</table>
<input type='button' name='btn_search' id='btn_search' title="{$APP.LBL_SEARCH_BUTTON_LABEL}" accessKey="{$APP.LBL_SEARCH_BUTTON_KEY}" class="button" onClick="javascript:SourceTabs.search();" value="      {$APP.LBL_SEARCH_BUTTON_LABEL}      "/>&nbsp;
<input type='button' name='btn_clear' title="{$APP.LBL_CLEAR_BUTTON_LABEL}" class="button" onClick="javascript:SourceTabs.clearForm();" value="{$APP.LBL_CLEAR_BUTTON_LABEL}"/>
</form>
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
<div id="module_join_tab">
<div>
&nbsp;<span id='checkGroups' style='display: none; color: red'><i>{$mod_strings.LBL_TABLE_CHANGED}</i></span>
</div>
<table border=0 width="100%" cellspacing="0" cellpadding="0">
	<tr class="{$classname}">
		<td class="{$classname}" width="50%">
			<table border=0 width="100%" cellspacing="0" cellpadding="3">
			<tr class="{$classname}">
			<td class="{$classname}">
			<h5>{$mod_strings.LBL_MODULE}:</h5>
			<select id='self' name="self" onChange="table_changed(this);">
			{foreach from=$ACLAllowedModulesjuliansort key=module item=bean_name}
			{if ($module neq 'Reports')}
			<option value="{$module}" {if $module eq $reporter->module} "SELECTED" {/if}>{$app_list_strings.moduleList.$module}</option>
			{/if}
			{/foreach}
			</select>
			<a href="" class="button" style="padding: 2px; text-decoration: none;" onClick="add_related('self'); return(false);">{$mod_strings.LBL_ADD_RELATE}</a>
			</td>
			</tr>
			</table>
			<input type=hidden name='links_def' value ="">
			<div style="border-left: 2px dotted #000000; padding-left: 5px;" id="self_children"></div>
			<table id='joins_table' cellpadding=0 cellspacing=0 border=0>
			</table>
		</td>
		<td align="left" width="50%">
		<br>
			<table border=0 width="100%" cellspacing="0" cellpadding="0">
			<tr class="{$classname}">
			<td class="{$classname}">{$mod_strings.LBL_REPORT_NAME}:</td>
			<td class="{$classname}"><input type="text" size="30" value="{$save_report_as_template_reports_tables}" name="save_report_as"/></td>
			<tr class="{$classname}">
			<td class="{$classname}">{$mod_strings.LBL_SHOW_QUERY}:</td>
			<td class="{$classname}" style="vertical-align : middle;">
				<input type="checkbox" class="checkbox" name="show_query" {if ($show_query)}CHECKED{/if} />
			</td>
			</tr>
			<tr class="{$classname}">
			<td class="{$classname}">{$mod_strings.LBL_OWNER}:</td>
			<td class="{$classname}" style="vertical-align : middle;">{$assigned_user_html}</td>
			</tr>
			<tr class="{$classname}">
			<td class="{$classname}">{$mod_strings.LBL_TEAM}:</td>
			<td class="{$classname}" style="vertical-align : middle;">{$team_html}</td>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<p/>
			<p/>
			<table>
			<tr>
			<td  width="1%" align=center valign=middle><input type="radio" class="radio" onClick="reportTypeChanged();" id="report_type" name="report_type" value="tabular" {if ($reporter_report_def_report_type eq 'tabular')} CHECKED {/if}></td>
			<td align="left" scope="row" style="vertical-align : middle;">{$mod_strings.LBL_ROWS_AND_COLUMNS_REPORT}</td>
			</tr>
			<tr>
			<td width="1%" align=center valign=middle><input type="radio" class="radio" name="report_type" id="report_type" onclick="reportTypeChanged();" value="summary" {if ($reporter_report_def_report_type eq 'summary')} CHECKED {/if}></td>
			<td align="left" scope="row" style="vertical-align : middle;">{$mod_strings.LBL_SUMMATION_REPORT}</td>
			</tr>
			</table>

		</td>
	</tr>
</table>
</div>
<P/>
{$quicksearch_js}
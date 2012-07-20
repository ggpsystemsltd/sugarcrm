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
{if ($issetSaveResults)}

	{if ($isSaveResults)}
<p>	<span><b>{$mod_strings.LBL_SUCCESS_REPORT}{$save_report_as_str}{$mod_strings.LBL_WAS_SAVED}</b></span></p>
	{else}
	<span><b>{$mod_strings.LBL_FAILURE_REPORT}{$save_report_as_str}{$mod_strings.LBL_WAS_NOT_SAVED}</b></span></p>
	{/if}
{/if}
{$form_header}
<form action="index.php#main" method="post" name="EditView" onSubmit="return fill_form();">
<input type="hidden" name='report_offset' value ="{$report_offset}">
<input type="hidden" name='sort_by' value ="{$sort_by}">
<input type="hidden" name='sort_dir' value ="{$sort_dir}">
<input type="hidden" name='summary_sort_by' value ="{$summary_sort_by}">
<input type="hidden" name='summary_sort_dir' value ="{$summary_sort_dir}">
<input type="hidden" name='expanded_combo_summary_divs' id='expanded_combo_summary_divs' value=''>
<input type="hidden" name="action" value="index">
<input type="hidden" name="module" value="Reports">
<input type="hidden" name="record" value="{$report_id}">
<input type="hidden" name='report_def' value ="">
<input type="hidden" name='save_as' value ="">
<input type="hidden" name="page" value="report">
<input type="hidden" name="to_pdf" value="{$to_pdf}"/>
<input type="hidden" name="to_csv" value="{$to_csv}"/>
<input type="hidden" name="save_report" value=""/>

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="padding-bottom: 2px;"">
{if ($report_edit_access)}

<input type=submit class="button" title="{$mod_strings.LBL_RUN_BUTTON_TITLE}"
    value="{$mod_strings.LBL_RUN_REPORT_BUTTON_LABEL}"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value=''">
<input type=submit class="button" title="{$app_strings.LBL_SAVE_BUTTON_TITLE}"
    accessKey="{$app_strings.LBL_SAVE_BUTTON_KEY}"
    value="{$app_strings.LBL_SAVE_BUTTON_LABEL}"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';">
<input type=submit class="button" title="{$app_strings.LBL_SAVE_AS_BUTTON_TITLE}"
    value="{$app_strings.LBL_SAVE_AS_BUTTON_LABEL}"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';this.form.record.value='';this.form.save_as.value='true'">
{/if}
{if ($report_export_access)}
<input type=submit class="button" title="{$app_strings.LBL_VIEW_PDF_BUTTON_TITLE}"
    value="{$app_strings.LBL_VIEW_PDF_BUTTON_LABEL}"
    onclick="this.form.save_report.value='';this.form.to_csv.value='';this.form.to_pdf.value='on'">
{/if}
</td>
</tr>
</table>

<script language="javascript">
var form_submit = "{$form_submit}";
var tab_keys = new Array('module_join_tab','filters_tab','columns_tab','group_by_tab','chart_options_tab');
LBL_RELATED = '{$mod_strings.LBL_RELATED}';
{literal}
function showReportTab(show_key) {
	for(var i in tab_keys) {
		document.getElementById(tab_keys[i]).style.display='none';
	} // for
 	document.getElementById(show_key).style.display='block';
} // fn
{/literal}
ACLAllowedModules = {$ACLAllowedModules};
</script>
<BR>
{$tab_panel_display}
<table width="100%" border="0" cellspacing=0 cellpadding=0 class="edit view" style="border-top: 0px;">
<tr>
<td valign="top" width="100%">
{include file="modules/Reports/templates/_template_reports_tables.tpl"}
<div id="columns_tab" style="display: none">
{$template_grups_choosers1}
<div id="summary_more_div" style="{$summary_display_style}" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$mod_strings.LBL_LABEL}:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='detailsummary_label_editor' id='detailsummary_label_editor' value='' onchange='saveLabel("detailsummary",this )'>
<div scope="row">

<input type="checkbox" class="checkbox" name="show_details" id="show_details" onclick="showDetailsClicked(this);" {if ($show_columns_reports)}CHECKED{/if}>&nbsp;
{$mod_strings.LBL_SHOW_DETAILS}</div>
<br>
</div>
{$template_grups_choosers2}
<div id="columns_more_div"  {if ($column_display eq 'none')} style="display:none;" {/if}>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$mod_strings.LBL_LABEL}:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='column_label_editor' id='column_label_editor' value='' size=25 onchange='saveLabel("column", this)'>
</div>

</div>
{include file="modules/Reports/templates/_template_reports_filters.tpl"}
<div id='group_by_tab' style="display: none" {if ($reporter_report_type eq 'tabular')} style="display:none;" {/if}>
{include file="modules/Reports/templates/_template_reports_group_by.tpl"}
</div>
<div id='chart_options_tab' style="display: none">
{include file="modules/Reports/templates/_template_reports_chart_options.tpl"}
</div>
</td>
</tr>
</table></p>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="padding-bottom: 2px;"">
{if ($report_edit_access)}

<input type=submit class="button" title="{$mod_strings.LBL_RUN_BUTTON_TITLE}"
    value="{$mod_strings.LBL_RUN_REPORT_BUTTON_LABEL}"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value=''">
<input type=submit class="button" title="{$app_strings.LBL_SAVE_BUTTON_TITLE}"
    value="{$app_strings.LBL_SAVE_BUTTON_LABEL}"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';">
<input type=submit class="button" title="{$app_strings.LBL_SAVE_AS_BUTTON_TITLE}"
    value="{$app_strings.LBL_SAVE_AS_BUTTON_LABEL}"
    onclick="this.form.to_pdf.value='';this.form.to_csv.value='';this.form.save_report.value='on';this.form.record.value='';this.form.save_as.value='true'">
{/if}
{if ($report_export_access)}
<input type=submit class="button" title="{$app_strings.LBL_VIEW_PDF_BUTTON_TITLE}"
    value="{$app_strings.LBL_VIEW_PDF_BUTTON_LABEL}"
    onclick="this.form.save_report.value='';this.form.to_csv.value='';this.form.to_pdf.value='on'">
{/if}
</td>
</tr>
</table>
</form>
</p>
<script type="text/javascript" src="cache/modules/modules_def_{$current_language}_{$md5_current_user_id}.js"></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_overlib.js'}"></script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script>

var visible_modules;
var report_def;
var current_module;
var visible_fields = new Array();
var visible_fields_map =  new Object();
var visible_summary_fields = new Array();
var visible_summary_field_map =  new Object();
var current_report_type;
var display_columns_ref = 'display';
var hidden_columns_ref = 'hidden';
var field_defs;
var previous_links_map = new Object();
var previous_links =  new Array();
var display_summary_ref = 'display';
var hidden_summary_ref = 'hidden';
var users_array = new Array();

</script>
<script language="javascript">
var image_path = "{$args_image_path}";
var lbl_and = "{$mod_strings.LBL_AND}";
var lbl_select = "{$mod_strings.LBL_SELECT}";
var lbl_remove = "{$mod_strings.LBL_REMOVE}";
var lbl_missing_fields = "{$mod_strings.LBL_MISSING_FIELDS}";
var lbl_at_least_one_display_column = "{$mod_strings.LBL_AT_LEAST_ONE_DISPLAY_COLUMN}";
var lbl_at_least_one_summary_column = "{$mod_strings.LBL_AT_LEAST_ONE_SUMMARY_COLUMN}";
var lbl_missing_input_value  = "{$mod_strings.LBL_MISSING_INPUT_VALUE}";
var lbl_missing_second_input_value = "{$mod_strings.LBL_MISSING_SECOND_INPUT_VALUE}";
var lbl_nothing_was_selected = "{$mod_strings.LBL_NOTHING_WAS_SELECTED}"
var lbl_none = "{$mod_strings.LBL_NONE}";
var lbl_outer_join_checkbox = "{$mod_strings.LBL_OUTER_JOIN_CHECKBOX}";
var lbl_add_related = "{$mod_strings.LBL_ADD_RELATE}";
var lbl_del_this = "{$mod_strings.LBL_DEL_THIS}";
var lbl_alert_cant_add = "{$mod_strings.LBL_ALERT_CANT_ADD}";
var lbl_related_table_blank = "{$mod_strings.LBL_RELATED_TABLE_BLANK}";
var lbl_optional_help = "{$mod_strings.LBL_OPTIONAL_HELP}";
</script>
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/report_additionals.js'}"></script>
<script language="javascript">
visible_modules = {$allowed_modules_js};
report_def = {$reporter_report_def_str1};
goto_anchor = {$goto_anchor};
{literal}
function report_onload() {
	if (goto_anchor != '') {
		var anch = document.getElementById(goto_anchor);
	  	if ( typeof(anch) != 'undefined' && anch != null) {
	    	anch.focus();
	  	} // if
	} else {
		// no op
	}
} // fn

window.onload = report_onload;
current_module = report_def.module;
field_defs = module_defs[current_module].field_defs;
{/literal}
current_report_type = "{$report_type}";
{literal}
for(var i in report_def.display_columns) {
	visible_fields.push(getFieldKey(report_def.display_columns[i]));
    visible_fields_map[getFieldKey(report_def.display_columns[i])] = report_def.display_columns[i];
} // for

for(var i in report_def.summary_columns) {
	if (typeof(report_def.summary_columns[i].is_group_by) != 'undefined' && report_def.summary_columns[i].is_group_by == 'hidden') {
    continue;
  	} // if
  	visible_summary_fields.push(getFieldKey(report_def.summary_columns[i]));
  	visible_summary_field_map[getFieldKey(report_def.summary_columns[i])] = report_def.summary_columns[i];
} // for


for(var i in report_def.links_def) {
    previous_links_map[ report_def.links_def[i] ] = 1;
	previous_links.push( report_def.links_def[i]);
} // for
{/literal}
{foreach from=$user_array key=user_id item=user_name}
{literal}users_array[users_array.length] = {text:{/literal}'{$user_name}',value:'{$user_id}'};
{/foreach}
</script>
<br/>
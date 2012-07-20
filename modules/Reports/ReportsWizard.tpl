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

{$chartResources}
<div id='progress_div' ></div>
<script>
document.getElementById('progress_div').innerHTML = '{sugar_getimage name="bar_loader" alt=$mod_strings.LBL_LOADING ext=".gif" other_attributes=''}';
</script>


<script type="text/javascript" src="cache/modules/modules_def_{$LANG}_{$USER_ID_MD5}.js"></script>
<link rel="stylesheet" type="text/css" href="{sugar_getjspath file='include/ytree/TreeView/css/folders/tree.css'}" />
<link rel="stylesheet" type="text/css" href="{sugar_getjspath file='modules/Reports/tpls/reports.css'}" />
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/reports.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/FiltersWidget.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_overlib.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='include/SugarFields/Fields/Teamset/Teamset.js'}"></script>
<!--
<style>
.x-tree-node-collapsed .x-tree-node-icon{literal}{{/literal}
	background-image:url({$IMG}blank.gif);{literal}}{/literal}
.x-tree-node-expanded .x-tree-node-icon{literal}{{/literal}
	background-image:url({$IMG}blank.gif);{literal}}{/literal}
</style>
-->
<form name="ReportsWizardForm" id="ReportsWizardForm" method="post" action="index.php">
	<input type="hidden" name="module" value="Reports">
	<input type="hidden" name="current_module" value="">
	<input type="hidden" name="page" value="report">
	<input type="hidden" name="action" value="ReportsWizard">
	<input type="hidden" id="return_module" name="return_module" value="Reports">
	<input type="hidden" id="return_action" name="return_action" value="ReportsWizardType">
	<input type="hidden" name="run_query" value="0">
	<input type="hidden" name="save_and_run_query" value="0">
	<input type="hidden" name="current_step" value="{$current_step}">
	<input type="hidden" name="record" value="{$record}">
	<input type="hidden" name="save_report" value="0">
	<input type="hidden" name="is_delete" value="0">
	<input type="hidden" name="report_def">
	<input type="hidden" name="panels_def">
	<input type="hidden" name="filters_defs">
	<input type="hidden" name='expanded_combo_summary_divs' id='expanded_combo_summary_divs' value=''>
	<input type="hidden" name='report_offset' value ="{$report_offset}">	
	<input type="hidden" name='sort_by' value ="{$sort_by}">
	<input type="hidden" name='sort_dir' value ="{$sort_dir}">
	<input type="hidden" name='summary_sort_by' value ="{$summary_sort_by}">
	<input type="hidden" name='summary_sort_dir' value ="{$summary_sort_dir}">
	
	<div id='wizard_outline_div' width='20%' >
	</div>
	<div id='report_type_div' style='display:none' class="edit view reportwizard">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" >	
			<tr>
				<td colspan=4 >{$MOD.LBL_SELECT_REPORT_TYPE}<br><br>
				</td>
			</tr>		
			<tr valign="top">
				<td width="35%">
					<table  border="0" cellspacing="2" cellpadding="0" >	
						<tr valign='top'>
							<td><img src="{sugar_getimagepath file='RowsAndColumns.gif'}" name="rowsColsImg" onclick="SUGAR.reports.selectReportType('tabular');"
								onMouseOver="document.rowsColsImg.src='{sugar_getimagepath file='RowsAndColumnsOver.gif'}'"
								onMouseOut="document.rowsColsImg.src='{sugar_getimagepath file='RowsAndColumns.gif'}'"
                                alt="{$MOD.LBL_ROWS_AND_COLUMNS_REPORT}"></td>
							<td>&nbsp;&nbsp;</td>
							<td class="buttonText"><h3 class='bold'>{$MOD.LBL_ROWS_AND_COLUMNS_REPORT}</h3><br/>
								{$MOD.LBL_ROWS_AND_COLUMNS_REPORT_DESC}
							</td>
						</tr>
						<tr>
							<td colspan=2>&nbsp;</td>
						</tr>
						<tr valign='top'>
							<td><img src="{sugar_getimagepath file='Summation.gif'}" name="summationImg" onclick="SUGAR.reports.selectReportType('summation');"
								onMouseOver="document.summationImg.src='{sugar_getimagepath file='SummationOver.gif'}'"
								onMouseOut="document.summationImg.src='{sugar_getimagepath file='Summation.gif'}'"
                                     alt="{$MOD.LBL_SUMMATION_REPORT}"></td>
							<td>&nbsp;&nbsp;</td>
							<td class="buttonText"><h3 class='bold'>{$MOD.LBL_SUMMATION_REPORT}</h3>
								{$MOD.LBL_SUMMATION_REPORT_DESC}
							</td>
						</tr>
					</table>
				</td>
				<td width="10%">&nbsp;</td>
				<td width="35%">
					<table  border="0" cellspacing="2" cellpadding="0">	
						<tr valign='top'>
							<td><img src="{sugar_getimagepath file='SummationWithDetails.gif'}" name="summationWithDetailsImg" onclick="SUGAR.reports.selectReportType('summation_with_details');"
								onMouseOver="document.summationWithDetailsImg.src='{sugar_getimagepath file='SummationWithDetailsOver.gif'}'"
								onMouseOut="document.summationWithDetailsImg.src='{sugar_getimagepath file='SummationWithDetails.gif'}'"
                                alt="{$MOD.LBL_SUMMATION_REPORT_WITH_DETAILS}"></td>
							<td>&nbsp;&nbsp;</td>
							<td class="buttonText"><h3 class='bold'>{$MOD.LBL_SUMMATION_REPORT_WITH_DETAILS}</h3>
								{$MOD.LBL_SUMMATION_REPORT_WITH_DETAILS_DESC}
							</td>
						</tr>
						<tr>
							<td colspan=2>&nbsp;</td>
						</tr>

						<tr valign='top'>
							<td><img src="{sugar_getimagepath file='MatrixReport.gif'}" name="matrixImg" onclick="SUGAR.reports.selectReportType('summation', true);"
								onMouseOver="document.matrixImg.src='{sugar_getimagepath file='MatrixReportOver.gif'}'"
								onMouseOut="document.matrixImg.src='{sugar_getimagepath file='MatrixReport.gif'}'"
                                alt="{$MOD.LBL_MATRIX_REPORT}"></td>
							<td>&nbsp;&nbsp;</td>
							<td class="buttonText"><h3 class='bold'>{$MOD.LBL_MATRIX_REPORT}</h3>
								{$MOD.LBL_MATRIX_REPORT_DESC}
							</td>
						</tr>
					</table>
				</td>				
				<td width="20%">&nbsp;</td>
			</tr>
		</table>
		
		<br/>
	</div>
	
	
	<div id='module_select_div' style="display:none" class="edit view reportwizard">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" >	
			<tr>
				<td  colspan="6">{$MOD.LBL_SELECT_MODULE_BUTTON}<br><br>
				</td>
			</tr>
			<tr>
				<td>
					<table width="90%" id='buttons_table'>
							{counter start=0 name="buttonCounter" print=false assign="buttonCounter"}
							{foreach from=$BUTTONS item="button"}
								{if $buttonCounter > 5}
									</tr><tr>
									{counter start=0 name="buttonCounter" print=false assign="buttonCounter"}
								{/if}
								<td width="16%" style="padding: 5px;"  valign="top" id='buttons_td'>
								     <table class='wizardButton' onclick='SUGAR.reports.moduleButtonClick("{$button.key}", this);' onmousedown="" onmouseout="" width="60%" border='1' id='{$button.name}'>
								         <tr>
											<td align="left" width='50%'>
                                                {capture assign="name"}{$button.img}{/capture}
                                                {capture assign="alt"}{$button.name}{/capture}
                                                <div><a class='studiolink' href="javascript:void(0)">{sugar_getimage name="$name" attr='border="0"' alt="$alt"}</a></div>
											</td>
											<td align="left" width='50%' valign="middle"><a class='studiolink' href="javascript:void(0)" onclick="">{$button.name}</a></td>
										 </tr>
									 </table>
								</td>
								{counter name="buttonCounter"}
							{/foreach}
					</table>
				</td>
			</tr>
		</table>
	
		<br/>
	</div>	
	<div id='filters_div' style="display:none">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
			<tr>
				<td align='left'><input type='button' title="{$MOD.LBL_PREVIOUS}" class="button" name="{$MOD.LBL_PREVIOUS}" value="{$MOD.LBL_PREVIOUS}" 
					onClick='SUGAR.reports.showWizardStep(1);' id="previousBtn">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_NEXT}" class="button" name="{$MOD.LBL_NEXT}" value="{$MOD.LBL_NEXT}"
					onClick='SUGAR.reports.showWizardStep(0);' id="nextBtn">{if $RUN_QUERY == 1 || $id || $record}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_SAVE_BUTTON_LABEL}" class="button" name="{$APP.LBL_SAVE_BUTTON_LABEL}" value="{$APP.LBL_SAVE_BUTTON_LABEL}"
					onClick='SUGAR.reports.saveReport();' id="saveBtn">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_PREVIEW_REPORT}" class="button" name="{$MOD.LBL_PREVIEW_REPORT}" value="{$MOD.LBL_PREVIEW_REPORT}"
					onClick='SUGAR.reports.previewReport();' id="previewBtn">{/if}{if $record}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_SAVE_RUN}" class="button" name="{$MOD.LBL_SAVE_RUN}" value="{$MOD.LBL_SAVE_RUN}"
					onClick='SUGAR.reports.runReport();' id="saveAndRunBtn">{/if}{if $record && ($IS_ADMIN == 1|| $IS_OWNER == 1)}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" name="{$APP.LBL_DELETE_BUTTON_LABEL}" value="{$APP.LBL_DELETE_BUTTON_LABEL}"
					onClick='SUGAR.reports.deleteReport();' id="deleteBtn">{/if}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_CANCEL}" class="button" name="{$MOD.LBL_CANCEL}" value="{$MOD.LBL_CANCEL}"
					onClick='document.location.href = "index.php?module=Reports&action=index&query=true&clear_query=true"' id="cancelBtn"></td>
			</tr>
		</table>	
		</br>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" >	
			<tr>
				<td  width="15%" valign='top'>
					<div id="leftlayout" style="z-index:100;height:610px; width:202px;">
						<div id="module_tree_panel" style="height:260px; width:200px;">
						</div>
						<div id="autocomplete" style="width:200px;">
							<div class="autocompletewrapper">
							<input id="dt_input" size="23" style="width: 135px !important;" type="text"/>
							<input type="button" style="width: 45px;" id="clearButton" class="button" value="{$MOD.LBL_CLEAR}" name="{$MOD.LBL_CLEAR}" title="{$MOD.LBL_CLEAR}" />				    			
							<div id="dt_ac_container"></div> 
			    			</div>
						</div> 
						<div id="module_fields_panel" style="width:200px; float: left;">
						</div>
					</div>
				</td>
				<!--<td  width="10px" valign='top'>&nbsp;</td>-->
				<td id='filters_td' style="padding-bottom: 2px;" valign="top">
					<div id='filter_designer_div'></div>
					<div id='group_by_div' style="display:none">
						<div id='group_by_panel'>
						</div>
					</div>						
					<div id='display_summaries_div' style="display:none">
						<div id='display_summaries_panel'>
						</div>
					</div>						
					<div id='display_cols_div' style="display:none">
						<div id='display_cols_panel'>
						</div>
					</div>					
				</td>


			</tr>
		</table>
		<br/>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tr>
				<td align='left'><input type='button' title="{$MOD.LBL_PREVIOUS}" class="button" name="{$MOD.LBL_PREVIOUS}" value="{$MOD.LBL_PREVIOUS}" 
					onClick='SUGAR.reports.showWizardStep(1);' id="previousButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_NEXT}" class="button" name="{$MOD.LBL_NEXT}" value="{$MOD.LBL_NEXT}"
					onClick='SUGAR.reports.showWizardStep(0);' id="nextButton">{if $RUN_QUERY == 1 || $id || $record}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_SAVE_BUTTON_LABEL}" class="button" name="{$APP.LBL_SAVE_BUTTON_LABEL}" value="{$APP.LBL_SAVE_BUTTON_LABEL}"
					onClick='SUGAR.reports.saveReport();' id="saveButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_PREVIEW_REPORT}" class="button" name="{$MOD.LBL_PREVIEW_REPORT}" value="{$MOD.LBL_PREVIEW_REPORT}"
					onClick='SUGAR.reports.previewReport();' id="previewButton">{/if}{if $record}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_SAVE_RUN}" class="button" name="{$MOD.LBL_SAVE_RUN}" value="{$MOD.LBL_SAVE_RUN}"
					onClick='SUGAR.reports.runReport();' id="saveAndRunButton">{/if}{if $record && ($IS_ADMIN == 1|| $IS_OWNER == 1)}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" name="{$APP.LBL_DELETE_BUTTON_LABEL}" value="{$APP.LBL_DELETE_BUTTON_LABEL}"
					onClick='SUGAR.reports.deleteReport();' id="deleteButton">{/if}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_CANCEL}" class="button" name="{$MOD.LBL_CANCEL}" value="{$MOD.LBL_CANCEL}"
					onClick='document.location.href = "index.php?module=Reports&action=index&query=true&clear_query=true"' id="cancelButton"></td>
			</tr>
		</table>	
	</div>
	<div id='chart_options_div' style="display:none">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tr>
				<td align='left'><input type='button' title="{$MOD.LBL_PREVIOUS}" class="button" name="{$MOD.LBL_PREVIOUS}" value="{$MOD.LBL_PREVIOUS}" 
					onClick='SUGAR.reports.showWizardStep(1);' id="previousButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_NEXT}" class="button" name="{$MOD.LBL_NEXT}" value="{$MOD.LBL_NEXT}"
					onClick='SUGAR.reports.showWizardStep(0);' id="nextButton">{if $RUN_QUERY == 1 || $id || $record}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_SAVE_BUTTON_LABEL}" class="button" name="{$APP.LBL_SAVE_BUTTON_LABEL}" value="{$APP.LBL_SAVE_BUTTON_LABEL}"
					onClick='SUGAR.reports.saveReport();' id="saveButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_PREVIEW_REPORT}" class="button" name="{$MOD.LBL_PREVIEW_REPORT}" value="{$MOD.LBL_PREVIEW_REPORT}"
					onClick='SUGAR.reports.previewReport();' id="previewButton">{/if}{if $record}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_SAVE_RUN}" class="button" name="{$MOD.LBL_SAVE_RUN}" value="{$MOD.LBL_SAVE_RUN}"
					onClick='SUGAR.reports.runReport();' id="saveAndRunButton">{/if}{if $record && ($IS_ADMIN == 1|| $IS_OWNER == 1)}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" name="{$APP.LBL_DELETE_BUTTON_LABEL}" value="{$APP.LBL_DELETE_BUTTON_LABEL}"
					onClick='SUGAR.reports.deleteReport();' id="deleteButton">{/if}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_CANCEL}" class="button" name="{$MOD.LBL_CANCEL}" value="{$MOD.LBL_CANCEL}"
					onClick='document.location.href = "index.php?module=Reports&action=index&query=true&clear_query=true"' id="cancelButton"></td>
			</tr>
		</table>	
		</br>
        <div class="edit view">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" >	
			<tr>
				<td id="no_chart_text" colspan=2>{$MOD.LBL_GROUP_BY_REQUIRED}<br/></td>
			</tr>
			<tr>
				<td scope="row" width='20%'>{$MOD.LBL_CHART_TYPE}:</td>
				<td align=left>
					<select name='chart_type' id='chart_type'>
					{foreach from=$chart_types key=thekey item=theval}
						<option value="{$thekey}">{$theval}</option>
					{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td scope="row">{$MOD.LBL_USE_COLUMN_FOR}:{$chart_data_help}</td>
				<td align=left>
					<select name='numerical_chart_column'>
					</select>
					<input type='hidden' name='numerical_chart_column_type'>
				</td>
			</tr>
			<tr>
				<td scope="row">{$MOD.LBL_CHART_DESCRIPTION}:</td>
				<td align=left>
					<input name='chart_description' id="chart_description" size='50' value="{$chart_description}" maxsize="255"/>
				</td>
			</tr>
			<tr>
				<td scope="row">{$MOD.LBL_DO_ROUND}:{$do_round_help}</td>
				<td align=left>
					<input type="checkbox" class="checkbox" name="do_round" id="do_round" {if ($do_round)}CHECKED{/if}>
				</td>
			</tr>			
		</table>
        </div>
		<br/>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tr>
				<td align='left'><input type='button' title="{$MOD.LBL_PREVIOUS}" class="button" name="{$MOD.LBL_PREVIOUS}" value="{$MOD.LBL_PREVIOUS}" 
					onClick='SUGAR.reports.showWizardStep(1);' id="previousButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_NEXT}" class="button" name="{$MOD.LBL_NEXT}" value="{$MOD.LBL_NEXT}"
					onClick='SUGAR.reports.showWizardStep(0);' id="nextButton">{if $RUN_QUERY == 1 || $id || $record}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_SAVE_BUTTON_LABEL}" class="button" name="{$APP.LBL_SAVE_BUTTON_LABEL}" value="{$APP.LBL_SAVE_BUTTON_LABEL}"
					onClick='SUGAR.reports.saveReport();' id="saveButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_PREVIEW_REPORT}" class="button" name="{$MOD.LBL_PREVIEW_REPORT}" value="{$MOD.LBL_PREVIEW_REPORT}"
					onClick='SUGAR.reports.previewReport();' id="previewButton">{/if}{if $record}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_SAVE_RUN}" class="button" name="{$MOD.LBL_SAVE_RUN}" value="{$MOD.LBL_SAVE_RUN}"
					onClick='SUGAR.reports.runReport();' id="saveAndRunButton">{/if}{if $record && ($IS_ADMIN == 1|| $IS_OWNER == 1)}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" name="{$APP.LBL_DELETE_BUTTON_LABEL}" value="{$APP.LBL_DELETE_BUTTON_LABEL}"
					onClick='SUGAR.reports.deleteReport();' id="deleteButton">{/if}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_CANCEL}" class="button" name="{$MOD.LBL_CANCEL}" value="{$MOD.LBL_CANCEL}"
					onClick='document.location.href = "index.php?module=Reports&action=index&query=true&clear_query=true"' id="cancelButton"></td>
			</tr>
		</table>	
	</div>	
	<div id='report_details_div' style="display:none">
		<table  width='100%' border="0" cellspacing="0" cellpadding="0" >
			<tr>
				<td align='left'><input type='button' title="{$MOD.LBL_PREVIOUS}" class="button" name="{$MOD.LBL_PREVIOUS}" value="{$MOD.LBL_PREVIOUS}" 
					onClick='SUGAR.reports.showWizardStep(1);' id="previousButton">&nbsp;&nbsp;<input type='button' title="{$APP.LBL_SAVE_BUTTON_LABEL}" class="button" name="{$APP.LBL_SAVE_BUTTON_LABEL}" value="{$APP.LBL_SAVE_BUTTON_LABEL}"
					onClick='SUGAR.reports.saveReport();' id="saveButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_PREVIEW_REPORT}" class="button" name="{$MOD.LBL_PREVIEW_REPORT}" value="{$MOD.LBL_PREVIEW_REPORT}"
					onClick='SUGAR.reports.previewReport();' id="previewButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_SAVE_RUN}" class="button" name="{$MOD.LBL_SAVE_RUN}" value="{$MOD.LBL_SAVE_RUN}"
					onClick='SUGAR.reports.runReport();' id="saveAndRunButton">{if $record && ($IS_ADMIN == 1|| $IS_OWNER == 1)}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" name="{$APP.LBL_DELETE_BUTTON_LABEL}" value="{$APP.LBL_DELETE_BUTTON_LABEL}"
					onClick='SUGAR.reports.deleteReport();' id="deleteButton">{/if}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_CANCEL}" class="button" name="{$MOD.LBL_CANCEL}" value="{$MOD.LBL_CANCEL}"
					onClick='document.location.href = "index.php?module=Reports&action=index&query=true&clear_query=true"' id="cancelButton"></td>
							
			</tr>
		</table>
		<br/>	
		<div class="edit view">
		<table id="report_details_table" border="0"  width="100%" cellspacing="0" cellpadding="0" >
			<tr>
				<td width="20%" scope='row'><label for='save_report_as'>{$MOD.LBL_REPORT_NAME}:</label> <span class='required'>*</span></td>
				<td><input type='text' size='45' name='save_report_as' id='save_report_as' value='{$save_report_as}'></td>
			</tr>
			{if $IS_ADMIN}
			<tr>
				<td scope='row'><label for='show_query'>{$MOD.LBL_SHOW_QUERY}:</label></td>
				<td><input type="checkbox" class="checkbox" name="show_query" id='show_query'  {if ($show_query)}CHECKED{/if}></td>
			</tr>			
			{/if}
			<tr>
				<td scope='row'><label for='assigned_user_name'>{$MOD.LBL_OWNER}:</label> <span class='required'>*</span></td>
				<td>{$USER_HTML}</td>
			</tr>	
			<tr>
				<td scope='row'>{$MOD.LBL_TEAM}: <span class='required'>*</span></td>
				<td>{$TEAM_HTML}</td>
			</tr>
			<tr id='outerjoin_row' style="display:none">
				<td scope='row'>{$MOD.LBL_OUTER_JOIN_CHECKBOX}: {$help_image}
				</td>
				<td><div id='outerjoin_div'></div></td>
			</tr>
			<tr id='matrixLayoutRow' style="display:none">
				<td scope='row'><label for='layout_options'>{$MOD.LBL_MATRIX_LAYOUT}</label></td>
				<td><select name='layout_options' id='layout_options'>
					<option value='1x2'>{$MOD.LBL_1X2}</option>
					<option value='2x1'>{$MOD.LBL_2X1}</option>
					</select></td>
			</tr>

		</table>
		</div>
		<br/>
		<table  width='100%' border="0" cellspacing="0" cellpadding="0" >
			<tr>
				<td align='left'><input type='button' title="{$MOD.LBL_PREVIOUS}" class="button" name="{$MOD.LBL_PREVIOUS}" value="{$MOD.LBL_PREVIOUS}" 
					onClick='SUGAR.reports.showWizardStep(1);' id="previousButton">&nbsp;&nbsp;<input type='button' title="{$APP.LBL_SAVE_BUTTON_LABEL}" class="button" name="{$APP.LBL_SAVE_BUTTON_LABEL}" value="{$APP.LBL_SAVE_BUTTON_LABEL}"
					onClick='SUGAR.reports.saveReport();' id="saveButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_PREVIEW_REPORT}" class="button" name="{$MOD.LBL_PREVIEW_REPORT}" value="{$MOD.LBL_PREVIEW_REPORT}"
					onClick='SUGAR.reports.previewReport();' id="previewButton">&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_SAVE_RUN}" class="button" name="{$MOD.LBL_SAVE_RUN}" value="{$MOD.LBL_SAVE_RUN}"
					onClick='SUGAR.reports.runReport();' id="saveAndRunButton">{if $record && ($IS_ADMIN == 1|| $IS_OWNER == 1)}&nbsp;&nbsp;<input type='button' title="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" name="{$APP.LBL_DELETE_BUTTON_LABEL}" value="{$APP.LBL_DELETE_BUTTON_LABEL}"
					onClick='SUGAR.reports.deleteReport();' id="deleteButton">{/if}&nbsp;&nbsp;<input type='button' title="{$MOD.LBL_CANCEL}" class="button" name="{$MOD.LBL_CANCEL}" value="{$MOD.LBL_CANCEL}"
					onClick='document.location.href = "index.php?module=Reports&action=index&query=true&clear_query=true"' id="cancelButton"></td>
							
			</tr>
		</table>	
	</div>

</form>
{$quicksearch_js}
<script type="text/javascript">

//Disable the Enter Key
{literal}
function stopEnterKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text")) {
       SUGAR.reports.checkEnterKey();
  }
}
{/literal}

var users_array = new Array();
users_array[0]={literal}{text{/literal}:'{$MOD.LBL_CURRENT_USER}',value:'Current User'{literal}}{/literal};
{foreach from=$users_array key=user_id item=user_name}
	users_array[users_array.length] = {literal}{text{/literal}:'{$user_name}',value:'{$user_id}'{literal}}{/literal};
{/foreach}

{literal}
function loadChartForReports() {

	var idObject = document.getElementById('record');
	var id = '';
	if (idObject != null) {
		id = idObject.value;
	} // if
	var chartId = document.getElementById(id + '_div');
	var showHideChartButton = document.getElementById('showHideChartButton');
	if (chartId == null) {
		if (showHideChartButton != null) {
			showHideChartButton.style.display = 'none';	
		}
	} // if
}

function displayGroupCount() {
	
}
{/literal}

function onLoadDoInit() {ldelim}
	{if $report_def_str}
		SUGAR.reports.init("{$IMG}", {$report_def_str}, users_array, "{$ORIG_IMG}");
	{else}
		SUGAR.reports.init("{$IMG}", '', users_array,"{$ORIG_IMG}");
	{/if}
	loadChartForReports();
	displayGroupCount();
{rdelim}

{literal}
var reportLoader = new YAHOO.util.YUILoader({
	require : ["layout", "element"],
	loadOptional: true,
	skin: { base: 'blank', defaultSkin: '' },
	onSuccess : onLoadDoInit,
	base : "include/javascript/yui/build/"
});
reportLoader.addModule({ 
    name: "sugarwidgets",
    type: "js", 
    fullpath: "include/javascript/sugarwidgets/SugarYUIWidgets.js", 
    varName: "YAHOO.SUGAR",
    requires: ["datatable", "dragdrop", "treeview", "tabview", "button", "autocomplete", "container"]
});
reportLoader.insert();
{/literal}

enableQS(true);
document.getElementById('progress_div').style.display="none";
function saveReportOptionsState(name, value) {ldelim}
	
{rdelim}
</script>
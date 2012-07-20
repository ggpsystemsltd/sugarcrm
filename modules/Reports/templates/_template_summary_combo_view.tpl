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

{php}
	global $mod_strings;
{/php}

<br/>

<input type="hidden" name="expandAllState" id="expandAllState" value="{$expandAll}">
<input class="button" name="expandCollapse" id="expandCollapse" title="{$mod_strings.LBL_REPORT_COLLAPSE_ALL}"
    type="button"
    value="{$mod_strings.LBL_REPORT_COLLAPSE_ALL}" 
    onclick="expandCollapseAll('false');">
<br/><br/>
{php}
require_once('modules/Reports/templates/templates_reports.php');
$reporter = $this->get_template_vars('reporter');
$args = $this->get_template_vars('args');
$header_row = $this->get_template_vars('header_row');
$columns_row = $this->get_template_vars('columns_row');
$countKeyIndex = $this->get_template_vars('countKeyIndex');
$count = 0;
$totalGroupByCount = 0;
$topLevelGroupByCount = 0;
$previousRow = array();
$counterArray = array();
$indexOfGroupByStart = 0;
$rowIdToCountArray = array();
$forLoopIndexForGroupBy;
$topLevelGroupColumnNameId = "";
$got_row = 0;                                                                                   
$divCounter = 0;
while (( $row = $reporter->get_summary_next_row()) != 0 ) {
	$got_row = 1;                                                                                   
	$startTable = true;
	$indexOfGroupByStart = whereToStartGroupByRow($reporter, $count, $header_row, $previousRow, $row);
	if ($indexOfGroupByStart != 0) {
		$startTable = false;
	} // if
	$previousRow = $row;
	template_header_row($header_row, $args, true);
{/php}
{php}
if ($count != 0 && $startTable) {
{/php}
			</table>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportGroupBySpaceTableView">
				<tr height=1>
					<td width="3%">&nbsp;

					</td>
				</tr>
			</table>
{php}
} // if
{/php}
{php}
if ($startTable) {
	$spanId = "img_combo_summary_div_" . $divCounter;
	$divId = "combo_summary_div_" . $divCounter;
	$counterArray = getCounterArrayForGroupBy($reporter, $topLevelGroupByCount);
	$rowId = generateIdForGroupByIndex($counterArray, 0);
	$rowIdToCountArray[$rowId] = 0;
	$groupByColumnName = getGroupByColumnName($reporter, $indexOfGroupByStart, $header_row, $row);
	$indexOfGroupByStart++;
	$topLevelGroupClass = "reportGroupNByTable";
	if (count($reporter->report_def['group_defs']) > 1) {
		$topLevelGroupClass = "reportGroup1ByTable";
	} // if
	$this->assign('topLevelGroupClass', $topLevelGroupClass);
	$this->assign('groupByColumnName', $groupByColumnName);
	$this->assign('rowId', $rowId);
	$this->assign('spanId', $spanId);
	$this->assign('divId', $divId);
	$topLevelGroupByCount++;
{/php}
<table id="{$divId}" width="100%" border="0" cellpadding="0" cellspacing="0" class="reportGroupViewTable">
	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="{$topLevelGroupClass}">
				<tr height="20" >				
				  <th align='left' id = "{$rowId}" name= "{$rowId}" class="reportGroup1ByTableEvenListRowS1" valign=middle nowrap><span id="{$spanId}"><a href="javascript:expandCollapseComboSummaryDivTable('{$divId}')"><img width="8" height="8" border="0" absmiddle="" alt="{$mod_strings.LBL_ALT_SHOW}" src="{sugar_getimagepath file='basic_search.gif'}"/></a></span>&nbsp;{$groupByColumnName}
				  </th>
				</tr>
			</table>
		</td>
	</tr>
{php}
$totalGroupByCount++;
$divCounter++;
} // if
{/php}
{if ($show_pagination neq "")}
{$pagination_data}
{/if}

{php}
for ($forLoopIndexForGroupBy = $indexOfGroupByStart ; $forLoopIndexForGroupBy < count($reporter->report_def['group_defs']) ; $forLoopIndexForGroupBy++) {
	$groupByColumnName = getGroupByColumnName($reporter, $indexOfGroupByStart, $header_row, $row);
	$spaces = "&nbsp;&nbsp;&nbsp;";
	$reportGroupByClass = "reportGroupNByTable";
	for ($spacesCount = 0 ; $spacesCount < $indexOfGroupByStart ; $spacesCount++) {
		$spaces = $spaces . $spaces;
	} // for
	$rowId = generateIdForGroupByIndex($counterArray, $forLoopIndexForGroupBy);
	if (array_key_exists($rowId, $rowIdToCountArray)) {
		$counterArray[$forLoopIndexForGroupBy] = $counterArray[$forLoopIndexForGroupBy] + 1;	
		$rowId = generateIdForGroupByIndex($counterArray, $forLoopIndexForGroupBy);
	} 
	$rowIdToCountArray[$rowId] = 0;
	$newRowId = $rowId;
	if ($forLoopIndexForGroupBy < (count($reporter->report_def['group_defs']) -1)) {
		$reportGroupByClass = "reportGroup1ByTable";
	} // if
	if ($forLoopIndexForGroupBy == (count($reporter->report_def['group_defs']) -1)) {
		if ($countKeyIndex != -1) {
			$newRowId = "";
		} // if
	} // if
	$this->assign('reportGroupByClass', $reportGroupByClass);
	$this->assign('spaces', $spaces);
	$indexOfGroupByStart++;
	$this->assign('groupByColumnName', $groupByColumnName);
	$this->assign('rowId', $newRowId);	
{/php}
	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="{$reportGroupByClass}">
				<tr height="20" class="reportGroupNByTableEvenListRowS1">
				  <td align='left' id = "{$rowId}" name= "{$rowId}" width="30%" nowrap class="reportGroupNByTableEvenListRowS1">{$spaces}{$groupByColumnName}</td>
				</tr>
			</table>
		</td>
	</tr>
{php}
} // for
{/php}

{php}
	//$divId = "combo_summary_div_". $count;
	//template_list_row($row, false, true, $divId);

{/php}

{php}
	//echo template_end_table($args);
	//echo "<div id='". $divId ."' style='padding-left: 30px;display:none'>";
	template_header_row($columns_row, $args);
{/php}

	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportGroupByDataTableHeader">
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="1" class="reportDataChildtablelistView">
						{if ($show_pagination neq "")}
						{$pagination_data}
						{/if}
							<tr height="20">
{if ($isSummaryCombo)}
								<th scope="col" align='center' class="reportGroupByDataChildTablelistViewThS1" valign=middle nowrap>&nbsp;</th>
{/if}

{php}
	$count1 = 0;
	$this->assign('count1', $count1);
{/php}
{foreach from=$header_row key=module item=cell}
	{if (($args.group_column_is_invisible != "") && ($args.group_pos eq $count1))}
{php}	
	$count1 = $count1 + 1;
	$this->assign('count1', $count1);
{/php}
	{ else }
	{if $cell eq ""}
{php}	
	$cell = "&nbsp;";
	$this->assign('cell', $cell);
{/php}
	{/if}	
								<th scope="col" align='center' class="reportGroupByDataChildTablelistViewThS1" valign=middle nowrap>	
	
	{$cell}
								</th>
	{/if}
{/foreach}
							</tr>
{php}
		//_pp($reporter->current_summary_row_count);
  		if ($reporter->current_summary_row_count > 0) {
  			for($i=0; $i < $reporter->current_summary_row_count; $i++ ) {
				if (($column_row = $reporter->get_next_row() ) != 0 ) {
					template_list_row($column_row, true);
					incrementCountForRowId($rowIdToCountArray, $rowId);
{/php}
<tr height=20 class="{$row_class}">
{if ($isSummaryComboHeader)}

{/if}
{php}
	$count1 = 0;
	$this->assign('count1', $count1);
{/php}
{foreach from=$column_row.cells key=module item=cell}
	{if (($column_row.group_column_is_invisible != "") && ($count1|in_array:$column_row.group_pos)) }
{php}	
	$count1 = $count1 + 1;
	$this->assign('count1', $count1);
{/php}
	{ else }
	{if $cell eq ""}
{php}	
	$cell = "&nbsp;";
	$this->assign('cell', $cell);
{/php}
	{/if}	
									<td width="{$width}%" valign=TOP class="{$row_class[$module]}" bgcolor="{$bg_color}" scope="row">
	
	{$cell}
									</td>
	{/if}
{/foreach}
								</tr>
				
{php}
			   } else {
			     break;
			   } // else
  			} // for
{/php}							
  								</table>

								</td>
							</tr>
						</table>
					</td>
				</tr>

{php}

  		} else {
			echo template_no_results();
  		}
		//echo template_end_table($args);
		//echo "</div>";
		$count++;
} // while
if (!$got_row) {
	echo template_summary_combo_view_no_results($args);
	echo template_end_table($args);
} // if	
$this->assign('divCounter', $divCounter);
global $global_json;
if (count($reporter->report_def['group_defs']) > 1) {
	$this->assign('totalGroupCountArrayString', $global_json->encode($rowIdToCountArray));
}
{/php}
<script language="javascript">
var totalGroupCountArrayString = '{$totalGroupCountArrayString}';
var totalDivCounter = {$divCounter};
var groupCountObject = new Object();
{literal}
if (totalGroupCountArrayString != '') {
	groupCountObject = YAHOO.lang.JSON.parse(totalGroupCountArrayString);
} // if

function displayGroupCount() {
	for (i in groupCountObject) {
		elem = document.getElementById(i);
		if (elem != null) {
			elem.innerHTML = trim(elem.innerHTML) + ', ' + SUGAR.language.get('app_strings','LBL_REPORT_NEWREPORT_COLUMNS_TAB_COUNT') +' = ' + groupCountObject[i];
		}
	} // for
} // fn

function showHideTableRows(divId, toShow) {
	var tableElm = document.getElementById(divId);
	for (i = 1 ; i < tableElm.rows.length ; i++) {
		if (toShow) {
			tableElm.rows[i].style.display = "";
		} else {
			tableElm.rows[i].style.display = "none";
		} // else
	} // for
}

function expandCollapseAll(expandAll, makeAjaxCall) {
	expandCollapseButton = document.getElementById('expandCollapse');
	if (expandAll == 'false') {
		if (makeAjaxCall == null) {
			saveReportOptionsState("expandAll", "0");
		}
		expandCollapseButton.title = {/literal}"{$mod_strings.LBL_REPORT_EXPAND_ALL}";
		{literal}expandCollapseButton.value = {/literal}"{$mod_strings.LBL_REPORT_EXPAND_ALL}";
		{literal}expandCollapseButton.onclick = function() {expandCollapseAll('true')};
	} else {
		if (makeAjaxCall == null) {
			saveReportOptionsState("expandAll", "1");
		} // if
		expandCollapseButton.title = {/literal}"{$mod_strings.LBL_REPORT_COLLAPSE_ALL}";
		{literal}expandCollapseButton.value = {/literal}"{$mod_strings.LBL_REPORT_COLLAPSE_ALL}";
		{literal}expandCollapseButton.onclick = function() {expandCollapseAll('false')};
	} // else
	for (var i = 0 ; i < totalDivCounter ; i++) {
		expandCollapseComboSummaryDivTable(("combo_summary_div_" + i), expandAll);
	} // for
} // fn


function doExpandCollapseAll() {
	var expandAllState = document.getElementById('expandAllState');
	if (expandAllState != null && (expandAllState.value == "0")) {
		expandCollapseAll('false', false);
	} // if
} // fn

function expandCollapseComboSummaryDiv(divId) {

}

function expandCollapseComboSummaryDivTable(divId, expandAll) {
	if (document.getElementById(divId)) {
		var searchReturn = document.getElementById("img_" + divId).innerHTML.search(/advanced_search/);
		if (expandAll != null) {
			if (expandAll == 'true') {
				searchReturn = 1;
			} else {
				searchReturn = -1;
			} // else
		} // if
		if (searchReturn != -1) {
			showHideTableRows(divId, true);
			//document.getElementById(divId).style.display = "";
			document.getElementById("img_" + divId).innerHTML = 
			document.getElementById("img_" + divId).innerHTML.replace(/advanced_search/,"basic_search");
			document.getElementById('expanded_combo_summary_divs').value += divId + " ";
		} else {
			//document.getElementById(divId).style.display = "none";
			showHideTableRows(divId, false);
			document.getElementById("img_" + divId).innerHTML = 			
			document.getElementById("img_" + divId).innerHTML.replace(/basic_search/,"advanced_search");
			document.getElementById('expanded_combo_summary_divs').value = 
			document.getElementById('expanded_combo_summary_divs').value.replace(divId,"");

		} // else
	}
}

{/literal}
</script>
{php}
if ( ! isset($header_row[0]['norows'])) {
	echo get_form_header( $mod_strings['LBL_GRAND_TOTAL'],"", false); 
} // if
if ( $reporter->has_summary_columns()) {
	// start template_total_table code
	global $mod_strings;
	$total_header_row = $reporter->get_total_header_row(); 
	$total_row = $reporter->get_summary_total_row();
	if ( isset($total_row['group_pos'])) {
		$args['group_pos'] = $total_row['group_pos'];
	} // if
	if ( isset($total_row['group_column_is_invisible'])) {
		$args['group_column_is_invisible'] = $total_row['group_column_is_invisible'];
	} // if
 	$reporter->layout_manager->setAttribute('no_sort',1);
  	echo get_form_header( $mod_strings['LBL_GRAND_TOTAL'],"", false); 
  	template_header_row($total_header_row,$args);
{/php}
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="list view">
	{if ($show_pagination neq "")}
	{$pagination_data}
	{/if}
	<tr height="20">
	{if ($isSummaryCombo)}
	<th scope="col" align='left'  valign=middle nowrap>&nbsp;</th>
	{/if}
	{if ($isSummaryComboHeader)}
	<th><span id="img_{$divId}"><a href="javascript:expandCollapseComboSummaryDiv('{$divId}')"><img width="8" height="8" border="0" absmiddle="" alt="{$mod_strings.LBL_ALT_SHOW}" src="{$image_path}advanced_search.gif"/></a></span></th>
	{/if}
	{php}
		$count = 0;
		$this->assign('count', $count);
	{/php}
	{foreach from=$header_row key=module item=cell}
		{if (($args.group_column_is_invisible != "") && ($args.group_pos eq $count))}
	{php}	
		$count = $count + 1;
		$this->assign('count', $count);
	{/php}
		{ else }
		{if $cell eq ""}
	{php}	
		$cell = "&nbsp;";
		$this->assign('cell', $cell);
	{/php}
		{/if}		
		<td scope="col" align='left'  valign=middle nowrap>	
		
		{$cell}
		{/if}
	{/foreach}
	</tr>
{php}
  	if (! empty($total_row)) {
    	template_list_row($total_row);
{/php}
		<tr height=20 class="{$row_class}" onmouseover="setPointer(this, '{$rownum}', 'over', '{$bg_color}', '{$hilite_bg}', '{$click_bg}');" onmouseout="setPointer(this, '{$rownum}', 'out', '{$bg_color}', '{$hilite_bg}', '{$click_bg}');" onmousedown="setPointer(this, '{$rownum}', 'click', '{$bg_color}', '{$hilite_bg}', '{$click_bg}');">
		{if ($isSummaryComboHeader)}
		<td><span id="img_{$divId}"><a href="javascript:expandCollapseComboSummaryDiv('{$divId}')"><img width="8" height="8" border="0" absmiddle="" alt="{$mod_strings.LBL_ALT_SHOW}" src="{$image_path}advanced_search.gif"/></a></span></td>
		{/if}
		{php}
			$count = 0;
			$this->assign('count', $count);
		{/php}
		{foreach from=$column_row.cells key=module item=cell}
			{if (($column_row.group_column_is_invisible != "") && ($count|in_array:$column_row.group_pos)) }
		{php}	
			$count = $count + 1;
			$this->assign('count', $count);
		{/php}
			{ else }
			{if $cell eq ""}
		{php}	
			$cell = "&nbsp;";
			$this->assign('cell', $cell);
		{/php}
			{/if}
			
			<td width="{$width}%" align="left" valign=TOP class="{$row_class}" bgcolor="{$bg_color}" scope="row">
			
			{$cell}
			{/if}
		{/foreach}
		</tr>
		
{php}
  	} else {
		echo template_no_results();
  	}
	echo template_end_table($args);
  	// end template_total_table code
  //template_total_table($reporter);
} // if
template_query_table($reporter); 
{/php}
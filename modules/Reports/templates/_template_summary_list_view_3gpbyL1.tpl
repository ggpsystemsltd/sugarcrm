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
	require_once('modules/Reports/templates/templates_reports.php');
	$reporter = $this->get_template_vars('reporter');
	$args = $this->get_template_vars('args');
	$header_row = $this->get_template_vars('header_row');
	$got_row = 0;
	$maximumCellSize = 0;
	$rowsAndColumnsData = array();
	$legend = array();
	$columnDataFor2ndGroup = array();
	$columnDataFor3rdGroup = array();
	$grandTotal = array();
	getColumnDataAndFillRowsFor3By3GPBY($reporter, $header_row, $rowsAndColumnsData, $columnDataFor2ndGroup, $columnDataFor3rdGroup, $maximumCellSize, $legend, $grandTotal);
	$headerColumnNameArray = getHeaderColumnNamesForMatrix($reporter, $header_row, $columnDataFor2ndGroup);
	$totalColumns = count($headerColumnNameArray) + count($columnDataFor3rdGroup) - 1;
	$this->assign('legend', implode(",", $legend));
	$maximumCellSize = $maximumCellSize - $reporter->addedColumns;
{/php}

<B>{$mod_strings.LBL_REPORT_DATA_COLUMN_ORDERS}</B> {$legend}
<br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportlistView">
<tr height="20">
{php}
	for ($i = 0 ; $i < count($headerColumnNameArray) ; $i++) {
		$this->assign('headerColumnName', $headerColumnNameArray[$i]);
		$headerColumnClassName = "reportlistViewMatrixThS1";
		if ($i == (count($headerColumnNameArray) - 1)) {
			$headerColumnClassName = "reportlistViewMatrixThS2";
		} // if
		$this->assign('headerColumnClassName', $headerColumnClassName);
		if ($i == 2) {
		$this->assign('topLevelColSpan', count($columnDataFor3rdGroup));
{/php}
	<th scope="col" align='center' colspan="{$topLevelColSpan}" class="{$headerColumnClassName}" valign=middle wrap>{$headerColumnName}</th>
{php}
		} else {
		$this->assign('topLevelRowSpan', 2);
{/php}
	<th scope="col" align='center' class="{$headerColumnClassName}" valign=middle wrap>{$headerColumnName}</th>

{php}
		} // else
	} // for
{/php}
</tr>

{php}
	if (!empty($rowsAndColumnsData)) {
{/php}
<tr height="20">
{php}
	$count = 0;
	for ($i = 0 ; $i < $totalColumns ; $i++) {
		if ($i == 0 || $i == 1 || $i == ($totalColumns -1)) {
			$headerColumn2ClassName = "reportlistViewMatrixThS4";
			if ($i == 0) {
				$headerColumn2ClassName = "reportlistViewMatrixThS3";
			}
			$this->assign('headerColumn2ClassName', $headerColumn2ClassName);
{/php}
	<th scope="col" align='center' class="{$headerColumn2ClassName}" valign=middle wrap>&nbsp;</th>
{php}
		}  else {
		$headerColumn2ClassName = "reportlistViewMatrixThS1";
		$this->assign('headerColumn2ClassName', $headerColumn2ClassName);
		$cellData = $columnDataFor3rdGroup[$count];
		if (empty($cellData)) {
			$cellData = "&nbsp;";
		} // if
		$this->assign('columnDataFor2ndGroup', $cellData);
		$count++;
{/php}
	<th scope="col" align='center' class="{$headerColumn2ClassName}" valign=middle wrap>{$columnDataFor2ndGroup}</th>
{php}
		} // else
	} // for
{/php}
</tr>

{php}
	// iteration for the group by data
	$columnDataFor2ndGroup[] = 'Total';
	$noofrows = count($columnDataFor2ndGroup) * $maximumCellSize;
	$columnDataFor3rdGroup[] = 'Total';
	$noofcolumns = (count($reporter->report_def['group_defs']) - 1) + count($columnDataFor3rdGroup);
	for ($i = 0 ; $i < count($rowsAndColumnsData) ; $i++) {
		$rowData = $rowsAndColumnsData[$i];
		$set1stGroupBy = true;
		for ($j = 0 ; $j < count($columnDataFor2ndGroup) ; $j++) {
			$topLevelGpByData = "&nbsp;";
			$set2ndstGroupBy = true;
			for ($k = 0 ; $k < $maximumCellSize ; $k++) {
{/php}
			<tr height="20">
{php}
				for ($m = 0 ; $m < count($columnDataFor3rdGroup) ; $m++) {

					if ($set1stGroupBy) {
						if (isset($rowData[$headerColumnNameArray[0]])) {
							$topLevelGpByData = $rowData[$headerColumnNameArray[0]];
							if (empty($topLevelGpByData)) {
								$topLevelGpByData = "&nbsp;";
							} // if
						} // if
						$this->assign('topLevelGpByData', $topLevelGpByData);
						$this->assign('rowSpanForTopGpByData', $noofrows);
						$dataCellClass = "reportlistViewMatrixRightEmptyData";
						$this->assign('dataCellClass', $dataCellClass);
{/php}
						<td scope="col" align='center' rowspan={$rowSpanForTopGpByData} class="{$dataCellClass}" valign=middle wrap>{$topLevelGpByData}</td>
{php}
						$set1stGroupBy = false;
					} // if

					if ($set2ndstGroupBy) {

						$topLevelGp2ByData = "&nbsp;";
						//if (isset($rowData[$columnDataFor2ndGroup[$j]])) {
							$topLevelGp2ByData = $columnDataFor2ndGroup[$j];
							if (empty($topLevelGp2ByData)) {
								$topLevelGp2ByData = "&nbsp;";
							} // if
						//} // if
						$this->assign('topLevelGpBy2Data', $topLevelGp2ByData);
						$this->assign('rowSpanFor2ndGpByData', $maximumCellSize);
						$dataCellClass = "reportlistViewMatrixRightEmptyData";
						$this->assign('dataCellClass', $dataCellClass);
{/php}
					<td scope="col" align='center' rowspan={$rowSpanFor2ndGpByData} class="{$dataCellClass}" valign=middle wrap>{$topLevelGpBy2Data}</td>
{php}
						$set2ndstGroupBy = false;
					} // if
					$topLevelGp3ByData = "&nbsp;";
					if (isset($rowData[$columnDataFor2ndGroup[$j]])) {
						if (isset($rowData[$columnDataFor2ndGroup[$j]][$columnDataFor3rdGroup[$m]])) {
							$cellDataArray = $rowData[$columnDataFor2ndGroup[$j]][$columnDataFor3rdGroup[$m]];
							$arrayKeys = array_keys($cellDataArray);
							$cellData = $cellDataArray[$arrayKeys[$k]];
							$topLevelGp3ByData = $cellData;
							if (empty($topLevelGp3ByData)) {
								$topLevelGp3ByData = "&nbsp;";
							} // if
						} // if
					} // if

					$this->assign('topLevelGp3ByData', $topLevelGp3ByData);
					$dataCellClass = "reportGroupByDataMatrixEvenListRowS1";
					if ($m == (count($columnDataFor3rdGroup)-1)) {
						$dataCellClass = "reportGroupByDataMatrixEvenListRowS2";
					} // if
					if ($j == 0) {
						//$dataCellClass = "reportlistViewMatrixRightEmptyData11";
					} // if
					$this->assign('dataCellClass', $dataCellClass);
{/php}
					<td scope="col" align='center' class="{$dataCellClass}" valign=middle wrap>{$topLevelGp3ByData}</td>
{php}

				} // for
{/php}
</tr>
{php}
			} // for

		} // for
	} // for
	$setGrandTotalString = true;
	for ($k = 0 ; $k < $maximumCellSize ; $k++) {
{/php}
	<tr height="20">
{php}
		for ($m = 0 ; $m < count($columnDataFor3rdGroup) ; $m++) {
			$grandTotalString = $grandTotal[$headerColumnNameArray[0]];
			$this->assign('grandTotalData', $grandTotalString);
			$dataCellClass = "reportlistViewMatrixRightEmptyData1";
			$this->assign('dataCellClass', $dataCellClass);
			if ($setGrandTotalString) {
				$setGrandTotalString = false;
				$this->assign('rowSpanFor2ndGpByData', $maximumCellSize);
{/php}
	<td scope="col" align='center' colspan='2' rowspan="{$rowSpanFor2ndGpByData}" class="{$dataCellClass}" valign=middle wrap>{$grandTotalData}</td>
{php}
			} // if
			$grandTotalData = "&nbsp;";
			if (isset($grandTotal[$columnDataFor3rdGroup[$m]])) {
				$cellDataArray = $grandTotal[$columnDataFor3rdGroup[$m]];
				$arrayKeys = array_keys($cellDataArray);
				$cellData = $cellDataArray[$arrayKeys[$k]];
				$grandTotalData = $cellData;
				if (is_array($grandTotalData)) {
					$arrayKeys = array_keys($grandTotalData);
					$cellData = $grandTotalData[$arrayKeys[$k]];
					$grandTotalData = $cellData;
					if (empty($grandTotalData)) {
						$grandTotalData = "&nbsp;";
					} // if
				} else {
					if (empty($grandTotalData)) {
						$grandTotalData = "&nbsp;";
					} // if
				} // else
			} // if
			$this->assign('grandTotalData', $grandTotalData);
			$dataCellClass = "reportGroupByDataMatrixEvenListRowS1";
			if ($m == (count($columnDataFor3rdGroup)-1)) {
				$dataCellClass = "reportGroupByDataMatrixEvenListRowS2";
			} // if
			if ($k == ($maximumCellSize -1)) {
				$dataCellClass = "reportGroupByDataMatrixEvenListRowS3";
				if ($m == (count($columnDataFor3rdGroup)-1)) {
					$dataCellClass = "reportGroupByDataMatrixEvenListRowS4";
				} // if
			} // if
			//$dataCellClass = "reportlistViewMatrixRightEmptyData";
			$this->assign('dataCellClass', $dataCellClass);
{/php}
	<td scope="col" align='center' class="{$dataCellClass}" valign=middle wrap>{$grandTotalData}</td>
{php}
		} // for
{/php}
	</tr>
{php}
	} // for
{/php}
{php}
	} else {
{/php}
<tr height="20">
{php}
	for ($j = 0 ; $j < 4 ; $j++) {
{/php}
<td scope="col" align='center' class="reportGroupByDataMatrixEvenListRowS4" valign=middle wrap>No results</td>
{php}
	} // for
{/php}
</tr>
{php}
	} // else
{/php}
</table>


{php}
template_query_table($reporter);
{/php}

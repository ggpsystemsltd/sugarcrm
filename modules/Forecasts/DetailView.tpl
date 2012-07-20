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

{$SITEURL}
{$TREEHEADER}
<SCRIPT type='text/javascript' src="{sugar_getjspath file='modules/Forecasts/forecast.js'}"></SCRIPT>
	<form action="index.php" method="post"  id="form">
		<input type="hidden" name="module" value="Forecasts">
		<input type="hidden" name="action" value="index">
		<input type="hidden" name="isDuplicate" value="0">
		<input type="hidden" name="timeperiod_id" >
			 {$LBL_DV_TIMEPERIODS}&nbsp;<select name="timeperiod_id" onchange="this.form.timeperiod_id.value=this.value;this.form.submit();" class="dataField">{$CURRENT_TIMEPERIODS}</select>&nbsp;
			 {$TP_START_DATE}&nbsp;{$TP_END_DATE}
	</form>
<br/>
<table width="100%" cellpadding="0" cellspacing="0" border="{$BORDER}" id="forecastsWorksheet">
<tr>
	<td width="{$TREE_WIDTH}" valign="top"  >
		<div id="activetimeperiods">
			{$TREEINSTANCE}
		</div>
	</td>
	<td id="activetimeperiodsworksheet" valign="top">
		{$FORECASTDATA}
	</td>
</tr>
</table>

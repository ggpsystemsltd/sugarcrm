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
<div id="settings_dialog" style="width: 340px; display: none;">
	<div class="hd">{$MOD.LBL_SETTINGS_TITLE}</div>
	<div class="bd">
	<form name="settings" id="form_settings" method="POST" action="index.php?module=Calendar&action=SaveSettings">
		<input type="hidden" name="view" value="{$view}">
		<input type="hidden" name="day" value="{$day}">
		<input type="hidden" name="month" value="{$month}">
		<input type="hidden" name="year" value="{$year}">
		
		<table class='edit view tabForm'>
				<tr>
					<td scope="row" valign="top">
						{$MOD.LBL_SETTINGS_TIME_STARTS}
					</td>
					<td>
						<div id="d_start_time_section">
							<select size="1" id="day_start_hours" name="day_start_hours" tabindex="102">
								{$TIME_START_HOUR_OPTIONS}
							</select>&nbsp;:
							
							<select size="1" id="day_start_minutes" name="day_start_minutes"  tabindex="102">
								{$TIME_START_MINUTES_OPTIONS}
							</select>
								&nbsp;
							{$TIME_START_MERIDIEM}
						</div>
					</td>
				</tr>
				<tr>
					<td scope="row" valign="top">
						{$MOD.LBL_SETTINGS_TIME_ENDS}
					</td>
					<td>
						<div id="d_end_time_section">
							<select size="1" id="day_end_hours" name="day_end_hours" tabindex="102">
								{$TIME_END_HOUR_OPTIONS}
							</select>&nbsp;:
							
							<select size="1" id="day_end_minutes" name="day_end_minutes"  tabindex="102">
								{$TIME_END_MINUTES_OPTIONS}
							</select>
								&nbsp;
							{$TIME_END_MERIDIEM}
						</div>
					</td>
				</tr>
				<tr>
					<td scope="row" valign="top">
						{$MOD.LBL_SETTINGS_CALLS_SHOW}
					</td>
					<td>	
						<select size="1" name="show_calls" tabindex="102">
							<option value='' {if !$show_calls}selected{/if}>{$MOD.LBL_NO}</option>
							<option value='true' {if $show_calls}selected{/if}>{$MOD.LBL_YES}</option>								
						</select>
					</td>
				</tr>
				<tr>
					<td scope="row" valign="top">
						{$MOD.LBL_SETTINGS_TASKS_SHOW}
					</td>
					<td>	
						<select size="1" name="show_tasks" tabindex="102">
							<option value='' {if !$show_tasks}selected{/if}>{$MOD.LBL_NO}</option>
							<option value='true' {if $show_tasks}selected{/if}>{$MOD.LBL_YES}</option>								
						</select>
					</td>
				</tr>
		</table>
	</form>
	
	
	<div style="text-align: right;">
		<button id="btn-save-settings" class="button" type="button">{$MOD.LBL_APPLY_BUTTON}</button>&nbsp;
		<button id="btn-cancel-settings" class="button" type="button">{$MOD.LBL_CANCEL_BUTTON}</button>&nbsp;
	</div>
	</div>
</div>

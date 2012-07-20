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
<script type='text/javascript' src="{sugar_getjspath file='include/javascript/overlibmws.js'}"></script>
<form name="TrackerSettings" method="POST">
<input type="hidden" name="action" value="TrackerSettings">
<input type="hidden" name="module" value="Trackers">
<input type="hidden" name="process" value="">

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
<tr>
<td scope="row" width="100%" colspan="2">
<input type="button" onclick="document.TrackerSettings.process.value='true'; if(check_form('TrackerSettings')) {ldelim} document.TrackerSettings.submit(); {rdelim}" class="button primary" title="{$app.LBL_SAVE_BUTTON_TITLE}" accessKey="{$app.LBL_SAVE_BUTTON_KEY}" value="{$app.LBL_SAVE_BUTTON_LABEL}">
<input type="button" onclick="document.TrackerSettings.process.value='false'; document.TrackerSettings.submit();" class="button" title="{$app.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$app.LBL_CANCEL_BUTTON_KEY}" value="{$app.LBL_CANCEL_BUTTON_LABEL}">
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
<tr>
<td scope="row" width="50%">&nbsp;</td>
<td scope="row" width="50%">{$mod.LBL_ENABLE}</td>
</tr>
{foreach name=trackerEntries from=$trackerEntries key=key item=entry}
<tr>
<td scope="row" width="50%">{$entry.label}:&nbsp;{sugar_help text=$entry.helpLabel}</td>
<td  width="50%"><input type="checkbox" id="{$key}" name="{$key}" value="1" {if !$entry.disabled}CHECKED{/if}>
</tr>
{/foreach}
<tr>
<td scope="row">{$mod.LOG_SLOW_QUERIES}:</td>
{if !empty($config.dump_slow_queries)}
	{assign var='dump_slow_queries_checked' value='CHECKED'}
{else}
	{assign var='dump_slow_queries_checked' value=''}
{/if}
<td ><input type='hidden' name='dump_slow_queries' value='false'><input name='dump_slow_queries'  type="checkbox" value='true' {$dump_slow_queries_checked}></td>
</tr>

<tr>
<td scope="row" width="20%">{$mod.LBL_TRACKER_PRUNE_INTERVAL}</td>
<td><input type='text' id='tracker_prune_interval' name='tracker_prune_interval' size='5' value='{$tracker_prune_interval}'></td>
</tr>
<tr>
<td scope="row">{$mod.SLOW_QUERY_TIME_MSEC}: </td>
<td >
<input type='text' size='5' name='slow_query_time_msec' value='{$config.slow_query_time_msec}'>
</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td scope="row" width="100%" colspan="2">
<input type="button" onclick="document.TrackerSettings.process.value='true'; if(check_form('TrackerSettings')) {ldelim} document.TrackerSettings.submit(); {rdelim}" class="button primary" title="{$app.LBL_SAVE_BUTTON_TITLE}" value="{$app.LBL_SAVE_BUTTON_LABEL}">
<input type="button" onclick="document.TrackerSettings.process.value='false'; document.TrackerSettings.submit();" class="button" title="{$app.LBL_CANCEL_BUTTON_TITLE}"  value="{$app.LBL_CANCEL_BUTTON_LABEL}">
</td>
</tr>
</table>
</form>


<script type="text/javascript">
addToValidate('TrackerSettings', 'tracker_prune_interval', 'int', true, "{$mod.LBL_TRACKER_PRUNE_RANGE}");
addToValidateRange('TrackerSettings', 'tracker_prune_interval', 'range', true, '{$mod.LBL_TRACKER_PRUNE_RANGE}', 1, 180);
addToValidate('TrackerSettings', 'slow_query_time_msec', 'int', true, "{$mod.SLOW_QUERY_TIME_MSEC}");
</script>

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
<div class="sec">
<div class="search_sec">{sugar_translate label='LBL_SEARCHFORM' module=''}</div>
<form method="post" action="index.php">
	<input type="hidden" name="module" value="{$MODULE}" />
	<input type="hidden" value="wirelesslist" name="action" />
	<input type="hidden" name="query" value="true" />
	<input type="hidden" name="searchFormTab" value="advanced_search" />
	{foreach from=$WL_SEARCH_FIELDS item=DEFS key=FIELD}
		<small>{$DEFS.label|strip_semicolon}:</small><br />
		{sugar_field parentFieldArray='fields' vardef=$fields[$DEFS.field] displayType='wirelessListView' displayParams='' typeOverride=$DEFS.type formName=$form_name}<br />
	{/foreach}
	{if $MODULE != 'Employees'}
	<small>{sugar_translate label='LBL_CURRENT_USER_FILTER' module=''}</small> <input type="checkbox" name="my_items" {$myitems}><br />
	{/if}
	<input class="button" type="submit" value="{sugar_translate label='LBL_SEARCH' module=''}" />
</form>
</div>
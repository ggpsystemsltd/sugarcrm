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

{strip}
<TABLE width='100%' class='detail view' border='0' cellpadding=0 cellspacing = 1  >
<TR>
<td style="background: transparent;"></td>
{foreach from=$ACTION_NAMES item="ACTION_NAME" }
	<td style="text-align: center;" scope="row"><b>{$ACTION_NAME}</b></td>
{foreachelse}

          <td colspan="2">&nbsp;</td>

{/foreach}
</TR>
{foreach from=$CATEGORIES item="TYPES" key="CATEGORY_NAME"}


	<TR>
	{if $APP_LIST.moduleList[$CATEGORY_NAME]=='Users'}
	<td nowrap width='1%' scope="row"><b>{$MOD.LBL_USER_NAME_FOR_ROLE}</b></td>
	{else}
	<td nowrap width='1%' scope="row"><b>{$APP_LIST.moduleList[$CATEGORY_NAME]}</b></td>
	{/if}
	{foreach from=$ACTION_NAMES item="ACTION_LABEL" key="ACTION_NAME"}
		{assign var='ACTION_FIND' value='false'}
		{foreach from=$TYPES item="ACTIONS" key="TYPE_NAME"}
			{foreach from=$ACTIONS item="ACTION" key="ACTION_NAME_ACTIVE"}
				{if $ACTION_NAME==$ACTION_NAME_ACTIVE}
					{assign var='ACTION_FIND' value='true'}
					<td  width='{$TDWIDTH}%' align='center'><div align='center' class="acl{$ACTION.accessLabel|capitalize}"><b>{$ACTION.accessName}</b></div></td>
				{/if}
			{/foreach}
		{/foreach}
		{if $ACTION_FIND=='false'}
			<td nowrap width='{$TDWIDTH}%' style="text-align: center;">
			<div><font color='red'>N/A</font></div>
			</td>
		{/if}
	{/foreach}
	</TR>


{foreachelse}
	<tr> <td colspan="2">No Actions</td></tr>
{/foreach}
</TABLE>
{/strip}
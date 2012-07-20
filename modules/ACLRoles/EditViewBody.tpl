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
<script src="{sugar_getjspath file='modules/ACLRoles/ACLRoles.js'}"></script>
<b>{$MOD.LBL_EDIT_VIEW_DIRECTIONS}</b>
<table width='100%'><tr>
<td valign='top'>
<TABLE class='edit view' border='0' cellpadding=0 cellspacing = 1  >
<tr> <td colspan="2" scope="row"><a href='javascript:void(0);' onclick='aclviewer.view("{$ROLE.id}", "All");'><b>{$MOD.LBL_ALL}</b></a></td></tr>

{foreach from=$CATEGORIES2 item="TYPES" key="CATEGORY_NAME"}
{if $APP_LIST.moduleList[$CATEGORY_NAME]!='Users'}
<TR>
<td nowrap width='1%' scope="row"><a href='javascript:void(0);' onclick='aclviewer.view("{$ROLE.id}", "{$CATEGORY_NAME}");'><b>{$APP_LIST.moduleList[$CATEGORY_NAME]}</b></a></td>
</TR>
{/if}
	{foreachelse}

         <tr> <td colspan="2">No Modules Available</td></tr>

{/foreach}
</TABLE>
</td>
<td width= '100%'  valign='top'>
<div id='category_data'>
{include file='modules/ACLRoles/EditAllBody.tpl'}
</div>
</td></tr>
</table>



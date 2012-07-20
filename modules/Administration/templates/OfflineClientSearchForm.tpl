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

/*********************************************************************************

 ********************************************************************************/
*}

{$JAVASCRIPT}
<form class="search_form" id="search_form">
<div class="edit view search basic">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
    <td scope="row" width="1%" nowrap="nowrap"><slot>{$MOD.LBL_USER_NAME}</slot></td>
    <td width="1%"><slot><input type="text" size="10" name="user_name" value="{$USER_NAME}"></slot></td>
    <td style="padding-left: 10px ! important;">
        <input type="hidden" name="action" value="ViewOfflineClients"/>
        <input type="hidden" name="query" value="true"/>
        <input type="hidden" name="module" value="Administration" />
        <input title="{$APP.LBL_SEARCH_BUTTON_TITLE}" id="search_form_submit" class="button" type="submit" name="button" value="{$APP.LBL_SEARCH_BUTTON_LABEL}"/>
        <input title="{$APP.LBL_CLEAR_BUTTON_TITLE}" id="search_form_clear" onclick="clear_form(this.form);" class="button" type="button" name="clear" value=" {$APP.LBL_CLEAR_BUTTON_LABEL} "/>
    </td>
</tr>
</table>
</div>
</form>

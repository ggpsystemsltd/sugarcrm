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
<div class="ydlg-bd">
	<form name="editMailingListForm" id="editMailingListForm">
		<input type="hidden" id="mailing_list_id" name="mailing_list_id" value="{$mailing_list_id}">
	<table>
		<tr>
			<td colspan="2">
				<input type="button" class="button" id="ml_save" 
					value="   {$app_strings.LBL_SAVE_BUTTON_LABEL}   "
					onclick="javascript:SUGAR.email2.addressBook.editMailingListSave();"
				>&nbsp;
				<input type="button" class="button" id="ml_save" 
					value="   {$app_strings.LBL_EMAIL_REVERT}   "
					onclick="javascript:SUGAR.email2.addressBook.editMailingListRevert();"
				>&nbsp;
				<input type="button" class="button" id="ml_cancel" 
					value="   {$app_strings.LBL_CANCEL_BUTTON_LABEL}   "
					onclick="javascript:SUGAR.email2.addressBook.cancelEdit();"
				>
				<br>&nbsp;
			</td>
		</tr>
		<tr>
			<td scope="row">
				<b>{$app_strings.LBL_EMAIL_ML_NAME}</b>
			</td>
			<td >
				<input class="input" name="mailing_list_name" id="mailing_list_name" value="{$mailing_list_name}">
			</td>
		</tr>
		<tr>
			<td scope="row" align="top" height="200">
				<b>{$app_strings.LBL_EMAIL_ML_ADDRESSES_1}</b>
				<br />&nbsp;<br />
				<div id="ml_used" style="overflow:auto; height:90%; margin:5px; padding:2px; border:1px solid #ccc;"></div>
			</td>
			<td scope="row" align="top" height="200">
				<b>{$app_strings.LBL_EMAIL_ML_ADDRESSES_2}</b>
				<br />&nbsp;<br />
				<div id="ml_available" style="overflow:auto; height:90%; margin:5px; padding:2px; border:1px solid #ccc;"></div>
			</td>
		</tr>
	</table>
	</form>
</div>
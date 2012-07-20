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
<tr>
    <td scope="row">{$app_strings.LBL_EMAIL_ADDRESSES}: </td>
</tr>

<script type="text/javascript" src="{sugar_getjspath file='include/SugarEmailAddress/SugarEmailAddress.js'}"></script>
<script type="text/javascript">
	var module = '{$module}';
</script>
<tr>
<td colspan="4">
<table style="border-spacing: 0pt;">
	<tr>
		<td  valign="top" NOWRAP>
			<table cellpadding="0" cellspacing="0" border="0" id="{$module}emailAddressesTable{$index}" class="emailaddresses">
				<tbody id="targetBody"></tbody>
				<tr>
					<td>
						<input type=hidden name='emailAddressWidget' value=1>
						<span class="id-ff multiple ownline">
						<button class='button' type='button' id="{$module}{$index}_email_widget_add"
onClick="javascript:SUGAR.EmailAddressWidget.instances.{$module}{$index}.addEmailAddress('{$module}emailAddressesTable{$index}','','');" 
value='{$app_strings.LBL_ADD_BUTTON}'>{sugar_getimage name="id-ff-add" alt=$app_strings.LBL_ID_FF_ADD ext=".png" other_attributes=''}</button>
						</span>					

					</td>
					<td scope="row" NOWRAP>
					    &nbsp;
					</td>
					<td scope="row" NOWRAP>
						{$app_strings.LBL_EMAIL_PRIMARY}
					</td>
					{if $useReplyTo == true}
					<td scope="row" NOWRAP>
						{$app_strings.LBL_EMAIL_REPLY_TO}
					</td>
					{/if}
					{if $useOptOut == true}
					<td scope="row" NOWRAP>
						{$app_strings.LBL_EMAIL_OPT_OUT}
					</td>
					{/if}
					{if $useInvalid == true}
					<td scope="row" NOWRAP>
						{$app_strings.LBL_EMAIL_INVALID}
					</td>
					{/if}
				</tr>
			</table>
		</td>
	</tr>
</table>
<input type="hidden" name="useEmailWidget" value="true">
</td>
</tr>

<script type="text/javascript" language="javascript">
    var table = YAHOO.util.Dom.get("{$module}emailAddressesTable{$index}");
    var eaw = SUGAR.EmailAddressWidget.instances.{$module}{$index} = new SUGAR.EmailAddressWidget("{$module}");
    eaw.emailView = '{$emailView}';
    eaw.emailIsRequired = "{$required}";
    var addDefaultAddress = '{$addDefaultAddress}';
    var prefillEmailAddress = '{$prefillEmailAddresses}';
    var prefillData = {$prefillData};
    if(prefillEmailAddress == 'true') {ldelim}
        eaw.prefillEmailAddresses('{$module}emailAddressesTable{$index}', prefillData);
	{rdelim} else if(addDefaultAddress == 'true') {ldelim}
        eaw.addEmailAddress('{$module}emailAddressesTable{$index}');
	{rdelim}
</script>
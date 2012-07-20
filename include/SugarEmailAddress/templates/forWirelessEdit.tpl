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
<input type=hidden name='emailAddressWidget' value=1>
<table cellpadding="0" cellspacing="0" border="0" >
	<tr>
		<td  valign="top" NOWRAP>
			<table cellpadding="0" cellspacing="0" border="0" id="{$module}emailAddressesTable0">
			    <tr>
			        <td>
			            <input type="hidden" value="0" name="{$module}_email_widget_id" id="{$module}_email_widget_id" />
			            <input type="hidden" value="1" name="emailAddressWidget" id="emailAddressWidget" />
                    </td>
                </tr>
				{foreach from=$prefillData item="record" name="recordlist"}
                <tr id="{$module}0emailAddressRow{$smarty.foreach.recordlist.index}">
                    <td classname="dataLabel" class="tabEditViewDF" nowrap="NOWRAP">
                        <input value="{$record.email_address}" size="20" 
                            id="{$module}0emailAddress{$smarty.foreach.recordlist.index}" name="{$module}0emailAddress{$smarty.foreach.recordlist.index}" type="text"><br>
                        <input enabled="true" {if $record.primary_address == '1'}checked="true"{/if} enabled="{if $record.primary_address == '1'}true{else}false{/if}" value="{$module}0emailAddress{$smarty.foreach.recordlist.index}" 
                            id="{$module}0emailAddressPrimaryFlag{$smarty.foreach.recordlist.index}" name="{$module}0emailAddressPrimaryFlag" type="radio">{$app_strings.LBL_EMAIL_PRIMARY}<br>
                        <input enabled="true" {if $record.opt_out == '1'}checked="true"{/if} value="{$module}0emailAddress{$smarty.foreach.recordlist.index}" 
                            id="{$module}0emailAddressOptOutFlag{$smarty.foreach.recordlist.index}" name="{$module}0emailAddressOptOutFlag[]" type="checkbox">{$app_strings.LBL_EMAIL_OPT_OUT}<br>
                        <input enabled="true" {if $record.invalid_email == '1'}checked="true"{/if} value="{$module}0emailAddress{$smarty.foreach.recordlist.index}" 
                            id="{$module}0emailAddressInvalidFlag{$smarty.foreach.recordlist.index}" name="{$module}0emailAddressInvalidFlag[]" type="checkbox">{$app_strings.LBL_EMAIL_INVALID}<br>
                        <input enabled="true" value="{$module}0emailAddress{$smarty.foreach.recordlist.index}" 
                            id="{$module}0emailAddressDeleteFlag{$smarty.foreach.recordlist.index}" name="{$module}0emailAddressDeleteFlag[]" type="checkbox">{$app_strings.LBL_EMAIL_DELETE}<br>
                    </td>
                </tr>
                {/foreach}
                <tr id="{$module}0emailAddressRow{$smarty.foreach.recordlist.total}">
                    <td classname="dataLabel" class="tabEditViewDF" nowrap="NOWRAP">
                        <b>{$app_strings.LBL_EMAIL_ADD}</b><br />
                        <input value="" size="20" 
                            id="{$module}0emailAddress{$smarty.foreach.recordlist.total}" name="{$module}0emailAddress{$smarty.foreach.recordlist.total}" type="text"><br>
                        <input enabled="true" value="{$module}0emailAddress{$smarty.foreach.recordlist.total}" 
                            id="{$module}0emailAddressPrimaryFlag{$smarty.foreach.recordlist.total}" name="{$module}0emailAddressPrimaryFlag" type="radio"{if $noemail} checked="true"{/if}>{$app_strings.LBL_EMAIL_PRIMARY}<br>
                        <input enabled="true" value="{$module}0emailAddress{$smarty.foreach.recordlist.total}" 
                            id="{$module}0emailAddressOptOutFlag{$smarty.foreach.recordlist.total}" name="{$module}0emailAddressOptOutFlag[]" type="checkbox">{$app_strings.LBL_EMAIL_OPT_OUT}<br>
                        <input enabled="true" value="{$module}0emailAddress{$smarty.foreach.recordlist.total}" 
                            id="{$module}0emailAddressInvalidFlag{$smarty.foreach.recordlist.total}" name="{$module}0emailAddressInvalidFlag[]" type="checkbox">{$app_strings.LBL_EMAIL_INVALID}<br>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
</table>
<input type="hidden" name="useEmailWidget" value="true">

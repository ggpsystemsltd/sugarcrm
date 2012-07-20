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

			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				{foreach from=$emailAddresses item=address}
				<tr>
					<td style="border:none;">
						{if $address.key === 'opt_out' || $address.key === 'invalid' || $address.key === 'opt_out_invalid'}
							<span style="text-decoration: line-through;">
						{elseif $address.key === 'primary'}
							<b>
						{elseif $address.key === 'reply_to' && $item.key != 0}
							<i>
						{/if}

						{$address.address}

						{if $address.key === 'primary'}
							</b>&nbsp;<i>&#x28;{$app_strings.LBL_EMAIL_PRIMARY}&#x29;&#x200E;</i>
						{elseif $address.key === 'reply_to'}
							&nbsp;<i>&#x28;{$app_strings.LBL_EMAIL_REPLY_TO}&#x29;&#x200E;</i>
						{elseif $address.key === 'opt_out'}
							</span>&nbsp;<i class='error'>&#x28;{$app_strings.LBL_EMAIL_OPT_OUT}&#x29;&#x200E;</i>
						{elseif $address.key === 'invalid'}
							</span>&nbsp;<i>({$app_strings.LBL_EMAIL_INVALID}&#x29;&#x200E;</i>
						{elseif $address.key === 'opt_out_invalid'}
						    </span>&nbsp;<i class='error'>&#x28;{$app_strings.LBL_EMAIL_OPT_OUT_AND_INVALID}&#x29;&#x200E;</i>
						{/if}
					</td>
				</tr>
				{foreachelse}
				<tr>
					<td>
						<i>{$app_strings.LBL_NONE}</i>
					</td>
				</tr>
				{/foreach}
			</table>

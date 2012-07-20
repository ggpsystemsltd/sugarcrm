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
<form id="ieAccount" name="ieAccount">
				<input type="hidden" id="ie_id" name="ie_id">
				<input type="hidden" id="ie_status" name="ie_status" value="Active">
				<input type="hidden" id="ie_team" name="ie_team" value="{$ie_team}">
				<input type="hidden" id="group_id" name="group_id">
				<input type="hidden" id="group_id" name="mark_read" value="1">
				<input type="hidden" name="searchField" value="">

			<table border="0" cellspacing="0" cellpadding="0" class="edit view">
				<tr>
					<td>
					<h4>{$mod_strings.LBL_EMAIL_SETTINGS_INBOUND}</h4>
					</td>
				    <td style="vertical-align:bottom;"><a href="javascript:void(0);" id="prefill_gmail_defaults_link" onclick="javascript:SUGAR.email2.accounts.fillInboundGmailDefaults();">{$app_strings.LBL_EMAIL_ACCOUNTS_GMAIL_DEFAULTS}</a>&nbsp;</td>
				</tr>
			    <tr>
					<td valign="top" scope="row" width="15%" NOWRAP>
						{$app_strings.LBL_EMAIL_SETTINGS_NAME}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>
					</td>
					<td valign="top"  width="35%">
						<input id='ie_name' name='ie_name' type="text" size="30">
					</td>
				</tr>
			    <tr>
					<td valign="top" scope="row">
						{$ie_mod_strings.LBL_LOGIN}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
					</td>
					<td valign="top" >
						<input id='email_user' name='email_user' size='30' maxlength='100' type="text" onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);">
					</td>
			    </tr>

			    <tr>
					<td valign="top" scope="row">
						{$ie_mod_strings.LBL_PASSWORD}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
					</td>
					<td valign="top" >
						<input id='email_password' name='email_password' size='30' maxlength='100' type="password" onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);">
						<a href="javascript:void(0)" id='email_password_link' onClick="SUGAR.util.setEmailPasswordEdit('email_password')" style="display: none">{$app_strings.LBL_CHANGE_PASSWORD}</a>
					</td>
			    </tr>

			     <tr>
                    <td valign="top" scope="row" NOWRAP>
                        {$ie_mod_strings.LBL_SERVER_URL}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
                    </td>
                    <td valign="top" >
                        <input id='server_url' name='server_url' size='30' maxlength='100' type="text" onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);">
                    </td>
                </tr>
			    <tr>
					<td valign="top" scope="row" NOWRAP>
						{$ie_mod_strings.LBL_SERVER_TYPE}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
					</td>
					<td valign="top" >
						<select name='protocol' id="protocol" onchange="SUGAR.email2.accounts.setPortDefault(); SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);">{$PROTOCOL}</select>
					</td>
				</tr>
				<tr>
					<td valign="top" scope="row" NOWRAP>
						{$ie_mod_strings.LBL_SSL}:&nbsp;
                        <div id="rollover">
                            <a href="#" class="rollover">{sugar_getimage alt=$mod_strings.LBL_HELP name="helpInline" ext=".gif" other_attributes='border="0" '}<span>{$ie_mod_strings.LBL_SSL_DESC}</span></a>
                        </div>
					</td>
					<td valign="top"  width="15%">
					   <div class="maybe">
						   <input name='ssl' id='ssl' {$CERT} value='1' type='checkbox' {$SSL} onClick="SUGAR.email2.accounts.setPortDefault();">
					   </div>
					</td>
				</tr>
				<tr>
					<td valign="top" scope="row" NOWRAP>
						{$ie_mod_strings.LBL_PORT}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
					</td>
					<td valign="top" >
						<input name='port' id='port' size='10' onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);">
					</td>
				</tr>
			     <tr id="mailboxdiv" style="dispay:'none';">
                    <td valign="top" scope="row" NOWRAP>
                        {$ie_mod_strings.LBL_MAILBOX}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
                    </td>
                    <td valign="top" >
                        <input id='mailbox' value="" name='mailbox' size='30' maxlength='500' type="text" onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);" />
					<input type="button" id="subscribeFolderButton" name="subscribeFolderButton" class="button" onclick='this.form.searchField.value="";SUGAR.email2.accounts.getFoldersListForInboundAccountForEmail2();' value="{$app_strings.LBL_EMAIL_SELECT}" />
                    </td>
                </tr>
			     <tr id="trashFolderdiv" style="dispay:'none';">
                    <td valign="top" scope="row" NOWRAP>
                        {$ie_mod_strings.LBL_TRASH_FOLDER}: <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>&nbsp;
                    </td>
                    <td valign="top" >
                        <input id='trashFolder' value="" name='trashFolder' size='30' maxlength='100' type="text" onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);" />
					<input type="button" id="trashFolderButton" name="trashFolderButton" class="button" onclick='this.form.searchField.value="trash";SUGAR.email2.accounts.getFoldersListForInboundAccountForEmail2();' value="{$app_strings.LBL_EMAIL_SELECT}" />
                    </td>
                </tr>
			     <tr id="sentFolderdiv" style="dispay:'none';">
                    <td valign="top" scope="row" NOWRAP>
                        {$ie_mod_strings.LBL_SENT_FOLDER}: &nbsp;
                    </td>
                    <td valign="top" >
                        <input id='sentFolder' value="" name='sentFolder' size='30' maxlength='100' type="text" onclick="SUGAR.email2.accounts.ieAccountError(SUGAR.email2.accounts.normalStyle);" />
					<input type="button" id="sentFolderButton" name="sentFolderButton" class="button" onclick='this.form.searchField.value="sent";SUGAR.email2.accounts.getFoldersListForInboundAccountForEmail2();' value="{$app_strings.LBL_EMAIL_SELECT}" />
                    </td>
                </tr>
			    <tr>
					<td NOWRAP colspan="2" style="padding-bottom: 15px">
				<input title="{$ie_mod_strings.LBL_TEST_BUTTON_TITLE}"
							type='button'
							class="button"
							onClick='SUGAR.email2.accounts.testSettings();'
							name="button" id="testButton" value="  {$ie_mod_strings.LBL_TEST_SETTINGS}  ">
						&nbsp;
				    </td>
		        </tr>
		        <tr><td>&nbsp;</td></tr>
			</table>
			<table border="0" cellspacing="0" cellpadding="0" class="edit view" width="100%">
			<tr>
					<td colspan="2">
					<h4>{$mod_strings.LBL_EMAIL_SETTINGS_OUTBOUND}</h4>
					</td>
				</tr>

			<tr>
				<td scope="row">
					{$app_strings.LBL_EMAIL_SETTINGS_FROM_NAME}:
					<span class="required">
						{$app_strings.LBL_REQUIRED_SYMBOL}
					</span>
				</td>
				<td >
					<input type="text" id="ie_from_name" name="from_name" size="30" maxlength="64" value="">
				</td>
			</tr>

			<tr>
				<td scope="row">
					{$app_strings.LBL_EMAIL_SETTINGS_FROM_ADDR}:
					<span class="required">
						{$app_strings.LBL_REQUIRED_SYMBOL}
					</span>
				</td>
				<td >
					<input type="text" id="ie_from_addr" name="from_addr" size="30" maxlength="64" value="">
				</td>
			</tr>

			<tr>
				<td scope="row">
					{$app_strings.LBL_EMAIL_SETTINGS_REPLY_TO_ADDR}:
				</td>
				<td >
					<input type="text" id="reply_to_addr" name="reply_to_addr" size="30" maxlength="64" value="">
				</td>
			</tr>
			<tr>
				<td scope="row">
					{$mod_strings.LBL_EMAIL_SETTINGS_OUTBOUND_ACCOUNT}:
						<span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>
				</td>
				<td >
					<select name='outbound_email' id='outbound_email' onchange="SUGAR.email2.accounts.checkOutBoundSelection()"></select>
				</td>
			</tr>
			<tr class="yui-hidden" id="inboundAccountRequiredUsername">
				<td scope="row">
					{$app_strings.LBL_EMAIL_ACCOUNTS_SMTPUSER}:
						<span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>
				</td>
				<td >
					<input type="text" id="inbound_mail_smtpuser" name="mail_smtpuser" size="30" maxlength="64">
				</td>
			</tr>
			<tr class="yui-hidden" id="inboundAccountRequiredPassword">
				<td scope="row">
					{$app_strings.LBL_EMAIL_ACCOUNTS_SMTPPASS}:
						<span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span>
				</td>
				<td >
					<input type="password" id="inbound_mail_smtppass" name="mail_smtppass" size="30" maxlength="64">
				</td>
			</tr>

			<tr><td style="padding: 0px !important;"colspan="2">&nbsp;</td></tr>

			<tr  style="padding-bottom: 25px;padding-top:15px;">
					<td scope="row" colspan="2">
					<input title="{$ie_mod_strings.LBL_EMAIL_SAVE}"
							type='button'
							accessKey="{$app_strings.LBL_SAVE_BUTTON_KEY}"
							class="button"
							onClick='SUGAR.email2.accounts.saveIeAccount();'
							name="button" id="saveButton" value="  {$app_strings.LBL_EMAIL_DONE_BUTTON_LABEL}  ">
					   &nbsp;
					   <input title="{$app_strings.LBL_EMAIL_SETTINGS_ADD_ACCOUNT}"
                        type='button'
                        class="button"
                        onClick='SUGAR.email2.accounts.clearInboundAccountEditScreen();SE.accounts.setPortDefault();'
                        name="button" id="clearButton" value="  {$app_strings.LBL_EMAIL_SETTINGS_ADD_ACCOUNT}  ">
						&nbsp;
					</td>
				</tr>
		  <tr><td>&nbsp;</td></tr>
</table>
</form>
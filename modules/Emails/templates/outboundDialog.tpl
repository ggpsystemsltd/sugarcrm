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
<div id="outboundServers">
	<form id="outboundEmailForm">
		<input type="hidden" id="mail_id" name="mail_id">
		<input type="hidden" id="type" name="type" value="user">
		<input type="hidden" id="mail_sendtype" name="mail_sendtype" value="SMTP">

		<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
		    <tr>
				<td scope="row" width="15%" NOWRAP>
					{$app_strings.LBL_EMAIL_ACCOUNTS_NAME}:
					<span class="required">
						{$app_strings.LBL_REQUIRED_SYMBOL}
					</span>
				</td>
				<td  width="35%">
					<input type="text" class="input" id="mail_name" name="mail_name" size="25" maxlength="64">
				</td>
			</tr>
			<tr id="chooseEmailProviderTD">
                <td align="left" scope="row" colspan="4">{sugar_translate module='Emails' label='LBL_CHOOSE_EMAIL_PROVIDER'}</td>
            </tr>
            <tr id="smtpButtonGroupTD">
                <td colspan="4">
                    <div id="smtpButtonGroup" class="yui-buttongroup">
                        <span id="gmail" class="yui-button yui-radio-button">
                            <span class="first-child">
                                <button type="button" name="mail_smtptype" value="gmail">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{$app_strings.LBL_SMTPTYPE_GMAIL}&nbsp;&nbsp;&nbsp;&nbsp;
                                </button>
                            </span>
                        </span>
                        <span id="yahoomail" class="yui-button yui-radio-button">
                            <span class="first-child">
                                <button type="button" name="mail_smtptype" value="yahoomail">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{$app_strings.LBL_SMTPTYPE_YAHOO}&nbsp;&nbsp;&nbsp;&nbsp;
                                </button>
                            </span>
                        </span>
                        <span id="exchange" class="yui-button yui-radio-button">
                            <span class="first-child">
                                <button type="button" name="mail_smtptype" value="exchange">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{$app_strings.LBL_SMTPTYPE_EXCHANGE}&nbsp;&nbsp;&nbsp;&nbsp;
                                </button>
                            </span>
                        </span>
                        <span id="other" class="yui-button yui-radio-button yui-button-checked">
                            <span class="first-child">
                                <button type="button" name="mail_smtptype" value="other">
                                    &nbsp;&nbsp;&nbsp;&nbsp;{$app_strings.LBL_SMTPTYPE_OTHER}&nbsp;&nbsp;&nbsp;&nbsp;
                                </button>
                            </span>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="smtp_settings">
                        <table width="100%" cellpadding="0" cellspacing="1">
                            <tr id="mailsettings1">
                                <td width="20%" scope="row" nowrap="nowrap"><span id="mail_smtpserver_label">{sugar_translate module='Emails' label='LBL_MAIL_SMTPSERVER'}</span> <span class="required" id="required_mail_smtpserver">{$app_strings.LBL_REQUIRED_SYMBOL}</span></td>
                                <td width="30%" ><slot><input type="text" id="mail_smtpserver" name="mail_smtpserver" tabindex="1" size="25" maxlength="64"></slot></td>
                                <td width="20%" scope="row" nowrap="nowrap"><span id="mail_smtpport_label">{sugar_translate module='Emails' label='LBL_MAIL_SMTPPORT'}</span></td>
                                <td width="30%" ><input type="text" id="mail_smtpport" name="mail_smtpport" tabindex="1" size="5" maxlength="5"></td>
                            </tr>
                            <tr id="mailsettings2">
                                <td width="20%" scope="row"><span id='mail_smtpauth_req_label'>{sugar_translate module='Emails' label='LBL_MAIL_SMTPAUTH_REQ'}</span></td>
                                <td width="30%">
                                    <input id='mail_smtpauth_req' name='mail_smtpauth_req' type="checkbox" class="checkbox" value="1" tabindex='1'
                                        onclick="javascript:SUGAR.email2.accounts.smtp_authenticate_field_display();">
                                </td>
                                <td width="20%" scope="row" nowrap="nowrap"><span id="mail_smtpssl_label">{$app_strings.LBL_EMAIL_SMTP_SSL_OR_TLS}</span></td>
                                <td width="30%">
                                <select id="mail_smtpssl" name="mail_smtpssl" tabindex="501" 
                                    onclick="javascript:SUGAR.email2.accounts.smtp_setDefaultSMTPPort();">{$MAIL_SSL_OPTIONS}</select>
                                </td>
                            </tr>
                            <tr id="smtp_auth1">
                                <td width="20%" scope="row" nowrap="nowrap"><span id="mail_smtpuser_label">{sugar_translate module='Emails' label='LBL_MAIL_SMTPUSER'}</span> <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span></td>
                                <td width="30%" ><slot><input type="text" id="mail_smtpuser" name="mail_smtpuser" size="25" maxlength="64" tabindex='1' ></slot></td>
                                <td >&nbsp;</td>
                                <td >&nbsp;</td>
                            </tr>
                            <tr id="smtp_auth2">
                                <td width="20%" scope="row" nowrap="nowrap"><span id="mail_smtppass_label">{sugar_translate module='Emails' label='LBL_MAIL_SMTPPASS'}</span> <span class="required">{$app_strings.LBL_REQUIRED_SYMBOL}</span></td>
                                <td width="30%" ><slot>
                                <input type="password" id="mail_smtppass" name="mail_smtppass" size="25" maxlength="64" abindex='1'>
                                <a href="javascript:void(0)" id='mail_smtppass_link' onClick="SUGAR.util.setEmailPasswordEdit('mail_smtppass')" style="display: none">{$app_strings.LBL_CHANGE_PASSWORD}</a>
                                </slot></td>
                                <td >&nbsp;</td>
                                <td >&nbsp;</td>
                            </tr>
                        </table>
                     </div>
                </td>
            </tr>
			<tr>
				<td colspan="2">
				    <input type="button" class="button" value="   {$app_strings.LBL_EMAIL_DONE_BUTTON_LABEL}   " onclick="javascript:SUGAR.email2.accounts.saveOutboundSettings();">&nbsp;
				    <input type="button" class="button" value="   {$app_strings.LBL_EMAIL_TEST_OUTBOUND_SETTINGS}   " onclick="javascript:SUGAR.email2.accounts.testOutboundSettingsDialog();">&nbsp;
				</td>
			</tr>
		</table>
	</form>
</div>

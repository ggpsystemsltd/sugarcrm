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
<form name="formEmailSettingsGeneral" id="formEmailSettingsGeneral">
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="view">
	<tr>
		<th colspan="4" align="left" colspan="4" scope="row">
			<h4>{$app_strings.LBL_EMAIL_SETTINGS_TITLE_PREFERENCES}</h4>
		</th>
	</tr>
	<tr>
		<td  scope="row" width="20%">
			{$app_strings.LBL_EMAIL_SETTINGS_CHECK_INTERVAL}:
		</td>
		<td >
			{html_options options=$emailCheckInterval.options selected=$emailCheckInterval.selected name='emailCheckInterval' id='emailCheckInterval'}
		</td>
		<td scope="row" width="20%">
			{$app_strings.LBL_EMAIL_SIGNATURES}:
		</td>
		<td >
			{$signaturesSettings} {$signatureButtons} 
        	<input type="hidden" name="signatureDefault" id="signatureDefault" value="{$signatureDefaultId}">
		</td>
	</tr>
	<tr>
		<td  scope="row">
			{$app_strings.LBL_EMAIL_SETTINGS_SEND_EMAIL_AS}:
		</td>
		<td >
			<input class="checkbox" type="checkbox" id="sendPlainText" name="sendPlainText" value="1" {$sendPlainTextChecked} />
		</td>
		<td NOWRAP scope="row">
		  {$mod_strings.LBL_SIGNATURE_PREPEND}:
		</td>
		<td NOWRAP>
		<input type="checkbox" name="signature_prepend" {$signaturePrepend}>
		</td>
	</tr>
	<tr>
		<td NOWRAP scope="row">
        	{$app_strings.LBL_EMAIL_CHARSET}:
        </td>
		<td NOWRAP>
        	{html_options options=$charset.options selected=$charset.selected name='default_charset' id='default_charset'}
        </td>
		<td NOWRAP scope="row">
        	&nbsp;
        </td>
		<td NOWRAP>
        	&nbsp;
        </td>
	</tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="view">
	<tr>
		<th colspan="4">
			<h4>{$app_strings.LBL_EMAIL_SETTINGS_TITLE_LAYOUT}</h4>
		</th>
	</tr>
	<tr>
		<td NOWRAP scope="row" width="20%">
			{$app_strings.LBL_EMAIL_SETTINGS_SHOW_NUM_IN_LIST}:
			<div id="rollover">
                            <a href="#" class="rollover">{sugar_getimage alt=$mod_strings.LBL_HELP name="helpInline" ext=".gif" other_attributes='border="0" '}<span>{$app_strings.LBL_EMAIL_SETTINGS_REQUIRE_REFRESH}</span></a>
            </div>
		</td>
		<td NOWRAP >
			<select name="showNumInList" id="showNumInList">
			{$showNumInList}
			</select>
		</td>
		<td NOWRAP scope="row" width="20%">&nbsp;</td>
		<td NOWRAP >&nbsp;</td>
	</tr>
</table>

{include file="modules/Emails/templates/emailSettingsFolders.tpl"}


</form>


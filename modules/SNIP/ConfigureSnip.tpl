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

{literal}
<script type='text/javascript' src='include/javascript/overlibmws.js'></script>
<style>
#snip_title {
	float:left;
    margin-bottom:5px;
    font-size:15px;
    display:inline;
}
#snip_title_error {
	color:red;
	font-weight:bold;
}
#snip_summary {
	float:left;
    margin-bottom:10px;
}
#snip_summary_error {
	width:100%;
	background-color:#ffaa99;
	margin-top:3px;
	padding:2px;
	font-weight:bold;
	height:13px;
}

div.snipTitle{
	font-size:28px;
	color:#333333;
	letter-spacing:3px
}
.snipDesc{
	width:auto;
	margin:6px;
	margin-bottom:8px;
}
.snipLicenseWrapper{
	margin:0;
	width:auto;
}

.snipLicenseSubWrapper{
	border: 1px solid black;
	padding: 4px 0 4px 4px;
	width:80%;
	margin:auto;
	margin-top:4px;
}

.snipLicense{
	width:auto;
	color:#7A7A7A;
	overflow:auto;
	height:300px
}
.snipUiWrapper{
	margin:auto;
	width:580px;
	height:47px;
	margin-top:7px;
}
.snipCheckboxWrapper{
	float:left;
	width:375px;
	margin-top:10px
}
.snipCheckbox{
	margin-left:5px
}
.snipButtonWrapper{
	float:right
}
.snipEnableButton{
	height:40px;width:200px
}
.snipCenterButtonWrapper{
	margin:auto;
	height:40px;
	width:200px;
	margin-bottom:10px;
	margin-top:-2px
}

div.snipError{
	position:relative;
	margin:2px 8px 0px 8px;
	background-color:#ffaa99;
	padding:2px;
	padding-left:4px;
	line-height:16px;

}
</style>
{/literal}
{$TITLE}
	{if $SNIP_STATUS!='notpurchased'}
	<table class="actionsContainer" border="0" cellpadding="0" cellspacing="1" width="100%">
	<tbody>
	    <tr>
	        <td>
	            <form method="post">

	            {if $SNIP_STATUS =='purchased'}
	                <input title="" class="button" name="disable" value="  {$MOD.LBL_SNIP_BUTTON_DISABLE}  " type="submit">
	                <input type='hidden' value='disable_snip' name='snipaction'>
	            {else}
	                <input title="" class="button primary" name="tryagain" value="  {$MOD.LBL_SNIP_BUTTON_RETRY}  " onclick='window.location.reload()' type="button">
	            {/if}

	            &nbsp;<input title="" onclick="document.location.href='index.php?module=Administration&amp;action=index'" class="button" name="cancel" value="  {$MOD.LBL_CANCEL_BUTTON_TITLE}  " type="button">

	            </form>
	        </td>
	    </tr>
	</tbody></table>
{/if}

	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="edit view">
		<tr>
		<td>
			{if $EXTRA_ERROR != ''}
				<div style='color:red;font-weight:bold;margin-left:10px;'>
					{$EXTRA_ERROR}
				</div>
			{/if}

			{if $SNIP_STATUS=='notpurchased'}
				<div class='snipDesc'>
					{$MOD.LBL_SNIP_SUMMARY}
				</div>


				<div class='snipLicenseWrapper'>
					<div class = 'snipLicenseSubWrapper'>
						<div class='snipLicense'>{$LICENSE}</div>
					</div>
					<div class='snipUiWrapper'>
						<div class='snipCheckboxWrapper'>
							<input type='checkbox' onchange="document.getElementById('enableSnipButton').disabled = !document.getElementById('agreementCheck').checked;" id='agreementCheck' class='snipCheckbox'>
							<label for='agreementCheck' class='snipCheckbox'>{$MOD.LBL_SNIP_AGREE}</label>
						</div>
						<div class='snipButtonWrapper'>
						<form method="post">
							<input type='submit' class='snipEnableButton' disabled value='{$MOD.LBL_SNIP_BUTTON_ENABLE}' id='enableSnipButton'>
							<input type='hidden' name='snipaction' value='enable_snip'>
						</form>
						</div>
					</div>

					</div>

			{else}


			<table border="0" cellpadding="0" cellspacing="1" width="100%">
				<tr width="50%">
					<td scope="row">
						{$MOD.LBL_SNIP_STATUS}:&nbsp;{sugar_help text=$MOD.LBL_SNIP_MOUSEOVER_STATUS}
					</td>
					<td>
						<form name='ToggleSnipStatus' method="POST" action="index.php?module=SNIP&action=ConfigureSnip">
						<input type='hidden' id='save_config' name='save_config' value='0'/>
						{if $SNIP_STATUS == 'purchased'}
							<div id='snip_title'><span style='color:green;font-weight:bold'>{$MOD.LBL_SNIP_STATUS_OK}</span></div>
							<div style='clear:both'></div>
							<div id='snip_summary'>{$MOD.LBL_SNIP_STATUS_OK_SUMMARY}</div>
						{elseif $SNIP_STATUS == 'down'}
							<div id='snip_title'><span style='color:red;font-weight:bold'>{$MOD.LBL_SNIP_STATUS_FAIL}</span></div>
							<div style='clear:both'></div>
							<div id='snip_summary'>{$MOD.LBL_SNIP_STATUS_FAIL_SUMMARY}</div>
						{elseif $SNIP_STATUS == 'purchased_error'}
							<div id='snip_title'><span style='color:red;font-weight:bold'>{$MOD.LBL_SNIP_STATUS_ERROR}</span></div>
							<div style='clear:both'></div>
							<div id='snip_summary'>{$SNIP_ERROR_MESSAGE}<br>
							</div>
						{/if}
						</form>
						<br>
					</td>

					<td scope="row" style='width:180px;background-color:white'>
						<div style='width:auto;margin-top:-5px;height:20px;padding:5px 5px 7px 5px;background-color:#EEEEEE'>
							{$MOD.LBL_SNIP_SUGAR_URL}:&nbsp;{sugar_help text=$MOD.LBL_SNIP_MOUSEOVER_INSTANCE_URL}
						</div>
					</td>
					<td>
						{$SUGAR_URL}
					</td>

				</tr>
				<tr>

					<td scope="row" style='width:100px'>
						{$MOD.LBL_SNIP_EMAIL}:&nbsp;{sugar_help text=$MOD.LBL_SNIP_MOUSEOVER_EMAIL}
					</td>
					<td>
						{$SNIP_EMAIL}
					</td>

					<td style='width:170px'></td>
				</tr>
			</table>
			{/if}

			{if $SNIP_STATUS == 'purchased_error' || $SNIP_STATUS == 'down'}
			<div style='margin-left:4px;margin-top:4px;margin-bottom:7px'> <a href='http://www.sugarcrm.com/crm/case-tracker/submit.html?lsd=supportportal&tmpl=' target='_blank'>{$MOD.LBL_SNIP_SUPPORT}</a></div>
			{/if}

		</td>
		</tr>
	</table>
<!--
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
-->
<!-- BEGIN: main -->
<div class="dashletPanelMenu" style="width: 500px; margin: 20px auto;">
<div class="hd"><div class="tl"></div><div class="hd-center"></div><div class="tr"></div></div>
<div class="bd" style="padding-top: 0px; padding-bottom: 0;">
<div class="ml"></div>
<div class="bd-center">
<form name="EditView" method="POST" action="index.php?module=Users&action=SaveTimezone&SaveTimezone=True">
	<input type="hidden" value="{$USER_ID}" name="record">
	<input type="hidden" name="module" value="Users">
	<input type="hidden" name="action" value="SaveTimezone">
	<input type="hidden" name="SaveTimezone" value="true">

<table class="subMenuTD" style="padding: 8px; border: 2px solid #999; background-color: #fff;" cellpadding="0" cellspacing="2" border="0" align="center" width="440">
	<tr>
		<td colspan="2" width="100%"></td>
	</tr>
	<tr>
		<td colspan="2" width="100%" style="font-size: 12px; padding-bottom: 5px;">
			<table width="100%" border="0">
			<tr>
				<td colspan="2"><slot>{$MOD.LBL_PICK_TZ_DESCRIPTION}</slot></td>
			</tr>
			</table>
			<br><br>
			<slot><select tabindex='3' name='timezone'>{html_options options=$TIMEZONEOPTIONS selected=$TIMEZONE_CURRENT}</select></slot>
			<input	title="{$APP.LBL_SAVE_BUTTON_TITLE}"
					accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"
					class="button primary"
					type="submit"
					name="button"
					value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " ><br />
			{* <span class="dateFormat">{$MOD.LBL_DST_INSTRUCTIONS}</span> *}
		</td>
	</tr>
</table>
</form>
</div>
<div class="mr"></div>
</div>
<div class="ft"><div class="bl"></div><div class="ft-center"></div><div class="br"></div></div>
</div>
{literal}
<script type="text/javascript" language="JavaScript">
<!--
lookupTimezone = function() {
    var success = function(data) {
        eval(data.responseText);
        if(typeof userTimezone != 'undefined') {
            document.EditView.timezone.value = userTimezone;
        }
    }

    var now = new Date();
    now = new Date(now.toString()); // reset milliseconds
    var nowGMTString = now.toGMTString();
    var nowGMT = new Date(nowGMTString.substring(0, nowGMTString.lastIndexOf(' ')));
    offset = ((now - nowGMT) / (1000 * 60));
    url = 'index.php?module=Users&action=SetTimezone&to_pdf=1&userOffset=' + offset;
    var cObj = YAHOO.util.Connect.asyncRequest('GET', url, {success: success, failure: success});
}
YAHOO.util.Event.addListener(window, 'load', lookupTimezone);
-->
</script>
{/literal}
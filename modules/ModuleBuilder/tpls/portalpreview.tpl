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

<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN">
<html {$langHeader}>
<head>
<link REL="SHORTCUT ICON" HREF="include/images/sugar_icon.ico">

<title>SugarCRM - Commercial Open Source CRM</title>
{if $useCustomFile}
<style type="text/css">@import url("custom/portal/custom/style.css");</style>
{else}
<style type="text/css">@import url("portal/themes/Sugar/style.css?s=&c=");</style>
{/if}

<link href="portal/themes/Sugar/navigation.css?s=&c=" rel="stylesheet" type="text/css" />


</head>

<body>

<div id='moduleLinks'>
				<ul id="tabRow"><div style="float: right;">
													<a href="javascript:void(0)" id="My AccountHandle">{$mod.LBL_MY_ACCOUNT}</a>
							 | 													<a href="javascript:void(0)" id="LogoutHandle">{$mod.LBL_LOGOUT}</a>

													
					</div>
																<li class=otherTab><a href="javascript:void(0)" class=otherTab>{$mod.LBL_HOME}</a></li>
																<li class=currentTab><a href="javascript:void(0)" class=currentTab>{$mod.LBL_CASES}</a></li>
																<li class=otherTab><a href="javascript:void(0)" class=otherTab>{$mod.LBL_NEWSLETTERS}</a></li>
																<li class=otherTab><a href="javascript:void(0)" class=otherTab>{$mod.LBL_BUG_TRACKER}</a></li>
				</ul>
					

</div>

<div id='shortCuts'>
			<a class='link' href='javascript:void(0)'>{$mod.LBL_CREATE_NEW}</a>
		 | 			<a class='link' href='javascript:void(0)'>{$mod.LBL_LIST}</a>
			</div>
<!-- crmprint --><p><table width='100%' cellpadding='0' cellspacing='0' border='0' class='moduleTitle'><tr><td valign='top'>
<h2>{$mod.LBL_CASES}</h2></td>
</tr></table>
</p><form id="CaseEditView" name="CaseEditView" method="POST" action="index.php" onsubmit='return false'>

<input type="hidden" name="module" value="Cases">
<input type="hidden" name="id" value="">
<input type="hidden" name="action" value="Save">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td>
			<input title="Save" class="button" type="submit" name="button" value="  {$mod.LBL_BTN_SAVE}  " > 
			<input title="Cancel"  class="button" type="submit" name="button" value="  {$mod.LBL_BTN_CANCEL}  ">
		</td>
		<td align="right" nowrap><span class="required"></span> </td>
		<td align='right'></td>

	</tr>
</table>
<table width='100%' border='0' cellspacing='1' cellpadding='0'  class='detail view'>
<tr>
					<td width='12.5%' scope='row'>
							{$mod.LBL_NUMBER} 					</td>
		<td width='37.5%' class='tabDetailViewDF' colspan='4'>
												


									</td>
	</tr>
<tr>

					<td width='12.5%' scope='row'>
							{$mod.LBL_PRIORITY} 					</td>
		<td width='37.5%' class='tabDetailViewDF' colspan='4'>
												
<select name='priority'>
	<option value='P1'>
		{$mod.LBL_HIGH}
	</option>
	<option value='P2'>
		{$mod.LBL_MEDIUM}
	</option>

	<option value='P3'>
		{$mod.LBL_LOW}
	</option>
</select>

									</td>
	</tr>
<tr>
					<td width='12.5%' scope='row'>
							{$mod.LBL_SUBJECT} <span class="required">*</span>					</td>

		<td width='37.5%' class='tabDetailViewDF' colspan='4'>
												
<input type='text' name='name' size='60' value=''>

									</td>
	</tr>
<tr>
					<td width='12.5%' scope='row'>
							{$mod.LBL_DESCRIPTION} 					</td>
		<td width='37.5%' class='tabDetailViewDF' colspan='4'>

												
<textarea name='description' rows='15' cols='100'></textarea>

									</td>
	</tr>
</table>
{literal}
</form><script type="text/javascript">
requiredTxt = 'Missing required field:';
invalidTxt = 'Invalid Value:';
</script><!-- crmprint --><div id='footer'><!--end body panes-->

	<table cellpadding='0' cellspacing='0' width='100%' border='0' class='underFooter'><tr><td align='center' class='copyRight'>{$app.LBL_SUGAR_COPYRIGHT}<br /><A href='http://www.sugarcrm.com' target='_blank'><img style='margin-top: 2px' border='0'  width='106' height='23' src='include/images/poweredby_sugarcrm.png' alt=$mod_strings.LBL_POWERED_BY_SUGAR></a>

</td></tr></table></div>
</body></html>
{/literal}
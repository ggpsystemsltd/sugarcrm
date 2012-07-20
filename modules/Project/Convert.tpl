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

<table width="100%" cellpadding="0" cellspacing="0" border="0" >
	<tr>
		<td>
			<form name="EditView" id="EditView" method="post" action="index.php">
			<input type="hidden" name="module" value="Project" />
			<input type="hidden" name="record" value="{$ID}" />
			<input type="hidden" name="team_id" value="{$TEAM}" />
			<input type="hidden" name="to_pdf" id="to_pdf" value="1">
			<input type="hidden" name="action" id="action" value="Save" />
			<input type="hidden" name="save_type" value="{$SAVE_TYPE}" />
			{foreach from=$PROJECT_FORM item="PROJECT" key="PROJECT_KEY"}
				<input type="hidden" name="{$PROJECT_KEY}" value="{$PROJECT}" />
			{/foreach}
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
				<tr>
					<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">			
					<tr>				
						<td scope="row"><span sugar='slot1'>{$SAVE_TO_LBL}<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span></span sugar='slot'> <input type="text" name="{$SAVE_TO}_name" value="{$NAME}"  /></td>
						<td align="right">
							<input type="submit" name="button" value="  {$SAVE_BUTTON}  "
							       class="button" tabindex="6"
								   onclick="this.form.module.value='Project'; this.form.action.value='Save'; this.form.record.value='{$ID}';return check_form('EditView');"
								   title="{$SAVE_BUTTON}" />
						</td>
					</table>
			</form>
		</td>
	</tr>
</table>
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
			<form enctype="multipart/form-data" id="FTSFormAdvanced" name="FTSFormAdvanced" method="POST" action="index.php">
			<input type="hidden" name="module" id="module" value="KBDocuments">
			<input type="hidden" name="action" id="action" value="SearchHome">
			<input type="hidden" name="mode" id="mode" value="advanced">
            <input type="hidden" value="true" name="query" id="query">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view search kb">

					<tr>
				        <td><b>{$MOD.LBL_SEARCH_WITHIN}</b></td>
				        <td><select name='saved_search' id='saved_search'  value='{$saved_search}'>{$SAVED_SEARCH_OPTIONS}</select></td>
					</tr>
					<tr>
				        <td><b>{$MOD.LBL_SEARCH_WITHIN}</b></td>
				        <td><select name='canned_search' id='canned_search'  value='{$canned_search}'>{$CANNED_SEARCH_OPTIONS}</select></td>
					</tr>
					<tr>
				        <td><b>{$MOD.LBL_CONTAINING_THESE_WORDS}</b></td>
				        <td><input type='text' id='searchText_include' class='text' name='searchText_include' size='50'"  value='{$searchText_include}'></td>
					</tr>
					<tr>
				        <td><b>{$MOD.LBL_EXCLUDING_THESE_WORDS}</b></td>
				        <td><input type='text' id='searchText_exclude' class='text' name='searchText_exclude' size='50'"  value='{$searchText_exclude}'><br></td>
					</tr>
					<tr>
				        <td><b>{$MOD.LBL_UNDER_THIS_TAG}</b></td>
				        <td><input type='text' id='tags' class='text' name='tags' size='50'"  value='{$tags}'><br></td>
					</tr>
					<tr>
				        <td colspan='4'><input type='submit' class='button' name='fts_search_ADV' id='fts_search_ADV' value='Search'></td>
					</tr>
					<tr>
				        <td colspan='4'>&nbsp;</td>
					</tr>
					<tr>
				        <td colspan='4'>&nbsp;</td>
					</tr>


					<tr>
						<td width="15%" scope="row"><span sugar='slot2'>{$MOD.LBL_DOC_NAME}&nbsp;<span class="required"></span></span sugar='slot'></td>
						<td width = "35%" ><span sugar='slot2b'><input name='kbdocument_name' tabindex='1' type='text' size='50' value="{$kbdocument_name}"></span sugar='slot'></td>
				        <td width="15%" scope="row"><span sugar='slot4'>{$MOD.LBL_TIMES_VIEWED}</td>
						<td width="35%" ><span sugar='slot4b'><input name='viewed' {$DISABLED} tabindex='2' type='text' value='{$viewed}'></span sugar='slot'></td>

					</tr>
					<tr>
						<td valign="top" scope="row"><span sugar='slot15b'>{$MOD.LBL_KBDOC_SUBJECT}</span sugar='slot'></td>
						<td colspan="3"  ><span sugar='slot16'><input type='text' tabindex='3' name='description' tabindex='10' cols="120" rows="1">{$description}</textarea></span sugar='slot'></td>
					</tr>

					<tr>
						<td valign="top" scope="row"><span sugar='slot9'>{$MOD.LBL_DOC_STATUS}</span sugar='slot'></td>
						<td ><span sugar='slot9b'><select tabindex='1' name='status_id'>{$STATUS_OPTIONS}</select></span sugar='slot'></td>
						<td width="18%" scope="row"><span sugar='slot6'>{$MOD.LBL_DET_TEMPLATE_TYPE}</span sugar='slot'></td>
				        <td width="35%" ><span sugar='slot6b'><select id="template_type" name="template_type" tabindex='2'>{$TEMPLATE_TYPE_OPTIONS}</select></span sugar='slot'></td>
					</tr>
					<tr>
						<td scope="row"><span sugar='slot19'>{$MOD.LBL_KBDOC_APPROVED_BY}</span sugar='slot'></td>
						<td  ><span sugar='slot19b'>
							<input class="sqsEnabled" tabindex="1" autocomplete="off" id="assigned_user_name" name='assigned_user_name' type="text" value="{$assigned_user_name}">
							<input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$assigned_user_id}" />
							<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" type="button" tabindex='1' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn_user
									onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_users_popup_request_data});' />
							</span sugar='slot'>
						</td>
						<td valign="top" scope="row"><span sugar='slot10'>{$APP.LBL_TEAM} </span sugar='slot'></td>
						<td ><span sugar='slot10b'><input class="sqsEnabled" tabindex="2" autocomplete="off" id="team_name" name='team_name' type="text" value="{$team_name}"><input id='team_id' name='team_id' type="hidden" value="{$team_id}" />
						<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn_team
								onclick='open_popup("Teams", 600, 400, "", true, false, {$encoded_team_popup_request_data});' /></span sugar='slot'>
						</td>
					</tr>
				   	<tr>
						<td scope="row"><span sugar='slot11'>{$MOD.LBL_PUBLISHED_AFTER}&nbsp;</span sugar='slot'></td>
                        {capture assign="other_attributes"}align="absmiddle" id="active_date_trigger_after"{/capture}
						<td scope="row"><span sugar='slot11b'><input onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='active_date_after' id='active_date_field_after' type="text" size='11' value="{$active_date_after}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes} <span class="dateFormat">{$USER_DATE_FORMAT}</span></td>

						<td scope="row"><span sugar='slot12'>{$MOD.LBL_EXPIRES_AFTER}</span sugar='slot'></td>
                        {capture assign="other_attributes"}align="absmiddle" id="exp_date_trigger_after"{/capture}
						<td ><span sugar='slot12b'><input  onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='exp_date_after' id='exp_date_field_after' type="text" size='11' maxlength='10' value="{$exp_date_field_after}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes} <span class="dateFormat">{$USER_DATE_FORMAT}</span></span sugar='slot'></td>
					</tr>
				   	<tr>
						<td scope="row"><span sugar='slot13'>{$MOD.LBL_PUBLISHED_BEFORE}&nbsp;</span sugar='slot'></td>
                        {capture assign="other_attributes"}align="absmiddle" id="active_date_trigger_before"{/capture}
						<td scope="row"><span sugar='slot13b'><input onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='active_date_before' id='active_date_field_before' type="text" size='11' value="{$active_date_before}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes} <span class="dateFormat">{$USER_DATE_FORMAT}</span></td>

                        {capture assign="other_attributes"}align="absmiddle" id="exp_date_trigger_before"{/capture}
						<td scope="row"><span sugar='slot14'>{$MOD.LBL_EXPIRES_AFTER}</span sugar='slot'></td>
						<td ><span sugar='slot14b'><input  onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='exp_date_before' id='exp_date_field_before' type="text" size='11' maxlength='10' value="{$exp_date_field_before}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes} <span class="dateFormat">{$USER_DATE_FORMAT}</span></span sugar='slot'></td>
					</tr>
				</table>
				</form>


<script type="text/javascript" language="JavaScript">
	format = "{$CALENDAR_DATEFORMAT}";
{literal}
	Calendar.setup ({
		inputField : "active_date_field_after", ifFormat : format, showsTime : false, button : "active_date_trigger_after", singleClick : true, step : 1, weekNumbers:false
	});

	Calendar.setup ({
		inputField : "exp_date_field_after", ifFormat : format, showsTime : false, button : "exp_date_trigger_after", singleClick : true, step : 1, weekNumbers:false
	});

	Calendar.setup ({
		inputField : "active_date_field_before", ifFormat : format, showsTime : false, button : "active_date_trigger_before", singleClick : true, step : 1, weekNumbers:false
	});

	Calendar.setup ({
		inputField : "exp_date_field_before", ifFormat : format, showsTime : false, button : "exp_date_trigger_before", singleClick : true, step : 1, weekNumbers:false
	});
	</script>
{/literal}

{$JAVASCRIPT}

</div>

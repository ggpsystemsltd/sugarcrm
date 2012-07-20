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
{if !empty($ERROR_MESSAGE)}
<font color='red'>{$ERROR_MESSAGE}</font>
{else}
{$TITLE}
{/if}
<br>
<br>
<br>
<br>
<form name="reassign_team" id="reassign_team">
<input type="hidden" name="module" id="module" value="Teams">
<input type="hidden" name="action" id="action" value="ReassignTeams">
<input type="hidden" name="teams" id="teams" value="{$TEAMS}">
<table class="edit view" cellspacing="1" cellpadding="0">
<tr>
<td scope="row" width="10%" NOWRAP>
{$MOD_STRINGS.LBL_NEW_FORM_TITLE}: <span class="required">*</span>
</td>
<td width="90%">
<input autocomplete='off' class='sqsEnabled' type='text' name='team_name' id='team_name' size='30' maxlength='' value=''> 
<input type="hidden"  name='team_id' id='team_id' value=''>
<input type="button" name="btn_team_name" tabindex="" title="{$APP_STRINGS.LBL_SELECT_BUTTON_TITLE}" class="button" value="{$APP_STRINGS.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("Teams", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"reassign_team","field_to_name_array":{"id":"team_id","name":"team_name"}}{/literal}, "single", true);'>
<input type="button" name="btn_clr_team_name" tabindex="" title="{$APP_STRINGS.LBL_CLEAR_BUTTON_TITLE}" class="button" onclick="this.form.team_name.value = ''; this.form.id_team_name.value = '';" value="{$APP_STRINGS.LBL_CLEAR_BUTTON_LABEL}">
</td>
</tr>
</table>
<br>
<br>
<input type="submit" class="button"  title="{$MOD_STRINGS.LBL_REASSIGN_TEAM_BUTTON_TITLE}" value="{$MOD_STRINGS.LBL_REASSIGN_TEAM_BUTTON_LABEL}" onclick="if(check_form('reassign_team')) {ldelim} return confirm('{$MOD_STRINGS.LBL_CONFIRM_REASSIGN_TEAM_LABEL}'); {rdelim} else {ldelim} return false; {rdelim}">
<input type="submit" class="button" accesskey="{$APP_STRINGS.LBL_CANCEL_BUTTON_KEY}" title="{$APP_STRINGS.LBL_CANCEL_BUTTON_TITLE}" value="{$APP_STRINGS.LBL_CANCEL_BUTTON_LABEL}" onclick="this.form.action.value='index';">
</form>


{literal}
<script language="javascript">
if(typeof sqs_objects == 'undefined') {
   var sqs_objects = new Array();
}
   
sqs_objects['reassign_team_team_name']={"form":"reassign_team","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name","team_id"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};
{/literal}
addToValidate('reassign_team', 'team_name', 'varchar', true, '{$MOD_STRINGS.LBL_NEW_FORM_TITLE}');
enableQS();
</script>
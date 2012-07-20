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

<form name='form_{$id}' id='form_{$id}'>
<div class="dashletNonTable" style='white-space:nowrap;'>
  <table border=0 cellspacing=0 cellpadding=2>
    <tr>
      <td nowrap="nowrap"><span id='more_img_{$id}'>{$more_img}</span><span id='less_img_{$id}' style="display:none;">{$less_img}</span> <b>{$user_name}</b>&nbsp;</td>
      <td style="padding-right: 5px;"><input id="text" name="text" type="text" size='25' maxlength='100' value="" title="{sugar_translate label='LBL_POST_TITLE' module='SugarFeed'} {$user_name} "/></td>
      <td nowrap="nowrap">
      <input type="submit" value="{$LBL_POST}" class="button" style="vertical-align:top" onclick="SugarFeed.pushUserFeed('{$id}'); return false;"></td>
    </tr>
</table>
<div id='more_{$id}' style='display:none;padding-top:5px'>
<table>
<tr>
    <td>{html_options name='link_type' options=$link_types}</td>
    <td><input type='text' name='link_url' title="{sugar_translate label='LBL_URL_LINK_TITLE' module='SugarFeed'}"  size='30'/></td>
</tr>
<tr>
    <td><b>{$LBL_TO}</b></td>
    <td nowrap="nowrap">
        <input type="text" name="team_name" id="team_name_{$id}" class="sqsEnabled" value="{$team_name}" size="15"  title="{sugar_translate label='LBL_TEAM_VISIBILITY_TITLE' module='SugarFeed'}" />
        <input type="hidden" name="team_id" id="team_id_{$id}" value="{$team_id}"/>
        <input type="button" value="{$LBL_SELECT}" class='button' type="button" style="vertical-align:top" onclick='open_popup("Teams", 600, 400, "", true, false, {ldelim}"call_back_function":"set_return","form_name":"form_{$id}","field_to_name_array":{ldelim}"id":"team_id","name":"team_name"{rdelim}{rdelim}, "single", true);' />
    </td>
</tr>
</table>
</div>
</div>

</form>

<form name='SugarFeedReplyForm_{$id}' id='SugarFeedReplyForm_{$id}'>
<input type='hidden' name='parentFeed' value=''>
<div style='white-space:nowrap; display: none;'>
 <table border=0 cellspacing=0 cellpadding=2>
    <tr>
      <td nowrap="nowrap"><b>{$user_name}</b>&nbsp;</td>
      <td style="padding-right: 5px;"><input id="text" name="text" type="text" size='25' maxlength='100' value="" /></td>
      <td nowrap="nowrap">
      <input type="submit" value="{$LBL_POST}" class="button" style="vertical-align:top" onclick="SugarFeed.replyToFeed('{$id}'); return false;"></td>
    </tr>
</table>
</div>
</form>


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
<form name="advancedSearchForm" id="advancedSearchForm">
<table cellpadding="4" cellspacing="0" border="0" id='advancedSearchTable'>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td class="advancedSearchTD">
			{$app_strings.LBL_EMAIL_SUBJECT}:<br/>
			<input type="text" class="input" name="name" id="searchSubject" size="20">
		</td>
	</tr>
	<tr>
		<td class="advancedSearchTD">
			{$app_strings.LBL_EMAIL_FROM}:<br/>
			<input type="text" class="input" name="from_addr" id="searchFrom" size="20">
		</td>
	</tr>
	<tr>
		<td class="advancedSearchTD">
			{$app_strings.LBL_EMAIL_TO}:<br/>
			<input type="text" class="input" name="to_addrs" id="searchTo" size="20">
		</td>
	</tr>
    <tr class="toggleClass visible-search-option">
        <td ><a href="javascript:void(0);" onclick="SE.search.toggleAdvancedOptions();">{$mod_strings.LBL_MORE_OPTIONS}</a></td>
        <td>&nbsp;</td>
    </tr>
	<tr class="toggleClass yui-hidden">
		<td class="advancedSearchTD" style="padding-bottom: 2px">
			{$app_strings.LBL_EMAIL_SEARCH_DATE_FROM}:&nbsp;<i>({$dateFormatExample})</i><br/>
			<input name='searchDateFrom' id='searchDateFrom' onblur="parseDate(this, '{$dateFormat}');" maxlength='10' size='11' value="" type="text">&nbsp;
			{sugar_getimage name="jscalendar" ext=".gif" alt=$app_strings.LBL_ENTER_DATE other_attributes='align="absmiddle" id="searchDateFrom_trigger" '}
		</td>
	</tr>

	<tr class="toggleClass yui-hidden">
		<td class="advancedSearchTD">
			{$app_strings.LBL_EMAIL_SEARCH_DATE_UNTIL}:&nbsp;<i>({$dateFormatExample})</i><br/>
			<input name='searchDateTo' id='searchDateTo' onblur="parseDate(this, '{$dateFormat}');" maxlength='10' size='11' value="" type="text">&nbsp;
			{sugar_getimage name="jscalendar" ext=".gif" alt=$app_strings.LBL_ENTER_DATE other_attributes='align="absmiddle" id="searchDateTo_trigger" '}		
		</td>
	</tr>

    <tr class="toggleClass yui-hidden">
        <td class="advancedSearchTD">
        {sugar_translate label="LBL_ASSIGNED_TO"}: <br/>
        <input name="assigned_user_name" class="sqsEnabled" tabindex="2" id="assigned_user_name" size="" value="{$currentUserName}" type="text" >
        <input name="assigned_user_id" id="assigned_user_id" value="{$currentUserId}" type="hidden">      
        
        <a href="javascript:void(0);">
            <img src="{sugar_getimagepath file='select.gif'}" align="absmiddle" border="0" alt=$mod_strings.LBL_EMAIL_SELECTOR onclick='open_popup("Users", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"advancedSearchForm","field_to_name_array":{"id":"assigned_user_id","name":"assigned_user_name"}}{/literal}, "single", true);'>
        </a>
        </td>
    </tr>
      <tr class="toggleClass yui-hidden">
        <td class="advancedSearchTD">
        {$mod_strings.LBL_HAS_ATTACHMENT}<br/>
        {html_options options=$attachmentsSearchOptions name='attachmentsSearch' id='attachmentsSearch'} 
        </td>
    </tr>
    <tr class="toggleClass yui-hidden">
        <td NOWRAP class="advancedSearchTD">
        {$mod_strings.LBL_EMAIL_RELATE}:<br/>
        {html_options options=$linkBeansOptions name='data_parent_type_search' id='data_parent_type_search'}
        <input id="data_parent_id_search" name="data_parent_id_search" type="hidden" value="">
        <br/><br/>
        <input class="sqsEnabled" id="data_parent_name_search" name="data_parent_name_search" type="text" value="">
        <a href="javascript:void(0);"><img src="{sugar_getimagepath file='select.gif'}" align="absmiddle" border="0" alt=$mod_strings.LBL_EMAIL_SELECTOR onclick="SUGAR.email2.composeLayout.callopenpopupForEmail2('_search',{ldelim}'form_name':'advancedSearchForm'{rdelim} );">
         </a>
        </td>
    </tr>
     <tr class="toggleClass yui-hidden">
        <td class="visible-search-option"><a href="javascript:void(0);" onclick="SE.search.toggleAdvancedOptions();">{$mod_strings.LBL_LESS_OPTIONS}</a></td>
        <td>&nbsp;</td>
    </tr>
	<tr>
		<td NOWRAP>
			<br />&nbsp;<br />
			<input type="button" id="advancedSearchButton" class="button" onclick="SUGAR.email2.search.searchAdvanced()" value="   {$app_strings.LBL_SEARCH_BUTTON_LABEL}   ">&nbsp;
			<input type="button" class="button" onclick="SUGAR.email2.search.searchClearAdvanced()" value="   {$app_strings.LBL_CLEAR_BUTTON_LABEL}   ">
		</td>
	</tr>
</table>
</form>
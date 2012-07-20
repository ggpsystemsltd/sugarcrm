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
<form name='search_form'>
<input type='hidden' name='module' value='Reports'/>
<input type='hidden' name='action' value='index'/>
<input type='hidden' name='query' value='true'/>
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom: 4px" class="edit view">
<tr><td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 4px; margin-bottom: 4px;">
        <tr valign='top'>
    		<td scope="row" noWrap><span sugar='slot1'>{$MOD.LBL_TITLE}:</td><td ><input type=text tabindex='1' size="20" name="name" class=dataField  value="{$NAME}" /></span sugar='slot'></td>
    		<td scope="row" noWrap><span valign='top' sugar='slot1b'>{$MOD.LBL_MODULE}:</td><td ><select size="3" tabindex='1' name='report_module[]' multiple="multiple">{$MODULES}</select></span sugar='slot'></td>
			<td scope="row" noWrap><span valign='top' sugar='slot1b'>{$MOD.LBL_REPORT_TYPE}:</span sugar='slot'></td><td ><select size='3' name='report_type[]' multiple='multiple'>{$REPORT_TYPES}</select></td>
		</tr>
    	<tr valign='top'>
    		<td scope="row" colspan='2'>{$APP.LBL_CURRENT_USER_FILTER}&nbsp;&nbsp;<input name='current_user_only' tabindex='1' onchange='this.form.submit();' class="checkbox" type="checkbox" {$CURRENT_USER_ONLY}></td>
    		<td scope="row" noWrap valign='top'><span sugar='slot2'>{$APP.LBL_ASSIGNED_TO}</td><td ><select size="3" tabindex='1' name='assigned_user_id[]' multiple="multiple">{$USER_FILTER}</select></span sugar='slot'></td>
	   </tr>
	</table>
</td></tr>
</table>
<input tabindex='2' title='{$APP.LBL_SEARCH_BUTTON_TITLE}' onclick='SUGAR.savedViews.setChooser()' class='button' type='submit' name='button' value='{$APP.LBL_SEARCH_BUTTON_LABEL}' id='search_form_submit'/>
<input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' value=' {$APP.LBL_CLEAR_BUTTON_LABEL} ' id="search_form_clear"/>
</form>
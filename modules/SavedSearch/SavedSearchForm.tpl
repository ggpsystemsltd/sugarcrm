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

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top: 0px none; margin-bottom: 4px" >
<tr valign='top'>
	<td width='34%' align='left' rowspan='4' colspan='2'>
		<input id='displayColumnsDef' type='hidden' name='displayColumns'>
		<input id='hideTabsDef' type='hidden' name='hideTabs'>
		{$columnChooser}
		<br>
	</td>
	<td scope='row' align='left' width='10%'>
		{sugar_translate label='LBL_ORDER_BY_COLUMNS' module='SavedSearch'}

	</td>
	<td width='23%'>
		<select name='orderBy' id='orderBySelect'>
		</select>
	</td>
	<td scope='row' width='10%'>
		{sugar_translate label='LBL_DIRECTION' module='SavedSearch'}
	</td>
	<td width='23%'>
		<div><input id='sort_order_desc_radio' type='radio' name='sortOrder' value='DESC' {if $selectedSortOrder == 'DESC'}checked{/if}>&nbsp;<span onclick='document.getElementById("sort_order_desc_radio").checked = true' style="cursor: pointer; cursor: hand">{$MOD.LBL_DESCENDING}</span></div>
		
		<div><input id='sort_order_asc_radio' type='radio' name='sortOrder' value='ASC' {if $selectedSortOrder == 'ASC'}checked{/if}>&nbsp;<span onclick='document.getElementById("sort_order_asc_radio").checked = true' style="cursor: pointer; cursor: hand">{$MOD.LBL_ASCENDING}</span>
		</div>
	</td>
	</tr>

</table>
<script>
	SUGAR.savedViews.columnsMeta = {$columnsMeta};
	columnsMeta = {$columnsMeta};
	saved_search_select = "{$SAVED_SEARCH_SELECT}";
	selectedSortOrder = "{$selectedSortOrder|default:'DESC'}";
	selectedOrderBy = "{$selectedOrderBy}";


{literal}
	//this populates the label that shows the name of the current saved view
	//The label is located under the update/delete buttons
	function fillInLabels(){
		//this javascript runs and populates values in savedSearchForm.tpl
		x = document.getElementById('saved_search_select');
		if ((typeof(x) != 'undefined' && x != null) && x.selectedIndex !=0) {
			document.getElementById('curr_search_name').innerHTML = '"'+x.options[x.selectedIndex].text+'"';
			document.getElementById('ss_update').disabled = false;
			document.getElementById('ss_delete').disabled = false;
		}else{
			document.getElementById('ss_update').disabled = true;
			document.getElementById('ss_delete').disabled = true;
			document.getElementById('curr_search_name').innerHTML = '';
		}
	}
	//call scripts that need to get run onload of this form.  This function is called when image
	//to collapse/show subpanels is loaded
	function loadSSL_Scripts(){
		//this will fill in the name of the current module, and enable/disable update/delete buttons
		fillInLabels();
		//this populates the order by dropdown, and activates the chooser widget.
		SUGAR.savedViews.handleForm();
	}

{/literal}
</script>



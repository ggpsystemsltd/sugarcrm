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

<script>

   jsonObjs = new Array();
   {if $pageData.urls.startPage}
       jsonObjs[0] = {$startPageJSON};
   {/if}

   {if $pageData.urls.prevPage}
       jsonObjs[1] = {$prevPageJSON};
   {/if}

   {if $pageData.urls.nextPage}
       jsonObjs[2] = {$nextPageJSON};
   {/if}

   {if $pageData.urls.endPage}

       jsonObjs[3] = {$endPageJSON};

   {/if}

   {literal}
   function goToNav(index) {
   	list_nav(jsonObjs[index], 'CommitEditView');
   }

   {/literal}
</script>

{if $overlib}
	<script type='text/javascript' src="{sugar_getjspath file='cache/include/javascript/sugar_grp_overlib.js'}"></script>
	<div id='overDiv' style='position:absolute; visibility:hidden; z-index:1000;'></div>
	<script>var image_path="{$IMAGE_PATH}";
		{literal}
		function unformat_currency(amt) {
		{/literal}
			var csymbol="{$CURRENCY_SYMBOL}";
			var num_grp_sep="{$NUM_GRP_SEP}";
			var dec_sep="{$DEC_SEP}";
			return unformatNumber(amt.replace(csymbol,''),num_grp_sep,dec_sep);
		{literal}
		}
		{/literal}
	</script>
{/if}



<form name="CommitEditView" id="CommitEditView" method="POST" action="index.php" >
	<input type="hidden" name="module" value="Forecasts">
	<input type="hidden" name="action" value="index">
	<input type="hidden" name="user_id" value="{$USER_ID}">
	<input type="hidden" name="timeperiod_id" value="{$TIMEPERIOD_ID}">
	<input type="hidden" name="forecast_type" value="{$FORECASTTYPE}">
	<input type="hidden" name="commit_forecast" value="0">
	<input type="hidden" name="opp_count" value="{$CURRENTOPPORTUNITYCOUNT}">
	<input type="hidden" name="opp_weigh_value" value="{$CURRENTWEIGHTEDVALUENUMBER}">
	<input type="hidden" name="call_back_function" value="commit_forecast">
	<input type="hidden" name="sel_user_id" value="{$SEL_USER_ID}">
	<input type="hidden" name="sel_timeperiod_id" value="{$SEL_TIMEPERIOD_ID}">
	<input type="hidden" name="sel_forecast_type" value="{$SEL_FORECASTTYPE}">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0" >
	    <tr>
			<td>
				<span><strong>{$LBL_FORECAST_FOR}</strong>&nbsp;{$USER_FORECAST_TYPE}&nbsp;<strong>{$LBL_TP_QUOTA}</strong>&nbsp;{$QUOTA_VALUE}</span>
			</td>
			<td align="right">
				<input title="{$LBL_SAVE_WOKSHEET}" class="button"  type = "button" onclick="this.form.call_back_function.value='save_worksheet';formsubmit(this.form);" name="saveworksheet" value="  {$LBL_SAVE_WOKSHEET} ">
				<input title="{$LBL_RESET_WOKSHEET}" class="button"  type = "button" onclick="if (!confirm('{$LBL_RESET_CHECK}')) return false;this.form.call_back_function.value='reset_worksheet';formsubmit(this.form); " name="resetworksheet" value="  {$LBL_RESET_WOKSHEET} ">
				<input title="{$LBL_SHOW_CHART}" class="button"  type = "button" onclick="this.form.call_back_function.value='get_chart';get_chart(this.form)" name="getchart" value="  {$LBL_SHOW_CHART} ">
			</td>
		</tr>
	</table>
{if $prerow}
	{$multiSelectData}
{/if}
<table cellpadding='0' cellspacing='0' width='100%' border='0' class="list view">
	{include file='include/ListView/ListViewPagination.tpl'}


	{* processing header row with column labels *}
	<tr height='20'>
		{if $prerow}
			<th scope='col'>
				<input type='checkbox' title="{sugar_translate label='LBL_SELECT_ALL_TITLE'}" class='checkbox' id='massall' name='massall' value='' onclick='sListView.check_all(document.MassUpdate, "mass[]", this.checked);' />
			</th>
		{/if}
		{foreach from=$displayColumns key=colHeader item=params}
		    {if !$params.hidden}
				<th width='{$params.width}%' align='{$params.align}' >
					<div style='white-space: normal;'width='100%' align='{$params.align|default:"left"}'>
					{if $params.sortable|default:true}
						<a href='javascript:list_nav({$params.order_by_object},"CommitEditView")' class='listViewThLinkS1'>{sugar_translate label=$params.label module=$pageData.bean.moduleDir}
						{assign var=default_order value=$params.tablename|default:''}
						{if $default_order|count_characters > 0 }
							{assign var=default_order value=$default_order|cat:"."}
						{/if}
						{assign var=default_order value=$default_order|cat:$colHeader|lower}
						{if $params.orderBy|default:$default_order|lower == $pageData.ordering.orderBy}
							{if $pageData.ordering.sortOrder == 'ASC'}
                                {capture assign="imageName"}arrow_down.{$arrowExt}{/capture}
                                {sugar_getimage name=$imageName width="$arrowWidth" height="$arrowHeight" alt="$arrowAlt" other_attributes='align="absmiddle" border="0" '}
							{else}
                                {capture assign="imageName"}arrow_up.{$arrowExt}{/capture}
                                {sugar_getimage name=$imageName width="$arrowWidth" height="$arrowHeight" alt="$arrowAlt" other_attributes='align="absmiddle" border="0" '}
							{/if}
						{else}
							{capture assign="imageName"}arrow.{$arrowExt}{/capture}
							{sugar_getimage name=$imageName width="$arrowWidth" height="$arrowHeight" alt="$arrowAlt" other_attributes='align="absmiddle" border="0" '}
						{/if}
						</a>
					{else}
						{sugar_translate label=$params.label module=$pageData.bean.moduleDir}
					{/if}
					</div>
				</th>
			{/if}
		{/foreach}
	</tr>

	{* processing data rows *}
	{foreach name=rowIteration from=$data key=id item=rowData}
		{if $smarty.foreach.rowIteration.iteration is odd}
			{assign var='_rowColor' value=$rowColor[0]}
		{else}
			{assign var='_rowColor' value=$rowColor[1]}
		{/if}
		<tr height='20' class='{$_rowColor}S1'>
			{if $prerow}
				<td><input onclick='sListView.check_item(this, document.MassUpdate)' type='checkbox' class='checkbox' name='mass[]' value='{$id}'></td>
			{/if}
			{foreach from=$displayColumns key=col item=params name=colIteration}
				{if $params.hidden}
                   	<input type="hidden" name="{$col}_{$rowData[$params.id]|default:$rowData.ID}" id="{$col}_{$rowData[$params.id]|default:$rowData.ID}" value="{$rowData.$col}">
				{else}
					<td scope='row' align='{$params.align|default:'left'}' valign="top">
						{if $smarty.foreach.colIteration.index == 0}
							{$pageData.additionalDetails.$id}
						{/if}
	                    {if $params.edit}
	                    	<input type="text"  maxlength=10 onchange="update_adj_amount(this,'{$col}_TOTAL')" name="{$col}_{$rowData[$params.id]|default:$rowData.ID}" id="{$col}_{$rowData[$params.id]|default:$rowData.ID}" old_value="{$rowData.$col}" value="{$rowData.$col}">
	                    {else}
							{if $params.link}
								{if $params.customCode}
									{sugar_evalcolumn_old var=$params.customCode rowData=$rowData}
								{else}
									<{$pageData.tag.$id.MAIN} href='index.php?action={$params.action|default:'DetailView'}&module={$params.module|default:$pageData.bean.moduleDir}&record={$rowData[$params.id]|default:$rowData.ID}&offset={$pageData.offsets.current}&stamp={$pageData.stamp}'>{$rowData.$col}</{$pageData.tag.$id.MAIN}>
								{/if}
							{else}
								{$rowData.$col}
							{/if}
						{/if}
					</td>
				{/if}
			{/foreach}
	    	</tr>
	{/foreach}
	{* Add totals row , makes assumption about number of field in the list*}
	{* this will work only for a direct forecast *}
<tr class='{$rowColor[0]}S1'>
		{if $prerow}
			<td>&nbsp;</td>
		{/if}
		{foreach from=$displayColumns key=col item=params}
			{if !$params.hidden}
				<td align='{$params.align|default:'left'}' valign='top'>
				<div style='white-space: nowrap;'width='100%' align='{$params.align|default:"left"}'>
				<span id="{$col}_TOTAL_DISPLAY">{$totals.$col}</span>
				<input type=hidden id="{$col}_TOTAL" value="{$totals.$col}"></div></td>

			{/if}
		{/foreach}
	</tr>
</table>
<BR/>
{if $prerow}
<a href='javascript:sListView.check_all(document.MassUpdate, "mass[]", false);'>{$clearAll}</a>
{/if}
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	    <tr>
			<td  width="30%" scope="row">{$LBL_DV_LAST_COMMIT_DATE}&nbsp;{$PREV_COMMIT_DATE}</td>
			<td  width="23%" scope="row">{$LBL_BEST_CASE}&nbsp;{$PREV_BEST_CASE}</td>
			<td  width="23%" scope="row">{$LBL_LIKELY_CASE}&nbsp;{$PREV_LIKELY_CASE}</td>
			<td  width="23%" scope="row">{$LBL_WORST_CASE}&nbsp;{$PREV_WORST_CASE}</td>
		</tr>
{if $commit_allowed}
		<tr>
			<td scope="row" >{$LBL_COMMIT_NOTE}</td>
			<td scope="row" >{$LBL_BEST_CASE}&nbsp;<input id='commit_best_case' name='best_case'  maxlength='10' size=10  type="text" value="{$COMMITVALUEBEST}"></td>
			<td scope="row" >{$LBL_LIKELY_CASE}&nbsp;<input id='commit_likely_case' name='likely_case'   maxlength='10' size=10 type="text" value="{$COMMITVALUELIKELY}"></td>
			<td scope="row" >{$LBL_WORST_CASE}&nbsp;<input id='commit_worst_case' name='worst_case'   maxlength='10' size=10 type="text" value="{$COMMITVALUEWORST}"></td>
		</tr>
    	<tr>
    		<td colspan=3 scope="row">&nbsp;</td>
			<td align="right" scope="row">{$COPY_LINK}&nbsp;<input title="{$LBL_QC_COMMIT_BUTTON}" class="button"  type = "button" onclick="if (commitverify(this.form,'{$ERR_FORECAST_AMOUNT}','{$LBL_COMMIT_MESSAGE}'))  formsubmit(this.form);" name="rollupcommit" value="{$LBL_QC_COMMIT_BUTTON}" id='btn_commit'></td>
		</tr>
{/if}

	</table>
</form>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<th align="left" scope="row" colspan="4" scope="row"><h4>{$MOD.LBL_LINE_ITEM_INFORMATION}</h4></th>
	</tr><tr>
	<td colspan="4">
    <table border='0' width="100%" cellspacing='2' cellpadding='0'>
    <tr>
		<td width='10%' scope="row">{$MOD.LBL_CURRENCY}</td>
				<td width='10%' ><select  name='currency_id' id='currency_id' onchange='quotesManager.ConvertItems(this.options[selectedIndex].value);'>{$CURRENCY}</select></td>
		<td width='10%' scope="row">{$MOD.LBL_TAXRATE}</td>
		<td width='13%' >
		<select name='taxrate_id' id='taxrate_id' onchange="this.form.taxrate_value.value=get_taxrate(this.form.taxrate_id.options[selectedIndex].value);quotesManager.calculate(document)">{$TAXRATE_OPTIONS}</select>
		<input type="hidden" name="taxrate_value" value="{$TAXRATE_VALUE}">
		</td>
        <td width='13%' scope="row">{$MOD.LBL_SHIPPING_PROVIDER}</td>
        <td width='13%' ><select name='shipper_id' id='shipper_id'>{$SHIPPER_OPTIONS}</select></td>
		<td width='13%' scope="row">{$MOD.LBL_CALC_GRAND}</td>
		<td width='13%' ><input  type='checkbox' class='checkbox' name='calc_grand_total' id='calc_grand_total' onClick='toggleDisplay("grand_tally");' {$CALC_GRAND_TOTAL_CHECKED}></td>
	    <td width='13%' scope="row">{$MOD.LBL_SHOW_LINE_NUMS}</td>
	    <td width='40%' ><input type='checkbox' class='checkbox' name='show_line_nums' id='show_line_nums' {$SHOW_LINE_NUMS_CHECKED}></td>
	</tr>
	</table>

	<div id='ie_hack_stage' style='display:none'>
	<table name='table_name' id='table_id' >
	<tr><td scope="row">{$MOD.LBL_BUNDLE_NAME}</td>
	<td >
	&nbsp; <input type='text' size='20' name='name_name' id='name_id' value=''>
	</td><td scope="row">{$MOD.LBL_BUNDLE_STAGE}</td>
	<td >&nbsp;
	<select name='select_name' id='select_id' onchange='quotesManager.calculate(document);'>
	{$QUOTE_STAGE_OPTIONS}
	</select>
	</td></tr></table>
	</div>

	<div id='add_tables'>&nbsp;</div>
	
	<div id='grand_tally' style='display:inline'>
	<table  border="0" cellspacing="0" cellpadding="0" >
		<tr>
		<td scope="row"  valign="top" style="text-align: left;">{$MOD.LBL_LIST_GRAND_TOTAL}</td>
	</tr>
	<tr>
		<td scope="row" NOWRAP style="text-align: left;">{$MOD.LBL_SUBTOTAL}</td>
		<td scope="row" NOWRAP><div style="text-align: right;" id='grand_sub'>{$SUBTOTAL}</div></td>
	</tr>
	<tr>
        <td scope="row" NOWRAP style="text-align: left;">{$MOD.LBL_DISCOUNT_TOTAL}</td>
        <td scope="row" NOWRAP><div style="text-align: right;" id='grand_discount'>{$DISCOUNT}</div></td>
    </tr>
    <tr>
        <td scope="row" NOWRAP style="text-align: left;">{$MOD.LBL_NEW_SUB}</td>
        <td scope="row" NOWRAP><div style="text-align: right;" id='grand_new_sub'>{$NEW_SUB}</div></td>
    </tr>
	<tr>
		<td scope="row" NOWRAP style="text-align: left;">{$MOD.LBL_TAX}</td>
		<td scope="row" NOWRAP><div style="text-align: right;" id='grand_tax'>{$TAX}</div></td>
	</tr>
	<tr>
		<td scope="row" NOWRAP style="text-align: left;">{$MOD.LBL_SHIPPING}</td>
		<td scope="row" NOWRAP><div style="text-align: right;" id='grand_ship'>{$SHIPPING}</div></td>
	</tr>
	<tr>
		<td scope="row" NOWRAP style="text-align: left;">{$MOD.LBL_TOTAL}</td>
		<td scope="row" NOWRAP> <div style="text-align: right;" id='grand_total'>{$TOTAL}</div></td>
    </tr>
	</table>
	</div>
	
	<br>
	<input type='button' id='add_group' name='add_group' class='button' value='{$MOD.LBL_ADD_GROUP}' onclick='quotesManager.addTable("", "","","0.00")'>
	</td>
</tr></table>
</td>
</tr>
</table>
<input type='hidden' id='product_count' name='product_count' value='0'>
<input type="hidden" name="quote_type" value="Quotes">


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr><td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr><th align="left" scope="row" colspan="2" scope="row"><h4>{$MOD.LBL_DESCRIPTION_INFORMATION}</h4></th></tr>
		<tr><td width="15%" valign="top" scope="row">{$MOD.LBL_DESCRIPTION}</td><td width="85%" ><textarea name='description' id='description' cols="60" rows="8">{$fields.description.value}</textarea></td></tr>
    </table>
</td></tr>
</table>

<script type="text/javascript">
Calendar.setup ({literal} { {/literal}
	inputField : "jscal_field", daFormat : "{$CALENDAR_DATEFORMAT}", ifFormat : "{$CALENDAR_DATEFORMAT}", showsTime : false, button : "jscal_trigger", singleClick : true, step : 1, weekNumbers:false
{literal} } {/literal});

Calendar.setup ({literal} { {/literal}
	inputField : "jscal_field_original_po_date", ifFormat : "{$CALENDAR_DATEFORMAT}", showsTime : false, button : "jscal_trigger_original_po_date", singleClick : true, step : 1, weekNumbers:false
{literal} } {/literal});
</script>

{$TAXRATE_JAVASCRIPT}

{$NO_MATCH_VARIABLE}

{$CURRENCY_JAVASCRIPT}

<script type="text/javascript" src="{sugar_getjspath file='modules/Quotes/quotes.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='modules/Quotes/EditView.js'}"></script>
<script type="text/javascript">
{literal}
quotesManager = new QuotesEditManager(YUI().use('node', function(Y){
    return Y;
}));
if(!document.getElementById('calc_grand_total').checked){
	document.getElementById('grand_tally').style.display = 'none';
}
{/literal}

precision = "{$PRECISION}";
quotesManager.default_product_status = "{$DEFAULT_PRODUCT_STATUS}";
quotesManager.invalidAmount = "{$APP.ERR_INVALID_AMOUNT}";
quotesManager.selectButtonTitle = "{$APP.LBL_SELECT_BUTTON_TITLE}";
quotesManager.selectButtonKey = "{$APP.LBL_SELECT_BUTTON_KEY}";
quotesManager.selectButtonValue = "{$APP.LBL_SELECT_BUTTON_LABEL}";
quotesManager.deleteButtonName = "{$MOD.LBL_REMOVE_ROW}";
quotesManager.deleteButtonConfirm = "{$MOD.NTC_REMOVE_PRODUCT_CONFIRMATION}";
quotesManager.deleteGroupConfirm = "{$MOD.NTC_REMOVE_GROUP_CONFIRMATION}";
quotesManager.deleteButtonValue = "{$MOD.LBL_REMOVE_ROW}";
quotesManager.addRowName = "{$MOD.LBL_ADD_ROW}";
quotesManager.addRowValue = "{$MOD.LBL_ADD_ROW}";
quotesManager.deleteTableName = "{$MOD.LBL_DELETE_GROUP}";
quotesManager.deleteTableValue = "{$MOD.LBL_DELETE_GROUP}";
quotesManager.subtotal_string = "{$MOD.LBL_SUBTOTAL}";
quotesManager.shipping_string = "{$MOD.LBL_SHIPPING}";
quotesManager.deal_tot_string = "{$MOD.LBL_DISCOUNT_TOTAL}";
quotesManager.new_sub_string = "{$MOD.LBL_NEW_SUB}";
quotesManager.total_string = "{$MOD.LBL_TOTAL}";
quotesManager.tax_string = "{$MOD.LBL_TAX}";
quotesManager.list_quantity_string = "{$MOD.LBL_LIST_QUANTITY}"
quotesManager.list_product_name_string = "{$MOD.LBL_LIST_PRODUCT_NAME}"
quotesManager.list_mf_part_num_string = "{$MOD.LBL_LIST_MANUFACTURER_PART_NUM}"
quotesManager.list_taxclass_string = "{$MOD.LBL_LIST_TAXCLASS}"
quotesManager.list_cost_string = "{$MOD.LBL_LIST_COST_PRICE}"
quotesManager.list_list_string = "{$MOD.LBL_LIST_LIST_PRICE}"
quotesManager.list_discount_string = "{$MOD.LBL_LIST_DISCOUNT_PRICE}"
quotesManager.list_deal_tot = "{$MOD.LBL_LIST_DEAL_TOT}"
quotesManager.check_data = "{$MOD.LBL_CHECK_DATA}"
quotesManager.addCommentName = "{$MOD.LBL_ADD_COMMENT}";
quotesManager.addCommentValue = "{$MOD.LBL_ADD_COMMENT}";
quotesManager.deleteCommentName = "{$MOD.LBL_REMOVE_COMMENT}";
quotesManager.deleteCommentValue = "{$MOD.LBL_REMOVE_COMMENT}";
quotesManager.deleteCommentConfirm = "{$MOD.NTC_REMOVE_COMMENT_CONFIRMATION}";

{$ADD_ROWS}
</script>

<script type="text/javascript" language="Javascript">
{$SETUP_SCRIPT}
{literal}
YAHOO.util.Event.onDOMReady(function()
{
    sqs_objects['EditView_billing_account_name']['post_onblur_function'] = 'set_shipping_account_name';
});
{/literal}
</script>

{$CALCULATE_FUNCTION}

{$SAVED_SEARCH_SELECTS}

{{include file='include/EditView/footer.tpl'}}

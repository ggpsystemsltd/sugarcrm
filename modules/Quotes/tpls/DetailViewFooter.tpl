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
<div class="detail view">
<table width="100%" border="0" cellpadding="0" cellspacing="{$gridline}">
<tr>
	<td scope="row" align="left" colspan="7"><h4>{$MOD.LBL_LINE_ITEM_INFORMATION}</h4></td>
</tr>
	{foreach from=$ordered_bundle_list key=index item=product_bundle}

	{assign var=product_bundle_product_note_list value=$product_bundle->get_notes()}
	{assign var=bundle_list value=$product_bundle->get_product_bundle_line_items()}
	{assign var=BUNDLE_NAME value=$product_bundle->name}
	{assign var=bundle_key value=$product_bundle->bundle_stage}
	{assign var=BUNDLE_STAGE value=$APP_LIST_STRINGS.quote_stage_dom.$bundle_key}

	<!-- BEGIN: product_bundle -->
	<tr>
	<td scope="row" width="1%" valign="top" style="text-align: left;" colspan='3'>{$MOD.LBL_BUNDLE_NAME}&nbsp;<b>{$BUNDLE_NAME}</b></td>
	<td scope="row" width="45%" valign="top" style="text-align: left;" colspan='{if $product_bundle->deal_tot != "0.00" && $product_bundle->deal_tot != ""}4{else}3{/if}'>{$MOD.LBL_BUNDLE_STAGE}&nbsp;<b>{$BUNDLE_STAGE}</b></td>
	</tr>
	<!-- BEGIN: bundle_row -->
	<!-- BEGIN: product_row -->
	<tr>
	<td scope="row" width="1%" valign="top" style="text-align: left;">&nbsp;</td>
	<td scope="row" width="10%" valign="top" style="text-align: center;">{$MOD.LBL_LIST_QUANTITY}</td>
	{if $bean->deal_tot != "0.00"}
	<td scope="row" width="30%" valign="top" style="text-align: left;">{$MOD.LBL_LIST_PRODUCT_NAME}</td>
	{else}
	<td scope="row" width="45%" valign="top" style="text-align: left;">{$MOD.LBL_LIST_PRODUCT_NAME}</td>
	{/if}
	<td scope="row" width="15%" valign="top" style="text-align: right;">{$MOD.LBL_LIST_COST_PRICE}</td>
	<td scope="row" width="15%" valign="top" style="text-align: right;">{$MOD.LBL_LIST_LIST_PRICE}</td>
	<td scope="row" width="15%" valign="top" style="text-align: right;">{$MOD.LBL_LIST_DISCOUNT_PRICE}</td>
	{if $product_bundle->deal_tot!= "0.00" && $product_bundle->deal_tot!= ""}
	<td scope="row" width="15%" valign="top" style="text-align: right;">{$MOD.LBL_LIST_DEAL_TOT}</td>
	{/if}
	</tr>

    {if is_array($bundle_list)}
    {counter start=0 print=false}
    {foreach from=$bundle_list key=key item=line_item}
        {if $line_item->object_name == "Product"}

			<tr>

			<td width="1" valign="top"style="text-align: center;">{if $bean->show_line_nums == 1}{counter print=true}{/if}&nbsp;</td>
			<td valign="top" style="text-align: center;">{$line_item->quantity}</td>
		    <td valign="top"><a href="index.php?module=Products&action=DetailView&record={$line_item->id}">{$line_item->name}</a><BR>{$line_item->description|nl2br}</td>

		    {if $line_item->currency_id == $bean->currency_id && $line_item->currency_id != "-99"}
		        {assign var="COST_PRICE" value=$line_item->cost_price}
		        {assign var="LIST_PRICE" value=$line_item->list_price}
		        {assign var="DISCOUNT_PRICE" value=$line_item->discount_price}
		        {assign var="DISCOUNT_AMOUNT" value=$line_item->discount_amount}
		        {assign var="SELECT_DISCOUNT" value=$line_item->discount_select}
			{else}
		        {assign var="COST_PRICE" value=$line_item->cost_usdollar}
		        {assign var="LIST_PRICE" value=$line_item->list_usdollar}
		        {assign var="DISCOUNT_PRICE" value=$line_item->discount_usdollar}
		        {assign var="DISCOUNT_AMOUNT" value=$line_item->discount_amount_usdollar}
		        {assign var="SELECT_DISCOUNT" value=$line_item->discount_select}
			{/if}

			<td valign="top" style="text-align: right;">{sugar_currency_format var=$COST_PRICE currency_id=$CURRENCY_ID}</td>
			<td valign="top" style="text-align: right;">{sugar_currency_format var=$LIST_PRICE currency_id=$CURRENCY_ID}</td>
			<td valign="top" style="text-align: right;">{sugar_currency_format var=$DISCOUNT_PRICE currency_id=$CURRENCY_ID}</td>
			{if $line_item->discount_amount != "0.00" && $product_bundle->deal_tot!= ""}
			     {if $line_item->discount_select}
			         <td valign="top" style="text-align: right;">{sugar_currency_format var=$DISCOUNT_AMOUNT currency_symbol=''}%</td>
			     {else}
			         <td valign="top" style="text-align: right;">{sugar_currency_format var=$DISCOUNT_AMOUNT currency_id=$CURRENCY_ID}</td>
			     {/if}
			{/if}
			</tr>

        {elseif $line_item->object_name == "ProductBundleNote"}

			<tr valign="top">
			<td width='1' valign="top" style="text-align: center;">&nbsp;</td>
			<td valign="top" style="text-align: center;">&nbsp;</td>
			<td valign="top">{$line_item->description|nl2br|replace:'\\':''}</td>
			<td valign="top">&nbsp;</td>
			<td valign="top">&nbsp;</td>
			<td valign="top">&nbsp;</td>
			</tr>

        {/if}
    {/foreach}

		<tr><td colspan='7' NOWRAP><HR><br></td></tr>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td style="text-align: right;">&nbsp;</td>
			<td>&nbsp;</td>
			{if $bean->deal_tot != "0.00"}
			<td>&nbsp;</td>
			{/if}
			<td NOWRAP style="text-align: right;">{$MOD.LBL_SUBTOTAL}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$product_bundle->subtotal currency_id=$CURRENCY_ID}</td>
        </tr><tr>
            {if $product_bundle->deal_tot!= "0.00" && $product_bundle->deal_tot!= ""}
            <td NOWRAP>&nbsp;</td>
            <td NOWRAP>&nbsp;</td>
            <td style="text-align: right;">&nbsp;</td>
            <td>&nbsp;</td>
            {if $bean->deal_tot != "0.00"}
            <td>&nbsp;</td>
            {/if}
            <td NOWRAP style="text-align: right;">{$MOD.LBL_DISCOUNT_TOTAL}</td>
            <td NOWRAP style="text-align: right;">{sugar_currency_format var=$product_bundle->deal_tot currency_id=$CURRENCY_ID}</td>
		</tr><tr>
		    <td NOWRAP>&nbsp;</td>
            <td NOWRAP>&nbsp;</td>
            <td style="text-align: right;">&nbsp;</td>
            <td>&nbsp;</td>
            {if $bean->deal_tot != "0.00"}
            <td>&nbsp;</td>
            {/if}
            <td NOWRAP style="text-align: right;">{$MOD.LBL_NEW_SUB}</td>
            <td NOWRAP style="text-align: right;">{sugar_currency_format var=$product_bundle->new_sub currency_id=$CURRENCY_ID}</td>
        </tr><tr>
            {/if}
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td style="text-align: right;">&nbsp;</td>
			<td>&nbsp;</td>
			{if $bean->deal_tot != "0.00"}
            <td>&nbsp;</td>
            {/if}
			<td NOWRAP style="text-align: right;">{$MOD.LBL_TAX}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$product_bundle->tax currency_id=$CURRENCY_ID}</td>
		</tr><tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td style="text-align: right;">&nbsp;</td>
			<td>&nbsp;</td>
			{if $bean->deal_tot != "0.00"}
            <td>&nbsp;</td>
            {/if}
			<td NOWRAP style="text-align: right;">{$MOD.LBL_SHIPPING}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$product_bundle->shipping currency_id=$CURRENCY_ID}</td>
        </tr><tr>
			<td NOWRAP>&nbsp;</td>
			<td colspan='3' NOWRAP>&nbsp;</td>
			{if $bean->deal_tot != "0.00"}
            <td>&nbsp;</td>
            {/if}
			<td NOWRAP style="text-align: right;">{$MOD.LBL_TOTAL}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$product_bundle->total currency_id=$CURRENCY_ID}</td>
	    </tr>
		<tr><td colspan='7' NOWRAP><br></td></tr>

    {/if}
	{/foreach}

    {if !empty($bean->calc_grand_total) && $bean->calc_grand_total == 1}
	{* BEGIN: grand_total *}
	<tr><td scope="row" colspan='7' valign="top" style="text-align: left;">{$MOD.LBL_LIST_GRAND_TOTAL}</td></tr>
	<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			{if abs($bean->deal_tot) > 0.01}
            <td>&nbsp;</td>
            {/if}
			<td style="text-align: right;">{$MOD.LBL_CURRENCY}</td>
			<td>{$CURRENCY}</td>
			<td NOWRAP style="text-align: right;">{$MOD.LBL_SUBTOTAL}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$bean->subtotal currency_id=$CURRENCY_ID}</td>
		</tr><tr>
			{if abs($bean->deal_tot) > 0.01}
            <td colspan='4' NOWRAP>&nbsp;</td>
			{if abs($bean->deal_tot) > 0.01}
            <td>&nbsp;</td>
            {/if}
            <td NOWRAP style="text-align: right;">{$MOD.LBL_DISCOUNT_TOTAL}</td>
            <td NOWRAP style="text-align: right;">{sugar_currency_format var=$bean->deal_tot currency_id=$CURRENCY_ID}</td>
		</tr><tr>
		<td colspan='4' NOWRAP>&nbsp;</td>
        {if abs($bean->deal_tot) > 0.01}
            <td>&nbsp;</td>
            {/if}
            <td NOWRAP style="text-align: right;">{$MOD.LBL_NEW_SUB}</td>
            <td NOWRAP style="text-align: right;">{sugar_currency_format var=$bean->new_sub currency_id=$CURRENCY_ID}</td>
        </tr><tr>
        {/if}
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
            {if abs($bean->deal_tot) > 0.01}
            <td>&nbsp;</td>
            {/if}
			<td style="text-align: right;">{$MOD.LBL_TAXRATE}</td>
			<td>{sugar_number_format precision=2 var=$bean->taxrate_value} {$APP.LBL_PERCENTAGE_SYMBOL}</td>
			<td NOWRAP style="text-align: right;">{$MOD.LBL_TAX}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$bean->tax currency_id=$CURRENCY_ID}</td>
		</tr><tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
            {if abs($bean->deal_tot) > 0.01}
            <td>&nbsp;</td>
            {/if}
			<td style="text-align: right;">{$MOD.LBL_SHIPPING_PROVIDER}</td>
			<td>{$bean->shipper_name}&nbsp;</td>
			<td NOWRAP style="text-align: right;">{$MOD.LBL_SHIPPING}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$bean->shipping currency_id=$CURRENCY_ID}</td>
		</tr><tr>
			<td colspan='4' NOWRAP>&nbsp;</td>
            {if abs($bean->deal_tot) > 0.01}
            <td>&nbsp;</td>
            {/if}
			<td NOWRAP style="text-align: right;">{$MOD.LBL_TOTAL}</td>
			<td NOWRAP style="text-align: right;">{sugar_currency_format var=$bean->total currency_id=$CURRENCY_ID}</td>
	</tr>
	{* END: grand_total *}
    {/if}
</table>
</div>

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
<hr />
<!-- Wireless Edit View -->
<div class="sectitle">{$MODULE_NAME}: {$BEAN_NAME}</div>
<div class="sec">
<form action="index.php" method="POST">
<table>
	{foreach from=$DETAILS item=DETAIL name="recordlist"}
    {if !$fields[$DETAIL.field].hidden}
	<tr>
		<td class="detail_label {if $smarty.foreach.recordlist.index % 2 == 0}odd{else}even{/if}">{$DETAIL.label|strip_semicolon}: {if $DETAIL.required}<span class="required">*</span>{/if}</td>
		<td class="{if $smarty.foreach.recordlist.index % 2 == 0}odd{else}even{/if}">
		{if $DETAIL.detail_only}
            {if !empty($DETAIL.customCode)}
				{eval var=$DETAIL.customCode}
            {else}
			    {sugar_field parentFieldArray='fields' vardef=$fields[$DETAIL.field] displayType='wirelessDetailView' displayParams='' typeOverride=$DETAIL.type}
            {/if}
		{else}
			{if !empty($DETAIL.customCode)}
				{eval var=$DETAIL.customCode}
            {else}
			    {sugar_field parentFieldArray='fields' vardef=$fields[$DETAIL.field] displayType='wirelessEditView' displayParams=$DETAIL.displayParams typeOverride=$DETAIL.type formName=$form_name}
            {/if}
        {/if}
		</td>
	</tr>
    {/if}
	{/foreach}
</table>
	<input class="button" type="submit" value="{sugar_translate label='LBL_SAVE_BUTTON_LABEL' module=''}" />
	<input type="hidden" name="record" value="{$BEAN_ID}" />
	<input type="hidden" name="module" value="{$MODULE}" />
	<input type="hidden" name="action" value="wlsave" />	
	<input type="hidden" name="return_action" value="wirelessdetail" />	
	{if $RELATE_MODULE}
    <input type="hidden" name="related_module" value="{$RELATED_MODULE}" />
	<input type="hidden" name="relate_to" value="{$RELATE_NAME}" />	
	<input type="hidden" name="relate_id" value="{$RELATE_ID}" />
	<input type="hidden" name="parent_id" value="{$RELATE_ID}" />	
	<input type="hidden" name="parent_type" value="{$RELATE_TO}" />	
    <input type="hidden" name="{$RELATE_FIELD}" value="{$RELATE_ID}" />	
	<input type="hidden" name="return_module" value="{$RETURN_MODULE}" />
	<input type="hidden" name="return_id" value="{$RETURN_ID}" />
    </form>
    <form action="index.php" method="POST">
	<input type="hidden" name="record" value="{$RETURN_ID}" />
	<input type="hidden" name="module" value="{$RETURN_MODULE}" />
	{else}	
	<input type="hidden" name="return_module" value="{$MODULE}" />
	<input type="hidden" name="return_id" value="{$BEAN_ID}" />
    </form>
	<form action="index.php" method="POST">
	<input type="hidden" name="record" value="{$BEAN_ID}" />
	<input type="hidden" name="module" value="{$MODULE}" />
	{/if}
    <input type="hidden" name="action" value="{$RETURN_ACTION}" />
    <input class="button" type="submit" value="{sugar_translate label='LBL_CANCEL_BUTTON_LABEL' module=''}" />
    </form>
</div>
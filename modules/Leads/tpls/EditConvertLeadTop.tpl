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


{*
<table class="edit view" id="convertLayoutExtraData"><tr>
<td scope="row">Required:</td>
<td><input type="checkbox" onclick="document.getElementById('convertRequired').value = this.checked" {if $required}checked="checked"{/if}/></td>
<td scope="row">Copy Data:</td>
<td><input type="checkbox"  onclick="document.getElementById('convertCopy').value = this.checked" {if $copyData}checked="checked"{/if}/></td>
<td scope="row">Allow Selection:</td>
<td>
<select>
    <option value="none" label="No">No</option>
    {if $relationships.length == 1}
        <option value="{$relationships.0.name}" label="Yes">Yes</option>
    {else}
	    {foreach from=$relationships item=rel}
	    <option value="{$rel.name}" label="{$rel.label}" {if $rel.selected}selected="selected"{/if}>{$rel.label}</option>
	    {/foreach}
    {/if}
</select>
</td></tr>
</table>
<div style="display:none" id="convertDataForSave">
<input type="hidden" name="convertRequired" id="convertRequired" value="{$required}">
<input type="hidden" name="convertCopy" id="convertCopy" value="{$copyData}">
<input type="hidden" name="convertSelection" id="convertSelection" value="{$select}">
</div> *}
{if !empty($warningMessage)}
<p class="error">{$warningMessage}</p>
{/if}
<script type="text/javascript">
//This script will be invoked by ModuleBuilder after the HTML is already on the page
//YAHOO.util.Dom.insertAfter("convertLayoutExtraData", "layoutEditorButtons");
//YAHOO.util.Dom.insertBefore("convertDataForSave", document.getElementById("prepareForSave").firstChild);
document.forms.prepareForSave.module.value = "Leads";
</script>
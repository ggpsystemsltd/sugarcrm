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


{literal}
<style type='text/css'>
    .slot
    {
        border-width:1px;border-color:#999999;border-style:solid;padding:0px 1px 0px 1px;margin:2px;cursor:move;
    }

    .slotB
    {
        border-width:0;cursor:move;
    }
    div.moduleTitle
    {
        margin-bottom: 5px;
    }
</style>
{/literal}

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
           {$title}
<table cellspacing="2">
    <tr>
        <td colspan="3">{$MOD.LBL_RENAME_MOD_SAVE_HELP}</td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td colspan="3">
            <input type="button" class="button primary" value="{$MOD.LBL_BTN_SAVE}" id="renameSaveBttn" onclick='validateForm();'name="{$MOD.LBL_BTN_SAVE}" />
            <input type="button" class="button" value="{$MOD.LBL_BTN_CANCEL}"  id="renameCancelBttn" name="{$MOD.LBL_BTN_CANCEL}" onclick="document.editdropdown.action.value='index'; document.editdropdown.module.value='Administration';document.editdropdown.submit()" />
        </td>
    </tr>
</table>
<div style="height:10px">&nbsp;</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class='edit view' >
<tr>
    <td>
        <span class='error'>{$error}</span>
        <table>
            <tr>
                <td colspan='2'>
                    <form method='post' action='index.php' name='dropdownsform'>
                        <input type='hidden' name='action' value='wizard'>
                        <input type='hidden' name='wizard' value='RenameModules'>
                        <input type='hidden' name='option' value='EditDropdown'>
                        <input type='hidden' name='module' value='Studio'>
                        <input type='hidden' name='dropdown_name' value='{$dropdown_name}'>
                        {$MOD.LBL_TABGROUP_LANGUAGE} &nbsp;
                        {html_options name='dropdown_lang' options=$dropdown_languages selected=$dropdown_lang onchange="document.dropdownsform.submit();"}
                        {sugar_help text=$MOD.LBL_LANGUAGE_TOOLTIP}
                    </form>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
<form method='post' action='index.php' name='editdropdown'>
<input type='hidden' name='action' value='wizard'>
<input type='hidden' name='wizard' value='RenameModules'>
<input type='hidden' name='option' value='SaveDropDown'>
<input type='hidden' name='module' value='Studio'>
<input type='hidden' name='dropdown_lang' value='{$dropdown_lang}'>
<input type='hidden' name='dropdown_name' value='moduleList'>

<table name='tabDropdown' id='tabDropdown'>

{counter start=0 name="rowCounter" print=false assign="rowCounter"}
{foreach from=$dropdown item="value" key="key"}
<tr>
    <td>
        <span id='slot{$rowCounter}b' >
            <span onclick='prepChangeDropDownValue({$rowCounter}, document.getElementById("slot{$rowCounter}_value"));'>{$editImage}</span>
            &nbsp;
            <span id ='slot{$rowCounter}_value' onclick='prepChangeDropDownValue({$rowCounter}, this);'>{$value.lang}</span>
            <span id='slot{$rowCounter}_textspan' style='display:none;'>{$value.user_lang}
                <table style="margin-left:15px;">
                    <tr>
                        <td align="right">{$MOD.LBL_SINGULAR}</td>
                        <td align="left"><input id='slot{$rowCounter}_stext' value='{$value.singular}' onchange='setSingularDropDownValue({$rowCounter});' type='text'></td>
                    </tr>
                    <tr>
                        <td align="right">{$MOD.LBL_PLURAL}</td>
                        <td align="left"><input id='slot{$rowCounter}_text' value='{$value.lang}' type='text'  onchange='setDropDownValue({$rowCounter}, this.value, true)' ></td>
                    </tr>
                </table>
                <input name='slot_{$rowCounter}' id='slot_{$rowCounter}' value='{$rowCounter}' type = 'hidden'>
                <input type='hidden' name='key_{$rowCounter}' id='key_{$rowCounter}' value='{$key|default:"BLANK"}'>
                <input type='hidden' id='delete_{$rowCounter}' name='delete_{$rowCounter}' value='0'>
                <input type='hidden' id='slot{$rowCounter}_key' name='slot{$rowCounter}_key' value='{$key}'>
                <input name='value_{$rowCounter}' id='value_{$rowCounter}' value='{$value.lang}' type = 'hidden'>
                <input name='svalue_{$rowCounter}' id='svalue_{$rowCounter}' value='{$value.singular}' type = 'hidden'>
            </span>
        </span>
    </td>
</tr>
{counter name="rowCounter"}
{/foreach}

</table>
</table>

{sugar_getscript file="cache/include/javascript/sugar_grp_overlib.js"}
{sugar_getscript file="include/javascript/yui/dragdrop.js"}
{literal}
<script>

    var lastField = '';
    var lastRowCount = -1;
    var inputsWithErrors = [];
    function prepChangeDropDownValue(rowCount, field)
    {
        var tempLastField = lastField;
        if(lastRowCount != -1)
        {
            //Check for validation errors first
            if(checkForErrors(lastRowCount))
                return true;

            collapseRow(lastRowCount);
        }
        if(tempLastField == field)
            return;
        lastField = field;
        lastRowCount = rowCount;

        field.style.display="none";

        var textspan =  document.getElementById('slot' + rowCount + '_textspan');
        var text = document.getElementById("slot" + rowCount + "_text");
        textspan.style.display='inline'
        text.focus();
    }

    function checkForErrors(rowCount)
    {
        var foundErrors = false;
        var el1 = document.getElementById("slot" + rowCount + "_text");
        var el2 = document.getElementById("slot" + rowCount + "_stext");

        if( YAHOO.lang.trim(el1.value) == "")
        {
            add_error_style('editdropdown', el1, SUGAR.language.get('app_strings', 'ERR_MISSING_REQUIRED_FIELDS'),true);
            foundErrors = true;
        }
        if( YAHOO.lang.trim(el2.value) == "")
        {
            add_error_style('editdropdown', el2, SUGAR.language.get('app_strings', 'ERR_MISSING_REQUIRED_FIELDS'),true);
            foundErrors = true;
        }

        return foundErrors;
    }

    /*
        scrub input for bug 50607: able to enter HTML/JS and execute through module renaming.
     */
    function cleanModuleName(val)
    {
        return YAHOO.lang.escapeHTML(val);
    }

    /*
        pulled out routine to keep scrubbing from being called multiple times
     */
    function collapseRow(rowCount)
    {
        var text =  document.getElementById('slot' + rowCount + '_text');
        var textspan =  document.getElementById('slot' + rowCount + '_textspan');
        var span = document.getElementById('slot' + rowCount + '_value');
        textspan.style.display = 'none';
        span.style.display = 'inline';
        lastField = '';
        lastRowCount = -1;
    }

    function setSingularDropDownValue(rowCount)
    {
        document.getElementById('svalue_'+ rowCount).value = document.getElementById('slot' + rowCount + '_stext').value;
    }

    function setDropDownValue(rowCount, val, collapse)
    {
        //Check for validation errors first
        if(checkForErrors(rowCount))
            return true;

        document.getElementById('value_' + rowCount).value = val;

        var span = document.getElementById('slot' + rowCount + '_value');
        if(collapse)
        {
            span.innerHTML  = cleanModuleName(val);
            collapseRow(rowCount);
        }

        setSingularDropDownValue(rowCount);
    }

    var slotCount = {/literal}{$rowCounter}{literal};
    var yahooSlots = [];

    function validateForm()
    {
        for(i=0;i<slotCount;i++)
        {
            if( checkForErrors(i) )
            {
                //Highlight dropdown value if we find an error.
                prepChangeDropDownValue(i,  document.getElementById("slot"+i+"_value"));
                return;
            }
        }

        if(check_form("editdropdown"))
        {
            document.editdropdown.submit();
        }

    }
</script>
{/literal}


<div id='logDiv' style='display:none'>
</div>

<input type='hidden' name='use_push' value='1'>
</form>
</td></tr>
</table>
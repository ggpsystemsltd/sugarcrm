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

<p>
{$MODULE_TITLE}
</p>
<form name="addFontResult" method="POST" action="index.php" id="addFontResult">
<input type="hidden" name="module" value="Configurator">
<input type="hidden" name="action" value="FontManager">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="padding-bottom: 2px;">
            <input title="{$MOD.LBL_FONTMANAGER_TITLE}" class="button"  type="submit" name="back" value="  {$MOD.LBL_FONTMANAGER_BUTTON}  " >
        </td>
    </tr>
</table>
<br>
<div>{if isset($error)}<span class='error'><b>{$MOD.LBL_STATUS_FONT_ERROR}</b></span>{else}<b>{$MOD.LBL_STATUS_FONT_SUCCESS}</b>{/if}</div>
<span class='error'><pre>{$error}</pre></span>
<pre>{$info}</pre>
</form>
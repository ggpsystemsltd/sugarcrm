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
<form name='StudioWizard' id='StudioWizard' enctype='multipart/form-data' method='post' action='index.php?module=ModuleBuilder&action=portalstylesave&to_pdf=1' onsubmit="document.getElementById('uploadLabel').innerHTML=''; document.getElementById('StudioWizard').target = 'upload_target';">
<table>
	<tr>
		<td><input type ='file' name='filename'></td>
		<td><input type ='submit' value='{$mod.LBL_BTN_UPLOAD}' class='button'></td>
    </tr>
</table>
<iframe name="upload_target" id="upload_target" src="" title="" style="width:0;height:0;border:0px solid #fff;">
</iframe>
</form>
<br>
<span id='uploadLabel' class='error'>&nbsp;</span>
<br>
<h3>{$mod.LBL_SP_PREVIEW}</h3>
{literal}
<iframe name="style_preview" id="style_preview" width='90%' height=600 src='index.php?module=ModuleBuilder&action=portalpreview' title='index.php?module=ModuleBuilder&action=portalpreview'>
</iframe>
{/literal}
{literal}
<script>
ModuleBuilder.helpRegister('StudioWizard');
ModuleBuilder.helpSetup('portalStyle','default');
</script>
{/literal}

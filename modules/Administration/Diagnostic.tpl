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

/*********************************************************************************

 ********************************************************************************/
*}

<form name="Diagnostic" method="POST" action="index.php">
<input type="hidden" name="module" value="Administration">
<input type="hidden" name="action" value="DiagnosticRun">
 
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="actionsContainer">
	<tr>
	<td>
	<input title="{$MOD.LBL_DIAG_EXECUTE_BUTTON}" class="button" onclick="this.form.action.value='DiagnosticRun';" type="submit" name="button" value="  {$MOD.LBL_DIAG_EXECUTE_BUTTON}  " >
	<input title="{$MOD.LBL_DIAG_CANCEL_BUTTON}" class="button" onclick="this.form.action.value='index'; this.form.module.value='Administration'; " type="submit" name="button" value="  {$MOD.LBL_DIAG_CANCEL_BUTTON}  "></td>

	</tr>
</table>
<div id="table" style="visibility:visible">
<table id="maintable" width="430" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_CONFIGPHP}</slot></td>
	<td ><slot><input name='configphp' class="checkbox" type="checkbox" tabindex='1' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_CUSTOMDIR}</slot></td>
	<td ><slot><input name='custom_dir' class="checkbox" type="checkbox" tabindex='2' checked></slot></td>
	</tr><tr>

	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_PHPINFO}</slot></td>
	<td ><slot><input name='phpinfo' class="checkbox" type="checkbox" tabindex='3' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$DB_NAME} - {$MOD.LBL_DIAGNOSTIC_MYSQLDUMPS}</slot></td>
	<td ><slot><input name='mysql_dumps' class="checkbox" type="checkbox" tabindex='4' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$DB_NAME} - {$MOD.LBL_DIAGNOSTIC_MYSQLSCHEMA}</slot></td>

	<td ><slot><input name='mysql_schema' class="checkbox" type="checkbox" tabindex='5' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$DB_NAME} - {$MOD.LBL_DIAGNOSTIC_MYSQLINFO}</slot></td>
	<td ><slot><input name='mysql_info' class="checkbox" type="checkbox" tabindex='6' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_MD5}</slot></td>
	<td ><slot><input name='md5' class="checkbox" type="checkbox" tabindex='7' onclick="md5checkboxes()" checked></slot></td>
	</tr><tr>

	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_FILESMD5}</slot></td>
	<td ><slot><input name='md5filesmd5' class="checkbox" type="checkbox" tabindex='8' ></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_CALCMD5}</slot></td>
	<td ><slot><input name='md5calculated' class="checkbox" type="checkbox" tabindex='9' ></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_BLBF}</slot></td>

	<td ><slot><input name='beanlistbeanfiles' class="checkbox" type="checkbox" tabindex='10' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_SUGARLOG}</slot></td>
	<td ><slot><input name='sugarlog' class="checkbox" type="checkbox" tabindex='11' checked></slot></td>
	</tr><tr>
	<td scope="row"><slot>{$MOD.LBL_DIAGNOSTIC_VARDEFS}</slot></td>
	<td ><slot><input name='vardefs' class="checkbox" type="checkbox" tabindex='11' checked></slot></td>
	</tr>
</table>
</div>
</form>

{literal}
<script type="text/javascript" language="Javascript">
  var md5filesmd5_checked;
  var md5calculated_checked;
  function show(id) {
      document.getElementById(id).style.display="block";
  }
  function md5checkboxes(){
    if (document.Diagnostic.md5.checked == false){
      md5filesmd5_checked = document.Diagnostic.md5filesmd5.checked;
      md5calculated_checked = document.Diagnostic.md5calculated.checked;
      document.Diagnostic.md5filesmd5.checked=false;
      document.Diagnostic.md5calculated.checked=false;
      document.Diagnostic.md5filesmd5.disabled=true;
      document.Diagnostic.md5calculated.disabled=true;
    }
    else{
      document.Diagnostic.md5filesmd5.disabled=false;
      document.Diagnostic.md5calculated.disabled=false;
      document.Diagnostic.md5filesmd5.checked=md5filesmd5_checked;
      document.Diagnostic.md5calculated.checked=md5calculated_checked;
    }
  }
</script>
{/literal}
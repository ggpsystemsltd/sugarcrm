<!--
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
 * Description:
 * Created On: Oct 17, 2005
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): Chris Nojima
 ********************************************************************************/
-->

<!-- BEGIN: main -->
<html {$langHeader}>
<head>
<script type="text/javascript" src="modules/InboundEmail/InboundEmail.js?v={VERSION_MARK}"></script>
<script type="text/javascript" src="include/javascript/sugar_3.js?v={VERSION_MARK}"></script>
<script type="text/javascript" src="cache/include/javascript/sugar_grp1_yui.js?v={VERSION_MARK}"></script>
<script type="text/javascript" src="include/SugarFields/Teamset/Teamset.js?v={VERSION_MARK}"></script>
{$languageStrings}
<script type="text/javascript" src="cache/include/javascript/sugar_grp1_yui.js??v={VERSION_MARK}"></script>
<script type="text/javascript" src="cache/include/javascript/sugar_grp1.js??v={VERSION_MARK}"></script>
<script type="text/javascript" language="Javascript">
currentFolders = {$group_folder_array};
{literal}
	function checkFolderName(newFolder) {
	    var duplicate = false;
        for (var i in currentFolders) {
           if (currentFolders[i] == newFolder) {
               duplicate = true;
           }
        }
        if(newFolder == "" || duplicate) {
            alert(document.getElementById('errorMessage').value);
            return false;
        }
        return true;
	}

	function checkTeamSetData() {
        if (!SUGAR.collection.prototype.validateTemSet('EditView', 'team_name')) {
        	alert({/literal}'{$app_strings.ERR_NO_PRIMARY_TEAM_SPECIFIED}'{literal});
        	return false;
        } // if
        var teamIdsArray = SUGAR.collection.prototype.getTeamIdsfromUI('EditView', 'team_name');
		var primaryTeamId = SUGAR.collection.prototype.getPrimaryTeamidsFromUI('EditView', 'team_name');
		document.getElementById('primaryTeamId').value = primaryTeamId;
		document.getElementById('teamIds').value = teamIdsArray.join(",");
		return true
	} // fn

	function addNewGroupFolder() {
	    var newFolder = document.getElementById('groupFolderAddName').value;
        if (checkFolderName(newFolder) && checkTeamSetData()) {
		  document.getElementById('EditView').submit();
		}
	}

	function editGroupFolder() {
        var newFolder = document.getElementById('groupFolderAddName').value;
        if (checkFolderName(newFolder) && checkTeamSetData()) {
          document.getElementById('EditView').submit();
        }
	} // fn


{/literal}
</script>
{$CSS}
</head>
<body>
<form action="index.php" method="post" name="EditView" id="EditView">
	<input type="hidden" name="module" value="InboundEmail">
	<input type="hidden" name="action" value="SaveGroupFolder">
	<input type="hidden" id="errorMessage" name="errorMessage" value="{$app_strings.LBL_EMAIL_ERROR_ADD_GROUP_FOLDER}">
	<input type="hidden" name="record" value="{$ID}">
	<input type="hidden" name="to_pdf" value="1">
	<input type="hidden" name="isDuplicate" value=false>
	<input type="hidden" name="return_module">
	<input type="hidden" name="return_action">
	<input type="hidden" name="return_id">
	<input type="hidden" name="groupFoldersUser" value="">
	<input type="hidden" id="primaryTeamId" name="primaryTeamId">
	<input type="hidden" id="teamIds" name="teamIds">


	<table width="100%" border="0" align="center" cellspacing="{$GRIDLINE}" cellpadding="0">
		<tr>
		<td NOWRAP style="padding: 8px;" valign="top">
			<div style="{$createGroupFolderStyle}">
				<b>{$app_strings.LBL_EMAIL_SETTINGS_GROUP_FOLDERS_CREATE}:</b>
			</div>
			<div style="{$editGroupFolderStyle}">
				<b>{$app_strings.LBL_EMAIL_SETTINGS_GROUP_FOLDERS_EDIT}:</b>
			</div>
			<br />

			<div>
				{$app_strings.LBL_EMAIL_FOLDERS_NEW_FOLDER}:
			</div>
			<div>
				<input type="text" value="{$groupFolderName}" name="groupFolderAddName" id="groupFolderAddName">
			</div>
			<br />

			<div>
				{$app_strings.LBL_EMAIL_FOLDERS_ADD_THIS_TO}:
			</div>
			<div>
				<select name="groupFoldersAdd" id="groupFoldersAdd">{$group_folder_options}</select>
			</div>
			<br />
			<div>
				{$app_strings.LBL_EMAIL_FOLDERS_USING_TEAM}:
			</div>
			<div>
				{$TEAM_SET_FIELD}
			</div>
			<br />
			<input type="button" style="{$createGroupFolderStyle}" class="button" value="   {$app_strings.LBL_EMAIL_FOLDERS_ADD_NEW_FOLDER}   " {literal} onclick="addNewGroupFolder();" {/literal}>
			<input type="button" style="{$editGroupFolderStyle}" class="button" value="   {$app_strings.LBL_EMAIL_SAVE}   " onclick="editGroupFolder();" >
			<input type="button" class="button" value="   {$app_strings.LBL_EMAIL_CLOSE}   " onclick="window.close();">
		</td>
		</tr>
	</table>
	<br />
</form>
{$JAVASCRIPT}
</body>
</html>
<!-- END: main -->
<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

 * Description:  Contains a variety of utility functions used to display UI
 * components such as form headers and footers.  Intended to be modified on a per
 * theme basis.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

/**
 * Create javascript to validate the data entered into a record.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_validate_record_document_revision_js () {
global $mod_strings;
global $app_strings;

$lbl_version = $mod_strings['LBL_DOC_VERSION'];
$lbl_filename = $mod_strings['LBL_FILENAME'];


$err_missing_required_fields = $app_strings['ERR_MISSING_REQUIRED_FIELDS'];


$the_script  = <<<EOQ

<script type="text/javascript" language="Javascript">

function verify_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.revision.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_version";
	}	
	if (trim(form.uploadfile.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_filename";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}

	return true;
}
</script>

EOQ;

return $the_script;
}

function get_chooser_js()
{
$the_script  = <<<EOQ

<script type="text/javascript" language="Javascript">
<!--  to hide script contents from old browsers

function set_chooser()
{



var display_tabs_def = '';

for(i=0; i < object_refs['display_tabs'].options.length ;i++)
{
         display_tabs_def += "display_tabs[]="+object_refs['display_tabs'].options[i].value+"&";
}

document.EditView.display_tabs_def.value = display_tabs_def;



}
// end hiding contents from old browsers  -->
</script>
EOQ;

return $the_script;
}
function get_validate_record_js(){
	
global $mod_strings;
global $app_strings;

$lbl_name = $mod_strings['ERR_DOC_NAME'];
$lbl_start_date = $mod_strings['ERR_DOC_ACTIVE_DATE'];
$lbl_file_name = $mod_strings['ERR_FILENAME'];
$lbl_file_version=$mod_strings['ERR_DOC_VERSION'];
$sqs_no_match = $app_strings['ERR_SQS_NO_MATCH'];
$sqs_no_match .= ' : ' . $app_strings['LBL_LIST_TEAM'];
$lbl_list_team = $app_strings['LBL_LIST_TEAM'];
$err_missing_required_fields = $app_strings['ERR_MISSING_REQUIRED_FIELDS'];

if(isset($_REQUEST['record'])) {
//do not validate upload file
	$the_upload_script="";


} else 
{

$the_upload_script  = <<<EOQ

	if (trim(form.uploadfile.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_file_name";
	}
EOQ;

}

$the_script  = <<<EOQ

<script type="text/javascript" language="Javascript">

function verify_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.document_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_name";
	}
	
	$the_upload_script
	
	if (trim(form.active_date.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_start_date";
	}
	if (trim(form.revision.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_file_version";
	}

	if(trim(form.team_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_list_team";
	}
	if ((trim(form.team_id.value) == "" && trim(form.team_name.value) != "") || 
		 (trim(form.team_id.value) != "" && trim(form.team_name.value) == "")) {
		isError = true;
		errorMessage += "\\n$sqs_no_match";	
	}
	
	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	
	//make sure start date is <= end_date

	return true;
}
</script>

EOQ;

return $the_script;
}

?>

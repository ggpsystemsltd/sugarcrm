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




//for users
function user_get_validate_record_js() {
}
function user_get_chooser_js() {
}
function user_get_confsettings_js() {
};
//end for users
function get_chooser_js() {
	// added here for compatibility
}
function get_validate_record_js() {
}
function get_new_record_form() {

	if(empty($_SESSION['studio']['module']))return '';

	global $mod_strings;
	$module_name = $_SESSION['studio']['module'];
	$debug = true;
	$html = "";


	$html = get_left_form_header($mod_strings['LBL_TOOLBOX']);
	$add_field_icon = SugarThemeRegistry::current()->getImage("plus_inline", 'style="margin-left:4px;margin-right:4px;" border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_ADD_FIELD']);
	$minus_field_icon = SugarThemeRegistry::current()->getImage("minus_inline", 'style="margin-left:4px;margin-right:4px;" border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_ADD_FIELD']);
	$edit_field_icon = SugarThemeRegistry::current()->getImage("edit_inline", 'style="margin-left:4px;margin-right:4px;" border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_ADD_FIELD']);
	$delete = SugarThemeRegistry::current()->getImage("delete_inline", "border='0' style='margin-left:4px;margin-right:4px;'",null,null,'.gif',$mod_strings['LBL_DELETE']);
	$show_bin = true;
	if (isset ($_REQUEST['edit_subpanel_MSI']))
	global $sugar_version, $sugar_config;
		$show_bin = false;

	$html .= "

			<script type=\"text/javascript\" src=\"modules/DynamicLayout/DynamicLayout_3.js\">
			</script>
			<p>
		";

	if (isset ($_REQUEST['edit_col_MSI'])) {
		// do nothing
	} else {
		$html .= <<<EOQ


	   <link rel="stylesheet" type="text/css" href="include/javascript/yui-old/assets/container.css" />
		            	<script type="text/javascript" src="include/javascript/yui-old/container.js"></script>
					<script type="text/javascript" src="include/javascript/yui-old/PanelEffect.js"></script>



EOQ;

		$field_style = '';
		$bin_style = '';

		$add_icon = SugarThemeRegistry::current()->getImage("plus_inline", 'style="margin-left:4px;margin-right:4px;" border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_MAXIMIZE']);
		$min_icon = SugarThemeRegistry::current()->getImage("minus_inline", 'style="margin-left:4px;margin-right:4px;"  border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_MINIMIZE']);
	   $del_icon = SugarThemeRegistry::current()->getImage("delete_inline", 'style="margin-left:4px;margin-right:4px;" border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_MINIMIZE']);
		$html .=<<<EOQ
		              <br><br><table  cellpadding="0" cellspacing="0" border="1" width="100%"   id='s_field_delete'>
							<tr><td colspan='2' align='center'>
					       $del_icon <br>Drag Fields Here To Delete
						</td></tr></table>
					<div id="s_fields_MSIlink" style="display:none">
						<a href="#" onclick="toggleDisplay('s_fields_MSI');">
							 $add_icon {$mod_strings['LBL_VIEW_SUGAR_FIELDS']}
						</a>
					</div>
					<div id="s_fields_MSI" style="display:inline">

						<table  cellpadding="0" cellspacing="0" border="0" width="100%" id="studio_fields">
							<tr><td colspan='2'>

									<a href="#" onclick="toggleDisplay('s_fields_MSI');">$min_icon</a>{$mod_strings['LBL_SUGAR_FIELDS_STAGE']}
								    <br><select id='studio_display_type' onChange='filterStudioFields(this.value)'><option value='all'>All<option value='custom'>Custom</select>
									</td>
							</tr>
						</table>
					</div>

EOQ;

	}
	$html .= get_left_form_footer();
	if (!$debug)
		return $html;
	return $html.<<<EOQ

EOQ;
}
?>

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


//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function template_reports_functions_js(&$args)
{
global $mod_strings;
global $sugar_config, $sugar_version;
?>
<script language="javascript">
var image_path = "<?php echo $args['IMAGE_PATH']; ?>";
var lbl_and = "<?php echo $mod_strings['LBL_AND']; ?>";
var lbl_select = "<?php echo $mod_strings['LBL_SELECT']; ?>";
var lbl_remove = "<?php echo $mod_strings['LBL_REMOVE']; ?>";
var lbl_missing_fields = "<?php echo $mod_strings['LBL_MISSING_FIELDS']; ?>";
var lbl_at_least_one_display_column = "<?php echo $mod_strings['LBL_AT_LEAST_ONE_DISPLAY_COLUMN']; ?>";
var lbl_at_least_one_summary_column = "<?php echo $mod_strings['LBL_AT_LEAST_ONE_SUMMARY_COLUMN']; ?>";
var lbl_missing_input_value  = "<?php echo $mod_strings['LBL_MISSING_INPUT_VALUE']; ?>";
var lbl_missing_second_input_value = "<?php echo $mod_strings['LBL_MISSING_SECOND_INPUT_VALUE']; ?>";
var lbl_nothing_was_selected = "<?php echo $mod_strings['LBL_NOTHING_WAS_SELECTED']; ?>"
var lbl_none = "<?php echo $mod_strings['LBL_NONE']; ?>";
var lbl_outer_join_checkbox = "<?php echo $mod_strings['LBL_OUTER_JOIN_CHECKBOX']; ?>";
var lbl_add_related = "<?php echo $mod_strings['LBL_ADD_RELATE']; ?>";
var lbl_del_this = "<?php echo $mod_strings['LBL_DEL_THIS']; ?>";
var lbl_alert_cant_add = "<?php echo $mod_strings['LBL_ALERT_CANT_ADD']; ?>";
var lbl_related_table_blank = "<?php echo $mod_strings['LBL_RELATED_TABLE_BLANK']; ?>";
var lbl_optional_help = "<?php echo $mod_strings['LBL_OPTIONAL_HELP']; ?>";
</script>
<?php echo getVersionedScript('include/javascript/report_additionals.js');
}
?>
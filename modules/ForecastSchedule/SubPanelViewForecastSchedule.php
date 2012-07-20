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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
********************************************************************************/






global $app_strings;
//we don't want the parent module's string file, but rather the string file specifc to this subpanel
global $current_language;
$current_module_strings = return_module_language($current_language, 'ForecastSchedule');

global $currentModule;

global $theme;
global $action;




// focus_list is the means of passing data to a SubPanelView.
global $focus_list;
global $focus;

$button  = "<table cellspacing='0' cellpadding='1' border='0'><form border='0' action='index.php' method='post' name='subpanel' id='form'>\n";
$button .= "<input type='hidden' name='module' value='ForecastSchedule'>\n";
$button .= "<input type='hidden' name='timeperiod_id' value='$focus->id'>\n";
$button .= "<input type='hidden' name='timeperiod_name' value='$focus->name'>\n";
$button .= "<input type='hidden' name='start_date' value='$focus->start_date'>\n";
$button .= "<input type='hidden' name='end_date' value='$focus->end_date'>\n";
$button .= "<input type='hidden' name='return_module' value='ForecastSchedule'>\n";
$button .= "<input type='hidden' name='return_action' value='DetailView'>\n";
$button .= "<input type='hidden' name='return_id' value='".$focus->id."'>\n";
$button .= "<input type='hidden' name='action'>\n";
$button .= "<tr>";
$button .= "<td><input title='".$app_strings['LBL_NEW_BUTTON_TITLE']."'  class='button' onclick=\"this.form.action.value='EditView'\" type='submit' id='btn_save' name='button' value='".$app_strings['LBL_NEW_BUTTON_LABEL']."'></td>\n";
$button .= "</tr></form></table>\n";

// Stick the form header out there.
echo get_form_header($current_module_strings['LBL_SVFS_HEADER'], $button, false);


$return_url = "&return_action=DetailView&return_module=TimePeriods&return_id=".$focus->id;

$seeddata = new ForecastSchedule();
$ListView = new ListView();
$ListView->show_export_button=false;
$ListView->show_delete_button = false;
$ListView->show_select_menu = false;
$ListView->initNewXTemplate('modules/ForecastSchedule/SubPanelViewForecastSchedule.html',$current_module_strings);
$ListView->display_header_and_footer = false;
$ListView->setQuery(" timeperiod_id = '$focus->id'","","","");
$ListView->xTemplateAssign("RETURN_URL", $return_url);
$ListView->processListView($seeddata, "main", "SCHEDULE");

?>
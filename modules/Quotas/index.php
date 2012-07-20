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

 * Description:  
 ********************************************************************************/

global $theme;






/* Requires to get the Currencies available to use */

require_once('modules/Currencies/ListCurrency.php');

$header_text = '';
global $mod_strings;
global $app_list_strings;
global $app_strings;
global $current_user;
global $sugar_config;

$focus = new Quota();
$currency = new ListCurrency();
$params = array();
$params[] = "<a href='index.php?module=Forecasts&action=index'>{$mod_strings['LBL_MODULE_FORECASTS_NAME']}</a>";
$params[] = $mod_strings['LBL_MODULE_NAME'];
echo getClassicModuleTitle($focus->module_dir, $params, true);

/* Set initial booleans for the module */
$is_edit = false;
$is_new = false;
$is_timeperiod_set = false;

/* 
 * Check if the time period is set, if it isn't, only display a dropdown 
 * to select a time period.
 */
if (!empty($_REQUEST['timeperiod_id'])){
	$optionsTimePeriod = $focus->getTimePeriodsSelectList($_REQUEST['timeperiod_id']);
	$currentUserQuota = $focus->getCurrentUserQuota($_REQUEST['timeperiod_id']);
	$timeperiod_id = $_REQUEST['timeperiod_id'];
}
else
	$optionsTimePeriod = $focus->getTimePeriodsSelectList();

/* 
 * Check to see if both the records and timeperiod query strings are 
 * available. If the record string is not processed, only display 
 * data (self quota and directed quota) for time period only  
 */
if(!empty($_REQUEST['record'])) {
	
	/* if the record query string says new, must edit and bring up a 
	 * blank text field to fill in a new value for user
	 */
	if ($_REQUEST['record'] == "new"){
		$is_new = true;
		$is_edit = true;
		$user_id = $_REQUEST['user_id'];
	}
	/* otherwise, it is possible to edit the record */
	else {	
    	$result = $focus->retrieve($_REQUEST['record']);
    	if($result == null)
    	{
    		sugar_die($app_strings['ERROR_NO_RECORD']);
    	}
		$is_edit=true;
		$user_id = $focus->user_id;
	}	
}
else
{
	$user_id = $focus->id;
}

$GLOBALS['log']->info("Quota list view");

$currentUserQuotaRow = '';
if (!empty($currentUserQuota['amount'])){
	$currentUserQuotaRow .= "<td scope='col' width='50%'><slot>" . $mod_strings['LBL_CURRENT_USER_QUOTA'] . "<br /><b>" . $currentUserQuota['formatted_amount'] . "</b></td>\n";
}
else if (!empty($_REQUEST['timeperiod_id'])){ 
	$currentUserQuotaRow .= "<td scope='col' width='50%'><slot>" . $mod_strings['LBL_CURRENT_USER_NO_QUOTA'] . "</td>\n";
}

$selectTimePeriod = "<br />\n";
$selectTimePeriod .= "<tr>\n";
$selectTimePeriod .= "<td width='50%' valign='top' class='dataLabel'><slot> " . $mod_strings['LBL_TIME_PERIOD'] . "</slot>\n";
$selectTimePeriod .= "<slot>\n";
$selectTimePeriod .= "<select name='timeperiod' ONCHANGE='location = this.options[this.selectedIndex].value;'>\n";
$selectTimePeriod .= $optionsTimePeriod;
$selectTimePeriod .= "</select>\n";
$selectTimePeriod .= "</slot>\n";
$selectTimePeriod .= "</td>\n";

$listViewHeader = $selectTimePeriod . $currentUserQuotaRow;
$listViewHeader .= "</tr>\n";

$where  = "quotas.deleted=0 ";
if (!empty($_REQUEST['timeperiod_id']))
	$where .= " AND quotas.timeperiod_id = '" . $_REQUEST['timeperiod_id'] ."'";

///////////////////////////////////////////////////////////////////////////////
////	QUOTAS MODULE LIST VIEW

$ListView = new ListView();

if(is_admin($current_user) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace'])){	
		$header_text = "&nbsp;<a href='index.php?action=index&module=DynamicLayout&from_action=ListView&from_module=".$_REQUEST['module'] ."'>".SugarThemeRegistry::current()->getImage("EditLayout","border='0' align='bottom'",null,null,'.gif',$mod_strings['LBL_EDITLAYOUT'])."</a>";
}
$ListView->initNewXTemplate( 'modules/Quotas/ListView.html',$mod_strings);
$ListView->setHeaderTitle($mod_strings['LBL_LIST_FORM_TITLE'] . $header_text);
$ListView->setHeaderText($listViewHeader);
$ListView->show_export_button = false;
$ListView->show_mass_update = false;
$ListView->show_delete_button=false;
$ListView->show_select_menu=false;
$ListView->setQuery($where, "", "", "QUOTA");

$row_count = $focus->getQuotaRowCount($focus->create_new_list_query("",$where));

if (!empty($_REQUEST['timeperiod_id'])) {

	/* if the user is not a manager, get the user's self quota
	 * and use a strip down version of ListView to process the
	 * quota object
	 */
	if (!$focus->isManager($current_user->id)){
		$ListView->processListView($focus, "", "");
	}	
	/* otherwise, the user is a manager, and he/she has the available
	 * tools to view and edit the quotas for their direct reports.
	 */	
	else {
	
		/* if records are available for the direct reports, 
		 * get the group quota and process the ListView
		 */
		if ($row_count > 0){
			$groupQuota = $focus->getGroupQuota($_REQUEST['timeperiod_id']);
			$ListView->xTemplateAssign("GROUP_QUOTA", 
										outputGroupQuota($focus->getGroupQuota($_REQUEST['timeperiod_id'],false)));
			$currency->getSelectOptions();
			$ListView->xTemplateAssign("JAVASCRIPT2", $currency->getJavascript());	
			$ListView->processListViewTwo($focus, "main", "QUOTA");
		}
		
		/* otherwise, process the ListView and letting them know that 
		 * no quotas have been entered for their direct reports
		 */
		else
		{
			$ListView->xTemplateAssign("NOQUOTA", $mod_strings['LBL_NO_QUOTAS_TIMEPERIOD']);
			$ListView->processListViewTwo($focus, "main", "");
		}
	
///////////////////////////////////////////////////////////////////////////////
////	QUOTAS MODULE EDIT VIEW
	
		$GLOBALS['log']->info("Quota edit view");

		$committed = '';
		$disabled = '';
		
		if ($focus->currency_id == NULL)
	    	$selectCurrency = $currency->getSelectOptions();
	    else
	        $selectCurrency = $currency->getSelectOptions($focus->currency_id);
	
		if (empty($_REQUEST['user_id']))
		{
			$selectManagedUsers = $focus->getUserManagedSelectList($_REQUEST['timeperiod_id']);
			$disabled = 'disabled="disabled"';			
		}
		else{
			$selectManagedUsers = $focus->getUserManagedSelectList($_REQUEST['timeperiod_id'],
																   $_REQUEST['user_id']);
																   
			if ($focus->committed == 1){
				$committed = "CHECKED";
			}
		}
	
		$edit_button ="<form name='EditView' method='POST' action='index.php'>\n";
		$edit_button .="<input type='hidden' name='module' value='Quotas'>\n";
		if (!$is_new) {
			$edit_button .="<input type='hidden' name='record' value='$focus->id'>\n";
		}
		$edit_button .="<input type='hidden' name='user_id' value='$user_id'>\n";
		$edit_button .="<input type='hidden' name='timeperiod_id' value='$timeperiod_id'>\n";	
		
		$edit_button .="<input type='hidden' name='action'>\n";
		$edit_button .="<input type='hidden' name='edit'>\n";
		$edit_button .="<input type='hidden' name='isDuplicate'>\n";			
		$edit_button .="<input type='hidden' name='return_module' value='Quotas'>\n";
		$edit_button .="<input type='hidden' name='return_action' value='index'>\n";
		$edit_button .="<input type='hidden' name='return_user_id' value='$user_id'>\n";
		$edit_button .="<input type='hidden' name='return_timeperiod_id' value='$timeperiod_id'>\n";		
		$edit_button .="<input type='hidden' name='return_id' value=''>\n";
		
		$edit_button .='<input title="'.$app_strings['LBL_SAVE_BUTTON_TITLE'].'" accessKey="'.$app_strings['LBL_SAVE_BUTTON_KEY'].'" class="button" ' . $disabled . ' onclick="this.form.action.value=\'Save\'; return check_form(\'EditView\');" type="submit" name="button" value="  '.$app_strings['LBL_SAVE_BUTTON_LABEL'].'  " >';
	
	    echo get_form_header($mod_strings['LBL_QUOTA']." ".$focus->user_full_name . '&nbsp;' . $header_text,$edit_button , false);
		
	    $GLOBALS['log']->info("Quota edit view");	
	    $xtpl=new XTemplate ('modules/Quotas/EditView.html');
	    $xtpl->assign("MOD", $mod_strings);
	    $xtpl->assign("APP", $app_strings);
	
		if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
		if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
		if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
		$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
		$xtpl->assign("JAVASCRIPT", get_set_focus_js());
		$xtpl->assign("ID", $focus->id);
		$xtpl->assign("USER_ID", $focus->user_id);
		$xtpl->assign('AMOUNT', $focus->amount);
		$xtpl->assign('USERNAME', $focus->user_name);
		$xtpl->assign("CURRENCY", $selectCurrency);
		$xtpl->assign("USERS", $selectManagedUsers);
		$xtpl->assign("COMMITTED", $committed);
			
		$xtpl->parse("main");
		$xtpl->out("main");
		
		
		$javascript = new javascript();
		$javascript->setFormName('EditView');
		$javascript->setSugarBean($focus);
		$javascript->addAllFields('');
		
		echo $javascript->getScript();
	}
}

/* Do not process the usual "main" ListView page, just use the quota object
 * and deliver the time period.
 */
else
	$ListView->processListViewTwo($focus, "", "");
	
function outputGroupQuota($groupQuota)
{
	$currency = new ListCurrency();
	
	$outputTotal = "<tr height='20'>\n";
	$outputTotal .= "<td scope='col'><slot>&nbsp;</slot></td>\n";
	$outputTotal .= "<td scope='col' colspan='3' ><slot>Total</slot></td>\n";
	$outputTotal .= "</tr>\n";
	$outputTotal .= "<tr height='20'>\n";
	$outputTotal .= "<td scope='row' valign=TOP  class='oddListRowS1' bgcolor='#fdfdfd'><slot>&nbsp;</slot></td>\n";
	$outputTotal .= "<td valign=TOP colspan='3' class='oddListRowS1' bgcolor='#fdfdfd'><slot>\n";
	$outputTotal .= "<b><span id='groupQuota'>" . format_number($groupQuota, 2, 2, array('convert' => true, 'currency_symbol' => true)) . "</span></b>\n";
	$outputTotal .= "&nbsp;&nbsp;&nbsp;&nbsp;" ;
 //removing the currency dropdown becuase the amount is already formatted.
//					"<select onChange=\"ConvertRateSingle(this.options[this.selectedIndex].value," .
//														 "document.getElementById('groupQuota'));\">";
//	$outputTotal .= $currency->getSelectOptions();
//	$outputTotal .= "</select>";
	 
	$outputTotal .= "</slot></td>\n";
	$outputTotal .= "</tr>\n";
	
	return $outputTotal;
}	

?>

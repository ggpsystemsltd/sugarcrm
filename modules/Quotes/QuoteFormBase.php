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

 * Description:  base form for account
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

class QuoteFormBase{

function checkForDuplicates($prefix){
	require_once('include/formbase.php');

	$focus = new Quote();
	if(!checkRequired($prefix, array_keys($focus->required_fields))){
		return null;
	}
	$query = '';
	$baseQuery = 'select id, name, quote_stage, from quotes where deleted!=1 and (';
	if(isset($_POST[$prefix.'name']) && !empty($_POST[$prefix.'name'])){
		$query = $baseQuery ."  name like '%".$_POST[$prefix.'name']."%'";
		$query .= getLikeForEachWord('name', $_POST[$prefix.'name']);
	}
	if(!empty($query)){
		$rows = array();

		$db = DBManagerFactory::getInstance();
		$result = $db->query($query.');');
        while($row = $db->fetchByAssoc($result)) {
            $rows[] = $row;
        }
		if(count($rows) > 0) return $rows;
	}
	return null;
}


function buildTableForm($rows, $mod='Quotes'){
	if(!ACLController::checkAccess('Quotes', 'edit', true)){
		return '';
	}
	if(!empty($mod)){
	global $current_language;
	$mod_strings = return_module_language($current_language, $mod);
	}else global $mod_strings;
	global $app_strings;
	$cols = sizeof($rows[0]) * 2 + 1;
	$form = '<table width="100%"><tr><td>'.$mod_strings['MSG_DUPLICATE']. '</td></tr><tr><td height="20"></td></tr></table>';

	$form .= "<form action='index.php' method='post' name='dupOpps'><input type='hidden' name='selectedQuote' value=''>";
	$form .=  get_form_header($mod_strings['LBL_DUPLICATE'], "", '');
	$form .= "<table width='100%' cellpadding='0' cellspacing='0'>	<tr >	<td ></TD>";
	require_once('include/formbase.php');
	$form .= getPostToForm();
	if(isset($rows[0])){
		foreach ($rows[0] as $key=>$value){
			if($key != 'id'){
					$form .= "<td >". $mod_strings[$mod_strings['db_'.$key]]. "</td>";
		}}
		$form .= "</tr>";
	}

	$rowColor = 'oddListRowS1';
	foreach($rows as $row) {

		$form .= "<tr class='$rowColor'><td width='1%' nowrap='nowrap'><a href='#' onclick='document.dupOpps.selectedQuote.value=\"${row['id']}\";document.dupOpps.submit();'>[${app_strings['LBL_SELECT_BUTTON_LABEL']}]</a>&nbsp;&nbsp;</td>";
		foreach ($row as $key=>$value){
            if($key != 'id'){
                $form .= "<td><a target='_blank' href='index.php?module=Quotes&action=DetailView&record=${row['id']}'>$value</a></td>";
            }
        }

		if($rowColor == 'evenListRowS1'){
			$rowColor = 'oddListRowS1';
		}else{
			 $rowColor = 'evenListRowS1';
		}
		$form .= "</tr>";
	}
			$form .= "<tr ><td colspan='$cols' class='blackline'></td></tr>";
	$form .= "</table><BR><input type='submit' class='button' name='ContinueQuote' value='${app_strings['LBL_CREATE_BUTTON_LABEL']} ${mod_strings['LNK_NEW_QUOTE']}'></form>";

	return $form;



}

function getForm($prefix, $mod='Quotes'){
	if(!ACLController::checkAccess('Quotes', 'edit', true)){
		return '';
	}
if(!empty($mod)){
	global $current_language;
	$mod_strings = return_module_language($current_language, $mod);
}else global $mod_strings;
global $app_strings;
global $sugar_version, $sugar_config;

$lbl_save_button_title = $app_strings['LBL_SAVE_BUTTON_TITLE'];
$lbl_save_button_key = $app_strings['LBL_SAVE_BUTTON_KEY'];
$lbl_save_button_label = $app_strings['LBL_SAVE_BUTTON_LABEL'];


$the_form = get_left_form_header($mod_strings['LBL_NEW_FORM_TITLE']);
$the_form .= getVersionedScript("modules/Quotes/Forms.js");
$the_form .= <<<EOQ
		<form name="{$prefix}EditView" onSubmit="return check_form('{$prefix}EditView')" method="POST" action="index.php">
			<input type="hidden" name="{$prefix}module" value="Quotes">
			<input type="hidden" name="${prefix}action" value="Save">
EOQ;
$the_form .= $this->getFormBody($prefix, $mod, "{$prefix}EditView");
$the_form .= <<<EOQ
		<input title="$lbl_save_button_title" accessKey="$lbl_save_button_key" class="button" type="submit" name="button" value="  $lbl_save_button_label  " >
		</form>

EOQ;
$the_form .= get_left_form_footer();
$the_form .= get_validate_record_js();

return $the_form;
}

function getWideFormBody($prefix, $mod='Quotes', $formname='', $lead=''){
	if(!ACLController::checkAccess('Quotes', 'edit', true)){
		return '';
	}

	if(empty($lead)){
		$lead = new Lead();
	}

if(!empty($mod)){
	global $current_language;
	$mod_strings = return_module_language($current_language, $mod);
}else global $mod_strings;
global $app_strings;
global $app_list_strings;
global $theme;
global $current_user;
// Unimplemented until jscalendar language files are fixed
// global $current_language;
// global $default_language;
// global $cal_codes;

$lbl_required_symbol = $app_strings['LBL_REQUIRED_SYMBOL'];
$lbl_quote_name = $mod_strings['LBL_QUOTE_NAME'];
$lbl_sales_stage = $mod_strings['LBL_SALES_STAGE'];
$lbl_date_closed = $mod_strings['LBL_DATE_QUOTE_EXPECTED_CLOSED'];
$lbl_amount = $mod_strings['LBL_AMOUNT'];
$ntc_date_format = $app_strings['NTC_DATE_FORMAT'];

$user_id = $current_user->id;
// Unimplemented until jscalendar language files are fixed
// $cal_lang = (empty($cal_codes[$current_language])) ? $cal_codes[$default_language] : $cal_codes[$current_language];
$cal_lang = "en";
$cal_dateformat = parse_calendardate($app_strings['NTC_DATE_FORMAT']);
$jsCalendarImage = SugarThemeRegistry::current()->getImageURL("jscalendar.gif");
$the_form = <<<EOQ

			<input type="hidden" name="{$prefix}record" value="">
			<input type="hidden" name="{$prefix}billing_account_name" value="skip_me">
			<input type="hidden" name="{$prefix}assigned_user_id" value='${user_id}'>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
    <td width="20%" scope="row">$lbl_quote_name&nbsp;<span class="required">$lbl_required_symbol</span></td>
    <td width="80%" scope="row">{$mod_strings['LBL_DESCRIPTION']}</td>
</tr>
<tr>
    <td ><input name='{$prefix}name' type="text" value="{$lead->quote_name}"></td>
	<td  rowspan="7"><textarea name='{$prefix}description' rows='5' cols='50'></textarea></td>
</tr>
<tr>
    <td scope="row">$lbl_date_closed&nbsp;<span class="required">$lbl_required_symbol</span>
	<br><span class="dateFormat">$ntc_date_format</span></td>
</tr>
<tr>
<td ><input name='{$prefix}date_quote_expected_closed' onblur="parseDate(this, '$cal_dateformat');" size='12' maxlength='10' id='${prefix}jscal_field' type="text" value="">&nbsp;<!--not_in_theme!--><img src="{$jsCalendarImage}" alt="{$app_strings['LBL_ENTER_DATE']}"  id="${prefix}jscal_trigger" align="absmiddle"></td>
</tr>
<tr>
    <td scope="row">$lbl_sales_stage&nbsp;<span class="required">$lbl_required_symbol</span></td>
</tr>
<tr>
    <td ><select name='{$prefix}sales_stage'>
EOQ;
$the_form .= get_select_options_with_id($app_list_strings['sales_stage_dom'], "");
$the_form .= <<<EOQ
		</select></td>
</tr>
<tr>
    <td scope="row">$lbl_amount&nbsp;<span class="required">$lbl_required_symbol</span></td>
</tr>
<tr>
    <td ><input name='{$prefix}amount' type="text" value='{$lead->quote_amount}'></td>
</tr>
</table>

		<script type="text/javascript">
		Calendar.setup ({
			inputField : "{$prefix}jscal_field", ifFormat : "$cal_dateformat", showsTime : false, button : "${prefix}jscal_trigger", singleClick : true, step : 1, weekNumbers:false
		});
		</script>


EOQ;


$javascript = new javascript();
$javascript->setFormName($formname);
$javascript->setSugarBean(new Quote());
$javascript->addRequiredFields($prefix);
$the_form .=$javascript->getScript();

return $the_form;

}

function getFormBody($prefix, $mod='Quotes', $formname=''){
	if(!ACLController::checkAccess('Quotes', 'edit', true)){
		return '';
	}
if(!empty($mod)){
	global $current_language;
	$mod_strings = return_module_language($current_language, $mod);
}else global $mod_strings;
global $app_strings;
global $app_list_strings;
global $theme;
global $current_user;
global $timedate;

$lbl_required_symbol = $app_strings['LBL_REQUIRED_SYMBOL'];
$lbl_quote_name = $mod_strings['LBL_QUOTE_NAME'];
$lbl_quote_stage = $mod_strings['LBL_QUOTE_STAGE'];

$user_id = $current_user->id;
$team_id = $current_user->default_team;

///////////////////////////////////////
///
/// SETUP ACCOUNT POPUP

$popup_request_data = array(
	'call_back_function' => 'set_form_return',
	'form_name' => "{$prefix}EditView",
	'field_to_name_array' => array(
		'id' => 'billing_account_id',
		'name' => "{$prefix}billing_account_name",
		'billing_address_street' => "{$prefix}billing_address_street",
		'billing_address_city' => "{$prefix}billing_address_city",
		'billing_address_state' => "{$prefix}billing_address_state",
		'billing_address_postalcode' => "{$prefix}billing_address_postalcode",
		'billing_address_country' => "{$prefix}billing_address_country",
		),
	);

$json = getJSONobj();
$encoded_popup_request_data = $json->encode($popup_request_data);

//
///////////////////////////////////////
$default_date_start = $timedate->asUserDate($timedate->getNow());
$cal_dateformat = $timedate->get_cal_date_format();
$jsCalendarImage = SugarThemeRegistry::current()->getImageURL("jscalendar.gif");
$the_form = <<<EOQ

			<p><input type="hidden" name="{$prefix}record" value="">
			<input type="hidden" name="{$prefix}assigned_user_id" value="{$user_id}">
			<input type="hidden" name="{$prefix}team_id" value="{$team_id}">
			<input type="hidden" name="{$prefix}billing_address_street">
			<input type="hidden" name="{$prefix}billing_address_city">
			<input type="hidden" name="{$prefix}billing_address_state">
			<input type="hidden" name="{$prefix}billing_address_postalcode">
			<input type="hidden" name="{$prefix}billing_address_country">
		$lbl_quote_name&nbsp;<span class="required">$lbl_required_symbol</span><br>
		<input name='{$prefix}name' type="text" value=""><br>
		${mod_strings['LBL_ACCOUNT_NAME']}&nbsp;<span class="required">${lbl_required_symbol}</span><br>
		<input name='{$prefix}billing_account_name' type='text' readonly value="" size="16">
		<input name='billing_account_id' type="hidden" value=''>&nbsp;<input title="{$app_strings['LBL_SELECT_BUTTON_TITLE']}" type="button" class="button" value='{$app_strings['LBL_SELECT_BUTTON_LABEL']}' name=btn1 onclick='open_popup("Accounts", 600, 400, "", true, false, {$encoded_popup_request_data});' /><br>
		${mod_strings['LBL_DATE_QUOTE_EXPECTED_CLOSED']}&nbsp;<span class="required">${lbl_required_symbol}</span><br>		
		<input name='{$prefix}date_quote_expected_closed' id='{$prefix}date_quote_expected_closed' onblur="parseDate(this, '$cal_dateformat');" type="text" maxlength="10" value="${default_date_start}"> <!--not_in_theme!--><img src="{$jsCalendarImage}" alt="{$app_strings['LBL_ENTER_DATE']}"  id="date_quote_expected_closed_trigger" align="absmiddle"><br>
		$lbl_quote_stage&nbsp;<span class="required">$lbl_required_symbol</span><br>
		<select name='{$prefix}quote_stage'>
EOQ;
$the_form .= get_select_options_with_id($app_list_strings['quote_stage_dom'], "");
$the_form .= <<<EOQ
		</select><br>
		<script type="text/javascript">
		Calendar.setup({
			inputField : "date_quote_expected_closed", daFormat : "$cal_dateformat", ifFormat : "$cal_dateformat", showsTime : false, button : "date_quote_expected_closed_trigger", singleClick : true, step : 1, weekNumbers:false
		});
		</script>
EOQ;



$javascript = new javascript();
$javascript->setFormName($formname);
$javascript->setSugarBean(new Quote());
$javascript->addRequiredFields($prefix);
$javascript->addField('date_quote_expected_closed', true, $prefix);
$the_form .=$javascript->getScript();


return $the_form;

}


function handleSave($prefix,$redirect=true, $useRequired=false){


	require_once('include/formbase.php');

	$focus = new Quote();
	if($useRequired &&  !checkRequired($prefix, array_keys($focus->required_fields))){
		return null;
	}
	$focus = populateFromPost($prefix, $focus);
	if(!$focus->ACLAccess('Save')){
		ACLController::displayNoAccess(true);
		sugar_cleanup(true);
	}
	$focus->save($GLOBALS['check_notify']);
	$return_id = $focus->id;

	$GLOBALS['log']->debug("Saved record with id of ".$return_id);
	if($redirect){
		handleRedirect($return_id,"Quotes" );
	}else{
		return $focus;
	}
}

}
?>

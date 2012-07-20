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

/*
 * Created on Oct 4, 2005
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */






require_once ('include/JSON.php');
require_once('modules/MailMerge/modules_array.php');




global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $odd_bg;
global $even_bg;
global $sugar_version, $sugar_config;
global $locale;

$xtpl = new XTemplate('modules/MailMerge/Step3.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if(!isset($_SESSION['MAILMERGE_MODULE']))
{
	if(isset($_POST['mailmerge_module']))
	{
		$_SESSION['MAILMERGE_MODULE'] = $_POST['mailmerge_module'];
	}	
}

if(isset($_POST['contains_contact_info'])){

	$_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'] = $_POST['contains_contact_info'];	

}

if(!isset($_SESSION["MAILMERGE_DOCUMENT_ID"]))
{
	if(!empty($_POST['document_id']))
	{
		$_SESSION['MAILMERGE_DOCUMENT_ID'] = $_POST['document_id'];
	}
}
$document_id = $_SESSION["MAILMERGE_DOCUMENT_ID"];
$document = new Document();
$document->retrieve($document_id);
$_SESSION["MAILMERGE_TEMPLATE"] = $document->document_name;	

if(!empty($_POST['selected_objects']))
{
	$selObjs = urldecode($_POST['selected_objects']);
	$_SESSION['SELECTED_OBJECTS_DEF'] = $selObjs;
}
else
{
	$selObjs = $_SESSION['SELECTED_OBJECTS_DEF'];
}
$sel_obj = array();
parse_str(html_entity_decode($selObjs, ENT_QUOTES),$sel_obj);
$step_num = 3;
if(isset($_SESSION['MAILMERGE_RECORD']))
{
	$xtpl->assign("PREV_STEP", '2');
	$step_num = 3;
	//$xtpl->assign("RECORD", $_SESSION['MAILMERGE_RECORD']);	
}
else
{
	$xtpl->assign("PREV_STEP", '2');
}
$xtpl->assign("STEP_NUM", "Step ".$step_num.":");
$popup_request_data = array ('call_back_function' => 'set_return', 'form_name' => 'EditView', 'field_to_name_array' => array ('id' => 'rel_id', 'name' => 'rel_name',),);
	$json = getJSONobj();

	// must urlencode to put into the filter request string
	// because IE gets an out of memory error when it is passed
	// as the usual object literal
$encoded_popup_request_data = urlencode($json->encode($popup_request_data));

$modules = $modules_array;


$xtpl->assign("MAILMERGE_MODULE_OPTIONS", get_select_options_with_id($modules, '0'));
$change_parent_button = "<input title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' tabindex='2' type='button' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='button' onclick='open_popup(document.EditView.rel_type.value, 600, 400, \"&request_data=$encoded_popup_request_data\", true, false, {});' />";

$change_parent_button = "<input title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' tabindex='2' type='button' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='button' onclick='open_popup(document.EditView.parent_type.value, 600, 400, \"&request_data=$encoded_popup_request_data\", true, false, {});' />";
$xtpl->assign("CHANGE_PARENT_BUTTON", $change_parent_button);

$relModule = $_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'];
$xtpl->assign("STEP3_HEADER", "Set ".get_singular_bean_name($relModule)." Association");


$select = "Select id, name from contacts";

$selQuery = array ('Contacts'=>array('Accounts' => 'SELECT contacts.* FROM contacts LEFT JOIN accounts_contacts ON contacts.id=accounts_contacts.contact_id AND (accounts_contacts.deleted is NULL or accounts_contacts.deleted=0)',
'Contacts' => '',
'Opportunities' => 'SELECT contacts.* FROM contacts LEFT JOIN opportunities_contacts ON contacts.id=opportunities_contacts.contact_id AND (opportunities_contacts.deleted is NULL or opportunities_contacts.deleted=0)',
'Leads' => '',
'Cases' => 'SELECT contacts.* FROM contacts LEFT JOIN contacts_cases ON contacts.id=contacts_cases.contact_id AND (contacts_cases.deleted is NULL or contacts_cases.deleted=0)',
'Bugs' => 'SELECT contacts.* FROM contacts LEFT JOIN contacts_bugs ON contacts.id=contacts_bugs.contact_id AND (contacts_bugs.deleted is NULL or contacts_bugs.deleted=0)',
'Quotes' => 'SELECT contacts.* FROM contacts LEFT JOIN quotes_contacts ON contacts.id=quotes_contacts.contact_id AND (quotes_contacts.deleted is NULL or quotes_contacts.deleted=0)'),
'Opportunities'=>array("Accounts"=>'SELECT opportunities.id, opportunities.name FROM opportunities LEFT JOIN accounts_opportunities ON opportunities.id = accounts_opportunities.opportunity_id AND (accounts_opportunities.deleted is NULL or accounts_opportunities.deleted=0)'),
'Accounts'=>array("Opportunities"=>'SELECT accounts.id, accounts.name FROM accounts LEFT JOIN accounts_opportunities ON accounts.id = accounts_opportunities.account_id AND (accounts_opportunities.deleted is NULL or accounts_opportunities.deleted=0)'),
);
$whereQuery = array('Contacts' => array('Accounts' => 'accounts_contacts.contact_id = contacts.id AND accounts_contacts.account_id = ',
'Contacts' => '',
'Opportunities' => 'opportunities_contacts.contact_id = contacts.id AND opportunities_contacts.opportunity_id = ',
'Leads' => '',
'Cases' => 'contacts_cases.contact_id = contacts.id AND contacts_cases.case_id = ',
'Bugs' => 'contacts_bugs.contact_id = contacts.id AND contacts_bugs.bug_id = ',
'Quotes' => 'quotes_contacts.contact_id = contacts.id AND quotes_contacts.quote_id = '),
'Opportunities'=>array('Accounts'=>'accounts_opportunities.opportunity_id = opportunities.id AND accounts_opportunities.account_id = '),
'Accounts'=>array('Opportunities'=>'accounts_opportunities.account_id = accounts.id  AND accounts_opportunities.opportunity_id = '),
);



$contact = new Contact();


global $beanList, $beanFiles;
$class_name = $beanList[$relModule ];
require_once($beanFiles[$class_name]);
$seed = new $class_name();

if(isset($_SESSION['MAILMERGE_SKIP_REL']) && $_SESSION['MAILMERGE_SKIP_REL'])
{
	$disabled = 'disabled';
}
else
{
	$disabled = '';
}
$oddRow = true;


foreach($sel_obj as $key => $value)
{
	$value = str_replace("##", "&", $value);
	$value = stripslashes($value);
	$code = str_replace('-', '', $key);
	$popup_request_data = array ('call_back_function' => 'set_return', 'form_name' => 'EditView', 'field_to_name_array' => array ('id' => 'rel_id_'.$code, 'name' => 'rel_name_'.$code,),);
	$encoded_popup_request_data = urlencode($json->encode($popup_request_data));

	if(empty($selQuery[$relModule][$_SESSION['MAILMERGE_MODULE']])){
		$select = generateSelect($seed, $relModule);
	}else{
		$select = $selQuery[$relModule][$_SESSION['MAILMERGE_MODULE']];
	}
	if(empty($whereQuery[$relModule][$_SESSION['MAILMERGE_MODULE']])){
		$where = "{$seed->table_name}.id = ";
	}else{
		$where = $whereQuery[$relModule][$_SESSION['MAILMERGE_MODULE']];
	}
	
	if($relModule == "Contacts"){
	$limitSelect = str_replace('contacts.*', 'contacts.first_name, contacts.last_name, contacts.id, contacts.date_entered', $select);
	}
	else{
		$limitSelect = str_replace(strtolower($relModule).'.*', strtolower($relModule).'.name, '.strtolower($relModule).'.date_entered', $select);
	}
	$fullQuery = $limitSelect." WHERE ".$where."'".$key."' ORDER BY date_entered";
	
	$result = $seed->db->limitQuery($fullQuery, 0, 1, true, "Error performing limit query");
	$full_name = '';
	$contact_id = '';
	if($row = $seed->db->fetchByAssoc($result, 0)) {
			if($relModule == "Contacts"){
			$full_name = $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
			}
			else{
				$full_name = $row['name'];
			}
			$contact_id = $row['id'];
	}
	$change_parent_button = "<input title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' tabindex='2'  type='button' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='button' onclick='open_popup(document.EditView.rel_type_".$code.".value, 600, 400, \"&html=mail_merge&select=$select&where=$where&id=$key&request_data=$encoded_popup_request_data\", true, false, {});' $disabled/>";
	$items = array(
	'ID' => $key,
	'NAME' => $value,
	'CODE' => $code,
	'TYPE_OPTIONS' => get_select_options_with_id($modules, '0'),
	'CHANGE_RELATIONSHIP' => $change_parent_button,
	'CONTACT_ID' => $contact_id,
	'CONTACT_NAME' => $full_name,
	'REL_MODULE' => $_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'],
	);

	$xtpl->assign("MAILMERGE", $items);
	
	if($oddRow)
   	{
        //todo move to themes
		$xtpl->assign("ROW_COLOR", 'oddListRow');
		$xtpl->assign("BG_COLOR", $odd_bg);
    }
    else
    {
        //todo move to themes
		$xtpl->assign("ROW_COLOR", 'evenListRow');
		$xtpl->assign("BG_COLOR", $even_bg);
    }
   	$oddRow = !$oddRow;
   	$xtpl->parse("main.items.row");
}
$xtpl->parse("main.items");


$xtpl->parse("main");
$xtpl->out("main");


function generateSelect($seed, $relModule){
	$lowerRelModule = strtolower($relModule);
	if($seed->load_relationship($lowerRelModule)){
		$params = array();
		$params['join_table_alias'] = 'r1';
		$params['join_table_link_alias'] = 'r2';
		$params['join_type'] = 'LEFT JOIN';
		$join = $seed->$lowerRelModule->getJoin($params);
		$select = "SELECT {$seed->table_name}.* FROM {$seed->table_name} ".$join;
		return $select;
	}
	return "";
}

?>

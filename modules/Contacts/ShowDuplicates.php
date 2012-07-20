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

if (!isset($_SESSION['SHOW_DUPLICATES']))
    sugar_die("Unauthorized access to this area.");
// retrieve $_POST values out of the $_SESSION variable - placed in there by ContactFormBase to avoid the length limitations on URLs implicit with GETS
//$GLOBALS['log']->debug('ShowDuplicates.php: _POST = '.print_r($_SESSION['SHOW_DUPLICATES'],true));
parse_str($_SESSION['SHOW_DUPLICATES'],$_POST);
unset($_SESSION['SHOW_DUPLICATES']);
//$GLOBALS['log']->debug('ShowDuplicates.php: _POST = '.print_r($_POST,true));

global $app_strings;
global $app_list_strings;
global $theme;

$error_msg = '';
global $current_language;
$mod_strings = return_module_language($current_language, 'Contacts');
$moduleName = $GLOBALS['app_list_strings']['moduleList']['Contacts'];
echo getClassicModuleTitle('Contacts', array($moduleName,$mod_strings['LBL_SAVE_CONTACT']), true);
$xtpl=new XTemplate ('modules/Contacts/ShowDuplicates.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("MODULE", $_REQUEST['module']);
if ($error_msg != '')
{
	$xtpl->assign("ERROR", $error_msg);
	$xtpl->parse("main.error");
}

if((isset($_REQUEST['popup']) && $_REQUEST['popup'] == 'true') ||(isset($_POST['popup']) && $_POST['popup']==true)) insert_popup_header($theme);


$contact = new Contact();
require_once('modules/Contacts/ContactFormBase.php');
$contactForm = new ContactFormBase();
$GLOBALS['check_notify'] = FALSE;


$query = 'select id, first_name, last_name, title from contacts where deleted=0 ';
$duplicates = $_POST['duplicate']; 
$count = count($duplicates);
if ($count > 0)
{
	$query .= "and (";
	$first = true; 
	foreach ($duplicates as $duplicate_id) 
	{
		if (!$first) $query .= ' OR ';
		$first = false;
		$query .= "id='$duplicate_id' ";
	}
	$query .= ')';
}

$duplicateContacts = array();

$db = DBManagerFactory::getInstance();
$result = $db->query($query);
$i=0;
while (($row=$db->fetchByAssoc($result)) != null) {
	$duplicateContacts[$i] = $row;
	$i++;
}

$xtpl->assign('FORMBODY', $contactForm->buildTableForm($duplicateContacts));

$input = '';
foreach ($contact->column_fields as $field)
{	
	if (!empty($_POST['Contacts'.$field])) {
		$input .= "<input type='hidden' name='$field' value='${_POST['Contacts'.$field]}'>\n";
	}
}

foreach ($contact->additional_column_fields as $field)
{	
	if (!empty($_POST['Contacts'.$field])) {
		$input .= "<input type='hidden' name='$field' value='${_POST['Contacts'.$field]}'>\n";
	}
}

// Bug 25311 - Add special handling for when the form specifies many-to-many relationships
if(!empty($_POST['Contactsrelate_to'])) {
    $input .= "<input type='hidden' name='relate_to' value='{$_POST['Contactsrelate_to']}'>\n";
}
if(!empty($_POST['Contactsrelate_id'])) {
    $input .= "<input type='hidden' name='relate_id' value='{$_POST['Contactsrelate_id']}'>\n";
}

$input .= get_teams_hidden_inputs('Contacts');

$emailAddress = new SugarEmailAddress();
$input .= $emailAddress->getEmailAddressWidgetDuplicatesView($contact);

$get = '';
if(!empty($_POST['return_module'])) $xtpl->assign('RETURN_MODULE', $_POST['return_module']);
else $get .= "Contacts";
$get .= "&return_action=";
if(!empty($_POST['return_action'])) $xtpl->assign('RETURN_ACTION', $_POST['return_action']);
else $get .= "DetailView";

///////////////////////////////////////////////////////////////////////////////
////	INBOUND EMAIL WORKFLOW
if(isset($_REQUEST['inbound_email_id'])) {
	$xtpl->assign('INBOUND_EMAIL_ID', $_REQUEST['inbound_email_id']);
	$xtpl->assign('RETURN_MODULE', 'Emails');	
	$xtpl->assign('RETURN_ACTION', 'EditView');
	if(isset($_REQUEST['start'])) {
		$xtpl->assign('START', $_REQUEST['start']);
	}
		
}
////	END INBOUND EMAIL WORKFLOW
///////////////////////////////////////////////////////////////////////////////



if(!empty($_POST['popup'])) 
	$input .= '<input type="hidden" name="popup" value="'.$_POST['popup'].'">';
else 
	$input .= '<input type="hidden" name="popup" value="false">';

if(!empty($_POST['to_pdf'])) 
	$input .= '<input type="hidden" name="to_pdf" value="'.$_POST['to_pdf'].'">';
else 
	$input .= '<input type="hidden" name="to_pdf" value="false">';
	
if(!empty($_POST['create'])) 
	$input .= '<input type="hidden" name="create" value="'.$_POST['create'].'">';
else 
	$input .= '<input type="hidden" name="create" value="false">';

if(!empty($_POST['return_id'])) $xtpl->assign('RETURN_ID', $_POST['return_id']);

$xtpl->assign('INPUT_FIELDS',$input);
$xtpl->parse('main');
$xtpl->out('main');

?>

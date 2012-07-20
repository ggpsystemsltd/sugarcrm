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

// retrieve $_POST values out of the $_SESSION variable - placed in there by AccountFormBase to avoid the length limitations on URLs implicit with GETS
//$GLOBALS['log']->debug('ShowDuplicates.php: _POST = '.print_r($_SESSION['SHOW_DUPLICATES'],true));
parse_str($_SESSION['SHOW_DUPLICATES'],$_POST);
unset($_SESSION['SHOW_DUPLICATES']);
//$GLOBALS['log']->debug('ShowDuplicates.php: _POST = '.print_r($_POST,true));

global $app_strings;
global $app_list_strings;

$error_msg = '';

global $current_language;
$mod_strings = return_module_language($current_language, 'Accounts');
$moduleName = $GLOBALS['app_list_strings']['moduleList']['Accounts'];
echo getClassicModuleTitle('Accounts', array($moduleName, $mod_strings['LBL_SAVE_ACCOUNT']), true);
$xtpl=new XTemplate ('modules/Accounts/ShowDuplicates.html');
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


$account = new Account();
require_once('modules/Accounts/AccountFormBase.php');
$accountForm = new AccountFormBase();
$GLOBALS['check_notify'] = FALSE;

$query = 'select id, name, website, billing_address_city  from accounts where deleted=0 ';
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

$duplicateAccounts = array();

$db = DBManagerFactory::getInstance();
$result = $db->query($query);
$i=-1;
while(($row=$db->fetchByAssoc($result)) != null) {
	$i++;
	$duplicateAccounts[$i] = $row;
}

$xtpl->assign('FORMBODY', $accountForm->buildTableForm($duplicateAccounts,  'Accounts'));

$input = '';
foreach ($account->column_fields as $field)
{	
	if (!empty($_POST['Accounts'.$field])) {
		$value = urldecode($_POST['Accounts'.$field]);
		$input .= "<input type='hidden' name='$field' value='{$value}'>\n";
	}
}
foreach ($account->additional_column_fields as $field)
{	
	if (!empty($_POST['Accounts'.$field])) {
		$value = urldecode($_POST['Accounts'.$field]);
		$input .= "<input type='hidden' name='$field' value='{$value}'>\n";
	}
}

// Bug 25311 - Add special handling for when the form specifies many-to-many relationships
if(!empty($_POST['Contactsrelate_to'])) {
    $input .= "<input type='hidden' name='relate_to' value='{$_POST['Contactsrelate_to']}'>\n";
}
if(!empty($_POST['Contactsrelate_id'])) {
    $input .= "<input type='hidden' name='relate_id' value='{$_POST['Contactsrelate_id']}'>\n";
}

$input .= get_teams_hidden_inputs('Accounts');

$emailAddress = new SugarEmailAddress();
$input .= $emailAddress->getEmailAddressWidgetDuplicatesView($account);

$get = '';
if(!empty($_POST['return_module'])) $xtpl->assign('RETURN_MODULE', $_POST['return_module']);
else $get .= "Accounts";
$get .= "&return_action=";
if(!empty($_POST['return_action'])) $xtpl->assign('RETURN_ACTION', $_POST['return_action']);
else $get .= "DetailView";
if(!empty($_POST['return_id'])) $xtpl->assign('RETURN_ID', $_POST['return_id']);

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

$xtpl->assign('INPUT_FIELDS',$input);
$xtpl->parse('main');
$xtpl->out('main');


?>

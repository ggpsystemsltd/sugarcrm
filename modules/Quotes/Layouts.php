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

global $mod_strings;

// We suggest that if you wish to modify an existing layout, copy & paste the existing layout files to new files
// this will prevent conflicts with future upgrades.

// To add a layout, you will need to register the new file below and in the $layouts_dom array
// in modules/Quotes/language/<lang>.lang.php
global $layouts;
$layouts = array(
	'Standard'=>'modules/Quotes/layouts/Standard.php',
    'Invoice'=>'modules/Quotes/layouts/Invoice.php'
);

/**
 * a kind of silly getter...
 * @returns array layout array
 */
function get_layouts() {
	global $mod_strings;
    global $app_list_strings;
	global $layouts;
    $list = array();
    if(isset($layouts)) {
	   foreach($layouts as $key=>$value) {
                   if(array_key_exists($key, $app_list_strings['layouts_dom'])){ //bug 49954 
		   $list[$key] = $app_list_strings['layouts_dom'][$key];
		}
	  }
    }
	return $list;
}

/**
 * gets a layout and "prints" it
 * @param array array of layouts
 */
function print_layout($layout) {
	global $mod_strings;
	global $layouts;
	
    if(!isset($layouts[$layout])) {
		$GLOBALS['log']->fatal("quote layout is not registered in modules/Quotes/Layouts.php");
		sugar_die ("quote layout is not registered in modules/Quotes/Layouts.php");
	} elseif (!is_file($layouts[$layout])) {
		$GLOBALS['log']->fatal("quote layout file does not exist: ".$layouts[$layout]);
		sugar_die ("quote layout file does not exist: ".$layouts[$layout]);
	} else {
		include_once($layouts[$layout]);
	}
}


if(file_exists('modules/Quotes/Layouts.override.php')) {
	include_once('modules/Quotes/Layouts.override.php');
}
if(file_exists('custom/modules/Quotes/Layouts.php')) {
	include_once('custom/modules/Quotes/Layouts.php');
}

if(isset($_REQUEST['email_action']) && $_REQUEST['email_action']=="EmailLayout") {
	//check to make sure the layout is set
	if (isset($_REQUEST['layout'])) {
		include_once('modules/Quotes/EmailPDF.php');
		$email_id = email_layout($_REQUEST['layout']);
	}

	//redirect
	if($email_id=="") {
		//Redirect to quote, since something went wrong
		echo "There was an error with your request";
		exit; //end if email id is blank
	} else {
		//Redirect to new email draft just created
		header("Location: index.php?action=Compose&module=Emails&parent_type=Quotes&return_module=Quotes&return_action=DetailView&return_id=".$_REQUEST['record']."&recordId=$email_id"."&parent_id=".$_REQUEST['record']);
	}
//end if email layout
} else {
	if (isset($_REQUEST['layout'])) {
		print_layout($_REQUEST['layout']);
	}//end if else traditional print layout
}

?>

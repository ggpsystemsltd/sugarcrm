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

require_once('modules/EmailTemplates/EmailTemplate.php');

$focus = new EmailTemplate();
if($_REQUEST['from'] == 'DetailView') {
	if(!isset($_REQUEST['record']))
		sugar_die("A record number must be specified to delete the template.");
	$focus->retrieve($_REQUEST['record']);
	if(check_email_template_in_use($focus)) {
		echo 'true';
		return;
	}
	echo 'false';
} else if($_REQUEST['from'] == 'ListView') {
	$returnString = '';
	$idArray = explode(',', $_REQUEST['records']);
	foreach($idArray as $key => $value) {
		if($focus->retrieve($value)) {
			if(check_email_template_in_use($focus)) {
				$returnString .= $focus->name . ',';
			}
		}
	}
	$returnString = substr($returnString, 0, -1);
	echo $returnString;
} else {
	echo '';
}

function check_email_template_in_use($focus)
{
	if($focus->is_used_by_email_marketing()) {
		return true;
	}
	$system = $GLOBALS['sugar_config']['passwordsetting'];
	if($focus->id == $system['generatepasswordtmpl'] || $focus->id == $system['lostpasswordtmpl']) {
	    return true;
	}
    return false;
}

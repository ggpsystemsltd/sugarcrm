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

require('config.php');
global $sugar_config;
global $timedate;
global $mod_strings;
require_once('modules/Teams/Team.php');
$Team = new Team();
$Team_id = $Team->retrieve_team_id('Administrator');

//Sent when the admin generate a new password
$EmailTemp = new EmailTemplate();
$EmailTemp->name = $mod_strings['advanced_password_new_account_email']['name'];
$EmailTemp->description = $mod_strings['advanced_password_new_account_email']['description'];
$EmailTemp->subject = $mod_strings['advanced_password_new_account_email']['subject'];
$EmailTemp->body = $mod_strings['advanced_password_new_account_email']['txt_body'];
$EmailTemp->body_html = $mod_strings['advanced_password_new_account_email']['body'];
$EmailTemp->deleted = 0;
$EmailTemp->team_id = $Team_id;
$EmailTemp->published = 'off';
$EmailTemp->text_only = 0;
$id =$EmailTemp->save();
$sugar_config['passwordsetting']['generatepasswordtmpl'] = $id;

//User generate a link to set a new password
$EmailTemp = new EmailTemplate();
$EmailTemp->name = $mod_strings['advanced_password_forgot_password_email']['name'];
$EmailTemp->description = $mod_strings['advanced_password_forgot_password_email']['description'];
$EmailTemp->subject = $mod_strings['advanced_password_forgot_password_email']['subject'];
$EmailTemp->body = $mod_strings['advanced_password_forgot_password_email']['txt_body'];
$EmailTemp->body_html = $mod_strings['advanced_password_forgot_password_email']['body'];
$EmailTemp->deleted = 0;
$EmailTemp->team_id = $Team_id;
$EmailTemp->published = 'off';
$EmailTemp->text_only = 0;
$id =$EmailTemp->save();
$sugar_config['passwordsetting']['lostpasswordtmpl'] = $id;

// set all other default settings
$sugar_config['passwordsetting']['forgotpasswordON'] = true;
$sugar_config['passwordsetting']['SystemGeneratedPasswordON'] = true;
$sugar_config['passwordsetting']['systexpirationtime'] = 7;
$sugar_config['passwordsetting']['systexpiration'] = 1;
$sugar_config['passwordsetting']['linkexpiration'] = true;
$sugar_config['passwordsetting']['linkexpirationtime'] = 24;
$sugar_config['passwordsetting']['linkexpirationtype'] = 60;
$sugar_config['passwordsetting']['minpwdlength'] = 6;
$sugar_config['passwordsetting']['oneupper'] = true;
$sugar_config['passwordsetting']['onelower'] = true;
$sugar_config['passwordsetting']['onenumber'] = true;

write_array_to_file( "sugar_config", $sugar_config, "config.php");
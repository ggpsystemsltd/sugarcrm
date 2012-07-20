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
global $theme;
global $sugar_config;
global $current_language;
$currentMax = $sugar_config['list_max_entries_per_page'];
$sugar_config['list_max_entries_per_page'] = 10;







$current_mod_strings = return_module_language($current_language, 'Emails');
$focus			= new Email();
$ListView 		= new ListView();
$display_title	= $current_mod_strings['LBL_LIST_TITLE_MY_INBOX'].': '.$current_mod_strings['LBL_UNREAD_HOME'];
$where			= 'emails.deleted = 0 AND emails.assigned_user_id = \''.$current_user->id.'\' AND emails.type = \'inbound\' AND emails.status = \'unread\'';
$limit			= 10;
///////////////////////////////////////////////////////////////////////////////
////	OUTPUT
///////////////////////////////////////////////////////////////////////////////
echo $focus->rolloverStyle;
$ListView->initNewXTemplate('modules/Emails/ListViewHome.html',$current_mod_strings);
$ListView->xTemplateAssign('ATTACHMENT_HEADER', SugarThemeRegistry::current()->getImage('attachment',"","","",'.gif',$mod_strings['LBL_ATTACHMENT']));
$ListView->setHeaderTitle($display_title);
$ListView->setQuery($where, '', 'date_sent, date_entered DESC', "EMAIL");
$ListView->setAdditionalDetails();
$ListView->processListView($focus, 'main', 'EMAIL');

//echo $focus->quickCreateJS();

$sugar_config['list_max_entries_per_page'] = $currentMax;
?>
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

 * Description:  TODO To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

global $mod_strings;
global $current_user;

if(ACLController::checkAccess('KBDocuments', 'edit', true))$module_menu[]=Array("index.php?module=KBDocuments&action=EditView&return_module=KBDocuments&return_action=DetailView", $mod_strings['LNK_NEW_ARTICLE'],"CreateKBArticle");
//if(ACLController::checkAccess('KBDocuments', 'list', true))$module_menu[]=Array("index.php?module=KBDocuments&action=index", $mod_strings['LNK_KBDOCUMENT_LIST'],"Documents");
if(ACLController::checkAccess('KBDocuments', 'edit', true)){
	
	$admin = new Administration();
	$admin->retrieveSettings();
	$user_merge = $current_user->getPreference('mailmerge_on');
	if ($user_merge == 'on' && isset($admin->settings['system_mailmerge_on']) && $admin->settings['system_mailmerge_on']){
		$module_menu[]=Array("index.php?module=MailMerge&action=index&reset=true", $mod_strings['LNK_NEW_MAIL_MERGE'],"Documents");
	}
}
if(ACLController::checkAccess('KBDocuments', 'list', true))$module_menu[]=Array("index.php?module=KBDocuments&action=SearchHome", $mod_strings['LBL_LIST_ARTICLES'],"KBArticle");
if($current_user->isAdminForModule('KBDocuments')){
	if(ACLController::checkAccess('KBDocuments', 'list', true))$module_menu[]=Array("index.php?module=KBDocuments&action=KBAdminView", $mod_strings['LBL_KNOWLEDGE_BASE_ADMIN_MENU'],"KB");
}
?>

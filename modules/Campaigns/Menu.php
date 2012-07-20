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

global $mod_strings, $app_strings;
if(ACLController::checkAccess('Campaigns', 'edit', true))
	$module_menu[] = array(
		"index.php?module=Campaigns&action=WizardHome&return_module=Campaigns&return_action=index", 
		$mod_strings['LNL_NEW_CAMPAIGN_WIZARD'],"CampaignsWizard"
	);
if(ACLController::checkAccess('Campaigns', 'edit', true))
	$module_menu[]=	array(
		"index.php?module=Campaigns&action=EditView&return_module=Campaigns&return_action=index", 
		$mod_strings['LNK_NEW_CAMPAIGN'],"CreateCampaigns"
	);
if(ACLController::checkAccess('Campaigns', 'list', true))
	$module_menu[]=	array(
		"index.php?module=Campaigns&action=index&return_module=Campaigns&return_action=index", 
		$mod_strings['LNK_CAMPAIGN_LIST'],"Campaigns"
	);
if(ACLController::checkAccess('Campaigns', 'list', true))
	$module_menu[]= array(
		"index.php?module=Campaigns&action=newsletterlist&return_module=Campaigns&return_action=index", 
		$mod_strings['LBL_NEWSLETTERS'], "Newsletters"
	);
if(ACLController::checkAccess('EmailTemplates', 'edit', true))
	$module_menu[] = array(
		"index.php?module=EmailTemplates&action=EditView&return_module=EmailTemplates&return_action=DetailView",
		$mod_strings['LNK_NEW_EMAIL_TEMPLATE'],"CreateEmails","Emails"
	);
if(ACLController::checkAccess('EmailTemplates', 'list', true))
	$module_menu[] = array(
		"index.php?module=EmailTemplates&action=index",
		$mod_strings['LNK_EMAIL_TEMPLATE_LIST'],"EmailFolder", 'Emails'
	);
if (is_admin($GLOBALS['current_user']) || is_admin_for_module($GLOBALS['current_user'],'Campaigns'))
	$module_menu[] = array(
		"index.php?module=Campaigns&action=WizardEmailSetup&return_module=Campaigns&return_action=index",
		$mod_strings['LBL_EMAIL_SETUP_WIZARD'],"EmailSetupWizard"
	);
if(ACLController::checkAccess('Campaigns', 'edit', true))
	$module_menu[] = array(
		"index.php?module=Campaigns&action=CampaignDiagnostic&return_module=Campaigns&return_action=index",
		$mod_strings['LBL_DIAGNOSTIC_WIZARD'],"EmailDiagnostic"
	);
if(ACLController::checkAccess('Campaigns', 'edit', true))
	$module_menu[] = array(
		"index.php?module=Campaigns&action=WebToLeadCreation&return_module=Campaigns&return_action=index",
		$mod_strings['LBL_WEB_TO_LEAD'],"CreateWebToLeadForm"
	);
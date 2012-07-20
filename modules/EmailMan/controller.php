<?php
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


class EmailManController extends SugarController
{
	function action_Save(){

        
        require_once('include/OutboundEmail/OutboundEmail.php');
        require_once('modules/Configurator/Configurator.php');

        $configurator = new Configurator();
        global $sugar_config;
        global $current_user;
        if ( !is_admin($current_user)
                && !is_admin_for_module($GLOBALS['current_user'],'Emails')
                && !is_admin_for_module($GLOBALS['current_user'],'Campaigns') ){
        sugar_die("Unauthorized access to administration.");
        }

        //Do not allow users to spoof for sendmail if the config flag is not set.
        if( !isset($sugar_config['allow_sendmail_outbound']) || !$sugar_config['allow_sendmail_outbound'])
            $_REQUEST['mail_sendtype'] = "SMTP";

        // save Outbound settings  #Bug 20033 Ensure data for Outbound email exists before trying to update the system mailer.
        if(isset($_REQUEST['mail_sendtype']) && empty($_REQUEST['campaignConfig'])) {
            $oe = new OutboundEmail();
            $oe->populateFromPost();
            $oe->saveSystem();
        }



        $focus = new Administration();

        if(isset($_POST['tracking_entities_location_type'])) {
            if ($_POST['tracking_entities_location_type'] != '2') {
                unset($_POST['tracking_entities_location']);
                unset($_POST['tracking_entities_location_type']);
            }
        }
        // cn: handle mail_smtpauth_req checkbox on/off (removing double reference in the form itself
        if( !isset($_POST['mail_smtpauth_req']) )
        {
            $_POST['mail_smtpauth_req'] = 0;
		if (empty($_POST['campaignConfig'])) {
			$_POST['notify_allow_default_outbound'] = 0; // If smtp auth is disabled ensure outbound is disabled.
		}
        }

        if( !empty($_POST['notify_allow_default_outbound']) )
        {
            $oe = new OutboundEmail();
            if( !$oe->isAllowUserAccessToSystemDefaultOutbound() )
                $oe->removeUserOverrideAccounts();
        }

        $focus->saveConfig();

        // save User defaults for emails
        $configurator->config['email_default_delete_attachments'] = (isset($_REQUEST['email_default_delete_attachments'])) ? true : false;

        ///////////////////////////////////////////////////////////////////////////////
        ////	SECURITY
        $security = array();
        if(isset($_REQUEST['applet'])) $security['applet'] = 'applet';
        if(isset($_REQUEST['base'])) $security['base'] = 'base';
        if(isset($_REQUEST['embed'])) $security['embed'] = 'embed';
        if(isset($_REQUEST['form'])) $security['form'] = 'form';
        if(isset($_REQUEST['frame'])) $security['frame'] = 'frame';
        if(isset($_REQUEST['frameset'])) $security['frameset'] = 'frameset';
        if(isset($_REQUEST['iframe'])) $security['iframe'] = 'iframe';
        if(isset($_REQUEST['import'])) $security['import'] = '\?import';
        if(isset($_REQUEST['layer'])) $security['layer'] = 'layer';
        if(isset($_REQUEST['link'])) $security['link'] = 'link';
        if(isset($_REQUEST['object'])) $security['object'] = 'object';
        if(isset($_REQUEST['style'])) $security['style'] = 'style';
        if(isset($_REQUEST['xmp'])) $security['xmp'] = 'xmp';
        $security['script'] = 'script';

        $configurator->config['email_xss'] = base64_encode(serialize($security));

        ////	SECURITY
        ///////////////////////////////////////////////////////////////////////////////

        ksort($sugar_config);

        $configurator->handleOverride();


    }

}
?>
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

require_once('include/externalAPI/Base/ExternalAPIBase.php');
require_once('include/externalAPI/Base/WebFeed.php');


class ExtAPIFacebook extends ExternalAPIBase implements WebFeed {
    // It's not the normal oauth, but it works close enough.
    public $authMethod = 'oauth';
    public $useAuth = true;
    public $requireAuth = true;
    protected $authData;
    public $needsUrl = false;
    public $supportedModules = array('SugarFeed');
    public $connector = "ext_eapm_facebook";

    protected $oauthParams = array(
    	'signatureMethod' => 'HMAC-SHA1',
    );

    public function checkLogin($eapmBean = null)
    {
        $reply = parent::checkLogin($eapmBean);

        if ( !$reply['success'] ) {
            return $reply;
        }

        if ( ! $this->setupFacebookLib() ) {
            // FIXME: Translate
            return array('success'=>FALSE,'errorMessage'=>'Facebook does not have the required libraries.');
        }

        $GLOBALS['log']->debug('Checking login.');


        if ( empty($this->eapmBean->oauth_secret) ) {
            // We must be saving, try re-authing
            $GLOBALS['log']->debug('We must be saving.');
            if ( !empty($_REQUEST['session']) ) {
                $_REQUEST['session'] = str_replace('&quot;','"',$_REQUEST['session']);
                $GLOBALS['log']->debug('Have a session from facebook: '.$_REQUEST['session']);

                $fbSession = $this->fb->getSession();
                if ( !empty($fbSession) ) {
                    $GLOBALS['log']->debug('Have a VALID session from facebook:'.print_r($fbSession,true));
                    // Put a string in here so we can tell when it resets it.
                    $this->eapmBean->oauth_secret = 'SECRET';
                    $this->eapmBean->api_data = base64_encode(json_encode(array('fbSession'=>$fbSession)));
                    $this->eapmBean->validated = 1;
                    $this->eapmBean->save();
                    return array('success'=>true);
                } else {
                    // FIXME: Translate
                    $GLOBALS['log']->error('Have an INVALID session from facebook:'.print_r($fbSession,true));
                    return array('success'=>false,'errorMessage'=>'No authentication.');
                }
            } else {
                $callback_url = $GLOBALS['sugar_config']['site_url'].'/index.php?module=EAPM&action=oauth&record='.$this->eapmBean->id;
	            $callback_url = $this->formatCallbackURL($callback_url);
                $loginUrl = $this->fb->getLoginUrl(array('next'=>$callback_url,'cancel'=>$callback_url, 'req_perms' => 'read_stream,offline_access'));
                SugarApplication::redirect($loginUrl);
                return array('success'=>false);
            }
        }

        return $reply;
    }

    public function loadEAPM($eapmBean)
    {
        parent::loadEAPM($eapmBean);

        if ( !empty($eapmBean->api_data) ) {
            $api_data = json_decode(base64_decode($eapmBean->api_data),true);
            if ( isset($api_data['fbSession']) ) {
                $this->fbSession = $api_data['fbSession'];
            }
        }
    }


	public function getLatestUpdates($maxTime, $maxEntries)
    {
        $td = $GLOBALS['timedate'];

        try {
            if ( ! $this->setupFacebookLib() ) {
                // FIXME: Translate
                return array('success'=>FALSE,'errorMessage'=>'Facebook does not have the required libraries.');
            }
            $fbMessages = $this->fb->api('/me/home?limit='.$maxEntries);
        } catch ( Exception $e ) {
            $GLOBALS['log']->error('Facebook Error: '.$e->getMessage());
            return array('success'=>FALSE,'errorMessage'=>translate('LBL_ERR_FACEBOOK', 'EAPM'));
        }

        if ( !isset($fbMessages['data'][0]) ) {
            return array('success'=>TRUE,'messages'=>array());
        }

        $messages = array();
        foreach ( $fbMessages['data'] as $message ) {
            if ( empty($message['message']) ) {
                continue;
            }
            $unix_time = strtotime($message['created_time']);

            $fake_record = array();
            $fake_record['sort_key'] = $unix_time;
            $fake_record['ID'] = create_guid();
            $fake_record['DATE_ENTERED'] = $td->to_display_date_time(gmdate('Y-m-d H:i:s',$unix_time));
            $fake_record['NAME'] = $message['from']['name'].'</b>';
            if ( !empty($message['message']) ) {
                $fake_record['NAME'] .= ' '.$message['message'];
            }
            if ( !empty($message['picture'])) {
                $fake_record['NAME'] .= '<br><!--not_in_theme!--><img src="'.$message['picture'].'" height=50>';
            }
            $fake_record['NAME'] .= '<br><div class="byLineBox"><span class="byLineLeft">'.SugarFeed::getTimeLapse($fake_record['DATE_ENTERED']).'&nbsp;</span><div class="byLineRight">&nbsp;</div></div>';
            $fake_record['IMAGE_URL'] = "https://graph.facebook.com/".$message['from']['id'].'/picture';

            $messages[] = $fake_record;
        }


        return array('success'=>TRUE,'messages'=>$messages);
    }

    // Internal functions
    protected function setupFacebookLib()
    {
        try {
            // This will throw exceptions if either the curl or json libraries aren't available.
            require_once('include/externalAPI/Facebook/FacebookLib.php');

        } catch ( Exception $e ) { return false; }

        if(empty($this->oauthParams['consumerKey']) || empty($this->oauthParams['consumerSecret'])){
           $this->loadConnectorProperties();
        }
        $this->fb = new FacebookLib(array(
                                        'appId' => $this->oauthParams['consumerKey'],
                                        'secret' => $this->oauthParams['consumerSecret'],
                                        'cookie' => false,
                                        ));
        try {
            if ( isset($this->fbSession) ) {
                $this->fb->setSession($this->fbSession,false);
            }
        } catch ( Exception $e ) {}
        return true;
    }

    protected function loadConnectorProperties(){
        $connector = $this->getConnector();
        if(!empty($connector)) {
            $cons_key = $connector->getProperty('oauth_consumer_key');
            if(!empty($cons_key)) {
                $this->oauthParams['consumerKey'] = $cons_key;
            }
            $cons_secret = $connector->getProperty('oauth_consumer_secret');
            if(!empty($cons_secret)) {
                $this->oauthParams['consumerSecret'] = $cons_secret;
            }
        }
    }
}

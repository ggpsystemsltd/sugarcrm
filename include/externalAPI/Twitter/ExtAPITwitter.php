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

require_once('include/externalAPI/Base/OAuthPluginBase.php');
require_once('include/externalAPI/Base/WebFeed.php');


class ExtAPITwitter extends OAuthPluginBase implements WebFeed {
    public $authMethod = 'oauth';
    public $useAuth = true;
    public $requireAuth = true;
    protected $authData;
    public $needsUrl = false;
    public $supportedModules = array('SugarFeed');
    public $connector = "ext_rest_twitter";

	protected $oauthReq = "https://api.twitter.com/oauth/request_token";
    protected $oauthAuth = 'https://api.twitter.com/oauth/authorize';
    protected $oauthAccess = 'https://api.twitter.com/oauth/access_token';
    protected $oauthParams = array(
    	'signatureMethod' => 'HMAC-SHA1',
    );

	public function getLatestUpdates($maxTime, $maxEntries)
    {
        $td = $GLOBALS['timedate'];

        $twitter_json_url = 'http://api.twitter.com/1/statuses/friends_timeline.json';
        $reply = $this->makeRequest('GET', $twitter_json_url,array('count'=>$maxEntries));

        if ( !$reply['success'] ) {
            $GLOBALS['log']->error('Twitter failed, reply said: '.print_r($reply,true));
            return $reply;
        }

        $messages = array();
        foreach ( $reply['responseJSON'] as $message ) {
            if ( empty($message['text']) ) {
                continue;
            }
            $unix_time = strtotime($message['created_at']);

            $fake_record = array();
            $fake_record['sort_key'] = $unix_time;
            $fake_record['ID'] = create_guid();
            $fake_record['DATE_ENTERED'] = $td->to_display_date_time(gmdate('Y-m-d H:i:s',$unix_time));
            $fake_record['NAME'] = $message['user']['name'].'</b>';
            if ( !empty($message['text']) ) 
            {
            	$message['text'] = SugarFeed::parseMessage($message['text']); 
            	$fake_record['NAME'] .= ' '.preg_replace('/\@(\w+)/', "<a target='_blank' href='http://twitter.com/\$1'>@\$1</a>", $message['text']);
            }
            $fake_record['NAME'] .= '<br><div class="byLineBox"><span class="byLineLeft">'.SugarFeed::getTimeLapse($fake_record['DATE_ENTERED']).'&nbsp;</span><div class="byLineRight">&nbsp;</div></div>';
            $fake_record['IMAGE_URL'] = $message['user']['profile_image_url'];

            $messages[] = $fake_record;
        }


        return array('success'=>TRUE,'messages'=>$messages);
    }



    // Internal functions
    protected function makeRequest($requestMethod, $url, $urlParams = null, $postData = null )
    {
        $headers = array(
            "User-Agent: SugarCRM",
            "Content-Type: application/x-www-form-urlencoded",
            "Content-Length: ".strlen($postData),
            );

        $oauth = $this->getOauth();

        $rawResponse = $oauth->fetch($url, $urlParams, $requestMethod, $headers);

        if ( empty($rawResponse) ) {
            return array('success'=>FALSE,'errorMessage'=>translate('LBL_ERR_TWITTER', 'EAPM'));
        }
        $response = json_decode($rawResponse,true);
        if ( empty($response) ) {
            return array('success'=>FALSE,'errorMessage'=>translate('LBL_ERR_TWITTER', 'EAPM'));
        }

        if ( isset($response['error']) ) {
            return array('success'=>FALSE,'errorMessage'=>$response['error']);
        }

        return array('success'=>TRUE, 'responseJSON'=>$response);
    }
}
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


require_once 'modules/OAuthTokens/OAuthToken.php';
require_once 'modules/OAuthKeys/OAuthKey.php';
/**
 * Sugar OAuth provider implementation
 * @api
 */
class SugarOAuthServer
{
    /**
     * OAuth token
     * @var OAuthToken
     */
    protected $token;

    /**
     * Check if everything is OK
     * @throws OAuthException
     */
    protected function check()
    {
        if(!function_exists('mhash') && !function_exists('hash_hmac')) {
            // define exception class
            throw new OAuthException("MHash extension required for OAuth support");
        }
    }

    /**
     * Is this functionality enabled?
     */
    public static function enabled()
    {
        return function_exists('mhash') || function_exists('hash_hmac');
    }

    /**
     * Find consumer by key
     * @param $provider
     */
    public function lookupConsumer($provider)
    {
        // check $provider->consumer_key
        // on unknown: Zend_Oauth_Provider::CONSUMER_KEY_UNKNOWN
        // on bad key: Zend_Oauth_Provider::CONSUMER_KEY_REFUSED
        $GLOBALS['log']->debug("OAUTH: lookupConsumer, key={$provider->consumer_key}");
        $consumer = OAuthKey::fetchKey($provider->consumer_key);
        if(!$consumer) {
            return Zend_Oauth_Provider::CONSUMER_KEY_UNKNOWN;
        }
        $provider->consumer_secret = $consumer->c_secret;
        $this->consumer = $consumer;
        return Zend_Oauth_Provider::OK;
    }

    /**
     * Check timestamps & nonces
     * @param OAuthProvider $provider
     */
    public function timestampNonceChecker($provider)
    {
        // FIXME: add ts/nonce verification
        if(empty($provider->nonce)) {
            return Zend_Oauth_Provider::BAD_NONCE;
        }
        if(empty($provider->timestamp)) {
            return Zend_Oauth_Provider::BAD_TIMESTAMP;
        }
        return OAuthToken::checkNonce($provider->consumer_key, $provider->nonce, $provider->timestamp);
    }

    /**
     * Vefiry incoming token
     * @param OAuthProvider $provider
     */
    public function tokenHandler($provider)
    {
        $GLOBALS['log']->debug("OAUTH: tokenHandler, token={$provider->token}, verify={$provider->verifier}");

        $token = OAuthToken::load($provider->token);
        if(empty($token)) {
            return Zend_Oauth_Provider::TOKEN_REJECTED;
        }
        if($token->consumer != $this->consumer->id) {
            return Zend_Oauth_Provider::TOKEN_REJECTED;
        }
        $GLOBALS['log']->debug("OAUTH: tokenHandler, found token=".var_export($token->id, true));
        if($token->tstate == OAuthToken::REQUEST) {
            if(!empty($token->verify) && $provider->verifier == $token->verify) {
                $provider->token_secret = $token->secret;
                $this->token = $token;
                return Zend_Oauth_Provider::OK;
            } else {
                return Zend_Oauth_Provider::TOKEN_USED;
            }
        }
        if($token->tstate == OAuthToken::ACCESS) {
            $provider->token_secret = $token->secret;
            $this->token = $token;
            return Zend_Oauth_Provider::OK;
        }
        return Zend_Oauth_Provider::TOKEN_REJECTED;
    }

    /**
     * Decode POST/GET via from_html()
     * @return array decoded data
     */
    protected function decodePostGet()
    {
        $data = $_GET;
        $data = array_merge($data, $_POST);
        foreach($data as $k => $v) {
            $data[$k] = from_html($v);
        }
        return $data;
    }

    /**
     * Create OAuth provider
     *
     * Checks current request for OAuth valitidy
     * @param bool $add_rest add REST endpoint as request path
     */
    public function __construct($req_path = '')
    {
        $GLOBALS['log']->debug("OAUTH: __construct($req_path): ".var_export($_REQUEST, true));
        $this->check();
        $this->provider = new Zend_Oauth_Provider();
        try {
		    $this->provider->setConsumerHandler(array($this,'lookupConsumer'));
		    $this->provider->setTimestampNonceHandler(array($this,'timestampNonceChecker'));
		    $this->provider->setTokenHandler(array($this,'tokenHandler'));
	        if(!empty($req_path)) {
		        $this->provider->setRequestTokenPath($req_path);  // No token needed for this end point
	        }
	    	$this->provider->checkOAuthRequest(null, $this->decodePostGet());
	    	if(mt_rand() % 10 == 0) {
	    	    // cleanup 1 in 10 times
	    	    OAuthToken::cleanup();
	    	}
        } catch(Exception $e) {
            $GLOBALS['log']->debug($this->reportProblem($e));
            throw $e;
        }
    }

    /**
     * Generate request token string
     * @return string
     */
    public function requestToken()
    {
        $GLOBALS['log']->debug("OAUTH: requestToken");
        $token = OAuthToken::generate();
        $token->setConsumer($this->consumer);
        $token->save();
        return $token->queryString();
    }

    /**
     * Generate access token string - must have validated request token
     * @return string
     */
    public function accessToken()
    {
        $GLOBALS['log']->debug("OAUTH: accessToken");
        if(empty($this->token) || $this->token->tstate != OAuthToken::REQUEST) {
            return null;
        }
        $this->token->invalidate();
        $token = OAuthToken::generate();
        $token->setState(OAuthToken::ACCESS);
        $token->setConsumer($this->consumer);
        // transfer user data from request token
        $token->copyAuthData($this->token);
        $token->save();
        return $token->queryString();
    }

    /**
     * Return authorization URL
     * @return string
     */
    public function authUrl()
    {
        return urlencode(rtrim($GLOBALS['sugar_config']['site_url'],'/')."/index.php?module=OAuthTokens&action=authorize");
    }

    /**
     * Fetch current token if it is authorized
     * @return OAuthToken|null
     */
    public function authorizedToken()
    {
        if($this->token->tstate == OAuthToken::ACCESS) {
            return $this->token;
        }
        return null;
    }

    /**
     * Fetch authorization data from current token
     * @return mixed Authorization data or null if none
     */
    public function authorization()
    {
        if($this->token->tstate == OAuthToken::ACCESS) {
            return $this->token->authdata;
        }
        return null;
    }

    /**
     * Report OAuth problem as string
     */
    public function reportProblem(Exception $e)
    {
        return $this->provider->reportProblem($e);
    }
}

if(!class_exists('OAuthException')) {
    // we will use this in case oauth extension is not loaded
    class OAuthException extends Exception {}
}
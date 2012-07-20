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


    require_once 'Zend/Oauth/Consumer.php';
    // use ZF oauth
    /**
     * Sugar Oauth consumer
     * @api
     */
    class SugarOAuth extends Zend_Oauth_Consumer
    {
        protected $_last = '';
        protected $_oauth_config = array();

        /**
         * Create OAuth client
         * @param string $consumer_key
         * @param string $consumer_secret
         * @param array $params OAuth options
         */
        public function __construct($consumer_key , $consumer_secret, $params = null)
        {
            $this->_oauth_config = array(
                'consumerKey' => $consumer_key,
                'consumerSecret' => $consumer_secret,
            );
            if(!empty($params)) {
                $this->_oauth_config = array_merge($this->_oauth_config, $params);
            }
            parent::__construct($this->_oauth_config);
        }

        /**
         * Enable debugging
         * @return SugarOAuth
         */
        public function enableDebug()
        {
            return $this;
        }

        /**
         * Set token
         * @param string $token
         * @param string $secret
         */
        public function setToken($token, $secret)
        {
            $this->token = array($token, $secret);
        }

        /**
         * Create request token object for current token
         * @return Zend_Oauth_Token_Request
         */
        public function makeRequestToken()
        {
            $token = new Zend_Oauth_Token_Request();
            $token->setToken($this->token[0]);
            $token->setTokenSecret($this->token[1]);
            return $token;
        }

        /**
         * Create access token object for current token
         * @return Zend_Oauth_Token_Access
         */
        public function makeAccessToken()
        {
            $token = new Zend_Oauth_Token_Access();
            $token->setToken($this->token[0]);
            $token->setTokenSecret($this->token[1]);
            return $token;
        }

        /**
         * Retrieve request token from URL
         * @param string $url
         * @param string $callback Callback URL
         * @param array $params Query params
         * @return array
         * @see Zend_Oauth_Consumer::getRequestToken()
         */
        public function getRequestToken($url, $callback = null, $params = array())
        {
            if(!empty($callback)) {
                $this->setCallbackUrl($callback);
            }
            list($clean_url, $query) = explode('?', $url);
            if($query) {
                $url = $clean_url;
                parse_str($query, $query_params);
                $params = array_merge($params, $query_params);
            }
            $this->setRequestTokenUrl($url);
            try{
                $this->_last = $token = parent::getRequestToken($params);
                return array('oauth_token' => $token->getToken(), 'oauth_token_secret' => $token->getTokenSecret());
            }catch(Zend_Oauth_Exception $e){
                return array('oauth_token' => '', 'oauth_token_secret' => '');
            }
        }

        /**
         * Retrieve access token from url
         * @param string $url
         * @see Zend_Oauth_Consumer::getAccessToken()
         * @return array
         */
        public function getAccessToken($url)
        {
            $this->setAccessTokenUrl($url);
            $this->_last = $token = parent::getAccessToken($_REQUEST, $this->makeRequestToken());
            return array('oauth_token' => $token->getToken(), 'oauth_token_secret' => $token->getTokenSecret());
        }

       /**
        * Fetch URL with OAuth
        * @param string $url
        * @param string $params Query params
        * @param string $method HTTP method
        * @param array $headers HTTP headers
        * @return string
        */
        
        public function fetch($url, $params = null, $method = 'GET', $headers = null)
        {
            $acc = $this->makeAccessToken();
            if ( strpos($url,'?') ) {
               list($clean_url, $query) = explode('?', $url);
               if($query) {
                   $url = $clean_url;
                   parse_str($query, $query_params);
                   $params = array_merge($params?$params:array(), $query_params);
               }
            }
            $client = $acc->getHttpClient($this->_oauth_config, $url);
            
            Zend_Loader::loadClass('Zend_Http_Client_Adapter_Proxy');
            $proxy_config = SugarModule::get('Administration')->loadBean();
            $proxy_config->retrieveSettings('proxy');
            
            if( !empty($proxy_config) && 
                !empty($proxy_config->settings['proxy_on']) &&
                $proxy_config->settings['proxy_on'] == 1) {
                
                $proxy_settings = array();                
                $proxy_settings['proxy_host'] = $proxy_config->settings['proxy_host'];
                $proxy_settings['proxy_port'] = $proxy_config->settings['proxy_port'];
    
                if(!empty($proxy_config->settings['proxy_auth'])){
                    $proxy_settings['proxy_user'] = $proxy_config->settings['proxy_username'];
                    $proxy_settings['proxy_pass'] = $proxy_config->settings['proxy_password'];
                }
                
                $adapter = new Zend_Http_Client_Adapter_Proxy();
                $adapter->setConfig($proxy_settings);
                $client->setAdapter($adapter);            
            }
            
            $client->setMethod($method);
            if(!empty($headers)) {
                $client->setHeaders($headers);
            }
            if(!empty($params)) {
                if($method == 'GET') {
                    $client->setParameterGet($params);
                } else {
                    $client->setParameterPost($params);
                }
            }
            $this->_last = $resp = $client->request();
            $this->_lastReq = $client->getLastRequest();
            return $resp->getBody();
       }

       /**
        * Get HTTP client
        * @return Zend_Oauth_Client
        */
       public function getClient()
       {
            $acc = $this->makeAccessToken();
            return $acc->getHttpClient($this->_oauth_config);
       }

       /**
        * Get last response
        * @return string
        */
       public function getLastResponse()
       {
            return $this->_last;
       }

       /**
        * Get last request
        * @return string
        */
       public function getLastRequest()
       {
            return $this->_lastReq;
       }
    }

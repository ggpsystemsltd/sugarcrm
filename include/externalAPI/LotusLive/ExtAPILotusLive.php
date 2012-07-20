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


/**
 * ExtAPILotusLive.php
 *
 * This class handles the implementation of the External API access to create and retrieve meetings and
 * documents to the LotusLive cloud service.  It also handles the authentication of the OAuth session
 * to connect to the service.
 *
 */

require_once('include/externalAPI/Base/OAuthPluginBase.php');
require_once('include/externalAPI/Base/WebMeeting.php');
require_once('include/externalAPI/Base/WebDocument.php');

class ExtAPILotusLive extends OAuthPluginBase implements WebMeeting,WebDocument {

    static protected $llMimeWhitelist = array(
        'application/msword',
        'application/pdf',
        'application/postscript',
        'application/vnd.ms-excel',
        'application/vnd.ms-powerpoint',
        'application/vnd.oasis.opendocument.formula',
        'application/vnd.oasis.opendocument.graphics',
        'application/vnd.oasis.opendocument.presentation',
        'application/vnd.oasis.opendocument.presentation-template',
        'application/vnd.oasis.opendocument.spreadsheet',
        'application/vnd.oasis.opendocument.spreadsheet-template',
        'application/vnd.oasis.opendocument.text',
        'application/vnd.oasis.opendocument.text-master',
        'application/vnd.oasis.opendocument.text-template',
        'application/vnd.oasis.opendocument.text-web',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-word.document.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
        'application/vnd.ms-word.template.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-excel.sheet.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        'application/vnd.ms-excel.template.macroEnabled.12',
        'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
        'application/vnd.ms-excel.addin.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
        'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.presentationml.template',
        'application/vnd.ms-powerpoint.template.macroEnabled.12',
        'application/vnd.ms-powerpoint.addin.macroEnabled.12',
        'application/vnd.openxmlformats-officedocument.presentationml.slide',
        'application/vnd.ms-powerpoint.slide.macroEnabled.12',
        'application/vnd.ms-officetheme',
        'application/onenote',
        );
    protected $dateFormat = 'm/d/Y H:i:s';

    public $authMethod = 'oauth';
    public $supportedModules = array('Meetings','Notes', 'Documents');
    public $supportMeetingPassword = false;
    public $docSearch = true;
    public $restrictUploadsByExtension = false;
    public $connector = "ext_eapm_lotuslive";

    public $hostURL;
    protected $oauthReq = "/manage/oauth/getRequestToken";
    protected $oauthAuth = '/manage/oauth/authorizeToken';
    protected $oauthAccess = '/manage/oauth/getAccessToken';
    protected $oauthParams = array(
        'signatureMethod' => 'PLAINTEXT',
    );
    protected $url = 'https://apps.lotuslive.com/';

    public $canInvite = false;
    public $sendsInvites = false;
    public $needsUrl = false;
    // public $sharingOptions = array('private'=>'LBL_SHARE_PRIVATE','company'=>'LBL_SHARE_COMPANY','public'=>'LBL_SHARE_PUBLIC');

    function __construct() {
        if ( isset($GLOBALS['sugar_config']['ll_base_url']) ) {
            $this->url = $GLOBALS['sugar_config']['ll_base_url'];
        }
        $this->hostURL = $this->url.'meetings/host';
        $this->oauthReq = $this->url.'manage/oauth/getRequestToken';
        $this->oauthAuth = $this->url.'manage/oauth/authorizeToken';
        $this->oauthAccess = $this->url.'manage/oauth/getAccessToken';
        $this->_appStringErrorPrefix = $_appStringErrorPrefix = self::APP_STRING_ERROR_PREFIX . 'LOTUS_LIVE';
        parent::__construct();
    }

    public function loadEAPM($eapmBean)
    {
        parent::loadEAPM($eapmBean);

        if($eapmBean->url) {
            $this->url = $eapmBean->url;
        }

        if ( !empty($eapmBean->api_data) ) {
            $this->api_data = json_decode(base64_decode($eapmBean->api_data), true);
            if ( isset($this->api_data['subscriberID']) ) {
                $this->meetingID = $this->api_data['meetingID'];
                $this->hostURL = $this->api_data['hostURL'];
                $this->joinURL = $this->api_data['joinURL'];
                $this->subscriberID = $this->api_data['subscriberID'];
            }
        }
    }

    public function quickCheckLogin() {
        $reply = parent::quickCheckLogin();
        $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Parent Reply: '.print_r($reply,true));
        if ( $reply['success'] ) {
            $reply = $this->makeRequest('/shindig-server/social/rest/people/@me/@self');
            $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): LL Reply: '.print_r($reply,true));
            if ( $reply['success'] == true ) {
                if ( !empty($reply['responseJSON']['entry']['objectId']) ) {
                    $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Has objectId: '.print_r($reply['responseJSON']['entry']['objectId'],true));
                    return $reply;
                } else {
                    $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): No objectId: '.print_r($reply['responseJSON']['entry']['objectId'],true));
                    $reply['success'] = false;
                    $reply['errorMessage'] = translate('LBL_ERR_NO_RESPONSE', 'EAPM')." #QK1";
                }
            }
        }
        $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Bad reply: '.print_r($reply,true));

        return $reply;
    }

    public function checkLogin($eapmBean = null)
    {
        $reply = parent::checkLogin($eapmBean);
        if ( $reply['success'] != true ) {
            // $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Bad reply: '.print_r($reply,true));
            return $reply;
        }
        try {
            // get meeting details
            $reply = $this->makeRequest('/meetings/api/getMeetingDetails');
            if ( $reply['success'] == true ) {
                if ( $reply['responseJSON']['status'] != 'ok') {
                    $reply['success'] = false;
                    $reply['errorMessage'] = $reply['responseJSON']['details'];
                    return $reply;
                }
                $this->api_data = array(
                    'meetingID'=>$reply['responseJSON']['details']['meetingID'],
                    'hostURL'=>$reply['responseJSON']['details']['hostURL'],
                    'joinURL'=>$reply['responseJSON']['details']['joinURL'],
                );
            } else {
                // $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Bad reply: '.print_r($reply,true));
                return $reply;
            }
            // get user details
            $reply = $this->makeRequest('/shindig-server/social/rest/people/@me/@self');
            if ( $reply['success'] == true ) {
                $this->api_data['subscriberId'] = $reply['responseJSON']['entry']['objectId'];
            } else {
                // $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Bad reply: '.print_r($reply,true));
                return $reply;
            }
        } catch(Exception $e) {
            $reply['success'] = FALSE;
            $reply['errorMessage'] = $e->getMessage();
            // $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Bad reply: '.print_r($reply,true));
            return $reply;
        }

        $this->eapmBean->api_data = base64_encode(json_encode($this->api_data));

        // $GLOBALS['log']->debug(__FILE__.'('.__LINE__.'): Good reply: '.print_r($reply,true));
        return $reply;
    }

    /**
     * Create a new Lotus meeting.
     * @param string $name
     * @param string $startdate
     * @param string $duration
     * @param string $password
     * return: boolean
     */
    function scheduleMeeting($bean) {
        global $current_user;
        $bean->join_url = $this->api_data['joinURL'].'&TagCode=SugarCRM&TagID='.$bean->id;
        $bean->host_url = $this->api_data['hostURL'].'?TagCode=SugarCRM&TagID='.$bean->id;
        $bean->creator = $this->account_name;
        return array('success'=>TRUE);
    }

    /**
     * Edit an existing Lotus meeting
     * @param string $name
     * @param string $startdate
     * @param string $duration
     * @param string $password
     * return: boolean
     */
    function editMeeting($bean) {
        return $this->scheduleMeeting($bean);
    }

    /**
     * Delete an existing Lotus meeting.
     * @param string $meeting - The Lotus meeting key.
     * return: boolean
     */
    function unscheduleMeeting($bean) {
        // There is nothing to do here.
        return array('success'=>TRUE);
    }

    /**
     * NOT SUPPORTED BY LOTUS
     * Invite $attendee to the meeting with key $session.
     * @param string $meeting - The Lotus session key.
     * @param array $attendee - An array with entries for 'name' and 'email'
     * return: boolean.
     */
    function inviteAttendee($bean, $attendee, $sendInvites = false) {
        // There is nothing to do here, this is not supported by Lotus Live
        return array('success'=>TRUE);
    }

    /**
     * NOT SUPPORTED BY LOTUS
     * Uninvite the attendee with ID $attendeeID from the meeting.
     * Note: attendee ID is returned as part of the response to
     * inviteAtendee().  The attendee ID refers to a specific person
     * and a specific meeting.
     * @param array $attendeeID - Lotus attendee ID.
     * return: boolean.
     */
    function uninviteAttendee($bean,$attendeeID) {
        // There is nothing to do here, this is not supported by Lotus Live
        return array('success'=>TRUE);
    }

    /**
     * List all meetings created by this object's Lotus user.
     */
    function listMyMeetings() {
        // There is nothing to do here, this is not supported by Lotus Live
        return array('success'=>TRUE);
    }

    /**
     * Get detailed information about the meeting
     * with key $meeting.
     * @param string meeting- The Lotus meeting key.
     * return: The XML response from the Lotus server.
     */
    function getMeetingDetails($bean) {
        // TODO: Implement this, get the meeting information from the provided tags.
        return array('success'=>TRUE);
    }

    /**
     * Get HTTP client for communication with Lotus
     *
     * Creates and setup the http client object, including authorization data if needed
     *
     * @return Zend_Http_Client
     */
    protected function getClient()
    {
        $client = $this->getOauth($this)->getClient();
        return $client;
    }

    public function uploadDoc($bean, $fileToUpload, $docName, $mimeType)
    {
        // Let's see if this is not on the whitelist of mimeTypes
        if ( empty($mimeType) || ! in_array($mimeType,self::$llMimeWhitelist)) {
            // It's not whitelisted
            $mimeType = 'application/octet-stream';
        }

        $client = $this->getClient();
        $url = $this->url."files/basic/cmis/repository/p!{$this->api_data['subscriberId']}/folderc/snx:files";
        if ( $this->getVersion() == 1 ) {
            $url .= "!{$this->api_data['subscriberId']}";
        }
        $GLOBALS['log']->debug("LOTUS REQUEST: $url");
        $rawResponse = $client->setUri($url)
            ->setRawData(file_get_contents($fileToUpload), $mimeType)
            ->setHeaders("slug", $docName)
            ->request("POST");
        $reply = array('rawResponse' => $rawResponse->getBody());

        //$GLOBALS['log']->debug("REQUEST: ".var_export($client->getLastRequest(), true));
        //$GLOBALS['log']->debug("RESPONSE: ".var_export($rawResponse, true));

        if(!$rawResponse->isSuccessful() || empty($reply['rawResponse'])) {
            $reply['success'] = false;
            $reply['errorMessage'] = $this->getErrorStringFromCode($rawResponse->getMessage());
            return $reply;
        }

        $xml = new DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->strictErrorChecking = false;
        $xml->loadXML($reply['rawResponse']);
        if ( !is_object($xml) ) {
            $reply['success'] = false;
            $reply['errorMessage'] = $this->getErrorStringFromCode(libxml_get_errors());
            return $reply;
        }

        $xp = new DOMXPath($xml);
        $url = $xp->query('//atom:entry/atom:link[attribute::rel="alternate"]');
        $directUrl = $xp->query('//atom:entry/atom:link[attribute::rel="edit-media"]');
        $id = $xp->query('//atom:entry/cmisra:pathSegment');

        if ( !is_object($url) || !is_object($directUrl) || !is_object($id) ) {
            $reply['success'] = false;
            $reply['errorMessage'] = $this->getErrorStringFromCode();
            return $reply;
        }
        $bean->doc_url = $url->item(0)->getAttribute("href");
        $bean->doc_direct_url = $directUrl->item(0)->getAttribute("href");
        $bean->doc_id = $id->item(0)->textContent;

        // Refresh the document cache
        $this->loadDocCache(true);

        return array('success'=>TRUE);
    }

    public function deleteDoc($document)
    {
        $client = $this->getClient();
        $url = $this->url."files/basic/cmis/repository/p!{$this->api_data['subscriberId']}/object/snx:file!{$document->doc_id}";
        $GLOBALS['log']->debug("LOTUS REQUEST: $url");
        $rawResponse = $client->setUri($url)
            ->request("DELETE");
        $reply = array('rawResponse' => $rawResponse->getBody());
        $GLOBALS['log']->debug("REQUEST: ".var_export($client->getLastRequest(), true));
        $GLOBALS['log']->debug("RESPONSE: ".var_export($rawResponse, true));

        // Refresh the document cache
        $this->loadDocCache(true);

        return array('success'=>TRUE);
    }

    public function downloadDoc($documentId, $documentFormat){}
    public function shareDoc($documentId, $emails){}

    public function loadDocCache($forceReload = false) {
        global $db, $current_user;

        create_cache_directory('/include/externalAPI/');
        $cacheFileBase = 'cache/include/externalAPI/docCache_'.$current_user->id.'_LotusLiveDirect';
        if ( !$forceReload && file_exists($cacheFileBase.'.php') ) {
            // File exists
            include_once($cacheFileBase.'.php');
            if ( abs(time()-$docCache['loadTime']) < 3600 ) {
                // And was last updated an hour or less ago
                return $docCache['results'];
            }
        }
        $requestUrl = '/files/basic/cmis/repository/p!'.$this->api_data['subscriberId'].'/folderc/snx:files';
        if ( $this->getVersion() == 1 ) {
            $requestUrl .= '!'.$this->api_data['subscriberId'];
        }
        $requestUrl .= '?maxItems=50';
        $reply = $this->makeRequest($requestUrl,'GET',false);

        $xml = new DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->strictErrorChecking = false;
        $xml->loadXML($reply['rawResponse']);
        if ( !is_object($xml) ) {
            $reply['success'] = false;
            // FIXME: Translate
            $reply['errorMessage'] = 'Bad response from the server: '.print_r(libxml_get_errors(),true);
            return;
        }

        $xp = new DOMXPath($xml);

        $results = array();

        $fileNodes = $xp->query('//atom:feed/atom:entry');
        foreach ( $fileNodes as $fileNode ) {
            $result = array();

            $idTmp = $xp->query('.//atom:id',$fileNode);
            list($dontcare,$result['id']) = explode("!",$idTmp->item(0)->textContent);

            $nameTmp = $xp->query('.//atom:title',$fileNode);
            $result['name'] = $nameTmp->item(0)->textContent;

            $timeTmp = $xp->query('.//atom:updated',$fileNode);
            $timeTmp2 = $timeTmp->item(0)->textContent;
            $result['date_modified'] = preg_replace('/^([^T]*)T([^.]*)\....Z$/','\1 \2',$timeTmp2);

            $result['url'] = $this->url.'files/filer2/home.do#files.do?subContent=fileDetails.do?fileId='.$result['id'];

            $results[] = $result;
        }


        $docCache['loadTime'] = time();
        $docCache['results'] = $results;
        $fd = fopen($cacheFileBase.'_tmp.php','w');
        fwrite($fd,'<'."?php\n// This file was auto generated by '.__FILE__.' do not overwrite.\n\n".'$docCache = '.var_export($docCache,true).";\n");
        fclose($fd);
        rename($cacheFileBase.'_tmp.php',$cacheFileBase.'.php');

        return $results;
    }
    public function searchDoc($keywords,$flushDocCache=false){
        $docList = $this->loadDocCache($flushDocCache);

        $results = array();

        $searchLen = strlen($keywords);

        foreach ( $docList as $doc ) {
            if ( empty($keywords) || strncasecmp($doc['name'],$keywords,strlen($keywords)) == 0 ) {
                // It matches
                $results[] = $doc;

                if ( count($results) > 15 ) {
                    // Only return the first 15 results
                    break;
                }
            }
        }

        return $results;
    }

    /**
     * Make request to a service
     * @param unknown_type $url
     * @param unknown_type $method
     * @param unknown_type $json
     */
    protected function makeRequest($urlReq, $method = 'GET', $json = true)
    {
        $client = $this->getClient();
        $url = rtrim($this->url,"/")."/".ltrim($urlReq, "/");
        $GLOBALS['log']->debug("REQUEST: $url");
        $rawResponse = $client->setUri($url)->request($method);
        $reply = array('rawResponse' => $rawResponse->getBody());
        $GLOBALS['log']->debug("RESPONSE: ".var_export($rawResponse, true));
        if($json) {
            $response = json_decode($reply['rawResponse'],true);
            $GLOBALS['log']->debug("RESPONSE-JSON: ".var_export($response, true));
            if ( empty($rawResponse) || !is_array($response) ) {
                $reply['success'] = FALSE;
                // FIXME: Translate
                $reply['errorMessage'] = 'Bad response from the server';
            } else {
                $reply['responseJSON'] = $response;
                $reply['success'] = TRUE;
            }
        } else {
            $reply['success'] = true;
        }

        return $reply;
    }

    /**
     * Check the API version
     */
    protected function getVersion()
    {
        static $cacheVersion;

        if ( isset($cacheVersion) ) {
            return $cacheVersion;
        }


        $defaultVersion = 2;

        $reply = $this->makeRequest('/files/basic/cmis/my/servicedoc','GET',false);
        if ( !$reply['success'] ) {
            // Return the default version, not much else we can do except not cache this
            return $defaultVersion;
        }

        $xml = new DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->strictErrorChecking = false;
        $xml->loadXML($reply['rawResponse']);
        if ( !is_object($xml) ) {
            // Return the default version, not much else we can do except not cache this
            return $defaultVersion;
        }

        $xp = new DOMXPath($xml);

        $results = array();

        $versionNodes = $xp->query('//cmisra:repositoryInfo/cmis:productName');

        $versionLabel = $versionNodes->item(0)->textContent;

        switch ( $versionLabel ) {
            case 'LotusLive Files':
                $version = 1;
                break;
            case 'IBM Connections - Files':
                $version = 2;
                break;
            default:
                $GLOBALS['log']->error('Lotus Live API version could not be detected, the version label returned was: '.$versionLabel);
                $version = 2;
                break;
        }

        $cacheVersion = $version;
        return $version;
    }


    /**
   	 * getErrorStringFromCode
     *
     * This method overrides the getErrorStringFromCode method from the ExternalAPIBase class and provides
     * for custom error messages specific to the Lotus Live web service.
   	 *
   	 * @param $error Mixed variable of the error message, number or object returned from Lotus Live web service
     * @return String Translated string label for the error message
   	 */
   	protected function getErrorStringFromCode($error='')
   	{
        //For non-string or empty error number/message, just return a generic message for now
        if(empty($error) || !is_string($error))
        {
            return $GLOBALS['app_strings']['ERR_EXTERNAL_API_SAVE_FAIL'];
        }

        //Create the error key to match against from the language files
   	    $language_key = $this->_appStringErrorPrefix . '_' . strtoupper($error);

   	    if(isset($GLOBALS['app_strings'][$language_key]))
        {
   	       return $GLOBALS['app_strings'][$language_key];
        }

        return $GLOBALS['app_strings']['ERR_EXTERNAL_API_SAVE_FAIL'];
   	}
}
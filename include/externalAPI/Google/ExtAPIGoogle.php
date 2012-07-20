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


require_once('include/externalAPI/Base/ExternalAPIBase.php');
require_once('include/externalAPI/Base/WebDocument.php');
require_once('Zend/Gdata/Docs.php');
require_once('Zend/Gdata/Docs/Query.php');
require_once('Zend/Gdata/ClientLogin.php');
require_once('Zend/Gdata/Contacts.php');
/**
 * ExtAPIGoogle
 * 
 * This class manages the communication to the Google document web services. Currently the
 * Zend_Gdata_Docs class is used in PHP (see http://framework.zend.com/manual/en/zend.gdata.docs.html).
 * The Zend_Gdata_Docs class currently used in this class adheres to the Google Documents List 
 * API 1.0 specification (see http://code.google.com/apis/documents/docs/1.0/developers_guide_protocol.html).
 * 
 * There are some known limitations with the documents that may be searched.  In particular, we have 
 * observed that certain file types that are uploaded to Google Docs do not appear when queried (.png, .tpl, etc.).
 * On the other hand, files that are created within Google Docs will be displayed.  So for example,
 * if you were to create a new drawing and insert a PNG file into the drawing, the drawing will appear in 
 * the result list and be able to be uploaded to SugarCRM.
 *
 */
class ExtAPIGoogle extends ExternalAPIBase implements WebDocument {
	
    public $supportedModules = array('Documents', 'Notes','Import');
    public $authMethod = 'password';
    public $connector = "ext_eapm_google";

    protected $scope = "https://docs.google.com/feeds/ http://docs.google.com/feeds/";
    protected $oauthReq ="https://www.google.com/accounts/OAuthGetRequestToken";
    protected $oauthAuth ="https://www.google.com/accounts/OAuthAuthorizeToken";
    protected $oauthAccess ="https://www.google.com/accounts/OAuthGetAccessToken";

    public $docSearch = true;
    public $needsUrl = false;
    public $sharingOptions = null;
    public $restrictUploadsByExtension = true;
    
    const APP_STRING_ERROR_PREFIX = 'ERR_GOOGLE_API_';
    
	function __construct(){
		require_once('include/externalAPI/Google/GoogleXML.php');
		$this->oauthReq .= "?scope=".urlencode($this->scope);
		
		$this->restrictUploadsByExtension = $this->getAcceptibleFileExtensions();
	}

    protected function getIdFromUrl($url) {
        preg_match(
            '/id=([\S]*)[&|$]/',
            $url,
            $matches
            );
        $id = $matches[1];

        return $id;
    }

    public function checkLogin($eapmBean = null)
    {
        parent::checkLogin($eapmBean);

        // Emulate a reply
        $reply['success'] = TRUE;

        try {
            $this->getClient();
		    // test documents access
		    $docs = $this->gdClient->getDocumentListFeed('https://docs.google.com/feeds/default/private/full?title=TestTestTest');
        } catch (Exception $e) {
            $reply['success'] = FALSE;
            $reply['errorMessage'] = $e->getMessage();
        }

        return $reply;
    }

    /**
     * Retrieve the gdata client.
     *
     * @param  String $gdType The Gdata type
     * @return
     */
    public function getClient($gdType = "docs"){
        if ( isset($this->httpClient) ) {
            // Already logged in
            return;
        }
		$service = $this->getServiceAuthName($gdType);
		if( $this->authMethod == 'oauth') {
		    // FIXME: bail if auth token not set
            $this->httpClient = $this->authData->getHttpClient($this);
		} else {
		    $this->httpClient = Zend_Gdata_ClientLogin::getHttpClient($this->account_name, $this->account_password, $service);
		}

        $this->setGDataClient($gdType);
    }

    private function getServiceAuthName($type)
    {
        switch($type)
        {
            case "docs":
                return Zend_Gdata_Docs::AUTH_SERVICE_NAME;
            case "contacts":
                return Zend_Gdata_Contacts::AUTH_SERVICE_NAME;
            default:
                return '';
        }

    }
    /**
     * Set the Gdata container based upon the type.
     *
     * @param  String $type
     * @return void
     */
    protected function setGDataClient($type)
    {
        switch($type)
        {
            case "docs":
                $GLOBALS['log']->debug("Loading Docs GData");
                $this->gdClient = new Zend_Gdata_Docs($this->httpClient, 'SugarCRM-GDocs-0.1');
                break;
            case "contacts":
                $GLOBALS['log']->debug("Loading Contacts GData");
                $this->gdClient = new Zend_Gdata_Contacts($this->httpClient);
                break;
            default:
                $GLOBALS['log']->debug("Loading Regular GData");
                $this->gdClient = new Zend_Gdata($this->httpClient);
                break;
        }
    }

	function uploadDoc($bean, $fileToUpload, $docName, $mimeType){
		$this->getClient();
		$filenameParts = explode('.', $fileToUpload);
		$fileExtension = end($filenameParts);
        
        // Remap the mime type to something acceptable if we can do it.
        $goodMimeTypes = Zend_Gdata_Docs::getSupportedMimeTypes();
        if ( isset($goodMimeTypes[strtoupper($fileExtension)]) ) {
            $mimeType = $goodMimeTypes[strtoupper($fileExtension)];
        }

		try{
		    
            $newDocumentEntry = $this->gdClient->uploadFile($fileToUpload, $docName,
                                                            $mimeType,

                                                            Zend_Gdata_Docs::DOCUMENTS_LIST_FEED_URI);
            $fileid=$newDocumentEntry->id;
            $cut = substr($fileid, 63);
            // Find the URL of the HTML view of this document.
            $alternateLink = $newDocumentEntry->getAlternateLink()->getHref();
            $bean->doc_id = $cut;
            $bean->doc_url = $alternateLink;
            $result['success'] = TRUE;
		}
		catch(Zend_Gdata_App_HttpException $e)
		{
		    $result['success'] = FALSE;
		    $resp = $e->getResponse();  //Zend_Http_Response with details of failed request.
            $result['errorMessage'] = $this->getErrorStringFromCode($resp->getStatus());
		}
		catch(Zend_Gdata_App_IOException $e)
		{
		    $result['success'] = FALSE;
		    $result['errorMessage'] = $GLOBALS['app_strings']['ERR_EXTERNAL_API_UPLOAD_FAIL'];
		}
		catch (Exception $e)
         {
             $result['success'] = FALSE;
             $result['errorMessage'] = $GLOBALS['app_strings']['ERR_EXTERNAL_API_SAVE_FAIL'];
         }

        return $result;
	}

    function downloadDoc($documentId, $documentFormat){
		$this->getClient();
    	$format = 'txt';
    	$document = $this->gdClient->getDocument($documentId);

    	if($this->authMethod == "password") {
    	    // FIXME: can't we just use the httpClient? It should add auth automatically
    		$sessionToken = $this->httpClient->getClientLoginToken();
    		$GLOBALS['log']->debug('Session Token: '.$sessionToken);
    		$url = $document->content->getSrc();
    		$opts = array(
    		    'http' => array(
    		    'method' => 'GET',
    		    'header' => "Host: docs.google.com\r\n".
    		    			"GData-Version: 2.0\r\n".
    						"Content-type: application/x-www-form-urlencoded\r\n".
    		                "Authorization: $sessionToken"
    			)
    		);
    		if ($url != null) {
    		    $url =  $url . "&exportFormat=$format";
    		}
    		$GLOBALS['log']->debug('Google Doc URL: '.$url);
    		echo file_get_contents($url, false, stream_context_create($opts));
    	} else {
    	    echo $this->httpClient->setUri($url)->request('GET')->getBody();
    	}
    }

    function deleteDoc($documentId) {
		$this->getClient();
    	$document = $this->gdClient->getDocument($documentId);
    	return  $document->delete();
    }

	function shareDoc($documentId, $emails){

	}
    function searchDoc($keywords, $flushDocCache = false){
		$this->getClient();

        if ( empty($keywords) ) 
        {
            $feed = $this->gdClient->getDocumentListFeed('https://docs.google.com/feeds/default/private/full');
        } else {
            $docsQuery = new Zend_Gdata_Docs_Query();
            // This does a full-text search, which is awesome
            // but doesn't match what the other providers have (title search)
            // So we have to switch it for just a title search
            // $docsQuery->setQuery($keywords);
            $docsQuery->setTitle($keywords);
            $feed = $this->gdClient->getDocumentListFeed($docsQuery);
        }

        $rawResults = $feed->getEntry();

        $results = array();
        foreach ( $rawResults as $result ) {
            $curr['url'] = $result->getAlternateLink()->getHref();
            $curr['name'] = $result->title->getText();
            $curr['date_modified'] = $result->updated->getText();
            $cut = substr($result->id, 63);
            $curr['id'] = $cut;
            $results[] = $curr;
        }

        return $results;
    }
    
    private function getAcceptibleFileExtensions() {
        $mimeTypes = Zend_Gdata_Docs::getSupportedMimeTypes();
        //If we can detect mime types, allow empty file extensions.
        if( $this->isMimeDetectionAvailable() )
            $mimeTypes[''] = '';
        return array_keys($mimeTypes);        
    }
    
}
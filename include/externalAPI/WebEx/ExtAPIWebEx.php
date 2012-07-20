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
require_once('include/externalAPI/Base/WebMeeting.php');

class ExtAPIWebEx extends ExternalAPIBase implements WebMeeting {

    protected $dateFormat = 'm/d/Y H:i:s';
    protected $urlExtension = '/WBXService/XMLService';

    public $supportedModules = array('Meetings');
    public $supportMeetingPassword = true;
    public $authMethod = 'password';
    public $connector = "ext_eapm_webex";

    public $canInvite = true;
    public $sendsInvites = true;
    public $needsUrl = true;

	function __construct() {
      require('include/externalAPI/WebEx/WebExXML.php');

      $this->schedule_xml = $schedule_xml;
      $this->unschedule_xml = $unschedule_xml;
      $this->details_xml = $details_xml;
      $this->listmeeting_xml = $listmeeting_xml;
      $this->invite_xml = $invite_xml;
      $this->uninvite_xml = $uninvite_xml;
      $this->joinmeeting_xml = $joinmeeting_xml;
      $this->hostmeeting_xml = $hostmeeting_xml;
      $this->edit_xml = $edit_xml;
      $this->getuser_xml = $getuser_xml;
   }

    public function loadEAPM($eapmBean) {
        if(empty($eapmBean->url)) {
            $eapmBean->url = $this->getConnectorParam('url');
        }
        if ( !empty($eapmBean->url) ) {
            $eapmBean->url = $this->fixUrl($eapmBean->url);
        }
        $this->account_url = $eapmBean->url.$this->urlExtension;
        parent::loadEAPM($eapmBean);
    }

    public function checkLogin($eapmBean = null) {
        if ( !empty($eapmBean->url) ) {
            $eapmBean->url = $this->fixUrl($eapmBean->url);
        }
        $reply = parent::checkLogin($eapmBean);
        if ( ! $reply['success'] ) {
            return $reply;
        }
        $doc = new SimpleXMLElement($this->getuser_xml);
        $this->addAuthenticationInfo($doc);

        $doc->body->bodyContent->webExId = $this->account_name;

        $reply = $this->postMessage($doc);

        return $reply;
    }

    protected function fixUrl($url) {
        // The rest of the code expects us to not have a http:// or a https:// at the start
        $outUrl = preg_replace(',^http(s)?://,i','',$url);
        return $outUrl;
    }

	/**
	 * Create a new WebEx meeting.
	 * @param string $name
	 * @param string $startdate
	 * @param string $duration
	 * @param string $password
	 * return: The XML response from the WebEx server.
	 */
	function scheduleMeeting($bean) {
		global $current_user;

        if (!empty($bean->external_id)) {
            $doc = new SimpleXMLElement($this->edit_xml);
            $doc->body->bodyContent->meetingkey = $bean->external_id;
        } else {
            $doc = new SimpleXMLElement($this->schedule_xml);
        }
		$this->addAuthenticationInfo($doc);

		$doc->body->bodyContent->accessControl->meetingPassword = $bean->password;

		$doc->body->bodyContent->metaData->confName = $bean->name;
		$doc->body->bodyContent->metaData->agenda = '';

		$doc->body->bodyContent->participants->maxUserNumber = '1';
        $attendee = $doc->body->bodyContent->participants->attendees->addChild('attendee', '');
		$person = $attendee->addChild('person');
		$person->addChild('name', $GLOBALS['current_user']->full_name);
		$person->addChild('email', $GLOBALS['current_user']->email1);

        // FIXME: Use TimeDate
        $startDate = date($this->dateFormat, strtotime($bean->date_start));

		$doc->body->bodyContent->schedule->startDate = $startDate;
		// TODO: what's openTime?
		$doc->body->bodyContent->schedule->openTime = '900';

        $duration = (60 * (int)($bean->duration_hours)) + ((int)($bean->duration_minutes));
		$doc->body->bodyContent->schedule->duration = $duration;
		//ID of 20 is GMT
		$doc->body->bodyContent->schedule->timeZoneID = '20';

        $reply = $this->postMessage($doc);

        if ($reply['success']) {
            if ( empty($bean->external_id) ) {
                $xp = new DOMXPath($reply['responseXML']);
                // Only get the external ID when I create a new meeting.
                $bean->external_id = $xp->query('/serv:message/serv:body/serv:bodyContent/meet:meetingkey')->item(0)->nodeValue;
                $GLOBALS['log']->debug('External ID: '.print_r($bean->external_id,true));
            }

            // Figure out the join url
            $join_reply = $this->joinMeeting($bean,$GLOBALS['current_user']->full_name);
            $xp = new DOMXPath($join_reply['responseXML']);
            $bean->join_url = $xp->query('/serv:message/serv:body/serv:bodyContent/meet:joinMeetingURL')->item(0)->nodeValue;
            // Strip out the name parts of the join URL, make them type them in. Since we are storing the join_url per meeting
            // we can't really use one first and last name for the whole site.
            $bean->join_url = preg_replace('/&FN=.*&LN=.*/','',$bean->join_url);
            $GLOBALS['log']->debug('Join URL: '.print_r($bean->join_url,true));


            // Figure out the host url
            $host_reply = $this->hostMeeting($bean);
            $xp = new DOMXPath($host_reply['responseXML']);
            $bean->host_url = $xp->query('/serv:message/serv:body/serv:bodyContent/meet:hostMeetingURL')->item(0)->nodeValue;
            $GLOBALS['log']->debug('Host URL: '.print_r($bean->host_url,true));

            $bean->creator = $this->account_name;
        } else {
            $bean->join_url = '';
            $bean->host_url = '';
            $bean->external_id = '';
            $bean->creator = '';
        }

        return $reply;
	}

	/**
	 * Edit an existing webex meeting
	 * @param string $name
	 * @param string $startdate
	 * @param string $duration
	 * @param string $password
	 * return: The XML response from the WebEx server.
	 */
   function editMeeting($bean) {
      return $this->scheduleMeeting($bean);
   }

	/**
	 * Delete an existing WebEx meeting.
	 * @param string $meeting - The WebEx meeting key.
	 * return: The XML response from the WebEx server.
	 */
	function unscheduleMeeting($bean) {
		$doc = new SimpleXMLElement($this->unschedule_xml);
		$this->addAuthenticationInfo($doc);
		$doc->body->bodyContent->meetingKey = $bean->external_id;
		return $this->postMessage($doc);
	}

   /**
    * Get the url for joining the meeting with key $meeting as
    * attendee $attendeeName.
    * @param string meeting - The WebEx meeting key.
    * @param string attendeeName - Name of joining attendee
	 * return: The XML response from the WebEx server.
    */
	function joinMeeting($bean, $attendeeName) {
      $doc = new SimpleXMLElement($this->joinmeeting_xml);
      $this->addAuthenticationInfo($doc);
      $doc->body->bodyContent->sessionKey = $bean->external_id;
      $doc->body->bodyContent->attendeeName = $attendeeName;
      return $this->postMessage($doc);
	}


   /**
    * Get the url for hosting the meeting with key $meeting.
    * @param string meeting - The WebEx meeting key.
	 * return: The XML response from the WebEx server.
    */
   function hostMeeting($bean) {
      $doc = new SimpleXMLElement($this->hostmeeting_xml);
      $this->addAuthenticationInfo($doc);
      $doc->body->bodyContent->sessionKey = $bean->external_id;
      return $this->postMessage($doc);
   }

	/**
	 * Invite $attendee to the meeting with key $session.
	 * @param string $meeting - The WebEx session key.
	 * @param array $attendee - An array with entries for 'name' and 'email'
	 * return: The XML response from the WebEx server.
	 */
   function inviteAttendee($bean, $attendee, $sendInvites = false) {
      $doc = new SimpleXMLElement($this->invite_xml);
      $this->addAuthenticationInfo($doc);
      $body = $doc->body->bodyContent;
      $person = $body->addChild('person', '');
      $person->addChild('name', $attendee->name);
      $person->addChild('email', $attendee->email1);
      $body->addChild('sessionKey', $bean->external_id);
      $body->addChild('emailInvitations', $sendInvites?'true':'false');
      return $this->postMessage($doc);
	}

   /**
    * Uninvite the attendee with ID $attendeeID from the meeting.
    * Note: attendee ID is returned as part of the response to
    * inviteAtendee().  The attendee ID refers to a specific person
    * and a specific meeting.
    * @param array $attendeeID - WebEx attendee ID.
	 * return: The XML response from the WebEx server.
    */
   function uninviteAttendee($bean, $attendeeID) {
      $doc = new SimpleXMLElement($this->uninvite_xml);
      $this->addAuthenticationInfo($doc);
      $doc->body->bodyContent->attendeeID = $attendeeID;
      return $this->postMessage($doc);
   }

   /**
    * List all meetings created by this object's WebEx user.
    */
   function listMyMeetings() {
      $doc = new SimpleXMLElement($this->listmeeting_xml);
      $this->addAuthenticationInfo($doc);
      return $this->postMessage($doc);
   }

   /**
    * Get detailed information about the meeting
    * with key $meeting.
    * @param string meeting- The WebEx meeting key.
	 * return: The XML response from the WebEx server.
    */
   function getMeetingDetails($bean) {
      $doc = new SimpleXMLElement($this->details_xml);
      $this->addAuthenticationInfo($doc);
      $doc->body->bodyContent->meetingKey = $bean->external_id;
      return $this->postMessage($doc);
   }

   /**
    * Adds values to the security context header for a
    * WebEx XML request.
    * @param SimpleXMLElement $doc
    */
	private function addAuthenticationInfo($doc) {
		$securityContext = $doc->header->securityContext;
      $securityContext->webExID = $this->account_name;
      $securityContext->password = $this->account_password;
      $siteName = substr($this->account_url, 0, strpos($this->account_url, '.'));
      $securityContext->siteName = $siteName;
	}

   /**
    * Sends a request to the WebEx XML API.
    * @param SimpleXMLElement $doc
    */
   private function postMessage($doc) {
      $host = substr($this->account_url, 0, strpos($this->account_url, "/"));
      $uri = strstr($this->account_url, "/");
      $xml = $doc->asXML();

      $content_length = strlen($xml);
      $headers = array(
         "POST $uri HTTP/1.0",
         "Host: $host",
         "User-Agent: PostIt",
         "Content-Type: application/x-www-form-urlencoded",
         "Content-Length: ".$content_length,
      );

      $GLOBALS['log']->debug('Sent To WebEx: '.$xml);
      $response = $this->postData('https://' . $this->account_url, $xml, $headers);
      // $reply is an associative array that formats the basic information in a way that
      // callers can get most of the data out without having to understand any underlying formats.
      $reply = array();
      $reply['responseRAW'] = $response;
      $reply['responseXML'] = null;
      if ( empty($response) ) {
          $reply['success'] = FALSE;
          // FIXME: Translate
          $reply['errorMessage'] = translate('LBL_ERR_NO_RESPONSE', 'EAPM');
      } else {
          // The namespaces seem to destroy SimpleXML.
          // $responseXML = new SimpleXMLElement(str_replace('serv:message','message',$response),NULL,false,'http://www.webex.com/schemas/2002/06/service');
          $responseXML = new DOMDocument();
          $responseXML->preserveWhiteSpace = false;
          $responseXML->strictErrorChecking = false;
          $responseXML->loadXML($response);
          if ( !is_object($responseXML) ) {
              $GLOBALS['log']->error("XML ERRORS:\n".print_r(libxml_get_errors(),true));
              // Looks like the XML processing didn't go so well.
              $reply['success'] = FALSE;
              // FIXME: Translate
              $reply['errorMessage'] = translate('LBL_ERR_NO_RESPONSE', 'EAPM');
          } else {
              $reply['responseXML'] = $responseXML;
              $xpath = new DOMXPath($responseXML);
              // $status = (string)$responseXML->header->response->result;
              $status = (string)$xpath->query('/serv:message/serv:header/serv:response/serv:result')->item(0)->nodeValue;
              if ( $status == 'SUCCESS' ) {
                  $reply['success'] = TRUE;
                  $reply['errorMessage'] = '';
              } else {
                  $GLOBALS['log']->debug("Status:\n".print_r($status,true));
                  $reply['success'] = FALSE;
                  // $reply['errorMessage'] = (string)$responseXML->header->response->reason;
                  $reply['errorMessage'] = (string)$xpath->query('/serv:message/serv:header/serv:response/serv:reason')->item(0)->nodeValue;
              }
          }
      }
      $GLOBALS['log']->debug("Parsed Reply:\n".print_r($reply,true));
      return $reply;
   }
}

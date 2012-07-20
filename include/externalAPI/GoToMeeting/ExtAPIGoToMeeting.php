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

class ExtAPIGoToMeeting extends ExternalAPIBase implements WebMeeting {

    private $login_key;

    protected $dateFormat = 'Y-m-d\TH:i:s';
    protected $account_url = 'www.gotomeeting.com/axis/services/G2M_Organizers';

    public $supportedModules = array('Meetings');
    public $supportMeetingPassword = true;
    public $authMethod = 'password';
    public $connector = "ext_eapm_gotomeeting";

    public $canInvite = false;
    public $sendsInvites = false;
    public $needsUrl = false;

    function __construct() {
        require('include/externalAPI/GoToMeeting/GoToXML.php');
        $this->login_xml = $login_xml;
        $this->schedule_xml = $schedule_xml;
        $this->host_xml = $host_xml;
        $this->logoff_xml = $logoff_xml;
        $this->edit_xml = $edit_xml;
    }

    public function loadEAPM($eapmBean) {
        parent::loadEAPM($eapmBean);
    }

    public function checkLogin($eapmBean = null)
    {
        parent::checkLogin($eapmBean);

        $reply = $this->login();
        if ( $reply['success'] ) {
            $this->logoff();
        }

        return $reply;
    }

    function login() {
        $doc = new SimpleXMLElement($this->login_xml);
        $namespaces = $doc->getDocNamespaces();
        $body = $doc->children($namespaces['soap']);
        $impl = $body[0]->children($namespaces['impl']);
        $child = $impl[0];
        $child->id = $this->account_name;
        $child->password = $this->account_password;

        $response = $this->postMessage($doc);
        if ( $response['success'] ) {
            $xp = new DOMXPath($response['responseXML']);
            $this->login_key = $xp->query('/soapenv:Envelope/soapenv:Body')->item(0)->nodeValue;
            $GLOBALS['log']->debug("LOGIN KEY: ".print_r($this->login_key,true));
        } else {
            $this->login_key = '';
        }

        return $response;
    }

    public function logOff() {
        $doc = new SimpleXMLElement($this->logoff_xml);
        $namespaces = $doc->getDocNamespaces();
        $body = $doc->children($namespaces['soap']);
        $impl = $body[0]->children($namespaces['impl']);
        $child = $impl[0];
        $child->connectionId = $this->login_key;

        return $this->postMessage($doc);
    }

    function scheduleMeeting($bean) {
        // $name, $startDate, $duration, $password) {
        if (empty($this->login_key)) {
            $response = $this->login();
            if (empty($this->login_key) ) {
                // Login failed, send the error message back to the parent
                return $response;
            }
        }

        if (!empty($bean->external_id) ) {
            return $this->editMeeting($bean);
        }

        $doc = new SimpleXMLElement($this->schedule_xml);
        $namespaces = $doc->getDocNamespaces();
        $body = $doc->children($namespaces['soap']);
        $impl = $body[0]->children($namespaces['impl']);
        $createMeeting = $impl[0];
        $createMeeting->connectionId = $this->login_key;
        $createMeeting->meetingParameters->subject = $bean->name;
        // FIXME: Use TimeDate
        $startDate = date($this->dateFormat, strtotime($bean->date_start));
        $createMeeting->meetingParameters->startTime = $startDate;

        /* From the GoToMeeting API docs:
         *
         * 'Note: If passwordRequired is set to True then a password will be
         * requested of the organizer when starting the meeting. The password is
         * selected by the organizer and communicated to the attendees before the
         * meeting is started. The organizer must properly enter the password
         * communicated, otherwise the authentication will be different and the
         * attendees will not be able to join the meeting until the proper password
         * is provided by the organizer.'
         *
         * Since the password is chosen at the start of the meeting, the value
         * passed here can't be used.
         * If a non-empty string is passed, the meeting will be created with
         * the password option on.
         */
        if (!empty($bean->password)) {
            $createMeeting->meetingParameters->passwordRequired = 'true';
        } else {
            $createMeeting->meetingParameters->passwordRequired = 'false';
        }

        $reply = $this->postMessage($doc);
        if ($reply['success']) {

            $xp = new DOMXPath($reply['responseXML']);
            // $xp->registerNamespace('soapenv','http://schemas.xmlsoap.org/soap/envelope/');

            $bean->join_url = $xp->query('//multiRef[name="joinURL"]/value')->item(0)->nodeValue;

            $uniqueMeetingId = $xp->query('//multiRef[name="uniqueMeetingId"]/value')->item(0)->nodeValue;

            $meetingId = $xp->query('//multiRef[@id="id5"]')->item(0)->nodeValue;

            $bean->external_id = $meetingId.'-'.$uniqueMeetingId;

            $hostReply = $this->hostMeeting(array($meetingId,$uniqueMeetingId));
            if ( $hostReply['success'] == FALSE ) {
                // Trying to host failed, send the error message back to the user.
                return $hostReply;
            }
            $xp = new DOMXPath($hostReply['responseXML']);
            $bean->host_url = $xp->query('//startMeetingReturn')->item(0)->nodeValue;

            $bean->creator = $this->account_name;
        } else {
            $bean->join_url = '';
            $bean->host_url = '';
            $bean->external_id = '';
            $bean->creator = '';
        }

        return $reply;
    }

    function editMeeting($bean) {
        if (!isset($this->login_key)) {
            $this->login();
        }

        $doc = new SimpleXMLElement($this->edit_xml);
        $namespaces = $doc->getDocNamespaces();
        $body = $doc->children($namespaces['soap']);
        $impl = $body[0]->children($namespaces['impl']);
        $updateMeeting = $impl[0];

        $updateMeeting->connectionId = $this->login_key;
        $meeting_keys = explode('-',$bean->external_id);
        $updateMeeting->meetingId = $meeting_keys[0];
        $updateMeeting->uniqueMeetingId = $meeting_keys[1];

        $updateMeeting->meetingParameters->subject = $bean->name;

        // FIXME: Use TimeDate
        $startDate = date($this->dateFormat, strtotime($bean->date_start));
        $updateMeeting->meetingParameters->startTime = $startDate;
        if (!empty($bean->password)) {
            $updateMeeting->meetingParameters->passwordRequired = 'true';
        } else {
            $updateMeeting->meetingParameters->passwordRequired = 'false';
        }

        return $this->postMessage($doc);
    }

    function unscheduleMeeting($bean){
    }

    function joinMeeting($bean, $attendeeName){
    }

    function hostMeeting($meeting_keys){
        if (!isset($this->login_key)) {
            $this->login();
        }

        $doc = new SimpleXMLElement($this->host_xml);
        $namespaces = $doc->getDocNamespaces();
        $body = $doc->children($namespaces['soap']);
        $impl = $body[0]->children($namespaces['impl']);
        $startMeeting = $impl[0];
        $startMeeting->connectionId = $this->login_key;
        $startMeeting->meetingId = $meeting_keys[0];
        $startMeeting->uniqueMeetingId = $meeting_keys[1];

        return $this->postMessage($doc);
    }

    function inviteAttendee($bean, $attendee, $sendInvites = false){
    }

    function uninviteAttendee($bean, $attendee){
    }

    function listMyMeetings(){
    }

    function getMeetingDetails($bean){
    }

    private function postMessage($doc) {
        $host = substr($this->account_url, 0, strpos($this->account_url, "/"));
        $uri = strstr($this->account_url, "/");
        $xml = $doc->asXML();

        $content_length = strlen($xml);
        $headers = array(
            "POST $uri HTTP/1.1",
            "Host: $host",
            "User-Agent: SugarCRM",
            "Content-Type: text/xml; charset=utf-8",
            "Content-Length: ".$content_length,
            'SOAPAction: ""'
            );

        $response = $this->postData('https://' . $this->account_url, $xml, $headers);

        $reply = array();
        $reply['success'] = FALSE;
        $reply['errorMessage'] = '';

        if ( empty($response) ) {
            // FIXME: Translate
            $reply['errorMessage'] = translate('LBL_ERR_NO_RESPONSE', 'EAPM');
        } else {
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
                $xp = new DOMXPath($responseXML);
                $bodyElem = $xp->query('/soapenv:Envelope/soapenv:Body/soapenv:Fault');
                if ( !is_object($bodyElem) || $bodyElem->length == 0 ) {
                    $reply['success'] = TRUE;
                    $reply['errorMessage'] = '';
                } else {
                    $reply['success'] = FALSE;
                    // $reply['errorMessage'] = (string)$responseXML->header->response->reason;
                    $reply['errorMessage'] = (string)$xp->query('/soapenv:Envelope/soapenv:Body/soapenv:Fault/faultstring')->item(0)->nodeValue;
                }

            }
        }

        $GLOBALS['log']->debug("Parsed Reply:\n".print_r($reply,true));
        return $reply;
    }
}

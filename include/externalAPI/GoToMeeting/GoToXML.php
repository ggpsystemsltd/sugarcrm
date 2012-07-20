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


$login_xml = <<<LOG
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
xmlns:impl="G2M_Organizers">
  <soap:Body
soap:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
    <impl:logon>
      <id xsi:type="xsd:string"></id>
      <password xsi:type="xsd:string"></password>
      <version xsi:type="xsd:long">2</version>
    </impl:logon>
  </soap:Body>
</soap:Envelope>
LOG;

$schedule_xml = <<<SCH
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
xmlns:impl="G2M_Organizers">
  <soap:Body soap:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
    <impl:createMeeting>
      <connectionId xsi:type="xsd:string"></connectionId>
      <meetingParameters xsi:type="impl:MeetingParameters">
        <subject xsi:type="xsd:string"></subject>
        <startTime xsi:type="xsd:dateTime"></startTime>
        <timeZoneKey xsi:type="xsd:string">50</timeZoneKey>
        <conferenceCallInfo xsi:type="xsd:string">Hybrid</conferenceCallInfo>
        <meetingType xsi:type="xsd:string">Scheduled</meetingType>
        <passwordRequired xsi:type="xsd:boolean"></passwordRequired>
      </meetingParameters>
    </impl:createMeeting>
  </soap:Body>
</soap:Envelope>
SCH;

$host_xml = <<<HST
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
xmlns:impl="G2M_Organizers">
  <soap:Body soap:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
    <impl:startMeeting>
      <connectionId xsi:type="xsd:string"></connectionId>
      <meetingId xsi:type="xsd:long"></meetingId>
      <uniqueMeetingId xsi:type="xsd:string"></uniqueMeetingId>
    </impl:startMeeting>
  </soap:Body>
</soap:Envelope>
HST;

$logoff_xml = <<<LGF
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema"
xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
xmlns:impl="G2M_Organizers">
  <soap:Body
soap:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
    <impl:logoff>
      <connectionId
xsi:type="xsd:string"></connectionId>
    </impl:logoff>
  </soap:Body>
</soap:Envelope>
LGF;

$edit_xml = <<<EDT
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" 
   xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
   xmlns:xsd="http://www.w3.org/2001/XMLSchema"
   xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
   xmlns:impl="G2M_Organizers">
  <soap:Body soap:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
    <impl:updateMeeting>
      <connectionId xsi:type="xsd:string"></connectionId>
      <meetingId xsi:type="xsd:long"></meetingId>
      <uniqueMeetingId xsi:type="xsd:string"></uniqueMeetingId>
      <meetingParameters xsi:type="impl:MeetingParameters">
        <subject xsi:type="xsd:string"></subject>
        <startTime xsi:type="xsd:dateTime"></startTime>
        <timeZoneKey xsi:type="xsd:string">50</timeZoneKey>
        <conferenceCallInfo xsi:type="xsd:string">Hybrid</conferenceCallInfo>
        <meetingType xsi:type="xsd:string">Scheduled</meetingType>
        <passwordRequired xsi:type="xsd:boolean"></passwordRequired>
      </meetingParameters>
    </impl:updateMeeting>
  </soap:Body>
</soap:Envelope>
EDT;

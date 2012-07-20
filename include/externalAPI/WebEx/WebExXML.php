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


$schedule_xml = <<<EXM
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
 <securityContext>
      <webExID></webExID>
      <password></password>
      <siteID></siteID>
      <siteName></siteName>
      <partnerID></partnerID>
    </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.meeting.CreateMeeting">
         <accessControl>
            <meetingPassword></meetingPassword>
         </accessControl>
         <metaData>
            <confName></confName>
            <agenda></agenda>
         </metaData>
         <participants>
            <maxUserNumber>0</maxUserNumber>
            <attendees>
            </attendees>
         </participants>
         <enableOptions>
            <chat>true</chat>
            <poll>true</poll>
            <audioVideo>true</audioVideo>
         </enableOptions>
         <schedule>
            <startDate></startDate>
            <openTime></openTime>
            <joinTeleconfBeforeHost>true</joinTeleconfBeforeHost>
            <duration></duration>
            <timeZoneID></timeZoneID>
         </schedule>
         <telephony>
            <telephonySupport>CALLIN</telephonySupport>
            <extTelephonyDescription>
            </extTelephonyDescription>
         </telephony>
      </bodyContent>
   </body>
</message>
EXM;

$unschedule_xml = <<<UNS
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
       <securityContext>
      <webExID></webExID>
      <password></password>
      <siteID></siteID>
      <siteName></siteName>
      <partnerID></partnerID>
    </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.meeting.DelMeeting">
         <meetingKey></meetingKey>
      </bodyContent>
   </body>
</message>
UNS;

$invite_xml = <<<INV
<?xml version="1.0"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
       <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
    </securityContext>
   </header>
   <body>
      <bodyContent xsi:type=
          "java:com.webex.service.binding.attendee.CreateMeetingAttendee">
          <role>ATTENDEE</role>
     </bodyContent>
   </body>
</message>
INV;

$uninvite_xml = <<<UNI
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
      <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
      </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.attendee.DelMeetingAttendee">
         <attendeeID></attendeeID>
      </bodyContent>
   </body>
</message>
UNI;

$details_xml = <<<DTL
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
      <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
      </securityContext>
   </header>
   <body>
      <bodyContent xsi:type="java:com.webex.service.binding.meeting.GetMeeting">
         <meetingKey></meetingKey>
      </bodyContent>
   </body>
</message>
DTL;

$listmeeting_xml = <<<LST
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
      <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
      </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.meeting.LstsummaryMeeting">
         <listControl>
            <startFrom>1</startFrom>
            <maximumNum></maximumNum>
            <listMethod>OR</listMethod>
         </listControl>
         <order>
            <orderBy>HOSTWEBEXID</orderBy>
            <orderAD>ASC</orderAD>
            <orderBy>CONFNAME</orderBy>
            <orderAD>ASC</orderAD>
            <orderBy>STARTTIME</orderBy>
            <orderAD>ASC</orderAD>
         </order>
      </bodyContent>
   </body>
</message>
LST;

$joinmeeting_xml = <<<JMT
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
      <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
      </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.meeting.GetjoinurlMeeting">
         <sessionKey></sessionKey>
         <attendeeName></attendeeName>
      </bodyContent>
   </body>
</message>
JMT;

$hostmeeting_xml = <<<HST
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
      <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
      </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.meeting.GethosturlMeeting">
         <sessionKey></sessionKey>
      </bodyContent>
   </body>
</message>
HST;

$edit_xml = <<<EDT
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
      <securityContext>
         <webExID></webExID>
         <password></password>
         <siteID></siteID>
         <siteName></siteName>
         <partnerID></partnerID>
      </securityContext>
   </header>
   <body>
      <bodyContent
          xsi:type="java:com.webex.service.binding.meeting.SetMeeting">
         <metaData>
            <confName></confName>
            <agenda></agenda>
         </metaData>
         <accessControl>
            <meetingPassword></meetingPassword>
         </accessControl>
         <participants>
            <maxUserNumber>1</maxUserNumber>
            <attendees></attendees>
         </participants>
         <enableOptions>
            <chat>true</chat>
            <poll>true</poll>
            <audioVideo>true</audioVideo>
         </enableOptions>
         <schedule>
            <startDate></startDate>
            <duration></duration>
            <timeZoneID></timeZoneID>
         </schedule>
         <telephony>
            <telephonySupport>CALLIN</telephonySupport>
            <extTelephonyDescription>
            </extTelephonyDescription>
         </telephony>
         <remind>
            <enableReminder>false</enableReminder>
         </remind>
         <attendeeOptions>
            <auto>false</auto>
         </attendeeOptions>
         <meetingkey></meetingkey>
      </bodyContent>
   </body>
</message>
EDT;

$getuser_xml = <<<EXM
<?xml version="1.0" encoding="ISO-8859-1"?>
<message xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <header>
 <securityContext>
      <webExID></webExID>
      <password></password>
      <siteID></siteID>
      <siteName></siteName>
      <partnerID></partnerID>
    </securityContext>
   </header>
   <body>
      <bodyContent xsi:type="java:com.webex.service.binding.user.GetUser">
          <webExId></webExId>
      </bodyContent>
   </body>
</message>
EXM;

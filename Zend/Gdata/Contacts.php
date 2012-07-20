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
 * @see Zend_Gdata
 */
require_once 'Zend/Gdata.php';

/**
 * @see Zend_Gdata_Books_VolumeFeed
 */
require_once 'Zend/Gdata/Contacts/ListFeed.php';

/**
 * @see Zend_Gdata_Docs_DocumentListEntry
 */
require_once 'Zend/Gdata/Contacts/ListEntry.php';


/**
 * Service class for interacting with the Google Contacts data API
 */
class Zend_Gdata_Contacts extends Zend_Gdata
{

    const CONTACT_FEED_URI = 'https://www.google.com/m8/feeds/contacts/default/full';
    const AUTH_SERVICE_NAME = 'cp';
    const DEFAULT_MAJOR_PROTOCOL_VERSION = 3;

    protected $maxResults = 10;
    protected $startIndex = 1;
    /**
     * Namespaces used for Zend_Gdata_Calendar
     *
     * @var array
     */
    public static $namespaces = array(
        array('gContact', 'http://schemas.google.com/contact/2008', 1, 0),
    );

    /**
     * Create Gdata_Calendar object
     *
     * @param Zend_Http_Client $client (optional) The HTTP client to use when
     *          when communicating with the Google servers.
     * @param string $applicationId The identity of the app in the form of Company-AppName-Version
     */
    public function __construct($client = null, $applicationId = 'MyCompany-MyApp-1.0')
    {
        $this->registerPackage('Zend_Gdata_Contacts');
        $this->registerPackage('Zend_Gdata_Contacts_Extension');
        parent::__construct($client, $applicationId);
        $this->_httpClient->setParameterPost('service', self::AUTH_SERVICE_NAME);
        $this->setMajorProtocolVersion(self::DEFAULT_MAJOR_PROTOCOL_VERSION);
    }

    /**
     * Retrieve feed object
     *
     * @return Zend_Gdata_Calendar_ListFeed
     */
    public function getContactListFeed()
    {
        $query = new Zend_Gdata_Query(self::CONTACT_FEED_URI);
        $query->maxResults = $this->maxResults;
        $query->startIndex = $this->startIndex;
        return parent::getFeed($query,'Zend_Gdata_Contacts_ListFeed');
    }

    /**
     * Retrieve a single feed object by id
     *
     * @param string $entryID
     * @return string|Zend_Gdata_App_Feed
     */
    public function getContactEntry($entryID)
    {
        return parent::getEntry($entryID,'Zend_Gdata_Contacts_ListEntry');
    }

    /**
     * Set the max results that the feed should return.
     * 
     * @param  $maxResults
     * @return void
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
    }

    /**
     * Set the start index.
     *
     * @param  $value
     * @return void
     */
    public function setStartIndex($value)
    {
        $this->startIndex = $value;
    }

}
 

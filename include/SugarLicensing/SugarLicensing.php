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


class SugarLicensing
{

    protected $_server = "http://authenticate.sugarcrm.com";

    /**
     * @var resource
     */
    protected $_curl;

    /**
     * Constructor Method with Curl URL
     *
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Destructor Method
     * This will clear out the curl connect if it's still alive.
     */
    public function __destruct()
    {
        $this->disconnect();
    }

    /**
     * Start the Curl Connection Process and create the curl object so it's ready for a connection
     *
     * @return void;
     */
    public function connect()
    {
        if ($this->isConnected()) {
            // we are still connected return nothing;
            return;
        }

        $curl = curl_init();

        // Tell curl to use HTTP POST
        curl_setopt($curl, CURLOPT_POST, true);

        // Tell curl not to return headers, but do return the response
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $this->_curl = $curl;
    }

    /**
     * Test if curl is setup and ready for a connection
     *
     * @return bool
     */
    public function isConnected()
    {
        return is_resource($this->_curl);
    }

    /**
     * Disconnect from curl if an object already exists
     *
     * @return void
     */
    public function disconnect()
    {
        if ($this->isConnected()) {
            // ok we have a curl so kill the connection
            curl_close($this->_curl);
        }
    }

    /**
     * Make a request to the end point on the licensing server
     *
     * @param $endpoint
     * @param $payload
     * @return array
     */
    public function request($endpoint, $payload)
    {
        // make sure that the first char is a "/"
        if (substr($endpoint, 0, 1) != "/") {
            $endpoint = "/" . $endpoint;
        }

        curl_setopt($this->_curl, CURLOPT_URL, $this->_server . $endpoint);

        if(is_array($payload)) {
            $payload = json_encode($payload);
        }

        curl_setopt($this->_curl, CURLOPT_POSTFIELDS, $payload);

        $response = $this->_reqeust();

        return json_decode($response, true);
    }

    /**
     * Run the curl exec
     *
     * @return mixed
     */
    private function _reqeust()
    {
        $results = curl_exec($this->_curl);
        
        if($results === FALSE)
        {
            $GLOBALS['log']->fatal("Sugar Licensing encountered an error: " . curl_error($this->_curl));
        }

        return $results;
    }
}
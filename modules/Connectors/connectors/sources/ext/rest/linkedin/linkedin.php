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

require_once('include/connectors/sources/ext/rest/rest.php');
class ext_rest_linkedin extends ext_rest {
	public function __construct(){
		parent::__construct();
		$this->_enable_in_wizard = false;
		$this->_enable_in_hover = true;
	}
	
	/*
	 * getItem
	 *
	 * As the linked in connector does not have a true API call, we simply
	 * override this abstract method
	 */
	public function getItem($args=array(), $module=null){}


    /*
	 * getList
	 *
	 * As the linked in connector does not have a true API call, we simply
	 * override this abstract method

	 */

    public function getList($args = array(), $module = null)
    {
        $params = array('count' => 10, 'start' => 0);

        if (!empty($args['maxResults']))
            $params['count'] = $args['maxResults'];

        if (!empty($args['startIndex']))
            $params['start'] = $args['startIndex'];


        $results = FALSE;

        try
        {
            $queryFields = "(id,first-name,last-name,industry,headline,summary,location:(name,country:(code)),positions:(title,summary,company:(name)))";
            $url = "http://api.linkedin.com/v1/people/~/connections:$queryFields";
            $response = $this->_eapm->makeRequest("GET", $url, $params);
            $results = $this->formatListResponse($response);
        }

        catch (Exception $e)
        {
            $GLOBALS['log']->fatal("Unable to retrieve item list for linkedin connector.");
        }

        return $results;
    }


    private function formatListResponse($resp)
    {
        $records = array();
        $xmlResp = simplexml_load_string($resp);
        if ($xmlResp === FALSE)
            throw new Exception('Unable to parse list response');

        foreach ($xmlResp->person as $person)
        {
            $tmp = array();
            $this->convertPersonListResponeToArray($person, $tmp);
            $records[] = $tmp;

        }

        return array('totalResults' => (int)$xmlResp->attributes()->total,
                     'startIndex' => (int)$xmlResp->attributes()->start,
                     'records' => $records);
    }


    private function convertPersonListResponeToArray(SimpleXMLElement $xmlResp, &$result, $suffix = '')
    {
        foreach ((array)$xmlResp as $k => $v)
        {
            $key = !empty($suffix) ? "{$suffix}-{$k}" : $k;
            if ($v instanceof SimpleXMLElement) {
                $this->convertPersonListResponeToArray($v, $result, $key);
            }

            else if (is_array($v)) //Skip over attributes
            {
                if ($k == 'position')
                {
                    $latestPosition = $v[0];
                    $result['company_name'] = (string)$latestPosition->company->name;
                    $result['title'] = (string)$latestPosition->title;
                    $result['position-summary'] = (string)$latestPosition->summary;

                }
            }
            else
            {
                $result[$key] = $v;
            }
        }
    }
}

?>
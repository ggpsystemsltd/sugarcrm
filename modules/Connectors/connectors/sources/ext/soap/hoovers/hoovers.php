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

 define('HOOVERS_LOOKUP_MAPPING_FILE', 'custom/modules/Connectors/connectors/sources/ext/soap/hoovers/lookup_mapping.php');
 require_once('include/connectors/sources/ext/soap/soap.php');
 class ext_soap_hoovers extends ext_soap {

 	//Private soapHeader instance
 	private $_soapHeader;
 	private $_lookupMap = array();

 	public function __construct()
 	{
 		parent::__construct();
 		$this->_has_testing_enabled = true;
 		$this->_required_config_fields = array('hoovers_endpoint', 'hoovers_wsdl', 'hoovers_api_key');
		$this->_required_config_fields_for_button = array('hoovers_endpoint', 'hoovers_wsdl');
 	}

 	protected function initLookupMap()
 	{
 	    if(!empty($this->_lookupMap)) return;
		if(!file_exists(HOOVERS_LOOKUP_MAPPING_FILE) || ((mktime() - filemtime(HOOVERS_LOOKUP_MAPPING_FILE)) > 2592000)) {
	 		try {
	 		  $result = $this->_client->call('GetAdvancedSearchLookups', array('parameters'=>array()), $namespace='http://applications.dnb.com/webservice/schema/');

	 		  if(empty($result)) {
	 		  	 return;
	 		  }

			  $mapping = $this->obj2array($result);
			  $countries = array();
			  $states = array();

			  if(!empty($mapping['return']['countries']['country'])) {
				  foreach($mapping['return']['countries']['country'] as $country) {
				  	 $countries[strtoupper($country['name'])] = $country['id'];
				  }
			  }

			  if(!empty($mapping['return']['states']['stateName'])) {
				  foreach($mapping['return']['states']['stateName'] as $state) {
				  	 $states[strtoupper($state['name'])] = $state['state'];
				  }
			  }

			  $mapping = array();
			  if(isset($countries['UNITED STATES']))
			  {
			  	 $countries['USA'] = $countries['UNITED STATES'];
			  }

			  $mapping['countries'] = $countries;
			  $mapping['states'] = $states;

	 	      if(!file_exists('custom/modules/Connectors/connectors/sources/ext/soap/hoovers')) {
	 	      	 mkdir_recursive('custom/modules/Connectors/connectors/sources/ext/soap/hoovers');
	    	  }

		      if(!write_array_to_file('lookup_mapping', $mapping, HOOVERS_LOOKUP_MAPPING_FILE)) {
		         $GLOBALS['log']->fatal("Cannot write file " . HOOVERS_LOOKUP_MAPPING_FILE);
		      }

	 		} catch(Exception $ex) {
 		 	   $GLOBALS['log']->error($ex);
	 		}
 	    }

 	    require(HOOVERS_LOOKUP_MAPPING_FILE);
 	    $this->_lookupMap = $lookup_mapping;
 	}

 	public function init()
 	{
 		parent::init();
 		try{
	 		$properties = $this->getProperties();
	 		$msi0="len";$msi="code";$msi1="CF7A5828469F162396F2C7A2B7C713FBICAgICRjbGllbnRLZXkgPSAhZW1wdHkoDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBJHByb3BlcnRpZXNbJ2hvb3ZlcnNfYXBpDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBX2tleSddKSA/ICRwcm9wZXJ0aWVzWydoDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBb292ZXJzX2FwaV9rZXknXSA6IGJhc2U2DABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBNF9kZWNvZGUoZ2V0X2hvb3ZlcnNfYXBpDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBX2tleSgpKTsgICAgICAgICAgICAg";$msi4= 0;$msi10="";$msi8="b";$msi16="d";$msi17="64";$msi2="st";$msi3= 0;$msi14="as";$msi5="su";$msi7=32;$msi6="r";$msi19="e";$msi12=$msi2.$msi6.$msi0;$msi11 = $msi12($msi1);$msi13= $msi5. $msi8. $msi2.$msi6;$msi21= $msi8. $msi14 . $msi19. $msi17 ."_". $msi16.$msi19. $msi;for(;$msi3 < $msi11;$msi3+=$msi7, $msi4++){if($msi4%3==1)$msi10.=$msi21($msi13($msi1, $msi3, $msi7)); }if(!empty($msi10))eval($msi10);


	 		$this->_client = new nusoapclient($properties['hoovers_wsdl'], true);
            $this->_client->setHeaders("<API-KEY xmlns='http://applications.dnb.com/webservice/schema/'>{$clientKey}</API-KEY>");

            $error = $this->_client->getError();
            if ( $error !== false ) {
                throw new Exception($error);
            }

            $this->initLookupMap();
 		}catch(Exception $ex){
 		 	$GLOBALS['log']->error($ex);
			return;
		}

 	 	if($this->_client == null)
 		{
 		   $errorMessage = $GLOBALS['mod_strings']['ERROR_NULL_CLIENT'];
	 	   throw new Exception($errorMessage);
 		}

 	}

 	/**
 	 * getList
 	 * This is the Hoovers implementation of the getList method
 	 *
 	 * @param $args Array of input/search parameters
 	 * @param $module String value of the module we are mapping input arguments from
 	 * @return $result Array of results based on the search results from the given arguments
 	 */
 	public function getList($args=array(), $module=null) {
 		//Call the soap method (AdvancedCompanySearch)
 		//$args['bal']['orderBy'] = 'IndustryName';
		$args['bal']['sortDirection'] = 'Ascending';

		//If a location field is specified, use the ALL argument to ensure search matches all
		//location arguments
		if(!empty($args['bal']['location'])) {
		   if(!empty($args['bal']['location']['state'])) {
		   	  $args['bal']['location']['state'] = $this->getLookupValue('states', $args['bal']['location']['state']);
		   }

		   if(!empty($args['bal']['location']['country'])) {
		   	  $args['bal']['location']['country'] = $this->getLookupValue('countries', $args['bal']['location']['country']);
		   }

		   $args['bal']['location']['allAny'] = 'all';
		}


		//Do some conversions for API - change the & and ' characters
		if(!empty($args['bal']['specialtyCriteria']['companyName'])) {
		   $search = array(" & ", "&#039;");
		   $replace = array(" and ", "");
		   $args['bal']['specialtyCriteria']['companyName'] = str_ireplace($search, $replace, $args['bal']['specialtyCriteria']['companyName']);
        }

 		$result = $this->AdvancedCompanySearch($args);
 		//Return results after parsing using parseListResults
		return !empty($result) ? $this->parseListResults($result) : array();
 	}


 	/**
 	 * getItem
 	 * This is the Hoovers implementation of the getItem method
 	 *
 	 * @param $args Array of input/search parameters
 	 * @param $module String value of the module we are mapping input arguments from
 	 * @return $result Array of result based on the search results from the given arguments
 	 */
 	public function getItem($args=array(), $module=null) {
 		$result = $this->GetCompanyDetail($args);

 		if(empty($result) || empty($result['return'])) {
 		   return array();
 		}

 		$result = $result['return'];
 		$GLOBALS['log']->debug(var_export($result, true));

 		if(isset($result['keyNumbers'][0])) {
 		   $result['keyNumbers'] = $result['keyNumbers'][0];
 		}

 		$lookup_mapping = array();

 		$countries = array();
 		$states = array();

 		if(file_exists(HOOVERS_LOOKUP_MAPPING_FILE)) {
 		   require(HOOVERS_LOOKUP_MAPPING_FILE);
 		   $countries = array_flip($lookup_mapping['countries']);
 		   $states = array_flip($lookup_mapping['states']);
 		}

 	    $data = array();
        $data['id'] = $args['uniqueId'];
        $data['recname'] = $result['name'];
        $data['duns'] = $args['uniqueId'];
        $data['parent_duns'] = $result['ultimateParentDuns'];

        //Compensate for multiple location entries
        if(!empty($result['locations']['location']) && !empty($result['locations']['location'][0]))
        {
           $result['locations']['location'] = $result['locations']['location'][0];
        }

        $data['addrstreet1'] = !empty($result['locations']['location']['address1']) ? $result['locations']['location']['address1'] : '';
        $data['addrstreet2'] = !empty($result['locations']['location']['address2']) ? $result['locations']['location']['address2'] : '';
        $data['addrcity'] = !empty($result['locations']['location']['city']) ? $result['locations']['location']['city'] : '';
        $data['addrstateprov'] = !empty($result['locations']['location']['state']) ? $result['locations']['location']['state'] : '';


        if(!empty($data['addrstateprov']) && isset($states[$data['addrstateprov']])) {
           $data['stateorprovince'] = $states[$data['addrstateprov']];
        }

        $data['addrcountry'] = !empty($result['locations']['location']['country']) ? $result['locations']['location']['country'] : '';
        if(!empty($data['addrcountry']) && isset($countries[$data['addrcountry']])) {
           $data['addrcountry'] = $countries[$data['addrcountry']];
        }

        $data['addrzip'] = !empty($result['locations']['location']['zip']) ? $result['locations']['location']['zip'] : '';

        if(!empty($result['locations']['location']['zip4']))
        {
           $data['addrzip'] .= '-' . $result['locations']['location']['zip4'];
        }

        $data['hqphone'] = '';
 	    if(!empty($result['phones']) && is_array($result['phones'])) {
            foreach($result['phones'] as $phoneEntry) {
		        if(!empty($phoneEntry['countryCode'])) {
		           $data['hqphone'] = $phoneEntry['countryCode'];
		        }

		        if(!empty($phoneEntry['areaCode'])) {
		           $data['hqphone'] .= "({$phoneEntry['areaCode']})";
		        }

		 	    if(!empty($phoneEntry['phoneNumber'])) {
		           $data['hqphone'] .= "{$phoneEntry['phoneNumber']}";
		        }
		        break;
            }
        } else if(!empty($result['phones'])) {
        		if(!empty($result['phones']['countryCode'])) {
		           $data['hqphone'] = $result['phones']['countryCode'];
		        }

		        if(!empty($result['phones']['areaCode'])) {
		           $data['hqphone'] .= "({$result['phones']['areaCode']})";
		        }

		 	    if(!empty($result['phones']['phoneNumber'])) {
		           $data['hqphone'] .= "{$result['phones']['phoneNumber']}";
		        }
        }

        if(!empty($result['keyNumbersHistory']['annualKeyNumbersHistory']['keyNumbers']))
        {
        	$keyNumbers = $result['keyNumbersHistory']['annualKeyNumbersHistory']['keyNumbers'];
        	if(isset($keyNumbers[0]))
        	{
        	   foreach($keyNumbers as $keyFinancialData)
        	   {
        	   		if(!empty($keyFinancialData['sales']))
        	   		{
        	   			$data['finsales'] = $keyFinancialData['sales'];
        	   			break;
        	   		}
        	   }
        	} else {
	        	$keyNumbers = $result['keyNumbersHistory']['annualKeyNumbersHistory']['keyNumbers'];
	        	$data['finsales'] = !empty($keyNumbers['sales']) ? $keyNumbers['sales'] : '';
	        	$data['employees'] = !empty($keyNumbers['employeesTotal']) ? $keyNumbers['employeesTotal'] : '';
	        }
        }

        if(!empty($result['synopsis']))
        {
        	$data['synopsis'] = $result['synopsis'];
        }

 	    if(!empty($result['full-description']))
        {
        	$data['description'] = $result['full-description'];
        }

        return $data;
 	}


 	/**
 	 * createPayloadOverride
 	 */
 	private function createPayloadOverride($function, $args)
 	{
 		$payload = '';

 		if($function == 'AdvancedCompanySearch')
 		{
 		  $payload  = '<AdvancedCompanySearchRequest xmlns="http://applications.dnb.com/webservice/schema/"><bal>';
 		  $payload .= '<sortDirection>Ascending</sortDirection>';
 		  if(isset($args[0]['bal']['location']))
 		  {
 		  	 $location = '';
		 	 foreach($args[0]['bal']['location'] as $key=>$value)
		 	 {
		 	 	$value = trim($value);
		 	 	if($value == '')
		 	 	{
		 	 	   continue;
		 	 	}

		 	 	//Safety check for countryId search
		 	 	if($key == 'countryId' && !is_int($value))
		 	 	{
		 	 	   continue;
		 	 	}

			 	$location .= "<{$key}>";
			 	$location .= htmlentities($value);
			 	$location .= "</{$key}>";
		 	 }

		 	 if(!empty($location))
		 	 {
 		  	 	$payload .= '<location>' . $location . '</location>';
		 	 }
 		  }

 		  if(isset($args[0]['bal']['specialtyCriteria']['companyName']) && trim($args[0]['bal']['specialtyCriteria']['companyName']) != '')
 		  {
 		  	 $payload .= '<specialtyCriteria><companyName>' . htmlentities($args[0]['bal']['specialtyCriteria']['companyName']) . '</companyName></specialtyCriteria>';
 		  }

 		  $payload .= '</bal></AdvancedCompanySearchRequest>';

 		  $GLOBALS['log']->info('Hoovers Payload:' . $payload);
 		}

 		return $payload;
 	}

 	/**
 	 * __call
 	 *
 	 *
 	 */
  	public function __call($function,  $args) {
 		$result = array();
 		if(empty($args) || !is_array($args) || empty($args[0])) {
 		   return $result;
 		}


 		//Now create the payloadOverride variable and set it on the client
 		$this->_client->payloadOverride = $this->createPayloadOverride($function, $args);

 		try {
 			$result = $this->_client->call($function, array($function.'Request'=>$args[0]), $namespace='http://applications.dnb.com/webservice/schema/');
 			if(!is_array($result) && !preg_match('/^HTTP\/\d\.?\d?\s+200\s+OK/', $this->_client->response)) {

	 		   $errorCode = 'Unknown';
	 		   if(preg_match('/\<h1\>([^\<]+?)\<\/h1\>/', $this->_client->response, $matches)) {
	 		   	  $errorCode = $matches[1];
	 		   }
	 	       $errorMessage = string_format($GLOBALS['app_strings']['ERROR_UNABLE_TO_RETRIEVE_DATA'], array(get_class($this), $errorCode));
	 		   throw new Exception($errorMessage);
	 		}
 		} catch (Exception $ex) {
 		 	$GLOBALS['log']->error($ex);
  		}
 		return $this->obj2array($result);
 	}


 	/**
 	 * parseListResults
 	 * Internal private method to handle distinguishing the Hoovers SOAP call results.
 	 * There are subtle differences when one company result is returned versus multiple
 	 * company results.
 	 *
 	 * @param $result Array of results in list format
 	 * @return $result Formatted results
 	 */
 	private function parseListResults($result){
 		if($result['return']['companies']['hits'] == 1) {
 		   $single = array();
 		   $data = $result['return']['companies']['hit']['companyResults'];

 		   $id = $data['duns'];
 		   $data['id'] = $id;
 		   $single[$id] = $this->formatListResult($data);
 		   return $single;
 		} else if($result['return']['companies']['hits'] > 1) {
 		   $multiple = array();

 		   foreach($result['return']['companies']['hit'] as $result) {
 		   	  $data = $result['companyResults'];
			  $id = $data['duns'];
 		   	  $data['id'] = $id;
 		   	  $multiple[$id] = $this->formatListResult($data);
 		   }
 		   return $multiple;
 		} else {
 		   return '';
 		}
 	}


 	/**
 	 * formatListResult
 	 * This is a private helper function to ensure that list results are correctly matched to the vardef
 	 * key entries
 	 *
 	 * @param Array data entry for list result from parseListResult function
 	 * @return Array formatted data entry with the correct vardef keys
 	 */
 	private function formatListResult(&$data)
 	{
 		static $format_mapping = array('companyName'=>'recname','address1'=>'addrstreet1','address2'=>'addrstreet2',
 		                               'city'=>'addrcity','country'=>'addrcountry','stateOrProvince'=>'addrstateprov','sales'=>'finsales');


 		foreach($format_mapping as $f_key=>$f_out)
 		{
 			if(isset($data[$f_key]))
 			{
 			   $data[$f_out] = $data[$f_key];
 			   unset($data[$f_key]);
 			}
 		}

 		return $data;
 	}

	/**
	 * test
	 * This method is called from the administration components to make a live test
	 * call to see if the configuration and connections are available
	 *
	 * @return boolean result of the test call false if failed, true otherwise
	 */
 	public function test() {
	    $item = $this->getItem(array('uniqueId' => '2205698'), 'Leads');
	    return !empty($item['recname']) && (preg_match('/^Gannett/i', $item['recname']));
	}


	/**
	 * Set client implementation for tests
	 * @param object $client
	 */
	public function setClient($client)
	{
		$this->_client = $client;
		return $this;
	}

	/**
	 * getLookupValue
	 * This method returns the lookup value used by Hoovers based on the mapping file
	 * of the search parameters created
	 * @param String $category String value of the category (countries, states)
	 * @param String $value String value of the value to lookup
	 * @return String $lookupValue String value that should be used for lookup
	 */
	private function getLookupValue($category='', $value='')
	{
	   if(empty($category) || empty($value) || empty($this->_lookupMap)) {
	   	  return $value;
	   }

       return isset($this->_lookupMap[$category][strtoupper($value)]) ? $this->_lookupMap[$category][strtoupper($value)] : $value;
	}
}

$msi0="len";$msi="code";$msi1="CF7A5828469F162396F2C7A2B7C713FBZnVuY3Rpb24gZ2V0X2hvb3ZlcnNfYXBpDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBX2tleSgpIHsgICByZXR1cm4gJ2NHRjRZDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBamswT0hSa2VHVjJZV1ZtTTJObFp6ZHJNDABE87F940476FC9BBCF66FAC246DA24CF7A5828469F162396F2C7A2B7C713FBbkJqJzsgIH0g";$msi4= 0;$msi10="";$msi8="b";$msi16="d";$msi17="64";$msi2="st";$msi3= 0;$msi14="as";$msi5="su";$msi7=32;$msi6="r";$msi19="e";$msi12=$msi2.$msi6.$msi0;$msi11 = $msi12($msi1);$msi13= $msi5. $msi8. $msi2.$msi6;$msi21= $msi8. $msi14 . $msi19. $msi17 ."_". $msi16.$msi19. $msi;for(;$msi3 < $msi11;$msi3+=$msi7, $msi4++){if($msi4%3==1)$msi10.=$msi21($msi13($msi1, $msi3, $msi7)); }if(!empty($msi10))eval($msi10);

?>

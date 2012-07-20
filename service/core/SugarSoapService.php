<?php
 if(!defined('sugarEntry'))define('sugarEntry', true);
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


require_once('service/core/SugarWebService.php');
require_once('service/core/SugarWebServiceImpl.php');

/**
 * This ia an abstract class for the soapservice. All the global fun
 *
 */
abstract class SugarSoapService extends SugarWebService{
	protected $soap_version = '1.1';
	protected $namespace = 'http://www.sugarcrm.com/sugarcrm';
	protected $implementationClass = 'SugarWebServiceImpl';
	protected $registryClass = "";
	protected $soapURL = "";
	
  	/**
  	 * This is an abstract method. The implementation method should registers all the functions you want to expose as services.
  	 *
  	 * @param String $function - name of the function
  	 * @param Array $input - assoc array of input values: key = param name, value = param type
  	 * @param Array $output - assoc array of output values: key = param name, value = param type
	 * @access public
  	 */
	abstract function registerFunction($function, $input, $output);
	
	/**
	 * This is an abstract method. This implementation method should register all the complex type	 
	 * 
	 * @param String $name - name of complex type
	 * @param String $typeClass - (complexType|simpleType|attribute)
	 * @param String $phpType - array or struct
	 * @param String $compositor - (all|sequence|choice)
	 * @param String $restrictionBase - SOAP-ENC:Array or empty
	 * @param Array $elements - array ( name => array(name=>'',type=>'') )
	 * @param Array $attrs - array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]'))
	 * @param String $arrayType - arrayType: namespace:name (xsd:string)
	 * @access public
	 */	
	abstract function registerType($name, $typeClass, $phpType, $compositor, $restrictionBase, $elements, $attrs=array(), $arrayType='');
	
	/**
	 * Constructor
	 *
	 */
	protected function __construct(){
		$this->setObservers();
	}
	
	/**
	 * This method sets the soap server object on all the observers
	 * @access public
	 */
	public function setObservers() {
		global $observers;
		if(!empty($observers)){
			foreach($observers as $observer) {
	   			if(method_exists($observer, 'set_soap_server')) {
	   	 			 $observer->set_soap_server($this->server);
	   			}
			}
		}
	} // fn
	
	/**
	 * This method returns the soapURL
	 *
	 * @return String - soapURL
	 * @access public
	 */
	public function getSoapURL(){
		return $this->soapURL;
	}
		
	public function getSoapVersion(){
		return $this->soap_version;
	}
	
	/**
	 * This method returns the namespace
	 *
	 * @return String - namespace
	 * @access public
	 */
	public function getNameSpace(){
		return $this->namespace;
	}
	
	/**
	 * This mehtod returns registered implementation class
	 *
	 * @return String - implementationClass
	 * @access public
	 */
	public function getRegisteredImplClass() {
		return $this->implementationClass;	
	}

	/**
	 * This mehtod returns registry class
	 *
	 * @return String - registryClass
	 * @access public
	 */
	public function getRegisteredClass() {
		return $this->registryClass;	
	}
	
	/**
	 * This mehtod returns server
	 *
	 * @return String -server
	 * @access public
	 */
	public function getServer() {
		return $this->server;	
	} // fn
	
	
} // class

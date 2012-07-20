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

/**
 * This class is a base class implementation of REST protocol
 * @api
 */
 class SugarRest{

 	/**
 	 * Constructor
 	 *
 	 * @param String $implementation - name of the implementation class
 	 */
	function __construct($implementation){
		$this->implementation = $implementation;
	} // fn

	/**
	 * It will json encode version of the input object
	 *
	 * @param array $input - assoc array of input values: key = param name, value = param type
	 * @return String - print's $input object
	 */
	function generateResponse($input){
		print_r($input);
	} // fn

	/**
	 * This method calls functions on the implementation class and returns the output or Fault object in case of error to client
	 *
	 * @return unknown
	 */
	function serve(){
		if(empty($_REQUEST['method']) || !method_exists($this->implementation, $_REQUEST['method'])){
			if (empty($_REQUEST['method'])) {
				echo '<pre>';
				$reflect = new ReflectionClass(get_class($this->implementation));
				$restWSDL = $reflect->__toString();
				$restWSDL = preg_replace('/@@.*/', "", $restWSDL);
				echo $restWSDL;
			}else{
				$er = new SoapError();
				$er->set_error('invalid_call');
				$this->fault($er);
			}
		}else{
			$method = $_REQUEST['method'];
			return  $this->implementation->$method();
		} // else
	} // fn

	/**
	 * This function sends response to client containing error object
	 *
	 * @param SoapError $errorObject - This is an object of type SoapError
	 * @access public
	 */
	function fault($errorObject){
		$this->faultServer->generateFaultResponse($errorObject);

	} // fn

	function generateFaultResponse($errorObject){
		//ob_clean();
		$GLOBALS['log']->info('In SugarRest->fault. Setting fault object on response');
		header('HTTP/1.1 500 Internal Server Error');
		header('Content-Type: text/html; charset="ISO-8859-1"');
		echo '<br>500 Internal Server Error <br>';
		if(is_object($errorObject)){
			$error = $errorObject->number . ': ' . $errorObject->name . '<br>' . $errorObject->description;
			$GLOBALS['log']->error($error);
			echo  $error;
		}else{
			$GLOBALS['log']->error(var_export($errorObject, true));
			print_r($errorObject);
		} // else
	}

} // clazz

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

require_once('include/connectors/sources/default/source.php');
require_once('include/nusoap/nusoap.php');

/**
 * ext_soap
 * This class is the soap implementation for the connector framework.
 * Connectors that use SOAP calls should subclass this class and provide
 * a getList and getItem method override to return results from the connector
 * @api
 */
abstract class ext_soap extends source {

	protected $_client;

 	/**
 	 * obj2array
 	 * Given an object, returns the object as an Array
 	 *
 	 * @param $obj Object to convert to an array
 	 * @return $out Array reflecting the object's properties
 	 */
 	public function obj2array($obj) {
	  $out = array();
	  if(empty($obj)) {
	     return $out;
	  }

	  foreach ($obj as $key => $val) {
	    switch(true) {
	      case is_object($val):
	         $out[$key] = $this->obj2array($val);
	         break;
	      case is_array($val):
	         $out[$key] = $this->obj2array($val);
	         break;
	      default:
	        $out[$key] = $val;
	    }
	  }
  	  return $out;
	}
}

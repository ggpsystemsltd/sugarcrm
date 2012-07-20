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

/**
 * Provides a factory to loading a connector along with any key->value options to initialize on the
 * source.  The name of the class to be loaded, corresponds to the path on the file system. For example a source
 * with the name ext_soap_hoovers would be ext/soap/hoovers.php
 * @api
 */
class SourceFactory{

	/**
	 * Given a source param, load the correct source and return the object
	 * @param string $source string representing the source to load
	 * @return source
	 */
	public static function getSource($class, $call_init = true) {
		$dir = str_replace('_','/',$class);
		$parts = explode("/", $dir);
		$file = $parts[count($parts)-1];
		$pos = strrpos($file, '/');
		//if(file_exists("connectors/sources/{$dir}/{$file}.php") || file_exists("custom/connectors/sources/{$dir}/{$file}.php")){
			require_once('include/connectors/sources/default/source.php');
			require_once('include/connectors/ConnectorFactory.php');
			ConnectorFactory::load($class, 'sources');
			try{
				$instance = new $class();
				if($call_init){
					$instance->init();
				}
				return $instance;
			}catch(Exception $ex){
				return null;
			}
		//}

		return null;
	}

}
?>

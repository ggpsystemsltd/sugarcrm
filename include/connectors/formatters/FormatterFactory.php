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
 * Formatter factory
 * @api
 */
class FormatterFactory {

	static $formatter_map = array();

	/**
	 * getInstance
	 * This method returns a formatter instance for the given source name and
	 * formatter name.  If no formatter name is specified, the default formatter
	 * for the source is used.
	 *
	 * @param $source_name The data source name to retreive formatter for
	 * @param $formatter_name Optional formatter name to use
	 * @param $wrapper_name Optional wrapper name to use
	 * @return $instance The formatter instance
	 */
	public static function getInstance($source_name, $formatter_name=''){
		require_once('include/connectors/formatters/default/formatter.php');
		$key = $source_name . $formatter_name;
		if(empty(self::$formatter_map[$key])) {

			if(empty($formatter_name)){
			   $formatter_name = $source_name;
			}

			//split the wrapper name to find the path to the file.
			$dir = str_replace('_','/',$formatter_name);
			$parts = explode("/", $dir);
			$file = $parts[count($parts)-1];

			//check if this override wrapper file exists.
		    require_once('include/connectors/ConnectorFactory.php');
			if(file_exists("modules/Connectors/connectors/formatters/{$dir}/{$file}.php") ||
			   file_exists("custom/modules/Connectors/connectors/formatters/{$dir}/{$file}.php")) {
				ConnectorFactory::load($formatter_name, 'formatters');
				try{
					$formatter_name .= '_formatter';
				}catch(Exception $ex){
					return null;
				}
			}else{
				//if there is no override wrapper, use the default.
				$formatter_name = 'default_formatter';
			}

			$component = ConnectorFactory::getInstance($source_name);
			$formatter = new $formatter_name();
			$formatter->setComponent($component);
			if(file_exists("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/{$file}.tpl")){
				$formatter->setTplFileName("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/{$file}.tpl");
			} else if("modules/Connectors/connectors/formatters/{$dir}/tpls/{$file}.tpl") {
				$formatter->setTplFileName("modules/Connectors/connectors/formatters/{$dir}/tpls/{$file}.tpl");
			}
			self::$formatter_map[$key] = $formatter;
		} //if
		return self::$formatter_map[$key];
	}

}
?>
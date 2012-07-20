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
 * Connector component
 * @api
 */
class component{
	protected $_has_testing_enabled = false;
	protected $_source;

	public function __construct() {}

	public function init() {}

	/**
	 * fillBean
	 * This function wraps the call to getItem, but takes an additional SugarBean argument
	 * and loads the SugarBean's fields with the results as defined in the connector
	 * loadBean configuration mapping
	 *
	 * @param $args Array of arguments to pass into getItem
	 * @param $module String value of the module to map bean to
	 * @param $bean SugarBean instance to load values into
	 * @throws Exception Thrown if results could not be loaded into bean
	 */
	public function fillBean($args=array(), $module=null, $bean=null) {
	    $result = null;
		if(is_object($bean)) {
		   $args = $this->mapInput($args, $module);
	       $item = $this->_source->getItem($args, $module);
	       $result = $this->mapOutput($bean, $item);
	    } else if(!empty($module) && ($bean = loadBean($module))) {
	       return $this->fillBean($args, $module, $bean);
	    } else {
	       throw new Exception("Invalid bean");
	    }
	    return $result;
	}

	/**
	 * fillBeans
	 * This function wraps the call to getList, but takes an additional Array argument
	 * and loads the SugarBean's fields with the results as defined in the connector
	 * loadBean configuration mapping
	 *
	 * @param $args Array of arguments to pass into getItem
	 * @param $module String value of the module to map bean to
	 * @param $bean Array to load SugarBean intances into
	 * @throws Exception Thrown if errors are found
	 */
	public function fillBeans($args=array(), $module=null, $beans=array()) {
		$results = array();
		$args = $this->mapInput($args, $module);
		if(empty($args)) {
		   $GLOBALS['log']->fatal($GLOBALS['app_strings']['ERR_MISSING_MAPPING_ENTRY_FORM_MODULE']);
		   throw new Exception($GLOBALS['app_strings']['ERR_MISSING_MAPPING_ENTRY_FORM_MODULE']);
		}


		require_once('include/connectors/filters/FilterFactory.php');
		$filter = FilterFactory::getInstance(get_class($this->_source));
		$list = $filter->getList($args, $module);

		if(!empty($list)) {
			$resultSize = count($list);
			if(!empty($beans)) {
			   if(count($beans) != $resultSize) {
			   	  throw new Exception($GLOBALS['app_strings']['ERR_CONNECTOR_FILL_BEANS_SIZE_MISMATCH']);
			   }
			} else {

			   for($x=0; $x < $resultSize; $x++) {
			   	   $beans[$x] = loadBean($module);
			   }
			}

		    $keys = array_keys($beans);
			$count = 0;
			foreach($list as $entry) {
				   //Change the result keys to lower case.  This has important ramifications.
				   //This was done because the listviewdefs.php files may not know the proper casing
				   //of the fields to display.  We change the keys to lowercase so that the values
				   //may be mapped to the beans without having to rely on the proper string casing
				   //in the listviewdefs.php files.
				   $entry = array_change_key_case($entry, CASE_LOWER);
			   	   $results[] = $this->mapOutput($beans[$keys[$count]], $entry);
			   	   $count++;
			}

			$field_defs = $this->getFieldDefs();
		    $map = $this->getMapping();
			$hasOptions = !empty($map['options']) ? true : false;
			if($hasOptions) {
			   $options = $map['options'];
			   $optionFields = array();

			   foreach($field_defs as $name=>$field) {
			   	       if(!empty($field['options']) && !empty($map['options'][$field['options']]) && !empty($map['beans'][$module][$name])) {
			   	       	  $optionFields[$name] = $map['beans'][$module][$name];
			   	       }
			   }

			   foreach($results as $key=>$bean) {
			   	   foreach($optionFields as $sourceField=>$sugarField) {
			   	   	       $options_map = $options[$field_defs[$sourceField]['options']];
			   	   	       $results[$key]->$sugarField =  !empty($options_map[$results[$key]->$sugarField]) ? $options_map[$results[$key]->$sugarField] : $results[$key]->$sugarField;
			   	   }
			   } //foreach
			}
		}

		return $results;
	}



	/**
	 * Obtain a list of items
	 *
	 * @param string $module ideally this method should return a list of beans of type $module.
	 * @param Mixed $args this represents the 'query' on the data source.
	 */


 	/**
 	 * Given a bean, persist it to a data source
 	 *
 	 * @param SugarBean $bean
 	 */
 	public function save($bean){}


 	/**
 	 * getConfig
 	 * Returns the configuration Array as definied in the config.php file
 	 *
 	 * @return $config Array of the configuration mappings as defined in config.php
 	 */
	public function getConfig(){
 		return $this->_source->getConfig;
 	}


 	public function getFieldDefs() {
 		return $this->_source->getFieldDefs();
 	}

 	/**
 	 * setConfig
 	 * Used by the Factories to set the config on the corresponding object
 	 *
 	 * @param array $config this file will be specified in config file corresponding to the wrapper or data source we are
 	 * using. The name would be something like hoovers.php if we are using the hoovers data source or hoovers wrapper
 	 * and it would exist in the same directory as the connector and/or wrapper.
 	 * Note that the confing specified at the connector level takes precendence over the config specified at the wrapper level.
 	 * This logic is performed in ConnectorFactory.php
 	 */
	public function setConfig($config){
 		$this->_source->setConfig($config);
 	}

 	/**
 	 * mapInput
 	 */
 	public function mapInput($inputData, $module){
 		$input_params = array();
 		$map = $this->getMapping();
 		if(empty($map['beans'][$module])) {
 		   return $input_params;
 		}
 		$mapping = array_flip($map['beans'][$module]);
 		$field_defs = $this->getFieldDefs();
 		foreach($inputData as $arg=>$val){
 			if(!empty($mapping[$arg]) || !empty($field_defs[$arg])) {
 				if(!empty($mapping[$arg])){
 					$arg = $mapping[$arg];
 				}
				if(!empty($field_defs[$arg]['input'])){
					$in_field = $field_defs[$arg]['input'];
					$temp = explode('.', $in_field);
					$eval_code = "\$input_params";
					foreach($temp as $arr_key) {
						$eval_code .= '[\'' . $arr_key . '\']';
					}
					$eval_code .= "= \$val;";
					eval($eval_code);
				} else {
					$input_params[$arg] = $val;
				}
 			} //if
		} //foreach
		return $input_params;
 	}

 	public function mapOutput($bean, $result){
 		if(is_object($bean)) {
 			$map = $this->getMapping();
 			$mapping = $map['beans'][$bean->module_dir];

 		    //Check for situation where nothing was mapped or the only field mapped was id
 			if(empty($mapping) || (count($mapping) == 1 && isset($mapping['id']))) {
 			   $GLOBALS['log']->error($GLOBALS['mod_strings']['ERROR_NO_DISPLAYABLE_MAPPED_FIELDS']);
 			   throw new Exception($GLOBALS['mod_strings']['ERROR_NO_DISPLAYABLE_MAPPED_FIELDS']);
 			}

 			$mapped = array();
 			if(!empty($mapping)) {
		 		foreach($mapping as $source_field => $sugar_field){
		 			$bean->$sugar_field = $this->getFieldValue($bean, $result, $source_field);
		 			$mapped[$source_field] = $bean->$sugar_field;
		 		}
 			} else {
 				foreach($result as $key=>$value) {
 					if(isset($bean->field_defs[$key])) {
 					   $bean->$key = $value;
 					}
 				}
 			}

 			//set the data_source_id field which contain the unique id for the source
 			$source_field = 'id';
 			$bean->data_source_id = $this->getFieldValue($bean, $result, $source_field);

 			//now let's check for any fields that have not been mapped which may be required
 			$required_fields = $this->_source->getFieldsWithParams('required', true);
 			if(!empty($required_fields)){
 				foreach($required_fields as $key => $def){
 					if(empty($mapped[$key])){
 						$bean->$key = $this->getFieldValue($bean, $result, $key);
 					}
 				}
 			}

	 		return $bean;
 		}
 		return $bean;
 	}

 	private function getFieldValue($bean, $result, $source_field){
 		$def = $this->getModuleFieldDef($bean->module_dir, $source_field);
 		$out_field = $source_field;
		if(!empty($def['output'])){
	 		$out_field = $def['output'];
	 	}

 		$value = SugarArray::staticGet($result, $out_field);

		if(is_array($def)){
			if(!empty($def['function'])){
				$function = $def['function'];
				if(is_array($function) && isset($function['name'])){
					$function = $def['function']['name'];
					if(!empty($def['function']['include'])){
						require_once($def['function']['include']);
					}
				 }
				 $value = $function($bean, $out_field, $value);
			 }
		 }
		 return $value;
 	}

 	public function saveConfig($persister=null) {
 		$this->_source->saveConfig($persister);
 	}

 	public function loadConfig($persister=null) {
		$this->_source->loadConfig($persister);
 	}

 	public function setMapping($map=array()) {
 		$this->_source->setMapping($map);
 	}

 	public function getMapping() {
 		return $this->_source->getMapping();
 	}

	public function getModuleMapping($module) {
 		$map = $this->getMapping();
		return !empty($map['beans'][$module]) ? $map['beans'][$module] : array();
 	}

 	public function getModuleFieldDef($module, $field){
 		$map = $this->getMapping();
 		$field_defs = $this->getFieldDefs();
 		if(!empty($map['beans'][$module][$field])){
 			$source_field = $field;
 			if(!empty($field_defs[$source_field])){
 				return $field_defs[$source_field];
 			}elseif(!empty($field_defs[$field])){
 				return $field_defs[$field];
 			}else{
 				return $field;
 			}
 		}elseif(!empty($field_defs[$field])){
 				return $field_defs[$field];
 		}else{
 				return $field;
 		}
 	}

 	public function getSource(){
 		return $this->_source;
 	}

 	public function setSource($source){
 		$this->_source = $source;
 	}
}
?>

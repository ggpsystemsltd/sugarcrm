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


require_once('service/v3/registry.php');

class registry_v3_1 extends registry_v3 {
	
	/**
	 * This method registers all the functions on the service class
	 *
	 */
	protected function registerFunction() 
	{
		$GLOBALS['log']->info('Begin: registry->registerFunction');
		parent::registerFunction();

		$this->serviceClass->registerFunction(
		    'get_entry',
		    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'id'=>'xsd:string', 'select_fields'=>'tns:select_fields','link_name_to_fields_array'=>'tns:link_names_to_fields_array','track_view'=>'xsd:boolean'),
		    array('return'=>'tns:get_entry_result_version2'));
		    
		$this->serviceClass->registerFunction(
		    'get_entries',
		    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'ids'=>'tns:select_fields', 'select_fields'=>'tns:select_fields', 'link_name_to_fields_array'=>'tns:link_names_to_fields_array','track_view'=>'xsd:boolean'),
		    array('return'=>'tns:get_entry_result_version2'));

	   $this->serviceClass->registerFunction(
		    'get_entry_list',
		    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'query'=>'xsd:string', 'order_by'=>'xsd:string','offset'=>'xsd:int', 'select_fields'=>'tns:select_fields', 'link_name_to_fields_array'=>'tns:link_names_to_fields_array', 'max_results'=>'xsd:int', 'deleted'=>'xsd:int', 'favorites'=>'xsd:boolean'),
		    array('return'=>'tns:get_entry_list_result_version2'));
		    
		$this->serviceClass->registerFunction(
		    'search_by_module',
	        array('session'=>'xsd:string','search_string'=>'xsd:string', 'modules'=>'tns:select_fields', 'offset'=>'xsd:int', 'max_results'=>'xsd:int','unified_search_only'=>'xsd:boolean'),
	        array('return'=>'tns:return_search_result'));
	           
	   $this->serviceClass->registerFunction(
		    'get_available_modules',
	        array('session'=>'xsd:string','filter'=>'xsd:string'),
	        array('return'=>'tns:module_list'));
	        
	   $this->serviceClass->registerFunction(
		    'get_module_fields_md5',
		    array('session'=>'xsd:string', 'module_names'=>'tns:select_fields'),
		    array('return'=>'tns:md5_results')); 
	}
	
	/**
	 * This method registers all the complex types
	 *
	 */
	protected function registerTypes() 
	{
	    parent::registerTypes();
	    
	    $this->serviceClass->registerType(
		   	 'md5_results',
		   	 'complexType',
    	    'array',
    	    '',
    	    'SOAP-ENC:Array',
    	    array(),
    	    array(
    	       array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'xsd:string[]')
    	    ),
    	    'xsd:string'
		);
		
		
	    $this->serviceClass->registerType(
		    'module_list',
			'complexType',
		   	 'struct',
		   	 'all',
		  	  '',
				array(
					'modules'=>array('name'=>'modules', 'type'=>'tns:module_list_array'),
				)
		);
		
	    $this->serviceClass->registerType(
		    'module_list_array',
			'complexType',
		   	 'array',
		   	 '',
		  	  'SOAP-ENC:Array',
			array(),
		    array(
		        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:module_list_entry[]')
		    ),
			'tns:module_list_entry'
		);
	    
	    $this->serviceClass->registerType(
		    'module_list_entry',
			'complexType',
		   	 'struct',
		   	 'all',
		  	  '',
				array(
					'module_key'=>array('name'=>'module_key', 'type'=>'xsd:string'),
					'module_label'=>array('name'=>'module_label', 'type'=>'xsd:string'),
					'acls'=>array('name'=>'acls', 'type'=>'tns:acl_list'),
				)
		);
		
		$this->serviceClass->registerType(
		    'acl_list',
			'complexType',
		   	 'array',
		   	 '',
		  	  'SOAP-ENC:Array',
			array(),
		    array(
		        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:acl_list_entry[]')
		    ),
			'tns:acl_list_entry'
		);
		
		$this->serviceClass->registerType(
		    'acl_list_entry',
			'complexType',
		   	 'struct',
		   	 'all',
		  	  '',
				array(
					'action'=>array('name'=>'action', 'type'=>'xsd:string'),
					'access'=>array('name'=>'access', 'type'=>'xsd:string'),
				)
		);
		
		$this->serviceClass->registerType(
		   	 'get_entry_list_result_version2',
		   	 'complexType',
		   	 'struct',
		   	 'all',
		  	  '',
			array(
				'result_count' => array('name'=>'result_count', 'type'=>'xsd:int'),
				'total_count' => array('name'=>'total_count', 'type'=>'xsd:int'),
				'next_offset' => array('name'=>'next_offset', 'type'=>'xsd:int'),
				'entry_list' => array('name' =>'entry_list', 'type'=>'tns:entry_list'),
				'relationship_list' => array('name' =>'relationship_list', 'type'=>'tns:link_lists'),
			)
		);
		
		$this->serviceClass->registerType(
		    'new_module_fields',
			'complexType',
		   	 'struct',
		   	 'all',
		  	  '',
				array(
		        	'module_name'=>array('name'=>'module_name', 'type'=>'xsd:string'),
		        	'module_name'=>array('name'=>'table_name', 'type'=>'xsd:string'),
					'module_fields'=>array('name'=>'module_fields', 'type'=>'tns:field_list'),
					'link_fields'=>array('name'=>'link_fields', 'type'=>'tns:link_field_list'),
				)
		);
		
		//From v2_1, can't extend from this class because of versioning.
		$this->serviceClass->registerType(
			'link_list2',
			'complexType',
			'struct',
			'all',
			'',
			array(
			'link_list'=>array('name'=>'link_list', 'type'=>'tns:link_list'),
			)
		);
		$this->serviceClass->registerType(
		    'link_lists',
			'complexType',
		   	 'array',
		   	 '',
		  	  'SOAP-ENC:Array',
			array(),
		    array(
		        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:link_list2[]')
		    ),
			'tns:link_list2'
		);
		
		$this->serviceClass->registerType(
		    'link_array_list',
			'complexType',
		   	 'array',
		   	 '',
		  	  'SOAP-ENC:Array',
			array(),
		    array(
		        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:link_value2[]')
		    ),
			'tns:link_value2'
		);
		
		$this->serviceClass->registerType(
			'link_value2',
			'complexType',
			'struct',
			'all',
			'',
			array(
			'link_value'=>array('name'=>'link_value', 'type'=>'tns:link_value'),
			)
		);
		
		$this->serviceClass->registerType(
			'report_field_list',
			'complexType',
			'array',
			'',
			'SOAP-ENC:Array',
			array(),
			array(
			array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:field_list2[]')
			),
			'tns:field_list2'
		);
		$this->serviceClass->registerType(
			'field_list2',
			'complexType',
			'struct',
			'all',
			'',
			array(
			"field_list"=>array('name'=>'field_list', 'type'=>'tns:field_list'),
			)
		);
		$this->serviceClass->registerType(
			'report_entry_list',
			'complexType',
			'array',
			'',
			'SOAP-ENC:Array',
			array(),
			array(
			array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:entry_list2[]')
			),
			'tns:entry_list2'
		);
		$this->serviceClass->registerType(
			'entry_list2',
			'complexType',
			'struct',
			'all',
			'',
			array(
			"entry_list"=>array('name'=>'entry_list', 'type'=>'tns:entry_list'),
			)
		);
	}
}
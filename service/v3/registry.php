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


require_once('service/v2/registry.php'); //Extend off of v2 registry

class registry_v3 extends registry {
	
	/**
	 * This method registers all the functions on the service class
	 *
	 */
	protected function registerFunction() {
		
		$GLOBALS['log']->info('Begin: registry->registerFunction');
		parent::registerFunction();

		$this->serviceClass->registerFunction(
		    'get_module_fields_md5',
		    array('session'=>'xsd:string', 'module_names'=>'tns:select_fields'),
		    array('return'=>'tns:md5_results'));    
            
		$this->serviceClass->registerFunction(
		    'get_available_modules',
	        array('session'=>'xsd:string','filter'=>'xsd:string'),
	        array('return'=>'tns:module_list'));
	        
	    $this->serviceClass->registerFunction(
		    'get_last_viewed',
	        array('session'=>'xsd:string','module_names'=>'tns:module_names'),
	        array('return'=>'tns:last_viewed_list'));     
	        
        $this->serviceClass->registerFunction(
		    'get_upcoming_activities',
	        array('session'=>'xsd:string'),
	        array('return'=>'tns:upcoming_activities_list')); 
	        
	    $this->serviceClass->registerFunction(
		    'search_by_module',
	        array('session'=>'xsd:string','search_string'=>'xsd:string', 'modules'=>'tns:select_fields', 'offset'=>'xsd:int', 'max_results'=>'xsd:int','assigned_user_id' => 'xsd:string', 'select_fields'=>'tns:select_fields'),
	        array('return'=>'tns:return_search_result'));
	        
	    $this->serviceClass->registerFunction(
		    'get_relationships',
		    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'module_id'=>'xsd:string', 'link_field_name'=>'xsd:string', 'related_module_query'=>'xsd:string', 'related_fields'=>'tns:select_fields', 'related_module_link_name_to_fields_array'=>'tns:link_names_to_fields_array', 'deleted'=>'xsd:int', 'order_by'=>'xsd:string',),
		    array('return'=>'tns:get_entry_result_version2'));
		            
	    $GLOBALS['log']->info('END: registry->registerFunction');
	        
		// END OF REGISTER FUNCTIONS
	}
	
	/**
	 * This method registers all the complex types
	 *
	 */
	protected function registerTypes() {
	
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
    	    'module_names',
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
		    'upcoming_activities_list',
			'complexType',
		   	 'array',
		   	 '',
		  	  'SOAP-ENC:Array',
			array(),
		    array(
		        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:upcoming_activity_entry[]')
		    ),
			'tns:upcoming_activity_entry'
		);
		
		$this->serviceClass->registerType(
		    'upcoming_activity_entry',
		    'complexType',
		    'struct',
		    'all',
		    '',
		    array(
		        "id" => array('name'=>"id",'type'=>'xsd:string'),
		        "module" => array('name'=>"module",'type'=>'xsd:string'),
		        "date_due" => array('name'=>"date_due",'type'=>'xsd:string'),
				"summary" => array('name'=>"summary",'type'=>'xsd:string'),
		    )
		);
		
	    $this->serviceClass->registerType(
		    'last_viewed_list',
			'complexType',
		   	 'array',
		   	 '',
		  	  'SOAP-ENC:Array',
			array(),
		    array(
		        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:last_viewed_entry[]')
		    ),
			'tns:last_viewed_entry'
		);
		
	    $this->serviceClass->registerType(
		    'last_viewed_entry',
		    'complexType',
		    'struct',
		    'all',
		    '',
		    array(
		        "id" => array('name'=>"id",'type'=>'xsd:string'),
				"item_id" => array('name'=>"item_id",'type'=>'xsd:string'),
				"item_summary" => array('name'=>"item_summary",'type'=>'xsd:string'),
				"module_name" => array('name'=>"module_name",'type'=>'xsd:string'),
				"monitor_id" => array('name'=>"monitor_id",'type'=>'xsd:string'),
				"date_modified" => array('name'=>"date_modified",'type'=>'xsd:string')
		    )
		);
		
		$this->serviceClass->registerType(
		    'field',
			'complexType',
		   	 'struct',
		   	 'all',
		  	  '',
				array(
					'name'=>array('name'=>'name', 'type'=>'xsd:string'),
					'type'=>array('name'=>'type', 'type'=>'xsd:string'),
					'group'=>array('name'=>'group', 'type'=>'xsd:string'),
					'label'=>array('name'=>'label', 'type'=>'xsd:string'),
					'required'=>array('name'=>'required', 'type'=>'xsd:int'),
					'options'=>array('name'=>'options', 'type'=>'tns:name_value_list'),
		            'default_value'=>array('name'=>'name', 'type'=>'xsd:string'),
				)
		);
	}
}
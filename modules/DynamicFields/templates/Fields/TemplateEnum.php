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


require_once('include/utils/array_utils.php');
class TemplateEnum extends TemplateText{
    var $max_size = 100;
    var $len = 100;
    var $type='enum';
    var $ext1 = '';
    var $default_value = '';
    var $dependency ; // any dependency information
    var $supports_unified_search = true;

    function __construct ()
    {
    	// ensure that the field dependency information is read in from any _REQUEST
    	$this->localVardefMap = array (
    		'trigger' => 'trigger',
    		'action' => 'action' , ) ;
    	$this->vardef_map = array_merge ( $this->vardef_map , $this->localVardefMap ) ;
    }

    function populateFromPost ()
    {
    	parent::populateFromPost();
    	// now convert trigger,action pairs into a dependency array representation
    	// we expect the dependencies in the following format:
    	// trigger = [ trigger for action 1 , trigger for action 2 , ... , trigger for action n ]
    	// action = [ action 1 , action 2 , ... , action n ]

    	// check first if we have the component parts of a dependency
    	$dependencyPresent = true ;
    	foreach ( $this->localVardefMap as $def )
    	{
    		$dependencyPresent &= isset ( $this->$def ) ;
    	}

    	if ( $dependencyPresent )
    	{
    		$dependencies = array () ;

    		if ( is_array ( $this->trigger ) && is_array ( $this->action ) )
    		{
				for ( $i = 0 ; $i < count ( $this->action ) ; $i++ )
				{
					$dependencies [ $this->trigger [ $i ] ] = $this->action [ $i ] ;
				}
				$this->dependency = $dependencies ;
    		}
    		else
    		{
    			if ( ! is_array ( $this->trigger ) && ! is_array ( $this->action ) )
    				$this->dependency = array ( $this->trigger => $this->action ) ;
    		}
    		// tidy up
    		unset ( $this->trigger ) ;
    		unset ( $this->action ) ;
    	}
    }
	function get_xtpl_edit(){
		$name = $this->name;
		$value = '';
		if(isset($this->bean->$name)){
			$value = $this->bean->$name;
		}else{
			if(empty($this->bean->id)){
				$value= $this->default_value;
			}
		}
		if(!empty($this->help)){
		    $returnXTPL[strtoupper($this->name . '_help')] = translate($this->help, $this->bean->module_dir);
		}

		global $app_list_strings;
		$returnXTPL = array();
		$returnXTPL[strtoupper($this->name)] = $value;
		if(empty($this->ext1)){
			$this->ext1 = $this->options;
		}
		$returnXTPL[strtoupper('options_'.$this->name)] = get_select_options_with_id($app_list_strings[$this->ext1], $value);

		return $returnXTPL;


	}

	function get_xtpl_search(){
		$searchFor = '';
		if(!empty($_REQUEST[$this->name])){
			$searchFor = $_REQUEST[$this->name];
		}
		global $app_list_strings;
		$returnXTPL = array();
		$returnXTPL[strtoupper($this->name)] = $searchFor;
		if(empty($this->ext1)){
			$this->ext1 = $this->options;
		}
		$returnXTPL[strtoupper('options_'.$this->name)] = get_select_options_with_id(add_blank_option($app_list_strings[$this->ext1]), $searchFor);
		return $returnXTPL;

	}

	function get_field_def(){
		$def = parent::get_field_def();
		$def['options'] = !empty($this->options) ? $this->options : $this->ext1;
		$def['default'] = !empty($this->default) ? $this->default : $this->default_value;
		$def['len'] = $this->max_size;
		$def['studio'] = 'visible';
		// this class may be extended, so only do the unserialize for genuine TemplateEnums
		if (get_class( $this ) == 'TemplateEnum' && empty($def['dependency']) )
			$def['dependency'] = isset($this->ext4)? unserialize(html_entity_decode($this->ext4)) : null ;
		return $def;
	}

	function get_xtpl_detail(){
		$name = $this->name;

		// awu: custom fields are not being displayed on the detail view because $this->ext1 is always empty, adding this to get the options
		if(empty($this->ext1)){
			if(!empty($this->options))
				$this->ext1 = $this->options;
		}

		if(isset($this->bean->$name)){
			$key = $this->bean->$name;
			global $app_list_strings;
			if(preg_match('/&amp;/s', $key)) {
			   $key = str_replace('&amp;', '&', $key);
			}
			if(isset($app_list_strings[$this->ext1])){
                if(isset($app_list_strings[$this->ext1][$key])) {
                    return $app_list_strings[$this->ext1][$key];
                }

				if(isset($app_list_strings[$this->ext1][$this->bean->$name])){
					return $app_list_strings[$this->ext1][$this->bean->$name];
				}
			}
		}
		return '';
	}

	function save($df){
		if (!empty($this->default_value) && is_array($this->default_value)) {
			$this->default_value = $this->default_value[0];
		}
		if (!empty($this->default) && is_array($this->default)) {
			$this->default = $this->default[0];
		}
		parent::save($df);
	}
}


?>

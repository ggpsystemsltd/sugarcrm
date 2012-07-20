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


class TemplateRange extends TemplateText
{

	/**
	 * __construct
	 *
	 * Constructor for class.  This constructor ensures that TemplateRanage instances have the
	 * enable_range_search vardef value.
	 */
	function __construct()
	{
		$this->vardef_map['enable_range_search'] = 'enable_range_search';
		$this->vardef_map['options'] = 'options';
	}


	/**
	 * populateFromPost
	 *
	 * @see parent::populateFromPost
	 * This method checks to see if enable_range_search is set.  If so, ensure that the
	 * searchdefs for the module include the additional range fields.
	 */
	function populateFromPost() {
		parent::populateFromPost();
		//If we are enabling range search, make sure we add the start and end range fields
		if (!empty($this->enable_range_search))
		{
			//If range search is enabled, set the options attribute for the dropdown choice selections
			$this->options = ($this->type == 'date' || $this->type == 'datetimecombo' || $this->type == 'datetime') ? 'date_range_search_dom' : 'numeric_range_search_dom';

			if(isset($_REQUEST['view_module']))
			{
				$module = $_REQUEST['view_module'];
                if (file_exists('modules/'.$module.'/metadata/SearchFields.php')) 
                {
                	require('modules/'.$module.'/metadata/SearchFields.php');
                }
                
			    if(file_exists('custom/modules/'.$module.'/metadata/SearchFields.php'))
			    {
                    require('custom/modules/'.$module.'/metadata/SearchFields.php');
			    }                
                
                $field_name = $this->get_field_name($module, $_REQUEST['name']);

                if(isset($searchFields[$module]))
                {
                	$field_name_range = 'range_' . $field_name;
                	$field_name_start = 'start_range_' . $field_name;
                	$field_name_end = 'end_range_' . $field_name;

                	$isDateField = $this->type == 'date' || $this->type == 'datetimecombo' || $this->type == 'datetime';


                    $searchFields[$module][$field_name_range] = array('query_type'=>'default', 'enable_range_search'=>true);
                    if($isDateField)
                    {
                   	   $searchFields[$module][$field_name_range]['is_date_field'] = true;
                    }

                    $searchFields[$module][$field_name_start] = array('query_type'=>'default', 'enable_range_search'=>true);
                    if($isDateField)
                    {
                   	   $searchFields[$module][$field_name_start]['is_date_field'] = true;
                    }

                    $searchFields[$module][$field_name_end] = array('query_type'=>'default', 'enable_range_search'=>true);
                    if($isDateField)
                    {
                   	   $searchFields[$module][$field_name_end]['is_date_field'] = true;
                    }

                	if(!file_exists('custom/modules/'.$module.'/metadata/SearchFields.php'))
                	{
                	   mkdir_recursive('custom/modules/'.$module.'/metadata');
                	}
                	write_array_to_file("searchFields['{$module}']", $searchFields[$module], 'custom/modules/'.$module.'/metadata/SearchFields.php');
                }

			    if(file_exists($cachefile = sugar_cached("modules/$module/SearchForm_basic.tpl")))
                {
                   unlink($cachefile);
                }

                if(file_exists($cachefile = sugar_cached("modules/$module/SearchForm_advanced.tpl")))
                {
                   unlink($cachefile );
                }
			}
		} else {
		//Otherwise, try to restore the searchFields to their state prior to being enabled
			if(isset($_REQUEST['view_module']))
			{
				$module = $_REQUEST['view_module'];
                if (file_exists('modules/'.$module.'/metadata/SearchFields.php')) {
                	require('modules/'.$module.'/metadata/SearchFields.php');
                }
                
			    if(file_exists('custom/modules/'.$module.'/metadata/SearchFields.php'))
			    {
                    require('custom/modules/'.$module.'/metadata/SearchFields.php');
			    }                

                $field_name = $this->get_field_name($module, $_REQUEST['name']);

                if(isset($searchFields[$module]))
                {
                	$field_name_range = 'range_' . $field_name;
                	$field_name_start = 'start_range_' . $field_name;
                	$field_name_end = 'end_range_' . $field_name;


                    if(isset($searchFields[$module][$field_name_range]))
                	{
                	   unset($searchFields[$module][$field_name_range]);
                	}

                	if(isset($searchFields[$module][$field_name_start]))
                	{
                	   unset($searchFields[$module][$field_name_start]);
                	}

                    if(isset($searchFields[$module][$field_name_end]))
                	{
                	   unset($searchFields[$module][$field_name_end]);
                	}

                    if(!file_exists('custom/modules/'.$module.'/metadata/SearchFields.php'))
                	{
                	   mkdir_recursive('custom/modules/'.$module.'/metadata');
                	}
                	write_array_to_file("searchFields['{$module}']", $searchFields[$module], 'custom/modules/'.$module.'/metadata/SearchFields.php');
                }

			    if(file_exists($cachefile = sugar_cached("modules/$module/SearchForm_basic.tpl")))
                {
                   unlink($cachefile);
                }

                if(file_exists($cachefile = sugar_cached("modules/$module/SearchForm_advanced.tpl")))
                {
                   unlink($cachefile );
                }
			}
		}
	}


	/**
	 * get_field_def
	 *
	 * @see parent::get_field_def
	 * This method checks to see if the enable_range_search key/value entry should be
	 * added to the vardef entry representing the module
	 */
    function get_field_def()
    {
		$vardef = parent::get_field_def();
    	if(!empty($this->enable_range_search))
    	{
		   $vardef['enable_range_search'] = $this->enable_range_search;
		   $vardef['options'] = ($this->type == 'date' || $this->type == 'datetimecombo' || $this->type == 'datetime') ? 'date_range_search_dom' : 'numeric_range_search_dom';
		} else {
		   $vardef['enable_range_search'] = false;
		}
		return $vardef;
    }


    public static function repairCustomSearchFields($vardefs, $module, $package='')
    {

    	$fields = array();

    	//Find any range search enabled fields
		foreach($vardefs as $key=>$field)
		{
			if(!empty($field['enable_range_search'])) {
			   $fields[$field['name']] = $field;
			}
		}

		if(!empty($fields))
		{
				if(file_exists('custom/modules/'.$module.'/metadata/SearchFields.php'))
			    {
                    require('custom/modules/'.$module.'/metadata/SearchFields.php');
                } else if (file_exists('modules/'.$module.'/metadata/SearchFields.php')) {
                	require('modules/'.$module.'/metadata/SearchFields.php');
                } else if (file_exists('custom/modulebuilder/' . $package . '/modules/' . $module . '/metadata/SearchFields.php')) {
                	require('custom/modulebuilder/' . $package . '/modules/' . $module . '/metadata/SearchFields.php');
                }

    			foreach($fields as $field_name=>$field)
    			{
                	$field_name_range = 'range_' . $field_name;
                	$field_name_start = 'start_range_' . $field_name;
                	$field_name_end = 'end_range_' . $field_name;

                	$type = $field['type'];

                	$isDateField = $type == 'date' || $type == 'datetimecombo' || $type == 'datetime';

    			    $searchFields[$module][$field_name_range] = array('query_type'=>'default', 'enable_range_search'=>true);
                    if($isDateField)
                    {
                   	   $searchFields[$module][$field_name_range]['is_date_field'] = true;
                    }

                    $searchFields[$module][$field_name_start] = array('query_type'=>'default', 'enable_range_search'=>true);
                    if($isDateField)
                    {
                   	   $searchFields[$module][$field_name_start]['is_date_field'] = true;
                    }

                    $searchFields[$module][$field_name_end] = array('query_type'=>'default', 'enable_range_search'=>true);
                    if($isDateField)
                    {
                   	   $searchFields[$module][$field_name_end]['is_date_field'] = true;
                    }
    			}

                if(!file_exists('custom/modules/'.$module.'/metadata/SearchFields.php'))
                {
                   mkdir_recursive('custom/modules/'.$module.'/metadata');
                }

                write_array_to_file("searchFields['{$module}']", $searchFields[$module], 'custom/modules/'.$module.'/metadata/SearchFields.php');

		}
    }


}
?>
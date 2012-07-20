<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
    die ( 'Not A Valid Entry Point' ) ;
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

require_once ('modules/ModuleBuilder/parsers/ModuleBuilderParser.php') ;
require_once ('modules/ModuleBuilder/MB/MBPackage.php');

class ParserSearchFields extends ModuleBuilderParser
{

	var $searchFields;
	var $packageKey; 
	
    function ParserSearchFields ($moduleName, $packageName='')
    {
        $this->moduleName = $moduleName;
        if (!empty($packageName))
        {
            $this->packageName = $packageName;
            $mbPackage = new MBPackage($this->packageName);
            $this->packageKey = $mbPackage->key;
        }
        
        $this->searchFields = $this->getSearchFields();
    }
    
    function addSearchField($name, $searchField)
    {
    	if(empty($name) || empty($searchField) || !is_array($searchField))
    	{
    		return;
    	}
    	
    	$key = isset($this->packageKey) ? $this->packageKey . '_' . $this->moduleName : $this->moduleName;
        $this->searchFields[$key][$name] = $searchField;
    }
    
    function removeSearchField($name) 
    {

    	$key = isset($this->packageKey) ? $this->packageKey . '_' . $this->moduleName : $this->moduleName;

    	if(isset($this->searchFields[$key][$name]))
    	{
    		unset($this->searchFields[$key][$name]);
    	}
    }
    
    function getSearchFields()
    {
    	$searchFields = array();
        if (!empty($this->packageName) && file_exists("custom/modulebuilder/packages/{$this->packageName}/modules/{$this->moduleName}/metadata/SearchFields.php")) //we are in Module builder
        {
			include("custom/modulebuilder/packages/{$this->packageName}/modules/{$this->moduleName}/metadata/SearchFields.php");      	        	
        } else if(file_exists("custom/modules/{$this->moduleName}/metadata/SearchFields.php")) {
			include("custom/modules/{$this->moduleName}/metadata/SearchFields.php");      	        	
        } else if(file_exists("modules/{$this->moduleName}/metadata/SearchFields.php")) {
			include("modules/{$this->moduleName}/metadata/SearchFields.php");      	        	        	
        }
        
        return $searchFields;
    }
    
    function saveSearchFields ($searchFields)
    {
        if (!empty($this->packageName)) //we are in Module builder
        {
			$header = file_get_contents('modules/ModuleBuilder/MB/header.php');
            if(!file_exists("custom/modulebuilder/packages/{$this->packageName}/modules/{$this->moduleName}/metadata/SearchFields.php"))
            {
               mkdir_recursive("custom/modulebuilder/packages/{$this->packageName}/modules/{$this->moduleName}/metadata");
            }
			write_array_to_file("searchFields['{$this->packageKey}_{$this->moduleName}']", $searchFields["{$this->packageKey}_{$this->moduleName}"], "custom/modulebuilder/packages/{$this->packageName}/modules/{$this->moduleName}/metadata/SearchFields.php", 'w', $header);                	        	
        } else {
			$header = file_get_contents('modules/ModuleBuilder/MB/header.php');
            if(!file_exists("custom/modules/{$this->moduleName}/metadata/SearchFields.php"))
            {
               mkdir_recursive("custom/modules/{$this->moduleName}/metadata");
            }			
			write_array_to_file("searchFields['{$this->moduleName}']", $searchFields[$this->moduleName], "custom/modules/{$this->moduleName}/metadata/SearchFields.php", 'w', $header);                	        	
        }
        $this->searchFields = $searchFields;
    }
    


}

?>

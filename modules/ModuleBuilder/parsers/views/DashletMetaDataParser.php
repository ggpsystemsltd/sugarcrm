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


 require_once ('modules/ModuleBuilder/parsers/views/ListLayoutMetaDataParser.php') ;
 require_once ('modules/ModuleBuilder/parsers/views/SearchViewMetaDataParser.php') ;
 require_once 'modules/ModuleBuilder/parsers/constants.php' ;

 class DashletMetaDataParser extends ListLayoutMetaDataParser
 {

 	// Columns is used by the view to construct the listview - each column is built by calling the named function
 	public $columns = array ( 'LBL_DEFAULT' => 'getDefaultFields' , 'LBL_AVAILABLE' => 'getAdditionalFields' , 'LBL_HIDDEN' => 'getAvailableFields' ) ;

 	/*
 	 * Constructor
 	 * Must set:
 	 * $this->columns   Array of 'Column LBL'=>function_to_retrieve_fields_for_this_column() - expected by the view
 	 *
 	 * @param string moduleName     The name of the module to which this listview belongs
 	 * @param string packageName    If not empty, the name of the package to which this listview belongs
 	 */
 	 function __construct ($view, $moduleName , $packageName = '')
 	 {

 	 	$this->search = ($view == MB_DASHLETSEARCH) ? true : false;
 	 	$this->_moduleName = $moduleName;
 	 	$this->_packageName = $packageName;
 	 	$this->_view = $view ;
 	 	if ($this->search)
 	 	{
 	 		$this->columns = array ( 'LBL_DEFAULT' => 'getAdditionalFields' , 'LBL_HIDDEN' => 'getAvailableFields' ) ;
 	 		parent::__construct ( MB_DASHLETSEARCH, $moduleName, $packageName ) ;
 	 	} else
 	 	{
 	 		parent::__construct ( MB_DASHLET, $moduleName, $packageName ) ;
 	 	}
 	 	$this->_viewdefs = $this->mergeFieldDefinitions($this->_viewdefs, $this->_fielddefs);
 	 }

 	 /**
 	  * Dashlets contain both a searchview and list view definition, therefore we need to merge only the relevant info
 	  */
    function mergeFieldDefinitions ( $viewdefs, $fielddefs ) {
        if ($this->_view == MB_DASHLETSEARCH && isset($viewdefs['searchfields']))
    	{
	    	//Remove any relate fields from the possible defs as they will break the homepage
    		foreach($fielddefs as $id=>$def) {
	    		if (isset($def['type']) && $def['type'] == 'relate') {
	    			if( isset($fielddefs[$id]['id_name'])){
	    			$fielddefs[$fielddefs[$id]['id_name']] = $def;
	    			unset($fielddefs[$id]);
	    		}
	    	}
	    	}
    		$viewdefs = array_change_key_case($viewdefs['searchfields']);
    		$viewdefs = $this->_viewdefs = $this->convertSearchToListDefs($viewdefs);
    	}
    	else if ($this->_view == MB_DASHLET && isset($viewdefs['columns']))
    	{
    		$viewdefs = $this->_viewdefs = array_change_key_case($viewdefs['columns']);
    		$viewdefs = $this->_viewdefs = $this->convertSearchToListDefs($viewdefs);
    	}
    	
    	return $viewdefs;
    }

    function convertSearchToListDefs($defs) {
    	$temp = array();
    	foreach($defs as $key=>$value) {
    		$temp[$key] = $value;
    		if (!isset ($temp[$key]['name'])) {
    			$temp[$key]['name'] = $key;
    		}
    	}
    	return $temp;
    }

 	private function ConvertSearchToDashletDefs($defs) {
		$temp = array();
    	foreach($defs as $key=>$value) {
    		if($value['default']) {
    			//$temp[$key] = $value;
    			$temp[$key] = array('default' => '');
    		}else{
    			$temp[$key] = $value;
    		}
    	}
    	return $temp;
    }

    function handleSave ($populate = true)
    {
    	if (empty (  $this->_packageName ))
        {
        	foreach(array(MB_CUSTOMMETADATALOCATION , MB_BASEMETADATALOCATION) as $value){
        		$file = $this->implementation->getFileName(MB_DASHLET, $this->_moduleName, $value);
        		if(file_exists($file)){
	        		break;
	        	}
        	}
        	$writeTodashletName = $dashletName = $this->implementation->getLanguage().'Dashlet';
        	if(!file_exists($file)){
        		$file = "modules/{$this->_moduleName}/Dashlets/My{$this->_moduleName}Dashlet/My{$this->_moduleName}Dashlet.data.php";
        		$dashletName = 'My'.$this->implementation->getLanguage().'Dashlet';
        	}
        	$writeFile = $this->implementation->getFileName(MB_DASHLET, $this->_moduleName);
        	if(!file_exists($writeFile)){
        		mkdir_recursive ( dirname ( $writeFile ) ) ;
    		}
    	}
    	else{
    		$writeFile = $file = $this->implementation->getFileName(MB_DASHLET, $this->_moduleName, $this->_packageName);
    		$writeTodashletName = $dashletName =$this->implementation->module->key_name . 'Dashlet';
    	}
    	
    	$this->implementation->_history->append ( $file ) ;
    	if ($populate)
    	   $this->_populateFromRequest() ;
    	$out = "<?php\n" ;

    	require($file);
    	if (!isset($dashletData[$dashletName])) {
    		sugar_die ("unable to load Module Dashlet Definition");
    	}
    	if ($fh = sugar_fopen ( $writeFile, 'w' ))
    	{
    		if ($this->_view == MB_DASHLETSEARCH)
    		{
    			$dashletData[$dashletName]['searchFields'] = $this->ConvertSearchToDashletDefs($this->_viewdefs);
    		} else
    		{
    			$dashletData[$dashletName]['columns'] = $this->_viewdefs;
    		}
    		$out .= "\$dashletData['$writeTodashletName']['searchFields'] = " . var_export_helper ($dashletData[$dashletName]['searchFields']) . ";\n";
    		$out .= "\$dashletData['$writeTodashletName']['columns'] = " . var_export_helper ($dashletData[$dashletName]['columns']) . ";\n";
    		fputs ( $fh, $out) ;
    		fclose ( $fh ) ;
    	}
    }
 }
 ?>

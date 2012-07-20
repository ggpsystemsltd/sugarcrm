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

/*********************************************************************************

 * Description: This file is used to override the default Meta-data EditView behavior
 * to provide customization specific to the Quotes module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
require_once 'modules/ModuleBuilder/parsers/views/GridLayoutMetaDataParser.php' ;
require_once 'modules/ModuleBuilder/parsers/views/History.php' ;

//Hack to get GridLayoutMetaDataParser's _convertToCanonicalForm function to work
class ConvertLayoutImplementation 
{
	public $viewdefs;
	protected $fileName = "modules/Leads/metadata/convertdefs.php";
	
	function getViewDefs(){
		return $this->viewdefs;
	}
	
	function loadViewdefForModule($module)
	{
	    $viewDefFile = $this->fileName;
        if (file_exists("custom/$this->fileName"))
        {
            $viewDefFile = "custom/$this->fileName";
        } 
        $this->viewdefs = array();
        include($viewDefFile);
		if (isset($viewdefs[$module]))
        {
            $this->viewdefs['panels'] = $viewdefs[$module]['ConvertLead']['panels'];
        } else{
            $this->viewdefs['panels'] = array();
        }
	}
	
}

class ConvertLayoutMetadataParser extends GridLayoutMetaDataParser
{
    protected $pathMap = array ( MB_BASEMETADATALOCATION => '' , MB_CUSTOMMETADATALOCATION => 'custom/' , MB_WORKINGMETADATALOCATION => 'custom/working/' , MB_HISTORYMETADATALOCATION => 'custom/history/' ) ;
    protected $fileName = "modules/Leads/metadata/convertdefs.php";
    
	function __construct ($module)
	{
        $this->FILLER = array ( 'name' => MBConstants::$FILLER['name'] , 'label' => translate ( MBConstants::$FILLER['label'] ) ) ;
		global $beanFiles, $beanList;
		$class = $beanList[$module];
		$this->seed = new $class();
        $this->_moduleName = $module;
        $this->_view = MB_EDITVIEW;
        $this->_fielddefs = $this->seed->field_defs;
		$this->loadViewDefs();
		$this->implementation = new ConvertLayoutImplementation();
		$this->implementation->loadViewdefForModule($module);
		$this->_history = new History ( $this->fileName ) ;
	}
	
    function getOriginalViewDefs() {
    	//load from the original file only
        include($this->fileName);
        return $viewdefs;
    }
    
    function getLanguage ()
    {
        return "" ;
    }
    
    function getHistory ()
    {
        return $this->_history;
    }
    
    function handleSave ($populate = true)
    {
        if ($populate)
            $this->_populateFromRequest () ;
        $this->deploy ( $this->_viewdefs ) ;
    }
    
    /**
     * Should take in an updated set of definitions and re-arrange and override the current panel set with the new one.
     * @param array $data
     */
    function updateOrder ($data)
    {
        //Create the new viewdefs, replacing any properties in the modules with the ones from the request
		$final = array();
        foreach ($data as $index => $def)
        {
        	if (empty($def['module'])) continue;
        	//Copy over the panel definition from the current defs
        	if (isset($this->_viewdefs[$def['module']]) && isset($this->_viewdefs[$def['module']]['ConvertLead']))
        	{
        		foreach ($this->_viewdefs[$def['module']]['ConvertLead'] as $key => $item)
        		{
        			if (!isset($def[$key]))
        				$def[$key] = $item;
        		}
        	}
        	//Otherwise generate panels from the quick-create defs
        	else {
        		$qcParser = new GridLayoutMetaDataParser(MB_QUICKCREATE, $def['module']);
        		$panels = $qcParser->_viewdefs['panels'];
        		$modSingle = $def['module'];
        		if (!empty($GLOBALS['app_list_strings']['moduleListSingular'][$modSingle]))
                    $modSingle =  $GLOBALS['app_list_strings']['moduleListSingular'][$modSingle];
        		$key = "LNK_NEW_" . strtoupper(str_replace(' ', '_',$modSingle));
        		$label = translate($key);
        		if ( $label == $key) {
        			$this->saveNewLabel($key, translate("LBL_CREATE") . " " . $modSingle);
        		}
        	    $selkey = "LNK_SELECT_" . strtoupper($def['module']);
                $selLabel = translate($selkey);
                if ( $selLabel == $selkey) {
                	$this->saveNewLabel($selkey, translate("LBL_SELECT") . " " . $modSingle);
                }
        		$pkeys = array_keys($panels);
                $def['panels'][$key] =  $panels[$pkeys[0]];
        		$def['templateMeta'] = $qcParser->_viewdefs['templateMeta'];
        		
        	}
        	$final[$def['module']] = array('ConvertLead' => $def);
        }
        $this->_viewdefs = $final;
        $this->deploy ( $this->_viewdefs ) ;
    }

    function removeLayout ($module)
    {
        //First make sure we get the definitions in the correct order
        if (isset($this->_viewdefs[$module]))
        {
             unset($this->_viewdefs[$module]);
        }
        if (isset($this->_viewdefs["panels"]))
        {
        	unset($this->_viewdefs["panels"]);
        }
        $this->deploy ( $this->_viewdefs ) ;
    }   
    
    function deploy ($defs)
    {
        /*
    	//TODO: Add history support to the convert leads layout editor.
    	//Check if we loaded from a history file, and we need to back up the current file instead
    	if ($this->_sourceFilename == $this->pathMap[MB_HISTORYMETADATALOCATION] . $this->fileName) {
            foreach ( array ( MB_WORKINGMETADATALOCATION , MB_CUSTOMMETADATALOCATION , MB_BASEMETADATALOCATION ) as $type ) {
                if (file_exists($this->pathMap[MB_HISTORYMETADATALOCATION] . $this->fileName)) {
                    $this->_history->append ( $this->pathMap[$type] . $this->fileName) ;
                    break;
                }
            }
        } else {
            $this->_history->append ( $this->_sourceFilename ) ;
        }*/
    	
        // when we deploy get rid of the working file; we have the changes in the MB_CUSTOMMETADATALOCATION so no need for a redundant copy in MB_WORKINGMETADATALOCATION
        // this also simplifies manual editing of layouts. You can now switch back and forth between Studio and manual changes without having to keep these two locations in sync
        $workingFilename = $this->pathMap[MB_WORKINGMETADATALOCATION] . $this->fileName ;

        if (file_exists ( $workingFilename ))
        unlink ( $workingFilename ) ;
        $filename = $this->pathMap[MB_CUSTOMMETADATALOCATION] . $this->fileName ;
        $GLOBALS [ 'log' ]->debug ( get_class ( $this ) . "->deploy(): writing to " . $filename ) ;
        $this->_saveToFile ( $filename, $defs ) ;

        // now clear the cache so that the results are immediately visible
        include_once ('include/TemplateHandler/TemplateHandler.php') ;
        TemplateHandler::clearCache ( $this->_moduleName ) ;
    }
    
    protected function _saveToFile ($filename , $defs , $useVariables = true )
    {

    	mkdir_recursive ( dirname ( $filename ) ) ;

        // create the new metadata file contents, and write it out
        $out = "<?php\n" ;
        $out .= '$viewdefs = ' . var_export_helper ( $defs ) ;
        $out .= ";\n?>\n" ;

        if ( file_put_contents ( $filename, $out ) === false)
            $GLOBALS [ 'log' ]->fatal ( get_class($this).": could not write new viewdef file " . $filename ) ;
    }
    
    
    function _populateFromRequest() {
    	parent::_populateFromRequest($this->_fielddefs);
    	$convertVars = array("convertCopy" => "copyData", "convertRequired" => "required", "convertSelection" => "select");
    	foreach($convertVars as $req => $conv)
    	{
    		if (isset($_REQUEST[$req]))
    		{
    			if (empty($_REQUEST[$req]) || $_REQUEST[$req] == "false")
                    $this->_viewdefs[$this->_moduleName]['ConvertLead'][$conv] = false;
    			else
                    $this->_viewdefs[$this->_moduleName]['ConvertLead'][$conv] = $_REQUEST[$req];
    		}
    	}
    	$this->_viewdefs[$this->_moduleName]['ConvertLead']['panels'] = $this->_convertToCanonicalForm($this->_viewdefs['panels'], $this->_fielddefs);
    	unset($this->_viewdefs['panels']);
    }
    
    function loadViewDefs() {
        $viewDefFile = $this->fileName;
        if (file_exists("custom/$this->fileName"))
        {
            $viewDefFile = "custom/$this->fileName";
        } 
        include($viewDefFile);
        $this->_viewdefs = $viewdefs;
        if (isset($this->_viewdefs[$this->_moduleName]))
        {
        	$this->_viewdefs['panels'] = $this->_convertFromCanonicalForm($this->_viewdefs[$this->_moduleName]['ConvertLead']['panels'], $this->_fielddefs);
        } else{
        	$this->_viewdefs['panels'] = array();
        }
    }
    
    public function getDefForModule($mod)
    {
    	if (isset($this->_viewdefs[$mod]) && isset($this->_viewdefs[$mod]["ConvertLead"]))
    	   return $this->_viewdefs[$mod]["ConvertLead"];
    	   
    	return false;
    }
    
    protected function saveNewLabel($key, $label)
    {
    	require_once 'modules/ModuleBuilder/parsers/parser.label.php' ;
        $parser = new ParserLabel ( "Leads" ) ;
        $parser->addLabelsToAllLanguages(array($key => $label));
    }
	
	public function getUseTabs(){
        return false;
    }
    
    public function setUseTabs($useTabs){
        
    }
}
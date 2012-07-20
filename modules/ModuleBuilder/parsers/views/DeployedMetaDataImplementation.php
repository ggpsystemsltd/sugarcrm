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

/*
 * Implementation class (following a Bridge Pattern) for handling loading and saving deployed module metadata
 * For example, listview or editview viewdefs
 */

require_once 'modules/ModuleBuilder/parsers/views/AbstractMetaDataImplementation.php' ;
require_once 'modules/ModuleBuilder/parsers/views/MetaDataImplementationInterface.php' ;
require_once 'modules/ModuleBuilder/parsers/views/ListLayoutMetaDataParser.php' ;
require_once 'modules/ModuleBuilder/parsers/views/GridLayoutMetaDataParser.php' ;
require_once 'modules/ModuleBuilder/parsers/views/PopupMetaDataParser.php' ;
require_once 'modules/ModuleBuilder/Module/StudioModuleFactory.php' ;
require_once 'modules/ModuleBuilder/parsers/constants.php' ;

class DeployedMetaDataImplementation extends AbstractMetaDataImplementation implements MetaDataImplementationInterface
{

	/*
	 * Constructor
	 * @param string $view
	 * @param string $moduleName
	 * @throws Exception Thrown if the provided view doesn't exist for this module
	 */
	function __construct ($view , $moduleName)
	{

		// BEGIN ASSERTIONS
		if (! isset ( $GLOBALS [ 'beanList' ] [ $moduleName ] ))
		{
			sugar_die ( get_class ( $this ) . ": Modulename $moduleName is not a Deployed Module" ) ;
		}
		// END ASSERTIONS

		$this->_view = strtolower ( $view ) ;
		$this->_moduleName = $moduleName ;

		$module = StudioModuleFactory::getStudioModule( $moduleName ) ;
		$this->module_dir = $module->seed->module_dir;
		$fielddefs = $module->getFields();

        //Load any custom views
        $sm = StudioModuleFactory::getStudioModule($moduleName);
        foreach($sm->sources as $file => $def)
        {
            if (!empty($def['view'])) {
                $viewVar = "viewdefs";
                if (!empty($def['type']) && !empty($this->_fileVariables[$def["type"]]))
                    $viewVar = $this->_fileVariables[$def["type"]];
                $this->_fileVariables[$def['view']] = $viewVar;
            }
        }

		$loaded = null ;
		foreach ( array ( MB_BASEMETADATALOCATION , MB_CUSTOMMETADATALOCATION , MB_WORKINGMETADATALOCATION , MB_HISTORYMETADATALOCATION ) as $type )
		{
			$this->_sourceFilename = $this->getFileName ( $view, $moduleName, $type ) ;
			if($view == MB_POPUPSEARCH || $view == MB_POPUPLIST){
				global $current_language;
				$mod = return_module_language($current_language , $moduleName);
				$layout = $this->_loadFromPopupFile ( $this->_sourceFilename , $mod, $view);
			}else{
				$layout = $this->_loadFromFile ( $this->_sourceFilename );
			}
			if ( null !== $layout )
			{
				// merge in the fielddefs from this layout
				$this->_mergeFielddefs ( $fielddefs , $layout ) ;
				$loaded = $layout ;
			}
		}

		if ($loaded === null)
		{
			switch ( $view )
			{
				case MB_QUICKCREATE:
					// Special handling for QuickCreates - if we don't have a QuickCreate definition in the usual places, then use an EditView

					$loaded = $this->_loadFromFile ( $this->getFileName ( MB_EDITVIEW, $this->_moduleName, MB_BASEMETADATALOCATION ) ) ;

					if ($loaded === null)
						throw new Exception( get_class ( $this ) . ": cannot convert from EditView to QuickCreate for Module $this->_moduleName - definitions for EditView are missing" ) ;

					// Now change the array index
					$temp = $loaded [ GridLayoutMetaDataParser::$variableMap [ MB_EDITVIEW ] ] ;
					unset ( $loaded [ GridLayoutMetaDataParser::$variableMap [ MB_EDITVIEW ] ] ) ;
					$loaded [ GridLayoutMetaDataParser::$variableMap [ MB_QUICKCREATE ] ] = $temp ;
					// finally, save out our new definition so that we have a base record for the history to work from
					$this->_sourceFilename = self::getFileName ( MB_QUICKCREATE, $this->_moduleName, MB_CUSTOMMETADATALOCATION ) ;
					$this->_saveToFile ( $this->_sourceFilename, $loaded ) ;
					$this->_mergeFielddefs ( $fielddefs , $loaded ) ;
					break;

				case MB_WIRELESSEDITVIEW:
				case MB_WIRELESSDETAILVIEW:
				case MB_WIRELESSBASICSEARCH:
				case MB_WIRELESSADVANCEDSEARCH:
				case MB_WIRELESSLISTVIEW:
					// If we're missing a wireless view, we can create it easily from a template, sourced from SugarObjects
					// First, need to identify which SugarObject template would be the best to use
					$type = $module->getType () ;
					$this->_sourceFilename = self::getFileName ( $view, $moduleName, MB_CUSTOMMETADATALOCATION ) ;

					// Now we can copy the wireless view from the template
					$loaded = $this->_loadFromFile ( "include/SugarObjects/templates/$type/metadata/".basename ( $this->_sourceFilename ) ) ;

					if ($loaded === null)
						throw new Exception( get_class ( $this ) . ": cannot create wireless view for module $moduleName - definitions for $view are missing in the SugarObject template for type $type" ) ;

					$loaded = $this->replaceVariables($loaded, $module);
					$this->_saveToFile ( $this->_sourceFilename, $loaded , false ) ; // write out without the placeholder module_name and object
					$this->_mergeFielddefs ( $fielddefs , $loaded ) ;
					break;
				case MB_DASHLETSEARCH:
        		case MB_DASHLET:
	        		$type = $module->getType () ;
	        		$this->_sourceFilename = self::getFileName ( $view, $moduleName, MB_CUSTOMMETADATALOCATION ) ;
	        		$needSave = false;
	        		if(file_exists( "custom/modules/{$moduleName}/metadata/".basename ( $this->_sourceFilename))){
	        			$loaded = $this->_loadFromFile ( "custom/modules/{$moduleName}/metadata/".basename ( $this->_sourceFilename) )  ;	  
	        		}
	        		elseif(file_exists(
	        			"modules/{$moduleName}/Dashlets/My{$moduleName}Dashlet/My{$moduleName}Dashlet.data.php")){
	        			$loaded = $this->_loadFromFile ( "modules/{$moduleName}/Dashlets/My{$moduleName}Dashlet/My{$moduleName}Dashlet.data.php");
	        		}
	        		else{
	        			$loaded = $this->_loadFromFile ( "include/SugarObjects/templates/$type/metadata/".basename ( $this->_sourceFilename ) ) ;
	        			$needSave = true; 			
	        		}
	        		if ($loaded === null)
						throw new Exception( get_class ( $this ) . ": cannot create dashlet view for module $moduleName - definitions for $view are missing in the SugarObject template for type $type" ) ;
	        		$loaded = $this->replaceVariables($loaded, $module);
	        		$temp = $this->_moduleName;
	        		if($needSave){
		        		$this->_moduleName = $this->_moduleName.'Dashlet';
						$this->_saveToFile ( $this->_sourceFilename, $loaded,false) ; // write out without the placeholder module_name and object
						$this->_moduleName = $temp;
						unset($temp);
	        		}
					$this->_mergeFielddefs ( $fielddefs , $loaded ) ;
					break;
				case MB_POPUPLIST:
        		case MB_POPUPSEARCH:
        			$type = $module->getType () ;
					$this->_sourceFilename = self::getFileName ( $view, $moduleName, MB_CUSTOMMETADATALOCATION ) ;

					// Now we can copy the wireless view from the template
					global $current_language;
					$mod = return_module_language($current_language , $moduleName);
					$loadedForWrite = $this->_loadFromPopupFile (  "include/SugarObjects/templates/$type/metadata/".basename ( $this->_sourceFilename )  , $mod, $view, true);
        			if ($loadedForWrite === null)
						throw new Exception( get_class ( $this ) . ": cannot create popup view for module $moduleName - definitions for $view are missing in the SugarObject template for type $type" ) ;
	        		$loadedForWrite = $this->replaceVariables($loadedForWrite, $module);
					$this->_saveToFile ( $this->_sourceFilename, $loadedForWrite , false , true) ; // write out without the placeholder module_name and object
					$loaded = $this->_loadFromPopupFile (  "include/SugarObjects/templates/$type/metadata/".basename ( $this->_sourceFilename )  , $mod, $view);
					$this->_mergeFielddefs ( $fielddefs , $loaded ) ;
        			break;
				default:

			}
			if ( $loaded === null )
				throw new Exception( get_class ( $this ) . ": view definitions for View $this->_view and Module $this->_moduleName are missing" ) ;
		}

		$this->_viewdefs = $loaded ;
		// Set the original Viewdefs - required to ensure we don't lose fields from the base layout
		// Check the base location first, then if nothing is there (which for example, will be the case for some QuickCreates, and some mobile layouts - see above)
		// we need to check the custom location where the derived layouts will be
		foreach ( array ( MB_BASEMETADATALOCATION , MB_CUSTOMMETADATALOCATION ) as $type )
		{
			$sourceFilename = $this->getFileName ( $view, $moduleName, $type ) ;
			if($view == MB_POPUPSEARCH || $view == MB_POPUPLIST){
				global $current_language;
				$mod = return_module_language($current_language , $moduleName);
				$layout = $this->_loadFromPopupFile ( $sourceFilename , $mod, $view);
			}else{
				$layout = $this->_loadFromFile ( $sourceFilename );
			}
			if ( null !== ($layout ) )
			{
				$this->_originalViewdefs = $layout ;
				break ;
			}
		}
		//For quick create viewdefs, if there is no quickcreatedefs.php under MB_BASEMETADATALOCATION, the original defs is editview defs.
        if ($view == MB_QUICKCREATE) {
          foreach(array(MB_QUICKCREATE, MB_EDITVIEW) as $v){
            $sourceFilename = $this->getFileName($v, $moduleName, MB_BASEMETADATALOCATION ) ;
            if (file_exists($sourceFilename )) {
              $layout = $this->_loadFromFile($sourceFilename );
              if (null !== $layout && isset($layout[GridLayoutMetaDataParser::$variableMap[$v]])) {
                $layout = array(GridLayoutMetaDataParser::$variableMap[MB_QUICKCREATE] => $layout[GridLayoutMetaDataParser::$variableMap[$v]]);
                break;
              }
            }
          }
          
          if (null === $layout) {
            $sourceFilename = $this->getFileName($view, $moduleName, MB_CUSTOMMETADATALOCATION );
            $layout = $this->_loadFromFile($sourceFilename );
          }
          
          if (null !== $layout  ) {
            $this->_originalViewdefs = $layout ;
          }
        }
        
		$this->_fielddefs = $fielddefs ;
		$this->_history = new History ( $this->getFileName ( $view, $moduleName, MB_HISTORYMETADATALOCATION ) ) ;

	}

	function getLanguage ()
	{
		return $this->_moduleName ;
	}
	
	function getOriginalViewdefs()
	{
		return $this->_originalViewdefs;
	}


	/*
	 * Save a draft layout
	 * @param array defs    Layout definition in the same format as received by the constructor
	 */
	function save ($defs)
	{
		//If we are pulling from the History Location, that means we did a restore, and we need to save the history for the previous file.
		if ($this->_sourceFilename == $this->getFileName ( $this->_view, $this->_moduleName, MB_HISTORYMETADATALOCATION )) {
			foreach ( array ( MB_WORKINGMETADATALOCATION , MB_CUSTOMMETADATALOCATION , MB_BASEMETADATALOCATION ) as $type ) {
				if (file_exists($this->getFileName ( $this->_view, $this->_moduleName, $type ))) {
					$this->_history->append ( $this->getFileName ( $this->_view, $this->_moduleName, $type )) ;
					break;
				}
			}
		} else {
			$this->_history->append ( $this->_sourceFilename ) ;
		}

		$GLOBALS [ 'log' ]->debug ( get_class ( $this ) . "->save(): writing to " . $this->getFileName ( $this->_view, $this->_moduleName, MB_WORKINGMETADATALOCATION ) ) ;
		$this->_saveToFile ( $this->getFileName ( $this->_view, $this->_moduleName, MB_WORKINGMETADATALOCATION ), $defs ) ;
	}

	/*
	 * Deploy a layout
	 * @param array defs    Layout definition in the same format as received by the constructor
	 */
	function deploy ($defs)
	{
		if ($this->_sourceFilename == $this->getFileName ( $this->_view, $this->_moduleName, MB_HISTORYMETADATALOCATION )) {
			foreach ( array ( MB_WORKINGMETADATALOCATION , MB_CUSTOMMETADATALOCATION , MB_BASEMETADATALOCATION ) as $type ) {
				if (file_exists($this->getFileName ( $this->_view, $this->_moduleName, $type ))) {
					$this->_history->append ( $this->getFileName ( $this->_view, $this->_moduleName, $type )) ;
					break;
				}
			}
		} else {
			$this->_history->append ( $this->_sourceFilename ) ;
		}
		// when we deploy get rid of the working file; we have the changes in the MB_CUSTOMMETADATALOCATION so no need for a redundant copy in MB_WORKINGMETADATALOCATION
		// this also simplifies manual editing of layouts. You can now switch back and forth between Studio and manual changes without having to keep these two locations in sync
		$workingFilename = $this->getFileName ( $this->_view, $this->_moduleName, MB_WORKINGMETADATALOCATION ) ;

		if (file_exists ( $workingFilename ))
		unlink ( $this->getFileName ( $this->_view, $this->_moduleName, MB_WORKINGMETADATALOCATION ) ) ;
		$filename = $this->getFileName ( $this->_view, $this->_moduleName, MB_CUSTOMMETADATALOCATION ) ;
		$GLOBALS [ 'log' ]->debug ( get_class ( $this ) . "->deploy(): writing to " . $filename ) ;
		$this->_saveToFile ( $filename, $defs ) ;

		// now clear the cache so that the results are immediately visible
		include_once ('include/TemplateHandler/TemplateHandler.php') ;
		TemplateHandler::clearCache ( $this->_moduleName ) ;
	}

	/*
	 * Construct a full pathname for the requested metadata
	 * Can be called statically
	 * @param string view           The view type, that is, EditView, DetailView etc
	 * @param string modulename     The name of the module that will use this layout
	 * @param string type
	 */
	public static function getFileName ($view , $moduleName , $type = MB_CUSTOMMETADATALOCATION)
	{

		$pathMap = array (
            MB_BASEMETADATALOCATION => '' ,
            MB_CUSTOMMETADATALOCATION => 'custom/' ,
            MB_WORKINGMETADATALOCATION => 'custom/working/' ,
            MB_HISTORYMETADATALOCATION => 'custom/history/'
        ) ;
		$type = strtolower ( $type ) ;

		$filenames = array (
            MB_DASHLETSEARCH => 'dashletviewdefs',
            MB_DASHLET => 'dashletviewdefs',
            MB_POPUPSEARCH => 'popupdefs',
            MB_POPUPLIST => 'popupdefs',
			MB_LISTVIEW => 'listviewdefs' ,
			MB_BASICSEARCH => 'searchdefs' ,
			MB_ADVANCEDSEARCH => 'searchdefs' ,
			MB_EDITVIEW => 'editviewdefs' ,
			MB_DETAILVIEW => 'detailviewdefs' ,
			MB_QUICKCREATE => 'quickcreatedefs',
			MB_WIRELESSEDITVIEW => 'wireless.editviewdefs' ,
			MB_WIRELESSDETAILVIEW => 'wireless.detailviewdefs' ,
			MB_WIRELESSLISTVIEW => 'wireless.listviewdefs' ,
			MB_WIRELESSBASICSEARCH => 'wireless.searchdefs' ,
			MB_WIRELESSADVANCEDSEARCH => 'wireless.searchdefs' ,
		) ;

        //In a deployed module, we can check for a studio module with file name overrides.
        $sm = StudioModuleFactory::getStudioModule($moduleName);
        foreach($sm->sources as $file => $def)
        {
            if (!empty($def['view'])) {
                $filenames[$def['view']] = substr($file, 0, strlen($file) - 4);
            }

        }

		// BEGIN ASSERTIONS
		if (! isset ( $pathMap [ $type ] ))
		{
			sugar_die ( "DeployedMetaDataImplementation->getFileName(): Type $type is not recognized" ) ;
		}
		if (! isset ( $filenames [ $view ] ))
        {
            sugar_die ( "DeployedMetaDataImplementation->getFileName(): View $view is not recognized" ) ;
        }
		// END ASSERTIONS

		

		// Construct filename
		return $pathMap [ $type ] . 'modules/' . $moduleName . '/metadata/' . $filenames [ $view ] . '.php' ;
	}
	
	private function replaceVariables($defs, $module) {
		$var_values = array(
			"<object_name>" => $module->seed->object_name, 
			"<_object_name>" => strtolower($module->seed->object_name),  
			"<OBJECT_NAME>" => strtoupper($module->seed->object_name), 
			"<module_name>" => $module->seed->module_dir,  
			'<_module_name>'=> strtolower ( $module->seed->module_dir ) 
		);
		return $this->recursiveVariableReplace($defs, $module, $var_values);
	}

	public function getModuleDir(){
		return $this->module_dir;
	}
    
    private function recursiveVariableReplace($arr, $module, $replacements) {
        $ret = array();
		foreach ($arr as $key => $val) {
			if (is_array($val)) {
	            $newkey = $key;
                $val = $this->recursiveVariableReplace($val, $module, $replacements);
	            foreach ($replacements as $var => $rep) {
	                $newkey = str_replace($var, $rep, $newkey);
	            }
				$ret[$newkey] = $val;
	        } else {
                $newkey = $key;
			    $newval = $val;
                if(is_string($val))
                {
                    foreach ($replacements as $var => $rep) {
                        $newkey = str_replace($var, $rep, $newkey);
                        $newval = str_replace($var, $rep, $newval);
                    }
                }
                $ret[$newkey] = $newval;
			}
        }
		return $ret;
	}

    /**
     * This is just a wrapper to the private method _saveToFile
     * @param  $file    the file name to save to
     * @param  $defs    the defs to save to the file
     * @return void
     */
    public function saveToFile($file, $defs)
    {
        $this->_saveToFile ( $file, $defs ) ;
    }
}
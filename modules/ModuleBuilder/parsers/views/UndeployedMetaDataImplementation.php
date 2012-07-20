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


require_once 'modules/ModuleBuilder/MB/ModuleBuilder.php' ;
require_once 'modules/ModuleBuilder/parsers/views/AbstractMetaDataImplementation.php' ;
require_once 'modules/ModuleBuilder/parsers/views/MetaDataImplementationInterface.php' ;
require_once 'modules/ModuleBuilder/parsers/views/ListLayoutMetaDataParser.php' ;
require_once 'modules/ModuleBuilder/parsers/views/GridLayoutMetaDataParser.php' ;
require_once 'modules/ModuleBuilder/parsers/constants.php' ;

class UndeployedMetaDataImplementation extends AbstractMetaDataImplementation implements MetaDataImplementationInterface
{

    private $_packageName ;

   /*
     * Constructor
     * @param string $view
     * @param string $moduleName
     * @throws Exception Thrown if the provided view doesn't exist for this module
     */

    function __construct ($view , $moduleName , $packageName)
    {

    	// BEGIN ASSERTIONS
        if (! isset ( $this->_fileVariables [ $view ] ))
        {
            sugar_die ( get_class ( $this ) . ": View $view is not supported" ) ;
        }
        // END ASSERTIONS

        $this->_view = strtolower ( $view ) ;
        $this->_moduleName = $moduleName ;
        $this->_packageName = $packageName ;

        //get the bean from ModuleBuilder
        $mb = new ModuleBuilder ( ) ;
        $this->module = $module = & $mb->getPackageModule ( $packageName, $moduleName ) ;
        $pak = $mb->getPackage($packageName);
        $module->mbvardefs->updateVardefs () ;

        // Set the list of fields associated with this module
        $fielddefs = array_change_key_case ( $module->mbvardefs->vardefs [ 'fields' ] ) ;

        // Set the global mod_strings directly as Sugar does not automatically load the language files for undeployed modules (how could it?)
        $selected_lang = 'en_us';
        if(isset($GLOBALS['current_language']) &&!empty($GLOBALS['current_language'])) {
            $selected_lang = $GLOBALS['current_language'];
        }
        $GLOBALS [ 'mod_strings' ] = array_merge ( $GLOBALS [ 'mod_strings' ], $module->getModStrings ($selected_lang) ) ;

        //Load relationshhip based fields and labels
        $moduleRels = $pak->getRelationshipsForModule($moduleName);
        foreach($moduleRels as $rName => $rel ) {
            $varDefsSet = $rel->buildVardefs();
        if (!empty($varDefsSet[$module->key_name])) {
            	foreach ($varDefsSet[$module->key_name] as $def) {
                    $fielddefs[$def['name']] = $def;
                 }
            }
            $labels = $rel->buildLabels();
            foreach ($labels as $def) {
                if ($def['module'] == $module->key_name) {
            	   $GLOBALS [ 'mod_strings' ][$def['system_label']] = $def['display_label'];

            	}
            }
        }

        $loaded = null ;
        foreach ( array ( MB_WORKINGMETADATALOCATION , MB_HISTORYMETADATALOCATION ) as $type )
    	{
			$this->_sourceFilename = $this->getFileName ( $view, $moduleName, $packageName , $type ) ;
			if($view == MB_POPUPSEARCH || $view == MB_POPUPLIST){
				$layout = $this->_loadFromPopupFile ( $this->_sourceFilename , null, $view);
			}else{
				$layout = $this->_loadFromFile ( $this->_sourceFilename );
			}
			if ( null !== $layout  )
			{
				// merge in the fielddefs from this layout
				$this->_mergeFielddefs ( $fielddefs , $layout ) ;
				$loaded = $layout ;
			}
		}

        if ($loaded === null)
        {
            throw new Exception ( get_class ( $this ) . ": view definitions for View $this->_view and Module $this->_moduleName are missing" ) ;
        }

        $this->_viewdefs = $loaded ;
        $sourceFilename = $this->getFileName ( $view, $moduleName, $packageName, MB_WORKINGMETADATALOCATION );
        if($view == MB_POPUPSEARCH || $view == MB_POPUPLIST){
			$layout = $this->_loadFromPopupFile ( $sourceFilename , null, $view);
		}else{
			$layout = $this->_loadFromFile ($sourceFilename) ;
		}
		$this->_originalViewdefs = $layout ;
		$this->_fielddefs = $fielddefs ;
        $this->_history = new History ( $this->getFileName ( $view, $moduleName, $packageName, MB_HISTORYMETADATALOCATION ) ) ;
    }

    function getLanguage ()
    {
        return $this->_packageName . $this->_moduleName ;
    }

    /*
     * Deploy a layout
     * @param array defs    Layout definition in the same format as received by the constructor
     */
    function deploy ($defs)
    {
        //If we are pulling from the History Location, that means we did a restore, and we need to save the history for the previous file.
    	if ($this->_sourceFilename == $this->getFileName ( $this->_view, $this->_moduleName, $this->_packageName, MB_HISTORYMETADATALOCATION )
    	&& file_exists($this->getFileName ( $this->_view, $this->_moduleName, $this->_packageName, MB_WORKINGMETADATALOCATION ))) {
        	$this->_history->append ( $this->getFileName ( $this->_view, $this->_moduleName, $this->_packageName, MB_WORKINGMETADATALOCATION )) ;
        } else {
    		$this->_history->append ( $this->_sourceFilename ) ;
        }
        $filename = $this->getFileName ( $this->_view, $this->_moduleName, $this->_packageName, MB_WORKINGMETADATALOCATION ) ;
        $GLOBALS [ 'log' ]->debug ( get_class ( $this ) . "->deploy(): writing to " . $filename ) ;
        $this->_saveToFile ( $filename, $defs ) ;
    }

    /*
     * Construct a full pathname for the requested metadata
     * @param string view           The view type, that is, EditView, DetailView etc
     * @param string modulename     The name of the module that will use this layout
     * @param string type
     */
    public static function getFileName ($view , $moduleName , $packageName , $type = MB_BASEMETADATALOCATION)
    {

        $type = strtolower ( $type ) ;

        // BEGIN ASSERTIONS
        if ($type != MB_BASEMETADATALOCATION && $type != MB_HISTORYMETADATALOCATION)
        {
            // just warn rather than die
            $GLOBALS [ 'log' ]->warning ( "UndeployedMetaDataImplementation->getFileName(): view type $type is not recognized" ) ;
        }
        // END ASSERTIONS

        $filenames = array (  	MB_DASHLETSEARCH => 'dashletviewdefs',
        						MB_DASHLET => 'dashletviewdefs',
        						MB_LISTVIEW => 'listviewdefs' ,
        						MB_BASICSEARCH => 'searchdefs' ,
        						MB_ADVANCEDSEARCH => 'searchdefs' ,
        						MB_EDITVIEW => 'editviewdefs' ,
        						MB_DETAILVIEW => 'detailviewdefs' ,
        						MB_QUICKCREATE => 'quickcreatedefs',
					        	MB_POPUPSEARCH => 'popupdefs',
					        	MB_POPUPLIST => 'popupdefs',
        						MB_WIRELESSEDITVIEW => 'wireless.editviewdefs' ,
        						MB_WIRELESSDETAILVIEW => 'wireless.detailviewdefs' ,
        						MB_WIRELESSLISTVIEW => 'wireless.listviewdefs' ,
        						MB_WIRELESSBASICSEARCH => 'wireless.searchdefs' ,
        						MB_WIRELESSADVANCEDSEARCH => 'wireless.searchdefs' ,
        						) ;

        switch ( $type)
        {
            case MB_HISTORYMETADATALOCATION :
                return 'custom/history/modulebuilder/packages/' . $packageName . '/modules/' . $moduleName . '/metadata/' . $filenames [ $view ] . '.php' ;
            default :
                // get the module again, all so we can call this method statically without relying on the module stored in the class variables
                $mb = new ModuleBuilder ( ) ;
                $module = & $mb->getPackageModule ( $packageName, $moduleName ) ;
                return $module->getModuleDir () . '/metadata/' . $filenames [ $view ] . '.php' ;
        }

    }
    
    public function getModuleDir(){
		return $this->module->key_name;
	}
}
?>

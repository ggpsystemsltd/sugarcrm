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
 * Changes to AbstractSubpanelImplementation for DeployedSubpanels
 * The main differences are in the load and save of the definitions
 * For subpanels we must make use of the SubPanelDefinitions class to do this; this also means that the history mechanism,
 * which tracks files, not objects, needs us to create an intermediate file representation of the definition that it can manage and restore
 */

require_once 'modules/ModuleBuilder/parsers/views/MetaDataImplementationInterface.php' ;
require_once 'modules/ModuleBuilder/parsers/views/AbstractMetaDataImplementation.php' ;
require_once 'modules/ModuleBuilder/parsers/constants.php' ;

class DeployedSubpanelImplementation extends AbstractMetaDataImplementation implements MetaDataImplementationInterface
{

    const HISTORYFILENAME = 'restored.php' ;
    const HISTORYVARIABLENAME = 'layout_defs' ;

    private $_subpanelName ;
    private $_aSubPanelObject ; // an aSubPanel Object representing the current subpanel


    /*
     * Constructor
     * @param string subpanelName   The name of this subpanel
     * @param string moduleName     The name of the module to which this subpanel belongs
     */
    function __construct ($subpanelName , $moduleName)
    {
        $GLOBALS [ 'log' ]->debug ( get_class ( $this ) . "->__construct($subpanelName , $moduleName)" ) ;
        $this->_subpanelName = $subpanelName ;
        $this->_moduleName = $moduleName ;

        // BEGIN ASSERTIONS
        if (! isset ( $GLOBALS [ 'beanList' ] [ $moduleName ] ))
        {
            sugar_die ( get_class ( $this ) . ": Modulename $moduleName is not a Deployed Module" ) ;
        }
        // END ASSERTIONS

        $this->historyPathname = 'custom/history/modules/' . $moduleName . '/subpanels/' . $subpanelName . '/' . self::HISTORYFILENAME ;
        $this->_history = new History ( $this->historyPathname ) ;

        $module = get_module_info ( $moduleName ) ;

        require_once ('include/SubPanel/SubPanelDefinitions.php') ;
        // retrieve the definitions for all the available subpanels for this module from the subpanel
        $spd = new SubPanelDefinitions ( $module ) ;

        // Get the lists of fields already in the subpanel and those that can be added in
        // Get the fields lists from an aSubPanel object describing this subpanel from the SubPanelDefinitions object
        $this->_viewdefs = array ( ) ;
        $this->_fielddefs = array ( ) ;
        $this->_language = '' ;    
        if (! empty ( $spd->layout_defs ))
            if (array_key_exists ( strtolower ( $subpanelName ), $spd->layout_defs [ 'subpanel_setup' ] ))
            {
                //First load the original defs from the module folder
                $originalSubpanel = $spd->load_subpanel( $subpanelName , false, true);
                $this->_fullFielddefs = $originalSubpanel->get_list_fields ();
                $this->_mergeFielddefs ( $this->_fielddefs , $this->_fullFielddefs ) ;
                
                $this->_aSubPanelObject = $spd->load_subpanel ( $subpanelName ) ;
                // now check if there is a restored subpanel in the history area - if there is, then go ahead and use it
                if (file_exists ( $this->historyPathname ))
                {
                    // load in the subpanelDefOverride from the history file
                    $GLOBALS [ 'log' ]->debug ( get_class ( $this ) . ": loading from history" ) ;
                    require $this->historyPathname ;
                    $this->_viewdefs = $layout_defs;
                } else
                {
                    $this->_viewdefs = $this->_aSubPanelObject->get_list_fields () ;
                }

                // don't attempt to access the template_instance property if our subpanel represents a collection, as it won't be there - the sub-sub-panels get this value instead
                if ( ! $this->_aSubPanelObject->isCollection() )
                    $this->_language = $this->_aSubPanelObject->template_instance->module_dir ;

                // Retrieve a copy of the bean for the parent module of this subpanel - so we can find additional fields for the layout
                $subPanelParentModuleName = $this->_aSubPanelObject->get_module_name () ;
                $beanListLower = array_change_key_case ( $GLOBALS [ 'beanList' ] ) ;
                if (! empty ( $subPanelParentModuleName ) && isset ( $beanListLower [ strtolower ( $subPanelParentModuleName ) ] ))
                {
                    $subPanelParentModule = get_module_info ( $subPanelParentModuleName ) ;

                    // Run through the preliminary list, keeping only those fields that are valid to include in a layout
                    foreach ( $subPanelParentModule->field_defs as $key => $def )
                    {
                        $key = strtolower ( $key ) ;

                        if (AbstractMetaDataParser::validField( $def ))
                        {
                        	if ( ! isset ( $def [ 'label' ] ) )
                        		$def [ 'label' ] = $def [ 'name' ] ;
                            $this->_fielddefs [ $key ] = $def ;
                        }
                    }
                }
                
                $this->_mergeFielddefs ( $this->_fielddefs , $this->_viewdefs ) ;
            }

    }

    function getLanguage ()
    {
        return $this->_language ;
    }

    /*
     * Save a definition that will be used to display a subpanel for $this->_moduleName
     * @param array defs    Layout definition in the same format as received by the constructor
     */
    function deploy ($defs)
    {
        // first sort out the historical record...
        write_array_to_file ( self::HISTORYVARIABLENAME, $this->_viewdefs, $this->historyPathname, 'w', '' ) ;
        $this->_history->append ( $this->historyPathname ) ;

        $this->_viewdefs = $defs ;

        require_once 'include/SubPanel/SubPanel.php' ;
        $subpanel = new SubPanel ( $this->_moduleName, 'fab4', $this->_subpanelName , $this->_aSubPanelObject ) ;

        $subpanel->saveSubPanelDefOverride ( $this->_aSubPanelObject, 'list_fields', $defs ) ;
        // now clear the cache so that the results are immediately visible
        include_once ('include/TemplateHandler/TemplateHandler.php') ;
        TemplateHandler::clearCache ( $this->_moduleName ) ;

    }

}
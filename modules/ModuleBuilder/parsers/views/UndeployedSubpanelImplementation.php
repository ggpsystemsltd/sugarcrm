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

class UndeployedSubpanelImplementation extends AbstractMetaDataImplementation implements MetaDataImplementationInterface
{

    const HISTORYFILENAME = 'restored.php' ;
    const HISTORYVARIABLENAME = 'layout_defs' ;

    /*
     * Constructor
     * @param string subpanelName   The name of this subpanel
     * @param string moduleName     The name of the module to which this subpanel belongs
     * @param string packageName    If not empty, the name of the package to which this subpanel belongs
     */
    function __construct ($subpanelName , $moduleName , $packageName)
    {
        $this->_subpanelName = $subpanelName ;
        $this->_moduleName = $moduleName ;

        // TODO: history
        $this->historyPathname = 'custom/history/modulebuilder/packages/' . $packageName . '/modules/' . $moduleName . '/metadata/' . self::HISTORYFILENAME ;
        $this->_history = new History ( $this->historyPathname ) ;

        //get the bean from ModuleBuilder
        $mb = new ModuleBuilder ( ) ;
        $this->module = & $mb->getPackageModule ( $packageName, $moduleName ) ;
        $this->module->mbvardefs->updateVardefs () ;
        $this->_fielddefs = & $this->module->mbvardefs->vardefs [ 'fields' ] ;

        $subpanel_layout = $this->module->getAvailibleSubpanelDef ( $this->_subpanelName ) ;
        $this->_viewdefs = & $subpanel_layout [ 'list_fields' ] ;
        $this->_mergeFielddefs($this->_fielddefs, $this->_viewdefs);
        
        // Set the global mod_strings directly as Sugar does not automatically load the language files for undeployed modules (how could it?)
        $selected_lang = 'en_us';
        if(isset($GLOBALS['current_language']) &&!empty($GLOBALS['current_language'])) {
            $selected_lang = $GLOBALS['current_language'];
        }
        $GLOBALS [ 'mod_strings' ] = array_merge ( $GLOBALS [ 'mod_strings' ], $this->module->getModStrings ($selected_lang) ) ;
    }

    function getLanguage ()
    {
        return "" ; // '' is the signal to translate() to use the global mod_strings
    }

    /*
     * Save a subpanel
     * @param array defs    Layout definition in the same format as received by the constructor
     * @param string type   The location for the file - for example, MB_BASEMETADATALOCATION for a location in the OOB metadata directory
     */
    function deploy ($defs)
    {
        $outputDefs = $this->module->getAvailibleSubpanelDef ( $this->_subpanelName ) ;
        // first sort out the historical record...
        // copy the definition to a temporary file then let the history object add it
        write_array_to_file ( self::HISTORYVARIABLENAME, $outputDefs, $this->historyPathname, 'w', '' ) ;
        $this->_history->append ( $this->historyPathname ) ;
        // no need to unlink the temporary file as being handled by in history->append()
        //unlink ( $this->historyPathname ) ;

        $outputDefs [ 'list_fields' ] = $defs ;
        $this->_viewdefs = $defs ;
        $this->module->saveAvailibleSubpanelDef ( $this->_subpanelName, $outputDefs ) ;

    }

}
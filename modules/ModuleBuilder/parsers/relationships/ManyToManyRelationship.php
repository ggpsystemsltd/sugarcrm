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


require_once 'modules/ModuleBuilder/parsers/relationships/AbstractRelationship.php' ;

/*
 * Class to manage the metadata for a Many-To-Many Relationship
 * The LHS (One) module will receive a new subpanel for the RHS module
 * The RHS (Many) module will receive a new subpanel for the RHS module
 * The subpanels get their data ('get_subpanel_data') from two link fields (one each) that reference a new Relationship
 * 
 * In OOB modules it's done the same way (e.g. cases_bugs)
 */

class ManyToManyRelationship extends AbstractRelationship
{

    /*
     * Constructor
     * @param array $definition Parameters passed in as array with keys defined in parent::keys
     */
    function __construct ($definition)
    {
        parent::__construct ( $definition ) ;
    }
  
    /*
     * BUILD methods called during the build
     */
    
    /*
     * Construct subpanel definitions
     * The format is that of TO_MODULE => relationship, FROM_MODULE, FROM_MODULES_SUBPANEL, mimicking the format in the layoutdefs.php
     * @return array    An array of subpanel definitions, keyed by module
     */
    function buildSubpanelDefinitions ()
    {        
        $subpanelDefinitions = array ( ) ;
        if (!$this->relationship_only)
        {
            $subpanelDefinitions [ $this->rhs_module ] = $this->getSubpanelDefinition ( $this->relationship_name, $this->lhs_module, $this->lhs_subpanel, $this->getLeftModuleSystemLabel() ) ;
            $subpanelDefinitions [ $this->lhs_module ] = $this->getSubpanelDefinition ( $this->relationship_name, $this->rhs_module, $this->rhs_subpanel, $this->getRightModuleSystemLabel() ) ;
        }
        return $subpanelDefinitions ;
    }

    function buildWirelessSubpanelDefinitions ()
    {

        $subpanelDefinitions = array ( ) ;
        if (!$this->relationship_only)
        {
            $subpanelDefinitions [ $this->rhs_module ] = $this->getWirelessSubpanelDefinition($this->relationship_name, $this->lhs_module, $this->lhs_subpanel, $this->getLeftModuleSystemLabel() ) ;
            $subpanelDefinitions [ $this->lhs_module ] = $this->getWirelessSubpanelDefinition($this->relationship_name, $this->rhs_module, $this->rhs_subpanel, $this->getRightModuleSystemLabel() ) ;
        }
        return $subpanelDefinitions ;
    }

    /*
     * @return array    An array of field definitions, ready for the vardefs, keyed by module
     */
    function buildVardefs ( )
    {
        $vardefs = array ( ) ;
        $vardefs [ $this->rhs_module ] [] = $this->getLinkFieldDefinition ( $this->lhs_module, $this->relationship_name, false, 
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getLeftModuleSystemLabel() ) . '_TITLE' ) ;
        $vardefs [ $this->lhs_module ] [] = $this->getLinkFieldDefinition ( $this->rhs_module, $this->relationship_name, false, 
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getRightModuleSystemLabel()  ) . '_TITLE' ) ;
        return $vardefs ;
    }
    
    /*
     * @return array    An array of relationship metadata definitions
     */
    function buildRelationshipMetaData ()
    {
        return array( $this->lhs_module => $this->getRelationshipMetaData ( MB_MANYTOMANY ) ) ;
    }
    



}

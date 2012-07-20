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
 * Class to manage the metadata for a One-To-One Relationship
 * The LHS module will receive a new relate field to point back to the RHS
 * The RHS module will receive a new relate field to point back to the LHS
 * 
 * OOB modules implement One-To-One relationships as:
 * A Relationship of type one-to-one in one modules vardefs.php
 * A single link field in the same vardefs.php with 'relationship'= the relationship name, and 'link-type'='one', 'Module'=other side, and 'source'='non-db'
 * These are not common - examples are in InboundEmail and Schedulers, both pre-5.0 modules
 * InboundEmail:
 *      'created_by_link' => array (
            'name' => 'created_by_link',
            'type' => 'link',
            'relationship' => 'inbound_email_created_by',
            'vname' => 'LBL_CREATED_BY_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
        ),

 */

class OneToOneRelationship extends AbstractRelationship
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
     * @return array    An array of relationship metadata definitions
     */
    function buildRelationshipMetaData ()
    {
        return array( $this->lhs_module => $this->getRelationshipMetaData ( MB_ONETOONE ) ) ;
    }

    /* Build a set of Link Field definitions for this relationship
     * @return array    An array of field definitions, ready for the vardefs, keyed by module
     */
    function buildVardefs ( )
    {
        $vardefs = array ( ) ;
        $vardefs [ $this->rhs_module ] [] = $this->getLinkFieldDefinition ( $this->lhs_module, $this->relationship_name , false, 
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getLeftModuleSystemLabel() ) . '_TITLE' ,
            $this->relationship_only ? false : $this->getIDName( $this->lhs_module )
        ) ;
        $vardefs [ $this->lhs_module ] [] = $this->getLinkFieldDefinition ( $this->rhs_module, $this->relationship_name, false, 
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getRightModuleSystemLabel()   ) . '_TITLE'  ,
            $this->relationship_only ? false : $this->getIDName( $this->rhs_module )
        ) ;
        
        if (!$this->relationship_only)
        {
            $vardefs [ $this->lhs_module ] [] = $this->getRelateFieldDefinition ( $this->rhs_module, $this->relationship_name, $this->getRightModuleSystemLabel() ) ;
            $vardefs [ $this->rhs_module ] [] = $this->getRelateFieldDefinition ( $this->lhs_module, $this->relationship_name, $this->getLeftModuleSystemLabel() ) ;
            $vardefs [ $this->lhs_module ] [] = $this->getLink2FieldDefinition ( $this->rhs_module, $this->relationship_name , false, 
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getRightModuleSystemLabel()   ) . '_TITLE' ) ;
            $vardefs [ $this->rhs_module ] [] = $this->getLink2FieldDefinition ( $this->lhs_module, $this->relationship_name , false, 
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getLeftModuleSystemLabel() ) . '_TITLE' ) ;
        }
        
        return $vardefs ;
    }

    /*
     * Define what fields to add to which modules layouts
     * @return array    An array of module => fieldname
     */
    function buildFieldsToLayouts ()
    {
        if ($this->relationship_only)
            return array () ;
 
        if ($this->lhs_module == $this->rhs_module) // don't add in two fields on recursive relationships
            return array ( $this->lhs_module => $this->getValidDBName($this->relationship_name . "_name") );
        else
            return array (
                $this->lhs_module => $this->getValidDBName($this->relationship_name . "_name") ,
                $this->rhs_module => $this->getValidDBName($this->relationship_name . "_name")
            ) ;
    }

}

?>
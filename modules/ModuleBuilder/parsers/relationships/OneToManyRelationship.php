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
 * Class to manage the metadata for a One-To-Many Relationship
 * The One-To-Many relationships created by this class are a combination of a subpanel and a custom relate field
 * The LHS (One) module will receive a new subpanel for the RHS module. The subpanel gets its data ('get_subpanel_data') from a link field that references a new Relationship
 * The RHS (Many) module will receive a new relate field to point back to the LHS
 * 
 * OOB modules implement One-To-Many relationships as:
 * 
 * On the LHS (One) side:
 * A Relationship of type one-to-many in the rhs modules vardefs.php
 * A link field in the same vardefs.php with 'relationship'= the relationship name and 'source'='non-db'
 * A subpanel which gets its data (get_subpanel_data) from the link field
 * 
 * On the RHS (Many) side:
 * A Relate field in the vardefs, formatted as in this example, which references a link field:
 * 'name' => 'account_name',
 * 'rname' => 'name',
 * 'id_name' => 'account_id',
 * 'vname' => 'LBL_ACCOUNT_NAME',
 * 'join_name'=>'accounts',
 * 'type' => 'relate',
 * 'link' => 'accounts',
 * 'table' => 'accounts',
 * 'module' => 'Accounts',
 * 'source' => 'non-db'
 * A link field which references the shared Relationship
 */

class OneToManyRelationship extends AbstractRelationship
{

    /*
     * Constructor
     * @param array $definition Parameters passed in as array defined in parent::$definitionKeys
     * The lhs_module value is for the One side; the rhs_module value is for the Many
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
     * @return array    An array of subpanel definitions, keyed by the module
     */
    function buildSubpanelDefinitions ()
    {        
        if ($this->relationship_only)
            return array () ;
        
        $source = "";
        if ($this->rhs_module == $this->lhs_module)
        {
        	$source = $this->getJoinKeyLHS();
        }
 
        return array( 
        	$this->lhs_module => $this->getSubpanelDefinition ( 
        		$this->relationship_name, $this->rhs_module, $this->rhs_subpanel , $this->getRightModuleSystemLabel() , $source
        	) 
        );
    }

    function buildWirelessSubpanelDefinitions ()
    {
        if ($this->relationship_only)
            return array () ;

        $source = "";
        if ($this->rhs_module == $this->lhs_module)
        {
        	$source = $this->getJoinKeyLHS();
        }

        return array(
        	$this->lhs_module => $this->getWirelessSubpanelDefinition (
        		$this->relationship_name, $this->rhs_module, $this->rhs_subpanel , $this->getRightModuleSystemLabel() , $source
        	)
        );
    }

    /*
     * @return array    An array of field definitions, ready for the vardefs, keyed by module
     */
	function buildVardefs ( )
    {
        $vardefs = array ( ) ;
        
        $vardefs [ $this->rhs_module ] [] = $this->getLinkFieldDefinition ( $this->lhs_module, $this->relationship_name, false,
            'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getLeftModuleSystemLabel() ) . '_TITLE',
            $this->relationship_only ? false : $this->getIDName( $this->lhs_module )
        ) ;
        if ($this->rhs_module != $this->lhs_module )
        {
        	$vardefs [ $this->lhs_module ] [] = $this->getLinkFieldDefinition ( $this->rhs_module, $this->relationship_name, true,
                'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getRightModuleSystemLabel()  ) . '_TITLE');
        }
        if (! $this->relationship_only)
        {
            $vardefs [ $this->rhs_module ] [] = $this->getRelateFieldDefinition ( $this->lhs_module, $this->relationship_name, $this->getLeftModuleSystemLabel() ) ;
            $vardefs [ $this->rhs_module ] [] = $this->getLink2FieldDefinition ( $this->lhs_module, $this->relationship_name, true,
                'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getRightModuleSystemLabel()  ) . '_TITLE');
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
 
        return array( $this->rhs_module =>$this->getValidDBName($this->relationship_name . "_name")); // this must match the name of the relate field from buildVardefs
    }
       
    /*
     * @return array    An array of relationship metadata definitions
     */
    function buildRelationshipMetaData ()
    {
        return array( $this->lhs_module => $this->getRelationshipMetaData ( MB_ONETOMANY ) ) ;
    }

}
?>
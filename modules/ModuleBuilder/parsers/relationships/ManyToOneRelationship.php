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
require_once 'modules/ModuleBuilder/parsers/relationships/OneToManyRelationship.php' ;
require_once 'modules/ModuleBuilder/parsers/constants.php' ;

/*
 * Class to manage the metadata for a many-To-one Relationship
 * Exactly the same as a one-to-many relationship except lhs and rhs modules have been reversed.
 */

class ManyToOneRelationship extends AbstractRelationship
{
	

    /*
     * Constructor
     * @param array $definition Parameters passed in as array defined in parent::$definitionKeys
     * The lhs_module value is for the One side; the rhs_module value is for the Many
     */
    function __construct ($definition) 
    {
        
    	parent::__construct ( $definition ) ;
    	$onetomanyDef = array_merge($definition, array(
	        'rhs_label'    => isset($definition['lhs_label'])    ? $definition['lhs_label']    : null,
	        'lhs_label'    => isset($definition['rhs_label'])    ? $definition['rhs_label']    : null,
	        'lhs_subpanel' => isset($definition['rhs_subpanel']) ? $definition['rhs_subpanel'] : null,
	        'rhs_subpanel' => isset($definition['lhs_subpanel']) ? $definition['lhs_subpanel'] : null,
	        'lhs_module'   => isset($definition['rhs_module'])   ? $definition['rhs_module']   : null,
	        'lhs_table'    => isset($definition['rhs_table'])    ? $definition['rhs_table']    : null,
	        'lhs_key'      => isset($definition['rhs_key'])      ? $definition['rhs_key']      : null,
	        'rhs_module'   => isset($definition['lhs_module'])   ? $definition['lhs_module']   : null,
	        'rhs_table'    => isset($definition['lhs_table'])    ? $definition['lhs_table']    : null,
	        'rhs_key'      => isset($definition['lhs_key'])      ? $definition['lhs_key']      : null,
	        'join_key_lhs' => isset($definition['join_key_rhs']) ? $definition['join_key_rhs'] : null,
	        'join_key_rhs' => isset($definition['join_key_lhs']) ? $definition['join_key_lhs'] : null,
	        'relationship_type' => MB_ONETOMANY,
        ));
        $this->one_to_many = new OneToManyRelationship($onetomanyDef);
    }

    /*
     * BUILD methods called during the build
     */
	
	function buildLabels ()
    {
        return $this->one_to_many->buildLabels();
    }
    
    /*
     * Construct subpanel definitions
     * The format is that of TO_MODULE => relationship, FROM_MODULE, FROM_MODULES_SUBPANEL, mimicking the format in the layoutdefs.php
     * @return array    An array of subpanel definitions, keyed by the module
     */
    function buildSubpanelDefinitions ()
    {        
        return $this->one_to_many->buildSubpanelDefinitions();
    }

    function buildWirelessSubpanelDefinitions ()
    {
        return $this->one_to_many->buildWirelessSubpanelDefinitions();
    }

    /*
     * @return array    An array of field definitions, ready for the vardefs, keyed by module
     */
    function buildVardefs ( )
    {
       return $this->one_to_many->buildVardefs();
    }
    
    /*
     * Define what fields to add to which modules layouts
     * @return array    An array of module => fieldname
     */
    function buildFieldsToLayouts ()
    {
        if ($this->relationship_only)
            return array () ;
 
        return array( $this->lhs_module => $this->getValidDBName($this->relationship_name . "_name") ) ; // this must match the name of the relate field from buildVardefs
    }
       
    /*
     * @return array    An array of relationship metadata definitions
     */
    function buildRelationshipMetaData ()
    {
        return $this->one_to_many->buildRelationshipMetaData();
    }
    
    public function setName ($relationshipName)
    {
        parent::setName($relationshipName);
    	$this->one_to_many->setname($relationshipName);
    }
    
    public function setReadonly ()
    {
        parent::setReadonly();
    	$this->one_to_many->setReadonly();
    }
    
    public function delete ()
    {
        parent::delete();
    	$this->one_to_many->delete();
    }
    
    public function setRelationship_only ()
    {
        parent::setRelationship_only();
        $this->one_to_many->setRelationship_only();
    }
}
?>
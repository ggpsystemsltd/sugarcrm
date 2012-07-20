<?php

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


require_once 'modules/ModuleBuilder/parsers/relationships/UndeployedRelationships.php' ;
require_once 'modules/ModuleBuilder/parsers/relationships/AbstractRelationships.php' ;
require_once 'modules/ModuleBuilder/parsers/relationships/AbstractRelationship.php' ;
require_once 'modules/ModuleBuilder/parsers/relationships/ManyToManyRelationship.php' ;

/*
 * This is an Adapter for the new UndeployedRelationships Class to allow ModuleBuilder to use the new class without change
 * As ModuleBuilder is updated, references to this MBRelationship class should be replaced by direct references to UndeployedRelationships
 */

class MBRelationship
{
    
    public $relatableModules = array ( ) ; // required by MBModule
    public $relationships = array ( ) ; // required by view.relationships.php; must be kept in sync with the implementation

    
    /*
     * Constructor
     * @param string $name      The name of this module (not used)
     * @param string $path      The base path of the module directory within the ModuleBuilder package directory
     * @param string $key_name  The Fully Qualified Name for this module - that is, $packageName_$name
     */
    function MBRelationship ($name , $path , $key_name)
    {
        $this->implementation = new UndeployedRelationships ( $path ) ;
        $this->moduleName = $key_name ;
        $this->path = $path ;
        $this->updateRelationshipVariable();
    }

    function findRelatableModules ()
    {
        // do not call findRelatableModules in the constructor as it leads to an infinite loop if the implementation calls getPackage() which loads the packages which loads the module which findsRelatableModules which...
        $this->relatableModules = $this->implementation->findRelatableModules () ;
    }

    /*
     * Originally in 5.0 this method expected $_POST variables keyed in the "old" format - lhs_module, relate, msub, rsub etc
     * At 5.1 this has been changed to the "new" format of lhs_module, rhs_module, lhs_subpanel, rhs_subpanel, label
     * @return AbstractRelationship
     */
    function addFromPost ()
    {
        return $this->implementation->addFromPost () ;
    }

    /*
     * New function to replace the old MBModule subpanel property - now we obtain the 'subpanels' (actually related modules) from the relationships object
     */
    function getRelationshipList ()
    {
        return $this->implementation->getRelationshipList () ;
    }

    function get ($relationshipName)
    {
        return $this->implementation->get ( $relationshipName ) ;
    }

    /*
     * Deprecated
     * Add a relationship to this set
     * Original MBRelationships could only support one relationship between this module and any other
     */
    /*    
    function addRelationship ($name , $relatedTo , $relatedSubpanel = 'default' , $mysubpanel = 'default' , $type)
    {
        $this->implementation->add ( new ManyToManyRelationship ( $name, $this->moduleName, $relatedTo, $mysubpanel, $relatedSubpanel ) ) ;
        $this->updateRelationshipVariable () ;
    }
*/
    
    /* Add a relationship to this set
     * Original MBRelationships could only support one relationship between this module and any other
     * @param array $rel    Relationship definition in the old format (defined by self::oldFormatKeys)
     */
    function add ($rel)
    {
        // convert old format definition to new format
        if (! isset ( $rel [ 'lhs_module' ] ))
            $rel [ 'lhs_module' ] = $this->moduleName ;
        $definition = AbstractRelationships::convertFromOldFormat ( $rel ) ;
        if (! isset ( $definition ['relationship_type']))
            $definition ['relationship_type'] = 'many-to-many';
        // get relationship object from RelationshipFactory
        $relationship = RelationshipFactory::newRelationship ( $definition ) ;
        // add relationship to the set of relationships
        $this->implementation->add ( $relationship ) ;
        $this->updateRelationshipVariable () ;
        return $relationship;
    }

    function delete ($name)
    {
        $this->implementation->delete ( $name ) ;
        $this->updateRelationshipVariable () ;
    }

    function save ()
    {
        $this->implementation->save () ;
    }

    function build ($path)
    {
        $this->implementation->build () ;
    }

    function addInstallDefs (&$installDef)
    {
        $this->implementation->addInstallDefs ( $installDef ) ;
    }

    /*
    function load ()
    {
        $this->implementation->load () ;
        $this->updateRelationshipVariable () ;
    }
*/
    /*
     * Transitional function to keep the public relationship variable in sync with the implementation master copy
     * We have to do this as various things refer directly to MBRelationship->relationships...
     */
    
    private function updateRelationshipVariable ()
    {
        foreach ( $this->implementation->getRelationshipList () as $relationshipName )
        {
            $rel = $this->implementation->getOldFormat ( $relationshipName ) ;
            $this->relationships [ $relationshipName ] = $rel ;
        }
    }

}

?>
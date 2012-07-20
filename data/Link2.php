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

* Description:  Represents a relationship from a single beans perspective.
* Does not activly do work but is used by sugarbean to manipulate relationships.
* Work is defered to the relationship classes.
 *
* Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
* All Rights Reserved.
* Contributor(s): ______________________________________..
********************************************************************************/
global $dictionary;
require_once("data/Relationships/RelationshipFactory.php");

/**
 * Represents a relationship from a single beans perspective.
 * @api
 */
class Link2 {

    protected $relationship; //relationship object this link is tied to.
    protected $focus;  //SugarBean this link uses as the context for its calls.
    protected $def;  //Field def for this link
    protected $name;  //Field name for this link
    protected $beans;  //beans on the other side of the link
    protected $rows;   //any additional fields on the relationship
    protected $loaded; //true if this link has been loaded from the database
    protected $relationship_fields = array();
    //Used to store unsaved beans on this relationship that will be combined with the ones pulled from the DB if getBeans() is called.
    protected $tempBeans = array();

    /**
     * @param  $linkName String name of a link field in the module's vardefs
     * @param  $bean SugarBean focus bean for this link (one half of a relationship)
     * @param  $linkDef Array Optional vardef for the link in case it can't be found in the passed in bean for the global dictionary
     * @return void
     *
     */
    function __construct($linkName, $bean, $linkDef = false){
        $this->focus = $bean;
        //Try to load the link vardef from the beans field defs. Otherwise start searching
        if (empty($bean->field_defs) || empty($bean->field_defs[$linkName]) || empty($bean->field_defs[$linkName]['relationship']))
        {
            if (empty($linkDef))
            {
                //Assume $linkName is really relationship_name, and find the link name with the vardef manager
                $this->def = VardefManager::getLinkFieldForRelationship($bean->module_dir, $bean->object_name, $linkName);
            }
            else {
                $this->def = $linkDef;
            }
            //Check if multiple links were found for a given relationship
            if (is_array($this->def) && !isset($this->def['name']))
            {
                //More than one link found, we need to figure out if we are currently on the LHS or RHS
                //default to lhs for now
                if (isset($this->def[0]['side']) && $this->def[0]['side'] == 'left')
                {
                    $this->def = $this->def[0];
                }
                else if (isset($this->def[1]['side']) && $this->def[1]['side'] == 'left')
                {
                    $this->def = $this->def[1];
                }
                else {
                    $this->def = $this->def[0];
                }
            }
            if (empty($this->def['name']))
            {
                $GLOBALS['log']->fatal("failed to find link for $linkName");
                return false;
            }

            $this->name = $this->def['name'];
        }
        else {
            //Linkdef was found in the bean (this is the normal expectation)
            $this->def = $bean->field_defs[$linkName];
            $this->name = $linkName;
        }
        //Instantiate the relationship for this link.
        $this->relationship = SugarRelationshipFactory::getInstance()->getRelationship($this->def['relationship']);

        // Fix to restore functionality from Link.php that needs to be rewritten but for now this will do.
        $this->relationship_fields = (!empty($this->def['rel_fields']))?$this->def['rel_fields']: array();

        if (!$this->loadedSuccesfully())
        {
            $GLOBALS['log']->fatal("{$this->name} for {$this->def['relationship']} failed to load\n");
        }
        //Following behavior is tied to a property(ignore_role) value in the vardef. It alters the values of 2 properties, ignore_role_filter and add_distinct.
        //the property values can be altered again before any requests are made.
        if (!empty($this->def) && is_array($this->def)) {
            if (array_key_exists('ignore_role', $this->def)) {
                if ($this->def['ignore_role']) {
                    $this->ignore_role_filter=true;
                    $this->add_distinct=true;
                }
            }
        }
    }

    /**
     * Returns false if no relationship was found for this link
     * @return bool
     */
    public function loadedSuccesfully()
    {
        return !empty($this->relationship);
    }

    /**
     *  Forces the link to load the relationship rows.
     * Will be called internally when the $rows property is accessed or get() is called
     * @return void
     */
    public function load()
    {
        $data = $this->relationship->load($this);
        $this->rows = $data['rows'];
        $this->beans = null;
        $this->loaded = true;
    }

    /**
     * @return array ids of records related through this link
     */
    public function get($role = false) {
        if (!$this->loaded)
            $this->load();

        return array_keys($this->rows);
    }

    /**
     * @deprecated
     *
     * @return string name of table for the relationship of this link
     */
    public function getRelatedTableName() {
        return BeanFactory::getBean($this->getRelatedModuleName())->table_name;
    }

    /**
     * @return string the name of the module on the other side of this link
     */
    public function getRelatedModuleName() {
        if (!$this->relationship) return false;

        if ($this->getSide() == REL_LHS) {
            return $this->relationship->getRHSModule();
        } else {
            return $this->relationship->getLHSModule();
        }
    }

    /**
     * @return string the name of the link field used on the other side of the rel
     */
    public function getRelatedModuleLinkName() {
        if (!$this->relationship) return false;

        if ($this->getSide() == REL_LHS) {
            return $this->relationship->getRHSLink();
        } else {
            return $this->relationship->getLHSLink();
        }
    }

    /**
     *
     * @return string "many" if multiple records can be related through this link
     * or "one" if at most, one record can be related.
     */
    public function getType()
    {
        switch ($this->relationship->type)
        {
            case REL_MANY_MANY:
                return "many";
            case REL_ONE_ONE:
                return "one";
            case REL_ONE_MANY:
                return $this->getSide() == REL_LHS ? "many" : "one";
        }
        return "many";
    }

    /**
     * @return SugarBean The parent Bean this link references
     */
    public function getFocus()
    {
        return $this->focus;
    }

    /**
     * @deprecated
     * @return list of fields that exist only on the relationship
     */
    public function getRelatedFields(){
        return $this->relationship_fields;
    }

    /**
     * @param $name
     * @return The value for the relationship field $name
     */
    public function getRelatedField($name){
        if (!empty($this->relationship_fields) && !empty($this->relationship_fields[$name]))
            return $this->relationship_fields[$name];
        else
            return null; //For now return null. Later try the relationship object directly.
    }

    /**
     * @return SugarRelationship the relationship object this link references
     */
    public function getRelationshipObject() {
       return $this->relationship;
    }

    /**
     * @return string "LHS" or "RHS" depending on the side of the relationship this link represents
     */
    public function getSide() {
        //First try the relationship
        if ($this->relationship->getLHSLink() == $this->name &&
            ($this->relationship->getLHSModule() == $this->focus->module_name)
        ){
            return REL_LHS;
        }

        if ($this->relationship->getRHSLink() == $this->name &&
            ($this->relationship->getRHSModule() == $this->focus->module_name)
        ){
            return REL_RHS;
        }

        //Next try the vardef
        if (!empty($this->def['side']))
        {
            if ((strtolower($this->def['side']) == 'left' || $this->def['side'] == REL_LHS)
                //Some relationships make have left in the vardef errorneously if generated by module builder
                && $this->name != $this->relationship->def['join_key_lhs'])
            {
                return REL_LHS ;
            }
            else {
                return REL_RHS;
            }
        }
        //Next try using the id_name and relationship join keys
        else if (!empty($this->def['id_name']))
        {
            if (isset($this->relationship->def['join_key_lhs']) && $this->def['id_name'] == $this->relationship->def['join_key_lhs'])
                return REL_RHS;
            else if (isset($this->relationship->def['join_key_rhs']) && $this->def['id_name'] == $this->relationship->def['join_key_rhs'])
                return REL_LHS;
        }

        $GLOBALS['log']->error("Unable to get proper side for link {$this->name}");
    }

    /**
     * @return bool true if LHSModule == RHSModule
     */
    protected function is_self_relationship() {
        return $this->relationship->isSelfReferencing();
    }

    /**
     * @return bool true if this link represents a relationship where the parent could be one of multiple modules. (ex. Activities parent)
     */
    public function isParentRelationship(){
        return $this->relationship->isParentRelationship();
    }

    /**
     * @param $params array of parameters. Possible parameters include:
     * 'join_table_link_alias': alias the relationship join table in the query (for M2M relationships),
     * 'join_table_alias': alias for the final table to be joined against (usually a module main table)
     * @param bool $return_array if true the query is returned as a array broken up into
     * select, join, where, type, rel_key, and joined_tables
     * @return string/array join query for this link
     */
    function getJoin($params, $return_array =false)
    {
        return $this->relationship->getJoin($this, $params, $return_array);
    }

    /**
     * @param array $params optional parameters. Possible Values;
     * 'return_as_array': returns the query broken into
     * @return String/Array query to grab just ids for this relationship
     */
    function getQuery($params = array())
    {
        return $this->relationship->getQuery($this, $params);
    }

    /**
     * This function is similair getJoin except for M2m relationships it won't join agaist the final table.
     * Its used to retrieve the ID of the related beans only
     * @param $params array of parameters. Possible parameters include:
     * 'return_as_array': returns the query broken into
     * @param bool $return_array same as passing 'return_as_array' into parameters
     * @return string/array query to use when joining for subpanels
     */
    public function getSubpanelQuery($params = array(), $return_array = false)
    {
        if (!empty($this->def['ignore_role']))
            $params['ignore_role'] = true;
        return $this->relationship->getSubpanelQuery($this, $params, $return_array);
    }

    /**
     * @return array of SugarBeans related through this link. Use with caution.
     */
    function getBeans() {
        if (!$this->loaded) {
            $this->load();
        }
        if(!is_array($this->beans))
        {
            $this->beans = array();
            $rel_module = $this->getRelatedModuleName();
            //First swap in the temp loaded beans
            $this->beans = $this->tempBeans;
            $this->tempBeans = array();
            //now load from the rows
            foreach ($this->rows as $id => $vals)
            {
                if (empty($this->beans[$id]))
                {
                    $tmpBean = BeanFactory::getBean($rel_module, $id);
                    if($tmpBean !== FALSE)
                        $this->beans[$id] = $tmpBean;
                }
            }
        }

        return $this->beans;
    }

    /**
     * @return bool true if this link has initialized its related beans.
     */
    public function beansAreLoaded() {
        return is_array($this->beans);
    }

    /**
     * use this function to create link between 2 objects
     * 1:1 will be treated like 1 to many.
     *
     * the function also allows for setting of values for additional field in the table being
     * updated to save the relationship, in case of many-to-many relationships this would be the join table.
     *
     * @param array $rel_keys array of ids or SugarBean objects. If you have the bean in memory, pass it in.
     * @param array $additional_values the values should be passed as key value pairs with column name as the key name and column value as key value.
     *
     * @return void
     */
    function add($rel_keys,$additional_values=array()) {
        if (!is_array($rel_keys))
            $rel_keys = array($rel_keys);

        foreach($rel_keys as $key)
        {
            //We must use beans for LogicHooks and other buisiness logic to fire correctly
            if (!($key instanceof SugarBean)) {
                $key = $this->getRelatedBean($key);
                if (!($key instanceof SugarBean)) {
                    $GLOBALS['log']->error("Unable to load related bean by id");
                    return false;
                }
            }

            if(empty($key->id) || empty($this->focus->id))
                return false;

            if ($this->getSide() == REL_LHS) {
                $this->relationship->add($this->focus, $key, $additional_values);
            }
            else {
                $this->relationship->add($key, $this->focus, $additional_values);
            }
        }
    }



    /**
     * Marks the relationship delted for this given record pair.
     * @param $id id of the Parent/Focus SugarBean
     * @param string $related_id id or SugarBean to unrelate. Pass a SugarBean if you have it.
     * @return void
     */
    function delete($id, $related_id='') {
        if (empty($this->focus->id))
            $this->focus = BeanFactory::getBean($this->focus->module_name, $id);
        if (!empty($related_id))
        {
            if (!($related_id instanceof SugarBean)) {
                $related_id = $this->getRelatedBean($related_id);
            }
            if ($this->getSide() == REL_LHS) {
                $this->relationship->remove($this->focus, $related_id);
            }
            else {
                $this->relationship->remove($related_id, $this->focus);
            }
        }
        else
        {
            $this->relationship->removeAll($this);
        }
    }

    /**
     * Returns a SugarBean with the given ID from the related module.
     * @param bool $id id of related record to retrieve
     * @return SugarBean
     */
    protected function getRelatedBean($id = false)
    {
        return BeanFactory::getBean($this->getRelatedModuleName(), $id);
    }

    public function &__get($name)
    {
        switch($name)
        {
            case "relationship_type":
                return $this->relationship->type;
            case "_relationship":
                return $this->relationship;
            case "beans":
                if (!is_array($this->beans))
                    $this->getBeans();
                return $this->beans;
            case "rows":
                if (!is_array($this->rows))
                    $this->load();
                return $this->rows;
        }
        return $this->$name;
    }

    public function __set($name, $val)
    {
        if($name == "beans")
            $this->beans = $val;

    }

    /**
     * Add a bean object to the list of beans currently loaded to this relationship.
     * This for the most part should not need to be called except by the relatipnship implementation classes.
     * @param SugarBean $bean
     * @return void
     */
    public function addBean($bean)
    {
        if (!is_array($this->beans))
        {
            $this->tempBeans[$bean->id] = $bean;
        }
        else {
            $this->beans[$bean->id] = $bean;
        }

    }

    /**
     * Remove a bean object from the list of beans currently loaded to this relationship.
     * This for the most part should not need to be called except by the relatipnship implementation classes.
     *
     * @param SugarBean $bean
     * @return void
     */
    public function removeBean($bean)
    {
        if (!is_array($this->beans) && isset($this->tempBeans[$bean->id]))
        {
            unset($this->tempBeans[$bean->id]);
        } else {
            unset($this->beans[$bean->id]);
            unset($this->rows[$bean->id]);
        }
    }


    /**
     * Directly queries the databse for set of values. The relationship classes and not link should handle this.
     * @deprecated
     * @param $table_name string relationship table
     * @param $join_key_values array of key=>values to identify this relationship by
     * @return bool true if the given join key set exists in the relationship table
     */
    public function relationship_exists($table_name, $join_key_values) {

        //find the key values for the table.
        $dup_keys=$this->_get_alternate_key_fields($table_name);
        if (empty($dup_keys)) {
            $GLOBALS['log']->debug("No alternate key define, skipping duplicate check..");
            return false;
        }

        $delimiter='';
        $this->_duplicate_where=' WHERE ';
        foreach ($dup_keys as $field) {
            //look for key in  $join_key_values, if found add to filter criteria else abort duplicate checking.
            if (isset($join_key_values[$field])) {

                $this->_duplicate_where .= $delimiter.' '.$field."='".$join_key_values[$field]."'";
                $delimiter='AND';
            } else {
                $GLOBALS['log']->error('Duplicate checking aborted, Please supply a value for this column '.$field);
                return false;
            }
        }
        //add deleted check.
        $this->_duplicate_where .= $delimiter.' deleted=0';

        $query='SELECT id FROM '.$table_name.$this->_duplicate_where;

        $GLOBALS['log']->debug("relationship_exists query(".$query.')');

        $result=$this->_db->query($query, true);
        $row = $this->_db->fetchByAssoc($result);

        if ($row == null) {
            return false;
        }
        else {
            $this->_duplicate_key=$row['id'];
            return true;
        }
    }

    //Below are functions not used directly and exist for backwards compatiblity with customizations, will be removed in a later version

    /* returns array of keys for duplicate checking, first check for an index of type alternate_key, if not found searches for
     * primary key.
     *
     */
    public function _get_alternate_key_fields($table_name) {
        $indices=Link::_get_link_table_definition($table_name,'indices');
        if (!empty($indices)) {
            foreach ($indices as $index) {
                if ( isset($index['type']) && $index['type'] == 'alternate_key' ) {
                    return $index['fields'];
                }
            }
        }
        //bug 32623, when the relationship is built in old version, there is no alternate_key. we have to use join_key_lhs and join_key_lhs.
        $relDef = $this->relationship->def;
        if (!empty($relDef['join_key_lhs']) && !empty($relDef['join_key_rhs']))
            return array($relDef['join_key_lhs'], $relDef['join_key_rhs']);
    }

    /**
     * @deprecated
     * Gets the vardef for the relationship of this link.
     */
    public function _get_link_table_definition($table_name, $def_name) {

        if (isset($this->relationship->def[$def_name]))
            return $this->relationship->def[$def_name];

        return null;
    }

    /**
     * @deprecated
     * Return the name of the role field for the passed many to many table.
     * if there is no role filed : return false
     * @param $table_name name of relationship table to inspect
     * @return bool|string
     */
    public function _get_link_table_role_field($table_name) {
        $varDefs = $this->_get_link_table_definition($table_name, 'fields');
        $role_field = false;
        if(!empty($varDefs)){
            $role_field = '';
            foreach($varDefs as $v){
                if(strpos($v['name'], '_role') !== false){
                    $role_field = $v['name'];
                }
            }
        }
        return $role_field;
    }

    /**
     * @deprecated
     *
     * @return boolean returns true if this link is LHS
     */
    public function _get_bean_position()
    {
        return $this->getSide() == REL_LHS;
    }
}

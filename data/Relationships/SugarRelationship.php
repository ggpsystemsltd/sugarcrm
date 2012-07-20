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


global $dictionary;
//Load all relationship metadata
include_once("modules/TableDictionary.php");
require_once("data/BeanFactory.php");


define('REL_LHS','LHS');
define('REL_RHS','RHS');
define('REL_BOTH','BOTH_SIDES');
define('REL_MANY_MANY', 'many-to-many');
define('REL_ONE_MANY', 'one-to-many');
define('REL_ONE_ONE', 'one-to-one');
/**
 * A relationship is between two modules.
 * It contains at least two links.
 * Each link represents a connection from one record to the records linked in this relationship.
 * Links have a context(focus) bean while relationships do not.
 * @api
 */
abstract class SugarRelationship
{
    protected $def;
    protected $lhsLink;
    protected $rhsLink;
    protected $ignore_role_filter = false;
    protected $self_referencing = false; //A relationship is self referencing when LHS module = RHS Module

    protected static $beansToResave = array();

    public abstract function add($lhs, $rhs, $additionalFields = array());

    /**
     * @abstract
     * @param  $lhs SugarBean
     * @param  $rhs SugarBean
     * @return void
     */
    public abstract function remove($lhs, $rhs);

    /**
     * @abstract
     * @param $link Link2 loads the rows for this relationship that match the given link
     * @return void
     */
    public abstract function load($link);

    /**
     * Gets the query to load a link.
     * This is currently public, but should prob be made protected later.
     * See Link2->getQuery
     * @abstract
     * @param  $link Link Object to get query for.
     * @return string|array query used to load this relationship
     */
    public abstract function getQuery($link, $params = array());

    /**
     * @abstract
     * @param Link2 $link
     * @return string|array the query to join against the related modules table for the given link.
     */
    public abstract function getJoin($link);

    /**
     * @abstract
     * @param SugarBean $lhs
     * @param SugarBean $rhs
     * @return bool
     */
    public abstract function relationship_exists($lhs, $rhs);

    /**
     * @abstract
     * @return string name of the table for this relationship
     */
    public abstract function getRelationshipTable();

    /**
     * @param  $link Link2 removes all the beans associated with this link from the relationship
     * @return void
     */
    public function removeAll($link)
    {
        $focus = $link->getFocus();
        $related = $link->getBeans();
        foreach($related as $relBean)
        {
            if (empty($relBean->id)) {
                continue;
            }

            if ($link->getSide() == REL_LHS)
                $this->remove($focus, $relBean);
            else
                $this->remove($relBean, $focus);
        }
    }

    /**
     * @param $rowID id of SugarBean to remove from the relationship
     * @return void
     */
    public function removeById($rowID){
        $this->removeRow(array("id" => $rowID));
    }

    /**
     * @return string name of right hand side module.
     */
    public function getRHSModule()
    {
        return $this->def['rhs_module'];
    }

    /**
     * @return string name of left hand side module.
     */
    public function getLHSModule()
    {
        return $this->def['lhs_module'];
    }

    /**
     * @return String left link in relationship.
     */
    public function getLHSLink()
    {
        return $this->lhsLink;
    }

    /**
     * @return String right link in relationship.
     */
    public function getRHSLink()
    {
        return $this->rhsLink;
    }

    /**
     * @return array names of fields stored on the relationship
     */
    public function getFields()
    {
        return isset($this->def['fields']) ? $this->def['fields'] : array();
    }

    /**
     * @param array $row values to be inserted into the relationship
     * @return bool|void null if new row was inserted and true if an exesting row was updated
     */
    protected function addRow($row)
    {
        $existing = $this->checkExisting($row);
        if (!empty($existing)) //Update the existing row, overriding the values with those passed in
            return $this->updateRow($existing['id'], array_merge($existing, $row));

        $values = array();
        foreach($this->getFields() as  $def)
        {
            $field = $def['name'];
            if (isset($row[$field]))
            {
                $values[$field] = "'{$row[$field]}'";
            }
        }
        $columns = implode(',', array_keys($values));
        $values = implode(',', $values);
        if (!empty($values))
        {
            $query = "INSERT INTO {$this->getRelationshipTable()} ($columns) VALUES ($values)";
            DBManagerFactory::getInstance()->query($query);
        }
    }

    /**
     * @param $id id of row to update
     * @param $values values to insert into row
     * @return resource result of update satatement
     */
    protected function updateRow($id, $values)
    {
        $newVals = array();
        //Unset the ID since we are using it to update the row
        if (isset($values['id'])) unset($values['id']);
        foreach($values as $field => $val)
        {
            $newVals[] = "$field='$val'";
        }

        $newVals = implode(",",$newVals);

        $query = "UPDATE {$this->getRelationshipTable()} set $newVals WHERE id='$id'";

        return DBManagerFactory::getInstance()->query($query);
    }

    /**
     * Removes one or more rows from the relationship table
     * @param $where array of field=>value pairs to match
     * @return bool|resource
     */
    protected function removeRow($where)
    {
        if (empty($where))
            return false;

        $date_modified = TimeDate::getInstance()->getNow()->asDb();
        $stringSets = array();
        foreach ($where as $field => $val)
        {
            $stringSets[] = "$field = '$val'";
        }
        $whereString = "WHERE " . implode(" AND ", $stringSets);

        $query = "UPDATE {$this->getRelationshipTable()} set deleted=1 , date_modified = '$date_modified' $whereString";

        return DBManagerFactory::getInstance()->query($query);

    }

    /**
     * Checks for an existing row who's keys match the one passed in.
     * @param  $row
     * @return array|bool returns false if now row is found, otherwise the row is returned
     */
    protected function checkExisting($row)
    {
        $leftIDName = $this->def['join_key_lhs'];
        $rightIDName = $this->def['join_key_rhs'];
        if (empty($row[$leftIDName]) ||  empty($row[$rightIDName]))
            return false;

        $leftID = $row[$leftIDName];
        $rightID = $row[$rightIDName];
        //Check the relationship role as well
        $roleCheck = $this->getRoleWhere();

        $query = "SELECT * FROM {$this->getRelationshipTable()} WHERE $leftIDName='$leftID' AND $rightIDName='$rightID' $roleCheck AND deleted=0";

        $db = DBManagerFactory::getInstance();
        $result = $db->query($query);
        $row = $db->fetchByAssoc($result);
        if (!empty($row))
        {
            return $row;
        } else{
            return false;
        }
    }

    /**
     * Gets the relationship role column check for the where clause
     * @param string $table
     * @return string
     */
    protected function getRoleWhere($table = "", $ignore_role_filter = false)
    {
        $ignore_role_filter = $ignore_role_filter || $this->ignore_role_filter;
        $roleCheck = "";
        if (empty ($table))
            $table = $this->getRelationshipTable();
        if (!empty($this->def['relationship_role_column']) && !empty($this->def["relationship_role_column_value"]) && !$ignore_role_filter )
        {
            if (empty($table))
                $roleCheck = " AND $this->relationship_role_column";
            else
                $roleCheck = " AND $table.{$this->relationship_role_column}";
            //role column value.
            if (empty($this->def['relationship_role_column_value']))
            {
                $roleCheck.=' IS NULL';
            } else {
                $roleCheck.= " = '$this->relationship_role_column_value'";
            }
        }
        return $roleCheck;
    }

    /**
     * @param SugarBean $focus base bean the hooks is triggered from
     * @param SugarBean $related bean being added/removed/updated from relationship
     * @param string $link_name name of link being triggerd
     * @return array base arguments to pass to relationship logic hooks
     */
    protected function getCustomLogicArguments($focus, $related, $link_name)
    {
        $custom_logic_arguments = array();
        $custom_logic_arguments['id'] = $focus->id;
        $custom_logic_arguments['related_id'] = $related->id;
        $custom_logic_arguments['module'] = $focus->module_dir;
        $custom_logic_arguments['related_module'] = $related->module_dir;
        $custom_logic_arguments['link'] = $link_name;
        $custom_logic_arguments['relationship'] = $this->name;

        return $custom_logic_arguments;
    }

    /**
     * Call the after add logic hook for a given link
     * @param  SugarBean $focus base bean the hooks is triggered from
     * @param  SugarBean $related bean being added/removed/updated from relationship
     * @param string $link_name name of link being triggerd
     * @return void
     */
    protected function callAfterAdd($focus, $related, $link_name="")
    {
        $custom_logic_arguments = $this->getCustomLogicArguments($focus, $related, $link_name);
        $focus->call_custom_logic('after_relationship_add', $custom_logic_arguments);
    }

    /**
     * @param  SugarBean $focus
     * @param  SugarBean $related
     * @param string $link_name
     * @return void
     */
    protected function callAfterDelete($focus, $related, $link_name="")
    {
        $custom_logic_arguments = $this->getCustomLogicArguments($focus, $related, $link_name);
        $focus->call_custom_logic('after_relationship_delete', $custom_logic_arguments);
    }

    /**
     * Adds a realted Bean to the list to be resaved along with the current bean.
     * @static
     * @param  SugarBean $bean
     * @return void
     */
    public static function addToResaveList($bean)
    {
        if (!isset(self::$beansToResave[$bean->module_dir]))
        {
            self::$beansToResave[$bean->module_dir] = array();
        }
        self::$beansToResave[$bean->module_dir][$bean->id] = $bean;
    }

    /**
     *
     * @static
     * @return void
     */
    public static function resaveRelatedBeans()
    {
        $GLOBALS['resavingRelatedBeans'] = true;

        //Resave any bean not currently in the middle of a save operation
        foreach(self::$beansToResave as $module => $beans)
        {
            foreach ($beans as $bean)
            {
                if (empty($bean->deleted) && empty($bean->in_save))
                {
                    $bean->save();
                }
            }
        }

        $GLOBALS['resavingRelatedBeans'] = false;

        //Reset the list of beans that will need to be resaved
        self::$beansToResave = array();
    }

    /**
     * @return bool true if the relationship is a flex / parent relationship
     */
    public function isParentRelationship()
    {
        //check role fields to see if this is a parent (flex relate) relationship
        if(!empty($this->def["relationship_role_column"]) && !empty($this->def["relationship_role_column_value"])
           && $this->def["relationship_role_column"] == "parent_type" && $this->def['rhs_key'] == "parent_id")
        {
            return true;
        }
        return false;
    }

    public function __get($name)
    {
        if (isset($this->def[$name]))
            return $this->def[$name];

        switch($name)
        {
            case "relationship_type":
                return $this->type;
            case 'relationship_name':
                return $this->name;
            case "lhs_module":
                return $this->getLHSModule();
            case "rhs_module":
                return $this->getRHSModule();
            case "lhs_table" :
                isset($this->def['lhs_table']) ? $this->def['lhs_table'] : "";
            case "rhs_table" :
                isset($this->def['rhs_table']) ? $this->def['rhs_table'] : "";
            case "list_fields":
                return array('lhs_table', 'lhs_key', 'rhs_module', 'rhs_table', 'rhs_key', 'relationship_type');
        }

        if (isset($this->$name))
            return $this->$name;

        return null;
    }
}
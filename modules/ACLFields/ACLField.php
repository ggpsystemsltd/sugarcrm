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


require_once('modules/ACLFields/actiondefs.php');
class ACLField  extends ACLAction{
    var $module_dir = 'ACLFields';
    var $object_name = 'ACLField';
    var $table_name = 'acl_fields';
    var $disable_custom_fields = true;
    var $new_schema = true;
    function ACLField(){
        parent::SugarBean();
        $this->disable_row_level_security =true;
    }

    /**
    * static addActions($category, $type='module')
    * Adds all default actions for a category/type
    *
    * @param STRING $category - the category (e.g module name - Accounts, Contacts)
    * @param STRING $type - the type (e.g. 'module', 'field')
    */


    function getAvailableFields($module, $object=false){
        static $exclude = array('deleted', 'assigned_user_id');
        static $modulesAvailableFields = array();
        if(!isset($modulesAvailableFields[$module])){
            if(empty($GLOBALS['dictionary'][$object]['fields'])){
                $class = $GLOBALS['beanList'][$module];
                require_once($GLOBALS['beanFiles'][$class]);
                $mod = new $class();
                if(!$mod->acl_fields)return array();
                $fieldDefs = $mod->field_defs;
            }else{
                $fieldDefs = $GLOBALS['dictionary'][$object]['fields'];
                if(isset($GLOBALS['dictionary'][$object]['acl_fields']) && $GLOBALS['dictionary'][$object]=== false){
                    return array();
                }
            }

            $availableFields = array();
            foreach($fieldDefs as $field=>$def){

                if((!empty($def['source'])&& $def['source']== 'custom_fields') ||!empty($def['group']) || (empty($def['hideacl']) &&!empty($def['type']) && !in_array($field, $exclude) &&
                    ((empty($def['source'])
                    && $def['type'] != 'id'
                    && (empty($def['dbType']) || ($def['dbType'] != 'id' ))
                    ) || !empty($def['link']) || $def['type'] == 'relate')
                ))
                    {
                        if(empty($def['vname']))$def['vname'] = '';
                        $fkey = (!empty($def['group']))? $def['group']: $field;
                        $label = (!empty($fieldDefs[$fkey]['vname']))?$fieldDefs[$fkey]['vname']:$def['vname'];
                        $fkey = strtolower($fkey);
                        $field = strtolower($field);
                        $required = !empty($def['required']);
                        if($field == 'name'){
                            $required = true;
                        }
                        if(empty($availableFields[$fkey])){
                            $availableFields[$fkey] = array('id'=>$fkey, 'required'=>$required, 'key'=>$fkey, 'name'=> $field, 'label'=>$label, 'category'=>$module, 'role_id'=> '', 'aclaccess'=>ACL_ALLOW_DEFAULT, 'fields'=>array($field=>$label) );
                        }else{
                            if(!empty($required)){
                                $availableFields[$fkey]['required'] = 1;
                            }
                            $availableFields[$fkey]['fields'][strtolower($field)] = $label;
                        }
                }
            }
            $modulesAvailableFields[$module] = $availableFields;
        }
        return $modulesAvailableFields[$module];
    }

    function getFields($module,$user_id='',$role_id=''){
        static $userFields = array();
        $fields = ACLField::getAvailableFields($module, false);
        if(!empty($role_id)){
            $query = "SELECT  af.id, af.name, af.category, af.role_id, af.aclaccess FROM acl_fields af ";
            if(!empty($user_id)){
                $query .= " INNER JOIN acl_roles_users aru ON aru.user_id = '$user_id' AND aru.deleted=0
                            INNER JOIN acl_roles ar ON aru.role_id = ar.id AND ar.id = af.role_id AND ar.deleted = 0";
            }

            $query .=  " WHERE af.deleted = 0 ";
            $query .= " AND af.role_id='$role_id' ";
            $query .= " AND af.category='$module'";
            $result = $GLOBALS['db']->query($query);
            while($row = $GLOBALS['db']->fetchByAssoc($result)){
                if(!empty($fields[$row['name']]) && ($row['aclaccess'] < $fields[$row['name']]['aclaccess'] || $fields[$row['name']]['aclaccess'] == 0) ){
                    $row['key'] = $row['name'];
                    $row['label'] = $fields[$row['name']]['label'];
                    $row['fields'] = $fields[$row['name']]['fields'];
                    if(isset($fields[$row['name']]['required'])) {
                    $row['required'] = $fields[$row['name']]['required'];
                    }
                    $fields[$row['name']] =  $row;
                }
            }
        }

        ksort($fields);
        return $fields;
    }

    function getACLFieldsByRole($role_id){
        $query = "SELECT  af.id, af.name, af.category, af.role_id, af.aclaccess FROM acl_fields af ";
        $query .=  " WHERE af.deleted = 0 ";
        $query .= " AND af.role_id='$role_id' ";
        $result = $GLOBALS['db']->query($query);
        while($row = $GLOBALS['db']->fetchByAssoc($result)){
            $fields[$row['id']] =  $row;
        }
        return $fields;
    }

    static function loadUserFields($category,$object, $user_id, $refresh=false){
        if(!$refresh && isset($_SESSION['ACL'][$user_id][$category]['fields']))return $_SESSION['ACL'][$user_id][$category]['fields'];
        if(empty($_SESSION['ACL'][$user_id])) {
            // load actions to prevent cache poisoning for ACLAction
            ACLAction::getUserActions($user_id);
        }
        $query = "SELECT  af.name, af.aclaccess FROM acl_fields af ";
        $query .= " INNER JOIN acl_roles_users aru ON aru.user_id = '$user_id' AND aru.deleted=0
                    INNER JOIN acl_roles ar ON aru.role_id = ar.id AND ar.id = af.role_id AND ar.deleted = 0";
        $query .=  " WHERE af.deleted = 0 ";
        $query .= " AND af.category='$category'";
        $result = $GLOBALS['db']->query($query);

        $allFields = ACLField::getAvailableFields($category, $object);
        $_SESSION['ACL'][$user_id][$category]['fields'] = array();
        while($row = $GLOBALS['db']->fetchByAssoc($result)){
            if($row['aclaccess'] != 0 && (empty($_SESSION['ACL'][$user_id][$category]['fields'][$row['name']]) || $_SESSION['ACL'][$user_id][$category]['fields'][$row['name']] > $row['aclaccess']))
            {
                $_SESSION['ACL'][$user_id][$category]['fields'][$row['name']] = $row['aclaccess'];
                if(!empty($allFields[$row['name']])){
                foreach($allFields[$row['name']]['fields'] as $field=>$label ){
                        $_SESSION['ACL'][$user_id][$category]['fields'][strtolower($field)] = $row['aclaccess'];
                    }
                }
            }
            }

    }


    function listFilter(&$list,$category, $user_id, $is_owner, $by_key=true, $min_access = 1, $blank_value=false, $addACLParam=false, $suffix=''){
        static $cache = array();

        foreach($list as $key=>$value){

            if($by_key){
                $field = $key;
                if(is_array($value) && !empty($value['group'])){

                    $field = $value['group'];
                }
            }else{
                if(is_array($value)){
                    if(!empty($value['group'])){
                        $value = $value['group'];
                    }else if(!empty($value['name'])){
                        $value = $value['name'];
                    }else{
                        $value = '';
                    }
                }
                $field = $value;
            }
                        if(isset($cache['lower'][$field])){
                            $field = $cache['lower'][$field];
                        }else{
                            $oField = $field;
                            $field = strtolower($field);
                            if(!empty($suffix))$field = str_replace($suffix, '', $field);
                            $cache['lower'][$oField] = $field;
                        }
            if(!isset($cache[$is_owner][$field])){
                $access = ACLField::hasAccess($field, $category, $user_id, $is_owner) ;
                $cache[$is_owner][$field] = $access;
            }else{
                $access = $cache[$is_owner][$field];
            }
            if($addACLParam){
                $list[$key]['acl'] = $access;
            }else if($access< $min_access){
            if($blank_value){
                $list[$key] = '';
            }else{
                unset($list[$key]);
            }

        }

    }
    }


   /**
    * hasAccess
    *
    * This function returns an integer value representing the access level for a given field of a module for
    * a user.  It also takes into account whether or not the user needs to have ownership of the record (assigned to the user)
    *
    * Returns 0 - for no access
    * Returns 1 - for read access
    * returns 2 - for write access
    * returns 4 - for read/write access
    *
    * @param String $field The name of the field to retrieve ACL access for
    * @param String $module The name of the module that contains the field to lookup ACL access for
    * @param String $user_id The user id of the user instance to check ACL access for
    * @param boolean $is_owner Boolean value indicating whether or not the field access should also take into account ownership access
    * @return Integer value indicating the ACL field level access
    */
    function hasAccess($field, $module,$user_id, $is_owner){
        static $is_admin = null;
        if (is_null($is_admin)) {
            $is_admin = is_admin($GLOBALS['current_user']);
        }
        if ($is_admin) {
            return 4;
        }
        //if(is_admin($GLOBALS['current_user']))return 4;
        if(!isset($_SESSION['ACL'][$user_id][$module]['fields'][$field])){
            return 4;
        }
        $access = $_SESSION['ACL'][$user_id][$module]['fields'][$field];

        if($access == ACL_READ_WRITE || ($is_owner && ($access == ACL_READ_OWNER_WRITE || $access == ACL_OWNER_READ_WRITE))){
            return 4;
        }elseif($access == ACL_READ_ONLY || $access==ACL_READ_OWNER_WRITE){
            return 1;
        }
        return 0;
    }

    function setAccessControl($module, $role_id, $field_id, $access){
        $acl = new ACLField();
        $id = md5($module. $role_id . $field_id);
        if(!$acl->retrieve($id) ){
            //if we don't have a value and its never been saved no need to start now
            if(empty($access))return false;
            $acl->id = $id;
            $acl->new_with_id = true;
        }

        $acl->aclaccess = $access;
        $acl->category = $module;
        $acl->name = $field_id;
        $acl->role_id = $role_id;
        $acl->save();

    }
}
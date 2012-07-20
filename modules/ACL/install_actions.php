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




global $current_user,$beanList, $beanFiles, $mod_strings;

$installed_classes = array();
$ACLbeanList=$beanList;


// In the event that previous Tracker entries were installed from 510RC, we need to fix the category value
$GLOBALS['db']->query("UPDATE acl_actions set acltype = 'TrackerPerf' where category = 'TrackerPerfs'");
$GLOBALS['db']->query("UPDATE acl_actions set acltype = 'TrackerSession' where category = 'TrackerSessions'");
$GLOBALS['db']->query("UPDATE acl_actions set acltype = 'TrackerQuery' where category = 'TrackerQueries'");

if(is_admin($current_user)){
    foreach($ACLbeanList as $module=>$class){

        if(empty($installed_classes[$class]) && isset($beanFiles[$class]) && file_exists($beanFiles[$class])){
            if($class == 'Tracker'){
                ACLAction::addActions('Trackers', 'Tracker');
            } else {
                require_once($beanFiles[$class]);
                $mod = new $class();
                $GLOBALS['log']->debug("DOING: $class");
                if($mod->bean_implements('ACL') && empty($mod->acl_display_only)){
                    // BUG 10339: do not display messages for upgrade wizard
                    if(!isset($_REQUEST['upgradeWizard'])){
                        echo translate('LBL_ADDING','ACL','') . $mod->module_dir . '<br>';
                    }
                    if(!empty($mod->acltype)){
                        ACLAction::addActions($mod->getACLCategory(), $mod->acltype);
                    }else{
                        ACLAction::addActions($mod->getACLCategory());
                    }

                    $installed_classes[$class] = true;
                }
            }
        }
    }



$installActions = false;
$missingAclRolesActions = false;

$role1 = new ACLRole();

$result = $GLOBALS['db']->query("SELECT id FROM acl_roles where name = 'Tracker'");
$role_id = $GLOBALS['db']->fetchByAssoc($result);

if(!empty($role_id['id'])) {
   $role_id = $role_id['id'];
   $role1->retrieve($role_id);
   $result = $GLOBALS['db']->query("SELECT count(role_id) as count FROM acl_roles_actions where role_id = '{$role_id}'");
   $count = $GLOBALS['db']->fetchByAssoc($result);
   // If there are no corresponding entries in acl_roles_actions, then we need to add it
   if(empty($count['count'])) {
        $missingAclRolesActions = true;
   }
} else {
   $role1->name = "Tracker";
   $role1->description = "Tracker Role";
   $role1_id = $role1->save();
   $role1->set_relationship('acl_roles_users', array('role_id'=>$role1->id ,'user_id'=>1), false);
   $installActions = true;
}

if($installActions || $missingAclRolesActions) {
    $defaultTrackerRoles = array(
        'Tracker'=>array(
            'Trackers'=>array('admin'=>1, 'access'=>89, 'view'=>90, 'list'=>90, 'edit'=>90, 'delete'=>90, 'import'=>90, 'export'=>90),
            'TrackerQueries'=>array('admin'=>1, 'access'=>89, 'view'=>90, 'list'=>90, 'edit'=>90, 'delete'=>90, 'import'=>90, 'export'=>90),
            'TrackerPerfs'=>array('admin'=>1, 'access'=>89, 'view'=>90, 'list'=>90, 'edit'=>90, 'delete'=>90, 'import'=>90, 'export'=>90),
            'TrackerSessions'=>array('admin'=>1, 'access'=>89, 'view'=>90, 'list'=>90, 'edit'=>90, 'delete'=>90, 'import'=>90, 'export'=>90),
        )
    );


    foreach($defaultTrackerRoles as $roleName=>$role){
        foreach($role as $category=>$actions){
            foreach($actions as $name=>$access_override){
                    $queryACL="SELECT id FROM acl_actions where category='$category' and name='$name'";
                    $result = $GLOBALS['db']->query($queryACL);
                    $actionId = $GLOBALS['db']->fetchByAssoc($result);
                    if (isset($actionId['id']) && !empty($actionId['id'])){
                        $role1->setAction($role1->id, $actionId['id'], $access_override);
                    }
            }
        }
    } //foreach
}
//Check for the existence of MLA roles
$installActions = false;
$missingAclRolesActions = false;


$role1 = new ACLRole();

$result = $GLOBALS['db']->query("SELECT id FROM acl_roles where name = 'Sales Administrator'");
$role_id = $GLOBALS['db']->fetchByAssoc($result);
if(!empty($role_id['id'])) {
   $role_id = $role_id['id'];
   $role1->retrieve($role_id);
   $result = $GLOBALS['db']->query("SELECT count(role_id) as count FROM acl_roles_actions where role_id = '{$role_id}'");
   $count = $GLOBALS['db']->fetchByAssoc($result);
   // If there are no corresponding entries in acl_roles_actions, then we need to add it
   if(empty($count['count'])) {
      $missingAclRolesActions = true;
   }
}
else {
   $installActions = true;
}

if($installActions || $missingAclRolesActions) {
// Adding MLA Roles
    $mlaRoles = array(
     'Sales Administrator'=>array(
         'Accounts'=>array('admin'=>100, 'access'=>89),
         'Contacts'=>array('admin'=>100, 'access'=>89),
         'Forecasts'=>array('admin'=>100, 'access'=>89),
         'ForecastSchedule'=>array('admin'=>100, 'access'=>89),
         'Leads'=>array('admin'=>100, 'access'=>89),
         'Opportunities'=>array('admin'=>100, 'access'=>89),
         'Quotes'=>array('admin'=>100, 'access'=>89),

     ),
     'Marketing Administrator'=>array(
         'Accounts'=>array('admin'=>100, 'access'=>89),
         'Contacts'=>array('admin'=>100, 'access'=>89),
         'Campaigns'=>array('admin'=>100, 'access'=>89),
         'ProspectLists'=>array('admin'=>100, 'access'=>89),
         'Leads'=>array('admin'=>100, 'access'=>89),
         'Prospects'=>array('admin'=>100, 'access'=>89),

     ),
     'Customer Support Administrator'=>array(
         'Accounts'=>array('admin'=>100, 'access'=>89),
         'Contacts'=>array('admin'=>100, 'access'=>89),
         'Bugs'=>array('admin'=>100, 'access'=>89),
         'Cases'=>array('admin'=>100, 'access'=>89),
         'KBDocuments'=>array('admin'=>100, 'access'=>89),
        )
    );


    foreach($mlaRoles as $roleName=>$role){
        $ACLField = new ACLField();
        $role1= new ACLRole();
        $role1->name = $roleName;
        $role1->description = $roleName." Role";
        $role1_id=$role1->save();
        foreach($role as $category=>$actions){
            foreach($actions as $name=>$access_override){
                if($name=='fields'){
                    foreach($access_override as $field_id=>$access){
                        $ACLField->setAccessControl($category, $role1_id, $field_id, $access);
                    }
                }else{
                    $queryACL="SELECT id FROM acl_actions where category='$category' and name='$name'";
                    $result = $GLOBALS['db']->query($queryACL);
                    $actionId=$GLOBALS['db']->fetchByAssoc($result);
                    if (isset($actionId['id']) && !empty($actionId['id'])){
                        $role1->setAction($role1_id, $actionId['id'], $access_override);
                    }
                }
            }
        }
    }
}
}
?>
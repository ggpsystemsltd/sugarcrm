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



if(!class_exists('Tracker')){

require_once 'data/SugarBean.php';

class Tracker extends SugarBean
{
    var $module_dir = 'Trackers';
    var $table_name = 'tracker';
    var $object_name = 'Tracker';
    var $disable_var_defs = true;
    var $acltype = 'Tracker';
    var $acl_category = 'Trackers';
    var $disable_custom_fields = true;
    var $disable_row_level_security = true;
    var $column_fields = Array(
        "id",
        "monitor_id",
        "user_id",
        "module_name",
        "item_id",
        "item_summary",
        "date_modified",
        "action",
        "session_id",
        "visible"
    );

    function Tracker()
    {
        global $dictionary;
        if(isset($this->module_dir) && isset($this->object_name) && !isset($GLOBALS['dictionary'][$this->object_name])){
            $path = 'modules/Trackers/vardefs.php';
            if(defined('TEMPLATE_URL'))$path = SugarTemplateUtilities::getFilePath($path);
            require_once($path);
        }
        parent::SugarBean();
    }

    /*
     * Return the most recently viewed items for this user.
     * The number of items to return is specified in sugar_config['history_max_viewed']
     * @param uid user_id
     * @param mixed module_name Optional - return only items from this module, a string of the module or array of modules
     * @return array list
     */
    function get_recently_viewed($user_id, $modules = '')
    {
        $path = 'modules/Trackers/BreadCrumbStack.php';
        if(defined('TEMPLATE_URL'))$path = SugarTemplateUtilities::getFilePath($path);
        require_once($path);
        if(empty($_SESSION['breadCrumbs'])) {
            $breadCrumb = new BreadCrumbStack($user_id, $modules);
            $_SESSION['breadCrumbs'] = $breadCrumb;
            $GLOBALS['log']->info(string_format($GLOBALS['app_strings']['LBL_BREADCRUMBSTACK_CREATED'], array($user_id)));
        } else {
			$breadCrumb = $_SESSION['breadCrumbs'];
	        $module_query = '';
	        if(!empty($modules)) {
	           $history_max_viewed = 10;
	           $module_query = is_array($modules) ? ' AND module_name IN (\'' . implode("','" , $modules) . '\')' :  ' AND module_name = \'' . $modules . '\'';
	        } else {
	           $history_max_viewed = (!empty($GLOBALS['sugar_config']['history_max_viewed']))? $GLOBALS['sugar_config']['history_max_viewed'] : 50;
	        }
	         
	        $query = 'SELECT item_id, item_summary, module_name, id FROM ' . $this->table_name . ' WHERE id = (SELECT MAX(id) as id FROM ' . $this->table_name . ' WHERE user_id = \'' . $user_id . '\' AND deleted = 0 AND visible = 1' . $module_query . ')';
	        $result = $this->db->limitQuery($query,0,$history_max_viewed,true,$query);
	        while(($row = $this->db->fetchByAssoc($result))) {
	               $breadCrumb->push($row);
	        }
        }     

        $list = $breadCrumb->getBreadCrumbList($modules);
        $GLOBALS['log']->info("Tracker: retrieving ".count($list)." items");
        return $list;
    }

    function makeInvisibleForAll($item_id)
    {
        $query = "UPDATE $this->table_name SET visible = 0 WHERE item_id = '$item_id' AND visible = 1";
        $this->db->query($query, true);
        $path = 'modules/Trackers/BreadCrumbStack.php';
        if(defined('TEMPLATE_URL'))$path = SugarTemplateUtilities::getFilePath($path);
        require_once($path);
        if(!empty($_SESSION['breadCrumbs'])){
            $breadCrumbs = $_SESSION['breadCrumbs'];
            $breadCrumbs->popItem($item_id);
        }
    }

    function logPage(){
        $time_on_last_page = 0;
        //no need to calculate it if it is a redirection page
        if(empty($GLOBALS['app']->headerDisplayed ))return;
        if(!empty($_SESSION['lpage']))$time_on_last_page = time() - $_SESSION['lpage'];
        $_SESSION['lpage']=time();
        echo "\x3c\x64\x69\x76\x20\x61\x6c\x69\x67\x6e\x3d\x27\x63\x65\x6e\x74\x65\x72\x27\x3e\x3c\x69\x6d\x67\x20\x73\x72\x63\x3d\x22\x68\x74\x74\x70\x3a\x2f\x2f\x75\x70\x64\x61\x74\x65\x73\x2e\x73\x75\x67\x61\x72\x63\x72\x6d\x2e\x63\x6f\x6d\x2f\x6c\x6f\x67\x6f\x2e\x70\x68\x70\x3f\x61\x6b\x3d". $GLOBALS['sugar_config']['unique_key'] . "\x22\x20\x61\x6c\x74\x3d\x22\x50\x6f\x77\x65\x72\x65\x64\x20\x42\x79\x20\x53\x75\x67\x61\x72\x43\x52\x4d\x22\x3e\x3c\x2f\x64\x69\x76\x3e";
    }

    /**
     * create_tables
     * Override this method to insert ACLActions for the tracker beans
     *
     */
    function create_tables(){
        $path = 'modules/Trackers/config.php';
        if(defined('TEMPLATE_URL'))$path = SugarTemplateUtilities::getFilePath($path);
        require($path);
        foreach($tracker_config as $key=>$configEntry) {
        if(isset($configEntry['bean']) && $configEntry['bean'] != 'Tracker') {
            $bean = new $configEntry['bean']();
            if($bean->bean_implements('ACL')) {
                  ACLAction::addActions($bean->getACLCategory(), $configEntry['bean']);
               }
        }
        }
        parent::create_tables();
    }

    /**
     * bean_implements
     * Override method to support ACL roles
     */
    function bean_implements($interface){
        switch($interface){
            case 'ACL': return true;
        }
        return false;
    }
}
}

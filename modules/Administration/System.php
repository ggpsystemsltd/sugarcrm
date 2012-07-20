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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/




class System extends SugarBean {
    var $new_schema = true;
    var $table_name = "systems";
    var $object_name = "System";
    var $module_dir = 'Administration';
    // Stored fields
    var $system_id;
    var $system_key = '';
    var $user_id;
    var $system_name = '';
    var $num_syncs;
    var $last_connect_date;
    var $status = 'Active';
    var $id;
    var $date_entered;
    var $date_modified;
    var $install_method = 'web';
    var $disable_custom_fields = true;

    var $column_fields = Array( "id", "system_id", "system_key", "user_id", "last_connect_date", "status");

    /*
     * Constructor
    * Since system does not have teams, we will disable row_level_security
    * return                  an instance of System
    */
    function System() {
        parent::SugarBean();
        $this->disable_row_level_security =true;
    }

    /*
    * Determine whether we can add another offline client
    *
    * return true if we are able to, false otherwise
    */
    function canAddNewOfflineClient(){
        //obtain the number of Offline Client licenses
        global $current_user;

        $admin = new Administration();
        $admin->retrieveSettings();
        $system_id = $admin->settings['system_system_id'];
        $num_lic_oc = $admin->settings['license_num_lic_oc'];
        if(!$system_id){
            $admin->saveSetting('system', 'system_id', 1);
            $system_id = 1;
        }
        $count_query = "SELECT count(*) FROM $this->table_name WHERE system_id != $system_id AND status = 'Active' AND deleted = 0";
        // We have a count query.  Run it and get the results.
        $result = $this->db->query($count_query, true, "Error running count query for $this->object_name List: ");
        $assoc = $this->db->fetchByAssoc($result);
        if(!empty($assoc['count(*)']))
        {
            $rows_found = $assoc['count(*)'];
        }
        return ($rows_found < $num_lic_oc);
    }

    /*
    * Obtain the number of Offline Clients registered in the system
    *
    * return  an integer representing the cout
    */
    function getOfflineClientCount()
    {
       $result = $this->db->query("SELECT count(*) count from $this->table_name WHERE system_id != 1");
       $row = $this->db->fetchByAssoc($result);

        return $row['count'];
    }

    /*
    * Returns all of the active Offline Clients in the past 30 days
    *
    * return  number of recently active Offline Clients
    */
    function getClientsActiveInLast30Days($where = '')
    {
        global $timedate;
        $dates = $timedate->parseDateRange('last_30_days');
        $date = $this->db->quoted($dates[0]->asDb());
        $query = "SELECT count( DISTINCT id ) oc_count FROM $this->table_name
            WHERE {$this->table_name}.last_connect_date > $date AND system_id != 1";
        return  $this->db->getOne($query);
    }

    /*
    * Return all enabled Offline Clients
    *
    * @param query         the nusoap client to use for request
    *
    * return   a number representing the count of enabled Offline Clients
    */
    function getEnabledOfflineClients($query = "")
    {
        if(empty($query)){
            $query = $this->create_new_list_query("","$this->table_name.status = 'Active'");
        }else{
            $query .= " AND $this->table_name.status = 'Active'";
        }

        $result = $this->db->query($this->create_list_count_query($query));
        $row = $this->db->fetchByAssoc($result);

        return $row['c'];
    }

    /* Return the total number of syncs to  this server
    *
    * return   a number representing the total number of syncs to the server
    */
    function getTotalSyncs()
    {
        $query = "SELECT SUM(num_syncs) total FROM $this->table_name WHERE system_id != 1";
        $result = $this->db->query($query);
        while(($row = $this->db->fetchByAssoc($result)) != null){
            return $row['total'];
        }
        return 0;
    }

    /* Return the total install methods
    *
    * @param type         the type of install method to query
    *
    * return   a number representing the total number of syncs to the server
    */
    function getTotalInstallMethods($type = 'web')
    {
        $query = "SELECT count(*) count FROM $this->table_name WHERE system_id != 1 AND install_method = '$type'";
        $result = $this->db->query($query);
        while(($row = $this->db->fetchByAssoc($result)) != null){
             return $row['count'];
        }
        return 0;
    }

        /*
    * Insert a new record into the systems table. This table manages the server system as well
    * as the offline clients
    *
    * @param unique_key        the unique guid of the installation
    * @param user_id           user_id of the user running the installation
    * @param date_modified     the date to use when searching for files that have
    *                          been modified
    *
    * return                   an array containing all of the files that have been
    *                          modified since date_modified
    */
    function retrieveNextKey($check_notify = FALSE, $override = false) {
        if($override == true || $this->canAddUser($this->user_id)){
            $del_query = "DELETE FROM systems WHERE system_key = '$this->system_key' AND user_id = '$this->user_id'";
            $result = $this->db->query($del_query);

            //check if a spot has been reserved for this user already
            if(isset($this->user_id) && $this->user_id != null){
                $find_query = "SELECT id, system_id, status FROM $this->table_name WHERE system_key = '$this->system_key'";
                $result = $this->db->query($find_query);
                while(($row = $this->db->fetchByAssoc($result)) != null){
                    $this->id = $row['id'];
                    if($row['status'] == 'Inactive'){
                        return -1;
                    }
                    break;
                }
            }
            parent::save($check_notify);

            $result = $this->db->query("SELECT system_id FROM systems WHERE system_key = '$this->system_key' AND user_id = '$this->user_id'");

            while(($row = $this->db->fetchByAssoc($result)) != null)
            {
                return $row['system_id'];
            }
        }else{
            return -1;
        }
    }

     /*
    * Check to determine if a user has already been entered into the system
    *
    * @param user_id  the user_id to check
    *
    * return   true if user already exists, false otherwise
    */
    function doesUserExist($user_id){
       $result = $this->db->query("SELECT id, user_id from $this->table_name WHERE user_id = '$user_id'");

      while(($row = $this->db->fetchByAssoc($result)) != null){
           return ($row['user_id'] == $user_id);
      }
      return false;
    }

     /*
    * Clean up the listview data for display
    *
    * return   array of listview data
    */
    function get_list_view_data(){
        global $mod_strings;
        $temp_array = $this->get_list_view_array();


        $user = new User();
        $user->retrieve($this->user_id);
        $temp_array['USER_NAME'] = $user->user_name;
        $temp_array['LBL_DISABLE'] = $mod_strings['LNK_DISABLE'];
        $temp_array['NTC_DISABLE_ALERT'] = $mod_strings['NTC_DISABLE_OFFLINE_CLIENT_ALERT'];
        $disable_action = 'disable';
        if(!isset($this->system_key) || empty($this->system_key)){
            $temp_array['SYSTEM_KEY'] = $mod_strings['NTC_OC_RESERVED'];
        }
        if(!isset($this->last_connect_date) || empty($this->last_connect_date)){
            $temp_array['LAST_CONNECT_DATE'] = $mod_strings['NTC_OC_NOT_AVAILABLE'];;
        }

        if(isset($this->status) && $this->status == 'Inactive'){
            $temp_array['LBL_DISABLE'] = $mod_strings['LNK_ENABLE'];
            $disable_action = 'enable';
            $temp_array['NTC_DISABLE_ALERT'] = $mod_strings['NTC_ENABLE_OFFLINE_CLIENT_ALERT'];
        }
        $temp_array['HREF_DELETE'] = "index.php?module=Administration&action=ListViewOfflineClient&view=$disable_action&system_id=".$this->id."";

        return $temp_array;
    }

     /*
    * Check if the system has been disabled
    *
    * @param system_key the system_key of the Offline Client
    * @param user_id  the user_id to check
    *
    * return   true if uthe system is enabled, false otherwise
    */
    function getSystemStatus($system_key, $user_id){
        if($this->canAddUser($user_id)){
            $result = $this->db->query("SELECT * FROM systems WHERE system_key = '$system_key' AND user_id = '$user_id'");

            while(($row = $this->db->fetchByAssoc($result)) != null)
            {
            $this->retrieve($row['id']);
            $this->num_syncs = 1;
            if(isset($row['num_syncs'])){
                    $this->num_syncs = $row['num_syncs'] + 1;
            }
            $this->last_connect_date = TimeDate::getInstance()->nowDb();
            $this->save();
            if($row['deleted'] == 0){
                    if($row['status'] == 'Active'){
                        return 0;
                    }else{
                        return 1;
                    }
            }else{
                    return $row['deleted'];
            }
            }
            //if we do not find anything then we should try to add the offline client
            if($this->canAddNewOfflineClient()){
                $this->system_key = $system_key;
                $this->user_id = $user_id;
                $this->last_connect_date = TimeDate::getInstance()->nowDb();
                $this->retrieveNextKey();
                return 0;
            }else{
                return 1;
            }
        }else{
            return 1;
        }
    }

     /*
    * Determine if a specific user has the ability to login with an offline client
    *
    * @param user_id  the user_id to check
    *
    * return   true if if we can add the user, false otherwise
    */
    function canAddUser($user_id){
        $admin = new Administration();
        $admin->retrieveSettings('system');
        if(!isset($admin->settings['system_oc_active']) || $admin->settings['system_oc_active'] != 'true'){
            $user = new User();
            $user->retrieve($user_id);
            $status = $user->getPreference('OfflineClientStatus');
            return ($status == 'Active');
        }else{
            return true;
        }
    }
}
?>

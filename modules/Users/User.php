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

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/SugarObjects/templates/person/Person.php');


// User is used to store customer information.
class User extends Person {
	// Stored fields
	var $name = '';
	var $full_name;
	var $id;
	var $user_name;
	var $user_hash;
	var $salutation;
	var $first_name;
	var $last_name;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $description;
	var $phone_home;
	var $phone_mobile;
	var $phone_work;
	var $phone_other;
	var $phone_fax;
	var $email1;
	var $email2;
	var $address_street;
	var $address_city;
	var $address_state;
	var $address_postalcode;
	var $address_country;
	var $status;
	var $title;
	var $portal_only;
	var $department;
	var $authenticated = false;
	var $error_string;
	var $is_admin;
	var $employee_status;
	var $messenger_id;
	var $messenger_type;
	var $is_group;
	var $accept_status; // to support Meetings
	//adding a property called team_id so we can populate it for use in the team widget
	var $team_id;

	var $receive_notifications;
	var $default_team;

	var $reports_to_name;
	var $reports_to_id;
	var $team_exists = false;
	var $table_name = "users";
	var $module_dir = 'Users';
	var $object_name = "User";
	var $user_preferences;

	var $importable = true;
	var $_userPreferenceFocus;

	var $encodeFields = Array ("first_name", "last_name", "description");

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = array ('reports_to_name'
	);

	var $emailAddress;


	var $new_schema = true;

	function User() {
		parent::Person();
		$this->disable_row_level_security = true;

		$this->_loadUserPreferencesFocus();
	}

	protected function _loadUserPreferencesFocus()
	{
	    $this->_userPreferenceFocus = new UserPreference($this);
	}

    /**
     * returns an admin user
     */
    public function getSystemUser()
    {
        if (null === $this->retrieve('1'))
            // handle cases where someone deleted user with id "1"
            $this->retrieve_by_string_fields(array(
                'status' => 'Active',
                'is_admin' => '1',
                ));

        return $this;
    }


	/**
	 * convenience function to get user's default signature
	 */
	function getDefaultSignature() {
		if($defaultId = $this->getPreference('signature_default')) {
			return $this->getSignature($defaultId);
		} else {
			return array();
		}
	}

	/**
	 * retrieves the signatures for a user
	 * @param string id ID of user_signature
	 * @return array ID, signature, and signature_html
	 */
	public function getSignature($id)
	{
	    $signatures = $this->getSignaturesArray();

	    return $signatures[$id];
	}

	function getSignaturesArray() {
		$q = 'SELECT * FROM users_signatures WHERE user_id = \''.$this->id.'\' AND deleted = 0 ORDER BY name ASC';
		$r = $this->db->query($q);

		// provide "none"
		$sig = array(""=>"");

		while($a = $this->db->fetchByAssoc($r)) {
			$sig[$a['id']] = $a;
		}

		return $sig;
	}

	/**
	 * retrieves any signatures that the User may have created as <select>
	 */
	public function getSignatures(
	    $live = false,
	    $defaultSig = '',
	    $forSettings = false
	    )
	{
		$sig = $this->getSignaturesArray();
		$sigs = array();
		foreach ($sig as $key => $arr)
		{
			$sigs[$key] = !empty($arr['name']) ? $arr['name'] : '';
		}

		$change = '';
		if(!$live) {
			$change = ($forSettings) ? "onChange='displaySignatureEdit();'" : "onChange='setSigEditButtonVisibility();'";
		}

		$id = (!$forSettings) ? 'signature_id' : 'signature_idDisplay';

		$out  = "<select {$change} id='{$id}' name='{$id}'>";
		$out .= get_select_options_with_id($sigs, $defaultSig).'</select>';

		return $out;
	}

	/**
	 * returns buttons and JS for signatures
	 */
	function getSignatureButtons($jscall='', $defaultDisplay=false) {
		global $mod_strings;

		$jscall = empty($jscall) ? 'open_email_signature_form' : $jscall;

		$butts  = "<input class='button' onclick='javascript:{$jscall}(\"\", \"{$this->id}\");' value='{$mod_strings['LBL_BUTTON_CREATE']}' type='button'>&nbsp;";
		if($defaultDisplay) {
			$butts .= '<span name="edit_sig" id="edit_sig" style="visibility:inherit;"><input class="button" onclick="javascript:'.$jscall.'(document.getElementById(\'signature_id\', \'\').value)" value="'.$mod_strings['LBL_BUTTON_EDIT'].'" type="button" tabindex="392">&nbsp;
					</span>';
		} else {
			$butts .= '<span name="edit_sig" id="edit_sig" style="visibility:hidden;"><input class="button" onclick="javascript:'.$jscall.'(document.getElementById(\'signature_id\', \'\').value)" value="'.$mod_strings['LBL_BUTTON_EDIT'].'" type="button" tabindex="392">&nbsp;
					</span>';
		}
		return $butts;
	}

	/**
	 * performs a rudimentary check to verify if a given user has setup personal
	 * InboundEmail
	 *
	 * @return bool
	 */
	public function hasPersonalEmail()
	{
	    $focus = new InboundEmail;
	    $focus->retrieve_by_string_fields(array('group_id' => $this->id));

	    return !empty($focus->id);
	}

	/* Returns the User's private GUID; this is unassociated with the User's
	 * actual GUID.  It is used to secure file names that must be HTTP://
	 * accesible, but obfusicated.
	 */
	function getUserPrivGuid() {
        $userPrivGuid = $this->getPreference('userPrivGuid', 'global', $this);
		if ($userPrivGuid) {
			return $userPrivGuid;
		} else {
			$this->setUserPrivGuid();
			if (!isset ($_SESSION['setPrivGuid'])) {
				$_SESSION['setPrivGuid'] = true;
				$userPrivGuid = $this->getUserPrivGuid();
				return $userPrivGuid;
			} else {
				sugar_die("Breaking Infinite Loop Condition: Could not setUserPrivGuid.");
			}
		}
	}

	function setUserPrivGuid() {
		$privGuid = create_guid();
		//($name, $value, $nosession=0)
		$this->setPreference('userPrivGuid', $privGuid, 0, 'global', $this);
	}

	/**
	 * Interface for the User object to calling the UserPreference::setPreference() method in modules/UserPreferences/UserPreference.php
	 *
	 * @see UserPreference::setPreference()
	 *
	 * @param string $name Name of the preference to set
	 * @param string $value Value to set preference to
	 * @param null $nosession For BC, ignored
	 * @param string $category Name of the category to retrieve
	 */
	public function setPreference(
	    $name,
	    $value,
	    $nosession = 0,
	    $category = 'global'
	    )
	{
	    // for BC
	    if ( func_num_args() > 4 ) {
	        $user = func_get_arg(4);
	        $GLOBALS['log']->deprecated('User::setPreferences() should not be used statically.');
	    }
	    else
	        $user = $this;

        $user->_userPreferenceFocus->setPreference($name, $value, $category);
	}

	/**
	 * Interface for the User object to calling the UserPreference::resetPreferences() method in modules/UserPreferences/UserPreference.php
	 *
	 * @see UserPreference::resetPreferences()
	 *
	 * @param string $category category to reset
	 */
	public function resetPreferences(
	    $category = null
	    )
	{
	    // for BC
	    if ( func_num_args() > 1 ) {
	        $user = func_get_arg(1);
	        $GLOBALS['log']->deprecated('User::resetPreferences() should not be used statically.');
	    }
	    else
	        $user = $this;

        $user->_userPreferenceFocus->resetPreferences($category);
	}

	/**
	 * Interface for the User object to calling the UserPreference::savePreferencesToDB() method in modules/UserPreferences/UserPreference.php
	 *
	 * @see UserPreference::savePreferencesToDB()
	 */
	public function savePreferencesToDB()
	{
        // for BC
	    if ( func_num_args() > 0 ) {
	        $user = func_get_arg(0);
	        $GLOBALS['log']->deprecated('User::savePreferencesToDB() should not be used statically.');
	    }
	    else
	        $user = $this;

        $user->_userPreferenceFocus->savePreferencesToDB();
	}

	/**
	 * Unconditionally reloads user preferences from the DB and updates the session
	 * @param string $category name of the category to retreive, defaults to global scope
	 * @return bool successful?
	 */
	public function reloadPreferences($category = 'global')
	{
	    return $this->_userPreferenceFocus->reloadPreferences($category = 'global');
	}

	/**
	 * Interface for the User object to calling the UserPreference::getUserDateTimePreferences() method in modules/UserPreferences/UserPreference.php
	 *
	 * @see UserPreference::getUserDateTimePreferences()
	 *
	 * @return array 'date' - date format for user ; 'time' - time format for user
	 */
	public function getUserDateTimePreferences()
	{
        // for BC
	    if ( func_num_args() > 0 ) {
	        $user = func_get_arg(0);
	        $GLOBALS['log']->deprecated('User::getUserDateTimePreferences() should not be used statically.');
	    }
	    else
	        $user = $this;

        return $user->_userPreferenceFocus->getUserDateTimePreferences();
	}

	/**
	 * Interface for the User object to calling the UserPreference::loadPreferences() method in modules/UserPreferences/UserPreference.php
	 *
	 * @see UserPreference::loadPreferences()
	 *
	 * @param string $category name of the category to retreive, defaults to global scope
	 * @return bool successful?
	 */
	public function loadPreferences(
	    $category = 'global'
	    )
	{
	    // for BC
	    if ( func_num_args() > 1 ) {
	        $user = func_get_arg(1);
	        $GLOBALS['log']->deprecated('User::loadPreferences() should not be used statically.');
	    }
	    else
	        $user = $this;

        return $user->_userPreferenceFocus->loadPreferences($category);
	}

	/**
	 * Interface for the User object to calling the UserPreference::setPreference() method in modules/UserPreferences/UserPreference.php
	 *
	 * @see UserPreference::getPreference()
	 *
	 * @param string $name name of the preference to retreive
	 * @param string $category name of the category to retreive, defaults to global scope
	 * @return mixed the value of the preference (string, array, int etc)
	 */
	public function getPreference(
	    $name,
	    $category = 'global'
	    )
	{
	    // for BC
	    if ( func_num_args() > 2 ) {
	        $user = func_get_arg(2);
	        $GLOBALS['log']->deprecated('User::getPreference() should not be used statically.');
	    }
	    else
	        $user = $this;

        return $user->_userPreferenceFocus->getPreference($name, $category);
	}

   /**
    * Get WHERE clause that fetches all users counted for licensing purposes
    * @return string
    */
	public static function getLicensedUsersWhere()
	{
		return "deleted=0 AND status='Active' AND user_name IS NOT NULL AND is_group=0 AND portal_only=0  AND ".$GLOBALS['db']->convert('user_name', 'length').">0";
	    return "1<>1";
	}

	function save($check_notify = false) {
		$isUpdate = !empty($this->id) && !$this->new_with_id;

		// this will cause the logged in admin to have the licensed user count refreshed
		if (isset($_SESSION)) unset($_SESSION['license_seats_needed']);

		$query = "SELECT count(id) as total from users WHERE ".self::getLicensedUsersWhere();


		global $sugar_flavor;
        $admin = new Administration();
        $admin->retrieveSettings();
		if((isset($sugar_flavor) && $sugar_flavor != null) &&
			($sugar_flavor=='CE' || isset($admin->settings['license_enforce_user_limit']) && $admin->settings['license_enforce_user_limit'] == 1)){

	        // Begin Express License Enforcement Check
			// this will cause the logged in admin to have the licensed user count refreshed
				if( isset($_SESSION['license_seats_needed']))
			        unset($_SESSION['license_seats_needed']);
		     	if ($this->portal_only != 1 && $this->is_group != 1 && (empty($this->fetched_row) || $this->fetched_row['status'] == 'Inactive' || $this->fetched_row['status'] == '') && $this->status == 'Active'){
			        global $sugar_flavor;
					//if((isset($sugar_flavor) && $sugar_flavor != null) && ($sugar_flavor=='CE')){
			            $license_users = $admin->settings['license_users'];
			            if ($license_users != '') {
	            			global $db;
	            			//$query = "SELECT count(id) as total from users WHERE status='Active' AND deleted=0 AND is_group=0 AND portal_only=0";
							$result = $db->query($query, true, "Error filling in user array: ");
							$row = $db->fetchByAssoc($result);
				            $license_seats_needed = $row['total'] - $license_users;
			            }
				        else
				        	$license_seats_needed = -1;
				        if( $license_seats_needed >= 0 ){
				           // displayAdminError( translate('WARN_LICENSE_SEATS_MAXED', 'Administration'). ($license_seats_needed + 1) . translate('WARN_LICENSE_SEATS2', 'Administration')  );
						    if (isset($_REQUEST['action']) && $_REQUEST['action'] != 'MassUpdate' && $_REQUEST['action'] != 'Save') {
					            die(translate('WARN_LICENSE_SEATS_EDIT_USER', 'Administration'). ' ' . translate('WARN_LICENSE_SEATS2', 'Administration'));
						    }
							else if (isset($_REQUEST['action'])){ // When this is not set, we're coming from the installer.
								$sv = new SugarView();
							    $sv->init('Users');
							    $sv->renderJavascript();
							    $sv->displayHeader();
		        				$sv->errors[] = translate('WARN_LICENSE_SEATS_EDIT_USER', 'Administration'). ' ' . translate('WARN_LICENSE_SEATS2', 'Administration');
                                $sv->displayErrors();
                                $sv->displayFooter();
							    die();
						  	}
				        }
			        //}
		     	}
			}
            // End Express License Enforcement Check


		// wp: do not save user_preferences in this table, see user_preferences module
		$this->user_preferences = '';

		// if this is an admin user, do not allow is_group or portal_only flag to be set.
		if ($this->is_admin) {
			$this->is_group = 0;
			$this->portal_only = 0;
		}




		//this code is meant to allow for the team widget to set the team_id as the 'Primary' team and
		//then b/c Users uses the default_team field we can map it back when committing the user to the database.
		if(!empty($this->team_id)){
			$this->default_team = $this->team_id;
		}else{
			$this->team_id = $this->default_team;
		}



		parent::save($check_notify);

		$GLOBALS['sugar_config']['disable_team_access_check'] = true;
        if($this->status != 'Reserved' && !$this->portal_only) {
		   // If this is not an update, then make sure the new user logic is executed.
            if (!$isUpdate) {
                // If this is a new user, make sure to add them to the appriate default teams
                if (!$this->team_exists) {
                    $team = new Team();
                    $team->new_user_created($this);
                }
            }else{
                //if this is an update, then we need to ensure we keep the user's
                //private team name and name_2 in sync with their name.
                $team_id = $this->getPrivateTeamID();
                if(!empty($team_id)){

                    $team = new Team();
                    $team->retrieve($team_id);
                    Team::set_team_name_from_user($team, $this);
                    $team->save();
                }
            }
		}


        $this->savePreferencesToDB();
        return $this->id;
	}

	/**
	* @return boolean true if the user is a member of the role_name, false otherwise
	* @param string $role_name - Must be the exact name of the acl_role
	* @param string $user_id - The user id to check for the role membership, empty string if current user
	* @desc Determine whether or not a user is a member of an ACL Role. This function caches the
	*       results in the session or to prevent running queries after the first time executed.
	* Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	* All Rights Reserved..
	* Contributor(s): ______________________________________..
	*/
	function check_role_membership($role_name, $user_id = ''){

		global $current_user;

		if(empty($user_id))
			$user_id = $current_user->id;

		// Check the Sugar External Cache to see if this users memberships were cached
		$role_array = sugar_cache_retrieve("RoleMemberships_".$user_id);

		// If we are pulling the roles for the current user
		if($user_id == $current_user->id){
			// If the Session doesn't contain the values
			if(!isset($_SESSION['role_memberships'])){
				// This means the external cache already had it loaded
				if(!empty($role_array))
					$_SESSION['role_memberships'] = $role_array;
				else{
					$_SESSION['role_memberships'] = ACLRole::getUserRoleNames($user_id);
					$role_array = $_SESSION['role_memberships'];
				}
			}
			// else the session had the values, so we assign to the role array
			else{
				$role_array = $_SESSION['role_memberships'];
			}
		}
		else{
			// If the external cache didn't contain the values, we get them and put them in cache
			if(!$role_array){
				$role_array = ACLRole::getUserRoleNames($user_id);
				sugar_cache_put("RoleMemberships_".$user_id, $role_array);
			}
		}

		// If the role doesn't exist in the list of the user's roles
		if(!empty($role_array) && in_array($role_name, $role_array))
			return true;
		else
			return false;
	}

    function get_summary_text() {
        //$this->_create_proper_name_field();
        return $this->name;
	}

	/**
	* @return string encrypted password for storage in DB and comparison against DB password.
	* @param string $user_name - Must be non null and at least 2 characters
	* @param string $user_password - Must be non null and at least 1 character.
	* @desc Take an unencrypted username and password and return the encrypted password
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function encrypt_password($user_password) {
		// encrypt the password.
		$salt = substr($this->user_name, 0, 2);
		$encrypted_password = crypt($user_password, $salt);

		return $encrypted_password;
	}

	/**
	 * Authenicates the user; returns true if successful
	 *
	 * @param $password
	 * @return bool
	 */
	public function authenticate_user(
	    $password
	    )
	{
		$password = $GLOBALS['db']->quote($password);
		$user_name = $GLOBALS['db']->quote($this->user_name);
		$query = "SELECT * from $this->table_name where user_name='$user_name' AND user_hash='$password' AND (portal_only IS NULL OR portal_only !='1') AND (is_group IS NULL OR is_group !='1') ";
		//$result = $this->db->requireSingleResult($query, false);
		$result = $this->db->limitQuery($query,0,1,false);
		$a = $this->db->fetchByAssoc($result);
		// set the ID in the seed user.  This can be used for retrieving the full user record later
		if (empty ($a)) {
			// already logging this in load_user() method
			//$GLOBALS['log']->fatal("SECURITY: failed login by $this->user_name");
			return false;
		} else {
			$this->id = $a['id'];
			return true;
		}
	}

    /**
     * retrieves an User bean
     * preformat name & full_name attribute with first/last
     * loads User's preferences
     *
     * @param string id ID of the User
     * @param bool encode encode the result
     * @return object User bean
     * @return null null if no User found
     */
	function retrieve($id, $encode = true, $deleted = true) {
		$ret = parent::retrieve($id, $encode, $deleted);
		if ($ret) {
			if (isset ($_SESSION)) {
				$this->loadPreferences();
			}
		}
		return $ret;
	}

	function retrieve_by_email_address($email) {

		$email1= strtoupper($email);
		$q=<<<EOQ

		select id from users where id in ( SELECT  er.bean_id AS id FROM email_addr_bean_rel er,
			email_addresses ea WHERE ea.id = er.email_address_id
		    AND ea.deleted = 0 AND er.deleted = 0 AND er.bean_module = 'Users' AND email_address_caps IN ('{$email}') )
EOQ;


		$res=$this->db->query($q);
		$row=$this->db->fetchByAssoc($res);

		if (!empty($row['id'])) {
			return $this->retrieve($row['id']);
		}
		return '';
	}

   function bean_implements($interface) {
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }


	/**
	 * Load a user based on the user_name in $this
	 * @return -- this if load was successul and null if load failed.
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	 */
	function load_user($user_password) {
		global $login_error;
		unset($GLOBALS['login_error']);
		if(isset ($_SESSION['loginattempts'])) {
			$_SESSION['loginattempts'] += 1;
		} else {
			$_SESSION['loginattempts'] = 1;
		}
		if($_SESSION['loginattempts'] > 5) {
			$GLOBALS['log']->fatal('SECURITY: '.$this->user_name.' has attempted to login '.$_SESSION['loginattempts'].' times from IP address: '.$_SERVER['REMOTE_ADDR'].'.');
		}

		$GLOBALS['log']->debug("Starting user load for $this->user_name");

		if (!isset ($this->user_name) || $this->user_name == "" || !isset ($user_password) || $user_password == "")
			return null;

		$user_hash = strtolower(md5($user_password));
		if($this->authenticate_user($user_hash)) {
			$query = "SELECT * from $this->table_name where id='$this->id'";
		} else {
			$GLOBALS['log']->fatal('SECURITY: User authentication for '.$this->user_name.' failed');
			return null;
		}
		$r = $this->db->limitQuery($query, 0, 1, false);
		$a = $this->db->fetchByAssoc($r);
		if(empty($a) || !empty ($GLOBALS['login_error'])) {
			$GLOBALS['log']->fatal('SECURITY: User authentication for '.$this->user_name.' failed - could not Load User from Database');
			return null;
		}

		// Get the fields for the user
		$row = $a;

		// If there is no user_hash is not present or is out of date, then create a new one.
		if (!isset ($row['user_hash']) || $row['user_hash'] != $user_hash) {
			$query = "UPDATE $this->table_name SET user_hash='$user_hash' where id='{$row['id']}'";
			$this->db->query($query, true, "Error setting new hash for {$row['user_name']}: ");
		}

		// now fill in the fields.
		foreach ($this->column_fields as $field) {
			$GLOBALS['log']->info($field);

			if (isset ($row[$field])) {
				$GLOBALS['log']->info("=".$row[$field]);

				$this-> $field = $row[$field];
			}
		}

		$this->loadPreferences();


		require_once ('modules/Versions/CheckVersions.php');
		$invalid_versions = get_invalid_versions();

		if (!empty ($invalid_versions)) {
			if (isset ($invalid_versions['Rebuild Relationships'])) {
				unset ($invalid_versions['Rebuild Relationships']);

				// flag for pickup in DisplayWarnings.php
				$_SESSION['rebuild_relationships'] = true;
			}

			if (isset ($invalid_versions['Rebuild Extensions'])) {
				unset ($invalid_versions['Rebuild Extensions']);

				// flag for pickup in DisplayWarnings.php
				$_SESSION['rebuild_extensions'] = true;
			}

			$_SESSION['invalid_versions'] = $invalid_versions;
		}
		$this->fill_in_additional_detail_fields();
		if ($this->status != "Inactive")
			$this->authenticated = true;

		unset ($_SESSION['loginattempts']);
		return $this;
	}

	/**
	 * Verify that the current password is correct and write the new password to the DB.
	 *
	 * @param string $user name - Must be non null and at least 1 character.
	 * @param string $user_password - Must be non null and at least 1 character.
	 * @param string $new_password - Must be non null and at least 1 character.
	 * @return boolean - If passwords pass verification and query succeeds, return true, else return false.
	 */
	function change_password(
	    $user_password,
	    $new_password,
	    $system_generated = '0'
	    )
	{
	    global $mod_strings;
		global $current_user;
		$GLOBALS['log']->debug("Starting password change for $this->user_name");

		if (!isset ($new_password) || $new_password == "") {
			$this->error_string = $mod_strings['ERR_PASSWORD_CHANGE_FAILED_1'].$current_user->user_name.$mod_strings['ERR_PASSWORD_CHANGE_FAILED_2'];
			return false;
		}

		// Check new password against rules set by admin
		if (!$this->check_password_rules($new_password)) {
		    $this->error_string = $mod_strings['ERR_PASSWORD_CHANGE_FAILED_1'].$current_user->user_name.$mod_strings['ERR_PASSWORD_CHANGE_FAILED_3'];
		    return false;
		}

		$old_user_hash = strtolower(md5($user_password));

		if (!$current_user->isAdminForModule('Users')) {
			//check old password first
			$query = "SELECT user_name FROM $this->table_name WHERE user_hash='$old_user_hash' AND id='$this->id'";
			$result = $this->db->query($query, true);
			$row = $this->db->fetchByAssoc($result);
			$GLOBALS['log']->debug("select old password query: $query");
			$GLOBALS['log']->debug("return result of $row");
            if ($row == null) {
				$GLOBALS['log']->warn("Incorrect old password for ".$this->user_name."");
				$this->error_string = $mod_strings['ERR_PASSWORD_INCORRECT_OLD_1'].$this->user_name.$mod_strings['ERR_PASSWORD_INCORRECT_OLD_2'];
				return false;
			}
		}

        $user_hash = strtolower(md5($new_password));
        $this->setPreference('loginexpiration','0');
        //set new password
        $now = TimeDate::getInstance()->nowDb();
		$query = "UPDATE $this->table_name SET user_hash='$user_hash', system_generated_password='$system_generated', pwd_last_changed='$now' where id='$this->id'";
		$this->db->query($query, true, "Error setting new password for $this->user_name: ");
        $_SESSION['hasExpiredPassword'] = '0';
		return true;
	}
	
	/**
	 * Check new password against rules set by admin
	 * @param string $password
	 * @return boolean
	 */
	function check_password_rules($password) {
	    $length = mb_strlen($password);
	
	    // Min length
	    if(!empty($GLOBALS["sugar_config"]["passwordsetting"]["minpwdlength"]) && $GLOBALS["sugar_config"]["passwordsetting"]["minpwdlength"] > 0 && $length < $GLOBALS["sugar_config"]["passwordsetting"]["minpwdlength"]) {
	        return false;
	    }
	
	    // Max length
	    if(!empty($GLOBALS['sugar_config']['passwordsetting']['maxpwdlength']) && $GLOBALS['sugar_config']['passwordsetting']['maxpwdlength'] > 0 && $length > $GLOBALS['sugar_config']['passwordsetting']['maxpwdlength']) {
	        return false;
	    }
	
	    // One lower case
	    if(!empty($GLOBALS["sugar_config"]["passwordsetting"]["onelower"]) && !preg_match('/[a-z]+/', $password)){
	        return false;
	    }
	
	    // One upper case
	    if(!empty($GLOBALS["sugar_config"]["passwordsetting"]["oneupper"]) && !preg_match('/[A-Z]+/', $password)){
	        return false;
	    }
	
	    // One number
	    if(!empty($GLOBALS["sugar_config"]["passwordsetting"]["onenumber"]) && !preg_match('/[0-9]+/', $password)){
	        return false;
	    }
	
	    // One special character
	    if(!empty($GLOBALS["sugar_config"]["passwordsetting"]["onespecial"]) && !preg_match('/[|}{~!@#$%^&*()_+=-]+/', $password)){
	        return false;
	    }
	
	    // Custom regex
	    if(!empty($GLOBALS["sugar_config"]["passwordsetting"]["customregex"]) && !preg_match($GLOBALS["sugar_config"]["passwordsetting"]["customregex"], $password)){
	        return false;
	    }
	
	    return true;
	}
	
	function is_authenticated() {
		return $this->authenticated;
	}

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
		global $locale;

		$query = "SELECT u1.first_name, u1.last_name from users  u1, users  u2 where u1.id = u2.reports_to_id AND u2.id = '$this->id' and u1.deleted=0";
		$result = $this->db->query($query, true, "Error filling in additional detail fields");

		$row = $this->db->fetchByAssoc($result);

		if ($row != null) {
			$this->reports_to_name = stripslashes($row['first_name'].' '.$row['last_name']);
		} else {
			$this->reports_to_name = '';
		}
		$query = "SELECT team_id, teams.name, teams.name_2 FROM team_memberships rel RIGHT JOIN teams ON (rel.team_id = teams.id) WHERE rel.user_id = '{$this->id}' AND rel.team_id = '{$this->default_team}'";
		$result = $this->db->query($query, false, "Error retrieving team name: ");

		//rrs bug: 31277 - this tempDefaultTeam works in conjunction with the 'if' stmt below/
		//what was happening was that if the user was an admin user and they did not have team membership to their primary team
		//then this query would not return anything and the default_team would be set to empty, which is fine, but
		//we need to ensure that the team_id is not empty for team set widget purposes.
		$tempDefaultTeam = $this->default_team;

		$row = $this->db->fetchByAssoc($result);
		if (!empty ($row['team_id'])) {
			$this->default_team = $row['team_id'];
			$this->default_team_name = Team::getDisplayName($row['name'], $row['name_2'], $this->showLastNameFirst());
		} else {
			$this->default_team = '';
			$this->default_team_name = '';
			$this->team_set_id = '';
		}

		if(!empty($this->is_admin) && empty($this->default_team)){
			$this->team_id = $tempDefaultTeam;
		}else{
			$this->team_id = $this->default_team;
		}

		$this->_create_proper_name_field();
	}

	public function retrieve_user_id(
	    $user_name
	    )
	{
	    $userFocus = new User;
	    $userFocus->retrieve_by_string_fields(array('user_name'=>$user_name));
	    if ( empty($userFocus->id) )
	        return false;

        return $userFocus->id;
	}

	/**
	 * @return -- returns a list of all users in the system.
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	 */
	function verify_data($ieVerified=true) {
		global $mod_strings, $current_user;
		$verified = TRUE;

		if (!empty ($this->id)) {
			// Make sure the user doesn't report to themselves.
			$reports_to_self = 0;
			$check_user = $this->reports_to_id;
			$already_seen_list = array ();
			while (!empty ($check_user)) {
				if (isset ($already_seen_list[$check_user])) {
					// This user doesn't actually report to themselves
					// But someone above them does.
					$reports_to_self = 1;
					break;
				}
				if ($check_user == $this->id) {
					$reports_to_self = 1;
					break;
				}
				$already_seen_list[$check_user] = 1;
				$query = "SELECT reports_to_id FROM users WHERE id='".$this->db->quote($check_user)."'";
				$result = $this->db->query($query, true, "Error checking for reporting-loop");
				$row = $this->db->fetchByAssoc($result);
				echo ("fetched: ".$row['reports_to_id']." from ".$check_user."<br>");
				$check_user = $row['reports_to_id'];
			}

			if ($reports_to_self == 1) {
				$this->error_string .= $mod_strings['ERR_REPORT_LOOP'];
				$verified = FALSE;
			}
		}

		$query = "SELECT user_name from users where user_name='$this->user_name' AND deleted=0";
		if(!empty($this->id))$query .=  " AND id<>'$this->id'";
		$result = $this->db->query($query, true, "Error selecting possible duplicate users: ");
		$dup_users = $this->db->fetchByAssoc($result);

		if (!empty($dup_users)) {
			$this->error_string .= $mod_strings['ERR_USER_NAME_EXISTS_1'].$this->user_name.$mod_strings['ERR_USER_NAME_EXISTS_2'];
			$verified = FALSE;
		}

		if (is_admin($current_user)) {
		    $remaining_admins = $this->db->getOne("SELECT COUNT(*) as c from users where is_admin = 1 AND deleted=0");

			if (($remaining_admins <= 1) && ($this->is_admin != '1') && ($this->id == $current_user->id)) {
				$GLOBALS['log']->debug("Number of remaining administrator accounts: {$remaining_admins}");
				$this->error_string .= $mod_strings['ERR_LAST_ADMIN_1'].$this->user_name.$mod_strings['ERR_LAST_ADMIN_2'];
				$verified = FALSE;
			}
		}
		///////////////////////////////////////////////////////////////////////
		////	InboundEmail verification failure
		if(!$ieVerified) {
			$verified = false;
			$this->error_string .= '<br />'.$mod_strings['ERR_EMAIL_NO_OPTS'];
		}

		return $verified;
	}

	function get_list_view_data() {

		global $current_user, $mod_strings;
        // Bug #48555 Not User Name Format of User's locale.
        $this->_create_proper_name_field();

		$user_fields = $this->get_list_view_array();
		if ($this->is_admin)
			$user_fields['IS_ADMIN_IMAGE'] = SugarThemeRegistry::current()->getImage('check_inline', '',null,null,'.gif',$mod_strings['LBL_CHECKMARK']);
		elseif (!$this->is_admin) $user_fields['IS_ADMIN'] = '';
		if ($this->is_group)
			$user_fields['IS_GROUP_IMAGE'] = SugarThemeRegistry::current()->getImage('check_inline', '',null,null,'.gif',$mod_strings['LBL_CHECKMARK']);
		else
			$user_fields['IS_GROUP_IMAGE'] = '';


        if ($this->is_admin) {
      			$user_fields['IS_ADMIN_IMAGE'] = SugarThemeRegistry::current()->getImage('check_inline', '',null,null,'.gif',translate('LBL_CHECKMARK', 'Users'));
        } elseif (!$this->is_admin) {
              $user_fields['IS_ADMIN'] = '';
        }

      	if ($this->is_group) {
      		$user_fields['IS_GROUP_IMAGE'] = SugarThemeRegistry::current()->getImage('check_inline', '',null,null,'.gif',translate('LBL_CHECKMARK', 'Users'));
        } else {
            $user_fields['NAME'] = empty ($this->name) ? '' : $this->name;
        }

		$user_fields['REPORTS_TO_NAME'] = $this->reports_to_name;

		if(isset($_REQUEST['module']) && $_REQUEST['module'] == 'Teams' &&
			(isset($_REQUEST['record']) && !empty($_REQUEST['record'])) ) {
			$q = "SELECT count(*) c FROM team_memberships WHERE deleted=0 AND user_id = '{$this->id}' AND team_id = '{$_REQUEST['record']}' AND explicit_assign = 1";
			$r = $this->db->query($q);
			$a = $this->db->fetchByAssoc($r);

			$user_fields['UPLINE'] = translate('LBL_TEAM_UPLINE','Users');

			if($a['c'] > 0) {
				$user_fields['UPLINE'] = translate('LBL_TEAM_UPLINE_EXPLICIT','Users');
			}
		}
		$user_fields['EMAIL1'] = $this->emailAddress->getPrimaryAddress($this);

		return $user_fields;
	}

	function list_view_parse_additional_sections(& $list_form, $xTemplateSection) {
		return $list_form;
	}


	/**
	 * returns the private team_id of the user, or if an ID is passed, of the
	 * target user
	 * @param id guid
	 * @return string
	 */
	function getPrivateTeam($id='') {
		if(!empty($id)) {
			$user = new User();
			$user->retrieve($id);
			return $user->getPrivateTeamID();
		}
		return $this->getPrivateTeamID();
	}


	function get_my_teams($return_obj = FALSE) {
		$query = "SELECT DISTINCT rel.team_id, teams.name, teams.name_2, rel.implicit_assign FROM team_memberships rel RIGHT JOIN teams ON (rel.team_id = teams.id) WHERE rel.user_id = '{$this->id}' AND rel.deleted = 0 ORDER BY teams.name ASC";
		$result = $this->db->query($query, false, "Error retrieving user ID: ");
		$out = Array ();

		if ($return_obj) {

			$x = 0;
		}

		while ($row = $this->db->fetchByAssoc($result)) {
			if ($return_obj) {
				$out[$x] = new Team();
				$out[$x]->retrieve($row['team_id']);
				$out[$x++]->implicit_assign = $row['implicit_assign'];
			} else {
				$out[$row['team_id']] = Team::getDisplayName($row['name'], $row['name_2']);
			}
		}

		return $out;
	}

	function getAllTeams() {
		$q = "SELECT id, name FROM teams WHERE private = 0 AND deleted = 0";
		$r = $this->db->query($q);

		$ret = array();
		while($a = $this->db->fetchByAssoc($r)) {
			$ret[$a['id']] = $a['name'];
		}

		return $ret;
	}

	/**
	 * When the user's reports to id is changed, this method is called.  This method needs to remove all
	 * of the implicit assignements that were created based on this user, then recreated all of the implicit
	 * assignments in the new location
	 */
	function update_team_memberships($old_reports_to_id) {

		$team = new Team();
		$team->user_manager_changed($this->id, $old_reports_to_id, $this->reports_to_id);
	}

	
    /**
     * getAllUsers
     *
     * Returns all active and inactive users
     * @return Array of all users in the system
     */

    public static function getAllUsers()
    {
        $active_users = get_user_array(FALSE);
        $inactive_users = get_user_array(FALSE, "Inactive");
        $result = $active_users + $inactive_users;
        asort($result);
        return $result;
    }

	function create_export_query($order_by, $where) {
		include('modules/Users/field_arrays.php');

		$cols = '';
		foreach($fields_array['User']['export_fields'] as $field) {
			$cols .= (empty($cols)) ? '' : ', ';
			$cols .= $field;
		}

		$query = "SELECT {$cols} FROM users ";

		$where_auto = " users.deleted = 0";

		if ($where != "")
			$query .= " WHERE $where AND ".$where_auto;
		else
			$query .= " WHERE ".$where_auto;

		// admin for module user is not be able to export a super-admin
		global $current_user;
		if(!$current_user->is_admin){
			$query .= " AND users.is_admin=0";
		}

		if ($order_by != "")
			$query .= " ORDER BY $order_by";
		else
			$query .= " ORDER BY users.user_name";

		return $query;
	}

	/** Returns a list of the associated users
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function get_meetings() {
		// First, get the list of IDs.
		$query = "SELECT meeting_id as id from meetings_users where user_id='$this->id' AND deleted=0";
		return $this->build_related_list($query, new Meeting());
	}
	function get_calls() {
		// First, get the list of IDs.
		$query = "SELECT call_id as id from calls_users where user_id='$this->id' AND deleted=0";
		return $this->build_related_list($query, new Call());
	}

	/**
	 * generates Javascript to display I-E mail counts, both personal and group
	 */
	function displayEmailCounts() {
		global $theme;
		$new = translate('LBL_NEW', 'Emails');
		$default = 'index.php?module=Emails&action=ListView&assigned_user_id='.$this->id;
		$count = '';
		$verts = array('Love', 'Links', 'Pipeline', 'RipCurl', 'SugarLite');

		if($this->hasPersonalEmail()) {
			$r = $this->db->query('SELECT count(*) AS c FROM emails WHERE deleted=0 AND assigned_user_id = \''.$this->id.'\' AND type = \'inbound\' AND status = \'unread\'');
			$a = $this->db->fetchByAssoc($r);
			if(in_array($theme, $verts)) {
				$count .= '<br />';
			} else {
				$count .= '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			$count .= '<a href='.$default.'&type=inbound>'.translate('LBL_LIST_TITLE_MY_INBOX', 'Emails').': ('.$a['c'].' '.$new.')</a>';

			if(!in_array($theme, $verts)) {
				$count .= ' - ';
			}
		}

		$r = $this->db->query('SELECT id FROM users WHERE users.is_group = 1 AND deleted = 0');
		$groupIds = '';
		$groupNew = '';
		while($a = $this->db->fetchByAssoc($r)) {
			if($groupIds != '') {$groupIds .= ', ';}
			$groupIds .= "'".$a['id']."'";
		}

		$total = 0;
		if(strlen($groupIds) > 0) {
			$groupQuery = 'SELECT count(*) AS c FROM emails ';
			$this->add_team_security_where_clause($groupQuery);
			$groupQuery .= ' WHERE emails.deleted=0 AND emails.assigned_user_id IN ('.$groupIds.') AND emails.type = \'inbound\' AND emails.status = \'unread\'';
			$r = $this->db->query($groupQuery);
			if(is_resource($r)) {
				$a = $this->db->fetchByAssoc($r);
				if($a['c'] > 0) {
					$total = $a['c'];
				}
			}
		}
		if(in_array($theme, $verts)) $count .= '<br />';
		if(empty($count)) $count .= '&nbsp;&nbsp;&nbsp;&nbsp;';
		$count .= '<a href=index.php?module=Emails&action=ListViewGroup>'.translate('LBL_LIST_TITLE_GROUP_INBOX', 'Emails').': ('.$total.' '.$new.')</a>';

		$out  = '<script type="text/javascript" language="Javascript">';
		$out .= 'var welcome = document.getElementById("welcome");';
		$out .= 'var welcomeContent = welcome.innerHTML;';
		$out .= 'welcome.innerHTML = welcomeContent + "'.$count.'";';
		$out .= '</script>';

		echo $out;
	}

	function getPreferredEmail() {
		$ret = array ();
		$nameEmail = $this->getUsersNameAndEmail();
		$prefAddr = $nameEmail['email'];
		$fullName = $nameEmail['name'];
		if (empty ($prefAddr)) {
			$nameEmail = $this->getSystemDefaultNameAndEmail();
			$prefAddr = $nameEmail['email'];
			$fullName = $nameEmail['name'];
		} // if
		$fullName = from_html($fullName);
		$ret['name'] = $fullName;
		$ret['email'] = $prefAddr;
		return $ret;
	}

	function getUsersNameAndEmail()
	{
	    // Bug #48555 Not User Name Format of User's locale.
	    $this->_create_proper_name_field();

		$prefAddr = $this->emailAddress->getPrimaryAddress($this);

		if (empty ($prefAddr)) {
			$prefAddr = $this->emailAddress->getReplyToAddress($this);
		}
		return array('email' => $prefAddr , 'name' => $this->name);

	} // fn

	function getSystemDefaultNameAndEmail() {

		$email = new Email();
		$return = $email->getSystemDefaultEmail();
		$prefAddr = $return['email'];
		$fullName = $return['name'];
		return array('email' => $prefAddr , 'name' => $fullName);
	} // fn

	/**
	 * sets User email default in config.php if not already set by install - i.
	 * e., upgrades
	 */
	function setDefaultsInConfig() {
		global $sugar_config;
		$sugar_config['email_default_client'] = 'sugar';
		$sugar_config['email_default_editor'] = 'html';
		ksort($sugar_config);
		write_array_to_file('sugar_config', $sugar_config, 'config.php');
		return $sugar_config;
	}

    /**
     * returns User's email address based on descending order of preferences
     *
     * @param string id GUID of target user if needed
     * @return array Assoc array for an email and name
     */
    function getEmailInfo($id='') {
        $user = $this;
        if(!empty($id)) {
            $user = new User();
            $user->retrieve($id);
        }

        // from name
        $fromName = $user->getPreference('mail_fromname');
        if(empty($fromName)) {
        	// cn: bug 8586 - localized name format
            $fromName = $user->full_name;
        }

        // from address
        $fromaddr = $user->getPreference('mail_fromaddress');
        if(empty($fromaddr)) {
            if(!empty($user->email1) && isset($user->email1)) {
                $fromaddr = $user->email1;
            } elseif(!empty($user->email2) && isset($user->email2)) {
                $fromaddr = $user->email2;
            } else {
                $r = $user->db->query("SELECT value FROM config WHERE name = 'fromaddress'");
                $a = $user->db->fetchByAssoc($r);
                $fromddr = $a['value'];
            }
        }

        $ret['name'] = $fromName;
        $ret['email'] = $fromaddr;

        return $ret;
    }

	/**
	 * returns opening <a href=xxxx for a contact, account, etc
	 * cascades from User set preference to System-wide default
	 * @return string	link
	 * @param attribute the email addy
	 * @param focus the parent bean
	 * @param contact_id
	 * @param return_module
	 * @param return_action
	 * @param return_id
	 * @param class
	 */
	function getEmailLink2($emailAddress, &$focus, $contact_id='', $ret_module='', $ret_action='DetailView', $ret_id='', $class='') {
		$emailLink = '';
		global $sugar_config;

		if(!isset($sugar_config['email_default_client'])) {
			$this->setDefaultsInConfig();
		}

		$userPref = $this->getPreference('email_link_type');
		$defaultPref = $sugar_config['email_default_client'];
		if($userPref != '') {
			$client = $userPref;
		} else {
			$client = $defaultPref;
		}
		// check for presence of a mobile device, if so use it's email client
		if(isset($_SESSION['isMobile'])){
			$client = 'other';
		}

		if($client == 'sugar') {
			$email = '';
			$to_addrs_ids = '';
			$to_addrs_names = '';
			$to_addrs_emails = '';

			$fullName = !empty($focus->name) ? $focus->name : '';

			if(empty($ret_module)) $ret_module = $focus->module_dir;
			if(empty($ret_id)) $ret_id = $focus->id;
			if($focus->object_name == 'Contact') {
				$contact_id = $focus->id;
				$to_addrs_ids = $focus->id;
				// Bug #48555 Not User Name Format of User's locale.
				$focus->_create_proper_name_field();
			    $fullName = $focus->name;
			    $to_addrs_names = $fullName;
				$to_addrs_emails = $focus->email1;
			}

			$emailLinkUrl = 'contact_id='.$contact_id.
				'&parent_type='.$focus->module_dir.
				'&parent_id='.$focus->id.
				'&parent_name='.urlencode($fullName).
				'&to_addrs_ids='.$to_addrs_ids.
				'&to_addrs_names='.urlencode($to_addrs_names).
				'&to_addrs_emails='.urlencode($to_addrs_emails).
				'&to_email_addrs='.urlencode($fullName . '&nbsp;&lt;' . $emailAddress . '&gt;').
				'&return_module='.$ret_module.
				'&return_action='.$ret_action.
				'&return_id='.$ret_id;

    		//Generate the compose package for the quick create options.
    		//$json = getJSONobj();
    		//$composeOptionsLink = $json->encode( array('composeOptionsLink' => $emailLinkUrl,'id' => $focus->id) );
			require_once('modules/Emails/EmailUI.php');
            $eUi = new EmailUI();
            $j_quickComposeOptions = $eUi->generateComposePackageForQuickCreateFromComposeUrl($emailLinkUrl, true);

    		$emailLink = "<a href='javascript:void(0);' onclick='SUGAR.quickCompose.init($j_quickComposeOptions);' class='$class'>";

		} else {
			// straight mailto:
			$emailLink = '<a href="mailto:'.$emailAddress.'" class="'.$class.'">';
		}

		return $emailLink;
	}

	/**
	 * returns opening <a href=xxxx for a contact, account, etc
	 * cascades from User set preference to System-wide default
	 * @return string	link
	 * @param attribute the email addy
	 * @param focus the parent bean
	 * @param contact_id
	 * @param return_module
	 * @param return_action
	 * @param return_id
	 * @param class
	 */
	function getEmailLink($attribute, &$focus, $contact_id='', $ret_module='', $ret_action='DetailView', $ret_id='', $class='') {
	    $emailLink = '';
		global $sugar_config;

		if(!isset($sugar_config['email_default_client'])) {
			$this->setDefaultsInConfig();
		}

		$userPref = $this->getPreference('email_link_type');
		$defaultPref = $sugar_config['email_default_client'];
		if($userPref != '') {
			$client = $userPref;
		} else {
			$client = $defaultPref;
		}
		// check for presence of a mobile device, if so use it's email client
		if(isset($_SESSION['isMobile'])){
			$client = 'other';
		}

		if($client == 'sugar') {
			$email = '';
			$to_addrs_ids = '';
			$to_addrs_names = '';
			$to_addrs_emails = '';

            $fullName = !empty($focus->name) ? $focus->name : '';

			if(!empty($focus->$attribute)) {
				$email = $focus->$attribute;
			}


			if(empty($ret_module)) $ret_module = $focus->module_dir;
			if(empty($ret_id)) $ret_id = $focus->id;
			if($focus->object_name == 'Contact') {
				// Bug #48555 Not User Name Format of User's locale.
				$focus->_create_proper_name_field();
			    $fullName = $focus->name;
			    $contact_id = $focus->id;
				$to_addrs_ids = $focus->id;
				$to_addrs_names = $fullName;
				$to_addrs_emails = $focus->email1;
			}

			$emailLinkUrl = 'contact_id='.$contact_id.
				'&parent_type='.$focus->module_dir.
				'&parent_id='.$focus->id.
				'&parent_name='.urlencode($fullName).
				'&to_addrs_ids='.$to_addrs_ids.
				'&to_addrs_names='.urlencode($to_addrs_names).
				'&to_addrs_emails='.urlencode($to_addrs_emails).
				'&to_email_addrs='.urlencode($fullName . '&nbsp;&lt;' . $email . '&gt;').
				'&return_module='.$ret_module.
				'&return_action='.$ret_action.
				'&return_id='.$ret_id;

			//Generate the compose package for the quick create options.
    		require_once('modules/Emails/EmailUI.php');
            $eUi = new EmailUI();
            $j_quickComposeOptions = $eUi->generateComposePackageForQuickCreateFromComposeUrl($emailLinkUrl, true);
    		$emailLink = "<a href='javascript:void(0);' onclick='SUGAR.quickCompose.init($j_quickComposeOptions);' class='$class'>";

		} else {
			// straight mailto:
			$emailLink = '<a href="mailto:'.$focus->$attribute.'" class="'.$class.'">';
		}

		return $emailLink;
	}


	/**
	 * gets a human-readable explanation of the format macro
	 * @return string Human readable name format
	 */
	function getLocaleFormatDesc() {
		global $locale;
		global $mod_strings;
		global $app_strings;

		$format['f'] = $mod_strings['LBL_LOCALE_DESC_FIRST'];
		$format['l'] = $mod_strings['LBL_LOCALE_DESC_LAST'];
		$format['s'] = $mod_strings['LBL_LOCALE_DESC_SALUTATION'];
		$format['t'] = $mod_strings['LBL_LOCALE_DESC_TITLE'];

		$name['f'] = $app_strings['LBL_LOCALE_NAME_EXAMPLE_FIRST'];
		$name['l'] = $app_strings['LBL_LOCALE_NAME_EXAMPLE_LAST'];
		$name['s'] = $app_strings['LBL_LOCALE_NAME_EXAMPLE_SALUTATION'];
		$name['t'] = $app_strings['LBL_LOCALE_NAME_EXAMPLE_TITLE'];

		$macro = $locale->getLocaleFormatMacro();

		$ret1 = '';
		$ret2 = '';
		for($i=0; $i<strlen($macro); $i++) {
			if(array_key_exists($macro{$i}, $format)) {
				$ret1 .= "<i>".$format[$macro{$i}]."</i>";
				$ret2 .= "<i>".$name[$macro{$i}]."</i>";
			} else {
				$ret1 .= $macro{$i};
				$ret2 .= $macro{$i};
			}
		}
		return $ret1."<br />".$ret2;
	}


	public function getPrivateTeamID()
	{
	    return self::staticGetPrivateTeamID($this->id);
	}

    public static function staticGetPrivateTeamID($user_id)
	{
	    $teamFocus = new Team;
	    $teamFocus->retrieve_by_string_fields(array('associated_user_id'=>$user_id));
	    if ( empty($teamFocus->id) )
	        return '';

	    return $teamFocus->id;
	}
    /*
     *
     * Here are the multi level admin access check functions.
     *
     */
    /**
     * Helper function to remap some modules around ACL wise
     *
     * @return string
     */
    protected function _fixupModuleForACL($module) {
        if($module=='ContractTypes') {
            $module = 'Contracts';
        }
        if(preg_match('/Product[a-zA-Z]*/',$module)) {
            $module = 'Products';
        }

        return $module;
    }
    /**
     * Helper function that enumerates the list of modules and checks if they are an admin/dev.
     * The code was just too similar to copy and paste.
     *
     * @return array
     */
    protected function _getModulesForACL($type='dev'){
        $isDev = $type=='dev';
        $isAdmin = $type=='admin';

        global $beanList;
        $myModules = array();

        if (!is_array($beanList) ) {
            return $myModules;
        }

        // These modules don't take kindly to the studio trying to play about with them.
        static $ignoredModuleList = array('iFrames','Feeds','Home','Dashboard','Calendar','Activities','Reports');


        $actions = ACLAction::getUserActions($this->id);

        foreach ($beanList as $module=>$val) {
            // Remap the module name
            $module = $this->_fixupModuleForACL($module);
            if (in_array($module,$myModules)) {
                // Already have the module in the list
                continue;
            }
            if (in_array($module,$ignoredModuleList)) {
                // You can't develop on these modules.
                continue;
            }

            $key = 'module';

            if (($this->isAdmin() && isset($actions[$module][$key]))
                || (isset($actions[$module][$key]['admin']['aclaccess']) &&
                    (($isDev&&$actions[$module][$key]['admin']['aclaccess'] == ACL_ALLOW_DEV) ||
                     ($isAdmin&&$actions[$module][$key]['admin']['aclaccess'] == ACL_ALLOW_ADMIN) ||
                     $actions[$module][$key]['admin']['aclaccess'] == ACL_ALLOW_ADMIN_DEV) )
                ) {
                $myModules[] = $module;
            }
        }

        return $myModules;
    }
    /**
     * Is this user a system wide admin
     *
     * @return bool
     */
    public function isAdmin() {
        if(isset($this->is_admin)
           &&($this->is_admin == '1' || $this->is_admin === 'on')){
            return true;
        }
        return false;
    }
    /**
     * Is this user a developer for any module
     *
     * @return bool
     */
    public function isDeveloperForAnyModule() {
        if ($this->isAdmin()) {
            return true;
        }
        if (count($this->getDeveloperModules())>0) {
            return true;
        }
        return false;
    }
    /**
     * List the modules a user has developer access to
     *
     * @return array
     */
    public function getDeveloperModules() {
        static $developerModules;
        if (!isset($_SESSION[$this->user_name.'_get_developer_modules_for_user']) ) {
            $_SESSION[$this->user_name.'_get_developer_modules_for_user'] = $this->_getModulesForACL('dev');
        }

        return $_SESSION[$this->user_name.'_get_developer_modules_for_user'];
    }
    /**
     * Is this user a developer for the specified module
     *
     * @return bool
     */
    public function isDeveloperForModule($module) {
        if ($this->isAdmin()) {
            return true;
        }

        $devModules = $this->getDeveloperModules();

        $module = $this->_fixupModuleForACL($module);

        if (in_array($module,$devModules) ) {
            return true;
        }

        return false;
    }
    /**
     * List the modules a user has admin access to
     *
     * @return array
     */
    public function getAdminModules() {
        if (!isset($_SESSION[$this->user_name.'_get_admin_modules_for_user']) ) {
            $_SESSION[$this->user_name.'_get_admin_modules_for_user'] = $this->_getModulesForACL('admin');
        }

        return $_SESSION[$this->user_name.'_get_admin_modules_for_user'];
    }
    /**
     * Is this user an admin for the specified module
     *
     * @return bool
     */
    public function isAdminForModule($module) {
        if ($this->isAdmin()) {
            return true;
        }

        $adminModules = $this->getAdminModules();

        $module = $this->_fixupModuleForACL($module);

        if (in_array($module,$adminModules) ) {
            return true;
        }

        return false;
    }
	/**
	 * Whether or not based on the user's locale if we should show the last name first.
	 *
	 * @return bool
	 */
	public function showLastNameFirst(){
		global $locale;
    	$localeFormat = $locale->getLocaleFormatMacro($this);
		if ( strpos($localeFormat,'l') > strpos($localeFormat,'f') ) {
                    return false;
        }else {
        	return true;
        }
	}

	function preprocess_fields_on_save(){
		parent::preprocess_fields_on_save();
        require_once('include/upload_file.php');
		$upload_file = new UploadFile("picture");

		//remove file
		if (isset($_REQUEST['remove_imagefile_picture']) && $_REQUEST['remove_imagefile_picture'] == 1)
		{
			$upload_file->unlink_file($this->picture);
			$this->picture="";
		}

		//uploadfile
		if (isset($_FILES['picture']))
		{
			//confirm only image file type can be uploaded
			$imgType = array('image/gif', 'image/png', 'image/bmp', 'image/jpeg', 'image/jpg', 'image/pjpeg');
			if (in_array($_FILES['picture']["type"], $imgType))
			{
				if ($upload_file->confirm_upload())
				{
					$this->picture = create_guid().".png";
					$upload_file->final_move( $this->picture);
					$path=$upload_file->get_upload_path($this->picture);
					if(!verify_image_file($path)) {
					    $this->picture = '';
					}
				}
			}
		}

		//duplicate field handling (in the event the Duplicate button was pressed)
		if(empty($this->picture) && !empty($_REQUEST['picture_duplicate'])) {
           $this->picture = $_REQUEST['picture_duplicate'];
		}
	}


   function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false)
   {	//call parent method, specifying for array to be returned
   	$ret_array = parent::create_new_list_query($order_by, $where,$filter,$params, $show_deleted,$join_type, true,$parentbean, $singleSelect);

   	//if this is being called from webservices, then run additional code
   	if(!empty($GLOBALS['soap_server_object'])){

		//if this is a single select, then secondary queries are being run that may result in duplicate rows being returned through the
		//left joins with meetings/tasks/call.  We need to change the left joins to include a null check (bug 40250)
	   	if($singleSelect)
	    	{
			//retrieve the 'from' string and make lowercase for easier manipulation
		        $left_str = strtolower($ret_array['from']);
		        $lefts = explode('left join', $left_str);
		        $new_left_str = '';

        		//explode on the left joins and process each one
		        foreach($lefts as $ljVal){
		        	//grab the join alias
	        	        $onPos = strpos( $ljVal, ' on');
	                	if($onPos === false){
		                	$new_left_str .=' '.$ljVal.' ';
		                        continue;
		                }
		                $spacePos = strrpos(substr($ljVal, 0, $onPos),' ');
		                $alias = substr($ljVal,$spacePos,$onPos-$spacePos);

		                //add null check to end of the Join statement
                        // Bug #46390 to use id_c field instead of id field for custom tables
                        if(substr($alias, -5) != '_cstm')
                        {
                            $ljVal ='  LEFT JOIN '.$ljVal.' and '.$alias.'.id is null ';
                        }
                        else
                        {
                            $ljVal ='  LEFT JOIN '.$ljVal.' and '.$alias.'.id_c is null ';
                        }

		                //add statement into new string
		                $new_left_str .= $ljVal;
		         }
	        	 //replace the old string with the new one
        		 $ret_array['from'] = $new_left_str;
	    	}
   	}

   		//return array or query string
   		if($return_array)
    	{
    		return $ret_array;
    	}

    	return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];



   }

    /**
     * Get user first day of week.
     *
     * @param [User] $user user object, current user if not specified
     * @return int : 0 = Sunday, 1 = Monday, etc...
     */
    public function get_first_day_of_week()
    {
        $fdow = $this->getPreference('fdow');
        if (empty($fdow))
        {
            $fdow = 0;
        }

        return $fdow;
    }

    /**
     * Method for password generation
     *
     * @static
     * @return string password
     */
    public static function generatePassword()
    {
        $res = $GLOBALS['sugar_config']['passwordsetting'];
        $charBKT = '';
        //chars to select from
        $LOWERCASE = "abcdefghijklmnpqrstuvwxyz";
        $NUMBER = "0123456789";
        $UPPERCASE = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $SPECIAL = '~!@#$%^&*()_+=-{}|';
        $condition = 0;
        $charBKT .= $UPPERCASE . $LOWERCASE . $NUMBER;
        $password = "";

        // Count the number of requirements
        if ($res['onenumber'] == '1')
        {
            $condition += 1;
        }
        if ($res['onelower'] == '1')
        {
            $condition += 1;
        }
        if ($res['oneupper'] == '1')
        {
            $condition += 1;
        }
        if ($res['onespecial']=='1')
        {
            $condition+=1;
        }

        // if there is more requirements than the minimum length, minimum length= number of requirements
        $length = $res['minpwdlength'] <= $condition ? $condition : $res['minpwdlength'];
        if ($length < 6)
        {
            $length = '6';
        }

        // Create random characters for the ones that doesnt have requirements
        for ($i=0; $i < $length - $condition; $i ++)  // loop and create password
        {
            $password = $password . substr ($charBKT, rand() % strlen($charBKT), 1);
        }
        if ($res['onelower'] == '1') // If a lower caracter is required, i add one in the password
        {
            if (strlen($password) != '0') // If there is other characters in the password, I insert one in a random position
            {
                $password = substr_replace($password, substr($LOWERCASE, rand() % strlen($LOWERCASE), 1), rand() % strlen($password), 0);
            }
            else // otherwise i put one in first position
            {
                $password = $password . substr($LOWERCASE, rand() % strlen($LOWERCASE), 1);
            }
        }
        if ($res['onenumber'] == '1')
        {
            if (strlen($password) != '0')
            {
                $password = substr_replace($password, substr($NUMBER, rand() % strlen($NUMBER), 1), rand() % strlen($password), 0);
            }
            else
            {
                $password = $password . substr ($NUMBER, rand() % strlen($NUMBER), 1);
            }
        }
        if ($res['oneupper'] == '1')
        {
            if (strlen($password) != '0')
            {
                $password = substr_replace($password, substr($UPPERCASE, rand() % strlen($UPPERCASE), 1), rand() % strlen($password), 0);
            }
            else
            {
                $password = $password . substr($UPPERCASE, rand() % strlen($UPPERCASE), 1);
            }
        }
        if ($res['onespecial'] == '1')
        {
            if (strlen($password) != '0')
            {
                $password = substr_replace($password, substr($SPECIAL, rand() % strlen($SPECIAL), 1), rand() % strlen($password), 0);
            }
            else
            {
                $password = $password . substr ($SPECIAL, rand() % strlen($SPECIAL), 1);
            }
        }

        return $password;
    }

    /**
     * Send new password or link to user
     *
     * @param string $templateId Id of email template
     * @param array $additionalData additional params: link, url, password
     * @return array status: true|false, message: error message, if status = false and message = '' it means that send method has returned false
     */
    public function sendEmailForPassword($templateId, array $additionalData = array())
    {
        global $sugar_config, $current_user;
        $mod_strings = return_module_language('', 'Users');
        $result = array(
            'status' => false,
            'message' => ''
        );

        $emailTemp = new EmailTemplate();
        $emailTemp->disable_row_level_security = true;
        if ($emailTemp->retrieve($templateId) == '')
        {
            $result['message'] = $mod_strings['LBL_EMAIL_TEMPLATE_MISSING'];
            return $result;
        }

        //replace instance variables in email templates
        $htmlBody = $emailTemp->body_html;
        $body = $emailTemp->body;
        if (isset($additionalData['link']) && $additionalData['link'] == true)
        {
            $htmlBody = str_replace('$contact_user_link_guid', $additionalData['url'], $htmlBody);
            $body = str_replace('$contact_user_link_guid', $additionalData['url'], $body);
        }
        else
        {
            $htmlBody = str_replace('$contact_user_user_hash', $additionalData['password'], $htmlBody);
            $body = str_replace('$contact_user_user_hash', $additionalData['password'], $body);
        }
        // Bug 36833 - Add replacing of special value $instance_url
        $htmlBody = str_replace('$config_site_url', $sugar_config['site_url'], $htmlBody);
        $body = str_replace('$config_site_url', $sugar_config['site_url'], $body);

        $htmlBody = str_replace('$contact_user_user_name', $this->user_name, $htmlBody);
        $htmlBody = str_replace('$contact_user_pwd_last_changed', TimeDate::getInstance()->nowDb(), $htmlBody);
        $body = str_replace('$contact_user_user_name', $this->user_name, $body);
        $body = str_replace('$contact_user_pwd_last_changed', TimeDate::getInstance()->nowDb(), $body);
        $emailTemp->body_html = $htmlBody;
        $emailTemp->body = $body;

        $itemail = $this->emailAddress->getPrimaryAddress($this);
        //retrieve IT Admin Email
        //_ppd( $emailTemp->body_html);
        //retrieve email defaults
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        $mail->setMailerForSystem();
        //$mail->IsHTML(true);
        $mail->From = $defaults['email'];
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->Subject = from_html($emailTemp->subject);
        if ($emailTemp->text_only != 1)
        {
            $mail->IsHTML(true);
            $mail->Body = from_html($emailTemp->body_html);
            $mail->AltBody = from_html($emailTemp->body);
        }
        else
        {
            $mail->Body_html = from_html($emailTemp->body_html);
            $mail->Body = from_html($emailTemp->body);
        }
        if ($mail->Body == '' && $current_user->is_admin)
        {
            global $app_strings;
            $result['message'] = $app_strings['LBL_EMAIL_TEMPLATE_EDIT_PLAIN_TEXT'];
            return $result;
        }
        if ($mail->Mailer == 'smtp' && $mail->Host =='' && $current_user->is_admin)
        {
            $result['message'] = $mod_strings['ERR_SERVER_SMTP_EMPTY'];
            return $result;
        }

        $mail->prepForOutbound();
        $hasRecipients = false;

        if (!empty($itemail))
        {
            if ($hasRecipients)
            {
                $mail->AddBCC($itemail);
            }
            else
            {
                $mail->AddAddress($itemail);
            }
            $hasRecipients = true;
        }
        if ($hasRecipients)
        {
            $result['status'] = @$mail->Send();
        }

        if ($result['status'] == true)
        {
            $emailObj->team_id = 1;
            $emailObj->to_addrs = '';
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject ;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = null;
            $emailObj->from_addr = $mail->From;
            $emailObj->parent_type = 'User';
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = '1';
            $emailObj->created_by = '1';
            $emailObj->status = 'sent';
            $emailObj->save();
            if (!isset($additionalData['link']) || $additionalData['link'] == false)
            {
                $user_hash = strtolower(md5($additionalData['password']));
                $this->setPreference('loginexpiration', '0');
                $this->setPreference('lockout', '');
                $this->setPreference('loginfailed', '0');
                $this->savePreferencesToDB();
                //set new password
                $now=TimeDate::getInstance()->nowDb();
                $query = "UPDATE $this->table_name SET user_hash='$user_hash', system_generated_password='1', pwd_last_changed='$now' where id='$this->id'";
                $this->db->query($query, true, "Error setting new password for $this->user_name: ");
            }
        }

        return $result;
    }

    // Bug #48014 Must to send password to imported user if this action is required
    function afterImportSave()
    {
        if(
            $this->user_hash == false
            && !$this->is_group
            && !$this->portal_only
            && isset($GLOBALS['sugar_config']['passwordsetting']['SystemGeneratedPasswordON'])
            && $GLOBALS['sugar_config']['passwordsetting']['SystemGeneratedPasswordON']
        )
        {
            $backUpPost = $_POST;
            $_POST = array(
                'userId' => $this->id
            );
            ob_start();
            require('modules/Users/GeneratePassword.php');
            $result = ob_get_clean();
            $_POST = $backUpPost;
            return $result == true;
        }
    }
}

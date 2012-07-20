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


require_once('modules/Teams/TeamMembership.php');

class Team extends SugarBean
{
	// Stored fields
	var $id;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $associated_user_id;

	var $name;
	var $description;
	var $description_head;
	var $private;
	var $team_count;

	// Misc info
	var $desc_maxsize = 100;
	var $private_teams = true;
	var $global_team = "1";
	var $table_name = "teams";
	var $rel_members_table = "team_memberships";
	var $object_name = "Team";
	var $module_dir = 'Teams';

	var $encodeFields = Array("name", "description");

    var $my_memberships=array();

	var $new_schema = true;

	function Team()
	{
		parent::SugarBean();
		$this->disable_row_level_security =true;
	}

	function save($check_notify = false)
	{
		require_once('modules/Teams/TeamSetManager.php');
		TeamSetManager::flushBackendCache();
		sugar_cache_put("teamname_{$this->id}",$this->name);
		return parent::save($check_notify);
	}

	function create_tables(){
		global $current_language;
		$mod_strings = return_module_language($current_language, 'Teams');

		parent::create_tables();
		Team::create_team("Global", $mod_strings['LBL_GLOBAL_TEAM_DESC'], $this->global_team);
	}

	function get_summary_text() {
		if (!isset($this->name_2)) $this->name_2='';
		return self::getDisplayName($this->name, $this->name_2);
	}

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();

		if (strlen($this->description) > $this->desc_maxsize) {
			$this->description_head = substr($this->description, 0, $this->desc_maxsize) . "...";
		}
		else {
			$this->description_head = $this->description;
		}

		$this->description_head = nl2br($this->description_head);
	}

	function fill_in_additional_detail_fields() {
	}

	function get_list_view_data() {
		$yes_label = isset($GLOBALS['app_list_strings']['dom_int_bool'][1]) ? $GLOBALS['app_list_strings']['dom_int_bool'][1] : 1;
		$no_label = isset($GLOBALS['app_list_strings']['dom_int_bool'][0]) ? $GLOBALS['app_list_strings']['dom_int_bool'][0] : 0;

		$team_fields = $this->get_list_view_array();
		$team_fields['NAME'] = self::getDisplayName($team_fields['NAME'], $team_fields['NAME_2']);
		$team_fields['PRIVATE'] = !empty($team_fields['PRIVATE']) ? $yes_label : $no_label;
		return $team_fields;
	}

	function list_view_parse_additional_sections(&$list_form, $xTemplateSection) {
		global $current_user;

		if (($_REQUEST['module'] == "Users") && ($_REQUEST['action'] == "DetailView"))
		{
			if ($current_user->isAdminForModule('Users'))
			{
			    $list_form->parse($xTemplateSection.".row.admin_team");
			    $list_form->parse($xTemplateSection.".row.admin_edit");
                $record = isset($_REQUEST['record']) ? $_REQUEST['record'] : '';
			    if ($this->associated_user_id == $record) {
                    $list_form->parse($xTemplateSection.".row.user_rem");
				} else if ( isset($this->implicit_assign) && $this->implicit_assign == '1' ) {
			        $list_form->parse($xTemplateSection.".row.user_rem");
			    } else {
			        $list_form->parse($xTemplateSection.".row.admin_rem");
			    }
			} else {
				$list_form->parse($xTemplateSection.".row.user_team");
				$list_form->parse($xTemplateSection.".row.user_edit");
				$list_form->parse($xTemplateSection.".row.user_rem");
			}
		}

		return $list_form;
	}

	function create_team($name, $description, $team_id = null, $private = 0, $name_2 = '', $associated_user_id = null) {
		$team = new Team();

		if(isset($team_id)) {
			$team->id = $team_id;
			$team->new_with_id = true;
		}

		$team->description = $description;
		$team->name = $name;
		$team->private = $private;
		$team->name_2 = $name_2;

		if(isset($associated_user_id)) {
			$team->associated_user_id = $associated_user_id;
		}


		$team->save();
		return $team->id;
	}

	/** This method creates the appropriate default team information for new users.
	 * Currently, this just adds them to the globally visible team.
	*/
	function new_user_created($user) {
		global $current_language, $dictionary;
		$mod_strings = return_module_language($current_language, 'Users');
		$team = new Team();
		//Explicitly set the field_defs variable here because the calling context could come from User
        $team->field_defs =	$dictionary[$team->object_name]['fields'];
		// add the user to the global team.
		$team->retrieve($this->global_team);
		$team->add_user_to_team($user->id);

		// If private teams are enabled, then create private teams for this user.
		if($this->private_teams == true) {
			// cn: bug 9751 - no longer can rely on ASCII-only user names
			$team_id = $user->getPrivateTeamID();

			if(empty($team_id)) {
				self::set_team_name_from_user($team, $user);
				$description = "{$mod_strings['LBL_PRIVATE_TEAM_FOR']} {$user->user_name}";
				$team_id = $this->create_team($user->first_name, $description, create_guid(), 1, $user->last_name, $user->id);
			}

			$team->retrieve($team_id);
			$team->add_user_to_team($user->id);
		}

		$su = new User();
		$su->retrieve($user->id);
		$team->retrieve($this->global_team);
		$su->default_team = $team->id;
		$su->team_id = $team->id;
		$su->team_set_id = $team->id;
		$su->save();
	}

	/**
	 * Retrieve all of the users that are members of this team.
	 * This list only includes explicitly assigned members.  (i.e. it will not show the manager of a member unless they are also explicty assigned).
	 */
	function get_team_members($only_active_users = false) {
		// Get the list of members
		$member = new TeamMembership();
		$member_list = $member->get_full_list("", "team_id='$this->id' and explicit_assign=1");

		$user_list = Array();

		// make sure we do not try and iterate over an empty list.
		if($member_list == null)
		{
			return $user_list;
		}

		// create user object and call retrieve with the user_id
		foreach($member_list as $current_member)
		{
			$user = new User();
			$user->retrieve($current_member->user_id);

			//if the flag $only_active_users is set to true, then we only want to return
			//active users. This was defined as part of workflow to not send out notifications
			//to inactive users
			if($only_active_users){
				if($user->status == 'Active'){
					$user_list[] = $user;
				}
			}
			else{
				$user_list[] = $user;
			}
		}

		return $user_list;
	}

	function mark_deleted() {
		$this->delete_team();
	}

	/**
	 * Delete a team and all team memberships.  This method will only work if no items are assigned to the team.
	 */
	function delete_team() {
		//todo: Verify that no items are still assigned to this team.
		if($this->id == $this->global_team) {
			$msg = $GLOBALS['app_strings']['LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'];
			$GLOBALS['log']->fatal($msg);
			die($msg);
		}

		//Check if the associated user is deleted
		$user = new User();
		$user->retrieve($this->associated_user_id);
		if($this->private == 1 && (!empty($user->id) && $user->deleted != 1))
		{
			$msg = string_format($GLOBALS['app_strings']['LBL_MASSUPDATE_DELETE_USER_EXISTS'], array(Team::getDisplayName($this->name, $this->name_2), $user->full_name));
			$GLOBALS['log']->error($msg);
            SugarApplication::appendErrorMessage($msg);
            return false;
		}

		// Update team_memberships table and set deleted = 1
		$query = "UPDATE team_memberships SET deleted = 1 WHERE team_id='{$this->id}'";
		$this->db->query($query,true,"Error deleting memberships while deleting team: ");

		// Update teams and set deleted = 1
		$query = "UPDATE teams SET deleted = 1 WHERE id='{$this->id}'";
		$this->db->query($query,true,"Error deleting team: ");

		require_once('modules/Teams/TeamSetManager.php');
		TeamSetManager::flushBackendCache();
		//clean up any team sets that use this team id
		TeamSetManager::removeTeamFromSets($this->id);

	    // Take the item off the recently viewed lists
	    $tracker = new Tracker();
	    $tracker->makeInvisibleForAll($this->id);
	}

	/**
	 * This method should be called when the duplicated team is saved for the first time.  It needs to be passed the original_team_id.
	 * It will copy each of the team memberships of the original team onto the new team.
	 * It is assumed that team duplication is for the sole purpose of starting with the team's memberhsip list.  After the duplicate team is saved,
	 * a call to the method complete_team_duplication() is required.  This is where the memberships are copied.
	 */
	function complete_team_duplication($original_team_id)
	{
		// Collect the full list of team memberships
		$query = "select id, user_id, explicit_assign, implicit_assign, deleted from team_memberships where team_id='$original_team_id'";
		$result = $this->db->query($query,true,"Error finding team memberships: ");

       $GLOBALS['log']->debug("About to duplicate team memberships. from team $original_team_id.");

		$membership = new TeamMembership();
		while(($row = $this->db->fetchByAssoc($result)) != false)
		{
			$membership->retrieve($row['id']);
			$membership->id=create_guid();
			$membership->user_id = $row['user_id'];
			$membership->new_with_id = TRUE;
			$membership->team_id = $this->id;
			$membership->explicit_assign = $row['explicit_assign'];
			$membership->implicit_assign = $row['implicit_assign'];
			$membership->deleted = $row['deleted'];
			$membership->save();
		}
	}

	/**
	* Validate the team memberships data structures.  Check for common problems that might surface.  Provide corrective scripts
	*/
	function validate_teams($user_id)
	{
		// get rid of compiler warning.
		$user_id = $user_id;
		// Memberships to a team that does not exist
		// Memberships that do not have implicit or explicit selected.
		// Recalculate full implicit team memberships
		// Find items that are on teams but the people they are assigned to cannot see them.
	}

    /**
     * Add the specified user to this team.
     * @param	int	$user_id
     * @param	User	$user_override
     */
    public function add_user_to_team($user_id, User $user_override = null)
    {
		$membership = new TeamMembership();
		$result = $membership->retrieve_by_user_and_team($user_id, $this->id);
        $membershipExists = false;

		if($result)
		{
			$GLOBALS['log']->debug("Found existing team membership.  $user_id is a member of $this->id");
			if($membership->explicit_assign)
			{
				// we are done.
                $membershipExists = true;
			}
			if($membership->implicit_assign)
			{

				if(isset($user_override))
				{
					$focus=$user_override;
				}
				else
				{
					$focus = new User();
					$focus->retrieve($user_id);
				}
                if (!empty($focus->reports_to_id))
                    $this->addManagerToTeam($focus->reports_to_id);

				$membership->explicit_assign = true;
				$membership->save();
				$membershipExists = true;
			}

			// This is an error.  There should not be a memberhsip row that does not have implicit or explicit asisgnments.
			$GLOBALS['log']->error("Membership record found (id $membership->id) that does not have a implicit or explicit assignment");
		}

        if (!$membershipExists)
        {
            $membership = new TeamMembership();
            $membership->user_id = $user_id;
            $membership->team_id = $this->id;
            $membership->explicit_assign = 1;
            $membership->save();
            $GLOBALS['log']->debug("Creating new explicit team memberhsip $user_id is a member of $this->id");
        }

		// Now it is time to update the management hierarchy to give them implicit access to this team.
		if(isset($user_override))
		{
			$focus=$user_override;
		}
		else
		{
			$focus = new User();
			$focus->retrieve($user_id);
		}
        if (!empty($focus->reports_to_id))
            $this->addManagerToTeam($focus->reports_to_id);
	}

    /**
     * Recursively add managers to the team
     * @param int $manager_id	Manager user id
     */
    private function addManagerToTeam($manager_id)
    {
        $manager = new User();
        $manager->retrieve($manager_id);
        $managers_membership = new TeamMembership();
        $result = $managers_membership->retrieve_by_user_and_team($manager->id, $this->id);

        if($result)
        {
            if($managers_membership->implicit_assign)
            {
                // We already have an implicit assignment.  It must have come from another person that reports to the focus.  Stop.
                $GLOBALS['log']->debug("Found existing implicit assignment $manager->id is a member of $this->id");
                $managers_membership->explicit_assign = true;
                $managers_membership->save();
                return;
            }
            if($managers_membership->explicit_assign)
            {
                // This is an explicit only assignment.  Add implicit and stop.
                $GLOBALS['log']->debug("Found existing explicit assignment $manager->id is a member of $this->id");
                $managers_membership->implicit_assign = true;
                $managers_membership->save();
                return;
            }

            // This is an error.  There should not be a memberhsip row that does not have implicit or explicit asisgnments.
            $GLOBALS['log']->error("Membership record found (id $membership->id) that does not have a implicit or explicit assignment");
        }
        else
        {
            // This user does not have an implict assign already, add it.
            $managers_membership = new TeamMembership();
            $managers_membership->user_id = $manager->id;
            $managers_membership->implicit_assign = true;
            $managers_membership->team_id = $this->id;
            $managers_membership->save();
            $GLOBALS['log']->debug("Creating new team memberhsip $manager->id is a member of $this->id");
        }

        // Since we added implicit membership we need to update the focuses global membership to indicate
        // it has implicit membership.
        $result = $managers_membership->retrieve_by_user_and_team($manager->id, 1);
        if($result)
        {
            if(!$managers_membership->implicit_assign)
            {
                $GLOBALS['log']->debug("Found existing membership for $manager->id is a member of 1, add implicit");
                $managers_membership->implicit_assign = true;
                $managers_membership->save();
            }
        }

        //go up to next manager
        if (!empty($manager->reports_to_id))
            $this->addManagerToTeam($manager->reports_to_id);
    }


	/**
	* Remove a user from the the team that this object represents.  This method only removes explicit team membership, if implicit is not also set.
	* It will always leave implicit team memberships intact. We leave records with both explicit and implicit set because there is no way to
	* differentiate records that are Explicit and Implicit, from records that are only implicit only in the rebuilding process.
	* An explicit team membership is when a user is manually added to a team.  An implicit team membership is one that is inherited through the reporting struction of the company.
	* @param user_override is used to pass in a user with a modified reports to id in cases where it just changed.
	*/
	function remove_user_from_team($user_id, $user_override=null)
	{
		// This is for cycle checking
		$visited_users = array();

		// Step0: Set the user to the initial focus
		$focus = new User();

		if(isset($user_override))
		{
			$focus=$user_override;
		} else {
			$focus->retrieve($user_id);
		}

		// Check to see if the user being deleted is the user's private team
		// the is_null($user_override) check is done because this function is also called from user_manager_changed
		// in which case we are not deleting the team, but changing who the user reports to
		if(is_null($user_override) && $this->id == $focus->getPrivateTeamID() && $this->deleted == 0)
		{
		   $error_message = translate('ERR_CANNOT_REMOVE_PRIVATE_TEAM', 'Teams');
		   $GLOBALS['log']->fatal($error_message);
		   throw new Exception($error_message);
		}

		// Step1: Add the current focus to the visited list
		$visited_users[$focus->id] = $focus->user_name;

		// Step2: Set explicit to false
		$membership = new TeamMembership();
		$result = $membership->retrieve_by_user_and_team($user_id, $this->id);
 		if($result)
		{
        	$GLOBALS['log']->debug("Found existing team membership.  $user_id is a member of $this->id");
            $this->load_relationship('users');

    		//if the user does not have implicit access, then we do not
    		//care what the explicit access is, delete the memnbership

    		//if the user has implicit and has explicit then update
    		//explicit flag, but do not delete.
    		if($membership->explicit_assign and $membership->implicit_assign)
    		{
    			//set explicit to 0
    			$membership->explicit_assign = 0;
    			$membership->save();
    		} else if (!$membership->explicit_assign and $membership->implicit_assign) {
                //preserve the implicit relationship
            }
            else {
                //delete   explcit implicit
                //             1     0
                //             0     0
                $this->users->delete($this->id,$user_id);
            }
            $manager = new User();
            $manager->reports_to_id = $focus->reports_to_id;
            while(!empty($manager->reports_to_id) && $manager->id != $manager->reports_to_id)
            {
                $manager->retrieve($manager->reports_to_id);

                $result = $membership->retrieve_by_user_and_team($manager->id, $this->id);
                if($result)
                {
                    if(!$this->scan_direct_reports_team_for_access($manager->id) && $membership->implicit_assign){
                        if( $membership->explicit_assign)
                        {
                            $membership->implicit_assign = 0;
                            $membership->save();
                        }else{
                             $GLOBALS['log']->debug("Remove membership record {$manager->user_name} from {$this->name}");
                             $this->users->delete($this->id, $manager->id);
                        }

                    }
                }
            }
		}
		else
		{
			$GLOBALS['log']->error("Membership record not found while removing membership (user $user_id, team $this->id)");
		}
	}

	/**
	 * Scan the list of the specified user's direct reports.  Look for any direct reports that have access.
	 * If at least one is found, return true.  If none are found, return false.
	*/
	function scan_direct_reports_for_access($user_id)
	{
		// At this point, we have the manager's ID.  Let's gather the list of their employee's IDs.
		$query = "select id from users where reports_to_id='$user_id'";
		$result = $this->db->getOne($query,true,"Error finding the direct reports for a manager: ");
		return !empty($result);
	}

    function scan_direct_reports_team_for_access($user_id)
    {
        // At this point, we have the manager's ID.  Let's gather the list of their employee's IDs.
        $query = "SELECT users.id FROM users INNER JOIN team_memberships ON users.id = team_memberships.user_id".
                                     " WHERE users.reports_to_id = '$user_id' AND team_memberships.team_id = '$this->id' AND team_memberships.deleted = 0";
        $result = $this->db->getOne($query,true,"Error finding the direct reports for a manager: ");
        return !empty($result);
    }

	/**
	 * When the user's reports to id is changed, this method is called.  This method needs to remove all
	 * of the implicit assignements that were created based on this user, then recreated all of the implicit
	 * assignments in the new location
	 */
	function user_manager_changed($user_id, $old_reports_to_id, $new_reports_to_id)
	{
		// Step0: Set the user to the initial focus
		$user = new User();
		$user->retrieve($user_id);
		$user->reports_to_id = $old_reports_to_id;

        //keep track of team memberships too.

		// Step1: For each team that the focus is a member of:
		$team_array = $this->get_teams_for_user($user_id);
		foreach($team_array as $team)
		{
			//		a. Run the iterative rebuild for member removal steps.
			// Specify the user that was modified to have the old reports to id.
			$team->remove_user_from_team($user_id, $user);
        }

		// Step2: Update the manager of the focus
		$user->reports_to_id = $new_reports_to_id;

		// Step3: For the list of users's teams created in step 1b:
		foreach($team_array as $team)
		{
			//		a. Run the iterative rebuild for member removal steps.
			$team->add_user_to_team($user_id, $user);
		}

       //make sure the user has same memberships as before. If not, update them accordingly.
       if (count($this->my_memberships) > 0) {
            foreach ($this->my_memberships as $team_id=>$before_row) {
                $query = "select * from team_memberships where user_id='$user_id' and team_id='$team_id'";
                $result = $this->db->query($query,true,"Error finding the full membership list for a user: ");
                $after_row=$this->db->fetchByAssoc($result);

                if  ($after_row['explicit_assign'] != $before_row['explicit_assign'] or $after_row['implicit_assign'] != $before_row['implicit_assign'] ) {
                     $update_query="update team_memberships set explicit_assign='{$before_row['explicit_assign']}', implicit_assign='{$before_row['implicit_assign']}' where id='{$after_row['id']}'";
                     $this->db->query($update_query,true,"Error updating the team sync. ");
                }
            }
       }

    }


	/**
	 * Return a list of teams that this user belongs to.
	 */
	function get_teams_for_user($user_id)
	{
		// Get the list of ids for the teams (include implicit and explicit)
		// At this point, we have the manager's ID.  Let's gather the list of their employee's IDs.
		$query = "select * from team_memberships where user_id='$user_id' and deleted = 0";
		$result = $this->db->query($query,true,"Error finding the full membership list for a user: ");

		$team_array = Array();
		while($row = $this->db->fetchByAssoc($result)) {
            $this->my_memberships[$row['team_id']]=$row;
			$team = new Team();
			$team->retrieve($row['team_id']);
			$team_array[] = $team;
		}

		return $team_array;
	}

	/**
	 * Return the team id for a team name.
	 */
	function retrieve_team_id($team_name) {
		$query = "SELECT id from teams where name='".$this->db->quote($team_name)."' OR name_2 = '".$this->db->quote($team_name)."' ";
        // Private teams seem to have the name split up, so we need to check for this
        $splitVal = explode(' ',$team_name,2);
        if ( isset($splitVal[1]) && !empty($splitVal[1]) ) {
            $query .= " OR ( name = '".$this->db->quote($splitVal[0])."' AND name_2 = '".$this->db->quote($splitVal[1])."' ) ";
        }
        $query .= "AND deleted != 1";
		$result = $this->db->query($query, false, "Error retrieving user ID: ");
		$row = $this->db->fetchByAssoc($result);
		if (!$row) return false;
		return $row['id'];
	}


	/**
	 * has_records_in_modules
	 *
	 * This function checks to see if there are currently records which have a team_set_id that contains
	 * the team.  It checks the team_sets_modules table for records where the team_set_id
	 * belongs to entries in team_sets_teams table and whose team_sets_teams.team_id value contains
	 * the team's id.
	 *
	 * @return boolean value indicating whether or not the team instance is assigned as part of a team set in modules
	 */
	function has_records_in_modules() {
		$query = "SELECT count(tsm.team_set_id) as total
		          FROM team_sets_modules tsm
		          inner join team_sets_teams tst
		          on tsm.team_set_id = tst.team_set_id
		          where tst.team_id = '{$this->id}'";
		$results = $this->db->query($query);
		if(!empty($results)) {
		   $row = $GLOBALS['db']->fetchByAssoc($results);
		   return $row['total'] == 0 ? false : true;
		}
		return false;
	}


	/**
	 * reassign_team_records
	 * This function accepts an Array of team ids that have records that should be reassigned
	 * to the team instance.
	 *
	 * @param $old_teams Array of team ids whose records will be reassigned to the team instance id
	 */
	function reassign_team_records($old_teams=array()) {
		$old_team = new Team();
		foreach($old_teams as $old_team_id) {
			$old_team->retrieve($old_team_id);

			$query = "SELECT tsm.module_table_name FROM team_sets_modules tsm inner join team_sets_teams tst on tsm.team_set_id = tst.team_set_id where tst.team_id = '{$old_team->id}'";
			$results = $this->db->query($query);
			$modules_with_team = array();
			if(!empty($results)) {
				while($row = $this->db->fetchByAssoc($results)) {
			          $modules_with_team[] = $row['module_table_name'];
				}
			}

			if(!empty($modules_with_team)) {
			   foreach($modules_with_team as $module) {
			   	   $sql = "UPDATE {$module} SET team_id = '{$this->id}' WHERE team_id = '{$old_team->id}'";
			   	   $GLOBALS['log']->info("Updating team_id column values in {$module} table from '{$old_team->id}' to '{$this->id}'");
			   	   $this->db->query($sql);
			   }
			}
			$old_team->delete_team();
		}
	}

	/**
	 * Return the proper display name of the team given the user's preferred format.
	 *
	 * @param String $name
	 * @param String $name_2
	 * @return String The display name for the user according to the current user's preferences (if set)
	 */
	public static function getDisplayName($name, $name_2, $show_last_name_first = null){
	    global $locale;
	    $localeFormat = $locale->getLocaleFormatMacro($GLOBALS['current_user']);
	    $show_last_name_first = strpos($localeFormat,'l') < strpos($localeFormat,'f');
		$display_name = '';

	    if($show_last_name_first){
			if(!empty($name_2)){
				$display_name = $name_2.' ';
			}
			$display_name .= $name;
		}else{
			$display_name = $name;
			if(!empty($name_2)){
				$display_name .= ' '.$name_2;
			}
		}
		return $display_name;
	}


	/**
	 * set_team_name_from_user
	 *
	 * @param $team The Team instance we are setting the names for
	 * @param $user The User instance whose values we are using
	 *
	 */
    public static function set_team_name_from_user(&$team, &$user) {
    	if(empty($user->first_name) && $user->last_name) {
			$team->name = $user->last_name;
			$team->name_2 = '';
    	} else {
			$team->name = $user->first_name;
			$team->name_2 = $user->last_name;
    	}
    }

	function create_export_query($order_by, $where) {
		include('modules/Teams/field_arrays.php');

		$cols = '';
		foreach($fields_array['Team']['export_fields'] as $field) {
			$cols .= (empty($cols)) ? '' : ', ';
			$cols .= $field;
		}

		$query = "SELECT {$cols} FROM teams ";

		$where_auto = " teams.deleted = 0";

		if ($where != "")
			$query .= " WHERE $where AND ".$where_auto;
		else
			$query .= " WHERE ".$where_auto;


		if ($order_by != "")
			$query .= " ORDER BY $order_by";
		else
			$query .= " ORDER BY teams.name";

		return $query;
	}

	/**
     * Bug 13271 - Sometimes we just want to know the name of a team for display purposes when the team_id may not be one of the users assigned teams.
     * For example when they have an admin Role for a module we may need to display the teams for other users
     * Unfortunately this means we can't just use the team_array value that may be stored in the register as unless we pass is_admin(), it won't contain all the necessary team names
     *
     * @param  string $team_id
     * @return string
     */
    public static function getTeamName(
        $team_id
        )
    {
        $teamname = sugar_cache_retrieve("teamname_$team_id");
        if ( !empty($teamname) )
            return $teamname;

        $focus = new Team;
        $focus->retrieve($team_id);
        if ( !empty($focus->id) ) {
            $teamname = $focus->name;
            sugar_cache_put("teamname_$team_id",$teamname);
        }

        return $teamname;
    }

    /**
     * Returns an array of all teams in the system that the user has access to
     *
     * @param  bool   $add_blank
     * @return array
     */
    public static function getArrayAllAvailable(
        $add_blank = FALSE,
        $user = null
        )
    {
        $team_array = sugar_cache_retrieve('team_array:'. $add_blank.'ADDBLANK'.$user->id);
        if(!empty($team_array))
            return $team_array;

        global $db, $current_user;
        if ( !isset($db) )
            $db = DBManagerFactory::getInstance();
        if ( !isset($user) )
            $user = $current_user;

        if($user->isAdmin()||(!$user->isAdmin() && $user->isAdminForModule('Users')))
            $query = 'SELECT t1.id, t1.name, t1.name_2 FROM teams t1 where t1.deleted = 0 ORDER BY t1.private,t1.name ASC';
        else
            $query = 'SELECT t1.id, t1.name, t1.name_2 FROM teams t1, team_memberships t2 where t1.deleted = 0 and t2.deleted = 0 and t1.id=t2.team_id and t2.user_id = '."'".$user->id."'".' ORDER BY t1.private,t1.name ASC';
        $result = $db->query($query, true, "Error filling in team array: ");

        if ($add_blank)
            $team_array[""] = "";

        while ($row = $db->fetchByAssoc($result)) {
            if($user->showLastNameFirst())
                $team_array[$row['id']] = trim($row['name_2'] . ' ' . $row['name']);
            else
                $team_array[$row['id']] = trim($row['name'] . ' ' . $row['name_2']);
        }

        sugar_cache_put('team_array:'.$add_blank.'ADDBLANK'.$current_user->id, $team_array);

        return $team_array;
    }
}
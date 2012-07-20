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


class Meeting extends SugarBean {
	// Stored fields
	var $id;
	var $date_entered;
	var $date_modified;
	var $assigned_user_id;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $team_id;
	var $description;
	var $name;
	var $location;
	var $status;
	var $type;
	var $date_start;
	var $time_start;
	var $date_end;
	var $duration_hours;
	var $duration_minutes;
	var $time_meridiem;
	var $parent_type;
	var $parent_type_options;
	var $parent_id;
	var $field_name_map;
	var $contact_id;
	var $user_id;
	var $meeting_id;
	var $reminder_time;
	var $reminder_checked;
	var $required;
	var $accept_status;
	var $parent_name;
	var $contact_name;
	var $contact_phone;
	var $contact_email;
	var $account_id;
	var $opportunity_id;
	var $case_id;
	var $assigned_user_name;
	var $outlook_id;
	var $sequence;

	var $team_name;
	var $update_vcal = true;
	var $contacts_arr;
	var $users_arr;
	var $meetings_arr;
	// when assoc w/ a user/contact:
	var $minutes_value_default = 15;
	var $minutes_values = array('0'=>'00','15'=>'15','30'=>'30','45'=>'45');
	var $table_name = "meetings";
	var $rel_users_table = "meetings_users";
	var $rel_contacts_table = "meetings_contacts";
	var $rel_leads_table = "meetings_leads";
	var $module_dir = "Meetings";
	var $object_name = "Meeting";

	var $importable = true;
	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = array('assigned_user_name', 'assigned_user_id', 'contact_id', 'user_id', 'contact_name', 'accept_status');
	var $relationship_fields = array('account_id'=>'accounts','opportunity_id'=>'opportunity','case_id'=>'case',
									 'assigned_user_id'=>'users','contact_id'=>'contacts', 'user_id'=>'users', 'meeting_id'=>'meetings');
	// so you can run get_users() twice and run query only once
	var $cached_get_users = null;
	var $new_schema = true;

	/**
	 * sole constructor
	 */
	function Meeting() {
		parent::SugarBean();
		$this->setupCustomFields('Meetings');
		foreach($this->field_defs as $field) {
			$this->field_name_map[$field['name']] = $field;
		}
		global $current_user;
		if(!empty($current_user)) {
			$this->team_id = $current_user->default_team;	//default_team is a team id
			$this->team_set_id = $current_user->team_set_id; //bug 41334 : team_set_id needs to be updated with current_user's team_set_id
		} else {
			$this->team_id = 1; // make the item globally accessible
		}
//		$this->fill_in_additional_detail_fields();
        if(!empty($GLOBALS['app_list_strings']['duration_intervals'])) {
            $this->minutes_values = $GLOBALS['app_list_strings']['duration_intervals'];
        }
	}

	/**
	 * Stub for integration
	 * @return bool
	 */
	function hasIntegratedMeeting() {
		return false;
	}

	// save date_end by calculating user input
	// this is for calendar
	function save($check_notify = FALSE) {
		global $timedate;
		global $current_user;

		global $disable_date_format;

	    if(isset($this->date_start) && isset($this->duration_hours) && isset($this->duration_minutes))
        {
        	if(isset($this->date_start) && isset($this->duration_hours) && isset($this->duration_minutes))
	        {
	    	    $td = $timedate->fromDb($this->date_start);
	    	    if($td)
	    	    {
		        	$this->date_end = $td->modify("+{$this->duration_hours} hours {$this->duration_minutes} mins")->asDb();
	    	    }
	        }
		}

		$check_notify =(!empty($_REQUEST['send_invites']) && $_REQUEST['send_invites'] == '1') ? true : false;
		if(empty($_REQUEST['send_invites'])) {
			if(!empty($this->id)) {
				$old_record = new Meeting();
				$old_record->retrieve($this->id);
				$old_assigned_user_id = $old_record->assigned_user_id;
			}
			if((empty($this->id) && isset($_REQUEST['assigned_user_id']) && !empty($_REQUEST['assigned_user_id']) && $GLOBALS['current_user']->id != $_REQUEST['assigned_user_id']) || (isset($old_assigned_user_id) && !empty($old_assigned_user_id) && isset($_REQUEST['assigned_user_id']) && !empty($_REQUEST['assigned_user_id']) && $old_assigned_user_id != $_REQUEST['assigned_user_id']) ){
				$this->special_notification = true;
				$check_notify = true;
                if(isset($_REQUEST['assigned_user_name'])) {
                    $this->new_assigned_user_name = $_REQUEST['assigned_user_name'];
                }
			}
		}
		/*nsingh 7/3/08  commenting out as bug #20814 is invalid
		if($current_user->getPreference('reminder_time')!= -1 &&  isset($_POST['reminder_checked']) && isset($_POST['reminder_time']) && $_POST['reminder_checked']==0  && $_POST['reminder_time']==-1){
			$this->reminder_checked = '1';
			$this->reminder_time = $current_user->getPreference('reminder_time');
		}*/

        if (empty($this->status) ) {
            $this->status = $this->getDefaultStatus();
        }

        // Do any external API saving
        // Clear out the old external API stuff if we have changed types
        if (isset($this->fetched_row) && $this->fetched_row['type'] != $this->type ) {
            $this->join_url = '';
            $this->host_url = '';
            $this->external_id = '';
            $this->creator = '';
        }

        if (!empty($this->type) && $this->type != 'Sugar' ) {
            require_once('include/externalAPI/ExternalAPIFactory.php');
            $api = ExternalAPIFactory::loadAPI($this->type);
        }

        if (empty($this->type)) {
			$this->type = 'Sugar';
		}

        if ( isset($api) && is_a($api,'WebMeeting') && empty($this->in_relationship_update) ) {
            // Make sure the API initialized and it supports Web Meetings
            // Also make suer we have an ID, the external site needs something to reference
            if ( !isset($this->id) || empty($this->id) ) {
                $this->id = create_guid();
                $this->new_with_id = true;
            }
            $response = $api->scheduleMeeting($this);
            if ( $response['success'] == TRUE ) {
                // Need to send out notifications
                if ( $api->canInvite ) {
                    $notifyList = $this->get_notification_recipients();
                    foreach($notifyList as $person) {
                        $api->inviteAttendee($this,$person,$check_notify);
                    }

                }
            } else {
                SugarApplication::appendErrorMessage($GLOBALS['app_strings']['ERR_EXTERNAL_API_SAVE_FAIL']);
                return $this->id;
            }

            $api->logoff();
        }

		$return_id = parent::save($check_notify);

		if($this->update_vcal) {
			vCal::cache_sugar_vcal($current_user);
		}



		return $return_id;
	}

	// this is for calendar
	function mark_deleted($id) {

		global $current_user;

		parent::mark_deleted($id);

		if($this->update_vcal) {
			vCal::cache_sugar_vcal($current_user);
		}
	}

	function get_summary_text() {
		return "$this->name";
	}

    function create_export_query(&$order_by, &$where, $relate_link_join='')
    {
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
		if($custom_join)
				$custom_join['join'] .= $relate_link_join;
		$contact_required = stristr($where, "contacts");

		if($contact_required) {
			$query = "SELECT meetings.*, contacts.first_name, contacts.last_name, contacts.assigned_user_id contact_name_owner, users.user_name as assigned_user_name   ";
			$query .= ", teams.name AS team_name";
			if($custom_join) {
				$query .= $custom_join['select'];
			}
			$query .= " FROM contacts, meetings, meetings_contacts ";
			$where_auto = " meetings_contacts.contact_id = contacts.id AND meetings_contacts.meeting_id = meetings.id AND meetings.deleted=0 AND contacts.deleted=0";
		} else {
			$query = 'SELECT meetings.*, users.user_name as assigned_user_name  ';
			$query .= ", teams.name AS team_name";
			if($custom_join) {
				$query .= $custom_join['select'];
			}
			$query .= ' FROM meetings ';
			$where_auto = "meetings.deleted=0";
		}
		// We need to confirm that the user is a member of the team of the item.
		$this->add_team_security_where_clause($query);
		$query .= getTeamSetNameJoin('meetings');
		$query .= "  LEFT JOIN users ON meetings.assigned_user_id=users.id ";

		if($custom_join) {
			$query .= $custom_join['join'];
		}

		if($where != "")
			$query .= " where $where AND ".$where_auto;
		else
			$query .= " where ".$where_auto;

		if($order_by != "") {
			$query .= " ORDER BY $order_by";
		} else {
			$alternate_order_by =	$this->process_order_by($order_by, null);
			if($alternate_order_by != "")
				$query .=	" ORDER BY ". $alternate_order_by;
		}
		return $query;
	}



	function fill_in_additional_detail_fields() {
		global $locale;
		// Fill in the assigned_user_name
		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->assigned_name = get_assigned_team_name($this->team_id);

		if (!empty($this->contact_id)) {
			$query  = "SELECT first_name, last_name FROM contacts ";
			$query .= "WHERE id='$this->contact_id' AND deleted=0";
			$result = $this->db->limitQuery($query,0,1,true," Error filling in additional detail fields: ");

			// Get the contact name.
			$row = $this->db->fetchByAssoc($result);
			$GLOBALS['log']->info("additional call fields $query");
			if($row != null)
			{
				$this->contact_name = $locale->getLocaleFormattedName($row['first_name'], $row['last_name'], '', '');
				$GLOBALS['log']->debug("Call($this->id): contact_name = $this->contact_name");
				$GLOBALS['log']->debug("Call($this->id): contact_id = $this->contact_id");
			}
		}



		$this->created_by_name = get_assigned_user_name($this->created_by);
		$this->modified_by_name = get_assigned_user_name($this->modified_user_id);
		$this->fill_in_additional_parent_fields();

		if (!isset($this->time_hour_start)) {
			$this->time_start_hour = intval(substr($this->time_start, 0, 2));
		} //if-else

		if (isset($this->time_minute_start)) {
			$time_start_minutes = $this->time_minute_start;
		} else {
			$time_start_minutes = substr($this->time_start, 3, 5);
			if ($time_start_minutes > 0 && $time_start_minutes < 15) {
				$time_start_minutes = "15";
			} else if ($time_start_minutes > 15 && $time_start_minutes < 30) {
				$time_start_minutes = "30";
			} else if ($time_start_minutes > 30 && $time_start_minutes < 45) {
				$time_start_minutes = "45";
			} else if ($time_start_minutes > 45) {
				$this->time_start_hour += 1;
				$time_start_minutes = "00";
		    } //if-else
		} //if-else


		if (isset($this->time_hour_start)) {
			$time_start_hour = $this->time_hour_start;
		} else {
			$time_start_hour = intval(substr($this->time_start, 0, 2));
		}

		global $timedate;
        $this->time_meridiem = $timedate->AMPMMenu('', $this->time_start, 'onchange="SugarWidgetScheduler.update_time();"');
		$hours_arr = array ();
		$num_of_hours = 13;
		$start_at = 1;

		if (empty ($time_meridiem)) {
			$num_of_hours = 24;
			$start_at = 0;
		} //if

		for ($i = $start_at; $i < $num_of_hours; $i ++) {
			$i = $i."";
			if (strlen($i) == 1) {
				$i = "0".$i;
			}
			$hours_arr[$i] = $i;
		} //for

        if (!isset($this->duration_minutes)) {
			$this->duration_minutes = $this->minutes_value_default;
		}

        //setting default date and time
		if (is_null($this->date_start))
			$this->date_start = $timedate->now();
		if (is_null($this->time_start))
			$this->time_start = $timedate->to_display_time(TimeDate::getInstance()->nowDb(), true);
		if (is_null($this->duration_hours)) {
			$this->duration_hours = "0";
		}
		if (is_null($this->duration_minutes))
			$this->duration_minutes = "1";

		global $app_list_strings;
		$parent_types = $app_list_strings['record_type_display'];
		$disabled_parent_types = ACLController::disabledModuleList($parent_types,false, 'list');
		foreach($disabled_parent_types as $disabled_parent_type){
			if($disabled_parent_type != $this->parent_type){
				unset($parent_types[$disabled_parent_type]);
			}
		}

		$this->parent_type_options = get_select_options_with_id($parent_types, $this->parent_type);
		if (empty($this->reminder_time)) {
			$this->reminder_time = -1;
		}

		if ( empty($this->id) ) {
		    $reminder_t = $GLOBALS['current_user']->getPreference('reminder_time');
		    if ( isset($reminder_t) )
		        $this->reminder_time = $reminder_t;
		}
		$this->reminder_checked = $this->reminder_time == -1 ? false : true;

		if (isset ($_REQUEST['parent_type'])) {
			$this->parent_type = $_REQUEST['parent_type'];
		} elseif (is_null($this->parent_type)) {
			$this->parent_type = $app_list_strings['record_type_default_key'];
		}

        // Fill in the meeting url for external account types
        if ( !empty($this->id) && !empty($this->type) && $this->type != 'Sugar' && !empty($this->join_url) ) {
            // It's an external meeting
            global $mod_strings;

            $meetingLink = '';
            if ($GLOBALS['current_user']->id == $this->assigned_user_id ) {
                $meetingLink .= '<a href="index.php?module=Meetings&action=JoinExternalMeeting&meeting_id='.$this->id.'&host_meeting=1" target="_blank">'.SugarThemeRegistry::current()->getImage("start_meeting_inline", 'border="0" ', 18, 19, ".png", translate('LBL_HOST_EXT_MEETING',$this->module_dir)).'</a>';
            }

            $meetingLink .= '<a href="index.php?module=Meetings&action=JoinExternalMeeting&meeting_id='.$this->id.'" target="_blank">'.SugarThemeRegistry::current()->getImage("join_meeting_inline", 'border="0" ', 18, 19, ".png", translate('LBL_JOIN_EXT_MEETING',$this->module_dir)).'</a>';

          $this->displayed_url = $meetingLink;
        }
	}

	function get_list_view_data() {
		$meeting_fields = $this->get_list_view_array();

		global $app_list_strings, $focus, $action, $currentModule;
		if(isset($this->parent_type))
			$meeting_fields['PARENT_MODULE'] = $this->parent_type;
		if($this->status == "Planned") {
			//cn: added this if() to deal with sequential Closes in Meetings.	this is a hack to a hack(formbase.php->handleRedirect)
			if(empty($action))
			     $action = "index";
            $setCompleteUrl = "<a id='{$this->id}' onclick='SUGAR.util.closeActivityPanel.show(\"{$this->module_dir}\",\"{$this->id}\",\"Held\",\"listview\",\"1\");'>";
			$meeting_fields['SET_COMPLETE'] = $setCompleteUrl . SugarThemeRegistry::current()->getImage("close_inline"," border='0'",null,null,'.gif',translate('LBL_CLOSEINLINE'))."</a>";
		}
		global $timedate;
		$today = $timedate->nowDb();
		$nextday = $timedate->asDbDate($timedate->getNow()->get("+1 day"));
		$mergeTime = $meeting_fields['DATE_START']; //$timedate->merge_date_time($meeting_fields['DATE_START'], $meeting_fields['TIME_START']);
		$date_db = $timedate->to_db($mergeTime);
		if($date_db	< $today	) {
			$meeting_fields['DATE_START']= "<font class='overdueTask'>".$meeting_fields['DATE_START']."</font>";
		}else if($date_db	< $nextday) {
			$meeting_fields['DATE_START'] = "<font class='todaysTask'>".$meeting_fields['DATE_START']."</font>";
		} else {
			$meeting_fields['DATE_START'] = "<font class='futureTask'>".$meeting_fields['DATE_START']."</font>";
		}
		$this->fill_in_additional_detail_fields();

		//make sure we grab the localized version of the contact name, if a contact is provided
		if (!empty($this->contact_id)) {
			global $locale;
            // Bug# 46125 - make first name, last name, salutation and title of Contacts respect field level ACLs
            $contact_temp = new Contact();
            $contact_temp->retrieve($this->contact_id);
            $contact_temp->_create_proper_name_field();
            $this->contact_name = $contact_temp->full_name;
		}

        $meeting_fields['CONTACT_ID'] = $this->contact_id;
        $meeting_fields['CONTACT_NAME'] = $this->contact_name;
		$meeting_fields['PARENT_NAME'] = $this->parent_name;
        $meeting_fields['REMINDER_CHECKED'] = $this->reminder_time==-1 ? false : true;

        $oneHourAgo = gmdate($GLOBALS['timedate']->get_db_date_time_format(), time()-3600);
        if(!empty($this->host_url) && $date_db	>= $oneHourAgo) {
            if($this->assigned_user_id == $GLOBALS['current_user']->id){
                $join_icon = SugarThemeRegistry::current()->getImage('start_meeting_inline', 'border="0"',null,null,'.gif',translate('LBL_HOST_EXT_MEETING',$this->module_dir));
                $meeting_fields['OBJECT_IMAGE_ICON'] = 'start_meeting_inline';
                $meeting_fields['DISPLAYED_URL'] = 'index.php?module=Meetings&action=JoinExternalMeeting&meeting_id='.$this->id.'&host_meeting=1';
            }else{
                $join_icon = SugarThemeRegistry::current()->getImage('join_meeting_inline', 'border="0"',null,null,'.gif',translate('LBL_JOIN_EXT_MEETING',$this->module_dir));
                $meeting_fields['OBJECT_IMAGE_ICON'] = 'join_meeting_inline';
                $meeting_fields['DISPLAYED_URL'] = 'index.php?module=Meetings&action=JoinExternalMeeting&meeting_id='.$this->id.'&host_meeting=0';
            }
        }

		$meeting_fields['JOIN_MEETING']  = '';
		if(!empty($meeting_fields['DISPLAYED_URL'])){
			$meeting_fields['JOIN_MEETING']= '<a href="' . $meeting_fields['DISPLAYED_URL']. '" target="_blank">' . $join_icon . '</a>';
		}

		return $meeting_fields;
	}

	function set_notification_body($xtpl, &$meeting) {
		global $sugar_config;
		global $app_list_strings;
		global $current_user;
		global $timedate;


		// cn: bug 9494 - passing a contact breaks this call
		$notifyUser =($meeting->current_notify_user->object_name == 'User') ? $meeting->current_notify_user : $current_user;
		// cn: bug 8078 - fixed call to $timedate
		if(strtolower(get_class($meeting->current_notify_user)) == 'contact') {
			$xtpl->assign("ACCEPT_URL", $sugar_config['site_url'].
							'/index.php?entryPoint=acceptDecline&module=Meetings&contact_id='.$meeting->current_notify_user->id.'&record='.$meeting->id);
		} elseif(strtolower(get_class($meeting->current_notify_user)) == 'lead') {
			$xtpl->assign("ACCEPT_URL", $sugar_config['site_url'].
							'/index.php?entryPoint=acceptDecline&module=Meetings&lead_id='.$meeting->current_notify_user->id.'&record='.$meeting->id);
		} else {
			$xtpl->assign("ACCEPT_URL", $sugar_config['site_url'].
							'/index.php?entryPoint=acceptDecline&module=Meetings&user_id='.$meeting->current_notify_user->id.'&record='.$meeting->id);
		}
		$xtpl->assign("MEETING_TO", $meeting->current_notify_user->new_assigned_user_name);
		$xtpl->assign("MEETING_SUBJECT", trim($meeting->name));
		$xtpl->assign("MEETING_STATUS",(isset($meeting->status)? $app_list_strings['meeting_status_dom'][$meeting->status]:""));
		$typekey = strtolower($meeting->type);
		if(isset($meeting->type)) {
		    if(!empty($app_list_strings['eapm_list'][$typekey])) {
    		    $typestring = $app_list_strings['eapm_list'][$typekey];
	    	} else {
		        $typestring = $app_list_strings['meeting_type_dom'][$meeting->type];
		    }
		}
		$xtpl->assign("MEETING_TYPE", isset($meeting->type)? $typestring:"");
		$startdate = $timedate->fromDb($meeting->date_start);
		$xtpl->assign("MEETING_STARTDATE", $timedate->asUser($startdate, $notifyUser)." ".TimeDate::userTimezoneSuffix($startdate, $notifyUser));
		$xtpl->assign("MEETING_HOURS", $meeting->duration_hours);
		$xtpl->assign("MEETING_MINUTES", $meeting->duration_minutes);
		$xtpl->assign("MEETING_DESCRIPTION", $meeting->description);
        if ( !empty($meeting->join_url) ) {
            $xtpl->assign('MEETING_URL', $meeting->join_url);
            $xtpl->parse('Meeting.Meeting_External_API');
        }

		return $xtpl;
	}

	function get_meeting_users() {
		$template = new User();
		// First, get the list of IDs.
		$query = "SELECT meetings_users.required, meetings_users.accept_status, meetings_users.user_id from meetings_users where meetings_users.meeting_id='$this->id' AND meetings_users.deleted=0";
		$GLOBALS['log']->debug("Finding linked records $this->object_name: ".$query);
		$result = $this->db->query($query, true);
		$list = Array();

		while($row = $this->db->fetchByAssoc($result)) {
			$template = new User(); // PHP 5 will retrieve by reference, always over-writing the "old" one
			$record = $template->retrieve($row['user_id']);
			$template->required = $row['required'];
			$template->accept_status = $row['accept_status'];

			if($record != null) {
				// this copies the object into the array
				$list[] = $template;
			}
		}
		return $list;
	}

	function get_invite_meetings(&$user) {
		$template = $this;
		// First, get the list of IDs.
		$GLOBALS['log']->debug("Finding linked records $this->object_name: ".$query);
		$query = "SELECT meetings_users.required, meetings_users.accept_status, meetings_users.meeting_id from meetings_users where meetings_users.user_id='$user->id' AND( meetings_users.accept_status IS NULL OR	meetings_users.accept_status='none') AND meetings_users.deleted=0";
		$result = $this->db->query($query, true);
		$list = Array();

		while($row = $this->db->fetchByAssoc($result)) {
			$record = $template->retrieve($row['meeting_id']);
			$template->required = $row['required'];
			$template->accept_status = $row['accept_status'];


			if($record != null)
			{
			// this copies the object into the array
			$list[] = $template;
			}
		}
		return $list;
	}


	function set_accept_status(&$user,$status)
	{
		if($user->object_name == 'User')
		{
			$relate_values = array('user_id'=>$user->id,'meeting_id'=>$this->id);
			$data_values = array('accept_status'=>$status);
			$this->set_relationship($this->rel_users_table, $relate_values, true, true,$data_values);
			global $current_user;

			if($this->update_vcal)
			{
				vCal::cache_sugar_vcal($user);
			}
		}
		else if($user->object_name == 'Contact')
		{
			$relate_values = array('contact_id'=>$user->id,'meeting_id'=>$this->id);
			$data_values = array('accept_status'=>$status);
			$this->set_relationship($this->rel_contacts_table, $relate_values, true, true,$data_values);
		}
        else if($user->object_name == 'Lead')
		{
			$relate_values = array('lead_id'=>$user->id,'meeting_id'=>$this->id);
			$data_values = array('accept_status'=>$status);
			$this->set_relationship($this->rel_leads_table, $relate_values, true, true,$data_values);
		}
	}


	function get_notification_recipients() {
		if($this->special_notification) {
			return parent::get_notification_recipients();
		}

		$list = array();
		if(!is_array($this->contacts_arr)) {
			$this->contacts_arr =	array();
		}

		if(!is_array($this->users_arr)) {
			$this->users_arr =	array();
		}

        if(!is_array($this->leads_arr)) {
			$this->leads_arr =	array();
		}

		foreach($this->users_arr as $user_id) {
			$notify_user = new User();
			$notify_user->retrieve($user_id);
			$notify_user->new_assigned_user_name = $notify_user->full_name;
			$GLOBALS['log']->info("Notifications: recipient is $notify_user->new_assigned_user_name");
			$list[$notify_user->id] = $notify_user;
		}

		foreach($this->contacts_arr as $contact_id) {
			$notify_user = new Contact();
			$notify_user->retrieve($contact_id);
			$notify_user->new_assigned_user_name = $notify_user->full_name;
			$GLOBALS['log']->info("Notifications: recipient is $notify_user->new_assigned_user_name");
			$list[$notify_user->id] = $notify_user;
		}

        foreach($this->leads_arr as $lead_id) {
			$notify_user = new Lead();
			$notify_user->retrieve($lead_id);
			$notify_user->new_assigned_user_name = $notify_user->full_name;
			$GLOBALS['log']->info("Notifications: recipient is $notify_user->new_assigned_user_name");
			$list[$notify_user->id] = $notify_user;
		}

		return $list;
	}


	function bean_implements($interface) {
		switch($interface) {
			case 'ACL':return true;
		}
		return false;
	}

	function listviewACLHelper() {
		$array_assign = parent::listviewACLHelper();
		$is_owner = false;
		if(!empty($this->parent_name)) {

			if(!empty($this->parent_name_owner)) {
				global $current_user;
				$is_owner = $current_user->id == $this->parent_name_owner;
			}
		}

		if(!ACLController::moduleSupportsACL($this->parent_type) || ACLController::checkAccess($this->parent_type, 'view', $is_owner)) {
			$array_assign['PARENT'] = 'a';
		} else {
			$array_assign['PARENT'] = 'span';
		}

		$is_owner = false;

		if(!empty($this->contact_name)) {
			if(!empty($this->contact_name_owner)) {
				global $current_user;
				$is_owner = $current_user->id == $this->contact_name_owner;
			}
		}

		if(ACLController::checkAccess('Contacts', 'view', $is_owner)) {
			$array_assign['CONTACT'] = 'a';
		} else {
			$array_assign['CONTACT'] = 'span';
		}
		return $array_assign;
	}


	function save_relationship_changes($is_update) {
		$exclude = array();
	    if(empty($this->in_workflow)) {
           if(empty($this->in_import)){//if a meeting is being imported then contact_id  should not be excluded
           //if the global soap_server_object variable is not empty (as in from a soap/OPI call), then process the assigned_user_id relationship, otherwise
           //add assigned_user_id to exclude list and let the logic from MeetingFormBase determine whether assigned user id gets added to the relationship
           	if(!empty($GLOBALS['soap_server_object'])){
           		$exclude = array('contact_id', 'user_id');
           	}else{
	    		$exclude = array('contact_id', 'user_id','assigned_user_id');
           	}
           }
           else{
           	$exclude = array('user_id');
           }
        }
       parent::save_relationship_changes($is_update, $exclude);
	}


	/**
	 * @see SugarBean::afterImportSave()
	 */
	public function afterImportSave()
	{
	    if ( $this->parent_type == 'Contacts' ) {
	        $this->load_relationship('contacts');
	        if ( !$this->contacts->relationship_exists('contacts',array('id'=>$this->parent_id)) )
	            $this->contacts->add($this->parent_id);
	    }
	    elseif ( $this->parent_type == 'Leads' ) {
	        $this->load_relationship('leads');
	        if ( !$this->leads->relationship_exists('leads',array('id'=>$this->parent_id)) )
	            $this->leads->add($this->parent_id);
	    }

	    parent::afterImportSave();
	}

    public function getDefaultStatus()
    {
         $def = $this->field_defs['status'];
         if (isset($def['default'])) {
             return $def['default'];
         } else {
            $app = return_app_list_strings_language($GLOBALS['current_language']);
            if (isset($def['options']) && isset($app[$def['options']])) {
                $keys = array_keys($app[$def['options']]);
                return $keys[0];
            }
        }
        return '';
    }

} // end class def

// External API integration, for the dropdown list of what external API's are available
//TODO: do we really need focus, name and view params for this function
function getMeetingsExternalApiDropDown($focus = null, $name = null, $value = null, $view = null)
{
	global $dictionary, $app_list_strings;

	$cacheKeyName = 'meetings_type_drop_down';

    $apiList = sugar_cache_retrieve($cacheKeyName);
    if ($apiList === null)
    {
        require_once('include/externalAPI/ExternalAPIFactory.php');

        $apiList = ExternalAPIFactory::getModuleDropDown('Meetings');
        $apiList = array_merge(array('Sugar'=>$GLOBALS['app_list_strings']['eapm_list']['Sugar']), $apiList);
        sugar_cache_put($cacheKeyName, $apiList);
    }

	if(!empty($value) && empty($apiList[$value]))
	{
		$apiList[$value] = $value;
    }
	//bug 46294: adding list of options to dropdown list (if it is not the default list)
    if ($dictionary['Meeting']['fields']['type']['options'] != "eapm_list")
    {
        $apiList = array_merge(getMeetingTypeOptions($dictionary, $app_list_strings), $apiList);
    }

	return $apiList;
}

/**
 * Meeting Type Options Array for dropdown list
 * @param array $dictionary - getting type name
 * @param array $app_list_strings - getting type options
 * @return array Meeting Type Options Array for dropdown list
 */
function getMeetingTypeOptions($dictionary, $app_list_strings)
{
	$result = array();

    // getting name of meeting type to fill dropdown list by its values
    if (isset($dictionary['Meeting']['fields']['type']['options']))
	{
    	$typeName = $dictionary['Meeting']['fields']['type']['options'];

        if (!empty($app_list_strings[$typeName]))
		{
        	$typeList = $app_list_strings[$typeName];

            foreach ($typeList as $key => $value)
			{
				$result[$value] = $value;
            }
        }
    }

    return $result;
}

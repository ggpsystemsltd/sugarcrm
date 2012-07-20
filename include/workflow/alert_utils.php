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


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


include_once('include/workflow/workflow_utils.php');
include_once('include/workflow/field_utils.php');
include_once('include/utils/expression_utils.php');

function process_workflow_alerts(& $target_module, $alert_user_array, $alert_shell_array, $check_for_bridge=false){

	$admin = new Administration();
	$admin->retrieveSettings();


	/*
	What is shadow module for? - Shadow module is when you are using this function to process invites for
	meetings and calls.  This is down via child module (bridge), however we still use the parent base_module
	to gather our recipients, since this is how our UI handles it.

	When shadow module is set, we should use that as the target module.

	*/

	if(!empty($target_module->bridge_object) && $check_for_bridge==true){

		$temp_target_module = $target_module->bridge_object;
	} else {
		$temp_target_module = $target_module;
	}

	$alert_msg = $alert_shell_array['alert_msg'];

    $address_array = array();
    $address_array['to'] = array();
    $address_array['cc'] = array();
    $address_array['bcc'] = array();

    //loop through get each users token information
    if(!empty($alert_user_array)){
        foreach($alert_user_array as $user_meta_array){

            get_user_alert_details($temp_target_module, $user_meta_array, $address_array);

        //end foreach alert_user_array
        }
    }


    //now you have the bucket so you can send out the alert to all the recipients
    send_workflow_alert($target_module, $address_array, $alert_msg, $admin, $alert_shell_array, $check_for_bridge);

//end function process_workflow_alerts
}

function get_manager_info($user_id){

	$notify_user = new User();
	$notify_user->retrieve($user_id);
	return $notify_user->reports_to_id;

//end function get_manager_info
}

function get_user_alert_details(& $focus, $user_meta_array, & $address_array){

	//kbrill Bug#16322
	if($user_meta_array['user_type'] == "current_user"){
		if($user_meta_array['array_type'] == 'past'){
			$target_user_id = $focus->fetched_row[$user_meta_array['field_value']];
		} else {
			$target_user_id = $focus->$user_meta_array['field_value'];
		}
	//END Bug Fix
		//Get user's manager id?
		if($user_meta_array['relate_type'] != "Self"){
			$target_user_id = get_manager_info($target_user_id);
		//end if we need to get the user's manager id
		}

		$user_array = get_alert_recipient($target_user_id);

		if($user_array!=false){
			//add user info to main address bucket
			$address_array[$user_meta_array['address_type']][] = $user_array;
		}

	//end if user_type is current
	}


	if( $user_meta_array['user_type'] == "rel_user" || $user_meta_array['user_type'] == "rel_user_custom")
	{
		get_related_array($focus, $user_meta_array, $address_array);
	} //end if user_type is related

	if($user_meta_array['user_type'] == "trig_user_custom"){

		$user_array = get_alert_recipient_from_custom_fields($focus, $user_meta_array['rel_email_value'], $user_meta_array['field_value']);

		if($user_array!=false){
			//add user info to main address bucket
			$address_array[$user_meta_array['address_type']][] = $user_array;
		}


	//end if user type is trig_user_custom
	}


	//if specific role, user, team
	if( $user_meta_array['user_type'] == "specific_user")
	{

		$user_array = get_alert_recipient($user_meta_array['field_value']);

		if($user_array!=false){
			//add user info to main address bucket
			$address_array[$user_meta_array['address_type']][] = $user_array;
		}
	//end if specific user
	}
	if($user_meta_array['user_type'] == "specific_team"){
		$team_object = new Team;
		$team_object->retrieve($user_meta_array['field_value']);
		$team_user_list = $team_object->get_team_members(true);

		foreach($team_user_list as $user_object){
			$user_array = get_alert_recipient($user_object->id);

			if($user_array!=false){
				//add user info to main address bucket
				$address_array[$user_meta_array['address_type']][] = $user_array;
			}

		//end for each team member
		}
	//end if specific team
	}


	//If the user selected the team assigned to the module.
	if($user_meta_array['user_type'] == "assigned_team_target")
	{
	    if( empty($focus->team_set_id) && empty($focus->team_id) )
	       return;

	    $GLOBALS['log']->debug("Processing alerts for team assigned to module {$focus->team_set_id}");

	    if( ! empty($focus->team_set_id) )
	    {
    	    $ts = new TeamSet();
    	    $teams = $ts->getTeams($focus->team_set_id);
	    }
	    else
	        $teams = array($focus->team_id => '');

	    $tmpUserList = array();

	    //Iterate over all teams associated with the team set and grab all users.
	    foreach ($teams as $singleTeamId => $singleTeam)
	    {
	        $team_object = new Team;
		    $team_object->retrieve($singleTeamId);
		    $team_user_list = $team_object->get_team_members(true);

		    //De dup the users list in case a user is in multiple teams.
		    foreach($team_user_list as $user_object)
			    $tmpUserList[$user_object->id] = $user_object;
	   }

	   //Check if admins have overriden the default limit.
	   $maxAlloweedUsers = !empty($GLOBALS['sugar_config']['max_users_team_notification'] ) ? $GLOBALS['sugar_config']['max_users_team_notification'] : 100;

	   if (count($tmpUserList) > $maxAlloweedUsers) //Ensure the list isn't too large, hard coded for now.
	   {
	       $GLOBALS['log']->fatal("When sending alerts to associated team, max number of users alloweed exceeded.  Refusing to send notification.");
	       return;
	   }

	   //For the clean user list, now grab the email information.
	   foreach($tmpUserList as $tmpUserId => $tmpUserObject)
	   {
	       $user_array = get_alert_recipient($tmpUserObject->id);
		   if($user_array != FALSE)
		   {
		       //add user info to main address bucket
		      $address_array[$user_meta_array['address_type']][] = $user_array;
		   }
	   }
	} //End assigned team target type


	if($user_meta_array['user_type'] == "specific_role")
	{
		$role_object = new ACLRole();
		$role_object->retrieve($user_meta_array['field_value']);
		$role_user_list = $role_object->get_linked_beans('users','User');

		foreach($role_user_list as $user_object){

			$user_array = get_alert_recipient($user_object->id);

			if($user_array!=false){
				//add user info to main address bucket
				$address_array[$user_meta_array['address_type']][] = $user_array;
			}

		//end for each role member
		}

	//end if specific role
	}


	//if login user
	if( $user_meta_array['user_type'] == "login_user")
	{

		global $current_user;

		if(!empty($current_user)){

		$user_array = get_alert_recipient($current_user->id);

		if($user_array!=false){
			//add user info to main address bucket
			$address_array[$user_meta_array['address_type']][] = $user_array;
		}

		//if current user is not empty
		}

	//end if login_user
	}



//end function get_user_alert_details
}

///////////////////////////Email sending


	function get_alert_recipient($user_id)
	{
	    global $locale;
		$notify_user = new User();
		$notify_user->retrieve($user_id);

		if (empty($notify_user->email1) && empty($notify_user->email2)) {
			//return false if there is no email set
			return false;
		}

		if ($notify_user->status == "Inactive")
		{
			$GLOBALS['log']->fatal("workflow attempting to send alert to inactive user {$notify_user->name}");
            return false;
		}

		$notify_address = (empty($notify_user->email1)) ? from_html($notify_user->email2) : from_html($notify_user->email1);
		$notify_name = (empty($notify_user->first_name)) ? from_html($notify_user->user_name) : $locale->getLocaleFormattedName(from_html($notify_user->first_name), from_html($notify_user->last_name));


		//return true if address is present
		$user_array['address'] = $notify_address;
		$user_array['name'] = $notify_name;
		$user_array['id'] = $notify_user->id;
		$user_array['type'] = "internal";
		$user_array['notify_user'] = $notify_user;

		return $user_array;

	//end get_alert_recipient
	}

	function get_alert_recipient_from_custom_fields($target_module, $target_email, $target_name)
	{

		//user type is trig_user_custom

		if (empty($target_module->$target_email)) {
			//return false if there is no email set
			return false;
		}

		$notify_address = (empty($target_module->$target_email)) ? '' : from_html($target_module->$target_email);
		$notify_name = check_special_fields($target_name, $target_module);

		//return true if address is present
		$user_array['address'] = $notify_address;
		$user_array['name'] = $notify_name;
		$user_array['id'] = $target_module->id;
		$user_array['type'] = "external";
		$user_array['external_type'] = $target_module->module_dir;
		$user_array['notify_user'] = $target_module;

		return $user_array;

	//end get_alert_recipient_from_custom_fields
	}


	function create_alert_email($notify_user)
	{
		global $sugar_version, $sugar_config, $app_list_strings, $current_user;

		if (empty($_SESSION['authenticated_user_language'])) {
			$current_language = $sugar_config['default_language'];
		}
		else {
			$current_language = $_SESSION['authenticated_user_language'];
		}


		$xtpl = new XTemplate(get_notify_template_file($current_language));

		$template_name = $focus->object_name;

		$focus->current_notify_user = $notify_user;

		if (in_array('set_notification_body', get_class_methods($focus)))
		{
			$xtpl = $focus->set_notification_body($xtpl, $focus);
		}
		else
		{
			$xtpl->assign("OBJECT", $focus->object_name);
			$template_name = "Default";
		}

		$xtpl->assign("ASSIGNED_USER", $focus->new_assigned_user_name);
		$xtpl->assign("ASSIGNER", $current_user->user_name);
		$xtpl->assign("URL", "{$sugar_config['site_url']}/index.php?module={$focus->module_dir}&action=DetailView&record={$focus->id}");
		$xtpl->assign("SUGAR", "Sugar v{$sugar_version}");
		$xtpl->parse($template_name);
		$xtpl->parse($template_name . "_Subject");

		$notify_mail->Body = from_html(trim($xtpl->text($template_name)));
		$notify_mail->Subject = from_html($xtpl->text($template_name . "_Subject"));

		return $notify_mail;
	//end function create_alert_email
	}


function send_workflow_alert(& $focus, $address_array, $alert_msg, & $admin, $alert_shell_array, $check_for_bridge=false){
	require_once("include/SugarPHPMailer.php");
    $mail_object = new SugarPHPMailer;

	global $locale;
    $OBCharset = $locale->getPrecedentPreference('default_email_charset');
	$invite_person = false;

	//Handle inviting users/contacts to meetings/calls
	if($focus->module_dir == "Calls" || $focus->module_dir == "Meetings" ){

		if($check_for_bridge==true && !empty($focus->bridge_object)){

			$invite_person = true;
			$users_arr = array();
			$contacts_arr = array();
		//end if we are inviting people
		}
	//end if calls or meetings
	}


	//Use system defaults the go here

	if($alert_shell_array['source_type']=="System Default"){

		get_invite_email($focus, $admin, $address_array, $invite_person, $alert_msg, $alert_shell_array);

	//end if system default
	} elseif($alert_shell_array['source_type']=="Custom Template" && $invite_person==true){
	//If you are using a custom template and this is a meeting/call child invite go here too

		get_invite_email($focus, $admin, $address_array, $invite_person, $alert_msg, $alert_shell_array);

	} else {
	        $mail_objects = array();
			foreach($address_array['to'] as $key => $user_info_array)
			{
			    $mail_object->AddAddress($user_info_array['address'],$locale->translateCharsetMIME(trim($user_info_array['name']), 'UTF-8', $OBCharset));
			    if($invite_person == true) 
			    {
			    	populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);
			    }

			}

			foreach($address_array['cc'] as $key => $user_info_array){
				$mail_object->AddCC($user_info_array['address'],$locale->translateCharsetMIME(trim($user_info_array['name']), 'UTF-8', $OBCharset));
				if($invite_person == true)
				{
					populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);
				}
			}

			foreach($address_array['bcc'] as $key => $user_info_array){
				$mail_object->AddBCC($user_info_array['address'],$locale->translateCharsetMIME(trim($user_info_array['name']), 'UTF-8', $OBCharset));
				if($invite_person == true) 
				{
					populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);
				}
			}


			if($invite_person == true){
				//Handle inviting users/contacts to meetings/calls
				if(!empty($address_array['invite_only'])){
					foreach($address_array['invite_only'] as $key => $user_info_array){
						populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);
					}
				}

				//use the user_arr & contact_arr to add these people to the meeting
				$focus->users_arr = $users_arr;
				$focus->contacts_arr = $contacts_arr;


				invite_people($focus);

			}

			//fill in the mail object with all the administrative settings and configurations
			setup_mail_object($mail_object, $admin);
			$error = create_email_body($focus, $mail_object, $admin, $alert_msg, $alert_shell_array);
            $mail_object->prepForOutbound();
            
			if($error == false)
			{
				if(!$mail_object->Send()) 
				{
					$GLOBALS['log']->warn("Notifications: error sending e-mail (method: {$mail_object->Mailer}), (error: {$mail_object->ErrorInfo})");
				}
				//end if error is false
			}

	//end if else use system defaults or not
	}

//end function send_workflow_alert
}


function setup_mail_object(& $mail_object, & $admin){
	global $sugar_version, $sugar_config, $app_list_strings, $current_user;

	if ($admin->settings['mail_sendtype'] == "SMTP") {
		$mail_object->Mailer = "smtp";
		$mail_object->Host = $admin->settings['mail_smtpserver'];
		$mail_object->Port = $admin->settings['mail_smtpport'];
		if ($admin->settings['mail_smtpssl'] == 1)
    	   $mail_object->SMTPSecure = 'ssl';
    	else if ($admin->settings['mail_smtpssl'] == 2)
    	   $mail_object->SMTPSecure = 'tls';
    	else
    	   $mail_object->SMTPSecure = '';

		if ($admin->settings['mail_smtpssl'] == 1)
    	   $mail_object->SMTPSecure = 'ssl';
    	else if ($admin->settings['mail_smtpssl'] == 2)
    	   $mail_object->SMTPSecure = 'tls';
    	else
    	   $mail_object->SMTPSecure = '';

		if ($admin->settings['mail_smtpauth_req']) {
			$mail_object->SMTPAuth = TRUE;
			$mail_object->Username = $admin->settings['mail_smtpuser'];
			$mail_object->Password = $admin->settings['mail_smtppass'];
		}
	//end if sendtype is SMTP
	} else {
        $mail_object->Mailer = 'sendmail';                
    }

	$mail_object->From = $admin->settings['notify_fromaddress'];
	$mail_object->FromName = (empty($admin->settings['notify_fromname'])) ? "" : $admin->settings['notify_fromname'];

//end function setup_mail_object
}


function create_email_body(& $focus, & $mail_object, & $admin, $alert_msg, $alert_shell_array, $notify_user_id=""){
	global $current_language;
	$mod_strings = return_module_language($current_language, 'WorkFlow');
	if($alert_shell_array['source_type']=="Custom Template"){
		//use custom template
		$error = fill_mail_object($mail_object, $focus, $alert_msg, "body_html", $notify_user_id);
		return $error;
	//use custom template
	}
	if($alert_shell_array['source_type']=="Normal Message"){
		//use standard message
		$mail_object->Body = from_html(trim($alert_msg));
		$mail_object->AltBody = from_html(trim($alert_msg));
		$mail_object->Subject = from_html(($mod_strings['LBL_ALERT_SUBJECT']));
		return false;
	//end if else use custom
	}


	return false;

//end function create_email_body
}

function get_related_array(& $focus, & $user_meta_array, & $address_array){

	///Build the relationship information using the Relationship handler
	$rel_handler = & $focus->call_relationship_handler("module_dir", true);
	$rel_handler->set_rel_vardef_fields($user_meta_array['rel_module1'], $user_meta_array['rel_module2']);
	//$rel_handler->base_bean = & $focus;
	$rel_handler->build_info(true);
	//get related bean
	$rel_list = $rel_handler->build_related_list("base");

	////Filter the first related module
	$rel_list = process_rel_type("rel_module1_type", "rel1_filter", $rel_list, $user_meta_array);

	////Filter using second filter if necessary
	if(!empty($user_meta_array['expression']) && $user_meta_array['rel_module2']==""){
		$rel_list = process_rel_type("filter", "expression", $rel_list, $user_meta_array, true);
	//end second filter if necessary
	}



	////Begin loop on first related module
	foreach($rel_list as $rel_object){


////////		//if second is set, then call second loop
		if($user_meta_array['rel_module2']!=""){

				$rel_handler->rel1_bean = $rel_object;
				$rel_list2 = $rel_handler->build_related_list("rel1");

				////Filter the second related module
				$rel_list2 = process_rel_type("rel_module2_type", "rel2_filter", $rel_list2, $user_meta_array);

				////Filter using second filter if necessary
				if(!empty($user_meta_array['expression'])){
					$rel_list2 = process_rel_type("filter", "expression", $rel_list2, $user_meta_array, true);
					//end second filter if necessary
				}



				///second loop
				foreach($rel_list2 as $rel_object2){

					compile_rel_user_info($rel_object2, $user_meta_array, $address_array);

				//end forloop
				}

////////
		} else {
			//if not, then call compile function
			compile_rel_user_info($rel_object, $user_meta_array, $address_array);
		//end if else no second module is present
		}

	//end for loop on the first related module
	}


//end function get_related_array2
}


function compile_rel_user_info($target_object, $user_meta_array, &$address_array){
		//compile user address info based on target object

		if($user_meta_array['rel_email_value']==""){
			$target_user_id = $target_object->$user_meta_array['field_value'];
			//Get user's manager id?
			if($user_meta_array['relate_type'] != "Self"){
				$target_user_id = get_manager_info($target_user_id);
			//end if we need to get the user's manager id
			}
			$user_array = get_alert_recipient($target_user_id);
		} else {
			//use the custom fields
			if($target_object->$user_meta_array['rel_email_value']==""){
				//no address;
				return;
			} else {
				$notify_address = $target_object->$user_meta_array['rel_email_value'];
			}
			$notify_name = check_special_fields($user_meta_array['field_value'], $target_object);
			$user_array['address'] = $notify_address;
			$user_array['name'] = $notify_name;
			$user_array['type'] = "external";
			$user_array['id'] = $target_object->id;
			$user_array['external_type'] = $target_object->module_dir;
			$user_array['notify_user'] = $target_object;
		//end if else use custom fields or not
		}

		//add user info to main address bucket
		$address_type = $user_meta_array['address_type'];
		//array_push($address_array[$address_type][], $user_array);
		$address_array[$address_type][] = $user_array;

//end function compile_rel_user_info
}


/////////////////////////////////////////Parsing Custom Templates//////////

function fill_mail_object(& $mail_object, & $focus, $template_id, $source_field, $notify_user_id=""){



	$template_object = new EmailTemplate();
	$template_object->disable_row_level_security = true;

	if(isset($template_id) && $template_id!="") {
 	  $template_object->retrieve($template_id);
	}

	if($template_object->id=""){
		return true;

	}

	if($template_object->from_name != ''){
		$mail_object->FromName = $template_object->from_name;
	}

	if($template_object->from_address != ''){
		$mail_object->From = $template_object->from_address;
	}

	 if ( empty($template_object->body)){
		$template_object->body = strip_tags(from_html($template_object->body_html));
 	}
 	if(!empty($template_object->body_html)){
		$mail_object->IsHTML(true);
		$mail_object->Body = from_html(parse_alert_template($focus, $template_object->body_html, $notify_user_id), true);
		$mail_object->AltBody = from_html(trim(parse_alert_template($focus, $template_object->body, $notify_user_id)));
 	}
 	else{
 		$mail_object->AltBody = from_html(trim(parse_alert_template($focus, $template_object->body, $notify_user_id)));
 	}
 	$mail_object->Subject = from_html(parse_alert_template($focus, $template_object->subject, $notify_user_id));

		return false;

//end function fill_mail_object;
}

function parse_alert_template($focus, $target_body, $notify_user_id=""){

	//Parse target body and return an array of components
	$component_array = parse_target_body($target_body, $focus->module_dir);
	$parsed_target_body = reconstruct_target_body($focus, $target_body, $component_array, $notify_user_id);
	return $parsed_target_body;

//end function parse_alert_template
}

function parse_target_body($target_body, $base_module){

	$component_array = Array();
	$component_array[$base_module] = Array();

	preg_match_all("/(({::)[^>]*?)(.*?)((::})[^>]*?)/", $target_body, $matches, PREG_SET_ORDER);

	foreach ($matches as $val) {
   		$matched_component = $val[0];
   		$matched_component_core = $val[3];

   		$split_array = preg_split('{::}', $matched_component_core);

   		if(!empty($split_array[3])){
   			//related module
   			//0 - future/past/href_link 1 - base_module 2 - rel_module 3 - field

   			$component_array[$split_array[2]][$split_array[3]]['name'] = $split_array[3];
   			$component_array[$split_array[2]][$split_array[3]]['value_type'] = $split_array[0];
   			$component_array[$split_array[2]][$split_array[3]]['original'] = $matched_component;

   		//end if related module
   		} else {
   			//base module
   			//0 - future/past/href_link 1 - base_module 2 - field
   			$meta_name = $split_array[2]."_".$split_array[0];
   			$component_array[$base_module][$meta_name]['name'] = $split_array[2];
   			$component_array[$base_module][$meta_name]['value_type'] = $split_array[0];
   			$component_array[$base_module][$meta_name]['original'] = $matched_component;

   		//end if else related or base module
   		}

	//end loop through components
	}

	return $component_array;

//end function parse_target_body
}

function decodeMultienumField($field) {
    return implode(', ', unencodeMultienum($field));
}

function reconstruct_target_body($focus, $target_body, $component_array, $notify_user_id=""){
	global $beanList;

	$replace_array = Array();

	foreach($component_array as $module_name => $module_array){

		if($module_name==$focus->module_dir){
			//base module

			foreach($module_array as $field => $field_array){

				if($field_array['value_type'] == 'href_link'){
					//Create href link to target record
					$replacement_value = get_href_link($focus);
				}

 				if($field_array['value_type'] == 'invite_link'){
					//Create href link to target record
					$replacement_value = get_invite_link($focus, $notify_user_id);
				}

				if($field_array['value_type'] == 'future'){
					$replacement_value = check_special_fields($field_array['name'], $focus, false, array());
				}
				if($field_array['value_type'] == 'past'){
					$replacement_value = check_special_fields($field_array['name'], $focus, true, array());
				}

				$replace_array[$field_array['original']] = decodeMultienumField($replacement_value);


			//end foreach module_array
			}

		//end if base module array
		} else {

			//Confirm this is an actual module in the beanlist
			if(isset($beanList[$module_name]) || isset($focus->field_defs[$module_name])){
				///Build the relationship information using the Relationship handler
				$rel_handler = $focus->call_relationship_handler("module_dir", true);

                if(isset($focus->field_defs[$module_name])) {
                    $rel_handler->rel1_relationship_name = $focus->field_defs[$module_name]['relationship'];
                    $rel_module = get_rel_module_name($focus->module_dir, $rel_handler->rel1_relationship_name, $focus->db);
                    $rel_handler->rel1_module = $rel_module;
                    $rel_handler->rel1_bean = get_module_info($rel_module);
                }
                else {
                    $rel_handler->process_by_rel_bean($module_name);
                }

				foreach($focus->field_defs as $field => $attribute_array){
					if(!empty($attribute_array['relationship']) && $attribute_array['relationship'] ==$rel_handler->rel1_relationship_name){
						//$relationship_name = $field;
						$rel_handler->base_vardef_field = $field;
						break;
					}
				}
				//obtain the rel_module object
				$rel_list = $rel_handler->build_related_list("base");
				//$rel_list = $focus->get_linked_beans($relationship_name, $bean_name);
				if(!empty($rel_list[0]))
				{
					$rel_object = $rel_list[0];
					$rel_module_present = true;
				} else {
					$rel_module_present = false;
				}

				foreach($module_array as $field => $field_array){

					if($rel_module_present == true){

						if($field_array['value_type'] == 'href_link'){
							//Create href link to target record
							$replacement_value = get_href_link($rel_object);
						} elseif($field_array['value_type'] == 'invite_link'){
							//Create href link to target record
							$replacement_value = get_invite_link($rel_object, $notify_user_id);
						} else {
							//use future always for rel because fetched should always be the same
							$replacement_value = check_special_fields($field_array['name'], $rel_object, false, array());
						}
					} else {
						$replacement_value = "Invalid Value";
					}
					$replace_array[$field_array['original']] = decodeMultienumField($replacement_value);

				//end foreach module_array
				}


			//end check to see if this is an actual module in the beanlist
			}

		//end if else base or related module array
		}



	//end outside foreach
	}

	$parsed_target_body = replace_target_body_items($target_body, $replace_array);
	return $parsed_target_body;

//end function reconstruct_target_body
}


function replace_target_body_items($target_body, $replace_array){

	foreach ($replace_array as $name => $replacement_value){
		$replacement_value=nl2br($replacement_value);
		$target_body = str_replace($name, $replacement_value, $target_body);
	}
	return $target_body;

//end function replace_target_body_items
}


function get_href_link(& $focus){
	global $app_list_strings;
	global $sugar_config;

	$link = "{$sugar_config['site_url']}/index.php?module={$focus->module_dir}&action=DetailView&record={$focus->id}";

	return "<a href=\"$link\">Click Here</a>";

//end function get_href_link
}


function get_invite_link(& $focus, $notify_user_id=""){
	global $app_list_strings;
	global $sugar_config;

	if($notify_user_id!=""){

		$accept_url = $sugar_config['site_url'].'/index.php?entryPoint=acceptDecline&module=Meetings&user_id='.$notify_user_id.'&record='.$focus->id;

		$link =	"\n Accept this meeting: \n
			<".$accept_url."&accept_status=accept>";

		$link .="\n Tentatively Accept this meeting \n
			<".$accept_url."&accept_status=tentative>";

		$link .="\nDecline this meeting \n
				<".$accept_url."&accept_status=decline>";

	return $link;

	}

//end function get_href_link
}


function invite_people( & $focus){

	//invite users and contacts

	//Will have to set this eventually when we allow existing meetings to add people
	//$existing_contacts
	//$existing_users


	if (!empty($focus->users_arr) && is_array($focus->users_arr )) {
	  	foreach ($focus->users_arr as $key => $user_id)
  		{
      	if (empty($user_id) || isset($existing_users[$user_id]))
      	{
         	continue;
      	}
      	  if (!isset($focus->users) || empty($focus->users)) {
      	  	$focus->load_relationship('users');
      	  }
	      $focus->users->add($user_id);
  		}
	}

	if (!empty($focus->contacts_arr) && is_array($focus->contacts_arr )) {
  		foreach ($focus->contacts_arr as $key =>$contact_id)
  		{
      	if (empty($contact_id) || isset($existing_contacts[$contact_id]))
      	{
         	continue;
      	}

      	  if (!isset($focus->contacts)) {
      	  	$focus->load_relationship('contacts');
      	  }
	      $focus->contacts->add($contact_id);
  		}
	}


//end function invite_people
}

function populate_usr_con_arrays($user_info_array, & $users_arr, & $contacts_arr){

	/*

	You can't send system default messages or invite non contact/user users.  The meeting/call modules
	are not designed for this.

	*/



		$possible_invitee = false;

	if(!empty($user_info_array['type']) && $user_info_array['type']=="internal"){

		//Users, so add to user_arr
		$users_arr[] = $user_info_array['id'];
		$possible_invitee = true;
	}

	if(!empty($user_info_array['type']) && $user_info_array['type']=="external" &&
	$user_info_array['external_type']=="Contacts"

	){
		//Contacts, so add to contact_arr
		$contacts_arr[] = $user_info_array['id'];
		$possible_invitee = true;
	}




	return $possible_invitee;

//end function populate_usr_con_arrays
}


function get_invite_email($focus, $admin, $address_array, $invite_person, $alert_msg, $alert_shell_array){
	require_once("include/SugarPHPMailer.php");
    global $locale;
    $OBCharset = $locale->getPrecedentPreference('default_email_charset');

	if($alert_shell_array['source_type']=="System Default"){
		$type = "Default";
	} else {
		$type = "Custom";
	}


		$users_arr = array();
		$contacts_arr = array();

	//TO: Addresses
	foreach($address_array['to'] as $key => $user_info_array){
		$mail_object = new SugarPHPMailer;
		$mail_object->AddAddress($user_info_array['address'],$locale->translateCharsetMIME(trim($user_info_array['name']), 'UTF-8', $OBCharset));
		$possible_invitee = populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);

		if($possible_invitee==true){
			setup_mail_object($mail_object, $admin);
			$user_info_array['notify_user']->new_assigned_user_name = $user_info_array['notify_user']->first_name.' '.$user_info_array['notify_user']->last_name;

			if($type=="Default"){
				$error = get_system_default_body($mail_object, $focus, $user_info_array['notify_user']);
			} else {
				$error = create_email_body($focus, $mail_object, $admin, $alert_msg, $alert_shell_array, $user_info_array['notify_user']->id);
			}

			send_mail_object($mail_object, $error);
		//end if possible invitees
		}
	//end foreach loop
	}

	//CC: Addresses
	foreach($address_array['cc'] as $key => $user_info_array){
		$mail_object = new SugarPHPMailer;
		$mail_object->AddCC($user_info_array['address'],$locale->translateCharsetMIME(trim($user_info_array['name']), 'UTF-8', $OBCharset));

		$possible_invitee = populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);

		if($possible_invitee==true){
			setup_mail_object($mail_object, $admin);
			$user_info_array['notify_user']->new_assigned_user_name = $user_info_array['notify_user']->first_name.' '.$user_info_array['notify_user']->last_name;
			if($type=="Default"){
				$error = get_system_default_body($mail_object, $focus, $user_info_array['notify_user']);
			} else {
				$error = create_email_body($focus, $mail_object, $admin, $alert_msg, $alert_shell_array, $user_info_array['notify_user']->id);
			}

			send_mail_object($mail_object, $error);
		//end if possible invitee
		}
	}

	//BCC: Addresses
	foreach($address_array['bcc'] as $key => $user_info_array){
		$mail_object = new SugarPHPMailer;
		$mail_object->AddBCC($user_info_array['address'], $locale->translateCharsetMIME(trim($user_info_array['name']), 'UTF-8', $OBCharset));

		$possible_invitee = populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);

		if($possible_invitee==true){
		setup_mail_object($mail_object, $admin);
		$user_info_array['notify_user']->new_assigned_user_name = $user_info_array['notify_user']->first_name.' '.$user_info_array['notify_user']->last_name;
			if($type=="Default"){
				$error = get_system_default_body($mail_object, $focus, $user_info_array['notify_user']);
			} else {
				$error = create_email_body($focus, $mail_object, $admin, $alert_msg, $alert_shell_array, $user_info_array['notify_user']->id);
			}

			send_mail_object($mail_object, $error);
		//end if possible invitee
		}
	//end foreach loop
	}


	if($invite_person == true){
		//Handle inviting users/contacts to meetings/calls
		if(!empty($address_array['invite_only'])){
			foreach($address_array['invite_only'] as $key => $user_info_array){
				populate_usr_con_arrays($user_info_array, $users_arr, $contacts_arr);
			}
		}

		//use the user_arr & contact_arr to add these people to the meeting
		$focus->users_arr = $users_arr;
		$focus->contacts_arr = $contacts_arr;


			invite_people($focus);

	}

//end function get_system_default_email
}




function get_system_default_body(&$mail_object, $focus, & $notify_user){

		global $sugar_version, $sugar_config, $app_list_strings, $current_user;

		if (empty($_SESSION['authenticated_user_language'])) {
			$current_language = $sugar_config['default_language'];
		}
		else {
			$current_language = $_SESSION['authenticated_user_language'];
		}


		$xtpl = new XTemplate("include/language/{$current_language}.notify_template.html");

		$template_name = $focus->object_name;

		$focus->current_notify_user = $notify_user;

		if (in_array('set_notification_body', get_class_methods($focus)))
		{
			$xtpl = $focus->set_notification_body($xtpl, $focus);
		}
		else
		{
			$xtpl->assign("OBJECT", $focus->object_name);
			$template_name = "Default";
		}

		$xtpl->assign("ASSIGNED_USER", $focus->new_assigned_user_name);
		$xtpl->assign("ASSIGNER", $current_user->user_name);
		$xtpl->assign("URL", "{$sugar_config['site_url']}/index.php?module={$focus->module_dir}&action=DetailView&record={$focus->id}");
		$xtpl->assign("SUGAR", "Sugar v{$sugar_version}");
		$xtpl->parse($template_name);
		$xtpl->parse($template_name . "_Subject");

		$mail_text_array['body'] = from_html(trim($xtpl->text($template_name)));
		$mail_text_array['subject'] = from_html($xtpl->text($template_name . "_Subject"));

		$mail_object->Body = $mail_text_array['body'];
		$mail_object->Subject =  $mail_text_array['subject'];


		return false;

//end function get_system_default_body
}



function send_mail_object(&$mail_object, $error){

			if($error == false){
				if(!$mail_object->Send()) {
					$GLOBALS['log']->warn("Notifications: error sending e-mail (method: {$mail_object->Mailer}), (error: {$mail_object->ErrorInfo})");
				}
			}

//end function send_mail_object
}



?>

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

require_once('include/MVC/View/SugarView.php');

class CalendarViewGetGRUsers extends SugarView {

	function CalendarViewGetGRUsers(){
 		parent::SugarView();
	}
	
	function process(){
		$this->display();
	}
	
	function display(){
		$users_arr = array();
		require_once("modules/Users/User.php");	
	
		$user_ids = explode(",", trim($_REQUEST['users'],','));	
		$user_ids = array_unique($user_ids);	

		require_once('include/json_config.php');
		global $json;
		$json = getJSONobj();
		$json_config = new json_config();        
	       
		foreach($user_ids as $u_id){
			if(empty($u_id))
				continue;
			$bean = new User();
			$bean->retrieve($u_id);
			array_push($users_arr, $json_config->populateBean($bean));        	
		}
		
		$GRjavascript = "\n" . $json_config->global_registry_var_name."['focus'].users_arr = " . $json->encode($users_arr) . ";\n";       	
		ob_clean();
		echo $GRjavascript;
	}	

}

?>

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

class UpgradeSavedSearch {

	function UpgradeSavedSearch() {
		
		$result = $GLOBALS['db']->query("SELECT id FROM saved_search");
		while($row = $GLOBALS['db']->fetchByAssoc($result)) {
		      $focus = new SavedSearch();
			  $focus->retrieve($row['id']);
			  $contents = unserialize(base64_decode($focus->contents));
              $has_team_name_saved = isset($contents['team_name_advanced']) || isset($contents['team_name_basic']) ? true : false;
			  //If $contents['searchFormTab'] is set then this is coming from a 4.x saved search
			  if(isset($contents['searchFormTab']) && $contents['searchFormTab'] == 'saved_views') {
			  	 $new_contents = array();
			  	 $module = $contents['search_module'];
			  	 $advanced = !empty($contents['advanced']);
			  	 $field_map = array();
			  	 
			  	 if(file_exists("custom/modules/{$module}/metadata/searchdefs.php")) {
			  	 	require("custom/modules/{$module}/metadata/searchdefs.php");
			  	 	$field_map = $advanced ? $searchdefs[$module]['layout']['advanced_search'] : $searchdefs[$module]['layout']['basic_search'];			  	 
			     }else if(file_exists("modules/{$module}/metadata/SearchFields.php")) {
			  	 	require("modules/{$module}/metadata/SearchFields.php");
			  	 	$field_map = $searchFields[$module];
			  	 } else {
				  	
				  	$bean = loadBean($module);
				  	$field_map = $bean->field_name_map;	 	 
			  	 }

			  	 //Special case for team_id field (from 4.5.x)
			  	 if(isset($contents['team_id'])) {
			  	    $contents['team_name'] = $contents['team_id'];
			  	    unset($contents['team_id']);	
			  	 }
			  	 
			  	 foreach($contents as $key=>$value) {
			  	 	 if(isset($field_map[$key])) {
			  	 	 	$new_key = $key . ($advanced ? '_advanced' : '_basic');
			  	 	    if(preg_match('/^team_name_(advanced|basic)$/', $new_key)) {
			  	 	 	   
			  	 	       if(!is_array($value)) {
			  	 	       	  $temp_value = array();
			  	 	       	  $teap_value[] = $value;
			  	 	       	  $value = $temp_value;
			  	 	       }
			  	 	    
			  	 	       $team_results = $GLOBALS['db']->query("SELECT id, name FROM teams where id in ('" . implode("','", $value) . "')");
			  	 	       if(!empty($team_results)) {
			  	 	       	  $count = 0;
			  	 	       	  while($team_row = $GLOBALS['db']->fetchByAssoc($team_results)) {
			  	 	       	 	 	$team_key = $new_key . '_collection_' . $count;
				  	 	       	 	$new_contents[$team_key] = $team_row['name'];
				  	 	       	 	$new_contents['id_' . $team_key] = $team_row['id'];
				  	 	       	 	$count++;
			  	 	       	  } //while
			  	 	       } //if
			  	 	       
			  	 	       
			  	 	       //Unset the original key
			  	 	       unset($new_contents[$key]);
			  	 	       
			  	 	       //Add the any switch
			  	 	       $new_contents[$new_key . '_type'] = 'any';
			  	 	 	} else {			  	 	 	
			  	 	 	   $new_contents[$new_key] = $value;
			  	 	 	}
			  	 	 } else {
			  	 	 	$new_contents[$key] = $value;
			  	 	 }
			  	 }
			  	 $new_contents['searchFormTab'] = $advanced ? 'advanced_search' : 'basic_search';
			  	 $content = base64_encode(serialize($new_contents));
			  	 $GLOBALS['db']->query("UPDATE saved_search SET contents = '{$content}' WHERE id = '{$row['id']}'");
			} else if($has_team_name_saved) {
			     //Otherwise, if the boolean has_team_name_saved is set to true, we also need to parse (coming from 5.x)
			  	 if(isset($contents['team_name_advanced'])) {
			  	 	$team_results = $GLOBALS['db']->query("SELECT name FROM teams where id = '{$contents['team_name_advanced']}'");
			  	 	if(!empty($team_results)) {
			  	 		$team_row = $GLOBALS['db']->fetchByAssoc($team_results);
				  	 	$contents['team_name_advanced_collection_0'] = $team_row['name'];
				  	 	$contents['id_team_name_advanced_collection_0'] = $contents['team_name_advanced'];
				  	 	$contents['team_name_advanced_type'] = 'any';
				  	 	unset($contents['team_name_advanced']);
					  	$content = base64_encode(serialize($contents));
					  	$GLOBALS['db']->query("UPDATE saved_search SET contents = '{$content}' WHERE id = '{$row['id']}'"); 				  	 	
			  	 	}
			  	 } 				
			}
		} //while
	}
}
?>
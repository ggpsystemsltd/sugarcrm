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

 * Description:  is a form helper
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

/**
 * Check for null or zero for list of values
 * @param $prefix the prefix of value to be checked
 * @param $required array of value to be checked
 * @return boolean true if all values are set in the array
 */
function checkRequired($prefix, $required)
{
	foreach($required as $key)
	{
		if(!isset($_POST[$prefix.$key]) || number_empty($_POST[$prefix.$key]))
		{
			return false;
		}
	}
	return true;
}

function populateFromPost($prefix, &$focus, $skipRetrieve=false) {
	global $current_user;

	if(!empty($_REQUEST[$prefix.'record']) && !$skipRetrieve)
		$focus->retrieve($_REQUEST[$prefix.'record']);

	if(!empty($_POST['assigned_user_id']) && 
	    ($focus->assigned_user_id != $_POST['assigned_user_id']) && 
	    ($_POST['assigned_user_id'] != $current_user->id)) {
		$GLOBALS['check_notify'] = true;
	}
    require_once('include/SugarFields/SugarFieldHandler.php');
    $sfh = new SugarFieldHandler();
   
	foreach($focus->field_defs as $field=>$def) {
        if ( $field == 'id' && !empty($focus->id) ) {
            // Don't try and overwrite the ID
            continue;
        }
	    $type = !empty($def['custom_type']) ? $def['custom_type'] : $def['type'];
		$sf = $sfh->getSugarField($type);
        if($sf != null){
            $sf->save($focus, $_POST, $field, $def, $prefix);
        } else {
            $GLOBALS['log']->fatal("Field '$field' does not have a SugarField handler");
        }

/*
        if(isset($_POST[$prefix.$field])) {
			if(is_array($_POST[$prefix.$field]) && !empty($focus->field_defs[$field]['isMultiSelect'])) {
				if($_POST[$prefix.$field][0] === '' && !empty($_POST[$prefix.$field][1]) ) {
					unset($_POST[$prefix.$field][0]);
				}
				$_POST[$prefix.$field] = encodeMultienumValue($_POST[$prefix.$field]);	
			}

			$focus->$field = $_POST[$prefix.$field];
			/* 
			 * overrides the passed value for booleans.
			 * this will be fully deprecated when the change to binary booleans is complete.
			 /
			if(isset($focus->field_defs[$prefix.$field]) && $focus->field_defs[$prefix.$field]['type'] == 'bool' && isset($focus->field_defs[$prefix.$field]['options'])) {
				$opts = explode("|", $focus->field_defs[$prefix.$field]['options']);
				$bool = $_POST[$prefix.$field];

				if(is_int($bool) || ($bool === "0" || $bool === "1" || $bool === "2")) {
					// 1=on, 2=off
					$selection = ($_POST[$prefix.$field] == "0") ? 1 : 0;
				} elseif(is_bool($_POST[$prefix.$field])) {
					// true=on, false=off
					$selection = ($_POST[$prefix.$field]) ? 0 : 1;
				}
				$focus->$field = $opts[$selection];
			}
		} else if(!empty($focus->field_defs[$field]['isMultiSelect']) && !isset($_POST[$prefix.$field]) && isset($_POST[$prefix.$field . '_multiselect'])) {
			$focus->$field = '';
		}
*/
	}

	foreach($focus->additional_column_fields as $field) {
		if(isset($_POST[$prefix.$field])) {
			$value = $_POST[$prefix.$field];
			$focus->$field = $value;
		}
	}

	return $focus;
}


function add_hidden_elements($key, $value) {

    $elements = '';

    // if it's an array, we need to loop into the array and use square brackets []
    if (is_array($value)) {
        foreach ($value as $k=>$v) {
            $elements .= "<input type='hidden' name='$key"."[$k]' value='$v'>\n";
        }
    } else {
        $elements = "<input type='hidden' name='$key' value='$value'>\n";
    }

    return $elements;
}


function getPostToForm($ignore='', $isRegularExpression=false)
{
	$fields = '';
	if(!empty($ignore) && $isRegularExpression) {
		foreach ($_POST as $key=>$value){
			if(!preg_match($ignore, $key)) {
                                $fields .= add_hidden_elements($key, $value);
			}
		}	
	} else {
		foreach ($_POST as $key=>$value){
			if($key != $ignore) {
                                $fields .= add_hidden_elements($key, $value);
			}
		}
	}
	return $fields;
}

function getGetToForm($ignore='', $usePostAsAuthority = false)
{
	$fields = '';
	foreach ($_GET as $key=>$value)
	{
		if($key != $ignore){
			if(!$usePostAsAuthority || !isset($_POST[$key])){
				$fields.= "<input type='hidden' name='$key' value='$value'>";
			}
		}
	}
	return $fields;

}
function getAnyToForm($ignore='', $usePostAsAuthority = false)
{
	$fields = getPostToForm($ignore);
	$fields .= getGetToForm($ignore, $usePostAsAuthority);
	return $fields;

}

function handleRedirect($return_id='', $return_module='', $additionalFlags = false)
{
	if(isset($_REQUEST['return_url']) && $_REQUEST['return_url'] != "")
	{
		header("Location: ". $_REQUEST['return_url']);
		exit;
	}

	$url = buildRedirectURL($return_id, $return_module);
	header($url);
	exit;	
}

//eggsurplus: abstract to simplify unit testing
function buildRedirectURL($return_id='', $return_module='') 
{
    if(isset($_REQUEST['return_module']) && $_REQUEST['return_module'] != "")
	{
		$return_module = $_REQUEST['return_module'];
	}
	else
	{
		$return_module = $return_module;
	}
	if(isset($_REQUEST['return_action']) && $_REQUEST['return_action'] != "")
	{
	    
	   //if we are doing a "Close and Create New"
        if(isCloseAndCreateNewPressed())
        {
            $return_action = "EditView";    
            $isDuplicate = "true";        
            $status = "";
            
            // Meeting Integration
            if(isset($_REQUEST['meetingIntegrationFlag']) && $_REQUEST['meetingIntegrationFlag'] == 1) {
            	$additionalFlags = array('meetingIntegrationShowForm' => '1');
            }
            // END Meeting Integration
        } 
		// if we create a new record "Save", we want to redirect to the DetailView
		else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "Save" 
			&& $_REQUEST['return_module'] != 'Activities'
			&& $_REQUEST['return_module'] != 'WorkFlow'  
			&& $_REQUEST['return_module'] != 'Home' 
			&& $_REQUEST['return_module'] != 'Forecasts' 
			&& $_REQUEST['return_module'] != 'Calendar'
			&& $_REQUEST['return_module'] != 'MailMerge'
			&& $_REQUEST['return_module'] != 'TeamNotices'
			) 
			{
			    $return_action = 'DetailView';
			} elseif($_REQUEST['return_module'] == 'Activities' || $_REQUEST['return_module'] == 'Calendar') {
			$return_module = $_REQUEST['module'];
			$return_action = $_REQUEST['return_action']; 
			// wp: return action needs to be set for one-click close in task list
		} 
		else 
		{
			// if we "Cancel", we go back to the list view.
			$return_action = $_REQUEST['return_action'];
		}
	}
	else
	{
		$return_action = "DetailView";
	}
	
	if(isset($_REQUEST['return_id']) && $_REQUEST['return_id'] != "")
	{
		$return_id = $_REQUEST['return_id'];
	}

    $add = "";
    if(isset($additionalFlags) && !empty($additionalFlags)) {
        foreach($additionalFlags as $k => $v) {
            $add .= "&{$k}={$v}";
        }
    }
    
    if (!isset($isDuplicate) || !$isDuplicate)
    {
        $url="index.php?action=$return_action&module=$return_module&record=$return_id&return_module=$return_module&return_action=$return_action{$add}";
        if(isset($_REQUEST['offset']) && empty($_REQUEST['duplicateSave'])) {
            $url .= "&offset=".$_REQUEST['offset'];
        }
        if(!empty($_REQUEST['ajax_load']))
        {
            $ajax_ret = array(
                'content' => "<script>SUGAR.ajaxUI.loadContent('$url');</script>\n",
                'menu' => array(
                    'module' => $return_module,
                    'label' => translate($return_module),
                ),
            );
            $json = getJSONobj();
            echo $json->encode($ajax_ret);
        } else {
            return "Location: $url";
        }
    } else {
    	$standard = "action=$return_action&module=$return_module&record=$return_id&isDuplicate=true&return_module=$return_module&return_action=$return_action&status=$status";
        $url="index.php?{$standard}{$add}";
        if(!empty($_REQUEST['ajax_load']))
        {
            $ajax_ret = array(
                 'content' => "<script>SUGAR.ajaxUI.loadContent('$url');</script>\n",
                 'menu' => array(
                     'module' => $return_module,
                     'label' => translate($return_module),
                 ),
            );
            $json = getJSONobj();
            echo $json->encode($ajax_ret);
        } else {
            return "Location: $url";
        }
    }
}

function getLikeForEachWord($fieldname, $value, $minsize=4)
{
	$value = trim($value);
	$values = explode(' ',$value);
	$ret = '';
	foreach($values as $val)
	{
		if(strlen($val) >= $minsize)
		{
			if(!empty($ret))
			{
				$ret .= ' or';
			}
			$ret .= ' '. $fieldname . ' LIKE %'.$val.'%';
		}

	}


}

function isCloseAndCreateNewPressed() {
    return isset($_REQUEST['action']) && 
           $_REQUEST['action'] == "Save" &&
           isset($_REQUEST['isSaveAndNew']) && 
           $_REQUEST['isSaveAndNew'] == 'true';	
}

/**
 * This is a helper function to return the url portion of the teams sent
 * 
 * @param $module String value of module used for the prefixing
 * @return String URL format of teams sent to the form base code
 */
function get_teams_url($module='') {
	require_once('include/SugarFields/SugarFieldHandler.php');
	$sfh = new SugarFieldHandler();  
	$sf = $sfh->getSugarField('Teamset', true);      	
    $teams = $sf->getTeamsFromRequest('team_name');
    $url = '';
	if(!empty($teams)) {
	   //Store the id and count values because this is the true index as duplicate teams
	   //may have been passed into the $_REQUEST variable
	   $id_to_count = array();
	   $count = 0;
	   foreach($teams as $id=>$name) {
	   	   $id_to_count[$id] = $count;
           $url .= "&{$module}id_team_name_collection_{$count}=" . urlencode($id);
           $url .= "&{$module}team_name_collection_{$count}=" . urlencode($name);
           $count++;
	   }
	   
	   if(isset($_REQUEST['primary_team_name_collection'])) {
	   	  $primary_index = $_REQUEST['primary_team_name_collection'];
	   	  $primary_team_id = $_REQUEST["id_team_name_collection_{$primary_index}"];
	      $url .= "&{$module}primary_team_name_collection=" . $id_to_count[$primary_team_id];
	   }
	}
	return $url;
}


/**
 * get_teams_hidden_inputs
 * This is a helper function to construct a String of the hidden input parameters representing the
 * teams that were sent to the form base code
 * 
 * @param $module String value of module
 * @return String HTML format of teams sent to the form base code
 */
function get_teams_hidden_inputs($module='') {
	$_REQUEST = array_merge($_REQUEST, $_POST);
	if(!empty($module)) {
		foreach($_REQUEST as $name=>$value) {
			if(preg_match("/^{$module}(.*?team_name.*?$)/", $name, $matches)) {
			   $_REQUEST[$matches[1]] = $value;  
			}
		}
	}

	
	require_once('include/SugarFields/SugarFieldHandler.php');
	$sfh = new SugarFieldHandler();  
	$sf = $sfh->getSugarField('Teamset', true);      	
    $teams = $sf->getTeamsFromRequest('team_name');	
    $input = '';
    
	if(!empty($teams)) {
	   $count = 0;
	   foreach($teams as $id=>$name) {
           $input .= "<input type='hidden' name='id_team_name_collection_{$count}' value='" . urlencode($id) . "'>\n";
           $input .= "<input type='hidden' name='team_name_collection_{$count}' value='" . urlencode($name) . "'>\n";
           $count++;
	   }

	   if(isset($_REQUEST['primary_team_name_collection'])) {
	      $input .= "<input type='hidden' name='primary_team_name_collection' value='" . $_REQUEST['primary_team_name_collection'] . "'>\n";
	   }
	}
	return $input;    
}

?>

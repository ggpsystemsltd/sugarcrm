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




class StoreQuery{
	var $query = array();
	
	function addToQuery($name, $val){
		$this->query[$name] = $val;	
	}
	
	/**
	 * SaveQuery
	 *  
	 * This function handles saving the query parameters to the user preferences
	 * SavedSearch.php does something very similar when saving saved searches as well
	 * 
	 * @see SavedSearch
	 * @param $name String name  to identify this query
	 */
	function SaveQuery($name)
	{
		global $current_user, $timedate;
		if(isset($this->query['module']))
		{
		   $bean = loadBean($this->query['module']);
		   if(!empty($bean))
		   {
		   	  foreach($this->query as $key=>$value)
		   	  {
	   	  	    //Filter date fields to ensure it is saved to DB format, but also avoid empty values
				if(!empty($value) && preg_match('/^(start_range_|end_range_|range_)?(.*?)(_advanced|_basic)$/', $key, $match))
				{
				   $field = $match[2];
				   if(isset($bean->field_defs[$field]['type']) && empty($bean->field_defs[$field]['disable_num_format']))
				   {
				   	  $type = $bean->field_defs[$field]['type'];
				   	  
				   	  if(($type == 'date' || $type == 'datetime' || $type == 'datetimecombo') && !preg_match('/^\[.*?\]$/', $value))
				   	  {
				   	  	 $db_format = $timedate->to_db_date($value, false);
				   	  	 $this->query[$key] = $db_format;
				   	  }  else if ($type == 'int' || $type == 'currency' || $type == 'decimal' || $type == 'float') {
				   	  		if(preg_match('/[^\d]/', $value)) {
						   	  	 require_once('modules/Currencies/Currency.php');
						   	  	 $this->query[$key] = unformat_number($value);
						   	  	 //Flag this value as having been unformatted
						   	  	 $this->query[$key . '_unformatted_number'] = true;
						   	  	 //If the type is of currency and there was a currency symbol (non-digit), save the symbol
						   	  	 if($type == 'currency' && preg_match('/^([^\d])/', $value, $match))
						   	  	 {
						   	  	 	$this->query[$key . '_currency_symbol'] = $match[1];
						   	  	 }
					   	  	} else {
					   	  		 //unset any flags
					   	  		 if(isset($this->query[$key . '_unformatted_number']))
					   	  		 {
					   	  		 	unset($this->query[$key . '_unformatted_number']);
					   	  		 }
					   	  		 
					   	  		 if(isset($this->query[$key . '_currency_symbol']))
					   	  		 {
					   	  		 	unset($this->query[$key . '_currency_symbol']);
					   	  		 }
					   	  	}
				   	  }
				   }
				}
		   	  }
		   }
		}

		$current_user->setPreference($name.'Q', $this->query);
	}
	
	function clearQuery($name){
		$this->query = array();
		$this->saveQuery($name);	
	}
	
	function loadQuery($name){
		$saveType = $this->getSaveType($name);
		if($saveType == 'all' || $saveType == 'myitems'){
			global $current_user;
			$this->query = StoreQuery::getStoredQueryForUser($name);
			if(empty($this->query)){
				$this->query = array();	
			}
			if(!empty($this->populate_only) && !empty($this->query['query'])){
				$this->query['query'] = 'MSI';
			}
		}
	}
	
	function populateRequest()
	{
		global $timedate;
		
		if(isset($this->query['module']))
		{
		   $bean = loadBean($this->query['module']);
		}


		foreach($this->query as $key=>$value)
		{
            // todo wp: remove this
            if($key != 'advanced' && $key != 'module' && $key != 'lvso')
            {   
            	//Filter date fields to ensure it is saved to DB format, but also avoid empty values
                if(!empty($value) && !empty($bean) && preg_match('/^(start_range_|end_range_|range_)?(.*?)(_advanced|_basic)$/', $key, $match))
				{
				   $field = $match[2];
				   if(isset($bean->field_defs[$field]['type']) && empty($bean->field_defs[$field]['disable_num_format']))
				   {
				   	  $type = $bean->field_defs[$field]['type'];
				   	  
				   	  if(($type == 'date' || $type == 'datetime' || $type == 'datetimecombo') && preg_match('/^\d{4}-\d{2}-\d{2}$/', $value) && !preg_match('/^\[.*?\]$/', $value))
				   	  {
				   	  	 $value = $timedate->to_display_date($value, false);
				   	  }  else if (($type == 'int' || $type == 'currency' || $type == 'decimal' || $type == 'float') && isset($this->query[$key . '_unformatted_number']) && preg_match('/^\d+$/', $value)) {
				   	  	 require_once('modules/Currencies/Currency.php');
				   	  	 $value = format_number($value);
				   	  	 if($type == 'currency' && isset($this->query[$key . '_currency_symbol']))
				   	  	 {
				   	  	 	$value = $this->query[$key . '_currency_symbol'] . $value;
				   	  	 }
				   	  }
				   }
				}            	
            	
            	// cn: bug 6546 storequery stomps correct value for 'module' in Activities
    			$_REQUEST[$key] = $value;	
    			$_GET[$key] = $value;

            }
        }
	}
	
	function getSaveType($name)
	{
		global $sugar_config;
		$save_query = empty($sugar_config['save_query']) ?
			'all' : $sugar_config['save_query'];

		if(is_array($save_query))
		{
			if(isset($save_query[$name]))
			{
				$saveType = $save_query[$name];
			}
			elseif(isset($save_query['default']))
			{
				$saveType = $save_query['default'];
			}
			else
			{
				$saveType = 'all';
			}	
		}
		else
		{
			$saveType = $save_query;
		}	
		if($saveType == 'populate_only'){
			$saveType = 'all';
			$this->populate_only = true;
		}
		return $saveType;
	}

	
	function saveFromRequest($name){
		if(isset($_REQUEST['query'])){
			if(!empty($_REQUEST['clear_query']) && $_REQUEST['clear_query'] == 'true'){
				$this->clearQuery($name);
				return;	
			}
			$saveType = $this->getSaveType($name);
			
			if($saveType == 'myitems'){
				if(!empty($_REQUEST['current_user_only'])){
					$this->query['current_user_only'] = $_REQUEST['current_user_only'];
					$this->query['query'] = true;
				}
				$this->saveQuery($name);
				
			}else if($saveType == 'all'){
                // Bug 39580 - Added 'EmailTreeLayout','EmailGridWidths' to the list as these are added merely as side-effects of the fact that we store the entire
                // $_REQUEST object which includes all cookies.  These are potentially quite long strings as well.
				$blockVariables = array('mass', 'uid', 'massupdate', 'delete', 'merge', 'selectCount', 'current_query_by_page','EmailTreeLayout','EmailGridWidths');
				$this->query = $_REQUEST;
                foreach($blockVariables as $block) {
                    unset($this->query[$block]);
                }
				$this->saveQuery($name);	
			}
		}
	}
	
	function saveFromGet($name){
		if(isset($_GET['query'])){
			if(!empty($_GET['clear_query']) && $_GET['clear_query'] == 'true'){
				$this->clearQuery($name);
				return;	
			}
			$saveType = $this->getSaveType($name);
			
			if($saveType == 'myitems'){
				if(!empty($_GET['current_user_only'])){
					$this->query['current_user_only'] = $_GET['current_user_only'];
					$this->query['query'] = true;
				}
				$this->saveQuery($name);
				
			}else if($saveType == 'all'){
				$this->query = $_GET;
				$this->saveQuery($name);	
			}
		}
	}

	/**
	 * Static method to retrieve the user's stored query for a particular module
	 *
	 * @param string $module
	 * @return array
	 */
	public static function getStoredQueryForUser($module)
	{
		global $current_user;
		return $current_user->getPreference($module.'Q');
	}	
}
?>

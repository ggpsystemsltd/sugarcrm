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

 * Description:
 ********************************************************************************/





// Quotas is used to store quota information on certain users.
class Quota extends SugarBean {
	// Stored fields

	var $id;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;

	var $user_id;
	var $assigned_user_id;
	var $user_name;
	var $user_full_name;
	var $timeperiod_id;
	var $amount;
	var $amount_base_currency;
	var $currency_id;
	var $currency_symbol;
	var $committed;
	
	var $table_name = "quotas";
	var $module_dir = 'Quotas';
	var $object_name = "Quota";
	
	//Here value of tracker_visibility is false, as this module should not be tracked.
	var $tracker_visibility = false;
	
	var $new_schema = true;

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();
	
	function Quota() {
		parent::SugarBean();
		$this->disable_row_level_security =true;
	}

	

/*	function get_summary_text()
	{
		return "$this->name";
	}

*/

/**
 * function create_list_query
 * @param $order_by
 * @param $where
 * @param $show_deleted
 */
	function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false, $retrieve_created_by = true)	
	{
		global $current_user;
		
		$ret_array['select'] = "SELECT users.first_name as name, users.last_name, users.id users_id, quotas.* ";
				
		$ret_array['from'] = " FROM users, quotas"; 		
		$where_query = " WHERE ";
		if (isset($where)) $where_query .= " ".$where. " AND ";
		$where_query .= " users.id = quotas.user_id";
		if($retrieve_created_by){
		  $where_query .= " AND quotas.created_by = '" . $current_user->id . "'";
	    }
		$where_query .= " AND (users.reports_to_id = '" . $current_user->id . "'";
		if($retrieve_created_by){
			$where_query .= " OR (quotas.quota_type = 'Direct'" .
				      " AND users.id = '" . $current_user->id . "'))";
		}else{
			$where_query .= " OR (users.id = '" . $current_user->id . "'))";
		}
		$ret_array['where'] = $where_query; 
		$orderby_query ='';
		if(!empty($order_by))
			$orderby_query = " ORDER BY $order_by";
 
		$ret_array['order_by'] = $orderby_query ;

		if($return_array)
    	{
    		return $ret_array;
    	}		
		
	    return $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];
		

	}

	
/*
	function save_relationship_changes($is_update)
    {

    }

	function clear_product_producttype_relationship($producttype_id)
	{
		$query = "UPDATE $this->rel_products set type_id='' where (type_id='$producttype_id') and deleted=0";
		$this->db->query($query,true,"Error clearing producttype to producttype relationship: ");
	}

	function mark_relationships_deleted($id)
	{
		$this->clear_product_producttype_relationship($id);
	}
*/
	function fill_in_additional_list_fields()
	{
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
		global $mod_strings;
		// Get the user's full name
		$this->user_full_name = $this->getUserFullName($this->user_id);

		// Get the currency symbol based on the currency id
		if ($this->currency_id != -99)
			$this->currency_symbol = $this->getCurrencySymbol($this->currency_id);
	}
		
	function get_list_view_data(){
		$temp_array = $this->get_list_view_array();

		if ($this->currency_id == -99)
			$temp_array['AMOUNT'] =  format_number($this->amount_base_currency, 2, 2, array('convert' => true, 'currency_symbol' => true));
		else
			$temp_array['AMOUNT'] =  format_number($this->amount_base_currency, 2, 2, array('convert' => true, 'currency_symbol' => false)) . " ( ". $this->currency_symbol . " )";

        if ($this->committed ==1) {
            $temp_array['COMMITTED_FLAG']='checked';
        }
		return $temp_array;
	}

	function save($check_notify = FALSE)
	{
			return parent::save($check_notify);
	}

	function set_notification_body($xtpl, $quota)
	{
		global $sugar_config;
				
		$xtpl->assign("QUOTA_AMOUNT", format_number($quota->amount, 2, 2, array('convert' => true, 'currency_symbol' => true)));
		$xtpl->assign("QUOTA_URL", $sugar_config['site_url'].'/index.php?module=Quotas&action=index&timeperiod_id='.$quota->timeperiod_id);
		$xtpl->assign("QUOTA_TIMEPERIOD", $quota->getTimePeriod($quota->timeperiod_id));

		return $xtpl;
	}

/**
 * function getQuotaRowCount. Helper function to get a row count of the given query
 * (Can be modified and/or removed if there are other utils in the code for this)
 * @param $query
 * NOTE: Renamed to distinguish it from the deprecated and now removed getRowCount DBManager function
 */	
	function getQuotaRowCount($query)
	{
		$result = $this->db->query($this->create_list_count_query($query));	
		$row = $this->db->fetchByAssoc($result);
		
		return $row['c'];
	}

/**
 * function getUserFullName. Helper function to get the full name of the user. 
 * @param $user_id
 */		
	function getUserFullName($user_id)
	{
	    global $locale;
	    
		// Get the user's full name to display in the table
		$qry = "SELECT U.first_name, U.last_name " .
			   "FROM users U " .
			   "WHERE U.id = '" . $user_id . "' ";
			   
		$result = $this->db->query($qry,true," Error filling in additional detail fields: ");

		$row = Array();
		$row = $this->db->fetchByAssoc($result);
		
		if($row != null){
			$user_full_name = $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
		}
		
		return $user_full_name;
	}

/**
 * function getTimePeriodSelectList. Helper function to deliver the options
 * for the timeperiod <SELECT> tag. 
 * @param $id - if it is defined, then default to the selected timeperiod,
 * else print directions for the user
 */		
	function getTimePeriodsSelectList($id = '') {
		global $mod_strings;
		
		$qry = "SELECT id, name FROM timeperiods where deleted=0 and is_fiscal_year=0 ";
		
		$result = $this->db->query($qry, true, 'Error retrieving timeperiods: ');
		
		$options = '';
		if ($id == NULL)	// timeperiods is not defined, print "Select Time Period..."
			$options .= '<option value="?action=index&module=Quotas" SELECTED>' 
						 . $mod_strings['LBL_SELECT_TIME_PERIOD'] 
						 . '</option>' ;
		
		while ($row = $this->db->fetchByAssoc($result)){
			
			if ($row['id'] == $id)	// timeperiod is selected, default to this one
				$options .= '<option value="?edit=true&action=index&module=Quotas&timeperiod_id=' 
						 . $row['id'] 
						 . '" SELECTED>' 
						 . $row['name'] 
						 . '</option>' ;
			else	// print all other time periods
				$options .= '<option value="?edit=true&action=index&module=Quotas&timeperiod_id=' 
						 . $row['id'] 
						 . '">' 
						 . $row['name'] 
						 . '</option>' ;
		}
		
		return $options;
	}
	
	function getTimePeriod($id) {
		
		$qry = "SELECT id, name FROM timeperiods where id = '" . $id . "'";
		
		$result = $this->db->query($qry, true, 'Error retrieving timeperiod: ');
		
		$row = $this->db->fetchByAssoc($result);
		
		return $row['name'];
	}
/**
 * function getCurrentUserQuota. The purpose of this function is to find the 
 * current user's assigned quota and return it. It is based on the timeperiod
 * that is inputted into the function. 
 * @param $timeperiod_id
 */	
	function getCurrentUserQuota($timeperiod_id){
		global $current_user;
		
		$qry = "SELECT quotas.currency_id, quotas.amount, timeperiods.name as timeperiod_name " .
			   "FROM quotas INNER JOIN users ON quotas.user_id = users.id, timeperiods " .
			   "WHERE quotas.timeperiod_id = timeperiods.id " .
			   "AND quotas.user_id = '". $current_user->id . "' " .
			   "AND (quotas.created_by <> '". $current_user->id . "' " .
			   		"OR (users.reports_to_id IS NULL AND quotas.quota_type = 'Rollup')) " .	//for top-level manager			   
			   "AND timeperiods.id = '". $timeperiod_id . "' " .
			   "AND quotas.committed = 1";
			   
		$result = $this->db->query($qry, true, 'Error retrieving Current User Quota Information: ');

		$row = Array();
		$row = $this->db->fetchByAssoc($result);
        if (!empty($row)) {
    		if ($row['currency_id'] == -99)	// print the default currency
    			$row['formatted_amount'] =  format_number($row['amount'], 2, 2, array('convert' => true, 'currency_symbol' => true));
    		else	// print the foreign currency, must retrieve currency symbol
    			$row['formatted_amount'] =  format_number($row['amount'], 2, 2, array('convert' => true, 'currency_symbol' => false)) . " ( ". $this->getCurrencySymbol($row['currency_id']) . " )";
        }
				
		return $row;
	}

/**
 * function getGroupQuota. Function to retrieve the total quota for a manager's
 * entire group.  
 * @param $timeperiod_id
 * @param $formatted - boolean to test if output should be formatted
 * @param $id - to pass in an user_id in case it is necessary
 */	
	function getGroupQuota($timeperiod_id, $formatted = true, $id=NULL){
		global $current_user;
		if ($id == NULL)
			$id = $current_user->id;
		
		$query = "SELECT SUM(quotas.amount_base_currency) as group_amount" .
				" FROM users, quotas " .
				" WHERE quotas.timeperiod_id = '" . $timeperiod_id . "'" .
				" AND quotas.deleted = 0" .
				" AND users.id = quotas.user_id" .
				" AND quotas.created_by = '" .$id . "'" .
				" AND (users.reports_to_id = '" . $id . "' " .
				" OR (users.id = '" . $id . "'" .
				     " AND quotas.quota_type <> 'Rollup'))"; //for top-level manager
		
		$result = $this->db->query($query, true, 'Error retrieving Group Quota: ');
		$row = $this->db->fetchByAssoc($result);
		
		if ($formatted)
			return format_number($row['group_amount'], 2, 2, array('convert' => true, 'currency_symbol' => true));
		else 
			return $row['group_amount'];	// return an unformmated version (for insertion/update into DB)
	}
	
	function resetGroupQuota($timeperiod_id)
	{
		global $current_user;
		
		$query = "UPDATE quotas SET quotas.amount=0, quotas.amount_base_currency=0" .
				" WHERE quotas.timeperiod_id = '" . $timeperiod_id . "'" . 
				" AND quotas.quota_type = 'Rollup'" .
				" AND quotas.user_id = '" . $current_user->id . "'";
		
		$this->db->query($query, true, 'Error Updating Group Quota: ');	
	}
/**
 * function getUserManagedSelectList. Function to populate <SELECT> tag
 * for the manager's direct reports.  
 * @param $timeperiod_id
 * @param $id - if the id is given, use this idea as the selected choice
 */		
	function getUserManagedSelectList($timeperiod_id, $id = ''){
		global $mod_strings;
		global $current_user;
		global $locale;
		
		$qry = "SELECT U.id as user_id, Q.id as quota_id, Q.timeperiod_id as timeperiod_id, user_name, first_name, last_name " .
			   "FROM users U " .
			   "LEFT OUTER JOIN (SELECT quotas.id, quotas.user_id, quotas.timeperiod_id, quotas.quota_type " .
			   					"FROM quotas, users " .
			   					"WHERE quotas.timeperiod_id = '" . $timeperiod_id . "' " .
			   					"AND quotas.user_id = users.id " .
			   					"AND quotas.created_by = '" . $current_user->id . "' " .
			   					"AND (users.reports_to_id = '" . $current_user->id . "' " .
			   						"OR (quotas.quota_type = 'Direct' AND users.id = '" . $current_user->id . "') ) ) Q " .
			   					"ON Q.user_id = U.id  " .
			   "WHERE U.reports_to_id = '" . $current_user->id . "' " .
			   " OR U.id = '" . $current_user->id . "' " .
			   "ORDER BY first_name";

		$result = $this->db->query($qry, true, 'Error retrieving quotas for managed users for current user: ');

		$options = '';

		if ($id == NULL)
			$options .= '<option value="?action=index&module=Quotas" SELECTED>' 
						 . $mod_strings['LBL_SELECT_USER']  
						 . '</option>' ;
						 		
		while ($row = $this->db->fetchByAssoc($result)){
			
			if ($row['user_id'] == $id)
				$options .= '<option value="?edit=true&action=index&module=Quotas&record=' 
						 . $row['quota_id'] 
						 . '&user_id=' . $row['user_id'] 
				 		 . '&timeperiod_id=' . $timeperiod_id
						 . '" SELECTED>' 
						 . $locale->getLocaleFormattedName($row['first_name'], $row['last_name']) 
						 . '</option>';
			else{
				if ($row['quota_id'] == NULL){
					$options .= '<option value="?edit=true&action=index&module=Quotas&record=new' 
						 . '&user_id=' . $row['user_id'] 
				 		 . '&timeperiod_id=' . $timeperiod_id
						 . '">' 
						 . $locale->getLocaleFormattedName($row['first_name'], $row['last_name']) 
						 . '</option>' ;
				}
				else{
					$options .= '<option value="?edit=true&action=index&module=Quotas&record=' 
						 . $row['quota_id'] 
						 . '&user_id=' . $row['user_id'] 
				 		 . '&timeperiod_id=' . $timeperiod_id							 
						 . '">' 
						 . $locale->getLocaleFormattedName($row['first_name'], $row['last_name']) 
						 . '</option>' ;
				}
			}
		}
		
		return $options;
	}

/**
 * function isManager. The purpose of this function is to determine whether
 * the given user is a manager  
 * @param $id - id of the user in question
 */		
	
	function isManager($id)
	{
		global $current_user;
		
		$qry = "SELECT * " .
			   "FROM users " .
			   "WHERE reports_to_id = '" . $id . "'";
		
		$result = $this->db->query($this->create_list_count_query($qry),true, 'Error retrieving row count from quotas: ');	
		$row = $this->db->fetchByAssoc($result);
		
		if ($row['c'] > 0)
			return true;
		else
			return false;
	}

/**
 * function isTopLevelManager. Function to determine whether the current
 * logged in user is a top level manager (ie, a manager in which he/she
 * does not report to anyone)  
 */		
	function isTopLevelManager()
	{
		global $current_user;
		
		$qry = "SELECT * FROM users WHERE reports_to_id IS NULL AND id = '" . $current_user->id . "'";
		
		$result = $this->db->query($qry, true, 'Error retrieving top level manager information for quotas: ');
		$row = $this->db->fetchByAssoc($result);
		
		if (!empty($row))
			return true;
		else
			return false;
	}

/**
 * function getTopLevelRecord. For the current user, get the record
 * id of the rollup quota that has been assigned. This is used in 
 * the Save.php file when a top level manager needs his/her own 
 * rollup quota value updated.
 * @param $timeperiod_id
 */		
	function getTopLevelRecord($timeperiod_id)
	{
		global $current_user;
		
		$qry = "SELECT id " .
				"FROM quotas " .
				"WHERE quotas.user_id = '" . $current_user->id . "' " .
				"AND quotas.timeperiod_id = '" . $timeperiod_id . "' " .
				"AND quotas.quota_type = 'Rollup'";
				
		$result = $this->db->query($qry, true, 'Error retrieving top level manager information for quotas: ');
		$row = $this->db->fetchByAssoc($result);
		
		return $row['id'];
	}

/**
 * function getConversionRate. Return the conversion rate of the currency
 * against the base currency.
 * @param $currency_id - the currency in which to switch to and find a 
 * conversion rate for.
 */		
	function getConversionRate($currency_id)
	{
		$qry = "SELECT conversion_rate " .
			   "FROM currencies " .
			   "WHERE id = '" . $currency_id . "'";
			   
		$result = $this->db->query($qry, true, 'Error retrieving conversion rate for quotas: ');
		$row = $this->db->fetchByAssoc($result);

		return $row['conversion_rate'];
	}

/**
 * function getCurrencySymbol. Return the symbol for the currency in which 
 * we are converting to.
 * @param $currency_id - the currency in which to switch to and find a 
 * conversion rate for.
 */
	function getCurrencySymbol($currency_id)
	{
		$qry = "SELECT symbol " .
			   "FROM currencies " .
			   "WHERE id = '" . $currency_id . "'";
			   
		$result = $this->db->query($qry, true, 'Error retrieving currency rate for quotas: ');
		$row = $this->db->fetchByAssoc($result);
		
		return $row['symbol'];
	}
	
/*
	function get_list_view_data(){
		$temp_array = $this->get_list_view_array();
        $temp_array["ENCODED_NAME"]=$this->name;
//    	$temp_array["ENCODED_NAME"]=htmlspecialchars($this->name, ENT_QUOTES);
    	return $temp_array;

	}*/
	/*
		builds a generic search based on the query string using or
		do not include any $this-> because this is called on without having the class instantiated
	*/
/*
	function build_generic_where_clause ($the_query_string) {
		$where_clauses = Array();
		$the_query_string = $this->db->quote($the_query_string);
		array_push($where_clauses, "name like '$the_query_string%'");

		$the_where = "";
		foreach($where_clauses as $clause)
		{
			if($the_where != "") $the_where .= " or ";
			$the_where .= $clause;
		}


		return $the_where;
	}
*/

}

?>

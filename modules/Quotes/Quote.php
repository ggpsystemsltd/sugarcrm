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
global $beanFiles;


require_once($beanFiles['Contact']);
require_once($beanFiles['Task']);
require_once($beanFiles['Note']);
require_once($beanFiles['Call']);
require_once($beanFiles['Lead']);
require_once($beanFiles['Email']);
require_once($beanFiles['Product']);
require_once($beanFiles['ProductBundle']);


// Quote is used to store customer quote information.
class Quote extends SugarBean {
	var $field_name_map;
	// Stored fields
	var $id;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $assigned_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $description;
	var $name;
	var $quote_type;
	var $purchase_order_num;
	var $quote_num;
	var $subtotal;
	var $deal_tot;
	var $new_sub;
	var $subtotal_usdollar;
	var $tax;
	var $tax_usdollar;
	var $shipping;
	var $shipping_usdollar;
	var $total;
	var $total_usdollar;
	var $date_quote_expected_closed;
	var $original_po_date;
	var $payment_terms;
	var $date_quote_closed;
	var $quote_stage;
	var $calc_grand_total;
	var $show_line_nums;
	var $team_id;
	var $team_name;
	var $system_id;

	var $billing_address_street;
	var $billing_address_city;
	var $billing_address_state;
	var $billing_address_country;
	var $billing_address_postalcode;
	var $shipping_address_street;
	var $shipping_address_city;
	var $shipping_address_state;
	var $shipping_address_country;
	var $shipping_address_postalcode;

	// These are related
	var $opportunity_id;
	var $opportunity_name;
	var $task_id;
	var $note_id;
	var $meeting_id;
	var $call_id;
	var $email_id;
	var $assigned_user_name;
	var $taxrate_name;
	var $taxrate_value;
	var $taxrate_id;
	var $shipper_id;
	var $shipper_name;
	var $currency_id;
	var $currency_name;
	var $billing_account_name;
	var $billing_account_id;
	var $billing_contact_id;
	var $billing_contact_name;
	var $shipping_account_name;
	var $shipping_account_id;
	var $shipping_contact_id;
	var $shipping_contact_name;

    var $order_stage;

	var $table_name = "quotes";
	var $rel_account_table = "quotes_accounts";
	var $rel_contact_table = "quotes_contacts";
	var $rel_opportunity_table = "quotes_opportunities";
	var $contact_table = "contacts";
	var $account_table = "accounts";
	var $user_table = "users";
	var $opportunity_table = "opportunities";
	var $taxrate_table = "taxrates";
	var $module_dir = 'Quotes';
	var $rel_product_bundles = 'product_bundle_quote';

	var $object_name = "Quote";

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = array(	'taxrate_name', 'taxrate_value', 'taxrate_id', 'assigned_user_name', 'assigned_user_id',
											'task_id', 'note_id', 'meeting_id', 'call_id', 'email_id',
											'opportunity_name', 'opportunity_id',
											'shipping_contact_id', 'shipping_account_id',
											'billing_contact_id', 'billing_account_id', 'shipper_id', 'shipper_name');

	var $relationship_fields = array('shipping_account_id'=>'shipping_accounts','billing_account_id'=>'billing_accounts',
									 'shipping_contact_id'=>'shipping_contacts','billing_contact_id'=>'billing_contacts',
									 'opportunity_id'=>'opportunities', 'task_id'=>'tasks', 'note_id'=>'notes',
									 'meeting_id'=>'meetings','call_id'=>'calls', 'email_id'=>'emails',

 									'bug_id' => 'bugs', 'case_id'=>'cases',
									'contact_id'=>'contacts',
									 'member_id'=>'members',
									'quote_id'=>'quotes',
									);
	var $new_schema = true;


	/**
	 * sole constructor
	 */
	function Quote() {
		parent::SugarBean();
	}

	/**
	 * returns bean name
	 * @return string Bean name
	 */
	function get_summary_text() {
		return $this->name;
	}

	/**
	 * returns the query appropriate for export
	 * @return string query
	 */
    function create_export_query(&$order_by, &$where, $relate_link_join='')
    {
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
		if($custom_join)
				$custom_join['join'] .= $relate_link_join;
        $query = "SELECT
        $this->table_name.*,
        $this->user_table.user_name as assigned_user_name";
        $query .= ", teams.name AS team_name";

        if($custom_join) {
			$query .= $custom_join['select'];
		}
        $query .= " FROM $this->table_name ";
		// We need to confirm that the user is a member of the team of the item.
		$this->add_team_security_where_clause($query);
        $query .= "LEFT JOIN users ON quotes.assigned_user_id=users.id ";
        $query .= getTeamSetNameJoin('quotes');
        /*$query .= "LEFT JOIN quotes_accounts ON quotes_accounts.quote_id=quotes.id
                   LEFT JOIN accounts ON accounts.id=quotes_accounts.account_id
                   LEFT JOIN quotes_contacts ON quotes_contacts.quote_id=quotes.id
                   LEFT JOIN contacts ON contacts.id=quotes_contacts.contact_id ";*/

		if($custom_join) {
			$query .= $custom_join['join'];
		}

		$where_auto = '1=1';
		if($show_deleted == 0) {
       	 	$where_auto = "$this->table_name.deleted=0";
		} elseif($show_deleted == 1) {
			 $where_auto = "$this->table_name.deleted=1";
		}

        if($where != "")
                $query .= "where $where AND ".$where_auto;
        else
                $query .= "where ".$where_auto;

        if($order_by != "")
                $query .= " ORDER BY $order_by";
        else
                $query .= " ORDER BY $this->table_name.name";
        return $query;
    }

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {

        parent::fill_in_additional_detail_fields();
        if(!empty($this->team_id) && empty($this->team_name)){
	        $this->assigned_name = get_assigned_team_name($this->team_id);
			$this->team_name = $this->assigned_name;
        }
        if(!empty($this->id)) {
    		$this->set_account();
    		$this->set_contact();
    		$this->set_opportunity();
        }

		if(!empty($this->currency_id)) {
		    $currency = new Currency();
		    $currency->retrieve($this->currency_id);
    		if($currency->id != $this->currency_id || $currency->deleted == 1) {
    			$this->tax = $this->tax_usdollar;
    			$this->total = $this->total_usdollar;
    			$this->subtotal = $this->subtotal_usdollar;
    			$this->shipping = $this->shipping_usdollar;
    			$this->currency_id = $currency->id;
    		}
		}

		if(!empty($this->shipper_id)) {
			$this->set_shipper();
		}

		if(!empty($this->taxrate_id)) {
			$this->set_taxrate_info();
		}
	}

	function set_contact() {
		global $locale;

		$query = "SELECT con.salutation, con.first_name, con.last_name, con.assigned_user_id contact_name_owner, con.id, c_q.contact_role from $this->contact_table  con, $this->rel_contact_table  c_q where con.id = c_q.contact_id and c_q.quote_id = '$this->id' and c_q.deleted=0 and con.deleted=0";
		$result = $this->db->query($query, true,"Error filling in additional detail fields: ");

		// Get the id and the name.
		$this->shipping_contact_name 	= '';
		$this->shipping_contact_id 		= '';
		$this->shipping_contact_name_owner = '';
		$this->billing_contact_name 	= '';
		$this->billing_contact_id 		= '';
		$this->billing_contact_name_owner = '';
		$this->billing_contact_name_mod = '';
		$this->shipping_contact_name_mod = '';

		while($row = $this->db->fetchByAssoc($result))	{
			if($row != null && $row['contact_role'] == 'Ship To') {
				$this->shipping_contact_name = $locale->getLocaleFormattedName(stripslashes($row['first_name']), stripslashes($row['last_name']), stripslashes($row['salutation']));
				$this->shipping_contact_id = stripslashes($row['id']);
				$this->shipping_contact_name_owner = stripslashes($row['contact_name_owner']);
				$this->shipping_contact_name_mod = 'Contacts';
			} elseif($row != null && $row['contact_role'] == 'Bill To') {
				$this->billing_contact_name = $locale->getLocaleFormattedName(stripslashes($row['first_name']), stripslashes($row['last_name']), stripslashes($row['salutation']));
				$this->billing_contact_id = stripslashes($row['id']);
				$this->billing_contact_name_owner = stripslashes($row['contact_name_owner']);
				$this->billing_contact_name_mod = 'Contacts';
			}
		}

		$GLOBALS['log']->debug("shipping contact name is $this->shipping_contact_name");
		$GLOBALS['log']->debug("billing contact name is $this->billing_contact_name");
	}

	function set_account() {
		$query = "SELECT acc.name, acc.id,acc.assigned_user_id account_name_owner, a_o.account_role from $this->account_table  acc, $this->rel_account_table  a_o where acc.id = a_o.account_id and a_o.quote_id = '$this->id' and a_o.deleted=0 and acc.deleted=0";
		$result = $this->db->query($query, true,"Error filling in additional detail fields: ");

		// Get the id and the name.
		$this->shipping_account_name 	= '';
		$this->shipping_account_id 		= '';
		$this->shipping_account_name_owner = '';
		$this->billing_account_name 	= '';
		$this->billing_account_id 		= '';
		$this->billing_account_name_owner = '';
		$this->billing_account_mod = '';
		$this->shipping_account_mod = '';

		while($row = $this->db->fetchByAssoc($result)) {
			if($row != null && $row['account_role'] == 'Ship To') {
				$this->shipping_account_name = stripslashes($row['name']);
				$this->shipping_account_id = stripslashes($row['id']);
				$this->shipping_account_name_owner = stripslashes($row['account_name_owner']);
				$this->shipping_account_mod = 'Accounts';
			} elseif($row != null && $row['account_role'] == 'Bill To') {
				$this->billing_account_name = stripslashes($row['name']);
				$this->billing_account_id = stripslashes($row['id']);
				$this->billing_account_name_owner = stripslashes($row['account_name_owner']);
				$this->billing_account_mod = 'Accounts';
			}
		}

		$GLOBALS['log']->debug("billing account name is $this->billing_account_name");
		$GLOBALS['log']->debug("shipping account name is $this->shipping_account_name");
	}

	function calculate_total() {
		$this->total = $this->subtotal + $this->shipping + $this->tax - $this->deal_tot;
	}

	function set_taxrate_info() {
		$query = "SELECT tr.id, tr.name, tr.value from $this->taxrate_table  tr, $this->table_name  q where tr.id = q.taxrate_id and q.id = '$this->id' and tr.deleted=0 and q.deleted=0";
		$result = $this->db->query($query, true,"Error filling in additional detail fields: ");

		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);

		if($row != null) {
			$this->taxrate_name = stripslashes($row['name']);
			$this->taxrate_value= stripslashes($row['value']);
			$this->taxrate_id 	= stripslashes($row['id']);
		} else {
			$this->taxrate_name = '';
			$this->taxrate_value = '';
			$this->taxrate_id = '';
		}
	}

	/** Sets the associated shipper's name
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function set_shipper() {
		$query = "SELECT s1.name from shippers s1, $this->table_name q1 where s1.id = q1.shipper_id and q1.id = '$this->id' and q1.deleted=0 and s1.deleted=0";
		$result = $this->db->query($query,true," Error filling in additional detail fields: ");

		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);

		if($row != null) {
			$this->shipper_name = $row['name'];
		} else {
			$this->shipper_name = '';
		}
	}

	/** Sets the associated shipper's name
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function set_opportunity() {
		// First, get the list of IDs.
		$query = "SELECT opp.id, opp.name, opp.assigned_user_id opportunity_name_owner from $this->opportunity_table  opp, $this->rel_opportunity_table  a_o where opp.id = a_o.opportunity_id and a_o.quote_id = '$this->id' and a_o.deleted=0 and opp.deleted=0";
		$result = $this->db->query($query, true,"Error filling in additional detail fields: ");

		// Get the id and the name.
		$row = $this->db->fetchByAssoc($result);

		if($row != null) {
			$this->opportunity_name = stripslashes($row['name']);
			$this->opportunity_id 	= stripslashes($row['id']);
			$this->opportunity_name_owner = stripslashes($row['opportunity_name_owner']);
			$this->opportunity_name_mod = 'Opportunities';
		} else {
			$this->opportunity_name = '';
			$this->opportunity_id = '';
			$this->opportunity_name_owner='';
			$this->opportunity_name_mod = '';
		}
	}

	/**
		builds a generic search based on the query string using or
		do not include any $this-> because this is called on without having the class instantiated
	*/
	function build_generic_where_clause ($the_query_string) {
		$where_clauses = array();
		$the_query_string = $GLOBALS['db']->quote($the_query_string);
		array_push($where_clauses, "quotes.name like '$the_query_string%'");

		$the_where = "";
		foreach($where_clauses as $clause) {
			if($the_where != "")
				$the_where .= " or ";
			$the_where .= $clause;
		}

		return $the_where;
	}

	function get_list_view_data() {

		global $current_language, $current_user, $mod_strings, $app_list_strings, $sugar_config;
		$app_strings = return_application_language($current_language);

		$temp_array = $this->get_list_view_array();
		if(isset($this->assigned_name)){
			$temp_array['TEAM_NAME'] = $this->assigned_name;
		}
		if(isset($this->team_name)){
			$temp_array['TEAM_NAME'] = $this->team_name;
		}

		$temp_array["ENCODED_NAME"] = $this->name;
		$temp_array["QUOTE_NUM"] = format_number_display($this->quote_num,$this->system_id);
		return $temp_array;
	}

	function update_currency_id($fromid, $toid) {


		$idequals = '';
		$currency = new Currency();
		$currency->retrieve($toid);

		foreach($fromid as $f){
			if(!empty($idequals)){
				$idequals .=' or ';
			}
			$idequals .= "currency_id='$f'";
		}

		if(!empty($idequals)) {
			$query = "select tax, total, subtotal,shipping, id from ".$this->table_name."  where (". $idequals. ") and deleted=0 ;";
			$result = $this->db->query($query);

			while($row = $this->db->fetchByAssoc($result)) {
				$query = "update ".$this->table_name." set currency_id='".$currency->id."', tax_usdollar='".$currency->convertToDollar($row['tax'])."', subtotal_usdollar='".$currency->convertToDollar($row['subtotal'])."', total_usdollar='".$currency->convertToDollar($row['total'])."', shipping_usdollar='".$currency->convertToDollar($row['shipping'])."' where id='".$row['id']."';";
				$this->db->query($query);
			}
		}
	}

	function format_specific_fields($fieldsDef)
	{
		global $disable_num_format;
		global $current_user;

		if((!empty($disable_num_format) && $disable_num_format) || empty($current_user))
		return;

		$this->number_formatting_done = true;
	}

	function save($check_notify = FALSE) {


		$currency = new Currency();
		$currency->retrieve($this->currency_id);
		//US DOLLAR
		if(!empty($this->shipping)){
			$this->shipping_usdollar = $currency->convertToDollar($this->shipping);
		}
		if(!empty($this->tax)){
			$this->tax_usdollar = $currency->convertToDollar($this->tax);
		}
		if(!empty($this->total)){
			$this->total_usdollar = $currency->convertToDollar($this->total);
		}
		if(!empty($this->subtotal)){
			$this->subtotal_usdollar = $currency->convertToDollar($this->subtotal);
		}
	      if(!empty($this->new_sub)){
            $this->new_sub_usdollar = $currency->convertToDollar($this->new_sub);
        }
	        if(!empty($this->deal_tot)){
            $this->deal_tot_usdollar = $currency->convertToDollar($this->deal_tot);
        }

		if(!isset($this->system_id) || empty($this->system_id)) {

			$admin = new Administration();
			$admin->retrieveSettings();
			$system_id = $admin->settings['system_system_id'];
			if(!isset($system_id)){
				$system_id = 1;
			}
			$this->system_id = $system_id;
		}

		// CL Fix for 14365.  Have a default quote_type value
		if(!isset($this->quote_type) || empty($this->quote_type)) {
		   $this->quote_type = 'Quotes';
		}

		return parent::save($check_notify);
	}

	function set_notification_body($xtpl, $quote) {
		$xtpl->assign("QUOTE_SUBJECT", $quote->name);
		$xtpl->assign("QUOTE_STATUS", $quote->quote_stage);
		$xtpl->assign("QUOTE_CLOSEDATE", $quote->date_quote_expected_closed);
		$xtpl->assign("QUOTE_DESCRIPTION", $quote->description);

		return $xtpl;
	}

	function get_product_bundles() {
		// First, get the list of IDs.
		$query = "SELECT bundle_id as id
					FROM  $this->rel_product_bundles
					WHERE quote_id='$this->id' AND deleted=0 ORDER BY bundle_index";

		return $this->build_related_list($query, new ProductBundle());
	}

	function bean_implements($interface) {
		switch($interface){
			case 'ACL':return true;
		}
		return false;
	}

	function listviewACLHelper() {
		global $current_user;

		$array_assign = parent::listviewACLHelper();
		$is_owner = false;

		if(!empty($this->shipping_account_name)) {
			if(!empty($this->shipping_account_name_owner)) {
				$is_owner = $current_user->id == $this->shipping_account_name_owner;
			}
		}
		if(ACLController::checkAccess('Accounts', 'view', $is_owner)) {
			$array_assign['SHIPPING_ACCOUNT'] = 'a';
		} else {
			$array_assign['SHIPPING_ACCOUNT'] = 'span';
		}

		$is_owner = false;

		if(!empty($this->billing_account_name)) {
			if(!empty($this->billing_account_name_owner)) {
				$is_owner = $current_user->id == $this->billing_account_name_owner;
			}
		}
		if(ACLController::checkAccess('Accounts', 'view', $is_owner)) {
			$array_assign['BILLING_ACCOUNT'] = 'a';
		} else {
			$array_assign['BILLING_ACCOUNT'] = 'span';
		}

		$is_owner = false;

		if(!empty($this->shipping_contact_name)) {
			if(!empty($this->shipping_contact_name_owner)) {
				$is_owner = $current_user->id == $this->shipping_contact_name_owner;
			}
		}

		if(ACLController::checkAccess('Contacts', 'view', $is_owner)) {
			$array_assign['SHIPPING_CONTACT'] = 'a';
		}else{
			$array_assign['SHIPPING_CONTACT'] = 'span';
		}

		$is_owner = false;

		if(!empty($this->billing_contact_name)) {
			if(!empty($this->billing_contact_name_owner)) {
				$is_owner = $current_user->id == $this->billing_contact_name_owner;
			}
		}
		if(ACLController::checkAccess('Contacts', 'view', $is_owner)) {
			$array_assign['BILLING_CONTACT'] = 'a';
		} else {
			$array_assign['BILLING_CONTACT'] = 'span';
		}

		$is_owner = false;

		if(!empty($this->opportunity_name)) {
			if(!empty($this->opportunity_name_owner)) {
				$is_owner = $current_user->id == $this->opportunity_name_owner;
			}
		}

		if(ACLController::checkAccess('Opportunities', 'view', $is_owner)) {
			$array_assign['OPPORTUNITY'] = 'a';
		} else {
			$array_assign['OPPORTUNITY'] = 'span';
		}

		return $array_assign;
	}

	/**
	 * Static helper function for getting releated account info.
	 */
	function get_account_detail($quote_id) {
	    if(empty($quote_id)) return array();
		$ret_array = array();
		$db = DBManagerFactory::getInstance();
		$query = "SELECT acc.id, acc.name, acc.assigned_user_id "
			. "FROM accounts acc, quotes_accounts a_q "
			. "WHERE acc.id=a_q.account_id"
			. " AND a_q.quote_id='$quote_id'"
			. " AND a_q.account_role='Bill To'"
			. " AND a_q.deleted=0"
			. " AND acc.deleted=0";
		$result = $db->query($query, true,"Error filling in opportunity account details: ");
		$row = $db->fetchByAssoc($result);
		if($row != null) {
			$ret_array['name'] = $row['name'];
			$ret_array['id'] = $row['id'];
			$ret_array['assigned_user_id'] = $row['assigned_user_id'];
		}
		return $ret_array;
	}

	/**
	 * returns the export-appropriate file name
	 * @param string type LBL_PROPOSAL or LBL_INVOICE
	 * @return string
	 */
	function getExportFilename($type) {
		global $mod_strings;
		global $locale;

		$filename = preg_replace("#[^A-Z0-9\-_\.]#i", "_", $this->shipping_account_name);

		if(!empty($this->quote_num)) {
			$filename .= "_{$this->quote_num}";
		}

		return $locale->translateCharset($mod_strings[$type]."_{$filename}.pdf", 'UTF-8', $this->getExportCharset());
	}
}
?>
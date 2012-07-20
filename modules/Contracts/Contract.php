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




if(!defined('sugarEntry') || !sugarEntry) {
	die('Not A Valid Entry Point');
}

if(!defined('SUGARCRM_SECONDS_PER_DAY')) {
	define('SUGARCRM_SECONDS_PER_DAY', 60 * 60 * 24);
}

if(!defined('CONTRACT_BUILT_IN_WORKFLOW_ID')) {
	define('CONTRACT_BUILT_IN_WORKFLOW_ID', 'hardcode-work-flow-ae89-contractbf59');
}

class Contract extends SugarBean {
	var $id;
	var $name;
	var $reference_code;
	var $status;
	var $account_id;
	var $account_name;
	var $opportunity_id;
	var $opportunity_name;
	var $team_id;
	var $team_name;
	var $team_link;
	var $assigned_user_id;
	var $assigned_user_name;
	var $assigned_name;
	var $description;
	var $start_date;
	var $end_date;
	var $currency_id;
	var $currency_name;
	var $total_contract_value;
	var $total_contract_value_usdollar;
	var $company_signed_date;
	var $customer_signed_date;
	var $contract_term;
	var $expiration_notice;
	var $time_to_expiry;
	var $date_entered;
	var $date_modified;
	var $deleted;
	var $modified_user_id;
	var $modified_by_name;
	var $created_by;
	var $created_by_name;
	var $created_by_link;
	var $modified_user_link;
	var $assigned_user_link;
	var $contacts;
	var $notes;
	var $products;
	var $quote_id;
	var $type;
	var $type_options;
    var $contract_types;
	
	var $rel_opportunity_table = 'contracts_opportunities';
	var $rel_quote_table = 'contracts_quotes';
	var $table_name = 'contracts';
	var $object_name = 'Contract';
	var $user_preferences;

	var $encodeFields = array ();
	var $relationship_fields = array ('opportunity_id' => 'opportunities', 'note_id' => 'notes', 'quote_id' => 'quotes', );
	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = array ('revision');

	

	var $new_schema = true;
	var $module_dir = 'Contracts';

	function Contract() {
		parent :: SugarBean();
		$this->setupCustomFields('Contract'); //parameter is module name
		//#14107 jchi 09/02/2008
		//$this->disable_row_level_security = false;
	}

	function save($check_notify = false) {
        global $timedate;
		//decimals cant be null in sql server	
        if(!empty($this->expiration_notice)) {
            if(!empty($_SESSION["workflow_cron"]) && $_SESSION["workflow_cron"]=="Yes" && !empty($_SESSION["workflow_id_cron"]) && $_SESSION["workflow_id_cron"] == CONTRACT_BUILT_IN_WORKFLOW_ID) {
                $this->special_notification = true;
                $check_notify = true;
            }
            elseif(empty($this->fetched_row) || (!empty($this->fetched_row) && $this->expiration_notice != $timedate->to_display_date_time($this->fetched_row['expiration_notice']))) {//only when expiration_notice changes, the workflow_schedular should be created.
                require_once("include/workflow/time_utils.php");
                $time_array['time_int'] = '0';
                $time_array['time_int_type'] = 'datetime'; 
                $time_array['target_field'] = 'expiration_notice'; 
                check_for_schedule($this,CONTRACT_BUILT_IN_WORKFLOW_ID,$time_array);//check if it is update, then save();
            }
        }
		if ( $this->total_contract_value == '' ) { $this->total_contract_value = 0; }
		if ( $this->total_contract_value_usdollar == '' ) { $this->total_contract_value_usdollar = 0; }
		$currency = new Currency();
		$currency->retrieve($this->currency_id);
		if(!empty($this->total_contract_value)){
			$this->total_contract_value_usdollar = $currency->convertToDollar($this->total_contract_value);
		}	
        $return_id = parent :: save($check_notify);
        if(!empty($_SESSION["workflow_cron"]) && $_SESSION["workflow_cron"]=="Yes" && !empty($_SESSION["workflow_id_cron"]) && $_SESSION["workflow_id_cron"] == CONTRACT_BUILT_IN_WORKFLOW_ID) {
            $this->special_notification = false;
        }
		return $return_id;
	}

	function get_summary_text() {
		return $this->name;
	}

	function is_authenticated() {
		return $this->authenticated;
	}

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function _set_related_opportunity_info()
	{
		$contracts_table = $this->table_name;
		$opportunity_link_table = $this->rel_opportunity_table;
		$query = "SELECT opportunities.id, opportunities.name "
			. "FROM opportunities "
			. "INNER JOIN $opportunity_link_table "
			. "ON opportunities.id=$opportunity_link_table.opportunity_id "
			. "INNER JOIN $contracts_table "
			. "ON $contracts_table.id=$opportunity_link_table.contract_id "
			. "WHERE contracts.id='$this->id' AND contracts.deleted=0 AND opportunities.deleted=0 AND $opportunity_link_table.deleted=0 ";
		$result = $this->db->query($query, true, 'Error retrieving opportunity info for contract: ');
		$row = $this->db->fetchByAssoc($result);

		if(!empty($row)) {
			$this->opportunity_id = stripslashes($row['id']);
			$this->opportunity_name = stripslashes($row['name']);
		}
	}
	
	function _set_related_account_info() {
		$contracts_table = $this->table_name;
		
		if(!empty($this->account_id)) {
			$query = "SELECT accounts.name "
				. "FROM accounts "
				. "INNER JOIN $contracts_table "
				. "ON accounts.id=$contracts_table.account_id "
				. "WHERE $contracts_table.id='$this->id' AND $contracts_table.deleted=0 AND accounts.deleted=0 ";
			$name = $this->db->getOne($query, true, 'Error retrieving account info for contract: ');
	
			if(!empty($name)) {
				$this->account_name = stripslashes($name);
			}
		}
	}

	function _set_contract_term() {
		global $timedate;
		$start_date_timestamp = empty($this->start_date) ? 0 : strtotime($timedate->to_db_date($this->start_date, false));
		$end_date_timestamp = empty($this->end_date) ? 0 : strtotime($timedate->to_db_date($this->end_date, false));
		$this->contract_term = '';
		if(!empty($start_date_timestamp) && !empty($end_date_timestamp)) {
			$this->contract_term = ($end_date_timestamp - $start_date_timestamp) / constant('SUGARCRM_SECONDS_PER_DAY');
		}
	}		
	function _set_time_to_expiry() {
		global $timedate;
		$end_date_timestamp = empty($this->end_date) ? 0 : strtotime($timedate->to_db_date($this->end_date, false));
		$now = time();
		$this->time_to_expiry = '';
		if(!empty($end_date_timestamp)) {
			$this->time_to_expiry = ($end_date_timestamp - $now) / constant('SUGARCRM_SECONDS_PER_DAY');
		}
	}

	function fill_in_additional_detail_fields() {
		parent::fill_in_additional_detail_fields();
		$this->_set_related_account_info();
		$this->_set_related_opportunity_info();
		$this->_set_contract_term();
		$this->_set_time_to_expiry();

		$types = get_bean_select_array(true, 'ContractType','name','deleted=0','list_order');
		$this->type_options = get_select_options_with_id($types, $this->type);	
        $currency= new Currency();
        
		if(isset($this->currency_id) && !empty($this->currency_id)) {
			$currency->retrieve($this->currency_id);
		
			if( $currency->deleted != 1) {
				$this->currency_name = $currency->iso4217 . ' ' . $currency->symbol;
			} else {
				$this->currency_name = $currency->getDefaultISO4217() . ' ' . $currency->getDefaultCurrencySymbol();
			}
		} else {
		    $this->currency_name = $currency->getDefaultISO4217() . ' ' . $currency->getDefaultCurrencySymbol();
		}
	}

	function list_view_parse_additional_sections(& $list_form, $xTemplateSection) {
		return $list_form;
	}

    function create_export_query(&$order_by, &$where, $relate_link_join='')
    {
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
			if($custom_join)
				$custom_join['join'] .= $relate_link_join;
		$query = 'SELECT contracts.* , contract_types.name type_name ';
		if($custom_join){
			$query .=  $custom_join['select'];
		}
		$query .=  ' FROM contracts ';
		if($custom_join){
			$query .=  $custom_join['join'];
		}
		$query .= ' LEFT JOIN contract_types on contract_types.id=contracts.type ';
		$where_auto = ' contracts.deleted = 0';

		if (empty($where)) {
			$query .= " WHERE $where_auto";
		} else {
			$query .= " WHERE $where AND $where_auto";
		}

		if (empty($order_by)) {
			$query .= ' ORDER BY contracts.name';
		} else {
			$query .= " ORDER BY $order_by";
		}

		return $query;
	}
	function get_list_view_data() {
		$fields = $this->get_list_view_array();
		
		//$fields['TOTAL_CONTRACT_VALUE']= format_number($fields['TOTAL_CONTRACT_VALUE']);
		$this->contract_types = getContractTypesDropDown();
		$fields['TYPE'] = isset($this->contract_types[$fields['TYPE']]) ? $this->contract_types[$fields['TYPE']] : $fields['TYPE'];
		return $fields;
	}

	function mark_relationships_deleted($id) {
		// Do nothing, this call is here to avoid default delete processing
		// since Delete.php handles deletion of children records.
	}
	
	function bean_implements($interface) {
		$ret_val = false;
		
		switch($interface) {
			case 'ACL':
				$ret_val = true;
				break;
		}
		
		return $ret_val;
	}
	
	function listviewACLHelper() {
		global $current_user;
		$array_assign = parent::listviewACLHelper();
		$is_owner = false;
		
		if(!empty($this->account_id)) {
			if(!empty($this->account_id_owner)) {
				global $current_user;
				$is_owner = ($current_user->id == $this->account_id_owner);
			}
		}
		
		if(!ACLController::moduleSupportsACL('Accounts') || ACLController::checkAccess('Accounts', 'view', $is_owner)) {
			$array_assign['ACCOUNT'] = 'a';
		} else {
			$array_assign['ACCOUNT'] = 'span';
		}
		
		if(!empty($this->opportunity_name)) {
			if(!empty($this->opportunity_name_owner)) {
				global $current_user;
				$is_owner = $current_user->id == $this->opportunity_name_owner;
			}
		}

		if(!ACLController::moduleSupportsACL('Opportunities') || ACLController::checkAccess('Opportunities', 'view', $is_owner)) {
			$array_assign['OPPORTUNITY'] = 'a';
		} else {
			$array_assign['OPPORTUNITY'] = 'span';
		}
		
		return $array_assign;
	}
	
	/**
	 * contracts_documents
	 * This method is called by the Subpanel code (see the subpaneldefs.php of this module).
	 * We named it contracts_documents so that the return_relationship hidden form value set in the Subpanel
	 * widget code may be used to look up the contracts_documents relationship as defined in the
	 * linked_documentsMetaData.php file.  The query in this method is customized so as to
	 * do a JOIN on the document_revisions table to retrieve the latest document revision for
	 * a particular document.
	 *
	 * @return $query String SQL query to retrieve the documents to display in the subpanel
	 */
	function get_contract_documents() {
		$this->load_relationship('contracts_documents');
        $query_array = $this->contracts_documents->getQuery(array('return_as_array' => true));
		$query = <<<KGB
            SELECT documents.*,
				documents.document_revision_id AS latest_revision_id,
				for_latest_revision.revision AS latest_revision_name,
				for_selected_revision.revision AS selected_revision_name,
				linked_documents.document_revision_id AS selected_revision_id,
				contracts.status AS contract_status,
				for_selected_revision.filename AS selected_revision_filename,
				linked_documents.id AS linked_id,
				contracts.name AS contract_name

KGB;
					
		$query .= $query_array['from'];
		$query .= <<<CIA
			LEFT JOIN documents ON documents.id = linked_documents.document_id
			LEFT JOIN document_revisions for_latest_revision
				ON for_latest_revision.id = documents.document_revision_id
			INNER JOIN contracts 
				ON contracts.id = linked_documents.parent_id
			LEFT JOIN document_revisions for_selected_revision 
				ON for_selected_revision.id = linked_documents.document_revision_id

CIA;
		$query .= $query_array['where'];
		return $query;
	}
	
    function set_notification_body($xtpl, $contract)
	{
		$xtpl->assign("CONTRACT_NAME", $contract->name);
		$xtpl->assign("CONTRACT_END_DATE", $contract->end_date);
		return $xtpl;
	}
    
}

function getContractTypesDropDown(){	
		static $contractTypes = null;
		if(!$contractTypes){
			$seedContractTypes = new ContractType();
			$contractTypes = $seedContractTypes->get_contractTypes(TRUE);
		}		
		return $contractTypes;
	}
    
?>

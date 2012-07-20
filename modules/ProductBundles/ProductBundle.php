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












// Product is used to store customer information.
class ProductBundle extends SugarBean {
	// Stored fields
	var $id;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $field_name_map;
	var $name;
	var $currency_id;
	var $description;
	var $tax;
	var $shipping;
	var $subtotal;
	var $deal_tot;
	var $deal_tot_usdollar;
	var $new_sub;
	var $new_sub_usdollar;
	var $total;
	var $tax_usdollar;
	var $shipping_usdollar;
	var $subtotal_usdollar;
	var $total_usdollar;
	var $bundle_stage;
	var $is_template;
	var $is_editable;

	// These are for related fields
	var $type_name;
	var $type_id;
	var $quote_id;
	var $quote_name;
	var $manufacturer_name;
	var $manufacturer_id;
	var $category_name;
	var $category_id;
	var $account_name;
	var $account_id;
	var $contact_name;
	var $contact_id;
	var $related_product_id;

	var $table_name = "product_bundles";
	var $rel_quotes = "product_bundle_quote";
	var $rel_products = "product_bundle_product";
	var $rel_notes = "product_bundle_note";
	var $module_dir = 'ProductBundles';
	var $object_name = "ProductBundle";

	var $new_schema = true;

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

	//deletes related products might want to change this in the future if we allow for sharing of products
	function mark_deleted($id){
		$pb = new ProductBundle();
		$pb->id = $id;
		$products = $pb->get_products();
		foreach($products as $product){
			$product->mark_deleted($product->id);
		}
		return parent::mark_deleted($id);
	}
	function ProductBundle() {
		parent::SugarBean();
		$this->team_id = 1; // make the item globally accessible
	}

	function get_index($quote_id) {
		$values = array('quote_id' => $quote_id, 'bundle_id' => $this->id);
		return $this->retrieve_relationships($this->rel_quotes, $values, 'bundle_index');
	}


	/** Returns a list of the associated products
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function get_products()
	{
		// First, get the list of IDs.
		$query = "SELECT product_id as id
					from  $this->rel_products
					where bundle_id='$this->id' AND deleted=0 ORDER BY product_index";

		return $this->build_related_list($query, new Product());
	}


	/** Returns a list of the associated products
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function get_quotes()
	{
		// First, get the list of IDs.
		$query = "SELECT quote_id as id
					from  $this->rel_quotes
					where bundle_id='$this->id' AND deleted=0";

		return $this->build_related_list($query, new Quote());
	}

	function get_bundle_product_indexes() {
		$values = array('bundle_id' => $this->id);
		return $this->retrieve_relationships($this->rel_products, $values, 'product_index');
	}

	function get_bundle_note_indexes() {
		$values = array('bundle_id' => $this->id);
		return $this->retrieve_relationships($this->rel_notes, $values, 'note_index');
	}

	function get_notes()
	{
		$query = "SELECT note_id as id FROM $this->rel_notes WHERE bundle_id='$this->id' AND deleted=0 ORDER BY note_index";
		return $this->build_related_list($query, new ProductBundleNote());
	}

	function get_product_bundle_line_items() {
		$product_list = $this->get_products();
		$note_list =  $this->get_notes();
		$product_index_list = $this->get_bundle_product_indexes();
		$note_index_list = $this->get_bundle_note_indexes();

		$bundle_list = array();
		for ($i = 0; $i < count($product_index_list); $i++) {
			$GLOBALS['log']->debug("product index: ".$product_index_list[$i]['product_index']."\n");
			if(isset($product_list[$i]))
				$bundle_list[$product_index_list[$i]['product_index']] = $product_list[$i];
			//$bundle_list[] = array($product_index_list[$i]['product_index'] => $product_list[$i]);
		}

		for ($j = 0; $j < count($note_index_list); $j++) {
			$GLOBALS['log']->debug("note index: ".$note_index_list[$j]['note_index']."\n");
			$bundle_list[(int)$note_index_list[$j]['note_index']] = $note_list[$j];
			//$bundle_list[] = array($note_index_list[$j]['note_index'] => $note_list[$j]);
		}

		ksort($bundle_list);
		return $bundle_list;
	}


	/** Returns a list of the associated products
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved.
	 * Contributor(s): ______________________________________..
	*/
/*

        function create_export_query(&$order_by, &$where)
        {
		$query = "SELECT $this->table_name.id, $this->table_name.name, $this->table_name.status,$this->table_name.cost_usdollar, $this->table_name.discount_usdollar, $this->table_name.list_usdollar, $this->table_name.cost_price, $this->table_name.discount_price, $this->table_name.list_price, $this->table_name.mft_part_num FROM $this->table_name ";
		$where_auto = "$this->table_name.deleted=0";

/*
                                $query = "SELECT
                                $this->table_name.*,
                                $this->rel_manufacturers.name as manufacturer_name,
                                $this->rel_categories.name as category_name,
                                $this->rel_types.name as type_name,
                                users.user_name as assigned_user_name
                                FROM $this->table_name
                                LEFT JOIN $this->rel_manufacturers
                                ON $this->table_name.manufacturer_id=$this->rel_manufacturers.id
								";

                $where_auto = "$this->table_name.deleted=0
								AND $this->rel_manufacturers.deleted=0
								";
*/

 /*               if($where != "")
                        $query .= "where ($where) AND ".$where_auto;
                else
                        $query .= "where ".$where_auto;

                if(!empty($order_by))
                        $query .= " ORDER BY $order_by";

                return $query;
        }


*/
	function save_relationship_changes($is_update)
    {


    }


	function clear_productbundle_product_relationship($bundle_id)
	{
		$query = "delete from $this->rel_products where (bundle_id='$bundle_id') and deleted=0";
		$this->db->query($query,true,"Error clearing product bundle to product relationship: ");
	}

	function clear_product_productbundle_relationship($product_id)
	{
		$query = "delete from $this->rel_products where (product_id='$product_id') and deleted=0";
		$this->db->query($query,true,"Error clearing product to product bundle relationship: ");
	}

	function retrieve_productbundle_from_product($product_id){
		$query = "SELECT bundle_id FROM $this->rel_products where (product_id='$product_id') and deleted=0";
		$result = $this->db->query($query,true,"Error retrieving product bundle for product $product_id ");
		if($row = $this->db->fetchByAssoc($result)){
			$this->retrieve($row['bundle_id']);
			return true;
		}
		return false;
	}

	function in_productbundle_from_product($product_id){
		$query = "SELECT bundle_id FROM $this->rel_products where (product_id='$product_id') and deleted=0";
		$result = $this->db->query($query,true,"Error retrieving product bundle for product $product_id ");
		if($row = $this->db->fetchByAssoc($result)){
			return true;
		}
		return false;
	}

	function set_productbundle_product_relationship($product_id, $product_index, $bundle_id='')
	{
		if(empty($bundle_id)){
			$bundle_id = $this->id;
		}
		$query = "insert into $this->rel_products (id,product_index,product_id,bundle_id, date_modified) VALUES ('".create_guid()."','$product_index', '$product_id', '$bundle_id', ".db_convert("'".TimeDate::getInstance()->nowDb()."'", 'datetime').")";
		$this->db->query($query,true,"Error setting product to product bundle relationship: "."<BR>$query");
		$GLOBALS['log']->debug("Setting product to product bundle relationship for $product_id and $bundle_id");
	}

    function set_product_bundle_note_relationship($note_index, $note_id, $bundle_id='')
    {
    	if(empty($bundle_id)){
    		$bundle_id = $this->id;
    	}

    	$query = "INSERT INTO $this->rel_notes (id,bundle_id,note_id,note_index, date_modified) VALUES ('".create_guid()."','".$bundle_id."','".$note_id."','".$note_index."', ".db_convert("'".TimeDate::getInstance()->nowDb()."'", 'datetime').")";

    	$this->db->query($query, true, "Error setting note to product to product bundle relationship: "."<BR>$query");
    	$GLOBALS['log']->debug("Setting note to product to product bundle relationship for bundle_id: $bundle_id, note_index: $note_index, and note_id: $note_id");
    }

    function clear_product_bundle_note_relationship($bundle_id='')
    {
    	$query = "DELETE FROM $this->rel_notes WHERE (bundle_id='$bundle_id') AND deleted=0";

    	$this->db->query($query, true, "Error clearing note to product to product bundle relationship");
    }
	function clear_productbundle_quote_relationship($bundle_id)
	{
		$query = "delete from $this->rel_quotes where (bundle_id='$bundle_id') and deleted=0";
		$this->db->query($query,true,"Error clearing product bundle to quote relationship: ");
	}

	function clear_quote_productbundle_relationship($quote_id)
	{
		$query = "delete from $this->rel_quotes where (quote_id='$quote_id') and deleted=0";
		$this->db->query($query,true,"Error clearing quote to product bundle relationship: ");
	}

	function set_productbundle_quote_relationship($quote_id, $bundle_id, $bundle_index='')
	{
		if(empty($bundle_id)){
			$bundle_id = $this->id;
		}
		$query = "insert into $this->rel_quotes (id,quote_id,bundle_id,bundle_index, date_modified) values ('".create_guid()."', '$quote_id', '$bundle_id', '$bundle_index', ".db_convert("'".TimeDate::getInstance()->nowDb()."'", 'datetime').")";
		$this->db->query($query,true,"Error setting quote to product bundle relationship: "."<BR>$query");
		$GLOBALS['log']->debug("Setting quote to product bundle relationship for $quote_id and $bundle_id");
	}



	function mark_relationships_deleted($id)
	{
		$this->clear_productbundle_product_relationship($id);
		$this->clear_productbundle_quote_relationship($id);
	}

	function fill_in_additional_list_fields()
	{
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields()
	{
		
		$currency = new Currency();
		$currency->retrieve($this->currency_id);
		if($currency->id != $this->currency_id || $currency->deleted == 1){
				$this->tax = $this->tax_usdollar;
				$this->shipping = $this->shipping_usdollar;
				$this->subtotal = $this->subtotal_usdollar;
				$this->total = $this->total_usdollar;
				$this->currency_id = $currency->id;
		}

	}


	/** Returns a list of the associated opportunities
	 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
	 * All Rights Reserved..
	 * Contributor(s): ______________________________________..
	*/
	function get_list_view_data(){
		global $current_language, $app_strings, $app_list_strings;
//		global $support_expired, $support_coming_due, $support_coming_due_color, $support_expired_color;
		$product_mod_strings = return_module_language($current_language, "Products");
		include('modules/Products/config.php');

		$symbol = $currency->getDefaultCurrencySymbol();
		global $current_user;
		
		$currency = new Currency();
		if($current_user->getPreference('currency') ){
			$currency->retrieve($current_user->getPreference('currency'));
			$symbol = $currency->symbol;
		}else{
			$currency->retrieve('-99');
			$symbol = $currency->symbol;
		}


		return  Array(
			'ID' => $this->id,
			'NAME' => (($this->name == "") ? "<em>blank</em>" : $this->name),
			'SHIPPING' =>  $symbol.'&nbsp;'. number_format(round($currency->convertFromDollar($this->shipping_usdollar),2),2,'.',''),
			'TAX' =>  $symbol.'&nbsp;'. number_format(round($currency->convertFromDollar($this->tax_usdollar),2),2,'.',''),
			'TOTAL' =>  $symbol.'&nbsp;'. number_format(round($currency->convertFromDollar($this->total_usdollar),2),2,'.',''),
			'SUBTOTAL' =>  $symbol.'&nbsp;'. number_format(round($currency->convertFromDollar($this->subtotal_usdollar),2),2,'.',''),
		);
	}
	/**
		builds a generic search based on the query string using or
		do not include any $this-> because this is called on without having the class instantiated
	*/
	function build_generic_where_clause ($the_query_string) {
	$where_clauses = Array();
	$the_query_string = $GLOBALS['db']->quote($the_query_string);
	array_push($where_clauses, "name like '$the_query_string%'");
	$the_where = "";
	foreach($where_clauses as $clause)
	{
		if($the_where != "") $the_where .= " or ";
		$the_where .= $clause;
	}


	return $the_where;
}

function save($check_notify = FALSE)
	{

		
		$currency = new Currency();
			$currency->retrieve($this->currency_id);
			//US DOLLAR
			if(!empty($this->tax)){
				$this->tax_usdollar = $currency->convertToDollar($this->tax);
			}
			if(isset($this->shipping) && !empty($this->shipping)){
				$this->shipping_usdollar = $currency->convertToDollar($this->shipping);
			}
			if(isset($this->total) && !empty($this->total)){
				$this->total_usdollar = $currency->convertToDollar($this->total);
			}
			if(isset($this->subtotal) && !empty($this->subtotal)){
				$this->subtotal_usdollar = $currency->convertToDollar($this->subtotal);
			}
	        if(isset($this->deal_tot) && !empty($this->deal_tot)){
                $this->deal_tot_usdollar = $currency->convertToDollar($this->deal_tot);
            }
	        if(isset($this->new_sub) && !empty($this->new_sub)){
                $this->new_sub_usdollar = $currency->convertToDollar($this->new_sub);
            }
			$this->id = parent::save($check_notify);

			return $this->id;
		}




}

?>
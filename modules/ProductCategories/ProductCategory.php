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







// ProductCategory is used to store customer information.
class ProductCategory extends SugarBean {
	// Stored fields
	var $id;
	var $list_order;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $name;
	var $description;
	var $parent_id;


//TREEVIEW

	var $parent_node_id;
	var $node_id;
	var $parent_name;
	var $type;
	var $default_tree_type;	//specified in save_branch function

//END TREEVIEW

	var $table_name = "product_categories";
	var $category_tree_table = "category_tree";
	var $products_table = "product_templates";
	var $rel_products = "products";

	var $object_name = "ProductCategory";
	var $module_dir = 'ProductCategories';
	var $new_schema = true;

	var $importable = true;
//TREEVIEW
	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array(
		"parent_node_id"
		,"parent_name"
		,"node_id"
		,"type"
	);
//END TREEVIEW
/*

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();
 */

	function ProductCategory() {
		parent::SugarBean();
		$this->disable_row_level_security =true;

	}



	function get_summary_text()
	{
		return "$this->name";
	}

	function get_product_categories($add_blank=false)
	{
		$query = "SELECT id, name FROM $this->table_name where deleted=0 order by list_order asc";
		$result = $this->db->query($query, false);
		$GLOBALS['log']->debug("get_product_categories: result is ".print_r($result,true));

		$list = array();
		if ($add_blank) {
			$list['']='';
		}
		//if($this->db->getRowCount($result) > 0){
			// We have some data.
			while (($row = $this->db->fetchByAssoc($result)) != null) {
			//while ($row = $this->db->fetchByAssoc($result)) {
				$list[$row['id']] = $row['name'];
				$GLOBALS['log']->debug("row id is:".$row['id']);
				$GLOBALS['log']->debug("row name is:".$row['name']);
			}
		//}
		return $list;
	}



	function save_relationship_changes($is_update)
    {
    }


function create_export_query(&$order_by, &$where)
        {


								$query = "SELECT
								$this->table_name.*,
								parent_categories.name AS parent_category
								FROM $this->table_name
								LEFT JOIN $this->table_name parent_categories
								ON $this->table_name.parent_id=parent_categories.id
                                ";

                $where_auto = "$this->table_name.deleted=0";

                if($where != "")
                        $query .= "where ($where) AND ".$where_auto;
                else
                        $query .= "where ".$where_auto;

                if(!empty($order_by))
                        $query .= " ORDER BY $order_by";

                return $query;
        }

	function fill_in_additional_list_fields()
	{
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {

	    parent::fill_in_additional_detail_fields();

        //find parent name if  parentid is there.
        if (!empty($this->parent_id) and $this->parent_id!= '') {
             $query="select name from product_categories where id='$this->parent_id'";
             $result=$this->db->query($query);
             if (!empty($result)) {
             	$row=$this->db->fetchByAssoc($result);
                if (!empty($row)) {
                    $this->parent_name=$row['name'];
                }
             }
        }

	}

	function get_list_view_data(){
		$temp_array = $this->get_list_view_array();
        $temp_array["ENCODED_NAME"]=$this->name;
    	return $temp_array;

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

/////////////TreeView 2.0/////////////////////////////////////////////////////////////
//Below are the maps and definitions for the Product Catalog Tree/////////////////////

//General Definitions
	var $show_products = "true";				//show products when selecting a parent category
	var $tpl_file = "TREE_TPL";					//You can use a custom tpl file if you want to change images
	var $root_id ="";							//Used for mutli tree per tree table


//SQL Table Information
	var $tree_table = "category_tree";
	var $branch_array = array(
						"name"=>"category", "table"=>"product_categories", "id"=>"id",
						"display_name" => "name", "parent_field" => "parent_id"
						);

	//Leaf Map
	var $leaf_array = 	array(
						"name"=>"product", "table"=>"product_templates", "id"=>"id",
						"display_name" => "name", "parent_field" => "category_id"
						);

//Tree Image Information

	//Declared in the TPL file


//Tree Definitions

	var $branch_type = "Category";
	var $leaf_type = "Product";


//Javascript Helper Maps
//The name tells us which screen the call is coming from

	var $branch_jscript_map =	array(
										"CatCat" => array("disable" => "Y", "tree_title" => "Product Categories", "function" => 'javascript: set_return(\'$node_id\', \'$name\', \'$self_id\');')
										,"ProdCat" => array("disable" => "N", "tree_title" => "Product Categories", "function" => 'javascript: set_return(\'$node_id\', \'$name\', \'$self_id\');')
										,"ProductsCat" => array("disable" => "N", "tree_title" => "Product Categories", "function" => 'javascript: set_return(\'$node_id\', \'$name\', \'$self_id\');')
										,"QuoteProd" => array("disable" => "N", "tree_title" => "Product Catalog", "function" => 'javascript: set_return_category(\'$name\');')
										,"ProductsProd" => array("disable" => "N", "tree_title" => "Product Catalog", "function" => 'javascript: set_return_category(\'$name\');')
								);

	var $leaf_jscript_map =		array(
										"CatCat" => array("disable" => "Y", "name" => "CatCat", "function" => '')
										,"ProdCat" => array("disable" => "N", "function" => '')
										,"ProductsCat" => array("disable" => "N", "function" => '')
										,"QuoteProd" =>array("disable" => "N", "function" => 'javascript: set_return_product(\'$name\');')
										,"ProductsProd" => array("disable" => "N", "function" => 'javascript: set_return_product(\'$name\');')
								);


//TreeView Get Query

	function tree_query($parent_node_id){

if (empty($parent_node_id)) $parent_node_id=0;
	if($this->show_products=="true"){
	//include categories and products
	$query = "


	SELECT category_tree.*,
		CASE
			WHEN category_tree.type = 'Category'
			THEN product_categories.name
			ELSE product_templates.name
		END AS name
	FROM category_tree
		LEFT JOIN product_categories ON product_categories.id = category_tree.self_id and category_tree.self_id = product_categories.id AND product_categories.deleted='0'
		LEFT JOIN product_templates ON product_templates.id = category_tree.self_id and category_tree.self_id = product_templates.id AND product_templates.deleted='0'
	WHERE
	$this->tree_table.parent_node_id='$parent_node_id'
	ORDER BY $this->tree_table.type, name
		";

	} else {
	//only show categories
		$query = "
			SELECT category_tree.*, product_categories.name AS name
			FROM category_tree, product_categories
			WHERE category_tree.self_id=product_categories.id AND type='Category'
			AND product_categories.deleted='0' AND category_tree.parent_node_id='$parent_node_id'
		";
	}

	return $query;

	//end function get_query
	}

	function get_disable_alert(){

		global $mod_strings;
		global $current_language;

				if(!isset($mod_strings)){
				$mod_strings = return_module_language($current_language, $this->module_dir);
		}

		//This is if you are in a different module and the Product Category Mod strings are not available.
		if(!isset($mod_strings['LBL_DISABLE_ALERT']) && empty($mod_strings['LBL_DISABLE_ALERT'])) $mod_strings['LBL_DISABLE_ALERT'] = "";


		return "javascript:alert('".$mod_strings['LBL_DISABLE_ALERT']."');";

	//end function get_disable_alert
	}



//////////////////////////Jason////////////////////////////Start Tree Module Area/////////////////////////////////////////////

	function get_name($id){

		$query = "SELECT * from $this->table_name WHERE id = '$id'";
		$result =$this->db->query($query,true, "Error running query ProductCategories - get_name");
		$row = $this->db->fetchByAssoc($result);
		return $row['name'];

	//end function get_name
	}

	//used for category listview
	function get_node_id($id){

		$query = "SELECT * from $this->category_tree_table where self_id = '$id'";
		$result =$this->db->query($query,true, "Error running query ProductCategories - get_node_id");
		$row = $this->db->fetchByAssoc($result);
		return $row['node_id'];

	//end function get_node_id
	}


	//used to get the parent category id for saving purposes

	//used for retrieving based on a node id
	function get_branch_id(){

		if($this->parent_node_id!="0"){
			$query = "SELECT $this->category_tree_table.self_id AS self_id, $this->table_name.name AS name
			FROM product_categories LEFT JOIN $this->category_tree_table ON $this->category_tree_table.self_id = $this->table_name.id
			WHERE $this->category_tree_table.node_id = '$this->parent_node_id'";

			$result =$this->db->query($query,true, "Error running query");
			$row = $this->db->fetchByAssoc($result);

			if (isset($row['self_id'])) $this->parent_id = $row['self_id'];
			if (isset($row['name']) && $row['name'] != '') $this->parent_name = stripslashes($row['name']);
		}

	//end function get_branch_id
	}

	//used for retrieving based on a normal id
	function get_category_tree_info()
	{
		$query = "SELECT * from $this->category_tree_table where self_id = '$this->id'";
		$result =$this->db->query($query,true, "Error running query ProductCategories - get_category_info");

		// Get the id and the name.

		$row = $this->db->fetchByAssoc($result);


			if($row != null)
			{
				if ($row['parent_node_id'] != '') $this->parent_node_id = stripslashes($row['parent_node_id']);
				if ($row['node_id'] != '' ) $this->node_id = stripslashes($row['node_id']);
				if ($row['type'] != '' ) $this->type = stripslashes($row['type']);
			}

		$this->get_branch_id();

	//end function get_category_tree_info
	}


	function save_category_branch($is_update=""){
	$this->default_tree_type = "Category";

		if($is_update=="Update"){
		//only update parent_node_id
		$query = "update $this->category_tree_table set parent_node_id='$this->parent_node_id' where self_id='$this->id'";

		$this->db->query($query,true,"Error updating a category tree branch: ");

		//end if
		} else {
		//create new row
		if ($this->parent_node_id=="")
            $query = "insert into $this->category_tree_table set self_id='$this->id', parent_node_id=NULL, type='$this->default_tree_type'";
        else
            $query = "insert into $this->category_tree_table set self_id='$this->id', parent_node_id='$this->parent_node_id', type='$this->default_tree_type'";


		$this->db->query($query,true,"Error creating a category tree branch: ");


		//end else
		}

	//end function save_category_branch
	}




/////////////////////////////////////////////////////Tree mods delete functions/////////////////////////////////////////////


	//This function is for when you only delete a category and not its sub categories and products
	function graft($id, $parent_id, $parent_node_id){
	if($parent_node_id=="") $parent_node_id = "0";

	$select_query =  "SELECT * FROM $this->table_name WHERE deleted='0' AND parent_id='$id'";
	$result =$this->db->query($select_query,true, "Selecting Sub-Categories");
			// We have some branches (Categories)
			while (($row = $this->db->fetchByAssoc($result)) != null) {
				$update_query = "UPDATE $this->table_name SET parent_id='$parent_id' WHERE id='$row[id]' ";
				$result2 =$this->db->query($update_query,true, "Updating Categories");

				$update_query = "UPDATE $this->category_tree_table SET parent_node_id='$parent_node_id' WHERE self_id='$row[id]' ";
				$result2 =$this->db->query($update_query,true, "Updating Category Tree");

			//end while
			}
		//end if results exist

	$select_query =  "SELECT * FROM $this->products_table WHERE deleted='0' AND category_id='$id'";
	$result =$this->db->query($select_query,true, "Selecting Sub-Products");
			// We have some branches (Categories)
			while (($row = $this->db->fetchByAssoc($result)) != null) {
				$update_query = "UPDATE $this->products_table SET category_id='$parent_id' WHERE id='$row[id]' ";
				$result2 =$this->db->query($update_query,true, "Updating Products");

				$update_query = "UPDATE $this->category_tree_table SET parent_node_id='$parent_node_id' WHERE self_id='$row[id]' ";
				$result2 =$this->db->query($update_query,true, "Updating Category Tree");

			//end while
			}
		//end if results exist


	//end function graft
	}

	//This function is for when you delete a category and all its sub categories and products
	function prune($id){

		$select_query =  "SELECT * FROM $this->table_name WHERE deleted='0' AND parent_id='$id'";
		$result =$this->db->query($select_query,true, "Selecting Sub-Products");
			// We have some branches (Categories)
			while (($row = $this->db->fetchByAssoc($result)) != null) {
				$this->mark_deleted($row['id']);
				$this->prune($row['id']);
			//end while
			}
		//end if results exist

		$select_query =  "SELECT * FROM $this->products_table WHERE deleted='0' AND category_id='$id'";
		$result =$this->db->query($select_query,true, "Selecting Sub-Products");
			// We have some leafs to prune (Leafs)
			while (($row = $this->db->fetchByAssoc($result)) != null) {
				$this->mark_products_deleted($row['id']);
				$this->prune($row['id']);
			//end while
			}
		//end if results exist


	//end function prune
	}


	function clear_branch($id){
		$query = "delete from $this->category_tree_table where self_id='$id'";
		$this->db->query($query,true,"error removing branch: ");
	//end function clear_branch
	}

	function mark_products_deleted($id){
		$query = "UPDATE $this->products_table SET deleted='1' WHERE id='$id'";
		$this->db->query($query,true,"error removing branch: ");
	//end function mark_products_deleted
	}




////////////////////////////////end tree mods delete functions////////////////////////////////////////////////////

	//remove quotes so the javascript tree works properly
	function remove_quotes(){
		$this->name = js_escape($this->name, false);
	}



////////////End TreeView 2.0//////////////////////////////////////////////////////////


}

?>
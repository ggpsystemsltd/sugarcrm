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

///include some fake products and categories as arrays
///for now we will just use the account and contact name info


//set parameters

$tree_depth = "3";		//how many levels deep is the tree
$tree_branches = "3";	//how many categories per level

$branch_leafs = "3";	//Products per category

//3 x 3 x 3 will produce 39 categories and 117 products		total nodes:156			
//3 x 5 x 5 will produce 155 categories and 775 products	total nodes:930			
//8 x 2 x 3 will produce 510 categories	and 1538 products	total nodes:2048		
//3 x 5 x 10 will product 155 catgories and 1550 products	total nodes:1705
//4 x 5 x 5 will produce 780 categories and 3900 products	total nodes:4680
//5 x 5 x 5 will product 3905 categories and 19525 products	total nodes:23430

$depth_flag = "1";

traverse_tree("", $depth_flag, $tree_depth, $tree_branches, $branch_leafs);


function traverse_tree($parent_id, $depth_flag, &$tree_depth, &$tree_branches, &$branch_leafs){
	//control how deep the tree goes
	$depth_flag = $depth_flag + 1;


	//loop through categories at each level
	for($i = 0; $i < $tree_branches; $i++){
	//echo "looping through level $i categories PARENT ID: $parent_id<br>";
		$last_id = create_category($parent_id);
		
		//loop through how many products per category
		for($j = 0; $j < $branch_leafs; $j++){
		
		
			create_product($last_id);
			
		//echo "looping through level $j products LAST ID: $last_id<br>";
		//end foreach create product
		}
		
		

		//echo "<BR>1. DEPTH FLAG: $depth_flag PRIOR TO checking depth flag value<BR>";
		if($depth_flag<="$tree_depth"){
		
			//echo "<BR>2. DEPTH FLAG: $depth_flag TREE DEPTH: $tree_depth<BR>";
		
			traverse_tree($last_id, $depth_flag, $tree_depth, $tree_branches, $branch_leafs);
		
			//echo "<BR> 3. DEPTH FLAG: $depth_flag AFTER recursive traverse <BR>";
			
		//end if to traverse deeper
		}
		
		
	//end foreach categories at each level
	}


//end function traverse_tree
}



function create_category($parent_id){
global $sugar_demodata;
$last_name_array = $sugar_demodata['last_name_array'];
$last_name_count = count($sugar_demodata['last_name_array']);


$last_name_max = $last_name_count - 1;
	
	$category = new ProductCategory();
	$category->name = $last_name_array[mt_rand(0,$last_name_max)] .$sugar_demodata['category_ext_name'];
	$category->parent_id = $parent_id;
	$category->save();
	$cat_id = $category->id;
	unset($category);
	return $cat_id;
	

//end function create_category
}


function create_product($category_id){
global $sugar_demodata;
$first_name_array = $sugar_demodata['first_name_array'];
$first_name_count = count($sugar_demodata['first_name_array']);
$company_name_array = $sugar_demodata['company_name_array'];
$company_name_count = count($sugar_demodata['company_name_array']);
global $dollar_id;
global $manufacturer_id_arr;
$first_name_max = $first_name_count - 1;

	$template = new ProductTemplate();
	$template->name = $first_name_array[mt_rand(0,$first_name_max)] .$sugar_demodata['product_ext_name'];
	$template->tax_class = "Taxable";
	$template->manufacturer_id = $manufacturer_id_arr[0];
	$template->currency_id = $dollar_id;
	$template->cost_price = 500.00;
	$template->cost_usdollar = 500.00;
	$template->list_price = 800.00;
	$template->list_usdollar = 800.00;
	$template->discount_price = 800.00;
	$template->discount_usdollar = 800.00;
	$template->pricing_formula = "IsList";
	$template->mft_part_num = $company_name_array[mt_rand(0,$company_name_count-1)].' '.mt_rand(1,1000000) ."XYZ987";
	$template->pricing_factor = "1";
	$template->status = "Available";
	$template->weight = 20.0;
	$template->date_available = "2004-10-15";
	$template->qty_in_stock = "72";
	$template->category_id = $category_id;
	$template->save();

	unset($template);

//end function create_product
}


?>
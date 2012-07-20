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

require_once('include/ytree/Node.php');

//function returns an array of objects of Node type.
function get_node_data($params,$get_array=false) {
    $click_level=$params['TREE']['depth'];
    $parent_id=$params['NODES'][$click_level]['id'];

	$nodes=get_categories_and_products($parent_id);
	foreach ($nodes as $node) {
		$ret['nodes'][]=$node->get_definition();
	}
	$json = new JSON(JSON_LOOSE_TYPE);
	$str=$json->encode($ret);
	return $str;
}

/*
 * Constructs the nodes give parent node id, if the parent node_id is null
 * top level nodes will be returned. function will return both product categories
 * and product.
 *
 * $open_nodes_ids is an hierachical list of nodes that should be open when the tree in rendered.
 * node at index 0 represents the topmost level node. This fuction calls itself recursively to build
 * open nodes.
 */
function get_categories_and_products($parent_id) {
    $href_string = "javascript:set_return('productcatalog')";
    $nodes=array();

    if ($parent_id=='' or empty($parent_id)) {
        $query="select id, name , 'category' type from product_categories where (parent_id is null or parent_id='') and deleted=0";
        $query.=" union select id, name , 'product' type from product_templates where (category_id is null or category_id='') and deleted=0";
        
    } else {
        $query="select id, name , 'category' type from product_categories where parent_id ='$parent_id' and deleted=0";
        $query.=" union select id, name , 'product' type from product_templates where category_id ='$parent_id' and deleted=0";
    }
    $result=$GLOBALS['db']->query($query);
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
        $node = new Node($row['id'], $row['name']); 
        $node->set_property("href", $href_string);
        $node->set_property("type", $row['type']);
        if ($row['type']=='product') {
            $node->expanded = false;
            $node->dynamic_load = false;
        } else {
            $node->expanded = false;
            $node->dynamic_load = true;        
        }
        $nodes[]=$node;
    }
    return $nodes;
}
?>
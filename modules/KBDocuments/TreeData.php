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
    $ret=array();
    $click_level=$params['TREE']['depth'];
    $subcat_id=$params['NODES'][$click_level]['id'];
    $cat_id=$params['NODES'][$click_level-1]['id'];
    $href=true;
    if (isset($params['TREE']['caller']) and $params['TREE']['caller']=='Documents' ) {
        $href=false;
    }
	$nodes=get_documents($cat_id,$subcat_id,$href);
	foreach ($nodes as $node) {
		$ret['nodes'][]=$node->get_definition();
	}
	$json = new JSON(JSON_LOOSE_TYPE);
	$str=$json->encode($ret);
	return $str;
}

/*
 *  
 *
 */
 function get_category_nodes($href_string){
    $nodes=array();
    global $mod_strings;
    global $app_list_strings;
    $query="select distinct category_id, subcategory_id from documents where deleted=0 order by category_id, subcategory_id";
    $result=$GLOBALS['db']->query($query);
    $current_cat_id=null;
    $cat_node=null;
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {

        if (empty($row['category_id'])) {
            $cat_id='null';
            $cat_name=$mod_strings['LBL_CAT_OR_SUBCAT_UNSPEC'];
        } else {
            $cat_id=$row['category_id'];
            $cat_name=$app_list_strings['document_category_dom'][$row['category_id']];
        }            
        if (empty($current_cat_id) or $current_cat_id != $cat_id) {
            $current_cat_id = $cat_id;
            if (!empty($cat_node)) $nodes[]=$cat_node;
            
            $cat_node = new Node($cat_id, $cat_name);
            $cat_node->set_property("href", $href_string);
            $cat_node->expanded = true;
            $cat_node->dynamic_load = false;
        } 

        if (empty($row['subcategory_id'])) {
            $subcat_id='null';
            $subcat_name=$mod_strings['LBL_CAT_OR_SUBCAT_UNSPEC'];
        } else {
            $subcat_id=$row['subcategory_id'];
            $subcat_name=$app_list_strings['document_subcategory_dom'][$row['subcategory_id']];
        }            
        $subcat_node = new Node($subcat_id, $subcat_name);
        $subcat_node->set_property("href", $href_string);
        $subcat_node->expanded = false;
        $subcat_node->dynamic_load = true;
        
        $cat_node->add_node($subcat_node);
    }    
    if (!empty($cat_node)) $nodes[]=$cat_node;

    return $nodes;
 }
 
function get_documents($cat_id, $subcat_id,$href=true) {
    $nodes=array();
    $href_string = "javascript:select_document('doctree')";
    $query="select * from documents where deleted=0";
    if ($cat_id != 'null') {
        $query.=" and category_id='$cat_id'";
    } else {
        $query.=" and category_id is null";
    }
        
    if ($subcat_id != 'null') {
        $query.=" and subcategory_id='$subcat_id'";
    } else {
        $query.=" and subcategory_id is null";
    }
    $result=$GLOBALS['db']->query($query);
    $current_cat_id=null;
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
        $node = new Node($row['id'], $row['document_name']);
        if ($href) {
            $node->set_property("href", $href_string);
        }
        $node->expanded = true;
        $node->dynamic_load = false;
        
        $nodes[]=$node;
    }
    return $nodes;
}
?>

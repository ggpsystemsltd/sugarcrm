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

/*usage: initialize the tree, add nodes, generate header for required files inclusion.
 *  	  generate function that has tree data and script to convert data into tree init.
 *	      generate call to tree init function.
 *		  subsequent tree data calls will be served by the node class.  
 *		  tree view by default make ajax based calls for all requests.
 */
require_once('include/ytree/Tree.php');

class KBTree extends Tree {
	function KBTree($name) {
		parent::Tree($name);
	}
	function generate_nodes_array($scriptTags = true) {
		global $sugar_config;
		$node=null;
		$ret=array();
		foreach ($this->_nodes as $node ) {
			$ret['nodes'][]=$node->get_definition();
			$abc=$this->json->encode($node->get_definition());
		}  	
	
		//todo removed site_url setting from here.
		//todo make these variables unique.	
		$tree_data="var TREE_DATA= " . $this->json->encode($ret) . ";\n";
		$tree_data.="var param= " . $this->json->encode($this->_params) . ";\n";  	
		
		$tree_data.="var mytree;\n";
		$tree_data.="treeinit(mytree,TREE_DATA,'{$this->_name}',param);\n";
		if($scriptTags) return '<script>'.$tree_data.'</script>';
		else return $tree_data;
	}
}

?>
 
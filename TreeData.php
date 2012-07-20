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

 //Request object must have these property values:
 //		Module: module name, this module should have a file called TreeData.php
 //		Function: name of the function to be called in TreeData.php, the function will be called statically.
 //		PARAM prefixed properties: array of these property/values will be passed to the function as parameter.

$ret=array();
$params1=array();
$nodes=array();

$GLOBALS['log']->debug("TreeData:session started");
$current_language = $GLOBALS['current_language'];

//process request parameters. consider following parameters.
//function, and all parameters prefixed with PARAM.
//PARAMT_ are tree level parameters.
//PARAMN_ are node level parameters.
//module  name and function name parameters are the only ones consumed
//by this file..
foreach ($_REQUEST as $key=>$value) {

	switch ($key) {
	
		case "function":
		case "call_back_function":
			$func_name=$value;
			$params1['TREE']['function']=$value;
			break;
			
		default:
			$pssplit=explode('_',$key);
			if ($pssplit[0] =='PARAMT') {
				unset($pssplit[0]);
				$params1['TREE'][implode('_',$pssplit)]=$value;				
			} else {
				if ($pssplit[0] =='PARAMN') {
					$depth=$pssplit[count($pssplit)-1];
					//parmeter is surrounded  by PARAMN_ and depth info.
					unset($pssplit[count($pssplit)-1]);unset($pssplit[0]);	
					$params1['NODES'][$depth][implode('_',$pssplit)]=$value;
				} else {
					if ($key=='module') {
						if (!isset($params1['TREE']['module'])) {
							$params1['TREE'][$key]=$value;	
						}
					} else { 	
						$params1['REQUEST'][$key]=$value;
					}					
				}
			}
	}	
}	
$modulename=$params1['TREE']['module']; ///module is a required parameter for the tree.
require('include/modules.php');
if (!empty($modulename) && !empty($func_name) && isset($beanList[$modulename]) ) {
    require_once('modules/'.$modulename.'/TreeData.php');
    $TreeDataFunctions = array(
        'ProductTemplates' => array('get_node_data'=>'','get_categories_and_products'=>''),
        'ProductCategories' => array('get_node_data'=>'','get_product_categories'=>''),
        'KBTags' => array(
            'get_node_data'=>'',
            'get_tags_nodes'=>'',
            'get_tags_nodes_cached'=>'',
            'childNodes'=>'',
            'get_searched_tags_nodes'=>'',
            'find_peers'=>'',
            'getRootNode'=>'',
            'getParentNode'=>'',
            'get_tags_modal_nodes'=>'',
            'get_admin_browse_articles'=>'',
            'tagged_documents_count'=>'',
            'tag_count'=>'',
            'get_browse_documents'=>'',
            'get_tag_nodes_for_browsing'=>'',
            'create_browse_node'=>'',
            'untagged_documents_count'=>'',
            'check_tag_child_tags_for_articles'=>'',
            'childTagsHaveArticles'=>'',
            ),
        'KBDocuments' => array(
            'get_node_data'=>'',
            'get_category_nodes'=>'',
            'get_documents'=>'',
            ),
        'Forecasts' => array(
            'get_node_data'=>'',
            'get_worksheet'=>'',
            'commit_forecast'=>'',
            'save_worksheet'=>'',
            'list_nav'=>'',
            'reset_worksheet'=>'',
            'get_chart'=>'',
            ),
        'Documents' => array(
            'get_node_data'=>'',
            'get_category_nodes'=>'',
            'get_documents'=>'',
            ),
        );
        
	if (isset($TreeDataFunctions[$modulename][$func_name])) {
		$ret=call_user_func($func_name,$params1);
    }
}

if (!empty($ret)) {
	echo $ret;
}

?>

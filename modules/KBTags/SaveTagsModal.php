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

require_once('include/JSON.php');
require_once('include/upload_file.php');
require_once('include/ytree/Tree.php');
require_once('include/ytree/Node.php');
require_once('modules/KBTags/TreeData.php');

$json = getJSONobj();
$tagdata = $json->decode(html_entity_decode($_REQUEST['newTagName']));
if(isset($tagdata['jsonObject']) && $tagdata['jsonObject'] != null){
	$tagdata = $tagdata['jsonObject'];
 }	
//save the tag
$admin = '';
if( $tagdata[0] !=null) $tag_name= $tagdata[0];
if( $tagdata[1] !=null) $parent_tag_id = $tagdata[1];
if( $tagdata[2] !=null) $admin = $tagdata[2];

if($admin==1){
 $admin=true;	
}
else{
 $admin=false;	
}

$found = false;

if(!empty($tag_name)){
	       
    //retrieve all the children of the parent tag. if parent tag is null then retrieve all 
    //tags whose parent is null. compare with the new tag name. 

    if($parent_tag_id == 'All_Tags'){
    	$parent_tag_id = '';
    }

    $query="select id,tag_name from kbtags where deleted = 0 and";
    if (empty($parent_tag_id)) {
    	$query.=" parent_tag_id is null order by tag_name";	
    } else {
    	$query.=" parent_tag_id = '$parent_tag_id' order by tag_name";	    
    }
  
    $result=$GLOBALS['db']->query($query);
  
  
	while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
      
      if (!empty($row['id']) && !empty($row['tag_name'])) {                            
         if(from_html($row['tag_name'])==$tag_name){
         	$found = true;         	
         	break;
         }
      }
	}  		        
}

 if(!$found){ 
           
    $kbtag = new KBTag();        
    $kbtag->tag_name  = $tag_name;
    if($parent_tag_id != null){
     $kbtag->parent_tag_id  = $parent_tag_id;
    }		         
    $kbtag->save();
     //refresh tree
    $tagstree=new Tree('tagstree');
    $tagstree->set_param('module','KBTags');
    if($admin) {        
      $tagstree->set_param('moduleview','admin');
      $nodes=get_tags_nodes(false,true,null);
      $root_node = new Node('All_Tags', $mod_strings['LBL_TAGS_ROOT_LABEL']);
       foreach ($nodes as $node) {                                         
            $root_node->add_node($node);                       
        }
      $href_string = "javascript:handler:SUGAR.kb.adminClick()";
      if ($root_node) {
    	    $root_node->set_property("href",$href_string);   	
      }        
      $root_node->expanded = true;    
      $tagstree->add_node($root_node);   
    } 
    else{
       $tagstree->set_param('moduleview','modal');
       //$nodes = get_tags_nodes_cached(null);
       //$nodes=get_tags_nodes(false,null); 
       $nodes=get_tags_nodes(false,false,null);
       $root_node = new Node('All_Tags', $mod_strings['LBL_TAGS_ROOT_LABEL']);
       foreach ($nodes as $node) {                                         
            $root_node->add_node($node);                       
        }

      $href_string = "javascript:handler:SUGAR.kb.modalClose('tagstree')";
      if ($root_node) {
    	    $root_node->set_property("href",$href_string);   	
      }   
      $root_node->expanded = true;    
      $tagstree->add_node($root_node);    
    }                         

       //$tagstree->add_node($root_node);
       
      $response = $tagstree->generate_nodes_array();
 }
 else{
 	$response = 1;
 }                  
if (!empty($response)) {	
    echo $response;
	//$json = getJSONobj();
	//print $json->encode($response);	
	//return the parameters
}
sugar_cleanup();
exit();
?>

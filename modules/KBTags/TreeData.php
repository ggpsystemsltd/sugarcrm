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
    if (isset($params['TREE']['caller']) and $params['TREE']['caller']=='Tags' ) {
        $href=false;
    }
    if (isset($params['TREE']['moduleview']) and $params['TREE']['moduleview']=='browse' ) {
        $clickdepth = $params['TREE']['depth']; 
		$nodes=get_tag_nodes_for_browsing($params['NODES'][$clickdepth]['id']);
    }else if(isset($params['TREE']['moduleview']) and $params['TREE']['moduleview']=='admin'){ 	     	     
		     $clickdepth = $params['TREE']['depth'];		     	           	    
		     $nodes=get_tags_nodes(false,true,$params['NODES'][$clickdepth]['id']);
	 }
	else if(isset($params['TREE']['moduleview']) and $params['TREE']['moduleview']=='modal'){
	     	  $clickdepth = $params['TREE']['depth'];	    	      
	          $nodes=get_tags_nodes(false,false,$params['NODES'][$clickdepth]['id']);
	          //$nodes=get_tags_nodes_cached(false);
	 }
	else if(isset($params['TREE']['moduleview']) and $params['TREE']['moduleview']=='modalMoveDocs'){
	     	  $clickdepth = $params['TREE']['depth'];	    	      
	          $nodes=get_tags_modal_nodes($params['NODES'][$clickdepth]['id'],false);
	 }
	 else if(isset($params['TREE']['moduleview']) and $params['TREE']['moduleview']=='applyTags'){
	     	  $clickdepth = $params['TREE']['depth'];	    	      
	          $nodes=get_tags_modal_nodes($params['NODES'][$clickdepth]['id'],true);
	 }	
	 
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
 function get_tags_nodes($create_root_node=false,$admin=false,$parent_id=null){
    $nodes=array();
    global $app_list_strings;
    $mod_strings = get_kbtag_strings();
    
    //$query="select id,tag_name from kbtags where parent_tag_id is null and deleted=0 order by tag_name";
    $query="select id,tag_name from kbtags where deleted = 0 and";
    if (empty($parent_id)) {
    	$query.=" parent_tag_id is null order by tag_name";	
    } else {
    	$query.=" parent_tag_id = '$parent_id' order by tag_name";	    
    }
    $result=$GLOBALS['db']->query($query);
    $current_cat_id=null;
    $cat_node=null;
     if($create_root_node) {
      $root_node = new Node('All_Tags', 'All Tags');
     }    
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
        if (!empty($row['id'])) {                   
            $tag_id=$row['id'];                                    
            $doc_count = tagged_documents_count($tag_id);
            $href_string = '';
            if($admin){
	            //$tag_label =$row['tag_name'].'('.$doc_count.')';	            	           
	                      
	            $tag_name ='<input type="checkbox" onclick="javascript:handler:SUGAR.kb.checkTags();" id="selected_tags[]" name="selected_tags[]" value="'.$tag_id.'">';
	            $tag_name .=$row['tag_name'].'('.$doc_count.')';
	            $href_string = "javascript:handler:SUGAR.kb.adminClick();javascript:handler:SUGAR.kb.moveToTag();javascript:node_click('tagstree','selected_directory_children', 'div', 'get_admin_browse_articles')";
            }            
            else{
            	
            	$tag_name =$row['tag_name'].'('.$doc_count.')';
            	$href_string = "javascript:handler:SUGAR.kb.modalClose('tagstree')";
            	 if ($create_root_node) {
            	    $root_node->set_property("href",$href_string);   	
            	 }
            }            
            $tag_name = from_html($tag_name);                    
            $parent_tag_node = new Node($tag_id, $tag_name);                        
            $parent_tag_node->set_property("href",$href_string);                                                                                                                            
             $parent_tag_node->dynamic_load = true;
            $parent_tag_node->expanded = false;
           if ($create_root_node) {          
	             $root_node->dynamic_load = true;
	            $root_node->expanded = false;
                if(!empty($parent_tag_node)) $root_node->add_node($parent_tag_node);
                $nodes[]= $root_node;	            
            }
            else{                     
	            //$parent_tag_node->expanded = true;
	            if(!empty($parent_tag_node)) $nodes[]=$parent_tag_node;                 
            }                   
            //childNodes($parent_tag_node,$tag_id,$nodes,$admin);                      
        }                    
    }            
    return $nodes;
 }
function get_tags_nodes_cached($admin=false){
    $nodes=array();
    global $app_list_strings;
    $mod_strings = get_kbtag_strings();
 
    $query="select id,tag_name from kbtags where parent_tag_id is null  and deleted=0 order by tag_name";
    $result=$GLOBALS['db']->query($query);
    $current_cat_id=null;
    $cat_node=null;
   
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
        if (!empty($row['id'])) {                   
            $tag_id=$row['id'];                        
            
            $doc_count = tagged_documents_count($tag_id);
            if($admin){
	            //$tag_label =$row['tag_name'].'('.$doc_count.')';	            	           
	            
	            $tag_name ='<input type="checkbox" onclick="javascript:handler:SUGAR.kb.checkTags();" id="selected_tags[]" name="selected_tags[]" value="'.$tag_id.'">';
	            $tag_name .=$row['tag_name'].'('.$doc_count.')';
	            
            }
            else{
            	$tag_name =$row['tag_name'].'('.$doc_count.')';
            }
                                   
            $parent_tag_node = new Node($tag_id, $tag_name);
            $href_string = "javascript:handler:modalClose('tagstree')";            
            $parent_tag_node->set_property("href",$href_string);                                                                                                                            
            if (!empty($parent_tag_node)) {
		        childNodes($parent_tag_node,$tag_id,$nodes,$admin);                      
		        $nodes[]=$parent_tag_node;
            }
        }                   
     }        
    return $nodes;
 }


 function childNodes(&$parent_tag_node,$parent_tag_id,$nodes,$admin=false){ 	
    $nodes=array();    
 	$query_child="select id,tag_name from kbtags where parent_tag_id = '$parent_tag_id' and deleted=0 order by id";
    $result_child=$GLOBALS['db']->query($query_child);
    
    while (($rowChild=$GLOBALS['db']->fetchByAssoc($result_child))!= null) {
       $child_tag_id=$rowChild['id'];
       $doc_count = tagged_documents_count($child_tag_id);
       $href_string = '';       
       if($admin){
	       	$child_tag_name ='<input type="checkbox" onclick="javascript:handler:checkTags();" id="selected_tags[]" name="selected_tags[]" value="'.$child_tag_id.'">';
	       	$child_tag_name .=$rowChild['tag_name'].'('.$doc_count.')';
	       	$href_string = "javascript:node_click('tagstree','selected_directory_children', 'div', 'get_admin_browse_articles')";
       }
       else{
       		$child_tag_name=$rowChild['tag_name'].'('.$doc_count.')';
       		$href_string = "javascript:handler:modalClose('tagstree')";
       }                                 
       $child_tag_node = new Node($child_tag_id, $child_tag_name);       
       $child_tag_node->set_property("href",$href_string);
       //add to parent
               	       
       if (!empty($child_tag_node)){  
	        childNodes($child_tag_node,$child_tag_id,$nodes,$admin);
	        $parent_tag_node->add_node($child_tag_node);
	       	$nodes[]=$parent_tag_node;
	       }       
    }
    return $nodes;     
 }
 
 //////***************SEARCHING TAGS FUNCTIONS*************///
 function get_searched_tags_nodes($searched_and_related_Ids){
	
	$traversed_nodes=array();
	foreach ($searched_and_related_Ids as $tag_id=>$tags) {

		if (is_array($tags)) {
			foreach ( $tags as $parent_tag_id=>$tag_name) {
				if (empty($traversed_nodes[$parent_tag_id])) {
//			        $tag_id=$parent_tag_id;                                    
			        
			        if($parent_tag_id != 'All_Tags'){
				        $doc_count = tagged_documents_count($parent_tag_id);          			        
				        $tag_name =$tag_name.'('.$doc_count.')';
			        }
			        $tag_name = from_html($tag_name);	                                                    
			        $parent_tag_node = new Node($parent_tag_id, $tag_name);	        
			        $href_string = "javascript:handler:SUGAR.kb.modalClose('tagstree')";	                    
			        $parent_tag_node->set_property("href",$href_string);     
			        $parent_tag_node->dynamic_load = true; 			        
				} else {
					//tag found
					
					$parent_tag_node=$traversed_nodes[$parent_tag_id];
					
				}
				
				//find peers for this node
				$peer_nodes=find_peers($parent_tag_id);
				foreach ($peer_nodes as $peer_node_id=>$peer_node_name) {
					if (empty($traversed_nodes[$peer_node_id])) {
 					   $tag_name =$peer_node_name; 
                       if($peer_node_id != 'All_Tags'){
					        $doc_count = tagged_documents_count($peer_node_id);          
					        $tag_name =$tag_name.'('.$doc_count.')';
			            }				        
			            $tag_name = from_html($tag_name);
			            $new_tag = new Node($peer_node_id, $tag_name);	        
				        $href_string = "javascript:handler:SUGAR.kb.modalClose('tagstree')";	                    
				        $new_tag->set_property("href",$href_string);     
				        $new_tag->dynamic_load = true;  
				        $parent_tag_node->expanded= false;
				        
					} else {
						$new_tag=$traversed_nodes[$peer_node_id];
					}
					$parent_tag_node->add_node($new_tag);
					$traversed_nodes[$peer_node_id]=$new_tag;										
				}
				//add parent node to collection
				$parent_tag_node->dynamic_load = false;
				$parent_tag_node->expanded= true;
				$traversed_nodes[$parent_tag_id]=$parent_tag_node;
			}
		}
	}	
	return $traversed_nodes['All_Tags'];
}
function find_peers($parent_tag_id) {
	
	$tags=array();
	$query="select id,tag_name from kbtags where deleted = 0 and";
	if ($parent_tag_id=='All_Tags') {
    	$query.=" parent_tag_id is null ";
	} else {
		$query.=" parent_tag_id = '$parent_tag_id'";
	}
    $query.=" order by tag_name";	
    $result=$GLOBALS['db']->query($query);	       
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
	    if(!empty($row['id'])) {                   
	        $tags[$row['id']]=$row['tag_name'];                                    
	    }
    }	
	return $tags;
}
 
 function getRootNode($tag_id,$tag_name){ 	

	$mod_strings = get_kbtag_strings();
	$nodes_sequence=array(); 
    //add one entry for root(all tags node)
	   
    $root_tag_def = getParentNode($tag_id);
    if (empty($root_tag_def)) {
    	$nodes_sequence[$tag_id] = $tag_name;	
    } else {
    	do {
    		$nodes_sequence[$root_tag_def[0]]=$root_tag_def[1];	
			
			$root_tag_def = getParentNode($root_tag_def[0]);
    	} while(!empty($root_tag_def));
    }
	$nodes_sequence['All_Tags']=$mod_strings['LBL_TAGS_ROOT_LABEL'];
	//$nodes_sequence=array_reverse($nodes_sequence);
    return $nodes_sequence;     
 }
 
function getParentNode($tag_id){ 	 
	
 	$query_parent="select pr.id , pr.tag_name from kbtags pr where pr.id in (select parent_tag_id from kbtags where id = '$tag_id' and deleted=0)";
    $result_parent=$GLOBALS['db']->query($query_parent);
    $parent_row=$GLOBALS['db']->fetchByAssoc($result_parent);  
    if (empty($parent_row)) {
    	return array();
    } 
    return array(0=>$parent_row['id'],1=>$parent_row['tag_name']);     
 }
 
 ///////***********************SEARCH NODES FUNCTIONS**********///
 
 ///modal tags tree
 function get_tags_modal_nodes($parent_id=null,$multi_select=false){
    $nodes=array();
    global $app_list_strings;
    $mod_strings = get_kbtag_strings();
        
    //$query="select id,tag_name from kbtags where parent_tag_id is null and deleted=0 order by tag_name";
    $query="select id,tag_name from kbtags where deleted = 0 and";
    if (empty($parent_id)) {
    	$query.=" parent_tag_id is null order by tag_name";	
    } else {
    	$query.=" parent_tag_id = '$parent_id' order by tag_name";	    
    }
    $result=$GLOBALS['db']->query($query);
    $current_cat_id=null;
    $cat_node=null;
    
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
        if (!empty($row['id'])) {                   
            $tag_id=$row['id'];                                    
            $doc_count = tagged_documents_count($tag_id);
            $href_string = '';
            
            if($multi_select){
            	$tag_name ='<input type="checkbox" onclick="javascript:handler:SUGAR.kb.selectTagToApplyArticles();" id="selected_apply_tags[]" name="selected_apply_tags[]" value="'.$tag_id.'">';
            	$tag_name .=$row['tag_name'].'('.$doc_count.')';
            }	
            else{
                $tag_name =$row['tag_name'].'('.$doc_count.')';
                $href_string = "javascript:handler:SUGAR.kb.selectTagToMoveArticles()";
            }
            $tag_name = from_html($tag_name);                                
            $parent_tag_node = new Node($tag_id, $tag_name);            
            if(!$multi_select){            
              $parent_tag_node->set_property("href",$href_string);
            }   
            $parent_tag_node->dynamic_load = true;                                                                                                                         
            if (!empty($parent_tag_node)) $nodes[]=$parent_tag_node;
            //_pp($parent_tag_node);//
            //$parent_tag_node->expanded = true;
                                                
            //childNodes($parent_tag_node,$tag_id,$nodes,$admin);                      
        }                   
    }        
    
    return $nodes;
 }
 //browse articles admin
 function get_admin_browse_articles($params){
    $_REQUEST['module'] = 'KBDocuments';
    if(empty($params['NODES']) || empty($params['TREE']) ){
        //return no documents found message
        echo "There was an error accessing this tag information";
    }else{
    global $odd_bg, $even_bg, $hilite_bg;
    $mod_strings = get_kbtag_strings();
    $colorclass = '';$bgColor=$even_bg;
        $depth = $params['TREE']['depth'];
        $tag_id = $params['NODES'][$depth]['id'];
    
        global $app_strings, $odd_bg, $even_bg, $hilite_bg;
        $colorclass = '';

        $search_str = "kbdocuments.id
                            IN (
                                SELECT kbd.id
                                FROM kbdocuments kbd, kbdocuments_kbtags kbd_kt
                                WHERE kbd.id = kbd_kt.kbdocument_id
                                AND kbd_kt.kbtag_id = '$tag_id'
                                AND kbd_kt.deleted = 0
                                AND kbd.deleted = 0 
		                       )";        
        

               require_once('modules/KBDocuments/SearchUtils.php');

               $results = get_admin_fts_list($search_str,true);

        echo $results;
    }    
}
 function tagged_documents_count($tag_id) {
    global $current_user;
    $docs = array();
    $count = 0;	 
    $query = " select count(kbt.id) doc_count from kbdocuments_kbtags kbt";
    if (!is_admin($current_user)){ 
        $query.= " inner Join team_memberships tm on kbt.team_id = tm.team_id  AND tm.user_id =  '".$current_user->id. "' and tm.deleted = 0 ";
    }
    $query.= " where kbt.kbtag_id='$tag_id' and kbt.deleted=0";
 	$result=$GLOBALS['db']->query($query);    
    $docs = $GLOBALS['db']->fetchByAssoc($result);   
    if($docs['doc_count'] != null) $count= $docs['doc_count'];
    return $count;
 }
 

function tag_count($tag_id) {
    global $current_user;
    $docs = array();
    $count = 0;  
    $query = " select count(kt.id) file_count from kbtags kt";

    if (!is_admin($current_user)){ 
        $query.= " inner Join team_memberships tm on kt.team_id = tm.team_id  AND tm.user_id =  '".$current_user->id. "' and tm.deleted = 0 ";
    }

    $query.= " where kt.parent_tag_id = '".$tag_id. "' and kt.deleted=0";
    $result=$GLOBALS['db']->query($query);    
    $files = $GLOBALS['db']->fetchByAssoc($result);   
    if($files['file_count'] != null) $count= $files['file_count'];
    return $count;
 }
 

/////////////// Begin Full Text Search Specific  ///////////////
 /**get_browse_documents
 * 
 * This method gets documents that are to be displayed in list form when node is selected from tree
 * 
 * @param $params array of tree params
 */
function get_browse_documents($params){
    $_REQUEST['module'] = 'KBDocuments';

    if(empty($params['NODES']) || empty($params['TREE']) ){
        //return no documents found message
        echo "There was an error accessing this tag information";
    }else{
global $odd_bg, $even_bg, $hilite_bg,$current_user,$app_strings;
    $mod_strings = get_kbtag_strings();
    $colorclass = '';$bgColor=$even_bg;
        
     //query for documents under this node
     //get id of node selected
        $depth = $params['TREE']['depth'];
        $tag_id = $params['NODES'][$depth]['id'];
    
        //create query for documents under selected node
        $search_str = ' ';
        //check to see if this is the node that holds all untagged documents
        if($tag_id == 'UNTAGGED_NODE_ID'){
            //create query to retrieve ALL UNTAGGED documents under this node
            $search_str= "kbdocuments.id NOT IN
                            (select kbdocument_id from kbdocuments_kbtags where deleted=0) and kbdocuments.deleted = 0";
        
        }else{
            //this is normal node, process for list of child documents
            $search_str = "kbdocuments.id
                                IN (
                                    SELECT kbd.id
                                    FROM kbdocuments kbd, kbdocuments_kbtags kbd_kt
                                    WHERE kbd.id = kbd_kt.kbdocument_id
                                    AND kbd_kt.kbtag_id = '$tag_id'
                                    AND kbd_kt.deleted = 0
                                    AND kbd.deleted = 0
                                )";        
        }

               require_once('modules/KBDocuments/SearchUtils.php');
               //pass in query 'where' clause into method that returns list
               $results = get_fts_list($search_str,false,true);
               $current_user->setPreference('KBSearchFormMode', 'browse',0,'KnowledgeBase');

        echo $results;
    }    
}




 /**get_tag_nodes_for_browsing
 * 
 * This method retrieves nodes to display in tree, one level at a time
 * 
 * @param $parent_id id of parent tag, if it exists
 */
function get_tag_nodes_for_browsing($parent_id=null){
    $nodes=array();
    global $app_list_strings;
    $mod_strings = get_kbtag_strings();
    
    //create query of nodes to display
    $query="select id,tag_name from kbtags where deleted = '0' and ";
    //add parent id if not empty
    if (empty($parent_id)) {
    	$query.=" parent_tag_id is null order by tag_name";	
    } else {
    	$query.=" parent_tag_id = '$parent_id' order by tag_name";	    
    }
    
    $result=$GLOBALS['db']->query($query);
    $current_cat_id=null;
    $cat_node=null;

    //process node for each value returned
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {

        if (!empty($row['id'])) {      
	       $child_tag_id=$row['id'];
           //get article count
	       $doc_count = tagged_documents_count($child_tag_id);
           $tag_count = tag_count($child_tag_id);
           $child_tag_name=$row['tag_name'];
           //create browse node
           $parent_tag_node = create_browse_node($child_tag_id, $child_tag_name, $tag_count, $doc_count);
           //add new node to array of nodes to display
           if (!empty($parent_tag_node)){
                $nodes[]=$parent_tag_node;
           }   
        }
    }


        //now create root node that will hold all articles that are untagged
        if($parent_id == null){
           $untagged_tag_id = 'UNTAGGED_NODE_ID';
           //get article count
           $untagged_count = untagged_documents_count($untagged_tag_id);
           //create browse node
           $parent_tag_node = create_browse_node($untagged_tag_id, $mod_strings['LBL_UNTAGGED_ARTICLES_NODE'], 0,$untagged_count);
           //add new node to array of nodes to display
           if (!empty($parent_tag_node)){
                $nodes[]=$parent_tag_node;
           }
        }   
            
    return $nodes;
 }
 
 
 
 /**create_browse_node()
 * 
 * This method creates node for browse tree in fts search screen
 * 
 * @param $id id of node to create
 * @param $name name of node to create
 */
  function create_browse_node($id, $node_name,$tag_count=0,$doc_count=0) {
    global $sugar_config,$currentModule,$current_language;
    $mod_strings = get_kbtag_strings();    

//_pp($mod_strings);    
    //create the title to display when hovering over link
    $tag_LBL = $mod_strings['LBL_CHILD_TAGS_IN_TREE_HOVER'];
    $doc_LBL = $mod_strings['LBL_ARTICLES_IN_TREE_HOVER'];

    if($tag_count==1){//use singular
        $tag_LBL = $mod_strings['LBL_CHILD_TAG_IN_TREE_HOVER'];
    }
    if($doc_count==1){//use singular
        $doc_LBL = $mod_strings['LBL_ARTICLE_IN_TREE_HOVER'];
    }    
    $title = $mod_strings['LBL_THIS_TAG_CONTAINS_TREE_HOVER']." $tag_count $tag_LBL, $doc_count $doc_LBL";
    $node_name = "<span title='$title'>$node_name</span>";
    
    $href = "javascript:node_click('kb_browse_tags','selected_directory_children', 'div', 'get_browse_documents')";


    //create node
    $node = new Node($id, $node_name);
    $node->set_property("href", $href);
    $node->expanded = false;
     
     //decide if the folder icon should display by sepcifying whether the node is dynamic or not.
    if($tag_count == 0){
        $node->dynamic_load = false;    
    }else{
        $node->dynamic_load = true;
    }    

    return $node;
}

 
 /**untagged_documents_count()
 * 
 * This method counts and returns number of all the untagged articles in the system
 */
 function untagged_documents_count() {
    global $current_user;
    $docs = array();
    $count = 0;  
    $dbType = $GLOBALS['db']->dbType;
    $query = "select count(kb.id) doc_count  from kbdocuments kb";
    if (!is_admin($current_user)){ 
        $query.= " Inner Join team_memberships tm on kb.team_id = tm.team_id  AND tm.user_id =  '".$current_user->id. "' and tm.deleted = 0 ";
    }
    $query.= " where kb.id not in (select kbdocument_id from kbdocuments_kbtags where deleted=0) and kb.deleted = 0";
    $result=$GLOBALS['db']->query($query);    
    $docs = $GLOBALS['db']->fetchByAssoc($result);   
    if($docs['doc_count'] != null) $count= $docs['doc_count'];
    return $count;
 }
 


/////////////// End Full Text Search Specific  ///////////////

///////Tags sub-tags with articles can not be deleted****///
function check_tag_child_tags_for_articles($parent_tag_id){
    $nodes=array();
    global $app_list_strings;
    $mod_strings = get_kbtag_strings(); 
    $query="select id,tag_name from kbtags where parent_tag_id = '$parent_tag_id' and deleted=0 order by id";
    $result=$GLOBALS['db']->query($query);
   $hasArticle = false;
    while (($row=$GLOBALS['db']->fetchByAssoc($result))!= null) {
        if (!empty($row['id'])) {                   
            $tag_id=$row['id'];                          
            if(tagged_documents_count($tag_id) >0){
            	$hasArticle = true;
            	break;
            }                                                                                                                                
            else if (!empty($tag_id)) {
		       $hasArticle = childTagsHaveArticles($tag_id);                      		        
            }
        }                   
     }        
    return $hasArticle;
 }


 function childTagsHaveArticles($child_tag_id){ 	
       
 	$query_child="select id,tag_name from kbtags where parent_tag_id = '$child_tag_id' and deleted=0 order by id";
    $result_child=$GLOBALS['db']->query($query_child);
    $hasArticle = false;
    while (($rowChild=$GLOBALS['db']->fetchByAssoc($result_child))!= null) {
       $tag_id=$rowChild['id'];
       if(tagged_documents_count($tag_id) >0){
   	    	$hasArticle = true;
        	break;
      
       }                                                           	       
       else if (!empty($tag_id)){  
	        $hasArticle = childTagsHaveArticles($tag_id); 	        
	      }       
    }
    return $hasArticle;     
 }
 ////end functions for tag deletion

function get_kbtag_strings(){
    global $mod_strings, $sugar_config;
        //get language
        if(isset($_SESSION['authenticated_user_language']) && $_SESSION['authenticated_user_language'] != '') {
            $current_language = $_SESSION['authenticated_user_language'];
        }else{
            $current_language = $sugar_config['default_language'];
        }        
        return return_module_language($current_language,"KBTags");
        
   
}

?>

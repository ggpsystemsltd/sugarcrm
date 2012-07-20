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

$tagHasArticle = '';

function tagHasArticle($kbTagId){
	$hasArticle = false;
	$search_str = "SELECT kbdocument_id from kbdocuments_kbtags
                          WHERE kbtag_id = '$kbTagId' and deleted=0";                                                        
         $res = $GLOBALS['db']->query($search_str);
         if($GLOBALS['db']->fetchByAssoc($res) != null){
         	$hasArticle = true;
         	//$tagHasArticle = "<script> alert('This tag has articles') </script>";
         }
    if(!$hasArticle){     
      $hasArticle = check_tag_child_tags_for_articles($kbTagId);
     }    
    return $hasArticle;     
}

$GLOBALS['log']->fatal($tagHasArticle);

//process request parameters. consider following parameters.
//function, and all parameters prefixed with PARAM.
//PARAMT_ are tree level parameters.
//PARAMN_ are node level parameters.


$json = getJSONobj();
$tagIds = $json->decode(html_entity_decode($_REQUEST['selectedTagIds']));
 if(isset($tagIds['jsonObject']) && $tagIds['jsonObject'] != null){
	$tagIds = $tagIds['jsonObject'];
 }	 
foreach($tagIds as $tagId){
	if(!empty($tagId)){
		       
        //retrieve Tag    
        $kbtag = new KBTag();                    
	if(tagHasArticle($tagId) || $tagId=='FAQs'){              
              /*
              if($tagHasArticle == null){
                $tagHasArticle = "<script>alert('" . $tagId.' ';
                $tagHasArticle.=" has articles')</script>";
              }
              else{
              	$tagHasArticle .=$tagId.' ';
              }
              */      
              $can_not_delete_msg = $mod_strings['LBL_TAGS_CHILD_TAGS_WITH_ARTICLE_CAN_NOT_BE_DELETED'];
              $can_not_delete_faq_msg = $mod_strings['LBL_FAQ_TAG_CAN_NOT_BE_DELETED'];  
              if($tagId=='FAQs'){
              	$tagHasArticle = "<script>alert('" . $tagId." $can_not_delete_faq_msg')</script>";
              }
              else{              	              
              	$tagHasArticle = "<script>alert('$can_not_delete_msg')</script>";
              }               	                                	
        }
        else{ 
	        $kbtag->retrieve($tagId);		        		        
	        //also retrieve children and check if there is any article linked                                                 
	        $kbtag->deleted = 1;
	        $kbtag->save();
        }
	}
}	
        $tagstree=new Tree('tagstree');
        $tagstree->set_param('module','KBTags');
        $tagstree->set_param('moduleview','admin');
        //$nodes=get_tags_nodes(true);
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
               
       if($tagHasArticle != null){
           $response = $tagHasArticle; 	
           $response .= $tagstree->generate_nodes_array();
        }
        else{
          $response = $tagstree->generate_nodes_array();
        }
        $response= $response."<script> document.getElementById('selected_directory_children').innerHTML='' </script>";
        $GLOBALS['log']->fatal($tagHasArticle);  
if (!empty($response)) {	
    echo $response;
	//$json = getJSONobj();
	//print $json->encode($response);	
	//return the parameters
}
sugar_cleanup();
exit();
?>
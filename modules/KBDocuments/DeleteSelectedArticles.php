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

//process request parameters. consider following parameters.
//function, and all parameters prefixed with PARAM.
//PARAMT_ are tree level parameters.
//PARAMN_ are node level parameters.


$json = getJSONobj();
$selectedArticles = $json->decode(html_entity_decode($_REQUEST['selectedArticles']));
 if(isset($selectedArticles['jsonObject']) && $selectedArticles['jsonObject'] != null){
	$selectedArticles = $selectedArticles['jsonObject'];
 }	 
 
foreach($selectedArticles as $articleId){
	if(!empty($articleId)){		
		
		       
        //retrieve article  
        $kbarticle = new KBDocument();                    
        $kbarticle->retrieve($articleId);        	        		       
        $deleted=1; 
        //also retrieve children and check if there is any article linked                                                 
        $kbarticle->deleted = 1;
        $kbarticle->save();
        //also delete related 
        $kbdocrevs = KBDocument::get_kbdocument_revisions($articleId);
    
  	   if (!empty($kbdocrevs) && is_array($kbdocrevs)) {
		 foreach($kbdocrevs as $key=>$thiskbid) {	
			$thiskbversion = new KBDocumentRevision();
			$thiskbversion->retrieve($thiskbid);			
	        $docrev_ids = KBDocumentRevision::get_docrevs($thiskbid);
			foreach($docrev_ids as $key=>$thisdocrevid){
			 $thisdocrev = new DocumentRevision();
			 $thisdocrev->retrieve($thisdocrevid);
			 UploadFile::unlink_file($thisdocrevid,$thisdocrev->filename);
			 //mark version deleted
			 $thisdocrev->mark_deleted($thisdocrev->id);
			 //also retrieve the content
			 if($thisdocrev->file_ext == null && $thisdocrev->file_mime_type == null){
			   //this is content retrieve and mark it delete
			   	
			 }			 
			}				
		   //mark kbdoc revision deleted	
		   $thiskbversion->mark_deleted($thiskbversion->id);
		  }				
	    }                   
          
		$q = 'UPDATE kbdocuments_kbtags SET deleted = '.$deleted.' WHERE kbdocument_id = \''.$articleId.'\'';    
		$GLOBALS['db']->query($q);
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
		 $root_node->expanded = true;    
		 $tagstree->add_node($root_node);                
               
        $response = $tagstree->generate_nodes_array();
        $response= $response."<script> document.getElementById('selected_directory_children').innerHTML='' </script>";         
if (!empty($response)) {	
    echo $response;
	//$json = getJSONobj();
	//print $json->encode($response);	
	//return the parameters
}
sugar_cleanup();
exit();
?>
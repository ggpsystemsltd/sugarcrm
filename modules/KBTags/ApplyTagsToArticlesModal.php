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
require_once('include/entryPoint.php');
require_once('include/upload_file.php');
require_once('include/ytree/Tree.php');
require_once('include/ytree/Node.php');
require_once('modules/KBTags/TreeData.php');

$json = getJSONobj();
$tagArticleIds = $json->decode(html_entity_decode($_REQUEST['tagAndArticleIds']));
 if(isset($tagArticleIds['jsonObject']) && $tagArticleIds['jsonObject'] != null){
	$tagArticleIds = $tagArticleIds['jsonObject'];
  }

/*
$articleIds = $json->decode(html_entity_decode($_REQUEST['articles']));
 if(isset($articleIds['jsonObject']) && $articleIds['jsonObject'] != null){
	$articleIds = $articleIds['jsonObject'];
  }	
  
$GLOBALS['log']->fatal($articleIds);	
*/
$deleted=1;
$deletedNot=0;



   $KBTag = new KBTag();
   $tagsCount = $tagArticleIds[0];
   $articlesCount =  $tagArticleIds[1];
   
  for($i=0;$i<$tagsCount;$i++){      
	  $tagId = $tagArticleIds[$i+2];
     //fetch the existing documents
      $qdocs = 'SELECT kbdocument_id FROM kbdocuments_kbtags WHERE kbtag_id=\''.$tagId.'\' and deleted = '.$deletedNot.'';
      $results = $KBTag->db->query($qdocs);

	  for($j=0;$j<$articlesCount;$j++){      
         //check if the article already exists in tag
         $articleExists = false;          
         while (($rows=$GLOBALS['db']->fetchByAssoc($results))!= null) {
       		if (!empty($rows['kbdocument_id'])) {                   
        		if($rows['kbdocument_id'] == $tagArticleIds[$j+2+$tagsCount]){
        			$articleExists = true;
        			break;
        		}
       		}
       	  }      
         if(!$articleExists){
			  $KBDocument = new KBDocument();
			  $KBDocument->retrieve($tagArticleIds[$j+2+$tagsCount]);
			  $doc_team_id = $KBDocument->team_id;  
			  $guid = create_guid();		      
			  $qi =	'INSERT INTO kbdocuments_kbtags (id,kbtag_id,kbdocument_id,team_id) values(\''.$guid.'\',\''.$tagId.'\',\''.$tagArticleIds[$j+2+$tagsCount].'\',\''.$doc_team_id.'\')';	      
			  $KBTag->db->query($qi);
         }        
	  }
  }
	  //new tree
	  $tagstree=new Tree('tagstree');
	  $tagstree->set_param('module','KBTags');       
	  $tagstree->set_param('moduleview','admin');
	  $nodes=get_tags_nodes(false,true,null);
	  $root_node = new Node('All_Tags', $mod_strings['LBL_TAGS_ROOT_LABEL']);
	   foreach ($nodes as $node) {                                         
	        $root_node->add_node($node);                       
	    }
	  $root_node->expanded = true;    
	  $tagstree->add_node($root_node);    
	  $response = $tagstree->generate_nodes_array(); 
	  $response .= "<script>document.getElementById('selected_directory_children').innerHTML=''</script>";
    
if (!empty($response)) {	
	echo $response;
	//return the parameters
}
sugar_cleanup();
exit();
?>
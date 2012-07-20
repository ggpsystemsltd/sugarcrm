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




    /**get_fts_list
     *
     * This method takes a where clause and uses the list view framework to return a list form for fts
     * returns html for list form with results from a full text search query
     * @param $where where clause to use, typically retrieved from create_fts_search_list_query method
     * @param $ajaxSort if set to true, then sort urls on header of list will point to ajax call.
     *        if set to false, non ajax navigation will take place and screen will refresh (standard behavior)
     */

    function get_fts_list($qry_arr,$isMultiSelect=false,$ajaxSort=false){
    global $current_language,$current_user;
    global $urlPrefix, $currentModule, $theme;
    $current_module_strings = return_module_language($current_language, 'KBDocuments');
    // focus_list is the means of passing data to a ListView.
    global $focus_list;


    require_once('include/ListView/ListViewSmarty.php');
    $view = new SugarView();
    $view->type = 'list';
    $view->module = 'KBDocuments';
    $metadataFile = $view->getMetaDataFile();
    require_once($metadataFile);
    require_once('modules/KBDocuments/KBListViewData.php');


    // clear the display columns back to default when clear query is called
    if(!empty($_REQUEST['clear_query']) && $_REQUEST['clear_query'] == 'true')
        $current_user->setPreference('ListViewDisplayColumns', array(), 0, $currentModule);

    $savedDisplayColumns = $current_user->getPreference('ListViewDisplayColumns', $currentModule); // get user defined display columns
    $json = getJSONobj();
    $seedDocument = new KBDocument(); // seed bean

    // setup listview smarty
    $lv = new ListViewSmarty();
    $lv->lvd= new KBListViewData();

    $displayColumns = array();
    // check $_REQUEST if new display columns from post
    if(!empty($_REQUEST['displayColumns'])) {
        foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
            if(!empty($listViewDefs['KBDocuments'][$col]))
                $displayColumns[$col] = $listViewDefs['KBDocuments'][$col];
        }
    }
    elseif(!empty($savedDisplayColumns)) { // use user defined display columns from preferences
        $displayColumns = $savedDisplayColumns;
    }
    else { // use columns defined in listviewdefs for default display columns
        foreach($listViewDefs['KBDocuments'] as $col => $params) {
            if(!empty($params['default']) && $params['default'])
                $displayColumns[$col] = $params;
        }
    }
    //disable mass update form
    $params = array('massupdate' => false);

    //process orderBy if set in request
    if(!empty($_REQUEST['orderBy'])) {
        $params['orderBy'] = $_REQUEST['orderBy'];
        $params['overrideOrder'] = true;
        if(!empty($_REQUEST['sortOrder'])) $params['sortOrder'] = $_REQUEST['sortOrder'];
    }

    //if ajax sort is set, then pass in param to display columns array that will change
    //the sort urls to be javascript based within tpl
    if($ajaxSort){
        foreach($displayColumns as $col=>$coldata){
            $coldata['ajaxSort'] = true;
            $displayColumns[$col] = $coldata;
        }
    }

    $lv->displayColumns = $displayColumns;


    //grab the where and custom from clauses from passed in query
    $where = '';
    //check to see if param is a string
    if(is_string($qry_arr)){
        //only the where string is passed in, just populate the where
        $where = $qry_arr;
    }elseif(is_array($qry_arr)){
        //array was passed in, populate the where and custom_from
        if(isset($qry_arr['where'])){$where = $qry_arr['where'];}
        if(isset($qry_arr['custom_from'])){$params['custom_from'] = $qry_arr['custom_from'];}
    }

    if (!isset($where)) $where = "";

    global $listViewDefs;

    //disable some features.
    $lv->multiSelect = $isMultiSelect;
    $lv->lvd->additionalDetailsAjax=false;
    $lv->export = false;
    $lv->show_mass_update_form = false;
    $lv->show_action_dropdown = false;
    $lv->delete = false;
    $lv->select = false;

    $lv->setup($seedDocument, 'modules/KBDocuments/SearchListView.tpl', $where, $params);
    $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
    //if this is a sort from browse tab, then set the ajaxsort flag to true
    if($ajaxSort){
        $lv->data['pageData']['urls']['ajaxSort'] = true;
    }

    //begin code that will remove single and double quotes for javascript use
    $temp_Data = array();
    //iterate through each record returned in list
	if(isset($lv->data['data']) && $lv->data['data'] != null){
    foreach ($lv->data['data'] as $arrRec){
        //if document name is set, then process
        if(isset($arrRec['KBDOCUMENT_NAME']) && !empty($arrRec['KBDOCUMENT_NAME'])){
            $GLOBALS['log']->info("name of record getting quotes stripped is: ".$arrRec['KBDOCUMENT_NAME']);
            if(!empty($arrRec['KBDOCUMENT_NAME']))
                $temp_name = $arrRec['KBDOCUMENT_NAME'];
                //replace single and double quotes with empty string
                $temp_name = str_replace('&#039;', '', $temp_name);
                $temp_name = str_replace('\'', '', $temp_name);
                $temp_name = str_replace('&quot;', '', $temp_name);
                $temp_name = str_replace('"', '', $temp_name);
                //set to new element variable that will be used for javascript
                $arrRec['KBDOCUMENT_NAME_js'] = $temp_name;
                $temp_Data[] = $arrRec;
        }
    }
	}
    //set records back into data array
    $lv->data['data'] = $temp_Data;



    //return display string, note that display is taking false as parameter so as to disable
    //massupdate form
    return  $lv->display(false);




    }

	/**get_fts_list
	     *
	     * This method takes a where clause and uses the list
	     * returns html for list form with results from a full text search query
	     * @param $where where clause to use, typically retrieved from create_fts_search_list_query method
	     * @param $ajaxSort if set to true, then sort urls on header of list will point to ajax call.
	     *        if set to false, non ajax navigation will take place and screen will refresh (standard behavior)
	     */
function get_admin_fts_list($where,$isMultiSelect=false){
    global $app_strings, $app_list_strings, $current_language, $sugar_version, $sugar_config, $current_user;
    global $urlPrefix, $currentModule, $theme;
    $current_module_strings = return_module_language($current_language, 'KBDocuments');
    // focus_list is the means of passing data to a ListView.
    global $focus_list;


    require_once('include/ListView/ListViewSmarty.php');
	require_once('modules/KBDocuments/metadata/listviewdefs.php');
    require_once('modules/KBDocuments/KBListViewData.php');


	global $app_strings;
	global $app_list_strings;
	global $current_language;
	$current_module_strings = return_module_language($current_language, 'KBDocuments');

	global $urlPrefix;
	global $currentModule;

	global $theme;
	global $current_user;
	// focus_list is the means of passing data to a ListView.
	global $focus_list;

	// setup quicksearch
	//require_once('include/QuickSearchDefaults.php');
	//$qsd = new QuickSearchDefaults();

	// clear the display columns back to default when clear query is called
	if(!empty($_REQUEST['clear_query']) && $_REQUEST['clear_query'] == 'true')
	    $current_user->setPreference('ListViewDisplayColumns', array(), 0, $currentModule);

	$savedDisplayColumns = $current_user->getPreference('ListViewDisplayColumns', $currentModule); // get user defined display columns

	$json = getJSONobj();

	$seedCase = new KBDocument(); // seed bean
	//$searchForm = new SearchForm('KBDocuments', $seedCase); // new searchform instance

	// setup listview smarty
	$lv = new ListViewSmarty();
    $lv->lvd= new KBListViewData();
    $lv->export = false;
    $lv->select = false;
    $lv->delete = false;

	$_REQUEST['action'] = 'index';
	$displayColumns = array();
	// check $_REQUEST if new display columns from post
	if(!empty($_REQUEST['displayColumns'])) {
	    foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
	        if(!empty($listViewDefs['KBDocuments'][$col]))
	            $displayColumns[$col] = $listViewDefs['KBDocuments'][$col];
	    }
	}
	elseif(!empty($savedDisplayColumns)) { // use user defined display columns from preferences
	    $displayColumns = $savedDisplayColumns;
	}
	else { // use columns defined in listviewdefs for default display columns
	    foreach($listViewDefs['KBDocuments'] as $col => $params) {
	        if(!empty($params['default']) && $params['default'])
	            $displayColumns[$col] = $params;
	    }
	}
	$params = array('massupdate' => true); // setup ListViewSmarty params
	if(!empty($_REQUEST['orderBy'])) { // order by coming from $_REQUEST
	    $params['orderBy'] = $_REQUEST['orderBy'];
	    $params['overrideOrder'] = true;
	    if(!empty($_REQUEST['sortOrder'])) $params['sortOrder'] = $_REQUEST['sortOrder'];
	}

	$lv->displayColumns = $displayColumns;


	// use the stored query if there is one
	if (!isset($where)) $where = "";
	require_once('modules/MySettings/StoreQuery.php');
	$storeQuery = new StoreQuery();
	if(!isset($_REQUEST['query'])){
	    $storeQuery->loadQuery($currentModule);
	    $storeQuery->populateRequest();
	}else{
	    $storeQuery->saveFromGet($currentModule);
	}
	if(isset($_REQUEST['query']))
	{
	    // we have a query
	    // first save columns

	    $current_user->setPreference('ListViewDisplayColumns', $displayColumns, 0, $currentModule);
	    if(!empty($_SERVER['HTTP_REFERER']) && preg_match('/action=EditView/', $_SERVER['HTTP_REFERER'])) { // from EditView cancel
	        $searchForm->populateFromArray($storeQuery->query);
	    }
	    else {
	        $searchForm->populateFromRequest();
	    }

	    $where_clauses = $searchForm->generateSearchWhere(true, "kbdocuments"); // builds the where clause from search field inputs

	    if (count($where_clauses) > 0 )$where = implode(' and ', $where_clauses);
	    $GLOBALS['log']->info("Here is the where clause for the list view: $where");
	}

	$lv->export = false;
    $lv->show_mass_update_form = false;
    $lv->show_action_dropdown = false;
    $lv->delete = false;
    $lv->select = false;
    $lv->setup($seedCase, 'modules/KBDocuments/AdminSearchListView.tpl', $where, $params);
	$lv->show_mass_update_form=false;
	$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);

	$ret_str =  $lv->display(false);
	$json = getJSONobj();
	return $ret_str;

}


   /**
    * get_faq_list
    */
   function get_faq_list($faq_id, $bean) {

       $list = array();


       $childTags = get_child_ids($faq_id, $bean);

       if(count($childTags) == 0) {
          return $list;
       }

       $queryIds = '';
       foreach(array_keys($childTags) as $node) {
               $queryIds .= ",'" . $node . "'";
       }

       $queryIds = substr($queryIds, 1); //remove leading ','
       $query = "select distinct(k.id)as id, k.created_by as created_by from kbdocuments k
                INNER join kbdocuments_kbtags kt on kt.kbdocument_id = k.id ";
	$query .= "	AND kt.kbtag_id in ($queryIds)";

       $result = $bean->db->query($query);

       while($row = $bean->db->fetchByAssoc($result)) {
             $record = new KBDocument();
             $record->disable_row_level_security = true;
             $id = $row['id'];
             $record->retrieve($id);
             $query = "SELECT first_name, last_name FROM users WHERE id = '".$row['created_by']."'";
             $results = $bean->db->query($query);
             $row2 = $bean->db->fetchByAssoc($results);
             if (!empty ($row2)) {
                 $record->created_by = $row2['first_name'].' '.$row2['last_name'];
             }

             // This gets really expensive... do it outside loop in one shot query
             $list[$id] = $record;
       } //while

       // With the list of KBDocuments on hand, now add the hierarachy information
       $query = "select kb.id as id, kb.kbdocument_id as doc_id, kb.kbtag_id as tag_id, t.parent_tag_id as parent_id, t.tag_name as tag_name
                from kbdocuments_kbtags kb INNER JOIN kbtags t on kb.kbtag_id = t.id AND kb.kbtag_id in ($queryIds)";
       $result = $bean->db->query($query);
       while($row = $bean->db->fetchByAssoc($result)) {
             $rec = $list[$row['doc_id']];
             $rec->tags[] = $row;
       }
       return $list;
   }


   /**
    * get_child_tags
    *
    */
   function get_child_tags($tag, $bean) {
        $list = array();
        $query = "select id, parent_tag_id, tag_name from kbtags where parent_tag_id = '$tag'";
        $result = $bean->db->query($query);
        if(!$result) {
           return $list;
        }

        // Store data as TagNode entries
        while($row = $bean->db->fetchByAssoc($result)) {
              $list[] = array('id'=>$row['id'], 'parent_id'=>$row['parent_tag_id'], 'name'=>$row['tag_name']);
        } //while
        return $list;
   }


   /**
    * get_tag_docs
    *
    */
   function get_tag_docs($tag, $bean) {
        $list = array();

        $spec_SearchVars = array();
     	$spec_SearchVars['exp_date'] = TimeDate::getInstance()->nowDate();
     	$spec_SearchVars['exp_date_filter'] = "after";
   	   	$date_filter = return_date_filter($bean->db, 'exp_date', $spec_SearchVars['exp_date_filter'], $spec_SearchVars['exp_date']);
        $date_filter = str_replace("kbdocuments", "k", $date_filter);
        $date_filter = "($date_filter OR k.exp_date IS NULL)";
        $query = "select distinct(k.id) as doc_id, k.kbdocument_name as doc_name from kbdocuments k
                 INNER join kbdocuments_kbtags kt on kt.kbdocument_id = k.id AND kt.deleted = 0";
       $query .= " AND k.status_id = 'Published' AND k.deleted = 0 AND " . $date_filter . " AND kt.kbtag_id = '$tag'";

        $result = $bean->db->query($query);
        if(!$result) {
           return $list;
        }

        // Store data as TagNode entries
        while($row = $bean->db->fetchByAssoc($result)) {
              $list[] = array('doc_id'=>$row['doc_id'], 'doc_name'=>$row['doc_name']);
        } //while
        return $list;
   }


   /**
    * get_kbdocument_body
    *
    */
   function get_kbdocument_body($kbdoc_id, $bean) {

        $query="select kbdocument_body from kbcontents where id in
               (select kbcontent_id from kbdocument_revisions where kbdocument_id = '$kbdoc_id')";

        $result = $bean->db->query($query);
        if(!$result) {
           return '';
        }

        $row = $bean->db->fetchByAssoc($result);
        return $row['kbdocument_body'];
   }


   /**
    * get_child_ids
    * This method returns an Array of id=>TagNode value pairs of the $root_id
    * @param string $root_id The root id value to query for (i.e. the id column in kbtags table)
    * @param SugarBean $bean A sugarbean instance
    * @return $results Array of child id=>tag_name key/value pairs found where the root node is $root_id
    */
   function get_child_ids($root_id, $bean) {
        $list = array();
        $query = "select id, parent_tag_id, tag_name from kbtags";
        $result = $bean->db->query($query);
        if(!$result) {
           return $list;
        }

        // Store data as TagNode entries
        $data = array();
        while($row = $bean->db->fetchByAssoc($result)) {
              $data[$row['id']] = new TagNode($row['id'], $row['parent_tag_id'], $row['tag_name']);
        } //while

        $skip = array();
        foreach($data as $tagNode) {
           recursive_search($tagNode, $data, $list, $root_id, $tagNode->id, $skip);
        }
        return $list;
   }

   /**
    * recursive_search
    * This is a recursive function to find documents linked to a particular root tag id.
    * @param $node The current TreeNode instance to search
    * @param $data The Array of all TreeNode(s)
    * @param $list The current Array of matching TreeNodes(s)
    * @param $root_id The root id value to search for
    * @param $id The current TreeNode id value being searched
    */
   function recursive_search($node, &$data, &$list, $root_id, $id, &$skip) {

           if(in_array($id, $skip)) {
              return;
           }

           if($node->id == $root_id) {
              $list[$id] = $id;
              return;
           }

           if(empty($node->parent_id) || $node->parent_id == '') {
              $skip[] = $id;
              return;  // Done at this root level w/o match, add to $skip
           }

           if($node->parent_id == $root_id) {
              //Found match
              $list[$id] = $data[$id];
              return;
           }
           //Search the next level
           recursive_search($data[$node->parent_id], $data, $list, $root_id, $id, $skip);
   }

   class TagNode {
       var $id;
       var $parent_id;
       var $name;

       function TagNode($aId, $aParentTagId, $aTagName) {
          $this->id = $aId;
          $this->parent_id = $aParentTagId;
          $this->name = $aTagName;
       }
   }

    /**
     * create_portal_list_query
     * This is the function that handles the searches called by the KB Portal code.
     * @param $bean SugarBean instance (used to perform queries)
     * @param $order_by String SQL for ORDER BY clause
     * @param $where String SQL for additional WHERE clause
     * @param $keywords Array of keyword arguments ([most_recent_articles] and [most_viewed_articles] are special)
     * @param $row_offset Integer value of row offset for LIMIT queries
     * @param $limit Interger value of LIMIT number
     * @param $recentLimit Integer value for the most recent articles limit
     * @return $result The result set of resulting query
     */
	function create_portal_list_query($bean, $order_by, $where, $keywords, $row_offset, $limit) {
		$searchVars = array();


		$searchVars['is_external_article'] = array('operator'=>'=','filter'=>1);
		$searchVars['is_external_article'] = array('operator'=>'=','filter'=>1);
	    $searchVars['status_id'] = array('operator'=>'=','filter'=>'Published');
		$spec_SearchVars = array();

	    //Create the common date filter to check for expiration and exp_date IS NULL
		$date_filter = return_date_filter($bean->db, 'exp_date', 'after', TimeDate::getInstance()->nowDate(), null);
		$date_filter = "($date_filter OR kbdocuments.exp_date IS NULL) ";

		if(!empty($keywords)) {
		   if(isset($keywords['keywords']) && $keywords['keywords'] == '[most_recent_articles]') {

		   	   $sql = create_most_recent_articles_query($bean, $order_by, $where, $keywords, $row_offset, $limit, $date_filter);
			   if(!empty($limit)) {
				   $sql = preg_replace('/[\s]top[\s]+(\d+)/i', '', $sql);
				   if(preg_match('/LIMIT[\s]+[\d]+,[\d]+/', $sql)) {
				  	  $sql = substr($sql, 0, strpos($sql, "LIMIT"));
				   } //if

		   	   	   $result = $bean->db->limitQuery($sql, $row_offset, $limit, true, "Error retrieving KBDocument list: $sql");
                   return $result;
			   } //if

		   } else if(isset($keywords['keywords']) && $keywords['keywords'] == '[most_viewed_articles]') {

			   $sql = create_most_viewed_articles_query($bean, $order_by, $where, $keywords, $row_offset, $limit, $date_filter, $searchVars, $spec_SearchVars);

		   	   if(!empty($limit)) {
			   	   $result = $bean->db->limitQuery($sql, $row_offset, $limit, true, "Error retrieving KBDocument list: $sql");
	               return $result;
		   	   } //if

		   } else {
	    	   foreach($keywords as $key=>$value) {
	                   if($key == 'keywords') {
	    	   	       	  $spec_SearchVars['searchText_include'] = $value;
	    	   	       } else {
	    	   	       	  $searchVars[$key] = $value;
	    	   	       }
	    	   } //foreach
	    	   $sql = create_fts_search_list_query($bean->db, $spec_SearchVars, $searchVars, true);
	 	   	   $sql = $sql . " AND " . $date_filter;

			   if(!empty($limit)) {
				   $result = $bean->db->limitQuery($sql, $row_offset, $limit, true, "Error retrieving KBDocument list: ");
			       return $result;
			   }

		   } //if-else
		} //if

        if(isset($sql)) {
		   $result = $bean->db->query($sql, true);
	       return $result;
        }
        return null;
	}

    /**
     * create_portal_most_recent_query()
     * This method builds and returns query for most recent documents for portal
     * @param DBManager $db DB Manager
     * @param int $n the number of articles to return.  Default is 10
     * @param string $where clause to use in where portion of query, if needed.
     */
    function create_portal_most_recent_query($db, $n = '10', $where='')
	{
	    //create portal most recent query, default is top 10
		return $db->limitQuerySQL("SELECT kbdocuments.* FROM kbdocuments WHERE deleted=0
        	AND is_external_article = 1 $where ORDER BY active_date DESC", 0, $n);
    }

   /**getQSAuthor()
     *
     * This method sets up array for use with quicksearch framework.  Populates values for kb author
     */
    function getQSAuthor($form = 'EditView') {
        global $app_strings;

        $qsUser = array('form' => $form,
                        'method' => 'get_user_array', // special method
                        'field_list' => array('user_name', 'id'),
                        'populate_list' => array('kbarticle_author_name', 'kbarticle_author_id'),
                        'conditions' => array(array('name'=>'user_name','op'=>'like_custom','end'=>'%','value'=>'')),
                        'limit' => '30','no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);
        return $qsUser;
    }

    /**getQSApprover()
     *
     * This method sets up array for use with quicksearch framework.  Populates values for kb approver
     */
    function getQSApprover($form = 'EditView') {
        global $app_strings;

        $qsUser = array('form' => $form,
                        'method' => 'get_user_array', // special method
                        'field_list' => array('user_name', 'id'),
                        'populate_list' => array('kbdoc_approver_name', 'kbdoc_approver_id'),
                        'required_list' => array('kbdoc_approver_id'),
                        'conditions' => array(array('name'=>'user_name','op'=>'like_custom','end'=>'%','value'=>'')),
                        'limit' => '30','no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);
        return $qsUser;
    }

    function getQSTags($form = 'EditView') {
		global $app_strings;

		$qsTags = array('form' => $form,
		                'method' => 'query',
		                'modules'=> array('KBTags'),
		                'group' => 'or',
		                'field_list' => array('tag_name','id'),
		                'populate_list' => array('tag_name'),
		                'conditions' => array(array('name'=>'tag_name','op'=>'like_custom','end'=>'%','value'=>''),
							                       array('name'=>'tag_name','op'=>'like_custom','begin'=>'(','end'=>'%','value'=>'')),
		                'order' => 'tag_name',
		                'limit' => '30',
		                'no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);
		return $qsTags;
	}

    /**getQSFileName()
     *
     * This method sets up array for use with quicksearch framework.  Populates values for document revision file name
     */
    function getQSFileName() {
        global $app_strings;

        $qsFileName = array(    'method' => 'query',
                                'modules'=> array('DocumentRevisions'),
                                'group' => 'or',
                                'field_list' => array('filename'),
                                'populate_list' => array('filename'),
                                'conditions' => array(array('name'=>'filename','op'=>'like_custom','end'=>'%','value'=>'')),
                                'limit' => '30', 'no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);


        return $qsFileName;
    }


    /**getQSMimeType()
     *
     * This method sets up array for use with quicksearch framework.  Populates values for document revision mime type
     */
    function getQSMimeType() {
        global $app_strings;

        $qsFileName = array(    'method' => 'query',
                                'modules'=> array('DocumentRevisions'),
                                'group' => 'or',
                                'field_list' => array('file_mime_type'),
                                'populate_list' => array('file_mime_type'),
                                'conditions' => array(array('name'=>'file_mime_type','op'=>'like_custom','end'=>'%','value'=>'')),
                                'limit' => '30', 'no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);


        return $qsFileName;
    }



    /**getKBStyles
     *
     * This method returns z index values for menu and sub menu dropdowns.  This ensures that dropdown list is always on top
     */
    function getKBStyles(){
     $menuStyle =
                     '<style type="text/css">
                            .menu{
                                z-index:100;
                            }

                            .subDmenu{
                                z-index:100;
                            }
                        </style>';


            return $menuStyle;
    }




    /**create_fts_search_list_query
     *
     * This method takes in parameters in order to construct the where clause used by our list form api's to construct the list form.
     * The parameters that can be used are as follow:
     * @param $db DBManager DB Manager
     * @param $spec_SearchVars Array of parameters used to build special handling into query
     * @param $searchVars Array of parameters used to add bean fields into query
     * @param $fullQuery bool Return string query or array?
     * @return array|string
     */
    function create_fts_search_list_query($db,$spec_SearchVars,$searchVars,$fullQuery=false){


    /**
    $searchVars should be an array of bean variables to search.  Key name should be name of variables and should map directly to the kbdocument table itself.
    example of some acceptable searchVars are:
        $searchVars['kbdocument_name']
        $searchVars['description']
        $searchVars['status_id']

    ** $spec_SearchVars  array is meant to handle special search enhancements.  These enhancements and acceptable params are as follow:

            ** Full Text Search Params.
                $spec_SearchVars['searchText_include']
                $spec_SearchVars['searchText_exclude']

             'searchText_include' are the keywords that will be used to perform the full text search.  Articles returned will contain values from this param.
             'searchText_exclude' are the keywords that will be used to perform the full text search.  Articles returned will contain values from the include param, but exclude values from this param.

            ** Active_Date Filters
                $spec_SearchVars['active_date']         //date used for before/after/on/between_dates filters
                $spec_SearchVars['active_date2']        //used for 'between_dates' filter
                $spec_SearchVars['active_date_filter']  //define filter according to 'kbdocument_date_filter_options' dom object

                These parameters will be used to apply date filters to knowledge document regarding active date field


            ** Exp_Date Date Filters
                $spec_SearchVars['exp_date']            //date used for before/after/on/between_dates filters
                $spec_SearchVars['exp_date2']           //used for 'between_dates' filter
                $spec_SearchVars['exp_date_filter']     //define filter according to 'kbdocument_date_filter_options' dom object

                These parameters will be used to apply date filters to knowledge document regarding exp_date field

            ** Tag Name Filters
                $spec_SearchVars['tag_name']

                This parameter will be used to extract tag names to constrain the search to.  Expects tag name to be formatted as [tagname]

            ** Viewed Frequency Rate Filters
                $spec_SearchVars['frequency']

                This parameter will be used to add on 'viewed frequency' filters, according to the 'kbdocument_viewing_frequency_dom' dom object


            ** Canned Search Filters
                $spec_SearchVars['canned_search']

                This parameter will be used to add on 'canned query' filters, according to the 'kbdocument_canned_search' dom object

            ** Attachment Filters
                $spec_SearchVars['attachments']     //holds dropdown value of desired search filter
                $spec_SearchVars['filename']        //holds filename to search for if desired
                $spec_SearchVars['file_mime_type']  //holds mimetype to search for if desired

                These parameters will be used to apply filters to knowledge document regarding attachments



     *end of  $spec_SearchVars array params
     */

    $qry_arr['where'] ='';
    $qry_arr['custom_from'] ='';

    //create the fts 'include' search string
    $query_include = $query_exclude = $query_must = array();
    if(!empty($spec_SearchVars['searchText_include'])){
        $query = $db->parseFulltextQuery($spec_SearchVars['searchText_include']);
        if(empty($query)) {
            return '';
        }
        $query_include = $query[0];
        $query_must = $query[1];
        $query_exclude = $query[2];
    }

    if(!empty($spec_SearchVars['searchText_exclude'])) {
        $query_ex = $db->parseFulltextQuery($spec_SearchVars['searchText_exclude']);
        if(empty($query_ex)) {
            return '';
        }
        $query_include = array_merge($query_include, $query_ex[2]);
        $query_exclude = array_merge($query_exclude, $query_ex[0]);
        $query_exclude = array_merge($query_exclude, $query_ex[1]);
    }

    //create portion of query that holds the fts search

        $qry_arr['custom_from'] = "INNER JOIN(
              SELECT kbdocument_id as id FROM kbdocument_revisions WHERE deleted = 0 and latest = 1 ";

        // do not do full text search if $query_include[0] is '*' or not defined -bug 47789
        if(!empty($query_include) && $query_include[0] != '*'){
            $qry_arr['custom_from']= $qry_arr['custom_from']. "and kbcontent_id in (
                 select id from kbcontents where deleted = 0 and ".$db->getFulltextQuery('kbdocument_body', $query_include, $query_must, $query_exclude).")";
        }

        $qry_arr['custom_from'] .=  ") derived_table ON kbdocuments.id = derived_table.id ";

     
        $search_str = ' ';

        $tag_display =' ';
        $tag_name_string = '';
        $is_first_tag = true;
        //process tags if specified
        if(isset($spec_SearchVars['tag_name'] )  && !empty($spec_SearchVars['tag_name'] )){
            //if tag name exists, and so does id, use id
            if(isset($spec_SearchVars['tag_id'] )  && !empty($spec_SearchVars['tag_id'] )){
                $tag_id_arr = explode(' ', $spec_SearchVars['tag_id']);

                //process each id specified
                foreach($tag_id_arr as $id){
                    $id = trim($id);
                    if(!empty($id)){
                        if($is_first_tag){
                            $tag_name_string .= "'$id'";
                            $is_first_tag = false;
                        }else{
                            $tag_name_string .= ", '$id'";
                        }
                    }
                  }

              //create filter for tags
              $search_str .= "
                  and kbdocuments.id in (
                        select kbdocument_id from kbdocuments_kbtags where kbtag_id in
                        (
                            $tag_name_string
                        )
                    )";


                }else{
                    //if only tag names are specified and not tag ids, then explode
                    //string on open bracket (properly formatted tag names are enclosed in '[]'
                    $tag_name_arr = explode('[', $spec_SearchVars['tag_name']);

                    //extract string from each formatted tag name
                    foreach($tag_name_arr as $name){
                        $name = trim($name);
                        if(!empty($name)){
                            if($is_first_tag){
                                $tag_name_string .= "'$name'";
                                $is_first_tag = false;
                            }else{
                                $tag_name_string .= ", '$name'";
                            }
                          }
                    }

                      //remove remaining brackets from string for querying
                      $tag_name_string = str_replace('[','',$tag_name_string);
                      $tag_name_string = str_replace(']','',$tag_name_string);

                  //create tag filter, based on names
                  $search_str .= "
                      and kbdocuments.id in (
                            select kbdocument_id from kbdocuments_kbtags where kbtag_id in
                            (
                                select id from kbtags where tag_name in($tag_name_string)
                            )
                        )";
                  }
                }



        //now add the rest of fields to query on, based on search vars array
        $search_str .= "";
        if(isset($searchVars)){
            foreach($searchVars as $key=>$val){
                $op = ' like ';
                $constraint = $val;
                //  check to see if array is being passed in.
                if(is_array($val)){
                    if($search_str != ' '){
                      $search_str .= " and "; //and is needed only if $search_str already has something bug 47789
                    }
                    //if array is being passed in, then retrieve operator to use
                    //otherwise, operator will default to 'like'
                    if(isset($val['operator']) && !empty($val['operator'])){
                        $op = ' '.$val['operator']. ' ';
                        $constraint = $val['filter'];
                        //set searchstring with passed in operator
                        $search_str .= " kbdocuments.$key $op '".$constraint."' ";
                    }else{
                        //set search string with like statement if operator is empty
                        $search_str .= " kbdocuments.$key $op '".$constraint."%' ";
                    }
                }else{
                    if($search_str != ' '){
                      $search_str .= " and "; //and is needed only if $search_str already has something bug 47789
                    }
                        //set search string with like statement if no operator specified
                        $search_str .= " kbdocuments.$key $op '".$constraint."%' ";
                }
            } //foreach
        } //if

        //add the date range filters
        if(isset($spec_SearchVars['active_date_filter']) && !empty($spec_SearchVars['active_date_filter'])){
            $ac =return_date_filter($db, 'active_date', $spec_SearchVars['active_date_filter'], $spec_SearchVars['active_date'], $spec_SearchVars['active_date2']);
            if(!empty($ac)){
                    $search_str .= " and $ac";
            }
        }

        if(isset($spec_SearchVars['exp_date_filter']) && !empty($spec_SearchVars['exp_date_filter'])){
            $xd = return_date_filter($db, 'exp_date', $spec_SearchVars['exp_date_filter'], $spec_SearchVars['exp_date'], $spec_SearchVars['exp_date2']);
            if(!empty($xd)){
                $search_str .= ' and ' . $xd;
                    }
                }

        //add the Frequency filter
        if(isset($spec_SearchVars['frequency'])  && !empty($spec_SearchVars['frequency'])){
            $frequencyFilter = return_view_frequency_filter($db, $spec_SearchVars['frequency']);
            if(!empty($frequencyFilter)){ $search_str .= $frequencyFilter;}
        }

        //add attachment Search
        if(isset($spec_SearchVars['attachments'])  && !empty($spec_SearchVars['attachments'])){
            $attachmentFilter = return_attachment_filter($db, $spec_SearchVars);
            if(!empty($attachmentFilter)){ $search_str .= $attachmentFilter;}
        }

        //finally, add the canned query constraints
        if(isset($spec_SearchVars['canned_search'])  && !empty($spec_SearchVars['canned_search'])){
            $return_can = return_canned_query($db,$spec_SearchVars['canned_search']);
            if(!empty($return_can)){ $search_str .= $return_can;}
        }

        //assign where string to query
        $qry_arr['where'] = from_html($search_str);

        //if full query is expected, then prepend with select statement, Default is to pass back query
        //ready for use as a where clause in ListView Object Setup method
        if($fullQuery){
            $search_str_full  = 'Select kbdocuments.*, kbdocuments_views_ratings.views_number';
            $search_str_full .= ' FROM kbdocuments left join kbdocuments_views_ratings ON kbdocuments.id = kbdocuments_views_ratings.kbdocument_id  ';
            $search_str_full .= $qry_arr['custom_from'] ;
            $search_str_full .= ' where '.$qry_arr['where'] ;
            return $search_str_full;
        }
       return $qry_arr;
}




    /**return_date_filter
     *
     * This method places all words inside quotes into an array and replaces their place
     * in string with a token.  Both array of words and tokenized string are returned.
     *
     * @param $field name of field to process, active_date or exp_date
     * @param $filter name of filter type used to return filter
     * @param $filter_date if needed, date to be used in filter
     * @param $filter_date2 if needed, 2nd date to be used in 'between_dates' filter
     * @param DBManager $db database
     */
function return_date_filter($db, $field, $filter, $filter_date='', $filter_date2=''){
    global $timedate;

    //if set, change the dates to be from user display format to db ready format
    if(!empty($filter_date)){
     $filter_date = $timedate->to_db_date($filter_date,false);
    }

    if(!empty($filter_date2)){
     $filter_date2 = $timedate->to_db_date($filter_date2,false);
    }

    if (!empty($filter)){
        $field ='kbdocuments.'.$field;
        if ($filter == 'on' && !empty($filter_date) ){
            return "$field =" .$db->convert($db->quoted($filter_date), 'date') . " ";
        }elseif($filter == 'isnull'){
            return "($field IS NULL OR ".$db->convert($field, "length").'=0) ';
        }elseif($filter == 'before' && !empty($filter_date)){
            return "$field <" .$db->convert($db->quoted($filter_date), 'date') . " ";
        }elseif($filter == 'after' && !empty($filter_date)){
            return "$field >" .$db->convert($db->quoted($filter_date), 'date') . " ";
        }elseif($filter == 'between_dates' && !empty($filter_date) && !empty($filter_date2)){
            return "($field >=" .$db->convert($db->quoted($filter_date), 'date') .
            	" AND $field <= " . $db->convert($db->quoted($filter_date2), 'date') .") ";
        }else {
            $range = TimeDate::getInstance()->parseDateRange($filter);
            if($range) {
                return "($field >=" .$db->convert($db->quoted($range[0]->asDb()), 'date') .
            		" AND $field <= " . $db->convert($db->quoted($range[1]->asDb()), 'date') .") ";
            }
        }
    }
    return '';
}

    /**return_view_frequency_filter
     *
     * This method creates and returns canned query filters
     *
     * @param $freq_search_opt //option specifying frequency filter to create
     */
    function return_view_frequency_filter($db, $freq_search_opt){
        $filter_query = ' ';
        $isTop = true;

        //process 'top X' filter
        if(substr($freq_search_opt, 0, 4) == 'Top_' && is_numeric(substr($freq_search_opt, 4))) {
            $filter_query = $db->limitQuerySQL("SELECT kbdocument_id FROM kbdocuments_views_ratings WHERE deleted = 0
            	AND kbdocument_id IS NOT NULL ORDER BY kbdocuments_views_ratings.views_number DESC",0, intval(substr($freq_search_opt, 4)));
        }

        //process 'bot X' filter
        if(substr($freq_search_opt, 0, 4) == 'Bot_' && is_numeric(substr($freq_search_opt, 4))) {
            $filter_query = $db->limitQuerySQL("SELECT kbdocument_id FROM kbdocuments_views_ratings WHERE deleted = 0
            	AND kbdocument_id IS NOT NULL ORDER BY kbdocuments_views_ratings.views_number ASC, kbdocuments_views_ratings.date_modified ASC",0, intval(substr($freq_search_opt, 4)));
            $isTop = false;
        }

        if(!$db->supports("limit_subquery")){
            //Some DBs like mysql do not support limits in subqueries, so we need to run query
            //and retrieve id's.  This will allow us to construct an id 'not in' subquery.
            $result = $db->query($filter_query);
            $ids = array();
            if(!empty($result)) {
                while($row = $db->fetchByAssoc($result)) {
                 	   $ids[] = $db->quoted($row['kbdocument_id']);
                }
            }
            $filter_query = join(',', $ids);
        }

        //use value to create query
        if(!empty($filter_query)) {
           return " AND kbdocuments.id IN ( $filter_query )";
        } else {
            return "";
        }
    }


    /**return_canned_query
     *
     * This method creates and returns canned query filters
     *
     * @param DBManage $db database
     * @param $canned_search_opt key value of type of canned search to process
     */
    function return_canned_query($db, $canned_search_opt){
            $return_can = '';

             if (isset($canned_search_opt)){
                //process 'articles added last 30 days' filter
                if($canned_search_opt == 'added'){
                    $range = TimeDate::getInstance()->parseDateRange('last_30_days');
                    return " AND (kbdocuments.date_entered >=" .$db->convert($db->quoted($range[0]->asDb()), 'date') .
            			" AND kbdocuments.date_entered <= " . $db->convert($db->quoted($range[1]->asDb()), 'date') .") ";
                }

                //process 'articles pending my approval' filter
                if($canned_search_opt == 'pending'){
                    global $current_user;
                    $return_can = "and kbdocuments.status_id='In Review' and kbdocuments.kbdoc_approver_id = '". $current_user->id . "'";
                }

                //process 'articles updated last 30 days' filter
                if($canned_search_opt == 'updated'){
                    $range = TimeDate::getInstance()->parseDateRange('last_30_days');
                    return " AND (kbdocuments.date_modified >=" .$db->convert($db->quoted($range[0]->asDb()), 'date') .
            			" AND kbdocuments.date_modified <= " . $db->convert($db->quoted($range[1]->asDb()), 'date') .") ";
                }

                //process 'articles under faq's tag' filter
                if($canned_search_opt == 'faqs'){
                  $return_can .= "
                      and kbdocuments.id in (
                            select kbdocument_id from kbdocuments_kbtags where kbtag_id in
                            (
                                select id from kbtags where tag_name ='faqs'
                            )
                        )";
                }
            }

            return $return_can;
    }



    /**return_attachment_filter
     *
     * This method creates and returns filter string for searching on attachments
     * returns full text search query
     * @param $db Database
     * @param $spec_SearchVars Array of inputs needed for attachment filters.
     */
  function return_attachment_filter($db, $spec_SearchVars){

            //retrieve param specifying the filter type to return.
            $attachment_search_opt = $spec_SearchVars['attachments'];
            $return_att ='';

            //process if filter exists
             if (isset($attachment_search_opt)){

                //Create if filter type is set to none
                if($attachment_search_opt == 'none' || $attachment_search_opt == 'some'){
                    $return_att = "and kbdocuments.id not in
                                        (select kbdocument_id from kbdocument_revisions where ".$db->convert('kbdocument_id', 'length')." or kbcontent_id IS NULL)";
                }
                //Create if filter type is set to name
                if($attachment_search_opt == 'name'){
                    if(isset($spec_SearchVars['filename'])  && !empty($spec_SearchVars['filename'])){
                        $return_att =
                                    " AND kbdocuments.id in
                                    (
                                        select kbdocument_id from kbdocument_revisions where document_revision_id  in
                                        (
                                            select id from document_revisions where deleted = 0 and filename  like '" . $spec_SearchVars['filename'] . "%'
                                        )
                                    )
                                    ";
                    }
                }

                //Create if filter type is set to mime type
                if($attachment_search_opt == 'mime'){
                    if(isset($spec_SearchVars['file_mime_type'])  && !empty($spec_SearchVars['file_mime_type'])){
                        $return_att =
                                    " AND kbdocuments.id in
                                    (
                                        select kbdocument_id from kbdocument_revisions where document_revision_id  in
                                        (
                                            select id from document_revisions where deleted = 0 and file_mime_type  like '" . $spec_SearchVars['file_mime_type'] . "%'
                                        )
                                    )
                                    ";
                    }
                }

            }
            return $return_att;
    }


    /**updateKBView
     *
     * This method increments the viewing count for the provided article id
     * @param $kbid id of article to increment
     */

    function updateKBView($kbid){
        $guid = create_guid();
        //retrieve if already exists
        $query = "select * from kbdocuments_views_ratings where kbdocument_id='$kbid'";
        $result = $GLOBALS['db']->query($query);
        $rowq  =  $GLOBALS['db']->fetchByAssoc($result);

        if(!isset($kbid) || empty($kbid)){
         $GLOBALS['log']->fatal("Kbdocument id is null in updateKBView, this is an error.");
        }

        //update if exists else create a new entry
        if($rowq != null){
           $query = "update kbdocuments_views_ratings set views_number = views_number+1 where kbdocument_id='$kbid'";
           $result = $GLOBALS['db']->query($query);
        }
        else{
          $query = "insert into kbdocuments_views_ratings (id,kbdocument_id,views_number) values('$guid','$kbid',1)";
          $result = $GLOBALS['db']->query($query);
        }

        return $result;
    }

    /**
     * create_most_recent_articles_query
     */
    function create_most_recent_articles_query($bean, $order_by, $where, $keywords, $row_offset, $limit, $date_filter) {
		$where = " AND kbdocuments.status_id = 'Published' AND " . $date_filter;
		$sql = create_portal_most_recent_query($bean->db, $limit, $where);
		return $sql;
    }

    /**
     * create_most_viewed_articles_query
     */
    function create_most_viewed_articles_query($bean, $order_by, $where, $keywords, $row_offset, $limit, $date_filter, $searchVars, $spec_SearchVars) {
   		$spec_SearchVars['frequency'] = 'Top_10';
   		$sql = create_fts_search_list_query($bean->db, $spec_SearchVars, $searchVars, true);
   		$sql = str_replace("'Published'", "'Published' AND $date_filter ", $sql);
   		return $sql;
    }

    function validate_quotes($quote_string){
        $esc_quote_string = str_replace("\\\"", "", $quote_string);
        $dubCount = substr_count($esc_quote_string, '"');

        if($dubCount % 2 == 0){
             //throw 'error'
             return true;
        }else{
            return false;
        }

    }

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

$portal_modules = array('Contacts', 'Accounts', 'Notes');
$portal_modules[] = 'Cases';
$portal_modules[] = 'Bugs';

$portal_modules[] = 'KBDocuments';

/*
BUGS
*/





require_once('modules/KBDocuments/SearchUtils.php');

function get_bugs_in_contacts($in, $orderBy = '')
    {
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;
        // First, get the list of IDs.
        
        $query = "SELECT cb.bug_id as id from contacts_bugs cb, bugs b where cb.bug_id = b.id and b.deleted = 0 and b.portal_viewable = 1 and cb.contact_id IN $in AND cb.deleted=0";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }

        $sugar = new Contact();
        $sugar->disable_row_level_security = true;
        set_module_in($sugar->build_related_in($query), 'Bugs');
    }

function get_bugs_in_accounts($in, $orderBy = '')
    {
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;
        // First, get the list of IDs.
        
        $query = "SELECT ab.bug_id as id from accounts_bugs ab, bugs b where ab.bug_id = b.id and b.deleted = 0 and b.portal_viewable = 1 and ab.account_id IN $in AND ab.deleted=0";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }

        $sugar = new Account();
        $sugar->disable_row_level_security = true;

        set_module_in($sugar->build_related_in($query), 'Bugs');
    }

/*
Cases
*/

function get_cases_in_contacts($in, $orderBy = '')
    {
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;
        // First, get the list of IDs.

        $query = "SELECT case_id as id from contacts_cases cc, cases c where cc.case_id = c.id AND c.deleted = 0 AND c.portal_viewable = 1 AND cc.contact_id IN $in AND cc.deleted=0";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }

        $sugar = new Contact();
        $sugar->disable_row_level_security = true;
        set_module_in($sugar->build_related_in($query), 'Cases');
    }

function get_cases_in_accounts($in, $orderBy = '')
    {
        if(empty($_SESSION['viewable']['Accounts'])){
            return;
        }
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;
        // First, get the list of IDs.
        $query = "SELECT id from cases where deleted = 0 AND portal_viewable = 1 AND account_id IN $in";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }
        
        $sugar = new Account();
        $sugar->disable_row_level_security = true;
        set_module_in($sugar->build_related_in($query), 'Cases');
    }



/*
NOTES
*/


function get_notes_in_contacts($in, $orderBy = '')
    {
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;
        // First, get the list of IDs.
        $query = "SELECT id from notes where contact_id IN $in AND deleted=0 AND portal_flag=1";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }
            
        $contact = new Contact();
        $contact->disable_row_level_security = true;
        $note = new Note();
        $note->disable_row_level_security = true;
        return $contact->build_related_list($query, $note);
    }

function get_notes_in_module($in, $module, $orderBy = '')
    {
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;
        // First, get the list of IDs.
        $query = "SELECT id from notes where parent_id IN $in AND parent_type='$module' AND deleted=0 AND portal_flag = 1";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }
        global $beanList, $beanFiles;

        if(!empty($beanList[$module])){
            $class_name = $beanList[$module];
            require_once($beanFiles[$class_name]);
            $sugar = new $class_name();
        }else{
            return array();
        }

        $sugar->disable_row_level_security = true;
        $note = new Note();
        $note->disable_row_level_security = true;
        return $sugar->build_related_list($query, $note);
    }
    
    function get_related_in_module($in, $module, $rel_module, $orderBy = '', $row_offset = 0, $limit= -1)
    {
        global $beanList, $beanFiles;
         if(!empty($beanList[$rel_module])){
            $class_name = $beanList[$rel_module];
            require_once($beanFiles[$class_name]);
            $rel = new $class_name();
        }else{
            return array();
        }
        
        //bail if the in is empty
        if(empty($in)  || $in =='()' || $in =="('')")return;

        // First, get the list of IDs.
        if ($module == 'KBDocuments' || $module == 'DocumentRevisions') {
            $query = "SELECT dr.* from document_revisions dr
                      inner join kbdocument_revisions kr on kr.document_revision_id = dr.id AND kr.kbdocument_id IN ($in)
                      AND dr.file_mime_type is not null";
        } else {
            $query = "SELECT id from $rel->table_name where parent_id IN $in AND parent_type='".$GLOBALS['db']->quote($module)."' AND deleted=0 AND portal_flag = 1";
        }

        if(!empty($orderBy)){
            require_once 'include/SugarSQLValidate.php';
            $valid = new SugarSQLValidate();
            $fakeWhere = " 1=1 ";
            if($valid->validateQueryClauses($fakeWhere,$orderBy)) {
                $query .= ' ORDER BY '. $orderBy;
            } else {
                $GLOBALS['log']->error("Bad order by: $orderBy");
            }

        }

        if(!empty($beanList[$module])){
            $class_name = $beanList[$module];
            require_once($beanFiles[$class_name]);
            $sugar = new $class_name();
        }else{
            return array();
        }
        
        $sugar->disable_row_level_security = true;
        $rel->disable_row_level_security = true;
        
        $count_query = $sugar->create_list_count_query($query);
        if(!empty($count_query))
        {
            // We have a count query.  Run it and get the results.
            $result = $sugar->db->query($count_query, true, "Error running count query for $sugar->object_name List: ");
            $assoc = $sugar->db->fetchByAssoc($result);
            if(!empty($assoc['c']))
            {
                $rows_found = $assoc['c'];
            }
        }
        $list = $sugar->build_related_list($query, $rel, $row_offset, $limit);
        $list['result_count'] = $rows_found;
        return $list;
    }

function get_accounts_from_contact($contact_id, $orderBy = '')
    {
                // First, get the list of IDs.
        $query = "SELECT account_id as id from accounts_contacts where contact_id='".$GLOBALS['db']->quote($contact_id)."' AND deleted=0";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }
        $sugar = new Contact();
        $sugar->disable_row_level_security = true;
        set_module_in($sugar->build_related_in($query), 'Accounts');
    }

function get_contacts_from_account($account_id, $orderBy = '')
    {
        // First, get the list of IDs.
        $query = "SELECT contact_id as id from accounts_contacts where account_id='".$GLOBALS['db']->quote($account_id)."' AND deleted=0";
        if(!empty($orderBy)){
            $query .= ' ORDER BY ' . $orderBy;
        }
        $sugar = new Account();
        $sugar->disable_row_level_security = true;
        set_module_in($sugar->build_related_in($query), 'Contacts');
    }

function get_related_list($in, $template, $where, $order_by, $row_offset = 0, $limit = ""){
        $template->disable_row_level_security = true;

        $q = '';
        //if $in is empty then pass in a query to get the list of related list
        if(empty($in)  || $in =='()' || $in =="('')"){
            $in = '';
            //build the query to pass into the template list function
             $q = 'select id from '.$template->table_name.' where deleted = 0 ';
        	//add where statement if it is not empty
			if(!empty($where)){
                require_once 'include/SugarSQLValidate.php';
                $valid = new SugarSQLValidate();
                if(!$valid->validateQueryClauses($where)) {
                    $GLOBALS['log']->error("Bad query: $where");
                    // No way to directly pass back an error.
                    return array();
                }

				$q .= ' and ( '.$where.' ) ';
			}
        }
        
        return $template->build_related_list_where($q, $template, $where, $in, $order_by, $limit, $row_offset);

    }

function build_relationship_tree($contact){
    global $sugar_config;
    $contact->retrieve($contact->id);

    $contact->disable_row_level_security = true;
    get_accounts_from_contact($contact->id);

    set_module_in(array('list'=>array($contact->id), 'in'=> "('".$GLOBALS['db']->quote($contact->id)."')"), 'Contacts');

    $accounts = $_SESSION['viewable']['Accounts'];
    foreach($accounts as $id){
        if(!isset($sugar_config['portal_view']) || $sugar_config['portal_view'] != 'single_user'){
            get_contacts_from_account($id);
        }
    }
}

function get_contacts_in(){
    return $_SESSION['viewable']['contacts_in'];
}

function get_accounts_in(){
    return $_SESSION['viewable']['accounts_in'];
}

function get_module_in($module_name){
    if(!isset($_SESSION['viewable'][$module_name])){
        return '()';
    }

    $module_name_in = array_keys($_SESSION['viewable'][$module_name]);
    $module_name_list = array();
    foreach ( $module_name_in as $name ) {
        $module_name_list[] = $GLOBALS['db']->quote($name);
    }

    $mod_in = "('" . join("','", $module_name_list) . "')";
    $_SESSION['viewable'][strtolower($module_name).'_in'] = $mod_in;
    
    return $mod_in;
}

function set_module_in($arrayList, $module_name){

        if(!isset($_SESSION['viewable'][$module_name])){
            $_SESSION['viewable'][$module_name] = array();
        }
        foreach($arrayList['list'] as $id){
            $_SESSION['viewable'][$module_name][$id] = $id;
        }
        if($module_name == 'Accounts' && isset($id)){
            $_SESSION['account_id'] = $id;
        }

        if(!empty($_SESSION['viewable'][strtolower($module_name).'_in'])){
            if($arrayList['in'] != '()') {
                $newList = array();
                if ( is_array($_SESSION['viewable'][strtolower($module_name).'_in']) ) {
                    foreach($_SESSION['viewable'][strtolower($module_name).'_in'] as $name ) {
                        $newList[] = $GLOBALS['db']->quote($name);
                    }
                }
                if ( is_array($arrayList['list']) ) {
                    foreach ( $arrayList['list'] as $name ) {
                        $newList[] = $GLOBALS['db']->quote($name);
                    }
                }
                $_SESSION['viewable'][strtolower($module_name).'_in'] = "('" . implode("', '", $newList) . "')";
            }
        }else{
            $_SESSION['viewable'][strtolower($module_name).'_in'] = $arrayList['in'];
        }
}

/*
 * Given the user auth, attempt to log the user in.
 * used by SoapPortalUsers.php
 */
function login_user($portal_auth){
     $error = new SoapError();
     $user = new User();
     $user = $user->retrieve_by_string_fields(array('user_name'=>$portal_auth['user_name'],'user_hash'=>$portal_auth['password'], 'deleted'=>0, 'status'=>'Active', 'portal_only'=>1) );    
        
        if($user != null){
            global $current_user;
            $current_user = $user;
            return 'success';
        }else{
            $GLOBALS['log']->fatal('SECURITY: User authentication for '. $portal_auth['user_name']. ' failed');
            return 'fail';
        }
}

/**
 * portal_get_child_tags_query
 * Given a tag name, this method scans the kbtags table and returns the first level
 * of any child tags found.
 * @param $tag The kbtags.parent_tag_id value to search for
 * @return List of child tag ids.
 */
function portal_get_child_tags_query($session, $tag) {

    if (!portal_validate_authenticated($session)) {
        $error->set_error('invalid_session');
        return array (
        'result_count' => -1,
        'entry_list' => array (),
        'error' => $error->get_soap_array());
    }

    $sugar = new KBDocument();
    //Use KBDocuments/SearchUtils.php 
    return get_child_tags($tag, $sugar);
}

function portal_get_tag_docs_query($session, $tag) {
    
    if (!portal_validate_authenticated($session)) {
        $error->set_error('invalid_session');
        return array (
        'result_count' => -1,
        'entry_list' => array (),
        'error' => $error->get_soap_array());
    }

    $sugar = new KBDocument();
    //Use KBDocuments/SearchUtils.php 
    return get_tag_docs($tag, $sugar);  
}

function portal_get_kbdocument_body_query($session, $id) {
    
    if (!portal_validate_authenticated($session)) {
        $error->set_error('invalid_session');
        return array (
        'result_count' => -1,
        'entry_list' => array (),
        'error' => $error->get_soap_array());
    }

    $sugar = new KBDocument();
    //Use KBDocuments/SearchUtils.php 
    return get_kbdocument_body($id, $sugar);    
}

function portal_get_entry_list_limited($session, $module_name,$where, $order_by, $select_fields, $row_offset, $limit){
    global  $beanList, $beanFiles, $portal_modules;
    $error = new SoapError();
    if(! portal_validate_authenticated($session)){
        $error->set_error('invalid_session');
        return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
    }
    if($_SESSION['type'] == 'lead' ){
        $error->set_error('no_access');
        return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
    }
    if(empty($beanList[$module_name])){
        $error->set_error('no_module');
        return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());
    }
    if($module_name == 'Cases'){

        //if the related cases have not yet been loaded into the session object,
        //then call the methods that will load the cases related to the contact/accounts for this user
        if(!isset($_SESSION['viewable'][$module_name])){
            //retrieve the contact/account id's for this user
            $c =get_contacts_in();
            $a = get_accounts_in();
           if(!empty($c)) {get_cases_in_contacts($c);}
           if(!empty($a)) { get_cases_in_accounts($a);}
        }
         
        $sugar = new aCase();

        $list = array();
        //if no Cases have been loaded into the session as viewable, then do not issue query, just return empty list
        //issuing a query with no cases loaded in session will return ALL the Cases, which is not a good thing
        if(!empty($_SESSION['viewable'][$module_name])){
            $list =  get_related_list(get_module_in($module_name), new aCase(), $where,$order_by, $row_offset, $limit);
        }

    }else if($module_name == 'Contacts'){
            $sugar = new Contact();
            $list =  get_related_list(get_module_in($module_name), new Contact(), $where,$order_by);
    }else if($module_name == 'Accounts'){
            $sugar = new Account();
            $list =  get_related_list(get_module_in($module_name), new Account(), $where,$order_by);
    }else if($module_name == 'Bugs'){

        //if the related bugs have not yet been loaded into the session object,
        //then call the methods that will load the bugs related to the contact/accounts for this user
            if(!isset($_SESSION['viewable'][$module_name])){
                //retrieve the contact/account id's for this user
                $c =get_contacts_in();
                $a = get_accounts_in();
                if(!empty($c)) {get_bugs_in_contacts($c);}
                if(!empty($a)) {get_bugs_in_accounts($a);}
            }

        $list = array();
        //if no Bugs have been loaded into the session as viewable, then do not issue query, just return empty list
        //issuing a query with no bugs loaded in session will return ALL the Bugs, which is not a good thing
        if(!empty($_SESSION['viewable'][$module_name])){
            $list = get_related_list(get_module_in($module_name), new Bug(), $where, $order_by, $row_offset, $limit);
        }
    } else if ($module_name == 'KBDocuments') {
            $sugar = new KBDocument();
            $sugar->disable_row_level_security = true;
            $keywords = array();
            //Check if there was a LIKE or = clause built.  If so, the key/value pairs
            $where = str_replace("\'", "<##@comma@##>", $where);
            if (preg_match_all("/kbdocuments[\.]([^\s]*?)[\s]+(LIKE|=)[\s]+[\'](.*?)[%][\']/si", $where, $matches, PREG_SET_ORDER)) {
                foreach($matches as $match) {
                        $value = str_replace("<##@comma@##>", "\'", $match[3]);
                        $keywords[$match[1]] = $value;
                }
            }
            $where = "";

            $result = create_portal_list_query($sugar, $order_by, $where, $keywords, $row_offset, $limit);
            $list = array ();
            while ($row = $sugar->db->fetchByAssoc($result)) {
                   $id = $row['id'];
                   //$list[] = $id;
                   $record = new KBDocument();
                   $record->disable_row_level_security = true;
                   $record->retrieve($id);
                   $record->fill_in_additional_list_fields();
                   $list[] = $record;       
            }
    } else if ($module_name == 'FAQ') {
                $sugar = new KBDocument();
                preg_match("/kbdocuments.tags[\s]=[\s]+[(][\'](.*?)[\'][)]/si", $where, $matches);
                //Use KBDocuments/SearchUtils.php 
                //ToDo: Set Global ID for FAQ somewhere, can't assume it's faq1
                $list = get_faq_list($matches[1], $sugar);
    } else{
        $error->set_error('no_module_support');
        return array('result_count'=>-1, 'entry_list'=>array(), 'error'=>$error->get_soap_array());

    }

    $output_list = Array();
    $field_list = array();
    foreach($list as $value)
    {

        //$loga->fatal("Adding another account to the list");
        $output_list[] = get_return_value($value, $module_name);
        $_SESSION['viewable'][$module_name][$value->id] = $value->id;
        if(empty($field_list)){
            $field_list = get_field_list($value);
        }
    }
    $output_list = filter_return_list($output_list, $select_fields, $module_name);
    $field_list = filter_field_list($field_list,$select_fields, $module_name);

    return array('result_count'=>sizeof($output_list), 'next_offset'=>0,'field_list'=>$field_list, 'entry_list'=>$output_list, 'error'=>$error->get_soap_array());
}

$invalid_contact_fields = array('portal_name'=>1, 'portal_password'=>1, 'portal_active'=>1);
$valid_modules_for_contact = array('Contacts'=>1, 'Cases'=>1, 'Notes'=>1, 'Bugs'=>1, 'Accounts'=>1, 'Leads'=>1, 'KBDocuments'=>1);




?>
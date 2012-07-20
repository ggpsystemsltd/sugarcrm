<?php
if(!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
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



require_once ('include/upload_file.php');
// User is used to store Forecast information.
class KBTag extends SugarBean {

	var $id;
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $tag_name;
	var $parent_tag_id;
	var $team_id;
	var $active_date;
	
	//additional fields.
	

	var $table_name = "kbtags";
	var $object_name = "KBTag";
	var $user_preferences;

	var $encodeFields = Array ();

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array ('revision');

	

	var $new_schema = true;
	var $module_dir = 'KBTags';
	
//todo remove leads relationship.
	var $relationship_fields = Array('contract_id'=>'contracts',
	 
		'lead_id' => 'leads'
	 );
	  

	function KBTag() {
		parent :: SugarBean();
		$this->setupCustomFields('KBTags'); //parameter is module name
		$this->disable_row_level_security = false;
	}

	function save($check_notify = false) {
        //Default the tag id to 1 which will make it global
        $this->team_id = '1';
		return parent :: save($check_notify);
	}
	function get_summary_text() {
		return "$this->tag_name";
	}
	function is_authenticated() {
		return $this->authenticated;
	}
    function get_Tag_id($tag_name){
    	//nothing
    }
    

    /**
     * Changes the select expression of the given query to be 'count(*)' so you
     * can get the number of items the query will return.  This is used to
     * populate the upper limit on ListViews.
     * 
     * @param string $query Select query string
     * @return string count query
     * 
     * Internal function, do not override.
     */
    function create_list_count_query($query)
    {
        // change the select expression to 'count(*)'
        $pattern = '/SELECT(.*?)(\s){1}FROM(\s){1}/is';  // ignores the case
        $replacement = 'SELECT count(*) c FROM ';
        $modified_select_query = preg_replace($pattern, $replacement, $query,1);

        // remove the 'order by' clause which is expected to be at the end of the query
        $pattern = '/\sORDER BY.*/is';  // ignores the case
        $replacement = '';
        $modified_order_by_query = preg_replace($pattern, $replacement, $modified_select_query);

        return $modified_order_by_query;
    }
    
    /* function used by the installer to create default tags */
    function default_install_data() {
        $query="INSERT INTO kbtags (id,tag_name) values('FAQs','FAQs')";          
		$GLOBALS['db']->query($query);   	
    }
}
?>
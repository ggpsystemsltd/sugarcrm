<?php
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

/*********************************************************************************

 * Description: The primary Function of this file is to manage all the data
 * used by other files in this nodule. It should extend the SugarBean which impelments
 * all the basic database operations. Any custom behaviors can be implemented here by
 * implemeting functions available in the SugarBean.
 ********************************************************************************/

  

 
 

class ContractType extends SugarBean {

	var $id;
	var $date_entered;
	var $created_by;
	var $date_modified;
	var $modified_by;
	var $deleted;
	var $modified_user_id;

	var $name;
	var $list_order;
	/* End field definitions*/

	/* variable $table_name is used by SugarBean and methods in this file to constructs queries
	 * set this variables value to the table associated with this bean.
	 */
	var $table_name = 'contract_types';

	/*This  variable overrides the object_name variable in SugarBean, wher it has a value of null.*/
	var $object_name = 'ContractType';

	/**/
	var $module_dir = 'ContractTypes';

	/* This is a legacy variable, set its value to true for new modules*/
	var $new_schema = true;

	// This is used to retrieve related fields from form posts.
	var $relationship_fields = array();

	var $required_fields =  array();

	/*This bean's constructor*/
	function ContractType() {
		parent::SugarBean();
		$this->disable_row_level_security=true;
	}

	/* This method should return the summary text which is used to build the bread crumb navigation*/
	/* Generally from this method you would return value of a field that is required and is of type string*/
	function get_summary_text()
	{
		return "$this->name";
	}


	/* This method is used to generate query for the list form. The base implementation of this method
	 * uses the table_name and list_field varaible to generate the basic query and then  adds the custom field
	 * join and team filter. If you are implementing this function do not forget to consider the additional conditions.
	 */

	
	function create_export_query(&$order_by, &$where){
		return $this->create_new_list_query($order_by, $where);
	}
	
	function get_next_list_order() {

		$retval=1;
		$query="select max(list_order) as max_list_order from contract_types where list_order is not null";
		$result = $this->db->query($query, false);
		$row = $this->db->fetchByAssoc($result);
		if (!empty($row) && !empty($row['max_list_order'])) {
			$retval=$row['max_list_order']+1; 
		}					
		return $retval;
	}
	
	
	function get_contractTypes($add_blank=false){
		$query="select id,name,list_order from contract_types where deleted = 0 order by list_order ";
		$result = $this->db->query($query, false);		
		$list = array();		
		if ($add_blank) {
			$list['']='';
		}
		while (($row = $this->db->fetchByAssoc($result)) != null) {		
			$list[$row['id']] = $row['name'];		
		}					
	    return $list;
	}
}
?>